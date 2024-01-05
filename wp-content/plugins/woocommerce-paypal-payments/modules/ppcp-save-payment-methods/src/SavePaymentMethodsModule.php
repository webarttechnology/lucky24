<?php
/**
 * The save payment methods module.
 *
 * @package WooCommerce\PayPalCommerce\Applepay
 */

declare(strict_types=1);

namespace WooCommerce\PayPalCommerce\SavePaymentMethods;

use Psr\Log\LoggerInterface;
use WC_Order;
use WC_Payment_Tokens;
use WooCommerce\PayPalCommerce\ApiClient\Authentication\UserIdToken;
use WooCommerce\PayPalCommerce\ApiClient\Endpoint\PaymentTokensEndpoint;
use WooCommerce\PayPalCommerce\ApiClient\Entity\Order;
use WooCommerce\PayPalCommerce\ApiClient\Entity\PaymentSource;
use WooCommerce\PayPalCommerce\ApiClient\Exception\PayPalApiException;
use WooCommerce\PayPalCommerce\ApiClient\Exception\RuntimeException;
use WooCommerce\PayPalCommerce\Button\Helper\ContextTrait;
use WooCommerce\PayPalCommerce\SavePaymentMethods\Endpoint\CaptureCardPayment;
use WooCommerce\PayPalCommerce\SavePaymentMethods\Endpoint\CreatePaymentToken;
use WooCommerce\PayPalCommerce\SavePaymentMethods\Endpoint\CreateSetupToken;
use WooCommerce\PayPalCommerce\Vendor\Dhii\Container\ServiceProvider;
use WooCommerce\PayPalCommerce\Vendor\Dhii\Modular\Module\ModuleInterface;
use WooCommerce\PayPalCommerce\Vendor\Interop\Container\ServiceProviderInterface;
use WooCommerce\PayPalCommerce\Vendor\Psr\Container\ContainerInterface;
use WooCommerce\PayPalCommerce\WcGateway\Gateway\CreditCardGateway;
use WooCommerce\PayPalCommerce\WcGateway\Gateway\PayPalGateway;
use WooCommerce\PayPalCommerce\WcGateway\Settings\Settings;

/**
 * Class SavePaymentMethodsModule
 */
class SavePaymentMethodsModule implements ModuleInterface {

	use ContextTrait;

	/**
	 * {@inheritDoc}
	 */
	public function setup(): ServiceProviderInterface {
		return new ServiceProvider(
			require __DIR__ . '/../services.php',
			require __DIR__ . '/../extensions.php'
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function run( ContainerInterface $c ): void {
		if ( ! $c->get( 'save-payment-methods.eligible' ) ) {
			return;
		}

		add_filter(
			'woocommerce_paypal_payments_localized_script_data',
			function( array $localized_script_data ) use ( $c ) {
				$api = $c->get( 'api.user-id-token' );
				assert( $api instanceof UserIdToken );

				$logger = $c->get( 'woocommerce.logger.woocommerce' );
				assert( $logger instanceof LoggerInterface );

				$localized_script_data = $this->add_id_token_to_script_data( $api, $logger, $localized_script_data );

				$localized_script_data['ajax']['capture_card_payment'] = array(
					'endpoint' => \WC_AJAX::get_endpoint( CaptureCardPayment::ENDPOINT ),
					'nonce'    => wp_create_nonce( CaptureCardPayment::nonce() ),
				);

				return $localized_script_data;
			}
		);

		// Adds attributes needed to save payment method.
		add_filter(
			'ppcp_create_order_request_body_data',
			function( array $data, string $payment_method, array $request_data ): array {
				// phpcs:ignore WordPress.Security.NonceVerification.Missing
				$wc_order_action = wc_clean( wp_unslash( $_POST['wc_order_action'] ?? '' ) );
				if ( $wc_order_action === 'wcs_process_renewal' ) {
					// phpcs:ignore WordPress.Security.NonceVerification.Missing
					$subscription_id = wc_clean( wp_unslash( $_POST['post_ID'] ?? '' ) );
					$subscription    = wcs_get_subscription( (int) $subscription_id );
					if ( $subscription ) {
						$customer_id = $subscription->get_customer_id();
						$wc_tokens   = WC_Payment_Tokens::get_customer_tokens( $customer_id, PayPalGateway::ID );
						foreach ( $wc_tokens as $token ) {
							$data['payment_source'] = array(
								'paypal' => array(
									'vault_id' => $token->get_token(),
								),
							);

							return $data;
						}
					}
				}

				if ( $payment_method === CreditCardGateway::ID ) {
					$save_payment_method = $request_data['save_payment_method'] ?? false;
					if ( $save_payment_method ) {
						$data['payment_source'] = array(
							'card' => array(
								'attributes' => array(
									'vault' => array(
										'store_in_vault' => 'ON_SUCCESS',
									),
								),
							),
						);

						$target_customer_id = get_user_meta( get_current_user_id(), '_ppcp_target_customer_id', true );
						if ( $target_customer_id ) {
							$data['payment_source']['card']['attributes']['customer'] = array(
								'id' => $target_customer_id,
							);
						}
					}
				}

				if ( $payment_method === PayPalGateway::ID ) {
					$data['payment_source'] = array(
						'paypal' => array(
							'attributes' => array(
								'vault' => array(
									'store_in_vault' => 'ON_SUCCESS',
									'usage_type'     => 'MERCHANT',
								),
							),
						),
					);
				}

				return $data;
			},
			10,
			3
		);

		add_action(
			'woocommerce_paypal_payments_after_order_processor',
			function( WC_Order $wc_order, Order $order ) use ( $c ) {
				$payment_source = $order->payment_source();
				assert( $payment_source instanceof PaymentSource );

				$payment_vault_attributes = $payment_source->properties()->attributes->vault ?? null;
				if ( $payment_vault_attributes ) {
					$customer_id = $payment_vault_attributes->customer->id ?? '';
					$token_id    = $payment_vault_attributes->id ?? '';
					if ( ! $customer_id || ! $token_id ) {
						return;
					}

					update_user_meta( $wc_order->get_customer_id(), '_ppcp_target_customer_id', $customer_id );

					$wc_payment_tokens = $c->get( 'save-payment-methods.wc-payment-tokens' );
					assert( $wc_payment_tokens instanceof WooCommercePaymentTokens );

					if ( $wc_order->get_payment_method() === CreditCardGateway::ID ) {
						$token = new \WC_Payment_Token_CC();
						$token->set_token( $token_id );
						$token->set_user_id( $wc_order->get_customer_id() );
						$token->set_gateway_id( CreditCardGateway::ID );

						$token->set_last4( $payment_source->properties()->last_digits ?? '' );
						$expiry = explode( '-', $payment_source->properties()->expiry ?? '' );
						$token->set_expiry_year( $expiry[0] ?? '' );
						$token->set_expiry_month( $expiry[1] ?? '' );
						$token->set_card_type( $payment_source->properties()->brand ?? '' );

						$token->save();
					}

					if ( $wc_order->get_payment_method() === PayPalGateway::ID ) {
						$wc_payment_tokens->create_payment_token_paypal(
							$wc_order->get_customer_id(),
							$token_id,
							$payment_source->properties()->email_address ?? ''
						);
					}
				}
			},
			10,
			2
		);

		add_filter( 'woocommerce_paypal_payments_disable_add_payment_method', '__return_false' );
		add_filter( 'woocommerce_paypal_payments_subscription_renewal_return_before_create_order_without_token', '__return_false' );
		add_filter( 'woocommerce_paypal_payments_should_render_card_custom_fields', '__return_false' );

		add_action(
			'wp_enqueue_scripts',
			function() use ( $c ) {
				if ( ! is_user_logged_in() || ! $this->is_add_payment_method_page() ) {
					return;
				}

				$module_url = $c->get( 'save-payment-methods.module.url' );
				wp_enqueue_script(
					'ppcp-add-payment-method',
					untrailingslashit( $module_url ) . '/assets/js/add-payment-method.js',
					array( 'jquery' ),
					$c->get( 'ppcp.asset-version' ),
					true
				);

				$api = $c->get( 'api.user-id-token' );
				assert( $api instanceof UserIdToken );

				try {
					$target_customer_id = '';
					if ( is_user_logged_in() ) {
						$target_customer_id = get_user_meta( get_current_user_id(), '_ppcp_target_customer_id', true );
					}

					$id_token = $api->id_token( $target_customer_id );

					$settings = $c->get( 'wcgateway.settings' );
					assert( $settings instanceof Settings );
					$verification_method = $settings->has( '3d_secure_contingency' ) ? $settings->get( '3d_secure_contingency' ) : '';

					wp_localize_script(
						'ppcp-add-payment-method',
						'ppcp_add_payment_method',
						array(
							'client_id'            => $c->get( 'button.client_id' ),
							'merchant_id'          => $c->get( 'api.merchant_id' ),
							'id_token'             => $id_token,
							'payment_methods_page' => wc_get_account_endpoint_url( 'payment-methods' ),
							'error_message'        => __( 'Could not save payment method.', 'woocommerce-paypal-payments' ),
							'verification_method'  => $verification_method,
							'ajax'                 => array(
								'create_setup_token'   => array(
									'endpoint' => \WC_AJAX::get_endpoint( CreateSetupToken::ENDPOINT ),
									'nonce'    => wp_create_nonce( CreateSetupToken::nonce() ),
								),
								'create_payment_token' => array(
									'endpoint' => \WC_AJAX::get_endpoint( CreatePaymentToken::ENDPOINT ),
									'nonce'    => wp_create_nonce( CreatePaymentToken::nonce() ),
								),
							),
						)
					);
				} catch ( RuntimeException $exception ) {
					$logger = $c->get( 'woocommerce.logger.woocommerce' );
					assert( $logger instanceof LoggerInterface );

					$error = $exception->getMessage();
					if ( is_a( $exception, PayPalApiException::class ) ) {
						$error = $exception->get_details( $error );
					}

					$logger->error( $error );
				}
			}
		);

		add_action(
			'woocommerce_add_payment_method_form_bottom',
			function () {
				if ( ! is_user_logged_in() || ! is_add_payment_method_page() ) {
					return;
				}

				echo '<div id="ppc-button-' . esc_attr( PayPalGateway::ID ) . '-save-payment-method"></div>';
			}
		);

		add_action(
			'wc_ajax_' . CreateSetupToken::ENDPOINT,
			static function () use ( $c ) {
				$endpoint = $c->get( 'save-payment-methods.endpoint.create-setup-token' );
				assert( $endpoint instanceof CreateSetupToken );

				$endpoint->handle_request();
			}
		);

		add_action(
			'wc_ajax_' . CreatePaymentToken::ENDPOINT,
			static function () use ( $c ) {
				$endpoint = $c->get( 'save-payment-methods.endpoint.create-payment-token' );
				assert( $endpoint instanceof CreatePaymentToken );

				$endpoint->handle_request();
			}
		);

		add_action(
			'woocommerce_paypal_payments_before_delete_payment_token',
			function( string $token_id ) use ( $c ) {
				try {
					$endpoint = $c->get( 'api.endpoint.payment-tokens' );
					assert( $endpoint instanceof PaymentTokensEndpoint );

					$endpoint->delete( $token_id );
				} catch ( RuntimeException $exception ) {
					$logger = $c->get( 'woocommerce.logger.woocommerce' );
					assert( $logger instanceof LoggerInterface );

					$error = $exception->getMessage();
					if ( is_a( $exception, PayPalApiException::class ) ) {
						$error = $exception->get_details( $error );
					}

					$logger->error( $error );
				}
			}
		);

		add_filter(
			'woocommerce_paypal_payments_credit_card_gateway_vault_supports',
			function( array $supports ) use ( $c ): array {
				$settings = $c->get( 'wcgateway.settings' );
				assert( $settings instanceof ContainerInterface );

				if ( $settings->has( 'vault_enabled_dcc' ) && $settings->get( 'vault_enabled_dcc' ) ) {
					$supports[] = 'tokenization';
				}

				return $supports;
			}
		);

		add_action(
			'wc_ajax_' . CaptureCardPayment::ENDPOINT,
			static function () use ( $c ) {
				$endpoint = $c->get( 'save-payment-methods.endpoint.capture-card-payment' );
				assert( $endpoint instanceof CaptureCardPayment );

				$endpoint->handle_request();
			}
		);
	}

	/**
	 * Adds id token to localized script data.
	 *
	 * @param UserIdToken     $api User id token api.
	 * @param LoggerInterface $logger The logger.
	 * @param array           $localized_script_data The localized script data.
	 * @return array
	 */
	private function add_id_token_to_script_data(
		UserIdToken $api,
		LoggerInterface $logger,
		array $localized_script_data
	): array {
		try {
			$target_customer_id = '';
			if ( is_user_logged_in() ) {
				$target_customer_id = get_user_meta( get_current_user_id(), '_ppcp_target_customer_id', true );
			}

			$id_token                                      = $api->id_token( $target_customer_id );
			$localized_script_data['save_payment_methods'] = array(
				'id_token' => $id_token,
			);

			$localized_script_data['data_client_id']['set_attribute'] = false;

		} catch ( RuntimeException $exception ) {
			$error = $exception->getMessage();
			if ( is_a( $exception, PayPalApiException::class ) ) {
				$error = $exception->get_details( $error );
			}

			$logger->error( $error );
		}

		return $localized_script_data;
	}
}

<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();


    ?>
    <section class="page-header" >

       <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="content text-center">

                    <h1 class="mb-3 text-white text-capitalize">404</h1>

                    <ul class="list-inline">

                        <li class="list-inline-item"><span class="text-theme">404</span></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<section class="aboutpagesec py-5">

    <div class="container">
	<header class="page-header alignwide">
		<h1 class="page-title"><?php esc_html_e( 'Nothing here', 'twentytwentyone' ); ?></h1>
	</header><!-- .page-header -->

	<div class="error-404 not-found default-max-width">
		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location' ); ?></p>
		
		</div><!-- .page-content -->
	</div><!-- .error-404 -->
	
	</div>
	</section>

<?php
get_footer();

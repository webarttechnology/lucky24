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

    <section class="contact-banner-page" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-text text-center">
                    <h1 data-aos="fade-down" data-aos-duration="1000">404</h1>
                </div>
            </div>
        </div>
    </div>
    <div
        class="uk-background-page-header-mask-bottom uk-position-absolute uk-position-z-index uk-height-viewport uk-width-1-1">
    </div>
</section>

    <section class="contact-form-page py-5">
 <div class="container">
 
    
   <div class="row">
              <div class="col-md-12">
                    <header class="page-header alignwide">
        <h1 class="page-title"><?php esc_html_e( 'Nothing here', '' ); ?></h1>
    </header><!-- .page-header -->

    <div class="error-404 not-found default-max-width">
        <div class="page-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location' ); ?></p>
        
        </div><!-- .page-content -->
    </div><!-- .error-404 -->
             </div>
            
     </div>

    

    </div>

    </section>

<?php
get_footer();

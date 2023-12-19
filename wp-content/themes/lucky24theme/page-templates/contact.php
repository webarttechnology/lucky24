<?php /* Template Name: contact */ 

get_header();
while(have_posts()):the_post();
?>
<!-- banner -->
<section class="contact-banner-page" style="background-image: url(<?php echo get_field('inner_banner'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-text text-center">
                    <h1 data-aos="fade-down" data-aos-duration="1000"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div
        class="uk-background-page-header-mask-bottom uk-position-absolute uk-position-z-index uk-height-viewport uk-width-1-1">
    </div>
</section>



<!-- form -->
<section class="contact-form-page py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form-text text-center">
                   <?php the_content(); ?>
                </div>
            </div>
            <?php endwhile; ?>

            <!-- form -->
            <div class="content">

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row align-items-center">
                            <div class="col-lg-7 mb-5 mb-lg-0">
                                <h2 class="mb-5"><?php the_field('contact_form_heading'); ?></h2>
                    
        <?php echo do_shortcode('[contact-form-7 id="99977a1" title="Contact page form" html_id="contactForm" html_class="border-right pr-5 mb-5"]'); ?>

                            </div>
                            <div class="col-lg-4 ml-auto">

                                <?php echo get_field('what_are_you_looking_for_text'); ?>
                                <div class="main_div touch_btns">
                                    <a href="<?php echo get_field('find_out_link'); ?>" class="get">
                                        <span><?php echo get_field('find_out_text'); ?></span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</section>
<?php get_footer(); ?>
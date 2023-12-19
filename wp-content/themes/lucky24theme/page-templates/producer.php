<?php /* Template Name: producer */ 


get_header();
while(have_posts()):the_post(); ?>


 <!-- banner -->

    <section class="producer-banner-page" style="background-image: url(<?php echo get_field('inner_banner'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="producer-text text-center">
                    <h1 data-aos="fade-down" data-aos-duration="1000"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div
        class="uk-background-page-header-mask-bottom uk-position-absolute uk-position-z-index uk-height-viewport uk-width-1-1">
    </div>
</section>
<?php endwhile; ?>


<!-- director-name -->
<section class="director-name py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="first-text">
                   <?php the_field('a_glance_into_the_directors_journey'); ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="director-img">
                    <img src="<?php the_field('directors_image'); ?>">
                </div>
            </div>

        
        <div class="col-lg-4 col-md-12">
            <div class="director-text">

          

                <?php the_field('important_event_in_the_directors_life'); ?>
            </div>
        </div>

        <div class="col-lg-8 col-md-12 director-name">
            <div class="director-text-principal">
             <?php the_field('details_about_managing_partner'); ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 director-name">
            <div class="director-img">
                <img src="<?php the_field('managing_partner_image'); ?>">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- banner -->
<section class="producer-help">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="producer-help-text text-center">
                    <h1><?php the_field('unforgettable_party_text'); ?></h1>
                    <div class="main_div touch_btn">
                        <a href="<?php the_field('unforgetable_party_link'); ?>" class="get">
                            <span><?php the_field('unforgetable_party_text'); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php get_footer(); ?>
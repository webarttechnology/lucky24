<?php /* Template Name: health */ 

get_header();
while(have_posts()):the_post(); ?>


 <!-- banner -->

    <section class="health-banner-page" style="background-image: url(<?php echo get_field('inner_banner'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="health-text text-center">
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

    <!--  -->
    <section class="heath-bg py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="health-bg-text">
                        <?php the_field('health_intro_text');

                     $diseaseawareness = CFS()->get('disease_awareness'); 

                     $awarenesscount = 0;

                         ?>
                          
                        <div class="row text-start">
                            <?php    foreach ( $diseaseawareness as $eachawareness ) 
                            { 
                                $awarenesscount++;

                    //echo $eachslide['list_items'];

                         if($awarenesscount==1)
                         {

                             ?>

                            <div class="col-md-12">
                                <div class="heath-text-box2">
                                    <h6><?php echo $eachawareness['disease_name']; ?></h6>
                                   <?php echo $eachawareness['disease_description']; ?>
                                </div>
                            </div>


                        <?php 

                       }
                       else
                       {
                        ?>
                          <div class="heath-text-box">
                                     <h6><?php echo $eachawareness['disease_name']; ?></h6>
                                   <?php echo $eachawareness['disease_description']; ?>
                                </div>

                     <?php
                        }

                  }

                     ?>
                      
                        </div>
                         <?php the_field('women_health_issue_tackling_text'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                    <div class="health-logo text-start">
                        <h2 class="text-start"><?php the_field('vendors_and_health_professionals_title'); ?></h2>
                        <?php the_field('vendors_and_health_professional_text'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="health-logo2 text-center">
                        <img src="<?php the_field('blake_anthony_foundation_image'); ?>">
                        <p><?php the_field('blake_anthony_title'); ?></p>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>

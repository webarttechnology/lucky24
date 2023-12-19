<?php /* Template Name: allocations */ 

get_header();
while(have_posts()):the_post();
 ?>
  
  <section class="allocations-banner" style="background-image: url(<?php echo get_field('inner_banner'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                    <h1 data-aos="fade-down" data-aos-duration="1000"><?php the_title(); ?></h1>
               
            </div>
        </div>
    </div>
    <div
        class="uk-background-page-header-mask-bottom uk-position-absolute uk-position-z-index uk-height-viewport uk-width-1-1">
    </div>
</section>

<!-- ..........................about us........................... -->
<section class="allocations-aboutus">
    <div class="container">
       <div class="row">
        <div class="col-md-6">
            <div class="allocation-text">
            <?php the_field('event_allocation_main_text'); ?>
        </div> 
        </div>
        <div class="pic col-md-6">
            <img src="<?php the_field('event_allocation_main_image'); ?>" alt="" style="width: 100%;">
        </div>
       </div> 
    </div>
</section>
<!-- ..................................nail-guns................................. -->
<section class="nail-guns">
    <div class="container">
        <h3><?php the_field('nail_guns_over_hand_guns_title'); ?></h3>
        </div>
        </section>

        <section class="white-color">
            <div class="container">
        <div class="row" style="text-align: left;">
            <div class="col-md-6" style="border-radius: 10%;">
                <?php the_field('nail_guns_over_hand_guns_text'); ?>
            </div>
            <div class="guns-image col-md-6">
                <img src="<?php echo get_field('nail_guns_over_hand_gun', get_the_ID()); ?>" alt="" style="border-radius: 10%;width: 100%;">
            </div>
        </div>
        </div>
    </section>

        <section class="back-color" style="background-color: #000;">
     <div class="container">
        <div class="row" style="text-align: left;">
            <div class="guns-image col-md-6">
                <img src="<?php echo get_field('first_allocation_image'); ?>" alt="" style="border-radius: 10%;width: 100%;">
            </div>
            <div class="col-md-6">
                <?php the_field('first_allocation_text'); ?>
            </div>
        </div>
    </div>
</section>

<section class="white-colors">
    <div class="container">
        <div class="row" style="width: 100%;">
            <div class="col-md-6">
               <?php the_field('second_allocation_text'); ?>
            </div>
            <div class="col-md-6">
                <img src="<?php the_field('second_allocation_image') ?>" alt=""style="border-radius: 10%;width: 100%;">
            </div>
        </div>
    </div>
    </section>

    <section class="back-color" style="background-color: #000;">
        <div class="container">
        <div class="row"style="text-align: left;">
            <div class="guns-image col-md-6">
                <img src="<?php the_field('third_allocation_image'); ?>" alt=""style="border-radius: 10%;width: 100%;">
            </div>
            <div class="col-md-6">
               <?php the_field('third_allocation_text'); ?>
            </div>
        </div>
        </div>
        </section>
        <section class="white-colorss">
            <div class="container">
        <div class="row" style="text-align: left;">
        <div class="col-md-6">
           <?php the_field('fourth_allocation_text'); ?>
        </div>
        <div class="col-md-6">
            <img src="<?php the_field('fourth_allocation_image'); ?>" alt="" style="border-radius: 10%;width: 100%;" >
        </div>
    </div>
    </div>
    </section>
    <section class="nail-guns2">
        <div class="container">
    <h3><?php the_field('after_and_before_gun_violence_title'); ?></h3>
    </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php endwhile; wp_reset_query(); ?>
  <?php get_footer(); ?>
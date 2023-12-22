<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
while(have_posts()):the_post();
    if(get_field('inner_banner')){
?>


 <!--Page Title-->
<section class="contact-banner-page" style="background-image: url(<?php echo get_field('inner_banner'); ?>);">
<?php }
else{
    ?>
    <section class="contact-banner-page" >
<?php }


 ?>
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
   
    <section class="contact-form-page py-5">
 <div class="container">
   <?php if( get_the_post_thumbnail_url(get_the_ID()) !='')
                    { ?>
        <div class="row">
              <div class="col-md-6">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
                
             </div>
             <div class="col-md-6">
                <?php the_content(); ?>
             </div>
        </div>
    <?php }
    else{
        ?>
   <div class="row">
              <div class="col-md-12">
                 <?php the_content(); ?>
             </div>
            
     </div>

    <?php 
       }

     ?>

    </div>

    </section>
<?php 
  endwhile;

get_footer();

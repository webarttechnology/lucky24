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

?>


<?php if(get_field('inner_banner')!=''){ ?>

<section class="page-header" style="background-image: <?php get_field('inner_banner'); ?>;">
<?php }
else{
    ?>
    <section class="page-header" >
<?php }

 while(have_posts()):the_post(); ?>


    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="content text-center">

                    <h1 class="mb-3 text-white text-capitalize"><?php the_title(); ?></h1>

                    <ul class="list-inline">

                        <li class="list-inline-item"><a href="<?php bloginfo('url'); ?>"> <i class="fa-solid fa-house"></i> Home</a></li>

                        <li class="list-inline-item">/</li>

                        <li class="list-inline-item"><span class="text-theme"><?php the_title(); ?></span></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="aboutpagesec py-5">

    <div class="container">

        <div class="row align-items-center">
         <?php if(get_the_post_thumbnail_url(get_the_ID())!='')
         { ?>

          <div class="col-md-6">

             <div class="aboutpgimg mb-5">

                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">

             </div>

          </div>

          <div class="col-md-6">

            <div class="aboutpgcnt mb-5">

            <?php the_content(); ?>

          </div>

          </div>
       <?php } 
       else{
         ?>
          <div class="col-md-12">

            <div class="aboutpgcnt mb-5">

            <?php the_content(); ?>

          </div>

          </div>

      <?php  }



       ?>

      </div>

  </div>

  </section>  


  <?php endwhile; 
  

get_footer();

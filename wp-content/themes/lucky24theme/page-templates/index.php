<?php /* Template Name: home */ 

get_header();

?>


<section class="home-banner" style="background-image: url(<?php echo get_field('first_banner_image'); ?>);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 62px 0;
    position: relative;">

<div class="container">
  <div class="row">
    <div class="col-md-12 home-additional-cls">
      <div class="banner-text text-center" data-aos="fade-down" data-aos-duration="1000">
        <h2><?php echo get_field('first_banner_heading'); ?></h2>
      </div>
      <div class="link text-center">
        <a href="<?php echo get_field('first_banner_button_link'); ?>"><?php echo get_field('first_banner_button_text'); ?></a>
      </div>
      <div class="home-border">
        <a href="<?php echo get_field('first_banner_border_link'); ?>" class="right-line"></a>
      </div>
    </div>
  </div>
</div>
<div
  class="uk-background-page-header-mask-bottom uk-position-absolute uk-position-z-index uk-height-viewport uk-width-1-1">
</div>
</section>
 <!-- banner-image -->

 <?php
 $secondbanner = get_field('second_banner_group');

 if($secondbanner){
 
 ?>
 <section class="banner-image">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="banner-pic">
            <img src="<?php echo $secondbanner['second_banner_image_1']; ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="banner-pics">
            <img src="<?php echo $secondbanner['second_banner_image_2']; ?>">
          </div>
        </div>

      </div>
      <div class="banner-image-text">
        <h1 data-aos="fade-down" data-aos-duration="1000"><?php echo $secondbanner['second_banner_heading']; ?></h1>
        <p><?php echo $secondbanner['second_banner_content']; ?></p>
        <div class="main_div touch_btn">
          <a href="<?php echo $secondbanner['second_banner_button_link']; ?>" class="get">
            <span><?php echo $secondbanner['second_banner_button_text']; ?></span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <?php } ?>

  <!-- luxery -->

  <?php
 $aboutsec = get_field('about_section_group');

 if($aboutsec){
 
 ?>
  <section class="luxary-place">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo $aboutsec['about_sec_left_side_image']; ?>" alt="" style="width: 100%; height: 100%;">
        </div>


        <div class="col-md-6">
          <div class="parent-luxary">
            <div class="luxary-text">
              <h2> <?php echo $aboutsec['about_sec_heading']; ?></h2>
              <?php echo $aboutsec['about_sec_content']; ?>
             <!-- <div class="main_div touch_btns">
                <a href="<?php echo $aboutsec['about_sec_button_link']; ?>" class="get">
                  <span><?php echo $aboutsec['about_sec_button_text']; ?></span>
                </a>
              </div>-->
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="padding: 40px;">
        <div class=" col-md-6">
          <div class="luxery-image">
            <img src="<?php echo $aboutsec['about_sec_bottom_image_1']; ?>" alt="" style="width: 100%;height: 100%;">
          </div>
        </div>
        <div class="col-md-6">
          <img src="<?php echo $aboutsec['about_sec_bottom_image_2']; ?>" alt="" style="width: 100%;">
        </div>

      </div>	
    </div>
  </section>
  <?php } ?>


<!--  Our Event Goal  -->

 <section class="event-goal">
    <?php  $eventgoalsec = get_field('event_goal_section_group');
        if($eventgoalsec){
     ?>
    <div class="container">
      <div class="row">
       
        <div class="col-md-6">
          <div class="eventgoal-text" style="color: #fff;">
			  <h2> <?php echo $eventgoalsec['event_goal_sec_heading']; ?> </h2>
			   <?php echo $eventgoalsec['event_goal_sec_content']; ?>
           <!-- <div class="button-box">
              <div class="main_div touch_btn">
                <a href="<?php echo $eventgoalsec['event_goal_sec_button_link']; ?>" class="get">
                  <span><?php echo $eventgoalsec['event_goal_sec_button_text']; ?></span>
                </a>
              </div>
            </div> -->
          </div>
        </div>
		  
		   <div class="col-md-6">
          <img src="<?php echo $eventgoalsec['event_goal_sec_left_side_image']; ?>" alt="" style="width: 100%; height: 100%;">
        </div>
		  
      </div>
    </div>
	 <?php } ?>
  </section>



<!-- Projected Talent  -->

  <?php
 $projectsec = get_field('Projected_section_group');

 if($projectsec){
 
 ?>
  <section class="projected-talent">
    <div class="container">
      <div class="row">
		  
		  <div class="col-md-6 Projected-parent-right-img">
          <img src="<?php echo $projectsec['Projected_sec_right_side_image']; ?>" alt="" style="width: 100%; height: 100%;">
        </div>
		  
               <div class="col-md-6 Projected-parent">
          <div class="parent-luxary">
            <div class="luxary-text">
              <h2> <?php echo $projectsec['Projected_sec_heading']; ?></h2>
              <?php echo $projectsec['Projected_sec_content']; ?>
             <!-- <div class="main_div touch_btns">
                <a href="<?php echo $projectsec['Projected_sec_button_link']; ?>" class="get">
                  <span><?php echo $projectsec['Projected_sec_button_text']; ?></span>
                </a>
              </div> -->
            </div>
          </div>
        </div>
		  
      </div>
      <div class="row" style="padding: 40px;">
        <div class=" col-md-3 Projected-parent">
          <div class="luxery-image">
            <img src="<?php echo $projectsec['Projected_sec_bottom_image_1']; ?>" alt="" style="width: 100%;height: 100%;">
          </div>
        </div>
        <div class="col-md-3 Projected-parent">
          <img src="<?php echo $projectsec['Projected_sec_bottom_image_2']; ?>" alt="" style="width: 100%;">
        </div>
		   <div class=" col-md-3 Projected-parent">
          <div class="luxery-image">
            <img src="<?php echo $projectsec['Projected_sec_bottom_image_3']; ?>" alt="" style="width: 100%;height: 100%;">
          </div>
        </div>
        <div class="col-md-3 Projected-parent">
          <img src="<?php echo $projectsec['Projected_sec_bottom_image_4']; ?>" alt="" style="width: 100%;">
        </div>

      </div>	
    </div>
  </section>
  <?php } ?>



<!--  donation  -->

 <section class="donation">
    <?php  $donationsec = get_field('donation_section_group');
        if($donationsec){
     ?>
    <div class="container">
      <div class="row">
       
        <div class="col-md-12">
          <div class="eventgoal-text" style="color: #fff;">
			  <h2> <?php echo $donationsec['donation_sec_heading']; ?> </h2>
			   <?php echo $donationsec['donation_sec_content']; ?>
            <div class="button-box">
              <div class="main_div touch_btn">
                <a href="<?php echo $donationsec['donation_sec_button_link']; ?>" class="get">
                  <span><?php echo $donationsec['donation_sec_button_text']; ?></span>
                </a>
              </div>
            </div>
          </div>
        </div>
		  
      </div>
    </div>
	 <?php } ?>
  </section>



  <!-- unforgettable -->
  <section class="unforgettable ">
    <?php  $productidarray = get_field('select_product');
         $prodcount = 0;
          foreach($productidarray as $eachprodid)
          {
            $prodcount++;
            if($prodcount==1)
            {
              $firstprodid = $eachprodid;
            }
            else
            {
              $secondprodid = $eachprodid;
            }

          }

     ?>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo get_the_post_thumbnail_url($firstprodid); ?>" alt="" style="width: 100%; height: 100%;">
        </div>
        <div class="col-md-6">
          <div class="unforgettable-text" style="color: #fff;">
            <?php the_field('product_section_big_text'); ?>
            <div class="button-box">
              <div class="main_div touch_btn">
                <a href="<?php echo get_site_url(); ?>/shop" class="get">
                  <span><?php the_field('find_out_more_label'); ?></span>
                </a>
              </div>
              <img src="<?php echo get_the_post_thumbnail_url($secondprodid); ?>" alt=""
                style="height: 100%;width: 100%; padding-top: 30px;" class="image-right">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- london -->

  <?php
 $dreamcar = get_field('wedding_car_section_group');

 if($dreamcar){
 
 ?>
  <section class="London">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2><?php echo $dreamcar['wedding_car_title']; ?>
          </h2>
          <p><?php echo $dreamcar['wedding_car_content']; ?></p>
          <div class="london-button-box">
            <!--<div class="main_div touch_btns">
              <a href="<?php echo $dreamcar['wedding_car_button_link']; ?>" class="get">
                <span><?php echo $dreamcar['wedding_car_button_text']; ?></span>
              </a>
            </div> -->
            <img src="<?php echo $dreamcar['wedding_car_left_image']; ?>" alt=""
              style="padding-top: 80px; width: 100%; height: 100%;">
          </div>
        </div>
        <div class="col-md-6">
          <img src="<?php echo $dreamcar['wedding_car_right_image']; ?>" alt="" style="width: 100%; height: 100%;">
        </div>
      </div>
    </div>
  </section>

  <?php } ?>

  <!-- star -->

  <?php
 $startsec = get_field('starts_section_group');

 if($startsec){
 
 ?>
  <section class="starts" style="background-image: url(<?php echo $startsec['starts_section_background_image']; ?>);
    background-repeat: no-repeat;
    background-size: cover;
    padding: 180px 0;
    text-align: center;
    position: relative;">
    <div class="container">
      <div class="overlay2"></div>
      <h2><?php echo $startsec['starts_section_title']; ?></h2>
      <!--<div class="main_div touch_btn">
        <a href="<?php echo $startsec['starts_section_button_link']; ?>" class="get">
          <span><?php echo $startsec['starts_section_button_text']; ?></span>
        </a>
      </div> -->
    </div>
  </section>
<?php } ?>
  <!-- inspire -->

  <section class="inspire" style="padding: 80px 0; text-align: center;">
    <div class="container">
      <h2><?php echo CFS()->get('wedding_gallery_main_heading'); ?></h2>
      <div class="row ins-image">
      <?php 
  $i = 1;
$Galleryloop = CFS()->get('wedding_gallery_loop');
  
  if(is_array($Galleryloop) || is_object($Galleryloop)){

    foreach($Galleryloop as $Galleryloopitem){
      if($i==3){
        break;
      }
  
  ?>
        <div class="col-md-6">
          
          <div class="item">
            <a href="<?php echo $Galleryloopitem['wedding_image_link']; ?>">
              <div class="img" style="height: 100%;
    background-size: cover;
    background-position: center;
    border-radius: 4px;
    transition: all 0.7s ease;
    background-image: url(<?php echo $Galleryloopitem['wedding_gallery_image']; ?>);"></div>
              <p class="inspire-title">A Wedding at Ragley Hall, Warwickshire.</p>
            </a>
          </div>
         
          <div class="item">
            <a href="<?php echo $Galleryloopitem['wedding_image_link_2']; ?>">
              <div class="img img2" style="background-image: url(<?php echo $Galleryloopitem['wedding_image_2']; ?>);
    background-repeat: no-repeat;height: 100%;
    background-size: cover;
    background-position: center;
    border-radius: 4px;
    transition: all 0.7s ease;"></div>
              <p class="inspire-title">A Wedding at Lulworth Castle , Dorset</p>
            </a>
          </div>
        </div>
        <?php $i++; } } ?>
       
        
      </div>
      <div class="row" style="justify-content: center;">
        <div class="col-md-2">
          <!--<div class="main_div touch_btns">
            <a href="<?php echo CFS()->get('find_out_more_button_link'); ?>" class="get">
              <span><?php echo CFS()->get('find_out_more_button'); ?></span>
            </a>
          </div>-->

        </div>
      </div>
    </div>
  </section>

  <!-- news -->
  <section class=" news">
    <div class="container">
      <h2><?php echo get_field('latest_news_section_main_heading'); ?></h2>
      <div class="row">
      <?php
      $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'id',
        'order' => 'ASC',
      );

      $loop = new WP_Query($args);
while ($loop->have_posts()) : $loop->the_post();
        $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );
      ?>

        <div class="col-md-4">
          <div class="item">
            <a href="<?php the_permalink(); ?>">
              <div class="img" style="height: 100%;
    background-size: cover;
    background-position: center;
    border-radius: 4px;
    transition: all 0.7s ease;
     background-image: url(<?php echo $image; ?>);"></div>
              <p class="news-title"><?php the_title(); ?></p>
            </a>
          </div>
        </div>
        <?php endwhile;

wp_reset_postdata();
 ?>
        
      </div>
    </div>
  </section>


<?php get_footer(); ?>
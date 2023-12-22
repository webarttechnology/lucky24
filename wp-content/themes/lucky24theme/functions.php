<?php

/**

 * lucky24theme

 *

 * @package Lifestyle

 */





if ( ! function_exists( 'myfirsttheme_setup' ) ) :

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which runs

 * before the init hook. The init hook is too late for some features, such as indicating

 * support post thumbnails.

 */

function myfirsttheme_setup() {

 

    /**

     * Make theme available for translation.

     * Translations can be placed in the /languages/ directory.

     */

    load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );

 

    /**

     * Add default posts and comments RSS feed links to &lt;head>.

     */

    add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

 

    /**

     * Enable support for post thumbnails and featured images.

     */

    add_theme_support( 'post-thumbnails' );

 

    /**

     * Add support for two custom navigation menus.

     */

    register_nav_menus( array(

        'primary'   => __( 'Primary Menu', 'myfirsttheme' ),

        'secondary' => __('Secondary Menu', 'myfirsttheme' )

    ) );

 

    /**

     * Enable support for the following post formats:

     * aside, gallery, quote, image, and video

     */

    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
    add_theme_support('woocommerce');

}

endif; // myfirsttheme_setup

add_action( 'after_setup_theme', 'myfirsttheme_setup' );





function register_navwalker(){

    require_once get_template_directory() . '/Walker/functions.php';

}

add_action( 'after_setup_theme', 'register_navwalker' );





function get_id_by_slug($page_slug) {

    $page = get_page_by_path($page_slug);

    if ($page) {

        return $page->ID;

    } else {

        return null;

    }

} 





function my_login_logo_url() {

    return home_url();

}

add_filter( 'login_headerurl', 'my_login_logo_url' );

function custom_login_logo() {

   /* echo '<style type="text/css">'.

    '.login h1 {background:#29bb89 !important; padding: 30px 0px 1px 0px;}'.

             'h1 a { background-image:url('.get_site_url().'/wp-content/uploads/2021/09/Layer-2.png) !important; height:auto !important; width:auto !important; background-size: auto !important;}'.

         '</style>';	*/



          echo '<style type="text/css">'.

    '.login h1 { padding: 5px 0px 1px 0px;}'.

             'h1 a { background-image:url('.get_site_url().'/wp-content/uploads/2023/01/logo.png) !important; width:auto !important; height:132px !important; background-size: auto !important;}'.

         '</style>';	

	

	

}


add_action( 'login_head', 'custom_login_logo' );



// Now, just make sure that function runs when you're on the login page and admin pages  

//add_action('login_head', 'add_favicon');

//add_action('admin_head', 'add_favicon');







add_filter( 'wpcf7_validate_text*', 'custom_text_validation_filter2', 10, 2 );



function custom_text_validation_filter2( $result, $tag ) {

    if ( 'firstname' == $tag->name ) {

        // matches any utf words with the first not starting with a number

        $re = '/[^A-Za-z_-]/';

  //$re2 = '^[0-9]';

        if (preg_match($re, $_POST['firstname'], $matches)) {

            $result->invalidate($tag, "This is not a valid First name!" );

        }

    }



    return $result;

}



add_filter( 'wpcf7_validate_text*', 'custom_text_validation_filter3', 11, 2 );



function custom_text_validation_filter3( $result1, $tag ) {

    if ( 'lastname' == $tag->name ) {

        // matches any utf words with the first not starting with a number

        $re = '/[^A-Za-z_-]/';

  //$re2 = '^[0-9]';

        if (preg_match($re, $_POST['lastname'], $matches)) {

            $result1->invalidate($tag, "This is not a valid Last name!" );

        }

    }



    return $result1;

}



add_filter( 'wpcf7_validate_text*', 'custom_text_validation_filter4', 11, 2 );



function custom_text_validation_filter4( $result2, $tag ) {

    if ( 'yourname' == $tag->name ) {

        // matches any utf words with the first not starting with a number

        $re = '/[^A-Za-z_ -]/';

  //$re2 = '^[0-9]';

        if (preg_match($re, $_POST['yourname'], $matches)) {

            $result2->invalidate($tag, "This is not a valid name!" );

        }

    }



    return $result2;

}



function custom_phone_validation($result2,$tag){



    $type = $tag->type;

    $name = $tag->name;



    if($type == 'tel' || $type == 'tel*'){



        $phoneNumber = isset( $_POST[$name] ) ? trim( $_POST[$name] ) : '';



       if (preg_match("/\\s/", $phoneNumber)) {

    $result2->invalidate($tag, "The telephone number is invalid." );

        }

    

    return $result2;

}

}

add_filter('wpcf7_validate_tel','custom_phone_validation', 10, 2);

add_filter('wpcf7_validate_tel*', 'custom_phone_validation', 10, 2);







add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {

	$wp_admin_bar->remove_node( 'wp-logo' );

}






function wpb_sender_email($original_email_address)

{

    return 'info@infinitecollision.com ';

}





add_filter('wp_mail_from', 'wpb_sender_email');




function wpb_sender_name( $original_email_from ) {

	return 'info@lucky23concert.org';

}





add_filter( 'wp_mail_from_name', 'wpb_sender_name' );







/*add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {



  show_admin_bar(false);



}*/



/*function register_navwalker(){

	require_once get_template_directory() . '/Walker/class-wp-bootstrap-navwalker.php';

}

add_action( 'after_setup_theme', 'register_navwalker' ); */



add_filter( 'auto_update_plugin', '__return_false' );

add_filter( 'auto_update_theme', '__return_false' );



   





function prefix_create_testimonials() {
   

    $labels = array(

        'name'          => 'Testimonials', 

        'singular_name' => 'Testimonial'   

    );

  

    $supports = array(

        'title',        

        'editor',       

        'excerpt',      

        'author',       

        'thumbnail',   

        'comments',    

        'trackbacks',   

        'revisions',   

        'custom-fields' 

    );


   

    $args = array(

        'labels'              => $labels,

        'description'         => 'Post type ourtestimonials', 

        'supports'            => $supports,

        'hierarchical'        => false, 

        'public'              => true,  

        'show_ui'             => true,  

        'show_in_menu'        => true,  
        'show_in_nav_menus'   => true,  

        'show_in_admin_bar'   => true,  

        'menu_position'       => 5,     

        'menu_icon'           => true,  

        'can_export'          => true,  

        'has_archive'         => true,  

        'exclude_from_search' => false, 

        'publicly_queryable'  => true,  

        'capability_type'     => 'post',
        'rewrite'            => true

    );



    register_post_type('our-testimonials', $args); 
}

add_action('init', 'prefix_create_testimonials');




function prefix_create_ourworks() {
   

    $labels = array(

        'name'          => 'Ourworks', 

        'singular_name' => 'Ourwork'   

    );

  

    $supports = array(

        'title',        

        'editor',       

        'excerpt',      

        'author',       

        'thumbnail',   

        'comments',    

        'trackbacks',   

        'revisions',   

        'custom-fields' 

    );


   

    $args = array(

        'labels'              => $labels,

        'description'         => 'Post type ourworks', 

        'supports'            => $supports,

        'hierarchical'        => false, 

        'public'              => true,  

        'show_ui'             => true,  

        'show_in_menu'        => true,  
        'show_in_nav_menus'   => true,  

        'show_in_admin_bar'   => true,  

        'menu_position'       => 5,     

        'menu_icon'           => true,  

        'can_export'          => true,  

        'has_archive'         => true,  

        'exclude_from_search' => false, 

        'publicly_queryable'  => true,  

        'capability_type'     => 'post',
        'rewrite'            => true

    );



    register_post_type('our-works', $args); 
}

add_action('init', 'prefix_create_ourworks');


function add_custom_taxonomies_forwork() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('worktype', 'our-works', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Worktypes', 'taxonomy general name' ),
      'singular_name' => _x( 'Worktype', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Worktype' ),
      'all_items' => __( 'All Worktypes' ),
      'parent_item' => __( 'Parent Worktype' ),
      'parent_item_colon' => __( 'Parent Worktype:' ),
      'edit_item' => __( 'Edit Worktype' ),
      'update_item' => __( 'Update Worktype' ),
      'add_new_item' => __( 'Add New Worktype' ),
      'new_item_name' => __( 'New Worktype Name' ),
      'menu_name' => __( 'Worktypes' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'worktypes', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies_forwork', 0 );





/*function slug_provide_walker_instance( $args ) {

    if ( isset( $args['walker'] ) && is_string( $args['walker'] ) && class_exists( $args['walker'] ) ) {

        $args['walker'] = new $args['walker'];

    }

    return $args;

}

add_filter( 'wp_nav_menu_args', 'slug_provide_walker_instance', 1001 );*/







 function slugify($text, string $divider = '-')

{

  // replace non letter or digits by divider

  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate

  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);



  // remove unwanted characters

  $text = preg_replace('~[^-\w]+~', '', $text);



  // trim

  $text = trim($text, $divider);



  // remove duplicate divider

  $text = preg_replace('~-+~', $divider, $text);



  // lowercase

  $text = strtolower($text);



  if (empty($text)) {

    return 'n-a';

  }



  return $text;

}



    /*  add active class in the anchor */


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'current ';
  }
  return $classes;
}



/*add_action( 'wpcf7_init', 'wpcf7_add_form_tag_text12' );
 
function wpcf7_add_form_tag_text12() {
  wpcf7_add_form_tag(
    array( 'time', 'time*' ),
    'wpcf7_text_form_tag_handler',
    array( 'name-attr' => true )
  );
}*/



function k99_relative_time() { 
    $post_date = get_the_time('U');
    $delta = time() - $post_date;
    if ( $delta < 60 ) {
        echo 'Less than a minute ago';
    }
    elseif ($delta > 60 && $delta < 120){
        echo 'About a minute ago';
    }
    elseif ($delta > 120 && $delta < (60*60)){
        echo strval(round(($delta/60),0)), ' minutes ago';
    }
    elseif ($delta > (60*60) && $delta < (120*60)){
        echo 'About an hour ago';
    }
    elseif ($delta > (120*60) && $delta < (24*60*60)){
        echo strval(round(($delta/3600),0)), ' hours ago';
    }
    else {
        echo the_time('j\<\s\u\p\>S\<\/\s\u\p\> M y g:i a');
    }
}




function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        if(isset($_GET['post_type'])) {
            $type = $_GET['post_type'];
                if($type == 'ourservice') {
                    $query->set('post_type',array('ourservice'));
                }
        }       
    }
return $query;
}
add_filter('pre_get_posts','searchfilter');




function update_price() 
{
    $postid = $_POST['formid'];

    $service = $_POST['service'];/* this is servicename */
    if($service=='Engine Diagnostic & Repair')
    {

        $updatedprice = 100;
         

     }
      else if($service=='Maintanence Inspection')
    {

        $updatedprice = 200;
         

     }
        else if($service=='Electrical System Diagnostic')
    {

        $updatedprice = 300;
         

     }

     else if($service=='Wheel Allignment & Installation')
    {

        $updatedprice = 400;
         

     }
     else if($service=='Air Conditioner Service & Repair')
    {

        $updatedprice = 500;
         

     }
     else{
        $updatedprice = 0;
     }
     if(update_post_meta($postid,'_cf7pp_price',$updatedprice))
     {
        echo 'success';
     }
     else
     {
        echo 'failed';
     }
       
        wp_die();  

}

add_action( 'wp_ajax_nopriv_update_price', 'update_price' );
add_action( 'wp_ajax_update_price', 'update_price' );






function start_session() {
if(!session_id()) {
session_start();
}
}
add_action('init', 'start_session', 1);



function wpcf7_before_send_mail_function( $contact_form, $abort, $submission ) 
{
  
   // $post_id = $submission->get_meta('container_post_id');
    $form_id = $contact_form->id();
    if($form_id==240)
    {
         // do something 
        $_SESSION['payonline'] = 'yes';
    }

    return $contact_form;
    
}
add_filter( 'wpcf7_before_send_mail', 'wpcf7_before_send_mail_function', 10, 3 );



add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

function wpse156165_menu_add_class( $atts, $item, $args ) {
    $class = 'nav-link header-menu-list'; // or something based on $item
    $atts['class'] = $class;
   
    return $atts;
}














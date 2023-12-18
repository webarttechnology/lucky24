<!doctype html>
<html lang="en">

<head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- google-font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- custom-css -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- responsive-css -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/responsive.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>

 <body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php $pageid = get_id_by_slug('site-general-settings'); 

 //$socialrows = CFS()->get('social_loop',$pageid );
?>

    <!-- header -->
    <header class="header-part" id="navbar">

        <nav class="navbar navbar-light header-list fixed-top d-transparent">
            <div class="container">
                <div class="main_div touch_btn">
                    <a href="<?php echo get_site_url(); ?>/contact" class="get">
                        <span><?php echo get_field('get_in_touch_text',$pageid); ?></span>
                    </a>
                </div>
                <div class="logo">
                    <a href="<?php echo get_site_url(); ?>"><?php echo get_field('logo_text',$pageid); ?></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon menu-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end heder-menu-part" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel d-none">
                    <div class="offcanvas-header">
                        <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5> -->
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body d-flex">
                   
                                     <?php
                                        wp_nav_menu(array(
                                            'menu' => 'main menu',
                                            'items_wrap' => '<ul class="navbar-nav header-nav-menu justify-content-ceneter flex-grow-1 pe-3">%3$s</ul>'
                                                                             
                                           
                                        ));   
                                        ?>

                        <div class="home-address">
                            <ul>
                                
                                    <li><?php echo get_field('phone',$pageid); ?></li>
                                    <li><?php echo get_field('email',$pageid); ?></li>
                            </ul>

                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </header>
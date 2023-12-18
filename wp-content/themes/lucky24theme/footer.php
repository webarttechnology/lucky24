<footer class="home-footer">
<?php $pageid = get_id_by_slug('site-general-settings'); 




 //$socialrows = CFS()->get('social_loop',$pageid );
?>
    <div class="container">
        <div class="footer-up">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-part">
                        <?php echo get_field('we_would_love_to_here_text',$pageid); ?>
                    </div>
                    <nav class="footer-icon">
                        <a href="<?php echo get_field('instagram',$pageid); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="<?php echo get_field('facebook',$pageid); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="<?php echo get_field('pinterest',$pageid); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </nav>
                </div>
                <div class="col-md-6 text-left">
                    <div class="footer-menu">
                      
                        <ul>
                            <li><a href="tel:<?php echo get_field('phone',$pageid); ?>"><?php echo get_field('phone',$pageid); ?></a></li>
                            <li><a href="mailto:<?php echo get_field('email',$pageid); ?>"><?php echo get_field('email',$pageid); ?></a></li>
                            <li><?php echo get_field('site_address',$pageid); ?></li>
                        </ul>
                    </div>
                </div>

          
            </div>
        </div>


        <div class="footer-bottom">

            <div class="row bootom">
                <div class="col-md-4">
                    <div class="footer-bottom-logo">
                        <a href="<?php echo get_site_url(); ?>"><?php echo get_field('logo_text',$pageid); ?></a>
                    </div>
                </div>
                <div class="col-md-8 text-end">
                    <div class="bottom-menu-part">
                        <?php if($arrayquicklink = wp_get_nav_menu_items('Footer quick links')){ 

                                                       
                            ?>
                        <nav>
                            <h6><?php echo get_field('footer_quick_links_heading',$pageid); ?></h6>
                            <?php foreach($arrayquicklink as $eachquicklink){ ?>
                            <a href="<?php echo $eachquicklink->url; ?>"><?php echo $eachquicklink->title;  ?></a>
                            <?php } ?>
                           
                        </nav>
                    <?php } ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="bootom-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="bootom-text text-center">
                        <nav>
                            <?php if($arrayotherlink = wp_get_nav_menu_items('Other menu')){ 
                                foreach($arrayotherlink as $eachotherlink){
                                ?>
                            <a href="<?php echo $eachotherlink->url; ?>"><?php echo $eachotherlink->title;  ?></a>
                              <?php }

                               }

                              ?>
                           

                            © <?php echo date('Y'); ?><?php echo get_field('copyright_text',$pageid); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- js -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>



    <?php wp_footer(); ?>
</body>

</html>
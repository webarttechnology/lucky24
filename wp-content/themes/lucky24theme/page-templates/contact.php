<?php /* Template Name: contact */ 

get_header();

?>
<!-- banner -->
<section class="contact-banner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-text text-center">
                    <h1 data-aos="fade-down" data-aos-duration="1000">Contact</h1>
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
                    <h1>Get In Touch</h1>
                    <p>Stay connected with us by getting in touch. Whether you have a question,
                        comment, or just want to say hi, we would love to hear from you. You can
                        reach us through our website, social media, or by email. Don’t
                        hesitate to contact us – we’re here to help and always happy
                        to hear from you.</p>
                </div>
            </div>

            <!-- form -->
            <div class="content">

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row align-items-center">
                            <div class="col-lg-7 mb-5 mb-lg-0">
                                <h2 class="mb-5">Fill this form</h2>
                                <form class="border-right pr-5 mb-5" method="post" id="contactForm" name="contactForm">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" name="fname" id="fname"
                                                placeholder="First name">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" name="lname" id="lname"
                                                placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" name="message" id="message" cols="30"
                                                rows="7" placeholder="Write your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 message-button">
                                            <input type="submit" value="Submit Now"
                                                class="btn btn-primary rounded-0 py-2 px-4">
                                            <span class="submitting"></span>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <div class="col-lg-4 ml-auto">
                                <h3 class="mb-4">Tell us what you’re looking for by calling, emailing or by
                                    using the form below</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil deleniti
                                    itaque similique magni. Magni, laboriosam perferendis maxime!</p>
                                <div class="main_div touch_btns">
                                    <a href="#" class="get">
                                        <span>FIND OUT MORE</span>
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
<?php include("header.php") ?>

<!-- banner -->
<section class="account-banner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="account-text text-center">
                    <h1 data-aos="fade-down" data-aos-duration="1000">My Account</h1>
                </div>
            </div>
        </div>
    </div>
    <div
        class="uk-background-page-header-mask-bottom uk-position-absolute uk-position-z-index uk-height-viewport uk-width-1-1">
    </div>
</section>

<!-- my account -->
<section class="account-design">
    <div class="container">
        <div class="acount-file">
            <!-- login -->
            <div class="row">
                <div class="col-md-6">
            <div class="login">

                <i class="fas fa-sign-in-alt"></i>
                <strong>Welcome!</strong>
                <span>Sign in to your account</span>

                <form>
                    <fieldset>
                        <div class="form">
                            <div class="form-row">

                                <label class="form-label" for="input">Name</label>
                                <input type="text" class="form-text" placeholder="enter your name">
                            </div>
                            <div class="form-row">

                                <label class="form-label" for="input">Password</label>
                                <input type="text" class="form-text" placeholder="enter password">
                            </div>
                            <div class="form-row bottom">
                                <div class="form-check">
                                    <input type="checkbox" id="remenber" name="remenber" value="remenber">
                                    <label for="remenber">remenber me?</label>
                                </div>
                                <a href="" class="forgot">forgot password?</a>
                            </div>
                            <div class="form-row button-login">
                                <button class="btn btn-login">Sign in <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            </div>
            <!-- register -->
<div class="col-md-6">
            <div class="register">

                <strong>Create account!</strong>
                <form>
                    <fieldset>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-user"></i>
                                <label class="form-label" for="input">Name</label>
                                <input type="text" class="form-text" placeholder="enter your name">
                            </div>
                            <div class="form-row">
                                <i class="fas fa-envelope"></i>
                                <label class="form-label" for="input">E-mail</label>
                                <input type="text" class="form-text" placeholder="enter your e-mail">
                            </div>
                            <div class="form-row">
                                <i class="fas fa-lock"></i>
                                <label class="form-label" for="input">Password</label>
                                <input type="text" class="form-text" placeholder="enter a name">
                            </div>
                            <div class="form-row button-login">
                                <button class="btn btn-login">Create <i class="fa fa-arrow-right"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </fieldset>
                </form>

                <span class="create-account">Or create account using social media!</span>

                <div class="social-media">
                    <i class="fa fa-facebook-official" aria-hidden="true"></i>
                    <i class="fa fa-twitter-square" aria-hidden="true"></i>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php") ?>
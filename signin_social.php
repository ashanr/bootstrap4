<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php require_once './include/Header.php'; ?>
    </head>
    <body>
        <header id="masthead-pro">
            <div class="container">



                <button class="btn btn-header-pro noselect" data-toggle="modal" data-target="#LoginModal" role="button">Sign In</button>

                <div id="mobile-bars-icon-pro" class="noselect"><i class="fas fa-bars"></i></div>

                <div class="clearfix"></div>
            </div><!-- close .container -->

            <nav id="mobile-navigation-pro">

                <ul id="mobile-menu-pro">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="dashboard-home.html">New Releases</a>
                        <!-- Mobile Sub-Menu Example >
                        <ul>
                                <li class="normal-item-pro">
                                        <a href="#!">Sub-menu item 1</a>
                                </li>
                                <li class="normal-item-pro">
                                        <a href="#!">Sub-menu item 2</a>
                                </li>
                                <li class="normal-item-pro">
                                        <a href="#!">Sub-menu item 3</a>
                                </li>
                        </ul>
                        < End Mobile Sub-Menu Example -->
                    </li>
                    <li>
                        <a href="signup-step1.html">Pricing Plans</a>
                    </li>
                    <li>
                        <a href="faqs.html">FAQs</a>
                    </li>
                </ul>
                <div class="clearfix"></div>

                <button class="btn btn-mobile-pro btn-green-pro noselect" data-toggle="modal" data-target="#LoginModal" role="button">Sign In</button>

            </nav>
        </header>


        <div id="content-pro">

            <div class="container">

                <div class="">
                    <button type="button" class="close float-close-pro" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header-pro">
                                <h2>Welcome Back</h2>
                                <h6>Sign in to your account to continue using SKRN</h6>
                            </div>
                            <div class="modal-body-pro social-login-modal-body-pro">

                                <div class="registration-social-login-container">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-green-pro btn-display-block">Sign In</button>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row no-gutters">
                                                <div class="col checkbox-remember-pro"><input type="checkbox" id="checkbox-remember"><label for="checkbox-remember" class="col-form-label">Remember me</label></div>
                                                <div class="col forgot-your-password"><a href="#!">Forgot your password?</a></div>
                                            </div>
                                        </div><!-- close .container-fluid -->

                                    </form>

                                    <div class="registration-social-login-or">or</div>

                                </div><!-- close .registration-social-login-container -->

                                <div class="registration-social-login-options">
                                    <h6>Sign in with your social account</h6>
                                    <div class="social-icon-login facebook-color"><i class="fab fa-facebook-f"></i> Facebook</div>
                                    <div class="social-icon-login twitter-color"><i class="fab fa-twitter"></i> Twitter</div>
                                    <div class="social-icon-login google-color"><i class="fab fa-google-plus-g"></i> Google</div>
                                </div><!-- close .registration-social-login-options -->

                                <div class="clearfix"></div>


                            </div><!-- close .modal-body -->

                            <a class="not-a-member-pro" href="signup-step2.html">Not a member? <span>Join Today!</span></a>
                        </div><!-- close .modal-content -->
                    </div><!-- close .modal-dialog -->
                </div>


                <div style="height:35px;"></div>

                <div class="clearfix"></div>
            </div><!-- close .container -->


            <hr>

        </div><!-- close #content-pro -->

        <footer id="footer-pro">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <div class="copyright-text-pro">&copy; Copyright 2018 SKRN. All Rights Reserved</div>
                    </div><!-- close .col -->
                    <div class="col-md">
                        <ul class="social-icons-pro">
                            <li class="facebook-color"><a href="http://facebook.com/progressionstudios" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="twitter-color"><a href="http://twitter.com/Progression_S" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li class="youtube-color"><a href="http://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            <li class="vimeo-color"><a href="http://vimeo.com" target="_blank"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div><!-- close .col -->
                </div><!-- close .row -->
            </div><!-- close .container -->
        </footer>

        <a href="#0" id="pro-scroll-top"><i class="fas fa-chevron-up"></i></a>


        <!-- Modal -->
        <!-- close .modal -->

        <?php require_once './include/systemFooter.php'; ?>

    </body>
</html>
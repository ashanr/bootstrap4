<?php
error_reporting(E_ALL); // Enabling Error Reporting
ini_set('display_errors', 1);
require_once './config/dbc.php'; // Database Configuration File
require_once './class/systemSetting.php'; // Database Query Settings File
$system = new setting();
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
?>
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
                        -->                        <ul>
                            <li class="normal-item-pro">
                                <a href="#!">Sub-menu item 1</a>
                            </li>
                            <li class="normal-item-pro">
                                <a href="#!">Sub-menu item 2</a>
                            </li>
                            <li class="normal-item-pro">
                                <a href="#!">Sub-menu item 3</a>
                            </li>
                        </ul><!--
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

                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header-pro">
                                <h2>Welcome </h2>
                                <h6>Sign in to your account to continue</h6>
                            </div>
                            <div class="modal-body-pro social-login-modal-body-pro">

                                <div class="container">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="userName" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="logSystem" class="btn btn-green-pro btn-display-block">Sign In</button>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row no-gutters">
                                                <div class="col checkbox-remember-pro"><input type="checkbox" id="checkbox-remember"><label for="checkbox-remember" class="col-form-label">Remember me</label></div>
                                            </div>
                                        </div><!-- close .container-fluid -->
                                    </form>
                                </div><!-- close .registration-social-login-container -->
                                <div class="clearfix"></div>
                            </div><!-- close .modal-body -->
                        </div><!-- close .modal-content -->
                    </div><!-- close .modal-dialog -->
                </div>              
                <div style="height:35px;"></div>
                <div class="clearfix"></div>
            </div><!-- close .container -->


            <hr>

        </div><!-- close #content-pro -->

        <?php require_once './include/Footer.php'; ?>
        <a href="#0" id="pro-scroll-top"><i class="fas fa-chevron-up"></i></a>


        <?php require_once './include/systemFooter.php'; ?>

    </body>
</html>
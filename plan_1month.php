<?php
error_reporting(E_ALL); // Enabling Error Reporting
ini_set('display_errors', 1);
require_once './config/dbc.php'; // Database Configuration File
require_once './class/systemSetting.php'; // Database Query Settings File
$system = new setting();
session_start();
?>
<!DOCTYPE HTML>

<html lan="en">
    <head>
        <?php require_once './include/Header.php'; ?>
        <?php require_once './include/systemHeader.php'; ?>

        <style type="text/css">
            .datepicker {
                font-size: 0.875em;
            }
            /* solution 2: the original datepicker use 20px so replace with the following:*/

            .datepicker td, .datepicker th {
                width: 1.5em;
                height: 1.5em;
            }

        </style>
    </head>

    <body>

        <div class="main-wrapper">
            <div class="app" id="app">
                <?php // require 'include/sidebar.php'; ?>
                <header class="header" style="background-color:#6e716e">
                    <div class="header-block header-block-collapse "  style="margin-left:30px;">
                        <a href="packages.php" style="text-decoration:none" >
                            <h2 style="color:#f0f0f0"> Home</h2>
                        </a>
                    </div>

                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>


                    <div class="header-block" >
                        <a class="btn" style="margin-left:40px;">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <?php //require_once './include/mobile_menu.php'; ?>
                </header>




                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content dashboard-page">

                    <section class="section">

                        <div class="row">
                            <!--<div class="col-md-12 col-lg-12 col-xl-12">-->


                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <p class="title" style="text-align: center;font-weight: bold">1 Month Subscription</p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <img src="img/packages/1.png"style="height:350px;">
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="offset-1">

                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-6">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>Dedicated Hosting Plan - 1 Month</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <span class="col-md-6 col-lg-6"> <h2 style="color:#171a1d;font-weight:bold">$ 50</h2></span>
                                        <span class="col-md-6 col-lg-6"> <h5>SKU: Dedicated Hosting - 1 Month</h5></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <ul>
                                        <li>Unlimited bandwidth</li>
                                        <li>24/7 Support</li>
                                        <li>Client Area</li>
                                    </ul>
                                </div>

                                <div class="row">
                                    <span > Qty</span>

                                </div>
                                <div class="row" style="margin-top:20px">
                                    <div class="col-md-2 col-lg-2">
                                        <input class="from-control" step="width:50px" type="text" value="1" readonly=""/>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:50px">
                                    <div class="card-footer"> <button class="btn  btn-info btnAddCart" value="1" style="color:#ffffff;background-color: #1979c3;font-weight: bold"> Add To Cart </button> </div>
                                </div>

                            </div>
                        </div>
                        </div>

                    </section>
                </article>



            </div>



        </section>
        <section class="section map-tasks">

        </section>
    </article>

    <?PHP require 'include/Footer.php'; ?>
    <?PHP require 'include/systemFooter.php'; ?>
    <script type="text/javascript" src="./controllers/controller_notification.js"></script>
    <script type="text/javascript" src="./table_controllers/table_notification.js"></script>
    <!--NOTIFICATION PAGE CONTROLLER-->

</div>
</div>

<script type="text/javascript">


</script>

</body>
</html>
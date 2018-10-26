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
                <?php require 'include/sidebar.php'; ?>
                <header class="header">
                    <div class="header-block header-block-collapse " >
                        <a href="dashboard.php" >
                            <button class="collapse-btn" id="sidebar-collapse-btn" style="cursor:pointer;">
                                <i class="fa fa-bars"> </i>Home
                            </button>
                        </a>
                    </div>

                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <div class="header-block header-block-search " >
                        <h2> Nolimitv Packages</h2>
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
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <p class="title" style="text-align: center;font-weight: bold">2 Day Trial</p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <img src="img/packages/trial.png"
                                             <p></p>
                                    </div>
                                    <div class="card-footer"> <button class="btn  btn-info btnAddCart" value="1" style="color:#ffffff;background-color: #1979c3;font-weight: bold"> Add To Cart </button> </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <a href="plan_1month.php">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <p class="title" style="text-align: center;font-weight: bold">1 Month Subscription</p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <img src="img/packages/1.png"
                                             <p></p>
                                    </div>
                                    <div class="card-footer"> <button class="btn  btn-info btnAddCart" value="1" style="color:#ffffff;background-color: #1979c3;font-weight: bold"> Add To Cart </button> </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <p class="title" style="text-align: center;font-weight: bold">3 Month Subscription</p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <img src="img/packages/3.png"
                                             <p></p>
                                    </div>
                                    <div class="card-footer"> <button class="btn  btn-info btnAddCart" value="3" style="color:#ffffff;background-color: #1979c3;font-weight: bold"> Add To Cart </button> </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <p class="title" style="text-align: center;font-weight: bold">6 Month Subscription</p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <img src="img/packages/6.png"
                                             <p></p>
                                    </div>
                                    <div class="card-footer"> <button class="btn  btn-info " style="color:#ffffff;background-color: #1979c3;font-weight: bold"> Add To Cart </button> </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <p class="title" style="text-align: center;font-weight: bold">12 Month Subscription</p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <img src="img/packages/12.png"
                                             <p></p>
                                    </div>
                                    <div class="card-footer"> <button class="btn  btn-info " style="color:#ffffff;background-color: #1979c3;font-weight: bold"> Add To Cart </button> </div>
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
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

                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <div class="header-block header-block-search " >
                        <h2> Dashboard </h2>
                    </div>
                    <?php require_once './include/mobile_menu.php'; ?>
                </header>

                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content dashboard-page">
                    <section class="section">

                        <div class="row sameheight-container">
                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height: 200px;">
                                    <div class="title-block">
                                        <a class="hidden"  href="client_mangement.php" style="text-decoration: none;color: #000">
                                            <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">

                                                <div class="caption text-center">
                                                    <img src="img/dashboard/user.png" style="width:64px;height:64px;margin-bottom: 30px;">
                                                    <h3>System Notification</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height:200px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal"href="client_mangement.php" style="text-decoration: none;color: #000"> 
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/contact.png" style="width:65px;height:64px;margin-bottom:30px">
                                                    <h3 style="color:#000;">Customer Management</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height:200px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal"  style="text-decoration: none;color: #000">
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/userprev.png" style="width:64px;height:64px;margin-bottom: 30px">
                                                    <h3 style="color:#000;">Email Management</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height:200px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal" href="affiliate_accounts.php" style="text-decoration: none;color: #000">
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/balance.png" style="width:64px;height:64px;margin-bottom: 30px">
                                                    <h3 style="color:#000;">Affiliate Accounts</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                        </div>  
                        <!--ROW 1-->

                        <div class="row sameheight-container">
                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height: 200px;">
                                    <div class="title-block">
                                        <a class="hidden"  href="affiliate_tree.php" style="text-decoration: none;color: #000">
                                            <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">

                                                <div class="caption text-center">
                                                    <img src="img/dashboard/tradeNature.png" style="width:64px;height:64px;margin-bottom: 30px;">
                                                    <h3>Affiliate Tree</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height:200px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal"href="my_affiliate.php" style="text-decoration: none;color: #000"> 
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/custmer_detailsb.png" style="width:65px;height:64px;margin-bottom:30px">
                                                    <h3 style="color:#000;">My Affiliate</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height:200px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal" href="client_area.php"  style="text-decoration: none;color: #000">
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/custmer_detailsb.png" style="width:64px;height:64px;margin-bottom: 30px">
                                                    <h3 style="color:#000;">Client Area</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height:200px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal" href="affiliate_chart.php" style="text-decoration: none;color: #000">
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/balance.png" style="width:64px;height:64px;margin-bottom: 30px">
                                                    <h3 style="color:#000;">Affiliate Chart</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--ROW 2-->

                        <div class="row sameheight-container">
                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height: 200px;">
                                    <div class="title-block">
                                        <a class="hidden"  href="affiliate_tree.php" style="text-decoration: none;color: #000">
                                            <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">

                                                <div class="caption text-center">
                                                    <img src="img/dashboard/tradeNature.png" style="width:64px;height:64px;margin-bottom: 30px;">
                                                    <h3>Affiliate Tree</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height:200px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal"href="my_affiliate.php" style="text-decoration: none;color: #000"> 
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/custmer_detailsb.png" style="width:65px;height:64px;margin-bottom:30px">
                                                    <h3 style="color:#000;">My Affiliate</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height:200px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal"  style="text-decoration: none;color: #000">
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/userprev.png" style="width:64px;height:64px;margin-bottom: 30px">
                                                    <h3 style="color:#000;">Email Management</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-block sameheight-item" style="height:200px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal" href="affiliate_accounts.php" style="text-decoration: none;color: #000">
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/balance.png" style="width:64px;height:64px;margin-bottom: 30px">
                                                    <h3 style="color:#000;">Affiliate Accounts</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--ROW 3-->

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
            $(function () {

                $(document).ready(function () {
                    //     show_save();
                    $('#btnUpdate').addClass('hidden');
                    load_notification_table();
                    hide_update_btn();
                });
                hide_update_btn();
                load_notification_table();

                $('#logout').click(function () {
                    logout();
                });
                $('#btnSave').on('click', function () {
                    save_notification();
                });
                $('#btnUpdate').on('click', function () {
                    update_notification();
                });
                $('#btnReset').on('click', function () {
                    reset();
                });

                $('.search_table').click(function () {
                    load_notification_table();
                });

            });

        </script>

        <script type="text/javascript">
            $('#datepicker,#pub_date,#exp_date').datepicker({
                weekStart: 1,
                daysOfWeekHighlighted: "6,0",
                autoclose: true,
                todayHighlight: true,

            });
            $('#datepicker').datepicker("setDate", new Date());
            $('#pub_date').datepicker();
            $('#exp_date').datepicker();
        </script>
        <!--DATEPICKER--> 
    </body>
</html>
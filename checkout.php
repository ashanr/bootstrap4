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

        <section>
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

                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

                                    <!-- Saved buttons use the "secure click" command -->
                                    <input type="hidden" name="cmd" value="_s-xclick">

                                    <!-- Saved buttons are identified by their button IDs -->
                                    <input type="hidden" name="hosted_button_id" value="221">

                                    <!-- Saved buttons display an appropriate button image. -->
                                    <input type="image" name="submit"
                                           src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                                           alt="PayPal - The safer, easier way to pay online">
                                    <img alt="" width="1" height="1"
                                         src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                                </form>
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
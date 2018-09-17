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
                <header class="header">
                    <?php require_once './include/mobile_menu.php'; ?>

                </header>
                <?php require 'include/sidebar.php'; ?>

                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content dashboard-page">
                    <section class="section">

                        <div class="row sameheight-container">

                            <div class="col-md-6">
                                <div class="card card-block sameheight-item" style="height:320px;">
                                    <div class="title-block">
                                        <h3 class="title " style="color:#1e7e34"> Notification Manage </h3>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" id="title" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <textarea  class="form-control"style="resize: none" id="message" rows="4" placeholder="Notification Message Here"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="card card-block sameheight-item" style="height: 320px;">
                                    <div class="form-group-sm date" >
                                        <label for="">Date</label>
                                        <input type="text" class="form-control" id="datepicker" value=""> 
                                        <!--<input type="text" class="form-control" id="datepicker" value="<?php echo date("Y-m-d"); ?>">--> 
                                        <!--<input id="datepicker" width="276" />-->
                                    </div>
                                    <div class="form-group">
                                        <label for="">Publish Date</label>
                                        <input type="text" class="form-control" id="pub_date" placeholder="Publishing Date"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="">Expire Date</label>
                                        <input type="text" class="form-control" id="exp_date" placeholder="Notification Expire Date"> 
                                    </div>
                                    <div class="form-group">
                                        <button id="btnSave" type="button" class="btn btn-primary btnSave">Save Notification</button>
                                        <!--                                        <button id="btnUpdate" type="button" class="btn btn-warning btnUpdate">Update</button>
                                                                                <button id="btnDelete" type="button" class="btn btn-danger btnDelete">Delete</button>-->
                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>
                    <section class="section">

                    </section>
                    <section class="section map-tasks">

                    </section>
                </article>

                <?PHP require 'include/Footer.php'; ?>
                <?PHP require 'include/systemFooter.php'; ?>
                <script type="text/javascript" src="./controllers/controller_notification.js"></script>
                <!--NOTIFICATION PAGE CONTROLLER-->

            </div>
        </div>

        <script type="text/javascript">
            $(function () {

                $(document).ready(function () {
                    //     show_save();
                    $('#btnUpdate').addClass('hidden');
                });

                $('#logout').click(function ()
                {
                    logout();
                });
                $('#btnSave').on('click', function () {
                    save_notification();
                });
                $('#btnUpdate').on('click', function () {
                    update_notification();
                });
                $('#btnDelete').on('click', function () {
                    // show_save();

                    $('#message').addClass('readonly');

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
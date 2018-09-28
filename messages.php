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


                <?php // require 'include/sidebar.php'; ?>

                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo">
                                    <span class="l l1"></span>
                                    <span class="l l2"></span>
                                    <span class="l l3"></span>
                                    <span class="l l4"></span>
                                    <span class="l l5"></span>
                                </div> Nolimitv </div>
                        </div>

                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">

                                <li class="active">
                                    <a href="dashboard.php">
                                        <i class="fa fa-home"></i> Dashboard </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </aside>
                
                
                <header class="header">

                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <div class="header-block header-block-search " >
                        <h2> Message  Management </h2>
                    </div>

                    <?php require_once './include/mobile_menu.php'; ?>

                </header>


                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content dashboard-page">
                    <section class="section">

                        <div class="row sameheight-container">

                            <div class="col-md-6">
                                <div class="card card-block sameheight-item" style="height:auto;">
                                    <div class="title-block">
                                        <h3 class="title " style="color:#1e7e34"> Message Manage </h3>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Sender Email</label>
                                        <input type="text" class="form-control" id="sender" placeholder="Sent By">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Receiver Email</label>
                                        <input type="text" class="form-control" id="receiver" placeholder="Receive By">
                                    </div>

                                    <div class="form-group date" >
                                        <label for="">Date</label>
                                        <input type="text" class="form-control" id="datepicker" value=""> 
                                        <!--<input type="text" class="form-control" id="datepicker" value="<?php // echo date("Y-m-d");         ?>">--> 
                                        <!--<input id="datepicker" width="276" />-->
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="card card-block sameheight-item" style="height: auto;">


                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control d-none" id="id" >
                                        <input type="text" class="form-control" id="title" placeholder="Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <textarea  class="form-control"style="resize: none" id="message" rows="6" placeholder="Message Here"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button id="btnSave" type="button" class="btn btn-primary btnSave">Save Message</button>
                                        <button id="btnUpdate" type="button" class="btn btn-warning btnUpdate">Update</button>
                                        <button id="btnReset" type="button" class="btn btn-secondary btnReset">Reset</button>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </section>
                    <section class="section">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="title-search-block">
                                            <div class="title-block">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <h3 class="title"> Message Table </h3>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <form class="form-inline">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control boxed rounded-s" placeholder="Search for...">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-secondary rounded-s serch_table" type="button">
                                                                        <i class="fa fa-search"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <section class="example">
                                            <div class="table-flip-scroll">
                                                <table class="table table-striped table-bordered sm table-hover flip-content table_notification">
                                                    <thead class="flip-header">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Message</th>
                                                            <th>Publish Date</th>
                                                            <th>Expire Date</th>
                                                            <th>Added Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="section map-tasks">

                    </section>
                </article>

                <?PHP require 'include/Footer.php'; ?>
                <?PHP require 'include/systemFooter.php'; ?>
                <script type="text/javascript" src="./controllers/controller_mail.js"></script>
                <script type="text/javascript" src="./table_controllers/table_mail.js"></script>
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
                    save_mail();
                });
                $('#btnUpdate').on('click', function () {
                    update_mail();
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

        <script type="text/javascript">

            function show_update_btn() {

                if ($('#btnUpdate').hasClass('d-none')) {
                    $('#btnUpdate').removeClass('d-none');
                }

                if (!$('#btnSave').hasClass('d-none')) {
                    $('#btnSave').addClass('d-none');
                }

                if ($('#btnReset').hasClass('d-none')) {
                    $('#btnReset').removeClass('d-none');
                }
            }

            function hide_update_btn() {

                if ($('#btnSave').hasClass('d-none')) {
                    $('#btnSave').removeClass('d-none');
                }
                if (!$('#btnUpdate').hasClass('d-none')) {
                    $('#btnUpdate').addClass('d-none');
                }
                if (!$('#btnReset').hasClass('d-none')) {
                    $('#btnReset').addClass('d-none');
                }
            }


        </script>


    </body>
</html>
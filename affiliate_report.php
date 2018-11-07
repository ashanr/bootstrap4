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
            @page {
                size: A4 portrait; /* can use also 'landscape' for orientation */
                left-margin: 0.5in;
                left-margin: 0.5in;
                border: thin solid black;
                padding: 1em;
            }

            @media print{
                body{
                    padding-top: 0px !important;
                }
                div{
                    margin-top: 0px !important;
                }
                .table > tbody > tr > th,.table > tbody > tr > td{
                    padding: 0px;
                }
                .table > thead > tr > th{
                    padding-top: 2px;
                    padding-right: 0px;
                    padding-bottom: 2px;
                    padding-left: 0px;
                }
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
                        <a href="./dashboard.php"> <h2> Home </h2> </a>
                    </div>
                    <?php require_once './include/mobile_menu.php'; ?>
                </header>

                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <article class="content dashboard-page">
                    <section class="section">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="title-search-block">
                                            <div class="title-block">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h3 class="title"> Affiliate Report </h3>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <form class="form">
                                                            <div class="form-group">
                                                                <label class="control-label">Marketing Manager</label>
                                                                <!--<select  class="form-control boxed affiliate_customer"></select>-->
                                                                <select  class="form-control boxed " id="mkt_manager">
                                                                    <option value="13">Test -  (test@mail.com)</option>
                                                                    <option value="23">Zina -  (zina@gmail.com)</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>



                    <section class="section">

                        <div class="card">
                            <div class="card-block">
                                <div class="table-flip-scroll">
                                    <table class="table table-striped table-bordered sm table-hover flip-content table_affiliate_tree">
                                        <thead class="flip-header">
                                            <tr>
                                                <th>#</th>
                                                <th>Affiliate Level</th>
                                                <th>Client Email</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Parent</th>
                                                <th>Tree</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!--card block-->
                        </div>
                        <!--card-->


                    </section>

                    <section class="section map-tasks">
                    </section>
                </article>

                <?PHP require 'include/Footer.php'; ?>
                <?PHP require 'include/systemFooter.php'; ?>
<!--                <script type="text/javascript" src="./controllers/"></script>-->
                <script type="text/javascript" src="./table_controllers/table_affiliate_accounts.js"></script>
                <!--NOTIFICATION PAGE CONTROLLER-->

            </div>
        </div>

        <script type="text/javascript">
            $(function () {

                $(document).ready(function () {
                    //     show_save();
                    $('#btnUpdate').addClass('hidden');
                    load_affiliate_customers();
                });
                $('#logout').click(function () {
                    logout();
                });
                $('.affiliate_customer').change(function () {
                    build_affiliate_tree($(this).val());
//                    load_affiliate_tree($(this).val());
                })
            });
            function build_affiliate_tree(text, callBack) {
                var tableData = '';
                $.post("table_models/table_model_affiliate_report.php", {table: 'build_affiliate_tree', account_id: text}, function (e) {
                    if (e === undefined || e.length === 0 || e === null) {
                        tableData += '<tr><th colspan="7" class="alert alert-warning text-center"> ----- There is No Related Accounts ----- </th></tr>';
                        $('.table_affiliate_tree tbody').html('').append(tableData);
                    } else {
                        $.each(e, function (index, qData) {
                            index++;
                            tableData += '<tr>';
                            tableData += '<td>' + index + '</td>';
                            var no_of_sec = qData.NOOFSEC;
                            var parent = qData.parent;



                            if (no_of_sec == 0) {

                                tableData += '<td><div class="btn-group"><button class="btn btn-oval btn-success  btn-sm sel_notification" value="' + qData.account_id + '"><i class="fa fa-plus fa-lg"></i>&nbsp;Level 02</button></td>';
                                tableData += '<td>' + qData.email + '</td>';
                                tableData += '<td>' + (qData.firstname ? qData.firstname : '-') + '</td>';
                                tableData += '<td>' + (qData.lastname ? qData.lastname : '-') + '</td>';
                                tableData += '<td>' + (qData.parent ? qData.parent : '-') + '</td>';
                                tableData += '<td>' + qData.tree + '</td>';
                            } else if (no_of_sec == 1) {

                                tableData += '<td><div class="btn-group"><button class="btn btn-oval btn-success  btn-sm sel_notification" value="' + qData.account_id + '"><i class="fa fa-plus fa-lg"></i>&nbsp;Level 02</button></td>';
                                tableData += '<td>' + qData.email + '</td>';
                                tableData += '<td>' + (qData.firstname ? qData.firstname : '-') + '</td>';
                                tableData += '<td>' + (qData.lastname ? qData.lastname : '-') + '</td>';
                                tableData += '<td>' + (qData.parent ? qData.parent : '-') + '</td>';
                                tableData += '<td>' + qData.tree + '</td>';
                            } else if (no_of_sec == 2) {
                                tableData += '<td><div class="btn-group"><button class="btn btn-oval btn-warning  btn-sm sel_notification" value="' + qData.account_id + '"><i class="fa fa-circle fa-lg"></i>&nbsp;Level 03</button></td>';
                                tableData += '<td>' + qData.email + '</td>';
                                tableData += '<td>' + (qData.firstname ? qData.firstname : '-') + '</td>';
                                tableData += '<td>' + (qData.lastname ? qData.lastname : '-') + '</td>';
                                tableData += '<td>' + (qData.parent ? qData.parent : '-') + '</td>';
                                tableData += '<td>' + qData.tree + '</td>';
//                            tableData += '<td><div class="btn-group"><button class="btn btn-oval btn-info  btn-sm sel_notification" value="' + qData.entity_id + '"><i class="fa fa-edit fa-lg"></i>&nbsp;Select</button>\n\
//                             <button class="btn btn-oval btn-danger  btn-sm delete_notification" value="' + qData.entity_id + '"><i class="fa fa-times-circle fa-lg"></i>&nbsp;Delete</button></div></td>';

                            } else if (no_of_sec == 3) {
                                tableData += '<td><div class="btn-group"><button class="btn btn-oval btn-danger  btn-sm sel_notification" value="' + qData.account_id + '"><i class="fa fa-dot-circle fa-lg"></i>&nbsp;Level 04</button></td>';
                                tableData += '<td>' + qData.email + '</td>';
                                tableData += '<td>' + (qData.firstname ? qData.firstname : '-') + '</td>';
                                tableData += '<td>' + (qData.lastname ? qData.lastname : '-') + '</td>';
                                tableData += '<td>' + (qData.parent ? qData.parent : '-') + '</td>';
                                tableData += '<td>' + qData.tree + '</td>';
//                            tableData += '<td><div class="btn-group"><button class="btn btn-oval btn-info  btn-sm sel_notification" value="' + qData.entity_id + '"><i class="fa fa-edit fa-lg"></i>&nbsp;Select</button>\n\
//                             <button class="btn btn-oval btn-danger  btn-sm delete_notification" value="' + qData.entity_id + '"><i class="fa fa-times-circle fa-lg"></i>&nbsp;Delete</button></div></td>';

                            }

                        });
                        tableData += '</tr>';
                        $('.table_affiliate_tree tbody').html('').append(tableData);
                    }
                    if (callBack !== undefined) {
                        if (typeof callBack === 'function') {
                            callBack();
                        }
                    }
                }, 'json');
            }



            function load_affiliate_tree(text, callBack) {
                var tableData = '';
                $.post("table_models/table_model_affiliate.php", {table: 'load_affiliate_tree', account_id: text}, function (e) {
                    if (e === undefined || e.length === 0 || e === null) {
                        tableData += '<tr><th colspan="7" class="alert alert-warning text-center"> ----- There are No Affiliate Accounts related to this Member ----- </th></tr>';
                        $('.table_affiliate_tree tbody').html('').append(tableData);
                    } else {
                        $.each(e, function (index, qData) {
                            index++;
                            tableData += '<tr>';
                            tableData += '<td>' + index + '</td>';
                            tableData += '<td>' + qData.email + '</td>';
                            tableData += '<td>' + (qData.firstname ? qData.firstname : '-') + '</td>';
                            tableData += '<td>' + (qData.lastname ? qData.lastname : '-') + '</td>';
                            tableData += '<td>' + (qData.parent ? qData.parent : '-') + '</td>';
                            tableData += '<td>' + qData.tree + '</td>';
//                            tableData += '<td><div class="btn-group"><button class="btn btn-oval btn-info  btn-sm sel_notification" value="' + qData.entity_id + '"><i class="fa fa-edit fa-lg"></i>&nbsp;Select</button>\n\
//                             <button class="btn btn-oval btn-danger  btn-sm delete_notification" value="' + qData.entity_id + '"><i class="fa fa-times-circle fa-lg"></i>&nbsp;Delete</button></div></td>';
                            tableData += '</tr>';
                        });
                        $('.table_affiliate_tree tbody').html('').append(tableData);
                        $('.sel_notification').click(function () {
                            var id = $(this).val();
                            $('#id').val($(this).val());
                            select_notification(id);
                            //  quotation_select_customer(cus_id);
                            // chosenRefresh();
                        });
                        $('.delete_notification').click(function () {
                            var id = $(this).val();
                            $('#id').val($(this).val());
                            delete_notification(id);
                        });
                    }
                    if (callBack !== undefined) {
                        if (typeof callBack === 'function') {
                            callBack();
                        }
                    }
                }, 'json');
            }

        </script>
        <!--DATEPICKER--> 
    </body>
</html>
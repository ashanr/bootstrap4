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

<!--                    <div class="header-block header-block-search " >
                        <h2> User Management </h2>
                    </div>-->

                    <?php require_once './include/mobile_menu.php'; ?>

                </header>

                <article class="content forms-page">
                    <section class="section">
                        <div class="row sameheight-container ">

                            <div class="col-md-4">
                                <div class="card card-block sameheight-item" style="height:auto">
                                    <div class="title-block">
                                        <h3 class="title " style="color:#1e7e34"> Add New User </h3>
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Type</label>
                                        <select class="form-control" id="selUserLevel">
                                            <option value="188">Admin</option>
                                            <option value="2">Staff</option>
                                            <option value="3">Client</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control d-none" id="id" >
                                        <input type="text" class="form-control" id="fName" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control" id="lName" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea  class="form-control"style="resize: none" id="address" rows="4" placeholder="Address"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card card-block sameheight-item" style="height:auto">


                                    <div class="form-group">
                                        <label for="">Work Contact No</label>
                                       <input type="text" class="form-control" id="work" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Emp No</label>
                                       <input type="text" class="form-control" id="empNo" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NIC</label>
                                       <input type="text" class="form-control" id="nic" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Emp No</label>
                                        <select class="form-control" id="userStatus" >
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                                                                </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Reg Date</label>
                                        <input type="text" class="form-control" id="date" placeholder="Reg"> 
                                    </div>


                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="card card-block sameheight-item" style="height:auto;">
                                    <div class="form-group">
                                        <label for="">Contact No</label>
                                        <input type="text" class="form-control" id="mobile" placeholder="Contact No">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" id="eMail" placeholder="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="">password</label>
                                        <input type="text" class="form-control" id="password" placeholder="password">
                                    </div>

                                    <div class="form-group">
                                        <button id="btnSave" type="button" class="btn btn-primary btnSave">Save </button>
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
                                                        <h3 class="title"> Users Table </h3>
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
                                                <table class="table table-striped table-bordered sm table-hover flip-content adminUsersTbl">
                                                    <thead class="flip-header">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                            <th>Name</th>

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
                <script type="text/javascript" src="./controllers/controller_users.js"></script>
                <script type="text/javascript" src="./table_controllers/table_users.js"></script>
                <!--NOTIFICATION PAGE CONTROLLER-->

            </div>
        </div>
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
        <script type="text/javascript">
            $(function () {
                $(document).ready(function () {
                    //     show_save();
                    $('#btnUpdate').addClass('hidden');
                    admin_user_table();
                    hide_update_btn();
                });
                hide_update_btn();
                admin_user_table();
                $('#logout').click(function ()
                {
                    logout();
                });
                $('#btnSave').on('click', function () {
                    save_user();
                });
                $('#btnUpdate').on('click', function () {
                    update_user();
                });
                $('#btnReset').on('click', function () {
                    reset();
                });

                $('.search_table').click(function () {
                    admin_user_table();
                });
            });
        </script>

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
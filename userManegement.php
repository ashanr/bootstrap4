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
<html lang="en">
    <head>
        <?php require_once './include/Header.php'; ?>
        <?php require_once './include/systemHeader.php'; ?>
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <?php //require 'include/headerbar.php';  ?>
                <header class="header">
                    <?php require_once './include/mobile_menu.php'; ?>
                </header>
                <?php require 'include/sidebar.php'; ?>

                <!--CONTENT-->
                <article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title"> System User Management </h3>
                        <p class="title-description"> Manage System Users and Privileges</p>
                    </div>

                    <section class="section">
                        
                        <div class="row sameheight-container">
                            <div class="col-md-4">
                                <div class="card card-block sameheight-item" style="height: 709px;">
                                    <div class="title-block">
                                        <a class="hidden"  href="new_user.php" style="text-decoration: none;color: #000">
                                            <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">

                                                <div class="caption text-center">
                                                    <img src="img/dashboard/user.png" style="width:128px;height:128px;margin-bottom: 30px;">
                                                    <h3 >Manage Users</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card card-block sameheight-item" style="height: 709px; cursor: pointer">
                                    <div class="title-block">
                                        <a class="loadPrevModal" data-toggle="modal" data-target=".addUserPrivillages">
                                            <div class="caption text-center">
                                                <div class="thumbnail btn-dashboard" style="border-radius:5px; padding: 10px;">
                                                    <img src="img/dashboard/userprev.png" style="width:128px;height:128px;margin-bottom: 30px">
                                                    <h3 style="color:#000;">Set User Privileges</h3>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                    </section>
                </article>
                <!--CONTENT END-->


                <!--set user privilages-->
                <div class="modal  fade addUserPrivillages" style="width: 100%;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="padding:10px;">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Set User Privilege
                                </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                <section class="section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">User Name</label>
                                                        <input type="text" class="form-control d-none" id="id" >
                                                        <select class="form-control selUsername" id="selUsername" > </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="section">
                                    <div class="row sameheight-container ">
                                        <div class="col-md-4" style="margin-left: 20px;">
                                            <div class="widget selectlistpanel">
                                                <div class="widget-header">
                                                    <h4 style="color:#1b1e21">Available Privileges</h4>
                                                </div>
                                                <div class="widget-content">
                                                    <select multiple="" id="available_privilegs">
                                                    </select>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="col-md-1" style="margin-left: 20px;">
                                            <div class="btn-group btn-group-vertical selectionbuttons" >
                                                <button class="btn btn-lg btn-primary" id="prv-add" title=""><i class="fa fa-lg fa-angle-right"></i></button>
                                                <button class="btn btn-lg btn-primary" id="prv-add-all" title=""><i class="fa  fa-lg fa-angle-double-right"></i></button>
                                                <button class="btn btn-lg btn-primary" id="prv-remove" title=""><i class="fa  fa-lg fa-angle-left"></i></button>
                                                <button class="btn btn-lg btn-primary" id="prv-remove-all" title=""><i class="fa  fa-lg fa-angle-double-left"></i></button>
                                            </div>
                                        </div>

                                        <div class="col-md-4" style="margin-left: 25px;">
                                            <div class="widget selectlistpanel">
                                                <div class="widget-header">
                                                    <h4 style="color:#1b1e21">Assigned Privileges</h4>
                                                </div>
                                                <div class="widget-content">
                                                    <select multiple="" id="assigned_privileges">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>


        <?PHP require 'include/Footer.php'; ?>
        <?PHP require 'include/systemFooter.php'; ?>
    </div>
    <!-- Reference block for JS -->
    <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
            <div class="color-primary"></div>
            <div class="color-secondary"></div>
        </div>
    </div>
    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">

        $(function () {
            get_usernameCombo();

            $(document).ready(function () {
            });

            $('#logout').click(function () {
                logout();
            }); //LOG OUT FUNCTION

            $('.addUserPrivillages').on('shown.bs.modal', function (e) {

                loadUserPrivileges();
                load_filtered_privileges();
            })

            $(document).on('change', '#selUsername', function () {
                loadUserPrivileges();
                load_filtered_privileges();
            });

            //            today
            $(document).on('click', '#prv-add', function () {
                var userid = $('#selUsername').val();
                var assigned = $('#assigned_privileges');
                var available = $('#available_privilegs');
                selected_options = available.find('option:selected');
                if (selected_options.length > 0) {
                    options = {};
                    $.each(selected_options, function (index, option) {
                        options[$(option).val()] = $(option).val();
                    });
                    $.post("Models/model_user_management.php", {action: 'add_privlage', userid: userid, options: options}, function (e) {
                        loadUserPrivileges(); //right side
                        load_filtered_privileges(); //left
                    }, 'json');
                } else {
                    alertify.error('Please select one or more.', 10000);
                }
            });

            $(document).on('click', '#prv-add-all', function () {
                var userid = $('#selUsername').val();
                var assigned = $('#assigned_privileges');
                var available = $('#available_privilegs');
                selected_options = available.find('option');
                if (selected_options.length > 0) {
                    options = {};
                    $.each(selected_options, function (index, option) {
                        options[$(option).val()] = $(option).val();
                    });
                    $.post("Models/model_user_management.php", {action: 'add_privlage', userid: userid, options: options}, function (e) {
                        loadUserPrivileges();
                        load_filtered_privileges();
                    }, 'json');
                } else {
                    alertify.error('Please select one or more.', 10000);
                }
            });
            $(document).on('click', '#prv-remove', function () {
                //                alert('okkkkk');
                var userid = $('#selUsername').val();
                var assigned = $('#assigned_privileges');
                var available = $('#available_privilegs');
                selected_options = assigned.find('option:selected');
                if (selected_options.length > 0) {
                    options = {};
                    $.each(selected_options, function (index, option) {
                        options[$(option).val()] = $(option).val();
                    });
                    $.post("Models/model_user_management.php", {action: 'remove_user_privilege', userid: userid, options: options}, function (e) {
                        loadUserPrivileges();
                        load_filtered_privileges();
                    }, 'json');
                } else {
                    alertify.error('Please select one or more.', 1300);
                }
            });
            $(document).on('click', '#prv-remove-all', function () {
                var userid = $('#selUsername').val();
                var assigned = $('#assigned_privileges');
                var available = $('#available_privilegs');
                selected_options = assigned.find('option');
                if (selected_options.length > 0) {
                    options = {};
                    $.each(selected_options, function (index, option) {
                        options[$(option).val()] = $(option).val();
                    });
                    $.post("Models/model_user_management.php", {action: 'remove_user_privilege', userid: userid, options: options}, function (e) {
                        loadUserPrivileges();
                        load_filtered_privileges();
                    }, 'json');
                } else {
                    alertify.error('Please select one or more.', 1300);
                }
            });


        });


    </script>
</body>
</html>
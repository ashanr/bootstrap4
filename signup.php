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

        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> NoLimiTV </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-center">SIGNUP FOR NOLIMITV</p>
                        <div class="form-group">
                            <label for="firstname">Name</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control underlined" name="firstname" id="firstname" placeholder="Enter firstname" required=""> </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control underlined" name="lastname" id="lastname" placeholder="Enter lastname" required=""> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control underlined" name="email" id="email" placeholder="Enter email address" required=""> </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="password" class="form-control underlined" name="password" id="password" placeholder="Enter password" required=""> </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control underlined" name="retype_password" id="retype_password" placeholder="Re-type password" required=""> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agree">
                                <input class="checkbox" name="agree" id="agree" type="checkbox" required="">
                                <span>Agree the terms and
                                    <a href="#">policy</a>
                                </span>
                            </label>
                        </div>
                        <div class="form-group">
                            <button  id="btnSignup" class="btn btn-block btn-primary">Sign Up</button>
                        </div>
                        <div class="form-group">
                            <p class="text-muted text-center">Already have an account?
                                <a >Login!</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="index.html" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left"></i> Back to dashboard </a>
                </div>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>

        <?PHP require 'include/systemFooter.php'; //LOAD PHP FILES ?>

        <script type="text/javascript">
            $(function () {

                $(document).ready(function () {
                   
                   
                });

                $('#btnSignup').on('click', function () {
                    signup_new_customer();
                });

                function signup_new_customer() {
                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var email = $('#email').val();
                    var password = $('#password').val();


                    if ((firstname.length = 0) || (firstname == '')) {
                        var msg7 = alertify.error("Please Enter Firstname!");
                        msg7.delay(3).setContent(msg7);
                        return;
                    }

                    if ((lastname.length = 0) || (lastname == '')) {
                        var msg7 = alertify.error("Please Enter Lastname!");
                        msg7.delay(3).setContent(msg7);
                        return;
                    }
                    if ((email.length = 0) || (email == '')) {
                        var msg7 = alertify.error("Please Enter Email!");
                        msg7.delay(3).setContent(msg7);
                        return;
                    }
                    if ((password.length = 0) || (password == '')) {
                        var msg7 = alertify.error("Please Enter Password!");
                        msg7.delay(3).setContent(msg7);
                        return;
                    }

                    $.post("models/model_signup.php", {action: "signup_new_user", firstname: firstname, last_name: lastname, email: email, password: password}, function (e) {
                        $.each(e, function (index, msgData) {

                            if (e === undefined || e.length === 0 || e === null) {
                                var msg9 = alertify.error("Error!");
                                msg9.delay(3).setContent(msg9);
                            } else if (msgData.msgType == 1) {
                                var msg7 = alertify.success("Successfully Saved!");
                                msg7.delay(3).setContent(msg7);
                            } else if (msgData.msgType == 2) {
                                var msg7 = alertify.error("Error in Save!");
                                msg7.delay(3).setContent(msg7);
                            }
                        });
                    }, 'json');
                }


            });
        </script>

    </body>
</html>
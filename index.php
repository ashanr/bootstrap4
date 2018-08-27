<?php
//session_start();
//session_regenerate_id(true);
// load database configurations
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once './config/dbc.php';
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> BOOTSTRAP 4</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }
        </script>
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
                            </div> Cyber Code IT Solutions </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-center">LOGIN TO CONTINUE</p>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="email" class="form-control underlined" name="username" id="userName" placeholder="Your email address" required> </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required> </div>

                            <div class="form-group">
                                <button type="submit" id="logSystem" class="btn btn-block btn-primary">Login</button>
                            </div>

                    </div>
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
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
        <?php require_once './include/systemFooter.php'; ?>
                <script type="text/javascript">

        //
                    $(function () {

        //                starterBgSlideTransition();

                        $(document).ready(function ()
                        {
                            $(document).bind("contextmenu", function (e) {
        //                        return false;
                            });
                        });

                        document.onkeypress = function (event) {
                            event = (event || window.event);
                            if (event.keyCode == 123) {
                                //alert('No F-12');
        //                        return false;
                            }
                        }
                        document.onmousedown = function (event) {
                            event = (event || window.event);
                            if (event.keyCode == 123) {
                                //alert('No F-keys');
        //                        return false;
                            }
                        }
                        document.onkeydown = function (event) {
                            event = (event || window.event);
                            if (event.keyCode == 123) {
                                //alert('No F-keys');
        //                        return false;
                            }
                        }

                    });
                </script>


    </body>
</html>

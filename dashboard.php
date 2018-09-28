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
                <header class="header">
                    <?php require_once './include/mobile_menu.php'; ?>

                </header>
                <?php require 'include/sidebar.php'; ?>

                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content dashboard-page">
                    <section class="section">

                    </section>
                    <section class="section">

                    </section>
                    <section class="section map-tasks">

                    </section>
                </article>

                <?PHP require 'include/Footer.php'; ?>
                <?PHP require 'include/systemFooter.php'; ?>
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
        <script type="text/javascript">

            $(function () {
                $('#logout').click(function () {
                    logout();
                });

            });



            function load_notifications() {
                var tableData = '';
                $.post("table_models/table_model_notification.php", {table: 'load_notificaiton_table', text: text}, function (e) {
                    if (e === undefined || e.length === 0 || e === null) {
                        
                    tableData += '<tr><th colspan="6" class="alert alert-warning text-center"> -- No Data Found -- </th></tr>';
                        $('.table_notification tbody').html('').append(tableData);
                        
                    } else {
                        $.each(e, function (index, qData) {
                            index++;
                        });
                    }

                });

        </script>
    </body>
</html>
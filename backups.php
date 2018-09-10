<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


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
                 
                <?php require 'include/headerbar.php'; ?>
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





    </script>
</body>
</html>
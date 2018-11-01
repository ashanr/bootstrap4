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

        </style>
        <link type="text/css" href="./vendors/treant/basic-example.css" rel="stylesheet">
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
                                                        <h3 class="title"> Affiliate Tree </h3>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <form class="form">
                                                            <div class="form-group">
                                                                <label class="control-label">Customer</label>
                                                                <select  class="form-control boxed affiliate_customer"></select>
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
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">

                                        <div class="chart" id="basic-example"></div>


                                    </div>
                                    <!--card block-->
                                </div>
                                <!--card-->
                            </div>
                        </div>

                    </section>

                    <section class="section map-tasks">
                    </section>
                </article>

                <?PHP require 'include/Footer.php'; ?>
                <?PHP require 'include/systemFooter.php'; ?>
<!--                <script type="text/javascript" src="./controllers/"></script>-->

                <script type="text/javascript" src="./vendors/treant/Treant.js"></script>
                <script type="text/javascript" src="./vendors/treant/raphael.js"></script>
                <script type="text/javascript" src="./table_controllers/table_affiliate_accounts.js"></script>
                <!--NOTIFICATION PAGE CONTROLLER-->

            </div>
        </div>

        <script type="text/javascript">
           

            $(function () {

            $(document).ready(function () {
            draw_tree();
            $('#btnUpdate').addClass('hidden');
            load_affiliate_customers();
            });
            $('#logout').click(function () {
            logout();
            });
            $('.affiliate_customer').change(function () {
            //   build_affiliate_tree($(this).val());
//                    load_affiliate_tree($(this).val());
            draw_tree($(this).val());
            })
            });
            function draw_tree(account_id) {

            $.post("table_models/table_model_affiliate.php", {table: 'build_affiliate_tree', account_id: account_id}, function (e) {


            $.each(e, function (index, qData) {
            index++;
            var no_of_sec = qData.NOOFSEC;
            var email = qData.email;
            var account_id = qData.account_id;
            var customer_id = qData.customer_id;
            var parent = qData.parent;
            var part1 = qData.PART1;
            var part2 = qData.PART2;
            var part3 = qData.PART3;
            var part4 = qData.PART4;
            var part5 = qData.PART5;
            chart_config.push(account_id);
            });
            //    console.log(chart_config.toString());
            var config = {
            container: "#basic-example",
                    connectors: {
                    type: 'step'
                    },
                    node: {
                    HTMLclass: 'nodeExample1'
                    }
            },
                    13 = {
                    text: {
                    name: 'ashan', title: "Chief executive officer", contact: "Tel: 01 213 123 134",
                    },
                            image: "img/head/orange.png"

                    }, 14 = {
            parent: 13,
                    text: {
                    name: "Joe Linux", title: "U Technology Officer", contact: "Tel: 01 213 123 134",
                    },
                    stackChildren: true,
                    image: "img/head/green.png"
            }, 15 = {
            parent: 14,
                    text: {
                    name: "Joe Root", title: "Chief F Officer", contact: "Tel: 01 213 123 134",
                    },
                    stackChildren: true,
                    image: "img/head/green.png"
            }, 12 = {
            parent: 15,
                    text: {
                    name: "Mary Butler", title: "CTO", contact: "Tel: 01 213 123 134",
                    },
                    image: "img/head/ash.png"
            }

            chart_config = [
                    config, 13, 14, 15, 12

            ];
            new Treant(chart_config);
            }, 'json');
            }


            /*
             
             function build_affiliate_tree(text, callBack) {
             
             $.post("table_models/table_model_affiliate.php", {table: 'build_affiliate_tree', account_id: text}, function (e) {
             
             var chart_config = [];
             var config = {
             container: "#basic-example",
             connectors: {
             type: 'step'
             },
             node: {
             HTMLclass: 'nodeExample1'
             }
             },
             ceo = {
             text: {
             name: 'ashan',
             title: "Chief executive officer",
             contact: "Tel: 01 213 123 134",
             },
             image: "img/head/orange.png"
             }
             , cto = {
             parent: ceo,
             text:{
             name: "Joe Linux",
             title: "Chief Technology Officer",
             },
             stackChildren: true,
             image: "img/head/green.png"
             }, ;
             new Treant(chart_config); return;
             if (e === undefined || e.length === 0 || e === null) {
             tableData = 'no data found';
             $('.message').html('').append(tableData);
             } else {
             
             $.each(e, function (index, qData) {
             index++;
             var no_of_sec = qData.NOOFSEC;
             var email = qData.email;
             var account_id = qData.account_id;
             var customer_id = qData.customer_id;
             var parent = qData.parent;
             var part1 = qData.PART1;
             var part2 = qData.PART2;
             var part3 = qData.PART3;
             var part4 = qData.PART4;
             var part5 = qData.PART5;
             if (no_of_sec == '1') {
             
             config +=
             customer_id = {
             text: {
             name: email,
             title: "Chief executive officer",
             contact: "Tel: 01 213 123 134",
             },
             image: "img/head/orange.png"
             }
             , ;
             }
             //             else if (no_of_sec == '2') {
             //
             //            config +=
             //                    customer_id = {
             //
             //                    parent: part2,
             //                            stackChildren: true,
             //                            text:{
             //                            name: email,
             //                                    title: "Chief Business Officer",
             //                            },
             //                            image: "img/head/green.png"
             //                    }
             //            , ;
             //            } else if (no_of_sec == '3') {
             //
             //            config +=
             //                    customer_id = {
             //                    parent: part4,
             //                            stackChildren: true,
             //                            text:{
             //                            name: email,
             //                                    title: "Chief Business Officer",
             //                            },
             //                            image: "img/head/green.png"
             //                    }
             //            , ;
             //            }
             
             //    chart_config.push(account_id);
             chart_config.push(45);
             });
             config += chart_config;
             new Treant(chart_config)
             }
             if (callBack !== undefined) {
             if (typeof callBack === 'function') {
             callBack();
             }
             }
             }, 'json');
             }
             
             
             */





        </script>

    </body>
</html>
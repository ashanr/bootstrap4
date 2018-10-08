<?php

require_once '../config/dbc.php';
require_once '../class/systemSetting.php';
require_once '../class/database.php';
$dbClass = new database();
$system = new setting();
MainConfig::connectDB();
$link = MainConfig::conDB();

if (array_key_exists("action", $_POST)) {

    if ($_POST['action'] == 'load_nav_bar') {


        $data = array();
        $quary = "SELECT
                          in_usrprvlg.usrID,
                          in_sysprvlg.usrPrvMnuName,
                          in_sysprvlg.usrPrvMnuIcon,
                          in_sysprvlg.usrPrvMnuPath,
                          in_usrprvlg.usrPrvCode
                          FROM
                          in_sysprvlg
                          INNER JOIN in_usrprvlg ON in_usrprvlg.usrPrvCode = in_sysprvlg.prvCode
                          WHERE in_usrprvlg.usrID = '{$_SESSION['user_id']}' AND in_sysprvlg.usrPrnt = 0";
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $getLogeduser = mysqli_query($link, $quary)or die(mysqli_error());
        MainConfig::closeDB();

        if (!empty($getLogeduser)) {
            while ($row = mysqli_fetch_assoc($getLogeduser)) {
                $data[] = $row;
            }

            foreach ($data AS $aa) {

                echo '<li class = " dropdown">
             <a class = "nav-link dropdown-toggle" data-toggle = "dropdown" href = "#" role = "button" aria-haspopup = "true" aria-expanded = "false">
            <div class = "img" style = "background-image: url("https://avatars3.githubusercontent.com/u/3959008?v=3&s=40")"> </div>
            <span class = "name">' . $aa['usrPrvMnuName'] . ' </span>
            </a>';

                echo ' <div class = "dropdown-menu profile-dropdown-menu" aria-labelledby = "dropdownMenu1">';

                $quw = "SELECT
                                in_usrprvlg.usrID,
                                in_sysprvlg.usrPrvMnuName,
                                in_sysprvlg.usrPrvMnuIcon,
                                in_sysprvlg.usrPrvMnuPath,
                                in_usrprvlg.usrPrvCode,
                                in_sysprvlg.usrPrnt
                                FROM
                                in_sysprvlg
                                INNER JOIN in_usrprvlg ON in_usrprvlg.usrPrvCode = in_sysprvlg.prvCode
                                WHERE
                                in_usrprvlg.usrID = '{$_SESSION['user_id']}'
                                AND in_sysprvlg.usrPrnt = '{$aa['usrPrvCode']}'";
                MainConfig::connectDB();
                $link = MainConfig::conDB();
                $getL = mysqli_query($link, $quw)or die(mysqli_error());
                MainConfig::closeDB();
                if (!empty($getL)) {
                    while ($row = mysqli_fetch_assoc($getL)) {
                        $data1[] = $row;
                    }
                    foreach ($data1 AS $bb) {
                        if ($aa['usrPrvCode'] == $bb['usrPrnt']) {

                            echo '<a class = "dropdown-item" href = "' . $bb['usrPrvMnuPath'] . '"> <i class = "fa fa-user icon"></i>' . $bb['usrPrvMnuName'] . '</a>';
                        }
                    }
                }

                echo '</div></li>';
            }
        }
    }
}


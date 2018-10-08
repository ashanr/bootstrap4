<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$dbClass = new database();
$system = new setting();
MainConfig::connectDB();
$link = MainConfig::conDB();

if (array_key_exists("action", $_POST)) {

    if ($_POST['action'] == 'signup_new_user') {
        $title = $_POST['title'];
        $message = $_POST['message'];
        $today = date('Y-m-d');

        MainConfig::connectDB(); //open connection
        $link = MainConfig::conDB(); //get connection to link variable

        $query = "INSERT INTO `in_system_notifications` (`title`, `message`, `publish_date`, `expire_date`,`added_date`) VALUES ('{$title}', '{$message}', '{$pub_date}','{$exp_date}','{$today}' );";

        $system->prepareCommandQueryForAlertify($query, "Successfully Saved", "Sorry ..! Counld Not Be Saved");
    }
}
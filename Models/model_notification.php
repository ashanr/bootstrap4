<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$dbClass = new database();
$system = new setting();
MainConfig::connectDB();
$link = MainConfig::conDB();

if (array_key_exists("action", $_POST)) {

    if ($_POST['action'] == 'save_notification') {
        $title = $_POST['title'];
        $message = $_POST['message'];
        $pub_date = $_POST['pub_date'];
        $exp_date = $_POST['exp_date'];
        
        MainConfig::connectDB();
        $link = MainConfig::conDB();

        $query = "INSERT INTO `in_system_notifications` (`title`, `message`) VALUES ('{$title}', '{$message}');";

        $system->prepareCommandQueryForAlertify($query, "Successfully Saved", "Sorry ..! Counld Not Be Saved");
    }
}
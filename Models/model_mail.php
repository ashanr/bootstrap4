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

    if ($_POST['action'] == 'save_notification') {
        $title = $_POST['title'];
        $message = $_POST['message'];
        $pub_date = date('Y-m-d', strtotime($_POST['pub_date']));
        $exp_date = date('Y-m-d', strtotime($_POST['exp_date']));
        $today = date('Y-m-d');

        MainConfig::connectDB();//open connection
        $link = MainConfig::conDB();//get connection to link variable

        $query = "INSERT INTO `in_system_notifications` (`title`, `message`, `publish_date`, `expire_date`,`added_date`) VALUES ('{$title}', '{$message}', '{$pub_date}','{$exp_date}','{$today}' );";

        $system->prepareCommandQueryForAlertify($query, "Successfully Saved", "Sorry ..! Counld Not Be Saved");
    }

    if ($_POST['action'] == 'update_notification') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $message = $_POST['message'];
        $pub_date = date('Y-m-d', strtotime($_POST['pub_date']));
        $exp_date = date('Y-m-d', strtotime($_POST['exp_date']));
        MainConfig::connectDB();
        $link = MainConfig::conDB();

        $query = "UPDATE `in_system_notifications` SET `title`= '{$title}' , `message` = '{$message}', `publish_date` ='{$pub_date}', `expire_date`= '{$exp_date}' WHERE id = '{$id}'";

        $system->prepareCommandQueryForAlertify($query, "Successfully Update", "Sorry ..! Counld Not Be Updated");
    }
    
    
    if ($_POST['action'] == 'delete_notification') {
        $id = $_POST['id'];
       
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $query = "DELETE FROM `in_system_notifications` WHERE `id` = '$id'";

        $system->prepareCommandQueryForAlertify($query, "Successfully Update", "Sorry ..! Counld Not Be Updated");
    }
}
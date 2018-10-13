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
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $today = date('Y-m-d');

        MainConfig::connectDB(); //open connection
        $link = MainConfig::conDB(); //get connection to link variable

        $query = "INSERT INTO `in_clients` ( `firstname`, `lastname`, `email`, `password_hash` ) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$password}')";
               
       $system->prepareCommandQueryForAlertify($query, "Sign Up Successful", "Sorry ..! Could Not Be Sign Up");
    }
}
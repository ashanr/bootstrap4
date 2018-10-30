<?php

// @@  Developed By Ashan Rajapaksha  2018   Uses PHP 7.0; 
$baseURL = 'http://localhost/bootstrap4/';
$db_HOST = 'localhost';
$db_USER = 'root';
$db_PASS = '';
$db_NAME = 'usermanage';
$store_db_NAME = 'test';
$store_db_USER = 'root';
$store_db_PASS = '';

$user_registration = 1;  // set 0 or 1

try {
    $DB_con = new PDO("mysql:host={$db_HOST};dbname={$db_NAME}", $db_USER, $db_PASS);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

class MainConfig {

    public static function connectDB() {
        global $db_HOST, $db_USER, $db_PASS, $db_NAME;

        $link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($db_HOST, $db_USER, $db_PASS)) or die("Problem occur in connection");
        //  $db = ((bool) mysqli_query($con, "USE " . info));

        mysqli_set_charset($link, 'utf8');
        mysqli_query($link, "SET @@session.sql_mode= 'NO_ENGINE_SUBSTITUTION'");
        date_default_timezone_set('Asia/Colombo');
        $db = mysqli_select_db($link, $db_NAME) or die("Couldn't select database");
    }

    public static function conDB() {
        global $db_HOST, $db_USER, $db_PASS, $db_NAME, $mysqli;
        $mysqli = new mysqli($db_HOST, $db_USER, $db_PASS, $db_NAME);

        return $mysqli;
    }

    public static function closeDB() {
        global $mysqli;
        mysqli_close($mysqli);
    }

    //Connect to Store Database
    public static function connectStoreDB() {
        global $db_HOST, $store_db_USER, $store_db_PASS, $store_db_NAME;

        $link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($db_HOST, $store_db_USER, $store_db_PASS)) or die("Problem occured in connection");
        //  $db = ((bool) mysqli_query($con, "USE " . info));

        mysqli_set_charset($link, 'utf8');
        mysqli_query($link, "SET @@session.sql_mode= 'NO_ENGINE_SUBSTITUTION'");
        date_default_timezone_set('Asia/Colombo');
        $db = mysqli_select_db($link, $store_db_NAME) or die("Couldn't select database");
    }

    //Store DB Link
    public static function conStoreDB() {
        global $db_HOST, $store_db_USER, $store_db_PASS, $store_db_NAME, $mysqli;
        $mysqli = new mysqli($db_HOST, $store_db_USER, $store_db_PASS, $store_db_NAME);
        return $mysqli;
    }
    
    function EncodeURL($url) {
        $new = strtolower(ereg_replace(' ', '_', $url));
        return($new);
    }

    function DecodeURL($url) {
        $new = ucwords(ereg_replace('_', ' ', $url));
        return($new);
    }

    function ChopStr($str, $len) {
        if (strlen($str) < $len)
            return $str;

        $str = substr($str, 0, $len);
        if ($spc_pos = strrpos($str, " "))
            $str = substr($str, 0, $spc_pos);

        return $str . "...";
    }

    function isEmail($email) {
        return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? TRUE : FALSE;
    }

    function isUserID($username) {
        if (preg_match('/^[a-z\d_]{5,20}$/i', $username)) {
            return true;
        } else {
            return false;
        }
    }

    function isURL($url) {
        if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) {
            return true;
        } else {
            return false;
        }
    }

    function checkPwd($x, $y) {
        if (empty($x) || empty($y)) {
            return false;
        }
        if (strlen($x) < 4 || strlen($y) < 4) {
            return false;
        }

        if (strcmp($x, $y) != 0) {
            return false;
        }
        return true;
    }

}

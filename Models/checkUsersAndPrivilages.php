<?php

require_once '../config/dbc.php';
require_once '../class/systemSetting.php';
$system = new setting();
global $token;
global $expire;
global $account;
global $expire_date;
global $account_expire_date;

if (array_key_exists("logSystem", $_POST)) {
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {


        //    $user = 'idragonmain@gmail.com';
        //    $pass = '123@ashan';


        $ip = $_SERVER['REMOTE_ADDR']; // means we got user's IP address 
        $json = file_get_contents('http://ip-api.com/json/' . $ip); // this one service we gonna use to obtain timezone by IP
        //        $json = file_get_contents('http://ip-api.com/json/');
        // maybe it's good to add some checks (if/else you've got an answer and if json could be decoded, etc.)
        $ipInfo = json_decode($json);
        // $timezone = $ipInfo->timezone;
        //  date_default_timezone_set($timezone);
        $user = ($_POST['username']);
        $pass = ($_POST['password']);
        $client_ip = $_SERVER['REMOTE_ADDR'];
        $opt_url = "http://api.nolimitv.com/login/?email=" . $user . "&password=" . $pass . "";

        $curl = curl_init();
        //      CURLOPT_URL => "http://api.nolimitv.com/login/?email=idragonmain@gmail.com&password=123@ashan",


        curl_setopt_array($curl, array(
            CURLOPT_URL => $opt_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Postman-Token: 7bc2fd95-c0e0-4578-9ff7-00b1bc59bf97",
                "X-Forwarded-For:" . $client_ip
            ),
        )); // TOKEN DATA 

        $response = curl_exec($curl); // RESPONSE FROM THE REMOTE
        $err = curl_error($curl); // CURL ERROR STATUS
        curl_close($curl); //CLOSE THE CURL CONNECTION

        $arr = $response;
        $someArray = json_decode($response, true);

        $tk = $someArray['token'];
        // echo $tk;exit;
        $account_details = "http://api.nolimitv.com/account/?&token=" . $tk . "";


        $curl2 = curl_init();
        //      CURLOPT_URL => "http://api.nolimitv.com/login/?email=idragonmain@gmail.com&password=123@ashan",

        curl_setopt_array($curl2, array(
            CURLOPT_URL => $account_details,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Postman-Token: 7bc2fd95-c0e0-4578-9ff7-00b1bc59bf97",
                "X-Forwarded-For:" . $client_ip
            ),
        )); //GETTING ACCOUNT DATA

        $response2 = curl_exec($curl2); // RESPONSE FROM THE REMOTE
        $err2 = curl_error($curl2); // CURL ERROR STATUS
        curl_close($curl2); //CLOSE THE CURL CONNECTION

        $arr_account = $response2;
        $account_data = json_decode($response2, true);
        $account = $account_data['account']; //ACCOUNT TYPE
        $account_name = $account_data['nicename']; //ACCOUNT OWNER NAME
        $expire = $account_data['expire']; //ACCOUNT EXPIRE DATE

        if ($err) {
            echo "cURL Error #:" . $err;
            echo json_encode(array(array("msgType" => 2, "msg" => "User was not available in database, plase check your username")));
        }if ($err2) {
            echo "cURL Error #:" . $err2;
            echo json_encode(array(array("msgType" => 2, "msg" => "User account details not available in the server")));
        } else if (strval($expire) == '0') {
            echo json_encode(array(array("msgType" => 2, "msg" => "Please check your credentials")));
        } else {
            $token = $someArray["token"];
            $today = date('m-d-Y');
            $today_time = strtotime($today);
            $expire_7_days = $someArray["expire"];
            $token_expire_date = date('m-d-Y', $expire_7_days); //TOKEN EXPIRE DATE
            $account_expire_date = strtotime($account_data["expire"]);

            //this function will convert seconds to days.
            function secToDays($sec) {
                return ($sec / 60 / 60 / 24);
            }

            $account_exipre_date_remaning = intval(round(secToDays(($account_expire_date - time())), 0));
            $new_token_expire_date_remaning = intval(round(secToDays(($expire_7_days - time())), 0));

            //checks if cookie is set and prints out expiration time in days
            if (isset($_COOKIE['client_session'])) {
                //   echo "Cookie is set<br />";
                if ($account_exipre_date_remaning <= 7) {
                    //  echo "Cookie will expire  " . $account_exipre_date_remaning . " day(s)";
                    echo json_encode(array(array("msgType" => 0, "msg" => "Successfully Logged to the System")));
                } else if ($account_exipre_date_remaning > 7) {
                    echo json_encode(array(array("msgType" => 0, "msg" => "Successfully Logged to the System")));
                    //    echo "Cookie will expire in " . strval($new_token_expire_date_remaning) . " day(s)";
                }
            } else if (!(isset($_COOKIE['client_session']))) {
                //Set Cookie 
                session_start();
                $_SESSION['user_name'] = $user; //SESSION user_name
                $_SESSION['expiry_date'] = $expire; //SESSION user_name
                $_SESSION['account_owner_name'] = $account_name; //SESSION user_name
                $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);

                //     echo $new_token_expire_date_remaning;exit;
                //      echo $account_exipre_date_remaning; exit;
                //  $token_value = strval($tk);

                if ($account_exipre_date_remaning > $new_token_expire_date_remaning) {
                    //IF  ACCOUNT EXPIRE TIME IS GREATER THAN 7 DAYS COOKIE IS SET FOR REMAINING DATES
                    setcookie("client_session", json_encode($tk), time() + $new_token_expire_date_remaning * 60 * 60 * 24, "/");
                    // setrawcookie("client_session",rawurlencode($tk) , time() + $new_token_expire_date_remaning * 60 * 60 * 24, "/");
                    //  echo "New Cookie is set for " . strval($new_token_expire_date_remaning) . " days<br />";
                    echo json_encode(array(array("msgType" => 0, "msg" => "Successfully Logged to the System")));
                    //COOKIE EXPIES WHEN ACCOUNT EXPIRE DATE EXCEEDS
                } else if ($account_exipre_date_remaning <= $new_token_expire_date_remaning) {
                    //IF  ACCOUNT EXPIRE TIME IS LESS THAN 7 DAYS COOKIE IS SET FOR REMAINING DATES
                    //      $diff_days = date_diff($expire_7_days, $account_expire_date);

                    setcookie("client_session", strval($tk), time() + $account_exipre_date_remaning * 60 * 60 * 24, "/");
                    //  echo "New Cookie is set   " . $expire_dt . " days<br />";
                    echo json_encode(array(array("msgType" => 0, "msg" => "Successfully Logged into the System")));
                    //THIS COOKIE EXPIRES WHEN REMANING ACCOUNT EXPIRATION DATE OCCURS
                } else {
                    echo json_encode(array(array("msgType" => 3, "msg" => "Error Occured!")));
                    exit;
                }
            }
        }
    } elseif (!isset($_POST['username'])) {
        echo json_encode(array(array("msgType" => 3, "msg" => "Please check username")));
    } else if (!isset($_POST['password'])) {
        echo json_encode(array(array("msgType" => 3, "msg" => "Please check password")));
    }
}

if (array_key_exists("logout", $_POST)) {
    session_start();
    unset($_SESSION['user_name']);
    unset($_SESSION['HTTP_USER_AGENT']);
    echo 1;
}

if (array_key_exists('pageProtect', $_POST)) {
    session_start();
    if (isset($_SESSION['HTTP_USER_AGENT']) && isset($_SESSION['usrStatus'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 1;
    }
}

if (array_key_exists('checkUrl', $_POST)) {
    $ok = 0;
    $back = 0;
    session_start();
    $getUserPrivilages = $system->prepareSelectQuery("SELECT
in_usrprvlg.usrID,
 in_sysprvlg.usrPrvMnuPath
FROM
in_usrprvlg
INNER JOIN in_sysprvlg ON in_usrprvlg.usrPrvCode = in_sysprvlg.prvCode
WHERE in_usrprvlg.usrID = '{{$_SESSION['user_id']}'");
    if ($getUserPrivilages) {
        foreach ($getUserPrivilages AS $aa) {
            if ($_POST['path'] == '/accounts_system/' . $aa['usrPrvMnuPath']) {
                $ok++;
            } else {
                $back++;
            }
        }
        echo json_encode(array("ok" => $ok, "back" => $back));
    }
}


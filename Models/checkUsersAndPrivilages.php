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
    if ((!empty($_POST['userName'])) &&  (!empty($_POST['password']))) {
        $user = ($_POST['userName']);
        $pass = ($_POST['password']);
        $userQuery = "SELECT
in_usr.usrID,
in_usr.usrName,
in_usr.usrPwd,
in_usr.usrStatus,
in_usr.usrLevel,
in_usr.userBranchID
FROM
in_usr
WHERE
(in_usr.usrStatus = '1') AND
in_usr.usrName = '{$user}' LIMIT 1";
        $userAvailability = $system->getCountByQuery($userQuery);
        if ($userAvailability > 0) {
            $userDetails = $system->prepareSelectQuery($userQuery);
            $encriptedPass = sha1('MDCC' . $pass . 'badboyes');
            foreach ($userDetails as $ud) {
                if ($ud['usrPwd'] == $encriptedPass) {
                    //Set Cookie if select remember btn
                    session_start();
                    $_SESSION['user_id'] = $ud['usrID'];
                    $_SESSION['user_name'] = $ud['usrName'];
                    $_SESSION['user_level'] = $ud['usrLevel'];
                    $_SESSION['usrStatus'] = $ud['usrStatus'];
                    $_SESSION['branch'] = $ud['userBranchID'];
                    $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);

                    if (isset($_POST['remember']) && $_POST['remember'] == 'r') {
                        setcookie("user_id", $_SESSION['user_id'], time() + 60 * 60 * 24 * COOKIE_TIME_OUT, "/");
                        setcookie("user_name", $_SESSION['user_name'], time() + 60 * 60 * 24 * COOKIE_TIME_OUT, "/");
                    }
                    echo json_encode(array(array("msgType" => 0, "msg" => "Successfully Logged to the System")));
                } else {
                    echo json_encode(array(array("msgType" => 1, "msg" => "Password was incorrect.Please Check your Password")));
                }
            }
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => "User was not available in database,plase check your username")));
        }
    } else {
        echo json_encode(array(array("msgType" => 3, "msg" => "Please enter username or password")));
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


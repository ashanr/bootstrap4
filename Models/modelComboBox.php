<?php

require_once '../config/dbc.php';
require_once '../class/systemSetting.php';
$system = new setting();
global $token;
global $expire;
global $account;
global $expire_date;
global $account_expire_date;

if (array_key_exists("action", $_POST)) {

    if ($_POST['action'] == 'loadUsernameCombo') {
        $system->prepareSelectQueryForJSON("SELECT
                                                in_usr.usrID,
                                                in_usr.usrName,
                                                in_usr.usrFName,
                                                in_usr.usrLName,
                                                in_usr.usrLevel,
                                                in_usr.usrPwd,
                                                in_usr.usrRegDate,
                                                in_usr.usrStatus
                                                FROM
                                                in_usr
                                                ");
    }
}


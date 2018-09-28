<?php

//require_once '../class/ap_funtions.php';
require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
//require_once '../class/functionsByKIT.php';
$system = new setting();
$database = new database();
//$pasdManage = new MainConfig();
if (array_key_exists("action", $_POST)) {

    if ($_POST['action'] == 'saveAdminLevels') {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $getSeqno = mysqli_query($link, "SELECT
in_usrlevel.usrLvlPrvSeq,
in_usrlevel.lvID
FROM
in_usrlevel
WHERE in_usrlevel.usrLvlPrvSeq != '20'");
        $count = mysqli_num_rows($getSeqno);
        $seqNo = $count + 1;
        $system->prepareCommandQueryForAlertify("INSERT INTO `in_usrlevel` (`lvName`, `usrLvlPrvSeq`) VALUES ('{$_POST['userLevel']}', '{$seqNo}');", "Successfully Saved", "Sorry ..! Counld Not Be Saved");
    } else if ($_POST['action'] == 'userLevelTbl') {
        $system->prepareSelectQueryForJSON("SELECT
in_usrlevel.lvID,
in_usrlevel.lvName,
in_usrlevel.usrLvlPrvSeq
FROM
in_usrlevel
ORDER BY in_usrlevel.lvID DESC");
    } else if ($_POST['action'] == 'deleteUserLevel') {
        $system->prepareCommandQueryForAlertify("DELETE FROM `in_usrlevel` WHERE (`lvID`='{$_POST['userLevelId']}')", "Successfully Deleted", "Sorry ..! Counld Not Be Deleted");
    } else if ($_POST['action'] == 'loadUserLevelCombo') {
        $system->prepareSelectQueryForJSON("SELECT
in_usrlevel.lvName,
in_usrlevel.lvID,
in_usrlevel.usrLvlPrvSeq
FROM
in_usrlevel
WHERE in_usrlevel.usrLvlPrvSeq != '20'");
    } else if ($_POST['action'] == 'loadPrivillegeCombo') {
        $system->prepareSelectQueryForJSON("SELECT
in_sysprvlg.prvCode,
in_sysprvlg.usrPrvMnuName
FROM `in_sysprvlg`
");
    } else if ($_POST['action'] == 'selectUlevel') {
        $system->prepareSelectQueryForJSON("SELECT
in_usrlevel.lvName,
in_usrlevel.lvID
FROM
in_usrlevel WHERE in_usrlevel.lvID = '{$_POST['userLevelId']}'");
    } else if ($_POST['action'] == 'updateUlevel') {
        $system->prepareCommandQueryForAlertify("UPDATE `in_usrlevel` SET `lvName`='{$_POST['newUserLevel']}' WHERE (`lvID`='{$_POST['hiddnField']}');", "Successfully Updated", "Sorry ..! Counld Not Be Update");
    } else if ($_POST['action'] == 'addNewAdminUser') {
        $time = date("h:i:s a");
        $encriptedPass = sha1('Cyber' . $_POST['password'] . 'code');
        $system->prepareCommandQueryForAlertify("INSERT INTO `in_usr` (`usrName`, `usrFName`, `usrLName`, `usrLevel`, `usrPwd`, `usrRegDate`, `usrStatus`, `usrAddress`, `usrEmail`, `lstLgDate`, `lstLgTime`, `usrEmpNo`, `usrNIC`, `usrMobileNo`, `usrWorkTelNo`, `usrHomeTelNo`, `userBranchID`) VALUES ('{$_POST['username']}', '{$_POST['fName']}', '{$_POST['lName']}', '{$_POST['selUserLevel']}', '{$encriptedPass}', '{$_POST['date']}', '{$_POST['userStatus']}', '{$_POST['address']}', '{$_POST['eMail']}', '{$_POST['date']}', '{$time}', '{$_POST['empNo']}', '{$_POST['nic']}', '{$_POST['mobile']}', '{$_POST['work']}', '{$_POST['home']}', '{$_POST['branchID']}');", "Successfully Saved", "Sorry ..! Counld Not Be Save");
        // }
    } else if ($_POST['action'] == 'checkUname') {
        $count = $system->prepareRowQuntQuary("SELECT
in_usr.usrName
FROM
in_usr WHERE in_usr.usrName = '{$_POST['typeUname']}'");
        echo $count;
    } else if ($_POST['action'] == 'adminUserTbl') {
        $system->prepareSelectQueryForJSON("SELECT
in_usr.usrName,
in_usr.usrFName,
in_usr.usrLName,
in_usr.usrID,
in_usrlevel.lvName,
in_usrlevel.usrLvlPrvSeq,
in_usr.usrEmail,
in_usr.lstLgTime,
in_usr.usrStatus,
in_usr.usrLevel
FROM
in_usr
INNER JOIN in_usrlevel ON in_usr.usrLevel = in_usrlevel.lvID
WHERE in_usrlevel.usrLvlPrvSeq != '20'
ORDER BY in_usr.usrID DESC");
    } else if ($_POST['action'] == 'getUserData') {
        $system->prepareSelectQueryForJSON("SELECT
in_usr.usrName,
in_usr.usrFName,
in_usr.usrLName,
in_usr.usrID,
in_usr.usrLevel,
in_usr.usrPwd,
in_usr.usrRegDate,
in_usr.usrStatus,
in_usr.usrAddress,
in_usr.usrEmail,
in_usr.lstLgDate,
in_usr.lstLgTime,
in_usr.usrEmpNo,
in_usr.usrNIC,
in_usr.usrMobileNo,
in_usr.usrWorkTelNo,
in_usr.usrHomeTelNo
FROM
in_usr WHERE in_usr.usrID = '{$_POST['userId']}'");
    } else if ($_POST['action'] == 'updateSystemUserData') {
        $system->prepareCommandQueryForAlertify("UPDATE `in_usr` SET `usrFName`='{$_POST['fName']}', `usrLName`='{$_POST['lName']}', `usrLevel`='{$_POST['selUserLevel']}', `usrRegDate`='{$_POST['date']}', `usrStatus`='{$_POST['userStatus']}', `usrAddress`='{$_POST['address']}', `usrEmail`='{$_POST['eMail']}', `lstLgDate`='', `lstLgTime`='', `usrEmpNo`='{$_POST['empNo']}', `usrNIC`='{$_POST['nic']}', `usrMobileNo`='{$_POST['mobile']}', `usrWorkTelNo`='{$_POST['work']}', `usrHomeTelNo`='{$_POST['home']}' WHERE (`usrID`='{$_POST['hiddenUserId']}');", "Successfully Updated", "Sorry ..! Counld Not Be Update");
    } else if ($_POST['action'] == 'deleteUser') {
        $system->prepareCommandQueryForAlertify("DELETE FROM `in_usr` WHERE (`usrID`='{$_POST['userId']}')", "Successfully Deleted", "Sorry ..! Counld Not Be Delete");
    } else if ($_POST['action'] == 'loadUsernameCombo') {
        $system->prepareSelectQueryForJSON("SELECT
in_usr.usrName,
in_usr.usrID,
in_usrlevel.usrLvlPrvSeq
FROM
in_usr
INNER JOIN in_usrlevel ON in_usr.usrLevel = in_usrlevel.lvID
WHERE in_usrlevel.usrLvlPrvSeq != '20'");
    } else if ($_POST['action'] == 'loadprevilege_user') {
        $query = "SELECT
in_usrlevel.lvID
FROM
in_usr
INNER JOIN in_usrlevel ON in_usr.usrLevel = in_usrlevel.lvID
WHERE
in_usr.usrID = '{$_POST['sel_u']}' LIMIT 1";
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_row($link, $result);

        $system->prepareSelectQueryForJSON("SELECT
in_sysprvlg.prvCode,
in_sysprvlg.prvName,
in_sysprvlg.prvStatus,
in_sysprvlg.usrPrvMnuName,
in_sysprvlg.usrPrvMnuPath,
in_sysprvlg.usrPrnt
FROM
in_sysprvlg
INNER JOIN in_usrlvlpriv ON in_usrlvlpriv.usrPrivilage = in_sysprvlg.prvCode
WHERE
in_usrlvlpriv.usrLvl = '{$row[0]}'");
    } else if ($_POST['action'] == 'add_privlage') {
//        print_r($_POST);
        $retar = array();
        MainConfig::connectDB();
        foreach ($_POST['options'] as $v) {
            $query = "INSERT INTO `in_usrprvlg` (`usrID`, `usrPrvCode`) "
                    . "VALUES ('{$_POST['userid']}', $v)";
            $link = MainConfig::conDB();
            $result = mysqli_query($link, $query);
            if ($result) {
                $retar[] = array(
                    "msgType" => 1,
                    "msg" => "Successfully Saved"
                );
            }
        }
        MainConfig::closeDB();
        echo json_encode($retar);
    } else if ($_POST['action'] == 'savePrivillegeLevels') {
        $system->prepareCommandQueryForAlertify("INSERT INTO `in_usrlvlpriv` (`usrLvl`, `usrPrivilage`) VALUES ('{$_POST['selUserLevel']}', '{$_POST['selUserPrivilege']}');", "Successfully Saved", "Sorry ..! Counld Not Be Save");
    } else if ($_POST['action'] == 'userPrivilTbl') {
        $system->prepareSelectQueryForJSON("SELECT
                    in_usrlevel.lvName,
                    in_sysprvlg.prvName,
                    in_usrlvlpriv.usrLvl
                FROM
                    in_usrlvlpriv
                    INNER JOIN in_usrlevel ON in_usrlvlpriv.usrLvl = in_usrlevel.lvID
                    INNER JOIN in_sysprvlg ON in_usrlvlpriv.usrPrivilage = in_sysprvlg.prvCode
                WHERE
                    in_usrlvlpriv.usrLvl = '{$_POST['usrLvl']}'");
    } else if ($_POST['action'] == 'deletePriviLevel') {
        $system->prepareCommandQueryForAlertify("DELETE FROM `in_usrlvlpriv` WHERE (`usrLvl`='{$_POST['selUserLevel']}')", "Successfully Deleted", "Sorry ..! Counld Not Be Deleted");
    } else if ($_POST['action'] == 'rightuser_privileges') {

        $system->prepareSelectQueryForJSON("
            SELECT
                in_usrprvlg.usrID,
                in_usrprvlg.usrPrvCode,
                in_sysprvlg.prvCode,
                in_sysprvlg.prvName,
                in_sysprvlg.prvStatus,
                in_sysprvlg.usrPrvMnuName,
                in_sysprvlg.usrPrvMnuPath
            FROM
                    in_usrprvlg
                    INNER JOIN in_sysprvlg ON in_usrprvlg.usrPrvCode = in_sysprvlg.prvCode
            WHERE
                in_usrprvlg.usrID = '{$_POST['sel_u']}'   ");
    } else if ($_POST['action'] == 'loadfilter_left_user') {
        $all = array();
        $ret = array();
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $query = "SELECT prvCode AS prvCode, in_sysprvlg.prvName AS prvName FROM in_sysprvlg";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $all[$row['prvCode']] = $row['prvName'];
        }

        $query = "SELECT in_usrprvlg.usrID, in_usrprvlg.usrPrvCode AS prvCode
        FROM in_usrprvlg WHERE in_usrprvlg.usrID = '{$_POST['sel_u']}'";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            unset($all[$row['prvCode']]);
        }
        MainConfig::closeDB();
        foreach ($all as $k => $v) {
            $ret[] = array(
                'prvCode' => $k,
                'prvName' => $v
            );
        }
        echo json_encode($ret);
    } else if ($_POST['action'] == 'remove_user_privilege') {

        $retar = array();

        foreach ($_POST['options'] as $v) {
            $query = "DELETE FROM `in_usrprvlg` WHERE (`usrID`='{$_POST['userid']}' AND `usrPrvCode`= $v )";
            MainConfig::connectDB();
            $link = MainConfig::conDB();
            $result = mysqli_query($link, $query);
            MainConfig::closeDB();
            if ($result) {
                $retar[] = array(
                    "msgType" => 1,
                    "msg" => "Successfully Deleted"
                );
            }
        }
        echo json_encode($retar);
    } else if ($_POST['action'] == 'systemuser') {
        $system->prepareCommandQueryForAlertify("UPDATE `in_usr` SET `usrFName`='{$_POST['fName']}', `usrLName`='{$_POST['lName']}', `usrLevel`='{$_POST['selUserLevel']}', `usrRegDate`='{$_POST['date']}', `usrStatus`='{$_POST['userStatus']}', `usrAddress`='{$_POST['address']}', `usrEmail`='{$_POST['eMail']}', `usrEmpNo`='{$_POST['empNo']}',`usrNIC`='{$_POST['nic']}', `usrMobileNo`='{$_POST['mobile']}', `usrWorkTelNo`='{$_POST['work']}',`usrHomeTelNo`='{$_POST['home']}' WHERE (`usrID`='{$_POST['hiddenUserId']}');", "Successfully Updated", "Sorry ..! Counld Not Be Update");
    } else if ($_POST['action'] == 'dev_junk_all_pwds') {
        $system->prepareCommandQuerySpecial("UPDATE `in_usr` SET `usrPwd` = 'fc9b7b572c58ba13eeff430df85'");
    } else if ($_POST['action'] == 'dev_reset_all_pwds') {
        //set password to 'admin'
        $system->prepareCommandQuerySpecial("UPDATE `in_usr` SET `usrPwd` = '56e2636af1fedd1c6f89df1ea09bf1ba120f52e7'");
    }
}

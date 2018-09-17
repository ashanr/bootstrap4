<?php

require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$dbClass = new database();
$system = new setting();

if (array_key_exists("table", $_POST)) {
    if ($_POST['table'] == 'load_notificaiton_table') {
        $query_p1 = "SELECT
	in_system_notifications.id,
	in_system_notifications.message,
	in_system_notifications.publish_date,
	in_system_notifications.expire_date,
	in_system_notifications.added_date,
	in_system_notifications.title
        FROM
	`in_system_notifications`";

//        if (isset($_POST['customer_id']) > 0 && (isset($_POST['serch_text']) && (!empty($_POST['serch_text'])))) {
//            $query_p1 .= " WHERE quotation.invoce_no LIKE '%{$_POST['serch_text']}%' AND quotation.customer_id = '{$_POST['customer_id']}'";
//            $system->prepareSelectQueryForJSON($query_p1);
//            return;
//        }
//        if ($_POST['customer_id'] > 0) {
//            $query_p1 .= " WHERE quotation.customer_id = '{$_POST['customer_id']}'";
//        }
//        if (isset($_POST['serch_text']) && (!empty($_POST['serch_text']))) {
//            $query_p1 .= " WHERE quotation.invoce_no LIKE '%{$_POST['serch_text']}%'";
//        }

        $query_p1 .= "ORDER BY id DESC ";
        //echo $query_p1; exit();
        $system->prepareSelectQueryForJSON($query_p1);
    }

    if ($_POST['table'] == 'select_notification') {
        
        $id = $_POST['id'];
        
        $query_p1 = "SELECT
	in_system_notifications.id,
	in_system_notifications.message,
	in_system_notifications.publish_date,
	in_system_notifications.expire_date,
	in_system_notifications.added_date,
	in_system_notifications.title
        FROM
	`in_system_notifications` WHERE in_system_notifications.id = '{$id}' ";

   
        $system->prepareSelectQueryForJSON($query_p1);
    }
}
<?php

require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$dbClass = new database();
$system = new setting();

if (array_key_exists("table", $_POST)) {
    if ($_POST['table'] == 'load_registered_customers_table') {

        $query_p1 = "SELECT
                            magento.customer_entity.entity_id,
                            magento.customer_entity.website_id,
                            magento.customer_entity.email,
                            magento.customer_entity.group_id,
                            magento.customer_entity.increment_id,
                            magento.customer_entity.store_id,
                            magento.customer_entity.created_at,
                            magento.customer_entity.updated_at,
                            magento.customer_entity.is_active,
                            magento.customer_entity.disable_auto_group_change,
                            magento.customer_entity.created_in,
                            magento.customer_entity.prefix,
                            magento.customer_entity.firstname,
                            magento.customer_entity.middlename,
                            magento.customer_entity.lastname,
                            magento.customer_entity.suffix,
                            magento.customer_entity.dob,
                            magento.customer_entity.password_hash,
                            magento.customer_entity.rp_token,
                            magento.customer_entity.rp_token_created_at
                            FROM
                            magento.customer_entity
                            ";

        $data = array();
        MainConfig::connectStoreDB();
        $link = MainConfig::conStoreDB();
        $result = mysqli_query($link, $query_p1) or die(mysqli_error($link));
        MainConfig::closeDB();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
      //  echo json_encode($data);
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
<?php

require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$dbClass = new database();
$system = new setting();

if (array_key_exists("table", $_POST)) {
    if ($_POST['table'] == 'load_affiliate_customer_table') {

        $query_affiliate = "SELECT
                            mageplaza_affiliate_account.account_id,
                            mageplaza_affiliate_account.customer_id,
                            mageplaza_affiliate_account.group_id,
                            mageplaza_affiliate_account.balance,
                            mageplaza_affiliate_account.holding_balance,
                            mageplaza_affiliate_account.total_commission,
                            mageplaza_affiliate_account.total_paid,
                            mageplaza_affiliate_account.`status`,
                            mageplaza_affiliate_account.email_notification,
                            mageplaza_affiliate_account.parent,
                            mageplaza_affiliate_account.tree,
                            mageplaza_affiliate_account.withdraw_method,
                            mageplaza_affiliate_account.withdraw_information,
                            mageplaza_affiliate_account.created_at,
                            mageplaza_affiliate_account.`code`,
                            customer_entity.entity_id,
                            customer_entity.website_id,
                            customer_entity.email,
                            customer_entity.group_id,
                            customer_entity.increment_id,
                            customer_entity.store_id,
                            customer_entity.created_at,
                            customer_entity.updated_at,
                            customer_entity.is_active,
                            customer_entity.disable_auto_group_change,
                            customer_entity.created_in,
                            customer_entity.prefix,
                            customer_entity.firstname,
                            customer_entity.middlename,
                            customer_entity.lastname,
                            customer_entity.suffix,
                            customer_entity.dob,
                            customer_entity.password_hash,
                            customer_entity.rp_token,
                            customer_entity.rp_token_created_at,
                            customer_entity.default_billing,
                            customer_entity.default_shipping,
                            customer_entity.taxvat,
                            customer_entity.confirmation,
                            customer_entity.gender,
                            customer_entity.failures_num,
                            customer_entity.first_failure,
                            customer_entity.lock_expires
                            FROM
                            mageplaza_affiliate_account
                            INNER JOIN customer_entity ON mageplaza_affiliate_account.customer_id = customer_entity.entity_id
                           ";

        $data = array();
        MainConfig::connectStoreDB();
        $link = MainConfig::conStoreDB();

        $result = mysqli_query($link, $query_affiliate) or die(mysqli_error($link));
        MainConfig::closeDB($link);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data); //send data to the table
    }


    if ($_POST['table'] == 'load_affiliate_tree') {

        $query_affiliate = "SELECT
                            mageplaza_affiliate_account.account_id,
                            mageplaza_affiliate_account.customer_id,
                            mageplaza_affiliate_account.group_id,
                            mageplaza_affiliate_account.balance,
                            mageplaza_affiliate_account.holding_balance,
                            mageplaza_affiliate_account.total_commission,
                            mageplaza_affiliate_account.total_paid,
                            mageplaza_affiliate_account.`status`,
                            mageplaza_affiliate_account.email_notification,
                            mageplaza_affiliate_account.parent,
                            mageplaza_affiliate_account.tree,
                            mageplaza_affiliate_account.withdraw_method,
                            mageplaza_affiliate_account.withdraw_information,
                            mageplaza_affiliate_account.created_at,
                            mageplaza_affiliate_account.`code`,
                            customer_entity.entity_id,
                            customer_entity.website_id,
                            customer_entity.email,
                            customer_entity.group_id,
                            customer_entity.increment_id,
                            customer_entity.store_id,
                            customer_entity.created_at,
                            customer_entity.updated_at,
                            customer_entity.is_active,
                            customer_entity.disable_auto_group_change,
                            customer_entity.created_in,
                            customer_entity.prefix,
                            customer_entity.firstname,
                            customer_entity.middlename,
                            customer_entity.lastname,
                            customer_entity.suffix,
                            customer_entity.dob,
                            customer_entity.password_hash,
                            customer_entity.rp_token,
                            customer_entity.rp_token_created_at,
                            customer_entity.default_billing,
                            customer_entity.default_shipping,
                            customer_entity.taxvat,
                            customer_entity.confirmation,
                            customer_entity.gender,
                            customer_entity.failures_num,
                            customer_entity.first_failure,
                            customer_entity.lock_expires
                            FROM
                            mageplaza_affiliate_account
                            INNER JOIN customer_entity ON mageplaza_affiliate_account.customer_id = customer_entity.entity_id
                            WHERE parent= '{$_POST['account_id']}'";

        $data = array();
        MainConfig::connectStoreDB();
        $link = MainConfig::conStoreDB();

        $result = mysqli_query($link, $query_affiliate) or die(mysqli_error($link));
        MainConfig::closeDB($link);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data); //send data to the table
    }


    if ($_POST['table'] == 'build_affiliate_tree') {

        $level = $_POST['level'];

        $query_affiliate = "SELECT
                                LENGTH(mageplaza_affiliate_account.tree) - LENGTH(REPLACE(mageplaza_affiliate_account.tree, '/', '')) AS NOOFSEC,
                                mageplaza_affiliate_account.tree,
                                SUBSTRING_INDEX(mageplaza_affiliate_account.tree,'/',1) AS PART1,
                                SUBSTRING_INDEX(SUBSTRING_INDEX(mageplaza_affiliate_account.tree,'/',2),'/',-1) AS PART2,
                                SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(mageplaza_affiliate_account.tree,'/',-2),'/',-1),'/',-1) AS PART3,
                                SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(mageplaza_affiliate_account.tree,'/',-2),'/',2),'/',1) AS PART4,
                                SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(mageplaza_affiliate_account.tree,'/',-2),'/',2),'/',-1) AS PART5,
                                mageplaza_affiliate_account.account_id,
                                customer_entity.entity_id,
                                customer_entity.email,
                                mageplaza_affiliate_account.parent,
                                mageplaza_affiliate_account.tree,
                                mageplaza_affiliate_account.customer_id
                                FROM
                                mageplaza_affiliate_account
                                INNER JOIN customer_entity ON customer_entity.entity_id = mageplaza_affiliate_account.customer_id
                                WHERE SUBSTRING_INDEX(mageplaza_affiliate_account.tree,'/',1) = '{$_POST['account_id']}'  ";

        if($level != "ALL"){
            $query_affiliate .= " HAVING NOOFSEC = '{$_POST['level']}'";
        }                        
                                
        //  echo $query_affiliate;exit;

        $data = array();
        MainConfig::connectStoreDB();
        $link = MainConfig::conStoreDB();

        $result = mysqli_query($link, $query_affiliate) or die(mysqli_error($link));
        MainConfig::closeDB($link);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data); //send data to the table
    }
}
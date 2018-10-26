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

    if ($_POST['action'] == 'load_affiliate_user_combo') {
        $query_p1 = "SELECT
                        mageplaza_affiliate_account.account_id,
                        mageplaza_affiliate_account.customer_id,
                        customer_entity.email,
                        mageplaza_affiliate_account.`code`,
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
                        mageplaza_affiliate_account.created_at
                        FROM
                        mageplaza_affiliate_account
                        INNER JOIN customer_entity ON mageplaza_affiliate_account.customer_id = customer_entity.entity_id
                                                ";
        $data = array();
        MainConfig::connectStoreDB();
        $link = MainConfig::conStoreDB();
        $result = mysqli_query($link, $query_p1) or die(mysqli_error($link));
        MainConfig::closeDB();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}


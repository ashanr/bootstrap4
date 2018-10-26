<?php

require_once('vendors/stripe/init.php');
require_once('vendors/stripe/vendor/autoload.php');
//$curl = curl_init();
//
//curl_setopt_array($curl, array(
//  CURLOPT_URL => "https://api.stripe.com/v1/charges",
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_ENCODING => "",
//  CURLOPT_MAXREDIRS => 10,
//  CURLOPT_TIMEOUT => 30,
//  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//  CURLOPT_CUSTOMREQUEST => "POST",
//  CURLOPT_HTTPHEADER => array(
//    "Authorization: Bearer -u sk_test_4eC39HqLyjWDarjtT1zdp7dc",
//    "Cache-Control: no-cache",
//    "Postman-Token: a17bbe57-60f5-4a0d-aa1a-6998ca3ce000"
//  ),
//));
//
//$response = curl_exec($curl);
//$err = curl_error($curl);
//
//curl_close($curl);
//
//if ($err) {
//  echo "cURL Error #:" . $err;
//} else {
//  echo $response;
//}

$stripe = array(
    "secret_key" => "pk_test_ihaqV9DMuyx97GPykzCxhF5x",
    "publishable_key" => "sk_test_vAjZyygvcKz8uLWoNkYfjZBu"
);

$connect = \Stripe\Stripe::setApiKey($stripe['secret_key']);


if ($connect) {
    echo "success";
} else {
    echo 'fail';
}
?>
<?php

require_once('vendors/stripe/init.php');
require_once('vendors/stripe/vendor/autoload.php');

$stripe = array(
    "secret_key" => "sk_test_vAjZyygvcKz8uLWoNkYfjZBu",
    "publishable_key" => "pk_test_ihaqV9DMuyx97GPykzCxhF5x"
);

Stripe\Stripe::setApiKey($stripe['secret_key']);
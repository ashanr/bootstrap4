<?php

$explode_url = explode(delimeter: '/', $url);
$explode_url = array_slice($explode_url,offset: 2);
$request-> controller = $explode_url[0];
$request->action = $explode_url[1];
$request->params = array_slice($explode_url,offset:2);

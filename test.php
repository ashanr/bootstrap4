<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.nolimitv.com/login/?email=idragonmain@gmail.com&password=123@ashan",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Postman-Token: 7bc2fd95-c0e0-4578-9ff7-00b1bc59bf97"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$arr = $response;

 $someArray = json_decode($response, true);
 // print_r($someArray);        // Dump all data of the Array


if ($err) {
  echo "cURL Error #:" . $err;
} else {


foreach($someArray as $key=>$value){
 echo $key.' -'.$value."</br>";   
    
}

}
exit;
?>

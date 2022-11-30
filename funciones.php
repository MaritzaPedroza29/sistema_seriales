<?php
function leer_api_alegra($url){
         $curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Authorization: Basic Q29udGFjdG9AYWxpYW54YS5zaTo2MGQyNzkzOTQxNThjYTQzNGZhZQ==",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
    return json_decode($resp, true);
 }
 
?>
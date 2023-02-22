<?php

include "functions.php";

$MessageID = getValue('MessageID', 'str', 'POST', 0);


if ($MessageID  != 0) {
    $curl  = curl_init();
    $data  = ['MessageID' => $MessageID];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/message/DeleteMessage');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}

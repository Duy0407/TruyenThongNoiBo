<?php

include "functions.php";

$MessageId = getValue("MessageId", "str", "POST", "");
$ListUserId = getValue("ListUserId", "arr", "POST", []);
$Type = getValue("Type", "str", "POST", "");


if ($MessageId != "" && count($ListUserId) > 0 && $Type != "") {
    $curl  = curl_init();
    $data  = [
        'MessageId' => $MessageId,
        'ListUserId' => $ListUserId,
        'Type' => $Type
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/message/SetEmotionMessage');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}

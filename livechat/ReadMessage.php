<?php

include "functions.php";

$senderId = getValue("senderId", "str", "POST", "");
$conversationId = getValue("conversationId", "str", "POST", "");


if ($senderId != "" && $conversationId != "") {
    $curl  = curl_init();
    $data  = [
        'senderId' => $senderId,
        'conversationId' => $conversationId,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    // http://43.239.223.142:9000/api/conversations/ReadMessage
    // https://mess.timviec365.vn/Conversation/ReadMessage
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/conversations/ReadMessage');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}

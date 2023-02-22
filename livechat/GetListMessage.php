<?php

include "functions.php";

$clientId = getValue("clientId", "str", "POST", "");
$fromWeb = getValue("fromWeb", "str", "POST", "");
$countMess = getValue("countMess", "str", "POST", 0);
$countLoad = getValue("countLoad", "str", "POST", 10);


if ($clientId != "" && $fromWeb != "") {
    $curl  = curl_init();
    $data  = [
        'clientId' => $clientId,
        'fromWeb' => $fromWeb,
        'countMess' => $countMess,
        'countLoad' => $countLoad,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    // http://43.239.223.142:9000/api/message/LoadMessageLiveChat
    // https://mess.timviec365.vn/Message/GetListMessage_LiveChat
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/message/LoadMessageLiveChat');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}

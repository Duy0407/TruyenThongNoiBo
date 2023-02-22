<?php

include "functions.php";

$ConversationID = getValue('ConversationID', 'int', 'POST', 0);
$SenderID = getValue('SenderID', 'int', 'POST', 0);
$MessageType = getValue('MessageType', 'str', 'POST', '');
$Message = getValue('Message', 'str', 'POST', '');
$LiveChat = getValue('LiveChat', 'str', 'POST', '');
$InfoSupport = getValue('InfoSupport', 'str', 'POST', '');
$File = getValue("File", "arr", "POST", "");
$Quote = getValue("Quote", "str", "POST", "");

if ($ConversationID  != 0 && $SenderID != 0 && $MessageType != '' && $Message != '') {
    $curl  = curl_init();
    $data  = [
        'ConversationID' => $ConversationID,
        'SenderID' => $SenderID,
        'MessageType' => $MessageType,
        'Message' => $Message,
        'Quote' => $Quote
    ];

    if ($File != "") {
        $data['File'] = $File;
    }

    if ($LiveChat != '') {
        $data['LiveChat'] = $LiveChat;
    }

    if ($InfoSupport != '') {
        $data['InfoSupport'] = $InfoSupport;
    }

    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    // https://mess.timviec365.vn/Message/SendMessage
    // http://43.239.223.142:9000/api/message/SendMessage
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/message/SendMessage');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}

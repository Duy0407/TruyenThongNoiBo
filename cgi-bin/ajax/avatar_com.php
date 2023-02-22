<?php
require_once '../config/config.php';
if (!isset($_FILES['image'])) {
    header("Location: /");
}else{
    $access_token   = $_SESSION['login']['acc_token'];
    $curl           = curl_init();
    $header[]       = 'Authorization: '.$access_token.'';
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://chamcong.24hpay.vn/service/update_logo_company.php',
        CURLOPT_POST => 1,
        CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_POSTFIELDS => array(
            'logo' => curl_file_create($_FILES['image']['tmp_name'],$_FILES['image']['type'],$_FILES['image']['name']),
        )
    ));
    $resp = curl_exec($curl);
    
    echo json_encode([
        'result'=>true,
        'msg' => $resp
    ]);
}
?>
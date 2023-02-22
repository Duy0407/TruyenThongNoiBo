<?php
require '../config/config.php';

if (isset($_FILES['file'])){
    // api cập nhật avt chuyển đổi số
    $curl = curl_init();
    $data = [
        "id_ep" => $_SESSION['login']['id'],
        "logo"  => curl_file_create($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']),
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/update_logo_employee.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_COOKIE['acc_token']));
    
    $response = curl_exec($curl);
    curl_close($curl);
    $data_tt = json_decode($response, true);
    if ($data_tt['error'] == NULL && $data_tt['data']['result'] == true && $data_tt['data']['id'] != ''){
        // cập nhật session
        $_SESSION['login']['logo'] = "https://chamcong.24hpay.vn/upload/employee/".$data_tt['data']['id'];
        // api cập nhật avt chat365 và timviec365
        $curl = curl_init();
        $data = [
            "ID365" => $_SESSION['login']['id'],
            "Type365"  => $_SESSION['login']['user_type'],
            "email"  => $arr_ep[$_SESSION['login']['id']]['ep_email'],
            "AvatarUser"  => $_SESSION['login']['logo'],
        ];
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, 'https://timviec365.vn/api/update_infor.php');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_COOKIE['acc_token']));
        
        $response = curl_exec($curl);
        curl_close($curl);
        $data_tt = json_decode($response, true);
    
        echo json_encode(['result'=>true]);
    }else{
        echo json_encode(['result'=>false]);
    }
}else{
    echo json_encode(['result'=>false]);
}
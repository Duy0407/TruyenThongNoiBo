<?php
require_once '../config/config.php';
$user_name = getValue('txt_name_user','str','POST','');
$user_address = getValue('txt_address','str','POST','');
$user_phone = getValue('txt_phone','str','POST','');
if ($user_name == "" || $user_address == "" || $user_phone == "") {
    header("Location: /");
}else{
    $curl 	= curl_init();
    $header[]       = 'Authorization: '.$_SESSION['login']['acc_token'].'';
    curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://chamcong.24hpay.vn/service/update_user_info_company.php',
		// CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
        CURLOPT_HTTPHEADER => $header,
		CURLOPT_POST => 1,
    	CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
    	CURLOPT_POSTFIELDS => array(
    		'company_name' => $user_name,
    		'company_phone' => $user_phone,
            'company_address' => $user_address,
            'id_com' => $_SESSION['login']['id']
    	)
    ));
    $resp = curl_exec($curl);
    curl_close($curl);
    header("Location: /cai-dat-ql-nv.html");
}


?>
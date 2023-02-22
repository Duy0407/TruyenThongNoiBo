<?php
require_once '../config/config.php';
$id = getValue('id','str','POST','');
if ($id == "") {
    header("Location: /");
}else{
    // session_start();
    $access_token   = $_SESSION['login']['acc_token'];
    $header[]       = 'Authorization: '.$access_token.'';
    $curl 	= curl_init();
    curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://chamcong.24hpay.vn/service/accept_employee_wait.php',
		CURLOPT_POST => 1,
        CURLOPT_HTTPHEADER => $header,
    	CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
    	CURLOPT_POSTFIELDS => array(
    		'arr_ep_id' => $id
    	)
    ));
    $resp = curl_exec($curl);
    curl_close($curl);
    echo json_encode([
        'result'=>false
    ]);
}
?>

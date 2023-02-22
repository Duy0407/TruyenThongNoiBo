<?php
require_once '../config/config.php';
$address = getValue('address','str','POST','');
if ($address == "") {
    header("Location: /");
}else{
    $access_token   = $_SESSION['login']['acc_token'];
    $header[]       = 'Authorization: '.$access_token.'';
    require_once '../api/api_nv.php';
    if(count($data_ep) == 0){
        $ompany_name = $_SESSION['login']['name'];
    }else{
        $ompany_name = array_values($data_ep)[0]->com_name;
    }
    $data = [
        'company_name' => $ompany_name,
        'company_phone' => $arr_com->com_phone,
        'company_address' => $address,
        'id_com' => $_SESSION['login']['id_com']
    ];
    $curl 	= curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://chamcong.24hpay.vn/service/update_user_info_company.php',
		CURLOPT_POST => 1,
    	CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
        CURLOPT_HTTPHEADER => $header,
    	CURLOPT_POSTFIELDS => $data
    ));
	$resp = curl_exec($curl);
	echo json_encode([
        'result' => true
    ]);
    curl_close($curl);
}
?>
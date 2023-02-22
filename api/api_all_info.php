<?php
require_once '../config/config.php';
$curl   = curl_init();
// $header[]       = 'Authorization: '.$_SESSION['login']['acc_token'].'';
curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => 'https://chamcong.24hpay.vn/service/list_all_employee_of_company.php?id_com='.$_SESSION['login']['id_com'],
	CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
	CURLOPT_HTTPHEADER => $header,
          CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
      ));
$resp = curl_exec($curl);
$info_ep = json_decode($resp);
$info_ep = $info_ep->data->items;
$data_all_info = [];
for ($i=0; $i < count($info_ep); $i++) { 
	$data_all_info[$info_ep[$i]->ep_id] = $info_ep[$i];
}
curl_close($curl);
?>
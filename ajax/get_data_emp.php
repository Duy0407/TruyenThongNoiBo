<?php
require_once '../config/config.php';
$id_user = getValue('id_user','int','POST','');
$access_token   = $_SESSION['login']['acc_token'];
$curl           = curl_init();
$header[]       = 'Authorization: '.$access_token.'';
$curl 	= curl_init();
curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => 'https://chamcong.24hpay.vn/service/list_all_employee_of_company.php?id_com='.$_SESSION['login']['id_com'],
	CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
	CURLOPT_HTTPHEADER => $header,
    CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
));
$resp = curl_exec($curl);
$responsive = json_decode($resp);
$data_ep = [];
for ($i=0; $i < count($responsive->data->items); $i++) { 
	$data_ep[$responsive->data->items[$i]->ep_id] = $responsive->data->items[$i];
}
// $db_chat = new db_query("SELECT * FROM chat");
echo json_encode($data_ep[$id_user]);
?>
<?php
require_once '../config/config.php';
$new_id = getValue('new_id', 'int', 'POST', '');
if ($new_id == 0) {
	header("Location: /");
}
$access_token   = $_SESSION['login']['acc_token'];
$header[]       = 'Authorization: ' . $access_token . '';
$db_event = new db_query("SELECT * FROM new_feed INNER JOIN events ON new_feed.new_id = events.id_new WHERE new_feed.new_id = $new_id");
$row = mysql_fetch_array($db_event->result);
if ($row['position'] == 0) {
	$row['position'] = "Toàn công ty";
} else {
	$curl 	= curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://chamcong.24hpay.vn/service/list_department.php',
		CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
		CURLOPT_HTTPHEADER => $header,
		CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
	));
	$resp = curl_exec($curl);
	$resp = json_decode($resp);
	$list_department = $resp->data->items;
	for ($i = 0; $i < $list_department; $i++) {
		if ($row['position'] == $list_department[$i]->dep_id) {
			$row['position'] = $list_department[$i]->dep_name;
			break;
		}
	}
	curl_close($curl);
}
$curl 	= curl_init();
curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => 'https://chamcong.24hpay.vn/service/list_all_employee_of_company.php?filter_by[active]=true',
	CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
	CURLOPT_HTTPHEADER => $header,
	CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
));
$resp = curl_exec($curl);
$responsive = json_decode($resp);
$data_ep = [];
for ($i = 0; $i < count($responsive->data->items); $i++) {
	$data_ep[$responsive->data->items[$i]->ep_id] = $responsive->data->items[$i];
}
curl_close($curl);
// echo "<pre>";
// print_r($data_ep);
// die;
// echo $new_id;
$db_event_join = new db_query("SELECT * FROM event_join WHERE id_event = $new_id");
$html = '';
while ($row_event_join = mysql_fetch_array($db_event_join->result)) {
	if ($row_event_join['user_type'] == 2) {
		$avatar_image = 'https://chamcong.24hpay.vn/upload/employee/'.$data_ep[$row_event_join['id_employee']]->ep_image;
		$html = $html . '<div class="img-thanhvien">
			<div><img class="v_avatar_event_join" src="'.$avatar_image.'" alt="Ảnh lỗi"></div>
			<div class="tetx-thanh-vien">
				<p class="text-tv1">'.$data_ep[$row_event_join['id_employee']]->ep_name.'</p>
				<p class="text-tv2">Quản trị</p>
				<p class="text-tv3">ID:'.$data_ep[$row_event_join['id_employee']]->ep_id.'</p>
			</div>
		</div>';
	}else{
		$avatar_image = $_SESSION['login']['logo'];
		$html = $html . '<div class="img-thanhvien">
			<div><img class="v_avatar_event_join" src="'.$avatar_image.'" alt="Ảnh lỗi"></div>
			<div class="tetx-thanh-vien">
				<p class="text-tv1">'.$_SESSION['login']['name'].'</p>
				<p class="text-tv2">Quản trị</p>
				<p class="text-tv3">ID:'.$_SESSION['login']['id'].'</p>
			</div>
		</div>';
	}
	
}
echo json_encode([
	'data' => $row,
	'html' => $html
]);
?>

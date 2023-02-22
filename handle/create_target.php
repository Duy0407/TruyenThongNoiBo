<?php
require_once '../config/config.php';
require_once '../api/api_ep.php';
require_once '../api/api_nv.php';
$title = getValue('title', 'str', 'POST', '');
$content = getValue('content', 'str', 'POST', '');
$comment = getValue('comment', 'int', 'POST', '');
$sent_alert = getValue('sent_alert', 'int', 'POST', '');
$sent_alert_email = getValue('sent_alert_email', 'int', 'POST', '');

$access_token   = $_SESSION['login']['acc_token'];
$header[]       = 'Authorization: ' . $access_token . '';
require_once '../api/api_nv.php';
if ($title == "" || $content == "") {
	header("Location: /");
}

if ($sent_alert != 0) {
	$sent_alert = 1;
} else {
	$sent_alert = '';
}
if ($sent_alert == 1) {
	$data1 = [
		'type' => 2,
		'id_user' => $_SESSION['login']['id'],
		'content' => $content,
		'id_company' => $arr_com->com_id,
		'user_type' => $_SESSION['login']['user_type'],
		'created_at' => time(),
		'updated_at' => time()
	];
	add('notify', $data1);
}

if($sent_alert_email != 0){
	foreach ($data_ep as $key => $value) {
		$body = file_get_contents('../EmailTemplate/email.htm');
		$body = str_replace('<%name_employee%>', $data_ep[$key]->ep_name, $body);
		$body = str_replace('<%name_company%>', $data_ep[$key]->com_name, $body);
		$body = str_replace('<%name_type%>', "Mục tiêu chiến lược", $body);
		$body = str_replace('<%name_title%>', $title, $body);
		$body = str_replace('<%link%>', $domain . "/vhdn-gia-tri-muc-tieu.html", $body);
		$body = str_replace('<%name_type2%>', "Mục tiêu chiến lược - Truyền thông văn hóa. Timviec365.vn", $body);
		SendMailAmazon("Email thông báo", "Truyền thông văn hóa", $data_ep[$key]->ep_email, $body);
	}
}
$img = "";
if (isset($_FILES['file']) && $_FILES['file']['name'] != "") {
	$duoi = explode(".", $_FILES['file']['name']);
	$duoi = $duoi[count($duoi) - 1];
	$name_file = rand() . "." . $duoi;
	$name_tmp = $_FILES['file']['tmp_name'];
	$dir = "../img/vanhoadoanhnghiep/target/";
	if (!is_dir($dir . $_SESSION['login']['id'])) {
		mkdir($dir . $_SESSION['login']['id'], 0777, true);
	}
	move_uploaded_file($name_tmp, $dir.$_SESSION['login']['id']. "/" . $name_file);
	$img =  $dir . $_SESSION['login']['id'] . "/" . $name_file;
}


$data = [
	'id_user' => $_SESSION['login']['id'],
	'id_company' => $_SESSION['login']['id_com'],
	'title' => $title,
	'content' => $content,
	'cover_image' => $img,
	'comment' => $comment,
	'user_type' => $_SESSION['login']['user_type'],
	'created_at' => time(),
	'updated_at' => time()
];
add('target',$data);
header("Location: /vhdn-gia-tri-muc-tieu.html");

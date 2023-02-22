<?php
require_once '../config/config.php';
require_once '../api/api_ep.php';
require_once '../api/api_nv.php';
$mail_title = getValue('title', 'str', 'POST', '');
$content = getValue('content', 'str', 'POST', '');
$sent_alert = getValue('sent_alert', 'int', 'POST', '');
if ($sent_alert == 1) {
	$data1 = [
		'type' => 6,
		'id_user' => $_SESSION['login']['id'],
		'content' => $content,
		'id_company' => $_SESSION['login']['id_com'],
		'user_type' => $_SESSION['login']['user_type'],
		'created_at' => time(),
		'updated_at' => time()
	];
	add('notify', $data1);
}
$sent_alert_mail = getValue('sent_alert_mail', 'int', 'POST', '');
if ($sent_alert_mail != "") {
	foreach ($data_ep as $key => $value) {
		$body = file_get_contents('../EmailTemplate/email.htm');
		$body = str_replace('<%logo_timviec365%>', $_SERVER['HTTP_HOST'] . "/img/v_email_logo.png", $body);
		$body = str_replace('<%name_employee%>', $data_ep[$key]->ep_name, $body);
		$body = str_replace('<%name_employee%>', $data_ep[$key]->ep_name, $body);
		$body = str_replace('<%name_company%>', $data_ep[$key]->com_name, $body);
		$body = str_replace('<%name_type%>', "Thư từ CEO", $body);
		$body = str_replace('<%name_title%>', $mail_title, $body);
		$body = str_replace('<%link%>', $_SERVER['HTTP_HOST'] . "/vhdn-thu-tu-seo.html", $body);
		$body = str_replace('<%name_type2%>', "Thư từ CEO - Truyền thông văn hóa. Timviec365.vn", $body);
		SendMailAmazon("Email thông báo", "Truyền thông văn hóa", $data_ep[$key]->ep_email, $body);
		sleep(5);
	}
}

$duoi = explode('.', $_FILES['file']['name']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['file']['name'] = rand() . "." . $duoi;
$tmp_name = $_FILES['file']['tmp_name'];

$dir = "../img/vanhoadoanhnghiep/thutuceo/";
if (isset($_FILES['file'])) {
	if (!is_dir($dir . $_SESSION['login']['id'])) {
		mkdir($dir . $_SESSION['login']['id'], 0777, true);
	}
	move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['file']['name']);
}

$data = [
	'title_mail' => $mail_title,
	'content' => $content,
	'file' => $_FILES['file']['name'],
	'user_sent' => $_SESSION['login']['id'],
	'id_company' => $_SESSION['login']['id_com'],
	'user_type' => $_SESSION['login']['user_type'],
	'created_at' => time(),
	'updated_at' => time()
];

add('mail_from_ceo', $data);
echo json_encode([
	'result' => true
])
?>
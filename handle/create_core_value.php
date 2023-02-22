<?php
require_once '../config/config.php';
require_once '../api/api_ep.php';
require_once '../api/api_nv.php';
$title = getValue('title','str','POST','');
$content = getValue('content','str','POST','');
if ($title == "" || $content == "") {
	header("Location: /");
}
$comment = getValue('comment','int','POST','');

$sent_alert = getValue('sent_alert','int','POST','');
$sent_alert_email = getValue('sent_alert_email','int','POST','');

if ($sent_alert != 0) {
	$sent_alert = 1;
}else{
	$sent_alert = '';
}

if ($sent_alert == 1) {
	$data1 = [
			'type'=>1,
			'id_user'=>$_SESSION['login']['id'],
			'content'=>$content,
			'id_company'=>$arr_com->com_id,
			'user_type'=>$_SESSION['login']['user_type'],
			'created_at'=>time(),
			'updated_at'=>time()
		];
		add('notify',$data1);
}
if ($sent_alert_email != 0) {
	foreach ($data_ep as $key => $value) {
		$body = file_get_contents('../EmailTemplate/email.htm');
		$body = str_replace('<%name_employee%>', $data_ep[$key]->ep_name, $body);
		$body = str_replace('<%name_company%>', $data_ep[$key]->com_name, $body);
		$body = str_replace('<%name_type%>', "Giá trị cốt lõi", $body);
		$body = str_replace('<%name_title%>', $title, $body);
		$body = str_replace('<%link%>', $domain . "/vhdn-gia-tri-muc-tieu.html", $body);
		$body = str_replace('<%name_type2%>', "Giá trị cốt lõi - Truyền thông văn hóa. Timviec365.vn", $body);
		SendMailAmazon("Email thông báo", "Truyền thông văn hóa", $data_ep[$key]->ep_email, $body);
	}
}

if (isset($_FILES['file']) && $_FILES['file']['name'] != "") {
	$duoi = explode(".",$_FILES['file']['name']);
	$duoi = $duoi[count($duoi) - 1];
	$name_file = rand() . "." . $duoi;
	$name_tmp = $_FILES['file']['tmp_name'];
	$dir = "../img/vanhoadoanhnghiep/core_value/";
	if (!is_dir($dir . $_SESSION['login']['id'])) {
		mkdir($dir.$_SESSION['login']['id'], 0777, true);
	}
	move_uploaded_file($name_tmp, $dir.$_SESSION['login']['id']. "/" . $name_file);
}
if ($_SESSION['login']['user_type'] = 1) {
	if(count($data_ep) == 0){
		$id_company = $_SESSION['login']['id'];
	}else{
		$id_company = array_values($data_ep)[0]->com_id;
	}
}else{
	$id_company = $data_ep[$_SESSION['login']['id']]->com_id;
}

$data = [
	'id_user'=>$_SESSION['login']['id'],
	'id_company'=>$id_company,
	'tittle'=>$title,
	'content'=>$content,
	'cover_image'=>$name_file,
	'comment'=>$comment,
	'user_type'=>$_SESSION['login']['user_type'],
	'created_at'=>time(),
	'updated_at'=>time()
];
add('core_value',$data);
header("Location: /vhdn-gia-tri-muc-tieu.html");
?>
<?php
require_once '../config/config.php';
$new_id = getValue('new_id','int','POST','');
$check[]  = $new_id;
$dataId = [
	'new_id'=>$new_id
];

$dataId2 = [
	'id_new'=>$new_id
];
$new_title = getValue('new_title','str','POST','');
$data['new_title'] = $new_title;
$check[]  = $new_title;

$speakers_name = getValue('speakers_name','str','POST','');
$data2['speakers_name'] = $speakers_name;
$check[] = $speakers_name;

$speakers_position = getValue('speakers_position','str','POST','');
$data2['speakers_position'] = $speakers_position;
$check[] = $speakers_position;

$speakers_phone = getValue('speakers_phone','str','POST','');
$data2['speakers_phone'] = $speakers_phone;
$check[] = $speakers_phone;

$speakers_email = getValue('speakers_email','str','POST','');
$data2['speakers_email'] = $speakers_email;
$check[] = $speakers_email;

$time = getValue('time','str','POST','');
$time = strtotime($time);
$data2['time'] = $time;
$check[] = $time;

$content = getValue('content','str','POST','');
$data['content'] = $content;
$check[] = $content;

$position = getValue('position','int','POST','');
$data['content'] = $content;
$check[] = $position;

$event_mode = getValue('event_mode','int','POST','');
$data2['event_mode'] = $event_mode;
$check[] = $event_mode;

$list_guests = getValue('list_guests','str','POST','');
$data2['list_guests'] = $list_guests;
$check[] = $list_guests;

$val = checkPost($check);
if ($val == 1) {
	header("Location: /");
}
if (isset($_FILES['file'])) {
	$duoi = explode('/', $_FILES['file']['type']);
	$duoi = $duoi[(count($duoi) - 1)];
	$_FILES['file']['name'] = rand() . "." . $duoi;
	$tmp_name = $_FILES['file']['tmp_name'];
	$dir = "../img/new_feed/event/event_doi_ngoai/file_dinh_kem/";
	if (!is_dir($dir . $_SESSION['login']['id'])) {
		mkdir($dir . $_SESSION['login']['id']);
	}
	move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['file']['name']);
	$data['file'] = $_FILES['file']['name'];
}
$data['updated_at'] = time();
update('new_feed',$data,$dataId);
if (isset($_FILES['speakers_avatar'])) {
	$duoi = explode('/', $_FILES['speakers_avatar']['type']);
	$duoi = $duoi[(count($duoi) - 1)];
	$_FILES['speakers_avatar']['name'] = rand() . "." . $duoi;
	$tmp_name = $_FILES['speakers_avatar']['tmp_name'];
	$dir = "../img/new_feed/event/event_doi_ngoai/speakers_avatar/";
	if (!is_dir($dir . $_SESSION['login']['id'])) {
		mkdir($dir . $_SESSION['login']['id']);
	}
	move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['speakers_avatar']['name']);
	$data2['speakers_avatar'] = $_FILES['speakers_avatar']['name'];
}

if (isset($_FILES['avatar'])) {
	$duoi = explode('/', $_FILES['avatar']['type']);
	$duoi = $duoi[(count($duoi) - 1)];
	$_FILES['avatar']['name'] = rand() . "." . $duoi;
	$tmp_name = $_FILES['avatar']['tmp_name'];
	$dir = "../img/new_feed/event/event_doi_ngoai/avatar/";
	if (!is_dir($dir . $_SESSION['login']['id'])) {
		mkdir($dir . $_SESSION['login']['id']);
	}
	move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['avatar']['name']);
}
update('events',$data2,$dataId2);
echo json_encode([
	'result'=>true
])
?>
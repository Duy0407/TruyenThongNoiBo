<?php
require_once '../config/config.php';
$type = getValue('type','int','POST','');
$new_title = getValue('new_title','str','POST','');
$check[]  = $new_title;
$speakers_name = getValue('speakers_name','str','POST','');
$check[] = $speakers_name;
$speakers_position = getValue('speakers_position','str','POST','');
$check[] = $speakers_position;
$speakers_phone = getValue('speakers_phone','str','POST','');
$check[] = $speakers_phone;
$speakers_email = getValue('speakers_email','str','POST','');
$check[] = $speakers_email;
$time = getValue('time','str','POST','');
$time = strtotime($time);
$check[] = $time;
$content = getValue('content','str','POST','');
$check[] = $content;
$position = getValue('position','int','POST','');
$check[] = $position;
$list_guests = getValue('list_guests','int','POST','');
$check[] = $list_guests;
$event_mode = getValue('event_mode','int','POST','');
$check[] = $event_mode;
$list_guests = getValue('list_guests','str','POST','');
$check[] = $list_guests;
$val = checkPost($check);
if ($val == 1) {
	header("Location: /");
}
$duoi = explode('.', $_FILES['file']['name']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['file']['name'] = rand() . "." . $duoi;
$tmp_name = $_FILES['file']['tmp_name'];
$dir = "../img/new_feed/event/event_doi_ngoai/file_dinh_kem/";
if (!is_dir($dir . $_SESSION['login']['id'])) {
    mkdir($dir . $_SESSION['login']['id'], 0777, true);
}
move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['file']['name']);
$data = [
	'id_company' => $_SESSION['login']['id_com'],
	'new_title'=> $new_title,
	'content'=> $content,
	'position'=>$position,
	'type'=>$type,
	'new_type'=>4,
	'author'=>$_SESSION['login']['id'],
	'author_type'=>$_SESSION['login']['user_type'],
	'file'=>$_FILES['file']['name'],
	'created_at'=>time(),
	'updated_at'=>time()
];
add('new_feed',$data);
$new_id = mysql_insert_id();
$duoi = explode('.', $_FILES['speakers_avatar']['name']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['speakers_avatar']['name'] = rand() . "." . $duoi;
$tmp_name = $_FILES['speakers_avatar']['tmp_name'];
$dir = "../img/new_feed/event/event_doi_ngoai/speakers_avatar/";
if (!is_dir($dir . $_SESSION['login']['id'])) {
    mkdir($dir . $_SESSION['login']['id'], 0777, true);
}
move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['speakers_avatar']['name']);

$duoi = explode('/', $_FILES['avatar']['type']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['avatar']['name'] = rand() . "." . $duoi;
$tmp_name = $_FILES['avatar']['tmp_name'];
$dir = "../img/new_feed/event/event_doi_ngoai/avatar/";
if (!is_dir($dir . $_SESSION['login']['id'])) {
    mkdir($dir . $_SESSION['login']['id'], 0777, true);
}
move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['avatar']['name']);
$data2 = [
	'id_new'=>$new_id,
	'speakers_avatar'=>$_FILES['speakers_avatar']['name'],
	'speakers_name'=>$speakers_name,
	'speakers_position'=>$speakers_position,
	'speakers_phone'=>$speakers_phone,
	'speakers_email'=>$speakers_email,
	'time'=>$time,
	'list_guests'=>$list_guests,
	'avatar'=>$_FILES['avatar']['name'],
	'event_mode'=>$event_mode
];
add('events',$data2);
echo json_encode([
	'result'=>true
])
?>
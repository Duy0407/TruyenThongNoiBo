<?php
require_once '../config/config.php';
$new_id = getValue('new_id','int','POST','');
$check[]  = $new_id;
$dataId = [
	'new_id'=>$new_id
];
$db_nf = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
$row = mysql_fetch_array($db_nf->result);
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

if (isset($_FILES['file'])) {
	$arr_file_dn = getValue('arr_file_dn','arr','POST','');
	$arr_file_dn = explode(",", $arr_file_dn);

	$arr_name_file_dn = getValue('arr_name_file_dn','arr','POST','');
	$arr_name_file_dn = explode(",", $arr_name_file_dn);

	$path_file0 = "";
	$name_file0 = "";

	for ($i=0; $i < count($arr_file_dn); $i++) { 
		if ($i == count($arr_file_dn) - 1) {
			$path_file0 = $path_file0 . $arr_file_dn[$i];
			$name_file0 = $name_file0 . $arr_name_file_dn[$i];
		}else{
			$path_file0 = $path_file0 . $arr_file_dn[$i] . "||";
			$name_file0 = $name_file0 . $arr_name_file_dn[$i] . "||";
		}
	}

	$link_file = "../img/new_feed/event/event_doi_ngoai/file_dinh_kem/";
	if (!is_dir($link_file.$row['author'])) {
		mkdir($link_file.$row['author'],0777,true);
	}
	if (!is_dir($link_file.$row['author'] . "/file")) {
		mkdir($link_file.$row['author'] . "/file",0777,true);
	}
	$dir_file = $link_file.$row['author'] . "/file" . "/";

	$path_file1 = "";
	$name_file1 = "";

	if (isset($_FILES['file'])) {
		for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
			$duoi = explode(".", $_FILES['file']['name'][$i]);
			$duoi = $duoi[count($duoi) - 1];

			$n_file = rand() . "." . $duoi;

			$dir_path_file = $dir_file . $n_file;

			move_uploaded_file($_FILES['file']['tmp_name'][$i],$dir_path_file);

			if ($i == count($_FILES['file']['name']) - 1) {
				$path_file1 = $path_file1 . $dir_path_file;
				$name_file1 = $name_file1 . $_FILES['file']['name'][$i];
			}else{
				$path_file1 = $path_file1 . $dir_path_file . "||";
				$name_file1 = $name_file1 . $_FILES['file']['name'][$i] . "||";
			}
		}
	}

	$path = "";
	$name = "";

	if ($path_file0 == "" && $path_file1 != "") {
		$path = $path_file1;
	}else if ($path_file0 != "" && $path_file1 == "") {
		$path = $path_file0;
	}else if ($path_file0 != "" && $path_file1 != "") {
		$path = $path_file0 . "||" . $path_file1;
	}

	if ($name_file0 == "" && $name_file1 != "") {
		$name = $name_file1;
	}else if ($name_file0 != "" && $name_file1 == "") {
		$name = $name_file0;
	}else if ($name_file0 != "" && $name_file1 != "") {
		$name = $name_file0 . "||" . $name_file1;
	}

	$data['file'] = $path;

	$data['name_file'] = $name;
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
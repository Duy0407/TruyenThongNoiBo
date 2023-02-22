<?php
require_once '../config/config.php';
$type = getValue('type', 'int', 'POST', '');
$new_title = getValue('new_title', 'str', 'POST', '');
$check[] = $new_title;
$time = getValue('time', 'str', 'POST', '');
$check[] = $time;
$time = strtotime($time);
$content = getValue('content', 'str', 'POST', '');
$check[] = $content;
$position = getValue('position', 'str', 'POST', '');
$check[] = $position;
$val = checkPost($check);

if ($val == 1) {
	header("Location: /");
}else if(!isset($_FILES['file'])){
	header("Location: /");
}


$duoi = explode('/', $_FILES['avatar']['type']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['avatar']['name'] = rand() . "." . $duoi;
$tmp_name1 = $_FILES['avatar']['tmp_name'];
$dir1 = "../img/new_feed/event/event_noi_bo/avatar/";
if (!is_dir($dir1 . $_SESSION['login']['id'])) {
	mkdir($dir1 . $_SESSION['login']['id'], 0777, true);
}

move_uploaded_file($tmp_name1, $dir1 . $_SESSION['login']['id'] . "/" . $_FILES['avatar']['name']);

//Tệp đính kèm
if (isset($_FILES['file'])) {
	$link_file = "../img/new_feed/event/event_noi_bo/file_dinh_kem/";
	if (!is_dir($link_file.$_SESSION['login']['id'])) {
		mkdir($link_file.$_SESSION['login']['id'],0777,true);
	}
	$dir_file = $link_file.$_SESSION['login']['id'] . "/";

	$path = "";
	$name = "";

	for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
		$duoi = explode(".", $_FILES['file']['name'][$i]);
		$duoi = $duoi[count($duoi) - 1];

		$n_file = rand() . "." . $duoi;

		$dir_path_file = $dir_file . $n_file;

		move_uploaded_file($_FILES['file']['tmp_name'][$i],$dir_path_file);

		if ($i == count($_FILES['file']['name']) - 1) {
			$path = $path . $dir_path_file;
			$name = $name . $_FILES['file']['name'][$i];
		}else{
			$path = $path . $dir_path_file . "||";
			$name = $name . $_FILES['file']['name'][$i] . "||";
		}
	}
}

$data = [
	'id_company' => $_SESSION['login']['id_com'],
	'new_title' => $new_title,
	'author' => $_SESSION['login']['id'],
	'new_type' => 3,
	'type'=>$type,
	'content' => $content,
	'file' => $path,
	'name_file' => $name,
	'author_type'=>$_SESSION['login']['user_type'],
	'position' => $position,
	'created_at' => time(),
	'updated_at' => time()
];
add('new_feed', $data);
$new_id = mysql_insert_id();
$data2 = [
	'id_new' => $new_id,
	'avatar' => $_FILES['avatar']['name'],
	'time' => $time,
];
add('events', $data2);
echo json_encode([
	'result'=>true
]);
?>

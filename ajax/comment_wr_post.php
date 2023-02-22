<?php
require_once '../config/config.php';
$access_token   = $_SESSION['login']['acc_token'];
$header[]       = 'Authorization: ' . $access_token . '';
require_once '../api/api_nv.php';
$comment = getValue('comment', 'str', 'POST', '');
$core_id = getValue('new_id', 'int', 'POST', '');
if ($comment == '' && isset($_FILES['img_comment'])) {
	if ($_FILES['img_comment']['name'][0] != "") {
		$check = checkImages($_FILES['img_comment']['name'][0]);
		if ($check == 1) {
			$duoi = explode(".", $_FILES['img_comment']['name'][0]);
			$duoi = $duoi[count($duoi) - 1];
			$name_file = rand() . "." . $duoi;
			$name_tmp = $_FILES['img_comment']['tmp_name'][0];
			$dir = "../img/vanhoadoanhnghiep/nguyen_tac/comment";
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
			move_uploaded_file($name_tmp, $dir . "/" . $name_file);
		}else{
			$result = [
				'result' => false,
				'message' => 'Vui lòng tải ảnh hợp lệ',
			];
		}
	}
	$img =  $dir . "/" . $name_file;
	$data = [
		'id_working_rules' => $core_id,
		'id_user' => $_SESSION['login']['id'],
		'content' => '',
		'image' => $img,
		'user_type' => $_SESSION['login']['user_type'],
		'created_at' => time(),
		'updated_at' => time()
	];
	add('comment_working_rules', $data);
	$id = mysql_insert_id();
	$time_active = "Vừa xong";
	$result = [
		'id' => $id,
		'avatar' =>  $_SESSION['login']['logo'],
		'name' => $_SESSION['login']['name'],
		'comment' => '',
		'img' => $img,
		'time_active' => $time_active,
	];
}else if ($comment != '' && !isset($_FILES['img_comment'])) {
	$data = [
		'id_working_rules' => $core_id,
		'id_user' => $_SESSION['login']['id'],
		'content' => $comment,
		'image' => '',
		'user_type' => $_SESSION['login']['user_type'],
		'created_at' => time(),
		'updated_at' => time()
	];
	add('comment_working_rules', $data);
	$id = mysql_insert_id();
	$time_active = "Vừa xong";
	$result = [
		'id' => $id,
		'avatar' =>  $_SESSION['login']['logo'],
		'name' => $_SESSION['login']['name'],
		'comment' => $comment,
		'img' => '',
		'time_active' => $time_active,
	];
}else if($comment != '' && isset($_FILES['img_comment'])) {
	if ($_FILES['img_comment']['name'][0] != "") {
		$check = checkImages($_FILES['img_comment']['name'][0]);
		if ($check == 1) {
			$duoi = explode(".", $_FILES['img_comment']['name'][0]);
			$duoi = $duoi[count($duoi) - 1];
			$name_file = rand() . "." . $duoi;
			$name_tmp = $_FILES['img_comment']['tmp_name'][0];
			$dir = "../img/vanhoadoanhnghiep/nguyen_tac/comment";
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
			move_uploaded_file($name_tmp, $dir . "/" . $name_file);
		}else{
			$result = [
				'result' => false,
				'message' => 'Vui lòng tải ảnh hợp lệ',
			];
		}
	}
	$img =  $dir . "/" . $name_file;
	$data = [
		'id_working_rules' => $core_id,
		'id_user' => $_SESSION['login']['id'],
		'content' => $comment,
		'image' => $img,
		'user_type' => $_SESSION['login']['user_type'],
		'created_at' => time(),
		'updated_at' => time()
	];
	add('comment_working_rules', $data);
	$id = mysql_insert_id();
	$time_active = "Vừa xong";
	$result = [
		'id' => $id,
		'avatar' =>  $_SESSION['login']['logo'],
		'name' => $_SESSION['login']['name'],
		'comment' => $comment,
		'img' => $img,
		'time_active' => $time_active,
	];
}

$db_count = new db_query("SELECT id FROM comment_working_rules WHERE id_working_rules = $core_id");
echo json_encode([
	'result' => true,
	'html' => $result,
	'comment_count'=> mysql_num_rows($db_count->result)
]);

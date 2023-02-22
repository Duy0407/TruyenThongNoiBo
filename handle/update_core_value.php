<?php
require_once '../config/config.php';
$submit = getValue('submit','int','POST','');
$dataId = [
	'id'=>$submit
];
if ($submit == 0) {
	header("Location: /");
}else{
	$title = getValue('title','str','POST','');
	$data['tittle'] = $title;
	$content = getValue('content','str','POST','');
	$data['content'] = $content;
	$comment = getValue('comment','int','POST','');
	$data['comment'] = $comment;
	$data['updated_at'] = time();
	if ($_FILES['file']['name'] != "") {
		echo "string";
		$db_check = new db_query("SELECT * FROM core_value WHERE id = $submit");
		$row = mysql_fetch_array($db_check->result);
		unlink('../img/vanhoadoanhnghiep/core_value/' . $row['id_user'] . '/' . $row['cover_image']);
		$duoi = explode(".",$_FILES['file']['name']);
		$duoi = $duoi[count($duoi) - 1];
		$name_file = rand() . "." . $duoi;
		$name_tmp = $_FILES['file']['tmp_name'];
		$dir = "../img/vanhoadoanhnghiep/core_value/";
		if (!is_dir($dir . $_SESSION['login']['id'])) {
			mkdir($dir.$_SESSION['login']['id']);
		}
		move_uploaded_file($name_tmp, $dir.$_SESSION['login']['id']. "/" . $name_file);
		$data['cover_image'] = $name_file;
	}
	update('core_value',$data,$dataId);
	header("Location: /vhdn-gia-tri-muc-tieu.html");
}
?>
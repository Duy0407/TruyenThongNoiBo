<?php
require_once '../config/config.php';
$id_group = getValue("id_group","int","POST",0);
$images = $_FILES['avt_group']['name'];
$folder = "../img/group/group_image/";

$duoi = explode(".",$images);
$duoi = $duoi[count($duoi) - 1];

$name_file = rand().".".$duoi;
$name_tmp = $_FILES['avt_group']['tmp_name'];
$name_type = $_FILES['avt_group']['type'];

// $result_name = $folder.''

if (preg_match("/image/", $name_type) == true) {
	$dir = $folder."/".$name_file;
	if (!file_exists($folder)) {
		mkdir($folder);
	}
	move_uploaded_file($name_tmp, $dir);
	$ud_avt_group = new db_query("UPDATE `group` SET `group_image` = '$dir' WHERE `id` ='$id_group'");
}else{
	echo "Ảnh không đúng định dạng";
}
?>
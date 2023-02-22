<?php
require_once '../config/config.php';

$id_user = getValue("id_user","int","POST",0);
$id_group = getValue("id_group","int","POST",0);
$id_post = getValue("id_post","int","POST",0);
$type_author = getValue("type_author","int","POST",0);
$time = time();


$update_post = new db_query("UPDATE `new_feed` SET `approve` = 2, `delete` = 1 WHERE `author` = '$id_user' AND `approve` = 1");
$insert_ban = new db_query("INSERT INTO `cam_dang_bai`(`id_group`,`id_user`,`user_type`,`time`)VALUES('$id_group','$id_user','$type_author','$time')");


// if($show['cam_thanhvien_dangbai'] != ""){
// 	$noi = $show['cam_thanhvien_dangbai'] .','. $id_user;
// 	$update_group = new db_query("UPDATE `group` SET `cam_thanhvien_dangbai` = '$noi' WHERE `id` = '$id_group'");
// }else{
// 	$update_group = new db_query("UPDATE `group` SET `cam_thanhvien_dangbai` = '$id_user' WHERE `id` = '$id_group'");
// }





?>
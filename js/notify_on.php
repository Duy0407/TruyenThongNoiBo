<?php
require_once '../config/config.php';

$id_post = getValue("id_post","int","POST",0);
$id_user = $_SESSION['login']['id'];

$db_post = new db_query("SELECT `notify_on` FROM `new_feed` WHERE `new_id` = '$id_post'");
$post_assoc = mysql_fetch_assoc($db_post->result);
if ($post_assoc['notify_on'] != "") {
	$arr_notify_on = explode(',', $post_assoc['notify_on']);

	// echo "Không";
	print_r($arr_notify_on);
}else{
	$ud_post = new db_query("UPDATE `new_feed` SET `notify_on` = '$id_user' WHERE `new_id` = '$id_post'");
}

?>
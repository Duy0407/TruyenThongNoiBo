<?php
require_once '../config/config.php';
$id_author = $_SESSION['login']['id'];
$id_com = $_SESSION['login']['id_com'];
$id_user_invite = getValue("id_user","int","POST",0);
$user_type = getValue("user_type","int","POST",0);
$id_group = getValue("id_group","int","POST",0);
$time = time();

$db_group = new db_query("SELECT `group_name` FROM `group` WHERE `id` = '$id_group'");
$db_assoc = mysql_fetch_array($db_group->result);
$content = $_SESSION['login']['name'].' muốn mời bạn tham gia nhóm '.$db_assoc['group_name'];
$link = "/".replaceTitle($db_assoc['group_name']).'-'.$id_group.'.html';

if ($user_type == 1){
	$select_notify = new db_query("SELECT * FROM `notify` WHERE `id_group` = '$id_group' AND `invited_users` = '$id_user_invite' AND invited_users_type = 1 ORDER BY `id` DESC LIMIT 1");
}else{
	$select_notify = new db_query("SELECT * FROM `notify` WHERE `id_group` = '$id_group' AND `invited_users` = '$id_user_invite' AND (invited_users_type = 0 OR invited_users_type = 2) ORDER BY `id` DESC LIMIT 1");
}
$assoc_notify = mysql_fetch_assoc($select_notify->result);
$created_at = $assoc_notify['created_at'];
$created_at_24h = $created_at + 86400;



if ($time > $created_at_24h) {
	$insert_notify = new db_query("INSERT INTO `notify`(`type`,`id_user`,`id_company`,`content`,`id_group`,`link`,`invited_users`,`invited_users_type`,`created_at`,`updated_at`)VALUES(7,'$id_author','$id_com','$content','$id_group','$link','$id_user_invite',$user_type,'$time','$time')");
}


?>
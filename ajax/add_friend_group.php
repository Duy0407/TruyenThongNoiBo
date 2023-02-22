<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$id_author = $_SESSION['login']['id'];
$id_com = $_SESSION['login']['id_com'];
$arr_friend = getValue("arr_friend","arr","POST","");
// $str_friend = implode(',', $arr_friend);
$type_user = getValue("type_user","arr","POST","");
$time = time();

$db_group = new db_query("SELECT `group_name` FROM `group` WHERE `id` = '$id_group'");
$db_assoc = mysql_fetch_array($db_group->result);
$content = $_SESSION['login']['name'].' muốn mời bạn tham gia nhóm '.$db_assoc['group_name'];
$link = "/".replaceTitle($db_assoc['group_name']).'-'.$id_group.'.html';



foreach ($arr_friend as $key => $value) {
	$user_type = $type_user[$key];
	if ($user_type == 1){
		$sl_invite = new db_query("SELECT `invitee_id` FROM `invite_to_group` WHERE `id_group` = '$id_group' AND `invitee_id` = '$value' AND invitee_type = $user_type");
	}else{
		$sl_invite = new db_query("SELECT `invitee_id` FROM `invite_to_group` WHERE `id_group` = '$id_group' AND `invitee_id` = '$value' AND (invitee_type = 0 OR invitee_type = 2)");
	}
	if (mysql_num_rows($sl_invite->result) > 0) {
		$select_notify = new db_query("SELECT `invited_users`,`created_at` FROM `notify` WHERE `id_group` = '$id_group' AND `invited_users` = '$value'");
		$assoc_notify = mysql_fetch_array($select_notify->result);
		$created_at = $assoc_notify['created_at'];
		$created_at_24h = $created_at + 86400;
		if ($time > $created_at_24h) {
			$insert_notify = new db_query("INSERT INTO `notify`(`type`,`id_user`,`id_company`,`content`,`id_group`,`link`,`invited_users`,`invited_users_type`,`created_at`,`updated_at`)VALUES(7,'$id_author','$id_com','$content','$id_group','$link','$value','$user_type','$time','$time')");
		}
	}else{
		$db_insert = new db_query("INSERT INTO `invite_to_group`(`id_group`,`inviter_id`,`inviter_type`,`invitee_id`,`invitee_type`,`type_invite`,`time_invite`)VALUES('$id_group','$my_id',$my_type,'$value',$user_type,0,'$time')");
		// ----------------------------------------------
		$insert_notify = new db_query("INSERT INTO `notify`(`type`,`id_user`,`id_company`,`content`,`id_group`,`link`,`invited_users`,`invited_users_type`,`created_at`,`updated_at`)VALUES(7,'$id_author','$id_com','$content','$id_group','$link','$value','$user_type','$time','$time')");
	}	
}
?>
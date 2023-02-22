<?php 
require_once '../config/config.php';

$id_compani = $_SESSION['login']['id_com'];
$id_user_create = $_SESSION['login']['id'];
$name_group = getValue("name_group","str","POST","");
$name_group = trim($name_group);
$arr_friend_group = getValue("friend_group","arr","POST","");

$mode = getValue("mode","int","POST",0);
$created_at = time();


$select_group = new db_query("SELECT `group_name`,`id` FROM `group` WHERE `id_company` = '$id_compani' AND `group_name` = '$name_group'");
if(mysql_num_rows($select_group->result) > 0){
	echo "Nhóm đã tồn tại";
}else{
	$insert_group = new db_query("INSERT INTO `group`(`id_company`,`group_name`,`id_manager`,`manager_type`,`id_administrators`,`group_mode`,`created_at`,`updated_at`)
	VALUES('$id_compani','$name_group','$id_user_create',$my_type,'$id_user_create','$mode','$created_at','$created_at')");
	
	$id = mysql_insert_id();

	$insert_mem = [
		'user_id' => $my_id,
		'user_type' => $my_type,
		'group_id' => $id,
		'type_mem' => 1,
		'created_at' => time(),
		'updated_at' => time(),
	];
	add('group_member',$insert_mem);

	$db_group = new db_query("SELECT `id` FROM `group` WHERE `id_company` = '$id_compani' AND `id_manager` = '$id_user_create' ORDER BY `id` DESC LIMIT 1");
	$db_assoc = mysql_fetch_assoc($db_group->result);



	if($arr_friend_group != ""){
		$id_group = $db_assoc['id'];
		// $content = $_SESSION['login']['name'].' muốn mời bạn tham gia nhóm '.$name_group;
		// $link = replaceTitle($name_group).'-'.$id_group.'.html';
		foreach ($arr_friend_group as $key => $value) {

			// // Mời thành viên vào nhóm
			$insert_invite = new db_query("INSERT INTO `invite_to_group`(`id_group`,`id_author_group`,`id_user_invite`,`type_invite`,`time_invite`)VALUES('$id_group','$id_user_create','$value',0,'$created_at')");

			// // Thông báo mời thành viên vào nhóm
			// $insert_notify = new db_query("INSERT INTO `notify`(`type`,`id_user`,`id_company`,`content`,`id_group`,`link`,`invited_users`,`invited_users_type`,`created_at`,`updated_at`)VALUES(7,'$id_user_create','$id_compani','$content','$id_group','$link','$value','$user_type','$time','$time')");
		}
	}
}




?>
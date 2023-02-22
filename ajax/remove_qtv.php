<?php
require_once '../config/config.php';

$id_user = getValue("id_user","int","POST",0);
$user_type = getValue("user_type","int","POST",0);
$id_group = getValue("id_group","int","POST",0);

$select = new db_query("SELECT `id_administrators` FROM `group` WHERE `id` = '$id_group'");
$db_assoc = mysql_fetch_assoc($select->result);

$arr_admintrator = explode(',', $db_assoc['id_administrators']);


if (($key = array_search("$id_user", $arr_admintrator)) != false) {
	unset($arr_admintrator[$key]);
}
$str_admintrator = implode(',', $arr_admintrator);

$update = new db_query("UPDATE `group` SET `id_administrators` = '$str_admintrator' WHERE `id` = '$id_group'");

// gỡ vai trò quản trị viên - mới
if ($user_type == 1){
	$update = new db_query("UPDATE `group_member` SET `type_mem` = 0 WHERE `group_id` = '$id_group' AND user_id = $id_user AND user_type = $user_type");
}else{
	$update = new db_query("UPDATE `group_member` SET `type_mem` = 0 WHERE `group_id` = '$id_group' AND user_id = $id_user AND (user_type = 0 OR user_type = 2)");
}

?>
<?php
require_once '../config/config.php';

$id_user = getValue("id_user","int","POST",0);
$user_type = getValue("user_type","int","POST",0);
$id_group = getValue("id_group","int","POST",0);

$select3 = new db_query("SELECT `id_censor` FROM `group` WHERE `id` = '$id_group'");
$db_assoc3 = mysql_fetch_assoc($select3->result);

$arr_censor = explode(',', $db_assoc3['id_censor']);

$key = array_search("$id_user", $arr_censor);
unset($arr_censor[$key]);
$str_censor = implode(',', $arr_censor);
$update_censor = new db_query("UPDATE `group` SET `id_censor` = '$str_censor' WHERE `id` = '$id_group'");

// gỡ vai trò người kiểm duyệt - mới
if ($user_type == 1){
	$update = new db_query("UPDATE `group_member` SET `type_mem` = 0 WHERE `group_id` = '$id_group' AND user_id = $id_user AND user_type = $user_type");
}else{
	$update = new db_query("UPDATE `group_member` SET `type_mem` = 0 WHERE `group_id` = '$id_group' AND user_id = $id_user AND (user_type = 0 OR user_type = 2)");
}

?>
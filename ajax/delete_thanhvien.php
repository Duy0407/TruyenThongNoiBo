<?php
require_once '../config/config.php';

$id_user = getValue("id_user","int","POST",0);
$user_type = getValue("user_type","int","POST",0);
$id_group = getValue("id_group","int","POST",0);

$select2 = new db_query("SELECT `id_administrators`,`id_censor`,`id_employee` FROM `group` WHERE `id` = '$id_group'");
$db_assoc2 = mysql_fetch_assoc($select2->result);

$arr_1 = explode(',', $db_assoc2['id_administrators']);
$arr_2 = explode(',', $db_assoc2['id_censor']);
$arr_3 = explode(',', $db_assoc2['id_employee']);

$key = array_search("$id_user", $arr_1);
$key2 = array_search("$id_user", $arr_2);
$key3 = array_search("$id_user", $arr_3);


if(in_array($id_user, $arr_1)){
	unset($arr_1[$key]);
	$str = implode(',', $arr_1);
	$update_member = new db_query("UPDATE `group` SET `id_administrators` = '$str' WHERE `id` = '$id_group'");
}
if(in_array($id_user, $arr_2)){
	unset($arr_2[$key2]);
	$str_2 = implode(',', $arr_2);
	$update_member = new db_query("UPDATE `group` SET `id_censor` = '$str_2' WHERE `id` = '$id_group'");
}
if (in_array($id_user, $arr_3)){
	unset($arr_3[$key3]);
	$str_3 = implode(',', $arr_3);
	$update_member = new db_query("UPDATE `group` SET `id_employee` = '$str_3' WHERE `id` = '$id_group'");
}

$dlt_invite = new db_query("DELETE FROM `invite_to_group` WHERE `invitee_id` = '$id_user' AND invitee_type = $user_type AND `id_group` = '$id_group'");

// xóa thành viên - mới
if ($user_type == 1){
	$dlt_invite = new db_query("DELETE FROM `group_member` WHERE `user_id` = '$id_user' AND user_type = $user_type AND `group_id` = '$id_group'");
}else{
	$dlt_invite = new db_query("DELETE FROM `group_member` WHERE `user_id` = '$id_user' AND (user_type = 0 OR user_type = 2) AND `group_id` = '$id_group'");
}

?>
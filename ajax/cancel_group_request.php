<?php
require_once '../config/config.php';

$group_cancel = getValue("group_cancel","int","POST",0);
$use_cancel = $_SESSION['login']['id'];


if($group_cancel > 0 && $use_cancel > 0){
	if ($my_type == 1){
		$delete_request = new db_query("DELETE FROM `answer_user` WHERE `id_user` = '$use_cancel' AND user_type = 1 AND `id_group` = '$group_cancel'");
		$delete_member_request_join = new db_query("DELETE FROM `member_request_join` WHERE `id_user` = '$use_cancel' AND user_type = 1 AND `id_group` = '$group_cancel'");
	}else{
		$delete_request = new db_query("DELETE FROM `answer_user` WHERE `id_user` = '$use_cancel' AND (user_type = 0 OR user_type = 2) AND `id_group` = '$group_cancel'");
		$delete_member_request_join = new db_query("DELETE FROM `member_request_join` WHERE `id_user` = '$use_cancel' AND (user_type = 0 OR user_type = 2) AND `id_group` = '$group_cancel'");
	}
}else{
	echo "Error";
}
?>
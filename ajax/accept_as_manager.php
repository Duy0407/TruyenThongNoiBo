<?php
require_once '../config/config.php';
$invite_id = getValue("invite_id","int","POST",0);
$invite_type = getValue("invite_type","int","POST",0);
$log_user = $_SESSION['login']['id'];

if ($my_type == 1){
	$db_invite = new db_query("SELECT * FROM `invite_to_group` WHERE `id_invite` = '$invite_id' AND `invitee_id` = '$log_user' AND `invitee_type` = '$my_type' AND `type_invite` = '$invite_type'");
}else{
	$db_invite = new db_query("SELECT * FROM `invite_to_group` WHERE `id_invite` = '$invite_id' AND `invitee_id` = '$log_user' AND (`invitee_type` = 0 OR `invitee_type` = 2) AND `type_invite` = '$invite_type'");
}
if (mysql_num_rows($db_invite->result) > 0){
	$assoc_invite = mysql_fetch_array($db_invite->result);
	$id_group = $assoc_invite['id_group'];
	
	$db_group = new db_query("SELECT `id_administrators`,`id_censor`,`id_employee` FROM `group` WHERE `id` = '$id_group'");
	$assoc_group = mysql_fetch_array($db_group->result);
	
	// Quản trị viên
	$str_qtv = $assoc_group['id_administrators'];
	if($str_qtv != ""){
		$noi_qtv = $str_qtv.','.$log_user;
	}else{
		$noi_qtv = $log_user;
	}
	
	// Người kiểm duyệt
	$str_nkd = $assoc_group['id_censor'];
	if ($str_nkd != "") {
		$noi_nkd = $str_nkd.','.$log_user;
	}else{
		$noi_nkd = $log_user;
	}
	
	$arr_nkd = explode(',', $str_nkd);
	
	$key = array_search($log_user, $arr_nkd);
	unset($arr_nkd[$key]);
	$nkd_unset = implode(',', $arr_nkd);
	
	// Thành viên
	if ($assoc_group['id_employee'] != "") {
		$arr_tv = explode(',', $assoc_group['id_employee']);
		$arr_tv[] = $log_user;
		$str_tv = implode(',', $arr_tv);
	}else{
		$str_tv = $log_user;
	}
	
	
	if ($assoc_invite['type_invite'] == 1) {
		$update_manager = new db_query("UPDATE `group` SET `id_administrators` = '$noi_qtv', `id_censor` = '$nkd_unset' WHERE `id` = '$id_group'");
		// chấp nhận lời mời làm quản trị viên - mới
		if ($my_type == 1){
			$update_manager = new db_query("UPDATE `group_member` SET `type_mem` = 1, updated_at = ".time()." WHERE `user_id` = $my_id AND user_type = $my_type AND group_id = '$id_group'");
		}else{
			$update_manager = new db_query("UPDATE `group_member` SET `type_mem` = 1, updated_at = ".time()." WHERE `user_id` = $my_id AND (user_type = 0 OR user_type = 2) AND group_id = '$id_group'");
		}
	}else if($assoc_invite['type_invite'] == 2){
		$update_manager = new db_query("UPDATE `group` SET `id_censor` = '$noi_nkd' WHERE `id` = '$id_group'");
		// chấp nhận lời mời làm người kiểm duyệt - mới
		if ($my_type == 1){
			$update_manager = new db_query("UPDATE `group_member` SET `type_mem` = 2, updated_at = ".time()." WHERE `user_id` = $my_id AND user_type = $my_type AND group_id = '$id_group'");
		}else{
			$update_manager = new db_query("UPDATE `group_member` SET `type_mem` = 2, updated_at = ".time()." WHERE `user_id` = $my_id AND (user_type = 0 OR user_type = 2) AND group_id = '$id_group'");
		}
	}else if($assoc_invite['type_invite'] == 0){
		$update_manager = new db_query("UPDATE `group` SET `id_employee` = '$str_tv' WHERE `id` = '$id_group'");
		// chấp nhận lời mời tham gia nhóm - mới => thêm vào bảng thành viên
		$data_insert_gr_mem = [
			'user_id' => $my_id,
			'user_type' => $my_type,
			'group_id' => $id_group,
			'created_at' => time(),
			'updated_at' => time(),
		];
		add("group_member",$data_insert_gr_mem);
		$id = mysql_insert_id();
		if ($id > 0){

		}else{
			echo json_encode([
				'result' => false,
				'msg' => "Có lỗi xảy ra",
			]);
		}
	}
	
	$dlt_invite = new db_query("DELETE FROM `invite_to_group` WHERE `id_invite` = '$invite_id' AND `invitee_id` = '$log_user' AND `invitee_type` = '$my_type' AND `type_invite` = '$invite_type'");
}else{
	echo json_encode([
        'result' => false,
        'msg' => "Lời mời không tồn tại",
    ]);
}
?>
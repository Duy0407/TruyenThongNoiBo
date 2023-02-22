<?php 
include("../config/config.php");
$id_user = $_SESSION['login']['id'];
$id_group = getValue("id_group","str","POST","");
$checkbox = getValue("checkbox","int","POST",0);


$select_gr = new db_query("SELECT `id_administrators`,`id_censor`,`id_employee`,`stop_inviting_me` FROM `group` WHERE `id` = '$id_group'");
$select_ass = mysql_fetch_assoc($select_gr->result);
$stop_inviting_me = $select_ass['stop_inviting_me'];

$arr_administrators = explode(',', $select_ass['id_administrators']);
$arr_censor = explode(',', $select_ass['id_censor']);
$arr_employee = explode(',', $select_ass['id_employee']);

if($checkbox != 0){
	if($stop_inviting_me != ""){
		$id_stop = $stop_inviting_me .= ",". $id_user;
	}else{
		$id_stop = $id_user;
	}

	if (in_array($id_user, $arr_administrators)) {
		$key = array_search($id_user, $arr_administrators);
		unset($arr_administrators[$key]);
		$str_administrators = implode(',', $arr_administrators);
	}else{
		$str_administrators = implode(',', $arr_administrators);
	}

	if ($select_ass['id_censor'] != "") {
		if (in_array($id_user, $arr_censor)) {
			$key = array_search($id_user, $arr_censor);
			unset($arr_censor[$key]);
			$str_censor = implode(',', $arr_censor);
		}else{
			$str_censor = implode(',', $arr_censor);
		}
	}else{
		$str_censor = "";
	}

	if ($select_ass['id_employee'] != "") {
		if (in_array($id_user, $arr_employee)) {
			$key = array_search($id_user, $arr_employee);
			unset($arr_employee[$key]);
			$str_employee = implode(',', $arr_employee);
		}else{
			$str_employee = implode(',', $arr_employee);
		}
	}

	$update_group = new db_query("UPDATE `group` SET `id_administrators` = '$str_administrators', `id_censor` = '$str_censor', `id_employee` = '$str_employee', `stop_inviting_me` = '$id_stop' WHERE `id` = '$id_group'");

	// Xóa tất cả lời mời làm QTV, Kiểm duyệt - sửa mới
	if ($my_type == 1){
		$delete_invite_to_group = new db_query("DELETE FROM `invite_to_group` WHERE `id_group` = '$id_group' AND `invitee_id` = '$id_user' AND invitee_type = $my_type");
	}else{
		$delete_invite_to_group = new db_query("DELETE FROM `invite_to_group` WHERE `id_group` = '$id_group' AND `invitee_id` = '$id_user' AND (invitee_type = 0 OR invitee_type = 2)");
	}

	// Xóa cấm đăng bài
	$delete_cam_dang_bai = new db_query("DELETE FROM `cam_dang_bai` WHERE `id_group` = '$id_group' AND `id_user` = '$id_user'");

	// Xóa đình chỉ
	$delete_dinh_chi_thanh_vien = new db_query("DELETE FROM `dinh_chi_thanh_vien` WHERE `id_group` = '$id_group' AND `is_suspended` = '$id_user'");

}else{
	if (in_array($id_user, $arr_administrators)) {
		$key = array_search($id_user, $arr_administrators);
		unset($arr_administrators[$key]);
		$str_administrators = implode(',', $arr_administrators);
	}else{
		$str_administrators = implode(',', $arr_administrators);
	}

	if ($select_ass['id_censor'] != "") {
		if (in_array($id_user, $arr_censor)) {
			$key = array_search($id_user, $arr_censor);
			unset($arr_censor[$key]);
			$str_censor = implode(',', $arr_censor);
		}else{
			$str_censor = implode(',', $arr_censor);
		}
	}else{
		$str_censor = "";
	}

	if ($select_ass['id_employee'] != "") {
		if (in_array($id_user, $arr_employee)) {
			$key = array_search($id_user, $arr_employee);
			unset($arr_employee[$key]);
			$str_employee = implode(',', $arr_employee);
		}else{
			$str_employee = implode(',', $arr_employee);
		}
	}

	$update_group = new db_query("UPDATE `group` SET `id_administrators` = '$str_administrators', `id_censor` = '$str_censor', `id_employee` = '$str_employee' WHERE `id` = '$id_group'");

	// Xóa tất cả lời mời làm QTV, Kiểm duyệt
	$delete_invite_to_group = new db_query("DELETE FROM `invite_to_group` WHERE `id_group` = '$id_group' AND `invitee_id` = '$id_user'");

	// Xóa cấm đăng bài
	$delete_cam_dang_bai = new db_query("DELETE FROM `cam_dang_bai` WHERE `id_group` = '$id_group' AND `id_user` = '$id_user'");

	// Xóa đình chỉ
	$delete_dinh_chi_thanh_vien = new db_query("DELETE FROM `dinh_chi_thanh_vien` WHERE `id_group` = '$id_group' AND `is_suspended` = '$id_user'");
}

// rời khỏi nhóm / rời khỏi nhóm & stop_invite2group - mới
if($checkbox != 0){
	$data_stop_invite2group = [
		'user_id' => $my_id,
		'user_type' => $my_type,
		'group_id' => $id_group,
		'created_at' => time(),
	];
	add('stop_invite2group',$data_stop_invite2group);
}
if ($my_type == 1){
	$condition = [
		'group_id' => $id_group,
		'user_id' => $my_id,
		'user_type' => $my_type,
	];
	delete("group_member", $condition);
}else{
	delete("group_member", "group_id = $id_group AND user_id = $my_id AND (user_type = 0 OR user_type = 2)");
}


?>
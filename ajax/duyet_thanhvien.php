<?php
require_once '../config/config.php';
$id_user = getValue("id_user","int","POST",0);
$user_type = getValue("user_type","int","POST",0);
$id_group = getValue("id_group","int","POST",0);

if ($user_type == 1){
	$check_exists = new db_query("SELECT `id` FROM `group_member` WHERE group_id = $id_group AND `user_id` = '$id_user' AND user_type = $user_type");
}else{
	$check_exists = new db_query("SELECT `id` FROM `group_member` WHERE group_id = $id_group AND `user_id` = '$id_user' AND (user_type = 0 OR user_type = 2)");
}
if (mysql_num_rows($check_exists->result) > 0) {
	// xóa yêu cầu tham gia nhóm - mới
	$delete_member_request_join = new db_query("DELETE FROM `member_request_join` WHERE `id_user` = '$id_user' AND `id_group` = '$id_group'");
	// xóa câu trả lời tham gia nhóm - mới
	$delete_user_join_success = new db_query("DELETE FROM `answer_user` WHERE `id_user` = '$id_user' AND `id_group` = '$id_group'");
	echo json_encode(['result'=>true,'msg'=>'Đã là thành viên trong nhóm']);
}else{
	// thêm vào bảng thành viên - mới
	$data = [
		'user_id' => $id_user,
		'user_type' => $user_type,
		'group_id' => $id_group,
		'created_at' => time(),
		'updated_at' => time(),
	];
	add("group_member",$data);
	$id = mysql_insert_id();
	if ($id > 0){
		// xóa yêu cầu tham gia nhóm
		$delete_member_request_join = new db_query("DELETE FROM `member_request_join` WHERE `id_user` = '$id_user' AND `id_group` = '$id_group'");
		// xóa câu trả lời tham gia nhóm
		$delete_user_join_success = new db_query("DELETE FROM `answer_user` WHERE `id_user` = '$id_user' AND `id_group` = '$id_group'");

		echo json_encode(['result'=>true,'msg'=>'Phê duyệt yêu cầu thành công']);
	}else{
		echo json_encode(['result'=>false,'msg'=>'Có lỗi xảy ra']);
	}
}
	


	

?>
<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
if ($id == 0) {
	header("Location: /");
}
$db_check = new db_query("SELECT * FROM comment WHERE id = $id");
if (mysql_num_rows($db_check->result) > 0){
	$type = getValue('type','int','POST','');
    $react_type = getValue('react_type','int','POST','');

    if ($type == 0) {
    	// thêm và cập nhật
    	$db_react = new db_query("SELECT * FROM like_comment WHERE id_comment = $id AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
    	$info_react = mysql_fetch_array($db_react->result);
    	if (mysql_num_rows($db_react->result) == 0) {
			$data = [
				'id_comment'	=>$id,
				'id_user'	=>$_SESSION['login']['id'],
				'user_type'	=>$_SESSION['login']['user_type'],
				'react_type'   => $react_type,
				'created_at'=>time(),
				'updated_at'=>time()
			];
			add('like_comment',$data);
		}else{
			$data = [
				'react_type'   => $react_type,
				'updated_at'=>time()
			];
			update('like_comment',$data, ['id'=>$info_react['id']]);
		} 
		// thêm thông báo
		$db_post = new db_query("SELECT * FROM comment WHERE id = $id");
		if (mysql_num_rows($db_post->result) > 0){
			$db_post = mysql_fetch_array($db_post->result);
			if ($my_id != $db_post['id_user'] || $my_type != $db_post['user_type']){
				$data_insert_notify = [
					'type' => 7,
					'id_user' => $my_id,
					'id_company' => $my_com_id,
					'content' =>  $_SESSION['login']['name']." đã thích bình luận của bạn",
					'link' => "/chi-tiet-tin-dang.html?new_id=".$db_post['id_new']."&id_cmt=".$id,
					'invited_users' => $db_post['id_user'],
					'invited_users_type' => $db_post['user_type'],
					'created_at' => time(),
					'updated_at' => time(),
				];
				add('notify', $data_insert_notify);
			}
		}
		echo json_encode([
			'result'=>true,
			'num_like_cmt' =>(mysql_num_rows($db_check->result) + 1),
		]);
	} else {
		// xóa
		$db_del = new db_query("DELETE FROM like_comment WHERE id_comment = $id AND id_user = " . $_SESSION['login']['id']);
		echo json_encode([
			'result'=>true,
			'num_like_cmt' =>(mysql_num_rows($db_check->result) - 1),
		]);
	}
} else {
	echo json_encode([
		'result'=>false,
		'msg'=>"Bình luận không tồn tại"
	]);
} 
?>
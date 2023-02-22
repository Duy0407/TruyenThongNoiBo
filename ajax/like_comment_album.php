<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
if ($id == 0) {
	header("Location: /");
}
$db_check = new db_query("SELECT * FROM like_comment_album WHERE id_comment = $id");
$dem = 0;
while($row_like_comment = mysql_fetch_array($db_check->result)){
	if ($row_like_comment['id_comment'] == $id && $row_like_comment['user_id'] == $_SESSION['login']['id'] ) {
		$dem++;
	}
}
if ($dem == 0) {
	$data = [
		'id_comment'=>$id,
		'user_id'=>$_SESSION['login']['id'],
		'user_type'=>$_SESSION['login']['user_type'],
		'created_at'=>time()
	];
	add('like_comment_album',$data);
	// thêm thông báo
	$db_post = new db_query("SELECT * FROM comment_album WHERE id = $id");
	if (mysql_num_rows($db_post->result) > 0){
		$db_post = mysql_fetch_array($db_post->result);
		$db_album = new db_query("SELECT * FROM album WHERE id = ".$db_post['album_id']);
		$db_album = mysql_fetch_array($db_album->result);
		if ($my_id != $db_post['user_id'] || $my_type != $db_post['user_type']){
			$data_insert_notify = [
				'type' => 7,
				'id_user' => $my_id,
				'id_company' => $my_com_id,
				'content' =>  $_SESSION['login']['name']." đã thích bình luận của bạn",
				'link' => (($db_post['user_type']==2)?"/trang-ca-nhan-e":"/trang-ca-nhan-e").$db_album['user_id']."/album-a".$db_post['album_id']."?id_cmt=".$id,
				'invited_users' => $db_post['user_id'],
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
}else{
	$db_del = new db_query("DELETE FROM like_comment_album WHERE id_comment = $id AND user_id = " . $_SESSION['login']['id']);
	echo json_encode([
		'result'=>false,
		'num_like_cmt' =>(mysql_num_rows($db_check->result) - 1),
	]);
}
?>
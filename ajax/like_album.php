<?php
require_once '../config/config.php';
$album_id = getValue('album_id','int','POST','');
if ($album_id == 0) {
	header("Location: /");
}
$db_like = new db_query("SELECT * FROM `like_album` WHERE id_album = $album_id AND user_id = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);

if (mysql_num_rows($db_like->result) == 0) {
	$data = [
		'id_album'	=>$album_id,
		'user_id'	=>$_SESSION['login']['id'],
		'user_type'	=>$_SESSION['login']['user_type'],
		'created_at'=>time()
	];
	add('like_album',$data);
	$result = true;
	// thêm thông báo
	$db_post = new db_query("SELECT * FROM album WHERE id = $album_id");
	if (mysql_num_rows($db_post->result) > 0){
		$db_post = mysql_fetch_array($db_post->result);
		if ($my_id != $db_post['user_id'] || $my_type != $db_post['user_type']){
			$data_insert_notify = [
				'type' => 7,
				'id_user' => $my_id,
				'id_company' => $my_com_id,
				'content' =>  $_SESSION['login']['name']." đã thích album của bạn",
				'link' => (($db_post['user_type']==2)?"/trang-ca-nhan-e":"/trang-ca-nhan-e").$db_post['user_id']."/album-a".$album_id,
				'invited_users' => $db_post['user_id'],
				'invited_users_type' => $db_post['user_type'],
				'created_at' => time(),
				'updated_at' => time(),
			];
			add('notify', $data_insert_notify);
		}
	}
}else{
	$qr_del = new db_query("DELETE FROM `like_album` WHERE id_album = $album_id AND user_id = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
	$result = false;
}
$db_count_like = new db_query("SELECT * FROM `like_album` WHERE id_album = $album_id");
echo json_encode([
		'result'=>$result,
		'count'=>mysql_num_rows($db_count_like->result)
	]);
?>
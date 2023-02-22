<?php
require_once '../config/config.php';

$id_post = getValue("id_post","int","POST",0);

$db_post = new db_query("SELECT * FROM `new_feed` WHERE new_id = $id_post");
if (mysql_num_rows($db_post->result) > 0){
	update('new_feed', ['delete' => 1], ['new_id'=>$id_post]);
	echo json_encode([
		'result'=>true,
		'msg'=>"Xóa bài viết thành công"
	]);
}else{
	echo json_encode([
		'result'=>false,
		'msg'=>"Tin không tồn tại"
	]);
}
?>
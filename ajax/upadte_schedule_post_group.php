<?php
require_once '../config/config.php';

$id_new = getValue("id_new", "int", "POST", 0);
$show_time = getValue("show_time", "str", "POST", ''); 

$db_post = new db_query("SELECT * FROM `new_feed` WHERE new_id = $id_new");
if (mysql_num_rows($db_post->result) > 0){
	update('new_feed', ['show_time' => strtotime($show_time)], ['new_id'=> $id_new]);
	echo json_encode([
		'result'=> true,
		'msg'=> "Đổi lịch bài đăng thành công"
	]);
} else {
	echo json_encode([
		'result'=> false,
		'msg'=> "Tin không tồn tại"
	]);
}  
?>
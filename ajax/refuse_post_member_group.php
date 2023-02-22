<?php
require_once '../config/config.php';

$new_id = getValue("new_id","str","POST","");
$message = getValue("message","str","POST","");

$data_update = ['approve' => 2, 'updated_at' => time()];
if ($message) {
	$data_update['message_tuchoi'] = $message;
}

$arr_new_id = explode(',', $new_id);
if (count($arr_new_id) < 2) { 
	$update = update('new_feed', $data_update, ['new_id' => $new_id]);	
	$author = getValue("author","int","POST",0);
	if ($author) {
		$type_author = getValue("type_author","int","POST",0);
		$id_group = getValue("id_group","int","POST",0);
		$data_is = [
			'id_group' => $id_group,
			'id_user' => $author,
			'user_type' => $type_author,
			'time' => time()
		]; 
		$insert = add('cam_dang_bai', $data_is); 
	}
} else {
	foreach ($arr_new_id as $k => $v) {
		$update = update('new_feed', $data_update, ['new_id' => $v]);
	}
}

?>
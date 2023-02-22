<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0); 
$type = getValue("type","int","POST",0); 

$pr_mem = new db_query("SELECT * FROM group_member WHERE group_id = '$id_group' AND user_id = '$my_id' AND user_type = '$my_type'");
if (mysql_num_rows($pr_mem->result) > 0) {
	$data = [
		'unfollow' => $type,
		'updated_at' => time(),
	];
	update('group_member', $data,  ['group_id' => $id_group, 'user_id' => $my_id, 'user_type' => $my_type]);
	echo json_encode([
        'result' => true
    ]);
} else {
	echo json_encode([
        'result' => false
    ]);
}

?>
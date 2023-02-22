<?php
require_once '../config/config.php';

$new_id = getValue("new_id","str","GET","");
$select = "id_new, id_user, user_type, created_time";
$list_share = select($select, 'share_post', '', ['id_new'=> $new_id], 'id_user', 'created_time DESC');

// thêm những người lạ vào mảng bạn bè
$arr_in4[2] = $arr_ep;
$arr_in4 = add_strangers_to_arr_ep($list_share, $arr_in4); 

// lấy tên user share
foreach ($list_share as $k => $v) {
	if ($v['user_type'] == 1) {
		$list_share[$k]['user_name'] = $arr_in4[1][(int)$v['id_user']]['com_name']; 
	} else {
		$list_share[$k]['user_name'] = $arr_in4[2][(int)$v['id_user']]['ep_name']; 
	}
} 
echo json_encode($list_share); 
?>
<?php
require_once '../config/config.php';

$cmt_id = getValue("cmt_id","str","GET","");
$icon_type = getValue("icon_type","str","GET","");

$select = "id_comment, id_user, user_type, react_type, created_at";
$condition = ['id_comment'=> $cmt_id];
if ($icon_type) {
	$condition['react_type'] = $icon_type;
}
$list_react = select($select, 'like_comment', '', $condition, '', 'created_at DESC');

// thêm những người lạ vào mảng bạn bè
$arr_in4[2] = $arr_ep;
$arr_in4 = add_strangers_to_arr_ep($list_react, $arr_in4); 

// lấy tên user react
foreach ($list_react as $k => $v) {
	if ($v['user_type'] == 1) {
		$list_react[$k]['user_name'] = $arr_in4[1][(int)$v['id_user']]['com_name']; 
	} else {
		$list_react[$k]['user_name'] = $arr_in4[2][(int)$v['id_user']]['ep_name']; 
	}
}  
echo json_encode($list_react); 
?>
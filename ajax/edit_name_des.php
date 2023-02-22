<?php
require_once '../config/config.php';
$id_group = getValue("id_group","int","POST",0);
$name_group = getValue("name_group","str","POST","");
$desc_group = getValue("desc_group","str","POST","");

if($name_group != ""){
	if($desc_group != ""){
		$update_group = new db_query("UPDATE `group` SET `group_name` = '$name_group', `description` = '$desc_group' WHERE `id` = '$id_group'");
		echo json_encode([
			'result' => true,
			'msg' => "Cập nhật thành công"
		]);
	}else{
		echo json_encode([
			'result' => false,
			'msg' => "Vui lòng nhập mô tả"
		]); 
	}
}else{
	echo json_encode([
		'result' => false,
		'msg' => "Vui lòng nhập tên hội nhóm"
	]);
} 
?>
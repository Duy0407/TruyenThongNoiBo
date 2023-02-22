<?php
require_once '../config/config.php';

$id_use_rule = getValue("id_use_rule","int","POST",0);
$id_com_rule = getValue("id_com_rule","int","POST",0);
$id_group_rule = getValue("id_group_rule","int","POST",0);

$title_rule = getValue("title_rule","str","POST","");
$describe_rule = getValue("describe_rule","str","POST","");
$time_create = time();

if($title_rule != ""){
	if($describe_rule != ""){
		$insert_rule = new db_query("INSERT INTO `group_rules`(`id_user`,`id_company`,`id_group`,`title_rule`,`describe_rule`,`create_time`)VALUES('$id_use_rule','$id_com_rule','$id_group_rule','$title_rule','$describe_rule','$time_create')");
		$id = mysql_insert_id();
		echo json_encode([
			'result' => true,
			'msg' => "Thêm thành công",
			'data' => ['id' => $id, 'title' => $title_rule, 'describe' => $describe_rule]
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
		'msg' => "Vui lòng nhập tiêu đề"
	]);
}
?>
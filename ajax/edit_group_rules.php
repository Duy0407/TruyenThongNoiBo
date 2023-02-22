<?php
require_once '../config/config.php';

$id_rule_ed = getValue("id_rule_ed","int","POST",0);
$id_use_rule_ed = getValue("id_use_rule_ed","int","POST",0);
$title_rule_ed = getValue("title_rule_ed","str","POST","");
$desctibe_rule_ed = getValue("desctibe_rule_ed","str","POST","");

$time_update = time();

if($title_rule_ed != ""){
	if($desctibe_rule_ed != ""){
		$edit_rule = new db_query("UPDATE `group_rules` SET `id_user` = '$id_use_rule_ed', `title_rule` = '$title_rule_ed', `describe_rule` = '$desctibe_rule_ed', `update_time` = '$time_update' WHERE `id` = '$id_rule_ed'");
	}else{
		echo "Vui lòng nhập mô tả";
	}
}else{
	echo "Vui Lòng nhập tiêu đề";
}

?>
<?php
require_once '../config/config.php';

$id_rule_xoa = getValue("id_rule_xoa","int","POST",0);

if($id_rule_xoa > 0){
	$delete_rule = new db_query("DELETE FROM `group_rules` WHERE `id` = '$id_rule_xoa'");
}else{
	echo "Error";
}

?>
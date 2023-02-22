<?php
require_once '../config/config.php';
$my_type_mod = $my_type % 2;
$cc_id_group = getValue("cc_id_group","str","POST","");
$check_change = getValue("check_change","int","POST",0);

$select_notify = new db_query("SELECT * FROM `custom_notification` WHERE `id_user` = '$my_id' AND MOD(user_type,2) = '$my_type_mod' AND `id_group` = '$cc_id_group'");

if(mysql_num_rows($select_notify->result) > 0){
	$ud_cus_notify = new db_query("UPDATE `custom_notification` SET `customize` = '$check_change' WHERE `id_user` = '$my_id' AND MOD(user_type,2) = '$my_type_mod' AND `id_group` = '$cc_id_group'");
}else{
	$is_cus_notify = new db_query("INSERT INTO `custom_notification`(`id_user`,`user_type`,`id_group`,`customize`)VALUES('$my_id','$my_type','$cc_id_group','$check_change')");
}
?>
<?php 
require_once '../config/config.php';

$pin_id_use = getValue("pin_id_use","int","POST",0);
$pin_id_com = getValue("pin_id_com","int","POST",0);
$pin_id_goup = getValue("pin_id_goup","int","POST",0);

$sl_group_gim = new db_query("SELECT `id_group` FROM `group_pin` WHERE `id_user_pin` = '$pin_id_use' AND `id_company` = '$pin_id_com' AND `id_group` = '$pin_id_goup'");

if(mysql_num_rows($sl_group_gim->result) > 0){
	$dl_pin_group = new db_query("DELETE FROM `group_pin` WHERE `id_user_pin` = '$pin_id_use' AND `id_company` = '$pin_id_com' AND `id_group` = '$pin_id_goup'");
}else{
	$is_pin_group = new db_query("INSERT INTO `group_pin`(`id_user_pin`,`id_company`,`id_group`)VALUES('$pin_id_use','$pin_id_com','$pin_id_goup')");
}


?>
<?php
require_once '../config/config.php';

$val_check = getValue("val_check","int","POST",0);
$id_user = $_SESSION['login']['id'];
$id_com = $_SESSION['login']['id_com'];

$db_group = new db_query("SELECT `id`,`id_manager`,`id_employee` FROM `group` WHERE find_in_set('$id_user', id_manager) OR find_in_set('$id_user', id_employee)");

$arr_id = [];
while ($group = mysql_fetch_assoc($db_group->result)) {
	$arr_id[] = $group['id'];
}

if ($val_check != 1) {
	foreach ($arr_id as $key => $value) {
		$db_notifi = new db_query("SELECT `id_user`,`id_group` FROM `custom_notification` WHERE `id_user` = '$id_user' AND `id_group` = '$value'");
		if (mysql_num_rows($db_notifi->result) > 0) {
			$is_update = new db_query("UPDATE `custom_notification` SET `customize` = 3 WHERE `id_user` = '$id_user' AND `id_group` = '$value'");
		}else{
			$is_insert = new db_query("INSERT INTO `custom_notification`(`id_user`,`id_company`,`id_group`,`customize`)VALUES('$id_user','$id_com','$value',3)");
		}
	}
}else{
	foreach ($arr_id as $key => $value) {
		$is_update2 = new db_query("UPDATE `custom_notification` SET `customize` = 0 WHERE `id_user` = '$id_user' AND `id_group` = '$value'");
	}
}


?>
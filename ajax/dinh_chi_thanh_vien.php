<?php
require_once '../config/config.php';

$id_user = getValue("id_user","int","POST",0);
$id_group = getValue("id_group","int","POST",0);
$suspension_val = getValue("suspension","int","POST",0);
$time_start = time();  //43200


if ($suspension_val == 1) {
	$time_end = $time_start + 43200;
}else if ($suspension_val == 2) {
	$time_end = $time_start + 86400;
}else if ($suspension_val == 3) {
	$time_end = $time_start + 86400 * 3;
}else if ($suspension_val == 4) {
	$time_end = $time_start + 86400 * 7;
}else if ($suspension_val == 5) {
	$time_end = $time_start + 86400 * 14;
}else if ($suspension_val == 6) {
	$time_end = $time_start + 86400 * 28;
}

$db_select = new db_query("SELECT `id_group`,`is_suspended` FROM `dinh_chi_thanh_vien` WHERE `id_group` = '$id_group' AND `is_suspended` = '$id_user'");
if (mysql_num_rows($db_select->result) > 0) {
	if ($suspension_val != 0) {
		$update_suspension = new db_query("UPDATE `dinh_chi_thanh_vien` SET `time` = '$suspension_val', `time_start` = '$time_start', `time_end` = '$time_end' WHERE `id_group` = '$id_group' AND `is_suspended` = '$id_user'");
	}else{
		$delete_suspension = new db_query("DELETE FROM `dinh_chi_thanh_vien` WHERE `id_group` = '$id_group' AND `is_suspended` = '$id_user'");
	}
}else{
	if ($suspension_val != 0) {
		$insert_suspension = new db_query("INSERT INTO `dinh_chi_thanh_vien`(`id_group`,`is_suspended`,`user_type`,`time`,`time_start`,`time_end`)VALUES('$id_group','$id_user',2,'$suspension_val','$time_start','$time_end')");
	}
}



?>
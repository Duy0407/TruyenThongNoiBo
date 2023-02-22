<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$group_pause_val = getValue("group_pause_val","int","POST",0);
$time = time();

if ($group_pause_val == 1) {
	$time_pause = $time + 43200;
}else if ($group_pause_val == 2) {
	$time_pause = $time + 86400;
}else if ($group_pause_val == 3) {
	$time_pause = $time + 86400 * 3;
}else if ($group_pause_val == 4) {
	$time_pause = $time + 86400 * 7;
}else if ($group_pause_val == 5) {
	$time_pause = $time + 86400 * 14;
}else if ($group_pause_val == 6) {
	$time_pause = $time + 86400 * 30;
}else if ($group_pause_val == 0) {
	$time_pause = 0;
}

$ud_group_pause = new db_query("UPDATE `group` SET `group_pause` = '$time_pause', `group_pause_type` = '$group_pause_val' WHERE `id` = '$id_group'");


?>
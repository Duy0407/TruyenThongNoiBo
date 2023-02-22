<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$id_user = $_SESSION['login']['id'];

$sql_select = new db_query("SELECT `id_administrators`,`id_censor`,`id_employee` FROM `group` WHERE `id` = '$id_group'");
$sql_assoc = mysql_fetch_assoc($sql_select->result);

$qtv = explode(',', $sql_assoc['id_administrators']);
$kduyet = explode(',', $sql_assoc['id_censor']);

$nv_check = explode(',', $sql_assoc['id_employee']);

$nv = explode(',', $sql_assoc['id_employee']);
$key_nv = array_search($id_user, $nv);
unset($nv[$key_nv]);
$nv_str = implode(',', $nv);


if (in_array($id_user, $qtv)) {
	$key = array_search($id_user, $qtv);
	unset($qtv[$key]);
	$qtv_str = implode(',', $qtv);

	$sql_update = new db_query("UPDATE `group` SET `id_administrators` = '$qtv_str', `id_employee` = '$nv_str' WHERE `id` = '$id_group'");
}else if (in_array($id_user, $kduyet)) {
	$key = array_search($id_user, $kduyet);
	unset($kduyet[$key]);
	$kduyet_str = implode(',', $kduyet);

	$sql_update = new db_query("UPDATE `group` SET `id_censor` = '$kduyet_str', `id_employee` = '$nv_str' WHERE `id` = '$id_group'");
}else if (in_array($id_user, $nv_check)) {
	$sql_update = new db_query("UPDATE `group` SET `id_employee` = '$nv_str' WHERE `id` = '$id_group'");
}


?>
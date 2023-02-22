<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$id_user = $_SESSION['login']['id'];

$sql_group = new db_query("SELECT `following` FROM `group` WHERE `id` = '$id_group'");
$sql_group_assoc = mysql_fetch_assoc($sql_group->result);

$arr_folow = explode(',', $sql_group_assoc['following']);
$key = array_search($id_user, $arr_folow);
unset($arr_folow[$key]);
$str_folow = implode(',', $arr_folow);
$ud_following = new db_query("UPDATE `group` SET `following` = '$str_folow' WHERE `id` = '$id_group'");



?>
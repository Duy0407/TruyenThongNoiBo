<?php 
include("../config/config.php");
$id_user = $_SESSION['login']['id'];
$id_group = getValue("id_group","str","POST",0);

$delete_group_new = new db_query("DELETE FROM `group` WHERE `id` = '$id_group' AND `id_manager` = '$id_user'");
?>
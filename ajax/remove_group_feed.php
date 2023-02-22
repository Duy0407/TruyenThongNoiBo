<?php
require_once '../config/config.php';

$id_user = $_SESSION['login']['id'];
$id_group = getValue("id_group","int","POST",0);


$time_start = time();
$time_end = $time_start + 86400;

$insert_remove = new db_query("INSERT INTO `remove_group`(`id_user`,`id_group`,`time_start`,`time_end`)VALUES('$id_user','$id_group','$time_start','$time_end')");



?>
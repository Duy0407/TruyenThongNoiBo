<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$id_user = $_SESSION['login']['id'];
$time = time();

$insert_member_request_join = new db_query("INSERT INTO `member_request_join`(`id_user`,`user_type`,`id_group`,`request_time`)VALUES('$my_id',$my_type,'$id_group','$time')");

?>
<?php
require_once '../config/config.php';
$id_post = getValue("id_post","int","POST",0);

$update_approve_post = new db_query("UPDATE `new_feed` SET `approve`  = 2 WHERE `new_id` = '$id_post'");


?>
<?php
require_once '../config/config.php';
$id_new = getValue("id_new","int","POST",0);
$time = time();
$time = $time + 1;


$update_show_time = new db_query("UPDATE `new_feed` SET `show_time` = '$time', `updated_at` = '$time' WHERE `new_id` = '$id_new'");

?>
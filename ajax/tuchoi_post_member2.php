<?php
require_once '../config/config.php';

$id_post = getValue("id_post","int","POST",0);
$message_tuchoi = getValue("message_tuchoi","str","POST","");

$update_post = new db_query("UPDATE `new_feed` SET `approve` = 2, `message_tuchoi` = '$message_tuchoi' WHERE `new_id` = '$id_post'");
?>
<?php
require_once '../config/config.php';
$posts_id = getValue("posts_id","int","POST",0);
$messages_refuse = getValue("messages_refuse","str","POST","");
$time = time();

$db_update = new db_query("UPDATE `new_feed` SET `message_remove` = '$messages_refuse',`approve` = 2,`updated_at` = '$time' WHERE `new_id` = '$posts_id'");


?>
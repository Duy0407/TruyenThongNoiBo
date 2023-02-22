<?php
require_once '../config/config.php';

$id_post = getValue("id_post","int","POST",0);

if ($my_type == 1){
    $db_delete = delete('new_notify_on', ['user_id' => $my_id,'user_type'=>$my_type,'new_id'=>$id_post]);
}elseif ($my_type == 0 || $my_type == 2){
    $db_delete = new db_query("DELETE FROM `new_notify_on`
    WHERE `new_id` = '$id_post' AND `user_id` = '$my_id' AND (user_type = 0 OR user_type = 2)");
}

?>
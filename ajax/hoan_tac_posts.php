<?php
require_once '../config/config.php';
$id_post_hide = getValue("id_post_hide","int","POST",0);

if ($my_type == 1){
    $db_delete = delete('new_hide_post', ['user_id' => $my_id,'user_type'=>$my_type,'new_id'=>$id_post_hide]);
}elseif ($my_type == 0 || $my_type == 2){
    $db_delete = new db_query("DELETE FROM `new_hide_post`
    WHERE `new_id` = '$id_post_hide' AND `user_id` = '$my_id' AND (user_type = 0 OR user_type = 2)");
}

?>
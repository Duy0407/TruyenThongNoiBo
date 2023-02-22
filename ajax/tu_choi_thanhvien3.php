<?php
require_once '../config/config.php';
$id_user = getValue("id_user","int","POST",0);
$user_type = getValue("user_type","int","POST",0);
$id_group = getValue("id_group","int","POST",0);
$message_tuchoi = getValue("message_tuchoi","str","POST","");

if ($user_type == 1){
    $delete_mem = new db_query("DELETE FROM `answer_user` WHERE `id_user` = '$id_user' AND `user_type` = '$user_type' AND `id_group` = '$id_group'");
    $update = new db_query("UPDATE `member_request_join` SET `type_join` = 2, `refuse_message` = '$message_tuchoi' WHERE `id_user` = '$id_user' AND `user_type` = '$user_type' AND `id_group` = '$id_group'");
}else{
    $delete_mem = new db_query("DELETE FROM `answer_user` WHERE `id_user` = '$id_user' AND (`user_type` = 0 OR `user_type` = 2) AND `id_group` = '$id_group'");
    $update = new db_query("UPDATE `member_request_join` SET `type_join` = 2, `refuse_message` = '$message_tuchoi' WHERE `id_user` = '$id_user' AND (`user_type` = 0 OR `user_type` = 2) AND `id_group` = '$id_group'");
}

?>
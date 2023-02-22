<?php
require_once '../config/config.php';

$id_user = getValue("id_user","int","POST",0);
$user_type = getValue("user_type","int","POST",0);
$id_group = getValue("id_group","int","POST",0);

if ($user_type == 1){
    $dlt_invite = new db_query("DELETE FROM `invite_to_group` WHERE `id_group` = '$id_group' AND `invitee_id` = '$id_user' AND invitee_type = $user_type");
}else{
    $dlt_invite = new db_query("DELETE FROM `invite_to_group` WHERE `id_group` = '$id_group' AND `invitee_id` = '$id_user' AND (invitee_type = 0 OR invitee_type = 2)");
}
?>
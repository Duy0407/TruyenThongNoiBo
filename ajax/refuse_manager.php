<?php
require_once '../config/config.php';
$invite_id = getValue("invite_id","int","POST",0);
$log_user = $_SESSION['login']['id'];

if ($my_type == 1){
    $dlt_invite = new db_query("DELETE FROM `invite_to_group` WHERE `id_invite` = '$invite_id' AND `invitee_id` = '$my_id' AND invitee_type = $my_type");
}else{
    $dlt_invite = new db_query("DELETE FROM `invite_to_group` WHERE `id_invite` = '$invite_id' AND `invitee_id` = '$my_id' AND (invitee_type = 0 OR invitee_type = 2)");
}

?>
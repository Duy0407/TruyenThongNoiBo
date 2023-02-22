<?php
require_once '../config/config.php';
$id_user = $_SESSION['login']['id'];
$id_user_invite = getValue("id_user","int","POST",0);
$user_type = getValue("user_type","int","POST",0);
$id_group = getValue("id_group","int","POST",0);
$time_invite = time();

$insert_censor = new db_query("INSERT INTO `invite_to_group`(`id_group`,inviter_id,inviter_type,invitee_id,invitee_type,`type_invite`,`time_invite`)
VALUES('$id_group',$my_id,$my_type,$id_user_invite,$user_type,2,'$time_invite')");

?>
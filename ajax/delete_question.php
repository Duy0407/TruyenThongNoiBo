<?php
require_once '../config/config.php';

$id_question = getValue("id_question","int","POST",0); 


if($id_question > 0){
	$delete_question = new db_query("DELETE FROM `member_question` WHERE `id` = '$id_question'");
}

?>
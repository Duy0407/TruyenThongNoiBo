<?php
require_once '../config/config.php';
$type_comment = getValue("type_comment","int","POST",0);
$id_post = getValue("id_post","int","POST",0);
$id_position = getValue("id_position","int","POST",0);

if($type_comment != 0){
	$update_type_comment = new db_query("UPDATE `new_feed` SET `tat_comment` = '$type_comment' WHERE `new_id` = '$id_post' AND `position` = '$id_position'");
	echo "False1";
}else{
	$update_type_comment = new db_query("UPDATE `new_feed` SET `tat_comment` = '$type_comment' WHERE `new_id` = '$id_post' AND `position` = '$id_position'");
	echo "False2";
}

?>
<?php 
require_once '../config/config.php';

$id_user = $_SESSION['login']['id'];
$id_posts = getValue("id_posts","int","POST",0);
$id_collec = getValue("id_collec","int","POST",0);


if($id_posts > 0 && $id_collec > 0){
	$delete_post_collection = new db_query("DELETE FROM `save_post` WHERE `id_posts` = '$id_posts' AND `use_id` = '$id_user' AND `id_collection` = '$id_collec'");
}else{
	echo "Error";
}

?>
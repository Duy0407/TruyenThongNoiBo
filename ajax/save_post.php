<?php 
include("../config/config.php");

$id_posts = getValue("id_posts","int","POST",0);
$id_collection = getValue("id_collection","int","POST","");


if($id_collection != ""){
	$select_save_post = new db_query("SELECT `id_save` FROM `save_post` WHERE `id_posts` = '$id_posts' AND `id_collection` = '$id_collection'");
	if(mysql_num_rows($select_save_post->result) == 0){
		$insert_posts = new db_query("INSERT INTO `save_post`(`id_posts`,`id_collection`,created_at)VALUES('$id_posts','$id_collection',".time().")");
		
		echo json_encode(['result'=>true]);
	}else{
		echo json_encode(['result'=>false,'msg'=>"Bài viết đã được lưu"]);
	}
}else{
	echo json_encode(['result'=>false,'msg'=>"Vui lòng chọn bộ sưu tập"]);
}

?>
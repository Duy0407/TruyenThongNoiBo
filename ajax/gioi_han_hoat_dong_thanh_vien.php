<?php
require_once '../config/config.php';

$id_user = $_SESSION['login']['id'];

$id_user_limit = getValue("id_user_limit","int","POST",0);
$id_group = getValue("id_group","int","POST",0);

$limit_post = getValue("limit_post","int","POST",0);
$post_het_han = getValue("post_het_han","int","POST",0);

$limit_commnet = getValue("limit_commnet","int","POST",0);
$commem_het_han = getValue("commem_het_han","int","POST",0);

$time_limit = time();

// Thời gian hết hạn - Bài viết
if ($post_het_han == 1) {
	$time_post = $time_limit + 43200;
}else if($post_het_han == 2){
	$time_post = $time_limit + 86400;
}else if($post_het_han == 3){
	$time_post = $time_limit + 86400 * 3;
}else if($post_het_han == 4){
	$time_post = $time_limit + 86400 * 7;
}else if($post_het_han == 5){
	$time_post = $time_limit + 86400 * 14;
}else if($post_het_han == 6){
	$time_post = $time_limit + 86400 * 28;
}

// Thời gian hết hạn - Comment
if ($commem_het_han == 1) {
	$time_comment = $time_limit + 43200;
}else if($commem_het_han == 2){
	$time_comment = $time_limit + 86400;
}else if($commem_het_han == 3){
	$time_comment = $time_limit + 86400 * 3;
}else if($commem_het_han == 4){
	$time_comment = $time_limit + 86400 * 7;
}else if($commem_het_han == 5){
	$time_comment = $time_limit + 86400 * 14;
}else if($commem_het_han == 6){
	$time_comment = $time_limit + 86400 * 28;
}

$sl_ghhdtv = new db_query("SELECT `id` FROM `gioi_han_thanh_vien` WHERE `id_group` = '$id_group' AND `id_user_limit` = '$id_user_limit'");
if(mysql_num_rows($sl_ghhdtv->result) > 0){
	$ud_ghhdtv = new db_query("UPDATE `gioi_han_thanh_vien` SET `gioi_han_post` = '$limit_post', `type_posts_het_han_sau` = '$post_het_han',`posts_het_han_sau` = '$time_post',`gioi_han_comment` = '$limit_commnet',`type_commem_het_han_sau` = '$commem_het_han',`commem_het_han_sau` = '$time_comment' WHERE `id_group` = '$id_group' AND `id_user_limit` = '$id_user_limit'");
}else{
	$is_ghhdtv = new db_query("INSERT INTO `gioi_han_thanh_vien`(`id_group`,`id_user`,`id_user_limit`,`gioi_han_post`,`type_posts_het_han_sau`,`posts_het_han_sau`,`gioi_han_comment`,`type_commem_het_han_sau`,`commem_het_han_sau`,`time_limit`)VALUES('$id_group','$id_user','$id_user_limit','$limit_post','$post_het_han','$time_post','$limit_commnet','$commem_het_han','$time_comment','$time_limit')");
}




?>
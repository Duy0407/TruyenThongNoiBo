<?php
require_once '../config/config.php';

$id_post_report = getValue("id_post_report","int","POST",0);
$id_group_report = getValue("id_group_report","int","POST",0); 
$title_parent = getValue("title_parent","str","POST","");
$title_child = getValue("title_child","str","POST","");
$time = time();


if($title_child != ""){
	$result_title = $title_parent.','.$title_child;
}else{
	$result_title = $title_parent;
}
$db_report = new db_query("INSERT INTO `members_report_posts`(`id_post`,`id_group`,`member_report`, `type_member_report`,`messages`,`time_report`)VALUES('$id_post_report','$id_group_report','$my_id', '$my_type','$result_title','$time')");

?>	
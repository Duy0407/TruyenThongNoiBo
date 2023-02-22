<?php
require_once '../config/config.php';

$id_post_report = getValue("id_post_report","int","POST",0);
$id_group_report = getValue("id_group_report","int","POST",0);
$user_report = getValue("user_report","int","POST",0);
$title_parent = getValue("title_parent","str","POST","");
$time = time();

$insert = new db_query("INSERT INTO `members_report_posts`(`id_post`,`id_group`,`member_report`,`messages`,`time_report`)VALUES('$id_post_report','$id_group_report','$user_report','$title_parent','$time')");

?>
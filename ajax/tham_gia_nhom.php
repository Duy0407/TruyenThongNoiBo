<?php
require_once '../config/config.php';

$join_id_user = $_SESSION['login']['id'];
$join_id_com = $_SESSION['login']['id_com'];;
$join_id_group = getValue("join_id_group","int","POST",0);

$type_ques = getValue("type_ques","arr","POST","");
$cau_hoi = getValue("cau_hoi","arr","POST","");

$answer = getValue("answer","arr","POST","");
$time_save = time();


foreach ($type_ques as $key => $value) {
	$show_answer = $answer[$key];
	if($value == 2){
		$show_answer = implode(',', $show_answer);
	}
	$show_cauhoi = $cau_hoi[$key];
	$insert = new db_query("INSERT INTO `answer_user` (`id_user`,`id_company`,`id_group`,`question_type`,`question`,`answer`,`time_answer`)VALUES('$join_id_user','$join_id_com','$join_id_group','$value','$show_cauhoi','$show_answer','$time_save')");
}

$insert_member_request_join = new db_query("INSERT INTO `member_request_join`(`id_user`,`id_group`,`request_time`)VALUES('$join_id_user','$join_id_group','$time_save')");




?>
<?php
require_once '../config/config.php';
$ud_id_user = $_SESSION['login']['id'];
$ud_id_com = $_SESSION['login']['id_com'];
$ud_id_group = getValue("ud_id_group","int","POST",0);
$ud_ques = getValue("ud_ques","int","POST",0);


$ud_option = getValue("ud_option","int","POST",0);
$ud_title = getValue("ud_title","str","POST","");
$name_check2 = getValue("name_check2","arr","POST","");
if ($name_check2 != "") {
	$name_check2 = implode(',', $name_check2);
}else{
	$name_check2 = "";
}


$name_radio2 = getValue("name_radio2","arr","POST","");
if ($name_radio2 != "") {
	$name_radio2 = implode(',', $name_radio2);
}else{
	$name_radio2 = "";
}


$time_update = time();

if($ud_title != ""){
	if($ud_option == 1){
		$update_question = new db_query("UPDATE `member_question` SET `question_type` = '$ud_option', `title` = '$ud_title',`updated_at` = '$time_update' WHERE `id` = '$ud_ques' AND `id_group` = '$ud_id_group' AND `id_user` = '$ud_id_user'");
	}else if($ud_option == 2){
		$update_question = new db_query("UPDATE `member_question` SET `question_type` = '$ud_option', `title` = '$ud_title',`name_checkbox` = '$name_check2',`updated_at` = '$time_update' WHERE `id` = '$ud_ques' AND `id_group` = '$ud_id_group' AND `id_user` = '$ud_id_user'");
	}else if($ud_option == 3){
		$update_question = new db_query("UPDATE `member_question` SET `question_type` = '$ud_option', `title` = '$ud_title',`name_radio` = '$name_radio2',`updated_at` = '$time_update' WHERE `id` = '$ud_ques' AND `id_group` = '$ud_id_group' AND `id_user` = '$ud_id_user'");
	}
	
}else{
	echo "Vui lòng nhập Câu hỏi";
}

?>
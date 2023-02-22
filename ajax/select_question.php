<?php
require_once '../config/config.php';
$ques_id_user = getValue("ques_id_user","int","POST",0);
$ques_id_com = getValue("ques_id_com","int","POST",0);
$ques_id_group = getValue("ques_id_group","int","POST",0);

$ques_option = getValue("ques_option","int","POST",0);
$ques_title = getValue("ques_title","str","POST","");

// $checkbox_ar = getValue("checkbox_ar","arr","POST","");
// $checkbox_ar =  implode(',', $checkbox_ar);

$name_check = getValue("name_check","arr","POST","");
$name_check =  implode(',', $name_check); 

// $radio_ar = getValue("radio_ar","arr","POST","");
// $radio_ar =  implode(',', $radio_ar);

$name_radio = getValue("name_radio","arr","POST","");
$name_radio =  implode(',', $name_radio);

$created_at = time();
$updated_at = time();


if($ques_title != ""){
	if($ques_option == 1){
		$is_question = new db_query("INSERT INTO `member_question`(`id_user`,`id_company`,`id_group`,`question_type`,`title`,`created_at`,`updated_at`)VALUES('$ques_id_user','$ques_id_com','$ques_id_group','$ques_option','$ques_title','$created_at','$updated_at')");
	}else if($ques_option == 2){
		$is_question = new db_query("INSERT INTO `member_question`(`id_user`,`id_company`,`id_group`,`question_type`,`title`,`name_checkbox`,`created_at`,`updated_at`)VALUES('$ques_id_user','$ques_id_com','$ques_id_group','$ques_option','$ques_title','$name_check','$created_at','$updated_at')");
	}else if($ques_option == 3){
		$is_question = new db_query("INSERT INTO `member_question`(`id_user`,`id_company`,`id_group`,`question_type`,`title`,`name_radio`,`created_at`,`updated_at`)VALUES('$ques_id_user','$ques_id_com','$ques_id_group','$ques_option','$ques_title','$name_radio','$created_at','$updated_at')");
	}
}


?>
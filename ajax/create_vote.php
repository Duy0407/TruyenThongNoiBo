<?php
require_once '../config/config.php';
$type = getValue('type','int','POST','');
$new_title = getValue('new_title','str','POST','');
$check[] = $new_title;
$content = getValue('content','str','POST','');
$check[] = $content;
$vote_option = getValue('vote_option','str','POST','');
$check[] = $vote_option;
$id_user_tags = getValue('id_user_tags','str','POST','');
$check[] = $id_user_tags;
$time = getValue('time','str','POST','');
$check[] = $time;
if ($time != "") {
	$time = strtotime($time);
}

$data = [
	'id_company' => $_SESSION['login']['id_com'],
	'new_title'=>$new_title,
	'content'=>$content,
	'id_user_tags'=>$id_user_tags,
	'author'=>$_SESSION['login']['id'],
	'new_type'=>7,
	'author_type'=>$_SESSION['login']['user_type'],
	'created_at'=>time(),
	'updated_at'=>time()
];
add('new_feed',$data);
$new_id = mysql_insert_id();

$data2['id_new'] = $new_id;
$data2['time'] = $time;
$vote_option = explode(",", $vote_option);
$link_file = "../img/new_feed/vote/";
if (!is_dir($link_file.$_SESSION['login']['id'])) {
	mkdir($link_file.$_SESSION['login']['id'], 0777, true);
}

for ($i=0; $i < count($vote_option); $i++) { 
	$data2['answer'] = $vote_option[$i];
	if (isset($_FILES['file_option']['name'][$i])) {
		$duoi = explode('/',$_FILES['file_option']['name'][$i]);
		$duoi = $duoi[(count($duoi) - 1)];
		$name_file = rand() . "." . $duoi;
		$tmp_name = $_FILES['file_option']['tmp_name'][$i];
		move_uploaded_file($tmp_name,$link_file.$_SESSION['login']['id']."/".$name_file);
		$data2['file'] = $name_file;
	}else{
		$data2['file'] = "";
	}
	add('tbl_voted',$data2);
}
echo json_encode([
	'result'=>true
]);
?>
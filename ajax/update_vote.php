<?php
require_once '../config/config.php';
$new_id = getValue('new_id','str','POST','');
$check[] = $new_id;
$dataId = [
	'new_id'=>$new_id
];
$new_title = getValue('new_title','str','POST','');
$data['new_title'] = $new_title;
$check[] = $new_title;
$content = getValue('content','str','POST','');
$data['content'] = $content;
$check[] = $content;
$id_user_tags = getValue('id_user_tags','str','POST','');
$data['id_user_tags'] = $id_user_tags;
$check[] = $id_user_tags;
$time = getValue('time','str','POST','');
$check[] = $time;
$data2['time'] = strtotime($time);
$vote_option_daco = getValue('vote_option_daco','str','POST','');
$vote_option_daco = explode(",", $vote_option_daco);
$check[] = $vote_option_daco;
$vote_option_chuaco = getValue('vote_option_chuaco','str','POST','');

$data['updated_at'] = time();

update('new_feed',$data,$dataId);

$db_vote = new db_query("SELECT id FROM tbl_voted WHERE id_new = $new_id");
$vote_id = [];
$j = 0;
while($row_vote = mysql_fetch_array($db_vote->result)){
	$vote_id[$j] = $row_vote['id'];
	$j++;
}
$link_file = "../img/new_feed/vote/";
for ($i=0; $i < count($vote_option_daco); $i++) { 
	$dataId2 = [
		'id'=>$vote_id[$i]
	];
	$data2['answer'] = $vote_option_daco[$i];
	$db_file = new db_query("SELECT file FROM tbl_voted WHERE id = " . $vote_id[$i]);
	$row_file = mysql_fetch_array($db_file->result);
	if (isset($_FILES['file_option_daco']['name'][$i])) {
		if ($row_file['file'] != "") {
			unlink($link_file.$_SESSION['login']['id']."/".$row_file['file']);
		}
		$duoi = explode('/', $_FILES['file_option_daco']['type'][$i]);
		$duoi = $duoi[(count($duoi) - 1)];
		$name_file = rand() . "." . $duoi;
		$tmp_name = $_FILES['file_option_daco']['tmp_name'][$i];
		move_uploaded_file($tmp_name,$link_file.$_SESSION['login']['id']."/".$name_file);
		$data2['file'] = $name_file;
	}else{
		$data2['file'] = $row_file['file'];
	}
	update('tbl_voted',$data2,$dataId2);
}

if ($vote_option_chuaco != "") {
	$vote_option_chuaco = explode(",", $vote_option_chuaco);
	for ($i=0; $i < count($vote_option_chuaco); $i++) { 
		$data2['answer'] = $vote_option_chuaco[$i];
		$data2['id_new'] = $new_id;
		if (isset($_FILES['file_option_chuaco']['name'][$i])) {
			$duoi = explode('/', $_FILES['file_option_chuaco']['type'][$i]);
			$duoi = $duoi[(count($duoi) - 1)];
			$name_file = rand() . "." . $duoi;
			$tmp_name = $_FILES['file_option_chuaco']['tmp_name'][$i];
			move_uploaded_file($tmp_name,$link_file.$_SESSION['login']['id']."/".$name_file);
			$data2['file'] = $name_file;
		}else{
			$data2['file'] = "";
		}
		add('tbl_voted',$data2);
	}
}
echo json_encode([
	'result'=>true
]);
?>
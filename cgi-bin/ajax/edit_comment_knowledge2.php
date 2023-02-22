<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$content = getValue('content','str','POST','');
if ($id == 0 || $content == "") {
	header("Location: /");
}else{
	$db_check = new db_query("SELECT * FROM comment_knowledge WHERE id = $id AND id_user = " . $_SESSION['login']['id']);
	if (mysql_num_rows($db_check->result) == 0) {
		echo json_encode([
			'result'=>false
		]);
	}else{
		$dataId = [
			'id'=>$id
		];
		$data = [
			'content'=>$content
		];
		update('comment_knowledge',$data,$dataId);
		echo json_encode([
			'result'=>true
		]);
	}
}
?>
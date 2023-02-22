<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
if ($id == 0) {
	header("Location: /");
}else{
	$db_comment = new db_query("SELECT * FROM comment_knowledge WHERE id = $id AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
	if (mysql_num_rows($db_comment->result) == 0) {
		echo json_encode([
			'result'=>false
		]);
	}else{
		$row = mysql_fetch_array($db_comment->result);
		echo json_encode([
			'result'=>true,
			'data'=>$row
		]);
	}
}
?>
<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$db_check = new db_query("SELECT * FROM comment_knowledge WHERE id = $id AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
if (mysql_num_rows($db_check->result) == 0) {
	if ($_SESSION['login']['user_type'] == 1) {
		$id_company = $_SESSION['login']['id'];
	}else{
		require_once '../api/api_ep.php';
		$id_company = $data_ep[$_SESSION['login']['id']]->com_id;
	}
	$db_check = new db_query("SELECT * FROM comment_knowledge WHERE id = $id AND id_company = $id_company");
	if (mysql_num_rows($db_check->result) == 0) {
		$check_config = 0;
	}else{
		if ($_SESSION['login']['user_type'] == 1) {
			$check_config = 1;
		}else{
			$check_config = check_config($_SESSION['login']['id'],4,'delete');
		}
		if ($check_config == 1) {
			$qr_del = new db_query("DELETE FROM comment_knowledge WHERE id = $id");
			echo json_encode([
				'result'=>true
			]);
		}else{
			echo json_encode([
				'result'=>false
			]);
		}
	}
	echo json_encode([
		'result'=>false
	]);
}else{
	$qr_del = new db_query("DELETE FROM comment_knowledge WHERE id = $id");
	echo json_encode([
		'result'=>true
	]);
}
?>
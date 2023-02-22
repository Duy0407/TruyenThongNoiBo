<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$check[] = $id;
$val = checkPost($check);
if ($val == 1) {
	header("Location: /");
}
if ($_SESSION['login']['user_type'] = 1) {
	$id_company = $_SESSION['login']['id'];
}else{
	require_once '../api/api_ep.php';
	$id_company = $data_ep[$_SESSION['login']['id']]->com_id;
}
$db_knowledge_answer = new db_query("SELECT * FROM knowledge_answer WHERE id = $id AND id_company = $id_company");
if (mysql_num_rows($db_knowledge_answer->result) == 0) {
	echo json_encode([
		'result'=>false
	]);
}else{
	if ($_SESSION['login']['user_type'] == 2) {
		$check_config = check_config($_SESSION['login']['id'],4,'delete');
	}else if ($_SESSION['login']['user_type'] == 1){
		$check_config = 1;
	}
}
if ($check_config == 1) {
	$db_del = new db_query("DELETE FROM knowledge_answer WHERE id = $id");
	echo json_encode([
		'result'=>true
	]);
}else if ($check_config == 0) {
	echo json_encode([
		'result'=>false
	]);
}
?>
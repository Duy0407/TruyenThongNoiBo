<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
if ($id == 0) {
	header("Location: /");
}
if ($_SESSION['login']['user_type'] == 1) {
	$id_company = $_SESSION['login']['id'];
}else if($_SESSION['login']['user_type'] == 2){
	$access_token   = $_SESSION['login']['acc_token'];
	$header[]       = 'Authorization: '.$access_token.'';
	require '../api/api_nv.php';
	$id_company = $data[$_SESSION['login']['id']]->com_id;
}
$db_check = new db_query("SELECT * FROM knowledge WHERE id_company = $id_company AND id = $id");
if (mysql_num_rows($db_check->result) == 0) {
	echo json_encode([
		'result'=>false
	]);
}else{
	$data = [
		'delete'=>1,
		'updated_at'=>time()
	];

	$dataId = [
		'id'=>$id
	];
	update('knowledge',$data,$dataId);
	echo json_encode([
		'result'=>true
	]);
}
?>
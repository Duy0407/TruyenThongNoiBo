<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
if ($id == 0) {
	header("Location: /");
}
$db_knowledge = new db_query("SELECT * FROM knowledge WHERE id = $id");
if (mysql_num_rows($db_knowledge->result) == 0) {
	echo json_encode([
		'result'=>false
	]);
}else{
	$row = mysql_fetch_array($db_knowledge->result);
	echo json_encode([
		'data'=>$row,
		'result'=>true
	]);
}
?>
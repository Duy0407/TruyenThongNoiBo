<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$db_doc = new db_query("SELECT * FROM knowledge WHERE id = $id");
$row = mysql_fetch_array($db_doc->result);
$data = $row;
echo json_encode([
	'data'=>$data
]);
?>
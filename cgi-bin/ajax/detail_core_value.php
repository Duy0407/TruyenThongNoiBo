<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$db_core_value = new db_query("SELECT * FROM core_value WHERE id = $id ORDER BY id DESC");
$row = mysql_fetch_array($db_core_value->result);
echo json_encode([
	'data'=>$row
]);
?>
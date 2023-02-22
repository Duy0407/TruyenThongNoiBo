<?php
require_once '../config/config.php';
$user_id = getValue('user_id','arr','POST','');
$db_config = new db_query("SELECT * FROM config WHERE id_employee = " . $user_id[0]);
$data = [];
$i = 0;
while($row = mysql_fetch_array($db_config->result)){
	$data[$i] = [
		'id_module' => $row['id_module'],
		'create' => $row['create'],
		'delete' => $row['delete'],
		'seen' => $row['seen'],
	];
	$i++;
}

echo json_encode($data);
?>
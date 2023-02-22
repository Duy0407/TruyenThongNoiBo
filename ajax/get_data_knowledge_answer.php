<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');

$db = new db_query("SELECT * FROM knowledge_answer WHERE id = $id");
$row = mysql_fetch_array($db->result);
$row['created_at'] = date('H:i, d/m/Y', $row['created_at']);

echo json_encode($row);
?>
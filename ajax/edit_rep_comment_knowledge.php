<?php
require_once '../config/config.php';

$id = getValue('id','int','POST','');

$db = new db_query("SELECT * FROM comment_knowledge WHERE id = $id");
$row = mysql_fetch_array($db->result);
echo json_encode([
  'data' => $row
]);
?>
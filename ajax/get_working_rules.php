<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$db = new db_query("SELECT * FROM working_rules WHERE id = $id");
$arr = [];
$row = mysql_fetch_array($db->result);
$arr = $row;
echo json_encode([
    'data' => $arr
]);
?>
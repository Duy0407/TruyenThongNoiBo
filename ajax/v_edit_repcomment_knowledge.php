<?php
require_once '../config/config.php';

$content = getValue('content','str','POST','');

$id = getValue('id','int','POST','');

$dataId = [
  'id' => $id
];

$data = [
  'content' => $content
];

update('comment_knowledge',$data,$dataId);

$db = new db_query("SELECT * FROM comment_knowledge WHERE id = $id");
$row = mysql_fetch_array($db->result);

echo json_encode([
  'data' => $row
]);
?>
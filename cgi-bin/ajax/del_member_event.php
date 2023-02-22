<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$db_del = new db_query("DELETE FROM event_join WHERE id = $id");
echo json_encode([
  'result' => true
]);
?>
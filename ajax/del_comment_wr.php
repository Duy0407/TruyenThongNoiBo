<?php
require_once '../config/config.php';

$id = getValue('id','int','POST','');
if($id == 0){
  header("Location: /");
}

$db_del = new db_query("DELETE FROM comment_working_rules WHERE id = $id");
echo json_encode([
  'result' => true
]);
?>
<?php
require_once '../config/config.php';
$user_id = $_SESSION['login']['id'];
$id_user_tag = getValue('id','int','POST','');
$db_nickname = new db_query("SELECT * FROM nickname WHERE id_user_tag = $id_user_tag AND id_user = $user_id");
if (mysql_num_rows($db_nickname->result) > 0) {
  $row = mysql_fetch_array($db_nickname->result);
  $nickname = $row['nick_name'];
}else{
  $nickname = "";
}

echo json_encode([
  'result' => true,
  'nickname' => $nickname,
  'id_user_tag' => $id_user_tag
]);
?>
<?php
require_once '../config/config.php';
$id_user = $_SESSION['login']['id'];
$id_user_tag = getValue('id_user_tag','int','POST','');
$type_user_tag = getValue('type_user_tag','int','POST','');
$nickname = getValue('nickname','str','POST','');
$db_nickname = new db_query("SELECT * FROM nickname WHERE id_user = $id_user AND id_user_tag = $id_user_tag AND type_user_tag	= $type_user_tag AND 	user_type = " . $_SESSION['login']['user_type']);
if (mysql_num_rows($db_nickname->result) == 0) {
  $data = [
    'id_user' => $id_user,
    'user_type' => $_SESSION['login']['user_type'],
    'id_user_tag' => $id_user_tag,
    'type_user_tag' => $type_user_tag,
    'nick_name' => $nickname,
    'created_at' => time(),
    'updated_at' => time()
  ];

  add('nickname', $data);
}else{
  $row = mysql_fetch_array($db_nickname->result);
  $id = $row['id'];
  $dataId = [
    'id' => $id
  ];

  $data = [
    'nick_name' => $nickname,
    'updated_at' => time()
  ];

  update('nickname', $data, $dataId);
}
echo json_encode([
  'result' => true
])
?>
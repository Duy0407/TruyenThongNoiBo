<?php
require_once '../config/config.php';
$room = getValue('room','int','POST','');
$user_type = $_SESSION['login']['user_type'];
$user_id = $_SESSION['login']['id'];
$db_room = new db_query("SELECT * FROM room_chat WHERE (id_user1 = $user_id AND id = $room AND user_type1 = $user_type) OR (id_user2 = $user_id AND id = $room AND user_type2 = $user_type)");

if (mysql_num_rows($db_room->result) > 0) {
  echo json_encode([
    'result' => true
  ]);
}else{
  echo json_encode([
    'result' => false
  ]);
}
?>

<?php
require_once '../config/config.php';
$id_user = getValue('id_user','int','POST','');
$user_type = $_SESSION['login']['user_type'];
$db_room = new db_query("SELECT * FROM room_chat WHERE (id_user1 = $id_user AND user_type1 = $user_type) OR (id_user2 = $id_user AND user_type2 = $user_type)");
$arr_room = [];
while ($row = mysql_fetch_array($db_room->result)) {
	$arr_room[] = $row['id'];
}

echo json_encode([
	'data' => $arr_room
]);
?>
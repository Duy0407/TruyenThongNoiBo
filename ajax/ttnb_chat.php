<?php
require_once '../config/config.php';
$content =  getValue('content','str','POST','');
$db_room = new db_query("SELECT * FROM chat WHERE id_user = " . $_SESSION['login']['id']);
if (mysql_nums_row($db_room->result) == 0) {
  $room = rand(1,1000000000);
  $db_check_room = new db_query("SELECT * FROM chat WHERE id_user = " . $_SESSION['login']['id'])
}
?>
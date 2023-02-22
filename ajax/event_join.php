<?php
require_once '../config/config.php';
$id_event = getValue('id_event','int','POST','');
if ($id_event == 0) {
	header("Location: /");
}
$db_event_join = new db_query("SELECT * FROM event_join WHERE id_event = $id_event AND id_employee = " . $_SESSION['login']['id']);
if (mysql_num_rows($db_event_join->result) == 0) {
	$data = [
		'id_employee'=>$_SESSION['login']['id'],
		'id_event'=>$id_event,
		'user_type'=>$_SESSION['login']['user_type']
	];
	add('event_join',$data);
	echo json_encode([
		'result'=>true,
		'msg'=>"Hủy tham gia"
	]);
}else{
	$db_del = new db_query("DELETE FROM event_join WHERE id_event = $id_event AND id_employee = " . $_SESSION['login']['id']);
	echo json_encode([
		'result'=>true,
		'msg'=>"Tham gia"
	]);
}
?>
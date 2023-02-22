<?php
require_once '../config/config.php';
$access_token   = $_SESSION['login']['acc_token'];
$header[]       = 'Authorization: '.$access_token.'';
require_once '../api/api_nv.php';
$id = getValue('id','int','POST','');
if ($id == 0) {
	header("Location: /");
}else{
	$db = new db_query("SELECT * FROM mail_from_ceo WHERE id = $id");
	$row = mysql_fetch_array($db->result);
	if ($row['user_type'] == 1) {
		$row['user_sent'] = array_values($data_ep)[0]->com_name;
	}else{
		$row['user_sent'] = $data_ep[$row['user_sent']]->ep_name;
	}
	$row['created_at'] = date("h:i d.m.Y",$row['created_at']);
	echo json_encode([
		'data'=>$row
	]);
}
?>
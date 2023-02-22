<?php
require_once '../config/config.php';
$start = getValue('start','int','POST','');
$id_com = $_SESSION['login']['id_com'];
$db_notify = new db_query("SELECT * FROM new_feed WHERE new_type = 1 AND id_company = $id_com ORDER BY new_id DESC LIMIT $start,3");
$html = "";
while ($row_notify = mysql_fetch_array($db_notify->result)) {
	$html = $html . '<div class="tren v_tren_notify00">
	<p>Thông báo: ' . $row_notify['new_title'].'</p>
	<p>'.date('H', $row_notify['created_at']) . "h" . date('i d.m.Y', $row_notify['created_at']).'</p>
	</div>';
}

$start = $start + 3;
$db_notify2 = new db_query("SELECT * FROM new_feed WHERE new_type = 1 AND id_company = $id_com ORDER BY new_id DESC LIMIT $start,3");
if (mysql_num_rows($db_notify2->result) == 0) {
	$result = false;
}else{
	$result = true;
}
echo json_encode([
	'html' => $html,
	'result' => $result
])
?>
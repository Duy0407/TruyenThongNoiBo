<?php
require_once '../config/config.php';

$pick_id_user = getValue("pick_id_user","int","POST",0);
$pick_id_group = getValue("pick_id_group","int","POST",0);

$db_limit = new db_query("SELECT * FROM `gioi_han_thanh_vien` WHERE `id_group` = '$pick_id_group' AND `id_user_limit` = '$pick_id_user'");
// echo "SELECT * FROM `gioi_han_thanh_vien` WHERE `id_group` = '$pick_id_group' AND `id_user_limit` = '$pick_id_user'";

// if (mysql_num_rows($db_limit->result) > 0) {
	$db_limit_assoc = mysql_fetch_assoc($db_limit->result);
	$result = [
		'result' => true,
		'data' => $db_limit_assoc,
	];
// }
echo json_encode($result);

?>
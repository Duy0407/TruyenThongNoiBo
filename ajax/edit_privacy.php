<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$check_privacy = getValue("check_privacy","int","POST",0);

$update_privacy_group = new db_query("UPDATE `group` SET `group_mode` = '$check_privacy' WHERE `id` = '$id_group'");
echo json_encode([
	'result' => true,
	'msg' => "Cập nhật thành công"
]);
?>
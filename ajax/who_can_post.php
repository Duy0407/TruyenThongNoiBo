<?php
require_once '../config/config.php';
$id_group = getValue("id_group","int","POST",0);
$nd_thaoluan = getValue("nd_thaoluan","int","POST",0);


$update_who_can_post = new db_query("UPDATE `group` SET `who_can_post` = '$nd_thaoluan' WHERE `id` = '$id_group'");
echo json_encode([
	'result' => true,
	'msg' => "Cập nhật thành công"
]);
?>
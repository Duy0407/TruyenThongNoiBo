<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$pd_post_edit = getValue("pd_post_edit","int","POST",0);

$update_pd_post_edit = new db_query("UPDATE `group` SET `pheduyet_noidung_edit` = '$pd_post_edit' WHERE `id` = '$id_group'");
echo json_encode([
	'result' => true,
	'msg' => "Cập nhật thành công"
]);
?>
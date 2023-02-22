<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$qltv = getValue("qltv","int","POST",0);

$update_qltv = new db_query("UPDATE `group` SET `pheduyet_yc_thanhvien` = '$qltv' WHERE `id` = '$id_group'");
echo json_encode([
	'result' => true,
	'msg' => "Cập nhật thành công"
]);
?>
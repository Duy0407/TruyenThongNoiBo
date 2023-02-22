<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$an_hien = getValue("an_hien","int","POST",0);

$update_hide_show_group = new db_query("UPDATE `group` SET `hide_show` = '$an_hien' WHERE `id` = '$id_group'");
echo json_encode([
	'result' => true,
	'msg' => "Cập nhật thành công"
]);
?>
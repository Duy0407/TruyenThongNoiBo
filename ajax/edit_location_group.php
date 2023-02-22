<?php
require_once '../config/config.php';


$text_vitri = getValue("text_vitri","str","POST","");
$id_group = getValue("id_group","int","POST",0);

$update_location_group = new db_query("UPDATE `group` SET `group_location` = '$text_vitri' WHERE `id` = '$id_group'");
echo json_encode([
	'result' => true,
	'msg' => "Cập nhật thành công"
]);
?>
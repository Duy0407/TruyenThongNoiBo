<?php
require_once '../config/config.php';
$id_group = getValue("id_group","int","POST",0);
$show_introduce = getValue("show_introduce","int","POST",0);
$introduce = getValue("introduce","str","POST","");
$show_rules = getValue("show_rules","int","POST",0);

if ($introduce) {
	$data = ['introduce' => $introduce, 'show_rules' => $show_rules];
} else {
	$data = ['show_introduce' => $show_introduce];
} 
update('`group`', $data, ['id' => $id_group]);
echo json_encode([
	'result' => true,
	'msg' => "Cập nhật thành công"
]);
?>
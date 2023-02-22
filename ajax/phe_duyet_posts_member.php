<?php
require_once '../config/config.php';

$id_group = getValue("id_group","int","POST",0);
$pd_post = getValue("pd_post","int","POST",0);

$update_pheduyet_posts_member = new db_query("UPDATE `group` SET `Pheduyet_post_member` = '$pd_post' WHERE `id` = '$id_group'");
echo json_encode([
	'result' => true,
	'msg' => "Cập nhật thành công"
]);
?>
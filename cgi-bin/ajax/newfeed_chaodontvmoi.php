<?php
require_once '../config/config.php';
$id_user_tags = getValue('id_users_tags', 'arr', 'POST', '');
$position = getValue('position', 'int', 'POST', '');
$type = getValue('type','int','POST','');
$id_user_tags = implode(",", $id_user_tags);
$check[] = $id_user_tags;
$content = getValue('content', 'str', 'POST', '');
$check[] = $content;
$val = checkPost($check);
if ($val == 1) {
	header("Location: /");
}

$data = [
	'id_company' => $_SESSION['login']['id_com'],
	'author' => $_SESSION['login']['id'],
	'new_type' => 2,
	'id_user_tags' => $id_user_tags,
	'author_type'=>$_SESSION['login']['user_type'],
	'position' => $position,
	'type' => $type,
	'content' => $content,
	'created_at' => time(),
	'updated_at' => time()
];
add('new_feed', $data);
$new_id = mysql_insert_id();
echo json_encode([
	'result' => true
]);
?>
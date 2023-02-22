<?php
require_once '../config/config.php';
$type = getValue('type','str','POST','');
$new_title = getValue('new_title','str','POST','');
$check[] = $new_title;
$content = getValue('content','str','POST','');
$check[] = $content;
$id_user_tags = getValue('id_user_tags','str','POST','');
$check[] = $id_user_tags;
$position = getValue('position','str','POST','');
$check[] = $position;
$discuss_mode = getValue('discuss_mode','str','POST','');
$check[] = $discuss_mode;

$val = checkPost($check);
if ($val == 1) {
	header("Location: /");
}else if (!isset($_FILES['file'])) {
	header("Location: /");
}
if (isset($_FILES['file'])) {
	$duoi = explode('.', $_FILES['file']['name']);
	$duoi = $duoi[(count($duoi) - 1)];
	$_FILES['file']['name'] = rand() . "." . $duoi;
	$tmp_name = $_FILES['file']['tmp_name'];
	$dir = "../img/new_feed/discuss/";
	if (!is_dir($dir . $_SESSION['login']['id'])) {
		mkdir($dir . $_SESSION['login']['id'], 0777, true);
	}
	move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['file']['name']);
}
$data = [
	'id_company' => $_SESSION['login']['id_com'],
	'new_title'=>$new_title,
	'content'=>$content,
	'author'=>$_SESSION['login']['id'],
	'author_type'=>$_SESSION['login']['user_type'],
	'new_type'=>5,
	'position'=>$position,
	'type' => $type,
	'file'=>$_FILES['file']['name'],
	'id_user_tags'=>$id_user_tags,
	'created_at'=>time(),
	'updated_at'=>time()
];
add('new_feed',$data);
$new_id = mysql_insert_id();

$data2 = [
	'new_id'=>$new_id,
	'discuss_mode'=>$discuss_mode
];

add('discuss',$data2);
echo json_encode([
	'result'=>true
]);
?>
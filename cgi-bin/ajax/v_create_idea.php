<?php
require_once '../config/config.php';
$type = getValue('type','int','POST','');
$new_title = getValue('new_title','str','POST','');
$check[] = $new_title;
$content = getValue('content','str','POST','');
$check[] = $content;
$position = getValue('position','int','POST','');
$check[] = $position;
$val = checkPost($check);
if ($val == 1) {
	header("Location: /");
}

$duoi = explode('.', $_FILES['file']['name']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['file']['name'] = rand() . "." . $duoi;
$tmp_name = $_FILES['file']['tmp_name'];
$link_file = "../img/new_feed/idea/";
if (!is_dir($link_file.$_SESSION['login']['id'])) {
	mkdir($link_file.$_SESSION['login']['id'],0777,true);
}
move_uploaded_file($tmp_name,$link_file.$_SESSION['login']['id']."/".$_FILES['file']['name']);

$data = [
	'id_company' => $_SESSION['login']['id_com'],
	'new_title'=>$new_title,
	'content'=>$content,
	'position'=>$position,
	'author'=>$_SESSION['login']['id'],
	'author_type'=>$_SESSION['login']['user_type'],
	'file' => $_FILES['file']['name'],
	'type' => $type,
	'new_type'=>6,
	'created_at'=>time(),
	'updated_at'=>time()
];
add("new_feed",$data);
echo json_encode([
	'result'=>true
]);
?>
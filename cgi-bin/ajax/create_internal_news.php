<?php
require_once '../config/config.php';
$position = getValue('position','int','POST','');
$type = getValue('type','int','POST','');
$new_title = getValue('new_title','str','POST','');
$check[] = $new_title;
$content = getValue('content','str','POST','');
$check[] = $content;
$val = checkPost($check);
if ($val == 1 || !isset($_FILES['cover_image']) || !isset($_FILES['file'])) {
	header("Location: /");
}else if(!isset($_SESSION['login'])){
	header("Location: /");
}

if (isset($_FILES['cover_image'])) {
	//Ảnh bìa
	$duoi = explode('.', $_FILES['cover_image']['name']);
	$duoi = $duoi[(count($duoi) - 1)];
	$_FILES['cover_image']['name'] = rand() . "." . $duoi;
	$tmp_name1 = $_FILES['cover_image']['tmp_name'];
	$dir1 = "../img/new_feed/internal_news/cover_image/";
	if (!is_dir($dir1 . $_SESSION['login']['id'])) {
		mkdir($dir1 . $_SESSION['login']['id'], 0777, true);
	}
	move_uploaded_file($tmp_name1, $dir1 . $_SESSION['login']['id'] . "/" . $_FILES['cover_image']['name']);
}

if (isset($_FILES['file'])) {
	//Tệp đính kèm
	$duoi = explode('.', $_FILES['file']['name']);
	$duoi = $duoi[(count($duoi) - 1)];
	$_FILES['file']['name'] = rand() . "." . $duoi;
	$tmp_name1 = $_FILES['file']['tmp_name'];
	$dir1 = "../img/new_feed/internal_news/file/";
	if (!is_dir($dir1 . $_SESSION['login']['id'])) {
		mkdir($dir1 . $_SESSION['login']['id'], 0777, true);
	}
	move_uploaded_file($tmp_name1, $dir1 . $_SESSION['login']['id'] . "/" . $_FILES['file']['name']);
}

$data = [
	'id_company' => $_SESSION['login']['id_com'],
	'new_title'=>$new_title,
	'content'=>$content,
	'new_type'=>9,
	'type'=>$type,
	'position' => $position,
	'author'=>$_SESSION['login']['id'],
	'file'=> $_FILES['file']['name'],
	'author_type'=>$_SESSION['login']['user_type'],
	'created_at'=>time(),
	'updated_at'=>time()
];

add('new_feed',$data);

$new_id = mysql_insert_id();

$data2 = [
	'id_new'=>$new_id,
	'cover_image'=>$_FILES['cover_image']['name']
];
add("internal_news",$data2);
echo json_encode([
	'result'=>true
]);
?>
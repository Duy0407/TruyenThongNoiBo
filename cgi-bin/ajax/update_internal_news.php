<?php
require_once '../config/config.php';
$new_id = getValue('new_id','str','POST','');
$check[] = $new_id;
$dataId1 = [
	'new_id'=>$new_id
];
$dataId2 = [
	'id_new'=>$new_id
];
$new_title = getValue('new_title','str','POST','');
$check[] = $new_title;
$data['new_title'] = $new_title;
$content = getValue('content','str','POST','');
$data['content'] = $content;
$check[] = $content;
$val = checkPost($check);
if ($val == 1) {
	header("Location: /");
}else if(!isset($_SESSION['login'])){
	header("Location: /");
}
$db_file = new db_query("SELECT * FROM new_feed INNER JOIN internal_news ON new_feed.new_id = internal_news.id_new WHERE new_feed.new_id = $new_id");
$row_file = mysql_fetch_array($db_file->result);
if (isset($_FILES['cover_image'])) {
	unlink('../img/new_feed/internal_news/cover_image/' . $row_file['author'] .'/'. $row_file['cover_image']);
	//Ảnh bìa
	$duoi = explode('/', $_FILES['cover_image']['type']);
	$duoi = $duoi[(count($duoi) - 1)];
	$_FILES['cover_image']['name'] = rand() . "." . $duoi;
	$tmp_name1 = $_FILES['cover_image']['tmp_name'];
	$dir1 = "../img/new_feed/internal_news/cover_image/";
	if (!is_dir($dir1 . $_SESSION['login']['id'])) {
		mkdir($dir1 . $_SESSION['login']['id']);
	}
	move_uploaded_file($tmp_name1, $dir1 . $_SESSION['login']['id'] . "/" . $_FILES['cover_image']['name']);
	$data2['cover_image'] = $_FILES['cover_image']['name'];
	update('internal_news',$data2,$dataId2);
}

if (isset($_FILES['file'])) {
	unlink('../img/new_feed/internal_news/file/' . $row_file['author'] .'/'. $row_file['file']);
	//Tệp đính kèm
	$duoi = explode('/', $_FILES['file']['type']);
	$duoi = $duoi[(count($duoi) - 1)];
	$_FILES['file']['name'] = rand() . "." . $duoi;
	$tmp_name1 = $_FILES['file']['tmp_name'];
	$dir1 = "../img/new_feed/internal_news/file/";
	if (!is_dir($dir1 . $_SESSION['login']['id'])) {
		mkdir($dir1 . $_SESSION['login']['id']);
	}
	move_uploaded_file($tmp_name1, $dir1 . $_SESSION['login']['id'] . "/" . $_FILES['file']['name']);
	$data['file'] = $_FILES['file']['name'];
}
$data['updated_at'] = time();

update('new_feed',$data,$dataId1);

echo json_encode([
	'result'=>true
]);
?>
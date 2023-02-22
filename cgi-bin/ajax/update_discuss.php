<?php
require_once '../config/config.php';
$new_id = getValue('new_id','str','POST','');
$check[] = $new_id;
$dataId = [
	'new_id'=>$new_id
];
$new_title = getValue('new_title','str','POST','');
$check[] = $new_title;
$data['new_title'] = $new_title;
$content = getValue('content','str','POST','');
$check[] = $content;
$data['content'] = $content;
$position = getValue('position','str','POST','');
$check[] = $position;
$data['position'] = $position;
$id_user_tags = getValue('id_user_tags','str','POST','');
$check[] = $id_user_tags;
$data['id_user_tags'] = $id_user_tags;
$discuss_mode = getValue('discuss_mode','str','POST','');
$check[] = $discuss_mode;
$data2['discuss_mode'] = $discuss_mode;

$val = checkPost($check);
if ($val == 1) {
	header("Location: /");
}
if (isset($_FILES['file'])) {
	$db_file = new db_query("SELECT file FROM new_feed WHERE new_id = $new_id");
	$row_file = mysql_fetch_array($db_file->result);
	unlink("../img/new_feed/discuss/" . $_SESSION['login']['id'] . "/" . $row_file['file']);
	$duoi = explode('/', $_FILES['file']['type']);
	$duoi = $duoi[(count($duoi) - 1)];
	$_FILES['file']['name'] = rand() . "." . $duoi;
	$tmp_name = $_FILES['file']['tmp_name'];
	$dir = "../img/new_feed/discuss/";
	if (!is_dir($dir . $_SESSION['login']['id'])) {
		mkdir($dir . $_SESSION['login']['id']);
	}
	move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['file']['name']);
	$data['file'] = $_FILES['file']['name'];
}
$data['updated_at'] = time();
update('new_feed',$data,$dataId);

update('discuss',$data2,$dataId);
echo json_encode([
	'result'=>true
]);
?>
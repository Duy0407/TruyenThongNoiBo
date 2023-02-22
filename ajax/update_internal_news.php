<?php
require_once '../config/config.php';
$new_id = getValue('new_id','str','POST','');
$db_nf = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
$row = mysql_fetch_array($db_nf->result);
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


$data['updated_at'] = time();

$arr_update_internal_image = getValue('arr_update_internal_image','arr','POST','');
$arr_update_internal_image = explode(",", $arr_update_internal_image);


$arr_update_internal_file = getValue('arr_update_internal_file','arr','POST','');
$arr_update_internal_file = explode(",", $arr_update_internal_file);

$arr_update_internal_name_file = getValue('arr_update_internal_name_file','arr','POST','');
$arr_update_internal_name_file = explode(",", $arr_update_internal_name_file);

$arr_update_internal_name_img = getValue('arr_update_internal_name_img','arr','POST','');
$arr_update_internal_name_img = explode(",", $arr_update_internal_name_img);

$path_image0 = "";
if ($arr_update_internal_image[0] != "") {
	for ($i=0; $i < count($arr_update_internal_image); $i++) { 
		if ($i < count($arr_update_internal_image) - 1) {
			$path_image0 = $path_image0 . $arr_update_internal_image[$i] . "||";
		}else{
			$path_image0 = $path_image0 . $arr_update_internal_image[$i];
		}
	}
}


$path_file0 = "";
if ($arr_update_internal_file[0] != "") {
	for ($i=0; $i < count($arr_update_internal_file); $i++) { 
		if ($i < count($arr_update_internal_file) - 1) {
			$path_file0 = $path_file0 . $arr_update_internal_file[$i] . "||";
		}else{
			$path_file0 = $path_file0 . $arr_update_internal_file[$i];
		}
	}
}

$name_file_img0 = "";
if ($arr_update_internal_name_file[0] != "") {
	for ($i=0; $i < count($arr_update_internal_name_file); $i++) { 
		if ($i < count($arr_update_internal_name_file) - 1) {
			$name_file_img0 = $name_file_img0 . $arr_update_internal_name_file[$i] . "||";
		}else{
			$name_file_img0 = $name_file_img0 . $arr_update_internal_name_file[$i];
		}
	}
}

$name_file_img1 = "";
if ($arr_update_internal_name_img[0] != "") {
	for ($i=0; $i < count($arr_update_internal_name_img); $i++) { 
		if ($i < count($arr_update_internal_name_img) - 1) {
			$name_file_img1 = $name_file_img1 . $arr_update_internal_name_img[$i] . "||";
		}else{
			$name_file_img1 = $name_file_img1 . $arr_update_internal_name_img[$i];
		}
	}
}

$path0 = "";
if ($path_image0 == "" && $path_file0 != "") {
	$path0 = $path_file0;
}else if ($path_file0 == "" && $path_image0 != "") {
	$path0 = $path_image0;
}else if ($path_file0 != "" && $path_image0 != ""){
	$path0 = $path_file0 . "||" . $path_image0;
}

$name0 = "";
if ($name_file_img0 == "" && $name_file_img1 != "") {
	$name0 = $name_file_img1;
}else if ($name_file_img1 == "" && $name_file_img0 != "") {
	$name0 = $name_file_img0;
}else if ($name_file_img1 != "" && $name_file_img0 != ""){
	$name0 = $name_file_img0 . "||" . $name_file_img1;
}

$link_file = "../img/new_feed/internal_news/";
if (!is_dir($link_file.$row['author'] . "/file")) {
	mkdir($link_file.$row['author'] . "/file",0777,true);
}
$dir_file = $link_file.$row['author'] . "/file" . "/";

if (!is_dir($link_file.$row['author'] . "/image")) {
	mkdir($link_file.$row['author'] . "/image",0777,true);
}
$dir_image = $link_file.$row['author'] . "/image" . "/";

if (!is_dir($link_file.$row['author'] . "/video")) {
	mkdir($link_file.$row['author'] . "/video",0777,true);
}
$dir_video = $link_file.$row['author'] . "/video" . "/";

$path_file1 = "";

$path_image1 = "";

$name_file1 = "";

$name_image1 = "";

if (isset($_FILES['update_internal_file'])) {
	for ($i=0; $i < count($_FILES['update_internal_file']['name']); $i++) { 
		$duoi = explode(".", $_FILES['update_internal_file']['name'][$i]);
		$duoi = $duoi[count($duoi) - 1];

		$n_file = rand() . "." . $duoi;

		$dir_path_file = $dir_file . $n_file;

		move_uploaded_file($_FILES['update_internal_file']['tmp_name'][$i],$dir_path_file);

		if ($i == count($_FILES['update_internal_file']['name']) - 1) {
			$path_file1 = $path_file1 . $dir_path_file;
			$name_file1 = $name_file1 . $_FILES['update_internal_file']['name'][$i];
		}else{
			$path_file1 = $path_file1 . $dir_path_file . "||";
			$name_file1 = $name_file1 . $_FILES['update_internal_file']['name'][$i] . "||";
		}
	}
}

if (isset($_FILES['update_internal_image'])) {
	for ($i=0; $i < count($_FILES['update_internal_image']['name']); $i++) {
		$duoi = explode(".", $_FILES['update_internal_image']['name'][$i]);
		$duoi = $duoi[count($duoi) - 1];

		$n_file = rand() . "." . $duoi;
		if (preg_match('/image/', $_FILES['update_internal_image']['type'][$i])) {
			$dir_path_file = $dir_image . $n_file;
			move_uploaded_file($_FILES['update_internal_image']['tmp_name'][$i],$dir_path_file);
		}else{
			$dir_path_file = $dir_video . $n_file;
			move_uploaded_file($_FILES['update_internal_image']['tmp_name'][$i],$dir_path_file);
		}

		if ($i == count($_FILES['update_internal_image']['name']) - 1) {
			$path_image1 = $path_image1 . $dir_path_file;
			$name_image1 = $name_image1 . $_FILES['update_internal_image']['name'][$i];
		}else{
			$path_image1 = $path_image1 . $dir_path_file . "||";
			$name_image1 = $name_image1 . $_FILES['update_internal_image']['name'][$i] . "||";
		}
	}
}

$path1 = "";
$name1 = "";
if ($path_image1 == "" && $path_file1 != "") {
	$path1 = $path_file1;
}else if ($path_file1 == "" && $path_image1 != "") {
	$path1 = $path_image1;
}else if ($path_file1 != "" && $path_image1 != ""){
	$path1 = $path_file1 . "||" . $path_image1;
}

if ($name_image1 == "" && $name_file1 != "") {
	$name1 = $name_file1;
}else if ($name_file1 == "" && $name_image1 != "") {
	$name1 = $name_image1;
}else if ($name_file1 != "" && $name_image1 != ""){
	$name1 = $name_file1 . "||" . $name_image1;
}

$path = "";
$name = "";

if ($path0 == "" && $path1 != "") {
	$path = $path1;
}else if ($path0 != "" && $path1 == "") {
	$path = $path0;
}else if ($path0 != "" && $path1 != "") {
	$path = $path0 . "||" . $path1;
}

$data['file'] = $path;

if ($name0 == "" && $name1 != "") {
	$name = $name1;
}else if ($name0 != "" && $name1 == "") {
	$name = $name0;
}else if ($name0 != "" && $name1 != "") {
	$name = $name0 . "||" . $name1;
}

$data['name_file'] = $name;

update('new_feed',$data,$dataId1);

echo json_encode([
	'result'=>true
]);
?>
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


$link_file = "../img/new_feed/idea/";
if (!is_dir($link_file.$_SESSION['login']['id'])) {
	mkdir($link_file.$_SESSION['login']['id'],0777,true);
}
if (!is_dir($link_file.$_SESSION['login']['id'] . "/file")) {
	mkdir($link_file.$_SESSION['login']['id'] . "/file",0777,true);
}
$dir_file = $link_file.$_SESSION['login']['id'] . "/file" . "/";

if (!is_dir($link_file.$_SESSION['login']['id'] . "/image")) {
	mkdir($link_file.$_SESSION['login']['id'] . "/image",0777,true);
}
$dir_image = $link_file.$_SESSION['login']['id'] . "/image" . "/";

if (!is_dir($link_file.$_SESSION['login']['id'] . "/video")) {
	mkdir($link_file.$_SESSION['login']['id'] . "/video",0777,true);
}
$dir_video = $link_file.$_SESSION['login']['id'] . "/video" . "/";

$path_file = "";

$path_image = "";

$name_file = "";

$name_image = "";

if (isset($_FILES['file'])) {
	for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
		$duoi = explode(".", $_FILES['file']['name'][$i]);
		$duoi = $duoi[count($duoi) - 1];

		$n_file = rand() . "." . $duoi;

		$dir_path_file = $dir_file . $n_file;

		move_uploaded_file($_FILES['file']['tmp_name'][$i],$dir_path_file);

		if ($i == count($_FILES['file']['name']) - 1) {
			$path_file = $path_file . $dir_path_file;
			$name_file = $name_file . $_FILES['file']['name'][$i];
		}else{
			$path_file = $path_file . $dir_path_file . "||";
			$name_file = $name_file . $_FILES['file']['name'][$i] . "||";
		}
	}
}

if (isset($_FILES['image'])) {
	for ($i=0; $i < count($_FILES['image']['name']); $i++) {
		$duoi = explode(".", $_FILES['image']['name'][$i]);
		$duoi = $duoi[count($duoi) - 1];

		$n_file = rand() . "." . $duoi;
		if (preg_match('/image/', $_FILES['image']['type'][$i])) {
			$dir_path_file = $dir_image . $n_file;
			move_uploaded_file($_FILES['image']['tmp_name'][$i],$dir_path_file);
		}else{
			$dir_path_file = $dir_video . $n_file;
			move_uploaded_file($_FILES['image']['tmp_name'][$i],$dir_path_file);
		}

		if ($i == count($_FILES['image']['name']) - 1) {
				$path_image = $path_image . $dir_path_file;
				$name_image = $name_image . $_FILES['image']['name'][$i];
			}else{
				$path_image = $path_image . $dir_path_file . "||";
				$name_image = $name_image . $_FILES['image']['name'][$i] . "||";
			}
	}
}

if ($path_image == "" && $path_file != "") {
	$path = $path_file;
}else if ($path_file == "" && $path_image != "") {
	$path = $path_image;
}else{
	$path = $path_file . "||" . $path_image;
}


if ($name_image == "" && $name_file != "") {
	$name = $name_file;
}else if ($name_file == "" && $name_image != "") {
	$name = $name_image;
}else{
	$name = $name_file . "||" . $name_image;
}

$data = [
	'id_company' => $_SESSION['login']['id_com'],
	'new_title'=>$new_title,
	'content'=>$content,
	'position'=>$position,
	'author'=>$_SESSION['login']['id'],
	'author_type'=>$_SESSION['login']['user_type'],
	'type' => $type,
	'file' => $path,
	'name_file' => $name,
	'new_type'=>6,
	'created_at'=>time(),
	'updated_at'=>time()
];

add("new_feed",$data);

echo json_encode([
	'result'=>true
]);
?>
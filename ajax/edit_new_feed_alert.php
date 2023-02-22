<?php 
require_once "../config/config.php";

$new_id = getvalue('new_id','int','POST','');
$db_nf = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
$row = mysql_fetch_array($db_nf->result);
$dataId = [
    'new_id'=>$new_id
];
$check[] = $new_id;
$position = getValue('position','int','POST','');
$data['position'] = $position;
$check[] = $position;
$new_title = getValue('new_title','str','POST','');
$data['new_title'] = $new_title;
$check[] = $new_title;
$content = getValue('content','str','POST','');
$data['content'] = $content;
$check[] = $content;
$val = checkPost($check);
if ($val == 1) {
    header("Location: /");
}

$arr_update_notify_image = getValue('arr_update_notify_image','arr','POST','');
$arr_update_notify_image = explode(",", $arr_update_notify_image);


$arr_update_notify_file = getValue('arr_update_notify_file','arr','POST','');
$arr_update_notify_file = explode(",", $arr_update_notify_file);

$arr_update_notify_name_file = getValue('arr_update_notify_name_file','arr','POST','');
$arr_update_notify_name_file = explode(",", $arr_update_notify_name_file);

$arr_update_notify_name_img = getValue('arr_update_notify_name_img','arr','POST','');
$arr_update_notify_name_img = explode(",", $arr_update_notify_name_img);

$path_image0 = "";
if ($arr_update_notify_image[0] != "") {
    for ($i=0; $i < count($arr_update_notify_image); $i++) { 
        if ($i < count($arr_update_notify_image) - 1) {
            $path_image0 = $path_image0 . $arr_update_notify_image[$i] . "||";
        }else{
            $path_image0 = $path_image0 . $arr_update_notify_image[$i];
        }
    }
}

$path_file0 = "";
if ($arr_update_notify_file[0] != "") {
    for ($i=0; $i < count($arr_update_notify_file); $i++) { 
        if ($i < count($arr_update_notify_file) - 1) {
            $path_file0 = $path_file0 . $arr_update_notify_file[$i] . "||";
        }else{
            $path_file0 = $path_file0 . $arr_update_notify_file[$i];
        }
    }
}

$name_file_img0 = "";
if ($arr_update_notify_name_file[0] != "") {
    for ($i=0; $i < count($arr_update_notify_name_file); $i++) { 
        if ($i < count($arr_update_notify_name_file) - 1) {
            $name_file_img0 = $name_file_img0 . $arr_update_notify_name_file[$i] . "||";
        }else{
            $name_file_img0 = $name_file_img0 . $arr_update_notify_name_file[$i];
        }
    }
}

$name_file_img1 = "";
if ($arr_update_notify_name_img[0] != "") {
    for ($i=0; $i < count($arr_update_notify_name_img); $i++) { 
        if ($i < count($arr_update_notify_name_img) - 1) {
            $name_file_img1 = $name_file_img1 . $arr_update_notify_name_img[$i] . "||";
        }else{
            $name_file_img1 = $name_file_img1 . $arr_update_notify_name_img[$i];
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


$link_file = "../img/new_feed/alert/";
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

if (isset($_FILES['add_ud_notify_file'])) {
	for ($i=0; $i < count($_FILES['add_ud_notify_file']['name']); $i++) { 
		$duoi = explode(".", $_FILES['add_ud_notify_file']['name'][$i]);
		$duoi = $duoi[count($duoi) - 1];

		$n_file = rand() . "." . $duoi;

		$dir_path_file = $dir_file . $n_file;

		move_uploaded_file($_FILES['add_ud_notify_file']['tmp_name'][$i],$dir_path_file);

		if ($i == count($_FILES['add_ud_notify_file']['name']) - 1) {
			$path_file1 = $path_file1 . $dir_path_file;
			$name_file1 = $name_file1 . $_FILES['add_ud_notify_file']['name'][$i];
		}else{
			$path_file1 = $path_file1 . $dir_path_file . "||";
			$name_file1 = $name_file1 . $_FILES['add_ud_notify_file']['name'][$i] . "||";
		}
	}
}

if (isset($_FILES['add_ud_notify_image'])) {
	for ($i=0; $i < count($_FILES['add_ud_notify_image']['name']); $i++) {
		$duoi = explode(".", $_FILES['add_ud_notify_image']['name'][$i]);
		$duoi = $duoi[count($duoi) - 1];

		$n_file = rand() . "." . $duoi;
		if (preg_match('/image/', $_FILES['add_ud_notify_image']['type'][$i])) {
			$dir_path_file = $dir_image . $n_file;
			move_uploaded_file($_FILES['add_ud_notify_image']['tmp_name'][$i],$dir_path_file);
		}else{
			$dir_path_file = $dir_video . $n_file;
			move_uploaded_file($_FILES['add_ud_notify_image']['tmp_name'][$i],$dir_path_file);
		}

		if ($i == count($_FILES['add_ud_notify_image']['name']) - 1) {
				$path_image1 = $path_image1 . $dir_path_file;
				$name_image1 = $name_image1 . $_FILES['add_ud_notify_image']['name'][$i];
			}else{
				$path_image1 = $path_image1 . $dir_path_file . "||";
				$name_image1 = $name_image1 . $_FILES['add_ud_notify_image']['name'][$i] . "||";
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

update('new_feed',$data,$dataId);
echo json_encode([
    'result'=>true
]);
?>
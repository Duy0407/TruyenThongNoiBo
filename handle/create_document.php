<?php
require_once '../config/config.php';
$btn_document = getValue('btn_document','str','POST','');
if ($btn_document == "") {
	header("Location: /");
}else{
	$name = getValue('name','str','POST','');
	$check[] = $name;
	$author = getValue('author','str','POST','');
	$check[] = $author;
	$field = getValue('field','str','POST','');
	$check[] = $field;
	$description = getValue('description','str','POST','');
	$check[] = $description;
	$val = checkPost($check);
	if ($val == 1) {
		header("Location: /");
	}else if (!isset($_FILES['file'])) {
		header("Location: /");
	}

	$duoi = explode(".",$_FILES['file']['name']);
	$duoi = $duoi[count($duoi) - 1];
	$name_file = rand() . "." . $duoi;
	$name_tmp = $_FILES['file']['tmp_name'];
	$folder = "../img/knowledge/" . $_SESSION['login']['id'];
	if (!is_dir($folder)) {
		mkdir($folder, 0777, true);
	}
	$dir = $folder . "/" . $name_file;
	move_uploaded_file($name_tmp, $dir);
	if ($_SESSION['login']['user_type'] == 1) {
		$id_user = $_SESSION['login']['id'];
		$id_company = $_SESSION['login']['id'];
	}else{
		require_once '../api/api_ep.php';
		$id_user = $data_ep[$_SESSION['login']['id']]->ep_id;
		$id_company = $data_ep[$_SESSION['login']['id']]->com_id;
	}
	$data = [
		'id_user'=>$id_user,
		'id_company'=>$id_company,
		'name'=>$name,
		'author'=>$author,
		'name_file'=>$_FILES['file']['name'],
		'field'=>$field,
		'description'=>$description,
		'file'=>$name_file,
		'user_type'=>$_SESSION['login']['user_type'],
		'created_at'=>time(),
		'updated_at'=>time()
	];
	add('knowledge',$data);
	header("Location: /quan-tri-tri-thuc-wiki.html");
}
?>
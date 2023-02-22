<?php
require_once '../config/config.php';
$btn_update_document = getValue('btn_update_document','int','POST','');
if ($btn_update_document == 0) {
	header("Location: /quan-tri-tri-thuc-wiki.html");
}else{
	$db_check = new db_query("SELECT * FROM knowledge WHERE id = $btn_update_document");
	if (mysql_num_rows($db_check->result) == 0) {
		header("Location: /quan-tri-tri-thuc-wiki.html");
	}
}
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
}
$data = [
	'name'=>$name,
	'author'=>$author,
	'field'=>$field,
	'description'=>$description
];

$dataId = [
	'id'=>$btn_update_document
];
update('knowledge',$data,$dataId);
header("Location: /quan-tri-tri-thuc-wiki.html")
?>
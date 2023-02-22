<?php
require_once '../config/config.php';

$id = getValue('id','int','POST','');

$duoi = explode('/', $_FILES['image']['type']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['image']['name'] = rand() . "." . $duoi;
$tmp_name1 = $_FILES['image']['tmp_name'];

$folder_cover_img = "../img/group/cover_img/" . $_SESSION['login']['id_com'];

if (!is_dir($folder_cover_img)) {
	mkdir($folder_cover_img);
}

$dir_cover_image = $folder_cover_img . "/" . $_FILES['image']['name'];
move_uploaded_file($tmp_name1, $dir_cover_image);

$dataId = [
  'id' => $id
];

$data = [
  'cover_image' => $_FILES['image']['name']
];
update('`group`', $data, $dataId);

echo json_encode([
  'result' => true
]);

?>
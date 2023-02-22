<?php
require_once '../config/config.php';
$dep_id = getValue('dep_id','int','POST','');
if (!is_dir('../img/group/group_image/' . $_SESSION['login']['id'])) {
  mkdir('../img/group/group_image/' . $_SESSION['login']['id'], 0777, true);
}

$dir = '../img/group/group_image/' . $_SESSION['login']['id'];

$db_image = new db_query("SELECT * FROM dep_image WHERE dep_id = $dep_id");

$duoi = explode(".", $_FILES['image']['name']);
	$duoi = $duoi[count($duoi) - 1];
	$name_file = rand() . "." . $duoi;

  move_uploaded_file($_FILES['image']['tmp_name'], $dir . "/" . $name_file);
if (mysql_num_rows($db_image->result) == 0) {
  $data = [
    'id_company' => $_SESSION['login']['id_com'],
    'dep_id' => $dep_id,
    'dep_image' => $dir . "/" . $name_file,
    'created_at' => time(),
    'updated_at' => time()
  ];

  add('dep_image', $data);
}else{
  $data['cover_dep'] = $dir . "/" . $name_file;
  $dataId['dep_id'] = $dep_id;
  update('dep_image',$data,$dataId);
}

echo json_encode([
  'result' => true
]);
?>
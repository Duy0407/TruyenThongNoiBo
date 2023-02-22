<?php
require_once "../config/config.php";
$type = getValue('type', 'int', 'POST', '');
$id_user_tags = getValue('id_user_tags', 'str', 'POST', '');
$check[] = $id_user_tags;
$position = getValue('position', 'int', 'POST', '');
$check[] = $position;
$content = getValue('content', 'str', 'POST', '');
$check[] = $content;
$id_option = getValue('id_option','int','POST','');
$check[] = $id_option;
$val = checkPost($check);
if ($val == 1 || !isset($_FILES['file'])) {
    header("Location: /");
}
$duoi = explode('.', $_FILES['file']['name']);
$duoi = $duoi[(count($duoi) - 1)];
$_FILES['file']['name'] = rand() . "." . $duoi;
$tmp_name = $_FILES['file']['tmp_name'];
$dir = "../img/new_feed/bonus/";
if (!is_dir($dir . $_SESSION['login']['id'])) {
    mkdir($dir . $_SESSION['login']['id'], 0777, true);
}
move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['file']['name']);
$data = [
	'id_company' => $_SESSION['login']['id_com'],
    'id_user_tags' => $id_user_tags,
    'position' => $position,
    'content' => $content,
	'author_type'=>$_SESSION['login']['user_type'],
    'file' => $_FILES['file']['name'],
    'author'=> $_SESSION['login']['id'],
    'type' => $type,
    'new_type' => 8,
    'created_at'=>time(),
    'updated_at'=>time()
];
add('new_feed',$data);
$id_new = mysql_insert_id();
$data2 = [
    'id_new' => $id_new,
    'id_option' => $id_option
];
add('bonus',$data2);
echo json_encode([
    'result'=>true
]);
?>

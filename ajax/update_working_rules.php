<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$dataId = [
    'id'=>$id
];
$name = getValue('name','str','POST','');
$data['name'] = $name;
$content = getValue('content','str','POST','');
$data['content'] = $content;
$comment = getValue('comment','int','POST','');
$data['comment'] = $comment;
if (isset($_FILES['file'])) {
    $db_check = new db_query("SELECT * FROM working_rules WHERE id = $id");
    $row = mysql_fetch_array($db_check->result);
    unlink('../img/vanhoadoanhnghiep/working_rules/' . $_SESSION['login']['id_com'] . '/' . $row['img']);
    $dir = '../img/vanhoadoanhnghiep/working_rules/';
    $tmp_name = $_FILES['file']['tmp_name'];
    $duoi = explode('/',$_FILES['file']['type']);
    $duoi = $duoi[count($duoi) - 1];
    $name_img = rand() . '.' . $duoi;
    move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id_com'] . '/' . $name_img);
    $data['img'] = $name_img;
}
update('working_rules',$data,$dataId);
echo json_encode([
    'result' => true
]);
?>
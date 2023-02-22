<?php
require_once '../config/config.php';
$id = getValue('id_target','int','POST','');
$dataId = [
    'id' => $id
];
$title = getValue('title','str','POST','');
$data['title'] = $title;
$content = getValue('content','str','POST','');
$data['content'] = $content;
$comment = getValue('comment','int','POST','');
$data['comment'] = $comment;
if($title == "" || $content == ""){
    header("Location: /");
}else{
    if (isset($_FILES['cover_image'])) {
        $db_check = new db_query("SELECT * FROM `target` WHERE id = $id");
            $row = mysql_fetch_array($db_check->result);
            if (is_writable($row['cover_image'])) {
                unlink($row['cover_image']);
            }
            $duoi = explode(".", $_FILES['cover_image']['name']);
            $duoi = $duoi[count($duoi) - 1];
            $name_file = rand() . "." . $duoi;
            $name_tmp = $_FILES['cover_image']['tmp_name'];
            $dir = "../img/vanhoadoanhnghiep/target/";
            if (!is_dir($dir . $_SESSION['login']['id'])) {
                mkdir($dir . $_SESSION['login']['id'], 0777, true);
            }
            move_uploaded_file($name_tmp, $dir . $_SESSION['login']['id'] . "/" . $name_file);
            $img =  $dir . $_SESSION['login']['id'] . "/" . $name_file;
            $data['cover_image'] = $img;
    }
    update('target',$data,$dataId);
    echo json_encode([
        'result' => true
    ]);
}
?>
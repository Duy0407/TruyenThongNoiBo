<?php
require_once '../config/config.php';
$id = getValue('id_target', 'str', 'POST', '');
$new_title = getValue('title', 'str', 'POST', '');
$content = getValue('content', 'str', 'POST', '');
$comment = getValue('comment', 'str', 'POST', '');
if ($new_title == '' || $content == '') {
    header("Location: /");
} else {
    if ($comment == 'true') {
        $comment = 1;
    } else {
        $comment = 0;
    }
    $img = '';
    if (isset($_FILES['cover_image'])) {
        if ($_FILES['cover_image']['name'] != "") {
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
            $arr_data = [
                'title' => $new_title,
                'content' => $content,
                'cover_image' => $img,
                'comment' => $comment,
                'updated_at' => time()
            ];
            $arr_id = [
                'id' => $id,
            ];
            update('target',$arr_data,$arr_id);
        }else{
            echo $comment;
            die;
            $arr_data = [
                'title' => $new_title,
                'content' => $content,
                'comment' => $comment,
                'updated_at' => time()
            ];
            $arr_id = [
                'id' => $id,
            ];
            update('target',$arr_data,$arr_id);
        }
    }
    header("Location: /vhdn-gia-tri-muc-tieu.html");
}
?>

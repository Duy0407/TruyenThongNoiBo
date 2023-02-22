<?php
require_once '../config/config.php';
$comment = getValue('comment', 'str', 'POST', '');
$target = getValue('target', 'int', 'POST', '');
$avatar = getValue('avatar', 'str', 'POST', '');
if ($target == 0) {
    $result = [
        'result' => false,
    ];
} else {
    $db_target = new db_query("SELECT id_target,image FROM comment_target WHERE id = " . $target);
    $row = mysql_fetch_array($db_target->result);
    $arr_id = [
        'id' => $target,
    ];
    $img = '';
    if ($avatar !=  'undefined' && $avatar != '') {
        $img = $avatar;
    }
    if ($comment == '' && isset($_FILES['img_comment'])) {
        if ($_FILES['img_comment']['name'][0] != "") {
            $check = checkImages($_FILES['img_comment']['name'][0]);
            if ($check == 1) {
                if (is_writable($row['image'])) {
                    unlink($row['image']);
                }
                $duoi = explode(".", $_FILES['img_comment']['name'][0]);
                $duoi = $duoi[count($duoi) - 1];
                $name_file = rand() . "." . $duoi;
                $name_tmp = $_FILES['img_comment']['tmp_name'][0];
                $dir = "../img/vanhoadoanhnghiep/target/comment";
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                move_uploaded_file($name_tmp, $dir . "/" . $name_file);
            } else {
                $result = [
                    'result' => false,
                    'message' => 'Vui lòng tải ảnh hợp lệ',
                ];
            }
        }
        $img =  $dir . "/" . $name_file;
        $data = [
            'content' => $comment,
            'image' => $img,
            'updated_at' => time()
        ];
        update('comment_target', $data, $arr_id);
    } else if ($comment != '' && !isset($_FILES['img_comment'])) {
        $data = [
            'content' => $comment,
            'image' => $img,
            'updated_at' => time()
        ];
        update('comment_target', $data, $arr_id);
    } else if ($comment != '' && isset($_FILES['img_comment'])) {
        if ($_FILES['img_comment']['name'][0] != "") {
            $check = checkImages($_FILES['img_comment']['name'][0]);
            if ($check == 1) {
                if (is_writable($row['image'])) {
                    unlink($row['image']);
                }
                $duoi = explode(".", $_FILES['img_comment']['name'][0]);
                $duoi = $duoi[count($duoi) - 1];
                $name_file = rand() . "." . $duoi;
                $name_tmp = $_FILES['img_comment']['tmp_name'][0];
                $dir = "../img/vanhoadoanhnghiep/target/comment";
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                move_uploaded_file($name_tmp, $dir . "/" . $name_file);
            } else {
                $result = [
                    'result' => false,
                    'message' => 'Vui lòng tải ảnh hợp lệ',
                ];
            }
        }
        $img =  $dir . "/" . $name_file;
        $data = [
            'content' => $comment,
            'image' => $img,
            'updated_at' => time()
        ];
        update('comment_target', $data, $arr_id);
    }
    if ($img == '') {

        if (is_writable($row['image'])) {
            unlink($row['image']);
        }
    }
    $result = [
        'result' => true,
        'id_new' => $row['id_target'],
        'img' => $img,
        'time' => time_elapsed_string(time()),
    ];
}
echo json_encode($result);

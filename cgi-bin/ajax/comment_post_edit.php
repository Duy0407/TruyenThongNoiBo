<?php
require_once '../config/config.php';
$comment = getValue('comment', 'str', 'POST', '');
$cmt_id = getValue('new_id', 'int', 'POST', '');
$avatar = getValue('avatar', 'str', 'POST', '');
if ($cmt_id == '') {
    $result = [
        'result' => false,
    ];
} else {
    $db_new_id = new db_query("SELECT id_new,image FROM comment WHERE id = " . $cmt_id);
    $row = mysql_fetch_array($db_new_id->result);
    $arr_id = [
        'id' => $cmt_id,
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
                $dir = "../img/new_feed/comment";
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
        update('comment', $data, $arr_id);
    } else if ($comment != '' && !isset($_FILES['img_comment'])) {
        $data = [
            'content' => $comment,
            'image' => $img,
            'updated_at' => time()
        ];
        update('comment', $data, $arr_id);
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
                $dir = "../img/new_feed/comment";
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
        update('comment', $data, $arr_id);
    }
    if ($img == '') {

        if (is_writable($row['image'])) {
            unlink($row['image']);
        }
    }
    $result = [
        'result' => true,
        'id_new' => $row['id_new'],
        'img' => $img,
        'time' => time_elapsed_string(time()),
    ];
}
echo json_encode($result);

<?php
require_once '../config/config.php';
$content = getValue('title', 'str', 'POST', '');
$ep_id = getValue('ep_id', 'str', 'POST', '');
$dep_id = getValue('dep_id','int','POST','');
$type = getValue('type','int','POST','');
if ($dep_id == 0) {
    $dep_id = $_SESSION['login']['dep_id'];
}else{
    $dep_id = $dep_id;
}
if ($content == '' && !isset($_FILES['arr_img_nf']) && $ep_id == '') {
    $result = [
        'result' => false,
        'message' => 'Vui lòng nhập đủ các trườngs',
    ];
} else {
    $name_img_nf = '';
    if (isset($_FILES['arr_img_nf'])) {
        $arr_name_img = [];
        $name_file = '';
        if (count($_FILES['arr_img_nf']['name']) > 0) {
            for ($i = 0; $i < count($_FILES['arr_img_nf']['name']); $i++) {
                // $checkImages = checkImages($_FILES['arr_img_nf']['name'][$i]);
                // $checkVideo = checkVideo($_FILES['arr_img_nf']['name'][$i]);
                // if ($checkImages == 1) {
                $duoi = explode(".", $_FILES['arr_img_nf']['name'][$i]);
                $duoi = $duoi[count($duoi) - 1];
                $name_file = rand() . "." . $duoi;
                $name_tmp = $_FILES['arr_img_nf']['tmp_name'][$i];
                $dir = "../img/new_feed/dang_tin";
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                move_uploaded_file($name_tmp, $dir . '/' . $name_file);
                $arr_name_img[] = $dir . '/' . $name_file;
                // }

            }
        }
        $name_img_nf = implode('||', $arr_name_img);
    }
    $data = [
        'id_company'    => $_SESSION['login']['id_com'],
        'author'        => $_SESSION['login']['id'],
        'new_type'      => 0,
        'content'       => $content,
        'id_user_tags'  => $ep_id,
        'file'          => $name_img_nf,
        'author_type'   => $_SESSION['login']['user_type'],
        'type' => $type,
        'position'      => $dep_id,
        'created_at'    => time(),
        'updated_at'    => time()
    ];
    add('new_feed', $data);
    $result = [
        'result' => true,
    ];
}
echo json_encode($result);

<?php
require '../config/config.php';
$id = getValue('id','int','POST',0);
$name = getValue('name','str','POST','');
$name = trim($name);

$view_mode = getValue('view_mode','int','POST',0);
$except = getValue('except','str','POST','');

$desc = getValue('desc','arr','POST','');

$old_file = getValue('old_file','arr','POST',[]);
$old_desc = getValue('old_desc','arr','POST',[]);

// xử lý file
$folder_image = "../img/album/image/" . $_SESSION['login']['id'];
$folder_video = "../img/album/video/" . $_SESSION['login']['id'];

if (!is_dir($folder_image)) {
    mkdir($folder_image, 0777, true);
}

if (!is_dir($folder_video)) {
    mkdir($folder_video, 0777, true);
}

$file_json = [];
// xử lý file cũ
foreach ($old_file as $key => $value) {
    $file_json[] = [
        "file" => $value,
        "desc" => $old_desc[$key],
    ];
}
// xử lý file mới
if (isset($_FILES['file'])) {
    for ($i=0; $i < count($_FILES['file']['name']); $i++) {
        $duoi = explode(".",$_FILES['file']['name'][$i]);
        $duoi = $duoi[count($duoi) - 1];
        $name_file = rand() . "." . $duoi;
        $name_tmp = $_FILES['file']['tmp_name'][$i];
        if (preg_match("/image/", $_FILES['file']['type'][$i]) == true) {
            $dir = $folder_image . "/" . $name_file;
            move_uploaded_file($name_tmp, $dir);
            $file_json[] = [
                "file" => $dir,
                "desc" => $desc[$i],
            ];
        }else if (preg_match("/video/", $_FILES['file']['type'][$i]) == true){
            $dir = $folder_video . "/" . $name_file;
            move_uploaded_file($name_tmp, $dir);
            $file_json[] = [
                "file" => $dir,
                "desc" => $desc[$i],
            ];
        }
    }
}
$file_json = json_encode($file_json, JSON_UNESCAPED_UNICODE);

// xử lý các data khác
if ($id > 0){
    $sql = "SELECT * FROM `album` WHERE user_id = ".$_SESSION['login']['id']." AND id = ".$id;
    $db_bgi = new db_query($sql);
    if (mysql_num_rows($db_bgi->result) > 0){
        $data = [
            'album_name' => $name,
            'file' => $file_json,
            'view_mode' => $view_mode,
            'except' => $except,
            'updated_at' => time(),
        ];
        update('album', $data, ['user_id' => $_SESSION['login']['id'], 'id' => $id]);
    
        echo json_encode(['result'=>true,'code'=>'update','link'=>'/trang-ca-nhan.html?ep_id='.$_SESSION['login']['id'].'&content=4&album='.$id]);
    }else{
        echo json_encode(['result'=>true,'msg'=>'Album không tồn tại']);
    }
}else{
    $data = [
        'album_name' => $name,
        'file' => $file_json,
        'view_mode' => $view_mode,
        'except' => $except,
        'user_id' => $_SESSION['login']['id'],
        'user_type' => $_SESSION['login']['user_type'],
        'created_at' => time(),
        'updated_at' => time(),
    ];
    add('album', $data);
    echo json_encode(['result'=>true,'link'=>'/trang-ca-nhan.html?ep_id='.$_SESSION['login']['id'].'&content=4']);
}
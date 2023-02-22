<?php
require '../config/config.php';
$bgi_id = getValue('bgi_id','int','POST',0);
if ($bgi_id > 0){
    $sql = "SELECT * FROM `ttnb_cover_image_user` WHERE user_id = ".$_SESSION['login']['id']." AND id = ".$bgi_id;
    $db_bgi = new db_query($sql);
    if (mysql_num_rows($db_bgi->result) > 0){
        update('ttnb_cover_image_user', ['is_using' => 0], ['user_id' => $_SESSION['login']['id'],'is_using' => 1]);
        update('ttnb_cover_image_user', ['is_using' => 1], ['id' => $bgi_id]);

        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        echo json_encode(['result'=>false,'msg'=>'Ảnh không tồn tại']);
    }
}elseif (isset($_FILES['file'])){
    $folder_path = "../img/cover_image_user/".$_SESSION['login']['id'];
    if (!is_dir($folder_path)) {
        echo $folder_path;
        mkdir($folder_path, 0777, true);
    }
    $duoi = explode(".",$_FILES['file']['name']);
    $duoi = $duoi[count($duoi) - 1];
    $name_file = rand() . "." . $duoi;
    $name_tmp = $_FILES['file']['tmp_name'];
    if (preg_match("/image/", $_FILES['file']['type']) == true) {
        $dir = $folder_path . "/" . $name_file;
        move_uploaded_file($name_tmp, $dir);
        
        update('ttnb_cover_image_user', ['is_using' => 0], ['user_id' => $_SESSION['login']['id'],'is_using' => 1]);

        $data['user_id'] = $_SESSION['login']['id'];
        $data['user_type'] = $_SESSION['login']['user_type'];
        $data['cover_image'] = $dir;
        $data['is_using'] = 1;
        $data['created_at'] = time();

        add('ttnb_cover_image_user', $data);

        echo json_encode(['result'=>true]);
    }else{
        echo json_encode(['result'=>false,'msg'=>'Ảnh sai định dạng']);
    }
}else{
    echo json_encode(['result'=>false]);
}
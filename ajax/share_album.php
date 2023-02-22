<?php
require '../config/config.php';

$content = getValue('content','str','POST','');
$id_user_tag = getValue('id_user_tag','arr','POST','');
$view_mode = getValue('regime_select','int','POST','');
$except = getValue('except','str','POST','');
$feel = getValue('feel','int','POST','');
$activity = getValue('activity','int','POST','');
$district = getValue('district','int','POST','');
$city = getValue('city','int','POST','');
$location = getValue('location','str','POST','');
$new_id = getValue('new_id','int','POST',0);
$album_id = getValue('album_id','int','POST',0);
$ep_id_share_to = getValue('ep_id_share_to','int','POST',0);
$group_id_share_to = getValue('group_id_share_to','int','POST',0);
$group_type = getValue('group_type','int','POST',0);
$group_id = getValue('group_id','int','POST',0);
$gr_status_post = getValue('gr_status_post','int','POST',1);

if ($gr_status_post == 0){
    $data['approve'] = 1;
}
if ($ep_id_share_to > 0){
    $data['type'] = 2;
    $data['position'] = $ep_id_share_to;
}elseif ($group_id_share_to > 0){
    $data['type'] = $group_type;
    $data['position'] = $group_id_share_to;
}else{
    $data['type'] = $group_type;
    $data['position'] = $group_id;
}

$data['album_id'] = $album_id;
$data['content'] = $content;
$data['view_mode'] = $view_mode;
$data['except'] = $except;
if ($feel != ''){
    $data['feel'] = $feel;
}
if ($activity != ''){
    $data['activity'] = $activity;
}
$data['district'] = $district;
$data['city'] = $city;
$data['location'] = $location;

// $string_img = "";
// $string_file = "";
// $string_img_name = "";
// $string_file_name = "";

// $folder_file = "../img/new_feed/dang_tin/file/" . $_SESSION['login']['id'];
// $folder_image = "../img/new_feed/dang_tin/image/" . $_SESSION['login']['id'];
// $folder_video = "../img/new_feed/dang_tin/video/" . $_SESSION['login']['id'];

// if (!is_dir($folder_file)) {
//     mkdir($folder_file, 0777, true);
// }

// if (!is_dir($folder_image)) {
//     mkdir($folder_image, 0777, true);
// }

// if (!is_dir($folder_video)) {
//     mkdir($folder_video, 0777, true);
// }

// if (isset($_FILES['image_video'])) {
//     for ($i=0; $i < count($_FILES['image_video']['name']); $i++) {
//         $duoi = explode(".",$_FILES['image_video']['name'][$i]);
//         $duoi = $duoi[count($duoi) - 1];
//         $name_file = rand() . "." . $duoi;
//         $name_tmp = $_FILES['image_video']['tmp_name'][$i];
//         if (preg_match("/image/", $_FILES['image_video']['type'][$i]) == true) {
//             $dir = $folder_image . "/" . $name_file;
//             move_uploaded_file($name_tmp, $dir);
//             if ($i < count($_FILES['image_video']['name']) - 1) {
//                 $string_img = $string_img . $dir . "||";
//                 $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i] . "||";
//             }else{
//                 $string_img = $string_img . $dir;
//                 $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i];
//             }
//         }else if (preg_match("/video/", $_FILES['image_video']['type'][$i]) == true){
//             $dir = $folder_video . "/" . $name_file;
//             move_uploaded_file($name_tmp, $dir);
//             if ($i < count($_FILES['image_video']['name']) - 1) {
//                 $string_img = $string_img . $dir . "||";
//                 $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i] . "||";
//             }else{
//                 $string_img = $string_img . $dir;
//                 $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i];
//             }
//         }
//     }
// }

// if (isset($_FILES['file'])) {
//     for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
//         $duoi = explode(".",$_FILES['file']['name'][$i]);
//         $duoi = $duoi[count($duoi) - 1];
//         $name_file = rand() . "." . $duoi;
//         $name_tmp = $_FILES['file']['tmp_name'][$i];
//         $dir = $folder_file . "/" . $name_file;
//         move_uploaded_file($name_tmp, $dir);
//         if ($i < count($_FILES['file']['name']) - 1) {
//             $string_file = $string_file . $dir . "||";
//             $string_file_name = $string_file_name . $_FILES['file']['name'][$i] . "||";
//         }else{
//             $string_file = $string_file . $dir;
//             $string_file_name = $string_file_name . $_FILES['file']['name'][$i];
//         }
//     }
// }

// if ($string_file != "" && $string_img != "") {
//     $data['file'] = $string_file . "||" . $string_img;
//     $data['name_file'] = $string_file_name . "||" . $string_img_name;
// }else{
//     if ($string_file != "") {
//         $data['file'] = $string_file;
//         $data['name_file'] = $string_file_name;
//     }else{
//         $data['file'] = $string_img;
//         $data['name_file'] = $string_img_name;
//     }
// }

if ($_SESSION['login']['user_type'] == 1){
    $id_user = $_SESSION['login']['id'];
    $id_company = $_SESSION['login']['id'];
}else{
    require_once '../api/api_ep.php';
    $id_user = $data_ep[$_SESSION['login']['id']]->ep_id;
    $id_company = $data_ep[$_SESSION['login']['id']]->com_id;
}

$data['author'] = $_SESSION['login']['id'];
$data['id_company'] = $_SESSION['login']['id_com'];
$data['content'] = $content;
$data['id_user_tags'] = $id_user_tag;
$data['new_type'] = 0;
$data['author_type'] = $_SESSION['login']['user_type'];
$data['updated_at'] = time();
$data['created_at'] = time();

add('new_feed', $data);

if ($new_id > 0){
    $data2['id_new'] = $new_id;
    $data2['id_user'] = $_SESSION['login']['id'];
    $data2['user_type'] = $_SESSION['login']['user_type'];
    $data2['created_time'] = time();
    add('share_post', $data2);
}else{
    $data2['album_id'] = $album_id;
    $data2['user_id'] = $_SESSION['login']['id'];
    $data2['user_type'] = $_SESSION['login']['user_type'];
    $data2['created_at'] = time();
    add('share_album', $data2);
}

echo json_encode([
    'result' => true
]);
?>
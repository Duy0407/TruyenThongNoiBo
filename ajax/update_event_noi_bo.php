<?php
require_once "../config/config.php";
$new_title = getValue('new_title', 'str', 'POST', '');
$data['new_title'] = $new_title;
$new_id = getValue('new_id', 'int', 'POST', '');
$db_nf = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
$row = mysql_fetch_array($db_nf->result);
$dataId1 = [
    'new_id' => $new_id
];
$dataId2 = [
    'id_new' => $new_id
];
$time = getValue('time', 'str', 'POST', '');
$data2['time'] = strtotime($time);
$content = getValue('content', 'str', 'POST', '');
$data['content'] = $content;
$position = getValue('position', 'int', 'POST', '');
$data['position'] = $position;
$qr = new db_query("SELECT * FROM new_feed INNER JOIN events ON new_feed.new_id = events.id_new WHERE new_feed.new_id = $new_id");
$row = mysql_fetch_array($qr->result);
if (isset($_FILES['event_avatar'])) {
    $duoi = explode('/', $_FILES['event_avatar']['type']);
    $duoi = $duoi[(count($duoi) - 1)];
    $_FILES['event_avatar']['name'] = rand() . "." . $duoi;
    $tmp_name1 = $_FILES['event_avatar']['tmp_name'];
    $dir1 = "../img/new_feed/event/event_noi_bo/avatar/";
    unlink("../img/new_feed/event/event_noi_bo/avatar/" . $row['author'] . "/" . $row['avatar']);
    move_uploaded_file($tmp_name1, $dir1 . $row['author'] . "/" . $_FILES['event_avatar']['name']);
    $data2['avatar'] = $_FILES['event_avatar']['name'];
}

$arr_file_nb = getValue('arr_file_nb','arr','POST','');
$arr_file_nb = explode(",", $arr_file_nb);

$arr_name_file_nb = getValue('arr_name_file_nb','arr','POST','');
$arr_name_file_nb = explode(",", $arr_name_file_nb);

$path_file0 = "";
$name_file0 = "";

for ($i=0; $i < count($arr_file_nb); $i++) { 
    if ($i == count($arr_file_nb) - 1) {
        $path_file0 = $path_file0 . $arr_file_nb[$i];
        $name_file0 = $name_file0 . $arr_name_file_nb[$i];
    }else{
        $path_file0 = $path_file0 . $arr_file_nb[$i] . "||";
        $name_file0 = $name_file0 . $arr_name_file_nb[$i] . "||";
    }
}

$link_file = "../img/new_feed/event/event_noi_bo/file_dinh_kem/";
if (!is_dir($link_file.$row['author'])) {
    mkdir($link_file.$row['author'],0777,true);
}
if (!is_dir($link_file.$row['author'] . "/file")) {
    mkdir($link_file.$row['author'] . "/file",0777,true);
}
$dir_file = $link_file.$row['author'] . "/file" . "/";

$path_file1 = "";
$name_file1 = "";

if (isset($_FILES['file'])) {
    for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
        $duoi = explode(".", $_FILES['file']['name'][$i]);
        $duoi = $duoi[count($duoi) - 1];

        $n_file = rand() . "." . $duoi;

        $dir_path_file = $dir_file . $n_file;

        move_uploaded_file($_FILES['file']['tmp_name'][$i],$dir_path_file);

        if ($i == count($_FILES['file']['name']) - 1) {
            $path_file1 = $path_file1 . $dir_path_file;
            $name_file1 = $name_file1 . $_FILES['file']['name'][$i];
        }else{
            $path_file1 = $path_file1 . $dir_path_file . "||";
            $name_file1 = $name_file1 . $_FILES['file']['name'][$i] . "||";
        }
    }
}

$path = "";
$name = "";

if ($path_file0 == "" && $path_file1 != "") {
    $path = $path_file1;
}else if ($path_file0 != "" && $path_file1 == "") {
    $path = $path_file0;
}else if ($path_file0 != "" && $path_file1 != "") {
    $path = $path_file0 . "||" . $path_file1;
}

if ($name_file0 == "" && $name_file1 != "") {
    $name = $name_file1;
}else if ($name_file0 != "" && $name_file1 == "") {
    $name = $name_file0;
}else if ($name_file0 != "" && $name_file1 != "") {
    $name = $name_file0 . "||" . $name_file1;
}

$data['file'] = $path;

$data['name_file'] = $name;

update('new_feed', $data, $dataId1);
update('events', $data2, $dataId2);
echo json_encode([
    'result' => true
]);

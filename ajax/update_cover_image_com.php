<?php
require_once '../config/config.php';
$db_image = new db_query("SELECT * FROM cover_image_com WHERE id_company = " . $_SESSION['login']['id_com']);
if (!is_dir('../img/cover_image_com/' . $_SESSION['login']['id_com'])) {
    mkdir('../img/cover_image_com/' . $_SESSION['login']['id_com'],0777,true);
}

$duoi = explode('/',$_FILES['image']['type']);
$duoi = $duoi[count($duoi) - 1];
$name = rand() . '.' . $duoi;
$tmp_name = $_FILES['image']['tmp_name'];
move_uploaded_file($tmp_name, '../img/cover_image_com/' . $_SESSION['login']['id_com'] . '/' .$name);

if (mysql_num_rows($db_image->result) > 0) {
    $row = mysql_fetch_array($db_image->result);
    unlink('../img/cover_image_com/' . $_SESSION['login']['id_com'] . '/' . $row['cover_image']);
    $dataId = [
        'id_company' => $_SESSION['login']['id_com']
    ];

    $data = [
        'cover_image' => $name,
        'updated_at' => time()
    ];
    update('cover_image_com',$data,$dataId);
}else{
    $data = [
        'id_company' => $_SESSION['login']['id_com'],
        'cover_image' => $name,
        'created_at' => time(),
        'updated_at' => time()
    ];

    add('cover_image_com',$data);
}
$db_check = new db_query("SELECT * FROM update_calendar WHERE `type` = 1 AND `time` = 0 AND id_company = " . $_SESSION['login']['id_com']);
if (mysql_num_rows($db_check->result) == 0) {
    $data2 = [
        'type' => 1,
        'time' => 0,
        'id_company' => $_SESSION['login']['id_com'],
        'created_at' => time(),
        'updated_at' => time()
    ];
    add('update_calendar', $data2);
}
echo json_encode([
    'result'=>true
]);
?>
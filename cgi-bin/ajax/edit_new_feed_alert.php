<?php 
require_once "../config/config.php";
$new_id = getvalue('new_id','int','POST','');
$dataId = [
    'new_id'=>$new_id
];
$check[] = $new_id;
$position = getValue('position','int','POST','');
$data['position'] = $position;
$check[] = $position;
$new_title = getValue('new_title','str','POST','');
$data['new_title'] = $new_title;
$check[] = $new_title;
$content = getValue('content','str','POST','');
$data['content'] = $content;
$check[] = $content;
$val = checkPost($check);
if ($val == 1) {
    header("Location: /");
}

if (isset($_FILES['file'])) {
    $db_img = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
    $row_img = mysql_fetch_array($db_img->result);
    unlink("../img/new_feed/alert/" . $_SESSION['login']['id'] . "/" . $row_img['file']);
    $duoi = explode('/', $_FILES['file']['type']);
    $duoi = $duoi[(count($duoi) - 1)];
    $_FILES['file']['name'] = rand() . "." . $duoi;
    $tmp_name = $_FILES['file']['tmp_name'];
    $dir_file = "../img/new_feed/alert/" . $_SESSION['login']['id'] . "/" . $_FILES['file']['name'];
    move_uploaded_file($tmp_name, $dir_file);
    $data['file'] = $_FILES['file']['name'];
}
update('new_feed',$data,$dataId);
echo json_encode([
    'result'=>true
]);
?>
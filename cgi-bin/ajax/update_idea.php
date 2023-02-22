<?php
require_once "../config/config.php";
$new_id = getValue('new_id','int','POST','');
$check[] = $new_id;
$new_title = getValue('new_title','str','POST','');
$check[] = $new_title;
$content = getValue('content','str','POST','');
$check[] = $content;
$position = getValue('position','int','POST','');
$check[] = $position;
$val = checkPost($check);
if ($val == 1) {
    header("Location: /");
}else{
    $checkAuthor = checkAuthor($new_id);
    if ($checkAuthor == 0) {
        echo json_encode([
            'result'=>fasle
        ]);
        die();
    }
}

if (isset($_FILES['file'])) {
    $db_img = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
    $row_img = mysql_fetch_array($db_img->result);
    unlink("../img/new_feed/idea/" . $_SESSION['login']['id'] . "/" . $row_img['file']);
    $duoi = explode('/', $_FILES['file']['type']);
    $duoi = $duoi[(count($duoi) - 1)];
    $_FILES['file']['name'] = rand() . "." . $duoi;
    $tmp_name = $_FILES['file']['tmp_name'];
    $dir_file = "../img/new_feed/alert/" . $_SESSION['login']['id'] . "/" . $_FILES['file']['name'];
    move_uploaded_file($tmp_name, $dir_file);
    $data['file'] = $_FILES['file']['name'];
}
$data['new_title'] = $new_title;
$data['content'] = $content;
$data['position'] = $position;
$dataId = [
    'new_id'=>$new_id
];
update('new_feed',$data,$dataId);
echo json_encode([
    'result'=>true
]);
?>
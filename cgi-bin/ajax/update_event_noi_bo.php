<?php
require_once "../config/config.php";
$new_title = getValue('new_title', 'str', 'POST', '');
$data['new_title'] = $new_title;
$new_id = getValue('new_id', 'int', 'POST', '');
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
if (isset($_FILES['event_file'])) {
    $duoi = explode('/', $_FILES['event_file']['type']);
    $duoi = $duoi[(count($duoi) - 1)];
    $_FILES['event_file']['name'] = rand() . "." . $duoi;
    $tmp_name2 = $_FILES['event_file']['tmp_name'];
    $dir2 = "../img/new_feed/event/event_noi_bo/file_dinh_kem/";
    unlink("../img/new_feed/event/event_noi_bo/file_dinh_kem/" . $row['author'] . "/" . $row['file']);
    move_uploaded_file($tmp_name2, $dir2 . $row['author'] . "/" . $_FILES['event_file']['name']);
    $data['file'] = $_FILES['event_file']['name'];
}
update('new_feed', $data, $dataId1);
update('events', $data2, $dataId2);
echo json_encode([
    'result' => true
]);

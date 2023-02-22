<?php
require_once '../config/config.php';
$id = getValue('id', 'int', 'POST', '');
$content = getValue('content', 'str', 'POST', '');
if ($id == 0 || $content == '') {
    $result = [
        'result' => false,
    ];
} else {
    $data = [
        'id_event'      => $id,
        'content'       => $content,
        'user_id'       =>  $_SESSION['login']['id'],
        'user_type'     => $_SESSION['login']['user_type'],
        'created_at'    => time(),
        'updated_at'    => time(),
    ];
    add('event_question',$data);
    if ($_SESSION['login']['user_type'] == 1) {
        $position = 'Quản trị';
    }else{
        $position = 'Nhân viên';
    }
    $result = [
        'result'        => true,
        'time'          => date('H:i d-m-Y',time()),
        'name'          => $_SESSION['login']['name'],
        'avatar'        => $_SESSION['login']['logo'],
        'position'      => $position,
    ];
}
echo json_encode($result);
?>
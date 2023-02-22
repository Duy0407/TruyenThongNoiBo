<?php
require_once '../config/config.php';
$time = getValue('time','str','POST','');
$remind = getValue('remind','int','POST','');
$time = strtotime($time);
$db_check = new db_query("SELECT * FROM update_calendar WHERE `type` = 1 AND id_company = " . $_SESSION['login']['id_com']);
$row = mysql_fetch_array($db_check->result);
$dataId = [
    'id' => $row['id']
];
$data = [
    'time' => $time,
    'remind' => $remind,
    'updated_at' => time()
];
update('update_calendar',$data,$dataId);

$data2 = [
    'type' => 5,
    'id_user' => $_SESSION['login']['id'],
    'id_company' => $_SESSION['login']['id_com'],
    'content' => 0,
    'user_type' => $_SESSION['login']['user_type'],
    'created_at' => time(),
    'updated_at' => time()
];
add('notify',$data2);
echo json_encode([
    'result' => true
]);
?>
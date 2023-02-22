<?php
require_once '../config/config.php';
$type = getValue('type','int','POST','');
$time = getValue('time','str','POST','');
$time = strtotime($time);
$remind = getValue('remind','int','POST','');

$data = [
  'type' => $type,
  'id_user' => $_SESSION['login']['id'],
  'time' => $time,
  'id_company' => $_SESSION['login']['id_com'],
  'remind' => $remind,
  'created_at' => time(),
  'updated_at' => time()
];

add('update_calendar', $data);
header('Location: /vhdn-cai-dat-lich-cap-nhat.html');
?>
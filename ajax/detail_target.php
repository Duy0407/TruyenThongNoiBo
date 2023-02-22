<?php
require_once '../config/config.php';
$id = getValue('id', 'int', 'POST', '');
if ($id != '') {
    $db_core_value = new db_query("SELECT * FROM target WHERE id = $id");
    $row = mysql_fetch_array($db_core_value->result);
    echo json_encode([
        'data' => $row
    ]);
} else {
    echo json_encode([
        'data' => 'Vui lòng nhập đủ các trường',
    ]);
}

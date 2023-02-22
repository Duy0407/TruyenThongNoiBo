<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
if ($id == 0 || $id == '') {
    $result = [
        'result' => false,
    ];
}else{
    $arr_id = [
        'id' => $id,
    ];

    $arr_data = [
        'delete' => 1,
        'deleted_at' => time(),
    ];
    update('target', $arr_data , $arr_id);
    $result = [
        'result' => true,
    ];
}
echo json_encode($result);
?>
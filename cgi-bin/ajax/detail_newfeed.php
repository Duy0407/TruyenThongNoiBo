<?php
require_once '../config/config.php';
$id = getValue('id', 'int', 'POST', '');

if ($id == 0) {
    $result = [
        'result' => false,
        'message' => 'Vui lòng nhập đủ các trường',
    ];
} else {
    $detail_nf = new db_query("SELECT * FROM new_feed WHERE new_id = $id");
    $detail = mysql_fetch_assoc($detail_nf->result);
    $arr = [];
    foreach ($arr_ep as $key => $value) {
        $arr [] = [
            'ep_id' => $value['ep_id'],
            'ep_name' => $value['ep_name'],
        ];
    }
    $result = [
        'result' => true,
        'data' => $detail,
        'arr_ep' => $arr,
    ];

}

echo json_encode($result);

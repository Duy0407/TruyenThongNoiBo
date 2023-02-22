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
    $detail['created_at'] = date("H:i d/m/Y", $detail['created_at']);
    $file = explode('||', $detail['file']);
    $detail['filesize'] = [];

    for ($i=0; $i < count($file); $i++) { 
        $detail['filesize'][] = filesize($file[$i]);
    }

    $arr = [];
    foreach ($arr_ep as $key => $value) {
        $arr [$value['ep_id']] = [
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

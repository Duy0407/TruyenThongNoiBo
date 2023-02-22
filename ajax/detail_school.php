<?php
require_once '../config/config.php';
$id = getValue('id', 'int', 'POST', 0);

if ($id == 0) {
    $result = [
        'result' => false,
        'message' => 'Vui lòng nhập đủ các trường',
    ];
} else {
    $detail = new db_query("SELECT * FROM ttnb_school WHERE id = $id AND user_id = ".$_SESSION['login']['id']);
    if (mysql_num_rows($detail->result) > 0){
        $detail = mysql_fetch_assoc($detail->result);
        $detail['time_start'] = ($detail['time_start']>0)?date("Y-m-d", $detail['time_start']):0;
        $detail['time_end'] = ($detail['time_end']>0)?date("Y-m-d", $detail['time_end']):0;
    
        $result = [
            'result' => true,
            'data' => $detail,
        ];
    }else{
        $result = [
            'result' => false,
            'message' => 'Trường học không tồn tại',
        ]; 
    }

}

echo json_encode($result);

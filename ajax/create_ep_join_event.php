<?php
require_once '../config/config.php';
$event_id = getValue('event_id', 'int', 'POST', '');
$ep_id = getValue('ep_id', 'str', 'POST', '');
if ($event_id == 0 || $ep_id == '') {
    $result = [
        'result' => false,
    ];
} else {
    $ep_id = explode(',', $ep_id);
    $arr = [];
    foreach ($ep_id as $value) {
        $data = [
            'id_employee'    => $value,
            'id_event'       => $event_id,
            'user_type'      => 2,
        ];
        add('event_join', $data);
    }
    $arr_event_join = [];
    $arr_event_question = [];
    $db_event_join = new db_query("SELECT * FROM event_join where id_event = $event_id");
    while ($row_ej = mysql_fetch_assoc($db_event_join->result)) {
        if ($row_ej['user_type'] == 2) {
            if ($arr_ep[$row_ej['id_employee']]['ep_image'] == "") {
                $img = '../img/logo_com.png';
            }else{
                $img = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_ej['id_employee']]['ep_image'];
            }
            
            $name = $arr_ep[$row_ej['id_employee']]['ep_name'];
            $position = 'Nhân viên';
        } else {
            $img =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
            $name = $arr_com->com_name;
            $position = 'Quản trị';
        }
        $arr_event_join[] = [
            'id' => $row_ej['id_employee'],
            'avatar' => $img,
            'name' => $name,
            'position' => $position,
        ];
    }
    $arr_id_ep = [];
    foreach ($arr_ep as $key => $value) {
        $arr_id_ep[] = $value['ep_id'];
    }

    $arr_ep_join = [];
    foreach ($arr_event_join as $key => $join) {
        $arr_ep_join [] = $join['id'];
    }

    $get_ep = [];
    $list_ep = [];
    if(count($arr_id_ep) > 0 && count($arr_ep_join) > 0){
        $get_ep = array_diff($arr_id_ep,$arr_ep_join);
        if (count($get_ep)>0) {
            foreach ($get_ep as $key => $ep) {
                $list_ep[] = [
                    'ep_id' => $arr_ep[$ep]['ep_id'],
                    'ep_name' => $arr_ep[$ep]['ep_name'],
                ];
            }
        }
    }
    $row_event['arr_ep'] = $arr_event_join;
    $row_event['list_ep'] = $list_ep;
    $result = [
        'result'        => true,
        'data'          => $row_event,
    ];
}
echo json_encode($result);

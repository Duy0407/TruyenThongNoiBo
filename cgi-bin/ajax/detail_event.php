<?php
require_once '../config/config.php';
require_once '../includes/check_login.php';
require_once '../api/api_ct.php';
$id = getValue('id', 'int', 'POST', '');
if ($id == 0) {
    $result = [
        'result' => false,
    ];
} else {
    $db_event = new db_query("SELECT id,new_feed.new_id,new_type,position,new_title,events.`time`,author_type,author,content,event_mode,speakers_avatar,speakers_name,speakers_position,speakers_phone,speakers_email,list_guests FROM new_feed JOIN events ON events.id_new = new_feed.new_id where events.id_new = $id");
    $row_event = mysql_fetch_assoc($db_event->result);
    $id_event = $row_event['id'];
    $db_event_join = new db_query("SELECT * FROM event_join where id_event = $id_event");
    $db_event_question = new db_query("SELECT * FROM event_question where id_event = $id_event");
    $arr_event_join = [];
    $arr_event_question = [];
    while ($row_ej = mysql_fetch_assoc($db_event_join->result)) {
        if ($row_ej['user_type'] == 2) {
            if ($arr_ep[$row_ej['id_employee']]['ep_image'] == "") {
                $img = '../img/avatar_default.png';
            }else{
                $img = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_ej['id_employee']]['ep_image'];
            }
            $name = $arr_ep[$row_ej['id_employee']]['ep_name'];
            $position = 'Nhân viên';
        } else {
            if ($arr_com->com_logo) {
                $img =  '../img/logo_com.png';
            }else{
                $img =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
            }
            $name = $arr_com->com_name;
            $position = 'Quản trị';
        }
        $arr_event_join[] = [
            'id' => $row_ej['id_employee'],
            'id_event_join'=>$row_ej['id'],
            'avatar' => $img,
            'name' => $name,
            'position' => $position,
        ];
    }
    $arr_id_ep = [];
    foreach ($arr_ep as $key => $value) {
        $arr_id_ep[] = $value['ep_id'];
    }
    $vi_tri_dang = 'Tường công ty';
    for ($i = 0; $i < count($list_department); $i++) {
        if ($row_event['position'] == $list_department[$i]->dep_id) {
            $vi_tri_dang = $list_department[$i]->dep_name;
            break;
        }
    }
    $arr_ep_join = [];
    foreach ($arr_event_join as $key => $join) {
        $arr_ep_join [] = $join['id'];
    }
    $get_ep = [];
    $list_ep = [];
    foreach ($arr_ep as $key => $value) {
        $list_ep[] = [
            'ep_id' => $value['ep_id'],
            'ep_name' => $value['ep_name'],
        ];
    }
    if(count($arr_id_ep) > 0 && count($arr_ep_join) > 0){
        $get_ep = array_diff($arr_id_ep,$arr_ep_join);
        if (count($get_ep)>0) {
            $list_ep = [];
            foreach ($get_ep as $key => $ep) {
                $list_ep[] = [
                    'ep_id' => $arr_ep[$ep]['ep_id'],
                    'ep_name' => $arr_ep[$ep]['ep_name'],
                ];
            }
        }
    }

    while ($row_question = mysql_fetch_assoc($db_event_question->result)) {
        if ($row_question['user_type'] == 2) {
            $img = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_question['user_id']]['ep_image'];
            $name = $arr_ep[$row_question['user_id']]['ep_name'];
            $position = 'Nhân viên';
        } else {
            $img =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
            $name = $arr_com->com_name;
            $position = 'Quản trị';
        }
        $arr_event_question[] = [
            'content' => $row_question['content'],
            'avatar' => $img,
            'name' => $name,
            'position' => $position,
            'time' => date('H:i d-m-Y',$row_question['created_at']),
        ];
    }
    $list_guests = [];
    if ($row_event['list_guests'] != '') {
        $list_guests = json_decode($row_event['list_guests']);
    }
    $row_event['avatar_dien_gia'] = '/img/new_feed/event/event_doi_ngoai/speakers_avatar/'.$_SESSION['login']['id'].'/'.$row_event['speakers_avatar'];
    $row_event['list_guests'] = $list_guests;
    $row_event['arr_ep'] = $arr_event_join;
    $row_event['question'] = $arr_event_question;
    $row_event['list_ep'] = $list_ep;
    $row_event['vi_tri_dang'] = $vi_tri_dang;
    $row_event['list_department'] = $list_department;
    $result = [
        'result' => true,
        'data' => $row_event,
    ];
}
echo json_encode($result);

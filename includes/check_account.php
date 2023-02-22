<?php
if ($_SESSION['login']['user_type'] == 1) {
    $resp3 = $arr_com;
    $data = [];
    $data['id'] = $resp3->com_id;
    $data['id_com'] = $resp3->com_id;
    $data['phone'] = $resp3->com_phone;
    $data['email'] = $resp3->com_email;
    $data['address'] = $resp3->com_address;
    $data['user_type'] = 1;
    $data['acc_token'] = $access_token;
    $data['name'] = $resp3->com_name;
    $data['com_create_time'] = $resp3->com_create_time;
    if ($resp3->com_logo == "") {
        $data['logo'] = '../img/logo_com.png';
    } else {
        $data['logo'] = 'https://chamcong.24hpay.vn/upload/company/logo/' . $resp3->com_logo;
    }
    $diff = array_diff($data, $_SESSION['login']);
    if (count($diff) > 0) {
        foreach ($diff as $key => $value) {
            $_SESSION['login'][$key] = $data[$key];
        }
    }
}

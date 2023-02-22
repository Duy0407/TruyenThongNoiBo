<?php
require_once '../config/config.php';
$id = getValue('id', 'int', 'POST', '');
if ($id == 0) {
    header("Location: /");
}
// session_start();
$access_token   = $_SESSION['login']['acc_token'];
$curl           = curl_init();
$header[]       = 'Authorization: ' . $access_token . '';
$curl     = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://chamcong.24hpay.vn/service/list_all_employee_of_company.php?id_com=' . $_SESSION['login']['id_com'],
    CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
));
$resp = curl_exec($curl);
$responsive = json_decode($resp);
$data_ep = [];
for ($i = 0; $i < count($responsive->data->items); $i++) {
    $data_ep[$responsive->data->items[$i]->ep_id] = $responsive->data->items[$i];

    $birth = strtotime($responsive->data->items[$i]->ep_birth_day);

    $data_ep[$responsive->data->items[$i]->ep_id]->ep_birth_day = date('d/m/Y', $birth);

    if ($responsive->data->items[$i]->ep_married == 1) {
        $data_ep[$responsive->data->items[$i]->ep_id]->ep_married = 'Đã có gia đình';
    } else {
        $data_ep[$responsive->data->items[$i]->ep_id]->ep_married = 'Độc thân';
    }

    $create_time = strtotime($responsive->data->items[$i]->create_time);
    $data_ep[$responsive->data->items[$i]->ep_id]->create_time = date('d/m/Y', $create_time);

    // Trình độ học vấn
    switch ($responsive->data->items[$i]->ep_exp) {
        case '1':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Trên Đại học';
            break;

        case '2':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Đại học';
            break;

        case '3':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Cao đẳng';
            break;

        case '4':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Trung cấp';
            break;

        case '5':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Đào tạo nghề';
            break;

        case '6':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Trung học phổ thông';
            break;

        case '7':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Trung học cơ sở';
            break;

        case '8':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Tiểu học';
            break;
    }

    //Chức vụ
    switch ($responsive->data->items[$i]->position_id) {
        case '1':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Sinh viên thực tập';
            break;

        case '2':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Nhân viên thử việc';
            break;

        case '3':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Nhân viên chính thức';
            break;

        case '4':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Trưởng nhóm';
            break;

        case '5':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Phó trưởng phòng';
            break;

        case '6':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Trưởng phòng';
            break;

        case '7':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Phó giám đốc';
            break;

        case '8':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'giám đốc';
            break;
        case '9':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Nhân viên part time';
            break;
        case '10':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Phó ban dự án';
            break;
        case '11':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Trưởng ban dự án';
            break;
        case '12':
            $data_ep[$responsive->data->items[$i]->ep_id]->position_id = 'Phó tổ trưởng';
            break;

        case '14':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Phó tổng giám đốc';
            break;

        case '16':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Tổng giám đốc';
            break;
        case '17':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Thành viên hội đồng quản trị';
            break;
        case '18':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Phó chủ tịch hội đồng quản trị';
            break;
        case '19':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Chủ tịch hội đồng quản trị';
            break;
        case '20':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Nhóm phó';
            break;
        case '21':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Tổng giám đốc tập đoàn';
            break;
        case '22':
            $data_ep[$responsive->data->items[$i]->ep_id]->ep_exp = 'Phó tổng giám đốc tập đoàn';
            break;
    }
}

echo json_encode($data_ep[$id]);

<?php
require_once '../config/config.php';
require_once '../api/api_ep.php';
$dep_id = getValue('dep_id', 'int', 'POST', '');
$group_id = getValue('group_id', 'int', 'POST', '');
$curl     = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://chamcong.24hpay.vn/api_web_hr/ttvh_get_list_employee_leader_from_company.php?id_com=' . $_SESSION['login']['id_com'],
    CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
));
$resp = curl_exec($curl);
$data_manager = json_decode($resp)->data->items;
if ($dep_id == 0 && $group_id == 0) {
    header("Location: /");
} else {
    if ($group_id != 0) {
        $db_check = new db_query("SELECT id FROM department WHERE group_id = $group_id");
        if (mysql_num_rows($db_check->result) == 0) {
            $data = [
                'group_id' => $group_id,
                'id_company' => $_SESSION['login']['id_com'],
                'created_at' => time(),
                'updated_at' => time()
            ];
            add('department', $data);
        }
        $db = new db_query("SELECT * FROM `group` INNER JOIN department ON `group`.id = department.group_id WHERE `group`.id = $group_id AND `group`.id_company = " . $_SESSION['login']['id_com']);
        $row = mysql_fetch_array($db->result);
        $row['created_at'] = date('H:i',$row['created_at']) . ", " . date('d/m/Y', $row['created_at']);
        $row['updated_at'] = date('H:i',$row['updated_at']) . ", " . date('d/m/Y', $row['updated_at']);
        $id_manager = explode(',', $row['id_manager']);
        $manager = [];
        for ($i = 0; $i < count($id_manager); $i++) {
            $manager[$i]['id'] = $data_ep[$id_manager[$i]]->ep_id;
            $manager[$i]['name'] = $data_ep[$id_manager[$i]]->ep_name;
            if ($data_ep[$id_manager[$i]]->ep_image == "") {
                $manager[$i]['image'] = '../img/avatar_default.png';
            } else {
                $manager[$i]['image'] = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$id_manager[$i]]->ep_image;
            }
        }
        $id_employee = explode(',', $row['id_employee']);
        $employee = [];
        for ($i = 0; $i < count($id_employee); $i++) {
            $employee[$i]['id'] = $data_ep[$id_employee[$i]]->ep_id;
            $employee[$i]['name'] = $data_ep[$id_employee[$i]]->ep_name;
            if ($data_ep[$id_employee[$i]]->ep_image == "") {
                $employee[$i]['image'] = '../img/avatar_default.png';
            } else {
                $employee[$i]['image'] = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$id_employee[$i]]->ep_image;
            }
        }
        $arr = array_merge($id_manager, $id_employee);
        $row['count'] = count($arr);
        $row['manage'] = $manager;
        $row['employee'] = $employee;
    } else if ($dep_id != 0) {
        $db_check = new db_query("SELECT * FROM department WHERE dep_id = $dep_id");
        if (mysql_num_rows($db_check->result) == 0) {
            $data = [
                'dep_id' => $group_id,
                'id_company' => $_SESSION['login']['id_com'],
                'created_at' => time(),
                'updated_at' => time()
            ];
            add('department', $data);
            $id = mysql_insert_id();
            $db_check = new db_query("SELECT * FROM department WHERE id = $id");
            $description = "";
        }else{
            $row_dep = mysql_fetch_array($db_check->result);
            $description = $row_dep['description'];
        }
        $manager = [];
        for ($i = 0; $i < count($list_department); $i++) {
            if ($list_department[$i]->dep_id == $dep_id) {
                $row['group_id'] = $dep_id;
                $row['group_name'] = $list_department[$i]->dep_name;
                $row['count'] = $list_department[$i]->total_emp;
                $dep_create_time = strtotime($list_department[$i]->dep_create_time);
                $row['created_at'] = date('H:i',$dep_create_time) . ", " . date('d/m/Y', $dep_create_time);
                $row['updated_at'] = date('H:i',$dep_create_time) . ", " . date('d/m/Y', $dep_create_time);
                for ($i=0; $i < count($data_manager); $i++) { 
                    if ($data_manager[$i]->dep_id == $dep_id) {
                        $manager[$i]['ep_id'] = $data_manager[$i]->ep_id;
                        $manager[$i]['ep_name'] = $data_manager[$i]->ep_name;
                        if ($data_manager[$i]->ep_image = "") {
                            $img_manager = '../img/avatar_default.png';
                        }else{
                            $img_manager = 'https://chamcong.24hpay.vn/upload/employee/' . $data_manager[$i]->ep_image;
                        }
                        $manager[$i]['ep_image'] = $img_manager;
                        if ($data_manager[$i]->position_id == 5) {
                            $manager[$i]['position'] = "Trưởng phòng";
                        }else if($data_manager[$i]->position_id == 6){
                            $manager[$i]['position'] = "Phó phòng";
                        }
                    }
                }
                break;
            }
        }
        $row['manage'] = $manager;
        $employee = [];
        $j = 0;
        foreach ($data_ep as $key => $value) {
            if ($data_ep[$key]->dep_id == $dep_id) {
                $employee[$j]['id'] = $data_ep[$key]->ep_id;
                $employee[$j]['name'] = $data_ep[$key]->ep_name;
                if ($data_ep[$key]->ep_image == "") {
                    $employee[$j]['image'] = '../img/avatar_default.png';
                } else {
                    $employee[$j]['image'] = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$id_employee[$i]]->ep_image;
                }
                $j++;
            }
        }
        $row['employee'] = $employee;
    }
    echo json_encode([
        'data' => $row
    ]);
}

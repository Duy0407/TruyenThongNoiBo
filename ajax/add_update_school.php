<?php
require '../config/config.php';
$school_name = getValue('school_name','str','POST','');
$start = getValue('start','str','POST','');
$end = getValue('end','str','POST','');
$major = getValue('major','str','POST','');
$graduated = getValue('graduated','int','POST','');
$id = getValue('id','int','POST','');
$view_mode = getValue('view_mode','int','POST','');
$except = getValue('except','str','POST','');
$list_excepts = json_decode(getValue('arr_excepts','arr','POST',''), true);

if ($id > 0){
    $sql = "SELECT * FROM `ttnb_school` WHERE user_id = ".$_SESSION['login']['id']." AND id = ".$id;
    $db_bgi = new db_query($sql);
    if (mysql_num_rows($db_bgi->result) > 0){
        $data = [
            'school_name' => $school_name,
            'time_start' => strtotime($start),
            'time_end' => strtotime($end),
            'major' => $major,
            'graduated' => $graduated,
            'view_mode' => $view_mode,
            'except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'updated_at' => time(),
        ];
        update('ttnb_school', $data, ['id' => $id]);
        // xóa chế độ xem
        $del = delete('school_user_view_mode', ['school_user_id' => $id]);
        // thêm chế độ xem
        if ($list_excepts) {
            foreach ($list_excepts as $k => $v) {
                $data_insert_excepts = [
                    'school_user_id' => $id,
                    'user_id' => $v['id'],
                    'user_type' => $v['type'],       
                    'created_at' => time(),
                    'updated_at' => time(),
                ]; 
                add('school_user_view_mode', $data_insert_excepts);
            }  
        }
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        echo json_encode(['result'=>false,'msg'=>'Nơi làm việc không tồn tại']);
    }
}else{
    $data = [
        'school_name' => $school_name,
        'time_start' => strtotime($start),
        'time_end' => strtotime($end),
        'major' => $major,
        'graduated' => $graduated,
        'view_mode' => $view_mode,
        'except' => $except,
        'user_id' => $_SESSION['login']['id'],
        'user_type' => $_SESSION['login']['user_type'],
        'created_at' => time(),
        'updated_at' => time(),
    ];
    add('ttnb_school', $data);
    $id = mysql_insert_id();
    // thêm chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'school_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'],       
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('school_user_view_mode', $data_insert_excepts);
        }  
    }
    echo json_encode(['result'=>true]);
}
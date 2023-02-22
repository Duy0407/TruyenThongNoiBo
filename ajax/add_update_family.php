<?php
require '../config/config.php';
$select_user = getValue('select_user','int','POST','');
$select_relative = getValue('select_relative','int','POST','');
$id = getValue('id','int','POST',0);
$view_mode = getValue('view_mode','int','POST','');
$except = getValue('except','str','POST','');
$list_excepts = json_decode(getValue('arr_excepts','arr','POST',''), true);

if ($select_user > 0 && $select_relative > 0){
    if ($id > 0){
        $sql = "SELECT * FROM `ttnb_family` WHERE user_id = ".$_SESSION['login']['id']." AND id = ".$id;
        $db_bgi = new db_query($sql);
        if (mysql_num_rows($db_bgi->result) > 0){
            $data = [
                'mem_id' => $select_user,
                'mem_type' => 2,
                'relative_id' => $select_relative,
                'view_mode' => $view_mode,
                'except' => $except,
                'user_id' => $_SESSION['login']['id'],
                'user_type' => $_SESSION['login']['user_type'],
                'updated_at' => time(),
            ];
            update('ttnb_family', $data, ['id' => $id]);
            // xóa chế độ xem
            $del = delete('family_user_view_mode', ['family_user_id' => $id]);
            // thêm chế độ xem
            if ($list_excepts) {
                foreach ($list_excepts as $k => $v) {
                    $data_insert_excepts = [
                        'family_user_id' => $id,
                        'user_id' => $v['id'],
                        'user_type' => $v['type'],       
                        'created_at' => time(),
                        'updated_at' => time(),
                    ]; 
                    add('family_user_view_mode', $data_insert_excepts);
                }  
            }
            echo json_encode(['result'=>true,'code'=>'201']);
        }else{
            echo json_encode(['result'=>false,'msg'=>'Nơi làm việc không tồn tại']);
        }
    }else{
        $data = [
            'mem_id' => $select_user,
            'mem_type' => 2,
            'relative_id' => $select_relative,
            'view_mode' => $view_mode,
            'except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];

        add('ttnb_family', $data);
        $id = mysql_insert_id();
        // thêm chế độ xem
        if ($list_excepts) {
            foreach ($list_excepts as $k => $v) {
                $data_insert_excepts = [
                    'family_user_id' => $id,
                    'user_id' => $v['id'],
                    'user_type' => $v['type'],       
                    'created_at' => time(),
                    'updated_at' => time(),
                ]; 
                add('family_user_view_mode', $data_insert_excepts);
            }  
        }
        echo json_encode(['result'=>true]);
    }
}else{
    echo json_encode(['result'=>false,'msg'=>'Dữ liệu nhập không đầy đủ']);
}
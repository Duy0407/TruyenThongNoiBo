<?php
require '../config/config.php';
$cty = getValue('cty','str','POST','');
$vtr = getValue('vtr','str','POST','');
$dch = getValue('dch','str','POST','');
$wat = getValue('wat','int','POST','');
$id = getValue('id','int','POST','');
$view_mode = getValue('view_mode','int','POST','');
$except = getValue('except','str','POST',''); 
$list_excepts = json_decode(getValue('arr_excepts','arr','POST',''), true);

if ($wat == 1){
    update('ttnb_work_place', ['working_here' => 0], ['user_id' => $_SESSION['login']['id'],'working_here' => 1]);
}
if ($id > 0){
    $sql = "SELECT * FROM `ttnb_work_place` WHERE user_id = ".$_SESSION['login']['id']." AND id = ".$id;
    $db_bgi = new db_query($sql);
    $info_work = mysql_fetch_array($db_bgi->result);
    if (mysql_num_rows($db_bgi->result) > 0){
        $data = [
            'company_name' => $cty,
            'position' => $vtr,
            'address' => $dch,
            'working_here' => $wat,
            'view_mode' => $view_mode,
            'except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'updated_at' => time(),
        ];
        update('ttnb_work_place', $data, ['id' => $id]);
        // xóa chế độ xem
        $del = delete('work_place_view_mode', ['work_place_id' => $id]);
        // thêm chế độ xem
        if ($list_excepts) {
            foreach ($list_excepts as $k => $v) {
                $data_insert_excepts = [
                    'work_place_id' => $id,
                    'user_id' => $v['id'],
                    'user_type' => $v['type'],       
                    'created_at' => time(),
                    'updated_at' => time(),
                ]; 
                add('work_place_view_mode', $data_insert_excepts);
            }  
        }
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        echo json_encode(['result'=>false,'msg'=>'Nơi làm việc không tồn tại']);
    }
}else{ 
    $data = [
        'company_name' => $cty,
        'position' => $vtr,
        'address' => $dch,
        'working_here' => $wat,
        'view_mode' => $view_mode,
        'except' => $except,
        'user_id' => $_SESSION['login']['id'],
        'user_type' => $_SESSION['login']['user_type'],
        'created_at' => time(),
        'updated_at' => time(),
    ];
    add('ttnb_work_place', $data);
    $id = mysql_insert_id();
    // thêm chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'work_place_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'],       
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('work_place_view_mode', $data_insert_excepts);
        }  
    }
    echo json_encode(['result'=>true]);
}
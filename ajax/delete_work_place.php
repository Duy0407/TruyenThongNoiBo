<?php
require '../config/config.php';
$id = getValue('id','int','POST',0);
$id_school = getValue('id_school','int','POST',0);
$id_mem = getValue('id_mem','int','POST',0);

$my_id = $_SESSION['login']['id'];
$my_avt = $_SESSION['login']['logo'];

if ($id > 0){
    $row = new db_query("SELECT * FROM ttnb_work_place WHERE id = ".$id." AND user_id = ".$my_id);
    if (mysql_num_rows($row->result) > 0){
        $row = mysql_fetch_array($row->result);
    
        $update = new db_query("DELETE FROM ttnb_work_place WHERE id = ".$id." AND user_id = ".$my_id);
        if ($update->result){
            // xóa chế độ xem
            $del = delete('work_place_view_mode', ['work_place_id' => $id]);
            echo json_encode([
                "result" => true,
            ]);
        }else{
            echo json_encode([
                "result" => false,
                "msg" => "Có lỗi xảy ra"
            ]);
        }
        
    }else{
        echo json_encode([
            "result" => false,
            "msg" => "nơi làm việc không tồn tại"
        ]);
    }
}elseif ($id_school > 0){
    $row = new db_query("SELECT * FROM ttnb_school WHERE id = ".$id_school." AND user_id = ".$my_id);
    if (mysql_num_rows($row->result) > 0){
        $row = mysql_fetch_array($row->result);
    
        $update = new db_query("DELETE FROM ttnb_school WHERE id = ".$id_school." AND user_id = ".$my_id);
        if ($update->result){
            // xóa chế độ xem
            $del = delete('school_user_view_mode', ['school_user_id' => $id_school]);
            echo json_encode([
                "result" => true,
            ]);
        }else{
            echo json_encode([
                "result" => false,
                "msg" => "Có lỗi xảy ra"
            ]);
        }
        
    }else{
        echo json_encode([
            "result" => false,
            "msg" => "Trường học không tồn tại"
        ]);
    }
}elseif ($id_mem > 0){
    $row = new db_query("SELECT * FROM ttnb_family WHERE id = ".$id_mem." AND user_id = ".$my_id);
    if (mysql_num_rows($row->result) > 0){
        $row = mysql_fetch_array($row->result);
    
        $update = new db_query("DELETE FROM ttnb_family WHERE id = ".$id_mem." AND user_id = ".$my_id);
        if ($update->result){
            // xóa chế độ xem
            $del = delete('family_user_view_mode', ['family_user_id' => $id_mem]);
            echo json_encode([
                "result" => true,
            ]);
        }else{
            echo json_encode([
                "result" => false,
                "msg" => "Có lỗi xảy ra"
            ]);
        }
        
    }else{
        echo json_encode([
            "result" => false,
            "msg" => "Trường học không tồn tại"
        ]);
    }
}

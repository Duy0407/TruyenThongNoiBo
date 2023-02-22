<?php
require '../config/config.php';
$cmt_id = getValue('cmt_id','int','POST','');

$my_id = $_SESSION['login']['id'];
$my_avt = $_SESSION['login']['logo'];

$row = new db_query("SELECT comment.* FROM comment JOIN new_feed ON comment.id_new = new_feed.new_id WHERE id = ".$cmt_id);
if (mysql_num_rows($row->result) > 0){
    $row = mysql_fetch_array($row->result);

    $update = new db_query("UPDATE comment SET `hidden` = 1 - `hidden` WHERE id = ".$cmt_id);
    if ($update->result){
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
        "msg" => "không có cmt"
    ]);
}

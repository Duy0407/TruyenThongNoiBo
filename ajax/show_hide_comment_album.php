<?php
require '../config/config.php';
$cmt_id = getValue('cmt_id','int','POST','');

$my_id = $_SESSION['login']['id'];
$my_avt = $_SESSION['login']['logo'];

$row = new db_query("SELECT comment_album.* FROM comment_album JOIN album ON comment_album.album_id = album.id WHERE comment_album.id = ".$cmt_id);
if (mysql_num_rows($row->result) > 0){
    $row = mysql_fetch_array($row->result);

    $update = new db_query("UPDATE comment_album SET `hidden` = 1 - `hidden` WHERE id = ".$cmt_id);
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

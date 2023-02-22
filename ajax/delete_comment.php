<?php
require '../config/config.php';
$cmt_id = getValue('cmt_id','int','POST','');

$my_id = $_SESSION['login']['id'];
$my_avt = $_SESSION['login']['logo'];

$row_cmt = new db_query("SELECT comment.* FROM comment JOIN new_feed ON comment.id_new = new_feed.new_id WHERE id = ".$cmt_id);
if (mysql_num_rows($row_cmt->result) > 0){
    $row = mysql_fetch_array($row_cmt->result);

    if (is_writable($row['image']) && $row['image']) {
        unlink($row['image']);
    }
    $update = new db_query("DELETE FROM comment WHERE id = ".$cmt_id);
    if ($update->result){
        // nếu là cmt cha thì xóa tất cả các cmt con
        if (!$row['id_parent']) {
            $cmt_child = select('*', 'comment', '', ['id_parent'=>$cmt_id]);
            foreach ($cmt_child as $k => $v) {
                if (is_writable($v['image']) && $v['image']) {
                    unlink($v['image']);
                }
                delete('comment', ['id'=>$v['id']]); 
            }
        }
        $count_cmt_post = new db_query("SELECT * FROM comment WHERE id_new = " . $row['id_new']);
        echo json_encode([
            "result" => true,
            'count_cmt_post' => mysql_num_rows($count_cmt_post->result)
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
        "msg" => "không tìm thấy bình luận"
    ]);
}

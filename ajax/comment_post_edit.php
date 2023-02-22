<?php
require_once '../config/config.php';
$comment = getValue('comment', 'str', 'POST', '');
$cmt_id = getValue('cmt_id', 'int', 'POST', '');
$img_comment = getValue('img_comment', 'str', 'POST', '');
$file_delete = getValue('file_delete', 'int', 'POST', '');

$info_cmt = select('*', 'comment', '', ['id'=> $cmt_id]); 
if (count($info_cmt) > 0) {
    $data = [
        'content' => $comment, 
        'updated_at' => time()
    ];
    if(isset($_FILES['img_comment'])){
        $file = $_FILES['img_comment'];
    } else{
        $file = '';
    }
    if (!$file_delete) {
        $data['image'] = '';
        if (is_writable($info_cmt[0]['image']) && $info_cmt[0]['image']) {
            unlink($info_cmt[0]['image']);
        }
    } else {
        if($file){
            if (is_writable($info_cmt[0]['image']) && $info_cmt[0]['image']) {
                unlink($info_cmt[0]['image']);
            }
        }
    }
    if ($file && $_FILES['img_comment']['name'] != "") {
        $duoi = explode(".", $_FILES['img_comment']['name']);
        $duoi = $duoi[count($duoi) - 1];
        $name_file = rand() . "." . $duoi;
        $name_tmp = $_FILES['img_comment']['tmp_name'];
        $dir = "../img/new_feed/comment";
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        } 
        move_uploaded_file($name_tmp, $dir . "/" . $name_file);

        $img =  $dir . "/" . $name_file;
        $data['image'] = $img;
    }  
    update('comment', $data, ['id' => $cmt_id]);
    $result = [
        'result' => true,
            'comment' => select('*', 'comment', '', ['id'=> $cmt_id])
    ];
} else {
    $result = [
        'result' => false,
        'message' => 'Không tìm thấy bình luận'
    ];
}
echo json_encode($result); 

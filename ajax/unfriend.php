<?php
require '../config/config.php';

$unfriend_id = getValue('unfriend_id','int','POST',0);

$unfollow_id = getValue('unfollow_id','int','POST',0);
$unfollow_id_type = getValue('unfollow_id_type','int','POST',0);
$unfollow_time = getValue('unfollow_time','int','POST',0);

$block_id_chat = getValue('block_id_chat','int','POST',0);
$block_id = getValue('block_id','int','POST',0);
$block_id_type = getValue('block_id_type','int','POST',0);

if ($unfriend_id > 0){
    $data_token = unfriend($my_id_chat, $unfriend_id);
    if ($data_token['error'] == null){
        echo json_encode(['result'=>true]);
    }else{
        echo json_encode(['result'=>false,'msg'=>$data_token['error']['message']]);
    }
}elseif ($unfollow_id > 0){
    $sql = "SELECT * FROM unfollow WHERE user_id = ".$_SESSION['login']['id']." AND user_type = ".$_SESSION['login']['user_type']." AND friend_id = ".$unfollow_id." AND friend_type = ".$unfollow_id_type." AND (block_type = 0 OR (block_type = 1 AND block_exp >= ".time()."))";
    $db_bgi = new db_query($sql);

    if (mysql_num_rows($db_bgi->result) <= 0){
        // unfollow
        if ($unfollow_time > 0){
            $data = [
                'user_id' => $_SESSION['login']['id'],
                'user_type' => $_SESSION['login']['user_type'],
                'friend_id' => $unfollow_id,
                'friend_type' => $unfollow_id_type,
                'block_type' => 1,
                'block_exp' => time() + $unfollow_time*86400,
                'created_at' => time(),
            ];
        }else{
            $data = [
                'user_id' => $_SESSION['login']['id'],
                'user_type' => $_SESSION['login']['user_type'],
                'friend_id' => $unfollow_id,
                'friend_type' => $unfollow_id_type,
                'block_type' => 0,
                'created_at' => time(),
            ];
        }
        add('unfollow', $data);    
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        // follow
        $sql = "DELETE FROM unfollow WHERE user_id = ".$_SESSION['login']['id']." AND user_type = ".$_SESSION['login']['user_type']." AND friend_id = ".$unfollow_id." AND friend_type = ".$unfollow_id_type." AND (block_type = 0 OR (block_type = 1 AND block_exp >= ".time()."))";
        $db_bgi = new db_query($sql);

        echo json_encode(['result'=>$db_bgi->result,'msg'=>(!$db_bgi->result)?"Theo dõi không thành công":""]);
    }

}elseif ($block_id > 0){
    if (in_array($block_id,$arr_my_block)){
        //bỏ chặn tin nhắn chat 365
        if (unBlockChat365($my_id_chat,$block_id_chat)){
            echo json_encode(['result'=>true,'msg'=>"Bỏ chặn thành công"],JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(['result'=>false,'msg'=>"Bỏ chặn không thành công"],JSON_UNESCAPED_UNICODE);
        }
    }else{
        // chặn tin nhắn chat365
        if (BlockChat365($my_id_chat,$block_id_chat)){
            echo json_encode(['result'=>true,'msg'=>"Chặn thành công"],JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(['result'=>false,'msg'=>"Chặn không thành công"],JSON_UNESCAPED_UNICODE);
        }
    }
}else{
    echo json_encode(['result'=>false,'msg'=>'Thông tin nhập vào không hợp lệ']);
}
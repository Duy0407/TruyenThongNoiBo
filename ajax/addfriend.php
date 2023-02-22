<?php
require '../config/config.php';
require_once '../new_view/after_login_config.php';

$addfriend_id = getValue('addfriend_id','int','POST',0);

$acceptInvite_id = getValue('acceptInvite_id','int','POST',0);

$denyInvite_id = getValue('denyInvite_id','int','POST',0);

$deleteInvite_id = getValue('deleteInvite_id','int','POST',0);

if ($addfriend_id > 0){
    $data_token = addfriend($my_id_chat, $addfriend_id);
    if ($data_token['error'] == null){
        echo json_encode(['result'=>true]);
    }else{
        echo json_encode(['result'=>false,'msg'=>$data_token['error']['message']]);
    }
}elseif ($acceptInvite_id > 0){
    $data_token = acceptInvite($my_id_chat, $acceptInvite_id);
    if ($data_token['error'] == null){
        echo json_encode(['result'=>true]);
    }else{
        echo json_encode(['result'=>false,'msg'=>$data_token['error']['message']]);
    }
}elseif ($denyInvite_id > 0){
    $data_token = denyInvite($my_id_chat, $denyInvite_id);
    if ($data_token['error'] == null){
        echo json_encode(['result'=>true]);
    }else{
        echo json_encode(['result'=>false,'msg'=>$data_token['error']['message']]);
    }
}elseif ($deleteInvite_id > 0){
    $data_token = deleteInvite($my_id_chat, $deleteInvite_id);
    if ($data_token['error'] == null){
        echo json_encode(['result'=>true]);
    }else{
        echo json_encode(['result'=>false,'msg'=>$data_token['error']['message']]);
    }
}else{
    echo json_encode(['result'=>false,'msg'=>'Thông tin nhập vào không hợp lệ']);
}
<?php
require_once '../config/config.php';
$content = getValue('content','str','POST','');
$id_user_tag = getValue('id_user_tag','int','POST','');
if ($content == "") {
    header("Location: /");
}else{
    $data = [
        'type'=>3,
        'id_user'=>$_SESSION['login']['id'],
        'id_company'=>$_SESSION['login']['id_com'],
        'content'=> $content,
        'user_type'=>$_SESSION['login']['user_type'],
        'id_user_tag'=>$id_user_tag,
        'created_at'=>time(),
        'updated_at'=>time()
    ];
    add('notify',$data);
    echo json_encode([
        'result'=>true
    ]);
}
?>
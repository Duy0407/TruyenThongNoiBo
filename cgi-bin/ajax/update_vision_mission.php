<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$content = getValue('content','str','POST','');
if ($content != "") {
    $dataId = [
        'id_company' => $_SESSION['login']['id_com']
    ];
    if ($id == 1) {
        $data = [
            'vision' => $content,
            'updated_at' => time()
        ];
        update('vision_misson',$data,$dataId);
        $value = $content;
    }else if($id == 2){
        $data = [
            'mission' => $content,
            'updated_at' => time()
        ];
        update('vision_misson',$data,$dataId);
        $value = $content;
    }else if($id == 3){
        $data = [
            'description' => $content,
            'updated_at' => time()
        ];
        update('vision_misson',$data,$dataId);
        $value = $content;
    }
}
$data_notify = [
   'type' => 5,
   'id_user' => $_SESSION['login']['id'],
   'id_company' => $_SESSION['login']['id_com'],
   'content' => $content,
   'user_type' => $_SESSION['login']['user_type'],
   'created_at' => time(),
   'updated_at' => time() 
]; 

add('notify', $data_notify);
echo json_encode([
    'result' => true,
    'value' => $value
]);
?>
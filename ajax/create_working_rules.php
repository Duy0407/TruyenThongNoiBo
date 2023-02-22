<?php
require_once '../config/config.php';
$name = getValue('name','str','POST','');
$content = getValue('content','str','POST','');
$comment = getValue('comment','int','POST','');
$notify = getValue('notify','int','POST','');
$send_mail = getValue('send_mail','int','POST','');
if ($name == "" || $content == "" || !isset($_FILES['file'])) {
    header("Location: /");
}else{
    $dir = '../img/vanhoadoanhnghiep/working_rules/';
    if (!is_dir($dir . $_SESSION['login']['id_com'])) {
        mkdir($dir . $_SESSION['login']['id_com'], 0777, true);
    }
    $tmp_name = $_FILES['file']['tmp_name'];
    $duoi = explode('/',$_FILES['file']['type']);
    $duoi = $duoi[count($duoi) - 1];
    $name_img = rand() . '.' . $duoi;
    move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id_com'] . '/' . $name_img);
    $data = [
        'id_user'=>$_SESSION['login']['id'],
        'name'=> $name,
        'content' => $content,
        'img' => $name_img,
        'comment'=>$comment,
        'id_company'=>$_SESSION['login']['id_com'],
        'user_type' => $_SESSION['login']['user_type'],
        'created_at'=>time(),
        'updated_at'=>time()
    ];
    add('working_rules',$data);
    
    if ($notify == 1) {
        $data = [
            'type' => 4,
            'id_user'=>$_SESSION['login']['id'],
            'id_company' => $_SESSION['login']['id_com'],
            'content' => $name,
            'user_type' => $_SESSION['login']['user_type'],
            'created_at'=>time(),
            'updated_at'=>time()
        ];
        add('notify',$data);
    }
    echo json_encode([
        'result' => true
    ]);
}
?>
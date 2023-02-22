<?php
require_once '../config/config.php';
$name = getValue('dep_name','str','POST','');
$description = getValue('dep_description','str','POST','');
$mode = getValue('mode','int','POST','');
$request_censorship = getValue('request_censorship','int','POST','');
$type = getValue('type','int','POST','');
$dep_id = getValue('dep_id','int','POST','');
$group_id = getValue('group_id','int','POST','');

if ($name == "" || $description == "" || $request_censorship == 0 || $type == 0) {
    header("Location: /");
}else{
    if ($type == 2) {
        $data = [
            'group_name' => $name,
            'group_mode' => $mode
        ];
        $dataId = [
            'id' => $group_id
        ];
        update('group',$data,$dataId);
        $dataId1 = [
            'group_id' => $group_id
        ];
    }else{
        $dataId1 = [
            'dep_id' => $dep_id
        ];
    }
    $data1 = [
        'description' => $description,
        'request_censorship' => $request_censorship,
        'updated_at' => time()
    ];
    update('department',$data1,$dataId1);
    echo json_encode([
        'result' => true
    ]);
}
?>
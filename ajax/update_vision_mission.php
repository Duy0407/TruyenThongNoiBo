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
$db_check = new db_query("SELECT * FROM update_calendar WHERE `type` = 1 AND `time` = 0 AND id_company = " . $_SESSION['login']['id_com']);
if (mysql_num_rows($db_check->result) == 0) {
    $data2 = [
        'type' => 1,
        'time' => 0,
        'id_company' => $_SESSION['login']['id_com'],
        'created_at' => time(),
        'updated_at' => time()
    ];
    add('update_calendar', $data2);
}
echo json_encode([
    'result' => true,
    'value' => $value
]);
?>
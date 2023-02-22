<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
$dataId['id'] = $id;
$data = [
    'delete' => 1,
    'updated_at'=>time()
];
update('working_rules',$data,$dataId);
echo json_encode([
    'result' => true
]);
?>
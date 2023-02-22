<?php
require_once '../config/config.php';
$type = getValue('type','int','POST','');
if ($type == 0) {
    header("Location: /");
}else{
    $data = [];
    if ($type == 3) {
        $qr = new db_query("SELECT * FROM knowledge WHERE `delete` = 1");
        while($row = mysql_fetch_array($qr->result)){
            $data[] = $row;
        }
    }
    echo json_encode([
        'data'=>$data
    ]);
}
?>
<?php
require_once '../config/config.php';
$id_company = getValue('id_company','int','POST','');
if ($id_company == 0) {
    header("Location: /");
}else{
    $db = new db_query("SELECT `address` FROM vision_misson WHERE id_company = " . $_SESSION['login']['id_com']);
    $row = mysql_fetch_array($db->result);
    $data = $row['address'];
    echo json_encode([
        'data'=>$data
    ]);
}
?>
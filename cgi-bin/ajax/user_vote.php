<?php
require_once '../config/config.php';
$id_vote = getValue('id_vote','int','POST','');
$type = getValue('type','int','POST','');
if ($type == 0) {
    $data = [
        'id_user' => $_SESSION['login']['id'],
        'id_vote' => $id_vote,
        'user_type' => $_SESSION['login']['user_type']
    ];
    add('user_vote',$data);
}else{
    $db_del = new db_query("DELETE FROM user_vote WHERE id_vote = $id_vote AND id_user = " . $_SESSION['login']['id']);
}
echo json_encode([
    'result'=>true
])
?>
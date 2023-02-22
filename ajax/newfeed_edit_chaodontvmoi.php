<?php
require_once "../config/config.php";
$new_id = getValue('new_id','int','POST','');
$check[] = $new_id;
$id_users_tags = getValue('id_users_tags','arr','POST','');
$id_users_tags = implode(",", $id_users_tags);
$check[] = $id_users_tags;
$content = getValue('content','str','POST','');
$check[] = $content;
$val = checkPost($check);
if ($val == 1) {
    header("Location: /");
}
$dataId = [
    'new_id'=>$new_id
];
$data = [
    'content'=>$content,
    'id_user_tags'=>$id_users_tags
];
update('new_feed',$data,$dataId);
echo json_encode([
    'result'=>true
]);
?>
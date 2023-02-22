<?php
require '../config/config.php';

$new_id = getValue("new_id","str","GET","");
$select = "nvm_new_id, nvm_user_id, nvm_user_type, nvm_type";
$list_regime = select($select, 'new_view_mode', '', ['nvm_new_id'=> $new_id], '', 'nvm_created_at DESC');

echo json_encode($list_regime); 

?>
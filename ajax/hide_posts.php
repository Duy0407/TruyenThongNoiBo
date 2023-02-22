<?php
require_once '../config/config.php';

$id_post_hide = getValue("id_post_hide","int","POST",0);

$data['new_id'] = $id_post_hide;
$data['user_id'] = $my_id;
$data['user_type'] = $my_type;
$data['created_at'] = time();
add('new_hide_post', $data);
?>
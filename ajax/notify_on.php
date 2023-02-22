<?php
require_once '../config/config.php';

$id_post = getValue("id_post","int","POST",0);

$data['new_id'] = $id_post;
$data['user_id'] = $my_id;
$data['user_type'] = $my_type;
$data['created_at'] = time();
add('new_notify_on', $data);

?>
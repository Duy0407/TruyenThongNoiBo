<?php
require_once '../config/config.php';
$id_post = getValue("id_post","int","POST",0);

if ($my_type == 1){
    $db_delete_post_save = new db_query("DELETE save_post
    FROM `save_post` JOIN add_collection ON save_post.id_collection = add_collection.id_collection 
    WHERE `id_posts` = '$id_post' AND `id_user` = '$my_id' AND user_type = 1");
}elseif ($my_type == 0 || $my_type == 2){
    $db_delete_post_save = new db_query("DELETE save_post
    FROM `save_post` JOIN add_collection ON save_post.id_collection = add_collection.id_collection 
    WHERE `id_posts` = '$id_post' AND `id_user` = '$my_id' AND (user_type = 0 OR user_type = 2)");
}
echo json_encode(['result'=>true]);
?>
<?php
require_once '../config/config.php';

$comment_id = getValue('comment_id',"int","GET",0);

$sql_cmt = "
    SELECT comment.*, COUNT(like_comment.id) AS count_like,
    (CASE WHEN EXISTS (SELECT id FROM `like_comment` 
    WHERE like_comment.id_comment = comment.id AND like_comment.id_user = $my_id) 
    THEN 1 ELSE 0 END) AS liked,
    (CASE WHEN EXISTS (SELECT id FROM `comment` AS cmt_child WHERE cmt_child.id_parent = comment.id) THEN 1 ELSE 0 END) AS had_child
    FROM comment LEFT JOIN like_comment ON comment.id = like_comment.id_comment 
    WHERE comment.id = " . $comment_id;
$pr_cmt = new db_query($sql_cmt); 
$info = $pr_cmt->result_array();

echo json_encode($info); 
?>
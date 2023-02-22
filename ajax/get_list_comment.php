<?php
require_once '../config/config.php';

$new_id = getValue('new_id',"int","GET","");
$comment_id = getValue('comment_id',"int","GET",0);
$list_loaded = getValue('list_loaded',"str","GET","");

$sql_cmt = "
    SELECT comment.*, COUNT(like_comment.id) AS count_like,
    (CASE WHEN EXISTS (SELECT id FROM `like_comment` 
    WHERE like_comment.id_comment = comment.id AND like_comment.id_user = $my_id) 
    THEN 1 ELSE 0 END) AS liked,
    (CASE WHEN EXISTS (SELECT id FROM `comment` AS cmt_child WHERE cmt_child.id_parent = comment.id) THEN 1 ELSE 0 END) AS had_child
    FROM comment LEFT JOIN like_comment ON comment.id = like_comment.id_comment 
    WHERE id_new = " . $new_id;

$sql_cmt_end = "    
    GROUP BY comment.id 
    ORDER BY created_at DESC 
";
$sql_cmt_parent = " AND id_parent = ".$comment_id."  AND comment.id NOT IN " . $list_loaded;
$sql_limit = " LIMIT 0, 3 ";

$pr_cmt = new db_query($sql_cmt.$sql_cmt_parent.$sql_cmt_end.$sql_limit); 
$arr_cmt = $pr_cmt->result_array();

// thêm những người lạ vào mảng bạn bè
$arr_in4[2] = $arr_ep;
$arr_in4 = add_strangers_to_arr_ep($arr_cmt, $arr_in4); 
foreach ($arr_cmt as $k => $cmt) {
    if($comment_id == 0){
        $sql_cmt_child = " AND comment.id_parent = ".$cmt['id'];
        $pr_cmt_child = new db_query($sql_cmt.$sql_cmt_child.$sql_cmt_end.$sql_limit); 
        $arr_cmt_child = $pr_cmt_child->result_array();
        $arr_in4 = add_strangers_to_arr_ep($arr_cmt_child, $arr_in4); 
        foreach ($arr_cmt_child as $c => $cmt_child) {
            if ($cmt_child['user_type'] == 1) {
                $name_author_child = $arr_in4[1][(int)$cmt_child['id_user']]['com_name'];
                $avt_com_i  = $arr_in4[1][(int)$cmt_child['id_user']]['com_logo'];
                if ($avt_com_i == "") {
                    $avt_cmt_child =  '/img/logo_com.png';
                } else {
                    $avt_cmt_child = 'https://chamcong.24hpay.vn/upload/company/logo/'.$avt_com_i;
                }
            } else {
                $name_author_child = $arr_in4[2][(int)$cmt_child['id_user']]['ep_name'];
                $avt_emp_i  = $arr_in4[2][(int)$cmt_child['id_user']]['ep_image'];
                if ($avt_emp_i == "") {
                    $avt_cmt_child =  '/img/logo_com.png';
                } else {
                    $avt_cmt_child = "https://chamcong.24hpay.vn/upload/employee/".$avt_emp_i;
                }
            }  
            $arr_cmt_child[$c]['name_user_cmt'] = $name_author_child;
            $arr_cmt_child[$c]['avt_user_cmt'] = $avt_cmt_child;
            $arr_cmt_child[$c]['list_react_cmt'] = select("*", 'like_comment', '', ['id_comment'=> $cmt_child['id']], '', 'created_at DESC');
        }
        $arr_cmt[$k]['list_reply_comment'] = $arr_cmt_child;
        $pr_cmt_count_child = new db_query($sql_cmt.$sql_cmt_child.$sql_cmt_end); 
        $arr_cmt[$k]['count_list_reply_comment'] = mysql_num_rows($pr_cmt_count_child->result);
    }
    if ($cmt['user_type'] == 1) {
        $name_author = $arr_in4[1][(int)$cmt['id_user']]['com_name'];
        $avt_com  = $arr_in4[1][(int)$cmt['id_user']]['com_logo'];
        if ($avt_com == "") {
            $avt_image =  '/img/logo_com.png';
        } else {
            $avt_image = 'https://chamcong.24hpay.vn/upload/company/logo/'.$avt_com;
        }
    } else { 
        $name_author = $arr_in4[2][(int)$cmt['id_user']]['ep_name'];
        $avt_emp  = $arr_in4[2][(int)$cmt['id_user']]['ep_image'];
        if ($avt_emp == "") {
            $avt_image =  '/img/logo_com.png';
        } else {
            $avt_image = "https://chamcong.24hpay.vn/upload/employee/".$avt_emp;
        }
    }  
    $arr_cmt[$k]['name_user_cmt'] = $name_author;
    $arr_cmt[$k]['avt_user_cmt'] = $avt_image;
    $arr_cmt[$k]['list_react_cmt'] = select("*", 'like_comment', '', ['id_comment'=> $cmt['id']], '', 'created_at DESC');
}
if (!$comment_id) {
    $pr_cmt_count = new db_query($sql_cmt." AND id_parent = 0  ".$sql_cmt_end); 
} else {
    $pr_cmt_count = new db_query($sql_cmt." AND id_parent = ".$comment_id.$sql_cmt_end); 
}
$count_list_comment = mysql_num_rows($pr_cmt_count->result);

echo json_encode([
    'list_comment' => $arr_cmt,
    'count_list_comment' => $count_list_comment
]); 
?>
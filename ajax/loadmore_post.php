<?php
require '../config/config.php';

$page = getValue('page','int','POST',1);
$ep_id = getValue('ep_id','int','POST',0);
$ep_type = getValue('ep_type','int','POST',0);
$lst_group = getValue('lst_group','str','POST','');
$group_id = getValue('group_id','int','POST',0);

if ($page <= 0){
    $page = 1;
}
$start = ($page - 1) * $limit_post;

if ($lst_group) { 
    $start = ($page - 1) * $limit_post_group;
    $sql = "SELECT new_feed.*, 
    (CASE WHEN EXISTS (SELECT id_save FROM `save_post` WHERE id_posts = new_id AND use_id = $my_id) THEN 1 ELSE 0 END) AS saved 
    FROM `new_feed`
    WHERE (FIND_IN_SET(position,'$lst_group') AND type = 1) AND approve = 0 
    GROUP BY new_feed.new_id 
    ORDER BY updated_at DESC LIMIT ".$start.",".$limit_post_group;
}
else if ($group_id) {
    $start = ($page - 1) * $limit_post_group;
    $tab_active = getValue('tab_active','int','POST',0);
    $sql_new_first = "SELECT * FROM new_feed 
                    WHERE `delete` = 0 AND approve = 0 AND position = $group_id AND type = 1 ";
    $sql_new_last = " GROUP BY new_id ORDER BY updated_at DESC LIMIT ".$start.",".$limit_post_group;
    // Lấy tất cả bài viết của nhóm
    if ($tab_active == 1) {
        $sql = $sql_new_first.$sql_new_last;      
    } 
    // Lấy bài viết đã ghim
    else if ($tab_active == 2) {
        $sql = $sql_new_first . ' AND ghim_group = 1 ' . $sql_new_last;
    } 
    // Lấy bài viết có video
    else if ($tab_active == 3) {
        $sql = $sql_new_first . " AND `file` LIKE '%video%' " . $sql_new_last;
    }
    $id_group = $group_id;
    $select_group = new db_query("SELECT `id`,`group_image`,`group_name`,SUBSTRING_INDEX(id_manager, ',', 1) AS id_manager,`id_employee`,`id_administrators`,`id_censor`,`group_mode`,`Pheduyet_post_member`,`introduce`,`group_location`,`hide_show`,`created_at`,`group_pause`,`group_pause_type`,`who_can_post`,`stop_inviting_me`,`pheduyet_yc_thanhvien`,`following` FROM `group` WHERE `id` = '$group_id'");
    $group = mysql_fetch_assoc($select_group->result);
    $arr_manager = explode(',', $group['id_manager']);
    $arr_administrators = explode(',', $group['id_administrators']);
} 
else {
    if ($ep_id == 0 && $ep_type == 0){
        $sql = "SELECT new_feed.*,
        (CASE WHEN EXISTS (SELECT id FROM `new_notify_on` WHERE new_notify_on.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS notify_on, 
        (CASE WHEN EXISTS (SELECT id_save FROM `save_post` JOIN add_collection ON save_post.id_collection = add_collection.id_collection WHERE id_posts = new_id AND id_user = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS saved
        FROM `new_feed` LEFT JOIN `like` ON new_feed.new_id = like.id_new 
        WHERE `delete` = 0 AND approve = 0 AND show_time <= ".time()." AND 
        NOT EXISTS (SELECT id FROM new_hide_post WHERE new_hide_post.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") AND 
        (
            author = $my_id OR 
            (position = $my_id AND type = 2) OR 
            (position = $my_dep_id AND type = 0) OR 
            (FIND_IN_SET(position,'$arr_my_group_id') AND type = 1) OR 
            (
                (view_mode = 0 OR
                (
                    (((author_type = 2 OR author_type = 0) AND FIND_IN_SET(author,'".$str_my_friend_emp."')) OR 
                    (author_type = 1 AND FIND_IN_SET(author,'".$str_my_friend_com."'))) AND (
                        view_mode = 2 OR 
                        (view_mode = 3 AND NOT EXISTS (SELECT * FROM new_view_mode WHERE new_view_mode.nvm_new_id = new_id AND new_view_mode.nvm_user_id = $my_id AND new_view_mode.nvm_user_type = $my_type)) OR
                        (view_mode = 4 AND EXISTS (SELECT * FROM new_view_mode WHERE new_view_mode.nvm_new_id = new_id AND new_view_mode.nvm_user_id = $my_id AND new_view_mode.nvm_user_type = $my_type))
                    )
                )) AND
                (
                    EXISTS (SELECT * FROM new_tags WHERE new_tags.nt_new_id = new_id AND new_tags.nt_user_id = $my_id AND new_tags.nt_user_type = $my_type) OR 
                    EXISTS (SELECT * FROM new_tags WHERE new_tags.nt_new_id = new_id AND FIND_IN_SET(new_tags.nt_user_id,'".$str_my_friend_emp."') AND (new_tags.nt_user_type = 0 OR new_tags.nt_user_type = 2)) OR 
                    EXISTS (SELECT * FROM new_tags WHERE new_tags.nt_new_id = new_id AND FIND_IN_SET(new_tags.nt_user_id,'".$str_my_friend_com."') AND new_tags.nt_user_type = 1) OR 
                    (
                        ( (FIND_IN_SET(author,'".$str_my_friend_emp."') AND (author_type = 2 OR author_type = 0)) OR
                        (FIND_IN_SET(author,'".$str_my_friend_com."') AND author_type = 1) ) AND
                        (type = 2 OR (type = 0 AND position = 0))
                    ) OR
                    (FIND_IN_SET(position,'".$str_my_friend_emp."') AND type = 2) OR
                    (FIND_IN_SET(position,'".$str_my_friend_com."') AND type = 3)
                )
            )
        )
        GROUP BY new_feed.new_id
        ORDER BY updated_at DESC LIMIT ".$start.",".$limit_post;
    }elseif ($ep_id > 0){
        if ($my_id > 0 && $ep_id == $my_id){
            // có đăng nhập & is my wall
            $sql = "SELECT new_feed.*, 
            (CASE WHEN EXISTS (SELECT id_save FROM `save_post` WHERE id_posts = new_id AND use_id = $my_id) THEN 1 ELSE 0 END) AS saved
            FROM `new_feed` LEFT JOIN `like` ON new_feed.new_id = like.id_new 
            WHERE `delete` = 0 AND approve = 0 AND show_time <= ".time()." AND FIND_IN_SET($my_id,hide_post) <= 0 AND (type = 2 OR (type = 0 AND position = 0)) AND 
            ((author = $my_id AND type = 0 AND position = 0) OR
            position = $my_id OR 
            (EXISTS (SELECT * FROM new_tags WHERE new_tags.nt_new_id = new_id AND new_tags.nt_user_id = $my_id AND new_tags.nt_user_type = $my_type) AND 
            (
                view_mode = 0 OR
                (
                    (((author_type = 2 OR author_type = 0) AND FIND_IN_SET(author,'".$str_my_friend_emp."')) OR 
                    (author_type = 1 AND FIND_IN_SET(author,'".$str_my_friend_com."'))) AND (
                        view_mode = 2 OR 
                        (view_mode = 3 AND NOT EXISTS (SELECT * FROM new_view_mode WHERE new_view_mode.nvm_new_id = new_id AND new_view_mode.nvm_user_id = $my_id AND new_view_mode.nvm_user_type = $my_type)) OR
                        (view_mode = 4 AND EXISTS (SELECT * FROM new_view_mode WHERE new_view_mode.nvm_new_id = new_id AND new_view_mode.nvm_user_id = $my_id AND new_view_mode.nvm_user_type = $my_type))
                    )
                )
            )
            ))
            GROUP BY new_feed.new_id 
            ORDER BY updated_at DESC LIMIT ".$start.",".$limit_post;
        }elseif ($my_id > 0){
            // có đăng nhập & not my wall
            $type_edit = 1;
            // mảng bạn bè
            $list_friends = list_friends_2($ep_id);
            $ep_friend = $list_friends['listAccount'];
            $arr_friend = [];
            foreach ($ep_friend as $key => $value) {
                if ($value['type365'] == 2 || $value['type365'] == 0){
                    $arr_friend[$value["id365"]] = $value;
                }
                if ($value['id365']==0){
                    unset($ep_friend[$key]);
                }
                if ($value['id365'] == $ep_id){
                    $ep_id_chat = $value['id'];
                    $ep_type = $value['type365'];
                    unset($ep_friend[$key]);
                }
            }
            // check is friend
            if (array_key_exists($my_id,$arr_friend)){
                $is_friend = 1;
            }
            $sql = "SELECT new_feed.*, 
            (CASE WHEN EXISTS (SELECT id_save FROM `save_post` WHERE id_posts = new_id AND use_id = $my_id) THEN 1 ELSE 0 END) AS saved
            FROM `new_feed` LEFT JOIN `like` ON new_feed.new_id = like.id_new 
            WHERE `delete` = 0 AND approve = 0 AND show_time <= ".time()." AND FIND_IN_SET($my_id,hide_post) <= 0 AND (type = 2 OR (type = 0 AND position = 0)) AND 
            ((author = $ep_id AND type = 0 AND position = 0) OR position = $ep_id OR EXISTS (SELECT * FROM new_tags WHERE new_tags.nt_new_id = new_id AND new_tags.nt_user_id = $ep_id AND new_tags.nt_user_type = $ep_type)) AND
            (
                view_mode = 0 OR
                (
                    (((author_type = 2 OR author_type = 0) AND FIND_IN_SET(author,'".$str_my_friend_emp."')) OR 
                    (author_type = 1 AND FIND_IN_SET(author,'".$str_my_friend_com."'))) AND (
                        view_mode = 2 OR 
                        (view_mode = 3 AND NOT EXISTS (SELECT * FROM new_view_mode WHERE new_view_mode.nvm_new_id = new_id AND new_view_mode.nvm_user_id = $my_id AND new_view_mode.nvm_user_type = $my_type)) OR
                        (view_mode = 4 AND EXISTS (SELECT * FROM new_view_mode WHERE new_view_mode.nvm_new_id = new_id AND new_view_mode.nvm_user_id = $my_id AND new_view_mode.nvm_user_type = $my_type))
                    )
                )
            )
            GROUP BY new_feed.new_id 
            ORDER BY new_id DESC LIMIT ".$start.",".$limit_post;
        }elseif ($ep_id > 0){
            // ko đăng nhập & is a wall
            $type_edit = 1;
            // mảng bạn bè
            $list_friends = list_friends_2($ep_id);
            $ep_friend = $list_friends['listAccount'];
            $arr_friend = [];
            foreach ($ep_friend as $key => $value) {
                if ($value['type365'] == 2 || $value['type365'] == 0){
                    $arr_friend[$value["id365"]] = $value;
                }
                if ($value['id365']==0){
                    unset($ep_friend[$key]);
                }
                if ($value['id365'] == $ep_id){
                    $ep_id_chat = $value['id'];
                    $ep_type = $value['type365'];
                    unset($ep_friend[$key]);
                }
            }
            // mảng bài đăng
            $sql = "SELECT new_feed.*, 0 AS saved
            FROM `new_feed` LEFT JOIN `like` ON new_feed.new_id = like.id_new 
            WHERE `delete` = 0 AND approve = 0 AND show_time <= ".time()." AND 
            (type = 2 OR (type = 0 AND position = 0)) AND 
                ((author = $ep_id AND type = 0 AND position = 0) OR 
                position = $ep_id OR 
                EXISTS (SELECT * FROM new_tags WHERE new_tags.nt_new_id = new_id AND new_tags.nt_user_id = $ep_id AND new_tags.nt_user_type = $ep_type)) AND 
            view_mode = 0
            GROUP BY new_feed.new_id 
            ORDER BY new_id DESC LIMIT ".$start.",".$limit_post;
        }
    }
}
 
$arr_stranger = [];
$com_stranger = [];
$db_post = new db_query($sql);
$arr_post = [];
while ($row = mysql_fetch_array($db_post->result)) {
    // tác giả của tin
    if ($row['author'] != '' && $row['author_type'] == 2 && !array_key_exists($row['author'],$arr_ep) && !in_array($row['author'],$arr_stranger)){
        $arr_stranger[] = $row['author'];
    }elseif ($row['author'] != '' && $row['author_type'] == 1 && !in_array($row['author'],$com_stranger)){
        $com_stranger[] = $row['author'];
    }
    // position của tin
    if ($row['position'] != '' && $row['type'] == 2 && !array_key_exists($row['position'],$arr_ep) && !in_array($row['position'],$arr_stranger)){
        $arr_stranger[] = $row['position'];
    }
    // tag của tin
    $tag = explode(",",$row['id_user_tags']);
    foreach ($tag as $key => $value) {
        if ($value != '' && !array_key_exists($value,$arr_ep) && !in_array($value,$arr_stranger) && $value > 0){
            $arr_stranger[] = $value;
        }
    }
    $lst_tags_post = select("nt_user_id, nt_user_type", 'new_tags', '', ['nt_new_id'=> $row['new_id']], '', 'nt_created_at DESC');
    foreach ($lst_tags_post as $k => $v) {
        if ($v['nt_user_id'] != '' && $v['nt_user_type'] == 2 && !array_key_exists($v['nt_user_id'],$arr_ep) && !in_array($v['nt_user_id'],$arr_stranger) && $v['nt_user_id'] > 0){
            $arr_stranger[] = $v['nt_user_id'];
        }elseif ($v['nt_user_id'] != '' && $v['nt_user_type'] == 1 && !in_array($v['nt_user_id'],$com_stranger) && $v['nt_user_id'] > 0){
            $com_stranger[] = $v['nt_user_id'];
        }
    }
    $row['lst_tags_post'] = $lst_tags_post;
    // danh những user thả cảm xúc bài viết  
    $row['list_react_post'] = select("nr_new_id, id_user, user_type, nr_created_at, nr_type", 'new_reaction', '', ['nr_new_id'=> $row['new_id']], '', 'nr_created_at DESC');
    
    // tác giả, position, tag của tin được chia sẻ
    if ($row['parents_id'] > 0){
        $db_new_share = new db_query("SELECT * FROM new_feed WHERE new_id = ".$row['parents_id']);
        $db_new_share = mysql_fetch_array($db_new_share->result);

        if ($db_new_share['author'] != '' && $db_new_share['author_type'] == 2 && !array_key_exists($db_new_share['author'],$arr_ep) && !in_array($db_new_share['author'],$arr_stranger)){
            $arr_stranger[] = $db_new_share['author'];
        }elseif ($db_new_share['author'] != '' && $db_new_share['author_type'] == 1 && !in_array($db_new_share['author'],$com_stranger)){
            $com_stranger[] = $db_new_share['author'];
        }
        if ($db_new_share['position'] != '' && $db_new_share['type'] == 2 && !array_key_exists($db_new_share['position'],$arr_ep) && !in_array($db_new_share['position'],$arr_stranger)){
            $arr_stranger[] = $db_new_share['position'];
        }
        $tag = explode(",",$db_new_share['id_user_tags']);
        foreach ($tag as $key => $value) {
            if ($value != '' && !array_key_exists($value,$arr_ep) && !in_array($value,$arr_stranger) && $value > 0){
                $arr_stranger[] = $value;
            }
        }
        // người vote của tin bình chọn
        if ($db_new_share['new_type'] == 7){
            $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $db_new_share['new_id']);
            while ($row_vote = mysql_fetch_array($db_vote->result)) {
                $db_user_vote = new db_query("SELECT * FROM user_vote WHERE id_vote = " . $row_vote['id']);
                
                if (mysql_num_rows($db_user_vote->result) > 0) {
                    while ($row_user = mysql_fetch_array($db_user_vote->result)) {
                        if ($row_user['id_user'] != '' && !array_key_exists($row_user['id_user'],$arr_ep) && !in_array($row_user['id_user'],$arr_stranger)){
                            $arr_stranger[] = $row_user['id_user'];
                        }
                    }
                }
            }
        }
    }
    // tác giả của album được chia sẻ
    if ($row['album_id'] > 0){
        $db_new_share = new db_query("SELECT * FROM album WHERE id = ".$row['album_id']);
        $db_new_share = mysql_fetch_array($db_new_share->result);

        if ($db_new_share['user_id'] != '' && $db_new_share['user_type'] == 2 && !array_key_exists($db_new_share['user_id'],$arr_ep) && !in_array($db_new_share['user_id'],$arr_stranger)){
            $arr_stranger[] = $db_new_share['user_id'];
        }
    }
    // người vote của tin bình chọn
    if ($row['new_type'] == 7){
        $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $row['new_id']);
        while ($row_vote = mysql_fetch_array($db_vote->result)) {
            $db_user_vote = new db_query("SELECT * FROM user_vote WHERE id_vote = " . $row_vote['id']);
            
            if (mysql_num_rows($db_user_vote->result) > 0) {
                while ($row_user = mysql_fetch_array($db_user_vote->result)) {
                    if ($row_user['id_user'] != '' && !array_key_exists($row_user['id_user'],$arr_ep) && !in_array($row_user['id_user'],$arr_stranger)){
                        $arr_stranger[] = $row_user['id_user'];
                    }
                }
            }
        }
    }
    // số lượng share
    $count_share = new db_query("SELECT * FROM share_post WHERE id_new = " . $row['new_id']);
    $row['count_share'] = mysql_num_rows($count_share->result);
    // số lượng tất cả cmt
    $count_comment = new db_query("SELECT * FROM comment WHERE id_new = " . $row['new_id']);
    $row['count_comment'] = mysql_num_rows($count_comment->result);
    // comment của tin
    $db_comment = new db_query("SELECT comment.*
    FROM comment 
    WHERE id_new = " . $row['new_id'] . " AND id_parent = 0
    GROUP BY comment.id 
    ORDER BY id DESC ");//LIMIT $limit_cmt
    while ($row_comment = mysql_fetch_array($db_comment->result)) {
        if ($row_comment['id_user'] != '' && $row_comment['user_type'] == 2 && !array_key_exists($row_comment['id_user'],$arr_ep) && !in_array($row_comment['id_user'],$arr_stranger)){
            $arr_stranger[] = $row_comment['id_user'];
        }
    }
    $arr_post[] = $row;
}
$arr_stranger = list_stranger_infor(implode(",",$arr_stranger));
$arr_stra = [];
foreach ($arr_stranger as $key => $value) {
    $arr_ep[$value['ep_id']] = $value;
}
$arr_in4[2] = $arr_ep;
$arr_in4[1] = [];
$com_stranger = list_stranger_cominfor(implode(",",$com_stranger));
foreach ($com_stranger as $key => $value) {
    $arr_in4[1][$value['com_id']] = $value;
}
foreach ($arr_post as $key => $row) { 
    if ($lst_group || $group_id) { ?>
        <div class="main_content_left_posts content_news_item">
            <div class="main_content_left_posts_pd">
    <?php }
    include '../includes/index_employee/post.php';
    if ($lst_group || $group_id) { ?>
            </div>
        </div>
    <?php }
}
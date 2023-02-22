<?php
require_once '../config/config.php';
$id_post = getValue("id_post","str","POST",'');
$time = time(); 
$arr_new_id = explode(',', $id_post);
foreach ($arr_new_id as $k => $new_id) {
    $db_post = new db_query("SELECT * FROM new_feed WHERE `new_id` = $new_id");
    if (mysql_num_rows($db_post->result) > 0){
        // phê duyệt bài viết
        $update_post = new db_query("UPDATE `new_feed` SET `approve` = 0, `created_at` = '$time', `updated_at` = '$time' WHERE `new_id` = '$new_id'");
        // select bài viết được duyệt
        $data = mysql_fetch_array($db_post->result);
        // lấy thông tin author
        $author = '';
        if ($data['author_type'] == 2){
            if (!array_key_exists($data['author'],$arr_ep)){
                $author = list_stranger_infor($data['author'])[0]['ep_name'];
            }else{
                $author = $arr_ep[$data['author']]['ep_name'];
            }
        }elseif ($data['author_type'] == 1){
            $author = list_stranger_cominfor($data['author'])[0]['com_name'];
        }
        // author friends
        $author_friend_id365 = [];
        if ($data['author'] == $my_id){
            $author_friend_id365 = $my_friend_id365;
        }elseif ($data['author_type'] == 2){
            $author_friend_id365 = list_friends_2($data['author']);
            $author_friend_id365 = array_column($author_friend_id365['listFriend'],'id365');
        }
        // tag
        if ($data['id_user_tags'] != ''){
            $id_user_tags = explode(',',$data['id_user_tags']);
        }else{
            $id_user_tags = [];
        }
        // notify on
        $notify_on = explode(',',$data['notify_on']);
        foreach ($id_user_tags as $key => $value) {
            $data_insert_notify = [
                'type' => 7,
                'id_user' => $my_id,
                'id_company' => $my_com_id,
                'content' =>  $author." đã gắn thẻ bạn trong 1 bài viết",
                'link' => "/chi-tiet-tin-dang.html?new_id=".$new_id,
                'invited_users' => $value,
                'invited_users_type' => 2,
                'created_at' => time(),
                'updated_at' => time(),
            ];
            add('notify', $data_insert_notify);
        }
        if ($data['position'] > 0 && $data['type'] == 1){
            // ds thành viên
            $gr_mem = explode(',',$arr_group[$data['position']]['id_employee']);
            // ds thành viên bỏ theo dõi nhóm => ko nhận đk thông báo
            $unfollow_mem = explode(',',$arr_group[$data['position']]['following']);
            // ds cài đặt thông báo
            $db_notify_off = new db_query("SELECT * FROM custom_notification WHERE id_group = ".$data['position']);
            if (mysql_num_rows($db_notify_off->result) > 0){
                while ($row = mysql_fetch_array($db_notify_off->result)){
                    // thành viên tắt thông báo, thành viên nhận thông báo của bv nổi bật, thành viên nhận thông báo của bv của bn bè & ko là bn bè của author => ko nhận đk thông báo
                    if (($row['customize'] == 3 || $row['customize'] == 1) && !in_array($row['id_user'],$unfollow_mem)){
                        $unfollow_mem[] = $row['id_user'];
                    }else if ($row['customize'] == 2 && !in_array($row['id_user'],$author_friend_id365) && !in_array($row['id_user'],$unfollow_mem)){
                        $unfollow_mem[] = $row['id_user'];
                    }
                }
            }
            // thêm thông báo cho thành viên
            foreach ($gr_mem as $key => $value) {
                if (!in_array($value,$id_user_tags) && !in_array($value,$unfollow_mem)){
                    if ($value == $data['author']){
                        $data_insert_notify = [
                            'type' => 7,
                            'id_user' => $my_id,
                            'id_company' => $my_com_id,
                            'content' =>  "Bài viết của bạn trong nhóm ".$arr_group[$data['position']]['group_name']." vừa được duyệt",
                            'link' => "/chi-tiet-tin-dang.html?new_id=".$new_id,
                            'invited_users' => $data['author'],
                            'invited_users_type' => $data['author_type'],
                            'created_at' => time(),
                            'updated_at' => time(),
                        ];
                    }else{
                        $data_insert_notify = [
                            'type' => 7,
                            'id_user' => $my_id,
                            'id_company' => $my_com_id,
                            'content' =>  $author." vừa đăng 1 bài viết lên nhóm ".$arr_group[$data['position']]['group_name'],
                            'link' => "/chi-tiet-tin-dang.html?new_id=".$new_id,
                            'invited_users' => $value,
                            'invited_users_type' => 2,
                            'created_at' => time(),
                            'updated_at' => time(),
                        ];
                    }
                    add('notify', $data_insert_notify);
                }
            }
        }
    }
}
?>
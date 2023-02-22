<?php
if (isset($_SESSION['login'])){

    $my_id = $_SESSION['login']['id'];
    $my_type = $_SESSION['login']['user_type'];
    $my_avt = $_SESSION['login']['logo'];
    $my_dep_id = $_SESSION['login']['dep_id'];
    $my_dep_name = '';
    $my_id_chat = 0;
    $my_com_id = $_SESSION['login']['id_com'];
    
    // mảng unfollow
    $sql = "SELECT user_id,user_type,friend_id,friend_type,block_type FROM `unfollow` WHERE user_id = ".$_SESSION['login']['id']." AND user_type = ".$_SESSION['login']['user_type']." AND (block_type = 0 OR (block_type = 1 AND block_exp >= ".time()."))";
    $db_block = new db_query($sql);
    $arr_my_unfollow = [];
    while ($row = mysql_fetch_array($db_block->result)){
        $arr_my_unfollow[] = $row['friend_id'];
    }

    // mảng bạn bè của tôi
    $list_friends = list_friends_2($my_id);
    // bạn bè đã kết bạn & nhân viên cùng công ty & công ty
    $my_friend = $list_friends['listAccount'];
    // bạn bè đã kết bạn
    $accepted_invite = $list_friends['listFriend'];
    $accepted_invite_id = array_column($list_friends['listFriend'],'id365');

    // tách bạn bè thành bạn bè là nhân viên & bạn bè là công ty
    $slice_key = count($my_friend);
    $my_friend_com = [];
    $my_friend_emp = [];
    foreach ($my_friend as $key => $value) {
        if ($value['id365'] == $my_id){ // là tôi
            $my_id_chat = $value['id'];
            // $slice_key = $key;
            unset($my_friend[$key]);
        }elseif ($value['id365']==0){ // tk có tk chat nhưng ko có tk chuyển đổi số - tk từ raonhanh, timviec, ...
            unset($my_friend[$key]);
        }elseif ($value['type365'] == 0 || $value['type365'] == 2){
            $my_friend_emp[] = $value['id365'];
        }elseif ($value['type365'] == 1){
            $my_friend_com[] = $value['id365'];
        }
    }
    // \array_splice($my_friend, $slice_key, 1);
    $accepted_invite_com = [];
    $accepted_invite_emp = [];
    foreach ($accepted_invite as $key => $value) {
        if ($value['id365']==0){ // tk có tk chat nhưng ko có tk chuyển đổi số - tk từ raonhanh, timviec, ...
            unset($accepted_invite[$key]);
        }elseif ($value['type365'] == 0 || $value['type365'] == 2){
            $accepted_invite_emp[] = $value['id365'];
        }elseif ($value['type365'] == 1){
            $accepted_invite_com[] = $value['id365'];
        }
    }
    // chuỗi id bạn bè
    $my_friend_id365 = array_column($my_friend,"id365");
    $arr_my_friend_id = implode(",",$my_friend_id365);
    $str_my_friend_emp = implode(",",$my_friend_emp);
    $str_my_friend_com = implode(",",$my_friend_com);

    // ds người theo dõi
    $follow = list_follow($my_id_chat);
    $my_follower = [];
    $my_follower_id = [];
    foreach ($follow['follower'] as $key => $value) {
        if ($value['id365'] > 0){
            $my_follower[] = $value;
            $my_follower_id[] = $value['id365'];
        }
    }
    $my_following = [];
    $my_following_id = [];
    foreach ($follow['following'] as $key => $value) {
        if ($value['id365'] > 0){
            $my_following[] = $value;
            $my_following_id[] = $value['id365'];
        }
    }

    // mảng chặn - block
    $arr_my_block = array_column(listBlockChat365($my_id_chat),"id365");
    $arr_block_me = array_column(listBlockMeChat365($my_id_chat),"id365");

    // mảng group của tôi
    $sql = "SELECT id,group_name,group_mode,group_image,Pheduyet_post_member FROM `group` WHERE FIND_IN_SET($my_id,id_employee) OR FIND_IN_SET($my_id,id_manager)";
    if ($my_type == 1){
        $sql = "SELECT id,group_name,group_mode,group_image,Pheduyet_post_member
            FROM `group`
            WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND user_type = 1 AND group_id = `group`.`id`)";
    }else{
        $sql = "SELECT id,group_name,group_mode,group_image,Pheduyet_post_member
            FROM `group`
            WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND (user_type = 0 OR user_type = 2) AND group_id = `group`.`id`)";
    }
    $db_group = new db_query($sql);
    $arr_my_group = [];
    while ($row = mysql_fetch_array($db_group->result)){
        $arr_my_group[$row['id']] = $row;
    }

    // chuỗi id group của tôi
    $arr_my_group_id = array_column($arr_my_group,"id");
    $arr_my_group_id = implode(",",$arr_my_group_id);

    // group đình chỉ tôi
    $suspended_me = new db_query("SELECT * FROM `dinh_chi_thanh_vien`
    WHERE is_suspended = $my_id AND user_type = $my_type AND time_end >= ".time());
    $gr_suspended_me = [];
    while ($row = mysql_fetch_array($suspended_me->result)){
        $gr_suspended_me[] = $row['id_group'];
    }

    // mảng phòng ban
    $arr_dep = [];
    foreach ($list_department as $key => $value) {
        $arr_dep[$value->dep_id] = (array) $value;
    }
    if (array_key_exists($my_dep_id,$arr_dep)){
        $my_dep_name = $arr_dep[$my_dep_id]['dep_name'];
    }else{
        $my_dep_name = '';
    }

    // mảng group chat
    $arr_gr_chat = list_group_chat($my_id_chat);

}else{
    $my_id = 0;
    $my_type = 0;
    $arr_ep = [];
    $my_friend = [];
    $my_friend_com = [];
    $my_friend_emp = [];
    $accepted_invite_com = [];
    $accepted_invite_emp = [];
    $my_com_id = -1;
    $my_follower_id = [];
    $my_following_id = [];
    $accepted_invite_id = [];
    $arr_my_group = [];
    $gr_suspended_me = [];
    $arr_my_unfollow = [];
    $arr_my_block = [];
    $arr_block_me = [];
}
<?php
require '../config/config.php';
$content = getValue('content','str','POST','');
$id_user_tag = getValue('id_user_tag','arr','POST','');
$view_mode = getValue('regime_select','int','POST','');
$except = getValue('except','str','POST','');
$feel = getValue('feel','int','POST','');
$activity = getValue('activity','int','POST','');
$district = getValue('district','int','POST','');
$city = getValue('city','int','POST','');
$location = getValue('location','str','POST','');
// id bài đăng được chia sẻ
$new_id_parents = getValue('new_id_parents','int','POST',0);
// id bài đăng - là nội dung của bài chia sẻ
$new_id_share_content = getValue('new_id_share_content','int','POST',0);
// id album - là nội dung của bài chia sẻ
$album_id = getValue('album_id','int','POST',0);
// id group - là nội dung của bài chia sẻ
$gr_id = getValue('gr_id','int','POST',0);

$ep_id_share_to = getValue('ep_id_share_to','int','POST',0);
$ep_type_share_to = getValue('ep_type_share_to','int','POST',0);
$group_id_share_to = getValue('group_id_share_to','int','POST',0);
$group_type = getValue('group_type','int','POST',0);
$group_id = getValue('group_id','int','POST',0);
$ep_id = getValue('ep_id','int','POST',0);
$ep_type = getValue('ep_type','int','POST',0);
// $gr_status_post = getValue('gr_status_post','int','POST',1);
// bài viết lên lịch
$show_time = getValue('show_time','str','POST','');

if ($gr_id > 0){
    $data['group_id'] = $gr_id;
    $data['parents_id'] = 0;
    $data['album_id'] = 0;
}elseif ($album_id > 0){
    $data['album_id'] = $album_id;
    $data['parents_id'] = 0;
    $data['group_id'] = 0;
}elseif ($new_id_share_content > 0){
    $data['parents_id'] = $new_id_share_content;
    $data['album_id'] = 0;
    $data['group_id'] = 0;
}elseif ($new_id_parents > 0){
    $data['parents_id'] = $new_id_parents;
    $data['album_id'] = 0;
    $data['group_id'] = 0;
}else{
    $data['parents_id'] = 0;
    $data['album_id'] = 0;
    $data['group_id'] = 0;
}
// check share bv CỦA nhóm đang bị tạm dừng / nhóm bạn bị đình chỉ
if ($new_id_share_content > 0 || $new_id_parents > 0){
    $group_pause = new db_query("SELECT new_feed.new_id, position, type, group_pause FROM `new_feed` LEFT JOIN `group` on position=group.id 
    WHERE (new_id = $new_id_parents OR new_id = $new_id_share_content) AND type = 1 AND group_pause >= ".time());
    if (mysql_num_rows($group_pause->result) > 0){
        echo json_encode([
            'result' => false,
            'msg' => 'Quản trị viên đã tạm dừng nhóm một thời gian',
        ]);
        exit;
    }
    $group_pause = new db_query("SELECT new_feed.new_id, position, type, is_suspended, user_type, time_end FROM `new_feed` LEFT JOIN `dinh_chi_thanh_vien` on position=id_group
    WHERE (new_id = $new_id_parents OR new_id = $new_id_share_content) AND type = 1 AND is_suspended = $my_id AND user_type = $my_type AND time_end >= ".time());
    if (mysql_num_rows($group_pause->result) > 0){
        echo json_encode([
            'result' => false,
            'msg' => 'Bạn đã bị đình chỉ trong nhóm này',
        ]);
        exit;
    }
}
if ($ep_id_share_to > 0){
    $data['type'] = ($ep_type_share_to % 2) + 2;
    $data['position'] = $ep_id_share_to;
}elseif ($ep_id > 0){
    $data['type'] = ($ep_type % 2) + 2;
    $data['position'] = $ep_id;
}elseif ($group_id_share_to > 0){
    $data['type'] = $group_type;
    $data['position'] = $group_id_share_to;
}else{
    $data['type'] = $group_type;
    $data['position'] = $group_id;
}
// check đăng / share bv VÀO nhóm bạn ko thể đăng bài / nhóm đang bị tạm dừng / nhóm bạn bị đình chỉ / nhóm bạn bị cấm đăng bài / nhóm bạn bị giới hạn hoạt động
if ($data['type'] == 1 && $data['position'] > 0){ // if ($data['type'] == 1 && array_key_exists($data['position'],$arr_group)){
    // select group
    if ($my_type == 1){
        $db_group = new db_query("SELECT * FROM `group` JOIN group_member ON `group`.id = group_member.group_id 
        WHERE user_id = $my_id AND user_type = $my_type AND `group`.id = ".$data['position']);
    }else{
        $db_group = new db_query("SELECT * FROM `group` JOIN group_member ON `group`.id = group_member.group_id 
        WHERE user_id = $my_id AND (user_type = 0 OR user_type = 2) AND `group`.id = ".$data['position']);
    }
    if (mysql_num_rows($db_group->result) > 0){
        // $admin = explode(',',$arr_group[$data['position']]['id_administrators']);
        $db_group = mysql_fetch_array($db_group->result);
        if ($db_group['who_can_post'] == 1 && $db_group['type_mem'] == 0){
            echo json_encode([
                'result' => false,
                'msg' => 'Nhóm được cài đặt chỉ quản trị viên mới có thể đăng bài',
            ]);
            exit;
        }
        if ($db_group['group_pause'] >= time()){
            echo json_encode([
                'result' => false,
                'msg' => 'Quản trị viên đã tạm dừng nhóm một thời gian',
            ]);
            exit;
        }
        if (in_array($data['position'], $gr_suspended_me)){
            echo json_encode([
                'result' => false,
                'msg' => 'Bạn đã bị đình chỉ trong nhóm này',
            ]);
            exit;
        }
        if ($my_type == 1){
            $stop_post = new db_query("SELECT * FROM `cam_dang_bai`
            WHERE id_group = ".$data['position']." AND id_user = $my_id AND user_type = $my_type");
        }else{
            $stop_post = new db_query("SELECT * FROM `cam_dang_bai`
            WHERE id_group = ".$data['position']." AND id_user = $my_id AND (user_type = 0 OR user_type = 2)");
        }
        if (mysql_num_rows($stop_post->result) > 0){
            echo json_encode([
                'result' => false,
                'msg' => 'Bạn đã bị cấm đăng bài trong nhóm này',
            ]);
            exit;
        }
        if ($my_type == 1){
            $limit_post = new db_query("SELECT * FROM `gioi_han_thanh_vien`
            WHERE id_group = ".$data['position']." AND id_user_limit = $my_id AND user_limit_type = $my_type AND posts_het_han_sau >= ".time());
        }else{
            $limit_post = new db_query("SELECT * FROM `gioi_han_thanh_vien`
            WHERE id_group = ".$data['position']." AND id_user_limit = $my_id AND (user_limit_type = 0 OR user_limit_type = 2) AND posts_het_han_sau >= ".time());
        }
        if (mysql_num_rows($limit_post->result) > 0){
            $limit_post = mysql_fetch_array($limit_post->result)['gioi_han_post'];
            $st_time = strtotime(date('d-m-Y',time()));
            $en_time = $st_time + 86400 - 1;
            if ($my_type == 1){
                $post_in_day = new db_query("SELECT * FROM `new_feed`
                WHERE position = ".$data['position']." AND author = $my_id AND author_type = $my_type AND type = 1 AND `delete` = 0 AND created_at >= $st_time AND created_at <= $en_time");
            }else{
                $post_in_day = new db_query("SELECT * FROM `new_feed`
                WHERE position = ".$data['position']." AND author = $my_id AND (author_type = 0 OR author_type = 2) AND type = 1 AND `delete` = 0 AND created_at >= $st_time AND created_at <= $en_time");
            }
            if (mysql_num_rows($post_in_day->result) >= $limit_post){
                echo json_encode([
                    'result' => false,
                    'msg' => 'Bạn đã bị giới hạn số bài đăng trong ngày trong nhóm này',
                ]);
                exit;
            }
        }
    
        $data['approve'] = 0;
        if ($db_group['Pheduyet_post_member'] == 0){
            // if ($my_type == 1){
            //     $mem_in_group = new db_query("SELECT * FROM `group_member`
            //     WHERE group_id = ".$data['position']." AND user_id = $my_id AND user_type = $my_type");
            // }else{
            //     $mem_in_group = new db_query("SELECT * FROM `group_member`
            //     WHERE group_id = ".$data['position']." AND user_id = $my_id AND (user_type = 0 OR user_type = 2)");
            // }
            // $mem_in_group = mysql_fetch_array($mem_in_group->result);
            if ($db_group['type_mem'] == 0){
                $data['approve'] = 1;
            }
        }
    }else{
        $data['type'] = 0;
        $data['position'] = 0;
    }
}

$data['content'] = $content;
$data['view_mode'] = $view_mode;
$data['except'] = $except;
if ($feel != ''){
    $data['feel'] = $feel;
}
if ($activity != ''){
    $data['activity'] = $activity;
}
$data['district'] = $district;
$data['city'] = $city;
$data['location'] = $location;

$string_img = "";
$string_file = "";
$string_img_name = "";
$string_file_name = "";

$folder_file = "../img/new_feed/dang_tin/file/" . $_SESSION['login']['id'];
$folder_image = "../img/new_feed/dang_tin/image/" . $_SESSION['login']['id'];
$folder_video = "../img/new_feed/dang_tin/video/" . $_SESSION['login']['id'];

if (!is_dir($folder_file)) {
    mkdir($folder_file, 0777, true);
}

if (!is_dir($folder_image)) {
    mkdir($folder_image, 0777, true);
}

if (!is_dir($folder_video)) {
    mkdir($folder_video, 0777, true);
}

if (isset($_FILES['image_video'])) {
    for ($i=0; $i < count($_FILES['image_video']['name']); $i++) {
        $duoi = explode(".",$_FILES['image_video']['name'][$i]);
        $duoi = $duoi[count($duoi) - 1];
        $name_file = rand() . "." . $duoi;
        $name_tmp = $_FILES['image_video']['tmp_name'][$i];
        if (preg_match("/image/", $_FILES['image_video']['type'][$i]) == true) {
            $dir = $folder_image . "/" . $name_file;
            move_uploaded_file($name_tmp, $dir);
            if ($i < count($_FILES['image_video']['name']) - 1) {
                $string_img = $string_img . $dir . "||";
                $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i] . "||";
            }else{
                $string_img = $string_img . $dir;
                $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i];
            }
        }else if (preg_match("/video/", $_FILES['image_video']['type'][$i]) == true){
            $dir = $folder_video . "/" . $name_file;
            move_uploaded_file($name_tmp, $dir);
            if ($i < count($_FILES['image_video']['name']) - 1) {
                $string_img = $string_img . $dir . "||";
                $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i] . "||";
            }else{
                $string_img = $string_img . $dir;
                $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i];
            }
        }
    }
}

if (isset($_FILES['file'])) {
    for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
        $duoi = explode(".",$_FILES['file']['name'][$i]);
        $duoi = $duoi[count($duoi) - 1];
        $name_file = rand() . "." . $duoi;
        $name_tmp = $_FILES['file']['tmp_name'][$i];
        $dir = $folder_file . "/" . $name_file;
        move_uploaded_file($name_tmp, $dir);
        if ($i < count($_FILES['file']['name']) - 1) {
            $string_file = $string_file . $dir . "||";
            $string_file_name = $string_file_name . $_FILES['file']['name'][$i] . "||";
        }else{
            $string_file = $string_file . $dir;
            $string_file_name = $string_file_name . $_FILES['file']['name'][$i];
        }
    }
}

if ($string_file != "" && $string_img != "") {
    $data['file'] = $string_file . "||" . $string_img;
    $data['name_file'] = $string_file_name . "||" . $string_img_name;
}else{
    if ($string_file != "") {
        $data['file'] = $string_file;
        $data['name_file'] = $string_file_name;
    }else{
        $data['file'] = $string_img;
        $data['name_file'] = $string_img_name;
    }
}

// if ($_SESSION['login']['user_type'] == 1) {
//     $id_user = $_SESSION['login']['id'];
//     $id_company = $_SESSION['login']['id'];
// }else{
//     require_once '../api/api_ep.php';
//     $id_user = $data_ep[$_SESSION['login']['id']]->ep_id;
//     $id_company = $data_ep[$_SESSION['login']['id']]->com_id;
// }

$data['author'] = $_SESSION['login']['id'];
$data['id_company'] = $_SESSION['login']['id_com'];
$data['content'] = $content;
$data['id_user_tags'] = $id_user_tag;
$data['new_type'] = 0;
$data['author_type'] = $_SESSION['login']['user_type'];
$data['updated_at'] = time();
$data['created_at'] = time();
if ($show_time != '' && strtotime($show_time) > time()){
    $data['show_time'] = strtotime($show_time);
    $data['updated_at'] = strtotime($show_time);
}

add('new_feed', $data);
$id = mysql_insert_id();
$row = $data;

// bật thông báo bài viết cho author
$data_insert_notify_on = [
    'new_id' => $id,
    'user_id' => $my_id,
    'user_type' => $my_type,
    'created_at' => time(),
];
add('new_notify_on', $data_insert_notify_on);

// bật thông báo bài viết cho position
if ($data['type'] == 2){
    $data_insert_notify_on = [
        'new_id' => $id,
        'user_id' => $data['position'],
        'user_type' => 2,
        'created_at' => time(),
    ];
    add('new_notify_on', $data_insert_notify_on);
    // thông báo cho position
    $data_insert_notify = [
        'type' => 7,
        'id_user' => $my_id,
        'id_company' => $my_com_id,
        'content' =>  $_SESSION['login']['name']." đã đăng 1 bài viết lên trang cá nhân của bạn",
        'link' => "/chi-tiet-tin-dang.html?new_id=".$id,
        'invited_users' => $data['position'],
        'invited_users_type' => 2,
        'created_at' => time(),
        'updated_at' => time(),
    ];
    add('notify', $data_insert_notify);
}elseif ($data['type'] == 3){
    $data_insert_notify_on = [
        'new_id' => $id,
        'user_id' => $data['position'],
        'user_type' => 1,
        'created_at' => time(),
    ];
    add('new_notify_on', $data_insert_notify_on);
    // thông báo cho position
    $data_insert_notify = [
        'type' => 7,
        'id_user' => $my_id,
        'id_company' => $my_com_id,
        'content' =>  $_SESSION['login']['name']." đã đăng 1 bài viết lên trang cá nhân của bạn",
        'link' => "/chi-tiet-tin-dang.html?new_id=".$id,
        'invited_users' => $data['position'],
        'invited_users_type' => 1,
        'created_at' => time(),
        'updated_at' => time(),
    ];
    add('notify', $data_insert_notify);
}

// thêm ds user cho chế độ xem
$list_excepts = json_decode(getValue('arr_excepts','arr','POST',''), true);
if ($list_excepts) {
    foreach ($list_excepts as $k => $v) {
        $data_insert_excepts = [
            'nvm_new_id' => $id,
            'nvm_user_id' => $v['id'],
            'nvm_user_type' => $v['type'], 
            'nvm_type' => $v['type_regime'], 
            'nvm_created_at' => time(),
            'nvm_updated_at' => time(),
        ]; 
        add('new_view_mode', $data_insert_excepts);
    }  
}

$arr_stranger = [];
$com_stranger[] = $my_com_id;
$arr_in4[2] = [];
$arr_in4[1] = [];
if ($data['type'] == 2 && $data['position'] > 0 && !array_key_exists($data['position'],$arr_ep) && !in_array($data['position'],$arr_stranger)){
    $arr_stranger[] = $data['position'];
}elseif ($data['type'] == 3 && $data['position'] > 0 && !in_array($data['position'],$arr_stranger)){
    $com_stranger[] = $data['position'];
}

// thêm ds user đc tag
$row['lst_tags_post'] = [];
$id_user_tags = [];
$list_tags = json_decode(getValue('arr_tags','arr','POST',''), true);
if ($list_tags) {
    foreach ($list_tags as $k => $v) {
        $data_insert_tags = [
            'nt_new_id' => $id,
            'nt_user_id' => $v['id'],
            'nt_user_type' => $v['type'], 
            'nt_created_at' => time(),
            'nt_updated_at' => time(),
        ]; 
        add('new_tags', $data_insert_tags);
        // bật thông báo bài viết cho user được tag
        $data_insert_notify_on = [
            'new_id' => $id,
            'user_id' => $v['id'],
            'user_type' => $v['type'],
            'created_at' => time(),
        ];
        add('new_notify_on', $data_insert_notify_on);
        // thông báo cho user được tag
        $data_insert_notify = [
            'type' => 7,
            'id_user' => $my_id,
            'id_company' => $my_com_id,
            'content' =>  $_SESSION['login']['name']." đã gắn thẻ bạn trong 1 bài viết",
            'link' => "/chi-tiet-tin-dang.html?new_id=".$id,
            'invited_users' => $v['id'],
            'invited_users_type' => $v['type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('notify', $data_insert_notify);
        // check stranger
        $row['lst_tags_post'][] = $data_insert_tags;
        $id_user_tags[$v['type']][] = $v['id'];
        if (($v['type'] == 2 || $v['type'] == 0) && $v['id'] > 0 && !array_key_exists($v['id'],$arr_ep) && !in_array($v['id'],$arr_stranger)){
            $arr_stranger[] = $v['id'];
        }elseif ($v['type'] == 1 && $v['id'] > 0 && !in_array($v['id'],$com_stranger)){
            $com_stranger[] = $v['id'];
        }
    }
}
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
// lấy infor stranger
$arr_stranger = list_stranger_infor(implode(",",$arr_stranger));
foreach ($arr_stranger as $key => $value) {
    $arr_ep[$value['ep_id']] = $value;
}
$arr_in4[2] = $arr_ep;
$arr_in4[1] = [];
$com_stranger = list_stranger_cominfor(implode(",",$com_stranger));
foreach ($com_stranger as $key => $value) {
    $arr_in4[1][$value['com_id']] = $value;
}
 
// thêm thông báo
// $id_user_tags = explode(',',$data['id_user_tags']);
if ($data['position'] > 0 && (!isset($data['approve']) || $data['approve'] == 0)){
    if ($data['type'] == 1){
        $gr_mem = explode(',',$arr_group[$data['position']]['id_employee']);
        $unfollow_mem = explode(',',$arr_group[$data['position']]['following']);
        $db_notify_off = new db_query("SELECT * FROM custom_notification WHERE id_group = ".$data['position']);
        if (mysql_num_rows($db_notify_off->result) > 0){
            while ($row_noti = mysql_fetch_array($db_notify_off->result)){
                if ($row_noti['customize'] == 3 && !in_array($row_noti['customize'],$unfollow_mem)){
                    $unfollow_mem[] = $row_noti['customize'];
                }else if ($row_noti['customize'] == 2 && !in_array($row_noti['customize'],$my_friend_id365) && !in_array($row_noti['customize'],$unfollow_mem)){
                    $unfollow_mem[] = $row_noti['customize'];
                }
            }
        }
        foreach ($gr_mem as $key => $value) {
            if (!in_array($value,$id_user_tags) && !in_array($value,$unfollow_mem)){
                $data_insert_notify = [
                    'type' => 7,
                    'id_user' => $my_id,
                    'id_company' => $my_com_id,
                    'content' =>  $_SESSION['login']['name']." vừa đăng 1 bài viết lên nhóm ".$arr_group[$data['position']]['group_name'],
                    'link' => "/chi-tiet-tin-dang.html?new_id=".$id,
                    'invited_users' => $value,
                    'invited_users_type' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ];
                add('notify', $data_insert_notify);
            }
        }
    }elseif ($data['type'] == 0){
        $gr_mem = list_ep_by_dep();
        foreach ($gr_mem as $key => $value) {
            if (!in_array($value['ep_id'],$id_user_tags)){
                $data_insert_notify = [
                    'type' => 7,
                    'id_user' => $my_id,
                    'id_company' => $my_com_id,
                    'content' =>  $_SESSION['login']['name']." vừa đăng 1 bài viết lên nhóm ".$value['dep_name'],
                    'link' => "/chi-tiet-tin-dang.html?new_id=".$id,
                    'invited_users' => $value['ep_id'],
                    'invited_users_type' => 2,
                    'created_at' => time(),
                    'updated_at' => time(),
                ];
                add('notify', $data_insert_notify);
            }
        }
    }
}

// thêm lượt chia sẻ
if ($new_id_parents > 0){
    $data2['id_new'] = $new_id_parents;
    $data2['id_user'] = $_SESSION['login']['id'];
    $data2['user_type'] = $_SESSION['login']['user_type'];
    $data2['created_time'] = time();
    add('share_post', $data2);
}
if ($album_id > 0){
    $data3['album_id'] = $album_id;
    $data3['user_id'] = $_SESSION['login']['id'];
    $data3['user_type'] = $_SESSION['login']['user_type'];
    $data3['created_at'] = time();
    add('share_album', $data3);
}
if (!isset($data['feel'])){
    $row['feel'] = null;
}
if (!isset($data['activity'])){
    $row['activity'] = null;
}
$row['saved'] = 0;
$row['liked'] = 0;
$row['count_like'] = 0;
$row['tat_comment'] = 0;
$row['notify_on'] = 1;
$row['new_id'] = $id;
$row['count_comment'] = 0;
$row['count_share'] = 0;
$row['count_comment_parent'] = 0;
$row['list_react_post'] = [];
// check có trong page detail group ko
if (isset($group_id) && $group_id > 0){
    $id_group = $group_id;
    // còn thiếu group config - admin, censor, mem, group detail,...
}

if (isset($data['approve']) && $data['approve'] > 0){
    echo json_encode([
        'result' => false,
        'msg' => "Đăng bài thành công. Vui lòng chờ quản trị viên duyệt bài viết của bạn.",
    ]);
}elseif (isset($data['show_time']) && $data['show_time'] > time()){
    echo json_encode([
        'result' => false,
        'msg' => "Đăng bài lên lịch thành công.",
    ]);
}else{
    include '../includes/index_employee/post.php';
}
?>

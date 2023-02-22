<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1; 
$type_delete = 1;
$type_web = 2;
// check_user_empoyee();

$id = $_GET['id'];
$id_group = getValue('id', 'int', 'GET', 0);

$arr_stranger = [];
$com_stranger = [];
$arr_in4[1] = [];
$arr_in4[2] = $arr_ep;

// chi tiết nhóm
$select_group = new db_query("SELECT * FROM `group` WHERE `id` = '$id'");
if (mysql_num_rows($select_group->result) == 0) {
    header('Location: /nhom.html');
    exit();
}
$group = mysql_fetch_array($select_group->result);

// thêm manager vào người lạ
if ($group['id_manager'] > 0 && $group['manager_type'] == 1 && 
    !in_array($group['id_manager'],$com_stranger) && !array_key_exists($group['id_manager'],$arr_in4[1])){
    $com_stranger[] = $group['id_manager'];
}elseif ($group['id_manager'] > 0 && ($group['manager_type'] == 0 || $group['manager_type'] == 2) && 
    !in_array($group['id_manager'],$arr_stranger) && !array_key_exists($group['id_manager'],$arr_in4[2])){
    $arr_stranger[] = $group['id_manager'];
}

// Thời gian tạm dừng nhóm
$time_pause = date('H:i d-m-Y',$group['group_pause']);

$group_mode = array(0 => "Nhóm công khai", 1 => "Nhóm riêng tư");

// ds lời mời - sửa mới
$db_invite = new db_query("SELECT * FROM `invite_to_group` WHERE `id_group` = '$id'"); // AND `type_invite` = 0
$arr_invited = []; // $arr_friend
$be_mem = [];
$be_admin = [];
$be_censor = [];
while ($invite = mysql_fetch_assoc($db_invite->result)) {
    if ($invite['type_invite'] == 2){
        $be_censor[$invite['invitee_id']."-".($invite['invitee_type']%2)] = $invite;
    }elseif ($invite['type_invite'] == 1){
        $be_admin[$invite['invitee_id']."-".($invite['invitee_type']%2)] = $invite;
    }else{
        $arr_invited[] = $invite['invitee_id'];
        $be_mem[$invite['invitee_id']."-".($invite['invitee_type']%2)] = $invite;
    }
    // thêm người được mời vào người lạ
    if ($invite['invitee_id'] > 0 && $invite['invitee_type'] == 1 && 
        !in_array($invite['invitee_id'],$com_stranger) && !array_key_exists($invite['invitee_id'],$arr_in4[1])){
        $com_stranger[] = $invite['invitee_id'];
    }elseif ($invite['invitee_id'] > 0 && ($invite['invitee_type'] == 0 || $invite['invitee_type'] == 2) && 
        !in_array($invite['invitee_id'],$arr_stranger) && !array_key_exists($invite['invitee_id'],$arr_in4[2])){
        $arr_stranger[] = $invite['invitee_id'];
    }
}

// ds thành viên trong nhóm - mới
$db_mem = new db_query("SELECT * FROM group_member WHERE group_id = $id_group ORDER BY id DESC");
$arr_mem_new = [];
$arr_mem_friend = [];
$arr_mem_admin = [];
$arr_mem_censor = [];
while ($mem = mysql_fetch_array($db_mem->result)) {
    $arr_mem_new[$mem['user_id']."-".($mem['user_type']%2)] = $mem;
    if((in_array($mem['user_id'], $my_friend_com) && $mem['user_type'] == 1) || (in_array($mem['user_id'], $my_friend_emp) && ($mem['user_type'] == 0 || $mem['user_type'] == 2))){
        $arr_mem_friend[$mem['user_id']."-".($mem['user_type']%2)] = $mem;
    }
    if ($mem['type_mem'] == 1){
        $arr_mem_admin[$mem['user_id']."-".($mem['user_type']%2)] = $mem;
    }elseif ($mem['type_mem'] == 2){
        $arr_mem_censor[$mem['user_id']."-".($mem['user_type']%2)] = $mem;
    }
    // thêm thành viên vào người lạ
    if ($mem['user_id'] > 0 && $mem['user_type'] == 1 && 
        !in_array($mem['user_id'],$com_stranger) && !array_key_exists($mem['user_id'],$arr_in4[1])){
        $com_stranger[] = $mem['user_id'];
    }elseif ($mem['user_id'] > 0 && ($mem['user_type'] == 0 || $mem['user_type'] == 2) && 
        !in_array($mem['user_id'],$arr_stranger) && !array_key_exists($mem['user_id'],$arr_in4[2])){
        $arr_stranger[] = $mem['user_id'];
    }
}
// ds người quản lý = quản trị viên + ng kiểm duyệt
$administrators_censor = array_merge($arr_mem_admin, $arr_mem_censor);

// Ai có thể đăng bài
$who_can_post = $group['who_can_post'];

// stop_inviting_me - mới
$db_stop_invite2group = new db_query("SELECT * FROM stop_invite2group WHERE group_id = $id_group");
$stop_invite2group = [];
while ($mem = mysql_fetch_array($db_stop_invite2group->result)) {
    $stop_invite2group[$mem['user_id']."-".($mem['user_type']%2)] = $mem;
}
// ai có thể phê duyệt y/c làm thành viên
$pheduyet_yc_thanhvien = $group['pheduyet_yc_thanhvien'];

// Tạm dừng nhóm
$group_pause = $group['group_pause'];
$group_pause_type = $group['group_pause_type'];

// Bài viết đang chờ / Từ chối và cấm tác giả đăng bài
$select_ban_member = new db_query("SELECT * FROM `cam_dang_bai` WHERE `id_group` = '$id'");
$cam_thanhvien_dangbai = [];
while ($while_ban_member = mysql_fetch_assoc($select_ban_member->result)) {
    $cam_thanhvien_dangbai[] = $while_ban_member['id_user'];
}

$count_member = count($arr_mem_new);

// Lấy id lạ bảng mời bạn bè vào nhóm
$db_invite = new db_query("SELECT `invitee_id` FROM `invite_to_group` WHERE `id_group` = '$id' AND `type_invite` = 0");
$db_invite = $db_invite->result_array();
$db_invite  = array_column($db_invite, 'invitee_id');
// Lấy tác giả bài viết
$db_author = new db_query("SELECT `author`,`id_user_tags`,`parents_id`,`new_type`,`position` FROM `new_feed` WHERE `position` = '$id'");
while ($row_g = mysql_fetch_assoc($db_author->result)) {
    if ($row_g['author'] != '' && !array_key_exists($row_g['author'],$arr_ep) && !in_array($row_g['author'],$arr_stranger)){
        $arr_stranger[] = $row_g['author'];
    }
    $tag = explode(",",$row_g['id_user_tags']);
    foreach ($tag as $key => $value) {
        if ($value != '' && !array_key_exists($value,$arr_ep) && !in_array($value,$arr_stranger) && $value > 0){
            $arr_stranger[] = $value;
        }
    }
    
    foreach ($db_invite as $key => $value) {
        if ($value != '' && !array_key_exists($value,$arr_ep) && !in_array($value,$arr_stranger) && $value > 0){
            $arr_stranger[] = $value;
        }
    }

    if ($row_g['parents_id'] > 0){
        $db_new_share = new db_query("SELECT * FROM new_feed WHERE new_id = ".$row_g['parents_id']);
        $db_new_share = mysql_fetch_array($db_new_share->result);

        if ($db_new_share['author'] != '' && !array_key_exists($db_new_share['author'],$arr_ep) && !in_array($db_new_share['author'],$arr_stranger)){
            $arr_stranger[] = $db_new_share['author'];
        }
        $tag = explode(",",$db_new_share['id_user_tags']);
        foreach ($tag as $key => $value) {
            if ($value != '' && !array_key_exists($value,$arr_ep) && !in_array($value,$arr_stranger) && $value > 0){
                $arr_stranger[] = $value;
            }
        }
        if ($row_g['new_type'] == 7){
            $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $row_g['new_id']);
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
}

// lấy thông tin tk lạ
$arr_mem = list_stranger_infor(implode(',', $arr_stranger));
foreach ($arr_mem as $key => $row) {
    $arr_ep[$row['ep_id']] = $row;
}
$arr_in4[2] = $arr_ep;

$arr_mem = list_stranger_cominfor(implode(',', $com_stranger));
foreach ($arr_mem as $key => $row) {
    $arr_in4[1][$row['com_id']] = $row;
}

// Phê duyệt mọi bài viết của thành viên
if ($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) {
    $status = 1;
}else{
    $status = $group['Pheduyet_post_member'];
}

// Lấy tất cả bài viết của nhóm
$sql_new_first = "SELECT new_feed.*, 
        (CASE WHEN EXISTS (SELECT id FROM `new_notify_on` WHERE new_notify_on.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS notify_on,
        (CASE WHEN EXISTS (SELECT id_save FROM `save_post` JOIN add_collection ON save_post.id_collection = add_collection.id_collection WHERE id_posts = new_id AND id_user = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS saved
        FROM new_feed 
        WHERE `delete` = 0 AND approve = 0  AND show_time <= ".time()." AND position = $id AND type = 1 AND
        NOT EXISTS (SELECT id FROM new_hide_post WHERE new_hide_post.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").")";
$sql_new_last = " GROUP BY new_id ORDER BY updated_at DESC LIMIT ".$limit_post_group;

// Lấy bài viết đã ghim
$db_ghim_post_group = $sql_new_first . ' AND ghim_group = 1 ' . $sql_new_last; 

$list_news_ghim = render_list_news($db_ghim_post_group, $arr_in4);
$lst_post_ghim = $list_news_ghim[0];
$arr_in4 = $list_news_ghim[1];

$list_news = render_list_news($sql_new_first.$sql_new_last, $arr_in4);
$lst_posts = $list_news[0];
$arr_in4 = $list_news[1];

// Lấy bài viết có video
$sql_new_video = $sql_new_first . " AND `file` LIKE '%video%' " . $sql_new_last; 
$list_news_video = render_list_news($sql_new_video, $arr_in4);
$lst_posts_video = $list_news_video[0];
$arr_in4 = $list_news_video[1];


// Ảnh và video
$file_4 =  new db_query("SELECT `file` FROM `new_feed` WHERE (`file` LIKE '%image%' OR `file` LIKE '%video%') AND `position` = '$id' AND `delete` = 0 AND `approve` = 0 AND `file` != '' ORDER BY `updated_at` DESC LIMIT 4");
if (mysql_num_rows($file_4->result) > 0) {
    $arr_img_video = $file_4->result_array();
    $arr_img_video = array_column($arr_img_video, 'file');
    $implode_img_video = implode('||', $arr_img_video);
    $explode_img_video = explode('||', $implode_img_video);
    $four_img_video = array_slice($explode_img_video, 0 ,4);
}

// -------------------- File phương tiện / Ảnh
$db_file_img = new db_query("SELECT `file` FROM `new_feed` WHERE `file` LIKE '%image%' AND `position` = '$id' AND `delete` = 0 AND `approve` = 0 AND `file` != '' ORDER BY `updated_at` DESC");
if(mysql_num_rows($db_file_img->result) > 0){
    $arr_file_img = $db_file_img->result_array();
    $arr_file_img = array_column($arr_file_img, 'file');
    $implode_img = implode('||', $arr_file_img);
    $explode_img = explode('||', $implode_img);
    $array_image = [];
    foreach ($explode_img as $key => $value) {
        if (preg_match('/image/', $value)) {
            $array_image[] = $value;
        }
    }
}

// -------------------- File phương tiện / Video
$db_file_video = new db_query("SELECT `file` FROM `new_feed` WHERE `file` LIKE '%video%' AND `position` = '$id' AND `delete` = 0 AND `approve` = 0 AND `file` != '' ORDER BY `updated_at` DESC");
if (mysql_num_rows($db_file_video->result)) {
    $arr_video = $db_file_video->result_array();
    $arr_video = array_column($arr_video, 'file');
    $implode_video = implode('||', $arr_video);
    $explode_video = explode('||', $implode_video);
    $array_video = [];
    foreach ($explode_video as $key => $value) {
        if (preg_match('/video/', $value)) {
            $array_video[] = $value;
        }
    }
}


// File
$db_file = new db_query("SELECT `author`,`file`,`name_file`,`updated_at`,`created_at` FROM `new_feed` WHERE `file` LIKE '%file%' AND `position` = '$id' AND `delete` = 0 AND `approve` = 0 AND `file` != '' ORDER BY `updated_at` DESC");


$list_friend = list_friends($my_id, $my_type);
$list_f = array_column($list_friend, 'id365');




// Lời mời làm quản trị viên, người kiểm duyệt
$db_invite = new db_query("SELECT * FROM `invite_to_group` WHERE `id_group` = '$id' AND `invitee_id` = '". $my_id ."' ORDER BY `type_invite` ASC LIMIT 1");
$assoc_invite = mysql_fetch_assoc($db_invite->result);

// POPUP đình chỉ thành viên
$db_dinhchi = new db_query("SELECT `time` FROM `dinh_chi_thanh_vien` WHERE `id_group` = '$id'");

// Đình chỉ thành viên
$dinhchi_thanhvien = new db_query("SELECT `time_start`,`time_end` FROM `dinh_chi_thanh_vien` WHERE `id_group` = '$id' AND `is_suspended` = '$my_id'");
$check_dinhchi = mysql_num_rows($dinhchi_thanhvien->result);
if ($check_dinhchi > 0) {
    $check_time_dinhchi = mysql_fetch_assoc($dinhchi_thanhvien->result);
    $time_dinhchi = date('H:i d-m-Y', $check_time_dinhchi['time_end']);
}




// Đếm bài viết trong ngày
$time = time();
$time_str = date('d-m-Y', $time);
$first_day = strtotime($time_str);
$last_day = strtotime($time_str) + 86400 - 1;
$db_newfeed_day = new db_query("SELECT `new_id` FROM `new_feed` WHERE `position` = '$id' AND `approve` = 0 AND `updated_at` > '$first_day' AND `updated_at` <= '$last_day'");
$newfeed_day = mysql_num_rows($db_newfeed_day->result);


// Quy tắc nhóm - group_rules
$db_rule = new db_query("SELECT * FROM `group_rules` WHERE `type_show` = 0 AND `id_group` = '$id'");

// Thành viên yêu cầu tham gia nhóm - member_request_join
$member_join = new db_query("SELECT `id` FROM `member_request_join` WHERE `id_group` = '$id' AND `id_user` = '$my_id' AND `type_join` = 0");

// Câu hỏi thành viên - member_question
$member_question = new db_query("SELECT * FROM `member_question` WHERE `id_group` = '$id_group'");


// Tắt thông báo All nhóm
$db_turnof = new db_query("SELECT `id_ct` FROM `custom_notification` WHERE `id_user` = '$my_id' AND `customize` = 3");
$db_turnof_assoc = $db_turnof ->result_array();
$db_turnof_assoc = array_column($db_turnof_assoc, 'id_ct');
$cout_group_notify = count($db_turnof_assoc);

$group_check = new db_query("SELECT `id` FROM `group` WHERE find_in_set('$my_id', id_manager) OR find_in_set('$my_id', id_employee)");
$group_check_assoc = $group_check -> result_array('id');
$group_check_assoc = array_column($group_check_assoc, 'id');
$cout_group = count($group_check_assoc);


// QUYỀN - Tạm dừng nhóm, cài đặt ai có thể đăng bài, đình chỉ nhóm, cấm thành viên đăng bài
$show_class = "";
if ($group['group_pause'] != 0) {
    if ($time > $group['group_pause']) {
        if ($who_can_post != 0) {
            if(array_key_exists(($my_id."-".($my_type%2)), $arr_mem_admin) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_censor)){
                $show_class = "click_taianh";
            }else{
                $show_class = "show_popup_error";
            }
        }else{
            if ($check_dinhchi > 0) {
                if ($time > $check_time_dinhchi['time_end']) {
                    $show_class = "click_taianh";
                }else{
                    $show_class = "click_dinh_chi";
                }
            }else{
                if (in_array($my_id, $cam_thanhvien_dangbai)) {
                    $show_class = "cam_thanhvien_dangbai";
                }else{
                    $show_class = "click_taianh";
                }
            }
        }
    }else{
        $show_class = "popup_group_pause";
    }
}else{
    if ($who_can_post != 0) {
        if(array_key_exists(($my_id."-".($my_type%2)), $arr_mem_admin) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_censor)){
            $show_class = "click_taianh";
        }else{
            $show_class = "show_popup_error";
        }
    }else{
        if ($check_dinhchi > 0) {
            if ($time > $check_time_dinhchi['time_end']) {
                $show_class = "click_taianh";
            }else{
                $show_class = "click_dinh_chi";
            }
        }else{
            if (in_array($my_id, $cam_thanhvien_dangbai)) {
                $show_class = "cam_thanhvien_dangbai";
            }else{
                $show_class = "click_taianh";
            }
        }
    }
}

// tạm dừng nhóm và đình chỉ thành viên
$tamdung_dinhchi = "";
if ($group['group_pause'] != 0) {
    if ($time > $group['group_pause']) {
        $tamdung_dinhchi = "click_show_pp_friend";
    }else{
        if ($check_dinhchi > 0) {
            $tamdung_dinhchi = "click_dinh_chi";
        }else{
            $tamdung_dinhchi = "click_show_pp_friend";
        }
    }
}else{
    if ($check_dinhchi > 0) {
        $tamdung_dinhchi = "click_dinh_chi";
    }else{
        $tamdung_dinhchi = "click_show_pp_friend";
    }
}



$arr_administrators = array_values($arr_mem_admin);
$arr_censor = array_values($arr_mem_censor);


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/slick-theme.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group_public.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_group.css?v=<?= $version ?>">
    <title>Nhóm</title>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper background_o">

            <div id="cdnhanvienc" class="cdnhanvienc pg_new">
                <?php include '../includes/cd_header_new.php'; ?>
            </div>

            <div class="private_group_content">

                <div id="pg_sidebar">
                    <?php if (array_key_exists(($my_id."-".($my_type%2)), $administrators_censor)) {?>
                        <?php include '../includes/sidebar_group.php'; ?>
                    <?php }else{?>
                        <?php include '../includes/group/group_sidebar.php'; ?>
                    <?php }?>
                </div>
                
                <div id="pg_main">
                    <div class="pg_main_head">
                        <div class="pg_main_head_banner pg_main_head_banner_relative">
                            <img class="pick_src_avt_group" src="<?=($group['group_image'] != NULL)?$group['group_image']:"../img/nv_default_bgi.svg"?>" alt="" onerror="this.src=`/img/nv_default_bgi.svg`;">
                            <?php if (array_key_exists(($my_id."-".($my_type%2)), $arr_mem_admin)) {?>
                                <div class="div_click_img_group  
                                <?php if ($group['group_pause'] != 0) {
                                    if ($time > $group['group_pause']) {
                                        echo "click_thay_panner";
                                    }else{
                                        echo "popup_group_pause";
                                    }
                                }else{
                                    echo "click_thay_panner";
                                } ?>
                                ">
                                    <div class="div_click_img_group_img">
                                        <img src="/img/nv_camera.svg" alt="">
                                    </div>
                                </div>
                                <input type="file" hidden class="file_img_group" data-id-group="<?=$id?>">
                            <?php }?>
                        </div>
                        <div class="pg_main_head_name_group">Nhóm của <?=($group['manager_type']==1)?:$arr_ep[$group['id_manager']]['ep_name']?></div>

                        <div class="pg_main_head_member pg_main_head_member_id" data-id_group="<?=$id?>">
                            <div class="pg_main_head_member_sub">
                                <div class="pg_main_head_member_sub_1">
                                    <h1 class="pg_main_head_member_name"><?=$group['group_name']?></h1>
                                    <div class="pg_main_head_member_lock_group">
                                        <div class="pg_main_head_member_lock_group_ic">
                                            <img src="../img/image_new/lock.svg" alt="">
                                        </div>
                                        <div class="pg_main_head_member_lock_group_text">
                                            <p class="pick_mode_group"><?=$group_mode[$group['group_mode']]?> . </p>
                                            <p class="pick_all_mem_group"> <?=$count_member?> thành viên</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="pg_main_head_member_sub_2 dnone"><img src="../img/image_new/left_thin.svg" alt=""></div>
                            </div>
                            <?php if (($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_new)) {?>
                            <div class="pg_main_head_user">
                                <div class="pg_main_head_user_nav">                                    
                                    <?php $count = 0;
                                    foreach ($arr_mem_new as $key => $value) {
                                        $count++; ?>
                                        <div class="pg_main_head_user_img cusor">
                                            <img src="<?=($value['user_type']==1&&$arr_in4[1][$value['user_id']]['com_logo']!="")?"https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$value['user_id']]['com_logo']:
                                            (($value['user_type']!=1&&$arr_ep[$value['user_id']]['ep_image']!="")?"https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$value['user_id']]['ep_image']:"/img/avatar_default.png")?>"
                                            onerror="this.onerror=null;this.src='/img/avatar_default.png';" alt="" title="<?=($value['user_type']==1)?$arr_in4[1][$value['user_id']]['com_name']:$arr_ep[$value['user_id']]['ep_name']?>">
                                        </div>
                                    <?php if ($count >= 10){ ?>
                                        <div class="pg_main_head_user_img cusor">
                                            +<?=count($arr_mem_new) - $count?>
                                        </div>
                                    <?php break; } } ?>
                                </div>
                                <?php if (array_key_exists(($my_id."-".($my_type%2)), $arr_mem_admin) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_censor)) {?>
                                    <div class="ic_show_man1024_1 click_show_sidebar">
                                        <img src="../img/image_new/ic_sidebar_1024.svg" alt="">
                                    </div>
                                <?php }?>
                                <div class="them_div_nhanvien">
                                    <?php if(!array_key_exists(($my_id."-".($my_type%2)), $administrators_censor)){ ?>
                                        <div class="select_tk_nv pick_id_group" style="position: relative;" data-id_group="<?=$id?>">
                                            <button class="center_avt_join">
                                              <img class="center_avt_btn_join" src="../img/center_avt_btn_join.svg" alt="Ảnh lỗi"> Đã tham gia <img class="center_avt_dropdown" src="../img/center_avt_dropdown.svg" alt="Ảnh lỗi">
                                            </button>
                                            <div class="popup_avt_btn" data-id-group="<?=$id?>">
                                              <div class="popup_avt_btn_detail popup_avt_btn_event_join">
                                                <img class="center_avt_btn_join" src="../img/center_avt_btn_join.svg" alt="Ảnh lỗi"> Đã tham gia <img class="center_avt_dropdown" src="../img/ls_dropdown(1).svg" alt="Ảnh lỗi">
                                              </div>
                                              <div class="popup_avt_btn_detail popup_avt_setting_notify">
                                                <img class="center_avt_btn_join" src="../img/center_avt_notify.svg" alt="Ảnh lỗi"> Cài đặt thông báo
                                              </div>
                                              <!-- popup_avt_unflow -->
                                              <?php if ($group['following'] != "") {
                                                    $arr_following = explode(',', $group['following']);?>
                                                    <?php if (in_array($my_id, $arr_following)) {?>
                                                        <div class="popup_avt_btn_detail click_follow" data-id-group="<?=$id?>">
                                                            <img class="center_avt_btn_join" src="../img/center_avt_unflow.svg" alt="Ảnh lỗi"> Theo dõi nhóm
                                                        </div>
                                                    <?php }else{?>
                                                        <div class="popup_avt_btn_detail detail_click_unfollow">
                                                            <img class="center_avt_btn_join" src="../img/center_avt_unflow.svg" alt="Ảnh lỗi"> Bỏ theo dõi nhóm
                                                        </div>
                                                    <?php }?>
                                              <?php }else{?>
                                                <div class="popup_avt_btn_detail detail_click_unfollow">
                                                    <img class="center_avt_btn_join" src="../img/center_avt_unflow.svg" alt="Ảnh lỗi"> Bỏ theo dõi nhóm
                                                </div>
                                              <?php }?>


                                              <div class="popup_avt_btn_detail" onclick="out_group(<?=$id?>,'<?=$group['group_name']?>')">
                                                <img class="center_avt_btn_join" src="../img/center_gr_exit.svg" alt="Ảnh lỗi"> Rời khỏi nhóm
                                              </div>

                                            </div>
                                        </div>
                                    <?php }?>
                                    <div class="pg_main_head_btn_moi <?=$tamdung_dinhchi?> click_add_friend cusor" data="<?=$id?>">
                                        <div class="pg_main_head_btn_moi_ic">
                                            <img src="../img/image_new/cong.svg" alt="">
                                        </div>
                                        <p>Mời</p>
                                    </div>
                                </div>
                            </div>
                            <?php }else{?>
                                <?php if (!mysql_num_rows($db_invite->result) > 0) {?>
                                    <div class="cha_join_group">
                                        <?php if (mysql_num_rows($member_join->result) > 0) {?>
                                            <button type="submit" class="html_huy_join cusor" onclick="huy_yeucau(<?=$id?>)">Hủy yêu cầu</button>
                                        <?php }else{?>
                                            <?php if (mysql_num_rows($db_rule->result) > 0 || mysql_num_rows($member_question->result) > 0) {?>
                                                <button type="submit" class="html_join_group cusor" onclick="click_appen_question(<?=$id?>)">Tham gia nhóm</button>
                                            <?php }else{?>
                                                <button type="submit" class="html_join_group cusor" onclick="click_nhom_don(<?=$id?>)">Tham gia nhóm</button>
                                            <?php }?>
                                        <?php }?>   
                                    </div> 
                                <?php }?>   
                            <?php }?>
                        </div>

                        <!-- Lời mời nhóm -->
                        <?php if($my_id > 0 && $assoc_invite['invitee_id'] == $my_id && ($assoc_invite['invitee_type']%2) == ($my_type%2)){ ?>
                            <div class="invite_group">
                                <div class="invite_group_padding">
                                    <div class="invite_group_padding_suv">
                                        <div class="invite_group_div1">
                                            <div class="invite_group_div1_img">
                                                <?php if ($arr_ep[$assoc_invite['inviter_id']]['ep_image'] != "") {?>
                                                    <img src="https://chamcong.24hpay.vn/upload/employee/<?=$arr_ep[$assoc_invite['inviter_id']]['ep_image'];?>" alt="">
                                                <?php }else{?>
                                                    <img src="/img/nv_default_bgi.svg" alt="">
                                                <?php }?>
                                            </div>
                                            <div class="invite_group_div1_text">
                                                <h1><?=$arr_ep[$assoc_invite['inviter_id']]['ep_name'];?> đã mời bạn làm
                                                <?php if ($assoc_invite['type_invite'] == 1) {?>
                                                    quản trị viên 
                                                <?php }else if($assoc_invite['type_invite'] == 2){?>
                                                    người kiểm duyệt 
                                                <?php }else if($assoc_invite['type_invite'] == 0){?>
                                                    thành viên
                                                <?php }?>
                                                của nhóm này
                                                </h1>
                                                
                                                <p>Nếu chấp nhận, 
                                                    <?php if ($assoc_invite['type_invite'] != 0) {?>
                                                    bạn sẽ có thể phê duyệt hoặc từ chối yêu cầu làm thành viên, gỡ bài viết và bình luận, xóa thành viên khỏi nhóm cũng như làm nhiều việc khác.
                                                    <?php }else{?>
                                                        bạn có thể tương tác, giao lưu cũng như làm nhiều việc khác trong nhóm này
                                                    <?php }?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="invite_group_div2" data="<?=$assoc_invite['id_invite']?>" data1="<?=$assoc_invite['type_invite']?>">
                                            <div class="invite_group_div2_btn1 cusor accept_as_manager">Chấp nhận</div>
                                            <div class="invite_group_div2_btn2 cusor refuse_manager">Từ chối</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>

                        <div class="pg_main_head_option">
                            <div class="pg_main_head_option_1024 dnone">
                                <div class="pg_main_head_option_1024_ic cusor"><img src="../img/image_new/muiten_left.svg" alt=""></div>
                                <div class="pg_main_head_option_1024_text">Arlene McCoy</div>
                            </div>
                            <div class="pg_main_head_option_text">
                                <div class="pg_main_head_option_text_one hide_ganh click_show_right active_text border_bt_blue hide_1024_1" data-type="1" onclick="click_option('.hide_chung','.ok_thao_luan','.hide_ganh',this,'.tim_hieu_them')">Thảo luận</div>
                                <?php if (($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_new)) {?>
                                    <div class="pg_main_head_option_text_one show_1024_1" data-type="7" onclick="click_option('.hide_chung')">Giới thiệu</div>
                                    <div class="pg_main_head_option_text_one hide_ganh click_show_right" data-type="2" onclick="click_option('.hide_chung','.ok_post_ghim','.hide_ganh',this,'.tim_hieu_them')">Bài viết đã ghim</div>
                                    <div class="pg_main_head_option_text_one hide_ganh click_show_right" data-type="3" onclick="click_option('.hide_chung','.ok_video','.hide_ganh',this,'.tim_hieu_them')">Video</div>
                                    <div class="pg_main_head_option_text_one hide_ganh click_hide_right lick_thanh_vien" data-type="4" onclick="click_option('.hide_chung','.ok_thanh_vien','.hide_ganh',this,'.tim_hieu_them')">Thành viên</div>
                                    <div class="pg_main_head_option_text_one see_more hide_ganh click_hide_right" data-type="5" onclick="click_option('.hide_chung','.ok_file_imgvideo','.hide_ganh',this,'.tim_hieu_them')">File phương tiện</div>
                                    <div class="pg_main_head_option_text_one hide_ganh click_hide_right" data-type="6" onclick="click_option('.hide_chung','.ok_file_rieng','.hide_ganh',this,'.tim_hieu_them')">File</div>
                                <?php }?>
                            </div>

                            <?php if (($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_new)) {?>
                                <div class="pg_main_head_option_btn cusor">
                                    <img src="../img/image_new/btn_3cham.svg" alt="" class="hide_1024_1">

                                    <div class="popup_3cham pick_id_group" data-id_group="<?=$id?>">
                                        <div class="popup_3cham_padding">
                                            <?php $select_gim = new db_query("SELECT `id_group` FROM `group_pin` WHERE `id_user_pin` = " . $my_id . " AND `id_company` = " . $_SESSION['login']['id_com'] . " AND `id_group` = '$id'");?>

                                                <a href="<?=(!array_key_exists(($my_id."-".($my_type%2)), $administrators_censor))?'/groups-my_pending_content-'.$id:'/groups-my_posted_content-'.$id?>" class="popup_3cham_div">
                                                    <div class="popup_3cham_div_img"><img src="../img/image_new/noi_dung.svg" alt=""></div>
                                                    <div class="popup_3cham_div_text">Nội dung của bạn</div>
                                                </a>

                                                <?php if(mysql_num_rows($select_gim->result) > 0){?>
                                                    <div class="popup_3cham_div click_un_ghim" data="<?=$my_id?>" data1="<?=$_SESSION['login']['id_com']?>" data2="<?=$id?>">
                                                        <div class="popup_3cham_div_img"><img src="../img/image_new/bo_ghim.svg" alt=""></div>
                                                        <div class="popup_3cham_div_text">Bỏ ghim nhóm</div>
                                                    </div>
                                                <?php }else{?>
                                                    <div class="popup_3cham_div click_ghim_nhom" data="<?=$my_id?>" data1="<?=$_SESSION['login']['id_com']?>" data2="<?=$id?>">
                                                        <div class="popup_3cham_div_img"><img src="../img/image_new/ghim_nhom.svg" alt=""></div>
                                                        <div class="popup_3cham_div_text">Ghim nhóm</div>
                                                    </div>
                                                <?php }?>
                                                <div class="popup_3cham_div chia_se_relative">
                                                    <div class="popup_3cham_div_img"><img src="../img/image_new/chia_se.svg" alt=""></div>
                                                    <div class="popup_3cham_div_text">Chia sẻ</div>
                                                </div>

                                            <?php if(array_key_exists(($my_id."-".($my_type%2)), $arr_mem_admin) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_censor)){?>
                                                <div class="popup_3cham_div click_setting_notify_show_popup">
                                                    <div class="popup_3cham_div_img"><img src="../img/image_new/chuong.svg" alt=""></div>
                                                    <div class="popup_3cham_div_text">Cài đặt thông báo</div>
                                                </div>

                                                <?php if ($group['following'] != "") {
                                                    $arr_following2 = explode(',', $group['following']);?>
                                                    <?php if (in_array($my_id, $arr_following2)) {?>
                                                        <div class="popup_3cham_div" onclick="click_follow(<?=$id?>)">
                                                            <div class="popup_3cham_div_img"><img src="../img/image_new/un_folow.svg" alt=""></div>
                                                            <div class="popup_3cham_div_text">Theo dõi nhóm</div>
                                                        </div>
                                                    <?php }else{?>
                                                        <div class="popup_3cham_div" onclick="click_unfollow(<?=$id?>,'<?=$group['group_name']?>')">
                                                            <div class="popup_3cham_div_img"><img src="../img/image_new/un_folow.svg" alt=""></div>
                                                            <div class="popup_3cham_div_text">Bỏ theo dõi nhóm</div>
                                                        </div>
                                                    <?php }?>
                                                <?php }else{?>
                                                    <div class="popup_3cham_div" onclick="click_unfollow(<?=$id?>,'<?=$group['group_name']?>')">
                                                        <div class="popup_3cham_div_img"><img src="../img/image_new/un_folow.svg" alt=""></div>
                                                        <div class="popup_3cham_div_text">Bỏ theo dõi nhóm</div>
                                                    </div>
                                                <?php }?>

                                                <div class="popup_3cham_div center_nav_stop_gr">
                                                    <div class="popup_3cham_div_img"><img src="../img/image_new/stop.svg" alt=""></div>
                                                    <div class="popup_3cham_div_text">Tạm dừng nhóm</div>
                                                </div>
                                                <?php if ($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) {?>
                                                    <div class="popup_3cham_div" onclick="click_btn_delete_group(<?=$id?>, '<?=$group['group_name']?>')">
                                                        <div class="popup_3cham_div_img"><img src="../img/image_new/logout_nhom.svg" alt=""></div>
                                                        <div class="popup_3cham_div_text">Xóa nhóm</div>
                                                    </div>
                                                <?php }else{?>
                                                    <div class="popup_3cham_div out_group">
                                                        <div class="popup_3cham_div_img"><img src="../img/image_new/logout_nhom.svg" alt=""></div>
                                                        <div class="popup_3cham_div_text">Rời khỏi nhóm</div>
                                                    </div>
                                                <?php }?>
                                            <?php }else{?>
                                                <div class="popup_3cham_div">
                                                    <div class="popup_3cham_div_img"><img src="../img/image_new/search_3cham.svg" alt=""></div>
                                                    <div class="popup_3cham_div_text">Tìm kiếm</div>
                                                </div>
                                            <?php }?>

                                        </div>
                                    </div>

                                    <!-- POPUP CHIA SẺ -->
                                    <div class="popup_chia_xe">
                                        <div class="popup_chia_xe_padding">
                                            <div class="popup_3cham_div ep_share_news_gr">
                                                <div class="popup_3cham_div_img"><img src="../img/image_new/chia_se.svg" alt=""></div>
                                                <div class="popup_3cham_div_text">Chia sẻ ngay</div>
                                            </div>
                                            <div class="popup_3cham_div ep_share_news_gr">
                                                <div class="popup_3cham_div_img"><img src="../img/ep_post_share_new.svg" alt="Ảnh lỗi"></div>
                                                <div class="popup_3cham_div_text">Chia sẻ lên bảng tin</div>
                                            </div>
                                            <div class="popup_3cham_div ep_send_with_chat_group" data-gr_id="<?=$id?>">
                                                <div class="popup_3cham_div_img"><img src="../img/ep_post_share_mess.svg" alt="Ảnh lỗi"></div>
                                                <div class="popup_3cham_div_text">Gửi bằng Chat </div>
                                            </div>
                                            <div class="popup_3cham_div ep_share_up_invidual" data-gr_id="<?=$id?>">
                                                <div class="popup_3cham_div_img"><img src="../img/ep_post_page_friend.svg" alt="Ảnh lỗi"></div>
                                                <div class="popup_3cham_div_text">Chia sẻ lên trang cá nhân của bạn bè</div>
                                            </div>
                                            <div class="popup_3cham_div">
                                                <div class="popup_3cham_div_img"><img src="../img/image_new/sao_chep.svg" alt=""></div>
                                                <div class="popup_3cham_div_text">Sao chép liên kết</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    <!-- Thảo luận, Bài viết đã ghim, Video -->
                    <div class="pg_main_content tong_post_5">
                        <?php if (($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_new)) {?>
                            <!-- Thảo luận -->
                            <div class="pg_main_content_left ok_thao_luan hide_chung">
                                <?php if (($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_new)) {?>
                                    
                                    <div class="main_content_left_box1 class_important" data-time="<?php if ($group['group_pause'] != 0 && $time < $group['group_pause']) {echo $time_pause;}else if ($check_dinhchi > 0) {echo $time_dinhchi;}?>">
                                        <div class="main_content_left_box1_sub1">
                                            <div class="main_content_left_box1_sub1_img">
                                                <img src="<?=$my_avt?>" alt="">
                                            </div>
                                            <div class="main_content_left_box1_sub1_input <?=$show_class?>">
                                                <input type="text" placeholder="Hãy viết cảm nghĩ của bạn" readonly>
                                            </div>
                                        </div>
                                        <div class="main_content_left_box1_sub2">
                                            <div class="main_content_left_box1_sub2_nav cusor <?=$show_class?>" data-group_id="<?=$id_group?>" data-group_type="1" data-group-status_post="<?=$status?>">
                                                <div class="main_content_left_box1_sub2_img">
                                                    <img src="../img/image_new/taianhlen.svg" alt="">
                                                </div>
                                                <div class="main_content_left_box1_sub2_text">Tải lên ảnh/video/tệp</div>
                                            </div>
                                            <div class="main_content_left_box1_sub2_nav cusor <?=$show_class?>">
                                                <div class="main_content_left_box1_sub2_img">
                                                    <img src="../img/image_new/y_kien.svg" alt="">
                                                </div>
                                                <div class="main_content_left_box1_sub2_text">Thăm dò ý kiến</div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="main_content_left_box2">
                                        <div class="main_content_left_box2_text">Ghim bài viết</div>
                                        <div class="scroll_x_ghim_posts">
                                            <div class="display_flex_ghim_posts">
                                                <div class="main_content_left_box2_chu_y">
                                                    <div class="main_content_left_box2_chu_y_img">
                                                        <img src="../img/image_new/img_gim.svg" alt="">
                                                    </div>
                                                    <div class="main_content_left_box2_chu_y_text">
                                                        <div class="main_content_left_box2_chu_y_text1">Nêu bật những điều đáng chú ý nhất trong nhóm</div>
                                                        <div class="main_content_left_box2_chu_y_text2">Nêu bật những điều đáng chú ý nhất trong nhóm ở một nơi thuận tiện mà bạn có thể ghim bài viết</div>
                                                    </div>
                                                </div>
                                                <?php if(count($lst_post_ghim) > 0){
                                                    foreach ($lst_post_ghim as $k => $post_ghim) { 
                                                        $arr_img = explode('||', $post_ghim['file']);
                                                        $name_file = explode('||', $post_ghim['name_file']);

                                                        $explode_file = explode('.', $arr_img[0]);
                                                        $implode_file_ghim = implode('.', $explode_file);

                                                        $count_file = count($explode_file) - 1;
                                                        $check_extension = $explode_file[$count_file];

                                                        $avt_post_ghim = "/img/logo_com.png";
                                                        if ($post_ghim['author_type'] == 1){
                                                            if ($arr_in4[1][$post_ghim['author']]['com_logo']!=''){
                                                                $avt_post_ghim = "https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$post_ghim['author']]['com_logo'];
                                                            }
                                                            $name_post_ghim = $arr_in4[$post_ghim['author_type']][$post_ghim['author']]['com_name']; 
                                                        }else{
                                                            if ($arr_in4[2][$post_ghim['author']]['ep_image']!=''){
                                                                $avt_post_ghim = "https://chamcong.24hpay.vn/upload/employee/".$arr_in4[2][$post_ghim['author']]['ep_image'];
                                                            }
                                                            $name_post_ghim = $arr_in4[2][$post_ghim['author']]['ep_name']; 
                                                        } 
                                                        ?>
                                                        <div class="gim_bai_viet">
                                                            <div class="gim_bai_viet_padding">
                                                                <div class="gim_bai_viet_box1 parent_post_ghim" data="<?=$post_ghim['new_id']?>">
                                                                    <div class="gim_bai_viet_box1_info">
                                                                        <div class="gim_bai_viet_box1_info_avt">
                                                                            <a target="_blank" href="<?php echo render_link_profile($post_ghim['author'], $post_ghim['author_type']) ?>">
                                                                                <img src="<?=$avt_post_ghim?>" onerror="this.src=`/img/logo_com.png">
                                                                            </a>
                                                                        </div>
                                                                        <div class="gim_bai_viet_box1_info_text">
                                                                            <a href="<?php echo render_link_profile($post_ghim['author'], $post_ghim['author_type']) ?>" class="gim_bai_viet_box1_info_text_name"><?=$name_post_ghim?></a>
                                                                            <div class="gim_bai_viet_box1_info_text_p">
                                                                                <p>Quản trị viên</p>
                                                                                <p class="class_p2">. <?=time_elapsed_string($post_ghim['updated_at'])?> .</p> 
                                                                                <img title="<?php echo $data_view_mode_txt[$post_ghim['view_mode']] ?>" src="<?=$data_view_mode[$post_ghim['view_mode']]?>" alt="Ảnh lỗi">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($time > $group['group_pause']) {?>
                                                                        <div class="gim_bai_viet_box1_ic toggle_remove_post cusor">
                                                                            <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                                            <div class="abs_remove_ghim ghim_post_group" data="0">
                                                                                <div class="abs_remove_ghim_padding">
                                                                                    <div class="abs_remove_ghim_ic">
                                                                                        <img src="../img/image_new/bo_ghim.svg" alt="">
                                                                                    </div>
                                                                                    <div class="abs_remove_ghim_text">Bỏ ghim bài viết</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php }?>
                                                                </div>

                                                                <p class="gim_bai_viet_box2 elipsis1"><?=nl2br($post_ghim['content'])?></p>
                                                                <div class="gim_bai_viet_box3">
                                                                    <?php foreach ($arr_img as $key => $value) {?>
                                                                        <?php if($post_ghim['file'] != ""){?>
                                                                            <?php if (preg_match('/image/', $value) == true) {?>
                                                                                    <img src="<?=$value?>" alt="">
                                                                            <?php }else if(preg_match('/video/', $value) == true){?>
                                                                                <video controls="" class="video_100pt">
                                                                                    <source src="<?=$value; ?>">
                                                                                </video>
                                                                            <?php }else if(preg_match('/file/', $value) == true){?>
                                                                                <a download href="<?=$value?>">
                                                                                    <div class="html_file_ghim cusor">
                                                                                        <div class="html_file_ghim_sub">
                                                                                            <div class="html_file_ghim_name elipsis1"><?=$name_file[$key]?></div>
                                                                                            <div class="html_file_ghim_size">1149MB <?=date('H:i, d/m/Y',$post_ghim['created_at'])?></div>
                                                                                            <img class="html_file_ghim_img" src="../img/icon_download.svg" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                    <?php }?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="lst_news_detail_gr lst_news_detail_gr_1" data-page="1" data-id_group=<?=$id;?>>
                                    <?php foreach ($lst_posts as $k => $row) {  
                                        if ($row['hide_post'] != "") {
                                            $arr_hide_post = explode(',', $row['hide_post']);
                                        }else{
                                            $arr_hide_post = [];
                                        }
                                        if ($time > $row['show_time']) {?>
                                            <?php if (in_array($my_id, $arr_hide_post)) {?>
                                                <div class="hide_post_padding">
                                                    <div class="hide_post_one mrb_20px">
                                                        <img src="../img/an-bai-viet.svg" alt="">
                                                        <div class="hide_post_one_text">
                                                            <p>Đã ẩn bài viết</p>
                                                            <p class="fig_text_4-1">Bạn sẽ không nhìn thấy bài viết này trên bảng tin</p>
                                                        </div>
                                                    </div>
                                                    <div class="hide_post_one">
                                                        <img src="../img/tim-ho-tro.svg" alt="">
                                                        <div class="hide_post_one_text">
                                                            <p>Tìm hỗ trợ hoặc báo cáo bài viết</p>
                                                            <p>Tôi lo ngại về bài viết này</p>
                                                        </div>
                                                    </div>
                                                    <div class="hoan_tac" data-post="<?=$row['new_id'] ?>">Hoàn tác</div>
                                                </div>
                                            <?php }else{?>
                                                <div class="main_content_left_posts content_news_item">
                                                    <div class="main_content_left_posts_pd">
                                                            <?php include '../includes/index_employee/post.php'; ?>
                                                        <div class="hide_posts"></div>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        <?php }?>
                                    <?php }?>
                                </div>
                            </div>

                            <!-- Bài viết đã ghim -->
                            <div class="pg_main_content_left post_mt_18 ok_post_ghim hide_chung lst_news_detail_gr lst_news_detail_gr_2" data-page="1" data-id_group=<?=$id;?>>
                                <?php 
                                foreach ($lst_post_ghim as $k => $row) {
                                    if ($row['hide_post'] != "") {
                                        $arr_hide_post = explode(',', $row['hide_post']);
                                    }else{
                                        $arr_hide_post = [];
                                    }
                                    if (in_array($my_id, $arr_hide_post)) {?>
                                        <div class="hide_post_padding">
                                            <div class="hide_post_one mrb_20px">
                                                <img src="../img/an-bai-viet.svg" alt="">
                                                <div class="hide_post_one_text">
                                                    <p>Đã ẩn bài viết</p>
                                                    <p class="fig_text_4-1">Bạn sẽ không nhìn thấy bài viết này trên bảng tin</p>
                                                </div>
                                            </div>
                                            <div class="hide_post_one">
                                                <img src="../img/tim-ho-tro.svg" alt="">
                                                <div class="hide_post_one_text">
                                                    <p>Tìm hỗ trợ hoặc báo cáo bài viết</p>
                                                    <p>Tôi lo ngại về bài viết này</p>
                                                </div>
                                            </div>
                                            <div class="hoan_tac" data-post="<?=$row['new_id'] ?>">Hoàn tác</div>
                                        </div>
                                    <?php }else{?>
                                        <div class="main_content_left_posts content_news_item">
                                            <div class="main_content_left_posts_pd">
                                                <?php include '../includes/index_employee/post.php'; ?>
                                                <div class="hide_posts"></div>
                                            </div>
                                        </div>
                                    <?php }?>
                                <?php }?>                            
                            </div> 

                            <!-- Video -->
                            <div class="pg_main_content_left post_mt_18 ok_video hide_chung lst_news_detail_gr lst_news_detail_gr_3" data-page="1" data-id_group=<?=$id;?>>
                                <?php 
                                foreach ($lst_posts_video as $k => $row) { 
                                    if ($row['hide_post'] != "") {
                                        $arr_hide_post = explode(',', $row['hide_post']);
                                    }else{
                                        $arr_hide_post = [];
                                    }

                                    if (in_array($my_id, $arr_hide_post)) {?>
                                        <div class="hide_post_padding">
                                            <div class="hide_post_one mrb_20px">
                                                <img src="../img/an-bai-viet.svg" alt="">
                                                <div class="hide_post_one_text">
                                                    <p>Đã ẩn bài viết</p>
                                                    <p class="fig_text_4-1">Bạn sẽ không nhìn thấy bài viết này trên bảng tin</p>
                                                </div>
                                            </div>
                                            <div class="hide_post_one">
                                                <img src="../img/tim-ho-tro.svg" alt="">
                                                <div class="hide_post_one_text">
                                                    <p>Tìm hỗ trợ hoặc báo cáo bài viết</p>
                                                    <p>Tôi lo ngại về bài viết này</p>
                                                </div>
                                            </div>
                                            <div class="hoan_tac" data-post="<?=$row['new_id'] ?>">Hoàn tác</div>
                                        </div>
                                    <?php }else{?>
                                        <div class="main_content_left_posts content_news_item">
                                            <div class="main_content_left_posts_pd">
                                                <?php include '../includes/index_employee/post.php'; ?>
                                                <div class="hide_posts"></div>
                                            </div>
                                        </div>
                                    <?php }?>
                                <?php }?>  
                            </div>
                        
                            <!-- Thành viên -->
                            <div class="thanh_vien ok_thanh_vien hide_chung">
                                <div class="thanh_vien_padding" data="<?=$id?>">
                                    <div class="thanh_vien_block1 border_bottom">
                                        <div class="thanh_vien_block1_title">Thành viên (<?=$count_member?>)</div>
                                        <div class="thanh_vien_block1_input"><input type="text" placeholder="Tìm kiếm thành viên"></div>
                                    </div>

                                    <!-- Thành viên đăng nhập -->
                                    <?php if (($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_new)) {?>
                                        <div class="thanh_vien_block2 border_bottom">
                                            <div class="thanh_vien_block2_QTV">
                                                <div class="thanh_vien_block2_QTV_box1">
                                                    <div class="thanh_vien_block2_QTV_img">
                                                        <img src="<?=($my_type==1&&$arr_in4[1][$my_id]['com_logo']!="")?"https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$my_id]['com_logo']:
                                                        (($my_type!=1&&$arr_ep[$my_id]['ep_image']!="")?"https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$my_id]['ep_image']:"/img/avatar_default.png")?>"
                                                        onerror="this.onerror=null;this.src='/img/avatar_default.png';" alt="">
                                                    </div>
                                                    <div class="thanh_vien_block2_QTV_text">
                                                        <a href="<?=render_link_profile($my_id, $my_type)?>">
                                                            <div class="thanh_vien_block2_QTV_name"><?=($my_type==1)?$arr_in4[1][$my_id]['com_name']:$arr_ep[$my_id]['ep_name']?></div>
                                                        </a>
                                                        <?php if (array_key_exists(($my_id."-".($my_type%2)), $arr_mem_admin)) {?>
                                                            <div class="thanh_vien_block2_QTV_position active_text">Quản trị viên</div>
                                                        <?php }else if(array_key_exists(($my_id."-".($my_type%2)), $arr_mem_censor)){?>
                                                            <div class="thanh_vien_block2_QTV_position active_text">Người kiểm duyệt</div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                                <div class="thanh_vien_block2_QTV_box2">
                                                    <div class="thanh_vien_block2_QTV_box2_ic pp_group_owner_relative">
                                                        <img src="../img/image_new/3cham_ngang.svg" alt="">

                                                        <div class="pp_group_owner_remove">
                                                            <div class="go_loi_moi_padding">
                                                                <?php if ($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) {?>
                                                                    <div class="go_loi_moi_one" onclick="click_btn_delete_group(<?=$id?>,'<?=$group['group_name']?>')">Xóa nhóm</div>
                                                                <?php }else{?>
                                                                    <div class="go_loi_moi_one" onclick="out_group(<?=$id?>,'<?=$group['group_name']?>')">Rời khỏi nhóm</div>
                                                                <?php }?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>

                                    <!-- Quản trị viên và người kiểm duyệt -->
                                    <div class="thanh_vien_block3 border_bottom">
                                        <div class="thanh_vien_block3_padding">
                                            <div class="thanh_vien_block3_title">Quản trị viên và người kiểm duyệt</div>
                                            <div class="thanh_vien_block3_member">
                                                <?php foreach ($administrators_censor as $key => $value) { ?>
                                                    <div class="thanh_vien_block3_member_one_sub_cha nth_child_friend parent_member">
                                                        <div class="thanh_vien_block3_member_one">
                                                            <div class="thanh_vien_block2_QTV_box1">
                                                                <div class="thanh_vien_block2_QTV_img">
                                                                    <img src="<?=($value['user_type']==1&&$arr_in4[1][$value['user_id']]['com_logo']!="")?"https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$value['user_id']]['com_logo']:
                                                                    (($value['user_type']!=1&&$arr_ep[$value['user_id']]['ep_image']!="")?"https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$value['user_id']]['ep_image']:"/img/avatar_default.png")?>"
                                                                    onerror="this.onerror=null;this.src='/img/avatar_default.png';" alt="">
                                                                </div>
                                                                <div class="thanh_vien_block2_QTV_text">
                                                                    <a href="<?=render_link_profile($value['user_id'],$value['user_type'])?>">
                                                                        <div class="thanh_vien_block2_QTV_name"><?=($value['user_type']==1)?$arr_in4[1][$value['user_id']]['com_name']:$arr_ep[$value['user_id']]['ep_name']?></div>
                                                                    </a>
                                                                    <?php if($value['type_mem'] == 1){?>
                                                                        <div class="thanh_vien_block2_QTV_position active_text">Quản trị viên</div>
                                                                    <?php }else{?>
                                                                        <div class="thanh_vien_block2_QTV_position active_text">Người kiểm duyệt</div>
                                                                    <?php }?>                                                                    
                                                                </div>
                                                            </div>
                                                            <!-- chức năng quản lý chỉ dành cho manager || admin || censor -->
                                                            <!-- nếu đây ko p người tạo nhóm và tôi là manager || admin || censor -->
                                                            <?php if (!($value['user_id'] == $group['id_manager'] && ($value['user_type']%2) == ($group['manager_type']%2) && $value['user_id'] > 0) && array_key_exists($my_id."-".($my_type%2),$administrators_censor)) { ?>
                                                                <div class="thanh_vien_block2_QTV_box2">
                                                                    <div class="thanh_vien_block2_QTV_box2_ic show_popup_QTV">
                                                                        <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                                        <div class="pp_remove_QTV">
                                                                            <div class="go_loi_moi_padding" data="<?=$value['user_id']?>" data-user_type="<?=$value['user_type']?>">
                                                                                <?php if($value['type_mem'] == 1){?>
                                                                                    <div class="go_loi_moi_one" onclick="remove_qtv(this)">Gỡ vai trò quản trị viên</div>
                                                                                <?php }else if($value['type_mem'] == 2){?>
                                                                                    <div class="go_loi_moi_one" onclick="remove_kiemduyet(this)">Gỡ vai trò người kiểm duyệt</div>
                                                                                <?php }?>
                                                                                <div class="go_loi_moi_one" onclick="delete_thanhvien(<?=$value['user_id']?>,<?=$id?>,<?=$value['user_type']?>)">Xóa thành viên</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </div> 
                                            <?php if (count($administrators_censor) > 3) {?>
                                                <div class="thanh_vien_block3_show_all active_text cusor click_show_all_friend">Xem tất cả</div>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <!-- Bạn bè -->
                                    <div class="thanh_vien_block4 border_bottom">
                                        <div class="thanh_vien_block3_padding">
                                            <div class="thanh_vien_block3_title">Bạn bè</div>
                                            <div class="thanh_vien_block3_member">
                                                <?php $cout_cout = 0;
                                                if ($group['id_employee'] != "" || $group['id_employee'] != NULL) {
                                                    foreach ($arr_mem_friend as $key => $value) {
                                                        // select đình chỉ thành viên
                                                        $db_dinhchi1 = new db_query("SELECT `time` FROM `dinh_chi_thanh_vien` WHERE `is_suspended` = '".$value['user_id']."' AND `id_group` = '$id'");
                                                        $dinhchi1_as = mysql_fetch_assoc($db_dinhchi1->result);
                                                        $dinhchi1_as['time'];
                                                        // select mời vaofn nhóm
                                                        $db_invite_group1 = new db_query("SELECT `invitee_id`,`type_invite` FROM `invite_to_group` WHERE `id_group` = '$id' AND `invitee_id` = '".$value['user_id']."' ORDER BY `type_invite` ASC LIMIT 1");
                                                        $show_invite = mysql_fetch_assoc($db_invite_group1->result); 

                                                        // Giới hạn hoạt động thành viên
                                                        $db_gh = new db_query("SELECT * FROM `gioi_han_thanh_vien` WHERE `id_group` = '$id' AND `id_user_limit` = '".$value['user_id']."'");
                                                        $cout_cout++;?>
                                                        <div class="thanh_vien_block3_member_one_sub_cha nth_child_friend parent_member">
                                                            <div class="thanh_vien_block3_member_one parent_info_name">
                                                                <div class="thanh_vien_block2_QTV_box1">
                                                                    <div class="thanh_vien_block2_QTV_img">
                                                                        <img src="<?=($value['user_type']==1&&$arr_in4[1][$value['user_id']]['com_logo']!="")?"https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$value['user_id']]['com_logo']:
                                                                        (($value['user_type']!=1&&$arr_ep[$value['user_id']]['ep_image']!="")?"https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$value['user_id']]['ep_image']:"/img/avatar_default.png")?>"
                                                                        onerror="this.onerror=null;this.src='/img/avatar_default.png';" alt="">
                                                                    </div>
                                                                    <div class="thanh_vien_block2_QTV_text">
                                                                        <a href="<?=render_link_profile($value['user_id'],$value['user_type'])?>">
                                                                            <div class="thanh_vien_block2_QTV_name"><?=($value['user_type']==1)?$arr_in4[1][$value['user_id']]['com_name']:$arr_ep[$value['user_id']]['ep_name']?></div>
                                                                        </a>
                                                                        <div class="thanh_vien_block4_text"> Bạn chung</div>
                                                                        <div class="thanh_vien_block4_text">Làm việc tại Tìm Việc 365</div>
                                                                    </div>
                                                                </div>
                                                                <div class="thanh_vien_block2_QTV_box2">
                                                                    <div class="send_message cusor">
                                                                        <div class="send_message_ic">
                                                                            <img src="../img/image_new/send_message.svg" alt="">
                                                                        </div>
                                                                        <div class="send_message_text">Gửi tin nhắn</div>
                                                                    </div>
                                                                    <!-- chức năng quản lý chỉ dành cho manager || admin || censor -->
                                                                    <?php if (array_key_exists(($my_id."-".($my_type%2)), $administrators_censor)) {?>
                                                                        <div class="thanh_vien_block2_QTV_box2_ic click_popup_for_friends">
                                                                            <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                                            <div class="popup_for_friends">
                                                                                <div class="go_loi_moi_padding" data="<?=$value['user_id']?>" data-user_type="<?=$value['user_type']?>" data2="<?=$dinhchi1_as['time']?>">
                                                                                    <div class="go_loi_moi_one member_suspension_click">Đình chỉ trong nhóm</div>
                                                                                    <div class="go_loi_moi_one membership_activity_limit_click"
                                                                                    <?php if (mysql_num_rows($db_gh->result) > 0) {
                                                                                        echo 'data-row="1"';
                                                                                    }else{
                                                                                        echo 'data-row=""';
                                                                                    }
                                                                                    ?>
                                                                                    >Giới hạn hoạt động</div>
                                                                                    <?php if (!array_key_exists(($value['user_id']."-".($value['user_type']%2)), $arr_mem_admin)) {?>
                                                                                        <?php if ($show_invite['type_invite'] != 2) {?>
                                                                                        <?php }else{?>
                                                                                            <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                        <?php }?>
                                                                                        <?php if (mysql_num_rows($db_invite_group1->result) > 0) {?>
                                                                                            <?php if ($show_invite['type_invite'] != 2) {?>
                                                                                                <div class="go_loi_moi_one">Đã mời làm quản trị viên</div>
                                                                                            <?php }else{?>
                                                                                                <div class="go_loi_moi_one">Đã mời làm người kiểm duyệt</div>
                                                                                            <?php }?>
                                                                                        <?php }else{?>
                                                                                            <?php if (array_key_exists(($value['user_id']."-".($value['user_type']%2)), $arr_mem_censor)) {?>
                                                                                                <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                            <?php }else{?>
                                                                                                <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                                <div class="go_loi_moi_one add_censor" data="2" onclick="add_censor_f(this)">Thêm làm người kiểm duyệt</div>
                                                                                            <?php }?>
                                                                                        <?php }?>
                                                                                    <?php }?>
                                                                                    <div class="go_loi_moi_one" onclick="delete_thanhvien(<?=$value['user_id']?>,<?=$id?>,<?=$value['user_type']?>)">Xóa thành viên</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php }else if (array_key_exists(($my_id."-".($my_type%2)), $arr_mem_censor)) {?>
                                                                        <?php if (!array_key_exists(($value['user_id']."-".($value['user_type']%2)), $arr_mem_admin) && !array_key_exists(($value['user_id']."-".($value['user_type']%2)), $arr_mem_censor)) {?>
                                                                            <div class="thanh_vien_block2_QTV_box2_ic click_popup_for_friends">
                                                                                <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                                                <div class="popup_for_friends">
                                                                                    <div class="go_loi_moi_padding" data="<?=$value['user_id']?>" data-user_type="<?=$value['user_type']?>" data2="<?=$dinhchi1_as['time']?>">
                                                                                        <div class="go_loi_moi_one member_suspension_click">Đình chỉ trong nhóm</div>
                                                                                        <div class="go_loi_moi_one membership_activity_limit_click">Giới hạn hoạt động</div>
                                                                                        <?php if ($show_invite['type_invite'] != 2) {?>
                                                                                        <?php }else{?>  
                                                                                            <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                        <?php }?>
                                                                                        <?php if (mysql_num_rows($db_invite_group1->result) > 0) {?>
                                                                                            <?php if ($show_invite['type_invite'] != 2) {?>
                                                                                                <div class="go_loi_moi_one">Đã mời làm quản trị viên</div>
                                                                                            <?php }else{?>
                                                                                                <div class="go_loi_moi_one">Đã mời làm người kiểm duyệt</div>
                                                                                            <?php }?>
                                                                                        <?php }else{?>
                                                                                            <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                            <div class="go_loi_moi_one add_censor" data="2" onclick="add_censor_f(this)">Thêm làm người kiểm duyệt</div>
                                                                                        <?php }?>
                                                                                        <div class="go_loi_moi_one" onclick="delete_thanhvien(<?=$value['user_id']?>,<?=$id?>,<?=$value['user_type']?>)">Xóa thành viên</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    <?php }?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                <?php }?>
                                                <?php if ($cout_cout > 3) {?>
                                                    <div class="thanh_vien_block3_show_all active_text cusor click_show_all_friend">Xem tất cả</div>
                                                <?php }?>
                                            </div>

                                            
                                        </div>
                                    </div>

                                    <!-- Thành viên mới vào nhóm -->
                                    <div class="thanh_vien_block4 border_bottom">
                                        <div class="thanh_vien_block3_padding">
                                            <div class="thanh_vien_block3_title">Thành viên mới vào nhóm</div>
                                            <div class="thanh_vien_block3_member">
                                                <?php $cout_show_all = 0;
                                                if ($group['id_employee'] != "" || $group['id_employee'] != NULL) {?>
                                                    <?php foreach ($arr_mem_new as $key => $value) {
                                                        // select đình chỉ thành viên
                                                        $db_dinhchi1 = new db_query("SELECT `time` FROM `dinh_chi_thanh_vien` WHERE `is_suspended` = '".$value['user_id']."' AND `id_group` = '$id'");
                                                        $dinhchi1_as = mysql_fetch_assoc($db_dinhchi1->result);
                                                        $dinhchi1_as['time'];

                                                        $cout_show_all++;
                                                        $db_invite_group2 = new db_query("SELECT `invitee_id`,`type_invite` FROM `invite_to_group` WHERE `id_group` = '$id' AND `invitee_id` = '".$value['user_id']."' ORDER BY `type_invite` ASC LIMIT 1");
                                                        $show_invite2 = mysql_fetch_assoc($db_invite_group2->result);?>
                                                        <?php if ($my_id != $value['user_id'] || $my_type%2 != $value['user_type']%2) {?>
                                                            <div class="thanh_vien_block3_member_one_sub_cha nth_child_friend parent_member">
                                                                <div class="thanh_vien_block3_member_one parent_info_name">
                                                                    <div class="thanh_vien_block2_QTV_box1">
                                                                        <div class="thanh_vien_block2_QTV_img">
                                                                            <img src="<?=($value['user_type']==1&&$arr_in4[1][$value['user_id']]['com_logo']!="")?"https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$value['user_id']]['com_logo']:
                                                                            (($value['user_type']!=1&&$arr_ep[$value['user_id']]['ep_image']!="")?"https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$value['user_id']]['ep_image']:"/img/avatar_default.png")?>"
                                                                            onerror="this.onerror=null;this.src='/img/avatar_default.png';" alt="">
                                                                        </div>
                                                                        <div class="thanh_vien_block2_QTV_text">
                                                                            <a href="<?=render_link_profile($value['user_id'],$value['user_type'])?>">
                                                                                <div class="thanh_vien_block2_QTV_name"><?=($value['user_type']==1)?$arr_in4[1][$value['user_id']]['com_name']:$arr_ep[$value['user_id']]['ep_name']?></div>
                                                                            </a>
                                                                            <div class="thanh_vien_block4_text">Hà Nội</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="thanh_vien_block2_QTV_box2">
                                                                        <?php if(!(in_array($value['user_id'], $accepted_invite_com) && $value['user_type'] == 1) || (in_array($value['user_id'], $accepted_invite_emp) && ($value['user_type'] == 0 || $value['user_type'] == 2))){?>
                                                                            <div class="btn_add_friend cusor">
                                                                                <div class="btn_add_friend_ic"><img src="../img/image_new/add_friend.svg" alt=""></div>
                                                                                <div class="btn_add_friend_tex">Thêm bạn bè</div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if (($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_new)) {?>
                                                                            <div class="thanh_vien_block2_QTV_box2_ic click_popup_for_friends">
                                                                                <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                                                <div class="popup_for_friends">
                                                                                    <div class="go_loi_moi_padding" data="<?=$value['user_id']?>" data-user_type="<?=$value['user_type']?>" data2="<?=$dinhchi1_as['time']?>">
                                                                                        <div class="go_loi_moi_one member_suspension_click">Đình chỉ trong nhóm</div>
                                                                                        <div class="go_loi_moi_one membership_activity_limit_click">Giới hạn hoạt động</div>
                                                                                        <?php if (!array_key_exists($value['user_id']."-".($value['user_type']%2), $arr_mem_admin)) {?>
                                                                                            <?php if ($show_invite2['type_invite'] != 2) {?>
                                                                                            <?php }else{?>
                                                                                                <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                            <?php }?>
                                                                                            <?php if (mysql_num_rows($db_invite_group2->result) > 0) {?>
                                                                                                <?php if ($show_invite2['type_invite'] != 2) {?>
                                                                                                    <div class="go_loi_moi_one">Đã mời làm quản trị viên</div>
                                                                                                <?php }else{?>
                                                                                                    <div class="go_loi_moi_one">Đã mời làm người kiểm duyệt</div>
                                                                                                <?php }?>
                                                                                            <?php }else{?>
                                                                                                <?php if (array_key_exists($value['user_id']."-".($value['user_type']%2), $arr_mem_censor)) {?>
                                                                                                    <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                                <?php }else{?>
                                                                                                    <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                                    <div class="go_loi_moi_one add_censor" data="2" onclick="add_censor_f(this)">Thêm làm người kiểm duyệt</div>
                                                                                                <?php }?>
                                                                                            <?php }?>
                                                                                        <?php }?>
                                                                                        <div class="go_loi_moi_one" onclick="delete_thanhvien(<?=$value['user_id']?>,<?=$id?>,<?=$value['user_type']?>)">Xóa thành viên</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }else if (array_key_exists(($my_id."-".($my_type%2)), $arr_mem_censor)) {?>
                                                                            <?php if (!array_key_exists($value['user_id']."-".($value['user_type']%2), $arr_mem_admin) && !array_key_exists($value['user_id']."-".($value['user_type']%2), $arr_mem_censor)) {?>
                                                                                <div class="thanh_vien_block2_QTV_box2_ic click_popup_for_friends">
                                                                                    <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                                                    <div class="popup_for_friends">
                                                                                        <div class="go_loi_moi_padding" data="<?=$value['user_id']?>" data-user_type="<?=$value['user_type']?>">
                                                                                            <div class="go_loi_moi_one member_suspension_click">Đình chỉ trong nhóm</div>
                                                                                            <div class="go_loi_moi_one membership_activity_limit_click">Giới hạn hoạt động</div>
                                                                                            <?php if ($show_invite['type_invite'] != 2) {?>
                                                                                            <?php }else{?>  
                                                                                                <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                            <?php }?>
                                                                                            <?php if (mysql_num_rows($db_invite_group1->result) > 0) {?>
                                                                                                <?php if ($show_invite['type_invite'] != 2) {?>
                                                                                                    <div class="go_loi_moi_one">Đã mời làm quản trị viên</div>
                                                                                                <?php }else{?>
                                                                                                    <div class="go_loi_moi_one">Đã mời làm người kiểm duyệt</div>
                                                                                                <?php }?>
                                                                                            <?php }else{?>
                                                                                                <div class="go_loi_moi_one add_administrators" onclick="add_qtv(this)">Thêm làm quản trị viên</div>
                                                                                                <div class="go_loi_moi_one add_censor" data="2" onclick="add_censor_f(this)">Thêm làm người kiểm duyệt</div>
                                                                                            <?php }?>
                                                                                            <div class="go_loi_moi_one" onclick="delete_thanhvien(<?=$value['user_id']?>,<?=$id?>,<?=$value['user_type']?>)">Xóa thành viên</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                    <?php }?>
                                                <?php }?>
                                            </div>
                                            <?php if ($cout_show_all > 3) {?>
                                                <div class="thanh_vien_block3_show_all active_text cusor click_show_all_friend">Xem tất cả</div>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <!-- Đã mời -->
                                    <div class="thanh_vien_block4 border_bottom">
                                        <div class="thanh_vien_block3_padding">
                                            <div class="thanh_vien_block3_title">Đã mời</div>
                                            <div class="thanh_vien_block3_member">
                                                <?php $cout_show_all2 = 0;
                                                foreach ($be_mem as $key => $value) {
                                                    $cout_show_all2++;?>
                                                    <div class="thanh_vien_block3_member_one_sub_cha nth_child_friend parent_member">
                                                        <div class="thanh_vien_block3_member_one parent_info_name">
                                                            <div class="thanh_vien_block2_QTV_box1">
                                                                <div class="thanh_vien_block2_QTV_img">
                                                                    <img src="<?=($value['invitee_type']==1&&$arr_in4[1][$value['invitee_id']]['com_logo']!="")?"https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$value['invitee_id']]['com_logo']:
                                                                    (($value['invitee_type']!=1&&$arr_ep[$value['invitee_id']]['ep_image']!="")?"https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$value['invitee_id']]['ep_image']:"/img/avatar_default.png")?>"
                                                                    onerror="this.onerror=null;this.src='/img/avatar_default.png';" alt="">
                                                                </div>
                                                                <div class="thanh_vien_block2_QTV_text">
                                                                    <a href="<?=render_link_profile($value['invitee_id'],$value['invitee_type'])?>">
                                                                        <div class="thanh_vien_block2_QTV_name"><?=($value['invitee_type']==1)?$arr_in4[1][$value['invitee_id']]['com_name']:$arr_ep[$value['invitee_id']]['ep_name']?></div>
                                                                    </a>
                                                                    <div class="thanh_vien_block4_text">Hà Nội</div>
                                                                </div>
                                                            </div>
                                                            <div class="thanh_vien_block2_QTV_box2">

                                                                <?php if(!(in_array($value['invitee_id'], $accepted_invite_com) && $value['invitee_type'] == 1) || (in_array($value['invitee_id'], $accepted_invite_emp) && ($value['user_type'] == 0 || $value['user_type'] == 2))){?>
                                                                    <div class="btn_add_friend cusor">
                                                                        <div class="btn_add_friend_ic"><img src="../img/image_new/add_friend.svg" alt=""></div>
                                                                        <div class="btn_add_friend_tex">Thêm bạn bè</div>
                                                                    </div>
                                                                <?php }?>
                                                                <?php if (($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_new) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_censor)) {?>
                                                                    <div class="thanh_vien_block2_QTV_box2_ic popup_go_loi_moi">
                                                                        <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                                        <div class="go_loi_moi">
                                                                            <div class="go_loi_moi_padding" data="<?=$value['invitee_id']?>" data-user_type="<?=$value['invitee_type']?>">
                                                                                <div class="go_loi_moi_one go_loi_moi_group">Gỡ lời mời</div>
                                                                                <div class="go_loi_moi_one gui_loi_nhac_group">Gửi lời nhắc</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                            <?php if ($cout_show_all2 > 3) {?>
                                                <div class="thanh_vien_block3_show_all active_text cusor click_show_all_friend">Xem tất cả</div>
                                            <?php }?>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        
                            <!-- File phương tiện -->
                            <div class="file_imgvideo ok_file_imgvideo hide_chung">
                                <div class="file_imgvideo_padding">
                                    <h2 class="file_imgvideo_title">File phương tiện</h2>
                                    <div class="file_imgvideo_head">
                                        <div class="file_imgvideo_head_nav cusor active_text border_bt_blue" onclick="c_img_vid('.file_div_chung','.file_div_anh','.file_imgvideo_head_nav',this)">Ảnh</div>
                                        <div class="file_imgvideo_head_nav cusor" onclick="c_img_vid('.file_div_chung','.file_div_video','.file_imgvideo_head_nav',this)">Video</div>
                                    </div>

                                    <div class="file_imgvideo_main">
                                        <!-- Ảnh -->
                                        <div class="file_div_chung file_div_anh">
                                            <div class="file_imgvideo_main_img">
                                                
                                                <?php if(mysql_num_rows($db_file_img->result) > 0){?>
                                                    <?php foreach ($array_image as $key => $value) {?>
                                                        <div class="file_imgvideo_main_img_sub">
                                                            <img src="<?=$value?>" alt="">
                                                        </div>  
                                                    <?php }?>
                                                <?php }?>
                                            </div>
                                        </div>

                                        <!-- Video -->
                                        <div class="file_div_chung file_div_video">
                                            <div class="file_imgvideo_main_img div_video">
                                                <?php if(mysql_num_rows($db_file_img->result) > 0){?>
                                                    <?php foreach ($array_video as $key => $value) {?>
                                                        <video class="file_imgvideo_main_img_sub" controls>
                                                            <source src="<?=$value?>" alt="">
                                                        </video>
                                                    <?php }?>
                                                <?php }?>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        

                            <!-- File Riêng -->
                            <div class="file_rieng ok_file_rieng hide_chung">
                                <div class="file_rieng_padding">
                                    <div class="file_rieng_head">
                                        <div class="file_rieng_head_one">File</div>
                                        <div class="file_rieng_head_two">
                                            <div class="file_rieng_head_two_input">
                                                <input type="text" placeholder="Tìm kiếm bài viết" name="search_file">

                                                <div class="search_con click_file">
                                                    <img src="../img/image_new/search_24.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="file_rieng_head_two_text cusor click_input">Tải file lên</div>
                                            <input type="file" class="input_dc_click" hidden multiple>
                                        </div>
                                    </div>
                                    <div class="file_rieng_main">
                                        <div class="file_rieng_main_one">
                                            <div class="file_rieng_main_one_name file_rieng_main_one_chung">Tên file</div>
                                            <div class="file_rieng_main_one_loai file_rieng_main_one_chung">Loại</div>
                                            <div class="file_rieng_main_one_tacgia file_rieng_main_one_chung">Tác giả</div>
                                        </div>
                                        <div class="file_rieng_main_two">
                                            <?php while ($show_file = mysql_fetch_assoc($db_file->result)) {
                                                $arr_file = $show_file['file'];
                                                $arr_file_name = $show_file['name_file'];

                                                $arr_file = explode('||', $arr_file);
                                                $arr_file_name = explode('||', $arr_file_name);
                                                ?>
                                                <?php foreach ($arr_file as $key => $value) {
                                                    $explode_extension = explode('.', $value);
                                                    $count_extension = count($explode_extension) - 1;
                                                    $extension = $explode_extension[$count_extension];
                                                    $name_file = $arr_file_name[$key];
                                                    ?>
                                                    <div class="file_rieng_main_two_sub">
                                                        <div class="file_rieng_main_two1 file_rieng_main_two_chung">
                                                            <div class="file_rieng_main_two1_img">
                                                                <?php if($extension == 'doc' || $extension == 'docx'){?>
                                                                    <img src="../img/image_new/word.svg" alt="">
                                                                <?php }else if($extension == 'xlsx' || $extension == 'xlsm' || $extension == 'xlsb' || $extension == 'xls'){?>
                                                                    <img src="../img/image_new/excel.svg" alt="">
                                                                <?php }else{?>
                                                                    <img src="../img/icon_download.svg" alt="">
                                                                <?php }?>
                                                            </div>
                                                            <div class="file_rieng_main_two1_text elipsis1"><?=$name_file?></div>
                                                        </div>
                                                        <div class="file_rieng_main_two2 file_rieng_main_two_chung">Tài liệu</div>
                                                        <div class="file_rieng_main_two3 file_rieng_main_two_chung">
                                                            <div class="file_rieng_main_two3_one"><?=$arr_ep[$show_file['author']]['ep_name']?></div>
                                                            <div class="file_rieng_main_two3_two">
                                                                <?=date('H:s d, \t\h\á\n\g m, Y',$show_file['created_at']);?>
                                                            </div>
                                                        </div>
                                                        <div class="file_rieng_main_two4 file_rieng_main_two_chung click_show_download" onclick="click_show_download(this)">
                                                            <img src="../img/image_new/3cham_moi_ok.svg" alt="">

                                                            <div class="file_rieng_main_two4_con">
                                                                <div class="file_rieng_main_two4_con_padding">
                                                                    <a download href="<?=$value?>">
                                                                        <div class="file_rieng_main_two4_con1 cusor">Tải xuống</div>
                                                                    </a>
                                                                    <div class="file_rieng_main_two4_con1 cusor">Xem bài viết</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }else{?>
                            <?php if ($group['group_mode'] != 1) {?>
                                <!-- Thảo luận -->
                                <div class="pg_main_content_left ok_thao_luan hide_chung">
                                    <?php foreach ($lst_posts as $key => $row) { ?>
                                        <div class="main_content_left_posts">
                                            <div class="main_content_left_posts_pd">
                                                <?php include '../includes/index_employee/post.php'; ?>
                                                <div class="hide_posts"></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php }else{?>
                                <!-- Nhóm riêng tư -->
                                <div class="pg_main_content_left ok_thao_luan hide_chung">
                                    <div class="group_riengtu">
                                        <div class="group_riengtu_padding">
                                          <div class="group_riengtu_sub">
                                            <div class="group_riengtu_sub_img"><img src="../img/image_new/ic_group_riengtu.svg" alt=""></div>
                                            <div class="group_riengtu_sub_title">Đây là nhóm riêng tư</div>
                                            <p class="group_riengtu_sub_p">Hãy tham gia nhóm này để xem hoặc cùng thảo luận nhé.</p>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <!-- Layout right -->
                        <div class="pg_main_content_right hide_right">
                            <div class="content_right_box1">
                                <div class="content_right_box1_padding">
                                    <div class="content_right_box1_padding_title border_bottom">Giới thiệu</div>
                                    <div class="content_right_box1_padding-main">
                                        <?php if($group['introduce'] != ""){?>
                                            <div class="content_right_box1-main-text"><?=$group['introduce']?></div>
                                        <?php }else{?>
                                            <div class="content_right_box1-main-text">Đây là Group <?=$group['group_name']?></div>
                                        <?php }?>

                                        <!-- Quyền riêng tư -->
                                        <div class="content_right_box1-main-option">
                                            <div class="content_right_box1-main-option-one">
                                                <?php if($group['group_mode'] != 1){?>
                                                    <div class="content_right_box1-main-option-one-img">
                                                        <img src="../img/image_new/earth2.svg" alt="">
                                                    </div>
                                                    <div class="content_right_box1-main-option-one-text">
                                                        <div class="content_right_box1-main-option-one-text1">Công khai</div>
                                                        <div class="content_right_box1-main-option-one-text2">Bất kỳ ai cũng có thể nhìn thấy mọi người trong nhóm và những gì họ đăng.</div>
                                                    </div>
                                                <?php }else{?>
                                                    <div class="content_right_box1-main-option-one-img">
                                                        <img src="../img/image_new/lock.svg" alt="">
                                                    </div>
                                                    <div class="content_right_box1-main-option-one-text">
                                                        <div class="content_right_box1-main-option-one-text1">Riêng tư</div>
                                                        <div class="content_right_box1-main-option-one-text2">Chỉ thành viên mới nhìn thấy mọi người trong nhóm và những gì họ đăng</div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                        
                                        <!-- Hiển thị -->
                                        <div class="content_right_box1-main-option">
                                            <div class="content_right_box1-main-option-one">
                                                <?php if($group['hide_show'] != 1){?>
                                                    <div class="content_right_box1-main-option-one-img">
                                                        <img src="../img/image_new/eye.svg" alt="">
                                                    </div>
                                                    <div class="content_right_box1-main-option-one-text">
                                                        <div class="content_right_box1-main-option-one-text1">Hiển thị</div>
                                                        <div class="content_right_box1-main-option-one-text2">Ai cũng có thể tìm nhóm này.</div>
                                                    </div>
                                                <?php }else{?>
                                                    <div class="content_right_box1-main-option-one-img">
                                                        <img src="../img/image_new/an.svg" alt="">
                                                    </div>
                                                    <div class="content_right_box1-main-option-one-text">
                                                        <div class="content_right_box1-main-option-one-text1">Đã ẩn</div>
                                                        <div class="content_right_box1-main-option-one-text2">Chỉ thành viên mới tìm nhóm này.</div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                        
                                        
                                        <!-- Địa chỉ -->
                                        <?php if($group['group_location'] != ""){?>
                                            <div class="content_right_box1-main-option">
                                                <div class="content_right_box1-main-option-one">
                                                    <div class="content_right_box1-main-option-one-img">
                                                        <img src="../img/image_new/location.svg" alt="">
                                                    </div>
                                                    <div class="content_right_box1-main-option-one-text">
                                                        <div class="content_right_box1-main-option-one-text1"><?=$group['group_location']?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>

                                        <div class="content_right_box1-main-btn active_text cusor click_timhieuthem">Tìm hiểu thêm</div>

                                    </div>
                                </div>
                            </div>
                            <?php if (($my_id == $group['id_manager'] && ($my_type%2) == ($group['manager_type']%2) && $my_id > 0) || array_key_exists(($my_id."-".($my_type%2)), $arr_mem_new)) {?>
                                <div class="content_right_box1">
                                    <div class="content_right_box1_padding">
                                        <div class="content_right_box1_padding_title border_bottom">File phương tiện mới chia sẻ</div>
                                        <div class="content_right_box1_khung">
                                            <div class="content_right_box1_khung_img">
                                                <?php if (mysql_num_rows($file_4->result) > 0) {?>
                                                    <?php foreach ($four_img_video as $key => $value) {?>
                                                        <?php if (preg_match('/image/', $value) == true) {?>
                                                            <img src="<?=$value?>" alt="">
                                                        <?php }else{?>
                                                            <video class="" controls="">
                                                                <source src="<?=$value?>">
                                                            </video>
                                                        <?php }?>
                                                    <?php }?>
                                                <?php }?>
                                            </div>
                                            <div class="content_right_box1_khung_img_btn see_more_media_files active_text cusor" >xem tất cả</div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        <!---------- Click tìm hiểu thêm ----------->
                        <div class="tim_hieu_them">
                            <div class="tim_hieu_them_padding">
                              <div class="tim_hieu_them_head">
                                <div class="tim_hieu_them_head_title border_bottom">Giới thiệu</div>
                                <div class="tim_hieu_them_head_content">
                                    <?php if($group['introduce'] != ""){?>
                                        <div class="content_right_box1-main-text"><?=$group['introduce']?></div>
                                    <?php }else{?>
                                        <div class="content_right_box1-main-text">Đây là Group <?=$group['group_name']?></div>
                                    <?php }?>

                                    <div class="content_right_box1-main-option">
                                        <div class="content_right_box1-main-option-one">
                                            <?php if($group['group_mode'] != 1){?>
                                                <div class="content_right_box1-main-option-one-img">
                                                    <img src="../img/image_new/earth2.svg" alt="">
                                                </div>
                                                <div class="content_right_box1-main-option-one-text">
                                                    <div class="content_right_box1-main-option-one-text1">Công khai</div>
                                                    <div class="content_right_box1-main-option-one-text2">Bất kỳ ai cũng có thể nhìn thấy mọi người trong nhóm và những gì họ đăng.</div>
                                                </div>
                                            <?php }else{?>
                                                <div class="content_right_box1-main-option-one-img">
                                                    <img src="../img/image_new/lock.svg" alt="">
                                                </div>
                                                <div class="content_right_box1-main-option-one-text">
                                                    <div class="content_right_box1-main-option-one-text1">Riêng tư</div>
                                                    <div class="content_right_box1-main-option-one-text2">Chỉ thành viên mới nhìn thấy mọi người trong nhóm và những gì họ đăng</div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="content_right_box1-main-option">
                                        <div class="content_right_box1-main-option-one">
                                            <?php if($group['hide_show'] != 1){?>
                                                <div class="content_right_box1-main-option-one-img">
                                                    <img src="../img/image_new/eye.svg" alt="">
                                                </div>
                                                <div class="content_right_box1-main-option-one-text">
                                                    <div class="content_right_box1-main-option-one-text1">Hiển thị</div>
                                                    <div class="content_right_box1-main-option-one-text2">Ai cũng có thể tìm nhóm này.</div>
                                                </div>
                                            <?php }else{?>
                                                <div class="content_right_box1-main-option-one-img">
                                                    <img src="../img/image_new/an.svg" alt="">
                                                </div>
                                                <div class="content_right_box1-main-option-one-text">
                                                    <div class="content_right_box1-main-option-one-text1">Đã ẩn</div>
                                                    <div class="content_right_box1-main-option-one-text2">Chỉ thành viên mới tìm nhóm này.</div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <?php if($group['group_location'] != ""){?>
                                        <div class="content_right_box1-main-option">
                                            <div class="content_right_box1-main-option-one">
                                                <div class="content_right_box1-main-option-one-img">
                                                    <img src="../img/image_new/location.svg" alt="">
                                                </div>
                                                <div class="content_right_box1-main-option-one-text">
                                                    <div class="content_right_box1-main-option-one-text1"><?=$group['group_location']?></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                              </div>
                              <div class="tim_hieu_them_head">
                                <div class="tim_hieu_them_head_title border_bottom">Thành viên . <?=$count_member?></div>
                                <div class="tim_hieu_them_main_block1">
                                    <div class="tim_hieu_them_main_block1_one">
                                        <div class="tim_hieu_them_main_block1_one_menber">
                                            <?php $count = 0;
                                            foreach ($arr_mem_new as $key => $value) {
                                                $count++;?>
                                                <div class="tim_hieu_them_main_block1_one_menber_img">
                                                    <img src="<?=($value['user_type']==1&&$arr_in4[1][$value['user_id']]['com_logo']!="")?"https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$value['user_id']]['com_logo']:
                                                    (($value['user_type']!=1&&$arr_ep[$value['user_id']]['ep_image']!="")?"https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$value['user_id']]['ep_image']:"/img/avatar_default.png")?>"
                                                    onerror="this.onerror=null;this.src='/img/avatar_default.png';" alt="" title="<?=($value['user_type']==1)?$arr_in4[1][$value['user_id']]['com_name']:$arr_ep[$value['user_id']]['ep_name']?>">
                                                </div>
                                            <?php if ($count >= 10){ ?>
                                                <div class="tim_hieu_them_main_block1_one_menber_img">
                                                    +<?=count($arr_mem_new) - $count?>
                                                </div>
                                            <?php break; } }?>
                                        </div>
                                        <div class="tim_hieu_them_main_block1_one_text"><?=($group['manager_type']==1)?$arr_in4[1][$group['id_manager']]['com_name']:$arr_ep[$group['id_manager']]['ep_name']?>
                                        <?=($count_member > 1)?"và ".($count_member - 1)." người khác ":""?> đã tham gia nhóm</div>
                                    </div>
                                    <div class="tim_hieu_them_main_block1_one">
                                        <div class="tim_hieu_them_main_block1_one_menber">
                                            <?php $count = 0;
                                            foreach ($administrators_censor as $key => $value) {
                                                $count++;?>
                                                <div class="tim_hieu_them_main_block1_one_menber_img">
                                                    <img src="<?=($value['user_type']==1&&$arr_in4[1][$value['user_id']]['com_logo']!="")?"https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$value['user_id']]['com_logo']:
                                                    (($value['user_type']!=1&&$arr_ep[$value['user_id']]['ep_image']!="")?"https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$value['user_id']]['ep_image']:"/img/avatar_default.png")?>"
                                                    onerror="this.onerror=null;this.src='/img/avatar_default.png';" alt="" title="<?=($value['user_type']==1)?$arr_in4[1][$value['user_id']]['com_name']:$arr_ep[$value['user_id']]['ep_name']?>">
                                                </div>
                                            <?php if ($count >= 10){ ?>
                                                <div class="tim_hieu_them_main_block1_one_menber_img">
                                                    +<?=count($arr_mem_new) - $count?>
                                                </div>
                                            <?php break; } }?>
                                        </div>
                                        <?php if (count($arr_administrators) > 0){ ?>
                                        <div class="tim_hieu_them_main_block1_one_text">
                                            <?=($arr_administrators[0]['user_type']==1)?$arr_in4[1][$arr_administrators[0]['user_id']]['com_name']:$arr_ep[$arr_administrators[0]['user_id']]['ep_name']?>
                                            <?php 
                                                $count_admin = count($arr_administrators); 
                                                $count_admin_khac = $count_admin - 2;
                                                if ($count_admin > 1) {
                                                    echo ", " . $arr_ep[$arr_administrators[1]['user_id']]['ep_name'];
                                                }
                                                if ($count_admin > 2) {
                                                    echo " và " . $count_admin_khac . " người khác";
                                                }
                                            ?>
                                            là quản trị viên. 
                                            <?php if (count($arr_censor) > 0) {
                                                $cout_kd = count($arr_censor);
                                                $cout_kd_khac = $cout_kd - 1;
                                                if ($cout_kd > 1) {
                                                    echo $arr_ep[$arr_censor[0]['user_id']]['ep_name']. " và ". $cout_kd_khac ." người khác là người kiểm duyệt";
                                                }else{
                                                    echo $arr_ep[$arr_censor[0]['user_id']]['ep_name'] ." là người kiểm duyệt";
                                                }
                                            } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php if ($my_id > 0 && (array_key_exists($my_id."-".($my_type%2),$arr_mem_new) || ($my_id == $group['id_manager'] && $my_type%2 == $group['manager_type']%2))){ ?>
                                        <div class="tim_hieu_them_main_block1_two cusor active_text">Xem tất cả</div>
                                    <?php } ?>
                                </div>
                              </div>
                              <div class="tim_hieu_them_head">
                                <div class="tim_hieu_them_head_title border_bottom">Hoạt động</div>
                                <div class="tim_hieu_them_main_block2">
                                  <div class="tim_hieu_them_main_block2_one">
                                    <div class="tim_hieu_them_main_block2_one_ic"><img src="../img/image_new/posts_today.svg" alt=""></div>
                                    <div class="tim_hieu_them_main_block2_one_text">Hôm nay có <?=$newfeed_day?> bài viết mới</div>
                                  </div>
                                  <div class="tim_hieu_them_main_block2_one">
                                    <div class="tim_hieu_them_main_block2_one_ic"><img src="../img/image_new/all_member.svg" alt=""></div>
                                    <div class="tim_hieu_them_main_block2_one_text">Tổng cộng <?=$count_member?> thành viên</div>
                                  </div>
                                  <div class="tim_hieu_them_main_block2_one">
                                    <div class="tim_hieu_them_main_block2_one_ic"><img src="../img/image_new/date_created.svg" alt=""></div>
                                    <div class="tim_hieu_them_main_block2_one_text">Ngày tạo: <?=time_elapsed_string($group['created_at'])?></div>
                                  </div>
                                </div>
                              </div>
                              <!-- Quy tắc nhóm -->
                              <?php if (mysql_num_rows($db_rule->result) > 0) {?>
                                  <div class="tim_hieu_them_head">
                                    <div class="tim_hieu_them_head_title border_bottom">Quy tắc nhóm của quản trị viên </div>
                                    <div class="tim_hieu_them_main_block3">
                                        <?$rule_num = 1;
                                            while ($rule_show = mysql_fetch_assoc($db_rule->result)) { 
                                        ?>
                                          <div class="tim_hieu_them_main_block3_one">
                                            <div class="tim_hieu_them_main_block3_one_title"><?=$rule_num++; ?><span class="fig_mrr"><?=$rule_show['title_rule']?></span></div>
                                            <p class="tim_hieu_them_main_block3_one_p"><?=$rule_show['describe_rule']?>.</p>
                                          </div>
                                      <?php }?>

                                    </div>
                                  </div>
                              <?php }?>
                            </div>
                        </div>


                    </div>
                    

                </div>
            </div>

        </div>
    </div>

    <!-- POPUP GHIM TIN -->
    <div class="pp_gimtin ghim_tin pp_hidden">
        <div class="pp_gimtin_padding">
            <div class="pp_gimtin_img"><img src="../img/image_new/tich_green.svg" alt=""></div>
            <div class="pp_gimtin_text"></div>
            <div class="pp_gimtin_btn hide_ghim_nhom">Đóng</div>
        </div>
    </div>

    <!-- POPUP BỎ THEO GIÕI NHÓM -->
    <div class="pp_gimtin un_folow pp_hidden">
        <div class="pp_gimtin_padding">
            <div class="pp_gimtin_img"><img src="../img/image_new/tich_green.svg" alt=""></div>
            <div class="pp_gimtin_text">Bạn đã bỏ theo dõi nhóm ABC</div>
            <div class="pp_gimtin_btn hide_botheogioi">Đóng</div>
        </div>
    </div>

<?php
    include '../includes/ep_group_public/invite_friend.php';
    include '../includes/ep_group_public/setting_notify.php';
    include '../includes/ep_group_public/stop_group.php';
    include '../includes/ep_group_public/bao_cao_qtv.php';
    include '../includes/ep_group_public/popup_go_bai_viet.php';

    include '../includes/index_employee/share_up_group.php';

    include '../includes/ep_group/share_up_invidual.php';

    include '../includes/index_employee/send_with_chat.php';
    
    include '../includes/ep_group/create_gr.php';
    include '../includes/index_employee/who_comment.php';
    include '../includes/index_employee/delete_post.php';
    include '../includes/index_employee/popup_turn_on_notify.php';

    include '../includes/index_employee/popup_success.php';

    include '../includes/index_employee/save_post.php';
    include '../includes/popup_index_ep.php';
    include '../includes/popup_private_group.php';
    include '../includes/ep_group/custom_notify.php';
    include '../includes/group/post_calendar.php';
    include '../includes/ep_group/ghim_group.php';
    include '../includes/ep_group/following.php';
    include '../includes/ep_group/exit_group.php';
    include '../includes/ep_group/popup_error.php';
    include '../includes/index_employee/popup_success.php';

    include '../includes/index_employee/popup_sup_news.php';
    include '../includes/ep_detail_new_24h/popup_setting.php';


?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js?v=<?= $version ?>" defer></script>
<script src="../js/ep_group.js?v=<?= $version ?>" defer></script>
<script src="../js/ep_group_public.js?v=<?= $version ?>" defer></script>
<script src="../js/ep_index.js?v=<?= $version ?>" defer></script>


<script>
    $("#bg_trangchu").addClass("active_background");
    $("#ic_trangchu").addClass("colof_icon")
    $("#text_trangchu").addClass("active_text");

    $(".select_option").select2({
        width: "100%",
    });
            
    function click_option(a,b,c,d) {
        $(a).hide();
        $(b).show();
        $(c).removeClass("active_text");
        $(c).removeClass("border_bt_blue");

        $(d).addClass("active_text");
        $(d).addClass("border_bt_blue");
    }

    

    // CLICK XEM THÊM NỘI DUNG BÀI VIẾT
    $('.xem_them_noidung').click(function() {
        $(this).parents(".left_posts_block2").find(".left_posts_block2_text").toggleClass("elipsis4")
    })
    $(".pg_main_head_option_1024_ic").click(function(){
        $(this).parents(".pg_main_head_option").hide();
    })


    $(".pg_main_head_member_sub_2").click(function(){
        $(".pg_main_head_option").show();
    });



    $(".click_show_sidebar").click(function(){
        $("#pg_sidebar").show();
    });

    $(".them_div_711_2_ic").click(function(){
        $("#pg_sidebar").hide();
    });
    
</script>

</html>
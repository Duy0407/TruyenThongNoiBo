<?php
require_once '../config/config.php';
require_once "../functions/city.php";

$type_edit = getValue('type','int','GET',1);
$content = getValue('content','int','GET',1);
$album = getValue('album','int','GET',0);

// check_user_empoyee(); // hình như là do dòng này khiến tk công ty không vào đk page này -> đúng rồi
$v_1 = getValue('v','int','GET','');

// thông tin tài khoản cá nhân - trang cá nhân
$ep_id = 0;
$ep_type = 0;
$ep_avt = "/img/logo_com.png";
$ep_id_chat = 0;
$ep_bgi = "../img/nv_default_bgi.svg";
$arr_bgi = [];
$is_friend = 0;

$ep_id = getValue('ep_id','int','GET',$my_id);
if ($my_id > 0 && $ep_id == $my_id){
    // có đăng nhập & is my wall
    $type_edit = 0;
    $ep_avt = $my_avt;
    $ep_type = $my_type;
    $ep_id_chat = $my_id_chat;
    // mảng bạn bè
    $ep_friend = $my_friend;
    // ds người theo dõi
    $follower = $my_follower;
    $following = $my_following;
    // ảnh bìa
    $sql = "SELECT * FROM `ttnb_cover_image_user` WHERE user_id = $ep_id";
    $db_bgi = new db_query($sql);
    while ($row = mysql_fetch_array($db_bgi->result)) {
        if ($row['is_using'] == 1){
            $ep_bgi = $row['cover_image'];
        }else{
            $arr_bgi[] = $row;
        }
    }
    // mảng bài đăng
    $sql = "SELECT new_feed.*, 
    (CASE WHEN EXISTS (SELECT id FROM `new_notify_on` WHERE new_notify_on.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS notify_on,
    (CASE WHEN EXISTS (SELECT id_save FROM `save_post` JOIN add_collection ON save_post.id_collection = add_collection.id_collection WHERE id_posts = new_id AND id_user = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS saved
    FROM `new_feed` 
    WHERE `delete` = 0 AND approve = 0 AND show_time <= ".time()." AND FIND_IN_SET($my_id,hide_post) <= 0 AND (type = 2 OR (type = 0 AND position = 0)) AND 
        NOT EXISTS (SELECT id FROM new_hide_post WHERE new_hide_post.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") AND 
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
    ORDER BY updated_at DESC LIMIT ".$limit_post;
}elseif ($my_id > 0){
    // có đăng nhập & not my wall
    $type_edit = 1;
    // mảng chặn, unfollow
    $sql = "SELECT user_id,user_type,friend_id,friend_type,block_type FROM `unfollow` WHERE user_id = ".$ep_id." AND user_type = 2";
    $db_block = new db_query($sql);
    $arr_ep_block = [];
    $arr_ep_unfollow = [];
    while ($row = mysql_fetch_array($db_block->result)){
        if ($row['block_type'] == 1){
            $arr_ep_block[] = $row['friend_id'];
        }else{
            $arr_ep_unfollow[] = $row['friend_id'];
        }
    }
    // mảng bạn bè
    $list_friends = list_friends_2($ep_id);
    $ep_friend = $list_friends['listAccount'];
    $ep_friend_com = [];
    $ep_friend_emp = [];
    $arr_friend = [];
    $is_friend = 0;
    foreach ($ep_friend as $key => $value) {
        if ($value['id365']==0){
            unset($ep_friend[$key]);
        }elseif ($value['id365'] == $ep_id && ($value['type365'] == 0 || $value['type365'] == 2)){
            $ep_id_chat = $value['id'];
            $ep_type = $value['type365'];
            unset($ep_friend[$key]);
        }else{
            // check is friend
            if ($value['type365'] == $my_type && $value['id365'] == $my_id){
                $is_friend = 1;
            }
            if ($value['type365'] == 2 || $value['type365'] == 0){
                $ep_friend_emp[] = $value["id365"];
            }elseif ($value['type365'] == 1){
                $ep_friend_com[] = $value["id365"];
            }
        }
    }
    // ds người theo dõi
    $follow = list_follow($ep_id_chat);
    $follower = [];
    foreach ($follow['follower'] as $key => $value) {
        if ($value['id365'] > 0){
            $follower[] = $value;
        }
    }
    $following = [];
    foreach ($follow['following'] as $key => $value) {
        if ($value['id365'] > 0){
            $following[] = $value;
        }
    }
    // ảnh bìa
    $sql = "SELECT * FROM `ttnb_cover_image_user` WHERE user_id = $ep_id AND is_using = 1";
    $db_bgi = new db_query($sql);
    if (mysql_num_rows($db_bgi->result) > 0){
        $ep_bgi = mysql_fetch_array($db_bgi->result)['cover_image'];
    }
    // mảng bài đăng
    $sql = "SELECT new_feed.*,
    (CASE WHEN EXISTS (SELECT id FROM `new_notify_on` WHERE new_notify_on.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS notify_on, 
        (CASE WHEN EXISTS (SELECT id_save FROM `save_post` JOIN add_collection ON save_post.id_collection = add_collection.id_collection WHERE id_posts = new_id AND id_user = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS saved
        FROM `new_feed` 
        WHERE `delete` = 0 AND approve = 0 AND show_time <= ".time()." AND FIND_IN_SET($my_id,hide_post) <= 0 AND (type = 2 OR (type = 0 AND position = 0)) AND 
        NOT EXISTS (SELECT id FROM new_hide_post WHERE new_hide_post.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") AND 
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
        ORDER BY new_id DESC LIMIT ".$limit_post;
}elseif ($ep_id > 0){
    // ko đăng nhập & is a wall
    $type_edit = 1;
    // mảng chặn, unfollow
    $sql = "SELECT user_id,user_type,friend_id,friend_type,block_type FROM `unfollow` WHERE user_id = ".$ep_id." OR user_type = 2";
    $db_block = new db_query($sql);
    $arr_ep_block = [];
    $arr_ep_unfollow = [];
    while ($row = mysql_fetch_array($db_block->result)){
        if ($row['block_type'] == 1){
            $arr_ep_block[] = $row['friend_id'];
        }else{
            $arr_ep_unfollow[] = $row['friend_id'];
        }
    }
    // mảng bạn bè
    // $ep_friend = list_friends($ep_id,2);
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
    // ds người theo dõi
    $follow = list_follow($ep_id_chat);
    $follower = [];
    foreach ($follow['follower'] as $key => $value) {
        if ($value['id365'] > 0){
            $follower[] = $value;
        }
    }
    $following = [];
    foreach ($follow['following'] as $key => $value) {
        if ($value['id365'] > 0){
            $following[] = $value;
        }
    }
    // ảnh bìa
    $sql = "SELECT * FROM `ttnb_cover_image_user` WHERE user_id = $ep_id AND is_using = 1";
    $db_bgi = new db_query($sql);
    if (mysql_num_rows($db_bgi->result) > 0){
        $ep_bgi = mysql_fetch_array($db_bgi->result)['cover_image'];
    }
    // mảng bài đăng
    $sql = "SELECT new_feed.*, 0 AS notify_on, 0 AS saved
    FROM `new_feed` 
    WHERE `delete` = 0 AND approve = 0 AND show_time <= ".time()." AND 
    (type = 2 OR (type = 0 AND position = 0)) AND 
        NOT EXISTS (SELECT id FROM new_hide_post WHERE new_hide_post.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") AND 
        ((author = $ep_id AND type = 0 AND position = 0) OR 
        position = $ep_id OR 
        EXISTS (SELECT * FROM new_tags WHERE new_tags.nt_new_id = new_id AND new_tags.nt_user_id = $ep_id AND new_tags.nt_user_type = $ep_type)) AND 
    view_mode = 0
    GROUP BY new_feed.new_id 
    ORDER BY new_id DESC LIMIT ".$limit_post;
}else{
    // ko đăng nhập & ko có ep_id => not a wall
    session_destroy();
    header('Location: /');
    exit;
} 

$arr_in4[2] = $arr_ep;
$arr_in4[1] = [];
$list_news = render_list_news($sql, $arr_in4, $ep_id);
$arr_post = $list_news[0];
$arr_in4 = $list_news[1];
$arr_img = [];
$arr_video = []; 
foreach ($arr_post as $k => $row) {
    // mảng ảnh, mảng video
    if ($row['author'] == $ep_id && $row['file'] != "" && preg_match('/image/', $row['file']) == true || preg_match('/video/', $row['file']) == true){
        $file = explode("||", $row['file']);
        for ($i=0; $i < count($file); $i++) { 
            if (preg_match('/image/', $file[$i]) == true) {
                $arr_img[] = [
                    'new_id' => $row['new_id'],
                    'img' => $file[$i],
                ];
            }elseif (preg_match('/video/', $file[$i]) == true) {
                $arr_video[] = [
                    'new_id' => $row['new_id'],
                    'video' => $file[$i],
                ];
            }
        }
    } 
}

// ảnh đại diện
if ($arr_in4[2][$ep_id]['ep_image']!=''){
    $ep_avt = "https://chamcong.24hpay.vn/upload/employee/".$arr_in4[2][$ep_id]['ep_image'];
}
// thông tin tài khoản
$sql = "SELECT * FROM `ttnb_infor_user` WHERE user_id = $ep_id AND user_type = $ep_type";
$db_infor = new db_query($sql);
$db_infor = mysql_fetch_array($db_infor->result);
// chế độ xem thông tin tài khoản
$arr_infor_view_mode = [];
if ($db_infor){
    $sql = "SELECT * FROM `infor_user_view_mode` WHERE infor_user_id = ".$db_infor['id']." AND user_id = $my_id AND user_type = $my_type";
    $db_infor_view_mode = new db_query($sql);
    while ($row = mysql_fetch_array($db_infor_view_mode->result)){
        $arr_infor_view_mode[] = $row['infor_user_type'];
    }
}
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="/css/cropper/cropper.css">
    <link rel="stylesheet" href="/css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/popup_index_ep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/ep_detail_new_24h.css?v=<?=$version?>">
    <link rel="stylesheet" href="/css/story.css?v=<?=$version?>">
    <link rel="stylesheet" href="/css/index_employee.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/new_feed.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/ep_group_public.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/core.css?v=<?=$version?>">
    <link rel="stylesheet" href="/css/ep_individual.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/index_employee_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/ep_individual_new.css?v=<?= $version ?>">
    <title>Trang cá nhân</title>
    <style>
    <?php if ($v_1==1) {
        ?>.group_public_post {
            display: none;
        }

        .archives_news {
            display: block;
        }

        <?php
    }

    ?>
    </style>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper">
            <div id="cdnhanvienc" class="cdnhanvienc">
                <div class="ep_individual_regime">
                    <p class="ep_individual_regime_title">Nội dung này trên trang cá nhân của bạn đang ở chế độ:</p>
                    <button class="ep_individual_regime_btn">
                        <img src="/img/cong-khai-2.svg" alt="Ảnh lỗi">
                        <span class="ep_individual_regime_span">Công khai</span>
                        <img src="/img/dropdown.svg" alt="Ảnh lỗi">
                    </button>
                    <button class="ep_individual_regime_turnoff">Tắt</button>
                </div>
                <?php include '../includes/cd_header_new.php'; ?>
                <div id="center">
                    <div class="center_avt">
                        <div class="center_avt_header">
                            <!-- <img class="show_sidebar_right" src="/img/show_sidebar_right.svg" alt="Ảnh lỗi"> -->
                            <img class="center_cover_img" src="<?=$ep_bgi?>" alt="Ảnh lỗi">
                            <?php if ($type_edit == 0) { ?>
                            <button class="center_cover_upload_btn">
                                <img class="center_cover_upload_img" src="/img/nv_camera.svg" alt="Ảnh lỗi">
                                <span class="center_cover_upload_btn_txt">
                                    Chỉnh sửa ảnh bìa
                                </span>
                            </button>
                            <?php } ?>
                        </div>
                        <div class="center_avt_footer">
                            <div class="center_avt_info">
                                <img class="center_avt_footer_img" src="<?=$ep_avt?>" data-ep_id=<?=$ep_id?> data-ep_type=<?=$ep_type?> alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                                <?php if ($type_edit == 0) { ?>
                                <button class="center_upload_avt_icon">
                                    <img src="/img/nv_camera.svg" alt="Ảnh lỗi">
                                </button>
                                <?php } ?>
                            </div>
                            <div class="center_avt_info_detail">
                                <p class="center_avt_name"><?=$arr_ep[$ep_id]['ep_name']?></p>
                                <?php if (count($follower) > 0){ ?>
                                <p class="center_avt_count_mem"><?=count($follower)?> người theo dõi</p>
                                <div class="center_avt_6_follewer">
                                <?php foreach ($follower as $key => $value) { ?>
                                    <div class="center_avt_follewer" title="<?=$value['contactName']?>">
                                        <img src="<?=$value['contactAvatar']?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                                    </div>
                                <?php if ($key >= 5) break; } ?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php if (isset($_SESSION['login'])) { ?>
                            <div class="center_avt_btn">
                                <?php if ($type_edit == 0) { ?>
                                <a class="center_avt_btn_add_story" href="/tao-tin-24h.html">
                                    <img class="center_avt_btn_join" src="/img/nv_add-circle.svg" alt="Ảnh lỗi"> Thêm vào tin
                                </a>
                                <button class="center_avt_join2">
                                    <img class="center_avt_btn_join" src="/img/nv_chinh-sua-trang-ca-nhan.svg" alt="Ảnh lỗi"> Chỉnh sửa trang cá nhân
                                </button>
                                <?php }else if ($type_edit == 1) {
                                    if (in_array($ep_id,$accepted_invite_id)){ ?>
                                        <button class="btn_fr">
                                            <img class="btn_add_fr_icon" src="/img/ban-be2.svg" alt="Ảnh lỗi">Bạn bè
                                        </button>
                                        <div class="popup_btn_fr">
                                            <div class="popup_btn_fr_detail">
                                                <img src="/img/ban-be2.svg" alt="Ảnh lỗi">
                                                <p class="popup_btn_title popup_btn_title1">Bạn bè</p>
                                            </div>
                                            <div class="popup_btn_fr_detail popup_btn_fr_unflow" onclick="unfollow(<?=$ep_id?>,<?=$ep_type?>)">
                                                <img src="/img/bo-theo-doi3.svg" alt="Ảnh lỗi">
                                                <?php if (in_array($ep_id,$arr_my_unfollow)){ ?>
                                                    <p class="popup_btn_title">Theo dõi </p>
                                                <?php }else{ ?>
                                                    <p class="popup_btn_title">Bỏ theo dõi</p>
                                                <?php } ?>
                                            </div>
                                            <div class="popup_btn_fr_detail popup_btn_cancel_fr" data-id_chat="<?=$ep_id_chat?>">
                                                <img src="/img/huy-ket-ban.svg" alt="Ảnh lỗi">
                                                <p class="popup_btn_title">Hủy kết bạn</p>
                                            </div>
                                        </div>
                                    <?php }elseif (in_array($ep_id,$my_follower_id)){ ?>
                                        <button class="btn_fr">
                                            <img class="btn_add_fr_icon" src="/img/ban-be2.svg" alt="Ảnh lỗi"> Phản hồi
                                        </button>
                                        <div class="popup_btn_fr">
                                            <div class="popup_btn_fr_detail">
                                                <img src="/img/ban-be2.svg" alt="Ảnh lỗi">
                                                <p class="popup_btn_title popup_btn_title1">Phản hồi</p>
                                            </div>
                                            <div class="popup_btn_fr_detail" onclick="acceptInvite(<?=$ep_id_chat?>,<?=$ep_id?>,<?=$ep_type?>)">
                                                <p class="popup_btn_title">Xác nhận</p>
                                            </div>
                                            <div class="popup_btn_fr_detail" onclick="denyInvite(<?=$ep_id_chat?>,<?=$ep_id?>,<?=$ep_type?>)">
                                                <p class="popup_btn_title">Xóa lời mời</p>
                                            </div>
                                        </div>
                                    <?php }elseif (in_array($ep_id,$my_following_id)){ ?>
                                        <button class="btn_fr" onclick="deleteInvite(<?=$ep_id_chat?>,<?=$ep_id?>,<?=$ep_type?>)">
                                            <img class="btn_add_fr_icon" src="/img/huy-loi-moi.svg" alt="Ảnh lỗi"> Hủy lời mời
                                        </button>
                                    <?php }else{ ?>
                                        <button class="btn_add_fr" onclick="addFriend(<?=$ep_id_chat?>,<?=$ep_id?>,<?=$ep_type?>)">
                                            <img class="btn_add_fr_icon" src="/img/them-ban-be.svg" alt="Ảnh lỗi">Thêm bạn bè
                                        </button>
                                    <?php } ?>
                                    <a target="_blank" href="<?=linkConversation($my_id_chat,$ep_id_chat)?>" class="btn_invidual_mess">
                                        <img class="btn_invidual_mess_icon" src="/img/nhan-tin2.svg" alt="Ảnh lỗi"> Nhắn tin
                                    </a>
                                <?php } ?>
                                <div class="popup_avt_btn">
                                    <div class="popup_avt_btn_detail popup_avt_btn_event_join">
                                        <img class="center_avt_btn_join" src="/img/center_avt_btn_join.svg"
                                            alt="Ảnh lỗi"> Đã tham gia <img class="center_avt_dropdown"
                                            src="/img/ls_dropdown(1).svg" alt="Ảnh lỗi">
                                    </div>
                                    <div class="popup_avt_btn_detail popup_avt_setting_notify">
                                        <img class="center_avt_btn_join" src="/img/center_avt_notify.svg"
                                            alt="Ảnh lỗi"> Cài đặt thông báo
                                    </div>
                                    <div class="popup_avt_btn_detail popup_avt_unflow">
                                        <img class="center_avt_btn_join" src="/img/center_avt_unflow.svg"
                                            alt="Ảnh lỗi"> Bỏ theo dõi nhóm
                                    </div>
                                    <div class="popup_avt_btn_detail popup_avt_exit_gr">
                                        <img class="center_avt_btn_join" src="/img/center_gr_exit.svg" alt="Ảnh lỗi">
                                        Rời khỏi nhóm
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="center_nav_block">
                            <div class="center_nav">
                                <a href="/trang-ca-nhan-e<?=$ep_id?>/post"  class="center_nav_deatail<?=($content==1)?" center_nav_deatail_active":""?>">Bài viết</a>
                                <a href="/trang-ca-nhan-e<?=$ep_id?>/intro" class="center_nav_deatail<?=($content==2)?" center_nav_deatail_active":""?>">Giới thiệu</a>
                                <a href="/trang-ca-nhan-e<?=$ep_id?>/friend"class="center_nav_deatail<?=($content==3)?" center_nav_deatail_active":""?>">Bạn bè</a>
                                <a href="/trang-ca-nhan-e<?=$ep_id?>/image" class="center_nav_deatail<?=($content==4)?" center_nav_deatail_active":""?>">Ảnh</a>
                                <a href="/trang-ca-nhan-e<?=$ep_id?>/video" class="center_nav_deatail<?=($content==5)?" center_nav_deatail_active":""?>">Video</a>
                                <a href="/trang-ca-nhan-e<?=$ep_id?>/group" class="center_nav_deatail<?=($content==6)?" center_nav_deatail_active":""?>">Nhóm</a>
                            </div>
                            <div class="center_nav_de_see_more">
                                <img class="center_group_public_dropdown" src="/img/nv_more.svg" alt="Ảnh lỗi">
                            </div>
                            <div class="center_nav_see_more">
                                <?php if ($type_edit == 0) { ?>
                                <!-- <div class="center_nav_see_more_detail center_nav_regime">
                                    <img class="center_nav_see_more_icon" src="/img/che-do-xem.svg"
                                        alt="content_your.svg">
                                    Chế độ xem
                                </div> -->
                                <div class="center_nav_see_more_detail center_nav_search">
                                    <img class="center_nav_see_more_icon" src="/img/tim-kiem-tren-trang-chu.svg"
                                        alt="content_your.svg">
                                    Tìm kiếm trên trang cá nhân
                                </div>
                                <div class="center_nav_see_more_detail">
                                    <img class="center_nav_see_more_icon" src="/img/kho-luu-tru-tin.svg"
                                        alt="content_your.svg">
                                    Kho lưu trữ tin
                                </div>
                                <div class="center_nav_see_more_detail">
                                    <img class="center_nav_see_more_icon" src="/img/nv_video.svg"
                                        alt="content_your.svg">
                                    Nhật ký hoạt động
                                </div>
                                <div class="center_nav_see_more_detail">
                                    <img class="center_nav_see_more_icon" src="/img/nv_cai-dat-tren-ca-nhan.svg"
                                        alt="content_your.svg">
                                    Cài đặt trang cá nhân
                                </div>
                                <?php }else { ?>
                                <div class="center_nav_see_more_detail center_nav_search">
                                    <img class="center_nav_see_more_icon" src="/img/search_individual.svg"
                                        alt="content_your.svg">
                                    Tìm kiếm trên trang cá nhân
                                </div>
                                <?php if (isset($_SESSION['login'])){ ?>
                                <div class="center_nav_see_more_detail show_popup_block">
                                    <img class="center_nav_see_more_icon" src="/img/block_individual.svg"
                                        alt="content_your.svg">
                                    Chặn
                                </div>
                                <div class="center_nav_see_more_detail ep_post_turnon_sup">
                                    <img class="center_nav_see_more_icon" src="/img/suppost.svg"
                                        alt="content_your.svg">
                                    Tìm hỗ trợ hoặc báo cáo bài viết
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php switch ($content) {
                        case 2: ?>
                            <div class="center_public_body center_public_body_active">
                                <div class="introduce_new_sidebar_right">
                                    <p class="introduce_new_sidebar_right_title">Giới thiệu</p>
                                    <div class="">
                                        <p class="introduce_new_sidebar_right_txt introduce_new_active">Tổng quan</p>
                                        <p class="introduce_new_sidebar_right_txt">Thông tin liên hệ và cơ bản</p>
                                        <p class="introduce_new_sidebar_right_txt">Gia đình và các mối quan hệ</p>
                                        <p class="introduce_new_sidebar_right_txt">Chi tiết về bạn</p>
                                    </div>
                                </div>
                                <div class="center_detail center_content_middle center_content_introduce_new">
                                    <?php
                                    include '../includes/ep_individual/gr_introduce_new.php';
                                    ?>
                                </div>
                            </div>
                        <?php break;
                        case 3: ?>
                            <div class="center_public_body center_public_body_active">
                                <div class="center_public_body_no_sidebar">
                                    <?php
                                    include '../includes/ep_individual/gr_member.php';
                                    ?>
                                </div>
                            </div>
                        <?php break;
                        case 4: ?>
                            <div class="center_public_body center_public_body_active">
                                <div class="center_public_body_no_sidebar">
                                    <?php
                                    include '../includes/ep_individual/gr_album_new.php';
                                    ?>
                                </div>
                            </div>
                        <?php break;
                        case 5: ?>
                            <div class="center_public_body center_public_body_active">
                                <div class="center_public_body_no_sidebar">
                                    <?php
                                    include '../includes/ep_individual/gr_video_new.php';
                                    ?>
                                </div>
                            </div>
                        <?php break;
                        case 6: ?>
                            <div class="center_public_body center_public_body_active">
                                <div class="center_public_body_no_sidebar">
                                    <?php
                                    include '../includes/ep_individual/group.php';
                                    ?>
                                </div>
                            </div>
                        <?php break;
                        default: ?>
                            <div class="center_public_body center_public_body_active">
                                <div class="center_sidebar_right">
                                    <div class="center_introduce">
                                        <div class="center_introduce_header">
                                            Giới thiệu
                                        </div>
                                        <?php $tieu_su = $db_infor['story'];
                                        $view_mode = $db_infor['story_view_mode'];
                                        $except = explode(",",$db_infor['story_except']);
                                        if ((!isset($_SESSION['login']) && $view_mode == 0 && $tieu_su != '') || 
                                            (isset($_SESSION['login']) && $type_edit == 1 && $tieu_su != '' && (
                                                $view_mode == 0 ||
                                                ($view_mode == 2 && $is_friend == 1) || 
                                                ($view_mode == 3 && $is_friend == 1 && !in_array(13,$arr_infor_view_mode)) || 
                                                ($view_mode == 4 && $is_friend == 1 && in_array(13,$arr_infor_view_mode))
                                            )) || 
                                            (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                                        <div class="center_introduce_tieu_su">
                                            <?php if ($tieu_su == '' && $type_edit == 0){ ?>
                                                <button class="center_introduce_new_btn introduce_tieu_su_btn">Thêm tiểu sử</button>
                                            <?php }elseif ((!isset($_SESSION['login']) && $view_mode == 0) || 
                                                (isset($_SESSION['login']) && $type_edit == 1 && (
                                                    ($view_mode == 2 && $is_friend == 1) || 
                                                    ($view_mode == 3 && $is_friend == 1 && !in_array(13,$arr_infor_view_mode)) || 
                                                    ($view_mode == 4 && $is_friend == 1 && in_array(13,$arr_infor_view_mode))
                                                )) || 
                                                (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                                                <p class="tieu_su_txt"><?=$tieu_su?></p>
                                                <?php if ($tieu_su != '' && $type_edit == 0){ ?>
                                                    <button class="center_introduce_new_btn introduce_tieu_su_btn">Chỉnh sửa tiểu sử</button>
                                                <?php } ?>
                                            <?php } ?>
                                            <div class="edit_tieu_su_box hide">
                                                <textarea name="" id="" class="tieu_su_txtarea" placeholder="Nhập tiểu sử"><?=$tieu_su?></textarea>
                                                <p class="tieu_su_rest_char">Còn <span class="tieu_su_rest_char_num">100</span> ký tự</p>
                                                <div class="tieu_su_content_1">
                                                    <p class="tieu_su_label">
                                                        Chế độ
                                                        <span>
                                                            <button class="btn_upload_regime" type="button" data-view_mode=<?=$view_mode?> data-except=<?=implode(",",$except)?>>
                                                                <img class="btn_upload_regime_img" src="<?=$data_view_mode[$view_mode]?>" alt="Ảnh lỗi">
                                                                <?=$data_view_mode_txt[$view_mode]?>
                                                                <img class="ls_dropdown_ep_index" src="../img/ls_dropdown_ep_index.svg" alt="Ảnh lỗi">
                                                            </button>
                                                        </span>
                                                    </p>
                                                    <button class="tieu_su_cancel_btn cancel_btn">Hủy</button>
                                                    <button class="tieu_su_save_btn save_btn">Lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="center_introduce_body">
                                        <?php $sql = "SELECT * FROM `ttnb_work_place` WHERE user_id = $ep_id";
                                        $db_work_place = new db_query($sql);
                                        if (mysql_num_rows($db_work_place->result) > 0) {
                                            while ($row = mysql_fetch_array($db_work_place->result)) {
                                                if (check_view_mode_info(1, $row, $type_edit, $is_friend)) { ?>
                                                    <div class="center_introduce_body_item">
                                                        <img class="center_avt_icon_public" src="/img/briefcase-fill1.svg"
                                                            alt="Ảnh lỗi">
                                                        <div class="">
                                                            <p class="center_avt_regime">Làm việc tại <span><?=$row['company_name']?></span></p>
                                                        </div>
                                                    </div>
                                                <? }
                                            } ?>
                                        <?php }
                                        $sql = "SELECT * FROM `ttnb_school` WHERE user_id = $ep_id";
                                        $db_work_place = new db_query($sql);
                                        if (mysql_num_rows($db_work_place->result) > 0) {
                                            while ($row = mysql_fetch_array($db_work_place->result)) {
                                                if (check_view_mode_info(2, $row, $type_edit, $is_friend)) { ?>
                                                    <div class="center_introduce_body_item">
                                                        <img class="center_avt_icon_public" src="/img/graduation-cap2.svg"
                                                            alt="Ảnh lỗi">
                                                        <div class="">
                                                            <p class="center_avt_regime">Từng học tại <span><?=$row['school_name']?></span></p>
                                                        </div>
                                                    </div>
                                                <? } 
                                            }
                                        }
                                        $view_mode = $db_infor['city_view_mode'];
                                        $except = explode(",",$db_infor['city_except']);
                                        if ((!isset($_SESSION['login']) && $view_mode == 0 && $db_infor['city'] > 0 && array_key_exists($db_infor['city'],$list_city)) || 
                                            (isset($_SESSION['login']) && $type_edit == 1 && $db_infor['city'] > 0 && array_key_exists($db_infor['city'],$list_city) && (
                                                $view_mode == 0 ||
                                                ($view_mode == 2 && $is_friend == 1) || 
                                                ($view_mode == 3 && $is_friend == 1 && !in_array(1,$arr_infor_view_mode)) || 
                                                ($view_mode == 4 && $is_friend == 1 && in_array(1,$arr_infor_view_mode))
                                            )) || 
                                            (isset($_SESSION['login']) && $type_edit == 0 && array_key_exists($db_infor['city'],$list_city))){ ?>
                                            <div class="center_introduce_body_item">
                                                <img class="center_avt_icon_public" src="/img/ion_home.svg" alt="Ảnh lỗi">
                                                <div class="">
                                                    <p class="center_avt_regime">Sống tại <?=$list_city[$db_infor['city']]?></p>
                                                </div>
                                            </div>
                                        <?php }
                                        $view_mode = $db_infor['ht_view_mode'];
                                        $except = explode(",",$db_infor['ht_except']);
                                        if ((!isset($_SESSION['login']) && $view_mode == 0 && $db_infor['home_town'] > 0 && array_key_exists($db_infor['home_town'],$list_city)) || 
                                            (isset($_SESSION['login']) && $type_edit == 1 && $db_infor['home_town'] > 0 && array_key_exists($db_infor['home_town'],$list_city) && (
                                                $view_mode == 0 ||
                                                ($view_mode == 2 && $is_friend == 1) || 
                                                ($view_mode == 3 && $is_friend == 1 && !in_array(2,$arr_infor_view_mode)) || 
                                                ($view_mode == 4 && $is_friend == 1 && in_array(2,$arr_infor_view_mode))
                                            )) || 
                                            (isset($_SESSION['login']) && $type_edit == 0 && array_key_exists($db_infor['home_town'],$list_city))){ ?>
                                            <div class="center_introduce_body_item">
                                                <img class="center_avt_icon_public" src="/img/carbon_location-filled.svg"
                                                    alt="Ảnh lỗi">
                                                <div class="">
                                                    <p class="center_avt_regime">Đến từ <?=$list_city[$db_infor['home_town']]?>, Việt Nam</p>
                                                </div>
                                            </div>
                                        <?php }
                                        if (count($follower) > 0){ ?>
                                            <div class="center_introduce_body_item">
                                                <img class="center_avt_icon_public" src="/img/nv_eye.svg"
                                                    alt="Ảnh lỗi">
                                                <div class="">
                                                    <p class="center_avt_regime">Có <?=count($follower)?> người theo dõi</p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                            <a href="/trang-ca-nhan-e<?=$ep_id?>/intro" class="center_nav_intro">Xem thêm</a>
                                        </div>
                                        <?php $arr_so_thich = json_decode($db_infor['hobby']);
                                        $count_so_thich = count($arr_so_thich);
                                        if ($count_so_thich > 0){ ?>
                                        <div class="center_introduce_so_thich">
                                                <div class="list_so_thich_box">
                                                <?php for ($i=0; $i < $count_so_thich; $i++){ ?>
                                                    <p class="item_so_thich"><?=$arr_so_thich[$i]?></p>
                                                <?php } ?>
                                                </div>
                                            <?php if ($type_edit == 0){ ?>
                                            <button class="center_introduce_new_btn introduce_so_thich_btn">Thêm sở thích</button>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                        <div class="nv_story2">
                                            <?php
                                            for ($i = 0; $i < 10; $i++) {
                                            ?>
                                            <a href="chi-tiet-tin-24h.html" class="">
                                                <div class="v_story_detail">
                                                    <img class="v_story_detail_img"
                                                        src="https://images.unsplash.com/photo-1637822412451-d5493731bef1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                                        alt="Ảnh lỗi">
                                                    <p class="v_story_username">+ 2</p>
                                                </div>
                                            </a>
                                            <?php } ?>
                                        </div>
                                        <?php if ($type_edit == 0){ ?>
                                        <div class="center_introduce_bst">
                                            <button class="center_introduce_new_btn introduce_bst_btn">Chỉnh sửa phần đáng chú ý</button>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php  if (count($arr_img) > 0) { ?>
                                        <div class="ep_individual_album">
                                            <a href="/trang-ca-nhan-e<?=$ep_id?>/image" class="seemore_all_album">Xem tất cả</a>
                                            <div class="ep_album_header">
                                                Ảnh
                                            </div>
                                            <div class="ep_album_body">
                                                <?php  foreach ($arr_img as $key => $value) { ?>
                                                <a class="ep_album_body_item" href="<?=url_detail_new_feed($value['new_id'])?>">
                                                    <img class="ep_album_body_img" src="<?=$value['img']?>" alt="Ảnh lỗi">
                                                </a>
                                                <?php if ($key > 7) break; } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="ep_individual_album">
                                        <a href="/trang-ca-nhan-e<?=$ep_id?>/friend" class="seemore_all_album">Xem tất cả</a>
                                        <div class="ep_album_header">
                                            Bạn bè (<?=count($ep_friend)?>)
                                        </div>
                                        <div class="ep_album_body">
                                            <?php $i=0;
                                            foreach ($ep_friend as $key => $value) { ?>
                                            <a class="ep_album_body_card" href="/trang-ca-nhan-e<?=$value['id365']?>">
                                                <img class="ep_album_body_card_img" src="<?=$value['avatarUser']?>" alt="Ảnh lỗi">
                                                <p class="ep_individual_name"><?=$value['userName']?></p>
                                            </a>
                                            <?php if ($i >= 8){
                                                    break; 
                                                }else{
                                                    $i++;
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="center_detail center_content_middle nv_scroll_post">
                                    <?php
                                    include '../includes/ep_individual/group_public_post.php';
                                    ?>
                                </div>
                            </div>
                        <?php break;
                    } ?>
                </div>
            </div>
            <?php
                include '../includes/ep_individual/group_popup_action.php';
                include '../includes/ep_individual/popup_filter_post.php';
                include '../includes/ep_individual/edit_individual.php';
                include '../includes/popup_detail_ep.php';
                include '../includes/index_employee/popup_turn_on_notify.php';
                include '../includes/index_employee/popup_sup_news.php';
                include '../includes/index_employee/popup_success.php';
                include '../includes/index_employee/send_with_chat.php';
                include '../includes/index_employee/share_up_group.php';
                include '../includes/index_employee/share_up_invidual.php';
                include '../includes/index_employee/delete_post.php';
                include '../includes/index_employee/who_comment.php';
                include '../includes/index_employee/object_see_post.php';
                include '../includes/ep_group/setting.php';
                include '../includes/ep_group_public/setting_notify.php';
                include '../includes/ep_group_public/setting_group.php';
                include '../includes/ep_group_public/stop_group.php';
                include '../includes/ep_group_public/add_admin.php';
                include '../includes/ep_individual/popup_add_work.php';
                include '../includes/ep_individual/popup_archives_news.php';
                include '../includes/ep_individual/popup_unfriend.php';
                include '../includes/ep_individual/search_individual.php';
                include '../includes/index_employee/save_post.php';
                include '../includes/popup_index_ep.php';
                include '../includes/ep_detail_new_24h/popup_setting.php';
                // include '../includes/popup_dat.php';
                // include '../includes/tung_popup.php';
            ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/cropper/cropper.js"></script>
<script src="../js/caidat.js"></script>
<script src="../js/ep_index.js?v=<?= $version ?>"></script>
<script src="../js/ep_group.js?v=<?= $version ?>"></script>
<script src="../js/ep_group_public.js?v=<?= $version ?>"></script>
<script src="../js/ep_individual.js?v=<?= $version ?>"></script>
<script src="../js/ep_detail_new_24h.js?v=<?=$version?>"></script>
<script src="../js/nv_ep_detail.js?v=<?=$version?>"></script>
<script src="../js/core.js" defer></script>
<script>
    $('.select2_muti_tv').select2({
        width: '100%',
        placeholder: 'Thêm thành viên mới',
    });
    $('.select2_t_company').select2({
        width: '100%',
    });
    $('.select2_muti_td').select2({
        width: '100%',
        placeholder: 'Dùng @ để thêm người theo dõi',
    });
</script>
</html>
<?php
require_once '../config/config.php';
check_user_empoyee();

$type_create = 1;
$type_delete = 1;
$type_web = 1;

if ($my_id > 0){
}else{
    session_destroy();
    header('Location: /');
    exit;
}

$sql = "SELECT new_feed.*, 
(CASE WHEN EXISTS (SELECT id FROM `new_notify_on` WHERE new_notify_on.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS notify_on,
(CASE WHEN EXISTS (SELECT id_save FROM `save_post` JOIN add_collection ON save_post.id_collection = add_collection.id_collection WHERE id_posts = new_id AND id_user = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS saved
FROM `new_feed` 
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
ORDER BY updated_at DESC LIMIT ".$limit_post;

$arr_in4[2] = $arr_ep;
$arr_in4[1] = [];
$list_news = render_list_news($sql, $arr_in4);
$arr_post = $list_news[0];
$arr_in4 = $list_news[1];  
?>
<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="../css/tung.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/quan_ly_chung.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/update_work.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_detail_new_24h.css">
    <link rel="stylesheet" href="../css/story.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/index_employee_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/in_comment.css?v=<?= $version ?>">
    <title>Trang chủ (nhân viên)</title>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper">
            <?php //include '../includes/cd_sidebar.php' ?>
            <div id="cdnhanvienc" class="cdnhanvienc">
                <?php include '../includes/cd_header_new.php'; ?>
                <div id="center" class="center_content">
                    <div class="center_content_left">
                        <div class="ep_info">
                            <a href="/trang-ca-nhan.html?type=0" class="ep_info_detail">
                                <img class="ep_info_detail_avt" src="<?=$my_avt?>" alt="Ảnh lỗi">
                                <span class="ep_sb_name"><?=$_SESSION['login']['name']?></span>
                            </a>
                            <a href="/page-ban-be.html" class="ep_info_detail">
                                <img src="../img/ep_icon_friend.svg" alt="Ảnh lỗi">
                                <span class="ep_sb_name">Bạn bè</span>
                            </a>
                            <a href="/nhom.html" class="ep_info_detail">
                                <img src="../img/ep_icon_group.svg" alt="Ảnh lỗi">
                                <span class="ep_sb_name">Nhóm</span>
                            </a>
                            <a href="/bo-suu-tap.html" class="ep_info_detail">
                                <img src="../img/ep_icon_save.svg" alt="Ảnh lỗi">
                                <span class="ep_sb_name">Đã lưu</span>
                            </a>
                            <a href="/truyen-thong-noi-bo-su-kien.html" class="ep_info_detail">
                                <img src="../img/ep_info_event.svg" alt="Ảnh lỗi">
                                <span class="ep_sb_name">Sự kiện</span>
                            </a>
                            <a class="ep_info_detail">
                                <img src="../img/ep_info_mess.svg" alt="Ảnh lỗi">
                                <span class="ep_sb_name">Tin nhắn</span>
                            </a>
                            <a href="/ky-niem.html" class="ep_info_detail">
                                <img src="../img/ep_info_kn.svg" alt="Ảnh lỗi">
                                <span class="ep_sb_name">Kỷ niệm</span>
                            </a>
                        </div>
                    </div>
                    <div class="baiviet center_content_middle">
                        <!-- <form class="baiviet-search" id="search_ttnb">
                            <input type="text" name="" id="input_search" placeholder="Tìm kiếm bài viết">
                            <button class="btn_search v_ttsdn_btn_search">
                                <img src="../img/icon_search.png" alt="search">
                            </button>
                        </form> -->
                        <div class="v_story">
                            <div class="nv_story2">
                                <?php
								for ($i = 0; $i < 10; $i++) {
								?>
                                <a href="chi-tiet-tin-24h.html" class="">
                                    <div class="v_story_detail">
                                        <div class="v_story_detail_item">
                                            <img class="v_story_avt"
                                                src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80"
                                                alt="Ảnh lỗi">
                                        </div>
                                        <img class="v_story_detail_img"
                                            src="https://images.unsplash.com/photo-1637822412451-d5493731bef1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                            alt="Ảnh lỗi">
                                        <p class="v_story_username">Mipan Zu Zu <?=$i?></p>
                                    </div>
                                </a>
                                <?php
								}
								?>
                            </div>
                            <button type="button" class="slick-next2"><img src="../img/chat_story_next.svg"></button>
                            <div class="add_story">
                                <div class="ep_index_nv_story">
                                    <img class="ep_index_nv_story_avt" src="<?=$my_avt?>" alt="Ảnh lỗi">
                                </div>
                                <div class="detail_add_story">
                                    <a href="/tao-tin-24h.html"><img class="icon_add_story" src="../img/add_story.svg" alt="Ảnh lỗi"></a>
                                </div>
                            </div>
                        </div>
                        <div class="post_feel">
                            <div class="post_feel_header">
                                <img class="post_feel_avt" src="<?=$my_avt?>" alt="Ảnh lỗi">
                                <input class="post_feel_search" type="text" placeholder="Hãy viết cảm nghĩ của bạn" readonly>
                            </div>
                            <div class="post_feel_footer">
                                <div class="post_feel_footer_item post_feel_footer_item_upload">
                                    <img class="icon_post_footer" src="/img/nv_upload_file.svg" alt="Ảnh lỗi">
                                    Ảnh/video/tệp
                                </div>
                                <div class="post_feel_footer_item post_feel_footer_item_name_metion">
                                    <img class="icon_post_footer" src="/img/nv_post_feel_user_tag.svg" alt="Ảnh lỗi">
                                    Nhắc tên thành viên
                                </div>
                                <div class="post_feel_footer_item post_feel_footer_item_activity">
                                    <img class="icon_post_footer" src="/img/nv_icon_post_footer_active.svg"
                                        alt="Ảnh lỗi">
                                    Cảm xúc/Hoạt động
                                </div>
                            </div>
                        </div>
                        <div class="ep_post lst_posts_index" data-page="1">
                            <?php foreach ($arr_post as $key => $row) {
                                include '../includes/index_employee/post.php';
                            }

							include '../includes/index_employee/suggest_friend.php';
							include '../includes/index_employee/suggest_group.php';
							?>
                        </div>
                    </div>
                    <div class="center_content_right">
                        <div class="sidebar_right">
                            <div class="event_upcoming">
                                <?php  
                                    $today = time();
                                    $db_event = new db_query("SELECT * FROM new_feed INNER JOIN events ON new_feed.new_id = events.id_new WHERE (new_feed.new_type = 3 OR new_feed.new_type = 4) AND new_feed.id_company = " . $_SESSION['login']['id_com'] . " AND new_feed.delete = 0 AND events.time > $today ORDER BY new_feed.new_id DESC LIMIT 0,3");
                                    
                                    ?>
                                
                                <?if(mysql_num_rows($db_event->result) == 0){?>
                                    <div class="not_event">Không có sự kiện</div>
                                <?}else{?>
                                    <?while ($show_event = mysql_fetch_assoc($db_event->result)) {
                                        $new_id = $show_event['new_id'];
                                        ?>
                                        <p class="event_title">Sự kiện sắp tới</p>
                                        <div class="event_title_one">
                                            <p class="event_content"><?= $show_event['new_title']?></p>

                                            <p class="event_time"><?= date("H:i d.m.Y", $show_event['time'])?></p>
                                        </div>
                                    <? } ?>
                                    
                                <?}?>
                            </div>
                            
                            <div class="ep_info_shortcuts">
                                <p class="shortcuts_of_you">Lối tắt của bạn</p>
                                <a href="/nhom-cong-khai.html" class="shortcuts_detail">
                                    <img class="shortcuts_detail_img"
                                        src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                        alt="Ảnh lỗi">
                                    <p class="shortcuts_detail_name">Công ty Cổ phần Thanh toán Hưng Hà</p>
                                </a>
                                <a href="/nhom-cong-khai.html" class="shortcuts_detail">
                                    <img class="shortcuts_detail_img"
                                        src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                        alt="Ảnh lỗi">
                                    <p class="shortcuts_detail_name">Công ty Cổ phần Thanh toán Hưng Hà</p>
                                </a>
                                <a href="/nhom-cong-khai.html" class="shortcuts_detail">
                                    <img class="shortcuts_detail_img"
                                        src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                        alt="Ảnh lỗi">
                                    <p class="shortcuts_detail_name">Công ty Cổ phần Thanh toán Hưng Hà</p>
                                </a>
                            </div>
                            <div class="ep_info_shortcuts">
                                <p class="shortcuts_of_you">Người liên hệ</p>
                                <?php for ($i=0; $i < 10; $i++) { ?>
                                    <a href="/nhom-cong-khai.html" class="shortcuts_detail">
                                        <div class="shortcuts_detail_img contact_detail_img">
                                            <img class="shortcuts_detail_img contact_detail_img"
                                                src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                                alt="Ảnh lỗi">
                                            <div class="contact_detail_img_status contact_detail_img_online" data="test"></div>
                                        </div>
                                        <p class="shortcuts_detail_name">Công ty Cổ phần Thanh toán Hưng Hà <?=($i==1)?"a long long time ago there was a vocano living all alone in the middle of the sea":""?></p>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
	include '../includes/popup_index_ep.php';
	include '../includes/ep_detail_new_24h/popup_setting.php'; 
	include '../includes/index_employee/popup_turn_on_notify.php';
	include '../includes/index_employee/popup_sup_news.php';
	include '../includes/index_employee/save_post.php';
	include '../includes/index_employee/popup_success.php';
	include '../includes/index_employee/send_with_chat.php';
	include '../includes/index_employee/share_up_group.php';
	include '../includes/index_employee/share_up_invidual.php';
    include '../includes/popup_dat.php';
    include '../includes/tung_popup.php';
	?>
</body>
<script src="../js/select2.min.js"></script>
<script defer type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/caidat.js" defer></script>
<script src="../js/slick.min.js"></script>
<script src="../js/ep_index.js?v=<?= $version ?>"></script>
<script src="../js/ep_detail_new_24h.js?v=<?= $version ?>"></script>
<script type="text/javascript" src="../js/datjs.js" defer></script>
<script defer type="text/javascript" src="../js/datvalidate.js"></script>
<!-- <script type="text/javascript" src="../js/trang_chu.js"></script> -->
<script>
$(document).ready(function () {
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
    
    $(".slick-next2").click(function(){
        var nv_story2 = $(".nv_story2 a:last-child").offset().left + $(".nv_story2 a:last-child").width() - $(".nv_story2 a:first-child").offset().left;
        var delta_scroll = $(".nv_story2").width();
        var start_point = $(".nv_story2").offset().left - $(".nv_story2 a:first-child").offset().left;
        var scroll2 = start_point + delta_scroll;
        
        if (start_point >= (nv_story2 - delta_scroll - 2)){
            scroll2 = 0;
        }
        $(".nv_story2").animate({ scrollLeft: scroll2 }, { duration: 'medium', easing: 'swing' });

    });

    $(".btn_event_join").click(function() {
        var id_event = $(this).data('event_id');
        var element = $(this);
        $.ajax({
            url: '../ajax/event_join.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id_event: id_event
            },
            success: function(data) {
                element.text(data.msg);
            }
        });
    });

    $('.v_write_comment').keyup(function () {
        var el = $(this).parents('.v_comment_active');
        if ($.trim($(this).val()) != "") {
            el.find('.see_icon').hide();
            el.find('.see_icon1').hide();
            el.find('.nut_gui_comment').show();
        } else {
            if (el.find('.render_img').length == 0) {
                el.find('.see_icon').show();
                el.find('.see_icon1').show();
                el.find('.nut_gui_comment').hide();
                el[0].dataset.type = 0;
                el[0].dataset.new_id = el.find('.v_new_id_comment').val();
            }
        }
    });
});

</script>

</html>
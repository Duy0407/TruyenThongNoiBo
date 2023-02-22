<?php
require_once '../config/config.php';
$type_edit = getValue('type','int','GET','');
$type_create = 1;
$type_delete = 1;
check_user_empoyee();
$v_1 = getValue('v','int','GET',''); 
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
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_detail_new_24h.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/story.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group_public.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/ep_individual.css?v=<?= $version ?>">
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
            <?php include '../includes/cd_sidebar.php' ?>
            <div id="cdnhanvienc" class="cdnhanvienc">
                <div class="ep_individual_regime">
                    <p class="ep_individual_regime_title">Nội dung này trên trang cá nhân của bạn đang ở chế độ:</p>
                    <button class="ep_individual_regime_btn">
                        <img src="../img/cong-khai-2.svg" alt="Ảnh lỗi">
                        <span class="ep_individual_regime_span">Công khai</span>
                        <img src="../img/dropdown.svg" alt="Ảnh lỗi">
                    </button>
                    <button class="ep_individual_regime_turnoff">Tắt</button>
                </div>
                <?php
        include '../includes/cd_header.php';
        ?>
                <div id="center">
                    <div class="center_avt">
                        <div class="center_avt_header">
                            <img class="show_sidebar_right" src="../img/show_sidebar_right.svg" alt="Ảnh lỗi">
                            <img class="center_cover_img"
                                src="https://images.unsplash.com/photo-1638500551033-a0f60c8e768e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                alt="Ảnh lỗi">
                            <?php
              if ($type_edit == 0) {
              ?>
                            <button class="center_cover_upload_btn"><img class="center_cover_upload_img"
                                    src="../img/center_cover_upload_img.svg" alt="Ảnh lỗi">Chỉnh sửa ảnh bìa</button>
                            <input type="file" class="input_upload_cover_gr" hidden>
                            <?php
              }
              ?>
                        </div>
                        <div class="center_avt_footer">
                            <div class="center_avt_info">
                                <img class="center_avt_footer_img"
                                    src="https://images.unsplash.com/photo-1638518482512-4b32241d7ba8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                    alt="Ảnh lỗi">
                                <?php
                if ($type_edit == 0) {
                ?>
                                <img class="center_upload_avt_icon" src="../img/center_upload_avt_icon.svg"
                                    alt="Ảnh lỗi">
                                <input class="input_upload_gr" type="file" hidden>
                                <?php
                }
                ?>
                            </div>
                            <div class="center_avt_info_detail">
                                <p class="center_avt_name">Nhóm ABC</p>
                                <p class="center_avt_count_mem">20 thành viên</p>
                            </div>
                            <div class="center_avt_btn">
                                <?php
                if ($type_edit == 0) {
                ?>
                                <button class="center_avt_join2">
                                    <img class="center_avt_btn_join" src="../img/chinh-sua-trang-ca-nhan.svg"
                                        alt="Ảnh lỗi"> Chỉnh sửa trang cá nhân
                                </button>
                                <?php
                }else if ($type_edit == 1) {
                ?>
                                <button class="btn_add_fr"><img class="btn_add_fr_icon" src="../img/them-ban-be.svg"
                                        alt="Ảnh lỗi">Thêm bạn bè</button>
                                <button class="btn_invidual_mess"><img class="btn_invidual_mess_icon"
                                        src="../img/nhan-tin2.svg" alt="Ảnh lỗi"> Nhắn tin</button>
                                <?php
                }else if ($type_edit == 2) {
                ?>
                                <button class="btn_fr"><img class="btn_add_fr_icon" src="../img/ban-be2.svg"
                                        alt="Ảnh lỗi">Bạn bè</button>
                                <div class="popup_btn_fr">
                                    <div class="popup_btn_fr_detail">
                                        <img src="../img/ban-be2.svg" alt="Ảnh lỗi">
                                        <p class="popup_btn_title popup_btn_title1">Bạn bè</p>
                                    </div>
                                    <div class="popup_btn_fr_detail popup_btn_fr_unflow">
                                        <img src="../img/bo-theo-doi3.svg" alt="Ảnh lỗi">
                                        <p class="popup_btn_title">Bỏ theo dõi</p>
                                    </div>
                                    <div class="popup_btn_fr_detail popup_btn_cancel_fr">
                                        <img src="../img/huy-ket-ban.svg" alt="Ảnh lỗi">
                                        <p class="popup_btn_title">Hủy kết bạn</p>
                                    </div>
                                </div>
                                <button class="btn_invidual_mess"><img class="btn_invidual_mess_icon"
                                        src="../img/nhan-tin2.svg" alt="Ảnh lỗi"> Nhắn tin</button>
                                <?php
                }else if ($type_edit == 3) {
                ?>
                                <button class="btn_fr"><img class="btn_add_fr_icon" src="../img/ban-be2.svg"
                                        alt="Ảnh lỗi"> Phản hồi</button>
                                <div class="popup_btn_fr">
                                    <div class="popup_btn_fr_detail">
                                        <img src="../img/ban-be2.svg" alt="Ảnh lỗi">
                                        <p class="popup_btn_title popup_btn_title1">Phản hồi</p>
                                    </div>
                                    <div class="popup_btn_fr_detail">
                                        <p class="popup_btn_title">Xác nhận</p>
                                    </div>
                                    <div class="popup_btn_fr_detail">
                                        <p class="popup_btn_title">Xóa lời mời</p>
                                    </div>
                                </div>
                                <button class="btn_invidual_mess"><img class="btn_invidual_mess_icon"
                                        src="../img/nhan-tin2.svg" alt="Ảnh lỗi"> Nhắn tin</button>
                                <?php
                }
                ?>
                                <div class="popup_avt_btn">
                                    <div class="popup_avt_btn_detail popup_avt_btn_event_join">
                                        <img class="center_avt_btn_join" src="../img/center_avt_btn_join.svg"
                                            alt="Ảnh lỗi"> Đã tham gia <img class="center_avt_dropdown"
                                            src="../img/ls_dropdown(1).svg" alt="Ảnh lỗi">
                                    </div>
                                    <div class="popup_avt_btn_detail popup_avt_setting_notify">
                                        <img class="center_avt_btn_join" src="../img/center_avt_notify.svg"
                                            alt="Ảnh lỗi"> Cài đặt thông báo
                                    </div>
                                    <div class="popup_avt_btn_detail popup_avt_unflow">
                                        <img class="center_avt_btn_join" src="../img/center_avt_unflow.svg"
                                            alt="Ảnh lỗi"> Bỏ theo dõi nhóm
                                    </div>
                                    <div class="popup_avt_btn_detail popup_avt_exit_gr">
                                        <img class="center_avt_btn_join" src="../img/center_gr_exit.svg" alt="Ảnh lỗi">
                                        Rời khỏi nhóm
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="center_public_body">
                        <div class="center_detail">
                            <div class="center_nav_see_more">
                                <?php
              if ($type_edit == 0) {
                ?>
                                <div class="center_nav_see_more_detail center_nav_regime">
                                    <img class="center_nav_see_more_icon" src="../img/che-do-xem.svg"
                                        alt="content_your.svg">
                                    Chế độ xem
                                </div>
                                <div class="center_nav_see_more_detail center_nav_see_more_archives">
                                    <img class="center_nav_see_more_icon" src="../img/kho-luu-tru-tin.svg"
                                        alt="content_your.svg">
                                    Kho lưu trữ tin
                                </div>
                                <div class="center_nav_see_more_detail center_nav_search">
                                    <img class="center_nav_see_more_icon" src="../img/tim-kiem-tren-trang-chu.svg"
                                        alt="content_your.svg">
                                    Tìm kiếm trên trang cá nhân
                                </div>
                                <div class="center_nav_see_more_detail center_nav_search">
                                    <img class="center_nav_see_more_icon" src="../img/cai-dat-tren-ca-nhan.svg"
                                        alt="content_your.svg">
                                    Cài đặt trang cá nhân
                                </div>
                                <?php
              }else {
                ?>
                                <div class="center_nav_see_more_detail center_nav_search">
                                    <img class="center_nav_see_more_icon" src="../img/search_individual.svg"
                                        alt="content_your.svg">
                                    Tìm kiếm trên trang cá nhân
                                </div>
                                <div class="center_nav_see_more_detail show_popup_block">
                                    <img class="center_nav_see_more_icon" src="../img/block_individual.svg"
                                        alt="content_your.svg">
                                    Chặn
                                </div>
                                <div class="center_nav_see_more_detail ep_post_turnon_sup">
                                    <img class="center_nav_see_more_icon" src="../img/suppost.svg"
                                        alt="content_your.svg">
                                    Tìm hỗ trợ hoặc báo cáo bài viết
                                </div>
                                <?php
              }
              ?>
                            </div>
                            <div class="center_nav_block">
                                <div class="center_nav">
                                    <div class="center_nav_deatail center_nav_post">Bài viết</div>
                                    <div class="center_nav_deatail center_nav_intro">Giới thiệu</div>
                                    <div class="center_nav_deatail center_nav_member">Bạn bè (300)</div>
                                    <div class="center_nav_deatail center_nav_album">Ảnh</div>
                                    <div class="center_nav_deatail center_nav_group">Nhóm</div>
                                    <?php
                  if ($type_edit == 0) {
                  ?>
                                    <div class="center_nav_deatail" onclick="window.location.href='/tao-tin-24h.html'">
                                        Thêm vào tin</div>
                                    <?php
                   } 
                  ?>
                                    <div class="center_nav_deatail center_nav_de_see_more">Xem thêm <img
                                            class="center_group_public_dropdown"
                                            src="../img/center_group_public_dropdown.svg" alt="Ảnh lỗi"></div>
                                </div>
                            </div>
                            <?php
              include '../includes/ep_individual/group_public_post.php';
              include '../includes/ep_individual/gr_album.php';
              include '../includes/ep_individual/gr_introduce.php';
              include '../includes/ep_individual/gr_member.php';
              include '../includes/ep_individual/group.php';
              include '../includes/ep_individual/archives_new.php';
              ?>
                        </div>
                        <div class="center_sidebar_right">
                            <div class="center_introduce">
                                <div class="center_introduce_header">
                                    Giới thiệu
                                </div>
                                <div class="center_introduce_body">
                                    <div class="center_introduce_body_item">
                                        <img class="center_avt_icon_public" src="../img/briefcase-fill1.svg"
                                            alt="Ảnh lỗi">
                                        <div class="">
                                            <p class="center_avt_regime">Làm việc tại Timviec365.vn</p>
                                        </div>
                                    </div>
                                    <div class="center_introduce_body_item">
                                        <img class="center_avt_icon_public" src="../img/graduation-cap2.svg"
                                            alt="Ảnh lỗi">
                                        <div class="">
                                            <p class="center_avt_regime">Từng học tại Arena Muiltimedia</p>
                                        </div>
                                    </div>
                                    <div class="center_introduce_body_item">
                                        <img class="center_avt_icon_public" src="../img/graduation-cap2.svg"
                                            alt="Ảnh lỗi">
                                        <div class="">
                                            <p class="center_avt_regime">Từng học tại Đại học Thủy Lợi Hà Nội - ThuyLoi
                                                University</p>
                                        </div>
                                    </div>
                                    <div class="center_introduce_body_item">
                                        <img class="center_avt_icon_public" src="../img/ion_home.svg" alt="Ảnh lỗi">
                                        <div class="">
                                            <p class="center_avt_regime">Sống tại Hà Nội</p>
                                        </div>
                                    </div>
                                    <div class="center_introduce_body_item">
                                        <img class="center_avt_icon_public" src="../img/carbon_location-filled.svg"
                                            alt="Ảnh lỗi">
                                        <div class="">
                                            <p class="center_avt_regime">Đến từ Thái Bình, Việt Nam</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ep_individual_album">
                                <div class="ep_album_header">
                                    <button class="seemore_all_album center_nav_album">Xem tất cả</button>
                                    Ảnh
                                </div>
                                <div class="ep_album_body">
                                    <?php
                  for ($i = 0; $i < 6; $i++) {
                  ?>
                                    <a class="ep_album_body_item" href="">
                                        <img class="ep_album_body_img"
                                            src="../img/photo-1506773090264-ac0b07293a64.jfif" alt="Ảnh lỗi">
                                    </a>
                                    <?php
                  }
                  ?>
                                </div>
                            </div>
                            <div class="ep_individual_album">
                                <div class="ep_album_header">
                                    <button class="seemore_all_album center_nav_member">Xem tất cả</button>
                                    Bạn bè (300)
                                </div>
                                <div class="ep_album_body">
                                    <?php
                  for ($i = 0; $i < 6; $i++) {
                  ?>
                                    <a class="ep_album_body_card" href="">
                                        <img class="ep_album_body_card_img"
                                            src="../img/photo-1506773090264-ac0b07293a64.jfif" alt="Ảnh lỗi">
                                        <p class="ep_individual_name">Đỗ Thị Thu Hà</p>
                                    </a>
                                    <?php
                  }
                  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    include '../includes/popup_index_ep.php';
    include '../includes/index_employee/popup_turn_on_notify.php';
    include '../includes/index_employee/popup_sup_news.php';
    include '../includes/index_employee/popup_success.php';
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
    include '../includes/ep_individual/edit_individual.php';
    include '../includes/ep_individual/popup_unfriend.php';
    include '../includes/ep_individual/search_individual.php';
    include '../includes/index_employee/save_post.php';
    include '../includes/ep_detail_new_24h/popup_setting.php';
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js"></script>
<script src="../js/ep_index.js?v=<?= $version ?>"></script>
<script src="../js/ep_group.js?v=<?= $version ?>"></script>
<script src="../js/ep_group_public.js?v=<?= $version ?>"></script>
<script src="../js/ep_individual.js?v=<?= $version ?>"></script>
<script src="../js/ep_detail_new_24h.js?v=<?=$version?>"></script>
<script src="../js/core.js" defer></script>

</html>
<?php
require_once '../config/config.php';
$type_create = 1;
$type_delete = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/new_feed.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/detail_news.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <title>Chi tiết bài viết</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">
      <?php include '../includes/cd_sidebar.php' ?>
      <div id="cdnhanvienc" class="cdnhanvienc">
        <?php
        include '../includes/cd_header.php';
        ?>
        <button class="cdnhanvienc_seemore"><img src="../img/Frame627841_seemore.svg" alt="Ảnh lỗi"></button>
        <div id="center">
          <div class="center_left">
            <?php
            for ($i=0; $i < 4; $i++) { 
            ?>
            <div class="center_left_detail">
              <button onclick="history.back()" class="bi_x"><img src="../img/bi_x.svg" alt="bi_x.svg"></button>
              <img class="center_left_detail_img" src="https://images.unsplash.com/photo-1638518482512-4b32241d7ba8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
            </div>
            <?php
            }
            ?>
          </div>
          <div class="center_right">
            <div class="center_right_info">
              <img class="center_right_avt" src="https://images.unsplash.com/photo-1638518482512-4b32241d7ba8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
              <div class="">
                <p class="center_right_user">Gojo Satoru</p>
                <p class="center_right_time">16:00  11/06/2021 . <img class="center_right_icon" src="../img/gis_earth-australia-o(1).svg" alt="Ảnh lỗi"></p>
              </div>
              <button class="center_right_more"><img src="../img/ep_post_more.svg" alt="ep_post_more.svg"></button>
              <div class="popup_action">
                <button class="popup_action_detail new_detail_ghim">
                  <img class="popup_action_icon" src="../img/new_detail_ghim.svg" alt="Ảnh lỗi">
                  Ghim bài viết
                </button>
                <button class="popup_action_detail ep_post_action1_save">
                  <img class="popup_action_icon" src="../img/ep_post_save.svg" alt="Ảnh lỗi">
                  Lưu bài viết
                </button>
                <button class="popup_action_detail new_detail_notify">
                  <img class="popup_action_icon" src="../img/ep_post_notify.svg" alt="Ảnh lỗi">
                  Tắt thông báo
                </button>
                <button class="popup_action_detail new_detail_turnoff_post">
                  <img class="popup_action_icon" src="../img/new_detail_turnoff_cmt.svg" alt="Ảnh lỗi">
                  Tắt tính năng bình luận
                </button>
                <button class="popup_action_detail new_detail_turnoff_hide_post">
                  <img class="popup_action_icon" src="../img/new_detail_hide_post.svg" alt="Ảnh lỗi">
                  Ẩn bài viết
                </button>
                <button class="popup_action_detail new_detail_go_bv">
                  <img class="popup_action_icon" src="../img/new_detail_go_bv.svg" alt="Ảnh lỗi">
                  Gỡ bài viết
                </button>
                <button class="popup_action_detail new_detail_go_bv_chan_tg">
                  <img class="popup_action_icon" src="../img/new_detail_go_bv_chan_tg.svg" alt="Ảnh lỗi">
                  Gỡ bài viết và chặn tác giả
                </button>
                <button class="popup_action_detail notify_with_admin">
                  <img class="popup_action_icon" src="../img/notify_with_admin.svg" alt="Ảnh lỗi">
                  Báo cáo bài viết với quản trị viên nhóm
                </button>
                <button class="popup_action_detail ep_post_turnon_sup">
                  <img class="popup_action_icon" src="../img/new_detail_icon_suppost.svg" alt="Ảnh lỗi">
                  Tìm hỗ trợ hoặc báo cáo bài viết
                </button>
              </div>
            </div>
            <p class="center_right_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <div class="count_like">
              <div class="detail_new_count_like">
                <img src="../img/detail_new_count_like.svg" alt="detail_new_count_like.svg">
                100
              </div>
              <div class="detail_new_count_like">
                20 Bình luận
              </div>
            </div>
            <div class="like_action">
              <div class="bx_bx-like">
                <img class="bx_bx-like-icon" src="../img/bx_bx-like.svg" alt="Ảnh lỗi">
                Thích
              </div>
              <div class="bx_bx-message">
                <img class="bx_bx-message-icon" src="../img/bx_bx-message.svg" alt="Ảnh lỗi">
                Bình luận
              </div>
            </div>
            <div class="cmt">
              <div class="cmt_body">
                <?php
                for ($i=0; $i < 3; $i++) { 
                ?>
                <div class="cmt_detail">
                  <img class="cmt_avt" src="https://images.unsplash.com/photo-1638884822796-8382e7baed16?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                  <div class="cmt_content">
                    <div class="cmt_detail_item">
                      <p class="cmt_name">Lê Thu Trà</p>
                      <img class="cmt_detail_img" src="https://images.unsplash.com/photo-1485067801970-70573e3f77d0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=388&q=80" alt="Ảnh lỗi">
                      <a download href="" class="cmt_detail_file">
                        <p class="cmt_detail_name_file">Báo cáo công việc ABC.docx</p>
                        <p class="cmt_detail_file_time">121KB 10:03, 07/09/2021</p>
                        <img class="cmt_detail_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                      </a>
                      <p class="cmt_content_detail">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      <img class="cmt_post_more" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                      <div class="popup_cmt">
                        <button class="popup_cmt_detail">
                          <img class="popup_cmt_icon" src="../img/hide_cmt.svg" alt="hide_cmt.svg">
                          Ẩn bình luận 
                        </button>
                        <button class="popup_cmt_detail">
                        <img class="popup_cmt_icon" src="../img/del_cmt.svg" alt="del_cmt.svg">
                        Xóa bình luận
                        </button>
                      </div>
                    </div>
                    <div class="cmt_action">
                      <button class="text_like">Thích . </button>
                      <button class="rep_cmt">Trả lời . </button>
                      <span class="text_time">10 phút trước</span>
                    </div>
                    <div class="cmt_detail_rep">
                      <img class="cmt_avt" src="https://images.unsplash.com/photo-1638884822796-8382e7baed16?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                      <div class="cmt_content">
                        <div class="cmt_detail_item">
                          <p class="cmt_name">Lê Thu Trà</p>
                          <img class="cmt_detail_img" src="https://images.unsplash.com/photo-1485067801970-70573e3f77d0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=388&q=80" alt="Ảnh lỗi">
                          <a download href="" class="cmt_detail_file">
                            <p class="cmt_detail_name_file">Báo cáo công việc ABC.docx</p>
                            <p class="cmt_detail_file_time">121KB 10:03, 07/09/2021</p>
                            <img class="cmt_detail_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                          </a>
                          <p class="cmt_content_detail">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                          <img class="cmt_post_more" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                        </div>
                        <div class="cmt_action">
                          <button class="text_like">Thích . </button>
                          <span class="text_time">10 phút trước</span>
                        </div>
                      </div>
                    </div>
                    <form class="form_rep_cmt" action="">
                      <img class="cmt_avt" src="https://images.unsplash.com/photo-1638884822796-8382e7baed16?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                      <input class="form_rep_cmt_input" type="text" placeholder="Viết bình luận...">
                      <div class="cmt_upload">
                        <img class="vector_icon_head" src="../img/Vector_icon_head.svg" alt="Ảnh lỗi">
                        <img class="vector_icon_head" src="../img/Group_upload_file.svg" alt="Ảnh lỗi">
                        <button class="submit_cmt"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                      </div>
                    </form>
                  </div>
                </div>
                <?php
                }
                ?>
              </div>
              <form class="form_cmt" action="">
                <img class="form_cmt_avt" src="https://images.unsplash.com/photo-1638884822796-8382e7baed16?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                <input class="form_cmt_input" type="text" placeholder="Viết bình luận...">
                <div class="cmt_upload">
                  <img class="vector_icon_head" src="../img/Vector_icon_head.svg" alt="Ảnh lỗi">
                  <img class="vector_icon_head" src="../img/Group_upload_file.svg" alt="Ảnh lỗi">
                  <button class="submit_cmt"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                </div>
              </form>
            </div>  
          </div>
        </div>
      </div>
    </div>
    <?php
    include '../includes/index_employee/popup_success.php';
    include '../includes/index_employee/save_post.php';
    include '../includes/index_employee/popup_sup_news.php';
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/ep_index.js?v=<?= $version ?>" defer></script> 
<script src="../js/caidat.js?v=<?= $version ?>" defer></script> 
<script src="../js/detail_news.js" defer></script>
<script src="../js/core.js" defer></script>

</html>
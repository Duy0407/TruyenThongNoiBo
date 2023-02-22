<?php
require_once '../config/config.php';
check_user_empoyee();
$type_create = 1;
$type_delete = 1;
$type_web = 1;
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
  <link rel="stylesheet" href="../css/quan_ly_chung.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/new_feed.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/update_work.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/ep_detail_new_24h.css">
  <link rel="stylesheet" href="../css/story.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <title>Trang chủ (nhân viên)</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">
      <?php include '../includes/cd_sidebar.php' ?>
      <div id="cdnhanvienc" class="cdnhanvienc">
        <?php
        include '../includes/cd_header.php';
        ?>
        <div id="center">
          <div class="baiviet">
            <form class="baiviet-search" id="search_ttnb">
              <input type="text" name="" id="input_search" placeholder="Tìm kiếm bài viết">
              <button class="btn_search v_ttsdn_btn_search">
                <img src="../img/icon_search.png" alt="search">
              </button>
            </form>
            <div class="v_story">
              <div class="v_story2">
                <?php
                for ($i = 0; $i < 8; $i++) {
                ?>
                  <a href="chi-tiet-tin-24h.html" class="v_story_detail">
                    <div class="v_story_detail_item">
                      <img class="v_story_avt" src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80" alt="Ảnh lỗi">
                    </div>
                    <img class="v_story_detail_img" src="https://images.unsplash.com/photo-1637822412451-d5493731bef1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                    <p class="v_story_username">Mipan Zu Zu</p>
                  </a>
                <?php
                }
                ?>
              </div>
              <div class="add_story">
                <div class="ep_index_nv_story">
                  <img class="ep_index_nv_story_avt" src="<?= $_SESSION['login']['logo'] ?>" alt="Ảnh lỗi">
                </div>
                <div class="detail_add_story">
                  <a href="/tao-tin-24h.html"><img class="icon_add_story" src="../img/add_story.svg" alt="Ảnh lỗi"></a>
                </div>
              </div>
            </div>
            <div class="post_feel">
              <div class="post_feel_header">
                <img class="post_feel_avt" src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                <input class="post_feel_search" type="text" placeholder="Hãy viết cảm nghĩ của bạn" readonly>
              </div>
              <div class="post_feel_footer">
                <div class="post_feel_footer_item post_feel_footer_item_upload">
                  <img class="icon_post_footer" src="../img/upload_file.svg" alt="Ảnh lỗi">
                  Ảnh/video/tệp
                </div>
                <div class="post_feel_footer_item post_feel_footer_item_name_metion">
                  <img class="icon_post_footer" src="../img/post_feel_user_tag.svg" alt="Ảnh lỗi">
                  Nhắc tên thành viên
                </div>
                <div class="post_feel_footer_item post_feel_footer_item_activity">
                  <img class="icon_post_footer" src="../img/icon_post_footer_active.svg" alt="Ảnh lỗi">
                  Cảm xúc/Hoạt động
                </div>
              </div>
            </div>
            <div class="ep_post">
              <?php
              include '../includes/index_employee/post.php';
              include '../includes/index_employee/suggest_friend.php';
              include '../includes/index_employee/suggest_group.php';
              ?>
            </div>
          </div>
          <div class="sidebar_right">
            <div class="event_upcoming">
              <p class="event_title">Sự kiện sắp tới</p>
              <p class="event_content">Hội thảo trao đổi phương thức làm việc bằng ứng dụng chuyển đổi số</p>
              <p class="event_time">14h30 25.01.2020</p>
            </div>
            <div class="ep_info">
              <a href="/trang-ca-nhan.html?type=0" class="ep_info_detail">
                <img class="ep_info_detail_avt" src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                <span class="ep_sb_name">Phạm Văn Minh</span>
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
            <div class="ep_info_shortcuts">
              <p class="shortcuts_of_you">Lối tắt của bạn</p>
              <a href="/nhom-cong-khai.html" class="shortcuts_detail">
                <img class="shortcuts_detail_img" src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                <p class="shortcuts_detail_name">Công ty Cổ phần Thanh toán Hưng Hà</p>
              </a>
              <a href="/nhom-cong-khai.html" class="shortcuts_detail">
                <img class="shortcuts_detail_img" src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                <p class="shortcuts_detail_name">Công ty Cổ phần Thanh toán Hưng Hà</p>
              </a>
              <a href="/nhom-cong-khai.html" class="shortcuts_detail">
                <img class="shortcuts_detail_img" src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                <p class="shortcuts_detail_name">Công ty Cổ phần Thanh toán Hưng Hà</p>
              </a>
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
  ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/caidat.js" defer></script>
<script src="../js/slick.min.js"></script>
<script src="../js/ep_index.js?v=<?= $version ?>"></script>
<script src="../js/ep_detail_new_24h.js?v=<?= $version ?>"></script>

</html>
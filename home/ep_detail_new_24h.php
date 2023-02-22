<?php
  require_once '../config/config.php';
  check_user_empoyee();
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <link rel="stylesheet" href="../css/core.css">
  <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/quan_ly_chung.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/new_feed.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/update_work.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/ep_detail_new_24h.css?v=<?=$version?>">
  <title>Trang chủ (nhân viên)</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">
      <?php include '../includes/cd_sidebar.php' ?>
      <div class="sidebar_24h">
        <div class="sidebar_24h_header">
          <a class="sidebar_24h_header_back" href="/trang-chu-nhan-vien.html"><img src="../img/turn_off_new.svg"
              alt="Ảnh lỗi"></a>
          <img class="show_sidebar_24h" src="../img/24h_show_sidebar.svg" alt="Ảnh lỗi">
        </div>
        <div class="sidebar_24h_body">
          <p class="sidebar_24h_body_title">Tin</p>
          <div class="sidebar_24_action">
            <button class="sidebar_24_action_btn" onclick="window.location.href='/trang-ca-nhan.html?v=1'">Kho lưu trữ</button>
            <button class="sidebar_24_action_btn sidebar_24_action_btn_setting">Cài đặt</button>
          </div>
          <p class="create_new_24h_title">Tạo tin của bạn</p>
          <a href="/tao-tin-24h.html" class="create_new_24h">
            <img class="icon_create_new_24h" src="../img/icon_create_new_24h.svg" alt="Ảnh lỗi">
            <div class="create_new_24h_text">
              <div class="create_new_24h_text_item">Tạo tin</div>
              <div class="create_new_24h_text_card">Hãy chia sẻ ảnh, video hoặc viết gì đó.</div>
            </div>
          </a>
          <div class="all_new_title">Tất cả các tin</div>
          <div class="new_24h_detail">
            <?php
            for ($i=0; $i < 5; $i++) { 
            ?>
            <div class="new_24h_detail_item">
              <div class="new_24h_detail_box">
                <img class="new_24h_detail_avt"
                  src="https://images.unsplash.com/photo-1638086739120-ce7f3d328c45?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                  alt="Ảnh lỗi">
              </div>
              <div>
                <p class="new_24h_detail_box_username">Mipan Zu Zu</p>
                <p class="new_24h_detail_box_time">10 giờ</p>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <div id="cdnhanvienc" class="cdnhanvienc">
        <img class="show_sidebar_24h2" src="../img/show_sidebar_24h.svg" alt="Ảnh lỗi">
        <?php
        include '../includes/cd_header.php';
        ?>
        <div id="center">
            <div class="center_detail">
              <div class="center_slick">
                <?php 
                for ($i=0; $i < 5; $i++) { 
                ?>
                <div class="center_slick_div">
                  <div class="progess_bar">
                    <div class="loading"></div>
                  </div>
                  <div class="center_slick_info">
                    <img class="center_slick_info_avt" src="https://images.unsplash.com/photo-1636116461481-4c3ec444c9f8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1166&q=80" alt="Ảnh lỗi">
                    <div>
                      <p class="center_slick_info_username">Mipan Zu Zu</p>
                      <p class="center_slick_info_time">10 giờ</p>
                    </div>
                    <div class="center_slick_detail">
                      <img class="center_slick_action center_slick_action_play" src="../img/24h_play.svg" alt="Ảnh lỗi">
                      <img class="center_slick_action center_slick_action_audio" src="../img/24h_audio.svg" alt="Ảnh lỗi">
                      <img class="center_slick_action center_slick_action_popup" src="../img/24h_more.svg" alt="Ảnh lỗi">
                      <div class="popup_action_new_24h">
                        <div class="popup_action_new_24h_item popup_action_new_24h_item_turnoff">
                          <img class="news_24h_turnoff" src="../img/news_24h_turnoff.svg" alt="Ảnh lỗi">
                          Tắt tin của Mipan Zu Zu
                        </div>
                        <div class="popup_action_new_24h_item popup_action_new_24h_item_sup_news">
                          <img class="news_24h_turnoff" src="../img/search_suppost.svg" alt="Ảnh lỗi">
                          Tìm hỗ trợ hoặc báo cáo tin
                        </div>
                      </div>
                    </div>
                  </div>
                  <img class="center_slick_img" src="https://images.unsplash.com/photo-1638086739120-ce7f3d328c45?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                </div>
                <?php
                }
                ?>
              </div>
              <form class="form_cmt_24h" action="">
                <div style="width: 50%; position: relative;">
                  <input class="cmt_24h_input" type="text" placeholder="Nhập tin nhắn...">
                  <button class="form_cmt_24h_submit"><img src="../img/input_detail_news_24h.svg" alt=""></button>
                </div>
                <img class="cmt_24h_drop_feel" src="../img/24h_drop_feel.svg" alt="Ảnh lỗi">
                <div class="block_drop_feel">
                  <img class="cmt_24h_feel" src="../img/24h_like.svg" alt="Ảnh lỗi">
                  <img class="cmt_24h_feel" src="../img/24h_haha.svg" alt="Ảnh lỗi">
                  <img class="cmt_24h_feel" src="../img/24h_love.svg" alt="Ảnh lỗi">
                  <img class="cmt_24h_feel" src="../img/24h_sad.svg" alt="Ảnh lỗi">
                  <img class="cmt_24h_feel" src="../img/24h_wow.svg" alt="Ảnh lỗi">
                  <img class="cmt_24h_feel" src="../img/24h_angry.svg" alt="Ảnh lỗi">
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
  include '../includes/ep_detail_new_24h/popup_turnoff_new.php';
  include '../includes/ep_detail_new_24h/popup_setting.php'; 
  include '../includes/index_employee/popup_sup_news.php'; 
  ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/caidat.js?v=<?= $version ?>"></script>
<script src="../js/core.js" defer></script>
<script src="../js/slick.min.js"></script>
<script src="../js/ep_index.js?v=<?= $version ?>"></script>
<script src="../js/ep_detail_new_24h.js?v=<?= $version ?>"></script>
</html>
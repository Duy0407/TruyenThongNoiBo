<?php
require_once '../config/config.php';
$type_create = 1;
$type_delete = 1;
$type_web = 3;
check_user_empoyee();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/ep_detail_new_24h.css?v=<? $version ?>">
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/memory.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <title>Kỷ niệm</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">
      <?php include '../includes/cd_sidebar.php' ?>
      <div class="sidebar_index">
        <div class="sidebar_index_header">
          <img class="show_sidebar_24h" src="../img/24h_show_sidebar.svg" alt="Ảnh lỗi">
        </div>
        <div class="sidebar_index_body">
          <div class="sidebar_index_body_title">Bạn bè</div>
          <div>
            <p class="sidebar_index_title">Kỷ niệm</p>
            <div class="sidebar_index_body_detail">
              <img class="sidebar_index_body_icon" src="../img/all_memory.svg" alt="all_memory.svg">
              <span class="sidebar_index_text">Tất cả kỷ niệm</span>
            </div>
            <p class="sidebar_index_title">Cài đặt</p>
            <div class="sidebar_index_body_detail sidebar_index_body_notify">
              <img class="sidebar_index_body_icon" src="../img/memory_notify.svg" alt="all_memory.svg">
              <span class="sidebar_index_text">Thông báo</span>
            </div>
            <div class="sidebar_index_body_detail sidebar_index_body_memory_hide">
              <img class="sidebar_index_body_icon" src="../img/memory_hide_all.svg" alt="all_memory.svg">
              <span class="sidebar_index_text">Ẩn mọi người</span>
            </div>
          </div>
        </div>
      </div>
      <div id="cdnhanvienc" class="cdnhanvienc">
        <?php
        include '../includes/cd_header.php';
        ?>
        <div id="center">
          <div class="center_detail">
            <div class="memory_action">
              <div class="all_memory">
                <p class="all_memory_text">Kỷ niệm</p>
                <button class="all_memory_detail">
                  <img class="all_memory_icon" src="../img/all_memory.svg" alt="all_memory.svg">
                  Tất cả kỷ niệm
                </button>
              </div>
              <div class="memory_setting">
                <p class="all_memory_text">Cài đặt</p>
                <button class="all_memory_detail sidebar_index_body_notify">
                  <img class="all_memory_icon" src="../img/../img/memory_notify.svg" alt="all_memory.svg">
                  Thông báo
                </button>
                <button class="all_memory_detail sidebar_index_body_memory_hide">
                  <img class="all_memory_icon" src="../img/../img/memory_hide_all.svg" alt="all_memory.svg">
                  Ẩn mọi người
                </button>
              </div>
            </div>
            <div class="center_header">
              <img src="../img/memory_header.png" alt="Ảnh lỗi">
              <p class="center_header_content">
                Chúng tôi hy vọng bạn thích ôn lại và chia sẻ kỷ niệm trên Truyền thông văn hóa, từ các kỷ niệm gần đây nhất đến những kỷ niệm ngày xa xưa.
              </p>
            </div>
            <div class="center_body">
              <div class="center_body_memory">
                <p class="center_body_title">Vào ngày này</p>
                <p class="center_body_time">4 năm trước</p>
              </div>
              <?php
              include '../includes/index_employee/post.php';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    include '../includes/popup_index_ep.php'; 
    include '../includes/index_employee/popup_turn_on_notify.php';
    include '../includes/index_employee/popup_sup_news.php';
    include '../includes/memory/memory_notify.php';
    include '../includes/memory/memory_hide_everyone.php';
    include '../includes/index_employee/popup_success.php';
    include '../includes/index_employee/delete_post.php';
    include '../includes/index_employee/who_comment.php';
    include '../includes/index_employee/object_see_post.php';
    include '../includes/index_employee/save_post.php';
    include '../includes/ep_detail_new_24h/popup_setting.php';
    include '../includes/index_employee/send_with_chat.php';
    include '../includes/index_employee/share_up_group.php';
    include '../includes/index_employee/share_up_invidual.php';
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/ep_index.js?v=<?= $version ?>"></script>
<script src="../js/caidat.js?v=<?= $version ?>"></script>
<script src="../js/ep_detail_new_24h.js?v=<? $version ?>"></script>
<script src="../js/memory.js?v=<?= $version ?>"></script>
<script src="../js/core.js" defer></script>

</html>
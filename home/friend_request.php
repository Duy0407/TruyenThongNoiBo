<?php
require_once '../config/config.php';
$type_create = 1;
$type_delete = 1;
$type_page = 2;
check_user_empoyee();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/index_friend.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <style>
    .sidebar_index_body_detail:nth-child(2) {
      background: #DDDDDD;
      color: white;
    }

    .fr_nav:nth-child(2) {
      background: #4C5BD4;
      color: white;
    }

    .sidebar_index_body_detail:nth-child(2) .sidebar_index_text {
      color: #4C5BD4;
    }
  </style>
  <title>Lời mời kết bạn</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">
      <?php include '../includes/cd_sidebar.php' ?>
      <?php include '../includes/page_friend/sidebar_index.php' ?>
      <div id="cdnhanvienc" class="cdnhanvienc">
        <?php
        include '../includes/cd_header.php';
        ?>
        <div id="center">
          <div class="center_box_search">
            <input type="text" class="center_search" placeholder="Tìm kiếm bạn bè">
            <img class="search_friend" src="../img/search_friend.svg" alt="Ảnh lỗi">
          </div>
          <div class="fr_nav_block">
            <a href="/page-ban-be.html" class="fr_nav">Tổng quan</a>
            <a href="/loi-moi-ket-ban.html" class="fr_nav">Lời mời kết bạn</a>
            <a href="/goi-y-ket-ban.html" class="fr_nav">Gợi ý</a>
            <a href="/tat-ca-ban-be.html" class="fr_nav">Tất cả bạn bè</a>
          </div>
          <div class="invate_text">
            Lời mời kết bạn(163 lời mời kết bạn)
            <button class="invate_text_see_more invate_text_see_more_fr_re">Xem lời mời đã gửi</button>
          </div>
          <div class="center_detail">
            <?php
            for ($i = 0; $i < 8; $i++) {
            ?>
              <div class="center_item">
                <a href="/trang-ca-nhan.html?type=1">
                  <img class="center_item_img" src="https://images.unsplash.com/photo-1637870042405-8de0635ea5c8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1867&q=80" alt="Ảnh lỗi">
                </a>
                <div class="center_item_detail">
                  <p class="center_detail_name">Justin baby</p>
                  <p class="center_detail_fr"><img class="center_detail_fr_avt" src="../img/demo.jfif" alt="Ảnh lỗi"> 2 bạn chung</p>
                  <button class="center_item_success">Xác nhận</button>
                  <button class="center_item_del">Xóa</button>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include '../includes/index_friend/loi-moi-da-gui.php';
  ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/caidat.js?v=<?=$version?>" defer></script>
<script src="../js/friend_request.js" defer></script>
<script src="../js/core.js" defer></script>
</html>
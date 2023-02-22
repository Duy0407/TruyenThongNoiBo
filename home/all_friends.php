<?php
require_once '../config/config.php';
$type_create = 1;
$type_delete = 1;
$type_page = 4;
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
    .sidebar_index_body_detail:nth-child(4) {
      background: #DDDDDD;
      color: white;
    }
    .fr_nav:nth-child(4) {
      background: #4C5BD4;
      color: white;
    }
    .sidebar_index_body_detail:nth-child(4) .sidebar_index_text{
      color: #4C5BD4;
    }
  </style>
  <title>Tất cả bạn bè</title>
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
            Tất cả bạn bè (200 người bạn)
          </div>
          <div class="center_detail">
            <?php
            for ($i = 0; $i < 4; $i++) {
            ?>
              <div class="center_item">
                <a href="/trang-ca-nhan.html?type=1">
                  <img class="center_item_img" src="https://images.unsplash.com/photo-1637870042405-8de0635ea5c8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1867&q=80" alt="Ảnh lỗi">
                </a>
                <div class="center_item_detail">
                  <p class="center_detail_name">
                    Justin baby
                    <img class="ep_post_more" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                    <div class="popup_center_action">
                      <div class="center_icon">
                        <img class="center_icon_img" src="../img/chat_mess_all_friend.svg" alt="Ảnh lỗi">
                        <div>
                        Nhắn tin
                        </div>
                      </div>
                      <div class="center_icon center_icon_flow" data-type="1">
                        <img class="center_icon_img" src="../img/all_friend_unflow.svg" alt="Ảnh lỗi">
                        <div>
                          <p class="center_icon_flow_p">
                            Bỏ theo dõi
                          </p>
                          <p class="center_request_detail">Dừng xem bài viết nhưng vẫn là bạn bè</p>
                        </div>
                      </div>
                      <div class="center_icon center_icon_prevent">
                        <img class="center_icon_img" src="../img/all_friend_block.svg" alt="Ảnh lỗi">
                        <div>
                          <p>Chặn</p>
                          <p class="center_request_detail">Bạn bè sẽ không thể nhìn thấy bạn hoặc liên hệ với bạn trên Truyền thông văn hóa</p>
                        </div>
                      </div>
                      <div class="center_icon center_icon_cancel">
                        <img class="center_icon_img" src="../img/all_friend_huy.svg" alt="Ảnh lỗi">
                        <div>
                          <p>Hủy kết bạn</p>
                          <p class="center_request_detail">Xóa bạn bè khỏi danh sách bạn bè</p>
                        </div>
                      </div>
                    </div>
                  </p>
                  <p class="center_detail_fr"><img class="center_detail_fr_avt" src="../img/demo.jfif" alt="Ảnh lỗi"> 2 bạn chung</p>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php
      include '../includes/all_friend/cancel_friend.php';
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/all_friend.js?v=<?=$version?>" defer></script>
<script src="../js/caidat.js?v=<?=$version?>" defer></script>
<script src="../js/core.js" defer></script>
</html>
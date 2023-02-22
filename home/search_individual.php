<?php
require_once '../config/config.php';
$type_create = 1;
$type_delete = 1;
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
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version?>">
  <link rel="stylesheet" href="../css/search_individual.css?v=<?=$version?>">
  <title>Tìm kiếm trong trang cá nhân</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">
      <?php include '../includes/cd_sidebar.php' ?>
      <div class="sidebar_index">
        <div class="sidebar_index_header">
          <img class="sidebar_index_icon show_sidebar_24h" src="../img/24h_show_sidebar.svg" alt="Ảnh lỗi">
        </div>
        <div class="sidebar_index_body">
          <p class="sidebar_index_body_title">Kết quả tìm kiếm</p>
          <p class="sidebar_index_body_title2">Trong trang cá nhân</p>
          <form class="sidebar_index_body_search">
            <input class="sidebar_index_body_input" type="text" placeholder="Tìm kiếm">
            <button class="sidebar_index_body_btn"><img src="../img/tim-kiem.svg" alt="Ảnh lỗi"></button>
          </form>
          <p class="sidebar_index_body_filter">Bộ lọc</p>
          <div class="sidebar_index_body_div">
            <p class="sidebar_index_body_title3">Bài viết bạn đã xem</p>
            <div class="collection_setting_checkbox">
              <input id="setting_notify" class="ios8-switch" type="checkbox" class="collection_seeting_checkbox">
              <label for="setting_notify" class="collection_label"></label>
            </div>
          </div>
          <div class="sidebar_index_body_div">
            <p class="sidebar_index_body_title3">Gần đây nhất</p>
            <div class="collection_setting_checkbox">
              <input id="setting_notify1" class="ios8-switch" type="checkbox" class="collection_seeting_checkbox">
              <label for="setting_notify1" class="collection_label"></label>
            </div>
          </div>
          <div class="sidebar_index_body_div">
            <p class="sidebar_index_body_title3">Thời gian đăng</p>
            <button class="sidebar_index_body_div_btn"><img src="../img/next_dropdown.svg" alt="Ảnh lỗi"></button>
            <div class="sidebar_index_body_year">
              <div class="sidebar_index_body_year_detail">
                <?php 
                for ($i=0; $i < 10; $i++) { 
                ?>
                <p class="sidebar_index_body_year_title">Năm 2018</p>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="cdnhanvienc" class="cdnhanvienc">
        <?php
        include '../includes/cd_header.php';
        ?>
        <div id="center">
          <div class="center_list_item">
            <div class="sidebar_768">
              <p class="sidebar_768_title">Kết quả tìm kiếm</p>
              <p class="sidebar_768_title2">Trong trang cá nhân</p>
              <div class="sidebar_768_search">
                <input class="sidebar_768_input" type="text" placeholder="Tìm kiếm">
                <button class="sidebar_index_body_btn"><img src="../img/tim-kiem.svg" alt="Ảnh lỗi"></button>
              </div>
              <p class="sidebar_768_filter">Bộ lọc</p>
              <div class="sidebar_index_body_div sidebar_index_body_div2">
                <p class="sidebar_index_body_title3">Bài viết bạn đã xem</p>
                <div class="collection_setting_checkbox">
                  <input id="setting_notify2" class="ios8-switch" type="checkbox" class="collection_seeting_checkbox">
                  <label for="setting_notify2" class="collection_label"></label>
                </div>
              </div>
              <div class="sidebar_index_body_div sidebar_index_body_div2">
                <p class="sidebar_index_body_title3">Gần đây nhất</p>
                <div class="collection_setting_checkbox">
                  <input id="setting_notify3" class="ios8-switch" type="checkbox" class="collection_seeting_checkbox">
                  <label for="setting_notify3" class="collection_label"></label>
                </div>
              </div>
              <div class="sidebar_index_body_div sidebar_index_body_div2">
                <p class="sidebar_index_body_title3">Thời gian đăng</p>
                <button class="sidebar_index_body_div_btn"><img src="../img/next_dropdown.svg" alt="Ảnh lỗi"></button>
                <div class="sidebar_index_body_year">
                  <div class="sidebar_index_body_year_detail">
                    <?php 
                    for ($i=0; $i < 10; $i++) { 
                    ?>
                    <p class="sidebar_index_body_year_title">Năm 2018</p>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            for ($i=0; $i < 5; $i++) { 
            ?>
            <div class="center_item">
              <div class="center_item_header">
                <img class="center_item_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                <div class="center_item_info">
                  <p class="center_item_name">Phạm Văn Minh</p>
                  <p class="center_item_time">16:00  11/06/2017 . <img class="center_item_time_icon" src="../img/ban-be3.svg" alt="Ảnh lỗi"></p>
                </div>
                <button class="btn_serach_see_more">
                  <img src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                </button>
                <div class="popup_search_indi ep_post_action1_save">
                  <img class="popup_search_indi_icon" src="../img/ep_post_save.svg" alt="Ảnh lỗi">
                  Lưu bài viết
                </div>
              </div>
              <div class="center_item_body">
                <p class="center_item_body_content"> Chúc mừng Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <img class="center_item_body_picture" src="../img/demo.jfif" alt="Ảnh lỗi">
              </div>
              <div class="center_item_body_footer">
                <div class="center_item_count_like">
                  <img src="../img/search_indi_like.svg" alt="Ảnh lỗi">
                  <p class="center_item_count_like_text">Bạn, Mipan Zu Zu và 98 người khác</p>
                </div>
                <div class="center_item_count_cmt">
                  20 Bình luận
                </div>
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
    include '../includes/index_employee/save_post.php';
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/ep_index.js?v=<?= $version ?>" defer></script>
<script src="../js/search_individual.js?v=<?=$version?>" defer></script>
<script src="../js/core.js" defer></script>

</html>
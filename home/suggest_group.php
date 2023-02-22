<?php
require_once '../config/config.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
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
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/suggest_group.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <title>Gợi ý nhóm</title>
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
          <button class="sidebar_index_setting">Cài đặt</button>
          <div class="ep_group_setting">
            <button class="ep_group_setting_cancel"><img src="../img/dong-cai-dat-nhom.svg" alt="Ảnh lỗi"></button>
            <p class="ep_group_setting_text">Cài đặt nhóm</p>
            <p class="ep_group_setting_content">Bạn có thể quản lý cách nhận thông báo về thông tin mới của Nhóm.</p>
            <div class="ep_group_setting_detail ep_group_setting_detail_show">
              <img class="ep_group_setting_icon" src="../img/ep_group_notify.svg" alt="Ảnh lỗi">
              <p class="ep_group_setting_detail_p">Hiển thị thông báo</p>
              <input type="checkbox" name="" id="show_notify" hidden>
              <label for="show_notify" class="show_notify_label"></label>
            </div>
            <div class="ep_group_setting_detail ep_group_setting_custom_notify">
              <img class="ep_group_setting_icon" src="../img/ep_group_setting.svg" alt="Ảnh lỗi">
              Tùy chỉnh thông báo
            </div>
            <div class="ep_group_setting_detail ep_group_setting_ghim_gr">
              <img class="ep_group_setting_icon" src="../img/ep_group_ghim.svg" alt="Ảnh lỗi">
              Ghim
            </div>
            <div class="ep_group_setting_detail ep_group_setting_following">
              <img class="ep_group_setting_icon" src="../img/ep_group_follow.svg" alt="Ảnh lỗi">
              Đang theo dõi
            </div>
            <div class="ep_group_setting_detail ep_group_setting_exit_group">
              <img class="ep_group_setting_icon" src="../img/ep_group_exit.svg" alt="Ảnh lỗi">
              Rời khỏi nhóm
            </div>
          </div>
          <p class="sidebar_index_body_title">Nhóm</p>
          <button class="create_btn_group">+ Tạo nhóm mới</button>
          <div class="group_manager">
            <p class="group_manager_title">Nhóm do bạn quản lý</p>
            <div class="ep_group_list_item">
              <?php
              for ($i = 0; $i < 5; $i++) {
              ?>
                <a href="/nhom-cong-khai.html" class="ep_group_item">
                  <img class="ep_group_item_avt" src="https://images.unsplash.com/photo-1638500551033-a0f60c8e768e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                  <div>
                    <p class="ep_group_name">Nhóm ABC</p>
                    <p class="count_member_group">20 thành viên</p>
                  </div>
                </a>
              <?php
              }
              ?>
            </div>
            <div class="ep_group_join">
              <p class="ep_group_join_title">Nhóm bạn đã tham gia</p>
              <div class="ep_group_join_list_item">
                <?php
                for ($i = 0; $i < 5; $i++) {
                ?>
                  <div class="ep_group_item">
                    <img class="ep_group_item_avt" src="https://images.unsplash.com/photo-1638500551033-a0f60c8e768e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                    <div>
                      <p class="ep_group_name">Nhóm ABC</p>
                      <p class="count_member_group">20 thành viên</p>
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
      <div id="cdnhanvienc" class="cdnhanvienc">
        <?php
        include '../includes/cd_header.php';
        ?>
        <div id="center">
          <p class="center_title">Những nhóm bạn có thể biết</p>
          <div class="center_list_item">
            <?php 
            for ($i=0; $i < 5; $i++) { 
            ?>
            <div class="center_item">
              <img class="center_item_image" src="../img/demo.jfif" alt="Ảnh lỗi">
              <div class="center_item_footer">
                <p class="center_item_footer_title">Hội cuồng đọc sáchHội cuồng đọc sáchHội cuồng đọc sách</p>
                <p class="member_join">900 thành viên</p>
                <p class="member_join">Nhung và 20 người khác đã tham gia</p>
                <div class="center_item_btn">
                  <button class="join_group" data-type="<?=$i?>">Tham gia nhóm</button>
                  <button class="drop_group">Gỡ</button>
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
    include '../includes/popup_index_ep.php';
    include '../includes/index_employee/popup_turn_on_notify.php';
    include '../includes/index_employee/popup_sup_news.php';
    include '../includes/index_employee/popup_success.php';
    include '../includes/index_employee/delete_post.php';
    include '../includes/index_employee/who_comment.php';
    include '../includes/index_employee/object_see_post.php';
    include '../includes/ep_group/setting.php';
    include '../includes/ep_group/create_gr.php';
    include '../includes/ep_group/custom_notify.php';
    include '../includes/ep_group/ghim_group.php';
    include '../includes/ep_group/following.php';
    include '../includes/ep_group/exit_group.php';
    include '../includes/index_employee/save_post.php';
    include '../includes/index_employee/send_with_chat.php';
    include '../includes/index_employee/share_up_group.php';
    include '../includes/index_employee/share_up_invidual.php';
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js"></script>
<script src="../js/ep_index.js?v=<?= $version ?>"></script>
<script src="../js/ep_group.js?v=<?= $version ?>"></script>
<script src="../js/core.js" defer></script>

</html>
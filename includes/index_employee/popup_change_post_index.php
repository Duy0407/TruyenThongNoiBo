<div class="ep_post_action1">
  <div class="ep_post_action1_deatail ep_post_action1_save">
    <?php
    $k = 1;
    if ($k == 0) {
      $img_save = "../img/ep_post_no_save.svg";
      $text_save = "Bỏ lưu bài viết";
    } else {
      $img_save = "../img/ep_post_save.svg";
      $text_save = "Lưu bài viết";
    }
    ?>
    <img src="<?= $img_save ?>" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text"><?= $text_save ?></span>
  </div>
  <div class="ep_post_action1_deatail ep_post_action1_deatail_notify">
    <?php
    $k = 1;
    if ($k == 0) {
      $img_notify = "../img/ep_post_turn_off_notify.svg";
      $text_notify = "Tắt thông báo";
    } else {
      $img_notify = "../img/ep_post_notify.svg";
      $text_notify = "Bật thông báo";
    }
    ?>
    <img src="<?= $img_notify ?>" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text ep_post_turnon_notify"><?= $text_notify ?></span>
  </div>
  <div class="ep_post_action1_deatail ep_post_action1_hide">
    <img src="../img/ep_post_hide_bv.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Ẩn bài viết</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_action1_unfllow">
    <img src="../img/ep_post_unflow.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Bỏ theo dõi Lê Thị Thu</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_action1_hide2">
    <img src="../img/ep_post_temporarily_hide.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Tạm ẩn Lê Thị Thu trong 30 ngày</span>
  </div>
  <div class="ep_post_action1_deatail">
    <img src="../img/ep_post_find_suppost.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text ep_post_turnon_sup">Tìm hỗ trợ hoặc báo cáo bài viết</span>
  </div>
</div>
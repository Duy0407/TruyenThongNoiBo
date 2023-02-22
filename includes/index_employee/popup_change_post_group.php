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
  <div class="ep_post_action1_deatail ep_post_turnon_sup">
    <img src="../img/bao-cao-voi-quan-tri-vien.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Báo cáo bài viết với quản trị viên nhóm</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_action1_hide">
    <img src="../img/an-bai-viet-gr.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Ẩn bài viết</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_action1_hide2">
    <img src="../img/tam-an-user.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Tạm ẩn Đỗ Khánh Tú trong 30 ngày</span>
  </div>
  <div class="ep_post_action1_deatail">
    <img src="../img/an-bai-viet-gr.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Ẩn tất cả từ Đỗ Khánh Tú</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_action1_hide2">
    <img src="../img/tam-an-user.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Tạm ẩn Hội những người thấy ảnh đẹp là download trong 30 ngày</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_action1_unfllow">
    <img src="../img/bo-theo-doi-gr.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Bỏ theo dõi Hội những người thấy ảnh đẹp là download</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_turnon_sup">
    <img src="../img/tim-ho-tro-group.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Tìm hỗ trợ hoặc báo cáo bài viết</span>
  </div>
</div>
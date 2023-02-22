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
  <div class="ep_post_action1_deatail ep_post_who_cmt">
    <img src="../img/who_comment.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Ai có thể bình luận về bài viết của bạn?</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_who_obj">
    <img src="../img/memory_setting_earth.svg" alt="Ảnh lỗi" width="20px" height="20px">
    <span class="ep_post_action1_deatail_text">Chỉnh sửa đối tượng xem bài viết</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_download">
    <img src="../img/tai-xuong-memory.svg" alt="Ảnh lỗi" width="20px" height="20px">
    <span class="ep_post_action1_deatail_text">Tải xuống</span>
  </div>
  <div class="ep_post_action1_deatail ep_post_del_post">
    <img src="../img/icon_del_post.svg" alt="Ảnh lỗi">
    <span class="ep_post_action1_deatail_text">Xóa bài viết</span>
  </div>
</div>
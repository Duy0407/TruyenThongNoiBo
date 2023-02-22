<?
if (isset($_SESSION['login'])){
$id = getValue('id','int','GET',0);;
$select = new db_query("SELECT `customize`,`get_notify` FROM `custom_notification` WHERE `id_user` = ". $_SESSION['login']['id'] ." AND `id_group` = '$id'");
// echo "SELECT `customize` FROM `custom_notification` WHERE `id_user` = ". $_SESSION['login']['id'] ." AND `id_group` = '$id'";
$ass_select = mysql_fetch_assoc($select->result);
?>

<div class="setting_notify">
  <div class="setting_notify_detail">
    <div class="setting_notify_header">
      Cài đặt thông báo 
      <img class="turnoff_popup" src="../img/turnoff_popup.svg" alt="turnoff_popup.svg">
    </div>
    <div class="setting_notify_body">
      <div class="s_n_body_detail">
        <p class="s_n_body_detail_title">Tất cả bài viết</p>
        <p class="s_n_body_detail_des">Mọi bài viết trong nhóm</p>
        <input class="s_n_body_checkbox" type="radio" value="0" name="setting_notify" <?= ($ass_select["customize"] == 0) ? "checked" : "";?>>
      </div>
      <div class="s_n_body_detail">
        <p class="s_n_body_detail_title">Bài viết nổi bật</p>
        <p class="s_n_body_detail_des">Bài viết của bạn bè và bài viết gợi ý</p>
        <input class="s_n_body_checkbox" type="radio" value="1" name="setting_notify" <?= ($ass_select["customize"] == 1) ? "checked" : "";?>>
      </div>
      <div class="s_n_body_detail">
        <p class="s_n_body_detail_title">Bài viết của bạn bè</p>
        <p class="s_n_body_detail_des">Chỉ bài viết của bạn bè</p>
        <input class="s_n_body_checkbox" type="radio" value="2" name="setting_notify" <?= ($ass_select["customize"] == 2) ? "checked" : "";?>>
      </div>
      <div class="s_n_body_detail">
        <p class="s_n_body_detail_title">Tắt</p>
        <p class="s_n_body_detail_des">Chỉ những lượt nhắc và cập nhật quan trọng về cài đặt hoặc quyền riêng tư của nhóm</p>
        <input class="s_n_body_checkbox" type="radio" value="3" name="setting_notify" <?= ($ass_select["customize"] == 3) ? "checked" : "";?>>
      </div>
      <div class="s_n_body_detail">
        <p class="s_n_body_detail_title">Thông báo về yêu cầu làm thành viên</p>
        <p class="s_n_body_detail_des">Nhận thông báo khi có yêu cầu tham gia</p>
        <input type="checkbox" name="send_notify2" id="send_notify2" hidden value="1" <?= ($ass_select["get_notify"] == 1) ? "checked" : "";?>>
        <label style="right: 35px;" for="send_notify2" class="show_notify_label s_n_body_checkbox"></label>
      </div>
      <div class="s_n_btn">
        <button class="s_n_cancel">Hủy</button>
        <button class="s_n_save click_setting_notify" data="<?=$id?>">Lưu</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
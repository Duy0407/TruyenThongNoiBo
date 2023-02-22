<div class="stop_group">
  <div class="setting_notify_detail">
    <div class="setting_notify_header">
      Tạm dừng nhóm <?=$group['group_pause_type'] ?>
      <img class="turnoff_popup" src="../img/turnoff_popup.svg" alt="turnoff_popup.svg">
    </div>
    <div class="setting_notify_body">
      <div class="s_n_body_detail">
        <p class="s_n_body_detail_title">Ai có thể đăng trong nhóm</p>
        <p class="stop_gr_body_content">Khi bạn tạm dừng nhóm, mọi người sẽ chỉ đọc được nội dung trong đó. Một số công cụ có thể bị hạn chế đối với quản trị viên và người kiểm duyệt khi nhóm tạm dừng. Bạn có thể tiếp tục bất cứ lúc nào.</p>
      </div>
      <div>
        <p class="s_n_body_detail_title">Thời gian tạm dừng nhóm</p>
        <div class="stop_group_list_item">
          <div class="stop_group_item">
            <input type="radio" class="stop_group_item_radio" value="1" name="group_pause" <?=($group['group_pause_type'] == 1 || $group['group_pause_type'] == 0) ? "checked" : "";?>>
            <span class="stop_gr_time">Trong 12 giờ</span>
          </div>
          <div class="stop_group_item">
            <input type="radio" class="stop_group_item_radio" value="2" name="group_pause" <?=($group['group_pause_type'] == 2) ? "checked" : "";?>>
            <span class="stop_gr_time">Trong 24 giờ</span>
          </div>
          <div class="stop_group_item">
            <input type="radio" class="stop_group_item_radio" value="3" name="group_pause" <?=($group['group_pause_type'] == 3) ? "checked" : "";?>>
            <span class="stop_gr_time">Trong 3 ngày</span>
          </div>
          <div class="stop_group_item">
            <input type="radio" class="stop_group_item_radio" value="4" name="group_pause" <?=($group['group_pause_type'] == 4) ? "checked" : "";?>>
            <span class="stop_gr_time">Trong 7 ngày</span>
          </div>
          <div class="stop_group_item">
            <input type="radio" class="stop_group_item_radio" value="5" name="group_pause" <?=($group['group_pause_type'] == 5) ? "checked" : "";?>>
            <span class="stop_gr_time">Trong 14 ngày</span>
          </div>
          <div class="stop_group_item">
            <input type="radio" class="stop_group_item_radio" value="6" name="group_pause" <?=($group['group_pause_type'] == 6) ? "checked" : "";?>>
            <span class="stop_gr_time">Trong 30 ngày</span>
          </div>
          <div class="stop_group_item">
            <input type="radio" class="stop_group_item_radio" value="0" name="group_pause">
            <span class="stop_gr_time">Bỏ tạm dừng</span>
          </div>
        </div>
      </div>
      <div class="s_n_btn">
        <button class="s_n_cancel">Hủy</button>
        <button class="s_n_save click_group_pause" data-id="">Lưu</button>
      </div>
    </div>
  </div>
</div>
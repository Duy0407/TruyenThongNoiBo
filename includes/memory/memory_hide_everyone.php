<div class="memory_hide">
  <div class="memory_hide_detail">
    <div class="memory_hide_header">
      Ẩn mọi người
      <img class="turnoff_popup" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
    </div>
    <div class="memory_hide_body">
      <p class="memory_hide_body_title">Ẩn kỷ niệm về mọi người</p>
      <p class="memory_hide_body_cotent">Hãy cho biết bạn không muốn thấy ai trong kỷ niệm của mình. Chúng tôi sẽ không gửi thông báo cho họ.</p>
      <p class="memory_nhapten">Nhập tên</p>
      <select class="input_name" name="" id="" multiple>
        <?php
        foreach ($arr_ep as $key => $value) {
        ?>
        <option value="<?=$key?>"><?=$value['ep_name']?></option>
        <?php
        }
        ?>
      </select>
      <div class="memory_btn">
        <button class="memory_btn_cancel">Hủy</button>
        <button class="memory_btn_save">Lưu</button>
      </div>
    </div>
  </div>
</div>
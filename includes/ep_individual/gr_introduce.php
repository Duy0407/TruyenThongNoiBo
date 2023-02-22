<div class="gr_introduce">
  <div class="gr_introduce_box">
    <div class="gr_introduce_box_header">
      <button class="gr_introduce_title2">Tổng quan</button>
      <button class="gr_introduce_detail">Thông tin chi tiết về bạn</button>
    </div>
    <div class="gr_introduce_box_body">
      <?php
      $k = 2;
      if ($k == 1) {
      ?>
        <div class="gr_introduce_box_detail_info popup_add_work">
          <button class="add_info">
            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
            Thêm nơi làm việc
          </button>
        </div>
        <div class="gr_introduce_box_detail_info popup_edit_add_school">
          <button class="add_info">
            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
            Thêm trường học
          </button>
        </div>
        <div class="gr_introduce_box_detail_info popup_edit_intro_country">
          <button class="add_info">
            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
            Thêm nơi ở hiện tại
          </button>
        </div>
        <div class="gr_introduce_box_detail_info popup_edit_intro_country">
          <button class="add_info">
            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
            Thêm quê quán
          </button>
        </div>
        <div class="gr_introduce_box_detail_info popup_edit_intro_phone">
          <button class="add_info">
            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
            Thêm số điện thoại
          </button>
        </div>
      <?php
      } else {
      ?>
        <div class="gr_introduce_status">
          <img src="../img/noi-lam-viec-icon.svg" alt="Ảnh lỗi">
          <div class="gr_introduce_status_item">
            <p class="gr_intro_regime">Làm việc tại Timviec365.vn</p>
          </div>
          <?php
          if ($type_edit == 0) {
          ?>
          <button class="gr_select_regime">
            <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
            Công khai
            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
          </button>
          <button class="gr_intro_seemore">
            <img src="../img/xem-them.svg" alt="Ảnh lỗi">
          </button>
          <div class="popup_edit_intro">
            <button class="popup_edit_intro_btn popup_add_work">
              <img class="popup_edit_intro_icon" src="../img/them-noi-lam-viec.svg" alt="Ảnh lỗi">
              Thêm mới nơi làm việc
            </button>
            <button class="popup_edit_intro_btn">
              <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
              Chỉnh sửa
            </button>
            <button class="popup_edit_intro_btn popup_delete_work">
              <img class="popup_edit_intro_icon" src="../img/xoa-noi-lam-viec.svg" alt="Ảnh lỗi">
              Xóa nơi làm việc
            </button>
          </div>
          <?php
          }
          ?>
        </div>
        <div class="gr_introduce_status">
          <img src="../img/tung-hoc.svg" alt="Ảnh lỗi">
          <div class="gr_introduce_status_item">
            <p class="gr_intro_regime">Từng học tại Timviec365.vn</p>
          </div>
          <?php
          if ($type_edit == 0) {
          ?>
          <button class="gr_select_regime">
            <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
            Công khai
            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
          </button>
          <button class="gr_intro_seemore">
            <img src="../img/xem-them.svg" alt="Ảnh lỗi">
          </button>
          <div class="popup_edit_intro">
            <button class="popup_edit_intro_btn popup_edit_add_school">
              <img class="popup_edit_intro_icon" src="../img/them-noi-lam-viec.svg" alt="Ảnh lỗi">
              Thêm mới trường học
            </button>
            <button class="popup_edit_intro_btn">
              <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
              Chỉnh sửa trường học
            </button>
            <button class="popup_edit_intro_btn">
              <img class="popup_edit_intro_icon" src="../img/xoa-noi-lam-viec.svg" alt="Ảnh lỗi">
              Xóa trường học
            </button>
          </div>
          <?php
          }
          ?>
        </div>
        <div class="gr_introduce_status">
          <img src="../img/noi-song.svg" alt="Ảnh lỗi">
          <div class="gr_introduce_status_item">
            <p class="gr_intro_regime">Sống tại Hà Nội</p>
          </div>
          <?php
          if ($type_edit == 0) {
          ?>
          <button class="gr_select_regime">
            <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
            Công khai
            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
          </button>
          <button class="gr_intro_seemore">
            <img src="../img/xem-them.svg" alt="Ảnh lỗi">
          </button>
          <div class="popup_edit_intro">
            <button class="popup_edit_intro_btn popup_edit_intro_country">
              <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
              Chỉnh sửa quê quán
            </button>
            <button class="popup_edit_intro_btn">
              <img class="popup_edit_intro_icon" src="../img/xoa-noi-lam-viec.svg" alt="Ảnh lỗi">
              Xóa quê quán
            </button>
          </div>
          <?php
           } 
          ?>
        </div>
        <div class="gr_introduce_status">
          <img src="../img/noi-den.svg" alt="Ảnh lỗi">
          <div class="gr_introduce_status_item">
            <p class="gr_intro_regime">Đến từ Hà Nội</p>
          </div>
          <?php
          if ($type_edit == 0) {
          ?>
          <button class="gr_select_regime">
            <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
            Công khai
            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
          </button>
          <button class="gr_intro_seemore">
            <img src="../img/xem-them.svg" alt="Ảnh lỗi">
          </button>
          <?php
           } 
          ?>
        </div>
        <div class="gr_introduce_status">
          <img src="../img/so-dien-thoai.svg" alt="Ảnh lỗi">
          <div class="gr_introduce_status_item">
            <p class="gr_intro_regime">Số điện thoại 0123 123 123</p>
          </div>
          <?php
          if ($type_edit == 0) {
          ?>
          <button class="gr_select_regime">
            <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
            Công khai
            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
          </button>
          <button class="gr_intro_seemore">
            <img src="../img/xem-them.svg" alt="Ảnh lỗi">
          </button>
          <div class="popup_edit_intro">
            <button class="popup_edit_intro_btn popup_edit_intro_phone">
              <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
              Chỉnh sửa số điện thoại
            </button>
            <button class="popup_edit_intro_btn popup_edit_del_phone">
              <img class="popup_edit_intro_icon" src="../img/xoa-noi-lam-viec.svg" alt="Ảnh lỗi">
              Xóa số điện thoại
            </button>
          </div>
          <?php
           } 
          ?>
        </div>
        <div class="gr_introduce_status">
          <img src="../img/zmdi_email.svg" alt="Ảnh lỗi">
          <div class="gr_introduce_status_item">
            <p class="gr_intro_regime">Emai Phamvanminh123123@gmail.com</p>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="gr_introduce_box_detail">
      <div class="gr_info_basic">
        <p class="gr_info_basic_title">Thông tin cơ bản</p>
        <div class="gr_info_basic_detail">
          <div class="gr_info_basic_icon">
            <img class="gr_info_basic_img" src="../img/gioi-tinh.svg" alt="Ảnh lỗi">
            Giới tính nữ
          </div>
          <?php
          if ($type_edit == 0) {
          ?>
          <button class="gr_select_regime">
            <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
            Công khai
            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
          </button>
          <button class="gr_intro_seemore">
            <img src="../img/chinh-sua.svg" alt="Ảnh lỗi">
          </button>
          <?php
           } 
          ?>
        </div>
        <div class="gr_info_basic_detail">
          <div class="gr_info_basic_icon">
            <img class="gr_info_basic_img" src="../img/sinh-nhat.svg" alt="Ảnh lỗi">
            Ngày sinh 30 tháng 02 năm 2001
          </div>
          <?php
          if ($type_edit == 0) {
          ?>
          <button class="gr_select_regime">
            <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
            Công khai
            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
          </button>
          <button class="gr_intro_seemore">
            <img src="../img/chinh-sua.svg" alt="Ảnh lỗi">
          </button>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="gr_info_basic">
        <p class="gr_info_basic_title">Thông tin chi tiết</p>
        <div class="gr_info_basic_detail">
          <div class="gr_info_basic_icon">
           Giới thiệu về bản thân: Download the SVG to use or edit.
          </div>
          <?php
          if ($type_edit == 0) {
          ?>
          <button class="gr_select_regime">
            <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
            Công khai
            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
          </button>
          <button class="gr_intro_edit_intro">
            <img src="../img/chinh-sua.svg" alt="Ảnh lỗi">
          </button>
          <?php
          }
          ?>
        </div>
        <?php
        if ($type_edit == 0) {
        ?>
        <div class="gr_introduce_box_detail_info create_nickname">
          <button class="add_info">
            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
            Thêm biệt danh
          </button>
        </div>
        <div class="gr_introduce_box_detail_info create_quote">
          <button class="add_info">
            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
            Thêm trích dẫn yêu thích
          </button>
        </div>
        <?php
         } 
        ?>
      </div>
    </div>
  </div>
</div>
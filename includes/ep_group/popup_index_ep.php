<div class="popup_post popup_post_new_gr" style="display: none;">
  <form class="form_popup_post_new" action="">
    <div class="popup_post_new_header">
      <p class="title_post_new">Tải ảnh/video/tệp</p>
      <img class="hide_popup" src="../img/hide_popup.svg" alt="Ảnh lỗi">
    </div>
    <div class="popup_post_new_body">
      <div class="popup_post_new_body1">
        <img class="avt_user-item" src="<?= $_SESSION['login']['logo'] ?>" alt="Ảnh lỗi">
        <div class="info_post_new">
          <p class="info_post_username">Phạm Văn Minh <span class="info_post_feel"></span></p>
          <?php
          if (isset($regime_gr)) {
            if ($regime_gr == 0) {
            ?>
            <button class="btn_upload_regime" type="button">
              <img src="../img/ep_group_pulic_icon.svg" alt="Ảnh lỗi">
              Nhóm
            </button>
            <?php
            }else{
            ?>
            <button class="btn_upload_regime" type="button">
              <img src="../img/gis_earth-australia-o.svg" alt="Ảnh lỗi">
              Công khai 
            </button>
            <?php
            }
          }else{
          ?>
          <button class="btn_upload_regime" type="button">
            <img src="../img/gis_earth-australia-o.svg" alt="Ảnh lỗi">
            Công khai
            <img class="ls_dropdown_ep_index" src="../img/ls_dropdown_ep_index.svg" alt="Ảnh lỗi">
          </button>
          <?php
          }
          ?>
        </div>
      </div>
      <div contenteditable="true" cvo-placeholder="Hãy viết cảm nghĩ của bạn" class="form_post_new_content"></div>
      <div class="upload_file">
        <div class="upload_file_item" style="display: block;">
          <img class="upload_file_item_icon" src="../img/post_new_upload_file.svg" alt="Ảnh lỗi">
          <p class="upload_file_item_title">Thêm ảnh/video/tệp</p>
        </div>
      </div>
      <div class="add_new_post">
        <div class="add_new_post_icon add_new_post_icon_feel">
          <img src="../img/icon_post_footer_active.svg" alt="Ảnh lỗi">
        </div>
        <div class="add_new_post_icon add_new_post_icon_file">
          <img src="../img/upload_file.svg" alt="Ảnh lỗi">
        </div>
        <div class="add_new_post_icon add_new_post_mention">
          <img src="../img/post_feel_user_tag.svg" alt="Ảnh lỗi">
        </div>
        <p class="add_new_post_p">Thêm vào bài viết</p>
      </div>
      <input class="upload_file_post_new" type="file" multiple hidden>
      <input class="upload_file_post_new2" type="file" multiple hidden>
      <div class="post_new_action">
        <button class="post_new_btn post_new_btn_del" type="button">Hủy</button>
        <button class="post_new_btn post_new_btn_submit">Đăng</button>
      </div>
    </div>
  </form>
</div>

<div class="popup_regime">
  <div class="popup_regime_detail">
    <div class="popup_regime_header">
      Chế độ
      <img class="turnoff_popup_regime" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
    </div>
    <div class="popup_regime_body">
      <p class="popup_regime_body_title">Ai có thể xem bài viết của bạn?</p>
      <p class="popup_regime_body_title2">Bài viết của bạn sẽ hiển thị ở Bảng tin, trang cá nhân và kết quả tìm kiếm.</p>
      <div class="popup_regime_list_item">
        <button class="popup_regime_item popup_regime_item1">
          <div class="popup_regime_item_icon">
            <img src="../img/gis_earth-australia-o(2).svg" alt="Ảnh lỗi">
          </div>
          <div class="popup_regime_item_detail">
            <p class="popup_regime_item_text">Công khai</p>
          </div>
          <input class="regime_radio" type="radio" name="regime_select">
        </button>
        <button class="popup_regime_item popup_regime_item1">
          <div class="popup_regime_item_icon">
            <img src="../img/group(1)1.svg" alt="Ảnh lỗi">
          </div>
          <div class="popup_regime_item_detail">
            <p class="popup_regime_item_text">Bạn bè</p>
          </div>
          <input class="regime_radio" type="radio" name="regime_select">
        </button>
        <button class="popup_regime_item popup_regime_item2 setting_private-card1">
          <div class="popup_regime_item_icon">
            <img src="../img/group(1)2.svg" alt="Ảnh lỗi">
          </div>
          <div class="popup_regime_item_detail">
            <p class="popup_regime_item_text2">Bạn bè ngoại trừ...</p>
            <p class="popup_regime_item_text3">Bạn bè; Ngoại trừ: Long Nguyễn </p>
          </div>
          <img class="regime_radio" src="../img/ic_sharp-navigate-next.svg" alt="ic_sharp-navigate-next.svg">
        </button>
        <button class="popup_regime_item popup_regime_item1">
          <div class="popup_regime_item_icon">
            <img src="../img/bx_bxs-lock-alt2.svg" alt="Ảnh lỗi">
          </div>
          <div class="popup_regime_item_detail">
            <p class="popup_regime_item_text">Chỉ mình tôi</p>
          </div>
          <input class="regime_radio" type="radio" name="regime_select">
        </button>
        <button class="popup_regime_item popup_regime_item2 setting_private-card2">
          <div class="popup_regime_item_icon">
            <img src="../img/group(1)3.svg" alt="Ảnh lỗi">
          </div>
          <div class="popup_regime_item_detail">
            <p class="popup_regime_item_text2">Bạn bè cụ thể</p>
            <p class="popup_regime_item_text3">Hiển thị với một số bạn bè </p>
          </div>
          <img class="regime_radio" src="../img/ic_sharp-navigate-next.svg" alt="ic_sharp-navigate-next.svg">
        </button>
      </div>
      <div class="popup_regime_btn">
        <button class="popup_regime_cancel">Hủy</button>
        <button class="popup_regime_save">Lưu</button>
      </div>
    </div>
  </div>
</div>

<div class="p_feel">
  <div class="p_feel_detail">
    <div class="p_feel_header">
      Cảm xúc/Hoạt động
      <img class="turnoff_popup_feel" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
    </div>
    <div class="p_feel_body">
      <div>
        <button class="p_feel_text">Cảm xúc</button>
        <button class="p_active_text">Hoạt động</button>
        <div class="p_feel_block">
          <input type="text" class="p_feel_search" placeholder="Tìm kiếm">
          <img class="p_feel_icon" src="../img/Vector_feel_search.svg" alt="Ảnh lỗi">
        </div>
        <div class="feel_list_item">
          <?php
          for ($i = 0; $i < count($data_feel); $i++) {
          ?>
            <button class="feel_item">
              <img class="feel_icon" src="<?= $data_feel[$i]['icon'] ?>" alt="Ảnh lỗi">
              <p class="fell_name"><?= $data_feel[$i]['text'] ?></p>
            </button>
          <?php
          }
          ?>
        </div>
        <div class="activity_list_item">
          <?php
          for ($i = 0; $i < count($data_activity); $i++) {
          ?>
            <button class="activity_item">
              <img class="feel_icon" src="<?= $data_activity[$i]['icon'] ?>" alt="Ảnh lỗi">
              <?= $data_activity[$i]['text'] ?>
            </button>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="name_metion">
  <div class="name_metion_detail">
    <div class="name_metion_search">
      <input class="name_metion_input" type="text" placeholder="Tìm kiếm tên bạn bè">
      <img class="name_metion_icon" src="../img/Vector_feel_search.svg" alt="Ảnh lỗi">
    </div>
    <div class="name_metion_body">
      <?php
      for ($i=0; $i < 10; $i++) { 
      ?>
      <button class="name_mention_item">
        <img class="name_metion_avt" src="https://images.unsplash.com/photo-1607309844132-a3d2aabb289b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
        Lê Thị Thu
        <input class="name_mention_checkbox" type="checkbox" hidden>
      </button>
      <?php
      }
      ?>
    </div>
    <button class="name_mention_btn">Thêm</button>
  </div>
</div>
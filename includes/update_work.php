<div class="baiviet-header">
  <form class="tren" id="form_newfeed">
    <div class="img avt">
      <img class="v_avatar_user1" src="<?= $_SESSION['login']['logo'] ?>" onerror='this.onerror=null;this.src="../img/logo_com.png";'>
    </div>
    <div class="capnhat">
      <input type="text" name="" id="title_post_newfeed_1" autocomplete="Off" placeholder="Cập nhật công việc với các đồng nghiệp của bạn">
    </div>
    <div class="btn ">
      <button class="update_work_btn">
        <span class="update_work_span">Đăng</span>
        <img class="update_work_loading" src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi">
      </button>
    </div>
  </form>
  <div class="duoi" id="duoi1">
    <div class="duoi taianh l_open_model_post">
      <img src="../img/icon_anh.png">
      <span class="v_open_model_post_span">Tải lên ảnh/video/tệp</span>
    </div>
    <div class=" duoi nhacten v_nhacten l_open_model_post">
      <div class="v_nhacten_detail">
        <img class="v_nhacten_img" src="../img/icon_nhac.png">
        <span class="v_nhacten_span v_open_model_post_span">Nhắc tên thành viên</span>
      </div>
      <div class="v_popup_nhacten">
      </div>
    </div>
    <div class="cd-popup model_560 " id="model_dangtin">
      <div class="cd_container">
        <div class="cd_modal">
          <div class="cd_modal_header">
            <h4 class="name_header">Tải ảnh/video/tệp</h4>
            <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl" id="close_post_newfeed">
          </div>
          <div class="modal_body_post_newfeed">
            <div class="model_top_post_newfeed">
              <div class="img_model_top">
                <img src="<?= $_SESSION['login']['logo'] ?>" class="img_model_top_item" alt="avatar">
              </div>
              <div class="text_model_top">
                <div class="model_user_name"><?= $_SESSION['login']['name']; ?></div>
                <div class="model_com_name"><?= $arr_com->com_name; ?></div>
              </div>
            </div>
            <form id="form_popup_dangtin" class="model_center_post_newfeed" data-type="0">
              <div class="model_center_post_newfeed_item">
                <input type="text" class="title_post_newfeed" id="title_post_newfeed_2" autocomplete="Off" name="" id="" placeholder="Cập nhật công việc với các đồng nghiệp của bạn">
              </div>
              <div class="model_center_post_newfeed_item">
                <div class="view_img" id="view_img">
                  <div class="view_img_item1">
                    <label for="open_file_newfeed" class="label_file">
                      <img src="../img/open_file_nf.svg" alt="openfile">
                      <p class="text_image_up_file">Thêm ảnh/video/tệp</p>
                    </label>
                    <div class="close_file_newfeed">
                      <img src="../img/close_file_newfeed.svg" alt="img close">
                    </div>
                  </div>
                </div>
              </div>
              <input type="file" name="" id="open_file_newfeed" multiple>
              <input type="file" name="" id="open_file_newfeed2" multiple hidden>
              <div class="model_center_post_newfeed_item" id="view_file_nf"></div>
              <div class="model_center_post_newfeed_item" id="view_list_ep" style="display: none;">
                <select name="" id="select_list_ep" class="select_list_ep" multiple>
                  <?
                  foreach ($arr_ep as $value) {
                  ?>
                    <option value="<?= $value['ep_id'] ?>"><?= $value['ep_name'] ?></option>
                  <?
                  }
                  ?>
                </select>
              </div>
              <div class="model_center_post_newfeed_item">
                <div class="option_add_new_feed">
                  <div>Thêm vào bài viết</div>
                  <div>
                    <label for="" class="upload_file_add3">
                      <img src="../img/icon_anh.png" class="custom_img_option">
                    </label>
                    <img src="../img/icon_nhac.png" id="tag_ep_newfeed" class="custom_img_option">
                    <label class="upload_file_add3">
                      <img src="../img/up_file.svg" class="custom_img_option">
                    </label>
                  </div>
                </div>
              </div>
              <div class="model_center_post_newfeed_item post_newfeed_custom">
                <button class="model_center_post_newfeed_btn" type="button" id="bth_cancel_model_newfeed">Hủy</button>
                <button class="model_center_post_newfeed_btn model_center_post_newfeed_btn_custom">
                  <span class="update_work_span2">Đăng</span>
                  <img class="update_work_loading2" src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi">
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class=" duoi tuychinh" id="tuychinh_d">
      <img src="../img/icon_tuychinh.png">
      <span class="v_open_model_post_span">Tùy chỉnh đăng tin</span>
      <div class="popup-tuychinh_d" id="popup-tuychinh_d">
        <div class="ul_model">
          <div class="li_model" id="nut-sda">
            <img src="../img/tuychinh_1.png" class="v_list_new_feed" alt="Ảnh lỗi">
            <p class="p_model">Tạo thông báo</p>
          </div>
          <div class="li_model" id="nut-cdtvm">
            <img src="../img/tuychinh_2.png" class="v_list_new_feed" alt="Ảnh lỗi">
            <p class="p_model">Chào đón thành viên mới</p>
          </div>
          <div class="li_model" id="nut-tsk">
            <img src="../img/tuychinh_3.png" class="v_list_new_feed" alt="Ảnh lỗi">
            <p class="p_model">Tạo sự kiện</p>
          </div>
          <div class="li_model" id="nut-ttl">
            <img src="../img/tuychinh_4.png" class="v_list_new_feed" alt="Ảnh lỗi">
            <p class="p_model">Tạo thảo luận</p>
          </div>
          <div class="li_model" id="nut-csyt">
            <img src="../img/tuychinh_5.png" class="v_list_new_feed" alt="Ảnh lỗi">
            <p class="p_model">Chia sẻ ý tưởng</p>
          </div>
          <div class="li_model" id="nut-tbc">
            <img src="../img/tuychinh_6.png" class="v_list_new_feed" alt="Ảnh lỗi">
            <p class="p_model">Tạo bình chọn</p>
          </div>
          <div class="li_model" id="nut-tkt">
            <img src="../img/tuychinh_7.png" class="v_list_new_feed" alt="Ảnh lỗi">
            <p class="p_model">Tạo khen thưởng</p>
          </div>
          <div class="li_model" id="nut-ttnb">
            <img src="../img/tuychinh_8.png" class="v_list_new_feed" alt="Ảnh lỗi">
            <p class="p_model">Tạo tin tức nội bộ</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
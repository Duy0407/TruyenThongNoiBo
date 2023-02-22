<header>
  <div class="v_header">
    <ul class="v_header_list">
      <li class="v_header_item">
        <img src="../img/caidatnhanvien/mes.png" alt="Ảnh lỗi">
      </li>
      <li class="v_header_item">
        <img src="../img/caidatnhanvien/chamthan.png" alt="Ảnh lỗi">
      </li>
      <li class="v_header_item">
        <img class="v_header_item_notify" src="../img/caidatnhanvien/ring.png" alt="Ảnh lỗi">
      </li>
      <li class="v_header_info_user">
        <img class="v_header_info_user_avatar" src="<?=$_SESSION['login']['logo']?>" alt="Ảnh lỗi">
        <span class="v_header_info_user_name"><?=$_SESSION['login']['name']?></span>
        <span class="v_header_info_user_id">ID: <?=$_SESSION['login']['id']?></span>
        <img class="v_header_info_user_dropdown" src="../img/v_dropdown_menu.svg" alt="Ảnh lỗi">
        <div class="v_header_popup_info">
          <div class="v_header_popup_avatar">
            <img src="<?=$_SESSION['login']['logo']?>" alt="Ảnh lỗi">
          </div>
          <div class="v_header_info2">
            <p class="v_header_info_user_name2"><?=$_SESSION['login']['name']?></p>
            <p class="v_header_info_user_id2">ID: <?=$_SESSION['login']['id']?></p>
            <a class="v_header_info_link">
              <div class="v_header_info_link_icon">
                <img class="v_header_info_link_icon_img" src="../img/v_header_info_acc.svg" alt="Ảnh lỗi">
              </div>
              <span class="v_header_info_link_span">Thông tin tài khoản</span>
              <div class="v_header_info_link_dropright">
                <img class="v_header_info_link_dropright_icon" src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
              </div>
            </a>
            <a class="v_header_info_link">
              <div class="v_header_info_link_icon">
                <img class="v_header_info_link_icon_img" src="../img/v_header_menu_danhgia.svg" alt="Ảnh lỗi">
              </div>
              <span class="v_header_info_link_span">Đánh giá</span>
              <div class="v_header_info_link_dropright">
                <img class="v_header_info_link_dropright_icon" src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
              </div>
            </a>
            <a class="v_header_info_link">
              <div class="v_header_info_link_icon">
                <img class="v_header_info_link_icon_img" src="../img/v_header_menu_error.svg" alt="Ảnh lỗi">
              </div>
              <span class="v_header_info_link_span">Báo lỗi</span>
              <div class="v_header_info_link_dropright">
                <img class="v_header_info_link_dropright_icon" src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
              </div>
            </a>
            <a class="v_header_info_link">
              <div class="v_header_info_link_icon">
                <img class="v_header_info_link_icon_img" src="../img/v_header_menu_huongdan.svg" alt="Ảnh lỗi">
              </div>
              <span class="v_header_info_link_span">Hướng dẫn</span>
              <div class="v_header_info_link_dropright">
                <img class="v_header_info_link_dropright_icon" src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
              </div>
            </a>
            <a class="v_header_info_link v_header_info_link_logout">
              <div class="v_header_info_link_icon">
                <img class="v_header_info_link_icon_img" src="../img/v_header_menu_logout.svg" alt="Ảnh lỗi">
              </div>
              <span class="v_header_info_link_span">Đăng xuất</span>
              <div class="v_header_info_link_dropright">
                <img class="v_header_info_link_dropright_icon" src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
              </div>
            </a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</header>

<div class="v_logout">
  <div class="v_logout_img">
    <img src="../img/img34.png" alt="Ảnh lỗi">
  </div>
  <p class="v_logout_text">Đăng xuất</p>
  <p class="v_logout_text2">Bạn chắc chắn muốn đăng xuất?</p>
  <div class="v_logout_btn">
    <button class="v_logout_cancel">Hủy</button>
    <button class="v_logout_out">
      <span class="v_logout_out_span">Đăng xuất</span>
      <img class="v_logout_out_img" src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi">
    </button>
  </div>
</div>
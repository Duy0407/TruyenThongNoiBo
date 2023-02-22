<div class="add_admin">
  <div class="add_admin_detail">
    <div class="add_admin_header">
      Thêm quản trị viên
      <img class="turnoff_popup" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
    </div>
    <div class="add_admin_body">
      <form class="form_add_admin">
        <input class="add_admin_search" type="text" placeholder="Tìm kiếm bạn bè">
        <button class="add_admin_search_btn"><img src="../img/add_admin_search.svg" alt="add_admin_search.svg"></button>
      </form>
      <div class="add_admin_card">
        <p class="add_admin_card_title">Được đề xuất</p>
        <div class="add_admin_list_item">
            <?php
            for ($i=0; $i < 7; $i++) { 
            ?>
            <div class="add_admin_item">
              <img class="add_admin_item_avt" src="https://images.unsplash.com/photo-1512620230221-c041ac15d906?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="ẢNh lỗi">
              <div class="add_admin_item_detail">
                <p class="add_admin_item_name">Mộc Ly Tâm</p>
                <p class="add_admin_item_info">20 bạn chung</p>
              </div>
              <?php
              if ($i % 2 == 0) {
              ?>
              <button class="add_admin_item_btn">Đã gửi lời mời</button>
              <?php
              }else{
              ?>
              <button class="add_admin_item_btn2">Mời</button>
              <?php
              }
              ?>
            </div>
            <?php
            }
            ?>
        </div>
        <button class="add_admin_cancel">Đóng</button>
      </div>
    </div>
  </div>
</div>

<div class="invite_success">
  <div class="invite_success_detail">
    <div class="invite_success_header">
      Mời Tâm làm người Quản trị viên
      <img class="turnoff_popup_invite_success" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
    </div>
    <div class="invite_success_body">
      <p class="invite_success_content">
        Nếu Tâm chấp nhận lời mời, cô ấy sẽ có thể thêm hoặc xóa quản trị viên và người kiểm duyệt, chỉnh sửa cài đặt nhóm cũng như làm nhiều việc khác.
      </p>
      <div class="invite_success_btn">
        <button class="invite_success_cancel">Hủy</button>
        <button class="invite_success_invite">Gửi lời mời</button>
      </div>
    </div>
  </div>
</div>
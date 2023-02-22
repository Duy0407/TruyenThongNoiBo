<div class="object">
  <div class="object_detail">
    <div class="obj_header">
      Đối tượng xem bài viết
      <img class="turnoff_popup" src="../img/turnoff_popup.svg" alt="turnoff_popup.svg">
    </div>
    <div class="obj_body">
      <p class="obj_body_title">Ai có thể xem bài viết của bạn?</p>
      <p class="obj_body_des">Bài viết của bạn sẽ hiển thị ở Bảng tin, trang cá nhân và kết quả tìm kiếm.</p>
      <div class="obj_body_detail">
          <img class="obj_body_icon" src="../img/memory_setting_earth.svg" alt="Ảnh lỗi">
          Công khai
          <input type="radio" class="obj_input" name="obj">
      </div>
      <div class="obj_body_detail">
          <img class="obj_body_icon" src="../img/memory_setting_friend.svg" alt="Ảnh lỗi">
          Bạn bè
          <input type="radio" class="obj_input" name="obj">
      </div>
      <div class="obj_body_detail obj_body_specific_friend">
          <img class="obj_body_icon" src="../img/memory_setting_ngoaitru.svg" alt="Ảnh lỗi">
          Bạn bè ngoại trừ
          <img class="obj_input" src="../img/memory_setting_dropright.svg" alt="Ảnh lỗi">
      </div>
      <div class="obj_body_detail">
          <img class="obj_body_icon" src="../img/memory_lock.svg" alt="Ảnh lỗi">
          Chỉ mình tôi
          <input type="radio" class="obj_input" name="obj">
      </div>
      <div class="obj_body_detail obj_body_except_friend">
          <img class="obj_body_icon" src="../img/memory_setting_banbecuthe.svg" alt="Ảnh lỗi">
          <div>
            <p class="obj_body_detail_text">Bạn bè cụ thể</p>
            <p class="obj_body_detail_des">Hiển thị với một số bạn bè</p>
          </div>
          <img class="obj_input" src="../img/memory_setting_dropright.svg" alt="Ảnh lỗi">
      </div>
    </div>
  </div>
</div>

<div class="specific">
  <div class="specific_detail">
    <div class="specific_header">
      Bạn bè cụ thể
      <img class="turnoff_popup" src="../img/turnoff_popup.svg" alt="turnoff_popup.svg">
    </div>
    <div class="specific_body">
      <div class="specific_body_box_search">
        <input class="specific_body_search" type="text" placeholder="Tìm kiếm bạn bè">
        <img class="specific_search" src="../img/specific_search.svg" alt="Ảnh lỗi">
      </div>
      <div class="specific_body_title">Bạn bè</div>
      <div class="specific_body_friend">
        <?php
        for ($i=0; $i < 5; $i++) { 
        ?>
        <div class="specific_body_friend_detail">
          <img class="specific_body_friend_avt" src="https://images.unsplash.com/photo-1638218022343-3158d732f5b8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" alt="Ảnh lỗi">
          Lê Thị Thu
          <img class="check_friend" src="../img/check_friend.svg" alt="check_friend.svg">
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
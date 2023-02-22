<div class="send_with_chat">
   <div class="send_with_chat_detail">
      <div class="send_with_chat_header">
         Gửi bằng chat
         <img class="turnoff_send_with_chat" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
      </div>
      <div class="send_with_chat_body">
         <div class="post_share share_gr">
            <img class="share_gr_image" src="../img/demo.jfif" alt="Ảnh lỗi">
            <div class="share_gr_box">
               <p class="share_gr_box_name">Nhóm ABC</p>
               <p class="share_gr_box_regime">Nhóm công khai . 200 thành viên</p>
            </div>
         </div>
         <div class="send_with_chat_item">
            <input type="text" class="send_with_chat_mess" placeholder="Nhập tin nhắn của bạn">
            <div class="send_with_chat_search_box">
               <input type="text" class="send_with_chat_search" placeholder="Tìm kiếm">
               <img class="search_icon" src="../img/tim-kiem.svg" alt="Ảnh lỗi">
            </div>
            <p class="send_with_chat_item_title">Gần đây</p>
            <div class="friend_recently">
               <?php
               for ($i = 0; $i < 3; $i++) {
               ?>
                  <div class="friend_recently_item">
                     <img class="friend_recently_item_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                     <p class="friend_recently_item_name">Mipan Zu Zu</p>
                     <button class="friend_recently_item_btn">Gửi</button>
                  </div>
               <?php
               }
               ?>
            </div>
            <p class="send_with_chat_item_title">Nhóm</p>
            <div class="friend_recently">
               <?php
               for ($i = 0; $i < 3; $i++) {
               ?>
                  <div class="friend_recently_item">
                     <img class="friend_recently_item_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                     <p class="friend_recently_item_name">Mipan Zu Zu</p>
                     <button class="friend_recently_item_btn">Gửi</button>
                  </div>
               <?php
               }
               ?>
            </div>
         </div>
      </div>
   </div>
</div>
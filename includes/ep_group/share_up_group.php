<div class="share_up_group">
    <div class="share_up_group_detail">
        <div class="share_up_group_header">
            Chia sẻ lên nhóm
            <img class="turnoff_share_up_group" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="share_up_group_body">
            <div class="share_up_group_body_detail">
                <div class="share_up_group_search">
                    <input type="text" class="share_up_group_input" placeholder="Tìm kiếm">
                    <img class="share_up_group_icon" src="../img/tim-kiem.svg" alt="Ảnh lỗi">
                </div>
                <p class="send_with_chat_item_title">Gần đây</p>
                <div class="friend_recently">
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                    ?>
                        <div class="friend_recently_item share_up_group_avt2">
                            <img class="friend_recently_item_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                            <div class="share_up_group_info">
                                <p class="friend_recently_item_name">Mipan Zu Zu</p>
                                <p class="share_up_group_regime">Nhóm công khai</p>
                            </div>
                            <button class="share_up_group_btn"><img src="../img/drop_right.svg" alt="Ảnh lỗi"></button>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
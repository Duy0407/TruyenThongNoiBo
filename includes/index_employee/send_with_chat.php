<div class="send_with_chat" data-my_id_chat=<?=$my_id_chat?>>
    <div class="send_with_chat_detail">
        <div class="send_with_chat_header">
            Gửi bằng chat
            <img class="turnoff_send_with_chat" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="send_with_chat_body">
            <div class="post_share">
                <?php
                for ($i=0; $i < 3; $i++) { 
                ?>
                    <div class="post_share_file">
                        <p class="post_share_file_title">Báo cáo công việc ABC.xlsx</p>
                        <p class="post_share_file_time">121KB 10:03, 07/09/2021</p>
                    </div>
                <?php
                }
                ?>
                <div class="post_share_img_box">
                    <?php
                    for ($i=0; $i < 4; $i++) { 
                    ?>
                        <img class="post_share_img" src="../img/demo.jfif" alt="Ảnh lỗi">
                    <?php
                    }
                    ?>
                    <div class="post_share_img_box_more">
                        <span class="post_share_img_box_more_span">+5</span>
                    </div>
                </div>
                <div class="post_share_content">
                    <p class="post_share_content_title">Hội những người thấy ảnh đẹp là download</p>
                    <p class="post_share_content_time">3 giờ . <img src="../img/cong-khai-icon.svg" alt="Ảnh lỗi"></p>
                    <p class="post_share_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
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
                    <?php foreach ($my_friend as $key => $value) { ?>
                    <div class="friend_recently_item">
                        <img class="friend_recently_item_avt" src="<?=$value["avatarUser"]?>" alt="Ảnh lỗi">
                        <p class="friend_recently_item_name"><?=$value["userName"]?></p>
                        <button class="friend_recently_item_btn" data-id_chat=<?=$value['id']?>>Gửi</button>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <p class="send_with_chat_item_title">Nhóm</p>
                <div class="friend_recently">
                    <?php foreach ($arr_gr_chat as $key => $value) { ?>
                    <div class="friend_recently_item">
                        <img class="friend_recently_item_avt" src="<?=$value['linkAvatar']?>" alt="Ảnh lỗi">
                        <p class="friend_recently_item_name"><?=$value['conversationName']?></p>
                        <button class="friend_recently_item_btn" data-conversationid=<?=$value['conversationId']?>>Gửi</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
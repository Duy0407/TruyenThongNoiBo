<div class="share_up_invidual">
    <div class="share_up_invidual_detail">
        <div class="share_up_invidual_header">
            Chia sẻ lên trang cá nhân của bạn bè
            <img class="turnoff_share_up_invidual" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="share_up_invidual_body">
            <div class="share_up_group_body_detail">
                <div class="share_up_group_search">
                    <input type="text" class="share_up_group_input" placeholder="Tìm kiếm">
                    <img class="share_up_group_icon" src="../img/tim-kiem.svg" alt="Ảnh lỗi">
                </div>
                <p class="send_with_chat_item_title">Tất cả bạn bè</p>
                <div class="friend_recently">
                    <?php foreach ($my_friend as $value) { ?>
                        <div class="friend_recently_item ep_share_news_gr" data-ep_id="<?=$value['id365']?>">
                            <img class="friend_recently_item_avt" src="<?=($value['avatarUser']!='')?$value['avatarUser']:"/img/logo_com.png"?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                            <p class="friend_recently_item_name"><?=$value['userName']?></p>
                            <button class="share_up_group_btn"><img src="../img/drop_right.svg" alt="Ảnh lỗi"></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
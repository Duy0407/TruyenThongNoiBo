<div class="setting">
    <div class="setting_detail">
        <div class="setting_deatail_header">
            Cài đặt
            <img class="turnoff_popup" src="../img/turnoff_popup.svg" alt="turnoff_popup.svg">
        </div>
        <div class="setting_deatail_body">
            <div class="setting_action">
                <button class="setting_action_btn">Cài đặt kho lưu trữ tin</button>
                <button class="setting_action_btn">Tin bạn đã tắt</button>
                <button class="setting_action_btn">Quyền riêng tư của tin</button>
            </div>
            <div class="setting_show">
                <div class="setting_action_save">Lưu vào Kho lưu trữ</div>
                <div class="setting_action_content">Tự động lưu trữ ảnh và video sau khi chúng biến mất khỏi tin của
                    bạn. Chỉ có bạn mới xem được kho lưu trữ tin của mình.</div>
                <button class="setting_turn_off">Tắt kho lưu trữ tin</button>
            </div>
            <div class="setting_show setting_show_user" style="display: none;">
                <?php
        for ($i = 0; $i < 5; $i++) {
        ?>
                <div class="setting_show2_detail">
                    <img class="setting_show2_img"
                        src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80"
                        alt="Ảnh lỗi">
                    <p class="setting_show2_name">Phạm Văn Minh</p>
                    <button class="setting_show2_btn">Bật lại</button>
                </div>
                <?php
        }
        ?>
            </div>
            <div class="setting_show setting_show_private" style="display: none;">
                <p class="setting_show_who">Ai có thể xem tin của bạn?</p>
                <p class="setting_show_time">Tin của bạn sẽ hiển thị trong 24 giờ.</p>
                <div class="setting_private-item">
                    <div class="setting_private-card">
                        <img class="setting_show_icon" src="../img/icon_index_friend_congkhai.svg"
                            alt="post_congkhai.svg">
                        Công khai
                        <input type="radio" name="select_setting" class="select_setting">
                    </div>
                    <div class="setting_private-card">
                        <img class="setting_show_icon" src="../img/icon_index_friend_private.svg"
                            alt="icon_regime_friend.svg">
                        Bạn bè
                        <input type="radio" name="select_setting" class="select_setting">
                    </div>
                    <div class="setting_private-card setting_private-card1">
                        <img class="setting_show_icon" src="../img/icon_index_friend_private2.svg"
                            alt="post_congkhai.svg">
                        Bạn bè ngoại trừ...
                        <img class="select_setting" src="../img/index_friend_dropright.svg" alt="Ảnh lỗi">
                    </div>
                    <div class="setting_private-card">
                        <img class="setting_show_icon" src="../img/icon_index_friend_lock.svg" alt="post_congkhai.svg">
                        Chỉ mình tôi
                        <input type="radio" name="select_setting" class="select_setting">
                    </div>
                    <div class="setting_private-card setting_private-card2">
                        <img class="setting_show_icon" src="../img/icon_index_friend_detail.svg"
                            alt="post_congkhai.svg">
                        Bạn bè cụ thể
                        <img class="select_setting" src="../img/index_friend_dropright.svg" alt="Ảnh lỗi">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- popup bạn bè ngoại trừ -->
<div class="except">
    <div class="except_detail">
        <div class="except_detail_header">
            <img class="except_detail_back" src="../img/standards_community_back.svg" alt="Ảnh lỗi">
            Bạn bè ngoại trừ
            <img class="turnoff_except" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="except_detail_body">
            <div class="except_detail_div_search">
                <input class="except_detail_input" type="text" placeholder="Tìm kiếm bạn bè">
                <img class="except_detail_search" src="../img/search.svg" alt="Ảnh lỗi">
            </div>
            <p class="except_detail_body_title">Bạn bè</p>
            <div class="except_list_item">
            <?php foreach ($my_friend as $value) { ?> 
                <div class="except_info_user" data-id="<?=$value['id365']?>" data-type365="<?=$value['type365']?>">
                    <img class="except_detail_body_avt" src="<?=($value['avatarUser']!='')?$value['avatarUser']:"/img/logo_com.png"?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                    <?=$value['userName']?>
                    <svg class="icon_except_del" width="30" height="30" viewBox="0 0 30 30" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle class="icon_except_circle" cx="15.0098" cy="15" r="15" fill="#CCCCCC" />
                        <path d="M23.0098 16H7.00977V14H23.0098V16Z" fill="white" />
                    </svg>
                    <input type="checkbox" class="except_checkbox" value="<?=$value['id365']?>" data-type365="<?=$value['type365']?>">
                </div>
            <?php } ?>
            </div>
            <div class="except_detail_box">
                <p class="except_detail_box_title">Những bạn không nhìn thấy bài viết</p>
                <div class="except_detail_box_list_item2">

                </div>
            </div>
            <div class="except_btn">
                <button class="except_cancel">Hủy</button>
                <button class="except_save" disabled>Lưu</button>
            </div>
        </div>
    </div>
</div>

<!-- popup bạn bè cụ thể -->
<div class="special">
    <div class="except_detail">
        <div class="except_detail_header">
            <img class="except_detail_back" src="../img/standards_community_back.svg" alt="Ảnh lỗi">
            Bạn bè cụ thể
            <img class="turnoff_special" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="except_detail_body">
            <div class="except_detail_div_search">
                <input class="except_detail_input" type="text" placeholder="Tìm kiếm bạn bè">
                <img class="except_detail_search" src="../img/search.svg" alt="Ảnh lỗi">
            </div>
            <p class="except_detail_body_title">Bạn bè</p>
            <div class="except_list_item">
            <?php foreach ($my_friend as $value) { ?>
                <div class="except_info_user2" data-id="<?=$value['id365']?>" data-type365="<?=$value['type365']?>">
                    <img class="except_detail_body_avt" src="<?=($value['avatarUser']!='')?$value['avatarUser']:"/img/logo_com.png"?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                    <?=$value['userName']?>
                    <svg class="icon_except_del" width="30" height="30" viewBox="0 0 30 30" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2_15662)">
                            <path class="icon_except_circle" fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.00976563 15C0.00976563 11.0218 1.59012 7.20644 4.40316 4.3934C7.21621 1.58035 11.0315 0 15.0098 0C18.988 0 22.8033 1.58035 25.6164 4.3934C28.4294 7.20644 30.0098 11.0218 30.0098 15C30.0098 18.9782 28.4294 22.7936 25.6164 25.6066C22.8033 28.4196 18.988 30 15.0098 30C11.0315 30 7.21621 28.4196 4.40316 25.6066C1.59012 22.7936 0.00976563 18.9782 0.00976562 15H0.00976563ZM14.1538 21.42L22.7898 10.624L21.2298 9.376L13.8658 18.578L8.64977 14.232L7.36977 15.768L14.1538 21.422V21.42Z"
                                fill="#CCCCCC" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2_15662">
                                <rect width="30" height="30" fill="white" transform="translate(0.00976562)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <input type="checkbox" class="except_checkbox" value="<?=$value['id365']?>" data-type365="<?=$value['type365']?>">
                </div>
            <?php } ?>
            </div>
            <div class="except_detail_box">
                <p class="except_detail_box_title">Những bạn sẽ nhìn thấy bài viết</p>
                <div class="except_detail_box_list_item">

                </div>
            </div>
            <div class="except_btn">
                <button class="except_cancel">Hủy</button>
                <button class="except_save" disabled>Lưu</button>
            </div>
        </div>
    </div>
</div>
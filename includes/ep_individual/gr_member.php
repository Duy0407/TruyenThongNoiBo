<div class="gr_member">
    <div class="gr_introduce_box_header">
        <a class="center_nav_eq0">
            <img class="gr_introduce_box_header_img" src="/img/standards_community_back_black.svg" alt="Ảnh lỗi">
            Danh sách bạn bè
        </a>
    </div>
    <div class="gr_member_body">
        <div class="gr_album_title_box gr_member_body_header">
            <p class="gr_album_title">Bạn bè (<?=count($ep_friend)?>)</p>
            <div class="gr_friend_search">
                <input class="gr_friend_input" type="text" placeholder="Tìm kiếm bạn bè">
                <img class="gr_friend_input_icon" src="../img/tim-kiem.svg" alt="Ảnh lỗi">
            </div>
            <a href="/page-ban-be.html" class="gr_friend_add">Lời mời kết bạn</a>
            <a href="/page-ban-be.html" class="gr_friend_add gr_friend_find">Tìm bạn bè</a>
        </div>
        <div class="gr_member_header">
            <p class="gr_member_title gr_friend_all">Tất cả bạn bè</p>
            <!-- <div class="gr_member_title gr_friend_add_new">Đã thêm gần đây</div> -->
            <p class="gr_member_title">Người theo dõi</p>
            <p class="gr_member_title">Đang theo dõi</p>
        </div>
        <div class="gr_member_detail gr_member_detail_all">
            <div class="gr_friend_list_item gr_friend_list_item_active">
                <?php $following_id365 = array_column($following,'id365');
                foreach ($ep_friend as $key => $value) { ?>
                <div class="gr_friend_item" data-id365="<?=$value['id365']?>" data-id_chat="<?=$value['id']?>" data-type365="<?=$value['type365']?>">
                    <img class="gr_friend_avt" src="<?=$value['avatarUser']?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                    <div class="gr_friend_info">
                        <a href="/trang-ca-nhan-e<?=$value['id365']?>" class="gr_friend_name"><?=$value['userName']?></a>
                        <p class="gr_friend_detail">1 bạn chung</p>
                    </div>
                    <?php if (isset($_SESSION['login'])) {
                    if ($type_edit == 0 && in_array($value['id365'],$accepted_invite_id)) { ?>
                    <button class="gr_friend_btn"><img src="../img/ba-cham.svg" alt="Ảnh lỗi"></button>
                    <div class="edit_fr">
                        <a class="edit_fr_item" target="_blank" href="<?=linkConversation($my_id_chat,$value['id'])?>">
                            <img class="edit_fr_icon" src="../img/nhan-tin.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Nhắn tin</p>
                            </div>
                        </a>
                        <div class="edit_fr_item" onclick="unfollow(<?=$value['id365']?>,<?=$value['type365']?>)">
                            <img class="edit_fr_icon" src="../img/bo-theo-doi.svg" alt="Ảnh lỗi">
                            <div>
                                <?php if (in_array($value['id365'],$arr_my_unfollow)){ ?>
                                    <p class="edit_fr_title">Theo dõi </p>
                                <?php }else{ ?>
                                    <p class="edit_fr_title">Bỏ theo dõi </p>
                                    <p class="edit_fr_content">Dừng xem bài viết nhưng vẫn là bạn bè</p>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if (in_array($value['id365'],$arr_my_block)){ ?>
                            <button class="edit_fr_item" onclick="block(<?=$value['id']?>,<?=$value['id365']?>,<?=$value['type365']?>)">
                                <img class="edit_fr_icon" src="../img/chan.svg" alt="Ảnh lỗi">
                                <div>
                                    <p class="edit_fr_title">Bỏ chặn </p>
                                </div>
                            </button>
                        <?php }else{ ?>
                            <div class="edit_fr_item show_popup_block">
                                <img class="edit_fr_icon" src="../img/chan.svg" alt="Ảnh lỗi">
                                <div>
                                    <p class="edit_fr_title">Chặn </p>
                                    <p class="edit_fr_content">Bạn bè sẽ không thể nhìn thấy bạn hoặc liên hệ với bạn trên
                                        Truyền thông văn hóa</p>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="edit_fr_item popup_btn_cancel_fr">
                            <img class="edit_fr_icon" src="../img/nhan-tin.svg" alt="Ảnh lỗi">
                            <div>
                                <p class="edit_fr_title">Hủy kết bạn </p>
                                <p class="edit_fr_content">Xóa bạn bè khỏi danh sách bạn bè</p>
                            </div>
                        </div>
                    </div>
                    <?php }elseif (in_array($value['id365'],$following_id365)){ ?>
                        <button class="gr_friend_btn gr_fr_cancel_btn" onclick="deleteInvite(<?=$value['id']?>,<?=$value['id365']?>,<?=$value['type365']?>)">Hủy lời mời</button>
                    <?php }elseif ($value['id365'] != $my_id && !in_array($value['id365'],$accepted_invite_id)){ ?>
                        <button class="add_fr3" onclick="addFriend(<?=$value['id']?>,<?=$value['id365']?>,<?=$value['type365']?>)">Thêm bạn bè</button>
                    <?php }
                    } ?>
                </div>
                <?php } ?>
            </div>
            <div class="gr_friend_list_item">
                <?php foreach ($follower as $key => $value) { ?>
                <div class="gr_friend_item">
                    <img class="gr_friend_avt" src="<?=$value['contactAvatar']?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                    <div class="gr_friend_info">
                        <a href="/trang-ca-nhan-e<?=$value['id365']?>" class="gr_friend_name"><?=$value['contactName']?></a>
                        <p class="gr_friend_detail">1 bạn chung</p>
                    </div>
                    <?php if ($type_edit == 0){ ?>
                    <div class="gr_fr_confirm_btn_box">
                        <button class="gr_friend_btn gr_fr_confirm_btn">Phản hồi</button>
                    </div>
                    <div class="edit_fr grfr_follower_drdown">
                        <div class="edit_fr_item" onclick="acceptInvite(<?=$value['contactId']?>,<?=$value['id365']?>,<?=$value['type365']?>)">
                            Chấp nhận
                        </div>
                        <div class="edit_fr_item" onclick="denyInvite(<?=$value['contactId']?>,<?=$value['id365']?>,<?=$value['type365']?>)">
                            Xóa lời mời
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="gr_friend_list_item">
                <?php foreach ($following as $key => $value) { ?>
                <div class="gr_friend_item">
                    <img class="gr_friend_avt" src="<?=$value['contactAvatar']?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                    <div class="gr_friend_info">
                        <a href="/trang-ca-nhan-e<?=$value['id365']?>" class="gr_friend_name"><?=$value['contactName']?></a>
                        <p class="gr_friend_detail">1 bạn chung</p>
                    </div>
                    <?php if ($type_edit == 0){ ?>
                    <div class="gr_fr_confirm_btn_box">
                        <button class="gr_friend_btn gr_fr_cancel_btn" onclick="deleteInvite(<?=$value['contactId']?>,<?=$value['id365']?>,<?=$value['type365']?>)">Hủy lời mời</button>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
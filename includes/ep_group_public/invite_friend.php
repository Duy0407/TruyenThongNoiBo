<!-- POPUP MỜI BẠN BÈ -->
<div class="popup_add_friend" hidden>
    <div class="popup_add_friend_padding">
        <div class="popup_add_friend_box1">
            <div class="popup_add_friend_box1_text">Mời bạn bè</div>
            <div class="popup_add_friend_box1_img cusor hidden_add_friend"><img src="../img/image_new/x.svg" alt=""></div>
        </div>
        <div class="popup_add_friend_box2">
            <div class="popup_add_friend_box2_khoi1">
                <input type="text" placeholder="Tìm kiếm bạn bè" name="search_friend">
                <div class="icon_vector">
                    <img src="../img/image_new/Vector.svg" alt="">
                </div>
            </div>
            <div class="popup_add_friend_box2_khoi2">
                <div class="add_friend_box2_khoi2_title">Bạn bè </div>
                <div class="scroll_y_fig">
                    <div class="khoi_add_friend">
                        <?php foreach ($my_friend as $key => $value) {?>
                            <?php if (!array_key_exists($value['id365']."-".($value['type365']%2), $stop_invite2group) && !array_key_exists($value['id365']."-".$value['type365'], $arr_mem_new)) {?>
                                <div class="khoi_add_friend_block cusor" data-type="<?=$value['type365']?>" data-id="<?=$value['id365']?>" >
                                    <div class="khoi_add_friend_info">
                                        <div class="khoi_add_friend_info_avt">
                                            <?if($value['avatarUser'] != ""){?>
                                                <img class="img_friend" src="<?=$value['avatarUser']?>" alt="" onerror="this.src=`/img/avatar_default.png`;">
                                            <?}else{?>
                                                <img class="img_friend" src="/img/avatar_default.png" alt="" onerror="this.src=`/img/avatar_default.png`;">
                                            <?}?>
                                        </div>
                                        <div class="khoi_add_friend_info_name"><?=$value['userName']?></div>
                                    </div>
                                    <div class="khoi_add_friend_check">
                                        <input type="checkbox" value="<?=$value['id365']?>" data-type="<?=$value['type365']?>" data-id="<?=$value['id365']?>" name="add_friend" onclick="fc_add_f(this)">
                                    </div>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>
                </div>
                <div class="khoi_add_friend-success">
                    <div class="khoi_add_friend-success-text">Đã chọn <span class="cout_person">0</span> người</div>
                    <div class="scroll_y_fig2">
                        <div class="add_friend-success-friend">
                            <!-- appen friend -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup_add_friend_box2_khoi3">
                <div class="add_friend_box2_khoi3_btn1 active_text hidden_add_friend">Hủy</div>
                <div class="add_friend_box2_khoi3_btn2 click_add_friend_new" data="">Mời</div>
            </div>
        </div>
    </div>
</div>
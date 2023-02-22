<?php // group của tài khoản cá nhân
    $sql = "SELECT id,group_name,group_mode,group_image,id_employee FROM `group` WHERE FIND_IN_SET($ep_id,id_employee) OR FIND_IN_SET($ep_id,id_manager)";
    $db_group = new db_query($sql);
    $gr_private = [];
    $gr_public = [];
    while ($row = mysql_fetch_array($db_group->result)){
        if ($row['group_mode'] == 0){
            $gr_public[$row['id']] = $row;
        }else{
            $gr_private[$row['id']] = $row;
        }
    } ?>
<div class="group">
    <div class="gr_member_body">
        <div class="gr_member_header">
            <p class="gr_member_title gr_friend_all">Nhóm công khai</p>
            <p class="gr_member_title gr_friend_add_new">Nhóm riêng tư</p>
        </div>
        <div class="gr_member_detail gr_member_detail_all">
            <!-- <div class="gr_friend_search">
                <img class="gr_friend_input_icon" src="../img/tim-kiem.svg" alt="Ảnh lỗi">
            </div> -->
            <div class="gr_friend_list_item gr_friend_list_item_active">
                <?php foreach ($gr_public as $key => $value) { ?>
                <div class="gr_friend_item">
                    <img class="gr_friend_avt gr_friend_avt_group" src="<?=$value['group_image']?>" alt="Ảnh lỗi" onerror="this.src=`/img/nv_default_bgi.svg`;">
                    <div class="gr_friend_info">
                        <a class="gr_friend_name" href="<?=group_link($value['group_name'],$value['id'])?>"><?=$value['group_name']?></a>
                        <p class="gr_friend_detail"><?=count(explode(',',$value['id_employee'])) + 1?> thành viên</p>
                    </div>
                    <?php if ($type_edit == 0){ ?>
                    <button class="gr_gr_btn"><img src="../img/ba-cham.svg" alt="Ảnh lỗi"></button>
                    <div class="edit_fr">
                        <div class="edit_fr_item edit_fr_item_group nv_share_group">
                            <img class="edit_fr_icon" src="../img/chia-se-ngay.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Chia sẻ ngay</p>
                            </div>
                        </div>
                        <?php $mem = explode(',',$arr_group[$value['id']]['id_employee']);
                        if (in_array($my_id,$mem)){ ?>
                            <div class="edit_fr_item edit_fr_item_group" onclick="LeaveGroup(<?=$value['id']?>)">
                                <img class="edit_fr_icon" src="../img/roi-khoi-nhom.svg" alt="Ảnh lỗi">
                                <div>
                                    <p class="edit_fr_title">Rời khỏi nhóm</p>
                                </div>
                            </div>
                            <?php $unfollow = explode(',',$arr_group[$value['id']]['following']);
                            if (in_array($my_id,$unfollow)){ ?>
                            <div class="edit_fr_item edit_fr_item_group" onclick="FollowGroup(<?=$value['id']?>)">
                                <img class="edit_fr_icon" src="../img/bo-theo-doi.svg" alt="Ảnh lỗi">
                                <div>
                                    <p class="edit_fr_title">Theo dõi nhóm</p>
                                </div>
                            </div>
                            <?php }else{ ?>
                                <div class="edit_fr_item edit_fr_item_group" onclick="unFollowGroup(<?=$value['id']?>)">
                                    <img class="edit_fr_icon" src="../img/bo-theo-doi.svg" alt="Ảnh lỗi">
                                    <div>
                                        <p class="edit_fr_title">Bỏ theo dõi nhóm</p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php }else{ ?>
                            <div class="edit_fr_item edit_fr_item_group">
                                <img class="edit_fr_icon" src="../img/roi-khoi-nhom.svg" alt="Ảnh lỗi">
                                <div>
                                    <p class="edit_fr_title">Tham gia nhóm</p>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="edit_fr_item edit_fr_item_group" onclick="copy2clipboard()">
                            <img class="edit_fr_icon" src="../img/sao-chep-link.svg" alt="Ảnh lỗi">
                            <div>
                                <p class="edit_fr_title">Sao chép liên kết</p>
                            </div>
                        </div>
                        <!-- <div class="edit_fr_item edit_fr_item_group">
                            <img class="edit_fr_icon" src="../img/bao-cao-nhom.svg" alt="Ảnh lỗi">
                            <div>
                                <p class="edit_fr_title">Báo cáo nhóm</p>
                            </div>
                        </div> -->
                    </div>
                    <div class="edit_fr">
                        <div class="edit_fr_item edit_fr_item_group share_my_wall" data-gr_id="<?=$value['id']?>">
                            <img class="edit_fr_icon" src="/img/nv_share_your_wall.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Chia sẻ lên trang cá nhân (Của bạn)</p>
                            </div>
                        </div>
                        <div class="edit_fr_item edit_fr_item_group ep_share_up_invidual" data-gr_id="<?=$value['id']?>">
                            <img class="edit_fr_icon" src="/img/nv_share_others_wall.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Chia sẻ lên trang cá nhân (Bạn bè)</p>
                            </div>
                        </div>
                        <div class="edit_fr_item edit_fr_item_group ep_send_with_chat" data-gr_id="<?=$value['id']?>">
                            <img class="edit_fr_icon" src="/img/nv_send_via_chat365.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Gửi bằng Chat365</p>
                            </div>
                        </div>
                        <div class="edit_fr_item edit_fr_item_group nv_share_group">
                            <img class="edit_fr_icon" src="/img/nv_other_share.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Khác</p>
                            </div>
                        </div>
                    </div>
                    <div class="edit_fr">
                        <div class="edit_fr_item edit_fr_item_group" onclick="shareOnFacebook(0,0,<?=$value['id']?>)">
                            <img class="edit_fr_icon" src="/img/nv_ic_fb.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Facebook</p>
                            </div>
                        </div>
                        <!-- <div class="edit_fr_item edit_fr_item_group" onclick="shareOnPinterest(0,0,<?=$value['id']?>)">
                            <img class="edit_fr_icon" src="/img/nv_ic_pin.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Pinterest</p>
                            </div>
                        </div> -->
                        <div class="edit_fr_item edit_fr_item_group" onclick="shareOnTwitter(0,0,<?=$value['id']?>)">
                            <img class="edit_fr_icon" src="/img/nv_ic_tw.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Twitter</p>
                            </div>
                        </div>
                        <div class="edit_fr_item edit_fr_item_group" onclick="shareOnLinkedIn(0,0,<?=$value['id']?>)">
                            <img class="edit_fr_icon" src="/img/nv_ic_in.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Linked In</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="gr_friend_list_item">
                <div class="gr_friend_item">
                    <img class="gr_friend_avt gr_friend_avt_group" src="<?=$value['group_image']?>" alt="Ảnh lỗi" onerror="this.src=`/img/nv_default_bgi.svg`;">
                    <div class="gr_friend_info">
                        <a href="/truyen-thong-noi-bo-nhom-thao-luan-c<?=$my_dep_id?>" class="gr_friend_name"><?=$my_dep_name?></a>
                        <p class="gr_friend_detail"><?=count(list_ep_by_dep())?> thành viên</p>
                    </div>
                    <?php if ($type_edit == 0){ ?>
                    <button class="gr_gr_btn"><img src="../img/ba-cham.svg" alt="Ảnh lỗi"></button>
                    <div class="edit_fr">
                        <div class="edit_fr_item edit_fr_item_group">
                            <img class="edit_fr_icon" src="../img/sao-chep-link.svg" alt="Ảnh lỗi">
                            <div>
                                <p class="edit_fr_title">Sao chép liên kết</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php foreach ($gr_private as $key => $value) { ?>
                <div class="gr_friend_item">
                    <img class="gr_friend_avt gr_friend_avt_group" src="<?=$value['group_image']?>" alt="Ảnh lỗi" onerror="this.src=`/img/nv_default_bgi.svg`;">
                    <div class="gr_friend_info">
                        <a href="<?=group_link($value['group_name'],$value['id'])?>" class="gr_friend_name"><?=$value['group_name']?></a>
                        <p class="gr_friend_detail"><?=count(explode(',',$value['id_employee'])) + 1?> thành viên</p>
                    </div>
                    <?php if ($type_edit == 0){ ?>
                    <button class="gr_gr_btn"><img src="../img/ba-cham.svg" alt="Ảnh lỗi"></button>
                    <div class="edit_fr">
                        <div class="edit_fr_item edit_fr_item_group nv_share_group">
                            <img class="edit_fr_icon" src="../img/chia-se-ngay.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Chia sẻ ngay</p>
                            </div>
                        </div>
                        <?php $mem = explode(',',$arr_group[$value['id']]['id_employee']);
                        if (in_array($my_id,$mem)){ ?>
                            <div class="edit_fr_item edit_fr_item_group" onclick="LeaveGroup(<?=$value['id']?>)">
                                <img class="edit_fr_icon" src="../img/roi-khoi-nhom.svg" alt="Ảnh lỗi">
                                <div>
                                    <p class="edit_fr_title">Rời khỏi nhóm</p>
                                </div>
                            </div>
                            <?php $unfollow = explode(',',$arr_group[$value['id']]['following']);
                            if (in_array($my_id,$unfollow)){ ?>
                            <div class="edit_fr_item edit_fr_item_group" onclick="FollowGroup(<?=$value['id']?>)">
                                <img class="edit_fr_icon" src="../img/bo-theo-doi.svg" alt="Ảnh lỗi">
                                <div>
                                    <p class="edit_fr_title">Theo dõi nhóm</p>
                                </div>
                            </div>
                            <?php }else{ ?>
                                <div class="edit_fr_item edit_fr_item_group" onclick="unFollowGroup(<?=$value['id']?>)">
                                    <img class="edit_fr_icon" src="../img/bo-theo-doi.svg" alt="Ảnh lỗi">
                                    <div>
                                        <p class="edit_fr_title">Bỏ theo dõi nhóm</p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php }else{ ?>
                            <div class="edit_fr_item edit_fr_item_group">
                                <img class="edit_fr_icon" src="../img/roi-khoi-nhom.svg" alt="Ảnh lỗi">
                                <div>
                                    <p class="edit_fr_title">Tham gia nhóm</p>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="edit_fr_item edit_fr_item_group">
                            <img class="edit_fr_icon" src="../img/sao-chep-link.svg" alt="Ảnh lỗi">
                            <div>
                                <p class="edit_fr_title">Sao chép liên kết</p>
                            </div>
                        </div>
                        <!-- <div class="edit_fr_item edit_fr_item_group">
                            <img class="edit_fr_icon" src="../img/bao-cao-nhom.svg" alt="Ảnh lỗi">
                            <div>
                                <p class="edit_fr_title">Báo cáo nhóm</p>
                            </div>
                        </div> -->
                    </div>
                    <div class="edit_fr">
                        <div class="edit_fr_item edit_fr_item_group share_my_wall" data-gr_id="<?=$value['id']?>">
                            <img class="edit_fr_icon" src="/img/nv_share_your_wall.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Chia sẻ lên trang cá nhân (Của bạn)</p>
                            </div>
                        </div>
                        <div class="edit_fr_item edit_fr_item_group ep_share_up_invidual" data-gr_id="<?=$value['id']?>">
                            <img class="edit_fr_icon" src="/img/nv_share_others_wall.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Chia sẻ lên trang cá nhân (Bạn bè)</p>
                            </div>
                        </div>
                        <div class="edit_fr_item edit_fr_item_group ep_send_with_chat" data-gr_id="<?=$value['id']?>">
                            <img class="edit_fr_icon" src="/img/nv_send_via_chat365.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Gửi bằng Chat365</p>
                            </div>
                        </div>
                        <div class="edit_fr_item edit_fr_item_group nv_share_group">
                            <img class="edit_fr_icon" src="/img/nv_other_share.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Khác</p>
                            </div>
                        </div>
                    </div>
                    <div class="edit_fr">
                        <div class="edit_fr_item edit_fr_item_group" onclick="shareOnFacebook(0,0,<?=$value['id']?>)">
                            <img class="edit_fr_icon" src="/img/nv_ic_fb.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Facebook</p>
                            </div>
                        </div>
                        <!-- <div class="edit_fr_item edit_fr_item_group" onclick="shareOnPinterest(0,0,<?=$value['id']?>)">
                            <img class="edit_fr_icon" src="/img/nv_ic_pin.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Pinterest</p>
                            </div>
                        </div> -->
                        <div class="edit_fr_item edit_fr_item_group" onclick="shareOnTwitter(0,0,<?=$value['id']?>)">
                            <img class="edit_fr_icon" src="/img/nv_ic_tw.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Twitter</p>
                            </div>
                        </div>
                        <div class="edit_fr_item edit_fr_item_group" onclick="shareOnLinkedIn(0,0,<?=$value['id']?>)">
                            <img class="edit_fr_icon" src="/img/nv_ic_in.svg" alt="Ảnh lỗi">
                            <div class="edit_fr_detail">
                                <p class="edit_fr_title">Linked In</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
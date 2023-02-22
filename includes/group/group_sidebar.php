<div class="sidebar_index">
    <div class="sidebar_index_body">
        <div class="fig_display_811">
            <p class="sidebar_index_body_title">Nhóm</p>
            <button class="sidebar_index_setting hide_group active_text">Cài đặt</button>
            <div class="ep_group_setting">
                <button class="ep_group_setting_cancel"><img src="../img/dong-cai-dat-nhom.svg" alt="Ảnh lỗi"></button>
                <p class="ep_group_setting_text">Cài đặt nhóm</p>
                <p class="ep_group_setting_content">Bạn có thể quản lý cách nhận thông báo về thông tin mới của Nhóm.</p>
                <div class="ep_group_setting_detail ep_group_setting_detail_show">
                    <img class="ep_group_setting_icon" src="../img/ep_group_notify.svg" alt="Ảnh lỗi">
                    <p class="ep_group_setting_detail_p">Hiển thị thông báo</p>
                    <input type="checkbox" name="turnoff_group" id="show_notify" hidden value="1" <?=($cout_group_notify == $cout_group) ? "" : "checked" ;?>>
                    <label for="show_notify" class="show_notify_label"></label>
                </div>
                <div class="ep_group_setting_detail ep_group_setting_custom_notify">
                    <img class="ep_group_setting_icon" src="../img/ep_group_setting.svg" alt="Ảnh lỗi">
                    Tùy chỉnh thông báo
                </div>
                <div class="ep_group_setting_detail ep_group_setting_ghim_gr">
                    <img class="ep_group_setting_icon" src="../img/ep_group_ghim.svg" alt="Ảnh lỗi">
                    Ghim
                </div>
                <div class="ep_group_setting_detail ep_group_setting_following">
                    <img class="ep_group_setting_icon" src="../img/ep_group_follow.svg" alt="Ảnh lỗi">
                    Đang theo dõi
                </div>
                <div class="ep_group_setting_detail ep_group_setting_exit_group">
                    <img class="ep_group_setting_icon" src="../img/ep_group_exit.svg" alt="Ảnh lỗi">
                    Rời khỏi nhóm
                </div>
            </div>
            <div class="fig_1200_ic">
                <div class="fig_1200_ic_1" onclick="create_gr_new(this)"><img src="../img/image_new/circle_add.svg" alt=""></div>
                <div class="fig_1200_ic_1 click_show_search"><img src="../img/image_new/circle_search.svg" alt=""></div>
                <div class="fig_1200_ic_1 sidebar_index_setting"><img src="../img/image_new/circle_setting.svg" alt=""></div>
            </div>
        </div>
        <div class="sidebar_index_search">
            <div class="ic_arrow_left_show_1024">
                <img src="../img/image_new/muiten_left.svg" alt="" class="out_search">
            </div>
            <div class="sidebar_index_search_sub">
                <input type="text" placeholder="Tìm kiếm nhóm">
                <div class="ic_sidebar_index_search">
                    <img src="../img/image_new/search_24.svg" alt="">
                </div>
            </div>
        </div>
        <div class="btn_link_two">
            <?php if (isset($_GET['id']) && $pheduyet_yc_thanhvien == 1) {?>
                <div class="sidebar_main_block2">
                    <div class="hide_header_1024">
                        <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>.html" class="sidebar_main_block2_box1" id="bg_trangchu">
                            <div class="sidebar_main_block2_box1_ic" id="ic_trangchu"><?=$sb_ic_1?></div>
                            <div class="sidebar_main_block2_box1_text" id="text_trangchu">Trang chủ cộng đồng</div>
                        </a>
                        <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-yeu-cau-lam-thanh-vien.html" class="sidebar_main_block3_box1 mr_unset" id="bg_yc_thanhvien">
                            <div class="sidebar_main_block3_box1_ic" id="ic_yc_thanhvien"><?=$sb_ic_3?></div>
                            <div class="sidebar_main_block3_box1_text">
                                <div class="sidebar_main_block3_box1_text1 text_yc_thanhvien">Yêu cầu làm thành viên</div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php }?>
            <a href="/nhom.html">
                <div class="btn_link_two_padding border_bottom_1200 hide_1024_new cusor" id="bg_nhom">
                    <div class="btn_link_two_ic" id="ic_nhom"><?= $sb_ic_5?></div>
                    <div class="btn_link_two_text" id="text_nhom">Bảng feed của bạn</div>
                </div>
            </a>
            <!-- 1024 -->
            <div class="btn_link_two_padding border_bottom_1200 show_1024_new click_bang_feed" onclick="clcik_group(this)">
                <div class="btn_link_two_text active_text">Bảng feed của bạn</div>
            </div>
            <!-- end 1024 -->
            <div class="btn_link_two_padding hide_group_1366 click_group_them" onclick="clcik_group(this)">
                <div class="btn_link_two_text">Nhóm của bạn</div>
            </div>
            <a href="/kham-pha.html">
                <div class="btn_link_two_padding hide_1024_new cusor khampha_add" id="bg_khampha">
                    <div class="btn_link_two_ic ic_add" id="ic_khampha"><?= $sb_ic_12?></div>
                    <div class="btn_link_two_text text_add" id="text_khampha">Khám phá</div>
                </div>
            </a>
            <!-- 1024 -->
            <div class="btn_link_two_padding show_1024_new click_khampha" onclick="clcik_group(this)">
                <div class="btn_link_two_text" >Khám phá</div>
            </div>
            <!-- end 1024 -->
        </div>
        <div class="div_bao_bnt">
            <button class="create_btn_group">+ Tạo nhóm mới</button>
        </div>

        <div class="group_manager">
            <?php if ($my_type == 1){
                $select_my_group = new db_query("SELECT COUNT(user_id) AS count_mem,`group`.*,
                    case when EXISTS (SELECT id FROM group_pin WHERE group_pin.id_user_pin = $my_id AND group_pin.user_type = 1 AND group_pin.id_group = `group`.id) then 1 else 0 end as id_pin
                    FROM `group` LEFT JOIN `group_member` ON `group`.id = group_member.group_id
                    WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND user_type = 1 AND type_mem > 0 AND group_id = `group`.`id`)
                    GROUP BY group.id ORDER BY id_pin DESC, `group`.id DESC");
            }else{
                $select_my_group = new db_query("SELECT COUNT(user_id) AS count_mem,`group`.*,
                    case when EXISTS (SELECT id FROM group_pin WHERE group_pin.id_user_pin = $my_id AND (group_pin.user_type = 0 OR group_pin.user_type = 2) AND group_pin.id_group = `group`.id) then 1 else 0 end as id_pin
                    FROM `group` LEFT JOIN `group_member` ON `group`.id = group_member.group_id
                    WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND (user_type = 0 OR user_type = 2) AND type_mem > 0 AND group_id = `group`.`id`)
                    GROUP BY group.id ORDER BY id_pin DESC, `group`.id DESC");
            }
            if (mysql_num_rows($select_my_group->result) > 0){ ?>
            <p class="group_manager_title">Nhóm do bạn quản lý</p>
            <div class="ep_group_list_item">
                <?php while ($my_group = mysql_fetch_assoc($select_my_group->result)) { ?>
                    <a href="<?=replaceTitle($my_group['group_name']);?>-<?=$my_group['id']?>.html" class="ep_group_item">
                        <?if($my_group['group_image'] != NULL) {?>
                            <img class="ep_group_item_avt" src="<?=$my_group['group_image']?>" onerror="this.src=`/img/nv_default_bgi.svg`;" alt="Ảnh lỗi">
                        <?}else{?>
                            <img class="ep_group_item_avt" src="../img/nv_default_bgi.svg" alt="Ảnh lỗi">
                        <?}?>
                        <div>
                            <p class="ep_group_name"><?=$my_group['group_name']?></p>
                            <p class="count_member_group"><?=$my_group['count_mem']?> thành viên</p>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="ep_group_join">
                <?php if ($my_type == 1){
                    $select_group_you_joined = new db_query("SELECT COUNT(user_id) AS count_mem,`group`.*,
                        case when EXISTS (SELECT id FROM group_pin WHERE group_pin.id_user_pin = $my_id AND group_pin.id_group = `group`.id) then 1 else 0 end as id_pin
                        FROM `group` LEFT JOIN `group_member` ON `group`.id = group_member.group_id
                        WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND user_type = 1 AND type_mem = 0 AND group_id = `group`.`id`)
                        GROUP BY group.id ORDER BY id_pin DESC, `group`.id DESC");
                }else{
                    $select_group_you_joined = new db_query("SELECT COUNT(user_id) AS count_mem,`group`.*,
                        case when EXISTS (SELECT id FROM group_pin WHERE group_pin.id_user_pin = $my_id AND group_pin.id_group = `group`.id) then 1 else 0 end as id_pin
                        FROM `group` LEFT JOIN `group_member` ON `group`.id = group_member.group_id
                        WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND (user_type = 0 OR user_type = 2) AND type_mem = 0 AND group_id = `group`.`id`)
                        GROUP BY group.id ORDER BY id_pin DESC, `group`.id DESC");
                }
                if (mysql_num_rows($select_group_you_joined->result) > 0){?>
                <p class="group_manager_title">Nhóm bạn đã tham gia</p>
                <div class="ep_group_join_list_item">
                    <?php while ($show_gyj = mysql_fetch_assoc($select_group_you_joined->result)) { ?>
                        <a href="<?=replaceTitle($show_gyj['group_name']);?>-<?=$show_gyj['id']?>.html" class="ep_group_item">
                            <?if($show_gyj['group_image'] != NULL) {?>
                                <img class="ep_group_item_avt" src="<?=$show_gyj['group_image']?>" onerror="this.src=`/img/nv_default_bgi.svg`;" alt="Ảnh lỗi">
                            <?}else{?>
                                <img class="ep_group_item_avt" src="../img/nv_default_bgi.svg" alt="Ảnh lỗi">
                            <?}?>
                            <div>
                                <p class="ep_group_name"><?=$show_gyj['group_name']?></p>
                                <p class="count_member_group"><?=$show_gyj['count_mem']?> thành viên</p>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function clcik_group(cl_gr) {
    $(".btn_link_two_padding").removeClass("active_background");
    $(".btn_link_two_padding").removeClass("border_bottom_1200");
    $(".btn_link_two_ic").removeClass("colof_icon");
    $(".btn_link_two_text").removeClass("active_text");
    $(cl_gr).addClass("active_background");
    $(cl_gr).addClass("border_bottom_1200");
    $(cl_gr).children(".btn_link_two_ic").addClass("colof_icon");
    $(cl_gr).children(".btn_link_two_text").addClass("active_text");
}


function click_xt_khampha(cxkp){
    $(".btn_link_two_padding").removeClass("active_background");
    $(".btn_link_two_padding").removeClass("border_bottom_1200");
    $(".btn_link_two_ic").removeClass("colof_icon");
    $(".btn_link_two_text").removeClass("active_text");
    $(cxkp).addClass("active_background");
    $(cxkp).addClass("border_bottom_1200");
    $(cxkp).children(".btn_link_two_ic").addClass("colof_icon");
    $(cxkp).children(".btn_link_two_text").addClass("active_text");

    $(".khampha_add").addClass("active_background");
    $(".ic_add").addClass("colof_icon");
    $(".text_add").addClass("active_text");
}


</script>
<?
$db_post_save = new db_query("SELECT `id_posts`,`use_id` FROM `save_post` WHERE `id_posts` = ". $row['new_id'] . " AND `use_id` = ". $_SESSION['login']['id']."");
if ($row['notify_on'] != "") {
    $notify_on = explode(',', $row['notify_on']);
}else{
    $notify_on = [];
}
$arr_tag = explode(',', $row['id_user_tags']);

?>

<div class="ep_post_action1 pp_baiviet_padding pick_id_post parent_post_ghim" data="<?=$row['new_id']?>" data1="<?=$row['position']?>" data2="<?=$row['author']?>">

    <?if(array_key_exists($my_id."-".($my_type%2),$administrators_censor)){?>
        <!-- GHIM BÀI VIẾT -->
        <?if($row['ghim_group'] != 1){?>
            <div class="popup_3cham_div ghim_post_group" data="1">
                <div class="popup_3cham_div_img w20_h20"><img src="../img/image_new/ghim_moi.svg" alt=""></div>
                <div class="popup_3cham_div_text">Ghim bài viết</div>
            </div>
        <?}else{?>
            <div class="popup_3cham_div ghim_post_group" data="0">
                <div class="popup_3cham_div_img w20_h20"><img src="../img/image_new/bo_ghim.svg" alt=""></div>
                <div class="popup_3cham_div_text">Bỏ ghim bài viết</div>
            </div>
        <?}?>
    <?}?>
    
    <!-- LƯU BÀI VIẾT -->
    <?if($row['saved'] == 0){?>
        <div class="popup_3cham_div" onclick="luu_bai_viet(<?=$row['new_id']?>,<?=$row['author']?>)">
            <div class="popup_3cham_div_img them_mr"><img src="../img/image_new/luu_posts.svg" alt=""></div>
            <div class="popup_3cham_div_text">Lưu bài viết</div>
        </div>
    <?}else{?>
        <div class="popup_3cham_div remove_save_post" data="<?=$row['new_id']?>" data1="<?=$_SESSION['login']['id']?>">
            <div class="popup_3cham_div_img them_mr"><img src="../img/bo-luu-bai-viet.svg" alt=""></div>
            <div class="popup_3cham_div_text">Bỏ lưu bài viết</div>
        </div>
    <?}?>

    <!-- BẬT / TẮT THÔNG BÁO  -->
    <?php if ($row['notify_on'] == 1) {?>
        <div class="popup_3cham_div click_notify_off">
            <div class="popup_3cham_div_img w20_h20"><img src="../img/ep_post_turn_off_notify.svg" alt=""></div>
            <div class="popup_3cham_div_text">Tắt thông báo</div>
        </div>
    <?php }else{?>
        <div class="popup_3cham_div" onclick="popup_notify_on(<?=$row['new_id']?>)">
            <div class="popup_3cham_div_img w20_h20"><img src="../img/ep_post_notify.svg" alt=""></div>
            <div class="popup_3cham_div_text">Bật thông báo</div>
        </div>
    <?php }?>
    
    <!-- BẬT TẮT COMMENT -->
    <?if (array_key_exists($my_id."-".($my_type%2),$administrators_censor) || ($row['author'] == $my_id && $row['author_type']%2 == $my_type%2)) {?>
        <?if($row['tat_comment'] != 1){?>
            <div class="popup_3cham_div tat_bat_comment" data="1"><!-- ep_post_who_cmt -->
                <div class="popup_3cham_div_img w20_h20"><img src="../img/tat-tinh-nang-bl.svg" alt=""></div>
                <div class="popup_3cham_div_text">Tắt tính năng bình luận</div>
            </div>
        <?}else{?>
            <div class="popup_3cham_div tat_bat_comment" data="0">
                <div class="popup_3cham_div_img w20_h20"><img src="../img/image_new/bat_binhluan.svg" alt=""></div>
                <div class="popup_3cham_div_text">Bật tính năng bình luận</div>
            </div>
        <?}?>
    <?}?>

    <div class="popup_3cham_div" onclick="click_hide_posts(<?=$row['new_id']?>)">
        <div class="popup_3cham_div_img"><img src="../img/an-bai-viet2.svg" alt=""></div>
        <div class="popup_3cham_div_text">Ẩn bài viết</div>
    </div>
    <?if(array_key_exists($my_id."-".($my_type%2),$administrators_censor)){?>
        <?if ($my_id != $row['author'] || $row['author_type']%2 != $my_type%2) {?>
            <div class="popup_3cham_div click_gbv">
                <div class="popup_3cham_div_img"><img src="../img/image_new/go_posts.svg" alt=""></div>
                <div class="popup_3cham_div_text">Gỡ bài viết</div>
            </div>
            <div class="popup_3cham_div click_gbv_ctg">
                <div class="popup_3cham_div_img"><img src="../img/image_new/ban_tacgia.svg" alt=""></div>
                <div class="popup_3cham_div_text">Gỡ bài viết và chặn tác giả</div>
            </div>
        <?}?>
    <?}?>
    <?if ($row['author'] == $my_id && $row['author_type']%2 == $my_type%2) {?>
        <div class="popup_3cham_div  
        <?
        if ($group['group_pause'] != 0) {
            if ($time > $group['group_pause']) {
                echo "ep_post_action1_deatail_edit";
            }else{
                echo "popup_group_pause";
            }
        }else{
            echo "ep_post_action1_deatail_edit";
        }
        ?> " data-new_id="<?=$row['new_id']?>" data-new_type="<?=$row['new_type']?>">
            <div class="popup_3cham_div_img w20_h20"><img src="../img/image_new/edit_posts.svg" alt=""></div>
            <div class="popup_3cham_div_text">Chỉnh sửa bài viết</div>
        </div>
        
        <!-- xoa_bai_viet_group 
            ep_post_del_post
        -->
        <div class="popup_3cham_div " onclick="xoa_post_group(<?=$row['new_id']?>)">
            <div class="popup_3cham_div_img"><img src="../img/icon_del_post.svg" alt=""></div>
            <div class="popup_3cham_div_text">Xóa bài viết</div>
        </div>
    <?}else{?>
        <div class="popup_3cham_div click_bc_qtv">
            <div class="popup_3cham_div_img"><img src="../img/image_new/baocao.svg" alt=""></div>
            <div class="popup_3cham_div_text">Báo cáo bài viết với quản trị viên nhóm</div>
        </div>
        <div class="popup_3cham_div click_tim_or_sup_post">
            <div class="popup_3cham_div_img"><img src="../img/image_new/tim_hotro.svg" alt=""></div>
            <div class="popup_3cham_div_text">Tìm hỗ trợ hoặc báo cáo bài viết</div>
        </div>
    <?}?>
</div>
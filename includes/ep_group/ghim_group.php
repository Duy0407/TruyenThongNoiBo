<? 
if ($my_type == 1){
    $select_my_group = new db_query("SELECT COUNT(user_id) AS count_mem,`group`.*,
        case when EXISTS (SELECT id FROM group_pin WHERE group_pin.id_user_pin = $my_id AND group_pin.user_type = 1 AND group_pin.id_group = `group`.id) then 1 else 0 end as id_pin
        FROM `group` LEFT JOIN `group_member` ON `group`.id = group_member.group_id
        WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND user_type = 1 AND group_id = `group`.`id`)
        GROUP BY group.id ORDER BY id_pin DESC, `group`.id DESC");
}else{
    $select_my_group = new db_query("SELECT COUNT(user_id) AS count_mem,`group`.*,
        case when EXISTS (SELECT id FROM group_pin WHERE group_pin.id_user_pin = $my_id AND (group_pin.user_type = 0 OR group_pin.user_type = 2) AND group_pin.id_group = `group`.id) then 1 else 0 end as id_pin
        FROM `group` LEFT JOIN `group_member` ON `group`.id = group_member.group_id
        WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND (user_type = 0 OR user_type = 2) AND group_id = `group`.`id`)
        GROUP BY group.id ORDER BY id_pin DESC, `group`.id DESC");
}
$da_ghim = [];
$ko_ghim = [];
while ($my_group = mysql_fetch_assoc($select_my_group->result)) {
    if($my_group['id_pin'] > 0){
        $da_ghim[] = $my_group;
    }else{
        $ko_ghim[] = $my_group;
    }
}
?>

<div class="ghim_group">
    <div class="custom_notify_detail">
        <div class="custom_notify_header">
            Ghim nhóm
            <img class="turnoff_custom_notify turnoff_ghim_group" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="custom_notify_body">
            <div class="custom_notify_search">
                Đã ghim
            </div>
            <div class="custom_notify_list_item custom_notify_list_item_unghim">
                <?php foreach ($da_ghim as $key => $value) { ?>
                    <div class="custom_notify_item">
                        <?if ($value['group_image'] != NULL) {?>
                            <img class="custom_notify_avt" src="<?=$value['group_image']?>" onerror="this.src=`/img/nv_default_bgi.svg`;" alt="Ảnh lỗi">
                        <? }else{?>
                            <img class="custom_notify_avt" src="/img/nv_default_bgi.svg" alt="Ảnh lỗi">
                        <?}?>
                        <div class="custom_notify_info">
                            <p class="custom_notify_name"><?=$value['group_name']?></p>
                            <p class="custom_notify_info_des"><?=$value['count_mem']?> thành viên</p>
                        </div>
                        <button class="ghim_group_cancel" data-group_id="<?=$value['id']?>" onclick="boghim(this)">Bỏ ghim</button>
                    </div>
                <?php } ?>
            </div>
            <div class="custom_notify_search custom_notify_search2">
                Các nhóm khác
            </div>
            <div class="custom_notify_list_item parents_gim parents_gim_appen">
                <?php foreach ($ko_ghim as $key => $value) { ?>
                    <div class="custom_notify_item">
                        <?if($value['group_image'] != NULL){?>
                            <img class="custom_notify_avt group_img" src="<?=$value['group_image']?>" onerror="this.src=`/img/nv_default_bgi.svg`;" alt="Ảnh lỗi">
                        <?}else{?>
                            <img class="custom_notify_avt" src="/img/nv_default_bgi.svg" alt="Ảnh lỗi">
                        <?}?>
                        <div class="custom_notify_info">
                            <p class="custom_notify_name group_name"><?=$value['group_name']?></p>
                            <p class="custom_notify_info_des group_member"><?=$value['count_mem']?> thành viên</p>
                        </div>
                        <button class="ghim_group_ghim" data-group_id="<?=$value['id']?>" onclick="click_ghim_group(this)">Ghim</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
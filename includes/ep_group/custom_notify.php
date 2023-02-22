<?php 
if ($my_type == 1){
    $select_my_group = new db_query("SELECT group_member.group_id,group_name,group_image,custom_notification.customize,
	(SELECT COUNT(id) FROM group_member AS g WHERE g.group_id = group_member.group_id) AS count_mem
    FROM group_member JOIN `group` ON group_member.group_id = `group`.`id` 
    LEFT JOIN custom_notification ON (group_member.group_id = custom_notification.id_group AND group_member.user_id = custom_notification.id_user AND MOD(group_member.user_type,2) = MOD(custom_notification.user_type,2))
    WHERE user_id = $my_id AND group_member.user_type = 1");
}else{
    $select_my_group = new db_query("SELECT group_member.group_id,group_name,group_image,custom_notification.customize,
	(SELECT COUNT(id) FROM group_member AS g WHERE g.group_id = group_member.group_id) AS count_mem
    FROM group_member JOIN `group` ON group_member.group_id = `group`.`id` 
    LEFT JOIN custom_notification ON (group_member.group_id = custom_notification.id_group AND group_member.user_id = custom_notification.id_user AND MOD(group_member.user_type,2) = MOD(custom_notification.user_type,2))
    WHERE user_id = $my_id AND (group_member.user_type = 0 OR group_member.user_type = 2)");
}
?>

<div class="custom_notify">
    <div class="custom_notify_detail">
        <div class="custom_notify_header">
            Tùy chỉnh thông báo
            <img class="turnoff_custom_notify" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="custom_notify_body">
            <div class="custom_notify_search">
                <input class="custom_notify_input" type="text" placeholder="Tìm kiếm nhóm" oninput="search_group_notify(this)">
            </div>
            <div class="custom_notify_list_item">
                <?php while ($group_notify = mysql_fetch_assoc($select_my_group->result)) { ?>
                    <div class="custom_notify_item">
                        <?if($group_notify['group_image'] != NULL){?>
                            <img class="custom_notify_avt" src="<?=$group_notify['group_image']?>" onerror="this.src=`/img/nv_default_bgi.svg`;" alt="Ảnh lỗi">
                        <?}else{?>
                            <img class="custom_notify_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                        <?}?>
                        <div class="custom_notify_info">
                            <p class="custom_notify_name"><?=$group_notify['group_name']?></p>
                            <p class="custom_notify_info_des"><?=$group_notify['count_mem']?> thành viên</p>
                        </div>
                        <select class="custom_notify_select" name="custom_notify" id="" onchange="change_custom(this)" data2="<?=$group_notify['group_id']?>">
                            <option value="0" <?= ($group_notify['customize'] == 0) ? "selected" : "";?>>Tất cả bài viết</option>
                            <option value="1" <?= ($group_notify['customize'] == 1) ? "selected" : "";?>>Bài viết nổi bật</option>
                            <option value="2" <?= ($group_notify['customize'] == 2) ? "selected" : "";?>>Bài viết của bạn bè</option>
                            <option value="3" <?= ($group_notify['customize'] == 3) ? "selected" : "";?>>Tắt</option>
                        </select>
                    </div>
                <? } ?>

            </div>
        </div>
    </div>
</div>
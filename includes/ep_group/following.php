<?php $my_type_mod = $my_type % 2;
$group_feed = new db_query("SELECT COUNT(user_id) AS count_mem,`group`.*,unfollow
FROM `group` LEFT JOIN `group_member` ON `group`.id = group_member.group_id
WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND MOD(user_type,2) = $my_type_mod AND group_id = `group`.`id`)
GROUP BY group.id");
?>


<div class="fllowing">
    <div class="custom_notify_detail">
        <div class="custom_notify_header">
            Đang theo dõi
            <img class="turnoff_custom_notify turnoff_custom_fllowing" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="custom_notify_body">
            <div class="custom_notify_search">
                <input class="custom_notify_input group_folowing_search" type="text" placeholder="Tìm kiếm nhóm">
            </div>
            <div class="custom_notify_list_item">
                <?while ($show_group_feed = mysql_fetch_array($group_feed->result)) {?>
                    <div class="custom_notify_item">
                        <?if ($show_group_feed['group_image'] != "") {?>
                            <img class="custom_notify_avt" src="<?=$show_group_feed['group_image']?>" onerror="this.src=`/img/nv_default_bgi.svg`;" alt="Ảnh lỗi">
                        <?}else{?>
                            <img class="custom_notify_avt" src="/img/nv_default_bgi.svg" alt="Ảnh lỗi">
                        <?}?>
                        <div class="custom_notify_info">
                            <p class="custom_notify_name"><?=$show_group_feed['group_name']?></p>
                            <p class="custom_notify_info_des"><?=$show_group_feed['count_mem']?> thành viên</p>
                        </div>
                        <?if ($show_group_feed['unfollow'] == 1) {?>
                            <button class="follow_btn2" onclick="click_follow(<?=$show_group_feed['id']?>)">Theo dõi</button>
                        <?}else{?>
                            <button class="follow_btn" onclick="click_unfollow(<?=$show_group_feed['id']?>, '<?=$show_group_feed['group_name']?>')">Bỏ theo dõi</button>
                        <?}?>
                    </div>
                <?}?>
            </div>
        </div>
    </div>
</div>
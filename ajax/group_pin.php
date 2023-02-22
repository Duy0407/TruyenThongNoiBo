<?php 
require_once '../config/config.php';

$group_id = getValue("group_id","int","POST",0);

$my_type_mod = $my_type % 2;

$insert_pin = new db_query("INSERT INTO `group_pin`(`id_user_pin`,`user_type`,`id_group`)VALUES('$my_id','$my_type','$group_id')");

$id = mysql_insert_id();

$select_gr_pin = new db_query("SELECT COUNT(user_id) AS count_mem,`group`.*,
    case when EXISTS (SELECT id FROM group_pin WHERE group_pin.id_user_pin = $my_id AND group_pin.user_type = 1 AND group_pin.id_group = `group`.id) then 1 else 0 end as id_pin
    FROM `group` LEFT JOIN `group_member` ON `group`.id = group_member.group_id
    WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND MOD(user_type,2) = $my_type_mod AND group_id = `group`.id) AND `group`.id = $group_id
    GROUP BY group.id ORDER BY id_pin DESC, `group`.id DESC");
while ($group_appen = mysql_fetch_array($select_gr_pin->result)) { ?>
	<div class="custom_notify_item">
        <?if($group_appen['group_image'] != NULL){?>
            <img class="custom_notify_avt" src="<?=$group_appen['group_image']?>" alt="Ảnh lỗi" onerror="this.src=`/img/nv_default_bgi.svg`;">
        <?}else{?>
            <img class="custom_notify_avt" src="/img/nv_default_bgi.svg" alt="">
        <?}?>
        
        <div class="custom_notify_info">
            <p class="custom_notify_name"><?=$group_appen['group_name']?></p>
            <p class="custom_notify_info_des"><?=$group_appen['count_mem']?> thành viên</p>
        </div>
        <button class="ghim_group_cancel" data-group_id="<?=$group_appen['id']?>" onclick="boghim(this)">Bỏ ghim</button>
    </div>
<?php }?>
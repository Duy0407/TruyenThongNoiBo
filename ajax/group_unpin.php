<?php 
require_once '../config/config.php';

$group_id = getValue("group_id","int","POST",0);

$my_type_mod = $my_type % 2;

if($group_id > 0){
	$delete = new db_query("DELETE FROM `group_pin` WHERE `id_group` = '$group_id' AND id_user_pin = $my_id AND MOD(user_type,2) = $my_type_mod");
	if ($delete){
		$select = new db_query("SELECT COUNT(user_id) AS count_mem,`group`.*,
		case when EXISTS (SELECT id FROM group_pin WHERE group_pin.id_user_pin = $my_id AND group_pin.user_type = 1 AND group_pin.id_group = `group`.id) then 1 else 0 end as id_pin
		FROM `group` LEFT JOIN `group_member` ON `group`.id = group_member.group_id
		WHERE EXISTS (SELECT id FROM group_member WHERE user_id = $my_id AND MOD(user_type,2) = $my_type_mod AND group_id = `group`.id) AND `group`.id = $group_id
		GROUP BY group.id ORDER BY id_pin DESC, `group`.id DESC");

		while ($show_g = mysql_fetch_assoc($select->result)) {?>
			<div class="custom_notify_item">
				<?if($show_g['group_image'] != NULL){?>
					<img class="custom_notify_avt group_img" src="<?=$show_g['group_image']?>" alt="Ảnh lỗi" onerror="this.src=`/img/nv_default_bgi.svg`;">
				<?}else{?>
					<img class="custom_notify_avt" src="/img/nv_default_bgi.svg" alt="Ảnh lỗi">
				<?}?>
				<div class="custom_notify_info">
					<p class="custom_notify_name group_name"><?=$show_g['group_name']?></p>
					<p class="custom_notify_info_des group_member"><?=$show_g['count_mem']?> thành viên</p>
				</div>
				<button class="ghim_group_ghim" data-group_id="<?=$show_g['id']?>" onclick="click_ghim_group(this)">Ghim</button>
			</div>
		<?}
	}

	
	
}




?>
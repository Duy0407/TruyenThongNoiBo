<?php
require_once '../config/config.php';
$type_ghim = getValue("type_ghim","int","POST",0);
$id_post = getValue("id_post","int","POST",0);
$time = time();

$db_post = new db_query("SELECT * FROM new_feed WHERE `new_id` = $id_post");
if (mysql_num_rows($db_post->result) > 0){
	if($type_ghim != 0){
		// ghim bài viết
		$ud_ghim_post_group = new db_query("UPDATE `new_feed` SET `ghim_group` = '$type_ghim',`updated_at` = '$time' WHERE `new_id` = '$id_post'");
		// select bài viết được ghim
		$data = mysql_fetch_array($db_post->result);
		// lấy thông tin author
		$author = '';
		if ($data['author_type'] == 2){
			if (!array_key_exists($data['author'],$arr_ep)){
				$author = list_stranger_infor($data['author'])[0]['ep_name'];
			}else{
				$author = $arr_ep[$data['author']]['ep_name'];
			}
		}elseif ($data['author_type'] == 1){
			$author = list_stranger_cominfor($data['author'])[0]['com_name'];
		}
		if ($data['position'] > 0 && $data['type'] == 1){
			// ds thành viên bỏ theo dõi nhóm
			$unfollow_mem = explode(',',$arr_group[$data['position']]['following']);
			// select thành viên muốn nhận thông báo bài viết nổi bật
			$db_notify_off = new db_query("SELECT * FROM custom_notification WHERE id_group = ".$data['position']. " AND customize = 1");
			if (mysql_num_rows($db_notify_off->result) > 0){
				while ($row = mysql_fetch_array($db_notify_off->result)){
					if (!in_array($row['id_user'],$unfollow_mem)){
						$data_insert_notify = [
							'type' => 7,
							'id_user' => $my_id,
							'id_company' => $my_com_id,
							'content' =>  $author." vừa được ghim 1 bài viết lên nhóm ".$arr_group[$data['position']]['group_name'],
							'link' => "/chi-tiet-tin-dang.html?new_id=".$id_post,
							'invited_users' => $row['id_user'],
							'invited_users_type' => $row['user_type'],
							'created_at' => time(),
							'updated_at' => time(),
						];
						add('notify', $data_insert_notify);
					}
				}
			}
		}
	}else{
		$ud_ghim_post_group = new db_query("UPDATE `new_feed` SET `ghim_group` = '$type_ghim' WHERE `new_id` = '$id_post'");
	}
}


?>
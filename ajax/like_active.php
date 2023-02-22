<?php
require_once '../config/config.php';
$new_id = getValue('new_id','int','POST','');
if ($new_id == 0) {
	echo json_encode([
		'result'=>false,
		'msg'=>"Tin không tồn tại"
	]);
}
$db_post = new db_query("SELECT * FROM `new_feed` WHERE new_id = $new_id");
if (mysql_num_rows($db_post->result) > 0){
	$db_post = mysql_fetch_array($db_post->result);
	if ($db_post['type'] == 1 && array_key_exists($db_post['position'],$arr_group)){
		if ($arr_group[$db_post['position']]['group_pause'] >= time()){
			echo json_encode([
				'result' => false,
				'error' => 201,
				'msg' => 'Quản trị viên đã tạm dừng nhóm một thời gian',
			]);
			exit;
		}
	}
    if (in_array($db_post['position'], $gr_suspended_me)){
        echo json_encode([
            'result' => false,
			'error' => 201,
            'msg' => 'Bạn đã bị đình chỉ trong nhóm này',
        ]);
        exit;
    }
    $type = getValue('type','int','POST','');
    $react_type = getValue('react_type','int','POST','');
    if ($type == 0) {
    	// thêm và cập nhật
    	$db_like = new db_query("SELECT * FROM new_reaction WHERE nr_new_id = $new_id AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
    	$info_like = mysql_fetch_array($db_like->result);
		if (mysql_num_rows($db_like->result) == 0) {
			$data = [
				'nr_new_id'	=>$new_id,
				'id_user'	=>$_SESSION['login']['id'],
				'user_type'	=>$_SESSION['login']['user_type'],
				'nr_type'   => $react_type,
				'nr_created_at'=>time(),
				'nr_updated_at'=>time()
			];
			add('new_reaction',$data);
		}else{
			$data = [
				'nr_type'   => $react_type,
				'nr_updated_at'=>time()
			];
			update('new_reaction',$data, ['nr_id'=>$info_like['nr_id']]);
		} 
		// thêm thông báo
		$notify_to = explode(',',$db_post['notify_on']);
		foreach ($notify_to as $key => $value) {
			if ($my_id != $value){
				$data_insert_notify = [
					'type' => 7,
					'id_user' => $my_id,
					'id_company' => $my_com_id,
					'content' =>  $_SESSION['login']['name']." đã thích bài viết".(($value == $db_post['author'] && $db_post['author_type'] == 2)?" của bạn":" bạn được gắn thẻ"),
					'link' => "/chi-tiet-tin-dang.html?new_id=".$new_id,
					'invited_users' => $value,
					'invited_users_type' => 2,
					'created_at' => time(),
					'updated_at' => time(),
				];
				add('notify', $data_insert_notify);
			}
		}
		// bv lên top
		$data_update_post['updated_at'] = time();
		$dataId = [
			'new_id'=> $new_id
		];
		update('new_feed',$data_update_post,$dataId);
    } else {
    	// xóa
    	$qr_del = new db_query("DELETE FROM new_reaction WHERE nr_new_id = $new_id AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
    }
	echo json_encode([
		'result'=> true 
	]);
}else{
	echo json_encode([
		'result'=>false,
		'msg'=>"Tin không tồn tại"
	]);
}
?>
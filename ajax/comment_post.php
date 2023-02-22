<?php
require_once '../config/config.php';
$access_token   = $_SESSION['login']['acc_token'];
$header[]       = 'Authorization: ' . $access_token . '';
// require_once '../api/api_nv.php';
$comment = getValue('comment', 'str', 'POST', '');
$new_id = getValue('new_id', 'int', 'POST', '');
$count = getValue('count', 'int', 'POST', '');
$count = $count + 1;

if ($new_id > 0){
    $limit_cmt = new db_query("SELECT gioi_han_thanh_vien.*,new_id 
	FROM `gioi_han_thanh_vien` LEFT JOIN new_feed ON (new_feed.type = 1 AND new_feed.position = id_group) 
	WHERE new_id = ".$new_id." AND id_user_limit = $my_id AND user_limit_type = $my_type AND commem_het_han_sau >= ".time());
    if (mysql_num_rows($limit_cmt->result) > 0){
		$limit_cmt = mysql_fetch_array($limit_cmt->result);
        $id_group = $limit_cmt['id_group'];
        $limit_cmt = $limit_cmt['gioi_han_comment'];

        $st_time = strtotime(date('d-m-Y',time()));
        $en_time = $st_time + 86400 - 1;

        $cmt_in_day = new db_query("SELECT comment.*,position FROM `comment` LEFT JOIN new_feed ON id_new = new_id
        WHERE position = ".$data['position']." AND type = 1 AND id_user = $my_id AND user_type = $my_type AND created_at >= $st_time AND created_at <= $en_time");
        if (mysql_num_rows($cmt_in_day->result) >= $limit_cmt){
            echo json_encode([
                'result' => false,
                'msg' => 'Bạn đã bị giới hạn số lượt bình luật trong ngày trong nhóm này',
            ]);
            exit;
        }
    }
	if ($comment == '' && isset($_FILES['img_comment'])) {
		$check = preg_match('/image/', $_FILES['img_comment']['type']);
		if ($check == 1) {
			$duoi = explode(".", $_FILES['img_comment']['name']);
			$duoi = $duoi[count($duoi) - 1];
			$name_file = rand() . "." . $duoi;
			$name_tmp = $_FILES['img_comment']['tmp_name'];
			$dir = "../img/new_feed/comment";
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
			move_uploaded_file($name_tmp, $dir . "/" . $name_file);
		} else {
			$result = [
				'result' => false,
				'message' => 'Vui lòng tải ảnh hợp lệ',
			];
		}
		$img =  $dir . "/" . $name_file;
		$data = [
			'id_new' => $new_id,
			'id_user' => $_SESSION['login']['id'],
			'content' => '',
			'image' => $img,
			'user_type' => $_SESSION['login']['user_type'],
			'created_at' => time(),
			'updated_at' => time()
		];
		add('comment', $data);
		$id = mysql_insert_id();
		$time_active = "Vừa xong";
		$result = [
			'id' => $id,
			'avatar' =>  $_SESSION['login']['logo'],
			'name' => $_SESSION['login']['name'],
			'comment' => '',
			'img' => $img,
			'id_new' => $new_id,
			'time_active' => $time_active,
		];
	} else if ($comment != '' && !isset($_FILES['img_comment'])) {
		$data = [
			'id_new' => $new_id,
			'id_user' => $_SESSION['login']['id'],
			'content' => $comment,
			'image' => '',
			'user_type' => $_SESSION['login']['user_type'],
			'created_at' => time(),
			'updated_at' => time()
		];
		add('comment', $data);
		$id = mysql_insert_id();
		$time_active = "Vừa xong";
		$result = [
			'id' => $id,
			'avatar' =>  $_SESSION['login']['logo'],
			'name' => $_SESSION['login']['name'],
			'comment' => $comment,
			'img' => '',
			'id_new' => $new_id,
			'time_active' => $time_active,
		];
	} else if ($comment != '' && isset($_FILES['img_comment'])) {
		if ($_FILES['img_comment']['name'] != "") {
			$check = preg_match('/image/', $_FILES['img_comment']['type']);
			if ($check == 1) {
				$duoi = explode(".", $_FILES['img_comment']['name']);
				$duoi = $duoi[count($duoi) - 1];
				$name_file = rand() . "." . $duoi;
				$name_tmp = $_FILES['img_comment']['tmp_name'];
				$dir = "../img/new_feed/comment";
				if (!is_dir($dir)) {
					mkdir($dir, 0777, true);
				}
				move_uploaded_file($name_tmp, $dir . "/" . $name_file);
			} else {
				$result = [
					'result' => false,
					'message' => 'Vui lòng tải ảnh hợp lệ',
				];
			}
		}
		$img =  $dir . "/" . $name_file;
		$data = [
			'id_new' => $new_id,
			'id_user' => $_SESSION['login']['id'],
			'content' => $comment,
			'image' => $img,
			'user_type' => $_SESSION['login']['user_type'],
			'created_at' => time(),
			'updated_at' => time()
		];
		add('comment', $data);
		$id = mysql_insert_id();
		$time_active = "Vừa xong";
		$result = [
			'id' => $id,
			'avatar' =>  $_SESSION['login']['logo'],
			'name' => $_SESSION['login']['name'],
			'comment' => $comment,
			'img' => $img,
			'id_new' => $new_id,
			'time_active' => $time_active,
		];
	}
	// thêm thông báo
	$db_post = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
	if (mysql_num_rows($db_post->result) > 0){
		$db_post = mysql_fetch_array($db_post->result);
		$notify_to = explode(',',$db_post['notify_on']);
		foreach ($notify_to as $key => $value) {
			if ($my_id != $value){
				$data_insert_notify = [
					'type' => 7,
					'id_user' => $my_id,
					'id_company' => $my_com_id,
					'content' =>  $_SESSION['login']['name']." đã bình luận bài viết".(($value == $db_post['author'] && $db_post['author_type'] == 2)?" của bạn":" bạn được gắn thẻ"),
					'link' => "/chi-tiet-tin-dang.html?new_id=".$new_id."&id_cmt=".$id,
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
			'new_id'=>$new_id
		];
		
		update('new_feed',$data_update_post,$dataId);
	}

	echo json_encode([
		'result' => true,
		'data' => $result
	]);
}else{
	echo json_encode([
		'result' => false
	]);
}

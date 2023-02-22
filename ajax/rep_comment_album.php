<?php
require_once '../config/config.php';

$comment = getValue('comment', 'str', 'POST', '');
$cmt_id = getValue('cmt_id', 'int', 'POST', '');
$parent_id = getValue('parent_id', 'int', 'POST', '');
$album_id = getValue('album_id', 'int', 'POST', '');
$count = getValue('count', 'int', 'POST', '');
$oldimg_comment = getValue('oldimg_comment', 'str', 'POST', '');
$count = $count + 1;
// xử lý ảnh
if (isset($_FILES['img_comment'])) {
    $check = preg_match('/image/', $_FILES['img_comment']['type']);
    if ($check == 1) {
        $duoi = explode(".", $_FILES['img_comment']['name']);
        $duoi = $duoi[count($duoi) - 1];
        $name_file = rand() . "." . $duoi;
        $name_tmp = $_FILES['img_comment']['tmp_name'];
        $dir = "../img/album/comment";
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        move_uploaded_file($name_tmp, $dir . "/" . $name_file);
    } else {
        echo json_encode([
            'result' => false,
            'message' => 'Vui lòng tải ảnh hợp lệ',
        ]);
        exit;
    }
    $img =  $dir . "/" . $name_file;
}elseif ($oldimg_comment != '' && $oldimg_comment != 'undefined'){
    $img = $oldimg_comment;
}else{
    $img = '';
}
if ($cmt_id <= 0){
	if ($img != '' || $comment != ''){
		$data = [
			'album_id' => $album_id,
			'user_id' => $_SESSION['login']['id'],
			'user_type' => $_SESSION['login']['user_type'],
			'content' => $comment,
			'image' => $img,
			'id_parent' => $parent_id,
			'created_at' => time(),
			'updated_at' => time()
		];
		add('comment_album', $data);
		$id = mysql_insert_id();
		if ($id > 0){
			$time_active = "Vừa xong";
			$result = [
				'id' => $id,
				'avatar' =>  $_SESSION['login']['logo'],
				'name' => $_SESSION['login']['name'],
				'comment' => $comment,
				'img' => $img,
				'time_active' => $time_active,
			];
			// thêm thông báo
			$db_album = new db_query("SELECT * FROM album WHERE id = $album_id");
			$db_album = mysql_fetch_array($db_album->result);
			$db_post = new db_query("SELECT * FROM comment_album WHERE id = $parent_id");
			if (mysql_num_rows($db_post->result) > 0){
				$db_post = mysql_fetch_array($db_post->result);
				if ($my_id != $db_post['user_id'] || $my_type != $db_post['user_type']){
					$data_insert_notify = [
						'type' => 7,
						'id_user' => $my_id,
						'id_company' => $my_com_id,
						'content' =>  $_SESSION['login']['name']." đã trả lời bình luận của bạn",
						'link' => (($db_post['user_type']==2)?"/trang-ca-nhan-e":"/trang-ca-nhan-e").$db_album['user_id']."/album-a".$album_id."?id_cmt=".$id."&parent_id=".$parent_id,
						'invited_users' => $db_post['user_id'],
						'invited_users_type' => $db_post['user_type'],
						'created_at' => time(),
						'updated_at' => time(),
					];
					add('notify', $data_insert_notify);
				}
			}
			echo json_encode([
				'result' => true,
				'data' => $result
			]);
			exit;
		}else{
			echo json_encode([
				'result' => false,
				'message' => 'Có lỗi xảy ra',
			]);
			exit;
		}
	}else{
		echo json_encode([
			'result' => false,
			'message' => 'Thông tin tải lên không hợp lệ',
		]);
		exit;
	}
}else{
	$db_new_id = new db_query("SELECT album_id,image FROM comment_album WHERE id = $cmt_id AND album_id = $album_id");
    $row = mysql_fetch_array($db_new_id->result);
    $arr_id = [
        'id' => $cmt_id,
		'album_id' => $album_id,
    ];
    if ($img != '' || $comment != ''){
        $data = [
            'content' => $comment,
            'image' => $img,
            'updated_at' => time()
        ];
        update('comment_album', $data, $arr_id);
    }else{
		echo json_encode([
			'result' => false,
			'message' => 'Thông tin tải lên không hợp lệ',
		]);
		exit;
	}
    if ($img == '') {
        if (is_writable($row['image'])) {
            unlink($row['image']);
        }
    }
    $result = [
        'album_id' => $row['album_id'],
        'id_cmt' => $cmt_id,
        'img' => $img,
        'time' => time_elapsed_string(time()),
    ];
    echo json_encode([
        'result' => true,
        'data' => $result
    ]);
}

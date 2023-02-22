<?php
require_once '../config/config.php';
$access_token   = $_SESSION['login']['acc_token'];
$header[]       = 'Authorization: ' . $access_token . '';
require_once '../api/api_nv.php';
$comment = getValue('comment', 'str', 'POST', '');
$cmt_id = getValue('cmt_id', 'int', 'POST', '');
$album_id = getValue('album_id', 'int', 'POST', '');
$count = getValue('count', 'int', 'POST', '');
$avatar = getValue('avatar', 'str', 'POST', '');
$count = $count + 1;
if ($cmt_id <= 0){
	if ($comment == '' && isset($_FILES['img_comment'])) {
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
			$result = [
				'result' => false,
				'message' => 'Vui lòng tải ảnh hợp lệ',
			];
		}
		$img =  $dir . "/" . $name_file;
		$data = [
			'album_id' => $album_id,
			'user_id' => $_SESSION['login']['id'],
			'content' => '',
			'image' => $img,
			'user_type' => $_SESSION['login']['user_type'],
			'created_at' => time(),
			'updated_at' => time()
		];
		add('comment_album', $data);
		$id = mysql_insert_id();
		$time_active = "Vừa xong";
		$result = [
			'id' => $id,
			'avatar' =>  $_SESSION['login']['logo'],
			'name' => $_SESSION['login']['name'],
			'comment' => '',
			'img' => $img,
			'time_active' => $time_active,
		];
	} else if ($comment != '' && !isset($_FILES['img_comment'])) {
		$data = [
			'album_id' => $album_id,
			'user_id' => $_SESSION['login']['id'],
			'content' => $comment,
			'image' => '',
			'user_type' => $_SESSION['login']['user_type'],
			'created_at' => time(),
			'updated_at' => time()
		];
		add('comment_album', $data);
		$id = mysql_insert_id();
		$time_active = "Vừa xong";
		$result = [
			'id' => $id,
			'avatar' =>  $_SESSION['login']['logo'],
			'name' => $_SESSION['login']['name'],
			'comment' => $comment,
			'img' => '',
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
				$dir = "../img/album/comment";
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
			'album_id' => $album_id,
			'user_id' => $_SESSION['login']['id'],
			'content' => $comment,
			'image' => $img,
			'user_type' => $_SESSION['login']['user_type'],
			'created_at' => time(),
			'updated_at' => time()
		];
		add('comment_album', $data);
		$id = mysql_insert_id();
		$time_active = "Vừa xong";
		$result = [
			'id' => $id,
			'avatar' =>  $_SESSION['login']['logo'],
			'name' => $_SESSION['login']['name'],
			'comment' => $comment,
			'img' => $img,
			'time_active' => $time_active,
		];
	}
	// thêm thông báo
	$db_post = new db_query("SELECT * FROM album WHERE id = $album_id");
	if (mysql_num_rows($db_post->result) > 0){
		$db_post = mysql_fetch_array($db_post->result);
		if ($my_id != $db_post['user_id'] || $my_type != $db_post['user_type']){
			$data_insert_notify = [
				'type' => 7,
				'id_user' => $my_id,
				'id_company' => $my_com_id,
				'content' =>  $_SESSION['login']['name']." đã bình luận album của bạn",
				'link' => (($db_post['user_type']==2)?"/trang-ca-nhan-e":"/trang-ca-nhan-e").$db_post['user_id']."/album-a".$album_id."?id_cmt=".$id,
				'invited_users' => $db_post['user_id'],
				'invited_users_type' => $db_post['user_type'],
				'created_at' => time(),
				'updated_at' => time(),
			];
			add('notify', $data_insert_notify);
		}
	}
}else{
	$db_new_id = new db_query("SELECT album_id,image FROM comment_album WHERE id = $cmt_id AND album_id = $album_id");
    $row = mysql_fetch_array($db_new_id->result);
    $arr_id = [
        'id' => $cmt_id,
		'album_id' => $album_id,
    ];
    $img = '';
    if ($avatar !=  'undefined' && $avatar != '') {
        $img = $avatar;
    }
    if ($comment == '' && isset($_FILES['img_comment'])) {
        if ($_FILES['img_comment']['name'] != "") {
            $check = preg_match('/image/', $_FILES['img_comment']['type']);
            if ($check == 1) {
                if (is_writable($row['image'])) {
                    unlink($row['image']);
                }
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
            'content' => $comment,
            'image' => $img,
            'updated_at' => time()
        ];
        update('comment_album', $data, $arr_id);
    } else if ($comment != '' && !isset($_FILES['img_comment'])) {
        $data = [
            'content' => $comment,
            'image' => $img,
            'updated_at' => time()
        ];
        update('comment_album', $data, $arr_id);
    } else if ($comment != '' && isset($_FILES['img_comment'])) {
        if ($_FILES['img_comment']['name'] != "") {
            $check = preg_match('/image/', $_FILES['img_comment']['type']);
            if ($check == 1) {
                if (is_writable($row['image'])) {
                    unlink($row['image']);
                }
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
            'content' => $comment,
            'image' => $img,
            'updated_at' => time()
        ];
        update('comment_album', $data, $arr_id);
    }else if ($comment == "" && !isset($_FILES['img_comment'])) {
        $data = [
            'content' => $comment,
            'image' => $img,
            'updated_at' => time()
        ];
        update('comment_album', $data, $arr_id);
    }
    if ($img == '') {
        if (is_writable($row['image'])) {
            unlink($row['image']);
        }
    }
    $result = [
        'result' => true,
        'album_id' => $row['album_id'],
        'id_cmt' => $cmt_id,
        'img' => $img,
        'time' => time_elapsed_string(time()),
    ];
}
echo json_encode([
	'result' => true,
	'data' => $result
]);

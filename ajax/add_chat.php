<?php
require_once '../config/config.php';
$content = getValue('content','str','POST','');
$chat_type = getValue('chat_type','int','POST','');
$chat_id = getValue('chat_id','int','POST','');
$room = getValue('room','int','POST','');

$data = [
  'id_user' => $_SESSION['login']['id'],
  'user_type' => $_SESSION['login']['user_type'],
  'content' => $content,
  'chat_type' => $chat_type,
  'room' => $room,
  'id_parent' => $chat_id,
  'created_at' => time(),
  'updated_at' => time()
];

$name_file = "";
$path_file = "";
if (isset($_FILES['file'])) {
  $db_room = new db_query("SELECT id FROM room_chat WHERE id = $room");
  $row_room = mysql_fetch_array($db_room->result);
  if (!is_dir('../img/chat/' . $row_room['id'] . '/file')) {
    mkdir('../img/chat/' . $row_room['id'] . '/file', 0777, true);
  }

  if (!is_dir('../img/chat/' . $row_room['id'] . '/image')) {
    mkdir('../img/chat/' . $row_room['id'] . '/image', 0777, true);
  }
  $dir1 = '../img/chat/' . $row_room['id'] . '/file';
  $dir2 = '../img/chat/' . $row_room['id'] . '/image';

  for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
    $duoi = explode('.', $_FILES['file']['name'][$i]);
    $duoi = $duoi[count($duoi) - 1];
    $file = rand() . '.' . $duoi;
    if (preg_match('/image/', $_FILES['file']['type'][$i]) == true) {
      move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir2 . '/' . $file);
      $dir_file = $dir2 . '/' . $file;
    }else{
      move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir1 . '/' . $file);
      $dir_file = $dir1 . '/' . $file;
    }
    
    if ($i < count($_FILES['file']['name']) - 1) {
      $name_file = $name_file . $_FILES['file']['name'][$i] . "||";
      $path_file = $path_file . $dir_file . "||";
    }else{
      $name_file = $name_file . $_FILES['file']['name'][$i];
      $path_file = $path_file . $dir_file;
    }
    
    $data['name_file'] = $name_file;
    $data['file'] = $path_file;
  }
  
}

add('chat', $data);
$id = mysql_insert_id();
$db_data = new db_query("SELECT * FROM chat WHERE id = $id");
$row_chat = mysql_fetch_array($db_data->result);
$html = '';
if ($row_chat['file'] != "") {
  $file = explode('||', $row_chat['file']);
			$name_file = explode('||', $row_chat['name_file']);
			$arr_image = [];
			$arr_file = [];
			$arr_name_file = [];
			for ($i=0; $i < count($file); $i++) { 
				if (preg_match('/image/', $file[$i]) == true) {
					$arr_image[] = $file[$i];
				}else{
					$arr_file[] = $file[$i];
					$arr_name_file[] = $name_file[$i];
				}
			}
			// 1 Ảnh
			if (count($arr_image) == 1) {
				$html = $html . '<div class="v_content_box_chat_me v_content_box_chat2" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
				<p class="v_content_box_chat_me_text">'.date('H:i', $row_chat['created_at']).'</p>
				<div class="v_block_content_mess">
				<div class="v_chat_select2">
				<div class="v_more_chat">
				<img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
				<div class="v_chat_custom">
				<div class="v_chat_custom_div">Chỉnh sửa</div>
				<div class="v_chat_custom_div">Sao chép</div>
				<div class="v_chat_custom_div">Chuyển tiếp</div>
				<div class="v_chat_custom_div">Xóa</div>
				</div>
				</div>
				</div>
				<div class="v_content_box_div_file"><img class="v_first_box_img" src="'.$arr_image[0].'" alt="Ảnh lỗi"></div>
				</div>
				</div>';
			}else{
				// 2,3 ảnh
				if (count($arr_image) == 2 || count($arr_image) == 3) {
					$html_img = "";
					for ($i=0; $i < count($arr_image); $i++) { 
						if ($i < 2) {
							$html_img = $html_img . '<img class="more_box_second_img" src="'.$arr_image[$i].'" alt="Ảnh lỗi">';
						}else{
							$html_img = $html_img . '<div class="v_more_box_img2">+1</div>';
						}
					}
					$html = $html . '<div class="v_content_box_chat_me v_content_box_chat2">
            <p class="v_content_box_chat_me_text">' . date('H:i', $row_chat['created_at']) . '</p>
            <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
            <div class="v_chat_select2">
            <div class="v_more_chat">
            <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
            <div class="v_chat_custom">
            <div class="v_chat_custom_div">Chỉnh sửa</div>
            <div class="v_chat_custom_div">Chuyển tiếp</div>
            <div class="v_chat_custom_div">Xóa</div>
            </div>
            </div>
            </div>
            <div class="v_content_box_div_file v_content_box_div_file2">
            ' . $html_img . '
            </div>
            </div>
            </div>';
				}else{
					//Lớn hơn 4 ảnh
					$html_img = '';
            for ($i = 0; $i < count($arr_image); $i++) {
                if ($i < 4) {
                    $url_file = $arr_image[$i];
                    $html_img = $html_img . '<img class="more_box_four_img" src="' . $url_file . '" alt="Ảnh lỗi">';
                } else {
                    $html_img = $html_img . '<div class="v_more_box_img">+' . (count($arr_image) - 4) . '</div>';
                    break;
                }
            }
						$html = $html . '<div class="v_content_box_chat_me v_content_box_chat2">
            <p class="v_content_box_chat_me_text">'.date('H:i', $row_chat['created_at']).'</p>
            <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
            <div class="v_chat_select2">
            <div class="v_more_chat">
            <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
            <div class="v_chat_custom">
            <div class="v_chat_custom_div">Chỉnh sửa</div>
            <div class="v_chat_custom_div">Chuyển tiếp</div>
            <div class="v_chat_custom_div">Xóa</div>
            </div>
            </div>
            </div>
            <div class="v_content_box_div_file v_content_box_div_file4">
            ' . $html_img . '
            </div>
            </div>
            </div>';
				}
			}

			for ($i=0; $i < count($arr_file); $i++) { 
				$html = $html . '<div class="v_content_box_chat_me v_content_box_chat2">
            <p class="v_content_box_chat_me_text">'.date('H:i', $row_chat['created_at']).'</p>
            <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
            <div class="v_chat_select2">
            <div class="v_more_chat">
            <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
            <div class="v_chat_custom">
            <div class="v_chat_custom_div">Chỉnh sửa</div>
            <div class="v_chat_custom_div">Chuyển tiếp</div>
            <div class="v_chat_custom_div">Xóa</div>
            </div>
            </div>
            </div>
            <div class="v_content_box_div_file v_content_box_div_file3">
            <div class="v_box_file_detail">
            <img src="../img/v_chat_picture_file.png" alt="Ảnh lỗi">
            <a class="v_box_file_detail_span">' . $arr_name_file[$i] . '</a>
            </div>
            </div>
            </div>
            </div>';
			}
}

if ($row_chat['content'] != "") {
  $html = $html . '<div class="v_content_box_chat_me v_content_box_chat2 data-chat_id="'.$row_chat['id'].'">
  <p class="v_content_box_chat_me_text">'.date('H:i', $row_chat['created_at']).'</p>
  <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
  <div class="v_chat_select2">
  <div class="v_more_chat">
  <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
  <div class="v_chat_custom">
  <div class="v_chat_custom_div">Chỉnh sửa</div>
  <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
  <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
  <div class="v_chat_custom_div">Chuyển tiếp</div>
  <div onclick="v_del_mess(this)" class="v_chat_custom_div">Xóa</div>
  </div>
  </div>
  </div>
  <div class="v_content_box_div v_content_quote_box">'.$row_chat['content'].'</div>
  </div>
  </div>';
}

echo json_encode([
  'result' => true,
  'html' => $html,
  'time_chat' => date('H:i', time()),
  'type_you' => $_SESSION['login']['user_type'],
  'name_file' => $name_file,
  'path_file' => $path_file,
  'content' => $content,
  'chat_id' => $id
]);
?>
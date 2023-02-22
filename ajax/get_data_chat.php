<?php
require_once '../config/config.php';
$user_me = $_SESSION['login']['id'];
$type_me = $_SESSION['login']['user_type'];

$type_you = getValue('user_type', 'int', 'POST', '');
$user_you = getValue('id_user', 'int', 'POST', '');

$db_room = new db_query("SELECT * FROM room_chat WHERE (id_user1 = $user_me AND user_type1 = $type_me AND id_user2 = $user_you AND user_type2 = $type_you) OR (id_user1 = $user_you AND user_type1 = $type_you AND id_user2 = $user_me AND user_type2 = $type_me)");
if (mysql_num_rows($db_room->result) == 0) {
	$data = [
		'id_user1' => $user_me,
		'user_type1' => $type_me,
		'id_user2' => $user_you,
		'user_type2' => $type_you,
	];
	add('room_chat', $data);
	$room = mysql_insert_id();
} else {
	$row_room = mysql_fetch_array($db_room->result);
	$room = $row_room['id'];
}
$html = "";
$access_token   = $_SESSION['login']['acc_token'];
$curl           = curl_init();
$header[]       = 'Authorization: ' . $access_token . '';
$curl 	= curl_init();
curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => 'https://chamcong.24hpay.vn/service/list_all_employee_of_company.php?id_com=' . $_SESSION['login']['id_com'],
	CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
	CURLOPT_HTTPHEADER => $header,
	CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
));
$resp = curl_exec($curl);
$responsive = json_decode($resp);
$data_ep = [];
for ($i = 0; $i < count($responsive->data->items); $i++) {
	$data_ep[$responsive->data->items[$i]->ep_id] = $responsive->data->items[$i];
}

if ($type_you == 1) {
	$data_user['ep_name'] = array_values($data_ep)[0]->com_name;
	
	if (array_values($data_ep)[0]->com_logo == "") {
		$user_avatar = '../img/logo_com.png';
	}else{
		$user_avatar = 'https://chamcong.24hpay.vn/upload/company/logo/' . array_values($data_ep)[0]->com_logo;
	}
	$data_user['ep_image'] = $user_avatar;
} else {
	$data_user = $data_ep[$user_you];
	if ($data_user->ep_image == "") {
		$user_avatar = '../img/logo_com.png';
	}else{
		$user_avatar = 'https://chamcong.24hpay.vn/upload/employee/' . $data_user->ep_image;
	}
	$data_user->ep_image = $user_avatar;
}

$db_chat = new db_query("SELECT * FROM chat WHERE room = '$room'");
while ($row_chat = mysql_fetch_array($db_chat->result)) {
	if ($user_me == $row_chat['id_user']) {
		if ($row_chat['file'] != "") {
			$file = explode('||', $row_chat['file']);
			$name_file = explode('||', $row_chat['name_file']);
			$arr_image = [];
			$arr_file = [];
			$arr_name_file = [];
			for ($i = 0; $i < count($file); $i++) {
				if (preg_match('/image/', $file[$i]) == true) {
					$arr_image[] = $file[$i];
				} else {
					$arr_file[] = $file[$i];
					$arr_name_file[] = $name_file[$i];
				}
			}
			// 1 Ảnh
			if (count($arr_image) == 1) {
				$html = $html . '<div class="v_content_box_chat_me v_content_box_chat2" data-chat_id="'.$row_chat['id'].'" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
				<p class="v_content_box_chat_me_text">' . date('H:i', $row_chat['created_at']) . '</p>
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
				<div class="v_content_box_div_file"><img class="v_first_box_img" src="' . $arr_image[0] . '" alt="Ảnh lỗi"></div>
				</div>
				</div>';
			} else {
				// 2,3 ảnh
				if (count($arr_image) == 2 || count($arr_image) == 3) {
					$html_img = "";
					for ($i = 0; $i < count($arr_image); $i++) {
						if ($i < 2) {
							$html_img = $html_img . '<img class="more_box_second_img" src="' . $arr_image[$i] . '" alt="Ảnh lỗi">';
						} else {
							$html_img = $html_img . '<div class="v_more_box_img2">+1</div>';
						}
					}
					$html = $html . '<div class="v_content_box_chat_me v_content_box_chat2" data-chat_id="'.$row_chat['id'].'">
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
				} else if(count($arr_image) >= 4) {
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
					$html = $html . '<div class="v_content_box_chat_me v_content_box_chat2" data-chat_id="'.$row_chat['id'].'">
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
            <div class="v_content_box_div_file v_content_box_div_file4">
            ' . $html_img . '
            </div>
            </div>
            </div>';
				}
			}

			for ($i = 0; $i < count($arr_file); $i++) {
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
            <div class="v_content_box_div_file v_content_box_div_file3">
            <div class="v_box_file_detail">
            <img src="../img/v_chat_picture_file.png" alt="Ảnh lỗi">
            <a download href="'.$arr_file.'" class="v_box_file_detail_span">' . $arr_name_file[$i] . '</a>
            </div>
            </div>
            </div>
            </div>';
			}
		}

		if ($row_chat['content'] != "") {
			$html = $html . '<div class="v_content_box_chat_me v_content_box_chat2" data-chat_id="'.$row_chat['id'].'">
			<p class="v_content_box_chat_me_text">' . date('H:i', $row_chat['created_at']) . '</p>
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
			<div class="v_content_box_div v_content_quote_box">' . $row_chat['content'] . '</div>
			</div>
			</div>';
		}
	} else if ($user_you == $row_chat['id_user']) {

		if ($type_you == 1) {
			$ep_name = array_values($data_ep)[0]->com_name;
		} else {
			$ep_name = $data_ep[$user_you]->ep_name;
		}
		$html_detail = "";

		if ($row_chat['file'] != "") {
			$file = explode('||', $row_chat['file']);
			$name_file = explode('||', $row_chat['name_file']);
			$arr_image = [];
			$arr_file = [];
			$arr_name_file = [];
			for ($i = 0; $i < count($file); $i++) {
				if (preg_match('/image/', $file[$i]) == true) {
					$arr_image[] = $file[$i];
				} else {
					$arr_file[] = $file[$i];
					$arr_name_file[] = $name_file[$i];
				}
			}

			// 1 Ảnh
			if (count($arr_image) == 1) {
				$html_detail = $html_detail . '
				<div class="v_content_box_div_file">
					<div class="v_you_mess_cont_detail">
							<div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
									<div class="v_content_box_div_file">
											<img class="v_first_box_img" src="'.$arr_image[0].'" alt="Ảnh lỗi">
									</div>
									<div class="block_emoji">
											<img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
									</div>
									<div class="v_chat_select2 v_chat_select3">
											<div class="v_more_chat">
													<img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
													<div class="v_chat_custom">
															<div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
															<div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
															<div class="v_chat_custom_div">Chuyển tiếp</div>
													</div>
											</div>
									</div>
							</div>
					</div>
				</div>';
			} else {
				// 2,3 ảnh
				if (count($arr_image) == 2 || count($arr_image) == 3) {
					$html_img = "";
					for ($i = 0; $i < count($arr_image); $i++) {
						if ($i < 2) {
							$html_img = $html_img . '<img class="more_box_second_img" src="' . $arr_image[$i] . '" alt="Ảnh lỗi">';
						} else {
							$html_img = $html_img . '<div class="v_more_box_img2">+1</div>';
						}
					}
					$html_detail = $html_detail . '<div class="v_content_box_div_file v_content_box_div_file2">
						<div class="v_you_mess_cont_detail">
								<div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
										<div class="v_content_box_div_file v_content_box_div_file2">
												'.$html_img.'
										</div>
										<div class="block_emoji">
												<img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
										</div>
										<div class="v_chat_select2 v_chat_select3">
												<div class="v_more_chat">
														<img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
														<div class="v_chat_custom">
																<div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
																<div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
																<div class="v_chat_custom_div">Chuyển tiếp</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>';
				} else if (count($arr_image) >= 4) {
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
					$html_detail = $html_detail . '<div class="v_content_box_div_file v_content_box_div_file4">
						<div class="v_you_mess_cont_detail">
								<div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
										<div class="v_content_box_div_file v_content_box_div_file4">
												' . $html_img . '
										</div>
										<div class="block_emoji">
												<img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
										</div>
										<div class="v_chat_select2 v_chat_select3">
												<div class="v_more_chat">
														<img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
														<div class="v_chat_custom">
																<div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
																<div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
																<div class="v_chat_custom_div">Chuyển tiếp</div>
														</div>
												</div>
										</div>
								</div>
						</div>
						</div>';
				}
			}

			for ($i = 0; $i < count($arr_file); $i++) {
				$html_detail = $html_detail . '<div class="v_content_box_div_file v_content_box_div_file2 v_content_box_you_file">
						<div class="v_you_mess_cont_detail">
								<div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
								<div class="v_content_box_div_file v_content_box_div_file3">
												<div class="v_box_file_detail2">
														<img src="../img/v_chat_picture_file.png" alt="Ảnh lỗi">
														<a download href="'.$arr_file[$i].'" class="v_box_file_detail_span">' . $arr_name_file[$i] . '</a>
												</div>
								</div>
										<div class="block_emoji">
												<img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
										</div>
										<div class="v_chat_select2 v_chat_select3">
												<div class="v_more_chat">
														<img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
														<div class="v_chat_custom">
																<div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
																<div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
																<div class="v_chat_custom_div">Chuyển tiếp</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>';
			}
		}

		if ($row_chat['content'] != "") {
			$html_detail = $html_detail . '<div class="v_content_box_div_file v_content_box_div_file2 v_content_boxme_mess" data-chat_id="'.$row_chat['id'].'">
			<div class="v_you_mess_cont_detail">
				<div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
					<div class="v_content_box_div v_content_box_div2 v_content_quote_box">
							' . $row_chat['content'] . '
					</div>
					<div class="block_emoji">
							<img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
					</div>
					<div class="v_chat_select2 v_chat_select3">
							<div class="v_more_chat">
									<img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
									<div class="v_chat_custom">
											<div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
											<div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
											<div class="v_chat_custom_div">Chuyển tiếp</div>
									</div>
							</div>
					</div>
				</div>
			</div>
			</div>';
		}

		$html = $html . '<div class="v_content_box_chat_you v_content_box_chat2" data-chat_id="'.$row_chat['id'].'">
			<div class="v_list_drop_emoji" style="display: none;">
					<img class="v_list_drop_emoji_img" src="../img/v_drop_heart.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
					<img class="v_list_drop_emoji_img" src="../img/v_drop_heart_haha.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
					<img class="v_list_drop_emoji_img" src="../img/v_drop_cry.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
					<img class="v_list_drop_emoji_img" src="../img/v_drop_angry.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
					<img class="v_list_drop_emoji_img" src="../img/v_drop_like.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
					<img class="v_list_drop_emoji_img" src="../img/v_drop_dislike.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
			</div>
			<div class="v_you_avt">
					<img class="v_you_avt_detail" src="'.$user_avatar.'" alt="Ảnh lỗi">
			</div>
			<div class="v_you_mess_content">
					<p class="v_content_box_chat_you_text">' . $ep_name . ', ' . date('H:i', $row_chat['created_at']) . ' </p>
					' . $html_detail . '
			</div>
			</div>';
	}
}

$db_nickname = new db_query("SELECT * FROM nickname WHERE id_user = $user_me AND user_type = $type_me AND	id_user_tag = $user_you AND type_user_tag = $type_you");
if (mysql_num_rows($db_nickname->result) > 0) {
	$row_nickname = mysql_fetch_array($db_nickname->result);
	$nickname = $row_nickname['nick_name'];
}else{
	if ($type_you == 1) {
		$nickname = $data_user['ep_name'];
	}else{
		$nickname = $data_user->ep_name;
	}
}

echo json_encode([
	'data' => $data_user,
	'ep_name' => $nickname,
	'html' => $html,
	'room' => $room,
	'username' => $_SESSION['login']['name']
]);

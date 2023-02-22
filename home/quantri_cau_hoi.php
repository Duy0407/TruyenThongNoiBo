	<?php
	include("config.php");
	require_once '../includes/check_login.php';
	require_once '../api/api_all_info.php';
	require_once '../api/api_nv.php';
	require_once '../api/api_ct.php';
	$keyword = getValue('keyword', 'str', 'GET', '');
	// if ($_SESSION['login']['user_type'] == 2) {
	// 	check_module(4);
	// }

	// if ($_SESSION['login']['user_type'] == 1) {
	// 	$type_create = 1;
	// } else if (check_module(4)['create'] == 1) {
	// 	$type_create = 1;
	// } else {
	// 	$type_create = 0;
	// }

	// if ($_SESSION['login']['user_type'] == 1) {
	// 	$type_delete = 1;
	// } else if (check_module(4)['delete'] == 1) {
	// 	$type_delete = 1;
	// } else {
	// 	$type_delete = 0;
	// }

	$type_delete = 1;
	$type_create = 1;
	?>
	<!DOCTYPE html>
	<html lang="vi">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex,nofollow">
		<link rel="stylesheet" href="../css/reset.css?v=<?= $version ?>">
		<link rel="stylesheet" href="../css/select2.min.css?v=<?= $version ?>">
		<link rel="stylesheet" type="text/css" href="../css/caidat.css?v=<?= $ver ?>">
		<link rel="stylesheet" type="text/css" href="../css/dat.css?v=<?= $ver ?>">
		<link rel="stylesheet" href="../css/tung.css?v=<?= $ver ?>">
		<link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
		<link rel="stylesheet" href="../css/update_work.css?v=<?= $version ?>">
		<link rel="stylesheet" href="../css/qttt_trao_doi_dat_cau_hoi.css?v=<?= $version ?>">
		<link rel="stylesheet" href="../css/new_feed.css?v=<?= $version ?>">
		<link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
		<title>Trao đổi câu hỏi</title>
	</head>

	<body>
		<div id="quantri-trithuc">
			<div class="wapper">
				<!--  sidebar -->
				<?php include '../includes/cd_sidebar.php' ?>
				<!-- end side bar -->
				<div id="cdnhanvienc" class="cdnhanvienc">
					<!--     header -->
					<?php include '../includes/cd_header.php' ?>
					<!-- end header -->
					<div class="nkt2">
						<div id="main-exchange">
							<div class="seach-question">
								<form class="go-seach-questin v_go-seach-questin" method="POST" action="../handle/search_knowledge_answer.php">
									<input type="text" class="v_search" name="exchange" placeholder="Tìm kiếm câu hỏi">
									<button class="img-seach-question v_img-seach-question"><img src="../img/seachquestion.png" alt="Ảnh lỗi"></button>
								</form>
								<div class="nkttung1 traodoicauhoi">
									<div class="skhover quantri2">
										<div class="imgtraodoi"><img class="imghv1" src="../img/question3.png" alt="Ảnh lỗi"></div>
										<div class="tetx-hv trao-doi"> Trao đổi - Đặt câu hỏi</div>
									</div>

									<div class="wiki-all wk1 an2">
										<a class="hove1 hv1 hover-wiki" href="quan-tri-tri-thuc-wiki.html">
											<div class="img-traodoi"><img src="../img/wiki.png" alt="Ảnh lỗi"></div>
											<div class="tetx-hv trao-doi ">Wiki</div>
										</a>
										<a class="hove1 hv2 ct3 hover3 hover-cauhoi" href="qttt-cau-hoi-cua-toi.html">
											<div class="img-cauhoi"><img src="../img/question2.png" alt="Ảnh lỗi"></div>
											<div class="tetx-hv cau-hoi">Câu hỏi của tôi</div>
										</a>
									</div>
								</div>
								<div class="img-readinglisa"><img src="../img/readinglist.png" alt="Ảnh lỗi"></div>
							</div>
							<div class="all-question">
								<div class="mid-center">
									<?php
									if ($type_create == 1) {
									?>
										<div class="center-question">
											<form class="qusetion-myself" id="form_newfeed">
												<div class="avatar-myself">
													<img src="<?= $_SESSION['login']['logo'] ?>" alt="Ảnh lỗi">
												</div>
												<div class="text-myself">
													<input type="text" name="text-myself" id="title_post_newfeed_1" value="" placeholder="Đặt câu hỏi của bạn">
													<button style="display: none;" class="v_qttt_dang_tin">Đăng</button>
												</div>
												<div class="dangnhap">
													<p class="dn">Đăng</p>
												</div>
											</form>
											<div class="select-feature">
												<div class="upload-img">
													<div class="imgupl">
														<img src="../img/uploadimg.png" alt="Ảnh lỗi">
													</div>
													<div class="text-imgupl l_open_model_post">
														<p>Tải lên ảnh/video/tệp</p>
													</div>
												</div>
												<div class="call-name " id="nhacten">
													<div class="img-callname">
														<img src="../img/callname.png" alt="Ảnh lỗi">
													</div>
													<div class="text-callname">
														<p>Nhắc tên thành viên</p>
													</div>

												</div>
												<div class="upload">
													<div class="go-upload">
														<button type="button" class="btn_go_upload">
															<span class="btn_go_upload_span">Đăng</span>
															<img class="btn_go_upload_img" src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi">
														</button>
													</div>
												</div>
												<div class="cd-popup model_560 " id="model_dangtin">
													<div class="cd_container">
														<div class="cd_modal">
															<div class="cd_modal_header">
																<h4 class="name_header">Tải ảnh/video</h4>
																<img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl" id="close_post_newfeed">
															</div>
															<div class="modal_body_post_newfeed">
																<div class="model_top_post_newfeed">
																	<div class="img_model_top">
																		<img src="<?= $_SESSION['login']['logo'] ?>" class="img_model_top_item" alt="avatar">
																	</div>
																	<div class="text_model_top">
																		<div class="model_user_name"><?= $_SESSION['login']['name']; ?></div>
																		<div class="model_com_name"><?= $arr_com->com_name; ?></div>
																	</div>
																</div>
																<form id="form_popup_dangtin" class="model_center_post_newfeed" data-type="0">
																	<div class="model_center_post_newfeed_item">
																		<input type="text" class="title_post_newfeed" id="title_post_newfeed_2" name="" id="" autocomplete="Off" placeholder="Đặt câu hỏi của bạn">
																	</div>
																	<div class="model_center_post_newfeed_item">
																		<div class="view_img" id="view_img">
																			<div class="view_img_item1">
																				<label for="open_file_newfeed" class="label_file">
																					<img src="../img/open_file_nf.svg" alt="openfile">
																					<p class="text_image_up_file">Thêm ảnh/video/tệp</p>
																				</label>
																				<div class="close_file_newfeed">
																					<img src="../img/close_file_newfeed.svg" alt="img close">
																				</div>
																			</div>
																		</div>
																		<input type="file" name="" id="open_file_newfeed" multiple hidden>
																		<input type="file" name="" id="open_file_newfeed2" multiple hidden>
																	</div>
																	<div class="model_center_post_newfeed_item" id="view_file_nf"></div>
																	<div class="model_center_post_newfeed_item">
																		<div class="option_add_new_feed">
																			<select name="" id="select_list_ep" multiple>
																				<?
																				foreach ($arr_ep as $value) {
																				?>
																					<option value="<?= $value['ep_id'] ?>"><?= $value['ep_name'] ?></option>
																				<?
																				}
																				?>
																			</select>
																			<!-- <div>Thêm vào bài viết</div>
																		<div>
																			<img src="../img/icon_nhac.png" id="tag_ep_newfeed" class="custom_img_option">
																		</div> -->
																		</div>
																	</div>
																	<div class="model_center_post_newfeed_item post_newfeed_custom">
																		<button class="model_center_post_newfeed_btn" id="bth_cancel_model_newfeed">Hủy</button>
																		<button class="model_center_post_newfeed_btn model_center_post_newfeed_btn_custom">
																			<span class="answer_submit">Đăng</span>
																			<img class="v_answer_loading" src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi">
																		</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="opstion">
												<div class="slupload"><img src="../img/slupload.png" alt="Ảnh lỗi"></div>
												<div class="text-upload">
													<p>Tùy chỉnh đăng tin</p>
												</div>
											</div>
										</div>
									<?php
									}
									?>
									<?php
									$user_id = $_SESSION['login']['id'];
									if ($_SESSION['login']['user_type'] == 1) {
										$id_company = $_SESSION['login']['id'];
									} else {
										$id_company = $data_ep[$_SESSION['login']['id']]->com_id;
									}
									if ($keyword != "") {
										$qr = " AND content LIKE '%$keyword%'";
									} else {
										$qr = "";
									}
									$db_knowledge_answer_count = new db_query("SELECT * FROM knowledge_answer WHERE id_company = $id_company AND id_user = $user_id " . $qr);
									$db_knowledge_answer = new db_query("SELECT * FROM knowledge_answer WHERE knowledge_answer.id_company = $id_company AND id_user = $user_id " . $qr . " ORDER BY knowledge_answer.id DESC");
									while ($row = mysql_fetch_array($db_knowledge_answer->result)) {
										if ($row['user_type'] == 1) {
											if ($_SESSION['login']['user_type'] == 1) {
												$avatar_author = $_SESSION['login']['logo'];
												$name_author = $_SESSION['login']['name'];
											} else {
												$avatar_author = 'https://chamcong.24hpay.vn/upload/company/logo/' . array_values($data_ep)[0]->com_logo;
												$name_author = array_values($data_ep)[0]->com_name;
											}
											$dep_name = "";
										} else if ($row['user_type'] == 2) {
											$avatar_author = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$row['id_user']]->ep_image;
											$name_author = "." . $data_ep[$row['id_user']]->ep_name;
											$dep_name = $data_ep[$row['id_user']]->dep_name;
										}
										if ($row['knowledge_id'] == 0) {
											$id_user_tag = explode(",", $row['id_user_tag']);
											if (count($id_user_tag) > 1) {
												$text_user_tag = " và " . (count($id_user_tag) - 1);
											} else {
												$text_user_tag = "";
											}
									?>
											<div class="posts-mysl" data-id="<?= $row['id'] ?>">
												<div class="inf0-you-all">
													<div class="in4-you">
														<div class="avt-y"><img src="<?= $avatar_author ?>" class="ava-y-author" alt="Ảnh lỗi"></div>
														<div class="inf0-y">
															<div class="inf0-y-top">
																<p class="top1 top"><?= $name_author ?> </p>
																<p>&nbsp; <?= $dep_name ?> &nbsp;</p>
																<p class="top3 top"> đã đăng một câu hỏi</p>
																<?php
																if ($row['id_user_tag'] != "") {
																?>
																	<p class="top3 top" style="top: -1.5px; position: relative;"> &nbsp;cùng với <span class="top3_user_tag"><?= $data_ep[$id_user_tag[0]]->ep_name ?><?= $text_user_tag ?></span></p>
																<?php
																}
																?>
															</div>
															<div class="time-upl">
																<p><?= date("H:i d/m/Y", $row['created_at']) ?></p>
															</div>
														</div>
														<div class="item-option v_item-option">
															<img class="imgitoption" onclick="imgitoption(this)" src="../img/itoption.png" alt="Ảnh lỗi">
															<div class="item-option-con v_item-option-con">
																<div class="ul_model">
																	<div class="li_model edit_knowledge_answer" data-id="<?=$row['id']?>">
																		<img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
																		<p class="p_model">Chỉnh sửa câu hỏi</p>
																	</div>
																	<div class="li_model">
																		<img src="../img/img1.png" alt="Ảnh lỗi">
																		<p class="p_model bat-tb">Bật thông báo</p>
																	</div>
																	<?php
																	if ($_SESSION['login']['user_type'] == 1) {
																	?>
																		<div class="li_model v_del_answer" data-id="<?= $row['id'] ?>" onclick="v_del_answer(this)">
																			<img src="../img/xoacauhoi.png" alt="Ảnh lỗi">
																			<p class="p_model xoa-ch">Xóa câu hỏi</p>
																		</div>
																		<?php
																	} else {
																		$db_config = new db_query("SELECT * FROM config WHERE id_module = 4 AND id_employee = " . $_SESSION['login']['id']);
																		if (mysql_num_rows($db_config->result) > 0) {
																			$row_config = mysql_fetch_array($db_config->result);
																			if ($row_config['delete'] == 1) {
																		?>
																				<div class="li_model v_del_answer" data-id="<?= $row['id'] ?>">
																					<img src="../img/xoacauhoi.png" alt="Ảnh lỗi" onclick="v_del_answer(this)">
																					<p class="p_model xoa-ch">Xóa câu hỏi</p>
																				</div>
																	<?php
																			}
																		}
																	}
																	?>
																</div>
															</div>
														</div>
													</div>
													<div class="posts-you">
														<p><?= $row['content'] ?></p>
														<div class="anh">
															<?php
															$arr_file = [];
															$arr_name_file = [];
															$arr_video_image = [];
															$file = explode("||", $row['file']);
															$file_name = explode("||", $row['name_file']);
															for ($i = 0; $i < count($file); $i++) {
																if (preg_match("/image/", $file[$i]) == true || preg_match("/video/", $file[$i]) == true) {
																	$arr_video_image[] = $file[$i];
																} else {
																	$arr_file[] = $file[$i];
																	$arr_name_file[] = $file_name[$i];
																}
															}
															for ($i = 0; $i < count($arr_video_image); $i++) {
																if (preg_match("/image/", $file[$i]) == true) {
															?>
																	<div class="anh1"> <img class="anh1_answer" src="<?= $arr_video_image[$i] ?>" alt="Ảnh lỗi"> </div>
																<?php
																} else {
																?>
																	<div class="anh1">
																		<video controls>
																			<source src="<?= $arr_video_image[$i] ?>" type="video/mp4">
																		</video>
																	</div>
																<?php
																}
															}

															for ($i = 0; $i < count($arr_file); $i++) {
																$size = filesize($arr_file[$i]) / 1024;
																if ($size < 1024) {
																	$filesize = number_format($size, 1) . " KB";
																} else {
																	$filesize = number_format($size / 1024, 1) . " MB";
																}
																?>
																<a download class="v_file_alert02" href="<?= $arr_file[$i] ?>">
																	<div class="v_file_alert02_name"><?= $arr_name_file[$i] ?></div>
																	<div class="v_file_alert02_time_size">
																		<?= $filesize ?>
																		&nbsp;
																		<?= date("H:i d/m/Y", $row['created_at']) ?>
																	</div>
																	<img class="v_file_alert02_icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
																</a>
															<?php
															}
															?>
														</div>
													</div>
													<!--   <hr class="hrrr"> -->
													<div class="emotion-coments">
														<div class="emotion" onclick="v_emotion(this)">
															<img src="../img/itemtl.png" alt="Ảnh lỗi">
															<p>Trả lời</p>
														</div>
														<div class="coments-count">
															<?php
															$db_comment_knowledge = new db_query("SELECT * FROM comment_knowledge WHERE id_parent = 0 AND knowledge_answer_id = " . $row['id'] . " ORDER BY id DESC LIMIT 0,3");
															$db_comment_knowledge_count = new db_query("SELECT * FROM comment_knowledge WHERE knowledge_answer_id = " . $row['id'] . " ORDER BY id DESC");
															if (mysql_num_rows($db_comment_knowledge_count->result) == 0) {
																$comment_count = "Chưa có câu trả lời";
															} else if (mysql_num_rows($db_comment_knowledge_count->result) > 0) {
																$comment_count = mysql_num_rows($db_comment_knowledge_count->result) . " câu trả lới";
															}
															?>
															<p><?= $comment_count ?></p>
														</div>
													</div>
													<!--  <hr class="hrrr"> -->
												</div>
												<div class="reply-your">
													<div class="avt-reply"><img class="v_avt-reply_img" src="<?= $_SESSION['login']['logo'] ?>" alt="Ảnh lỗi"></div>
													<form class="reply-cmt v_reply_answer" data-id="<?= $row['id'] ?>" data-type="0" onsubmit="return v_reply_answer(this);">
														<input type="text" class="v_reply content" onkeyup="v_reply(this)" name="" value="" placeholder="Viết câu trả lời">
														<img class="stitem" src="../img/stitem.png" alt="Ảnh lỗi">
														<img class="avtitem" src="../img/avtitem.png" alt="Ảnh lỗi">
														<input type="file" class="upload_file_question" hidden>
														<button class="v_gui_comment"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
													</form>
												</div>
												<div class="coment-all">
													<?php
													while ($row2 = mysql_fetch_array($db_comment_knowledge->result)) {
														if ($row2['user_type'] == 1) {
															if ($_SESSION['login']['user_type'] == 1) {
																$name_author = $_SESSION['login']['name'];
																$dep_name = "";
																$avatar_img = $_SESSION['login']['logo'];
															} else {
																$name_author = array_values($data_ep)[0]->com_name;
																$dep_name = "";
																$avatar_img = 'https://chamcong.24hpay.vn/upload/company/logo/' . array_values($data_ep)[0]->com_logo;
															}
														} else {
															$name_author = ". " . $data_ep[$row2['id_user']]->ep_name;
															$dep_name = ". " . $data_ep[$row2['id_user']]->dep_name;
															$avatar_img = $data_ep[$row2['id_user']]->ep_image;
														}
														$time_sort = time() - $row2['created_at'];
														if ($time_sort < 60) {
															$time = date("s", $time_sort) . " giây trước";
														} else if ($time_sort < 3600) {
															$time = date("i", $time_sort) . " phút trước";
														} else if ($time_sort < 86400) {
															$time = date("H", $time_sort) . " giờ trước";
														} else {
															$time = "";
														}
													?>
														<div class="v_list_answer" data-id="<?= $row2['id'] ?>">
															<div class="pl-coments">
																<div class="pl-coments-top v_pl-coments-top">
																	<div class="sauvang"><img src="<?= $avatar_img ?>" alt="Ảnh lỗi"></div>
																	<div class="v_pl">
																		<div class="pl v_pl2">
																			<div class="pltop">
																				<p class="pl-name"><?= $name_author ?></p>
																				<p class="pl-info"><?= $dep_name ?></p>
																				<div class="sau3-lon" onclick="v_popup_active(this)">
																					<img class="imgsau3" src="../img/sau3.png" alt="Ảnh lỗi">
																					<div class="sau3-con">
																						<div class="ul_model">
																							<?php
																							if ($type_create == 1) {
																							?>
																								<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_edit_comment_knowledge(this)">
																									<img src="../img/tung2.png" alt="Ảnh lỗi">
																									<p class="p_model">Chỉnh sửa bình luận</p>
																								</div>
																							<?php
																							} else {
																							?>
																								<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_edit_comment_knowledge(this)">
																									<img src="../img/tung2.png" alt="Ảnh lỗi">
																									<p class="p_model">Chỉnh sửa bình luận</p>
																								</div>
																							<?php
																							}
																							?>
																							<?php
																							if ($type_delete == 1) {
																							?>
																								<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_del_list_answer(this)">
																									<img src="../img/tung4.png" alt="Ảnh lỗi">
																									<p class="p_model">Xóa bình luận</p>
																								</div>
																							<?php
																							} else if ($row2['id_user'] == $_SESSION['login']['id']) {
																							?>
																								<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_del_list_answer(this)">
																									<img src="../img/tung4.png" alt="Ảnh lỗi">
																									<p class="p_model">Xóa bình luận</p>
																								</div>
																							<?php
																							}
																							?>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="pl-text">
																				<p><?= $row2['content'] ?></p>
																			</div>
																		</div>
																		<div class="pl-coments-like v_pl-coments-like">
																			<?php
																			$db_check = new db_query("SELECT * FROM like_comment_knowledge WHERE comment_knowledge_id = " . $row2['id'] . " AND id_user = " . $_SESSION['login']['id']);
																			if (mysql_num_rows($db_check->result) == 0) {
																			?>
																				<div class="likecoment" onclick="likecomment(this)" data-id="<?= $row2['id'] ?>">
																					Thích .
																				</div>
																			<?php
																			} else {
																			?>
																				<div class="likecoment1" onclick="likecomment(this)" data-id="<?= $row2['id'] ?>">
																					Đã thích .
																				</div>
																			<?php
																			}
																			?>
																			<p class="text-tl" onclick="text_tl(this)"> Trả lời</p>
																			<p class="text-time">. <?= $time ?></p>
																		</div>
																		<div class="v_list_parent_reply">
																			<?php
																			$db_reply = new db_query("SELECT * FROM comment_knowledge WHERE id_parent = " . $row2['id'] . " ORDER BY id DESC LIMIT 0,3");
																			while ($row_reply = mysql_fetch_array($db_reply->result)) {
																				if ($row_reply['user_type'] == 1) {
																					$avatar_img = $_SESSION['login']['logo'];
																				} else {
																					$avatar_img = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$row_reply['id_user']]->ep_image;
																				}
																			?>
																				<div class="v_list_reply_cmt" data-id="<?= $row_reply['id'] ?>">
																					<div><img class="v_list_reply_cmt_avt" src="<?= $avatar_img ?>" alt="Ảnh lỗi"></div>
																					<div class="v_list_reply_cmt03">
																						<div class="v_list_reply_content">
																							<div class="v_list_reply_info">
																								<?php
																								if ($row_reply['user_type'] == 1) {
																									$name = $_SESSION['login']['name'];
																									$dep_name = "";
																								} else if ($row_reply['user_type'] == 2) {
																									$name = $data_ep[$row_reply['id_user']]->ep_name;
																									$dep_name = ". " . $data_ep[$row_reply['id_user']]->dep_name;
																								}
																								?>
																								<p class="v_list_reply_name"><?= $name ?></p>
																								<p class="v_list_reply_dep"> <?= $dep_name ?></p>
																								<div class="sau3-lon" onclick="v_popup_active2(this)">
																									<img class="imgsau3" src="../img/sau3.png" alt="Ảnh lỗi">
																									<div class="sau3-con">
																										<div class="ul_model">
																											<?php
																											if ($row2['id_user'] == $_SESSION['login']['id']) {
																											?>
																												<div class="li_model" data-id="<?= $row_reply['id'] ?>" onclick="v_edit_comment_knowledge2(this)">
																													<img src="../img/tung2.png" alt="Ảnh lỗi">
																													<p class="p_model">Chỉnh sửa bình luận</p>
																												</div>
																											<?php
																											}
																											?>
																											<?php
																											$check_config_delete = check_config($_SESSION['login']['id'], 4, 'delete');
																											if ($_SESSION['login']['user_type'] == 1 || $row2['id_user'] == $_SESSION['login']['id'] || $check_config_delete = 1) {
																											?>
																												<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_del_list_answer(this)">
																													<img src="../img/tung4.png" alt="Ảnh lỗi">
																													<p class="p_model">Xóa bình luận</p>
																												</div>
																											<?php
																											}
																											?>
																										</div>
																									</div>
																								</div>
																							</div>
																							<p class="v_list_reply_detail">
																								<?= $row_reply['content'] ?>
																							</p>
																						</div>
																						<?php
																						$db_check_like = new db_query("SELECT * FROM like_comment_knowledge WHERE comment_knowledge_id = " . $row_reply['id'] . " AND id_user = " . $_SESSION['login']['id']);
																						if (mysql_num_rows($db_check_like->result) == 0) {
																						?>
																							<div class="v_list_reply_time">
																								<p class="v_list_reply_like" data-id="<?= $row_reply['id'] ?>" onclick="likecomment(this)">Thích . </p>
																								<p class="v_list_reply_time2"><?=$time?></p>
																							</div>
																						<?php
																						} else {
																						?>
																							<div class="v_list_reply_time">
																								<p class="v_list_reply_like02" data-id="<?= $row_reply['id'] ?>" onclick="likecomment(this)">Đã thích . </p>
																								<p class="v_list_reply_time2"><?=$time?></p>
																							</div>
																						<?php
																						}
																						?>
																					</div>
																				</div>
																			<?php
																			}
																			?>
																		</div>
																		<div class="reply-your">
																			<div class="avt-reply"><img class="v_avt-reply_img" src="<?= $_SESSION['login']['logo'] ?>" alt="Ảnh lỗi"></div>
																			<form class="reply-cmt v_reply-cmt" data-id="<?= $row2['id'] ?>" data-type="0" onsubmit="return v_reply_cmt(this)">
																				<input type="text" class="v_reply" onkeyup="v_reply02(this)" name="" value="" placeholder="Viết câu trả lời">
																				<img class="stitem" src="../img/stitem.png" alt="Ảnh lỗi">
																				<img class="avtitem" src="../img/avtitem.png" alt="Ảnh lỗi">
																				<input type="text" value="<?= $row2['id'] ?>" class="v_id_cmt_knowledge" hidden readonly>
																				<button class="v_gui_comment"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<?php
													}
													?>
												</div>
												<div class="see-question">
													<?php
													if (mysql_num_rows($db_comment_knowledge_count->result) > 3) {
													?>
														<p class="see-question-previous" data-id="<?= $row['id'] ?>" onclick="see_question(this)">Xem câu trả lời trước</p>
													<?php
													}
													?>
												</div>
											</div>
										<?php
										} else {
											$db_knowledge = new db_query("SELECT * FROM knowledge WHERE id = " . $row['knowledge_id']);
											$row_k = mysql_fetch_array($db_knowledge->result);
											$size = filesize("../img/knowledge/" . $row['id_user'] . "/" . $row_k['file']) / 1024;
											if ($size < 1024) {
												$filesize = number_format($size, 1) . " KB";
											} else {
												$filesize = number_format($size / 1024, 1) . " MB";
											}
										?>
											<div class="posts-mysl" data-id="<?= $row['id'] ?>">
												<div class="inf0-you-all">
													<div class="in4-you">
														<div class="avt-y"><img src="<?= $avatar_author ?>" class="ava-y-author" alt="Ảnh lỗi"></div>
														<div class="inf0-y">
															<div class="inf0-y-top">
																<p class="top1 top"><?= $name_author ?> </p>
																<p>&nbsp; <?= $dep_name ?> &nbsp;</p>
																<p class="top3 top"> đã đăng một câu hỏi</p>
																<?php
																if ($row['id_user_tag'] != "") {
																?>
																	<p class="top3 top" style="top: -1.5px; position: relative;"> &nbsp;cùng với <span class="top3_user_tag"><?= $data_ep[$id_user_tag[0]]->ep_name ?><?= $text_user_tag ?></span></p>
																<?php
																}
																?>
															</div>
															<div class="time-upl">
																<p><?= date("H:i d/m/Y", $row['created_at']) ?></p>
															</div>
														</div>
														<div class="item-option v_item-option">
															<img class="imgitoption" onclick="imgitoption(this)" src="../img/itoption.png" alt="Ảnh lỗi">
															<div class="item-option-con v_item-option-con">
																<div class="ul_model">
																	<div class="li_model">
																		<img src="../img/img1.png" alt="Ảnh lỗi">
																		<p class="p_model bat-tb">Bật thông báo</p>
																	</div>
																	<?php
																	if ($_SESSION['login']['user_type'] == 1) {
																	?>
																		<div class="li_model v_del_answer" data-id="<?= $row['id'] ?>" onclick="v_del_answer(this)">
																			<img src="../img/xoacauhoi.png" alt="Ảnh lỗi">
																			<p class="p_model xoa-ch">Xóa câu hỏi</p>
																		</div>
																		<?php
																	} else {
																		$db_config = new db_query("SELECT * FROM config WHERE id_module = 4 AND id_employee = " . $_SESSION['login']['id']);
																		if (mysql_num_rows($db_config->result) > 0) {
																			$row_config = mysql_fetch_array($db_config->result);
																			if ($row_config['delete'] == 1) {
																		?>
																				<div class="li_model v_del_answer" data-id="<?= $row['id'] ?>">
																					<img src="../img/xoacauhoi.png" alt="Ảnh lỗi" onclick="v_del_answer(this)">
																					<p class="p_model xoa-ch">Xóa câu hỏi</p>
																				</div>
																	<?php
																			}
																		}
																	}
																	?>
																</div>
															</div>
														</div>
													</div>
													<div class="posts-you">
														<p><?= $row['content'] ?></p>
														<div class="anh">
															<a download="" class="v_file_alert02" href="../img/knowledge/<?= $row['id_user'] ?>/<?= $row['file'] ?>">
																<div class="v_file_alert02_name"><?= $row_k['name_file'] ?></div>
																<div class="v_file_alert02_time_size">
																	<?= $filesize ?>
																	&nbsp;
																	<?= date("H:i d/m/Y", $row_k['created_at']) ?>
																</div>
																<img class="v_file_alert02_icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
															</a>
														</div>
													</div>
													<!--   <hr class="hrrr"> -->
													<div class="emotion-coments">
														<div class="emotion" onclick="v_emotion(this)">
															<img src="../img/itemtl.png" alt="Ảnh lỗi">
															<p>Trả lời</p>
														</div>
														<div class="coments-count">
															<?php
															$db_comment_knowledge = new db_query("SELECT * FROM comment_knowledge WHERE id_parent = 0 AND knowledge_answer_id = " . $row['id'] . " ORDER BY id DESC LIMIT 0,3");
															$db_comment_knowledge_count = new db_query("SELECT * FROM comment_knowledge WHERE knowledge_answer_id = " . $row['id'] . " ORDER BY id DESC");
															if (mysql_num_rows($db_comment_knowledge_count->result) == 0) {
																$comment_count = "Chưa có câu trả lời";
															} else if (mysql_num_rows($db_comment_knowledge_count->result) > 0) {
																$comment_count = mysql_num_rows($db_comment_knowledge_count->result) . " câu trả lới";
															}
															?>
															<p><?= $comment_count ?></p>
														</div>
													</div>
													<!--  <hr class="hrrr"> -->
												</div>
												<div class="reply-your">
													<div class="avt-reply"><img class="v_avt-reply_img" src="<?= $_SESSION['login']['logo'] ?>" alt="Ảnh lỗi"></div>
													<form class="reply-cmt v_reply_answer" data-id="<?= $row['id'] ?>" data-type="0" onsubmit="return v_reply_answer(this);">
														<input type="text" class="v_reply content" onkeyup="v_reply(this)" name="" value="" placeholder="Viết câu trả lời">
														<img class="stitem" src="../img/stitem.png" alt="Ảnh lỗi">
														<img class="avtitem" src="../img/avtitem.png" alt="Ảnh lỗi">
														<input type="file" class="upload_file_question" hidden>
														<button class="v_gui_comment"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
													</form>
												</div>
												<div class="coment-all">
													<?php
													while ($row2 = mysql_fetch_array($db_comment_knowledge->result)) {
														if ($row2['user_type'] == 1) {
															if ($_SESSION['login']['user_type'] == 1) {
																$name_author = $_SESSION['login']['name'];
																$dep_name = "";
																$avatar_img = $_SESSION['login']['logo'];
															} else {
																$name_author = array_values($data_ep)[0]->com_name;
																$dep_name = "";
																$avatar_img = 'https://chamcong.24hpay.vn/upload/company/logo/' . array_values($data_ep)[0]->com_logo;
															}
														} else {
															$name_author = ". " . $data_ep[$row2['id_user']]->ep_name;
															$dep_name = ". " . $data_ep[$row2['id_user']]->dep_name;
															$avatar_img = $data_ep[$row2['id_user']]->ep_image;
														}
														$time_sort = time() - $row2['created_at'];
														if ($time_sort < 60) {
															$time = date("s", $time_sort) . " giây trước";
														} else if ($time_sort < 3600) {
															$time = date("i", $time_sort) . " phút trước";
														} else if ($time_sort < 86400) {
															$time = date("H", $time_sort) . " giờ trước";
														} else {
															$time = "";
														}
													?>
														<div class="v_list_answer" data-id="<?= $row2['id'] ?>">
															<div class="pl-coments">
																<div class="pl-coments-top v_pl-coments-top">
																	<div class="sauvang"><img src="<?= $avatar_img ?>" alt="Ảnh lỗi"></div>
																	<div class="v_pl">
																		<div class="pl v_pl2">
																			<div class="pltop">
																				<p class="pl-name"><?= $name_author ?></p>
																				<p class="pl-info"><?= $dep_name ?></p>
																				<div class="sau3-lon" onclick="v_popup_active(this)">
																					<img class="imgsau3" src="../img/sau3.png" alt="Ảnh lỗi">
																					<div class="sau3-con">
																						<div class="ul_model">
																							<?php
																							if ($type_create == 1) {
																							?>
																								<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_edit_comment_knowledge(this)">
																									<img src="../img/tung2.png" alt="Ảnh lỗi">
																									<p class="p_model">Chỉnh sửa bình luận</p>
																								</div>
																							<?php
																							} else {
																							?>
																								<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_edit_comment_knowledge(this)">
																									<img src="../img/tung2.png" alt="Ảnh lỗi">
																									<p class="p_model">Chỉnh sửa bình luận</p>
																								</div>
																							<?php
																							}
																							?>
																							<?php
																							if ($type_delete == 1) {
																							?>
																								<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_del_list_answer(this)">
																									<img src="../img/tung4.png" alt="Ảnh lỗi">
																									<p class="p_model">Xóa bình luận</p>
																								</div>
																							<?php
																							} else if ($row2['id_user'] == $_SESSION['login']['id']) {
																							?>
																								<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_del_list_answer(this)">
																									<img src="../img/tung4.png" alt="Ảnh lỗi">
																									<p class="p_model">Xóa bình luận</p>
																								</div>
																							<?php
																							}
																							?>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="pl-text">
																				<p><?= $row2['content'] ?></p>
																			</div>
																		</div>
																		<div class="pl-coments-like v_pl-coments-like">
																			<?php
																			$db_check = new db_query("SELECT * FROM like_comment_knowledge WHERE comment_knowledge_id = " . $row2['id'] . " AND id_user = " . $_SESSION['login']['id']);
																			if (mysql_num_rows($db_check->result) == 0) {
																			?>
																				<div class="likecoment" onclick="likecomment(this)" data-id="<?= $row2['id'] ?>">
																					Thích .
																				</div>
																			<?php
																			} else {
																			?>
																				<div class="likecoment1" onclick="likecomment(this)" data-id="<?= $row2['id'] ?>">
																					Đã thích .
																				</div>
																			<?php
																			}
																			?>
																			<p class="text-tl" onclick="text_tl(this)"> Trả lời</p>
																			<p class="text-time">. <?= $time ?></p>
																		</div>
																		<div class="v_list_parent_reply">
																			<?php
																			$db_reply = new db_query("SELECT * FROM comment_knowledge WHERE id_parent = " . $row2['id'] . " ORDER BY id DESC LIMIT 0,3");
																			while ($row_reply = mysql_fetch_array($db_reply->result)) {
																				if ($row_reply['user_type'] == 1) {
																					$avatar_img = $_SESSION['login']['logo'];
																				} else {
																					$avatar_img = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$row_reply['id_user']]->ep_image;
																				}
																				$time_sort = time() - $row_reply['created_at'];
																				if ($time_sort < 60) {
																					$time = date("s", $time_sort) . " giây trước";
																				} else if ($time_sort < 3600) {
																					$time = date("i", $time_sort) . " phút trước";
																				} else if ($time_sort < 86400) {
																					$time = date("H", $time_sort) . " giờ trước";
																				} else {
																					$time = "";
																				}
																			?>
																				<div class="v_list_reply_cmt" data-id="<?= $row_reply['id'] ?>">
																					<div><img class="v_list_reply_cmt_avt" src="<?= $avatar_img ?>" alt="Ảnh lỗi"></div>
																					<div class="v_list_reply_cmt03">
																						<div class="v_list_reply_content">
																							<div class="v_list_reply_info">
																								<?php
																								if ($row_reply['user_type'] == 1) {
																									$name = $_SESSION['login']['name'];
																									$dep_name = "";
																								} else if ($row_reply['user_type'] == 2) {
																									$name = $data_ep[$row_reply['id_user']]->ep_name;
																									$dep_name = ". " . $data_ep[$row_reply['id_user']]->dep_name;
																								}
																								?>
																								<p class="v_list_reply_name"><?= $name ?></p>
																								<p class="v_list_reply_dep"> <?= $dep_name ?></p>
																								<div class="sau3-lon" onclick="v_popup_active2(this)">
																									<img class="imgsau3" src="../img/sau3.png" alt="Ảnh lỗi">
																									<div class="sau3-con">
																										<div class="ul_model">
																											<?php
																											if ($row2['id_user'] == $_SESSION['login']['id']) {
																											?>
																												<div class="li_model" data-id="<?= $row_reply['id'] ?>" onclick="v_edit_comment_knowledge2(this)">
																													<img src="../img/tung2.png" alt="Ảnh lỗi">
																													<p class="p_model">Chỉnh sửa bình luận</p>
																												</div>
																											<?php
																											}
																											?>
																											<?php
																											$check_config_delete = check_config($_SESSION['login']['id'], 4, 'delete');
																											if ($_SESSION['login']['user_type'] == 1 || $row2['id_user'] == $_SESSION['login']['id'] || $check_config_delete = 1) {
																											?>
																												<div class="li_model" data-id="<?= $row2['id'] ?>" onclick="v_del_list_answer(this)">
																													<img src="../img/tung4.png" alt="Ảnh lỗi">
																													<p class="p_model">Xóa bình luận</p>
																												</div>
																											<?php
																											}
																											?>
																										</div>
																									</div>
																								</div>
																							</div>
																							<p class="v_list_reply_detail">
																								<?= $row_reply['content'] ?>
																							</p>
																						</div>
																						<?php
																						$db_check_like = new db_query("SELECT * FROM like_comment_knowledge WHERE comment_knowledge_id = " . $row_reply['id'] . " AND id_user = " . $_SESSION['login']['id']);
																						if (mysql_num_rows($db_check_like->result) == 0) {
																						?>
																							<div class="v_list_reply_time">
																								<p class="v_list_reply_like" data-id="<?= $row_reply['id'] ?>" onclick="likecomment(this)">Thích . </p>
																								<p class="v_list_reply_time2"><?=$time?></p>
																							</div>
																						<?php
																						} else {
																						?>
																							<div class="v_list_reply_time">
																								<p class="v_list_reply_like02" data-id="<?= $row_reply['id'] ?>" onclick="likecomment(this)">Đã thích . </p>
																								<p class="v_list_reply_time2"><?=$time?></p>
																							</div>
																						<?php
																						}
																						?>
																					</div>
																				</div>
																			<?php
																			}
																			?>
																		</div>
																		<div class="reply-your">
																			<div class="avt-reply"><img class="v_avt-reply_img" src="<?= $_SESSION['login']['logo'] ?>" alt="Ảnh lỗi"></div>
																			<form class="reply-cmt v_reply-cmt" data-id="<?= $row2['id'] ?>" data-type="0" onsubmit="return v_reply_cmt(this)">
																				<input type="text" class="v_reply" onkeyup="v_reply02(this)" name="" value="" placeholder="Viết câu trả lời">
																				<img class="stitem" src="../img/stitem.png" alt="Ảnh lỗi">
																				<img class="avtitem" src="../img/avtitem.png" alt="Ảnh lỗi">
																				<input type="text" value="<?= $row2['id'] ?>" class="v_id_cmt_knowledge" hidden readonly>
																				<button class="v_gui_comment"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<?php
													}
													?>
												</div>
												<div class="see-question">
													<?php
													if (mysql_num_rows($db_comment_knowledge_count->result) > 3) {
													?>
														<p class="see-question-previous" data-id="<?= $row['id'] ?>" onclick="see_question(this)">Xem câu trả lời trước</p>
													<?php
													}
													?>
												</div>
											</div>
									<?php
										}
									}
									?>
									<?php
									if (mysql_num_rows($db_knowledge_answer_count->result) > 3) {
									?>
										<div data-active="1" id="div_spin"><img src="../img/Spinner-1s-200px.gif" class="v_img_load" alt="Ảnh lỗi"></div>
									<?php
									} else {
									?>
										<div data-active="0" id="div_spin"><img src="../img/Spinner-1s-200px.gif" class="v_img_load" alt="Ảnh lỗi"></div>
									<?php
									}
									?>
								</div>
								<div class="right-question">
									<div class="hiennn">
										<div class="menuhien">
											<img class="img-menuhien" src="../img/readinglist.png" alt="Ảnh lỗi">
										</div>
										<div class="list-name">
											<div class="list-name-top">
												<p>Thành viên hiểu biết nhất</p>
											</div>
											<div class="list-name-boost">
												<?php
												$db = new db_query("SELECT * FROM knowledge_answer RIGHT JOIN comment_knowledge ON comment_knowledge.knowledge_answer_id = knowledge_answer.id WHERE knowledge_answer.id_company = " . $_SESSION['login']['id_com']);
												$arr = [];
												while ($row = mysql_fetch_array($db->result)) {
													$key = $row['id_user'] . '_' . $row['user_type'];
													if (!isset($arr[$key])) {
														$arr[$key]['count'] = 1;
														$arr[$key]['id_user'] = $row['id_user'];
														$arr[$key]['user_type'] = $row['user_type'];
													} else if (isset($arr[$key])) {
														$arr[$key]['count']++;
													}
												}
												rsort($arr);
												?>
												<div class="table1">
													<?php
													if (count($arr) == 0) {
													?>
														<div class="table1_member1">Chưa có dữ liệu</div>
													<?php
													} else {
													?>
														<table>
															<tr>
																<th>STT</th>
																<th>Họ và tên</th>
																<th>Số câu trả lời</th>
															</tr>
															<?php
															for ($i = 0; $i < count($arr); $i++) {
																if ($arr[$i]['user_type'] == 1) {
																	if ($_SESSION['login']['user_type'] == 1) {
																		$name = $_SESSION['login']['name'];
																	} else {
																		$name = array_values($data_ep)[0]->com_name;
																	}
																} else if ($arr[$i]['user_type'] == 2) {
																	$name = $data_ep[$arr[$i]['id_user']]->ep_name;
																}
															?>
																<tr>
																	<td><?= ($i + 1) ?></td>
																	<td><?= $name ?></td>
																	<td><?= $arr[$i]['count'] ?></td>
																</tr>
															<?php
																if ($i == 2) {
																	break;
																}
															}
															?>
														</table>
													<?php
													}
													?>
												</div>
											</div>
										</div>
										<div class="list-name">
											<div class="list-name-top">
												<p>Thành viên tích cực nhất</p>
											</div>
											<div class="list-name-boost">
												<?php
												$db = new db_query("SELECT * FROM knowledge_answer WHERE id_company = " . $_SESSION['login']['id_com']);
												$arr = [];
												while ($row = mysql_fetch_array($db->result)) {
													$key = $row['id_user'] . '_' . $row['user_type'];
													if (!isset($arr[$key])) {
														$arr[$key]['count'] = 1;
														$arr[$key]['id_user'] = $row['id_user'];
														$arr[$key]['user_type'] = $row['user_type'];
													} else if (isset($arr[$key])) {
														$arr[$key]['count']++;
													}
												}
												$db = new db_query("SELECT * FROM knowledge_answer RIGHT JOIN comment_knowledge ON comment_knowledge.knowledge_answer_id = knowledge_answer.id WHERE knowledge_answer.id_company = " . $_SESSION['login']['id_com']);
												while ($row = mysql_fetch_array($db->result)) {
													$key = $row['id_user'] . '_' . $row['user_type'];
													if (!isset($arr[$key])) {
														$arr[$key]['count'] = 1;
														$arr[$key]['id_user'] = $row['id_user'];
														$arr[$key]['user_type'] = $row['user_type'];
													} else if (isset($arr[$key])) {
														$arr[$key]['count']++;
													}
												}
												rsort($arr);
												?>
												<div class="table1">
													<?php
													if (count($arr) == 0) {
													?>
														<div class="table1_member1">Chưa có dữ liệu</div>
													<?php
													} else {
													?>
														<table>
															<tr>
																<th>STT</th>
																<th>Họ và tên</th>
																<th>Số bình chọn</th>
															</tr>
															<?php
															for ($i = 0; $i < count($arr); $i++) {
																if ($arr[$i]['user_type'] == 1) {
																	if ($_SESSION['login']['user_type'] == 1) {
																		$name = $_SESSION['login']['name'];
																	} else {
																		$name = array_values($data_ep)[0]->com_name;
																	}
																} else if ($arr[$i]['user_type'] == 2) {
																	$name = $data_ep[$arr[$i]['id_user']]->ep_name;
																}
															?>
																<tr>
																	<td><?= ($i + 1) ?></td>
																	<td><?= $name ?></td>
																	<td><?= $arr[$i]['count'] ?></td>
																</tr>
															<?php
																if ($i == 2) {
																	break;
																}
															}
															?>
														</table>
													<?php
													}
													?>
												</div>
											</div>
										</div>
										<div class="list-name">
											<div class="list-name-top">
												<p>Thành viên đặt câu hỏi nhiều nhất</p>
											</div>
											<?php
											$db = new db_query("SELECT * FROM knowledge_answer WHERE id_company = " . $_SESSION['login']['id_com']);
											$arr = [];
											while ($row = mysql_fetch_array($db->result)) {
												$key = $row['id_user'] . "_" . $row['user_type'];
												if (!isset($arr[$key])) {
													$arr[$key] = [];
													$arr[$key]['count'] = 1;
													$arr[$key]['id_user'] = $row['id_user'];
													$arr[$key]['user_type'] = $row['user_type'];
												} else if (isset($arr[$key])) {
													$arr[$key]['count']++;
												}
											}
											rsort($arr);
											?>
											<div class="list-name-boost">
												<div class="table1">
													<?php
													if (count($arr) == 0) {
													?>
														<div class="table1_member1">Chưa có dữ liệu</div>
													<?php
													} else {
													?>
														<table>
															<tr>
																<th>STT</th>
																<th>Họ và tên</th>
																<th>Số câu hỏi</th>
															</tr>
															<?php
															for ($i = 0; $i < count($arr); $i++) {
																if ($arr[$i]['user_type'] == 1) {
																	if ($_SESSION['login']['user_type'] == 1) {
																		$name = $_SESSION['login']['name'];
																	} else {
																		$name = array_values($data_ep)[0]->com_name;
																	}
																} else {
																	$name = array_values($data_ep)[0]->ep_name;
																}
															?>
																<tr>
																	<td><?= ($i + 1) ?></td>
																	<td><?= $name ?></td>
																	<td><?= $arr[$i]['count'] ?></td>
																</tr>
															<?php
																if ($i == 2) {
																	break;
																}
															}
															?>
														</table>
													<?php
													}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

			</div>
			<?php include('../includes/quantri_popup.php'); ?>

			<? include('../includes/popup_nt.php') ?>
		</div>


	</body>
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/validate_quantri.js"></script>
	<script src="../js/qt_tri_thuc.js"></script>
	<script src="../js/quantri.js"></script>
	<script src="../js/caidat.js"></script>
	<script type="text/javascript">
		$('#select_list_ep12').select2();
		$('.active4').css('background', ' #2E3994');
		$(".close_detl, #bth_cancel_model_newfeed").click(function() {
			$("#model_dangtin").hide();
		});
		$('body').click(function() {
			if (event.target.id == "model_dangtin") {
				$("#model_dangtin").hide();
			}
		});
	</script>

	</html>
<!-- Từ chối thành viên kèm theo ý kiến đóng góp  -->
<div class="tu_choi_dong_gop tu_choi_dong_gop_mem">
	<div class="tcdg_padding">
		<div class="tcdg_padding_head">
			<div class="tcdg_head_text">Từ chối kềm theo ý kiến đóng góp</div>
			<div class="tcdg_head_x x_pp_tc_dg"><img src="../img/image_new/x.svg" alt="Đóng"></div>
		</div>

		<div class="tcdg_padding_main">
			<h2 class="tcdg_padding_main_title">Lý do từ chối</h2>
			<p class="tcdg_padding_main_text">Ý kiến này sẽ được chia sẻ với Vương sau khi bạn từ chối yêu cầu của họ. Họ sẽ không thấy tên hoặc thông tin cá nhân khác của bạn.</p>
			<textarea placeholder="Đóng góp ý kiến" name="message_tuchoi"></textarea>
			<div class="tcdg_padding_main_btn">
				<div class="tcdg_padding_main_btn1 x_pp_tc_dg">Hủy</div>
				<div class="tcdg_padding_main_btn2 xacnhan_tuchoi" data="" data1="">Xác nhận</div>
			</div>
		</div>
	</div>
</div>

<!-- Từ chối bài viết thành viên kèm theo ý kiến đóng góp  -->
<div class="tu_choi_dong_gop tu_choi_dong_gop_post">
	<div class="tcdg_padding">
		<div class="tcdg_padding_head">
			<div class="tcdg_head_text">Từ chối kềm theo ý kiến đóng góp</div>
			<div class="tcdg_head_x x_pp_tc_dg"><img src="../img/image_new/x.svg" alt="Đóng"></div>
		</div>

		<div class="tcdg_padding_main">
			<h2 class="tcdg_padding_main_title">Lý do từ chối</h2>
			<p class="tcdg_padding_main_text">Ý kiến này sẽ được chia sẻ với Vương sau khi bạn từ chối yêu cầu của họ. Họ sẽ không thấy tên hoặc thông tin cá nhân khác của bạn.</p>
			<textarea placeholder="Đóng góp ý kiến" name="message_tuchoi2"></textarea>
			<div class="tcdg_padding_main_btn">
				<div class="tcdg_padding_main_btn1 x_pp_tc_dg">Hủy</div>
				<div class="tcdg_padding_main_btn2 refuse_post_group_message refuse_post_member_group" data="" data1="">Xác nhận</div>
			</div>
		</div>
	</div>
</div>

<!-- Từ chối và cấm -->
<div class="popup_tuchoi_cam refuse_and_prohibit_1">
    <div class="popup_tuchoi_cam_pd"></div>
</div>

<!-- Delete Question -->
<div class="delete_question">
	<div class="delete_question_padding">
		<div class="delete_question_one border_bottom">
			<div class="delete_question_one_text">Xóa câu hỏi</div>
			<div class="delete_question_one_x click_x_question"><?= $x;?></div>
		</div>
		<div class="delete_question_two">
			<div class="delete_question_two_text">Bạn có chắc chắn muốn xóa câu hỏi này không? Hành động này không thể hoàn tác.</div>
			<div class="delete_question_two_btn">
				<div class="delete_question_two_btn1 cusor click_x_question">Hủy</div>
				<div class="delete_question_two_btn2 xoa_luon cusor" data="">Xóa</div>
			</div>
		</div>
	</div>
</div>

<!-- Add Question -->
<div class="add_question create_question">
	<div class="add_question_padding">
		<div class="add_question_one">
			<div class="add_question_one_text">Câu hỏi</div>
			<div class="add_question_one_ic cusor x_pp_cauhoi"><?= $x;?></div> 
		</div>
		<div class="add_question_two">
			<div class="add_question_two_sub">
				
			
				<div class="add_question_two1">
					<select name="select_luachon" id="" class="select_option select_luachon" onchange="change_select_question(this)">
						<option value="1">Câu trả lời tự do</option>
						<option value="2">Ô để đánh dấu</option>
						<option value="3">Trắc nghiệm</option>
					</select>
				</div>
				<div class="add_question_two2">
					<textarea placeholder="Câu hỏi" name="ques_title"></textarea>
				</div>

				<div class="scroll_question">
					<div class="appen_lua_chon">
						
					</div>
				</div>
				<div class="div_lac_lui them_luachon_js" onclick="them_luachon_js(this)">
					<div class="click_them_lua_chon">
						<div class="click_them_lua_chon_sub">+</div>
						<div class="click_them_lua_chon_sub2">Thêm lựa chọn khác</div>
					</div>
				</div>

			</div>

			<div class="add_question_two3">
				<div class="add_question_two3_btn1 x_pp_cauhoi cusor">Hủy</div>
				<div class="luu_data_ajax" hidden data="<?= $_SESSION['login']['id']?>" data1="<?= $_SESSION['login']['id_com']?>" data2="<?=$id?>"></div>
				<div class="add_question_two3_btn2 cusor luu_question" onclick="luu_question(this)">Lưu</div>
			</div>
		</div>
	</div>
</div>

<!-- Edit Question -->
<div class="add_question edit_question">
	<div class="add_question_padding add_question_padding_ed" data="">
		<div class="add_question_one">
			<div class="add_question_one_text">Câu hỏi</div>
			<div class="add_question_one_ic cusor x_pp_cauhoi"><?= $x;?></div>
		</div>
		<div class="add_question_two appen_question_edit">
			
		</div>
	</div>
</div>


<!-- Từ chối và cấm thành viên đăng bài  -->
<div class="popup_tuchoi_cam refuse_and_prohibit_2">
    <div class="popup_tuchoi_cam_pd">Đã từ chối và cấm tác giả</div>
</div>


<!-- Tạo quy tắc nhóm -->
<div class="create_group_rules tao_group_rules">
	<div class="create_group_rules_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Tạo quy tắc</div>
			<div class="create_group_rules_header_ic cusor" onclick="click_close_quytac(this)"><?= $x;?></div>
		</div>
		<div class="create_group_rules_main">
			<div class="ruled_hidden" hidden data="<?=$_SESSION['login']['id']?>" data1="<?=$_SESSION['login']['id_com']?>" data2="<?=$id?>"></div>
			<div class="create_group_rules_main_title">Viết quy tắc</div>
			<div class="create_group_rules_main_input">
				<input type="text" placeholder="Tiêu đề" name="title_rule">
				<span class="setting_err"></span>
			</div>
			<div class="create_group_rules_main_textarea">
				<textarea placeholder="Mô tả" name="describe_rule"></textarea>
				<span class="setting_err"></span>
			</div>

			<div class="create_group_rules_main_btn">
				<div class="create_group_rules_main_btn_one cusor" onclick="click_close_quytac(this)">Hủy</div>
				<div class="create_group_rules_main_btn_two cusor save_rule">Lưu</div>
			</div>
		</div>
	</div>
</div>

<!-- Chỉnh sửa quy tắc -->
<div class="create_group_rules edit_group_rules">
	<div class="create_group_rules_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Chỉnh sửa quy tắc</div>
			<div class="create_group_rules_header_ic cusor" onclick="click_close_quytac(this)"><?= $x;?></div>
		</div>
		<div class="create_group_rules_main parents_rules">

			<div class="appen_rules_group ">
				<!-- ----------------------------------------- -->
			</div>

			<div class="create_group_rules_main_btn">
				<div class="create_group_rules_main_btn_one cusor" onclick="click_close_quytac(this)">Hủy</div>
				<div class="create_group_rules_main_btn_two cusor save_edit_rule">Lưu</div>
			</div>
		</div>

	</div>
</div>


<!-- Tên và mô tả -->
<div class="ten_and_des">
	<div class="create_group_rules_padding ten_and_des_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Tên và mô tả</div>
			<div class="create_group_rules_header_ic x_name_and_des cusor"><?= $x;?></div>
		</div>
		<div class="create_group_rules_main">
			<div class="create_group_rules_main_input box_name_group">
				<input type="text" placeholder="Tên hội nhóm" value="<?=$group['group_name']?>" name="name_group">
				<span class="setting_err"></span>
			</div>
			<div class="create_group_rules_main_textarea box_desc_group">
				<textarea placeholder="Mô tả" name="desc_group"><?=$group['description']?></textarea>
				<span class="setting_err"></span>
			</div>

			<div class="create_group_rules_main_btn">
				<div class="create_group_rules_main_btn_one x_name_and_des cusor">Hủy</div>
				<div class="create_group_rules_main_btn_two cusor save_name_des" data="<?=$id?>">Lưu</div>
			</div>
		</div>
	</div>
</div>

<!-- Giới thiệu thành viên mới -->
<div class="gioi_thieu_tvm">
	<div class="create_group_rules_padding gioi_thieu_tvm_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Phần giới thiệu</div>
			<div class="create_group_rules_header_ic hide_phan_gt cusor"><?= $x;?></div>
		</div>
		<div class="create_group_rules_main">
			<div class="box_active_thong_diep">
				<div class="active_thong_diep">
					<div class="title_active_thong_diep">
						<b>Hiển thị thông điệp giới thiệu</b>
						<p>Thành viên sẽ nhìn thấy thông điệp giới thiệu vào lần đầu tiên truy cập nhóm của bạn sau khi họ tham gia.</p>
					</div>
					<div class="hienthi_thong_diep_tich">
						<input type="checkbox" class="active_introduce flipswitch <?=($group['show_introduce'] == 1) ? "back_blue cham_affter" : "back_fff"?> " value="1" name="check_show_introduce" <?=($group['show_introduce'] == 1) ? "checked" : "" ;?> data="<?=$id?>"/>
	                    <label for="checkbox_calendar"></label>
					</div>
				</div>
				<button class="btn_update_thong_diep">Chỉnh sửa thông điệp</button>
			</div>
			<div class="box_detail_thong_diep" style="display: none;">
				<div class="create_group_rules_main_textarea box_introduce_group">
					<textarea placeholder="Viết thông điệp giới thiệu" name="introduce_group"><?=$group['introduce']?></textarea>
					<span class="setting_err"></span>
				</div>
				<div class="hienthi_thong_diep">
					<div class="hienthi_thong_diep_text">Hiển thị quy tắc sau thông điệp giới thiệu</div>
					<div class="hienthi_thong_diep_tich">
						<input type="checkbox" class="active_rules flipswitch <?=($group['show_rules'] == 1) ? "back_blue cham_affter" : "back_fff"?> " value="1" name="check_show_rules" <?=($group['show_rules'] == 1) ? "checked" : "" ;?>/>
	                    <label for="checkbox_calendar"></label>
					</div>
				</div>
				<div class="create_group_rules_main_btn pd_top">
					<div class="create_group_rules_main_btn_one x_phan_gt cusor">Hủy</div>
					<div class="create_group_rules_main_btn_two cusor save_introduce" data="<?=$id?>">Lưu</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Quyền riêng tư -->
<div class="quyen_rieng_tu">
	<div class="create_group_rules_padding quyen_rieng_tu_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Quyền riêng tư</div>
			<div class="create_group_rules_header_ic cusor x_quyenriengtu"><?= $x;?></div>
		</div>
		<div class="quyen_rieng_tu_main">
			<?if($group['group_mode'] != 1){?>
				<!-- Quyền riêng tư khi nhóm đang công khai -->
				<div class="quyen_rieng_tu_1">
					<div class="quyen_rieng_tu_main_check">
						<div class="quyen_rieng_tu_main_check_one">
							<div class="quyen_rieng_tu_main_check_one_ic"><img src="../img/image_new/earth2.svg" alt=""></div>
							<div class="quyen_rieng_tu_main_check_one_text">
								<h3 class="quyen_rieng_tu_main_check_one_text_h3">Công khai</h3>
								<p class="quyen_rieng_tu_main_check_one_text_p">Tất cả mọi người nhìn thấy bài đăng trong nhóm của bạn.</p>
							</div>
						</div>

						<div class="quyen_rieng_tu_main_check_input">
							<input type="radio" class="group_public" name="check_privacy" checked value="0">
						</div>
					</div>
					<div class="quyen_rieng_tu_main_check">
						<div class="quyen_rieng_tu_main_check_one">
							<div class="quyen_rieng_tu_main_check_one_ic"><img src="../img/image_new/lock.svg" alt=""></div>
							<div class="quyen_rieng_tu_main_check_one_text">
								<h3 class="quyen_rieng_tu_main_check_one_text_h3">Riêng tư</h3>
								<p class="quyen_rieng_tu_main_check_one_text_p">Chỉ thành viên mới nhìn thấy mọi người trong nhóm và những gì họ đăng</p>
							</div>
						</div>

						<div class="quyen_rieng_tu_main_check_input">
							<input type="radio" class="group_private" name="check_privacy" value="1">
						</div>
					</div>
				</div>
				<div class="create_group_rules_main_btn">
					<div class="create_group_rules_main_btn_one x_quyenriengtu cusor">Hủy</div>
					<div class="create_group_rules_main_btn_two cusor save_privacy" data="<?=$id?>">Lưu</div>
				</div>
			<?}else{?>
				<!-- Quyền riêng tư khi nhóm đang riêng tư -->
				<div class="quyen_rieng_tu_2">
					<div class="quyen_rieng_tu_main_check_one">
						<div class="quyen_rieng_tu_main_check_one_ic"><img src="../img/image_new/lock.svg" alt=""></div>
						<div class="quyen_rieng_tu_main_check_one_text">
							<h3 class="quyen_rieng_tu_main_check_one_text_h3">Riêng tư</h3>
							<p class="quyen_rieng_tu_main_check_one_text_p">Chỉ thành viên mới nhìn thấy mọi người trong nhóm và những gì họ đăng</p>
						</div>
					</div>
					<div class="quyen_rieng_tu_2_text">Để bảo vệ quyền riêng tư của thành viên nhóm, bạn không thể chuyển nhóm riêng tư thành công khai. Bạn sẽ quản lý được ai có thể tìm và tham gia nhóm này thông qua các tùy chọn cài đặt Ẩn nhóm và Ai có thể tham gia nhóm.</div>
				</div>
			<?}?> 
		</div>
	</div>
</div>

<!-- Ẩn nhóm -->
<div class="an_nhom">
	<div class="create_group_rules_padding an_nhom_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Ẩn nhóm</div>
			<div class="create_group_rules_header_ic cusor x_an_nhom"><?= $x;?></div>
		</div>
		<div class="create_group_rules_main">
			<div class="an_nhom_fig">
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_one">
							<div class="an_nhom_sub_hien_one_ic"><img src="../img/image_new/eye.svg" alt=""></div>
						</div>
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Hiển thị</h3>
							<p class="an_nhom_sub_hien_two_p">Ai cũng có thể tìm nhóm này.</p>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="an_hien" value="0" <?=($group['hide_show'] == 0) ? "checked" : "";?>></div>
				</div>
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_one">
							<div class="an_nhom_sub_hien_one_ic"><img src="../img/image_new/an.svg" alt=""></div>
						</div>
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Đã ẩn</h3>
							<p class="an_nhom_sub_hien_two_p">Chỉ thành viên mới tìm nhóm này.</p>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="an_hien" value="1" <?=($group['hide_show'] == 1) ? "checked" : "";?>></div>
				</div>
			</div>

			<div class="create_group_rules_main_btn">
				<div class="create_group_rules_main_btn_one x_an_nhom cusor">Hủy</div>
				<div class="create_group_rules_main_btn_two cusor save_hide_show" data="<?=$id?>">Lưu</div>
			</div>
		</div>
	</div>
</div>


<!-- Quản lý thành viên -->
<div class="ql_thanhvien">
	<div class="create_group_rules_padding ql_thanhvien_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Ai có thể phê duyệt yêu cầu thành viên</div>
			<div class="create_group_rules_header_ic cusor x_qltv"><?= $x;?></div>
		</div>
		<div class="create_group_rules_main">
			<div class="an_nhom_fig">
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Chỉ quản trị viên và người kiểm duyệt</h3>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="qltv" value="0" <?=($group['pheduyet_yc_thanhvien'] == 0) ? "checked" : "";?>></div>
				</div>
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Bất cứ ai trong nhóm</h3>
							<p class="an_nhom_sub_hien_two_p">Thành viên chỉ có thể phê duyệt yêu cầu của bạn bè</p>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="qltv" value="1" <?=($group['pheduyet_yc_thanhvien'] == 1) ? "checked" : "";?>></div>
				</div>
			</div>

			<div class="create_group_rules_main_btn">
				<div class="create_group_rules_main_btn_one x_qltv cusor">Hủy</div>
				<div class="create_group_rules_main_btn_two cusor save_qltv" data="<?=$id?>">Lưu</div>
			</div>
		</div>
	</div>
</div>


<!-- NỘI DUNG THẢO LUẬN -->
<!-- ai có thể đăng -->
<div class="noidung_thaoluan">
	<div class="create_group_rules_padding noidung_thaoluan_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Ai có thể đăng</div>
			<div class="create_group_rules_header_ic cusor x_nd_thaoluan"><?= $x;?></div>
		</div>
		<div class="create_group_rules_main">
			<div class="an_nhom_fig">
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Bất cứ ai trong nhóm</h3>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="nd_thaoluan" value="0"<?=($group['who_can_post'] == 0) ? "checked" : "" ?>></div>
				</div>
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Chỉ quản trị viên</h3>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="nd_thaoluan" value="1"<?=($group['who_can_post'] == 1) ? "checked" : "" ?>></div>
				</div>
			</div>

			<div class="create_group_rules_main_btn">
				<div class="create_group_rules_main_btn_one x_nd_thaoluan cusor">Hủy</div>
				<div class="create_group_rules_main_btn_two cusor save_nd_thaoluan" data="<?=$id;?>">Lưu</div>
			</div>
		</div>
	</div>
</div>

<!-- phê duyệt bài viết của thành viên -->
<div class="phe_duyet_posts_member">
	<div class="create_group_rules_padding phe_duyet_posts_member_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Phê duyệt bài viết của thành viên</div>
			<div class="create_group_rules_header_ic x_pheduyet_posts"><?= $x;?></div>
		</div>
		<div class="create_group_rules_main">
			<div class="an_nhom_fig">
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Bật</h3>
							<p class="an_nhom_sub_hien_two_p">Bài viết của thành viên phải được quản trị viên hoặc người kiểm duyệt phê duyệt</p>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="pd_post" value="0" <?=($group['Pheduyet_post_member'] == 0) ? "checked" : "" ?>></div>
				</div>
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Tắt</h3>
							<p class="an_nhom_sub_hien_two_p">Thành viên có thể trực tiếp đăng lên nhóm</p>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="pd_post" value="1" <?=($group['Pheduyet_post_member'] == 1) ? "checked" : "" ?>></div>
				</div>
			</div>

			<div class="create_group_rules_main_btn">
				<div class="create_group_rules_main_btn_one x_pheduyet_posts cusor">Hủy</div>
				<div class="create_group_rules_main_btn_two cusor save_phe_duyet_posts" data="<?=$id?>">Lưu</div>
			</div>
		</div>
	</div>
</div>

<!-- Phê duyệt bài nội dung chỉnh sửa -->
<div class="phe_duyet_edit_member">
	<div class="create_group_rules_padding phe_duyet_edit_member_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Phê duyệt bài nội dung chỉnh sửa</div>
			<div class="create_group_rules_header_ic cusor x_pheduyet_edit"><?= $x;?></div>
		</div>
		<div class="create_group_rules_main">
			<div class="an_nhom_fig">
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Bật</h3>
							<p class="an_nhom_sub_hien_two_p">Bài viết đã chỉnh sửa phải được quản trị viên hoặc người kiểm duyệt phê duyệt</p>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="pd_post_edit" value="0" <?=($group['pheduyet_noidung_edit'] == 0) ? "checked" : "";?>></div>
				</div>
				<div class="an_nhom_sub">
					<div class="an_nhom_sub_hien">
						<div class="an_nhom_sub_hien_two">
							<h3 class="an_nhom_sub_hien_two_h3">Tắt</h3>
							<p class="an_nhom_sub_hien_two_p">Thành viên có thể trực tiếp chỉnh sửa bài viết của mình</p>
						</div>
					</div>
					<div class="an_nhom_sub_input"><input type="radio" name="pd_post_edit" value="1" <?=($group['pheduyet_noidung_edit'] == 1) ? "checked" : "";?>></div>
				</div>
			</div>

			<div class="create_group_rules_main_btn">
				<div class="create_group_rules_main_btn_one x_pheduyet_edit cusor">Hủy</div>
				<div class="create_group_rules_main_btn_two cusor save_pd_post_edit" data="<?=$id?>">Lưu</div>
			</div>
		</div>
	</div>
</div>


<!-- Click tham gia Hiện POPUP CÂU HỎI -->
<div class="participation_question">
	<div class="create_group_rules_padding participation_question_padding">
		<div class="create_group_rules_header">
			<div class="create_group_rules_header_text">Câu hỏi dành cho người tham gia</div>
			<div class="create_group_rules_header_ic cusor x_participation_question"><?= $x;?></div>
		</div>
		<div class="participation_question_main_scroll">
			<div class="participation_question_main">
				<div class="apppen_question">
					
				<!-- ------------------------- -->

				</div>

				<div class="participation_question_main_3">
					<div class="participation_question_main_3_tex">Không nhập mật khẩu hoặc thông tin nhạy cảm khác tại đây, ngay cả khi quản trị viên nhóm yêu cầu.</div>
					<button type="submit" class="participation_question_main_3_btn click_send">Gửi</button>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Mời làm quản trị viên -->
<div class="invite_admin">
	<div class="invite_admin_padding padding_administrators">
		<div class="invite_admin_head">Mời làm quản trị viên</div>
		<div class="invite_admin_main">
			<div class="invite_admin_main_text">Nếu <span class="appen_name_invite"></span> chấp nhận lời mời,  <span class="appen_name_invite"></span> sẽ có thể thêm hoặc xóa quản trị viên và người kiểm duyệt, chỉnh sửa cài đặt nhóm cũng như làm nhiều việc khác.</div>
			<div class="invite_admin_main_btn">
				<div class="invite_admin_main_btn1 cusor huy_invite_admin">Hủy</div>
				<div class="invite_admin_main_btn2 cusor click_gui_invite" data="" data1="" data2="">Gửi lời mời</div>
			</div>
		</div>
	</div>
</div>

<!-- Mời làm người kiểm duyệt -->
<div class="censor">
	<div class="invite_admin_padding padding_censor">
		<div class="invite_admin_head">Mời làm người phê duyệt</div>
		<div class="invite_admin_main">
			<div class="invite_admin_main_text">Nếu <span class="appen_name_censor"></span> chấp nhận lời mời,  <span class="appen_name_censor"></span> sẽ có thể phê duyệt hoặc từ chối yêu cầu làm thành viên, gỡ bài viết và bình luận, xóa thành viên khỏi nhóm cũng như làm nhiều việc khác.</div>
			<div class="invite_admin_main_btn">
				<div class="invite_admin_main_btn1 cusor huy_invite_admin">Hủy</div>
				<div class="invite_admin_main_btn2 cusor click_gui_censor" data="" data1="">Gửi lời mời</div>
			</div>
		</div>
	</div>
</div>


<!-- Đình chỉ thành viên -->
<div class="member_suspension">
	<div class="member_suspension_padding padding_member_suspension">
		<div class="member_suspension_head">
			<div class="member_suspension_head_text">Đình chỉ thành viên</div>
			<div class="member_suspension_head_ic cusor close_member_suspension"><?= $x;?></div>
		</div>
		<div class="member_suspension_main">
			<div class="member_suspension_main_title">Bạn muốn đình chỉ <span class="nhan_name_suspension"></span> trong bao lâu?</div>
			<p class="member_suspension_main_p">Họ sẽ xem được nhóm nhưng không thể đăng bài, bình luận hoặc có hành động khác trong khung thời gian bạn chọn.</p>
			<div class="member_suspension_main_content">
				<div class="member_suspension_main_content_one">
					<div class="member_suspension_main_content_one_text">12 giờ</div>
					<input type="radio" name="member_suspension" value="1">
				</div>
				<div class="member_suspension_main_content_one">
					<div class="member_suspension_main_content_one_text">24 giờ</div>
					<input type="radio" name="member_suspension" value="2">
				</div>
				<div class="member_suspension_main_content_one">
					<div class="member_suspension_main_content_one_text">3 ngày</div>
					<input type="radio" name="member_suspension" value="3">
				</div>
				<div class="member_suspension_main_content_one">
					<div class="member_suspension_main_content_one_text">7 ngày</div>
					<input type="radio" name="member_suspension" value="4">
				</div>
				<div class="member_suspension_main_content_one">
					<div class="member_suspension_main_content_one_text">14 ngày</div>
					<input type="radio" name="member_suspension" value="5">
				</div>
				<div class="member_suspension_main_content_one">
					<div class="member_suspension_main_content_one_text">28 ngày</div>
					<input type="radio" name="member_suspension" value="6">
				</div>
				<div class="member_suspension_main_content_one">
					<div class="member_suspension_main_content_one_text">Bỏ đình chỉ</div>
					<input type="radio" name="member_suspension" value="0">
				</div>
			</div>
			<div class="member_suspension_main_btn">
				<div class="member_suspension_main_btn1 cusor close_member_suspension">Hủy</div>
				<div class="member_suspension_main_btn2 cusor confirm_suspension" data="" data1="">Xác nhận</div>
			</div>
		</div>
	</div>
</div>

<!-- Giới hạn hoạt động thành viên -->
<div class="membership_activity_limit">
	<div class="member_suspension_padding padding_membership_activity_limit">
		<div class="member_suspension_head">
			<div class="member_suspension_head_text">Giới hạn hoạt động thành viên</div>
			<div class="member_suspension_head_ic cusor close_membership_activity_limit"><?= $x;?></div>
		</div>
		<div class="membership_activity_limit_main">
			<p class="mal_main_p">Bạn có thể dùng những tùy chọn kiểm soát này để giới hạn tần suất đăng bài hoặc bình luận của <span class="name_mem_limit name_mem_limit_css"></span> trong nhóm này.</p>
			<div class="mal_main_content">
				<div class="mal_main_content_one border_bottom">
					<div class="mal_main_content_one_1">
						<div class="mal_main_content_one_1_sub">
							<div class="mal_main_content_one_1_text opaciy">Giới hạn đăng bài</div>
							<div class="calendar_choose-basic_scroll_bar">
		                        <input type="checkbox" class="flipswitch limit_post" id="checkbox_calendar" name="check_limit_post" />
		                        <label for="checkbox_calendar"></label>
		                    </div>
						</div>
						<div class="mal_main_content_one_1_sub_2">
							<div class="mal_main_content_one_1_sub_2_select opaciy">
								<select name="limit_post" id="limit_baidang" class="select_option rmv_disa" disabled>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
								</select>
							</div>
							<span class="mal_main_content_one_1_sub_2_text opaciy">Bài viết trong nhóm mỗi ngày</span>
						</div>
					</div>
					<div class="mal_main_content_one_2">
						<div class="mal_main_content_one_1_sub">
							<div class="mal_main_content_one_1_text opaciy">Hết hạn sau</div>
						</div>
						<div class="mal_main_content_one_1_sub_2">
							<div class="mal_main_content_one_1_sub_2_select opaciy">
								<select name="post_het_han" id="" class="select_option rmv_disa" disabled>
									<option value="1">12 giờ</option>
									<option value="2">24 giờ</option>
									<option value="3">3 ngày</option>
									<option value="4">7 ngày</option>
									<option value="5">14 ngày</option>
									<option value="6">28 ngày</option>
								</select>
							</div>
							<span class="mal_main_content_one_1_sub_2_text opaciy">Bài viết trong nhóm mỗi ngày</span>
						</div>
					</div>
					<div class="text_html text_html_post" hidden><span class="name_mem_limit"></span> chỉ được đăng <span class="html_limit_baidang">1</span> bài viết/ngày cho đến 15:36 ngày mai</div>
				</div> 
				<div class="mal_main_content_one">
					<div class="mal_main_content_one_1">
						<div class="mal_main_content_one_1_sub">
							<div class="mal_main_content_one_1_text opaciy2">Giới hạn bình luận</div>
							<div class="calendar_choose-basic_scroll_bar">
		                        <input type="checkbox" class="flipswitch" id="checkbox_calendar" name="check_limit_comment" />
		                        <label for="checkbox_calendar"></label>
		                    </div>
						</div>
						<div class="mal_main_content_one_1_sub_2">
							<div class="mal_main_content_one_1_sub_2_select opaciy2">
								<select name="limit_commnet" id="limit_baidang2" class="select_option rmv_disa2" disabled>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
								</select>
							</div>
							<span class="mal_main_content_one_1_sub_2_text opaciy2">Bình luận trong nhóm mỗi ngày</span>
						</div>
					</div>
					<div class="mal_main_content_one_2">
						<div class="mal_main_content_one_1_sub">
							<div class="mal_main_content_one_1_text opaciy2">Hết hạn sau</div>
						</div>
						<div class="mal_main_content_one_1_sub_2">
							<div class="mal_main_content_one_1_sub_2_select opaciy2">
								<select name="commem_het_han" id="" class="select_option rmv_disa2" disabled>
									<option value="1">12 giờ</option>
									<option value="2">24 giờ</option>
									<option value="3">3 ngày</option>
									<option value="4">7 ngày</option>
									<option value="5">14 ngày</option>
									<option value="6">28 ngày</option>
								</select>
							</div>
							<span class="mal_main_content_one_1_sub_2_text opaciy2">Bài viết trong nhóm mỗi ngày</span>
						</div>

						<div class="text_html text_html_comment" hidden><span class="name_mem_limit"></span> chỉ được đăng <span class="html_limit_baidang2">1</span> bài viết/ngày cho đến 15:36 ngày mai</div>
					</div>
				</div>

				<div class="member_suspension_main_btn">
					<div class="member_suspension_main_btn1 close_membership_activity_limit cusor">Hủy</div>
					
					<button type="submit" class="member_suspension_main_btn2 cusor opaciy_bt rmv_disa_bt click_limit_mem" data-id-limit="" data-id-group="">Xác nhận</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Xóa thành viên -->
<div class="delete_member">
	<div class="delete_member_padding">
		<div class="member_suspension_head">
			<div class="member_suspension_head_text">Xóa thành viên</div>
			<div class="member_suspension_head_ic cusor close_delete_member"><?= $x;?></div>
		</div>

		<div class="delete_member_main">
			<div class="delete_member_main_one">
				<div class="delete_member_main_one_1">
					<div class="delete_member_main_one_1_img"><img src="../img/image_new/banner.png" alt=""></div>
					<h3 class="delete_member_main_one_1_name">Jenny Wilson</h3>
					<p class="delete_member_main_one_1_text">Bạn đang xóa Jenny Wilson khỏi Nhóm. Quá trình này có thể cần vài phút.</p>
				</div>
			</div>
			<div class="delete_member_main_two">
				<div class="delete_member_main_two_option">
					<h3 class="delete_member_main_two_option_h3">Lựa chọn khác</h3>
					<p class="delete_member_main_two_option_p">Bạn có muốn thực hiện thêm hành động nào không?</p>
				</div>

				<div class="delete_member_main_two_sub">
					<div class="delete_member_main_two_sub1 border_bottom">
						<div class="delete_member_main_two_sub1_one">
							<div class="delete_member_main_two_sub1_one_ic"><img src="../img/image_new/ban_tacgia.svg" alt=""></div>
							<div class="delete_member_main_two_sub1_one_text">
								<div class="delete_member_main_two_sub1_one_text_16">Xóa hoạt động gần đây</div>
								<div class="delete_member_main_two_sub1_one_text_14">Xóa bài viết, bình luận, tin, cuộc thăm dò ý kiến và lời mời làm thành viên đang chờ phê duyệt của Xám trong 7 ngày qua</div>
							</div>
						</div>
						<div class="delete_member_main_two_sub1_two"><input type="checkbox" name="check_xoa"></div>
					</div>
					<div class="delete_member_main_two_sub1">
						<div class="delete_member_main_two_sub1_one">
							<div class="delete_member_main_two_sub1_one_ic"><img src="../img/image_new/prohibit.svg" alt=""></div>
							<div class="delete_member_main_two_sub1_one_text">
								<div class="delete_member_main_two_sub1_one_text_16">Cấm Xám</div>
								<div class="delete_member_main_two_sub1_one_text_14">Xám sẽ không thể tìm, xem hoặc tham gia lại nhóm của bạn.</div>
							</div>
						</div>
						<div class="delete_member_main_two_sub1_two"><input type="checkbox" name="check_xoa"></div>
					</div>
				</div>

				<div class="member_suspension_main_btn">
					<div class="member_suspension_main_btn1 cusor close_delete_member">Hủy</div>
					<button type="submit" class="member_suspension_main_btn2 cusor">Xác nhận</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Câu trả lời của thành viên -->
<div class="member_answered">
	<div class="member_answered_padding">
		<div class="member_answered_head">
			<div class="member_answered_head_text"></div>
			<div class="member_answered_head_ic cusor close_member_answered"><?= $x;?></div>
		</div>
		<div class="member_answered_main"></div>

		<div class="member_answered_main_btn data_pd_tc take_id_answered" data="" data1="">
			<button class="member_answered_main_btn1 duyet_thanhvien">Phê duyệt</button>
			<button class="member_answered_main_btn2 tu_choi_thanhvien">Từ chối</button>
		</div>
	</div>
</div>


<!-- Nội dung của bạn đã bị từ chối -->
<div class="my_content_pp pp_my_removed_content">
	<div class="my_content_pp_padding">
		<div class="member_answered_head">
			<div class="member_answered_head_text">Chi tiết</div>
			<div class="member_answered_head_ic cusor close_my_content"><?= $x;?></div>
		</div>

		<div class="my_content_pp_main">
			<div class="my_content_pp_main_box1">
				<div class="my_content_pp_main_box1_p">Đội ngũ quản trị viên đã từ chối bài viết của bạn trong nhóm <span class="name_tuchoi_group"></span></div>
				<div class="my_content_pp_main_post_cha">
					<!-- appen html -->
                </div>
			</div>
			<div class="my_content_pp_main_box2 bordet_top">
				<div class="my_content_pp_main_box2_btn cusor btn_update_post_removed" data-new_id="" data-new_type="">
					<img src="../img/image_new/edit_post_blue.svg" alt="">
					<div class="my_content_pp_main_box2_btn_tex">Chỉnh sửa bài viết</div>
				</div>
			</div>
		</div>

	</div>
</div>


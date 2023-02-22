<?php
require_once '../config/config.php';

$id_edit = getValue("id_edit","int","POST",0);
$id = getValue("id_g","int","POST",0);

if($id_edit > 0){
	$select_question = new db_query("SELECT * FROM `member_question` WHERE `id` = '$id_edit'");
	$show_ques = mysql_fetch_assoc($select_question->result);?>

	<div class="add_question_two_sub"> 
		<div class="add_question_two1">
			<select name="option_update" id="" class="select_option select_luachon" onchange="change_select_question2(this)">
				<option value="1" <?=($show_ques['question_type'] == 1) ? "selected" : "";?>>Câu trả lời tự do</option>
				<option value="2" <?=($show_ques['question_type'] == 2) ? "selected" : "";?>>Ô để đánh dấu</option>
				<option value="3" <?=($show_ques['question_type'] == 3) ? "selected" : "";?>>Trắc nghiệm</option>
			</select>
		</div>
		<div class="add_question_two2">
			<textarea placeholder="Câu hỏi" name="ques_title2"><?=$show_ques['title']?></textarea>
		</div>

		<div class="scroll_question">
			<div class="appen_lua_chon appen_lua_chon_ud">
				<?if($show_ques['question_type'] == 2){
					$arr_check_name = explode(',', $show_ques['name_checkbox']);
					foreach ($arr_check_name as $key => $value) {?>
						<div class="lua_chon_1_appen dc_appen1">
							<div class="lua_chon_1_checkbox">
								<input disabled type="checkbox" name="lua_chon1" value="">
							</div>
							<div class="lua_chon_1_input">
								<input type="text" placeholder="Nhập lựa chọn" class="them_border border_full" name="nhap_luachon2" onkeydown="nhap_lc(this)" value="<?=$value?>">
							</div>
							<div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)">
								<img src="../img/image_new/x_den.svg" alt="Đóng">
							</div>
						</div>
				<?}}else if($show_ques['question_type'] == 3){
					$arr_radio_name = explode(',', $show_ques['name_radio']);
					foreach ($arr_radio_name as $key => $value) {?>
						<div class="lua_chon_1_appen dc_appen2">
							<div class="lua_chon_1_checkbox">
								<input type="radio"  name="chon_radio2" value="" disabled>
							</div>
							<div class="lua_chon_1_input">
								<input type="text" placeholder="Nhập lựa chọn" class="them_border border_full" name="nhap_luachon_ra" onkeydown="nhap_lc(this)" value="<?=$value?>">
							</div>
							<div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)"><img src="../img/image_new/x_den.svg" alt="Đóng"></div>
						</div>
				<?}}?>
			</div>
		</div>
		<?if($show_ques['question_type'] != 1){?>
		<div class="them_luachon_js2" onclick="them_option(this)">
			<div class="click_them_lua_chon">
				<div class="click_them_lua_chon_sub">+</div>
				<div class="click_them_lua_chon_sub2">Thêm lựa chọn khác</div>
			</div>
		</div>
		<?}?>
	</div>

	<div class="add_question_two3">
		<div class="add_question_two3_btn1 x_pp_cauhoi cusor">Hủy</div>
		<div class="luu_data_ajax2" hidden data2="<?=$show_ques['id_group']?>" data3="<?=$show_ques['id']?>"></div>
		<div class="add_question_two3_btn2 cusor luu_question" onclick="update_question(this)">Lưu</div>
	</div>

	<script>
		$(".select_option").select2({
	        width: "100%",
	    });
	</script>

<?}
?>
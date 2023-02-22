<?php
require_once '../config/config.php';

$ques_id_group = getValue("ques_id_group","int","POST",0);

// Select câu hỏi
$select_ques = new db_query("SELECT * FROM `member_question` WHERE `id_group` = '$ques_id_group'");

// Select Quy tắc
$select_rule = new db_query("SELECT `title_rule`,`describe_rule` FROM `group_rules` WHERE `id_group` = '$ques_id_group'");?>
<?if(mysql_num_rows($select_ques->result) > 0){ ?>
	<div class="participation_question_main_1 border_bottom">
		<?while ($appen_question = mysql_fetch_assoc($select_ques->result)){
			$arr_namecheck = explode(',', $appen_question['name_checkbox']);
			$arr_nameradio = explode(',', $appen_question['name_radio']);?>
			<div class="participation_question_2_head return_id_type" data="<?=$appen_question['id']?>" data1="<?=$appen_question['question_type']?>">
				<div class="participation_question_2_head_title">
					<div class="participation_question_2_head_title_18"><?=$appen_question['title']?></div>
					<?if($appen_question['question_type'] == 2){?>
						<div class="participation_question_2_head_title_14">Bạn có thể chọn nhiều mục</div>
					<?}else if($appen_question['question_type'] == 3){?>
						<div class="participation_question_2_head_title_14">Bạn có thể chọn một mục</div>
					<?}else if($appen_question['question_type'] == 1){?>
						<div class="participation_question_2_head_title_14">Hãy viết câu trả lời</div>
					<?}?>
					
				</div>
				<div class="participation_question_2_head_input">
					<?if($appen_question['question_type'] == 2){?>
						<?foreach ($arr_namecheck as $key => $value) {?>
							<div class="participation_question_2_head_input_one parents_checkbox">
								<input type="checkbox" name="tich_luachon" value="<?=$key?>">
								<p class="text_checkbox checkbox_tex"><?=$value?></p>
							</div>
						<? } ?>
					<?}else if($appen_question['question_type'] == 3){?>
						<?foreach ($arr_nameradio as $key => $value) {?>
							<div class="participation_question_2_head_input_one parents_radio">
								<input type="radio" name="tich_dapan" value="<?=$key?>">
								<p class="text_checkbox radio_text"><?=$value?></p>
							</div>
						<? } ?>
					<?}else if($appen_question['question_type'] == 1){?>
						<div class="participation_question_2_head_textarea">
							<textarea name="question_free" placeholder="Viết câu trả lời"></textarea>
						</div>
					<?}?>
					
				</div>
			</div>
		<?}?>
	</div>
<?}?>
<?if(mysql_num_rows($select_rule->result) > 0){?>
<div class="participation_question_main_2 border_bottom">
	<div class="participation_question_main_2_title">Quy tắc nhóm của quản trị viên</div>
	<div class="participation_question_main_2_quy_dinh">
		<?$num = 1; while ($show_rule = mysql_fetch_assoc($select_rule->result)) {?>
			<div class="participation_question_main_2_quy_dinh_one">
				<div class="participation_question_main_2_quy_dinh_one_title"><?=$num++?> <span class="fig_ml"><?=$show_rule['title_rule']?></span></div>
				<div class="participation_question_main_2_quy_dinh_one_p"><?=$show_rule['describe_rule']?></div>
			</div>
		<? } ?>
	</div>
</div>
<?}?>
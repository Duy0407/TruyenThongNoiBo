<?php
require_once '../config/config.php';

$id_user = getValue("id_user","int","POST",0);
$id_group = getValue("id_group","int","POST",0);

// Select câu trả lời của thành viên
$select_question = new db_query("SELECT * FROM `member_question` WHERE `id_group` = '$id_group'");

while ($show_question = mysql_fetch_assoc($select_question->result)) {
	$arr_checkbox = explode(',', $show_question['name_checkbox']);
	$arr_radio = explode(',', $show_question['name_radio']);

	$select_answer = new db_query("SELECT * FROM `answer_user` WHERE `id_user` = '$id_user' AND `id_group` = '$id_group' AND `question` = '".$show_question['id']."'");
	$show_answer = mysql_fetch_assoc($select_answer->result);
	$answer = $show_answer['answer'];

	?>

	<div class="member_answered_main_one">
		<div class="member_answered_main_one_text">
			<div class="member_answered_main_one_title"><?=$show_question['title'] ?></div>
			<div class="member_answered_main_one_title_sub">
				<?if ($show_question['question_type'] == 2) {
					echo "Bạn có thể chọn nhiều mục";
				}else if ($show_question['question_type'] == 3) {
					echo "Bạn có thể chọn một mục";
				}else if ($show_question['question_type'] == 1) {
					echo "Bạn có thể nhập câu trả lời";
				}

				?>
			</div>
		</div>
		<div class="member_answered_main_one_content">
			<!-- Check box -->
			<?if ($show_question['question_type'] == 2) {?>
				<?foreach ($arr_checkbox as $key => $value) {?>
					<div class="member_answered_content_sub">
						<div class="member_answered_content_sub_check"><input type="checkbox" name="answered_check" disabled <?=($value == $answer) ? "checked" : ""?>></div>
						<div class="member_answered_content_sub_text"><?=$value ?></div>
					</div>
				<?}?>
			<?}?>

			<?if ($show_question['question_type'] == 3) {?>
				<?foreach ($arr_radio as $key => $value) {?>
					<div class="member_answered_content_sub">
						<div class="member_answered_content_sub_check"><input type="radio" name="answered_radio" disabled <?=($value == $answer) ? "checked" : ""?>></div>
						<div class="member_answered_content_sub_text"><?=$value ?></div>
					</div>
				<?}?>
			<?}?>
			<?if ($show_question['question_type'] == 1) {?>
				<textarea placeholder="Viết câu trả lời"><?=$answer?></textarea>
			<?}?>
			
		</div>
	</div>

	
	
		
<?}?>
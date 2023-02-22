<?php
require_once '../config/config.php';

$id_appen_rule = getValue("id_appen_rule","int","POST",0);

$select_rl = new db_query("SELECT * FROM `group_rules` WHERE `id` = '$id_appen_rule'");
$show_edit_rule = mysql_fetch_assoc($select_rl->result);

?>
<div class="ruled_hidden2" hidden data="<?=$_SESSION['login']['id']?>" data1="<?=$id_appen_rule?>"></div>
<div class="appen_rules_group_sub">
	<div class="create_group_rules_main_title">Viết quy tắc</div>
	<div class="create_group_rules_main_input">
		<input type="text" placeholder="Tiêu đề" name="title_rule_edit" value="<?=$show_edit_rule['title_rule']?>">
		<span class="setting_err"></span>
	</div>
	<div class="create_group_rules_main_textarea">
		<textarea placeholder="Mô tả" name="describe_rule_edit"><?=$show_edit_rule['describe_rule']?></textarea>
		<span class="setting_err"></span>
	</div>
</div>
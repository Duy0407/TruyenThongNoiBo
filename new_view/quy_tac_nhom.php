<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
check_user_empoyee();

$id = $_GET['id'];
$select_group = new db_query("SELECT `id`,`cover_image`,`group_image`,`group_name`,`id_manager`,`id_administrators`,`id_censor`,`id_employee`,`group_mode` FROM `group` WHERE `id` = '$id'");
$group = mysql_fetch_assoc($select_group->result);

$is_admin_group = is_admin_group($id, $my_id, $my_type);
$arr_mem_admin = $is_admin_group['arr_mem_admin'];
$arr_mem_censor = $is_admin_group['arr_mem_censor'];
$administrators_censor = $is_admin_group['administrators_censor'];
$is_admin = $is_admin_group['is_admin'];
if($is_admin){ 
    $select_rule = new db_query("SELECT * FROM `group_rules` WHERE `id_group` = '$id' ORDER BY id DESC");
    $count_qt = mysql_num_rows($select_rule->result);
}else{
    header("Location: https://truyenthongnoibo.timviec365.vn/nhom.html");
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_group.css?v=<?= $version ?>">
    <title>Quy tắc nhóm</title>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper background_o">

            <div id="cdnhanvienc" class="cdnhanvienc pg_new hide_header_1024">
                <?php include '../includes/cd_header_new.php'; ?>
            </div>

            <div class="private_group_content">

                <div id="pg_sidebar"> 
                    <?php include '../includes/sidebar_group.php';?>
                </div>

                <div class="head_yc_thanhvien">
                    <a href="/nhom-rieng-tu.html" class="head_yc_thanhvien_ic"><img src="../img/image_new/muiten_left.svg" alt=""></a>
                    <div class="head_yc_thanhvien_text">Quy tắc nhóm</div>
                </div>

                <div class="main_member_question">
                    <div class="member_select_question"> 
                        <?if($count_qt > 0){?>
                            <!-- Đã có quy tắc nhóm -->
                            <div class="co_group_rules">
                            	<div class="co_group_rules_head">
                            		<div class="co_group_rules_head_text">Quy tắc nhóm</div>
                                    <?if ($count_qt != 10) {?>
                                        <div class="no_question_btn cusor click_add_rules">Tạo quy tắc nhóm</div>
                                    <?}?>
                            	</div>
                                <div class="box_lst_rules">
                                    <?$num = 1;  while ($show_rule = mysql_fetch_assoc($select_rule->result)) {?>
            	                    	<div class="rules_one" data-id="<?=$show_rule['id']?>">
            	                    		<div class="rules_one_padding">
            	                    			<div class="rules_one_padding_sub">
            	                    				<h3 class="rules_one_title">
                                                        <span class="font_w_fig stt_rules"><?=$num++?>.</span>
                                                        <span class="title_rules"><?=$show_rule['title_rule']?></span>
                                                    </h3>
            	                    				<p class="rules_one_text"><?=nl2br($show_rule['describe_rule'])?></p>
            	                    			</div>
            	                    			
            	                    			<div class="rules_one_btn">
            	                    				<div class="rules_one_btn1 cusor append_rules" data="<?=$show_rule['id']?>" onclick="append_rules(this)">Chỉnh sửa</div>
            	                    				<div class="rules_one_btn2 cusor" data="<?=$show_rule['id']?>" onclick="delete_rule(this)">Xóa</div>
            	                    			</div>
            	                    		</div>
            	                    	</div>
                                    <? } ?>
                                </div>
                            </div>
                        <?}else{?>
                            <!-- Chưa có quy tắc nhóm -->
                            <div class="no_group_rules">
                                <div class="no_question_sub">
                                    <div class="no_question_img"><img src="../img/image_new/no_question.svg" alt=""></div>
                                    <div class="no_question_title">Chưa thiết lập quy tắc nào</div>
                                    <div class="no_question_text">Quy tắc sẽ góp phần xây dựng tinh thần chung của nhóm và ngăn mâu thuẫn giữa các thành viên. Hãy viết tối đa 10 quy tắc về nhóm của mình.</div>
                                    <div class="no_question_btn click_add_rules">Bắt đầu</div>
                                </div>
                            </div>
                        <?}?>
                    </div>
                    
                </div>

                
            </div>

        </div>
    </div>


<?php 
    include '../includes/popup_private_group.php';
?>    
</body>



<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js"></script>

<script>
    $("#pg_quytacnhom").addClass("active_background");
    $("#ic_quytacnhom").addClass("colof_icon")
    $("#text_quytacnhom").addClass("active_text");
</script>
</html>
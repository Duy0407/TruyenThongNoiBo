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
    $sl_ques = new db_query("SELECT * FROM `member_question` WHERE `id_user` = " . $_SESSION['login']['id'] ." AND `id_company` = " . $_SESSION['login']['id_com'] ." AND `id_group` = '$id'");
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
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_group.css?v=<?= $version ?>">
    <title>Câu hỏi chọn thành viên</title>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper background_o">

            <div id="cdnhanvienc" class="cdnhanvienc pg_new hide_header_1024">
                <?php include '../includes/cd_header_new.php'; ?>
            </div>

            <div class="private_group_content">

                <div id="pg_sidebar"> 
                    <?php include '../includes/sidebar_group.php'; ?>
                </div>

                <div class="head_yc_thanhvien">
                    <a href="/nhom-rieng-tu.html" class="head_yc_thanhvien_ic"><img src="../img/image_new/muiten_left.svg" alt=""></a>
                    <div class="head_yc_thanhvien_text">Câu hỏi chọn thành viên</div>
                </div>

                <div class="main_member_question">
                    <div class="member_select_question">

                        <?if(mysql_num_rows($sl_ques->result) > 0){?>
                            <!-- có câu hỏi -->
                            <div class="co_question">
                                <div class="co_question_khoi1">
                                    <h1 class="co_question_khoi1_text">Câu hỏi chọn thành viên</h1>
                                    <div class="no_question_btn click_add_question">Thêm câu hỏi</div>
                                </div>

                                <!-- Câu hỏi Checkbox -->
                                <?
                                $num_ques = 1;
                                while ($show_question = mysql_fetch_assoc($sl_ques->result)) {
                                    $arr_name_cb = explode(',', $show_question['name_checkbox']);

                                    $arr_radio_name = explode(',', $show_question['name_radio']);

                                ?>
                                    <div class="select_question_one">
                                        <div class="select_question_one_1">
                                            <div class="select_question_one_1_text">Câu hỏi <?=$num_ques++?></div>
                                            <div class="select_question_one_1_title"><?=nl2br($show_question['title'])?></div>
                                        </div>
                                        <?if($show_question['question_type'] == 1){?>
                                            <div class="wite_question">
                                                <textarea placeholder="Viết câu trả lời" disabled></textarea>
                                            </div>
                                        <?}else if($show_question['question_type'] == 2){?>
                                            <div class="select_question_one_2">
                                                <?foreach ($arr_name_cb as $key => $value) {?>
                                                    <div class="select_question_one_2_sub">
                                                        <div class="select_question_one_2_input">
                                                            <input type="checkbox" name="lua_chon" value="<?=$key?>">
                                                        </div>
                                                        <div class="select_question_one_2_text"><?=$value?></div>
                                                    </div>
                                                <? } ?>
                                            </div>
                                        <?}else if($show_question['question_type'] == 3){?>
                                            <div class="select_question_one_2">
                                                <?foreach ($arr_radio_name as $key => $value) {?>
                                                
                                                    <div class="select_question_one_2_sub">
                                                        <div class="select_question_one_2_input">
                                                            <input type="radio" name="dap_an" value="<?=$key?>">
                                                        </div>
                                                        <div class="select_question_one_2_text"><?=$value?></div>
                                                    </div>
                                                
                                                <? } ?>
                                            </div>
                                        <?}?>
                                        <div class="select_question_one_3">
                                            <div class="select_question_one_3_btn1 click_question_appen cusor" data="<?=$show_question['id']?>">Chỉnh sửa</div> 
                                            <div class="select_question_one_3_btn2 cusor" data="<?=$show_question['id']?>" onclick="delete_question(this)">Xóa</div>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>

                        <?}else{?>
                            <!-- Chưa có câu hỏi -->
                            <div class="no_question">
                                <div class="no_question_sub">
                                    <div class="no_question_img"><img src="../img/image_new/no_question.svg" alt=""></div>
                                    <div class="no_question_title">Câu hỏi chọn thành viên</div>
                                    <div class="no_question_text">Đặt tối đa 3 câu hỏi chọn thành viên cho người muốn tham gia nhóm. Chỉ quản trị viên và người kiểm duyệt mới xem được câu trả lời.</div>
                                    <div class="no_question_btn click_add_question">Thêm câu hỏi</div>
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
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js"></script>

<script>
    $("#bg_question").addClass("active_background");
    $("#ic_question").addClass("colof_icon")
    $("#test_question").addClass("active_text");

    $(".select_option").select2({
        width: "100%",
    });
</script>
</html>
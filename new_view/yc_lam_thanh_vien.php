<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1; 
$type_delete = 1;
$type_web = 2;
check_user_empoyee();

$id = $_GET['id'];
// $my_id = $_SESSION['login']['id'];
$select_group = new db_query("SELECT `id`,`cover_image`,`group_image`,`group_name`,`id_manager`,`id_administrators`,`id_censor`,`id_employee`,`group_mode`,`pheduyet_yc_thanhvien` FROM `group` WHERE `id` = '$id'");
$group = mysql_fetch_assoc($select_group->result);

$arr1 = explode(',', $group['id_manager']);
$arr2 = explode(',', $group['id_employee']);
$arr_admin = explode(',', $group['id_administrators']);
$arr_censor = explode(',', $group['id_censor']);

$pheduyet_yc_thanhvien = $group['pheduyet_yc_thanhvien'];

if ($pheduyet_yc_thanhvien == 0) {
    if (!in_array($my_id, $arr_admin) || in_array($my_id, $arr_censor)) {
     header("Location: https://truyenthongnoibo.timviec365.vn/nhom.html");
     exit();
    }
}


$noi_arr = array_merge($arr1,$arr2);
$result_arr = array_unique($noi_arr);

// Biến trả về danh sách bạn bè $my_friend
$my_friend = array_column($my_friend, 'id365');

$str_my_friend = implode(',', $my_friend);


if (in_array($my_id, $arr_admin) || in_array($my_id, $arr_censor)) {
    $select_member_request_join = new db_query("SELECT `id_user`,`user_type`,`request_time` FROM `member_request_join` WHERE `id_group` = '$id' AND `type_join` = 0");
}else{
    $select_member_request_join = new db_query("SELECT `id_user`,`user_type`,`request_time` FROM `member_request_join` WHERE `id_group` = '$id' AND `type_join` = 0 AND FIND_IN_SET(id_user, '$str_my_friend')");
}

$cout_mem = mysql_num_rows($select_member_request_join->result);


// Select Câu hỏi
$select_question = new db_query("SELECT * FROM `member_question` WHERE `id_group` = '$id'");




?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/slick-theme.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_group.css?v=<?= $version ?>">
    <title>Yêu cầu làm thành viên</title>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper background_o">

            <div id="cdnhanvienc" class="cdnhanvienc pg_new hide_header_1024">
                <?php include '../includes/cd_header_new.php'; ?>
            </div>

            <div class="private_group_content">

                <div id="pg_sidebar"> 
                    <?if (in_array($my_id, $arr_admin) || in_array($my_id, $arr_censor)) {?>
                        <?php include '../includes/sidebar_group.php'; ?>
                    <?}else{?>
                        <?php include '../includes/group/group_sidebar.php'; ?>
                    <?}?>
                    
                </div>

                <div class="head_yc_thanhvien">
                    <a href="/nhom-rieng-tu.html" class="head_yc_thanhvien_ic"><img src="../img/image_new/muiten_left.svg" alt=""></a>
                    <div class="head_yc_thanhvien_text">Yêu cầu làm thành viên</div>
                </div>

                <div class="main_yc_thanhvien">
                    <?if ($cout_mem > 0) {?>
                        <!-- Có thành viên -->
                        <div class="main_yc_thanhvien_padding">
                            <div class="yc_thanhvien_head">
                                <div class="yc_thanhvien_head_pd">
                                    <div class="yc_thanhvien_head_title">Yêu cầu làm thành viên . <?=$cout_mem?></div>

                                    <div class="yc_thanhvien_head_main">
                                        <div class="yc_thanhvien_head_main1">
                                            <div class="yc_thanhvien_head_main1_input">
                                                <input type="text" placeholder="Tìm kiếm theo tên" name="   ">
                                                <div class="ic_search">
                                                    <img src="../img/image_new/search_24.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="yc_thanhvien_main">
                                <? while ($show_mem = mysql_fetch_assoc($select_member_request_join->result)) {
                                        $id_use = $show_mem['id_user'];
                                        $pick_id_use = explode(',', $id_use);
                                        $arr_mem = list_stranger_infor(implode(',', $pick_id_use));
                                        foreach ($arr_mem as $key => $value) {
                                            $arr_ep[$value['ep_id']] = $value;
                                        }

                                    ?>
                                        <div class="yc_thanhvien_main_padding">
                                            <div class="thanhvien_main_box1">
                                                <div class="thanhvien_main_box1_info">
                                                    <div class="thanhvien_main_box1_info_img">
                                                        <img src="<?=($arr_ep[$show_mem['id_user']]['ep_image'] != "") ? "https://chamcong.24hpay.vn/upload/employee/". $arr_ep[$show_mem['id_user']]['ep_image'] : '../img/image_new/banner.png'?>" alt="">
                                                    </div>
                                                    <div class="thanhvien_main_box1_info_text">
                                                        <a href="/trang-ca-nhan-e<?=$id_use?>">
                                                            <p class="thanhvien_main_box1_info_text_name elipsis1"><?=$arr_ep[$show_mem['id_user']]['ep_name']?></p>
                                                        </a>
                                                        <p class="thanhvien_main_box1_info_text_time">Đã yêu cầu <?=time_elapsed_string($show_mem['request_time'])?></p>
                                                    </div>
                                                </div>
                                                <div class="thanhvien_main_box1_function data_pd_tc" data="<?=$id_use?>" data-user_type="<?=$show_mem['user_type']?>" data1="<?=$id?>">
                                                    <div class="thanhvien_main_box1_function1 cusor duyet_thanhvien">Phê duyệt</div>
                                                    <div class="thanhvien_main_box1_function2 cusor tu_choi_thanhvien" >Từ chối</div>
                                                    <div class="thanhvien_main_box1_function3" onclick="cl_3cham_den(this)">
                                                        <img src="../img/image_new/ic_3cham_black.svg" alt="">

                                                        <div class="pp_3cham_black">
                                                            <div class="pp_3cham_black_padding">
                                                                <a href="">
                                                                    <div class="pp_3cham_black_one">Nhắn tin cho <?=$arr_ep[$show_mem['id_user']]['ep_name']?></div>
                                                                </a>
                                                                <a href="/trang-ca-nhan-e<?=$id_use?>">
                                                                    <div class="pp_3cham_black_one bordet_top">Xem trang cá nhân</div>
                                                                </a>
                                                                <?if(mysql_num_rows($select_question->result) > 0){?>
                                                                    <div class="pp_3cham_black_one show_answered">Xem câu trả lời</div>
                                                                <?}?>
                                                                
                                                                <div class="pp_3cham_black_one bordet_top cl_tc_dg dong_tu_choi_chung">Từ chối kèm theo ý kiến đóng góp</div>
                                                                <div class="pp_3cham_black_one bordet_top click_tc_and_cam">Từ chối và cấm <span class="text_cam"><?=$arr_ep[$show_mem['id_user']]['ep_name']?></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="thanhvien_main_box2">
                                                <div class="thanhvien_main_box2_one">
                                                    <div class="thanhvien_main_box2_one_ic"><img src="../img/image_new/ic_banbe.svg" alt=""></div>
                                                    <div class="thanhvien_main_box2_one_text">2 bạn chung</div>
                                                </div>
                                                <div class="thanhvien_main_box2_one">
                                                    <div class="thanhvien_main_box2_one_ic"><img src="../img/image_new/ic_nhom.svg" alt=""></div>
                                                    <div class="thanhvien_main_box2_one_text">5 nhóm chung</div>
                                                </div>
                                                <div class="thanhvien_main_box2_one">
                                                    <div class="thanhvien_main_box2_one_ic"><img src="../img/image_new/ic_univer.svg" alt=""></div>
                                                    <div class="thanhvien_main_box2_one_text"><span class="color_666">Từng học tại</span> Đại học Thủy Lợi Hà Nội - ThuyLoi University</div>
                                                </div>
                                                <div class="thanhvien_main_box2_one">
                                                    <div class="thanhvien_main_box2_one_ic"><img src="../img/image_new/ic_compani.svg" alt=""></div>
                                                    <div class="thanhvien_main_box2_one_text"><span class="color_666">Làm việc tại</span> Timviec365.vn</div>
                                                </div>
                                                <div class="thanhvien_main_box2_one">
                                                    <div class="thanhvien_main_box2_one_ic"><img src="../img/image_new/ic_home.svg" alt=""></div>
                                                    <div class="thanhvien_main_box2_one_text"><span class="color_666">Sống tại</span> <?=$arr_ep[$show_mem['id_user']]['ep_address']?></div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                <?}?>
                            </div>
                        </div>
                    <?}else{?>
                        <!-- không có thành viên -->
                        <div class="no_member_report">
                            <div class="no_member_report_img">
                                <img src="../img/image_new/no_question.svg" alt="">
                            </div>
                            <div class="no_member_report_text">Không có nội dung nào</div>
                        </div>
                    <?}?>
                </div>

                
            </div>

        </div>
    </div>


<?php 
    include '../includes/popup_private_group.php';
?>    
</body>



<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js"></script>
<script src="../js/ep_index.js"></script>

<script>
    $("#bg_yc_thanhvien").addClass("active_background");
    $("#ic_yc_thanhvien").addClass("colof_icon")
    $(".text_yc_thanhvien").addClass("active_text");

    $(".select_option").select2({
        width: "100%",
    });
    // // Click show bộ lọc
    // $(".click_show_boloc_375").click(function(){
    //     // alert(1);
    //     (".chen_popup_600").show();
    // })
    // Click đóng bộ lọc màn 375
    $(".close_boloc_375").click(function(){
        $(this).parents(".chen_popup_600").hide();
    })
</script>
</html>
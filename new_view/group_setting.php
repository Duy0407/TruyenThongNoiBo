<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
check_user_empoyee();
$id = $_GET['id'];
$select_group = new db_query("SELECT * FROM `group` WHERE `id` = '$id'");
$group = mysql_fetch_assoc($select_group->result);

$is_admin_group = is_admin_group($id, $my_id, $my_type);
$arr_mem_admin = $is_admin_group['arr_mem_admin'];
$arr_mem_censor = $is_admin_group['arr_mem_censor'];
$administrators_censor = $is_admin_group['administrators_censor'];
$is_admin = $is_admin_group['is_admin'];

if(array_key_exists(($my_id."-".($my_type%2)), $arr_mem_admin)){
    $select_rule = new db_query("SELECT `type_show` FROM `group_rules` WHERE `id_group` = '$id' GROUP BY `id_group`");
    $show_rule = mysql_fetch_assoc($select_rule->result);
    $select_city = new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_parent` = 0");
} else {
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
    <title>Cài đặt nhóm</title>
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
                    <div class="head_yc_thanhvien_text">Cài đặt nhóm</div>
                </div>


                <div class="main_group_setting">
                	<div class="main_group_setting_padding">
                		<div class="main_group_setting_block_one">
                			<div class="main_group_setting_block_one_title">Thiết lập nhóm</div>
                			<div class="main_group_setting_one_content border_bottom">
                				<div class="main_group_setting_one_content_text">
                					<div class="main_group_setting_one_content_text_1">Tên và mô tả</div>
                				</div>
                				<div class="main_group_setting_one_content_ic click_name_and_des" data-name_group="<?=$group['group_name']?>" data-desc_group="<?=$group['description']?>">
                                    <img src="../img/image_new/ic_ben.svg" alt="">
                                </div>
                			</div>

                			<div class="main_group_setting_one_content2 border_bottom">
                				<div class="main_group_setting_one_content_text">
                					<div class="main_group_setting_one_content_text_1">Phần giới thiệu thành viên mới</div>
                					<div class="main_group_setting_one_content_text_2 content_active_thongdiep"><?=($group['show_introduce'] == 1)?'Bật':'Tắt'?></div>
                				</div>
                				<div class="main_group_setting_one_content_ic2 click_phan_gt" data-introduce="<?=$group['introduce']?>" data-show_rules="<?=$group['show_rules']?>"><img src="../img/image_new/ic_down_select.svg" alt=""></div>
                			</div>

                			<div class="main_group_setting_one_content2 border_bottom">
                				<div class="main_group_setting_one_content_text">
                					<div class="main_group_setting_one_content_text_1">Quyền riêng tư</div>
                					<div class="main_group_setting_one_content_text_2 content_privacy">
                                        <?=($group['group_mode'] != 1) ? "Công khai" : "Riêng tư";?>            
                                    </div>
                				</div>
                				<div class="main_group_setting_one_content_ic2 click_quyenriengtu" data-group_mode="<?=$group['group_mode']?>"><img src="../img/image_new/ic_down_select.svg" alt=""></div>
                			</div>

                			<div class="main_group_setting_one_content2 border_bottom">
                				<div class="main_group_setting_one_content_text">
                					<div class="main_group_setting_one_content_text_1">Ẩn nhóm</div>
                					<div class="main_group_setting_one_content_text_2 content_hide_show">
                                        <?=($group['hide_show'] != 1) ? "Hiển thị" : "Đã ẩn";?>               
                                    </div>
                				</div>
                				<div class="main_group_setting_one_content_ic click_an_nhom" data-hide_show="<?=$group['hide_show']?>">
                                    <img src="../img/image_new/ic_ben.svg" alt="">
                                </div>
                			</div>

                			<div class="main_group_setting_one_content border_bottom">
                				<div class="main_group_setting_one_content_text">
                					<div class="main_group_setting_one_content_text_1">Vị trí</div>
                                    <div class="main_group_setting_one_content_text_2 content_location">
                                        <?=$group['group_location'];?>               
                                    </div>
                				</div>
                				<div class="main_group_setting_one_content_ic stgr_click_vitri">
                                    <img src="../img/image_new/ic_ben.svg" alt="">
                                </div>
                                <!-- POPUP VỊ TRÍ -->
                                <div class="setting_vitri">
                                    <div class="pp_vi_tri_padding">
                                        <div class="pp_vi_tri_timkiem">
                                            <div class="pp_vi_tri_timkiem_nhap">
                                                <input type="text" class="search_vitri" placeholder="Tìm kiếm vị trí">
                                                <div class="ic_search mr3px">
                                                    <img src="../img/image_new/search_24.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sroll_pp_vitri">
                                            <div class="pp_vi_tri_diachi" data="<?=$id?>">
                                                <?while ($show_city = mysql_fetch_assoc($select_city->result)) {?>
                                                    <div class="pp_vi_tri_diachi_text" onclick="lay_text(this)"><?=$show_city['cit_name']?></div>
                                                <? } ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                			</div>
                		</div>

                		<div class="main_group_setting_block_one">
                			<div class="main_group_setting_block_one_title">Quản lý thành viên</div>
                			<div class="main_group_setting_one_content2 border_bottom">
                				<div class="main_group_setting_one_content_text">
                					<div class="main_group_setting_one_content_text_1">Ai có thể phê duyệt yêu cầu làm thành viên</div>
                					<div class="main_group_setting_one_content_text_2 content_pheduyet">
                                        <?=($group['pheduyet_yc_thanhvien'] != 1) ? "Chỉ quản trị viên và người kiểm duyệt" : "Bất cứ ai trong nhóm";?>               
                                    </div>
                				</div>
                				<div class="main_group_setting_one_content_ic click_qltv" data-pheduyet="<?=$group['pheduyet_yc_thanhvien']?>">
                                    <img src="../img/image_new/ic_ben.svg" alt="">
                                </div>
                			</div>
                		</div>

                		<div class="main_group_setting_block_one">
                			<div class="main_group_setting_block_one_title">Nội dung thảo luận</div>

                			<div class="main_group_setting_one_content2 border_bottom">
                				<div class="main_group_setting_one_content_text">
                					<div class="main_group_setting_one_content_text_1">Ai có thể đăng</div>
                					<div class="main_group_setting_one_content_text_2 content_who_can_post">
                                        <?=($group['who_can_post'] != 1) ? "Bất cứ ai trong nhóm" : "Chỉ quản trị viên";?>               
                                    </div>
                				</div>
                				<div class="main_group_setting_one_content_ic click_nd_thaoluan" data-who_post="<?=$group['who_can_post']?>">
                                    <img src="../img/image_new/ic_ben.svg" alt="">
                                </div>
                			</div>
                			<div class="main_group_setting_one_content2 border_bottom">
                				<div class="main_group_setting_one_content_text">
                					<div class="main_group_setting_one_content_text_1">Phê duyệt mọi bài viết của thành viên</div>
                					<div class="main_group_setting_one_content_text_2 content_pheduyet_post">
                                        <?=($group['Pheduyet_post_member'] != 1) ? "Bật" : "Tắt";?>               
                                    </div>
                				</div>
                				<div class="main_group_setting_one_content_ic click_pd_posts" data-pd_post="<?=$group['Pheduyet_post_member']?>"><img src="../img/image_new/ic_ben.svg" alt=""></div>
                			</div>
                			<div class="main_group_setting_one_content2 border_bottom">
                				<div class="main_group_setting_one_content_text">
                					<div class="main_group_setting_one_content_text_1">Phê duyệt nội dung chỉnh sửa</div>
                					<div class="main_group_setting_one_content_text_2 content_pheduyet_nd">
                                        <?=($group['pheduyet_noidung_edit'] != 1) ? "Bật" : "Tắt";?>               
                                    </div>
                				</div>
                				<div class="main_group_setting_one_content_ic click_pd_edit" data-pd_edit="<?=$group['pheduyet_noidung_edit']?>"><img src="../img/image_new/ic_ben.svg" alt=""></div>
                			</div>
                		</div>
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
    $("#pg_group_setting").addClass("active_background");
    $("#ic_group_setting").addClass("colof_icon")
    $(".text_group_setting").addClass("active_text");

    $(".select_option").select2({
        width: "100%",
    });
</script>
</html>
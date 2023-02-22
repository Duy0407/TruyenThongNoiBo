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

if(array_key_exists(($my_id."-".($my_type%2)), $arr_mem_admin)){
    $pick_day = time();
    $pick_today = date('Y-m-d', $pick_day);
    $pick_day = date('d-m-Y', $pick_day);

    $first_time = strtotime($pick_day);
    $last_time = strtotime($pick_day) + 86400 - 1;
    $seven_days_ago = strtotime($pick_day) - 86400 * 6;
    $last_time = date('Y-m-d', $last_time);
    $seven_days_ago = date('Y-m-d', $seven_days_ago);

    // Lọc tương tác theo ngày
    $day1 = getValue("day1","str","GET",$seven_days_ago);
    $day2 = getValue("day2","str","GET",$last_time);
    $str_day1 = strtotime($day1);
    $str_day2 = strtotime($day2) + 86400 - 1;

    if($day1 != "" && $day2 != ""){
        $db_post1 = new db_query("SELECT `new_id`,`updated_at` FROM `new_feed` WHERE `position` = '$id' AND `approve` = 0 AND `updated_at` <= '$str_day2' AND `updated_at` >= '$str_day1'");
    }else{
        $db_post1 = new db_query("SELECT `new_id`,`updated_at` FROM `new_feed` WHERE `position` = '$id' AND `approve` = 0 AND `updated_at` <= '$last_time' AND `updated_at` >= '$seven_days_ago'");
    }
    $arr_update = [];
    $arr_comment = [];
    $arr_like = [];
    while ($str_day1 <= $str_day2) {
        $key = date('d-m-Y', $str_day1);
        $arr_update[$key] = 0;
        $arr_comment[$key] = 0;
        $arr_like[$key] = 0;
        $str_day1 = $str_day1 + 86400;
    }

    //-------------------------------- Bài viết 7 ngày qua
    $count_post = mysql_num_rows($db_post1->result);
    $arr_new_id = [];
    while ($post1 = mysql_fetch_assoc($db_post1->result)) {
        $arr_update[date('d-m-Y',$post1['updated_at'])]++;
        $arr_new_id[] = $post1['new_id'];
    }
    $str_new_id = implode(',', $arr_new_id);

    $arr_update = json_encode(array_values($arr_update));

    //-------------------------------- Bình luận 7 ngày qua
    $sl_commen_in7 = new db_query("SELECT `updated_at` FROM `comment` WHERE FIND_IN_SET(id_new, '$str_new_id')");
    $cout_commen_in7 = mysql_num_rows($sl_commen_in7->result);
    while ($commet = mysql_fetch_assoc($sl_commen_in7->result)) {
        $arr_comment[date('d-m-Y', $commet['updated_at'])]++;
    }
    $json_comment = json_encode(array_values($arr_comment));

    //-------------------------------- Lấy like trong 7 ngày
    $sl_like_in7 = new db_query("SELECT nr_id, nr_new_id, nr_updated_at FROM new_reaction WHERE FIND_IN_SET(nr_new_id, '$str_new_id')");
    $cout_like_in7 = mysql_num_rows($sl_like_in7->result);
    while ($like = mysql_fetch_assoc($sl_like_in7->result)) {
        $arr_like[date('d-m-Y', $like['nr_updated_at'])]++;
    }
    $json_like = json_encode(array_values($arr_like));

    //-------------------------------- Lấy thành viên hoạt động trong 7 ngày
    
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
    <title>Tương tác</title>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper background_o">
            <div id="cdnhanvienc" class="cdnhanvienc pg_new hide_header_1024">
                <?php include '../includes/cd_header_new.php';?>
            </div>
            <div class="private_group_content">
                <div id="pg_sidebar"> 
                    <?php include '../includes/sidebar_group.php';?>
                </div>
                <div class="head_yc_thanhvien">
                    <a href="/nhom-rieng-tu.html" class="head_yc_thanhvien_ic"><img src="../img/image_new/muiten_left.svg" alt=""></a>
                    <div class="head_yc_thanhvien_text">Tương tác</div>
                </div>
                <!-- Mức độ tăng trưởng -->
                <div class="main_mdtt">
                	<div class="main_mdtt_padding">
                		<div class="main_mdtt_padding_main">
	                		<div class="main_mdtt_head">
	                			<div class="main_mdtt_head_one">
                                    <input type="date" name="day_one" max="<?=$pick_today?>" value="<?=$day1?>">
                                </div>
	                			<div class="main_mdtt_head_one">
                                    <input type="date" name="day_two" max="<?=$pick_today?>" value="<?=$day2?>">
                                </div>
	                		</div>
	                		<div class="main_mdtt_conten"></div>
	                		<div class="main_mdtt_conten_one">
                                <div class="main_mdtt_conten_one_sub">
                                    <div class="main_mdtt_conten_title chart_baiviet tt_chung">Bài viết . <?=$count_post?></div>
                                    <div class="main_mdtt_conten_title chart_binhluan tt_chung">Bình luận . <?=$cout_commen_in7?></div>
                                    <div class="main_mdtt_conten_title chart_camsuc tt_chung">Cảm xúc . <?=$cout_like_in7?></div>

                                    <div class="main_mdtt_conten_one_click">
                                        <div class="main_mdtt_conten_one_click1 back_color_tt" onclick="click_tuongtac('.tt_chung','.chart_baiviet','.main_mdtt_conten_one_click1',this)">Bài viết</div>
                                        <div class="main_mdtt_conten_one_click1" onclick="click_tuongtac('.tt_chung','.chart_binhluan','.main_mdtt_conten_one_click1',this)">Bình luận</div>
                                        <div class="main_mdtt_conten_one_click1" onclick="click_tuongtac('.tt_chung','.chart_camsuc','.main_mdtt_conten_one_click1',this)">Cảm xúc</div>
                                    </div>
                                </div>
	                			<!-- Bài viết -->
	                			<div class="main_mdtt_conten_chart chart_baiviet tt_chung">
	                				<div>
									  <canvas id="myChart"></canvas>
									</div>
	                			</div>
                                <!-- Bình luận -->
                                <div class="main_mdtt_conten_chart chart_binhluan tt_chung">
                                    <div>
                                      <canvas id="myChart2"></canvas>
                                    </div>
                                </div>
                                <!-- Cảm súc -->
                                <div class="main_mdtt_conten_chart chart_camsuc tt_chung">
                                    <div>
                                      <canvas id="myChart3"></canvas>
                                    </div>
                                </div>
	                		</div>
	                		<div class="main_mdtt_conten_one">
	                			<div class="main_mdtt_conten_title">Thành viên hoạt động . 1500</div>
	                			<div class="main_mdtt_conten_chart">
	                				<div>
									  <canvas id="myChart4"></canvas>
									</div>
	                			</div>
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
<script>
    var arr_update = <?=$arr_update;?>;
    var arr_comment = <?=$json_comment;?>;
    var arr_like = <?=$json_like;?>;
</script>


<script src="../js/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js"></script>
<script src="../js/group_chart_js.js"></script>

<script>
    $("#pg_tuongtac").addClass("active_background");
    $("#ic_tuongtac").addClass("colof_icon")
    $("#text_tuongtac").addClass("active_text");
</script>

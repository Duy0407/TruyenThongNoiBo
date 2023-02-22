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

$arr_admin = explode(',', $group['id_administrators']);
$arr_censor = explode(',', $group['id_censor']);

if (in_array($my_id, $arr_admin) || in_array($my_id, $arr_censor)) {
    $pick_day = time();
    $pick_today = date('Y-m-d', $pick_day);
    $pick_day = date('d-m-Y', $pick_day);

    $first_time = strtotime($pick_day);
    $last_time = strtotime($pick_day) + 86400 - 1;
    $seven_days_ago = strtotime($pick_day) - 86400 * 6;
    $last_time1 = date('Y-m-d', $last_time);
    $seven_days_ago1 = date('Y-m-d', $seven_days_ago);

    // Lọc Mức độ tăng trưởng theo ngày
    $day1 = getValue("day1","str","GET",$seven_days_ago1);
    $day2 = getValue("day2","str","GET",$last_time1);
    $str_day1 = strtotime($day1);
    $str_day2 = strtotime($day2) + 86400 - 1;

    $db_mem2 = new db_query("SELECT `id_user`,`request_time` FROM `member_request_join` WHERE `id_group` = '$id' AND `type_join` = 0 AND `request_time` <= '$last_time' AND `request_time` >= '$seven_days_ago'");
    $db_mem = new db_query("SELECT `id_user`,`request_time` FROM `member_request_join` WHERE `id_group` = '$id' AND `type_join` = 1 AND `request_time` <= '$last_time' AND `request_time` >= '$seven_days_ago'");
    $yc_member = [];
    $ar_all_member = [];
    while ($str_day1 <= $str_day2) {
        $key = date('d-m-Y', $str_day1);
        $yc_member[$key] = 0;
        $ar_all_member[$key] = 0;
        $str_day1 = $str_day1 + 86400;
    }
    // Yêu cầu làm thành viên
    $count_yc_mem = mysql_num_rows($db_mem2->result);
    while ($member = mysql_fetch_assoc($db_mem2->result)) {
        $yc_member[date('d-m-Y',$member['request_time'])]++;
    }
    $yc_member = json_encode(array_values($yc_member));

    // Tổng thành viên
    $count_all_mem = mysql_num_rows($db_mem->result);
    while ($all_member = mysql_fetch_assoc($db_mem->result)) {
        $ar_all_member[date('d-m-Y',$all_member['request_time'])]++;
    }
    $ar_all_member = json_encode(array_values($ar_all_member));


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
    <title>Mức độ tăng trưởng</title>
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
                    <div class="head_yc_thanhvien_text">Mức độ tăng trưởng</div>
                </div>

                <!-- Mức độ tăng trưởng -->
                <div class="main_mdtt">
                	<div class="main_mdtt_padding">
                		<div class="main_mdtt_padding_main">
                			
	                		<div class="main_mdtt_head">
	                			<div class="main_mdtt_head_one"><input type="date" max="<?=$pick_today?>" name="day_one" value="<?=$day1?>"></div>
	                			<div class="main_mdtt_head_one"><input type="date" max="<?=$pick_today?>" name="day_two" value="<?=$day2?>"></div>
	                		</div>
	                		<div class="main_mdtt_conten"></div>

	                		<div class="main_mdtt_conten_one">
	                			<div class="main_mdtt_conten_title">Tổng số thành viên . <?=$count_all_mem?></div>
	                			<div class="main_mdtt_conten_chart">
	                				<div>
									  <canvas id="myChart2"></canvas>
									</div>
	                			</div>
	                		</div>

	                		<div class="main_mdtt_conten_one">
	                			<div class="main_mdtt_conten_title">Yêu cầu làm thành viên . <?=$count_yc_mem?></div>
	                			<div class="main_mdtt_conten_chart">
	                				<div>
									  <canvas id="myChart"></canvas>
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
    var yc_member = <?=$yc_member;?>;
    var ar_all_member = <?=$ar_all_member;?>;
</script>


<script src="../js/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js"></script>
<script src="../js/group_chart_js2.js"></script>
<script>
    $("#pg_mucdo_tt").addClass("active_background");
    $("#ic_mucdo_tt").addClass("colof_icon")
    $("#text_mucdo_tt").addClass("active_text");
</script>
</html>
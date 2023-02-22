<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
check_user_empoyee();

$id = $_GET['id'];
$my_id = $_SESSION['login']['id'];
$select_group = new db_query("SELECT `id`,`cover_image`,`group_image`,`group_name`,`id_manager`,`id_administrators`,`id_censor`,`id_employee`,`group_mode` FROM `group` WHERE `id` = '$id'");
$group = mysql_fetch_assoc($select_group->result);

$arr_admin = explode(',', $group['id_administrators']);
$arr_censor = explode(',', $group['id_censor']);


if (in_array($my_id, $arr_admin) || in_array($my_id, $arr_censor)) {

// Lấy ngày hiện tại và cuối ngày
$pick_day = time();
$pick_day = date('d-m-Y', $pick_day);
$first_time = strtotime($pick_day);
$last_time = strtotime($pick_day) + 86400 - 1;
//-------------------------------- Đếm bài viết bị báo cáo trong ngày
$pick_time_report = new db_query("SELECT `id_report`,`time_report` FROM `members_report_posts` WHERE `id_group` = '$id' AND `time_report` > '$first_time' AND `time_report` <= '$last_time'");
$pick_time = mysql_num_rows($pick_time_report->result);
//-------------------------------- Đếm tổng bài viết đang chờ
$sl_post_waiting = new db_query("SELECT `new_id` FROM `new_feed` WHERE `position` = '$id' AND `approve` = 1 AND `updated_at` > '$first_time' AND `updated_at` <= '$last_time'");
$cout_post_day = mysql_num_rows($sl_post_waiting->result);
//-------------------------------- Đếm yêu cầu tham gia nhóm
$sl_mem_request_join = new db_query("SELECT `id_user` FROM `member_request_join` WHERE `id_group` = '$id' AND `type_join` = 0 AND `request_time` > '$first_time' AND `request_time` <= '$last_time'");
$cout_mem_day = mysql_num_rows($sl_mem_request_join->result);
$cout_total_today = $pick_time + $cout_post_day + $cout_mem_day; 




//-------------------------------- Lấy bài viết trong 7 ngày
$seven_days_ago = strtotime($pick_day) - 86400 * 6;
$post_in_7_days = new db_query("SELECT `new_id` FROM `new_feed` WHERE `position` = '$id' AND `approve` = 0 AND `updated_at` <= '$last_time' AND `updated_at` >= '$seven_days_ago'");
$cout_post_in_7_days = mysql_num_rows($post_in_7_days->result);
$assoc_in7 = $post_in_7_days->result_array();
$str_in7 = array_column($assoc_in7, 'new_id');
$str_in7 = implode(',', $str_in7);

//-------------------------------- Lấy bình luận trong 7 ngày  
$sl_commen_in7 = new db_query("SELECT `id`,`id_new` FROM `comment` WHERE FIND_IN_SET(id_new, '$str_in7')");
$cout_commen_in7 = mysql_num_rows($sl_commen_in7->result);

//-------------------------------- Lấy like trong 7 ngày
$sl_like_in7 = new db_query("SELECT `id`,`id_new` FROM `like` WHERE FIND_IN_SET(id_new, '$str_in7')");
$cout_like_in7 = mysql_num_rows($sl_like_in7->result);

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
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
    <title>Tổng quan</title>
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
                    <div class="head_yc_thanhvien_text">Tổng quan</div>
                </div>

                <div class="main_tongquan">
                    <div class="main_tongquan_padding">
                        <div class="main_tongquan_block1">
                            <h2 class="main_tongquan_block1_h2">Cần xem xét</h2>
                            <?if($cout_total_today != 0){?>
                                <p><?=$cout_total_today?> thông tin mới cần xem xét</p>
                            <?}else{?>
                                <p>Không có thông tin mới hôm nay</p>
                            <?}?>
                            
 
                            <div class="main_tongquan_block1_noidung">
                                <div class="tongquan_block1_noidung_one">
                                    <div class="tongquan_block1_noidung_one_img"><?=$ndbc?></div>
                                    <div class="tongquan_block1_noidung_one_text">
                                        <div class="tongquan_block1_noidung_one_text1">Nội dung thành viên báo cáo</div>
                                        <p><?=$pick_time ?> tin mới hôm nay</p>
                                    </div>
                                </div>
                                <div class="tongquan_block1_noidung_one">
                                    <div class="tongquan_block1_noidung_one_img cxs2"><?=$sb_ic_5?></div>
                                    <div class="tongquan_block1_noidung_one_text">
                                        <div class="tongquan_block1_noidung_one_text1">Bài viết đang chờ</div>
                                        <p><?=$cout_post_day?> bài viết mới hôm nay</p>
                                    </div>
                                </div>
                                <div class="tongquan_block1_noidung_one">
                                    <div class="tongquan_block1_noidung_one_img cxs3"><?=$sb_ic_3?></div>
                                    <div class="tongquan_block1_noidung_one_text">
                                        <div class="tongquan_block1_noidung_one_text1">Yêu cầu làm thành viên</div>
                                        <p><?=$cout_mem_day?> yêu cầu mới hôm nay</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="main_tongquan_block2">
                            <div class="main_tongquan_block2_khoi1">
                                <div class="main_tongquan_block2_tex_chung">
                                    <div class="main_tongquan_block2_tex_chung1">Tóm tắt thông tin chi tiết</div>
                                    <div class="main_tongquan_block2_tex_chung2">Trong 7 ngày qua</div>
                                </div>
                                <div class="tongquan_block2_main">
                                    <div class="tongquan_block2_main_one">
                                        <div class="tongquan_block2_main_one_div">
                                            <div class="tongquan_block2_main_one_div_img"><img src="../img/image_new/tomtat_tt_baiviet.svg" alt=""></div>
                                            <div class="tongquan_block2_main_one_div_text">Bài viết</div>
                                        </div>
                                        <div class="tongquan_block2_main_one_num"><?=$cout_post_in_7_days?></div>
                                    </div>
                                    <div class="tongquan_block2_main_one">
                                        <div class="tongquan_block2_main_one_div">
                                            <div class="tongquan_block2_main_one_div_img"><img src="../img/image_new/tomtat_tt_binhluan.svg" alt=""></div>
                                            <div class="tongquan_block2_main_one_div_text">Bình luận</div>
                                        </div>
                                        <div class="tongquan_block2_main_one_num"><?=$cout_commen_in7?></div>
                                    </div>
                                    <div class="tongquan_block2_main_one">
                                        <div class="tongquan_block2_main_one_div">
                                            <div class="tongquan_block2_main_one_div_img"><img src="../img/image_new/tomtat_tt_camxuc.svg" alt=""></div>
                                            <div class="tongquan_block2_main_one_div_text">Cảm xúc</div>
                                        </div>
                                        <div class="tongquan_block2_main_one_num"><?=$cout_like_in7?></div>
                                    </div>
                                </div>
                            </div>


                            <div class="main_tongquan_block2_khoi1">
                                <div class="main_tongquan_block2_tex_chung">
                                    <div class="main_tongquan_block2_tex_chung1">Thành viên hoạt động tuần qua</div>
                                    <div class="main_tongquan_block2_tex_chung2">Trong 7 ngày qua</div>
                                </div>
                                <div class="chart_js">
                                    <div id="chart"></div>
                                </div>
                            </div>
                        </div>

                        <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-tuong-tac.html">
                            <div class="main_tongquan_block3 cusor">Xem thông tin chi tiết về lượt tương tác</div>
                        </a>


                    </div>
                </div>

                
            </div>

        </div>
    </div>

    <?php
    
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    $("#bg_tongquan").addClass("active_background");
    $("#ic_tongquan").addClass("colof_icon")
    $("#text_tongquan").addClass("active_text");
</script>
<script> 
        var date_js = new Date();
        var current_month = date_js.getMonth() + 1;
        var day_today = date_js.getDate();
        var last0 = day_today+`/`+current_month;

        var one_day_ago = date_js - 86400000;
        var last_day1 = new Date(one_day_ago).getDate();
        var last_month1 = new Date(one_day_ago).getMonth() + 1;
        var last1 = last_day1+`/`+last_month1;

        var two_day_ago = date_js - 86400000 * 2;
        var last_day2 = new Date(two_day_ago).getDate();
        var last_month2 = new Date(two_day_ago).getMonth() + 1;
        var last2 = last_day2+`/`+last_month2;

        var three_day_ago = date_js - 86400000 * 3;
        var last_day3 = new Date(three_day_ago).getDate();
        var last_month3 = new Date(three_day_ago).getMonth() + 1;
        var last3 = last_day3+`/`+last_month3;


        var four_day_ago = date_js - 86400000 * 4;
        var last_day4 = new Date(four_day_ago).getDate();
        var last_month4 = new Date(four_day_ago).getMonth() + 1;
        var last4 = last_day4+`/`+last_month4;

        var five_day_ago = date_js - 86400000 * 5;
        var last_day5 = new Date(five_day_ago).getDate();
        var last_month5 = new Date(five_day_ago).getMonth() + 1;
        var last5 = last_day5+`/`+last_month5;

        var six_day_ago = date_js - 86400000 * 6;
        var last_day6 = new Date(six_day_ago).getDate();
        var last_month6 = new Date(six_day_ago).getMonth() + 1;
        var last6 = last_day6+`/`+last_month6;

        var options = {
          series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          // text: 'Product Trends by Month',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#FFF', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: [last6,last5,last4,last3,last2,last1,last0],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();



        
</script>


</html>
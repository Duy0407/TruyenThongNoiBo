<?php 
require_once '../includes/check_login.php';
require_once '../includes/check_account.php';
include("config.php");
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';
if ($_SESSION['login']['user_type'] == 2) {
    check_module(3);
}

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_create = 1;
// }else if(check_module(3)['create'] == 1){
//     $type_create = 1;
// }else{
//     $type_create = 0;
// }

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_delete = 1;
// }else if(check_module(3)['delete'] == 1){
//     $type_delete = 1;
// }else{
//     $type_delete = 0;
// }

$type_delete = 1;
$type_create = 1;
// if ($type_create == 0) {
//     header("location: /quan-ly-chung.html");
// }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Lịch cập nhật</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/caidat.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/vanhoadoanhnghiep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cai_dat_lich_cap_nhat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
</head>
<body>
    <div id="vanhoadoanhnghiep" class="co-sidebar-phai">
        <div class="wapper">
            <!--  sidebar -->
            <?php include '../includes/cd_sidebar.php'?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!--     header -->
                <?php include '../includes/cd_header.php'?>
                <!-- end header -->
                <!--  center -->
                <div id="center" class="v_center_thutuceo">
                    <!--  bài viết-->
                    <div class="baiviet">
                        <div id="main-baiviet" class="main-baiviet">
                            <ul>
                                <li class="lichcapnhat ">
                                    <div class="header-phongban header-ngu">
                                        <p>Thiết lập lịch cập nhật thông tin công ty</p>
                                    </div>
                                    <div class="body-lichcapnhat body-ngu">
                                        <div class="title">
                                            <p>Kế hoạch cập nhật thông tin định kỳ</p>
                                        </div>
                                        <div class="container">
                                            <!-- Thư từ CEO -->
                                            <form class="lich lich_1 calendar_mail_from_ceo" method="POST" action="../handle/update_calendar.php">
                                                <div class="title">
                                                    <p>1. Cập nhật mới thư từ CEO </p>
                                                </div>
                                                 <div class="thoigian">
                                                    <input type="date" name="time" class="date" placeholder="Thời gian cập nhật định kỳ">
                                                    <input type="hidden" value="1" class="v_update_calendar_type" name="type">
                                                </div>
                                                <div class="guinhacnho">
                                                    <input type="checkbox" name="" class="v_calendar">
                                                    <input type="hidden" name="remind">
                                                    <p>Gửi nhắc nhở cho tôi</p>
                                                </div>
                                                <div class="capnhat_lich">
                                                    <button class="v_capnhat_lich_btn">Tạo lịch</button>
                                                </div>
                                            </form>

                                            <!-- tầm nhìn sứ mệnh -->
                                            <form class="lich lich_1 calendar_mail_vision_mission" method="POST" action="../handle/update_calendar.php">
                                                <div class="title">
                                                    <p>2. Cập nhật mới tầm nhìn - sứ mệnh </p>
                                                </div>
                                                 <div class="thoigian">
                                                    <input type="date" name="time" class="date" placeholder="Thời gian cập nhật định kỳ">
                                                    <input type="hidden" value="2" class="v_update_calendar_type" name="type">
                                                </div>
                                                <div class="guinhacnho">
                                                    <input type="checkbox" name="" class="v_calendar">
                                                    <input type="hidden" name="remind">
                                                    <p>Gửi nhắc nhở cho tôi</p>
                                                </div>
                                                <div class="capnhat_lich">
                                                    <button class="v_capnhat_lich_btn">Tạo lịch</button>
                                                </div>
                                            </form>

                                            <!-- giá trị cốt lõi - mục tiêu chiến lược  -->
                                            <form class="lich lich_1 calendar_mail_core_val_target" method="POST" action="../handle/update_calendar.php">
                                                <div class="title">
                                                    <p>3. Cập nhật mới giá trị cốt lõi - mục tiêu chiến lược </p>
                                                </div>
                                                 <div class="thoigian">
                                                    <input type="date" name="time" class="date" placeholder="Thời gian cập nhật định kỳ">
                                                    <input type="hidden" class="v_update_calendar_type" value="3" name="type">
                                                </div>
                                                <div class="guinhacnho">
                                                    <input type="checkbox" name="" class="v_calendar">
                                                    <input type="hidden" name="remind">
                                                    <p>Gửi nhắc nhở cho tôi</p>
                                                </div>
                                                <div class="capnhat_lich">
                                                    <button class="v_capnhat_lich_btn">Tạo lịch</button>
                                                </div>
                                            </form>

                                            <!-- Nguyên tắc làm việc  -->
                                            <form class="lich lich_1 calendar_mail_working_rules" method="POST" action="../handle/update_calendar.php">
                                                <div class="title">
                                                    <p>4. Cập nhật mới nguyên tắc làm việc </p>
                                                </div>
                                                 <div class="thoigian">
                                                    <input type="date" name="time" class="date" placeholder="Thời gian cập nhật định kỳ">
                                                    <input type="hidden" class="v_update_calendar_type" value="4" name="type">
                                                </div>
                                                <div class="guinhacnho">
                                                    <input type="checkbox" name="" class="v_calendar">
                                                    <input type="hidden" name="remind">
                                                    <p>Gửi nhắc nhở cho tôi</p>
                                                </div>
                                                <div class="capnhat_lich">
                                                    <button class="v_capnhat_lich_btn">Tạo lịch</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end bài viết  -->

                    <!--  Side bar phải -->
                    <div class="side-bar-phai" id="side-bar-phai">
                        <div class="dropdown">
                            <div class="menu-phu">
                                <button class="dropbtn">
                                    <div class="menu-phu-d " id="menu-phu-d-name">
                                        <div class="img">
                                            <img src="../img/v_6.png">
                                        </div>
                                        <div class="cont">
                                            <p>Cài đặt lịch cập nhật thông tin mới</p>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-content congty-info">
                                    <a href="vhdn-thu-tu-seo.html" class="menu-phu-d " id="d_thutuceo"
                                        data-id='thutuceo'>
                                        <div class="img">
                                            <img src="../img/v_1.png">
                                        </div>
                                        <div class="cont">
                                            <p>Thư từ CEO</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-tam-nhin-su-menh.html" class="menu-phu-d " id="d_tamnhin"
                                        data-id='tamnhin'>
                                        <div class="img">
                                            <img src="../img/v_2.png">
                                        </div>
                                        <div class="cont">
                                            <p>Tầm nhìn - Sứ mệnh</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-gia-tri-muc-tieu.html" class="menu-phu-d " id="d_giatri"
                                        data-id='giatri-muctieu '>
                                        <div class="img">
                                            <img src="../img/v_3.png">
                                        </div>
                                        <div class="cont">
                                            <p>Giá trị cốt lõi - Mục tiêu chiến lược</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-nguyen-tac-lam-viec.html" class="menu-phu-d " id="d_nguyentac"
                                        data-id="nguyentaclamviec">
                                        <div class="img">
                                            <img src="../img/v_4.png">
                                        </div>
                                        <div class="cont">
                                            <p>Nguyên tắc làm việc</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-danh-sach-phong-ban.html" class="menu-phu-d  " id="d_danhsach"
                                        data-id="danhsachphongban">
                                        <div class="img">
                                            <img src="../img/v_5.png">
                                        </div>
                                        <div class="cont">
                                            <p>Danh sách phòng ban</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="img nut-hientrang">
                            <img id="icon-menu" src="../img/icon_menu.png">
                        </div>
                        <div class="trang">
                            <div class="icon-menu">
                                <div class="container" id="hien-trang">
                                    <div class=" icon-trong">
                                        <div class="img">
                                            <img id="icon-quayve" src="../img/icon_menu.png">
                                        </div>
                                    </div>
                                    <div class="lichcapnhat  content-phu">
                                        <div class="header header-ngu">
                                            <div class="title">
                                                <p>Thời gian cập nhật</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="container-cdl">
                                                <p>Trong tuần này</p>
                                                <img src="../img/v_8.png">
                                            </div>
                                            <div class="container-cdl">
                                                <p>15 ngày gần đây</p>
                                                <img src="../img/v_8.png">
                                            </div>
                                            <div class="container-cdl">
                                                <p>30 ngày gần đây</p>
                                                <img src="../img/v_8.png">
                                            </div>
                                            <div class="container-cdl">
                                                <p>90 ngày gần đây</p>
                                                <img src="../img/v_8.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end  popup tin nhắn trong center -->
                        </div>
                        <!--end Side bar phải -->
                    </div>
                    <!-- end center -->
                </div>
            </div>
            <? include('../includes/popup_nt.php') ?>
            <?php include '../includes/popup_dat.php'?>
        </div>
    </div>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script defer type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script defer src="../js/caidat.js"></script>
<script defer type="text/javascript" src="../js/datjs.js"></script>
<script defer type="text/javascript" src="../js/datvalidate.js"></script>
<script type="text/javascript">
    $('.active3').css('background',' #2E3994');
    $('.calendar_mail_from_ceo').submit(function(){
        var time = $(this).find('.date').val();
        if(time == ""){
            alert("Bạn chưa thêm thời gian");
            return false;
        }
    });

    $('.calendar_mail_vision_mission').submit(function(){
        var time = $(this).find('.date').val();
        if(time == ""){
            alert("Bạn chưa thêm thời gian");
            return false;
        }
    });

    $('.calendar_mail_core_val_target').submit(function(){
        var time = $(this).find('.date').val();
        if(time == ""){
            alert("Bạn chưa thêm thời gian");
            return false;
        }
    });

    $('.calendar_mail_working_rules').submit(function(){
        var time = $(this).find('.date').val();
        if(time == ""){
            alert("Bạn chưa thêm thời gian");
            return false;
        }
    });

    $(".v_calendar").click(function(){
        console.log($(this).prop('checked'));
        if($(this).prop('checked') == true){
            $(this).next().val(1);
        }else{
            $(this).next().val(0);
        }
    });
</script>
</html>
<?php
include("config.php");
require_once '../includes/check_login.php';
require_once '../api/api_all_info.php';
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';
// if ($_SESSION['login']['user_type'] == 2) {
//     check_module(3);
// }

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

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Giá trị - mục tiêu</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/vuong.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/vanhoadoanhnghiep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/gia_tri_muc_tieu.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <style>
        .v_core_value {
            color: #4C5BD4;
            border-bottom: 3px solid #4C5BD4;
        }
    </style>
</head>

<body>
    <div id="vanhoadoanhnghiep" class="co-sidebar-phai khongmenu_480">
        <div class="wapper">
            <!--  sidebar -->
            <?php include '../includes/cd_sidebar.php' ?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!--     header -->
                <?php include '../includes/cd_header.php' ?>
                <!-- end header -->
                <!--  center -->
                <div id="center" class="v_center">
                    <!--  Side bar phải -->
                    <div class="v_menu">
                        <div class="v_core_value">Giá trị cốt lõi</div>
                        <div class="v_target">Mục tiêu chiến lược</div>
                    </div>
                    <div class="side-bar-phai v_side-bar-phai menu-phu-d" id="side-bar-phai">
                        <div class="dropdown">
                            <div class="menu-phu">
                                <button class="dropbtn">
                                    <div class="menu-phu-d " id="menu-phu-d-name">
                                        <div class="img">
                                            <img src="../img/v_3.png">
                                        </div>
                                        <div class="cont">
                                            <p>Giá trị cốt lõi - Mục tiêu chiến lược</p>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-content congty-info">
                                    <a href="/vhdn-thu-tu-seo.html" class="menu-phu-d " id="d_thutuceo" data-id='thutuceo'>
                                        <div class="img">
                                            <img src="../img/v_1.png">
                                        </div>
                                        <div class="cont">
                                            <p>Thư từ CEO</p>
                                        </div>
                                    </a>
                                    <a href="/vhdn-tam-nhin-su-menh.html" class="menu-phu-d " id="d_tamnhin" data-id='tamnhin'>
                                        <div class="img">
                                            <img src="../img/v_2.png">
                                        </div>
                                        <div class="cont">
                                            <p>Tầm nhìn - Sứ mệnh</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-nguyen-tac-lam-viec.html" class="menu-phu-d " id="d_nguyentac" data-id="nguyentaclamviec">
                                        <div class="img">
                                            <img src="../img/v_4.png">
                                        </div>
                                        <div class="cont">
                                            <p>Nguyên tắc làm việc</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-danh-sach-phong-ban.html" class="menu-phu-d  " id="d_danhsach" data-id="danhsachphongban">
                                        <div class="img">
                                            <img src="../img/v_5.png">
                                        </div>
                                        <div class="cont">
                                            <p>Danh sách phòng ban</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-cai-dat-lich-cap-nhat.html" class="menu-phu-d " id="d_caidatlich" data-id="lichcapnhat">
                                        <div class="img">
                                            <img src="../img/v_6.png">
                                        </div>
                                        <div class="cont">
                                            <p>Cài đặt lịch cập nhật thông tin mới</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="trang">
                            <div class="icon-menu">
                                <div class="container" id="hien-trang">
                                    <div class=" icon-trong">
                                        <div class="img">
                                            <img id="icon-quayve" src="../img/icon_menu.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end Side bar phải -->
                    </div>
                    <div class="baiviet v_baiviet2">
                        <div id="main-baiviet" class="main-baiviet">
                            <?php require_once '../includes/van_hoa_doanh_nghiep/core_value_target/core_value.php'; ?>
                            <?php require_once '../includes/van_hoa_doanh_nghiep/core_value_target/target.php'; ?>
                        </div>
                    </div>
                    <!-- end center -->
                </div>
            </div>
            <? include('../includes/popup_nt.php') ?>
            <?php include '../includes/popup_dat.php' ?>
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
<script defer type="text/javascript" src="../js/giatri_muctieu.js"></script>
</html>
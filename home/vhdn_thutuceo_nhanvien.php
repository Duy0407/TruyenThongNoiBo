<?php 
include("config.php");
require_once '../includes/check_login.php';
require_once '../api/api_all_info.php';
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Thư từ ceo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/caidat.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?=$ver?>">
<body>
    <div id="vanhoadoanhnghiep_nhanvien" class="co-sidebar-phai">
        <div class="wapper">
            <!--  sidebar -->
            <?php include'../includes/cd_sidebar.php'?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!--     header -->
                <?php include'../includes/cd_header.php'?>
                <!-- end header -->
                <!--  center -->
                <div id="center">
                    <!--  bài viết-->
                    <div class="baiviet">
                        <div id="main-baiviet" class="main-baiviet">
                            <ul>
                                <li class="thutuceo">
                                    <div class="header header-ngu">
                                        <div class="title">
                                            <p>Danh sách thư</p>
                                        </div>
                                    </div>
                                    <div class="body-thu ">
                                        <div class="contaner-thu">
                                            <div class="thu">
                                                <div class="stt-thu">
                                                    <p>1</p>
                                                    <p>Đây là tên thư abcxyz</p>
                                                </div>
                                                <div class="capnhat-thu">
                                                    <p>Người cập nhật: Phạm Văn Minh </p>
                                                    <p>14h30 25.01.2020</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contaner-thu">
                                            <div class="thu">
                                                <div class="stt-thu">
                                                    <p>1</p>
                                                    <p>Đây là tên thư abcxyz</p>
                                                </div>
                                                <div class="capnhat-thu">
                                                    <p>Người cập nhật: Phạm Văn Minh </p>
                                                    <p>14h30 25.01.2020</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contaner-thu">
                                            <div class="thu">
                                                <div class="stt-thu">
                                                    <p>1</p>
                                                    <p>Đây là tên thư abcxyz</p>
                                                </div>
                                                <div class="capnhat-thu">
                                                    <p>Người cập nhật: Phạm Văn Minh </p>
                                                    <p>14h30 25.01.2020</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contaner-thu">
                                            <div class="thu">
                                                <div class="stt-thu">
                                                    <p>1</p>
                                                    <p>Đây là tên thư abcxyz</p>
                                                </div>
                                                <div class="capnhat-thu">
                                                    <p>Người cập nhật: Phạm Văn Minh </p>
                                                    <p>14h30 25.01.2020</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contaner-thu">
                                            <div class="thu">
                                                <div class="stt-thu">
                                                    <p>1</p>
                                                    <p>Đây là tên thư abcxyz</p>
                                                </div>
                                                <div class="capnhat-thu">
                                                    <p>Người cập nhật: Phạm Văn Minh </p>
                                                    <p>14h30 25.01.2020</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contaner-thu">
                                            <div class="thu">
                                                <div class="stt-thu">
                                                    <p>1</p>
                                                    <p>Đây là tên thư abcxyz</p>
                                                </div>
                                                <div class="capnhat-thu">
                                                    <p>Người cập nhật: Phạm Văn Minh </p>
                                                    <p>14h30 25.01.2020</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contaner-thu">
                                            <div class="thu">
                                                <div class="stt-thu">
                                                    <p>1</p>
                                                    <p>Đây là tên thư abcxyz</p>
                                                </div>
                                                <div class="capnhat-thu">
                                                    <p>Người cập nhật: Phạm Văn Minh </p>
                                                    <p>14h30 25.01.2020</p>
                                                </div>
                                            </div>
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
                                            <img src="../img/v_1.png">
                                        </div>
                                        <div class="cont">
                                            <p>Thư từ CEO</p>
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
                                    <a href="vhdn-cai-dat-lich-cap-nhat.html" class="menu-phu-d " id="d_caidatlich"
                                        data-id="lichcapnhat">
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
                                    <div class="thutuceo  content-phu">
                                        <div class="header header-thu ">
                                            <p>Chi tiết thư</p>
                                        </div>
                                        <div class="body-thu ">
                                            <div class="container-nd">
                                                <p>Đây là tên thư abcxyz</p>
                                                <p>Từ ngày 25.03.2020, tất cả nhân viên
                                                    Công ty cổ phần Thanh toán Hưng Hà
                                                    thực hiện gửi xe tại b07 lô 7 khu công
                                                    nghiệp Định Công, Hoàng Mai, Hà Nội</p>
                                                <a class="link_1" href="#" download="#"><img src="../img/vh_12.png">Đây
                                                    là
                                                    tệp tải lên.Doc</a>
                                            </div>
                                            <div class="container-thongtin">
                                                <p>Người cập nhật: Phạm Văn Minh </p>
                                                <p>14h30 25.01.2020</p>
                                            </div>
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
        <?php include'../includes/popup_dat.php'?>
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
</script>
</html>
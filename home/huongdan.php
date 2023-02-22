<?php
$version = time();
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" type="text/css" href="../css/reset.css?v=<?=$version?>">
    <link rel="stylesheet" type="text/css" href="../css/footer.css?v=<?=$version?>">
    <link rel="stylesheet" type="text/css" href="../css/huongdan.css?v=<?=$version?>">
    <link rel="stylesheet" type="text/css" href="../css/trangchu.css?v=<?=$version?>">
    <style>
        .nav-hd-menu-list .nav-hd-menu-list-item:nth-child(2){
            border-bottom: 2px solid #FFFFFF
        }
    </style>
    <title>Hướng dẫn</title>
</head>
<body>
<div id="huong-dan-all">
    <div id="header-hd">
        <?php include '../includes/in_header.php'; ?>
        <div class="hd-img">
            <div class="hd-img-them">
                <div class="hd-img-ttle2">
                    <p class="hd-img-ttle-p">Hướng dẫn sử dụng</p>
                    <p class="hd-img-ttle-p">Phần mềm Truyền thông văn hóa 365</p>
                </div>
            </div>
            <div class="hd-img-them2">
                <div class="hd-img-left">
                    <div class="hd-img-ttle">
                        <p class="hd-img-ttle-p">Hướng dẫn sử dụng</p>
                        <p class="hd-img-ttle-p">Phần mềm Truyền thông văn hóa 365</p>
                    </div>
                    <div class="hd-img-logo">
                        <div class="img-logo-lf"><img class="hd_logo_qr" src="../img/hd_logo_qr.png" alt="QR"></div>
                        <div class="img-logo-rt">
                            <img class="hd_chplay_hd" src="../img/hd_chplay_hd.png" alt="chplay">
                            <img class="hd_app-store" src="../img/hd_app-store.png" alt="Appstore">
                        </div>
                    </div>
                </div>
                <div class="hd-img-right">
                    <iframe class="hd_vide_hd" src="https://www.youtube.com/embed/UssNzo6m1p8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <!-- <img class="hd_vide_hd" src="../img/hd_vide_hd.png" alt="Ảnh lỗi"> -->
                </div>
            </div>
        </div>

    </div>
    <div id="main-hd">
        <div id="main-hd-con">
            <p class="hd_phanmen">Hướng dẫn sử dụng phần mềm</p>
            <div class="hd-all">
                <div class="xem-hd1">
                    <div><img class="hd_caidat" src="../img/hd_caidat.png" alt="Quản lý chung"></div>
                    <p class="hd-qlc">Quản lý chung</p>
                    <p class="hd-nd">Quản lý danh sách nhân viên, danh sách nhóm - phòng ban, cài đặt phân quyền nhân
                        viên</p>
                    <div class="xem-hd">
                        <p class="text-hd">Xem hướng dẫn</p>
                    </div>
                </div>
                <div class="xem-hd1">
                    <img class="hd_caidat" src="../img/hd_trangchu.png" alt="Trang chủ">
                    <p class="hd-qlc">Trang chủ</p>
                    <p class="hd-nd">Đăng tin, thông báo, sự kiện, hội thảo, tạo bình chọn... trên trang công ty.Xem và
                        bình luận các bài viết, tin đã đăng
                    <div class="xem-hd">
                        <p class="text-hd">Xem hướng dẫn</p>
                    </div>
                </div>
                <div class="xem-hd1">
                    <img class="hd_caidat" src="../img/hd_ttnbo.png" alt="Truyền thông nội bộ">
                    <p class="hd-qlc">Truyền thông nội bộ</p>
                    <p class="hd-nd">Đăng tin, thông báo, sự kiện, hội thảo, tạo bình chọn... trong từng nhóm thảo
                        luận.Xem chi tiết các sự kiện sắp diễn ra trong doanh nghiệp.</p>
                    <div class="xem-hd">
                        <p class="text-hd">Xem hướng dẫn</p>
                    </div>
                </div>
                <div class="xem-hd1">
                    <img class="hd_caidat" src="../img/hd_vhdn.png" alt="Văn hóa doanh nghiệp">
                    <p class="hd-qlc">Văn hóa doanh nghiệp</p>
                    <p class="hd-nd">Tạo, xem, chỉnh sửa, xóa các giá trị cốt lõi, mục tiêu chiến lược, thông tin công
                        ty, danh sách nhóm phòng ban trong doanh nghiệp</p>
                    <div class="xem-hd">
                        <p class="text-hd">Xem hướng dẫn</p>
                    </div>
                </div>
                <div class="xem-hd1">
                    <img class="hd_caidat" src="../img/hd_qttthuc.png" alt="Quản trị tri thức">
                    <p class="hd-qlc">Quản trị tri thức</p>
                    <p class="hd-nd">Thêm, xem, chỉnh sửa tài liệu.Đặt và trao đổi câu hỏi trong nội bộ doanh nghiệp.Trả
                        lời câu hỏi của người khác. </p>
                    <div class="xem-hd">
                        <p class="text-hd">Xem hướng dẫn</p>
                    </div>
                </div>
                <div class="xem-hd1">
                    <img class="hd_caidat" src="../img/hd_qlch.png" alt="Quản lý cuộc họp">
                    <p class="hd-qlc">Quản lý cuộc họp</p>
                    <p class="hd-nd">Thêm mới, chỉnh sửa, xóa, xem cuộc họp bao gồm cuộc họp trực tuyến, cuộc họp trực
                        tiếp, cuộc họp định kỳ.Video call đối với cuộc họp trực tuyến.</p>
                    <div class="xem-hd">
                        <p class="text-hd">Xem hướng dẫn</p>
                    </div>
                </div>
                <div class="xem-hd1 xem-hd5">
                    <img class="hd_caidat" src="../img/hd_dldx.png" alt="Dữ liệu đã xóa">
                    <p class="hd-qlc">Dữ liệu đã xóa</p>
                    <p class="hd-nd hd-dldx">Khôi phục hoặc xóa vĩnh viễn các dữ liệu đã xóa từ trước</p>
                    <div class="xem-hd">
                        <p class="text-hd">Xem hướng dẫn</p>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <?php include('../includes/in_footer.php'); ?>
</div>


</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/in_header.js"></script>
<script>
    $(document).ready(function () {
        $(".menutranghu768").click(function () {
            $(".menu-768").slideToggle();
        })
    })
</script>
</html>
<?php
require_once '../config/config.php';
if (isset($_SESSION['login'])) {
    header("Location: /quan-ly-chung.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/dang_nhap.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/trangchu.css?v=<?=$version?>">
</head>
<body>
    <div id="resgiter" class="dangky-dangnhap">
        <?php include('../includes/in_header.php'); ?>
        <div class="main">
            <div id="dangnhap" class="trangchu_tdn">
                <div class="container">
                    <form class="form form02">
                        <!-- form-header -->
                        <div class="form-header">
                            <button class="v_form-header__back" onclick="window.history.back();"><img src="../img/icon1.png" class="icon_back" alt="Ảnh lỗi"></button>
                            <span class="form-title">Đăng nhập</span>
                        </div>
                        <!--end form-header -->

                        <!--form-header -->
                        <div class="form-body">
                            <label class="form-body-label">Để tiếp tục đăng nhập bạn vui lòng chọn loại tài khoản.
                            </label>
                            <div class="luachon">
                                <a href="dang-nhap-cong-ty.html">
                                    <div class="chon congty congty02">
                                        <div class="image">
                                            <img class="congty02-image" src="../img/iconnha.png" alt="Ảnh lỗi">
                                        </div>
                                        <div class="content">
                                            <div class="title">
                                                <p class="content-title-p">Công ty</p>
                                            </div>
                                            <div class="cont">
                                                <p class="content-title-p2">Tài khoản công ty</p>
                                            </div>
                                        </div>
                                        <div class="next">
                                            <img class="icon_next" src="../img/icon5.png" alt="Ảnh lỗi">
                                        </div>
                                    </div>
                                </a>
                                <a href="dang-nhap-nhan-vien.html">
                                    <div class="chon nhanvien nhanvien02">
                                        <div class="img">
                                            <img src="../img/icon3.png" alt="Ảnh lỗi">
                                        </div>
                                        <div class="content">
                                            <div class="title">
                                                <p class="content-title-p">Nhân viên</p>
                                            </div>
                                            <div class="cont">
                                                <p>Tài khoản nhân viên hay các cá nhân trong hệ thống </p>
                                            </div>
                                        </div>
                                        <div class="next">
                                            <img src="../img/icon5.png" alt="Ảnh lỗi">
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <!--end form-body -->
                    </form>
                </div>

            </div>
        </div>
        <?php include('../includes/in_footer.php'); ?>
    </div>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js?v=<?=$version?>"></script>
<script type="text/javascript" src="../js/in_header.js?v=<?=$version?>"></script>
<script>
    $(document).ready(function () {
        $(".menutranghu768").click(function () {
            $(".menu-768").slideToggle();
        })
    })
</script>
</html>
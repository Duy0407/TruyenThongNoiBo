<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Khôi phục mật khẩu thành công</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/dat.css">
    <link rel="stylesheet" href="../css/caidat.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tung.css">
</head>

<body>
    <div id="khoiphucmatkhauthanhcong" class="dangky-dangnhap">
        <?php include('../includes/in_header.php'); ?>
        <!-- header  -->
        <div class="main">
            <div id="kpmatkhautc" class="trangchu_tdn">
                <div class="container ">
                    <form action="trang-chu-sau-dang-nhap.html" class="form">
                        <div class="form-body">
                            <div class="image">
                                <img src="../img/check_ring.png" alt="">
                            </div>
                            <div class="content">
                                <label>Bạn đã khôi phục tài khoản thành công! </label>
                                <p>Vui lòng đăng nhập ngay để tiếp tục sử dụng</p>
                            </div>
                            <div class="btn">
                                <button type="submit" name="">Đăng nhập ngay</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- main -->
        <?php include('../includes/in_footer.php'); ?>

    </div>


</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/validate_dn_dk.js"></script>
<script>
    $(document).ready(function () {
        $(".menutranghu768").click(function () {
            $(".menu-768").slideToggle();
        })
    })
</script>
</html>
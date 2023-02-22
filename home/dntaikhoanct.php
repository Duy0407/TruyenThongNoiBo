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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title>Đăng nhập tài khoản công ty</title>
    <link rel="stylesheet" href="../css/reset.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/dang_nhap_user.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/footer.css?v=<?=$version?>">
    <link rel="stylesheet" type="text/css" href="../css/trangchu.css?v=<?=$version?>">

</head>
<body>
    <div id="dntaikhoan" class="dangky-dangnhap">
        <?php include('../includes/in_header.php'); ?>
        <div class="main">
            <div id="dntaikhoanct" class="trangchu_tdn">
                <div class="container">
                    <form id="v_login_company" class="form">
                        <div class="form-header">
                            <a href="dang-nhap.html"><img class="form-header-img-back" src="../img/icon1.png" alt="Ảnh lỗi"></a>
                            <span class="form-title">Đăng nhập tài khoản công ty</span>
                        </div>
                        <div class="form-body">
                            <label class="form-body-label">Nhập thông tin tài khoản của công ty để tiếp tục sử dụng</label>
                            <div class="body-tren">
                                <div class="input congty">
                                    <div class="title">
                                        <label>Email<span class="title_span">*</span></label>
                                    </div>
                                    <div class="nhap form-input form-input_email">
                                        <input type="text" id="v_email" class="form-body-input" name="email" placeholder="Nhập email" autofocus>
                                    </div>
                                </div>

                                <div class="input ">
                                    <div class="title">
                                        <label>Mật khẩu<span class="title_span">*</span></label>
                                    </div>
                                    <div class="nhap mk form-input form-input_password">
                                        <input type="password" id="v_password" name="password" placeholder="Nhập mật khẩu" class="form-body-input">
                                        <span class="see_inp">
                                            <img class="see_inp_img" src="../img/mat.png" alt="Ảnh lỗi">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="body-duoi">
                                <div class="nhapma">
                                    <label class="nhapma_label">Nhập lại các ký tự trong bức ảnh</label>
                                </div>
                                <div class="trai">
                                    <div class="nhap form-input">
                                        <input type="text" name="captcha" autocomplete="Off" class="nhapma_input">
                                    </div>

                                </div>
                                <div class="phai">
                                    <div class="ma">
                                        <input class="manhap form-body-input" id="v_manhap" type="text" value="<?php echo $randomString; ?>" readonly>
                                        <img class="v_doimacaptcha" src="../img/rema.png">
                                    </div>
                                </div>
                            </div> -->
                            <label id="v_error_captcha" for="v_email"></label>
                        </div>
                        <div class="form-footer">
                            <div class="btn">
                                <button type="submit" class="form-footer-submit" name="">
                                    <span class="form-footer-submit-span">Đăng nhập</span>
                                    <img class="form-footer-submit-loading" src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi">
                                </button>
                            </div>
                            <label id="v_err_emailpass"></label>
                            <div class="quenmk">
                                <a href="https://chamcong.timviec365.vn/quen-mat-khau-b1.html?type=2" class="quenmk_link" target="_blank">Quên mật khẩu ?</a>
                            </div>
                            <div class="dangkingay">
                                <label class="dangkingay-label">Bạn chưa có tài khoản? <a class="dangkingay-label-link" href="https://chamcong.timviec365.vn/dang-ky.html" target="_blank"> Đăng ký ngay</a></label>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <?php include('../includes/in_footer.php'); ?>

    </div>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js?v=<?=$version?>"></script>
<script src="../js/jquery.validate.min.js?v=<?=$version?>"></script>
<script src="../js/dang_nhap_user.js?v=<?=$version?>"></script>
<script type="text/javascript" src="../js/in_header.js?v=<?=$version?>"></script>
<script>
    $(document).ready(function () {
        $(".menutranghu768").click(function () {
            $(".menu-768").slideToggle();
        })
    })
</script>
</html>
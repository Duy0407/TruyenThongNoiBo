<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Khôi phục mật khẩu</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/dat.css">
    <link rel="stylesheet" href="../css/caidat.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tung.css">
</head>

<body>
    <div id="khoiphucmatkhau" class="dangky-dangnhap">
        <?php include('../includes/in_header.php'); ?>
        <!-- header  -->
        <div class="main">
            <div id="khoiphucmk" class="trangchu_tdn">
                <div class="container">
                    <form action="khoi-phuc-mat-khau-tc.html" class="form" id="khoi_ohuc_mk" name="f_kpmk">
                        <div class="form-header">
                            <a href="quen-mat-khau.html"> <img src="../img/icon1.png" alt=""></a>
                            <span class="form-title">Khôi phục mật khẩu</span>
                        </div>
                        <div class="form-body">
                            <div class="tieude">
                                <label>Vui lòng nhập mã xác thực gồm 6 chữ số được gửi về email của bạn</label>
                            </div>
                            <div class="input ">
                                <div class="title">
                                    <label>Nhập mã xác thực<span>*</span></label>
                                </div>
                                <div class="nhap form-input ">
                                    <input type="text" name="nhap_ma_xacthuc"
                                        placeholder="Nhập mã xác thực gồm 6 chữ số " autofocus>
                                </div>
                            </div>
                            <div class="resend">
                                <img src="../img/rema_kp.png">
                                <span>Gửi lại mã xác thực</span>
                            </div>
                            <div class="input " style="margin-top: -5px;">
                                <div class="title">
                                    <label>Nhập mật khẩu mới<span>*</span></label>
                                </div>
                                <div class="nhap mk form-input">
                                    <input type="text" name="nhap_mk_moi" placeholder="Nhập mật khẩu mới" id="nmkm">
                                    <span class="see_inp"></span>
                                </div>
                            </div>
                            <div class="input ">
                                <div class="title">
                                    <label>Nhập lại mật khẩu<span>*</span></label>
                                </div>
                                <div class="nhap mk form-input ">
                                    <input type="text" name="nhap_lai_mk" placeholder="Nhập lại mật khẩu" id="nlmk">
                                    <span class="see_inp"></span>
                                </div>
                            </div>

                        </div>
                        <div class="form-footer">
                            <div class="btn">
                                <button type="submit" name="">Xác nhận (120s)</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- main -->
        <?php include('../includes/in_footer.php'); ?>
    </div>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
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
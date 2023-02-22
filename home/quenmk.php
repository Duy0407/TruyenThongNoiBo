<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Quên mật khẩu</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/dat.css">
    <link rel="stylesheet" href="../css/caidat.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tung.css">
    </style>
</head>

<body>
    <div id="quenmatkhau" class="dangky-dangnhap">
        <?php include('../includes/in_header.php'); ?>
        <!-- header  -->
        <div class="main">
            <div id="quenmk" class="trangchu_tdn">
                <div class="container">
                    <form action="khoi-phuc-mat-khau.html" method="post" class="form" id="quen_mk_email">
                        <div class="form-header">
                            <a href="dang-nhap-cong-ty.html"><img src="../img/icon1.png" alt=""></a>
                            <span class="form-title">Quên mật khẩu</span>
                        </div>
                        <div class="form-body">
                            <div class="tieude">
                                <label>Nhập email của bạn, mã khôi phục sẽ được gửi về email của bạn</label>
                            </div>
                            <div class="input email ">
                                <div class="title">
                                    <label>Nhập email<span>*</span></label>
                                </div>
                                <div class="nhap  form-input">
                                    <input type="text" name="email_quen_mk" placeholder="Nhập email đăng ký tài khoản"
                                        autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <div class="btn">
                                <button type="submit" name="">Khôi phục mật khẩu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- main -->
        <?php include('../includes/in_footer.php') ?>
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
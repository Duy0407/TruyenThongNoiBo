<?php
require_once '../config/config.php';
if (isset($_SESSION['login'])) {
    header("Location: /quan-ly-chung.html");
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">

    <meta name="description" content="Phần mềm Truyền thông nội bộ 365 - Phần mềm quản lý thông báo truyền thông doanh nghiệp. Truyền tải thông điệp trong doanh nghiệp nhanh, đơn giản và dễ dàng" />
	<meta name="Keywords" content="Truyền thông nội bộ, phần mềm truyền thông nội bộ" />

    <meta property="og:title" content="Phần Mềm Truyền Thông Nội Bộ - Văn Hóa Doanh Nghiệp" />
	<meta property="og:description" content="Phần mềm Truyền thông nội bộ 365 - Phần mềm quản lý thông báo truyền thông doanh nghiệp. Truyền tải thông điệp trong doanh nghiệp nhanh, đơn giản và dễ dàng" />

    <meta property="og:image:url" content="https://truyenthongnoibo.timviec365.vn/img/img48.png"/>
    <meta property="og:image:width" content="476"/>
    <meta property="og:image:height" content="249"/>
    <meta property="og:url" content="https://truyenthongnoibo.timviec365.vn/"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:type" content="website"/>
    
    <meta name="twitter:description" content="Phần mềm Truyền thông nội bộ 365 - Phần mềm quản lý thông báo truyền thông doanh nghiệp. Truyền tải thông điệp trong doanh nghiệp nhanh, đơn giản và dễ dàng" />
	<meta name="twitter:title" content="Phần Mềm Truyền Thông Nội Bộ - Văn Hóa Doanh Nghiệp" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:image" content="https://truyenthongnoibo.timviec365.vn/img/img48.png" />
    <link rel="canonical" href="https://truyenthongnoibo.timviec365.vn/" />

    <link rel="stylesheet" type="text/css" href="../css/reset.css?v=<?=$version?>">
    <link rel="stylesheet" type="text/css" href="../css/footer.css?v=<?=$version?>">
    <link rel="stylesheet" type="text/css" href="../css/trangchu.css?v=<?=$version?>">
    <style>
        .nav-hd-menu-list .nav-hd-menu-list-item:nth-child(1){
            border-bottom: 2px solid #FFFFFF
        }
    </style>
    <title>Phần Mềm Truyền Thông Nội Bộ - Văn Hóa Doanh Nghiệp</title>
</head>

<body>
    <div id="trangchu-all">
        <div class="all">
            <!-- header -->
            <?php include '../includes/in_header.php'; ?>
            <div class="header">
                <div class="information">
                    <div class="box_information_t">
                        <div class="title">
                            <h1 class="title-header">PHẦN MỀM TRUYỀN THÔNG NỘI BỘ - VĂN HÓA DOANH NGHIỆP</h1>
                        </div>
                        <div class="title2">
                            <p>Yếu tố quan trọng không thể thiếu trong thành công của doanh nghiệp 4.0</p>
                        </div>
                        <div class="contact_c">
                            <div class="dk"><a href="https://quanlychung.timviec365.vn/lua-chon-dang-ky.html" rel="nofollow" class="v_lienhehotro">Liên hệ hỗ trợ</a></div>
                            <div class="ht"><a rel="nofollow" href="https://quanlychung.timviec365.vn/lua-chon-dang-ky.html" class="v_dangkyngay">Đăng ký ngay</a></div>
                        </div>
                        <div class="download_app_pc">
                            <p class="download_app_tit">Tải App Truyền Thông Nội Bộ 365 dành cho PC</p>
                            <div class="download_app_img">
                                <a href="https://app.timviec365.vn/Download/AppElectron/Quanlychung1.0.8.exe" rel="nofollow" download><img src="../img/dl_app_pc2.png" alt="App"></a>
                                <a href="https://hungha365.com/upload_file/Quanlychung-1.0.2.dmg" rel="nofollow" download><img src="../img/dl_app_pc1.png" alt="App"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ////////// -->
            <!-- main -->
            <div class="main">
                <div class="feature">
                    <div class="container">
                        <h2 class="title-feature">Tính năng nổi bật</h2>
                        <div class="list-item5">
                            <div class="list-item-feature">
                                <div class="box-list-item-feature">
                                    <div class="img-feature">
                                        <img src="../img/tinhnang1_1520.png" class="img-feature-item1" alt="Truyền tải văn hóa doanh nghiệp">
                                    </div>
                                    <div class="title-feature ">
                                        <h3 class="feature-title">Truyền tải văn hóa doanh nghiệp đến cụ thể từng cá nhân trong nội bộ</h3>
                                    </div>
                                    <div class="tex-feature ">
                                        <p class="ptex-features ">Các giá trị văn hóa doanh nghiệp được xây dựng, gửi tới nhân viên một cách có tổ
                                            chức, rõ ràng, dễ hiểu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-item-feature ">
                                <div class="box-list-item-feature">
                                    <div class="img-feature">
                                        <img src="../img/tinhnang2_1520.png" class="img-feature-item" alt="Truyền thông đa chiều">
                                    </div>
                                    <div class="title-feature ">
                                        <h3 class="feature-title2">Truyền thông đa chiều trong nội bộ doanh nghiệp</h3>
                                    </div>
                                    <div class="tex-feature ">
                                        <p class="ptex-features ">Tương tác đa chiều giữa Nhân viên - cấp quản lý - nhân viên góp phần quan trọng trong
                                            công tác truyền tải thông tin, gắn kết nhân viên đồng lòng với mục tiêu chung</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-item-feature">
                                <div class="box-list-item-feature">
                                    <div class="img-feature">
                                        <img src="../img/tinhnang3_1520.png" class="img-feature-item" alt="Chia sẻ - quản trị tri thức">
                                    </div>
                                    <div class="title-feature ">
                                        <h3 class="feature-title3">Chia sẻ - quản trị tri thức</h3>
                                    </div>
                                    <div class="tex-feature ">
                                        <p class="ptex-features ">Xây dựng hệ thống tra cứu - chia sẻ tri thức nội bộ dành riêng cho doanh nghiệp và
                                            nhân viên Quản trị tri thức doanh nghiệp theo một hệ thống, dễ dàng phục vụ nhân
                                            viên.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-item-feature">
                                <div class="box-list-item-feature">
                                    <div class="img-feature">
                                        <img src="../img/tinhnang4_1520.png" class="img-feature-item" alt="Hỗ trợ sự kiện hội thảo">
                                    </div>
                                    <div class="title-feature  ">
                                        <h3 class="feature-title4">Hỗ trợ sự kiện - hội thảo</h3>
                                    </div>
                                    <div class="tex-feature ">
                                        <p class="ptex-features ">Tổ chức sự kiện - hội thảo - diễn đàn hỏi đáp, làm thân thiết hơn mối quan hệ diễn
                                            giả - khán giả trong sự kiện</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-item-feature">
                                <div class="box-list-item-feature">
                                    <div class="img-feature">
                                        <img src="../img/tinhnang5_1520.png" class="img-feature-item" alt="Quản lý thông tin khách tới thăm">
                                    </div>
                                    <div class="title-feature">
                                        <h3 class="feature-title4">Quản lý thông tin khách tới thăm</h3>
                                    </div>
                                    <div class="tex-feature ">
                                        <p class="ptex-features ">THệ thống quản lý thông tin, nội dung khách hàng ghé thăm công ty được quản lý chặt chẽ bởi quá trình lưu trữ khoa học</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ///////////// -->
                <div class="ma_qr">
                    <div class="container-ma_qr">
                        <h2>Download phần mềm truyền thông nội bộ doanh nghiệp</h2>
                        <div class="cover">
                            <div class="img_qr">
                                <img class="imgqr" src="../img/qr.png" alt="QR">
                            </div>
                            <div class="logo_qr">
                                <div class="logo_qr1"><img class="imgchplay" src="../img/chplay.png" alt="chplay"></div>
                                <div class="logo_qr2"><img class="imgapp" src="../img/app.png" alt="appstore"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /////// ///////-->
                <div class="Utilities">
                    <div class="container-Utilities">
                        <h2>Không gian giao lưu nội bộ<br> Truyền bá văn hóa doanh nghiệp</h2>
                        <div class="tln5">
                            <div class="box_t_imgicon">
                                <div class="imgicon">
                                    <div class="img-box"><img src="../img/img_lll1.png" alt="An toàn và bảo mật"></div>
                                    <div class="img-text-box">
                                        <h3>An toàn và bảo mật</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="box_t_imgicon">
                                <div class="imgicon">
                                    <div class="img-box"><img src="../img/img_lll2.png" alt="Một nền tảng duy nhất"></div>
                                    <div class="img-text-box">
                                        <h3>Một nền tảng duy nhất</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="box_t_imgicon">
                                <div class="imgicon">
                                    <div class="img-box"><img src="../img/img_lll3.png" alt="Ứng dụng công nghệ AI"></div>
                                    <div class="img-text-box">
                                        <h3>Ứng dụng công nghệ AI</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="box_t_imgicon">
                                <div class="imgicon ">
                                    <div class="img-box"><img src="../img/img_lll4.png" alt="Giải pháp số 1 Việt Nam"></div>
                                    <div class="img-text-box">
                                        <h3>Giải pháp số 1 Việt Nam</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="box_t_imgicon">
                                <div class="imgicon ">
                                    <div class="img-box"><img src="../img/img_lll5.png" alt="Sử dụng miễn phí trọn đời"></div>
                                    <div class="img-text-box">
                                        <h3>Sử dụng miễn phí trọn đời</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //////////////// -->
                <div class="video">
                    <div class="container-video">

                        <div class="v_d">
                            <div class="title_vd_hd">
                                <p class="p_hd_t">Video hướng dẫn sử dụng phần mềm</p>
                            </div>
                            <div class="video_left">
                                <iframe class="imgvideo" src="https://www.youtube.com/embed/UssNzo6m1p8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <!-- <img class="imgvideo" src="../img/video.png" alt="Ảnh lỗi"> -->
                            </div>
                            <div class="video_right">
                                <h2 class="textvd01">Video hướng dẫn sử dụng phần mềm</h2>
                                <p class="textvd1">PHẦN MỀM TRUYỀN THÔNG - VĂN HÓA DOANH NGHIỆP
                                <p>
                                <p class="textvd2">Nền tảng quản trị tài sản, quản trị thông tin và giao tiếp nội bộ giúp doanh nghiệp dễ dàng
                                    hơn trong việc truyền đạt mục tiêu, gắn kết nhân viên</p>
                                <a rel="nofollow" class="aaa" href="https://quanlychung.timviec365.vn/lua-chon-dang-ky.html">
                                    <span>Đăng ký để sử dụng miễn phí</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //////////// -->
                <div class="customer">
                    <div class="container-customer">
                        <div class="customer-all">
                            <div class="customer-title">
                                <h2>Khách hàng sử dụng Phần mềm Truyền thông nội bộ 365</h2>
                            </div>
                            <div class="topp">
                                <div class="item1">
                                    <img class="imgavat1" src="../img/avat1.png" alt="HV">
                                </div>
                                <div class="item1">
                                    <img class="imgavat2" src="../img/avata2.png" alt="Tin học Hải Nam">
                                </div>
                                <div class="item1">
                                    <img class="imgavat3" src="../img/avata3.png" alt="V Mark">
                                </div>
                                <div class="item1">
                                    <img class="imgavat4" src="../img/avata4.png" alt="Cen Housing">
                                </div>
                                <div class="item1">
                                    <img class="imgavat5" src="../img/avata5.png" alt="Azarole">
                                </div>
                                <div class="item1">
                                    <img class="imgavat1" src="../img/avat1.png" alt="HV">
                                </div>
                                <div class="item1">
                                    <img class="imgavat2" src="../img/avata2.png" alt="Tin học Hải Nam">
                                </div>
                                <div class="item1">
                                    <img class="imgavat3" src="../img/avata3.png" alt="V Mark">
                                </div>
                                <div class="item1">
                                    <img class="imgavat4" src="../img/avata4.png" alt="Cen Housing">
                                </div>
                                <div class="item1">
                                    <img class="imgavat5" src="../img/avata5.png" alt="Azorole">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /////////////// -->
                <div class="anh">
                    <div class="container-anh">
                        <span class="hoi_cham"></span>
                        <div class="img_gd">
                            <img src="../img/img45.png" alt="CEO">
                        </div>
                        <div class="the_p_tt_l">
                            <p>Hãy chấp nhận những gì định mệnh gắn cho bạn, hãy yêu cái nghề mà định mệnh cho bạn làm việc và hãy cố gắng hoàn thành nó với tất cả tấm chân tình</p>
                        </div>
                        <div class="the_p_tt_l_2">
                            <p class="p_1">TRƯƠNG VĂN TRẮC</p>
                            <p class="p_2">CEO - Tổng giám đốc Công ty Cổ phần Thanh toán Hưng Hà</p>
                        </div>
                        <div class="container_anh_linh">
                            <p>Hãy chấp nhận những gì định mệnh gắn cho bạn, hãy yêu cái nghề mà định mệnh cho bạn làm việc và hãy cố gắng hoàn thành nó với tất cả tấm chân tình </p>
                            <p>(CEO - Tổng giám đốc Công ty cổ phần thanh toán Hưng Hà - Trương Văn Trắc) </p>
                            <span class="linh"></span>
                        </div>
                        <span class="hoi_cham2"></span>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../includes/in_footer.php'); ?>
    </div>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js?v=<?=$version?>"></script>
<script type="text/javascript" src="../js/in_header.js?v=<?=$version?>"></script>
<script>
    $(document).ready(function() {
        $(".menutranghu768").click(function() {
            $(".menu-768").slideToggle();
        });
        $(".v_index_li_avatar").click(function() {
            if ($(".v_info_div2").css("display") == "none") {
                $(this).animate({
                    'borderBottomLeftRadius': 0,
                    'borderBottomRightRadius': 0,
                }, function() {
                    $(".v_info_div2").slideDown();
                });
            } else {
                $(".v_info_div2").slideUp("", function() {
                    $(".v_index_li_avatar").animate({
                        'borderBottomLeftRadius': "20px",
                        'borderBottomRightRadius': "20px",
                    });
                });
            }
        });
        $(".v_menu_signup").click(function() {
            if ($(".menu_detail").css("display") == "none") {
                $(".menu_detail").slideDown();
            } else {
                $(".menu_detail").slideUp();
            }

        });
    })
</script>

</html>
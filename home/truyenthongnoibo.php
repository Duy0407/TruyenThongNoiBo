<!DOCTYPE html>
<html lang="vi"> 

<head>
    <meta charset="utf-8">
    <title>Truyền thông nội bộ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/caidat.css">
    <link rel="stylesheet" href="../css/dat.css">
    <link rel="stylesheet" href="../css/tung.css">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="truyenthongnoibo" class="co-sidebar-phai">
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
                        <div class="banner page-trangcongty">
                            <img src="../img/banner1.png">
                            <div class="content">
                                <div class="info-ct">
                                    <div class="img">
                                        <img src="../img/logo1.png">
                                        <img src="../img/mayanh1.png">
                                    </div>
                                    <div class="cont">
                                        <p>Công ty Cổ phần Thanh toán Hưng Hà</p>
                                        <p>20 thành viên</p>
                                    </div>
                                </div>
                                <div class="edit-banner">
                                    <div class="img">
                                        <img src="../img/mayanh2.png">
                                    </div>
                                    <div class="cont">
                                        <p>Chỉnh sửa ảnh bìa</p>
                                    </div>
                                </div>
                                <input type="file" id="selectedFile_anhbia_1" style="display: none;" />

                            </div>
                        </div>
                        <div class="banner page-nhomthaoluan">
                            <img src="../img/banner2.png">
                            <div class="content">
                                <div class="info-ct">
                                    <div class="img">
                                        <img src="../img/logo2.png">
                                        <img src="../img/mayanh1.png">
                                    </div>
                                    <div class="cont">
                                        <p>Phòng kỹ thuật</p>
                                        <p>10 thành viên</p>
                                    </div>
                                </div>
                                <div class="edit-banner">
                                    <div class="img">
                                        <img src="../img/mayanh2.png">
                                    </div>
                                    <div class="cont">
                                        <p>Chỉnh sửa ảnh bìa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="baiviet-search">
                            <input type="text" name="" placeholder="Tìm kiếm bài viết ">
                            <span class="see_search"></span>
                        </div>
                        <div class="baiviet-header">
                            <div class="tren">
                                <div class="img avt">
                                    <img src="../img/caidatnhanvien/avt.png">
                                </div>
                                <div class="capnhat">
                                    <input type="text" name=""
                                        placeholder="Cập nhật công việc với các đồng nghiệp của bạn">
                                </div>
                                <div class="btn ">
                                    <button>Đăng</button>
                                </div>
                            </div>
                            <div class="duoi" id="duoi1">
                                <div class="duoi taianh">
                                    <img src="../img/icon_anh.png">
                                    <span>Tải lên ảnh/video/tệp</span>
                                </div>
                                <input type="file" id="selectedFile_anhbia_2" style="display: none;" />
                                <div class=" duoi nhacten" id="nhacten">
                                    <img src="../img/icon_nhac.png">
                                    <span>Nhắc tên thành viên</span>
                                    <div class="popup-nhacten" id="popup-nhacten">
                                        <div class="header">
                                            <input type="text" placeholder="@ll">
                                            <span class="see_search"></span>
                                        </div>
                                        <div class="body">
                                            <div class="container">
                                                <div class="thanhvien">
                                                    <div class="img">
                                                        <img src="../img/avt_st1.png">
                                                    </div>
                                                    <div class="cont">
                                                        <span>@ThuLetk</span>
                                                        <span>. Lê Thị Thu</span>
                                                    </div>
                                                </div>
                                                <div class="thanhvien">
                                                    <div class="img">
                                                        <img src="../img/avt_st1.png">
                                                    </div>
                                                    <div class="cont">
                                                        <span>@ThuLetk</span>
                                                        <span>. Lê Thị Thu</span>
                                                    </div>
                                                </div>
                                                <div class="thanhvien">
                                                    <div class="img">
                                                        <img src="../img/avt_st1.png">
                                                    </div>
                                                    <div class="cont">
                                                        <span>@ThuLetk</span>
                                                        <span>. Lê Thị Thu</span>
                                                    </div>
                                                </div>
                                                <div class="thanhvien">
                                                    <div class="img">
                                                        <img src="../img/avt_st1.png">
                                                    </div>
                                                    <div class="cont">
                                                        <span>@ThuLetk</span>
                                                        <span>. Lê Thị Thu</span>
                                                    </div>
                                                </div>
                                                <div class="thanhvien">
                                                    <div class="img">
                                                        <img src="../img/avt_st1.png">
                                                    </div>
                                                    <div class="cont">
                                                        <span>@ThuLetk</span>
                                                        <span>. Lê Thị Thu</span>
                                                    </div>
                                                </div>
                                                <div class="thanhvien">
                                                    <div class="img">
                                                        <img src="../img/avt_st1.png">
                                                    </div>
                                                    <div class="cont">
                                                        <span>@ThuLetk</span>
                                                        <span>. Lê Thị Thu</span>
                                                    </div>
                                                </div>
                                                <div class="thanhvien">
                                                    <div class="img">
                                                        <img src="../img/avt_st1.png">
                                                    </div>
                                                    <div class="cont">
                                                        <span>@ThuLetk</span>
                                                        <span>. Lê Thị Thu</span>
                                                    </div>
                                                </div>
                                                <div class="thanhvien">
                                                    <div class="img">
                                                        <img src="../img/avt_st1.png">
                                                    </div>
                                                    <div class="cont">
                                                        <span>@ThuLetk</span>
                                                        <span>. Lê Thị Thu</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <button class="btn">Thêm</button>
                                        </div>
                                    </div>
                                </div>

                                <div class=" duoi tuychinh" id="tuychinh_d">
                                    <img src="../img/icon_tuychinh.png">
                                    <span>Tùy chỉnh đăng tin</span>
                                    <div class="popup-tuychinh_d" id="popup-tuychinh_d">
                                        <div class="ul_model">
                                            <div class="li_model" id="nut-ttb">
                                                <img src="../img/tuychinh_1.png" alt="">
                                                <p class="p_model">Tạo thông báo</p>
                                            </div>
                                            <div class="li_model" id="nut-cdtvm">
                                                <img src="../img/tuychinh_2.png" alt="">
                                                <p class="p_model">Chào đón thành viên mới</p>
                                            </div>
                                            <div class="li_model" id="nut-tsk">
                                                <img src="../img/tuychinh_3.png" alt="">
                                                <p class="p_model">Tạo sự kiện</p>
                                            </div>
                                            <div class="li_model" id="nut-ttl">
                                                <img src="../img/tuychinh_4.png" alt="">
                                                <p class="p_model">Tạo thảo luận</p>
                                            </div>
                                            <div class="li_model" id="nut-csyt">
                                                <img src="../img/tuychinh_5.png" alt="">
                                                <p class="p_model">Chia sẻ ý tưởng</p>
                                            </div>
                                            <div class="li_model" id="nut-tbc">
                                                <img src="../img/tuychinh_6.png" alt="">
                                                <p class="p_model">Tạo bình chọn</p>
                                            </div>
                                            <div class="li_model" id="nut-tkt">
                                                <img src="../img/tuychinh_7.png" alt="">
                                                <p class="p_model">Tạo khen thưởng</p>
                                            </div>
                                            <div class="li_model" id="nut-ttnb">
                                                <img src="../img/tuychinh_8.png" alt="">
                                                <p class="p_model">Tạo tin tức nội bộ</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--     main-baiviet -->
                        <div id="main-baiviet" class="main-baiviet">
                            <ul class="noidung-st">
                                <li class="page-trangcongty">
                                    <div class="baiviets-header">
                                        <div class="imgtrai avt"><img src="../img/avt_st1.png"></div>
                                        <div class="cont">
                                            <p><span class="name-st">Nguyễn Thị Thu </span><span class="thuong"> đã đăng
                                                    trong </span><span class="address-st">Công ty Cổ phần Thanh toán
                                                    Hưng Hà</span></p>
                                            <p class="time-st">16:00 11/06/2021</p>
                                        </div>
                                        <div class="imgphai" id="nut-chinhsua">
                                            <img src="../img/bacham.png">
                                            <div class="popup-chinhsua" id="popup-chinhsua">
                                                <div class="ul_model">
                                                    <div class="li_model">
                                                        <img src="../img/icon_edit.png" alt="">
                                                        <p class="p_model">Bật thông báo</p>
                                                    </div>
                                                    <div class="li_model">
                                                        <img src="../img/icon_an.png" alt="">
                                                        <p class="p_model">Ẩn khỏi bảng tin</p>
                                                    </div>
                                                    <div class="li_model">
                                                        <img src="../img/icon_xoa.png" alt="">
                                                        <p class="p_model">Xóa bài viết</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="baiviets-body">
                                        <div class="status">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s.</p>
                                        </div>
                                        <div class="anh">
                                            <div class="anh1">
                                                <img src="../img/anh_bv1.png">
                                            </div>
                                            <div class="anh2">
                                                <img src="../img/anh_bv2.png">
                                            </div>
                                        </div>
                                        <div class="reach">
                                            <div class="lc tren">
                                                <div class="trai">
                                                    <img src="../img/like_x.png">
                                                    <img class="anh-an" src="../img/icon_reach.png">
                                                    <span>100</span>
                                                </div>
                                                <div class="phai">
                                                    <span>20 Bình luận</span>
                                                    <span class="nguoixem">99 Người xem</span>
                                                </div>
                                            </div>
                                            <div class="lc duoi">
                                                <div class="trai">
                                                    <img src="../img/like_t.png">
                                                    <span>Thích</span>
                                                </div>
                                                <div class="phai">
                                                    <img src="../img/icon_cmt.png">
                                                    <span>Bình luận</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="baiviets-footer">
                                        <div class="tren">
                                            <div class="img avt">
                                                <img src="../img/caidatnhanvien/avt.png">
                                            </div>
                                            <div class="cont">
                                                <input type="text" name="" placeholder="Viết bình luận...">
                                                <span class="see_icon"></span>
                                            </div>
                                        </div>
                                        <div class="duoi">
                                            <div class="xemthem">
                                                <p>Xem thêm bình luận</p>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <li class="page-trangcongty">
                                    <div class="baiviets-header">
                                        <div class="imgtrai avt"><img src="../img/avt_st1.png"></div>
                                        <div class="cont">
                                            <p><span class="name-st">Nguyễn Thị Thu </span><span class="thuong"> đã đăng
                                                    trong </span><span class="address-st">Công ty Cổ phần Thanh toán
                                                    Hưng Hà</span></p>
                                            <p class="time-st">16:00 11/06/2021</p>
                                        </div>
                                        <div class="imgphai"><img src="../img/bacham.png"></div>
                                    </div>
                                    <div class="baiviets-body">
                                        <div class="status">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s.</p>
                                        </div>
                                        <div class="anh">
                                            <div class="anh1">
                                                <img src="../img/anh_bv1.png">
                                            </div>
                                            <div class="anh2">
                                                <img src="../img/anh_bv2.png">
                                            </div>
                                        </div>
                                        <div class="reach">
                                            <div class="lc tren">
                                                <div class="trai">
                                                    <img src="../img/like_x.png">
                                                    <img class="anh-an" src="../img/icon_reach.png">
                                                    <span>100</span>
                                                </div>
                                                <div class="phai">
                                                    <span>20 Bình luận</span>
                                                </div>
                                            </div>
                                            <div class="lc duoi">
                                                <div class="trai">
                                                    <img src="../img/like_t.png">
                                                    <span>Thích</span>
                                                </div>
                                                <div class="phai">
                                                    <img src="../img/icon_cmt.png">
                                                    <span>Bình luận</span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="baiviets-footer">
                                        <div class="tren">
                                            <div class="img avt">
                                                <img src="../img/caidatnhanvien/avt.png">
                                            </div>
                                            <div class="cont">
                                                <input type="text" name="" placeholder="Viết bình luận...">
                                                <span class="see_icon"></span>
                                            </div>
                                        </div>
                                        <div class="duoi">

                                            <div class="xemthem">
                                                <div class="xembinhluan">
                                                    <div class="avt avt-cmt">
                                                        <img src="../img/avt_cmt.png">
                                                    </div>
                                                    <div class="binhluan">
                                                        <div class="container">
                                                            <div class="header-cmt">
                                                                <div class="name-cmt">
                                                                    <p>Lê thu trà</p>
                                                                </div>
                                                                <div class="edit-cmt">
                                                                    <img src="../img/bacham.png">
                                                                </div>
                                                            </div>
                                                            <div class="body-cmt">
                                                                <div class="cmt">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing
                                                                        and typesetting industry.
                                                                        Lorem Ipsum has been the industry's standard
                                                                        dummy text ever </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="reach-cmt">
                                                            <p>Thích</p>
                                                            <p class="trl-binhluan">Trả lời</p>
                                                            <p>10 phút trước</p>
                                                        </div>
                                                        <div class="tren" class="cmt-binhluan">
                                                            <div class="img avt">
                                                                <img src="../img/caidatnhanvien/avt.png">
                                                            </div>
                                                            <div class="cont">
                                                                <input type="text" name=""
                                                                    placeholder="Viết bình luận...">
                                                                <span class="see_icon"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="xem-binhluan">Xem thêm bình luận</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="baiviet-nhomthaoluan page-nhomthaoluan">
                                    <div class="baiviets-header">
                                        <div class="imgtrai avt"><img src="../img/avt_st1.png"></div>
                                        <div class="cont">
                                            <p><span class="name-st">Nguyễn Thị Thu </span><span class="thuong"> đã đăng
                                                    trong </span><span class="address-st">Công ty Cổ phần Thanh toán
                                                    Hưng Hà</span></p>
                                            <p class="time-st">16:00 11/06/2021</p>
                                        </div>
                                        <div class="imgphai"><img src="../img/bacham.png"></div>
                                    </div>
                                    <div class="baiviets-body">
                                        <div class="status">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s.</p>
                                        </div>
                                        <div class="anh">
                                            <img src="../img/anh_1.png">
                                        </div>
                                        <div class="reach">
                                            <div class="lc tren">
                                                <div class="trai">
                                                    <img src="../img/like_x.png">
                                                    <img class="anh-an" src="../img/icon_reach.png">
                                                    <span>100</span>
                                                </div>
                                                <div class="phai">
                                                    <span>20 Bình luận</span>
                                                </div>
                                            </div>
                                            <div class="lc duoi">
                                                <div class="trai">
                                                    <img src="../img/like_t.png">
                                                    <span>Thích</span>
                                                </div>
                                                <div class="phai">
                                                    <img src="../img/icon_cmt.png">
                                                    <span>Bình luận</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="baiviets-footer">
                                        <div class="tren">
                                            <div class="img avt">
                                                <img src="../img/caidatnhanvien/avt.png">
                                            </div>
                                            <div class="cont">
                                                <input type="text" name="" placeholder="Viết bình luận...">
                                                <span class="see_icon"></span>
                                            </div>
                                        </div>
                                        <div class="duoi">

                                            <div class="xemthem">
                                                <div class="xembinhluan" class="xembinhluan">
                                                    <div class="avt avt-cmt">
                                                        <img src="../img/avt_cmt.png">
                                                    </div>
                                                    <div class="binhluan">
                                                        <div class="container">
                                                            <div class="header-cmt">
                                                                <div class="name-cmt">
                                                                    <p>Lê thu trà</p>
                                                                </div>
                                                                <div class="edit-cmt">
                                                                    <img src="../img/bacham.png">
                                                                </div>
                                                            </div>
                                                            <div class="body-cmt">
                                                                <div class="cmt">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing
                                                                        and typesetting industry.
                                                                        Lorem Ipsum has been the industry's standard
                                                                        dummy text ever </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="reach-cmt">
                                                            <p>Thích</p>
                                                            <p class="trl-binhluan">Trả lời</p>
                                                            <p>10 phút trước</p>
                                                        </div>
                                                        <div class="tren" class="cmt-binhluan">
                                                            <div class="img avt">
                                                                <img src="../img/caidatnhanvien/avt.png">
                                                            </div>
                                                            <div class="cont">
                                                                <input type="text" name=""
                                                                    placeholder="Viết bình luận...">
                                                                <span class="see_icon"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="xem-binhluan">Xem thêm bình luận</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="tt-thanhvien ">
                                    <div class="header">
                                        <div class="container" id="tatca-tv">
                                            <div class="cont">
                                                <p class="color_chon">Tất cả thành viên(<span>20</span>)</p>
                                            </div>
                                        </div>
                                        <div class="container" id="online-tv">
                                            <div class="cont">
                                                <p>Đang online(3)</p>
                                            </div>
                                        </div>
                                        <div class="container" id="quantri-tv">
                                            <div class="cont">
                                                <p>Quản trị viên(1)</p>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <input type="text" name="" placeholder="Tìm kiếm thành viên">
                                            <span class="see_search"></span>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="mother-container">
                                            <div class="container thanhvien-hd">
                                                <div class="row">
                                                    <div class="info-thanhvien">
                                                        <div class="img">
                                                            <img src="../img/avt_st1.png">
                                                            <span class="status hd"></span>
                                                        </div>
                                                        <div class="cont">
                                                            <p>Phạm Văn Minh</p>
                                                            <p> ID: 012345 <span class="highlight">Quản Trị</span></p>
                                                            <p>Tham gia từ 20/05/2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="info-thanhvien">
                                                        <div class="container-tv">
                                                            <div class="cont">
                                                                <p>Email: Hungha.timviec365.com</p>
                                                            </div>
                                                        </div>
                                                        <div class="container-tv">
                                                            <div class="img">
                                                                <img src="../img/tv_1.png">
                                                            </div>
                                                            <div class="cont">
                                                                <p>0354020355</p>
                                                            </div>
                                                        </div>
                                                        <div class="container-tv">
                                                            <div class="img">
                                                                <img src="../img/tv_2.png">
                                                            </div>
                                                            <div class="cont">
                                                                <p>Cầu Giấy, Hà Nội</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info-thanhvien info-thanhvien-an">
                                                        <div class="img">
                                                            <img src="../img/tv_3.png">
                                                        </div>
                                                        <div class="cont">
                                                            <p>chat</p>
                                                        </div>
                                                    </div>
                                                    <div class="info-thanhvien">
                                                        <div class="img">
                                                            <img src="../img/tv_3.png">
                                                        </div>
                                                        <div class="img nut-xoathanhvien">
                                                            <img src="../img/tv_4.png">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container thanhvien-qt">
                                                <div class="row">
                                                    <div class="info-thanhvien">
                                                        <div class="img">
                                                            <img src="../img/avt_st1.png">
                                                            <span class="status hd"></span>
                                                        </div>
                                                        <div class="cont">
                                                            <p>Phạm Văn Minh</p>
                                                            <p> ID: 012345 <span class="highlight">Quản Trị</span></p>
                                                            <p>Tham gia từ 20/05/2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="info-thanhvien">
                                                        <div class="container-tv">
                                                            <div class="cont">
                                                                <p>Email: Hungha.timviec365.com</p>
                                                            </div>
                                                        </div>
                                                        <div class="container-tv">
                                                            <div class="img">
                                                                <img src="../img/tv_1.png">
                                                            </div>
                                                            <div class="cont">
                                                                <p>0354020355</p>
                                                            </div>
                                                        </div>
                                                        <div class="container-tv">
                                                            <div class="img">
                                                                <img src="../img/tv_2.png">
                                                            </div>
                                                            <div class="cont">
                                                                <p>Cầu Giấy, Hà Nội</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info-thanhvien info-thanhvien-an">
                                                        <div class="img">
                                                            <img src="../img/tv_3.png">
                                                        </div>
                                                        <div class="cont">
                                                            <p>chat</p>
                                                        </div>
                                                    </div>
                                                    <div class="info-thanhvien">
                                                        <div class="img">
                                                            <img src="../img/tv_3.png">
                                                        </div>
                                                        <div class="img">
                                                            <img src="../img/tv_4.png">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="info-thanhvien">
                                                        <div class="img">
                                                            <img src="../img/avt_st1.png">
                                                            <span class="status hd"></span>
                                                        </div>
                                                        <div class="cont">
                                                            <p>Phạm Văn Minh</p>
                                                            <p> ID: 012345 <span class="highlight">Quản Trị</span></p>
                                                            <p>Tham gia từ 20/05/2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="info-thanhvien">
                                                        <div class="container-tv">
                                                            <div class="cont">
                                                                <p>Email: Hungha.timviec365.com</p>
                                                            </div>
                                                        </div>
                                                        <div class="container-tv">
                                                            <div class="img">
                                                                <img src="../img/tv_1.png">
                                                            </div>
                                                            <div class="cont">
                                                                <p>0354020355</p>
                                                            </div>
                                                        </div>
                                                        <div class="container-tv">
                                                            <div class="img">
                                                                <img src="../img/tv_2.png">
                                                            </div>
                                                            <div class="cont">
                                                                <p>Cầu Giấy, Hà Nội</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info-thanhvien info-thanhvien-an">
                                                        <div class="img">
                                                            <img src="../img/tv_3.png">
                                                        </div>
                                                        <div class="cont">
                                                            <p>chat</p>
                                                        </div>
                                                    </div>
                                                    <div class="info-thanhvien">
                                                        <div class="img">
                                                            <img src="../img/tv_3.png">
                                                        </div>
                                                        <div class="img">
                                                            <img src="../img/tv_4.png">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="main-baiviet main-baiviet-sinhnhat">
                            <ul class="noidung-st">
                                <li class="sinhnhat-homnay sinhnhat">
                                    <div class="header">
                                        <div class="title">
                                            <p>Sinh nhật vào hôm nay (1)</p>
                                        </div>
                                        <div class="time">
                                            <p>12 tháng 6, 2021</p>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="ngaythang">
                                            <div class="container-snnv">
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                        <div class="chuc">
                                                            <input type="text" name=""
                                                                placeholder="Gửi lời chúc mừng sinh nhật đến anh ấy">
                                                            <span class="see_chuc"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                        <div class="chuc">
                                                            <input type="text" name=""
                                                                placeholder="Gửi lời chúc mừng sinh nhật đến anh ấy">
                                                            <span class="see_chuc"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="sinhnhat-ganday sinhnhat">
                                    <div class="header">
                                        <div class="title">
                                            <p>Sinh nhật gần đây (3)</p>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="ngaythang">
                                            <div class="cont">
                                                <p> Thứ 2, 14 tháng 06, 2021</p>
                                            </div>
                                            <div class="container-snnv">
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                        <div class="chuc">
                                                            <input type="text" name=""
                                                                placeholder="Gửi lời chúc mừng sinh nhật đến anh ấy">
                                                            <span class="see_chuc"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                        <div class="chuc">
                                                            <input type="text" name=""
                                                                placeholder="Gửi lời chúc mừng sinh nhật đến anh ấy">
                                                            <span class="see_chuc"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ngaythang">
                                            <div class="cont">
                                                <p> Thứ 2, 14 tháng 06, 2021</p>
                                            </div>
                                            <div class="container-snnv">
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                        <div class="chuc">
                                                            <input type="text" name=""
                                                                placeholder="Gửi lời chúc mừng sinh nhật đến anh ấy">
                                                            <span class="see_chuc"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                        <div class="chuc">
                                                            <input type="text" name=""
                                                                placeholder="Gửi lời chúc mừng sinh nhật đến anh ấy">
                                                            <span class="see_chuc"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="sinhnhat-saptoi sinhnhat">
                                    <div class="header">
                                        <div class="title">
                                            <p>Sinh nhật gần đây (3)</p>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="ngaythang">
                                            <div class="cont">
                                                <p> Thứ 2, 14 tháng 06, 2021</p>
                                            </div>
                                            <div class="container-snnv">
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ngaythang">
                                            <div class="cont">
                                                <p> Thứ 2, 14 tháng 06, 2021</p>
                                            </div>
                                            <div class="container-snnv">
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container-sn">
                                                    <div class="avt">
                                                        <img src="../img/avt_sn.png">
                                                    </div>
                                                    <div class="cont">
                                                        <div class="content">
                                                            <div class="info">
                                                                <p>Phan Lê An</p>
                                                                <p>Nhân sự</p>
                                                            </div>
                                                            <div class="tuoi">
                                                                <p>25 tuổi</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--     end main-baiviet -->
                        <div id="tatcathongbao">
                            <div class="header">
                                <div class="stt">
                                    <p>STT</p>
                                </div>
                                <div class="cont">
                                    <p>Tất cả thông báo</p>
                                </div>
                                <div class="xoa">
                                    <button class="btn btn_del_all_thongbao">Xóa tất cả</button>
                                    <div class="cd-modal-del" id="xoa_tatcathongbao">
                                        <div class="cd_container">
                                            <div class="cd_modal">
                                                <div class="cd_modal_header">
                                                    <h4 class="name_header">Xóa tất cả thông báo</h4>
                                                </div>
                                                <div class="cd_modal_body">
                                                    <form class="" method="" action="">
                                                        <div class="form-body">
                                                            <div class="row_modal_del">
                                                                <p class="p_popup_del"><b>Bạn có muốn xóa tất cả các
                                                                        thông báo? </b></p>
                                                                <p class="p_popup_del">Tất cả thông tin sẽ được lưu tự
                                                                    động vào <b>Đã xóa gần đây</b> trong thời gian 05
                                                                    ngày trước khi bị xóa vĩnh viễn</p>
                                                            </div>
                                                            <div class="form_buttom">
                                                                <button class="btn_huy btn_huy_xoatatca"
                                                                    type="button">Đóng
                                                                </button>
                                                                <button class="btn_luu" type="submit">Xóa</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="body">
                                <div class="container" id="tctb">
                                    <div class="thongbao">
                                        <div class="stt">
                                            <p>1</p>
                                        </div>
                                        <div class="cont">
                                            <p>Thông báo: V/v Thay đổi địa điểm gửi xe của nhân viên</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p class="chitiet_tb">Xem chi tiết</p>
                                            <div class="cd-modal-del" id="chitiet_thongbao">
                                                <div class="cd_container">
                                                    <div class="cd_modal">
                                                        <div class="cd_modal_header">
                                                            <h4 class="name_header">Chi tiết thông báo</h4>
                                                            <img src="../img/dau_x.png" alt="" class="close_detl">
                                                        </div>
                                                        <div class="cd_modal_body">
                                                            <form class="" method="" action="">
                                                                <div class="form-body">
                                                                    <div class="row_modal_del">
                                                                        <p class="p_popup_del"><b>V/v Thay đổi địa điểm
                                                                                gửi xe của nhân viên</b></p>
                                                                        <p class="p_popup_del">Từ ngày 25.03.2020, tất
                                                                            cả nhân viên
                                                                            Công ty cổ phần Thanh toán Hưng Hà thực hiện
                                                                            gửi xe
                                                                            tại b07 lô 7 khu công nghiệp Định Công,
                                                                            Hoàng Mai, Hà Nội</p>
                                                                    </div>
                                                                    <div class="row_modal_del link">
                                                                        <div class="img">
                                                                            <img src="../img/icon_tl.png">
                                                                        </div>
                                                                        <div class="cont">
                                                                            <p><a href="#"
                                                                                    download="#">Thongbaochuyendiadiemguixe.docx</a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form_buttom">
                                                                        <button class="btn_huy btn_huy_xoatatca"
                                                                            type="button">Đóng
                                                                        </button>
                                                                        <button class="btn_luu" id="btn_sua_baiviet"
                                                                            type="button">Sửa
                                                                        </button>
                                                                        <div class="cd-popup"
                                                                            id="model_suanhanhbaiviet">
                                                                            <div class="cd_container">
                                                                                <div class="cd_modal">
                                                                                    <div class="cd_modal_header">
                                                                                        <h4 class="name_header">Sửa
                                                                                            thông báo</h4>
                                                                                        <img src="../img/dau_x.png"
                                                                                            alt="" class="close_detl ">
                                                                                    </div>
                                                                                    <div class="cd_modal_body">
                                                                                        <form class="" method=""
                                                                                            action="">
                                                                                            <div class="form-body">
                                                                                                <div class="form_group">
                                                                                                    <label
                                                                                                        class="name">Tên
                                                                                                        thông
                                                                                                        báo</label>
                                                                                                    <input type="text"
                                                                                                        value=""
                                                                                                        name="txt_quequan"
                                                                                                        placeholder="V/v Thay đổi địa điểm gửi xe của nhân viên">
                                                                                                </div>
                                                                                                <div class="form_group">
                                                                                                    <label
                                                                                                        class="name">Nội
                                                                                                        dung thông
                                                                                                        báo</label>
                                                                                                    <input type="text"
                                                                                                        value=""
                                                                                                        name="txt_quequan"
                                                                                                        placeholder="Từ ngày 25.03.2020, tất cả nhân viên...">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form_group ">
                                                                                                    <label for=""
                                                                                                        class="name">Tải
                                                                                                        lên tệp đính
                                                                                                        kèm</label>
                                                                                                    <label
                                                                                                        for="input_file1">
                                                                                                        <input
                                                                                                            type="file"
                                                                                                            name=""
                                                                                                            class="custom-file-input"
                                                                                                            multiple>
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form_buttom">
                                                                                                    <button
                                                                                                        class="btn_huy"
                                                                                                        type="button">
                                                                                                        Hủy
                                                                                                    </button>
                                                                                                    <button
                                                                                                        class="btn_luu"
                                                                                                        type="submit">
                                                                                                        Cập
                                                                                                        nhật
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="xoa">
                                            <img src="../img/icon_thungrac.png" id="del_thongbao">
                                            <div class="cd-modal-del" id="xoa_thongbao">
                                                <div class="cd_container">
                                                    <div class="cd_modal">
                                                        <div class="cd_modal_header">
                                                            <h4 class="name_header">Xóa thông báo</h4>
                                                        </div>
                                                        <div class="cd_modal_body">
                                                            <form class="" method="" action="">
                                                                <div class="form-body">
                                                                    <div class="row_modal_del">
                                                                        <p class="p_popup_del"><b>Bạn có muốn xóa nội
                                                                                dung bản thông báo này? </b></p>
                                                                        <p class="p_popup_del">Tất cả thông tin sẽ được
                                                                            lưu tự động vào <b>Đã xóa gần đây</b> trong
                                                                            thời gian 05 ngày trước khi bị xóa vĩnh viễn
                                                                        </p>
                                                                    </div>
                                                                    <div class="form_buttom">
                                                                        <button class="btn_huy btn_huy_xoatatca"
                                                                            type="button">Đóng
                                                                        </button>
                                                                        <button class="btn_luu" type="submit">Xóa
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thongbao">
                                        <div class="stt">
                                            <p>1</p>
                                        </div>
                                        <div class="cont">
                                            <p>Thông báo: V/v Thay đổi địa điểm gửi xe của nhân viên</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi tiết</p>
                                        </div>
                                        <div class="xoa">
                                            <img src="../img/icon_thungrac.png">
                                        </div>
                                    </div>
                                    <div class="thongbao">
                                        <div class="stt">
                                            <p>1</p>
                                        </div>
                                        <div class="cont">
                                            <p>Thông báo: V/v Thay đổi địa điểm gửi xe của nhân viên</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi tiết</p>
                                        </div>
                                        <div class="xoa">
                                            <img src="../img/icon_thungrac.png">
                                        </div>
                                    </div>
                                    <div class="thongbao">
                                        <div class="stt">
                                            <p>1</p>
                                        </div>
                                        <div class="cont">
                                            <p>Thông báo: V/v Thay đổi địa điểm gửi xe của nhân viên</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi tiết</p>
                                        </div>
                                        <div class="xoa">
                                            <img src="../img/icon_thungrac.png">
                                        </div>
                                    </div>
                                    <div class="thongbao">
                                        <div class="stt">
                                            <p>1</p>
                                        </div>
                                        <div class="cont">
                                            <p>Thông báo: V/v Thay đổi địa điểm gửi xe của nhân viên</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi tiết</p>
                                        </div>
                                        <div class="xoa">
                                            <img src="../img/icon_thungrac.png">
                                        </div>
                                    </div>
                                    <div class="thongbao">
                                        <div class="stt">
                                            <p>1</p>
                                        </div>
                                        <div class="cont">
                                            <p>Thông báo: V/v Thay đổi địa điểm gửi xe của nhân viên</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi tiết</p>
                                        </div>
                                        <div class="xoa">
                                            <img src="../img/icon_thungrac.png">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php include'../includes/tung_truyenthongnb_baibai.php'?>

                    </div>


                    <!-- end bài viết  -->

                    <!--  Side bar phải -->
                    <div class="side-bar-phai" id="side-bar-phai">
                        <div class="dropdown">
                            <div class="xanh">
                                <button class="dropbtn nhom-trangcongty">
                                    <div class="img">
                                        <img src="../img/sbp_1.png">
                                    </div>
                                    <div class="cont">
                                        <p>Trang công ty</p>
                                    </div>
                                </button>
                                <div class="dropdown-content congty-info">
                                    <a href="#" id="nhom-trangcongty">
                                        <div class="img">
                                            <img src="../img/sbp_1.png">
                                        </div>
                                        <div class="cont">
                                            <p>Trang công ty</p>
                                        </div>
                                    </a>
                                    <a href="#" id="nhom-thaoluan">
                                        <div class="img">
                                            <img src="../img/sbp_2.png">
                                        </div>
                                        <div class="cont">
                                            <p>Nhóm - thảo luận</p>
                                        </div>
                                    </a>
                                    <a href="#" id="page-sn">
                                        <div class="img">
                                            <img src="../img/sbp_3.png">
                                        </div>
                                        <div class="cont">
                                            <p>Sinh nhật</p>
                                        </div>
                                    </a>
                                    <a href="#" id="sukien">
                                        <div class="img">
                                            <img src="../img/sbp_4.png">
                                        </div>
                                        <div class="cont">
                                            <p>Sự kiện</p>
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
                                      <?php include'../includes/tung_truyenthongnb_sidebar.php'?>
                                    <div class="sukien new page-trangcongty">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Sự kiện sắp tới</p>
                                            </div>
                                            <div class="phai">
                                                <p>Thêm</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="tren">
                                                <p>Giao lưu với tổng giám đốc</p>
                                                <p>14h30 25.01.2020</p>
                                            </div>
                                            <div class="duoi">
                                                <p>Xem thêm sự kiện</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="baiviet-moi new page-trangcongty">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Bài viết đánh dấu mới nhất</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="tren">
                                                <p>Không có nội dung nào được đánh dấu</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thongbao-moi new page-trangcongty">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Sự kiện sắp tới</p>
                                            </div>
                                            <div class="phai">
                                                <p id="tao_thongbao">Thêm</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="tren">
                                                <p>Thông báo: V/v Thay đổi địa điểm gửi xe của nhân viên</p>
                                                <p>14h30 25.01.2020</p>
                                            </div>
                                            <div class="tren">
                                                <p>Thông báo: V/v Thay đổi địa điểm gửi xe của nhân viên</p>
                                                <p>14h30 25.01.2020</p>
                                            </div>
                                            <div class="duoi">
                                                <p id="xemthongbao">Xem thêm sự kiện</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="new danhsach-nhom page-nhomthaoluan">
                                        <div class="header">
                                            <p>Danh sách nhóm - thảo luận</p>
                                        </div>
                                        <div class="body">
                                            <ul ds-nhom>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                                <li class="nhom">
                                                    <div class="cont">
                                                        <p>Phòng kỹ thuật</p>
                                                    </div>
                                                    <div class="img">
                                                        <img src="../img/icon_n.png">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="new gioithieu-nhom page-nhomthaoluan">
                                        <div class="header">
                                            <div class="header-cont">
                                                <p>Giới thiệu</p>
                                            </div>
                                            <div class="header-cont">
                                                <div class="cont">
                                                    <p>Chỉnh sửa</p>
                                                </div>
                                                <div class="img">
                                                    <img src="../img/anh_cs.png">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="body">
                                            <div class="container">
                                                <div class="cont">
                                                    <div class="title">
                                                        <p> Quản trị:</p>
                                                    </div>
                                                    <div class="content">
                                                        <p>Phạm Văn Minh</p>
                                                    </div>
                                                </div>
                                                <div class="cont">
                                                    <div class="title">
                                                        <p>Quản lý trực tiếp:</p>
                                                    </div>
                                                    <div class="content">
                                                        <p>Lê Thị Thu</p>
                                                    </div>
                                                </div>
                                                <div class="cont">
                                                    <div class="title">
                                                        <p> Mô tả:</p>
                                                    </div>
                                                    <div class="content">
                                                        <p class="mota">Đây là mô tả đây là mô tả</p>
                                                    </div>
                                                </div>
                                                <div class="cont">
                                                    <div class="title">
                                                        <p> Chế độ nhóm:</p>
                                                    </div>
                                                    <div class="content">
                                                        <p class="chedo">Công khai</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thanhvien-moi new ">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Thành viên mới <span>(24)</span></p>
                                            </div>
                                            <div class="phai">
                                                <p>Thêm</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="img dropdown">
                                                <div class="avt dropbtn">
                                                    <img src="../img/caidatnhanvien/avt.png">
                                                    <span class="status hd"></span>
                                                </div>
                                                <div class="popup-thanhvien dropdown-content">
                                                    <div class="header">
                                                        <div class="img">
                                                            <img src="../img/caidatnhanvien/avt.png">
                                                        </div>
                                                        <div class="cont">
                                                            <p>Phạm Văn Minh</p>
                                                            <p>Quản trị</p>
                                                            <p>ID: 012345</p>
                                                        </div>
                                                    </div>
                                                    <div class="body">
                                                        <div class="container">
                                                            <div class="img">
                                                                <img src="../img/nt_voi.png">
                                                            </div>
                                                            <div class="cont">
                                                                <p>Chat với <span>Lê Minh Tuấn</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="img avt">
                                                <img src="../img/avt_st1.png">
                                                <span class="status hd"></span>
                                            </div>
                                            <div class="img avt">
                                                <img src="../img/avt_cmt.png">
                                                <span class="status hd"></span>
                                            </div>
                                            <div class="img avt">
                                                <img src="../img/avt_cmt.png">
                                            </div>
                                            <div class="img avt">
                                                <img src="../img/avt_cmt.png">
                                            </div>
                                            <div class="img avt">
                                                <img src="../img/avt_st1.png">
                                            </div>
                                            <div class="img avt">
                                                <img src="../img/caidatnhanvien/avt.png">
                                            </div>
                                            <div class="img avt">
                                                <img src="../img/avt_st1.png">
                                            </div>
                                            <div class="img avt">
                                                <img src="../img/avt_st1.png">
                                            </div>
                                            <div class="img avt " id="hientatca-tt">
                                                <img src="../img/them_avt.png">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="sb-sinhnhat page-sinhnhat new">
                                        <div class="header">
                                            <div class="cont">
                                                <p>Tháng 8, 2021</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="cont">
                                                <span>Phạm Văn Minh, Phan Lê An</span> <span>và 7 người khác</span>
                                            </div>
                                            <div class="container-avt">
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sb-sinhnhat page-sinhnhat new">
                                        <div class="header">
                                            <div class="cont">
                                                <p>Tháng 9, 2021</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="cont">
                                                <span>Phạm Văn Minh, Phan Lê An</span> <span>và 7 người khác</span>
                                            </div>
                                            <div class="container-avt">
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sb-sinhnhat page-sinhnhat new">
                                        <div class="header">
                                            <div class="cont">
                                                <p>Tháng 10, 2021</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="cont">
                                                <span>Phạm Văn Minh, Phan Lê An</span> <span>và 7 người khác</span>
                                            </div>
                                            <div class="container-avt">
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                                <div class="img avt">
                                                    <img src="../img/avt_st1.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                      

                    </div>
                    <!-- end Side bar phải -->

                </div>
                <!--end  popup tin nhắn trong center -->
            </div>
            <!--end Side bar phải -->

        </div>
        <!--modol tao thao luan -->
        <div class="cd-popup  model_560 " id="model_taothaoluan">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Tạo thảo luận</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label class="name">Tiêu đề bài thảo luận<span class="cr_red">*</span></label>
                                    <input type="text" value="" placeholder="Nhập tên tiêu đề thảo luận">
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Nội dung thảo luận chi tiết<span
                                            class="cr_red">*</span></label>
                                    <textarea class="textarea_cheditor" id="content"
                                        placeholder="nhap noi dung"></textarea>
                                    <script type="text/javascript">
                                    CKEDITOR.replace("content");
                                    </script>
                                </div>
                                <div class="form_group">
                                    <label class="name">Gắn thẻ thành viên<span class="cr_red">*</span></label>
                                    <div class="form_select2">
                                        <select class="select2_muti_tv" multiple name="select2_qt">
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Quyền riêng tư<span class="cr_red">*</span></label>
                                    <div class="select_no_muti_li">
                                        <select class="select2_t_company select2s" name="select_truong_company">
                                            <option value="1">Công khai</option>
                                            <option value="2">Riêng tư</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- input_xanh -->
                                <div class="form_group ">
                                    <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                                    <label for="input_file1">
                                        <input type="file" class="custom-file-input" multiple>
                                    </label>
                                </div>

                                <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu">Lưu thông tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end modol tao thao luan -->

        <!-- modol tao thong bao -->
        <div class="cd-popup model_560 " id="model_taothongbao">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Tạo thông báo</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <p class="text_message">
                                        (Thông báo giúp bạn gửi các thông tin quan trọng tới toàn thể thành viên trong
                                        phòng/ban. Thông báo được gửi kèm tới email của mọi thành viên)
                                    </p>
                                </div>
                                <div class="form_group">
                                    <label class="name">Tiêu đề thông báo<span class="cr_red">*</span></label>
                                    <input type="text" value="" name="txt_quequan"
                                        placeholder="Nhập tên tiêu đề thảo luận">
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Nội dung thông báo<span class="cr_red">*</span></label>
                                    <textarea name="content" class="textarea_cheditor"
                                        placeholder="Nhập nội dung thông báo"></textarea>
                                </div>
                                <div class="form_group ">
                                    <label for="" class="name">Tải lên tệp đính kèm<span class="cr_red">*</span></label>
                                    <label for="input_file1">
                                        <input type="file" name="" class="custom-file-input" multiple>
                                    </label>
                                </div>
                                <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu">Đăng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end modol tao thong bao -->

        <!-- modol xoa thành viên -->
        <div class="cd-modal-del" id="xoa_thanhvien">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Xóa thành viên</h4>
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="row_modal_del">
                                    <p class="p_popup_del"><b>Bạn có chắc muốn xóa thành viên Lê Thị Thu?</b></p>
                                </div>
                                <div class="form_buttom">
                                    <button class="btn_huy btn_huy_xoatatca" type="button">Hủy</button>
                                    <button class="btn_luu" type="submit">Xóa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end modol xoa thành viên -->


        <!-- popup-tạo tin nội bộ -->
        <div class="cd-popup  model_560 " id="model_tinnoibo">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Tạo tin nội bộ </h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label class="name">Tiêu đề <span class="cr_red">*</span></label>
                                    <input type="text" value="" name="txt_quequan" placeholder="Nhập tiêu đề">
                                </div>
                                <div class="form_group">
                                    <label class="name">Nội dung<span class="cr_red">*</span></label>
                                    <input type="text" value="" name="txt_quequan" placeholder="Nhập nội dung">
                                </div>
                                <div class="form_group">
                                    <label class="name">Ảnh bìa<span class="cr_red">*</span></label>
                                    <input type="text" value="" name="txt_quequan" placeholder="Tải ảnh lên">
                                </div>
                                <!-- input_xanh -->
                                <div class="form_group ">
                                    <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                                    <label for="input_file1">
                                        <input type="file" name="" class="custom-file-input" multiple>
                                    </label>
                                </div>

                                <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu">Lưu thông tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end popup-tạo tin nội bộ -->

        <!-- popup chia sẻ ý tưởng-->
        <div class="cd-popup model_560" id="model_chiaseytuong">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Chia sẻ ý tưởng</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label class="name">Tiêu đề ý tưởng<span class="cr_red">*</span></label>
                                    <input type="text" value="" name="txt_quequan"
                                        placeholder="Nhập tên tiêu đề thảo luận">
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Miêu tả chi tiết ý tưởng<span
                                            class="cr_red">*</span></label>
                                    <textarea class="" cols="3" rows="3"
                                        placeholder="Nhập nội dung  ý tưởng"></textarea>
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Tùy chọn thông báo<span class="cr_red">*</span></label>
                                    <div class="select_no_muti_li">
                                        <select class="select2_t_company select2s" name="select_truong_company">
                                            <option value="1">Thông báo đến toàn công ty</option>
                                            <option value="2">Thông báo đến phòng ban</option>
                                            <option value="3">Thông báo đến cá nhân cụ thể</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu">Tạo ý tưởng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end popup chia sẻ ý tưởng-->

        <!-- popup tạo khen thưởng-->
        <div class="cd-popup model_560" id="model_taokhenthuong">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Tạo khen thưởng</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label class="name">Thành viên được vinh danh<span class="cr_red">*</span></label>
                                    <div class="form_select2">
                                        <select class="select2_muti_tv" multiple name="select2_qt">
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Vị trí gửi tin khen thưởng<span
                                            class="cr_red">*</span></label>
                                    <div class="select_no_muti_li">
                                        <select class="select2_t_company select2s" name="select_truong_company">
                                            <option value="1">Tường công ty</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Lời nhắn cho người được khen thưởng<span
                                            class="cr_red">*</span></label>
                                    <textarea class="" cols="3" rows="3" placeholder="Nhập lời nhắn"></textarea>
                                </div>
                                <div class="form_group ">
                                    <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                                    <label for="input_file1">
                                        <input type="file" name="" class="custom-file-input" multiple>
                                    </label>
                                </div>
                                <div class="form_group loaikhenthuong">
                                    <label for="" class="name">Loại hình vinh danh<span class="cr_red">*</span></label>
                                    <div class="container-kt">
                                        <div class="loai_1 loai">
                                            <div class="img">
                                                <img src="../img/loai_1.png">
                                            </div>
                                            <div class="cont">
                                                <p>Khen thưởng</p>
                                            </div>
                                        </div>
                                        <div class="loai_2 loai">
                                            <div class="img">
                                                <img src="../img/loai_2.png">
                                            </div>
                                            <div class="cont">
                                                <p>Nhân viên xuất sắc nhất tháng</p>
                                            </div>
                                        </div>
                                        <div class="loai_3 loai">
                                            <div class="img">
                                                <img src="../img/loai_3.png">
                                            </div>
                                            <div class="cont">
                                                <p>Nhân viên xuất sắc nhất quý</p>
                                            </div>
                                        </div>
                                        <div class="loai_4 loai">
                                            <div class="img">
                                                <img src="../img/loai_4.png">
                                            </div>
                                            <div class="cont">
                                                <p>Nhân viên xuất sắc nhất năm</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu">Lưu thông tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--end popup tạo khen thưởng-->

        <!-- popup tạo sự kiện-->
        <div class="cd-popup " id="model_taosukien">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Tạo sự kiện</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group" id="nut-tsknb">
                                    <div class="img">
                                        <img src="../img/sk_1.png">
                                    </div>
                                    <div class="cont">
                                        <p>Tạo sự kiện nội bộ</p>
                                    </div>
                                    <div class="img">
                                        <img src="../img/sk_3.png">
                                    </div>
                                </div>
                                <div class="form_group" id="nut-tskdn">
                                    <div class="img">
                                        <img src="../img/sk_2.png">
                                    </div>
                                    <div class="cont">
                                        <p>Tạo sự kiện đối ngoại</p>
                                    </div>
                                    <div class="img">
                                        <img src="../img/sk_3.png">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end popup tạo sự kiện-->

        <!-- chào đón thành viên mới -->
        <div class="cd-popup model_560 " id="model_chaodonthanhvienmoi">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Chào đón thành viên mới</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                    </div>

                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label class="name">Chọn thành viên<span class="cr_red">*</span></label>
                                    <div class="form_select2">
                                        <select class="select2_muti_tv" multiple name="select2_qt">
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Tin nhắn chào mừng<span class="cr_red">*</span></label>
                                    <input type="text" value="" name="txt_address"
                                        placeholder="Chào mừng bạn đã đến với Công ty CP Thanh toán Hưng Hà....|">
                                </div>
                                <div class="form_group ">
                                    <label for="" class="name">Tải lên tệp đính kèm<span class="cr_red">*</span></label>
                                    <label for="input_file1">
                                        <input type="file" name="" class="custom-file-input" multiple>
                                    </label>
                                </div>
                                <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu">Đăng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end chào đón thành viên mới -->

        <!-- popup tạo sự kiện nội bộ-->
        <div class="cd-popup model_560" id="model_taosukien_noibo">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Tạo khen thưởng</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label for="" class="name">Tên sự kiện <span class="cr_red">*</span></label>
                                    <input type="text" class="frm_input" name="txt" placeholder="Nhập tên sự kiện">
                                </div>
                                <div class="form_group">
                                    <label class="name">Thời gian diễn ra<span class="cr_red">*</span></label>
                                    <div class="d_flex space_b box_flex2" style="width: 100%; flex: left;">
                                        <div class="item_flex2">
                                            <input type="date" name="">
                                        </div>
                                        <div class="item_flex2">
                                            <input type="time" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Ảnh đại diện sự kiện</label>
                                    <input type="text" class="frm_input" name="txt" placeholder="Tải ảnh lên">
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Miêu tả sự kiện<span class="cr_red">*</span></label>
                                    <textarea name="content" class="textarea_cheditor"
                                        placeholder="Nhập miêu tả sự kiện"></textarea>
                                </div>
                                <div class="form_group ">
                                    <label for="" class="name">Tải tệp đính kèm<span class="cr_red">*</span></label>
                                    <label for="input_file1">
                                        <input type="file" name="" class="custom-file-input" multiple>
                                    </label>
                                </div>
                                <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu">Tạo sự kiện</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end popup tạo sự kiện nội bộ-->

        <!-- popup tạo sự kiện đối ngoại-->
        <div class="cd-popup model_560" id="model-taosukiendoingoai">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Tạo sự kiện đối ngoại </h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label class="name">Tên sự kiện<span class="cr_red">*</span></label>
                                    <input type="text" value="" name="dtm_ns" placeholder="Nhập tên sự kiện">
                                </div>
                                <div class="form_group">
                                    <label class="name">Thông tin diễn giả*<span class="cr_red">*</span></label>
                                    <label for="input_file1 ">
                                        <input type="file" name="" class="custom-file-img-input" multiple>
                                    </label>
                                    <input class="marg_t10" type="text" value="" name=""
                                        placeholder="Nhập họ tên diễn giả">
                                    <input class="marg_t10" type="text" value="" name=""
                                        placeholder="Nhập chức vụ diễn giả">
                                    <input class="marg_t10" type="text" value="" name=""
                                        placeholder="Nhập sđt diễn giả">
                                    <input class="marg_t10" type="text" value="" name=""
                                        placeholder="Nhập email diễn giả">
                                </div>
                                <div class="form_group">
                                    <label class="name">Khách mời tham gia<span class="cr_red">*</span></label>
                                    <table class="kmtg">
                                        <thead>
                                            <tr>
                                                <th>Stt</th>
                                                <th>Họ và tên</th>
                                                <th>Tên công ty</th>
                                                <th>Chức vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4">
                                                    <p class="add_guest">Thêm khách mời</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form_group">
                                    <label class="name">Thời gian diễn ra<span class="cr_red">*</span></label>
                                    <div class="d_flex space_b box_flex2" style="width: 100%; flex: left;">
                                        <div class="item_flex2">
                                            <input type="date" name="">
                                        </div>
                                        <div class="item_flex2">
                                            <input type="time" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <label class="name">Ảnh đại diện sự kiện<span class="cr_red">*</span></label>
                                    <label for="input_file1 ">
                                        <input type="file" name="" class="custom-file-img-input" multiple>
                                    </label>
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Miêu tả sự kiện<span class="cr_red">*</span></label>
                                    <textarea class="" cols="3" rows="3" placeholder="Nhập miêu tả sự kiện"></textarea>
                                </div>
                                <div class="form_group ">
                                    <label for="" class="name">Tải lên tệp đính kèm<span class="cr_red">*</span></label>
                                    <label for="input_file1">
                                        <input type="file" name="" class="custom-file-input" multiple>
                                    </label>
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Quyền riêng tư<span class="cr_red">*</span></label>
                                    <div class="select_no_muti_li">
                                        <select class="select2_t_company select2s" name="select_truong_company">
                                            <!--  <option value="" disabled selected>Chọn trường công ty</option> -->
                                            <option value="1">Công khai</option>
                                            <option value="2">Riêng tư</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_group form_group_an">
                                    <label class="name">Gắn thẻ thành viên<span class="cr_red">*</span></label>
                                    <div class="form_select2">
                                        <select class="select2_muti_tv" multiple name="select2_qt">
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_buttom">
                                    <button class="btn_huy" type="">Hủy</button>
                                    <button class="btn_luu">Tạo sự kiện</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- popup tạo sự kiện đối ngoại-->

        <!-- popup tạo bình chọn -->
        <div class="cd-popup model_560" id="model-taobinhchon">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Tạo bình chọn</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label class="name">Tên bình chọn<span class="cr_red">*</span></label>
                                    <input type="text" value="" placeholder="Nhập tên bình chọn">
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Nội dung bình chọn<span class="cr_red">*</span></label>
                                    <textarea class="textarea_cheditor" id="content"
                                        placeholder="nhap noi dung"></textarea>
                                    <script type="text/javascript">
                                    CKEDITOR.replace("content");
                                    </script>
                                </div>
                                <div class="form_group">
                                    <label class="title">
                                        <span></span>
                                        <p>Số lượng phương án (tối đa 40 phương án)</p>
                                        <span></span>
                                    </label>
                                </div>
                                <div class="form_group">
                                    <label class="name">Gắn thẻ thành viên<span class="cr_red">*</span></label>
                                    <div class="form_select2">
                                        <select class="select2_muti_tv" multiple name="select2_qt">
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                            <option>Nguyễn Văn A</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <label class="name">Phương án 1</label>
                                    <div class="d_flex space_b box_flex2" style="width: 100%; display:flex;">
                                        <div class="item_flex3">
                                            <input type="text" value="" placeholder="Nội dung">
                                        </div>
                                        <div class="item_flex3 input_xanh">
                                            <input type="file" name="" class="custom-file-input" multiple>
                                        </div>
                                    </div>
                                    <label class="name">Phương án 2</label>
                                    <div class="d_flex space_b box_flex2" style="width: 100%; display:flex;">
                                        <div class="item_flex3">
                                            <input type="text" value="" placeholder="Nội dung">
                                        </div>
                                        <div class="item_flex3 input_xanh">
                                            <input type="file" name="" class="custom-file-input" multiple>
                                        </div>
                                    </div>
                                    <label class="name">Phương án 3</label>
                                    <div class="d_flex space_b box_flex2" style="width: 100%; display:flex;">
                                        <div class="item_flex3">
                                            <input type="text" value="" placeholder="Nội dung">
                                        </div>
                                        <div class="item_flex3 input_xanh">
                                            <input type="file" name="" class="custom-file-input" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="form_buttom">
                                    <button class="btn_huy" type="">Hủy</button>
                                    <button class="btn_luu">Tạo bình chọn</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end popup tạo bình chọn -->

        <!--popup tạo tin tức nội bộ  -->
        <div class="cd-popup model_560" id="model-taotinnoibo">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Tạo tin nội bộ</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                    </div>
                    <div class="cd_modal_body">
                        <form class="" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label class="name">Tiêu đề <span class="cr_red">*</span></label>
                                    <input type="text" value="" placeholder="Nhập tiêu đề">
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Nội dung<span class="cr_red">*</span></label>
                                    <input type="text" value="" placeholder="Nhập nội dung">
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Ảnh bìa<span class="cr_red">*</span></label>
                                    <input type="text" value="" placeholder="Tải ảnh lên">
                                </div>
                                <div class="form_group ">
                                    <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                                    <label for="input_file1">
                                        <input type="file" class="custom-file-input" multiple>
                                    </label>
                                </div>
                                <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu">Tạo tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end popup tạo tin tức nội bộ  -->
        <?php include'../includes/tung_popup.php'?>
        <? include('../includes/popup_nt.php') ?>


        <!-- //// -->


        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/select2.min.js"></script>
        <script type="text/javascript" src="../js/caidat.js"></script>
        <script>
        $('.select2_t_company').select2({
            width: '100%',
        })
        $('.select2_muti_tv').select2({
            width: '100%',
            placeholder: 'Dùng @ để thêm thành viên mới',
        })
        </script>
        <script>
        /*ẩn tn*/
        $(document).ready(function() {
            var i = 0;
            $('.add_guest').click(function() {
                i += 1;
                var themrow =
                    ' <tr><td>' + i +
                    '</td><td><input type="text" placeholder="Nhập họ và tên"></td><td><input type="text" placeholder="Nhập tên công ty"></td><td><input type="text" placeholder="Nhập chức vụ"></td> </tr>'
                $('.kmtg tbody tr:last-child').before(themrow);
            })
            $('.select2_t_company').change(function() {
                var value_box = $(this).val();
                if (value_box == 2) {
                    $('.form_group_an').show();
                } else {
                    $('.form_group_an').hide();
                }
            })
            if ($(window).width() <= 414) {
                $('#icon-menu').click(function() {
                    $('.trang').css('width', '100%');
                    $('.co-sidebar-phai .side-bar-phai .icon-menu>.container').show();
                });
                $('#icon-quayve').click(function() {
                    $('.trang').css('width', '0px');
                    $('.co-sidebar-phai .side-bar-phai .icon-menu>.container').hide();
                })
            };
            $('.side-bar-phai>.dropdown .congty-info a').click(function() {
                var text = $(this).text();
                var img = $(this).children().children().attr('src');
                $('.side-bar-phai>.dropdown .dropbtn .cont p ').text(text);
                $(".side-bar-phai>.dropdown .dropbtn .img img").attr("src", '' + img + '');
            })

            $("#nut-ttb").click(function() {
                $("#model_taothongbao").show();
            })
            $("#nut-cdtvm").click(function() {
                $("#model_chaodonthanhvienmoi").show();
            })
            $("#nut-tsk").click(function() {
                $("#model_taosukien").show();
            })
            $("#nut-tsknb").click(function() {
                $("#model_taosukien_noibo").show();
            })
            $("#nut-tskdn").click(function() {
                $("#model-taosukiendoingoai").show();
            })
            $("#nut-ttl").click(function() {
                $("#model_taothaoluan").show();
            })
            $("#nut-csyt").click(function() {
                $("#model_chiaseytuong").show();
            })
            $("#nut-tbc").click(function() {
                $("#model-taobinhchon").show();
            })
            $("#nut-tkt").click(function() {
                $("#model_taokhenthuong").show();
            })
            $("#nut-ttnb").click(function() {
                $("#model-taotinnoibo").show();
            })

            $('.edit-banner , .baiviet .banner .content .info-ct .img img:last-child').click(function() {
                $('#selectedFile_anhbia_1').click();
            })
            $('.taianh').click(function() {
                $('#selectedFile_anhbia_2').click();
            })

            $(".xem-binhluan").click(function() {
                $(".xemthem").toggle(400);
            })


            $(".trl-binhluan").click(function() {
                $(".cmt-binhluan").toggle(400);
            })

            $("#nhacten").click(function() {
                $("#popup-nhacten").slideToggle(400);
            })

            $("#nut-chinhsua").click(function() {
                $("#popup-chinhsua").slideToggle(400);
            })

            $("#tao_thongbao").click(function() {
                $("#model_taothongbao").show();
            })


            $("#nhom-thaoluan").click(function() {
                $(".page-nhomthaoluan").show();
                $(".page-trangcongty").hide();
                $(".page-sinhnhat").hide();
                $(".main-baiviet-sinhnhat").hide();
            })
            $("#nhom-trangcongty").click(function() {
                $(".page-nhomthaoluan").hide();
                $(".page-trangcongty").show();
                $(".page-sinhnhat").hide();
                $(".main-baiviet-sinhnhat").hide();
            })
            $("#page-sn").click(function() {
                $(".page-nhomthaoluan").hide();
                $(".page-trangcongty").hide();
                $(".page-sinhnhat").show();
                $(".main-baiviet-sinhnhat").show();
                $(".baiviet-search").hide();
                $(".baiviet-header").hide();
                $(".thanhvien-moi").hide();
            })
            $("#nut-bat-tb").click(function() {
                $("#popup-batthongbao").show();
                $("#popup-batthongbao").css({
                    "border-radius": "10px"
                })
            })
            $("#tuychinh_d").click(function() {
                $("#popup-tuychinh_d").toggle(400);
            })
            $("#xemthongbao").click(function() {
                $("#tatcathongbao").show();
                $("#baiviet-header").hide();
                $("#main-baiviet").hide();
            })
            $("#tatca-tv").click(function() {
                $(".main-baiviet ul .tt-thanhvien .body .container").show(300);
                $("#tatca-tv p").addClass('color_chon')
                $('#online-tv p').removeClass('color_chon');
                $('#quantri-tv p').removeClass('color_chon');
            })
            $("#online-tv").click(function() {
                $("#online-tv p").addClass('color_chon');
                $('#tatca-tv p').removeClass('color_chon');
                $('#quantri-tv p').removeClass('color_chon');
                $(".main-baiviet ul .tt-thanhvien .body .container").hide(300);
                $(".main-baiviet ul .tt-thanhvien .body .thanhvien-hd").show(300);
            })
            $("#quantri-tv").click(function() {
                $("#quantri-tv p").addClass('color_chon');
                $('#tatca-tv p').removeClass('color_chon');
                $('#online-tv p').removeClass('color_chon');
                $(".main-baiviet ul .tt-thanhvien .body .container").hide(300);
                $(".main-baiviet ul .tt-thanhvien .body .thanhvien-qt").show(300);
            })
            $("#hientatca-tt").click(function() {
                $("#center .baiviet-search").hide();
                $(".baiviet-header").hide();
                $(".main-baiviet ul li").hide();
                $(".main-baiviet ul .tt-thanhvien").show();
            })
            $(".nut-xoathanhvien").click(function() {
                $("#xoa_thanhvien").show();
            })
            $('.nut-bat-baiviet').click(function() {
                $('#bat_baiviet').show();
            })
            $('.nut-xoa-baiviet').click(function() {
                $('#xoa_baiviet').show();
            })

            var btn_del_all_thongbao = $('.btn_del_all_thongbao');
            var xoa_tatcathongbao = $('#xoa_tatcathongbao');
            btn_del_all_thongbao.click(function() {
                xoa_tatcathongbao.show();
            })

            $(".btn_huy_xoatatca").click(function() {
                xoa_tatcathongbao.hide();
            })

            $("#del_thongbao").click(function() {
                $("#xoa_thongbao").show();
            })

            $(".chitiet_tb").click(function() {
                $("#chitiet_thongbao").show();
            })

            $("#btn_sua_baiviet").click(function() {
                $("#model_suanhanhbaiviet").show();
            })

            var close_detl = $('.close_detl');
            var btn_huy = $('.btn_huy');
            close_detl.click(function() {
                $("#model_taothaoluan").hide();
                $("#chitiet_thongbao").hide();
                $("#model_taothongbao").hide();
                $("#model_tinnoibo").hide();
                $("#model_chiaseytuong").hide();
                $("#model_taokhenthuong").hide();
                $("#model_taosukien").hide();
                $("#model_chaodonthanhvienmoi").hide();
                $("#model_taosukien_noibo").hide();
                $("#model-taosukiendoingoai").hide();
                $("#model-taobinhchon").hide();
                $("#model-taotinnoibo").hide();
                $('#model_chitietthu').hide();
            })
            btn_huy.click(function() {
                $("#xoa_tatcathongbao").hide();
                $("#model_taothaoluan").hide();
                $("#xoa_thongbao").hide();
                $("#chitiet_thongbao").hide();
                $("#model_taothongbao").hide();
                $("#model_tinnoibo").hide();
                $("#model_chiaseytuong").hide();
                $("#model_taokhenthuong").hide();
                $("#model_chaodonthanhvienmoi").hide();
                $("#model_taosukien_noibo").hide();
                $("#model-taosukiendoingoai").hide();
                $("#model-taobinhchon").hide();
                $("#model-taotinnoibo").hide();
                $('#xoa_thanhvien').hide();
                $("#bat_baiviet").hide();
                $("#xoa_baiviet").hide();
            })

        });

        $(window).click(function(e) {
            if (!$("#nhacten").is(e.target) && $("#nhacten").has(e.target).length === 0) {
                $("#popup-nhacten").hide();
            }
            var model_taobinhluan = $('#model_taothaoluan');
            if ($(e.target).is('#model_taothaoluan')) {
                model_taobinhluan.hide();
            }
            if ($(e.target).is('#xoa_tatcathongbao')) {
                $('#xoa_tatcathongbao').hide();

            }
            if ($(e.target).is('#xoa_thongbao')) {
                $('#xoa_thongbao').hide();
            }

            if ($(e.target).is("#chitiet_thongbao")) {
                $("#chitiet_thongbao").hide();
            }
            if ($(e.target).is('#model_taothongbao')) {
                $('#model_taothongbao').hide();

            }
            if ($(e.target).is('#model_tinnoibo')) {
                $('#model_tinnoibo').hide();
            }
            if ($(e.target).is("#model_chiaseytuong")) {
                $("#model_chiaseytuong").hide();
            }
            if ($(e.target).is("#model_taokhenthuong")) {
                $("#model_taokhenthuong").hide();
            }
            if ($(e.target).is("#model_taosukien")) {
                $("#model_taosukien").hide();
            }
            if ($(e.target).is("#model_chaodonthanhvienmoi")) {
                $("#model_chaodonthanhvienmoi").hide();
            }
            if ($(e.target).is("#model_taosukien_noibo")) {
                $("#model_taosukien_noibo").hide();
            }
            if ($(e.target).is("#model-taosukiendoingoai")) {
                $("#model-taosukiendoingoai").hide();
            }
            if ($(e.target).is("#model-taobinhchon")) {
                $("#model-taobinhchon").hide();
            }

            if ($(e.target).is("#model-taotinnoibo")) {
                $("#model-taotinnoibo").hide();
            }
            if ($(e.target).is("#xoa_thanhvien")) {
                $("#xoa_thanhvien").hide();
            }
            if ($(e.target).is("#bat_baiviet")) {
                $("#bat_baiviet").hide();
            }

            if ($(e.target).is("#xoa_baiviet")) {
                $("#xoa_baiviet").hide();
            }
            if ($(e.target).is(".trang")) {
                $('.trang').css('width', '0px');
            }
        });
        </script>
        <!-- tung -->

        <script>
        $(document).ready(function() {
            $("#sukien").click(function() {
                $(".banner").hide();
                $("#main-baiviet").hide();
                $(".baiviet-search").hide();
                $(".side-bar-phai .new").hide();
                $(".baiviet-header").hide();
                $(".sk11").show();
                $(".caidat-doinoi").show();
                $(".sk22").hide();
                $(".main-baiviet-sinhnhat").hide();
                // $(".caidat-doingoai").hide();
            })

            $(".sk-noi-bo").click(function() {
                $(".sukien-nv").show();
                $(".sk22").show();
                $(".sk33").hide();
                $(".sukien-nv.sk11").hide();
                $(".caidat-doingoai").hide();
            })

            $(".sknb2").click(function() {
                $(".sk22").hide();
                $(".sukien-nv.sk11").show();
            })


            $(".sk-doi-ngoai").click(function() {
                $(".sk33").show();
                $(".sukien-nv.sk11").hide();
                $(".caidat-doingoai").show();
                $(".caidat-doinoi").hide();
            })

            $('.imgsk_tvtg').hover(function() {
                $(this).parents('.show-hide').find('.hvshow').toggle();
            })


            $('img.img_xoask').click(function() {
                $(".xoa-sk-nhan-vien").show();
            })

            $('.btn_huy').click(function() {
                $(".xoa-sk-nhan-vien").hide();
            })


            $('.btl-xoa-sk-nhan-vien').click(function() {
                $(".xoa-sk-nhan-vien").hide();
                $(".xoa-sknv").show();
            })

            $(".btn-da-xoa").click(function() {
                $(".xoa-sknv").hide();
            })
            $(".close_detl").click(function() {
                $(".xoa-sk-nhan-vien").hide();
            })

            $(".btn_huy").click(function() {
                $(".xoa-sknv").hide();
                $(".vd8_chinhsua_sk").hide();
            })
            $(".caidat-doinoi p.xem-chi-tiet").click(function() {
                $(".vd7_xemchitiet_sk").show();
            })
            $("img.close_detl").click(function() {
                $(".vd7_xemchitiet_sk").hide();
            })
            $(".btn_huy").click(function() {
                $(".vd7_xemchitiet_sk").hide();
            })

            $("button.btn_luu.luu-thong").click(function() {
                $(".luu-sknv").show();
                $(".vd7_xemchitiet_sk").hide();
            })


            $("img.imgskgiaoluu").click(function() {
                $(".vd8_chinhsua_sk").show();
            })
            $("img.close_detl").click(function() {
                $(".vd8_chinhsua_sk").hide();
            })


            $("#sk22 .text-gd").click(function(){
                $(".vd7_xemchitiet_sk").show()
            })

            // doi ngoai

            $(".xem-chi-tiet .xem-doingoai").click(function() {
                $(".vd9_xemchitiet_dn").show();
            })
            $("#sukien").click(function() {
                $(".banner").hide();
                $("#main-baiviet").hide();
                $(".baiviet-search").hide();
                $(".side-bar-phai .new").hide();
                $(".baiviet-header").hide();
                $(".sk11").show();
                $(".caidat-doinoi").show();
                $(".sk22").hide();

                $(".caidat-doingoai").hide();
            })

            $(".sk-noi-bo").click(function() {
                $(".sukien-nv").show();
                $(".sk22").show();
                $(".sk33").hide();
                $(".sukien-nv.sk11").hide();
                $(".caidat-doingoai").hide();
            })

            $(".sknb2").click(function() {
                $(".sk22").hide();
                $(".sukien-nv.sk11").show();
            })


            $(".sk-doi-ngoai").click(function() {
                $(".sk33").show();
                $(".sukien-nv.sk11").hide();
                $(".caidat-doingoai").show();
                $(".caidat-doinoi").hide();
            })

            $('.imgsk_tvtg').hover(function() {
                $(this).parents('.show-hide').find('.hvshow').toggle();
            })


            $('img.img_xoask').click(function() {
                $(".xoa-sk-nhan-vien").show();
            })

            $('.btn_huy').click(function() {
                $(".xoa-sk-nhan-vien").hide();
            })


            $('.btl-xoa-sk-nhan-vien').click(function() {
                $(".xoa-sk-nhan-vien").hide();
                $(".xoa-sknv").show();
            })

            $(".btn-da-xoa").click(function() {
                $(".xoa-sknv").hide();
            })
            $(".close_detl").click(function() {
                $(".xoa-sk-nhan-vien").hide();
            })

            $(".btn_huy").click(function() {
                $(".xoa-sknv").hide();
                $(".vd8_chinhsua_sk").hide();
            })


            $("p.tham-gia").click(function() {
                $(".thamgia-sknv").show();
            })
            // $("p.xem-chi-tiet").click(function () {
            //     $(".vd7_xemchitiet_sk").show();
            // })
            $("img.close_detl").click(function() {
                $(".vd7_xemchitiet_sk").hide();
            })
            $(".btn_huy").click(function() {
                $(".vd7_xemchitiet_sk").hide();
            })

            $("button.btn_luu.luu-thong").click(function() {
                $(".luu-sknv").show();
                $(".vd7_xemchitiet_sk").hide();
            })


            $("img.imgskgiaoluu").click(function() {
                $(".vd8_chinhsua_sk").show();
            })
            $("img.close_detl").click(function() {
                $(".vd8_chinhsua_sk").hide();
            })
            // doi ngoai
            $(".xem-chi-tiet .xem-doingoai").click(function() {
                $(".vd9_xemchitiet_dn").show();
            })

            $('.imgsk_tvtg').hover(function() {
                $(this).parents('.show-hide').find('.hvshow').toggle();
            })

            $(".xem-doingoai").click(function() {
                $(".vd9_xemchitiet_dn").show();
            })


            $(".vd9_xemchitiet_dn img.close_detl").click(function() {
                $(".vd9_xemchitiet_dn").hide();
            })

            $(".vd9_xemchitiet_dn button.btn_huy").click(function() {
                $(".vd9_xemchitiet_dn").hide();
            })

            $(".vd9_xemchitiet_dn img.xemchitiet-dn").click(function() {
                $(".vd10_chinhsua_sk").show();
                $(".vd9_xemchitiet_dn").hide();
            })
            $(".vd10_chinhsua_sk img.close_detl").click(function() {
                $(".vd10_chinhsua_sk").hide();
            })

            $(".vd10_chinhsua_sk button.btn_huy").click(function() {
                $(".vd10_chinhsua_sk").hide();
            })

            $(".vd10_chinhsua_sk btn_luu").click(function() {
                $(".vd10_chinhsua_sk").hide();
            })

            $('.vd10_chinhsua_sk img.hienlethithu').hover(function() {
                $(this).parents('.hai-img').find('.xsukiendn').toggle();
            })

            $("img.xsukiendn").click(function() {
                $(this).parent().parent().hide();
            })

            $("img.xsukiendn").click(function() {
                $(this).parent().parent().hide();
            })

            $(".sknb2 .skdn3").click(function() {
                $(".caidat-doingoai").hide();
                $(".caidat-doinoi").show();
            })
        })
        $(window).click(function(e) {
            if ($(e.target).is(".xoa-sknv")) {
                $(".xoa-sknv").hide();
            }
            if ($(e.target).is(".luu-sknv")) {
                $(".luu-sknv").hide();
            }
            if ($(e.target).is(".thamgia-sknv")) {
                $(".thamgia-sknv").hide();
            }
            if ($(e.target).is(".xoa-sknv")) {
                $(".xoa-sknv").hide();
            }
            if ($(e.target).is(".luu-sknv")) {
                $(".luu-sknv").hide();
            }
            if ($(e.target).is(".thamgia-sknv")) {
                $(".thamgia-sknv").hide();
            }
            if ($(e.target).is(".vd9_xemchitiet_dn")) {
                $(".vd9_xemchitiet_dn").hide();
            }
            if ($(e.target).is(".vd10_chinhsua_sk")) {
                $(".vd10_chinhsua_sk").hide();
            }
            
            if ($(e.target).is(".vd7_xemchitiet_sk")) {
                $(".vd7_xemchitiet_sk").hide();
            }
            
            if ($(e.target).is(".xoa-sk-nhan-vien")) {
                $(".xoa-sk-nhan-vien").hide();
            }
        });
        </script>


        <!-- end tung -->


</body>

</html>
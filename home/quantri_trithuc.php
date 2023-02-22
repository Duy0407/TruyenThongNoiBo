<?php
require_once '../includes/check_login.php';
if ($_SESSION['login']['user_type'] == 1) {
    require_once '../api/api_all_info.php';
    require_once '../api/api_nv.php';
}
require_once '../api/api_ct.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" type="text/css" href="../css/caidat.css">
    <link rel="stylesheet" href="../css/tung.css">
    <title>quản trị tri thức</title>
</head>
<body>
<div id="quantri-trithuc">
    <div class="wapper">
        <!--  sidebar -->
        <?php include '../includes/cd_sidebar.php'?>
        <!-- end side bar -->
        <div id="cdnhanvienc" class="cdnhanvienc">
            <!--     header -->
            <?php include '../includes/cd_header.php'?>
            <!-- end header -->
             <div id="nkt1" style="" >
                <div id="centr-quantri-trithuc">
                    <div class="seach">
                        <div class="seach-book">
                            <input type="text" name="sechbook" placeholder="tìm kiếm sách">
                            <div class="img-seach-book"><input type="" name="" placeholder="timm kiem"></div>
                            <div class="timkiem-sach"><img class="imgtimkiem-sach" src="../img/seachbook.png" alt=""></div>
                        </div>
                        <div class="wiki-all">
                            <div class="wiki hover1 quantri1">
                                <div class="img-item-wiki"><img src="../img/wiki.png" alt=""></div>
                                <div class="text-wiki">Wiki</div>
                            </div>
                            <div class="hove an1">
                                <a class="hove1 hv1 ct2 hover2 hover-wiki" href="#" >
                                    <div class="img-traodoi"><img src="../img/wiki.png" alt=""></div>
                                    <div class="tetx-hv trao-doi ">Wiki</div>
                                </a>
                                <a class="hove1 hv1 ct2 hover2 hover-traodoi" href="#" >
                                    <div class="img-traodoi"><img src="../img/question3.png" alt=""></div>
                                    <div class="tetx-hv trao-doi">Trao đổi - Đặt câu hỏi</div>
                                </a>
                                <a class="hove1 hv2 ct3 hover3 hover-cauhoi" href="#">
                                    <div class="img-cauhoi"><img src="../img/question2.png" alt=""></div>
                                    <div class="tetx-hv cau-hoi">Câu hỏi của tôi</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="them-tai-lieu">
                        <div class="tai-lieu">
                            <div class="img-tai-lieu"><img src="../img/themtailieu.png" alt=""></div>
                            <div class="add-tai-lieu"> Thêm tài liệu</div>
                        </div>
                    </div>
                    <div class="select-list-bok">
                        <div class="list-book1">
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook3.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook4.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook1.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook2.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook3.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook4.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook1.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook2.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook3.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook4.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook1.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                            <div class="book">
                                <div class="book-img"><img src="../img/listbook2.png" alt=""></div>
                                <div class="text-book">
                                    <div class="item-file">
                                        <p>Tên tài liệu: Abc</p>

                                        <div class="box_cha_model_tung_1">
                                            <img src="../img/3itemfile.png" alt="" class="show_tung1">
                                            <div class="model_tung_1">
                                                <div class="ul_model">
                                                    <div class="li_model model1">
                                                        <img class="imgtung" src="../img/tung1.png" alt="">
                                                        <p class="p_model">Tải xuống</p>
                                                    </div>
                                                    <div class="li_model  model2">
                                                        <img class="imgtung" src="../img/tung2.png" alt="">
                                                        <p class="p_model">Chỉnh sửa thông tin tài liệu</p>

                                                    </div>
                                                    <div class="li_model  model3">
                                                        <img class="imgtung" src="../img/tung3.png" alt="">
                                                        <p class="p_model">Trao đổi - đặt câu hỏi</p>
                                                    </div>
                                                    <div class="li_model  model4">
                                                        <img class="imgtung" src="../img/tung4.png" alt="">
                                                        <p class="p_model">Xóa thông tin tài liệu</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Tác giả: Đào Thu Huyền</p>
                                    <p>Ngày tạo: 15/06/2021</p>
                                    <p>Lĩnh vực đề cập: Kinh doanh - Công nghệ</p>
                                    <div class="book-file"><a href="">Tài liệu abc.Doc</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // -->
            <!-- trao doi -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
 <div id="nkt2" class="nkt4" style="" >
                <div id="main-exchange">
                    <div class="seach-question">
                        <div class="go-seach-questin">
                            <input type="text" name="exchange" placeholder="Tìm kiếm câu hỏi">
                            <div class="img-seach-question"><img src="../img/seachquestion.png" alt=""></div>
                        </div>

                        <div class="nkttung1 traodoicauhoi" >
                            <div class="skhover quantri2">
                              <div class="imgtraodoi"><img class="imghv1" src="../img/question3.png" alt=""></div>
                              <div class="tetx-hv trao-doi"> Trao đổi - Đặt câu hỏi</div>
                          </div>
                          <div class="wiki-all wk1 an2" >
                             <div class="hove " >
                                 <div class="wiki td1 hover1 wikit1 hover-wiki">
                                    <div class="img-item-wiki"><img src="../img/wiki.png" alt=""></div>
                                    <div class="text-wiki">Wiki</div>
                                </div>
                                <div class="hove1 hv1 td2 hover2 hover-traodoi" href="#">
                                    <div class="img-traodoi"><img src="../img/question3.png" alt=""></div>
                                    <div class="tetx-hv trao-doi"> Trao đổi - Đặt câu hỏi</div>
                                    
                                </div>
                                <div class="hove1 hv2 td3 hover3 hover -cauhoi" >
                                    <div class="img-cauhoi"><img src="../img/question2.png" alt=""></div>
                                    <div class="tetx-hv cau-hoi">Câu hỏi của tôi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="img-readinglisa"><img src="../img/readinglist.png" alt=""></div>
                    </div>
                    <div class="all-question">
                        <div class="mid-center">
                            <div class="center-question">
                                <div class="qusetion-myself">
                                    <div class="avatar-myself">
                                        <img src="../img/avtarmyself.png" alt="">
                                    </div>
                                    <div class="text-myself">
                                        <input type="text" name="text-myself" value=""
                                               placeholder="Đặt câu hỏi của bạn">
                                    </div>
                                    <div class="dangnhap">
                                        <p class="dn">Đăng</p>
                                    </div>
                                </div>

                                <!--  <hr class="hrrr">
                                -->
                                <div class="select-feature">
                                    <div class="upload-img">
                                        <div class="imgupl">
                                            <img src="../img/uploadimg.png" alt="">
                                        </div>
                                        <div class="text-imgupl">
                                            <p>Tải lên ảnh/video/tệp</p>
                                        </div>
                                    </div>
                                    <div class="call-name " id="nhacten">
                                        <div class="img-callname">
                                            <img src="../img/callname.png" alt="">
                                        </div>
                                        <div class="text-callname">
                                            <p>Nhắc tên thành viên</p>
                                        </div>



                                    </div>
                                    <div class="upload">
                                        <div class="go-upload">
                                            <button type="">Đăng</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="opstion">
                                    <div class="slupload"><img src="../img/slupload.png" alt=""></div>
                                    <div class="text-upload"><p>Tùy chỉnh đăng tin</p></div>
                                </div>
                            </div>
                            <div class="posts-mysl">
                                <div class="inf0-you-all">
                                    <div class="in4-you">
                                        <div class="avt-y"><img src="../img/in4you.png" alt=""></div>
                                        <div class="inf0-y">
                                            <div class="inf0-y-top">
                                                <p class="top1 top">Nguyễn Thị Thu</p>

                                                <p class="top3 top">. Phòng nhân sự</p>
                                                <p class="top2"> đã đăng một câu hỏi</p>
                                            </div>
                                            <div class="top4">
                                                <p> đã đăng một câu hỏi</p>
                                            </div>
                                            <div class="time-upl">
                                                <p>16:00 11/06/2021</p>
                                            </div>
                                        </div>


                                        <div class="item-option">
                                            <img class="imgitoption " src="../img/itoption.png" alt="">
                                            <div class="item-option-con">
                                                <div class="ul_model">
                                                    <div class="li_model">
                                                        <img src="../img/img1.png" alt="">
                                                        <p class="p_model bat-tb">Bật thông báo</p>
                                                    </div>
                                                    <div class="li_model">
                                                        <img src="../img/xoacauhoi.png" alt="">
                                                        <p class="p_model xoa-ch">Xóa câu hỏi</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="posts-you">
                                        <a href="" class="tl">Tài liệu Abc.doc</a>
                                        <p>Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là câu
                                            hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là
                                            câu hỏi. Đây là câu hỏi</p>
                                    </div>
                                    <!--   <hr class="hrrr"> -->
                                    <div class="emotion-coments">
                                        <div class="emotion">
                                            <img src="../img/itemtl.png" alt="">
                                            <p>Trả lời</p>
                                        </div>
                                        <div class="coments-count">
                                            <p>20 câu trả lời</p>
                                        </div>
                                    </div>
                                    <!--  <hr class="hrrr"> -->
                                </div>
                                <div class="coment-all">
                                    <div class="see-question">
                                        <p>Xem câu trả lời trước</p>
                                    </div>
                                    <div class="pl-coments">
                                        <div class="pl-coments-top">
                                            <div class="sauvang"><img src="../img/sauvang.png" alt=""></div>
                                            <div class="pl">
                                                <div class="pltop">
                                                    <p class="pl-name">Lê Thu Trà</p>
                                                    <p class="pl-info">. Phòng kinh doanh</p>
                                                    <div class="sau3-lon">
                                                        <img class="imgsau3" src="../img/sau3.png" alt="">
                                                        <div class="sau3-con">
                                                            <div class="ul_model">
                                                                <div class="li_model">
                                                                    <img src="../img/tung2.png" alt="">
                                                                    <p class="p_model">Chỉnh sửa bình luận</p>
                                                                </div>
                                                                <div class="li_model">
                                                                    <img src="../img/tung4.png" alt="">
                                                                    <p class="p_model">Xóa bình luận</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="pl-text">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pl-coments-like">
                                            <div class="likecoment">
                                                <img src="../img/likecoment.png" alt="">
                                            </div>
                                            <p class="text-tl">.Trả lời</p>
                                            <p class="text-time">.10 phút trước</p>
                                        </div>
                                    </div>
                                    <div class="reply-your">
                                        <div class="avt-reply"><img src="../img/avtarmyself.png" alt=""></div>
                                        <div class="reply-cmt">
                                            <input type="text" name="" value="" placeholder="Viết câu trả lời">
                                            <img class="stitem" src="../img/stitem.png" alt="">
                                            <img class="avtitem" src="../img/avtitem.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-question">
                        	<div class="hiennn">
                        		<div class="menuhien">
                                <img class="img-menuhien" src="../img/readinglist.png" alt="">
                            </div>
                            <div class="list-name">
                                <div class="list-name-top"><p>Thành viên hiểu biết nhất</p></div>
                                <div class="list-name-boost">
                                    <div class="table1">
                                        <table>
                                            <tr>
                                                <th>stt</th>
                                                <th>Họ và tên</th>
                                                <th>Số bình chọn</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Nguyễn Thị Thu</td>
                                                <td>30</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Phan Lê An</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Phạm Văn Minh</td>
                                                <td>20</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="list-name">
                                <div class="list-name-top"><p>Thành viên hiểu biết nhất</p></div>
                                <div class="list-name-boost">
                                    <div class="table1">
                                        <table>
                                            <tr>
                                                <th>stt</th>
                                                <th>Họ và tên</th>
                                                <th>Số bình chọn</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Nguyễn Thị Thu</td>
                                                <td>30</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Phan Lê An</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Phạm Văn Minh</td>
                                                <td>20</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="list-name">
                                <div class="list-name-top"><p>Thành viên hiểu biết nhất</p></div>
                                <div class="list-name-boost">
                                    <div class="table1">
                                        <table>
                                            <tr>
                                                <th>stt</th>
                                                <th>Họ và tên</th>
                                                <th>Số bình chọn</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Nguyễn Thị Thu</td>
                                                <td>30</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Phan Lê An</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Phạm Văn Minh</td>
                                                <td>20</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        		
                        	</div>



                         </div>

                        </div>
                    </div>
                </div>
                <!-- //???? -->
     
            <!-- cau hoi cua toi -->
            <div id="nkt3"  class="nkt5" style="">
                <div id="nkt2" >
                    <div id="main-exchange">
                        <div class="seach-question">
                            <div class="go-seach-questin">
                                <input type="text" name="exchange" placeholder="Tìm kiếm câu hỏi">
                                <div class="img-seach-question"><img src="../img/seachquestion.png" alt=""></div>
                            </div>

                        <div class="nkttung1 traodoicauhoi" >
                            <div class="skhover quantri3">
                              <div class="imgtraodoi"><img class="chvh" src="../img/question2.png" alt=""></div>
                              <div class="tetx-hv trao-doi"> Câu hỏi của tôi</div>
                          	</div>
                          <div class="wiki-all wk1 an3" >
                             <div class="hove " >
                                 <div class="wiki td1 hover1 hover-wiki">
                                    <div class="img-item-wiki"><img src="../img/wiki.png" alt=""></div>
                                    <div class="text-wiki">Wiki</div>
                                </div>
                                <div class="hove1 hv1 td2 hover-traodoi" href="#">
                                    <div class="img-traodoi"><img src="../img/question3.png" alt=""></div>
                                    <div class="tetx-hv trao-doi"> Trao đổi - Đặt câu hỏi</div>
                                    
                                </div>
                                <div class="hove1 hv2 td3 hover-cauhoi" >
                                    <div class="img-cauhoi"><img src="../img/question2.png" alt=""></div>
                                    <div class="tetx-hv cau-hoi">Câu hỏi của tôi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                            <div class="img-readinglisa"><img src="../img/readinglist.png" alt=""></div>
                        </div>
                        <div class="all-question">
                            <div class="mid-center">
                                <div class="center-question">
                                    <div class="qusetion-myself">
                                        <div class="avatar-myself">
                                            <img src="../img/avtarmyself.png" alt="">
                                        </div>
                                        <div class="text-myself">
                                            <input type="text" name="text-myself" value=""
                                                   placeholder="Đặt câu hỏi của bạn">
                                        </div>
                                        <div class="dangnhap">
                                            <p class="dn">Đăng</p>
                                        </div>
                                    </div>

                                    <!--  <hr class="   hrrr">
                                    -->
                                    <div class="select-feature">
                                        <div class="upload-img">
                                            <div class="imgupl">
                                                <img src="../img/uploadimg.png" alt="">
                                            </div>
                                            <div class="text-imgupl">
                                                <p>Tải lên ảnh/video/tệp</p>
                                            </div>
                                        </div>
                                        <div class="call-name">
                                            <div class="img-callname">
                                                <img src="../img/callname.png" alt="">
                                            </div>
                                            <div class="text-callname">
                                                <p>Nhắc tên thành viên</p>
                                            </div>
                                        </div>
                                        <div class="upload">
                                            <div class="go-upload">
                                                <button type="">Đăng</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="opstion">
                                        <div class="slupload"><img src="../img/slupload.png" alt=""></div>
                                        <div class="text-upload"><p>Tùy chỉnh đăng tin</p></div>
                                    </div>
                                </div>
                                <div class="posts-mysl">
                                    <div class="inf0-you-all">
                                        <div class="in4-you">
                                            <div class="avt-y"><img src="../img/in4you.png" alt=""></div>
                                            <div class="inf0-y">
                                                <div class="inf0-y-top">
                                                    <p class="top1 top">Nguyễn Thị Thu</p>

                                                    <p class="top3 top">. Phòng nhân sự</p>
                                                    <p class="top2"> đã đăng một câu hỏi</p>
                                                </div>
                                                <div class="top4">
                                                    <p> đã đăng một câu hỏi</p>
                                                </div>
                                                <div class="time-upl">
                                                    <p>16:00 11/06/2021</p>
                                                </div>
                                            </div>


                                            <div class="item-option">
                                                <img class="imgitoption" src="../img/itoption.png" alt="">
                                                <div class="item-option-con">
                                                    <div class="ul_model">
                                                        <div class="li_model chinh-sua3 ">
                                                            <img src="../img/chinhsua_cuatoi.png" alt="">
                                                            <p class="p_model chinhsua-chct1">Chỉnh sửa câu hỏi </p>
                                                        </div>
                                                        <div class="li_model chinh-sua4">
                                                            <img src="../img/xoacauhoi.png" alt="">
                                                            <p class="p_model chinhsua-chct2">Xóa câu hỏi</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-you">
                                            <a href="" class="tl">Tài liệu Abc.doc</a>
                                            <p>Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là
                                                câu
                                                hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây
                                                là
                                                câu hỏi. Đây là câu hỏi</p>
                                        </div>
                                        <!--   <hr class="hrrr"> -->
                                        <div class="emotion-coments">
                                            <div class="emotion">
                                                <img src="../img/itemtl.png" alt="">
                                                <p>Trả lời</p>
                                            </div>
                                            <div class="coments-count">
                                                <p>20 câu trả lời</p>
                                            </div>
                                            <div class="coments-count" style="display: none">
                                                <p>99 Người xem</p>
                                            </div>
                                        </div>
                                        <!--  <hr class="hrrr"> -->
                                    </div>
                                    <div class="coment-all">
                                        <div class="see-question">
                                            <p>Xem câu trả lời trước</p>
                                        </div>
                                        <div class="pl-coments">
                                            <div class="pl-coments-top">
                                                <div class="sauvang"><img src="../img/sauvang.png" alt=""></div>
                                                <div class="pl">
                                                    <div class="pltop">
                                                        <p class="pl-name">Lê Thu Trà</p>
                                                        <p class="pl-info">. Phòng kinh doanh</p>
                                                        <div class="sau3-lon">
                                                            <img class="imgsau3" src="../img/sau3.png" alt="">
                                                            <div class="sau3-con">
                                                                <div class="ul_model">
                                                                    <div class="li_model">
                                                                        <img src="../img/tung2.png" alt="">
                                                                        <p class="p_model">Chỉnh sửa bình luận</p>
                                                                    </div>
                                                                    <div class="li_model">
                                                                        <img src="../img/tung4.png" alt="">
                                                                        <p class="p_model">Xóa bình luận</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="pl-text">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text ever</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pl-coments-like">
                                                <div class="likecoment">
                                                    <img src="../img/likecoment.png" alt="">
                                                </div>
                                                <p class="text-tl">.Trả lời</p>
                                                <p class="text-time">.10 phút trước</p>
                                            </div>
                                        </div>
                                        <div class="reply-your">
                                            <div class="avt-reply"><img src="../img/avtarmyself.png" alt=""></div>
                                            <div class="reply-cmt">
                                                <input type="text" name="" value="" placeholder="Viết câu trả lời">
                                                <img class="stitem" src="../img/stitem.png" alt="">
                                                <img class="avtitem" src="../img/avtitem.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-question">

                                <div class="hiennn">
                        		<div class="menuhien">
                                <img class="img-menuhien" src="../img/readinglist.png" alt="">
                            </div>
                            <div class="list-name">
                                <div class="list-name-top"><p>Thành viên hiểu biết nhất</p></div>
                                <div class="list-name-boost">
                                    <div class="table1">
                                        <table>
                                            <tr>
                                                <th>stt</th>
                                                <th>Họ và tên</th>
                                                <th>Số bình chọn</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Nguyễn Thị Thu</td>
                                                <td>30</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Phan Lê An</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Phạm Văn Minh</td>
                                                <td>20</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="list-name">
                                <div class="list-name-top"><p>Thành viên hiểu biết nhất</p></div>
                                <div class="list-name-boost">
                                    <div class="table1">
                                        <table>
                                            <tr>
                                                <th>stt</th>
                                                <th>Họ và tên</th>
                                                <th>Số bình chọn</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Nguyễn Thị Thu</td>
                                                <td>30</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Phan Lê An</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Phạm Văn Minh</td>
                                                <td>20</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="list-name">
                                <div class="list-name-top"><p>Thành viên hiểu biết nhất</p></div>
                                <div class="list-name-boost">
                                    <div class="table1">
                                        <table>
                                            <tr>
                                                <th>stt</th>
                                                <th>Họ và tên</th>
                                                <th>Số bình chọn</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Nguyễn Thị Thu</td>
                                                <td>30</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Phan Lê An</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Phạm Văn Minh</td>
                                                <td>20</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        		
                        	</div>
                            </div>
                        </div>
                    </div>
                    <!-- //???? -->
                </div>
            </div>
            <!-- ???? -->
            

<!-- ///////////////////////////////////////////////////////////////////////////////////// -->
        </div>
        <!-- end trao doi cau ho -->

        <!-- them tai lieu -->
        <div class="cd-popup  qt-them-tl" id="popup_t_1">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="cd_modal_header">
                        <h4 class="name_header">Thêm tài liệu</h4>
                        <img src="../img/dau_x.png" alt="" class="close_detl">
                    </div>
                    <div class="cd_modal_body">
                        <form id="form_themtailieu" method="" action="">
                            <div class="form-body">
                                <div class="form_group">
                                    <label for="" class="name" >Tên tài liệu*</label>
                                    <input type="text" class="frm_input" name="txt_name_tl" placeholder="Nhập tài liệu ">
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Lĩnh vực đề cập*</label>
                                    <input type="text" value="" name="txt_lvdc" placeholder="Nhập nội dung">
                                </div>
                                <div class="form_group">
                                    <label for="" class="name">Mô tả ngắn*</label>
                                    <textarea class="" cols="3" rows="3" name="txt_mta" placeholder="Nhập nội dung"></textarea>
                                </div>
                                <div class="form_group input_xanh">
                                    <label for="" class="name">Chọn tệp đính kèm*</label>
                                    <label for="input_file1">
                                        <input type="file" name="txt_ctdk" class="custom-file-input" multiple>
                                    </label>
                                </div>
                                <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button  class="btn_luu" type="submit">Tạo</button >

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- tải -->
        <div class="cd-cuccess li_model_con">
            <div class="cd_container">
                <div class="cd_modal">
                    <div class="form_success">
                        <div class="img_success">
                            <img src="../img/img12.png" alt="">
                        </div>
                        <div class="text_success">
                            <p class="text1">Bạn đã tải xuống tài liệu Abc thành công</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- chỉnh sửa thông tin tài liệ -->
    <div class="cd-popup modal_popup_tn_tl chinh-sua-tttl" id="popup_t_1" style="">
        <div class="cd_container">
            <div class="cd_modal">
                <div class="cd_modal_header">
                    <h4 class="name_header">Chỉnh sửa thông tin tài liệu</h4>
                    <img src="../img/dau_x.png" alt="" class="close_detl">
                </div>
                <div class="cd_modal_body">
                    <form class="" method="" action="">
                        <div class="form-body">
                            <div class="form_group">
                                <label for="" class="name">Tên tài liệu*</label>
                                <input type="text" class="frm_input" name="txt" placeholder="Tài liệu Abc">
                            </div>
                            <div class="form_group">
                                <label for="" class="name">Lĩnh vực đề cập*</label>
                                <input type="text" class="frm_input" name="txt" placeholder="Kinh doanh - công nghệ">
                            </div>

                            <div class="form_group">
                                <label for="" class="name">Nội dung câu hỏi*</label>
                                <textarea class="" cols="3" rows="3" placeholder="Nhập nội dung câu hỏi"></textarea>
                            </div>

                            <div class="form_group input_xanh">
                                <label for="" class="name">Chọn tệp đính kèm*</label>
                                <label for="input_file1">
                                    <input type="file" name="" class="custom-file-input" multiple>
                                </label>
                            </div>


                            <div class="form_buttom">
                                <submit class="btn_huy" type="button">Hủy</submit>
                                <submit class="btn_luu" type="button">Tạo</submit>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //trao doi cau hoi// -->
    <div class="cd-popup modal_popup_tn_tl traodoi-cauhoi" id="popup_t_1">
        <div class="cd_container">
            <div class="cd_modal">
                <div class="cd_modal_header">
                    <h4 class="name_header">Trao đổi - đặt câu hỏi</h4>
                    <img src="../img/dau_x.png" alt="" class="close_detl">
                </div>
                <div class="cd_modal_body">
                    <form class="" method="" action="">
                        <div class="form-body">
                            <div class="form_group">
                                <label for="" class="name">Tên tài liệu*<span class="cr_red">*</span></label>
                                <input type="text" class="frm_input" name="txt" placeholder="Tài liệu Abc">
                            </div>
                            <div class="form_group">
                                <label for="" class="name">Nội dung câu hỏi*<span class="cr_red">*</span></label>
                                <textarea class="" cols="3" rows="3" placeholder="Nhập nội dung câu hỏi"></textarea>
                            </div>

                            <div class="form_group input_xanh">
                                <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                                <label for="input_file1">
                                    <input type="file" name="" class="custom-file-input" multiple>
                                </label>
                            </div>


                            <div class="form_buttom">
                                <button class="btn_huy" type="button">Hủy</button>
                                <button class="btn_luu" type="button">Tạo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- xóa -->
    <div class="cd-modal-del xoa-tai-lieu">
        <div class="cd_container">
            <div class="cd_modal">
                <div class="cd_modal_header">
                    <h4 class="name_header">Xóa tài liệu</h4>
                    <img src="../img/dau_x.png" alt="" class="close_detl">
                </div>
                <div class="cd_modal_body">
                    <form class="" method="" action="">
                        <div class="form-body">
                            <div class="row_modal_del">
                                <p class="p_popup_del"><b>Bạn có chắc muốn xóa thông tin tài liệu Abc? </b></p>
                                <p class="p_popup_del">Tất cả thông tin sẽ được lưu tự động vào <b>Đã xóa gần đây</b>
                                    trong thời gian 05 ngày trước khi bị xóa vĩnh viễn</p>
                            </div>
                            <div class="form_buttom">
                                <button class="btn_huy" type="button">Hủy</button>
                                <button class="btn_luu" type="button">Xóa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /xóa thành công// -->
    <div class="cd-cuccess xoa-thanh-cong" style="display: none;">
        <div class="cd_container">
            <div class="cd_modal">
                <div class="form_success">
                    <div class="img_success">
                        <img src="../img/img12.png" alt="">
                    </div>
                    <div class="text_success">
                        <p class="text1">Bạn đã xóa tài liệu Abc thành công</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bat thong bao cho cau hoi -->
    <div class="cd-modal-del bat-thong-bao-ch">
        <div class="cd_container">
            <div class="cd_modal">
                <div class="cd_modal_header">
                    <h4 class="name_header">Bật thông báo câu hỏi</h4>
                    <img src="../img/dau_x.png" alt="" class="close_detl">
                </div>
                <div class="cd_modal_body">
                    <form class="" method="" action="">
                        <div class="form-body">
                            <div class="row_modal_del">
                                <p class="p_popup_del"><b>Bạn có muốn nhận thông báo cho câu hỏi này? </b></p>
                                <p class="p_popup_del">Tất cả các thay đổi màcâu hỏi cập nhật</p> <p style="text-align: center">Đã xóa gần đâysẽ được gửi tới thông báo của bạn</p>


                            </div>
                            <div class="form_buttom">
                                <button class="btn_huy huy-thong-bao" type="button">Hủy</button>
                                <button class="btn_luu bat-thong-bao" type="button">Bật thông báo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end bat thong bao cho cau hoi -->
<!-- xoa cau hoi -->
 <div class="cd-modal-del xoa-cau-hoi">
        <div class="cd_container">
            <div class="cd_modal">
                <div class="cd_modal_header">
                    <h4 class="name_header">Xóa câu hỏi</h4>
                    <img src="../img/dau_x.png" alt="" class="close_detl">
                </div>
                <div class="cd_modal_body">
                    <form class="" method="" action="">
                        <div class="form-body">
                            <div class="row_modal_del">
                                <p class="p_popup_del"><b>Bạn có muốn nhận thông báo cho câu hỏi này? </b></p>
                                <p class="p_popup_del">Bài viết này sẽ không thể khôi phụ do không được</p> <p style="text-align: center">lưu tại bộ nhớ tạm của hệ thống</p>


                            </div>
                            <div class="form_buttom">
                                <button class="btn_huy huy-xoa-cau-hoi" type="button">Hủy</button>
                                <button class="btn_luu xoa-choi" type="button">Xóa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- end xoa cau hoi -->

<!-- xoa thanh cong cau hoi -->
<div class="cd-cuccess xoa-thanh-cong-cauhoi" style="display: none;">
        <div class="cd_container">
            <div class="cd_modal">
                <div class="form_success">
                    <div class="img_success">
                        <img src="../img/img12.png" alt="">
                    </div>
                    <div class="text_success">
                        <p class="text1">Bạn đã xóa câu hỏi thành công</p>
                    </div>
                    <div class="form_buttom">
                    <button class="btn_huy dong-xoa-ch" type="button">Đóng</button>
                    <button class="btn_luu hoantac-xoa-ch" type="button">Hoàn tác (5s)</button>
                </div>
                </div>
            </div>
        </div>
    </div>
<!-- xoa thanh cong cau hoi -->
<!-- chinh sua cau hoi -cau hoi cua toi -->
<div class="cd-popup modal_popup_tn_tl cs-ch-cuatoi" id="popup_t_1" style="display: none;" >
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Sửa câu hỏi</h4>
                <img src="../img/dau_x.png" alt="" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                        <div class="form-body">
                            <div class="form_group">
                                <label for="" class="name">Nội dung câu hỏi<span class="cr_red">*</span></label>
                                <textarea name="content" class="textarea_cheditor" id="content" placeholder="nhap noi dung"></textarea>
                                <!-- <script type="text/javascript">
                                    CKEDITOR.replace("content");
                                </script> -->
                            </div>
                            
                            <div class="form_group input_xanh">
                                <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                                <label for="input_file1">
                                    <input type="file" name=""  class="custom-file-input" multiple >
                                </label>
                            </div>                                                  
                            <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu" type="button">Cập nhật</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- chinh sua cau hoi -cau hoi cua toi -->
<!-- xóa bai cau hoi của tôi -->
<div class="cd-modal-del xoa-bai-chct " style="display: none">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa câu hỏi</h4>
                <img src="../img/dau_x.png" alt="" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                        <div class="form-body">
                            <div class="row_modal_del">
                                <p class="p_popup_del"><b>Bạn có chắc muốn xóa câu hỏi của người này? </b></p>
                                <p class="p_popup_del">Bài viết này sẽ không thể khôi phụ do không được <b> lưu tại bộ nhớ tạm của hệ thống</b> 
                            </div>
                            <div class="form_buttom">
                                    <button class="btn_huy" type="button">Hủy</button>
                                    <button class="btn_luu" type="button">Xóa</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end xóa baicâu hỏi của tôi -->





<!-- xoa -cau bai hoi cua toi thành công -->
<div class="cd-cuccess xoa-thanhcong-bai-chct"  style="display: none ">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="form_success">
                <div class="img_success">
                    <img src="../img/img12.png" alt="">
                </div>
                <div class="text_success">
                    <p class="text1">Bạn đã xóa câu hỏi thành công</p>
                </div>
                <div class="form_buttom">
                    <button class="btn_huy" type="button">Đóng</button>
                    <button class="btn_luu" type="button">Hoàn tác (5s)</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end xoa  bài -cau hoi cua toi  thành công-->
<? include('../includes/popup_nt.php') ?>
</div>



</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/jquery.validate.min.js" ></script>
<script src="../js/validate_quantri.js"></script>
<script src="../js/caidat.js"></script>

<script> /////tung/////////////////////////////////////////////////////////
$(document).ready(function () {
    // $('.show_tung1').click(function () {
    //     $('.model_tung_1').slideToggle(300);

    $('.tai-lieu').click(function () {
        $('.qt-them-tl').show();
    });
    $('.model1').click(function () {
        $('.li_model_con').show()
        $('.model_tung_1').hide();
    });
    $('.model2').click(function () {
        $('.chinh-sua-tttl').show()
        $('.model_tung_1').hide();
    });

    $('.model3').click(function () {
        $('.traodoi-cauhoi').show()
        $('.model_tung_1').hide();
    });
    $('.model4').click(function () {
        $('.xoa-tai-lieu').show()
        $('.model_tung_1').hide();
    })
    $('.xoa-tai-lieu .btn_luu').click(function () {
        $('.xoa-thanh-cong').show()
       
        $('.chinh-sua-tttl').hide();
        $('.xoa-tai-lieu').hide();
    })
    $('.xoa-tai-lieu .btn_huy').click(function () {
        $('.xoa-tai-lieu').hide();
    })

    $('.btn_huy').click(function () {
        $('.chinh-sua-tttl').hide();
    })

    $('.close_detl').click(function () {
        $('.chinh-sua-tttl').hide();
    })

    $('.close_detl').click(function () {
        $('.qt-them-tl').hide();
    })

    $('.close_detl').click(function () {
        $('.chinh-sua-tttl').hide();
    })
    $('.close_detl').click(function () {
        $('.traodoi-cauhoi').hide();
    })
    $('.close_detl').click(function () {
        $('.xoa-tai-lieu').hide();
    })

})
$(window).click(function (e) {
    if ($(e.target).is(".qt-them-tl")) {
        $(".qt-them-tl").hide();
    }

    if ($(e.target).is(".li_model_con")) {
        $(".li_model_con").hide();
    }

    if ($(e.target).is(".xoa-thanh-cong")) {
        $(".xoa-thanh-cong").hide();
    }

    if ($(e.target).is(".ul_model")) {
        $(".ul_model").hide();
    }

    if ($(e.target).is(".chinh-sua-tttl")) {
        $(".chinh-sua-tttl").hide();
    }

    if ($(e.target).is(".traodoi-cauhoi")) {
        $(".traodoi-cauhoi").hide();
    }

    if ($(e.target).is(".xoa-tai-lieu")) {
        $(".xoa-tai-lieu").hide();
    }

    if ($(e.target).is(".bat-thong-bao-ch")) {
        $(".bat-thong-bao-ch").hide();
    }

    if ($(e.target).is(".xoa-cau-hoi")) {
        $(".xoa-cau-hoi").hide();
    }

    if ($(e.target).is(".xoa-thanh-cong-cauhoi")) {
        $(".xoa-thanh-cong-cauhoi").hide();
    }

    if ($(e.target).is(".cs-ch-cuatoi")) {
        $(".cs-ch-cuatoi").hide();
    }

    if ($(e.target).is(".xoa-thanhcong-bai-chct")) {
        $(".xoa-thanhcong-bai-chct").hide();
    }
});


$(document).ready(function(){
    $(".cs-ch-cuatoi .btn_luu").click(function(){
       $(".cs-ch-cuatoi").hide();
    })
    $("#nkt2 .hv1").hover(function () {
        $(this).css("background", "#2E3994");
    }, function () {
        $(this).css("background", "#4C5BD4");
    });

    $("#nkt2 .hv2").hover(function () {
        $(this).css("background", "#2E3994");
    }, function () {
        $(this).css("background", "#4C5BD4");
    });

    // $("#nkt2 .hove .hove1").hover(function () {
    //     $("#nkt2 .wiki-all").css("border-radius", "6px 6px 0px 0px");
    // });

    // $("#nkt2 .wiki").hover(function(){
    //    $("#nkt2 .hove").css("display","block");
    // });
    // $("#nkt2 .wiki-all").hover(function () {
    //     $("#nkt2 .hove").css("display", "block");
    // },

    //  function () {
    //     $("#nkt2 .hove").css("display", "none")
    //     $("#nkt2 .wiki-all").css("border-radius", "6px");
    //     ;
    // });

    $(".traodoi-cauhoi .btn_huy").click(function(){
        $(".traodoi-cauhoi").hide();
    })

    $(".chinh-sua-tttl .btn_luu").click(function(){
        $(".chinh-sua-tttl").hide();
    })

    $(".traodoi-cauhoi .btn_luu").click(function(){
        $(".traodoi-cauhoi").hide();
    })


})
 $(window).click(function (e) {
        if ($(e.target).is(".chinh-sua-tttl")) {
            $(".chinh-sua-tttl").hide();
        }

        if ($(e.target).is(".traodoi-cauhoi")) {
            $(".traodoi-cauhoi").hide();
        }
        if ($(e.target).is(".xoa-tai-lieu")) {
            $(".xoa-tai-lieu").hide();
        }

        if ($(e.target).is(".bat-thong-bao-ch")) {
            $(".bat-thong-bao-ch").hide();
        }
        if ($(e.target).is(".xoa-cau-hoi")) {
            $(".xoa-cau-hoi").hide();
        }
         if ($(e.target).is(".xoa-thanh-cong-cauhoi")) {
            $(".xoa-thanh-cong-cauhoi").hide();
        }

    });

$(document).ready(function () {
    $('img.show_tung1').click(function () {
        $(this).parents('.box_cha_model_tung_1').find('.model_tung_1').slideToggle();
    })

    $("#nkt2 .imgitoption").click(function(){
        $("#nkt2 .item-option-con").toggle();
    })

    $(".bat-tb").click(function(){
        $(".bat-thong-bao-ch").show();
        $("#nkt2 .item-option-con").hide();
    })
  
    $(".huy-thong-bao").click(function(){
        $(".bat-thong-bao-ch").hide();
    })

    $(".bat-thong-bao").click(function(){
        $(".bat-thong-bao-ch").hide();
         $(".xoa-thanh-cong").hide();
    })

    $("img.close_detl").click(function(){
        $(".bat-thong-bao-ch").hide(); 
         $(".xoa-cau-hoi").hide();
            
    })

    $(".xoa-ch").click(function(){
          $(".xoa-cau-hoi").show();
          $("#nkt2 .item-option-con").hide();  
    })

    $(".huy-xoa-cau-hoi").click(function(){
           $(".xoa-cau-hoi").hide();
         
    })

    $(".xoa-cau-hoi .xoa-choi").click(function(){
           $(".xoa-cau-hoi").hide();
           $(".xoa-thanh-cong").hide();
           $(".xoa-thanh-cong-cauhoi").show();  
    })
     $(".dong-xoa-ch").click(function(){
           $(".xoa-thanh-cong-cauhoi").hide();   
    })

   $(".hoantac-xoa-ch").click(function(){
           $(".xoa-thanh-cong-cauhoi").hide();   
    })

   $("#nkt2 .sau3-lon").click(function(){
        $("#nkt2 .sau3-con").toggle();
    })
})


$(document).ready(function(){

    $("#nkt3 .chinh-sua3").click(function(){
        $('.cs-ch-cuatoi').show();
        $('#nkt3 .item-option-con').hide();
    })
    $("img.close_detl").click(function(){
        $(".cs-ch-cuatoi").hide();
    })

    $(".cs-ch-cuatoi .btn_huy").click(function(){
        $(".cs-ch-cuatoi").hide();
    })
    
    $(".item-option-con .chinhsua-chct2").click(function(){
        $(".item-option-con").hide();
        $(".xoa-bai-chct").show();
        $(".cs-ch-cuatoi").hide();
    })

   
    $(".xoa-bai-chct img.close_detl").click(function(){
        $(".xoa-bai-chct").hide();
    })

    $(".xoa-bai-chct .btn_huy").click(function(){
        $(".xoa-bai-chct").hide();
        $(".cs-ch-cuatoi").hide();
        
    })
    
    $(".xoa-bai-chct .btn_luu").click(function(){
        $(".xoa-bai-chct").hide();
        $(".xoa-thanhcong-bai-chct").show();
        
    })


     $(".qt-them-tl .btn_huy").click(function(){
         $(".qt-them-tl").hide();
    })


})
$(window).click(function (e) {
    if ($(e.target).is(".cs-ch-cuatoi")) {
        $(".cs-ch-cuatoi").hide();
    }

    if ($(e.target).is(".xoa-bai-chct")) {
        $(".cs-ch-cuatoi").hide();  
    }
    if ($(e.target).is(".xoa-thanhcong-bai-chct")) {
        $(". xoa-thanhcong-bai-chct").hide();
    }
});

$(document).ready(function(){

    $(".img-readinglisa").click(function(){
    	$(".right-question").css("width", "105%");
    	$(".right-question").css("display", "block");
    	$(".right-question").css("transition", "0.3s");
    	
    	$(".img-menuhien").show();
    })
    $(".menuhien").click(function(){
    	// $(".right-question").css("display", "none");
    	$(".right-question").css("transition", "0.3s");
    	$(".right-question").css("width", "0px");
    	$(".img-readinglisa").show();
    	$(".img-menuhien").hide();

    })
    $(".hover-wiki").click(function(){
    	$("#nkt1").show();
    	$(".nkt4").hide();
    	$(".nkt5").hide();
    })
    $(".hover-traodoi").click(function(){
    	$(".nkt4").show();
    	$(".nkt5").hide();
    	$("#nkt1").hide();
    })
     $(".hover-cauhoi").click(function(){
    	$(".nkt5").show();
    	$(".nkt4").hide();
    	$("#nkt1").hide();
    })
})

//end cau hoi cua toi

/////////tung end////////////////////
</script>
</html>


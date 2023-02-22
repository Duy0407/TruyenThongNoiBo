<?php
include("config.php");
require_once '../includes/check_login.php';
require_once '../api/api_all_info.php';
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';

// if ($_SESSION['login']['user_type'] == 2) {
//     check_module(3);
// }

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_create = 1;
// } else if (check_module(3)['create'] == 1) {
//     $type_create = 1;
// } else {
//     $type_create = 0;
// }

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_delete = 1;
// } else if (check_module(3)['delete'] == 1) {
//     $type_delete = 1;
// } else {
//     $type_delete = 0;
// }

$type_delete = 1;
$type_create = 1;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Thư từ ceo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/vanhoadoanhnghiep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/mail_from_ceo.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="vanhoadoanhnghiep" class="co-sidebar-phai">
        <div class="wapper">
            <!--  sidebar -->
            <?php include '../includes/cd_sidebar.php' ?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!--     header -->
                <?php include '../includes/cd_header.php' ?>
                <!-- end header -->
                <!--  center -->
                <div id="center" class="v_center_thutuceo">
                    <!--  bài viết-->
                    <div class="baiviet v_baiviet_mail_from_ceo">
                        <div id="main-baiviet" class="main-baiviet">
                            <ul>
                                <li class="thutuceo ">
                                    <div class="header header-ngu">
                                        <div class="title">
                                            <p>Tạo thư mới từ CEO</p>
                                        </div>
                                    </div>
                                    <div class="cd_modal_body body-ngu">
                                        <?php
                                        if ($type_create == 1) {
                                        ?>
                                            <form class="mail_from_ceo">
                                                <div class="form-body">
                                                    <div class="form_group">
                                                        <label class="name">Tiêu đề <span class="cr_red">*</span></label>
                                                        <input type="text" value="" class="title_mail" name="title" placeholder="Nhập tiêu đề">
                                                        <span class="error"></span>
                                                    </div>
                                                    <div class="form_group">
                                                        <label for="" class="name">Chọn tệp đính kèm <span class="cr_red">*</span></label>
                                                        <label for="input_file1">
                                                            <input type="file" name="file" class="custom-file-input file">
                                                            <span class="error"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form_group">
                                                        <div class="label">
                                                            <label for="" class="name">Nội dung thư <span class="cr_red">*</span></label>
                                                        </div>
                                                        <div class="form_group">
                                                            <textarea name="content" class="textarea_cheditor content" id="content_ceo" placeholder="Nhập nội dung"></textarea>
                                                            <span class="error"></span>
                                                            <!-- <script type="text/javascript">
                                                        CKEDITOR.replace("content_ceo");
                                                        </script> -->
                                                        </div>
                                                    </div>
                                                    <div class="form_group hinhthuc-tb">
                                                        <label for="" class="name">Hình thức thông báo đến nhân viên</label>
                                                        <div class="check check_1">
                                                            <input type="checkbox" class="sent_alert" name="sent_alert" value="1">
                                                            <p>Gửi thông báo</p>
                                                        </div>
                                                        <div class="check check_2">
                                                            <input type="checkbox" class="sent_alert_mail" name="sent_alert_mail" value="2">
                                                            <p>Gửi thông qua email</p>
                                                        </div>
                                                    </div>
                                                    <span class="error error_sent"></span>
                                                    <div class="form_buttom">
                                                        <button class="btn_luu" name="submit" value="submit">
                                                            <img class="v_img_load_form_mail_from_ceo" src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi">
                                                            <span class="v_img_submit_form_mail_from_ceo_span">Tạo mới</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php
                                        } else {
                                        ?>
                                            <div>Bạn không có quyền tạo thư</div>
                                        <?php
                                        }
                                        ?>

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
                                    <a href="vhdn-tam-nhin-su-menh.html" class="menu-phu-d " id="d_tamnhin" data-id='tamnhin'>
                                        <div class="img">
                                            <img src="../img/v_2.png">
                                        </div>
                                        <div class="cont">
                                            <p>Tầm nhìn - Sứ mệnh</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-gia-tri-muc-tieu.html" class="menu-phu-d " id="d_giatri" data-id='giatri-muctieu '>
                                        <div class="img">
                                            <img src="../img/v_3.png">
                                        </div>
                                        <div class="cont">
                                            <p>Giá trị cốt lõi - Mục tiêu chiến lược</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-nguyen-tac-lam-viec.html" class="menu-phu-d " id="d_nguyentac" data-id="nguyentaclamviec">
                                        <div class="img">
                                            <img src="../img/v_4.png">
                                        </div>
                                        <div class="cont">
                                            <p>Nguyên tắc làm việc</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-danh-sach-phong-ban.html" class="menu-phu-d  " id="d_danhsach" data-id="danhsachphongban">
                                        <div class="img">
                                            <img src="../img/v_5.png">
                                        </div>
                                        <div class="cont">
                                            <p>Danh sách phòng ban</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-cai-dat-lich-cap-nhat.html" class="menu-phu-d " id="d_caidatlich" data-id="lichcapnhat">
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
                                        <div class="header header-ngu">
                                            <div class="title">
                                                <p>Danh sách thư</p>
                                            </div>
                                        </div>
                                        <div class="body body_list_letter">
                                            <?php
                                            require_once '../config/config.php';
                                            $db_mail_ceo = new db_query("SELECT * FROM mail_from_ceo WHERE `delete` = 0 AND id_company = " . $_SESSION['login']['id_com'] . " ORDER BY id DESC");
                                            if (mysql_num_rows($db_mail_ceo->result) == 0) {
                                                echo '<div class="list_mail_err">Chưa có thư nào được tạo<div>';
                                            }
                                            while ($row = mysql_fetch_array($db_mail_ceo->result)) {
                                            ?>
                                                <div class="container container_mail">
                                                    <div class="title nut-chitietthutuceo">
                                                        <p class="detail_mail_from_ceo" data-id="<?= $row['id'] ?>"><?= $row['title_mail'] ?></p>
                                                    </div>
                                                    <div class="container-thu">
                                                        <div class="cont cont_list_letter">
                                                            <?php
                                                            if ($_SESSION['login']['user_type'] == 1) {
                                                                if ($row['user_type'] == 1) {
                                                                    $user_sent = $_SESSION['login']['name'];
                                                                } else {
                                                                    $user_sent = $data_ep[$row['user_sent']]->ep_name;
                                                                }
                                                            } else {
                                                                if ($row['user_type'] == 1) {
                                                                    $user_sent = array_values($data_ep)[0]->com_name;
                                                                } else {
                                                                    $user_sent = $data_ep[$row['user_sent']]->ep_name;
                                                                }
                                                            }
                                                            ?>
                                                            <p>Người cập nhật: <?= $user_sent ?> </p>
                                                            <p><?= date("h:i d.m.Y", $row['created_at']) ?></p>
                                                        </div>
                                                        <?php
                                                        if ($type_delete == 1) {
                                                        ?>
                                                            <div class="xoa nut-xoathutuceo" data-id="<?= $row['id'] ?>">
                                                                <img src="../img/v_7.png">
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
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
            <?php include '../includes/popup_dat.php' ?>
        </div>
    </div>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/select2.min.js"></script>
<script defer type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script defer src="../js/caidat.js"></script>
<script defer type="text/javascript" src="../js/datjs.js"></script>
<script defer type="text/javascript" src="../js/datvalidate.js"></script>
<script defer type="text/javascript" src="../js/vhdn.js"></script>
<script type="text/javascript">
    $('.active3').css('background', ' #2E3994');
    $(document).ready(function() {
        if ($('.body_list_letter').height() > 498) {
            $('.body_list_letter').css({
                'overflowY': 'scroll',
                'maxHeight': '498px'
            });
        }
        //các phần liên quan của thư từ CEO
        $('.btn_luu').click(function(){
            if ($(this).prop('type') == 'button') {
                alert("Đang tạo thư từ CEO. Vui lòng chờ");
            }
        });

        $(".mail_from_ceo").submit(function () {
            var form_data = new FormData();
            var element = $(".mail_from_ceo");
            var flag = true;
            if (element.find(".title_mail").val() == "") {
                element.find(".title_mail").next().text('Không được để trống');
                element.find(".title_mail").focus();
                flag = false;
            } else {
                element.find(".title_mail").next().text('');
                form_data.append('title', element.find(".title_mail").val());
            }

            if (element.find('.file').prop('files')[0] == undefined) {
                element.find(".file").next().text('Không được để trống');
                element.find(".file").focus();
                flag = false;
            } else if (element.find('.file').prop('files')[0].size > 10485760) {
                element.find(".file").next().text('Vui lòng upload file dưới 10MB');
                element.find(".file").focus();
                flag = false;
            } else {
                element.find(".file").next().text('');
                form_data.append('file', element.find('.file').prop('files')[0]);
            }

            if (element.find('.content').val() == "") {
                element.find(".content").next().text('Không được để trống');
                element.find(".content").focus();
                flag = false;
            } else {
                element.find(".content").next().text('');
                form_data.append('content', element.find('.content').val());
            }

            if (element.find('.sent_alert').prop('checked') == false && element.find('.sent_alert_mail').prop('checked') == false) {
                element.find('.error_sent').text('Vui lòng chọn hình thức thông báo');
                flag = false;
            } else {
                if (element.find('.sent_alert').prop('checked') == true) {
                    form_data.append('sent_alert', 1);
                }else if (element.find('.sent_alert_mail').prop('checked') == true) {
                    form_data.append('sent_alert_mail', 1);
                }
            }
            if (flag == true) {
                $(this).find('.btn_luu').prop('type', 'button');
                $(this).find('.v_img_load_form_mail_from_ceo').show();
                $(this).find('.v_img_submit_form_mail_from_ceo_span').hide();
                $.ajax({
                    type: "POST",
                    url: "../handle/create_mail_from_ceo.php",
                    data: form_data,
                    dataType: "json",
                    cache: false,
		            contentType: false,
	                processData: false,
                    success: function (data) {
                        if (data.result == true) {
                            $(".v_check_ring").show().find('#v_check_ring_content').text('Bạn đã tạo thư từ CEO thành công');
                            setTimeout(function(){
                                $(".v_check_ring").hide();
                            }, 1000);
                            location.reload();
                        }
                    }
                });
            }
            return false;
        });
    });
</script>

</html>
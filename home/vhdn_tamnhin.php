<?php 
include("config.php");
require_once '../includes/check_login.php';
require_once '../includes/check_account.php';
require_once '../api/api_all_info.php';
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';
require_once '../includes/check_account.php';
$db_com_time = new db_query("SELECT * FROM com_create_time WHERE id_company = " . $_SESSION['login']['id_com']);

$row_time = mysql_fetch_array($db_com_time->result);

$db = new db_query("SELECT * FROM vision_misson WHERE id_company = " . $_SESSION['login']['id_com']);

if (mysql_num_rows($db->result) == 0) {
    $data = [
        'id_company' => $_SESSION['login']['id_com'],
        'created_at' => time()
    ];
    add('vision_misson',$data);
    $db = new db_query("SELECT * FROM vision_misson WHERE id_company = " . $_SESSION['login']['id_com']);
}
$row_v_m = mysql_fetch_array($db->result);
// if ($_SESSION['login']['user_type'] == 2) {
//     check_module(3);
// }

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_create = 1;
// }else if(check_module(3)['create'] == 1){
//     $type_create = 1;
// }else{
//     $type_create = 0;
// }

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_delete = 1;
// }else if(check_module(3)['delete'] == 1){
//     $type_delete = 1;
// }else{
//     $type_delete = 0;
// }

$type_delete = 1;
$type_create = 1;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Tầm nhìn - sứ mệnh</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/caidat.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/vanhoadoanhnghiep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/vhdn_tamnhin.css?v=<?= $version ?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="vanhoadoanhnghiep" class="co-sidebar-phai khongmenu_480">
        <div class="wapper">
            <!--  sidebar -->
            <?php include '../includes/cd_sidebar.php'?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!--     header -->
                <?php include '../includes/cd_header.php'?>
                <!-- end header -->
                <!--  center -->
                <div id="center" class="v_center_tamnhinsumenh">
                    <!--  bài viết-->
                    <div class="baiviet">
                        <div id="main-baiviet" class="main-baiviet">
                            <ul>
                                <li class="tamnhin">
                                    <div class="header-vanhoa header-ngu">
                                        <div class="title">
                                            <p>Thông tin công ty</p>
                                        </div>
                                    </div>
                                    <div class="body-vanhoa body-ngu">
                                        <div class="info-ct thongtin-ct">
                                            <div class="v_info-cf-time">
                                                <p><?php
                                                if(count($data_ep) == 0){
                                                    echo $_SESSION['login']['name'];
                                                }else{
                                                    echo array_values($data_ep2)[0]->com_name;
                                                }

                                                $com_create_time = date('d/m/Y', $row_time['time']);
                                                ?></p>
                                                <!-- <div class="v_edit_com_time">
                                                    <p class="v_edit_com_time_p">Chỉnh sửa</p>
                                                    <img src="../img/vh_1.png" alt="Ảnh lỗi">
                                                </div> -->
                                            </div>
                                            <p>Ngày thành lập: <?=$com_create_time?></p>
                                        </div>
                                        <div class="mota-ct thongtin-ct">
                                            <div class="header">
                                                <div class="cont">
                                                    <p>Mô tả</p>
                                                </div>
                                                <?php
                                                if ($type_create == 1) {
                                                ?>
                                                <div class="img nut-edit-mota">
                                                    <p>Chỉnh sửa</p>
                                                    <img src="../img/vh_1.png" alt="Ảnh lỗi">
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="body">
                                                <div class="cont v_tamnhinsumenh">
                                                    <p class="description">
                                                        <?php
                                                        if ($row_v_m['description'] == "") {
                                                            echo "Chưa cập nhật";
                                                        }else{
                                                            echo $row_v_m['description'];
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="logo-ct thongtin-ct">
                                            <div class="header">
                                                <div class="cont">
                                                    <p>Logo công ty</p>
                                                </div>
                                                <?php
                                                if ($type_create == 1) {
                                                ?>
                                                <div class="img nut-edit-tamnhin nut-edit-avatar-ct">
                                                    <p>Chọn ảnh khác</p>
                                                    <img src="../img/vh_2.png" alt="Ảnh lỗi">
                                                </div>
                                                <input type="file" hidden class="input-avatar-ct" onchange="changeImg_anh_dai_dien(this)" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="body">
                                                <div class="img-logo">
                                                    <?php
                                                        if(count($data_ep2) == 0){
                                                            $logo_com = '../img/logo_com.png';
                                                        }else{
                                                            $logo_com = 'https://chamcong.24hpay.vn/upload/company/logo/' . array_values($data_ep2)[0]->com_logo;
                                                        }
                                                    ?>
                                                    <img class="v_img-logo-com" src="<?=$logo_com?>" alt="Ảnh lỗi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="anhbia-ct thongtin-ct">
                                            <div class="header">
                                                <div class="cont">
                                                    <p>Ảnh bìa công ty</p>
                                                </div>
                                                <?php
                                                if ($type_create == 1) {
                                                ?>
                                                <div class="img v_edit_cover_img_com">
                                                    <p>Chọn ảnh khác</p>
                                                    <img src="../img/vh_2.png" alt="Ảnh lỗi">
                                                </div>
                                                <input type="file" class="v_file_avatar_com" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" onchange="changImg3(this)">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="body">
                                                <div class="img-anhbia">
                                                <?php
                                                $db_cover = new db_query("SELECT id, cover_image FROM cover_image_com WHERE id_company = " . $_SESSION['login']['id_com']);
                                                if(mysql_num_rows($db_cover->result) == 0){
                                                    $cover_image = '../img/banner1.png';
                                                }else{
                                                    $row_cover_img = mysql_fetch_array($db_cover->result);
                                                    $cover_image = '../img/cover_image_com/' . $_SESSION['login']['id_com'] . '/' . $row_cover_img['cover_image'];
                                                }
                                                ?>
                                                    <img src="<?=$cover_image?>" class="v_img_cover_img2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lienhe-ct thongtin-ct" style="display: none">
                                            <div class="header">
                                                <div class="cont">
                                                    <p>Địa chỉ công ty</p>
                                                </div>
                                                <div class="img nut-edit-diachi" data-address="<?=$arr_com->com_address?>">
                                                    <p>Chỉnh sửa</p>
                                                    <img src="../img/vh_1.png">
                                                </div>
                                            </div>
                                            <div class="body">
                                                <div class="v_diachi">
                                                    <div class="img">
                                                        <img src="../img/vh_5.png" alt="Ảnh lỗi">
                                                    </div>
                                                    <div class="cont">
                                                        <p>
                                                            <?php
                                                            echo "Địa chỉ: " . $arr_com->com_address;
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mota-ct thongtin-ct">
                                            <div class="header">
                                                <div class="cont">
                                                    <p>Địa chỉ công ty</p>
                                                </div>
                                            </div>
                                            <div class="body">
                                                <div class="cont v_tamnhinsumenh">
                                                    <div class="vhdn_address">
                                                        <img src="../img/vhdn_address.svg" alt="Ảnh lỗi">
                                                        <p class="vhdn_address_text">VP1: Tầng 4, B50, Lô 6, KĐT Định Công - Hoàng Mai - Hà Nội</p>
                                                    </div>
                                                    <div class="vhdn_address">
                                                        <img src="../img/vhdn_address.svg" alt="Ảnh lỗi">
                                                        <p class="vhdn_address_text">VP2: Thôn Thanh Miếu, Xã Việt Hưng, Huyện Văn Lâm, Tỉnh Hưng Yên</p>
                                                    </div>
                                                    <div class="vhdn_address">
                                                        <img src="../img/vhdn_address.svg" alt="Ảnh lỗi">
                                                        <p class="vhdn_address_text">VP3: Số 1 đường Trần Nguyễn Đán, Khu Đô Thị Định Công, Hoàng Mai, Hà Nội</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                            <img src="../img/v_2.png">
                                        </div>
                                        <div class="cont">
                                            <p>Tầm nhìn - Sứ mệnh</p>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-content congty-info">
                                    <a href="vhdn-thu-tu-seo.html" class="menu-phu-d " id="d_thutuceo"
                                        data-id='thutuceo'>
                                        <div class="img">
                                            <img src="../img/v_1.png" alt="Ảnh lỗi">
                                        </div>
                                        <div class="cont">
                                            <p>Thư từ CEO</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-gia-tri-muc-tieu.html" class="menu-phu-d " id="d_giatri"
                                        data-id='giatri-muctieu '>
                                        <div class="img">
                                            <img src="../img/v_3.png" alt="Ảnh lỗi">
                                        </div>
                                        <div class="cont">
                                            <p>Giá trị cốt lõi - Mục tiêu chiến lược</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-nguyen-tac-lam-viec.html" class="menu-phu-d " id="d_nguyentac"
                                        data-id="nguyentaclamviec">
                                        <div class="img">
                                            <img src="../img/v_4.png" alt="Ảnh lỗi">
                                        </div>
                                        <div class="cont">
                                            <p>Nguyên tắc làm việc</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-danh-sach-phong-ban.html" class="menu-phu-d  " id="d_danhsach"
                                        data-id="danhsachphongban">
                                        <div class="img">
                                            <img src="../img/v_5.png" alt="Ảnh lỗi">
                                        </div>
                                        <div class="cont">
                                            <p>Danh sách phòng ban</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-cai-dat-lich-cap-nhat.html" class="menu-phu-d " id="d_caidatlich"
                                        data-id="lichcapnhat">
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
                        <div class="img nut-hien-trang">
                            <img id="icon-menu" src="../img/icon_menu.png" alt="Ảnh lỗi">
                        </div>
                        <div class="trang">
                            <div class="icon-menu">
                                <div class="container" id="hien-trang">
                                    <div class=" icon-trong">
                                        <div class="img">
                                            <img id="icon-quayve" src="../img/icon_menu.png">
                                        </div>
                                    </div>
                                    <div class="tamnhin  content-phu">
                                        <div class="header header-ngu">
                                            <p>Tầm nhìn</p>
                                            <?php
                                            if($type_create == 1){
                                            ?>
                                            <div class="img nut-tamnhin">
                                                <p>Chỉnh sửa</p>
                                                <img src="../img/vh_1.png">
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="body">
                                            <p class="v_tamnhin_p content_tamnhin"><?php
                                            if ($row_v_m['vision'] == "") {
                                                echo "Chưa cập nhật";
                                            }else{
                                                echo $row_v_m['vision'];
                                            }
                                            ?></p>
                                        </div>
                                    </div>
                                    <div class="tamnhin content-phu">
                                        <div class="header header-ngu">
                                            <p>Sứ mệnh</p>
                                            <?php
                                            if ($type_create == 1) {
                                            ?>
                                            <div class="img nut-sumenh">
                                                <p>Chỉnh sửa</p>
                                                <img src="../img/vh_1.png">
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="body">
                                            <p class="v_tamnhin_p content_sumenh"><?php
                                            if ($row_v_m['mission'] == "") {
                                                echo "Chưa cập nhật";
                                            }else{
                                                echo $row_v_m['mission'];
                                            }
                                            ?></p>
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
            <?php include '../includes/popup_dat.php'?>
        </div>
    </div>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script defer type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script defer src="../js/caidat.js"></script>
<script defer type="text/javascript" src="../js/datjs.js"></script>
<script defer type="text/javascript" src="../js/datvalidate.js"></script>
<script defer type="text/javascript" src="../js/tamnhin_sumenh.js"></script>
<script type="text/javascript">
    $('.active3').css('background',' #2E3994');
    function changImg3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.v_img_cover_img2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            var form_data = new FormData();
            form_data.append('image', $('.v_file_avatar_com').prop('files')[0]);
            $.ajax({
                type: "POST",
                url: "../ajax/update_cover_image_com.php",
                data: form_data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    
                }
            });
        }
    }
</script>
</html>
<?php
require_once '../includes/check_login.php';
include("config.php");
require_once '../api/api_ct.php';
require_once '../api/api_nv.php';
$id_dep = getValue('dep_id', 'int', 'GET', 0);
if($id_dep == 0){
    header("Location: /truyen-thong-noi-bo-cong-ty.html");
}
$db = new db_query("SELECT * FROM `group` WHERE id = $id_dep");
$row_group1 = mysql_fetch_array($db->result);
$dep_id = $id_dep;
$v_dep_id = $id_dep;
$dep_name = $row_group1['group_name'];
$id_employee = explode(',',$row_group1['id_employee']);

$id_manager = explode(',',$row_group1['id_manager']);
$manager_name = '';
for ($i=0; $i < count($id_manager); $i++) { 
    if ($i == count($id_manager) - 1) {
        $manager_name = $manager_name . $data_ep[$id_manager[$i]]->ep_name;
    }else{
        $manager_name = $manager_name . $data_ep[$id_manager[$i]]->ep_name . ',';
    }
}
$arr_emp = array_merge($id_employee,$id_manager);
$total_emp = count($arr_emp);

if ($_SESSION['login']['user_type'] == 2) {
    check_module(2);
}

if ($_SESSION['login']['user_type'] == 1) {
    $type_create = 1;
}else if(check_module(2)['create'] == 1){
    $type_create = 1;
}else{
    $type_create = 0;
}

if ($_SESSION['login']['user_type'] == 1) {
    $type_delete = 1;
}else if(check_module(2)['delete'] == 1){
    $type_delete = 1;
}else{
    $type_delete = 0;
}
$type_create = 1;
$type_delete = 1;
$name_page = "nhóm - thảo luận";
$img_sidebar_ntl = '../img/sbp_2.png';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Nhóm thảo luận</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ttnb_page_group.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/sidebar_ntl.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?= $version ?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <style>
        #nhom-thaoluan{
            display: none !important;
        }
    </style>
</head>

<body>
    <div id="truyenthongnoibo" class="co-sidebar-phai">
        <div class="wapper">
            <!--  sidebar -->
            <?php include '../includes/cd_sidebar.php' ?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!--     header -->
                <?php include '../includes/cd_header.php' ?>
                <!-- end header -->
                <!--  center -->
                <div id="center">
                    <!--  bài viết-->
                    <div class="baiviet ttnb_baiviet">
                        <div class="banner page-nhomthaoluan">
                            <?php
                                $img_banner = "../img/group/cover_img/".$_SESSION['login']['id_com']."/".$row_group1['cover_image'];
                            ?>
                            <img src="<?=$img_banner?>" class="page_nhomtl_cover_img" alt="Ảnh lỗi">
                            <div class="content">
                                <div class="info-ct">
                                    <div class="img">
                                        <?php
                                            $img_group = "../img/group/group_image/".$_SESSION['login']['id_com']."/".$row_group1['group_image'];
                                        ?>
                                        <img class="v_logo_group" src="<?=$img_group?>">
                                        <img src="../img/mayanh1.png" class="v_upload_group_image">
                                    </div>
                                    <input type="file" data-id="<?=$row_group1['id']?>" hidden class="input_file_group_img" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" onchange="v_upload_group_image(this)">
                                    <div class="cont v_ttnb_group_dep">
                                        <p><?=$dep_name?></p>
                                        <p><?=$total_emp?> thành viên</p>
                                    </div>
                                </div>
                                <div class="edit-banner2">
                                    <div class="img">
                                        <img src="../img/mayanh2.png">
                                    </div>
                                    <div class="cont">
                                        <p>Chỉnh sửa ảnh bìa</p>
                                    </div>
                                </div>
                                <input type="file" hidden data-id="<?=$row_group1['id']?>" class="v_edit-banner2" onchange="v_update_avatar_group(this)" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                                <form method="POST" enctype="multipart/form-data" action="">
                                    <input type="file" hidden onchange="submit_banner()" name="edit-banner">
                                    <input type="submit" hidden name="submit-banner">
                                </form>
                            </div>
                        </div>
                        <div class="baiviet-search">
                            <input type="text" name="" placeholder="Tìm kiếm bài viết ">
                            <span class="see_search"></span>
                        </div>
                        <?php
                        if ($type_create == 1) {
                        ?>
                        <div class="baiviet-header">
                            <form class="tren" id="form_newfeed_ttnb" data-dep_id="<?= $dep_id ?>" data-type="1">
                                <div class="img avt">
                                    <img class="v_avatar_user1" src="<?= $_SESSION['login']['logo'] ?>">
                                </div>
                                <div class="capnhat">
                                    <input type="text" name="" id="title_post_newfeed_1" placeholder="Cập nhật công việc với các đồng nghiệp của bạn">
                                </div>
                                <div class="btn ">
                                    <button>Đăng</button>
                                </div>
                            </form>
                            <div class="duoi" id="duoi1">
                                <input type="file" id="nut-taianh">
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
                                            <div class="li_model" id="nut-sda" data-dep_id="<?= $dep_id ?>" data-type="1" data-dep_name="<?= $dep_name ?>">
                                                <img src="../img/tuychinh_1.png" alt="Ảnh lỗi">
                                                <p class="p_model">Tạo thông báo</p>
                                            </div>
                                            <div class="li_model" id="nut-cdtvm" data-dep_id="<?= $dep_id ?>" data-type="1" data-dep_name="<?= $dep_name ?>">
                                                <img src="../img/tuychinh_2.png" alt="Ảnh lỗi">
                                                <p class="p_model">Chào đón thành viên mới</p>
                                            </div>
                                            <div class="li_model" id="nut-tsk" data-dep_id="<?= $dep_id ?>" data-type="1" data-dep_name="<?= $dep_name ?>">
                                                <img src="../img/tuychinh_3.png" alt="Ảnh lỗi">
                                                <p class="p_model">Tạo sự kiện</p>
                                            </div>
                                            <div class="li_model" id="nut-ttl" data-dep_id="<?= $dep_id ?>" data-type="1" data-dep_name="<?= $dep_name ?>">
                                                <img src="../img/tuychinh_4.png" alt="Ảnh lỗi">
                                                <p class="p_model">Tạo thảo luận</p>
                                            </div>
                                            <div class="li_model" id="nut-csyt" data-dep_id="<?= $dep_id ?>" data-type="1" data-dep_name="<?= $dep_name ?>">
                                                <img src="../img/tuychinh_5.png" alt="Ảnh lỗi">
                                                <p class="p_model">Chia sẻ ý tưởng</p>
                                            </div>
                                            <div class="li_model" id="nut-tbc" data-dep_id="<?= $dep_id ?>" data-type="1" data-dep_name="<?= $dep_name ?>">
                                                <img src="../img/tuychinh_6.png" alt="Ảnh lỗi">
                                                <p class="p_model">Tạo bình chọn</p>
                                            </div>
                                            <div class="li_model" id="nut-tkt" data-dep_id="<?= $dep_id ?>" data-type="1" data-dep_name="<?= $dep_name ?>">
                                                <img src="../img/tuychinh_7.png" alt="Ảnh lỗi">
                                                <p class="p_model">Tạo khen thưởng</p>
                                            </div>
                                            <div class="li_model" id="nut-ttnb" data-dep_id="<?= $dep_id ?>" data-type="1" data-dep_name="<?= $dep_name ?>">
                                                <img src="../img/tuychinh_8.png" alt="Ảnh lỗi">
                                                <p class="p_model">Tạo tin tức nội bộ</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <!--     main-baiviet -->
                        <div id="main-baiviet" class="main-baiviet v_baiviet_trangchu_sdn">
                            <ul class="noidung-st" id="v_content_index">
                                <?php

                                if ($_SESSION['login']['user_type'] == 1) {
                                    $db_newfeed = new db_query("SELECT * FROM new_feed where id_company = $user_id AND `delete` = 0 AND position = $id_dep ORDER BY new_id DESC, updated_at DESC");
                                } else {
                                    $dep = $_SESSION['login']['dep_id'];
                                    $db_newfeed = new db_query("SELECT * FROM new_feed where id_company = $user_id AND position = $dep AND `delete` = 0 ORDER BY new_id DESC, updated_at DESC");
                                }
                                while ($row_newfeed = mysql_fetch_array($db_newfeed->result)) {
                                    $db_count_like = new db_query("SELECT * FROM `like` WHERE id_new = " . $row_newfeed['new_id']);
                                    $count_like = mysql_num_rows($db_count_like->result);
                                    $db_num_comment = new db_query("SELECT * FROM comment WHERE id_new = " . $row_newfeed['new_id']);
                                    $db_comment = new db_query("SELECT * FROM comment WHERE id_new = " . $row_newfeed['new_id'] . " AND id_parent = 0 ORDER BY id DESC");
                                    $avt_image = '';
                                    $newfeed_name = '';
                                    if ($row_newfeed['author_type'] == 1) {
                                        if ($arr_com->com_logo == "") {
                                            $avt_image =  '../img/logo_com.png';
                                        }else{
                                            $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                                        }
                                        $newfeed_name =  $arr_com->com_name;
                                    } else {
                                        $newfeed_name = $arr_ep[$row_newfeed['author']]['ep_name'];
                                        if ($arr_ep[$row_newfeed['author']]['ep_image'] == "") {
                                            $avt_image =  '../img/logo_com.png';
                                        }else{
                                            $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_newfeed['author']]['ep_image'];
                                        }
                                    }
                                    if ($row_newfeed['new_type'] == 0) {
                                        $id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $name_employee = $id_user_hide = "";
                                        if (count($id_user_tag) > 0) {
                                            if (count($id_user_tag) - 1 > 0) {
                                                $id_user_hide = ' và ' . (count($id_user_tag) - 1) . ' người khác';
                                            }
                                        }
                                        include '../includes/group/dang_tin.php';
                                    } else if ($row_newfeed['new_type'] == 1) {
                                        include '../includes/group/thong_bao.php';
                                    } else if ($row_newfeed['new_type'] == 2) {
                                        $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $info_employee = getEmployee($arr_id_user_tag[0]);
                                        $name_employee = $info_employee->data->items[0]->ep_name;
                                        if (count($arr_id_user_tag) - 1 > 0) {
                                            $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                        } else {
                                            $id_user_hide = "";
                                        }
                                        include '../includes/group/thanh_vien_moi.php';
                                    } else if ($row_newfeed['new_type'] == 3) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/group/sk_noi_bo.php';
                                    } else if ($row_newfeed['new_type'] == 4) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/group/sk_noi_bo.php';
                                    } else if ($row_newfeed['new_type'] == 5) {
                                        $db_discuss = new db_query("SELECT * FROM discuss WHERE new_id = " . $row_newfeed['new_id']);
                                        $row_discuss = mysql_fetch_array($db_discuss->result);
                                        include '../includes/group/thao_luan.php';
                                    } else if ($row_newfeed['new_type'] == 6) {
                                        include '../includes/group/cs_y_tuong.php';
                                    } else if ($row_newfeed['new_type'] == 7) {
                                        $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $row_newfeed['new_id']);
                                        include '../includes/group/binh_chon.php';
                                    } else if ($row_newfeed['new_type'] == 8) {
                                        $qr_bonus = new db_query("SELECT * FROM bonus WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_bonus = mysql_fetch_array($qr_bonus->result);
                                        $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $info_employee = getEmployee($arr_id_user_tag[0]);
                                        $name_employee = $info_employee->data->items[0]->ep_name;
                                        if (count($arr_id_user_tag) - 1 > 0) {
                                            $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                        } else {
                                            $id_user_hide = "";
                                        }
                                        include '../includes/group/khen_thuong.php';
                                    } else if ($row_newfeed['new_type'] == 9) {
                                        $qr_internal_news = new db_query("SELECT * FROM internal_news WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_internal = mysql_fetch_array($qr_internal_news->result);
                                        include '../includes/group/tin_tuc_noi_bo.php';
                                    }
                                }
                                ?>
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
                                                                <button class="btn_huy btn_huy_xoatatca" type="button">Đóng
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
                                                                            <p><a href="#" download="#">Thongbaochuyendiadiemguixe.docx</a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form_buttom">
                                                                        <button class="btn_huy btn_huy_xoatatca" type="button">Đóng
                                                                        </button>
                                                                        <button class="btn_luu" id="btn_sua_baiviet" type="button">Sửa
                                                                        </button>
                                                                        <div class="cd-popup" id="model_suanhanhbaiviet">
                                                                            <div class="cd_container">
                                                                                <div class="cd_modal">
                                                                                    <div class="cd_modal_header">
                                                                                        <h4 class="name_header">Sửa
                                                                                            thông báo</h4>
                                                                                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                                                                                    </div>
                                                                                    <div class="cd_modal_body">
                                                                                        <form class="" method="" action="">
                                                                                            <div class="form-body">
                                                                                                <div class="form_group">
                                                                                                    <label class="name">Tên
                                                                                                        thông
                                                                                                        báo</label>
                                                                                                    <input type="text" value="" name="txt_quequan" placeholder="V/v Thay đổi địa điểm gửi xe của nhân viên">
                                                                                                </div>
                                                                                                <div class="form_group">
                                                                                                    <label class="name">Nội
                                                                                                        dung thông
                                                                                                        báo</label>
                                                                                                    <input type="text" value="" name="txt_quequan" placeholder="Từ ngày 25.03.2020, tất cả nhân viên...">
                                                                                                </div>
                                                                                                <div class="form_group ">
                                                                                                    <label for="" class="name">Tải
                                                                                                        lên tệp đính
                                                                                                        kèm</label>
                                                                                                    <label for="input_file1">
                                                                                                        <input type="file" name="" class="custom-file-input" multiple>
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div class="form_buttom">
                                                                                                    <button class="btn_huy" type="button">
                                                                                                        Hủy
                                                                                                    </button>
                                                                                                    <button class="btn_luu" type="submit">
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
                                                                        <button class="btn_huy btn_huy_xoatatca" type="button">Đóng
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

                    </div>
                    <!-- end bài viết  -->
                    <!--  Side bar phải -->
                    <div class="side-bar-phai" id="side-bar-phai">
                        <? include('../includes/sidebar_ntl.php'); ?>
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
                                    <div class="new danhsach-nhom page-nhomthaoluan">
                                        <div class="header">
                                            <p>Danh sách nhóm - thảo luận</p>
                                        </div>
                                        <div class="body">
                                            <ul>
                                                <?php
                                                
                                                foreach ($list_department as $dep) {
                                                    if ($dep->dep_id != $id_dep) {
                                                    ?>
                                                        <li class="nhom">
                                                            <a href="<?= rewrite_group_child($dep->dep_id) ?>" class="cont">
                                                                <p style="color: #474747;"><?= $dep->dep_name ?></p>
                                                            </a>
                                                            <div class="img">
                                                                <img src="../img/icon_n.png">
                                                            </div>
                                                        </li>
                                                    <?
                                                    }
                                                }
                                                $db_group = new db_query("SELECT * FROM `group` WHERE id_company = " . $_SESSION['login']['id']);
                                                while ($row_group = mysql_fetch_array($db_group->result)) {
                                                    ?>
                                                    <li class="nhom">
                                                        <a href="<?= rewrite_group($row_group['id']) ?>" class="cont">
                                                            <p style="color: #474747;"><?= $row_group['group_name'] ?></p>
                                                        </a>
                                                        <div class="img">
                                                            <img src="../img/icon_n.png">
                                                        </div>
                                                    </li>
                                                <?php
                                                }
                                                ?>
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
                                                </div>
                                            </div>

                                        </div>
                                        <div class="body">
                                            <div class="container">
                                                <div class="cont">
                                                    <p> Quản trị: <span class="content"><?=$manager_name?></span></p>
                                                </div>
                                                <div class="cont">
                                                    <p> Quản lý trực tiếp: <span class="content"><?=$manager_name?></span></p>
                                                </div>
                                                <!-- <div class="cont">
                                                    <p> Mô tả: <span class=" content mota">Đây là mô tả đây là mô
                                                            tả</span></p>
                                                </div> -->
                                                <div class="cont">
                                                    <?php
                                                    if ($row_group1['group_mode'] == 0) {
                                                        $mode = "Công khai";
                                                    }else{
                                                        $mode = "Riêng tư";
                                                    }
                                                    ?>
                                                    <p> Chế độ nhóm: <span class=" content chedo"><?=$mode?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thanhvien-moi new ">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Thành viên <span>(<?=$total_emp?>)</span></p>
                                            </div>
                                            <div class="phai">
                                                
                                            </div>
                                        </div>
                                        <div class="body v_page_group_member_new">
                                            <?php
                                            for ($i=0; $i < count($id_employee); $i++) { 
                                                if ($data_ep[$id_employee[$i]]->ep_image == "") {
                                                    $img_avt = "../img/avatar_default.png";
                                                }else{
                                                    $img_avt = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$id_employee[$i]]->ep_image;
                                                }
                                            ?>
                                            <div class="img avt v_info_ep">
                                                <img src="<?=$img_avt?>" alt="Ảnh lỗi">
                                                <div class="v_info_ep_div">
                                                    <div class="v_info_ep_div1"><img src="<?=$img_avt?>" alt="Ảnh lỗi" class="v_info_ep_div_img"></div>
                                                    <div>
                                                        <div class="v_info_ep_div_name"><?=$data_ep[$id_employee[$i]]->ep_name?></div>
                                                        <div class="v_info_ep_div_pos">Thành viên</div>
                                                        <div class="v_info_ep_div_id">ID: <?=$data_ep[$id_employee[$i]]->ep_id?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            for ($i=0; $i < count($id_manager); $i++) { 
                                                if ($data_ep[$id_manager[$i]]->ep_image == "") {
                                                    $img_avt = "../img/avatar_default.png";
                                                }else{
                                                    $img_avt = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$id_manager[$i]]->ep_image;
                                                }
                                            ?>
                                            <div class="img avt v_info_ep">
                                                <img src="<?=$img_avt?>" alt="Ảnh lỗi">
                                                <div class="v_info_ep_div">
                                                    <div class="v_info_ep_div1"><img src="<?=$img_avt?>" alt="Ảnh lỗi" class="v_info_ep_div_img"></div>
                                                    <div>
                                                        <div class="v_info_ep_div_name"><?=$data_ep[$id_manager[$i]]->ep_name?></div>
                                                        <div class="v_info_ep_div_pos">Quản trị</div>
                                                        <div class="v_info_ep_div_id">ID: <?=$data_ep[$id_manager[$i]]->ep_id?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../includes/popup_dat.php' ?>
        </div>
    </div>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<?php include('../includes/inc_chat.php') ?>
<script src="../js/select2.min.js"></script>
<script defer type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/caidat.js"></script>
<? include('../includes/popup_nt.php') ?>
<script defer type="text/javascript" src="../js/datjs.js"></script>
<script defer type="text/javascript" src="../js/datvalidate.js"></script>
<script src="/js/trang_chu.js?v=<?= $version ?>"></script>
<script>
    $('.select2_t_company').select2({
        width: '100%',
    })
    $('.select2_muti_tv').select2({
        width: '100%',
        placeholder: 'Dùng @ để thêm thành viên mới',
    })
    $('.select2_muti_td').select2({
        width: '100%',
        placeholder: 'Dùng @ để thêm người theo dõi',
    })
</script>
<script src="/js/page-group.js"></script>
<script src="../js/ttnb_page_group_tl.js"></script>
</html>
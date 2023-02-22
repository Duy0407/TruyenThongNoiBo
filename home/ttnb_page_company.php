<?php
require_once '../includes/check_login.php';
require_once '../includes/check_account.php';
include("config.php");
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';
$title = '';
$key = getValue('key', 'str', 'GET', '');
if ($key != '') {
    $title = $key;
}

// if ($_SESSION['login']['user_type'] == 2) {
//     check_module(2);
// }

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_create = 1;
// }else if(check_module(2)['create'] == 1){
//     $type_create = 1;
// }else{
//     $type_create = 0;
// }

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_delete = 1;
// }else if(check_module(2)['delete'] == 1){
//     $type_delete = 1;
// }else{
//     $type_delete = 0;
// }

$type_create = 1;
$type_delete = 1;
$name_page = "Trang công ty";
$img_sidebar_ntl = '../img/sbp_1.png';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Trang công ty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/tung.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/sidebar_ntl.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ttnb_page_companny.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/update_work.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/in_comment.css?v=<?=$version?>">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <style>
        .active1{
            background: none;
        }
        #nhom-trangcongty{
            display: none !important;
        }
    </style>
</head>

<body class="vid_found">
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
                        <div class="banner page-trangcongty">
                            <?php
                            $db_cover = new db_query("SELECT id, cover_image FROM cover_image_com WHERE id_company = " . $_SESSION['login']['id_com']);
                            if (mysql_num_rows($db_cover->result) == 0) {
                                $cover_image = '../img/banner1.png';
                            } else {
                                $row = mysql_fetch_array($db_cover->result);
                                $cover_image = '../img/cover_image_com/' . $_SESSION['login']['id_com'] . '/' . $row['cover_image'];
                            }
                            ?>
                            <img class="v_ttnb_banner" src="<?= $cover_image ?>">
                            <div class="content">
                                <div class="info-ct">
                                    <div class="img">
                                        <?php
                                        if ($_SESSION['login']['user_type'] == 1) {
                                            $avatar_com = $_SESSION['login']['logo'];
                                        } else {
                                            $avatar_com = 'https://chamcong.24hpay.vn/upload/company/logo/' . array_values($data_ep2)[0]->com_logo;
                                        }
                                        ?>
                                        <img class="ttnb_avatar_com" src="<?= $avatar_com ?>">
                                        <?php
                                        if ($_SESSION['login']['user_type'] == 1) {
                                        ?>
                                        <input type="file" id="v_load_avatar_com" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" onchange="changeImg_anh_dai_dien(this)">
                                        <?php
                                        }else if ($type_create == 1) {
                                        ?>
                                        <input type="file" id="v_load_avatar_com" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" onchange="changeImg_anh_dai_dien(this)">
                                        <?php
                                        }
                                        ?>
                                        <img src="../img/mayanh1.png" class="taianh_avatar_com">
                                    </div>
                                    <div class="cont v_cont_ttnb">
                                        <?php
                                        if ($_SESSION['login']['user_type'] == 1) {
                                            $com_name = $_SESSION['login']['name'];
                                        } else {
                                            $com_name = array_values($data_ep2)[0]->com_name;
                                        }
                                        ?>
                                        <p><?= $com_name ?></p>
                                        <p><?= count($data_ep2) ?> thành viên</p>
                                    </div>
                                </div>
                                <?php
                                    if ($_SESSION['login']['user_type'] == 1) {
                                ?>
                                    <div class="edit-banner">
                                        <div class="img">
                                            <img src="../img/mayanh2.png">
                                        </div>
                                        <div class="cont">
                                            <p>Chỉnh sửa ảnh bìa</p>
                                        </div>
                                    </div>
                                    <input type="file" class="v_load_cover_image" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" onchange="changeImg_anh_bia(this)">
                                <?php
                                    }else if($type_create == 1){
                                ?>
                                    <div class="edit-banner">
                                        <div class="img">
                                            <img src="../img/mayanh2.png">
                                        </div>
                                        <div class="cont">
                                            <p>Chỉnh sửa ảnh bìa</p>
                                        </div>
                                    </div>
                                    <input type="file" class="v_load_cover_image" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" onchange="changeImg_anh_bia(this)">
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <form class="baiviet-search" id="search_newfeed1">
                            <input type="text" name="" id="input_search" value="<?= $title ?>" placeholder="Tìm kiếm bài viết ">
                            <button class="btn_search">
                                <img src="../img/icon_search.png" alt="search">
                            </button>
                        </form>
                        <?php
                        if($type_create == 1){
                        ?>
                            <?php include '../includes/update_work.php';?>
                        <?php
                        }
                        ?>
                        <!--     main-baiviet -->
                        <div id="main-baiviet" class="main-baiviet v_baiviet_trangchu_sdn">
                            <ul class="noidung-st">
                                <?php
                                $dep = $_SESSION['login']['dep_id'];
                                if ($title != '') {
                                    $title = " AND ( new_title like '%" . $title . "%' OR content like '%" . $title . "%') ";
                                }

                                if ($_SESSION['login']['user_type'] == 1) {
                                    $db_newfeed = new db_query("SELECT * FROM new_feed where id_company = $user_id AND ghim = 1 AND `delete` = 0 " . $title . "  ORDER BY new_id DESC");
                                } else {
                                    $db_newfeed = new db_query("SELECT * FROM new_feed where id_company = $user_id AND ghim = 1 AND (position = 0 OR position = $dep ) AND `delete` = 0 " . $title . " ORDER BY new_id DESC");
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
                                        $arr_id_user_tag = [];
                                        if ($row_newfeed['id_user_tags'] != '') {
                                            $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        }
                                        $name_employee = $id_user_hide = '';
                                        if (count($arr_id_user_tag) > 0) {
                                            $name_employee = $arr_ep[$arr_id_user_tag[0]]['ep_name'];
                                            if (count($arr_id_user_tag) - 1 > 0) {
                                                $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                            }
                                        }
                                        include '../includes/truyen_thong_noi_bo/ghim/dang_tin.php';
                                    } else if ($row_newfeed['new_type'] == 1) {
                                        include '../includes/truyen_thong_noi_bo/ghim/thong_bao.php';
                                    } else if ($row_newfeed['new_type'] == 2) {
                                        $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $info_employee = getEmployee($arr_id_user_tag[0]);
                                        $name_employee = $info_employee->data->items[0]->ep_name;
                                        if (count($arr_id_user_tag) - 1 > 0) {
                                            $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                        } else {
                                            $id_user_hide = "";
                                        }
                                        include '../includes/truyen_thong_noi_bo/ghim/thanh_vien_moi.php';
                                    } else if ($row_newfeed['new_type'] == 3) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/truyen_thong_noi_bo/ghim/sk_noi_bo.php';
                                    } else if ($row_newfeed['new_type'] == 4) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/truyen_thong_noi_bo/ghim/sk_doi_ngoai.php';
                                    } else if ($row_newfeed['new_type'] == 5) {
                                        $db_discuss = new db_query("SELECT * FROM discuss WHERE new_id = " . $row_newfeed['new_id']);
                                        $row_discuss = mysql_fetch_array($db_discuss->result);
                                        include '../includes/truyen_thong_noi_bo/ghim/thao_luan.php';
                                    } else if ($row_newfeed['new_type'] == 6) {
                                        include '../includes/truyen_thong_noi_bo/ghim/cs_y_tuong.php';
                                    } else if ($row_newfeed['new_type'] == 7) {
                                        $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $row_newfeed['new_id']);
                                        include '../includes/truyen_thong_noi_bo/ghim/binh_chon.php';
                                    } else if ($row_newfeed['new_type'] == 8) {
                                        $qr_bonus = new db_query("SELECT * FROM bonus WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_bonus = mysql_fetch_array($qr_bonus->result);
                                        $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $info_employee = $data_ep2[$arr_id_user_tag[0]];
                                        $name_employee = $info_employee->ep_name;
                                        if (count($arr_id_user_tag) - 1 > 0) {
                                            $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                        } else {
                                            $id_user_hide = "";
                                        }
                                        include '../includes/truyen_thong_noi_bo/ghim/khen_thuong.php';
                                    } else if ($row_newfeed['new_type'] == 9) {
                                        $qr_internal_news = new db_query("SELECT * FROM internal_news WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_internal = mysql_fetch_array($qr_internal_news->result);
                                        include '../includes/truyen_thong_noi_bo/ghim/tin_tuc_noi_bo.php';
                                    }
                                }
                                ?>
                                <!-- </ul>
                                <ul class="noidung-st"> -->
                                <?php
                                if ($_SESSION['login']['user_type'] == 1) {
                                    $db_newfeed = new db_query("SELECT * FROM new_feed where id_company = $user_id AND ghim = 0 AND `delete` = 0 " . $title . "  ORDER BY new_id DESC");
                                } else {
                                    $db_newfeed = new db_query("SELECT * FROM new_feed where id_company = $user_id AND ghim = 0 AND (position = 0 OR position = $dep ) AND `delete` = 0 " . $title . " ORDER BY new_id DESC");
                                }
                                while ($row_newfeed = mysql_fetch_array($db_newfeed->result)) {
                                    $db_count_like = new db_query("SELECT * FROM `like` WHERE id_new = " . $row_newfeed['new_id']);
                                    $count_like = mysql_num_rows($db_count_like->result);
                                    $db_num_comment = new db_query("SELECT * FROM comment WHERE id_new = " . $row_newfeed['new_id']);
                                    $db_comment = new db_query("SELECT * FROM comment WHERE id_new = " . $row_newfeed['new_id'] . " AND id_parent = 0 ORDER BY id DESC");
                                    $avt_image = '';
                                    $newfeed_name = '';
                                    // if ($row_newfeed['author_type'] == 1) {
                                    //     $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                                    //     $newfeed_name =  $arr_com->com_name;
                                    // } else {
                                    //     $newfeed_name = $arr_ep[$row_newfeed['author']]['ep_name'];
                                    //     $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_newfeed['author']]['ep_image'];
                                    // }
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
                                        $arr_id_user_tag = [];
                                        if ($row_newfeed['id_user_tags'] != '') {
                                            $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        }
                                        $name_employee = $id_user_hide = '';
                                        if (count($arr_id_user_tag) > 0) {
                                            $name_employee = $arr_ep[$arr_id_user_tag[0]]['ep_name'];
                                            if (count($arr_id_user_tag) - 1 > 0) {
                                                $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                            }
                                        }
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/dang_tin.php';
                                    } else if ($row_newfeed['new_type'] == 1) {
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/thong_bao.php';
                                    } else if ($row_newfeed['new_type'] == 2) {
                                        $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $info_employee = getEmployee($arr_id_user_tag[0]);
                                        $name_employee = $info_employee->data->items[0]->ep_name;
                                        if (count($arr_id_user_tag) - 1 > 0) {
                                            $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                        } else {
                                            $id_user_hide = "";
                                        }
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/thanh_vien_moi.php';
                                    } else if ($row_newfeed['new_type'] == 3) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/sk_noi_bo.php';
                                    } else if ($row_newfeed['new_type'] == 4) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/sk_doi_ngoai.php';
                                    } else if ($row_newfeed['new_type'] == 5) {
                                        $db_discuss = new db_query("SELECT * FROM discuss WHERE new_id = " . $row_newfeed['new_id']);
                                        $row_discuss = mysql_fetch_array($db_discuss->result);
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/thao_luan.php';
                                    } else if ($row_newfeed['new_type'] == 6) {
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/cs_y_tuong.php';
                                    } else if ($row_newfeed['new_type'] == 7) {
                                        $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $row_newfeed['new_id']);
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/binh_chon.php';
                                    } else if ($row_newfeed['new_type'] == 8) {
                                        $qr_bonus = new db_query("SELECT * FROM bonus WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_bonus = mysql_fetch_array($qr_bonus->result);
                                        $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $info_employee = $data_ep2[$arr_id_user_tag[0]];
                                        $name_employee = $info_employee->ep_name;
                                        if (count($arr_id_user_tag) - 1 > 0) {
                                            $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                        } else {
                                            $id_user_hide = "";
                                        }
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/khen_thuong.php';
                                    } else if ($row_newfeed['new_type'] == 9) {
                                        $qr_internal_news = new db_query("SELECT * FROM internal_news WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_internal = mysql_fetch_array($qr_internal_news->result);
                                        include '../includes/truyen_thong_noi_bo/khong_ghim/tin_tuc_noi_bo.php';
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
                                            <div class="cd-modal-del chitiet_thongbao">
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
                                            <img src="../img/icon_thungrac.png" class="del_thongbao">
                                            <div class="cd-modal-del xoa_thongbao">
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
                                            <p class="chitiet_tb">Xem chi tiết</p>
                                            <div class="cd-modal-del chitiet_thongbao">
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
                                            <img src="../img/icon_thungrac.png" class="del_thongbao">
                                            <div class="cd-modal-del xoa_thongbao">
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
                                            <p class="chitiet_tb">Xem chi tiết</p>
                                            <div class="cd-modal-del chitiet_thongbao">
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
                                            <img src="../img/icon_thungrac.png" class="del_thongbao">
                                            <div class="cd-modal-del xoa_thongbao">
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
                                            <p class="chitiet_tb">Xem chi tiết</p>
                                            <div class="cd-modal-del chitiet_thongbao">
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
                                            <img src="../img/icon_thungrac.png" class="del_thongbao">
                                            <div class="cd-modal-del xoa_thongbao">
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
                                            <p class="chitiet_tb">Xem chi tiết</p>
                                            <div class="cd-modal-del chitiet_thongbao">
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
                                            <img src="../img/icon_thungrac.png" class="del_thongbao">
                                            <div class="cd-modal-del xoa_thongbao">
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
                                </div>
                            </div>

                        </div>
                </div>
                <!-- end bài viết  -->
                
                <!--  Side bar phải -->
                    <!-- end bài viết  -->
                    <!--  Side bar phải -->
                    <div class="side-bar-phai" id="side-bar-phai">
                        <?
                        include '../includes/sidebar_ntl.php';
                        ?>
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
                                    <div class="sukien new page-trangcongty">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Sự kiện sắp tới</p>
                                            </div>
                                            <!-- <div class="phai">
                                                <a href="/truyen-thong-noi-bo-su-kien.html" class="v_themsukien">Thêm</a>
                                            </div> -->
                                        </div>
                                        <div class="body">
                                            <?php
                                            $time = strtotime(date('d-m-Y'));
                                            $day = strtotime('last day of next month');
                                            $db_event = new db_query("SELECT * FROM new_feed INNER JOIN events ON new_feed.new_id = events.id_new WHERE (new_feed.new_type = 3 OR new_feed.new_type = 4) AND new_feed.id_company = ".$_SESSION['login']['id_com']." AND (`time` >= $time AND `time` <= $day) ORDER BY `time` ASC");
                                            if (mysql_num_rows($db_event->result) == 0) {
                                            ?>
                                            <div class="tren">
                                                Chưa có sự kiện nào
                                            </div>
                                            <?php
                                            }else{
                                                while($row = mysql_fetch_array($db_event->result)){
                                            ?>
                                            <div class="tren">
                                                <p><?=$row['new_title']?></p>
                                                <p><?php
                                                echo date('H',$row['time']) . "h" . date('i',$row['time']) . ' ' . date('d.m.Y',$row['time']);
                                                ?></p>
                                            </div>
                                            <?php
                                                }
                                            }
                                            if (mysql_num_rows($db_event->result) == 0) {
                                            ?>
                                            <div class="duoi">
                                                <span class="v_xemthemsukien v_add_event2">Thêm sự kiện</span>
                                            </div>
                                            <?php
                                            }else{
                                            ?>
                                            <div class="duoi">
                                                <a href="/truyen-thong-noi-bo-su-kien.html" class="v_xemthemsukien">Xem thêm sự kiện</a>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="baiviet-moi new page-trangcongty">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Bài viết đánh dấu mới nhất</p>
                                            </div>
                                        </div>
                                        <?php
                                        $db_newfeed = new db_query("SELECT * FROM new_feed WHERE ghim = 1 AND id_company = $user_id ORDER BY new_id DESC");
                                        if (mysql_num_rows($db_newfeed->result) == 0) {
                                        ?>
                                            <div class="body">
                                                <div class="tren">
                                                    <p>Không có nội dung nào được đánh dấu</p>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            $i = 1;
                                            while ($row_newfeed = mysql_fetch_array($db_newfeed->result)) {
                                                if ($row_newfeed['author_type'] == 1) {
                                                    $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                                                    $newfeed_name =  $arr_com->com_name;
                                                } else {
                                                    $newfeed_name = $arr_ep[$row_newfeed['author']]['ep_name'];
                                                    $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_newfeed['author']]['ep_image'];
                                                }
                                            ?>
                                                <div class="v_post_ghim01">
                                                    <div class="v_post_ghim01_detail">
                                                        <img class="img_bai_viet_ghim" src="<?= $avt_image ?>">
                                                        <div class="v_post_ghim01_content">
                                                            <p class="v_post_ghim01_name"><?= $newfeed_name ?></p>
                                                            <p class="v_post_ghim01_time"><?= date("H:i d/m/Y", $row_newfeed['created_at']) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="v_post_ghim01_content02">
                                                        <?= $row_newfeed['new_title'] ?>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($i < mysql_num_rows($db_newfeed->result)) {
                                                ?>
                                                    <hr class="v_post_ghim01_hr">
                                                <?php
                                                }
                                                ?>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="thongbao-moi new page-trangcongty">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Thông báo mới</p>
                                            </div>
                                            <div class="phai">
                                                <p id="tao_thongbao">Thêm</p>
                                            </div>
                                        </div>
                                        <div class="body v_body_notify">
                                            <?php 
                                                $id_com = $_SESSION['login']['id_com'];
                                                $db_notify = new db_query("SELECT * FROM new_feed WHERE new_type = 1 AND id_company = $id_com ORDER BY new_id DESC LIMIT 0,3");

                                                while ($row_notify = mysql_fetch_array($db_notify->result)) {
                                            ?>
                                            <div class="tren v_tren_notify00">
                                                <p>Thông báo: <?=$row_notify['new_title']?></p>
                                                <p><?php echo date('H', $row_notify['created_at']) . "h" . date('i d.m.Y', $row_notify['created_at'])?></p>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if (mysql_num_rows($db_notify->result) > 3) {
                                            ?>
                                            <div class="duoi">
                                                <p id="xemthongbao2">Xem thêm thông báo</p>
                                            </div>
                                            <?php
                                            }else{
                                            ?>
                                            <div class="duoi">
                                                <p id="hetthongbao">Hết thông báo</p>
                                            </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="thanhvien-moi new " style="display: none;">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Thành viên <span>(24)</span></p>
                                            </div>
                                            <div class="phai">
                                                <p>Thêm</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="img dropdown">
                                                <div class="avt dropbtn avt1">
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
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <?php include '../includes/popup_dat.php' ?>
            <?php include '../includes/tung_popup.php' ?>
        </div>
    </div>
</body>
<?php include('../includes/inc_chat.php') ?>
<script src="../js/select2.min.js"></script>
<script defer type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/caidat.js"></script>
<? include('../includes/popup_nt.php') ?>
<script defer type="text/javascript" src="../js/datjs.js"></script>
<script defer type="text/javascript" src="../js/datvalidate.js"></script>
<script type="text/javascript" src="../js/trang_chu.js"></script>
<script>
    $(document).ready(function() {
        $("#search_newfeed1").submit(function() {
            var search = $.trim($('#input_search').val());
            if (search != '') {
                window.location.href = '/truyen-thong-noi-bo-cong-ty.html?key=' + search;
            } else {
                window.location.href = '/truyen-thong-noi-bo-cong-ty.html';
            }
            return false;
        });
    });
    $('.edit-banner').click(function() {
        $('.v_load_cover_image').click();
    });

    function changeImg_anh_bia(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.v_ttnb_banner').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            var form_data = new FormData();
            form_data.append('image', $('.v_load_cover_image').prop('files')[0]);
            $.ajax({
                type: "POST",
                url: "../ajax/update_cover_image_com.php",
                data: form_data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {

                }
            });
        }
    }
    $(".taianh_avatar_com").click(function() {
        $("#v_load_avatar_com").click();
    });

    function changeImg_anh_dai_dien(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.ttnb_avatar_com').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            var form_data = new FormData();
            form_data.append('image', $('#v_load_avatar_com').prop('files')[0]);
            $.ajax({
                type: "POST",
                url: "../ajax/avatar_com.php",
                data: form_data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.result == true) {
                        window.location.href = window.location.href;
                    }
                }
            });
        }
    }
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
    $('.active2').css('background', ' #2E3994');
</script>
<script src="../js/sukien_quanly.js"></script>
</html>
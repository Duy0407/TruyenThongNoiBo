<?php
include("config.php");
require_once '../includes/check_login.php';
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';
require_once '../includes/check_account.php';
$title = '';
$new_id = getValue('new_id', 'int', 'key', '');
if ($new_id == 0) {
    header('location:/quan-ly-chung.html');
}else{
    $db_new = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
    if (mysql_num_rows($db_new->result) == 0) {
        header('location:/quan-ly-chung.html');
    }else{
        $row_new = mysql_fetch_array($db_new->result);
        if ($row_new['file'] == "") {
            header('location:/quan-ly-chung.html');
        }else{
            $arr_new = explode("||", $row_new['file']);
            $check = 0;
            for ($i=0; $i < count($arr_new); $i++) { 
                if (preg_match('/image/', $arr_new[$i]) == true || preg_match('/video/', $arr_new[$i]) == true) {
                    $check++;
                }
            }
            if ($check == 0) {
                header('location:/quan-ly-chung.html');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Chi tiết tin đăng</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/select2.min.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/slick.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/slick-theme.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/tung.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/in_comment.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/chi_tiet_bai_dang.css?v=<?=$version?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="thongbao_tinnhan">
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
                    <div class="baiviet">
                        <div id="main-baiviet" class="main-baiviet v_baiviet_trangchu_sdn">
                            <ul class="noidung-st" id="v_content_index">
                                <?php
                                $db_newfeed = new db_query("SELECT * FROM new_feed where new_id = $new_id ORDER BY new_id DESC");
                                while ($row_newfeed = mysql_fetch_array($db_newfeed->result)) {
                                    if ($row_newfeed['delete'] == 1) {
                                        header("Location: /quan-ly-chung.html");
                                    }
                                    $db_count_like = new db_query("SELECT * FROM `like` WHERE id_new = " . $row_newfeed['new_id']);
                                    $count_like = mysql_num_rows($db_count_like->result);
                                    $db_num_comment = new db_query("SELECT * FROM comment WHERE id_new = " . $row_newfeed['new_id']);
                                    $db_comment = new db_query("SELECT * FROM comment WHERE id_new = " . $row_newfeed['new_id'] . " AND id_parent = 0 ORDER BY id DESC");
                                    $avt_image = '';
                                    $newfeed_name = '';
                                    if ($row_newfeed['author_type'] == 1) {
                                        $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                                        $newfeed_name =  $arr_com->com_name;
                                    } else {
                                        $newfeed_name = $arr_ep[$row_newfeed['author']]['ep_name'];
                                        $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_newfeed['author']]['ep_image'];
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
                                        include '../includes/chi_tiet_bai_dang/dang_tin.php';
                                    } else if ($row_newfeed['new_type'] == 1) {
                                        include '../includes/chi_tiet_bai_dang/thong_bao.php';
                                    } else if ($row_newfeed['new_type'] == 2) {
                                        $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $info_employee = getEmployee($arr_id_user_tag[0]);
                                        $name_employee = $info_employee->data->items[0]->ep_name;
                                        if (count($arr_id_user_tag) - 1 > 0) {
                                            $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                        } else {
                                            $id_user_hide = "";
                                        }
                                        include '../includes/chi_tiet_bai_dang/thanh_vien_moi.php';
                                    } else if ($row_newfeed['new_type'] == 3) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/chi_tiet_bai_dang/sk_noi_bo.php';
                                    } else if ($row_newfeed['new_type'] == 4) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/chi_tiet_bai_dang/sk_doi_ngoai.php';
                                    } else if ($row_newfeed['new_type'] == 5) {
                                        $db_discuss = new db_query("SELECT * FROM discuss WHERE new_id = " . $row_newfeed['new_id']);
                                        $row_discuss = mysql_fetch_array($db_discuss->result);
                                        include '../includes/chi_tiet_bai_dang/thao_luan.php';
                                    } else if ($row_newfeed['new_type'] == 6) {
                                        include '../includes/chi_tiet_bai_dang/cs_y_tuong.php';
                                    } else if ($row_newfeed['new_type'] == 7) {
                                        $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $row_newfeed['new_id']);
                                        include '../includes/chi_tiet_bai_dang/binh_chon.php';
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
                                        include '../includes/chi_tiet_bai_dang/khen_thuong.php';
                                    } else if ($row_newfeed['new_type'] == 9) {
                                        $qr_internal_news = new db_query("SELECT * FROM internal_news WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_internal = mysql_fetch_array($qr_internal_news->result);
                                        include '../includes/chi_tiet_bai_dang/tin_tuc_noi_bo.php';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- end bài viết  -->
                </div>
            </div>
            <?php include '../includes/popup_dat.php' ?>
            <? include('../includes/popup_nt.php') ?>
        </div>
    </div>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script src="../js/select2.min.js"></script>
<?php include('../includes/inc_chat.php') ?>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $(".v_anh_div").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev"><img src="../img/v_detail_newfeed_preview.svg" alt="Ảnh lỗi"></button>',
            nextArrow: '<button type="button" class="slick-next"><img src="../img/v_detail_newfeed_next.svg" alt="Ảnh lỗi"></button>'
        });

        $(".v_newfeed_file_div1").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev" style="z-index:2"><img src="../img/v_detail_newfeed_preview.svg" alt="Ảnh lỗi"></button>',
            nextArrow: '<button type="button" class="slick-next" style="z-index:2"><img src="../img/v_detail_newfeed_next.svg" alt="Ảnh lỗi"></button>'
        });
    });
</script>
<script type="text/javascript" src="../js/caidat.js"></script>
<script type="text/javascript" src="../js/datjs.js"></script>
<script type="text/javascript" src="../js/datvalidate.js"></script>
<script type="text/javascript" src="../js/trang_chu.js"></script>
</html>
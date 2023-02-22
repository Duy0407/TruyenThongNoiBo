<?php
include("config.php");
require_once '../includes/check_login.php';
require_once '../includes/check_account.php';
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';
check_user_company();
$title = '';
$key = getValue('key', 'str', 'key', '');
if ($key != '') {
    $title = $key;
}
$type_create = 1;
$type_delete = 1;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Quản lý chung</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/reset.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/quan_ly_chung.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/update_work.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/in_comment.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?= $version ?>">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../ckeditor/ckeditor.js?v=<?=$version?>"></script>
</head>

<body class="vid_found">
    <?php include '../includes/see_image.php' ?>
    <div id="thongbao_tinnhan">
        <div class="wapper">
            <!--  sidebar -->
            <?php include '../includes/cd_sidebar.php' ?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!-- header -->
                <?php
                include '../includes/cd_header.php'
                ?>
                <!-- end header -->
                <!--  center -->
                <div id="center">
                    <!--  bài viết-->
                    <div class="baiviet">
                        <form class="baiviet-search" id="search_ttnb">
                            <input type="text" name="" id="input_search" value="<?= $title ?>" placeholder="Tìm kiếm bài viết">
                            <button class="btn_search v_ttsdn_btn_search">
                                <img src="../img/icon_search.png" alt="search">
                            </button>
                        </form>
                        <? include '../includes/update_work.php'; ?>
                        <div id="main-baiviet" class="main-baiviet v_baiviet_trangchu_sdn">
                            <ul class="noidung-st" id="v_content_index">
                                <?php
                                $dep = $_SESSION['login']['dep_id'];
                            
                                if ($title != '') {
                                    $title = " AND ( new_title like '%" . $title . "%' OR content like '%" . $title . "%') ";
                                }
                                
                                $db_newfeed = new db_query("SELECT * FROM new_feed where id_company = " . $_SESSION['login']['id_com'] . " AND `delete` = 0 " . $title . " ORDER BY new_id DESC LIMIT 0,10");

                                while ($row_newfeed = mysql_fetch_array($db_newfeed->result)) {
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
                                        if ($row_newfeed['id_user_tags'] != '') { $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']); }
                                        $name_employee = $id_user_hide = '';
                                        if (count($arr_id_user_tag) > 0) {
                                            $name_employee = $arr_ep[$arr_id_user_tag[0]]['ep_name'];
                                            if (count($arr_id_user_tag) - 1 > 0) { $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác'; }
                                        }
                                        include '../includes/trang_chu_sdn/dang_tin.php';
                                    } else if ($row_newfeed['new_type'] == 1) {
                                        include '../includes/trang_chu_sdn/thong_bao.php';
                                    } else if ($row_newfeed['new_type'] == 2) {
                                        $arr_id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $info_employee = getEmployee($arr_id_user_tag[0]);
                                        $name_employee = $info_employee->data->items[0]->ep_name;
                                        if (count($arr_id_user_tag) - 1 > 0) {
                                            $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác';
                                        } else {
                                            $id_user_hide = "";
                                        }
                                        include '../includes/trang_chu_sdn/thanh_vien_moi.php';
                                    } else if ($row_newfeed['new_type'] == 3) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/trang_chu_sdn/sk_noi_bo.php';
                                    } else if ($row_newfeed['new_type'] == 4) {
                                        $db_event = new db_query("SELECT * FROM events WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_event = mysql_fetch_array($db_event->result);
                                        include '../includes/trang_chu_sdn/sk_doi_ngoai.php';
                                    } else if ($row_newfeed['new_type'] == 5) {
                                        $db_discuss = new db_query("SELECT * FROM discuss WHERE new_id = " . $row_newfeed['new_id']);
                                        $row_discuss = mysql_fetch_array($db_discuss->result);
                                        include '../includes/trang_chu_sdn/thao_luan.php';
                                    } else if ($row_newfeed['new_type'] == 6) {
                                        include '../includes/trang_chu_sdn/cs_y_tuong.php';
                                    } else if ($row_newfeed['new_type'] == 7) {
                                        $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_vote2 = mysql_fetch_array($db_vote->result);
                                        if ($row_vote2['time']  > time()) {
                                            include '../includes/trang_chu_sdn/binh_chon.php';
                                        }
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
                                        include '../includes/trang_chu_sdn/khen_thuong.php';
                                    } else if ($row_newfeed['new_type'] == 9) {
                                        $qr_internal_news = new db_query("SELECT * FROM internal_news WHERE id_new = " . $row_newfeed['new_id']);
                                        $row_internal = mysql_fetch_array($qr_internal_news->result);
                                        include '../includes/trang_chu_sdn/tin_tuc_noi_bo.php';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- end bài viết  -->

                    <!--  Side bar phải -->
                    <div class="side-bar-phai" id="side-bar-phai">
                        <div class="side-bar-phai-tren">
                            <?php
                            $today = time();
                            $db_event = new db_query("SELECT * FROM new_feed INNER JOIN events ON new_feed.new_id = events.id_new WHERE (new_feed.new_type = 3 OR new_feed.new_type = 4) AND new_feed.id_company = " . $_SESSION['login']['id_com'] . " AND new_feed.delete = 0 AND events.time > $today ORDER BY new_feed.new_id DESC LIMIT 0,3");
                            if (mysql_num_rows($db_event->result) == 0) {
                                echo "Chưa có sự kiện";
                            } else {
                                while ($row_event = mysql_fetch_array($db_event->result)) {
                            ?>
                                    <div class="info-sbp">
                                        <div class="tren">
                                            <p>Sự kiện sắp tới</p>
                                            <p><?= $row_event['new_title'] ?> </p>
                                        </div>
                                        <div class="duoi">
                                            <p class="ngay"><?= date("H:i d.m.Y", $row_event['time']) ?></p>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../includes/popup_dat.php' ?>
            <?php include '../includes/tung_popup.php' ?>
            <?php include '../includes/popup_nt.php' ?>
        </div>
    </div>
    <div id="room">qlc_<?= $_SESSION['login']['id_com'] ?></div>
</body>
<script type="text/javascript" src="../js/select2.min.js" defer></script>
<?php include('../includes/inc_chat.php') ?>
<script type="text/javascript" src="../js/jquery.validate.min.js" defer></script>
<script type="text/javascript" src="../js/caidat.js" defer></script>
<script type="text/javascript" src="../js/datjs.js" defer></script>
<script type="text/javascript" src="../js/datvalidate.js" defer></script>
<script type="text/javascript" src="../js/trang_chu.js" defer></script>
<script type="text/javascript" src="../js/validate_sukien.js" defer></script>
<script type="text/javascript" src="../js/sukien_quanly.js" defer></script>


</html>
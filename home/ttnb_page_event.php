<?php 
include("config.php");
require_once '../includes/check_login.php';
require_once '../api/api_ct.php';

$key_event = getValue('k','str','GET','');

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

$type_delete = 1;
$type_create = 1;

$name_page = "Sự kiện";
$img_sidebar_ntl = '../img/sbp_4.png';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Sự kiện</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/tung.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/ttnb_page_companny.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/sidebar_ntl.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ttnb_page_event.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <style>
        #sukien{
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
                <div id="tg_center">
                    <div id="center">
                        <!--  bài viết-->
                        <div class="baiviet ttnb_baiviet">
                            <?php include '../includes/tung_truyenthongnb_baibai.php' ?>
                        </div>
                        <!-- end bài viết  -->
                        <!--  Side bar phải -->
                        <div class="side-bar-phai" id="side-bar-phai">
                        <?
                        include '../includes/sidebar_ntl.php';
                        ?>
                            <!-- <div class="img nut-hientrang">
                            <img id="icon-menu" src="../img/icon_menu.png">
                        </div> -->
                            <div class="trang">
                                <div class="icon-menu">
                                    <div class="container" id="hien-trang">
                                        <div class=" icon-trong">
                                            <div class="img">
                                                <img id="icon-quayve" src="../img/icon_menu.png">
                                            </div>
                                        </div>
                                        <?php include '../includes/tung_truyenthongnb_sidebar.php' ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Side bar phải -->
                    </div>
                </div>
                <!--end  popup tin nhắn trong center -->
            </div>
            <!--end Side bar phải -->

        </div>
        <!--modol tao thao luan -->
    </div>
    <!--end popup tạo tin tức nội bộ  -->
    <?php include '../includes/tung_popup.php' ?>
    <? include('../includes/popup_nt.php') ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<?php include('../includes/inc_chat.php') ?>
<script src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/caidat.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/sukien_quanly.js"></script>
<script src="../js/validate_sukien.js"></script>
<script>
    $('.select2_t_company').select2({
        width: '100%',
    });
    $('.select2_muti_tv').select2({
        width: '100%',
        placeholder: 'Mời thành viên tham gia'
    });
</script>
<script type="text/javascript">
    $('.active2').css('background', ' #2E3994');
</script>

</html>
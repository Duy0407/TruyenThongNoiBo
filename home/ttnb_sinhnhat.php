<?php 
include("config.php");
require_once '../includes/check_login.php';
require_once '../includes/check_account.php';
require_once '../api/api_nv.php';
$today = date('m/d/Y', time());
$today_str = strtotime($today);

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

$name_page = "Sinh nhật";
$img_sidebar_ntl = '../img/sbp_3.png';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Sinh nhật</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ttnb_sinhnhat.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <style>
        #page-sn{
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
                    <div class="baiviet">
                        <div class="main-baiviet main-baiviet-sinhnhat v_baiviet_trangchu_sdn">
                            <ul class="noidung-st">
                                <li class="sinhnhat-homnay sinhnhat">
                                    <?php
                                    $i = 0;
                                    foreach ($data_ep2 as $key => $value) {
                                        $birth_str = strtotime($data_ep2[$key]->ep_birth_day);
                                        if (date('d', $birth_str) == date('d', $today_str) && date('m', $birth_str) == date('m', $today_str)) {
                                            $db_check = new db_query("SELECT * FROM notify WHERE id_user_tag = " . $data_ep2[$key]->ep_id . " AND id_company = " . $_SESSION['login']['id_com']);
                                            if (mysql_num_rows($db_check->result) == 0) {
                                                $i++;
                                            }
                                        }
                                    }
                                    if ($i == 0) {
                                        $style = 'border-bottom: none;'; 
                                    }else{
                                        $style = '';
                                    }
                                    ?>
                                    <div class="header" style="<?=$style?>">
                                        <div class="title">
                                            <p>Sinh nhật vào hôm nay (<?= $i ?>)</p>
                                        </div>
                                        <div class="time">
                                            <p><?php
                                                echo date('d', time()) . ' tháng ' . date('m', time()) . ' , ' . date('Y', time());
                                                ?></p>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="ngaythang">
                                            <div class="container-snnv">
                                                <?php
                                                if ($_SESSION['login']['user_type'] == 1) {
                                                    $id_user = $_SESSION['login']['id'];
                                                }else{
                                                    $id_user = $data_ep2[$_SESSION['login']['id']]->ep_id;
                                                }
                                                foreach ($data_ep2 as $key => $value) {
                                                    $birth_str = strtotime($data_ep2[$key]->ep_birth_day);
                                                    if (date('d', $birth_str) == date('d', $today_str) && date('m', $birth_str) == date('m', $today_str)) {
                                                        $db_check = new db_query("SELECT * FROM notify WHERE id_user = $id_user AND id_user_tag = " . $data_ep2[$key]->ep_id . " AND id_company = " . $_SESSION['login']['id_com']);
                                                       
                                                        if (mysql_num_rows($db_check->result) == 0) {
                                                ?>
                                                        <div class="container-sn">
                                                            <div class="avt avt03">
                                                                <?php
                                                                $image_avatar = $data_ep2[$key]->ep_image;
                                                                if ($image_avatar == '') {
                                                                    $image_avatar = '../img/avatar_default.png';
                                                                } else {
                                                                    $image_avatar = $data_ep2[$key]->ep_image;
                                                                }
                                                                ?>
                                                                <img src="<?= $image_avatar ?>">
                                                            </div>
                                                            <div class="cont v_cont_sinhnhat">
                                                                <div class="content content02 v_sinhnhat_info03">
                                                                    <div class="info info02 v_sinhnhat_info_detail02">
                                                                        <p><?= $data_ep2[$key]->ep_name ?></p>
                                                                        <p><?= $data_ep2[$key]->dep_name ?></p>
                                                                    </div>
                                                                    <div class="tuoi">
                                                                        <p><?php
                                                                            echo date('Y', $today_str) - date('Y', $birth_str);
                                                                            ?> tuổi</p>
                                                                    </div>
                                                                </div>
                                                                    <form class="chuc" data-id="<?=$data_ep2[$key]->ep_id?>">
                                                                        <input type="text" class="input_loi_chuc v_content" name="" placeholder="Gửi lời chúc mừng sinh nhật đến người ấy" class="v_content">
                                                                        <span class="see_chuc"></span>
                                                                        <button class="chuc_btn"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                                                                    </form>
                                                            </div>
                                                        </div>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="sinhnhat-ganday sinhnhat">
                                <?php
                                    $yesterday_str = $today_str - 86400;
                                    $yesterday_str2 = $today_str - 86400*2;
                                    $i = 0;
                                    foreach ($data_ep2 as $key => $value) {
                                        $birth_str = strtotime($data_ep2[$key]->ep_birth_day);
                                        if (date('d', $birth_str) == date('d', $yesterday_str) && date('m', $birth_str) == date('m', $yesterday_str) || date('d', $birth_str) == date('d', $yesterday_str2) && date('m', $birth_str) == date('m', $yesterday_str2)) {
                                            $db_check = new db_query("SELECT * FROM notify WHERE id_user_tag = " . $data_ep2[$key]->ep_id ." AND id_company = " . $_SESSION['login']['id_com']);
                                            if (mysql_num_rows($db_check->result) == 0) {
                                                $i++;
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="header">
                                        <div class="title">
                                            <p>Sinh nhật gần đây (<?=$i?>)</p>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="ngaythang">
                                            <div class="cont">
                                                <p><?php
                                                echo date('d',$yesterday_str) . ' tháng ' . date('m',$yesterday_str) . ', ' . date('Y',$yesterday_str);
                                                ?></p>
                                            </div>
                                            <div class="container-snnv">
                                            <?php
                                                foreach ($data_ep2 as $key => $value) {
                                                    $birth_str = strtotime($data_ep2[$key]->ep_birth_day);
                                                    if (date('d', $birth_str) == date('d', $yesterday_str) && date('m', $birth_str) == date('m', $yesterday_str)) {
                                                        $db_check = new db_query("SELECT * FROM notify WHERE id_user_tag = " . $data_ep2[$key]->ep_id ." AND id_company = " . $_SESSION['login']['id_com']);
                                                        if (mysql_num_rows($db_check->result) == 0) {
                                                ?>
                                                        <div class="container-sn">
                                                            <div class="avt avt03">
                                                                <?php
                                                                $image_avatar = $data_ep2[$key]->ep_image;
                                                                if ($image_avatar == '') {
                                                                    $image_avatar = '../img/avatar_default.png';
                                                                } else {
                                                                    $image_avatar = $data_ep2[$key]->ep_image;
                                                                }
                                                                ?>
                                                                <img src="<?= $image_avatar ?>">
                                                            </div>
                                                            <div class="cont v_cont_sinhnhat">
                                                                <div class="content content02 v_sinhnhat_info03">
                                                                    <div class="info info02 v_sinhnhat_info_detail02">
                                                                        <p><?= $data_ep2[$key]->ep_name ?></p>
                                                                        <p><?= $data_ep2[$key]->dep_name ?></p>
                                                                    </div>
                                                                    <div class="tuoi">
                                                                        <p><?php
                                                                            echo date('Y', $yesterday_str) - date('Y', $birth_str);
                                                                            ?> tuổi</p>
                                                                    </div>
                                                                </div>
                                                                <form class="chuc" data-id="<?=$data_ep2[$key]->ep_id?>">
                                                                    <input type="text" name="" placeholder="Gửi lời chúc mừng sinh nhật đến người ấy" class="v_content">
                                                                    <span class="see_chuc"></span>
                                                                    <button class="chuc_btn"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="ngaythang">
                                            <div class="cont">
                                                <p> <?php
                                                echo date('d',$yesterday_str2) . ' tháng ' . date('m',$yesterday_str2) . ', ' . date('Y',$yesterday_str2);
                                                ?></p>
                                            </div>
                                            <div class="container-snnv">
                                            <?php
                                                foreach ($data_ep2 as $key => $value) {
                                                    $birth_str = strtotime($data_ep2[$key]->ep_birth_day);
                                                    if (date('d', $birth_str) == date('d', $yesterday_str2) && date('m', $birth_str) == date('m', $yesterday_str2)) {
                                                        $db_check = new db_query("SELECT * FROM notify WHERE id_user_tag = " . $data_ep2[$key]->ep_id ." AND id_company = " . $_SESSION['login']['id_com']);
                                                        if (mysql_num_rows($db_check->result) == 0) {
                                                ?>
                                                        <div class="container-sn">
                                                            <div class="avt avt03">
                                                                <?php
                                                                $image_avatar = $data_ep2[$key]->ep_image;
                                                                if ($image_avatar == '') {
                                                                    $image_avatar = '../img/avatar_default.png';
                                                                } else {
                                                                    $image_avatar = $data_ep2[$key]->ep_image;
                                                                }
                                                                ?>
                                                                <img src="<?= $image_avatar ?>">
                                                            </div>
                                                            <div class="cont v_cont_sinhnhat">
                                                                <div class="content content02 v_sinhnhat_info03">
                                                                    <div class="info info02 v_sinhnhat_info_detail02">
                                                                        <p><?= $data_ep2[$key]->ep_name ?></p>
                                                                        <p><?= $data_ep2[$key]->dep_name ?></p>
                                                                    </div>
                                                                    <div class="tuoi">
                                                                        <p><?php
                                                                            echo date('Y', $yesterday_str2) - date('Y', $birth_str);
                                                                            ?> tuổi</p>
                                                                    </div>
                                                                </div>
                                                                <form class="chuc" data-id="<?=$data_ep2[$key]->ep_id?>">
                                                                    <input type="text" name="" placeholder="Gửi lời chúc mừng sinh nhật đến người ấy" class="v_content">
                                                                    <span class="see_chuc"></span>
                                                                    <button class="chuc_btn">Lưu</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="sinhnhat-saptoi sinhnhat">
                                    <?php
                                        $tomorrow = $today_str + 86400;
                                        $tomorrow2 = $today_str + 86400*2;
                                        $i = 0;
                                        foreach ($data_ep2 as $key => $value) {
                                            $birth_str = strtotime($data_ep2[$key]->ep_birth_day);
                                            if (date('d', $birth_str) == date('d', $tomorrow) && date('m', $birth_str) == date('m', $tomorrow) || date('d', $birth_str) == date('d', $tomorrow) && date('m', $birth_str) == date('m', $tomorrow)) {
                                                $i++;
                                            }
                                        }
                                    ?>
                                    <div class="header">
                                        <div class="title">
                                            <p>Sinh nhật sắp tới (<?=$i?>)</p>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="ngaythang">
                                            <div class="cont">
                                                <p><?php
                                                echo date('d',$tomorrow) . ' tháng ' . date('m',$tomorrow) . ', ' . date('Y',$tomorrow);
                                                ?></p>
                                            </div>
                                            <div class="container-snnv">
                                            <?php
                                                foreach ($data_ep2 as $key => $value) {
                                                    $birth_str = strtotime($data_ep2[$key]->ep_birth_day);
                                                    if (date('d', $birth_str) == date('d', $tomorrow) && date('m', $birth_str) == date('m', $tomorrow)) {
                                                ?>
                                                        <div class="container-sn">
                                                            <div class="avt avt03">
                                                                <?php
                                                                $image_avatar = $data_ep2[$key]->ep_image;
                                                                if ($image_avatar == '') {
                                                                    $image_avatar = '../img/avatar_default.png';
                                                                } else {
                                                                    $image_avatar = $data_ep2[$key]->ep_image;
                                                                }
                                                                ?>
                                                                <img src="<?= $image_avatar ?>">
                                                            </div>
                                                            <div class="cont v_cont_sinhnhat">
                                                                <div class="content content02 v_sinhnhat_info03">
                                                                    <div class="info info02 v_sinhnhat_info_detail02">
                                                                        <p><?= $data_ep2[$key]->ep_name ?></p>
                                                                        <p><?= $data_ep2[$key]->dep_name ?></p>
                                                                    </div>
                                                                    <div class="tuoi">
                                                                        <p><?php
                                                                            echo date('Y', $tomorrow) - date('Y', $birth_str);
                                                                            ?> tuổi</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="ngaythang">
                                            <div class="cont">
                                                <p> <?php
                                                echo date('d',$tomorrow2) . ' tháng ' . date('m',$tomorrow2) . ', ' . date('Y',$tomorrow2);
                                                ?></p>
                                            </div>
                                            <div class="container-snnv">
                                            <?php
                                                foreach ($data_ep2 as $key => $value) {
                                                    $birth_str = strtotime($data_ep2[$key]->ep_birth_day);
                                                    if (date('d', $birth_str) == date('d', $tomorrow2) && date('m', $birth_str) == date('m', $tomorrow2)) {
                                                ?>
                                                        <div class="container-sn">
                                                            <div class="avt avt03">
                                                                <?php
                                                                $image_avatar = $data_ep2[$key]->ep_image;
                                                                if ($image_avatar == '') {
                                                                    $image_avatar = '../img/avatar_default.png';
                                                                } else {
                                                                    $image_avatar = $data_ep2[$key]->ep_image;
                                                                }
                                                                ?>
                                                                <img src="<?= $image_avatar ?>">
                                                            </div>
                                                            <div class="cont v_cont_sinhnhat">
                                                                <div class="content content02 v_sinhnhat_info03">
                                                                    <div class="info info02 v_sinhnhat_info_detail02">
                                                                        <p><?= $data_ep2[$key]->ep_name ?></p>
                                                                        <p><?= $data_ep2[$key]->dep_name ?></p>
                                                                    </div>
                                                                    <div class="tuoi">
                                                                        <p><?php
                                                                            echo date('Y', $tomorrow2) - date('Y', $birth_str);
                                                                            ?> tuổi</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
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
                                    <div class="sb-sinhnhat page-sinhnhat new">
                                        <div class="header">
                                            <div class="cont v_sb_sinhnhat_new">
                                                <p>Tháng <?=date('m', $today_str)?>, <?=date('Y', $today_str)?></p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <?php
                                            $i = 0;
                                            $name_string = "";
                                            $data_birth1 = []; 
                                            foreach ($data_ep2 as $key => $value) {
                                                $month_str = strtotime($data_ep2[$key]->ep_birth_day);
                                                if (date('m', $month_str) == date('m',$today_str)) {
                                                    $i++;
                                                    if ($i  < 2) {
                                                        $name_string = $name_string . $data_ep2[$key]->ep_name . ", ";
                                                    }else if ($i == 2) {
                                                        $name_string = $name_string . $data_ep2[$key]->ep_name;
                                                    }
                                                    $data_birth1[] = $data_ep2[$key];
                                                }
                                            }
                                            if ($i == 0) {
                                            ?>
                                            <div>Không có dữ liệu</div>
                                            <?php
                                            }else{
                                                if ($i > 2) {
                                                    $j = "và " . ($i - 2) . " người khác";
                                                }else if($i <= 2){
                                                    $j = "";
                                                }
                                            ?>
                                            <div class="cont v_sb_sinhnhat_new">
                                                <span><?=$name_string?></span> <span><?=$j?></span>
                                            </div>
                                            <div class="container-avt">
                                                <?php 
                                                for ($i=0; $i < count($data_birth1); $i++) { 
                                                    if ($data_birth1[$i]->ep_image == "") {
                                                        $image_ep = '../img/avatar_default.png';
                                                    }else{
                                                        $image_ep = 'https://chamcong.24hpay.vn/upload/employee/' . $data_birth1[$i]->ep_image;
                                                    }
                                                ?>
                                                <div class="img avt">
                                                    <img class="avt_sinhnhat" src="<?=$image_ep?>" alt="Ảnh lỗi">
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="sb-sinhnhat page-sinhnhat new">
                                        <div class="header">
                                            <div class="cont v_sb_sinhnhat_new">
                                                <?php
                                                if (date('m', $today_str) == 12) {
                                                    $month = 1;
                                                    $year = date('Y', $today_str) + 1;
                                                }else{
                                                    $month = date('m', $today_str) + 1;
                                                    $year = date('Y', $today_str);
                                                }
                                                ?>
                                                <p>Tháng <?=$month?>, <?=$year?></p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <?php
                                            $i = 0;
                                            $name_string = "";
                                            $data_birth1 = []; 
                                            foreach ($data_ep2 as $key => $value) {
                                                $month_str = strtotime($data_ep2[$key]->ep_birth_day);
                                                if (date('m', $month_str) == $month) {
                                                    $i++;
                                                    $data_birth1[] = $data_ep2[$key];
                                                }
                                            }
                                            for ($k=0; $k < count($data_birth1); $k++) { 
                                                if (count($data_birth1) == 1) {
                                                    $name_string = $name_string . $data_birth1[$k]->ep_name;
                                                }else{
                                                    if ($k < 1) {
                                                        $name_string = $name_string . $data_birth1[$k]->ep_name . ", ";
                                                    }else if ($k == 1) {
                                                        $name_string = $name_string . $data_birth1[$k]->ep_name;
                                                    }
                                                }
                                            }
                                            if ($i == 0) {
                                            ?>
                                            <div>Không có dữ liệu</div>
                                            <?php
                                            }else{
                                                if ($i > 2) {
                                                    $j = "và " . ($i - 2) . " người khác";
                                                }else if($i <= 2){
                                                    $j = "";
                                                }
                                            ?>
                                            <div class="cont v_sb_sinhnhat_new">
                                                <span><?=$name_string?></span> <span><?=$j?></span>
                                            </div>
                                            <div class="container-avt">
                                                <?php 
                                                for ($i=0; $i < count($data_birth1); $i++) { 
                                                    if ($data_birth1[$i]->ep_image == "") {
                                                        $image_ep = '../img/avatar_default.png';
                                                    }else{
                                                        $image_ep = 'https://chamcong.24hpay.vn/upload/employee/' . $data_birth1[$i]->ep_image;
                                                    }
                                                ?>
                                                <div class="img avt">
                                                    <img src="<?=$image_ep?>" alt="Ảnh lỗi">
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="sb-sinhnhat page-sinhnhat new">
                                        <div class="header">
                                            <div class="cont v_sb_sinhnhat_new">
                                                <?php
                                                if (date('m', $today_str) == 11) {
                                                    $month = 1;
                                                    $year = date('Y', $today_str) + 1;
                                                }else if (date('m', $today_str) == 12) {
                                                    $month = 2;
                                                    $year = date('Y', $today_str) + 1;
                                                }else{
                                                    $month = date('m', $today_str) + 2;
                                                    $year = date('Y', $today_str);
                                                }
                                                ?>
                                                <p>Tháng <?=$month?>, <?=$year?></p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <?php
                                            $i = 0;
                                            $name_string = "";
                                            $data_birth1 = []; 
                                            foreach ($data_ep2 as $key => $value) {
                                                $month_str = strtotime($data_ep2[$key]->ep_birth_day);
                                                if (date('m', $month_str) == $month) {
                                                    $i++;
                                                    $data_birth1[] = $data_ep2[$key];
                                                }
                                            }
                                            for ($k=0; $k < count($data_birth1); $k++) { 
                                                if (count($data_birth1) == 1) {
                                                    $name_string = $name_string . $data_birth1[$k]->ep_name;
                                                }else{
                                                    if ($k < 1) {
                                                        $name_string = $name_string . $data_birth1[$k]->ep_name . ", ";
                                                    }else if ($i == 1) {
                                                        $name_string = $name_string . $data_birth1[$k]->ep_name;
                                                    }
                                                }
                                            }
                                            if ($i == 0) {
                                            ?>
                                            <div>Không có dữ liệu</div>
                                            <?php
                                            }else{
                                                if ($i > 2) {
                                                    $j = "và " . ($i - 2) . " người khác";
                                                }else if($i <= 2){
                                                    $j = "";
                                                }
                                            ?>
                                            <div class="cont v_sb_sinhnhat_new">
                                                <span><?=$name_string?></span> <span><?=$j?></span>
                                            </div>
                                            <div class="container-avt">
                                                <?php 
                                                for ($i=0; $i < count($data_birth1); $i++) { 
                                                    if ($data_birth1[$i]->ep_image == "") {
                                                        $image_ep = '../img/avatar_default.png';
                                                    }else{
                                                        $image_ep = 'https://chamcong.24hpay.vn/upload/employee/' . $data_birth1[$i]->ep_image;
                                                    }
                                                ?>
                                                <div class="img avt">
                                                    <img src="<?=$image_ep?>" alt="Ảnh lỗi">
                                                </div>
                                                <?php
                                                }
                                                ?>
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
                    <!-- end Side bar phải -->
                </div>
                <!--end  popup tin nhắn trong center -->
            </div>
            <!--end Side bar phải -->
            <? include('../includes/popup_nt.php') ?>
        </div>
    </div>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/select2.min.js"></script>
<script defer type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/caidat.js"></script>
<script defer type="text/javascript" src="../js/datjs.js"></script>
<script>
    $('.select2_t_company').select2({
        width: '100%',
    })
    $('.select2_muti_tv').select2({
        width: '100%',
        placeholder: 'Dùng @ để thêm thành viên mới',
    })
</script>
<script type="text/javascript">
    $('.input_loi_chuc').keyup(function () { 
        var el = $(this).parents('.chuc');
        if($(this).val() != ""){
            el.find('.see_chuc').hide();
            el.find('.chuc_btn').show();
        }else{
            el.find('.see_chuc').show();
            el.find('.chuc_btn').hide();
        }
    });

    $('.active2').css('background', ' #2E3994');
    $('.chuc').submit(function(){
        var id_user_tag = $(this).data('id');
        var content = $(this).find('.v_content').val();
        if(content != ""){
            $.ajax({
                type: "POST",
                url: "../ajax/notify_birth_day.php",
                data: {
                    content: content,
                    id_user_tag: id_user_tag
                },
                dataType: "json",
                success: function (data) {
                    location.reload();
                }
            });
        }
        return false;
    });

    for (var i = 0; i < $('.sinhnhat').length; i++) {
        if ($('.sinhnhat').eq(i).height() > 370) {
            $('.sinhnhat').eq(i).css({
                'maxHeight': '370px',
                'overflowY' : 'scroll'
            });
        }
    }
</script>

</html>
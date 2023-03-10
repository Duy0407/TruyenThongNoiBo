<?php
require_once '../includes/check_login.php';
include("config.php");
require_once '../api/api_ct.php';
require_once '../api/api_nv.php';
$dep_id = getValue('dep_id', 'int', 'GET', 0);
$db_image = new db_query("SELECT * FROM dep_image WHERE dep_id = $dep_id");
if (mysql_num_rows($db_image->result) == 0) {
    $avatar_dep = "../img/logo2.png";
    $cover_dep = "../img/banner2.png";
} else {
    $row_dep = mysql_fetch_array($db_image->result);
    if ($row_dep['dep_image'] == "") {
        $avatar_dep = "../img/logo2.png";
    } else {
        $avatar_dep = $row_dep['dep_image'];
    }

    if ($row_dep['cover_dep'] == "") {
        $cover_dep = "../img/banner2.png";
    } else {
        $cover_dep = $row_dep['cover_dep'];
    }
}
if ($dep_id == 0) {
    header("Location: /truyen-thong-noi-bo-cong-ty.html");
}
$v_dep_id = $dep_id;
if ($dep_id != 0) {
    for ($i = 0; $i < count($list_department); $i++) {
        if ($dep_id == $list_department[$i]->dep_id) {
            $dep_name = $list_department[$i]->dep_name;
            $manager_name = '';
            $arr_manager = $list_department[$i]->manager;
            for ($j = 0; $j < count($arr_manager); $j++) {
                if ($j == count($arr_manager) - 1) {
                    $manager_name = $manager_name . $arr_manager[$i]->ep_name;
                } else {
                    $manager_name = $manager_name . $arr_manager[$i]->ep_name . "";
                }
            }
            break;
        }
    }
}
$total_emp = 0;
foreach ($data_ep2 as $key => $value) {
    if ($data_ep2[$key]->dep_id == $dep_id) {
        $total_emp++;
    }
}
$title = '';
$key = getValue('key', 'str', 'key', '');
if ($key != '') {
    $title = $key;
}

$type_create = 1;
$type_delete = 0;

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
$name_page = "Nh??m th???o - lu???n";
$img_sidebar_ntl = '../img/sbp_2.png';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Nh??m th???o lu???n</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/ttnb_page_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/sidebar_ntl.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/update_work.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/in_comment.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?= $version ?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <style>
        #nhom-thaoluan {
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
                    <!--  b??i vi???t-->
                    <div class="baiviet ttnb_baiviet">
                        <div class="banner page-nhomthaoluan">
                            <img src="<?= $cover_dep ?>" class="v_banner_dep" alt="???nh l???i">
                            <div class="content">
                                <div class="info-ct">
                                    <div class="img">
                                        <img src="<?= $avatar_dep ?>" class="v_logo_dep">
                                        <img src="../img/mayanh1.png" class="taianh taianh_daidien">
                                    </div>
                                    <input type="file" class="upload_avatar" data-dep_id="<?= $dep_id ?>" hidden>
                                    <div class="cont v_ttnb_group_dep">
                                        <p><?= $dep_name ?></p>
                                        <p><?= $total_emp ?> th??nh vi??n</p>
                                    </div>
                                </div>
                                <div class="edit-banner taianh">
                                    <div class="img">
                                        <img src="../img/mayanh2.png">
                                    </div>
                                    <div class="cont">
                                        <p>Ch???nh s???a ???nh b??a</p>
                                    </div>
                                </div>
                                <input type="file" class="upload_banner_dep" data-dep_id="<?= $dep_id ?>" hidden>
                                <form method="POST" enctype="multipart/form-data" action="">
                                    <input type="file" hidden onchange="submit_banner()" name="edit-banner">
                                    <input type="submit" hidden name="submit-banner">
                                </form>
                            </div>
                        </div>
                        <form class="baiviet-search" id="search_ttnb">
                            <input type="text" name="" id="input_search" value="<?= $title ?>" placeholder="T??m ki???m b??i vi???t ">
                            <button class="btn_search">
                                <img src="../img/icon_search.png" alt="search">
                            </button>
                        </form>
                        <?php
                        if ($type_create == 1) {
                        ?>
                            <div class="baiviet-header">
                                <form class="tren" id="form_newfeed_ttnb" data-dep_id="<?= $dep_id ?>">
                                    <div class="img avt">
                                        <img class="v_avatar_user1" src="<?= $_SESSION['login']['logo'] ?>">
                                    </div>
                                    <div class="capnhat">
                                        <input type="text" name="" id="title_post_newfeed_1" placeholder="C???p nh???t c??ng vi???c v???i c??c ?????ng nghi???p c???a b???n">
                                    </div>
                                    <div class="btn ">
                                        <button>????ng</button>
                                    </div>
                                </form>
                                <div class="duoi" id="duoi1">
                                    <!-- <input type="file" id="nut-taianh" accept="image/*"> -->
                                    <div class="duoi taianh l_open_model_post">
                                        <img src="../img/icon_anh.png">
                                        <span>T???i l??n ???nh/video/t???p</span>
                                    </div>

                                    <!-- <input type="file" id="selectedFile_anhbia_2" accept="image/*" style="display: none;" /> -->
                                    <div class=" duoi nhacten v_nhacten l_open_model_post">
                                        <div class="v_nhacten_detail">
                                            <img src="../img/icon_nhac.png">
                                            <span class="v_nhacten_span">Nh???c t??n th??nh vi??n</span>
                                        </div>
                                        <div class="v_popup_nhacten">
                                        </div>
                                    </div>
                                    <div class="cd-popup model_560 " id="model_dangtin">
                                        <div class="cd_container">
                                            <div class="cd_modal">
                                                <div class="cd_modal_header">
                                                    <h4 class="name_header">T???i ???nh/video/t???p</h4>
                                                    <img src="../img/dau_x.png" alt="???nh l???i" class="close_detl" id="close_post_newfeed">
                                                </div>
                                                <div class="modal_body_post_newfeed">
                                                    <div class="model_top_post_newfeed">
                                                        <div class="img_model_top">
                                                            <img src="<?= $_SESSION['login']['logo'] ?>" class="img_model_top_item" alt="avatar">
                                                        </div>
                                                        <div class="text_model_top">
                                                            <div class="model_user_name"><?= $_SESSION['login']['name']; ?></div>
                                                            <div class="model_com_name"><?= $arr_com->com_name; ?></div>
                                                        </div>
                                                    </div>
                                                    <form id="form_popup_dangtin" class="model_center_post_newfeed" data-type="0">
                                                        <div class="model_center_post_newfeed_item">
                                                            <input type="text" class="title_post_newfeed" id="title_post_newfeed_2" name="" id="" placeholder="C???p nh???t c??ng vi???c v???i c??c ?????ng nghi???p c???a b???n">
                                                        </div>
                                                        <div class="model_center_post_newfeed_item">
                                                            <div class="view_img" id="view_img">
                                                                <div class="view_img_item1">
                                                                    <label for="open_file_newfeed" class="label_file">
                                                                        <img src="../img/open_file_nf.svg" alt="openfile">
                                                                        <p class="text_image_up_file">Th??m ???nh/video/t???p</p>
                                                                    </label>
                                                                    <input type="file" name="" id="open_file_newfeed" multiple>
                                                                    <div class="close_file_newfeed">
                                                                        <img src="../img/close_file_newfeed.svg" alt="img close">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="model_center_post_newfeed_item" id="view_file_nf"></div>
                                                        <div class="model_center_post_newfeed_item" id="view_list_ep" style="display: none;">
                                                            <select name="" id="select_list_ep" multiple>
                                                                <?
                                                                foreach ($arr_ep as $value) {
                                                                ?>
                                                                    <option value="<?= $value['ep_id'] ?>"><?= $value['ep_name'] ?></option>
                                                                <?
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="model_center_post_newfeed_item">
                                                            <div class="option_add_new_feed">
                                                                <div>Th??m v??o b??i vi???t</div>
                                                                <div>
                                                                    <label for="open_file_newfeed">
                                                                        <img src="../img/icon_anh.png" class="custom_img_option">
                                                                    </label>
                                                                    <img src="../img/icon_nhac.png" id="tag_ep_newfeed" class="custom_img_option">
                                                                    <label for="open_file_newfeed">
                                                                        <img src="../img/up_file.svg" class="custom_img_option">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="model_center_post_newfeed_item post_newfeed_custom">
                                                            <button class="model_center_post_newfeed_btn" id="bth_cancel_model_newfeed">H???y</button>
                                                            <button class="model_center_post_newfeed_btn model_center_post_newfeed_btn_custom">????ng</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" duoi tuychinh" id="tuychinh_d">
                                        <img src="../img/icon_tuychinh.png">
                                        <span>T??y ch???nh ????ng tin</span>
                                        <div class="popup-tuychinh_d" id="popup-tuychinh_d">
                                            <div class="ul_model">
                                                <div class="li_model" id="nut-sda" data-dep_id="<?= $dep_id ?>" data-dep_name="<?= $dep_name ?>">
                                                    <img src="../img/tuychinh_1.png" alt="???nh l???i" class="v_list_new_feed">
                                                    <p class="p_model">T???o th??ng b??o</p>
                                                </div>
                                                <div class="li_model" id="nut-cdtvm" data-dep_id="<?= $dep_id ?>" data-dep_name="<?= $dep_name ?>">
                                                    <img src="../img/tuychinh_2.png" alt="???nh l???i" class="v_list_new_feed">
                                                    <p class="p_model">Ch??o ????n th??nh vi??n m???i</p>
                                                </div>
                                                <div class="li_model" id="nut-tsk" data-dep_id="<?= $dep_id ?>" data-dep_name="<?= $dep_name ?>">
                                                    <img src="../img/tuychinh_3.png" alt="???nh l???i" class="v_list_new_feed">
                                                    <p class="p_model">T???o s??? ki???n</p>
                                                </div>
                                                <div class="li_model" id="nut-ttl" data-dep_id="<?= $dep_id ?>" data-dep_name="<?= $dep_name ?>">
                                                    <img src="../img/tuychinh_4.png" alt="???nh l???i" class="v_list_new_feed">
                                                    <p class="p_model">T???o th???o lu???n</p>
                                                </div>
                                                <div class="li_model" id="nut-csyt" data-dep_id="<?= $dep_id ?>" data-dep_name="<?= $dep_name ?>">
                                                    <img src="../img/tuychinh_5.png" alt="???nh l???i" class="v_list_new_feed">
                                                    <p class="p_model">Chia s??? ?? t?????ng</p>
                                                </div>
                                                <div class="li_model" id="nut-tbc" data-dep_id="<?= $dep_id ?>" data-dep_name="<?= $dep_name ?>">
                                                    <img src="../img/tuychinh_6.png" alt="???nh l???i" class="v_list_new_feed">
                                                    <p class="p_model">T???o b??nh ch???n</p>
                                                </div>
                                                <div class="li_model" id="nut-tkt" data-dep_id="<?= $dep_id ?>" data-dep_name="<?= $dep_name ?>">
                                                    <img src="../img/tuychinh_7.png" alt="???nh l???i" class="v_list_new_feed">
                                                    <p class="p_model">T???o khen th?????ng</p>
                                                </div>
                                                <div class="li_model" id="nut-ttnb" data-dep_id="<?= $dep_id ?>" data-dep_name="<?= $dep_name ?>">
                                                    <img src="../img/tuychinh_8.png" alt="???nh l???i" class="v_list_new_feed">
                                                    <p class="p_model">T???o tin t???c n???i b???</p>
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
                                    $db_newfeed = new db_query("SELECT * FROM new_feed where id_company = $user_id AND `delete` = 0 AND position = $dep_id AND `type` = 0 ORDER BY new_id DESC, updated_at DESC");
                                } else {
                                    $dep = $_SESSION['login']['dep_id'];
                                    $db_newfeed = new db_query("SELECT * FROM new_feed where id_company = $user_id AND position = $dep AND `delete` = 0 AND `type` = 0 ORDER BY new_id DESC, updated_at DESC");
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
                                        } else {
                                            $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                                        }
                                        $newfeed_name =  $arr_com->com_name;
                                    } else {
                                        $newfeed_name = $arr_ep[$row_newfeed['author']]['ep_name'];
                                        if ($arr_ep[$row_newfeed['author']]['ep_image'] == "") {
                                            $avt_image =  '../img/logo_com.png';
                                        } else {
                                            $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_newfeed['author']]['ep_image'];
                                        }
                                    }
                                    if ($row_newfeed['new_type'] == 0) {
                                        $id_user_tag = explode(",", $row_newfeed['id_user_tags']);
                                        $name_employee = $id_user_hide = "";
                                        if (count($id_user_tag) > 0) {
                                            if (count($id_user_tag) - 1 > 0) {
                                                $id_user_hide = ' v?? ' . (count($id_user_tag) - 1) . ' ng?????i kh??c';
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
                                            $id_user_hide = ' v?? ' . (count($arr_id_user_tag) - 1) . ' ng?????i kh??c';
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
                                            $id_user_hide = ' v?? ' . (count($arr_id_user_tag) - 1) . ' ng?????i kh??c';
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
                                    <p>T???t c??? th??ng b??o</p>
                                </div>
                                <div class="xoa">
                                    <button class="btn btn_del_all_thongbao">X??a t???t c???</button>
                                    <div class="cd-modal-del" id="xoa_tatcathongbao">
                                        <div class="cd_container">
                                            <div class="cd_modal">
                                                <div class="cd_modal_header">
                                                    <h4 class="name_header">X??a t???t c??? th??ng b??o</h4>
                                                </div>
                                                <div class="cd_modal_body">
                                                    <form class="" method="" action="">
                                                        <div class="form-body">
                                                            <div class="row_modal_del">
                                                                <p class="p_popup_del"><b>B???n c?? mu???n x??a t???t c??? c??c
                                                                        th??ng b??o? </b></p>
                                                                <p class="p_popup_del">T???t c??? th??ng tin s??? ???????c l??u t???
                                                                    ?????ng v??o <b>???? x??a g???n ????y</b> trong th???i gian 05
                                                                    ng??y tr?????c khi b??? x??a v??nh vi???n</p>
                                                            </div>
                                                            <div class="form_buttom">
                                                                <button class="btn_huy btn_huy_xoatatca" type="button">????ng
                                                                </button>
                                                                <button class="btn_luu" type="submit">X??a</button>
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
                                            <p>Th??ng b??o: V/v Thay ?????i ?????a ??i???m g???i xe c???a nh??n vi??n</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p class="chitiet_tb">Xem chi ti???t</p>
                                            <div class="cd-modal-del" id="chitiet_thongbao">
                                                <div class="cd_container">
                                                    <div class="cd_modal">
                                                        <div class="cd_modal_header">
                                                            <h4 class="name_header">Chi ti???t th??ng b??o</h4>
                                                            <img src="../img/dau_x.png" alt="" class="close_detl">
                                                        </div>
                                                        <div class="cd_modal_body">
                                                            <form class="" method="" action="">
                                                                <div class="form-body">
                                                                    <div class="row_modal_del">
                                                                        <p class="p_popup_del"><b>V/v Thay ?????i ?????a ??i???m
                                                                                g???i xe c???a nh??n vi??n</b></p>
                                                                        <p class="p_popup_del">T??? ng??y 25.03.2020, t???t
                                                                            c??? nh??n vi??n
                                                                            C??ng ty c??? ph???n Thanh to??n H??ng H?? th???c hi???n
                                                                            g???i xe
                                                                            t???i b07 l?? 7 khu c??ng nghi???p ?????nh C??ng,
                                                                            Ho??ng Mai, H?? N???i</p>
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
                                                                        <button class="btn_huy btn_huy_xoatatca" type="button">????ng
                                                                        </button>
                                                                        <button class="btn_luu" id="btn_sua_baiviet" type="button">S???a
                                                                        </button>
                                                                        <div class="cd-popup" id="model_suanhanhbaiviet">
                                                                            <div class="cd_container">
                                                                                <div class="cd_modal">
                                                                                    <div class="cd_modal_header">
                                                                                        <h4 class="name_header">S???a
                                                                                            th??ng b??o</h4>
                                                                                        <img src="../img/dau_x.png" alt="" class="close_detl ">
                                                                                    </div>
                                                                                    <div class="cd_modal_body">
                                                                                        <form class="" method="" action="">
                                                                                            <div class="form-body">
                                                                                                <div class="form_group">
                                                                                                    <label class="name">T??n
                                                                                                        th??ng
                                                                                                        b??o</label>
                                                                                                    <input type="text" value="" name="txt_quequan" placeholder="V/v Thay ?????i ?????a ??i???m g???i xe c???a nh??n vi??n">
                                                                                                </div>
                                                                                                <div class="form_group">
                                                                                                    <label class="name">N???i
                                                                                                        dung th??ng
                                                                                                        b??o</label>
                                                                                                    <input type="text" value="" name="txt_quequan" placeholder="T??? ng??y 25.03.2020, t???t c??? nh??n vi??n...">
                                                                                                </div>
                                                                                                <div class="form_group ">
                                                                                                    <label for="" class="name">T???i
                                                                                                        l??n t???p ????nh
                                                                                                        k??m</label>
                                                                                                    <label for="input_file1">
                                                                                                        <input type="file" name="" class="custom-file-input" multiple>
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div class="form_buttom">
                                                                                                    <button class="btn_huy" type="button">
                                                                                                        H???y
                                                                                                    </button>
                                                                                                    <button class="btn_luu" type="submit">
                                                                                                        C???p
                                                                                                        nh???t
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
                                                            <h4 class="name_header">X??a th??ng b??o</h4>
                                                        </div>
                                                        <div class="cd_modal_body">
                                                            <form class="" method="" action="">
                                                                <div class="form-body">
                                                                    <div class="row_modal_del">
                                                                        <p class="p_popup_del"><b>B???n c?? mu???n x??a n???i
                                                                                dung b???n th??ng b??o n??y? </b></p>
                                                                        <p class="p_popup_del">T???t c??? th??ng tin s??? ???????c
                                                                            l??u t??? ?????ng v??o <b>???? x??a g???n ????y</b> trong
                                                                            th???i gian 05 ng??y tr?????c khi b??? x??a v??nh vi???n
                                                                        </p>
                                                                    </div>
                                                                    <div class="form_buttom">
                                                                        <button class="btn_huy btn_huy_xoatatca" type="button">????ng
                                                                        </button>
                                                                        <button class="btn_luu" type="submit">X??a
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
                                            <p>Th??ng b??o: V/v Thay ?????i ?????a ??i???m g???i xe c???a nh??n vi??n</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi ti???t</p>
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
                                            <p>Th??ng b??o: V/v Thay ?????i ?????a ??i???m g???i xe c???a nh??n vi??n</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi ti???t</p>
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
                                            <p>Th??ng b??o: V/v Thay ?????i ?????a ??i???m g???i xe c???a nh??n vi??n</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi ti???t</p>
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
                                            <p>Th??ng b??o: V/v Thay ?????i ?????a ??i???m g???i xe c???a nh??n vi??n</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi ti???t</p>
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
                                            <p>Th??ng b??o: V/v Thay ?????i ?????a ??i???m g???i xe c???a nh??n vi??n</p>
                                            <p>14h30 25.01.2020</p>
                                        </div>
                                        <div class="chitiet">
                                            <p>Xem chi ti???t</p>
                                        </div>
                                        <div class="xoa">
                                            <img src="../img/icon_thungrac.png">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- end b??i vi???t  -->
                    <!--  Side bar ph???i -->
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
                                    <div class="new danhsach-nhom page-nhomthaoluan">
                                        <div class="header">
                                            <p>Danh s??ch nh??m - th???o lu???n</p>
                                        </div>
                                        <div class="body">
                                            <ul>
                                                <?php
                                                foreach ($list_department as $dep) {
                                                    if ($dep->dep_id != $dep_id) {
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
                                                <p>Gi???i thi???u</p>
                                            </div>
                                            <div class="header-cont">
                                            </div>

                                        </div>
                                        <div class="body">
                                            <div class="container">
                                                <div class="cont">
                                                    <p> Qu???n tr???: <span class="content"><?php
                                                                                        if ($manager_name == "") {
                                                                                            echo "Ch??a c???p nh???t";
                                                                                        } else {
                                                                                            echo $manager_name;
                                                                                        }
                                                                                        ?></span></p>
                                                </div>
                                                <div class="cont">
                                                    <p> Qu???n l?? tr???c ti???p: <span class="content"><?php
                                                                                                    if ($manager_name == "") {
                                                                                                        echo "Ch??a c???p nh???t";
                                                                                                    } else {
                                                                                                        echo $manager_name;
                                                                                                    }
                                                                                                    ?></span></p>
                                                </div>
                                                <div class="cont">
                                                    <p> Ch??? ????? nh??m: <span class=" content chedo">C??ng khai</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thanhvien-moi new">
                                        <div class="header">
                                            <div class="trai">
                                                <p>Th??nh vi??n <span>(<?= $total_emp ?>)</span></p>
                                            </div>
                                            <div class="phai">
                                                <!-- <p>Th??m</p> -->
                                            </div>
                                        </div>
                                        <div class="body v_page_group_member_new">
                                            <?php
                                            $i = 0;
                                            foreach ($data_ep2 as $key => $value) {
                                                if ($data_ep2[$key]->dep_id == $v_dep_id) {
                                                    $i++;
                                                    if ($data_ep2[$key]->ep_image == "") {
                                                        $img_avt = '../img/avatar_default.png';
                                                    } else {
                                                        $img_avt = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep2[$key]->ep_image;
                                                    }
                                            ?>
                                                    <div class="img avt v_info_ep">
                                                        <img class="v_avatar_ep_page_group" src="<?= $img_avt ?>" alt="???nh l???i">
                                                        <div class="v_info_ep_div">
                                                            <div class="v_info_ep_div1"><img src="<?= $img_avt ?>" alt="???nh l???i" class="v_info_ep_div_img"></div>
                                                            <div>
                                                                <div class="v_info_ep_div_name"><?= $data_ep2[$key]->ep_name ?></div>
                                                                <div class="v_info_ep_div_pos">Th??nh vi??n</div>
                                                                <div class="v_info_ep_div_id">ID: <?= $data_ep2[$key]->ep_id ?></div>
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
<script src="../js/jquery-3.4.1.min.js"></script>
<?php include('../includes/inc_chat.php') ?>
<script src="../js/select2.min.js"></script>
<script defer type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/caidat.js"></script>
<? include('../includes/popup_nt.php') ?>
<script defer type="text/javascript" src="../js/datjs.js"></script>
<script defer type="text/javascript" src="../js/datvalidate.js?v=<?= $version ?>"></script>
<script>
    $('.select2_t_company').select2({
        width: '100%',
    });
    $('.select2_muti_tv').select2({
        width: '100%',
        placeholder: 'D??ng @ ????? th??m th??nh vi??n m???i',
    });
    $('.select2_muti_td').select2({
        width: '100%',
        placeholder: 'D??ng @ ????? th??m ng?????i theo d??i',
    });
    $('.taianh_daidien').click(function() {
        $('.upload_avatar').prop('accept', '.png, .jpg, .jpeg, .PNG, .JPG, .JPEG');
        $('.upload_avatar').click();
    });
    $('.upload_avatar').change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.v_logo_dep').attr('src', e.target.result);
        }
        reader.readAsDataURL($(this).prop('files')[0]);
        var form_data = new FormData();
        form_data.append('image', $(this).prop('files')[0]);
        form_data.append('dep_id', $(this).data('dep_id'));
        $.ajax({
            type: "POST",
            url: "../ajax/upload_dep_image.php",
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {

            }
        });
    });

    $('.edit-banner').click(function() {
        $('.upload_banner_dep').prop('accept', '.png, .jpg, .jpeg, .PNG, .JPG, .JPEG');
        $('.upload_banner_dep').click();
    });
    $('.upload_banner_dep').change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.v_banner_dep').attr('src', e.target.result);
        }
        reader.readAsDataURL($(this).prop('files')[0]);
        var form_data = new FormData();
        form_data.append('image', $(this).prop('files')[0]);
        form_data.append('dep_id', $(this).data('dep_id'));
        $.ajax({
            type: "POST",
            url: "../ajax/upload_dep_cover.php",
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {

            }
        });
    });
</script>
<script src="/js/page-group.js"></script>
<script type="text/javascript" src="../js/trang_chu.js"></script>
<script type="text/javascript" src="../js/ttnb_page_group_tl_child.js"></script>
<script src="../js/sukien_quanly.js"></script>
</html>
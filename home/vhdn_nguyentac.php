<?php
include("config.php");
require_once '../config/config.php';
require_once '../includes/check_login.php';
require_once '../includes/check_account.php';
require_once '../api/api_nv.php';

// echo "<pre>";
// print_r($arr_com);
// die;
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
    <title>Nguyên tắc làm việc </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/vuong.css?v=<?= $ver ?>">
    <link rel="stylesheet" href="../css/vanhoadoanhnghiep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/nguyen_tac_lam_viec.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <style>
        @media (max-width: 480px) {
            .img {
                display: none;
            }

            .trang {
                width: auto;
            }
        }
    </style>
</head>

<body>
    <div id="vanhoadoanhnghiep" class="co-sidebar-phai khongmenu_480">
        <div class="wapper">
            <!--  sidebar -->
            <?php include '../includes/cd_sidebar.php' ?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!--     header -->
                <?php include '../includes/cd_header.php' ?>
                <!-- end header -->
                <!--  center -->
                <div id="center" class="v_center">
                    <!--  Side bar phải -->
                    <div class="side-bar-phai v_side-bar-phai v_vhdn_nguyen_tac" id="side-bar-phai">
                        <div class="dropdown">
                            <div class="menu-phu">
                                <button class="dropbtn">
                                    <div class="menu-phu-d " id="menu-phu-d-name">
                                        <div class="img">
                                            <img src="../img/v_4.png">
                                        </div>
                                        <div class="cont">
                                            <p>Nguyên tắc làm việc</p>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-content congty-info">
                                    <a href="vhdn-thu-tu-seo.html" class="menu-phu-d " id="d_thutuceo" data-id='thutuceo'>
                                        <div class="img">
                                            <img src="../img/v_1.png">
                                        </div>
                                        <div class="cont">
                                            <p>Thư từ CEO</p>
                                        </div>
                                    </a>
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
                                    <?php
                                    if(count($list_department) > 0){
                                    ?>
                                    <a href="vhdn-danh-sach-phong-ban.html" class="menu-phu-d" id="d_danhsach" data-id="danhsachphongban">
                                        <div class="img">
                                            <img src="../img/v_5.png">
                                        </div>
                                        <div class="cont">
                                            <p>Danh sách phòng ban</p>
                                        </div>
                                    </a>
                                    <?php
                                    }else{
                                    ?>
                                    <a onclick="alert('Công ty không có phòng ban nào')" class="menu-phu-d" id="d_danhsach" data-id="danhsachphongban">
                                        <div class="img">
                                            <img src="../img/v_5.png">
                                        </div>
                                        <div class="cont">
                                            <p>Danh sách phòng ban</p>
                                        </div>
                                    </a>
                                    <?php
                                    }
                                    ?>
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
                        <!--end Side bar phải -->
                    </div>
                    <!--  bài viết-->
                    <div class="baiviet v_baiviet2">
                        <div id="main-baiviet" class="main-baiviet">
                            <ul>
                                <?php
                                $db = new db_query("SELECT * FROM working_rules WHERE `delete` = 0 AND id_company = " . $_SESSION['login']['id_com'] . " ORDER BY id DESC");
                                if (mysql_num_rows($db->result) == 0) {
                                ?>
                                <li class="nguyentaclamviec giatri-muctieu v_nguyentaclamviec_no">
                                    <div class="header-gt-mt header-ngu">
                                        <div class="cont header-gt-mt-cont">
                                            <p class="v_text_add_nguyentac">Nguyên tắc làm việc</p>
                                        </div>
                                        <?php
                                        if ($type_create == 1) {
                                        ?>
                                            <div class="img nut-themnguyentac">
                                                <img src="../img/vh_6.png" alt="Ảnh lỗi">
                                                <p class="nut-themnguyentac-p">Thêm nguyên tắc làm việc</p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </li>
                                <?php
                                }
                                $k = 0;
                                while ($row = mysql_fetch_array($db->result)) {
                                    $db_comment = new db_query("SELECT * FROM comment_working_rules WHERE id_working_rules = " . $row['id'] . " AND id_parent = 0 ORDER BY id DESC");
                                $k++;
                                ?>
                                    <li class="nguyentaclamviec giatri-muctieu">
                                        <div class="giatri-muctieu_detail">
                                            <?php
                                            if ($k == 1) {
                                            ?>
                                                    <div class="header-gt-mt header-ngu">
                                                        <div class="cont">
                                                            <p>Nguyên tắc làm việc</p>
                                                        </div>
                                                        <?php
                                                        if ($type_create == 1) {
                                                        ?>
                                                        <div class="img nut-themnguyentac">
                                                            <img src="../img/vh_6.png">
                                                            <p class="nut-themnguyentac-p">Thêm nguyên tắc làm việc</p>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="baiviets-body body-ngu">
                                                <div class="body-header">
                                                    <div class="cont">
                                                        <p class="v_giatri-muctieu02_p"><?= $row['name'] ?></p>
                                                    </div>
                                                    <div class="img nut-tuychinhnt v_nut-tuychinhnt">
                                                        <img src="../img/bacham.png">
                                                        <div class="popup_working_rules">
                                                            <div class="ul_model">
                                                                <?php
                                                                if ($type_create == 1) {
                                                                ?>
                                                                <div class="li_model nut-edit-nt" data-id="<?=$row['id']?>">
                                                                    <img src="../img/vh_10.png" alt="Ảnh lỗi">
                                                                    <p class="p_model">Chỉnh sửa nguyên tắc làm việc </p>
                                                                </div>
                                                                <?php
                                                                }

                                                                if ($type_delete == 1) {
                                                                ?>
                                                                <div class="li_model nut-xoa-nt" data-id="<?=$row['id']?>">
                                                                    <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                                    <p class="p_model">Xóa nguyên tắc làm việc</p>
                                                                </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="status">
                                                    <p><?= $row['content'] ?></p>
                                                </div>
                                                <div class="anh">
                                                    <img src="../img/vanhoadoanhnghiep/working_rules/<?= $_SESSION['login']['id_com'] ?>/<?= $row['img'] ?>" class="v_cover_image_working_rules">
                                                </div>
                                                <div class="reach">
                                                    <div class="lc tren">
                                                        <div class="trai">
                                                            <img src="../img/like_x.png">
                                                            <img class="anh-an" src="../img/icon_reach.png">
                                                            <?
                                                            $db_like = new db_query("SELECT * FROM `like_working_rules` WHERE id_working_rules = " . $row['id']);
                                                            ?>
                                                            <span id="number_like<?= $row['id']; ?>"><?= mysql_num_rows($db_like->result); ?></span>
                                                        </div>
                                                        <div class="phai">
                                                            <?
                                                            $db_count_comment = new db_query("SELECT * FROM `comment_working_rules` WHERE id_working_rules = " . $row['id'] . " ORDER BY id DESC");
                                                            ?>
                                                            <span class="v_count_comment"><?= mysql_num_rows($db_count_comment->result); ?> Bình luận</span>
                                                            <!-- <span class="nguoixem"> Người xem</span> -->
                                                        </div>
                                                    </div>
                                                    <div class="lc duoi v_lc">
                                                        <?php
                                                        $db_like = new db_query("SELECT * FROM `like_working_rules` WHERE id_working_rules = " . $row['id'] . " AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
                                                        if (mysql_num_rows($db_like->result) > 0) {
                                                            $like_img = "../img/v_like_post.svg";
                                                            $style_like = "#4C5BD4";
                                                        } else {
                                                            $like_img = "../img/like_t.png";
                                                            $style_like = "#666666";
                                                        }
                                                        ?>
                                                        <div class="trai" onclick="like_wr(<?= $row['id']; ?>);">
                                                            <img id="like_wr<?= $row['id']; ?>" src="<?= $like_img; ?>">
                                                            <span id="text_like_wr<?= $row['id']; ?>" class="<?= $style_like; ?>" style="color: <?=$style_like?>">Thích</span>
                                                        </div>
                                                        <?php
                                                        if($row['comment'] == 0){
                                                        ?>
                                                        <div class="phai" onclick="focus_comment(<?= $row['id'] ?>)">
                                                            <img src="../img/icon_cmt.png">
                                                            <span>Bình luận</span>
                                                        </div>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <div class="phai">
                                                            Chức năng bình luận đã tắt
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="baiviets-footer">
                                                <?php
                                                if($row['comment'] == 0){
                                                ?>
                                                <div class="tren">
                                                    <div class="img avt">
                                                        <img class="v_avatar_user1" src="<?= $_SESSION['login']['logo'] ?>">
                                                    </div>
                                                    <form class="cont v_comment_active" data-type="0" id="form_comment1<?= $row['id'] ?>" data-new_id="<?= $row['id'] ?>" onsubmit="return comment_wr(this);">
                                                        <input type="text" class="v_write_comment" autocomplete="off" id="comment1<?= $row['id'] ?>" name="" placeholder="Viết bình luận...">
                                                        <span class="see_icon" id="see_icon<?= $row['id'] ?>"></span>
                                                        <label for="baiviet_taianh<?= $row['id'] ?>" class="see_icon1" id="see_icon1<?= $row['id'] ?>"></label>
                                                        <input type="file" onchange="changeImg(this,<?= $row['id'] ?>)" class="taianh" accept="image/*" id="baiviet_taianh<?= $row['id'] ?>" style="display: none;" />
                                                        <input type="text" hidden readOnly value="<?=$row['id']?>" class="v_new_id_comment">
                                                        <button class="nut_gui_comment" id="nut_gui_comment<?= $row['id'] ?>"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                                                    </form>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                                <div class="duoi">
                                                    <div class="xemthem" id="xemthem<?= $row['id'] ?>">
                                                        <?php
                                                        $i = 0;
                                                        $db_comment = new db_query("SELECT * FROM `comment_working_rules` WHERE id_working_rules = " . $row['id'] . " AND id_parent = 0 ORDER BY id DESC");
                                                        while ($row_comment = mysql_fetch_array($db_comment->result)) {
                                                            $avt_image = '';
                                                            $name_author = '';
                                                            if ($row_comment['user_type'] == 1) {
                                                                if ($arr_com->com_logo == "") {
                                                                    $avt_image =  '../img/logo_com.png';
                                                                    $name_author =  $arr_com->com_name;
                                                                }else{
                                                                    $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                                                                    $name_author =  $arr_com->com_name;
                                                                }
                                                            } else {
                                                                foreach ($arr_ep as $key => $value) {
                                                                    if ($row_comment['id_user'] == $arr_ep[$key]['ep_id']) {
                                                                        if ($arr_ep[$key]['ep_image'] == "") {
                                                                            $avt_image = '../img/avatar_default.png';
                                                                        }else{
                                                                            $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$key]['ep_image'];
                                                                        }
                                                                        $name_author = $arr_ep[$key]['ep_name'];
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                            <div class="xembinhluan hide_comment<?= $row['id'] ?>">
                                                                <div class="avt avt-cmt"> <img src="<?= $avt_image ?>"> </div>
                                                                <div class="binhluan">
                                                                    <div class="container">
                                                                        <div class="header-cmt">
                                                                            <div class="name-cmt">
                                                                                <p><?= $name_author ?></p>
                                                                            </div>
                                                                            <div class="edit-cmt" onclick="option_cmt(this);">
                                                                                <img src="../img/bacham.png">
                                                                                <div class="popup-chinhsua-cmt">
                                                                                    <div class="ul_model">
                                                                                        <?php
                                                                                        if ($type_create == 1) {
                                                                                        ?>
                                                                                        <div class="li_model" data-id="<?= $row_comment['id'] ?>" onclick="update_comment(<?= $row_comment['id'] ?>,<?= $row['id'] ?>,0)">
                                                                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                                                                        </div>
                                                                                        <?php
                                                                                        }else if($row_comment['id_user'] == $_SESSION['login']['id']){
                                                                                        ?>
                                                                                        <div class="li_model" data-id="<?= $row_comment['id'] ?>" onclick="update_comment(<?= $row_comment['id'] ?>,<?= $row['id'] ?>,0)">
                                                                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                                                                        </div>
                                                                                        <?php
                                                                                        }
                                                                                        ?>

<?php
                                                                                        if ($type_create == 1) {
                                                                                        ?>
                                                                                        <div data-id="<?= $row_comment['id'] ?>" onclick="del_comment_wr(this,0)" class="li_model nut-xoa-baiviet">
                                                                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                                                            <p class="p_model">Xóa bình luận</p>
                                                                                        </div>
                                                                                        <?php
                                                                                        }else if($row_comment['id_user'] == $_SESSION['login']['id']){
                                                                                        ?>
                                                                                        <div data-id="<?= $row_comment['id'] ?>" onclick="del_comment_wr(this,0)" class="li_model nut-xoa-baiviet">
                                                                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                                                            <p class="p_model">Xóa bình luận</p>
                                                                                        </div>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="body-cmt">
                                                                            <div class="cmt" tabindex="-1" id="text_comment<?= $row_comment['id'] ?>" data-value="<?= $row_comment['content'] ?>">
                                                                                <p>
                                                                                    <?= $row_comment['content'] ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?
                                                                    if ($row_comment['image'] != '') {
                                                                    ?>
                                                                        <div class="image_comment" id="image_comment<?= $row_comment['id'] ?>">
                                                                            <img src="<?= $row_comment['image'] ?>" id="img_cmt<?= $row_comment['id'] ?>" alt="image comment">
                                                                        </div>
                                                                    <?
                                                                    }
                                                                    ?>
                                                                    <div class="reach-cmt" id="react_cmt<?= $row_comment['id'] ?>">
                                                                        <?php
                                                                        $db_check_like = new db_query("SELECT * FROM like_comment_working_rules WHERE id_comment = " . $row_comment['id']);

                                                                        $dem = 0;
                                                                        while ($row_like_comment = mysql_fetch_array($db_check_like->result)) {
                                                                            if ($row_like_comment['id_comment'] == $row_comment['id'] && $row_like_comment['id_user'] == $_SESSION['login']['id'] && $row_like_comment['user_type'] == $_SESSION['login']['user_type']) {
                                                                                $dem++;
                                                                            }
                                                                        }
                                                                        if ($dem > 0) {
                                                                            $style_like2 = "v_like_post3";
                                                                        } else {
                                                                            $style_like2 = "";
                                                                        }
                                                                        ?>
                                                                        <p class="v_like_post2 <?= $style_like2 ?>" onclick="like_comment_wr(this)" data-id="<?= $row_comment['id'] ?>">Thích</p>
                                                                        <p class="trl-binhluan" onclick="focus_comment_wr(<?= $row_comment['id'] ?>);">Trả lời</p>
                                                                        <p id="time<?= $row_comment['id'] ?>"><?php
                                                                                                                echo time_elapsed_string($row_comment['created_at']);
                                                                                                                ?></p>
                                                                        <?
                                                                        if (mysql_num_rows($db_check_like->result) > 0) {
                                                                        ?>
                                                                            <img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment<?= $row_comment['id'] ?>">
                                                                            <p class="num_like_comment num_like_comment<?= $row_comment['id'] ?>"><?= mysql_num_rows($db_check_like->result) ?></p>
                                                                        <?
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="cmt-binhluan">
                                                                        <div id="cmt-binhluan<?= $row_comment['id'] ?>">
                                                                            <?
                                                                            $db_rep_comment = new db_query("SELECT * FROM comment_working_rules WHERE id_parent = " . $row_comment['id']);
                                                                            ?>
                                                                        </div>
                                                                        <?
                                                                        if (mysql_num_rows($db_rep_comment->result) > 0) {
                                                                        ?>
                                                                            <div class="view_cmt_rep" id="view_cmt_rep<?= $row_comment['id'] ?>" onclick="show_rep_comment(<?= $row_comment['id'] ?>);">Hiển thị bình luận</div>
                                                                            <div class="hide_cmt_rep" id="hide_cmt_rep<?= $row_comment['id'] ?>" onclick="htde_rep_comment(<?= $row_comment['id'] ?>);">Ẩn bớt bình luận</div>
                                                                        <?
                                                                        }
                                                                        ?>
                                                                        <form class="container-cmt" id="form_comment<?= $row_comment['id'] ?>" data-type="0" data-cmt_id="<?= $row_comment['id'] ?>" data-new_id="<?= $row_comment['id'] ?>" onsubmit="return rep_comment_wr(this);">
                                                                            <div class="img avt"> <img src="<?= $_SESSION['login']['logo'] ?>" class="v_avt_reply_comment">
                                                                            </div>
                                                                            <div class="cont"> 
                                                                                <input type="text" class="rep_cmt" autocomplete="Off" id="comment<?= $row_comment['id'] ?>" name="" placeholder="Viết bình luận..." onkeyup="rep_cmt_wr(this)">
                                                                                <span class="see_icon"></span>
                                                                                <label class="see_icon1">
                                                                                    <input type="file" onchange="show_img_rep_comment(this,<?= $row_comment['id'] ?>)" id="rep_comment<?= $row_comment['id'] ?>" accept="image/*" style="display: none;" />
                                                                                </label>
                                                                                <input type="text" hidden readonly value="<?= $row_comment['id'] ?>" class="v_id_rep_comment_wr">
                                                                                <button class="nut_gui_comment rep_comment" id="rep_comment<?= $row_comment['id'] ?>">
                                                                                    <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                        <div class="view_rep_cmt" id="view_rep_cmt<?= $row_comment['id'] ?>"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                            if ($i == 2) {
                                                                break;
                                                            }
                                                            $i++;
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                    if (mysql_num_rows($db_comment->result) == 0) {
                                                    ?>
                                                        <p>Hiện chưa có bình luận</p>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <p class="an-hien-binhluan thugon-binhluan" id="thugon-binhluan<?= $row['id'] ?>" onclick="hide_comment(<?= $row['id'] ?>);">Thu gọn bình luận</p>
                                                        <p class="an-hien-binhluan xem-binhluan" id="xem-binhluan<?= $row['id'] ?>" onclick="show_comment(<?= $row['id'] ?>);" style="display: block;">Xem thêm bình luận</p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="trang v_giatri-muctieu02 v_giatri-muctieu03 v_nguyentac02">
                                            <div class="icon-menu">
                                                <div class="container" id="hien-trang">
                                                    <div class=" icon-trong">
                                                        <div class="img">
                                                            <img id="icon-quayve" src="../img/icon_menu.png">
                                                        </div>
                                                    </div>
                                                    <div class="nguyentaclamviec   content-phu">
                                                        <div class="header header-ngu">
                                                            <div class="title">
                                                                <p><?= $row['name'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="body">
                                                            <div class="content-body">
                                                                <?php
                                                                if ($row['user_type'] == 1) {
                                                                    if(count($data_ep2) == 0){
                                                                        $name_author = $_SESSION['login']['name'];
                                                                    }else{
                                                                        $name_author = array_values($data_ep2)[0]->com_name;
                                                                    }
                                                                } else {
                                                                    $name_author = $data[$row['id_user']]->ep_name;
                                                                }
                                                                ?>
                                                                <p>Người tạo: <span><?= $name_author ?></span></p>
                                                                <p>Thời gian tạo: <?php
                                                                                    echo date('H:i', $row['created_at']) . ", " . date('d/m/Y', $row['created_at']);
                                                                                    ?></p>
                                                                <p>Cập nhật mới nhất: <?php
                                                                                        echo date('H:i', $row['updated_at']) . ", " . date('d/m/Y', $row['updated_at']);
                                                                                        ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- end bài viết  -->
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
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script defer type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script defer src="../js/caidat.js"></script>
<script defer type="text/javascript" src="../js/datjs.js"></script>
<script defer type="text/javascript" src="../js/datvalidate.js"></script>
<script defer type="text/javascript" src="../js/nguyen_tac.js"></script>
<script type="text/javascript">
    $('.active3').css('background', ' #2E3994');
</script>

</html>
<?php 
include("config.php"); 
require_once '../config/config.php';
require_once '../includes/check_login.php';
require_once '../includes/check_account.php';
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';
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

$curl 	= curl_init();
curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => 'https://chamcong.24hpay.vn/api_web_hr/ttvh_get_list_employee_leader_from_company.php?id_com='. $_SESSION['login']['id_com'],
	CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
	CURLOPT_HTTPHEADER => $header,
    CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
));
$resp = curl_exec($curl);
$data_manager = json_decode($resp)->data->items;
if(count($list_department) == 0){
    header("Location: /quan-ly-chung.html");
}
if ($_SESSION['login']['user_type'] == 1) {
    $dep_name = $list_department[0]->dep_name;
    $dep_id = $list_department[0]->dep_id;
    $total_emp = $list_department[0]->total_emp;
    $dep_create_time = $list_department[0]->dep_create_time;
    $dep_create_time = strtotime($dep_create_time);
}else{
    $dep_name = $data_ep[$_SESSION['login']['id']]->dep_name;
    $dep_id = $data_ep[$_SESSION['login']['id']]->dep_id;
    for ($i=0; $i < count($list_department); $i++) { 
        if ($list_department[$i]->dep_id == $dep_id) {
            $total_emp = $list_department[$i]->total_emp;
            $dep_create_time = $list_department[$i]->dep_create_time;
            $dep_create_time = strtotime($dep_create_time);
            break;
        }
    }
}
$user_manager = [];
for ($i=0; $i < count($data_manager); $i++) { 
    if ($data_manager[$i]->dep_id == $dep_id) {
        $user_manager[$data_manager[$i]->ep_id]['ep_id'] = $data_manager[$i]->ep_id;
        $user_manager[$data_manager[$i]->ep_id]['ep_name'] = $data_manager[$i]->ep_name;
        if ($data_manager[$i]->ep_image = "") {
            $img_manager = '../img/avatar_default.png';
        }else{
            $img_manager = 'https://chamcong.24hpay.vn/upload/employee/' . $data_manager[$i]->ep_image;
        }
        $user_manager[$data_manager[$i]->ep_id]['ep_image'] = $img_manager;
        if ($data_manager[$i]->position_id == 5) {
            $user_manager[$data_manager[$i]->ep_id]['position'] = "Trưởng phòng";
        }else if($data_manager[$i]->position_id == 6){
            $user_manager[$data_manager[$i]->ep_id]['position'] = "Phó phòng";
        }
    }
}
$db = new db_query("SELECT * FROM department WHERE dep_id = $dep_id");
if (mysql_num_rows($db->result) == 0) {
    $data = [
        'dep_id' => $dep_id,
        'id_company' => $_SESSION['login']['id_com'],
        'created_at' => time(),
        'updated_at' => time()
    ];
    add('department',$data);
    $id = mysql_insert_id();
    $db = new db_query("SELECT * FROM department WHERE id = $id");
}
$row_d_g = mysql_fetch_array($db->result);
// echo "<pre>";
// print_r($data_ep);
// die;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Danh sách phòng ban</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="../css/caidat.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/vanhoadoanhnghiep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/danh_sach_phong_ban.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="vanhoadoanhnghiep" class="co-sidebar-phai">
        <div class="wapper">
            <!--  sidebar -->
            <?php include '../includes/cd_sidebar.php'?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!--     header -->
                <?php include '../includes/cd_header.php'?>
                <!-- end header -->
                <!--  center -->
                <div id="center" class="v_center_thutuceo">
                    <!--  bài viết-->
                    <div class="baiviet">
                        <div id="main-baiviet" class="main-baiviet">
                            <ul>
                                <li class="danhsachphongban  ">
                                    <div class="header-phongban header-ngu">
                                        <p>Danh sách nhóm phòng - ban trong công ty</p>
                                    </div>
                                    <div class="body-phongban body-ngu ">
                                        <div class="info pb">
                                            <div class="img">
                                                <div class="log">
                                                    <img src="../img/vh_8.png">
                                                </div>
                                                <div class="cont v_vhdn_pb_cont">
                                                    <p class="v_name_gr_dep"><?=$dep_name?></p>
                                                    <p class="v_count_gr_dep"><?=$total_emp?> thành viên</p>
                                                </div>
                                            </div>
                                            <div class="edit">
                                                <img src="../img/bacham.png">
                                                <div class="v_edit_detail v_edit_group">
                                                    <div class="v_edit1 v_edit_department" data-dep_id="<?=$dep_id?>" data-group_id="">
                                                        <img src="../img/v_chinhsuaphongban.svg" alt="Ảnh lỗi">
                                                        <div class="v_edit1_text">Chỉnh sửa nhóm phòng - ban</div>
                                                    </div>
                                                    <div class="v_edit1 v_del_department" data-group_id="" style="display: none;">
                                                        <img src="../img/v_xoanhomphongban.svg" alt="Ảnh lỗi">
                                                        <div class="v_edit1_text">Xóa nhóm phòng - ban</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="congviec pb">
                                            <div class="title">
                                                <p>Công việc chính</p>
                                            </div>
                                            <div class="content">
                                                <p class="v_content_des">
                                                    <?php
                                                    if ($row_d_g['description'] == "") {
                                                        echo "Chưa cập nhật";
                                                    }else{
                                                        echo $row_d_g['description'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="quanly pb">
                                            <div class="title">
                                                <p>Thành viên quản lý</p>
                                            </div>
                                            <div class="container v_container_ql">
                                                <?php
                                                if (count($user_manager) == 0) {
                                                    echo "Chưa cập nhật";
                                                }else{
                                                    foreach ($user_manager as $key => $value) {
                                                        if ($user_manager[$key]['ep_image'] == "") {
                                                            $user_manager_img = '../img/logo_com.png';
                                                        }else{
                                                            $user_manager_img = $user_manager[$key]['ep_image'];
                                                        }
                                                ?>
                                                <div class="thanhvien-ql">
                                                    <div class="img">
                                                        <img src="<?=$user_manager_img?>" onerror='this.onerror=null;this.src="../img/logo_com.png";'>
                                                    </div>
                                                    <div class="cont cont_baiviet_tt_sdn">
                                                        <p class="ten"><?=$user_manager[$key]['ep_name']?></p>
                                                        <p class="chucvu"><?=$user_manager[$key]['position']?></p>
                                                        <p class="id">ID : <?=$user_manager[$key]['ep_id']?></p>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>

                                        </div>
                                        <div class="thanhvien">
                                            <div class="title">
                                                <p>Thành viên khác</p>
                                            </div>
                                            <div class="avt v_avt_employee">
                                            <?php
                                                foreach ($data_ep2 as $key => $value) {
                                                    if ($data_ep2[$key]->dep_id == $dep_id) {
                                                        if ($data_ep2[$key]->ep_image == '') {
                                                            $ep_image = '../img/avatar_default.png';
                                                        }else{
                                                            $ep_image = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep2[$key]->ep_image;
                                                        }
                                            ?>
                                                    <div class="img">
                                                        <img src="<?=$ep_image?>" class="v_avt_ep_image">
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
                        <div class="dropdown">
                            <div class="menu-phu">
                                <button class="dropbtn">
                                    <div class="menu-phu-d " id="menu-phu-d-name">
                                        <div class="img">
                                            <img src="../img/v_5.png">
                                        </div>
                                        <div class="cont">
                                            <p>Danh sách phòng ban</p>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-content congty-info">
                                    <a href="vhdn-thu-tu-seo.html" class="menu-phu-d " id="d_thutuceo"
                                        data-id='thutuceo'>
                                        <div class="img">
                                            <img src="../img/v_1.png">
                                        </div>
                                        <div class="cont">
                                            <p>Thư từ CEO</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-tam-nhin-su-menh.html" class="menu-phu-d " id="d_tamnhin"
                                        data-id='tamnhin'>
                                        <div class="img">
                                            <img src="../img/v_2.png">
                                        </div>
                                        <div class="cont">
                                            <p>Tầm nhìn - Sứ mệnh</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-gia-tri-muc-tieu.html" class="menu-phu-d " id="d_giatri"
                                        data-id='giatri-muctieu '>
                                        <div class="img">
                                            <img src="../img/v_3.png">
                                        </div>
                                        <div class="cont">
                                            <p>Giá trị cốt lõi - Mục tiêu chiến lược</p>
                                        </div>
                                    </a>
                                    <a href="vhdn-nguyen-tac-lam-viec.html" class="menu-phu-d " id="d_nguyentac"
                                        data-id="nguyentaclamviec">
                                        <div class="img">
                                            <img src="../img/v_4.png">
                                        </div>
                                        <div class="cont">
                                            <p>Nguyên tắc làm việc</p>
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
                        <div class="img nut-hientrang">
                            <img id="icon-menu" src="../img/icon_menu.png">
                        </div>
                        <div class="trang v_trang1">
                            <div class="icon-menu">
                                <div class="container" id="hien-trang">
                                    <div class=" icon-trong">
                                        <div class="img">
                                            <img id="icon-quayve" src="../img/icon_menu.png">
                                        </div>
                                    </div>
                                    <div class="danhsachphongban content-phu">
                                        <div class="header header-ngu">
                                            <div class="title">
                                                <p class="v_trang1_dep_name"><?=$dep_name?></p>
                                            </div>
                                        </div>
                                        <div class="body v_phongbanhientai">
                                            <div class="content-body content-b">
                                                <div class="v_phongban_title v_trang1_mode">Nhóm công khai</div>
                                                <div class="v_phongban_title">Người tạo: <span class="v_nguoitao"><?=$_SESSION['login']['name']?></span></div>
                                                <div class="v_phongban_title v_created_at">Thời gian tạo: <?=date('H:i',$dep_create_time)?>, <?=date('d/m/Y',$dep_create_time)?></div>
                                                <div class="v_phongban_title v_updated_at">Cập nhật mới nhất: <?=date('H:i',$dep_create_time)?>, <?=date('d/m/Y',$dep_create_time)?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end  popup tin nhắn trong center -->
                        </div>
                        <div class="trang">
                            <div class="icon-menu">
                                <div class="container" id="hien-trang">
                                    <div class=" icon-trong">
                                        <div class="img">
                                            <img id="icon-quayve" src="../img/icon_menu.png">
                                        </div>
                                    </div>
                                    <div class="danhsachphongban   content-phu">
                                        <div class="header header-ngu">
                                            <div class="title">
                                                <p>Danh sách nhóm - thảo luận</p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="content-body content-b v_list_group">
                                                <?php
                                                if ($_SESSION['login']['user_type'] == 2) {
                                                ?>
                                                <p class="v_department_name"><?=$dep_name?></p>
                                                <?php
                                                }else if ($_SESSION['login']['user_type'] == 1) {
                                                    for ($i=0; $i < count($list_department); $i++) { 
                                                ?>
                                                    <p class="v_department_name" data-dep_id="<?=$list_department[$i]->dep_id?>"><?=$list_department[$i]->dep_name?></p>
                                                <?php
                                                    }
                                                ?>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                $db_group = new db_query("SELECT * FROM `group` WHERE id_company = " . $_SESSION['login']['id_com']);
                                                while($row = mysql_fetch_array($db_group->result)){
                                                ?>
                                                <p class="v_department_name" data-group_id="<?=$row['id']?>"><?=$row['group_name']?></p>
                                                <?php
                                                }
                                                ?>
                                            </div>
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
<script type="text/javascript">
    $('.active3').css('background',' #2E3994');
</script>
</html>
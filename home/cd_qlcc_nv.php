<?php 
require_once '../includes/check_login.php';
require_once '../api/api_ct.php';
require_once '../includes/check_account.php';
require_once '../api/api_nv.php';
include("config.php");
$dep = [];
for ($i=0; $i < count($list_department); $i++) { 
  $dep[$list_department[$i]->dep_id] = $list_department[$i];
}
?>
<!DOCTYPE html>
<html lang="vi">  
<head>
  <title>Cài đặt quản lý</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow">
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/caidat.css?v=<?=$ver?>">
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_setting.css?v=<?= $version?>">
  <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../ckeditor/ckeditor.js"></script> 
</head>
<body>
<!-- ql_dldx  -->
<div class="ql_dldx">
  <!-- wapper -->
  <div class="wapper">
  <!--  sidebar -->
  <?php include '../includes/cd_sidebar.php'?>
  <!-- end side bar -->
  <div id="cdnhanvienc" class="cdnhanvienc">
		<!--     header -->
		<?php include '../includes/cd_header.php'?>
		<!-- end header -->
    	<!--  center -->
    	<div class="box_main">
    		<div class="box_center">
          <div class="box_manage">
            <div class="manage_header_hover">
              <p class="title_hover">Cài đặt chung</p>
            </div>
            <div class="manage_header">
              <div class="li_manage active " data-id='manage_cdc'>
                <p class="title_manage ">Cài đặt chung</p>
              </div>
              <div class="li_manage " data-id='manage_ttbm'>
                <p class="title_manage ">Thông tin bảo mật</p>
              </div>
              <div class="li_manage " data-id='manage_nkhd'>
                <p class="title_manage ">Nhật ký hoạt động</p>
              </div>
              <div class="li_manage " data-id='manage_dstv'>
                <p class="title_manage  ">Danh sách thành viên</p>
              </div>
              <div class="li_manage " data-id='manage_group_tl'>
                <p class="title_manage">Nhóm - thảo luận</p>
              </div>
            </div>
            <div class="manage_main">
              <!-- cai dat chung -->
              <div class="manage_cdc">
                <div class="language row_cdc d_flex">
                  <div class="title_left">
                    <p>Ngôn ngữ</p>
                  </div>
                  <div class="item_right">
                    <label for="vietnamese" class="flex_language">
                      <input type="radio" id="vietnamese" checked name="language" value="vietnamese"  class="check_language">
                      <span class="color_blue span_language" >Tiếng Việt (Vietnamese)</span>
                    </label>
                    <label for="english" class="english flex_language">
                      <input type="radio" id="english" class="check_language" value="english" name="language" >
                      <span class="color_x span_language">Tiếng anh (English)</span>
                    </label>
                  </div>
                </div>
                <div class="display row_cdc d_flex">
                  <div class="title_left">
                    <p>Giao diện : <span class="chuthuong">Mặc định</span></p>
                  </div>
                  <div class="item_right">
                    <div class="back_blue item_display">
                    </div>
                    <div class="back_white item_display">
                    </div>
                  </div>
                </div>
                <?php
                if ($_SESSION['login']['user_type'] == 3) {
                ?>
                <div class="quyen_user row_cdc d_flex">
                  <div class="title_left">
                    <p>Quyền người dùng</p>  
                  </div>   
                  <div class="item_right">
                    <?php
                    if($_SESSION['login']['user_type'] == 3){
                    ?>
                   <div class="custom_qnd show_popup_qlpqnd">
                     <p class="p_qnd">Tùy chỉnh</p>
                     <img src="../img/img17.png" alt="Ảnh lỗi">
                   </div>
                   <?php
                   }
                   ?>
                  </div>               
                </div>
                
                <div class="tb_nh row_cdc">
                  <div class="title_cdc">
                    <p>Quyền người dùng</p>  
                  </div> 
                  <div class="row_check_cdc">
                    <label for="" class="ckb_cdc">
                      <input type="checkbox" name="ckb_tb">
                      <span class="span_chk_tb">Nhận thông báo khi có thay đổi ở các nội dung tôi theo dõi</span>
                    </label>
                    <label for="" class="ckb_cdc">
                      <input type="checkbox" name="ckb_tb">
                      <span class="span_chk_tb">Nhận thông báo khi có thay đổi ở các nội dung tôi tạo ra</span>
                    </label>
                    <div class="" style="clear: both;"></div>
                  </div> 
                </div>

                <div class="tb_nh row_cdc">
                  <div class="title_cdc ">
                    <p>Quyền người dùng</p>  
                  </div>  
                  <div class="row_check_cdc">
                    <label for="" class="ckb_cdc">
                      <input type="checkbox" name="ckb_nn">
                      <span class="span_chk_tb">Nhắc nhở khi tất cả các nội dung tôi xem được đến hạn/quá hạn</span>
                    </label>
                    <label for="" class="ckb_cdc">
                      <input type="checkbox" name="ckb_nn">
                      <span class="span_chk_tb">Nhắc nhở khi các nội dung tôi theo dõi đến hạn/quá hạn</span>
                    </label>
                    <label for="" class="ckb_cdc">
                      <input type="checkbox" name="ckb_nn">
                      <span class="span_chk_tb">Nhắc nhở khi có các nội dung tôi tạo ra đến hạn/quá hạn</span>
                    </label>
                    <div class="" style="clear: both;"></div>
                  </div>
                </div>
                <?php
                }
                ?>
              </div>
              <!-- end cai dat chung -->
              <!-- thong tin ca nhan -->
              <div class="manage_ttcn" >
                <div class=" row_ttcn_d1">
                  <div class="d_flex">
                    <div class="col_tncn_left">
                      <div class="img_ttcn">
                        <img class="v_avatar_config" src="<?=$_SESSION['login']['logo']?>" onerror="v_onerror(this)" alt="Ảnh lỗi">
                      </div>
                      <div class="text_ttcn">
                        <p class="name_ttcn color_x">
                          <b><?=$_SESSION['login']['name']?></b>
                          <span class="show_popup_edit_tncn icon_show_ttcn " ></span>
                        </p>
                        <p class="color_x the_p_2"><b>Bộ phận:</b> Thiết Kế</p>
                        <p class="color_x the_p_2"><b>Chức vụ:</b> Quản lý cấp cao</p>
                      </div>
                    </div>
                    <div class="col_tncn_right">
                      <div class="btn_csttcn show_popup_edit_tncn">
                        <p class="the_p_2 color_blue"><b>Chỉnh sửa thông tin cá nhân</b></p>
                        <img src="../img/img19.png" alt="Ảnh lỗi">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row_ttcn ">
                  <?php 
                    if ($_SESSION['login']['user_type'] != 1) {
                  ?>
                  <div class="col_tncn_left">
                   <p class="the_p_3 color_x"><b>Giới tính: </b> Nam </p>
                  </div>
                  <?php
                    }
                   ?>
                  <div class="col_tncn_right">
                    <?php 
                      if ($_SESSION['login']['user_type'] == 1) {
                    ?>
                        <p class="the_p_3 color_x"><b>ID:  </b> <?=$_SESSION['login']['id']?> </p>
                    <?php
                      }
                    ?>
                  </div>
                </div>
                <div class="row_ttcn ">
                  <div class="col_tncn_left">
                    <?php 
                    $date = strtotime($_SESSION['login']['com_create_time']);
                    if ($_SESSION['login']['user_type'] == 1) {
                      $create_at = '<b>Ngày thành lập:  </b> ' .date('d/m/Y',$date);
                    }else{
                      $create_at = '<b>Ngày sinh:  </b> ' . date('d/m/Y',$date);
                    }
                    ?>
                    <p class="the_p_3 color_x"><?=$create_at?></p>
                  </div>
                  <div class="col_tncn_right">
                    <p class="the_p_3 color_x"><b>Chức vụ: </b> Quản lý cấp cao  </p>
                  </div>
                </div>
                <div class="row_ttcn ">
                  <div class="col_tncn_left">
                    <p class="the_p_3 color_x"><b>Số điện thoại:  </b> <?=$_SESSION['login']['phone']?></p>
                  </div>
                  <div class="col_tncn_right">
                    <p class="the_p_3 color_x"><b>Emai: </b> <?=$_SESSION['login']['email']?> </p>
                  </div>
                </div>
                <div class="row_ttcn ">
                  <div class="col_tncn_left">
                    <p class="the_p_3 color_x"><b>Địa chỉ: </b><?=$_SESSION['login']['address']?></p>
                  </div>
                  <?php
                  if ($_SESSION['login']['user_type'] != 1) {
                  ?>
                  <div class="col_tncn_right">
                    <p class="the_p_3 color_x"><b>Quên quán:  </b> Hà Nội</p>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <?php
                if ($_SESSION['login']['user_type'] != 1) {
                ?>
                <div class="row_ttcn ">
                  <div class="col_tncn_left">
                    <p class="the_p_3 color_x"><b>Tình trạng hôn nhân:  </b> Đã có gia đình </p>
                  </div>
                  <div class="col_tncn_right">
                    <p class="the_p_3 color_x"><b>Ngày bắt đầu làm việc:  </b> 10/10/2000 </p>
                  </div>
                </div>
                <div class="row_ttcn ">
                  <div class="col_tncn_left">
                    <p class="the_p_3 color_x"><b>Tình độ học vấn: </b> Tốt nghiệp Đại học ABC </p>
                  </div>
                </div>
                <?php
                }
                ?>
               
              </div>
              <!-- end thong tin ca nhan -->
              <!-- thong tin bao mat-->
              <div class="manage_ttbm"  >
                <div class=" row_ttcn_d1">
                  <div class="d_flex">
                    <div class="col_tncn_left">
                      <div class="img_ttcn">
                        <img src="<?=$_SESSION['login']['logo']?>" class="v_avatar_user" alt="Ảnh lỗi">
                      </div>
                      <div class="text_ttcn">
                        <p class="name_ttcn color_x"><b><?=$_SESSION['login']['name']?></b></p>
                        <?php
                        if ($_SESSION['login']['user_type'] != 1) {
                        ?>
                        <p class="color_x the_p_2"><b>Bộ phận:</b> <?=$data_ep[$_SESSION['login']['id']]->dep_name?></p>
                        <p class="color_x the_p_2"><b>Chức vụ:</b> <?=position_user(array_values($data_ep)[0]->position_id)?></p>
                        <?php
                        }else{
                        ?>
                        <p class="color_x the_p_2"><b>Chức vụ:</b> Quản lí cấp cao</p>
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col_tncn_right">
                     
                    </div>
                  </div>
                </div><div class=""></div>
                <div class="manage_ttbm_main">
                  <div class="row_ttbn">
                    <div class="ttbm_thead">
                      <p class="tieude_con">Nơi bạn đã đăng nhập</p>
                    </div>
                    <div class="ttnm_tbody v_ttnm_tbody">
                      <!-- item_ttnm -->
                      <?php
                      $db_devices = new db_query("SELECT * FROM devices WHERE id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
                      while($row = mysql_fetch_array($db_devices->result)){
                      ?>
                      <div class="v_item_ttnm item_ttnm">
                        <div class="item_ttnm_left">
                          <img src="../img/img20.png" alt="Ảnh lỗi">
                          <p class="thep_ttnm color_x">window. Hanoi, Vietnam</p>
                          <!-- <p class="thep_ttnm color_x"><?=$row['device_name']?> . <?=$row['address']?></p> -->
                        </div>
                        <div class="item_ttnm_right">
                          <p class="thep_ttnm cursor color_blue show_popup_logout_equipment">Đăng xuất</p>
                          <img src="../img/img21.png" alt="Ảnh lỗi" class="show_popup_logout_equipment">
                        </div>
                      </div>
                      <?php
                      }
                      ?>
                      <!-- item_ttnm -->
                      <!-- <div class="item_ttnm">
                        <div class="btn_see_move">
                          <p class="the_p_semove color_blue">
                            Xem thêm
                          </p>
                          <img src="../img/img22.png" alt="Anh loi">
                        </div>
                      </div> -->
                      <!-- end item_ttnm -->
                    </div>
                  </div>

                  <div class="row_ttbn">
                    <div class="ttbm_thead">
                      <p class="tieude_con"></p>
                    </div>
                    <div class="ttnm_tbody">
                      <!-- item_ttnm -->
                      <div class="item_ttnm">
                        <div class="item_ttnm_left">
                          <img src="../img/img23.png" alt="Anh loi">
                          <p class="thep_ttnm color_x">Đổi mật khẩu</p>
                        </div>
                        <a href="https://chamcong.timviec365.vn/" target="_blank" class="item_ttnm_right">
                          <p class="thep_ttnm color_blue cursor">Chỉnh sửa</p>
                          <img src="../img/img24.png" alt="Anh loi" class="">
                        </a>
                      </div>
                      <!-- end item_ttnm -->
                      <!-- item_ttnm -->
                      <div class="item_ttnm">
                        <div class="item_ttnm_left">
                          <img src="../img/img25.png" alt="Anh loi">
                          <p class="thep_ttnm color_x">Lưu thông tin đăng nhập của bạn</p>
                        </div>
                        <div class="item_ttnm_right">
                          <input type="checkbox" name="" class="chb_ttnm">
                        </div>
                      </div>
                      <!-- end item_ttnm -->
                      <!-- item_ttnm -->
                      <div class="item_ttnm">
                        <div class="item_ttnm_left">
                          <img src="../img/img26.png" alt="Anh loi">
                          <p class="thep_ttnm color_x">Nhận cảnh báo về những lần đăng nhập lạ</p>
                        </div>
                        <div class="item_ttnm_right">
                          <input type="checkbox" name="" class="chb_ttnm">
                        </div>
                      </div>
                      <!-- end item_ttnm -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- end thong tin bao mat -->
              <!-- nhat ki hoat dong -->
              <div class="manage_nkhd">
                <div class="row_search">
                  <input type="text" placeholder="Tìm kiếm hoạt động">
                  <span class="serch"></span>
                </div>
                <div class="nkhd_main">
                  <!-- row_main_nkdh -->
                  <?php
                  $time = time();
                  $today = date("Y-m-d",$time);
                  $today = strtotime($today);
                  ?>
                  <div class="row_main_nkdh">
                    <div class="nkdh_header">
                      <p class="btn_toggle_row_del">
                        Hôm nay
                      </p>
                      <img src="../img/img14.png" alt="Anh loi" class="btn_toggle_row_del muiten_xoay">
                    </div>
                    <div class="nkdh_body">
                      <!-- item_nkdh -->
                      <?php
                      $db_vision_mission = new db_query("SELECT * FROM vision_misson WHERE id_company = " . $_SESSION['login']['id_com'] . " AND updated_at > $today AND updated_at < $today + 86400");
                      while($row_vs = mysql_fetch_array($db_vision_mission->result)){
                      ?>
                      <a href="/vhdn-tam-nhin-su-menh.html" class="item_nkdh">
                        <div class="col_item_nkdh">
                          <p class="the_p_nkhd"><b>> Văn hóa doanh nghiệp < Sứ mệnh</b></p>
                          <p class="the_p_nkhd"><?=$_SESSION['login']['name']?> đã cập nhật tầm nhìn - sứ mệnh công ty</p>
                        </div>
                        <div class="col_item_nkdh">
                          <p class="the_p_nkhd"><b><?php
                          echo date('H',$row_vs['updated_at']) . "h" . date('i',$row_vs['updated_at']);
                          ?></b></p>
                        </div>
                        <div class="col_item_nkdh">
                          <img src="../img/img30.png" alt="Anh loi" class="show_popup_del_nkhd">
                        </div>
                      </a>
                      <?php
                      }
                      ?>
                      <!-- end item_nkdh -->
                    </div>
                  </div>
                  <!-- end row_main_nkdh -->
                  <div class="row_main_nkdh">
                    <div class="nkdh_header">
                      <p class="btn_toggle_row_del">
                        Hôm qua
                      </p>
                      <img src="../img/img14.png" alt="Anh loi" class="btn_toggle_row_del muiten_xoay">
                    </div>
                    <div class="nkdh_body">
                      <!-- item_nkdh -->
                      <?php
                      $db_vision_mission = new db_query("SELECT * FROM vision_misson WHERE id_company = " . $_SESSION['login']['id_com'] . " AND updated_at > $today - 86400 AND updated_at < $today");
                      while($row_vs = mysql_fetch_array($db_vision_mission->result)){
                      ?>
                      <a href="/vhdn-tam-nhin-su-menh.html" class="item_nkdh">
                        <div class="col_item_nkdh">
                          <p class="the_p_nkhd"><b>> Văn hóa doanh nghiệp < Sứ mệnh</b></p>
                          <p class="the_p_nkhd"><?=$_SESSION['login']['name']?> đã cập nhật tầm nhìn - sứ mệnh công ty</p>
                        </div>
                        <div class="col_item_nkdh">
                          <p class="the_p_nkhd"><b><?php
                          echo date('H',$row_vs['updated_at']) . "h" . date('i',$row_vs['updated_at']);
                          ?></b></p>
                        </div>
                        <div class="col_item_nkdh">
                          <img src="../img/img30.png" alt="Anh loi" class="show_popup_del_nkhd">
                        </div>
                      </a>
                      <?php
                      }
                      ?>
                      <!-- end item_nkdh -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- end nhat ki hoat dong -->
              <!-- manage_dstv -->

              <div class="manage_dstv "  >
                <!-- neu dang nhap bang quyen nha vien thi them class manage_dstv_nv_quen manage_dstv_nv_quen  -->
                <form class="row_search">
                  <input type="text" placeholder="Tìm kiếm thành viên" class="search_member">
                  <button class="v_btn_search"><img src="../img/img28.png" alt="Ảnh lỗi"></button>
                </form>
                <div class="main_dstv">
                  <table class="table_dstv">
                    <thead>
                      <tr>
                        <th>Id nhân viên</th>
                        <th>Họ và tên</th>
                        <th>Phòng ban</th>
                        <th>Vị trí</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái đăng ký</th>
                        <th>Chi tiết</th>
                      </tr>
                    </thead>
                    <tbody class="v_list_employee">
                    <?php
                      foreach ($data_ep2 as $key => $value) { 
                        $dep_id = $data_ep2[$key]->dep_id;
                    ?>
                      <tr>
                        <td><?=$data_ep2[$key]->ep_id?></td>
                        <td><?=$data_ep2[$key]->ep_name?></td>
                        <td><?php
                          
                          if ($dep_id != "") {
                            if (isset($dep[$dep_id])) {
                              echo $dep[$dep_id]->dep_name;
                            }
                          }
                        ?></td>
                        <td>Nhân viên</td>
                        <td><?=$data_ep2[$key]->ep_email?></td>
                        <td><?=$data_ep2[$key]->ep_phone?></td>
                        <?php
                        if ($data_ep2[$key]->ep_status == 'Active') {
                          $status = 'Đã duyệt';
                          $data_id = 'onclick="detail_eployee(this)"';
                        }else if($data_ep2[$key]->ep_status == 'Pending'){
                          $status = 'Chờ duyệt';
                          $data_id = 'onclick="detail_eployee(this)"';
                        }else if ($data_ep2[$key]->ep_status == 'Deny') {
                          $status = 'Đã từ chối';
                          $data_id = '';
                        }
                        ?>
                        <td class="color_cd cursor show_popup_ctnvcpd" data-id="<?=$data_ep[$key]->ep_id?>" <?=$data_id?> ><?=$status?></td>
                        <td class="color_ct cursor show_popup_ctnv" data-id="<?=$data_ep[$key]->ep_id?>" onclick="detail_eployee(this)">Chi tiết</td>
                      </tr>
                    <?php
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end manage_dstn -->
              <!-- Nhóm thảo luận -->
              <div class="manage_group_tl " >
                <!-- neu dang nhap bang quyen nha vien thi them class manage_dstv_nv_quen  manage_dstv_nv_quen-->

                <div class="group_tl_header">
                  <div class="search_left">
                    <input type="text" id="v_search_group" name="" placeholder="Tìm kiếm nhóm - thảo luận">
                    <span class=""></span>
                  </div>
                  <?php
                  if($_SESSION['login']['user_type'] == 1){
                  ?>
                    <div class="btn_create_group_tl ">
                      <img src="../img/img29.png" alt="Ảnh lỗi">
                      <p class="the_p">Thêm nhóm - thảo luận</p>
                    </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="group_tl_body">
                  <table class="group_tl_table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Nhóm - thảo luận</th>
                        <th>Quản trị</th>
                        <th>Số lượng thành viên</th>
                        <th>Chế độ</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="v_tbody_group">
                      <?php
                      $j = 1;
                      $db_group = new db_query("SELECT * FROM `group` WHERE id_company = " . $_SESSION['login']['id'] . " ORDER BY id DESC");
                      while($row_group = mysql_fetch_array($db_group->result)){
                        $id_manager = explode(",", $row_group['id_manager']);
                        $id_employee = explode(",", $row_group['id_employee']);
                        $count_member = array_unique(array_merge($id_employee,$id_manager));
                        $name_manage = "";
                        for ($i=0; $i < count($id_manager); $i++) { 
                            $info_ep = getEmployee($id_manager[$i]);
                            if ($i == count($id_manager) - 1) {
                              $name_manage = $name_manage . $info_ep->data->items[0]->ep_name;
                            }else{
                              $name_manage = $name_manage . $info_ep->data->items[0]->ep_name . ", ";
                            }
                        }
                      ?>
                      <tr class="v_tr_group">
                        <td><?=$j?></td>
                        <td><?=$row_group['group_name']?></td>
                        <td><?=$name_manage?></td>
                        <td><?=count($count_member)?> thành viên</td>
                        <td><?php 
                        if ($row_group['group_mode'] == 0) {
                          echo "Công khai";
                        }else{
                          echo "Riêng tư";
                        }
                        ?></td>
                        <td>
                          <?php
                          if($_SESSION['login']['user_type'] == 1){
                          ?>
                          <img src="../img/img32.png" alt="Ảnh lỗi" data-group_id="<?=$row_group['id']?>" class="show_model_del_group_tl" onclick="delete_group(this)">
                          <?php
                          }
                          ?>
                        </td>
                      </tr>
                      <?php
                        $j++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end nhóm thảo luận -->
            </div>
          </div>
    		</div>
    	</div>
    	<!-- end center -->
  </div>
  <!-- popup  -->
  <div class="cd-popup " id="popup_qlpqnd" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="cd_modal_header">
          <h4 class="name_header">Quản lý phân quyền người dùng</h4>
          <img src="../img/dau_x.png" alt="Anh loi" class="close_detl">
        </div>
        <div class="cd_modal_body">
          <form class="" method="" action="">
              <div class="form-body">
                <div class="form_group">
                  <label class="name">Quản trị<span class="cr_red">*</span></label>
                  <div class="form_select2">
                    <select class="select2_muti_tv v_select2_phanquyen" id="select2_muti_tv" multiple>
                      <?php
                      foreach ($data_ep as $key => $value) {
                      ?>
                      <option value="<?=$key?>"><?=$data_ep[$key]->ep_name?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form_group">
                  <table class="tbl_qlpqnd">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Tạo mới</th>
                        <th>Xóa</th>
                        <th>Xem</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($_SESSION['login']['user_type']) {
                        $db_module3 = new db_query("SELECT * FROM module");
                        while($row_module3 = mysql_fetch_array($db_module3->result)){
                      ?>
                      <tr data-module_id="<?=$row_module3['id']?>" class="v_module_id">
                        <td><?=$row_module3['module_name']?></td>
                        <td><input type="checkbox" class="chk_qlpqnd chk_qlpqnd_create" disabled></td>
                        <td><input type="checkbox" class="chk_qlpqnd chk_qlpqnd_delete" disabled></td>
                        <td><input type="checkbox" class="chk_qlpqnd chk_qlpqnd_seen" disabled></td>
                      </tr>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="cd-popup" id="popup_edit_tncn" >
    <div class="cd_container" >
      <div class="cd_modal">
        <div class="cd_modal_header">
          <h4 class="name_header">Chỉnh sửa thông tin cá nhân</h4>
          <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
        </div>
        <div class="cd_modal_body">
          <?php 
          if ($_SESSION['login']['user_type'] == 1) {
            $action = '../handle/update_user_info_company.php';
          }else{
            $action = '../handle/update_user_info_employee.php';
          }
          ?>
          <form class="frm_edit_tncn" method="POST" action="<?=$action?>">
            <div class="form-body">
              <div class="form_group">              
                <label for="" class="name">Họ tên<span class="cr_red">*</span></label>
                <input type="text" class="frm_input" name="txt_name_user" value="<?=$_SESSION['login']['name']?>" placeholder="Phạm Văn Minh">
              </div>
              <?php
              if ($_SESSION['login']['user_type'] != 1) {
              ?>
              <div class="form_group form_chb d_flex ">
                <label for="" class="name">Giới tính<span class="cr_red">*</span></label>
                <!-- checked -->
                <div class="form_checkb d_flex ">
                  <label><input type="radio" name="rdb_gioitinh" checked ><span class="ckb_btn"><span class="nut_check"></span></span>Nam</label>
                  <label><input type="radio" name="rdb_gioitinh"><span class="ckb_btn"><span class="nut_check"></span></span>Nữ</label>
                </div>
              </div>
              <div class="form_group">
                <label class="name">Ngày sinh<span class="cr_red">*</span></label>
                <input type="date" value="" name="dtm_ngaysinh" value="2017-06-01">
              </div>
              <div class="form_group">
                <label class="name">Quê quán<span class="cr_red">*</span></label>
                <input type="text" value="" name="txt_quequan" placeholder="Hà Nội">
              </div>
              <?php
              }
              ?>
              <div class="form_group">
                <label class="name">Địa chỉ<span class="cr_red">*</span></label>
                <input type="text" value="<?=$_SESSION['login']['address']?>" name="txt_address" placeholder="Vĩnh Tuy- Hà Nội">
              </div>
              <div class="form_group">
                <label class="name">SĐT<span class="cr_red">*</span></label>
                <input type="text" value="<?=$_SESSION['login']['phone']?>" name="txt_phone" placeholder="123456789">
              </div>
              <?php
              if ($_SESSION['login']['user_type'] != 1) {
              ?>
              <div class="form_group">
                <label for="" class="name">Trình độ học vấn<span class="cr_red">*</span></label>
                <input type="text" value="" name="txt_hocvan" placeholder="Tốt nghiệp đại học hạng giỏi">
              </div>
              <div class="form_group">
                <label for="" class="name">Tình trạng hôn nhân<span class="cr_red">*</span></label>
                <input type="text" value="" name="txt_tthn" placeholder="Đã có gia đình">
              </div>
              <div class="form_group">
                <label for="" class="name">Ngày bắt đầu làm việc<span class="cr_red">*</span></label>
                <input type="date" value="" name="dtm_nlv" value="2017-06-01">
              </div>
              <div class="form_group">
                <label for="" class="name">Chức vụ<span class="cr_red">*</span></label>
                <input type="txt" value="" name="txt_cv" placeholder="Nhân viên">
              </div>
              <?php
              }
              ?>
              <div class="form_buttom">
                  <button class="btn_huy" type="buttom">Hủy</button>
                  <button class="btn_luu" type="submit">Lưu thông tin</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="popup_edit_pass" id="popup_change_pass">
    <div class="cd_container">
      <div class="cd_modal">
        <div class="edit_pass_header">
          <div class="btn_back back_popup_change_pass">
            <img src="../img/img36.png" alt="Anh loi">
            <p >Trở về</p>
          </div>
        </div>
        <div class="edit_pass_body">
          <div class="title_popup">
            <p>Đổi mật khẩu</p>
          </div>
          <div class="form_group">
            <label for="" class="name">Nhập mật khẩu cũ<span class="cr_red">*</span></label>
            <input type="text" name="" placeholder="Nhập mật khẩu cũ">
          </div>
          <div class="form_group">
            <label for="" class="name">Nhập mật khẩu mới<span class="cr_red">*</span></label>
            <div class="input_pass_l">
              <input type="text" name="" placeholder="Nhập mật khẩu mới">
              <span class="show_pass"></span>
            </div>
            <div class="clear"></div>
          </div>
          <div class="form_group">
            <label for="" class="name">Nhập lại mật khẩu mới<span class="cr_red">*</span></label>
            <div class="input_pass_l">
              <input type="text" name="" placeholder="Nhập lại mật khẩu">
              <span class="show_pass"></span>
            </div>
            <div class="clear"></div>
          </div>
          <div class="form_buttom">
            <button type="button" class="btn_luu btn_submit">
              Lưu thay đổi
            </button>
          </div>
          <!-- <div class="text_qmk show_popup_quen_pass">
            <p>Quên mật khẩu?</p>
          </div> -->
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="popup_edit_pass" id="popup_quen_pass" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="edit_pass_header">
          <div class="btn_back close_popup_quen_pass">
            <img src="../img/img36.png" alt="Anh loi">
            <p>Trở về</p>
          </div>
        </div>
        <div class="edit_pass_body">
          <div class="title_popup">
            <p>Quên mật khẩu</p>
          </div>
          <div class="the_p_qmk">
            <p>Nhập email của bạn, mã khôi phục sẽ được gửi về email của bạn</p>
          </div>
          <div class="form_group">
            <label for="" class="name">Nhập email<span class="cr_red">*</span></label>
            <input type="text" name="" placeholder="Nhập mật khẩu cũ">
          </div>
         
          <div class="form_buttom">
            <button type="button" class="btn_luu submit_popup_quen_pass btn_submit">
              Khôi phục mật khẩu
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="popup_edit_pass" id="popup_khoiphuc_pass" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="edit_pass_header">
          <div class="btn_back cursor close_popup_khoiphuc_pass">
            <img src="../img/img36.png" alt="Anh loi">
            <p>Trở về</p>
          </div>
        </div>
        <div class="edit_pass_body">
          <div class="title_popup">
            <p>Khôi phục mật khẩu</p>
          </div>
          <div class="the_p_qmk">
            <p>Vui lòng nhập mã xác thực gồm 6 chữ số được gửi về email của bạn</p>
          </div>
          <div class="form_group">
            <label for="" class="name">Nhập mã xác thực<span class="cr_red">*</span></label>
            <input type="text" name="" placeholder="Nhập mã xác thực gồm 6 chữ số ">
          </div>
          <div class="form_group">
            <label for="" class="name">Nhập mật khẩu mới<span class="cr_red">*</span></label>
            <div class="input_pass_l">
              <input type="text" name="" placeholder="Nhập mật khẩu mới">
              <span class="show_pass"></span>
            </div>
            <div class="clear"></div>
          </div>
          <div class="form_group">
            <label for="" class="name">Nhập lại mật khẩu<span class="cr_red">*</span></label>
            <div class="input_pass_l">
              <input type="text" name="" placeholder="Nhập lại mật khẩu">
              <span class="show_pass"></span>
            </div>
            <div class="clear"></div>
          </div>
          <div class="form_buttom">
            <button type="button" class="btn_luu submit_khoiphuc_pass">
              Xác nhận (120s)
            </button>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="cd-cuccess popup_logout_equipment" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="form_success">
          <div class="img_success">
            <img src="../img/img34.png" alt="Anh loi">
          </div>
          <div class="text_success">
            <p class="text1">Bạn có chắc muốn đăng xuất khỏi thiết bị Máy tính  window 10? </p>
          </div>
          <div class="form_buttom">
            <button class="btn_huy" type="">Hủy</button>
            <button class="btn_luu submit_logout_eqm">Đăng xuất</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="cd-cuccess  popup_logout_eqm_success" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="form_success">
          <div class="img_success">
            <img src="../img/img12.png" alt="Anh loi">
          </div>
          <div class="text_success">
            <p class="text1">Bạn đã đăng xuất khỏi thiết bị Máy tính Window 10 thành công</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="cd-modal-del" id="popup_del_nkhd" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="cd_modal_header">
          <h4 class="name_header">Xóa nhật ký hoạt động</h4>
        </div>
        <div class="cd_modal_body">
          <form class="" method="" action="">
              <div class="form-body">
                <div class="row_modal_del">
                  <p class="p_popup_del"><b>Bạn có muốn xóa nhật ký hoạt động? </b></p>
                  <p class="p_popup_del">Bài viết này sẽ không thể khôi phục do không được lưu vào bộ nhớ tạm của hệ thống</p>
                </div>
                <div class="form_buttom">
                    <button class="btn_huy" type="button">Hủy</button>
                    <button class="btn_luu submit_popup_del_nkhd" type="button">Xóa</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="cd-cuccess  popup_sucuss_del_nkhd" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="form_success">
          <div class="img_success">
            <img src="../img/img12.png" alt="Anh loi">
          </div>
          <div class="text_success">
            <p class="text1">Bạn đã xóa nhật ký hoạt động thành công</p>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <div class="cd-popup popup_ctnv v_popup_detail_eployee" id="popup_ctnv" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="cd_modal_header">
          <h4 class="name_header">Chi tiết nhân viên</h4>
        </div>
        <div class="cd_modal_body">
          <div class="row1_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <div class="img_ctnv">
                <img class="v_ep_img" src="../img/avatar_default.png"  alt="Anh loi">
              </div>
              <div class="tt_ctnv">
                <p class="full_name">
                  Phạm Văn Minh
                </p>
                <p class="the_p5 v_dep_name"><b>Bộ phận:</b> <span></span></p>
                <p class="the_p5 v_position_id"><b>Vị trí:</b> <span></span></p>
              </div>
            </div>
            <div class="col_ctnv_right">
              <p class="ctnv_edit show_">
                Chỉnh sửa
              </p>
            </div>
          </div>  
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv v_ep_address"><b>Địa chỉ:</b> <span></span></p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_gender"><b>Giới tính:</b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv v_ep_address"><b>Quên quán: </b> Hà Nội</p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_ep_id"><b>ID: </b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv v_ep_birth_day"><b>Ngày sinh: </b> <span></span></p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_position_id"><b>Chức vụ: </b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv v_ep_email"><b>Emai: </b> <span></span></p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_ep_married"><b>Tình trạng hôn nhân:</b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv v_ep_phone"><b>Số điện thoại: </b> <span></span></p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_create_time"><b>Ngày bắt đầu làm việc: </b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left last_child">
              <p class="the_p_ctnv v_ep_exp"><b>Tình độ học vấn: </b> <span></span></p>
            </div>
          </div>
          <div class="form_buttom">
            <button class="btn_luu btn_close_ctnv">Đóng</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="cd-popup popup_ctnv v_popup_nv_cho_duyet" id="popup_ctnvcpd" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="cd_modal_header">
          <h4 class="name_header">Chi tiết nhân viên chờ duyệt</h4>
        </div>
        <div class="cd_modal_body">
          <div class="row1_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <div class="img_ctnv">
                <img class="v_ep_img" src="../img/avatar_default.png" alt="Anh loi">
              </div>
              <div class="tt_ctnv">
                <p class="full_name">
                  Phạm Văn Minh
                </p>
                <p class="the_p5 v_dep_name"><b>Bộ phận:</b> <span></span></p>
                <p class="the_p5 v_position_id"><b>Vị trí:</b> <span></span></p>
              </div>
            </div>
            <div class="col_ctnv_right">
            </div>
          </div>  
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv v_ep_address"><b>Địa chỉ:</b> <span></span></p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_gender"><b>Giới tính:</b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv"><b>Quên quán: </b> Hà Nội</p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_ep_id"><b>ID: </b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv v_ep_birth_day"><b>Ngày sinh: </b> <span></span></p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_position_id"><b>Chức vụ: </b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv v_ep_email"><b>Emai: </b> <span></span></p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_ep_married"><b>Tình trạng hôn nhân:</b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left">
              <p class="the_p_ctnv v_ep_phone"><b>Số điện thoại: </b> <span></span></p>
            </div>
            <div class="col_ctnv_right">
              <p class="the_p_ctnv v_create_time"><b>Ngày bắt đầu làm việc: </b> <span></span></p>
            </div>
          </div>
          <div class="row_modal_ctnv d_flex">
            <div class="col_ctnv_left last_child">
              <p class="the_p_ctnv v_ep_exp"><b>Tình độ học vấn: </b> <span></span></p>
            </div>
          </div>
          <div class="form_buttom">
            <button class="btn_huy submit_tuchoi_cd">Từ chối</button>
            <button class="btn_luu submit_duyet_cd" value="">Duyệt</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="cd-modal-del " id="popup_duyet_nv_succuss"  >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="cd_modal_header">
          <h4 class="name_header">Duyệt thành công</h4>
        </div>
        <div class="cd_modal_body">
          <form class="" method="" action="">
              <div class="form-body">
                <div class="row_modal_del">
                  
                  <p class="p_popup_del">Bạn đã duyệt thành công nhân viên này, người này đã trở thành nhân viên của bạn. Hệ thống đã gửi email thông báo đến nhân viên của bạn.</p>
                </div>
                <div class="form_buttom">
                    <button class="btn_luu submit_duyet_nv_succuss" type="button">Xong</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="cd-modal-del " id="popup_tuchoi_nv_succuss"  >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="cd_modal_header">
          <h4 class="name_header">Từ chối</h4>
        </div>
        <div class="cd_modal_body">
          <form class="" method="" action="">
              <div class="form-body">
                <div class="row_modal_del">
                  
                  <p class="p_popup_del">Bạn đã từ chối nhân viên này, người này sẽ không còn là nhân viên của bạn. Hệ thống đã gửi email thông báo đến nhân viên của bạn.</p>
                </div>
                <div class="form_buttom">
                    <button class="btn_luu submit_tuchoi_nv_succuss" type="button">Xong</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="cd-popup modal_create" id="popup_add_group_tl" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="cd_modal_header">
          <h4 class="name_header">Thêm nhóm - thảo luận</h4>
          <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
        </div>
        <div class="cd_modal_body">
          <form class="frm_add_group_tl" id="frm_add_group_tl">
              <div class="form-body">
                <div class="form_group">
                  <label class="name">Tên nhóm<span class="cr_red">*</span></label>
                  <input type="text" value="" id="v_group_name" name="txt_name_group" autocomplete="Off"  placeholder="Nhập tên nhóm">
                </div>
                <div class="form_group">
                  <label class="name">Quản trị<span class="cr_red">*</span></label>
                  <div class="form_select2">
                    <select class="select2_muti_qt" id="v_id_manager" multiple name="select2_qt[]">
                      <?php
                      foreach ($data_ep as $key => $value){ 
                      ?>
                      <option value="<?=$key?>"><?=$data_ep[$key]->ep_name?> (<?=$data_ep[$key]->dep_name?>)</option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form_group">
                  <label class="name">Ảnh bìa nhóm<span class="cr_red">*</span></label>
                  <label for="input_file1">
                    <input type="file" name="img_bia" id="v_img_bia" class="custom-file-img-input" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                  </label>
                </div>
                <div class="form_group">
                  <label class="name">Ảnh đại diện nhóm<span class="cr_red">*</span></label>
                  <label for="input_file1">
                    <input type="file" name="img_dd" id="v_img_dd" class="custom-file-img-input" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                  </label>
                </div>
                <div class="form_group">
                  <label for="" class="name">Mô tả<span class="cr_red">*</span></label>
                  <input type="text" value="" id="v_description" name="txt_mota" autocomplete="Off" placeholder="Nhập mô tả ">
                </div>
                <div class="form_group">
                  <label class="name">Thành viên<span class="cr_red">*</span></label>
                  <div class="form_select2">
                    <select class="select2_muti_tv" id="v_id_employee" multiple name="select2_tv[]">
                    <?php
                      foreach ($data_ep as $key => $value){ 
                      ?>
                      <option value="<?=$key?>"><?=$data_ep[$key]->ep_name?> (<?=$data_ep[$key]->dep_name?>)</option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form_group">            
                  <label for="" class="name">Chế độ nhóm<span class="cr_red">*</span></label>
                  <div class="select_no_muti_li">
                    <select class="select2_t_company select2s" id="v_group_mode" name="select_truong_company">
                      <option value="0">Công khai</option>
                      <option value="1">Riêng tư</option>
                    </select>
                  </div>
                </div>
                <div class="form_buttom">
                  <button class="btn_huy" id="btn_huy_group" type="reset">Hủy</button>
                  <button class="btn_luu" id="btn_tao_nhom">
                    <img src="../img/Spinner-1s-200px.gif" class="v_load_form" alt="Ảnh lỗi">
                    <span class="btn_create_group_text">Tạo nhóm</span>
                  </button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="cd-modal-del model_del_group_tl" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="cd_modal_header">
          <h4 class="name_header">Xóa nhóm - thảo luận</h4>
          
        </div>
        <div class="cd_modal_body">
          <form class="" method="" action="">
              <div class="form-body">
                <div class="row_modal_del">
                  <p class="p_popup_del"><b> Bạn có chắc muốn xóa nhóm Phòng Kỹ Thuật?</b></p>
                  <p class="p_popup_del">Nhóm này sẽ không thể khôi phục do không được 
                    lưu tại bộ nhớ tạm của hệ thống</p>
                </div>
                <div class="form_buttom">
                    <button class="btn_huy" type="button">Hủy</button>
                    <button class="btn_luu submitdel_group_tl" id="btn_luu submitdel_group_tl" type="button">
                      <img src="../img/Spinner-1s-200px.gif" class="v_load_del_group" alt="Ảnh lỗi">
                      <span class="submitdel_group_tl_text">Xóa</span>
                    </button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div> 

  <div class="cd-cuccess  popup_sucuss_del_gr_tl" >
    <div class="cd_container">
      <div class="cd_modal">
        <div class="form_success">
          <div class="img_success">
            <img src="../img/img12.png" alt="Anh loi">
          </div>
          <div class="text_success">
            <p class="text1">Bạn đã xóa nhóm Phòng Kỹ Thuật thành công</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- end popup -->
  </div>
  <!-- end wapper -->
  <? include('../includes/popup_nt.php') ?>
</div>

<!-- end ql_dldx --> 
</body>
<script type="type/javascript" src="../js/lazysizes.min.js"></script>
<script src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/caidat.js"></script>
<script type="text/javascript" src="../js/test.js"></script>
<script src="../js/cd_qlcc_nv.js"></script>
<script>
  $(document).ready(function() {
    $('.select2_t_company').select2({
      width: '100%',
    });
    $('.select2_muti_qt').select2({
        width: '100%',
        placeholder: 'Thêm thành viên quản trị',
    });
    $('.select2_muti_tv').select2({
        width: '100%',
        placeholder: 'Thêm thành viên thực hiện',
    });
  });
</script>
<script type="text/javascript">
  if ($(window).width() <= 480) {
        $(window).click(function(e) {
            if (!manage_header_hover.is(e.target) && manage_header_hover.has(e.target).length == 0 ) {
                $('.box_center .box_manage .manage_header').hide();
            }
        });
    };
</script>
</html>
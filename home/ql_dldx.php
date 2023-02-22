<?php
include("config.php");
require_once '../includes/check_login.php';
require_once '../api/api_all_info.php';
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';
delete_data();
$time = time();
$today1 = strtotime(date('m/d/Y',$time));

$id_com = $_SESSION['login']['id_com'];
//Văn hóa doanh nghiệp
$mail_from_ceo = new db_query("SELECT updated_at,id,title_mail,created_at FROM mail_from_ceo WHERE id_company = $id_com AND `delete` = 1 AND updated_at >= $today1 - 86400*3 ORDER BY updated_at ASC");
$arr_mail_from_ceo = [];
while($row = mysql_fetch_array($mail_from_ceo->result)){
  $arr_mail_from_ceo[] = $row;
}

$target = new db_query("SELECT updated_at,id,title,created_at FROM `target` WHERE id_company = $id_com AND `delete` = 1 AND updated_at >= $today1 - 86400*3 ORDER BY updated_at ASC");
$arr_target = [];
while($row = mysql_fetch_array($target->result)){
  $arr_target[] = $row;
}

$core_value = new db_query("SELECT updated_at,id,tittle,created_at FROM `core_value` WHERE id_company = $id_com AND `delete` = 1 AND updated_at >= $today1 - 86400*3 ORDER BY updated_at ASC");
$arr_core_value = [];
while($row = mysql_fetch_array($core_value->result)){
  $arr_core_value[] = $row;
}

$arr_vhdn = array_merge($arr_mail_from_ceo, $arr_target,$arr_core_value);

if (count($arr_vhdn) > 0) {
  $arr_vhdn_today = [];
  for ($i=0; $i < count($arr_vhdn); $i++) { 
    if ($arr_vhdn[$i]['updated_at'] >= $today1 && ($arr_vhdn[$i]['updated_at']) < $today1 + 86400) {
      $arr_vhdn_today[] = $arr_vhdn[$i];
    }
  }

  $arr_vhdn_yesterday = [];
  for ($i=0; $i < count($arr_vhdn); $i++) { 
    if ($arr_vhdn[$i]['updated_at'] >= $today1 - 86400 && $arr_vhdn[$i]['updated_at'] < $today1) {
      $arr_vhdn_yesterday[] = $arr_vhdn[$i];
    }
  }

  $arr_vhdn3 = [];
  for ($i=0; $i < count($arr_vhdn); $i++) { 
    if ($arr_vhdn[$i]['updated_at'] <= $today1 - 86400 && $arr_vhdn[$i]['updated_at'] >= $today1 - 86400*2) {
      $arr_vhdn3[] = $arr_vhdn[$i];
    }
  }
}
// if ($_SESSION['login']['user_type'] == 2) {
//   check_module(6);
// }

// if ($_SESSION['login']['user_type'] == 1) {
//   $type_create = 1;
// }else if(check_module(6)['create'] == 1){
//   $type_create = 1;
// }else{
//   $type_create = 0;
// }

// if ($_SESSION['login']['user_type'] == 1) {
//   $type_delete = 1;
// }else if(check_module(6)['delete'] == 1){
//   $type_delete = 1;
// }else{
//   $type_delete = 0;
// }

$type_delete = 1;
$type_create = 1;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <title>Quản lý dữ liệu đã xóa gần đây</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow">
  <link rel="stylesheet" href="../css/caidat.css?v=<?= $ver ?>">
  <link rel="stylesheet" href="../css/ql_dldx.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/new_feed.css?v=<?=$version?>">
</head>

<body>
  <div class="ql_dldx">
    <div class="wapper">
      <!--  sidebar -->
      <?php include '../includes/cd_sidebar.php' ?>
      <!-- end side bar -->
      <div id="cdnhanvienc" class="cdnhanvienc">
        <!--     header -->
        <?php include '../includes/cd_header.php' ?>
        <!-- end header -->
        <!--  center -->
        <div class="box_main">
          <div class="box_center">

            <div class="box_data_del">
              <div class="box_forder_del">
                <div class="item_forder_del d_flex item_del_ttnb" data-module="Truyền thông nội bộ" data-type="1">
                  <div class="img_fd_del">
                    <img src="../img/img6.png" alt="Ảnh lỗi">
                  </div>
                  <div class="text_fd_del show_data_ttnb">
                    <?php
                    $db_num = new db_query("SELECT new_id FROM new_feed WHERE `delete` = 1 AND updated_at >= $today1 - 86400*2 AND updated_at <= $today1 + 86400 AND id_company = " . $_SESSION['login']['id_com']);
                    ?>
                    <p class="number"><?=mysql_num_rows($db_num->result)?> &nbsp;<span class="tep">tệp</span></p>
                    <p class="name_folder">Truyền thông nội bộ </p>
                  </div>
                </div>
                <div class="item_forder_del d_flex item_del_vhdn" data-module="Văn hóa doanh nghiệp" data-type="2">
                  <div class="img_fd_del">
                    <img src="../img/img8.png" alt="Ảnh lỗi">
                  </div>
                  <div class="text_fd_del">
                    <p class="number"><?=count($arr_vhdn)?> &nbsp;<span class="tep">tệp</span></p>
                    <p class="name_folder">Văn hóa doanh nghiệp</p>
                  </div>
                </div>
                <div class="item_forder_del d_flex item_del_qttt" data-module="Quản trị tri thức" data-type="3">
                  <div class="img_fd_del">
                    <img src="../img/img7.png" alt="Ảnh lỗi">
                  </div>
                  <div class="text_fd_del">
                    <?php
                    $id_com = $_SESSION['login']['id_com'];
                    $qr = new db_query("SELECT id FROM knowledge WHERE id_company = $id_com AND `delete` = 1");
                    ?>
                    <p class="number"><?= mysql_num_rows($qr->result) ?> &nbsp;<span class="tep">tệp</span></p>
                    <p class="name_folder">Quản trị tri thức</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="list_data_del list_data_del_ttnb">
              <div class="list_header">
                <div class="title_list back_main_del">
                  <p class="header_list">Truyền thông nội bộ</p>
                </div>
              </div>
              <div class="box_list_del">
                <?php
                $db_ttnb = new db_query("SELECT * FROM new_feed WHERE `delete` = 1 AND id_company = " . $_SESSION['login']['id_com']);
                $id_com = $_SESSION['login']['id_com'];
                $time = time();
                if (count($db_ttnb->result) == 0) {
                  echo "Chưa có dữ liệu";
                } else {
                ?>
                  <div class="list_del_search">
                    <div class="d_flex space_b">
                      <div class="frm_btn_del">
                        <div class="del_svp del_svp_l1 active_blue">
                          <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.84979 0H1C0.447715 0 0 0.447715 0 1V7.99329C0 8.54557 0.447715 8.99329 1 8.99329H8.84979C9.40208 8.99329 9.84979 8.54557 9.84979 7.99329V1C9.84979 0.447715 9.40208 0 8.84979 0Z" fill="#A3A3A3" />
                            <path d="M22.0002 0H14.1504C13.5981 0 13.1504 0.447715 13.1504 1V7.99329C13.1504 8.54557 13.5981 8.99329 14.1504 8.99329H22.0002C22.5525 8.99329 23.0002 8.54557 23.0002 7.99329V1C23.0002 0.447715 22.5525 0 22.0002 0Z" fill="#A3A3A3" />
                            <path d="M22.0002 12.0065H14.1504C13.5981 12.0065 13.1504 12.4542 13.1504 13.0065V19.9998C13.1504 20.5521 13.5981 20.9998 14.1504 20.9998H22.0002C22.5525 20.9998 23.0002 20.5521 23.0002 19.9998V13.0065C23.0002 12.4542 22.5525 12.0065 22.0002 12.0065Z" fill="#A3A3A3" />
                            <path d="M8.84979 12.0065H1C0.447715 12.0065 0 12.4542 0 13.0065V19.9998C0 20.5521 0.447715 20.9998 1 20.9998H8.84979C9.40208 20.9998 9.84979 20.5521 9.84979 19.9998V13.0065C9.84979 12.4542 9.40208 12.0065 8.84979 12.0065Z" fill="#A3A3A3" />
                          </svg>

                        </div>
                        <div class="del_svp del_svp_l2 ">
                          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.86533 9.21588V12.7841C4.86533 13.3761 4.45582 13.8578 3.95125 13.8578H0.914077C0.409507 13.8578 0 13.3761 0 12.7841V9.21588C0 8.62248 0.409507 8.14218 0.914077 8.14218H3.95125C4.45582 8.14218 4.86533 8.62391 4.86533 9.21588ZM21.2017 8.14218H8.09811H7.62219C7.11822 8.14218 6.70811 8.62248 6.70811 9.21588V12.7841C6.70811 13.3761 7.11822 13.8578 7.62219 13.8578H8.09811H21.2023C21.7069 13.8578 22.1164 13.3761 22.1164 12.7841V9.21588C22.1158 8.62391 21.7069 8.14218 21.2017 8.14218ZM3.95125 0H0.914077C0.409507 0 0 0.480299 0 1.07369V4.64194C0 5.23533 0.409507 5.71563 0.914077 5.71563H3.95125C4.45582 5.71563 4.86533 5.23533 4.86533 4.64194V1.07369C4.86533 0.481731 4.45582 0 3.95125 0ZM21.2017 0H8.09811H7.62219C7.11822 0 6.70811 0.480299 6.70811 1.07369V4.64194C6.70811 5.23533 7.11822 5.71563 7.62219 5.71563H8.09811H21.2023C21.7069 5.71563 22.1164 5.23533 22.1164 4.64194V1.07369C22.1158 0.481731 21.7069 0 21.2017 0ZM3.95125 16.2851H0.914077C0.409507 16.2851 0 16.7654 0 17.3588V20.9263C0 21.5204 0.409507 22 0.914077 22H3.95125C4.45582 22 4.86533 21.5204 4.86533 20.9263V17.3588C4.86533 16.7654 4.45582 16.2851 3.95125 16.2851ZM21.2017 16.2851H8.09811H7.62219C7.11822 16.2851 6.70811 16.7654 6.70811 17.3588V20.9263C6.70811 21.5204 7.11822 22 7.62219 22H8.09811H21.2023C21.7069 22 22.1164 21.5204 22.1164 20.9263V17.3588C22.1158 16.7654 21.7069 16.2851 21.2017 16.2851Z" fill="#474747" />
                          </svg>
                        </div>
                        <?php
                        if($type_delete == 1){
                        ?>
                        <div class=" btn_del_dk box_btn_del_kp">
                          <p class="btn_huy btn_del_kp ">Khôi phục</p>
                        </div>
                        <div class=" btn_del_dk box_btn_del_xoa">
                          <p class="btn_luu btn_del_xoa ">Xóa</p>
                        </div>
                        <div class="box_btn_del_check">
                          <div class="checkAll">
                            <p class="btn_huy btn_del_check">Chọn tất cả</p>
                            <input type="checkbox" name="" id="checkAll">
                          </div>
                        </div>
                        <?php
                        }
                        ?>
                      </div>
                      <div class="del_search">
                        <input type="text" placeholder="Tìm kiếm nhanh" class="search search_ttnb">
                        <span class="sp_del_search"></span>
                      </div>
                    </div>
                  </div>
                  <div class="box_list_del_l2 box_list_del_l">
                    <div class="overflow_y_del">
                      <div class="table_list_del">
                        <!-- row -->
                        <?php
                        $db_ttnb_today = new db_query("SELECT * FROM new_feed WHERE `delete` = 1 AND updated_at >= $today1 AND updated_at <= $today1 + 86400 AND id_company = " . $_SESSION['login']['id_com']);
                        if (count($db_ttnb_today->result) > 0) {
                        ?>
                          <div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del">Hôm nay</p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <!-- list_item -->
                            <div class="v_table_list_del">
                              <div class="body_del">
                                <!-- item -->
                                <?php
                                while($row = mysql_fetch_array($db_ttnb_today->result)){
                                ?>
                                  <div class="item_data_del" onclick="item_data_del(this)" data-id="<?= $row['new_id'] ?>">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p><?= $row['new_title'] ?></p>
                                      </div>
                                      <div class="date_data_del">
                                        <p><?= date('d.m.Y H:i', $row['created_at']) ?></p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                            </div>
                            <!-- list_item -->
                          </div>
                        <?php
                        }
                        ?>
                        <!-- row -->
                        <!-- row -->
                        <?php
                        $db_ttnb_yesterday = new db_query("SELECT * FROM new_feed WHERE `delete` = 1 AND updated_at >= $today1 - 86400 AND updated_at < $today1 AND id_company = " . $_SESSION['login']['id_com']);
                        if (mysql_num_rows($db_ttnb_yesterday->result) > 0) {
                        ?>
                          <div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del"><?= date('d/m/Y', time() - 86400) ?></p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <!-- list_item -->
                            <div class="v_table_list_del">
                              <div class="body_del">
                                <!-- item -->
                                <?php
                                while($row = mysql_fetch_array($db_ttnb_yesterday->result)){
                                ?>
                                  <div class="item_data_del" onclick="item_data_del(this)" data-id="<?= $row['new_id'] ?>">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p><?= $row['new_title'] ?></p>
                                      </div>
                                      <div class="date_data_del">
                                        <p><?= date('d.m.Y H:i', $row['created_at']) ?></p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                            </div>
                            <!-- list_item -->
                          </div>
                        <?php
                        }
                        ?>
                        <!-- row -->
                        <!-- row -->
                        <?php
                        $db_ttnb_3 = new db_query("SELECT * FROM new_feed WHERE `delete` = 1 AND updated_at >= $today1 - 86400*2 AND updated_at < $today1 - 86400 AND id_company = " . $_SESSION['login']['id_com']);
                        if (mysql_num_rows($db_ttnb_3->result) > 0) {
                        ?>
                          <div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del"><?= date('d/m/Y', time() - 86400) ?></p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <!-- list_item -->
                            <div class="v_table_list_del">
                              <div class="body_del">
                                <!-- item -->
                                <?php
                                while($row = mysql_fetch_array($db_ttnb_3->result)){
                                ?>
                                  <div class="item_data_del" onclick="item_data_del(this)" data-id="<?= $row['new_id'] ?>">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p><?= $row['new_title'] ?></p>
                                      </div>
                                      <div class="date_data_del">
                                        <p><?= date('d.m.Y H:i', $row['created_at']) ?></p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                            </div>
                            <!-- list_item -->
                          </div>
                        <?php
                        }
                        ?>
                        <!-- row -->
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
            <div class="list_data_del list_data_del_knowledge">
              <div class="list_header">
                <div class="title_list back_main_del">
                  <p class="header_list">Quản trị tri thức</p>
                </div>
              </div>
              <div class="box_list_del">
                <?php
                $id_com = $_SESSION['login']['id_com'];
                $time = time();
                $qr1 = new db_query("SELECT * FROM knowledge WHERE id_company = $id_com AND `delete` = 1 AND $time - updated_at <= 86400");
                $qr2 = new db_query("SELECT * FROM knowledge WHERE id_company = $id_com AND `delete` = 1 AND $time - updated_at <= 86400*2 AND $time - updated_at > 86400");
                $qr3 = new db_query("SELECT * FROM knowledge WHERE id_company = $id_com AND `delete` = 1 AND $time - updated_at <= 86400*3 AND $time - updated_at > 86400*2");
                if (mysql_num_rows($qr1->result) == 0 && mysql_num_rows($qr2->result) == 0 && mysql_num_rows($qr3->result) == 0) {
                  echo "Chưa có dữ liệu";
                } else {
                ?>
                  <div class="list_del_search">
                    <div class="d_flex space_b">
                      <div class="frm_btn_del">
                        <div class="del_svp del_svp_l1 active_blue">
                          <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.84979 0H1C0.447715 0 0 0.447715 0 1V7.99329C0 8.54557 0.447715 8.99329 1 8.99329H8.84979C9.40208 8.99329 9.84979 8.54557 9.84979 7.99329V1C9.84979 0.447715 9.40208 0 8.84979 0Z" fill="#A3A3A3" />
                            <path d="M22.0002 0H14.1504C13.5981 0 13.1504 0.447715 13.1504 1V7.99329C13.1504 8.54557 13.5981 8.99329 14.1504 8.99329H22.0002C22.5525 8.99329 23.0002 8.54557 23.0002 7.99329V1C23.0002 0.447715 22.5525 0 22.0002 0Z" fill="#A3A3A3" />
                            <path d="M22.0002 12.0065H14.1504C13.5981 12.0065 13.1504 12.4542 13.1504 13.0065V19.9998C13.1504 20.5521 13.5981 20.9998 14.1504 20.9998H22.0002C22.5525 20.9998 23.0002 20.5521 23.0002 19.9998V13.0065C23.0002 12.4542 22.5525 12.0065 22.0002 12.0065Z" fill="#A3A3A3" />
                            <path d="M8.84979 12.0065H1C0.447715 12.0065 0 12.4542 0 13.0065V19.9998C0 20.5521 0.447715 20.9998 1 20.9998H8.84979C9.40208 20.9998 9.84979 20.5521 9.84979 19.9998V13.0065C9.84979 12.4542 9.40208 12.0065 8.84979 12.0065Z" fill="#A3A3A3" />
                          </svg>

                        </div>
                        <div class="del_svp del_svp_l2 ">
                          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.86533 9.21588V12.7841C4.86533 13.3761 4.45582 13.8578 3.95125 13.8578H0.914077C0.409507 13.8578 0 13.3761 0 12.7841V9.21588C0 8.62248 0.409507 8.14218 0.914077 8.14218H3.95125C4.45582 8.14218 4.86533 8.62391 4.86533 9.21588ZM21.2017 8.14218H8.09811H7.62219C7.11822 8.14218 6.70811 8.62248 6.70811 9.21588V12.7841C6.70811 13.3761 7.11822 13.8578 7.62219 13.8578H8.09811H21.2023C21.7069 13.8578 22.1164 13.3761 22.1164 12.7841V9.21588C22.1158 8.62391 21.7069 8.14218 21.2017 8.14218ZM3.95125 0H0.914077C0.409507 0 0 0.480299 0 1.07369V4.64194C0 5.23533 0.409507 5.71563 0.914077 5.71563H3.95125C4.45582 5.71563 4.86533 5.23533 4.86533 4.64194V1.07369C4.86533 0.481731 4.45582 0 3.95125 0ZM21.2017 0H8.09811H7.62219C7.11822 0 6.70811 0.480299 6.70811 1.07369V4.64194C6.70811 5.23533 7.11822 5.71563 7.62219 5.71563H8.09811H21.2023C21.7069 5.71563 22.1164 5.23533 22.1164 4.64194V1.07369C22.1158 0.481731 21.7069 0 21.2017 0ZM3.95125 16.2851H0.914077C0.409507 16.2851 0 16.7654 0 17.3588V20.9263C0 21.5204 0.409507 22 0.914077 22H3.95125C4.45582 22 4.86533 21.5204 4.86533 20.9263V17.3588C4.86533 16.7654 4.45582 16.2851 3.95125 16.2851ZM21.2017 16.2851H8.09811H7.62219C7.11822 16.2851 6.70811 16.7654 6.70811 17.3588V20.9263C6.70811 21.5204 7.11822 22 7.62219 22H8.09811H21.2023C21.7069 22 22.1164 21.5204 22.1164 20.9263V17.3588C22.1158 16.7654 21.7069 16.2851 21.2017 16.2851Z" fill="#474747" />
                          </svg>
                        </div>
                        <?php
                        if($type_delete == 1){
                        ?>
                        <div class=" btn_del_dk box_btn_del_kp">
                          <p class="btn_huy btn_del_kp ">Khôi phục</p>
                        </div>
                        <div class=" btn_del_dk box_btn_del_xoa">
                          <p class="btn_luu btn_del_xoa ">Xóa</p>
                        </div>
                        <div class="box_btn_del_check">
                          <div class="checkAll">
                            <p class="btn_huy btn_del_check">Chọn tất cả</p>
                            <input type="checkbox" name="" id="checkAll">
                          </div>
                        </div>
                        <?php
                        }
                        ?>
                      </div>
                      <div class="del_search">
                        <input type="text" placeholder="Tìm kiếm nhanh" class="search search_vhdn">
                        <span class="sp_del_search"></span>
                      </div>
                    </div>
                  </div>
                  <div class="box_list_del_l2 box_list_del_l">
                    <div class="overflow_y_del">
                      <div class="table_list_del">
                        <!-- row -->
                        <?php
                        if (mysql_num_rows($qr1->result) > 0) {
                        ?>
                          <div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del">Hôm nay</p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <!-- list_item -->
                            <div class="v_table_list_del">
                              <div class="body_del">
                                <!-- item -->
                                <?php
                                while ($row = mysql_fetch_array($qr1->result)) {
                                ?>
                                  <div class="item_data_del" onclick="item_data_del(this)" data-id="<?= $row['id'] ?>">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p><?= $row['name'] ?></p>
                                      </div>
                                      <div class="date_data_del">
                                        <p><?= date('d.m.Y H:i', $row['created_at']) ?></p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                            </div>
                            <!-- list_item -->
                          </div>
                        <?php
                        }
                        ?>
                        <!-- row -->
                        <!-- row -->
                        <?php
                        if (mysql_num_rows($qr2->result) > 0) {
                        ?>
                          <div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del"><?= date('d/m/Y', time() - 86400) ?></p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <!-- list_item -->
                            <div class="v_table_list_del">
                              <div class="body_del">
                                <!-- item -->
                                <?php
                                while ($row = mysql_fetch_array($qr2->result)) {
                                ?>
                                  <div class="item_data_del" onclick="item_data_del(this)" data-id="<?= $row['id'] ?>">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p><?= $row['name'] ?></p>
                                      </div>
                                      <div class="date_data_del">
                                        <p><?= date('d.m.Y H:i', $row['created_at']) ?></p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                            </div>
                            <!-- list_item -->
                          </div>
                        <?php
                        }
                        ?>
                        <!-- row -->
                        <!-- row -->
                        <?php
                        if (mysql_num_rows($qr3->result) > 0) {
                        ?>
                          <div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del"><?= date('d/m/Y', time() - 86400 * 2) ?></p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <!-- list_item -->
                            <div class="v_table_list_del">
                              <div class="body_del">
                                <!-- item -->
                                <?php
                                while ($row = mysql_fetch_array($qr3->result)) {
                                ?>
                                  <div class="item_data_del" onclick="item_data_del(this)" data-id="<?= $row['id'] ?>">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p><?= $row['name'] ?></p>
                                      </div>
                                      <div class="date_data_del">
                                        <p><?= date('d.m.Y H:i', $row['created_at']) ?></p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                            </div>
                            <!-- list_item -->
                          </div>
                        <?php
                        }
                        ?>
                        <!-- row -->
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
            <div class="list_data_del list_data_del_vhdn">
              <div class="list_header">
                <div class="title_list back_main_del">
                  <p class="header_list">Văn hóa doanh nghiệp</p>
                </div>
              </div>
              <div class="box_list_del">
                <?php
                $id_com = $_SESSION['login']['id_com'];
                $time = time();
                if (count($arr_vhdn) == 0) {
                  echo "Chưa có dữ liệu";
                } else {
                ?>
                  <div class="list_del_search">
                    <div class="d_flex space_b">
                      <div class="frm_btn_del">
                        <div class="del_svp del_svp_l1 active_blue">
                          <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.84979 0H1C0.447715 0 0 0.447715 0 1V7.99329C0 8.54557 0.447715 8.99329 1 8.99329H8.84979C9.40208 8.99329 9.84979 8.54557 9.84979 7.99329V1C9.84979 0.447715 9.40208 0 8.84979 0Z" fill="#A3A3A3" />
                            <path d="M22.0002 0H14.1504C13.5981 0 13.1504 0.447715 13.1504 1V7.99329C13.1504 8.54557 13.5981 8.99329 14.1504 8.99329H22.0002C22.5525 8.99329 23.0002 8.54557 23.0002 7.99329V1C23.0002 0.447715 22.5525 0 22.0002 0Z" fill="#A3A3A3" />
                            <path d="M22.0002 12.0065H14.1504C13.5981 12.0065 13.1504 12.4542 13.1504 13.0065V19.9998C13.1504 20.5521 13.5981 20.9998 14.1504 20.9998H22.0002C22.5525 20.9998 23.0002 20.5521 23.0002 19.9998V13.0065C23.0002 12.4542 22.5525 12.0065 22.0002 12.0065Z" fill="#A3A3A3" />
                            <path d="M8.84979 12.0065H1C0.447715 12.0065 0 12.4542 0 13.0065V19.9998C0 20.5521 0.447715 20.9998 1 20.9998H8.84979C9.40208 20.9998 9.84979 20.5521 9.84979 19.9998V13.0065C9.84979 12.4542 9.40208 12.0065 8.84979 12.0065Z" fill="#A3A3A3" />
                          </svg>

                        </div>
                        <div class="del_svp del_svp_l2 ">
                          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.86533 9.21588V12.7841C4.86533 13.3761 4.45582 13.8578 3.95125 13.8578H0.914077C0.409507 13.8578 0 13.3761 0 12.7841V9.21588C0 8.62248 0.409507 8.14218 0.914077 8.14218H3.95125C4.45582 8.14218 4.86533 8.62391 4.86533 9.21588ZM21.2017 8.14218H8.09811H7.62219C7.11822 8.14218 6.70811 8.62248 6.70811 9.21588V12.7841C6.70811 13.3761 7.11822 13.8578 7.62219 13.8578H8.09811H21.2023C21.7069 13.8578 22.1164 13.3761 22.1164 12.7841V9.21588C22.1158 8.62391 21.7069 8.14218 21.2017 8.14218ZM3.95125 0H0.914077C0.409507 0 0 0.480299 0 1.07369V4.64194C0 5.23533 0.409507 5.71563 0.914077 5.71563H3.95125C4.45582 5.71563 4.86533 5.23533 4.86533 4.64194V1.07369C4.86533 0.481731 4.45582 0 3.95125 0ZM21.2017 0H8.09811H7.62219C7.11822 0 6.70811 0.480299 6.70811 1.07369V4.64194C6.70811 5.23533 7.11822 5.71563 7.62219 5.71563H8.09811H21.2023C21.7069 5.71563 22.1164 5.23533 22.1164 4.64194V1.07369C22.1158 0.481731 21.7069 0 21.2017 0ZM3.95125 16.2851H0.914077C0.409507 16.2851 0 16.7654 0 17.3588V20.9263C0 21.5204 0.409507 22 0.914077 22H3.95125C4.45582 22 4.86533 21.5204 4.86533 20.9263V17.3588C4.86533 16.7654 4.45582 16.2851 3.95125 16.2851ZM21.2017 16.2851H8.09811H7.62219C7.11822 16.2851 6.70811 16.7654 6.70811 17.3588V20.9263C6.70811 21.5204 7.11822 22 7.62219 22H8.09811H21.2023C21.7069 22 22.1164 21.5204 22.1164 20.9263V17.3588C22.1158 16.7654 21.7069 16.2851 21.2017 16.2851Z" fill="#474747" />
                          </svg>
                        </div>
                        <?php
                        if($type_delete == 1){
                        ?>
                        <div class=" btn_del_dk box_btn_del_kp">
                          <p class="btn_huy btn_del_kp ">Khôi phục</p>
                        </div>
                        <div class=" btn_del_dk box_btn_del_xoa">
                          <p class="btn_luu btn_del_xoa ">Xóa</p>
                        </div>
                        <div class="box_btn_del_check">
                          <div class="checkAll">
                            <p class="btn_huy btn_del_check">Chọn tất cả</p>
                            <input type="checkbox" name="" id="checkAll">
                          </div>
                        </div>
                        <?php
                        }
                        ?>
                      </div>
                      <div class="del_search">
                        <input type="text" placeholder="Tìm kiếm nhanh" class="search search_vhdn">
                        <span class="sp_del_search"></span>
                      </div>
                    </div>
                  </div>
                  <div class="box_list_del_l2 box_list_del_l">
                    <div class="overflow_y_del">
                      <div class="table_list_del">
                        <!-- row -->
                        <?php
                        if (count($arr_vhdn_today) > 0) {
                        ?>
                          <div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del">Hôm nay</p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <!-- list_item -->
                            <div class="v_table_list_del">
                              <div class="body_del">
                                <!-- item -->
                                <?php
                                for ($i=0; $i < count($arr_vhdn_today); $i++){
                                  if (isset($arr_vhdn_today[$i]['title_mail'])) {
                                    $name = $arr_vhdn_today[$i]['title_mail'];
                                    $type = 1;
                                  }else if (isset($arr_vhdn_today[$i]['title'])) {
                                    $name = $arr_vhdn_today[$i]['title'];
                                    $type = 2;
                                  }else if (isset($arr_vhdn_today[$i]['tittle'])) {
                                    $name = $arr_vhdn_today[$i]['tittle'];
                                    $type = 3;
                                  }
                                ?>
                                  <div class="item_data_del" onclick="item_data_del(this)" data-id="<?= $arr_vhdn_today[$i]['id'] ?>" data-type="<?=$type?>">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p><?= $name ?></p>
                                      </div>
                                      <div class="date_data_del">
                                        <p><?= date('d.m.Y H:i', $arr_vhdn_today[$i]['created_at']) ?></p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                            </div>
                            <!-- list_item -->
                          </div>
                        <?php
                        }
                        ?>
                        <!-- row -->
                        <!-- row -->
                        <?php
                        if (count($arr_vhdn_yesterday) > 0) {
                        ?>
                          <div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del"><?= date('d/m/Y', time() - 86400) ?></p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <!-- list_item -->
                            <div class="v_table_list_del">
                              <div class="body_del">
                                <!-- item -->
                                <?php
                                for ($i=0; $i < count($arr_vhdn_yesterday); $i++){
                                  if (isset($arr_vhdn_yesterday[$i]['title_mail'])) {
                                    $name = $arr_vhdn_yesterday[$i]['title_mail'];
                                    $type = 1;
                                  }else if (isset($arr_vhdn_yesterday[$i]['title'])) {
                                    $name = $arr_vhdn_yesterday[$i]['title'];
                                    $type = 2;
                                  }else if (isset($arr_vhdn_yesterday[$i]['tittle'])) {
                                    $name = $arr_vhdn_yesterday[$i]['tittle'];
                                    $type = 3;
                                  }
                                ?>
                                  <div class="item_data_del" onclick="item_data_del(this)" data-id="<?= $arr_vhdn_yesterday[$i]['id'] ?>" data-type="<?=$type?>">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p><?= $name ?></p>
                                      </div>
                                      <div class="date_data_del">
                                        <p><?= date('d.m.Y H:i', $arr_vhdn_yesterday[$i]['created_at']) ?></p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                            </div>
                            <!-- list_item -->
                          </div>
                        <?php
                        }
                        ?>
                        <!-- row -->
                        <!-- row -->
                        <?php
                        if (count($arr_vhdn3) > 0) {
                        ?>
                          <div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del"><?= date('d/m/Y', time() - 86400 * 2) ?></p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <!-- list_item -->
                            <div class="v_table_list_del">
                              <div class="body_del">
                                <!-- item -->
                                <?php
                                for ($i=0; $i < count($arr_vhdn3); $i++){
                                  if (isset($arr_vhdn3[$i]['title_mail'])) {
                                    $name = $arr_vhdn3[$i]['title_mail'];
                                    $type = 1;
                                  }else if (isset($arr_vhdn3[$i]['title'])) {
                                    $name = $arr_vhdn3[$i]['title'];
                                    $type = 2;
                                  }else if (isset($arr_vhdn3[$i]['tittle'])) {
                                    $name = $arr_vhdn3[$i]['tittle'];
                                    $type = 3;
                                  }
                                ?>
                                  <div class="item_data_del" onclick="item_data_del(this)" data-id="<?= $arr_vhdn3[$i]['id'] ?>" data-type="<?=$type?>">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p><?= $name ?></p>
                                      </div>
                                      <div class="date_data_del">
                                        <p><?= date('d.m.Y H:i', $arr_vhdn3[$i]['created_at']) ?></p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                            </div>
                            <!-- list_item -->
                          </div>
                        <?php
                        }
                        ?>
                        <!-- row -->
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
        <!-- end center -->
      </div>
      <!-- popup lua_chon_del -->
      <div class="cd-popup popup_select_del">
        <div class="cd_container">
          <div class="cd_modal">
            <div class="cd_modal_header">
              <h4 class="name_header">Thư từ CEO</h4>
              <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl close_detl_se">
            </div>
            <div class="cd_modal_body">
              <form class="" method="" action="">
                <div class="form-body">
                  <p class="p_select_del">Thư từ CEO đã bị xóa, bạn có thể khôi phục trong thời gian 05 ngày hoặc xóa vĩnh viễn ngay</p>

                  <div class="form_buttom">
                    <button class="btn_huy btn_del_kp " type="button">Khôi phục</button>
                    <button class="btn_luu btn_del_xoa  " type="button">Xóa vĩnh viễn</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end popup lua_chon_del -->
      <!-- pupup xoa khoi phuc -->
      <div class="cd-modal-del popup_khoi_phuc">
        <div class="cd_container">
          <div class="cd_modal">
            <div class="cd_modal_header">
              <h4 class="name_header">Khôi phục</h4>
              <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl close_kp_x">
            </div>
            <div class="cd_modal_body">
              <form class="" method="" action="">
                <div class="form-body">
                  <div class="row_modal_del">
                    <p class="p_popup_del">Bạn có chắc muốn khôi phục <b>Tài liệu ABC</b> thông tin về tài liệu sẽ được khôi phục lại vị trí ban đầu</p>
                  </div>
                  <div class="form_buttom">
                    <button class="btn_huy close_kp_x" type="button">Hủy</button>
                    <button class="btn_luu submit_kp" type="button">Khôi phục</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end popup khoi phuc -->
      <!-- popup kp_success-->
      <div class="cd-cuccess popup_kp_success">
        <div class="cd_container">
          <div class="cd_modal">
            <div class="form_success">
              <div class="img_success">
                <img src="../img/img12.png" alt="Ảnh lỗi">
              </div>
              <div class="text_success">
                <p class="text1">Bạn đã khôi phục thành công! </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end popup kp_success -->
      <!-- popup xoa vinh vien -->
      <div class="cd-modal-del popup_del_vv">
        <div class="cd_container">
          <div class="cd_modal">
            <div class="cd_modal_header">
              <h4 class="name_header">Xóa vĩnh viễn</h4>
              <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl close_kp_x">
            </div>
            <div class="cd_modal_body">
              <form class="" method="" action="">
                <div class="form-body">
                  <div class="row_modal_del">
                    <p class="p_popup_del">Bạn có chắc muốn xóa vĩnh viễn? Tất cả nội dung sẽ <b> không thể khôi phục lại. </b></p>

                  </div>
                  <div class="form_buttom">
                    <button class="btn_huy close_kp_x" type="button">Hủy</button>
                    <button class="btn_luu submit_delete" type="button">Xóa vĩnh viễn</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end popup xoa vinh vien -->
      <!-- popup kp_success-->
      <div class="cd-cuccess popup_del_success">
        <div class="cd_container">
          <div class="cd_modal">
            <div class="form_success">
              <div class="img_success">
                <img src="../img/img12.png" alt="Ảnh lỗi">
              </div>
              <div class="text_success">
                <p class="text1">Bạn đã xóa thành công! </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end popup kp_success -->
      <? include('../includes/popup_nt.php') ?>
    </div>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/caidat.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.active6').css('background', ' #2E3994');
    $('.item_forder_del').click(function() {
      if ($(this).data('type') == 3) {
        $('.box_data_del').fadeOut(300);
        $('.list_data_del_knowledge').fadeIn(300);
      }else if($(this).data('type') == 2){
        $('.box_data_del').fadeOut(300);
        $('.list_data_del_vhdn').fadeIn(300);
      }else if($(this).data('type') == 1){
        $('.box_data_del').fadeOut(300);
        $('.list_data_del_ttnb').fadeIn(300);
      }
    });
    $('.back_main_del').click(function() {
      $('.box_data_del').fadeIn(300);
      $('.list_data_del').fadeOut(300);
    })

    $('.btn_toggle_row_del').click(function() {
      $(this).parents('.row_table_list').find('.muiten_xoay').toggleClass('xoay_90_do');
      $(this).parents('.row_table_list').find('.body_del').slideToggle(400);
    })

    $('.del_svp_l1').click(function() {
      $(".v_table_list_del").css('width', '90%');
      $('.del_svp_l1').addClass('active_blue');
      $('.box_list_del_l').removeClass('box_list_del_l1');
      $('.box_list_del_l').addClass('box_list_del_l2');
      $('.del_svp_l2').removeClass('active_blue');
    })

    $('.del_svp_l2').click(function() {
      $(".v_table_list_del").css('width', '100%');
      $('.del_svp_l2').addClass('active_blue');
      $('.box_list_del_l').removeClass('box_list_del_l2');
      $('.box_list_del_l').addClass('box_list_del_l1');
      $('.del_svp_l1').removeClass('active_blue');

    })

    // show_popup  khoi phuc success
    var submit_kp = $('.submit_kp');
    var popup_kp_success = $('.popup_kp_success');
    submit_kp.click(function() {
      popup_kp_success.show();
    })

    // dong select 
    var close_detl_se = $('.close_detl_se');
    close_detl_se.click(function() {
      $('.popup_select_del').hide();
    })

    var close_kp_x = $('.close_kp_x');
    close_kp_x.click(function() {
      $('.popup_del_vv').hide();
      $('.popup_khoi_phuc').hide();
    })

    // checkAll
    var item_data_del = $('.item_data_del');
    $('.checkAll').click(function() {
      var element = $(this).parents(".list_data_del");
      console.log(element);
      if (element.find('.btn_del_check').text() != 'Chọn tất cả') {
        element.find(".item_data_del").css('backgroundColor', 'white').find('.chk_del').prop('checked', false);
        element.find('.box_btn_del_kp').hide();
        element.find('.box_btn_del_xoa').hide();
        element.find(".btn_del_check").text('Chọn tất cả');
      } else {
        element.find(".item_data_del").css('backgroundColor', '#CCCCCC').find('.chk_del').prop('checked', true);
        element.find('.box_btn_del_kp').show();
        element.find('.box_btn_del_xoa').show();
        element.find(".btn_del_check").text('Bỏ chọn tất cả');
        element.find('.body_del').slideDown();
      }
    });

    //Xóa
    var popup_del_vv = $('.popup_del_vv');
    $(".box_btn_del_xoa").click(function() {
      var element_parent = $(this).parents('.list_data_del');

      // 1 là quản trị tri thức, 2 là văn hóa doanh nghiệp, 3 là truyền thông nội bộ
      if(element_parent.hasClass('list_data_del_knowledge') == true){
        var parent_type = 1;
      }else if(element_parent.hasClass('list_data_del_vhdn') == true){
        var parent_type = 2;
      }else if(element_parent.hasClass('list_data_del_ttnb') == true){
        var parent_type = 3;
      }
      popup_del_vv.fadeIn('', function() {
        var element = $('.popup_del_vv').find('.submit_delete');
        element.click(function() {
          var arr_id = [];
          var arr_element = [];
          var arr_type = [];
          var k = 0;
          for (var i = 0; i < element_parent.find('.item_data_del').length; i++) {
            if (element_parent.find('.item_data_del').eq(i).find('.chk_del').prop('checked') == true) {
              arr_id[k] = element_parent.find('.item_data_del').eq(i).data('id');
              if(element_parent.find('.item_data_del').eq(i).data('type') != undefined){
                arr_type[k] = element_parent.find('.item_data_del').eq(i).data('type');
              }
              arr_element[k] = element_parent.find('.item_data_del').eq(i);
              k++;
            }
          }
          $.ajax({
            type: "POST",
            url: "../ajax/delete_data.php",
            data: {
              id: arr_id,
              type: arr_type,
              parent_type: parent_type
            },
            dataType: "json",
            success: function(data) {
              $('.popup_del_success').show();
              setTimeout(function() {
                $('.popup_del_success').hide();
              }, 1500);
              if(parent_type == 1){
                $('.item_del_qttt').find('.number').html(data.count + '<span class="tep">tệp</span>');
              }else if (parent_type == 2) {
                $('.item_del_vhdn').find('.number').html(data.count + '<span class="tep">tệp</span>');
              }else{
                $('.item_del_ttnb').find('.number').html(data.count + '<span class="tep">tệp</span>');
              }
              element_parent.find('.box_btn_del_kp').hide();
              element_parent.find('.box_btn_del_xoa').hide();
              element_parent.find(".btn_del_check").text('Chọn tất cả');
              for (let i = 0; i < arr_element.length; i++) {
                $(arr_element[i]).remove();
              }
              popup_del_vv.fadeOut();
            }
          });
        });
      });
    })

    //Khôi phục
    var btn_del_kp = $('.btn_del_kp ');
    var popup_khoi_phuc = $('.popup_khoi_phuc');
    $(".box_btn_del_kp").click(function() {
      var element_parent = $(this).parents('.list_data_del');
      // 1 là quản trị tri thức, 2 là văn hóa doanh nghiệp, 3 là truyền thông nội bộ
      if(element_parent.hasClass('list_data_del_knowledge') == true){
        var parent_type = 1;
      }else if(element_parent.hasClass('list_data_del_vhdn') == true){
        var parent_type = 2;
      }else if(element_parent.hasClass('list_data_del_ttnb') == true){
        var parent_type = 3;
      }
      popup_khoi_phuc.fadeIn('', function() {
        var element = $('.popup_khoi_phuc').find('.submit_kp');
        element.click(function() {
          var arr_id = [];
          var arr_element = [];
          var arr_type = [];
          var k = 0;
          for (var i = 0; i < element_parent.find('.item_data_del').length; i++) {
            if (element_parent.find('.item_data_del').eq(i).find('.chk_del').prop('checked') == true) {
              arr_id[k] = element_parent.find('.item_data_del').eq(i).data('id');
              if(element_parent.find('.item_data_del').eq(i).data('type') != undefined){
                arr_type[k] = element_parent.find('.item_data_del').eq(i).data('type');
              }
              arr_element[k] = element_parent.find('.item_data_del').eq(i);
              k++;
            }
          }
          $.ajax({
            type: "POST",
            url: "../ajax/restore_data.php",
            data: {
              id: arr_id,
              type: arr_type,
              parent_type: parent_type
            },
            dataType: "json",
            success: function(data) {
              $('.popup_kp_success').show();
              setTimeout(function() {
                $('.popup_kp_success').hide();
              }, 1500);
              if(parent_type == 1){
                $('.item_del_qttt').find('.number').html(data.count + '<span class="tep">tệp</span>');
              }else if (parent_type == 2) {
                $('.item_del_vhdn').find('.number').html(data.count + '<span class="tep">tệp</span>');
              }else{ 
                $('.item_del_ttnb').find('.number').html(data.count + '<span class="tep">tệp</span>');
              }
              element_parent.find('.box_btn_del_kp').hide();
              element_parent.find('.box_btn_del_xoa').hide();
              element_parent.find(".btn_del_check").text('Chọn tất cả');
              for (let i = 0; i < arr_element.length; i++) {
                $(arr_element[i]).remove();
              }
              popup_khoi_phuc.fadeOut();
            }
          });
        });
      });
    })

    //Tìm kiếm quản trị tri thức
    $('.search_knowledge').keyup(function() {
      var search = $(this).val();
      var element = $(this).parents('.list_data_del');
      $.ajax({
        type: "POST",
        url: "../ajax/search_del_knowledge.php",
        data: {
          search: search
        },
        dataType: "json",
        success: function(data) {
          element.find('.table_list_del').html(data.html);
        }
      });
    });

    //Tìm kiếm văn hóa doanh nghiệp
    $('.search_vhdn').keyup(function() {
      var search = $(this).val();
      var element = $(this).parents('.list_data_del');
      $.ajax({
        type: "POST",
        url: "../ajax/search_del_vhdn.php",
        data: {
          search: search
        },
        dataType: "json",
        success: function(data) {
          console.log(data.html);
          element.find('.table_list_del').html(data.html);
        }
      });
    });

    //Tìm kiếm truyền thông nội bộ
    $('.search_ttnb').keyup(function() {
      var search = $(this).val();
      var element = $(this).parents('.list_data_del');
      $.ajax({
        type: "POST",
        url: "../ajax/search_del_ttnb.php",
        data: {
          search: search
        },
        dataType: "json",
        success: function(data) {
          console.log(data.html);
          element.find('.table_list_del').html(data.html);
        }
      });
    });
  });

  function item_data_del(e) {
    var element = $(e).parents('.list_data_del');
    if ($(e).css('backgroundColor') == 'rgb(204, 204, 204)') {
      $(e).css('backgroundColor', 'white');
      $(e).find('.chk_del').prop('checked', false);
      var j = 0;
      for (var i = 0; i < $('.item_data_del').length; i++) {
        if ($('.item_data_del').eq(i).find('.chk_del').prop('checked') == true) {
          j++;
        }
      }
      if (j == 0) {
        element.find('.box_btn_del_kp').hide();
        element.find('.box_btn_del_xoa').hide();
      }

      element.find('.checkAll').find('.btn_del_check').text('Chọn tất cả');
    } else {
      $(e).css('backgroundColor', 'rgb(204, 204, 204)');
      $(e).find('.chk_del').prop('checked', true);
      element.find('.box_btn_del_kp').show();
      element.find('.box_btn_del_xoa').show();
    }
  }
  $(window).click(function(e) {
    if ($(e.target).is("#caidat")) {
      $("#popup-nhanvien").hide();
    }
    if ($(e.target).is(".popup_select_del")) {
      $(".popup_select_del").hide();
    }

    if ($(e.target).is(".popup_khoi_phuc")) {
      $(".popup_khoi_phuc").hide();
    }

    if ($(e.target).is(".popup_kp_success")) {
      $(".popup_kp_success").hide();
      $(".popup_khoi_phuc").hide();
      $(".popup_select_del").hide();
    }

    if ($(e.target).is(".popup_del_vv")) {
      $(".popup_del_vv").hide();
    }

    if ($(e.target).is(".popup_del_success")) {
      $(".popup_del_success").hide();
      $(".popup_del_vv").hide();
      $(".popup_select_del").hide();
    }
  })
</script>

</html>
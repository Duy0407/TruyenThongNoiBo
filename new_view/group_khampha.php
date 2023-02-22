<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
check_user_empoyee();

// Tắt thông báo All nhóm
$db_turnof = new db_query("SELECT `id_ct` FROM `custom_notification` WHERE `id_user` = '$my_id' AND `customize` = 3");
$db_turnof_assoc = $db_turnof ->result_array();
$db_turnof_assoc = array_column($db_turnof_assoc, 'id_ct');
$cout_group_notify = count($db_turnof_assoc);


$group_check = new db_query("SELECT `id` FROM `group` WHERE find_in_set('$my_id', id_manager) OR find_in_set('$my_id', id_employee)");
$group_check_assoc = $group_check -> result_array('id');
$group_check_assoc = array_column($group_check_assoc, 'id');
$cout_group = count($group_check_assoc);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/popup_group.css?v=<?= $version ?>">
  <title>Khám phá</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">

      <div id="cdnhanvienc" class="cdnhanvienc">
        <div class="group_new_header">
          <?php include '../includes/cd_header_new.php'; ?>
        </div>
      </div>

      <div class="div_group_tong">
        
        <!-- sidebar -->
        <div class="group_new_header">
          <?php include '../includes/group/group_sidebar.php'; ?>
        </div>

        <!-- Khám phá -->
        <div class="main_kham_pha side_dungchung">
          <div class="main_kham_pha_padding">
            <div class="main_kham_pha_title">Gợi ý</div>

            <div class="main_kham_pha_content">
                <?
                $select_group = new db_query("SELECT `id`,`id_company`,`group_image`,`group_name`,`id_employee`,`id_manager` FROM `group` WHERE `hide_show` = 0 ORDER BY `id` DESC LIMIT 20");

                ?>
                <? while ($show_group = mysql_fetch_assoc($select_group->result)) {

                  $ar_id_manager = explode(',', $show_group['id_manager']);
                  if ($show_group['id_employee'] != "") {
                    $ar_id_employee = explode(',', $show_group['id_employee']);
                    $result_array = array_merge($ar_id_manager, $ar_id_employee);
                  }else{
                    $result_array = $ar_id_manager;
                  }

                  $arr_mem = list_stranger_infor(implode(',', $result_array));
                  foreach ($arr_mem as $key => $row) {
                      $arr_ep[$row['ep_id']] = $row;
                  }

                  $count_mem_kp = count($result_array);
                  $id_g = $show_group['id'];

                  $thanhvien_choduyet = new db_query("SELECT `id_user` FROM `member_request_join` WHERE `id_user` = ". $_SESSION['login']['id'] ." AND `id_group` = '$id_g' AND `type_join` = 0");
                  
                  $sl_mem_ques = new db_query("SELECT `id`,`id_group` FROM `member_question` WHERE `id_group` = '$id_g'");

                  ?>
                  <div class="main_kham_pha_content_padding">
                    <div class="main_kham_pha_content_img">
                      <?if($show_group['group_image'] != NULL){?>
                        <img src="/<?=$show_group['group_image']?>" alt="Ảnh lỗi" onerror="this.src=`/img/nv_default_bgi.svg`;">
                      <?}else{?>
                        <img src="../img/nv_default_bgi.svg" alt="">
                      <?}?>
                    </div>
                    <div class="main_kham_pha_content_nd group_demo_btn_parent">
                      <div class="data_hidden" hidden data="<?=$_SESSION['login']['id']?>" data1="<?=$_SESSION['login']['id_com']?>" data2="<?=$id_g?>"></div>
                      <div class="main_kham_pha_content_nd_title"><?=$show_group['group_name']?></div>
                      <p class="main_kham_pha_content_nd_p1"><?=$count_mem_kp?> thành viên</p>
                      <p class="main_kham_pha_content_nd_p1">
                        <?if ($count_mem_kp > 1) {?>
                          <?=$arr_ep[$result_array[0]]['ep_name'] ." và ". ($count_mem_kp - 1) . " người khác"; ?>
                        <?}else{?>
                          <?=$arr_ep[$result_array[0]]['ep_name']; ?>
                        <?}?>
                      đã tham gia nhóm
                      </p>

                      <?if(mysql_num_rows($thanhvien_choduyet->result) > 0){?>
                        <div class="text_da_thamgia_choduyet2">Bạn đã gửi yêu cầu tham gia nhóm, đang chờ Quản trị viên phê duyệt.</div>
                      <?}else{?>

                        <?if ($show_group['id_employee'] != "") {?>

                          <?if(in_array($_SESSION['login']['id'], $ar_id_employee) || in_array($_SESSION['login']['id'], $ar_id_manager)){?>
                            <div class="text_da_thamgia_choduyet">Bạn đã tham gia vào nhóm này</div>
                          <?}else{?>
                            <?if(mysql_num_rows($sl_mem_ques->result) > 0){?>
                              <button type="submit" class="main_kham_pha_content_nd_btn cusor" onclick="click_appen_question(<?=$id_g?>)">Tham gia nhóm</button>
                            <?}else{?>
                              <div class="main_kham_pha_content_nd_btn cusor" onclick="click_nhom_don(<?=$id_g?>)">Tham gia nhóm</div>
                            <?}?>
                          <?}?>

                        <?}else{?>
                          <?if (in_array($_SESSION['login']['id'], $ar_id_manager)) {?>
                            <div class="text_da_thamgia_choduyet">Bạn đã tham gia vào nhóm này</div>
                          <?}else{?>
                            <?if(mysql_num_rows($sl_mem_ques->result) > 0){?>
                              <button type="submit" class="main_kham_pha_content_nd_btn cusor" onclick="click_appen_question(<?=$id_g?>)">Tham gia nhóm</button>
                            <?}else{?>
                              <div class="main_kham_pha_content_nd_btn cusor" onclick="click_nhom_don(<?=$id_g?>)">Tham gia nhóm</div>
                            <?}?>
                          <?}?>
                        <?}?>

                      <?}?>


                      
                      
                    </div>
                  </div>
                <?}?>
              
            </div>
          </div>
        </div>

      </div>


    </div>
  </div>

<?php
include '../includes/popup_index_ep.php';
include '../includes/index_employee/popup_turn_on_notify.php';
include '../includes/index_employee/popup_sup_news.php';
include '../includes/index_employee/popup_success.php';
include '../includes/index_employee/delete_post.php';
include '../includes/index_employee/who_comment.php';
include '../includes/index_employee/object_see_post.php';
include '../includes/ep_group/setting.php';
include '../includes/ep_group/create_gr.php';
include '../includes/ep_group/custom_notify.php';
include '../includes/ep_group/ghim_group.php';
include '../includes/ep_group/following.php';
include '../includes/ep_group/exit_group.php';
include '../includes/index_employee/save_post.php';
include '../includes/index_employee/send_with_chat.php';
include '../includes/index_employee/share_up_group.php';
include '../includes/index_employee/share_up_invidual.php';

include '../includes/popup_private_group.php';
?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/select2.min.js" defer></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/ep_index.js?v=<?= $version ?>" defer></script>
<script src="../js/ep_group.js?v=<?= $version ?>" defer></script>

<script>
    $("#bg_khampha").addClass("active_background");
    $("#ic_khampha").addClass("colof_icon")
    $("#text_khampha").addClass("active_text");


    // function create_gr_new(cgn){
    //     $(".create_gr").show();
    //     $(".form_group_select").select2();
    //     $(".create_gr_header").text("Tạo nhóm");
    // }
</script>

</html>
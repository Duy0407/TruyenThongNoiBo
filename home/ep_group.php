<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
check_user_empoyee(); 

$group_ghim = new db_query("
    SELECT `group`.*, group_pin.id AS id_gr_pin 
    FROM `group` 
    LEFT JOIN group_pin ON (`group`.`id` = group_pin.id_group AND group_pin.id_user_pin = ". $_SESSION['login']['id'] .") 
    WHERE find_in_set(". $_SESSION['login']['id'] .",id_manager) OR find_in_set(". $_SESSION['login']['id'] .",id_employee) 
    ORDER BY group_pin.id DESC");

$my_id = $_SESSION['login']['id'];
$my_avt = $_SESSION['login']['logo']; 

$time_fed = time();

$group_show = mysql_fetch_assoc($group_ghim->result);
if($group_show['group_mode'] != 1){
  $type_group = "cong-khai";
}else{
  $type_group = "rieng-tu";
}

$user_create = explode(',', $group_show['id_manager']);

$sl_group = new db_query("SELECT `id`,`id_company`,`group_name`,`id_manager`,`id_employee`,`group_image`,`group_mode` FROM `group` WHERE find_in_set(". $_SESSION['login']['id'] .", id_manager) <= 0 AND find_in_set(". $_SESSION['login']['id'] .", id_employee) <= 0 AND `hide_show` = 0 ORDER BY `id` DESC");

// lấy id nhóm của mình + mình tham gia
// $db_id_g = new db_query("SELECT `id` FROM `group` WHERE find_in_set(".$_SESSION['login']['id'].", id_employee) OR find_in_set(".$_SESSION['login']['id'].", id_manager)");
// $arr_my_group = $db_id_g->result_array();

$my_group_id = array_column($arr_my_group,"id");
$id_group_implode = implode(',', $my_group_id);

$sl_new_feed = "SELECT new_feed.*, 
    (CASE WHEN EXISTS (SELECT id FROM `new_notify_on` WHERE new_notify_on.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS notify_on,
    (CASE WHEN EXISTS (SELECT id_save FROM `save_post` JOIN add_collection ON save_post.id_collection = add_collection.id_collection WHERE id_posts = new_id AND id_user = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS saved
    FROM `new_feed`
    WHERE (FIND_IN_SET(position,'$id_group_implode') AND type = 1) AND approve = 0 AND `delete` = 0 AND 
    NOT EXISTS (SELECT id FROM new_hide_post WHERE new_hide_post.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").")
    GROUP BY new_feed.new_id 
    ORDER BY updated_at DESC LIMIT ".$limit_post_group;

$arr_in4[2] = $arr_ep;
$arr_in4[1] = [];
$list_news = render_list_news($sl_new_feed, $arr_in4);
$arr_post = $list_news[0];
$arr_in4 = $list_news[1];

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
  <title>Nhóm</title>
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

        <div class="div_group_tong_main side_dungchung">
          <div class="div_group_tong_main_padding">

            <div class="group_tong_main_left fig_post_bang_feed lst_content_news" data-page="1" data-lst_group="<?=$id_group_implode?>">
            <?php foreach ($arr_post as $key => $row) { 
                $flow_group = new db_query("SELECT `following` FROM `group` WHERE `id` = " .$row['position']);
                $flow_group_assoc = mysql_fetch_assoc($flow_group->result);
                if ($flow_group_assoc != 0) {
                  $arr_flow_group = explode(',', $flow_group_assoc['following']);
                }else{
                  $arr_flow_group = [];
                } 
                if ($row['hide_post'] != "") {
                    $arr_hide_post = explode(',', $row['hide_post']);
                }else{
                    $arr_hide_post = [];
                }
                if (!in_array($my_id, $arr_flow_group)) {
                    if (in_array($my_id, $arr_hide_post)) {?>
                        <div class="hide_post_padding mt_un mrb_20px">
                          <div class="hide_post_one mrb_20px">
                              <img src="../img/an-bai-viet.svg" alt="">
                              <div class="hide_post_one_text">
                                  <p>Đã ẩn bài viết</p>
                                  <p class="fig_text_4-1">Bạn sẽ không nhìn thấy bài viết này trên bảng tin</p>
                              </div>
                          </div>
                          <div class="hide_post_one">
                              <img src="../img/tim-ho-tro.svg" alt="">
                              <div class="hide_post_one_text">
                                  <p>Tìm hỗ trợ hoặc báo cáo bài viết</p>
                                  <p>Tôi lo ngại về bài viết này</p>
                              </div>
                          </div>
                          <div class="hoan_tac" data-post="<?=$row['new_id'] ?>">Hoàn tác</div>
                        </div>
                    <?}else{?>
                        <div class="main_content_left_posts content_news_item">
                            <div class="main_content_left_posts_pd">
                                <?php include '../includes/index_employee/post.php'; ?>

                                <div class="hide_posts"></div>
                            </div>
                        </div>
                    <?}
                }
            }?> 
            </div>

            <div class="group_tong_main_right">
              <div class="group_tong_main_right_padding">
                <div class="group_tong_main_right_title">
                  <div class="group_right_title">Những nhóm bạn có thể biết</div>
                  <a href="/kham-pha.html">
                    <div class="group_right_link cusor">
                      <div class="group_right_link_text">Xem thêm</div>
                      <div class="group_right_link_ic"><img src="../img/image_new/arrow_left_blue.svg" alt=""></div>
                    </div>
                  </a>
                </div>

                <div class="group_demo_scroll">
                  <div class="group_demo">
                    <?while ($group_suggestions = mysql_fetch_assoc($sl_group->result)) {
                      $arr_manager = explode(',',$group_suggestions['id_manager']);
                      $arr_employee = explode(',',$group_suggestions['id_employee']);
                      if ($group_suggestions['id_employee'] != "") {
                        $result_arr = array_merge($arr_manager, $arr_employee);
                      }else{
                        $result_arr = $arr_manager;
                      }

                      $count_member = count($result_arr);

                      $id_group = $group_suggestions['id'];
                      $id_user = $group_suggestions['id_manager'];

                      // Lấy tài khoản lạ
                      $arr_mem = list_stranger_infor(implode(',', $result_arr));
                      foreach ($arr_mem as $key => $row) {
                          $arr_ep[$row['ep_id']] = $row;
                      }
                      $select_remove_group = new db_query("SELECT * FROM `remove_group` WHERE `id_user` = '$my_id' AND `id_group` = '$id_group'");
                      $remove_group_assoc = mysql_fetch_assoc($select_remove_group->result);
                      ?>
                      <?if ($time_fed > $remove_group_assoc['time_end']) {?>
                        <div class="group_demo_padding">
                          <div class="group_demo_head">
                              <img class="lay_link" src="<?if($group_suggestions['group_image'] != NULL){?>/<?=$group_suggestions['group_image']?><?}else{?>../img/demo.jfif<?}?>" alt="" onerror="this.src=`/img/logo_com.png`;">
                          </div>
                          <div class="group_demo_head_content">
                            <a href="<?=replaceTitle($group_suggestions['group_name'])?>-<?=$id_group?>.html" class="group_demo_head_content_title"><?=$group_suggestions['group_name']?></a>
                            <p class="group_demo_head_content_p"><?=$count_member?> thành viên</p>

                            <div class="group_demo_head_content_member_text">
                              <div class="group_demo_head_content_member">
                                <?foreach ($result_arr as $key => $value) {?>
                                  <div class="group_demo_head_content_member_img">
                                    <img src="<?=($arr_ep[$value]['ep_image'] != "") ? "https://chamcong.24hpay.vn/upload/employee/". $arr_ep[$value]['ep_image'] : '../img/image_new/banner.png'?>" alt="">
                                  </div>
                                <? } ?>
                                
                              </div>
                              <div class="group_demo_head_content_text">
                                <?if ($count_member != 1) {?>
                                  <?=$arr_ep[$result_arr[0]]['ep_name'];?> và <?=$count_member - 1 ?> người khác 
                                <?}else{?>
                                  <?=$arr_ep[$result_arr[0]]['ep_name'];?>
                                <?}?>
                                đã tham gia
                              </div>
                            </div>
                            <?
                              // Select member question
                              $select_question = new db_query("SELECT * FROM `member_question` WHERE `id_group` = '$id_group'");

                              // Select rule
                              $select_rule = new db_query("SELECT * FROM `group_rules` WHERE `id_group` = '$id_group'");

                              // SELECT thành viên tham gia
                              $select_member_request_join = new db_query("SELECT `id_user` FROM `member_request_join` WHERE `id_user` = ". $_SESSION['login']['id'] ." AND `id_group` = '$id_group' AND `type_join` = 0 AND `refuse_forbid` = 0");
                            ?>
                            <div class="group_demo_btn group_demo_btn_parent">
                              <div class="data_hidden" hidden data="<?=$_SESSION['login']['id']?>" data1="<?=$_SESSION['login']['id_com']?>" data2="<?=$id_group?>"></div>
                              

                              <?if(mysql_num_rows($select_member_request_join->result) > 0){?>
                                <button class="group_demo_btn1 background_ccc" onclick="huy_yeucau(<?=$id_group?>)">Hủy yêu cầu</button>
                              <?}else{?>
                                <?if(mysql_num_rows($select_question->result) > 0 || mysql_num_rows($select_rule->result) > 0){?>
                                  <button type="submit" class="group_demo_btn1 button_background cusor" onclick="click_appen_question(<?=$id_group?>)">Tham gia nhóm</button>
                                <?}else{?>
                                  <button type="submit" class="group_demo_btn1 button_background cusor" onclick="click_nhom_don(<?=$id_group?>)">Tham gia nhóm</button>
                                <?}?>
                              <?}?>
                              
                              <div class="group_demo_btn2 cusor remove_group_feed" data-id-group="<?=$id_group?>">Gỡ</div>
                            </div>
                          </div>
                        </div>
                      <?}?>
                    <?}?>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Khám phá -->
        <div class="main_kham_pha side_dungchung" hidden>
          <div class="main_kham_pha_padding">
            <div class="main_kham_pha_title">Gợi ý</div>

            <div class="main_kham_pha_content">
                <?
                $select_group = new db_query("SELECT `id`,`id_company`,`group_image`,`group_name`,`id_employee`,`id_manager` FROM `group` WHERE `hide_show` = 0 ORDER BY `id` DESC LIMIT 20");

                ?>
                <? while ($show_group = mysql_fetch_assoc($select_group->result)) {
                  $ar_id_employee = explode(',', $show_group['id_employee']);
                  $ar_id_manager = explode(',', $show_group['id_manager']);

                  $noi_array = array_merge($ar_id_employee,$ar_id_manager);
                  $result_array = array_unique($noi_array);

                  $count_mem_kp = count($result_array);
                  $id_g = $show_group['id'];
                  $thanhvien_choduyet = new db_query("SELECT `id_user` FROM `answer_user` WHERE `id_user` = ". $_SESSION['login']['id'] ." AND `id_group` = '$id_g'");
                  
                  $sl_mem_ques = new db_query("SELECT `id`,`id_group` FROM `member_question` WHERE `id_group` = '$id_g'");
                  // echo "SELECT `id`,`id_group` FROM `member_question` WHERE `id_group` = '$id_g'";

                  ?>
                  <div class="main_kham_pha_content_padding">
                    <div class="main_kham_pha_content_img">
                      <?if($show_group['group_image'] != NULL){?>
                        <img src="../img/group/group_image/<?=$show_group['id_company']?>/<?=$show_group['group_image']?>" alt="">
                      <?}else{?>
                        <img src="../img/image_new/banner.png" alt="">
                      <?}?>
                    </div>
                    <div class="main_kham_pha_content_nd group_demo_btn_parent">
                      <div class="data_hidden" hidden data="<?=$_SESSION['login']['id']?>" data1="<?=$_SESSION['login']['id_com']?>" data2="<?=$id_g?>"></div>
                      <div class="main_kham_pha_content_nd_title"><?=$show_group['group_name']?></div>
                      <p class="main_kham_pha_content_nd_p1"><?=$count_mem_kp?> thành viên</p>
                      <p class="main_kham_pha_content_nd_p1">Nhung và 20 người khác đã tham gia <?=$id_g?></p>
                      
                      
                      <?if(mysql_num_rows($thanhvien_choduyet->result) > 0){?>
                        <div class="text_da_thamgia_choduyet2">Bạn đã gửi yêu cầu tham gia nhóm, đang chờ Quản trị viên phê duyệt.</div>
                      <?}else{?>
                        <?if(in_array($_SESSION['login']['id'], $ar_id_employee) || in_array($_SESSION['login']['id'], $ar_id_manager)){?>
                          <div class="text_da_thamgia_choduyet">Bạn đã tham gia vào nhóm này</div>
                        <?}else{?>
                          <?if(mysql_num_rows($sl_mem_ques->result) > 0){?>
                            <button type="submit" data="<?=$id_g?>" class="main_kham_pha_content_nd_btn cusor click_appen_question show_pp_question">Tham gia nhóm</button>
                          <?}else{?>
                            <div class="main_kham_pha_content_nd_btn cusor">Tham gia nhóm</div>
                          <?}?>
                        <?}?>
                      <?}?>
                      
                    </div>
                  </div>
                <? } ?>
              
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
<script src="../js/jquery.validate.min.js"></script>

<script>
    $("#bg_nhom").addClass("active_background");
    $("#ic_nhom").addClass("colof_icon")
    $("#text_nhom").addClass("active_text");


    $(".click_xt_khampha").click(function(){
        $(".div_group_tong_main").hide();
        $(".main_kham_pha").show();
        // $(".click_bang_feed").removeClass("active_background")
    });
      
      


    function create_gr_new(cgn){
        $(".create_gr").show();
        $(".form_group_select").select2();
        $(".create_gr_header").text("Tạo nhóm");
    }

    // $(".click_group2").click(function(){
    //   $(".div_group_tong_main").show();
    //   $(".main_kham_pha").hide();
    // });
    // $(".click_group3").click(function(){
    //   $(".div_group_tong_main").hide();
    //   $(".main_kham_pha").show();
    // });
// -----------------------------------
    $(".click_bang_feed").click(function(){
      $(".div_group_tong_main").show();
      $(".group_manager").hide();
      $(".main_kham_pha").hide();
    });
    $(".click_group_them").click(function(){
      $(".div_group_tong_main").hide();
      $(".group_manager").show();
      $(".main_kham_pha").hide();
    });
    $(".click_khampha").click(function(){
      $(".div_group_tong_main").hide();
      $(".group_manager").hide();
      $(".main_kham_pha").show();
    });

</script>

</html>
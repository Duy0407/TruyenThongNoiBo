<?php
require_once '../config/config.php';
$type_create = 1;
$type_delete = 1;
check_user_empoyee();


$id_user = $_SESSION['login']['id'];

$select_all_collection = new db_query("SELECT add_collection.id_collection,name_collection,id_posts,file FROM add_collection LEFT JOIN save_post ON add_collection.id_collection = save_post.id_collection LEFT JOIN `new_feed` ON save_post.id_posts = new_feed.new_id WHERE `id_user` = '$id_user' GROUP BY add_collection.id_collection");


$select_post = new db_query("SELECT add_collection.id_collection,name_collection,id_posts,file,name_file,content,created_at,author,author_type,view_mode,id_user_tags,activity,feel,new_id FROM add_collection JOIN save_post ON add_collection.id_collection = save_post.id_collection JOIN `new_feed` ON save_post.id_posts = new_feed.new_id WHERE `id_user` = '$id_user' ORDER BY id_save DESC");

$post = new db_query("SELECT add_collection.id_collection,name_collection,id_posts,file,content,created_at,author,author_type,view_mode,id_user_tags,activity,feel,new_id FROM add_collection JOIN save_post ON add_collection.id_collection = save_post.id_collection JOIN `new_feed` ON save_post.id_posts = new_feed.new_id WHERE `id_user` = '$id_user' ORDER BY id_save DESC");
$post_assoc = mysql_fetch_assoc($post->result);

if ($post_assoc['id_user_tags'] != "") {
  $arr_author = explode(',', $post_assoc['author']);
  $arr_tag = explode(',', $post_assoc['id_user_tags']);
  $noi_arr = array_merge($arr_author,$arr_tag);
  $result_arr = array_unique($noi_arr);
}else{
  $result_arr = explode(',', $post_assoc['author']);
}

$arr_mem = list_stranger_infor(implode(',', $result_arr));
foreach ($arr_mem as $key => $row) {
    $arr_ep[$row['ep_id']] = $row;
}





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
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/ep_collection.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <title>Bộ sưu tập</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">
      <?php include '../includes/cd_sidebar.php' ?>
      <div class="sidebar_index">
        <div class="sidebar_index_header">
          <img class="sidebar_index_icon show_sidebar_24h" src="../img/24h_show_sidebar.svg" alt="Ảnh lỗi">
        </div>
        <div class="sidebar_index_body">
            <button class="sidebar_index_setting">Cài đặt</button>
            <p class="sidebar_index_title">Đã lưu</p>
            <div class="sidebar_index_action">
                <img class="sidebar_index_action_icon" src="../img/muc-da-luu.svg" alt="Ảnh lỗi">
                <p class="sidebar_index_action_title">Mục đã lưu</p>
            </div>
            <p class="sidebar_index_title">Bộ sưu tập của tôi</p>
            <div class="collection_list_item">
                <?php while ($show_collection = mysql_fetch_assoc($select_all_collection->result)) {?>
                  <div class="collection_item">
                    <img class="collection_item_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                    <p class="collection_title"><?= $show_collection['name_collection']?></p>
                  </div>
                <?} ?>
                <div class="add_collection_box">
                  <button class="add_collection2">+</button>
                  <p class="add_collection_title">Thêm bộ sưu tập mới</p>
                </div>
            </div>
        </div>
      </div>
      <div id="cdnhanvienc" class="cdnhanvienc">
        <?php
        include '../includes/cd_header.php';
        ?>
        <div id="center"> 
            <div class="center_detail">
                <div class="detail_768">
                  <button class="detail_768_setting">Cài đặt</button>
                  <p class="detail_768_title">Đã lưu</p>
                  <button class="detail_768_save">
                    <img class="detail_768_save_icon" src="../img/muc-da-luu.svg" alt="Ảnh lỗi">
                    Mục đã lưu
                  </button>
                  <div class="detail_768_title">
                    Bộ sưu tập của tôi 
                    <button class="detail_768_custom">Tùy chỉnh</button>
                    <div class="popup_collection_custom2">
                      <div class="popup_collection_custom_item collection_custom_change_name">
                        <img class="popup_collection_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        Đổi tên bộ sưu tập
                      </div>
                      <div class="popup_collection_custom_item collection_custom_delete">
                        <img class="popup_collection_icon" src="../img/xoa-bai-viet.svg" alt="Ảnh lỗi">
                        Xóa bộ sưu tập
                      </div>
                    </div>
                </div>
                  <div class="detail_768_list_item">
                    <div class="detail_768_item">
                      <button class="detail_768_btn">+</button>
                      <p class="detail_768_name">Thêm bộ sưu tập mới</p>
                    </div>
                    <?php
                    for ($i=0; $i < 10; $i++) { 
                    ?>
                    <div class="detail_768_item">
                      <img class="detail_768_item_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                      <p class="detail_768_name">Ẩm thực</p>
                    </div>
                    <?php
                    }
                    ?> 
                  </div>
                </div>
                <button class="collection_custom">Tùy chỉnh</button>
                <div class="popup_collection_custom">
                  <div class="popup_collection_custom_item collection_custom_change_name">
                    <img class="popup_collection_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                    Đổi tên bộ sưu tập
                  </div>
                  <div class="popup_collection_custom_item collection_custom_delete">
                    <img class="popup_collection_icon" src="../img/xoa-bai-viet.svg" alt="Ảnh lỗi">
                    Xóa bộ sưu tập
                  </div>
                </div>
                <p class="center_detail_title">Tất cả</p>
                <div class="center_detail_list_item">
                  <? while ($show_post = mysql_fetch_assoc($select_post->result)) { 
                    if($show_post['author_type'] != 1){
                      $newfeed_name = $arr_ep[$show_post['author']]['ep_name'];
                      $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$show_post['author']]['ep_image'];
                    }else{
                      $newfeed_name =  $arr_com->com_name;
                      $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                    }


                    $arr_id_user_tag = [];
                    if ($show_post['id_user_tags'] != '') {  
                        $arr_id_user_tag = explode(",", $show_post['id_user_tags']); 
                    }
                    $name_employee = $id_user_hide = '';
                    if (count($arr_id_user_tag) > 0) {
                        $name_employee = $arr_ep[$arr_id_user_tag[0]]['ep_name'];
                        if (count($arr_id_user_tag) - 1 > 0) { 
                            $id_user_hide = ' và ' . (count($arr_id_user_tag) - 1) . ' người khác'; 
                        }
                    }

                    ?>
                    <div class="center_detail_item">

                        <?php 
                          $name_file = explode("||", $show_post['name_file']);
                          $file = explode("||", $show_post['file']);
                          $arr_file = [];
                          $arr_image = [];
                          $arr_name_file = [];

                          for ($i=0; $i < count($file); $i++) { 
                              if (preg_match('/image/', $file[$i]) == true || preg_match('/video/', $file[$i]) == true) {
                                  $arr_image[] = $file[$i];
                              }else if (preg_match('/file/', $file[$i]) == true){
                                  $arr_file[] = $file[$i];
                                  $arr_name_file[] = $name_file[$i];
                              }
                          }

                          for ($i=0; $i < count($arr_file); $i++) { ?>
                              <a download class="ep_post_file_div_detail" href="<?=$arr_file[$i]?>">
                                  <p class="ep_post_name_file"><?=$arr_name_file[$i]?></p>
                                  <p class="ep_post_file_size"><?= date("H:i d/m/Y", $show_post['created_at']) ?></p>
                                  <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                              </a>
                          <?}
                          for ($i=0; $i < count($arr_image); $i++) {
                              if($i == 4){?>
                                  <a class="v_newfeed_more" href="chi-tiet-tin-dang.html?new_id=<?= $show_post['new_id'] ?>">
                                      <span class="v_newfeed_more_span">+<?=count($arr_image) - 4?></span>
                                  </a>
                              <? break;}else if (preg_match('/image/', $arr_image[$i])) {?>
                                  <a href="<?=url_detail_new_feed($show_post['new_id'])?>" class="width_hight_img">
                                      <!-- <img class="ep_post_file_img_detail" src="" alt="Ảnh lỗi"> -->
                                      <img class="center_detail_item_avt" src="<?=$arr_image[$i]?>" alt="Ảnh lỗi">
                                  </a>
                              <?}else{
                                  $duoi = explode(".", $arr_image[$i]);
                                  $duoi = $duoi[count($duoi) - 1];?>
                                  <video onclick="window.location.href='chi-tiet-bai-viet.html'" class="ep_post_file_img_detail" controls
                                      autoplay>
                                      <source src="<?=$arr_image[$i]?>" type="video/mp4">
                                  </video>
                              <?}
                          }

                        ?>

                      <div class="w100pt_fig">
                        
                        <div class="w100pt">
                          <div class="center_detail_info">
                            <div class="center_detail_info_flex">
                              <img class="center_detail_info_avt" src="<?=$avt_image?>" alt="Ảnh lỗi">
                              <div class="center_detail_info_detail">
                                <!-- <p class="center_detail_info_name">Hội những người thấyHội những người thấy...</p>
                                <p class="center_detail_info_time">Đỗ Khánh Tú . 01/11/2021 . <img class="center_detail_public" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi"></p> -->

                                <!-- Trang chủ -->
                                
                                <div class="name_us elipsis2">
                                  
                                  <div class="cung_voi">
                                    <span class="name_us_sub">
                                      <?= $newfeed_name?>
                                    </span>

                                    <?if($show_post['feel'] > 0 || $show_post['activity'] > 0){?>
                                        <?if($show_post['feel'] > 0){?>
                                            <span class="sk_fz13"> đang cảm thấy 
                                                <img src="<?= $data_feel[$show_post['feel']]['icon']?>" alt="" class="info_post_feel_icon">
                                                <?= $data_feel[$show_post['feel']]['text']?>
                                            </span>
                                        <?}else if($show_post['activity'] > 0){?>
                                            <span class="sk_fz13"> đang chúc mừng 
                                                <img src="<?= $data_activity[$show_post['activity']]['icon']?>" alt="" class="info_post_feel_icon">
                                                <?= $data_activity[$show_post['activity']]['text']?>
                                            </span>
                                        <?}?>
                                    <?}?>

                                    <? if ($name_employee != '') {?>
                                      <?=' cùng với ';?>
                                    <?}?>
                                    <span class="user_dc_tag"> <?php echo $name_employee . $id_user_hide ?></span>
                                  </div>
                                  
                                  
                                    
                                  </div>
                                <div class="time_day">
                                  <div class="time_day_text">
                                    <?= date("H:i d/m/Y",$show_post['created_at'])?>
                                  </div>
                                  <?if ($show_post['view_mode'] == 0) {?>
                                      <div class="time_day_img">
                                          <img src="../img/gis_earth-australia-o(2).svg" alt="">
                                      </div>
                                  <? }else if($show_post['view_mode'] == 1) {?>
                                      <div class="time_day_img">
                                          <img class="icon_regime" src="../img/bx_bxs-lock-alt2.svg" alt="Ảnh lỗi">
                                      </div>
                                  <?}else if($show_post['view_mode'] == 2) {?>
                                      <div class="time_day_img">
                                          <img class="icon_regime" src="../img/group(1)1.svg" alt="Ảnh lỗi">
                                      </div>
                                  <?}else if($show_post['view_mode'] == 3) {?>
                                      <div class="time_day_img">
                                          <img class="icon_regime" src="../img/group(1)2.svg" alt="Ảnh lỗi">
                                      </div>
                                  <?}?>
                                </div>
                              </div>
                            </div>
                            <button class="center_detail_btn">
                              <img src="../img/ba-cham.svg" alt="Ảnh lỗi">
                            </button>
                          </div>
                          <p class="center_detail_des"><?=$show_post['content']?></p>

                          <div class="center_detail_img">
                            <!-- <img src="../img/image_new/banner.png" alt=""> -->
                          </div>

                          <p class="center_detail_save">Đã lưu vào <span class="center_detail_collection"><?= $show_post['name_collection']?></span></p>
                        </div>

                      </div>

                      <div class="center_detail_popup">
                        <div class="center_detail_popup_item center_detail_popup_unsave click_bo_posts" data="<?= $show_post['id_posts']?>" data1="<?= $show_post['id_collection']?>">
                          <img src="../img/bo-luu-bai-viet.svg" alt="Ảnh lỗi">
                          Bỏ lưu bài viết
                        </div>
                        <div class="center_detail_popup_item ep_share_news">
                          <img src="../img/chia-se.svg" alt="Ảnh lỗi">
                          Chia sẻ bài viết
                        </div>
                      </div>
                    </div>
                  <? } ?>
                 
                </div>
            </div>
        </div>
      </div>
    </div>
    <?php
    include '../includes/popup_index_ep.php';
    include '../includes/index_employee/popup_success.php';
    include '../includes/ep_collection/create_collection.php';
    include '../includes/ep_collection/ep_collection_setting.php';
    include '../includes/ep_collection/change_name.php';
    include '../includes/ep_collection/delete_collection.php';
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js?v=<?= $version ?>"></script>
<script src="../js/ep_index.js?v=<?= $version ?>"></script>
<script src="../js/ep_collection.js?v=<?= $version ?>"></script>
<script src="../js/core.js" defer></script>

<script>
  $(".click_bo_posts").click(function(){
    var id_posts = $(this).attr('data');
    var id_collec = $(this).attr('data1');
    $.ajax({
      url: "../ajax/collection_unsave_post.php",
      type: "POST",
      data:{
        id_posts:id_posts,
        id_collec:id_collec,
      },
      success: function(data){
        if(data == ""){
          alert("Bỏ lưu bài viết thành công");
          window.location.reload();
        }else{
          alert(data);
        }
      }
    })
  })
</script>

</html>
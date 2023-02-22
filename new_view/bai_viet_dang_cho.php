<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
check_user_empoyee();

$id = $_GET['id'];
$my_id = $_SESSION['login']['id'];
$select_group = new db_query("SELECT `id`,`cover_image`,`group_image`,`group_name`,`id_manager`,`id_administrators`,`id_censor`,`id_employee`,`group_mode` FROM `group` WHERE `id` = '$id'");
$group = mysql_fetch_assoc($select_group->result);

$is_admin_group = is_admin_group($id, $my_id, $my_type);
$arr_mem_admin = $is_admin_group['arr_mem_admin'];
$arr_mem_censor = $is_admin_group['arr_mem_censor'];
$administrators_censor = $is_admin_group['administrators_censor'];
$is_admin = $is_admin_group['is_admin'];
if($is_admin){ 
    // Note
    $select_newf = "SELECT *, 
                    (CASE WHEN EXISTS (SELECT id FROM `new_notify_on` WHERE new_notify_on.new_id = new_feed.new_id AND user_id = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS notify_on 
                    FROM new_feed 
                    WHERE `delete` = 0 AND approve = 1 AND position = $id AND type = 1 ";
    $order_by = "ORDER BY updated_at DESC";

    $arr_in4[2] = $arr_ep;
    $arr_in4[1] = [];
    $arr_tacgia = [];
    $list_news_all = render_list_news($select_newf.$order_by, $arr_in4);
    $arr_post_all = $list_news_all[0];
    $arr_in4 = $list_news_all[1];
    foreach ($arr_post_all as $k => $v) {
        $arr_tacgia[$v['author'].'-'.($v['author_type']%2)]['id'] = $v['author'];
        $arr_tacgia[$v['author'].'-'.($v['author_type']%2)]['type'] = $v['author_type'];
    } 

    $sort = getValue('sort', 'int', 0);
    if ($sort) {
        $order_by = "ORDER BY updated_at ASC";
    }
    $author = getValue('author', 'str', '');
    if ($author) {
        $arr_author = explode('-', $author);
        $select_newf = $select_newf.' AND author='.$arr_author[0].' AND author_type='.$arr_author[1];
    }
    $content_type = getValue('content_type', 'int', 0);
    if ($content_type) {
        if ($content_type == 1) {
            $select_newf = $select_newf." AND `file` LIKE '%image%' ";
        } else if ($content_type == 2) {
            $select_newf = $select_newf." AND `file` LIKE '%video%' ";
        } else if ($content_type == 3) {
            $select_newf = $select_newf." AND parents_id > 0 ";
        }
    }
    $time = getValue('time', 'str', '');
    if ($time) {
        $first_date = strtotime($time);
        $last_date = strtotime($time) + 86400 - 1;
        $select_newf = $select_newf." AND created_at > '$first_date' AND created_at <= '$last_date' ";
    }
    
    $sql_post = "$select_newf".' '."$order_by"; 

    $list_news = render_list_news($sql_post, $arr_in4);
    $arr_post = $list_news[0];
    $arr_in4 = $list_news[1];

}else{
    header("Location: https://truyenthongnoibo.timviec365.vn/nhom.html");
}
?>
<!DOCTYPE html>
<html lang="vi">

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
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_group.css?v=<?= $version ?>">
    <title>Bài viết đang chờ</title>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper background_o">

            <div id="cdnhanvienc" class="cdnhanvienc pg_new hide_header_1024">
                <?php include '../includes/cd_header_new.php'; ?>
            </div>

            <div class="private_group_content">

                <div id="pg_sidebar"> 
                    <?php include '../includes/sidebar_group.php'; ?>
                </div>

                <div class="head_yc_thanhvien">
                    <a href="/nhom-rieng-tu.html" class="head_yc_thanhvien_ic"><img src="../img/image_new/muiten_left.svg" alt=""></a>
                    <div class="head_yc_thanhvien_text">Bài viết đang chờ</div>
                </div>

                <div class="main_yc_thanhvien">
                    <div class="main_yc_thanhvien_padding">
                        <div class="yc_thanhvien_head">
                            <div class="yc_thanhvien_head_pd">
                                <div class="posts_waiting_display">
                                    <div class="yc_thanhvien_head_title">Bài viết đang chờ . <?=count($arr_post)?></div>

                                    <div class="posts_waiting_btn_head">
                                        <button class="posts_waiting_btn_head1 remove_opacity cusor opacity approve_post_member_all approve_post_member_group" disabled>Phê duyệt</button>
                                        <button class="posts_waiting_btn_head2 remove_opacity cusor opacity refuse_post_group_all refuse_post_member_group" disabled>Từ chối</button>
                                    </div>
                                </div>
                                <form action="" method="GET">
                                    <div class="yc_thanhvien_head_main">
                                        <div class="yc_thanhvien_head_main1 fig_width_im">
                                            <div class="yc_thanhvien_head_main1_input">
                                                <!-- oninput="search_post(this)" -->
                                                <input type="text" placeholder="Tìm kiếm theo tên" name="search_post" >
                                                <div class="ic_search">
                                                    <img src="../img/image_new/search_24.svg" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ic_loc_375 show_600 click_show_boloc_375">
                                            <img src="../img/image_new/ic_loc_375.svg" alt="">
                                        </div>

                                        <div class="yc_thanhvien_head_main2 select2_dung_chung bvdc_figwidth1">
                                            <select name="sort" id="" class="select_option" onchange="this.form.submit()">
                                                <option value="0" <?=($sort && $sort==0)?'selected':''?>>Mới nhất</option>
                                                <option value="1" <?=($sort && $sort==1)?'selected':''?>>Cũ nhất</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="div_bao_check">
                                        <div class="check_all_posts">
                                            <input type="checkbox" name="check_all">
                                        </div>

                                        <div class="chen_popup_600 chen_popup_600_fig1">
                                            <div class="chen_popup_600_scroll">
                                                
                                                <div class="chen_popup_600_them">
                                                    <div class="chen_popup_600_them_ic close_boloc_375"><img src="../img/image_new/muiten_left.svg" alt=""></div>
                                                    <div class="chen_popup_600_them_text">Bộ lọc</div>
                                                </div>
                                        
                                                <div class="yc_thanhvien_head_main_option them_div_1024_bv">
                                                    <div class="them_thanh_search_375">
                                                        <input type="text" placeholder="Tìm kiếm theo tên">
                                                        <div class="ic_search_375">
                                                            <img src="../img/image_new/search_24.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="day_posts"> 
                                                        <input type="date" name="time" value="<?=($time)?$time:''?>" onchange="this.form.submit()">
                                                    </div>
                                                    <div class="posts_waiting_select_tacgia class_select_tacgia cusor">
                                                        <select name="author" id="" class="select_option" onchange="this.form.submit()">
                                                            <option value="">Tác giả</option>
                                                            <?foreach ($arr_tacgia as $key => $v) {
                                                                $selected = '';
                                                                if ($author) {
                                                                    if ($arr_author[0] == $v['id'] && $arr_author[1] == $v['type']) {
                                                                        $selected = 'selected';
                                                                    }
                                                                }
                                                                ?>
                                                                <option value="<?=$v['id'].'-'.$v['type']?>" <?=$selected?>>
                                                                    <?=($v['type']==1)?$arr_in4[1][$v['id']]['com_name']:$arr_in4[2][$v['id']]['ep_name']?>
                                                                </option>
                                                            <?}?>   
                                                        </select>
                                                    </div>

                                                    <div class="yc_thanhvien_head_main_option3 them_mr_1024 select2_dung_chung them_div_1024_bv2">
                                                        <select name="content_type" id="" class="select_option" onchange="this.form.submit()">
                                                            <option value="">Loại nội dung</option>
                                                            <option value="0">Tất cả</option>
                                                            <option value="1" <?=($content_type && $content_type==1)?'selected':''?>>Ảnh</option>
                                                            <option value="2" <?=($content_type && $content_type==2)?'selected':''?>>Video</option>
                                                            <option value="3" <?=($content_type && $content_type==3)?'selected':''?>>Chia sẻ lại</option>
                                                        </select>
                                                    </div>
                                                    <?php 
                                                    $uri = $_SERVER['REQUEST_URI'];
                                                    $arr_uri = explode('?', $uri); 
                                                    ?>
                                                    <div class="delete_boloc them_mr_1024 them_div_1024_bv2" onclick="location.href='<?=$arr_uri[0]?>'">Xóa bộ lọc</div>
                                                    <div class="them_btn_timkiem_375">
                                                        <div class="them_btn_timkiem_375_text">
                                                            Tìm kiếm
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Có Bài viết -->
                        <? if (count($arr_post) > 0) {?>
                            <div class="posts_are_waiting">
                                <?foreach ($arr_post as $key => $row) { 
                                    $avt_post = "/img/logo_com.png";
                                    if ($row['author_type'] == 1){
                                        if ($arr_in4[1][$row['author']]['com_logo']!=''){
                                            $avt_post = "https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$row['author']]['com_logo'];
                                        }
                                        $name_post = $arr_in4[$row['author_type']][$row['author']]['com_name']; 
                                    }else{
                                        if ($arr_in4[2][$row['author']]['ep_image']!=''){
                                            $avt_post = "https://chamcong.24hpay.vn/upload/employee/".$arr_in4[2][$row['author']]['ep_image'];
                                        }
                                        $name_post = $arr_in4[2][$row['author']]['ep_name']; 
                                    }
                                    ?>
                                    <div class="posts_are_waiting_padding pick_id_post_hide ep_post_detail" data-new_id="<?=$row['new_id'];?>" data-id=<?=$row['new_id']?>>
                                        <div class="posts_are_waiting_one">
                                            <div class="posts_are_waiting_one_1">
                                                <input type="checkbox" name="check_one" value="<?=$row['new_id']?>">
                                                <div class="posts_are_waiting_one_1_info">
                                                    <div class="posts_are_waiting_one_1_info_img">
                                                        <a target="_blank" href="<?php echo render_link_profile($row['author'], $row['author_type']) ?>">
                                                            <img src="<?=$avt_post?>" onerror="this.src=`/img/logo_com.png">
                                                        </a>
                                                    </div>
                                                    <div class="posts_are_waiting_one_1_info_text">
                                                        <div class="one_1_info_text_name">
                                                            <a target="_blank" href="<?php echo render_link_profile($row['author'], $row['author_type']) ?>" class="gim_bai_viet_box1_info_text_name"><?=$name_post?></a>
                                                            <?if($row['parents_id'] != 0) {?>
                                                                <img src="../img/ls_dropright.svg" alt="">
                                                                <?=$group['group_name']?>
                                                            <?}?>
                                                        </div>
                                                        <div class="one_1_info_text_time">
                                                            <p><?=time_elapsed_string($row['created_at'])?> .</p> 
                                                            <img title="<?php echo $data_view_mode_txt[$row['view_mode']] ?>" src="<?=$data_view_mode[$row['view_mode']]?>" alt="Ảnh lỗi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="posts_are_waiting_one_2 click_pp_nho_tb cusor">
                                                <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                <div class="pp_small_notification">
                                                    <div class="pp_notification_my_content box_list_action_post">
                                                        <?php if ($row['notify_on'] == 1) {?>
                                                            <div class="ep_post_action1_deatail click_notify_off">
                                                                <img src="/img/ep_post_turn_off_notify.svg" alt="Ảnh lỗi">
                                                                <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Tắt thông báo</span>
                                                            </div>
                                                        <?php } else {?>
                                                            <div class="ep_post_action1_deatail click_notify_on" onclick="popup_notify_on(<?=$row['new_id']?>)">
                                                                <img src="/img/ep_post_notify.svg" alt="Ảnh lỗi">
                                                                <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Bật thông báo</span>
                                                            </div>
                                                        <?}?> 
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts_are_waiting_two">
                                            <div class="posts_are_waiting_two_noidung_text content_posts">
                                                <p class="remove_elipsis2 elipsis2 content_limit">
                                                    <?=nl2br($row['content']);?>
                                                </p>
                                            </div>
                                            <?php if ($row['parents_id'] > 0){
                                                $db_new_share = new db_query("SELECT * FROM new_feed WHERE new_id = ".$row['parents_id']);
                                                $db_new_share = mysql_fetch_array($db_new_share->result);
                                                $name_file = $db_new_share['name_file'];
                                                $file = $db_new_share['file'];
                                                $created_at = $db_new_share['created_at'];
                                                $new_type = $db_new_share['new_type'];
                                                $new_id = $db_new_share['new_id'];
                                                $author = $db_new_share['author'];
                                                $author_type = $db_new_share['author_type'];
                                                echo '<div class="post_share">';
                                            }else{
                                                $name_file = $row['name_file'];
                                                $file = $row['file'];
                                                $created_at = $row['created_at'];
                                                $new_type = $row['new_type'];
                                                $new_id = $row['new_id'];
                                                $author = $row['author'];
                                                $author_type = $row['author_type'];
                                            } ?>
                                            <div class="ep_post_file">
                                                <?php // check xem đâu là file đâu là ảnh/video
                                                $name_file = explode("||", $name_file);
                                                $file = explode("||", $file);
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
                                                } ?>
                                                <!-- đổ ds file đính kèm -->
                                                <div class="ep_post_file_div">
                                                    <?php for ($i=0; $i < count($arr_file); $i++) { ?>
                                                    <a download class="ep_post_file_div_detail" href="<?=$arr_file[$i]?>">
                                                        <p class="ep_post_name_file"><?=$arr_name_file[$i]?></p>
                                                        <p class="ep_post_file_size"><?=convert_filesize(filesize($arr_file[$i])).' '.date('H:i, d/m/Y',$created_at)?></p>
                                                        <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                                                    </a>
                                                    <?php } ?>
                                                </div>
                                                <!-- đổ ds ảnh, video đính kèm --> 
                                                <div class="ep_post_file_img contain_img_post">
                                                    <div class="content_img_post">
                                                        <?php if (count($arr_image) >= 3){ ?>
                                                            <div class="post_img_left three">
                                                                <div class="post_img_item">
                                                                    <?php if (preg_match('/image/', $arr_image[0]) == true){ ?>
                                                                        <img class="ep_post_file_img_detail post_img_item_detail" src="<?=$arr_image[0]?>" alt="Ảnh lỗi">
                                                                    <?php }elseif (preg_match('/video/', $arr_image[0]) == true){ ?>
                                                                        <video class="ep_post_file_img_detail post_img_item_detail" controls="">
                                                                            <source src="<?=$arr_image[0]?>">
                                                                        </video>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="post_img_right three">
                                                                <?php for ($i=1; $i < 3; $i++) { ?>
                                                                    <div class="post_img_item">
                                                                        <?php if (preg_match('/image/', $arr_image[$i]) == true){ ?>
                                                                            <img class="ep_post_file_img_detail post_img_item_detail" src="<?=$arr_image[$i]?>" alt="Ảnh lỗi">
                                                                        <?php }elseif (preg_match('/video/', $arr_image[$i]) == true){ ?>
                                                                            <video class="ep_post_file_img_detail post_img_item_detail" controls="">
                                                                                <source src="<?=$arr_image[$i]?>">
                                                                            </video>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <?php if (count($arr_image) - 3 > 0) { ?>
                                                                        <button class="total_more_img">+<?php echo count($arr_image) - 3; ?></button>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                        <? } else {
                                                            for ($i=0; $i < count($arr_image); $i++) { ?>
                                                                <div class="post_img_left one">
                                                                    <div class="post_img_item">
                                                                        <?php if (preg_match('/image/', $arr_image[$i]) == true){ ?>
                                                                            <img class="ep_post_file_img_detail post_img_item_detail" src="<?=$arr_image[$i]?>" alt="Ảnh lỗi">
                                                                        <?php }elseif (preg_match('/video/', $arr_image[$i]) == true){ ?>
                                                                            <video class="ep_post_file_img_detail post_img_item_detail" controls="">
                                                                                <source src="<?=$arr_image[$i]?>">
                                                                            </video>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            <?php }
                                                        } ?>  
                                                    </div>
                                                </div> 
                                            </div> 
                                            <!-- chia sẻ -->
                                            <?if($row['parents_id'] != 0) { ?>
                                                <div class="info_post_parent">
                                                    <a target="_blank" href="<?=render_link_profile($db_new_share['author'], $db_new_share['author_type'])?>" class="name_author_share"><?=($db_new_share['author_type']==1)?$arr_in4[1][$db_new_share['author']]['com_name']:$arr_in4[2][$db_new_share['author']]['ep_name']?></a> 
                                                    <span class="author_share_sup">đã thêm bài viết mới</span>
                                                    <div class="info_post_parent_time author_share_sup">
                                                        <?=time_elapsed_string($db_new_share['updated_at']) ?>
                                                        <img src="../img/gis_earth-australia-o.svg" alt="">
                                                    </div>
                                                    <div class="content_posts content_posts_share">
                                                        <p class="info_post_parent_content content_limit"><?=nl2br(@$db_new_share['content'])?></p>
                                                    </div> 
                                                </div>
                                            </div>
                                            <?}?>
                                        </div>
                                        <div class="posts_are_waiting_three id_post_member" data="<?=$row['new_id']?>">
                                            <div class="posts_are_waiting_three_1 cusor active_text approve_post_member_group" data="<?=$row['new_id']?>">Phê duyệt</div>
                                            <div class="posts_are_waiting_three_2 cusor refuse_post_group_one refuse_post_member_group" data="<?=$row['new_id']?>">Từ chối</div>
                                            <div class="posts_are_waiting_three_3" onclick="click_refuse(this)">
                                                <img src="../img/image_new/3cham_posts.svg" alt="">

                                                <div class="pp_tuchoi">
                                                    <div class="pp_tuchoi_padding">
                                                        <div class="pp_tuchoi_one cusor dong_tu_choi_chung click_tuchoi1 border_bottom">
                                                            <div class="pp_tuchoi_one_img"><img src="../img/image_new/tu_choi1.svg" alt=""></div>
                                                            <div class="pp_tuchoi_one_text">
                                                                <p class="pp_tuchoi_one_text1">Từ chối kèm theo ý kiến đóng góp</p>
                                                                <p class="pp_tuchoi_one_text2">Không cho đăng bài viết này trên nhóm và đóng góp ý kiến cho thành viên này</p>
                                                            </div>
                                                        </div>
                                                        <div class="pp_tuchoi_one cusor refuse_post_group_author refuse_post_member_group" data-author="<?=$row['author']?>" data-group="<?=$id?>" data="<?=$row['new_id']?>" data-type-author="<?=$row['author_type']?>">
                                                            <div class="pp_tuchoi_one_img2"><img src="../img/image_new/tu_choi2.svg" alt=""></div>
                                                            <div class="pp_tuchoi_one_text">
                                                                <p class="pp_tuchoi_one_text1">Từ chối và cấm tác giả</p>
                                                                <p class="pp_tuchoi_one_text2">Từ chối bài viết này và cấm tác giả đăng bài</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        <?}else{?>
                            <!-- không có bài viết -->
                            <div class="no_member_report">
                                <div class="no_member_report_img">
                                    <img src="../img/image_new/no_question.svg" alt="">
                                </div>
                                <div class="no_member_report_text">Không có nội dung nào</div>
                            </div>
                        <?}?>
                    </div>
                </div> 
            </div>
        </div>
    </div>


<?php 
    include '../includes/popup_private_group.php';
    include '../includes/index_employee/popup_turn_on_notify.php';
?>    
</body>



<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js"></script>
<script src="../js/ep_index.js"></script>

<script>
    $("#bg_posts_waiting").addClass("active_background");
    $("#ic_posts_waiting").addClass("colof_icon")
    $(".text_post_waiting").addClass("active_text");

    $(".select_option").select2({
        width: "100%",
    });

    // Đóng bộ lọc 375
    $(".close_boloc_375").click(function(){
        $(".chen_popup_600").hide();
    })
</script>
</html>
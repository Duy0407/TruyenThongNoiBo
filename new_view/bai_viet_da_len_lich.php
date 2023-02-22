<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
check_user_empoyee();

$time = time();
$id = $_GET['id'];
$my_id = $_SESSION['login']['id'];
$select_group = new db_query("SELECT * FROM `group` WHERE `id` = '$id'");
$group = mysql_fetch_assoc($select_group->result);

$is_admin_group = is_admin_group($id, $my_id, $my_type);
$arr_mem_admin = $is_admin_group['arr_mem_admin'];
$arr_mem_censor = $is_admin_group['arr_mem_censor'];
$administrators_censor = $is_admin_group['administrators_censor'];
$is_admin = $is_admin_group['is_admin'];
if($is_admin){ 
    $sql_post = "SELECT * FROM new_feed 
                WHERE `delete` = 0 AND position = $id AND type = 1 
                AND author =  ".$my_id." AND author_type = ".$my_type." 
                AND show_time > ".time()." AND show_time != 0
                ORDER BY new_id DESC";

    $arr_in4[2] = $arr_ep;
    $arr_in4[1] = [];
    $arr_tacgia = [];
    $list_news_all = render_list_news($sql_post, $arr_in4);
    $arr_post = $list_news_all[0];
    $arr_in4 = $list_news_all[1];
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
    <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
    <title>Bài viết đã lên lịch</title>
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
                    <div class="head_yc_thanhvien_text">Bài viết đã lên lịch</div>
                </div>

                <div class="main_yc_thanhvien">
                    <? if (count($arr_post) > 0){ ?>
                        <div class="main_yc_thanhvien_padding">
                            <div class="yc_thanhvien_head">
                                <div class="scheduled_posts_title">
                                    Bài viết đã lên lịch . <?=count($arr_post) ?>
                                </div>
                            </div>

                            <div class="posts_are_waiting">
                                <?
                                foreach ($arr_post as $k => $row) {    
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
                                    <div class="posts_are_waiting_padding" data-new="<?=$row['new_id'] ?>">
                                        <div class="posts_are_waiting_one">
                                            <div class="posts_are_waiting_one_1">
                                                <div class="posts_are_waiting_one_1_info mr_un">
                                                    <div class="posts_are_waiting_one_1_info_img">
                                                        <a target="_blank" href="<?php echo render_link_profile($row['author'], $row['author_type']) ?>">
                                                            <img src="<?=$avt_post?>" onerror="this.src=`/img/logo_com.png">
                                                        </a>
                                                    </div>
                                                    <div class="posts_are_waiting_one_1_info_text">
                                                        <div class="one_1_info_text_name">
                                                            <a href="<?php echo render_link_profile($row['author'], $row['author_type']) ?>" class="gim_bai_viet_box1_info_text_name"><?=$name_post?></a>
                                                            <?if($row['parents_id'] != 0) {?>
                                                                <img src="../img/ls_dropright.svg" alt="">
                                                                <?=$group['group_name']?>
                                                            <?}?>
                                                        </div>
                                                        <div class="one_1_info_text_time"> 
                                                            <p><?=time_elapsed_after($row['show_time'])?> .</p>
                                                            <img title="<?php echo $data_view_mode_txt[$row['view_mode']] ?>" src="<?=$data_view_mode[$row['view_mode']]?>" alt="Ảnh lỗi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ic_3cham_bvll click_dong_3cham_chung cusor">
                                                <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                <!-- .pp_nho_3cham_ -->
                                                <div class="pp_baiviet">
                                                    <div class="pp_baiviet_padding"> 
                                                        <div class="popup_3cham_div ep_post_action1_deatail_edit show_post_schedule" data-new_id="<?=$row['new_id']?>" data-new_type="<?=$row['new_type']?>">
                                                            <div class="popup_3cham_div_img w20_h20"><img src="../img/image_new/edit_posts.svg" alt=""></div>
                                                            <div class="popup_3cham_div_text">Chỉnh sửa bài viết</div>
                                                        </div> 
                                                        <div class="popup_3cham_div" onclick="xoa_post_group(<?=$row['new_id']?>)">
                                                            <div class="popup_3cham_div_img"><img src="../img/icon_del_post.svg" alt=""></div>
                                                            <div class="popup_3cham_div_text">Xóa bài viết</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="posts_are_waiting_two">
                                            <div class="posts_are_waiting_two_noidung_text content_posts">
                                                <?if ($row['content'] != "") {?>
                                                    <p class="remove_elipsis2 elipsis2 content_limit"><?=nl2br($row['content']) ?></p>
                                                <?}?> 
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
                                        <div class="scheduled_posts_btn">
                                            <div class="scheduled_posts_btn_one active_text cusor upadte_schedule_post" data-date="<?=date('Y-m-d', $row['show_time'])?>" data-time="<?=date('H:i', $row['show_time'])?>">Đổi lịch</div>
                                            <div class="scheduled_posts_btn_one active_text cusor dang_calendar">Đăng ngay</div>
                                        </div>
                                    </div>
                                <?}?>
                            </div>
                        </div>
                    <?}else{?>
                        <!-- không có thành viên -->
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


<?php 
    include '../includes/popup_private_group.php';
    include '../includes/index_employee/delete_post.php';
    include '../includes/index_employee/popup_success.php';
    include '../includes/index_employee/save_post.php';
    include '../includes/group/post_calendar.php';
    include '../includes/popup_index_ep.php';
?>    
</body>



<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js"></script>
<script src="../js/ep_index.js?v=<?= $version ?>" defer></script>

<script>
    $("#pg_scheduled_posts").addClass("active_background");
    $("#ic_scheduled_posts").addClass("colof_icon")
    $("#text_scheduled_posts").addClass("active_text");

    $(".select_option").select2({
        width: "100%",
    });

    $(".ic_3cham_bvll").click(function(){
    	$(this).children(".pp_baiviet").toggle(500);
    });
    $(window).click(function(e){
	    var a = $(".click_dong_3cham_chung");
	    var popup = $(".pp_baiviet");
	    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
	        $(".pp_baiviet").hide();
	    }
	});
</script>
</html>
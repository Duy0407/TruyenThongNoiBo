<?php
require_once '../config/config.php';
include '../includes/icon.php';

$my_id = $_SESSION['login']['id'];
$id_group = $_GET['id'];


$db_group = new db_query("SELECT `id`,`group_name`,`id_employee`,`id_manager` FROM `group` WHERE `id` = '$id_group'");
$db_group_assoc = mysql_fetch_assoc($db_group->result);

$select_post = "SELECT * FROM new_feed 
                    WHERE `delete` = 0 AND approve = 2 AND position = $id_group AND type = 1 
                    AND author = $my_id AND author_type = $my_type AND message_remove != '' "; 
$select_order_by = "ORDER BY created_at DESC";

$order_by = getValue('order_by', 'int', 0);
if ($order_by) {
    $select_order_by = "ORDER BY created_at ASC";
}
$arr_in4[2] = $arr_ep;
$arr_in4[1] = [];
$arr_tacgia = [];
$list_news_all = render_list_news($select_post.$select_order_by, $arr_in4);
$arr_post = $list_news_all[0];
$arr_in4 = $list_news_all[1];

// check xem mình là gì trong nhóm
$is_admin_group = is_admin_group($id_group, $my_id, $my_type);
$arr_mem_admin = $is_admin_group['arr_mem_admin'];
$arr_mem_censor = $is_admin_group['arr_mem_censor'];
$administrators_censor = $is_admin_group['administrators_censor'];
$is_admin = $is_admin_group['is_admin'];
$is_follow = $is_admin_group['is_follow'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/select2.min.css">

    <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">

    <title>Đã gỡ</title>
</head>
<body>
    <div class="your_content">
        <div class="your_content_header">
            <div id="cdnhanvienc" class="cdnhanvienc pg_new header_gr_content_post">
                <?php include '../includes/cd_header_new.php'; ?>
            </div>
        </div>

        <div class="back_my_content">
            <a href="/<?=replaceTitle($db_group_assoc['group_name']);?>-<?=$db_group_assoc['id']?>.html">
                <img src="../img/image_new/muiten_left.svg" alt="">
            </a>
            <div class="back_my_content_text">Nội dung của bạn</div>
        </div>

        <div class="your_content_head my_removed_content">
            <div id="pg_sidebar">
                <?php include '../includes/sidebar_your_conntent.php'; ?>
            </div>
            
            <div class="your_content_head_main">
                <?if (count($arr_post) > 0) {?>
                    <div class="your_content_head_main_one">
                        <div class="your_content_head_main_one_text">Bị gỡ . <?=count($arr_post)?></div>
                        <?php include '../includes/sidebar_your_conntent_mb.php'; ?>

                        <form action="" method="GET" class="your_content_head_main_one_select">
                            <select name="order_by" class="select_option" onchange="this.form.submit()">
                                <option value="0" <?=($order_by) ? "" : 'selected' ; ?>>Mới nhất</option>
                                <option value="1" <?=($order_by) ? "selected" : '' ; ?>>Cũ nhất</option>
                            </select>
                        </form>
                    </div>
                    <div class="your_content_head_main_tow">
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
                                <div class="posts_are_waiting_padding" data-id-new="<?=$row['new_id'];?>" data-new-type="<?=$row['new_type']?>" data-new="<?=$row['new_id'];?>">
                                    <div class="posts_are_waiting_one">
                                        <div class="posts_are_waiting_one_1">
                                            <div class="posts_are_waiting_one_1_info margin_im">
                                                <div class="posts_are_waiting_one_1_info_img">
                                                    <a target="_blank" href="<?php echo render_link_profile($row['author'], $row['author_type']) ?>">
                                                        <img src="<?=$avt_post?>" onerror="this.src=`/img/logo_com.png">
                                                    </a> 
                                                </div>
                                                <div class="posts_are_waiting_one_1_info_text">
                                                    <a href="/<?=replaceTitle($db_group_assoc['group_name']);?>-<?=$db_group_assoc['id']?>.html" class="gim_bai_viet_box1_info_text_name"><?=$db_group_assoc['group_name'];?></a>
                                                    <div class="one_1_info_text_time_fig">
                                                        <div class="cha_name_author">
                                                            <a target="_blank" href="<?php echo render_link_profile($row['author'], $row['author_type']) ?>" class=""><?=$name_post?></a>
                                                            <p>.</p>
                                                            <p><?=time_elapsed_string($row['created_at'])?> .</p>
                                                        </div>
                                                        <img title="<?php echo $data_view_mode_txt[$row['view_mode']] ?>" src="<?=$data_view_mode[$row['view_mode']]?>" alt="Ảnh lỗi">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="posts_are_waiting_two">
                                        <div class="posts_are_waiting_two_noidung_text content_posts">
                                            <p class="remove_elipsis2 elipsis2 content_limit"><?=nl2br($row['content']);?></p>
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
                                    <div class="posts_are_waiting_three">
                                        <div class="btn_my_content2 cusor detail_my_removed_content" data-message="<?=nl2br($row['message_remove'])?>">
                                            <img src="../img/image_new/cham_than.svg" alt="">
                                            <div class="btn_my_content2_text">Xem chi tiết</div>
                                        </div>
                                        <div class="btn_my_content1 cusor ep_post_action1_deatail_edit show_post_schedule" data-new_id="<?=$row['new_id'];?>" data-new_type="<?=$row['new_type']?>">
                                            <img src="../img/image_new/edit_post_blue.svg" alt="">
                                            <div class="btn_my_content1_text">Chỉnh sửa bài viết</div>
                                        </div>
                                    </div>
                                </div>
                            <?}?>
                        </div>
                    </div>
                <?}else{?>
                    <div class="no_member_report no_member_report_fig">
                        <div class="no_member_report_img">
                            <img src="../img/image_new/no_question.svg" alt="">
                        </div>
                        <div class="no_member_report_text">Không có nội dung nào</div>
                    </div>
                <?}?>
            </div>
        </div>
    </div>

<?php 
    include '../includes/popup_private_group.php'; 
    include '../includes/popup_index_ep.php';
?>
</body>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js?v=<?= $version ?>" defer></script>
<script src="../js/ep_index.js?v=<?= $version ?>" defer></script>
<script>
    $("#bg_dago").addClass("active_background");
    $("#ic_dago").addClass("colof_icon")
    $("#text_dago").addClass("active_text");

    $("#bg_dago_mb").addClass("active_text border_bt_blue");

    $(".select_option").select2({
        width: "100%",
    });


    $(".close_my_content").click(function(){
        $(this).parents(".pp_my_removed_content").hide();
    });
    $(window).click(function(e){
        var a = $(".detail_my_removed_content");
        var popup = $(".my_content_pp_padding");
        if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
            $(".pp_my_removed_content").hide();
        }
    });
</script>
</html>
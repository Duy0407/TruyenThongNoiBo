<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
check_user_empoyee();
$id = $_GET['id'];
$select_group = new db_query("SELECT `id`,`cover_image`,`group_image`,`group_name`,`id_manager`,`id_administrators`,`id_censor`,`id_employee`,`group_mode` FROM `group` WHERE `id` = '$id'");
$group = mysql_fetch_assoc($select_group->result);

$is_admin_group = is_admin_group($id, $my_id, $my_type);
$arr_mem_admin = $is_admin_group['arr_mem_admin'];
$arr_mem_censor = $is_admin_group['arr_mem_censor'];
$administrators_censor = $is_admin_group['administrators_censor'];
$is_admin = $is_admin_group['is_admin'];
if($is_admin){ 
    $select_report = "SELECT id_report, id_post, id_group, member_report, type_member_report, messages, type_report, time_report, new_feed.*, 
        (CASE WHEN EXISTS (SELECT id_save FROM save_post JOIN add_collection ON save_post.id_collection = add_collection.id_collection WHERE id_posts = new_id AND id_user = $my_id AND ".(($my_type==1)?"user_type = 1":"(user_type = 0 OR user_type = 2)").") THEN 1 ELSE 0 END) AS saved 
        FROM members_report_posts 
        JOIN new_feed ON members_report_posts.id_post = new_feed.new_id
        WHERE `id_group` = '$id'";
    $order_by = " ORDER BY time_report DESC";
    $sort = getValue('sort', 'int', 0);
    if ($sort) {
        $order_by = " ORDER BY time_report ASC";
    }
    $type = getValue('type', 'str', '');
    if ($type) { 
        $select_report = $select_report.' AND type_report='.$type;
    }
    $arr_in4[2] = $arr_ep;
    $arr_in4[1] = []; 
    $list_news_report = render_list_news($select_report.$order_by, $arr_in4);
    $arr_post_report = $list_news_report[0];
    $arr_in4 = $list_news_report[1];

    $arr_stranger = []; 
    $com_stranger = [];
    $lst_post_report = [];
    $arr_post = [];
    foreach ($arr_post_report as $key => $row) {
        if (!in_array($row['new_id'], $arr_post)) {
            $arr_post[] = $row['new_id'];
        }
        $lst_post_report[$row['new_id']]['news'] = $row;
        $lst_post_report[$row['new_id']]['report'][] = [
            'id_report' => $row['id_report'],
            'id_post' => $row['id_post'],
            'id_group' => $row['id_group'],
            'member_report' => $row['member_report'],
            'type_member_report' => $row['type_member_report'],
            'messages' => $row['messages'],
            'type_report' => $row['type_report'],
            'time_report' => $row['time_report'],
        ];


        if ($row['member_report'] != '' && $row['type_member_report'] == 2 && !array_key_exists($row['member_report'],$arr_in4[2]) && !in_array($row['member_report'],$arr_stranger)){
            $arr_stranger[] = $row['member_report'];
        }elseif ($row['member_report'] != '' && $row['type_member_report'] == 1 && !in_array($row['member_report'],$com_stranger) && !array_key_exists($row['member_report'],$arr_in4[1])){
            $com_stranger[] = $row['member_report'];
        }
    } 
    $arr_stranger = list_stranger_infor(implode(",",$arr_stranger));
    foreach ($arr_stranger as $key => $value) {
        $arr_in4[2][$value['ep_id']] = $value;
    } 
    $com_stranger = list_stranger_cominfor(implode(",",$com_stranger));
    foreach ($com_stranger as $key => $value) {
        $arr_in4[1][$value['com_id']] = $value;
    }   
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
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_group.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
    <title>Nội dung thành viên báo cáo</title>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper background_o">
            <div id="cdnhanvienc" class="cdnhanvienc pg_new hide_header_1024 header_manager_group">
                <?php include '../includes/cd_header_new.php'; ?>
            </div>

            <div class="private_group_content">
                <div id="pg_sidebar"> 
                    <?php include '../includes/sidebar_group.php';?>
                </div>

                <div class="head_yc_thanhvien">
                    <a href="/nhom-rieng-tu.html" class="head_yc_thanhvien_ic"><img src="../img/image_new/muiten_left.svg" alt=""></a>
                    <div class="head_yc_thanhvien_text">Nội dung thành viên báo cáo</div>
                </div>

                <div class="main_member_report">
                	<div class="member_report_padding">
                		<div class="member_report_block1">
                			<div class="member_report_block1_head">
                				<div class="member_report_block1_head_title">Nội dung bị thành viên báo cáo . <?=count($lst_post_report)?></div>
                				<div class="member_report_block1_head_btn">
                					<div class="member_report_block1_head_btn1 cusor btn_keep_post_report all">Giữ lại tất cả</div>
                					<div class="member_report_block1_head_btn2 cusor btn_remove_post_report all">Gỡ tất cả</div>
                				</div>
                			</div>
                			<form action="" method="GET" class="member_report_block1_select">
                				<div class="member_report_block1_select_one css_select_chung1"> 
                                    <select name="sort" class="select_option" onchange="this.form.submit()">
                                        <option value="0" <?=($sort && $sort==0)?'selected':''?>>Mới nhất</option>
                                        <option value="1" <?=($sort && $sort==1)?'selected':''?>>Cũ nhất</option>
                                    </select>
                				</div>
                                <div class="member_report_block1_select_two css_select_chung1">
                                    <select name="type" class="select_option" onchange="this.form.submit()">
                                        <option value="">Định dạng</option>
                                        <option value="1" <?=($type && $type==1)?'selected':''?>>Bài viết</option>
                                        <option value="2" <?=($type && $type==2)?'selected':''?>>Bình luận</option>
                                        <option value="3" <?=($type && $type==3)?'selected':''?>>Đoạn chat</option>
                                    </select>
                                </div>
                			</form>
                		</div>
                        <?if(count($lst_post_report) > 0){?>
                        <!-- Có báo cáo -->
                		<div class="member_report_block_2">
                            <? foreach ($arr_post as $key => $post) { 
                                $row = $lst_post_report[$post]['news'];
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
                                $arr_name_report = [];
                                $arr_content_report = [];
                                $arr_id_report = [];
                                foreach ($lst_post_report[$post]['report'] as $r => $report) {
                                    if ($report['type_member_report'] == 1) {
                                        $arr_name_report[] = $arr_in4[1][$report['member_report']]['com_name'];
                                    } else {
                                        $arr_name_report[] = $arr_in4[2][$report['member_report']]['ep_name'];
                                    }
                                    $arr_content_report[] = $report['messages'];
                                    $arr_id_report[] = $report['id_report'];
                                }
                                $name_report = implode(', ', $arr_name_report);
                                $content_report = implode(', ', $arr_content_report);
                                $id_report = implode(',', $arr_id_report);
                                ?>
                                
                                <div class="member_report_news_one ep_post_detail" data-new_id="<?=$row['new_id']?>">
                                    <div class="member_report_news_one_title border_bottom">
                                        <span class="fw600"><?=$name_report ?></span> đã báo cáo
                                        <span class="fw600">Bài viết</span> này của
                                        <span class="fw600"><?=$name_post?></span> vì <?=$content_report?>
                                    </div>
                                    <div class="member_report_news_info">
                                        <div class="member_report_news_info_user">
                                            <div class="member_report_news_info_user_img">
                                                <a target="_blank" href="<?php echo render_link_profile($row['author'], $row['author_type']) ?>">
                                                    <img src="<?=$avt_post?>" onerror="this.src=`/img/logo_com.png">
                                                </a>
                                            </div>
                                            <div class="member_report_news_info_user_text"> 
                                                <a target="_blank" href="<?php echo render_link_profile($row['author'], $row['author_type']) ?>" class="member_report_news_user_name"><?=$name_post?></a>
                                                <div class="one_1_info_text_time">
                                                    <p><?=time_elapsed_string($row['created_at'])?> .</p> 
                                                    <img title="<?php echo $data_view_mode_txt[$row['view_mode']] ?>" src="<?=$data_view_mode[$row['view_mode']]?>" alt="Ảnh lỗi">
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="posts_are_waiting_one_2 click_pp_nho_tb cusor">
                                            <img src="../img/image_new/3cham_ngang.svg" alt="">
                                            <div class="pp_small_notification">
                                                <div class="pp_notification_my_content box_list_action_post">
                                                    <?php if ($row['saved'] == 0) { ?>
                                                        <div class="ep_post_action1_deatail btn_save_post" onclick="luu_bai_viet(<?=$row['new_id']?>)">
                                                            <img src="/img/ep_post_save.svg" alt="Ảnh lỗi">
                                                            <span class="ep_post_action1_deatail_text">Lưu bài viết</span>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="ep_post_action1_deatail remove_save_post" data="<?=$row['new_id']?>">
                                                            <img src="/img/ep_post_no_save.svg" alt="Ảnh lỗi">
                                                            <span class="ep_post_action1_deatail_text">Bỏ lưu bài viết</span>
                                                        </div>
                                                    <?php } ?> 
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
                                    <div class="member_report_news_btn keep_and_remove">
                                        <div class="member_report_news_btn1 cusor btn_keep_post_report" data-report="<?=$id_report?>">Giữ lại</div>
                                        <div class="member_report_news_btn2 cusor btn_remove_post_report" data-report="<?=$id_report?>" data-new="<?=$row['new_id']?>">Gỡ</div>
                                    </div>
                                </div>  
                            <?}?>   
                        </div>
                        <?}else{?>
                            <!-- không có báo cáo -->
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
        include '../includes/index_employee/save_post.php';
    ?>    
</body> 
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/private_group.js"></script>
<script src="../js/ep_index.js"></script>

<script>
    $("#pg_member_bc").addClass("active_background");
    $("#ic_member_bc").addClass("colof_icon")
    $(".text_member_bc").addClass("active_text");

    $(".select_option").select2({
        width: "100%",
    });

    $(".member_report_news_ic").click(function(){
        $(this).children(".luu_baiviet").toggle(500);
    })
</script>
</html>
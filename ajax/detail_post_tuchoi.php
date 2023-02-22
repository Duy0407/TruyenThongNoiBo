<?php
require_once '../config/config.php';
$id_post = getValue("id_post","int","POST",0);

$db_post = new db_query("SELECT * FROM `new_feed` WHERE `new_id` = '$id_post'");
$post_assoc = mysql_fetch_assoc($db_post->result);
$id_group = $post_assoc['position'];

$arr_file = explode('||', $post_assoc['file']);
$arr_file_name = explode('||', $post_assoc['name_file']);

$db_group = new db_query("SELECT `group_name` FROM `group` WHERE `id` = '$id_group'");
$group_assoc = mysql_fetch_assoc($db_group->result);

$cout_arr_file = count($arr_file);


?>
<div class="my_content_pp_main_post">
    <div class="my_content_pp_main_post_padding">
        <div class="posts_are_waiting_one">
            <div class="posts_are_waiting_one_1">
                <div class="posts_are_waiting_one_1_info margin_im">
                    <div class="posts_are_waiting_one_1_info_img">
                        <?if ($arr_ep[$post_assoc['author']]['ep_image'] != "") {?>
                            <img src="https://chamcong.24hpay.vn/upload/employee/<?=$arr_ep[$post_assoc['author']]['ep_image'] ?>" alt="">
                        <?}else{?>
                            <img src="../img/image_new/banner.png" alt="">
                        <?}?>
                    </div>
                    <div class="posts_are_waiting_one_1_info_text">
                        <div class="one_1_info_text_name"><?=$group_assoc['group_name']?></div>
                        <div class="one_1_info_text_time_fig">
                            <div class="cha_name_author">
                                <p class="name_tuchoi_author"><?=$arr_ep[$post_assoc['author']]['ep_name'];?></p>
                                <p>.</p>
                                <p class="time_tuchoi_author"><?=time_elapsed_string($post_assoc['created_at'])?></p>
                            </div>
                            <img src="../img/image_new/earth.svg" alt="">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="posts_are_waiting_two_noidung_text">
            <?if ($post_assoc['content'] != "") {?>
	            <p class="remove_elipsis2 elipsis2"><?=$post_assoc['content'];?></p>
	        <?}?>
        </div>
        <?if ($post_assoc['file'] != "") {?>
            <div class="posts_are_waiting_two_noidung_img">
                <?foreach ($arr_file as $key => $value) {
                    $name_file = $arr_file_name[$key];
                    ?>
                    <?if (preg_match('/image/', $value) == true) {?>
                        <img class="img_post_myct douple_img" src="<?=$value; ?>" alt="">
                    <?}else if(preg_match('/video/', $value) == true){?>
                        <video controls="" class="<?=($cout_arr_file > 1) ? "douple_img" : "one_img" ; ?>">
                            <source src="<?=$value; ?>">
                        </video>
                    <?}else if(preg_match('/file/', $value) == true){?>
                        <a download class="file_my_ct_a" href="<?=$value?>">
                            <p class="file_my_ct_name"><?=$name_file ?></p>
                            <p class="file_my_ct_size"><?=filesize($value)?>MB <?=date('H:i, d/m/Y',$post_assoc['created_at'])?></p>
                            <img class="file_my_ct_ic" src="../img/icon_download.svg" alt="Ảnh lỗi">
                        </a>
                    <?}?>
                <?}?>
            </div>
        <?}?>

        <?if ($post_assoc['parents_id'] > 0) {
            $select_post_share = new db_query("SELECT * FROM `new_feed` WHERE `new_id` = ".$post_assoc['parents_id']."");
            $select_post_share_assoc = mysql_fetch_assoc($select_post_share->result);
            if ($select_post_share_assoc['file'] != "") {
                $arr_img_share = explode('||', $select_post_share_assoc['file']);
            }
            $cout_img_share = count($arr_img_share);
        ?>
            <div class="posts_are_waiting_two_noidung_img_new">
                <div class="posts_are_waiting_two_noidung_img">
                    <?foreach ($arr_img_share as $key => $value) { ?>
                        <?if ($cout_img_share > 1) {?>
                            <img src="<?=$value?>" alt="" class="douple_img">
                        <?}else{?>
                            <img src="<?=$value?>" alt="" class="one_img">
                        <?}?>
                    <?}?>
                </div>
                <div class="info_post_parent">
                    <span class="name_author_share"><?=$arr_ep[$select_post_share_assoc['author']]['ep_name']?></span>
                    <span class="author_share_sup">đã thêm bài viết mới</span>
                    <div class="info_post_parent_time author_share_sup">
                        <?=date('H:i d/m/Y', $select_post_share_assoc['updated_at']) ?>
                        <img src="../img/gis_earth-australia-o.svg" alt="">
                    </div>
                    <div class="info_post_parent_content"><?=$select_post_share_assoc['content']?></div>
                </div>
            </div>
        <?}?>

    </div>
</div>
<h2 class="text_yc_donggop">Ý kiến đóng góp</h2>
<p class="noidung_donggop">
    
    <?if ($post_assoc['message_tuchoi'] != "") {?>
        <?=$post_assoc['message_tuchoi'] ?>
    <?}else{?>
        <?=$post_assoc['message_remove'] ?>
    <?}?>
</p>

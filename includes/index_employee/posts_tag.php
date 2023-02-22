<div class="ep_post_detail" data="<?= $row_newfeed['new_id']?>" data1="<?= $row_newfeed['author']?>">
    <div class="ep_post_detail_item">
        <img class="ep_post_avt"
            src="<?= $avt_image ?>"
            alt="Ảnh lỗi">
        <div class="ep_post_detail_item_txt">
        	<div class="df_dif_flex">
	            <p class="ep_post_author_name"><?= $newfeed_name;?></p>
	            
                
                <span class="sk_fz13"> 
                    <?if($row_newfeed['feel'] > 0 || $row_newfeed['activity'] > 0){?>
                        <?if($row_newfeed['feel'] > 0){?>
                            <span class="sk_fz13"> đang cảm thấy 
                                <img src="<?= $data_feel[$row_newfeed['feel']]['icon']?>" alt="" class="info_post_feel_icon">
                                <?= $data_feel[$row_newfeed['feel']]['text']?>
                            </span>
                        <?}else if($row_newfeed['activity'] > 0){?>
                            <span class="sk_fz13"> đang chúc mừng 
                                <img src="<?= $data_activity[$row_newfeed['activity']]['icon']?>" alt="" class="info_post_feel_icon">
                                <?= $data_activity[$row_newfeed['activity']]['text']?>
                            </span>
                        <?}?>
                    <?}?>
                    <? if ($name_employee != '') {?>
                        <?=' cùng với ';?>
                    <?}?>
                </span>

	            <span class="user_dc_tag"> <?php echo $name_employee . $id_user_hide ?></span>


                <?if($row_newfeed['district'] > 0 && $row_newfeed['city'] > 0){
                    $select_district = new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_id` = " . $row_newfeed['district'] . "");
                    $district = mysql_fetch_assoc($select_district->result);
                    $select_city = new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_id` = " . $row_newfeed['city'] . "");
                    $city = mysql_fetch_assoc($select_city->result);

                ?>
                    <span class="sk_fz13">tại <?= $district['cit_name']?>, <?= $city['cit_name']?></span>
                <?}?>
                
            </div>
            <p class="ep_post_time">
                <div class="ep_post_time_fig">
                    <div class="ep_post_time_fig_text">
                        <?= date("H:i d/m/Y", $row_newfeed['created_at']) ?>.
                    </div>
                     
                    <?if ($row_newfeed['view_mode'] == 0) {?>
                        <div class="div_width_hight_icon">
                            <img src="../img/gis_earth-australia-o(2).svg" alt="">
                        </div>
                    <? }else if($row_newfeed['view_mode'] == 1) {?>
                        <div class="div_width_hight_icon">
                            <img class="icon_regime" src="../img/bx_bxs-lock-alt2.svg" alt="Ảnh lỗi">
                        </div>
                    <?}else if($row_newfeed['view_mode'] == 2) {?>
                        <div class="div_width_hight_icon">
                            <img class="icon_regime" src="../img/group(1)1.svg" alt="Ảnh lỗi">
                        </div>
                    <?}else if($row_newfeed['view_mode'] == 3) {?>
                        <div class="div_width_hight_icon">
                            <img class="icon_regime" src="../img/group(1)2.svg" alt="Ảnh lỗi">
                        </div>
                    <?}?>
                </div>
                
            </p>
        </div>
        <img class="ep_post_more" src="../img/image_new/3cham_ngang.svg" alt="ep_post_more.svg">
        <?php
    if ($type_web == 1) {
      include '../includes/index_employee/popup_change_post_index.php';
    }else if($type_web == 2){
      include '../includes/index_employee/popup_change_post_group.php';
    }else if ($type_web == 3) {
      include '../includes/memory/popup_action_memory.php';
    }
    ?>
    </div>
    <div class="ep_post_content">
        <?= $row_newfeed['content'];?>
    </div>
    <div class="ep_post_file">
        


    <?php 
    $name_file = explode("||", $row_newfeed['name_file']);
    $file = explode("||", $row_newfeed['file']);
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
            <p class="ep_post_file_size"><?= date("H:i d/m/Y", $row_newfeed['created_at']) ?></p>
            <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
        </a>
    <?}
    for ($i=0; $i < count($arr_image); $i++) {
        if($i == 4){?>
            <a class="v_newfeed_more" href="chi-tiet-tin-dang.html?new_id=<?= $row_newfeed['new_id'] ?>">
                <span class="v_newfeed_more_span">+<?=count($arr_image) - 4?></span>
            </a>
        <? break;}else if (preg_match('/image/', $arr_image[$i])) {?>
            <a href="<?=url_detail_new_feed($row_newfeed['new_id'])?>">
                <img class="ep_post_file_img_detail" src="<?=$arr_image[$i]?>" alt="Ảnh lỗi">
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



    </div>
    <?php include '../includes/in_like_cmt.php';?>
    <?php include '../includes/in_comment.php'; ?>
</div>
<?php if (!in_array($row['author'],$arr_my_unfollow) && !($row['type'] == 2 && in_array($row['position'],$arr_my_unfollow)) && // ko thấy bài viết của người tôi bỏ theo dõi
!in_array($row['author'],$arr_my_block) && !($row['type'] == 2 && in_array($row['position'],$arr_my_block)) && // ko thấy bài viết của người tôi chặn
!in_array($row['author'],$arr_block_me) && !($row['type'] == 2 && in_array($row['position'],$arr_block_me)) && // ko thấy bài viết của người chặn tôi
!(!isset($id_group) && $row['type'] == 1 && in_array($my_id,explode(',',@$arr_group[$row['position']]['following']))) &&  // ko thấy bài viết của nhóm tôi bỏ theo dõi khi ko ở trong page nhóm
!($row['type'] == 0 && $row['position'] > 0 && !array_key_exists($row['position'],$arr_dep)) // ko thấy bài viết trong phòng ban ko còn trong công ty
){
    // check nhóm tạm dừng, bị đình chỉ trong nhóm
    $group_pause = 0;
    $suspended_me = 0;
    if ($row['type'] == 1 && @$arr_group[$row['position']]['group_pause'] >= time()){
        $group_pause = 1;
    }
    if ($row['type'] == 1 && in_array($row['position'], $gr_suspended_me)){
        $suspended_me = 1;
    }
    // check có là admin của group ko
    $is_admin = 0;
    if ($row['type'] == 1 && $row['position'] > 0){
        $manager = explode(',',$arr_group[$row['position']]['id_manager']);
        $admin = explode(',',$arr_group[$row['position']]['id_administrators']);
        if (in_array($my_id,$manager) || in_array($my_id,$admin)){
            $is_admin = 1;
        }
    } ?>
<div class="ep_post_detail pick_id_post_hide" data-new_id="<?=$row['new_id']?>" data-is_admin="<?=$is_admin?>" data-author="<?=$row['author']?>" data-author_type="<?=$row['author_type']?>" data-group_pause="<?=$group_pause?>" data-suspended_me="<?=$suspended_me?>" data-tat_comment="<?=$row['tat_comment']?>">
    <div class="ep_post_detail_item">
        <div class="id_manager_employee_hide" hidden data=""></div>
        <?php $avt_post = "/img/logo_com.png";
        if ($row['author_type'] == 1){
            $name_post = $arr_in4[$row['author_type']][$row['author']]['com_name']; 
        }else{
            $name_post = $arr_in4[2][$row['author']]['ep_name']; 
        }
        $link_user_post = render_link_profile($row['author'], $row['author_type']);
        $author_name_post = "";
        if ($row['position'] > 0 && $row['type'] < 2 && !isset($id_group)){
            if ($row['type'] == 1){
                if ($arr_group[$row['position']]['group_image'] != ""){
                    $avt_post = $arr_group[$row['position']]['group_image'];
                }
                $name_post = $arr_group[$row['position']]['group_name'];
                $link_user_post = replaceTitle($name_post).'-'.$row['position'].'.html';
            }else{
                $name_post = $arr_dep[$row['position']]['dep_name'];
                $link_user_post = '/truyen-thong-noi-bo-nhom-thao-luan-c'.$row['position'];
            }
            if ($row['author_type'] == 1){
                $author_name_post = $arr_in4[$row['author_type']][$row['author']]['com_name']; 
            }else{
                $author_name_post = $arr_in4[2][$row['author']]['ep_name']; 
            }
        }else{
            if ($row['author_type'] == 1){
                if ($arr_in4[1][$row['author']]['com_logo']!=''){
                    $avt_post = "https://chamcong.24hpay.vn/upload/company/logo/".$arr_in4[1][$row['author']]['com_logo'];
                }
            }else{
                if ($arr_in4[2][$row['author']]['ep_image']!=''){
                    $avt_post = "https://chamcong.24hpay.vn/upload/employee/".$arr_in4[2][$row['author']]['ep_image'];
                }
            }
            
        } ?>
        <a href="<?php echo $link_user_post ?>">
            <img class="ep_post_avt" src="<?=$avt_post?>" alt="Ảnh lỗi" onerror="<?=($row['type']==2)?"this.src=`/img/logo_com.png`;":"this.src=`/img/nv_default_bgi.svg`;"?>">
        </a>
        <div class="name_author_hidden" hidden><?=$name_post?></div>
        <div class="ep_post_detail_item_txt">
            <p class="ep_post_author_name">
                <a href="<?php echo $link_user_post ?>"><?=$name_post?></a>
                <!-- <span class="info_post_with"> -->
                <?php // loại tin đăng
                if ($row['position'] > 0 && $row['type'] < 2 && !isset($id_group)){

                }else{
                    switch ($row['new_type']) {
                        case 1:
                            echo "<span class=info_post_type>đã tạo thông báo mới <span class=name_mention_item_name2>".$row['new_title']."</span></span>";
                            break;
                        
                        case 2:
                            echo "<span class=info_post_type>đã thêm thành viên mới:</span>";
                            break;
                        
                        case 3:
                            echo "<span class=info_post_type>đã tạo sự kiện nội bộ <span class=name_mention_item_name2>".$row['new_title']."</span></span>";
                            break;
                        
                        case 4:
                            echo "<span class=info_post_type>đã tạo sự kiện đối ngoại <span class=name_mention_item_name2>".$row['new_title']."</span></span>";
                            break;
                        
                        case 5:
                            // đang lỗi chức năng đăng tin thảo luận
                            echo "<span class=info_post_type>đã tạo bài thảo luận</span>";
                            break;
                        
                        case 6:
                            echo "<span class=info_post_type>đã chia sẻ ý tưởng mới <span class=name_mention_item_name2>".$row['new_title']."</span></span>";
                            break;
                        
                        case 7:
                            echo "<span class=info_post_type>đã tạo bình chọn <span class=name_mention_item_name2>".$row['new_title']."</span></span>";
                            break;
                        
                        case 8:
                            echo "<span class=info_post_type>đã tạo khen thưởng</span>";
                            // còn thiếu huy chương
                            break;
                        
                        case 9:
                            echo "<span class=info_post_type>đã tạo tin nội bộ</span>";
                            break;
                    
                        default:
                            // cảm xúc/hoạt động
                            if ($row['parents_id'] > 0 || $row['album_id'] > 0 || $row['group_id'] > 0 || ($row['position'] > 0 && ($row['type'] == 2 || $row['type'] == 3))){
                                if ($row['position'] > 0){
                                    switch ($row['type']) {
                                        case 3: // trang cá nhân công ty ?>
                                            <span class="info_post_feel">
                                                <img class="info_post_feel_drop_right" src="../img/ls_dropright.svg" alt="Ảnh lỗi">
                                                <a href="<?=render_link_profile($row['position'],($row['type']%2))?>" class="info_post_feel_text"><?=$arr_in4[1][$row['position']]['com_name']?></a>
                                            </span>
                                            <?php break;
                                        case 2: // trang cá nhân nhân viên ?>
                                            <span class="info_post_feel">
                                                <img class="info_post_feel_drop_right" src="../img/ls_dropright.svg" alt="Ảnh lỗi">
                                                <a href="<?=render_link_profile($row['position'],($row['type']%2))?>" class="info_post_feel_text"><?=$arr_in4[2][$row['position']]['ep_name']?></a>
                                            </span>
                                            <?php break;
                                        
                                        case 1: // nhóm riêng ?>
                                            <!-- <span class="info_post_feel">
                                                <img class="info_post_feel_drop_right" src="../img/ls_dropright.svg" alt="Ảnh lỗi">
                                                <span class="info_post_feel_text"><?=$arr_group[$row['position']]['group_name']?></span>
                                            </span> -->
                                            <?php break;
                                        
                                        case 0: // phòng ban ?>
                                            <!-- <span class="info_post_feel">
                                                <img class="info_post_feel_drop_right" src="../img/ls_dropright.svg" alt="Ảnh lỗi">
                                                <span class="info_post_feel_text"><?=$arr_dep[$row['position']]['dep_name']?></span>
                                            </span> -->
                                            <?php break;
                                        
                                        default:
                                            echo "<span class=info_post_type>đã chia sẻ 1 bài viết</span>";
                                            break;
                                    }
                                }elseif ($row['parents_id'] > 0){
                                    echo "<span class=info_post_type>đã chia sẻ 1 bài viết</span>";
                                }elseif ($row['album_id'] > 0){
                                    echo "<span class=info_post_type>đã chia sẻ 1 album</span>";
                                }elseif ($row['group_id'] > 0){
                                    echo "<span class=info_post_type>đã chia sẻ 1 nhóm</span>";
                                }
                            }elseif ($row['feel'] > 0) { ?>
                                <span class="info_post_feel">đang cảm thấy
                                    <img class="info_post_feel_icon" src="<?=$data_feel[$row['feel']]['icon']?>" alt="Ảnh lỗi"> 
                                    <?=$data_feel[$row['feel']]['text']?>
                                </span>
                            <?php }elseif ($row['activity'] > 0){ ?>
                                <span class="info_post_feel">đang chúc mừng
                                    <img class="info_post_feel_icon" src="<?=$data_activity[$row['activity']]['icon']?>" alt="Ảnh lỗi">
                                    <?=$data_activity[$row['activity']]['text']?>
                                </span>
                            <?php }else{
                                echo "<span class=info_post_type>đã thêm 1 bài viết mới</span>";
                            }
                            break;
                    }
                } ?>
                <!-- </span> -->

                <?php // gắn thẻ người khác 
                if (count($row['lst_tags_post']) > 0) { ?>
                    <span class="info_post_with"><?=($row['new_type']!=2)?"cùng với ":""?>
                        <a target="_blank" href="<?=render_link_profile($row['lst_tags_post'][0]['nt_user_id'], $row['lst_tags_post'][0]['nt_user_type']);?>" class="name_mention_item_name2">
                            <?php if ($row['lst_tags_post'][0]['nt_user_type'] == 1) {
                                echo $arr_in4[1][(int)$row['lst_tags_post'][0]['nt_user_id']]['com_name'];
                            } else {
                                echo $arr_in4[2][(int)$row['lst_tags_post'][0]['nt_user_id']]['ep_name'];
                            } ?> 
                        </a>
                        <?php if (count($row['lst_tags_post']) > 1) { ?>
                            và <button class="box_tags ">
                                <span class="name_mention_item_name2"><?= count($row['lst_tags_post'])-1?> người khác</span>
                                <div class="contain_hover_box">
                                    <div class="lst_hover_box"> 
                                        <div class="content_hover_box">
                                            <?php for ($i=1; $i < count($row['lst_tags_post']); $i++) { ?>
                                                <a target="_blank" href="<?=render_link_profile($row['lst_tags_post'][$i]['nt_user_id'], $row['lst_tags_post'][$i]['nt_user_type'])?>" class="name_user_hover_box hover_txt_underline">
                                                    <?php if ($row['lst_tags_post'][$i]['nt_user_type'] == 1) {
                                                        echo $arr_in4[1][(int)$row['lst_tags_post'][$i]['nt_user_id']]['com_name'];
                                                    } else {
                                                        echo $arr_in4[2][(int)$row['lst_tags_post'][$i]['nt_user_id']]['ep_name'];
                                                    } ?>     
                                                </a> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        <? } ?>
                    </span>
                <? } ?>

                <?php // vị trí
                if ($row['location'] != null){ ?>
                    <span class="info_post_at">tại 
                        <span class="name_mention_item_name2"><?=$row['location']?></span>
                    </span>
                <?php } ?>
            </p>
            <p class="ep_post_time">
                <a class="ep_post_time" target="_blank" href="<?=render_link_profile($row['author'], $row['author_type'])?>"><?=$author_name_post?></a>
                <!-- thời gian đăng --> 
                <?= time_elapsed_string($row['created_at'])?>
                <!-- chế độ xem --> 
                <img class="div_width_hight_icon icon_regime" title="<?php echo $data_view_mode_txt[$row['view_mode']] ?>" src="<?=$data_view_mode[$row['view_mode']]?>" alt="Ảnh lỗi">
            </p>
        </div>
        <!-- chức năng quản lý bài viết -->
        <?php if (isset($_SESSION['login'])){ ?>
            <img class="ep_post_more" src="../img/image_new/3cham_ngang.svg" alt="ep_post_more.svg">
        <?php if (isset($id_group) && $id_group > 0){
            // if ($row['type'] == 1 && $row['position'] > 0){
            include 'manager_gr_post.php';
        }else{ ?>
            <div class="ep_post_action1">
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
                
                <?php if ($my_id == $row['author'] && $group_pause == 0 && $suspended_me == 0) { ?>
                <div class="ep_post_action1_deatail ep_post_action1_deatail_edit" data-new_id="<?=$row['new_id']?>" data-new_type="<?=$row['new_type']?>" data-new_parent="<?=$row['parents_id']?>" data-album_id="<?=$row['album_id']?>">
                    <img src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                    <span class="ep_post_action1_deatail_text">Chỉnh sửa bài viết</span>
                </div>
                <div class="ep_post_action1_deatail ep_post_action1_deatail_edit_object" data-view_mode="<?=$row['view_mode']?>" data-except="<?=$row['except']?>" data-new_id="<?=$row['new_id']?>">
                    <img class="action_ico" src="../img/gis_earth-australia-o(2).svg" alt="Ảnh lỗi">
                    <span class="ep_post_action1_deatail_text">Chỉnh sửa đối tượng xem bài viết</span>
                </div>
                <?php } ?>
                <div class="ep_post_action1_deatail" onclick="click_hide_posts(<?=$row['new_id']?>)">
                    <img src="../img/ep_post_hide_bv.svg" alt="Ảnh lỗi">
                    <span class="ep_post_action1_deatail_text">Ẩn bài viết</span>
                </div>
                <?php if ($my_id != $row['author']) { ?>
                <div class="ep_post_action1_deatail ep_post_action1_unfllow" onclick="unfollow(<?=$row['author']?>,<?=$row['author_type']?>)">
                    <img src="../img/ep_post_unflow.svg" alt="Ảnh lỗi">
                    <span class="ep_post_action1_deatail_text">Bỏ theo dõi <?=($row['author_type']==1)?$arr_in4[1][$row['author']]['com_name']:$arr_in4[2][$row['author']]['ep_name']?></span>
                </div>
                <div class="ep_post_action1_deatail ep_post_action1_hide2" onclick="unfollow(<?=$row['author']?>,<?=$row['author_type']?>,30)">
                    <img src="../img/ep_post_temporarily_hide.svg" alt="Ảnh lỗi">
                    <span class="ep_post_action1_deatail_text">Tạm ẩn <?=($row['author_type']==1)?$arr_in4[1][$row['author']]['com_name']:$arr_in4[2][$row['author']]['ep_name']?> trong 30 ngày</span>
                </div>
                <!-- <div class="ep_post_action1_deatail ep_post_turnon_sup">
                    <img src="../img/suppost.svg" alt="Ảnh lỗi">
                    <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Tìm hỗ trợ hoặc báo cáo bài viết</span>
                </div> -->
                <?php } ?>
            </div>
        <?php } ?>
        <?php } ?>
    </div>
    <div class="content_posts">
        <div class="ep_post_content content_limit">
            <?=nl2br($row['content'])?>
        </div> 
    </div>
    <!-- giao diện bài chia sẻ -->
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
    }elseif ($row['album_id'] > 0){
        $db_new_share = new db_query("SELECT * FROM album WHERE id = ".$row['album_id']);
        $db_new_share = mysql_fetch_array($db_new_share->result);
        $name_file = '';
        $file = implode('||',array_column(array_map(function($v){return (array)$v;},json_decode($db_new_share['file'])),'file'));
        $created_at = $db_new_share['created_at'];
        $new_type = 0;
        $new_id = 0;
        $author = $db_new_share['user_id'];
        $author_type = $db_new_share['user_type'];
        echo '<div class="post_share">';
    }elseif ($row['group_id'] > 0){
        $name_file = '';
        $file = '';
        $created_at = 0;
        $new_type = 0;
        $new_id = 0;
        $author = 0;
        $author_type = 0;
        echo '<div class="post_share">';
    }else{
        $name_file = $row['name_file'];
        $file = $row['file'];
        $created_at = $row['created_at'];
        $new_type = $row['new_type'];
        $new_id = $row['new_id'];
        $author = $row['author'];
        $author_type = $row['author_type'];
        $class_post_share = "";
    }
    if ($row['group_id'] > 0){ ?>
        <div class="gr_bgi">
            <img src=<?=$arr_group[$row['group_id']]['group_image']?> onerror="this.src=`/img/nv_default_bgi.svg`;">
        </div>
    <?php }else{ ?>
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
    <?php }
    if ($new_type == 3 || $new_type == 4){
        $db_event = new db_query("SELECT events.*, event_join.id AS id_join FROM events LEFT JOIN event_join ON events.id = event_join.id_event WHERE id_new = " . $new_id);
        $row_event = mysql_fetch_array($db_event->result); ?>
        <!-- giao diện sự kiện -->
        <u class="v_event_more1 view_detail_event" data-type="<?=$new_type?>" data-id="<?=$new_id?>">Xem chi tiết</u>
        <div class="img_sukien_congty">
            <img src="../img/new_feed/event/<?=($new_type == 3)?"event_noi_bo":"event_doi_ngoai"?>/avatar/<?=$author?>/<?=$row_event['avatar']?>" alt="Ảnh lỗi">
            <div class="sk-time">
                <div class="sk-gio">
                    <p><?=date("H:i", $row_event['time'])?></p>
                </div>
                <div class="sk-ngay">
                    <p><?=date("d/m", $row_event['time'])?></p>
                </div>
            </div>
            <div class="sk-dk"> <button class="btn_event_join" data-event_id="<?=$row_event['id']?>"><?=($row_event['id_join']==null)?"Tham gia":"Hủy tham gia"?></button> </div>
        </div>
    <?php }elseif ($new_type == 7){ ?>
        <!-- giao diện bình chọn -->
        <div class="container-binhchon">
            <?php $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $new_id);
            $db_vote2 = new db_query("SELECT * FROM user_vote WHERE id_new = " . $new_id);
            $count_vote2 = mysql_num_rows($db_vote2->result);
            while ($row_vote = mysql_fetch_array($db_vote->result)) {
                $db_user_vote = new db_query("SELECT * FROM user_vote WHERE id_vote = " . $row_vote['id']);
                $db_user_vote_detail = new db_query("SELECT * FROM user_vote WHERE id_user = " . $my_id . " AND user_type = " . $my_type . " AND id_vote = " . $row_vote['id']);
                if (mysql_num_rows($db_user_vote_detail->result) > 0) {
                    $checked = "checked";
                } else {
                    $checked = "";
                }

                if ($count_vote2 == 0) {
                    $width = 0;
                } else {
                    $width = mysql_num_rows($db_user_vote->result) / $count_vote2 * 100;
                } ?>
                <div class="binhchon v_binhchon_vote" data-id_vote="<?= $row_vote['id'] ?>" data-id_new="<?= $new_id ?>">
                    <div class="phuongan">
                        <div class="container-phuongan" style="width: <?= $width ?>%">
                        </div>
                        <div class="container_div_chon_pa">
                            <input type="checkbox" class="vote_pa" <?= $checked ?>>
                            <span><?= $row_vote['answer'] ?></span>
                        </div>
                    </div>
                    <div class="nguoi-bc">
                        <?php if (mysql_num_rows($db_user_vote->result) > 0) {
                            while ($row_user = mysql_fetch_array($db_user_vote->result)) {
                                if ($row_user['user_type'] != 1) {
                                    if ($arr_in4[2][$row_user['id_user']]['ep_image']=='') {
                                        $img_avt = '../img/avatar_default.png';
                                    } else {
                                        $img_avt = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_in4[2][$row_user['id_user']]['ep_image'];
                                    }
                                } else {
                                    if ($arr_in4[1][$row_user['id_user']]['com_logo']=='') {
                                        $img_avt = '../img/avatar_default.png';
                                    } else {
                                        $img_avt = 'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_in4[1][$row_user['id_user']]['com_logo'];
                                    }
                                } ?>
                                <div class="img">
                                    <img src="<?= $img_avt ?>">
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="anh v_anh_vote">
                        <?php $val = checkImages($row_vote['file']);
                        if ($val == 0) {
                            if ($row_vote['file'] != "") { ?>
                                <a download class="v_file_alert02" href="../img/new_feed/alert/<?= $author ?>/<?= $row_vote['file'] ?>">
                                    <div class="v_file_alert02_name"><?= $row_vote['file'] ?></div>
                                    <div class="v_file_alert02_time_size">
                                        <?= date("H:i d/m/Y", $created_at) ?>
                                    </div>
                                    <img class="v_file_alert02_icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                                </a>
                            <?php }
                        } else { ?>
                            <div class="anh1"> <img src="../img/new_feed/vote/<?= $author ?>/<?= $row_vote['file'] ?>"> </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <?php if ($row['parents_id'] > 0 || $row['album_id'] > 0 || $row['group_id'] > 0){
        if (!$db_new_share){
            echo "Nội dung này không còn tồn tại.";
        }else{ ?>
            <div class="post_share_content">
                <?php if ($row['group_id'] > 0){ ?>
                    <p class="post_share_content_time"><?=($arr_group[$row['group_id']]['group_mode']==0)?"Nhóm công khai":"Nhóm riêng tư"?> &#9679 <?=count(explode(',',$arr_group[$row['group_id']]['id_employee']))?> thành viên</p>
                    <p class="post_share_content_title"><?=$arr_group[$row['group_id']]['group_name']?></p>
                <?php }else{ ?>
                    <a target="_blank" href="<?=render_link_profile($author, $author_type)?>" class="post_share_content_title"><?=($author_type==1)?$arr_in4[1][$author]['com_name']:$arr_in4[2][$author]['ep_name']?></a>
                    <p class="post_share_content_time"><?= time_elapsed_string($db_new_share['created_at'])?>
                        <!-- chế độ xem -->
                        <img class="div_width_hight_icon icon_regime" title="<?php echo $data_view_mode_txt[$db_new_share['view_mode']] ?>" src="<?=$data_view_mode[$db_new_share['view_mode']]?>" alt="Ảnh lỗi">
                    </p>
                    <div class="content_posts content_posts_share">
                        <p class="post_share_content_detail content_limit"><?=nl2br(@$db_new_share['content'])?></p>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <?php } ?>
    <!-- thống kê lượt tương tác - thích, bình luận, chia sẻ -->
    <div class="ep_post_count_like">
        <div class="ep_post_sum_like">
            <div class="box_icon_react">
                <?php  
                if (count($row['list_react_post']) > 0){
                    $list_reaction_by_type = []; 
                    foreach ($row['list_react_post'] as $k => $v) {
                        $list_reaction_by_type[$v['nr_type']][] = $v;
                    }  
                    usort($list_reaction_by_type, function($a, $b) {return count($a)<count($b);});
                    foreach ($list_reaction_by_type as $k => $v) {
                        if ($k < 3) { ?>
                            <div class="btn_hover_icon_react" data-icon_type="<?=$v[0]['nr_type']?>" data-new_id = "<?php echo $row['new_id']; ?>">
                                <img class="icon_react_small" src="../img/reaction/reaction_<?=$v[0]['nr_type']?>.svg" alt="Ảnh lỗi">
                            </div>
                        <?php }
                    } 
                }?> 
            </div>
            <div class="box_txt_react box_reaction" data-new_id = "<?php echo $row['new_id']; ?>">
                <button class="hover_txt_underline count_react_post">
                    <?php
                    if (count($row['list_react_post']) > 0){ 
                        if (isset($_SESSION['login'])){ 
                            $check_react = get_info_react($row['list_react_post']);  
                            if ($check_react) {
                                if (count($row['list_react_post']) - 1 > 0) {
                                    $text_react = 'Bạn và '.(count($row['list_react_post'])-1).' người khác';
                                } else {
                                    $text_react = 'Bạn';
                                }  
                            } else {
                                $text_react = count($row['list_react_post']).' người';
                            }
                        }else{
                            $text_react = count($row['list_react_post']).' người';
                        } 
                        echo $text_react; 
                    }
                    ?>
                </button>
            </div>
        </div> 
        <div class="ep_post_sum_cmt">
            <div class="box_comment" data-new_id = "<?php echo $row['new_id']; ?>">
                <button class="hover_txt_underline count_cmt_post">
                    <?php if ($row['count_comment'] > 0) { ?>
                        <span class="count_comment"><?=$row['count_comment']?></span> Bình luận 
                    <?php } ?> 
                </button>
            </div>
            <div class="box_share" data-new_id = "<?php echo $row['new_id']; ?>">
                <button class="hover_txt_underline count_share_post">
                    <?php if ($row['count_share'] > 0) { ?>
                        <span class="count_share"><?=$row['count_share']?></span> Lượt chia sẻ
                    <?php } ?> 
                </button> 
            </div>
        </div>
    </div>
    <!-- chức năng tương tác với bài viết -->
    <?php if ($group_pause == 0 && $suspended_me == 0){ ?>
    <div class="ep_post_action">
        <div class="box_hover_reaction">
            <button class="btn_action_react" data-react="1" <?=(isset($_SESSION['login']))?'onclick="like_post(this,'.$row['new_id'].')"':'target="_blank" href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html"'?>>
                <?php 
                $check_react = get_info_react($row['list_react_post']);
                if ($check_react) { ?>
                    <img class="icon_react" src="../img/reaction/reaction_<?=$check_react['nr_type']?>.svg" alt="Ảnh lỗi">
                    <p class="txt_react active <?=get_reaction($check_react['nr_type'])['color']?>" data-react_type="<?=$check_react['nr_type']?>"><?=get_reaction($check_react['nr_type'])['text']?></p>
                <?php } else { ?>
                    <img class="icon_react" src="../img/ep_post_active_like.svg" alt="Ảnh lỗi">
                    <p class="txt_react">Thích</p>
                <?php } ?>
            </button> 
        </div> 
        <?php if ($row['tat_comment'] == 0){ ?>
        <a class="ep_post_action_detail bat_tat_comment" <?=(isset($_SESSION['login']))?'onclick="focus_cmt(this)"':'target="_blank" href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html"'?>>
            <img src="../img/ep_post_cmt.svg" alt="Ảnh lỗi">
            <span class="ep_post_cmt_text">Bình luận</span>
        </a>
        <?php } ?>
        <div class="ep_post_popup_share">
            <div class="ep_post_popup_share_detail" onclick="share_now(<?=$row['new_id']?>,<?=$row['parents_id']?>,<?=$row['album_id']?>,<?=$row['group_id']?>)">
                <img src="../img/ep_post_share_now.svg" alt="Ảnh lỗi">
                <span class="ep_post_popup_share_text">Chia sẻ ngay</span>
            </div>
            <div class="ep_post_popup_share_detail share_up_invidual_avt" data-new_id=<?=$row['new_id']?> data-parents_id="<?=$row['parents_id']?>" data-new_type=<?=$row['new_type']?> data-album_id=<?=$row['album_id']?> data-gr_id=<?=$row['group_id']?>>
                <img src="../img/ep_post_share_new.svg" alt="Ảnh lỗi">
                <span class="ep_post_popup_share_text">Chia sẻ lên bảng tin</span>
            </div>
            <div class="ep_post_popup_share_detail ep_send_with_chat" data-new_id=<?=$row['new_id']?> data-parents_id="<?=$row['parents_id']?>" data-new_type=<?=$row['new_type']?> data-album_id=<?=$row['album_id']?> data-ep_id=<?=$author?> data-ep_type=<?=$author_type?> data-gr_id=<?=$row['group_id']?>>
                <img src="../img/ep_post_share_mess.svg" alt="Ảnh lỗi">
                <span class="ep_post_popup_share_text">Gửi bằng Chat</span>
            </div>
            <?php if ($row['group_id'] <= 0){ ?>
            <div class="ep_post_popup_share_detail ep_share_up_group" data-new_id=<?=$row['new_id']?> data-parents_id="<?=$row['parents_id']?>" data-new_type=<?=$row['new_type']?> data-album_id=<?=$row['album_id']?> data-gr_id=<?=$row['group_id']?>>
                <img src="../img/ep_post_share_group.svg" alt="Ảnh lỗi">
                <span class="ep_post_popup_share_text">Chia sẻ lên nhóm</span>
            </div>
            <?php } ?>
            <div class="ep_post_popup_share_detail ep_share_up_invidual" data-new_id=<?=$row['new_id']?> data-parents_id="<?=$row['parents_id']?>" data-new_type=<?=$row['new_type']?> data-album_id=<?=$row['album_id']?> data-gr_id=<?=$row['group_id']?>>
                <img src="../img/ep_post_page_friend.svg" alt="Ảnh lỗi">
                <span class="ep_post_popup_share_text">Chia sẻ lên trang cá nhân của bạn bè</span>
            </div>
        </div>
        <a class="ep_post_action_detail ep_post_turnon_popup_share" <?=(isset($_SESSION['login']))?'onclick="turn_on_popup_share(this)"':'target="_blank" href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html"'?>>
            <img class="ep_post_turnon_popup_share_img" src="../img/ep_post_share.svg" alt="Ảnh lỗi">
            <span class="ep_post_cmt_text">Chia sẻ</span>
        </a>
    </div>
    <?php } ?>
    <!-- form bình luận -->
    <?php if (isset($_SESSION['login']) && $row['tat_comment'] == 0 && $group_pause == 0 && $suspended_me == 0){ ?>
    <div class="ep_post_show_cmt_detail bat_tat_comment">
        <img class="ep_post_write_avt" src="<?=$my_avt?>" alt="Ảnh lỗi">
        <div class="ep_post_write box_comment_submit" data-type="0" id="form_comment<?= $row['new_id'] ?>" data-new_id="<?= $row['new_id'] ?>">
            <textarea class="ep_post_write_input comment_submit_main comment_submit" id="comment<?=$row['new_id']?>" type="text" placeholder="Viết bình luận..."></textarea>
            <div class="ep_post_write_action">
                <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                <div class="box_choose_file_cmt">
                    <img class="ep_post_write_action_deatail icon_img_cmt" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                    <input type="file" class="file_img_cmt" onchange="changeImgCmt(this)" accept="image/*" hidden />
                </div>
                <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
            </div>
            <div class="box_render_img_cmt">

            </div>
        </div>
    </div>
    <?php } ?>
    <?php 
        $sql_cmt = "
            SELECT comment.*,
            (CASE WHEN EXISTS (SELECT id FROM `like_comment` 
            WHERE like_comment.id_comment = comment.id AND like_comment.id_user = $my_id) 
            THEN 1 ELSE 0 END) AS liked,
            (CASE WHEN EXISTS (SELECT id FROM `comment` AS cmt_child WHERE cmt_child.id_parent = comment.id) THEN 1 ELSE 0 END) AS had_child
            FROM comment LEFT JOIN like_comment ON comment.id = like_comment.id_comment 
            WHERE id_new = " . $row['new_id'] . " 
        ";
        $sql_cmt_end = "    
            GROUP BY comment.id 
            ORDER BY created_at DESC 
        ";
        $sql_cmt_parent = " AND id_parent = 0  ";
        $sql_limit = " LIMIT 0, 3 ";

        $pr_count_cmt = new db_query($sql_cmt.$sql_cmt_parent.$sql_cmt_end);
        if (mysql_num_rows($pr_count_cmt->result) > 3) { ?>
            <button class="btn_view_cmt">Xem các bình luận trước</button>
        <?php } 
    ?>
    <!-- danh sách bình luận -->
    <div class="ep_post_show_cmt list_cmt_parent" data-isauthor=<?=($my_id==$row['author'])?1:0?>>
        <?php  
        $pr_cmt = new db_query($sql_cmt.$sql_cmt_parent.$sql_cmt_end.$sql_limit);
        while ($row_comment = mysql_fetch_array($pr_cmt->result)) {
            // danh những user thả cảm xúc cmt  
            $list_react_cmt = select("*", 'like_comment', '', ['id_comment'=> $row_comment['id']], '', 'created_at DESC');
            if ($row_comment['user_type'] == 1) {
                $name_author = $arr_in4[1][(int)$row_comment['id_user']]['com_name'];
                $avt_com  = $arr_in4[1][(int)$row_comment['id_user']]['com_logo'];
                if ($avt_com == "") {
                    $avt_image =  '/img/logo_com.png';
                } else {
                    $avt_image = 'https://chamcong.24hpay.vn/upload/company/logo/'.$avt_com;
                }
            } else {
                $name_author = $arr_in4[2][(int)$row_comment['id_user']]['ep_name'];
                $avt_emp  = $arr_in4[2][(int)$row_comment['id_user']]['ep_image'];
                if ($avt_emp == "") {
                    $avt_image =  '/img/logo_com.png';
                } else {
                    $avt_image = "https://chamcong.24hpay.vn/upload/employee/".$avt_emp;
                }
            }  
            // nếu bình luận ko bị ẩn hoặc bình luận bị ẩn và bạn là chủ bài viết => hiện bình luận
            if ($row_comment['hidden'] == 0 || ($row_comment['hidden'] == 1 && ($row['author'] == $my_id || $is_admin == 1))) {
                if ($row_comment['hidden'] == 1){
                    $class_avt = " opacity-0p15";
                    $txt_cmt_detail_action = "Hiện bình luận";
                    $ico_cmt_detail_action = "../img/ep_show_cmt.svg";
                }else{
                    $class_avt = "";
                    $txt_cmt_detail_action = "Ẩn bình luận";
                    $ico_cmt_detail_action = "../img/ep_hide_cmt.svg";
                } ?>
                <div class="ep_post_show_cmt_detail cmt_parent_item" data-idcmt = '<?=$row_comment['id']?>'>
                    <a target="_blank" href="<?php echo render_link_profile($row_comment['id_user'], $row_comment['user_type']) ?>">
                        <img class="ep_show_cmt_avt<?=$class_avt?>" src="<?=$avt_image?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                    </a>
                    <div class="ep_show_cmt_content">
                        <div class="ep_show_cmt_content_detail<?=$class_avt?>">
                            <a target="_blank" href="<?php echo render_link_profile($row_comment['id_user'], $row_comment['user_type']) ?>" class="ep_show_cmt_username"><?=$name_author?></a>
                            <div class="content_posts box_content_cmt">
                                <p class="ep_show_cnt_item content_comment content_limit" id="text_comment<?=$row_comment['id']?>"><?=nl2br($row_comment['content'])?></p>
                            </div>
                            <?php if ($row_comment['image'] != '') { ?>
                                <img class="image_cmt" id="img_cmt<?=$row_comment['id']?>" src="<?=$row_comment['image']?>" alt="Ảnh lỗi">
                            <?php } ?>
                        </div>
                        <!-- chức năng quản lý bình luận -->
                        <?php if (isset($_SESSION['login']) && (($row_comment['id_user'] == $my_id && $row_comment['user_type'] == $my_type) || $is_admin == 1 || ($row['author'] == $my_id && $row['author_type'] == $my_type)) && $row['tat_comment'] == 0 && $group_pause == 0 && $suspended_me == 0){ ?>
                        <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                        <div class="popup_action_cmt">
                            <?php if ($row_comment['id_user'] == $my_id){ ?>
                                <div class="popup_action_cmt_detail action_edit_comment" data-cmt_id="<?=$row_comment['id']?>">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>
                            <?php } ?>
                            <?php if ($row['author'] == $my_id || $is_admin == 1){ ?>
                                <div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideCmt(this,<?=$row_comment['id']?>)">
                                    <img class="popup_action_cmt_detail_img" src="<?=$ico_cmt_detail_action?>" alt="Ảnh lỗi">
                                    <?=$txt_cmt_detail_action?>
                                </div>
                            <?php } ?>
                            <?php if ($row_comment['id_user'] == $my_id || $row['author'] == $my_id || $is_admin == 1){ ?>
                                <div class="popup_action_cmt_detail" onclick="deleteCmt(this,<?=$row_comment['id']?>)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <!-- chức năng tương tác với bình luận / thống kê thời gian, tương tác -->
                        <div class="ep_show_cmt_action2">
                            <?php if (isset($_SESSION['login']) && $group_pause == 0 && $suspended_me == 0){ ?>
                                <div class="box_hover_reaction box_hover_react_cmt">
                                    <?php 
                                    $check_react_cmt = get_info_react($list_react_cmt);   
                                    if ($check_react_cmt) { ?>
                                        <button data-type="1" class="btn_action_react ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like <?=get_reaction($check_react_cmt['react_type'])['color']?>" onclick="like_comment(this,<?=$row_comment['id']?>)"><?=get_reaction($check_react_cmt['react_type'])['text']?> .</button>
                                    <? } else { ?>
                                        <button data-type="0" class="btn_action_react ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment(this,<?=$row_comment['id']?>)">Thích .</button>
                                    <? } ?> 
                                </div>  
                                <?php if ($row['tat_comment'] == 0){ ?>
                                    <a class="action_reply_cmt ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep" <?=(isset($_SESSION['login']))?'':'target="_blank" href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html"'?>>Trả lời . </a>
                                <?php } ?>
                            <?php } ?>
                            <button class="ep_show_cmt_action2_btn"><?=time_elapsed_string($row_comment['created_at'])?></button>
                            <div class="ep_show_cmt_action2_count_like box_reaction_cmt" data-cmt_id="<?=$row_comment['id']?>">
                                <?php 
                                if (count($list_react_cmt) > 0){ ?>
                                    <div class="box_icon_react">
                                        <?php $lst_react_cmt_type = []; 
                                        foreach ($list_react_cmt as $k => $v) {
                                            $lst_react_cmt_type[$v['react_type']][] = $v;
                                        }  
                                        usort($lst_react_cmt_type, function($a, $b) {return count($a)<count($b);});
                                        foreach ($lst_react_cmt_type as $k => $v) {
                                            if ($k < 3) { ?>
                                                <div class="btn_hover_icon_react_cmt" data-icon_type="<?=$v[0]['react_type']?>" data-cmt_id = "<?php echo $row_comment['id']; ?>">
                                                    <img class="icon_react_small" src="../img/reaction/reaction_<?=$v[0]['react_type']?>.svg" alt="Ảnh lỗi">
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                    <div class="box_txt_react box_reaction" data-cmt_id = "<?php echo $row_comment['id']; ?>">
                                        <button class="hover_txt_underline btn_action_react_cmt">
                                            <span class="number_count_like"><?=count($list_react_cmt)?></span>
                                        </button>
                                    </div>
                                <?php } ?>
                            </div> 
                        </div>
                    </div>
                    <!-- danh sách trả lời bình luận -->
                    <div class="ep_show_repcmt list_cmt_child"> 
                        <?php 
                        $sql_cmt_child = " AND comment.id_parent = ".$row_comment['id'];
                        $pr_cmt_child = new db_query($sql_cmt.$sql_cmt_child.$sql_cmt_end.$sql_limit); 
                        
                        $pr_cmt_count_child = new db_query($sql_cmt.$sql_cmt_child.$sql_cmt_end); 
                        $count_list_reply_comment = mysql_num_rows($pr_cmt_count_child->result);
                        if ($count_list_reply_comment > mysql_num_rows($pr_cmt_child->result)) { ?>
                            <button class="btn_view_cmt_child" data-page="1">Xem các trả lời trước</button>
                        <? } 
                        ?>
                        <div class="content_cmt_child" id="ep_form_repcmt<?=$row_comment['id']?>">
                            <?php if (isset($_SESSION['login']) && $row['tat_comment'] == 0 && $group_pause == 0 && $suspended_me == 0){
                                while ($cmt_child = mysql_fetch_array($pr_cmt_child->result)) { 
                                    if ($cmt_child['hidden'] == 0 || (($row_comment['hidden'] == 1 || $cmt_child['hidden'] == 1) && ($row['author'] == 1 || $is_admin == 1))){
                                        $class_op = '';
                                        if ($row_comment['hidden'] == 1 || $cmt_child['hidden'] == 1){
                                            $class_op = ' opacity-0p15';
                                        } 
                                        $type_create_child = 0;
                                        if ($_SESSION['login']['id'] != 0 && $cmt_child['id_user'] == $_SESSION['login']['id'] && $cmt_child['user_type'] == $_SESSION['login']['user_type']) {
                                            $type_create_child = 1;
                                        } 
                                        if ($cmt_child['user_type'] == 1) {
                                            $name_author_child = $arr_in4[1][(int)$cmt_child['id_user']]['com_name'];
                                            $avt_com_i  = $arr_in4[1][(int)$cmt_child['id_user']]['com_logo'];
                                            if ($avt_com_i == "") {
                                                $avt_cmt_child =  '/img/logo_com.png';
                                            } else {
                                                $avt_cmt_child = 'https://chamcong.24hpay.vn/upload/company/logo/'.$avt_com_i;
                                            }
                                        } else {
                                            $name_author_child = $arr_in4[2][(int)$cmt_child['id_user']]['ep_name'];
                                            $avt_emp_i  = $arr_in4[2][(int)$cmt_child['id_user']]['ep_image'];
                                            if ($avt_emp_i == "") {
                                                $avt_cmt_child =  '/img/logo_com.png';
                                            } else {
                                                $avt_cmt_child = "https://chamcong.24hpay.vn/upload/employee/".$avt_emp_i;
                                            }
                                        }
                                        // danh những user thả cảm xúc cmt con  
                                        $list_react_cmt_child = select("*", 'like_comment', '', ['id_comment'=> $cmt_child['id']], '', 'created_at DESC');
                                        ?>
                                        <div class="ep_show_repcmt_detail cmt_child_item" data-hidden="<?=$cmt_child['hidden']?>" data-idcmt='<?=$cmt_child['id']?>'>
                                            <a target="_blank" href="<?=render_link_profile($cmt_child['id_user'], $cmt_child['user_type'])?>">
                                                <img class="ep_show_cmt_avt <?=$class_op?>" src="<?=$avt_cmt_child?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                                            </a>
                                            <div class="ep_show_cmt_content">
                                                <div class="ep_show_cmt_content_detail <?=$class_op?>">
                                                    <a target="_blank" href="<?=render_link_profile($cmt_child['id_user'], $cmt_child['user_type'])?>" class="ep_show_cmt_username"><?=$name_author_child?></a>
                                                    <div class="content_posts box_content_cmt"> 
                                                        <p class="ep_show_cnt_item content_comment_child content_limit" id="text_comment<?=$cmt_child['id']?>"><?=nl2br($cmt_child['content'])?></p>
                                                    </div>
                                                    <?php if ($cmt_child['image'] != '') { ?>
                                                        <img class="image_cmt" id="img_cmt<?=$cmt_child['id']?>" src="<?=$cmt_child['image']?>" alt="Ảnh lỗi">
                                                    <?php } ?>
                                                </div>
                                                <?php if (isset($_SESSION['login']) && (($cmt_child['id_user'] == $my_id && $cmt_child['user_type'] == $my_type) || $is_admin == 1 || ($row['author'] == $my_id && $row['author_type'] == $my_type)) && $row['tat_comment'] == 0 && $group_pause == 0 && $suspended_me == 0){ ?> 
                                                    <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                                    <div class="popup_action_cmt">
                                                        <?php if ($type_create_child == 1){ ?>
                                                            <div class="popup_action_cmt_detail action_edit_comment child" data-cmt_id="<?=$cmt_child['id']?>">
                                                                <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                                                    alt="Ảnh lỗi">
                                                                Chỉnh sửa bình luận
                                                            </div>
                                                        <?php } 
                                                        if ($row['author'] == $my_id || $is_admin == 1){
                                                            if ($cmt_child['hidden'] == 1){ ?>
                                                                <div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmt(this,<?=$cmt_child['id']?>,<?=$row_comment['id']?>)">
                                                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi">
                                                                    Hiển thị bình luận
                                                                </div>
                                                            <?php }else{ ?>
                                                                <div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmt(this,<?=$cmt_child['id']?>,<?=$row_comment['id']?>)">
                                                                    <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                                                                    Ẩn bình luận
                                                                </div>
                                                            <? }
                                                        } ?>
                                                        <div class="popup_action_cmt_detail" onclick="deleteCmt(this,<?=$cmt_child['id']?>)">
                                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                                alt="Ảnh lỗi">
                                                            Xóa bình luận
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="ep_show_cmt_action2">
                                                    <?php if ($group_pause == 0 && $suspended_me == 0){ ?>
                                                        <div class="box_hover_reaction box_hover_react_cmt">
                                                            <?php 
                                                            $check_react_cmt_child = get_info_react($list_react_cmt_child);  
                                                            if ($check_react_cmt_child) { ?>
                                                                <button data-type="1" class="btn_action_react ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like <?=get_reaction($check_react_cmt_child['react_type'])['color']?>" onclick="like_comment(this,<?=$cmt_child['id']?>)"><?=get_reaction($check_react_cmt_child['react_type'])['text']?> .</button>
                                                            <? } else { ?>
                                                                <button data-type="0" class="btn_action_react ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment(this,<?=$cmt_child['id']?>)">Thích .</button>
                                                            <? } ?>  
                                                        </div>
                                                    <?php } ?>
                                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time"><?=time_elapsed_string($cmt_child['created_at'])?></button>
                                                    <div class="ep_show_cmt_action2_count_like box_reaction_cmt" data-cmt_id="<?=$cmt_child['id']?>">
                                                        <?php 
                                                        if (count($list_react_cmt_child) > 0){ ?>
                                                            <div class="box_icon_react">
                                                                <?php $lst_react_cmt_type_child = []; 
                                                                foreach ($list_react_cmt_child as $k => $v) {
                                                                    $lst_react_cmt_type_child[$v['react_type']][] = $v;
                                                                }  
                                                                usort($lst_react_cmt_type_child, function($a, $b) {return count($a)<count($b);});
                                                                foreach ($lst_react_cmt_type_child as $k => $v) {
                                                                    if ($k < 3) { ?>
                                                                        <div class="btn_hover_icon_react_cmt" data-icon_type="<?=$v[0]['react_type']?>" data-cmt_id = "<?php echo $cmt_child['id']; ?>">
                                                                            <img class="icon_react_small" src="../img/reaction/reaction_<?=$v[0]['react_type']?>.svg" alt="Ảnh lỗi">
                                                                        </div>
                                                                    <?php }
                                                                } ?>
                                                            </div>
                                                            <div class="box_txt_react box_reaction" data-cmt_id = "<?php echo $cmt_child['id']; ?>">
                                                                <button class="hover_txt_underline btn_action_react_cmt">
                                                                    <span class="number_count_like"><?=count($list_react_cmt_child)?></span>
                                                                </button>
                                                            </div>
                                                        <?php } ?> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <? }
                                }
                            } ?>
                        </div> 
                    </div>
                </div>
            <?php } ?>
        <?php } ?> 
    </div>
</div>
<?php } ?>

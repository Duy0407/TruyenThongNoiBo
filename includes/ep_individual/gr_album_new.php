<?php if ($album > 0){
    $sql = "SELECT album.*, COUNT(like_album.id) AS count_like,
    CASE WHEN EXISTS (SELECT id FROM like_album WHERE id_album = album.id AND like_album.user_id = $my_id) THEN 1 ELSE 0 END AS liked
    FROM `album` LEFT JOIN like_album ON album.id = like_album.id_album
    WHERE album.user_id = $ep_id AND album.id = $album 
    GROUP BY album.id";
    $detail_album = new db_query($sql);
    if (mysql_num_rows($detail_album->result) > 0){
        $detail_album = mysql_fetch_array($detail_album->result);
        $file = json_decode($detail_album['file']);
        $except = explode(',',$detail_album['except']);
        
        if ($type_edit == 0 || $detail_album['view_mode'] == 0 || 
        ($is_friend == 1 && ($detail_album['view_mode'] == 2 || 
            ($detail_album['view_mode'] == 3 && !in_array($my_id, $except)) || 
            ($detail_album['view_mode'] == 4 && in_array($my_id, $except))
        ))){

        }else{
            header('Location: /trang-ca-nhan-e'.$ep_id.'/images');
        }
    }else{
        header('Location: /trang-ca-nhan-e'.$ep_id.'/images');
    }
    // số bình luận
    $count_comment = "SELECT * FROM comment_album WHERE album_id = $album";
    $count_comment = new db_query($count_comment);
    $count_comment = mysql_num_rows($count_comment->result);
    // số bình luận cha
    $count_comment_parent = "SELECT * FROM comment_album WHERE album_id = $album AND id_parent = 0";
    $count_comment_parent = new db_query($count_comment_parent);
    $arr_stranger = [];
    while ($row = mysql_fetch_array($count_comment_parent->result)) {
        if ($row['user_id'] != '' && $row['user_type'] == 2 && !array_key_exists($row['user_id'],$arr_ep) && !in_array($row['user_id'],$arr_stranger)){
            $arr_stranger[] = $row['user_id'];
        }
    }
    $arr_stranger = list_stranger_infor(implode(",",$arr_stranger));
    foreach ($arr_stranger as $key => $value) {
        $arr_ep[$value['ep_id']] = $value;
    }
    $count_comment_parent = mysql_num_rows($count_comment_parent->result);
    // số lượt chia sẻ
    $count_share = "SELECT id FROM share_album WHERE album_id = $album GROUP BY user_id, user_type";
    $count_share = new db_query($count_share);
    $count_share = mysql_num_rows($count_share->result); ?>
    <div class="gr_introduce_box_header">
        <a class="center_nav_album">
            <img class="gr_introduce_box_header_img" src="/img/standards_community_back_black.svg" alt="Ảnh lỗi">
            Album
        </a>
    </div>
    <div class="gr_album gr_album_detail_infor">
        <div class="gr_album_title_box">
            <p class="gr_album_title"><?=$detail_album['album_name']?></p>
            <p class="hide gr_album_time"><?=date('H:i d-m-Y',$detail_album['created_at'])?></p>
            <img class="hide gr_album_viewmode" src=<?=$data_view_mode[$detail_album['view_mode']]?>>
            <p class="gr_album_body_txt_2"><?=count($file)?> mục</p>
        </div>
        <div class="ep_post_count_like">
            <div class="ep_post_sum_like">
                <img src="../img/ep_post_like.svg" alt="Ảnh lỗi">
                <?=$detail_album['count_like']?>
            </div>
            <div class="ep_post_sum_cmt">
                <?=$count_comment?> Bình luận <?=$count_share?> Lượt chia sẻ
            </div>
        </div>
        <div class="ep_post_action">
        <?php if (isset($_SESSION['login'])){ ?>
            <div class="ep_post_action_detail" onclick="like_album(this)">
                <?php if ($detail_album['liked'] == 1){ ?>
                    <img src="../img/ep_post_liked.svg" alt="Ảnh lỗi">
                <?php }else{ ?>
                    <img src="../img/ep_post_active_like.svg" alt="Ảnh lỗi">
                <?php } ?>
                <span class="ep_post_like_text">Thích</span>
            </div>
            <div class="ep_post_action_detail" onclick="focus_cmt(this)">
                <img src="../img/ep_post_cmt.svg" alt="Ảnh lỗi">
                <span class="ep_post_cmt_text">Bình luận</span>
            </div>
            <div class="ep_post_popup_share">
                <div class="ep_post_popup_share_detail" onclick="shareOnFacebook(0,<?=$album?>)">
                    <img src="/img/nv_ic_fb.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Facebook</span>
                </div>
                <div class="ep_post_popup_share_detail" onclick="shareOnPinterest(0,<?=$album?>)">
                    <img src="/img/nv_ic_pin.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Pinterest</span>
                </div>
                <div class="ep_post_popup_share_detail" onclick="shareOnTwitter(0,<?=$album?>)">
                    <img src="/img/nv_ic_tw.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Twitter</span>
                </div>
                <div class="ep_post_popup_share_detail" onclick="shareOnLinkedIn(0,<?=$album?>)">
                    <img src="/img/nv_ic_in.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Linked In</span>
                </div>
            </div>
            <div class="ep_post_popup_share">
                <div class="ep_post_popup_share_detail" onclick="share_album_now(<?=$album?>)">
                    <img src="../img/ep_post_share_now.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Chia sẻ ngay</span>
                </div>
                <div class="ep_post_popup_share_detail share_up_invidual_avt" data-album_id="<?=$album?>">
                    <img src="../img/ep_post_share_new.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Chia sẻ lên bảng tin</span>
                </div>
                <div class="ep_post_popup_share_detail ep_send_with_chat" data-album_id="<?=$album?>" data-link="<?=$_SERVER['REQUEST_URI']?>">
                    <img src="../img/ep_post_share_mess.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Gửi bằng Chat</span>
                </div>
                <div class="ep_post_popup_share_detail ep_share_up_group" data-album_id="<?=$album?>">
                    <img src="../img/ep_post_share_group.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Chia sẻ lên nhóm</span>
                </div>
                <div class="ep_post_popup_share_detail ep_share_up_invidual" data-album_id="<?=$album?>">
                    <img src="../img/ep_post_page_friend.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Chia sẻ lên trang cá nhân của bạn bè</span>
                </div>
                <div class="ep_post_popup_share_detail ep_share_other_site">
                    <img src="/img/nv_other_share.svg" alt="Ảnh lỗi">
                    <span class="ep_post_popup_share_text">Khác</span>
                </div>
            </div>
            <div class="ep_post_action_detail ep_post_turnon_popup_share" onclick="turn_on_popup_share(this)">
                <img class="ep_post_turnon_popup_share_img" src="../img/ep_post_share.svg" alt="Ảnh lỗi">
                <span class="ep_post_cmt_text">Chia sẻ</span>
            </div>
        <?php }else{ ?>
            <a href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html" target="_blank" class="ep_post_action_detail">
                <img src="../img/ep_post_active_like.svg" alt="Ảnh lỗi">
                <span class="ep_post_like_text">Thích</span>
            </a>
            <a href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html" target="_blank" class="ep_post_action_detail">
                <img src="../img/ep_post_cmt.svg" alt="Ảnh lỗi">
                <span class="ep_post_cmt_text">Bình luận</span>
            </a>
            <a href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html" target="_blank" class="ep_post_action_detail ep_post_turnon_popup_share">
                <img class="ep_post_turnon_popup_share_img" src="../img/ep_post_share.svg" alt="Ảnh lỗi">
                <span class="ep_post_cmt_text">Chia sẻ</span>
            </a>
        <?php } ?>
        </div>
        <!-- form bình luận -->
        <?php if (isset($_SESSION['login'])){ ?>
        <div class="ep_post_show_cmt_detail bat_tat_comment">
            <img class="ep_post_write_avt" src="<?=$my_avt?>" alt="Ảnh lỗi">
            <form class="ep_post_write" data-type="0" id="form_comment0" onsubmit="return comment_album(this);">
                <textarea class="ep_post_write_input" id="comment0" type="text" placeholder="Viết bình luận..."></textarea>
                <div class="ep_post_write_action">
                    <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                    <label for="baiviet_taianh0">
                        <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                        <input type="file" onchange="changeImgCmt(this,0)" accept="image/*" id="baiviet_taianh0" hidden />
                    </label>
                    <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                </div>
            </form>
        </div>
    <?php } ?>
    <!-- danh sách bình luận -->
    <div class="ep_post_show_cmt" data-isauthor=<?=($type_edit==0)?1:0?>>
        <?php $db_comment = new db_query("SELECT comment_album.*, COUNT(like_comment_album.id) AS count_like,
        (CASE WHEN EXISTS (SELECT id FROM `like_comment_album` 
            WHERE like_comment_album.id_comment = comment_album.id AND like_comment_album.user_id = $my_id) 
        THEN 1 ELSE 0 END) AS liked,
        (CASE WHEN EXISTS (SELECT id FROM `comment_album` AS cmt_child WHERE cmt_child.id_parent = comment_album.id) THEN 1 ELSE 0 END) AS had_child
        FROM comment_album LEFT JOIN like_comment_album ON comment_album.id = like_comment_album.id_comment 
        WHERE album_id = " . $album . " AND id_parent = 0
        GROUP BY comment_album.id 
        ORDER BY id DESC ");//LIMIT $limit_cmt
        while ($row_comment = mysql_fetch_array($db_comment->result)) {
            if ($row_comment['user_type'] == 1) {
                if ($arr_com->com_logo == "") {
                    $avt_image =  '/img/logo_com.png';
                }else{
                    $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                }
                $name_author =  $arr_com->com_name;
            }else{
                if ($arr_ep[$row_comment['user_id']]['ep_image'] == ''){
                    $avt_image =  '/img/logo_com.png';
                }else{
                    $avt_image = "https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$row_comment['user_id']]['ep_image'];
                }
                $name_author =  $arr_ep[$row_comment['user_id']]['ep_name'];
            }
            // nếu bình luận ko bị ẩn hoặc bình luận bị ẩn và bạn là chủ bài viết => hiện bình luận
            if ($row_comment['hidden'] == 0 || ($row_comment['hidden'] == 1 && $type_edit == 0)) {
                if ($row_comment['hidden'] == 1){
                    $class_avt = " opacity-0p15";
                    $txt_cmt_detail_action = "Hiện bình luận";
                    $ico_cmt_detail_action = "../img/ep_show_cmt.svg";
                }else{
                    $class_avt = "";
                    $txt_cmt_detail_action = "Ẩn bình luận";
                    $ico_cmt_detail_action = "../img/ep_hide_cmt.svg";
                } ?>
                <div class="ep_post_show_cmt_detail">
                    <img class="ep_show_cmt_avt<?=$class_avt?>" src="<?=$avt_image?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                    <div class="ep_show_cmt_content">
                        <div class="ep_show_cmt_content_detail<?=$class_avt?>">
                            <p class="ep_show_cmt_username"><?=$name_author?></p>
                            <p class="ep_show_cnt_item" id="text_comment<?=$row_comment['id']?>"><?=nl2br($row_comment['content'])?></p>
                            <?php if ($row_comment['image'] != '') { ?>
                                <img class="image_cmt" id="img_cmt<?=$row_comment['id']?>" src="<?=$row_comment['image']?>" alt="Ảnh lỗi">
                            <?php } ?>
                        </div>
                        <!-- chức năng quản lý bình luận -->
                        <?php if (isset($_SESSION['login'])){ ?>
                            <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                        <?php } ?>
                        <div class="popup_action_cmt">
                            <?php if ($row_comment['user_id'] == $my_id){ ?>
                                <div class="popup_action_cmt_detail" onclick="edit_comment(<?=$row_comment['id']?>,0,0)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>
                            <?php } ?>
                            <?php if ($type_edit == 0){ ?>
                                <div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideCmtAlbum(this,<?=$row_comment['id']?>)">
                                    <img class="popup_action_cmt_detail_img" src="<?=$ico_cmt_detail_action?>" alt="Ảnh lỗi">
                                    <?=$txt_cmt_detail_action?>
                                </div>
                            <?php } ?>
                            <?php if ($row_comment['user_id'] == $my_id || $type_edit == 0){ ?>
                                <div class="popup_action_cmt_detail" onclick="deleteCmtAlbum(this,<?=$row_comment['id']?>)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>
                            <?php } ?>
                        </div>
                        <!-- chức năng tương tác với bình luận / thống kê thời gian, tương tác -->
                        <div class="ep_show_cmt_action2">
                            <button  data-type="<?=$row_comment['liked']?>" class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment_album(this,<?=$row_comment['id']?>)">Thích . </button>
                            <a class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep" <?=(isset($_SESSION['login']))?'':'target="_blank" href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html"'?>>Trả lời . </a>
                            <button class="ep_show_cmt_action2_btn"><?=time_elapsed_string($row_comment['created_at'])?></button>
                            <div class="ep_show_cmt_action2_count_like">
                                <img class="ep_show_cmt_action2_count_like_icon" src="../img/like_btn.svg" alt="Ảnh lỗi">
                                <span class="number_count_like"><?=$row_comment['count_like']?></span>
                            </div>
                        </div>
                    </div>
                    <!-- danh sách trả lời bình luận -->
                    <div class="ep_show_repcmt">
                        <?php if ($row_comment['had_child'] == 1){ ?>
                            <div class="view_cmt_rep view_cmt_rep<?=$row_comment['id']?>" onclick="show_rep_album_comment(<?=$row_comment['id']?>);" data-hidden=<?=$row_comment['hidden']?>>Hiển thị bình luận</div>
                        <?php } ?>
                        <!-- form trả lời bình luận -->
                        <div class="ep_form_repcmt" id="ep_form_repcmt<?=$row_comment['id']?>">
                            <img class="ep_post_write_avt" src="<?=$my_avt?>" alt="Ảnh lỗi">
                            <form action="" class="ep_post_write_repcmt" id="form_comment<?=$row_comment['id']?>" data-type="0" data-cmt_id="<?= $row_comment['id']?>" onsubmit="return rep_comment_album(this);">
                                <textarea class="ep_post_write_input" id="comment<?= $row_comment['id']?>" type="text" placeholder="Viết bình luận..."></textarea>
                                <div class="ep_post_write_action">
                                    <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                                    <label for="rep_comment<?= $row_comment['id'] ?>">
                                        <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                                        <input type="file" onchange="changeImgRepCmt(this,<?= $row_comment['id'] ?>)" id="rep_comment<?= $row_comment['id'] ?>" accept="image/*" hidden/>
                                    </label>
                                    <button class="ep_submit_mess">
                                        <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <?php if ($count_comment_parent > $limit_cmt){ ?>
            <!-- <a onclick="moreCmt(<?=$row['new_id']?>)" data-page=<?=$limit_cmt?>>Xem thêm bình luận</a> -->
        <?php } ?>
    </div>
    </div>
    <div class="gr_album gr_album_detail_list">
        <div class="gr_album_body gr_album_body_image gr_album_body_active">
            <?php  foreach ($file as $key => $value) { ?>
            <div class="gr_album_body_img">
                <a class="gr_album_body_link" href="">
                    <img class="gr_album_body_link_img" src="<?=$value->file?>" alt="Ảnh lỗi">
                </a>
                <?php if ($type_edit == 0){ ?>
                    <img class="edit_album" src="../img/edit_album.svg" alt="Ảnh lỗi">
                    <div class="gr_album_popup">
                        <div class="gr_album_popup_item gral_set_avt">
                            <img src="../img/dat-lam-anh-dai-dien.svg" alt="Ảnh lỗi">
                            Đặt làm ảnh đại diện
                        </div>
                        <div class="gr_album_popup_item gral_set_bgi">
                            <img src="../img/dat-lam-anh-bia.svg" alt="Ảnh lỗi">
                            Đặt làm ảnh bìa
                        </div>
                        <a class="gr_album_popup_item" download href="<?=$value->file?>">
                            <img src="../img/fe_edit.svg" alt="Ảnh lỗi">
                            Tải xuống
                        </a>
                        <div class="gr_album_popup_item" onclick="deleteImageAlbum(this)">
                            <img src="../img/public_del.svg" alt="Ảnh lỗi">
                            Xóa ảnh
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
<?php }else{ ?>
    <div class="gr_introduce_box_header">
        <a class="center_nav_eq0">
            <img class="gr_introduce_box_header_img" src="/img/standards_community_back_black.svg" alt="Ảnh lỗi">
            Ảnh
        </a>
    </div>
    <div class="gr_album">
        <div class="gr_album_title_box">
            <p class="gr_album_title">Ảnh</p>
        </div>
        <div class="gr_album_header">
            <p class="gr_album_header_title gr_album_header_image">Ảnh của bạn</p>
            <p class="gr_album_header_title gr_album_header_album">Album</p>
        </div>
        <div class="gr_album_body gr_album_body_image gr_album_body_active">
        <?php  foreach ($arr_img as $key => $value) { ?>
            <div class="gr_album_body_img">
                <a class="gr_album_body_link" href="<?=url_detail_new_feed($value['new_id'])?>">
                    <img loading="lazy" class="gr_album_body_link_img" src="<?=$value['img']?>" alt="Ảnh lỗi">
                </a>
                <?php if ($type_edit == 0){ ?>
                    <img class="edit_album" src="../img/edit_album.svg" alt="Ảnh lỗi">
                    <div class="gr_album_popup">
                        <div class="gr_album_popup_item gral_set_avt">
                            <img src="../img/dat-lam-anh-dai-dien.svg" alt="Ảnh lỗi">
                            Đặt làm ảnh đại diện
                        </div>
                        <div class="gr_album_popup_item gral_set_bgi">
                            <img src="../img/dat-lam-anh-bia.svg" alt="Ảnh lỗi">
                            Đặt làm ảnh bìa
                        </div>
                        <a class="gr_album_popup_item" download href="<?=$value['img']?>">
                            <img src="../img/fe_edit.svg" alt="Ảnh lỗi">
                            Tải xuống
                        </a>
                        <div class="gr_album_popup_item" onclick="deleteImagePost(<?=$value['new_id']?>)">
                            <img src="../img/public_del.svg" alt="Ảnh lỗi">
                            Xóa ảnh
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div class="gr_album_body gr_album_body_album">
            <?php if ($type_edit == 0){ ?>
            <a class="gr_album_body_img gr_album_add_album" href="/tao-album.html">
                <img class="" src="/img/add_info.svg" alt="Ảnh lỗi">
                Tạo album
            </a>
            <?php } ?>
            <?php $sql = "SELECT * FROM album WHERE user_id = $ep_id";
            $db_album = new db_query($sql);
            while ($row = mysql_fetch_array($db_album->result)) {
                $file = json_decode($row['file']);
                $except = explode(',', $row['except']);
                if ($type_edit == 0 || $row['view_mode'] == 0 || 
                ($is_friend == 1 && ($row['view_mode'] == 2 || 
                    ($row['view_mode'] == 3 && !in_array($my_id, $except)) || 
                    ($row['view_mode'] == 4 && in_array($my_id, $except))
                ))){ ?>
            <div class="gr_album_body_img">
                <a href="/trang-ca-nhan-e<?=$ep_id?>/album-a<?=$row['id']?>" class="gr_album_body_link">
                    <img class="gr_album_body_link_img" src="<?=$file[0]->file?>" alt="Ảnh lỗi">
                </a>
                <a class="gr_album_body_txt_1"><?=$row['album_name']?></a>
                <p class="gr_album_body_txt_2"><?=count($file)?> mục</p>
                <?php if ($type_edit == 0){ ?>
                    <img class="edit_album" src="../img/edit_album.svg" alt="Ảnh lỗi">
                    <div class="gr_album_popup">
                        <a href="/sua-album-<?=$row['id']?>.html" class="gr_album_popup_item">
                            <img src="../img/dat-lam-anh-dai-dien.svg" alt="Ảnh lỗi">
                            Chỉnh sửa album
                        </a>
                        <div class="gr_album_popup_item" onclick="downloadAlbum(<?=$row['id']?>)">
                            <img src="../img/dat-lam-anh-bia.svg" alt="Ảnh lỗi">
                            Tải album xuống
                        </div>
                        <div class="gr_album_popup_item" onclick="deleteAlbum(<?=$row['id']?>)">
                            <img src="../img/public_del.svg" alt="Ảnh lỗi">
                            Xóa album
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
<?php } ?>
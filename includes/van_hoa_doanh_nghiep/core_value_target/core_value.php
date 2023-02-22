<ul class="v_baiviet_ul v_baiviet_ul_core_value">
    <?php
    $db_core_value = new db_query("SELECT * FROM core_value WHERE `delete` = 0 AND id_company = $user_id ORDER BY id DESC");
    $i = 0;
    if (mysql_num_rows($db_core_value->result) == 0) {
        if ($type_create == 1) {
            ?>
            <li class="giatri-muctieu">
                <div class="giatri-muctieu_detail v_giatri-muctieu_detail">
                    <div class="add_core_value v_add_core_value">
                        <img src="../img/add_core_value.svg" alt="Ảnh lỗi">
                        <span class="add_core_value_span">Thêm giá trị cốt lõi</span>
                    </div>
                </div>
            </li>
            <li class="no_post_core_target">Chưa có bài viết</li>
            <?php
        }
    }
    while ($row_core = mysql_fetch_array($db_core_value->result)) {
        ?>
        <li class="giatri-muctieu">
            <div class="giatri-muctieu_detail">
                <?php
                if ($i < 1) {
                    if($type_create == 1){
                        ?>
                        <div class="add_core_value">
                            <img src="../img/add_core_value.svg" alt="Ảnh lỗi">
                            <span class="add_core_value_span">Thêm giá trị cốt lõi</span>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="baiviets-body body-ngu">
                    <div class="body-header">
                        <div class="cont">
                            <p class="v_giatri-muctieu02_p"><?= $row_core['tittle'] ?></p>
                        </div>
                        <div class="img nut-tuychinhgiatri">
                            <img src="../img/bacham.png">
                            <div class="popup-vh-edit">
                                <div class="ul_model">
                                    <?php
                                    if ($type_create == 1) {
                                        ?>
                                        <div class="li_model nut-edit-gtcl" data-id="<?= $row_core['id'] ?>">
                                            <img src="../img/vh_10.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa giá trị cốt lõi </p>
                                        </div>
                                        <?php
                                    }

                                    if ($type_delete == 1) {
                                        ?>
                                        <div class="li_model nut-xoa-gtcl" data-id="<?= $row_core['id'] ?>">
                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                            <p class="p_model">Xóa giá trị cốt lõi</p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="status">
                        <p><?= $row_core['content'] ?></p>
                    </div>
                    <?php
                    if ($row_core['cover_image'] != "") {
                    ?>
                    <div class="anh">
                        <img src="../img/vanhoadoanhnghiep/core_value/<?= $row_core['id_user'] ?>/<?= $row_core['cover_image'] ?>">
                    </div>
                    <?php
                    }
                    ?>
                    <div class="reach">
                        <div class="lc tren">
                            <div class="trai">
                                <img src="../img/like_x.png">
                                <img class="anh-an" src="../img/icon_reach.png">
                                <?
                                $db_like = new db_query("SELECT * FROM `like_core_value` WHERE id_core = " . $row_core['id']);
                                ?>
                                <span id="number_like<?= $row_core['id']; ?>"><?= mysql_num_rows($db_like->result); ?></span>
                            </div>
                            <div class="phai">
                                <?
                                $db_count_comment = new db_query("SELECT * FROM `comment_core_value` WHERE id_core = " . $row_core['id'] . " ORDER BY id DESC");
                                ?>
                                <span><?= mysql_num_rows($db_count_comment->result); ?> Bình luận</span>
                            </div>
                        </div>
                        <div class="lc duoi v_lc">
                            <?php
                            $db_like = new db_query("SELECT * FROM `like_core_value` WHERE id_core = " . $row_core['id'] . " AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
                            if (mysql_num_rows($db_like->result) > 0) {
                                $like_img = "../img/v_like_post.svg";
                                $style_like = "#4C5BD4";
                            } else {
                                $like_img = "../img/like_t.png";
                                $style_like = "#666666";
                            }
                            ?>
                            <div class="trai" onclick="like_core(<?= $row_core['id']; ?>);">
                                <img id="like_core<?= $row_core['id']; ?>" src="<?= $like_img; ?>">
                                <span id="text_like_core<?= $row_core['id']; ?>" class="<?= $style_like; ?>">Thích</span>
                            </div>
                            <?php
                            if($row_core['comment'] == 0){
                                ?>
                                <div class="phai" onclick="focus_comment_core(<?= $row_core['id'] ?>,this)">
                                    <img src="../img/icon_cmt.png">
                                    <span>Bình luận</span>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="phai">
                                    Chức năng bình luận đã tắt
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="baiviets-footer">
                    <?php
                    if($row_core['comment'] == 0){
                        ?>
                        <div class="tren">
                            <div class="img avt">
                                <img class="v_avatar_user1" src="<?= $_SESSION['login']['logo'] ?>">
                            </div>
                            <form class="cont v_comment_active" data-type="0" id="form_comment<?= $row_core['id'] ?>" data-new_id="<?= $row_core['id'] ?>" onsubmit="return comment_core(this);">
                                <input type="text" class="v_write_comment" autocomplete="off" id="comment<?= $row_core['id'] ?>" name="" placeholder="Viết bình luận...">
                                <span class="see_icon" id="see_icon<?= $row_core['id'] ?>"></span>
                                <label for="baiviet_taianh<?= $row_core['id'] ?>" class="see_icon1" id="see_icon1<?= $row_core['id'] ?>">
                                </label>
                                <input type="file" onchange="changeImg(this,<?= $row_core['id'] ?>)" class="taianh" accept="image/*" id="baiviet_taianh<?= $row_core['id'] ?>" style="display: none;" />
                                <input type="hidden" value="<?= $row_core['id'] ?>" class="v_id_core_value" hidden readonly>
                                <button class="nut_gui_comment" id="nut_gui_comment<?= $row_core['id'] ?>"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                            </form>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="duoi">
                        <div class="xemthem" id="xemthem<?= $row_core['id'] ?>">
                            <?php
                            $i = 0;
                            $db_comment = new db_query("SELECT * FROM `comment_core_value` WHERE id_core = " . $row_core['id'] . " AND id_parent = 0 ORDER BY id DESC");
                            while ($row_comment = mysql_fetch_array($db_comment->result)) {
                                $avt_image = '';
                                $name_author = '';
                                if ($row_comment['user_type'] == 1) {
                                    if($arr_com->com_logo == ""){
                                        $avt_image =  '../img/logo_com.png';
                                    }else{
                                        $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                                    }
                                    $name_author =  $arr_com->com_name;
                                } else {
                                    foreach ($arr_ep as $value_ep) {
                                        if ($row_comment['id_user'] == $value_ep->ep_id) {
                                            if($value_ep->ep_image == ""){
                                                $avt_image = '../img/avatar_default.png';
                                            }else{
                                                $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $value_ep->ep_image;
                                            }
                                            $name_author = $value_ep->ep_name;
                                            break;
                                        }
                                    }
                                }
                                ?>
                                <div class="xembinhluan hide_comment<?= $row_core['id'] ?>">
                                    <div class="avt avt-cmt"> <img src="<?= $avt_image ?>"> </div>
                                    <div class="binhluan">
                                        <div class="container">
                                            <div class="header-cmt">
                                                <div class="name-cmt">
                                                    <p><?= $name_author ?></p>
                                                </div>
                                                <div class="edit-cmt" onclick="option_cmt(this);">
                                                    <img src="../img/bacham.png">
                                                    <div class="popup-chinhsua-cmt">
                                                        <div class="ul_model">
                                                            <?php
                                                            if ($type_create == 1) {
                                                                ?>
                                                                <div class="li_model" data-id="<?= $row_comment['id'] ?>" onclick="update_comment(<?= $row_comment['id'] ?>,<?= $row_core['id'] ?>,0)">
                                                                    <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                                    <p class="p_model">Chỉnh sửa bình luận </p>
                                                                </div>
                                                                <?php
                                                            }else if($row_comment['id_user'] == $_SESSION['login']['id']){
                                                                ?>
                                                                <div class="li_model" data-id="<?= $row_comment['id'] ?>" onclick="update_comment(<?= $row_comment['id'] ?>,<?= $row_core['id'] ?>,0)">
                                                                    <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                                    <p class="p_model">Chỉnh sửa bình luận </p>
                                                                </div>
                                                                <?php
                                                            }

                                                            if ($type_delete == 1) {
                                                                ?>
                                                                <div data-id="<?= $row_comment['id'] ?>" onclick="del_comment_core(this,0)" class="li_model nut-xoa-baiviet">
                                                                    <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                                    <p class="p_model">Xóa bình luận</p>
                                                                </div>
                                                                <?php
                                                            }else if ($row_comment['id_user'] == $_SESSION['login']['id']) {
                                                                ?>
                                                                <div data-id="<?= $row_comment['id'] ?>" onclick="del_comment_core(this,0)" class="li_model nut-xoa-baiviet">
                                                                    <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                                    <p class="p_model">Xóa bình luận</p>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="body-cmt">
                                                <div class="cmt" tabindex="-1" id="text_comment<?= $row_comment['id'] ?>" data-value="<?= $row_comment['content'] ?>">
                                                    <p>
                                                        <?= $row_comment['content'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?
                                        if ($row_comment['image'] != '') {
                                            ?>
                                            <div class="image_comment" id="image_comment<?= $row_comment['id'] ?>">
                                                <img src="<?= $row_comment['image'] ?>" id="img_cmt<?= $row_comment['id'] ?>" alt="image comment">
                                            </div>
                                            <?
                                        }
                                        ?>
                                        <div class="reach-cmt" id="react_cmt<?= $row_comment['id'] ?>">
                                            <?php
                                            $db_check_like = new db_query("SELECT * FROM like_comment_core WHERE id_comment = " . $row_comment['id']);

                                            $dem = 0;
                                            while ($row_like_comment = mysql_fetch_array($db_check_like->result)) {
                                                if ($row_like_comment['id_comment'] == $row_comment['id'] && $row_like_comment['id_user'] == $_SESSION['login']['id'] && $row_like_comment['user_type'] == $_SESSION['login']['user_type']) {
                                                    $dem++;
                                                }
                                            }
                                            if ($dem > 0) {
                                                $style_like2 = "v_like_post3";
                                            } else {
                                                $style_like2 = "";
                                            }
                                            ?>
                                            <p class="v_like_post2 <?= $style_like2 ?>" onclick="like_comment_core(this)" data-id="<?= $row_comment['id'] ?>">Thích</p>
                                            <p class="trl-binhluan" onclick="focus_comment_core(<?= $row_comment['id'] ?>,this);">Trả lời</p>
                                            <p id="time<?= $row_comment['id'] ?>"><?php
                                            echo time_elapsed_string($row_comment['created_at']);
                                        ?></p>
                                        <?
                                        if (mysql_num_rows($db_check_like->result) > 0) {
                                            ?>
                                            <img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment<?= $row_comment['id'] ?>">
                                            <p class="num_like_comment num_like_comment<?= $row_comment['id'] ?>"><?= mysql_num_rows($db_check_like->result) ?></p>
                                            <?
                                        }
                                        ?>
                                    </div>
                                    <div class="cmt-binhluan">
                                        <div id="cmt-binhluan<?= $row_comment['id'] ?>" class="cmt-binhluan">
                                            <?
                                            $db_rep_comment = new db_query("SELECT * FROM comment_core_value WHERE id_parent = " . $row_comment['id']);
                                            ?>
                                        </div>
                                        <?
                                        if (mysql_num_rows($db_rep_comment->result) > 0) {
                                            ?>
                                            <div class="view_cmt_rep" id="view_cmt_rep<?= $row_comment['id'] ?>" data-cmt_id="<?= $row_comment['id'] ?>" onclick="show_rep_comment(this);">Hiển thị bình luận</div>
                                            <div class="hide_cmt_rep" id="hide_cmt_rep<?= $row_comment['id'] ?>" onclick="htde_rep_comment(<?= $row_comment['id'] ?>);">Ẩn bớt bình luận</div>
                                            <?
                                        }
                                        ?>
                                        <form class="container-cmt" id="form_comment<?= $row_comment['id'] ?>" data-type="0" data-cmt_id="<?= $row_comment['id'] ?>" data-new_id="<?= $row_comment['id_core'] ?>" onsubmit="return rep_comment_core(this);">
                                            <div class="img avt"> <img src="<?= $_SESSION['login']['logo'] ?>" class="v_avt_reply_comment">
                                            </div>
                                            <div class="cont"> <input type="text" class="rep_cmt" onkeyup="keyup_rep_cmt(this)" id="comment<?= $row_comment['id'] ?>" name="" placeholder="Viết bình luận...">
                                                <span class="see_icon"></span>
                                                <label class="see_icon1">
                                                    <input type="file" onchange="show_img_rep_comment(this,<?= $row_comment['id'] ?>)" id="rep_comment<?= $row_comment['id'] ?>" accept="image/*" style="display: none;" />
                                                </label>
                                                <input type="hidden" value="<?= $row_comment['id'] ?>" class="v_id_rep_cmt_core_value" hidden readonly>
                                                <button class="nut_gui_comment rep_comment" id="rep_comment<?= $row_comment['id'] ?>">
                                                    <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                                                </button>
                                            </div>
                                        </form>
                                        <div class="view_rep_cmt" id="view_rep_cmt<?= $row_comment['id'] ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($i == 2) {
                                break;
                            }
                            $i++;
                        }
                        ?>
                    </div>
                    <?php
                    if (mysql_num_rows($db_comment->result) == 0) {
                        ?>
                        <p class="v_no_comment">Hiện chưa có bình luận</p>
                        <?php
                    } else {
                        ?>
                        <p class="an-hien-binhluan thugon-binhluan" id="thugon-binhluan<?= $row_core['id'] ?>" onclick="hide_comment(this);">Thu gọn bình luận</p>
                        <p class="an-hien-binhluan xem-binhluan" id="xem-binhluan<?= $row_core['id'] ?>" onclick="show_comment(this);" data-id="<?=$row_core['id']?>" style="display: inline-block;">Xem thêm bình luận</p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="content-phu v_giatri-muctieu02 v_giatri-muctieu03">
            <div class="header header-ngu">
                <div class="title">
                    <p><?= $row_core['tittle'] ?></p>
                </div>
            </div>
            <div class="body v_giatri-muctieu_body">
                <?php
                $avt_image = '';
                $name_author = '';
                if ($row_core['user_type'] == 1) {
                    $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                    $name_author =  $arr_com->com_name;
                } else {
                    $name_author = $arr_ep[$row_core['id_user']]['ep_name'];
                    $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_core['id_user']]['ep_image'];
                }
                ?>
                <div class="content-body">
                    <p>Người tạo: <span><?= $name_author ?></span></p>
                    <p>Thời gian tạo: <?= date("H:i d/m/Y", $row_core['created_at']) ?></p>
                    <p>Cập nhật mới nhất: <?= date("H:i d/m/Y", $row_core['updated_at']) ?></p>
                </div>
            </div>
        </div>
    </li>
    <?
    $i++;
}
?>
</ul>
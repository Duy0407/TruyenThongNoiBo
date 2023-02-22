<?php
$db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $row_newfeed['new_id']);
?>
<li class="bv-binhchon">
    <div class="baiviets-header">
        <div class="imgtrai avt"><img class="v_avatar_user1" src="<?= $avt_image ?>" alt="Ảnh lỗi"></div>
        <div class="cont cont_baiviet_tt_sdn">
            <p>
                <span class="name-st"><?= $newfeed_name ?></span>
                <span class="thuong"> đã tạo bình chọn</span>
                <span class="address-st"><?= $row_newfeed['new_title'] ?></span>
            </p>
            <span class="time-st"><?= date("H:i d/m/Y", $row_newfeed['created_at']) ?></span>
            <span class="thuong">. <?php
                                    if ($row_newfeed['position'] == 0) {
                                        if ($_SESSION['login']['user_type'] == 1) {
                                            echo $_SESSION['login']['name'];
                                        }
                                    } else {
                                        for ($i = 0; $i < count($list_department); $i++) {
                                            if ($row_newfeed['position'] == $list_department[$i]->dep_id) {
                                                echo $list_department[$i]->dep_name;
                                                break;
                                            }
                                        }
                                    }
                                    ?></span>
        </div>
        <div class="imgphai nut-chinhsua">
            <img src="../img/bacham.png">
            <div class="popup-chinhsua">
                <div class="ul_model">
                    <?php
                    if ($type_create == 1) {
                    ?>
                        <div class="li_model v_li_edit_post" data-popup="model_sua_alert" data-new_id="<?= $row_newfeed['new_id'] ?>" data-new_type="<?= $row_newfeed['new_type'] ?>">
                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                            <p class="p_model">Chỉnh sửa bài viết</p>
                        </div>
                        <div class="li_model nut-bat-baiviet">
                            <img src="../img/icon_edit.png" alt="Ảnh lỗi">
                            <p class="p_model">Bật thông báo</p>
                        </div>
                    <?php
                    }

                    if ($type_delete == 1) {
                    ?>
                        <div class="li_model nut-xoa-baiviet">
                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                            <p class="p_model" data-new_id="<?= $row_newfeed['new_id'] ?>">Xóa bài viết</p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="baiviets-body">
        <div class="status">
            <p><?= $row_newfeed['content'] ?></p>
        </div>
        <div class="container-binhchon">
            <?php
            $db_vote2 = new db_query("SELECT * FROM user_vote WHERE id_new = " . $row_newfeed['new_id']);
            $count_vote2 = mysql_num_rows($db_vote2->result);
            while ($row_vote = mysql_fetch_array($db_vote->result)) {
                $db_user_vote = new db_query("SELECT * FROM user_vote WHERE id_vote = " . $row_vote['id']);
                $db_user_vote_detail = new db_query("SELECT * FROM user_vote WHERE id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type'] . " AND id_vote = " . $row_vote['id']);
                if (mysql_num_rows($db_user_vote_detail->result) > 0) {
                    $checked = "checked";
                } else {
                    $checked = "";
                }

                if ($count_vote2 == 0) {
                    $width = 0;
                } else {
                    $width = mysql_num_rows($db_user_vote->result) / $count_vote2 * 100;
                }
            ?>
                <div class="binhchon v_binhchon_vote" data-id_vote="<?= $row_vote['id'] ?>" data-id_new="<?= $row_newfeed['new_id'] ?>">
                    <div class="phuongan">
                        <div class="container-phuongan" style="width: <?= $width ?>%">
                        </div>
                        <div class="container_div_chon_pa">
                            <input type="checkbox" class="vote_pa" <?= $checked ?>>
                            <span><?= $row_vote['answer'] ?></span>
                        </div>
                    </div>
                    <div class="nguoi-bc">
                        <?php
                        if (mysql_num_rows($db_user_vote->result) > 0) {
                            while ($row_user = mysql_fetch_array($db_user_vote->result)) {
                                if ($row_user['user_type'] != 1) {
                                    if ($data_ep[$row_user['id_user']]->ep_image) {
                                        $img_avt = '../img/avatar_default.png';
                                    } else {
                                        $img_avt = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$row_user['id_user']]->ep_image;
                                    }
                                } else {
                                    $img_avt = 'https://chamcong.24hpay.vn/upload/company/logo/' . array_values($data_ep)[0]->com_logo;
                                }
                        ?>
                                <div class="img">
                                    <img src="<?= $img_avt ?>">
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- <div class="img-them">
                                                                    <span>+</span>
                                                                    <span>1</span>
                                                                </div> -->
                    </div>
                    <div class="anh v_anh_vote">
                        <?php
                        $val = checkImages($row_vote['file']);
                        if ($val == 0) {
                            if ($row_vote['file'] != "") {
                        ?>
                                <a download class="v_file_alert02" href="../img/new_feed/alert/<?= $row_newfeed['author'] ?>/<?= $row_vote['file'] ?>">
                                    <div class="v_file_alert02_name"><?= $row_vote['file'] ?></div>
                                    <div class="v_file_alert02_time_size">
                                        <?= date("H:i d/m/Y", $row_newfeed['created_at']) ?>
                                    </div>
                                    <img class="v_file_alert02_icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                                </a>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="anh1"> <img src="../img/new_feed/vote/<?= $row_newfeed['author'] ?>/<?= $row_vote['file'] ?>"> </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <?php
        include '../includes/in_like_cmt.php';
        ?>
    </div>
    <?php
    include '../includes/in_comment.php';
    ?>
</li>
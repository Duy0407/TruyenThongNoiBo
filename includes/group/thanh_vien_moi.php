
                                        <li class="v_newfeed_li">
                                            <div class="baiviets-header">
                                                <div class="imgtrai avt">
                                                    <img class="v_avatar_user1" src="<?= $avt_image ?>">
                                                </div>
                                                <div class="cont cont_baiviet_tt_sdn">
                                                    <p>

                                                        <span class="name-st"><?= $newfeed_name ?> </span>

                                                        <span class="thuong"> đã thêm thành viên mới: </span>
                                                        <span class="address-st"><?php echo $name_employee . $id_user_hide ?></span>
                                                    </p>
                                                    <span class="time-st"><?= date("H:i d/m/Y", $row_newfeed['created_at']) ?></span>
                                                    <span class="thuong">.
                                                        <?php
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
                                                        ?>
                                                    </span>
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
                                                    <p>
                                                        <?= $row_newfeed['content'] ?>
                                                    </p>
                                                </div>
                                                <?php
                                                    include '../includes/in_like_cmt.php';
                                                ?>
                                            </div>
                                            <?php
                                                include '../includes/in_comment.php';
                                            ?>
                                        </li>
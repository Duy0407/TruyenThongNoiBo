<li class="bv-taosukien v_newfeed_li">
    <div class="baiviets-header">
        <div class="imgtrai avt"><img class="v_avatar_user1" src="<?= $avt_image ?>"></div>
        <div class="cont cont_baiviet_tt_sdn">
            <p> <span class="name-st"><?= $newfeed_name ?></span> <span class="thuong"> đã tạo sự kiện đối ngoại: </span> <span class="address-st"><?= $row_newfeed['new_title'] ?></span> </p> <span class="time-st"><?= date("H:i d/m/Y", $row_newfeed['created_at']) ?></span> <span class="thuong">.
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
        <div class="imgphai nut-chinhsua"> <img src="../img/bacham.png">
            <div class="popup-chinhsua">
                <div class="ul_model">
                    <?php
                    if ($type_create == 1) {
                    ?>
                        <div class="li_model v_li_edit_post" data-new_id="<?= $row_newfeed['new_id'] ?>" data-new_type="<?= $row_newfeed['new_type'] ?>"> <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                            <p class="p_model">Chỉnh sửa bài viết</p>
                        </div>
                        <div class="li_model nut-bat-baiviet"> <img src="../img/icon_edit.png" alt="">
                            <p class="p_model">Bật thông báo</p>
                        </div>
                    <?php
                    }

                    if ($type_delete == 1) {
                    ?>
                        <div class="li_model nut-xoa-baiviet"> <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
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
            <div class="event_file">
                <?php
                if ($row_newfeed['file'] != "") {
                    $event_file = explode("||", $row_newfeed['file']);
                    $name_event_file = explode("||", $row_newfeed['name_file']);
                    for ($i = 0; $i < count($event_file); $i++) {
                ?>
                <a class="event_file_download" download href="<?=$event_file[$i]?>"><?=$name_event_file[$i]?></a>
                <?php
                    }
                }
                ?>
            </div>
            <u class="v_event_more1 view_detail_event" data-type="<?= $row_newfeed['new_type'] ?>" data-id="<?= $row_newfeed['new_id'] ?>">Xem chi tiết</u>
        </div>
        <div class="anh">
            <div class="img event_avatar"> <img src="../img/new_feed/event/event_doi_ngoai/avatar/<?php echo $row_newfeed['author'] . '/' . $row_event['avatar'] ?>">
                <div class="sk-time">
                    <div class="sk-gio">
                        <p><?= date("H:i", $row_event['time']) ?></p>
                    </div>
                    <div class="sk-ngay">
                        <p><?= date("d/m", $row_event['time']) ?></p>
                    </div>
                </div>
                <?php
                $db_event_join = new db_query("SELECT id FROM event_join WHERE id_employee = " . $_SESSION['login']['id'] . " AND id_event = " . $row_event['id']);
                if (mysql_num_rows($db_event_join->result) == 0) {
                    $active = "Tham gia";
                } else {
                    $active = "Hủy tham gia";
                }
                ?>
                <div class="sk-dk"> <button class="btn_event_join" data-event_id="<?= $row_event['id'] ?>"><?= $active ?></button> </div>
            </div>

        </div>
        <?php
        include '../includes/in_like_cmt.php';
        ?>
    </div>
    <?php
    include '../includes/in_comment.php';
    ?>
</li>
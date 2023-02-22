<li class="bv-khenthuong v_newfeed_li">
    <div class="baiviets-header">
        <div class="imgtrai avt"><img class="v_avatar_user1" src="<?= $avt_image ?>"></div>
        <div class="cont cont_baiviet_tt_sdn">
            <p>
                <span class="name-st"><?= $newfeed_name ?></span>
                <span class="thuong"> Đã tạo khen thưởng </span>
                <span class="address-st span_img">
                    <span>
                        <?php
                        if ($row_bonus['id_option'] == 2) {
                            echo "Nhân viên xuất sắc nhất tháng";
                            $img = '../img/loai_2.png';
                            $style = "top: 5px";
                        } else if ($row_bonus['id_option'] == 3) {
                            echo "Nhân viên xuất sắc nhất quý";
                            $img = '../img/loai_3.png';
                            $style = "top: 5px";
                        } else if ($row_bonus['id_option'] == 4) {
                            echo "Nhân viên xuất sắc nhất năm";
                            $img = '../img/loai_4.png';
                            $style = "top: 2px";
                        } else if ($row_bonus['id_option'] == 1) {
                            echo "";
                            $img = '../img/loai_1.png';
                            $style = "top: 2px";
                        }
                        ?>
                    </span>
                    <img class="v_huychuong" src="<?= $img ?>" style="<?= $style ?>" />
                </span>
                <span class="thuong"> cùng với: </span>
                <span class="name-st">
                    <?php
                    echo $name_employee . $id_user_hide;
                    ?>
                </span>
            </p>
            <span class="time-st"><?= date("H:i d/m/Y", $row_newfeed['updated_at']); ?></span>
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
                        <div class="li_model v_li_edit_post" data-new_id="<?= $row_newfeed['new_id'] ?>" data-new_type="<?= $row_newfeed['new_type'] ?>">
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
        <div class="anh">
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

            for ($i=0; $i < count($arr_file); $i++) { 
            ?> 
                <a download class="v_file_alert02" href="<?=$arr_file[$i]?>">
                    <div class="v_file_alert02_name"><?=$arr_name_file[$i]?></div>
                    <div class="v_file_alert02_time_size">
                        <?= date("H:i d/m/Y", $row_newfeed['created_at']) ?>
                    </div>
                    <img class="v_file_alert02_icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                </a>
            <?php
            }

            for ($i=0; $i < count($arr_image); $i++) {
                if ($i == 4) {
            ?>
                <a class="v_newfeed_more" href="chi-tiet-tin-dang.html?new_id=<?= $row_newfeed['new_id'] ?>">
                    <span class="v_newfeed_more_span">+<?=count($arr_image) - 4?></span>
                </a>
            <?php
                break;
                }else if (preg_match('/image/', $arr_image[$i])) {
            ?>
                <a href="<?=url_detail_new_feed($row_newfeed['new_id'])?>" class="anh1"> 
                    <img class="v_newfeed_file_img" src="<?=$arr_image[$i]?>" alt="Ảnh lỗi"> 
                </a>
            <?php
                }else{
                    $duoi = explode(".", $arr_image[$i]);
                    $duoi = $duoi[count($duoi) - 1];
            ?>
                <div class="anh1">
                    <video class="video_nf" controls="">
                        <source src="<?=$arr_image[$i]?>" type="video/<?=$duoi?>" class="img_nf">
                    </video>
                </div>
            <?php
                }
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
<li class="v_newfeed_file">
    <div class="v_newfeed_file_div1">
        <?php
        $file = explode('||', $row_newfeed['file']);
        for ($i=0; $i < count($file); $i++) { 
            if(checkImages($file[$i]) == 1){
        ?>
                <div class="v_newfeed_file_div2"><img class="v_new_feed_image" src="../img/new_feed/bonus/<?=$row_newfeed['author']?>/<?=$file[$i]?>" alt="Ảnh lỗi"></div>
        <?php
            }else if(checkVideo($file[$i]) == 1){
        ?>  
                <div class="v_newfeed_file_div2">
                    <video class="v_new_feed_image" controls>
                        <source src="<?=$file[$i]?>" type="video/mp4">
                    </video>
                </div>
        <?php
            }
        }
        ?>
    </div>
</li>
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
                                                                    $style = "top: 5px";
                                                                    $img = '../img/loai_2.png';
                                                                } else if ($row_bonus['id_option'] == 3) {
                                                                    echo "Nhân viên xuất sắc nhất quý";
                                                                    $style = "top: 5px";
                                                                    $img = '../img/loai_3.png';
                                                                } else if ($row_bonus['id_option'] == 4) {
                                                                    echo "Nhân viên xuất sắc nhất năm";
                                                                    $style = "top: 2px";
                                                                    $img = '../img/loai_4.png';
                                                                } else if ($row_bonus['id_option'] == 1) {
                                                                    echo "";
                                                                    $img = '../img/loai_1.png';
                                                                    $style = "top: 0";
                                                                }
                                                                ?>
                                                            </span>
                                                            <img class="v_huychuong" style="<?=$style?>" src="<?=$img?>" />
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
                                                            <div class="li_model v_li_edit_post" data-new_id="<?= $row_newfeed['new_id'] ?>" data-new_type="<?= $row_newfeed['new_type'] ?>">
                                                                <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                                <p class="p_model">Chỉnh sửa bài viết</p>
                                                            </div>
                                                            <div class="li_model nut-bat-baiviet">
                                                                <img src="../img/icon_edit.png" alt="Ảnh lỗi">
                                                                <p class="p_model">Bật thông báo</p>
                                                            </div>
                                                            <div class="li_model nut-xoa-baiviet">
                                                                <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                                <p class="p_model" data-new_id="<?= $row_newfeed['new_id'] ?>">Xóa bài viết</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="baiviets-body">
                                                <div class="status">
                                                    <p><?= $row_newfeed['content'] ?></p>
                                                </div>
                                                <?php include '../includes/in_like_cmt.php'; ?>
                                            </div>
                                            <?php include '../includes/in_comment.php'; ?>
                                        </li>
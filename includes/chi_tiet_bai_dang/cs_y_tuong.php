<li class="v_newfeed_file">
    <div class="v_newfeed_file_div1">
        <?php
        $file = explode('||', $row_newfeed['file']);
        for ($i=0; $i < count($file); $i++) { 
            if(checkImages($file[$i]) == 1){
                ?>
                <div class="v_newfeed_file_div2"><img class="v_new_feed_image" src="../img/new_feed/idea/<?=$row_newfeed['author']?>/<?=$file[$i]?>" alt="Ảnh lỗi"></div>
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
    <li class="v_newfeed_li">
        <div class="baiviets-header">
            <div class="imgtrai avt">
                <img class="v_avatar_user1" src="<?= $avt_image ?>">
            </div>
            <div class="cont cont_baiviet_tt_sdn">
                <p>

                    <span class="name-st"><?= $newfeed_name ?></span>

                    <span class="thuong"> đã chia sẻ ý tưởng mới: </span>
                    <span class="address-st"><?= $row_newfeed['new_title'] ?></span>
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
                        <div class="li_model v_li_edit_post" data-popup="model_sua_alert" data-new_id="<?= $row_newfeed['new_id'] ?>" data-new_type="<?= $row_newfeed['new_type'] ?>">
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
                <p>
                    <?= $row_newfeed['content'] ?>
                </p>
            </div>
            <?php include '../includes/in_like_cmt.php'; ?>
        </div>
        <?php include '../includes/in_comment.php'; ?>
    </li>
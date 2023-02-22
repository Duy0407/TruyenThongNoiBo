
<div class="ep_post_detail" data="<?= $row_newfeed['new_id']?>" data1="<?= $row_newfeed['author']?>">
    <div class="ep_post_detail_item">
        <img class="ep_post_avt"
            src="<?= $avt_image ?>"
            alt="Ảnh lỗi">
        <div class="ep_post_detail_item_txt"> 
            <div class="df_dif_flex">
                <p class="ep_post_author_name"><?= $newfeed_name;?></p>
                <?if($row_newfeed['new_type'] == 3){?>
                    <span class="sk_fz13">đã tạo sự kiện nội bộ: </span>
                    <p class="sk_fz16"><?=$row_newfeed['new_title']?></p>
                <?}?>
            </div>
            <p class="ep_post_time">

                <?= date("H:i d/m/Y", $row_newfeed['created_at']) ?>. 

                <span>
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

        <?if($row_newfeed['new_type'] == 3){?>
            <div class="img_sukien_congty">
                <img src="../img/new_feed/event/event_noi_bo/avatar/<?php echo $row_newfeed['author'] . '/' . $row_event['avatar'] ?>" alt="">

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
        <?}?>
    </div>
    <?php include '../includes/in_like_cmt.php';?>
    <?php include '../includes/in_comment.php'; ?>
</div>


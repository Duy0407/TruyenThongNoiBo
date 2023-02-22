<div class="share_up_group">
    <div class="share_up_group_detail">
        <div class="share_up_group_header">
            Chia sẻ lên nhóm
            <img class="turnoff_share_up_group" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="share_up_group_body">
            <div class="share_up_group_body_detail">
                <div class="share_up_group_search">
                    <input type="text" class="share_up_group_input" placeholder="Tìm kiếm">
                    <img class="share_up_group_icon" src="../img/tim-kiem.svg" alt="Ảnh lỗi">
                </div>
                <p class="send_with_chat_item_title">Gần đây</p>
                <div class="friend_recently">
                    <div class="friend_recently_item share_up_group_avt" data-group_id="<?=$_SESSION['login']['dep_id']?>" data-group_type="0">
                        <img class="friend_recently_item_avt" src="/img/nv_default_bgi.svg" alt="Ảnh lỗi">
                        <div class="share_up_group_info">
                            <p class="friend_recently_item_name"><?=$my_dep_name?></p>
                            <p class="share_up_group_regime">Nhóm riêng tư</p>
                        </div>
                        <button class="share_up_group_btn"><img src="../img/drop_right.svg" alt="Ảnh lỗi"></button>
                    </div>
                    <?php foreach ($arr_my_group as $key => $row) { ?>
                        <div class="friend_recently_item share_up_group_avt" data-group_id="<?=$row['id']?>" data-group_type="1" data-group-status_post="<?=$row['Pheduyet_post_member']?>">
                            <img class="friend_recently_item_avt" src="<?=$my_group['group_image']?>" alt="Ảnh lỗi" onerror="this.src=`/img/nv_default_bgi.svg`;">
                            <div class="share_up_group_info">
                                <p class="friend_recently_item_name"><?=$row['group_name']?></p>
                                <p class="share_up_group_regime"><?=($row['group_mode']==0)?"Nhóm công khai":"Nhóm riêng tư"?></p>
                            </div>
                            <button class="share_up_group_btn"><img src="../img/drop_right.svg" alt="Ảnh lỗi"></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
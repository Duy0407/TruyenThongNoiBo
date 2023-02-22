<div id="sidebar_main">
    <div class="sidebar_main_padding">
        <div class="sibar_my_conten_text">
            <div class="sibar_my_conten">
                <a href="/<?=replaceTitle($db_group_assoc['group_name']);?>-<?=$db_group_assoc['id']?>.html" class="sibar_my_conten_text1"><?=$db_group_assoc['group_name'];?></a>
                <h1 class="sibar_my_conten_text2">Nội dung của bạn</h1>
                <p class="sibar_my_conten_text3">Quản lý và xem bài viết của bạn trong nhóm này. Quản trị viên và người kiểm duyệt có thể đóng góp ý kiến</p>
            </div>
        </div>

        <div class="sidebar_main_block2">
            <div class="sidebar_main_block2_pd">
                <?php if(!$is_admin){ ?>
                    <a href="/groups-my_pending_content-<?=$id_group?>" class="sidebar_main_block2_box1" id="bg_dangcho">
                        <div class="sidebar_main_block2_box1_ic" id="ic_dangcho"><?=$sb_ic_5?></div>
                        <div class="sidebar_main_block2_box1_text" id="text_dangcho">Đang chờ</div>
                    </a>
                <? } ?>
                <a href="/groups-my_posted_content-<?=$id_group?>" class="sidebar_main_block2_box1" id="bg_dangdang">
                    <div class="sidebar_main_block2_box1_ic" id="ic_dangdang"><?=$sb_ic_dang_dang?></div>
                    <div class="sidebar_main_block2_box1_text" id="text_dangdang">Đã đăng</div>
                </a>
                <?php if(!$is_admin){ ?>
                    <a href="/groups-my_declined_content-<?=$id_group?>" class="sidebar_main_block2_box1" id="bg_datuchoi">
                        <div class="sidebar_main_block2_box1_ic" id="ic_datuchoi"><?=$sb_ic_tuchoi_yk?></div>
                        <div class="sidebar_main_block2_box1_text" id="text_datuchoi">Đã từ chối kèm theo ý kiến</div>
                    </a>
                <? } ?>
                <a href="/groups-my_removed_content-<?=$id_group?>" class="sidebar_main_block2_box1" id="bg_dago">
                    <div class="sidebar_main_block2_box1_ic" id="ic_dago"><?=$sb_ic_g_yk?></div>
                    <div class="sidebar_main_block2_box1_text" id="text_dago">Đã gỡ kèm theo ý kiến</div>
                </a>
                <?php if($is_admin){ ?>
                    <a href="/groups-my_scheduled_content-<?=$id_group?>" class="sidebar_main_block2_box1" id="bg_dalenlich">
                        <div class="sidebar_main_block2_box1_ic" id="ic_dalenlich"><?=$sb_ic_6?></div>
                        <div class="sidebar_main_block2_box1_text" id="text_dalenlich">Đã lên lịch</div>
                    </a>
                <? } ?>
            </div>
        </div>
    </div>
</div>
<div class="sidebar_1200">
    <div class="sidebar_1200_sub">
        <?php if(!$is_admin){ ?>
            <a href="/groups-my_pending_content-<?=$id_group?>" id="bg_dangcho_mb">
                <div class="sidebar_1200_sub_a">Đang chờ</div>
            </a>
        <? } ?>
        <a href="/groups-my_posted_content-<?=$id_group?>" id="bg_dangdang_mb"> 
            <div class="sidebar_1200_sub_a">Đã đăng</div>
        </a>
        <?php if(!$is_admin){ ?>
            <a href="/groups-my_declined_content-<?=$id_group?>" id="bg_datuchoi_mb">
                <div class="sidebar_1200_sub_a">Đã từ chối kèm theo ý kiến</div>
            </a>
        <? } ?>
        <a href="/groups-my_removed_content-<?=$id_group?>" id="bg_dago_mb">
            <div class="sidebar_1200_sub_a">Đã gỡ kèm theo ý kiến</div>
        </a>
        <?php if($is_admin){ ?>
            <a href="/groups-my_scheduled_content-<?=$id_group?>" id="bg_dalenlich_mb">
                <div class="sidebar_1200_sub_a">Đã lên lịch</div>
            </a>
        <? } ?> 
    </div>
</div>
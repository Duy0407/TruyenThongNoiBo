<div class="gr_introduce_box_header">
    <a class="center_nav_eq0">
        <img class="gr_introduce_box_header_img" src="/img/standards_community_back_black.svg" alt="Ảnh lỗi">
        Ảnh
    </a>
</div>
<div class="gr_album">
    <div class="gr_album_title_box">
        <p class="gr_album_title">Video</p>
    </div>
    <div class="gr_video_header">
        <p class="gr_album_header_title gr_album_header_video">Video</p>
    </div>
    <div class="gr_album_body_video">
        <?php foreach ($arr_video as $key => $value) { ?>
        <div class="gr_album_body_img">
            <a class="gr_album_body_link" href="/chi-tiet-bai-viet.html">
                <video class="gr_album_body_link_img" controls="">
                    <source src="<?=$value['video']?>">
                </video>
            </a>
            <img class="edit_album" src="../img/edit_album.svg" alt="Ảnh lỗi">
            <div class="gr_album_popup">
                <a class="gr_album_popup_item" download href="<?=$value['video']?>">
                    <img src="../img/fe_edit.svg" alt="Ảnh lỗi">
                    Tải xuống
                </a>
                <div class="gr_album_popup_item" onclick="deleteImagePost(<?=$value['new_id']?>)">
                    <img src="../img/public_del.svg" alt="Ảnh lỗi">
                    Xóa video
                </div>
            </div>
            <!-- <div class="gr_album_body_time">1:12:30</div> -->
        </div>
        <?php } ?>
    </div>
</div>
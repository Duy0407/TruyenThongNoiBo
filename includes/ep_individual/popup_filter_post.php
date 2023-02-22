<div class="modal popup_manager_post" id="popup_manager_post">
    <div class="modal_content">
        <div class="modal_header">
            Quản lý bài viết
            <img class="" src="/img/turnoff_popup.svg" alt="Ảnh lỗi" data-dimiss="modal">
        </div>
        <div class="modal_body">
            <div class="manager_post_content_1">
                <p class="filter_post_txt_1">Chọn bài viết bạn muốn quản lý</p>
                <button class="filter_post_btn btn_filter_post">
                    <img src="/img/nv_setting-4.svg" alt="Ảnh lỗi">
                    Bộ lọc
                </button>
            </div>
            <div class="manager_post_content_2">
                <div class="manager_post_content_2_1">
                    <p class="">Tháng 8 năm 2022</p>
                    <input type="checkbox" name="" id="manager_post_checkall" hidden>
                    <label class="manager_post_checkall" for="manager_post_checkall">
                        <div class="check_circle"></div>
                        Chọn tất cả
                    </label>
                </div>
                <div class="manager_list_post">
                    <?php for ($i=0; $i < 5 ; $i++) { ?>
                        <input type="checkbox" name="" id="manager_post_checkbox_<?=$i?>" hidden class="manager_post_checkbox">
                        <label class="manager_post_checkbox" for="manager_post_checkbox_<?=$i?>">
                            <div class="post_img">
                                <?php if ($i!=1) { ?>
                                    <img src="/img/photo-1506773090264-ac0b07293a64.jfif" alt="">
                                <?php }else{ ?>
                                    <p class="manager_post_checkbox_title">but you didn't have to cut up we were nothing i don't even need your love but you treat me like a stranger and i feel so rough no you didn't have to stodd so low have your collect and record your number</p>
                                <?php } ?>
                            </div>
                            <div class="post_in4">
                                <img class="avt_50" src="/img/photo-1506773090264-ac0b07293a64.jfif" alt="">
                                <div class="post_in4_txtbox">
                                    <p class="manager_post_checkbox_title">Acing the world’s 2nd* most popular Management Master's Acing the world’s 2nd* most popular Management Master's</p>
                                    <p class=""><?=date("d",time())." tháng ".date("m",time())?> <span><img src="/img/gis_earth-australia-o.svg" alt=""></span></p>
                                </div>
                            </div>
                            <div class="check_circle"></div>
                        </label>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="modal_footer">
            <p class="modal_footer_txt"><span class="manager_post_num_checked">0/50</span> Bạn có thể ẩn hoặc xóa các bài viết bạn đã chọn</p>
            <button class="nv_btn_3">Xóa</button>
            <button class="save_btn" disabled>Tiếp</button>
        </div>
    </div>
</div>

<div class="modal popup_manager_post_action" id="popup_manager_post_action">
    <div class="modal_content">
        <div class="modal_header">
            Quản lý bài viết
            <img class="" src="/img/turnoff_popup.svg" alt="Ảnh lỗi" data-dimiss="modal">
        </div>
        <div class="modal_body">
            <div class="who_cmt_body_detail">
                <label for="action_1" class="action_label">
                    <p class="filter_post_txt_1">Ẩn bài viết</p>
                    <p class="who_cmt_body_sm_txt">Ẩn bài viết khỏi dòng thời gian của bạn</p>
                </label>
                <input id="action_1" class="who_cmt_body_radio" type="radio" name="manager_post_ation">
            </div>
            <div class="who_cmt_body_detail">
                <label for="action_2" class="action_label">
                    <p class="filter_post_txt_1">Gỡ thẻ</p>
                    <p class="who_cmt_body_sm_txt">Xóa chính mình khỏi bài viết bạn được gắn thẻ</p>
                </label>
                <input id="action_2" class="who_cmt_body_radio" type="radio" name="manager_post_ation">
            </div>
            <div class="who_cmt_body_detail">
                <label for="action_3" class="action_label">
                    <p class="filter_post_txt_1">Xóa bài viết</p>
                    <p class="who_cmt_body_sm_txt">Xóa bài viết bạn đã tạo</p>
                </label>
                <input id="action_3" class="who_cmt_body_radio" type="radio" name="manager_post_ation">
            </div>
        </div>
        <div class="modal_footer">
            <button class="save_btn">Xong</button>
        </div>
    </div>
</div>

<div class="modal popup_filter_post" id="popup_filter_post">
    <div class="modal_content">
        <div class="modal_header">
            Bộ lọc bài viết
            <img class="" src="/img/turnoff_popup.svg" alt="Ảnh lỗi" data-dimiss="modal">
        </div>
        <div class="modal_body">
            <p class="filter_post_txt_1">Dùng bộ lọc để tìm bài viết trên dòng thời gian của bạn.</p>
            <p class="filter_post_txt_2">Mợi người vẫn nhìn thấy bảng tin của bạn như bình thường</p>
            <div class="filter_post_tbl">
                <div>
                    <p class="filter_post_txt_2 filter_post_label">Đi đến:</p>
                    <div class="nv_dmy">
                        <select class="filter_post_select" name="" id="">
                            <option value="">Năm</option>
                        </select>
                        <select class="filter_post_select" name="" id="">
                            <option value="">Tháng</option>
                        </select>
                        <select class="filter_post_select" name="" id="">
                            <option value="">Ngày</option>
                        </select>
                    </div>
                </div>
                <div>
                    <p class="filter_post_txt_2 filter_post_label">Người đăng:</p>
                    <div>
                        <select class="filter_post_select" name="" id="">
                            <option value="">Bất kỳ ai</option>
                            <option value="">Bạn</option>
                            <option value="">Người khác</option>
                        </select>
                    </div>
                </div>
                <div>
                    <p class="filter_post_txt_2 filter_post_label">Quyền riêng tư:</p>
                    <div>
                        <select class="filter_post_select" name="" id="">
                            <option value="">Tất cả bài viết</option>
                            <option value="">Công khai</option>
                            <option value="">Bạn bè</option>
                            <option value="">Chỉ mình tôi</option>
                        </select>
                    </div>
                </div>
                <div>
                    <p class="filter_post_txt_2 filter_post_label">Bài viết được gắn thẻ:</p>
                    <div>
                        <select class="filter_post_select" name="" id="">
                            <option value="">Tất cả bài viết</option>
                            <option value="">Chỉ hiển thị bài viết tôi được gắn thẻ</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal_footer">
            <button class="nv_btn_3">Xóa</button>
            <button class="save_btn">Xong</button>
        </div>
    </div>
</div>
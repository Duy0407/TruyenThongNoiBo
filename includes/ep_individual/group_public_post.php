<div class="group_public_post">
    <?php if (isset($_SESSION['login'])) { ?>
    <div class="post_feel">
        <div class="post_feel_header">
            <img class="post_feel_avt"
                src="<?=$my_avt?>"
                alt="Ảnh lỗi">
            <input class="post_feel_search" type="text" placeholder="Hãy viết cảm nghĩ của bạn" readonly>
        </div>
        <div class="post_feel_footer">
            <div class="post_feel_footer_item post_feel_footer_item_upload">
                <img class="icon_post_footer" src="/img/nv_upload_file.svg" alt="Ảnh lỗi">
                Ảnh/video/tệp
            </div>
            <div class="post_feel_footer_item post_feel_footer_item_name_metion">
                <img class="icon_post_footer" src="/img/nv_post_feel_user_tag.svg" alt="Ảnh lỗi">
                Nhắc tên thành viên
            </div>
            <div class="post_feel_footer_item post_feel_footer_item_activity">
                <img class="icon_post_footer" src="/img/nv_icon_post_footer_active.svg" alt="Ảnh lỗi">
                Cảm xúc/Hoạt động
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="filter_post">
        <p class="filter_post_title">Bài viết</p>
        <button class="filter_post_btn btn_filter_post">
            <img src="/img/nv_setting-4.svg" alt="Ảnh lỗi">
            Bộ lọc
        </button>
        <?php if ($type_edit == 0) { ?>
        <button class="filter_post_btn btn_manager_post">
            <img src="/img/nv_setting-2.svg" alt="Ảnh lỗi">
            Quản lý bài viết
        </button>
        <?php } ?>
    </div>
    <div class="center_body lst_posts_profile" data-page="1">
        <?php foreach ($arr_post as $key => $row) { 
            include '../includes/index_employee/post.php';
        } ?>
    </div>

<!-- giao diện bài viết chia sẻ bài viết -->
    <!-- <div class="center_body">
        <div class="ep_post_detail">
            <div class="ep_post_detail_item">
                <img class="ep_post_avt"
                    src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80"
                    alt="Ảnh lỗi">
                <div>
                    <p class="ep_post_author_name">Lê Thị Thu <span class="ep_post_author_name_span">đã chia sẻ bài viết
                            của</span> Mipan ZuZu</p>
                    <p class="ep_post_time">16:00 11/06/2021.
                        <?php
                        $i = 1;
                        if ($i == 1) {
                        ?>
                        <img class="icon_regime" src="../img/ep_gr_admin.svg" alt="Ảnh lỗi">
                        <?php
                        } else {
                        ?>
                        <img class="icon_regime" src="../img/post_congkhai.svg" alt="Ảnh lỗi">
                        <?php
                        }
                        ?>
                    </p>
                </div>
                <img class="ep_post_more" src="../img/ep_post_more.svg" alt="ep_post_more.svg">
                <div class="ep_post_action1">
                    <div class="ep_post_action1_deatail ep_post_action1_save">
                        <?php
                        $k = 1;
                        if ($k == 0) {
                        $img_save = "../img/ep_post_no_save.svg";
                        $text_save = "Bỏ lưu bài viết";
                        } else {
                        $img_save = "../img/ep_post_save.svg";
                        $text_save = "Lưu bài viết";
                        }
                        ?>
                        <img src="<?= $img_save ?>" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text"><?= $text_save ?></span>
                    </div>
                    <div class="ep_post_action1_deatail ep_post_action1_deatail_notify">
                        <?php
                        $k = 1;
                        if ($k == 0) {
                        $img_notify = "../img/ep_post_turn_off_notify.svg";
                        $text_notify = "Tắt thông báo";
                        } else {
                        $img_notify = "../img/ep_post_notify.svg";
                        $text_notify = "Bật thông báo";
                        }
                        ?>
                        <img src="<?= $img_notify ?>" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify"><?= $text_notify ?></span>
                    </div>
                    <?php
                    if ($type_edit == 0) {
                    ?>
                    <div class="ep_post_action1_deatail">
                        <img src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Chỉnh sửa bài viết</span>
                    </div>
                    <div class="ep_post_action1_deatail ep_post_action1_deatail_edit_object">
                        <img src="../img/post_congkhai.svg" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Chỉnh sửa đối tượng xem bài
                            viết</span>
                    </div>
                    <div class="ep_post_action1_deatail ep_post_action1_deatail_del_post">
                        <img src="../img/xoa-bai-viet.svg" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Xóa bài viết</span>
                    </div>
                    <?php
                    }else{
                    ?>
                    <div class="ep_post_action1_deatail ep_post_turnon_sup">
                        <img src="../img/suppost.svg" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Tìm hỗ trợ hoặc báo cáo bài
                            viết</span>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="ep_post_file ep_post_file2">
                <div class="ep_post_file_div">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                    ?>
                    <a download class="ep_post_file_div_detail">
                        <p class="ep_post_name_file">Báo cáo công việc ABC.xlsx</p>
                        <p class="ep_post_file_size">121KB 10:03, 07/09/2021</p>
                        <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                    </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="ep_post_file_img">
                    <?php
                    for ($i = 0; $i < 4; $i++) {
                    ?>
                    <img class="ep_post_file_img_detail"
                        src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80"
                        alt="Ảnh lỗi">
                    <?php
                    }
                    ?>
                    <div class="ep_post_file_img_more">+5</div>
                </div>
                <div class="ep_post_info2">
                    <p class="ep_post_author_name">Mipan ZuZu</p>
                    <p class="ep_post_author_name_time2">11/06/2017 . <img class="icon_regime"
                            src="../img/post_congkhai.svg" alt="Ảnh lỗi"> Công khai</p>
                </div>
                <div class="ep_post_content ep_post_content2">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </div>
            </div>
            <div class="ep_post_count_like">
                <div class="ep_post_sum_like">
                    <img src="../img/ep_post_like.svg" alt="Ảnh lỗi">
                    100
                </div>
                <div class="ep_post_sum_cmt">
                    20 Bình luận 12 Lượt chia sẻ
                </div>
            </div>
            <div class="ep_post_action">
                <div class="ep_post_action_detail">
                    <?php
                    $j = 2;
                    if ($j == 1) {
                    ?>
                    <img src="../img/ep_post_active_like.svg" alt="Ảnh lỗi">
                    <?php
                    } else {
                    ?>
                    <img src="../img/ep_post_liked.svg" alt="Ảnh lỗi">
                    <?php
                    }
                    ?>
                    <span class="ep_post_like_text">Thích</span>
                </div>
                <div class="ep_post_action_detail" onclick="focus_cmt(this)">
                    <img src="../img/ep_post_cmt.svg" alt="Ảnh lỗi">
                    <span class="ep_post_cmt_text">Bình luận</span>
                </div>
                <div class="ep_post_popup_share">
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_share_now.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Chia sẻ ngay</span>
                    </div>
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_share_new.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Chia sẻ lên bảng tin</span>
                    </div>
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_share_mess.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Gửi bằng Chat</span>
                    </div>
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_share_group.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Chia sẻ lên nhóm</span>
                    </div>
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_page_friend.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Chia sẻ lên trang cá nhân của bạn bè</span>
                    </div>
                </div>
                <div class="ep_post_action_detail ep_post_turnon_popup_share" onclick="turn_on_popup_share(this)">
                    <img class="ep_post_turnon_popup_share_img" src="../img/ep_post_share.svg" alt="Ảnh lỗi">
                    <span class="ep_post_cmt_text">Chia sẻ</span>
                </div>
            </div>
            <form class="ep_post_write">
                <img class="ep_post_write_avt"
                    src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                    alt="Ảnh lỗi">
                <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                <div class="ep_post_write_action">
                    <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                    <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                    <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                </div>
            </form>
            <div class="ep_post_show_cmt">
                <div class="ep_post_show_cmt_detail">
                    <img class="ep_show_cmt_avt"
                        src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                        alt="Ảnh lỗi">
                    <div class="ep_show_cmt_content">
                        <div class="ep_show_cmt_content_detail">
                            <p class="ep_show_cmt_username">Lê Thu Trà</p>
                            <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                            <div class="popup_action_cmt">
                                <div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>
                                <div class="popup_action_cmt_detail">
                                    <?php
                                    $i = 1;
                                    if ($i == 0) {
                                        $icon_show = '../img/ep_show_cmt.svg';
                                        $text_show = 'Hiện bình luận';
                                    } else {
                                        $icon_show = '../img/ep_hide_cmt.svg';
                                        $text_show = 'Ẩn bình luận';
                                    }
                                    ?>
                                    <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                    <?= $text_show ?>
                                </div>
                                <div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>
                            </div>
                        </div>
                        <div class="ep_show_cmt_action2">
                            <button class="ep_show_cmt_action2_btn">Thích . </button>
                            <button class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                            <button class="ep_show_cmt_action2_btn">10 phút trước</button>
                        </div>
                    </div>
                    <div class="ep_show_repcmt">
                        <div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                    <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                    <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                    <div class="popup_action_cmt">
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                                alt="Ảnh lỗi">
                                            Chỉnh sửa bình luận
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <?php
                                            $i = 1;
                                            if ($i == 0) {
                                                $icon_show = '../img/ep_show_cmt.svg';
                                                $text_show = 'Hiện bình luận';
                                            } else {
                                                $icon_show = '../img/ep_hide_cmt.svg';
                                                $text_show = 'Ẩn bình luận';
                                            }
                                            ?>
                                            <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>"
                                                alt="Ảnh lỗi">
                                            <?= $text_show ?>
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                alt="Ảnh lỗi">
                                            Xóa bình luận
                                        </div>
                                    </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                    <button class="ep_show_cmt_action2_btn">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                            </div>
                        </div>
                        <div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                    <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                    <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                    <div class="popup_action_cmt">
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                                alt="Ảnh lỗi">
                                            Chỉnh sửa bình luận
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <?php
                                            $i = 1;
                                            if ($i == 0) {
                                                $icon_show = '../img/ep_show_cmt.svg';
                                                $text_show = 'Hiện bình luận';
                                            } else {
                                                $icon_show = '../img/ep_hide_cmt.svg';
                                                $text_show = 'Ẩn bình luận';
                                            }
                                            ?>
                                            <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>"
                                                alt="Ảnh lỗi">
                                            <?= $text_show ?>
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                alt="Ảnh lỗi">
                                            Xóa bình luận
                                        </div>
                                    </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                    <button class="ep_show_cmt_action2_btn">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                            </div>
                        </div>
                        <form action="" class="ep_post_write_repcmt">
                            <img class="ep_post_write_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                            <div class="ep_post_write_action">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg"
                                    alt="Ảnh lỗi">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg"
                                    alt="Ảnh lỗi">
                                <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg"
                                        alt="Ảnh lỗi"></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="ep_post_show_cmt_detail">
                    <img class="ep_show_cmt_avt"
                        src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                        alt="Ảnh lỗi">
                    <div class="ep_show_cmt_content">
                        <div class="ep_show_cmt_content_detail">
                            <p class="ep_show_cmt_username">Lê Thu Trà</p>
                            <img class="image_cmt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <a href="" class="file_cmt">
                                <p class="name_file_cmt">Báo cáo công...docx</p>
                                <p class="file_cmt_time">121KB 10:03, 07/09/2021</p>
                                <img class="icon_download_cmt" src="../img/icon_download.svg" alt="Ảnh lỗi">
                            </a>
                            <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                            <div class="popup_action_cmt">
                                <div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>
                                <div class="popup_action_cmt_detail">
                                    <?php
                                    $i = 1;
                                    if ($i == 0) {
                                        $icon_show = '../img/ep_show_cmt.svg';
                                        $text_show = 'Hiện bình luận';
                                    } else {
                                        $icon_show = '../img/ep_hide_cmt.svg';
                                        $text_show = 'Ẩn bình luận';
                                    }
                                    ?>
                                    <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                    <?= $text_show ?>
                                </div>
                                <div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>
                            </div>
                        </div>
                        <div class="ep_show_cmt_action2">
                            <button class="ep_show_cmt_action2_btn">Thích . </button>
                            <button class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                            <button class="ep_show_cmt_action2_btn">10 phút trước</button>
                        </div>
                    </div>
                    <div class="ep_show_repcmt">
                        <div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                    <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                    <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                    <div class="popup_action_cmt">
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                                alt="Ảnh lỗi">
                                            Chỉnh sửa bình luận
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <?php
                                            $i = 1;
                                            if ($i == 0) {
                                                $icon_show = '../img/ep_show_cmt.svg';
                                                $text_show = 'Hiện bình luận';
                                            } else {
                                                $icon_show = '../img/ep_hide_cmt.svg';
                                                $text_show = 'Ẩn bình luận';
                                            }
                                            ?>
                                            <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>"
                                                alt="Ảnh lỗi">
                                            <?= $text_show ?>
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                alt="Ảnh lỗi">
                                            Xóa bình luận
                                        </div>
                                    </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                    <button class="ep_show_cmt_action2_btn">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                            </div>
                        </div>
                        <div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                    <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                    <img class="image_cmt"
                                        src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                        alt="Ảnh lỗi">
                                    <a href="" class="file_cmt">
                                        <p class="name_file_cmt">Báo cáo công...docx</p>
                                        <p class="file_cmt_time">121KB 10:03, 07/09/2021</p>
                                        <img class="icon_download_cmt" src="../img/icon_download.svg" alt="Ảnh lỗi">
                                    </a>
                                    <p class="ep_show_cnt_item">Lorem Ipsum is</p>
                                    <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                    <div class="popup_action_cmt">
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                                alt="Ảnh lỗi">
                                            Chỉnh sửa bình luận
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <?php
                                            $i = 1;
                                            if ($i == 0) {
                                                $icon_show = '../img/ep_show_cmt.svg';
                                                $text_show = 'Hiện bình luận';
                                            } else {
                                                $icon_show = '../img/ep_hide_cmt.svg';
                                                $text_show = 'Ẩn bình luận';
                                            }
                                            ?>
                                            <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>"
                                                alt="Ảnh lỗi">
                                            <?= $text_show ?>
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                alt="Ảnh lỗi">
                                            Xóa bình luận
                                        </div>
                                    </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                    <button class="ep_show_cmt_action2_btn">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                            </div>
                        </div>
                        <form action="" class="ep_post_write_repcmt">
                            <img class="ep_post_write_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                            <div class="ep_post_write_action">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg"
                                    alt="Ảnh lỗi">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg"
                                    alt="Ảnh lỗi">
                                <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg"
                                        alt="Ảnh lỗi"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- giao diện bài viết chia sẻ kỷ niệm -->
    <?php
    if ($type_edit == 0) {
    ?>
    <!-- <div class="center_body">
        <div class="ep_post_detail">
            <div class="ep_post_detail_item">
                <img class="ep_post_avt"
                    src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80"
                    alt="Ảnh lỗi">
                <div>
                    <p class="ep_post_author_name">Lê Thị Thu <span class="ep_post_author_name_span">đã chia sẻ một kỷ
                            niệm</span></p>
                    <p class="ep_post_time">16:00 11/06/2021.
                        <?php
                        $i = 1;
                        if ($i == 1) {
                        ?>
                        <img class="icon_regime" src="../img/ep_gr_admin.svg" alt="Ảnh lỗi">
                        <?php
                        } else {
                        ?>
                        <img class="icon_regime" src="../img/post_congkhai.svg" alt="Ảnh lỗi">
                        <?php
                        }
                        ?>
                    </p>
                </div>
                <img class="ep_post_more" src="../img/ep_post_more.svg" alt="ep_post_more.svg">
                <div class="ep_post_action1">
                    <div class="ep_post_action1_deatail ep_post_action1_save">
                        <?php
                        $k = 1;
                        if ($k == 0) {
                        $img_save = "../img/ep_post_no_save.svg";
                        $text_save = "Bỏ lưu bài viết";
                        } else {
                        $img_save = "../img/ep_post_save.svg";
                        $text_save = "Lưu bài viết";
                        }
                        ?>
                        <img src="<?= $img_save ?>" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text"><?= $text_save ?></span>
                    </div>
                    <div class="ep_post_action1_deatail ep_post_action1_deatail_notify">
                        <?php
                        $k = 1;
                        if ($k == 0) {
                        $img_notify = "../img/ep_post_turn_off_notify.svg";
                        $text_notify = "Tắt thông báo";
                        } else {
                        $img_notify = "../img/ep_post_notify.svg";
                        $text_notify = "Bật thông báo";
                        }
                        ?>
                        <img src="<?= $img_notify ?>" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify"><?= $text_notify ?></span>
                    </div>
                    <div class="ep_post_action1_deatail ep_post_action1_deatail_edit_object">
                        <img src="../img/post_congkhai.svg" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Chỉnh sửa đối tượng xem bài
                            viết</span>
                    </div>
                    <div class="ep_post_action1_deatail ep_post_action1_deatail_del_post">
                        <img src="../img/xoa-bai-viet.svg" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Xóa bài viết</span>
                    </div>
                </div>
            </div>
            <div class="ep_post_file">
                <div class="ep_post_content ep_post_content2">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </div>
                <div class="ep_post_file2 ep_post_file3">
                    <div class="ep_post_file2_div2">
                        <img src="../img/ky-niem-trang-ca-nhan.png" alt="Ảnh lỗi">
                        <p class="ep_post_file2_div2_p">Kỷ niệm của bạn 4 năm trước</p>
                        <img src="../img/ky-niem-trang-ca-nhan2.png" alt="Ảnh lỗi">
                    </div>
                    <div>
                        <img class="ep_post_file_img2" src="../img/demo.jfif" alt="Ảnh lỗi">
                    </div>
                    <div class="ep_post_info2">
                        <p class="ep_post_author_name">Mipan ZuZu</p>
                        <p class="ep_post_author_name_time2">11/06/2017 . <img class="icon_regime"
                                src="../img/post_congkhai.svg" alt="Ảnh lỗi"> Công khai</p>
                    </div>
                    <div class="ep_post_content ep_post_content2">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </div>
                </div>
            </div>
            <div class="ep_post_count_like">
                <div class="ep_post_sum_like">
                    <img src="../img/ep_post_like.svg" alt="Ảnh lỗi">
                    100
                </div>
                <div class="ep_post_sum_cmt">
                    20 Bình luận 12 Lượt chia sẻ
                </div>
            </div>
            <div class="ep_post_action">
                <div class="ep_post_action_detail">
                    <?php
                    $j = 2;
                    if ($j == 1) {
                    ?>
                    <img src="../img/ep_post_active_like.svg" alt="Ảnh lỗi">
                    <?php
                    } else {
                    ?>
                    <img src="../img/ep_post_liked.svg" alt="Ảnh lỗi">
                    <?php
                    }
                    ?>
                    <span class="ep_post_like_text">Thích</span>
                </div>
                <div class="ep_post_action_detail" onclick="focus_cmt(this)">
                    <img src="../img/ep_post_cmt.svg" alt="Ảnh lỗi">
                    <span class="ep_post_cmt_text">Bình luận</span>
                </div>
                <div class="ep_post_popup_share">
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_share_now.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Chia sẻ ngay</span>
                    </div>
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_share_new.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Chia sẻ lên bảng tin</span>
                    </div>
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_share_mess.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Gửi bằng Chat</span>
                    </div>
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_share_group.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Chia sẻ lên nhóm</span>
                    </div>
                    <div class="ep_post_popup_share_detail">
                        <img src="../img/ep_post_page_friend.svg" alt="Ảnh lỗi">
                        <span class="ep_post_popup_share_text">Chia sẻ lên trang cá nhân của bạn bè</span>
                    </div>
                </div>
                <div class="ep_post_action_detail ep_post_turnon_popup_share" onclick="turn_on_popup_share(this)">
                    <img class="ep_post_turnon_popup_share_img" src="../img/ep_post_share.svg" alt="Ảnh lỗi">
                    <span class="ep_post_cmt_text">Chia sẻ</span>
                </div>
            </div>
            <form class="ep_post_write">
                <img class="ep_post_write_avt"
                    src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                    alt="Ảnh lỗi">
                <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                <div class="ep_post_write_action">
                    <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                    <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                    <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                </div>
            </form>
            <div class="ep_post_show_cmt">
                <div class="ep_post_show_cmt_detail">
                    <img class="ep_show_cmt_avt"
                        src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                        alt="Ảnh lỗi">
                    <div class="ep_show_cmt_content">
                        <div class="ep_show_cmt_content_detail">
                            <p class="ep_show_cmt_username">Lê Thu Trà</p>
                            <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                            <div class="popup_action_cmt">
                                <div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>
                                <div class="popup_action_cmt_detail">
                                    <?php
                                    $i = 1;
                                    if ($i == 0) {
                                        $icon_show = '../img/ep_show_cmt.svg';
                                        $text_show = 'Hiện bình luận';
                                    } else {
                                        $icon_show = '../img/ep_hide_cmt.svg';
                                        $text_show = 'Ẩn bình luận';
                                    }
                                    ?>
                                    <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                    <?= $text_show ?>
                                </div>
                                <div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>
                            </div>
                        </div>
                        <div class="ep_show_cmt_action2">
                            <button class="ep_show_cmt_action2_btn">Thích . </button>
                            <button class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                            <button class="ep_show_cmt_action2_btn">10 phút trước</button>
                        </div>
                    </div>
                    <div class="ep_show_repcmt">
                        <div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                    <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                    <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                    <div class="popup_action_cmt">
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                                alt="Ảnh lỗi">
                                            Chỉnh sửa bình luận
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <?php
                                            $i = 1;
                                            if ($i == 0) {
                                                $icon_show = '../img/ep_show_cmt.svg';
                                                $text_show = 'Hiện bình luận';
                                            } else {
                                                $icon_show = '../img/ep_hide_cmt.svg';
                                                $text_show = 'Ẩn bình luận';
                                            }
                                            ?>
                                            <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>"
                                                alt="Ảnh lỗi">
                                            <?= $text_show ?>
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                alt="Ảnh lỗi">
                                            Xóa bình luận
                                        </div>
                                    </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                    <button class="ep_show_cmt_action2_btn">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                            </div>
                        </div>
                        <div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                    <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                    <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                    <div class="popup_action_cmt">
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                                alt="Ảnh lỗi">
                                            Chỉnh sửa bình luận
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <?php
                                            $i = 1;
                                            if ($i == 0) {
                                                $icon_show = '../img/ep_show_cmt.svg';
                                                $text_show = 'Hiện bình luận';
                                            } else {
                                                $icon_show = '../img/ep_hide_cmt.svg';
                                                $text_show = 'Ẩn bình luận';
                                            }
                                            ?>
                                            <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>"
                                                alt="Ảnh lỗi">
                                            <?= $text_show ?>
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                alt="Ảnh lỗi">
                                            Xóa bình luận
                                        </div>
                                    </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                    <button class="ep_show_cmt_action2_btn">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                            </div>
                        </div>
                        <form action="" class="ep_post_write_repcmt">
                            <img class="ep_post_write_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                            <div class="ep_post_write_action">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg"
                                    alt="Ảnh lỗi">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg"
                                    alt="Ảnh lỗi">
                                <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg"
                                        alt="Ảnh lỗi"></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="ep_post_show_cmt_detail">
                    <img class="ep_show_cmt_avt"
                        src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                        alt="Ảnh lỗi">
                    <div class="ep_show_cmt_content">
                        <div class="ep_show_cmt_content_detail">
                            <p class="ep_show_cmt_username">Lê Thu Trà</p>
                            <img class="image_cmt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <a href="" class="file_cmt">
                                <p class="name_file_cmt">Báo cáo công...docx</p>
                                <p class="file_cmt_time">121KB 10:03, 07/09/2021</p>
                                <img class="icon_download_cmt" src="../img/icon_download.svg" alt="Ảnh lỗi">
                            </a>
                            <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                            <div class="popup_action_cmt">
                                <div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>
                                <div class="popup_action_cmt_detail">
                                    <?php
                                    $i = 1;
                                    if ($i == 0) {
                                        $icon_show = '../img/ep_show_cmt.svg';
                                        $text_show = 'Hiện bình luận';
                                    } else {
                                        $icon_show = '../img/ep_hide_cmt.svg';
                                        $text_show = 'Ẩn bình luận';
                                    }
                                    ?>
                                    <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                    <?= $text_show ?>
                                </div>
                                <div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>
                            </div>
                        </div>
                        <div class="ep_show_cmt_action2">
                            <button class="ep_show_cmt_action2_btn">Thích . </button>
                            <button class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                            <button class="ep_show_cmt_action2_btn">10 phút trước</button>
                        </div>
                    </div>
                    <div class="ep_show_repcmt">
                        <div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                    <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                    <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                    <div class="popup_action_cmt">
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                                alt="Ảnh lỗi">
                                            Chỉnh sửa bình luận
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <?php
                                            $i = 1;
                                            if ($i == 0) {
                                                $icon_show = '../img/ep_show_cmt.svg';
                                                $text_show = 'Hiện bình luận';
                                            } else {
                                                $icon_show = '../img/ep_hide_cmt.svg';
                                                $text_show = 'Ẩn bình luận';
                                            }
                                            ?>
                                            <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>"
                                                alt="Ảnh lỗi">
                                            <?= $text_show ?>
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                alt="Ảnh lỗi">
                                            Xóa bình luận
                                        </div>
                                    </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                    <button class="ep_show_cmt_action2_btn">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                            </div>
                        </div>
                        <div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                    <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                    <img class="image_cmt"
                                        src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                        alt="Ảnh lỗi">
                                    <a href="" class="file_cmt">
                                        <p class="name_file_cmt">Báo cáo công...docx</p>
                                        <p class="file_cmt_time">121KB 10:03, 07/09/2021</p>
                                        <img class="icon_download_cmt" src="../img/icon_download.svg" alt="Ảnh lỗi">
                                    </a>
                                    <p class="ep_show_cnt_item">Lorem Ipsum is</p>
                                    <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                    <div class="popup_action_cmt">
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                                alt="Ảnh lỗi">
                                            Chỉnh sửa bình luận
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <?php
                                            $i = 1;
                                            if ($i == 0) {
                                                $icon_show = '../img/ep_show_cmt.svg';
                                                $text_show = 'Hiện bình luận';
                                            } else {
                                                $icon_show = '../img/ep_hide_cmt.svg';
                                                $text_show = 'Ẩn bình luận';
                                            }
                                            ?>
                                            <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>"
                                                alt="Ảnh lỗi">
                                            <?= $text_show ?>
                                        </div>
                                        <div class="popup_action_cmt_detail">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                alt="Ảnh lỗi">
                                            Xóa bình luận
                                        </div>
                                    </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                    <button class="ep_show_cmt_action2_btn">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                            </div>
                        </div>
                        <form action="" class="ep_post_write_repcmt">
                            <img class="ep_post_write_avt"
                                src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                alt="Ảnh lỗi">
                            <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                            <div class="ep_post_write_action">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg"
                                    alt="Ảnh lỗi">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg"
                                    alt="Ảnh lỗi">
                                <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg"
                                        alt="Ảnh lỗi"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <?php
    }
    ?>
</div>
<div class="main-header">
    <div class="cd-header">
        <div class="container-header">
            <div class="container-header-left">
                <?php if (isset($_SESSION['login'])){ ?>
                <button class="container-header-left-btn" id="container-header-left-btn">
                    <span class="container-header-left-menu">
                        <img class="" src="../img/nv_header_home.svg" alt="Ảnh lỗi">
                        Trang chủ
                        <img class="" src="../img/nv_header_blue_dropdown.svg" alt="Ảnh lỗi">
                    </span>
                    <img class="container-header-left-small-menu" hidden src="../img/nv_header_small_menu.svg" alt="Ảnh lỗi">
                </button>
                <button class="open-container-header-mid">
                    <img src="../img/icon_search.png">
                </button>
                <div class="container-header-left-dropdown" hidden>
                    <?php include 'cd_sidebar_new.php' ?>
                </div>
                <?php }else{ ?>
                <a class="container-header-left-btn" id="container-header-left-btn" href="https://quanlychung.timviec365.vn/" target="_blank">
                    <span class="container-header-left-menu">
                        <img class="" src="/img/nv_header_small_menu.svg" alt="Ảnh lỗi">
                        Chuyển đổi số
                    </span>
                    <img class="container-header-left-small-menu" hidden src="/img/nv_header_small_menu.svg" alt="Ảnh lỗi">
                </a>
                <button class="open-container-header-mid">
                    <img src="../img/icon_search.png">
                </button>
                <?php } ?>
            </div>
            <div class="container-header-mid">
                <form class="baiviet-search mobile_search" id="search_ttnb">
                    <button class="container-header-mid-back" type="button">
                        <img src="/img/nv_header_arrow_left.svg">
                    </button>
                    <input type="text" name="search_post" id="input_search" placeholder="Tìm kiếm bài viết">
                    <button class="btn_search v_ttsdn_btn_search">
                        <img src="../img/icon_search.png" alt="search">
                    </button>
                </form>
            </div>
            <?php if (isset($_SESSION['login'])){ ?>
            <div class="container_phai">
                <div class="phai">
                    <ul class="menu">
                        <li class="show_side_bar">
                            <img class="mb" src="../img/icon_mb5.png" />
                        </li>
                        <li id="mes" class="ul_pp_menu">
                            <img class="mb show_pp_menu" src="../img/icon_mb4.png" />
                            <img class="mb_an show_pp_menu" src="../img/caidatnhanvien/mes.png">
                            <div class="v_popup_chat">
                                <div class="v_popup_chat_detail">
                                    <div class="v_popup_chat_item v_popup_chat_active">Tin nhắn</div>
                                    <div class="v_popup_chat_item v_popup_chat_active2">Danh bạ</div>
                                    <img class="v_icon_zoom_chat" src="../img/v_icon_zoom_chat.svg" alt="v_icon_zoom_chat.svg">
                                    <img class="v_off_popup_chat" src="../img/v_off_popup_chat.svg" alt="v_off_popup_chat.svg">
                                </div>

                                <!-- Trò chuyện gần đây -->
                                <div class="v_mess_conversation">
                                    <div class="v_popup_mess">
                                        <form action="" class="v_popup_chat_form">
                                            <input type="text" class="v_search_popup_chat" placeholder="Tìm kiếm trong tin nhắn">
                                            <button class="v_search_submit_popup_chat"><img src="../img/v_search_popup_chat.svg" alt="v_search_popup_chat.svg"></button>
                                        </form>
                                        <p class="v_recent_conversation">Trò chuyện gần đây</p>
                                        <div class="v_detail_user_chat">
                                            <?php
                                            for ($i = 0; $i < 7; $i++) {
                                            ?>
                                                <div class="v_user_chat">
                                                    <div class="v_user_chat_avatar">
                                                        <img class="v_img_avatar_chat" src="../img/v_avatar_user_chat.png" alt="Ảnh lỗi">
                                                        <div class="v_user_online">
                                                            <div class="v_user_online_detail"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="v_chat_user_name">Phan Lê An</p>
                                                        <p class="v_chat_user_content">xin chào</p>
                                                    </div>
                                                    <div class="v_chat_user_time">10:07</div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="v_see_all_mess">
                                        Xem tất cả trong tin nhắn
                                    </div>
                                </div>

                                <!-- Danh bạ -->
                                <div class="v_directory" style="display: none;">
                                    <div class="v_popup_directory">
                                        <form action="" class="v_popup_chat_form">
                                            <input type="text" class="v_search_popup_chat v_search_popup_chat_directory" placeholder="Tìm kiếm trong danh bạ">
                                            <button class="v_search_submit_popup_chat"><img src="../img/v_search_popup_chat.svg" alt="v_search_popup_chat.svg"></button>
                                        </form>
                                        <p class="v_recent_conversation">Các liên hệ của tôi</p>
                                        <div class="v_detail_user_chat">
                                            <?php
                                            // if (array_values($data_ep)[0]->com_logo == "") {
                                            //     $com_logo = '../img/logo_com.png';
                                            // } else {
                                            //     $com_logo = 'https://chamcong.24hpay.vn/upload/company/logo/' . array_values($data_ep)[0]->com_logo;
                                            // }
                                            ?>
                                            <!-- <div class="v_user_chat v_user_directory" data-id_user="<?= array_values($data_ep)[0]->com_id ?>" data-user_type="1">
                                                <div class="v_user_chat_avatar">
                                                    <img class="v_img_avatar_chat" src="<?= $com_logo ?>" alt="Ảnh lỗi">
                                                    <div class="v_user_online">
                                                        <div class="v_user_online_detail"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="v_chat_user_name v_directory_user_name"><?= array_values($data_ep)[0]->com_name ?></p>
                                                </div>
                                            </div> -->
                                            <?php
                                            $list_ep = [];
                                            foreach ($data_ep as $key => $value) {
                                                $id_user_tag = $value['ep_id'];
                                                $id_user = $_SESSION['login']['id'];
                                                $user_type = $_SESSION['login']['user_type'];
                                                $db_nickname = new db_query("SELECT nick_name FROM nickname WHERE id_user = $id_user AND user_type = $user_type AND	id_user_tag = $id_user_tag AND type_user_tag = 2");

                                                if (mysql_num_rows($db_nickname->result) > 0) {
                                                    $row = mysql_fetch_array($db_nickname->result);
                                                    $nick_name = $row['nick_name'];
                                                } else {
                                                    $nick_name = $value['ep_name'];
                                                }
                                                $list_ep[] = [
                                                    'ep_id' => $value['ep_id'],
                                                    'ep_name' => $nick_name,
                                                    'online' => 0
                                                ];
                                            ?>
                                                <!-- <div class="v_user_chat v_user_directory" data-id_user="<?= $data_ep[$key]->ep_id ?>" data-user_type="2">
                                                    <div class="v_user_chat_avatar">
                                                        <img class="v_img_avatar_chat" src="../img/v_avatar_user_chat.png" alt="Ảnh lỗi">
                                                        <div class="v_user_online">
                                                            <div class="v_user_online_detail"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="v_chat_user_name v_directory_user_name"><?= $nick_name ?></p>
                                                    </div>
                                                </div> -->
                                            <?php
                                            }
                                            ?>
                                            <div hidden id="list_ep"><?= json_encode($list_ep) ?></div>
                                        </div>
                                    </div>
                                    <div class="v_see_all_mess">
                                        Xem tất cả trong danh bạ
                                    </div>
                                </div>
                            </div>

                            <!--Start: Box chat -->
                            <div class="v_box_chat" style="display: none">
                                <div class="v_box_chat_header">
                                    <div class="v_box_chat_header_div_avatar">
                                        <img class="v_box_chat_header_avatar" src="../img/v_avatar_user_chat.png" alt="Ảnh lỗi">
                                        <div class="v_box_chat_active1">
                                            <div class="v_box_chat_active"></div>
                                        </div>
                                    </div>
                                    <div class="v_box_chat_header_name">Phạm Nhật Vượng</div>
                                    <img class="v_edit_box_chat" src="../img/v_edit_box_chat.svg" alt="v_edit_box_chat.svg">
                                    <img class="v_zoom_box_chat" src="../img/v_zoom_box_chat.svg" alt="v_zoom_box_chat.svg">
                                    <img class="v_del_box_chat" onclick="cancel_box_chat(this)" src="../img/v_del_box_chat.svg" alt="v_del_box_chat.svg">
                                </div>
                                <div class="v_content_box_chat">
                                    <div class="v_content_box_chat_you v_content_box_chat2">
                                        <div class="v_list_drop_emoji" style="display: none;">
                                            <img class="v_list_drop_emoji_img" src="../img/v_drop_heart.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                                            <img class="v_list_drop_emoji_img" src="../img/v_drop_heart_haha.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                                            <img class="v_list_drop_emoji_img" src="../img/v_drop_cry.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                                            <img class="v_list_drop_emoji_img" src="../img/v_drop_angry.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                                            <img class="v_list_drop_emoji_img" src="../img/v_drop_like.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                                            <img class="v_list_drop_emoji_img" src="../img/v_drop_dislike.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                                        </div>
                                        <div class="v_you_avt">
                                            <img src="../img/v_avatar_user_chat.png" alt="Ảnh lỗi">
                                        </div>
                                        <div class="v_you_mess_content">
                                            <p class="v_content_box_chat_you_text">Pham Nhat Vuong, 9:00</p>
                                            <div class="v_content_box_div_file v_content_box_div_file4">
                                                <div class="v_you_mess_cont_detail">
                                                    <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
                                                        <div class="v_content_box_div_file v_content_box_div_file4">
                                                            <img class="more_box_four_img" src="https://images.unsplash.com/photo-1637117404107-f12cb8987a26?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=464&q=80" alt="Ảnh lỗi">
                                                            <img class="more_box_four_img" src="https://images.unsplash.com/photo-1637117404107-f12cb8987a26?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=464&q=80" alt="Ảnh lỗi">
                                                            <img class="more_box_four_img" src="https://images.unsplash.com/photo-1637117404107-f12cb8987a26?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=464&q=80" alt="Ảnh lỗi">
                                                            <img class="more_box_four_img" src="https://images.unsplash.com/photo-1637117404107-f12cb8987a26?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=464&q=80" alt="Ảnh lỗi">
                                                        </div>
                                                        <div class="block_emoji">
                                                            <img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
                                                        </div>
                                                        <div class="v_chat_select2 v_chat_select3">
                                                            <div class="v_more_chat">
                                                                <img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
                                                                <div class="v_chat_custom">
                                                                    <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
                                                                    <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
                                                                    <div class="v_chat_custom_div">Chuyển tiếp</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="v_content_box_div_file v_content_box_div_file2">
                                                <div class="v_you_mess_cont_detail">
                                                    <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
                                                        <div class="v_content_box_div_file v_content_box_div_file3">
                                                            <div class="v_box_file_detail2">
                                                                <img src="../img/v_chat_picture_file.png" alt="Ảnh lỗi">
                                                                <span class="v_box_file_detail_span">abc.docx</span>
                                                            </div>
                                                        </div>
                                                        <div class="block_emoji">
                                                            <img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
                                                        </div>
                                                        <div class="v_chat_select2 v_chat_select3">
                                                            <div class="v_more_chat">
                                                                <img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
                                                                <div class="v_chat_custom">
                                                                    <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
                                                                    <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
                                                                    <div class="v_chat_custom_div">Chuyển tiếp</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <form class="v_box_chat_send">
                                    <div class="v_box_chat_send_div">
                                        <img class="v_box_chat_send_icon" src="../img/icon_icon.png" alt="Ảnh lỗi">
                                        <input class="v_box_chat_send_input" type="text" placeholder="Nhập tin nhắn">
                                    </div>
                                    <div class="v_box_chat_send_select">
                                        <img class="v_box_chat_send_select_img" src="../img/v_micro.svg" alt="Ảnh lỗi">
                                        <img class="v_box_chat_send_select_img v_chat_img" src="../img/v_chat_upload_file.svg" alt="Ảnh lỗi">
                                        <img class="v_box_chat_send_select_img" src="../img/v_upload_danh_thiep.svg" alt="Ảnh lỗi">
                                        <input type="file" hidden class="v_upload_file2" multiple>
                                        <input type="file" hidden class="v_upload_file3" multiple>
                                    </div>
                                    <button class="v_box_chat_send_btn">
                                        <svg class="v_box_chat_send_svg" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.5875 8.60948L2.08754 0.359482C1.95821 0.294807 1.81295 0.268894 1.66924 0.284861C1.52554 0.300829 1.38951 0.357997 1.27754 0.449482C1.1706 0.539102 1.09079 0.656772 1.04707 0.789265C1.00334 0.921758 0.997446 1.06382 1.03004 1.19948L3.01754 8.52698H11.5V10.027H3.01754L1.00004 17.332C0.969455 17.4453 0.965886 17.5642 0.989614 17.6791C1.01334 17.794 1.06371 17.9018 1.13665 17.9937C1.2096 18.0856 1.3031 18.1591 1.40964 18.2083C1.51617 18.2575 1.63276 18.281 1.75004 18.277C1.86744 18.2763 1.98304 18.248 2.08754 18.1945L18.5875 9.94448C18.7104 9.88154 18.8135 9.78592 18.8855 9.66815C18.9575 9.55037 18.9956 9.41502 18.9956 9.27698C18.9956 9.13895 18.9575 9.00359 18.8855 8.88582C18.8135 8.76804 18.7104 8.67242 18.5875 8.60948V8.60948Z" fill="url(#paint0_linear_3:1000)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_3:1000" x1="9.98484" y1="0.280273" x2="9.98484" y2="18.2774" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#4250C2" />
                                                    <stop offset="1" stop-color="#00A1FF" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <!--End: Box chat -->
                        </li>
                        <!-- <li id="nhacnho" class="ul_pp_menu">
                            <img class="mb show_pp_menu" src="../img/icon_mb3.png" />
                            <img class="mb_an show_pp_menu" src="../img/caidatnhanvien/chamthan.png">
                            <div class="popup" id="popup-nhacnho">
                                <div class="caidat-header">
                                    <div class="cont caidat-header-cont">
                                        <p>Nhắc nhở</p>
                                    </div>
                                    <div class="img">
                                        <img class="thoat" src="../img/icon_x.png">
                                    </div>
                                </div>
                                <div class="caidat-body">
                                    <ul class="thongbao">
                                        <?php if (!isset($_SESSION['login'])){
                                            $qr = "";
                                        }elseif ($_SESSION['login']['user_type'] == 2) {
                                            // if ($data_ep[$_SESSION['login']['id']]->dep_id == "") {
                                            //     $qr = "";
                                            // }else{
                                            //     $qr = " OR new_feed.position " . $data_ep[$_SESSION['login']['id']]->dep_id;
                                            // }
                                            $qr = "";
                                        } else {
                                            $qr = "";
                                        }

                                        $date = date('Y-m-d', time());
                                        $today = strtotime($date);
                                        $db_newfeed = new db_query("SELECT * FROM new_feed INNER JOIN events ON new_feed.new_id = events.id_new WHERE (new_feed.new_type = 3 OR new_feed.new_type = 4) AND (new_feed.position = 0 $qr) AND events.time >= $today AND events.time <= $today + 86400  AND new_feed.id_company = " . $_SESSION['login']['id_com']);
                                        while ($row_newfeed = mysql_fetch_array($db_newfeed->result)) {
                                            if ($row_newfeed['new_type'] == 3) {
                                                include '../includes/remind/sk_noi_bo.php';
                                            } else if ($row_newfeed['new_type'] == 4) {
                                                include '../includes/remind/sk_doi_ngoai.php';
                                            }
                                        }

                                        foreach ($data_ep as $key => $value) {
                                            $birth_str = strtotime($value['ep_birth_day']);
                                            if (date('d/M', $birth_str) == date('d/M')) {
                                                include '../includes/remind/birthday.php';
                                            }
                                        }

                                        $db_calendar = new db_query("SELECT * FROM update_calendar WHERE id_company = " . $_SESSION['login']['id_com'] . " AND id_user = " . $_SESSION['login']['id'] . " AND `time` >= $today AND `time` <= $today + 86400 AND remind = 1");
                                        while ($row_c = mysql_fetch_array($db_calendar->result)) {
                                            if ($row_c['type'] == 1) {
                                                $str = "Thư từ CEO";
                                            } else if ($row_c['type'] == 2) {
                                                $str = "Tầm nhìn - sứ mệnh";
                                            } else if ($row_c['type'] == 3) {
                                                $str = "giá trị cốt lõi - mục tiêu chiến lược";
                                            } else if ($row_c['type'] == 4) {
                                                $str = "nguyên tắc làm việc";
                                            }
                                        ?>
                                            <li class="mau">
                                                <div class="tren">
                                                    <div class="caidat-info">
                                                        <div class="img">
                                                            <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path class="nen" d="M17.9472 13.5858C17.7816 13.7515 17.5645 13.8343 17.3474 13.8343C17.1306 13.8343 16.9135 13.7515 16.7479 13.5858C16.4169 13.2548 16.4169 12.7178 16.7479 12.3868L19.2886 9.84611C18.7242 9.4959 18.0591 9.29297 17.3474 9.29297C15.3111 9.29297 13.6543 10.95 13.6543 12.9863C13.6543 15.0227 15.3111 16.6795 17.3474 16.6795C19.384 16.6795 21.0406 15.0227 21.0406 12.9863C21.0406 12.2746 20.8379 11.6098 20.4877 11.0454L17.9472 13.5858Z" fill="blue" />
                                                                <path class="nen" d="M25.6339 0.474609H3.83625C1.86635 0.474609 0.263672 2.07729 0.263672 4.04719V23.1201C0.263672 24.7979 1.42649 26.2085 2.98832 26.59C8.31704 26.753 6.79989 26.6936 8.31704 26.6927C9.11322 26.6923 8.743 26.4779 8.743 26.4779C8.743 26.4779 7.52763 26.4213 7.8668 26.6927H8.31704H21.1528C26.4365 26.6757 25.012 26.5903 26.4816 26.5903C27.1937 26.5903 25.843 25.1212 25.843 25.1212C25.843 25.1212 24.5993 25.9477 26.4816 26.5903C28.0434 26.2085 29.2062 24.7979 29.2062 23.1201V4.04719C29.2064 2.07729 27.6038 0.474609 25.6339 0.474609ZM25.5736 20.8495C25.5736 22.0682 24.5819 23.0596 23.3632 23.0596H7.01511C5.79621 23.0596 4.80475 22.0682 4.80475 20.8495V19.4268H3.83625C3.3679 19.4268 2.98832 19.0472 2.98832 18.5789C2.98832 18.1105 3.3679 17.7309 3.83625 17.7309H4.80475V9.4362H3.83625C3.3679 9.4362 2.98832 9.05661 2.98832 8.58826C2.98832 8.12013 3.3679 7.74033 3.83625 7.74033H4.80475V6.31784C4.80475 5.09893 5.79621 4.10747 7.01511 4.10747H23.3632C24.5819 4.10747 25.5736 5.09893 25.5736 6.31784V20.8495Z" fill="blue" />
                                                                <path class="nen" d="M23.2493 5.6748H6.90122C6.61747 5.6748 6.38672 5.90578 6.38672 6.18931V7.61202H7.35522C7.82357 7.61202 8.20315 7.9916 8.20315 8.45995C8.20315 8.92808 7.82357 9.30789 7.35522 9.30789H6.38672V17.6024H7.35522C7.82357 17.6024 8.20315 17.9822 8.20315 18.4503C8.20315 18.9187 7.82357 19.2983 7.35522 19.2983H6.38672V20.721C6.38672 21.0047 6.61747 21.2355 6.90122 21.2355H23.2493C23.5331 21.2355 23.7638 21.0045 23.7638 20.721V6.18931C23.7638 5.90556 23.5331 5.6748 23.2493 5.6748ZM17.3458 18.39C14.3743 18.39 11.9568 15.9725 11.9568 13.001C11.9568 10.0295 14.3743 7.61202 17.3458 7.61202C18.8147 7.61202 20.1477 8.2027 21.1207 9.15906C21.1326 9.16966 21.1447 9.17959 21.156 9.19085C21.1672 9.20212 21.1774 9.21426 21.1878 9.22618C22.1441 10.1991 22.735 11.5324 22.735 13.001C22.7348 15.9725 20.3173 18.39 17.3458 18.39Z" fill="blue" />
                                                            </svg>
                                                        </div>
                                                        <div class="cont v_notify_tren">
                                                            <p>[Lịch cập nhật] </p>
                                                            <p><span class="name">Hôm nay là thời gian cập nhật <?= $str ?></p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="duoi">
                                                    <div class="ngay">
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </li> -->
                        <li id="ring" class="ul_pp_menu">
                            <img class="mb show_pp_menu" src="../img/icon_mb2.png" />
                            <img class="mb_an show_pp_menu" src="../img/caidatnhanvien/ring.png">
                            <!-- <span class="num">2</span> -->
                            <div class="popup" id="popup-thongbao">
                                <div class="caidat-header">
                                    <div class="cont caidat-header-cont">
                                        <p>Thông báo</p>
                                    </div>
                                    <div class="img">
                                        <img class="thoat" src="../img/icon_x.png">
                                    </div>
                                </div>
                                <div class="caidat-body">
                                    <ul class="thongbao">
                                        <?php
                                        $db_notify = new db_query("SELECT * FROM notify WHERE (id_company = " . $arr_com->com_id . " AND `type` <= 6) OR (`invited_users` = ". $_SESSION['login']['id'] ." AND `type` >=  7) ORDER BY id DESC");
                                        while ($row_notify = mysql_fetch_array($db_notify->result)) {
                                            if ($row_notify['user_type'] == 1) {
                                                $name_notify = $arr_com->com_name;
                                            } else {
                                                $name_notify = $data_ep[$row_notify['id_user']]->ep_name;
                                            }
                                            if ($row_notify['type'] == 1) {
                                                include '../includes/notify/core_value.php';
                                            } else if ($row_notify['type'] == 2) {
                                                include '../includes/notify/target.php';
                                            } else if ($row_notify['type'] == 3) {
                                                if ($row_notify['id_user_tag'] == $_SESSION['login']['id']) {
                                                    include '../includes/notify/birthday.php';
                                                }
                                                include '../includes/notify/birthday.php';
                                            } else if ($row_notify['type'] == 4) {
                                                include '../includes/notify/working_rules.php';
                                            } else if ($row_notify['type'] == 5) {
                                                include '../includes/notify/vision_mission.php';
                                            } else if ($row_notify['type'] == 6) {
                                                include '../includes/notify/mail_from_ceo.php';
                                            }else if ($row_notify['type'] == 7) {
                                                include '../includes/notify/invite_group.php';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li id="v_header_menu" class="ul_pp_menu">
                            <div><img class="v_header_avatar" src="<?= $_SESSION['login']['logo'] ?>" onerror='this.onerror=null;this.src="../img/logo_com.png";' alt="Ảnh lỗi"></div>
                            <!-- <div class="v_header_user_name"><?= $_SESSION['login']['name'] ?></div>
                            <div><img class="v_header_border" src="../img/v_border_right.svg" alt="Ảnh lỗi"></div>
                            <div class="v_header_user_id">ID: <?= $_SESSION['login']['id'] ?></div> -->
                            <div><img class="v_header_drop_down" src="../img/v_header_dropdown.svg" alt="Ảnh lỗi"></div>
                        </li>
                        <li id="caidat" class="ul_pp_menu">
                            <img class="mb show_pp_menu" src="../img/icon_mb1.png" />
                        </li>
                        <li class="v_header_popup_menu">
                            <?php
                            if ($_SESSION['login']['user_type'] == 2) {
                            ?>
                            <div class="ep_info2">
                                <a href="/trang-ca-nhan.html" class="ep_info_detail">
                                    <img class="ep_info_detail_avt" src="<?=$_SESSION['login']['logo']?>" alt="Ảnh lỗi">
                                    <span class="ep_sb_name"><?=$_SESSION['login']['name']?></span>
                                </a>
                                <a href="/page-ban-be.html" class="ep_info_detail">
                                    <img src="../img/ep_icon_friend.svg" alt="Ảnh lỗi">
                                    <span class="ep_sb_name">Bạn bè</span>
                                </a>
                                <a href="/nhom.html" class="ep_info_detail">
                                    <img src="../img/ep_icon_group.svg" alt="Ảnh lỗi">
                                    <span class="ep_sb_name">Nhóm</span>
                                </a>
                                <a href="/bo-suu-tap.html" class="ep_info_detail">
                                    <img src="../img/ep_icon_save.svg" alt="Ảnh lỗi">
                                    <span class="ep_sb_name">Đã lưu</span>
                                </a>
                                <a href="/truyen-thong-noi-bo-su-kien.html" class="ep_info_detail">
                                    <img src="../img/ep_info_event.svg" alt="Ảnh lỗi">
                                    <span class="ep_sb_name">Sự kiện</span>
                                </a>
                                <a class="ep_info_detail">
                                    <img src="../img/ep_info_mess.svg" alt="Ảnh lỗi">
                                    <span class="ep_sb_name">Tin nhắn</span>
                                </a>
                                <a href="/ky-niem.html" class="ep_info_detail">
                                    <img src="../img/ep_info_kn.svg" alt="Ảnh lỗi">
                                    <span class="ep_sb_name">Kỷ niệm</span>
                                </a>
                            </div>
                            <?php
                             } 
                            ?>
                            <img class="v_header_popup_menu_avatar" src="<?= $_SESSION['login']['logo'] ?>" alt="Ảnh lỗi">
                            <div class="v_header_popup_menu_name"><?= $_SESSION['login']['name'] ?></div>
                            <div class="v_header_popup_menu_id">ID: <?= $_SESSION['login']['id'] ?></div>
                            <a class="v_header_popup_menu_link" href="https://chamcong.timviec365.vn/quan-ly-cong-ty/thong-tin-tai-khoan.html" target="_blank">
                                <div class="v_header_popup_menu_link_icon">
                                    <img src="../img/v_header_info_acc.svg" alt="Ảnh lỗi">
                                </div>
                                <span class="v_header_popup_span">Thông tin tài khoản</span>
                                <div class="v_header_popup_menu_dropright">
                                    <img src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
                                </div>
                            </a>
                            <a class="v_header_popup_menu_link" href="https://chamcong.timviec365.vn/quan-ly-cong-ty/danh-gia.html" target="_blank">
                                <div class="v_header_popup_menu_link_icon">
                                    <img src="../img/v_header_menu_danhgia.svg" alt="Ảnh lỗi">
                                </div>
                                <span class="v_header_popup_span">Đánh giá</span>
                                <div class="v_header_popup_menu_dropright">
                                    <img src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
                                </div>
                            </a>
                            <a class="v_header_popup_menu_link" href="https://chamcong.timviec365.vn/quan-ly-cong-ty/gui-loi.html" target="_blank">
                                <div class="v_header_popup_menu_link_icon">
                                    <img src="../img/v_header_menu_error.svg" alt="Ảnh lỗi">
                                </div>
                                <span class="v_header_popup_span">Báo lỗi</span>
                                <div class="v_header_popup_menu_dropright">
                                    <img src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
                                </div>
                            </a>
                            <a class="v_header_popup_menu_link" href="/huong-dan.html" target="_blank">
                                <div class="v_header_popup_menu_link_icon">
                                    <img src="../img/v_header_menu_huongdan.svg" alt="Ảnh lỗi">
                                </div>
                                <span class="v_header_popup_span">Hướng dẫn</span>
                                <div class="v_header_popup_menu_dropright">
                                    <img src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
                                </div>
                            </a>
                            <div class="v_header_popup_menu_link" id="dangxuat">
                                <div class="v_header_popup_menu_link_icon">
                                    <img src="../img/v_header_menu_logout.svg" alt="Ảnh lỗi">
                                </div>
                                <span class="v_header_popup_span">Đăng xuất</span>
                                <div class="v_header_popup_menu_dropright">
                                    <img src="../img/v_header_dropright.svg" alt="Ảnh lỗi">
                                </div>
                            </div>
                        </li>
                        <li id="individual">
                            <img class="mb show_pp_menu" src="../img/ca-nhan.svg" />
                        </li>
                    </ul>
                </div>
            </div>
            <!-- chuyen vao -->
            <div class="popup" id="popup-dangxuat">
                <div class="popup-header">
                    <div class="img">
                        <img src="../img/logout.png">
                    </div>
                    <div class="cont v_popup_logout">
                        <p>Đăng xuất</p>
                        <p>Bạn chắc chắn muốn đăng xuất?</p>
                    </div>
                </div>
                <div class="popup-body">
                    <button class="btn" id="btn-huydx">Hủy</button>
                    <button class="btn" id="btn-dangxuat">Đăng xuất</button>
                </div>
            </div>
            <!-- end popup -->
            <?php }else{ ?>
                <div class="container_phai">
                    <div class="phai">
                        <ul class="menu">
                            <li class="nav-hd-menu-list-item v_header_singup">
                                <a rel="nofollow" href="https://quanlychung.timviec365.vn/lua-chon-dang-ky.html" class="nv-nav-hd-menu-item-link">Đăng ký</a>
                            </li>
                            <li class="nav-hd-menu-list-item v_header_login">
                                <a rel="nofollow" href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html" class="nv-nav-hd-menu-item-link">Đăng nhập</a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
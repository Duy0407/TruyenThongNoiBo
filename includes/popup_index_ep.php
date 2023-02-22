<!-- popup đăng bài -->
<div class="popup_post popup_post_new">
    <form class="form_popup_post_new" onsubmit="return false;" data-update=0 data-ep_id=<?=(isset($type_edit)&&$type_edit!=0)?$ep_id:0?> data-ep_type=<?=(isset($type_edit)&&$type_edit!=0)?$ep_type:""?>>
        <div class="popup_post_new_header">
            <p class="title_post_new">Đăng tin mới</p>
            <img class="hide_popup" src="../img/hide_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="popup_post_new_body">
            <div class="popup_post_new_body1">
                <img class="avt_user-item" src="<?= $_SESSION['login']['logo'] ?>" alt="Ảnh lỗi">
                <div class="info_post_new">
                    <p class="info_post_username"><?= $_SESSION['login']['name'] ?> <span class="info_post_feel"></span><span class="info_post_with"></span><span class="info_post_at"></span></p>
                    <button class="btn_upload_regime" type="button">
                        <img src="../img/gis_earth-australia-o.svg" alt="Ảnh lỗi">
                        Công khai
                        <img class="ls_dropdown_ep_index" src="../img/ls_dropdown_ep_index.svg" alt="Ảnh lỗi">
                    </button>
                    <p class="ep_post_time">08:32 15/11/2022<img class="div_width_hight_icon icon_regime" src="../img/gis_earth-australia-o(2).svg" alt="Ảnh lỗi"></p>
                </div>
            </div>
            <!-- <div contenteditable="true" cvo-placeholder="Hãy viết cảm nghĩ của bạn" class="form_post_new_content"></div> -->
            <textarea placeholder="Hãy viết cảm nghĩ của bạn" class="form_post_new_content"></textarea>
            <div class="upload_file">
                <div class="upload_file_item" style="display: block;">
                    <img class="upload_file_item_icon" src="../img/post_new_upload_file.svg" alt="Ảnh lỗi">
                    <p class="upload_file_item_title">Thêm ảnh/video/tệp</p>
                </div>
                <img class="close_upload_file" src="/img/nv_close_uploadfile.svg" alt="Ảnh lỗi">
            </div>

            <!-- Thăm dò ý kiến -->
            <div class="poll">
                <div class="poll_padding">

                    <div class="poll_head">
                        <div class="poll_head_text">Thêm cuộc thăm dò ý kiến</div>
                        <div class="poll_head_img close_pp_poll"><img src="../img/image_new/x_17.svg" alt=""></div>
                    </div>

                    <div class="poll_main">
                        <!-- Nhập lựa chọn -->
                        <div class="poll_main_option">
                            <div class="poll_main_option_one">
                                
                            </div>
                        </div>
                        <!-- Thêm lựa chọn -->
                        <div class="add_option_pol">
                            <div class="add_option_one click_poll">
                                <div class="add_option_one_icon">+</div>
                                <div class="add_option_one_text">Thêm lựa chọn</div>
                            </div>

                            <div class="add_option_two click_multiple_answers">
                                <div class="setting_poil_ic1">
                                    <img src="../img/image_new/setting_poil.svg" alt="">
                                </div>
                                <div class="setting_poil_ic2">
                                    <img src="../img/image_new/down_poil.svg" alt="">
                                </div>
                            </div>

                            <div class="abs_option">
                                <div class="abs_option_padding">
                                    <div class="abs_option_one">
                                        <div class="abs_option_one_check">
                                            <input type="checkbox" name="" value="">
                                        </div>
                                        <div class="abs_option_one_text">Cho phép mọi người chọn nhiều câu trả lời</div>
                                    </div>
                                    <div class="abs_option_one">
                                        <div class="abs_option_one_check">
                                            <input type="checkbox" name="" value="">
                                        </div>
                                        <div class="abs_option_one_text">Cho phép mọi người chọn nhiều câu trả lời</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="add_new_post">
                <?if (isset($_GET['id'])) {?>
                    <div class="add_new_post_icon add_new_post_icon_poll click_show_poll">
                        <img src="../img/image_new/y_kien.svg" alt="Ảnh lỗi">
                    </div>
                <?}?>
                <div class="add_new_post_icon add_new_post_location">
                    <img src="/img/nv_location.svg" alt="Ảnh lỗi">
                </div>
                <div class="add_new_post_icon add_new_post_icon_feel">
                    <img src="/img/nv_icon_post_footer_active.svg" alt="Ảnh lỗi">
                </div>
                <div class="add_new_post_icon add_new_post_mention">
                    <img src="/img/nv_post_feel_user_tag.svg" alt="Ảnh lỗi">
                </div>
                <div class="add_new_post_icon add_new_post_icon_file">
                    <img src="/img/nv_upload_file.svg" alt="Ảnh lỗi">
                </div>
                

                <p class="add_new_post_p">Thêm vào bài viết</p>
            </div>
            <input class="upload_file_post_new" type="file" multiple hidden>
            <input class="upload_file_post_new2" type="file" multiple hidden>

            <div class="post_new_action">
                <button class="post_new_btn post_new_btn_submit">Đăng</button>
                <?if (isset($_GET['id'])) {
                    if (array_key_exists($my_id."-".($my_type%2),$administrators_censor)){?>
                    <div class="post_calendar click_show_post_calendar" data-date="" data-time="">
                        <div class="post_calendar_img">
                            <img src="../img/image_new/post_calendar.svg" alt="">
                        </div>
                    </div>
                <?}}?>
            </div>
        </div>
    </form>
</div>

<!-- popup chọn chế độ -->
<div class="popup_regime">
    <div class="popup_regime_detail">
        <div class="popup_regime_header">
            Chế độ
            <img class="turnoff_popup_regime" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="popup_regime_body">
            <p class="popup_regime_body_title">Ai có thể xem bài viết của bạn?</p>
            <p class="popup_regime_body_title2">Bài viết của bạn sẽ hiển thị ở Bảng tin, trang cá nhân và kết quả tìm
                kiếm.</p>
            <div class="popup_regime_list_item">
                <button class="popup_regime_item popup_regime_item1">
                    <div class="popup_regime_item_icon">
                        <img src="../img/gis_earth-australia-o(2).svg" alt="Ảnh lỗi">
                    </div>
                    <div class="popup_regime_item_detail">
                        <p class="popup_regime_item_text">Công khai</p>
                    </div>
                    <input class="regime_radio" type="radio" name="regime_select" value=0 checked>
                </button>
                <button class="popup_regime_item popup_regime_item1">
                    <div class="popup_regime_item_icon">
                        <img src="../img/group(1)1.svg" alt="Ảnh lỗi">
                    </div>
                    <div class="popup_regime_item_detail">
                        <p class="popup_regime_item_text">Bạn bè</p>
                    </div>
                    <input class="regime_radio" type="radio" name="regime_select" value=2>
                </button>
                <button class="popup_regime_item popup_regime_item2 setting_private-card1">
                    <div class="popup_regime_item_icon">
                        <img src="../img/group(1)2.svg" alt="Ảnh lỗi">
                    </div>
                    <div class="popup_regime_item_detail">
                        <p class="popup_regime_item_text2">Bạn bè ngoại trừ...</p>
                        <p class="popup_regime_item_text3">Bạn bè; Ngoại trừ: <span class="list_friends_except"></span> </p>
                    </div>
                    <img class="regime_radio" src="../img/ic_sharp-navigate-next.svg" alt="ic_sharp-navigate-next.svg">
                    <input class="regime_radio" type="radio" name="regime_select" hidden value=3>
                </button>
                <button class="popup_regime_item popup_regime_item1">
                    <div class="popup_regime_item_icon">
                        <img src="../img/bx_bxs-lock-alt2.svg" alt="Ảnh lỗi">
                    </div>
                    <div class="popup_regime_item_detail">
                        <p class="popup_regime_item_text">Chỉ mình tôi</p>
                    </div>
                    <input class="regime_radio" type="radio" name="regime_select" value=1>
                </button>
                <button class="popup_regime_item popup_regime_item2 setting_private-card2">
                    <div class="popup_regime_item_icon">
                        <img src="../img/group(1)3.svg" alt="Ảnh lỗi">
                    </div>
                    <div class="popup_regime_item_detail">
                        <p class="popup_regime_item_text2">Bạn bè cụ thể</p>
                        <p class="popup_regime_item_text3">Hiển thị với một số bạn bè <span class="list_friends_expect"></span> </p>
                    </div>
                    <img class="regime_radio" src="../img/ic_sharp-navigate-next.svg" alt="ic_sharp-navigate-next.svg">
                    <input class="regime_radio" type="radio" name="regime_select" hidden value=4>
                </button>
            </div>
            <!-- <div class="popup_regime_btn">
                <button class="popup_regime_cancel">Hủy</button>
                <button class="popup_regime_save">Lưu</button>
            </div> -->
        </div>
    </div>
</div>

<div class="p_feel">
    <div class="p_feel_detail">
        <div class="p_feel_header">
            Cảm xúc/Hoạt động
            <img class="turnoff_popup_feel" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="p_feel_body">
            <div>
                <button class="p_feel_text">Cảm xúc</button>
                <button class="p_active_text">Hoạt động</button>
                <div class="p_feel_block">
                    <input type="text" class="p_feel_search" placeholder="Tìm kiếm">
                    <img class="p_feel_icon" src="../img/Vector_feel_search.svg" alt="Ảnh lỗi">
                </div>
                <div class="feel_list_item">
                    <?php
          foreach ($data_feel as $key => $value) {
          ?>
                    <button class="feel_item" data-feel=<?=$key?>>
                        <img class="feel_icon" src="<?= $value['icon'] ?>" alt="Ảnh lỗi">
                        <p class="fell_name"><?= $value['text'] ?></p>
                    </button>
                    <?php
          }
          ?>
                </div>
                <div class="activity_list_item">
                    <?php
          foreach ($data_activity as $key => $value) {
          ?>
                    <button class="activity_item" data-activity=<?=$key?>>
                        <img class="feel_icon" src="<?= $value['icon'] ?>" alt="Ảnh lỗi">
                        <?= $value['text'] ?>
                    </button>
                    <?php
          }
          ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- popup gắn thẻ -->
<div class="name_metion modal">
    <div class="name_metion_content">
        <div class="popup_post_new_header">
            <p class="title_post_new">Gắn thẻ người khác</p>
            <img data-dimiss="modal" src="../img/hide_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="name_metion_detail">
            <div class="name_metion_search_n_btn">
                <div class="name_metion_search">
                    <input class="name_metion_input" type="text" placeholder="Tìm kiếm tên bạn bè">
                    <img class="name_metion_icon" src="../img/Vector_feel_search.svg" alt="Ảnh lỗi">
                </div>
                <button class="name_mention_btn">Xong</button>
            </div>
            <div class="name_metion_body"> 
                <?php if (isset($id_group)){
                    foreach ($my_friend as $value) {
                        if (array_key_exists($value['id365']."-".($value['type365']%2),$arr_mem_friend)){ ?>
                        <button class="name_mention_item" data-id="<?=$value['id365']?>" data-id_chat="<?=$value['id']?>" data-type365="<?=$value['type365']?>">
                            <img class="name_metion_avt" src="<?=$value['avatarUser']?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                            <?=$value['userName']?>
                            <input class="name_mention_checkbox" name="name_mention_checkbox" value="<?=$value['id365']?>" data-id_chat="<?=$value['id']?>" data-type365="<?=$value['type365']?>" type="checkbox" hidden>
                        </button>
                        <?php }
                    } 
                }else{
                    foreach ($my_friend as $value) { ?>
                    <button class="name_mention_item" data-id="<?=$value['id365']?>" data-id_chat="<?=$value['id']?>" data-type365="<?=$value['type365']?>">
                        <img class="name_metion_avt" src="<?=$value['avatarUser']?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                        <?=$value['userName']?>
                        <input class="name_mention_checkbox" name="name_mention_checkbox" value="<?=$value['id365']?>" data-id_chat="<?=$value['id']?>" data-type365="<?=$value['type365']?>" type="checkbox" hidden>
                    </button>
                    <?php
                } } ?>
            </div>
            <div class="mention_detail_box">
                <p class="mention_detail_box_title">Đã gắn thẻ</p>
                <div class="mention_detail_box_list_item">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- popup tìm kiếm vị trí -->
<div class="popup_location modal">
    <div class="popup_location_content">
        <div class="popup_post_new_header">
            <p class="title_post_new">Tìm kiếm vị trí</p>
            <img data-dimiss="modal" src="../img/hide_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="name_metion_detail">
            <div class="name_metion_search">
                <input class="name_metion_input" type="text" placeholder="Bạn đang ở đâu">
                <img class="name_metion_icon" src="../img/Vector_feel_search.svg" alt="Ảnh lỗi">
            </div>
            <div class="name_metion_body">
                <?php $sql = "SELECT a.cit_id AS qh_id, a.cit_name AS qh_name, b.cit_id, b.cit_name FROM `city2` AS a JOIN city2 AS b ON b.cit_id = a.cit_parent";
                $db_location = new db_query($sql);

        while ($row = mysql_fetch_array($db_location->result)) {
        ?>
                <button class="at_location_item">
                    <img class="location_img" src="/img/nv_location.svg" alt="Ảnh lỗi">
                    <?=$row["qh_name"]?>, <?=$row["cit_name"]?>
                    <input class="at_location_checkbox" name="at_location_checkbox" data-qh="<?=$row["qh_id"]?>" data-cit="<?=$row["cit_id"]?>" type="radio" hidden>
                </button>
                <?php
        }
        ?>
            </div>
        </div>
    </div>
</div>
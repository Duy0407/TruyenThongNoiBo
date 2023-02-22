<div id="nhantin">
    <div class="form-nhantin">
        <div class="nhantin-header">
            <div class="cont">
                <p>Nguyễn Văn Nam</p>
            </div>
            <div class="img">
                <div class="img0 nut-doiten_1">
                    <img src="../img/icon_but.png">
                </div>
                <div class="img1">
                    <a href="tin-nhan/1.html"> <img src="../img/icon_dan.png"></a>
                </div>
                <div class="img2 nutattinnhan">
                    <img class="hide_tn" src="../img/icon_xx.png">
                </div>
            </div>
        </div>
        <div class="nhantin-body">
            <ul class="tinnhans">
                <li class="tinnhan">
                    <p>xin chào</p>
                </li>
            </ul>
        </div>
        <div class="nhantin-footer">
            <div class="container-nt-img">
                <div class="img">
                    <img src="../img/nt_01.png">
                </div>
                <div class="img">
                    <img src="../img/nt_02.png">
                </div>
                <div class="img">
                    <img src="../img/nt_03.png">
                </div>
                <div class="img">
                    <img src="../img/nt_04.png">
                </div>
            </div>
            <div class="sendmes">
                <span class="see_icon"></span>
                <input type="text" name="" placeholder="Nhập tin nhắn">
                <span class="see_icon2"></span>
            </div>
        </div>
    </div>
</div>
<div class="v_datbietdanh" id="v_datbietdanh">
    <div class="v_datbietdanh_maxwidth">
        <div class="v_datbietdanh_heading">
            <div class="v_datbietdanh_doiten">Đổi tên</div>
            <div class="v_datbietdanh_cancel"><img src="../img/v_datbietdanh_cancel.svg" alt="Ảnh lỗi"></div>
        </div>
        <div class="v_datbietdanh_action">
            <div class="v_datbietdanh_avatar"><img src="../img/v_avatar.png" alt="Ảnh lỗi"></div>
            <div class="v_datbietdanh_input"><input class="v_datbietdanh_input_de" placeholder="Nhập biệt danh" type="text"></div>
            <div class="v_datbietdanh_check"><img src="../img/v_check.svg" alt="Ảnh lỗi"></div>
        </div>
    </div>
</div>

<div class="cd-popup model_560 " id="model_suadangtin" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tải ảnh/video</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl" id="close_post_newfeed">
            </div>
            <div class="modal_body_post_newfeed">
                <div class="model_top_post_newfeed">
                    <div class="img_model_top">
                        <img src="<?= $_SESSION['login']['logo'] ?>" class="img_model_top_item" alt="avatar">
                    </div>
                    <div class="text_model_top">
                        <div class="model_user_name"><?= $_SESSION['login']['name']; ?></div>
                        <div class="model_com_name"><?= $arr_com->com_name; ?></div>
                    </div>
                </div>
                <form id="form_popup_dangtin" class="model_center_post_newfeed" data-type="0">
                    <div class="model_center_post_newfeed_item">
                        <input type="text" class="title_post_newfeed" id="title_post_newfeed_2" name="" id="" autocomplete="Off" placeholder="Đặt câu hỏi của bạn">
                    </div>
                    <div class="model_center_post_newfeed_item">
                        <div class="view_img" id="view_img">
                            <div class="view_img_item1">
                                <label for="open_file_newfeed" class="label_file">
                                    <img src="../img/open_file_nf.svg" alt="openfile">
                                    <p class="text_image_up_file">Thêm ảnh/video/tệp</p>
                                </label>
                                <div class="close_file_newfeed">
                                    <img src="../img/close_file_newfeed.svg" alt="img close">
                                </div>
                            </div>
                        </div>
                        <input type="file" name="" id="open_file_newfeed3" multiple hidden>
                    </div>
                    <div class="model_center_post_newfeed_item" id="view_file_nf"></div>
                    <div class="model_center_post_newfeed_item">
                        <div class="option_add_new_feed">
                            <select name="" id="select_list_ep12" multiple>
                                <?
                                foreach ($arr_ep as $value) {
                                    ?>
                                    <option value="<?= $value['ep_id'] ?>"><?= $value['ep_name'] ?></option>
                                    <?
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="model_center_post_newfeed_item post_newfeed_custom">
                        <button class="model_center_post_newfeed_btn" id="bth_cancel_model_newfeed">Hủy</button>
                        <button class="model_center_post_newfeed_btn model_center_post_newfeed_btn_custom">
                            <span class="answer_submit">Đăng</span>
                            <img class="v_answer_loading" src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
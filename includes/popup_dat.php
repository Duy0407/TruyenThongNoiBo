<div class="cd-popup model_560 " id="model_suatin">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tải ảnh/video/tệp</h4>
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
                <form id="form_popup_suadangtin" class="model_center_post_newfeed" data-type="0">
                    <div class="model_center_post_newfeed_item">
                        <input type="text" class="title_post_newfeed" id="title_post_newfeed_3" autocomplete="Off" name="" placeholder="Cập nhật công việc với các đồng nghiệp của bạn">
                    </div>
                    <div class="model_center_post_newfeed_item">
                        <div class="view_img" id="view_img">
                            <div class="view_img_item1">
                                <label class="label_file" id="label_file2">
                                    <img src="../img/open_file_nf.svg" alt="openfile">
                                    <p class="text_image_up_file">Thêm ảnh/video/tệp</p>
                                </label>
                                <div class="close_file_newfeed">
                                    <img src="../img/close_file_newfeed.svg" alt="img close">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="file" name="" id="open_file_newfeed3" multiple hidden>
                    <div class="model_center_post_newfeed_item" id="view_file_nf"></div>
                    <div class="model_center_post_newfeed_item" id="view_list_ep2">
                        <select name="" id="select_list_ep2" class="select_list_ep2" multiple>
                            <?
                            foreach ($arr_ep as $value) {
                            ?>
                                <option value="<?= $value['ep_id'] ?>"><?= $value['ep_name'] ?></option>
                            <?
                            }
                            ?>
                        </select>
                    </div>
                    <div class="model_center_post_newfeed_item">
                        <div class="option_add_new_feed">
                            <div>Thêm vào bài viết</div>
                            <div>
                                <label class="upload_file_add3">
                                    <img src="../img/icon_anh.png" class="custom_img_option">
                                </label>
                                <img src="../img/icon_nhac.png" id="tag_ep_newfeed2" class="custom_img_option">
                                <label class="upload_file_add3">
                                    <img src="../img/up_file.svg" class="custom_img_option">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="model_center_post_newfeed_item post_newfeed_custom">
                        <button class="model_center_post_newfeed_btn" id="bth_cancel_model_newfeed" type="button">Hủy</button>
                        <button class="model_center_post_newfeed_btn model_center_post_newfeed_btn_custom">
                            <span class="update_work_span2">Đăng</span>
                            <img class="update_work_loading2" src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="v_check_ring">
    <div class="v_check_ring_detail">
        <img class="v_check_ring_detail_img" src="../img/check_ring.png" alt="Ảnh lỗi">
        <p class="v_check_ring_content" id="v_check_ring_content"></p>
    </div>
</div>
<div class="cd-popup  model_560 " id="model_taothaoluan" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo thảo luận</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="model_taothaoluan" id="v_model_taothaoluan">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tiêu đề bài thảo luận<span class="cr_red">*</span></label>
                            <input type="text" name="txt_ten" class="new_title" placeholder="Nhập tên tiêu đề thảo luận">
                            <span class="error"></span>
                        </div>
                        <div class="form_group form_group_content_taothaoluan">
                            <label for="" class="name">Nội dung thảo luận chi tiết<span class="cr_red">*</span></label>
                            <textarea class="textarea_cheditor content" id="content_taothaoluan" name="txt_noidung" placeholder="Nhập nội dung thảo luận"></textarea>
                            <span class="error"></span>
                        </div>
                        <div class="form_group form_group_position">
                            <label for="" class="name">Vị trí đăng bài <span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s position" name="select_quyen">
                                    <option value="0">Toàn công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="form_group form_group_id_user_tags">
                            <label class="name">Gắn thẻ thành viên</label>
                            <div class="form_select2">
                                <select class="select2_muti_tv id_user_tags" multiple name="select2_tv">
                                    <?php
                                    foreach ($data_ep as $ep) {
                                    ?>
                                        <option value="<?= $ep['ep_id'] ?>"><?= $ep['ep_name'] ?> (<?= $ep['dep_name'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="form_group form_group_discuss_mode">
                            <label for="" class="name">Quyền riêng tư<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s discuss_mode" name="select_quyen">
                                    <option value="1">Công khai</option>
                                    <option value="2">Riêng tư</option>
                                </select>
                            </div>
                            <span class="error"></span>
                        </div>
                        <!-- input_xanh -->
                        <div class="form_group v_add_file_image_discuss2">
                            <label for="" class="name mode">Chọn tệp đính kèm</label>
                            <label for="input_file1">
                                <input type="file" name="file_taitep" class="custom-file-input-discuss file" hidden multiple>
                            </label>
                            <div class="block_name_file_discuss" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_discuss">Tải lên tệp đính kèm</div>
                            </div>
                        </div>

                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_taothaoluan" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Tạo thảo luận</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal cd-popup  model_560 " id="model_chinhsuathaoluan">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa thảo luận</h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="model_chinhsuathaoluan">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tiêu đề bài thảo luận<span class="cr_red">*</span></label>
                            <input type="text" name="txt_ten" class="new_title" placeholder="Nhập tên tiêu đề thảo luận">
                            <span class="error"></span>
                        </div>
                        <div class="form_group form_group_content_taothaoluan">
                            <label for="" class="name">Nội dung thảo luận chi tiết<span class="cr_red">*</span></label>
                            <textarea class="textarea_cheditor content" id="content_chinhsuathaoluan1" name="txt_noidung" placeholder="Nhập nội dung thảo luận"></textarea>
                            <span class="error"></span>
                        </div>
                        <div class="form_group form_group_position">
                            <label for="" class="name">Vị trí đăng bài <span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s position" name="select_quyen">
                                    <option value="0">Toàn công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="form_group form_group_id_user_tags">
                            <label class="name">Gắn thẻ thành viên</label>
                            <div class="form_select2">
                                <select class="select2_muti_tv id_user_tags" multiple name="select2_tv">
                                    <?php
                                    foreach ($data_ep as $ep) {
                                    ?>
                                        <option value="<?= $ep['ep_id'] ?>"><?= $ep['ep_name'] ?> (<?= $ep['dep_name'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="form_group form_group_discuss_mode">
                            <label for="" class="name">Quyền riêng tư<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s discuss_mode" name="select_quyen">
                                    <option value="1">Công khai</option>
                                    <option value="2">Riêng tư</option>
                                </select>
                            </div>
                            <span class="error"></span>
                        </div>
                        <!-- input_xanh -->
                        <div class="form_group v_update_file_image_discuss1">
                            <label for="" class="name mode">Chọn tệp đính kèm</label>
                            <label for="input_file1">
                                <input type="file" name="file_taitep" class="custom-file-input-ud-discuss" hidden>
                            </label>
                            <div class="block_name_file_ud_discuss" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_ud_discuss">Tải lên tệp đính kèm</div>
                            </div>
                        </div>

                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Cập nhật</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                            <input type="hidden" class="new_id">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modol tao thao luan -->

<!-- modol xoa thành viên -->
<div class="cd-modal-del" id="xoa_thanhvien">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa thành viên</h4>
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc muốn xóa thành viên Lê Thị Thu?</b></p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_xoatatca" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modol xoa thành viên -->

<!-- popup-tạo tin nội bộ -->
<div class="cd-popup  model_560 " id="model_tinnoibo">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo tin nội bộ </h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_tinnoibo">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tiêu đề <span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_ten" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form_group">
                            <label class="name">Nội dung<span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_noidung" placeholder="Nhập nội dung">
                        </div>
                        <div class="form_group">
                            <label class="name">Ảnh bìa<span class="cr_red">*</span></label>
                            <input type="file" value="" name="file_taianh" placeholder="Tải ảnh lên">
                        </div>
                        <!-- input_xanh -->
                        <div class="form_group ">
                            <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                            <label for="input_file1">
                                <input type="file" name="file_taitep" class="custom-file-input" multiple>
                            </label>
                        </div>

                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Lưu thông tin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup-tạo tin nội bộ -->

<!-- popup-tạo tin nội bộ -->
<div class="modal cd-popup  model_560 " id="model_chinhsuatinnoibo">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa tin nội bộ </h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_chinhsuatinnoibo">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tiêu đề <span class="cr_red">*</span></label>
                            <input type="text" class="new_title" value="" name="txt_ten" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form_group">
                            <label class="name">Nội dung<span class="cr_red">*</span></label>
                            <textarea name="txt_noidung" class="content"></textarea>
                        </div>
                        <!-- input_xanh -->
                        <div class="form_group v_update_file_image_internal">
                            <label for="" class="name">Chọn tệp đính kèm</label>
                            <label for="input_file1" class="file02">
                                <input type="file" name="custom-file-input-internal-ud" class="custom-file-input-internal-ud" hidden multiple>
                            </label>
                            <div class="block_name_file_ud_internal" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_ud_internal">Tải lên tệp đính kèm</div>
                            </div>
                        </div>

                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Cập nhật</button>
                            <input type="hidden" class="new_id" value="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup-tạo tin nội bộ -->

<!-- popup tạo khen thưởng-->
<div class="cd-popup model_560" id="model_taokhenthuong" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo khen thưởng</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_taokhenthuong">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Thành viên được vinh danh<span class="cr_red">*</span></label>
                            <div class="form_select2">
                                <select class="select2_muti_tv v_select2_bonus id_user_tags" multiple name="select2_tv">
                                    <?php
                                    foreach ($data_ep as $ep) {
                                    ?>
                                        <option value="<?= $ep['ep_id'] ?>"><?= $ep['ep_name'] ?> (<?= $ep['dep_name'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group form_group_pos">
                            <label for="" class="name">Vị trí gửi tin khen thưởng<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s position" id="v_position_bonus" name="select_phongban">
                                    <option value="0">Toàn công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Lời nhắn cho người được khen thưởng<span class="cr_red">*</span></label>
                            <textarea name="txt_loinhan" class="content" id="v_bonus_msg" cols="3" rows="3" placeholder="Nhập lời nhắn"></textarea>
                        </div>
                        <div class="form_group v_add_file_image_bonus">
                            <label for="" class="name">Chọn tệp đính kèm</label>
                            <label for="input_file1">
                                <input type="file" id="v_bonus_file" name="file_taitep" class="custom-file-input-bonus" multiple hidden>
                            </label>
                            <div class="block_name_file_bonus" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_bonus">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_group loaikhenthuong">
                            <label for="" class="name">Loại hình vinh danh<span class="cr_red">*</span></label>
                            <div class="container-kt">
                                <div class="loai_1 loai" data-id_option="1">
                                    <div class="img">
                                        <img src="../img/loai_1.png">
                                    </div>
                                    <div class="cont">
                                        <p>Khen thưởng</p>
                                    </div>
                                </div>
                                <div class="loai_2 loai" data-id_option="2">
                                    <div class="img">
                                        <img src="../img/loai_2.png">
                                    </div>
                                    <div class="cont">
                                        <p>Nhân viên xuất sắc nhất tháng</p>
                                    </div>
                                </div>
                                <div class="loai_3 loai" data-id_option="3">
                                    <div class="img">
                                        <img src="../img/loai_3.png">
                                    </div>
                                    <div class="cont">
                                        <p>Nhân viên xuất sắc nhất quý</p>
                                    </div>
                                </div>
                                <div class="loai_4 loai" data-id_option="4">
                                    <div class="img">
                                        <img src="../img/loai_4.png">
                                    </div>
                                    <div class="cont">
                                        <p>Nhân viên xuất sắc nhất năm</p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="1" name="id_option" class="bonus_option">
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_taokhenthuong" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Tạo khen thưởng</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup tạo khen thưởng-->

<!-- chỉnh sửa khen thưởng-->
<div class="modal cd-popup model_560" id="model_chinhsuakhenthuong">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa khen thưởng</h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_chinhsuakhenthuong">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Thành viên được vinh danh<span class="cr_red">*</span></label>
                            <div class="form_select2">
                                <select class="select2_muti_tv v_select2_bonus id_user_tags" multiple name="select2_tv">
                                    <?php
                                    foreach ($data_ep as $ep) {
                                    ?>
                                        <option value="<?= $ep['ep_id'] ?>"><?= $ep['ep_name'] ?> (<?= $ep['dep_name'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Vị trí gửi tin khen thưởng<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s position" name="select_phongban">
                                    <option value="0">Toàn công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Lời nhắn cho người được khen thưởng<span class="cr_red">*</span></label>
                            <textarea name="txt_loinhan" class="content" id="v_bonus_msg" cols="3" rows="3" placeholder="Nhập lời nhắn"></textarea>
                        </div>
                        <div class="form_group v_update_file_image_bonus">
                            <label for="" class="name">Chọn tệp đính kèm</label>
                            <label for="input_file1" class="input_file1">
                                <input type="file" id="v_bonus_file" name="file_taitep" class="custom-file-input-bonus-ud" hidden multiple>
                            </label>
                            <div class="block_name_file_ud_bonus" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_ud_bonus">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_group loaikhenthuong">
                            <label for="" class="name">Loại hình vinh danh<span class="cr_red">*</span></label>
                            <div class="container-kt">
                                <div class="loai_1 loai" data-id_option="1">
                                    <div class="img">
                                        <img src="../img/loai_1.png">
                                    </div>
                                    <div class="cont">
                                        <p>Khen thưởng</p>
                                    </div>
                                </div>
                                <div class="loai_2 loai" data-id_option="2">
                                    <div class="img">
                                        <img src="../img/loai_2.png">
                                    </div>
                                    <div class="cont">
                                        <p>Nhân viên xuất sắc nhất tháng</p>
                                    </div>
                                </div>
                                <div class="loai_3 loai" data-id_option="3">
                                    <div class="img">
                                        <img src="../img/loai_3.png">
                                    </div>
                                    <div class="cont">
                                        <p>Nhân viên xuất sắc nhất quý</p>
                                    </div>
                                </div>
                                <div class="loai_4 loai" data-id_option="4">
                                    <div class="img">
                                        <img src="../img/loai_4.png">
                                    </div>
                                    <div class="cont">
                                        <p>Nhân viên xuất sắc nhất năm</p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_option" value="" class="bonus_option">
                            <input type="hidden" value="" class="new_id">
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Tạo khen thưởng</button>
                            <input type="hidden" value="" name="id_option" class="bonus_option">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end chỉnh sửa khen thưởng-->

<!-- popup tạo sự kiện-->
<div class="cd-popup model_taosukien" id="model_taosukien">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo sự kiện</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl an_cainay">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="form_group" id="nut-tsknb">
                            <div class="img">
                                <img src="../img/sk_1.png">
                            </div>
                            <div class="cont">
                                <p>Tạo sự kiện nội bộ</p>
                            </div>
                            <div class="img">
                                <img src="../img/sk_3.png">
                            </div>
                        </div>
                        <div class="form_group" id="nut-tskdn">
                            <div class="img">
                                <img src="../img/sk_2.png">
                            </div>
                            <div class="cont">
                                <p>Tạo sự kiện đối ngoại</p>
                            </div>
                            <div class="img">
                                <img src="../img/sk_3.png">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup tạo sự kiện-->

<!-- chào đón thành viên mới -->
<div class="cd-popup model_560 " id="model_chaodonthanhvienmoi">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chào đón thành viên mới</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_chaodonthanhvienmoi">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Chọn thành viên<span class="cr_red">*</span></label>
                            <div class="form_select2">
                                <select class="select2_muti_tv v_select2_chaodontvmoi" id="v_select2_chaodontvmoi" name="select2_tv" multiple>
                                    <?php
                                    foreach ($data_ep as $ep) {
                                    ?>
                                        <option value="<?= $ep['ep_id'] ?>"><?= $ep['ep_name'] ?> (<?= $ep['dep_name'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Tin nhắn chào mừng<span class="cr_red">*</span></label>
                            <textarea id="v_content_chaodontvmoi" class="v_content_chaodontvmoi" autocomplete="Off" value="" name="txt_loinhan" placeholder="Nhập tin nhắn chào mừng"></textarea>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" id="v_huy_chaodontvmoi" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Đăng</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end chào đón thành viên mới -->
<!--  Chỉnh sửa thông báo chào đón thành viên mới -->
<div class="modal cd-popup model_560 " id="model_chinhsuachaodonthanhvienmoi">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa thông báo chào đón thành viên mới</h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_chinhsuachaodonthanhvienmoi" method="" action="">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Chọn thành viên<span class="cr_red">*</span></label>
                            <div class="form_select2">
                                <select class="select2_muti_tv v_select2_chaodontvmoi" id="v_select2_chinhsuachaodontvmoi" multiple name="select2_tv">
                                    <?php
                                    foreach ($data_ep as $ep) {
                                    ?>
                                        <option value="<?= $ep['ep_id'] ?>"><?= $ep['ep_name'] ?> (<?= $ep['dep_name'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Tin nhắn chào mừng<span class="cr_red">*</span></label>
                            <textarea id="v_content_chinhsuachaodontvmoi" class="v_content_chaodontvmoi" autocomplete="Off" value="" name="txt_loinhan" placeholder="Nhập tin nhắn chào mừng"></textarea>
                        </div>
                        <input type="hidden" value="" class="v_new_id02">
                        <div class="form_buttom">
                            <button class="btn_huy" id="v_huy_chinhsuachaodontvmoi" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Đăng</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end Chỉnh sửa thông báo chào đón thành viên mới -->

<!-- popup tạo sự kiện nội bộ-->
<div class="cd-popup model_560" id="model_taosukien_noibo">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo sự kiện nội bộ </h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_taosukien_noibo" method="" action="">
                    <div class="form-body">
                        <div class="form_group">
                            <label for="" class="name">Tên sự kiện <span class="cr_red">*</span></label>
                            <input type="text" class="frm_input" name="txt_ten" placeholder="Nhập tên sự kiện">
                        </div>
                        <div class="form_group">
                            <label class="name">Thời gian diễn ra<span class="cr_red">*</span></label>
                            <div class="d_flex space_b box_flex2" style="width: 100%; flex: left;">
                                <div class="item_flex2">
                                    <input type="date" name="date_ngay">
                                </div>
                                <div class="item_flex2">
                                    <input type="time" name="date_gio">
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Ảnh đại diện sự kiện</label>
                            <input type="file" class="frm_input" name="file_taianh" placeholder="Tải ảnh lên">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Miêu tả sự kiện<span class="cr_red">*</span></label>
                            <textarea name="txt_mieuta" class="textarea_cheditor" placeholder="Nhập miêu tả sự kiện"></textarea>
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Tải tệp đính kèm<span class="cr_red">*</span></label>
                            <label for="input_file1">
                                <input type="file" name="file_taitep" class="custom-file-input" multiple>
                            </label>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Tạo sự kiện</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup tạo sự kiện nội bộ-->

<!-- popup tạo bình chọn -->
<div class="cd-popup model_560" id="model-taobinhchon">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo bình chọn</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="model-taobinhchon">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên bình chọn<span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_ten" class="new_title" placeholder="Nhập tên bình chọn" autocomplete="Off">
                            <span class="error"></span>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung bình chọn<span class="cr_red">*</span></label>
                            <textarea class="textarea_cheditor" id="content_vote" name="txt_noidung" placeholder="Nhập nội dung bình chọn"></textarea>
                            <script type="text/javascript">
                                CKEDITOR.replace("content_vote");
                            </script>
                            <span class="error error_vote"></span>
                        </div>
                        <div class="form_group">
                            <label class="title">
                                <span></span>
                                <p>Số lượng phương án (tối đa 40 phương án)</p>
                                <span></span>
                            </label>
                        </div>
                        <div class="form_group">
                            <label class="name">Phương án 1</label>
                            <div class="d_flex space_b box_flex2" style="width: 100%; display:flex;">
                                <div class="item_flex3">
                                    <input type="text" value="" class="vote_option" name="txt_noidungphuongan" placeholder="Nội dung">
                                </div>
                                <div class="item_flex3 input_xanh">
                                    <input type="file" name="" class="custom-file-input v_file_option">
                                </div>
                            </div>
                            <label class="name">Phương án 2</label>
                            <div class="d_flex space_b box_flex2" style="width: 100%; display:flex;">
                                <div class="item_flex3">
                                    <input type="text" value="" class="vote_option" placeholder="Nội dung">
                                </div>
                                <div class="item_flex3 input_xanh">
                                    <input type="file" name="" class="custom-file-input v_file_option">
                                </div>
                            </div>
                            <u class="v_add_vote_option">Thêm phương án</u>
                            <span class="error error_vote_option"></span>
                        </div>
                        <div class="form_group">
                            <label class="name">Người theo dõi</label>
                            <div class="form_select2">
                                <select class="select2_muti_td id_user_tags" multiple name="select2_td">
                                    <?php
                                    foreach ($data_ep as $ep) {
                                    ?>
                                        <option value="<?= $ep['ep_id'] ?>"><?= $ep['ep_name'] ?> (<?= $ep['dep_name'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="form_group">
                            <label class="name">Thời hạn bình chọn<span class="cr_red">*</span></label>
                            <div class="d_flex space_b box_flex2" style="width: 100%; flex: left;">
                                <div class="item_flex2">
                                    <input type="date" name="date_ngay" class="date_ngay">
                                    <span class="error"></span>
                                </div>
                                <div class="item_flex2">
                                    <input type="time" name="date_gio" class="date_gio">
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_taobinhchon" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Tạo bình chọn</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup tạo bình chọn -->

<!-- popup chỉnh sửa bình chọn -->
<div class="modal cd-popup model_560" id="model-chinhsuabinhchon">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa bình chọn</h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="model-chinhsuabinhchon">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên bình chọn<span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_ten" class="new_title" placeholder="Nhập tên bình chọn">
                            <span class="error"></span>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung bình chọn<span class="cr_red">*</span></label>
                            <textarea class="textarea_cheditor" id="content_chinhsuathaoluan" name="txt_noidung" placeholder="Nhập nội dung bình chọn"></textarea>
                            <script type="text/javascript">
                                CKEDITOR.replace("content_chinhsuathaoluan");
                            </script>
                            <span class="error error_vote"></span>
                        </div>
                        <div class="form_group">
                            <label class="title">
                                <span></span>
                                <p>Số lượng phương án (tối đa 40 phương án)</p>
                                <span></span>
                            </label>
                        </div>
                        <div class="form_group form_group_option_vote">
                            <div class="form_group_option_vote_detail">

                            </div>
                            <u class="v_add_vote_option02" onclick="add_new_vote_option(this)">Thêm phương án</u>
                            <span class="error error_vote_option"></span>
                        </div>
                        <div class="form_group">
                            <label class="name">Người theo dõi</label>
                            <div class="form_select2">
                                <select class="select2_muti_td id_user_tags" multiple name="select2_td">
                                    <?php
                                    foreach ($data_ep as $ep) {
                                    ?>
                                        <option value="<?= $ep['ep_id'] ?>"><?= $ep['ep_name'] ?> (<?= $ep['dep_name'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="form_group">
                            <label class="name">Thời hạn bình chọn<span class="cr_red">*</span></label>
                            <div class="d_flex space_b box_flex2" style="width: 100%; flex: left;">
                                <div class="item_flex2">
                                    <input type="date" name="date_ngay" class="date_ngay">
                                    <span class="error"></span>
                                </div>
                                <div class="item_flex2">
                                    <input type="time" name="date_gio" class="date_gio">
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="">Hủy</button>
                            <button class="btn_luu" type="submit">Cập nhật bình chọn</button>
                            <input type="hidden" class="new_id" value="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup chỉnh sửa tạo bình chọn -->

<!--popup tạo tin tức nội bộ  -->
<div class="cd-popup model_560" id="model-taotinnoibo" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo tin nội bộ</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model-taotinnoibo">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tiêu đề <span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_ten" class="new_title" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung<span class="cr_red">*</span></label>
                            <textarea name="txt_noidung" class="content" id=""></textarea>
                        </div>
                        <div class="form_group v_add_file_image_internal_news">
                            <label for="" class="name">Chọn tệp đính kèm</label>
                            <label for="input_file1">
                                <input type="file" name="file_taitep" class="custom-file-input-internal_news" multiple hidden>
                            </label>
                            <div class="block_name_file_internal_news" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_internal_news">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_taotinnoibo" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Tạo tin </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup tạo tin tức nội bộ  -->

<!-- popup xóa bài viết -->
<div class="cd-modal-del  model_560" id="del_member_event">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa thành viên trong sự kiện</h4>
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc muốn xóa bài người này ra khỏi sự kiện ? </b></p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy_popup_xoatv" type="button">Hủy</button>
                            <button class="v_xoa_tv_event" type="button">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup xóa bài viết -->

<!-- popup xóa bài viết -->
<div class="cd-modal-del  model_560" id="xoa_baiviet">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa bài viết</h4>
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc muốn xóa bài viết của người này? </b></p>
                            <p class="p_popup_del">Bài viết này sẽ không thể khôi phục do không được
                                lưu tại bộ nhớ tạm của hệ thống</p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_xoatatca" type="button">Hủy</button>
                            <button class="btn_luu v_xoa_bai_viet" type="button">Xóa</button>
                            <input type="hidden" id="v_id_newfeed" value="">
                            <input type="hidden" id="v_position_li" value="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup xóa bài viết -->

<!-- popup xóa bình luận -->
<div class="cd-modal-del  model_560" id="xoa_binhluan">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa bình luận</h4>
            </div>
            <div class="cd_modal_body">
                <div>
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc muốn xóa bình luận của người này? </b></p>
                            <p class="p_popup_del">Bình luận này sẽ không thể khôi phục do không được
                                lưu tại bộ nhớ tạm của hệ thống</p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_xoatatca" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end popup xóa bình luận-->

<!-- <popup bật thông báo cho bài viết> -->
<div class="cd-modal-del  model_560" id="bat_baiviet">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Bật thông báo cho bài viết</h4>
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có muốn nhận thông báo cho bài viết này?</b></p>
                            <p class="p_popup_del">
                                Tất cả các thay đổi mà bài viết cập nhật
                                sẽ được gửi tới thông báo của bạn</p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_xoatatca" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Bật thông báo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end popup bật thông báo cho bài viết> -->
<!--  popup văn hóa doanh nghiệp -->
<!-- popup chỉnh sửa thông tin công ty -->
<div class="cd-popup model_560" id="model-chinhsuattct">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa thông tin công ty</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model-chinhsuattct" method="" action="" onsubmit="return validateDate()">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên công ty <span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_ten" placeholder="Công ty Cổ phần Thanh toán Hưng Hà">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Ngày thành lập<span class="cr_red">*</span></label>
                            <input type="date" name="date_thanhlap" id="demodate">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Mô tả<span class="cr_red">*</span></label>
                            <textarea rows="5" cols="20" name="txt_mota" class="textarea_cheditor" placeholder="Nhập miêu tả sự kiện"></textarea>
                        </div>
                        <div class="form_group">
                            <input class="input_anh" type="file" name="file_taianh " style="display: none;" />
                            <div class="header">
                                <div class="cont">
                                    <p>Logo công ty</p>
                                </div>
                                <div class="img">
                                    <img src="../img/v_9.png" class="taianh ">
                                </div>
                            </div>
                            <div class="body">
                                <div class="img-logo">
                                    <img src="../img/vh_3.png" class="img_thaydoi taianh ">
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <input class="input_anh" type="file" name="file_taianh" style="display: none;" />
                            <div class="header">
                                <div class="cont">
                                    <p>Ảnh bìa công ty</p>
                                </div>
                                <div class="img">
                                    <img src="../img/v_9.png" class="taianh">
                                </div>
                            </div>
                            <div class="body">
                                <div class="img-anhbia">
                                    <img src="../img/vh_4.png" class="img_thaydoi taianh">
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="name">Địa chỉ công ty <span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_diachi" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup chỉnh sửa thông tin công ty -->

<!-- popup chỉnh sửa nội dung tầm nhìn -->
<div class="cd-popup model_560 " id="model_editnoidungtamnhin">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa nội dung tầm nhìn</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_editnoidungtamnhin">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Nội dung<span class="cr_red">*</span></label>
                            <textarea name="content" class="content" cols="5" rows="5" placeholder="Nhập nội dung"></textarea>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <img src="../img/Spinner-1s-200px.gif" alt="Ảnh lỗi" style="width: 30px; display: none">
                                <span class="v_btn_luu_span">Cập nhật</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup chỉnh sửa nội dung tầm nhìn -->

<!-- popup chỉnh sửa nội dung tầm nhìn -->
<div class="cd-popup model_560 " id="model_edit_address" style="display: none">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Địa chỉ công ty</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_edit_address">
                    <div class="form-body v_form_body">
                        <div class="form_group">
                            <div class="v_div_address">
                                <div class="v_address">
                                    <label for="" class="v_title_address">Địa chỉ <span class="cr_red">*</span></label>
                                    <input type="text" class="input_address">
                                </div>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup chỉnh sửa nội dung tầm nhìn -->
<!-- popup chỉnh sửa nội dung sứ mệnh -->
<div class="cd-popup model_560 " id="model_editnoidungsumenh">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa nội dung sứ mệnh</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_editnoidungsumenh" method="" action="">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Nội dung<span class="cr_red">*</span></label>
                            <textarea name="txt_noidung" cols="5" rows="5" placeholder="Nhập nội dung"></textarea>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--ènd popup chỉnh sửa nội dung xứ mệnh -->

<!-- popup thêm giá trị cốt lõi -->
<div class="cd-popup model_560 " id="model_themgtcotloi">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Thêm giá trị cốt lõi</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_themgtcotloi" method="POST" action="../handle/create_core_value.php" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên giá trị cốt lõi <span class="cr_red">*</span></label>
                            <input type="text" value="" name="title" placeholder="Nhập tên ">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung giá trị cốt lõi <span class="cr_red">*</span></label>
                            <textarea rows="5" name="content" placeholder="Nhập nội dung"></textarea>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Ảnh bìa</label>
                            <input type="file" name="file" placeholder="Tải ảnh lên" accept=".png,.PNG,.jpg,.JPG,.jpeg,.JPEG">
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Bình luận</label>
                            <div class="check check_4">
                                <input type="checkbox" name="comment" value="1">
                                <p class="send_people">Tắt bình luận</p>
                            </div>
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Thông báo </label>
                            <div class="check check_5">
                                <input type="checkbox" name="sent_alert" value="1">
                                <p class="send_people">Gửi thông báo đến mọi người</p>
                            </div>
                            <div class="check check_6">
                                <input type="checkbox" name="sent_alert_email" value="2">
                                <p class="send_people">Gửi email đến mọi người</p>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit" name="buttom_themgtcotloi">Tạo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup thêm giá trị cốt lõi -->

<!-- popup sửa giá tri cốt lõi -->
<div class="cd-popup model_560 " id="model_suagtcotloi">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Sửa giá trị cốt lõi</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_suagtcotloi" method="POST" enctype="multipart/form-data" action="../handle/update_core_value.php">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên giá trị cốt lõi<span class="cr_red">*</span></label>
                            <input type="text" value="" name="title" class="title" placeholder="TẬN TÂM – TẬN LỰC">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung giá trị cốt lõi<span class="cr_red">*</span></label>
                            <textarea rows="5" name="content" class="content" placeholder="Công ty CP Thanh toán Hưng Hà luôn đặt lợi ích của khách hàng lên trên để nghiên"></textarea>
                        </div>
                        <div class="form_group">
                            <div class="header">
                                <div class="cont">
                                    <p>Ảnh bài viết</p>
                                </div>
                                <div class="img">
                                    <img src="../img/v_9.png" class="taianh v_update_img_core_value">
                                </div>
                            </div>
                            <input class="input_anh v_core_value_input_anh" type="file" name="file" accept=".png,.PNG,.jpg,.JPG,.jpeg,.JPEG" />
                            <div class="body">
                                <div class="img-anhbia">
                                    <img src="../img/vh_4.png" class="img_thaydoi taianh">
                                </div>
                            </div>
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Bình luận</label>
                            <div class="check check_4">
                                <input type="checkbox" name="comment" value="1">
                                <p class="send_people">Tắt bình luận</p>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" name="submit" value="">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup sửa giá tri cốt lõi -->

<!-- poppup xóa giá trị cốt lõi -->
<div class="cd-modal-del" id="xoa_giatricotloi">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa giá trị cốt lõi</h4>
            </div>
            <div class="cd_modal_body">
                <div>
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc xóa giá trị cốt lõi Tận tâm - Tận lực?
                                </b></p>
                            <p class="p_popup_del">Tất cả thông báo sẽ được lưu tự động vào Đã xóa gần
                                đây trong thời gian 05 ngày trước khi bị xóa vĩnh viễn
                            </p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_xoatatca" type="button">Đóng</button>
                            <button class="btn_luu btn_xoa_gtcl" type="button">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end poppup xóa giá trị cốt lõi -->

<!-- popup thêm mục tiêu chiến lược -->
<div class="cd-popup model_560  " id="model_themmuctieu-chienluoc">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Thêm mục tiêu - chiến lược</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_themmuctieu-chienluoc" method="POST" enctype="multipart/form-data" action="../handle/create_target.php">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên mục tiêu - chiến lược<span class="cr_red">*</span></label>
                            <input type="text" value="" name="title" placeholder="Nhập tên">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung mục tiêu - chiến lược<span class="cr_red">*</span></label>
                            <textarea rows="5" name="content" placeholder="Nhập nội dung"></textarea>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Ảnh bìa</label>
                            <input type="file" value="" name="file" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Bình luận</label>
                            <div class="check check_4">
                                <input type="checkbox" name="comment" value="1">
                                <p class="send_people">Tắt bình luận</p>
                            </div>
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Thông báo </label>
                            <div class="check check_5">
                                <input type="checkbox" name="sent_alert" value="1">
                                <p class="send_people">Gửi thông báo đến mọi người</p>
                            </div>
                            <div class="check check_6">
                                <input type="checkbox" name="sent_alert_email" value="1">
                                <p class="send_people">Gửi email đến mọi người</p>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" name="submit" type="submit" value="submit">Tạo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup thêm mục tiêu chiến lược -->

<!-- popup sửa mục tiêu chiến lược -->
<div class="cd-popup model_560" id="model_suamuctieu-chienluoc">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Sửa mục tiêu - chiến lược</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_suamuctieu-chienluoc">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên mục tiêu - chiến lược<span class="cr_red">*</span></label>
                            <input type="hidden" value="" name="id_target" class="id_target">
                            <input type="text" value="" class="title_target" name="title" placeholder="MỤC TIÊU DÀI HẠN">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung mục tiêu - chiến lược<span class="cr_red">*</span></label>
                            <textarea rows="5" name="content" class="content_target" placeholder="Công ty CP Thanh toán Hưng Hà luôn đặt lợi ích của khách hàng lên trên để nghiên"></textarea>
                        </div>
                        <div class="form_group">
                            <div class="header">
                                <div class="cont">
                                    <p>Ảnh bìa</p>
                                </div>
                                <div class="img">
                                    <img src="../img/v_9.png" class="taianh v_cover_img_target">
                                </div>
                            </div>
                            <div class="body">
                                <div class="img-anhbia">
                                    <img src="../img/vh_4.png" class="img_thaydoi taianh">
                                </div>
                            </div>
                            <input class="input_anh v_target_input_anh" id="img_target" type="file" name="cover_image" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG" />
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Bình luận</label>
                            <div class="check check_4">
                                <input type="checkbox" name="comment" class="checkbox_target">
                                <p class="send_people">Tắt bình luận</p>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" name="submit" value="">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup sửa mục tiêu chiến lược -->

<!-- poppup xóa mục tiêu chiến lược-->
<div class="cd-modal-del" id="xoa_muctieu-chienluoc">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa mục tiêu - chiến lược</h4>
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body" id="id_delete_target" data-id="">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc xóa <span id="title_target"></span> ?</b></p>
                            <p class="p_popup_del">Tất cả thông báo sẽ được lưu tự động vào Đã xóa gần
                                đây trong thời gian 05 ngày trước khi bị xóa vĩnh viễn
                            </p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_xoatatca" type="button">Đóng</button>
                            <button class="btn_luu" id="delete_target" data-id="" type="button">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end poppup xóa mục tiêu chiến lược -->

<!-- popup thêm nguyên tắc làm việc -->
<div class="cd-popup model_560  " id="model_themnguyentac">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Thêm nguyên tắc làm việc</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_themnguyentac" method="" action="">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên nguyên tắc làm việc<span class="cr_red">*</span></label>
                            <input type="text" value="" name="name" class="name_working_rules" placeholder="Nhập tên nguyên tắc ">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung nguyên tắc<span class="cr_red">*</span></label>
                            <textarea rows="5" name="content" class="content" placeholder="Nhập nội dung"></textarea>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Ảnh bìa<span class="cr_red">*</span></label>
                            <input type="file" value="" name="file" class="file" placeholder="Tải ảnh lên" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Bình luận</label>
                            <div class="check check_4">
                                <input type="checkbox" name="comment" class="comment">
                                <p>Tắt bình luận</p>
                            </div>
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Thông báo </label>
                            <div class="check check_5">
                                <input type="checkbox" name="notify" class="notify">
                                <p>Gửi thông báo đến mọi người</p>
                            </div>
                            <div class="check check_6">
                                <input type="checkbox" name="send_mail" class="send_mail">
                                <p>Gửi email đến mọi người</p>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu">Tạo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup thêm nguyên tắc làm việc -->

<!-- popup thêm nguyên tắc làm việc -->
<div class="cd-popup model_560  " id="model_chinhsuanguyentac">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa nguyên tắc làm việc</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_chinhsuanguyentac">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên nguyên tắc làm việc<span class="cr_red">*</span></label>
                            <input type="text" value="" name="name" class="name_working_rules" placeholder="Nhập tên nguyên tắc ">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung nguyên tắc<span class="cr_red">*</span></label>
                            <textarea rows="5" name="content" class="content" placeholder="Nhập nội dung"></textarea>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Ảnh bìa<span class="cr_red">*</span></label>
                            <input type="text" class="v_name_file_rules" readonly>
                            <input type="file" value="" name="file" class="file file_edit_rules" placeholder="Tải ảnh lên" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Bình luận</label>
                            <div class="check check_4">
                                <input type="checkbox" name="comment" class="comment">
                                <p>Tắt bình luận</p>
                            </div>
                        </div>
                        <!-- <div class="form_group ">
                            <label for="" class="name">Thông báo </label>
                            <div class="check check_5">
                                <input type="checkbox" name="notify" class="notify">
                                <p>Gửi thông báo đến mọi người</p>
                            </div>
                            <div class="check check_6">
                                <input type="checkbox" name="send_mail" class="send_mail">
                                <p>Gửi email đến mọi người</p>
                            </div>
                        </div> -->
                        <div class="form_buttom">
                            <input type="hidden" class="id_rules">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup thêm nguyên tắc làm việc -->

<!-- popup sửa nguyên tắc làm việc -->
<div class="cd-popup model_560" id="model_suanguyentac">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Sửa nguyên tắc làm việc </h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_suanguyentac" method="post" action="">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên nguyên tắc làm việc<span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_ten" placeholder="Nguyên tắc 1">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung nguyên tắc<span class="cr_red">*</span></label>
                            <textarea rows="5" name="txt_noidung" placeholder="Công ty CP Thanh toán Hưng Hà luôn đặt lợi ích của khách hàng lên trên để nghiên"></textarea>
                        </div>
                        <div class="form_group">
                            <input class="input_anh" type="file" name="file_taianh" style="display: none;" />
                            <div class="header">
                                <div class="cont">
                                    <p>Ảnh bìa công ty</p>
                                </div>
                                <div class="img">
                                    <img src="../img/v_9.png" class="taianh">
                                </div>
                            </div>
                            <div class="body">
                                <div class="img-anhbia">
                                    <img src="../img/vh_4.png" class="img_thaydoi taianh">
                                </div>
                            </div>
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Bình luận</label>
                            <div class="check check_4">
                                <input type="checkbox" name="">
                                <p>Tắt bình luận</p>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup sửa nguyên tắc làm việc -->

<!-- poppup xóa nguyên tắc làm việc-->
<div class="cd-modal-del" id="xoa_nguyentac">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa nguyên tắc làm việc</h4>
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc xóa nguyên tắc này không? </b></p>
                            <p class="p_popup_del">Tất cả thông báo sẽ được lưu tự động vào Đã xóa gần
                                đây trong thời gian 03 ngày trước khi bị xóa vĩnh viễn
                            </p>
                        </div>
                        <div class="form_buttom">
                            <input type="hidden" class="id_rules">
                            <button class="btn_huy btn_huy_xoatatca" type="button">Đóng</button>
                            <button class="btn_luu" type="button">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end poppup xóa nguyên tắc làm việc -->

<!-- popup sửa nhóm phòng ban -->
<div class="cd-popup model_560" id="model_suanhom-phongban">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Sửa nhóm - phòng ban </h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_edit_department" name="edit_department">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên nhóm phòng - ban <span class="cr_red">*</span></label>
                            <input type="text" value="" name="dep_name" class="dep_name" placeholder="Nguyên tắc 1" readonly>
                            <span class="error"></span>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Mô tả công việc chính <span class="cr_red">*</span></label>
                            <textarea rows="5" name="dep_description" class="dep_description" placeholder="Đây là nội dung công việc chính."></textarea>
                            <span class="error"></span>
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Chế độ nhóm <span class="cr_red">*</span></label>
                            <div class="container-check container_check_mode">
                                <div class="check ">
                                    <input type="radio" name="mode" value="0" class="v_congkhai v_mode">
                                    <p>Công khai</p>
                                </div>
                                <div class="check ">
                                    <input type="radio" name="mode" value="1" class="v_riengtu v_mode">
                                    <p>Riêng tư</p>
                                </div>
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Yêu cầu kiểm duyệt thành viên tham gia <span class="cr_red">*</span></label>
                            <div class="container-check container_request">
                                <div class="check ">
                                    <input type="radio" name="request_censorship" value="1" class="v_request v_request1">
                                    <p>Có </p>
                                </div>
                                <div class="check ">
                                    <input type="radio" name="request_censorship" value="2" class="v_request v_request2">
                                    <p>Không</p>
                                </div>
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup sửa nhóm phòng ban -->

<!-- poppup xóa nhóm phòng ban-->
<div class="cd-modal-del" id="xoa_nhomphongban">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa nhóm phòng - ban</h4>
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc xóa phòng Kỹ Thuật? </b></p>
                            <p class="p_popup_del">Nhóm này sẽ không thể khôi phục do không được lưu tại bộ nhớ tạm của hệ thống
                            </p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_xoatatca" type="button">Đóng</button>
                            <button class="btn_luu btn_del_group" type="button">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end poppup xóa nhóm phòng ban -->

<!-- popup chi tiết viết thư -->
<div class="cd-popup model_560" id="model_chitietthu">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chi tiết thư </h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <div>
                    <div class="form_group ">
                        <label for="" class="name name_mail"></label>
                        <p class="user_sent"></p>
                        <p class="created_at"></p>
                    </div>
                    <div class="form_group ">
                        <label for="" class="name">File đính kèm</label>
                        <a download class="link_1"><img src="../img/vh_12.png"><span class="name_file"></span></a>
                        <p class="content_mail">
                        </p>
                    </div>
                    <div class="form_buttom">
                        <button class="btn_huy " type="button">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popup chi tiết viết thư -->

<!-- popup xóa thư từ ceo -->
<div class="cd-modal-del" id="xoa_thutuceo">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa thư từ CEO</h4>
            </div>
            <div class="cd_modal_body">
                <div>
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc xóa thư <span class="title_mail"></span>? </b>
                            </p>
                            <p class="p_popup_del">Tất cả thư đã xóa sẽ được lưu tự động vào Đã xóa gần đây
                                trong thời gian 03 ngày trước khi bị xóa vĩnh viễn
                            </p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btn_huy_xoatatca" type="button">Đóng</button>
                            <button class="btn_luu" type="button" value="">Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end popup xóa thư từ ceo -->


<!-- trang chủ sau đăng Nhập -->
<div class="cd-popup model_taosukien" id="model_taosukien_sdn">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo sự kiện</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl an_cainay">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="form_group" id="nut-tsknb_sdn">
                            <div class="img">
                                <img src="../img/sk_1.png">
                            </div>
                            <div class="cont">
                                <p>Tạo sự kiện nội bộ</p>
                            </div>
                            <div class="img">
                                <img src="../img/sk_3.png">
                            </div>
                        </div>
                        <div class="form_group" id="nut-tskdn">
                            <div class="img">
                                <img src="../img/sk_2.png">
                            </div>
                            <div class="cont">
                                <p>Tạo sự kiện đối ngoại</p>
                            </div>
                            <div class="img">
                                <img src="../img/sk_3.png">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- popup tạo sự kiện nội bộ-->
<div class="cd-popup model_560" id="model_taosukien_noibo_sdn" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo sự kiện nội bộ </h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_taosukien_noibo_sdn" id="model_taosukien_noibo_sdn2">
                    <div class="form-body">
                        <div class="form_group">
                            <label for="" class="name">Tên sự kiện <span class="cr_red">*</span></label>
                            <input type="text" class="frm_input v_title_event new_title" name="new_title" autocomplete="Off" placeholder="Nhập tên sự kiện">
                        </div>
                        <div class="form_group">
                            <label class="name">Thời gian diễn ra<span class="cr_red">*</span></label>
                            <div class="d_flex space_b box_flex2" style="width: 100%; flex: left;">
                                <div class="item_flex2">
                                    <input type="date" class="v_date_ngay_eventnoibo v_date_ngay" name="date_ngay">
                                </div>
                                <div class="item_flex2">
                                    <input type="time" class="v_date_gio_eventnoibo v_date_gio" name="date_gio">
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Ảnh đại diện sự kiện<span class="cr_red">*</span></label>
                            <input type="file" class="frm_input v_event_avatar_noi_bo avatar" name="file_taianh" placeholder="Tải ảnh lên" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Miêu tả sự kiện<span class="cr_red">*</span></label>
                            <textarea name="txt_mieuta" class="textarea_cheditor v_mieuta_event_noi_bo content" placeholder="Nhập miêu tả sự kiện"></textarea>
                        </div>
                        <div class="form_group v_add_file_image_event_internal">
                            <label for="" class="name">Tải tệp đính kèm</label>
                            <label for="input_file1">
                                <input type="file" class="custom-file-input-event-nb" name="file_taitep" multiple hidden>
                            </label>
                            <div class="block_name_file_event_internal" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_event_internal">Tải lên tệp đính kèm</div>
                            </div>

                        </div>
                        <div class="form_group">
                            <label class="name">Vị trí đăng sự kiện<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s v_select2_taosukiennoibo position" name="select_vitri">
                                    <option value="0">Tường công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" id="v_huy_taosukiennoibo" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Tạo sự kiện</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup tạo sự kiện nội bộ-->
<!-- popup chỉnh sửa sự kiện nội bộ-->
<div class="modal cd-popup model_560" id="model_chinhsuasukien_noibo_sdn">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa sự kiện nội bộ </h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_chinhsuasukien_noibo_sdn">
                    <div class="form-body">
                        <div class="form_group">
                            <label for="" class="name">Tên sự kiện <span class="cr_red">*</span></label>
                            <input type="text" class="frm_input v_title_event" name="txt_ten" autocomplete="Off" placeholder="Nhập tên sự kiện">
                        </div>
                        <div class="form_group">
                            <label class="name">Thời gian diễn ra<span class="cr_red">*</span></label>
                            <div class="d_flex space_b box_flex2" style="width: 100%; flex: left;">
                                <div class="item_flex2">
                                    <input type="date" class="v_date_ngay_eventnoibo" name="date_ngay">
                                </div>
                                <div class="item_flex2">
                                    <input type="time" class="v_date_gio_eventnoibo" name="date_gio">
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Ảnh đại diện sự kiện</label>
                            <input type="file" class="frm_input v_event_avatar_noi_bo v_chinhsua_event_avatar_noibo" name="file_taianh" placeholder="Tải ảnh lên" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                            <input type="text" class="text_img_edit_event_avatar" value="" readOnly>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Miêu tả sự kiện<span class="cr_red">*</span></label>
                            <textarea name="txt_mieuta" class="textarea_cheditor v_mieuta_event_noi_bo" placeholder="Nhập miêu tả sự kiện"></textarea>
                        </div>
                        <div class="form_group v_add_file_image_event_internal_ud">
                            <label for="" class="name">Tải tệp đính kèm</label>
                            <label for="input_file1">
                                <input type="file" class="custom-file-input-nb-ud" name="file_taitep" multiple hidden>
                            </label>
                            <div class="block_name_evt_nb_ud" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_evt_nb_ud">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="name">Vị trí đăng sự kiện<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s v_select2_taosukiennoibo" name="select_vitri">
                                    <option value="0">Tường công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" id="v_huy_chinhsuasukiennoibo" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Cập nhật</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                            <input type="hidden" class="v_chinhsua_event_noibo_hidden" value="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup chỉnh sửa sự kiện nội bộ-->

<!--start popup tạo thông báo -->
<div class="cd-popup model_560 " id="model_suaduan" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header v_name_header_alert">Tạo thông báo</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body v_model_create_alert2">
                <form class="model_suaduan" id="v_model_create_alert">
                    <div class="form-body">
                        <div class="form_group">
                            <p class="text_message">
                                (Thông báo giúp bạn gửi các thông tin quan trọng tới toàn thể thành viên
                                trong phòng/ban.)
                            </p>
                        </div>
                        <div class="form_group">
                            <label class="name">Bạn vui lòng chọn phòng ban muốn đăng thông báo<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s position" id="v_select_vitri_taothongbao" name="position">
                                    <option value="0">Toàn công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="name">Tiêu đề thông báo<span class="cr_red">*</span></label>
                            <input type="text" value="" autocomplete="Off" class="new_title" name="new_title" id="v_title_thongbao" placeholder="Nhập tên tiêu đề thảo luận">
                            <span class="error_title error"></span>
                        </div>
                        <div class="form_group content_notify">
                            <label for="" class="name">Nội dung thông báo<span class="cr_red">*</span></label>
                            <textarea name="content" class="textarea_cheditor ckeditor content" placeholder="Nhập nội dung thông báo" id="v_content_thongbao"></textarea>
                            <span class="error_content error"></span>
                        </div>
                        <!-- <div class="v_name_file_alert"></div> -->
                        <div class="form_group v_add_file_image_discuss">
                            <label for="" class="name">Tải lên tệp đính kèm</label>
                            <label for="input_file1" class="input_file1">
                                <input type="file" name="file" class="custom-file-input custom-file-input-notify file" hidden multiple>
                            </label>
                            <div class="block_name_file" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_notify">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" id="v_huy_taothongbao" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Đăng</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup tạo thông báo  -->

<!-- popup tạo sự kiện đối ngoại-->
<!-- poupup chinh sua sk giao luu-->
<div class="cd-popup popup_create_message vd8_chinhsua_sk v_detail_event_internal show_event_internal" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header new_title">Chỉnh sửa sự kiện giao lưu với tổng giám đốc công ty </h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form id="csskgl">
                    <div class="form-body">
                        <div class="form_group">
                            <div class="v_event_internal">
                                <div class="v_event_internal_title">Nội dung sự kiện:</div>
                                <div class="v_event_internal_content v_event_internal_content1">Giao lưu, trao đổi công việc chia sẻ kiến thức và kinh nghiệm</div>
                            </div>
                        </div>
                        <div class="form_group">
                            <div class="v_event_internal">
                                <div class="v_event_internal_title">Vị trí đăng sự kiện:</div>
                                <div class="v_event_internal_content v_event_internal_position">Toàn công ty</div>
                            </div>
                        </div>

                        <div class="form_group">
                            <label class="name">Thành viên tham gia</label>
                            <div class="thanh-vien-all">
                            </div>
                            <div class="form_select2">
                                <select class="select2_muti_tv" multiple name="select2_tv[]">
                                    <?php
                                    foreach ($data_ep as $ep) {
                                    ?>
                                        <option value="<?= $ep['ep_id'] ?>"><?= $ep['ep_name'] ?> (<?= $ep['dep_name'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="name">Danh sách câu hỏi trong sự kiện<span class="cr_red">*</span></label>
                            <div class="cau-hoi-sk-all">
                                <div class="img-cauhoi-sk">
                                    <div class="imgcauhoi"><img src="../img/lethuthu.png" alt="Ảnh lỗi"></div>
                                    <div class="text-cauhoi-sk">
                                        <div class="text-cauhoi-sk-tren">
                                            <p class="text-ch1">Phạm Văn Minh&nbsp;<span class="text2">Quản trị</span>
                                            </p>
                                            <p class="text-ch3">Đây là câu
                                                hỏiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
                                            </p>
                                        </div>
                                        <p class="text-ch4">14h30 25.01.2020</p>
                                    </div>
                                </div>
                                <div class="img-cauhoi-sk">
                                    <div class="imgcauhoi"><img src="../img/lethuthu.png" alt="Ảnh lỗi"></div>
                                    <div class="text-cauhoi-sk">
                                        <div class="text-cauhoi-sk-tren">
                                            <p class="text-ch1">Phạm Văn Minh&nbsp;<span class="text2">Quản trị</span>
                                            </p>
                                            <p class="text-ch3">Đây là câu
                                                hỏiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
                                            </p>
                                        </div>
                                        <p class="text-ch4">14h30 25.01.2020</p>
                                    </div>
                                </div>
                                <div class="img-cauhoi-sk">
                                    <div class="imgcauhoi"><img src="../img/lethuthu.png" alt="Ảnh lỗi"></div>
                                    <div class="text-cauhoi-sk">
                                        <div class="text-cauhoi-sk-tren">
                                            <p class="text-ch1">Phạm Văn Minh&nbsp;<span class="text2">Quản trị</span>
                                            </p>
                                            <p class="text-ch3">Đây là câu
                                                hỏiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
                                            </p>
                                        </div>
                                        <p class="text-ch4">14h30 25.01.2020</p>
                                    </div>
                                </div>
                            </div>
                            <input type="text" value="" name="txt_email" placeholder="Mời bạn đặt câu hỏi cho diễn giả tại đây">
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" tupe="sudmit">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end poupup chinh sua sk giao luu-->

<!--end popup tạo sự kiện nội bộ-->
<div class="modal cd-popup model_560 " id="model_sua_alert" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header v_name_header_alert">Chỉnh sửa thông báo</h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body v_model_create_alert2">
                <form class="model_sua_alert" id="v_model_create_alert2">
                    <div class="form-body">
                        <div class="form_group">
                            <p class="text_message">
                                (Thông báo giúp bạn gửi các thông tin quan trọng tới toàn thể thành viên
                                trong phòng/ban)
                            </p>
                        </div>
                        <div class="form_group">
                            <label class="name">Bạn vui lòng chọn phòng ban muốn đăng thông báo<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s v_edit_select2_alert position" id="v_edit_select2_alert" name="select_vitri_taothongbao">
                                    <option value="0">Toàn công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="name">Tiêu đề thông báo<span class="cr_red">*</span></label>
                            <input type="text" value="" autocomplete="Off" name="txt_ten" id="v_edit_title_thongbao" class="v_edit_title_thongbao new_title" placeholder="Nhập tên tiêu đề thảo luận">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung thông báo<span class="cr_red">*</span></label>
                            <textarea name="txt_noidung" class="textarea_cheditor" placeholder="Nhập nội dung thông báo" id="v_edit_content_thongbao"></textarea>
                        </div>
                        <div class="form_group v_update_file_image_discuss">
                            <label for="" class="name">Tải lên tệp đính kèm</label>
                            <label for="input_file1" class="input_file1">
                                <input type="file" name="file_taitep" id="v_edit_file_thongbao" class="custom-file-input-edit-notify" hidden multiple>
                                <img class="v_name_file_alert_img" src="../img/img4.png" alt="Ảnh lỗi">
                            </label>
                            <div class="block_update_notify_name_file" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_ud_upload_notify">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" id="v_huy_chinhsuathongbao" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Cập nhật</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                            <input type="hidden" id="v_input_hidden_edit_alert" class="new_id" value="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup tạo sự kiện đối ngoại-->

<!--Chỉnh sửa thông báo-->
<div class="cd-popup model_560" id="model-taosukiendoingoai_sdn">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Tạo sự kiện đối ngoại </h4>
                <img src="../img/dau_x.png" alt="Ảnh lõi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="model-taosukiendoingoai" id="model-taosukiendoingoai2">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên sự kiện<span class="cr_red">*</span></label>
                            <input type="text" id="v_event_name_doi_ngoai" class="new_title" value="" name="txt_ten" placeholder="Nhập tên sự kiện">
                        </div>
                        <div class="form_group">
                            <label class="name">Thông tin diễn giả<span class="cr_red">*</span></label>
                            <label for="input_file1 ">
                                <input type="file" id="v_file_taianhdiengia" placeholder="Vui lòng chọn ảnh" name="file_taianhdiengia" class="custom-file-img-input speakers_avatar" accept=".png, .jpeg, .jpg, .PNG, .JPG, .JPEG">
                            </label>
                            <input class="marg_t10 speakers_name" type="text" id="v_txt_tendiengia" value="" name="txt_tendiengia" placeholder="Nhập họ tên diễn giả">
                            <input class="marg_t10 speakers_position" type="text" value="" id="v_txt_chucvudiengia" name="txt_chucvudiengia" placeholder="Nhập chức vụ diễn giả">
                            <input class="marg_t10 speakers_phone" type="text" value="" id="v_txt_sdtdiengia" name="txt_sdtdiengia" placeholder="Nhập SĐT diễn giả">
                            <input class="marg_t10 speakers_email" type="text" value="" id="v_txt_emaildiengia" name="txt_emaildiengia" placeholder="Nhập Email diễn giả">
                        </div>
                        <div class="form_group">
                            <label class="name">Khách mời tham gia</label>
                            <table class="kmtg">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ và tên</th>
                                        <th>Tên công ty</th>
                                        <th>Chức vụ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list_guest">
                                    <tr>
                                        <td colspan="4">
                                            <p class="add_guest">Thêm khách mời</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form_group">
                            <label class="name">Thời gian diễn ra<span class="cr_red">*</span></label>
                            <div class="d_flex space_b box_flex2" style="width: 100%; flex: left;">
                                <div class="item_flex2">
                                    <input type="date" name="date_ngay" class="date_ngay">
                                </div>
                                <div class="item_flex2">
                                    <input type="time" name="date_gio" class="date_gio">
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="name">Ảnh đại diện sự kiện<span class="cr_red">*</span></label>
                            <label for="input_file1 ">
                                <input type="file" name="file_taianhsukien" class="custom-file-img-input event_avatar" accept=".png, .jpeg, .jpg, .PNG, .JPG, .JPEG">
                            </label>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Miêu tả sự kiện<span class="cr_red">*</span></label>
                            <textarea class="content" name="txt_mieuta" cols="3" rows="3" placeholder="Nhập miêu tả sự kiện"></textarea>
                        </div>
                        <div class="form_group v_add_file_image_dn">
                            <label for="" class="name">Tải lên tệp đính kèm</label>
                            <label for="input_file1">
                                <input type="file" name="file_taitep" class="custom-file-input-dn" multiple hidden>
                            </label>
                            <div class="block_name_file_dn" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_dn">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_group v_form_group_pos">
                            <label class="name">Vị trí đăng sự kiện<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s event_position" name="select_vitri">
                                    <option value="0">Tường công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Quyền riêng tư<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s event_mode" name="select_quyen">
                                    <option value="1">Công khai</option>
                                    <option value="2">Riêng tư</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Tạo sự kiện</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup tạo sự kiện đối ngoại-->

<!--Chỉnh sửa thông báo-->
<div class="modal cd-popup model_560" id="model_chinhsuasukiendoingoai">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa sự kiện đối ngoại </h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lõi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="model-chinhsuasukiendoingoai">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tên sự kiện<span class="cr_red">*</span></label>
                            <input type="text" id="v_event_name_doi_ngoai" class="new_title" value="" name="txt_ten" placeholder="Nhập tên sự kiện">
                        </div>
                        <div class="form_group">
                            <label class="name">Thông tin diễn giả<span class="cr_red">*</span></label>
                            <label for="input_file1 ">
                                <input type="file" placeholder="Vui lòng chọn ảnh" name="file_taianhdiengia" class="custom-file-img-input speakers_avatar" accept=".png, .jpeg, .jpg, .PNG, .JPG, .JPEG">
                                <input type="text" class="v_speakers_avatar_text" readonly>
                            </label>
                            <input class="marg_t10 speakers_name" type="text" id="v_txt_tendiengia" value="" name="txt_tendiengia" placeholder="Nhập họ tên diễn giả">
                            <input class="marg_t10 speakers_position" type="text" value="" id="v_txt_chucvudiengia" name="txt_chucvudiengia" placeholder="Nhập chức vụ diễn giả">
                            <input class="marg_t10 speakers_phone" type="text" value="" id="v_txt_sdtdiengia" name="txt_sdtdiengia" placeholder="Nhập SĐT diễn giả">
                            <input class="marg_t10 speakers_email" type="text" value="" id="v_txt_emaildiengia" name="txt_emaildiengia" placeholder="Nhập Email diễn giả">
                        </div>
                        <div class="form_group">
                            <label class="name">Khách mời tham gia</label>
                            <table class="kmtg">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ và tên</th>
                                        <th>Tên công ty</th>
                                        <th>Chức vụ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list_guest">
                                    <div class="v_add_guest02">

                                    </div>
                                    <tr class="add_list_guest">
                                        <td colspan="4">
                                            <p class="add_guest">Thêm khách mời</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form_group">
                            <label class="name">Thời gian diễn ra<span class="cr_red">*</span></label>
                            <div class="d_flex space_b box_flex2" style="width: 100%; flex: left;">
                                <div class="item_flex2">
                                    <input type="date" name="date_ngay" class="date_ngay">
                                </div>
                                <div class="item_flex2">
                                    <input type="time" name="date_gio" class="date_gio">
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="name">Ảnh đại diện sự kiện<span class="cr_red">*</span></label>
                            <label for="input_file1 ">
                                <input type="file" name="file_taianhsukien" class="custom-file-img-input event_avatar" accept=".png, .jpeg, .jpg, .PNG, .JPG, .JPEG">
                                <input type="text" class="v_event_avatar_name" readonly>
                            </label>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Miêu tả sự kiện<span class="cr_red">*</span></label>
                            <textarea class="content" name="txt_mieuta" cols="3" rows="3" placeholder="Nhập miêu tả sự kiện"></textarea>
                        </div>
                        <div class="form_group v_add_file_image_dn_ud">
                            <label for="" class="name">Tải lên tệp đính kèm</label>
                            <label for="input_file1">
                                <input type="file" name="file_taitep" class="custom-file-input-dn-ud" hidden multiple>
                            </label>
                            <div class="block_name_file_dn_ud" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_dn_ud">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="name">Vị trí đăng sự kiện<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s event_position" name="select_vitri">
                                    <option value="0">Tường công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Quyền riêng tư<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s event_mode" name="select_quyen">
                                    <option value="1">Công khai</option>
                                    <option value="2">Riêng tư</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="submit">
                                <span class="v_btn_luu_span">Đăng</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                            <input type="hidden" class="new_id">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- popup tạo sự kiện đối ngoại-->

<!-- popup chia sẻ ý tưởng-->
<div class="cd-popup model_560" id="model_chiaseytuong_sdn" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chia sẻ ý tưởng</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl ">
            </div>
            <div class="cd_modal_body">
                <form class="model_chiaseytuong">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tiêu đề ý tưởng<span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_ten" class="new_title" id="v_idea_name" autocomplete="Off" placeholder="Nhập tên tiêu đề ý tưởng">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Miêu tả chi tiết ý tưởng<span class="cr_red">*</span></label>
                            <textarea id="v_idea_detail" class="content" name="txt_noidung" cols="3" rows="3" placeholder="Nhập nội dung ý tưởng"></textarea>
                        </div>
                        <div class="form_group form_group_pos">
                            <label class="name">Vị trí chia sẻ ý tưởng<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s position" id="v_idea_position" name="select_vitri">
                                    <option value="0">Toàn công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group v_add_file_image_idea">
                            <label for="" class="name">Tải lên tệp đính kèm</label>
                            <label for="input_file1" class="input_file1">
                                <input type="file" name="file" id="" class="custom-file-input-idea file" hidden multiple>
                            </label>
                            <div class="block_name_file_idea" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_upload_idea">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" id="v_huy_chia_se_y_tuong" type="button">Hủy</button>
                            <button class="btn_luu">
                                <span class="v_btn_luu_span">Đăng</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup chia sẻ ý tưởng -->
<!-- popup chia sẻ ý tưởng-->
<div class="modal cd-popup model_560" id="model_chinhsuachiaseytuong_sdn">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa chia sẻ ý tưởng</h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="model_chinhsuachiaseytuong">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Tiêu đề ý tưởng<span class="cr_red">*</span></label>
                            <input type="text" value="" name="txt_ten" class="new_title" id="v_idea_name" autocomplete="Off" placeholder="Nhập tên tiêu đề ý tưởng">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Miêu tả chi tiết ý tưởng<span class="cr_red">*</span></label>
                            <textarea id="v_idea_detail" class="content" name="txt_noidung" cols="3" rows="3" placeholder="Nhập nội dung ý tưởng"></textarea>
                        </div>
                        <div class="form_group">
                            <label class="name">Vị trí chia sẻ ý tưởng<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s position" name="select_vitri">
                                    <option value="0">Toàn công ty</option>
                                    <?php for ($i = 0; $i < count($list_department); $i++) {
                                    ?>
                                        <option value="<?= $list_department[$i]->dep_id ?>"><?= $list_department[$i]->dep_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form_group v_update_file_image_idea">
                            <label for="" class="name">Tải lên tệp đính kèm</label>
                            <label for="input_file1" class="input_file1">
                                <input type="file" name="file_taitep" id="v_edit_file_thongbao" class="custom-file-input-ud-idea" multiple hidden>
                            </label>
                            <div class="block_name_file_ud_idea" style="display: flex;">
                                <img class="icon_upload_file_discuss" src="../img/img39.png" alt="Ảnh lỗi">
                                <div class="title_ud_upload_idea">Tải lên tệp đính kèm</div>
                            </div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" id="v_huy_chia_se_y_tuong" type="button">Hủy</button>
                            <button class="btn_luu">
                                <span class="v_btn_luu_span">Đăng</span>
                                <img class="v_btn_luu_img" src="../img/Spinner-1s-200px.gif" alt="Loading">
                            </button>
                            <input type="hidden" value="" class="new_id">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end popup chia sẻ ý tưởng -->
<!-- popup tung su kien nhan vien 1-->

<!-- xóa -->
<div class="cd-modal-del xoa-sk-nhan-vien">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa sự kiện</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có muốn xóa nội dung sự kiện này? </b></p>
                            <p class="p_popup_del">Tất cả thông tin sẽ được lưu tự động vào <b>Đã xóa gần
                                    đây</b> trong
                                thời gian 05 ngày trước khi bị xóa vĩnh viễn</p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy btl-dong-sk-nhan-vien" type="button">Đóng</button>
                            <button class="btn_luu btl-xoa-sk-nhan-vien" type="button">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end xóa -->

<!-- pupop xoa -->
<div class="cd-cuccess xoa-sknv">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="form_success">
                <div class="img_success">
                    <img src="../img/img12.png" alt="Ảnh lỗi">
                </div>
                <div class="text_success">
                    <p class="text1">Bạn đã xóa sự kiện thành công </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end popup xoa -->

<!-- popup tham gia -->
<div class="cd-cuccess thamgia-sknv">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="form_success">
                <div class="img_success">
                    <img src="../img/img12.png" alt="Ảnh lỗi">
                </div>
                <div class="text_success">
                    <p class="text1">Bạn đã tham gia sự kiện thành công </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end popup tham gia -->

<!-- poup lu sk -->
<div class="cd-cuccess luu-sknv">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="form_success">
                <div class="img_success">
                    <img src="../img/img12.png" alt="Ảnh lỗi">
                </div>
                <div class="text_success">
                    <p class="text1">Bạn đã lưu sự kiện thành công </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end popup luu sk -->

<!-- popup xem chi tiet -->
<div class="modal cd-popup popup_create_message vd7_xemchitiet_sk" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header title_event">
                    <img data-id="" class="imgskgiaoluu img_edit_event" src="../img/skgiaoluu.png" alt="Ảnh lỗi">
                </h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="fndskl" data-id="" method="" action="">
                    <div class="form-body">
                        <div class="adsda">
                            <label for="" class="name nd">Nội dung sự kiện: </label>
                            <div>
                                <p class="pgl content_event"></p>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Vị trí đăng sự kiện: <span class="spanvt location">Tường công ty</span></label>
                        </div>
                        <div class="form_group">
                            <label class="name">Thành viên tham gia</label>
                            <div class="thanh-vien-all member_event">
                                
                            </div>
                            <div class="form_select2">
                                <select class="select2_muti_tv list_ep" multiple name="select2_tv[]">
                                </select>
                            </div>
                        </div>
                        <div class="form_group form_create_question" data-id="">
                            <label class="name">Danh sách câu hỏi trong sự kiện<span class="cr_red">*</span></label>
                            <div class="cau-hoi-sk-all question_popup">
                            </div>
                            <input type="text" value="" name="txt_email" class="cauhoi" placeholder="Mời bạn đặt câu hỏi cho diễn giả tại đây">
                            <div class="btn_them_cau_hoi" >Thêm câu hỏi</div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu luu-thong" type="submit">Mời tham gia</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end popup xem chi tiet -->

<!-- poupup chinh sua sk giao luu-->
<div class="cd-popup popup_create_message vd8_chinhsua_sk" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header edit_title_nb">Chỉnh sửa sự kiện giao lưu với tổng giám đốc công ty </h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" id="csskgl" method="" action="">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Nội dung sự kiện<span class="cr_red">*</span></label>
                            <input class="edit_content_nb" type="text" value="" name="csskgl_ndsk" placeholder="Nhập nội dung">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Vị trí đăng sự kiện<span class="cr_red">*</span></label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s department_edit_nb" name="select_truong_company">
                                    <option value="" disabled selected>Chọn trường công ty</option>
                                </select>
                            </div>
                        </div>

                        <div class="form_group">
                            <label class="name">Thành viên tham gia</label>
                            <div class="thanh-vien-all edit_member_event_nb">
                                <div class="img-thanhvien">
                                    <div><img src="../img/lethuthu.png" alt="Ảnh lỗi"></div>
                                    <div class="tetx-thanh-vien">
                                        <p class="text-tv1">Phạm Văn Minh</p>
                                        <p class="text-tv2">Quản trị</p>
                                        <p class="text-tv3">ID:123456</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form_select2">
                                <select class="select2_muti_tv edit_list_ep_nb" multiple name="select2_tv[]">
                                </select>
                            </div>
                        </div>
                        <div class="form_group form_create_question" data-id="">
                            <label class="name">Danh sách câu hỏi trong sự kiện<span class="cr_red">*</span></label>
                            <div class="cau-hoi-sk-all  question_popup edit_question_popup_nb">
                            </div>
                            <input type="text" value="" name="txt_email" class="cauhoi" placeholder="Mời bạn đặt câu hỏi cho diễn giả tại đây">
                            <div class="btn_them_cau_hoi">Thêm câu hỏi</div>
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

<!-- xem chi tiet doi ngoai -->
<div class="modal cd-popup popup_create_message vd9_xemchitiet_dn" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header title_dn">
                    <img class="xemchitiet-dn" src="../img/skgiaoluu.png" alt="Ảnh lỗi">
                </h4>
                <img data-dimiss="modal" src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="csgl_giamdoc" method="" action="">
                    <div class="form-body">
                        <div class="form_group xemnoidung-all">
                            <label class="name xemnoidung">Nội dung sự kiện:</label>
                            <div class="text-xemnoidung">
                                <p class="content_dn"></p>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Vị trí đăng sự kiện:<span class="spanvt location_dn"> </span></label>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Quyền riêng tư:<span class="spanvt event_mode_dn"> Công
                                    khai</span>
                                </label>

                        </div>
                        <div class="form_group vd9xemsk-dn">
                            <label for="" class="name">Thông tin diễn giả:</label>
                            <div class="tacgia">
                                <div class="imgtacgia"><img class="image_dg" src="../img/new_feed/event/event_doi_ngoai/speakers_avatar/" alt="Ảnh lỗi"></div>
                                <div class="text-tacgia">
                                    <p class="text-tacgia1 ten_dg"></p>
                                    <p class="text-tacgia2 chuc_vu_dg"></p>
                                    <p class="text-tacgia2 sdt_dg"></p>
                                    <p class="text-tacgia2 email_dg"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form_group ">
                            <label for="" class="name">Khách mời tham gia:</label>
                            <div class="table">
                                <table class="table-dn list_table-dn">
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ và tên</th>
                                        <th>Tên công ty</th>
                                        <th>Chức vụ</th>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="form_group">
                            <label class="name">Thành viên tham gia</label>
                            <div class="thanh-vien-all member_event_dn">
                            </div>
                            <div class="form_select2">
                                <select class="select2_muti_tv list_ep_dn" multiple name="select2_tv[]">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form_group form_create_question" data-id="">
                            <label class="name">Danh sách câu hỏi trong sự kiện<span class="cr_red">*</span></label>
                            <div class="cau-hoi-sk-all question_popup">
                                <!-- <div class="img-cauhoi-sk">
                                    <div class="imgcauhoi"><img src="../img/lethuthu.png" alt="Ảnh lỗi"></div>
                                    <div class="text-cauhoi-sk">
                                        <div class="text-cauhoi-sk-tren">
                                            <p class="text-ch1">Phạm Văn Minh<span class="text2">Quản trị</span>
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
                                            <p class="text-ch1">Phạm Văn Minh<span class="text2">Quản trị</span>
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
                                            <p class="text-ch1">Phạm Văn Minh<span class="text2">Quản trị</span>
                                            </p>
                                            <p class="text-ch3">Đây là câu
                                                hỏiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
                                            </p>
                                        </div>
                                        <p class="text-ch4">14h30 25.01.2020</p>
                                    </div>
                                </div> -->
                            </div>
                            <input type="text" value="" name="txt_email" class="cauhoi" placeholder="Mời bạn đặt câu hỏi cho diễn giả tại đây">
                            <div class="btn_them_cau_hoi">Thêm câu hỏi</div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="">Hủy</button>
                            <button class="btn_luu">Mời tham gia</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end xem chi tiet doi ngoai -->


<div class="cd-popup popup_create_message vd10_chinhsua_sk" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header title_edit_dn"></h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="vd10cssk" method="" action="">
                    <div class="form-body">
                        <div class="form_group">
                            <label class="name">Nội dung sự kiện</label>
                            <input type="text" class="content_edit_dn" value="" name="txt_ndsk10" placeholder="Giao lưu, trao đổi công việc, chia sẻ kiến thức và kinh nghiệm">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Vị trí đăng sự kiện</label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s department_edit" name="select_truong_company">
                                    <option value="" disabled selected>Chọn trường công ty</option>
                                    <!-- <option value="1">Tường công ty</option>
                                    <option value="2">Phòng kỹ thuật</option>
                                    <option value="3">Phòng kinh doanh</option>
                                    <option value="4">Phòng nhân sự</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Quyền riêng tư</label>
                            <div class="select_no_muti_li">
                                <select class="select2_t_company select2s quyen_edit_dn" name="select_truong_company">
                                    <option value="" disabled selected>Chọn trường công ty</option>
                                    <option value="1">Công khai</option>
                                    <option value="2">Riêng tư</option>

                                </select>
                            </div>
                        </div>
                        <div class="form_group">
                            <label class="name">Thông tin diễn giả</label>
                            <label for="input_file1">
                                <input class="ttip1 edit_img_dg_dn" type="text" value="" name="vd10_name" disabled placeholder="Chọn ảnh">
                                <input type="file" onclick="open_file();" name="anh10" class="custom-file-img-input" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
                            </label>
                        </div>
                        <div class="form_group">
                            <label for="input_file1 cl">
                                <input class="ttip1 edit_name_dg_dn" type="text" value="" name="vd10_name" placeholder="Trần Minh Khải">
                            </label>
                        </div>
                        <div class="form_group">
                            <label for="input_file1">
                                <input class="ttip1 edit_chucvu_dg_dn" type="text" value="" name="vd10_chucvu" placeholder="Chức vụ: Giám đốc vận hành">
                            </label>
                        </div>
                        <div class="form_group">
                            <label for="input_file1">
                                <input class="ttip1 edit_sdt_dg_dn" type="text" value="" name="vd10_sdt" placeholder="Số điện thoại: 0123456789">
                                <!-- oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" -->
                            </label>
                        </div>
                        <div class="form_group">
                            <label for="input_file1">
                                <input class="ttip1 email10 edit_email_dg_dn" type="text" value="" name="vd10_mail" placeholder="Email:name@gmail.com ">
                            </label>
                        </div>


                        <div class="form_group ">
                            <label for="" class="name">Khách mời tham gia:</label>
                            <div class="table">
                                <table class="table-dn edit_khach_dn">
                                    <tr>
                                        <th>Stt</th>
                                        <th>Họ và tên</th>
                                        <th>Tên công ty</th>
                                        <th>Chức vụ</th>
                                        <th></th>
                                    </tr>
                                </table>
                                    <div id="table-vd10dn">
                                        <div class="themkhach-moi" ><a class="athems" href="#" style="text-decoration: underline;">Thêm khách mời</a></div>
                                    </div>
                            </div>
                        </div>

                        <div class="form_group">
                            <label class="name">Thành viên tham gia</label>
                            <div class="thanh-vien-all edit_member_event_dn">
                            </div>
                            <div class="form_select2">
                                <select class="select2_muti_tv edit_list_ep_dn" multiple name="select2_tv[]">
                                </select>
                            </div>
                        </div>
                        <div class="form_group form_create_question" data-id="">
                            <label class="name">Danh sách câu hỏi trong sự kiện<span class="cr_red">*</span></label>
                            <div class="cau-hoi-sk-all question_popup edit_question_popup_dn">
                                <!-- <div class="img-cauhoi-sk">
                                    <div class="imgcauhoi">
                                        <img src="../img/lethuthu.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text-cauhoi-sk">
                                        <div class="text-cauhoi-sk-tren">
                                            <p class="text-ch1">Phạm Văn Minh<span class="text2">Quản trị</span>
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
                                            <p class="text-ch1">Phạm Văn Minh<span class="text2">Quản trị</span>
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
                                            <p class="text-ch1">Phạm Văn Minh<span class="text2">Quản trị</span>
                                            </p>
                                            <p class="text-ch3">Đây là câu
                                                hỏiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
                                            </p>
                                        </div>
                                        <p class="text-ch4">14h30 25.01.2020</p>
                                    </div>
                                </div> -->
                            </div>
                            <input type="text" value="" name="txt_email" class="cauhoi" placeholder="Mời bạn đặt câu hỏi cho diễn giả tại đây">
                            <div class="btn_them_cau_hoi">Thêm câu hỏi</div>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu vd10" type="sudmit">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- xóa sk noi bo -->
<div class="cd-modal-del vd11xoa-sk-noibo">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa sự kiện</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có muốn xóa nội dung sự kiện này? </b></p>
                            <p class="p_popup_del">Tất cả thông tin sẽ được lưu tự động vào <b>Đã xóa gần
                                    đây</b> trong
                                thời gian 05 ngày trước khi bị xóa vĩnh viễn</p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy huy-xoa-sknb" type="">Đóng</button>
                            <button class="btn_luu dy-xoa-sknb">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validate() {
        let $a = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        let $b = "vd10_mail";
        if (!preg_match($a, $b, $c))
            alert("sai");
    }
</script>

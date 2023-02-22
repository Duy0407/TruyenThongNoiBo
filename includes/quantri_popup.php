<!-- them tai lieu -->
<div class="cd-popup  qt-them-tl" id="">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Thêm tài liệu</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form id="form_themtailieu" method="POST" action="../handle/create_document.php" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="form_group">
                            <label for="" class="name" >Tên tài liệu<span class="cr_red">*</span></label>
                            <input type="text" class="frm_input" name="name" placeholder="Nhập tài liệu " autocomplete="Off">
                        </div>
                        <div class="form_group">
                            <label for="" class="name" >Tên tác giả<span class="cr_red">*</span></label>
                            <input type="text" class="frm_input" name="author" placeholder="Nhập tài liệu " autocomplete="Off">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Lĩnh vực đề cập<span class="cr_red">*</span></label>
                            <input type="text" value="" name="field" placeholder="Nhập nội dung" autocomplete="Off">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Mô tả ngắn<span class="cr_red">*</span></label>
                            <textarea class="" cols="3" rows="3" name="description" placeholder="Nhập nội dung" autocomplete="Off"></textarea>
                        </div>
                        <div class="form_group input_xanh">
                            <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                            <label for="input_file1">
                                <input type="file" name="file" class="custom-file-input">
                            </label>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy v_btn_huy_document" type="button">Hủy</button>
                            <button  class="btn_luu v_btn_luu_document" name="btn_document" value="btn_document" type="submit">Tạo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- tải -->
<div class="cd-cuccess li_model_con">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="form_success">
                <div class="img_success">
                    <img src="../img/img12.png" alt="Ảnh lỗi">
                </div>
                <div class="text_success">
                    <p class="text1">Bạn đã tải xuống tài liệu Abc thành công</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- chỉnh sửa thông tin tài liệ -->
<div class="cd-popup modal_popup_tn_tl chinh-sua-tttl" id="" style="">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Chỉnh sửa thông tin tài liệu</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form  id="cstttl" class="" method="POST" action="../handle/update_document.php">
                    <div class="form-body">
                        <div class="form_group">
                            <label for="" class="name">Tên tài liệu<span class="cr_red">*</span></label>
                            <input type="text" class="frm_input name" name="name" placeholder="Tài liệu Abc">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Tên tác giả<span class="cr_red">*</span></label>
                            <input type="text" class="frm_input author" name="author" placeholder="Tài liệu Abc">
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Lĩnh vực đề cập<span class="cr_red">*</span></label>
                            <input type="text" class="frm_input field" name="field" placeholder="Kinh doanh - công nghệ">
                        </div>

                        <div class="form_group">
                            <label for="" class="name">Mô tả ngắn<span class="cr_red">*</span></label>
                            <textarea class="description" cols="3" rows="3" name="description" placeholder="Nhập nội dung câu hỏi"></textarea>
                        </div>

                        <div class="form_group input_xanh">
                            <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                            <label for="input_file1" class="input_file1">
                                <input type="text" class="name_file" readonly>
                                <img src="../img/img4.png" class="img4" alt="Ảnh lỗi">
                                <input type="file" name="file" class="custom-file-input file">
                            </label>
                        </div>


                        <div class="form_buttom v_form_bottom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu knowledge_id" type="submit" name="btn_update_document">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- //trao doi cau hoi// -->
<div class="cd-popup modal_popup_tn_tl traodoi-cauhoi" >
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Trao đổi - đặt câu hỏi</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="tdch" method="POST" action="../handle/create_knowledge_answer.php" enctype="multipart/form-data" >
                    <div class="form-body">
                        <div class="form_group">
                            <label for="" class="name">Tên tài liệu<span class="cr_red">*</span></label>
                            <input type="text" class="frm_input document_name" name="document_name" placeholder="Tài liệu Abc" autocomplete="Off" readonly>
                        </div>
                        <div class="form_group">
                            <label for="" class="name">Nội dung câu hỏi<span class="cr_red">*</span></label>
                            <textarea class="" cols="3" rows="3" name="content" placeholder="Nhập nội dung câu hỏi"></textarea>
                        </div>

                        <div class="form_group input_xanh">
                            <label for="" class="name">Tệp đính kèm<span class="cr_red">*</span></label>
                            <label for="input_file1" class="input_file1">
                                <input type="text" name="file" class="custom-file-input custom-name-file-input" readonly>
                                <img src="../img/input_file.png" class="input_file_icon" alt="Ảnh lỗi">
                                <input type="hidden" class="v_file_detail_doc" name="file_detail" value="" hidden readonly>
                            </label>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu btn_luu_knowledge_answer" name="knowledge_id" type="sudmit" value="">Tạo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- xóa -->
<div class="cd-modal-del xoa-tai-lieu">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa tài liệu</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc muốn xóa thông tin tài liệu Abc? </b></p>
                            <p class="p_popup_del">Tất cả thông tin sẽ được lưu tự động vào <b>Đã xóa gần đây</b>
                            trong thời gian 05 ngày trước khi bị xóa vĩnh viễn</p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu btn_del_document" type="button">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /xóa thành công// -->
<div class="cd-cuccess xoa-thanh-cong" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="form_success">
                <div class="img_success">
                    <img src="../img/img12.png" alt="Ảnh lỗi">
                </div>
                <div class="text_success">
                    <p class="text1">Bạn đã xóa tài liệu Abc thành công</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- bat thong bao cho cau hoi -->
<div class="cd-modal-del bat-thong-bao-ch">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Bật thông báo câu hỏi</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có muốn nhận thông báo cho câu hỏi này? </b></p>
                            <p class="p_popup_del">Tất cả các thay đổi mà câu hỏi cập nhật</p> <p style="text-align: center">sẽ được gửi tới thông báo của bạn</p>


                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy huy-thong-bao" type="button">Hủy</button>
                            <button class="btn_luu bat-thong-bao" type="button">Bật thông báo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- xoa cau hoi -->
<div class="cd-modal-del xoa-cau-hoi">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa câu hỏi</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc muốn xóa câu hỏi của người này? </b></p>
                            <p class="p_popup_del">Bài viết này sẽ không thể khôi phục do không được</p> <p class="p_popup_del" style="text-align: center">lưu tại bộ nhớ tạm của hệ thống</p>


                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy huy-xoa-cau-hoi" type="button">Hủy</button>
                            <button class="btn_luu xoa-choi" type="button">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- xoa bình luận -->
<div class="cd-modal-del xoa-binh-luan" id="xoa-binh-luan">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa bình luận</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc muốn xóa bình luận này không? </b></p>
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy huy-xoa-binh-luan" type="button">Hủy</button>
                            <button class="btn_luu xoa-bl-1" type="button">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- xoa thanh cong cau hoi -->
<div class="cd-cuccess xoa-thanh-cong-cauhoi" style="display: none;">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="form_success">
                <div class="img_success">
                    <img src="../img/img12.png" alt="Ảnh lỗi">
                </div>
                <div class="text_success">
                    <p class="text1">Bạn đã xóa câu hỏi thành công</p>
                </div>
                <div class="form_buttom">
                    <button class="btn_huy dong-xoa-ch" type="button">Đóng</button>
                    <button class="btn_luu hoantac-xoa-ch" type="button">Hoàn tác (5s)</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cd-popup modal_popup_tn_tl cs-ch-cuatoi" id="" style="display: none;" >
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Sửa câu hỏi</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="form_group">
                            <label for="" class="name" >Nội dung câu hỏi<span class="cr_red">*</span></label>
                            <textarea name="content" class="textarea_cheditor" id="content" placeholder="Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi.  Đây là câu hỏi. Đây là câu hỏi. Đây là câu hỏi.  Đây là câu hỏi.  "></textarea>
                        </div>
                        <div class="form_group input_xanh">
                            <label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
                            <label for="input_file1">
                                <input type="file" name=""  class="custom-file-input" multiple >
                            </label>
                        </div>                                                  
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="button">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="cd-modal-del xoa-bai-chct " style="display: none">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="cd_modal_header">
                <h4 class="name_header">Xóa câu hỏi</h4>
                <img src="../img/dau_x.png" alt="Ảnh lỗi" class="close_detl">
            </div>
            <div class="cd_modal_body">
                <form class="" method="" action="">
                    <div class="form-body">
                        <div class="row_modal_del">
                            <p class="p_popup_del"><b>Bạn có chắc muốn xóa câu hỏi của người này? </b></p>
                            <p class="p_popup_del">Bài viết này sẽ không thể khôi phục do không được <b> lưu tại bộ nhớ tạm của hệ thống</b> 
                        </div>
                        <div class="form_buttom">
                            <button class="btn_huy" type="button">Hủy</button>
                            <button class="btn_luu" type="button">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- xoa -cau bai hoi cua toi thành công -->
<div class="cd-cuccess xoa-thanhcong-bai-chct"  style="display: none ">
    <div class="cd_container">
        <div class="cd_modal">
            <div class="form_success">
                <div class="img_success">
                    <img src="../img/img12.png" alt="Ảnh lỗi">
                </div>
                <div class="text_success">
                    <p class="text1">Bạn đã xóa câu hỏi thành công</p>
                </div>
                <div class="form_buttom">
                    <button class="btn_huy" type="button">Đóng</button>
                    <button class="btn_luu" type="button">Hoàn tác (5s)</button>
                </div>
            </div>
        </div>
    </div>
</div>
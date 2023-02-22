<div class="add_work">
    <div class="add_work_detail">
        <div class="add_work_header">
            Thêm mới nơi làm việc
            <img class="turnoff_add_work" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="add_work_body">
            <div class="add_work_body_detail">
                <p class="add_work_body_title">Công ty <span class="require">*</span></p>
                <input class="add_work_input add_work_input_1" type="text" placeholder="Nhập tên công ty">
                <div class="error"></div>
            </div>
            <div class="add_work_body_detail">
                <p class="add_work_body_title">Chức vụ <span class="require">*</span></p>
                <input class="add_work_input add_work_input_2" type="text" placeholder="Nhập chức vụ">
                <div class="error"></div>
            </div>
            <div class="add_work_body_detail">
                <p class="add_work_body_title">Thành phố / Thị xã <span class="require">*</span></p>
                <input class="add_work_input add_work_input_3" type="text" placeholder="Nhập thành phố thị xã">
                <div class="error"></div>
            </div>
            <div class="add_work_body_detail2">
                <p class="add_work_body_title add_work_body_title2">Chế độ</p>
                <button class="gr_select_regime add_work_btn">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="add_work_checkbox">
                <input class="add_work_checkbox_input" type="checkbox">
                <p class="add_work_checkbox_title">Tôi đang làm việc ở đây</p>
            </div>
            <div class="add_work_btn2">
                <button class="add_work_cancel">Hủy</button>
                <button class="add_work_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="delete_work2">
    <div class="delete_work_detail">
        <div class="delete_work_header">
            Xóa nơi làm việc
        </div>
        <div class="delete_work_body">
            <p class="delete_work_title">Bạn có chắc chắn muốn xóa nơi làm việc này khỏi trang cá nhân của mình không?
            </p>
            <div class="delete_work_btn">
                <button class="delete_work_cancel">Hủy</button>
                <button class="delete_work_del">Xóa</button>
            </div>
        </div>
    </div>
</div>

<div class="add_school">
    <div class="add_school_detail">
        <div class="add_school_header">
            Thêm mới trường học
            <img class="turnoff_popup_add_school" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="add_school_body">
            <div class="add_school_item">
                <p class="add_school_title">Trường học <span class="require">*</span></p>
                <input class="add_school_input add_school_input_1" type="text" placeholder="Nhập tên trường học">
                <div class="error"></div>
            </div>
            <div class="add_school_item">
                <p class="add_school_title">Khoảng thời gian <span class="require">*</span></p>
                <input type="date" class="add_school_time add_school_time_fr">
                Đến
                <input type="date" class="add_school_time add_school_time_to">
                <div class="error"></div>
            </div>
            <div class="add_school_item2">
                <input class="add_school_item_checkbox" type="checkbox">
                <p class="add_school_item2_title">Đã tốt nghiệp</p>
            </div>
            <div class="add_school_item">
                <p class="add_school_title">Chuyên ngành</p>
                <input class="add_school_input add_school_input_2" type="text" placeholder="Nhập chuyên ngành">
            </div>
            <div class="add_school_item2">
                <p class="add_school_title add_school_title3">Chế độ</p>
                <button class="gr_select_regime">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="add_school_item2 add_school_item3">
                <button class="add_school_cancel">Hủy</button>
                <button class="add_school_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="country">
    <div class="country_detail">
        <div class="country_header">
            Chỉnh sửa quê quán
            <img class="turnoff_country" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <form class="country_body">
            <div>
                <p class="country_title">Quê quán</p>
                <select class="country_select" name="" id="infor_home_town">
                    <option value="0">--Chọn tỉnh, thành phố--</option>
                    <?php foreach ($list_city as $key=>$value) { ?>
                        <option value="<?=$key?>"><?=$value?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="error"></div>
            <div class="country_box">
                <p class="country_title country_title2">Chế độ</p>
                <button class="gr_select_regime" type="button">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="country_btn2">
                <button class="country_cancel" type="button">Hủy</button>
                <button class="country_save">Lưu</button>
            </div>
        </form>
    </div>
</div>

<div class="city modal">
    <div class="country_detail">
        <div class="country_header">
            <p class="modal_header_title">Chỉnh sửa thành phố hiện tại</p>
            <img data-dimiss="modal" class="turnoff_country" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="country_body">
            <div>
                <p class="country_title">Thành phố hiện tại</p>
                <select class="country_select" name="" id="infor_city">
                    <option value="0">--Chọn tỉnh, thành phố--</option>
                    <?php foreach ($list_city as $key=>$value) { ?>
                        <option value="<?=$key?>"><?=$value?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="error"></div>
            <div class="country_box">
                <p class="country_title country_title2">Chế độ</p>
                <button class="gr_select_regime" type="button">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="country_btn2">
                <button class="country_cancel" type="button" data-dimiss="modal">Hủy</button>
                <button class="country_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="phone">
    <div class="country_detail">
        <div class="country_header">
            Chỉnh sửa số điện thoại
            <img class="turnoff_phone" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="country_body">
            <p class="country_title">Số điện thoại <span class="require">*</span></p>
            <input class="phone_input" type="text" placeholder="Thêm số điện thoại">
            <div class="error"></div>
            <div class="country_box">
                <p class="country_title country_title2">Chế độ</p>
                <button class="gr_select_regime" type="button">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="country_btn2">
                <button class="phone_cancel" type="button">Hủy</button>
                <button class="country_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="gioi-thieu-ban-than">
    <div class="country_detail">
        <div class="country_header">
            Chỉnh sửa giới thiệu về bản thân
            <img class="turnoff_intro" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="country_body">
            <p class="country_title">Giới thiệu về bản thân <span class="require">*</span></p>
            <textarea class="intro_input" name="" id="" style="height: 100px;"></textarea>
            <div class="error"></div>
            <div class="country_box">
                <p class="country_title country_title2">Chế độ</p>
                <button class="gr_select_regime" type="button">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="country_btn2">
                <button class="intro_cancel" type="button">Hủy</button>
                <button class="country_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="add_nickname">
    <div class="country_detail">
        <div class="country_header">
            Thêm biệt danh
            <img class="turnoff_add_nickname" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="country_body">
            <p class="country_title">Biệt danh <span class="require">*</span></p>
            <input type="text" class="intro_input" name="" id="" placeholder="Nhập biệt danh">
            <div class="error"></div>
            <div class="country_box">
                <p class="country_title country_title2">Chế độ</p>
                <button class="gr_select_regime" type="button">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="country_btn2">
                <button class="add_nickname_cancel" type="button">Hủy</button>
                <button class="country_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="quote">
    <div class="country_detail">
        <div class="country_header">
            Thêm trích dẫn yêu thích
            <img class="turnoff_quote" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="country_body">
            <p class="country_title">Trích dẫn yêu thích <span class="require">*</span></p>
            <textarea class="intro_input" name="" id="" style="height: 100px;" placeholder="nhập trích dẫn yêu thích"></textarea>
            <div class="error"></div>
            <div class="country_box">
                <p class="country_title country_title2">Chế độ</p>
                <button class="gr_select_regime" type="button">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="country_btn2">
                <button class="quote_cancel" type="button">Hủy</button>
                <button class="country_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="diachi_lienhe modal" id="diachi_lienhe">
    <div class="modal_content">
        <div class="modal_header">
            <span class="modal_header_title">Thêm địa chỉ liên hệ</span>
            <img class="" data-dimiss="modal" src="/img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="modal_body add_work_body">
            <div class="add_work_body_detail">
                <p class="add_work_body_title">Địa chỉ</p>
                <input class="add_work_input" type="text" placeholder="Nhập địa chỉ">
            </div>
            <div class="add_work_body_detail2">
                <p class="add_work_body_title add_work_body_title2">Chế độ</p>
                <button class="gr_select_regime add_work_btn">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="add_work_btn2">
                <button class="add_work_cancel" data-dimiss="modal">Hủy</button>
                <button class="add_work_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="diachi_lienhe modal" id="language">
    <div class="modal_content">
        <div class="modal_header">
            <span class="modal_header_title">Ngôn ngữ</span>
            <img class="" data-dimiss="modal" src="/img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="modal_body add_work_body">
            <select name="" id="select_lang" class="select_multi" multiple>
                <option value="1">Tiếng Việt</option>
                <option value="2">Tiếng Anh</option>
                <option value="3">Tiếng Pháp</option>
                <option value="4">Tiếng Nga</option>
                <option value="5">Tiếng Tây Ban Nha</option>
                <option value="6">Tiếng Bồ Đào Nha</option>
                <option value="7">Tiếng Trung</option>
                <option value="8">Tiếng Hàn</option>
                <option value="9">Tiếng Nhật</option>
            </select>
            <div class="add_work_body_detail2">
                <p class="add_work_body_title add_work_body_title2">Chế độ</p>
                <button class="gr_select_regime add_work_btn">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="add_work_btn2">
                <button class="add_work_cancel" data-dimiss="modal">Hủy</button>
                <button class="add_work_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="diachi_lienhe modal" id="religion">
    <div class="modal_content">
        <div class="modal_header">
            <span class="modal_header_title">Quan điểm tôn giáo</span>
            <img class="" data-dimiss="modal" src="/img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="modal_body add_work_body">
            <div class="add_work_body_detail">
                <input class="add_work_input input_religion" type="text" placeholder="Quan điểm tôn giáo">
            </div>
            <div class="add_work_body_detail">
                <textarea name="" id="" class="add_infor_txtarea txtarea_religion" placeholder="Mô tả"></textarea>
            </div>
            <div class="add_work_body_detail2">
                <p class="add_work_body_title add_work_body_title2">Chế độ</p>
                <button class="gr_select_regime add_work_btn">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="add_work_btn2">
                <button class="add_work_cancel" data-dimiss="modal">Hủy</button>
                <button class="add_work_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="diachi_lienhe modal" id="sex">
    <div class="modal_content">
        <div class="modal_header">
            <span class="modal_header_title">Chỉnh sửa giới tính</span>
            <img class="" data-dimiss="modal" src="/img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="modal_body add_work_body">
            <div class="add_work_body_detail">
                <p class="add_work_body_title">Giới tính</p>
                <select class="country_select" name="" id="">
                    <?php foreach ($arr_sex as $key => $value) { ?>
                        <option value="<?=$key?>"><?=$value?></option>
                    <?php } ?>
                </select>
                <div class="error">
                </div>
            </div>
            <div class="add_work_body_detail2">
                <p class="add_work_body_title add_work_body_title2">Chế độ</p>
                <button class="gr_select_regime add_work_btn">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="add_work_btn2">
                <button class="add_work_cancel" data-dimiss="modal">Hủy</button>
                <button class="add_work_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="diachi_lienhe modal" id="dob">
    <div class="modal_content">
        <div class="modal_header">
            <span class="modal_header_title">Chỉnh sửa sinh nhật</span>
            <img class="" data-dimiss="modal" src="/img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="modal_body add_work_body">
            <div class="add_work_body_detail">
                <p class="add_work_body_title">Ngày sinh</p>
                <input class="add_work_input" type="date">
            </div>
            <div class="add_work_body_detail2">
                <p class="add_work_body_title add_work_body_title2">Chế độ</p>
                <button class="gr_select_regime add_work_btn">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="add_work_btn2">
                <button class="add_work_cancel" data-dimiss="modal">Hủy</button>
                <button class="add_work_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="diachi_lienhe modal" id="relationship">
    <div class="modal_content">
        <div class="modal_header">
            <span class="modal_header_title">Mối quan hệ</span>
            <img class="" data-dimiss="modal" src="/img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="modal_body add_work_body">
            <div class="add_work_body_detail">
                <select class="country_select" name="" id="infor_relative">
                    <option value="0">Trạng thái</option>
                    <?php foreach ($arr_relative_status as $key => $value) { ?>
                        <option value="<?=$key?>"><?=$value?></option>
                    <?php } ?>
                </select>
            </div>
            <p class="gr_intro_regime">Thay đổi sẽ không xuất hiện trên bảng tin</p>
            <div class="add_work_body_detail2">
                <p class="add_work_body_title add_work_body_title2">Chế độ</p>
                <button class="gr_select_regime add_work_btn">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="add_work_btn2">
                <button class="add_work_cancel" data-dimiss="modal">Hủy</button>
                <button class="add_work_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="diachi_lienhe modal" id="family">
    <div class="modal_content">
        <div class="modal_header">
            <span class="modal_header_title">Người thân</span>
            <img class="" data-dimiss="modal" src="/img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="modal_body add_work_body">
            <div class="add_work_body_detail">
                <select class="country_select" name="" id="select_user">
                    <option value="0">Thành viên gia đình</option>
                    <?php foreach ($my_friend as $value) { ?>
                        <option value="<?=$value['id365']?>"><?=$value['userName']?></option>
                    <?php } ?>
                </select>
                <div class="error">
                </div>
            </div>
            <div class="add_work_body_detail">
                <select class="country_select" name="" id="select_relative">
                    <option value="0">Mối quan hệ</option>
                    <?php foreach ($arr_relative as $key => $value) { ?>
                        <option value="<?=$key?>"><?=$value?></option>
                    <?php } ?>
                </select>
                <div class="error">
                </div>
            </div>
            <div class="add_work_body_detail2">
                <p class="add_work_body_title add_work_body_title2">Chế độ</p>
                <button class="gr_select_regime add_work_btn">
                    <img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">
                    Công khai
                    <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <div class="add_work_btn2">
                <button class="add_work_cancel" data-dimiss="modal">Hủy</button>
                <button class="add_work_save">Lưu</button>
            </div>
        </div>
    </div>
</div>
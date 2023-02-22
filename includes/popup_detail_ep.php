<div class="popup_them_so_thich modal" id="popup_them_so_thich">
    <div class="modal_content">
        <span data-dimiss="modal">&#10005;</span>
        <div class="modal_body">
            <p class="modal_title">Thêm sở thích</p>
            <p class="modal_txt">Bạn thích làm gì? Hãy chọn các sở thích phổ biến dưới đây hoặc thêm sở thích khác nhé.
            </p>
            <div class="popup_item_so_thich">
                <input type="text" name="" placeholder="Nhập sở thích" class="popup_item_so_thich_input">
                <p class="so_thich_rest_char">Còn <span class="so_thich_rest_char_num">25</span> ký tự</p>
            </div>
            <button class="them_so_thich_btn">
                <span class=""><img src="/img/nv_add-circle_blue.svg" alt=""></span> Thêm sở thích
            </button>
        </div>
        <div class="modal_footer">
            <button class="cancel_btn">Hủy</button>
            <button class="save_btn">Lưu</button>
        </div>
    </div>
</div>
<?php $list_colection = [
    [
        'name' => "Bộ sưu tập 1",
        'updated_time' => time() - 86400*20,
        'avatar' => '',
        'images' => 'https://images.unsplash.com/photo-1637822412451-d5493731bef1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80,https://images.unsplash.com/photo-1666756235183-4135881d60bb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1382&q=80,https://images.unsplash.com/photo-1600039806328-6c0dca622aef?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'
    ],
    [
        'name' => "Bộ sưu tập 2",
        'updated_time' => time() - 86400*2,
        'avatar' => '',
        'images' => 'https://images.unsplash.com/photo-1626494988966-4c3a81b3e056?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80,https://images.unsplash.com/photo-1666845523875-a819efe78321?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1894&q=80'
    ],
    [
        'name' => "Bộ sưu tập 3",
        'updated_time' => time() - 86400*12,
        'avatar' => '',
        'images' => 'https://images.unsplash.com/photo-1666668321985-105042873ddc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80'
    ]
];
$list_imgs = 'https://images.unsplash.com/photo-1666756235183-4135881d60bb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1382&q=80,https://images.unsplash.com/photo-1600039806328-6c0dca622aef?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80,https://images.unsplash.com/photo-1626494988966-4c3a81b3e056?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80,https://images.unsplash.com/photo-1666845523875-a819efe78321?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1894&q=80,https://images.unsplash.com/photo-1666668321985-105042873ddc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80';
$list_imgs = [];
?>
<div class="popup_bst popup_ds_bst modal" id="popup_ds_bst">
    <div class="modal_content">
        <span data-dimiss="modal">&#10005;</span>
        <div class="modal_header">
            Chỉnh sửa phần đáng chú ý
        </div>
        <div class="modal_body">
            <div class="list_bst">
                <?php foreach ($list_colection as $key => $value) {
                    $img = explode(',',$value['images']);
                    if ($value['avatar'] == ''){
                        $value['avatar'] = $img[0];
                    } ?>
                    <div class="item_bst">
                        <div class="v_story_detail">
                            <img class="v_story_detail_img" src="<?=$value['avatar']?>" alt="Ảnh lỗi">
                            <p class="v_story_username"><?=(count($img) > 1)?"+ ".(count($img) - 1):""?></p>
                        </div>
                        <div class="item_bst_detail">
                            <p class="popup_bst_txt_1 item_bst_detail_name"><?=$value['name']?></p>
                            <p class="popup_bst_txt_2"><?=count($img)?> mục</p>
                            <p class="popup_bst_txt_2">Cập nhật vào 1 tuần trước</p>
                        </div>
                        <button class="item_bst_edit" data-name="<?=$value['name']?>" data-avt="<?=$value['avatar']?>" data-imgs="<?=$value['images']?>"><img src="/img/nv_chinh-sua-trang-ca-nhan.svg" alt=""></button>
                    </div>
                <?php } ?>
            </div>
            <button class="popup_bst_btn them_bst_btn">Thêm mới</button>
        </div>
    </div>
</div>
<div class="popup_bst popup_edit_bst modal" id="popup_edit_bst">
    <div class="modal_content">
        <span data-dimiss="modal">&#10005;</span>
        <div class="modal_header">
            Chỉnh sửa bộ sưu tập đáng chú ý
        </div>
        <div class="modal_body">
            <div class="v_story_detail">
                <img class="v_story_detail_img" id="popup_edit_bst_avt"
                    src="https://images.unsplash.com/photo-1637822412451-d5493731bef1?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=387&amp;q=80"
                    alt="Ảnh lỗi">
                <button class="edit_bst_avt_btn">
                    <img src="/img/nv_camera.svg" alt="Ảnh lỗi">
                </button>
            </div>
            <input type="text" name="" id="edit_bst_title" placeholder="Tiêu đề">
            <div class="popup_bst_list_img">
                <div class="v_story_detail edit_bst_add_img" id="edit_bst_add_img">
                    <img src="/img/nv_add-circle_blue.svg" alt="">
                    <p class="popup_bst_txt_3">Thêm</p>
                </div>
                <!-- <input hidden checked type="checkbox" name="" id="bst_img_checkbox_0" class="popup_bst_checkbox popup_edit_bst_checkbox">
                <label for="bst_img_checkbox_0" class="popup_bst_checkbox">
                    <div class="v_story_detail">
                        <img class="v_story_detail_img" src="" alt="Ảnh lỗi">
                        <div class="check_circle"></div>
                    </div>
                </label> -->
            </div>
            <button class="del_bst_btn">
                <img src="/img/xoa-noi-lam-viec.svg" alt="">
                Xóa bộ sưu tập đáng chú ý
            </button>
        </div>
        <div class="modal_footer">
            <button class="btn_upload_regime" type="button">
                <img src="../img/gis_earth-australia-o.svg" alt="Ảnh lỗi">
                Công khai
                <img class="ls_dropdown_ep_index" src="../img/ls_dropdown_ep_index.svg" alt="Ảnh lỗi">
            </button>
            <button class="cancel_btn">Hủy</button>
            <button class="save_btn">Xong</button>
        </div>
    </div>
</div>
<div class="popup_bst popup_nd_bst modal" id="popup_nd_bst">
    <div class="modal_content">
        <span data-dimiss="modal">&#10005;</span>
        <div class="modal_header">
            Chỉnh sửa bộ sưu tập đáng chú ý
        </div>
        <div class="modal_body">
            <label for="upload_img_bst" class="popup_bst_btn">Tải ảnh lên</label>
            <input type="file" name="" id="upload_img_bst" hidden onchange="uploadImg(this)" multiple>
            <p class="popup_bst_txt_1 popup_nd_bst_txt_1 popup_bst_list_upload_img_txt">Ảnh tải lên</p>
            <div class="popup_bst_list_img popup_bst_list_upload_img">                
            </div>
            <?php if (count($list_imgs) > 0){ ?>
                <p class="popup_bst_txt_1 popup_nd_bst_txt_1">Tin</p>
                <div class="popup_bst_list_img">
                    <?php foreach ($list_imgs as $key => $value) { ?>
                    <input hidden type="checkbox" name="" id="story_img_checkbox_<?=$key?>" class="popup_bst_checkbox popup_nd_bst_checkbox">
                    <label for="story_img_checkbox_<?=$key?>">
                        <div class="v_story_detail">
                            <img class="v_story_detail_img" src="<?=$value?>" alt="Ảnh lỗi">
                            <div class="check_circle"></div>
                        </div>
                    </label>
                    <?php } ?>
                </div>
                <button class="popup_bst_see_more" data-type=1>Xem thêm</button>
            <?php } ?>
            <?php if (count($arr_img) > 0){ ?>
                <p class="popup_bst_txt_1 popup_nd_bst_txt_1">Ảnh đã tải lên</p>
                <div class="popup_bst_list_img">
                    <?php foreach ($arr_img as $key=>$value) { ?>
                    <input hidden type="checkbox" name="" id="uploaded_img_checkbox_<?=$key?>" class="popup_bst_checkbox popup_nd_bst_checkbox">
                    <label for="uploaded_img_checkbox_<?=$key?>">
                        <div class="v_story_detail">
                            <img class="v_story_detail_img" src="<?=$value['img']?>" alt="Ảnh lỗi">
                            <div class="check_circle"></div>
                        </div>
                    </label>
                    <?php if ($key > 10) break;
                    } ?>
                </div>
                <button class="popup_bst_see_more" data-type=2>Xem thêm</button>
            <?php } ?>
            <p class="popup_bst_txt_1 popup_nd_bst_txt_1">Ảnh đại diện</p>
            <div class="popup_bst_list_img">
                <input hidden type="checkbox" name="" id="avt_img_checkbox_0" class="popup_bst_checkbox popup_nd_bst_checkbox">
                <label for="avt_img_checkbox_0">
                    <div class="v_story_detail">
                        <img class="v_story_detail_img" src="<?=$my_avt?>" alt="Ảnh lỗi">
                        <div class="check_circle"></div>
                    </div>
                </label>
            </div>
            <!-- <button class="popup_bst_see_more">Xem thêm</button> -->
        </div>
        <div class="modal_footer">
            <button class="cancel_btn">Hủy</button>
            <button class="save_btn" disabled>Xong</button>
        </div>
    </div>
</div>
<div class="popup_bst popup_avt_bst modal" id="popup_avt_bst">
    <div class="modal_content">
        <span data-dimiss="modal">&#10005;</span>
        <div class="modal_header">
            Chọn ảnh bìa cho bộ sưu tập
        </div>
        <div class="modal_body">
            <div class="v_story_detail">
                <img class="v_story_detail_img" id="popup_avt_bst_preview_avt"
                    src="https://images.unsplash.com/photo-1637822412451-d5493731bef1?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=387&amp;q=80"
                    alt="Ảnh lỗi">
            </div>
            <div class="popup_bst_list_img">
                <label class="edit_bst_add_img" for="upload_avt_bst">
                    <img src="/img/nv_export.svg" alt="">
                    <p class="popup_bst_txt_3">Tải lên</p>
                </label>
                <input type="file" name="" id="upload_avt_bst" hidden onchange="uploadAvt(this)">
                <!-- <input hidden type="radio" name="bst_avt_radio" id="bst_avt_radio_0" class="popup_bst_checkbox" checked>
                <label for="bst_avt_radio_0" class="popup_bst_checkbox">
                    <div class="v_story_detail">
                        <img class="v_story_detail_img" src="" alt="Ảnh lỗi">
                        <div class="check_circle"></div>
                    </div>
                </label> -->
            </div>
        </div>
        <div class="modal_footer">
            <button class="cancel_btn">Hủy</button>
            <button class="save_btn">Xong</button>
        </div>
    </div>
</div>
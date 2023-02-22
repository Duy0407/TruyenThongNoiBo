<div class="gr_introduce">
    <div class="gr_introduce_box_header">
        <a class="center_nav_eq0">
            <img class="gr_introduce_box_header_img" src="/img/standards_community_back_black.svg" alt="Ảnh lỗi">
            <?=($type_edit==0)?"Chỉnh sửa trang cá nhân":"Thông tin giới thiệu"?>
        </a>
    </div>
    <div class="gr_introduce_box introduce_new_active">
        <p class="gr_info_basic_title">Tổng quan</p>
        <div class="gr_introduce_box_body">
            <?php $sql = "SELECT * FROM `ttnb_work_place` WHERE user_id = $ep_id";
            $db_work_place = new db_query($sql);
            if (mysql_num_rows($db_work_place->result) > 0) {
                while ($row = mysql_fetch_array($db_work_place->result)) {
                    if (check_view_mode_info(1, $row, $type_edit, $is_friend)) { ?>
                        <div class="gr_introduce_status">
                            <img class="gr_info_basic_img" src="../img/noi-lam-viec-icon.svg" alt="Ảnh lỗi">
                            <div class="gr_introduce_status_item">
                                <p class="gr_intro_regime">Làm việc tại <span><?=$row['company_name']?></span></p>
                            </div>
                            <?php if ($type_edit == 0) { ?>
                            <button class="gr_select_regime" data-view_mode="<?=$row['view_mode']?>" data-except="<?=$row['except']?>">
                                <img class="gr_select_regime_img" src="<?=$data_view_mode[$row['view_mode']]?>" alt="Ảnh lỗi">
                                <p class="regime_txt"><?=$data_view_mode_txt[$row['view_mode']]?></p>
                                <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                            </button>
                            <button class="gr_intro_seemore">
                                <img src="../img/xem-them.svg" alt="Ảnh lỗi">
                            </button>
                            <div class="popup_edit_intro">
                                <button class="popup_edit_intro_btn popup_add_work">
                                    <img class="popup_edit_intro_icon" src="../img/them-noi-lam-viec.svg" alt="Ảnh lỗi">
                                    Thêm mới nơi làm việc
                                </button>
                                <button class="popup_edit_intro_btn popup_edit_work" data-id="<?=$row['id']?>" data-po="<?=$row['position']?>" data-dc="<?=$row['address']?>" data-at="<?=$row['working_here']?>">
                                    <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa
                                </button>
                                <button class="popup_edit_intro_btn popup_delete_work" data-id="<?=$row['id']?>">
                                    <img class="popup_edit_intro_icon" src="../img/xoa-noi-lam-viec.svg" alt="Ảnh lỗi">
                                    Xóa nơi làm việc
                                </button>
                            </div>
                            <?php } ?>
                        </div>
                    <? } 
                } ?>
            <?php }elseif ($type_edit == 0){ ?>
                <div class="gr_introduce_box_detail_info">
                    <button class="add_info popup_add_work">
                        <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                        Thêm nơi làm việc
                    </button>
                </div>
            <?php } ?>
            <?php $sql = "SELECT * FROM `ttnb_school` WHERE user_id = $ep_id";
            $db_work_place = new db_query($sql);
            if (mysql_num_rows($db_work_place->result) > 0) {
                while ($row = mysql_fetch_array($db_work_place->result)) {
                    if (check_view_mode_info(2, $row, $type_edit, $is_friend)) { ?>
                        <div class="gr_introduce_status">
                            <img class="gr_info_basic_img" src="../img/tung-hoc.svg" alt="Ảnh lỗi">
                            <div class="gr_introduce_status_item">
                                <p class="gr_intro_regime">Từng học tại <span><?=$row['school_name']?></span></p>
                            </div>
                            <?php
                            if ($type_edit == 0) {
                            ?>
                            <button class="gr_select_regime" data-view_mode="<?=$row['view_mode']?>" data-except="<?=$row['except']?>">
                                <img class="gr_select_regime_img" src="<?=$data_view_mode[$row['view_mode']]?>" alt="Ảnh lỗi">
                                <p class="regime_txt"><?=$data_view_mode_txt[$row['view_mode']]?></p>
                                <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                            </button>
                            <button class="gr_intro_seemore">
                                <img src="../img/xem-them.svg" alt="Ảnh lỗi">
                            </button>
                            <div class="popup_edit_intro">
                                <button class="popup_edit_intro_btn popup_edit_add_school">
                                    <img class="popup_edit_intro_icon" src="../img/them-noi-lam-viec.svg" alt="Ảnh lỗi">
                                    Thêm mới trường học
                                </button>
                                <button class="popup_edit_intro_btn popup_edit_school" data-id="<?=$row['id']?>">
                                    <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa trường học
                                </button>
                                <button class="popup_edit_intro_btn del_infor_school" data-id="<?=$row['id']?>">
                                    <img class="popup_edit_intro_icon" src="../img/xoa-noi-lam-viec.svg" alt="Ảnh lỗi">
                                    Xóa trường học
                                </button>
                            </div>
                            <?php } ?>
                        </div>
                    <? } 
                } ?>
            <?php }elseif ($type_edit == 0){ ?>
                <div class="gr_introduce_box_detail_info popup_edit_add_school">
                    <button class="add_info">
                        <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                        Thêm trường học
                    </button>
                </div>
            <?php } ?>
            <?php if ($db_infor['city'] != 0) {
                $view_mode = $db_infor['city_view_mode'];
                if ((!isset($_SESSION['login']) && $view_mode == 0 && array_key_exists($db_infor['city'],$list_city)) || // ko đn, view mode = 0, có city
                (isset($_SESSION['login']) && $type_edit == 1 && array_key_exists($db_infor['city'],$list_city) && (
                    $view_mode == 0 ||
                    ($view_mode == 2 && $is_friend == 1) || 
                    ($view_mode == 3 && $is_friend == 1 && !in_array(1,$arr_infor_view_mode)) || 
                    ($view_mode == 4 && $is_friend == 1 && in_array(1,$arr_infor_view_mode))
                )) || 
                (isset($_SESSION['login']) && $type_edit == 0 && array_key_exists($db_infor['city'],$list_city))){ ?>
                <div class="gr_introduce_status">
                    <img class="gr_info_basic_img" src="../img/noi-song.svg" alt="Ảnh lỗi">
                    <div class="gr_introduce_status_item">
                        <p class="gr_intro_regime">Sống tại <?=$list_city[$db_infor['city']]?></p>
                    </div>
                    <?php
                    if ($type_edit == 0) {
                    ?>
                    <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['city_view_mode']:0?>" data-except="<?=$db_infor['city_except']?>">
                        <img class="gr_select_regime_img" src="<?=$data_view_mode[$db_infor['city_view_mode']]?>" alt="Ảnh lỗi">
                        <p class="regime_txt"><?=$data_view_mode_txt[$db_infor['city_view_mode']]?></p>
                        <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                    </button>
                    <button class="gr_intro_seemore popup_edit_intro_city" data-city="<?=$db_infor['city']?>">
                        <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                    </button>
                    <?php
                    } 
                    ?>
                </div>
                <?php } }elseif ($type_edit == 0){ ?>
                <div class="gr_introduce_box_detail_info">
                    <button class="add_info popup_edit_intro_city">
                        <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                        Thêm thành phố hiện tại
                    </button>
                </div>
            <?php } ?>
            <?php if ($db_infor['home_town'] != 0) {
                $view_mode = $db_infor['ht_view_mode'];
                if ((!isset($_SESSION['login']) && $view_mode == 0 && array_key_exists($db_infor['home_town'],$list_city)) || // ko đn, view mode = 0, có city
                (isset($_SESSION['login']) && $type_edit == 1 && array_key_exists($db_infor['home_town'],$list_city) && (
                    $view_mode == 0 ||
                    ($view_mode == 2 && $is_friend == 1) || 
                    ($view_mode == 3 && $is_friend == 1 && !in_array(2,$arr_infor_view_mode)) || 
                    ($view_mode == 4 && $is_friend == 1 && in_array(2,$arr_infor_view_mode))
                )) || 
                (isset($_SESSION['login']) && $type_edit == 0 && array_key_exists($db_infor['home_town'],$list_city))){ ?>
                <div class="gr_introduce_status">
                    <img class="gr_info_basic_img" src="../img/noi-den.svg" alt="Ảnh lỗi">
                    <div class="gr_introduce_status_item">
                        <p class="gr_intro_regime">Đến từ <?=$list_city[$db_infor['home_town']]?></p>
                    </div>
                    <?php
                    if ($type_edit == 0) {
                    ?>
                    <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['ht_view_mode']:0?>" data-except="<?=$db_infor['ht_except']?>">
                        <img class="gr_select_regime_img" src="<?=$data_view_mode[$db_infor['ht_view_mode']]?>" alt="Ảnh lỗi">
                        <p class="regime_txt"><?=$data_view_mode_txt[$db_infor['ht_view_mode']]?></p>
                        <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                    </button>
                    <button class="gr_intro_seemore popup_edit_intro_country" data-ht="<?=$db_infor['home_town']?>">
                        <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                    </button>
                    <?php
                    } 
                    ?>
                </div>
            <?php } }elseif ($type_edit == 0){ ?>
                <div class="gr_introduce_box_detail_info">
                    <button class="add_info popup_edit_intro_country">
                        <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                        Thêm quê quán
                    </button>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="gr_introduce_box">
        <div class="gr_info_basic">
            <p class="gr_info_basic_title">Thông tin liên hệ</p>
            <div class="gr_introduce_box_body">
                <?php if ($arr_ep[$ep_id]['ep_address'] != ''){
                    $view_mode = $db_infor['add_view_mode'];
                    if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                    (isset($_SESSION['login']) && $type_edit == 1 && (
                        $view_mode == 0 ||
                        ($view_mode == 2 && $is_friend == 1) || 
                        ($view_mode == 3 && $is_friend == 1 && !in_array(3,$arr_infor_view_mode)) || 
                        ($view_mode == 4 && $is_friend == 1 && in_array(3,$arr_infor_view_mode))
                    )) || 
                    (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                    <div class="gr_introduce_status">
                        <img class="gr_info_basic_img" src="/img/carbon_location-filled.svg" alt="Ảnh lỗi">
                        <div class="gr_introduce_status_item">
                            <p class="gr_intro_regime">Địa chỉ: <span><?=$arr_ep[$ep_id]['ep_address']?></span></p>
                        </div>
                        <?php
                        if ($type_edit == 0) { ?>
                        <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['add_view_mode']:0?>" data-except="<?=$db_infor['add_except']?>">
                            <img class="gr_select_regime_img" src="<?=($db_infor)?$data_view_mode[$db_infor['add_view_mode']]:$data_view_mode[0]?>" alt="Ảnh lỗi">
                            <p class="regime_txt"><?=($db_infor)?$data_view_mode_txt[$db_infor['add_view_mode']]:$data_view_mode_txt[0]?></p>
                            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                        </button>
                        <button class="gr_intro_seemore add_info_dclh">
                            <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        </button>
                        <?php
                        } 
                        ?>
                    </div>
                <?php } }elseif ($type_edit == 0){ ?>
                    <div class="gr_introduce_box_detail_info">
                        <button class="add_info add_info_dclh">
                            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                            Thêm địa chỉ liên hệ
                        </button>
                    </div>
                <?php } ?>
                <div class="gr_introduce_status">
                    <img class="gr_info_basic_img" src="../img/so-dien-thoai.svg" alt="Ảnh lỗi">
                    <div class="gr_introduce_status_item">
                        <p class="gr_intro_regime">Số điện thoại <span><?=$arr_ep[$ep_id]['ep_phone']?></span></p>
                    </div>
                    <?php if ($type_edit == 0) {
                        $view_mode = $db_infor['phone_view_mode'];
                        if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                        (isset($_SESSION['login']) && $type_edit == 1 && (
                            $view_mode == 0 ||
                            ($view_mode == 2 && $is_friend == 1) || 
                            ($view_mode == 3 && $is_friend == 1 && !in_array(4,$arr_infor_view_mode)) || 
                            ($view_mode == 4 && $is_friend == 1 && in_array(4,$arr_infor_view_mode))
                        )) || 
                        (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                        <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['phone_view_mode']:0?>" data-except="<?=$db_infor['phone_except']?>">
                            <img class="gr_select_regime_img" src="<?=($db_infor)?$data_view_mode[$db_infor['phone_view_mode']]:$data_view_mode[0]?>" alt="Ảnh lỗi">
                            <p class="regime_txt"><?=($db_infor)?$data_view_mode_txt[$db_infor['phone_view_mode']]:$data_view_mode_txt[0]?></p>
                            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                        </button>
                        <button class="gr_intro_seemore popup_edit_intro_phone">
                            <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        </button>
                    <?php } } ?>
                </div>
                <div class="gr_introduce_status">
                    <img class="gr_info_basic_img" src="../img/zmdi_email.svg" alt="Ảnh lỗi">
                    <div class="gr_introduce_status_item">
                        <p class="gr_intro_regime">Emai <?=$arr_ep[$ep_id]['ep_email']?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <p class="gr_info_basic_title">Thông tin cơ bản</p>
            <div class="gr_introduce_box_body">
                <?php if ($db_infor['language'] != ""){
                    $view_mode = $db_infor['lang_view_mode'];
                    if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                    (isset($_SESSION['login']) && $type_edit == 1 && (
                        $view_mode == 0 ||
                        ($view_mode == 2 && $is_friend == 1) || 
                        ($view_mode == 3 && $is_friend == 1 && !in_array(5,$arr_infor_view_mode)) || 
                        ($view_mode == 4 && $is_friend == 1 && in_array(5,$arr_infor_view_mode))
                    )) || 
                    (isset($_SESSION['login']) && $type_edit == 0)){
                    $lang = explode(",",$db_infor['language']);
                    foreach ($lang as $key => $value) {
                        $lang[$key] = $arr_lang[$value];
                    }
                    $lang = implode(", ",$lang); ?>
                    <div class="gr_introduce_status">
                        <img class="gr_info_basic_img" src="/img/nv_messages.svg" alt="Ảnh lỗi">
                        <div class="gr_introduce_status_item">
                            <p class="gr_intro_regime">Ngôn ngữ <?=$lang?></p>
                        </div>
                        <?php
                        if ($type_edit == 0) {
                        ?>
                        <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['lang_view_mode']:0?>" data-except="<?=$db_infor['lang_except']?>">
                            <img class="gr_select_regime_img" src="<?=$data_view_mode[$db_infor['lang_view_mode']]?>" alt="Ảnh lỗi">
                            <p class="regime_txt"><?=$data_view_mode_txt[$db_infor['lang_view_mode']]?></p>
                            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                        </button>
                        <button class="gr_intro_seemore add_info_language" data-lang=<?=$db_infor['language']?>>
                            <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        </button>
                        <?php
                        } 
                        ?>
                    </div>
                <?php } }elseif ($type_edit == 0){ ?>
                    <div class="gr_introduce_box_detail_info">
                        <button class="add_info add_info_language">
                            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                            Thêm một ngôn ngữ
                        </button>
                    </div>
                <?php } ?>
                <?php if ($db_infor['religion'] != ""){
                    $view_mode = $db_infor['relig_view_mode'];
                    if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                    (isset($_SESSION['login']) && $type_edit == 1 && (
                        $view_mode == 0 ||
                        ($view_mode == 2 && $is_friend == 1) || 
                        ($view_mode == 3 && $is_friend == 1 && !in_array(6,$arr_infor_view_mode)) || 
                        ($view_mode == 4 && $is_friend == 1 && in_array(6,$arr_infor_view_mode))
                    )) || 
                    (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                    <div class="gr_introduce_status">
                        <img class="gr_info_basic_img" src="/img/nv_pray.svg" alt="Ảnh lỗi">
                        <div class="gr_introduce_status_item">
                            <p class="gr_intro_regime">Tôn giáo <span><?=$db_infor['religion']?></span></p>
                            <p class="gr_intro_regime2"><?=$db_infor['religion_desc']?></p>
                        </div>
                        <?php
                        if ($type_edit == 0) {
                        ?>
                        <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['relig_view_mode']:0?>" data-except="<?=$db_infor['relig_except']?>">
                            <img class="gr_select_regime_img" src="<?=$data_view_mode[$db_infor['relig_view_mode']]?>" alt="Ảnh lỗi">
                            <p class="regime_txt"><?=$data_view_mode_txt[$db_infor['relig_view_mode']]?></p>
                            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                        </button>
                        <button class="gr_intro_seemore add_info_religion">
                            <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        </button>
                        <?php
                        } 
                        ?>
                    </div>
                <?php } }elseif ($type_edit == 0){ ?>
                    <div class="gr_introduce_box_detail_info">
                        <button class="add_info add_info_religion">
                            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                            Thêm quan điểm tôn giáo của bạn
                        </button>
                    </div>
                <?php } ?>
                <?php if (array_key_exists($arr_ep[$ep_id]['ep_gender'],$arr_sex)){
                    $view_mode = $db_infor['sex_view_mode'];
                    if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                    (isset($_SESSION['login']) && $type_edit == 1 && (
                        $view_mode == 0 ||
                        ($view_mode == 2 && $is_friend == 1) || 
                        ($view_mode == 3 && $is_friend == 1 && !in_array(7,$arr_infor_view_mode)) || 
                        ($view_mode == 4 && $is_friend == 1 && in_array(7,$arr_infor_view_mode))
                    )) || 
                    (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                    <div class="gr_info_basic_detail">
                        <img class="gr_info_basic_img" src="../img/gioi-tinh.svg" alt="Ảnh lỗi">
                        <div class="gr_info_basic_icon">
                            <p class="gr_intro_regime">Giới tính <?=$arr_sex[$arr_ep[$ep_id]['ep_gender']]?></p>
                        </div>
                        <?php
                        if ($type_edit == 0) {
                        ?>
                        <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['sex_view_mode']:0?>" data-except="<?=$db_infor['sex_except']?>">
                            <img class="gr_select_regime_img" src="<?=($db_infor)?$data_view_mode[$db_infor['sex_view_mode']]:$data_view_mode[0]?>" alt="Ảnh lỗi">
                            <p class="regime_txt"><?=($db_infor)?$data_view_mode_txt[$db_infor['sex_view_mode']]:$data_view_mode_txt[0]?></p>
                            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                        </button>
                        <button class="gr_intro_seemore add_info_sex" data-sex="<?=$arr_ep[$ep_id]['ep_gender']?>">
                            <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        </button>
                        <?php
                        } 
                        ?>
                    </div>
                <?php } }elseif ($type_edit == 0){ ?>
                    <div class="gr_introduce_box_detail_info">
                        <button class="add_info add_info_sex">
                            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                            Thêm giới tính
                        </button>
                    </div>
                <?php } ?>
                <?php if ($arr_ep[$ep_id]['ep_birth_day'] != null && $arr_ep[$ep_id]['ep_birth_day'] != ''){
                    $view_mode = $db_infor['dob_view_mode'];
                    if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                    (isset($_SESSION['login']) && $type_edit == 1 && (
                        $view_mode == 0 ||
                        ($view_mode == 2 && $is_friend == 1) || 
                        ($view_mode == 3 && $is_friend == 1 && !in_array(8,$arr_infor_view_mode)) || 
                        ($view_mode == 4 && $is_friend == 1 && in_array(8,$arr_infor_view_mode))
                    )) || 
                    (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                    <div class="gr_info_basic_detail">
                        <img class="gr_info_basic_img" src="../img/sinh-nhat.svg" alt="Ảnh lỗi">
                        <div class="gr_info_basic_icon">
                            <p class="gr_intro_regime">Ngày sinh <?=date("d \\t\h\á\\n\g m \\n\ă\m Y",strtotime($arr_ep[$ep_id]['ep_birth_day']))?></p>
                        </div>
                        <?php if ($type_edit == 0) { ?>
                            <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['dob_view_mode']:0?>" data-except="<?=$db_infor['dob_except']?>">
                                <img class="gr_select_regime_img" src="<?=($db_infor)?$data_view_mode[$db_infor['dob_view_mode']]:$data_view_mode[0]?>" alt="Ảnh lỗi">
                                <p class="regime_txt"><?=($db_infor)?$data_view_mode_txt[$db_infor['dob_view_mode']]:$data_view_mode_txt[0]?></p>
                                <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                            </button>
                            <button class="gr_intro_seemore add_info_dob" data-dob="<?=$arr_ep[$ep_id]['ep_birth_day']?>">
                                <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                            </button>
                        <?php } ?>
                    </div>
                <?php } }elseif ($type_edit == 0){ ?>
                    <div class="gr_introduce_box_detail_info">
                        <button class="add_info add_info_dob">
                            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                            Thêm ngày sinh
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="gr_introduce_box">
        <div class="">
            <p class="gr_info_basic_title">Mối quan hệ</p>
            <div class="gr_introduce_box_body">
                <?php if ($db_infor['relationship_status'] != 0){
                    $view_mode = $db_infor['rela_view_mode'];
                    if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                    (isset($_SESSION['login']) && $type_edit == 1 && (
                        $view_mode == 0 ||
                        ($view_mode == 2 && $is_friend == 1) || 
                        ($view_mode == 3 && $is_friend == 1 && !in_array(9,$arr_infor_view_mode)) || 
                        ($view_mode == 4 && $is_friend == 1 && in_array(9,$arr_infor_view_mode))
                    )) || 
                    (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                    <div class="gr_introduce_status">
                        <img class="gr_info_basic_img" src="/img/nv_heart.svg" alt="Ảnh lỗi">
                        <div class="gr_introduce_status_item">
                            <p class="gr_intro_regime"><?=$arr_relative_status[$db_infor['relationship_status']]?></p>
                        </div>
                        <?php
                        if ($type_edit == 0) {
                        ?>
                        <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['rela_view_mode']:0?>" data-except="<?=$db_infor['rela_except']?>">
                            <img class="gr_select_regime_img" src="<?=$data_view_mode[$db_infor['rela_view_mode']]?>" alt="Ảnh lỗi">
                            <p class="regime_txt"><?=$data_view_mode_txt[$db_infor['rela_view_mode']]?></p>
                            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                        </button>
                        <button class="gr_intro_seemore add_info_relationship" data-rela="<?=$db_infor['relationship_status']?>">
                            <img class="popup_edit_intro_icon" class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        </button>
                        <?php
                        } 
                        ?>
                    </div>
                <?php } }elseif ($type_edit == 0){ ?>
                    <div class="gr_introduce_box_detail_info">
                        <button class="add_info add_info_relationship">
                            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                            Thêm tình trạng mối quan hệ
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="">
            <p class="gr_info_basic_title">Thông tin cơ bản</p>
            <div class="gr_introduce_box_body">
                <?php if ($type_edit == 0){ ?>
                <div class="gr_introduce_box_detail_info">
                    <button class="add_info add_info_family">
                        <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                        Thêm người thân
                    </button>
                </div>
                <?php } ?>
                <?php $sql = "SELECT * FROM `ttnb_family` WHERE user_id = $ep_id";
                $db_work_place = new db_query($sql);
                $arr_stranger = [];
                $family = [];
                while ($row = mysql_fetch_array($db_work_place->result)) {
                    if ($row['mem_id'] != '' && $row['mem_type'] == 2 && !array_key_exists($row['mem_id'],$arr_ep) && !in_array($row['mem_id'],$arr_stranger)){
                        $arr_stranger[] = $row['mem_id'];
                    }
                    $family[] = $row;
                }
                $arr_stranger = list_stranger_infor(implode(",",$arr_stranger));
                foreach ($arr_stranger as $key => $value) {
                    $arr_ep[$value['ep_id']] = $value;
                }
                foreach ($family as $key => $row) {
                    if (check_view_mode_info(3, $row, $type_edit, $is_friend)) {
                        $avt = "/img/logo_com.png";
                        if (array_key_exists($row['mem_id'],$arr_ep)){
                            if ($row['mem_type'] == 2 && $arr_ep[$row['mem_id']]['ep_image'] != ""){
                                $avt = "https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$row['mem_id']]['ep_image'];
                            }
                        } ?>
                        <div class="gr_info_basic_detail">
                            <div class="gr_info_basic_icon d_flex">
                                <img class="avt_40" src="<?=$avt?>" alt="Ảnh lỗi" onerror="this.src=`/img/logo_com.png`;">
                                <div class="">
                                    <p class=""><?=$arr_ep[$row['mem_id']]['ep_name']?></p>
                                    <p class=""><?=$arr_relative[$row['relative_id']]?></p>
                                </div>
                            </div>
                            <?php
                            if ($type_edit == 0) {
                            ?>
                            <button class="gr_select_regime" data-view_mode="<?=$row['view_mode']?>" data-except="<?=$row['except']?>">
                                <img class="gr_select_regime_img" src="<?=$data_view_mode[$row['view_mode']]?>" alt="Ảnh lỗi">
                                <p class="regime_txt"><?=$data_view_mode_txt[$row['view_mode']]?></p>
                                <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                            </button>
                            <button class="gr_intro_seemore">
                                <img class="" src="../img/xem-them.svg" alt="Ảnh lỗi">
                            </button>
                            <div class="popup_edit_intro">
                                <button class="popup_edit_intro_btn edit_info_family" data-id=<?=$row['id']?> data-mem=<?=$row['mem_id']?> data-relative=<?=$row['relative_id']?>>
                                    <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa thành viên trong gia đình
                                </button>
                                <button class="popup_edit_intro_btn del_infor_family" data-id=<?=$row['id']?>>
                                    <img class="popup_edit_intro_icon" src="../img/xoa-noi-lam-viec.svg" alt="Ảnh lỗi">
                                    Xóa thành viên
                                </button>
                            </div>
                            <?php
                            } 
                            ?>
                        </div>
                    <? }
                } ?>
            </div>
        </div>
    </div>
    <div class="gr_introduce_box">
        <div class="">
            <p class="gr_info_basic_title">Giới thiệu về bản thân</p>
            <div class="gr_introduce_box_body">
                <?php if ($db_infor['intro'] != ""){
                    $view_mode = $db_infor['intro_view_mode'];
                    if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                    (isset($_SESSION['login']) && $type_edit == 1 && (
                        $view_mode == 0 ||
                        ($view_mode == 2 && $is_friend == 1) || 
                        ($view_mode == 3 && $is_friend == 1 && !in_array(10,$arr_infor_view_mode)) || 
                        ($view_mode == 4 && $is_friend == 1 && in_array(10,$arr_infor_view_mode))
                    )) || 
                    (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                    <div class="gr_introduce_status">
                        <div class="gr_introduce_status_item">
                            <p class="gr_intro_regime">Giới thiệu về bản thân: <span><?=$db_infor['intro']?></span></p>
                        </div>
                        <?php
                        if ($type_edit == 0) {
                        ?>
                        <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['intro_view_mode']:0?>" data-except="<?=$db_infor['intro_except']?>">
                            <img class="gr_select_regime_img" src="<?=$data_view_mode[$db_infor['intro_view_mode']]?>" alt="Ảnh lỗi">
                            <p class="regime_txt"><?=$data_view_mode_txt[$db_infor['intro_view_mode']]?></p>
                            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                        </button>
                        <button class="gr_intro_seemore gr_intro_edit_intro">
                            <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        </button>
                        <?php
                        } 
                        ?>
                    </div>
                <?php } }elseif ($type_edit == 0){ ?>
                    <div class="gr_introduce_box_detail_info">
                        <button class="add_info gr_intro_edit_intro">
                            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                            Thêm giới thiệu về bản thân
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="">
            <p class="gr_info_basic_title">Tên gọi khác</p>
            <div class="gr_introduce_box_body">
                <?php if ($db_infor['nickname'] != ""){
                    $view_mode = $db_infor['nn_view_mode'];
                    if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                    (isset($_SESSION['login']) && $type_edit == 1 && (
                        $view_mode == 0 ||
                        ($view_mode == 2 && $is_friend == 1) || 
                        ($view_mode == 3 && $is_friend == 1 && !in_array(11,$arr_infor_view_mode)) || 
                        ($view_mode == 4 && $is_friend == 1 && in_array(11,$arr_infor_view_mode))
                    )) || 
                    (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                    <div class="gr_introduce_status">
                        <div class="gr_introduce_status_item">
                            <p class="gr_intro_regime">Biệt danh: <span><?=$db_infor['nickname']?></span></p>
                        </div>
                        <?php
                        if ($type_edit == 0) {
                        ?>
                        <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['nn_view_mode']:0?>" data-except="<?=$db_infor['nn_except']?>">
                            <img class="gr_select_regime_img" src="<?=$data_view_mode[$db_infor['nn_view_mode']]?>" alt="Ảnh lỗi">
                            <p class="regime_txt"><?=$data_view_mode_txt[$db_infor['nn_view_mode']]?></p>
                            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                        </button>
                        <button class="gr_intro_seemore create_nickname">
                            <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        </button>
                        <?php
                        } 
                        ?>
                    </div>
                <?php } }elseif ($type_edit == 0){ ?>
                    <div class="gr_introduce_box_detail_info">
                        <button class="add_info create_nickname">
                            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                            Thêm biệt danh, tên thường gọi,...
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="">
            <p class="gr_info_basic_title">Trích dẫn yêu thích</p>
            <div class="gr_introduce_box_body">
                <?php if ($db_infor['quote'] != ""){
                    $view_mode = $db_infor['quote_view_mode'];
                    if ((!isset($_SESSION['login']) && $view_mode == 0) || // ko đn, view mode = 0
                    (isset($_SESSION['login']) && $type_edit == 1 && (
                        $view_mode == 0 ||
                        ($view_mode == 2 && $is_friend == 1) || 
                        ($view_mode == 3 && $is_friend == 1 && !in_array(12,$arr_infor_view_mode)) || 
                        ($view_mode == 4 && $is_friend == 1 && in_array(12,$arr_infor_view_mode))
                    )) || 
                    (isset($_SESSION['login']) && $type_edit == 0)){ ?>
                    <div class="gr_introduce_status">
                        <div class="gr_introduce_status_item">
                            <p class="gr_intro_regime">Trích dẫn yêu thích: <span><?=$db_infor['quote']?></span></p>
                        </div>
                        <?php
                        if ($type_edit == 0) {
                        ?>
                        <button class="gr_select_regime" data-view_mode="<?=($db_infor)?$db_infor['quote_view_mode']:0?>" data-except="<?=$db_infor['quote_except']?>">
                            <img class="gr_select_regime_img" src="<?=$data_view_mode[$db_infor['quote_view_mode']]?>" alt="Ảnh lỗi">
                            <p class="regime_txt"><?=$data_view_mode_txt[$db_infor['quote_view_mode']]?></p>
                            <img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">
                        </button>
                        <button class="gr_intro_seemore create_quote">
                            <img class="popup_edit_intro_icon" src="../img/chinh-sua.svg" alt="Ảnh lỗi">
                        </button>
                        <?php
                        } 
                        ?>
                    </div>
                <?php } }elseif ($type_edit == 0){ ?>
                    <div class="gr_introduce_box_detail_info">
                        <button class="add_info create_quote">
                            <img class="add_info_icon" src="../img/add_info.svg" alt="Ảnh lỗi">
                            Thêm câu trích dẫn yêu thích của bạn
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
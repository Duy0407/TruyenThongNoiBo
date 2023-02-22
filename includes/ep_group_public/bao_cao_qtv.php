<?
$select_rule_group = new db_query("SELECT * FROM `group_rules` WHERE `id_group` = '$id'");

// $my_friend = 

?>

<!-- POPUP BÁO CÁO  -->
<div class="baocao_qtv">
    <div class="baocao_qtv_padding">
        <div class="popup_add_friend_box1">
            <div class="popup_add_friend_box1_text">Báo cáo bài viết với quản trị viên nhóm</div>
            <div class="name_author_popup hide"></div>
            <div class="popup_add_friend_box1_img x_bc_qt_vien cusor"><img src="../img/image_new/x.svg" alt=""></div>
        </div>
        <div class="baocao_qtv_khoi2 take_id_author" data-author-pick="">
            <div class="baocao_qtv_khoi2_hard">
                <div class="baocao_qtv_khoi2_hard_title title_chung">Hãy chọn vấn đề</div>
                <div class="baocao_qtv_khoi2_hard_text">Hãy cho quản trị viên biết bài viết này có vấn đề gì. Chúng tôi sẽ không thông báo cho người đăng rằng bạn đã báo cáo.</div>
            </div>

            <?if(mysql_num_rows($select_rule_group->result) > 0){?>
                <div class="baocao_qtv_quytac click_vpqtn">
                    <div class="baocao_qtv_quytac_text title_chung">Vi phạm quy tắc nhóm</div>
                    <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                </div>
            <?}?>
            <div class="baocao_qtv_quytac click_show_chung">
                <div class="baocao_qtv_quytac_text title_chung">Nội dung không liên quan</div>
                <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
            </div>
            <div class="baocao_qtv_quytac click_show_chung">
                <div class="baocao_qtv_quytac_text title_chung">Tin giả</div>
                <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
            </div>
            <div class="baocao_qtv_quytac click_show_chung">
                <div class="baocao_qtv_quytac_text title_chung">Xung đột giữa các thành viên</div>
                <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
            </div>
            <div class="baocao_qtv_quytac click_show_chung">
                <div class="baocao_qtv_quytac_text title_chung">Spam</div>
                <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
            </div>
            <div class="baocao_qtv_quytac click_show_chung">
                <div class="baocao_qtv_quytac_text title_chung">Quấy rối</div>
                <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
            </div>
            <div class="baocao_qtv_quytac click_show_chung">
                <div class="baocao_qtv_quytac_text title_chung">Ngôn từ gây thù ghét</div>
                <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
            </div>

            <div class="baocao_qtv_quytac click_nude_photos">
                <div class="baocao_qtv_quytac_text title_chung">Ảnh khỏa thân hoặc hành động tình dục</div>
                <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
            </div>

            <div class="baocao_qtv_quytac click_show_chung">
                <div class="baocao_qtv_quytac_text title_chung">Bạo lực</div>
                <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
            </div>
            <div class="baocao_qtv_quytac click_show_chung">
                <div class="baocao_qtv_quytac_text title_chung">Vấn đề khác</div>
                <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
            </div>
        </div>
    </div>
</div>


<!-- POPUP VI PHẠM QUY TẮC NHÓM -->
<div class="vp_quytac_nhom">
    <div class="vp_quytac_nhom_padding">
        <div class="vp_quytac_nhom_head">
            <div class="vp_quytac_nhom_head1">
                <div class="vp_quytac_nhom_head1_ic back_baocao"><img src="../img/image_new/ic_back_24.svg" alt=""></div>
                <div class="vp_quytac_nhom_head1_text">Báo cáo</div>
            </div>
            <div class="vp_quytac_nhom_head2 x_bc_qt_vien cusor"><img src="../img/image_new/x.svg" alt=""></div>
        </div>
    
        <div class="vp_quytac_nhom_nab">
            <div class="take_name_author_hide hide"></div>
            <div class="vp_quytac_nhom_nab_suv">
                <div class="vp_quytac_nhom_nab_suv_ic"><img src="../img/image_new/error_chamthan.svg" alt=""></div>
                <div class="vp_quytac_nhom_nab_suv_text title_chung">Họ vi phạm quy tắc nhóm nào</div>
            </div>
    
            <div class="vp_quytac_nhom_nab_main">
                <div class="text_parents_hide" hidden></div>
                <?$num = 1; while ($rule_show = mysql_fetch_assoc($select_rule_group->result)){?>
                    <div class="vp_quytac_nhom_nab_main_one parent_report_rule">
                        <div class="vp_quytac_nhom_nab_main_one_radio"><input type="radio" name="vpqtn" value="<?=$num++?>"></div>
                        <div class="vp_quytac_nhom_nab_main_one_sub">
                            <h2 class="title_report"><?=$rule_show['title_rule']?></h2>
                            <p class="message_report"><?=$rule_show['describe_rule']?></p>
                        </div>
                    </div>
                <?}?>
            </div>
        </div>
    </div>
</div>

<!-- Thank you for your reaport -->
<div class="thanhk_you_reaport thanhk_you_reaport1" >
    <div class="thanhk_you_reaport_padding">
        <div class="popup_add_friend_box1">
            <div class="popup_add_friend_box1_text">Cảm ơn bạn đã báo cáo bài viết này </div>
            <div class="popup_add_friend_box1_img x_bc_qt_vien cusor"><img src="../img/image_new/x.svg" alt=""></div>
        </div>
        <div class="thanhk_you_reaport_pad">
            <div class="tky_reaport_head">
                <div class="tky_reaport_head_one">
                    <div class="tky_reaport_head_one_text pick_text_parent"></div>
                    <div class="tky_reaport_head_one_text pick_text_child"></div>
                </div>
                <div class="tky_reaport_head_tow">Bạn đã báo cáo bài viết này với quản trị viên nhóm.</div>
            </div>
    
            <div class="tky_reaport_nab">
                <h2 class="tky_reaport_nab_title">Các bước mà bạn có thể thực hiện</h2>
                <div class="cacbuoc_thuchien">
                    <div class="thuchien_buoc_one">
                        <div class="thuchien_buoc_one_img"><img src="../img/image_new/thank_reaport1.svg" alt=""></div>
                        <div class="thuchien_buoc_one_text">
                            <p>Chặn trang cá nhân của <span  class="take_name_author"></span></p>
                            <p>Các bạn sẽ không thể nhìn thấy hoặc liên hệ với nhau.</p>
                        </div>
                    </div>
                    <div class="thuchien_buoc_one">
                        <div class="thuchien_buoc_one_img"><img src="../img/image_new/thank_reaport2.svg" alt=""></div>
                        <div class="thuchien_buoc_one_text">
                            <p>Ẩn tất cả từ <span  class="take_name_author"></span></p>
                            <p>Không xem bài viết từ người này nữa</p>
                        </div>
                    </div>
                    <div class="thuchien_buoc_one">
                        <div class="thuchien_buoc_one_img"><img src="../img/image_new/thank_reaport3.svg" alt=""></div>
                        <div class="thuchien_buoc_one_text">
                            <p>Hủy kết bạn</p>
                            <p>Xóa bạn bè khỏi danh sách bạn bè</p>
                        </div>
                    </div>
                </div>
                <div class="btn_bc_xong report_ok"  data1="" data2="<?=$id;?>">Xong</div>
            </div>
        </div>
    </div>
</div>
<!-- POPUP ảnh khỏa thân -->
<div class="nude_photos">
    <div class="nude_photos_padding">
        <div class="vp_quytac_nhom_head">
            <div class="vp_quytac_nhom_head1">
                <div class="vp_quytac_nhom_head1_ic back_baocao"><img src="../img/image_new/ic_back_24.svg" alt=""></div>
                <div class="vp_quytac_nhom_head1_text">Báo cáo</div>
            </div>
            <div class="vp_quytac_nhom_head2 x_bc_qt_vien cusor"><img src="../img/image_new/x.svg" alt=""></div>
        </div>
    
        <div class="nude_photos_pd">
            <div class="nude_photos_pd_head">
                <div class="nude_photos_pd_head_1">
                    <div class="vp_quytac_nhom_nab_suv_ic"><img src="../img/image_new/error_chamthan.svg" alt=""></div>
                    <div class="vp_quytac_nhom_nab_suv_text title_chung">Ảnh khỏa thân hoặc hành động tình dục</div>
                </div>
                <div class="nude_photos_pd_text_suv">Hãy cho quản trị viên biết bài viết này có vấn đề gì. Chúng tôi sẽ không thông báo cho người đăng rằng bạn đã báo cáo.</div>
            </div>
    
            <div class="nude_photos_pd_main">
                <div class="text_parents_hide2" hidden></div>
                <div class="text_nude_photos_hide" hidden></div>
                <div class="baocao_qtv_quytac click_show_chung2">
                    <div class="baocao_qtv_quytac_text title_chung">Khoản thân người lớn</div>
                    <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                </div>
                <div class="baocao_qtv_quytac click_show_chung2">
                    <div class="baocao_qtv_quytac_text title_chung">Gợi dục</div>
                    <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                </div>
                <div class="baocao_qtv_quytac click_show_chung2">
                    <div class="baocao_qtv_quytac_text title_chung">Hoạt động tình dục</div>
                    <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                </div>
                <div class="baocao_qtv_quytac click_show_chung2">
                    <div class="baocao_qtv_quytac_text title_chung">Bóc lột tình dục</div>
                    <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                </div>
                <div class="baocao_qtv_quytac click_show_chung2">
                    <div class="baocao_qtv_quytac_text title_chung">Dịch vụ tình dục</div>
                    <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                </div>
                <div class="baocao_qtv_quytac click_show_chung2">
                    <div class="baocao_qtv_quytac_text title_chung">Liên quan đến trẻ em</div>
                    <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                </div>
                <div class="baocao_qtv_quytac click_show_chung2">
                    <div class="baocao_qtv_quytac_text title_chung">Chia sẻ hình ảnh riêng tư</div>
                    <div class="baocao_qtv_quytac_img"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
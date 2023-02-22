<?
// Lấy ngày hiện tại và cuối ngày
$pick_day = time();
$pick_day = date('d-m-Y', $pick_day);
$first_time = strtotime($pick_day);
$last_time = strtotime($pick_day) + 86400 - 1;
//------------------------- Đếm bài viết bị báo cáo trong ngày
$pick_time_report = new db_query("SELECT `id_report`,`time_report` FROM `members_report_posts` WHERE `id_group` = '$id' AND `time_report` > '$first_time' AND `time_report` <= '$last_time'");
$pick_time = mysql_num_rows($pick_time_report->result);
//------------------------- Đếm bài viết đang chờ trong ngày
$sl_post_waiting = new db_query("SELECT `new_id` FROM `new_feed` WHERE `position` = '$id' AND `approve` = 1 AND `updated_at` > '$first_time' AND `updated_at` <= '$last_time'");
$cout_post_day = mysql_num_rows($sl_post_waiting->result);
//------------------------- Đếm yêu cầu tham gia nhóm
$sl_mem_request_join = new db_query("SELECT `id_user` FROM `member_request_join` WHERE `id_group` = '$id' AND `type_join` = 0 AND `request_time` > '$first_time' AND `request_time` <= '$last_time'");
$cout_mem_day = mysql_num_rows($sl_mem_request_join->result);

?>


<div id="sidebar_main">
    <div class="sidebar_main_padding">
        <div class="sidebar_main_block1 border_bottom">
            <div class="them_div_711_1">
                <div class="sb_title">Nhóm</div>
                <div class="sb_image">
                    <div class="sb_img">
                        <img src="<?=$group['group_image']?>" alt="" onerror="this.src=`/img/nv_default_bgi.svg`;">
                    </div>
                    <div class="sb_tex"><?=$group['group_name']?></div>
                </div>
            </div>

            <div class="them_div_711_2">
                <div class="them_div_711_2_ic"><img src="../img/image_new/muiten_left.svg" alt=""></div>
                <div class="them_div_711_2_text"><?=$group['group_name']?></div>
            </div>


        </div>

        <div class="sidebar_main_block2 border_bottom">
            <div class="sidebar_main_block2_pd hide_header_1024">
                <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>.html" class="sidebar_main_block2_box1" id="bg_trangchu">
                    <div class="sidebar_main_block2_box1_ic" id="ic_trangchu"><?=$sb_ic_1?></div>
                    <div class="sidebar_main_block2_box1_text" id="text_trangchu">Trang chủ cộng đồng</div>
                </a>
                <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-tong-quan-nhom.html" class="sidebar_main_block2_box1" id="bg_tongquan">
                    <div class="sidebar_main_block2_box1_ic" id="ic_tongquan"><?=$sb_ic_2?></div>
                    <div class="sidebar_main_block2_box1_text" id="text_tongquan">Tổng quan</div>
                </a>
            </div>
        </div>

        <div class="them_div_711_3">
            <div class="them_div_711_4">
                <div class="sidebar_main_block3 border_bottom">
                    <div class="sidebar_main_block3_text">Công cụ quản trị</div>

                    <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-yeu-cau-lam-thanh-vien.html" class="sidebar_main_block3_box1" id="bg_yc_thanhvien">
                        <div class="sidebar_main_block3_box1_ic" id="ic_yc_thanhvien"><?=$sb_ic_3?></div>
                        <div class="sidebar_main_block3_box1_text">
                            <div class="sidebar_main_block3_box1_text1 text_yc_thanhvien">Yêu cầu làm thành viên</div>
                            <div class="sidebar_main_block3_box1_text2 text_yc_thanhvien"><?=$cout_mem_day?> yêu cầu mới hôm nay</div>
                        </div>
                    </a>

                    <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-cau-hoi-chon-thanh-vien.html" class="sidebar_main_block3_box1" id="bg_question">
                        <div class="sidebar_main_block3_box1_ic" id="ic_question"><?=$sb_ic_4?></div>
                        <div class="sidebar_main_block3_box1_text">
                            <div class="sidebar_main_block3_box1_text1" id="test_question">Câu hỏi chọn thành viên</div>
                        </div>
                    </a> 

                    <a href="<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-bai-viet-dang-cho.html" class="sidebar_main_block3_box1" id="bg_posts_waiting">
                        <div class="sidebar_main_block3_box1_ic" id="ic_posts_waiting"><?=$sb_ic_5?></div>
                        <div class="sidebar_main_block3_box1_text">
                            <div class="sidebar_main_block3_box1_text1 text_post_waiting">Bài viết đang chờ</div>
                            <div class="sidebar_main_block3_box1_text2 text_post_waiting"><?=$cout_post_day ?> bài viết mới hôm nay</div>
                        </div>
                    </a>

                    <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-bai-viet-da-len-lich.html" class="sidebar_main_block3_box1" id="pg_scheduled_posts">
                        <div class="sidebar_main_block3_box1_ic" id="ic_scheduled_posts"><?=$sb_ic_6?></div>
                        <div class="sidebar_main_block3_box1_text">
                            <div class="sidebar_main_block3_box1_text1" id="text_scheduled_posts">Bài viết đã lên lịch</div>
                        </div>
                    </a>

                    <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-quy-tac-nhom.html" class="sidebar_main_block3_box1" id="pg_quytacnhom">
                        <div class="sidebar_main_block3_box1_ic" id="ic_quytacnhom"><?=$sb_ic_7?></div>
                        <div class="sidebar_main_block3_box1_text">
                            <div class="sidebar_main_block3_box1_text1" id="text_quytacnhom">Quy tắc nhóm</div>
                        </div>
                    </a>

                    <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-noi-dung-thanh-vien-bao-cao.html" class="sidebar_main_block3_box1" id="pg_member_bc">
                        <div class="sidebar_main_block3_box1_ic" id="ic_member_bc"><?=$sb_ic_8?></div>
                        <div class="sidebar_main_block3_box1_text">
                            <div class="sidebar_main_block3_box1_text1 text_member_bc">Nội dung thành viên báo cáo</div>
                            <div class="sidebar_main_block3_box1_text2 text_member_bc"><?=$pick_time;?> tin mới hôm nay</div>
                        </div>
                    </a>
                </div>

                <?if (array_key_exists(($my_id."-".($my_type%2)), $arr_mem_admin)) {?>
                    <div class="sidebar_main_block4 border_bottom">
                        <div class="sidebar_main_block3_text">Công cụ quản trị</div>
                        <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-cai-dat-nhom.html" class="sidebar_main_block3_box1" id="pg_group_setting">
                            <div class="sidebar_main_block3_box1_ic" id="ic_group_setting"><?=$sb_ic_9?></div>
                            <div class="sidebar_main_block3_box1_text">
                                <div class="sidebar_main_block3_box1_text1 text_group_setting">Cài đặt nhóm</div>
                                <div class="sidebar_main_block3_box1_text2 text_group_setting">Quản lý cuộc thảo luận, quyền, vai trò</div>
                            </div>
                        </a>
                    </div>

                    <div class="sidebar_main_block4 border_bottom">
                        <div class="sidebar_main_block3_text">Thông tin chi tiết</div>

                        <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-muc-do-tang-truong.html" class="sidebar_main_block3_box1" id="pg_mucdo_tt">
                            <div class="sidebar_main_block3_box1_ic" id="ic_mucdo_tt"><?=$sb_ic_10?></div>
                            <div class="sidebar_main_block3_box1_text">
                                <div class="sidebar_main_block3_box1_text1" id="text_mucdo_tt">Mức độ tăng trưởng</div>
                            </div>
                        </a>

                        <a href="/<?=replaceTitle($group['group_name'])?>-<?=$group['id']?>-tuong-tac.html" class="sidebar_main_block3_box1" id="pg_tuongtac">
                            <div class="sidebar_main_block3_box1_ic" id="ic_tuongtac"><?=$sb_ic_11?></div>
                            <div class="sidebar_main_block3_box1_text">
                                <div class="sidebar_main_block3_box1_text1" id="text_tuongtac">Tương tác</div>
                            </div>
                        </a>
                    </div>
                <?}?>
            </div>
        </div>



    </div>
</div>
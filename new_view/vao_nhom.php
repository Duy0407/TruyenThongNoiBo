<?php
require_once '../config/config.php';
include '../includes/icon.php';
$type_create = 1;
$type_delete = 1;
$type_web = 2;
check_user_empoyee();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/private_group.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/popup_group.css?v=<?= $version ?>">
  <title>Nhóm</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">

      <div id="cdnhanvienc" class="cdnhanvienc">
        <div class="group_new_header">
          <?php include '../includes/cd_header_new.php'; ?>
        </div>
      </div>

      <div class="div_group_tong div_group_tong_vaonhom">
        
        <!-- sidebar -->
        <div class="group_new_header">
          <?php include '../includes/group/group_sidebar.php'; ?>
        </div>

        <div class="main_vao_nhom">
          <div class="main_vao_nhom_padding">
            <div class="main_vao_nhom_head">
              <div class="main_vao_nhom_head_banner">
                <div class="main_vao_nhom_head_banner_img"><img src="../img/image_new/banner.png" alt=""></div>
                <div class="main_vao_nhom_head_banner_sub">Nhóm của Darlene Robertson</div>
              </div>
              <div class="main_vao_nhom_head_sub">

                <div class="main_vao_nhom_head_sub_one">
                  <div class="main_vao_nhom_head_sub_one_name">Arlene McCoy</div>
                  <div class="main_vao_nhom_head_sub_one_group">
                    <div class="main_vao_nhom_head_sub_one_group_img"><img src="../img/image_new/lock.svg" alt=""></div>
                    <div class="main_vao_nhom_head_sub_one_group_p1">Nhóm riêng tư .</div>
                    <div class="main_vao_nhom_head_sub_one_group_p2">75.6K thành viên</div>
                  </div>

                  <div class="show_arrow_right_375"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                </div>

                <div class="main_vao_nhom_head_sub_two">
                  <button class="main_vao_nhom_head_sub_two_btn">
                    Tham gia nhóm
                  </button>
                </div>
              </div>

              <div class="main_vao_nhom_head_sub2">
                <div class="main_vao_nhom_head_sub2_one border_bt_blue active_text">Thảo luận</div>

                <div class="fig_position_fixed">
                  
                  <div class="them_ten_nhom_375">
                    <div class="them_ten_nhom_375_ic x_pp_name_group"><img src="../img/image_new/muiten_left.svg" alt=""></div>
                    <div class="them_ten_nhom_375_tex">Hội UI/UX Designers Viet Nam</div>
                  </div>
                
                  <div class="main_vao_nhom_head_sub2_two click_show_3chamvaonhom">
                    <img src="../img/image_new/btn_3cham.svg" alt="">

                    <div class="vao_nhom_pp">
                      <div class="vao_nhom_pp_padding">
                        <div class="vao_nhom_pp_one">
                          <div class="vao_nhom_pp_one_ic"><img src="../img/content_your.svg" alt=""></div>
                          <div class="vao_nhom_pp_one_text">Nội dung của bạn</div>
                        </div>
                        <div class="vao_nhom_pp_one">
                          <div class="vao_nhom_pp_one_ic"><img src="../img/image_new/search_new.svg" alt=""></div>
                          <div class="vao_nhom_pp_one_text">Tìm kiếm</div>
                        </div>
                        <div class="vao_nhom_pp_one">
                          <div class="vao_nhom_pp_one_ic"><img src="../img/v_share.svg" alt=""></div>
                          <div class="vao_nhom_pp_one_text">Chia sẻ</div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>


              </div>
            </div>

            <div class="main_vao_nhom_content">
              
              <!---------- Click tìm hiểu thêm ----------->
              <div class="tim_hieu_them">
                <div class="tim_hieu_them_padding">

                  <div class="tim_hieu_them_head">
                    <div class="tim_hieu_them_head_title border_bottom">Giới thiệu</div>
                    <div class="tim_hieu_them_head_content">
                        <div class="content_right_box1-main-text">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.
                        </div>

                        <div class="content_right_box1-main-option">
                            <div class="content_right_box1-main-option-one">
                                <div class="content_right_box1-main-option-one-img">
                                    <img src="../img/image_new/earth2.svg" alt="">
                                </div>
                                <div class="content_right_box1-main-option-one-text">
                                    <div class="content_right_box1-main-option-one-text1">Công khai</div>
                                    <div class="content_right_box1-main-option-one-text2">Bất kỳ ai cũng có thể nhìn thấy mọi người trong nhóm và những gì họ đăng.</div>
                                </div>
                            </div>
                        </div>

                        <div class="content_right_box1-main-option">
                            <div class="content_right_box1-main-option-one">
                                <div class="content_right_box1-main-option-one-img">
                                    <img src="../img/image_new/eye.svg" alt="">
                                </div>
                                <div class="content_right_box1-main-option-one-text">
                                    <div class="content_right_box1-main-option-one-text1">Hiển thị</div>
                                    <div class="content_right_box1-main-option-one-text2">Ai cũng có thể tìm nhóm này.</div>
                                </div>
                            </div>
                        </div>

                        <div class="content_right_box1-main-option">
                            <div class="content_right_box1-main-option-one">
                                <div class="content_right_box1-main-option-one-img">
                                    <img src="../img/image_new/location.svg" alt="">
                                </div>
                                <div class="content_right_box1-main-option-one-text">
                                    <div class="content_right_box1-main-option-one-text1">Hà Nội</div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tim_hieu_them_head">
                    <div class="tim_hieu_them_head_title border_bottom">Thành viên . 1254K</div>
                    <div class="tim_hieu_them_main_block1">
                      <div class="tim_hieu_them_main_block1_one">
                        <div class="tim_hieu_them_main_block1_one_menber">
                          <?php for ($i=0; $i < 10; $i++) { ?>
                            <div class="tim_hieu_them_main_block1_one_menber_img">
                              <img src="../img/image_new/banner.png" alt="">
                            </div>
                          <? } ?>
                        </div>
                        <div class="tim_hieu_them_main_block1_one_text">Huyền, Thu và 9 người khác tham gia</div>
                      </div>
                      <div class="tim_hieu_them_main_block1_one">
                        <div class="tim_hieu_them_main_block1_one_menber">
                          <?php for ($i=0; $i < 10; $i++) { ?>
                            <div class="tim_hieu_them_main_block1_one_menber_img">
                              <img src="../img/image_new/banner.png" alt="">
                            </div>
                          <? } ?>
                        </div>
                        <div class="tim_hieu_them_main_block1_one_text">Now Academy - Học thiết kế đồ họa thực chiến và 2 thành viên khác là quản trị viên. Minh và 2 thành viên khác là người kiểm duyệt.</div>
                      </div>
                      <div class="tim_hieu_them_main_block1_two cusor active_text">Xem tất cả</div>
                    </div>
                  </div>
                  <div class="tim_hieu_them_head">
                    <div class="tim_hieu_them_head_title border_bottom">Hoạt động</div>
                    <div class="tim_hieu_them_main_block2">
                      <div class="tim_hieu_them_main_block2_one">
                        <div class="tim_hieu_them_main_block2_one_ic"><img src="../img/image_new/posts_today.svg" alt=""></div>
                        <div class="tim_hieu_them_main_block2_one_text">Hôm nay có 10 bài viết mới</div>
                      </div>
                      <div class="tim_hieu_them_main_block2_one">
                        <div class="tim_hieu_them_main_block2_one_ic"><img src="../img/image_new/all_member.svg" alt=""></div>
                        <div class="tim_hieu_them_main_block2_one_text">Tổng cộng 123.123 thành viên</div>
                      </div>
                      <div class="tim_hieu_them_main_block2_one">
                        <div class="tim_hieu_them_main_block2_one_ic"><img src="../img/image_new/date_created.svg" alt=""></div>
                        <div class="tim_hieu_them_main_block2_one_text">Ngày tạo: 4 năm trước</div>
                      </div>
                    </div>
                  </div>
                  <div class="tim_hieu_them_head">
                    <div class="tim_hieu_them_head_title border_bottom">Quy tắc nhóm của quản trị viên </div>
                    <div class="tim_hieu_them_main_block3">
                      <div class="tim_hieu_them_main_block3_one">
                        <div class="tim_hieu_them_main_block3_one_title">1<span class="fig_mrr">Tôn trọng lẫn nhau</span></div>
                        <p class="tim_hieu_them_main_block3_one_p">Các thành viên trong nhóm phải tôn trọng lẫn nhau. Các hành vi bị CẤM: Dùng từ ngữ, hành động xúc phạm, bắt nạt, gây thù ghét, đe doạ thành viên khác. Nếu vi phạm sẽ bị chặn vĩnh viễn.</p>
                      </div>
                      <div class="tim_hieu_them_main_block3_one">
                        <div class="tim_hieu_them_main_block3_one_title">2<span class="fig_mrr">Chấp hành quy định của pháp luật</span></div>
                        <p class="tim_hieu_them_main_block3_one_p">Các thành viên trong nhóm phải tôn trọng lẫn nhau. Các hành vi bị CẤM: Dùng từ ngữ, hành động xúc phạm, bắt nạt, gây thù ghét, đe doạ thành viên khác. Nếu vi phạm sẽ bị chặn vĩnh viễn.</p>
                      </div>
                      <div class="tim_hieu_them_main_block3_one">
                        <div class="tim_hieu_them_main_block3_one_title">3<span class="fig_mrr">Chấp hành quy định của pháp luật</span></div>
                        <p class="tim_hieu_them_main_block3_one_p">Các thành viên trong nhóm phải tôn trọng lẫn nhau. Các hành vi bị CẤM: Dùng từ ngữ, hành động xúc phạm, bắt nạt, gây thù ghét, đe doạ thành viên khác. Nếu vi phạm sẽ bị chặn vĩnh viễn.</p>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
              <!-- -------------------------------------- -->

              <div class="pg_main_content vao_nhom_hidden fig_vao_nhom1">
                  <!-- Nhóm riêng tư hiện cái này -->
                  <div class="group_riengtu" hidden>
                    <div class="group_riengtu_padding">
                      <div class="group_riengtu_sub">
                        <div class="group_riengtu_sub_img"><img src="../img/image_new/ic_group_riengtu.svg" alt=""></div>
                        <div class="group_riengtu_sub_title">Đây là nhóm riêng tư</div>
                        <p class="group_riengtu_sub_p">Hãy tham gia nhóm này để xem hoặc cùng thảo luận nhé.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Nhóm Công khai hiện cái này -->
                  <div class="pg_main_content_left" >
                      <?php for ($i = 0; $i < 1; $i++) : ?>
                          <div class="main_content_left_posts margin_t0">
                              <div class="main_content_left_posts_pd">
                                  <div class="show_posts">
                                      <div class="main_content_left_posts_pd_sub">

                                          <div class="left_posts_block1">
                                              <div class="left_posts_block1_info">
                                                  <div class="left_posts_block1_info_img">
                                                      <img src="../img/image_new/banner.png" alt="">
                                                  </div>
                                                  <div class="left_posts_block1_info_text">
                                                      <div class="left_posts_block1_info_text_name elipsis1">Ralph Edwards Ralph Edwards Ralph Edwards Ralph Edwards</div>
                                                      <div class="left_posts_block1_info_text_sub">
                                                          <div class="left_posts_block1_info_text_sub1 active_text">Quản trị viên</div>
                                                          <div class="left_posts_block1_info_text_sub2">. 3 giờ .</div>
                                                          <div class="left_posts_block1_info_text_sub3_img">
                                                              <img src="../img/image_new/earth.svg" alt="">
                                                          </div>

                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="left_posts_block1_ic click_dong_3cham_chung cusor click_3cham_posts">
                                                  <img src="../img/image_new/3cham_ngang.svg" alt="">

                                                  <div class="pp_baiviet">
                                                      <div class="pp_baiviet_padding">
                                                          <div class="popup_3cham_div">
                                                              <div class="popup_3cham_div_img w20_h20"><img src="../img/image_new/ghim_moi.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Ghim bài viết</div>
                                                          </div>
                                                          <div class="popup_3cham_div">
                                                              <div class="popup_3cham_div_img w20_h20"><img src="../img/image_new/bo_ghim.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Bỏ ghim bài viết</div>
                                                          </div>
                                                          <div class="popup_3cham_div ep_post_action1_save">
                                                              <div class="popup_3cham_div_img them_mr"><img src="../img/image_new/luu_posts.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Lưu bài viết</div>
                                                          </div>
                                                          <div class="popup_3cham_div">
                                                              <div class="popup_3cham_div_img w20_h20"><img src="../img/ep_post_turn_off_notify.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Tắt thông báo</div>
                                                          </div>
                                                          <div class="popup_3cham_div ep_post_action1_deatail_notify">
                                                              <div class="popup_3cham_div_img w20_h20"><img src="../img/ep_post_notify.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Bật thông báo</div>
                                                          </div>
                                                          <div class="popup_3cham_div ep_post_who_cmt">
                                                              <div class="popup_3cham_div_img w20_h20"><img src="../img/tat-tinh-nang-bl.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Tắt tính năng bình luận</div>
                                                          </div>
                                                          <div class="popup_3cham_div">
                                                              <div class="popup_3cham_div_img w20_h20"><img src="../img/image_new/edit_posts.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Chỉnh sửa bài viết</div>
                                                          </div>
                                                          <div class="popup_3cham_div">
                                                              <div class="popup_3cham_div_img"><img src="../img/an-bai-viet2.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Ẩn bài viết</div>
                                                          </div>
                                                          <div class="popup_3cham_div ep_post_del_post">
                                                              <div class="popup_3cham_div_img"><img src="../img/icon_del_post.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Xóa bài viết</div>
                                                          </div>

                                                          <!-- Quản trị viên -->
                                                          <div class="popup_3cham_div click_gbv">
                                                              <div class="popup_3cham_div_img"><img src="../img/image_new/go_posts.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Gỡ bài viết</div>
                                                          </div>
                                                          <div class="popup_3cham_div click_gbv_ctg">
                                                              <div class="popup_3cham_div_img"><img src="../img/image_new/ban_tacgia.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Gỡ bài viết và chặn tác giả</div>
                                                          </div>
                                                          <div class="popup_3cham_div click_bc_qtv">
                                                              <div class="popup_3cham_div_img"><img src="../img/image_new/baocao.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Báo cáo bài viết với quản trị viên nhóm</div>
                                                          </div>
                                                          <div class="popup_3cham_div">
                                                              <div class="popup_3cham_div_img"><img src="../img/image_new/tim_hotro.svg" alt=""></div>
                                                              <div class="popup_3cham_div_text">Tìm hỗ trợ hoặc báo cáo bài viết</div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>


                                          </div>

                                          <div class="left_posts_block2">
                                              <p class="left_posts_block2_text elipsis4">
                                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                              </p>
                                              <div class="xem_them_noidung active_text">Xem thêm</div>
                                          </div>

                                      </div>

                                      <div class="left_posts_block3">
                                          <div class="left_posts_block3_img">
                                              <img src="../img/image_new/img_cogai.png" alt="">
                                          </div>

                                          <div class="left_posts_block3_option">

                                              <!-- Lựa chọn Check box -->
                                              <div class="posts_block3_option_padding">
                                                  <div class="posts_block3_option_padding1">
                                                      <div class="posts_block3_option_padding1_check"><input type="checkbox" name="check_luachon"></div>
                                                      <div class="posts_block3_option_padding1_text">Lựa chọn Checkbox</div>
                                                  </div>
                                                  <div class="posts_block3_option_padding2">
                                                      <div class="posts_block3_option_padding2_text active_text">25 %</div>
                                                      <div class="posts_block3_option_padding2_ic"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                                                  </div>
                                              </div>
                                              <!-- Lựa chọn Radio -->
                                              <div class="posts_block3_option_padding">
                                                  <div class="posts_block3_option_padding1">
                                                      <div class="posts_block3_option_padding1_check"><input type="radio" name="radio_luachon" checked></div>
                                                      <div class="posts_block3_option_padding1_text">Lựa chọn Radio</div>
                                                  </div>
                                                  <div class="posts_block3_option_padding2">
                                                      <div class="posts_block3_option_padding2_text active_text">25 %</div>
                                                      <div class="posts_block3_option_padding2_ic"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                                                  </div>
                                              </div>

                                              <div class="posts_block3_option_padding">
                                                  <div class="posts_block3_option_padding1">
                                                      <div class="posts_block3_option_padding1_check"><input type="checkbox" name="check_luachon"></div>
                                                      <div class="posts_block3_option_padding1_text">
                                                          <div class="posts_block3_option_padding1_text1">Do <span class="active_text">Ralph Edwwards</span> Thêm</div>
                                                          <div class="posts_block3_option_padding1_text2">Lựa chọn 1</div>
                                                      </div>
                                                  </div>
                                                  <div class="posts_block3_option_padding2">
                                                      <div class="posts_block3_option_padding2_text active_text">25 %</div>
                                                      <div class="posts_block3_option_padding2_ic"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                                                  </div>
                                              </div>

                                              <div class="posts_block3_option_padding">
                                                  <div class="posts_block3_option_padding1">
                                                      <input type="text" placeholder="Thêm lựa chọn thăm dò ý kiến" class="add_yc">
                                                  </div>
                                                  <div class="posts_block3_option_padding2">
                                                      <div class="posts_block3_option_padding2_text active_text">25 %</div>
                                                      <div class="posts_block3_option_padding2_ic"><img src="../img/image_new/ic_left24.svg" alt=""></div>
                                                  </div>
                                              </div>

                                          </div>
                                          
                                      </div>

                                      <div class="left_posts_like_and_comment">
                                          <div class="left_posts_like_and_comment_box1 border_bottom">
                                              <div class="left_posts_like_and_comment_box1_sub1">
                                                  <div class="left_posts_like_count">
                                                      <img src="../img/image_new/count_like.svg" alt="">
                                                  </div>
                                                  <div class="left_posts_like_text">1M</div>
                                              </div>
                                              <div class="left_posts_like_and_comment_box1_sub2">20 Bình luận</div>
                                          </div>

                                          <div class="left_posts_like_and_comment_box2 border_bottom">

                                              <div class="left_posts_like_and_comment_box2_nav1">
                                                  <div class="left_posts_like_and_comment_box2_nav1_img">
                                                      <img src="../img/image_new/like.svg" alt="">
                                                  </div>
                                                  <div class="left_posts_like_and_comment_box2_nav1_text">Thích</div>
                                              </div>

                                              <div class="left_posts_like_and_comment_box2_nav1">
                                                  <div class="left_posts_like_and_comment_box2_nav1_img">
                                                      <img src="../img/image_new/ic_comment.svg" alt="">
                                                  </div>
                                                  <div class="left_posts_like_and_comment_box2_nav1_text">Bình luận</div>
                                              </div>

                                              <div class="left_posts_like_and_comment_box2_nav1">
                                                  <div class="left_posts_like_and_comment_box2_nav1_img">
                                                      <img src="../img/image_new/ic_share.svg" alt="">
                                                  </div>
                                                  <div class="left_posts_like_and_comment_box2_nav1_text">Chia sẻ</div>
                                              </div>

                                          </div>

                                          <div class="left_posts_viet_comment">
                                              <div class="left_posts_viet_comment_sub">
                                                  <div class="left_posts_viet_comment_sub_img">
                                                      <img src="../img/image_new/banner.png" alt="">
                                                  </div>
                                                  <div class="left_posts_viet_comment_sub_nhap">
                                                      <input type="text" placeholder="Viết bình luận...">

                                                      <div class="icon_absolute">
                                                          <div class="icon_absolute_flex">
                                                              <div class="icon_absolute_img">
                                                                  <img src="../img/image_new/bieu_cam.svg" alt="">
                                                              </div>
                                                              <div class="icon_absolute_img2">
                                                                  <img src="../img/image_new/ic_img.svg" alt="">
                                                              </div>
                                                              <div class="icon_absolute_img2">
                                                                  <img src="../img/image_new/ic_gif.svg" alt="">
                                                              </div>
                                                              <div class="icon_absolute_img">
                                                                  <img src="../img/image_new/ic_haha.svg" alt="">
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="left_posts_user_comment">
                                              <div class="user_comment_sub">
                                                  <div class="user_comment_avt">
                                                      <img src="../img/image_new/banner.png" alt="">
                                                  </div>
                                                  <div class="user_comment_text">
                                                      <div class="user_comment_text_sub">
                                                          <div class="user_comment_name">Lê Thu Trà</div>
                                                          <div class="user_comment_text_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                                                      </div>
                                                      <div class="user_comment_text_select">
                                                          <div class="user_comment_text_select_sub">
                                                              <div class="user_comment_text_select1 cusor active_text">Bỏ thích</div>
                                                              <div class="user_comment_text_select2 cusor">. Trả lời .</div>
                                                              <div class="user_comment_text_select3">10 phút trước .</div>
                                                          </div>
                                                          <div class="user_comment_text_select_sub2">
                                                              <div class="user_comment_text_select4">
                                                                  <img src="../img/image_new/count_like.svg" alt="">
                                                              </div>
                                                              <div class="user_comment_text_select5 active_text">1</div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="user_comment_icon_3cham cusor">
                                                      <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                  </div>

                                              </div>

                                              <div class="user_comment_sub_childen">
                                                  <div class="user_comment_sub_childen_sub">
                                                      <div class="user_comment_sub_childen_avt">
                                                          <img src="../img/image_new/banner.png" alt="">
                                                      </div>

                                                      <div class="user_comment_sub_childen_cm">
                                                          <div class="user_comment_sub_childen_cm_sub">
                                                              <div class="user_comment_sub_childen_cm_name">Lê Thu Trà</div>
                                                              <div class="user_comment_sub_childen_cm_text">Lorem Ipsum is simply dummy textof the printing and typesetting industry.</div>
                                                          </div>

                                                          <div class="user_comment_text_select">
                                                              <div class="user_comment_text_select_sub">
                                                                  <div class="user_comment_text_select1 cusor active_text">Bỏ thích</div>
                                                                  <div class="user_comment_text_select2 cusor">. Trả lời .</div>
                                                                  <div class="user_comment_text_select3">10 phút trước .</div>
                                                              </div>
                                                              <div class="user_comment_text_select_sub2">
                                                                  <div class="user_comment_text_select4">
                                                                      <img src="../img/image_new/count_like.svg" alt="">
                                                                  </div>
                                                                  <div class="user_comment_text_select5 active_text">1</div>
                                                              </div>
                                                          </div>
                                                      </div>

                                                      <div class="user_comment_icon_3cham cusor">
                                                          <img src="../img/image_new/3cham_ngang.svg" alt="">
                                                      </div>
                                                  </div>

                                                  <div class="user_viet_cm_childen">
                                                      <div class="user_viet_cm_childen_img">
                                                          <img src="../img/image_new/banner.png" alt="">
                                                      </div>
                                                      <div class="user_viet_cm_childen_input">
                                                          <input type="text" placeholder="Viết bình luận...">

                                                          <div class="icon_abs">
                                                              <div class="icon_abs_sub">
                                                                  <div class="icon_abs_sub_img">
                                                                      <img src="../img/image_new/bieu_cam.svg" alt="">
                                                                  </div>
                                                                  <div class="icon_abs_sub_img2">
                                                                      <img src="../img/image_new/ic_img.svg" alt="">
                                                                  </div>
                                                                  <div class="icon_abs_sub_img2">
                                                                      <img src="../img/image_new/ic_gif.svg" alt="">
                                                                  </div>
                                                                  <div class="icon_abs_sub_img">
                                                                      <img src="../img/image_new/ic_haha.svg" alt="">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="xem_them_comment">Xem thêm bình luận</div>

                                              </div>
                                          </div>

                                      </div>
                                  </div>

                                  <div class="hide_posts"></div>
                              </div>
                          </div>
                      <?php endfor; ?>
                  </div>


                  <div class="pg_main_content_right show_impoted">
                      <div class="content_right_box1">
                          <div class="content_right_box1_padding">
                              <div class="content_right_box1_padding_title border_bottom">Giới thiệu</div>
                              <div class="content_right_box1_padding-main">
                                  <div class="content_right_box1-main-text">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.
                                  </div>

                                  <div class="content_right_box1-main-option">
                                      <div class="content_right_box1-main-option-one">
                                          <div class="content_right_box1-main-option-one-img">
                                              <img src="../img/image_new/earth2.svg" alt="">
                                          </div>
                                          <div class="content_right_box1-main-option-one-text">
                                              <div class="content_right_box1-main-option-one-text1">Công khai</div>
                                              <div class="content_right_box1-main-option-one-text2">Bất kỳ ai cũng có thể nhìn thấy mọi người trong nhóm và những gì họ đăng.</div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="content_right_box1-main-option">
                                      <div class="content_right_box1-main-option-one">
                                          <div class="content_right_box1-main-option-one-img">
                                              <img src="../img/image_new/eye.svg" alt="">
                                          </div>
                                          <div class="content_right_box1-main-option-one-text">
                                              <div class="content_right_box1-main-option-one-text1">Hiển thị</div>
                                              <div class="content_right_box1-main-option-one-text2">Ai cũng có thể tìm nhóm này.</div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="content_right_box1-main-option">
                                      <div class="content_right_box1-main-option-one">
                                          <div class="content_right_box1-main-option-one-img">
                                              <img src="../img/image_new/location.svg" alt="">
                                          </div>
                                          <div class="content_right_box1-main-option-one-text">
                                              <div class="content_right_box1-main-option-one-text1">Hà Nội</div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="content_right_box1-main-btn active_text cusor click_timhieuthem">Tìm hiểu thêm</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>
  </div>

<?php
include '../includes/popup_index_ep.php';
include '../includes/index_employee/popup_turn_on_notify.php';
include '../includes/index_employee/popup_sup_news.php';
include '../includes/index_employee/popup_success.php';
include '../includes/index_employee/delete_post.php';
include '../includes/index_employee/who_comment.php';
include '../includes/index_employee/object_see_post.php';
include '../includes/ep_group/setting.php';
include '../includes/ep_group/create_gr.php';
include '../includes/ep_group/custom_notify.php';
include '../includes/ep_group/ghim_group.php';
include '../includes/ep_group/following.php';
include '../includes/ep_group/exit_group.php';
include '../includes/index_employee/save_post.php';
include '../includes/index_employee/send_with_chat.php';
include '../includes/index_employee/share_up_group.php';
include '../includes/index_employee/share_up_invidual.php';
?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/select2.min.js" defer></script>
<script src="../js/caidat.js" defer></script>
<script src="../js/core.js" defer></script>
<script src="../js/ep_index.js?v=<?= $version ?>" defer></script>
<script src="../js/ep_group.js?v=<?= $version ?>" defer></script>

<script>
    // $("#bg_khampha").addClass("active_background");
    // $("#ic_khampha").addClass("colof_icon")
    // $("#text_khampha").addClass("active_text");


    function create_gr_new(cgn){
        $(".create_gr").show();
        $(".form_group_select").select2();
        $(".create_gr_header").text("Tạo nhóm");
    }
    $(".click_show_3chamvaonhom").click(function(){
      $(".vao_nhom_pp").toggle(500);
    });

    $(".click_timhieuthem").click(function(){
      $(".tim_hieu_them").show();
      $(".vao_nhom_hidden").hide();
      $(".main_vao_nhom_head_sub2_one").removeClass("border_bt_blue");
      $(".main_vao_nhom_head_sub2_one").removeClass("active_text");
    })
</script>

</html>
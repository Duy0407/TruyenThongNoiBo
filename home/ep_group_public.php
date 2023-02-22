<?php
require_once '../config/config.php';
$id = getValue('id','int','GET','');
$type = getValue('type','int','GET','');
if ($id % 2 == 0) {
  // 0 là công khai
  $regime_gr = 0;
}else{
  // 1 là riêng tư
  $regime_gr = 1;
}

if ($type == 0) {
  $regime_admin = 0;
}else{
  $regime_admin = 1;
}

$type_create = 1;
$type_delete = 1;
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
  <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/index_employee.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/ep_group.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version?>">
  <link rel="stylesheet" href="../css/ep_group_public.css?v=<?= $version ?>">
  <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
  <title>Nhóm công khai</title>
</head>

<body>
  <div id="thongbao_tinnhan">
    <div class="wapper">
      <?php include '../includes/cd_sidebar.php' ?>
      <div class="sidebar_index">
        <div class="sidebar_index_header">
          <img class="sidebar_index_icon show_sidebar_24h" src="../img/24h_show_sidebar.svg" alt="Ảnh lỗi">
        </div>
        <div class="sidebar_index_body">
          <button class="sidebar_index_setting">Cài đặt</button>
          <div class="ep_group_setting">
            <p class="ep_group_setting_text">Cài đặt nhóm</p>
            <p class="ep_group_setting_content">Bạn có thể quản lý cách nhận thông báo về thông tin mới của Nhóm.</p>
            <div class="ep_group_setting_detail ep_group_setting_detail_show">
              <img class="ep_group_setting_icon" src="../img/ep_group_notify.svg" alt="Ảnh lỗi">
              <p class="ep_group_setting_detail_p">Hiển thị thông báo</p>
              <input type="checkbox" name="" id="show_notify" hidden>
              <label for="show_notify" class="show_notify_label"></label>
            </div>
            <div class="ep_group_setting_detail ep_group_setting_custom_notify">
              <img class="ep_group_setting_icon" src="../img/ep_group_setting.svg" alt="Ảnh lỗi">
              Tùy chỉnh thông báo
            </div>
            <div class="ep_group_setting_detail ep_group_setting_ghim_gr">
              <img class="ep_group_setting_icon" src="../img/ep_group_ghim.svg" alt="Ảnh lỗi">
              Ghim
            </div>
            <div class="ep_group_setting_detail ep_group_setting_following">
              <img class="ep_group_setting_icon" src="../img/ep_group_follow.svg" alt="Ảnh lỗi">
              Đang theo dõi
            </div>
            <div class="ep_group_setting_detail ep_group_setting_exit_group">
              <img class="ep_group_setting_icon" src="../img/ep_group_exit.svg" alt="Ảnh lỗi">
              Rời khỏi nhóm
            </div>
          </div>
          <p class="sidebar_index_body_title">Nhóm</p>
          <button class="create_btn_group">+ Tạo nhóm mới</button>
          <div class="group_manager">
            <p class="group_manager_title">Nhóm do bạn quản lý</p>
            <div class="ep_group_list_item">
              <?php
              for ($i = 0; $i < 5; $i++) {
              ?>
                <a href="/nhom-cong-khai.html?id=<?=$i?>&type=1" class="ep_group_item">
                  <img class="ep_group_item_avt" src="https://images.unsplash.com/photo-1638500551033-a0f60c8e768e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                  <div>
                    <p class="ep_group_name">Nhóm ABC</p>
                    <p class="count_member_group">20 thành viên</p>
                  </div>
                </a>
              <?php
              }
              ?>
            </div>
            <div class="ep_group_join">
              <p class="ep_group_join_title">Nhóm bạn đã tham gia</p>
              <div class="ep_group_join_list_item">
                <?php
                for ($i = 0; $i < 5; $i++) {
                ?>
                  <a href="/nhom-cong-khai.html?id=<?=$i?>&type=0" class="ep_group_item">
                    <img class="ep_group_item_avt" src="https://images.unsplash.com/photo-1638500551033-a0f60c8e768e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                    <div>
                      <p class="ep_group_name">Nhóm ABC</p>
                      <p class="count_member_group">20 thành viên</p>
                    </div>
                  </a>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="cdnhanvienc" class="cdnhanvienc">
        <?php
        include '../includes/cd_header.php';
        ?>
        <div id="center">
          <div class="center_avt">
            <div class="center_avt_header">
              <img class="show_sidebar_right" src="../img/show_sidebar_right.svg" alt="Ảnh lỗi">
              <img class="center_cover_img" src="https://images.unsplash.com/photo-1638500551033-a0f60c8e768e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
              <button class="center_cover_upload_btn"><img class="center_cover_upload_img" src="../img/center_cover_upload_img.svg" alt="Ảnh lỗi">Chỉnh sửa ảnh bìa</button>
              <input type="file" class="input_upload_cover_gr" hidden>
            </div>
            <div class="center_avt_footer">
              <div class="center_avt_info">
                <img class="center_avt_footer_img" src="https://images.unsplash.com/photo-1638518482512-4b32241d7ba8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                <img class="center_upload_avt_icon" src="../img/center_upload_avt_icon.svg" alt="Ảnh lỗi">
                <input class="input_upload_gr" type="file" hidden>
              </div>
              <div class="center_avt_info_detail">
                <p class="center_avt_name">Nhóm ABC</p>
                <p class="center_avt_count_mem">20 thành viên</p>
              </div>
              <div class="center_avt_btn">
                <button class="center_avt_join">
                  <img class="center_avt_btn_join" src="../img/center_avt_btn_join.svg" alt="Ảnh lỗi"> Đã tham gia <img class="center_avt_dropdown" src="../img/center_avt_dropdown.svg" alt="Ảnh lỗi">
                </button>
                <button class="center_avt_join_meet">+ Mời</button>
                <div class="popup_avt_btn">
                  <div class="popup_avt_btn_detail popup_avt_btn_event_join">
                    <img class="center_avt_btn_join" src="../img/center_avt_btn_join.svg" alt="Ảnh lỗi"> Đã tham gia <img class="center_avt_dropdown" src="../img/ls_dropdown(1).svg" alt="Ảnh lỗi">
                  </div>
                  <div class="popup_avt_btn_detail popup_avt_setting_notify">
                    <img class="center_avt_btn_join" src="../img/center_avt_notify.svg" alt="Ảnh lỗi"> Cài đặt thông báo
                  </div>
                  <div class="popup_avt_btn_detail popup_avt_unflow">
                    <img class="center_avt_btn_join" src="../img/center_avt_unflow.svg" alt="Ảnh lỗi"> Bỏ theo dõi nhóm
                  </div>
                  <div class="popup_avt_btn_detail popup_avt_exit_gr">
                    <img class="center_avt_btn_join" src="../img/center_gr_exit.svg" alt="Ảnh lỗi"> Rời khỏi nhóm
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="center_public_body">
            <div class="center_detail">
              <div class="center_nav">
                <div class="center_nav_deatail center_nav_post">Bài viết</div>
                <div class="center_nav_deatail center_nav_intro">Giới thiệu</div>
                <div class="center_nav_deatail center_nav_member">Thành viên</div>
                <div class="center_nav_deatail center_nav_album">Ảnh</div>
                <div class="center_nav_deatail center_nav_de_see_more">Xem thêm <img class="center_group_public_dropdown" src="../img/center_group_public_dropdown.svg" alt="Ảnh lỗi"></div>
                <div class="center_nav_see_more">
                  <div class="center_nav_see_more_detail center_nav_see_more_detail_content_you">
                    <img class="center_nav_see_more_icon" src="../img/content_your.svg" alt="content_your.svg">
                    Nội dung của bạn
                  </div>
                  <div class="center_nav_see_more_detail center_nav_see_more_share">
                    <img class="center_nav_see_more_icon" src="../img/v_share.svg" alt="content_your.svg">
                    Chia sẻ
                  </div>
                  <div class="center_nav_see_more_detail center_nav_ghim_gr">
                    <img class="center_nav_see_more_icon" src="../img/../img/ghim_ep_public_gr.svg" alt="content_your.svg">
                    Ghim nhóm
                  </div>
                  <div class="center_nav_see_more_detail center_nav_stop_gr">
                    <img class="center_nav_see_more_icon" src="../img/stop_gr.svg" alt="content_your.svg">
                    Tạm dừng nhóm
                  </div>
                  
                  <div class="ep_post_popup_share">
                    <div class="ep_post_popup_share_detail ep_share_post">
                      <img src="../img/ep_post_share_now.svg" alt="Ảnh lỗi">
                      <span class="ep_post_popup_share_text">Chia sẻ ngay</span>
                    </div>
                    <div class="ep_post_popup_share_detail ep_share_news_gr">
                      <img src="../img/ep_post_share_new.svg" alt="Ảnh lỗi">
                      <span class="ep_post_popup_share_text">Chia sẻ lên bảng tin</span>
                    </div>
                    <div class="ep_post_popup_share_detail ep_send_with_chat">
                      <img src="../img/ep_post_share_mess.svg" alt="Ảnh lỗi">
                      <span class="ep_post_popup_share_text">Gửi bằng Chat</span>
                    </div>
                    <div class="ep_post_popup_share_detail ep_share_up_group">
                      <img src="../img/ep_post_share_group.svg" alt="Ảnh lỗi">
                      <span class="ep_post_popup_share_text">Chia sẻ lên nhóm</span>
                    </div>
                    <div class="ep_post_popup_share_detail ep_share_up_invidual">
                      <img src="../img/ep_post_page_friend.svg" alt="Ảnh lỗi">
                      <span class="ep_post_popup_share_text">Chia sẻ lên trang cá nhân của bạn bè</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="group_public_post">
                <div class="post_feel">
                  <div class="post_feel_header">
                    <img class="post_feel_avt" src="https://images.unsplash.com/photo-1637718561477-3134fe73dbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                    <input class="post_feel_search" type="text" placeholder="Hãy viết cảm nghĩ của bạn">
                  </div>
                  <div class="post_feel_footer">
                    <div class="post_feel_footer_item post_feel_footer_item_upload">
                      <img class="icon_post_footer" src="../img/upload_file.svg" alt="Ảnh lỗi">
                      Ảnh/video/tệp
                    </div>
                    <div class="post_feel_footer_item post_feel_footer_item_name_metion">
                      <img class="icon_post_footer" src="../img/post_feel_user_tag.svg" alt="Ảnh lỗi">
                      Nhắc tên thành viên
                    </div>
                    <div class="post_feel_footer_item post_feel_footer_item_activity">
                      <img class="icon_post_footer" src="../img/icon_post_footer_active.svg" alt="Ảnh lỗi">
                      Cảm xúc/Hoạt động
                    </div>
                  </div>
                </div>
                <div class="center_post_ghim">
                  <p class="center_post_ghim_title">Ghim bài viết</p>
                  <div class="center_post_ghim_box">
                    <img class="picture_ghim_post" src="../img/picture_ghim_post.png" alt="Ảnh lỗi">
                    <div>
                      <p class="center_post_ghim_title">Nêu bật những điều đáng chú ý nhất trong nhóm</p>
                      <p class="center_post_ghim_content">Nêu bật những điều đáng chú ý nhất trong nhóm ở một nơi thuận tiện mà bạn có thể ghim bài viết</p>
                    </div>
                  </div>
                </div>
                <?php
                for ($v = 0; $v < 2; $v++) {
                ?>
                  <div class="center_body">
                    <div class="ep_post_detail">
                      <div class="ep_post_detail_item">
                        <img class="ep_post_avt" src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80" alt="Ảnh lỗi">
                        <div>
                          <p class="ep_post_author_name">Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị
                            Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê Thị Thu Lê
                            Thị Thu</p>
                          <p class="ep_post_time"><span class="obj_post_news">Quản trị viên</span> 16:00 11/06/2021.
                            <?php
                            $i = 1;
                            if ($regime_gr == 0) {
                            ?>
                              <img class="icon_regime" src="../img/ep_gr_admin.svg" alt="Ảnh lỗi">
                            <?php
                            } else {
                            ?>
                              <img class="icon_regime" src="../img/post_congkhai.svg" alt="Ảnh lỗi">
                            <?php
                            }
                            ?>
                          </p>
                        </div>
                        <img class="ep_post_more" src="../img/ep_post_more.svg" alt="ep_post_more.svg">
                        
                        <div class="ep_post_action1">
                          <div class="ep_post_action1_deatail ep_post_ghim">
                            <img src="../img/ghim_ep_public_gr.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Ghim bài viết</span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_action1_save">
                            <?php
                            $k = 1;
                            if ($k == 0) {
                              $img_save = "../img/ep_post_no_save.svg";
                              $text_save = "Bỏ lưu bài viết";
                            } else {
                              $img_save = "../img/ep_post_save.svg";
                              $text_save = "Lưu bài viết";
                            }
                            ?>
                            <img src="<?= $img_save ?>" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text"><?= $text_save ?></span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_action1_deatail_notify">
                            <?php
                            $k = 1;
                            if ($k == 0) {
                              $img_notify = "../img/ep_post_turn_off_notify.svg";
                              $text_notify = "Tắt thông báo";
                            } else {
                              $img_notify = "../img/ep_post_notify.svg";
                              $text_notify = "Bật thông báo";
                            }
                            ?>
                            <img src="<?= $img_notify ?>" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text ep_post_turnon_notify"><?= $text_notify ?></span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_who_cmt">
                            <img src="../img/tat-tinh-nang-binh-luan.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Tắt tính năng bình luận</span>
                          </div>
                          <div class="ep_post_action1_deatail">
                            <img src="../img/chinh-sua-bai-viet.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Chỉnh bài viết</span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_action1_hide">
                            <img src="../img/an-bai-viet2.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Ẩn bài viết</span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_del_post">
                            <img src="../img/icon_del_post.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Xóa bài viết</span>
                          </div>
                        </div>

                      </div>
                      <div class="ep_post_content">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                      </div>
                      <div class="ep_post_file">
                        <div class="ep_post_file_div">
                          <?php
                          for ($i = 0; $i < 3; $i++) {
                          ?>
                            <a download class="ep_post_file_div_detail">
                              <p class="ep_post_name_file">Báo cáo công việc ABC.xlsx</p>
                              <p class="ep_post_file_size">121KB 10:03, 07/09/2021</p>
                              <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                            </a>
                          <?php
                          }
                          ?>
                        </div>
                        <div class="ep_post_file_img">
                          <?php
                          for ($i = 0; $i < 4; $i++) {
                          ?>
                            <img class="ep_post_file_img_detail" src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80" alt="Ảnh lỗi">
                          <?php
                          }
                          ?>
                          <div class="ep_post_file_img_more">+5</div>
                        </div>
                      </div>
                      <div class="ep_post_count_like">
                        <div class="ep_post_sum_like">
                          <img src="../img/ep_post_like.svg" alt="Ảnh lỗi">
                          100
                        </div>
                        <div class="ep_post_sum_cmt">
                          20 Bình luận 12 Lượt chia sẻ
                        </div>
                      </div>
                      <div class="ep_post_action">
                        <div class="ep_post_action_detail">
                          <?php
                          $j = 2;
                          if ($j == 1) {
                          ?>
                            <img src="../img/ep_post_active_like.svg" alt="Ảnh lỗi">
                          <?php
                          } else {
                          ?>
                            <img src="../img/ep_post_liked.svg" alt="Ảnh lỗi">
                          <?php
                          }
                          ?>
                          <span class="ep_post_like_text">Thích</span>
                        </div>
                        <div class="ep_post_action_detail" onclick="focus_cmt(this)">
                          <img src="../img/ep_post_cmt.svg" alt="Ảnh lỗi">
                          <span class="ep_post_cmt_text">Bình luận</span>
                        </div>
                        <?php
                        if ($regime_gr == 0) {
                        ?>
                        <div class="ep_post_popup_share">
                          <div class="ep_post_popup_share_detail ep_share_post">
                            <img src="../img/ep_post_share_now.svg" alt="Ảnh lỗi">
                            <span class="ep_post_popup_share_text">Chia sẻ ngay</span>
                          </div>
                          <div class="ep_post_popup_share_detail ep_share_news">
                            <img src="../img/ep_post_share_new.svg" alt="Ảnh lỗi">
                            <span class="ep_post_popup_share_text">Chia sẻ lên bảng tin</span>
                          </div>
                          <div class="ep_post_popup_share_detail ep_send_with_chat">
                            <img src="../img/ep_post_share_mess.svg" alt="Ảnh lỗi">
                            <span class="ep_post_popup_share_text">Gửi bằng Chat</span>
                          </div>
                          <div class="ep_post_popup_share_detail ep_share_up_group">
                            <img src="../img/ep_post_share_group.svg" alt="Ảnh lỗi">
                            <span class="ep_post_popup_share_text">Chia sẻ lên nhóm</span>
                          </div>
                          <div class="ep_post_popup_share_detail ep_share_up_invidual">
                            <img src="../img/ep_post_page_friend.svg" alt="Ảnh lỗi">
                            <span class="ep_post_popup_share_text">Chia sẻ lên trang cá nhân của bạn bè</span>
                          </div>
                        </div>
                        <div class="ep_post_action_detail ep_post_turnon_popup_share" onclick="turn_on_popup_share(this)">
                          <img class="ep_post_turnon_popup_share_img" src="../img/ep_post_share.svg" alt="Ảnh lỗi">
                          <span class="ep_post_cmt_text">Chia sẻ</span>
                        </div>
                        <?php
                        }
                        ?>
                      </div>
                      <form class="ep_post_write">
                        <img class="ep_post_write_avt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                        <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                        <div class="ep_post_write_action">
                          <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                          <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                          <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                        </div>
                      </form>
                      <div class="ep_post_show_cmt">
                        <div class="ep_post_show_cmt_detail">
                          <img class="ep_show_cmt_avt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                          <div class="ep_show_cmt_content">
                            <div class="ep_show_cmt_content_detail">
                              <p class="ep_show_cmt_username">Lê Thu Trà</p>
                              <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                              <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                              <div class="popup_action_cmt">
                                <div class="popup_action_cmt_detail">
                                  <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                  Chỉnh sửa bình luận
                                </div>
                                <div class="popup_action_cmt_detail">
                                  <?php
                                  $i = 1;
                                  if ($i == 0) {
                                    $icon_show = '../img/ep_show_cmt.svg';
                                    $text_show = 'Hiện bình luận';
                                  } else {
                                    $icon_show = '../img/ep_hide_cmt.svg';
                                    $text_show = 'Ẩn bình luận';
                                  }
                                  ?>
                                  <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                  <?= $text_show ?>
                                </div>
                                <div class="popup_action_cmt_detail">
                                  <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg" alt="Ảnh lỗi">
                                  Xóa bình luận
                                </div>
                              </div>
                            </div>
                            <div class="ep_show_cmt_action2">
                              <button class="ep_show_cmt_action2_btn">Thích . </button>
                              <button class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                              <button class="ep_show_cmt_action2_btn">10 phút trước</button>
                            </div>
                          </div>
                          <div class="ep_show_repcmt">
                            <div class="ep_show_repcmt_detail">
                              <img class="ep_show_cmt_avt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                              <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                  <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                  <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                  <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                  <div class="popup_action_cmt">
                                    <div class="popup_action_cmt_detail">
                                      <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                      Chỉnh sửa bình luận
                                    </div>
                                    <div class="popup_action_cmt_detail">
                                      <?php
                                      $i = 1;
                                      if ($i == 0) {
                                        $icon_show = '../img/ep_show_cmt.svg';
                                        $text_show = 'Hiện bình luận';
                                      } else {
                                        $icon_show = '../img/ep_hide_cmt.svg';
                                        $text_show = 'Ẩn bình luận';
                                      }
                                      ?>
                                      <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                      <?= $text_show ?>
                                    </div>
                                    <div class="popup_action_cmt_detail">
                                      <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg" alt="Ảnh lỗi">
                                      Xóa bình luận
                                    </div>
                                  </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                  <button class="ep_show_cmt_action2_btn">Thích . </button>
                                  <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                              </div>
                            </div>
                            <div class="ep_show_repcmt_detail">
                              <img class="ep_show_cmt_avt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                              <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                  <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                  <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                  <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                  <div class="popup_action_cmt">
                                    <div class="popup_action_cmt_detail">
                                      <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                      Chỉnh sửa bình luận
                                    </div>
                                    <div class="popup_action_cmt_detail">
                                      <?php
                                      $i = 1;
                                      if ($i == 0) {
                                        $icon_show = '../img/ep_show_cmt.svg';
                                        $text_show = 'Hiện bình luận';
                                      } else {
                                        $icon_show = '../img/ep_hide_cmt.svg';
                                        $text_show = 'Ẩn bình luận';
                                      }
                                      ?>
                                      <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                      <?= $text_show ?>
                                    </div>
                                    <div class="popup_action_cmt_detail">
                                      <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg" alt="Ảnh lỗi">
                                      Xóa bình luận
                                    </div>
                                  </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                  <button class="ep_show_cmt_action2_btn">Thích . </button>
                                  <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                              </div>
                            </div>
                            <form action="" class="ep_post_write_repcmt">
                              <img class="ep_post_write_avt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                              <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                              <div class="ep_post_write_action">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                                <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="ep_post_show_cmt_detail">
                          <img class="ep_show_cmt_avt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                          <div class="ep_show_cmt_content">
                            <div class="ep_show_cmt_content_detail">
                              <p class="ep_show_cmt_username">Lê Thu Trà</p>
                              <img class="image_cmt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                              <a href="" class="file_cmt">
                                <p class="name_file_cmt">Báo cáo công...docx</p>
                                <p class="file_cmt_time">121KB 10:03, 07/09/2021</p>
                                <img class="icon_download_cmt" src="../img/icon_download.svg" alt="Ảnh lỗi">
                              </a>
                              <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                              <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                              <div class="popup_action_cmt">
                                <div class="popup_action_cmt_detail">
                                  <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                  Chỉnh sửa bình luận
                                </div>
                                <div class="popup_action_cmt_detail">
                                  <?php
                                  $i = 1;
                                  if ($i == 0) {
                                    $icon_show = '../img/ep_show_cmt.svg';
                                    $text_show = 'Hiện bình luận';
                                  } else {
                                    $icon_show = '../img/ep_hide_cmt.svg';
                                    $text_show = 'Ẩn bình luận';
                                  }
                                  ?>
                                  <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                  <?= $text_show ?>
                                </div>
                                <div class="popup_action_cmt_detail">
                                  <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg" alt="Ảnh lỗi">
                                  Xóa bình luận
                                </div>
                              </div>
                            </div>
                            <div class="ep_show_cmt_action2">
                              <button class="ep_show_cmt_action2_btn">Thích . </button>
                              <button class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                              <button class="ep_show_cmt_action2_btn">10 phút trước</button>
                            </div>
                          </div>
                          <div class="ep_show_repcmt">
                            <div class="ep_show_repcmt_detail">
                              <img class="ep_show_cmt_avt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                              <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                  <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                  <p class="ep_show_cnt_item">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                  <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                  <div class="popup_action_cmt">
                                    <div class="popup_action_cmt_detail">
                                      <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                      Chỉnh sửa bình luận
                                    </div>
                                    <div class="popup_action_cmt_detail">
                                      <?php
                                      $i = 1;
                                      if ($i == 0) {
                                        $icon_show = '../img/ep_show_cmt.svg';
                                        $text_show = 'Hiện bình luận';
                                      } else {
                                        $icon_show = '../img/ep_hide_cmt.svg';
                                        $text_show = 'Ẩn bình luận';
                                      }
                                      ?>
                                      <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                      <?= $text_show ?>
                                    </div>
                                    <div class="popup_action_cmt_detail">
                                      <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg" alt="Ảnh lỗi">
                                      Xóa bình luận
                                    </div>
                                  </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                  <button class="ep_show_cmt_action2_btn">Thích . </button>
                                  <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                              </div>
                            </div>
                            <div class="ep_show_repcmt_detail">
                              <img class="ep_show_cmt_avt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                              <div class="ep_show_cmt_content">
                                <div class="ep_show_cmt_content_detail">
                                  <p class="ep_show_cmt_username">Lê Thu Trà</p>
                                  <img class="image_cmt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                                  <a href="" class="file_cmt">
                                    <p class="name_file_cmt">Báo cáo công...docx</p>
                                    <p class="file_cmt_time">121KB 10:03, 07/09/2021</p>
                                    <img class="icon_download_cmt" src="../img/icon_download.svg" alt="Ảnh lỗi">
                                  </a>
                                  <p class="ep_show_cnt_item">Lorem Ipsum is</p>
                                  <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                  <div class="popup_action_cmt">
                                    <div class="popup_action_cmt_detail">
                                      <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                      Chỉnh sửa bình luận
                                    </div>
                                    <div class="popup_action_cmt_detail">
                                      <?php
                                      $i = 1;
                                      if ($i == 0) {
                                        $icon_show = '../img/ep_show_cmt.svg';
                                        $text_show = 'Hiện bình luận';
                                      } else {
                                        $icon_show = '../img/ep_hide_cmt.svg';
                                        $text_show = 'Ẩn bình luận';
                                      }
                                      ?>
                                      <img class="popup_action_cmt_detail_img" src="<?= $icon_show ?>" alt="Ảnh lỗi">
                                      <?= $text_show ?>
                                    </div>
                                    <div class="popup_action_cmt_detail">
                                      <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg" alt="Ảnh lỗi">
                                      Xóa bình luận
                                    </div>
                                  </div>
                                </div>
                                <div class="ep_show_cmt_action2">
                                  <button class="ep_show_cmt_action2_btn">Thích . </button>
                                  <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">10 phút trước</button>
                                </div>
                              </div>
                            </div>
                            <form action="" class="ep_post_write_repcmt">
                              <img class="ep_post_write_avt" src="https://images.unsplash.com/photo-1638044792879-40e37acf9cb3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                              <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                              <div class="ep_post_write_action">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                                <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                                <button class="ep_submit_mess"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
              <div class="gr_album">
                <div class="gr_album_header">
                  <p class="gr_album_header_title gr_album_header_image">Ảnh</p>
                  <p class="gr_album_header_title gr_album_header_video">Video</p>
                </div>
                <div class="gr_album_body gr_album_body_image">
                  <?php
                  for ($i = 0; $i < 30; $i++) {
                  ?>
                    <div class="gr_album_body_img">
                      <a href="/">
                        <img src="https://images.unsplash.com/photo-1638695214065-443cd61a260f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" alt="Ảnh lỗi">
                      </a>
                      <img class="edit_album" src="../img/edit_album.svg" alt="Ảnh lỗi">
                      <div class="gr_album_popup">
                        <div class="gr_album_popup_item">
                          <img src="../img/fe_edit.svg" alt="Ảnh lỗi">
                          Tải xuống
                        </div>
                        <div class="gr_album_popup_item">
                          <img src="../img/public_del.svg" alt="Ảnh lỗi">
                          Xóa ảnh
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="gr_album_body gr_album_body_video" hidden>
                  <?php
                  for ($i = 0; $i < 30; $i++) {
                  ?>
                    <div class="gr_album_body_img">
                      <a href="/chi-tiet-bai-viet.html">
                        <img src="https://images.unsplash.com/photo-1638695214065-443cd61a260f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" alt="Ảnh lỗi">
                      </a>
                      <img class="edit_album" src="../img/edit_album.svg" alt="Ảnh lỗi">
                      <div class="gr_album_popup">
                        <div class="gr_album_popup_item">
                          <img src="../img/fe_edit.svg" alt="Ảnh lỗi">
                          Tải xuống
                        </div>
                        <div class="gr_album_popup_item">
                          <img src="../img/public_del.svg" alt="Ảnh lỗi">
                          Xóa video
                        </div>
                      </div>
                      <div class="gr_album_body_time">1:12:30</div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="gr_introduce">
                <div class="gr_introduce_box">
                  <div class="gr_introduce_box_header">
                    <p class="gr_introduce_box_title">Chỉnh sửa</p>
                    Giới thiệu
                  </div>
                  <div class="gr_introduce_box_body">
                    <p class="gr_introduce_title">Đây là text mô tả nhóm Đây là text mô tả nhóm Đây là text mô tả nhóm</p>
                    <?php
                      if ($regime_gr == 0) {
                        $center_avt_regime = "Công khai";
                        $center_avt_regime2 = "Ai cũng có thể tìm nhóm này.";
                        $center_avt_regime3 = "Bất kỳ ai cũng có thể nhìn thấy mọi người trong nhóm và những gì họ đăng.";
                        $icon_mat = "../img/center_avt_icon_mat.svg";
                      }else{
                        $center_avt_regime = "Riêng tư";
                        $center_avt_regime2 = "Chỉ thành viên mới tìm thấy nhóm này.";
                        $center_avt_regime3 = "Chỉ thành viên mới có thể nhìn thấy mọi người trong nhóm và những gì họ đăng.";
                        $icon_mat = "../img/ep_gr_private_icon.svg";
                      }
                      ?>
                    <div class="gr_introduce_status">
                      <img src="../img/bx_bxs-lock-alt.svg" alt="Ảnh lỗi">
                      <div class="gr_introduce_status_item">
                        <p class="gr_intro_regime">Chế độ nhóm <?=$center_avt_regime?></p>
                        <p class="gr_intro_regime_des"><?=$center_avt_regime3?></p>
                      </div>
                    </div>
                    <div class="gr_introduce_status">
                      <img src="../img/ant-design_eye-invisible-filled.svg" alt="Ảnh lỗi">
                      <div class="gr_introduce_status_item">
                        <p class="gr_intro_regime">Chế độ hiển thị <?=$center_avt_regime?></p>
                        <p class="gr_intro_regime_des"><?=$center_avt_regime2?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="gr_introduce_box">
                  <div class="gr_introduce_box_header">
                    Hoạt động
                  </div>
                  <div class="gr_introduce_box_body">
                    <div class="gr_introduce_status">
                      <img src="../img/storyboard1.svg" alt="Ảnh lỗi">
                      <div class="gr_introduce_status_item">
                        <p class="gr_activity_title">Hôm nay có 1 bài viết mới</p>
                        <p class="gr_intro_regime_des">Trong 1 tháng trước</p>
                      </div>
                    </div>
                    <div class="gr_introduce_status">
                      <img src="../img/employee1.svg" alt="Ảnh lỗi">
                      <div class="gr_introduce_status_item">
                        <p class="gr_activity_title">Tổng cộng có 200 thành viên</p>
                        <p class="gr_intro_regime_des">Có 20 thành viên mới trong tuần này</p>
                      </div>
                    </div>
                    <div class="gr_introduce_status">
                      <img src="../img/Frame630442.svg" alt="Ảnh lỗi">
                      <div class="gr_introduce_status_item">
                        <p class="gr_activity_title">Ngày tạo: 1 tháng trước</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="gr_member">
                <div class="gr_member_search">
                  <input class="gr_member_input" type="text" placeholder="Tìm kiếm thành viên">
                  <img class="gr_member_icon" src="../img/gr_member_search.svg" alt="Ảnh lỗi">
                </div>
                <div class="gr_member_body">
                  <div class="gr_member_header">
                    <div class="gr_member_title gr_member_all">Tất cả thành viên (200)</div>
                    <div class="gr_member_title gr_member_pending">Thành viên đang chờ duyệt (20)</div>
                    <div class="gr_member_title gr_member_admin2">Quản trị viên (1)</div>
                  </div>
                  <div class="gr_member_detail gr_member_detail_all">
                    <div class="gr_member_admin">
                      <div class="gr_member_admin_detail">
                        <img class="gr_member_avt" src="https://images.unsplash.com/photo-1638695214065-443cd61a260f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" alt="Ảnh lỗi">
                        <div class="gr_member_info">
                          <p class="gr_member_name">Phạm Văn Minh</p>
                        </div>
                        <img class="gr_see_more" src="../img/Frame2_more.svg" alt="Frame2_more.svg">
                        <div class="gr_admin_popup">
                          <div class="gr_admin_popup_content">Rời khỏi nhóm</div>
                        </div>
                      </div>
                    </div>
                    <div class="gr_member_friend">
                      <p class="gr_memeber_friend_title">Quản trị viên và người kiểm duyệt</p>
                      <div>
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                        ?>
                          <div class="gr_member_friend_detail">
                            <img class="gr_mem_fr_avt" src="https://images.unsplash.com/photo-1559793361-5fe423f779ca?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                            <div class="gr_mem_fr_info">
                              <p class="gr_mem_fr_info_name">Mipan Zu Zu</p>
                              <?php
                              if ($i % 2 == 0) {
                              ?>
                                <p class="gr_member_pos">Quản Trị Viên</p>
                              <?php
                              } else {
                              ?>
                                <p class="gr_member_pos">Người kiểm duyệt</p>
                              <?php
                              }
                              ?>
                            </div>
                            <?php
                            if ($i % 2 == 0) {
                            ?>
                              <div>
                                <button class="gr_mem_fr_btn">
                                  <img src="../img/eva_person-add-fill.svg" alt="Ảnh lỗi">
                                  Thêm bạn bè
                                </button>
                              </div>
                            <?php
                            } else {
                            ?>
                              <div class="gr_mem_fr_chat">
                                <img src="../img/Frame_gr_chat.svg" alt="Ảnh lỗi">
                                Gửi tin nhắn
                              </div>
                            <?php
                            }
                            ?>
                            <img class="gr_see_more" src="../img/Frame2_more.svg" alt="Frame2_more.svg">
                            <div class="gr_admin_popup">
                              <div class="gr_admin_popup_content">Chặn khỏi nhóm</div>
                              <?php
                              if ($i % 2 == 0) {
                              ?>
                                <div class="gr_admin_popup_content">Gỡ vai trò quản trị viên</div>
                              <?php
                              } else {
                              ?>
                                <div class="gr_admin_popup_content">Gỡ vai trò người kiểm duyệt</div>
                              <?php
                              }
                              ?>
                            </div>
                          </div>
                        <?php
                        }
                        ?>
                      </div>
                      <button class="gr_member_seemore_btn">Xem thêm</button>
                    </div>
                    <div class="gr_member_friend">
                      <p class="gr_memeber_friend_title">Bạn bè</p>
                      <div>
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                        ?>
                          <div class="gr_member_friend_detail">
                            <img class="gr_mem_fr_avt" src="https://images.unsplash.com/photo-1559793361-5fe423f779ca?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                            <div class="gr_mem_fr_info">
                              <p class="gr_mem_fr_info_name">Mipan Zu Zu</p>
                              <p class="gr_mem_fr_info_add">Được thêm bởi Phạm Văn Minh</p>
                            </div>
                            <div class="gr_mem_fr_chat">
                              <img src="../img/Frame_gr_chat.svg" alt="Ảnh lỗi">
                              Gửi tin nhắn
                            </div>
                            <img class="gr_see_more" src="../img/Frame2_more.svg" alt="Frame2_more.svg">
                            <div class="gr_admin_popup">
                              <div class="gr_admin_popup_content">Đình chỉ trong nhóm</div>
                              <div class="gr_admin_popup_content">Chặn khỏi nhóm</div>
                              <div class="gr_admin_popup_content">Thêm làm quản trị viên</div>
                              <div class="gr_admin_popup_content">Thêm làm người kiểm duyệt</div>
                            </div>
                          </div>
                        <?php
                        }
                        ?>
                      </div>
                      <button class="gr_member_seemore_btn">Xem thêm</button>
                    </div>
                    <div class="gr_member_friend">
                      <p class="gr_memeber_friend_title">Thành viên có điểm chung</p>
                      <div>
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                        ?>
                          <div class="gr_member_friend_detail">
                            <img class="gr_mem_fr_avt" src="https://images.unsplash.com/photo-1559793361-5fe423f779ca?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                            <div class="gr_mem_fr_info">
                              <p class="gr_mem_fr_info_name">Mipan Zu Zu</p>
                              <p class="gr_mem_fr_info_add">Được thêm bởi Phạm Văn Minh</p>
                            </div>
                            <div>
                              <button class="gr_mem_fr_btn">
                                <img src="../img/eva_person-add-fill.svg" alt="Ảnh lỗi">
                                Thêm bạn bè
                              </button>
                            </div>
                            <img class="gr_see_more" src="../img/Frame2_more.svg" alt="Frame2_more.svg">
                            <div class="gr_admin_popup">
                              <div class="gr_admin_popup_content">Đình chỉ trong nhóm</div>
                              <div class="gr_admin_popup_content">Chặn khỏi nhóm</div>
                              <div class="gr_admin_popup_content">Thêm làm quản trị viên</div>
                              <div class="gr_admin_popup_content">Thêm làm người kiểm duyệt</div>
                            </div>
                          </div>
                        <?php
                        }
                        ?>
                      </div>
                      <button class="gr_member_seemore_btn">Xem thêm</button>
                    </div>
                    <div class="gr_member_friend">
                      <p class="gr_memeber_friend_title">Thành viên mới vào nhóm</p>
                      <div>
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                        ?>
                          <div class="gr_member_friend_detail">
                            <img class="gr_mem_fr_avt" src="https://images.unsplash.com/photo-1559793361-5fe423f779ca?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                            <div class="gr_mem_fr_info">
                              <p class="gr_mem_fr_info_name">Mipan Zu Zu</p>
                              <p class="gr_mem_fr_info_add">Được thêm bởi Phạm Văn Minh</p>
                            </div>
                            <?php
                            if ($i % 2 == 0) {
                            ?>
                              <div>
                                <button class="gr_mem_fr_btn">
                                  <img src="../img/eva_person-add-fill.svg" alt="Ảnh lỗi">
                                  Thêm bạn bè
                                </button>
                              </div>
                            <?php
                            } else {
                            ?>
                              <div class="gr_mem_fr_chat">
                                <img src="../img/Frame_gr_chat.svg" alt="Ảnh lỗi">
                                Gửi tin nhắn
                              </div>
                            <?php
                            }
                            ?>
                            <img class="gr_see_more" src="../img/Frame2_more.svg" alt="Frame2_more.svg">
                            <div class="gr_admin_popup">
                              <div class="gr_admin_popup_content">Đình chỉ trong nhóm</div>
                              <div class="gr_admin_popup_content">Chặn khỏi nhóm</div>
                              <div class="gr_admin_popup_content">Thêm làm quản trị viên</div>
                              <div class="gr_admin_popup_content">Thêm làm người kiểm duyệt</div>
                            </div>
                          </div>
                        <?php
                        }
                        ?>
                      </div>
                      <button class="gr_member_seemore_btn">Xem thêm</button>
                    </div>
                  </div>
                  <div class="gr_member_detail gr_member_detail_pending">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                    ?>
                      <div class="gr_member_friend_detail">
                        <img class="gr_mem_fr_avt" src="https://images.unsplash.com/photo-1559793361-5fe423f779ca?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                        <div class="gr_mem_fr_info gr_mem_fr_info2">
                          <p class="gr_mem_fr_info_name">Mipan Zu Zu</p>
                          <p class="gr_mem_fr_info_add">Được Chi Pu mời vào nhóm</p>
                        </div>
                        <div class="gr_mem_fr_btn2">
                          <button class="gr_mem_fr_info_success">Phê duyệt</button>
                          <button class="gr_mem_fr_info_del">Xóa</button>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="gr_member_detail gr_member_detail_admin">
                    <button class="btn_add_admin">Thêm quản trị viên</button>
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                    ?>
                      <div class="gr_member_friend_detail">
                        <img class="gr_mem_fr_avt" src="https://images.unsplash.com/photo-1559793361-5fe423f779ca?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Ảnh lỗi">
                        <div class="gr_mem_fr_info">
                          <p class="gr_mem_fr_info_name">Mipan Zu Zu</p>
                          <?php
                          if ($i % 2 == 0) {
                          ?>
                            <p class="gr_member_pos">Quản Trị Viên</p>
                          <?php
                          } else {
                          ?>
                            <p class="gr_member_pos">Người kiểm duyệt</p>
                          <?php
                          }
                          ?>
                        </div>
                        <img class="gr_see_more" src="../img/Frame2_more.svg" alt="Frame2_more.svg">
                        <div class="gr_admin_popup">
                          <div class="gr_admin_popup_content">Đình chỉ trong nhóm</div>
                          <div class="gr_admin_popup_content">Chặn khỏi nhóm</div>
                          <?php
                          if ($i % 2 == 0) {
                          ?>
                            <div class="gr_admin_popup_content">Gỡ vai trò quản trị viên</div>
                          <?php
                          } else {
                          ?>
                            <div class="gr_admin_popup_content">Gỡ vai trò người kiểm duyệt</div>
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="post_pending">
                <div class="post_pending_header">
                  <button class="post_pending_back"><img src="../img/back_post_pending.svg" alt="Ảnh lỗi"></button>
                  <p class="post_pending_title">Bài viết chờ duyệt</p>
                </div>
                <div class="post_pending_list_item">
                  <?php
                  for ($g=0; $g < 3; $g++) { 
                  ?>
                  <div class="post_pending_item_detal">
                    <div class="post_pending_item">
                      <div class="post_pending_item_header">
                        <img class="post_pending_item_header_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                        <div>
                          <p class="post_pending_item_header_name">Uzumaki Naruto</p>
                          <p class="post_pending_item_header_time">16:00  11/06/2021</p>
                        </div>
                      </div>
                      <div class="post_pending_item_body">
                        <p class="post_pending_item_body_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                        <div class="ep_post_file">
                          <div class="ep_post_file_div">
                            <?php
                            for ($i = 0; $i < 3; $i++) {
                            ?>
                              <a download class="ep_post_file_div_detail">
                                <p class="ep_post_name_file">Báo cáo công việc ABC.xlsx</p>
                                <p class="ep_post_file_size">121KB 10:03, 07/09/2021</p>
                                <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                              </a>
                            <?php
                            }
                            ?>
                          </div>
                          <div class="ep_post_file_img">
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                            ?>
                              <img class="ep_post_file_img_detail" src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80" alt="Ảnh lỗi">
                            <?php
                            }
                            ?>
                            <div class="ep_post_file_img_more">+5</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="post_pending_item_btn">
                        <button class="post_pending_success">Phê duyệt</button>
                        <button class="post_pending_del">Xóa</button>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              if ($regime_admin == 1) {
              ?>
              <div class="content_you">
                <div class="content_you_header">
                  Nội dung của bạn (20)
                </div>
                <div class="content_you_body">
                  <?php 
                  for ($h=0; $h < 5; $h++) { 
                  ?>
                  <div class="post_pending_item_detal content_you_item">
                    <div class="post_pending_item">
                      <div class="post_pending_item_header">
                        <img class="post_pending_item_header_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                        <div class="content_you_div">
                          <p class="post_pending_item_header_name">Uzumaki Naruto</p>
                          <p class="post_pending_item_header_time">16:00  11/06/2021</p>
                        </div>
                        <img class="content_you_see_more" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                        <div class="ep_post_action2">
                          <div class="ep_post_action1_deatail ep_post_ghim">
                            <img src="../img/ghim_ep_public_gr.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Ghim bài viết</span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_action1_save">
                            <?php
                            $k = 1;
                            if ($k == 0) {
                              $img_save = "../img/ep_post_no_save.svg";
                              $text_save = "Bỏ lưu bài viết";
                            } else {
                              $img_save = "../img/ep_post_save.svg";
                              $text_save = "Lưu bài viết";
                            }
                            ?>
                            <img src="<?= $img_save ?>" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text"><?= $text_save ?></span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_action1_deatail_notify">
                            <?php
                            $k = 1;
                            if ($k == 0) {
                              $img_notify = "../img/ep_post_turn_off_notify.svg";
                              $text_notify = "Tắt thông báo";
                            } else {
                              $img_notify = "../img/ep_post_notify.svg";
                              $text_notify = "Bật thông báo";
                            }
                            ?>
                            <img src="<?= $img_notify ?>" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text ep_post_turnon_notify"><?= $text_notify ?></span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_who_cmt">
                            <img src="../img/tat-tinh-nang-bl.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Tắt tính năng bình luận</span>
                          </div>
                          <div class="ep_post_action1_deatail">
                            <img src="../img/an-bai-viet2.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Ẩn bài viết</span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_del_post">
                            <img src="../img/icon_del_post.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Xóa bài viết</span>
                          </div>
                        </div>
                      </div>
                      <div class="post_pending_item_body">
                        <p class="post_pending_item_body_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                        <div class="ep_post_file">
                          <div class="ep_post_file_div">
                            <?php
                            for ($i = 0; $i < 3; $i++) {
                            ?>
                              <a download class="ep_post_file_div_detail">
                                <p class="ep_post_name_file">Báo cáo công việc ABC.xlsx</p>
                                <p class="ep_post_file_size">121KB 10:03, 07/09/2021</p>
                                <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                              </a>
                            <?php
                            }
                            ?>
                          </div>
                          <div class="ep_post_file_img">
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                            ?>
                              <img class="ep_post_file_img_detail" src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80" alt="Ảnh lỗi">
                            <?php
                            }
                            ?>
                            <div class="ep_post_file_img_more">+5</div>
                          </div>
                        </div>
                      </div>
                      <button class="content_you_btn">Xem trong nhóm</button>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              }else{
              ?>
              <div class="content_you">
                <div class="content_you_header">
                  Nội dung của bạn (21)
                  <div style="margin-top: 15px;">
                    <button class="content_you_no_admin content_you_no_admin_active content_you_pending">Đang chờ</button>
                    <button class="content_you_no_admin content_you_posted">Đã đăng</button>
                    <button class="content_you_no_admin content_you_refuse">Bị từ chối</button>
                  </div>
                </div>
                <div class="content_you_body content_you_box_pending">
                  <?php 
                  for ($h=0; $h < 5; $h++) { 
                  ?>
                  <div class="post_pending_item_detal content_you_item">
                    <div class="post_pending_item">
                      <div class="post_pending_item_header">
                        <img class="post_pending_item_header_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                        <div class="content_you_div">
                          <p class="post_pending_item_header_name">Uzumaki Naruto</p>
                          <p class="post_pending_item_header_time">16:00  11/06/2021</p>
                        </div>
                        <img class="content_you_see_more" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                        <div class="ep_post_action2">
                          <div class="ep_post_action1_deatail ep_post_ghim">
                            <img src="../img/chinh-sua-bai-viet.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Chỉnh sửa bài viết</span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_del_post">
                            <img src="../img/icon_del_post.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Xóa bài viết</span>
                          </div>
                        </div>
                      </div>
                      <div class="post_pending_item_body">
                        <p class="post_pending_item_body_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                        <div class="ep_post_file">
                          <div class="ep_post_file_div">
                            <?php
                            for ($i = 0; $i < 3; $i++) {
                            ?>
                              <a download class="ep_post_file_div_detail">
                                <p class="ep_post_name_file">Báo cáo công việc ABC.xlsx</p>
                                <p class="ep_post_file_size">121KB 10:03, 07/09/2021</p>
                                <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                              </a>
                            <?php
                            }
                            ?>
                          </div>
                          <div class="ep_post_file_img">
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                            ?>
                              <img class="ep_post_file_img_detail" src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80" alt="Ảnh lỗi">
                            <?php
                            }
                            ?>
                            <div class="ep_post_file_img_more">+5</div>
                          </div>
                        </div>
                      </div>
                      <button class="content_you_btn">Đang chờ phê duyệt</button>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="content_you_body content_you_box_posted">
                  <?php 
                  for ($h=0; $h < 5; $h++) { 
                  ?>
                  <div class="post_pending_item_detal content_you_item">
                    <div class="post_pending_item">
                      <div class="post_pending_item_header">
                        <img class="post_pending_item_header_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                        <div class="content_you_div">
                          <p class="post_pending_item_header_name">Uzumaki Naruto - đã đăng</p>
                          <p class="post_pending_item_header_time">16:00  11/06/2021</p>
                        </div>
                        <img class="content_you_see_more" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                        <div class="ep_post_action2">
                          <div class="ep_post_action1_deatail ep_post_action1_save">
                            <?php
                            $k = 1;
                            if ($k == 0) {
                              $img_save = "../img/ep_post_no_save.svg";
                              $text_save = "Bỏ lưu bài viết";
                            } else {
                              $img_save = "../img/ep_post_save.svg";
                              $text_save = "Lưu bài viết";
                            }
                            ?>
                            <img src="<?= $img_save ?>" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text"><?= $text_save ?></span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_action1_deatail_notify">
                            <?php
                            $k = 1;
                            if ($k == 0) {
                              $img_notify = "../img/ep_post_turn_off_notify.svg";
                              $text_notify = "Tắt thông báo";
                            } else {
                              $img_notify = "../img/ep_post_notify.svg";
                              $text_notify = "Bật thông báo";
                            }
                            ?>
                            <img src="<?= $img_notify ?>" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text ep_post_turnon_notify"><?= $text_notify ?></span>
                          </div>
                          <div class="ep_post_action1_deatail">
                            <img src="../img/chinh-sua-bai-viet.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Chỉnh sửa bài viêt</span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_del_post">
                            <img src="../img/icon_del_post.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Xóa bài viết</span>
                          </div>
                        </div>
                      </div>
                      <div class="post_pending_item_body">
                        <p class="post_pending_item_body_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                        <div class="ep_post_file">
                          <div class="ep_post_file_div">
                            <?php
                            for ($i = 0; $i < 3; $i++) {
                            ?>
                              <a download class="ep_post_file_div_detail">
                                <p class="ep_post_name_file">Báo cáo công việc ABC.xlsx</p>
                                <p class="ep_post_file_size">121KB 10:03, 07/09/2021</p>
                                <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                              </a>
                            <?php
                            }
                            ?>
                          </div>
                          <div class="ep_post_file_img">
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                            ?>
                              <img class="ep_post_file_img_detail" src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80" alt="Ảnh lỗi">
                            <?php
                            }
                            ?>
                            <div class="ep_post_file_img_more">+5</div>
                          </div>
                        </div>
                      </div>
                      <button class="content_you_btn">Xem trong nhóm</button>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="content_you_body content_you_box_refuse">
                  <?php 
                  for ($h=0; $h < 5; $h++) { 
                  ?>
                  <div class="post_pending_item_detal content_you_item">
                    <div class="post_pending_item">
                      <div class="post_pending_item_header">
                        <img class="post_pending_item_header_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                        <div class="content_you_div">
                          <p class="post_pending_item_header_name">Uzumaki Naruto - từ chối</p>
                          <p class="post_pending_item_header_time">16:00  11/06/2021</p>
                        </div>
                        <img class="content_you_see_more" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                        <div class="ep_post_action2">
                          <div class="ep_post_action1_deatail ep_post_ghim">
                            <img src="../img/dang-lai-bai-viet.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Đăng lại bài viết</span>
                          </div>
                        </div>
                      </div>
                      <div class="post_pending_item_body">
                        <p class="post_pending_item_body_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                        <div class="ep_post_file">
                          <div class="ep_post_file_div">
                            <?php
                            for ($i = 0; $i < 3; $i++) {
                            ?>
                              <a download class="ep_post_file_div_detail">
                                <p class="ep_post_name_file">Báo cáo công việc ABC.xlsx</p>
                                <p class="ep_post_file_size">121KB 10:03, 07/09/2021</p>
                                <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                              </a>
                            <?php
                            }
                            ?>
                          </div>
                          <div class="ep_post_file_img">
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                            ?>
                              <img class="ep_post_file_img_detail" src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80" alt="Ảnh lỗi">
                            <?php
                            }
                            ?>
                            <div class="ep_post_file_img_more">+5</div>
                          </div>
                        </div>
                      </div>
                      <button class="content_you_btn">Bị từ chối</button>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              }
              ?>
              <div class="content_you">
                <div class="content_you_header">
                  Nội dung của bạn (20)
                </div>
                <div class="content_you_body">
                  <?php 
                  for ($h=0; $h < 5; $h++) { 
                  ?>
                  <div class="post_pending_item_detal content_you_item">
                    <div class="post_pending_item">
                      <div class="post_pending_item_header">
                        <img class="post_pending_item_header_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                        <div class="content_you_div">
                          <p class="post_pending_item_header_name">Uzumaki Naruto</p>
                          <p class="post_pending_item_header_time">16:00  11/06/2021</p>
                        </div>
                        <img class="content_you_see_more" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                        <div class="ep_post_action2">
                          <div class="ep_post_action1_deatail ep_post_ghim">
                            <img src="../img/ghim_ep_public_gr.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Ghim bài viết</span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_action1_save">
                            <?php
                            $k = 1;
                            if ($k == 0) {
                              $img_save = "../img/ep_post_no_save.svg";
                              $text_save = "Bỏ lưu bài viết";
                            } else {
                              $img_save = "../img/ep_post_save.svg";
                              $text_save = "Lưu bài viết";
                            }
                            ?>
                            <img src="<?= $img_save ?>" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text"><?= $text_save ?></span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_action1_deatail_notify">
                            <?php
                            $k = 1;
                            if ($k == 0) {
                              $img_notify = "../img/ep_post_turn_off_notify.svg";
                              $text_notify = "Tắt thông báo";
                            } else {
                              $img_notify = "../img/ep_post_notify.svg";
                              $text_notify = "Bật thông báo";
                            }
                            ?>
                            <img src="<?= $img_notify ?>" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text ep_post_turnon_notify"><?= $text_notify ?></span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_who_cmt">
                            <img src="../img/tat-tinh-nang-bl.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Tắt tính năng bình luận</span>
                          </div>
                          <div class="ep_post_action1_deatail">
                            <img src="../img/an-bai-viet2.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Ẩn bài viết</span>
                          </div>
                          <div class="ep_post_action1_deatail ep_post_del_post">
                            <img src="../img/icon_del_post.svg" alt="Ảnh lỗi">
                            <span class="ep_post_action1_deatail_text">Xóa bài viết</span>
                          </div>
                        </div>
                      </div>
                      <div class="post_pending_item_body">
                        <p class="post_pending_item_body_content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                        <div class="ep_post_file">
                          <div class="ep_post_file_div">
                            <?php
                            for ($i = 0; $i < 3; $i++) {
                            ?>
                              <a download class="ep_post_file_div_detail">
                                <p class="ep_post_name_file">Báo cáo công việc ABC.xlsx</p>
                                <p class="ep_post_file_size">121KB 10:03, 07/09/2021</p>
                                <img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                              </a>
                            <?php
                            }
                            ?>
                          </div>
                          <div class="ep_post_file_img">
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                            ?>
                              <img class="ep_post_file_img_detail" src="https://images.unsplash.com/photo-1637928148681-f187292003a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80" alt="Ảnh lỗi">
                            <?php
                            }
                            ?>
                            <div class="ep_post_file_img_more">+5</div>
                          </div>
                        </div>
                      </div>
                      <button class="content_you_btn">Xem trong nhóm</button>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <div class="center_sidebar_right">
              <div class="center_introduce">
                <div class="center_introduce_header">
                  Giới thiệu
                </div>
                <div class="center_introduce_body">
                  <p class="center_introduce_title">Đây là text mô tả nhóm Đây là text mô tả nhóm Đây là text mô tả nhóm</p>
                  <div class="center_introduce_body_item">
                    <img class="center_avt_icon_public" src="../img/center_avt_icon_public.svg" alt="Ảnh lỗi">
                    <div class="">
                      <?php
                      if ($regime_gr == 0) {
                        $center_avt_regime = "Công khai";
                        $center_avt_regime2 = "Ai cũng có thể tìm nhóm này.";
                        $center_avt_regime3 = "Bất kỳ ai cũng có thể nhìn thấy mọi người trong nhóm và những gì họ đăng.";
                        $icon_mat = "../img/center_avt_icon_mat.svg";
                      }else{
                        $center_avt_regime = "Riêng tư";
                        $center_avt_regime2 = "Chỉ thành viên mới tìm thấy nhóm này.";
                        $center_avt_regime3 = "Chỉ thành viên mới có thể nhìn thấy mọi người trong nhóm và những gì họ đăng.";
                        $icon_mat = "../img/ep_gr_private_icon.svg";
                      }
                      ?>
                      <p class="center_avt_regime">Chế độ nhóm <?=$center_avt_regime?></p>
                      <p class="center_avt_regime_content"><?=$center_avt_regime3?></p>
                    </div>
                  </div>
                  <div class="center_introduce_body_item">
                    <img class="center_avt_icon_public" src="<?=$icon_mat?>" alt="Ảnh lỗi">
                    <div class="">
                      <p class="center_avt_regime">Chế độ hiển thị <?=$center_avt_regime?></p>
                      <p class="center_avt_regime_content"><?=$center_avt_regime2?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="center_setting_group">
                <img class="center_avt_setting" src="../img/center_avt_setting.svg" alt="Ảnh lỗi">
                Cài đặt nhóm
                <img class="bx_bx-chevron-right" src="../img/bx_bx-chevron-right.svg" alt="Ảnh lỗi">
              </div>
              <div class="center_request">
                <div class="center_request_header">
                  Yêu cầu làm thành viên
                </div>
                <div class="center_request_body center_request_member">
                  <img class="center_request_body_img" src="../img/bx_bx-chevron-right (1).svg" alt="Ảnh lỗi">
                  2 yêu cầu
                </div>
              </div>
              <div class="center_request">
                <div class="center_request_header">
                  Bài viết đang chờ duyệt
                </div>
                <div class="center_request_body center_request_post">
                  <img class="center_request_body_img" src="../img/bx_bx-chevron-right (1).svg" alt="Ảnh lỗi">
                  399 bài viết đang chờ duyệt
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
    include '../includes/ep_group/send_with_chat.php';
    include '../includes/ep_group/share_up_group.php';
    include '../includes/ep_group/share_up_invidual.php';
    include '../includes/ep_group/popup_index_ep.php';
    include '../includes/ep_group/setting.php';
    include '../includes/ep_group/create_gr.php';
    include '../includes/ep_group_public/setting_notify.php';
    include '../includes/ep_group_public/setting_group.php';
    include '../includes/ep_group_public/stop_group.php';
    include '../includes/ep_group_public/add_admin.php';
    include '../includes/ep_group/custom_notify.php';
    include '../includes/ep_group/ghim_group.php';
    include '../includes/ep_group/following.php';
    include '../includes/ep_group/exit_group.php';
    include '../includes/ep_group_public/invite_friend.php';
    include '../includes/index_employee/save_post.php';
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js" defer></script>
<script src="../js/select2.min.js" defer></script>
<script src="../js/ep_index.js?v=<?= $version ?>" defer></script>
<script src="../js/caidat.js?v=<?= $version ?>" defer></script>
<script src="../js/ep_group.js?v=<?= $version ?>" defer></script>
<script src="../js/ep_group_public.js?v=<?= $version ?>" defer></script>
<script src="../js/core.js" defer></script>

</html>
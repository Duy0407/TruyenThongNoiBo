<div class="baiviets-footer">
  <div class="tren">
    <div class="img avt">
      <img class="v_avatar_user1" src="<?= $_SESSION['login']['logo'] ?>" onerror='this.onerror=null;this.src="../img/logo_com.png";'>
    </div>
    <form class="cont v_comment_active" data-type="0" id="form_comment<?= $row_newfeed['new_id'] ?>" data-new_id="<?= $row_newfeed['new_id'] ?>" onsubmit="return v_comment_active(this);">
      <input type="text" class="v_write_comment" autocomplete="off" id="comment<?= $row_newfeed['new_id'] ?>" name="" placeholder="Viết bình luận...">
      <span class="see_icon" id="see_icon<?= $row_newfeed['new_id'] ?>"></span>
      <label for="baiviet_taianh<?= $row_newfeed['new_id'] ?>" class="see_icon1" id="see_icon1<?= $row_newfeed['new_id'] ?>"></label>
      <input type="file" onchange="changeImg(this,<?= $row_newfeed['new_id'] ?>)" accept="image/*" id="baiviet_taianh<?= $row_newfeed['new_id'] ?>" style="display: none;" />
      <input type="hidden" value="<?= $row_newfeed['new_id'] ?>" class="v_new_id_comment" hidden readonly>
      <button class="nut_gui_comment" id="nut_gui_comment<?= $row_newfeed['new_id'] ?>"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
    </form>
  </div>
  <div class="duoi">
    <div class="xemthem" id="xemthem<?= $row_newfeed['new_id'] ?>">
      <?php
      $i = 0;
      while ($row_comment = mysql_fetch_array($db_comment->result)) {
        $avt_image = '';
        $name_author = '';
        if ($row_comment['user_type'] == 1) {
          if ($arr_com->com_logo == "") {
            $avt_image =  '../img/logo_com.png';
          } else {
            $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
          }
          $name_author =  $arr_com->com_name;
        } else {
          foreach ($arr_ep as $value_ep) {
            if ($row_comment['id_user'] == $value_ep['ep_id']) {
              if ($value_ep['ep_image'] == "") {
                $avt_image = '../img/avatar_default.png';
              } else {
                $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $value_ep['ep_image'];
              }
              $name_author = $value_ep['ep_name'];
            }
          }
        }
      ?>
        <div class="xembinhluan xembinhluan_cap1 hide_comment<?= $row_newfeed['new_id'] ?>">
          <div class="avt avt-cmt"> <img src="<?= $avt_image ?>"> </div>
          <div class="binhluan">
            <div class="container">
              <div class="header-cmt">
                <div class="name-cmt">
                  <p><?= $name_author ?></p>
                </div>
                <div class="edit-cmt" onclick="option_cmt(this);">
                  <img src="../img/bacham.png">
                  <div class="popup-chinhsua-cmt">
                    <div class="ul_model">
                      <?php
                      if ($row_comment['id_user'] == $_SESSION['login']['id']) {
                      ?>
                        <div class="li_model" data-id="<?= $row_comment['id'] ?>" onclick="update_comment(<?= $row_comment['id'] ?>,<?= $row_newfeed['new_id'] ?>,0)">
                          <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                          <p class="p_model">Chỉnh sửa bình luận </p>
                        </div>
                      <?php
                      }

                      if ($row_comment['id_user'] == $_SESSION['login']['id']) {
                      ?>
                        <div data-id="<?= $row_comment['id'] ?>" onclick="v_del_comment(this,0)" class="li_model nut-xoa-baiviet">
                          <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                          <p class="p_model">Xóa bình luận</p>
                        </div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="body-cmt">
                <div class="cmt" tabindex="-1" id="text_comment<?= $row_comment['id'] ?>" data-value="<?= $row_comment['content'] ?>">
                  <p>
                    <?= $row_comment['content'] ?>
                  </p>
                </div>
              </div>
            </div>
            <?
            if ($row_comment['image'] != '') {
            ?>
              <div class="image_comment" id="image_comment<?= $row_comment['id'] ?>">
                <img src="<?= $row_comment['image'] ?>" id="img_cmt<?= $row_comment['id'] ?>" alt="image comment">
              </div>
            <?
            }
            ?>
            <div class="reach-cmt" id="react_cmt<?= $row_comment['id'] ?>">
              <?php
              $db_check_like = new db_query("SELECT * FROM like_comment WHERE id_comment = " . $row_comment['id']);

              $dem = 0;
              while ($row_like_comment = mysql_fetch_array($db_check_like->result)) {
                if ($row_like_comment['id_comment'] == $row_comment['id'] && $row_like_comment['id_user'] == $_SESSION['login']['id'] && $row_like_comment['user_type'] == $_SESSION['login']['user_type']) {
                  $dem++;
                }
              }
              if ($dem > 0) {
                $style_like2 = "v_like_post3";
              } else {
                $style_like2 = "";
              }
              ?>
              <p class="v_like_post2 <?= $style_like2 ?>" onclick="v_like_post2(this)" data-id="<?= $row_comment['id'] ?>">Thích</p>
              <p class="trl-binhluan" onclick="focus_comment(<?= $row_comment['id'] ?>);">Trả lời</p>
              <p id="time<?= $row_comment['id'] ?>"><?php
                                                    echo time_elapsed_string($row_comment['created_at']);
                                                    ?></p>
              <?
              if (mysql_num_rows($db_check_like->result) > 0) {
              ?>
                <img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment<?= $row_comment['id'] ?>">
                <p class="num_like_comment num_like_comment<?= $row_comment['id'] ?>"><?= mysql_num_rows($db_check_like->result) ?></p>
              <?
              }
              ?>
            </div>
            <div class="cmt-binhluan">
              <div id="cmt-binhluan<?= $row_comment['id'] ?>">
                <?
                $db_rep_comment = new db_query("SELECT * FROM comment WHERE id_parent = " . $row_comment['id'] . " ORDER BY id DESC");
                ?>
              </div>
              <?
              $htbl = "";
              if (mysql_num_rows($db_rep_comment->result) > 0) {
              ?>
                <div class="view_cmt_rep" id="view_cmt_rep<?= $row_comment['id'] ?>" onclick="show_rep_comment(<?= $row_comment['id'] ?>);">Hiển thị bình luận</div>
                <div class="hide_cmt_rep" id="hide_cmt_rep<?= $row_comment['id'] ?>" onclick="htde_rep_comment(<?= $row_comment['id'] ?>);">Ẩn bớt bình luận</div>
              <?
              }
              ?>
              <form class="container-cmt" id="form_comment<?= $row_comment['id'] ?>" data-type="0" data-cmt_id="<?= $row_comment['id'] ?>" data-new_id="<?= $row_newfeed['new_id'] ?>" onsubmit="return rep_comment(this);">
                <div class="img avt"> <img src="<?= $_SESSION['login']['logo'] ?>" class="v_avt_reply_comment">
                </div>
                <div class="cont"> <input type="text" class="rep_cmt" onkeyup="v_rep_cmt(this)" id="comment<?= $row_comment['id'] ?>" name="" placeholder="Viết bình luận..." autocomplete="Off">
                  <span class="see_icon"></span>
                  <label class="see_icon1">
                    <input type="file" onchange="show_img_rep_comment(this,<?= $row_comment['id'] ?>)" id="rep_comment<?= $row_comment['id'] ?>" accept="image/*" style="display: none;" />
                  </label>
                  <input type="hidden" value="<?= $row_newfeed['new_id'] ?>" class="id_new_rep_comment" hidden readonly>
                  <button class="nut_gui_comment rep_comment" id="rep_comment<?= $row_comment['id'] ?>">
                    <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                  </button>
                </div>
              </form>
              <div class="view_rep_cmt" id="view_rep_cmt<?= $row_comment['id'] ?>"></div>
            </div>
          </div>
        </div>
      <?php
        if ($i == 2) {
          break;
        }
        $i++;
      }
      ?>
    </div>
    <?php
    if (mysql_num_rows($db_comment->result) == 0) {
    ?>
      <p class="v_no_comment">Hiện chưa có bình luận</p>
    <?php
    } else {
    ?>
      <p class="an-hien-binhluan thugon-binhluan" id="thugon-binhluan<?= $row_newfeed['new_id'] ?>" onclick="hide_comment(<?= $row_newfeed['new_id'] ?>);">Ẩn bình luận</p>
      <?php
      if (mysql_num_rows($db_comment->result) > 3) {
      ?>
      <p class="an-hien-binhluan xem-binhluan" id="xem-binhluan<?= $row_newfeed['new_id'] ?>" onclick="show_comment(<?= $row_newfeed['new_id'] ?>);" style="display: block;">Xem thêm bình luận</p>
      <?php
      }
      ?>
    <?php
    }
    ?>
  </div>
</div>
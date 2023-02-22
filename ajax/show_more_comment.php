<?php
require '../config/config.php';
$new_id = getValue('new_id','int','POST','');
$page = getValue('page','int','POST','');

$my_id = $_SESSION['login']['id'];
$my_avt = $_SESSION['login']['logo'];

$row = new db_query("SELECT * FROM `new_feed` WHERE new_id = ".$new_id);
if (mysql_num_rows($row->result) > 0){
    $row = mysql_fetch_array($row->result);

    $db_comment = new db_query("SELECT comment.*, COUNT(like_comment.id) AS count_like,
    (CASE WHEN EXISTS (SELECT id FROM `like_comment` 
        WHERE like_comment.id_comment = comment.id AND like_comment.id_user = $my_id) 
    THEN 1 ELSE 0 END) AS liked,
    (CASE WHEN EXISTS (SELECT id FROM `comment` AS cmt_child WHERE cmt_child.id_parent = comment.id) THEN 1 ELSE 0 END) AS had_child
    FROM comment LEFT JOIN like_comment ON comment.id = like_comment.id_comment 
    WHERE id_new = " . $new_id . " AND id_parent = 0".(($my_id == $row['author'])?"":" AND hidden = 0 ")."
    GROUP BY comment.id 
    ORDER BY id DESC LIMIT $page,$limit_cmt");

    if (mysql_num_rows($db_comment->result) > 0){
        $html = '';
        while ($row_comment = mysql_fetch_array($db_comment->result)) {
            if ($row_comment['user_type'] == 1) {
                if ($arr_com->com_logo == "") {
                    $avt_image =  '/img/logo_com.png';
                }else{
                    $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                }
                $name_author =  $arr_com->com_name;
            }else{
                if ($arr_ep[$row_comment['id_user']]['ep_image'] == ''){
                    $avt_image =  '/img/logo_com.png';
                }else{
                    $avt_image = "https://chamcong.24hpay.vn/upload/employee/".$arr_ep[$row_comment['id_user']]['ep_image'];
                }
                $name_author =  $arr_ep[$row_comment['id_user']]['ep_name'];
            }
            // nếu bình luận ko bị ẩn hoặc bình luận bị ẩn và bạn là chủ bài viết => hiện bình luận
            if ($row_comment['hidden'] == 0 || ($row_comment['hidden'] == 1 && $row['author'] == $my_id)) {
                if ($row_comment['hidden'] == 1){
                    $class_avt = " opacity-0p15";
                    $txt_cmt_detail_action = "Hiện bình luận";
                    $ico_cmt_detail_action = "../img/ep_show_cmt.svg";
                }else{
                    $class_avt = "";
                    $txt_cmt_detail_action = "Ẩn bình luận";
                    $ico_cmt_detail_action = "../img/ep_hide_cmt.svg";
                }
                $html .= '<div class="ep_post_show_cmt_detail">
                    <img class="ep_show_cmt_avt'.$class_avt.'" src="'.$avt_image.'" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
                    <div class="ep_show_cmt_content">
                        <div class="ep_show_cmt_content_detail'.$class_avt.'">
                            <p class="ep_show_cmt_username">'.$name_author.'</p>
                            <p class="ep_show_cnt_item">'.$row_comment['content'].'</p>';

                if ($row_comment['image'] != '') {
                    $html .= '<img class="image_cmt" src="'.$row_comment['image'].'" alt="Ảnh lỗi">';
                }

                $html .= '</div>
                        <!-- chức năng quản lý bình luận -->
                        <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                        <div class="popup_action_cmt">';
                if ($row_comment['id_user'] == $my_id){
                    $html .= '<div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>';
                }
                if ($row['author'] == $my_id){
                    $html .= '<div class="popup_action_cmt_detail popup_action_cmt_detail_hide">
                                    <img class="popup_action_cmt_detail_img" src="'.$ico_cmt_detail_action.'" alt="Ảnh lỗi">
                                    '.$txt_cmt_detail_action.'
                                </div>';
                }
                if ($row_comment['id_user'] == $my_id || $row['author'] == $my_id){
                    $html .= '<div class="popup_action_cmt_detail">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>';
                }
                $html .= '</div>
                        <!-- chức năng tương tác với bình luận / thống kê thời gian, tương tác -->
                        <div class="ep_show_cmt_action2">
                            <button  data-type="'.$row_comment['liked'].'" class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like">Thích . </button>
                            <button class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                            <button class="ep_show_cmt_action2_btn">'.time_elapsed_string($row_comment['created_at']).'</button>
                            <div class="ep_show_cmt_action2_count_like">
                                <img class="ep_show_cmt_action2_count_like_icon" src="../img/like_btn.svg" alt="Ảnh lỗi">
                                <span class="number_count_like">'.$row_comment['count_like'].'</span>
                            </div>
                        </div>
                    </div>
                    <!-- danh sách trả lời bình luận -->
                    <div class="ep_show_repcmt">';
                if ($row_comment['had_child'] == 1){
                    $html .= '<div class="view_cmt_rep" onclick="show_rep_comment('.$row_comment['id'].');" data-hidden='.$row_comment['hidden'].'>Hiển thị bình luận</div>';
                }
                $html .= '<!-- form trả lời bình luận -->
                        <div class="ep_form_repcmt">
                            <img class="ep_post_write_avt" src="'.$my_avt.'" alt="Ảnh lỗi">
                            <form action="" class="ep_post_write_repcmt" data-type="0" data-cmt_id="'. $row_comment['id'] .'" data-new_id="'. $row['new_id'] .'" onsubmit="return nv_rep_comment(this);">
                                <input class="ep_post_write_input" type="text" placeholder="Viết bình luận...">
                                <div class="ep_post_write_action">
                                    <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                                    <label for="rep_comment'. $row_comment['id'] .'">
                                        <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                                        <input type="file" onchange="changeImgRepCmt(this,'. $row_comment['id'] .')" id="rep_comment'. $row_comment['id'] .'" accept="image/*" hidden/>
                                    </label>
                                    <button class="ep_submit_mess">
                                        <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
            }
        }
        $page += $limit_cmt;
        $db_comment = new db_query("SELECT id FROM comment WHERE id_new = " . $new_id . " AND id_parent = 0".(($my_id == $row['author'])?"":" AND hidden = 0 ")." LIMIT $page,$limit_cmt");

        echo json_encode([
            "result" => true,
            "data" => $html,
            "count_cmt" => mysql_num_rows($db_comment->result)
        ]);
    }else{
        echo json_encode([
            "result" => false,
            "msg" => "không có cmt"
        ]);
    }
}else{
    echo json_encode([
        "result" => false,
        "msg" => "không có bài viết"
    ]);
}

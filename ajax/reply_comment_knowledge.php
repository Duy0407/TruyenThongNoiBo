<?php
require_once "../config/config.php";
require_once "../api/api_ep.php";
$start = getValue('start', 'int', 'POST', '');
$id = getValue('id', 'int', 'POST', '');
if ($start == 0) {
    $query = "";
} else {
    $query = " id >= $start AND ";
}
$content = getValue('content', 'str', 'POST', '');
if ($id == 0 || $content == "") {
    header("Location: /");
}
$data = [
    'knowledge_answer_id' => $id,
    'id_user' => $_SESSION['login']['id'],
    'content' => $content,
    'id_parent' => $id,
    'user_type' => $_SESSION['login']['user_type'],
    'created_at' => time()
];
add('comment_knowledge', $data);
$html = '';
$db_reply = new db_query("SELECT * FROM comment_knowledge WHERE id >= $start AND id_parent = $id ORDER BY id DESC");
while ($row_reply = mysql_fetch_array($db_reply->result)) {
    if ($row_reply['user_type'] == 1) {
        $avatar_img = $_SESSION['login']['logo'];
    } else {
        $avatar_img = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$row_reply['id_user']]->ep_image;
    }
    $html = $html . '<div class="v_list_reply_cmt" data-id="' . $row_reply['id'] . '">
    <div><img class="v_list_reply_cmt_avt" src="' . $avatar_img . '" alt="Ảnh lỗi"></div>
    <div class="v_list_reply_cmt03">
        <div class="v_list_reply_content">
            <div class="v_list_reply_info">';
    if ($row_reply['user_type'] == 1) {
        $name = $_SESSION['login']['name'];
        $dep_name = "";
    } else if ($row_reply['user_type'] == 2) {
        $name = $data_ep[$row_reply['id_user']]->ep_name;
        $dep_name = ". " . $data_ep[$row_reply['id_user']]->dep_name;
    }
    $html = $html . '<p class="v_list_reply_name">' . $name . '</p>
                <p class="v_list_reply_dep"> ' . $dep_name . '</p>
                <div class="sau3-lon" onclick="v_popup_active2(this)">
																									<img class="imgsau3" src="../img/sau3.png" alt="Ảnh lỗi">
																									<div class="sau3-con">
																										<div class="ul_model">';
    if ($row_reply['id_user'] == $_SESSION['login']['id']) {
        $html = $html . '<div class="li_model" data-id="' . $row_reply['id'] . '" onclick="v_edit_comment_knowledge2(this)">
																													<img src="../img/tung2.png" alt="Ảnh lỗi">
																													<p class="p_model">Chỉnh sửa bình luận</p>
																												</div>';
    }
    $check_config_delete = check_config($_SESSION['login']['id'], 4, 'delete');
    if ($_SESSION['login']['user_type'] == 1 || $row2['id_user'] == $_SESSION['login']['id'] || $check_config_delete = 1) {
        $html = $html . '<div class="li_model" data-id="' . $row_reply['id'] . '" onclick="v_del_list_answer(this)">
																													<img src="../img/tung4.png" alt="Ảnh lỗi">
																													<p class="p_model">Xóa bình luận</p>
																												</div>';
    }

    $html = $html . '</div>
																									</div>
																								</div>
            </div>
            
            <p class="v_list_reply_detail">
                ' . $row_reply['content'] . '
            </p>
        </div>';
    $db_check_like = new db_query("SELECT * FROM like_comment_knowledge WHERE comment_knowledge_id = " . $row_reply['id'] . " AND id_user = " . $_SESSION['login']['id']);
    $time_sort = time() - $row_reply['created_at'];
    if ($time_sort < 60) {
        $time = date("s", $time_sort) . " giây trước";
    } else if ($time_sort < 3600) {
        $time = date("i", $time_sort) . " phút trước";
    } else if ($time_sort < 86400) {
        $time = date("H", $time_sort) . " giờ trước";
    } else {
        $time = "";
    }
    if (mysql_num_rows($db_check_like->result) == 0) {
        $html = $html . '<div class="v_list_reply_time">
                <p class="v_list_reply_like" data-id="' . $row_reply['id'] . '" onclick="likecomment(this)">Thích . </p>
                <p class="v_list_reply_time2">'.$time.'</p>
            </div>';
    } else {
        $html = $html . '<div class="v_list_reply_time">
                <p class="v_list_reply_like02" data-id="' . $row_reply['id'] . '" onclick="likecomment(this)">Đã thích . </p>
                <p class="v_list_reply_time2">'.$time.'</p>
            </div>';
    }
    $html = $html . '</div>
</div>';
}
echo json_encode([
    'result' => true,
    'html' => $html
]);

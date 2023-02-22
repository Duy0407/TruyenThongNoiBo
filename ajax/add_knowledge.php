<?php
require_once "../config/config.php";
require_once "../api/api_ep.php";
$start = getValue('start', 'int', 'POST', '');
if ($_SESSION['login']['user_type'] == 1) {
    $id_company = $_SESSION['login']['id'];
} else {
    $id_company = $data_ep[$_SESSION['login']['id']]->com_id;
}
$db_knowledge_answer = new db_query("SELECT * FROM knowledge_answer WHERE id_company = $id_company");
$count = mysql_num_rows($db_knowledge_answer->result);
$db_knowledge_answer = new db_query("SELECT * FROM knowledge_answer WHERE id < $start AND id_company = $id_company ORDER BY id DESC LIMIT 0,3");
// echo $db_knowledge_answer->query;
$html = '';
while ($row = mysql_fetch_array($db_knowledge_answer->result)) {
    if ($_SESSION['login']['user_type'] == 1) {
        if ($row['user_type'] == 1) {
            $avatar_author = $_SESSION['login']['logo'];
            $name_author = $_SESSION['login']['name'];
            $dep_name = "";
        } else if ($row['user_type'] == 2) {
            $avatar_author = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$row['id_user']]->ep_image;
            $name_author = "." . $data_ep[$row['id_user']]->ep_name;
            $dep_name = $data_ep[$row['id_user']]->dep_name;
        }
    }
    $html = $html . '<div class="posts-mysl" data-id="' . $row['id'] . '">
    <div class="inf0-you-all">
        <div class="in4-you">
            <div class="avt-y"><img src="' . $avatar_author . '" class="ava-y-author" alt="Ảnh lỗi"></div>
            <div class="inf0-y">
                <div class="inf0-y-top">
                    <p class="top1 top">' . $name_author . ' </p>
                    <p>&nbsp; ' . $dep_name . ' &nbsp;</p>
                    <p class="top3 top"> đã đăng một câu hỏi</p>
                </div>
                <div class="time-upl">
                    <p>' . date("H:i d/m/Y", $row['created_at']) . '</p>
                </div>
            </div>
            <div class="item-option v_item-option">
                <img class="imgitoption" onclick="imgitoption(this)" src="../img/itoption.png" alt="Ảnh lỗi">
                <div class="item-option-con v_item-option-con">
                    <div class="ul_model">
                        <div class="li_model">
                            <img src="../img/img1.png" alt="Ảnh lỗi">
                            <p class="p_model bat-tb">Bật thông báo</p>
                        </div>';

    if ($_SESSION['login']['user_type'] == 1) {
        $html = $html . '<div class="li_model v_del_answer" data-id="' . $row['id'] . '" onclick="v_del_answer(this)">
                            <img src="../img/xoacauhoi.png" alt="Ảnh lỗi">
                            <p class="p_model xoa-ch">Xóa câu hỏi</p>
                            </div>';
    } else {
        $db_config = new db_query("SELECT * FROM config WHERE id_module = 4 AND id_employee = " . $_SESSION['login']['id']);
        if (mysql_num_rows($db_config->result) > 0) {
            $row_config = mysql_fetch_array($db_config->result);
            if ($row_config['delete'] == 1) {
                $html = $html . '<div class="li_model v_del_answer" data-id="' . $row['id'] . '">
                                    <img src="../img/xoacauhoi.png" alt="Ảnh lỗi" onclick="v_del_answer(this)">
                                    <p class="p_model xoa-ch">Xóa câu hỏi</p>
                                    </div>';
            }
        }
    }

    $html = $html . '</div>
                </div>
            </div>
        </div>
        <div class="posts-you">
            <p>' . $row['content'] . '</p>
            <div class="anh">';
    $val = checkImages($row['file']);
    if ($val == 0) {
        $filesize = filesize("../img/knowledge_answer/" . $row['id_user'] . "/" . $row['file']);
        if ($filesize >= 1000) {
            $filesize = round($filesize / 1024, 1) . " KB";
        } else if ($filesize >= 1000000) {
            $filesize = round($filesize / (1024 * 1024), 1) . " MB";
        }
        $html = $html . '<a download class="v_file_alert02" href="../img/knowledge_answer/' . $row['id_user'] . '/' . $row['file'] . '">
                        <div class="v_file_alert02_name">' . $row['file'] . '</div>
                        <div class="v_file_alert02_time_size">
                            ' . $filesize . '
                            &nbsp;
                            ' . date("H:i d/m/Y", $row['created_at']) . '
                        </div>
                        <img class="v_file_alert02_icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
                    </a>';
    } else {
        $html = $html . '<div class="anh1"> <img src="../img/knowledge_answer/' . $row['id_user'] . '/' . $row['file'] . '"> </div>';
    }

    $html = $html .  '</div>
        </div>
        <div class="emotion-coments">
            <div class="emotion" onclick="v_emotion(this)">
                <img src="../img/itemtl.png" alt="Ảnh lỗi">
                <p>Trả lời</p>
            </div>
            <div class="coments-count">';
    $db_comment_knowledge = new db_query("SELECT * FROM comment_knowledge WHERE knowledge_answer_id = " . $row['id'] . " ORDER BY id DESC LIMIT 0,3");
    $db_comment_knowledge_count = new db_query("SELECT * FROM comment_knowledge WHERE knowledge_answer_id = " . $row['id'] . " ORDER BY id DESC");
    if (mysql_num_rows($db_comment_knowledge_count->result) == 0) {
        $comment_count = "Chưa có câu trả lời";
    } else if (mysql_num_rows($db_comment_knowledge_count->result) > 0) {
        $comment_count = mysql_num_rows($db_comment_knowledge_count->result) . " câu trả lới";
    }
    $html = $html . '<p>' . $comment_count . '</p>
            </div>
        </div>
    </div>
    <div class="reply-your">
        <div class="avt-reply"><img class="v_avt-reply_img" src="' . $avatar_author . '" alt="Ảnh lỗi"></div>
        <form class="reply-cmt v_reply_answer" data-id="' . $row['id'] . '" data-type="0" onsubmit="return v_reply_answer(this);">
            <input type="text" class="v_reply content" onkeyup="v_reply(this)" name="" value="" placeholder="Viết câu trả lời">
            <img class="stitem" src="../img/stitem.png" alt="Ảnh lỗi">
            <img class="avtitem" src="../img/avtitem.png" alt="Ảnh lỗi">
            <button class="v_gui_comment"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
        </form>
    </div>
    <div class="coment-all">';
    while ($row2 = mysql_fetch_array($db_comment_knowledge->result)) {
        if ($_SESSION['login']['user_type'] == 1) {
            if ($row2['user_type'] == 1) {
                $name_author = $_SESSION['login']['name'];
                $dep_name = "";
                $avatar_img = $_SESSION['login']['logo'];
            } else {
                $name_author = ". " . $data_ep[$row2['id_user']]->ep_name;
                $dep_name = ". " . $data_ep[$row2['id_user']]->dep_name;
                $avatar_img = $data_ep[$row2['id_user']]->ep_image;
            }
        }
        $time_sort = time() - $row2['created_at'];
        if ($time_sort < 60) {
            $time = date("s", $time_sort) . " giây trước";
        } else if ($time_sort < 3600) {
            $time = date("i", $time_sort) . " phút trước";
        } else if ($time_sort < 86400) {
            $time = date("H", $time_sort) . " giờ trước";
        } else {
            $time = "";
        }

        $html = $html . '<div class="v_list_answer">
            <div class="pl-coments">
                <div class="pl-coments-top v_pl-coments-top">
                    <div class="sauvang"><img src="' . $avatar_img . '" alt="Ảnh lỗi"></div>
                    <div class="v_pl">
                        <div class="pl v_pl2">
                            <div class="pltop">
                                <p class="pl-name">' . $name_author . '</p>
                                <p class="pl-info">' . $dep_name . '</p>
                                <div class="sau3-lon" onclick="v_popup_active(this)">
                                    <img class="imgsau3" src="../img/sau3.png" alt="Ảnh lỗi">
                                    <div class="sau3-con">
                                        <div class="ul_model">';
        if ($row2['id_user'] == $_SESSION['login']['id']) {
            $html = $html . '<div class="li_model" data-id="' . $row2['id'] . '" onclick="v_edit_comment_knowledge(this)">
                                                <img src="../img/tung2.png" alt="Ảnh lỗi">
                                                <p class="p_model">Chỉnh sửa bình luận</p>
                                            </div>';
        }
        $check_config_delete = check_config($_SESSION['login']['id'], 4, 'delete');
        if ($_SESSION['login']['user_type'] == 1 || $row2['id_user'] == $_SESSION['login']['id'] || $check_config_delete = 1) {
            $html = $html . '<div class="li_model" data-id="' . $row2['id'] . '" onclick="v_del_list_answer(this)">
                                                <img src="../img/tung4.png" alt="Ảnh lỗi">
                                                <p class="p_model">Xóa bình luận</p>
                                            </div>';
        }
        $html = $html . '</div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-text">
                                <p>' . $row2['content'] . '</p>
                            </div>
                        </div>
                        <div class="pl-coments-like v_pl-coments-like">
                            <div class="likecoment">
                                Thích
                            </div>
                            <p class="text-tl" onclick="text_tl(this)">.Trả lời</p>
                            <p class="text-time">. ' . $time . '</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reply-your">
                <div class="avt-reply"><img class="v_avt-reply_img" src="' . $avatar_author . '" alt="Ảnh lỗi"></div>
                <form class="reply-cmt v_reply-cmt" data-id="' . $row['id'] . '">
                    <input type="text" class="v_reply" name="" value="" placeholder="Viết câu trả lời">
                    <img class="stitem" src="../img/stitem.png" alt="Ảnh lỗi">
                    <img class="avtitem" src="../img/avtitem.png" alt="Ảnh lỗi">
                    <button class="v_gui_comment"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                </form>
            </div>
            </div>';
    }
    $html = $html . '</div>
    <div class="see-question">';
    if (mysql_num_rows($db_comment_knowledge_count->result) > 3) {
        $html = $html . '<p class="see-question-previous">Xem câu trả lời trước</p>';
    }
    $html = $html . '</div>
    </div>';
}
echo json_encode([
    'html' => $html,
    'count' => $count
]);

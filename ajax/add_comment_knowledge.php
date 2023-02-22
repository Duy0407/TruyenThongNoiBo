<?php
require_once "../config/config.php";
require_once "../api/api_ep.php";
$start = getValue('start','int','POST','');
$id = getValue('id','int','POST','');
if ($start == 0) {
    header("Location: /");
}
$db = new db_query("SELECT * FROM comment_knowledge WHERE id < $start AND knowledge_answer_id = $id ORDER BY id DESC LIMIT 0,3");
$html = '';
while($row2 = mysql_fetch_array($db->result)){
    if ($row2['user_type'] == 1) {
        $name_author = array_values($data_ep)[0]->com_name;
        $dep_name = "";
        $avatar_img = 'https://chamcong.24hpay.vn/upload/company/logo/' . array_values($data_ep)[0]->com_logo;
    } else {
        $name_author = ". " . $data_ep[$row2['id_user']]->ep_name;
        $dep_name = ". " . $data_ep[$row2['id_user']]->dep_name;
        $avatar_img = $data_ep[$row2['id_user']]->ep_image;
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

    $html = $html . '<div class="v_list_answer" data-id="'.$row2['id'].'">
        <div class="pl-coments">
        <div class="pl-coments-top v_pl-coments-top">
            <div class="sauvang"><img src="'.$avatar_img.'" alt="Ảnh lỗi"></div>
            <div class="v_pl">
                <div class="pl v_pl2">
                    <div class="pltop">
                        <p class="pl-name">'.$name_author.'</p>
                        <p class="pl-info">'.$dep_name.'</p>
                        <div class="sau3-lon" onclick="v_popup_active(this)">
                            <img class="imgsau3" src="../img/sau3.png" alt="Ảnh lỗi">
                            <div class="sau3-con">
                                <div class="ul_model">';
                                    if ($row2['id_user'] == $_SESSION['login']['id']) {
                                        $html = $html . '<div class="li_model" data-id="'.$row2['id'].'" onclick="v_edit_comment_knowledge(this)">
                                            <img src="../img/tung2.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa bình luận</p>
                                        </div>';
                                    }
                                    $check_config_delete = check_config($_SESSION['login']['id'], 4, 'delete');
                                    if ($_SESSION['login']['user_type'] == 1 || $row2['id_user'] == $_SESSION['login']['id'] || $check_config_delete = 1) {
                                        $html = $html . '<div class="li_model" data-id="'.$row2['id'].'" onclick="v_del_list_answer(this)">
                                            <img src="../img/tung4.png" alt="Ảnh lỗi">
                                            <p class="p_model">Xóa bình luận</p>
                                        </div>';
                                    }
                                $html = $html . '</div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-text">
                        <p>'.$row2['content'].'</p>
                    </div>
                </div>
                <div class="pl-coments-like v_pl-coments-like">';
                    $db_check = new db_query("SELECT * FROM like_comment_knowledge WHERE comment_knowledge_id = " . $row2['id'] . " AND id_user = " . $_SESSION['login']['id']);
                    if (mysql_num_rows($db_check->result) == 0) {
                        $html = $html . '<div class="likecoment" onclick="likecomment(this)" data-id="'.$row2['id'].'">
                            Thích . 
                        </div>';
                    } else {
                        $html = $html . '<div class="likecoment1" onclick="likecomment(this)" data-id="'.$row2['id'].'">
                            Đã thích . 
                        </div>';
                    }
                    $html = $html . '<p class="text-tl" onclick="text_tl(this)"> Trả lời</p>
                    <p class="text-time">. '.$time.' </p>
                </div>
                <div class="v_list_parent_reply">';
                    $db_reply = new db_query("SELECT * FROM comment_knowledge WHERE id_parent = " . $row2['id'] . " ORDER BY id DESC LIMIT 0,3");
                    while ($row_reply = mysql_fetch_array($db_reply->result)) {
                        if ($row_reply['user_type'] == 1) {
                            $avatar_img = $_SESSION['login']['logo'];
                        } else {
                            $avatar_img = 'https://chamcong.24hpay.vn/upload/employee/' . $data_ep[$row_reply['id_user']]->ep_image;
                        }
                        $html = $html . '<div class="v_list_reply_cmt" data-id="'.$row_reply['id'].'">
                            <div><img class="v_list_reply_cmt_avt" src="'.$avatar_img.'" alt="Ảnh lỗi"></div>
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
                                        $html = $html . '<p class="v_list_reply_name">'.$name .'</p>
                                        <p class="v_list_reply_dep"> '.$dep_name .'</p>
                                    </div>
                                    <p class="v_list_reply_detail">
                                        '.$row_reply['content'] .'
                                    </p>
                                </div>';
                                $db_check_like = new db_query("SELECT * FROM like_comment_knowledge WHERE comment_knowledge_id = " . $row_reply['id'] . " AND id_user = " . $_SESSION['login']['id']);
                                if (mysql_num_rows($db_check_like->result) == 0) {
                                    $html = $html . '<div class="v_list_reply_time">
                                        <p class="v_list_reply_like" data-id="'.$row_reply['id'].'" onclick="likecomment(this)">Thích . </p>
                                        <p class="v_list_reply_time2">10 phút trước</p>
                                    </div>';
                                } else {
                                    $html = $html . '<div class="v_list_reply_time">
                                        <p class="v_list_reply_like02" data-id="'.$row_reply['id'].'" onclick="likecomment(this)">Đã thích . </p>
                                        <p class="v_list_reply_time2">10 phút trước</p>
                                    </div>';
                                }
                            $html = $html . '</div>
                        </div>';
                    }
                $html = $html . '</div>
                <div class="reply-your">
                    <div class="avt-reply"><img class="v_avt-reply_img" src="'.$_SESSION['login']['logo'].'" alt="Ảnh lỗi"></div>
                    <form class="reply-cmt v_reply-cmt" data-id="'.$row2['id'].'" onsubmit="return v_reply_cmt(this)">
                        <input type="text" class="v_reply" onkeyup="v_reply02(this)" name="" value="" placeholder="Viết câu trả lời">
                        <img class="stitem" src="../img/stitem.png" alt="Ảnh lỗi">
                        <img class="avtitem" src="../img/avtitem.png" alt="Ảnh lỗi">
                        <button class="v_gui_comment"><img src="../img/v_gui_comment.svg" alt="Ảnh lỗi"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>';
    $start = $row2['id'];
}

$db_count = new db_query("SELECT id FROM comment_knowledge WHERE id < $start AND knowledge_answer_id = $id ORDER BY id DESC");
echo json_encode([
    'result'=>true,
    'html'=>$html,
    'count' => mysql_num_rows($db_count->result)
]);

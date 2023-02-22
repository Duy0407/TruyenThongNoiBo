<?php
require_once "../config/config.php";
require_once "../api/api_ep.php";
$start = getValue('start','int','POST','');
$id = getValue('id','int','POST','');
if ($start == 0) {
    $query = "";
}else{
    $query = " id >= $start AND ";
}
$content = getValue('content','str','POST','');
if ($id == 0 || $content == "") {
    header("Location: /");
}
$data = [
    'knowledge_answer_id'=>$id,
    'id_user'=>$_SESSION['login']['id'],
    'content'=>$content,
    'id_parent'=>$id,
    'user_type'=>$_SESSION['login']['user_type'],
    'created_at'=>time()
];
add('comment_knowledge',$data);
$html = '';
$db_reply = new db_query("SELECT * FROM comment_knowledge WHERE id >= $start AND id_parent = $id ORDER BY id DESC");
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
                $html = $html . '<p class="v_list_reply_name">'.$name.'</p>
                <p class="v_list_reply_dep"> '.$dep_name .'</p>
            </div>
            <p class="v_list_reply_detail">
                '.$row_reply['content'].'
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
echo json_encode([
    'result'=>true,
    'html'=>$html
]);
?>
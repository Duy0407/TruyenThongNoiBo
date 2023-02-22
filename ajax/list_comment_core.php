<?php
require_once '../config/config.php';
$id_core = getValue('new_id', 'str', 'POST', '');
$start = getValue('page', 'str', 'POST', '');
if ($id_core == '' || $id_core == 0) {
    $result = [
        'result' => false,
        'message' => 'Vui lòng nhập đủ các trường!',
    ];
} else {
    $limit = 10;
    $db_point = new db_query("SELECT * FROM comment_core_value WHERE id_core = " . $id_core . " AND id_parent = 0 ORDER BY id DESC LIMIT $start,$limit");
    $html = '';
    $arr_data = [];
    while ($row = mysql_fetch_assoc($db_point->result)) {
        $avt_image = '';
        $name_author = '';
        if ($row['user_type'] == 1) {
            $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
            $name_author =  $arr_com->com_name;
        } else {
            foreach ($arr_ep as $value_ep) {
                if ($row['id_user'] == $value_ep->ep_id) {
                    $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $value_ep->ep_image;
                    $name_author = $value_ep->ep_name;
                }
            }
        }
        $time = time_elapsed_string($row['created_at']);
        
        $db_check_like = new db_query("SELECT * FROM like_comment_core WHERE id_comment = " . $row['id'] );
        $num_like_comment = mysql_num_rows($db_check_like->result);
        $dem = 0;
        while($row_like_comment = mysql_fetch_array($db_check_like->result)){
            if ($row_like_comment['id_comment'] == $row['id'] && $row_like_comment['id_user'] == $_SESSION['login']['id'] && $row_like_comment['user_type'] == $_SESSION['login']['user_type']) {
                $dem++;
            }
        }   
        if ($dem > 0) {
            $style_like2 = "v_like_post3";
        } else {
            $style_like2 = "";
        }

        $db_rep_comment = new db_query("SELECT * FROM comment_core_value WHERE id_parent = " . $row['id']);
        $num_rep_comment = mysql_num_rows($db_rep_comment->result);
        $arr_data[] = [
            'id'                => $row['id'],
            'name'              => $name_author,
            'avatar'            => $avt_image,
            'avatar_login'      => $_SESSION['login']['logo'],
            'image'             => $row['image'],
            'style_like2'       => $style_like2,
            'num_like_comment'  => $num_like_comment,
            'content'           => $row['content'],
            'rep_comment'       => $num_rep_comment,
            'time_sort'         => $time,
        ];
    }
    $start = $start + $limit;
    $db_count = new db_query("SELECT * FROM comment_core_value WHERE id_core = " . $id_core . " AND id_parent = 0 ORDER BY id DESC LIMIT $start,$limit");
    $result = [
        'result' => true,
        'data' => $arr_data,
        'data_count' => mysql_num_rows($db_count->result)
    ];
}
echo json_encode($result);


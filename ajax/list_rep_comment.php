<?
require_once '../config/config.php';
$id_cmt = getValue('cmt_id', 'str', 'POST', '');
$start = getValue('page', 'str', 'POST', '');
if ($id_cmt == '' || $id_cmt == 0) {
    $result = [
        'result' => false,
        'message' => 'Vui lòng nhập đủ các trường!',
    ];
} else {
    $limit = 5;
    $db_point = new db_query("SELECT * FROM comment WHERE id_parent = " . $id_cmt . " ORDER BY id DESC LIMIT $start,$limit");
    $html = '';
    $arr_data = [];
    if (isset($_SESSION['login'])){
        $id_user = $_SESSION['login']['id'];
        $user_type = $_SESSION['login']['user_type'];
    }else{
        $id_user = 0;
        $user_type = 0;
    }
    $list_stranger = [];
    while ($row = mysql_fetch_assoc($db_point->result)) {
        if ($id_user != 0 && $row['id_user'] == $id_user && $row['user_type'] == $_SESSION['login']['user_type']) {
            $type_create = 1;
            $type_delete = 1;
        }else{
            $type_create = 0;
            $type_delete = 0;
        }
        $time = time_elapsed_string($row['created_at']);

        $check_like_user = new db_query("SELECT count(1) FROM like_comment WHERE id_comment = " . $row['id'] . " AND id_user = $id_user AND user_type = $user_type");
        $r_countLike = mysql_fetch_assoc($check_like_user->result);
        $style_like1 = ($r_countLike['count(1)'] > 0) ? "1" : "0";
        $style_like2 = ($r_countLike['count(1)'] > 0) ? "v_like_post3" : "";

        $get_like_cmt = new db_query("SELECT count(1) FROM like_comment WHERE id_comment = " . $row['id']);
        $r_count = mysql_fetch_assoc($get_like_cmt->result);
        $count_like = $r_count['count(1)'];

        $avt_image = $name_author = $row['id_user'];
        if ($row['user_type'] != 1 && !array_key_exists($row['id_user'],$arr_ep) && !in_array($row['id_user'],$list_stranger)){
            $list_stranger[] = $row['id_user'];
            $avt_image = $name_author = $row['id_user'];
        }elseif (array_key_exists($row['id_user'],$arr_ep)){
            if ($row['user_type'] == 1) {
                $avt_image =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                $name_author =  $arr_com->com_name;
            } else {
                $avt_image = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row['id_user']]['ep_image'];
                $name_author = $arr_ep[$row['id_user']]['ep_name'];
            }
        }

        $arr_data[] = [
            'id' => $row['id'],
            'name' => $name_author,
            'avatar' => $avt_image,
            'avatar_login' => isset($_SESSION['login'])?$_SESSION['login']['logo']:'',
            'image' => $row['image'],
            'style_like_nv' => $style_like1,
            'style_like2' => $style_like2,
            'num_like_comment'  => $count_like,
            'content' => $row['content'],
            'hidden' => $row['hidden'],
            'time_sort' => $time,
            'type_create'       => $type_create,
            'type_delete'       => $type_delete
        ];
    }
    if (count($list_stranger) > 0){
        $list_stranger = list_stranger_infor(implode(",",$list_stranger));
        
        foreach ($list_stranger as $key => $value) {
            $arr_ep[$value['ep_id']] = $value;
        }

        foreach ($arr_data as $key => $value) {
            $arr_data[$key]['name'] = $arr_ep[$value['name']]['ep_name'];
            if ($arr_ep[$value['avatar']]['ep_image'] != ''){
                $arr_data[$key]['avatar'] = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$value['avatar']]['ep_image'];
            }else{
                $arr_data[$key]['avatar'] = '/img/logo_com.png';
            }
        }
    }

    $start = $start + 5;
    $db_point2 = new db_query("SELECT * FROM comment WHERE id_parent = " . $id_cmt . " ORDER BY id DESC LIMIT $start,$limit");
    $count_like3 = mysql_num_rows($db_point2->result);
    $result = [
        'result' => true,
        'data' => $arr_data,
        'count_like' => $count_like3
    ];
}
echo json_encode($result);

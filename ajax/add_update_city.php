<?php
require '../config/config.php';
$city = getValue('city','int','POST',0);

$home_town = getValue('home_town','int','POST',0);

$relative = getValue('relative','int','POST',0);

$intro = getValue('intro','str','POST','');
$intro = trim($intro);

$nickname = getValue('nickname','str','POST','');
$nickname = trim($nickname);

$quote = getValue('quote','str','POST','');
$quote = trim($quote);

$lang = getValue('lang','str','POST','');

$religion = getValue('religion','str','POST','');
$religion = trim($religion);
$religion_desc = getValue('religion_desc','str','POST','');
$religion_desc = trim($religion_desc);

$story = getValue('story','str','POST','');
$story = trim($story);

$hobby = getValue('hobby','arr','POST','');

$phone = getValue('phone','str','POST','');

$sex = getValue('sex','int','POST',0);

$dob = getValue('dob','str','POST','');

$diachi = getValue('diachi','str','POST','');

$view_mode = getValue('view_mode','int','POST','');
$except = getValue('except','str','POST','');
$list_excepts = json_decode(getValue('arr_excepts','arr','POST',''), true);

$sql = "SELECT * FROM `ttnb_infor_user` WHERE user_id = ".$_SESSION['login']['id']." AND user_type = ".$_SESSION['login']['user_type'];
$db_bgi = new db_query($sql);
if ($city > 0){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'city' => $city,
            'city_view_mode' => $view_mode,
            'city_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 1]);

        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'city' => $city,
            'city_view_mode' => $view_mode,
            'city_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 1, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
}elseif ($home_town > 0){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'home_town' => $home_town,
            'ht_view_mode' => $view_mode,
            'ht_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 2]);
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'home_town' => $home_town,
            'ht_view_mode' => $view_mode,
            'ht_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 2, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
}elseif ($relative > 0){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'relationship_status' => $relative,
            'rela_view_mode' => $view_mode,
            'rela_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 9]);
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'relationship_status' => $relative,
            'rela_view_mode' => $view_mode,
            'rela_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 9, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
}elseif ($intro != ""){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'intro' => $intro,
            'intro_view_mode' => $view_mode,
            'intro_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 10]);
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'intro' => $intro,
            'intro_view_mode' => $view_mode,
            'intro_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 10, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
}elseif ($nickname != ""){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'nickname' => $nickname,
            'nn_view_mode' => $view_mode,
            'nn_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 11]);
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'nickname' => $nickname,
            'nn_view_mode' => $view_mode,
            'nn_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 11, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
}elseif ($quote != ""){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'quote' => $quote,
            'quote_view_mode' => $view_mode,
            'quote_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 12]);
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'quote' => $quote,
            'quote_view_mode' => $view_mode,
            'quote_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 12, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
}elseif ($lang != ""){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'language' => $lang,
            'lang_view_mode' => $view_mode,
            'lang_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 5]);
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'language' => $lang,
            'lang_view_mode' => $view_mode,
            'lang_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 5, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
}elseif ($religion != ""){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'religion' => $religion,
            'religion_desc' => $religion_desc,
            'relig_view_mode' => $view_mode,
            'relig_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 6]);
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'religion' => $religion,
            'religion_desc' => $religion_desc,
            'relig_view_mode' => $view_mode,
            'relig_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 6, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
}elseif (isset($_POST['story'])){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'story' => $story,
            'story_view_mode' => $view_mode,
            'story_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 13]);
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'story' => $story,
            'story_view_mode' => $view_mode,
            'story_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 13, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
}elseif (isset($_POST['hobby'])){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'hobby' => json_encode($hobby,JSON_UNESCAPED_UNICODE),
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id]);
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }else{
        $data = [
            'hobby' => json_encode($hobby,JSON_UNESCAPED_UNICODE),
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    
        echo json_encode(['result'=>true,'code'=>'201']);
    }
}elseif ($phone != ""){
    $phone_regex = "/^0[0-9]{9}$/";
    if (!preg_match($phone_regex, $phone)){
        echo json_encode(['result'=>false,'msg'=>'Sai định dạng số điện thoại']);
        exit;
    }
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'phone_view_mode' => $view_mode,
            'phone_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 4]);
    }else{
        $data = [
            'phone_view_mode' => $view_mode,
            'phone_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 4, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
    // cập nhật thông tin trên chuyển đổi số
    $data_update365 = [
        'ep_name' => $arr_ep[$_SESSION['login']['id']]['ep_name'],
        'ep_phone' => $phone,
        'ep_address' => $arr_ep[$_SESSION['login']['id']]['ep_address'],
        'id_ep' => $_SESSION['login']['id'],
        'married_id' => $arr_ep[$_SESSION['login']['id']]['ep_married'],
        'birth_day' => $arr_ep[$_SESSION['login']['id']]['ep_birth_day'],
        'ep_gender' => $arr_ep[$_SESSION['login']['id']]['ep_gender'],
    ];
    if (isset($_SESSION['login']['id_com'])){
        $data_update365['com_id'] = $_SESSION['login']['id_com'];
    }
    if (isset($_SESSION['login']['dep_id']) && $_SESSION['login']['dep_id'] > 0){
        $data_update365['dep_id'] = $_SESSION['login']['dep_id'];
    }
    $data_token = updateInfor365($data_update365);
    if ($data_token['error'] == null){
        echo json_encode(['result'=>true,'data_token'=>$data_token]);
    }else{
        echo json_encode(['result'=>false,'data_token'=>$data_token['error']]);
    }
}elseif ($sex > 0){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'sex_view_mode' => $view_mode,
            'sex_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 7]);
    }else{
        $data = [
            'sex_view_mode' => $view_mode,
            'sex_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 7, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
    // cập nhật thông tin trên chuyển đổi số
    $data_update365 = [
        'ep_name' => $arr_ep[$_SESSION['login']['id']]['ep_name'],
        'ep_phone' => $arr_ep[$_SESSION['login']['id']]['ep_phone'],
        'ep_address' => $arr_ep[$_SESSION['login']['id']]['ep_address'],
        'id_ep' => $_SESSION['login']['id'],
        'married_id' => $arr_ep[$_SESSION['login']['id']]['ep_married'],
        'birth_day' => $arr_ep[$_SESSION['login']['id']]['ep_birth_day'],
        'ep_gender' => $sex,
    ];
    if (isset($_SESSION['login']['id_com'])){
        $data_update365['com_id'] = $_SESSION['login']['id_com'];
    }
    if (isset($_SESSION['login']['dep_id']) && $_SESSION['login']['dep_id'] > 0){
        $data_update365['dep_id'] = $_SESSION['login']['dep_id'];
    }
    $data_token = updateInfor365($data_update365);
    if ($data_token['error'] == null){
        echo json_encode(['result'=>true,'data_token'=>$data_token]);
    }else{
        echo json_encode(['result'=>false,'data_update365'=>$data_update365,'data_token'=>$data_token['error']]);
    }
}elseif ($dob > 0){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'dob_view_mode' => $view_mode,
            'dob_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 8]);
    }else{
        $data = [
            'dob_view_mode' => $view_mode,
            'dob_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 8, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
    // cập nhật thông tin trên chuyển đổi số
    $data_update365 = [
        'ep_name' => $arr_ep[$_SESSION['login']['id']]['ep_name'],
        'ep_phone' => $arr_ep[$_SESSION['login']['id']]['ep_phone'],
        'ep_address' => $arr_ep[$_SESSION['login']['id']]['ep_address'],
        'id_ep' => $_SESSION['login']['id'],
        'married_id' => $arr_ep[$_SESSION['login']['id']]['ep_married'],
        'birth_day' => $dob,
        'ep_gender' => $arr_ep[$_SESSION['login']['id']]['ep_gender'],
    ];
    if (isset($_SESSION['login']['id_com'])){
        $data_update365['com_id'] = $_SESSION['login']['id_com'];
    }
    if (isset($_SESSION['login']['dep_id']) && $_SESSION['login']['dep_id'] > 0){
        $data_update365['dep_id'] = $_SESSION['login']['dep_id'];
    }
    $data_token = updateInfor365($data_update365);
    if ($data_token['error'] == null){
        echo json_encode(['result'=>true,'data_token'=>$data_token]);
    }else{
        echo json_encode(['result'=>false,'data_update365'=>$data_update365,'data_token'=>$data_token['error']]);
    }
}elseif ($diachi != ''){
    if (mysql_num_rows($db_bgi->result) > 0){
        $db_bgi = mysql_fetch_array($db_bgi->result);
        $id = $db_bgi['id'];
        $data = [
            'add_view_mode' => $view_mode,
            'add_except' => $except,
            'updated_at' => time(),
        ];
        update('ttnb_infor_user', $data, ['user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
        // xóa ds user chế độ xem
        $del_tags = delete('infor_user_view_mode', ['infor_user_id' => $id,'infor_user_type' => 3]);
    }else{
        $data = [
            'add_view_mode' => $view_mode,
            'add_except' => $except,
            'user_id' => $_SESSION['login']['id'],
            'user_type' => $_SESSION['login']['user_type'],
            'created_at' => time(),
            'updated_at' => time(),
        ];
        add('ttnb_infor_user', $data);
        $id = mysql_insert_id();
    }
    // thêm ds user chế độ xem
    if ($list_excepts) {
        foreach ($list_excepts as $k => $v) {
            $data_insert_excepts = [
                'infor_user_id' => $id,
                'user_id' => $v['id'],
                'user_type' => $v['type'], 
                'infor_user_type' => 3, 
                'created_at' => time(),
                'updated_at' => time(),
            ]; 
            add('infor_user_view_mode', $data_insert_excepts);
        }  
    }
    // cập nhật thông tin trên chuyển đổi số
    $data_update365 = [
        'ep_name' => $arr_ep[$_SESSION['login']['id']]['ep_name'],
        'ep_phone' => $arr_ep[$_SESSION['login']['id']]['ep_phone'],
        'ep_address' => $diachi,
        'id_ep' => $_SESSION['login']['id'],
        'married_id' => $arr_ep[$_SESSION['login']['id']]['ep_married'],
        'birth_day' => $arr_ep[$_SESSION['login']['id']]['ep_birth_day'],
        'ep_gender' => $arr_ep[$_SESSION['login']['id']]['ep_gender'],
    ];
    if (isset($_SESSION['login']['id_com'])){
        $data_update365['com_id'] = $_SESSION['login']['id_com'];
    }
    if (isset($_SESSION['login']['dep_id']) && $_SESSION['login']['dep_id'] > 0){
        $data_update365['dep_id'] = $_SESSION['login']['dep_id'];
    }
    $data_token = updateInfor365($data_update365);
    if ($data_token['error'] == null){
        echo json_encode(['result'=>true,'data_token'=>$data_token]);
    }else{
        echo json_encode(['result'=>false,'data_update365'=>$data_update365,'data_token'=>$data_token['error']]);
    }
}else{
    echo json_encode(['result'=>false,'msg'=>'Thông tin nhập vào không đầy đủ']);
}
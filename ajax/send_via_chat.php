<?php
require '../config/config.php';
$mess = getValue('mess','str','POST','');
$new_id = getValue('new_id','int','POST','');

$id_receiver = getValue('id_receiver','int','POST','');
$conversationid = getValue('conversationid','int','POST','');
$id_sender = getValue('id_sender','int','POST','');

$album_id = getValue('album_id','int','POST','');
$ep_id = getValue('ep_id','int','POST','');
$link = getValue('link','str','POST','');

$group_id = getValue('gr_id','int','POST','');

$curl = curl_init();
if ($mess == ''){
    $mess = 'share via chat';
}
if ($id_receiver > 0){
    $data2['UserId'] = $id_receiver;
}
if ($conversationid > 0){
    $data2['ConversationId'] = $conversationid;
}

$data2['senderId'] = $id_sender;
$data2['Type'] = "text";
// $data2['Title'] = "Truyền thông nội bộ";
$data2['Message'] = $mess;
// if ($ep_id <= 0){
//     $ep_id = $_SESSION['login']['id'];
// }
if ($group_id > 0){
    $data2['Link'] = "https://truyenthongnoibo.timviec365.vn".group_link($arr_group[$group_id]['group_name'],$group_id);
}elseif ($album_id > 0 && $ep_id > 0){
    $data2['Link'] = "https://truyenthongnoibo.timviec365.vn/trang-ca-nhan-e".$ep_id."/album-a".$album_id;
}elseif ($new_id > 0){
    $data2['Link'] = "https://truyenthongnoibo.timviec365.vn/".url_detail_new_feed($new_id);
}elseif ($link != ''){
    $data2['Link'] = "https://truyenthongnoibo.timviec365.vn/".$link;
}else{
    $data2['Link'] = "https://truyenthongnoibo.timviec365.vn/";
}
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/Notification/SendNewNotification_v2');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$response = curl_exec($curl);
curl_close($curl);
$data_token = json_decode($response, true);
if ($data_token['error'] == null){
    echo json_encode($data_token['data']);
}else{
    echo json_encode($data_token);
}

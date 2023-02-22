<?php
require_once '../config/config.php';
require_once '../api/api_ep.php';
$member_name = getValue('member_name','str','POST','');
$data_search = [];
if ($member_name == "") {
    foreach ($data_ep as $key => $value) {
        $data_search[] = $data_ep[$key];
    }
}else{
    foreach ($data_ep as $key => $value) {
        $pos = strpos($data_ep[$key]->ep_name, $member_name);
        if ($pos !== false) {
            $data_search[] = $data_ep[$key];
        }
    }
}
$html = "";
for ($i=0; $i < count($data_search); $i++) { 
    if ($data_search[$i]->dep_name != "") {
        $dep_name = $data_search[$i]->dep_name;
    }else{
        $dep_name = '';
    }
    if ($data_search[$i]->ep_status == 'Active') {
        $status = 'Đã duyệt';
        $data_id = 'onclick="detail_eployee(this)"';
      }else if($data_search[$i]->ep_status == 'Pending'){
        $status = 'Chờ duyệt';
        $data_id = 'onclick="detail_eployee(this)"';
      }else if ($data_search[$i]->ep_status == 'Deny') {
        $status = 'Đã từ chối';
        $data_id = '';
      }
    $html = $html . '<tr>
    <td>'.$data_search[$i]->ep_id.'</td>
    <td>'.$data_search[$i]->ep_name.'</td>
    <td>'.$dep_name.'</td>
    <td>Nhân viên</td>
    <td>'.$data_search[$i]->ep_email.'</td>
    <td>'.$data_search[$i]->ep_phone.'</td>
    <td class="color_cd cursor show_popup_ctnvcpd" data-id="'.$data_search[$i]->ep_id.'" '.$data_id.'>'.$status.'</td>
    <td class="color_ct cursor show_popup_ctnv" data-id="'.$data_search[$i]->ep_id.'" onclick="detail_eployee(this)">Chi tiết</td>
  </tr>';
}
echo json_encode([
    'html'=>$html
]);

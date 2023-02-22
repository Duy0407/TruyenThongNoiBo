<?php
require_once '../config/config.php';
$header[]       = 'Authorization: '.$_SESSION['login']['acc_token'].'';
require_once '../api/api_ct.php';
$dep_id = getValue('dep_id','int','POST','');
$group_id = getValue('group_id','int','POST','');
$data = [];
if ($dep_id != 0) {
    $db = new db_query("SELECT * FROM department WHERE dep_id = $dep_id");
    $row = mysql_fetch_array($db->result);
    for ($i=0; $i < count($list_department); $i++) { 
        if ($list_department[$i]->dep_id == $dep_id) {
            $data['name'] = $list_department[$i]->dep_name;
        }
    }
}else if($group_id != 0){
    $db = new db_query("SELECT * FROM department INNER JOIN group ON department.group_id = group.id WHERE group_id = $group_id AND id_company = " . $_SESSION['login']['id_com']);
    $row = mysql_fetch_array($db->result);
    $data['name'] = $row['group_name'];
    $data['mode'] = $row['group_mode'];
}
$data['description'] = $row['description'];
$data['request_censorship'] = $row['request_censorship']; 
echo json_encode([
    'data' => $data
]);
?>
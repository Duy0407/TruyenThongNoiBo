<?php
require_once '../config/config.php';
$id = getValue('id','arr','POST','');
$type = getValue('type','arr','POST','');
$parent_type = getValue('parent_type','int','POST','');
if ($id == '' || $parent_type == 0) {
    header("Location: /");
}else{
    $arr_id = '';
    if ($parent_type == 1) {
        for ($i=0; $i < count($id); $i++) { 
            $data = [
                'delete' => 0
            ];
            $dataId = [
                'id' => $id[$i]
            ];
            update('knowledge',$data,$dataId);
        }
        $db_count = new db_query("SELECT id FROM knowledge WHERE `delete` = 1");
        $count = mysql_num_rows($db_count->result);
    }else if($parent_type == 2){
        for ($i=0; $i < count($id); $i++) { 
            $data = [
                'delete' => 0
            ];
            $id_del = $id[$i];
            $dataId = [
                'id'=>$id_del
            ];
            if ($type[$i] == 1) {
                update('mail_from_ceo',$data,$dataId);
            }else if($type[$i] == 2){
                update('target',$data,$dataId);
            }else if($type[$i] == 3){
                update('core_value',$data,$dataId);
            }
        }
        $db_count1 = new db_query("SELECT id FROM mail_from_ceo WHERE `delete` = 1 AND id_company = " . $_SESSION['login']['id_com']);
        $db_count2 = new db_query("SELECT id FROM `target` WHERE `delete` = 1 AND id_company = " . $_SESSION['login']['id_com']);
        $db_count3 = new db_query("SELECT id FROM core_value WHERE `delete` = 1 AND id_company = " . $_SESSION['login']['id_com']);
        $count = mysql_num_rows($db_count1->result) + mysql_num_rows($db_count2->result) + mysql_num_rows($db_count3->result);
    }else if($parent_type == 3){
        $data = [
            'delete'=>0
        ];
        for ($i=0; $i < count($id); $i++) { 
            $dataId = [
                'new_id'=>$id[$i]
            ];
            update('new_feed',$data,$dataId);
        }
        $db_count = new db_query("SELECT new_id FROM new_feed WHERE `delete` = 1 AND id_company = " . $_SESSION['login']['id_com']);
        $count = mysql_num_rows($db_count->result);
    }
    echo json_encode([
        'result'=>true,
        'count'=>$count
    ]);
}
?>
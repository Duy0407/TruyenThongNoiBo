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
        if (count($id) == 1) {
            $arr_id = '('. $id[0] . ')';
        }else{
            for ($i=0; $i < count($id); $i++) { 
                if ($i == 0) {
                    $arr_id = $arr_id . '(' . $id[$i] . ',';
                }else if ($i > 0 && $i < count($id) - 1) {
                    $arr_id = $arr_id . $id[$i] . ',';
                }else if($i == count($id) - 1){
                    $arr_id = $arr_id . $id[$i] . ')';
                }
            }
        }
        $qr_del = new db_query("DELETE FROM knowledge WHERE id IN $arr_id");
        $db_count = new db_query("SELECT id FROM knowledge WHERE `delete` = 1 AND id_company = " . $_SESSION['login']['id_com']);
        $count = mysql_num_rows($db_count->result);
    }else if($parent_type == 2){
        for ($i=0; $i < count($id); $i++) { 
            $id_del = $id[$i];
            if ($type[$i] == 1) {
                $db_del = new db_query("DELETE FROM mail_from_ceo WHERE id = $id_del");
            }else if($type[$i] == 2){
                $db_del = new db_query("DELETE FROM `target` WHERE id = $id_del");
            }else if($type[$i] == 3){
                $db_del = new db_query("DELETE FROM core_value WHERE id = $id_del");
            }
        }
        $db_count1 = new db_query("SELECT id FROM mail_from_ceo WHERE `delete` = 1 AND id_company = " . $_SESSION['login']['id']);
        $db_count2 = new db_query("SELECT id FROM `target` WHERE `delete` = 1 AND id_company = " . $_SESSION['login']['id']);
        $db_count3 = new db_query("SELECT id FROM core_value WHERE `delete` = 1 AND id_company = " . $_SESSION['login']['id']);
        $count = mysql_num_rows($db_count1->result) + mysql_num_rows($db_count2->result) + mysql_num_rows($db_count3->result);
    }else if ($parent_type == 3) {
        for ($i=0; $i < count($id); $i++) { 
            $qr_del = new db_query("DELETE FROM new_feed WHERE new_id = " . $id[$i]);
        }
        $time = time();
        $today1 = strtotime(date('m/d/Y',$time));
        $db_count = new db_query("SELECT new_id FROM new_feed WHERE `delete` = 1 AND updated_at >= $today1 - 86400*2 AND updated_at <= $today1 + 86400 AND id_company = " . $_SESSION['login']['id_com']);
        $count = mysql_num_rows($db_count->result);
    }
    echo json_encode([
        'result'=>true,
        'count'=>$count
    ]);
}
?>
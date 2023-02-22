<?php 
require_once "../config/config.php";
$new_id = getValue('new_id','int','POST','');
$new_type = getValue('new_type','int','POST','');
$db_new_feed = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id AND author = " . $_SESSION['login']['id']);
if (mysql_num_rows($db_new_feed->result) == 0) {
    echo json_encode([
        'result'=>false
    ]);
}else{
    $row = mysql_fetch_array($db_new_feed->result);
    $row['created_at'] = date('H:i, d/m/Y', $row['created_at']);


    if ($new_type == 3 || $new_type == 4) {
        $db_event = new db_query("SELECT * FROM events WHERE id_new = $new_id");
        $row2 = mysql_fetch_array($db_event->result);
        $time = $row2['time'];
        $row2['time'] = [
            'date_ngay'=>date("Y-m-d",$time),
            'date_gio'=>date("H:i",$time)
        ];
    }else if($new_type == 5){
        $db_discuss = new db_query("SELECT * FROM discuss WHERE new_id = $new_id");
        $row2 = mysql_fetch_array($db_discuss->result);
    }else if($new_type == 7){
        $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = $new_id");
        $j = 0;
        while($row_vote = mysql_fetch_array($db_vote->result)){
            $row2[$j] = $row_vote;
            $time = $row_vote['time'];
            $row2[$j]['time'] = [
                'date_ngay'=>date("Y-m-d",$time),
                'date_gio'=>date("H:i",$time)
            ];
            $j++;
        }
    }else if($new_type == 8){
        $db_event = new db_query("SELECT * FROM bonus WHERE id_new = $new_id");
        $row2 = mysql_fetch_array($db_event->result);
    }else if($new_type == 9){
        $db_event = new db_query("SELECT * FROM internal_news WHERE id_new = $new_id");
        $row2 = mysql_fetch_array($db_event->result);
    }else{
        $row2 = "";
    }

    echo json_encode([
        'result'=>true,
        'data'=>$row,
        'data2'=>$row2
    ]);
}
?>
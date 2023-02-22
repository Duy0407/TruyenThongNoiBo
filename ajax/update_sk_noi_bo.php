<?
require_once "../config/config.php";
$ep_id = getValue('ep_id', 'str', 'POST', '');
$event_id = getValue('event_id', 'str', 'POST', '');
$position = getValue('position', 'int', 'POST', 0);
$content = getValue('content', 'str', 'POST', '');
if ($event_id == 0 || $content == '') {
    $result = [
        'result' => false,
    ];
} else {
    $data_id = [
        'new_id' => $event_id,
    ];

    $data = [
        'position' => $position,
        'content' => $content,
        'updated_at' => time(),
    ];

    update('new_feed',$data,$data_id);
    $detail_nf = new db_query("SELECT id,speakers_avatar FROM `events` WHERE id_new = $event_id");
    $detail = mysql_fetch_assoc($detail_nf->result);
    if ($ep_id != '') {
        $ep_id = explode(',', $ep_id);
        foreach ($ep_id as $key => $value) {
            $data_event_join = [
                'id_employee' => $value,
                'id_event' => $detail['id'],
                'user_type' => 2,
            ];
            add('event_join', $data_event_join);
        }
    }
    $result = [
        'result' => true,
    ];
}
echo json_encode($result);
?>
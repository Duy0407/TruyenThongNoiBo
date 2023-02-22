<?
require_once '../config/config.php';
$ep_id      = getValue('ep_id', 'str', 'POST', '');
$list_guests = getValue('list_guests', 'str', 'POST', '');
$event_id   = getValue('event_id', 'int', 'POST', 0);
$content    = getValue('content_edit_dn', 'str', 'POST', '');
$dep_id     = getValue('department_id', 'int', 'POST', 0);
$quyen      = getValue('quyen', 'str', 'POST', '');
$name_dg    = getValue('name_dg_dn', 'str', 'POST', '');
$chucvu_dg  = getValue('chucvu_dg_dn', 'str', 'POST', '');
$sdt_dg     = getValue('sdt_dg_dn', 'str', 'POST', '');
$email_dg   = getValue('email_dg_dn', 'str', 'POST', '');

if ($event_id == 0 || $content == '' || $quyen == '' || $name_dg == '' || $chucvu_dg == '' || $sdt_dg == '' || $email_dg == '') {
    $result = [
        'result' => false,
    ];
} else {
    $data_id = [
        'new_id' => $event_id
    ];
    $data_id_event = [
        'id_new' => $event_id
    ];
    $data_nf = [
        'content' => $content,
        'position' => $dep_id,
        'updated_at' => time(),
    ];
    update('new_feed', $data_nf, $data_id);
    $detail_nf = new db_query("SELECT id,speakers_avatar FROM `events` WHERE id_new = $event_id");
    $detail = mysql_fetch_assoc($detail_nf->result);
    $img = $detail['speakers_avatar'];
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
    if (isset($_FILES['files_img'])) {
        if ($img != '') {
            $unlink = "../img/new_feed/event/event_doi_ngoai/speakers_avatar/". $_SESSION['login']['id'] . "/" .$img;
            if (is_writable($unlink)) {
                unlink($unlink);
            }
        }
        $duoi = explode('/', $_FILES['files_img']['type']);
        $duoi = $duoi[(count($duoi) - 1)];
        $_FILES['files_img']['name'] = rand() . "." . $duoi;
        $tmp_name = $_FILES['files_img']['tmp_name'];
        $dir = "../img/new_feed/event/event_doi_ngoai/speakers_avatar/";
        if (!is_dir($dir . $_SESSION['login']['id'])) {
            mkdir($dir . $_SESSION['login']['id'], 0777, true);
        }
        move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['files_img']['name']);
        $img = $_FILES['files_img']['name'];
    }

    $data_event = [
        'speakers_avatar'   => $img,
        'event_mode'        => $quyen,
        'speakers_name'     => $name_dg,
        'speakers_position' => $chucvu_dg,
        'speakers_phone'    => $sdt_dg,
        'speakers_email'    => $email_dg,
        'list_guests'       => $list_guests,
    ];
    update('events', $data_event, $data_id_event);
    

    $result = [
        'result' => true,
    ];
}

echo json_encode($result);

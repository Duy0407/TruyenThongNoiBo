<?php
require_once '../config/config.php';
$id_core = getValue('id_core', 'int', 'POST', '');
if ($id_core == 0) {
    header("Location: /");
}
$db_like = new db_query("SELECT * FROM `like_core_value` WHERE id_core = $id_core AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
if (mysql_num_rows($db_like->result) == 0) {
    $data = [
        'id_core'    => $id_core,
        'id_user'   => $_SESSION['login']['id'],
        'user_type' => $_SESSION['login']['user_type'],
        'created_at' => time()
    ];
    add('like_core_value', $data);
    $result = true;
} else {
    $qr_del = new db_query("DELETE FROM `like_core_value` WHERE id_core = $id_core AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
    $result = false;
}
$db_count_like = new db_query("SELECT * FROM `like_core_value` WHERE id_core = $id_core");
echo json_encode([
    'result' => $result,
    'count' => mysql_num_rows($db_count_like->result)
]);

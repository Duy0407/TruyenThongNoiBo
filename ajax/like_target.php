<?php
require_once '../config/config.php';
$id_target = getValue('id_target', 'int', 'POST', '');
if ($id_target == 0) {
    header("Location: /");
}
$db_like = new db_query("SELECT * FROM `like_target` WHERE id_target = $id_target AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
if (mysql_num_rows($db_like->result) == 0) {
    $data = [
        'id_target'    => $id_target,
        'id_user'   => $_SESSION['login']['id'],
        'user_type' => $_SESSION['login']['user_type'],
        'created_at' => time()
    ];
    add('like_target', $data);
    $result = true;
} else {
    $qr_del = new db_query("DELETE FROM `like_target` WHERE id_target = $id_target AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
    $result = false;
}
$db_count_like = new db_query("SELECT * FROM `like_target` WHERE id_target = $id_target");
echo json_encode([
    'result' => $result,
    'count' => mysql_num_rows($db_count_like->result)
]);

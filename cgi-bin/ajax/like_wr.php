<?php
require_once '../config/config.php';
$id_working_rules = getValue('id_working_rules', 'int', 'POST', '');
if ($id_working_rules == 0) {
    header("Location: /");
}
$db_like = new db_query("SELECT * FROM `like_working_rules` WHERE id_working_rules = $id_working_rules AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
if (mysql_num_rows($db_like->result) == 0) {
    $data = [
        'id_working_rules'    => $id_working_rules,
        'id_user'   => $_SESSION['login']['id'],
        'user_type' => $_SESSION['login']['user_type'],
        'created_at' => time()
    ];
    add('like_working_rules', $data);
    $result = true;
} else {
    $qr_del = new db_query("DELETE FROM `like_working_rules` WHERE id_working_rules = $id_working_rules AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
    $result = false;
}
$db_count_like = new db_query("SELECT * FROM `like_working_rules` WHERE id_working_rules = $id_working_rules");
echo json_encode([
    'result' => $result,
    'count' => mysql_num_rows($db_count_like->result)
]);

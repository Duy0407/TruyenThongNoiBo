<?
require_once '../config/config.php';
$background = getValue('background', 'str', 'POST', '');
if ($background != '' && in_array($background, ['blue', 'white'])) {
    $data = [
        'background' => $background,
    ];
    $condition = [
        'id_user' => $_SESSION['login']['id'],
        'type' => $_SESSION['login']['user_type']
    ];
    update('config_background', $data, $condition);
    echo json_encode([
        'result' => true,
        'msg' => "Cập nhật màu giao diện thành công"
    ]);
}

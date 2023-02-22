<?php
require_once "../config/config.php";
$new_id = getValue('new_id', 'int', 'POST', '');

if ($new_id == 0) {
    echo json_encode([
        'result' => false
    ]);
} else {
    $arr_data = [
        'delete' => 1,
    ];
    $arr_id = [
        'new_id' => $new_id,
    ];
    update('new_feed', $arr_data, $arr_id);

    echo json_encode([
        'result' => true
    ]);
}

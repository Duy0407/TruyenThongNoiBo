<?php
require_once '../config/config.php';
$search = getValue('search', 'str', 'POST', '');
$time = time();
$today1 = strtotime(date('m/d/Y', $time));
$id_com = $_SESSION['login']['id_com'];
$mail_from_ceo = new db_query("SELECT updated_at,id,title_mail,created_at FROM mail_from_ceo WHERE title_mail LIKE '%$search%' AND id_company = $id_com AND `delete` = 1 AND updated_at >= $today1 - 86400*3 ORDER BY updated_at ASC");

$arr_mail_from_ceo = [];
while ($row = mysql_fetch_array($mail_from_ceo->result)) {
    $arr_mail_from_ceo[] = $row;
}

$target = new db_query("SELECT updated_at,id,title,created_at FROM `target` WHERE title LIKE '%$search%' AND id_company = $id_com AND `delete` = 1 AND updated_at >= $today1 - 86400*3 ORDER BY updated_at ASC");
$arr_target = [];
while ($row = mysql_fetch_array($target->result)) {
    $arr_target[] = $row;
}

$core_value = new db_query("SELECT updated_at,id,tittle,created_at FROM `core_value` WHERE tittle LIKE '%$search%' AND id_company = $id_com AND `delete` = 1 AND updated_at >= $today1 - 86400*3 ORDER BY updated_at ASC");
$arr_core_value = [];
while ($row = mysql_fetch_array($core_value->result)) {
    $arr_core_value[] = $row;
}

$arr_vhdn = array_merge($arr_mail_from_ceo, $arr_target, $arr_core_value);
$arr_vhdn_today = [];
for ($i = 0; $i < count($arr_vhdn); $i++) {
    if ($arr_vhdn[$i]['updated_at'] >= $today1 && ($arr_vhdn[$i]['updated_at']) < $today1 + 86400) {
        $arr_vhdn_today[] = $arr_vhdn[$i];
    }
}

$arr_vhdn_yesterday = [];
for ($i = 0; $i < count($arr_vhdn); $i++) {
    if ($arr_vhdn[$i]['updated_at'] >= $today1 - 86400 && $arr_vhdn[$i]['updated_at'] < $today1) {
        $arr_vhdn_yesterday[] = $arr_vhdn[$i];
    }
}

$arr_vhdn3 = [];
for ($i = 0; $i < count($arr_vhdn); $i++) {
    if ($arr_vhdn[$i]['updated_at'] <= $today1 - 86400 && $arr_vhdn[$i]['updated_at'] >= $today1 - 86400 * 2) {
        $arr_vhdn3[] = $arr_vhdn[$i];
    }
}
$html1 = '';
if (count($arr_vhdn_today) > 0) {
    $html1 = $html1 . '<div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del">Hôm nay</p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <div class="v_table_list_del">
                              <div class="body_del">';
    for ($i = 0; $i < count($arr_vhdn_today); $i++) {
        if (isset($arr_vhdn_today[$i]['title_mail'])) {
            $name = $arr_vhdn_today[$i]['title_mail'];
            $type = 1;
        } else if (isset($arr_vhdn_today[$i]['title'])) {
            $name = $arr_vhdn_today[$i]['title'];
            $type = 2;
        } else if (isset($arr_vhdn_today[$i]['tittle'])) {
            $name = $arr_vhdn_today[$i]['tittle'];
            $type = 3;
        }
        $html1 = $html1 . '<div class="item_data_del" onclick="item_data_del(this)" data-id="' . $arr_vhdn_today[$i]['id'] . '" data-type="' . $type . '">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p>' . $name . '</p>
                                      </div>
                                      <div class="date_data_del">
                                        <p>' . date('d.m.Y H:i', $arr_vhdn_today[$i]['created_at']) . '</p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>';
    }
    $html1 = $html1 . '</div>
                            </div>
                          </div>';
}

$html2 = '';
if (count($arr_vhdn_yesterday) > 0) {
    $html2 = $html2 . '<div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del">Hôm nay</p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <div class="v_table_list_del">
                              <div class="body_del">';
    for ($i = 0; $i < count($arr_vhdn_yesterday); $i++) {
        if (isset($arr_vhdn_yesterday[$i]['title_mail'])) {
            $name = $arr_vhdn_yesterday[$i]['title_mail'];
            $type = 1;
        } else if (isset($arr_vhdn_yesterday[$i]['title'])) {
            $name = $arr_vhdn_yesterday[$i]['title'];
            $type = 2;
        } else if (isset($arr_vhdn_yesterday[$i]['tittle'])) {
            $name = $arr_vhdn_yesterday[$i]['tittle'];
            $type = 3;
        }
        $html2 = $html2 . '<div class="item_data_del" onclick="item_data_del(this)" data-id="' . $arr_vhdn_yesterday[$i]['id'] . '" data-type="' . $type . '">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p>' . $name . '</p>
                                      </div>
                                      <div class="date_data_del">
                                        <p>' . date('d.m.Y H:i', $arr_vhdn_yesterday[$i]['created_at']) . '</p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>';
    }
    $html2 = $html2 . '</div>
                            </div>
                          </div>';
}

$html3 = '';
if (count($arr_vhdn3) > 0) {
    $html3 = $html3 . '<div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del">Hôm nay</p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <div class="v_table_list_del">
                              <div class="body_del">';
    for ($i = 0; $i < count($arr_vhdn3); $i++) {
        if (isset($arr_vhdn3[$i]['title_mail'])) {
            $name = $arr_vhdn3[$i]['title_mail'];
            $type = 1;
        } else if (isset($arr_vhdn3[$i]['title'])) {
            $name = $arr_vhdn3[$i]['title'];
            $type = 2;
        } else if (isset($arr_vhdn3[$i]['tittle'])) {
            $name = $arr_vhdn3[$i]['tittle'];
            $type = 3;
        }
        $html3 = $html3 . '<div class="item_data_del" onclick="item_data_del(this)" data-id="' . $arr_vhdn3[$i]['id'] . '" data-type="' . $type . '">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p>' . $name . '</p>
                                      </div>
                                      <div class="date_data_del">
                                        <p>' . date('d.m.Y H:i', $arr_vhdn3[$i]['created_at']) . '</p>
                                      </div>
                                      <div class="checkbox1">
                                        <input type="checkbox" name="" class="chk_del">
                                      </div>
                                    </div>
                                  </div>';
    }
    $html3 = $html3 . '</div>
                            </div>
                          </div>';
}
$html = $html1 . $html2 . $html3;
echo json_encode([
    'html' => $html
]);

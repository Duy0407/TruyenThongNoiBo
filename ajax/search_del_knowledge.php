<?php
require_once '../config/config.php';
$time = time();
$search = getValue('search', 'str', 'POST', '');
$id_com = $_SESSION['login']['id_com'];
$qr1 = new db_query("SELECT * FROM knowledge WHERE id_company = $id_com AND `name` LIKE '%$search%' AND `delete` = 1 AND $time - updated_at <= 86400");
$html1 = '';
if (mysql_num_rows($qr1->result) > 0) {
    $html1 = $html1 . '<div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del">Hôm nay</p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <div class="v_table_list_del">
                              <div class="body_del">';
    while ($row = mysql_fetch_array($qr1->result)) {
        $html1 = $html1 . '<div class="item_data_del" onclick="item_data_del(this)" data-id="' . $row['id'] . '">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p>' . $row['name'] . '</p>
                                      </div>
                                      <div class="date_data_del">
                                        <p>' . date('d.m.Y H:i', $row['created_at']) . '</p>
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

$qr2 = new db_query("SELECT * FROM knowledge WHERE id_company = $id_com AND `name` LIKE '%$search%' AND `delete` = 1 AND $time - updated_at <= 86400*2 AND $time - updated_at > 86400");
$html2 = '';
if (mysql_num_rows($qr2->result) > 0) {
    $html2 = $html2 . '<div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del">Hôm nay</p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <div class="v_table_list_del">
                              <div class="body_del">';
    while ($row = mysql_fetch_array($qr2->result)) {
        $html2 = $html2 . '<div class="item_data_del" onclick="item_data_del(this)" data-id="' . $row['id'] . '">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p>' . $row['name'] . '</p>
                                      </div>
                                      <div class="date_data_del">
                                        <p>' . date('d.m.Y H:i', $row['created_at']) . '</p>
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

$qr3 = new db_query("SELECT * FROM knowledge WHERE id_company = $id_com AND `name` LIKE '%$search%' AND `delete` = 1 AND $time - updated_at <= 86400*3 AND $time - updated_at > 86400*2");
$html3 = '';
if (mysql_num_rows($qr3->result) > 0) {
    $html3 = $html3 . '<div class="row_table_list">
                            <div class="thead_del">
                              <p class="the_p btn_toggle_row_del">Hôm nay</p>
                              <img src="../img/img14.png" alt="Ảnh lỗi" class="btn_toggle_row_del muiten_xoay">
                            </div>
                            <div class="v_table_list_del">
                              <div class="body_del">';
    while ($row = mysql_fetch_array($qr3->result)) {
        $html3 = $html3 . '<div class="item_data_del" onclick="item_data_del(this)" data-id="' . $row['id'] . '">
                                    <div class="img_data">
                                      <img src="../img/img10.png" alt="Ảnh lỗi">
                                    </div>
                                    <div class="text_item">
                                      <div class="name_data_del">
                                        <p>' . $row['name'] . '</p>
                                      </div>
                                      <div class="date_data_del">
                                        <p>' . date('d.m.Y H:i', $row['created_at']) . '</p>
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
?>

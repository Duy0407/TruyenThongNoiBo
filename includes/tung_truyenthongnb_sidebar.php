<!-- /////////////tung////////////////////////////////////////// -->
<div class="sukien-nv caidat-doinoi">
    <div class="sukien-nv-l">
        <?
        $i = 0;
        foreach ($arr_event as $key => $value) {
            if ($value['time'] >= $time && $value['time'] <= $day) {
        ?>
                <div class="sk-giao-luu">
                    <div class="skgl">
                        <p class="event_title"><?= $value['new_title'] ?></p>
                    </div>
                    <div class="thongtin-skgl">
                        <div class="thongtin-skgl-chung">
                            <span>Nội dung sự kiện:</span>
                            <span class="pchung content"><?= $value['content'] ?></span>
                        </div>
                        <div class="thongtin-skgl-chung">
                            <span>Vị trí đăng sự kiện:</span>
                            <span class="pchung location"><?php 
                            // if ($value['position'] == 0) {
                            //     echo "Tường công ty";
                            // }
                            $vi_tri_dang = 'Tường công ty';
                            for ($j = 0; $j < count($list_department); $j++) {
                                if ($value['position'] == $list_department[$j]->dep_id) {
                                    $vi_tri_dang = $list_department[$j]->dep_name;
                                    break;
                                }
                            }
                            echo $vi_tri_dang;
                            ?></span>
                        </div>
                        <div class="thongtin-skgl-chung tvtg">
                            <p>Thành viên tham gia </p>
                            <div class="item-sk-tvtg participants">
                                <?
                                $id_event = $value['id'];
                                $db_event_join = new db_query("SELECT * FROM event_join where id_event = $id_event");
                                while ($row_ej = mysql_fetch_assoc($db_event_join->result)) {
                                    if ($row_ej['user_type'] == 2) {
                                        if ($arr_ep[$row_ej['id_employee']]['ep_image'] == "") {
                                            $img = '../img/logo_com.png';
                                        }else{
                                            $img = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_ej['id_employee']]['ep_image'];
                                        }
                                        $name = $arr_ep[$row_ej['id_employee']]['ep_name'];
                                        $position = 'Nhân viên';
                                    } else {
                                        if ($arr_com->com_logo == "") {
                                            $img =  '../img/logo_com.png';
                                        }else{
                                            $img =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                                        }
                                        $name = $arr_com->com_name;
                                        $position = 'Quản trị';
                                    }
                                    ?>
                                     <div class="show-hide">
                                    <img class="imgsk_tvtg imgsk_tvtg2" src="<?= $img ?>" alt="">
                                    <div class="hvshow" style="display:none">
                                    <div class="flex">
                                        <div class="img-show">
                                            <img class="imgsk_tvtg" src="<?= $img ?>">
                                        </div>
                                        <div class="tetx-show">
                                            <p class="name"><?= $name ?></p>
                                            <p class="position"><?= $position ?></p>
                                            <p class="id_user"><?= $row_ej['id_employee'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                    <?
                                }
                                ?>
                            </div>
                        </div>
                        <div class="thongtin-skgl-chung tvtg question">
                            <p>Danh sách câu hỏi trong sự kiện</p>
                            <? 
                            $db_event_question = new db_query("SELECT * FROM event_question where id_event = $id_event");
                            $j = 1;
                            while ($row_question = mysql_fetch_assoc($db_event_question->result)) {
                                if ($row_question['user_type'] == 2) {
                                    $img = 'https://chamcong.24hpay.vn/upload/employee/' . $arr_ep[$row_question['user_id']]['ep_image'];
                                    $name = $arr_ep[$row_question['user_id']]['ep_name'];
                                } else {
                                    $img    =  'https://chamcong.24hpay.vn/upload/company/logo/' . $arr_com->com_logo;
                                    $name   = $arr_com->com_name;
                                }
                                $arr_event_question[] = [
                                    'content' => $row_question['content'],
                                ];
                                ?>
                                <div class="ds-sk">
                                <p class="pchung"><?= $j ?>.</p>
                                <p class="pchung"><?= $row_question['content'] ?></p>
                                <p>(<?= $name ?>)</p>
                                </div>
                                <?
                                $j++;
                            }
                            ?>
                        </div>
                        <?php
                        $db_event_join = new db_query("SELECT id FROM event_join WHERE id_event = $id_event AND id_employee = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
                        if (mysql_num_rows($db_event_join->result) == 0) {
                            $join = "Tham gia";
                        }else{
                            $join = "Hủy tham gia";
                        }
                        ?>
                        <div class="tgsk-xem">
                            <p class="tham-gia"><?=$join?></p>
                            <p class="xem-chi-tiet view_detail_event" data-type="<?= $value['new_type'] ?>" data-id="<?= $value['new_id'] ?>">Xem chi tiết</p>
                        </div>
                    </div>

                </div>
        <?
                $i++;
            }
            if ($i == 1) {
                break;
            }
        }
        ?>
    </div>
</div>
<!-- /////////////////////////////////////////////////////////// -->
<div class="sukien-nv  caidat-doingoai  " style="display: none">
    <div class="sukien-nv-l">
        <div class="sk-giao-luu">
            <div class="skgl">
                <p>Sự kiện giao lưu với tổng giám đốc</p>
            </div>
            <div class="thongtin-skgl">
                <div class="thongtin-skgl-chung">
                    <span>Nội dung sự kiện:</span>
                    <span class="pchung">Giao lưu, trao đổi công...</span>
                </div>
                <div class="thongtin-skgl-chung">
                    <span>Vị trí đăng sự kiện:</span>
                    <span class="pchung">Tường công ty</span>
                </div>

                <div class="thongtin-skgl-chung tvtg">
                    <p>Thành viên tham gia </p>
                    <div class="item-sk-tvtg">
                        <div class="show-hide">
                            <img class="imgsk_tvtg" src="../img/sk_tvtg.png" alt="">
                            <div class="hvshow" style="display: none">
                                <div class="img-show">
                                    <img src="../img/caidatnhanvien/avt.png">
                                </div>
                                <div class="tetx-show">
                                    <p>Phạm Văn Minh</p>
                                    <p>Quản trị</p>
                                    <p>ID: 012345</p>
                                </div>
                            </div>
                        </div>
                        <div class="show-hide">
                            <img class="imgsk_tvtg" src="../img/sk_tvtg.png" alt="">
                            <div class="hvshow" style="display: none">
                                <div class="img-show">
                                    <img src="../img/caidatnhanvien/avt.png">
                                </div>
                                <div class="tetx-show">
                                    <p>Phạm Văn Minh</p>
                                    <p>Quản trị</p>
                                    <p>ID: 012345</p>
                                </div>
                            </div>
                        </div>
                        <div class="show-hide">
                            <img class="imgsk_tvtg" src="../img/sk_tvtg.png" alt="">
                            <div class="hvshow" style="display: none">
                                <div class="img-show">
                                    <img src="../img/caidatnhanvien/avt.png">
                                </div>
                                <div class="tetx-show">
                                    <p>Phạm Văn Minh</p>
                                    <p>Quản trị</p>
                                    <p>ID: 012345</p>
                                </div>
                            </div>
                        </div>
                        <div class="show-hide">
                            <img class="imgsk_tvtg" src="../img/sk_tvtg.png" alt="">
                            <!-- <div class="hvshow" style="display: none">
                        <div class="img-show">
                  
                        <img src="../img/caidatnhanvien/avt.png">
                        </div>
                        <div class="tetx-show">
                          <p>Phạm Văn Minh</p>
                          <p>Quản trị</p>
                          <p>ID: 012345</p>
                        </div>
                      </div> -->
                        </div>
                        <div class="show-hide">
                            <img class="imgsk_tvtg" src="../img/sk_tvtg.png" alt="">
                            <!-- <div class="hvshow" style="display: none">
                        <div class="img-show">
                          <img src="../img/caidatnhanvien/avt.png">
                        </div>
                        <div class="tetx-show">
                          <p>Phạm Văn Minh</p>
                          <p>Quản trị</p>
                          <p>ID: 012345</p>
                        </div>
                      </div> -->
                        </div>


                    </div>
                </div>
                <div class="thongtin-skgl-chung tvtg ">
                    <p>Danh sách câu hỏi trong sự kiện</p>
                    <div class="ds-sk">
                        <span class="pchung">1.</span>
                        <span class="pchung">Đây là nội dung câu hỏi</span>
                        <span>(Đ.c An NS)</span>
                    </div>
                    <div class="ds-sk">
                        <span class="pchung">1.</span>
                        <span class="pchung">Đây là nội dung câu hỏi</span>
                        <span>(Đ.c An NS)</span>
                    </div>
                </div>
                <div class="tgsk-xem">
                    <p class="tham-gia tg-doingoai">Tham gia</p>
                    <p class="xem-chi-tiet xem-doingoai">Xem chi tiết</p>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/sukien_quanly.js"></script>
<script>
    $('.select2_t_company').select2({
        width: '100%',
    })
    $('.select2_muti_tv').select2({
        width: '100%',
    })
</script>

<!--///////// endtung/////////////////////////////////////////// -->
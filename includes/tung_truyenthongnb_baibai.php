<?php
//3 nội bộ - 4: đối ngoại
$time = strtotime(date('d-m-Y'));
$day = strtotime('last day of next month');
if ($key_event != "") {
    $qr_key_event = " AND new_feed.new_title LIKE '%$key%'";
} else {
    $qr_key_event = "";
}

$db_event = new db_query("SELECT id,new_feed.new_id,new_type,position,new_title,events.`time`,author_type,author,content FROM new_feed JOIN events ON events.id_new = new_feed.new_id where (new_feed.new_type = 3 OR new_feed.new_type = 4) AND new_feed.id_company = " . $_SESSION['login']['id_com'] . " AND `delete` = 0 $qr_key_event ORDER BY events.`time` ASC ");
$arr_event = [];
while ($row = mysql_fetch_array($db_event->result)) {
    $arr_event[] = $row;
}
?>
<div class="sukien-nv sk11 ">
    <div class="sukien-nv-r">
        <form class="timkiem-sk search_event">
            <input class="ip-tk-sknv" type="" name="" placeholder="Tìm kiếm sự kiện">
            <button class="item-tk-sk">
                <img class="img-tk-su" src="../img/goquestion.png" alt="Ảnh lỗi">
            </button>
        </form>
        <div class="vung-sk-all">
            <div class="vung-sk">
                <div class="sk-noi-bo">
                    <div class="item-sk-nb">
                        <img class="img-sk-nb" src="../img/sk_nb.png" alt="doinoi">
                    </div>
                    <div class="nb-dn">
                        <p class="nb-dn-so"><?
                                            $dem = 0;
                                            foreach ($arr_event as $key => $value) {
                                                if ($value['new_type'] == 3) {
                                                    $dem++;
                                                }
                                            }
                                            echo $dem;
                                            ?></p>
                        <p class="nb-dn-text">Sự kiện nội bộ</p>
                    </div>
                </div>
                <div class="sk-doi-ngoai">
                    <div class="item-sk-nb">
                        <img class="img-sk-nb" src="../img/sk_dn.png" alt="doingoai">
                    </div>
                    <div class="nb-dn">
                        <p class="nb-dn-so"><?
                                            $dem = 0;
                                            foreach ($arr_event as $key => $value) {
                                                if ($value['new_type'] == 4) {
                                                    $dem++;
                                                }
                                            }
                                            echo $dem;
                                            ?></p>
                        <p class="nb-dn-text">Sự kiện đối ngoại</p>
                    </div>
                </div>
            </div>
            <div class="noidung-sk">
                <div class="sk-sdr">
                    <p class="text-sk-sdr">Sự kiện sắp diễn ra (<?
                                                                $dem = 0;
                                                                foreach ($arr_event as $key => $value) {
                                                                    if ($value['time'] >= $time && $value['time'] <= $day) {
                                                                        $dem++;
                                                                    }
                                                                }
                                                                echo $dem;
                                                                ?>)</p>
                </div>
                <table class="tb-ndsk" style="width: 100%;">
                    <tr>
                        <th>STT</th>
                        <th>Tất cả sự kiện</th>
                        <th>Người tạo</th>
                        <th></th>
                    </tr>
                    <?
                    $i = 1;
                    foreach ($arr_event as $key => $value) {
                        if ($value['author_type'] == 1) {
                            $newfeed_name =  $arr_com->com_name;
                            $position = 'Quản lý';
                        } else {
                            $newfeed_name = $arr_ep[$value['author']]['ep_name'];
                            $position = 'Nhân viên';
                        }
                        if ($value['time'] >= $time && $value['time'] <= $day) {
                    ?>
                            <tr class="detail_event" data-id_event="<?= $value['new_id'] ?>">
                                <td><?= $i ?></td>
                                <td>
                                    <?
                                    if ($value['new_type'] == 3) {
                                    ?>
                                        <p>[Sự kiện nội bộ]</p>
                                    <?
                                    } else {
                                    ?>
                                        <p>[Sự kiện đối ngoại]</p>
                                    <?
                                    }
                                    ?>
                                    <p class="text-gd"><?= $value['new_title'] ?></p>
                                    <p class="text-time"><?= date('H:i d-m-Y', $value['time']) ?></p>
                                </td>
                                <td>
                                    <p><?= $newfeed_name ?></p>
                                    <p class="text-time"><?= $position ?></p>
                                </td>
                                <td>
                                    <button data-id="<?= $value['new_id'] ?>" class="custom_btn btn_del_event">
                                        <img class="img_xoask" src="../img/xoa_sk.png" alt="">
                                    </button>
                                </td>
                            </tr>
                    <?
                            $i++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ///////////////////////////////////////////////////////////////// -->
<div class="sukien-nv sk22  sk44" style="display: none">
    <div class="sukien-nv-r">
        <div class="sukien-nb2">
            <div class="sknb2">
                <div class="imgsk23"><img src="../img/sk23.png" alt=""></div>
                <div class="tetxsk23">
                    <p class="ptetxsk23">Sự kiện nội bộ</p>
                </div>
            </div>
            <div class="timkiem-sk">
                <input class="ip-tk-sknv" type="" name="" placeholder="Tìm kiếm sự kiện ">
                <div class="item-tk-sk">
                    <img class="img-tk-su" src="../img/goquestion.png" alt="">
                </div>
                <!-- ///3 -->

            </div>
        </div>
        <div class="vung-sk-all">
            <div class="noidung-sk sknb-dr">
                <div class="sk-sdr">
                    <p class="text-sk-sdr">Sự kiện sắp diễn ra (<?
                                                                $dem = 0;
                                                                foreach ($arr_event as $key => $value) {
                                                                    if ($value['new_type'] == 3 && $value['time'] >= $time && $value['time'] <= $day) {
                                                                        $dem++;
                                                                    }
                                                                }
                                                                echo $dem;
                                                                ?>)</p>
                </div>
                <div class="tb1-sknb">
                    <table class="tb-ndsk" style="width: 100%;">
                        <tr>
                            <th>STT</th>
                            <th>Tất cả sự kiện</th>
                            <th>Người tạo</th>
                            <th></th>
                        </tr>
                        <?
                        $i = 1;
                        foreach ($arr_event as $key => $value) {

                            if ($value['author_type'] == 1) {
                                $newfeed_name =  $arr_com->com_name;
                                $position = 'Quản lý';
                            } else {
                                $newfeed_name = $arr_ep[$value['author']]['ep_name'];
                                $position = 'Nhân viên';
                            }
                            if ($value['new_type'] == 3 && $value['time'] >= $time && $value['time'] <= $day) {
                        ?>
                                <tr class="detail_event" data-id_event="<?= $value['new_id'] ?>">
                                    <td><?= $i ?></td>
                                    <td>
                                        <p class="text-gd"><?= $value['new_title'] ?></p>
                                        <p class="text-time"><?= date('H:i d-m-Y', $value['time']) ?></p>
                                    </td>
                                    <td>
                                        <p><?= $newfeed_name ?></p>
                                        <p class="text-time"><?= $position ?></p>
                                    </td>
                                    <td>
                                        <button data-id="<?= $value['new_id'] ?>" class="custom_btn btn_del_event">
                                            <img class="img_xoask" src="../img/xoa_sk.png" alt="">
                                        </button>
                                    </td>
                                </tr>
                        <?
                                $i++;
                            }
                        }

                        ?>
                    </table>
                </div>
            </div>
            <!-- // -->
            <div class="noidung-sk sknb-kt">
                <div class="sk-sdr">
                    <p class="text-sk-sdr">Sự kiện đã kết thúc (<?
                                                                $dem = 0;
                                                                foreach ($arr_event as $key => $value) {
                                                                    if ($value['new_type'] == 3 && $value['time'] < $time) {
                                                                        $dem++;
                                                                    }
                                                                }
                                                                echo $dem;
                                                                ?>)</p>
                </div>
                <div class="tb1-sknb">
                    <table class="tb-ndsk" style="width: 100%;">
                        <tr>
                            <th>STT</th>
                            <th>Tất cả sự kiện</th>
                            <th>Người tạo</th>
                            <th></th>
                        </tr>
                        <?
                        $i = 1;
                        foreach ($arr_event as $key => $value) {
                            if ($value['author_type'] == 1) {
                                $newfeed_name =  $arr_com->com_name;
                                $position = 'Quản lý';
                            } else {
                                $newfeed_name = $arr_ep[$value['author']]['ep_name'];
                                $position = 'Nhân viên';
                            }
                            if ($value['new_type'] == 3 && $value['time'] < $time) {
                        ?>
                                <tr class="detail_event" data-id_event="<?= $value['new_id'] ?>">
                                    <td><?= $i ?></td>
                                    <td>
                                        <p class="text-gd"><?= $value['new_title'] ?></p>
                                        <p class="text-time"><?= date('H:i d-m-Y', $value['time']) ?></p>
                                    </td>
                                    <td>
                                        <p><?= $newfeed_name ?></p>
                                        <p class="text-time"><?= $position ?></p>
                                    </td>
                                    <td>
                                        <button data-id="<?= $value['new_id'] ?>" class="custom_btn btn_del_event">
                                            <img class="img_xoask" src="../img/xoa_sk.png" alt="">
                                        </button>
                                    </td>
                                </tr>
                        <?
                                $i++;
                            }
                        }

                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //////////////////////////////////////////////////////////////// -->
<div class="sukien-nv sk22  sk33" style="display: none">
    <div class="sukien-nv-r">
        <div class="sukien-nb2">
            <div class="sknb2 skdn3">
                <div class="imgsk23"><img src="../img/sk23.png" alt=""></div>
                <div class="tetxsk23">
                    <p class="ptetxsk23">Sự kiện đối ngoại</p>
                </div>
            </div>
            <div class="timkiem-sk">
                <input class="ip-tk-sknv" type="" name="" placeholder="Tìm kiếm sự kiện ">
                <div class="item-tk-sk">
                    <img class="img-tk-su" src="../img/goquestion.png" alt="">
                </div>
            </div>
        </div>
        <div class="vung-sk-all">
            <div class="noidung-sk sknb-dr">
                <div class="sk-sdr">
                    <p class="text-sk-sdr num_event_active">Sự kiện sắp diễn ra (<?
                                                                                    $dem = 0;
                                                                                    foreach ($arr_event as $key => $value) {
                                                                                        if ($value['new_type'] == 4 && $value['time'] >= $time && $value['time'] <= $day) {
                                                                                            $dem++;
                                                                                        }
                                                                                    }
                                                                                    echo $dem;
                                                                                    ?>)</p>
                </div>
                <div class="tb1-sknb">
                    <table class="tb-ndsk" style="width: 100%;">
                        <tr>
                            <th>STT</th>
                            <th>Tất cả sự kiện</th>
                            <th>Người tạo</th>
                            <th></th>
                        </tr>
                        <?
                        $i = 1;
                        foreach ($arr_event as $key => $value) {
                            if ($value['author_type'] == 1) {
                                $newfeed_name =  $arr_com->com_name;
                            } else {
                                foreach ($arr_ep as $value_ep) {
                                    if ($value_ep->ep_id == $value['author']) {
                                        $newfeed_name = $value_ep->ep_name;
                                    }
                                }
                            }
                            if ($value['new_type'] == 4 && $value['time'] >= $time && $value['time'] <= $day) {
                        ?>
                                <tr class="detail_event" data-id_event="<?= $value['new_id'] ?>">
                                    <td><?= $i ?></td>
                                    <td>
                                        <p class="text-gd"><?= $value['new_title'] ?></p>
                                        <p class="text-time"><?= date('H:i d-m-Y', $value['time']) ?></p>
                                    </td>
                                    <td>
                                        <p><?= $newfeed_name ?></p>
                                        <p class="text-time">Quản trị</p>
                                    </td>
                                    <td>
                                        <button data-id="<?= $value['new_id'] ?>" class="custom_btn btn_del_event">
                                            <img class="img_xoask" src="../img/xoa_sk.png" alt="">
                                        </button>
                                    </td>
                                </tr>
                        <?
                                $i++;
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <!-- // -->
            <div class="noidung-sk sknb-kt">
                <div class="sk-sdr">
                    <p class="text-sk-sdr">Sự kiện đã kết thúc (<?
                                                                $dem = 0;
                                                                foreach ($arr_event as $key => $value) {
                                                                    if ($value['new_type'] == 4 && $value['time'] < $time) {
                                                                        $dem++;
                                                                    }
                                                                }
                                                                echo $dem;
                                                                ?>)</p>
                </div>
                <div class="tb1-sknb">
                    <table class="tb-ndsk" style="width: 100%;">
                        <tr>
                            <th>STT</th>
                            <th>Tất cả sự kiện</th>
                            <th>Người tạo</th>
                            <th></th>
                        </tr>
                        <?
                        $i = 1;
                        foreach ($arr_event as $key => $value) {

                            if ($value['author_type'] == 1) {
                                $newfeed_name =  $arr_com->com_name;
                                $position = 'Quản lý';
                            } else {
                                $newfeed_name = $arr_ep[$value['author']]['ep_name'];
                                $position = 'Nhân viên';
                            }
                            if ($value['new_type'] == 4 && $value['time'] < $time) {
                        ?>
                                <tr class="detail_event" data-id_event="<?= $value['new_id'] ?>">
                                    <td><?= $i ?></td>
                                    <td>
                                        <p class="text-gd"><?= $value['new_title'] ?></p>
                                        <p class="text-time"><?= date('H:i d-m-Y', $value['time']) ?></p>
                                    </td>
                                    <td>
                                        <p><?= $newfeed_name ?></p>
                                        <p class="text-time"><?= $position ?></p>
                                    </td>
                                    <td>
                                        <button data-id="<?= $value['new_id'] ?>" class="custom_btn btn_del_event">
                                            <img class="img_xoask" src="../img/xoa_sk.png" alt="">
                                        </button>
                                    </td>
                                </tr>
                        <?
                                $i++;
                            }
                        }
                        ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end tung -->
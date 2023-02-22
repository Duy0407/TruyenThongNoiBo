<?php
if ($_SERVER['PHP_SELF'] == "/home/ttnb_sinhnhat.php") {
    $style = "position: relative; top: 4px";
}else{
    $style = "";
}
?>
<div class="dropdown">
    <div class="xanh">
        <button class="dropbtn nhom-trangcongty">
            <div class="img">
                <img src="<?=$img_sidebar_ntl?>" alt="Ảnh lỗi">
            </div>
            <div class="cont">
                <p style="<?=$style?>"><?=$name_page?></p>
            </div>
        </button>
        <div class="dropdown-content congty-info">
            <a href="/truyen-thong-noi-bo-cong-ty.html" id="nhom-trangcongty" class="sidebar_ntl_link">
                <div class="img">
                    <img src="../img/sbp_1.png" alt="Ảnh lỗi">
                </div>
                <div class="cont">
                    <p class="v_detail_sidebar_ntl_text">Trang công ty</p>
                </div>
            </a>
            <?php
            $db_group = new db_query("SELECT * FROM `group` WHERE id_company = " . $_SESSION['login']['id_com']);
            if (count($list_department) == 0) {
                if (mysql_num_rows($db_group->result) == 0) {
                    $dep_id = 0;
                }else{
                    if ($_SESSION['login']['user_type'] == 1) {
                        $row_group2 = mysql_fetch_array($db_group->result);
                        $dep_id = $row_group2['id'];
                        $link_dep_group = rewrite_group($row_group2['id']);
                    }else{
                        $arr_group_id = [];
                        while($row_group2 = mysql_fetch_array($db_group->result)){
                            $arr_id_employee = explode(',', $row_group2['id_employee']);
                            $arr_id_manager = explode(',', $row_group2['id_manager']);
                            if (in_array($_SESSION['login']['id'], $arr_id_employee) == true || in_array($_SESSION['login']['id'], $arr_id_manager) == true) {
                                $arr_group_id[] = $row_group['id'];
                            }
                        }
                        $db_user_group = new db_query("SELECT * FROM `group` WHERE id = " . $arr_group_id[0]);
                        $row_user_group = mysql_fetch_array($db_user_group->result);
                        $dep_id = $row_user_group['id'];
                        $link_dep_group = rewrite_group($dep_id); //nhóm
                    }
                }
            }else{
                $dep_id = ($_SESSION['login']['user_type'] == 1) ? $list_department[0]->dep_id : $_SESSION['login']['dep_id'];
                $link_dep_group = rewrite_group_child($dep_id); //phòng ban
            }
            ?>
            <?php
            if($dep_id == 0){
            ?>
            <a onclick="alert('Công ty chưa có phòng ban nào hoặc bạn chưa thuộc nhóm - phòng ban nào')" id="nhom-thaoluan" class="sidebar_ntl_link">
                <div class="img">
                    <img src="../img/sbp_2.png">
                </div>
                <div class="cont">
                    <p class="v_detail_sidebar_ntl_text">Nhóm - thảo luận</p>
                </div>
            </a>
            <?php
            }else{
            ?>
            <a href="<?= $link_dep_group ?>" id="nhom-thaoluan" class="sidebar_ntl_link">
                <div class="img">
                    <img src="../img/sbp_2.png">
                </div>
                <div class="cont">
                    <p class="v_detail_sidebar_ntl_text">Nhóm - thảo luận</p>
                </div>
            </a>
            <?php
            }
            ?>
            <a href="/truyen-thong-noi-bo-sinh-nhat.html" id="page-sn" class="sidebar_ntl_link">
                <div class="img">
                    <img src="../img/sbp_3.png">
                </div>
                <div class="cont">
                    <p class="v_detail_sidebar_ntl_text" style="position: relative; top: 4px">Sinh nhật</p>
                </div>
            </a>
            <a href="/truyen-thong-noi-bo-su-kien.html" id="sukien" class="sidebar_ntl_link">
                <div class="img">
                    <img src="../img/sbp_4.png">
                </div>
                <div class="cont">
                    <p class="v_detail_sidebar_ntl_text">Sự kiện</p>
                </div>
            </a>
        </div>
    </div>
</div>
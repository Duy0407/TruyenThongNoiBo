<? 
$select_group = new db_query("SELECT `id`,`group_name`,`id_manager`,`id_employee`,`group_image` FROM `group` WHERE FIND_IN_SET(" . $my_id . ", id_manager) OR FIND_IN_SET(" . $my_id . ", id_employee)"); 
?>
<div class="exit_group">
    <div class="custom_notify_detail">
        <div class="custom_notify_header">
            Rời khỏi nhóm
            <img class="turnoff_custom_notify turnoff_exit_group" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="custom_notify_body">
            <div class="custom_notify_search">
                <input class="custom_notify_input" type="text" placeholder="Tìm kiếm nhóm">
            </div>
            <div class="custom_notify_list_item">
                

                <?while ($show_gr = mysql_fetch_assoc($select_group->result)) {
                    
                    $ar1 = explode(',',$show_gr['id_manager']);
                    $ar2 = explode(',',$show_gr['id_employee']);
                    $noi_ar = array_merge($ar1,$ar2);
                    $result_ar = array_unique($noi_ar);
                    $count_member = count($result_ar);
                    ?>
                    <div class="custom_notify_item">
                        <?if($show_gr['group_image'] != NULL){?>
                            <img class="custom_notify_avt" src="<?=$show_gr['group_image']?>" onerror="this.src=`/img/nv_default_bgi.svg`;" alt="Ảnh lỗi">
                        <?}else{?>
                            <img class="custom_notify_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                        <?}?>
                        
                        <div class="custom_notify_info">
                            <p class="custom_notify_name"><?=$show_gr['group_name']?></p>
                            <p class="custom_notify_info_des"><?=$count_member?> thành viên</p>
                        </div>
                        <?if (in_array($my_id, $ar1)) {?>
                            <!-- data="<?= $show_gr['id']?>" -->
                            <button class="delete_group_btn" onclick="click_btn_delete_group(<?= $show_gr['id']?>,'<?=$show_gr['group_name']?>')" >Xóa nhóm</button>
                        <?}else{?>
                            <button class="exit_gr_btn" onclick="out_group(<?=$show_gr['id']?>,'<?=$show_gr['group_name']?>')">Rời khỏi nhóm</button>
                        <?}?>
                    </div>
                <? } ?>
                
                
            </div>
        </div>
    </div>
</div>

<div class="exit_group2">
    <div class="custom_notify_detail2">
        <div class="custom_notify_header2">
            Rời khỏi nhóm
        </div>
        <div class="custom_notify_body">
            <p class="exit_group2_p">Bạn có chắc muốn rời khỏi nhóm <span class="html_name_gr"></span></p>
            <div class="exit_group2_div">
                <p class="exit_group2_div_p">Ngăn mọi người mời bạn tham gia nhóm này</p>
                <input type="checkbox" name="stopinvitingme" id="exit_group2_checkbox" hidden value="1">
                <label for="exit_group2_checkbox" class="show_notify_label"></label>
            </div>
            <div class="exit_group2_btn">
                <button class="exit_group2_cancel">Hủy</button>
                <button class="exit_group2_exit" data="">Rời khỏi nhóm</button>
            </div>
        </div>
    </div>
</div>


<div class="exit_group3">
    <div class="custom_notify_detail2">
        <div class="custom_notify_header2">Xóa nhóm</div>
        <div class="custom_notify_body">
            <p class="exit_group2_p">Bạn có chắc muốn xóa nhóm <span class="html_name_gr3"></span></p>
            <!-- <div class="exit_group2_div">
                <p class="exit_group2_div_p">Ngăn mọi người mời bạn tham gia nhóm này</p>
                <input type="checkbox" name="stopinvitingme" id="exit_group2_checkbox" hidden value="1">
                <label for="exit_group2_checkbox" class="show_notify_label"></label>
            </div> -->
            <div class="exit_group2_btn">
                <button class="exit_group2_cancel">Hủy</button>
                <button class="click_xoa_group" data="">Xóa nhóm</button>
            </div>
        </div>
    </div>
</div>
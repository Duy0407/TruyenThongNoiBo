<?php if (isset($_SESSION['login'])) { ?>
<div class="save_post">
    <div class="save_post_detail">
        <div class="save_post_header">
            Lưu bài viết
            <img class="turnoff_save_post" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
        </div>
        <div class="save_post_body parent_oninput">
            <div class="save_post_list_item">
                <? if ($my_type == 1){
                    $select_collection = new db_query("SELECT `name_collection`,`id_collection` FROM `add_collection` WHERE `id_user` = " . $my_id . " AND user_type = 1");
                }else{
                    $select_collection = new db_query("SELECT `name_collection`,`id_collection` FROM `add_collection` WHERE `id_user` = " . $my_id . " AND (user_type = 0 OR user_type = 2)");
                }
                while ($show_collection = mysql_fetch_assoc($select_collection->result)) {?>
                    <div class="save_post_item">
                        <img class="save_post_img" src="https://images.unsplash.com/photo-1638969710700-f803636a3e85?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
                        <p class="save_post_item_title"><?= $show_collection['name_collection']?></p>
                        <input class="save_post_radio" type="radio" name="save_post_radio" value="<?= $show_collection['id_collection']?>">
                    </div>
                <?}
                ?>
            
            </div>
        
            <div class="save_post_div_add">
                <button class="add_save_post">+</button>
                <span class="save_post_span">Thêm bộ sưu tập mới</span>
            </div>
            <div class="div_bao_apppen_html">
                
            </div>

            <div class="save_post_btn">
                <button class="save_post_cancel">Hủy</button>
                <button class="save_success save_success_tao disabled_chung">Tạo</button>
                <button class="save_success save_success_xong" data-id-new="" data-id-author="">Xong</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>
var x = 0;
var arr_file = [];
$(document).ready(function() {
    $("[name=upload_album_content]").change(function(){
        var el = this;
        var file_data = $(el)[0].files;
        var match = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];
    
        for (var i = 0; i < Number(file_data.length); i++) {
            x++;
            var file = file_data[i];
            var file_size = file.size;
            var file_type = file.type;
            var convert_file_size = (file_size / (1024 * 1024)).toFixed(2);
            if (file_type.match("image/*") != null) {
                var html = `<div class="image_upload_box_item">
                    <img class="iubi_img" src="` + URL.createObjectURL(file) + `" alt="">
                    <textarea class="iubi_txtarea" name="" id="" cols="30" rows="10" placeholder="Mô tả"></textarea>
                    <button class="iubi_btn" onclick="delFile(this)"><img src="/img/ep_show_cmt_del.svg" alt=""></button>
                </div>`;
                $(".image_upload_box").append(html);
                arr_file.push(file);
            } else  if (file_type.match("video/*") != null) {
                var html = `<div class="image_upload_box_item">
                    <video class="iubi_img"><source src="` + URL.createObjectURL(file) + `" alt=""></video>
                    <textarea class="iubi_txtarea" name="" id="" cols="30" rows="10" placeholder="Mô tả"></textarea>
                    <button class="iubi_btn" onclick="delFile(this)"><img src="/img/ep_show_cmt_del.svg" alt=""></button>
                </div>`;
                $(".image_upload_box").append(html);
                arr_file.push(file);
            }else {
                alert("File " + file.name + " sai định dạng vui lòng chọn ảnh hoặc video hợp lệ. ");
                break;
            }
        }

    });
    $(".old_btn").click(function(){
        $(this).parents(".old_item").remove();
    });
    $(".sidebar_index_footer_share").click(function(){
        var flag = true;
        var form_data = new FormData;
        var id_album = $(this).attr("data-id");
        var album_name = $(".album_name").val().trim();
        if (album_name == ''){
            alert("Bạn chưa đặt tên cho album");
            flag = false;
        }
        if (arr_file.length == 0 && $(".old_img").length == 0){
            alert("Bạn chưa tải ảnh lên");
            flag = false;
        }
        if (flag == true){
            form_data.append('id',id_album);
            form_data.append('name',album_name);
            arr_file.forEach(element => {
                form_data.append('file[]',element);
            });
            $(".old_img").each(function(){
                form_data.append('old_file[]',$(this).attr("src"));
            });
            $(".iubi_txtarea:not(.old_txtarea)").each(function(){
                form_data.append('desc[]',$(this).val().trim());
            });
            $(".old_txtarea").each(function(){
                form_data.append('old_desc[]',$(this).val().trim());
            });
            // chế độ xem
            var regime_select = $("[name=regime_select]:checked").val();
            if (regime_select == 4){
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if (regime_select == 3){
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('view_mode', regime_select);
            $.ajax({
                url: '../ajax/add_update_album.php',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.result == true){
                        window.location = data.link;
                    }
                }
            });
        }
    });
});
function delFile(ele){
    arr_file.splice($(".iubi_btn:not(.old_btn)").index(ele), 1);
    $(ele).parents(".image_upload_box_item").remove();
}
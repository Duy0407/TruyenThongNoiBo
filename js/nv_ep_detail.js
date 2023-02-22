var $canvas_avt  = $("#canvas_avt");
var $canvas_bgi  = $("#canvas_bgi");
var uploadedImageURL = '';
var options_avt = {
    zoomOnWheel: false,
    cropBoxMovable: false,
    cropBoxResizable: false,
    dragMode: 'move',
    aspectRatio: 9 / 9,
    minCanvasHeight: 300,
    minCanvasWidth: 300,
    ready() {
        this.cropper.crop();
        this.cropper.setCropBoxData({width: 300, height: 300});
    },
};
var options_bgi = {
    zoomOnWheel: false,
    cropBoxMovable: false,
    cropBoxResizable: false,
    dragMode: 'move',
    aspectRatio: 60 / 23,
    viewMode: 3,
    autoCropArea: 1,
    ready() {
        this.cropper.crop();
        this.cropper.setCropBoxData({left: 0, top: 0});
    },
};
var uploadImgCol = [];

$(document).ready(function() {
    // tiểu sử
    $(".introduce_tieu_su_btn").click(function(){
        $(this).addClass("hide");
        $(".tieu_su_txt:not(.no_tieu_su_txt)").addClass("hide");
        $(".edit_tieu_su_box").removeClass("hide");
        $(".tieu_su_txtarea").focus();
    });
    $(".edit_tieu_su_box .tieu_su_cancel_btn").click(function(){
        $(".introduce_tieu_su_btn").removeClass("hide");
        $(".tieu_su_txt").removeClass("hide");
        $(".edit_tieu_su_box").addClass("hide");
        $(".tieu_su_txtarea").val($(".tieu_su_txt").html());
        $(".tieu_su_txtarea").trigger('input');
    });
    $(".edit_tieu_su_box .tieu_su_save_btn").click(function(){
        var val = $.trim($(".tieu_su_txtarea").val());
        var flag = true;
        var form_data = new FormData();
        if (flag == true){
            form_data.append('story',val);
            form_data.append('view_mode',$(".tieu_su_label .btn_upload_regime").attr("data-view_mode"));
            form_data.append('arr_excepts',$(".tieu_su_label .btn_upload_regime").attr("data-jsonexcept"));
            $.ajax({
                url: "../ajax/add_update_city.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        // window.location.reload();
                        if (val == ''){
                            $(".introduce_tieu_su_btn").html("Thêm tiểu sử");
                            $(".introduce_tieu_su_btn").removeClass("hide");
                            $(".tieu_su_txt:not(.no_tieu_su_txt)").remove();
                            $(".edit_tieu_su_box").addClass("hide");
                            $(".tieu_su_txt:not(.no_tieu_su_txt)").html(val);
                            $(".no_tieu_su_txt").html("Nhập tiểu sử");
                        }else{
                            if ($(".tieu_su_txt:not(.no_tieu_su_txt)").length == 0){
                                console.log(val);
                                $(".introduce_tieu_su_btn").html("Chỉnh sửa tiểu sử");
                                $(`<p class="tieu_su_txt"></p>`).insertBefore(".introduce_tieu_su_btn");
                            }
                            $(".introduce_tieu_su_btn").removeClass("hide");
                            $(".tieu_su_txt:not(.no_tieu_su_txt)").removeClass("hide");
                            $(".edit_tieu_su_box").addClass("hide");
                            $(".tieu_su_txt").html(val);
                        }
                    }
                }
            });
        }
    });
    $(".tieu_su_txtarea").on('input',function(){
        check_rest_char(".tieu_su_txtarea",100,".tieu_su_rest_char_num");
    });
    $(".edit_individual_tieu_su_btn").click(function(){
        if ($(this).hasClass("save")){
            $(this).removeClass("save");
            var str = $.trim($(".edit_individual .tieu_su_txtarea").val());
            console.log(str);
            if (str != ''){
                $(".edit_individual .tieu_su_txt").html(str);
                $(this).html("Chỉnh sửa");
            }else{
                $(".edit_individual .tieu_su_txt").html("Nhập tiểu sử");
                $(this).html("Thêm");
            }
        }else{
            $(this).addClass("save");
            $(this).html("Lưu");
        }
        $(".edit_individual .tieu_su_txtarea").toggleClass("hide");
        $(".edit_individual .tieu_su_txt").toggleClass("hide");
    });
    $(".tieu_su_txtarea").trigger('input');
    // sở thích
    // đổ dl các sở thích đã có nếu có
    if ($(".list_so_thich_box .item_so_thich").length > 0){
        $(".popup_item_so_thich").remove();
        $(".center_introduce_so_thich .list_so_thich_box .item_so_thich").each(function(){
            $(`<div class="popup_item_so_thich">
                <input type="text" name="" placeholder="Nhập sở thích" class="popup_item_so_thich_input" value="`+ $(this).html() +`">
                <p class="so_thich_rest_char">Còn <span class="so_thich_rest_char_num">`+(25 - $(this).html().length)+`</span> ký tự</p>
            </div>`).insertBefore(".popup_them_so_thich .them_so_thich_btn");
        });
    }
    $(".introduce_so_thich_btn").click(function(){
        // show popup
        $("#popup_them_so_thich").show();
        if ($(".center_introduce_so_thich .list_so_thich_box .item_so_thich").length == 0){
            $(".popup_item_so_thich").remove();
            $(".popup_them_so_thich .them_so_thich_btn").click();
        }
    });
    $(".popup_them_so_thich .cancel_btn").click(function(){
        // đổ lại dl các sở thích đã có nếu có
        if ($(".list_so_thich_box .item_so_thich").length > 0){
            $(".popup_item_so_thich").remove();
            $(".list_so_thich_box .item_so_thich").each(function(){
                $(`<div class="popup_item_so_thich">
                    <input type="text" name="" placeholder="Nhập sở thích" class="popup_item_so_thich_input" value="`+ $(this).html() +`">
                    <p class="so_thich_rest_char">Còn <span class="so_thich_rest_char_num">`+(25 - $(this).html().length)+`</span> ký tự</p>
                </div>`).insertBefore(".popup_them_so_thich .them_so_thich_btn");
            });
        }else{
            $(".popup_item_so_thich").remove();
            $(".popup_them_so_thich .them_so_thich_btn").click();
        }
        // ẩn popup
        $("#popup_them_so_thich").hide();
    });
    $(".popup_them_so_thich .save_btn").click(function(){
        $(".list_so_thich_box").html('');
        var hobby = [];
        $(".popup_them_so_thich .popup_item_so_thich_input").each(function(){
            if ($.trim($(this).val()) != ''){
                hobby.push($.trim($(this).val()));
            }else{
                $(this).parents(".popup_item_so_thich").remove();
            }
        });
        var flag = true;
        var form_data = new FormData();
        if (flag == true){
            hobby.forEach(element => {
                form_data.append('hobby[]',element);
            });
            $.ajax({
                url: "../ajax/add_update_city.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        // window.location.reload();
                        hobby.forEach(element => {
                            $(".list_so_thich_box").append(`<p class="item_so_thich">` + element + `</p>`);
                        });
                    }
                }
            });
        }
        // ẩn popup
        $("#popup_them_so_thich").hide();
    });
    $(".popup_them_so_thich .them_so_thich_btn").click(function(){
        $(`<div class="popup_item_so_thich">
            <input type="text" name="" placeholder="Nhập sở thích" class="popup_item_so_thich_input">
            <p class="so_thich_rest_char">Còn <span class="so_thich_rest_char_num">25</span> ký tự</p>
        </div>`).insertBefore(".popup_them_so_thich .them_so_thich_btn");
    });
    // bộ sưu tập
    var avt_bst = '';
    $(".introduce_bst_btn").click(function(){
        $("#popup_ds_bst").show();
    });
    $(".popup_ds_bst .them_bst_btn").click(function(){
        $(".popup_nd_bst").animate({ scrollTop: 0 }, 500);
        check_disabled_save_btn($(".popup_nd_bst_checkbox:checked"),$(".popup_nd_bst .save_btn"));
        $("#popup_nd_bst").show();
    });
    $(".popup_nd_bst .cancel_btn").click(function(){
        $("#popup_nd_bst").hide();
        $(".popup_bst_list_upload_img").css('display','none');
        $(".popup_bst_list_upload_img").html('');
        $(".popup_bst_list_upload_img_txt").css('display','none');
    });
    $(".popup_nd_bst .save_btn").click(function(){
        $("#popup_nd_bst").hide();
        $(".del_bst_btn").hide();
        
        $(".popup_edit_bst .popup_bst_list_img .popup_bst_checkbox").remove();

        var html_pu_edit = '';
        var index = 0;
        $("#popup_edit_bst_avt").attr('src',$(".popup_nd_bst input[type=checkbox]:checked").eq(0).next("label").find("img").attr("src"));
        $(".popup_nd_bst input[type=checkbox]:checked").each(function(){
            var imgs = $(this).next("label").find("img").attr("src");
            html_pu_edit = html_pu_edit + `<input hidden checked type="checkbox" name="" id="bst_img_checkbox_`+ index +`" class="popup_bst_checkbox popup_edit_bst_checkbox">
            <label for="bst_img_checkbox_`+ index +`" class="popup_bst_checkbox">
                <div class="v_story_detail">
                    <img class="v_story_detail_img" src="`+ imgs +`" alt="Ảnh lỗi">
                    <div class="check_circle"></div>
                </div>
            </label>`;
            index++;
        });
        $("#edit_bst_add_img").after(html_pu_edit);

        $("#popup_edit_bst").show();
    });
    $(".popup_ds_bst .item_bst_edit").click(function(){
        $(".del_bst_btn").show();
        var imgs = $(this).data('imgs').split(',');
        var name = $(this).data('name');
        var avt = $(this).data('avt');
        avt_bst = avt;
        $("#popup_edit_bst_avt").attr('src',avt);
        $("#edit_bst_title").val(name);

        $(".popup_edit_bst .popup_bst_list_img .popup_bst_checkbox").remove();

        var html_pu_edit = '';
        for (let index = 0; index < imgs.length; index++) {
            html_pu_edit = html_pu_edit + `<input hidden checked type="checkbox" name="" id="bst_img_checkbox_`+ index +`" class="popup_bst_checkbox popup_edit_bst_checkbox">
            <label for="bst_img_checkbox_`+ index +`" class="popup_bst_checkbox">
                <div class="v_story_detail">
                    <img class="v_story_detail_img" src="`+ imgs[index] +`" alt="Ảnh lỗi">
                    <div class="check_circle"></div>
                </div>
            </label>`;
        }
        $("#edit_bst_add_img").after(html_pu_edit);

        $("#popup_edit_bst").show();
    });
    $(".popup_bst_see_more").click(function(){
        var start = $(this).prev(".popup_bst_list_img").find(".popup_bst_checkbox").length;
        var type = $(this).attr("data-type");
        var html = "";
        // $.ajax({
        //     url: "../ajax/show_more_image.php",
        //     type: "POST",
        //     data: {
        //         start: start,  
        //         type: type,
        //     },
        //     success: function(data){
        //         if (data.result == true){
        //             var arr = data.result.data;
        //             for (let i = 0; i < arr.length; i++) {
        //                 html += `<input hidden type="checkbox" name="" id="story_img_checkbox_`+(start+i)+`" class="popup_bst_checkbox popup_nd_bst_checkbox">
        //                     <label for="story_img_checkbox_`+(start+i)+`">
        //                         <div class="v_story_detail">
        //                             <img class="v_story_detail_img" src="`+arr[i].img+`" alt="Ảnh lỗi">
        //                             <div class="check_circle"></div>
        //                         </div>
        //                     </label>`;                        
        //             }
        //         }
        //     }
        // });
        $(this).prev(".popup_bst_list_img").append(html);
    });
    $(".popup_edit_bst .edit_bst_add_img").click(function(){
        // chọn lại các ảnh đã chọn bên pop up 'popup_edit_bst' vào popup 'popup_nd_bst' hoặc thêm sự kiện click chọn|bỏ chọn các ảnh ở popup 'popup_edit_bst' thì cũng chọn|bỏ chọn các ảnh tương ứng bên popup 'popup_nd_bst'
        check_disabled_save_btn($(".popup_nd_bst_checkbox:checked"),$(".popup_nd_bst .save_btn"));
        $("#popup_nd_bst").show();
    });
    $(".popup_edit_bst .edit_bst_avt_btn").click(function(){
        var avt = $("#popup_edit_bst_avt").attr('src');
        $("#popup_avt_bst_preview_avt").attr('src',avt);
        $(".popup_avt_bst .popup_bst_list_img .popup_bst_checkbox").remove();

        var html_pu_avt = '';
        var index = 0;
        $(".popup_edit_bst .popup_bst_list_img input[type=checkbox]:checked").each(function(){
            var imgs = $(this).next("label").find("img").attr("src");
            html_pu_avt = html_pu_avt + `<input hidden type="radio" name="bst_avt_radio" id="bst_avt_radio_`+ index +`" class="popup_bst_checkbox"`+((imgs === avt)?' checked':'')+`>
            <label for="bst_avt_radio_`+ index +`" class="popup_bst_checkbox">
                <div class="v_story_detail">
                    <img class="v_story_detail_img" src="`+ imgs +`" alt="Ảnh lỗi">
                    <div class="check_circle"></div>
                </div>
            </label>`;
            index++;
        });
        $(".popup_avt_bst .popup_bst_list_img").append(html_pu_avt);

        $("#popup_avt_bst").show();
        $("#popup_edit_bst").hide();
    });
    $(".popup_avt_bst .save_btn").click(function(){
        $("#popup_edit_bst_avt").attr('src',$("#popup_avt_bst_preview_avt").attr('src'));
        $("#popup_avt_bst").hide();
        $("#popup_edit_bst").show();
    });
    $(".popup_avt_bst .cancel_btn").click(function(){
        $("#popup_avt_bst_preview_avt").attr('src',$("#popup_edit_bst_avt").attr('src'));
        // $(".popup_bst_upload_avt_radio").remove();
        $("#popup_avt_bst").hide();
        $("#popup_edit_bst").show();
    });

    // chỉnh sửa trang cá nhân
    $(".edit_individual .edit_individual_edit_avatar, .center_upload_avt_icon").click(function(){
        $("#popup_edit_individual_avt_bgi .edit_individual_header .edit_individual_header").text(`Cập nhật ảnh đại diện`);
        $("#popup_edit_individual_avt_bgi").show();
        $("#popup_edit_individual_avt_bgi").data("edit","avt");
    });
    $(".edit_individual .edit_individual_edit_bgimg, .center_cover_upload_btn").click(function(){
        $("#popup_edit_individual_avt_bgi .edit_individual_header .edit_individual_header").text(`Cập nhật ảnh bìa`);
        $("#popup_edit_individual_avt_bgi").show();
        $("#popup_edit_individual_avt_bgi").data("edit","bgi");
    });
    
    $(".edit_individual_img").click(function(){
        var el = $(this);
        if ($("#popup_edit_individual_avt_bgi").data("edit") == "avt"){
            $("#popup_crop_avt").show();
            
            $canvas_avt.cropper('destroy').attr('src', el.find("img").attr("src")).cropper(options_avt);
            
        }else if ($("#popup_edit_individual_avt_bgi").data("edit") == "bgi"){
            $("#popup_crop_bgi").show();
            $("#popup_crop_avt .save_btn").attr("data-bgi_id",el.attr("data-bgi_id"));

            $canvas_bgi.cropper('destroy').attr('src', el.find("img").attr("src")).cropper(options_bgi);
        }
    });
    $('#popup_crop_avt .save_btn').click(async function() {
        // Get a string base 64 data url
        var croppedImageDataURL = await $canvas_avt.cropper('getCroppedCanvas').toDataURL("image/png");
        $(".popup_edit_individual_avt_bgi").hide();
        // change base 64 data url into blob
        const base64Response = await fetch(croppedImageDataURL);
        const blob = await base64Response.blob();
        // change blob into file
        var file = new File([blob], "avatar_cropped.png", {lastModified: new Date().getTime()});
        var form_data = new FormData();
        form_data.append('file', file);
        $.ajax({
            url: "../ajax/update_avatar.php",
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.result == true){
                    alert("Cập nhật ảnh đại diện thành công");
                    $(".center_avt_footer_img").attr('src', croppedImageDataURL);
                    $(".edit_individual .edit_individual_avatar").attr('src', croppedImageDataURL);                    
                }
            }
        });
    });
    $('#popup_crop_avt .cancel_btn').click(function() {
        // xóa ảnh đang crop trong khung
        $canvas_avt.cropper('replace', '');
        $canvas_avt.cropper("destroy");
        // end xóa ảnh đang crop trong khung
        $("#popup_crop_avt").hide();
    });
    $('#popup_crop_avt #zoomout_avt').click(function() {
        $canvas_avt.cropper("zoom", 0.1);
        $('#popup_crop_avt #zoom_range_avt').val(parseFloat($('#popup_crop_avt #zoom_range_avt').val()) + parseFloat(0.1));
    });
    $('#popup_crop_avt #zoomin_avt').click(function() {
        $canvas_avt.cropper("zoom", -0.1);
        $('#popup_crop_avt #zoom_range_avt').val($('#popup_crop_avt #zoom_range_avt').val() - 0.1);
    });
    $('#popup_crop_avt #zoom_range_avt').change(function() {
        $canvas_avt.cropper("zoomTo", $('#popup_crop_avt #zoom_range_avt').val());
    });
    $('#popup_crop_bgi .save_btn').click(async function() {
        // Get a string base 64 data url
        var croppedImageDataURL = await $canvas_bgi.cropper('getCroppedCanvas').toDataURL("image/png");
        $(".popup_edit_individual_avt_bgi").hide();
        // change base 64 data url into blob
        const base64Response = await fetch(croppedImageDataURL);
        const blob = await base64Response.blob();
        // change blob into file
        var file = new File([blob], "bgi_cropped.png", {lastModified: new Date().getTime(),type: blob.type});
        var form_data = new FormData();
        form_data.append('file', file);
        form_data.append('bgi_id', $("#popup_crop_avt .save_btn").attr("data-bgi_id"));
        
        $.ajax({
            url: "../ajax/update_background.php",
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.result == true){
                    alert("Cập nhật ảnh bìa thành công");
                    window.location.reload();
                    $(".center_cover_img").attr('src', croppedImageDataURL);
                    $(".edit_individual .edit_individuala_cover_img").attr('src', croppedImageDataURL);
                }
            }
        });
    });
    $('#popup_crop_bgi .cancel_btn').click(function() {
        // xóa ảnh đang crop trong khung
        $canvas_bgi.cropper('replace', '');
        $canvas_bgi.cropper("destroy");
        // end xóa ảnh đang crop trong khung
        $("#popup_crop_bgi").hide();
    });
    // bộ lọc bài viết
    $(".btn_filter_post").click(function(){
        $("#popup_filter_post").show();
    });
    // quản lý bài viết
    $(".btn_manager_post").click(function(){
        $("#popup_manager_post").show();
    });
    $("#manager_post_checkall").click(function(){
        $("input.manager_post_checkbox").prop('checked',$("#manager_post_checkall").prop('checked'));
        var manager_post_checkbox = $("input.manager_post_checkbox");
        if ($("#manager_post_checkall").prop('checked') == true){
            $(".popup_manager_post .save_btn").prop('disabled',false);
            $(".manager_post_num_checked").html(manager_post_checkbox.length + "/" + manager_post_checkbox.length);
        }else{
            $(".popup_manager_post .save_btn").prop('disabled',true);
            $(".manager_post_num_checked").html("0/" + manager_post_checkbox.length);
        }
    });
    $("#popup_manager_post .save_btn").click(function(){
        $("#popup_manager_post_action").show();
    });

    
    // sửa giới thiệu
    $(".introduce_new_sidebar_right_txt").click(function(){
        $(".introduce_new_sidebar_right_txt").removeClass("introduce_new_active");
        $(this).addClass("introduce_new_active");
        $(".gr_introduce_box").removeClass("introduce_new_active");
        $(".gr_introduce_box").eq($(this).prevAll(".introduce_new_sidebar_right_txt").length).addClass("introduce_new_active");
    });
    $(".country_select").select2({
        width: "100%"
    });
    $(".select_multi").select2({
        width: "100%"
    });
    // thêm / sửa địa chỉ
    $(".add_info_dclh").click(function(){
        var dob = $(this).parents(".gr_introduce_status").find(".gr_intro_regime span").html();
        if (dob != undefined && dob != ''){
            $("#diachi_lienhe .add_work_input").val(dob);
        }else{
            $("#diachi_lienhe .country_select").val('');
        }
        $("#diachi_lienhe .error").html("");
        // nút set view mode
        $("#diachi_lienhe .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $("#diachi_lienhe .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $("#diachi_lienhe .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $("#diachi_lienhe .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $("#diachi_lienhe .gr_select_regime").click();
        $(".popup_regime").hide();

        $("#diachi_lienhe").show();
    });
    // lưu địa chỉ
    $("#diachi_lienhe .add_work_save").click(function() {
        var flag = true;
        var form_data = new FormData();
        var arr_excepts = [];
        if (flag == true){
            form_data.append('diachi',$("#diachi_lienhe .add_work_input").val());
            form_data.append('view_mode',$("[name=regime_select]:checked").val());
            if ($("[name=regime_select]:checked").val() == 4){
                $.map($(".special .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 4
                    }); 
                });
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if ($("[name=regime_select]:checked").val() == 3){
                $.map($(".except .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 3
                    }); 
                });
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: "../ajax/add_update_city.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        window.location.reload();
                    }
                }
            });
        }
    });
    // thêm / sửa ngôn ngữ
    $(".add_info_language").click(function(){
        var lang = $(this).attr("data-lang");
        if (lang != undefined && lang != ""){
            $("#language #select_lang").val(lang.split(",")).trigger("change");
        }else{
            $("#language #select_lang").val("");
        }
        $("#language .error").html("");
        // nút set view mode
        $("#language .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $("#language .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $("#language .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $("#language .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $("#language .gr_select_regime").click();
        $(".popup_regime").hide();

        $("#language").show();
    });
    // lưu ngôn ngữ
    $("#language .add_work_save").click(function(){
        var flag = true;
        var form_data = new FormData();
        var lang = $("#language #select_lang").val();
        var arr_excepts = [];
        if (flag == true){
            form_data.append('lang',lang);
            form_data.append('view_mode',$("[name=regime_select]:checked").val());
            if ($("[name=regime_select]:checked").val() == 4){
                $.map($(".special .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 4
                    }); 
                });
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if ($("[name=regime_select]:checked").val() == 3){
                $.map($(".except .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 3
                    }); 
                });
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: "../ajax/add_update_city.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        window.location.reload();
                    }
                }
            });
        }
    });
    // thêm / sửa quan điểm tôn giáo
    $(".add_info_religion").click(function(){
        var relig = $(this).parents(".gr_introduce_status").find(".gr_intro_regime span").html();
        var relig_desc = $(this).parents(".gr_introduce_status").find(".gr_intro_regime2").html();
        if (relig != undefined && relig != ""){
            $("#religion .input_religion").val(relig);
            $("#religion .txtarea_religion").val(relig_desc);
        }else{
            $("#religion .input_religion").val("");
            $("#religion .txtarea_religion").val("");
        }
        $("#religion .error").html("");
        // nút set view mode
        $("#religion .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $("#religion .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $("#religion .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $("#religion .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $("#religion .gr_select_regime").click();
        $(".popup_regime").hide();

        $("#religion").show();
    });
    // lưu quan điểm tôn giáo
    $("#religion .add_work_save").click(function(){
        var flag = true;
        var form_data = new FormData();
        var religion = $("#religion .input_religion").val().trim();
        var religion_desc = $("#religion .txtarea_religion").val().trim();
        var arr_excepts = [];
        if (flag == true){
            form_data.append('religion',religion);
            form_data.append('religion_desc',religion_desc);
            form_data.append('view_mode',$("[name=regime_select]:checked").val());
            if ($("[name=regime_select]:checked").val() == 4){
                $.map($(".special .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 4
                    }); 
                });
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if ($("[name=regime_select]:checked").val() == 3){
                $.map($(".except .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 3
                    }); 
                });
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: "../ajax/add_update_city.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        window.location.reload();
                    }
                }
            });
        }
    });
    // thêm / sửa giới tính
    $(".add_info_sex").click(function(){
        var sex = $(this).attr("data-sex");
        if (sex != undefined && sex > 0){
            $("#sex .country_select").val(sex).trigger("change");
        }else{
            $("#sex .country_select").val(1).trigger("change");
        }
        $("#sex .error").html("");
        // nút set view mode
        $("#sex .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_info_basic_detail").find(".gr_select_regime").attr("data-view_mode"));
        $("#sex .gr_select_regime").attr("data-except",$(this).parents(".gr_info_basic_detail").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_info_basic_detail").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_info_basic_detail").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $("#sex .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $("#sex .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $("#sex .gr_select_regime").click();
        $(".popup_regime").hide();

        $("#sex").show();
    });
    // lưu giới tính
    $("#sex .add_work_save").click(function() {
        var flag = true;
        var form_data = new FormData();
        var arr_excepts = [];
        if (flag == true){
            form_data.append('sex',$("#sex .country_select").val());
            form_data.append('view_mode',$("[name=regime_select]:checked").val());
            if ($("[name=regime_select]:checked").val() == 4){
                $.map($(".special .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 4
                    }); 
                });
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if ($("[name=regime_select]:checked").val() == 3){
                $.map($(".except .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 3
                    }); 
                });
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: "../ajax/add_update_city.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        window.location.reload();
                    }
                }
            });
        }
    });
    // thêm / sửa ngày tháng năm sinh
    $(".add_info_dob").click(function(){
        var dob = $(this).attr("data-dob");
        if (dob != undefined && dob != ''){
            $("#dob .add_work_input").val(dob);
        }else{
            $("#dob .country_select").val('');
        }
        $("#dob .error").html("");
        // nút set view mode
        $("#dob .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_info_basic_detail").find(".gr_select_regime").attr("data-view_mode"));
        $("#dob .gr_select_regime").attr("data-except",$(this).parents(".gr_info_basic_detail").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_info_basic_detail").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_info_basic_detail").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $("#dob .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $("#dob .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $("#dob .gr_select_regime").click();
        $(".popup_regime").hide();

        $("#dob").show();
    });
    // lưu ngày tháng năm sinh
    $("#dob .add_work_save").click(function() {
        var flag = true;
        var form_data = new FormData();
        var arr_excepts = [];
        if (flag == true){
            form_data.append('dob',$("#dob .add_work_input").val());
            form_data.append('view_mode',$("[name=regime_select]:checked").val());
            if ($("[name=regime_select]:checked").val() == 4){
                $.map($(".special .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 4
                    }); 
                });
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if ($("[name=regime_select]:checked").val() == 3){
                $.map($(".except .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 3
                    }); 
                });
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: "../ajax/add_update_city.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        window.location.reload();
                    }
                }
            });
        }
    });
    // thêm / sửa tình trạng mối quan hệ
    $(".add_info_relationship").click(function(){
        var city = $(this).attr("data-rela");
        if (city > 0){
            $("#relationship #infor_relative").val(city).trigger("change");
        }else{
            $("#relationship #infor_relative").val(0).trigger("change");
        }
        $("#relationship .error").html("");
        // nút set view mode
        $("#relationship .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $("#relationship .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $("#relationship .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $("#relationship .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $("#relationship .gr_select_regime").click();
        $(".popup_regime").hide();

        $("#relationship").show();
    });
    // lưu tình trạng mối quan hệ
    $("#relationship .add_work_save").click(function(){
        var flag = true;
        var form_data = new FormData();
        var arr_excepts = [];
        if (flag == true){
            form_data.append('relative',$("#relationship #infor_relative").val());
            form_data.append('view_mode',$("[name=regime_select]:checked").val());
            if ($("[name=regime_select]:checked").val() == 4){
                $.map($(".special .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 4
                    }); 
                });
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if ($("[name=regime_select]:checked").val() == 3){
                $.map($(".except .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 3
                    }); 
                });
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: "../ajax/add_update_city.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        window.location.reload();
                    }
                }
            });
        }
    });
    // thêm thành viên gia đình
    $(".add_info_family").click(function(){
        $("#select_user").val(0).trigger("change");
        $("#select_relative").val(0).trigger("change");
        $("#family .error").html("");
        $("#family .add_work_save").attr("data-id",0);
        // nút set view mode
        $("#family .gr_select_regime").attr("data-view_mode",0);
        $("#family .gr_select_regime").attr("data-except","");
        var icon = "../img/cong-khai-icon.svg";
        var txt = "Công khai";
        $("#family .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        // popup set view mode
        $("#family .gr_select_regime").click();
        $(".popup_regime").hide();
        $("#family").show();
    });
    // sửa thành viên gia đình
    $(".edit_info_family").click(function(){
        var id = $(this).attr("data-id");
        if (id > 0){
            $("#family .add_work_save").attr("data-id",id);
            $("#family .error").html("");
            // nút set view mode
            $("#family .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_info_basic_detail").find(".gr_select_regime").attr("data-view_mode"));
            $("#family .gr_select_regime").attr("data-except",$(this).parents(".gr_info_basic_detail").find(".gr_select_regime").attr("data-except"));
            var icon = $(this).parents(".gr_info_basic_detail").find(".gr_select_regime_img").attr("src");
            var txt = $(this).parents(".gr_info_basic_detail").find(".gr_select_regime").text().trim();
            $("#family .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
            // popup set view mode
            $("#family .gr_select_regime").click();
            $(".popup_regime").hide();

            $("#family #select_user").val($(this).attr("data-mem")).trigger("change");
            $("#family #select_relative").val($(this).attr("data-relative")).trigger("change");
            $("#family").show();
        }
    });
    // lưu thành viên gia đình
    $("#family .add_work_save").click(function(){
        var flag = true;
        var form_data = new FormData();
        var select_user = $("#family #select_user").val();
        if (select_user == 0){
            $("#family #select_user").nextAll(".error").html("Không để trống trường này");
            flag = false;
        }else{
            $("#family #select_user").nextAll(".error").html("");
        }
        var select_relative = $("#family #select_relative").val();
        if (select_relative == 0){
            $("#family #select_relative").nextAll(".error").html("Không để trống trường này");
            flag = false;
        }else{
            $("#family #select_relative").nextAll(".error").html("");
        }
        if (flag == true){
            form_data.append('select_user',select_user);
            form_data.append('select_relative',select_relative);
            form_data.append('id',$(this).attr("data-id"));
            form_data.append('view_mode',$("[name=regime_select]:checked").val());
            var arr_excepts = [];
            if ($("[name=regime_select]:checked").val() == 4){
                $.map($(".special .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365')
                    }); 
                });
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if ($("[name=regime_select]:checked").val() == 3){
                $.map($(".except .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365')
                    }); 
                });
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: "../ajax/add_update_family.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        window.location.reload();
                    }
                }
            });
        }
    });
    $(".popup_edit_work").click(function() {
        $(".add_work").show();
    });
    $(".del_infor_family").click(function(){
        openpoup_delinfor(`Xóa thành viên trong gia đình`,
            `Bạn có chắc chắn muốn xóa thành viên khỏi trang cá nhân của mình không?`);

        var id = $(this).attr("data-id");
        $(".delete_work_del").click(function() {
            $.ajax({
                url: "../ajax/delete_work_place.php",
                type: 'POST',
                dataType: 'json',
                data: {
                    id_mem: id,
                },
                success: function(data){
                    if (data.result == true){
                        popup_sucess(`Xóa thành viên trong gia đình thành công`);
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    }
                }
            });            
        });
    });
    $(".del_infor_school").click(function(){
        openpoup_delinfor(`Xóa trường học`,
            `Bạn có chắc chắn muốn xóa trường học khỏi trang cá nhân của mình không?`);
            var id = $(this).attr("data-id");
        $(".delete_work_del").click(function() {
            $.ajax({
                url: "../ajax/delete_work_place.php",
                type: 'POST',
                dataType: 'json',
                data: {
                    id_school: id,
                },
                success: function(data){
                    if (data.result == true){
                        popup_sucess(`Xóa trường học thành công!`);
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    }
                }
            });            
        });
    });

    // sửa ảnh
    $(".gr_video_header .gr_album_header_image").click(function(){
        $(".gr_album_header .gr_album_header_title").eq(0).click();
    });
    $(".gr_video_header .gr_album_header_album").click(function(){
        $(".gr_album_header .gr_album_header_title").eq(2).click();
    });
    $(".gral_set_avt").click(function(){
        var el = $(this).parents(".gr_album_body_img").find(".gr_album_body_link_img");
        $("#popup_crop_avt").show();
        $canvas_avt.cropper('destroy').attr('src', el.attr("src")).cropper(options_avt);
    });
    $(".gral_set_bgi").click(function(){
        var el = $(this).parents(".gr_album_body_img").find(".gr_album_body_link_img");
        $("#popup_crop_bgi").show();
        $canvas_bgi.cropper('destroy').attr('src', el.attr("src")).cropper(options_bgi);
    });

    // sửa nhóm
    $(".send_via_chat365").click(function(){
        $("#popup_send_via_chat365").show();
    });
    $(".a-friend-btn").click(function(){
        $(this).css({
            'background': '#FFFFFF',
            'border': '1px solid #4C5BD4'
        }).html("Đã gửi");
    });

    $(document).on('input',function(e){
        if ($(e.target).hasClass("popup_item_so_thich_input")){
            check_rest_char(e.target,25,$(e.target).parents(".popup_item_so_thich").find(".so_thich_rest_char_num"));
        }
    });
    $(document).on('click',function(e){
        var el = $(e.target);

        if (el.hasClass("modal") == true) {
            $(el).hide();
        }

        if (el.hasClass("popup_avt_bst") == true) {
            $("#popup_edit_bst").show();
        }

        if (el.attr("name") == "bst_avt_radio") {
            $("#popup_avt_bst_preview_avt").attr('src',$(el).next('label').find('img').attr('src'));
        }

        if (el.hasClass("popup_edit_bst_checkbox") == true) {
            var popup_edit_bst_checkbox = $(".popup_edit_bst_checkbox:checked");
            // nếu đã bỏ chọn hết 
            if (popup_edit_bst_checkbox.length == 0){
                $(".popup_edit_bst .save_btn").prop('disabled',true);
            }else{
                $(".popup_edit_bst .save_btn").prop('disabled',false);
                if ($(el).next('label').find('img').attr('src') == $("#popup_edit_bst_avt").attr('src')){
                    $("#popup_edit_bst_avt").attr('src',$(popup_edit_bst_checkbox[0]).next('label').find('img').attr('src'));
                    // $("#popup_avt_bst_preview_avt").attr('src',$(popup_edit_bst_checkbox[0]).next('label').find('img').attr('src'));
                }
            }
        }

        if (el.hasClass("popup_bst_checkbox") == true) {
            check_disabled_save_btn($(".popup_nd_bst .popup_bst_checkbox:checked"),$(".popup_nd_bst .save_btn"));
        }

        if (el.hasClass("manager_post_checkbox") == true) {
            var manager_post_checked = $("input.manager_post_checkbox:checked");
            var manager_post_checkbox = $("input.manager_post_checkbox");
            $(".manager_post_num_checked").html(manager_post_checked.length + "/" + manager_post_checkbox.length);
            if (manager_post_checked.length == 0){
                // nếu bỏ chọn hết 
                $("#manager_post_checkall").prop('checked',false);
                $(".popup_manager_post .save_btn").prop('disabled',true);
            }else{
                $(".popup_manager_post .save_btn").prop('disabled',false);

                if (manager_post_checked.length == manager_post_checkbox.length){
                    // nếu chọn hết
                    $("#manager_post_checkall").prop('checked',true);
                }else{
                    $("#manager_post_checkall").prop('checked',false);
                }
            }
        }
    });
    $("[data-dimiss=modal]").click(function(e){
        var el = $(this).parents(".modal");

        if (el.hasClass("popup_avt_bst") == true) {
            $("#popup_edit_bst").show();
        }
    });
    // thêm / sửa bộ sưu tập
    $(".popup_edit_bst .save_btn").click(function(){
        var form_data = new FormData();
        $(".popup_nd_bst .popup_bst_list_upload_img .popup_bst_checkbox").each(function(index){
            if ($(this).prop("checked") == true){
                form_data.append('upload_img[]',uploadImgCol[index]);
            }
        });
        $.ajax({
            url: "../ajax/add_update_collection.php",
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if (data.result == true){
                    
                }
            }
        });
    });
    // thêm nơi làm việc
    $(".popup_add_work").click(function() {
        $(".add_work .add_work_input").val("");
        $(".add_work .error").html("");
        $(".add_work .add_work_save").attr("data-id",0);
        $(".add_work .add_work_checkbox_input").prop("checked",false);
        // nút set view mode
        $(".add_work .gr_select_regime").attr("data-view_mode",0);
        $(".add_work .gr_select_regime").attr("data-except","");
        var icon = "../img/cong-khai-icon.svg";
        var txt = "Công khai";
        $(".add_work .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        // popup set view mode
        $(".add_work .gr_select_regime").click();
        $(".popup_regime").hide();
    });
    // sửa nơi làm việc
    $(".popup_edit_work").click(function() {
        // nút set view mode
        $(".add_work .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $(".add_work .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        $(".add_work .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        // popup set view mode
        $(".add_work .gr_select_regime").click();
        $(".popup_regime").hide();
        // data
        $(".add_work .add_work_input_1").val($(this).parents(".gr_introduce_status").find(".gr_intro_regime span").html());
        $(".add_work .add_work_input_2").val($(this).attr("data-po"));
        $(".add_work .add_work_input_3").val($(this).attr("data-dc"));
        if ($(this).attr("data-at") == 1){
            $(".add_work .add_work_checkbox_input").prop("checked",true);
        }else{
            $(".add_work .add_work_checkbox_input").prop("checked",false);
        }
        $(".add_work .error").html("");
        $(".add_work .add_work_save").attr("data-id",$(this).attr("data-id"));
    });
    // lưu nơi làm việc
    $(".add_work .add_work_save").click(function() {
        var flag = true;
        var form_data = new FormData();
        var cty = $(".add_work .add_work_input_1").val().trim();
        if (cty == ""){
            $(".add_work .add_work_input_1").next(".error").html("Không để trống trường này");
            flag = false;
        }else{
            $(".add_work .add_work_input_1").next(".error").html("");
        }
        var vtr = $(".add_work .add_work_input_2").val().trim();
        if (vtr == ""){
            $(".add_work .add_work_input_2").next(".error").html("Không để trống trường này");
            flag = false;
        }else{
            $(".add_work .add_work_input_2").next(".error").html("");
        }
        var dch = $(".add_work .add_work_input_3").val().trim();
        if (dch == ""){
            $(".add_work .add_work_input_3").next(".error").html("Không để trống trường này");
            flag = false;
        }else{
            $(".add_work .add_work_input_3").next(".error").html("");
        }
        if (flag == true){
            form_data.append('cty',cty);
            form_data.append('vtr',vtr);
            form_data.append('dch',dch);
            form_data.append('wat',($(".add_work .add_work_checkbox_input").prop("checked")==true)?1:0);
            form_data.append('id',$(this).attr("data-id"));
            form_data.append('view_mode',$("[name=regime_select]:checked").val());
            var arr_excepts = [];
            if ($("[name=regime_select]:checked").val() == 4){
                $.map($(".special .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365')
                    }); 
                });
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if ($("[name=regime_select]:checked").val() == 3){
                $.map($(".except .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365')
                    }); 
                });
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: "../ajax/add_update_work_place.php",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.result == true){
                        window.location.reload();
                    }
                }
            });
        }
    });
});
function check_rest_char(el,max_char,txt){
    var val = $.trim($(el).val());
    if (val.length > max_char){
        $(el).val(val.substring(0, max_char));
    }
    val = $.trim($(el).val());
    $(txt).html(max_char - val.length);
}
function check_disabled_save_btn(list,save_btn){
    if (list.length == 0){
        $(save_btn).prop('disabled',true);
        return true;
    }else{
        $(save_btn).prop('disabled',false);
        return false;
    }
}
var x = 0;
function uploadImg(el) {
    var file_data = $(el)[0].files;
    var match = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];

    for (var i = 0; i < Number(file_data.length); i++) {
        x++;
        var file = file_data[i];
        var file_size = file.size;
        var file_type = file.type;
        var convert_file_size = (file_size / (1024 * 1024)).toFixed(2);
        if ($.inArray(file_type, match) != -1) {
            var image = new Image();
            image.src = URL.createObjectURL(file);
            
            var html = `<input hidden type="checkbox" name="" id="upload_img_checkbox_`+ x +`" class="popup_bst_checkbox" checked>
            <label for="upload_img_checkbox_`+ x +`">
                <div class="v_story_detail">
                    <img class="v_story_detail_img" src="`+ URL.createObjectURL(file) +`" alt="Ảnh lỗi">
                    <div class="check_circle"></div>
                </div>
            </label>`;
            $(".popup_bst_list_upload_img").prepend(html);
            $(".popup_bst_list_upload_img").css('display','flex');
            $(".popup_bst_list_upload_img_txt").css('display','block');
            uploadImgCol.push(file);
        } else {
            alert("Ảnh " + file.name + " sai định dạng ảnh vui lòng chọn ảnh hợp lệ có định dạng: png, jpg, jpeg, gif, jfif ");
            break;
        }
    }
    check_disabled_save_btn($(".popup_nd_bst .popup_bst_checkbox:checked"),$(".popup_nd_bst .save_btn"));
}
function uploadAvt(el) {
    var match = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];

    x++;
    var file = $(el)[0].files[0];
    var file_size = file.size;
    var file_type = file.type;
    var convert_file_size = (file_size / (1024 * 1024)).toFixed(2);
    if ($.inArray(file_type, match) != -1) {
        var image = new Image();
        image.src = URL.createObjectURL(file);
        
        var html = `<input hidden type="radio" name="bst_avt_radio" id="bst_upload_avt_radio_`+ x +`" class="popup_bst_upload_avt_radio" checked>
        <label for="bst_upload_avt_radio_`+ x +`" class="popup_bst_upload_avt_radio">
            <div class="v_story_detail">
                <img class="v_story_detail_img" src="`+ URL.createObjectURL(file) +`" alt="Ảnh lỗi">
                <div class="check_circle"></div>
            </div>
        </label>`;
        $(el).after(html);
        $("#popup_avt_bst_preview_avt").attr('src',URL.createObjectURL(file));
    } else {
        alert("Ảnh " + file.name + " sai định dạng ảnh vui lòng chọn ảnh hợp lệ có định dạng: png, jpg, jpeg, gif, jfif ");
    }
}
function edit_individual_uploadAvtBgi(el) {
    var match = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];
    if (el.files && el.files[0]) {
        var file = $(el)[0].files[0];
        var file_size = file.size;
        var file_type = file.type;
        var convert_file_size = (file_size / (1024 * 1024)).toFixed(2);
        if ($.inArray(file_type, match) != -1) {
            if ($("#popup_edit_individual_avt_bgi").data("edit") == "avt"){
                $("#popup_crop_avt").show();
                
                if (uploadedImageURL) {
                    URL.revokeObjectURL(uploadedImageURL);
                }
                uploadedImageURL = URL.createObjectURL(file);
                $canvas_avt.cropper('destroy').attr('src', uploadedImageURL).cropper(options_avt);

            }else if ($("#popup_edit_individual_avt_bgi").data("edit") == "bgi"){
                $("#popup_crop_bgi").show();

                if (uploadedImageURL) {
                    URL.revokeObjectURL(uploadedImageURL);
                }
                uploadedImageURL = URL.createObjectURL(file);
                $canvas_bgi.cropper('destroy').attr('src', uploadedImageURL).cropper(options_bgi);
            }
        } else {
            alert("Ảnh " + file.name + " sai định dạng ảnh vui lòng chọn ảnh hợp lệ có định dạng: png, jpg, jpeg, gif, jfif ");
        }
    }
}
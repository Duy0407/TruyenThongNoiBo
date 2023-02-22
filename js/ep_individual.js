$(document).ready(function() {
    $(".gr_select_regime").click(function() {
        $(".popup_regime").data("fill",this);
        var view_mode = ($(this).attr("data-view_mode")>=0)?$(this).attr("data-view_mode"):0;
        $(".popup_regime [name=regime_select][value="+view_mode+"]").prop("checked",true);
        $(".special .except_detail_box_item_del").each(function(index){
            $(this).click();
        });
        $(".except .except_detail_box_item_del2").each(function(index){
            $(this).click();
        });
        $(".popup_regime .list_friends_except").html("");
        var except = $(this).attr("data-except");
        if (except != undefined && except != ""){
            except = except.split(',');
            if (except.length > 0){
                if (view_mode == 4){
                    for (let index = 0; index < except.length; index++) {
                        $(".special .except_info_user2[data-id="+except[index]+"]").click();
                    }
                    $(".special .except_save").click();
                }else if (view_mode == 3){
                    for (let index = 0; index < except.length; index++) {
                        $(".except .except_checkbox[value="+except[index]+"]:not(:checked)").click();
                    }
                    $(".except .except_save").click();
                }
            }
        }
        $(".popup_regime").show();
    });
    $(".gr_intro_seemore").click(function() {
        $(".popup_edit_intro").hide();
        $(this).next(".popup_edit_intro").show();
    });
    $(".gr_member_title").click(function() {
        $(".center_public_body_active .gr_member_title").css({
            'color': '#666666',
            'border-bottom': 'none'
        });
        $(this).css({
            'color': '#4C5BD4',
            'border-bottom': '2px solid rgb(76, 91, 212)'
        });
        $(".center_public_body_active .gr_friend_list_item").removeClass("gr_friend_list_item_active");
        $(".center_public_body_active .gr_friend_list_item").eq($(this).prevAll(".gr_member_title").length).addClass("gr_friend_list_item_active");
    });
    // $(".gr_friend_add_new").click(function() {
    //     $(this).css({
    //         'color': '#4C5BD4'
    //     });
    //     $(".gr_friend_all").css({
    //         'color': '#666666'
    //     });
    //     $(".gr_all_friend").hide();
    //     $(".gr_add_friend_new").css({
    //         'display': 'flex'
    //     });
    // });
    $(".ep_individual_regime_btn").click(function(){
        $(".popup_regime").show();
        $(".popup_regime").data("fill",this);
    });
    $(".center_nav_regime").click(function(){
        $(".ep_individual_regime").css({
            'display': 'flex'
        });
    });
    $(".ep_individual_regime_turnoff").click(function(){
        $(".ep_individual_regime").hide();
    });
    $(".popup_btn_cancel_fr").click(function() {
        if ($(this).hasClass("edit_fr_item")){
            $(".unfriend").show();
            $(".unfriend .unfriend_success").attr("data-id_chat",$(this).parents(".gr_friend_item").attr("data-id_chat"));
            $(".unfriend .unfriend_title").html("Bạn có chắc chắn muốn xóa " + $(this).parents(".gr_friend_item").find(".gr_friend_name").html() + " khỏi danh sách bạn bè không?");
        }else{
            $(".unfriend").show();
            $(".unfriend .unfriend_success").attr("data-id_chat",$(this).attr("data-id_chat"));
            $(".unfriend .unfriend_title").html("Bạn có chắc chắn muốn xóa " + $(".center_avt_name").html() + " khỏi danh sách bạn bè không?");
        }
    });
    // hủy kết bạn
    $(".unfriend .unfriend_success").click(function(){
        var your_id = $(this).attr("data-id_chat");
        var form_data = new FormData;
        form_data.append("unfriend_id",your_id);
        $.ajax({
            url: '../ajax/unfriend.php',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.result == true){
                    location.reload();
                }else{
                    $(".unfriend").hide();
                    alert(data.msg);
                }
            }
        });
    });
    $(".center_nav_group").click(function() {
        $(".center_nav_deatail").css({
            'borderBottom': 'none',
            'color': '#666666'
        });
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });
        $(".group_public_post").hide();
        $(".gr_album").hide();
        $(".gr_introduce").hide();
        $(".gr_member").hide();
        $(".archives_news").hide();
        $(".group").show();
    });
    $(".who_see_new_detail").click(function() {
        $(this).find(".radio_who").prop("checked", true);
    });
    $(".turnoff_edit_individual,.edit_work_cancel").click(function(){
        $(".edit_individual").hide();
    });
    $(".center_avt_join2").click(function(){
        $(".edit_individual").show();
    });
    $(".popup_archives_body_btn").click(function() {
        $(".popup_archives_body_btn").css({
            'color': '#999999',
            'border': 'none'
        })
        var index = $(this).index();
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });
        $(".popup_archives_body_detail").hide();
        $(".popup_archives_body_detail").eq(index).show();
    });
    $(".show_popup_block").click(function(){
        var ele = $(this).parents(".gr_friend_item");
        $(".block .block_success").attr("onclick","block(" + ele.attr("data-id_chat") + "," + ele.attr("data-id365") + "," + ele.attr("data-type365") + ")");
        $(".block .block_body_title").html("Bạn có chắc muốn chặn " + $(this).parents(".gr_friend_item").find(".gr_friend_name").html() + "?");
        var name = $(this).parents(".gr_friend_item").find(".gr_friend_name").html().split(/\s+/);
        name = name[name.length - 1];
        $(".block .block_body_title2").eq(0).html(name + " sẽ không thể:");
        $(".block .block_body_title2").eq(1).html("");
        $(".block .block_header").html(`Chặn ` + $(this).parents(".gr_friend_item").find(".gr_friend_name").html() + `
                <img class="turnoff_block" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">`);
        $(".block").show();
    });
    $(".gr_friend_btn").click(function() {
        var el = $(this).parents(".gr_friend_item");

        if (el.find(".edit_fr").css("display") == "block") {
            el.find(".edit_fr").hide();
        } else {
            $(".edit_fr").hide();
            el.find(".edit_fr").show();
        }
    });
    $(".gr_gr_btn").click(function() {
        if ($(this).next(".edit_fr").css("display") == "block") {
            $(this).next(".edit_fr").hide();
        } else {
            $(".edit_fr").hide();
            $(this).next(".edit_fr").show();
        }
    });
    $(".turnoff_add_work").click(function() {
        $(".add_work").hide();
    });
    $(".delete_work_cancel").click(function() {
        $(".delete_work2").hide();
    });
    $(".popup_delete_work").click(function() {
        openpoup_delinfor(`Xóa nơi làm việc`,
            `Bạn có chắc chắn muốn xóa nơi làm việc này khỏi trang cá nhân của mình không?`);
        var id = $(this).attr("data-id");
        $(".delete_work_del").click(function() {
            $.ajax({
                url: "../ajax/delete_work_place.php",
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function(data){
                    if (data.result == true){
                        popup_sucess(`Bạn đã xóa thành công nơi làm việc!`);
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    }
                }
            });            
        });
    });
    $(".archives_news_setting").click(function() {
        $(".popup_archives").show();
    });
    $(".center_nav_see_more_archives").click(function() {
        $(this).parents(".center_nav_see_more").hide();
        $(".group_public_post").hide();
        $(".gr_album").hide();
        $(".gr_introduce").hide();
        $(".gr_member").hide();
        $(".group").hide();
        $(".archives_news").show();
    });
    $(".turnoff_popup_add_school").click(function() {
        $(".add_school").hide();
    });
    // sửa trường học
    $(".popup_edit_school").click(function() {
        var id = $(this).attr("data-id");
        if (id > 0){
            $(".add_school .error").html("");
            // nút set view mode
            $(".add_school .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
            $(".add_school .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
            var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
            var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
            $(".add_school .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
            // popup set view mode
            $(".add_school .gr_select_regime").click();
            $(".popup_regime").hide();
            $.ajax({
                url: "../ajax/detail_school.php",
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function(data){
                    if (data.result == true){
                        $(".add_school .add_school_input_1").val(data.data.school_name);
                        $(".add_school .add_school_input_2").val(data.data.major);
                        $(".add_school .add_school_time_fr").val(data.data.time_start);
                        $(".add_school .add_school_time_to").val(data.data.time_end);
                        $(".add_school .add_school_save").attr("data-id",id);
                        if (data.data.graduated == 1){
                            $(".add_school .add_school_item_checkbox").prop("checked",true);
                        }else{
                            $(".add_school .add_school_item_checkbox").prop("checked",false);
                        }
                        $(".add_school").show();
                    }
                }
            });
        }
    });
    // thêm trường học
    $(".popup_edit_add_school").click(function() {
        $(".add_school .add_school_input").val("");
        $(".add_school .add_school_time").val(0);
        $(".add_school .error").html("");
        $(".add_school .add_school_save").attr("data-id",0);
        $(".add_school .add_school_item_checkbox").prop("checked",false);
        // nút set view mode
        $(".add_school .gr_select_regime").attr("data-view_mode",0);
        $(".add_school .gr_select_regime").attr("data-except","");
        var icon = "../img/cong-khai-icon.svg";
        var txt = "Công khai";
        $(".add_school .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        // popup set view mode
        $(".add_school .gr_select_regime").click();
        $(".popup_regime").hide();
        $(".add_school").show();
    });
    // lưu trường học
    $(".add_school .add_school_save").click(function(){
        var flag = true;
        var form_data = new FormData();
        var school_name = $(".add_school .add_school_input_1").val().trim();
        if (school_name == ""){
            $(".add_school .add_school_input_1").next(".error").html("Không để trống trường này");
            flag = false;
        }else{
            $(".add_school .add_school_input_1").next(".error").html("");
        }
        var start = $(".add_school .add_school_time_fr").val();
        var end = $(".add_school .add_school_time_to").val();
        if (start == ""){
            $(".add_school .add_school_time_to").next(".error").html("Không để trống trường này");
            flag = false;
        }else if (end == ""){
            $(".add_school .add_school_time_to").next(".error").html("Không để trống trường này");
            flag = false;
        }else{
            var start_date = new Date(start).getTime();
            var end_date = new Date(end).getTime();
            if (start_date > end_date){
                $(".add_school .add_school_time_to").next(".error").html("Ngày bắt đầu phải nhỏ hơn ngày kết thúc");
                flag = false;
            }else{
                $(".add_school .add_school_time_to").next(".error").html("");
            }
        }
        if (flag == true){
            form_data.append('school_name',school_name);
            form_data.append('start',start);
            form_data.append('end',end);
            form_data.append('major',$(".add_school .add_school_input_2").val().trim());
            form_data.append('graduated',($(".add_school .add_school_item_checkbox").prop("checked")==true)?1:0);
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
                url: "../ajax/add_update_school.php",
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
    $(".turnoff_country,.country_cancel").click(function() {
        $(".country").hide();
    });
    // thêm / sửa quê quán
    $(".popup_edit_intro_country").click(function() {
        $(".country_select").select2({width:"100%"});
        var city = $(this).attr("data-ht");
        if (city > 0){
            $(".country #infor_home_town").val(city).trigger("change");
        }else{
            $(".country #infor_home_town").val(0).trigger("change");
        }
        $(".country .error").html("");
        // nút set view mode
        $(".country .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $(".country .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $(".country .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $(".country .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $(".country .gr_select_regime").click();
        $(".popup_regime").hide();

        $(".country").show();
    });
    // lưu quê quán
    $(".country .country_save").click(function(){
        var flag = true;
        var form_data = new FormData();
        var arr_excepts = [];
        if (flag == true){
            form_data.append('home_town',$(".country #infor_home_town").val());
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
                beforeSend: function() {
                    $(".post_new_btn_submit").prop("disabled",true).html('<img class="loading_handle" src="../img/loading.gif">');
                },
                success: function(data){
                    if (data.result == true){
                        window.location.reload();
                    }
                }
            });
        }
    });
    // thêm / sửa thành phố
    $(".popup_edit_intro_city").click(function() {
        $(".city .modal_header_title").html("Thêm thành phố hiện tại");
        $(".country_select").select2({width:"100%"});
        var city = $(this).attr("data-city");
        if (city > 0){
            $(".city #infor_city").val(city).trigger("change");
        }else{
            $(".city #infor_city").val(0).trigger("change");
        }
        $(".city .error").html("");
        // nút set view mode
        $(".city .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $(".city .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $(".city .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $(".city .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $(".city .gr_select_regime").click();
        $(".popup_regime").hide();
        $(".city").show();
    });
    // lưu thành phố
    $(".city .country_save").click(function(){
        var flag = true;
        var form_data = new FormData();
        var arr_excepts = [];
        if (flag == true){
            form_data.append('city',$(".city #infor_city").val());
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
    $(".phone_input").keypress(function(e) {
        var num = String.fromCharCode(e.which);
        if (!(/[0-9]/.test(num))) {
            e.preventDefault();
        }
    });
    // thêm / sửa số điện thoại
    $(".popup_edit_intro_phone").click(function() {
        var phone = $(this).parents(".gr_introduce_status").find(".gr_intro_regime span").html();
        if (phone != undefined){
            $(".phone .phone_input").val(phone);
        }else{
            $(".phone .phone_input").val("");
        }
        $(".phone .error").html("");
        // nút set view mode
        $(".phone .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $(".phone .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $(".phone .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $(".phone .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $(".phone .gr_select_regime").click();
        $(".popup_regime").hide();

        $(".phone").show();
    });
    // lưu số điện thoại
    $(".phone .country_save").click(function() {
        var flag = true;
        var form_data = new FormData();
        var arr_excepts = [];
        if (flag == true){
            form_data.append('phone',$(".phone .phone_input").val());
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
    $(".turnoff_phone,.phone_cancel").click(function() {
        $(".phone").hide();
    });
    $(".popup_edit_del_phone").click(function() {
        $(".delete_work2").show();
        $(".delete_work_header").text("Xóa số điện thoại");
        $(".delete_work_title").text("Bạn có chắc chắn muốn xóa số điện thoại khỏi trang cá nhân của mình không?");
    });
    $(".turnoff_intro, .intro_cancel").click(function() {
        $(".gioi-thieu-ban-than").hide();
    });
    // thêm / sửa giới thiệu bản thân
    $(".gr_intro_edit_intro").click(function() {
        var intro = $(this).parents(".gr_introduce_status").find(".gr_intro_regime span").html();
        if (intro != undefined){
            $(".gioi-thieu-ban-than .intro_input").val(intro);
        }else{
            $(".gioi-thieu-ban-than .intro_input").val("");
        }
        $(".gioi-thieu-ban-than .error").html("");
        // nút set view mode
        $(".gioi-thieu-ban-than .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $(".gioi-thieu-ban-than .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $(".gioi-thieu-ban-than .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $(".gioi-thieu-ban-than .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $(".gioi-thieu-ban-than .gr_select_regime").click();
        $(".popup_regime").hide();

        $(".gioi-thieu-ban-than").show();
    });
    // lưu giới thiệu bản thân
    $(".gioi-thieu-ban-than .country_save").click(function() {
        var flag = true;
        var form_data = new FormData();
        var intro = $(".gioi-thieu-ban-than .intro_input").val().trim();
        var arr_excepts = [];
        if (intro == ""){
            $(".gioi-thieu-ban-than .intro_input").nextAll(".error").html("Không để trống trường này");
            flag = false;
        }else{
            $(".gioi-thieu-ban-than .intro_input").nextAll(".error").html("");
        }
        if (flag == true){
            form_data.append('intro',intro);
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
    $(".turnoff_add_nickname, .add_nickname_cancel").click(function() {
        $(".add_nickname").hide();
    });
    // thêm / sửa biệt danh
    $(".create_nickname").click(function() {
        var intro = $(this).parents(".gr_introduce_status").find(".gr_intro_regime span").html();
        if (intro != undefined){
            $(".add_nickname .intro_input").val(intro);
        }else{
            $(".add_nickname .intro_input").val("");
        }
        $(".add_nickname .error").html("");
        // nút set view mode
        $(".add_nickname .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $(".add_nickname .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $(".add_nickname .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $(".add_nickname .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $(".add_nickname .gr_select_regime").click();
        $(".popup_regime").hide();

        $(".add_nickname").show();
    });
    // lưu biệt danh
    $(".add_nickname .country_save").click(function() {
        var flag = true;
        var form_data = new FormData();
        var nickname = $(".add_nickname .intro_input").val().trim();
        var arr_excepts = [];
        if (nickname == ""){
            $(".add_nickname .intro_input").nextAll(".error").html("Không để trống trường này");
            flag = false;
        }else{
            $(".add_nickname .intro_input").nextAll(".error").html("");
        }
        if (flag == true){
            form_data.append('nickname',nickname);
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
    $(".quote_cancel, .turnoff_quote").click(function() {
        $(".qoute").hide();
    });
    // thêm / sửa trích dẫn
    $(".create_quote").click(function() {
        var quote = $(this).parents(".gr_introduce_status").find(".gr_intro_regime span").html();
        if (quote != undefined){
            $(".quote .intro_input").val(quote);
        }else{
            $(".quote .intro_input").val("");
        }
        $(".quote .error").html("");
        // nút set view mode
        $(".quote .gr_select_regime").attr("data-view_mode",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-view_mode"));
        $(".quote .gr_select_regime").attr("data-except",$(this).parents(".gr_introduce_status").find(".gr_select_regime").attr("data-except"));
        var icon = $(this).parents(".gr_introduce_status").find(".gr_select_regime_img").attr("src");
        var txt = $(this).parents(".gr_introduce_status").find(".gr_select_regime").text().trim();
        if (icon != undefined && txt != undefined){
            $(".quote .gr_select_regime").html(`<img class="gr_select_regime_img" src="`+icon+`" alt="Ảnh lỗi">`+txt+`<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }else{
            $(".quote .gr_select_regime").html(`<img class="gr_select_regime_img" src="../img/cong-khai-icon.svg" alt="Ảnh lỗi">Công khai<img class="gr_select_regime_dropdown" src="../img/xo-xuong.svg" alt="Ảnh lỗi">`);
        }
        // popup set view mode
        $(".quote .gr_select_regime").click();
        $(".popup_regime").hide();

        $(".quote").show();
    });
    // lưu trích dẫn
    $(".quote .country_save").click(function() {
        var flag = true;
        var form_data = new FormData();
        var quote = $(".quote .intro_input").val().trim();
        var arr_excepts = [];
        if (quote == ""){
            $(".quote .intro_input").nextAll(".error").html("Không để trống trường này");
            flag = false;
        }else{
            $(".quote .intro_input").nextAll(".error").html("");
        }
        if (flag == true){
            form_data.append('quote',quote);
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
    $(".turnoff_quote, turnoff_cancel").click(function() {
        $(".quote").hide();
    });
    $(".gr_introduce_detail").click(function() {
        $(this).css({
            'color': '#4C5BD4'
        });
        $(".gr_introduce_title2").css({
            'color': '#666666'
        });
        $(".gr_introduce_box_body").hide();
        $(".gr_introduce_box_detail").show();
    });
    $(".gr_introduce_title2").click(function() {
        $(this).css({
            'color': '#4C5BD4'
        });
        $(".gr_introduce_detail").css({
            'color': '#666666'
        });
        $(".gr_introduce_box_body").show();
        $(".gr_introduce_box_detail").hide();
    });
    $(".btn_add_fr").click(function() {
        if ($(this).text().trim() == "Thêm bạn bè") {
            html = `<img src="../img/huy-loi-moi.svg" class="btn_add_fr_icon" alt="Ảnh lỗi"> Hủy lời mời`;
            $(this).html(html);
        } else {
            html = `<img class="btn_add_fr_icon" src="../img/them-ban-be.svg" alt="Ảnh lỗi">Thêm bạn bè`;
            $(this).html(html);
        }
    });
    $(".btn_fr").click(function() {
        $(this).next().show();
    });
    $(".popup_btn_fr_unflow").click(function() {
        if ($(this).find(".popup_btn_title").text().trim() == "Bỏ theo dõi") {
            $(this).find(".popup_btn_title").text("Theo dõi");
        } else {
            $(this).find(".popup_btn_title").text("Bỏ theo dõi");
        }
    });
    $(".turnoff_unfriend,.unfriend_cancel").click(function(){
        $(".unfriend").hide();
    });
    $(".turnoff_block,.block_cancel").click(function(){
        $(".block").hide();
    });
    $(".center_nav_search").click(function(){
        $(".search_indi").show();
    });
    $(".turnoff_search_indi").click(function(){
        $(".search_indi").hide();
    });
    $(".nv_share_group").click(function(){
        $(this).parents(".edit_fr").slideUp();
        $(this).parents(".edit_fr").next().slideDown();
    });
    $(document).mouseup(function(e) {
        var container = $(".popup_edit_intro");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
        var container = $(".popup_btn_fr");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });
    $(document).click(function(e) {
        if (e.target.className == "add_work") {
            $(".add_work").hide();
        }

        if (e.target.className == "delete_work") {
            $(".delete_work").hide();
        }

        if (e.target.className == "popup_archives") {
            $(".popup_archives").hide();
        }

        if (e.target.className == "add_school") {
            $(".add_school").hide();
        }

        if (e.target.className == "country") {
            $(".country").hide();
        }

        if (e.target.className == "phone") {
            $(".phone").hide();
        }

        if (e.target.className == "delete_work2") {
            $(".delete_work2").hide();
        }

        if (e.target.className == "gioi-thieu-ban-than") {
            $(".gioi-thieu-ban-than").hide();
        }

        if (e.target.className == "add_nickname") {
            $(".add_nickname").hide();
        }

        if (e.target.className == "quote") {
            $(".quote").hide();
        }
        
        if (e.target.className == "edit_individual") {
            $(".edit_individual").hide();
        }

        if (e.target.className == "unfriend") {
            $(".unfriend").hide();
        }

        if (e.target.className == "block") {
            $(".block").hide();
        }

        if (e.target.className == "search_indi") {
            $(".search_indi").hide();
        }
    });
});

function openpoup_delinfor(title='Xóa', txt='Bạn chắc chắn muốn xóa'){
    $(".delete_work2").show();
    $(".delete_work_header").text(title);
    $(".delete_work_title").text(txt);
}

function popup_sucess(yestxt='Xóa thành công'){
    $(".delete_work2").hide();
    $(".popup_sucess").show();
    $(".popup_sucess_title").text(yestxt);
}

function block(id_chat,id365,type365){
    var el = $(event.target);
    var form_data = new FormData;
    form_data.append("block_id_chat",id_chat);
    form_data.append("block_id",id365);
    form_data.append("block_id_type",type365);
    $.ajax({
        url: '../ajax/unfriend.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            el.prop('disabled',true);
        },
        success: function (data) {
            if (data.result == true){
                location.reload();
            }else{
                $(".block").hide();
                alert(data.msg);
                el.prop('disabled',false);
            }
        }
    });
}

function addFriend(id_chat,id365,type365){
    var form_data = new FormData;
    form_data.append("addfriend_id",id_chat);
    form_data.append("addfriend_id365",id365);
    form_data.append("addfriend_type365",type365);
    $.ajax({
        url: '../ajax/addfriend.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.result == true){
                location.reload();
            }else{
                $(".block").hide();
                alert(data.msg);
            }
        }
    });
}

function acceptInvite(id_chat,id365,type365){
    var form_data = new FormData;
    form_data.append("acceptInvite_id",id_chat);
    form_data.append("acceptInvite_id365",id365);
    form_data.append("acceptInvite_type365",type365);
    $.ajax({
        url: '../ajax/addfriend.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.result == true){
                location.reload();
            }else{
                $(".block").hide();
                alert(data.msg);
            }
        }
    });
}

function denyInvite(id_chat,id365,type365){
    var form_data = new FormData;
    form_data.append("denyInvite_id",id_chat);
    form_data.append("denyInvite_id365",id365);
    form_data.append("denyInvite_type365",type365);
    $.ajax({
        url: '../ajax/addfriend.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.result == true){
                location.reload();
            }else{
                $(".block").hide();
                alert(data.msg);
            }
        }
    });
}

function deleteInvite(id_chat,id365,type365){
    var form_data = new FormData;
    form_data.append("deleteInvite_id",id_chat);
    form_data.append("deleteInvite_id365",id365);
    form_data.append("deleteInvite_type365",type365);
    $.ajax({
        url: '../ajax/addfriend.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.result == true){
                location.reload();
            }else{
                $(".block").hide();
                alert(data.msg);
            }
        }
    });
}

function deleteImagePost(new_id){
    var r = confirm("Nếu bạn xóa ảnh/video này sẽ xóa cả bài viết. Bạn chắc chắn muốn xóa!");
    if (r){
        var form_data = new FormData;
        form_data.append("new_id",new_id);
        $.ajax({
            url: '../ajax/delete_post.php',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.result == true){
                    location.reload();
                }else{
                    $(".block").hide();
                    alert(data.msg);
                }
            }
        });
    }
}

function deleteAlbum(album_id){
    var r = confirm("Bạn chắc chắn muốn xóa album này!");
    if (r){
        var form_data = new FormData;
        form_data.append("album_id",album_id);
        $.ajax({
            url: '../ajax/delete_image.php',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.result == true){
                    location.reload();
                }else{
                    $(".block").hide();
                    alert(data.msg);
                }
            }
        });
    }
}

function downloadAlbum(album_id){
    var form_data = new FormData;
    form_data.append("album_id",album_id);
    $.ajax({
        url: '../ajax/download_album.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.result == true){
                var link = document.createElement("a");
                link.download = data.name;
                link.href = data.link;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                // xóa file zip vừa tạo
                $.ajax({
                    url: '../ajax/download_album.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'link': data.link
                    },
                    success: function (data) {
                    }
                });
            }else{
                alert(data.msg);
            }
        }
    });
}

function deleteImageAlbum(ele){
    var form_data = new FormData;
    var queryString = window.location.href;
    queryString = queryString.split("/");
    queryString = queryString[queryString.length - 1].split("-");
    var album_id = queryString[queryString.length - 1].slice(1);
    form_data.append("album_id",album_id);
    form_data.append("index",$(".gr_album_detail_list .gr_album_popup").index($(ele).parents(".gr_album_popup")));
    $.ajax({
        url: '../ajax/delete_image.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.result == true){
                location.reload();
            }else{
                alert(data.msg);
            }
        }
    });
}

function like_album(element){
    var queryString = window.location.href;
    queryString = queryString.split("/");
    queryString = queryString[queryString.length - 1].split("-");
    var album_id = queryString[queryString.length - 1].slice(1);
    $.ajax({
        url: '../ajax/like_album.php',
        type: 'POST',
        dataType: 'json',
        data: {
            album_id: album_id
        },
        success: function (data) {
            if (data.result == true) {
                $(element).find('img').attr('src', '../img/ep_post_liked.svg');
            } else if (data.result == false) {
                $(element).find('img').attr('src', '../img/ep_post_active_like.svg');
            }
            $(element).parents(".ep_post_action").prev().find('.ep_post_sum_like').html(`<img src="../img/ep_post_like.svg" alt="Ảnh lỗi"> `+data.count);
        }
    });
}
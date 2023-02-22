function click_option(a,b,c,d,e) {
    $(a).hide();
    $(b).show();
    $(c).removeClass("active_text");
    $(c).removeClass("border_bt_blue");

    $(d).addClass("active_text");
    $(d).addClass("border_bt_blue");
    $(e).hide();
}

// Xem thêm file phương tiện
$(".see_more_media_files").click(function(){
    $(".hide_chung").hide();
    $(".hide_right").hide();
    $(".hide_ganh").removeClass("active_text border_bt_blue");
    $(".see_more").addClass("active_text border_bt_blue")
    $(".ok_file_imgvideo").show();
})

$(".click_show_right").click(function(){
    $(".hide_right").show();
})

$(".click_hide_right").click(function(){
    $(".hide_right").hide();
});


// Tải file / chi tiết nhóm / File
$(".click_input").click(function(){
    // $(".input_dc_click").click();
    
    $('.upload_file').show();
        $(".close_upload_file").show();
        $(".add_new_post_icon_file").css({
            'background': '#EEEEEE'
        });
        $(".add_new_post").css({
            'margin-top': '0'
        });
    $('.upload_file_post_new').click();
    $(".popup_post").show();

});

// $(".input_dc_click").change(function(){
//     var file = $(this).prop('files');
//     var arr_file = [];
//     for (let i = 0; i < file.length; i++) {
//         if(file[i].type.match("image/*") || file[i].type.match("video/*")){
//             alert("File không đúng định dạng");
//         }else{
//             var size = file[i].size;
//             if(size / 1024 < 1024){
//                 size = (size / 1024).toFixed(1) + "KB";
//             }else{
//                 size = ((size / 1024) / 1024).toFixed(1) + "MB";
//             }
//             arr_file.push(file[i]);
//         } 
//     }

//     var form_data = new FormData();
//     form_data.append('file[]', arr_file);

//     $.ajax({
//         url: '../ajax/upload_file_group.php',
//         type: 'POST',
//         data: form_data,
//         success: function(data){
//             console.log(data);
//         }
//     });
// })


function click_show_download(csd){
    $(csd).children(".file_rieng_main_two4_con").show();
}
$(window).click(function (e) {
  var a = $('.click_show_download');
  var popup = $('.file_rieng_main_two4_con_padding');
  if (!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0) {
    $('.file_rieng_main_two4_con').hide();
  }
});



// ------------- Yêu cầu làm thành viên --------------
// Click bộ lọc khác
$(".click_bl_khac").click(function(){
    $(".pp_bl_main").show();
})
// Click ngoài Popup bộ lọc main
$(window).click(function (e) {
  var a = $('.click_bl_khac');
  var popup = $('.pp_bl_main');
  if (!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0) {
    $('.pp_bl_main').hide();
  }
});
// -----------------------------------------------------
// CLick bạn bè
$(".click_pp_banbe").click(function(){
    $(".pp_banbe").show();
})
// Click ngoài Popup bạn bè
$(window).click(function (e) {
  var a = $('.click_pp_banbe');
  var popup = $('.pp_banbe');
  if (!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0) {
    $('.pp_banbe').hide();
  }
});
// CLICK APPEN TEXT BẠN BÈ
function text_banbe(bb){
    var lay_text = $(bb).text();
    $(".ic_arrow1").hide();
    var html_appen1 = '<div class="dc_appen dc_appen_them"><div class="dc_appen_text active_text">' + lay_text + '</div><div class="dc_appen_img cusor" onclick="click_x_appen(this)"><img src="../img/image_new/x_blue.svg" alt=""></div></div>';
    $(".appen_htmeo1").html(html_appen1);
}


// -----------------------------------------------------
// Click thời gian yêu cầu
$(".click_yc_time").click(function(){
    $(".pp_yc_time").show();
})
// Click ngoài Popup thời gian yêu cầu
$(window).click(function (e) {
  var a = $('.click_yc_time');
  var popup = $('.pp_yc_time');
  if (!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0) {
    $('.pp_yc_time').hide();
  }
});
function text_time_yc(yc){
    var lay_tex_yc = $(yc).text();
    $(".ic_arrow2").hide();
    var html_appen1 = '<div class="dc_appen dc_appen_them2"><div class="dc_appen_text active_text">' + lay_tex_yc + '</div><div class="dc_appen_img cusor" onclick="click_x_appen2(this)"><img src="../img/image_new/x_blue.svg" alt=""></div></div>';
    $(".appen_htmeo2").html(html_appen1);
}


// -----------------------------------------------------
// Click vị trí
$(".click_vi_tri").click(function(){
    $(".pp_vi_tri").show();
})
// Click ngoài Popup Vị Trí
$(window).click(function(e){
    var a = $(".click_vi_tri");
    var popup = $(".pp_vi_tri");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".pp_vi_tri").hide();
    }
});
function text_vitri(vt){
    var lay_text_vitri = $(vt).text();
    $(".ic_arrow3").show();
    var html_appen1 = '<div class="dc_appen dc_appen_them3"><div class="dc_appen_text active_text">' + lay_text_vitri + '</div><div class="dc_appen_img cusor" onclick="click_x_appen3(this)"><img src="../img/image_new/x_blue.svg" alt=""></div></div>';
    $(".appen_htmeo3").html(html_appen1);
}


// -----------------------------------------------------
// Click Popup nhóm
$(".click_pp_nhom").click(function(){
    $(".pp_nhom").show();
});
// Click ngoài Popup nhóm
$(window).click(function(e){
    var a = $(".click_pp_nhom");
    var popup = $(".pp_nhom");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".pp_nhom").hide();
    }
});

function text_nhom(n){
    var lay_text_nhom = $(n).text();
    $(".ic_arrow4").hide();
    var html_appen1 = '<div class="dc_appen dc_appen_them4"><div class="dc_appen_text active_text">' + lay_text_nhom + '</div><div class="dc_appen_img cusor" onclick="click_x_appen4(this)"><img src="../img/image_new/x_blue.svg" alt=""></div></div>';
    $(".appen_htmeo4").html(html_appen1);
}

function click_x_appen(xap){
    $(xap).parents(".dc_appen_them").hide();
    $(".ic_arrow1").show();
};
function click_x_appen2(xap2){
    $(xap2).parents(".dc_appen_them2").hide();
    $(".ic_arrow2").show();
};
function click_x_appen3(xap3){
    $(xap3).parents(".dc_appen_them3").hide();
    $(".ic_arrow3").show();
};
function click_x_appen4(xap4){
    $(xap4).parents(".dc_appen_them4").hide();
    $(".ic_arrow4").show();
};

// Click 3cham đen

function cl_3cham_den(cl_3cham_d){
    $(cl_3cham_d).find(".pp_3cham_black").show();
}
// Click ngoài Popup 3 chấm đen
$(window).click(function(e){
    var a = $(".thanhvien_main_box1_function3");
    var popup = $(".pp_3cham_black");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".pp_3cham_black").hide();
    }
});


// click đóng popup từ chối
$(window).click(function(e){
    var a = $(".dong_tu_choi_chung");
    var popup = $(".tcdg_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".tu_choi_dong_gop").hide();
    }
});
// Click đóng Từ chối kèm theo ý kiến đóng góp
$(".x_pp_tc_dg").click(function(){
    $(this).parents(".tu_choi_dong_gop").hide();
})


$(".refuse_and_prohibit_1").click(function(){
    $(this).hide();
})

// --------------- Câu hỏi chọn thành viên ---------------
// Click xóa câu hỏi
function delete_question(dl_question){
    $(".delete_question").show();
    var id_xoa = $(dl_question).attr('data');
    var id_xoa_pp = $(".xoa_luon").attr('data', id_xoa);
}
// Click X popup xóa câu hỏi
$(".click_x_question").click(function(){
    $(this).parents(".delete_question").hide()
})
$(window).click(function(e){
    var a = $(".select_question_one_3_btn2");
    var popup = $(".delete_question_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".delete_question").hide();
    }
});

$(".xoa_luon").click(function(){
    var id_question = $(this).attr('data');
    // console.log(id_question)

    $.ajax({
        url: '../ajax/delete_question.php',
        type: 'POST',
        data: {id_question:id_question},
        success: function(data){
            alert("Xóa câu hỏi thành công");
            window.location.reload();
        }
    })
});

// ---------------------------------------- Chỉnh sửa câu hỏi
$(".click_question_appen").click(function(){
    var id_edit = $(this).attr('data');

    $.ajax({
        url: '../ajax/edit_question_appen.php',
        type: 'POST',
        data: {id_edit:id_edit},
        success: function(data){
            if(data != ""){
                $('.appen_question_edit').html(data);
                $(".edit_question").show();
            }
        }
    });
});
// ---------------- Thêm lựa chọn đáp án (update câu hỏi)
function them_option(to){
    var option_update = $(to).parents(".add_question_two_sub").find("select[name=option_update]").val();
    var ud_html_check = '<div class="lua_chon_1_appen dc_appen1"><div class="lua_chon_1_checkbox"><input disabled type="checkbox" name="lua_chon1" value=""></div><div class="lua_chon_1_input"><input type="text" placeholder="Nhập lựa chọn" class="them_border border_full" name="nhap_luachon2" onkeydown="nhap_lc(this)" value=""></div><div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)"><img src="../img/image_new/x_den.svg" alt="Đóng"></div></div>';
    var ud_html_radio = '<div class="lua_chon_1_appen dc_appen2"><div class="lua_chon_1_checkbox"><input type="radio"  name="chon_radio2" value="" disabled></div><div class="lua_chon_1_input"><input type="text" placeholder="Nhập lựa chọn" class="them_border border_full" name="nhap_luachon_ra" onkeydown="nhap_lc(this)" value=""></div><div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)"><img src="../img/image_new/x_den.svg" alt="Đóng"></div></div>';
    if(option_update == 2){
        $(".appen_lua_chon_ud").append(ud_html_check);
    }else if(option_update == 3){
        $(".appen_lua_chon_ud").append(ud_html_radio);
    }
}

function change_select_question2(change_question2){
    var ud_html_check = '<div class="lua_chon_1_appen dc_appen1"><div class="lua_chon_1_checkbox"><input disabled type="checkbox" name="lua_chon1" value=""></div><div class="lua_chon_1_input"><input type="text" placeholder="Nhập lựa chọn" class="them_border border_full" name="nhap_luachon2" onkeydown="nhap_lc(this)" value=""></div><div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)"><img src="../img/image_new/x_den.svg" alt="Đóng"></div></div>';
    var ud_html_radio = '<div class="lua_chon_1_appen dc_appen2"><div class="lua_chon_1_checkbox"><input type="radio"  name="chon_radio2" value="" disabled></div><div class="lua_chon_1_input"><input type="text" placeholder="Nhập lựa chọn" class="them_border border_full" name="nhap_luachon_ra" onkeydown="nhap_lc(this)" value=""></div><div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)"><img src="../img/image_new/x_den.svg" alt="Đóng"></div></div>';
    var id_option = $(change_question2).val();
    console.log(id_option);

    if(id_option == 1){
        $(".them_luachon_js2").remove();
        $('.dc_appen1').hide();
        $('.dc_appen2').hide();
    }else if(id_option == 2){
        $(".them_luachon_js2").show();
        $('.dc_appen2').remove();
        $(".appen_lua_chon_ud").append(ud_html_check);
    }else if(id_option == 3){
        $(".them_luachon_js2").show();
        $('.dc_appen1').remove();
        $(".appen_lua_chon_ud").append(ud_html_radio);
    }

}


function update_question(update_q){
    var check_true2 = true;
    var ud_id_group = $(".luu_data_ajax2").attr('data2');
    var ud_ques = $(".luu_data_ajax2").attr('data3');
    var ud_option  = $("select[name=option_update]").val();
    var ud_title = $("textarea[name=ques_title2]").val();

    var name_check2 = [];
    $("input[name=nhap_luachon2]").each(function(){
        var ques_name_check = $(this).val();
        if(ques_name_check == ""){
            alert("Vui lòng nhập lựa chọn");
            check_true2 = false;
            return false;
        }else{
            name_check2.push(ques_name_check);
        }
    });
    var name_radio2 = [];
    $("input[name=nhap_luachon_ra]").each(function(){
        var ques_name_radio2 = $(this).val();
        if(ques_name_radio2 == ""){
            alert("Vui lòng nhập lựa chọn");
            check_true2 = false;
            return false;
        }else{
            name_radio2.push(ques_name_radio2);
        }
    });

    if (check_true2 == true) {
        $.ajax({
            url: '../ajax/edit_question.php',
            type: 'POST',
            data: {
               ud_id_group:ud_id_group, 
               ud_ques:ud_ques, 
               ud_option:ud_option, 
               ud_title:ud_title, 
               name_check2:name_check2,
               name_radio2:name_radio2,
            },
            success: function(data){
                // console.log(data);
                if(data == ""){
                    alert("Chỉnh sửa câu hỏi thành công");
                    window.location.reload();
                }else{
                    alert(data);
                }
            }
        });
    }
}






// -------------------------------------------------------
// Click thêm câu hỏi
$(".click_add_question").click(function(){
    $(".create_question").show();
})
// Click đóng popup câu hỏi
$(".x_pp_cauhoi").click(function(){
    $(this).parents(".create_question").hide();
    $(this).parents(".edit_question").hide();
})
// ------------------- Click thêm lựa chọn

function them_luachon_js(tlc){
    var val_select = $(tlc).parents(".add_question_two_sub").find(".select_luachon").val();
    var html_luachon1 = '<div class="lua_chon_1_appen dc_appen1"><div class="lua_chon_1_checkbox"><input disabled type="checkbox" class="remove_value_check" name="lua_chon1" value=""></div><div class="lua_chon_1_input"><input type="text" placeholder="Nhập lựa chọn" class="them_border remove_attr_name border_full" name="nhap_luachon" oninput="nhap_lc(this)"></div><div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)"><img src="../img/image_new/x_den.svg" alt="Đóng"></div></div>';
    var html_radio = '<div class="lua_chon_1_appen dc_appen2"><div class="lua_chon_1_checkbox"><input disabled type="radio" class="remove_value_radio" name="chon_radio" value=""></div><div class="lua_chon_1_input"><input type="text" placeholder="Nhập lựa chọn" class="them_border remove_attr_name border_full" name="nhap_luachon2" oninput="nhap_lc(this)"></div><div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)"><img src="../img/image_new/x_den.svg" alt="Đóng"></div></div>';
    if(val_select == 2){
        $(".appen_lua_chon").append(html_luachon1);
    }else if(val_select == 3){
        $(".appen_lua_chon").append(html_radio);
    }
};
// ---------------------- Click X thêm lựa chọn
function x_luachon(xlc){ 
    $(xlc).parents(".lua_chon_1_appen").remove();
}

// ------------ Change select câu hỏi
var html_luachon1 = '<div class="lua_chon_1_appen dc_appen1"><div class="lua_chon_1_checkbox"><input disabled type="checkbox" class="remove_value_check" name="lua_chon1" value="0"></div><div class="lua_chon_1_input"><input type="text" placeholder="Nhập lựa chọn" class="them_border remove_attr_name border_full" name="nhap_luachon" oninput="nhap_lc(this)"></div><div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)"><img src="../img/image_new/x_den.svg" alt="Đóng"></div></div>';
var html_radio = '<div class="lua_chon_1_appen dc_appen2"><div class="lua_chon_1_checkbox"><input disabled type="radio" class="remove_value_radio" name="chon_radio" value="0"></div><div class="lua_chon_1_input"><input type="text" placeholder="Nhập lựa chọn" class="them_border remove_attr_name border_full" name="nhap_luachon2" oninput="nhap_lc(this)"></div><div class="lua_chon_1_x ic_x_den" onclick="x_luachon(this)"><img src="../img/image_new/x_den.svg" alt="Đóng"></div></div>';
function change_select_question(change_question){
    var val_select2 = $(change_question).val();
    if(val_select2 == 1){
        $(".them_luachon_js").hide();
        $('.dc_appen1').hide();
        $('.dc_appen2').hide();
    }
    if(val_select2 == 2){
        $(".them_luachon_js").show();
        $('.dc_appen2').hide();
        $(".appen_lua_chon").append(html_luachon1);
    }
    if(val_select2 == 3){
        $(".them_luachon_js").show();
        $('.dc_appen1').hide();
        $(".appen_lua_chon").append(html_radio);
    }
}
// --------------- oninput đáp án
function nhap_lc(nlc){
    var test_val = $(nlc).val();
    
    if(test_val != ""){
        $(nlc).removeClass("border_full");
        $(nlc).addClass("border_bottom");
    }else{
        $(nlc).addClass("border_full");
        $(nlc).removeClass("border_bottom");
    }
}

// ----------------------- Lưu câu hỏi
function luu_question(lq){
    var check_true = true;
    var ques_id_user  = $(".luu_data_ajax").attr('data');
    var ques_id_com   = $(".luu_data_ajax").attr('data1');
    var ques_id_group = $(".luu_data_ajax").attr('data2');
    var ques_option   = $("select[name=select_luachon]").val();
    var ques_title = $("textarea[name=ques_title]").val();
    if(ques_title == ""){
        alert("Vui lòng nhập câu hỏi");
        check_true = false;
    }
    if(ques_option == 2){

        var name_check = [];
        $("input[name=nhap_luachon]").each(function(){
            var ques_name_check = $(this).val();
            if(ques_name_check == ""){
                alert("Vui lòng nhập lựa chọn");
                check_true = false;
                return false;
            }else{
                name_check.push(ques_name_check);
            }
        });
    }else if(ques_option == 3){

        var name_radio = [];
        $("input[name=nhap_luachon2]").each(function(){
            var ques_name_radio = $(this).val();
            if(ques_name_radio == ""){
                alert("Vui lòng nhập lựa chọn");
                check_true = false;
                return false;
            }else{
                name_radio.push(ques_name_radio);
            }
        });
    }

    if(check_true == true){
        $.ajax({
            url: "../ajax/select_question.php",
            type: "POST",
            data: {
                ques_id_user:ques_id_user,
                ques_id_com:ques_id_com,
                ques_id_group:ques_id_group,
                ques_option:ques_option,
                ques_title:ques_title,

                name_check:name_check,

                name_radio:name_radio,


            },
            success: function(data){
                alert("Thêm câu hỏi thành công");
                window.location.reload();
                // console.log(data)
            }
        });
    }
}


// ------------------------------------


// Click show bộ lọc
$(".click_show_boloc_375").click(function(){
    $(".chen_popup_600").show();
});


// ---- Bài viết đang chờ---
// Check one
$("input[name=check_one]").click(function(){
    var check_checkbox = $("input[name=check_one]:checked").length;
    if(check_checkbox == 0){
        $(".remove_opacity").addClass("opacity");
        $(".posts_waiting_btn_head1").prop("disabled", true);
        $(".posts_waiting_btn_head2").prop("disabled", true);
    }else{
        $(".remove_opacity").removeClass("opacity");
        $(".posts_waiting_btn_head1").prop("disabled", false);
        $(".posts_waiting_btn_head2").prop("disabled", false);
    }
});

// Check all
$("input[name=check_all]").click(function(){
    if($(this).is(":checked")){
        $("input[name=check_one]").prop("checked", true);
    }else{
        $("input[name=check_one]").prop("checked", false);
    }

    if($("input[name=check_one]").is(":checked")){
        $(".remove_opacity").removeClass("opacity");
        $(".posts_waiting_btn_head1").prop("disabled", false);
        $(".posts_waiting_btn_head2").prop("disabled", false);
    }else{
        $(".remove_opacity").addClass("opacity");
        $(".posts_waiting_btn_head1").prop("disabled", true);
        $(".posts_waiting_btn_head2").prop("disabled", true);
    }
});

// --- Click tác giả
$(".click_tacgia").click(function(){
    $(".tac_gia_posts_waiting").show();
})
$(window).click(function(e){
    var a = $(".click_tacgia");
    var popup = $(".tac_gia_posts_waiting");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".tac_gia_posts_waiting").hide();
    } 
});
// Click xem thêm
$(".xemthem_text").click(function(){
    $(this).parents(".posts_are_waiting_two_noidung_text").find(".remove_elipsis2").toggleClass("elipsis2");
    var x = $(this);
    x.html() == "Xem thêm" ? x.html("Thu gọn") : x.html("Xem thêm");        
});
// Click 3 chấm bật thông báo bài viết
$(".click_pp_nho_tb").click(function(){
    $(this).children(".pp_small_notification").toggle();
    
})
// Click 3 chấm Từ chối
function click_refuse(refuse){
    $(refuse).children(".pp_tuchoi").show();
};
$(window).click(function(e){
    var a = $(".posts_are_waiting_three_3");
    var popup = $(".pp_tuchoi");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".pp_tuchoi").hide();
    }
});


$(".refuse_and_prohibit_2").click(function(){
    $(this).hide();
})

// ---------- Tạo quy tắc nhóm ----------
// Click Mở POPUP tạo quy tắc
$(".click_add_rules").click(function(){
    $(".tao_group_rules").show();
})
// Đóng popup tạo quy tắc
// $(".click_close_quytac").click(function(){
    
// });
function click_close_quytac(x_quytac){
    $(x_quytac).parents(".create_group_rules").hide();
}
$(window).click(function(e){
    var a = $(".click_add_rules");
    var popup = $(".create_group_rules_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".tao_group_rules").hide();
    }
});
$(window).click(function(e){
    var a = $(".append_rules");
    var popup = $(".create_group_rules_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".edit_group_rules").hide();
    }
});

// Click tạo quy tắc
$(".save_rule").click(function(){
    var check = true,
        id_use_rule = $(".ruled_hidden").attr('data'),
        id_com_rule = $(".ruled_hidden").attr('data1'),
        id_group_rule = $(".ruled_hidden").attr('data2'),

        title_rule = ($("input[name=title_rule]").val()).trim(),
        describe_rule = ($("textarea[name=describe_rule]").val()).trim();
    if (!title_rule) {
        $(this).parents(".create_group_rules_main").find('.create_group_rules_main_input .setting_err').html('Chưa nhập tiêu đề');
        check = false;
    } else {
        $(this).parents(".create_group_rules_main").find('.create_group_rules_main_input .setting_err').html('');
    }
    if (!title_rule) {
        $(this).parents(".create_group_rules_main").find('.create_group_rules_main_textarea .setting_err').html('Chưa nhập mô tả');
        check = false;
    } else {
        $(this).parents(".create_group_rules_main").find('.create_group_rules_main_textarea .setting_err').html('');
    }
    if (check) {
        let create = callAjax('../ajax/create_group_rules.php', 'POST', {
                id_use_rule:id_use_rule,
                id_com_rule:id_com_rule,
                id_group_rule:id_group_rule,

                title_rule:title_rule,
                describe_rule:describe_rule,
            });
        alert(create.msg);
        if (create.result) {
            let data = create.data;
            $('.box_lst_rules').prepend(`
                <div class="rules_one" data-id="${data.id}">
                    <div class="rules_one_padding">
                        <div class="rules_one_padding_sub">
                            <h3 class="rules_one_title">
                                <span class="font_w_fig stt_rules">1.</span>
                                <span class="title_rules">${data.title}</span>
                            </h3>
                            <p class="rules_one_text">${data.describe.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + `<br>` + '$2')}</p>
                        </div>
                        <div class="rules_one_btn">
                            <div class="rules_one_btn1 cusor append_rules" data="${data.id}" onclick="append_rules(this)">Chỉnh sửa</div>
                            <div class="rules_one_btn2 cusor" data="${data.id}" onclick="delete_rule(this)">Xóa</div>
                        </div>
                    </div>
                </div>
            `);
            $(".rules_one").each(function(i){
                $(this).find('.stt_rules').html((i+1)+'.');
            });
            $(".tao_group_rules").hide();
        } 
    }
});
// Xóa Quy tắc
function delete_rule(delete_rl) {
    if (confirm('Bạn có chắc muốn xóa không?')) {
        var id_rule_xoa = $(delete_rl).attr('data'); 
        $.ajax({
            url: '../ajax/delete_group_rules.php',
            type: 'POST',
            data: {id_rule_xoa:id_rule_xoa},
            success: function(data){
                if(data == ""){
                    alert('Xóa quy tắc thành công');
                    $(delete_rl).parents('.rules_one').remove();
                    $(".rules_one").each(function(i){
                        $(this).find('.stt_rules').html((i+1)+'.');
                    });
                }else{
                    alert(data);
                }
                
            }
        })
    }
}

// Chỉnh sửa quy tắc nhóm
function append_rules(egr){
    var id_appen_rule = $(egr).attr('data');
    $.ajax({
        url: '../ajax/append_group_rules.php',
        type: 'POST',
        data: {id_appen_rule:id_appen_rule},
        success: function(data){
            if(data != ""){
                $(".appen_rules_group").html(data);
                $(".edit_group_rules").show();
            }
            
        }
    })
}
// Lưu chỉnh sửa 
$(document).on('click', '.save_edit_rule', function() {
    var check = true,
        id_use_rule_ed = $(".ruled_hidden2").attr('data'),
        id_rule_ed = $(".ruled_hidden2").attr('data1'),
        title_rule_ed = ($("input[name=title_rule_edit]").val()).trim(),
        desctibe_rule_ed = ($("textarea[name=describe_rule_edit]").val()).trim();
    if (!title_rule_ed) {
        $(this).parents(".parents_rules").find('.create_group_rules_main_input .setting_err').html('Chưa nhập tiêu đề');
        check = false;
    } else {
        $(this).parents(".parents_rules").find('.create_group_rules_main_input .setting_err').html('');
    }
    if (!desctibe_rule_ed) {
        $(this).parents(".parents_rules").find('.create_group_rules_main_textarea .setting_err').html('Chưa nhập mô tả');
        check = false;
    } else {
        $(this).parents(".parents_rules").find('.create_group_rules_main_textarea .setting_err').html('');
    }
    if (check) {
        $.ajax({
            url: '../ajax/edit_group_rules.php',
            type: 'POST',
            data: {
                id_use_rule_ed:id_use_rule_ed,
                id_rule_ed:id_rule_ed,
                title_rule_ed:title_rule_ed,
                desctibe_rule_ed:desctibe_rule_ed,
            },
            success: function(data){ 
                if(data == ""){
                    alert("Chỉnh sửa thành công");
                    $(".edit_group_rules").hide();
                    $('.rules_one[data-id='+id_rule_ed+'] .title_rules').text(title_rule_ed);
                    $('.rules_one[data-id='+id_rule_ed+'] .rules_one_text').html(desctibe_rule_ed.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + `<br>` + '$2'));
                }else{
                    alert(data);
                }
            }
        })
    }
})

$("#checkbox_calendar").click(function(){
    if($(this).is(":checked")){
        $(".flipswitch").addClass("back_blue");
        $(".flipswitch").removeClass("back_fff");
        $(".flipswitch").addClass("cham_affter");
    }else{
        $(".flipswitch").removeClass("back_blue");
        $(".flipswitch").addClass("back_fff");
        $(".flipswitch").removeClass("cham_affter");
    }
})


// Gỡ lời nhắc - Thành viên
$(".popup_go_loi_moi").click(function(){
    $(this).children(".go_loi_moi").toggle(500);
});
$(window).click(function(e){
    var a = $(".popup_go_loi_moi");
    var popup = $(".go_loi_moi");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".go_loi_moi").hide();
    }
});

// Gỡ Quản trị viên - Thành viên
$(".show_popup_QTV").click(function(){
    $(this).children(".pp_remove_QTV").toggle(500);
});
$(window).click(function(e){
    var a = $(".show_popup_QTV");
    var popup = $(".pp_remove_QTV");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".pp_remove_QTV").hide();
    }
});

// Gỡ Người kiểm duyệt - Thành viên
$(".show_popup_kiemduyet").click(function(){
    $(this).children(".pp_ng_kiemduyet").toggle(500);
});
$(window).click(function(e){
    var a = $(".show_popup_kiemduyet");
    var popup = $(".pp_ng_kiemduyet");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".pp_ng_kiemduyet").hide();
    }
});

// POPUP chủ nhóm  ------------------------------------
$(".pp_group_owner_relative").click(function(){
    $(this).children(".pp_group_owner_remove").toggle(500);
});
$(window).click(function(e){
    var a = $(".pp_group_owner_relative");
    var popup = $(".pp_group_owner_remove");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".pp_group_owner_remove").hide();
    }
});
// POPUP Bạn bè
$(".click_popup_for_friends").click(function(){
    $(this).children(".popup_for_friends").toggle(500);
});
$(window).click(function(e){
    var a = $(".click_popup_for_friends");
    var popup = $(".popup_for_friends");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".popup_for_friends").hide();
    }
});

// POPUP MỜI LÀM QUẢN TRỊ VIÊN  ---------------------------------
$(".add_administrators").click(function(){
    $(".invite_admin").show();
})
$(".huy_invite_admin").click(function(){
    $(this).parents(".invite_admin").hide();
});
$(window).click(function(e){
    var a = $(".add_administrators");
    var popup = $(".padding_administrators");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".invite_admin").hide();
    }
});
// POPUP MỜI LÀM NGƯỜI KIỂM DUYỆT  ---------------------------------
$(".add_censor").click(function(){
    $(".censor").show();
})
$(".huy_invite_admin").click(function(){
    $(this).parents(".censor").hide();
});
$(window).click(function(e){
    var a = $(".add_censor");
    var popup = $(".padding_censor");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".censor").hide();
    }
});

// POPUP ĐÌNH CHỈ THÀNH VIÊN -----------------------------
$(".member_suspension_click").click(function(){
    var pick_id_user = $(this).parents(".go_loi_moi_padding").attr('data');
    var pick_id_group = $(this).parents(".thanh_vien_padding").attr('data');

    var val_suspension = $(this).parents(".go_loi_moi_padding").attr('data2');
    var val_popup = $("input[name=member_suspension]").val();
    // console.log(val_suspension);

    

    $(".member_suspension").show();
    var name_suspension = $(this).parents(".parent_info_name").find(".thanh_vien_block2_QTV_name").text();
    $(".nhan_name_suspension").html(name_suspension);
    $(".confirm_suspension").attr('data', pick_id_user);
    $(".confirm_suspension").attr('data1', pick_id_group);
    if (val_suspension != "") {
        $("input[name=member_suspension][value="+val_suspension+"]").click();
    }else{
        $("input[name=member_suspension]").prop('checked', false);
    }
    
});
$(".close_member_suspension").click(function(){
    $(this).parents(".member_suspension").hide();
});
$(window).click(function(e){
    var a = $(".member_suspension_click");
    var popup = $(".padding_member_suspension");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".member_suspension").hide();
    }
});
    
// POPUP Giới hạn hoạt động thành viên -------------------------------
$(".membership_activity_limit_click").click(function(){
    var name_mem = $(this).parents(".parent_info_name").find('.thanh_vien_block2_QTV_name').html();
    var pick_id_user = $(this).parents(".go_loi_moi_padding").attr('data');
    var pick_id_group = $(this).parents(".thanh_vien_padding").attr('data');
    
    $(".name_mem_limit").html(name_mem);
    $(".click_limit_mem").attr('data-id-limit',pick_id_user);

    $(".click_limit_mem").attr('data-id-group',pick_id_group);

    $.ajax({
        url: '../ajax/appen_value_limit.php',
        type: 'POST',
        dataType: 'json',
        data: {pick_id_user:pick_id_user,pick_id_group:pick_id_group},
        async: false,
        success: function(data){
            // console.log(data);
            if (data.result == true) {
                if (parseInt(data.data.gioi_han_post) > 0) {
                    $("input[name=check_limit_post]").prop("checked", true);
                    $("input[name=check_limit_post]").addClass("back_489B1C");
                    $(".opaciy_bt").css("opacity", "1");
                    $(".opaciy").css("opacity", "1");
                    $(".text_html_post").show();
                    $(".rmv_disa").prop('disabled', false);
                    $("select[name=limit_post]").val(data.data.gioi_han_post).trigger('change');
                    $("select[name=post_het_han]").val(data.data.type_posts_het_han_sau).trigger('change');
                }else{
                    $("input[name=check_limit_post]").prop("checked", false);
                    $("input[name=check_limit_post]").removeClass("back_489B1C");
                    $(".text_html_post").hide();
                    $(".rmv_disa").prop('disabled', true);
                    $(".opaciy").css("opacity", "0.6");
                    $("select[name=limit_post]").val(1).trigger('change');
                    $("select[name=post_het_han]").val(1).trigger('change');
                }

                if (parseInt(data.data.gioi_han_comment) > 0) {
                    $("input[name=check_limit_comment]").prop("checked", true);
                    $("input[name=check_limit_comment]").addClass("back_489B1C");
                    $(".opaciy_bt").css("opacity", "1");
                    $(".opaciy2").css("opacity", "1");
                    $(".rmv_disa2").prop('disabled', false);
                    $(".text_html_comment").show();
                    $("select[name=limit_commnet]").val(data.data.gioi_han_comment).trigger('change');
                    $("select[name=commem_het_han]").val(data.data.type_commem_het_han_sau).trigger('change');
                }else{
                    $("input[name=check_limit_comment]").prop("checked", false);
                    $("input[name=check_limit_comment]").removeClass("back_489B1C");
                    $(".opaciy2").css("opacity", "0.6");
                    $(".rmv_disa2").prop('disabled', true);
                    $(".text_html_comment").hide();
                    $("select[name=limit_commnet]").val(1).trigger('change');
                    $("select[name=commem_het_han]").val(1).trigger('change');
                }
                if (data.data == false) {
                    $(".opaciy_bt").css("opacity", "0.6");
                    $(".rmv_disa_bt").prop('disabled', true);
                }
            }
        }
    });
    $(".membership_activity_limit").show()
});


$(".close_membership_activity_limit").click(function(){
    $(this).parents(".membership_activity_limit").hide();
});
$(window).click(function(e){
    var a = $(".membership_activity_limit_click");
    var popup = $(".padding_membership_activity_limit");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".membership_activity_limit").hide();
    }
});

// Giới hạn Bài viết
$("input[name=check_limit_post]").click(function(){
    if($(this).is(":checked")){
        $(this).addClass("back_489B1C");
        $(".opaciy").css("opacity", "1");
        $(".opaciy_bt").css("opacity", "1");
        $(".rmv_disa").prop('disabled', false);
        $(".rmv_disa_bt").prop('disabled', false);
        $(".text_html_post").show();
    }else{
        $(this).removeClass("back_489B1C");
        $(".opaciy").css("opacity", "0.6");
        $(".rmv_disa").prop('disabled', true);
        $(".text_html_post").hide();
        if ($("input[name=check_limit_comment]").is(":checked")) {
            $(".opaciy_bt").css("opacity", "1");
            $(".rmv_disa_bt").prop('disabled', false);
        }else{
            $(".opaciy_bt").css("opacity", "0.6");
            $(".rmv_disa_bt").prop('disabled', true);
        }
    }
});

// ----------------------------------------------
// Giới hạn bình luận
$("input[name=check_limit_comment]").click(function(){
    if($(this).is(":checked")){
        $(this).addClass("back_489B1C");
        $(".opaciy2").css("opacity", "1");
        $(".opaciy_bt").css("opacity", "1");
        $(".rmv_disa2").prop('disabled', false);
        $(".rmv_disa_bt").prop('disabled', false);
        $(".text_html_comment").show();
    }else{
        $(this).removeClass("back_489B1C");
        $(".opaciy2").css("opacity", "0.6");
        $(".rmv_disa2").prop('disabled', true);
        $(".text_html_comment").hide();
        if ($("input[name=check_limit_post]").is(":checked")) {
            $(".opaciy_bt").css("opacity", "1");
            $(".rmv_disa_bt").prop('disabled', false);
        }else{
            $(".opaciy_bt").css("opacity", "0.6");
            $(".rmv_disa_bt").prop('disabled', true);
        }
    }
});


$("#limit_baidang").change(function(){
    var layval = $(this).val();
    $(".html_limit_baidang").html(layval);
});

$("#limit_baidang2").change(function(){
    var layval = $(this).val();
    $(".html_limit_baidang2").html(layval);
});


// Click giới hạn hoạt động thành viên
$(".click_limit_mem").click(function(){
    var id_user_limit = $(this).attr('data-id-limit');
    var id_group = $(this).attr('data-id-group');
    // Bài viết
    if ($("input[name=check_limit_post]").is(":checked")) {
        var limit_post = $("select[name=limit_post]").val();
        var post_het_han = $("select[name=post_het_han]").val();
    }
    
    // Comment
    if ($("input[name=check_limit_comment]").is(":checked")) {
        var limit_commnet = $("select[name=limit_commnet]").val();
        var commem_het_han = $("select[name=commem_het_han]").val();
    }
    
    var from_dt = new FormData();
    from_dt.append('id_user_limit',id_user_limit);
    from_dt.append('id_group',id_group);

    from_dt.append('limit_post',limit_post);
    from_dt.append('post_het_han',post_het_han);

    from_dt.append('limit_commnet',limit_commnet);
    from_dt.append('commem_het_han',commem_het_han);

    $.ajax({
        url: '../ajax/gioi_han_hoat_dong_thanh_vien.php',
        type: 'POST',
        data: from_dt,
        contentType: false,
        processData: false,
        success: function(data){
            // console.log(data);
            if (data == "") {
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});

// POPUP Xóa thành viên ------------------------------
$(".delete_member_click").click(function(){
    $(".delete_member").show();
});

$(".close_delete_member").click(function(){
    $(this).parents(".delete_member").hide();
});
$(window).click(function(e){
    var a = $(".delete_member_click");
    var popup = $(".delete_member_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".delete_member").hide();
    }
});


// --------------------- File phương tiện ------------------
function c_img_vid(a,b,c,d){
    $(a).hide();
    $(b).show();
    $(c).removeClass("active_text");
    $(c).removeClass("border_bt_blue");

    $(d).addClass("active_text");
    $(d).addClass("border_bt_blue");
}

// ------------------------------- Mời bạn bè
// $(document).on('click', '.khoi_add_friend_block', function() {
//     $(this).find("input").click();
// });
function fc_add_f(friend){
    var id = $(friend).data("id");
    var type = $(friend).data("type");
    var name_f = $(friend).parents(".khoi_add_friend_block").find(".khoi_add_friend_info_name").text();
    var img_f = $(friend).parents(".khoi_add_friend_block").find(".img_friend").attr("src");
    if ($(friend).is(":checked")) {
        $(friend).prop('checked', true);
        var html_friend = '<div class="add_friend-success-friend-one" data-id="'+id+'">';
        html_friend += '<div class="add_friend-success-friend-one-avt"><img src="'+img_f+'" alt=""></div>';
        html_friend += '<div class="add_friend-success-friend-one-name">'+name_f+'</div>';
        html_friend += '<div class="add_friend-success-friend-one-ic"><img onclick="remove_friend('+id+','+type+')" src="../img/image_new/x.svg" alt=""></div>';
        html_friend += '</div>';
        $(".add_friend-success-friend").append(html_friend);
    }else{
        $(friend).prop('checked', false);

        el_parent = $(friend).parents(".scroll_y_fig").next().find(".add_friend-success-friend");
        var id = $(friend).val();
        el_parent.find(".add_friend-success-friend-one[data-id="+id+"]").remove();
    }

    $(".cout_person").html($(".add_friend-success-friend .add_friend-success-friend-one").length);
}

function remove_friend(id,type){
    $(".khoi_add_friend_block[data-id="+id+"][data-type="+type+"]").find("input").click();
}

// ----------------- Cài đặt thông báo
$(".click_setting_notify_show_popup").click(function(){
    $(".setting_notify").show();
})

$(".click_setting_notify").click(function(){
    var id_gr = $(this).attr('data');
    var val_radio = $("input[name=setting_notify]:checked").val();
    var val_checkbox = $("input[name=send_notify2]:checked").val();

    $.ajax({
        url: "../ajax/setting_notify.php",
        type: "POST",
        data: {
            id_gr:id_gr,
            val_radio:val_radio,
            val_checkbox:val_checkbox,
        },
        success: function(data){
            // console.log(data);
            if(data == ""){
                alert("Lưu thành công");
                window.location.reload();
            }
        }
    })
});


// -------------------------- POPUP CÂU TRẢ LỜI CỦA THÀNH VIÊN
// SHOW POPUP
$(".show_answered").click(function(){
    var id_user = $(this).parents(".data_pd_tc").attr('data');
    var id_group = $(this).parents(".data_pd_tc").attr('data1');
    $(".take_id_answered").attr('data',id_user);
    $(".take_id_answered").attr('data1',id_group);
    var name_user_xin = $(".thanhvien_main_box1_info_text_name").html();
    $.ajax({
        url: '../ajax/appen_answered.php',
        type: 'POST',
        data: {id_user:id_user,id_group:id_group},
        success: function(data){
            // console.log(data);
            if (data != "") {
                $(".member_answered_main").append(data);
                $('.member_answered_head_text').html("Câu trả lời của " + name_user_xin);
                $(".member_answered").show();
            }
        }
    })


});

// ĐÓNG POPUP
$(".close_member_answered").click(function(){
    $(this).parents(".member_answered").hide();
});

$(window).click(function(e){
    var a = $(".show_answered");
    var popup = $(".member_answered_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".member_answered").hide();
    }
});

// ---------------------- Từ chối thành viên
$(".tu_choi_thanhvien").click(function(){
    var id_user =  $(this).parents(".data_pd_tc").attr('data');
    var user_type =  $(this).parents(".data_pd_tc").attr('data-user_type');
    var id_group = $(this).parents(".data_pd_tc").attr('data1');

    $.ajax({
        url: '../ajax/tu_choi_thanhvien.php',
        type: 'POST',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            if(data == ""){
                window.location.reload();
            }
        }
    });
});

// ---------------------- Từ chối và cấm thành viên
$(".click_tc_and_cam").click(function(){
    // var type_cam = 1;
    var id_user =  $(this).parents(".data_pd_tc").attr('data');
    var user_type =  $(this).parents(".data_pd_tc").attr('data-user_type');
    var id_group = $(this).parents(".data_pd_tc").attr('data1');

    var name_tuchoi = $(this).find(".text_cam").text();

    $.ajax({
        url: '../ajax/tu_choi_thanhvien2.php',
        type: 'POST',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            if(data == ""){
                $(".popup_tuchoi_cam_pd").html("Đã từ chối và cấm " + name_tuchoi);
                $(".refuse_and_prohibit_1").show();
                window.location.reload();
            }
        }
    });
});

// Click Từ chối kèm theo ý kiến đóng góp
$(".cl_tc_dg").click(function(){
    $(".tu_choi_dong_gop_mem").show();
    var laydata = $(this).parents(".data_pd_tc").attr('data');
    var user_type = $(this).parents(".data_pd_tc").attr('data-user_type');
    var laydata1 = $(this).parents(".data_pd_tc").attr('data1');
    $(".xacnhan_tuchoi").attr('data', laydata);
    $(".xacnhan_tuchoi").attr('data-user_type', user_type);
    $(".xacnhan_tuchoi").attr('data1', laydata1);

});
// ----------------------- Từ chối kèm ý kiến đóng góp
$(".xacnhan_tuchoi").click(function(){
    var id_user =  $(this).attr('data');
    var user_type =  $(this).attr('data-user_type');
    var id_group = $(this).attr('data1');
    var message_true = true;
    var message_tuchoi = $("textarea[name=message_tuchoi]").val();
    if(message_tuchoi == ""){
        message_true = false;
        alert("Vui lòng nhập ý kiến đóng góp");
    }
    if(message_true == true){
        $.ajax({
            url: '../ajax/tu_choi_thanhvien3.php',
            type: 'POST',
            data: {
                message_tuchoi:message_tuchoi,
                id_user:id_user,
                user_type:user_type,
                id_group:id_group
            },
            success: function(data){
                if(data == ""){
                    window.location.reload();
                    // console.log(data);
                }
            }
        })
    }
});



// ---------------------- Phê duyệt thành viên
$('.duyet_thanhvien').click(function(){
    var id_user =  $(this).parents(".data_pd_tc").attr('data');
    var user_type =  $(this).parents(".data_pd_tc").attr('data-user_type');
    var id_group = $(this).parents(".data_pd_tc").attr('data1');
    // console.log(id_user,id_group);

    $.ajax({
        url: '../ajax/duyet_thanhvien.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            // console.log(data);
            if(data.result == true){
                window.location.reload();
            }else{
                alert(data.msg);
            }
        }
    });
});

// ----------------------- Phê duyệt bài viết (Duyệt bài viết thành viên)
$(".pheduyetpost_member").click(function(){
    var id_post = $(this).parents(".id_post_member").attr('data');
    $.ajax({
        url: '../ajax/duyet_post_member.php',
        type: 'POST',
        data: {id_post:id_post},
        success: function(data){
            if(data == ""){
                window.location.reload();
            }
        }
    });
});

// ------------------------ Phê duyệt bài viết (Từ chối bài viết thành viên)
// Phê duyệt đơn
$(".tuchoi_posts_member").click(function(){
    var id_post = $(this).parents(".id_post_member").attr('data');
    $.ajax({
        url: '../ajax/tuchoi_post_member.php',
        type: 'POST',
        data: {id_post:id_post},
        success: function(data){
            if(data == ""){
                window.location.reload();
            }
        }
    });
});
// Phê duyệt all
$('.tuchoi_posts').click(function(){
    var check_one = [];
    $("input[name=check_one]").each(function(){
        if ($(this).is(":checked")) {
            var val_check_one = $(this).val();
            check_one.push(val_check_one);
        }
    });
    $.ajax({
        url: '../ajax/tuchoi_post_member_all.php',
        type: 'POST',
        data: {check_one:check_one},
        success: function(data){
            // console.log(data)
            if(data == ""){
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    })
})
// ------------------------ Phê duyệt bài viết (Từ chối bài viết thành viên kèm lời nhắn)
// Click từ chối kèm ý kiến
$(".click_tuchoi1").click(function(){
    var lay_id_post = $(this).parents(".id_post_member").attr('data');
    $('.tychoi_post_mem, .refuse_post_group_message').attr('data',lay_id_post);
    $(".tu_choi_dong_gop_post").show();
});

// Lưu từ chối kèm ý kiến
$(".tychoi_post_mem").click(function(){
    var check_true = true;
    var id_post = $(this).attr('data');
    var message_tuchoi = $("textarea[name=message_tuchoi2]").val();
    if(message_tuchoi == ""){
        check_true = false;
        alert("Vui lòng nhập ý kiến đóng góp");
    }
    if(check_true == true){
        $.ajax({
            url: '../ajax/tuchoi_post_member2.php',
            type: 'POST',
            data: {id_post:id_post,message_tuchoi:message_tuchoi},
            success: function(data){
                if(data == ""){
                    window.location.reload();
                }
            }
        });
    }
})

// Click từ chối và cấm thành viên đăng bài - Bài viết đang chờ
$(".click_tuchoi2").click(function(){
    var id_user = $(this).attr('data');
    var id_group = $(this).attr('data1');
    var id_post = $(this).attr('data2');
    var type_author = $(this).attr('data-type-author');
    $.ajax({
        url: '../ajax/tuchoi_post_member3.php',
        type: 'POST',
        data: {id_user:id_user,id_group:id_group,id_post:id_post,type_author:type_author},
        success: function(data){
            if(data == ""){
                $(".refuse_and_prohibit_2").show();
                window.location.reload();
            }
            // console.log(data)
        }
    });
});

// Bài viết đang chờ
// Tìm kiếm ô input
$("input[name=search_post]").on("input", function(){
    var val_input = $(this).val();
    $(".posts_are_waiting_padding").each(function(){
        var content = $(this).find('.remove_elipsis2').html();
        if(content.includes(val_input)){
            $(this).show();
        }else{
            $(this).hide();     
        }
    });
})

// Lọc Mới/Cũ nhất
// $("select[name=search_new_old_pc]").change(function(){
//     var val_select = $(this).val();
//     var url = location.pathname;

//     var full_url = url+"?"+"new"+"="+val_select+"&"+"date"+"="+"&"+"author"+"="+"&"+"content"+"=";
//     console.log(full_url);
//     // window.location=full_url;
// });


function change_search(cs){
    var val_select_new = $("select[name=search_new_old_pc]").val();
    var val_input_date = $("input[name=search_date]").val();
    var val_select_author = $("select[name=search_author_pc]").val();
    var val_select_content = $("select[name=search_content_pc]").val();

    var url = location.pathname;
    // var full_url = url+"?"+"new"+"="+val_select+"&"+"date"+"="+"&"+"author"+"="+"&"+"content"+"=";

    console.log(val_select_new,val_input_date,val_select_author,val_select_content);
}




// Tìm kiếm theo ngày
// $("input[name=search_date]").change(function(){
//     var val_date = $(this).val();
//     var url = location.pathname;
//     var noi = url+"?"+'date'+'='+val_date;
//     window.location=noi;
// });

// Tìm kiếm yêu cầu thành viên
$("input[name=timkiem_yc_tv]").on("input", function(){
    var val_input = $(this).val();
    var innput_lowercase = val_input.toLowerCase();
    $(".yc_thanhvien_main_padding").each(function(){
        var content = $(this).find('.thanhvien_main_box1_info_text_name').html();
        var content_lowercase = content.toLowerCase();
        if(content_lowercase.includes(innput_lowercase)){
            $(this).show();
        }else{
            $(this).hide();     
        }
    })
})


// ------------------------- Nội dung thành viên báo cáo
// Giữ bài viết bị báo cáo
$(document).on('click', '.btn_keep_post_report', function() {
    if (confirm('Bạn có chắc muốn giữ bài viết và bỏ báo cáo này?')) {
        let report_id = $(this).attr('data-report');
        if ($(this).hasClass('all')) {
            var arr_report = []; 
            $('.member_report_news_one').each(function(){ 
                arr_report.push($(this).find('.btn_remove_post_report').attr('data-report'));
            });
            report_id = arr_report.join(',');
        } 
        let keep = callAjax('../ajax/keep_post_report.php', "POST", { report_id });
        if (keep.result) {
            if ($(this).hasClass('all')) {
                $('.member_report_news_one').remove();
            } else {
                $(this).parents('.member_report_news_one').remove();
            }
        }
    }
});

// gỡ bài viết bị báo cáo
$(document).on('click', '.btn_remove_post_report', function() {
    if (confirm('Bạn có chắc muốn gỡ bài viết?')) {
        let new_id = $(this).attr('data-new'),
            report_id = $(this).attr('data-report');
        if ($(this).hasClass('all')) {
            var arr_report = [];
                arr_new = [];
            $('.member_report_news_one').each(function(){ 
                arr_report.push($(this).find('.btn_remove_post_report').attr('data-report'));
                arr_new.push($(this).find('.btn_remove_post_report').attr('data-new'));
            });
            new_id = arr_new.join(',');
            report_id = arr_report.join(',');
        } 
        let remove = callAjax('../ajax/remove_post_report.php', "POST", { new_id, report_id });
        if (remove.result) {
            if ($(this).hasClass('all')) {
                $('.member_report_news_one').remove();
            } else {
                $(this).parents('.member_report_news_one').remove();
            }
        }
    }
}); 

$("input[name=day_one]").change(function(){
    var day_one = $(this).val();
    var day_two = $("input[name=day_two]").val();
    if(day_one != "" && day_two !=""){
        if(day_one > day_two){
            alert("Ngày thứ nhất không được lớn hơn ngày thứ hai");
        }else{
            var url = location.pathname;
            var result = url+'?'+'day1'+'='+day_one+'&'+'day2'+'='+day_two;
            window.location=result;
        }
    }

});
$("input[name=day_two]").change(function(){
    var day_two = $(this).val();
    var day_one = $("input[name=day_one]").val();
    

    if(day_one != "" && day_two !=""){
        if(day_one > day_two){
            alert("Ngày thứ nhất không được lớn hơn ngày thứ hai");
        }else{
            var url = location.pathname;
            var result = url+'?'+'day1'+'='+day_one+'&'+'day2'+'='+day_two;
            window.location=result;
        }
    }    
});

// Tìm kiếm file
$("input[name=search_file]").on("input", function(){
    var search_file = $(this).val();
    $(".file_rieng_main_two_sub").each(function(){
        var need_to_find = $(this).find(".file_rieng_main_two1_text").html();
        // console.log(need_to_find);
        if(need_to_find.includes(search_file)){
            $(this).show();
        }else{
            $(this).hide();
        }
    });
});



// Xem thêm bạn bè  / thành viên
$('.click_show_all_friend').click(function(){

    $(this).parents(".thanh_vien_block3_padding").find(".nth_child_friend").toggleClass("block_im");
    // var html_tg = ""
    // $(this).text("Thu Gọn");
});

// Gỡ quản trị viên
function remove_qtv(gqtv){
    var id_user = $(gqtv).parents(".go_loi_moi_padding").attr('data');
    var user_type = $(gqtv).parents(".go_loi_moi_padding").attr('data-user_type');
    var id_group = $(gqtv).parents(".thanh_vien_padding").attr('data');

    $.ajax({
        url: '../ajax/remove_qtv.php',
        type: 'POST',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            if(data == ""){
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
}

// Xóa thành viên
function delete_thanhvien(user_id,group_id,user_type=2){
    var el = $(event.target);
    var id_user = user_id;
    var id_group = group_id;
    $.ajax({
        url: '../ajax/delete_thanhvien.php',
        type: 'POST',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            // console.log(data);
            if(data == ""){
                window.location.reload();
                // alert("Đã xóa thành viên khỏi nhóm");
                // el.parents(".parent_member").remove();
            }else{
                alert("Error");
            }
        }
    });
}

// Gỡ vai trò người kiểm duyệt
function remove_kiemduyet(rkd){
    var id_user = $(rkd).parents(".go_loi_moi_padding").attr('data');
    var user_type = $(rkd).parents(".go_loi_moi_padding").attr('data-user_type');
    var id_group = $(rkd).parents(".thanh_vien_padding").attr('data');
    $.ajax({
        url: '../ajax/remove_kiemduyet.php',
        type: 'POST',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            // console.log(data);
            if(data == ""){
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
}

// Thêm làm quản trị viên
function add_qtv(them_qtv){
    var id_user = $(them_qtv).parents(".go_loi_moi_padding").attr('data');
    var user_type = $(them_qtv).parents(".go_loi_moi_padding").attr('data-user_type');
    var id_group = $(them_qtv).parents(".thanh_vien_padding").attr('data');
    // var type_invite = $(them_qtv).attr('data');
    var name_mem_invite = $(them_qtv).parents(".parent_member").find(".thanh_vien_block2_QTV_name").html();

    $(".click_gui_invite").attr('data',id_user);
    $(".click_gui_invite").attr('data-user_type',user_type);
    $(".click_gui_invite").attr('data1',id_group);
    // $(".click_gui_invite").attr('data2',type_invite);
    $(".appen_name_invite").html(name_mem_invite);
    
}
$(".click_gui_invite").click(function(){
    var id_user = $(this).attr('data');
    var user_type = $(this).attr('data-user_type');
    var id_group = $(this).attr('data1');
    // var type_invite = $(this).attr('data2');
    $.ajax({
        url: '../ajax/add_qtv.php',
        type: 'POST',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            // console.log(data);
            if(data == ""){
                alert("Mời thành công");
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});

// Thêm làm người kiểm duyệt
function add_censor_f(acf){
    var id_user = $(acf).parents(".go_loi_moi_padding").attr('data');
    var user_type = $(acf).parents(".go_loi_moi_padding").attr('data-user_type');
    var id_group = $(acf).parents(".thanh_vien_padding").attr('data');
    var name_mem_invite = $(acf).parents(".parent_member").find(".thanh_vien_block2_QTV_name").html();
    $(".click_gui_censor").attr('data', id_user);
    $(".click_gui_censor").attr('data-user_type', user_type);
    $(".click_gui_censor").attr('data1', id_group);
    $(".appen_name_censor").html(name_mem_invite);
}

$(".click_gui_censor").click(function(){
    var id_user = $(this).attr('data');
    var user_type = $(this).attr('data-user_type');
    var id_group = $(this).attr('data1');
    // console.log(id_user,id_group);
    $.ajax({
        url: '../ajax/add_censor.php',
        type: 'POST',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            // console.log(data);
            if(data == ""){
                alert("Mời thành công");
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});

// Chấp nhận làm quản lý
$(".accept_as_manager").click(function(){
    var invite_id = $(this).parents(".invite_group_div2").attr("data");
    var invite_type = $(this).parents(".invite_group_div2").attr("data1");
    $.ajax({
        url: '../ajax/accept_as_manager.php',
        type: 'POST',
        data: {invite_id:invite_id,invite_type:invite_type},
        success: function(data){
            // console.log(data) 
            if(data == ""){
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});

// Từ chối làm quản lý
$(".refuse_manager").click(function(){
    var invite_id = $(this).parents(".invite_group_div2").attr("data");
    $.ajax({
        url: '../ajax/refuse_manager.php',
        type: 'POST',
        data: {invite_id:invite_id},
        success: function(data){
            if(data == ""){
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});




// Gỡ lời mời vào nhóm
$(".go_loi_moi_group").click(function(){
    var id_user = $(this).parents(".go_loi_moi_padding").attr('data');
    var user_type = $(this).parents(".go_loi_moi_padding").attr('data-user_type');
    var id_group = $(this).parents(".thanh_vien_padding").attr('data');
    $.ajax({
        url: '../ajax/go_loi_moi_group.php',
        type: 'POST',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            // console.log(data);
            if (data == "") {
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});

// Gửi lời nhắc
$(".gui_loi_nhac_group").click(function(){
    var id_user = $(this).parents(".go_loi_moi_padding").attr('data');
    var user_type = $(this).parents(".go_loi_moi_padding").attr('data-user_type');
    var id_group = $(this).parents(".thanh_vien_padding").attr('data');
    $.ajax({
        url: '../ajax/gui_loi_nhac_group.php',
        type: 'POST',
        data: {
            id_user:id_user,
            user_type:user_type,
            id_group:id_group
        },
        success: function(data){
            // console.log(data);
            if (data == "") {
                alert("Gửi lời nhắc thành công");
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
})

// Click đình chỉ thành viên nhóm
$(".confirm_suspension").click(function(){
    var id_user = $(this).attr('data');
    var id_group = $(this).attr('data1');
    var suspension = $("input[name=member_suspension]:checked").val();
    // console.log(suspension);
    $.ajax({
        url: '../ajax/dinh_chi_thanh_vien.php',
        type: 'POST',
        data: {
            id_user:id_user,
            id_group:id_group,
            suspension:suspension,
        },
        success: function(data){
            // console.log(data);
            if (data == "") {
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});

// Mời bạn bè vào nhóm
$(".click_add_friend_new").click(function(){
    var arr_friend = [];
    var type_user = [];
    $("input[name=add_friend]:checked").each(function(){
        var val_friend = $(this).val();
        var val_type = $(this).parents(".khoi_add_friend_block").attr('data-type');
        arr_friend.push(val_friend);
        type_user.push(val_type);
    });
    var id_group = $(this).attr('data');

    $.ajax({
        url: '../ajax/add_friend_group.php',
        type: 'POST',
        data: {
            arr_friend:arr_friend,
            type_user:type_user,
            id_group:id_group,
        },
        success: function(data){
            // console.log(data);
            if (data == "") {
                alert("Mời bạn bè thành công");
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});



// Click ảnh nhóm
$(".click_thay_panner").click(function(){
    $(".file_img_group").click();
});
$(".file_img_group").change(function(){
    var avt_group = $(this).prop("files")[0];
    var id_group = $(this).attr('data-id-group');
    var fd = new FormData();
    fd.append('avt_group', avt_group);
    fd.append('id_group', id_group);

    $.ajax({
        url: '../ajax/avatar_group.php',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data){
            // console.log(data);
            if(data == ""){
                window.location.reload();
            }else{
                alert(data);
            }
        }
    });
});

// Lọc Nội dung của bạn
$("select[name=loc_post_my_content]").change(function(){
    var val_option = $(this).val();
    var url = location.pathname;
    var noi = url+"?"+'find'+'='+val_option;
    window.location=noi;
});



// Hoàn tác bài viết
// $(".hoan_tac").click(function(){
//     var id_post_hide = $(this).attr('data-post');
//     $.ajax({
//         url:'../ajax/hoan_tac_posts.php',
//         type: 'POST',
//         data:{id_post_hide:id_post_hide},
//         success: function(data){
//             // console.log(data);
//             if (data == "") {
//                 window.location.reload();
//             }else{
//                 alert('Error');
//             }
//         }
//     });
// });


// Tìm hiểu thêm nhóm
$(".click_timhieuthem").click(function(){
    $(".hide_chung").hide();
    $(".hide_right").hide();
    $(".tim_hieu_them").show();
    $(".hide_ganh").removeClass("border_bt_blue");
    $(".hide_ganh").removeClass("active_text");
});

// Tạm dừng nhóm
$(".click_group_pause").click(function(){
    var id_group = $(this).attr('data-id');
    var group_pause_val = $("input[name=group_pause]:checked").val();

    $.ajax({
        url: '../ajax/group_pause.php',
        type: 'POST',
        data: {
            id_group:id_group,
            group_pause_val:group_pause_val,
        },
        success: function(data){
            // console.log(data);
            if (data == "") {
                window.location.reload();
            }else{
                alert('Error');
            }
        }
    });
});


// Thêm cuộc thăm dò ý kiến
var html_poll = '<div class="poll_main_option_one"><div class="poll_main_option_one_suv"><input type="text"placeholder="Vui lòng nhập lựa chọn"></div><div class="poll_head_img" onclick="close_poll(this)"><img src="../img/image_new/x_17.svg" alt=""></div></div>';

$(".click_poll").click(function(){
    $(this).parents(".poll_main").find(".poll_main_option").append(html_poll);
});
function close_poll(close_p){
    $(close_p).parents(".poll_main_option_one").remove();
}
$(".close_pp_poll").click(function(){
    $(this).parents(".poll").remove();
    $(".add_new_post").css({
        'margin-top': '185px'
    });
});

$(".click_show_post_calendar").click(function(){
    $(".popup_post_calendar").show();
});

$(".click_save_calendar").click(function(){
    var calendar_date = $("input[name=calendar_date]").val();
    var calendar_time = $("input[name=calendar_time]").val();

    var n_date = new Date();


    $(".click_show_post_calendar").attr('data-date', calendar_date);
    $(".click_show_post_calendar").attr('data-time', calendar_time);

    $(this).parents(".popup_post_calendar").hide();

    // var g_date = n_date.getDate();
    // var g_month = n_date.getMonth() + 1;
    // var g_year = n_date.getFullYear();


    // var day = cDay + "/" + cMonth + "/" + cYear;
    // var time = n_date.getHours() + ":" + n_date.getMinutes() + ":" + n_date.getSeconds();


    // console.log(day, time);

})

$(".close_popup_post_calendar").click(function(){
    $(this).parents(".popup_post_calendar").hide();
});

// Cho phép chọn nhiều câu trả lời
$(".click_multiple_answers").click(function(){
    $(this).parents(".add_option_pol").find(".abs_option").toggle();
});


// ----------------- POPUP Error
// Đóng
$(".popup_error_btn").click(function(){
    $(this).parents(".popup_error").hide();
});

// Popup error QTV tắ tính năng đăng bài với thành viên
$(".show_popup_error").click(function(){
    $(".popup_error_tex").html("Quản trị viên đã tắt tính năng đăng bài")
    $(".popup_error").show();
});

// Popup error tạm dừng nhóm
$(".popup_group_pause").click(function(){
    var time = $(".class_important").attr('data-time');
    $(".popup_error_tex").html("Quản trị viên đã tạm dừng nhóm đến " + time);
    $(".popup_error").show();
});

// Popup error cấm thành viên đăng bài
$(".cam_thanhvien_dangbai").click(function(){
    $(".popup_error_tex").html("Bạn đẵ bị Quản Trị Viên cấm đăng bài");
    $(".popup_error").show();
})

// Popup đình chỉ thành viên
$(".click_dinh_chi").click(function(){
    var time = $(".class_important").attr('data-time');
    $(".popup_error_tex").html("Bạn đẵ bị Quản Trị Viên đình chỉ đến " + time);
    $(".popup_error").show();
})



// CLick Thăm dò ý kiến
$(".click_thamdoykien").click(function(){
    $(".popup_post").show();
    $(".click_show_poll").click();
});



// Show POPUP tìm hoặc hỗ trợ bài viết
$(".click_tim_or_sup_post").click(function(){
    $(".sup_news").show();
});



// Bật thông báo nội dung của bạn
$(".click_notion_on").click(function(){

})

$(".click_noti_on").click(function(){
    var id_post = $(this).parents(".pick_id_post_hide").attr('data-new_id');
    $.ajax({
        url: '../ajax/notify_on.php',
        type: 'POST',
        data: {id_post:id_post},
        success: function(data){
            // console.log(data);
            if (data == "") {
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});



// xem chi tiết bào viết bị gỡ
$(document).on('click', '.detail_my_removed_content', function() { 
    var name_group = $(this).parents(".posts_are_waiting_padding").find(".gim_bai_viet_box1_info_text_name").html(),
        id_post = $(this).parents(".posts_are_waiting_padding").attr('data-id-new'),
        type_post = $(this).parents(".posts_are_waiting_padding").attr('data-new-type');

    $(".name_tuchoi_group").html(name_group);
    $(".btn_update_post_removed").attr('data-new_id',id_post);
    $(".btn_update_post_removed").attr('data-new_type',type_post);

    let box_post = $(this).parents('.posts_are_waiting_padding').html(),
        message = $(this).attr('data-message');
    $(".pp_my_removed_content .my_content_pp_main_post_cha").html(`
        <div class="my_content_pp_main_post_padding">
            ${box_post}
        </div>
        <h2 class="text_yc_donggop">Ý kiến đóng góp</h2>
        <p class="noidung_donggop">
            ${message}
        </p>
    `);
    $(".pp_my_removed_content").show();
    $(".pp_my_removed_content .my_content_pp_main_post_padding .posts_are_waiting_three").remove();
});
$(document).on('click', '.btn_update_post_removed', function() { 
    let new_id = $(this).attr('data-new_id');
    $('.posts_are_waiting_padding[data-new='+new_id+'] .ep_post_action1_deatail_edit.show_post_schedule').click();
});

$(".dang_calendar").click(function(){
    var id_new = $(this).parents(".posts_are_waiting_padding").attr('data-new');

    $.ajax({
        url: '../ajax/dang_ngay_calendar.php',
        type: 'POST',
        data: {id_new:id_new},
        success: function(data){  
            if (data == "") {
                location.reload();
            }else{
                alert("Error");
            }
        }
    });
});

// Xóa bài viết 
function xoa_post_group(id_new){
    $(".del_post_cancel_del").attr('data-new-id',id_new);
    $('.del_post').show();
}

$(".del_post_cancel_del").click(function () {
    var id_post = $(this).attr('data-new-id'),
        del = handle.callAjax('../ajax/xoa_bai_viet_group.php', 'POST', { id_post });
    if (del.result) {
        $(".del_post").hide();
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Xóa bài viết thành công");
    } else {
        alert(del.msg);
    } 
});

// từ chối bài viết đang chờ duyệt
$(document).on('click', '.refuse_post_member_group', function() {
    var form_data = new FormData(),
        new_id = $(this).attr('data');
    if ($(this).hasClass('refuse_post_group_message')) {
        var message_tuchoi = $(this).parents('.tcdg_padding_main').find("textarea[name=message_tuchoi2]").val();
        if(message_tuchoi){
            form_data.append('message', message_tuchoi);
        } else {
            alert("Vui lòng nhập ý kiến đóng góp");
            return false;
        }
    }
    if ($(this).hasClass('refuse_post_group_all')) {
        var lst_new_id = [];
        $("input[name=check_one]").each(function(){
            if ($(this).is(":checked")) {
                lst_new_id.push($(this).val());
            }
        });
        new_id = lst_new_id.join();
    }
    if ($(this).hasClass('refuse_post_group_author')) {
        var author = $(this).attr('data-author'),
            type_author = $(this).attr('data-type-author'),
            id_group = $(this).attr('data-group');
        form_data.append('author', author);
        form_data.append('type_author', type_author);
        form_data.append('id_group', id_group);
    }
    form_data.append('new_id', new_id);
    $.ajax({
        url: '../ajax/refuse_post_member_group.php',
        type: 'POST',
        async: false,
        data: form_data, 
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            window.location.reload();
        }
    });
});

// phê duyệt bài viết đang chờ duyệt 
$(document).on('click', '.approve_post_member_group', function() {
    var id_post = $(this).attr('data');
    if ($(this).hasClass('approve_post_member_all')) {
        var lst_new_id = [];
        $("input[name=check_one]").each(function(){
            if ($(this).is(":checked")) {
                lst_new_id.push($(this).val());
            }
        });
        id_post = lst_new_id.join();
    }
    $.ajax({
        url: '../ajax/duyet_post_member.php',
        type: 'POST',
        data: {id_post:id_post},
        success: function(data){
            if(data == ""){
                window.location.reload();
            }
        }
    });
});

// đổi lịch đăng bài viết nhóm
$(document).on('click', '.upadte_schedule_post', function() {
    var id_new = $(this).parents(".posts_are_waiting_padding").attr('data-new'),
        date = $(this).attr('data-date'),
        time = $(this).attr('data-time');
    $(".popup_post_calendar").show();
    $(".popup_post_calendar .popup_post_calendar_head_text").text('Đổi lịch bài đăng');
    $(".popup_post_calendar .class_btn_popup_post").removeClass('click_save_calendar')
                                                    .addClass('upadte_schedule_post_group')
                                                    .attr('data-new', id_new);
    $(".popup_post_calendar input[name='calendar_date']").val(date);                                                
    $(".popup_post_calendar input[name='calendar_time']").val(time);                                                
});
$(document).on('click', '.upadte_schedule_post_group', function() {
    let id_new = $(this).attr('data-new'),
        calendar_date = $("input[name=calendar_date]").val(),
        calendar_time = $("input[name=calendar_time]").val(),
        show_time = calendar_date + ' ' + calendar_time; 
    if (!show_time.trim()) {
        alert("Chưa chọn thời gian đổi lịch");
        $(".popup_post_calendar").show();
    } else {
        let date_show_time = new Date(show_time),
            currentdate = new Date();
        if (date_show_time.getTime() > currentdate.getTime()) {
            let update = handle.callAjax('../ajax/upadte_schedule_post_group.php', "POST", { id_new, show_time });
            alert(update.msg);
            if (update.result) {
                location.reload();
            }
        } else {
            alert("Chưa chọn thời gian lớn hơn thời gian hiện tại");
            $(".popup_post_calendar").show();
        }
    }
});

// ================================= PAGE CÀI ĐẶT NHÓM ================================
function callAjax(url, type = "POST", data, async = false) {
    var res
    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: 'JSON',
        async: async,
        success: function(output) { 
            res = output
        }
    });
    return res;
} 
// click tên và mô tả
$(".click_name_and_des").click(function(){
    let name_group = $(this).attr('data-name_group'),
        desc_group = $(this).attr('data-desc_group');
    $(".ten_and_des").show();
    $(".ten_and_des .box_name_group input").val(name_group);
    $(".ten_and_des .box_desc_group textarea").val(desc_group);
    $(".ten_and_des .setting_err").html('');
});
// X tên và mô tả
$(".x_name_and_des").click(function(){
    $(this).parents(".ten_and_des").hide();
})
$(window).click(function(e){
    var a = $(".click_name_and_des");
    var popup = $(".ten_and_des_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".ten_and_des").hide();
    }
});
// cập nhật Tên và mô tả
$(document).on('click', '.ten_and_des .save_name_des', function() { 
    var check = true,
        id_group = $(this).attr('data'),
        name_group = ($(".ten_and_des input[name=name_group]").val()).trim(),
        desc_group = ($(".ten_and_des textarea[name=desc_group]").val()).trim();
    if (!name_group) {
        $(".ten_and_des .box_name_group .setting_err").html('Chưa nhập tên nhóm');
        check = false;
    } else {
        $(".ten_and_des .box_name_group .setting_err").html('');
    }
    if (!desc_group) {
        $(".ten_and_des .box_desc_group .setting_err").html('Chưa nhập mô tả nhóm');
        check = false;
    } else {
        $(".ten_and_des .box_desc_group .setting_err").html('');
    }
    if (check) {
        let update = callAjax('../ajax/edit_name_des.php', "POST", { id_group, name_group, desc_group });
        alert(update.msg);
        if (update.result) {
            $(".click_name_and_des").attr('data-name_group', name_group).attr('data-desc_group', desc_group);
            $(".ten_and_des").hide();
        } 
    } 
});


// click phần giới thiệu thành viên mới
$(".click_phan_gt").click(function(){
    let introduce = $(this).attr('data-introduce'),
        show_rules = $(this).attr('data-show_rules'),
        el_rules = $(".gioi_thieu_tvm .active_rules");
    $(".gioi_thieu_tvm").show();
    $(".gioi_thieu_tvm .box_introduce_group textarea").val(introduce);
    if(show_rules == 1){
        el_rules.prop('checked', true);
        el_rules.addClass("back_blue");
        el_rules.removeClass("back_fff");
        el_rules.addClass("cham_affter");
    }else{
        el_rules.prop('checked', false);
        el_rules.removeClass("back_blue");
        el_rules.addClass("back_fff");
        el_rules.removeClass("cham_affter");
    }
    $(".gioi_thieu_tvm .setting_err").html('');
});
$(".hide_phan_gt").click(function(){
    $(".gioi_thieu_tvm").hide();
});
$(document).on('click', '.gioi_thieu_tvm .btn_update_thong_diep', function() { 
    $(this).parents('.box_active_thong_diep').css('display', 'none');
    $(this).parents('.create_group_rules_main').find('.box_detail_thong_diep').css('display', 'block');
});
$(document).on('click', '.gioi_thieu_tvm .x_phan_gt', function() { 
    $(this).parents('.box_detail_thong_diep').css('display', 'none');
    $(this).parents('.create_group_rules_main').find('.box_active_thong_diep').css('display', 'flex');
}); 
$(window).click(function(e){
    var a = $(".click_phan_gt");
    var popup = $(".gioi_thieu_tvm_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".gioi_thieu_tvm").hide();
    }
});
$(document).on('click', '.active_rules', function() { 
    let el = $(this);
    if(el.is(":checked")){
        el.addClass("back_blue");
        el.removeClass("back_fff");
        el.addClass("cham_affter");
    }else{
        el.removeClass("back_blue");
        el.addClass("back_fff");
        el.removeClass("cham_affter");
    }
});
// cập nhật giới thiệu
$(document).on('click', '.save_introduce', function() {
    var check = true,
        id_group = $(this).attr('data'),
        introduce = ($(".gioi_thieu_tvm textarea[name=introduce_group]").val()).trim(),
        show_rules = $('.gioi_thieu_tvm input[name=check_show_rules]').is(":checked") ? 1 : 0;
    if (!introduce) {
        $(".gioi_thieu_tvm .box_introduce_group .setting_err").html('Chưa nhập thông điệp giới thiệu');
        check = false;
    } else {
        $(".gioi_thieu_tvm .box_introduce_group .setting_err").html('');
    }
    if (check) {
        let update = callAjax('../ajax/update_introduce.php', "POST", { id_group, introduce, show_rules });
        if (update.result) {
            $(".click_phan_gt").attr('data-introduce', introduce).attr('data-show_rules', show_rules);
            $('.gioi_thieu_tvm .x_phan_gt').click();
        } else {
            alert(update.msg);
        }
    }  
});
$(document).on('click', '.active_introduce', function() { 
    let el = $(this);
    if(el.is(":checked")){
        el.addClass("back_blue");
        el.removeClass("back_fff");
        el.addClass("cham_affter");
    }else{
        el.removeClass("back_blue");
        el.addClass("back_fff");
        el.removeClass("cham_affter");
    }
    let show_introduce = $('.gioi_thieu_tvm input[name=check_show_introduce]').is(":checked") ? 1 : 0,
        id_group = $(this).attr('data'),
        update = callAjax('../ajax/update_introduce.php', "POST", { id_group, show_introduce });

    if (update.result) {
        $('.content_active_thongdiep').text(show_introduce?'Bật':'Tắt');
        alert(update.msg);
        $(".hide_phan_gt").click();
    }
});


// Quyền riêng tư
// Click quyền riêng tư
$(".click_quyenriengtu").click(function(){ 
    let group_mode = $(this).attr('data-group_mode');
    $(".quyen_rieng_tu").show(); 
    if (group_mode == 1) {
        $(".quyen_rieng_tu .quyen_rieng_tu_main").html(`
            <div class="quyen_rieng_tu_2">
                <div class="quyen_rieng_tu_main_check_one">
                    <div class="quyen_rieng_tu_main_check_one_ic"><img src="../img/image_new/lock.svg" alt=""></div>
                    <div class="quyen_rieng_tu_main_check_one_text">
                        <h3 class="quyen_rieng_tu_main_check_one_text_h3">Riêng tư</h3>
                        <p class="quyen_rieng_tu_main_check_one_text_p">Chỉ thành viên mới nhìn thấy mọi người trong nhóm và những gì họ đăng</p>
                    </div>
                </div>
                <div class="quyen_rieng_tu_2_text">Để bảo vệ quyền riêng tư của thành viên nhóm, bạn không thể chuyển nhóm riêng tư thành công khai. Bạn sẽ quản lý được ai có thể tìm và tham gia nhóm này thông qua các tùy chọn cài đặt Ẩn nhóm và Ai có thể tham gia nhóm.</div>
            </div>
        `); 
    }
})
// X quyền riêng tư
$(".x_quyenriengtu").click(function(){
    $(this).parents(".quyen_rieng_tu").hide();
});
$(window).click(function(e){
    var a = $(".click_quyenriengtu");
    var popup = $(".quyen_rieng_tu_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".quyen_rieng_tu").hide();
    }
});
// cập nhật Quyền riêng tư
$(document).on('click', '.quyen_rieng_tu .save_privacy', function() {
    var id_group = $(this).attr('data'),
        check_privacy = $("input[name=check_privacy]:checked").val(),
        update = callAjax('../ajax/edit_privacy.php', 'POST', { id_group, check_privacy });
    if (update.result) {
        $('.content_privacy').text((check_privacy == 0)?'Công khai':'Riêng tư');
        $('.click_quyenriengtu').attr('data-group_mode', check_privacy);
        alert(update.msg);
        $(".x_quyenriengtu").click();
    }  
});


//  Ẩn nhóm
$(".click_an_nhom").click(function(){
    let hide_show = $(this).attr('data-hide_show');
    $(".an_nhom").show();
    $("input[name=an_hien][value=" + hide_show + "]").prop('checked', true);
})
$(".x_an_nhom").click(function(){
    $(this).parents(".an_nhom").hide();
})
$(window).click(function(e){
    var a = $(".click_an_nhom");
    var popup = $(".an_nhom_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".an_nhom").hide();
    }
}); 
// POPUP Ẩn nhóm
$(document).on('click', '.an_nhom .save_hide_show', function() {
    var id_group = $(this).attr('data'),
        an_hien = $("input[name=an_hien]:checked").val(),
        update = callAjax('../ajax/edit_hide_show.php', 'POST', { id_group, an_hien });
    if (update.result) {
        $('.content_hide_show').text((an_hien == 0)?'Hiển thị':'Đã ẩn');
        $('.click_an_nhom').attr('data-hide_show', an_hien);
        alert(update.msg);
        $(".x_an_nhom").click();
    }  
});


// Vị trí
$(".stgr_click_vitri").click(function(){
    $(".setting_vitri").show();
});
$(window).click(function(e){
    var a = $(".stgr_click_vitri");
    var popup = $(".setting_vitri");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".setting_vitri").hide();
    }
});
// Tìm kiếm vị trí
$(".pp_vi_tri_timkiem .search_vitri").on("input", function(){
    var val_input = $(this).val();
    $(".pp_vi_tri_diachi .pp_vi_tri_diachi_text").each(function(){
        var content = $(this).html(); 
        if(content.toLowerCase().includes(val_input.toLowerCase())){
            $(this).show();
        }else{
            $(this).hide();     
        }
    });
})
// cập nhật Vị trí
function lay_text(t_vtri){
    var id_group = $(t_vtri).parents(".pp_vi_tri_diachi").attr('data'),
        text_vitri = $(t_vtri).text(),
        update = callAjax('../ajax/edit_location_group.php', 'POST', { id_group, text_vitri });
    if (update.result) {
        $('.content_location').text(text_vitri); 
        alert(update.msg);
        $(t_vtri).parents('.setting_vitri').hide();
    }  
}


// Quản lý thành viên
$(".click_qltv").click(function(){
    let qltv = $(this).attr('data-pheduyet');
    $(".ql_thanhvien").show();
    $("input[name=qltv][value=" + qltv + "]").prop('checked', true);
});
$(".x_qltv").click(function(){
    $(this).parents(".ql_thanhvien").hide();
});
$(window).click(function(e){
    var a = $(".click_qltv");
    var popup = $(".ql_thanhvien_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".ql_thanhvien").hide();
    }
});
// Phê duyệt yêu cầu của thành viên
$(document).on('click', '.ql_thanhvien .save_qltv', function() { 
    var id_group = $(this).attr('data'),
        qltv = $("input[name=qltv]:checked").val(),
        update = callAjax('../ajax/phe_duyet_yc_thanhvien.php', 'POST', { id_group, qltv });
    if (update.result) {
        $('.content_pheduyet').text((qltv == 0)?'Chỉ quản trị viên và người kiểm duyệt':'Bất cứ ai trong nhóm');
        $('.click_qltv').attr('data-pheduyet', qltv);
        alert(update.msg);
        $(".x_qltv").click();
    }   
});


// Nội dung thảo luận
// - ai có thể đăng
$(".click_nd_thaoluan").click(function(){
    let nd_thaoluan = $(this).attr('data-who_post');
    $("input[name=nd_thaoluan][value=" + nd_thaoluan + "]").prop('checked', true);
    $(".noidung_thaoluan").show();
});
$(".x_nd_thaoluan").click(function(){
    $(this).parents(".noidung_thaoluan").hide();
});
$(window).click(function(e){
    var a = $(".click_nd_thaoluan");
    var popup = $(".noidung_thaoluan_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".noidung_thaoluan").hide();
    }
}); 
// -------------------------- Ai có thể đăng
$(".save_nd_thaoluan").click(function(){
    var id_group = $(this).attr('data'),
        nd_thaoluan = $("input[name=nd_thaoluan]:checked").val(),
        update = callAjax('../ajax/who_can_post.php', 'POST', { id_group, nd_thaoluan });
    if (update.result) {
        $('.content_who_can_post').text((nd_thaoluan == 0)?'Bất cứ ai trong nhóm':'Chỉ quản trị viên');
        $('.click_nd_thaoluan').attr('data-who_post', nd_thaoluan);
        alert(update.msg);
        $(".x_nd_thaoluan").click();
    }    
});


// - phê duyệt bài viết của thành viên
$(".click_pd_posts").click(function(){
    let pd_post = $(this).attr('data-pd_post');
    $("input[name=pd_post][value=" + pd_post + "]").prop('checked', true);
    $(".phe_duyet_posts_member").show();
});
$(".x_pheduyet_posts").click(function(){
    $(this).parents(".phe_duyet_posts_member").hide();
});
$(window).click(function(e){
    var a = $(".click_pd_posts");
    var popup = $(".phe_duyet_posts_member_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".phe_duyet_posts_member").hide();
    }
}); 
// ------------------------- Phê duyệt bài viết của thành viên
$(".save_phe_duyet_posts").click(function(){
    var id_group = $(this).attr('data'),
        pd_post = $("input[name=pd_post]:checked").val(),
        update = callAjax('../ajax/phe_duyet_posts_member.php', 'POST', { id_group, pd_post });
    if (update.result) {
        $('.content_pheduyet_post').text((pd_post == 0)?'Bật':'Tắt');
        $('.click_pd_posts').attr('data-pd_post', pd_post);
        alert(update.msg);
        $(".x_pheduyet_posts").click();
    }   
});


// phê duyệt bài nội dung chỉnh sửa
$(".click_pd_edit").click(function(){
    let pd_post_edit = $(this).attr('data-pd_edit');
    $("input[name=pd_post_edit][value=" + pd_post_edit + "]").prop('checked', true);
    $(".phe_duyet_edit_member").show();
});
$(window).click(function(e){
    var a = $(".click_pd_edit");
    var popup = $(".phe_duyet_edit_member_padding");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".phe_duyet_edit_member").hide();
    }
});
$(".x_pheduyet_edit").click(function(){
    $(this).parents(".phe_duyet_edit_member").hide();
});
// ------------------------- Phê duyệt nội dung chỉnh sửa
$(".save_pd_post_edit").click(function(){
    var id_group = $(this).attr('data'),
        pd_post_edit = $("input[name=pd_post_edit]:checked").val(),
        update = callAjax('../ajax/phe_duyet_noidung_edit.php', 'POST', { id_group, pd_post_edit });
    if (update.result) {
        $('.content_pheduyet_nd').text((pd_post_edit == 0)?'Bật':'Tắt');
        $('.click_pd_edit').attr('data-pd_edit', pd_post_edit);
        alert(update.msg);
        $(".x_pheduyet_edit").click();
    }    
})

// ================================= END PAGE CÀI ĐẶT NHÓM ================================

// Bỏ theo dõi nhóm
function follow_group(e, type, id_group, name_group) {
    if (type == 1) { // bỏ theo dõi
        if (confirm('Bạn có chắc muốn bỏ theo dõi nhóm '+name_group+' không?')) {
            let unfollow = callAjax('../ajax/follow_group.php', 'POST', { id_group, type });
            if (unfollow.result) {
                alert('Bỏ theo dõi nhóm '+name_group+' thành công.');
                $(e).parents('.box_contain_list_post').find('.btn_unfollow_group').remove();
            }
        }
    } else { // theo dõi

    }
} 
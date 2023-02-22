function toggleHtml() {
    $('.btn_see_move .the_p_semove').html("Ẩn bớt");
    $('.btn_see_move img').attr('src', '../img/img27.png');
}

function toggleHtml2() {
    $('.btn_see_move .the_p_semove').html("Xem thêm");
    $('.btn_see_move img').attr('src', '../img/img22.png');
}

$('.btn_see_move').click(function() {
    console.log(111);
    var j = -1;
    for (var i = 0; i < $('.v_ttnm_tbody').find('.v_item_ttnm').length; i++) {
        if ($('.v_ttnm_tbody').find('.v_item_ttnm').eq(i).css('display') == 'flex') {
            j++;
        }
    }
    for (var i = (j + 1); i < (j + 4); i++) {
        $('.v_ttnm_tbody').find('.v_item_ttnm').eq(i).css('display','flex');
        j++;
    }
    // if (j == $('.v_ttnm_tbody').find('.v_item_ttnm').length - 1) {
    //     $(this).find('.the_p_semove').text('Ẩn bớt').next().attr('src','../img/img27.png');
    // }
})

$('.btn_toggle_row_del').click(function() {
    $(this).parents('.row_main_nkdh').find('.muiten_xoay').toggleClass('xoay_90_do');
    $(this).parents('.row_main_nkdh').find('.nkdh_body').slideToggle(400);
    $(this).parents('.row_main_nkdh').find('.nkdh_header').toggleClass("box_mb_20");
})


var array = ['btn_manage_cdc', 'btn_manage_ttcn', 'btn_manage_ttbm', 'btn_manage_nkhd', 'btn_manage_dstv', 'btn_manage_group_tl'];
var array2 = ['manage_cdc', 'manage_ttcn', 'manage_ttbm', 'manage_nkhd', 'manage_group_tl'];;

function test_each($bien1) {

}
$('.show_ns_thuc_hien_quan_ly').each(function() {
    $(this).click(function() {
        if ($('.show_ns_thuc_hien_quan_ly') != $(this)) {
            $('.show_ns_thuc_hien_quan_ly').parents('.p-nhansu').find('.popup_list_NGV').hide();
        }
        $(this).parents('.p-nhansu').find('.popup_list_NGV').toggle();
    })
})

var manage_header_hover = $('.manage_header_hover');
var manage_header = $('.box_center .box_manage .manage_header');
$('.manage_header_hover').click(function() {
    manage_header.show();
})
$('.li_manage').click(function() {
    var data_id = $(this).attr('data-id');
    var data_html = $(this).text();
    $('.li_manage').each(function() {
        $(this).removeClass('active');
    });
    $('.manage_main>div').fadeOut(400);
    $(this).addClass('active');
    $('.manage_main .' + data_id).fadeIn(400);
    $('.title_hover').html(data_html);
})



$(" input.check_language").change(function() {
    $(" input.check_language").parents('.flex_language').find('span.span_language').addClass('color_x');
    $(" input.check_language").parents('.flex_language').find('span.span_language').removeClass('color_blue');
    $(this).parents('.flex_language').find('span.span_language').addClass('color_blue');
    $(this).parents('.flex_language').find('span.span_language').removeClass('color_x');
})


var show_popup_qlpqnd = $('.show_popup_qlpqnd');
var popup_qlpqnd = $('#popup_qlpqnd');
show_popup_qlpqnd.click(function() {
    popup_qlpqnd.show();
})

var show_popup_edit_tncn = $('.show_popup_edit_tncn');
var popup_edit_tncn = $('#popup_edit_tncn');
show_popup_edit_tncn.click(function() {
    popup_edit_tncn.show();
})

var show_popup_logout_equipment = $('.show_popup_logout_equipment');
var popup_logout_equipment = $('.popup_logout_equipment');
show_popup_logout_equipment.click(function() {
    popup_logout_equipment.show();
})
var popup_logout_eqm_success = $('.popup_logout_eqm_success');
$('.submit_logout_eqm').click(function() {
    popup_logout_equipment.hide();
    popup_logout_eqm_success.show();
})

var show_popup_change_pass = $('.show_popup_change_pass');
var popup_change_pass = $('#popup_change_pass');
show_popup_change_pass.click(function() {
    popup_change_pass.show();
})

var back_popup_change_pass = $('.back_popup_change_pass');
back_popup_change_pass.click(function() {
    popup_change_pass.hide();
})

var show_popup_quen_pass = $('.show_popup_quen_pass');
var popup_quen_pass = $('#popup_quen_pass');
show_popup_quen_pass.click(function() {
    popup_quen_pass.show();
})

var close_popup_quen_pass = $('.close_popup_quen_pass');
close_popup_quen_pass.click(function() {
    popup_quen_pass.hide();
})

var submit_popup_quen_pass = $('.submit_popup_quen_pass');
var popup_khoiphuc_pass = $('#popup_khoiphuc_pass');
submit_popup_quen_pass.click(function() {
    popup_khoiphuc_pass.show();
})

var close_popup_khoiphuc_pass = $(".close_popup_khoiphuc_pass");
close_popup_khoiphuc_pass.click(function() {
    popup_khoiphuc_pass.hide();
})
var submit_khoiphuc_pass = $('.submit_khoiphuc_pass');
submit_khoiphuc_pass.click(function() {
    popup_khoiphuc_pass.hide();
    popup_quen_pass.hide();
    popup_change_pass.hide();
})

var show_popup_del_nkhd = $('.show_popup_del_nkhd');
var popup_del_nkhd = $('#popup_del_nkhd');
show_popup_del_nkhd.click(function() {
    popup_del_nkhd.show();
})

var submit_popup_del_nkhd = $('.submit_popup_del_nkhd');
var popup_sucuss_del_nkhd = $('.popup_sucuss_del_nkhd');
submit_popup_del_nkhd.click(function() {
    popup_sucuss_del_nkhd.show();
    popup_del_nkhd.show();
})

var submit_tuchoi_cd = $('.submit_tuchoi_cd');
var popup_tuchoi_nv_succuss = $('#popup_tuchoi_nv_succuss');
submit_tuchoi_cd.click(function() {
    popup_tuchoi_nv_succuss.show();
})

var submit_duyet_cd = $('.submit_duyet_cd');
var popup_duyet_nv_succuss = $('#popup_duyet_nv_succuss');
submit_duyet_cd.click(function() {
    popup_duyet_nv_succuss.show();
})

$('.submit_duyet_nv_succuss').click(function() {
    popup_duyet_nv_succuss.hide();
    popup_ctnvcpd.hide();
})

$('.submit_tuchoi_nv_succuss').click(function() {
    popup_ctnvcpd.hide();
    popup_tuchoi_nv_succuss.hide();
})

var popup_add_group_tl = $('#popup_add_group_tl');
$('.btn_create_group_tl').click(function() {
    popup_add_group_tl.show();
})
var show_model_del_group_tl = $('#v_tbody_group .show_model_del_group_tl');
var model_del_group_tl = $('.model_del_group_tl');

function delete_group(e) {
    var group_id = $(e).data('group_id');
    model_del_group_tl.fadeIn("", function() {
        $(".submitdel_group_tl").click(function() {
            $(".v_load_del_group").show();
            $(".submitdel_group_tl_text").hide();
            $.ajax({
                url: '../ajax/delete_group.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    group_id: group_id
                },
                success: function(data) {
                    $("#v_tbody_group").html(data.html);
                    $(".v_load_del_group").hide();
                    $(".submitdel_group_tl_text").show();
                    $(".model_del_group_tl").fadeOut();

                }
            });

        });
    });
}

// var submitdel_group_tl = $('.submitdel_group_tl');
// var popup_sucuss_del_gr_tl = $('.popup_sucuss_del_gr_tl');
// submitdel_group_tl.click(function() {
//     popup_sucuss_del_gr_tl.show();
//     model_del_group_tl.hide();
// })





var close_detl = $('.close_detl');
close_detl.click(function() {
    popup_qlpqnd.hide();
    popup_edit_tncn.hide();
    popup_add_group_tl.hide();
})
var btn_huy = $('.btn_huy');
btn_huy.click(function() {
    popup_edit_tncn.hide();
    popup_logout_equipment.hide();
    popup_del_nkhd.hide();
    popup_add_group_tl.hide();
    model_del_group_tl.hide();;
})

$('.btn_close_ctnv').click(function() {
    $('#popup_ctnv').hide();
})

$(window).click(function(e) {

    if ($(e.target).is("#popup_qlpqnd")) {
        $("#popup_qlpqnd").hide();
    }

    if ($(e.target).is("#popup_edit_tncn")) {
        $("#popup_edit_tncn").hide();
    }

    if ($(e.target).is(".popup_logout_equipment")) {
        $(".popup_logout_equipment").hide();
    }

    if ($(e.target).is(".popup_logout_eqm_success")) {
        $(".popup_logout_eqm_success").hide();
    }

    if ($(e.target).is("#popup_change_pass")) {
        $("#popup_change_pass").hide();
    }

    if ($(e.target).is("#popup_quen_pass")) {
        $("#popup_quen_pass").hide();
    }

    if ($(e.target).is("#popup_khoiphuc_pass")) {
        $("#popup_khoiphuc_pass").hide();
    }

    if ($(e.target).is("#popup_del_nkhd")) {
        $("#popup_del_nkhd").hide();
    }

    if ($(e.target).is(".popup_sucuss_del_nkhd")) {
        popup_sucuss_del_nkhd.hide();
        $('#popup_del_nkhd').hide();
    }

    if ($(e.target).is("#popup_ctnv")) {
        var popup_ctnv = $("#popup_ctnv");
        popup_ctnv.hide();
    }

    
    if ($(e.target).is("#popup_ctnvcpd")) {
        var popup_ctnvcpd = $("#popup_ctnvcpd");
        popup_ctnvcpd.hide();
    }

    if ($(e.target).is("#popup_tuchoi_nv_succuss")) {
        popup_tuchoi_nv_succuss.hide();
        popup_ctnvcpd.hide();
    }

    if ($(e.target).is("#popup_duyet_nv_succuss")) {
        popup_duyet_nv_succuss.hide();
        popup_ctnvcpd.hide();
    }

    if ($(e.target).is("#popup_add_group_tl")) {
        popup_add_group_tl.hide();
    }

    if ($(e.target).is(".model_del_group_tl")) {
        model_del_group_tl.hide();
    }

    if ($(e.target).is(".popup_sucuss_del_gr_tl")) {
        popup_sucuss_del_gr_tl.hide();
    }

})


jQuery.validator.addMethod("truochomnay", function(value) {
    var now = new Date();
    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) < now;
    }
    return isNaN(value) || (parseFloat(value) < now);
}, "Bạn cần chọn ngày trước ngày hiện tại");

// $("#v_group_mode").change(function() {
//     console.log($("#v_group_mode").val());
// });

// validate 
$(".frm_edit_tncn").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_name_user: "required",
        dtm_ngaysinh: {
            required: true,
            truochomnay: true,
        },
        txt_quequan: "required",
        txt_address: "required",
        txt_phone: "required",
        txt_email: "required",
        txt_hocvan: "required",
        txt_tthn: "required",
        dtm_nlv: "required",
        txt_cv: 'required',
    },
    messages: {
        txt_name_user: "Không được để trống",
        dtm_ngaysinh: {
            required: "Không được để trống",
        },
        txt_quequan: "Không được để trống",
        txt_address: "Không được để trống",
        txt_phone: "Không được để trống",
        txt_email: "Không được để trống",
        txt_hocvan: "Không được để trống",
        txt_tthn: "Không được để trống",
        dtm_nlv: "Không được để trống",
        txt_cv: "Không được để trống",
    },
});
$(".frm_add_group_tl").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_name_group: "required",
        'select2_qt[]': "required",
        img_bia: {
            required: true,
            filesize: true
        },

        img_dd: {
            required: true,
            filesize: true
        },
        txt_mota: "required",
        'select2_tv[]': "required",
        select_truong_company: "required",
    },
    messages: {
        txt_name_group: "Không được để trống",
        'select2_qt[]': "Không được để trống",
        img_bia: {
            required: 'Không được để trống',
            filesize: 'Chỉ được upload ảnh dưới 10MB'
        },
        img_dd: {
            required: 'Không được để trống',
            filesize: 'Chỉ được upload ảnh dưới 10MB'
        },
        txt_mota: "Không được để trống",
        'select2_tv[]': "Không được để trống",
        select_truong_company: "Không được để trống",
    },
    submitHandler: function(form) {
        $(".v_load_form").show();
        $(".btn_create_group_text").hide();
        var form_data = new FormData();
        form_data.append('group_name', $("#v_group_name").val());
        form_data.append('id_manager', $("#v_id_manager").val());
        form_data.append('cover_image', $("#v_img_bia").prop('files')[0]);
        form_data.append('group_image', $("#v_img_dd").prop('files')[0]);
        form_data.append('description', $("#v_description").val());
        form_data.append('id_employee', $("#v_id_employee").val());
        form_data.append('group_mode', $("#v_group_mode").val());
        $.ajax({
            url: '../ajax/create_group.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                $(".v_load_form").hide();
                $(".btn_create_group_text").show();
                $("#frm_add_group_tl")[0].reset();
                $("#v_id_manager").select2({
                    width: "100%",
                    placeholder: "Thêm thành viên quản trị"
                }).val("").trigger("change");
                $("#v_id_employee").select2({
                    width: "100%",
                    placeholder: "Thêm thành viên thực hiện"
                }).val("").trigger("change");
                $("#v_group_mode").select2({
                    width: "100%"
                }).val("0");
                $("#frm_add_group_tl").parents("#popup_add_group_tl").hide();
                $("#v_tbody_group").html(data.html);
            }
        });
    }
});
$("#v_search_group").keyup(function() {
    var keyword = $("#v_search_group").val();
    $.ajax({
        url: '../ajax/search_group.php',
        type: 'POST',
        dataType: 'json',
        data: {
            keyword: keyword
        },
        success: function(data) {
            $("#v_tbody_group").html(data.html);
        }
    });

});
$.validator.addMethod('filesize', function(value, element) {
    if (element.files[0].size > 10485760) {
        return false;
    } else {
        return true;
    }
}, 'File size must be less than {0}');
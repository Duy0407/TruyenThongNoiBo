$(".fndskl").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        'select2_tv[]': "required",
    },

    messages: {
        'select2_tv[]': "không được để trống",
    },
    submitHandler: function(form) {
        var ep_id = [];
        var event_id = $(form).attr('data-id');
        $('.list_ep :selected').each(function() {
            ep_id.push($(this).val());
        });
        ep_id = ep_id.toString();
        if (ep_id != '') {
            var data = new FormData();
            data.append('ep_id', ep_id);
            data.append('event_id', event_id);
            $.ajax({
                url: "../ajax/create_ep_join_event.php",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                data: data,
                success: function(responsive) {
                    if (responsive.result == true) {
                        $('.member_event,.list_ep').html('');
                        $(".list_ep").val('').trigger("change");
                        for (var i = 0; i < responsive.data.arr_ep.length; i++) {
                            $('.member_event').append(
                                `<div class="img-thanhvien">
                                <div class="show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.data.arr_ep[i].avatar + `" alt=""></div>
                                <div class="tetx-thanh-vien">
                                <p class="text-tv1">` + responsive.data.arr_ep[i].name + `</p>
                                <p class="text-tv2">` + responsive.data.arr_ep[i].position + `</p>
                                <p class="text-tv3">` + responsive.data.arr_ep[i].id + `</p>
                                </div>
                                </div>`
                            );
                        }
                        for (let i = 0; i < responsive.data.list_ep.length; i++) {
                            $('.list_ep').append(`
                            <option value=` + responsive.data.list_ep[i].ep_id + `>` + responsive.data.list_ep[i].ep_name + `</option>
                            `);
                        }
                    }
                }
            });
        }
    }
});


$("#csskgl").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },

    rules: {
        csskgl_ndsk: "required",
        // 'select2_tv[]': "required",
    },

    messages: {
        csskgl_ndsk: "không được để trống",
        // 'select2_tv[]': "không được để trống",
    },
    submitHandler: function(form) {
        var ep_id = [];
        var event_id = $(form).attr('data-id');
        $('.edit_list_ep_nb :selected').each(function() {
            ep_id.push($(this).val());
        });
        var position = $('.department_edit_nb').val();
        var content = $('.edit_content_nb ').val();
        ep_id = ep_id.toString();
        if (event_id != '') {
            var data = new FormData();
            data.append('ep_id', ep_id);
            data.append('event_id', event_id);
            data.append('position', position);
            data.append('content', content);
            $.ajax({
                url: "../ajax/update_sk_noi_bo.php",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                data: data,
                success: function(responsive) {
                    if (responsive.result == true) {
                        location.reload();
                    }
                }
            });
        }
    }
});


$(".csgl_giamdoc").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },

    rules: {
        csskgl_ndsk: "required",
        'select2_tv[]': "required",
    },

    messages: {
        csskgl_ndsk: "không được để trống",
        'select2_tv[]': "không được để trống",
    },
    submitHandler: function(form) {
        var ep_id = [];
        var event_id = $(form).attr('data-id');
        $('.list_ep_dn :selected').each(function() {
            ep_id.push($(this).val());
        });
        ep_id = ep_id.toString();
        if (ep_id != '') {
            var data = new FormData();
            data.append('ep_id', ep_id);
            data.append('event_id', event_id);
            $.ajax({
                url: "../ajax/create_ep_join_event.php",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                data: data,
                success: function(responsive) {
                    if (responsive.result == true) {
                        $('.member_event_dn,.list_ep_dn').html('');
                        $(".list_ep_dn").val('').trigger("change");
                        for (var i = 0; i < responsive.data.arr_ep.length; i++) {
                            $('.member_event_dn').append(
                                `<div class="img-thanhvien">
                                <div class="show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.data.arr_ep[i].avatar + `" alt=""></div>
                                <div class="tetx-thanh-vien">
                                <p class="text-tv1">` + responsive.data.arr_ep[i].name + `</p>
                                <p class="text-tv2">` + responsive.data.arr_ep[i].position + `</p>
                                <p class="text-tv3">` + responsive.data.arr_ep[i].id + `</p>
                                </div>
                                </div>`
                            );
                        }
                        for (let i = 0; i < responsive.data.list_ep.length; i++) {
                            $('.list_ep_dn').append(`
                            <option value=` + responsive.data.list_ep[i].ep_id + `>` + responsive.data.list_ep[i].ep_name + `</option>
                            `);
                        }
                    }
                }
            });
        }
    }
});

///
$.validator.addMethod("validateFile", function(value, element) {
    return this.optional(element) || (element.files[0].size <= 2048576)
}, "Dung lượng không quá 2MB");

$.validator.addMethod("validateFileAnh", function(value, element) {
    return this.optional(element) || (element.files[0].type.match('image.*'))
}, "Bạn cần chọn một ảnh");


// $.validator.addMethod("validatephone", function (value, element) {
//   return this.optional(element) || \+?\(?([0-9]{3})\)?[-.]?\(?([0-9]{3})\)?[-.]?\(?([0-9]{4})\)?test(value);
// }, "định dạng số điện thoại không đúng");

$.validator.addMethod("validatephone", function(value, element) {
    return this.optional(element) || /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(value);
}, "định dạng số điện thoại không đúng");


$(".vd10cssk").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");

    },

    rules: {
        txt_ndsk10: "required",
        vd10_name: "required",
        vd10_chucvu: "required",
        vd10_sdt: {
            required: true,
            digits: true,
            rangelength: [10, 10],
            validatephone: true,
        },

        vd10_mail: {
            required: true,
            email: true,
        },

    },

    messages: {
        txt_ndsk10: "không được để trống",
        vd10_name: "không được để trống",
        vd10_chucvu: "không được để trống",
        vd10_sdt: {
            required: "không được để trống",
            digits: "phải là  số",
            rangelength: "số điện thoại không được quá 10 số",


        },
        vd10_mail: {
            required: "không được để trống",
            email: "định dạng không đúng",
        },
    },
    submitHandler: function(form) {
        var ep_id = [];
        var event_id = $(form).attr('data-id');
        $('.edit_list_ep_dn :selected').each(function() {
            ep_id.push($(this).val());
        });
        ep_id = ep_id.toString();
        var content_edit_dn = $('.content_edit_dn ').val();
        var department_edit = $('.department_edit').val();
        var quyen_edit_dn = $('.quyen_edit_dn').val();
        var files_img = $('.custom-file-img-input').prop('files')[0];
        var edit_name_dg_dn = $('.edit_name_dg_dn').val();
        var edit_chucvu_dg_dn = $('.edit_chucvu_dg_dn').val();
        var edit_sdt_dg_dn = $('.edit_sdt_dg_dn').val();
        var edit_email_dg_dn = $('.edit_email_dg_dn').val();
        var arr = [{ "name_guest": "132131", "name_company": "123123", "name_position": "đâsdasd" }];
        var data = new FormData();
        if ($(".name_guest").length > 0) {
            var arr = [];
            var j = 0;
            for (var i = 0; i < $(".name_guest").length; i++) {
                if ($(".name_guest").eq(i).val() != "" || $(".name_company").eq(i).val() != "" || $(".name_position").eq(i).val()) {
                    arr[j] = {};
                    arr[j].name_guest = $(".name_guest").eq(i).val();
                    arr[j].name_company = $(".name_company").eq(i).val();
                    arr[j].name_position = $(".name_position").eq(i).val();
                    j++;
                }
            }
            var list_guest = JSON.stringify(arr);
            data.append('list_guests', list_guest);
        }
        if (event_id != '') {
            data.append('ep_id', ep_id);
            data.append('event_id', event_id);
            data.append('content_edit_dn', content_edit_dn);
            data.append('department_id', department_edit);
            data.append('quyen', quyen_edit_dn);
            data.append('files_img', files_img);
            data.append('name_dg_dn', edit_name_dg_dn);
            data.append('chucvu_dg_dn', edit_chucvu_dg_dn);
            data.append('sdt_dg_dn', edit_sdt_dg_dn);
            data.append('email_dg_dn', edit_email_dg_dn);
            $.ajax({
                url: "../ajax/update_sk_doi_ngoai.php",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                data: data,
                success: function(responsive) {
                    if (responsive.result == true) {
                        location.reload();
                    }
                }
            });
        }
    }
});

// $('#btn_del_event').click(function() {
//     var id = $(this).attr('data-id');
//     console.log(id);
// })
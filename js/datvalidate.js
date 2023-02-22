$.validator.addMethod("validateFile", function(value, element) {
    if (element.files[0] == undefined) {
        var check = false;
    } else {
        var check = true;
    }
    return check;
}, "Dung lượng không quá 2MB");
$.validator.addMethod("validateFileAnh", function(value, element) {
    return this.optional(element) || (element.files[0].type.match('image.*'))
}, "Bạn cần chọn một ảnh");

jQuery.validator.addMethod("sauhomnay", function(value) {
    var now = new Date();
    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > now;
    }
    return isNaN(value) || (parseFloat(value) > now);
}, "Bạn cần chọn ngày sau ngày hiện tại ");

jQuery.validator.addMethod("truochomnay", function(value) {
    var now = new Date();
    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > now;
    }
    return isNaN(value) || (parseFloat(value) < now);
}, "Bạn cần chọn ngày trước ngày hiện tại");

// $.validator.addMethod("validatePassword", function(value, element) {
//     return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/i.test(value);
// }, "Password từ 8 đến 20 ký tự bao gồm chữ và ít nhất một chữ số");

$.validator.addMethod("validatePhone", function(value, element) {
    return this.optional(element) || /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(value);
}, "bạn cần nhập một số điện thoại");

function v_del_comment(e, type) {
    var id = $(e)[0].dataset.id;
    $('#xoa_binhluan').fadeIn('', function() {
        $('#xoa_binhluan .btn_luu').click(function() {
            $.ajax({
                url: '../ajax/del_comment_newfeed.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.count == 0) {
                        $(e).parents(".baiviets-footer").find(".an-hien-binhluan").hide();
                    }
                    $("#xoa_binhluan").hide();
                    if (type == 0) {
                        $(e).parents(".xembinhluan").remove();
                    } else {
                        $(e).parents(".xembinhluan_con").remove();
                    }
                }
            });
        });
    });
}

function add_discuss_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_show_discuss_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img del_show_discuss_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_add_file_image_discuss2').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

function add_notify_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_show_notify_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_add_file_image_discuss').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

function add_idea_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_show_idea_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img del_show_idea_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_add_file_image_idea').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

function add_bonus_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_show_bonus_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img del_show_bonus_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_add_file_image_bonus').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

function add_internal_news_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_show_internal_news_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_add_file_image_internal_news').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

function add_ud_notify_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail_ud">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_add_ud_notify_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail_ud">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img del_add_ud_notify_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_update_file_image_discuss').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

function add_ud_discuss_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail_ud">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_add_ud_discuss_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail_ud">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img del_add_ud_discuss_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_update_file_image_discuss1').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

function add_ud_idea_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail_ud">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_add_ud_idea_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail_ud">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img del_add_ud_idea_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_update_file_image_idea').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

function add_ud_bonus_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail_ud">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_add_ud_bonus_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail_ud">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img del_add_ud_bonus_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_update_file_image_bonus').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

function add_ud_internal_image_video(file) {
    var type = file.type;
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageUrl = e.target.result;
        if (type.match('image/*') != null) {
            html = `<div class="v_block_file_detail_ud">
            <img class="v_block_file_image" src="` + imageUrl + `" alt="Ảnh lỗi">
            <img class="show_del_img del_add_ud_internal_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        } else {
            html = `<div class="v_block_file_detail_ud">
            <video class="v_block_file_image" controls>
            <source src="` + imageUrl + `" type="` + type + `">
            </video>
            <img class="show_del_img del_add_ud_internal_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
            </div>`;
        }
        $('.v_update_file_image_internal').find('.v_block_img').append(html);
    }
    reader.readAsDataURL(file);
}

$(document).ready(function() {
    //thay dổi anh 
    if (window.FileList && window.File && window.FileReader) {
        $('.input_anh').change(function(event) {
            const file = event.target.files[0];
            if (!file.type) {
                alert("không tồn tại");
            }
            if (file.type.match('image.*')) {
                $(this).parents('.form_group').find('.img_thaydoi').attr('src', '');
                const reader = new FileReader();
                reader.addEventListener('load', event => {
                    $(this).parents('.form_group').find('.img_thaydoi').attr('src', event
                        .target.result);
                });
                reader.readAsDataURL(file);
            } else {
                alert("bạn cần chọn một ảnh");
            }
        })
    }

    $("#xemthongbao2").click(function() {
        var start = $('.v_tren_notify00').length;
        $.ajax({
            url: '../ajax/see_more_notify.php',
            type: 'POST',
            dataType: 'json',
            data: {
                start: start
            },
            success: function(data){
                $('.duoi_notify2').after(data.html);
                if (data.result == false) {
                    $('#xemthongbao2').text("Hết thông báo");
                }
            }
        });
        
    });

    // $('.taianh').click(function() {
    //     console.log($(this).parents('.form_group'));
    //     // $(this).parents('.form_group').find('.input_anh').click();
    // })
});

$('.v_idea_file_name').click(function() {
    $(this).next().click();
});
$('.v_edit_file_idea').change(function() {
    var name = $(this).prop('files')[0].name;
    $(".v_idea_file_name").val(name);
});
$.validator.addMethod("check_trim", function(value, element) {
    if (element.value.trim() == "") {
        var check = false;
    } else {
        var check = true;
    }
    return check;
}, "Dung lượng không quá 2MB");
$(".model_sua_alert .file").change(function() {
    var name_img = $(".model_sua_alert").find('.file').prop('files')[0].name;
    $(".model_sua_alert").find('.v_name_file_alert').val(name_img);
});

$('.block_update_notify_name_file').click(function() {
    $('.custom-file-input-edit-notify').click();
});

$('.custom-file-input-edit-notify').change(function() {
    $('.title_ud_upload_notify').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_ud_notify_file) === 'undefined') {
        window.add_ud_notify_file = [];
    }

    if (typeof(add_ud_notify_image) === 'undefined') {
        window.add_ud_notify_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_update_file_image_discuss').find('.v_block_img').length == 0) {
                $('.v_update_file_image_discuss').append('<div class="v_block_img"></div>');
            }
            add_ud_notify_image.push(file[i]);
            add_ud_notify_image_video(file[i]);
        } else {
            add_ud_notify_file.push(file[i]);
            if ($('.v_update_file_image_discuss').find('.v_block_file').length == 0) {
                $('.v_update_file_image_discuss').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2_ud">
            <img src="../img/show_del_file.svg" class="show_del_file del_add_ud_notify_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_update_file_image_discuss').find('.v_block_file').append(html);
        }
        $('.block_update_notify_name_file').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});
CKEDITOR.replace("v_edit_content_thongbao");
$(".model_sua_alert").submit(function() {
    var element = $(this);
    var el_child;
    var flag = true;
    if ($.trim(element.find('.new_title').val()) == "") {
        element.find('.new_title').parents('.form_group').find('.error_title').text("Không được để trống");
        element.find('.new_title').focus();
        flag = false;
    } else {
        element.find('.new_title').parents('.form_group').find('.error_title').text("");
    }

    if (CKEDITOR.instances.v_edit_content_thongbao.getData().trim() == "") {
        element.find('.textarea_cheditor').parents('.form_group').find('.error_content').text("Không được để trống");
        element.find('.textarea_cheditor').show().focus().hide();
        flag = false;
    } else {
        element.find('.textarea_cheditor').parents('.form_group').find('.error_content').text("");
    }
    if (flag == true) {
        var form_data = new FormData();
        var element_parent = $(".model_sua_alert");
        var content = CKEDITOR.instances.v_edit_content_thongbao.getData().trim();

        form_data.append("position", element_parent.find(".position").val());
        form_data.append("new_title", element_parent.find(".new_title").val());
        form_data.append("content", content);
        form_data.append("new_id", element_parent.find(".new_id").val());

        form_data.append("arr_update_notify_image", arr_update_notify_image);
        form_data.append("arr_update_notify_file", arr_update_notify_file);

        form_data.append("arr_update_notify_name_file", arr_update_notify_name_file);

        form_data.append("arr_update_notify_name_img", arr_update_notify_name_img);

        if (typeof(add_ud_notify_image) !== "undefined") {
            for (var i = 0; i < add_ud_notify_image.length; i++) {
                form_data.append('add_ud_notify_image[]', add_ud_notify_image[i]);
            }
        }

        if (typeof(add_ud_notify_file) !== "undefined") {
            for (var i = 0; i < add_ud_notify_file.length; i++) {
                form_data.append('add_ud_notify_file[]', add_ud_notify_file[i]);
            }
        }
        $(this).find('.v_btn_luu_span').hide();
        $(this).find('.v_btn_luu_img').show();
        $(this).find('.btn_luu').prop('type', 'buttton');
        $.ajax({
            url: "../ajax/edit_new_feed_alert.php",
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                location.reload();
            }
        });
    }
    return false;
});

$("#v_huy_chinhsuathongbao").click(function() {
    $("#model_sua_alert").hide();
});

// validate văn hóa doanh nghiệp
$(".model_editnoidungtamnhin").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        content: "required",
    },
    messages: {
        content: "Không được để trống",
    },
    submitHandler: function(form) {
        $(form).find('.btn_luu').prop('type', 'button').find('img').show();
        $(form).find('.v_btn_luu_span').hide();

        var content = $(form).find('.content').val();
        var id = $(form).parents('#model_editnoidungtamnhin')[0].dataset.id;
        $.ajax({
            type: "POST",
            url: "../ajax/update_vision_mission.php",
            data: {
                id: id,
                content: content
            },
            dataType: "json",
            success: function(data) {
                if (data.result == true) {
                    $('#model_editnoidungtamnhin').hide();
                    if (id == 1) {
                        $('.content_tamnhin').text(data.value);
                    } else if (id == 2) {
                        $('.content_sumenh').text(data.value);
                    } else if (id == 3) {
                        $(".v_tamnhinsumenh").find('.description').text(data.value);
                    }
                    $(form).find('.btn_luu').prop('type', 'submit').find('img').hide();
                    $(form).find('.v_btn_luu_span').show();
                }
            },
            error: function() {
                alert("Có lỗi xảy ra. Vui lòng thử lại");
                $(form).find('.btn_luu').prop('type', 'submit').find('img').hide();
                $(form).find('.v_btn_luu_span').show();
            }
        });
    }
});

//Thêm địa chỉ công ty
$('.model_edit_address').submit(function() {
    var j = 0;
    var arr = [];
    var address = $(this).find('.input_address').val();
    if (address == "") {
        alert("Vui lòng điền địa chỉ công ty");
    } else {
        $.ajax({
            type: "POST",
            url: "../ajax/update_address_com.php",
            data: {
                address: address
            },
            dataType: "json",
            success: function(data) {
                if (data.result == true) {
                    location.reload();
                }
            }
        });
    }
    return false;
})
$('.model-chinhsuattct').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents('.form_group'));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_ten: "required",
        txt_diachi: "required",
        txt_mota: "required",
        date_thanhlap: {
            required: true,
            truochomnay: true
        }
    },
    messages: {
        txt_ten: "Không được để trống",
        txt_diachi: "Không được để trống",
        txt_mota: "Không được để trống",
        date_thanhlap: {
            required: "Không được để trống"
        }
    },
});



$(".model_editnoidungsumenh").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_noidung: "required"
    },
    messages: {
        txt_noidung: "Không được để trống"
    },
});

$('.model_themgtcotloi').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents('.form_group'));
        error.wrap("<span class='error'>");
    },
    rules: {
        title: "required",
        content: "required"
    },
    messages: {
        title: "Không được để trống",
        content: "Không được để trống",
    },
});

$(".model_suagtcotloi").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        title: "required",
        content: "required",
    },
    messages: {
        title: "Không được để trống",
        content: "Không được để trống",
    },
    // submitHandler: function(form) {
    //     // $(".v_check_ring").show().find('#v_check_ring_content').text("Bạn đã chỉnh sửa giá trị cốt lõi thành công");
    //     // $("#model_suagtcotloi").hide();
    //     // return true;
    // }
});


$(".model_themmuctieu-chienluoc").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        title: "required",
        content: "required",
    },
    messages: {
        title: "Không được để trống",
        content: "Không được để trống",
    },
    submitHandler: function(data) {
        $(".v_check_ring").show().find('.v_check_ring_content').text("Bạn đã tạo mục tiêu - chiến lược thành công");
        return true;
    }
});
$(".model_suamuctieu-chienluoc").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        title: "required",
        content: "required",
    },
    messages: {
        title: "Không được để trống",
        content: "Không được để trống",
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        form_data.append('title', $(form).find('.title_target').val());
        form_data.append('content', $(form).find('.content_target').val());
        var comment = $(form).find('.checkbox_target').prop('checked');
        if (comment == false) {
            form_data.append('comment', 0);
        } else {
            form_data.append('comment', 1);
        }
        form_data.append('id_target', $(form).find('.id_target').val());
        var cover_image = $(form).find('.v_target_input_anh').prop('files')[0];
        if (cover_image != undefined) {
            form_data.append('cover_image', cover_image);
        }
        $.ajax({
            type: "POST",
            url: "../ajax/update_target.php",
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                location.reload();
            }
        });
    }
});
$(".model_themnguyentac").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        name: "required",
        content: "required",
        file: {
            validateFile: true,
            validateFileAnh: true,
            required: true,
        }
    },
    messages: {
        name: "Không được để trống",
        content: "Không được để trống",
        file: {
            required: "Không được để trống"
        }
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        form_data.append('name', $(form).find('.name_working_rules').val());
        form_data.append('content', $(form).find('.content').val());
        form_data.append('file', $(form).find('.file').prop('files')[0]);
        if ($(form).find('.comment').prop('checked') == true) {
            form_data.append('comment', 1);
        } else {
            form_data.append('comment', 0);
        }
        if ($(form).find('.notify').prop('checked') == true) {
            form_data.append('notify', 1);
        } else {
            form_data.append('notify', 0);
        }
        if ($(form).find('.send_mail').prop('checked') == true) {
            form_data.append('send_mail', 1);
        } else {
            form_data.append('send_mail', 0);
        }
        $.ajax({
            type: "POST",
            url: "../ajax/create_working_rules.php",
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.result == true) {
                    $("#model_themnguyentac").hide();
                    $(".v_check_ring").show().find('.v_check_ring_content').text('Bạn đã tạo nguyên tắc làm việc thành công');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                }
            }
        });
    }
});
$(".model_chinhsuanguyentac").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        name: "required",
        content: "required",
        file: {
            validateFile: true,
            validateFileAnh: true,
            required: true,
        }
    },
    messages: {
        name: "Không được để trống",
        content: "Không được để trống",
        file: {
            required: "Không được để trống"
        }
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        form_data.append('name', $(form).find('.name_working_rules').val());
        form_data.append('content', $(form).find('.content').val());
        if ($(form).find('.file').prop('files')[0] != undefined) {
            form_data.append('file', $(form).find('.file').prop('files')[0]);
        }
        form_data.append('id', $(form).find('.id_rules').val());
        if ($(form).find('.comment').prop('checked') == true) {
            form_data.append('comment', 1);
        } else {
            form_data.append('comment', 0);
        }
        $.ajax({
            type: "POST",
            url: "../ajax/update_working_rules.php",
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.result == true) {
                    $("#model_chinhsuanguyentac").hide();
                    $(".v_check_ring").show().find('.v_check_ring_content').text('Bạn đã cập nhật nguyên tắc làm việc thành công');
                    setTimeout(function() {

                        window.location.href = window.location.href;
                    }, 1500);
                }
            }
        });
    }
});
$(".model_suanguyentac").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_ten: "required",
        txt_noidung: "required",
    },
    messages: {
        txt_ten: "Không được để trống",
        txt_noidung: "Không được để trống",
    },
});

// end validate văn hóa doanh nghiệp

//Tạo thảo luận
$('.block_name_file_discuss').click(function() {
    $('.custom-file-input-discuss').click();
});

$('.custom-file-input-discuss').change(function() {
    $('.title_upload_discuss').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_discuss_file) === 'undefined') {
        window.add_discuss_file = [];
    }

    if (typeof(add_discuss_image) === 'undefined') {
        window.add_discuss_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_add_file_image_discuss2').find('.v_block_img').length == 0) {
                $('.v_add_file_image_discuss2').append('<div class="v_block_img"></div>');
            }
            add_discuss_image.push(file[i]);
            add_discuss_image_video(file[i]);
        } else {
            add_discuss_file.push(file[i]);
            if ($('.v_add_file_image_discuss2').find('.v_block_file').length == 0) {
                $('.v_add_file_image_discuss2').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2">
            <img src="../img/show_del_file.svg" class="show_del_file del_show_discuss_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_add_file_image_discuss2').find('.v_block_file').append(html);
        }
        $('.block_name_file_discuss').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});

$(".model_taothaoluan").submit(function() {
    var element_parent = $(".model_taothaoluan");
    var flag = true;
    var form_data = new FormData();
    if (element_parent.find(".new_title").val() == "") {
        element_parent.find(".new_title").next().html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        element_parent.find(".new_title").next().html('');
        form_data.append('new_title', element_parent.find(".new_title").val());
    }

    if (CKEDITOR.instances.content_taothaoluan.getData() == "") {
        $(".form_group_content_taothaoluan").find('.error').html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        $(".form_group_content_taothaoluan").find('.error').html('');
        form_data.append('content', CKEDITOR.instances.content_taothaoluan.getData());
    }
    if (element_parent.data('type') == undefined) {
        form_data.append('type', 0);
    } else {
        form_data.append('type', 1);
    }

    if (element_parent.find('.form_group_position').length == 0) {
        form_data.append('position', element_parent.data('dep_id'));
    } else {
        if (element_parent.find(".position").val() == "") {
            element_parent.find(".form_group_position").find('.error').html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
            flag = false;
        } else {
            element_parent.find(".form_group_position").find('.error').html('');
            form_data.append('position', element_parent.find(".position").val());
        }
    }

    form_data.append('id_user_tags', element_parent.find('.id_user_tags').val());

    if (typeof(add_discuss_file) != "undefined") {
        for (var i = 0; i < add_discuss_file.length; i++) {
            form_data.append('file[]', add_discuss_file[i]);
        }
    }

    if (typeof(add_discuss_image) != "undefined") {
        for (var i = 0; i < add_discuss_image.length; i++) {
            form_data.append('image[]', add_discuss_image[i]);
        }
    }

    if (element_parent.find(".discuss_mode").val() != 1 && element_parent.find(".discuss_mode").val() != 2) {
        $(".form_group_discuss_mode").find('.error').html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        $(".form_group_discuss_mode").find('.error').html('');
        form_data.append('discuss_mode', element_parent.find(".discuss_mode").val());
    }
    if (flag == true) {
        $(this).find('.v_btn_luu_img').show();
        $(this).find('.v_btn_luu_span').hide();
        $(this).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/create_discuss.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                location.reload();
            }
        });

    }
    return false;
});

$('.block_name_file_ud_discuss').click(function() {
    $('.custom-file-input-ud-discuss').click();
});

$('.custom-file-input-ud-discuss').change(function() {
    $('.title_upload_ud_discuss').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(update_discuss_file) === 'undefined') {
        window.update_discuss_file = [];
    }

    if (typeof(update_discuss_image) === 'undefined') {
        window.update_discuss_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_update_file_image_discuss1').find('.v_block_img').length == 0) {
                $('.v_update_file_image_discuss1').append('<div class="v_block_img"></div>');
            }
            update_discuss_image.push(file[i]);
            add_ud_discuss_image_video(file[i]);
        } else {
            update_discuss_file.push(file[i]);
            if ($('.v_update_file_image_discuss1').find('.v_block_file').length == 0) {
                $('.v_update_file_image_discuss1').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2_ud">
            <img src="../img/show_del_file.svg" class="show_del_file del_add_ud_discuss_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_update_file_image_discuss1').find('.v_block_file').append(html);
        }
        $('.block_name_file_ud_discuss').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});

$(".model_chinhsuathaoluan").submit(function() {
    var element_parent = $(".model_chinhsuathaoluan");
    var flag = true;
    var form_data = new FormData();
    form_data.append('new_id', element_parent.find('.new_id').val());
    if (element_parent.find(".new_title").val() == "") {
        element_parent.find(".new_title").next().html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        element_parent.find(".new_title").next().html('');
        form_data.append('new_title', element_parent.find(".new_title").val());
    }

    if (CKEDITOR.instances.content_chinhsuathaoluan1.getData() == "") {
        element_parent.find(".form_group_content_taothaoluan").find('.error').html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        $(".form_group_content_taothaoluan").find('.error').html('');
        form_data.append('content', CKEDITOR.instances.content_chinhsuathaoluan1.getData());
    }

    if (element_parent.find(".position").val() == "") {
        element_parent.find(".form_group_position").find('.error').html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        element_parent.find(".form_group_position").find('.error').html('');
        form_data.append('position', element_parent.find(".position").val());
    }

    form_data.append('id_user_tags', element_parent.find('.id_user_tags').val());

    form_data.append("arr_update_discuss_image", arr_update_discuss_image);
    form_data.append("arr_update_discuss_file", arr_update_discuss_file);

    form_data.append("arr_update_discuss_name_file", arr_update_discuss_name_file);

    form_data.append("arr_update_discuss_name_img", arr_update_discuss_name_img);

    if (typeof(update_discuss_file) !== "undefined") {
        for (var i = 0; i < update_discuss_file.length; i++) {
            form_data.append('update_discuss_file[]', update_discuss_file[i]);
        }
    }

    if (typeof(update_discuss_image) !== "undefined") {
        for (var i = 0; i < update_discuss_image.length; i++) {
            form_data.append('update_discuss_image[]', update_discuss_image[i]);
        }
    }

    if (element_parent.find(".discuss_mode").val() != 1 && element_parent.find(".discuss_mode").val() != 2) {
        $(".form_group_discuss_mode").find('.error').html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        element_parent.find(".form_group_discuss_mode").find('.error').html('');
        form_data.append('discuss_mode', element_parent.find(".discuss_mode").val());
    }
    if (flag == true) {
        $(this).find('.v_btn_luu_img').show();
        $(this).find('.v_btn_luu_span').hide();
        $(this).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/update_discuss.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                location.reload();
            }
        });

    }
    return false;
});
$(".btn_huy_taothaoluan").click(function() {
    var element_parent = $(".model_taothaoluan");
    element_parent[0].reset();
    CKEDITOR.instances.content_taothaoluan.setData();
    element_parent.find('.position').val("0").trigger('change');
    element_parent.find('.id_user_tags').val("").trigger('change');
    element_parent.find('.discuss_mode').val(1).trigger('change');
});
$(".model_chinhsuathaoluan .text_file").click(function() {
    $(".model_chinhsuathaoluan .file").click();
});
$(".model_chinhsuathaoluan .file").change(function() {
    var name_file = $(this).prop('files')[0].name;
    $(".model_chinhsuathaoluan .text_file").val(name_file);
});
$.validator.addMethod("required_file", function(value, element) {
    if ($("#v_file_thongbao").prop('files')[0] == undefined) {
        var check = false;
    } else {
        var check = true;
    }
    return check;
}, "Dung lượng không quá 2MB");
$.validator.addMethod("filesize_alert", function(value, element) {
    if ($("#v_file_thongbao").prop('files')[0].size > 10485760) {
        return false;
    } else {
        return true;
    }
}, "Dung lượng không quá 10MB");
$.validator.addMethod("filesize_alert2", function(value, element) {
    if ($(".v_edit_file_thongbao").prop('files')[0] != undefined) {
        if ($(".v_edit_file_thongbao").prop('files')[0].size > 10485760) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}, "Dung lượng không quá 10MB");
$("#v_huy_taothongbao").click(function() {
    $("#v_model_create_alert")[0].reset();
    $("#v_select_vitri_taothongbao").select2({
        width: "100%"
    }).val("0").trigger("change");
});
$("#v_file_thongbao").change(function() {
    $(".v_name_file_alert").val($("#v_file_thongbao").prop('files')[0].name);
});
$(".v_li_edit_post").click(function() {
    var new_id = $(this).data("new_id");
    var element = $(this);
    var new_type = $(this).data("new_type");
    $.ajax({
        url: '../ajax/update_new_feed_alert.php',
        type: 'POST',
        dataType: 'json',
        data: {
            new_id: new_id,
            new_type: new_type
        },
        success: function(data) {
            if (new_type == 1) {
                console.log(data);
                $("#model_sua_alert").show();
                var element_parent = $(".model_sua_alert");
                element_parent.find('.block_name_file_detail').remove();
                element_parent.find('.title_ud_upload_notify').show();
                element_parent.find('.v_block_file').remove();
                element_parent.find('.v_block_img').remove();
                $("#v_input_hidden_edit_alert").val(new_id);
                element_parent.find(".new_title").val(data.data.new_title);
                CKEDITOR.instances.v_edit_content_thongbao.setData(data.data.content);
                element_parent.find(".v_edit_select2_alert").val(data.data.position).trigger("change");
                window.arr_update_notify_file = [];
                window.arr_update_notify_image = [];

                window.arr_update_notify_name_img = [];
                window.arr_update_notify_name_file = [];
                if (data.data.file != "") {
                    $('.title_ud_upload_notify').hide();
                    window.arr_update_notify = data.data.file.split("||");
                    window.arr_update_name_file_notify = data.data.name_file.split("||");
                    element_parent.find('.title_upload_notify').hide();
                    for (var i = 0; i < arr_update_name_file_notify.length; i++) {
                        element_parent.find('.block_update_notify_name_file').append('<div class="block_name_file_detail">' + arr_update_name_file_notify[i] + '</div>');
                        if (arr_update_notify[i].match('/image/') != null || arr_update_notify[i].match('/video/') != null) {
                            arr_update_notify_name_img.push(arr_update_name_file_notify[i]);
                        } else {
                            arr_update_notify_name_file.push(arr_update_name_file_notify[i]);
                        }
                    }

                    element_parent.find('.v_update_file_image_discuss').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                    for (var i = 0; i < arr_update_notify.length; i++) {
                        if (arr_update_notify[i].match('/image/') != null) {
                            html = `<div class="v_block_file_detail">
                            <img class="v_block_file_image" src="` + arr_update_notify[i] + `" alt="Ảnh lỗi">
                            <img class="show_del_img del_update_notify_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                            </div>`;
                            element_parent.find('.v_block_img').append(html);
                            arr_update_notify_image.push(arr_update_notify[i]);
                        } else if (arr_update_notify[i].match('/video/') != null) {
                            var duoi = arr_update_notify[i].split('.');
                            duoi = duoi[duoi.length - 1];
                            html = `<div class="v_block_file_detail">
                            <video class="v_block_file_image" controls>
                            <source src="` + arr_update_notify[i] + `" type="video/` + duoi + `">
                            </video>
                            <img class="show_del_img del_update_notify_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                            </div>`;
                            element_parent.find('.v_block_img').append(html);
                            arr_update_notify_image.push(arr_update_notify[i]);
                        } else {
                            html = `<div class="v_block_file_detail2">
                            <img src="../img/show_del_file.svg" class="show_del_file del_update_notify_file" alt="show_del_file.svg">
                            <p class="show_name_file2">` + arr_update_name_file_notify[i] + `</p>
                            <div class="show_file2">
                            <p class="show_file_size">` + data.data.created_at + `</p>
                            </div>
                            </div>`;
                            element_parent.find('.v_block_file').append(html);
                            arr_update_notify_file.push(arr_update_notify[i]);
                        }
                    }
                }
            } else if (new_type == 2) {
                var arr_id_user_tags = data.data.id_user_tags.split(",");
                $(".model_chinhsuachaodonthanhvienmoi").find("#v_select2_chinhsuachaodontvmoi").val(arr_id_user_tags).trigger("change");
                $(".model_chinhsuachaodonthanhvienmoi").find("#v_content_chinhsuachaodontvmoi").val(data.data.content);
                $("#model_chinhsuachaodonthanhvienmoi").find(".v_new_id02").val(new_id);
                $("#model_chinhsuachaodonthanhvienmoi").show();
            } else if (new_type == 3) {
                var el = $(".model_chinhsuasukien_noibo_sdn");
                $("#model_chinhsuasukien_noibo_sdn").show();
                el.find('.title_upload_evt_nb_ud').show();
                el.find('.block_name_file_detail').remove();
                el.find('.v_block_file').remove();
                $(".model_chinhsuasukien_noibo_sdn").find(".v_title_event").val(data.data.new_title);
                $(".model_chinhsuasukien_noibo_sdn").find(".v_mieuta_event_noi_bo").val(data.data.content);
                $(".model_chinhsuasukien_noibo_sdn").find(".v_date_ngay_eventnoibo").val(data.data2.time.date_ngay);
                $(".model_chinhsuasukien_noibo_sdn").find(".text_img_edit_event_avatar").val(data.data2.avatar);
                $(".model_chinhsuasukien_noibo_sdn").find(".text_img_edit_event").val(data.data.file);
                $(".model_chinhsuasukien_noibo_sdn").find(".v_date_gio_eventnoibo").val(data.data2.time.date_gio);
                $(".model_chinhsuasukien_noibo_sdn").find(".v_select2_taosukiennoibo").val(data.data.position).trigger("change");
                $(".model_chinhsuasukien_noibo_sdn").find(".v_chinhsua_event_noibo_hidden").val(new_id);
                window.arr_file_nb = [];
                window.arr_name_file_nb = [];
                if (data.data.file != "") {
                    arr_file_nb = data.data.file.split("||");
                    arr_name_file_nb = data.data.name_file.split("||");
                    el.find('.v_add_file_image_event_internal_ud').append('<div class="v_block_file"></div>')
                    el.find('.title_upload_evt_nb_ud').hide();
                    for (var i = 0; i < arr_file_nb.length; i++) {
                        html = `<div class="v_block_file_detail2">
                        <img src="../img/xsukiendoingoai.png" class="show_del_file del_show_e_i_ud" alt="show_del_file.svg">
                        <p class="show_name_file2">` + arr_name_file_nb[i] + `</p>
                        <div class="show_file2">
                        <p class="show_file_size">` + data.data.created_at + `</p>
                        </div>
                        </div>`;
                        el.find('.v_block_file').append(html);

                        html2 = `<div class="block_name_file_detail">` + arr_name_file_nb[i] + `</div>`;
                        el.find('.block_name_evt_nb_ud').append(html2);
                    }
                }
            } else if (new_type == 4) {
                var el = $(".model-chinhsuasukiendoingoai");
                $("#model_chinhsuasukiendoingoai").show();
                el.find('.title_upload_evt_nb_ud').show();
                el.find('.block_name_file_detail').remove();
                el.find('.v_block_file').remove();
                var element_parent = $(".model-chinhsuasukiendoingoai");
                element_parent.find('.new_title').val(data.data.new_title);
                element_parent.find('.v_speakers_avatar_text').val(data.data2.avatar);
                element_parent.find('.speakers_name').val(data.data2.speakers_name);
                element_parent.find('.speakers_position').val(data.data2.speakers_position);
                element_parent.find('.speakers_phone').val(data.data2.speakers_phone);
                element_parent.find('.speakers_email').val(data.data2.speakers_email);
                element_parent.find('.date_ngay').val(data.data2.time.date_ngay);
                element_parent.find('.date_gio').val(data.data2.time.date_gio);
                element_parent.find('.v_event_avatar_name').val(data.data2.avatar);
                element_parent.find('.content').val(data.data.content);
                element_parent.find('.v_event_file_name').val(data.data.file);
                element_parent.find('.event_position').val(data.data.position).trigger('change');
                element_parent.find('.event_mode').val(data.data2.event_mode).trigger('change');
                if (data.data2.list_guests != "") {
                    var guests = JSON.parse(data.data2.list_guests);
                    element_parent.find('.list_guest_tr').remove();
                    for (var i = 0; i < guests.length; i++) {
                        element_parent.find(".list_guest").find(".add_list_guest").before('<tr class="list_guest_tr"><td>' + (i + 1) + '</td><td><input type="text" placeholder="Nhập họ và tên" class="name_guest" value="' + guests[i].name_guest + '"></td><td><input type="text" placeholder="Nhập tên công ty" class="name_company" value="' + guests[i].name_company + '"></td><td><input type="text" placeholder="Nhập chức vụ" class="name_position" value="' + guests[i].name_position + '"></td></tr>');
                    }
                }
                element_parent.find('.new_id').val(new_id);
                window.arr_file_dn = [];
                window.arr_name_file_dn = [];
                if (data.data.file != "") {
                    arr_file_dn = data.data.file.split("||");
                    arr_name_file_dn = data.data.name_file.split("||");
                    el.find('.v_add_file_image_dn_ud').append('<div class="v_block_file"></div>')
                    el.find('.title_upload_dn_ud').hide();
                    for (var i = 0; i < arr_file_dn.length; i++) {
                        html = `<div class="v_block_file_detail2">
                        <img src="../img/xsukiendoingoai.png" class="show_del_file del_show_dn_ud" alt="show_del_file.svg">
                        <p class="show_name_file2">` + arr_name_file_dn[i] + `</p>
                        <div class="show_file2">
                        <p class="show_file_size">` + data.data.created_at + `</p>
                        </div>
                        </div>`;
                        el.find('.v_block_file').append(html);

                        html2 = `<div class="block_name_file_detail">` + arr_name_file_dn[i] + `</div>`;
                        el.find('.block_name_file_dn_ud').append(html2);
                    }
                }
            } else if (new_type == 5) {
                var id_user_tags = data.data.id_user_tags.split(",");
                $("#model_chinhsuathaoluan").show();
                var element_parent = $(".model_chinhsuathaoluan");
                element_parent.find('.block_name_file_detail').remove();
                element_parent.find('.title_ud_upload_notify').show();
                element_parent.find('.v_block_file').remove();
                element_parent.find('.v_block_img').remove();
                element_parent.find(".new_title").val(data.data.new_title);
                CKEDITOR.instances['content_chinhsuathaoluan1'].setData(data.data.content);
                element_parent.find(".position").val(data.data.position).trigger("change");
                element_parent.find(".id_user_tags").val(id_user_tags).trigger("change");
                element_parent.find(".discuss_mode").val(data.data2.discuss_mode).trigger("change");
                element_parent.find(".text_file").val(data.data.file);
                element_parent.find(".new_id").val(new_id);

                window.arr_update_discuss_file = [];
                window.arr_update_discuss_image = [];

                window.arr_update_discuss_name_img = [];
                window.arr_update_discuss_name_file = [];
                if (data.data.file != "") {
                    $('.title_ud_upload_notify').hide();
                    window.arr_update_discuss = data.data.file.split("||");
                    window.arr_update_name_file_dicuss = data.data.name_file.split("||");

                    element_parent.find('.title_upload_ud_discuss').hide();
                    for (var i = 0; i < arr_update_name_file_dicuss.length; i++) {
                        element_parent.find('.block_name_file_ud_discuss').append('<div class="block_name_file_detail">' + arr_update_name_file_dicuss[i] + '</div>');
                        if (arr_update_discuss[i].match('/image/') != null || arr_update_discuss[i].match('/video/') != null) {
                            arr_update_discuss_name_img.push(arr_update_name_file_dicuss[i]);
                        } else {
                            arr_update_discuss_name_file.push(arr_update_name_file_dicuss[i]);
                        }
                    }

                    element_parent.find('.v_update_file_image_discuss1').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                    for (var i = 0; i < arr_update_discuss.length; i++) {
                        if (arr_update_discuss[i].match('/image/') != null) {
                            html = `<div class="v_block_file_detail">
                            <img class="v_block_file_image" src="` + arr_update_discuss[i] + `" alt="Ảnh lỗi">
                            <img class="show_del_img del_update_discuss_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                            </div>`;
                            element_parent.find('.v_block_img').append(html);
                            arr_update_discuss_image.push(arr_update_discuss[i]);
                        } else if (arr_update_discuss[i].match('/video/') != null) {
                            var duoi = arr_update_discuss[i].split('.');
                            duoi = duoi[duoi.length - 1];
                            html = `<div class="v_block_file_detail">
                            <video class="v_block_file_image" controls>
                            <source src="` + arr_update_discuss[i] + `" type="video/` + duoi + `">
                            </video>
                            <img class="show_del_img del_update_discuss_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                            </div>`;
                            element_parent.find('.v_block_img').append(html);
                            arr_update_discuss_image.push(arr_update_discuss[i]);
                        } else {
                            html = `<div class="v_block_file_detail2">
                            <img src="../img/show_del_file.svg" class="show_del_file del_update_discuss_file" alt="show_del_file.svg">
                            <p class="show_name_file2">` + arr_update_name_file_dicuss[i] + `</p>
                            <div class="show_file2">
                            <p class="show_file_size">` + data.data.created_at + `</p>
                            </div>
                            </div>`;
                            element_parent.find('.v_block_file').append(html);
                            arr_update_discuss_file.push(arr_update_discuss[i]);
                        }
                    }
                }
            } else if (new_type == 6) {
                $("#model_chinhsuachiaseytuong_sdn").show();
                var element_parent = $(".model_chinhsuachiaseytuong");
                element_parent.find('.block_name_file_detail').remove();
                element_parent.find('.title_ud_upload_notify').show();
                element_parent.find('.v_block_file').remove();
                element_parent.find('.v_block_img').remove();
                element_parent.find('.new_title').val(data.data.new_title);
                element_parent.find('.content').val(data.data.content);
                element_parent.find(".position").val(data.data.position).trigger('change');
                element_parent.find(".new_id").val(new_id);
                element_parent.find('.v_idea_file_name').val(data.data.file);
                window.arr_update_idea_file = [];
                window.arr_update_idea_image = [];

                window.arr_update_idea_name_img = [];
                window.arr_update_idea_name_file = [];
                if (data.data.file != "") {
                    $('.title_ud_upload_idea').hide();
                    window.arr_update_idea = data.data.file.split("||");
                    window.arr_update_name_file_idea = data.data.name_file.split("||");
                    element_parent.find('.title_upload_ud_idea').hide();
                    for (var i = 0; i < arr_update_name_file_idea.length; i++) {
                        element_parent.find('.block_name_file_ud_idea').append('<div class="block_name_file_detail">' + arr_update_name_file_idea[i] + '</div>');
                        if (arr_update_idea[i].match('/image/') != null || arr_update_idea[i].match('/video/') != null) {
                            arr_update_idea_name_img.push(arr_update_name_file_idea[i]);
                        } else {
                            arr_update_idea_name_file.push(arr_update_name_file_idea[i]);
                        }
                    }
                    element_parent.find('.v_update_file_image_idea').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                    for (var i = 0; i < arr_update_idea.length; i++) {
                        if (arr_update_idea[i].match('/image/') != null) {
                            html = `<div class="v_block_file_detail">
                            <img class="v_block_file_image" src="` + arr_update_idea[i] + `" alt="Ảnh lỗi">
                            <img class="show_del_img del_update_idea_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                            </div>`;
                            element_parent.find('.v_block_img').append(html);
                            arr_update_idea_image.push(arr_update_idea[i]);
                        } else if (arr_update_idea[i].match('/video/') != null) {
                            var duoi = arr_update_idea[i].split('.');
                            duoi = duoi[duoi.length - 1];
                            html = `<div class="v_block_file_detail">
                            <video class="v_block_file_image" controls>
                            <source src="` + arr_update_idea[i] + `" type="video/` + duoi + `">
                            </video>
                            <img class="show_del_img del_update_idea_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                            </div>`;
                            element_parent.find('.v_block_img').append(html);
                            arr_update_idea_image.push(arr_update_idea[i]);
                        } else {
                            html = `<div class="v_block_file_detail2">
                            <img src="../img/show_del_file.svg" class="show_del_file del_update_idea_file" alt="show_del_file.svg">
                            <p class="show_name_file2">` + arr_update_name_file_idea[i] + `</p>
                            <div class="show_file2">
                            <p class="show_file_size">` + data.data.created_at + `</p>
                            </div>
                            </div>`;
                            element_parent.find('.v_block_file').append(html);
                            arr_update_idea_file.push(arr_update_idea[i]);
                        }
                    }
                }
            } else if (new_type == 7) {
                element_parent = $(".model-chinhsuabinhchon");
                element_parent.find('.new_id').val(new_id);
                $("#model-chinhsuabinhchon").show();
                element_parent.find('.new_title').val(data.data.new_title);
                CKEDITOR.instances['content_chinhsuathaoluan'].setData(data.data.content);
                var id_user_tags = data.data.id_user_tags.split(",");
                element_parent.find('.id_user_tags').val(id_user_tags).trigger('change');
                element_parent.find('.date_ngay').val(data.data2[0].time.date_ngay);
                element_parent.find('.date_gio').val(data.data2[0].time.date_gio);
                var html = "";
                for (var i = 0; i < data.data2.length; i++) {
                    html = html + '<label class="name">Phương án ' + (i + 1) + '</label><div class="d_flex space_b box_flex2" style="width: 100%; display:flex;"><div class="item_flex3"><input type="text" value="' + data.data2[i].answer + '" class="vote_option vote_option_daco" name="txt_noidungphuongan" placeholder="Nội dung"></div><div class="item_flex3 input_xanh"><input type="file" name="" class="custom-file-input v_file_option file_option_daco" onchange="v_file_option_change(this)"><input type="text" class="v_file_text" value="' + data.data2[i].file + '" onclick="v_file_change(this)" readonly></div></div>';
                }
                $(".form_group_option_vote_detail").html(html);
                element_parent.find('.form_group_option_vote').prepend();
            } else if (new_type == 8) {
                var element_parent = $(".model_chinhsuakhenthuong");
                element_parent.find('.block_name_file_detail').remove();
                element_parent.find('.title_upload_ud_bonus').show();
                element_parent.find('.v_block_file').remove();
                element_parent.find('.v_block_img').remove();
                $("#model_chinhsuakhenthuong").show();
                var arr = data.data.id_user_tags.split(",");
                element_parent.find('.id_user_tags').val(arr).trigger("change");
                element_parent.find('.position').val(data.data.position).trigger("change");
                element_parent.find('.content').val(data.data.content);
                element_parent.find('.text_bonus_file').val(data.data.name_file);
                element_parent.find(".bonus_option").val(data.data2.id_option);
                element_parent.find(".loai").css("background", "none");
                element_parent.find(".loai").eq(data.data2.id_option - 1).css("background", "rgba(71, 71, 71, 0.25)");
                element_parent.find('.new_id').val(new_id);
                window.arr_update_bonus_file = [];
                window.arr_update_bonus_image = [];

                window.arr_update_bonus_name_img = [];
                window.arr_update_bonus_name_file = [];

                if (data.data.file != "") {
                    window.arr_update_bonus = data.data.file.split("||");
                    window.arr_update_name_file_bonus = data.data.name_file.split("||");
                    element_parent.find('.title_upload_ud_bonus').hide();
                    for (var i = 0; i < arr_update_name_file_bonus.length; i++) {
                        element_parent.find('.block_name_file_ud_bonus').append('<div class="block_name_file_detail">' + arr_update_name_file_bonus[i] + '</div>');
                        if (arr_update_bonus[i].match('/image/') != null || arr_update_bonus[i].match('/video/') != null) {
                            arr_update_bonus_name_img.push(arr_update_name_file_bonus[i]);
                        } else {
                            arr_update_bonus_name_file.push(arr_update_name_file_bonus[i]);
                        }
                    }
                    element_parent.find('.v_update_file_image_bonus').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                    for (var i = 0; i < arr_update_bonus.length; i++) {
                        if (arr_update_bonus[i].match('/image/') != null) {
                            html = `<div class="v_block_file_detail">
                            <img class="v_block_file_image" src="` + arr_update_bonus[i] + `" alt="Ảnh lỗi">
                            <img class="show_del_img del_update_bonus_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                            </div>`;
                            element_parent.find('.v_block_img').append(html);
                            arr_update_bonus_image.push(arr_update_bonus[i]);
                        } else if (arr_update_bonus[i].match('/video/') != null) {
                            var duoi = arr_update_bonus[i].split('.');
                            duoi = duoi[duoi.length - 1];
                            html = `<div class="v_block_file_detail">
                            <video class="v_block_file_image" controls>
                            <source src="` + arr_update_bonus[i] + `" type="video/` + duoi + `">
                            </video>
                            <img class="show_del_img del_update_bonus_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                            </div>`;
                            element_parent.find('.v_block_img').append(html);
                            arr_update_bonus_image.push(arr_update_bonus[i]);
                        } else {
                            html = `<div class="v_block_file_detail2">
                            <img src="../img/show_del_file.svg" class="show_del_file del_update_bonus_file" alt="show_del_file.svg">
                            <p class="show_name_file2">` + arr_update_name_file_bonus[i] + `</p>
                            <div class="show_file2">
                            <p class="show_file_size">` + data.data.created_at + `</p>
                            </div>
                            </div>`;
                            element_parent.find('.v_block_file').append(html);
                            arr_update_bonus_file.push(arr_update_bonus[i]);
                        }
                    }
                }
            } else if (new_type == 9) {
                var element_parent = $(".model_chinhsuatinnoibo");
                element_parent.find('.block_name_file_detail').remove();
                element_parent.find('.title_upload_ud_internal').show();
                element_parent.find('.v_block_file').remove();
                element_parent.find('.v_block_img').remove();
                $("#model_chinhsuatinnoibo").show();
                element_parent.find(".new_title").val(data.data.new_title);
                element_parent.find(".content").val(data.data.content);
                element_parent.find(".v_up_cover_image").val(data.data2.cover_image);
                element_parent.find(".v_up_file").val(data.data.file);
                element_parent.find(".new_id").val(new_id);

                window.arr_update_internal_file = [];
                window.arr_update_internal_image = [];

                window.arr_update_internal_name_img = [];
                window.arr_update_internal_name_file = [];

                if (data.data.file != "") {
                    window.arr_update_internal = data.data.file.split("||");
                    window.arr_update_name_file_internal = data.data.name_file.split("||");
                    element_parent.find('.title_upload_ud_internal').hide();
                }

                for (var i = 0; i < arr_update_name_file_internal.length; i++) {
                    element_parent.find('.block_name_file_ud_internal').append('<div class="block_name_file_detail">' + arr_update_name_file_internal[i] + '</div>');
                    if (arr_update_internal[i].match('/image/') != null || arr_update_internal[i].match('/video/') != null) {
                        arr_update_internal_name_img.push(arr_update_name_file_internal[i]);
                    } else {
                        arr_update_internal_name_file.push(arr_update_name_file_internal[i]);
                    }
                }

                element_parent.find('.v_update_file_image_internal').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                for (var i = 0; i < arr_update_internal.length; i++) {
                    if (arr_update_internal[i].match('/image/') != null) {
                        html = `<div class="v_block_file_detail">
                        <img class="v_block_file_image" src="` + arr_update_internal[i] + `" alt="Ảnh lỗi">
                        <img class="show_del_img del_update_internal_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                        </div>`;
                        element_parent.find('.v_block_img').append(html);
                        arr_update_internal_image.push(arr_update_internal[i]);
                    } else if (arr_update_internal[i].match('/video/') != null) {
                        var duoi = arr_update_internal[i].split('.');
                        duoi = duoi[duoi.length - 1];
                        html = `<div class="v_block_file_detail">
                        <video class="v_block_file_image" controls>
                        <source src="` + arr_update_internal[i] + `" type="video/` + duoi + `">
                        </video>
                        <img class="show_del_img del_update_internal_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                        </div>`;
                        element_parent.find('.v_block_img').append(html);
                        arr_update_internal_image.push(arr_update_internal[i]);
                    } else {
                        html = `<div class="v_block_file_detail2">
                        <img src="../img/show_del_file.svg" class="show_del_file del_update_internal_file" alt="show_del_file.svg">
                        <p class="show_name_file2">` + arr_update_name_file_internal[i] + `</p>
                        <div class="show_file2">
                        <p class="show_file_size">` + data.data.created_at + `</p>
                        </div>
                        </div>`;
                        element_parent.find('.v_block_file').append(html);
                        arr_update_internal_file.push(arr_update_internal[i]);
                    }
                }
            }
        }
    });
});
$(".text_img_edit_event").click(function() {
    $(".model_chinhsuasukien_noibo_sdn").find(".v_chinhsua_event_noibo").click();
});
$(".text_img_edit_event_avatar").click(function() {
    $(".model_chinhsuasukien_noibo_sdn").find(".v_chinhsua_event_avatar_noibo").click();
});
$(".v_chinhsua_event_avatar_noibo").change(function() {
    var name_avatar = $(".model_chinhsuasukien_noibo_sdn").find(".v_chinhsua_event_avatar_noibo").prop('files')[0].name;
    $(".model_chinhsuasukien_noibo_sdn").find(".text_img_edit_event_avatar").val(name_avatar);
});
$(".v_chinhsua_event_noibo").change(function() {
    var name_avatar = $(".model_chinhsuasukien_noibo_sdn").find(".v_chinhsua_event_noibo").prop('files')[0].name;
    $(".model_chinhsuasukien_noibo_sdn").find(".text_img_edit_event").val(name_avatar);
});
$("#v_huy_chinhsuachaodontvmoi").click(function() {
    $("#model_chinhsuachaodonthanhvienmoi").hide();
});
$(".v_name_file_alert").click(function() {
    $(this).next().click();
});
$("#v_huy_chaodontvmoi").click(function() {
    $(".model_chaodonthanhvienmoi")[0].reset();
    $("#v_select2_chaodontvmoi").val("").trigger("change");
});
$.validator.addMethod('filesize', function(value, element) {
    if (element.files[0].size > 10485760) {
        return false;
    } else {
        return true;
    }
}, 'File size must be less than {0}');

//Tạo tin tức nội bộ
$(".model-taotinnoibo").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_ten: {
            required: true
        },
        txt_noidung: {
            required: true
        },
        file_taitep: {
            validateFile: true,
            required: true,
        },
        file_taianh: {
            validateFile: true,
            validateFileAnh: true,
            required: true,
        }

    },
    messages: {
        txt_noidung: "Không được để trống",
        txt_ten: "Không được để trống",
        file_taitep: "Không được để trống",
        file_taianh: "Không được để trống"
    },
    submitHandler: function(form) {
        var element_parent = $(".model-taotinnoibo");
        var form_data = new FormData();
        if ($(form).data('position_id') == undefined) {
            form_data.append('position', 0);
        } else {
            form_data.append('position', $(form).data('position_id'));
        }
        if ($(form).data('type') == undefined) {
            form_data.append('type', 0);
        } else {
            form_data.append('type', 1);
        }
        form_data.append('new_title', element_parent.find(".new_title").val());
        form_data.append('content', element_parent.find(".content").val());

        if (typeof(add_internal_news_file) != "undefined") {
            for (var i = 0; i < add_internal_news_file.length; i++) {
                form_data.append('file[]', add_internal_news_file[i]);
            }
        }

        if (typeof(add_internal_news_image) != "undefined") {
            for (var i = 0; i < add_internal_news_image.length; i++) {
                form_data.append('image[]', add_internal_news_image[i]);
            }
        }

        $.ajax({
            url: '../ajax/create_internal_news.php',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                window.location.href = window.location.href;
            }
        });

    }
});

$('.block_name_file_internal_news').click(function() {
    $('.custom-file-input-internal_news').click();
});

$('.custom-file-input-internal_news').change(function() {
    $('.title_upload_internal_news').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_internal_news_file) === 'undefined') {
        window.add_internal_news_file = [];
    }

    if (typeof(add_internal_news_image) === 'undefined') {
        window.add_internal_news_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_add_file_image_internal_news').find('.v_block_img').length == 0) {
                $('.v_add_file_image_internal_news').append('<div class="v_block_img"></div>');
            }
            add_internal_news_image.push(file[i]);
            add_internal_news_image_video(file[i]);
        } else {
            add_internal_news_file.push(file[i]);
            if ($('.v_add_file_image_internal_news').find('.v_block_file').length == 0) {
                $('.v_add_file_image_internal_news').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2">
            <img src="../img/show_del_file.svg" class="show_del_file del_show_internal_news_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_add_file_image_internal_news').find('.v_block_file').append(html);
        }
        $('.block_name_file_internal_news').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});
//End: Tạo tin tức nội bộ

$(".btn_huy_taotinnoibo").click(function() {
    var element_parent = $(".model-taotinnoibo");
    element_parent[0].reset();
});
$(".v_up_cover_image").click(function() {
    $(this).next().click();
});
$(".model_chinhsuatinnoibo .v_up_file").click(function() {
    $(".model_chinhsuatinnoibo .file").click();
});
$(".model_chinhsuatinnoibo .cover_image").change(function() {
    name_img = $(this).prop('files')[0].name;
    $(this).prev().val(name_img);
});
$(".model_chinhsuatinnoibo .file").change(function() {
    name_img = $(this).prop('files')[0].name;
    $(this).parent().prev().val(name_img);
});

//Chỉnh sửa tin tức nội bộ
$(".model_chinhsuatinnoibo").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_ten: {
            required: true
        },
        txt_noidung: {
            required: true
        }
    },
    messages: {
        txt_noidung: "Không được để trống",
        txt_ten: "Không được để trống",
    },
    submitHandler: function(form) {
        var element_parent = $(".model_chinhsuatinnoibo");
        var form_data = new FormData();
        form_data.append('new_id', element_parent.find(".new_id").val());
        form_data.append('new_title', element_parent.find(".new_title").val());
        form_data.append('content', element_parent.find(".content").val());

        form_data.append("arr_update_internal_image", arr_update_internal_image);
        form_data.append("arr_update_internal_file", arr_update_internal_file);

        form_data.append("arr_update_internal_name_file", arr_update_internal_name_file);

        form_data.append("arr_update_internal_name_img", arr_update_internal_name_img);

        if (typeof(update_internal_image) !== "undefined") {
            for (var i = 0; i < update_internal_image.length; i++) {
                form_data.append('update_internal_image[]', update_internal_image[i]);
            }
        }

        if (typeof(update_internal_file) !== "undefined") {
            for (var i = 0; i < update_internal_file.length; i++) {
                form_data.append('update_internal_file[]', update_internal_file[i]);
            }
        }
        $.ajax({
            url: '../ajax/update_internal_news.php',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                location.reload();
            }
        });

    }
});

$(".block_name_file_ud_internal").click(function() {
    $('.custom-file-input-internal-ud').click();
});

$('.custom-file-input-internal-ud').change(function() {
    $('.title_upload_ud_internal').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(update_internal_file) === 'undefined') {
        window.update_internal_file = [];
    }

    if (typeof(update_internal_image) === 'undefined') {
        window.update_internal_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_update_file_image_internal').find('.v_block_img').length == 0) {
                $('.v_update_file_image_internal').append('<div class="v_block_img"></div>');
            }
            update_internal_image.push(file[i]);
            add_ud_internal_image_video(file[i]);
        } else {
            update_internal_file.push(file[i]);
            if ($('.v_update_file_image_internal').find('.v_block_file').length == 0) {
                $('.v_update_file_image_internal').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2_ud">
            <img src="../img/show_del_file.svg" class="show_del_file del_add_ud_internal_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_update_file_image_internal').find('.v_block_file').append(html);
        }
        $('.block_name_file_ud_internal').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});

$("#v_huy_chia_se_y_tuong").click(function() {
    $("#model_chiaseytuong_sdn").fadeOut();
    $(".model_chiaseytuong")[0].reset();
    $("#v_idea_position").select2({
        width: "100%"
    }).val("0").trigger("change");
});

//chia sẻ ý tưởng
$('.block_name_file_bonus').click(function() {
    $('.custom-file-input-bonus').click();
});

$('.custom-file-input-bonus').change(function() {
    $('.title_upload_bonus').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_bonus_file) === 'undefined') {
        window.add_bonus_file = [];
    }

    if (typeof(add_bonus_image) === 'undefined') {
        window.add_bonus_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_add_file_image_bonus').find('.v_block_img').length == 0) {
                $('.v_add_file_image_bonus').append('<div class="v_block_img"></div>');
            }
            add_bonus_image.push(file[i]);
            add_bonus_image_video(file[i]);
        } else {
            add_bonus_file.push(file[i]);
            if ($('.v_add_file_image_bonus').find('.v_block_file').length == 0) {
                $('.v_add_file_image_bonus').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2">
            <img src="../img/show_del_file.svg" class="show_del_file del_show_bonus_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_add_file_image_bonus').find('.v_block_file').append(html);
        }
        $('.block_name_file_bonus').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});

//Chia sẻ ý tưởng
$(".model_chiaseytuong").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_ten: "required",
        txt_noidung: "required",
        select_thongbao: "required",
    },
    messages: {
        txt_ten: "Không được để trống",
        txt_noidung: "Không được để trống",
        select_thongbao: "Không được để trống",
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        if ($(form).find('.form_group_pos').length == 0) {
            var position = $(form).data('dep_id');
        } else {
            var position = $(".model_chiaseytuong").find(".position").val();
        }
        form_data.append('position', position);
        if ($(form).data('type') == undefined) {
            var type = 0;
        } else {
            var type = 1;
        }
        form_data.append('type', type);
        form_data.append('new_title', $(".model_chiaseytuong").find(".new_title").val());
        form_data.append('content', $(".model_chiaseytuong").find(".content").val());

        if (typeof(add_idea_file) != "undefined") {
            for (var i = 0; i < add_idea_file.length; i++) {
                form_data.append('file[]', add_idea_file[i]);
            }
        }

        if (typeof(add_idea_image) != "undefined") {
            for (var i = 0; i < add_idea_image.length; i++) {
                form_data.append('image[]', add_idea_image[i]);
            }
        }

        $(form).find('.v_btn_luu_img').show();
        $(form).find('.v_btn_luu_span').hide();
        $(form).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/v_create_idea.php',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#v_idea_position").select2({
                    width: "100%"
                }).val("0").trigger("change");
                $("#model_chiaseytuong_sdn").fadeOut();
                $("#v_check_ring_content").text("Bạn đã tạo chia sẻ ý tưởng thành công");
                $(".v_check_ring").fadeIn();
                setTimeout(function() {
                    $(".v_check_ring").fadeOut();
                }, 2000);
                location.reload();
            }
        });
    }
});
$(".model_chinhsuachiaseytuong").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_ten: "required",
        txt_noidung: "required",
        select_thongbao: "required",
    },
    messages: {
        txt_ten: "Không được để trống",
        txt_noidung: "Không được để trống",
        select_thongbao: "Không được để trống",
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        form_data.append('new_id', $(".model_chinhsuachiaseytuong").find(".new_id").val());
        form_data.append('new_title', $(".model_chinhsuachiaseytuong").find(".new_title").val());
        form_data.append('content', $(".model_chinhsuachiaseytuong").find(".content").val());
        form_data.append('position', $(".model_chinhsuachiaseytuong").find(".position").val());

        form_data.append("arr_update_idea_image", arr_update_idea_image);
        form_data.append("arr_update_idea_file", arr_update_idea_file);

        form_data.append("arr_update_idea_name_file", arr_update_idea_name_file);

        form_data.append("arr_update_idea_name_img", arr_update_idea_name_img);

        if (typeof(update_idea_image) !== "undefined") {
            for (var i = 0; i < update_idea_image.length; i++) {
                form_data.append('update_idea_image[]', update_idea_image[i]);
            }
        }

        if (typeof(update_idea_file) !== "undefined") {
            for (var i = 0; i < update_idea_file.length; i++) {
                form_data.append('update_idea_file[]', update_idea_file[i]);
            }
        }

        $(form).find('.v_btn_luu_img').show();
        $(form).find('.v_btn_luu_span').hide();
        $(form).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/update_idea.php',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.result == true) {
                    $("#model_chiaseytuong_sdn").fadeOut();
                    $("#v_check_ring_content").text("Bạn đã chỉnh chia sẻ ý tưởng thành công");
                    $(".v_check_ring").fadeIn();
                    setTimeout(function() {
                        $(".v_check_ring").fadeOut();
                    }, 2000);
                    location.reload();
                } else {
                    alert("Có lỗi xảy ra. Vui lòng thử lại");
                }
            }
        });
    }
});

$(".block_name_file_ud_idea").click(function() {
    $('.custom-file-input-ud-idea').click();
});

$('.custom-file-input-ud-idea').change(function() {
    $('.title_ud_upload_idea').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(update_idea_file) === 'undefined') {
        window.update_idea_file = [];
    }

    if (typeof(update_idea_image) === 'undefined') {
        window.update_idea_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_update_file_image_idea').find('.v_block_img').length == 0) {
                $('.v_update_file_image_idea').append('<div class="v_block_img"></div>');
            }
            update_idea_image.push(file[i]);
            add_ud_idea_image_video(file[i]);
        } else {
            update_idea_file.push(file[i]);
            if ($('.v_update_file_image_idea').find('.v_block_file').length == 0) {
                $('.v_update_file_image_idea').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2_ud">
            <img src="../img/show_del_file.svg" class="show_del_file del_add_ud_idea_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_update_file_image_idea').find('.v_block_file').append(html);
        }
        $('.block_name_file_ud_idea').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});

$('.block_name_file_idea').click(function() {
    $('.custom-file-input-idea').click();
});

$('.custom-file-input-idea').change(function() {
    $('.title_upload_idea').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_idea_file) === 'undefined') {
        window.add_idea_file = [];
    }

    if (typeof(add_idea_image) === 'undefined') {
        window.add_idea_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_add_file_image_idea').find('.v_block_img').length == 0) {
                $('.v_add_file_image_idea').append('<div class="v_block_img"></div>');
            }
            add_idea_image.push(file[i]);
            add_idea_image_video(file[i]);
        } else {
            add_idea_file.push(file[i]);
            if ($('.v_add_file_image_idea').find('.v_block_file').length == 0) {
                $('.v_add_file_image_idea').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2">
            <img src="../img/show_del_file.svg" class="show_del_file del_show_idea_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_add_file_image_idea').find('.v_block_file').append(html);
        }
        $('.block_name_file_idea').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});

//END: Chia sẻ ý tưởng

$(".loai").click(function() {
    if ($("#model_chinhsuakhenthuong").css('display') == "block") {
        $("#model_chinhsuakhenthuong").find(".loai").css('background', 'none');
        $(this).css('background', 'rgba(71, 71, 71, 0.25)');
        $("#model_chinhsuakhenthuong").find('.bonus_option').val($(this).data('id_option'));
    }
    if ($("#model_taokhenthuong").css('display') == "block") {
        $("#model_taokhenthuong").find(".loai").css('background', 'none');
        $(this).css('background', 'rgba(71, 71, 71, 0.25)');
        $("#model_taokhenthuong").find('.bonus_option').val($(this).data('id_option'));
    }
});
$.validator.addMethod("check_bonus_option", function(value, element) {
    if (element[0].value != 1 && element[0].value != 2 && element[0].value != 3 && element[0].value != 4) {
        return false;
    } else {
        return true;
    }
}, "Dung lượng không quá 2MB");
$(".model_taokhenthuong").validate({
    errorPlacement: function(error, element) {
        if (element.attr('name') != "id_option") {
            error.appendTo(element.parents(".form_group"));
            error.wrap("<span class='error'>");
        } else {
            element.parents(".form_group").after(error);
        }
    },
    rules: {
        select2_tv: "required",
        select_phongban: "required",
        txt_loinhan: "required",
        id_option: {
            required: true,
            check_bonus_option: true
        }
    },
    messages: {
        select2_tv: "Không được để trống",
        select_phongban: "Không được để trống",
        txt_loinhan: "không được để trống",
        id_option: {
            required: "Vui lòng chọn loại hình khen thưởng",
            check_bonus_option: "Vui lòng chọn loại hình khen thưởng"
        }
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        var element = $(".model_taokhenthuong");
        if ($(form).data('type') == undefined) {
            var type = 0;
        } else {
            var type = 1;
        }
        form_data.append('position', element.find(".position").val());
        form_data.append('id_user_tags', element.find(".id_user_tags").val());
        form_data.append('content', element.find(".content").val());

        if (typeof(add_bonus_file) != "undefined") {
            for (var i = 0; i < add_bonus_file.length; i++) {
                form_data.append('file[]', add_bonus_file[i]);
            }
        }

        if (typeof(add_bonus_image) != "undefined") {
            for (var i = 0; i < add_bonus_image.length; i++) {
                form_data.append('image[]', add_bonus_image[i]);
            }
        }

        form_data.append('id_option', element.find(".bonus_option").val());
        $.ajax({
            url: '../ajax/create_bonus.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                $("#model_taokhenthuong").fadeOut();
                $("#v_check_ring_content").text("Bạn đã tạo khen thưởng thành công");
                $(".v_check_ring").fadeIn();
                setTimeout(function() {
                    $(".v_check_ring").fadeOut();
                }, 1500);
                window.location.href = window.location.href;
            }
        });
    }
});

//Chỉnh sửa khen thưởng
$('.block_name_file_ud_bonus').click(function() {
    $('.custom-file-input-bonus-ud').click();
});

$('.custom-file-input-bonus-ud').change(function() {
    $('.title_upload_ud_bonus').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(update_bonus_file) === 'undefined') {
        window.update_bonus_file = [];
    }

    if (typeof(update_bonus_image) === 'undefined') {
        window.update_bonus_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_update_file_image_bonus').find('.v_block_img').length == 0) {
                $('.v_update_file_image_bonus').append('<div class="v_block_img"></div>');
            }
            update_bonus_image.push(file[i]);
            add_ud_bonus_image_video(file[i]);
        } else {
            update_bonus_file.push(file[i]);
            if ($('.v_update_file_image_bonus').find('.v_block_file').length == 0) {
                $('.v_update_file_image_bonus').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2_ud">
            <img src="../img/show_del_file.svg" class="show_del_file del_add_ud_bonus_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_update_file_image_bonus').find('.v_block_file').append(html);
        }
        $('.block_name_file_ud_bonus').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});


$(".model_chinhsuakhenthuong").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        select2_tv: "required",
        select_phongban: "required",
        txt_loinhan: "required",
    },
    messages: {
        select2_tv: "Không được để trống",
        select_phongban: "Không được để trống",
        txt_loinhan: "không được để trống",
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        var element = $(".model_chinhsuakhenthuong");
        form_data.append("new_id", element.find(".new_id").val());
        form_data.append("id_user_tags", element.find(".id_user_tags").val());
        form_data.append("position", element.find(".position").val());
        form_data.append("content", element.find(".content").val());
        form_data.append("id_option", element.find(".bonus_option").val());

        form_data.append("arr_update_bonus_image", arr_update_bonus_image);
        form_data.append("arr_update_bonus_file", arr_update_bonus_file);

        form_data.append("arr_update_bonus_name_file", arr_update_bonus_name_file);

        form_data.append("arr_update_bonus_name_img", arr_update_bonus_name_img);

        if (typeof(update_bonus_image) !== "undefined") {
            for (var i = 0; i < update_bonus_image.length; i++) {
                form_data.append('update_bonus_image[]', update_bonus_image[i]);
            }
        }

        if (typeof(update_bonus_file) !== "undefined") {
            for (var i = 0; i < update_bonus_file.length; i++) {
                form_data.append('update_bonus_file[]', update_bonus_file[i]);
            }
        }
        $.ajax({
            url: '../ajax/update_bonus.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                if (data.result == true) {
                    location.reload();
                }
            },
        });

    }
});
$(".btn_huy_taokhenthuong").click(function() {
    var element_parent = $(".model_taokhenthuong");
    element_parent[0].reset();
    element_parent.find('.id_user_tags').val("").trigger('change');
    element_parent.find('.position').val(0).trigger('change');
    element_parent.find('.bonus_option').val(1);
    for (var i = 0; i < element_parent.find('.loai').length; i++) {
        element_parent.find('.loai').eq(i).css('background', 'none');
    }
    element_parent.find('.loai').eq(0).css('background', 'rgba(71, 71, 71, 0.25)');
});
$(".model_chinhsuakhenthuong .text_bonus_file").click(function() {
    $(".model_chinhsuakhenthuong").find(".bonus_file").click();
});
$(".model_chinhsuakhenthuong .bonus_file").change(function() {
    var name_file = $(this).prop('files')[0].name;
    $(".model_chinhsuakhenthuong .text_bonus_file").val(name_file);
});
$(".model_chaodonthanhvienmoi").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        select2_tv: "required",
        txt_loinhan: "required",
    },
    messages: {
        select2_tv: "Không được để trống",
        txt_loinhan: "không được để trống"
    },
    submitHandler: function(form) {
        if ($(form).data('position_id') == undefined) {
            var position = 0;
        } else {
            var position = $(form).data('position_id');
        }
        if ($(form).data('type') == undefined) {
            var type = 0;
        } else {
            var type = 1;
        }

        $(form).find('.v_btn_luu_img').show();
        $(form).find('.v_btn_luu_span').hide();
        $(form).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/newfeed_chaodontvmoi.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id_users_tags: $(".model_chaodonthanhvienmoi").find(".v_select2_chaodontvmoi").val(),
                content: $(".model_chaodonthanhvienmoi").find(".v_content_chaodontvmoi").val(),
                position: position,
                type: type
            },
            success: function(data) {
                $(".model_chaodonthanhvienmoi")[0].reset();
                $(".model_chaodonthanhvienmoi").find(".v_select2_chaodontvmoi").val("").trigger("change");
                $("#model_chaodonthanhvienmoi").fadeOut();
                $("#v_check_ring_content").text('Bạn đã tạo thông báo chào đón thành viên mới thành công');
                $(".v_check_ring").fadeIn();
                setTimeout(function() {
                    $(".v_check_ring").fadeOut();
                }, 2000);
                window.location.href = window.location.href;
            }
        });

    }
});
$(".model_chinhsuachaodonthanhvienmoi").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        select2_tv: "required",
        txt_loinhan: "required",
    },
    messages: {
        select2_tv: "Không được để trống",
        txt_loinhan: "không được để trống"
    },
    submitHandler: function(form) {
        $(form).find('.v_btn_luu_img').show();
        $(form).find('.v_btn_luu_span').hide();
        $(form).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/newfeed_edit_chaodontvmoi.php',
            type: 'POST',
            dataType: 'json',
            data: {
                new_id: $(".model_chinhsuachaodonthanhvienmoi").find(".v_new_id02").val(),
                id_users_tags: $(".model_chinhsuachaodonthanhvienmoi").find(".v_select2_chaodontvmoi").val(),
                content: $(".model_chinhsuachaodonthanhvienmoi").find(".v_content_chaodontvmoi").val()
            },
            success: function(data) {
                window.location.href = window.location.href;
            }
        });

    }
});

$(".model_taosukien_noibo").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".form_group"));
        error.wrap("<span class='error'>");
    },
    rules: {
        txt_ten: "required",
        date_ngay: {
            sauhomnay: true,
            required: true

        },
        file_taitep: {
            validateFile: true,
            required: true,
        },
        txt_mieuta: "required",
        file_taianh: {
            validateFile: true,
            required: true,
            validateFileAnh: true
        }
    },
    messages: {
        txt_ten: "không được để trống",
        txt_mieuta: "không được để trống",
        date_gio: "không được để trống",
    },
});
//Tạo sự kiện nội bộ
$(".model_taosukien_noibo_sdn").validate({
    errorPlacement: function(error, element) {
        error.addClass('v_err_taosukiennoibo');
        element.parent().append(error);
    },
    rules: {
        new_title: "required",
        date_ngay: {
            sauhomnay: true,
            required: true

        },
        date_gio: {
            required: true
        },
        file_taitep: {
            validateFile: true,
            required: true,
        },
        txt_mieuta: "required",
        file_taianh: {
            validateFile: true,
            required: true,
            validateFileAnh: true,
        }
    },
    messages: {
        new_title: "không được để trống",
        txt_mieuta: "không được để trống",
        date_ngay: {
            sauhomnay: "Sự kiện phải sau hôm nay",
            required: "Không được để trống"

        },
        date_gio: "không được để trống",
        file_taianh: {
            required: "Không được để trống",
        },
        file_taitep: {
            required: "Không được để trống",
        }
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        if ($(form).data('position_id') == undefined) {
            form_data.append('position', 0);
        } else {
            form_data.append('position', $(form).data('position_id'));
        }

        if ($(form).data('type') == undefined) {
            form_data.append('type', 0);
        } else {
            form_data.append('type', $(form).data('type'));
        }
        var element_parent = $(".model_taosukien_noibo_sdn");
        form_data.append('new_title', element_parent.find(".new_title").val());
        form_data.append('time', element_parent.find(".v_date_ngay").val() + " " + element_parent.find(".v_date_gio").val());
        form_data.append('avatar', element_parent.find(".avatar").prop("files")[0]);
        form_data.append('content', element_parent.find(".content").val());

        if (typeof(add_e_i_file) !== "undefined") {
            for (let i = 0; i < add_e_i_file.length; i++) {
                form_data.append('file[]', add_e_i_file[i]);
            }
        }
        form_data.append('position', element_parent.find(".position").val());

        $(form).find('.v_btn_luu_img').show();
        $(form).find('.v_btn_luu_span').hide();
        $(form).find('.btn_luu').prop('type', 'button');

        $.ajax({
            url: '../ajax/create_event_noi_bo.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                $("#model_taosukien_noibo_sdn").hide();
                $("#model_taosukien_sdn").hide();
                $(".model_taosukien_noibo_sdn")[0].reset();
                $(".model_taosukien_noibo_sdn").find(".v_select2_taosukiennoibo").val("0").trigger("change");
                $("#v_check_ring_content").text("Bạn đã tạo sự kiện nội bộ thành công");
                $(".v_check_ring").fadeIn();
                setTimeout(function() {
                    $(".v_check_ring").fadeOut();
                }, 1500);
                window.location.href = window.location.href;
            }
        });
    }
});

$('.block_name_file_event_internal').click(function() {
    $('.custom-file-input-event-nb').click();
});

$('.custom-file-input-event-nb').change(function() {
    for (var i = 0; i < $(this).prop('files').length; i++) {
        if ($(this).prop('files')[i].type.match('image/*') != null || $(this).prop('files')[i].type.match('video/*') != null) {
            alert("Vui lòng không upload ảnh và video");
            return false;
            break;
        }
    }

    $('.title_upload_event_internal').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_e_i_file) === 'undefined') {
        window.add_e_i_file = [];
    }

    for (var i = 0; i < file.length; i++) {
        add_e_i_file.push(file[i]);
        if ($('.v_add_file_image_event_internal').find('.v_block_file').length == 0) {
            $('.v_add_file_image_event_internal').append('<div class="v_block_file"></div>');
        }
        var size = file[i].size / 1024;
        if (size <= 1000) {
            var text_size = size.toFixed(1) + " KB";
        } else {
            var text_size = (size / 1024).toFixed(1) + " MB";
        }
        html = `<div class="v_block_file_detail2">
        <img src="../img/xsukiendoingoai.png" class="show_del_file del_show_e_i" alt="show_del_file.svg">
        <p class="show_name_file2">` + file[i].name + `</p>
        <div class="show_file2">
        <p class="show_file_size">` + text_size + `</p>
        <p class="show_file_size">` + time_upload + `</p>
        </div>
        </div>`;
        $('.v_add_file_image_event_internal').find('.v_block_file').append(html);
        $('.block_name_file_event_internal').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});
//Sửa nhóm - phòng ban
$('.model_edit_department').submit(function() {
    var form_data = new FormData();
    var type = $(this).data('type');
    form_data.append('type', type);
    if ($(this).data('dep_id') != '') {
        form_data.append('dep_id', $(this).data('dep_id'));
    } else if ($(this).data('group_id') != '') {
        form_data.append('group_id', $(this).data('group_id'));
    }
    var flag = true;
    if ($(this).find('.dep_name').val() == "") {
        $(this).find('.dep_name').next().text('Không được để trống');
        flag = false;
    } else {
        $(this).find('.dep_name').next().text('');
        form_data.append('dep_name', $(this).find('.dep_name').val());
    }

    if ($(this).find('.dep_description').val() == "") {
        $(this).find('.dep_description').next().text('Không được để trống');
        flag = false;
    } else {
        $(this).find('.dep_description').next().text('');
        form_data.append('dep_description', $(this).find('.dep_description').val());
    }

    if (document.edit_department.mode.value != 0 && document.edit_department.mode.value != 1) {
        $(this).find('.container_check_mode').next().text('Vui lòng chọn chế độ nhóm');
        flag = false;
    } else {
        $(this).find('.container_check_mode').next().text('');
        form_data.append('mode', document.edit_department.mode.value);
    }

    if (document.edit_department.request_censorship.value != 1 && document.edit_department.request_censorship.value != 2) {
        $(this).find('.container_request').next().text('Vui lòng chọn yêu cầu kiểm duyệt');
        flag = false;
    } else {
        $(this).find('.container_request').next().text('');
        form_data.append('request_censorship', document.edit_department.request_censorship.value);
    }

    if (flag == true) {
        $.ajax({
            type: "POST",
            url: "../ajax/update_department.php",
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.result == true) {
                    location.reload();
                }
            }
        });
    }
    return false;
});

$('.model_edit_department').find('.dep_name').keyup(function() {
    if ($('.model_edit_department').find('.dep_name').val() != "") {
        $('.model_edit_department').find('.dep_name').next().text('');
    } else {
        $('.model_edit_department').find('.dep_name').next().text('Không được để trống');
    }
});

$('.model_edit_department').find('.dep_description').keyup(function() {
    if ($('.model_edit_department').find('.dep_description').val() != "") {
        $('.model_edit_department').find('.dep_description').next().text('');
    } else {
        $('.model_edit_department').find('.dep_description').next().text('Không được để trống');
    }
});
$('.model_edit_department').find('.v_mode').click(function() {
    console.log(document.edit_department.mode.value);
    if (document.edit_department.mode.value != "") {
        $('.model_edit_department').find('.container_check_mode').next().text('');
    }
});
$('.model_edit_department').find('.v_request').click(function() {
    if (document.edit_department.request_censorship.value != "") {
        $('.model_edit_department').find('.container_request').next().text('');
    }
});
$(".v_event_more").click(function() {
    var new_id = $(this).data('new_id');
    $.ajax({
        url: '../ajax/show_event_internal.php',
        type: 'POST',
        dataType: 'json',
        data: {
            new_id: new_id
        },
        success: function(data) {
            var element_parent = $(".show_event_internal");
            element_parent.find('.new_title').text(data.data.new_title);
            element_parent.find('.v_event_internal_content1').text(data.data.content);
            element_parent.find('.v_event_internal_position').text(data.data.position);
            element_parent.find('.thanh-vien-all').html(data.html);
            $(".v_detail_event_internal").show();
        }
    });

})
$(".btn_event_join").click(function() {
    var id_event = $(this).data('event_id');
    var element = $(this);
    $.ajax({
        url: '../ajax/event_join.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id_event: id_event
        },
        success: function(data) {
            element.text(data.msg);
        }
    });
});

$(".block_name_evt_nb_ud").click(function() {
    $('.custom-file-input-nb-ud').click();
});

$('.custom-file-input-nb-ud').change(function() {
    for (var i = 0; i < $(this).prop('files').length; i++) {
        if ($(this).prop('files')[i].type.match('image/*') != null || $(this).prop('files')[i].type.match('video/*') != null) {
            alert("Vui lòng không upload ảnh và video");
            return false;
            break;
        }
    }

    $('.title_upload_evt_nb_ud').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_e_i_ud_file) === 'undefined') {
        window.add_e_i_ud_file = [];
    }

    for (var i = 0; i < file.length; i++) {
        add_e_i_ud_file.push(file[i]);
        if ($('.v_add_file_image_event_internal_ud').find('.v_block_file').length == 0) {
            $('.v_add_file_image_event_internal_ud').append('<div class="v_block_file"></div>');
        }
        var size = file[i].size / 1024;
        if (size <= 1000) {
            var text_size = size.toFixed(1) + " KB";
        } else {
            var text_size = (size / 1024).toFixed(1) + " MB";
        }
        html = `<div class="v_block_file_detail2_ud">
        <img src="../img/xsukiendoingoai.png" class="show_del_file del_show_e_i_add" alt="show_del_file.svg">
        <p class="show_name_file2">` + file[i].name + `</p>
        <div class="show_file2">
        <p class="show_file_size">` + text_size + `</p>
        <p class="show_file_size">` + time_upload + `</p>
        </div>
        </div>`;
        $('.v_add_file_image_event_internal_ud').find('.v_block_file').append(html);
        $('.block_name_evt_nb_ud').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});
$(".model_chinhsuasukien_noibo_sdn").validate({
    errorPlacement: function(error, element) {
        error.addClass('v_err_taosukiennoibo');
        element.parent().append(error);
    },
    rules: {
        txt_ten: "required",
        date_ngay: {
            sauhomnay: true,
            required: true
        },
        date_gio: {
            required: true
        },
        file_taitep: {
            validateFile: true,
            required: true,
        },
        txt_mieuta: "required",
        file_taianh: {
            validateFile: true,
            required: true,
            validateFileAnh: true,
            filesize: 10240
        }
    },
    messages: {
        txt_ten: "không được để trống",
        txt_mieuta: "không được để trống",
        date_ngay: "Không được để trống",
        date_gio: "không được để trống",
        file_taianh: {
            required: "Không được để trống",
            filesize: "Vui lòng tải ảnh đại diện dưới 10MB"
        },
        file_taitep: {
            required: "Không được để trống",
        }
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        form_data.append('new_title', $(".model_chinhsuasukien_noibo_sdn").find(".v_title_event").val());
        form_data.append('new_id', $(".model_chinhsuasukien_noibo_sdn").find(".v_chinhsua_event_noibo_hidden").val());
        form_data.append('time', $(".model_chinhsuasukien_noibo_sdn").find(".v_date_ngay_eventnoibo").val() + " " + $(".model_chinhsuasukien_noibo_sdn").find(".v_date_gio_eventnoibo").val());
        if ($(".model_chinhsuasukien_noibo_sdn").find(".v_event_avatar_noi_bo").prop("files")[0] != undefined) {
            form_data.append('event_avatar', $(".model_chinhsuasukien_noibo_sdn").find(".v_event_avatar_noi_bo").prop("files")[0]);
        }

        form_data.append('arr_file_nb', arr_file_nb);
        form_data.append('arr_name_file_nb', arr_name_file_nb);
        if (typeof(add_e_i_ud_file) != "undefined") {
            for (var i = 0; i < add_e_i_ud_file.length; i++) {
                form_data.append('file[]', add_e_i_ud_file);
            }
        }
        form_data.append('content', $(".model_chinhsuasukien_noibo_sdn").find(".v_mieuta_event_noi_bo").val());
        form_data.append('position', $(".model_chinhsuasukien_noibo_sdn").find(".v_select2_taosukiennoibo").val());

        $(form).find('.v_btn_luu_img').show();
        $(form).find('.v_btn_luu_span').hide();
        $(form).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/update_event_noi_bo.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                window.location.href = window.location.href;
            }
        });
    }
});
$("#v_huy_chinhsuasukiennoibo").click(function() {
    $("#model_chinhsuasukien_noibo_sdn").hide();
});
$(".close_detl").click(function() {
    $("#model_chinhsuasukien_noibo_sdn").hide();
});
$("#v_huy_taosukiennoibo").click(function() {
    console.log($("#model_taosukien_noibo_sdn"));
    $("#model_taosukien_noibo_sdn2")[0].reset();
    $("#v_select2_taosukiennoibo").select2({
        width: "100%"
    }).val("0").trigger("change");
});

$.validator.addMethod("check_size_file", function(value, element) {
    if ($(element).prop('files').length == 0) {
        return true;
    } else if ($(element).prop('files').length > 0) {
        var k = 0;
        var files = $(element).prop('files');
        for (var i = 0; i < files.length; i++) {
            if (files[i].size > 20971520) {
                k = 1;
                break;
            }
        }
        if (k == 1) {
            return false;
        } else if (k == 0) {
            return true;
        }
    } else if ($(element).prop('files').length > 20) {
        return true;
    }
}, '');

//Các phần liên quan đến thông báo
$('.block_update_notify_name_file').click(function() {
    $('.custom-file-input-eidt-notify').click();
});

$('.custom-file-input-eidt-notify').change(function() {
    $('.title_ud_upload_notify').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(update_notify_file) === 'undefined') {
        window.update_notify_file = [];
    }

    if (typeof(update_notify_image) === 'undefined') {
        window.update_notify_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_update_file_image_discuss').find('.v_block_img').length == 0) {
                $('.v_update_file_image_discuss').append('<div class="v_block_img"></div>');
            }
            update_notify_image.push(file[i]);
            update_notify_image_video(file[i]);
        } else {
            update_notify_file.push(file[i]);
            if ($('.v_update_file_image_discuss').find('.v_block_file').length == 0) {
                $('.v_update_file_image_discuss').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2">
            <img src="../img/show_del_file.svg" class="show_del_file del_show_notify_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_add_file_image_discuss').find('.v_block_file').append(html);
        }
        $('.block_name_file').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});

$('.block_name_file').click(function() {
    $('.custom-file-input-notify').click();
});


$('.model_suaduan').submit(function() {
    var element = $(this);
    var el_child;
    var flag = true;
    if ($.trim(element.find('.new_title').val()) == "") {
        element.find('.new_title').parents('.form_group').find('.error_title').text("Không được để trống");
        element.find('.new_title').focus();
        flag = false;
    } else {
        element.find('.new_title').parents('.form_group').find('.error_title').text("");
    }

    if (CKEDITOR.instances.v_content_thongbao.getData().trim() == "") {
        element.find('.textarea_cheditor').parents('.form_group').find('.error_content').text("Không được để trống");
        element.find('.textarea_cheditor').show().focus().hide();
        flag = false;
    } else {
        element.find('.textarea_cheditor').parents('.form_group').find('.error_content').text("");
    }

    if (flag == true) {
        var form_data = new FormData();
        if ($(this).data('type') == undefined) {
            var type = 0;
        } else {
            var type = 1;
        }
        form_data.append('type', type);
        if (element.find('.position').length == 0) {
            form_data.append('position', element.data('position_id'));
        } else {
            form_data.append('position', element.find(".position").val());
        }
        form_data.append('new_title', element.find(".new_title").val());
        form_data.append('content', CKEDITOR.instances.v_content_thongbao.getData());

        if (typeof(add_notify_file) !== 'undefined') {
            for (var i = 0; i < add_notify_file.length; i++) {
                form_data.append('file[]', add_notify_file[i]);
            }
        }

        if (typeof(add_notify_image) !== 'undefined') {
            for (var i = 0; i < add_notify_image.length; i++) {
                form_data.append('image[]', add_notify_image[i]);
            }
        }

        $(this).find('.v_btn_luu_span').hide();
        $(this).find('.v_btn_luu_img').show();
        $(this).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/newfeed_create_alert.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                $("#v_model_create_alert")[0].reset();
                $("#model_suaduan").fadeOut();
                $("#v_check_ring_content").text("Bạn đã tạo thông báo thành công");
                $(".v_check_ring").fadeIn();
                location.reload();
            }
        });
    }

    return false;
});

$('.custom-file-input-notify').change(function() {
    $('.title_upload_notify').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_notify_file) === 'undefined') {
        window.add_notify_file = [];
    }

    if (typeof(add_notify_image) === 'undefined') {
        window.add_notify_image = [];
    }

    for (var i = 0; i < file.length; i++) {
        if (file[i].type.match('image/*') != null || file[i].type.match('video/*') != null) {
            if ($('.v_add_file_image_discuss').find('.v_block_img').length == 0) {
                $('.v_add_file_image_discuss').append('<div class="v_block_img"></div>');
            }
            add_notify_image.push(file[i]);
            add_notify_image_video(file[i]);
        } else {
            add_notify_file.push(file[i]);
            if ($('.v_add_file_image_discuss').find('.v_block_file').length == 0) {
                $('.v_add_file_image_discuss').append('<div class="v_block_file"></div>');
            }
            var size = file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html = `<div class="v_block_file_detail2">
            <img src="../img/show_del_file.svg" class="show_del_file del_show_notify_file" alt="show_del_file.svg">
            <p class="show_name_file2">` + file[i].name + `</p>
            <div class="show_file2">
            <p class="show_file_size">` + text_size + `</p>
            <p class="show_file_size">` + time_upload + `</p>
            </div>
            </div>`;
            $('.v_add_file_image_discuss').find('.v_block_file').append(html);
        }
        $('.block_name_file').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
    $(this).val(null);
});

$(document).click(function(e) {
    var el = $(e.target);
    //Tạo new_feed
    if (el.hasClass('del_show_notify_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = add_notify_image[index].name;
            add_notify_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = add_notify_file[index].name;
            add_notify_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
        }

        for (var i = 0; i < $('#model_suaduan').find('.block_name_file_detail').length; i++) {
            if (name_file == $('#model_suaduan').find('.block_name_file_detail').eq(i).text()) {
                $('#model_suaduan').find('.block_name_file_detail').eq(i).remove();
            }
        }

        if ($('#model_suaduan').find('.block_name_file_detail').length == 0) {
            $('#model_suaduan').find('.title_upload_notify').show();
        }
    }

    if (el.hasClass('del_show_discuss_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = add_discuss_image[index].name;
            add_discuss_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = add_discuss_file[index].name;
            add_discuss_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
        }

        for (var i = 0; i < $('.model_taothaoluan').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_taothaoluan').find('.block_name_file_detail').eq(i).text()) {
                $('.model_taothaoluan').find('.block_name_file_detail').eq(i).remove();
            }
        }

        if ($('.model_taothaoluan').find('.block_name_file_detail').length == 0) {
            $('.model_taothaoluan').find('.title_upload_discuss').show();
        }
    }

    if (el.hasClass('del_show_idea_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = add_idea_image[index].name;
            add_idea_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = add_idea_file[index].name;
            add_idea_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
        }

        for (var i = 0; i < $('.model_chiaseytuong').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chiaseytuong').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chiaseytuong').find('.block_name_file_detail').eq(i).remove();
            }
        }

        if ($('.model_chiaseytuong').find('.block_name_file_detail').length == 0) {
            $('.model_chiaseytuong').find('.title_upload_idea').show();
        }
    }

    if (el.hasClass('del_show_e_i') == true) {
        el_parents = el.parents('.v_block_file');
        el_parent_child = el.parents('.v_block_file_detail2');
        var index = el_parent_child.index();
        var name_file = add_e_i_file[index].name;
        add_e_i_file.splice(index, 1);
        el.parents('.v_block_file_detail2').remove();

        for (var i = 0; i < $('#model_taosukien_noibo_sdn').find('.block_name_file_detail').length; i++) {
            if (name_file == $('#model_taosukien_noibo_sdn').find('.block_name_file_detail').eq(i).text()) {
                $('#model_taosukien_noibo_sdn').find('.block_name_file_detail').eq(i).remove();
            }
        }

        if ($('#model_taosukien_noibo_sdn').find('.block_name_file_detail').length == 0) {
            $('#model_taosukien_noibo_sdn').find('.title_upload_event_internal').show();
        }
    }

    if (el.hasClass('del_show_bonus_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = add_bonus_image[index].name;
            add_bonus_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = add_bonus_file[index].name;
            add_bonus_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
        }

        for (var i = 0; i < $('.model_taokhenthuong').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_taokhenthuong').find('.block_name_file_detail').eq(i).text()) {
                $('.model_taokhenthuong').find('.block_name_file_detail').eq(i).remove();
            }
        }

        if ($('.model_taokhenthuong').find('.block_name_file_detail').length == 0) {
            $('.model_taokhenthuong').find('.title_upload_bonus').show();
        }
    }

    if (el.hasClass('del_show_internal_news_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = add_internal_news_image[index].name;
            add_internal_news_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = add_internal_news_file[index].name;
            add_internal_news_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
        }

        for (var i = 0; i < $('.model-taotinnoibo').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model-taotinnoibo').find('.block_name_file_detail').eq(i).text()) {
                $('.model-taotinnoibo').find('.block_name_file_detail').eq(i).remove();
            }
        }

        if ($('.model-taotinnoibo').find('.block_name_file_detail').length == 0) {
            $('.model-taotinnoibo').find('.title_upload_internal_news').show();
        }
    }

    //Chỉnh sửa new_feed
    if (el.hasClass('del_update_notify_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = arr_update_notify_name_img[index];
            arr_update_notify_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
            arr_update_notify_name_img.splice(index, 1);
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = arr_update_notify_name_file[index];
            arr_update_notify_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
            arr_update_notify_name_file.splice(index, 1);
        }
        for (var i = 0; i < $('.model_sua_alert').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_sua_alert').find('.block_name_file_detail').eq(i).text()) {
                $('.model_sua_alert').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_sua_alert').find('.block_name_file_detail').length == 0) {
            $('.model_sua_alert').find('.title_ud_upload_notify').show();
        }
    }

    if (el.hasClass('del_show_e_i_ud') == true) {
        el_parents = el.parents('.v_block_file');
        el_parent_child = el.parents('.v_block_file_detail2');
        var index = el_parent_child.index();
        var name_file = arr_name_file_nb[index];
        arr_file_nb.splice(index, 1);
        el.parents('.v_block_file_detail2').remove();
        arr_name_file_nb.splice(index, 1);
        for (var i = 0; i < $('.model_chinhsuasukien_noibo_sdn').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuasukien_noibo_sdn').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuasukien_noibo_sdn').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuasukien_noibo_sdn').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuasukien_noibo_sdn').find('.title_upload_evt_nb_ud').show();
        }
    }
    if (el.hasClass('del_show_e_i_add') == true) {
        el_parents = el.parents('.v_block_file');
        el_parent_child = el.parents('.v_block_file_detail2_ud');
        var index = el_parent_child.index() - el_parents.find('.v_block_file_detail2').length;
        var name_file = add_e_i_ud_file[index].name;
        add_e_i_ud_file.splice(index, 1);
        el.parents('.v_block_file_detail2_ud').remove();

        for (var i = 0; i < $('.model_chinhsuasukien_noibo_sdn').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuasukien_noibo_sdn').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuasukien_noibo_sdn').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuasukien_noibo_sdn').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuasukien_noibo_sdn').find('.title_upload_evt_nb_ud').show();
        }
    }

    if (el.hasClass('del_show_dn_ud') == true) {
        el_parents = el.parents('.v_block_file');
        el_parent_child = el.parents('.v_block_file_detail2');
        var index = el_parent_child.index();
        var name_file = arr_name_file_dn[index];
        arr_file_dn.splice(index, 1);
        el.parents('.v_block_file_detail2').remove();
        arr_name_file_dn.splice(index, 1);
        for (var i = 0; i < $('.model-chinhsuasukiendoingoai').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model-chinhsuasukiendoingoai').find('.block_name_file_detail').eq(i).text()) {
                $('.model-chinhsuasukiendoingoai').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model-chinhsuasukiendoingoai').find('.block_name_file_detail').length == 0) {
            $('.model-chinhsuasukiendoingoai').find('.title_upload_dn_ud').show();
        }
    }

    if (el.hasClass('del_show_dn_ud') == true) {
        el_parents = el.parents('.v_block_file');
        el_parent_child = el.parents('.v_block_file_detail2_ud');
        var index = el_parent_child.index() - el_parents.find('.v_block_file_detail2').length;
        var name_file = add_dn_ud_file[index].name;
        add_dn_ud_file.splice(index, 1);
        el.parents('.v_block_file_detail2_ud').remove();

        for (var i = 0; i < $('.model-chinhsuasukiendoingoai').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model-chinhsuasukiendoingoai').find('.block_name_file_detail').eq(i).text()) {
                $('.model-chinhsuasukiendoingoai').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model-chinhsuasukiendoingoai').find('.block_name_file_detail').length == 0) {
            $('.model-chinhsuasukiendoingoai').find('.title_upload_dn_ud').show();
        }
    }

    if (el.hasClass('del_add_ud_notify_file') == true) {
        if (el.parents('.v_block_file_detail_ud').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail').length;
            var name_file = add_ud_notify_image[index].name;
            add_ud_notify_image.splice(index, 1);
            el.parents('.v_block_file_detail_ud').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail2').length;
            var name_file = add_ud_notify_file[index].name;
            add_ud_notify_file.splice(index, 1);
            el.parents('.v_block_file_detail2_ud').remove();
        }

        for (var i = 0; i < $('.model_sua_alert').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_sua_alert').find('.block_name_file_detail').eq(i).text()) {
                $('.model_sua_alert').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_sua_alert').find('.block_update_notify_name_file').length == 0) {
            $('.model_sua_alert').find('.title_ud_upload_notify').show();
        }
    }

    if (el.hasClass('del_update_discuss_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = arr_update_discuss_name_img[index];
            arr_update_discuss_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
            arr_update_discuss_name_img.splice(index, 1);
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = arr_update_discuss_name_file[index];
            arr_update_discuss_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
            arr_update_discuss_name_file.splice(index, 1);
        }
        for (var i = 0; i < $('.model_chinhsuathaoluan').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuathaoluan').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuathaoluan').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuathaoluan').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuathaoluan').find('.title_upload_ud_discuss').show();
        }
    }

    if (el.hasClass('del_add_ud_discuss_file') == true) {
        if (el.parents('.v_block_file_detail_ud').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail').length;
            var name_file = update_discuss_image[index].name;
            update_discuss_image.splice(index, 1);
            el.parents('.v_block_file_detail_ud').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail2').length;
            var name_file = update_discuss_file[index].name;
            update_discuss_file.splice(index, 1);
            el.parents('.v_block_file_detail2_ud').remove();
        }

        for (var i = 0; i < $('.model_chinhsuathaoluan').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuathaoluan').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuathaoluan').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuathaoluan').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuathaoluan').find('.title_upload_ud_discuss').show();
        }
    }

    if (el.hasClass('del_update_idea_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = arr_update_idea_name_img[index];
            arr_update_idea_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
            arr_update_idea_name_img.splice(index, 1);
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = arr_update_idea_name_file[index];
            arr_update_idea_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
            arr_update_idea_name_file.splice(index, 1);
        }
        for (var i = 0; i < $('.model_chinhsuachiaseytuong').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuachiaseytuong').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuachiaseytuong').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuachiaseytuong').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuachiaseytuong').find('.title_ud_upload_idea').show();
        }
    }

    if (el.hasClass('del_add_ud_idea_file') == true) {
        if (el.parents('.v_block_file_detail_ud').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail').length;
            var name_file = update_idea_image[index].name;
            update_idea_image.splice(index, 1);
            el.parents('.v_block_file_detail_ud').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail2').length;
            var name_file = update_idea_file[index].name;
            update_idea_file.splice(index, 1);
            el.parents('.v_block_file_detail2_ud').remove();
        }

        for (var i = 0; i < $('.model_chinhsuachiaseytuong').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuachiaseytuong').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuachiaseytuong').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuachiaseytuong').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuachiaseytuong').find('.title_ud_upload_idea').show();
        }
    }

    if (el.hasClass('del_update_bonus_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = arr_update_bonus_name_img[index];
            arr_update_bonus_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
            arr_update_bonus_name_img.splice(index, 1);
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = arr_update_bonus_name_file[index];
            arr_update_bonus_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
            arr_update_bonus_name_file.splice(index, 1);
        }
        for (var i = 0; i < $('.model_chinhsuakhenthuong').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuakhenthuong').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuakhenthuong').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuakhenthuong').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuakhenthuong').find('.title_upload_ud_bonus').show();
        }
    }

    if (el.hasClass('del_add_ud_bonus_file') == true) {
        if (el.parents('.v_block_file_detail_ud').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail').length;
            var name_file = update_bonus_image[index].name;
            update_bonus_image.splice(index, 1);
            el.parents('.v_block_file_detail_ud').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail2').length;
            var name_file = update_bonus_file[index].name;
            update_bonus_file.splice(index, 1);
            el.parents('.v_block_file_detail2_ud').remove();
        }

        for (var i = 0; i < $('.model_chinhsuakhenthuong').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuakhenthuong').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuakhenthuong').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuakhenthuong').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuakhenthuong').find('.title_upload_ud_bonus').show();
        }
    }

    if (el.hasClass('del_update_internal_file') == true) {
        if (el.parents('.v_block_file_detail').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail');
            var index = el_parent_child.index();
            var name_file = arr_update_internal_name_img[index];
            arr_update_internal_image.splice(index, 1);
            el.parents('.v_block_file_detail').remove();
            arr_update_internal_name_img.splice(index, 1);
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2');
            var index = el_parent_child.index();
            var name_file = arr_update_internal_name_file[index];
            arr_update_internal_file.splice(index, 1);
            el.parents('.v_block_file_detail2').remove();
            arr_update_internal_name_file.splice(index, 1);
        }
        for (var i = 0; i < $('.model_chinhsuatinnoibo').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuatinnoibo').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuatinnoibo').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuatinnoibo').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuatinnoibo').find('.title_upload_ud_internal').show();
        }
    }

    if (el.hasClass('del_add_ud_internal_file') == true) {
        if (el.parents('.v_block_file_detail_ud').length > 0) {
            el_parents = el.parents('.v_block_img');
            el_parent_child = el.parents('.v_block_file_detail_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail').length;
            var name_file = update_internal_image[index].name;
            update_internal_image.splice(index, 1);
            el.parents('.v_block_file_detail_ud').remove();
        } else {
            el_parents = el.parents('.v_block_file');
            el_parent_child = el.parents('.v_block_file_detail2_ud');
            var index = el_parent_child.index() - el_parents.find('.v_block_file_detail2').length;
            var name_file = update_internal_file[index].name;
            update_internal_file.splice(index, 1);
            el.parents('.v_block_file_detail2_ud').remove();
        }

        for (var i = 0; i < $('.model_chinhsuatinnoibo').find('.block_name_file_detail').length; i++) {
            if (name_file == $('.model_chinhsuatinnoibo').find('.block_name_file_detail').eq(i).text()) {
                $('.model_chinhsuatinnoibo').find('.block_name_file_detail').eq(i).remove();
                break;
            }
        }

        if ($('.model_chinhsuatinnoibo').find('.block_name_file_detail').length == 0) {
            $('.model_chinhsuatinnoibo').find('.title_upload_ud_bonus').show();
        }
    }
});

$(".block_name_file_dn").click(function() {
    $('.custom-file-input-dn').click();
});

$('.custom-file-input-dn').change(function() {
    for (var i = 0; i < $(this).prop('files').length; i++) {
        if ($(this).prop('files')[i].type.match('image/*') != null || $(this).prop('files')[i].type.match('video/*') != null) {
            alert("Vui lòng không upload ảnh và video");
            return false;
            break;
        }
    }

    $('.title_upload_dn').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_dn_file) === 'undefined') {
        window.add_dn_file = [];
    }

    for (var i = 0; i < file.length; i++) {
        add_dn_file.push(file[i]);
        if ($('.v_add_file_image_dn').find('.v_block_file').length == 0) {
            $('.v_add_file_image_dn').append('<div class="v_block_file"></div>');
        }
        var size = file[i].size / 1024;
        if (size <= 1000) {
            var text_size = size.toFixed(1) + " KB";
        } else {
            var text_size = (size / 1024).toFixed(1) + " MB";
        }
        html = `<div class="v_block_file_detail2">
        <img src="../img/xsukiendoingoai.png" class="show_del_file del_show_e_i" alt="show_del_file.svg">
        <p class="show_name_file2">` + file[i].name + `</p>
        <div class="show_file2">
        <p class="show_file_size">` + text_size + `</p>
        <p class="show_file_size">` + time_upload + `</p>
        </div>
        </div>`;
        $('.v_add_file_image_dn').find('.v_block_file').append(html);
        $('.block_name_file_dn').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
});
$("#model-taosukiendoingoai2").validate({
    errorPlacement: function(error, element) {
        error.addClass('v_err_taosukiennoibo');
        element.after(error);
    },
    rules: {
        txt_ten: {
            required: true
        },
        file_taianhdiengia: {
            filesize: true,
            required: true,
        },
        txt_tendiengia: {
            required: true
        },
        txt_chucvudiengia: {
            required: true
        },
        txt_emaildiengia: {
            required: true,
        },
        txt_sdtdiengia: {
            validatePhone: true,
            required: true
        },
        txt_mieuta: {
            required: true
        },
        file_taianhsukien: {
            required: true,
        },
        date_ngay: {
            required: true,
            sauhomnay: true
        },
        date_gio: {
            required: true
        }
    },
    messages: {
        txt_ten: {
            required: "Không được dể trống"
        },
        file_taianhdiengia: {
            required: "Không được để trống",
            filesize: "Vui lòng tải ảnh dưới 10MB"
        },
        txt_tendiengia: {
            required: "Không được để trống"
        },
        txt_chucvudiengia: {
            required: "Không được để trống"
        },
        txt_emaildiengia: {
            required: "Không được để trống"
        },
        txt_sdtdiengia: {
            validatePhone: "Sai định dạng điện thoại",
            required: "Không được để trống"
        },
        txt_mieuta: {
            required: "Không được để trống"
        },
        file_taianhsukien: {
            required: "Không được để trống",
            filesize: "Vui lòng chọn ảnh đại diện dưới 10MB"
        },
        date_ngay: {
            required: "Không được để trống",
            sauhomnay: "Sự kiện phải diễn ra sau hôm nay"
        },
        date_gio: {
            required: "Không được để trống"
        }
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        var element_parent = $("#model-taosukiendoingoai2");
        form_data.append('new_title', element_parent.find(".new_title").val());
        if (element_parent.find(".speakers_avatar").prop('files')[0] != undefined) {
            form_data.append('speakers_avatar', element_parent.find(".speakers_avatar").prop('files')[0]);
        }
        form_data.append('speakers_name', element_parent.find(".speakers_name").val());
        form_data.append('speakers_position', element_parent.find(".speakers_position").val());
        form_data.append('speakers_phone', element_parent.find(".speakers_phone").val());
        form_data.append('speakers_email', element_parent.find(".speakers_email").val());
        form_data.append('time', element_parent.find(".date_ngay").val() + " " + element_parent.find(".date_gio").val());

        form_data.append('avatar', element_parent.find(".event_avatar").prop('files')[0]);
        form_data.append('content', element_parent.find(".content").val());
        if (typeof(add_dn_file) !== "undefined") {
            for (var i = 0; i < add_dn_file.length; i++) {
                form_data.append('file[]', add_dn_file[i]);
            }
        }
        if (element_parent.find(".event_position").length == 0) {
            form_data.append('position', element_parent.data('dep_id'));
        } else {
            form_data.append('position', element_parent.find(".event_position").val());
        }
        if (element_parent.data('type') == undefined) {
            form_data.append('type', 0);
        } else {
            form_data.append('type', 1);
        }
        form_data.append('event_mode', element_parent.find(".event_mode").val());

        if (element_parent.find(".name_guest").length > 0) {
            var arr = [];
            var j = 0;
            for (var i = 0; i < element_parent.find(".name_guest").length; i++) {
                if (element_parent.find(".name_guest").eq(i).val() != "" || element_parent.find(".name_company").eq(i).val() != "" || element_parent.find(".name_position").eq(i).val()) {
                    arr[j] = {};
                    arr[j].name_guest = element_parent.find(".name_guest").eq(i).val();
                    arr[j].name_company = element_parent.find(".name_company").eq(i).val();
                    arr[j].name_position = element_parent.find(".name_position").eq(i).val();
                    j++;
                }
            }
            var list_guest = JSON.stringify(arr);
            form_data.append('list_guests', list_guest);
        }

        $(form).find('.v_btn_luu_img').show();
        $(form).find('.v_btn_luu_span').hide();
        $(form).find('.btn_luu').prop('type', 'button');

        $.ajax({
            url: '../ajax/create_event_doi_ngoai.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                window.location.href = window.location.href;
            }
        });

    }
});

$('.block_name_file_dn_ud').click(function() {
    $(".custom-file-input-dn-ud").click();
});

$('.custom-file-input-dn-ud').change(function() {
    for (var i = 0; i < $(this).prop('files').length; i++) {
        if ($(this).prop('files')[i].type.match('image/*') != null || $(this).prop('files')[i].type.match('video/*') != null) {
            alert("Vui lòng không upload ảnh và video");
            return false;
            break;
        }
    }

    $('.title_upload_dn_ud').hide();
    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var day = timer.getDate();
    var month = timer.getMonth();
    var year = timer.getFullYear();
    if (minute < 10) {
        minute = "0" + minute;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (day < 10) {
        day = "0" + day;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var time_upload = hour + ":" + minute + ", " + day + "/" + month + "/" + year;
    var file = $(this).prop('files');

    if (typeof(add_dn_ud_file) === 'undefined') {
        window.add_dn_ud_file = [];
    }

    for (var i = 0; i < file.length; i++) {
        add_dn_ud_file.push(file[i]);
        if ($('.v_add_file_image_dn_ud').find('.v_block_file').length == 0) {
            $('.v_add_file_image_dn_ud').append('<div class="v_block_file"></div>');
        }
        var size = file[i].size / 1024;
        if (size <= 1000) {
            var text_size = size.toFixed(1) + " KB";
        } else {
            var text_size = (size / 1024).toFixed(1) + " MB";
        }
        html = `<div class="v_block_file_detail2_ud">
        <img src="../img/xsukiendoingoai.png" class="show_del_file del_show_dn_ud" alt="show_del_file.svg">
        <p class="show_name_file2">` + file[i].name + `</p>
        <div class="show_file2">
        <p class="show_file_size">` + text_size + `</p>
        <p class="show_file_size">` + time_upload + `</p>
        </div>
        </div>`;
        $('.v_add_file_image_dn_ud').find('.v_block_file').append(html);
        $('.block_name_file_dn_ud').append('<div class="block_name_file_detail">' + file[i].name + '</div>');
    }
});

$(".model-chinhsuasukiendoingoai").validate({
    errorPlacement: function(error, element) {
        error.addClass('v_err_taosukiennoibo');
        element.after(error);
    },
    rules: {
        txt_ten: {
            required: true
        },
        txt_tendiengia: {
            required: true
        },
        txt_chucvudiengia: {
            required: true
        },
        txt_emaildiengia: {
            required: true,
        },
        txt_sdtdiengia: {
            validatePhone: true,
            required: true
        },
        txt_mieuta: {
            required: true
        },
        date_ngay: {
            required: true,
            sauhomnay: true
        },
        date_gio: {
            required: true
        }
    },
    messages: {
        txt_ten: {
            required: "Không được dể trống"
        },
        txt_tendiengia: {
            required: "Không được để trống"
        },
        txt_chucvudiengia: {
            required: "Không được để trống"
        },
        txt_emaildiengia: {
            required: "Không được để trống"
        },
        txt_sdtdiengia: {
            validatePhone: "Sai định dạng điện thoại",
            required: "Không được để trống"
        },
        txt_mieuta: {
            required: "Không được để trống"
        },
        date_ngay: {
            required: "Không được để trống",
            sauhomnay: "Sự kiện phải diễn ra sau hôm nay"
        },
        date_gio: {
            required: "Không được để trống"
        }
    },
    submitHandler: function(form) {
        var form_data = new FormData();
        var element_parent = $(".model-chinhsuasukiendoingoai");
        form_data.append('new_title', element_parent.find(".new_title").val());
        if (element_parent.find(".speakers_avatar").prop('files')[0] != undefined) {
            form_data.append('speakers_avatar', element_parent.find(".speakers_avatar").prop('files')[0]);
        }
        form_data.append('speakers_name', element_parent.find(".speakers_name").val());
        form_data.append('speakers_position', element_parent.find(".speakers_position").val());
        form_data.append('speakers_phone', element_parent.find(".speakers_phone").val());
        form_data.append('speakers_email', element_parent.find(".speakers_email").val());
        form_data.append('time', element_parent.find(".date_ngay").val() + " " + element_parent.find(".date_gio").val());

        if (element_parent.find(".event_avatar").prop('files')[0] != undefined) {
            form_data.append('avatar', element_parent.find(".event_avatar").prop('files')[0]);
        }
        form_data.append('content', element_parent.find(".content").val());

        form_data.append('arr_file_dn', arr_file_dn);
        form_data.append('arr_name_file_dn', arr_name_file_dn);

        if (typeof(add_dn_ud_file) !== "undefined") {
            for (var i = 0; i < add_dn_ud_file.length; i++) {
                form_data.append('file[]', add_dn_ud_file[i]);
            }
        }

        form_data.append('position', element_parent.find(".event_position").val());
        form_data.append('event_mode', element_parent.find(".event_mode").val());
        form_data.append('new_id', element_parent.find(".new_id").val());
        if (element_parent.find(".name_guest").length > 0) {
            var arr = [];
            var j = 0;
            for (var i = 0; i < element_parent.find(".name_guest").length; i++) {
                if (element_parent.find(".name_guest").eq(i).val() != "" || element_parent.find(".name_company").eq(i).val() != "" || element_parent.find(".name_position").eq(i).val()) {
                    arr[j] = {};
                    arr[j].name_guest = element_parent.find(".name_guest").eq(i).val();
                    arr[j].name_company = element_parent.find(".name_company").eq(i).val();
                    arr[j].name_position = element_parent.find(".name_position").eq(i).val();
                    j++;
                }
            }
            var list_guest = JSON.stringify(arr);
            form_data.append('list_guests', list_guest);
        }
        $(form).find('.v_btn_luu_img').show();
        $(form).find('.v_btn_luu_span').hide();
        $(form).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/update_event_doi_ngoai.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                window.location.href = window.location.href;
            }
        });

    }
});

$(".model-chinhsuasukiendoingoai .v_speakers_avatar_text").click(function() {
    $(".model-chinhsuasukiendoingoai .speakers_avatar").click();
});
$(".model-chinhsuasukiendoingoai .speakers_avatar").change(function() {
    var name_speaker_avatar = $(".model-chinhsuasukiendoingoai .speakers_avatar").prop('files')[0].name;
    $(".model-chinhsuasukiendoingoai .v_speakers_avatar_text").val(name_speaker_avatar);
});
$(".model-chinhsuasukiendoingoai .v_event_avatar_name").click(function() {
    $(".model-chinhsuasukiendoingoai .event_avatar").click();
});
$(".model-chinhsuasukiendoingoai .event_avatar").change(function() {
    var name_speaker_avatar = $(".model-chinhsuasukiendoingoai .event_avatar").prop('files')[0].name;
    $(".model-chinhsuasukiendoingoai .v_event_avatar_name").val(name_speaker_avatar);
});
$(".model-chinhsuasukiendoingoai .v_event_file_name").click(function() {
    $(".model-chinhsuasukiendoingoai .event_file").click();
});
$(".model-chinhsuasukiendoingoai .event_file").change(function() {
    var name_speaker_avatar = $(".model-chinhsuasukiendoingoai .event_file").prop('files')[0].name;
    $(".model-chinhsuasukiendoingoai .v_event_file_name").val(name_speaker_avatar);
});

//Thêm, Sửa, các phần liên quan đến bình chọn
$(".v_add_vote_option").click(function() {
    var j = $(".model-taobinhchon").find('.vote_option').length + 1;
    if (j <= 40) {
        $(this).before('<label class="name">Phương án ' + j + '</label><div class="d_flex space_b box_flex2 v_new_vote_option" style="width: 100%; display:flex;"><div class="item_flex3"><input type="text" value="" class="vote_option" placeholder="Nội dung"></div><div class="item_flex3 input_xanh v_vote_option"><input type="file" name="" class="custom-file-input v_file_option" multiple><img src="../img/v_option_del.svg" alt="Ảnh lỗi" class="v_add_vote_option_del" onclick="v_del_vote_option(this)"></div></div>');
    }
});
$(".btn_huy_taobinhchon").click(function() {
    var element_parent = $(".model-taobinhchon");
    element_parent[0].reset();
    CKEDITOR.instances.content_vote.setData();
    element_parent.find('.position').val(0).trigger('change');
    element_parent.find('.id_user_tags').val("").trigger('change');

});

function add_new_vote_option(e) {
    var j = $(".model-chinhsuabinhchon").find('.vote_option').length + 1;
    if (j <= 40) {
        $(".form_group_option_vote_detail").append('<label class="name">Phương án ' + j + '</label><div class="d_flex space_b box_flex2 v_new_vote_option" style="width: 100%; display:flex;"><div class="item_flex3"><input type="text" value="" class="vote_option vote_option_chuaco" name="txt_noidungphuongan" placeholder="Nội dung"></div><div class="item_flex3 input_xanh v_vote_option"><input type="file" name="" class="custom-file-input v_file_option file_option_chuaco" onchange="v_file_option_change(this)"><input type="text" class="v_file_text" value="" onclick="v_file_change(this)" readonly><img src="../img/v_option_del.svg" alt="Ảnh lỗi" class="v_add_vote_option_del" onclick="v_del_vote_option02(this)"></div></div>');
    }
}

function v_file_change(e) {
    $(e).prev().click();
}

function v_file_option_change(e) {
    var name_file = $(e).prop('files')[0].name;
    $(e).next().val(name_file);
}

function v_del_vote_option(e) {
    var element = $(".model-taobinhchon");
    var max_length = element.find(".v_new_vote_option").length;
    element.find(".v_new_vote_option").eq(max_length - 1).prev().remove();
    element.find(".v_new_vote_option").eq(max_length - 1).remove();
}

function v_del_vote_option02(e) {
    var max_length = $(".v_new_vote_option").length;
    $(".v_new_vote_option").eq(max_length - 1).prev().remove();
    $(".v_new_vote_option").eq(max_length - 1).remove();
}

$(".model-taobinhchon").submit(function() {
    if ($(this).data('position_id') == undefined) {
        var position = 0;
    } else {
        var position = $(this).data('position_id');
    }
    if ($(this).data('type') == undefined) {
        var type = 0;
    } else {
        var type = 1;
    }
    var flag = true;
    var form_data = new FormData();
    form_data.append('position', position);
    form_data.append('type', type);
    var element_parent = $(".model-taobinhchon");
    if (element_parent.find('.new_title').val() == "") {
        element_parent.find('.new_title').next().html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        element_parent.find('.new_title').next().html('');
        form_data.append('new_title', element_parent.find('.new_title').val());
    }

    if (CKEDITOR.instances.content_vote.getData() == "") {
        $(".error_vote").html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        $(".error_vote").html('');
        form_data.append('content', CKEDITOR.instances.content_vote.getData());
    }

    var vote_option = [];
    var check;
    for (var i = 0; i < element_parent.find('.vote_option').length; i++) {
        if (element_parent.find('.vote_option').eq(i).val() != "") {
            vote_option[i] = element_parent.find('.vote_option').eq(i).val();
            $(".error_vote_option").html('');
        } else {
            check = false;
            break;
        }
    }
    if (check == false) {
        $(".error_vote_option").html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng nhập đầy đủ phương án</label>');
        flag = false;
    } else if (vote_option.length < 2) {
        $(".error_vote_option").html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng nhập tối thiểu 2 phương án</label>');
        flag = false;
    } else if (vote_option.length > 40) {
        $(".error_vote_option").html('<label id="txt_ten-error" class="error" for="txt_ten">Chỉ được nhập tối đa 40 phương án</label>');
        flag = false;
    } else {
        $(".error_vote_option").html('');
        form_data.append('vote_option', vote_option);
    }

    var file_option = [];
    var k = 0;
    for (var i = 0; i < element_parent.find(".v_file_option").length; i++) {
        if (element_parent.find(".v_file_option").eq(i).prop('files')[0] != undefined) {
            form_data.append('file_option[' + i + ']', element_parent.find(".v_file_option").eq(i).prop('files')[0]);
            k++;
        }
    }

    form_data.append('id_user_tags', element_parent.find('.id_user_tags').val());

    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var second = timer.getSeconds();
    var thu = timer.getDay();
    var day = timer.getDate();
    var month = timer.getMonth() + 1;
    var year = timer.getFullYear();
    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }
    var today = year + "-" + month + "-" + day;
    console.log(today);
    // console.log(element_parent.find('.date_ngay').val().getTime());
    if (element_parent.find('.date_ngay').val() == "") {
        element_parent.find('.date_ngay').next().html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng chọn ngày bắt đầu</label>');
        flag = false;
    } else if (element_parent.find('.date_ngay').val() < today) {
        element_parent.find('.date_ngay').next().html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng chọn ngày bắt đầu sau hôm nay</label>');
        flag = false;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }
    if (minute < 10) {
        minute = "0" + minute;
    }
    var hour_today = hour + ":" + minute;
    if (element_parent.find('.date_gio').val() == "") {
        element_parent.find('.date_gio').next().html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng chọn giờ bắt đầu</label>');
        flag = false;
    } else {
        form_data.append('time', element_parent.find('.date_ngay').val() + " " + element_parent.find('.date_gio').val())
    }

    if (flag == true) {
        $(this).find('.v_btn_luu_img').show();
        $(this).find('.v_btn_luu_span').hide();
        $(this).find('.btn_luu').prop('type', 'button');
        $.ajax({
            url: '../ajax/create_vote.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                location.reload();
            }
        });
    }

    return false;
});
$(".model-chinhsuabinhchon").submit(function() {
    var flag = true;
    var form_data = new FormData();
    var element_parent = $(".model-chinhsuabinhchon");
    if (element_parent.find('.new_title').val() == "") {
        element_parent.find('.new_title').next().html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        element_parent.find('.new_title').next().html('');
        form_data.append('new_title', element_parent.find('.new_title').val());
    }

    if (CKEDITOR.instances.content_chinhsuathaoluan.getData() == "") {
        $(".error_vote").html('<label id="txt_ten-error" class="error" for="txt_ten">Không được để trống</label>');
        flag = false;
    } else {
        $(".error_vote").html('');
        form_data.append('content', CKEDITOR.instances.content_chinhsuathaoluan.getData());
    }

    var vote_option_daco = [];
    var vote_option_chuaco = [];
    var check;
    for (var i = 0; i < element_parent.find('.vote_option_daco').length; i++) {
        if (element_parent.find('.vote_option').eq(i).val() != "") {
            vote_option_daco[i] = element_parent.find('.vote_option_daco').eq(i).val();
            $(".error_vote_option").html('');
        } else {
            check = false;
            break;
        }
    }
    for (var i = 0; i < element_parent.find('.vote_option_chuaco').length; i++) {
        if (element_parent.find('.vote_option').eq(i).val() != "") {
            vote_option_chuaco[i] = element_parent.find('.vote_option_chuaco').eq(i).val();
            $(".error_vote_option").html('');
        } else {
            check = false;
            break;
        }
    }
    if (check == false) {
        $(".error_vote_option").html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng nhập đầy đủ phương án</label>');
        flag = false;
    } else if ((vote_option_daco.length + vote_option_chuaco.length) < 2) {
        $(".error_vote_option").html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng nhập tối thiểu 2 phương án</label>');
        flag = false;
    } else if ((vote_option_daco.length + vote_option_chuaco.length) > 40) {
        $(".error_vote_option").html('<label id="txt_ten-error" class="error" for="txt_ten">Chỉ được nhập tối đa 40 phương án</label>');
        flag = false;
    } else {
        $(".error_vote_option").html('');
        form_data.append('vote_option_daco', vote_option_daco);
        if (vote_option_chuaco.length > 0) {
            form_data.append('vote_option_chuaco', vote_option_chuaco);
        }
    }

    var file_option_daco = [];
    var k = 0;
    for (var i = 0; i < element_parent.find(".file_option_daco").length; i++) {
        if (element_parent.find(".file_option_daco").eq(i).prop('files')[0] != undefined) {
            form_data.append('file_option_daco[' + i + ']', element_parent.find(".file_option_daco").eq(i).prop('files')[0]);
            k++;
        }
    }
    for (var i = 0; i < element_parent.find(".file_option_chuaco").length; i++) {
        if (element_parent.find(".file_option_chuaco").eq(i).prop('files')[0] != undefined) {
            form_data.append('file_option_chuaco[' + i + ']', element_parent.find(".file_option_chuaco").eq(i).prop('files')[0]);
            k++;
        }
    }
    form_data.append('id_user_tags', element_parent.find('.id_user_tags').val());

    var timer = new Date();
    var hour = timer.getHours();
    var minute = timer.getMinutes();
    var second = timer.getSeconds();
    var thu = timer.getDay();
    var day = timer.getDate();
    var month = timer.getMonth() + 1;
    var year = timer.getFullYear();
    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }
    var today = year + "-" + month + "-" + day;
    // console.log(element_parent.find('.date_ngay').val().getTime());
    if (element_parent.find('.date_ngay').val() == "") {
        element_parent.find('.date_ngay').next().html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng chọn ngày bắt đầu</label>');
        flag = false;
    } else if (element_parent.find('.date_ngay').val() < today) {
        element_parent.find('.date_ngay').next().html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng chọn ngày bắt đầu sau hôm nay</label>');
        flag = false;
    }

    if (hour < 10) {
        hour = "0" + hour;
    }
    if (minute < 10) {
        minute = "0" + minute;
    }
    var hour_today = hour + ":" + minute;
    if (element_parent.find('.date_gio').val() == "") {
        element_parent.find('.date_gio').next().html('<label id="txt_ten-error" class="error" for="txt_ten">Vui lòng chọn giờ bắt đầu</label>');
        flag = false;
    } else {
        form_data.append('time', element_parent.find('.date_ngay').val() + " " + element_parent.find('.date_gio').val())
    }
    form_data.append('new_id', element_parent.find('.new_id').val());
    if (flag == true) {
        $.ajax({
            url: '../ajax/update_vote.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                location.reload();
            }
        });
    }

    return false;
});
$(".ghim_post").click(function() {
    var new_id = $(this).data('new_id');
    $.ajax({
        url: '../ajax/ghim_post.php',
        type: 'POST',
        dataType: 'json',
        data: {
            new_id: new_id
        },
        success: function(data) {
            location.reload();
        }
    });
});



$(".v_write_comment").keyup(function() {
    // if ($(this).val() != "") {
    //     $(this).parents(".cont").find('.see_icon').hide();
    //     $(this).parents(".cont").find('.see_icon1').hide();
    //     $(this).parents(".cont").find('.nut_gui_comment').show();
    // } else {
    //     $(this).parents(".cont").find('.see_icon').show();
    //     $(this).parents(".cont").find('.see_icon1').show();
    //     $(this).parents(".cont").find('.nut_gui_comment').hide();
    // }
});

function v_like_post2(e) {
    var id = $(e)[0].dataset.id;
    $.ajax({
        url: '../ajax/like_comment.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data) {
            if (data.result == true) {
                $(e).css('color', '#4C5BD4');
                $('.like_comment' + id).remove();
                $('.num_like_comment' + id).remove();
                $('#react_cmt' + id).append(`<img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment` + id + `">
                    <p class="num_like_comment num_like_comment` + id + `">` + data.num_like_cmt + `</p>`);
            } else if (data.result == false) {
                $(e).css('color', '#474747');
                $('.like_comment' + id).remove();
                $('.num_like_comment' + id).remove();
                if (data.num_like_cmt > 0) {
                    $('#react_cmt' + id).append(`<img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment` + id + `">
                        <p class="num_like_comment num_like_comment` + id + `">` + data.num_like_cmt + `</p>`);
                }
            }
        }
    });
}

$(".v_write_comment").keyup(function() {
    // if ($(this).val() != "") {
    //     $(this).parents(".cont").find('.see_icon').hide();
    //     $(this).parents(".cont").find('.see_icon1').hide();
    //     $(this).parents(".cont").find('.nut_gui_comment').show();
    // } else {
    //     $(this).parents(".cont").find('.see_icon').show();
    //     $(this).parents(".cont").find('.see_icon1').show();
    //     $(this).parents(".cont").find('.nut_gui_comment').hide();
    // }
});

function v_like_post2(e) {
    var id = $(e)[0].dataset.id;
    $.ajax({
        url: '../ajax/like_comment.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data) {
            if (data.result == true) {
                $(e).css('color', '#4C5BD4');
                $('.like_comment' + id).remove();
                $('.num_like_comment' + id).remove();
                $('#react_cmt' + id).append(`<img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment` + id + `">
                    <p class="num_like_comment num_like_comment` + id + `">` + data.num_like_cmt + `</p>`);
            } else if (data.result == false) {
                $(e).css('color', '#474747');
                $('.like_comment' + id).remove();
                $('.num_like_comment' + id).remove();
                if (data.num_like_cmt > 0) {
                    $('#react_cmt' + id).append(`<img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment` + id + `">
                        <p class="num_like_comment num_like_comment` + id + `">` + data.num_like_cmt + `</p>`);
                }
            }
        }
    });
}

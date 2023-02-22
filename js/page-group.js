$(document).ready(function () {
    $('.edit-banner2').click(function () {
        $('.v_edit-banner2').click();
    });

    $('.model_taothongbao').validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents('.form_group'));
            error.wrap("<span class='error'>");
        },
        rules: {
            new_title: "required",
            content: "required",
            file: {
                required_file: true,
                filesize_alert: true
            }
        },
        messages: {
            new_title: "Không được để trống",
            content: "Không được để trống",
            file: {
                required_file: "Tệp không được đê trống",
                filesize_alert: "Chỉ được tải tệp dưới 10MB"
            }
        },
        submitHandler: function (from) {
            var form_data = new FormData();
            var element = $(".model_suaduan");
            form_data.append('position', element.find(".position").val());
            form_data.append('new_title', element.find(".new_title").val());
            form_data.append('content', element.find(".content").val());
            form_data.append('file', element.find(".file").prop('files')[0]);
            $.ajax({
                url: '../ajax/newfeed_create_alert.php',
                type: 'POST',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function (data) {
                    $("#v_model_create_alert")[0].reset();
                    $("#model_suaduan").fadeOut();
                    $("#v_check_ring_content").text("Bạn đã tạo thông báo thành công");
                    $(".v_check_ring").fadeIn();
                    window.location.href = window.location.href;
                }
            });
        }
    });

    $('.v_upload_group_image').click(function(){
        $('.input_file_group_img').click();
    });
});

function v_update_avatar_group(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.page_nhomtl_cover_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        var form_data = new FormData();
        var id = $('.v_edit-banner2').data('id');
        form_data.append('image', $('.v_edit-banner2').prop('files')[0]);
        form_data.append('id', id);
        $.ajax({
            type: "POST",
            url: "../ajax/update_cover_image_group.php",
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
            }
        });
    }
}

function v_upload_group_image(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.v_logo_group').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        var form_data = new FormData();
        var id = $('.input_file_group_img').data('id');
        form_data.append('image', $('.input_file_group_img').prop('files')[0]);
        form_data.append('id', id);
        $.ajax({
            type: "POST",
            url: "../ajax/update_group_image.php",
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
            }
        });
    }
}

$(document).ready(function() {
    $('#select_list_ep').select2({
        'placeholder': 'Thêm thành viên'
    });
    $(".upload-img, .call-name").click(function() {
        $("#model_dangtin").show();
        $("#form_popup_dangtin").attr('data-type', 0);
        var title = $('#title_post_newfeed_1').val();
        $('#title_post_newfeed_2').val(title);
    })

    $("#form_newfeed").submit(function() {
        var title = $.trim($('#title_post_newfeed_1').val());
        if (title != '') {
            $('.btn_go_upload_span').hide();
            $('.btn_go_upload_img').show();
            $('.btn_go_upload').prop('type', 'button');
            var data = new FormData();
            data.append('content', title);
            $.ajax({
                url: "../handle/create_knowledge_dang_tin.php",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                data: data,
                success: function(data) {
                    if (data.result == true) {
                        location.reload();
                    }
                }
            });
        }
        return false;
    });

    $(".edit_knowledge_answer").click(function() {
        var el = $(this);
        var id = $(this).data('id');
        $.ajax({
            url: '../ajax/get_data_knowledge_answer.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                el = $('#model_suadangtin');
                $('.qttt_add_file1').remove();
                $('#model_suadangtin').show();
                el.find('.view_img').css({
                    'border': 'none',
                    'height': '322px'
                })
                el.find('.view_img_item1').hide();
                el.find('.v_show_file').remove();
                if (data.file != "") {
                    el.find('.view_img').css({
                        'border': 'none',
                        'height': '322px'
                    })
                    el.find('.view_img_item1').hide();
                    window.arr_file = [];
                    window.arr_image_video = [];

                    window.arr_file_name = [];
                    window.arr_image_video_name = [];

                    arr_file_k = data.file.split("||");
                    arr_file_k_name = data.name_file.split("||");

                    for (var i = 0; i < arr_file_k.length; i++) {
                        if (arr_file_k[i].match("/image/") != null || arr_file_k[i].match("/video/") != null) {
                            arr_image_video.push(arr_file_k[i]);
                            arr_image_video_name.push(arr_file_k_name[i]);
                        } else {
                            arr_file.push(arr_file_k[i]);
                            arr_file_name.push(arr_file_k_name[i]);
                        }
                    }
                    el.find('.view_img').append('<button class="qttt_add_file1" type="button"><img src="../img/qttt_add_file.svg" alt="qttt_add_file.svg">Thêm tệp/ảnh/video</button>');
                    el.find('.view_img').append('<div class="v_show_file"></div>');
                    el.find('.v_show_file').append('<div class="show_view_file2"></div>');
                    el.find('.v_show_file').append('<div class="show_view_file"></div>');
                    for (var i = 0; i < arr_image_video.length; i++) {
                        if (arr_image_video[i].match("/image/") != null) {
                            html = `<div class="view_img_detail">
                            <img class="show_del_img show_del_file_ud" src="../img/show_del_img.svg" alt="show_del_img.svg">
                            <img class="view_img_detail_img" src="` + arr_image_video[i] + `" alt="Ảnh lỗi">
                            </div>`;
                            el.find(".show_view_file").append(html);
                        } else {
                            html = `<div class="view_img_detail">
                                <img class="show_del_img" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="0">
                                <video class="view_img_detail_img show_del_file_ud" controls="">
                                <source src="` + arr_image_video[i] + `" type="video/mp4">
                                </video>
                                </div>`;
                            el.find(".show_view_file").append(html);
                        }
                    }

                    for (var i = 0; i < arr_file.length; i++) {
                        html = `<div class="show_view_file2_detail">
                            <img src="../img/show_del_file.svg" class="show_del_file show_del_file_ud" alt="show_del_file.svg">
                            <p class="show_name_file2">` + arr_file_name[i] + `</p>
                            <div class="show_file2">
                                <p class="show_file_size">` + data.created_at + `</p>
                            </div>
                            </div>`;
                        el.find(".show_view_file2").append(html);
                    }

                }
            }
        });

    });

    $(".btn_go_upload").click(function() {
        $(".v_qttt_dang_tin").click();
    });

    $('.avtitem').click(function() {
        $(this).parents('.v_reply_answer').find('.upload_file_question').click();
    });

    $('.v_reply_answer .upload_file_question').change(function() {

    });
    $('.close_detl, .model_center_post_newfeed_btn').click(function() {
        $('#model_suadangtin').hide();
    });

    $(document).click(function(e) {
        var el = $(e.target);
        if (el.hasClass('qttt_add_file1') == true) {
            $('#open_file_newfeed3').click();
        }

        if (el.hasClass('show_del_file_ud') == true) {
            if (el.parents('.show_view_file2_detail').length > 0) {
                el_parents = el.parents('.show_view_file2');
                el_parent_child = el.parents('.show_view_file2_detail');
                var index = el_parent_child.index();
                var name_file = arr_file_name[index];
                arr_file_name.splice(index, 1);
                el.parents('.show_view_file2_detail').remove();
                arr_file.splice(index, 1);
            } else {
                el_parents = el.parents('.show_view_file');
                el_parent_child = el.parents('.view_img_detail');
                var index = el_parent_child.index();
                var name_file = arr_image_video_name[index];
                arr_image_video.splice(index, 1);
                el.parents('.view_img_detail').remove();
                arr_image_video_name.splice(index, 1);
            }

            if ($('#model_suadangtin').find('.view_img_detail').length == 0 && $('#model_suadangtin').find('.show_view_file2_detail').length == 0) {
                el = $('#model_suadangtin');
                el.find('.view_img').css({
                    'border': '1px solid #999',
                    'height': '150px'
                })
                el.find('.v_show_file').remove();
                el.find('.view_img_item1').show();
                el.find('.qttt_add_file1').remove();
            }
        }
    });

    $("#open_file_newfeed3").change(function() {
        el = $("#model_suadangtin");
        if (el.find(".qttt_add_file1").length == 0) {
            el.find(".view_img").append('<button class="qttt_add_file1" type="button"><img src="../img/qttt_add_file.svg" alt="qttt_add_file.svg">Thêm tệp/ảnh/video</button>');
        }

        window.arr_file_ud = [];
        window.arr_image_ud = [];

        var file = $(this).prop('files');
        for (let i = 0; i < file.length; i++) {

        }
    });
});
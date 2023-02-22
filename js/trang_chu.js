var arr_file_nf = [];
var arr_del_file = [];
var arr_file = [];
var arr_image_video = [];
$(document).ready(function () {
    $(".select_list_ep2").select2({
        'width': '100%',
        'placeholder': 'Thêm bạn bè'
    });
    var room = $.trim($('#room').html());
    var username = 'user_ttnb';

    socket.emit('joinRoom', { room, username });

    $('.select2_t_company').select2({
        width: '100%',
    })

    $(".l_open_model_post, .v_nhacten_detail").click(function () {
        $("#model_dangtin").show();
    });

    $(' #select_list_ep').select2({
        width: '100%',
        placeholder: 'Chọn nhân viên',
    })
    $('.select2_muti_tv').select2({
        width: '100%',
        placeholder: 'Thêm thành viên',
    })
    $('.select2_muti_td').select2({
        width: '100%',
        placeholder: 'Dùng @ để thêm người theo dõi',
    })
    $(".v_like_post").click(function () {
        var new_id = $(this).data('id_new');
        var element = $(this);
        $.ajax({
            url: '../ajax/like_active.php',
            type: 'POST',
            dataType: 'json',
            data: {
                new_id: new_id
            },
            success: function (data) {
                if (data.result == true) {
                    element.find('.nut-like').attr('src', '../img/v_like_post.svg');
                    element.find('.v_text_like').css('color', '#4C5BD4');
                } else if (data.result == false) {
                    element.find('.nut-like').attr('src', '../img/like_t.png');
                    element.find('.v_text_like').css('color', '#666666');
                }
                element.parents(".v_active_duoi").prev().find('.so-like').text(data.count);
            }
        });
    });

    $("#close_post_newfeed,#bth_cancel_model_newfeed").click(function () {
        $("#model_dangtin").hide();
        arr_del_file = [];

    })

    $('#open_file_newfeed3').change(function () {
        var el = $(this).parents("#model_suatin");
        var file = $(this).prop('files');
        for (var i = 0; i < file.length; i++) {
            if (file[i].size > 20971520) {
                alert("Vui lòng upload mỗi tệp hoặc ảnh dưới 20MB");
                return false;
                break;
            }
        }
        if (typeof (arr_post_image_ud) === "undefined") {
            window.arr_post_image_ud = [];
        }

        if (typeof (arr_post_file_ud) === "undefined") {
            window.arr_post_file_ud = [];
        }

        if (el.find(".v_show_file").length == 0) {
            var html = `<button class="qttt_add_file1" type="button">
            <img src="../img/qttt_add_file.svg" alt="qttt_add_file.svg">
            Thêm tệp/ảnh/video
            </button>
            <div class="v_show_file">
            </div>`;
            el.find('.view_img_item1').hide();
            el.find('.view_img').css({
                'border': 'none',
                'height': '322px'
            }).append(html);
            el.find(".v_show_file").append(`<div class="show_view_file2"></div>`);
            el.find(".v_show_file").append(`<div class="show_view_file"></div>`);
        }

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
        for (var i = 0; i < file.length; i++) {
            if (file[i].type.match("image/*") != null || file[i].type.match("video/*") != null) {
                arr_post_image_ud.push(file[i]);
                var reader = new FileReader();
                if (file[i].type.match("image/*") != null) {
                    reader.onload = function (e) {
                        var imageUrl = e.target.result;
                        html_image = `<div class="view_img_detail_ud">
                        <img class="show_del_img_ud2" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="0"><img class="view_img_detail_img" src="` + imageUrl + `" alt="Ảnh lỗi">
                        </div>`;
                        el.find('.show_view_file').append(html_image);
                    }
                    reader.readAsDataURL(file[i]);
                } else {
                    var duoi = file[i].type;
                    reader.onload = function (e) {
                        var imageUrl = e.target.result;
                        html_image = `<div class="view_img_detail_ud">
                        <img class="show_del_img_ud2" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="0">
                        <video class="view_img_detail_img" controls>
                        <source src="` + imageUrl + `" type="` + duoi + `">
                        </video>
                        </div>`;
                        el.find('.show_view_file').append(html_image);
                    }
                    reader.readAsDataURL(file[i]);
                }
            } else {
                arr_post_file_ud.push(file[i]);
                var size = file[i].size;
                if (size / 1024 <= 1000) {
                    var text_size = (size / 1024).toFixed(1) + " KB";
                } else {
                    var text_size = (size / 1024).toFixed(1) + " MB";
                }
                html_file = `<div class="show_view_file2_detail_ud">
                <img src="../img/show_del_file.svg" class="show_del_file_ud2" alt="show_del_file.svg">
                <p class="show_name_file2">` + file[i].name + `</p>
                <div class="show_file2">
                <p class="show_file_size">` + text_size + `</p>
                <p class="show_file_size">` + time_upload + `</p>
                </div>
                </div>`;
                el.find('.show_view_file2').append(html_file);
            }
        }
        $(this).val(null);
    });
    $("#model_dangtin .upload_file_add3").click(function(){
        if ($("#model_dangtin").find(".view_img").find(".v_show_file").length == 0) {
            $("#open_file_newfeed").click();
        }else{
            $("#open_file_newfeed2").click();
        }
    });

    $("#model_suatin .upload_file_add3").click(function(){
        $("#open_file_newfeed3").click();
    });
    $(document).click(function (e) {
        if (e.target.className == "show_del_file") {
            var el = $(e.target).parents('.show_view_file2_detail');
            var index = $(".show_view_file2_detail").index(el);
            arr_file.splice(index, 1);
            el.remove();
            if ($('.show_view_file2_detail').length == 0 && $('.view_img_detail').length == 0) {
                $('.v_show_file').remove();
                $('.view_img_item1').show();
                $('.view_img').css({
                    'border': '1px solid #999',
                    'height': '150px'
                });
                $('.qttt_add_file').remove();
            }
        }

        if (e.target.className == "show_del_img") {
            var el = $(e.target).parents('.view_img_detail');
            var index = $(".view_img_detail").index(el);
            arr_image_video.splice(index, 1);
            el.remove();
            if ($('.show_view_file2_detail').length == 0 && $('.view_img_detail').length == 0) {
                $('.v_show_file').remove();
                $('.view_img_item1').show();
                $('.view_img').css({
                    'border': '1px solid #999',
                    'height': '150px'
                });
                $('.qttt_add_file').remove();
            }
        }

        if (e.target.className == "qttt_add_file" || $('.qttt_add_file').has(e.target).length > 0) {
            $("#open_file_newfeed2").click();
        }

        if (e.target.className == "qttt_add_file1" || $('.qttt_add_file1').has(e.target).length > 0) {
            $("#open_file_newfeed3").click();
        }

        if (e.target.className == "show_del_img_ud") {
            var el = $(e.target).parents('.view_img_detail');
            var index = $(".view_img_detail").index(el);
            arr_post_image.splice(index, 1);
            arr_post_name_image.splice(index, 1);
            el.remove();
            if ($('.show_view_file2_detail').length == 0 && $('.view_img_detail').length == 0) {
                $('.v_show_file').remove();
                $('.view_img_item1').show();
                $('.view_img').css({
                    'border': '1px solid #999',
                    'height': '150px'
                });
                $('.qttt_add_file1').remove();
            }
        }

        if (e.target.className == "show_del_file_ud") {
            var el = $(e.target).parents('.show_view_file2_detail');
            var index = $(".show_view_file2_detail").index(el);
            arr_post_file.splice(index, 1);
            arr_post_name_file.splice(index, 1);
            el.remove();
            if ($('.show_view_file2_detail').length == 0 && $('.view_img_detail').length == 0) {
                $('.v_show_file').remove();
                $('.view_img_item1').show();
                $('.view_img').css({
                    'border': '1px solid #999',
                    'height': '150px'
                });
                $('.qttt_add_file1').remove();
            }
        }

        if (e.target.className == "show_del_img_ud2") {
            var el = $(e.target).parents('.view_img_detail_ud');
            var index = $(".view_img_detail_ud").index(el);
            arr_post_image_ud.splice(index, 1);
            el.remove();
            if ($('.show_view_file2_detail').length == 0 && $('.view_img_detail').length == 0) {
                $('.v_show_file').remove();
                $('.view_img_item1').show();
                $('.view_img').css({
                    'border': '1px solid #999',
                    'height': '150px'
                });
                $('.qttt_add_file1').remove();
            }
        }

        if (e.target.className == "show_del_file_ud2") {
            var el = $(e.target).parents('.show_view_file2_detail_ud');
            var index = $(".show_view_file2_detail_ud").index(el);
            arr_post_file_ud.splice(index, 1);
            el.remove();
            if ($('.show_view_file2_detail').length == 0 && $('.view_img_detail').length == 0) {
                $('.v_show_file').remove();
                $('.view_img_item1').show();
                $('.view_img').css({
                    'border': '1px solid #999',
                    'height': '150px'
                });
                $('.qttt_add_file1').remove();
            }
        }
    });

    $("#open_file_newfeed2").change(function () {
        var el = $('#model_dangtin');
        var arr_file2 = [];
        var arr_image_video2 = [];
        var flag = true;
        var file = $(this).prop('files');
        for (let i = 0; i < file.length; i++) {
            if (file[i].type.match('video/*') != null || file[i].type.match('image/*') != null) {
                arr_image_video2.push(file[i]);
            } else {
                arr_file2.push(file[i]);
            }
        }
        if (arr_image_video2.length + arr_file2.length + arr_file.length + arr_image_video.length > 20) {
            flag = false;
            alert('Vui lòng upload ko quá 20 ảnh và file');
        } else {
            for (var i = 0; i < arr_image_video2.length; i++) {
                if (arr_image_video2[i].size > 20971520) {
                    alert('Vui lòng upload mỗi ảnh và file dưới 20MB');
                    flag = false;
                    break;
                }
            }

            if (flag == true) {
                for (let i = 0; i < arr_file2.length; i++) {
                    if (arr_file2[i].size > 20971520) {
                        alert('Vui lòng upload mỗi ảnh và file dưới 20MB');
                        flag = false;
                        break;
                    }
                }
            }
        }

        if (flag == true) {
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
            var html_file = "";
            for (let i = 0; i < arr_file2.length; i++) {
                var size = arr_file2[i].size / 1024;
                if (size <= 1000) {
                    var text_size = size.toFixed(1) + " KB";
                } else {
                    var text_size = (size / 1024).toFixed(1) + " MB";
                }
                html_file = html_file + `<div class="show_view_file2_detail">
                <img src="../img/show_del_file.svg" class="show_del_file" alt="show_del_file.svg">
                <p class="show_name_file2">` + arr_file2[i].name + `</p>
                <div class="show_file2">
                    <p class="show_file_size">` + text_size + `</p>
                    <p class="show_file_size">` + time_upload + `</p>
                </div>
                </div>`;
            }
            el.find(".show_view_file2").append(html_file);
            if (el.find(".show_view_file").length == 0) {
                el.find(".v_show_file").append('<div class="show_view_file"></div>');
            }
            for (let i = 0; i < arr_image_video2.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var imageUrl = e.target.result;
                    if (arr_image_video2[i].type.match("image/*") != null) {
                        el.find('.v_show_file').find('.show_view_file').append(`<div class="view_img_detail">
                        <img class="show_del_img" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="` + i + `">
                            <img class="view_img_detail_img" src="` + imageUrl + `" alt="Ảnh lỗi">
                        </div>`);
                    } else {
                        el.find('.v_show_file').find('.show_view_file').append(`<div class="view_img_detail">
                            <img class="show_del_img" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="` + i + `">
                            <video class="view_img_detail_img" controls>
                            <source src="` + imageUrl + `" type="` + arr_image_video2[i].type + `">
                            </video>
                            </div>`);
                    }
                }
                reader.readAsDataURL(arr_image_video2[i]);
            }
            arr_file.push(...arr_file2);
            arr_image_video.push(...arr_image_video2);
        }
        $(this).val(null);
    });

    $("#tag_ep_newfeed").click(function () {
        $("#view_list_ep").toggle();
        $("#select_list_ep").select2();
        $("#select_list_ep").val('').trigger("change");
        var ep_id = [];
    })
    $("#tag_ep_newfeed2").click(function () {
        $("#view_list_ep2").toggle();
        $("#select_list_ep2").select2();
        $("#select_list_ep2").val('').trigger("change");
        var ep_id = [];
    })

    $("#form_newfeed").submit(function () {
        var title = $.trim($('#title_post_newfeed_1').val());
        if (title != '') {
            var data = new FormData();
            $('.update_work_span').hide();
            $('.update_work_loading').show();
            data.append('title', title);
            $.ajax({
                url: "../ajax/post_newfeeds.php",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                data: data,
                success: function (data) {
                    if (data.result == true) {
                        location.reload();
                    }
                }
            });
        }
        return false;
    });

    $(".open_model_edit_nf").click(function () {
        var new_id = $(this).data('new_id');
        var el = $("#model_suatin");
        $("#model_suatin").show();
        el[0].dataset.new_id = new_id;
        var id = $(this).attr('data-new_id');
        el.find('.v_show_file').remove();
        el.find('.qttt_add_file').remove();
        el.find('.view_img_item1').show();
        el.find('.view_img').css({
            'border': '1px solid #999',
            'height': '150px'
        });
        $.ajax({
            url: '../ajax/detail_newfeed.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {
                var data_nf = data.data;
                var id_user_tag = data_nf.id_user_tags.split(",");
                $("#title_post_newfeed_3").val(data_nf.content);
                var file = data_nf.file.split("||");
                if (data_nf.name_file != null) {
                    var name_file = data_nf.name_file.split("||");
                }
                window.arr_post_image = [];
                window.arr_post_file = [];

                window.arr_post_name_image = [];
                window.arr_post_name_file = [];

                var file_size = [];
                $("#model_suatin").find("#select_list_ep2").val(id_user_tag).trigger("change");
                if (file[0] != "") {
                    for (var i = 0; i < file.length; i++) {
                        if (file[i].match("/image/") != null || file[i].match("/video/") != null) {
                            arr_post_image.push(file[i]);
                            arr_post_name_image.push(name_file[i]);
                        } else {
                            arr_post_file.push(file[i]);
                            arr_post_name_file.push(name_file[i]);
                            file_size.push(data_nf.filesize[i]);
                        }
                    }


                    $("#model_suatin").find(".qttt_add_file1").remove();
                    
                    if (file.length > 0) {
                        var html = `<button class="qttt_add_file1" type="button">
                        <img src="../img/qttt_add_file.svg" alt="qttt_add_file.svg">
                        Thêm tệp/ảnh/video
                        </button>
                        <div class="v_show_file">
                        </div>`;
                        el.find('.view_img_item1').hide();
                        el.find('.view_img').css({
                            'border': 'none',
                            'height': '322px'
                        }).append(html);
                        var html_file = `<div class="show_view_file2">`;
                        for (let i = 0; i < arr_post_file.length; i++) {
                            var size = file_size[i];
                            if (size / 1024 <= 1000) {
                                var text_size = (size / 1024).toFixed(1) + " KB";
                            } else {
                                var text_size = (size / 1024).toFixed(1) + " MB";
                            }
                            html_file = html_file + `<div class="show_view_file2_detail">
                            <img src="../img/show_del_file.svg" class="show_del_file_ud" alt="show_del_file.svg">
                            <p class="show_name_file2">` + arr_post_name_file[i] + `</p>
                            <div class="show_file2">
                            <p class="show_file_size">` + text_size + `</p>
                            <p class="show_file_size">` + data_nf.created_at + `</p>
                            </div>
                            </div>`;
                        }
                        html_file = html_file + `</div>`;
                        el.find('.v_show_file').append(html_file);

                        var html_image = `<div class="show_view_file">`;
                        for (var i = 0; i < arr_post_image.length; i++) {
                            if (arr_post_image[i].match("/image/") != null) {
                                html_image = html_image + `<div class="view_img_detail">
                            <img class="show_del_img_ud" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="0"><img class="view_img_detail_img" src="` + arr_post_image[i] + `" alt="Ảnh lỗi">
                            </div>`;
                            } else {
                                var duoi = arr_post_image[i].split(".");
                                duoi = duoi[duoi.length - 1];
                                html_image = html_image + `<div class="view_img_detail">
                            <img class="show_del_img_ud" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="0">
                            <video class="view_img_detail_img" controls>
                                <source src="` + arr_post_image[i] + `" type="video/` + duoi + `">
                            </video>
                            </div>`;
                            }
                        }
                        html_image = html_image + `</div>`;
                        el.find('.v_show_file').append(html_image);
                    }
                }
            }
        });
    })

    $('#form_popup_suadangtin').submit(function () {
        var el = $(this);
        var new_id = el.parents("#model_suatin").data('new_id');
        var form_data = new FormData();
        form_data.append('new_id', new_id);

        var content = el.find(".title_post_newfeed").val().trim();
        form_data.append("content", content);

        form_data.append("arr_post_image", arr_post_image);
        form_data.append("arr_post_file", arr_post_file);

        form_data.append("arr_post_name_image", arr_post_name_image);
        form_data.append("arr_post_name_file", arr_post_name_file);
        form_data.append("id_user_tag", $(this).find("#select_list_ep2").val());

        if (typeof (arr_post_image_ud) !== 'undefined') {
            for (var i = 0; i < arr_post_image_ud.length; i++) {
                form_data.append('image[]', arr_post_image_ud[i]);
            }
        }

        if (typeof (arr_post_file_ud) !== 'undefined') {
            for (var i = 0; i < arr_post_file_ud.length; i++) {
                form_data.append('file[]', arr_post_file_ud[i]);
            }
        }

        if (content != "" || arr_post_image.length > 0 || arr_post_file.length > 0 || typeof (arr_post_image_ud) !== 'undefined' || typeof (arr_post_file_ud) !== 'undefined') {
            $.ajax({
                url: '../ajax/edit_update_work.php',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    location.reload();
                }
            });

        }
        return false;
    });

    $("#search_ttnb").submit(function () {
        var search = $.trim($('#input_search').val());
        if (search != '') {
            window.location.href = '/quan-ly-chung.html?key=' + search;
        } else {
            window.location.href = '/quan-ly-chung.html';
        }
        return false;
    });

    $('.v_write_comment').keyup(function () {
        var el = $(this).parents('.v_comment_active');
        if ($.trim($(this).val()) != "") {
            el.find('.see_icon').hide();
            el.find('.see_icon1').hide();
            el.find('.nut_gui_comment').show();
        } else {
            if (el.find('.render_img').length == 0) {
                el.find('.see_icon').show();
                el.find('.see_icon1').show();
                el.find('.nut_gui_comment').hide();
                el[0].dataset.type = 0;
                el[0].dataset.new_id = el.find('.v_new_id_comment').val();
            }
        }
    });
});

$("#label_file2").click(function () {
    $("#open_file_newfeed3").click();
});

$('#open_file_newfeed').change(function () {
    var el = $('#model_dangtin');
    var file = $(this).prop('files');
    var flag = true;
    if (file.length > 20) {
        alert("Vui lòng upload không quá 20 ảnh và file");
        $(this)[0].value = "";
        flag = false;
    } else {
        for (let i = 0; i < file.length; i++) {
            if (file[i].size > 20971520) {
                $(this)[0].value = "";
                flag = false;
                arr_image_video = [];
                arr_file = [];
                alert("Vui lòng upload file hoặc ảnh có dung lượng dưới 20MB");
                break;
            } else {
                if (file[i].type.match('video/*') != null || file[i].type.match('image/*') != null) {
                    arr_image_video.push(file[i]);
                } else {
                    arr_file.push(file[i]);
                }
            }
        }
    }

    if (flag == true) {
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
        var html = `<button class="qttt_add_file" type="button">
                            <img src="../img/qttt_add_file.svg" alt="qttt_add_file.svg">
                            Thêm tệp/ảnh/video
                        </button>
                        <div class="v_show_file">
                        </div>`;
        el.find('.view_img_item1').hide();
        el.find('.view_img').css({
            'border': 'none',
            'height': '322px'
        }).append(html);
        var html_file = `<div class="show_view_file2">`;
        for (let i = 0; i < arr_file.length; i++) {
            var size = arr_file[i].size / 1024;
            if (size <= 1000) {
                var text_size = size.toFixed(1) + " KB";
            } else {
                var text_size = (size / 1024).toFixed(1) + " MB";
            }
            html_file = html_file + `<div class="show_view_file2_detail">
                            <img src="../img/show_del_file.svg" class="show_del_file" alt="show_del_file.svg">
                            <p class="show_name_file2">` + arr_file[i].name + `</p>
                            <div class="show_file2">
                                <p class="show_file_size">` + text_size + `</p>
                                <p class="show_file_size">` + time_upload + `</p>
                            </div>
                            </div>`;
        }
        html_file = html_file + `</div>`;
        el.find('.v_show_file').append(html_file);
        if (arr_image_video.length > 0) {
            el.find(".v_show_file").append('<div class="show_view_file"></div>');
            for (let i = 0; i < arr_image_video.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var imageUrl = e.target.result;
                    if (arr_image_video[i].type.match("image/*") != null) {
                        el.find('.v_show_file').find('.show_view_file').append(`<div class="view_img_detail">
                        <img class="show_del_img" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="` + i + `">
                            <img class="view_img_detail_img" src="` + imageUrl + `" alt="Ảnh lỗi">
                        </div>`);
                    } else {
                        el.find('.v_show_file').find('.show_view_file').append(`<div class="view_img_detail">
                            <img class="show_del_img" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="` + i + `">
                            <video class="view_img_detail_img" controls>
                            <source src="` + imageUrl + `" type="` + arr_image_video[i].type + `">
                            </video>
                            </div>`);
                    }
                }
                reader.readAsDataURL(arr_image_video[i]);
            }
        }
    }
    $(this).val(null);
});

function close_img_upload_nf(e) {
    var a = $(e).parents('.open_file');
    var num_img = $('.image_newfeed_upload_video_img');
    var del = a.attr('data-id');
    arr_file_nf.splice(del, 1);
    a.remove();
    var arr_new = [];
    for (let i = 0; i < arr_file_nf.length; i++) {
        arr_new.push(arr_file_nf[i]);
        $('.open_file').eq(i).attr('data-id', i); // eq: tại vị trí
    }
    arr_file_nf = arr_new;
    if ((num_img.length - 1) <= 0) {
        $('.view_img_item1').css('display', 'flex');
        $('.view_img').css({
            'padding': '8px',
            'justify-content': 'center',
            'border': '1px solid #999999',
            'height': '150px',
        });
    }
}

function close_img_edit_nf(e) {
    arr_del_file.push($(e).parents('.image_newfeed_upload').attr('data-value'));
    var a = $(e).parents('.image_newfeed_upload').remove();
    var num_img = $('.image_newfeed_upload_video_img');
    if ((num_img.length) <= 0) {
        $('.view_img_item1').css('display', 'flex');
        $('.view_img').css({
            'padding': '8px',
            'justify-content': 'center',
            'border': '1px solid #999999',
            'height': '150px',
        });
    }
}

$('#form_popup_dangtin').submit(function () {
    var el = $(this);
    var content = $.trim($(this).find('.title_post_newfeed').val());
    var form_data = new FormData();
    form_data.append('content', $.trim(el.find('.title_post_newfeed').val()));
    if (arr_image_video.length > 0) {
        for (let i = 0; i < arr_image_video.length; i++) {
            form_data.append('image_video[]', arr_image_video[i]);
        }
    }

    if (arr_file.length > 0) {
        for (let i = 0; i < arr_file.length; i++) {
            form_data.append('file[]', arr_file[i]);
        }
    }
    el.find('.model_center_post_newfeed_btn_custom').prop('type', 'button');
    el.find('.update_work_span2').hide();
    el.find('.update_work_loading2').show();
    form_data.append('id_user_tag', $(this).find(".select_list_ep").val());
    $.ajax({
        type: "POST",
        url: "../ajax/update_work.php",
        data: form_data,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.result == true) {
                location.reload();
            }
        }
    });
    return false;
});

//đăng tin trang chủ

function focus_comment(id) {
    if ($('#comment' + id).parents('.container-cmt').css('display') == 'flex') {
        $('#comment' + id).parents('.container-cmt').css({
            'display': 'none'
        });
        $('#comment' + id).parents('.container-cmt')[0].dataset.type = 0;
        $('#comment' + id).parents('.container-cmt').find('.rep_cmt').val('');
        $('#comment' + id).parents('.container-cmt').find('.see_icon').show();
        $('#comment' + id).parents('.container-cmt').find('.see_icon1').show();
        $('#comment' + id).parents('.container-cmt').find('.nut_gui_comment').hide();
    } else {
        $('#comment' + id).parents('.container-cmt').css({
            'display': 'flex'
        });
        $('#comment' + id).focus();
    }
}

var arr_img = [];

function changeImg(input, id) {
    var el = $(input).parents('.v_comment_active');
    if (input.files && input.files[0]) {
        arr_img = [];
        arr_img.push(input.files[0]);
        $('#render_img').remove();
        $('#form_comment' + id).append(`
            <div class="render_img" id="render_img">
            <img src=" " class="render_img_item1" id="avatar` + id + `" alt="">
            <div class="img_close" onclick="close_img(` + id + `,this);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#avatar' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        var input = $('#open_file_newfeed');
        input.replaceWith(input.val('').clone(true));
        el.find('.see_icon').hide();
        el.find('.see_icon1').hide();
        el.find('.nut_gui_comment').show();
    }
}

function close_img(id, e) {
    arr_img = [];
    var el = $(e).parents('.v_comment_active');
    $('#render_img').remove();
    var input = $('#baiviet_taianh' + id);
    input.replaceWith(input.val('').clone(true));
    if (el.find('.v_write_comment').val() == "") {
        el.find('.see_icon').show();
        el.find('.see_icon1').show();
        el.find('.nut_gui_comment').hide();
        el[0].dataset.type = 0;
        el[0].dataset.new_id = el.find('.v_new_id_comment').val();
    }
}


function v_comment_active(e) {
    var element = $(e);
    var type = element.attr('data-type');
    var form_data = new FormData();
    var url = (type == 0) ? "../ajax/comment_post.php" : "../ajax/comment_post_edit.php";

    var comment = element.find('.v_write_comment').val().trim();
    var new_id = element.attr('data-new_id');
    var avatar = $('#v_header_menu .v_header_avatar').attr('src');
    var name = $('#v_header_menu .v_header_user_name').html();
    name = $.trim(name);
    if (type == 1) {
        avatar = $('#avatar' + new_id).attr('src');
    }

    form_data.append('comment', comment);
    form_data.append('avatar', avatar);
    form_data.append('new_id', new_id);
    form_data.append('img_comment', arr_img[0]);
    var check = true;
    if (type == 0) {
        if (comment == "" && arr_img.length == 0) {
            check = false;
        }   
    }else if (type == 1) {
        if (comment == "" && $(e).find(".render_img").length == 0) {
            check = false;
        }
    }
    if (check == true) {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (resp) {
                // var msg = { name: name, comment: comment, avatar: avatar, new_id: new_id, type: type, last_id: data.id, time_active: data.time_active };
                // socket.emit('ttnb_comment', msg);
                if (type == 0) {
                    var data = resp.data;
                    element.parents('.baiviets-footer').prev().find('.phai').find('.v_count_comment').text(data.count_comment + " Bình luận");
                    element.parents('.tren').next().find('.v_no_comment').hide();
                    html = `<div class="xembinhluan"> <div class="avt avt-cmt"><img src = "` + data.avatar + `"> </div>
                    <div class="binhluan">
                    <div class="container">
                    <div class="header-cmt">
                    <div class="name-cmt">
                    <p>` + data.name + `</p>
                    </div> 
                    <div class = "edit-cmt" onclick="option_cmt(this);" >
                        <img src = "../img/bacham.png">
                        <div class = "popup-chinhsua-cmt">
                            <div class = "ul_model" >
                                <div class = "li_model" onclick="update_comment(` + data.id + `,` + new_id + `,0)">
                                    <img src = "../img/chinh_sua_.png" alt = "Ảnh lỗi">
                                    <p class = "p_model" > Chỉnh sửa bình luận</p> 
                                </div> 
                                <div data-id="` + data.id + `" onclick="v_del_comment(this,0)" class = "li_model nut-xoa-baiviet">
                                    <img src = "../img/icon_xoa.png" alt = "Ảnh lỗi">
                                    <p class = "p_model" > Xóa bình luận</p> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    </div> 
                    <div class = "body-cmt">
                    <div class = "cmt"  id="text_comment` + data.id + `" tabindex="-1" data-value="` + data.comment + `">
                    <p>` + data.comment + ` </p> </div> </div> </div>`;
                    if (data.img != '') {
                        html += `<div class="image_comment"  id="image_comment` + new_id + `">
                        <img src="` + data.img + `" id="img_cmt` + data.id + `" alt="image comment">
                    </div>`;
                    }
                    html += `<div class = "reach-cmt" id="react_cmt` + data.id + `" >
                        <p class = "v_like_post2" onclick = "v_like_post2(this)" data-id = "` + data.id + `" > Thích </p>
                        <p class = "trl-binhluan" onclick="focus_comment(` + data.id + `);"> Trả lời</p> <p id='time` + data.id + `'> ` + data.time_active + ` </p> </div>
                        <div class="cmt-binhluan">
                        <div id="cmt-binhluan` + data.id + `"></div>
                        <form class="container-cmt" data-type="0" id="form_comment` + data.id + `" data-cmt_id="` + data.id + `" data-new_id="` + new_id + `" onsubmit="return rep_comment(this);">
                        <div class="img avt"> <img src="` + data.avatar + `" class="v_avt_reply_comment">
                        </div>
                        <div class="cont"> <input type="text" class="rep_cmt" onkeyup="v_rep_cmt(this)" id="comment` + data.id + `" name="" placeholder="Viết bình luận...">
                            <span class="see_icon"></span>
                            <label class="see_icon1">
                                <input type="file" onchange="show_img_rep_comment(this,` + data.id + `)" id="rep_comment` + data.id + `" accept="image/*" style="display: none;" />
                            </label>
                            <button class="nut_gui_comment rep_comment" id="rep_comment` + data.id + `">
                                <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                            </button>
                        </div>
                        </form>
                        <div id="view_rep_cmt` + data.id + `"></div>
                        </div> </div></div>`;
                    element.find('.v_write_comment').val('');
                    $('#render_img').remove();
                    var input = $('#baiviet_taianh' + new_id);
                    input.replaceWith(input.val('').clone(true));
                    $('#xemthem' + new_id).prepend(html);
                    $('#comment' + new_id).val('');
                    var number = $('#number_comment' + new_id).attr('data-value');
                    var count_comment = parseInt(number) + 1;
                    $('#number_comment' + new_id).html((count_comment) + ' Bình luận').attr('data-value', count_comment);
                } else {
                    var data = resp;
                    var input = $('#baiviet_taianh' + data.id_new);
                    input.replaceWith(input.val('').clone(true));
                    $('#text_comment' + new_id).html('<p>' + comment + '</p>');
                    $('#text_comment' + new_id).focus();
                    $('#text_comment' + new_id).attr('data-value', comment);
                    $('#comment' + data.id_new).val('');
                    $('#form_comment' + data.id_new).attr('data-type', 0);
                    $('#render_img').remove();
                    $('#img_cmt' + data.id_cmt).remove();
                    if (data.img != '') {
                        $('#react_cmt' + new_id).before(`<div class="image_comment" id="image_comment` + new_id + `">
                        <img src="` + data.img + `" id="img_cmt` + data.id_cmt + `" alt="image comment">
                        </div>`);
                    }
                }
                element.parents(".baiviets-footer").find(".v_no_comment").hide();
                element.find('.see_icon').show();
                element.find('.see_icon1').show();
                element.find('.nut_gui_comment').hide();
                arr_img = [];
            }
        });
    }
    return false;
}

socket.on('ttnb_comment', data => {
    if (data.type == 0) {
        html = `<div class="xembinhluan"> <div class="avt avt-cmt"><img src = "` + data.avatar + `"> </div>
                <div class="binhluan">
                    <div class="container">
                        <div class="header-cmt">
                            <div class="name-cmt">
                                <p>` + data.name + `</p>
                            </div> 
                            <div class = "edit-cmt" onclick="option_cmt(this);" >
                                <img src = "../img/bacham.png">
                                <div class = "popup-chinhsua-cmt">
                                    <div class = "ul_model" >
                                        <div class = "li_model" onclick="update_comment(` + 123 + `,` + data.new_id + `,0)">
                                            <img src = "../img/chinh_sua_.png" alt = "Ảnh lỗi">
                                            <p class = "p_model" > Chỉnh sửa bình luận</p> 
                                        </div>
                                        <div data-id="` + 123 + `" onclick="v_del_comment(this,0)" class = "li_model nut-xoa-baiviet">
                                        <img src = "../img/icon_xoa.png" alt = "Ảnh lỗi">
                                        <p class = "p_model" > Xóa bình luận</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                                <div class = "body-cmt">
                            <div class = "cmt"  id="text_comment`+ data.last_id + `" tabindex="-1" data-value="` + data.comment + `">
                            <p>` + data.comment + ` </p> 
                            </div> 
                    </div> 
                    </div>
                    <div class="reach-cmt" id="react_cmt`+ data.last_id + `">
                        <p class="v_like_post2 " onclick="v_like_post2(this)" data-id="`+ data.last_id + `">Thích</p>
                        <p class="trl-binhluan" onclick="focus_comment(`+ data.last_id + `);">Trả lời</p>
                        <p id="time272">`+ data.time_active + `</p>
                    </div>
                </div>`;
        // if (data.img != '') {
        //     html += `<div class="image_comment"  id="image_comment` + new_id + `">
        //             <img src="` + data.html.img + `" id="img_cmt` + data.html.id + `" alt="image comment">
        //         </div>`;
        // }
        $('#xemthem' + data.new_id).prepend(html);
        $('#comment' + data.new_id).val('');
        var number = $('#number_comment' + data.new_id).attr('data-value');
        var count_comment = parseInt(number) + 1;
        console.log(count_comment);
        $('#number_comment' + data.new_id).html((count_comment) + ' Bình luận').attr('data-value', count_comment);
    }
    if (data.type_sent == 2) {
        html = `<div class="xembinhluan xembinhluan_con hide_comment` + data.id + `">
                    <div class="avt avt-cmt"> <img src="` + data.avatar + `"> </div>
                    <div class="binhluan">
                    <div class="container">
                        <div class="header-cmt">
                            <div class="name-cmt">
                                <p>` + data.name + `</p>
                            </div>
                            <div class="edit-cmt" onclick="option_cmt(this);">
                                <img src="../img/bacham.png">
                                <div class="popup-chinhsua-cmt">
                                    <div class="ul_model">
                                        <div class="li_model" onclick="update_comment(` + data.id + `,` + data.cmt_id + `,1)">
                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                        </div>
                                        <div data-id="` + data.id + `" onclick="v_del_comment(this,1)" class="li_model nut-xoa-baiviet">
                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                            <p class="p_model">Xóa bình luận</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-cmt">
                            <div class="cmt" id="text_comment` + data.id + `" tabindex="1" data-value="` + data.comment + `">
                                <p> ` + data.comment + ` </p>
                            </div>
                        </div>
                    </div>`;

        // if (data.html.img != '') {
        //     html += `<div class="image_comment"  id="image_comment` + new_id + `">
        //                     <img src="` + data.html.img + `" id="img_cmt` + data.html.id + `" alt="image comment">
        //                 </div>`;
        // }
        html += `
                    <div class="reach-cmt" id="react_cmt` + data.id + `">
                            <p class="v_like_post2 " onclick="v_like_post2(this)" data-id="` + data.id + `">Thích</p>
                        <p id='time` + data.id + `'>` + data.time_active + `</p>
                    </div>
                    </div>
                    </div>`;
        $('#cmt-binhluan' + data.cmt_id).append(html);
    }
});

function v_rep_cmt(e) {
    var el = $(e).parents('.container-cmt').next();
    if ($.trim($(e).val()) != "") {
        $(e).parents('.container-cmt').find('.see_icon').hide();
        $(e).parents('.container-cmt').find('.see_icon1').hide();
        $(e).parents('.container-cmt').find('.nut_gui_comment').show();
    } else {
        if (el.find('.render_img').length == 0) {
            $(e).parents('.container-cmt').find('.see_icon').show();
            $(e).parents('.container-cmt').find('.see_icon1').show();
            $(e).parents('.container-cmt').find('.nut_gui_comment').hide();
            $(e).parents('.container-cmt')[0].dataset.type = 0;
            $(e).parents('.container-cmt')[0].dataset.new_id = $(e).parents('.container-cmt').find('.id_new_rep_comment').val();
        }
    }
}

function v_keyup_none(e) {
    console.log($(e).val());
    if ($(e).val() == "") {
        $(e).parents('.v_comment_active')[0].dataset.type = 0;
    }
}

function show_comment(new_id) {
    var e = $(event.target);
    var el = e.parents('.duoi').find('.xembinhluan_cap1').length;
    var data = new FormData();
    if (window.location.pathname == "/truyen-thong-noi-bo-cong-ty.html") {
        data.append('page_type', 2);
    } else {
        data.append('page_type', 1);
    }
    var page = $('.hide_comment' + new_id);
    data.append('new_id', new_id);
    data.append('page', page.length);
    data.append('count', el);
    $.ajax({
        url: '../ajax/list_comment_newFeed.php',
        type: 'POST',
        dataType: 'json',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        success: function (responsive) {
            console.log(responsive);
            if (responsive.result == true) {
                if (responsive.data.length == 0) {
                    $('#thugon-binhluan' + new_id).css('display', 'block');
                    $('#xem-binhluan' + new_id).css('display', 'none');
                }
                for (let i = 0; i < responsive.data.length; i++) {
                    html = ` <div class="xembinhluan hide_comment` + new_id + `"  ><div class="avt avt-cmt"> <img src="` + responsive.data[i].avatar_login + `"> </div><div class="binhluan">
                        <div class="container">
                            <div class="header-cmt">
                                <div class="name-cmt">
                                    <p>` + responsive.data[i].name + `</p>
                                </div>
                                <div class="edit-cmt"  onclick="option_cmt(this);">
                                    <img src="../img/bacham.png">
                                    <div class="popup-chinhsua-cmt">
                                        <div class="ul_model">`;
                    if (responsive.data[i].type_create == 1) {
                        html = html + `<div class="li_model" onclick="update_comment(` + responsive.data[i].id + `,` + new_id + `,0)">
                                                <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                <p class="p_model">Chỉnh sửa bình luận </p>
                                            </div>`;
                    }

                    if (responsive.data[i].type_delete == 1) {
                        html = html + `<div data-id="` + responsive.data[i].id + `" onclick="v_del_comment(this,0)" class="li_model nut-xoa-baiviet">
                                                <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                <p class="p_model">Xóa bình luận</p>
                                            </div>`;
                    }
                    html = html + `</div>
                                    </div>
                                </div>
                            </div>
                            <div class="body-cmt">
                                <div class="cmt" id="text_comment` + responsive.data[i].id + `" tabindex="-1" data-value="` + responsive.data[i].content + `">
                                    <p>` + responsive.data[i].content + `</p>
                                </div>
                            </div>
                        </div>`;
                    if (responsive.data[i].image != '') {
                        html += `<div class = "image_comment" id="image_comment` + new_id + ` >
                            <img src = "` + responsive.data[i].image + `" id="img_cmt` + responsive.data[i].id + `" alt = "image comment" >
                            </div>`;
                    }
                    html += `
                    <div class = "reach-cmt"  id="react_cmt` + responsive.data[i].id + `">
                         <p class = "v_like_post2 ` + responsive.data[i].style_like2 + `" onclick="v_like_post2(this)" data-id = "` + responsive.data[i].id + `" > Thích </p> 
                         <p class = "trl-binhluan" onclick="focus_comment(` + responsive.data[i].id + `);" > Trả lời </p> 
                         <p  id='time` + responsive.data[i].id + `'>` + responsive.data[i].time_sort + `</p> `;
                    if (responsive.data[i].num_like_comment > 0) {
                        html += `<img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment` + responsive.data[i].id + `">
                        <p class="num_like_comment num_like_comment` + responsive.data[i].id + `">` + responsive.data[i].num_like_comment + `</p>`;
                    }

                    html += `</div> 
                         <div class = "cmt-binhluan">
                          <div id="cmt-binhluan` + responsive.data[i].id + `"></div>`;
                    if (responsive.data[i].rep_comment > 0) {
                        html += `
                        <div class="view_cmt_rep" id="view_cmt_rep` + responsive.data[i].id + `" onclick="show_rep_comment(` + responsive.data[i].id + `);">Hiển thị bình luận</div>
                        <div class="hide_cmt_rep" id="hide_cmt_rep` + responsive.data[i].id + `" onclick="htde_rep_comment(` + responsive.data[i].id + `);">Ẩn bớt bình luận</div>
                        `;
                    }

                    html += `<form class="container-cmt"  data-type="0" id="form_comment` + responsive.data[i].id + `" data-cmt_id="` + responsive.data[i].id + `" data-new_id="` + new_id + `" onsubmit="return rep_comment(this);">
                    <div class="img avt"> <img src="` + responsive.data[i].avatar_login + `" class="v_avt_reply_comment">
                    </div>
                    <div class="cont"> <input type="text" class="rep_cmt" id="comment` + responsive.data[i].id + `" name="" placeholder="Viết bình luận...">
                        <span class="see_icon"></span>
                        <label class="see_icon1">
                            <input type="file" onchange="show_img_rep_comment(this,` + responsive.data[i].id + `)" id="rep_comment` + responsive.data[i].id + `" accept="image/*" style="display: none;" />
                        </label>
                        <button class="nut_gui_comment rep_comment" id="rep_comment` + responsive.data[i].id + `">
                            <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                        </button>
                    </div>
                    </form>
                    <div id="view_rep_cmt` + responsive.data[i].id + `"></div>
                    </div></div></div>`;
                    $('#xemthem' + new_id).append(html);
                }
                if (responsive.count_comment == 0) {
                    $(e).hide().prev().show();
                }
            } else {
                $('#thugon-binhluan' + new_id).css('display', 'block');
                $('#xem-binhluan' + new_id).css('display', 'none');
                i = 0;
            }
        }
    });
}

function hide_comment(new_id) {
    $('.hide_comment' + new_id).remove();
    i = 0;
}

var img_rep_cmt = [];

function show_img_rep_comment(input, id) {
    var el = $(input).parents('.container-cmt');
    if (input.files && input.files[0]) {
        img_rep_cmt = [];
        img_rep_cmt.push(input.files[0]);
        $('#render_img').remove();
        $('#view_rep_cmt' + id).append(`
            <div class="render_img img_rep" id="render_img">
            <img src=" " class="render_img_item1" id="avatar` + id + `" alt="">
            <div class="img_close img_rep_close" onclick="close_img_rep_cmt(` + id + `,this);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#avatar' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        el.find('.see_icon').hide();
        el.find('.see_icon1').hide();
        el.find('.nut_gui_comment').show();
    }
}

function close_img_rep_cmt(id, e) {
    var el = $(e).parents('.view_rep_cmt').prev();
    img_rep_cmt = [];
    $('#render_img').remove();
    var input = $('#rep_comment' + id);
    input.replaceWith(input.val('').clone(true));
    if (el.find('.rep_cmt').val() == "") {
        el.find('.see_icon').show();
        el.find('.see_icon1').show();
        el.find('.nut_gui_comment').hide();
        el[0].dataset.type = 0;
        el[0].dataset.new_id = el.find('.id_new_rep_comment').val();
    }
}

function rep_comment(a) {
    var form_data = new FormData();
    var element = $(a);
    var comment = $(a).find('.rep_cmt').val();
    var cmt_id = $(a).attr('data-cmt_id');
    var new_id = $(a).attr('data-new_id');
    var type = $(a).attr('data-type');
    var url = (type == 0) ? "../ajax/rep_comment_post.php" : "../ajax/comment_post_edit.php";
    if (type == 1) {
        var avatar = $('#img_cmt' + new_id).attr('src');
        form_data.append('avatar', avatar);
    }
    form_data.append('comment', comment);
    form_data.append('cmt_id', cmt_id);
    form_data.append('new_id', new_id);
    form_data.append('img_comment', img_rep_cmt[0]);
    if (comment != "" || img_rep_cmt.length > 0 || avatar) {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (data) {
                $(a).css({
                    'display': 'none'
                });
                if (type == 0) {
                    // var sent = {
                    //     id: data.html.id,
                    //     new_id: new_id,
                    //     cmt_id: cmt_id,
                    //     comment: data.html.comment,
                    //     count_comment: data.html.count_comment,
                    //     avatar: data.html.avatar,
                    //     name: data.html.name,
                    //     time_active: data.html.time_active,
                    //     type_sent: 2 // Tra loi binh luan
                    // };
                    // socket.emit('ttnb_comment', sent);
                    $('#number_comment' + new_id).html(data.html.count_comment + ' Bình luận');
                    element.find('.rep_cmt').val('');
                    element.find('.see_icon').show();
                    element.find('.see_icon1').show();
                    element.find('.nut_gui_comment').hide();
                    html = `<div class="xembinhluan xembinhluan_con hide_comment` + data.html.id + `">
                    <div class="avt avt-cmt"> <img src="` + data.html.avatar + `"> </div>
                    <div class="binhluan">
                    <div class="container">
                        <div class="header-cmt">
                            <div class="name-cmt">
                                <p>` + data.html.name + `</p>
                            </div>
                            <div class="edit-cmt" onclick="option_cmt(this);">
                                <img src="../img/bacham.png">
                                <div class="popup-chinhsua-cmt">
                                    <div class="ul_model">
                                        <div class="li_model" onclick="update_comment(` + data.html.id + `,` + cmt_id + `,1)">
                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                        </div>
                                        <div data-id="` + data.html.id + `" onclick="v_del_comment(this,1)" class="li_model nut-xoa-baiviet">
                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                            <p class="p_model">Xóa bình luận</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-cmt">
                            <div class="cmt" id="text_comment` + data.html.id + `" tabindex="1" data-value="` + data.html.comment + `">
                                <p> ` + data.html.comment + ` </p>
                            </div>
                        </div>
                    </div>`;

                    if (data.html.img != '') {
                        html += `<div class="image_comment"  id="image_comment` + new_id + `">
                            <img src="` + data.html.img + `" id="img_cmt` + data.html.id + `" alt="image comment">
                        </div>`;
                    }
                    html += `
                    <div class="reach-cmt" id="react_cmt` + data.html.id + `">
                            <p class="v_like_post2 " onclick="v_like_post2(this)" data-id="` + data.html.id + `">Thích</p>
                        <p id='time` + data.html.id + `'>` + data.html.time_active + `</p>
                    </div>
                    </div>
                    </div>`;
                    element.find('.rep_cmt').val('');
                    $('#render_img').remove();
                    var input = $('#rep_comment' + cmt_id);
                    input.replaceWith(input.val('').clone(true));
                    $('#cmt-binhluan' + cmt_id).prepend(html);
                    var number = $('#number_comment' + new_id).data('value');
                    var input = $('#rep_comment' + cmt_id);
                    input.replaceWith(input.val('').clone(true));
                    // $('#cmt-binhluan' + data.cmt_id).append(html);
                } else {
                    var input = $('#rep_comment' + data.id_new);
                    input.replaceWith(input.val('').clone(true));
                    $('#text_comment' + new_id).html('<p>' + comment + '</p>');
                    $('#text_comment' + new_id).focus();
                    $('#text_comment' + new_id).attr('data-value', comment);
                    $('#comment' + cmt_id).val('');
                    $('#form_comment' + cmt_id).attr('data-type', 0);
                    $('#form_comment' + cmt_id).attr('data-new_id', data.id_new);
                    $('.render_img').remove();
                    if (data.img == '') {
                        $('#image_comment' + new_id).remove();
                    } else {
                        $('#image_comment' + new_id).remove();
                        $('#react_cmt' + new_id).before(`<div class="image_comment" id="image_comment` + new_id + `">
                        <img src="` + data.img + `" id="img_cmt` + new_id + `" alt="image comment">
                    </div>`);
                    }
                }
                img_rep_cmt = [];
            }
        });
    }
    return false;
}

function show_rep_comment(cmt_id) {
    var el = $(event.target);    
    var form_data = new FormData();
    if (window.location.pathname == "/truyen-thong-noi-bo-cong-ty.html") {
        form_data.append('page_type', 2);
    } else {
        form_data.append('page_type', 1);
    }
    var page = $('.hide_rep_comment' + cmt_id);
    form_data.append('cmt_id', cmt_id);
    form_data.append('page', page.length);
    $.ajax({
        url: '../ajax/list_rep_comment.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        success: function (responsive) {
            if (responsive.result == true) {
                var dem = 0;
                for (let i = 0; i < responsive.data.length; i++) {
                    html = ` <div class="xembinhluan xembinhluan_con hide_rep_comment` + cmt_id + `">
                    <div class="avt avt-cmt"> <img src="` + responsive.data[i].avatar + `"> </div>
                    <div class="binhluan">
                        <div class="container">
                            <div class="header-cmt">
                                <div class="name-cmt">
                                    <p>` + responsive.data[i].name + `</p>
                                </div>
                                <div class="edit-cmt"  onclick="option_cmt(this);">
                                    <img src="../img/bacham.png">
                                    <div class="popup-chinhsua-cmt">
                                        <div class="ul_model">`;
                    if (responsive.data[i].type_create == 1) {
                        html = html + `<div class="li_model" onclick="update_comment(` + responsive.data[i].id + `,` + cmt_id + `,1)">
                                                <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                <p class="p_model">Chỉnh sửa bình luận </p>
                                                </div>`;
                    }

                    if (responsive.data[i].type_detele == 1) {
                        html = html + `<div data-id="` + responsive.data[i].id + `" onclick="v_del_comment(this,1)" class="li_model nut-xoa-baiviet">
                                                <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                <p class="p_model">Xóa bình luận</p>
                                            </div>`;
                    }
                    html = html + `</div>
                                    </div>
                                </div>
                            </div>
                            <div class="body-cmt">
                                <div class="cmt" id="text_comment` + responsive.data[i].id + `" tabindex="-1" data-value="` + responsive.data[i].content + `">
                                    <p>` + responsive.data[i].content + `</p>
                                </div>
                            </div>
                        </div>`;

                    if (responsive.data[i].image != '') {

                        html += `<div class="image_comment"  id="image_comment` + responsive.data[i].id + `">
                                <img src="` + responsive.data[i].image + `" id="img_cmt` + responsive.data[i].id + `" alt="image comment">
                            </div>`;
                    }
                    html += `<div class="reach-cmt"  id="react_cmt` + responsive.data[i].id + `">
                            <p class="v_like_post2 ` + responsive.data[i].style_like2 + `" onclick="v_like_post2(this)" data-id="` + responsive.data[i].id + `">Thích</p>
                            <p id="` + responsive.data[i].id + `">` + responsive.data[i].time_sort + `</p>`;
                    if (responsive.data[i].num_like_comment > 0) {
                        html += `<img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment` + responsive.data[i].id + `">
                                <p class="num_like_comment num_like_comment` + responsive.data[i].id + `">` + responsive.data[i].num_like_comment + `</p>`;
                    }
                    html += `</div>
                    </div>
                </div>`;
                    $('#cmt-binhluan' + cmt_id).append(html);
                    dem++;
                }

                if (responsive.data.length == 0) {
                    $('#hide_cmt_rep' + cmt_id).css('display', 'block');
                    $('#view_cmt_rep' + cmt_id).css('display', 'none');
                }

                if (responsive.count_like == 0) {
                    el.hide();
                    el.next().show();
                }
            } else {
                return false;
            }
        }
    });
}

function htde_rep_comment(cmt_id) {
    $('#cmt-binhluan' + cmt_id).html('');
    $('#view_cmt_rep' + cmt_id).css('display', 'block');
    $('#hide_cmt_rep' + cmt_id).css('display', 'none');
}

function option_cmt(e) {
    $(e).find('.popup-chinhsua-cmt').toggle(250);
}

function update_comment(id, new_id, type) {
    if (type == 0) {
        var img = $('#img_cmt' + id).attr('src');
        var value = $('#text_comment' + id).attr('data-value');
        $('#comment' + new_id).val(value);
        $('#form_comment' + new_id).attr('data-type', 1);
        $('#form_comment' + new_id).find('.see_icon').hide();
        $('#form_comment' + new_id).find('.see_icon1').hide();
        $('#form_comment' + new_id).find('.nut_gui_comment').show();
        $('#form_comment' + new_id).attr('data-new_id', id);
        $('#comment' + new_id).focus();
        if (img != undefined) {
            $('#render_img').remove();
            $('#form_comment' + new_id).append(`
            <div class="render_img" id="render_img">
            <img src="` + img + `" class="render_img_item1" id="avatar` + id + `" alt="">
            <div class="img_close" onclick="close_img(` + id + `,this);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="Ảnh lỗi">
            </div>
            </div>
            `);
        }
    } else {
        var img = $('#img_cmt' + id).attr('src');
        var value = $('#text_comment' + id).attr('data-value');

        $('#comment' + new_id).val(value);
        $('#form_comment' + new_id).css({
            'display': 'flex'
        });
        $('#form_comment' + new_id).find('.see_icon').hide();
        $('#form_comment' + new_id).find('.see_icon1').hide();
        $('#form_comment' + new_id).find('.nut_gui_comment').show();
        $('#form_comment' + new_id).attr('data-type', 1);
        $('#form_comment' + new_id).attr('data-new_id', id);
        $('#comment' + new_id).focus();
        if (img != undefined) {
            $('#render_img').remove();
            $('#view_rep_cmt' + new_id).append(`
            <div class="render_img img_rep" id="render_img">
            <img src="` + img + `" class="render_img_item1" id="avatar` + id + `" alt="">
            <div class="img_close img_rep_close" onclick="close_img_rep_cmt(` + id + `,this);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        }
    }
}
    function show_document(e) {
        $(e).parents('.box_cha_model_tung_1').find('.model_tung_1').slideToggle();
    }

    function edit_document(e) {
        var id = $(e).data('id');
        $.ajax({
            url: '../ajax/get_knowledge.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                var element = $("#cstttl");
                element.find('.name').val(data.data.name);
                element.find('.author').val(data.data.author);
                element.find('.field').val(data.data.field);
                element.find('.description').val(data.data.description);
                element.find('.name_file').val(data.data.file);
                element.find('.knowledge_id').val(data.data.id);
                $(".chinh-sua-tttl").show();
            }
        });
    }

    function delele_document(e) {
        var id = $(e).data('id');
        $(".xoa-tai-lieu").show();
        $(".btn_del_document").val(id);
    }

    function knowledge_answer(e) {
        var id = $(e).data('id');
        $.ajax({
            url: '../ajax/knowledge_info.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                if (data.result == true) {
                    $(".traodoi-cauhoi").show();
                    $(".tdch .btn_luu_knowledge_answer").val(id);
                    $('.custom-name-file-input').val(data.data.name_file);
                    var element = $(".tdch");
                    element.find('.document_name').val(data.data.name);
                    element.find('.v_file_detail_doc').val(data.data.file);

                }
            }
        });
    }

    function v_del_answer(e) {
        var id = $(e).data('id');
        var element = $(e).parents(".posts-mysl");
        $(".xoa-cau-hoi").show('', function() {
            $(".xoa-cau-hoi .btn_luu").click(function() {
                $(".xoa-cau-hoi").hide();
                $(".xoa-thanh-cong").hide();
                $(".xoa-thanh-cong-cauhoi").show();
                $(".xoa-thanh-cong-cauhoi .dong-xoa-ch").val(id);
                $(".xoa-thanh-cong-cauhoi .hoantac-xoa-ch").text('Hoàn tác (5s)');
                var j = 4;
                var hoantac = setInterval(function() {
                    $(".xoa-thanh-cong-cauhoi .hoantac-xoa-ch").text('Hoàn tác (' + j + 's)');
                    if (j == 0) {
                        $.ajax({
                            url: '../ajax/delete_knowledge_answer.php',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                id: id
                            },
                            success: function(data) {
                                if (data.result == true) {
                                    element.remove();
                                    $(".xoa-thanh-cong-cauhoi").hide();
                                }
                            }
                        });
                        clearInterval(hoantac);
                    } else {
                        j--;
                    }
                }, 1000);
                $(".xoa-thanh-cong-cauhoi .dong-xoa-ch").click(function() {
                    clearInterval(hoantac);
                    $.ajax({
                        url: '../ajax/delete_knowledge_answer.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            if (data.result == true) {
                                element.remove();
                                $(".xoa-thanh-cong-cauhoi").hide();
                            }
                        }
                    });
                });
                $(".xoa-thanh-cong-cauhoi .hoantac-xoa-ch").click(function() {
                    clearInterval(hoantac);
                });
            });
        });
    }

    function v_emotion(e) {
        $(e).parents('.inf0-you-all').next().find('.v_reply').focus();
    }

    function text_tl(e) {
        if ($(e).parents(".v_pl").find('.reply-your').css('display') == 'none') {
            $(e).parents(".v_pl").find('.reply-your').css('display', 'flex').find('.v_reply').focus();
        } else {
            $(e).parents(".v_pl").find('.reply-your').css('display', 'none');
        }
    }

    function v_reply_answer(e) {
        var knowledge_answer_id = $(e).data('id');
        if ($(e).parents(".reply-your").next().find(".v_list_answer").length >= 1) {
            var max_id = $(e).parents(".reply-your").next().find(".v_list_answer").length - 1;
            var id = $(e).parents(".reply-your").next().find(".v_list_answer").eq(max_id)[0].dataset.id;
        } else {
            var id = 0;
        }
        var content = $(e).find('.content').val();
        if (content != "") {
            if ($(e)[0].dataset.type == 0) {
                $.ajax({
                    url: '../ajax/comment_knowledge.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        knowledge_answer_id: knowledge_answer_id,
                        content: content,
                    },
                    success: function(data) {
                        $(e).find('.v_gui_comment').hide();
                        $(e).find('.stitem').show();
                        $(e).find('.avtitem').show();
                        $(e).parents(".reply-your").next().html(data.html);
                        $(e).parents(".reply-your").prev().find('.coments-count').find('p').text(data.count_comment + " câu trả lời");
                        $(e).find('.content').val('');
                    }
                });
            } else if ($(e)[0].dataset.type == 1) {
                var id = $(e).find('.v_gui_comment').val();
                $.ajax({
                    url: '../ajax/edit_comment_knowledge2.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        content: content
                    },
                    success: function(data) {
                        var element = $(e).parents('.posts-mysl').find('.coment-all');
                        for (let i = 0; i < element.find('.v_list_answer').length; i++) {
                            if (element.find('.v_list_answer').eq(i)[0].dataset.id == id) {
                                var el_children = element.find('.v_list_answer').eq(i);
                            }
                        }
                        $(e)[0].dataset.type = 0;
                        $(e).find('.v_reply').val('');
                        $(e).find('.stitem').show();
                        $(e).find('.avtitem').show();
                        $(e).find('.v_gui_comment').hide();
                        el_children.find('.v_pl2').find('.pl-text').find('p').text(data.data.content);
                    }
                });
            }
        }
        return false;
    }

    function v_popup_active(e) {
        $(e).find('.sau3-con').toggle();
    }

    function v_edit_comment_knowledge(e) {
        var id = $(e).data('id');
        $.ajax({
            url: '../ajax/edit_comment_knowledge.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                if (data.result == true) {
                    $(e).parents(".coment-all").prev().find('.content').val(data.data.content);
                    $(e).parents(".coment-all").prev().find('.v_reply').focus();
                    $(e).parents(".coment-all").prev().find('.v_reply_answer')[0].dataset.type = 1;
                    $(e).parents(".coment-all").prev().find('.v_gui_comment').val(data.data.id);
                    $(e).parents(".coment-all").prev().find('.stitem').hide();
                    $(e).parents(".coment-all").prev().find('.avtitem').hide();
                    $(e).parents(".coment-all").prev().find('.v_gui_comment').show();
                }
            }
        });
    }

    function v_reply(e) {
        var element = $(e).parents(".reply-cmt");
        if (element.find('.v_reply').val() != "") {
            element.find('.stitem').hide();
            element.find('.avtitem').hide();
            element.find('.v_gui_comment').show();
        } else {
            $(e).parents('.v_reply_answer')[0].dataset.type = 0;
            element.find('.stitem').show();
            element.find('.avtitem').show();
            element.find('.v_gui_comment').hide();
        }
    }

    function v_reply02(e) {
        var element = $(e).parents(".reply-cmt");
        if (element.find('.v_reply').val() != "") {
            element.find('.stitem').hide();
            element.find('.avtitem').hide();
            element.find('.v_gui_comment').show();
        } else {
            console.log(element);
            element.find('.stitem').show();
            element.find('.avtitem').show();
            element.find('.v_gui_comment').hide();
            element[0].dataset.type = 0;
            element[0].dataset.id = element.find('.v_id_cmt_knowledge').val();
        }
    }

    function v_reply_cmt(e) {
        var content = $(e).find(".v_reply").val();
        var id = $(e)[0].dataset.id;
        if ($(e)[0].dataset.type == 0) {
            if ($(e).parents(".v_pl").find('.v_list_reply_cmt').length > 0) {
                var max_id = $(e).parents(".v_pl").find('.v_list_reply_cmt').length - 1;
                var max_id = $(e).parents(".v_pl").find('.v_list_reply_cmt').eq(max_id)[0].dataset.id;
            } else {
                var max_id = 0;
            }
            if (content != "") {
                $.ajax({
                    type: "POST",
                    url: "../ajax/reply_comment_knowledge.php",
                    data: {
                        id: id,
                        content: content,
                        start: max_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $(e).find('.stitem').show();
                        $(e).find('.avtitem').show();
                        $(e).find('.v_gui_comment').hide();
                        $(e).find(".v_reply").val('');
                        $(e).parents(".reply-your").prev().html(data.html);
                        $(e).parents(".reply-your").css("display", "none");
                    }
                });
            }
        } else {
            $.ajax({
                type: "POST",
                url: "../ajax/v_edit_repcomment_knowledge.php",
                data: {
                    content: content,
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    console.log(id);
                    var el = $(e).parents('.reply-your').prev();
                    for (let i = 0; i < el.find('.v_list_reply_cmt').length; i++) {
                        if (el.find('.v_list_reply_cmt').eq(i)[0].dataset.id == id) {
                            var el_children = el.find('.v_list_reply_cmt').eq(i);
                        }
                    }
                    el_children.find('.v_list_reply_detail').text(data.data.content);

                    $(e).find('.v_reply').val('');
                    $(e).find('.stitem').show();
                    $(e).find('.avtitem').show();
                    $(e).find('.v_gui_comment').hide();
                    $(e).parents('.reply-your').hide();
                    $(e)[0].dataset.type = 0;
                    $(e)[0].dataset.id = $(e).find('.v_id_cmt_knowledge').val();
                }
            });
        }
        return false;
    }

    function v_popup_active2(e) {
        $(e).find('.sau3-con').show();
    }

    function v_edit_comment_knowledge2(e) {
        var id = $(e)[0].dataset.id;
        $.ajax({
            type: "POST",
            url: "../ajax/edit_rep_comment_knowledge.php",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $(e).parents('.pl-coments-top').find('.reply-your').css({
                    'display': 'flex'
                });
                $(e).parents(".sau3-con").hide();
                $(e).parents('.pl-coments-top').find('.reply-your').find('.v_reply-cmt')[0].dataset.id = id;
                $(e).parents('.pl-coments-top').find('.reply-your').find('.v_reply-cmt')[0].dataset.type = 1;
                $(e).parents('.pl-coments-top').find('.reply-your').find('.v_reply-cmt').find('.v_reply').val(data.data.content).focus();
                $(e).parents('.pl-coments-top').find('.reply-your').find('.v_reply-cmt').find('.stitem').hide();
                $(e).parents('.pl-coments-top').find('.reply-your').find('.v_reply-cmt').find('.avtitem').hide();
                $(e).parents('.pl-coments-top').find('.reply-your').find('.v_reply-cmt').find('.v_gui_comment').show();
            }
        });
    }

    function v_del_list_answer(e) {
        var element = $(e);
        var id = $(e).data('id');
        $(".xoa-binh-luan").show('', function() {
            $(".xoa-bl-1").click(function() {
                $.ajax({
                    url: '../ajax/del_list_answer.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.result == true) {
                            $(e).parents(".v_list_answer").remove();
                        }
                        $(".xoa-binh-luan").hide();
                    }
                });

            });
        });
    }

    function imgitoption(e) {
        $(e).next().toggle();
    }

    function likecomment(e) {
        var element = $(e);
        var id = $(e)[0].dataset.id;
        $.ajax({
            type: "POST",
            url: "../ajax/like_comment_knowledge.php",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                if (data.result == true) {
                    element.text("Đã thích .").css('color', '#4C5BD4');
                } else if (data.result == false) {
                    element.text("Thích .").css('color', 'black');
                }
            }
        });
    }

    function reply_like(e) {
        var id = $(e)[0].dataset.id;
        $.ajax({
            type: "POST",
            url: "../ajax/like_reply_comment_knowledge.php",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                if (data.result == true) {
                    $(e).text("Đã thích . ").css('color', '#4C5BD4');
                } else if (data.result == false) {
                    $(e).text("Thích . ").css('color', '#474747');
                }
            }
        });
    }

    function see_question(e) {
        var max_id = $(e).parents(".see-question").prev().find('.v_list_answer').length - 1;
        var start = $(e).parents(".see-question").prev().find('.v_list_answer').eq(max_id)[0].dataset.id;
        var id = $(e).data('id');
        $.ajax({
            type: "POST",
            url: "../ajax/add_comment_knowledge.php",
            data: {
                start: start,
                id: id
            },
            dataType: "json",
            success: function(data) {
                $(e).parents(".see-question").prev().append(data.html);
                if (data.count == 0) {
                    $(e).hide();
                }
            }
        });
    }
    var action = 0;
    // $(window).scroll(function() {
    //     if (Math.floor($(window).scrollTop() + $(window).height()) == $(document).height()) {
    //         if ($("#div_spin")[0].dataset.active == 1) {
    //             if (action == 0) {
    //                 var start = $(".posts-mysl").eq($(".posts-mysl").length - 1)[0].dataset.id;
    //                 action = 1;
    //                 $(".v_img_load").css('display', 'block');
    //                 $.ajax({
    //                     type: "POST",
    //                     url: "../ajax/add_knowledge.php",
    //                     data: {
    //                         start: start
    //                     },
    //                     dataType: "json",
    //                     success: function(data) {
    //                         $("#div_spin").before(data.html);
    //                         $("#div_spin").css('display', 'none');
    //                         start = start + 3;
    //                         action = 0;
    //                         if ($(".nkt2").find('.posts-mysl').length == data.count) {
    //                             $("#div_spin")[0].dataset.active = 0;
    //                         }
    //                     }
    //                 });
    //             }
    //         }
    //     }
    // });
    $(document).ready(function() {
        var arr_file = [];
        var arr_image_video = [];
        $('.custom-file-input').change(function(e) {
            var type = $(this).prop('files')[0].type;
            if (type.match("image/*") != null) {
                alert("Vui lòng không upload ảnh");
                $(this)[0].value = "";
            }
        });

        $('#open_file_newfeed').change(function() {
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
                $('.view_img_item1').hide();
                $('.view_img').css({
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
                $('.v_show_file').append(html_file);
                if (arr_image_video.length > 0) {
                    $(".v_show_file").append('<div class="show_view_file"></div>');
                    for (let i = 0; i < arr_image_video.length; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var imageUrl = e.target.result;
                            if (arr_image_video[i].type.match("image/*") != null) {
                                $('.v_show_file').find('.show_view_file').append(`<div class="view_img_detail">
                                <img class="show_del_img" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="` + i + `">
                                    <img class="view_img_detail_img" src="` + imageUrl + `" alt="Ảnh lỗi">
                                </div>`);
                            } else {
                                $('.v_show_file').find('.show_view_file').append(`<div class="view_img_detail">
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
        });

        $('#form_popup_dangtin').submit(function() {
            var el = $(this);
            if ($.trim(el.find('.title_post_newfeed').val()) == "") {
                alert('Vui lòng đặt câu hỏi');
            } else {
                var form_data = new FormData();
                form_data.append('content', $.trim(el.find('.title_post_newfeed').val()));
                form_data.append('id_user_tag', el.find('#select_list_ep').val());
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

                $.ajax({
                    type: "POST",
                    url: "../ajax/knowledge_answer_file.php",
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

        $(document).click(function(e) {
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
        });

        $("#open_file_newfeed2").change(function() {
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
                $(".show_view_file2").append(html_file);

                for (let i = 0; i < arr_image_video2.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imageUrl = e.target.result;
                        if (arr_image_video2[i].type.match("image/*") != null) {
                            $('.v_show_file').find('.show_view_file').append(`<div class="view_img_detail">
                            <img class="show_del_img" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="` + i + `">
                                <img class="view_img_detail_img" src="` + imageUrl + `" alt="Ảnh lỗi">
                            </div>`);
                        } else {
                            $('.v_show_file').find('.show_view_file').append(`<div class="view_img_detail">
                                <img class="show_del_img" src="../img/show_del_img.svg" alt="show_del_img.svg" data-index="` + i + `">
                                <video class="view_img_detail_img" controls>
                                <source src="` + imageUrl + `" type="` + arr_image_video2[i].type + `">
                                </video>
                                </div>`);
                        }
                    }
                    reader.readAsDataURL(arr_image_video[i]);
                }
                arr_file.push(...arr_file2);
                arr_image_video.push(...arr_image_video2);
            }
        });

        $('.tai-lieu').click(function() {
            $('.qt-them-tl').show();
        });
        $(".see-question-previous").click(function() {

        });
        $('.model1').click(function() {
            $('.li_model_con').show()
            $('.model_tung_1').hide();
        });
        $(".huy-xoa-binh-luan").click(function() {
            $(".xoa-binh-luan").hide();
        });
        $(".close_detl").click(function() {
            $(".xoa-binh-luan").hide();
        });
        $("body").click(function() {
            if (event.target.id == 'xoa-binh-luan') {
                $("#xoa-binh-luan").hide();
            }
        });
        $(document).mouseup(function(e) {
            var container = $(".sau3-lon");
            var container2 = $(".sau3-con");
            if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
                container2.hide();
            }
        });
        //Các phần liên quan đến tài liệu
        $("#form_themtailieu").validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".form_group"));
                error.wrap("<span class='error'>");
            },
            rules: {
                name: "required",
                author: "required",
                field: "required",
                description: "required",
                file: "required",

            },
            messages: {
                name: "không được để trống",
                author: "không được để trống",
                field: "không được để trống",
                description: "không được để trống",
                file: "không được để trống",
            },
            submitHandler: function(form) {
                $(".qt-them-tl").hide();
                $(".li_model_con").show().find('.text1').text("Bạn đã thêm tài liệu thành công");
                return true;
            }
        });
        $("#cstttl .name_file").click(function() {
            $("#cstttl .file").click();
        });
        $("#cstttl .file").change(function() {
            var name_file = $(this).prop('files')[0].name;
            $("#cstttl .name_file").val(name_file);
        });
        $("#cstttl").validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".form_group"));
                error.wrap("<span class='error'>");
            },
            rules: {
                name: "required",
                author: "required",
                field: "required",
                description: "required",
                file: "required",

            },
            messages: {
                name: "không được để trống",
                author: "không được để trống",
                field: "không được để trống",
                description: "không được để trống",
                file: "không được để trống",
            },
            submitHandler: function(form) {
                $(".chinh-sua-tttl").hide();
                $(".li_model_con").show().find('.text1').text("Bạn đã chỉnh sửa tài liệu thành công");
                return true;
            }
        });
        // $('.chinh-sua-tttl').show();
        $('.model_tung_1').hide();
        // $(document).click(function (e){
        //     var container = $(".model_tung_1");
        //     if (!container.is(e.target) && container.has(e.target).length === 0){
        //         container.hide();
        //     }
        // });
        $(".tdch").validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".form_group"));
                error.wrap("<span class='error'>");
            },
            rules: {
                document_name: "required",
                content: "required",
                file: "required",
            },
            messages: {
                document_name: "không được để trống",
                content: "không được để trống",
                file: "không được để trống",
            },
            submitHandler: function(form) {
                return true;
            }
        });
        $('.xoa-tai-lieu .btn_del_document').click(function() {
                var id = $(this).val();
                $.ajax({
                    url: '../ajax/delete_document.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.result == true) {
                            $('.xoa-thanh-cong').show();
                            window.location.href = window.location.href;
                        }
                        $('.chinh-sua-tttl').hide();
                        $('.xoa-tai-lieu').hide();
                    }
                });
            })
            // End: các phần liên quan đến tài liệu
        $('.model3').click(function() {
            $('.traodoi-cauhoi').show()
            $('.model_tung_1').hide();
        });
        $('.model4').click(function() {
            $('.xoa-tai-lieu').show()
            $('.model_tung_1').hide();
        });
        $('.xoa-tai-lieu .btn_huy').click(function() {
            $('.xoa-tai-lieu').hide();
        });

        $('.btn_huy').click(function() {
            $('.chinh-sua-tttl').hide();
        });

        $('.close_detl').click(function() {
            $('.chinh-sua-tttl').hide();
        });

        $('.close_detl').click(function() {
            $('.qt-them-tl').hide();
        });

        $('.close_detl').click(function() {
            $('.chinh-sua-tttl').hide();
        });
        $('.close_detl').click(function() {
            $('.traodoi-cauhoi').hide();
        });
        $('.close_detl').click(function() {
            $('.xoa-tai-lieu').hide();
        });
    });


    $(window).click(function(e) {
        if ($(e.target).is(".qt-them-tl")) {
            $(".qt-them-tl").hide();
        }

        if ($(e.target).is(".li_model_con")) {
            $(".li_model_con").hide();
        }

        if ($(e.target).is(".xoa-thanh-cong")) {
            $(".xoa-thanh-cong").hide();
        }

        if ($(e.target).is(".ul_model")) {
            $(".ul_model").hide();
        }

        if ($(e.target).is(".chinh-sua-tttl")) {
            $(".chinh-sua-tttl").hide();
        }

        if ($(e.target).is(".traodoi-cauhoi")) {
            $(".traodoi-cauhoi").hide();
        }

        if ($(e.target).is(".xoa-tai-lieu")) {
            $(".xoa-tai-lieu").hide();
        }

        if ($(e.target).is(".bat-thong-bao-ch")) {
            $(".bat-thong-bao-ch").hide();
        }

        if ($(e.target).is(".xoa-cau-hoi")) {
            $(".xoa-cau-hoi").hide();
        }

        if ($(e.target).is(".xoa-thanh-cong-cauhoi")) {
            $(".xoa-thanh-cong-cauhoi").hide();
        }

        if ($(e.target).is(".cs-ch-cuatoi")) {
            $(".cs-ch-cuatoi").hide();
        }

        if ($(e.target).is(".xoa-thanhcong-bai-chct")) {
            $(".xoa-thanhcong-bai-chct").hide();
        }
        if ($(e.target).is(".chinh-sua-tttl")) {
            $(".chinh-sua-tttl").hide();
        }

        if ($(e.target).is(".traodoi-cauhoi")) {
            $(".traodoi-cauhoi").hide();
        }
        if ($(e.target).is(".xoa-tai-lieu")) {
            $(".xoa-tai-lieu").hide();
        }

        if ($(e.target).is(".bat-thong-bao-ch")) {
            $(".bat-thong-bao-ch").hide();
        }
        if ($(e.target).is(".xoa-cau-hoi")) {
            $(".xoa-cau-hoi").hide();
        }
        if ($(e.target).is(".xoa-thanh-cong-cauhoi")) {
            $(".xoa-thanh-cong-cauhoi").hide();
        }

        if ($(e.target).is(".cs-ch-cuatoi")) {
            $(".cs-ch-cuatoi").hide();
        }

        if ($(e.target).is(".xoa-bai-chct")) {
            $(".xoa-bai-chct").hide();
        }
        if ($(e.target).is(".xoa-thanhcong-bai-chct")) {
            $(".xoa-thanhcong-bai-chct").hide();
        }
        if ($(e.target).is(".xoa-sk-nhan-vien")) {
            $(".xoa-sk-nhan-vien").hide();
        }
    });

    $(document).ready(function() {
        $(".nkt2 .hv1").hover(function() {
            $(this).css("background", "#2E3994");
        }, function() {
            $(this).css("background", "#4C5BD4");
        });

        $(".nkt2 .hv2").hover(function() {
            $(this).css("background", "#2E3994");
        }, function() {
            $(this).css("background", "#4C5BD4");
        });
        $(".traodoi-cauhoi .btn_huy").click(function() {
            $(".traodoi-cauhoi").hide();
        })

        $(document).click(function(e) {
            var container2 = $(".v_item-option");
            var container = $(".item-option-con");
            if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
                container.hide();
            }
        });

        $(".bat-tb").click(function() {
            $(".bat-thong-bao-ch").show();
            $(".nkt2 .item-option-con").hide();
        })

        $(".huy-thong-bao").click(function() {
            $(".bat-thong-bao-ch").hide();
        })

        $(".bat-thong-bao").click(function() {
            $(".bat-thong-bao-ch").hide();
            $(".xoa-thanh-cong").hide();
        })

        $("img.close_detl").click(function() {
            $(".bat-thong-bao-ch").hide();
            $(".xoa-cau-hoi").hide();

        })

        $(".xoa-ch").click(function() {
            $(".xoa-cau-hoi").show();
            $(".nkt2 .item-option-con").hide();
        })

        $(".huy-xoa-cau-hoi").click(function() {
            $(".xoa-cau-hoi").hide();
        })
        $(".dong-xoa-ch").click(function() {
            $(".xoa-thanh-cong-cauhoi").hide();
        })

        $(".hoantac-xoa-ch").click(function() {
            $(".xoa-thanh-cong-cauhoi").hide();
        })
        $("#nkt3 .chinh-sua3").click(function() {
            $('.cs-ch-cuatoi').show();
            $('#nkt3 .item-option-con').hide();
        })
        $("img.close_detl").click(function() {
            $(".cs-ch-cuatoi").hide();
        })

        $(".cs-ch-cuatoi .btn_huy").click(function() {
            $(".cs-ch-cuatoi").hide();
        })

        $(".item-option-con .chinhsua-chct2").click(function() {
            $(".item-option-con").hide();
            $(".xoa-bai-chct").show();
            $(".cs-ch-cuatoi").hide();
        })

        $(".xoa-bai-chct img.close_detl").click(function() {
            $(".xoa-bai-chct").hide();
        })

        $(".xoa-bai-chct .btn_huy").click(function() {
            $(".xoa-bai-chct").hide();
            $(".cs-ch-cuatoi").hide();
        })

        $(".xoa-bai-chct .btn_luu").click(function() {
            $(".xoa-bai-chct").hide();
            $(".xoa-thanhcong-bai-chct").show();

        })

        $(".qt-them-tl .btn_huy").click(function() {
            $(".qt-them-tl").hide();
        })

        $(".img-readinglisa").click(function() {
            $(".right-question").css("width", "100%");
            $(".right-question").css("display", "block");
            $(".right-question").css("transition", "0.3s");
            $(".hiennn").show();

            $(".img-menuhien").show();
        })
        $(".menuhien").click(function() {
            // $(".right-question").css("display", "none");
            $(".right-question").css("transition", "0.3s");
            $(".right-question").css("width", "0px");
            $(".img-readinglisa").show();
            $(".img-menuhien").hide();
            $(".hiennn").hide();

        })
    });
const socket = io.connect('https://chat.timviec365.com.vn', {
    secure: true,
    enabledTransports: ["https"],
    transports: ['websocket', 'polling']
});
$(document).ready(function () {
    var chat_id = "";
    var id_user = $.trim($('.v_header_user_id').text()).split(' ');
    id_user = $.trim(id_user[1]);
    if ($('.v_nv_chucvu-p').text().trim() == "Công ty") {
        var user_type = 1;
    } else {
        var user_type = 2;
    }
    arr_room = [];
    // for (var i = 0; i < $('.v_user_directory').length; i++) {
    //     var id_you = $('.v_user_directory').eq(i).data('id_user');
    //     var type_you = $('.v_user_directory').eq(i).data('user_type');
    //     if (user_type < type_you) {
    //         var room = id_user + "_" + id_you + "_1";
    //     }else if (user_type > type_you) {
    //         var room = id_you + "_" + id_user + "_1";
    //     }else{
    //         if (user_type == 2) {
    //             if (id_user > id_you) {
    //                 var room = id_user + "_" + id_you + "_2";
    //             }else{
    //                 var room = id_you + "_" + id_user + "_2";
    //             }
    //         }

    //         if (user_type == 1) {
    //             if (id_user > id_you) {
    //                 var room = id_user + "_" + id_you + "_3";
    //             }else{
    //                 var room = id_you + "_" + id_user + "_3";
    //             }
    //         }
    //     }
    //     arr_room.push(room);
    //     socket.emit('joinRoom', { room, id_user });
    // }
    var user_name1 = $('.v_header_user_name').text();
    // $.ajax({
    //     url: '../ajax/get_room.php',
    //     type: 'POST',
    //     dataType: 'json',
    //     data: {
    //         id_user: id_user
    //     },
    //     success: function (data) {
    //         for (var i = 0; i < data.data.length; i++) {
    //             room = data.data[i];
    //             socket.emit('joinRoom', { room, id_user });
    //         }
    //     }
    // });

    $(".v_search_popup_chat_directory").keyup(function () {
        var name = $.trim($(this).val().toLowerCase());
        if (name == "") {
            $('.v_user_directory').css({
                'display': 'flex'
            });
        } else {
            for (var i = 0; i < $('.v_user_directory').length; i++) {
                var directory = $(".v_user_directory").eq(i).find('.v_directory_user_name').text().toLowerCase();
                console.log(directory);
                if (directory.indexOf(name) == -1) {
                    $('.v_user_directory').eq(i).css({
                        'display': 'none'
                    });
                } else {
                    $('.v_user_directory').eq(i).css({
                        'display': 'flex'
                    });
                }
            }
        }
    });
    //add phòng chat
    $('.v_user_directory').click(function () {
        var id_user = $(this).data('id_user');
        var user_type = $(this).data('user_type');
        $.ajax({
            url: '../ajax/get_data_chat.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id_user: id_user,
                user_type: user_type
            },
            success: function (data) {
                var name = data.ep_name;
                var username = data.username;
                window.room = data.room;
                $('.v_box_chat_header_name').text(data.ep_name);
                $('.v_box_chat_header_avatar').attr({
                    'src': data.data.ep_image
                });
                var ava_partner = data.data.ep_image;
                $(this).parents('.v_popup_chat').hide();
                $('.v_box_chat').show();
                $('.v_box_chat')[0].dataset.id = id_user;
                $('.v_box_chat')[0].dataset.type = user_type;
                $('.v_box_chat')[0].dataset.room = data.room;
                var room = data.room;
                $('.v_content_box_chat').html(data.html);
                $('.v_content_box_chat').animate({ scrollTop: $('.v_content_box_chat').get(0).scrollHeight }, 0);
                $('.v_popup_chat').hide();
            }
        });
    });
    $('.v_edit_box_chat').click(function () {
        var id = $('.v_box_chat').data('id');
        var type_user_tag = $('.v_box_chat').data('type');
        $.ajax({
            type: "POST",
            url: "../ajax/get_data_nickname.php",
            data: {
                id: id
            },
            dataType: "json",
            success: function (data) {
                if (data.nickname != "") {
                    $('.v_nickname_detail_span').val(data.nickname);
                } else {
                    $('.v_nickname_detail_span').val('');
                }
                window.id_nick_name_tag = data.id_user_tag;
                window.type_user_tag = type_user_tag;
                $('.v_nickname').fadeIn();
            }
        });
    });

    $('.v_nickname_detail').submit(function () {
        if ($.trim($('.v_nickname_detail_span').val()) != "") {
            var nickname = $.trim($('.v_nickname_detail_span').val());
            $.ajax({
                type: "POST",
                url: "../ajax/edit_nickname.php",
                data: {
                    id_user_tag: id_nick_name_tag,
                    type_user_tag: type_user_tag,
                    nickname: nickname
                },
                dataType: "json",
                success: function (data) {
                    $('.v_nickname').fadeOut();
                    $('.v_box_chat_header_name').text(nickname);
                }
            });
        }
        return false;
    });

    $('#mes').click(function (e) {
        var container = $('.v_popup_chat');
        var container2 = $('.v_box_chat');
        if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
            $('.v_popup_chat').toggle();
        }
    });

    $('.v_cancel_see_image').click(function () {
        $('.see_image').hide();
    });

    $('.v_nickname_del').click(function () {
        $(this).parents('.v_nickname').fadeOut();
    });

    $('.v_box_chat_send').submit(function () {
        // var id_you = $(this).;
        var type_you = $('.v_user_directory').eq(i).data('user_type');
        if (user_type < type_you) {
            var room = id_user + "_" + id_you + "_1";
        } else if (user_type > type_you) {
            var room = id_you + "_" + id_user + "_1";
        } else {
            if (user_type == 2) {
                if (id_user > id_you) {
                    var room = id_user + "_" + id_you + "_2";
                } else {
                    var room = id_you + "_" + id_user + "_2";
                }
            }

            if (user_type == 1) {
                if (id_user > id_you) {
                    var room = id_user + "_" + id_you + "_3";
                } else {
                    var room = id_you + "_" + id_user + "_3";
                }
            }
        }
        var el = $(this).parents('.v_box_chat');
        var data = {};
        var data1 = {};
        var timer = new Date();
        var hour = timer.getHours();
        var minute = timer.getMinutes();
        if (minute < 10) {
            minute = "0" + minute;
        }

        if (hour < 10) {
            hour = "0" + hour;
        }

        var time_chat = hour + ":" + minute;
        var mess = $.trim($(this).find('.v_box_chat_send_input').val());
        var html1 = "";
        var html = "";
        var chat = $('.v_chat_picture');
        $('.v_box_quote').remove();
        $('.v_box_chat_send_div').css({
            'top': '50%',
            'transform': 'translateY(-50%)'
        });

        if (arr_file.length > 0) {
            if (arr_file.length > 10) {
                alert('Vui lòng upload không quá 10 file và ảnh');
                return false;
            }
        }
        var quote = $('.v_box_chat_send').find('.v_box_quote').find('.v_loading_quote1').text();
        window.obj_data = {};
        obj_data.mess = mess;
        obj_data.time_chat = time_chat;
        var form_data = new FormData();
        form_data.append('content', mess);
        form_data.append('room', room);
        form_data.append('chat_id', chat_id);
        for (let i = 0; i < arr_file.length; i++) {
            form_data.append('file[]', arr_file[i]);
        }

        $.ajax({
            type: "POST",
            url: "../ajax/add_chat.php",
            data: form_data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.v_content_box_chat').append(data.html);
                $(".v_box_chat_send_input").val('');
                $('.v_content_box_chat').animate({ scrollTop: $('.v_content_box_chat').get(0).scrollHeight }, 0);
                reset_img_chat();
                var time_chat = data.time_chat;
                var mess = {};
                mess.content = data.content;
                mess.path_file = data.path_file;
                mess.name_file = data.name_file;
                mess.chat_id = data.chat_id;
                if (socket.connected == true) {
                    var type_you = data.type_you;
                    var username = $('.v_header_user_name').text().trim();
                    var files = 'text';
                    var ava = $('.v_header_avatar').attr('src');
                    // var room = el.data('room');
                    var room = 1;
                    const msg = { username, id_user, room, mess, type_you, time_chat, files, user, role, ava };
                    socket.emit('chatMessage', msg);
                }
            }
        });
        return false;
    });

    socket.on('message', (data, another, status) => {
        var room = data.room;
        var mess = data.mess;
        $.ajax({
            type: "POST",
            url: "../ajax/get_user_id_room.php",
            data: {
                room: room
            },
            dataType: "json",
            success: function (req) {
                if (req.result == true) {
                    if (data.id_user != id_user) {
                        if ($('.v_box_chat').css('display') == 'none') {
                            if ($('#mes').find('.mb_notify_chat').length == 0) {
                                $('#mes').append('<span class="mb_notify_chat">+1</span>');
                            } else {
                                var notify_chat = $.trim($('#mes').find('.mb_notify_chat').text());
                                notify_chat = notify_chat.split("+");
                                var sum = Number(notify_chat[1]) + 1;
                                $('#mes').find('.mb_notify_chat').text("+" + sum);
                            }
                        }
                        var html_detail = '';
                        if (mess.content != "") {
                            html_detail = html_detail + `<div class="v_content_box_div_file v_content_box_div_file2 v_content_boxme_mess">
                            <div class="v_you_mess_cont_detail">
                            <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
                            <div class="v_content_box_div v_content_box_div2 v_content_quote_box">
                            ` + mess.content + `
                            </div>
                            <div class="block_emoji">
                            <img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
                            </div>
                            <div class="v_chat_select2 v_chat_select3">
                            <div class="v_more_chat">
                            <img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
                            <div class="v_chat_custom">
                            <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
                            <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
                            <div class="v_chat_custom_div">Chuyển tiếp</div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>`;
                        }
                        if (mess.path_file != "") {
                            var name_file = data.mess.name_file;
                            var path_file = data.mess.path_file.split("||");
                            var arr_image = [];
                            for (let i = 0; i < path_file.length; i++) {
                                if (path_file[i].match('/image/') == null) {
                                    html_detail = html_detail + `<div class="v_content_box_div_file v_content_box_div_file2 v_content_box_you_file">
                                    <div class="v_you_mess_cont_detail">
                                    <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
                                    <div class="v_content_box_div_file v_content_box_div_file3">
                                    <div class="v_box_file_detail2">
                                    <img src="../img/v_chat_picture_file.png" alt="Ảnh lỗi">
                                    <a download href="` + path_file[i] + `" class="v_box_file_detail_span">` + name_file[i] + `</a>
                                    </div>
                                    </div>
                                    <div class="block_emoji">
                                    <img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
                                    </div>
                                    <div class="v_chat_select2 v_chat_select3">
                                    <div class="v_more_chat">
                                    <img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
                                    <div class="v_chat_custom">
                                    <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
                                    <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
                                    <div class="v_chat_custom_div">Chuyển tiếp</div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>`;
                                } else {
                                    arr_image.push(path_file[i]);
                                }
                            }

                            if (arr_image.length == 1) {
                                html_detail = html_detail + `<div class="v_content_box_div_file">
                                <div class="v_you_mess_cont_detail">
                                <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
                                <div class="v_content_box_div_file">
                                <img class="v_first_box_img" src="` + arr_image[0] + `" alt="Ảnh lỗi">
                                </div>
                                <div class="block_emoji">
                                <img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
                                </div>
                                <div class="v_chat_select2 v_chat_select3">
                                <div class="v_more_chat">
                                <img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
                                <div class="v_chat_custom">
                                <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
                                <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
                                <div class="v_chat_custom_div">Chuyển tiếp</div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>`;
                            } else {
                                if (arr_image.length == 2 || arr_image.length == 3) {
                                    var html_img = "";
                                    for (var i = 0; i < arr_image.length; i++) {
                                        if (i < 2) {
                                            html_img = html_img + `<img class="more_box_second_img" src="` + arr_image[i] + `" alt="Ảnh lỗi">`;
                                        } else {
                                            html_img = html_img + `<div class="v_more_box_img2">+1</div>`;
                                        }
                                    }
                                    html_detail = html_detail + `<div class="v_content_box_div_file v_content_box_div_file2">
                                    <div class="v_you_mess_cont_detail">
                                    <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
                                    <div class="v_content_box_div_file v_content_box_div_file2">
                                    ` + html_img + `
                                    </div>
                                    <div class="block_emoji">
                                    <img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
                                    </div>
                                    <div class="v_chat_select2 v_chat_select3">
                                    <div class="v_more_chat">
                                    <img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
                                    <div class="v_chat_custom">
                                    <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
                                    <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
                                    <div class="v_chat_custom_div">Chuyển tiếp</div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>`;
                                } else if (arr_image.length >= 4) {
                                    var html_img = "";
                                    for (let i = 0; i < arr_image.length; i++) {
                                        if (i < 4) {
                                            var url_file = arr_image[i];
                                            html_img = html_img + `<img class="more_box_four_img" src="` + url_file + `" alt="Ảnh lỗi">`;
                                        } else {
                                            html_img = html_img + `<div class="v_more_box_img">+` + (arr_image.length - 1) + `</div>`;
                                            break;
                                        }
                                    }
                                    html_detail = html_detail + `<div class="v_content_box_div_file v_content_box_div_file4">
                                    <div class="v_you_mess_cont_detail">
                                    <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
                                    <div class="v_content_box_div_file v_content_box_div_file4">
                                    ` + html_img + `
                                    </div>
                                    <div class="block_emoji">
                                    <img class="v_icon_icon2" src="../img/icon_icon.png" alt="Ảnh lỗi" onclick="drop_emoji(this)">
                                    </div>
                                    <div class="v_chat_select2 v_chat_select3">
                                    <div class="v_more_chat">
                                    <img src="../img/v_more_chat.svg" class="v_more_chat_img v_more_chat_img2" alt="v_more_chat.svg" onclick="more_chat_img(this)">
                                    <div class="v_chat_custom">
                                    <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
                                    <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
                                    <div class="v_chat_custom_div">Chuyển tiếp</div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>`;
                                }
                            }

                        }
                        var html = "";
                        html = html + `<div class="v_content_box_chat_you v_content_box_chat2" data-chat_id="` + mess.chat_id + `">
                        <div class="v_list_drop_emoji" style="display: none;">
                        <img class="v_list_drop_emoji_img" src="../img/v_drop_heart.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                        <img class="v_list_drop_emoji_img" src="../img/v_drop_heart_haha.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                        <img class="v_list_drop_emoji_img" src="../img/v_drop_cry.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                        <img class="v_list_drop_emoji_img" src="../img/v_drop_angry.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                        <img class="v_list_drop_emoji_img" src="../img/v_drop_like.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                        <img class="v_list_drop_emoji_img" src="../img/v_drop_dislike.svg" alt="v_drop_heart.svg" onclick="v_drop_emoji(this)">
                        </div>
                        <div class="v_you_avt">
                        <img class="v_you_avt_detail" src="` + data.ava + `" alt="Ảnh lỗi">
                        </div>
                        <div class="v_you_mess_content">
                        <p class="v_content_box_chat_you_text">` + data.username + `, ` + data.time_chat + ` </p>
                        ` + html_detail + `
                        </div>
                        </div>`;
                        $('.v_content_box_chat').append(html);
                        $('.v_content_box_chat').animate({ scrollTop: $('.v_content_box_chat').get(0).scrollHeight }, 0);
                    }
                }
            }
        });
    });
    $('.v_chat_img').click(function () {
        $(this).parents('.v_box_chat_send').find('.v_upload_file2').click();
    });

    $('.v_chat_file').click(function () {
        $(this).parents('.v_box_chat_send').find('.v_upload_file2').prop('accept', '');
        $(this).parents('.v_box_chat_send').find('.v_upload_file2').click();
    });

    $('.v_box_chat_send .v_upload_file2').change(function () {
        window.arr_file = [];
        arr_file.push(...$(this).prop('files'));
        upload_img_chat();
        var html = `<div class="v_box_chat_send_file">
                <div class="v_box_chat_send_file_div">`;
        html = html + `
                <button type="button" class="v_chat_picture2 v_chat_picture_btn" onclick="v_upload_file3(this)">
                <img class="v_chat_picture_btn_img" src="../img/v_add_picture_add.svg" alt="Ảnh lỗi">
                </button>
                </div>
                </div>`;
        $('.v_box_chat_send').find('.v_box_chat_send_div').prepend(html);

        for (var i = $(this).prop('files').length - 1; i >= 0; i--) {
            check_image($(this).prop('files')[i]);
        }
    });

    $('.v_box_chat_send .v_upload_file3').change(function () {
        arr_file.push(...$(this).prop('files'));
        for (let i = 0; i < $(this).prop('files').length; i++) {
            check_image2($(this).prop('files')[i]);
        }
    });

    $(document).mouseup(function (e) {
        var container = $('.v_chat_custom');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }

        var container2 = $('.v_more_chat');

        if (!container2.is(e.target) && container2.has(e.target).length === 0) {
            container2.hide();
        }
    });

    $('.v_box_chat_send_input').keyup(function () {
        var mess = $.trim($(this).val());
        if (mess != "") {
            $(this).parents(".v_box_chat_send").find('.v_box_chat_send_input').css({
                'width': '290px'
            });
            $(this).parents(".v_box_chat_send").find('.v_box_chat_send_select_img').hide();
            $(this).parents(".v_box_chat_send").find('.v_box_chat_send_btn').show();
        } else {
            if ($('.v_box_chat_send_file').length == 0) {
                if ($('.v_box_chat_send').find('.v_box_quote').length == 0) {
                    reset_img_chat();
                }
            } else {
                upload_img_chat();
            }
        }
    });

    $('.v_off_popup_chat').click(function () {
        $('.v_popup_chat').hide();
    });

    $('.v_popup_chat_active').click(function () {
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });
        $('.v_popup_chat_active2').css({
            'color': '#999999',
            'borderBottom': 'none'
        });
        $('.v_mess_conversation').show();
        $('.v_directory').hide();
    });

    $('.v_popup_chat_active2').click(function () {
        $('.mb_notify_chat').remove();
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });
        $('.v_popup_chat_active').css({
            'color': '#999999',
            'borderBottom': 'none'
        });
        $('.v_mess_conversation').hide();
        $('.v_directory').show();
    });

    //End: chat
});

//Start: Chat
function get_Cookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

const uid = get_Cookie('user');
const uid_type = get_Cookie('role');
const data_ol = { uid, uid_type };
socket.emit('cds_getOnline', data_ol);
var v_user_directory = $('.v_user_directory');

socket.on('cds_onlineUser', (candidate) => {
    var time_now = Math.floor(Date.now() / 1000);
    var last_check = $('body').attr('data-check');
    // console.log(candidate);
    if (typeof last_check !== 'undefined' && last_check !== false) {
    } else {
        $('body').attr('data-check', time_now);
        var last_check = $('body').attr('data-check');
    }

    if (time_now - last_check > 100 || time_now == last_check) {
        var ol_user = candidate.map(a => a.uid);
        var list_ep = $.trim($('#list_ep').html());
        const obj = JSON.parse(list_ep);

        var html = '';
        $.each(obj, function (index, item) {
            if (ol_user.includes(item.ep_id)) {
                item.online = 1;
            }
        });

        obj.sort(function (a, b) {
            return b.online - a.online;
        });

        $.each(obj, function (index, item) {
            var stt_online = (item.online) ? "m_online" : "";
            html += `
                <div class="v_user_chat v_user_directory `+ stt_online + `" data-id_user="` + item.ep_id + `" data-user_type="2">
                    <div class="v_user_chat_avatar">
                        <img class="v_img_avatar_chat" src="../img/v_avatar_user_chat.png" alt="Ảnh lỗi">
                        <div class="v_user_online">
                            <div class="v_user_online_detail"></div>
                        </div>
                    </div>
                    <div>
                        <p class="v_chat_user_name v_directory_user_name">`+ item.ep_name + `</p>
                    </div>
                </div>
            `;
        });
        $('.v_detail_user_chat').html(html);
        $('body').attr('data-check', time_now);
    }
})
function see_image(e) {
    var src_image = $(e).attr('src');
    $('.see_detail_image').attr('src', src_image);
    $('.see_image').show();
}

function drop_emoji(e) {
    $(e).parents('.v_content_box_chat2').find('.v_list_drop_emoji').toggle();
}

function v_drop_emoji(e) {
    var emoji = $(e).attr('src');
    var el = $(e).parents('.v_content_box_chat2');
    if (el.find('.v_drop_feel').length == 0) {
        var html = `<div class="v_drop_feel">
        <img class="v_drop_feel_detail" src="` + emoji + `" alt="Ảnh lỗi">
        </div>`;
        el.find('.v_content_box_div2').append(html);
    } else {
        el.find('.v_drop_feel').find('.v_drop_feel_detail').attr('src', emoji);
    }

    el.find('.v_list_drop_emoji').hide();
}

function v_del_mess(e) {
    $(e).parents('.v_content_box_chat_me').remove();
}

function copy_text(e) {
    var text_copy = $.trim($(e).parents('.v_block_content_mess').find('.v_content_box_div').text());
    var temp = $("<input>");
    $(e).append(temp);
    temp.val(text_copy).select();
    document.execCommand("copy");
    temp.remove();
    $(e).parents('.v_chat_custom').hide();
    $('.success_copy').fadeIn();
    setTimeout(function () {
        $('.success_copy').fadeOut();
    }, 1500);
}

function v_qoute(e) {
    chat_id = $(e).parents('.v_content_box_div_file').data('chat_id');
    var el_parents = $(e).parents('.v_content_box_chat_me').length;
    if (el_parents == 0) {
        var name_tag = $('.v_box_chat_header_name').text().trim();
    } else {
        var name_tag = $('.nv-name-p').text().trim();
    }
    var el = $(e).parents('.v_block_content_mess');
    var text = el.find('.v_content_quote_box').text();
    $(e).parents('.v_chat_custom').hide();
    html = `<div class="v_box_quote">
    <img class="cancel_quote" onclick="cancel_quote(this)" src="../img/cancel_quote.svg" alt="cancel_quote.svg">
    <div class="v_loading_quote">Đang trả lời <span class="v_quote_name">` + name_tag + `</span></div>
    <div class="v_loading_quote v_loading_quote1">` + text + `</div>
    </div>`;
    $('.v_box_chat_send').prepend(html);
    upload_quote();
}

function cancel_quote(e) {
    $(e).parents('.v_box_quote').hide();

}

function list_see_image_de(e) {
    var src_image = $(e).attr('src');
    $('.see_detail_image').attr('src', src_image);
}

function upload_img_chat() {
    $('.v_box_chat_send').css({
        'height': '149px'
    });

    $('.v_content_box_chat').css({
        'height': '261px'
    });

    $('.v_box_chat_send_select_img').hide();
    $('.v_box_chat_send_btn').show();

    $('.v_box_chat_send_btn').css({
        'top': '70%',
        'transform': 'translateY(0)'

    })

    $('.v_box_chat_send_input').css({
        'width': '290px'
    })

    $('.v_box_chat_send_div').css({
        'width': '290px',
        'height': '124px'
    })

    $('.v_box_chat_send_input').css({
        'borderRadius': '0 0 15px 15px',
        'top': '0',
        'transform': 'translateY(0)'
    });

    $('.v_box_chat_send_icon').css({
        'top': 'auto',
        'bottom': '10px',
        'transform': 'translateY(0)'
    });

    $('.v_content_box_chat').animate({ scrollTop: $('.v_content_box_chat').get(0).scrollHeight }, 0);
}

function reset_img_chat() {
    $('.v_box_chat_send_file').remove();
    if ($('.v_box_quote').length == 1) {
        upload_quote();
    } else if ($('.v_box_quote').length == 0) {
        $('.v_box_chat_send').css({
            'height': '58px'
        });

        $('.v_content_box_chat').css({
            'height': '350px'
        });

        if ($.trim($('.v_box_chat_send_input').val()) == "") {
            $('.v_box_chat_send_select_img').show();
            $('.v_box_chat_send_btn').hide();
            $('.v_box_chat_send_input').css({
                'width': '189px'
            })
            $('.v_box_chat_send_div').css({
                'width': '189px'
            });
        } else {
            $('.v_box_chat_send_select_img').hide();
            $('.v_box_chat_send_btn').show();
            $('.v_box_chat_send_input').css({
                'width': '290px'
            });
            $('.v_box_chat_send_div').css({
                'width': '290px'
            });
        }

        $('.v_box_chat_send_div').css({
            'height': '36px'
        });
        $('.v_box_chat_send_btn').css({
            'top': '50%',
            'transform': 'translateY(-50%)'

        })

        $('.v_box_chat_send_input').css({
            'borderRadius': '50px',
            'top': '50%',
            'transform': 'translateY(-50%)'
        });

        $('.v_box_chat_send_icon').css({
            'top': '50%',
            'bottom': 'auto',
            'transform': 'translateY(-50%)'
        });
    }

    $('.v_content_box_chat').animate({ scrollTop: $('.v_content_box_chat').get(0).scrollHeight }, 0);
}

function upload_quote() {
    if ($('.v_box_chat_send_div').find('.v_box_chat_send_file').length == 0) {
        $('.v_box_chat_send').css({
            'height': '118px',
            'flex-wrap': 'wrap'
        });

        $('.v_box_chat_send_btn').css({
            'display': 'block',
            'top': '62%',
            'transform': 'translateY(0)'
        });

        $('.v_content_box_chat').css({
            'height': '292px'
        });

        $('.v_box_chat_send_input').css({
            'borderRadius': '50px'
        });

        $('.v_box_chat_send_div').css({
            'top': '0',
            'transform': 'translateY(0px)',
            'width': '189px',
            'height': '36px'
        });

        $('.v_box_chat_send_icon').css({
            'top': '50%',
            'bottom': 'auto',
            'transform': 'translateY(-50%)',
        })
    } else {
        $('.v_box_chat_send').css({
            'height': '220px',
            'flex-wrap': 'wrap'
        });

        $('.v_content_box_chat').css({
            'height': '208px'
        });

        $('.v_box_chat_send_btn').css({
            'display': 'block',
            'top': '75%',
            'transform': 'translateY(-50%)'
        });
    }

    $('.v_box_chat_send_div').css({
        'top': '0',
        'transform': 'translateY(0)'
    });

    $('.v_box_chat_send_select_img').hide();

    $('.v_box_chat_send_input').css({
        'width': '290px'
    })

    $('.v_content_box_chat').animate({ scrollTop: $('.v_content_box_chat').get(0).scrollHeight }, 0);
}

function reset_upload_quote() {
    $('.v_box_quote').remove();
    $('.v_box_chat_send').css({
        'height': '58px',
        'flex-wrap': 'nowrap'
    });

    $('.v_content_box_chat').css({
        'height': '350px'
    });

    $('.v_box_chat_send_div').css({
        'top': '50%',
        'transform': 'translateY(-50%)'
    });

    $('.v_box_chat_send_btn').css({
        'top': '50%',
        'transform': 'translateY(-50%)'
    });

    if ($.trim($('.v_box_chat_send_input').val()) == "") {
        $('.v_box_chat_send_select_img').show();
        $('.v_box_chat_send_btn').hide();
        $('.v_box_chat_send_input').css({
            'width': '189px'
        });
    } else {
        $('.v_box_chat_send_select_img').hide();
        $('.v_box_chat_send_btn').show();
    }

    $('.v_content_box_chat').animate({ scrollTop: $('.v_content_box_chat').get(0).scrollHeight }, 0);
}

function cancel_quote(e) {
    if ($('.v_box_chat_send_div').find('.v_box_chat_send_file').length == 0) {
        reset_upload_quote();
    } else {
        $(".v_box_quote").remove();
        $('.v_box_chat_send').css({
            'height': '149px'
        });
        $('.v_content_box_chat').css({
            'height': '261px'
        });
        $('.v_box_chat_send_div').css({
            'top': '50%',
            'transform': 'translateY(-50%)'
        });
        $('.v_box_chat_send_btn').css({
            'top': '80%'
        });
    }
}

function check_image(file_img) {
    var type_img = ["png", "jpg", "jpeg", "svg+xml"];
    var type = file_img.type.split("/");
    var check = type_img.includes(type[1]);
    var reader = new FileReader();
    reader.onload = function (e) {
        var imageUrl = e.target.result;
        if (check === true) {
            $('.v_box_chat_send').find('.v_box_chat_send_file_div').prepend(`<div class="v_chat_picture">
                <img class="v_chat_picture_detail" src="` + imageUrl + `" alt="Ảnh lõi">
                <img class="v_del_chat_picture" onclick="del_chat_picture(this)" src="../img/v_del_chat_picture.svg" alt="Ảnh lỗi">
                </div>`);
        } else {
            $('.v_box_chat_send').find('.v_box_chat_send_file_div').prepend(`<div class="v_chat_picture_file v_chat_picture">
                <img src="../img/v_chat_picture_file.png" alt="Ảnh lỗi">
                <span class="v_chat_p_f_span">` + file_img.name + `</span>
                <img class="v_del_chat_picture" onclick="del_chat_picture(this)" src="../img/v_del_chat_picture.svg" alt="Ảnh lỗi">
                </div>`);
        }
    }
    reader.readAsDataURL(file_img);
}

function check_image2(file_img) {
    var type_img = ["png", "jpg", "jpeg", "svg+xml"];
    var type = file_img.type.split("/");
    var check = type_img.includes(type[1]);
    var reader = new FileReader();
    reader.onload = function (e) {
        var imageUrl = e.target.result;
        if (check === true) {
            $('.v_box_chat_send').find('.v_chat_picture_btn').before(`<div class="v_chat_picture">
                <img class="v_chat_picture_detail" src="` + imageUrl + `" alt="Ảnh lõi">
                <img class="v_del_chat_picture" onclick="del_chat_picture(this)" src="../img/v_del_chat_picture.svg" alt="Ảnh lỗi">
                </div>`);
        } else {
            $('.v_box_chat_send').find('.v_chat_picture_btn').before(`<div class="v_chat_picture_file v_chat_picture">
                <img src="../img/v_chat_picture_file.png" alt="Ảnh lỗi">
                <span class="v_chat_p_f_span">` + file_img.name + `</span>
                <img class="v_del_chat_picture" onclick="del_chat_picture(this)" src="../img/v_del_chat_picture.svg" alt="Ảnh lỗi">
                </div>`);
        }
    }
    reader.readAsDataURL(file_img);
}

function del_chat_picture(e) {
    var index = $(e).parents('.v_chat_picture').index();
    arr_file.splice(index, 1);
    if ($('.v_chat_picture').length == 1) {
        reset_img_chat();
        $(e).parents('.v_box_chat_send_file').remove();
    } else {
        $(e).parent('.v_chat_picture').remove();
    }
}

function cancel_box_chat(e) {
    $(e).parents('.v_box_chat').hide();
}

function box_chat_over(e) {
    $(e).find('.v_chat_select2').find('.v_more_chat').show();
}

function box_chat_out(e) {
    if ($(e).find('.v_chat_custom').css('display') == 'none') {
        $(e).find('.v_chat_select2').find('.v_more_chat').css({
            'display': 'none'
        });
    }
}

function more_chat_img(e) {
    $(e).parents('.v_more_chat').find('.v_chat_custom').toggle();
}

function v_upload_file3(e) {
    $(".v_upload_file3").click();
}

//có nôi dung tin nhăn
function send_mess(obj_data, data) {
    var html = "";
    if ($('.v_box_chat_send').find('.v_box_quote').length > 0) {
        var quote = $('.v_box_chat_send').find('.v_box_quote').find('.v_loading_quote1').text();
        html = html + `<div class="v_content_box_chat_me v_content_box_chat2">
        <p class="v_content_box_chat_me_text">` + obj_data.time_chat + `</p>
        <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
        <div class="v_chat_select2">
        <div class="v_more_chat">
        <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
        <div class="v_chat_custom">
        <div class="v_chat_custom_div">Chỉnh sửa</div>
        <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
        <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
        <div class="v_chat_custom_div">Chuyển tiếp</div>
        <div onclick="v_del_mess(this)" class="v_chat_custom_div">Xóa</div>
        </div>
        </div>
        </div>
        <div>
        <div class="v_block_icon_chuyentiep">
        <img class="v_icon_chuyentiep" src="../img/v_icon_chuyentiep.svg" alt="Ảnh lỗi">
        Bạn đã trả lời Mipan
        </div>
        <div class="v_quote_box2">
        <div class="v_quote_mess_you">` + quote + `</div>
        <div class="v_content_quote_box v_mess_box">` + obj_data.mess + `</div>
        </div>
        
        </div>
        </div>
        </div>`;
    } else {
        html = html + `<div class="v_content_box_chat_me v_content_box_chat2" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
        <p class="v_content_box_chat_me_text">` + obj_data.time_chat + `</p>
        <div class="v_block_content_mess">
        <div class="v_chat_select2">
        <div class="v_more_chat">
        <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
        <div class="v_chat_custom">
        <div class="v_chat_custom_div">Chỉnh sửa</div>
        <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
        <div class="v_chat_custom_div" data-chat_id="` + data.id + `" onclick="v_qoute(this)">Trả lời</div>
        <div class="v_chat_custom_div">Chuyển tiếp</div>
        <div class="v_chat_custom_div">Xóa</div>
        </div>
        </div>
        </div>
        <div class="v_content_box_div v_content_quote_box">` + obj_data.mess + `</div>
        </div>
        </div>`;
    }
    $(this).find('.v_box_chat_send_input').val('');
    return html;
}

// //Không có nôi dung tin nhắn
// function send_mess_no_content(time_chat) {
//     var html = "";
//     if ($('.v_box_chat_send').find('.v_box_quote').length > 0) {
//         var quote = $('.v_box_chat_send').find('.v_box_quote').find('.v_loading_quote1').text();
//         html = html + `<div class="v_content_box_chat_me v_content_box_chat2">
//         <p class="v_content_box_chat_me_text">14:30</p>
//         <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
//         <div class="v_chat_select2">
//         <div class="v_more_chat">
//         <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
//         <div class="v_chat_custom">
//         <div class="v_chat_custom_div">Chỉnh sửa</div>
//         <div class="v_chat_custom_div" onclick="copy_text(this)">Sao chép</div>
//         <div class="v_chat_custom_div" onclick="v_qoute(this)">Trả lời</div>
//         <div class="v_chat_custom_div">Chuyển tiếp</div>
//         <div onclick="v_del_mess(this)" class="v_chat_custom_div">Xóa</div>
//         </div>
//         </div>
//         </div>
//         <div>
//         <div class="v_block_icon_chuyentiep">
//         <img class="v_icon_chuyentiep" src="../img/v_icon_chuyentiep.svg" alt="Ảnh lỗi">
//         Bạn đã trả lời Mipan
//         </div>
//         <div class="v_quote_box2">
//         <div class="v_quote_mess_you" style="border-bottom: none">` + quote + `</div>
//         </div>

//         </div>
//         </div>
//         </div>`;
//     }
//     return html;
// }

//Gửi file
function send_mess_file(data) {
    var html = "";
    var chat = data.file.split('||');
    var time_chat = data.created_at;
    if (chat.length == 1) {
        if (chat.find('.v_chat_picture_detail').length == 1) {
            html = html + `<div class="v_content_box_chat_me v_content_box_chat2" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
            <p class="v_content_box_chat_me_text">` + time_chat + `</p>
            <div class="v_block_content_mess">
            <div class="v_chat_select2">
            <div class="v_more_chat">
            <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
            <div class="v_chat_custom">
            <div class="v_chat_custom_div">Chỉnh sửa</div>
            <div class="v_chat_custom_div">Chuyển tiếp</div>
            <div class="v_chat_custom_div">Xóa</div>
            </div>
            </div>
            </div>
            <div class="v_content_box_div_file"><img class="v_first_box_img" src="` + chat[0] + `" alt="Ảnh lỗi"></div>
            </div>
            </div>`;
        } else {
            var name_file = $('.v_chat_picture').find('.v_chat_p_f_span').text();

            html = html + `<div class="v_content_box_chat_me v_content_box_chat2">
            <p class="v_content_box_chat_me_text">` + time_chat + `</p>
            <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
            <div class="v_chat_select2">
            <div class="v_more_chat">
            <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
            <div class="v_chat_custom">
            <div class="v_chat_custom_div">Chỉnh sửa</div>
            <div class="v_chat_custom_div">Chuyển tiếp</div>
            <div class="v_chat_custom_div">Xóa</div>
            </div>
            </div>
            </div>
            <div class="v_content_box_div_file v_content_box_div_file3">
            <div class="v_box_file_detail">
            <img src="../img/v_chat_picture_file.png" alt="Ảnh lỗi">
            <span class="v_box_file_detail_span">` + name_file + `</span>
            </div>
            </div>
            </div>
            </div>`;
        }
    } else {
        var arr_img = [];
        var arr_file = [];
        for (let i = 0; i < chat.length; i++) {
            if (chat.eq(i).find('.v_chat_picture_detail').length == 1) {
                arr_img.push(chat.eq(i).find('.v_chat_picture_detail').attr('src'));
            } else {
                arr_file.push(chat.eq(i).find('.v_chat_p_f_span').text());
            }
        }

        //1 Ảnh
        if (arr_img.length == 1) {
            var url_file = arr_img[0];
            html = html + `<div class="v_content_box_chat_me v_content_box_chat2" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
            <p class="v_content_box_chat_me_text">` + time_chat + `</p>
            <div class="v_block_content_mess">
            <div class="v_chat_select2">
            <div class="v_more_chat">
            <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
            <div class="v_chat_custom">
            <div class="v_chat_custom_div">Chỉnh sửa</div>
            <div class="v_chat_custom_div">Sao chép</div>
            <div class="v_chat_custom_div">Chuyển tiếp</div>
            <div class="v_chat_custom_div">Xóa</div>
            </div>
            </div>
            </div>
            <div class="v_content_box_div_file"><img class="v_first_box_img" src="` + url_file + `" alt="Ảnh lỗi"></div>
            </div>
            </div>`;
        } else if (arr_img.length >= 2 && arr_img.length <= 3) {
            //2,3 Ảnh
            var html_img = '';
            for (let i = 0; i < arr_img.length; i++) {
                if (i < 2) {
                    var url_file = arr_img[i];
                    html_img = html_img + `<img class="more_box_second_img" src="` + url_file + `" alt="Ảnh lỗi">`;
                } else {
                    html_img = html_img + `<div class="v_more_box_img2">+1</div>`;
                }
            }
            html = html + `<div class="v_content_box_chat_me v_content_box_chat2">
            <p class="v_content_box_chat_me_text">` + time_chat + `</p>
            <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
            <div class="v_chat_select2">
            <div class="v_more_chat">
            <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
            <div class="v_chat_custom">
            <div class="v_chat_custom_div">Chỉnh sửa</div>
            <div class="v_chat_custom_div">Chuyển tiếp</div>
            <div class="v_chat_custom_div">Xóa</div>
            </div>
            </div>
            </div>
            <div class="v_content_box_div_file v_content_box_div_file2">
            ` + html_img + `
            </div>
            </div>
            </div>`;
        } else if (arr_img.length >= 4) {
            // Lớn hơn 4 ảnh
            var html_img = '';
            for (let i = 0; i < arr_img.length; i++) {
                if (i < 4) {
                    var url_file = arr_img[i];
                    html_img = html_img + `<img class="more_box_four_img" src="` + url_file + `" alt="Ảnh lỗi">`;
                } else {
                    html_img = html_img + `<div class="v_more_box_img">+` + (arr_img.length - 4) + `</div>`;
                    break;
                }
            }
            html = html + `<div class="v_content_box_chat_me v_content_box_chat2">
            <p class="v_content_box_chat_me_text">14:30</p>
            <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
            <div class="v_chat_select2">
            <div class="v_more_chat">
            <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
            <div class="v_chat_custom">
            <div class="v_chat_custom_div">Chỉnh sửa</div>
            <div class="v_chat_custom_div">Chuyển tiếp</div>
            <div class="v_chat_custom_div">Xóa</div>
            </div>
            </div>
            </div>
            <!-- <div class="v_content_box_div">Xin chào</div> -->
            <div class="v_content_box_div_file v_content_box_div_file4">
            ` + html_img + `
            </div>
            </div>
            </div>`;
        }


        for (let i = 0; i < arr_file.length; i++) {
            html = html + `<div class="v_content_box_chat_me v_content_box_chat2">
            <p class="v_content_box_chat_me_text">14:30</p>
            <div class="v_block_content_mess" onmouseover="box_chat_over(this)" onmouseout="box_chat_out(this)">
            <div class="v_chat_select2">
            <div class="v_more_chat">
            <img src="../img/v_more_chat.svg" class="v_more_chat_img" onclick="more_chat_img(this)" alt="v_more_chat.svg">
            <div class="v_chat_custom">
            <div class="v_chat_custom_div">Chỉnh sửa</div>
            <div class="v_chat_custom_div">Chuyển tiếp</div>
            <div class="v_chat_custom_div">Xóa</div>
            </div>
            </div>
            </div>
            <!-- <div class="v_content_box_div">Xin chào</div> -->
            <div class="v_content_box_div_file v_content_box_div_file3">
            <div class="v_box_file_detail">
            <img src="../img/v_chat_picture_file.png" alt="Ảnh lỗi">
            <span class="v_box_file_detail_span">` + arr_file[i] + `</span>
            </div>
            </div>
            </div>
            </div>`;
        }
    }
    return html;
}

//End: Chat
//End: Chat
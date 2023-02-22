function like_wr(id_working_rules) {
    $.ajax({
        url: '../ajax/like_wr.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id_working_rules: id_working_rules
        },
        success: function(data) {
            if (data.result == true) {
                $('#like_wr' + id_working_rules).attr('src', '../img/v_like_post.svg');
                $('#text_like_wr' + id_working_rules).css('color', '#4C5BD4');
            } else if (data.result == false) {
                $('#like_wr' + id_working_rules).attr('src', '../img/like_t.png');
                $('#text_like_wr' + id_working_rules).css('color', '#666666');
            }
            $('#number_like' + id_working_rules).html(data.count);
            // element.parents(".v_active_duoi").prev().find('.so-like').text(data.count);
        }
    });
}


function focus_comment(id) {
    $('#comment1' + id).focus();
}

function focus_comment_wr(id) {
    if ($('#form_comment' + id).css('display') == 'none') {
        $('#form_comment' + id).css({
            'display': 'flex'
        });
        $('#comment' + id).focus();
    } else {
        $('#form_comment' + id).css({
            'display': 'none'
        });
        $('#form_comment' + id)[0].dataset.type = 0;
        var new_id = $('#form_comment' + id).find('.v_id_rep_comment_wr').val();
        $('#form_comment' + id)[0].dataset.new_id = new_id;
        $('#form_comment' + id).find('.see_icon').show();
        $('#form_comment' + id).find('.see_icon1').show();
        $('#form_comment' + id).find('.nut_gui_comment').hide();
        $('#form_comment' + id).find('.rep_cmt').val('');
    }
}

var arr_img = [];

function changeImg(input, id) {
    if (input.files && input.files[0]) {
        $(input).parents('.v_comment_active').find('.see_icon').hide();
        $(input).parents('.v_comment_active').find('.see_icon1').hide();
        $(input).parents('.v_comment_active').find('.nut_gui_comment').show();
        arr_img = [];
        arr_img.push(input.files[0]);
        $('#render_img').remove();
        $('#form_comment1' + id).append(`
            <div class="render_img" id="render_img">
            <img src=" " class="render_img_item1" id="avatar` + id + `" alt="Ảnh lỗi">
            <div class="img_close" onclick="close_img(` + id + `,this);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatar' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
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


function comment_wr(e) {
    var type = $(e).attr('data-type');
    var form_data = new FormData();
    var url = (type == 0) ? "../ajax/comment_wr_post.php" : "../ajax/comment_wr_post_edit.php";
    var element = $(e);
    var comment = $(e).find('.v_write_comment').val();


    var new_id = $(e).data('new_id');
    if (type == 1) {
        var avatar = $('#avatar' + new_id).attr('src');
    }
    form_data.append('comment', comment);
    form_data.append('avatar', avatar);
    form_data.append('new_id', new_id);
    form_data.append('img_comment[]', arr_img[0]);
    if (comment != "" || arr_img.length > 0) {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function(data) {
                $(e).find('.see_icon').show();
                $(e).find('.see_icon1').show();
                $(e).find('.nut_gui_comment').hide();
                $(e).find('.v_write_comment').val('');
                if (type == 0) {
                    var new_id = $(e)[0].dataset.new_id;
                    $(e).parents('.nguyentaclamviec').find('.v_count_comment').text(data.comment_count + "  Bình luận");
                    html = `<div class="xembinhluan"> <div class="avt avt-cmt"><img src = "` + data.html.avatar + `"> </div>
                    <div class="binhluan">
                    <div class="container">
                    <div class="header-cmt">
                    <div class="name-cmt">
                    <p>` + data.html.name + `</p>
                    </div> 
                    <div class = "edit-cmt" onclick="option_cmt(this);" >
                    <img src = "../img/bacham.png">
                    <div class = "popup-chinhsua-cmt">
                    <div class = "ul_model" >
                    <div class = "li_model" onclick="update_comment(` + data.html.id + `,` + new_id + `,0)">
                        <img src = "../img/chinh_sua_.png" alt = "Ảnh lỗi">
                    <p class = "p_model" > Chỉnh sửa bình luận</p> 
                    </div> <div data-id="` + data.html.id + `" onclick="del_comment_wr(this,0)" class = "li_model nut-xoa-baiviet">
                    <img src = "../img/icon_xoa.png" alt = "Ảnh lỗi">
                    <p class = "p_model" > Xóa bình luận
                    </p> </div> </div> </div> </div> </div> <div class = "body-cmt">
                    <div class = "cmt"  id="text_comment` + data.html.id + `" tabindex="-1" data-value="` + data.html.comment + `">
                    <p>` + data.html.comment + ` </p> </div> </div> </div>`;
                    if (data.html.img != '') {
                        html += `<div class="image_comment"  id="image_comment` + data.html.id + `">
                        <img src="` + data.html.img + `" id="img_cmt` + data.html.id + `" alt="image comment">
                    </div>`;
                    }
                    html += `<div class = "reach-cmt" id="react_cmt` + data.html.id + `" >
                    <p class = "v_like_post2" onclick = "like_comment_wr(this)" data-id = "` + data.html.id + `" > Thích </p>
                     <p class = "trl-binhluan" onclick="focus_comment_wr(` + data.html.id + `);"> Trả lời</p> <p id='time` + data.html.id + `'> ` + data.html.time_active + ` </p> </div>
                      <div class="cmt-binhluan">
                      <div id="cmt-binhluan` + data.html.id + `"></div>
                      <form class="container-cmt" data-type="0" id="form_comment` + data.html.id + `" data-cmt_id="` + data.html.id + `" data-new_id="` + new_id + `" onsubmit="return rep_comment_wr(this);">
                      <div class="img avt"> <img src="` + data.html.avatar + `" class="v_avt_reply_comment">
                      </div>
                      <div class="cont"> <input type="text" class="rep_cmt" id="comment` + data.html.id + `" name="" onkeyup="rep_cmt_wr(this)" placeholder="Viết bình luận...">
                          <span class="see_icon"></span>
                          <label class="see_icon1">
                              <input type="file" onchange="show_img_rep_comment(this,` + data.html.id + `)" id="rep_comment` + data.html.id + `" accept="image/*" style="display: none;" />
                          </label>
                          <button class="nut_gui_comment rep_comment" id="rep_comment` + data.html.id + `">
                              <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                          </button>
                      </div>
                    </form>
                    <div id="view_rep_cmt` + data.html.id + `"></div>
                     </div> </div></div>`;
                    element.find('.v_write_comment').val('');
                    $('#render_img').remove();
                    var new_id = $(e)[0].dataset.new_id;
                    $('#xemthem' + new_id).prepend(html);
                    var number = $('#number_comment' + new_id).data('value');
                    $('#number_comment' + new_id).html((number + 1) + ' Bình luận');
                    var input = $('#baiviet_taianh' + new_id);
                    input.replaceWith(input.val('').clone(true));
                } else {
                    $(e)[0].dataset.type = 0;
                    var new_id = $(e)[0].dataset.new_id;
                    var input = $('#baiviet_taianh' + data.id_new);
                    input.replaceWith(input.val('').clone(true));
                    $('#text_comment' + new_id).html('<p>' + comment + '</p>');
                    $('#text_comment' + new_id).focus();
                    $('#text_comment' + new_id).attr('data-value', comment);
                    $('#comment' + data.id_new).val('');
                    $('#form_comment' + data.id_new).attr('data-type', 0);
                    $('#form_comment' + data.id_new).attr('data-new_id', data.id_new);
                    $('#render_img').remove();
                    $('#image_comment' + new_id).remove();
                    $('#img_cmt' + new_id).remove();
                    if (data.img != '') {
                        $('#react_cmt' + new_id).before(`<div class="image_comment" id="image_comment` + new_id + `">
                        <img src="` + data.img + `" id="img_cmt` + new_id + `" alt="image comment">
                        </div>`);
                    }

                    var new_id = $(e).find('.v_new_id_comment').val();
                    $(e)[0].dataset.new_id = new_id;
                }
                arr_img = [];
            }
        });
    }
    return false;
}

function show_comment(new_id) {
    var data = new FormData();
    var page = $('.hide_comment' + new_id);
    data.append('new_id', new_id);
    data.append('page', page.length);
    $.ajax({
        url: '../ajax/list_comment_wr.php',
        type: 'POST',
        dataType: 'json',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        success: function(responsive) {
            if (responsive.result == true) {
                if (responsive.data.length == 0) {
                    $('#thugon-binhluan' + new_id).css('display', 'block');
                    $('#xem-binhluan' + new_id).css('display', 'none');
                }
                for (let i = 0; i < responsive.data.length; i++) {
                    html = ` <div class="xembinhluan hide_comment` + new_id + ` hide_comment_wr` + new_id + `" ><div class="avt avt-cmt"> <img src="` + responsive.data[i].avatar_login + `"> </div><div class="binhluan">
                        <div class="container">
                            <div class="header-cmt">
                                <div class="name-cmt">
                                    <p>` + responsive.data[i].name + `</p>
                                </div>
                                <div class="edit-cmt"  onclick="option_cmt(this);">
                                    <img src="../img/bacham.png">
                                    <div class="popup-chinhsua-cmt">
                                        <div class="ul_model">
                                            <div class="li_model" onclick="update_comment(` + responsive.data[i].id + `,` + new_id + `,0)">
                                                <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                <p class="p_model">Chỉnh sửa bình luận </p>
                                            </div>
                                            <div data-id="` + responsive.data[i].id + `" onclick="del_comment_wr(this,0)" class="li_model nut-xoa-baiviet">
                                                <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                <p class="p_model">Xóa bình luận</p>
                                            </div>
                                        </div>
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
                         <p class = "v_like_post2 ` + responsive.data[i].style_like2 + `" onclick="like_comment_wr(this)" data-id = "` + responsive.data[i].id + `" > Thích </p> 
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


                    html += `<form class="container-cmt"  data-type="0" id="form_comment` + responsive.data[i].id + `" data-cmt_id="` + responsive.data[i].id + `" data-new_id="` + new_id + `" onsubmit="return rep_comment_wr(this);">
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
            } else {
                $('#thugon-binhluan' + new_id).css('display', 'block');
                $('#xem-binhluan' + new_id).css('display', 'none');
                i = 0;
            }
        }
    });
}

function hide_comment(new_id) {
    $('.hide_comment_wr' + new_id).remove();
    i = 0;
}

var img_rep_cmt = [];

function show_img_rep_comment(input, id) {
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
        reader.onload = function(e) {
            $('#avatar' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $(input).parents('.container-cmt').find('.see_icon').hide();
        $(input).parents('.container-cmt').find('.see_icon1').hide();
        $(input).parents('.container-cmt').find('.nut_gui_comment').show();
    }
}

function close_img_rep_cmt(id, e) {
    img_rep_cmt = [];
    var el = $(e).parents('.view_rep_cmt').prev();
    $('#render_img').remove();
    var input = $('#rep_comment' + id);
    input.replaceWith(input.val('').clone(true));
    if (el.find('.rep_cmt').val() == "") {
        el[0].dataset.type = 0;
        el[0].dataset.new_id = el.find('.v_id_rep_comment_wr').val();
        el.find('.see_icon').show();
        el.find('.see_icon1').show();
        el.find('.nut_gui_comment').hide();
    }
}

function rep_comment_wr(e) {
    var form_data = new FormData();
    var element = $(e);
    var comment = $(e).find('.rep_cmt').val();
    var cmt_id = $(e).attr('data-cmt_id');
    var new_id = $(e).attr('data-new_id');
    var type = $(e).attr('data-type');
    var url = (type == 0) ? "../ajax/rep_comment_wr_post.php" : "../ajax/comment_wr_post_edit.php";
    if (type == 1) {
        var avatar = $('#avatar' + new_id).attr('src');
        form_data.append('avatar', avatar);
    }
    form_data.append('comment', comment);
    form_data.append('cmt_id', cmt_id);
    form_data.append('new_id', new_id);
    form_data.append('img_comment[]', img_rep_cmt[0]);
    var data_id = 0;
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
            success: function(data) {
                $(e).find('.see_icon').show();
                $(e).find('.see_icon1').show();
                $(e).find('.nut_gui_comment').hide();
                $(e).hide();
                if (type == 0) {
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
                                        <div data-id="` + data.html.id + `" onclick="del_comment_wr(this,1)" class="li_model nut-xoa-baiviet">
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
                        html += `<div class="image_comment"  id="image_comment` + data.html.id + `">
                            <img src="` + data.html.img + `" id="img_cmt` + data.html.id + `" alt="image comment">
                        </div>`;
                    }
                    html += `
                    <div class="reach-cmt" id="react_cmt` + data.html.id + `">
                            <p class="v_like_post2 " onclick="like_comment_wr(this)" data-id="` + data.html.id + `">Thích</p>
                        <p id='time` + data.html.id + `'>` + data.html.time_active + `</p>
                    </div>
                    </div>
                    </div>`;
                    element.find('.rep_cmt').val('');
                    $('#render_img').remove();
                    var input = $('#rep_comment' + cmt_id);
                    input.replaceWith(input.val('').clone(true));
                    $('#cmt-binhluan' + cmt_id).append(html);
                    var number = $('#number_comment' + new_id).data('value');
                    $('#number_comment' + new_id).html((number + 1) + ' Bình luận');
                } else {
                    $('#text_comment' + new_id).html('<p>' + comment + '</p>');
                    $('#text_comment' + new_id).focus();
                    $('#text_comment' + new_id).attr('data-value', comment);
                    $('#comment' + cmt_id).val('');
                    $('#form_comment' + cmt_id).attr('data-type', 0);
                    $('#form_comment' + cmt_id).attr('data-new_id', data.id_new);
                    $('#render_img').remove();

                    data_id = data.id_new;
                    if (data.img == '') {
                        $('#image_comment' + new_id).remove();
                    } else {
                        $('#image_comment' + new_id).remove();
                        $('#react_cmt' + new_id).before(`<div class="image_comment" id="image_comment` + new_id + `">
                        <img src="` + data.img + `" id="img_cmt` + new_id + `" alt="image comment">
                    </div>`);
                    }
                }
                var input = $('#rep_comment' + cmt_id);
                input.replaceWith(input.val('').clone(true));
                img_rep_cmt = [];
            }
        });
    }
    return false;
}

function show_rep_comment(cmt_id) {
    var data = new FormData();
    var page = $('.hide_rep_comment' + cmt_id);
    data.append('cmt_id', cmt_id);
    data.append('page', page.length);
    $.ajax({
        url: '../ajax/list_rep_comment_wr.php',
        type: 'POST',
        dataType: 'json',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        success: function(responsive) {
            if (responsive.result == true) {
                var dem = 0;
                for (let i = 0; i < responsive.data.length; i++) {
                    html = ` <div class="xembinhluan xembinhluan_con hide_rep_comment` + cmt_id + `">
                    <div class="avt avt-cmt"> <img src="` + responsive.data[i].avatar_login + `"> </div>
                    <div class="binhluan">
                        <div class="container">
                            <div class="header-cmt">
                                <div class="name-cmt">
                                    <p>` + responsive.data[i].name + `</p>
                                </div>
                                <div class="edit-cmt"  onclick="option_cmt(this);">
                                    <img src="../img/bacham.png">
                                    <div class="popup-chinhsua-cmt">
                                        <div class="ul_model">
                                            <div class="li_model" onclick="update_comment(` + responsive.data[i].id + `,` + cmt_id + `,1)">
                                                <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                <p class="p_model">Chỉnh sửa bình luận </p>
                                            </div>
                                            <div data-id="` + responsive.data[i].id + `" onclick="del_comment_wr(this,1)" class="li_model nut-xoa-baiviet">
                                                <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                <p class="p_model">Xóa bình luận</p>
                                            </div>
                                        </div>
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
                            <p class="v_like_post2 ` + responsive.data[i].style_like2 + `" onclick="like_comment_wr(this)" data-id="` + responsive.data[i].id + `">Thích</p>
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
        $('#comment1' + new_id).val(value);
        $('#form_comment1' + new_id).attr('data-type', 1);
        $('#form_comment1' + new_id).find('.see_icon').hide();
        $('#form_comment1' + new_id).find('.see_icon1').hide();
        $('#form_comment1' + new_id).find('.nut_gui_comment').show();
        $('#form_comment1' + new_id).attr('data-new_id', id);
        $('#comment1' + new_id).focus();
        if (img != undefined) {
            $('#render_img').remove();
            $('#form_comment1' + new_id).append(`
            <div class="render_img" id="render_img">
            <img src="` + img + `" class="render_img_item1" id="avatar` + id + `" alt="">
            <div class="img_close" onclick="close_img(` + id + `,this);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        }
    } else {
        var img = $('#img_cmt' + id).attr('src');
        var value = $('#text_comment' + id).attr('data-value');
        $('#comment' + new_id).val(value);
        $('#form_comment' + new_id).attr('data-type', 1);
        $('#form_comment' + new_id).attr('data-new_id', id);
        $('#form_comment' + new_id).css({
            'display': 'flex'
        });
        $('#form_comment' + new_id).find('.see_icon').hide();
        $('#form_comment' + new_id).find('.see_icon1').hide();
        $('#form_comment' + new_id).find('.nut_gui_comment').show();
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

function like_comment_wr(e) {
    var id = $(e)[0].dataset.id;
    $.ajax({
        url: '../ajax/like_comment_wr.php',
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

function del_comment_wr(e, type) {
    var id = $(e)[0].dataset.id;
    $('#xoa_binhluan').fadeIn('', function() {
        $('#xoa_binhluan .btn_luu').click(function() {
            console.log($(e).parents('.xembinhluan'));
            $.ajax({
                url: '../ajax/del_comment_wr.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
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

function rep_cmt_wr(e) {
    if ($(e).val() != "") {
        $(e).parents('.container-cmt').find('.see_icon').hide();
        $(e).parents('.container-cmt').find('.see_icon1').hide();
        $(e).parents('.container-cmt').find('.rep_comment').show();
    } else {
        var el = $(e).parents('.container-cmt').next();
        if (el.find('.render_img').length == 0) {
            $(e).parents('.container-cmt').find('.see_icon').show();
            $(e).parents('.container-cmt').find('.see_icon1').show();
            $(e).parents('.container-cmt').find('.rep_comment').hide();
            $(e).parents('.container-cmt')[0].dataset.type = 0;
            var new_id = $(e).parents('.container-cmt').find('.v_id_rep_comment_wr').val();
            $(e).parents('.container-cmt')[0].dataset.new_id = new_id;
        }
    }
}

$(document).ready(function() {
    $('.v_write_comment').keyup(function() {
        var el = $(this).parents('.v_comment_active');
        if ($(this).val() != "") {
            $(this).parents('.v_comment_active').find('.see_icon').hide();
            $(this).parents('.v_comment_active').find('.see_icon1').hide();
            $(this).parents('.v_comment_active').find('.nut_gui_comment').show();
        } else {
            if (el.find('.render_img').length == 0) {
                $(this).parents('.v_comment_active').find('.see_icon').show();
                $(this).parents('.v_comment_active').find('.see_icon1').show();
                $(this).parents('.v_comment_active').find('.nut_gui_comment').hide();
                $(this)[0].dataset.type = 0;
                $(this)[0].dataset.new_id = el.find('.v_new_id_comment').val();
            }

        }
    });
});
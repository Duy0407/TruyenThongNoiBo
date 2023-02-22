$(document).ready(function() {
    $('.active3').css('background', ' #2E3994');
    $('.v_update_img_core_value').click(function() {
        $(this).parents('.form_group').find('.input_anh').click();
    });
    $('.v_core_value_input_anh').change(function(e) {
        if (e.files && e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.v_update_img_core_value').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
    $('.v_cover_img_target').click(function() {
        $(this).parents('.form_group').find('.v_target_input_anh').click();
    });
    $('.v_target_input_anh').change(function(e) {
        if (e.files && e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.v_cover_img_target').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
});

function like_core(id_core) {
    $.ajax({
        url: '../ajax/like_core.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id_core: id_core
        },
        success: function(data) {
            if (data.result == true) {
                $('#like_core' + id_core).attr('src', '../img/v_like_post.svg');
                $('#text_like_core' + id_core).css('color', '#4C5BD4');
            } else if (data.result == false) {
                $('#like_core' + id_core).attr('src', '../img/like_t.png');
                $('#text_like_core' + id_core).css('color', '#666666');
            }
            $('#number_like' + id_core).html(data.count);
            // element.parents(".v_active_duoi").prev().find('.so-like').text(data.count);
        }
    });
}


function focus_comment_core(id, e) {
    var el = $('#comment' + id).parents('.container-cmt');
    if (el.css('display') == 'flex') {
        el.css({
            'display': 'none'
        });
    } else {
        el.css({
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
        reader.onload = function(e) {
            $('#avatar' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        el.find('.see_icon').hide();
        el.find('.see_icon1').hide();
        el.find('.nut_gui_comment').show();
    }
}

function close_img(id, e) {
    var el = $(e).parents('.v_comment_active');
    arr_img = [];
    $('#render_img').remove();
    var input = $('#baiviet_taianh' + id);
    input.replaceWith(input.val('').clone(true));
    if (el.find('.v_write_comment').val() == '') {
        el.find('.see_icon').show();
        el.find('.see_icon1').show();
        el.find('.nut_gui_comment').hide();
        el[0].dataset.type = 0;
        el[0].dataset.new_id = el.find('.v_id_core_value').val();
    }
}


function comment_core(e) {
    var type = $(e).attr('data-type');
    var form_data = new FormData();
    var url = (type == 0) ? "../ajax/comment_core_post.php" : "../ajax/comment_core_post_edit.php";
    var element = $(e);
    var comment = $(e).find('.v_write_comment').val();


    var new_id = $(e).attr('data-new_id');
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
                if (type == 0) {
                    $(e).find('.see_icon').show();
                    $(e).find('.see_icon1').show();
                    $(e).find('.nut_gui_comment').hide();
                    $(e).parents('.baiviets-footer').find('.duoi').find('.v_no_comment').hide();
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
                    </div> <div data-id="` + data.html.id + `" onclick="del_comment_core(this,0)" class = "li_model nut-xoa-baiviet">
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
                    <p class = "v_like_post2" onclick = "like_comment_core(this)" data-id = "` + data.html.id + `" > Thích </p>
                     <p class = "trl-binhluan" onclick="focus_comment_core(` + data.html.id + `,this);"> Trả lời</p> <p id='time` + data.html.id + `'> ` + data.html.time_active + ` </p> </div>
                      <div class="cmt-binhluan">
                      <div id="cmt-binhluan` + data.html.id + `"></div>
                      <form class="container-cmt" data-type="0" id="form_comment` + data.html.id + `" data-cmt_id="` + data.html.id + `" data-new_id="` + new_id + `" onsubmit="return rep_comment_core(this);">
                      <div class="img avt"> <img src="` + data.html.avatar + `" class="v_avt_reply_comment">
                      </div>
                      <div class="cont"> <input type="text" class="rep_cmt" id="comment` + data.html.id + `" onkeyup="keyup_rep_cmt(this)" name="" placeholder="Viết bình luận...">
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
                    $('#xemthem' + new_id).prepend(html);

                    var number = $('#number_comment' + new_id).data('value');
                    $('#number_comment' + new_id).html((number + 1) + ' Bình luận');
                    var input = $('#baiviet_taianh' + new_id);
                    input.replaceWith(input.val('').clone(true));
                } else {
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
                    console.log(new_id)
                    if (data.img != '') {
                        $('#react_cmt' + new_id).before(`<div class="image_comment" id="image_comment` + new_id + `">
                        <img src="` + data.img + `" id="img_cmt` + new_id + `" alt="image comment">
                        </div>`);
                    }
                }
                console.log($(e).parents('.giatri-muctieu').find('.phai').find('span'));
                console.log(data.data_length);
                $(e).parents('.giatri-muctieu').find('.phai').find('span').eq(0).text(data.data_length);
                arr_img = [];
            }
        });
    }
    return false;
}

function show_comment(e) {
    var data = new FormData();
    var page = $(e).parents('.duoi').find('.xembinhluan').length;
    var new_id = $(e).data('id');
    data.append('new_id', new_id);
    data.append('page', page);
    $.ajax({
        url: '../ajax/list_comment_core.php',
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
                    html = ` <div class="xembinhluan hide_comment` + new_id + `" hide_comment_core` + new_id + `" ><div class="avt avt-cmt"> <img src="` + responsive.data[i].avatar_login + `"> </div><div class="binhluan">
                        <div class="container">
                            <div class="header-cmt">
                                <div class="name-cmt">
                                    <p>` + responsive.data[i].name + `</p>
                                </div>
                                <div class="edit-cmt"  onclick="option_cmt(this);">
                                    <img src="../img/bacham.png">
                                    <div class="popup-chinhsua-cmt">
                                        <div class="ul_model">`;
                    if (responsive.type_create == 1) {
                        html = html + `<div class="li_model" onclick="update_comment(` + responsive.data[i].id + `,` + new_id + `,0)">
                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                            </div>`;
                    } else if (responsive.user_id == responsive.data[i].id_user) {
                        html = html + `<div class="li_model" onclick="update_comment(` + responsive.data[i].id + `,` + new_id + `,0)">
                                        <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                        <p class="p_model">Chỉnh sửa bình luận </p>
                                        </div>`;
                    }

                    if (responsive.type_delete == 1) {
                        html = html + `<div data-id="` + responsive.data[i].id + `" onclick="del_comment_core(this,0)" class="li_model nut-xoa-baiviet">
                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                            <p class="p_model">Xóa bình luận</p>
                                        </div>`;
                    } else if (responsive.user_id == responsive.data[i].id_user) {
                        html = html + `<div data-id="` + responsive.data[i].id + `" onclick="del_comment_core(this,0)" class="li_model nut-xoa-baiviet">
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
                         <p class = "v_like_post2 ` + responsive.data[i].style_like2 + `" onclick="like_comment_core(this)" data-id = "` + responsive.data[i].id + `" > Thích </p> 
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


                    html += `<form class="container-cmt"  data-type="0" id="form_comment` + responsive.data[i].id + `" data-cmt_id="` + responsive.data[i].id + `" data-new_id="` + new_id + `" onsubmit="return rep_comment_core(this);">
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
                    $('#xemthem' + new_id).append(html).slideDown();
                }
                if (responsive.data_count == 0) {
                    $(e).hide();
                    $(e).prev().css('display', 'inline-block');
                }
            } else {
                $('#thugon-binhluan' + new_id).css('display', 'block');
                $('#xem-binhluan' + new_id).css('display', 'none');
                i = 0;
            }
        }
    });
}

function hide_comment(e) {
    $(e).prev().find('.xembinhluan').remove();
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
        reader.onload = function(e) {
            $('#avatar' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        el.find('.see_icon').hide();
        el.find('.see_icon1').hide();
        el.find('.nut_gui_comment ').show();
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
        el[0].dataset.new_id = el.find('.v_id_rep_cmt_core_value').val();
    }
}

function rep_comment_core(e) {
    var form_data = new FormData();
    var element = $(e);
    var comment = $(e).find('.rep_cmt').val();
    var cmt_id = $(e).attr('data-cmt_id');
    var new_id = $(e).attr('data-new_id');
    var type = $(e).attr('data-type');
    var url = (type == 0) ? "../ajax/rep_comment_core_post.php" : "../ajax/comment_core_post_edit.php";
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
                element.parents('.container-cmt').hide();
                element.find('.see_icon').show();
                element.find('.see_icon1').show();
                element.find('.nut_gui_comment').hide();
                element[0].dataset.type = 0;
                element[0].dataset.new_id = element.find('.v_id_rep_cmt_core_value').val();
                if (type == 0) {
                    // $(e).parents('.cmt-binhluan').css({
                    //     'display': 'none'
                    // });
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
                                        <div data-id="` + data.html.id + `" onclick="del_comment_core(this,1)" class="li_model nut-xoa-baiviet">
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
                            <p class="v_like_post2 " onclick="like_comment_core(this)" data-id="` + data.html.id + `">Thích</p>
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
                $(e).parents('.giatri-muctieu').find('.phai').find('span').eq(0).text(data.data_length);
                img_rep_cmt = [];
            }
        });
    }
    return false;
}

function show_rep_comment(e) {
    var data = new FormData();
    var page = $(e).prev().find('.xembinhluan_con').length;
    if (page == 0) {
        data.append('page', 0);
    } else {
        data.append('page', page);
    }
    var cmt_id = $(e).data('cmt_id');
    data.append('cmt_id', cmt_id);
    $.ajax({
        url: '../ajax/list_rep_comment_core.php',
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
                                        <div class="ul_model">`;
                    if (responsive.type_create == 1) {
                        html = html + `<div class="li_model" onclick="update_comment(` + responsive.data[i].id + `,` + cmt_id + `,1)">
                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                        </div>`;
                    } else if (responsive.data[i].id_user == responsive.user_id) {
                        html = html + `<div class="li_model" onclick="update_comment(` + responsive.data[i].id + `,` + cmt_id + `,1)">
                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                        </div>`;
                    }

                    if (responsive.type_delete == 1) {
                        html = html + `<div data-id="` + responsive.data[i].id + `" onclick="del_comment_core(this,1)" class="li_model nut-xoa-baiviet">
                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                            <p class="p_model">Xóa bình luận</p>
                                        </div>`;
                    } else if (responsive.data[i].id_user == responsive.user_id) {
                        html = html + `<div data-id="` + responsive.data[i].id + `" onclick="del_comment_core(this,1)" class="li_model nut-xoa-baiviet">
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
                            <p class="v_like_post2 ` + responsive.data[i].style_like2 + `" onclick="like_comment_core(this)" data-id="` + responsive.data[i].id + `">Thích</p>
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

                if (responsive.data_count == 0) {
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
        console.log(img);
        var value = $('#text_comment' + id).attr('data-value');
        $('#comment' + new_id).val(value);
        var el = $('#comment' + new_id).parents('.v_comment_active');
        el.find('.see_icon').hide();
        el.find('.see_icon1').hide();
        el.find('.nut_gui_comment').show();
        $('#form_comment' + new_id).attr('data-type', 1);
        $('#form_comment' + new_id).attr('data-new_id', id);
        $('#comment' + new_id).focus();
        if (img != undefined) {
            $('#render_img').remove();
            $('#form_comment' + new_id).append(`
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
        $('#comment' + new_id).parents('.container-cmt').css({
            'display': 'flex'
        });
        $('#form_comment' + new_id).attr('data-type', 1);
        $('#form_comment' + new_id).attr('data-new_id', id);
        $('#comment' + new_id).focus();
        if (img != undefined) {
            $('#render_img').remove();
            $('#view_rep_cmt' + new_id).append(`
            <div class="render_img img_rep" id="render_img">
            <img src="` + img + `" class="render_img_item1" id="avatar` + id + `" alt="">
            <div class="img_close img_rep_close" onclick="close_img_rep_cmt(` + id + `);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        }
    }
}

function like_comment_core(e) {
    var id = $(e)[0].dataset.id;
    $.ajax({
        url: '../ajax/like_comment_core.php',
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

function del_comment_core(e, type) {
    var id = $(e)[0].dataset.id;
    $('#xoa_binhluan').fadeIn('', function() {
        $('#xoa_binhluan .btn_luu').click(function() {
            $.ajax({
                url: '../ajax/del_comment_core.php',
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


//target


function like_target(id_target) {
    $.ajax({
        url: '../ajax/like_target.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id_target: id_target
        },
        success: function(data) {
            if (data.result == true) {
                $('#like_target' + id_target).attr('src', '../img/v_like_post.svg');
                $('#text_like_target' + id_target).css('color', '#4C5BD4');
            } else if (data.result == false) {
                $('#like_target' + id_target).attr('src', '../img/like_t.png');
                $('#text_like_target' + id_target).css('color', '#666666');
            }
            $('#number_like_target' + id_target).html(data.count);
            // element.parents(".v_active_duoi").prev().find('.so-like').text(data.count);
        }
    });
}

function focus_comment_target(id) {
    $('#comment_target' + id).focus();
}

function focus_rep_comment_target(id, e) {
    if ($(e).parents('.reach-cmt').next().find('.container-cmt').css('display') == 'none') {
        $(e).parents('.reach-cmt').next().find('.container-cmt').css({
            'display': 'flex'
        });
        $('#rep_comment_target' + id).focus();
    } else {
        $(e).parents('.reach-cmt').next().find('.container-cmt').css({
            'display': 'none'
        });
    }
}

var arr_img_target = [];

function changeImg_target(input, id) {
    var el = $(input).parents('.v_comment_active');
    if (input.files && input.files[0]) {
        arr_img_target = [];
        arr_img_target.push(input.files[0]);
        $('#render_img_target').remove();
        $('#form_comment_target' + id).append(`
            <div class="render_img" id="render_img_target">
            <img src=" " class="render_img_item1" id="avatar_target` + id + `" alt="">
            <div class="img_close" onclick="close_img_target(` + id + `,this);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatar_target' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        var input = $('#open_img_target' + id);
        input.replaceWith(input.val('').clone(true));
        el.find('.see_icon').hide();
        el.find('.see_icon1').hide();
        el.find('.nut_gui_comment').show();
        el[0].dataset.type = 0;
        el[0].dataset.target = el.find('.v_id_core_value').val();
    }
}

function close_img_target(id, e) {
    var el = $(e).parents('.v_comment_active');
    arr_img_target = [];
    $('#render_img_target').remove();
    var input = $('#open_img_target' + id);
    input.replaceWith(input.val('').clone(true));
    if (el.find('.v_write_comment').val() == "") {
        el.find('.see_icon').show();
        el.find('.see_icon1').show();
        el.find('.nut_gui_comment').hide();
    }
}

function comment_target(e) {
    var type = $(e).attr('data-type');
    var form_data = new FormData();
    var url = (type == 0) ? "../ajax/comment_target_post.php" : "../ajax/comment_target_post_edit.php";
    var element = $(e);
    var comment = $(e).find('.v_write_comment').val();
    var target = $(e).attr('data-target');
    if (type == 1) {
        var avatar = $('#avatar' + target).attr('src');
    }
    form_data.append('comment', comment);
    form_data.append('avatar', avatar);
    form_data.append('target', target);
    form_data.append('img_comment[]', arr_img_target[0]);
    if (comment != "" || arr_img_target.length > 0) {
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
                $(e).find('.see_icon1').show();
                $(e).find('.see_icon').show();
                $(e).find('.nut_gui_comment').hide();
                if (type == 0) {
                    $(e).parents('.xemthem').find('.v_no_comment').hide();
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
                    <div class = "li_model" onclick="update_comment_target(` + data.html.id + `,` + target + `,0)">
                        <img src = "../img/chinh_sua_.png" alt = "Ảnh lỗi">
                    <p class = "p_model" > Chỉnh sửa bình luận</p> 
                    </div> <div data-id="` + data.html.id + `" onclick="del_comment_target(this,0)" class = "li_model nut-xoa-baiviet">
                    <img src = "../img/icon_xoa.png" alt = "Ảnh lỗi">
                    <p class = "p_model" > Xóa bình luận
                    </p> </div> </div> </div> </div> </div> <div class = "body-cmt">
                    <div class = "cmt"  id="text_comment_target` + data.html.id + `" tabindex="-1" data-value="` + data.html.comment + `">
                    <p>` + data.html.comment + ` </p> </div> </div> </div>`;
                    if (data.html.img != '') {
                        html += `<div class="image_comment"  id="image_comment` + data.html.id + `">
                        <img src="` + data.html.img + `" id="img_cmt_target` + data.html.id + `" alt="image comment">
                    </div>`;
                    }
                    html += `<div class = "reach-cmt" id="react_cmt` + data.html.id + `" >
                    <p class = "v_like_post2" onclick = "like_comment_target(this)" data-id = "` + data.html.id + `" > Thích </p>
                     <p class = "trl-binhluan" onclick="focus_rep_comment_target(` + data.html.id + `);"> Trả lời</p> <p id='time` + data.html.id + `'> ` + data.html.time_active + ` </p> </div>
                      <div class="cmt-binhluan">
                      <div id="cmt-binhluan_target` + data.html.id + `"></div>
                    <form class="container-cmt" data-type="0" id="form_rep_comment_target` + data.html.id + `" data-cmt_id="` + data.html.id + `" data-target="` + target + `" onsubmit="return rep_comment_target(this);">
                        <div class="img avt"> 
                            <img src="` + data.html.avatar + `" class="v_avt_reply_comment">
                        </div>
                        <div class="cont"> 
                            <input type="text" class="rep_cmt" id="rep_comment_target` + data.html.id + `" name="" placeholder="Viết bình luận...">
                            <span class="see_icon"></span>
                            <label class="see_icon1">
                                <input type="file" onchange="show_img_rep_comment_target(this,` + data.html.id + `)" id="rep_comment_target_file` + data.html.id + `" accept="image/*" style="display: none;" />
                            </label>
                            <button class="nut_gui_comment rep_comment" id="rep_comment` + data.html.id + `">
                                <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                            </button>
                        </div>
                    </form>
                    <div id="view_rep_cmt_target` + data.html.id + `"></div>
                     </div> </div></div>`;
                    element.find('.v_write_comment').val('');
                    $('#render_img_target').remove();
                    $('#xemthem_target' + target).prepend(html);

                    var number = $('#number_comment_target' + target).attr('data-value');
                    $('#number_comment_target' + target).attr('data-value', (number + 1));
                    $('#number_comment_target' + target).html((number + 1) + ' Bình luận');
                } else {
                    $('#text_comment_target' + target).html('<p>' + comment + '</p>');
                    $('#text_comment_target' + target).focus();
                    $('#text_comment_target' + target).attr('data-value', comment);
                    $('#comment_target' + data.id_new).val('');
                    $('#form_comment_target' + data.id_new).attr('data-type', 0);
                    $('#form_comment_target' + data.id_new).attr('data-target', data.id_new);
                    $('#render_img_target').remove();
                    $('#image_comment_target' + target).remove();
                    if (data.img != '') {
                        $('#react_cmt' + target).before(`<div class="image_comment" id="image_comment` + target + `">
                        <img src="` + data.img + `" id="img_cmt` + target + `" alt="image comment">
                        </div>`);
                    }
                }
                arr_img_target = [];
            }
        });
    }
    return false;
}

function show_comment_target(e) {
    var data = new FormData();
    var page = $(e).parents('.duoi').find('.xemthem').find('.xembinhluan').length;
    var target_id = $(e).data('target_id');
    data.append('target_id', target_id);
    data.append('page', page);
    $.ajax({
        url: '../ajax/list_comment_target.php',
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
                    $('#thugon-binhluan_target' + target_id).css('display', 'block');
                    $('#xem-binhluan_target' + target_id).css('display', 'none');
                } else {
                    for (let i = 0; i < responsive.data.length; i++) {
                        html = ` <div class="xembinhluan hide_comment` + target_id + ` hide_comment_target` + target_id + `"  ><div class="avt avt-cmt"> <img src="` + responsive.data[i].avatar_login + `"> </div><div class="binhluan">
                        <div class="container">
                            <div class="header-cmt">
                                <div class="name-cmt">
                                    <p>` + responsive.data[i].name + `</p>
                                </div>
                                <div class="edit-cmt"  onclick="option_cmt(this);">
                                    <img src="../img/bacham.png">
                                    <div class="popup-chinhsua-cmt">
                                        <div class="ul_model">`;
                        if (responsive.type_create == 1) {
                            html = html + `<div class="li_model" onclick="update_comment_target(` + responsive.data[i].id + `,` + target_id + `,0)">
                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                        </div>`;
                        } else if (responsive.data[i].id_user == responsive.user_id) {
                            html = html + `<div class="li_model" onclick="update_comment_target(` + responsive.data[i].id + `,` + target_id + `,0)">
                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                        </div>`;
                        }

                        if (responsive.type_create == 1) {
                            html = html + `<div data-id="` + responsive.data[i].id + `" onclick="del_comment_target(this,0)" class="li_model nut-xoa-baiviet">
                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                            <p class="p_model">Xóa bình luận</p>
                                        </div>`;
                        } else if (responsive.data[i].id_user == responsive.user_id) {
                            html = html + `<div data-id="` + responsive.data[i].id + `" onclick="del_comment_target(this,0)" class="li_model nut-xoa-baiviet">
                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                            <p class="p_model">Xóa bình luận</p>
                                        </div>`;
                        }

                        html = html + `</div>
                                    </div>
                                </div>
                            </div>
                            <div class="body-cmt">
                                <div class="cmt" id="text_comment_target` + responsive.data[i].id + `" tabindex="-1" data-value="` + responsive.data[i].content + `">
                                    <p>` + responsive.data[i].content + `</p>
                                </div>
                            </div>
                        </div>`;
                        if (responsive.data[i].image != '') {
                            html += `<div class = "image_comment" id="image_comment_target` + target_id + ` >
                            <img src = "` + responsive.data[i].image + `" id="img_cmt_target` + responsive.data[i].id + `" alt = "image comment" >
                            </div>`;
                        }
                        html += `
                            <div class = "reach-cmt"  id="react_cmt` + responsive.data[i].id + `">
                         <p class = "v_like_post2 ` + responsive.data[i].style_like2 + `" onclick="like_comment_target(this)" data-id = "` + responsive.data[i].id + `" > Thích </p> 
                         <p class = "trl-binhluan" onclick="focus_rep_comment_target(` + responsive.data[i].id + `);" > Trả lời </p> 
                         <p  id='time` + responsive.data[i].id + `'>` + responsive.data[i].time_sort + `</p> `;
                        if (responsive.data[i].num_like_comment > 0) {
                            html += `<img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment` + responsive.data[i].id + `">
                        <p class="num_like_comment num_like_comment` + responsive.data[i].id + `">` + responsive.data[i].num_like_comment + `</p>`;
                        }

                        html += `</div> 
                         <div class = "cmt-binhluan">
                          <div id="cmt-binhluan_target` + responsive.data[i].id + `"></div>`;
                        if (responsive.data[i].rep_comment > 0) {
                            html += `
                        <div class="view_cmt_rep" id="view_cmt_rep_target` + responsive.data[i].id + `" onclick="show_rep_comment_target(` + responsive.data[i].id + `);">Hiển thị bình luận</div>
                        <div class="hide_cmt_rep" id="hide_cmt_rep_target` + responsive.data[i].id + `" onclick="hide_rep_comment_target(` + responsive.data[i].id + `);">Ẩn bớt bình luận</div>
                        `;
                        }


                        html += `<form class="container-cmt"  data-type="0" id="form_rep_comment_target` + responsive.data[i].id + `" data-cmt_id="` + responsive.data[i].id + `" data-target_id="` + target_id + `" onsubmit="return rep_comment_core(this);">
                            <div class="img avt"> 
                                <img src="` + responsive.data[i].avatar_login + `" class="v_avt_reply_comment">
                            </div>
                                <div class="cont">
                                    <input type="text" class="rep_cmt" id="rep_comment_target` + responsive.data[i].id + `" name="" placeholder="Viết bình luận...">
                                    <span class="see_icon"></span>
                                    <label class="see_icon1">
                                    <input type="file" onchange="show_img_rep_comment_target(this,` + responsive.data[i].id + `)" id="rep_comment_target` + responsive.data[i].id + `" accept="image/*" style="display: none;" />
                                    </label>
                                    <button class="nut_gui_comment rep_comment" id="rep_comment` + responsive.data[i].id + `">
                                        <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                                    </button>
                            </div>
                        </form>
                        <div id="view_rep_cmt_target` + responsive.data[i].id + `"></div>
                        </div></div></div>`;
                        $('#xemthem_target' + target_id).append(html);
                    }
                    if (responsive.data_length == 0) {
                        $(e).hide();
                        $(e).prev().css('display', 'inline-block');
                    }
                }
            }
        }
    });
}

function hide_comment_target(e) {
    $(e).parents('.duoi').find('.xembinhluan').remove();
}

function like_comment_target(e) {
    var id = $(e)[0].dataset.id;
    $.ajax({
        url: '../ajax/like_comment_target.php',
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

var img_rep_cmt_target = [];

function show_img_rep_comment_target(input, id) {
    var el = $(input).parents('.container-cmt');
    if (input.files && input.files[0]) {
        img_rep_cmt_target = [];
        img_rep_cmt_target.push(input.files[0]);
        $('#render_img_target').remove();
        $('#view_rep_cmt_target' + id).append(`
            <div class="render_img img_rep" id="render_img_target">
            <img src=" " class="render_img_item1" id="avatar` + id + `" alt="">
            <div class="img_close img_rep_close" onclick="close_img_rep_cmt_target(` + id + `);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatar' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        var input = $('#rep_comment_target_file' + id);
        input.replaceWith(input.val('').clone(true));
        el.find('.see_icon').hide();
        el.find('.see_icon1').hide();
        el.find('.nut_gui_comment').show();
    }
}

function close_img_rep_cmt_target(id) {
    img_rep_cmt_target = [];
    $('#render_img_target').remove();
    var input = $('#rep_comment_target_file' + id);
    input.replaceWith(input.val('').clone(true));
}

function rep_comment_target(e) {
    var form_data = new FormData();
    var element = $(e);
    var comment = $(e).find('.rep_cmt').val();
    var cmt_id = $(e).attr('data-cmt_id');
    var target_id = $(e).attr('data-target_id');
    var type = $(e).attr('data-type');
    var url = (type == 0) ? "../ajax/rep_comment_target_post.php" : "../ajax/comment_target_post_edit.php";
    if (type == 1) {
        var avatar = $('#avatar_cmt_target' + target_id).attr('src');
        form_data.append('avatar', avatar);
    }
    form_data.append('comment', comment);
    form_data.append('cmt_id', cmt_id);
    form_data.append('target', target_id);
    form_data.append('img_comment[]', img_rep_cmt_target[0]);
    var data_id = 0;
    if (comment != "" || img_rep_cmt_target.length > 0 || avatar) {
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
                element.find('.see_icon').show();
                element.find('.see_icon1').show();
                element.find('.nut_gui_comment').hide();
                element.find('.rep_cmt').val('');
                element.hide();
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
                                        <div class="li_model" onclick="update_comment_target(` + data.html.id + `,` + cmt_id + `,1)">
                                            <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                            <p class="p_model">Chỉnh sửa bình luận </p>
                                        </div>
                                        <div data-id="` + data.html.id + `" onclick="del_comment_target(this,1)" class="li_model nut-xoa-baiviet">
                                            <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                            <p class="p_model">Xóa bình luận</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-cmt">
                            <div class="cmt" id="text_comment_target` + data.html.id + `" tabindex="1" data-value="` + data.html.comment + `">
                                <p> ` + data.html.comment + ` </p>
                            </div>
                        </div>
                    </div>`;

                    if (data.html.img != '') {
                        html += `<div class="image_comment"  id="image_comment` + data.html.id + `">
                            <img src="` + data.html.img + `" id="img_cmt_target` + data.html.id + `" alt="image comment">
                        </div>`;
                    }
                    html += `
                    <div class="reach-cmt" id="react_cmt` + data.html.id + `">
                            <p class="v_like_post2 " onclick="like_comment_core(this)" data-id="` + data.html.id + `">Thích</p>
                        <p id='time` + data.html.id + `'>` + data.html.time_active + `</p>
                    </div>
                    </div>
                    </div>`;
                    element.find('.rep_cmt').val('');
                    $('#render_img_target').remove();
                    $('#cmt-binhluan_target' + cmt_id).append(html);
                    var number = $('#number_comment' + target_id).data('value');
                    $('#number_comment' + target_id).html((number + 1) + ' Bình luận');
                } else {
                    var target_id2 = element.find('.v_id_target_cmt2').val();
                    element[0].dataset.type = 0;
                    $('#text_comment_target' + target_id).html('<p>' + comment + '</p>');
                    $('#text_comment_target' + target_id).focus();
                    $('#text_comment_target' + target_id).attr('data-value', comment);
                    $('#rep_comment_target' + cmt_id).val('');
                    $('#form_rep_comment_target' + cmt_id).attr('data-type', 0);
                    $('#form_rep_comment_target' + cmt_id).attr('data-target_id', target_id2);
                    $('#render_img_target').remove();

                    if (data.img == '') {
                        $('#image_comment' + target_id).remove();
                    } else {
                        $('#image_comment' + target_id).remove();
                        $('#react_cmt' + target_id).before(`<div class="image_comment" id="image_comment` + target_id + `">
                        <img src="` + data.img + `" id="img_cmt_target` + target_id + `" alt="image comment">
                    </div>`);
                    }
                    console.log(element[0].dataset.target_id);
                }
                img_rep_cmt_target = [];
            }
        });
    }
    return false;
}

function show_rep_comment_target(cmt_id) {
    var data = new FormData();
    var page = $('.hide_rep_comment' + cmt_id);
    data.append('cmt_id', cmt_id);
    data.append('page', page.length);
    $.ajax({
        url: '../ajax/list_rep_comment_target.php',
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
                                        <div class="ul_model">`;
                    if (responsive.type_create == 1) {
                        html = html + `<div class="li_model" onclick="update_comment_target(` + responsive.data[i].id + `,` + cmt_id + `,1)">
                                                <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                <p class="p_model">Chỉnh sửa bình luận </p>
                                                </div>`;
                    } else if (responsive.data[i].id_user == responsive.user_id) {
                        html = html + `<div class="li_model" onclick="update_comment_target(` + responsive.data[i].id + `,` + cmt_id + `,1)">
                                                <img src="../img/chinh_sua_.png" alt="Ảnh lỗi">
                                                <p class="p_model">Chỉnh sửa bình luận </p>
                                                </div>`;
                    }

                    if (responsive.type_delete == 1) {
                        html = html + `<div data-id="` + responsive.data[i].id + `" onclick="del_comment_target(this,1)" class="li_model nut-xoa-baiviet">
                                                <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                <p class="p_model">Xóa bình luận</p>
                                            </div>`;
                    } else if (responsive.data[i].id_user == responsive.user_id) {
                        html = html + `<div data-id="` + responsive.data[i].id + `" onclick="del_comment_target(this,1)" class="li_model nut-xoa-baiviet">
                                                <img src="../img/icon_xoa.png" alt="Ảnh lỗi">
                                                <p class="p_model">Xóa bình luận</p>
                                            </div>`;
                    }

                    html = html + `</div>
                                    </div>
                                </div>
                            </div>
                            <div class="body-cmt">
                                <div class="cmt" id="text_comment_target` + responsive.data[i].id + `" tabindex="-1" data-value="` + responsive.data[i].content + `">
                                    <p>` + responsive.data[i].content + `</p>
                                </div>
                            </div>
                        </div>`;

                    if (responsive.data[i].image != '') {

                        html += `<div class="image_comment"  id="image_comment` + responsive.data[i].id + `">
                                <img src="` + responsive.data[i].image + `" id="img_cmt_target` + responsive.data[i].id + `" alt="image comment">
                            </div>`;
                    }
                    html += `<div class="reach-cmt"  id="react_cmt` + responsive.data[i].id + `">
                            <p class="v_like_post2 ` + responsive.data[i].style_like2 + `" onclick="like_comment_target(this)" data-id="` + responsive.data[i].id + `">Thích</p>
                            <p id="` + responsive.data[i].id + `">` + responsive.data[i].time_sort + `</p>`;
                    if (responsive.data[i].num_like_comment > 0) {
                        html += `<img src="../img/num_like_cmt.svg" alt="like comment" class="like_comment like_comment` + responsive.data[i].id + `">
                                <p class="num_like_comment num_like_comment` + responsive.data[i].id + `">` + responsive.data[i].num_like_comment + `</p>`;
                    }
                    html += `</div>
                    </div>
                </div>`;
                    $('#cmt-binhluan_target' + cmt_id).append(html);
                    dem++;
                }
                if (responsive.data.length == 0) {
                    $('#hide_cmt_rep_target' + cmt_id).css('display', 'block');
                    $('#view_cmt_rep_target' + cmt_id).css('display', 'none');
                }
            } else {
                return false;
            }
        }
    });
}

function hide_rep_comment_target(cmt_id) {
    $('#cmt-binhluan_target' + cmt_id).html('');
    $('#view_cmt_rep_target' + cmt_id).css('display', 'block');
    $('#hide_cmt_rep_target' + cmt_id).css('display', 'none');
}

function update_comment_target(id, new_id, type) {
    if (type == 0) {
        var img = $('#img_cmt_target' + id).attr('src');
        var value = $('#text_comment_target' + id).attr('data-value');
        $('#comment_target' + new_id).val(value);
        $('#form_comment_target' + new_id).attr('data-type', 1);
        $('#form_comment_target' + new_id).attr('data-target', id);
        $('#form_comment_target' + new_id).find('.see_icon').hide();
        $('#form_comment_target' + new_id).find('.see_icon1').hide();
        $('#form_comment_target' + new_id).find('.nut_gui_comment').show();
        $('#comment_target' + new_id).focus();
        if (img != undefined) {
            $('#render_img_target').remove();
            $('#form_comment_target' + new_id).append(`
            <div class="render_img" id="render_img_target">
            <img src="` + img + `" class="render_img_item1" id="avatar` + id + `" alt="">
            <div class="img_close" onclick="close_img_target(` + id + `);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        }
    } else {
        var img = $('#img_cmt_target' + id).attr('src');
        var value = $('#text_comment_target' + id).attr('data-value');
        $('#rep_comment_target' + new_id).val(value);
        $('#form_rep_comment_target' + new_id).attr('data-type', 1);
        $('#form_rep_comment_target' + new_id).attr('data-target_id', id);
        $('#form_rep_comment_target' + new_id).css({
            'display': 'flex'
        });
        $('#rep_comment_target' + new_id).focus();
        $('#form_rep_comment_target' + new_id).find('.see_icon').hide();
        $('#form_rep_comment_target' + new_id).find('.see_icon1').hide();
        $('#form_rep_comment_target' + new_id).find('.nut_gui_comment').show();
        if (img != undefined) {
            $('#render_img').remove();
            $('#view_rep_cmt_target' + new_id).append(`
            <div class="render_img img_rep" id="render_img_target">
            <img src="` + img + `" class="render_img_item1" id="avatar_cmt_target` + id + `" alt="">
            <div class="img_close img_rep_close" onclick="close_img_rep_cmt_target(` + id + `);">
            <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
            </div>
            </div>
            `);
        }
    }
}


function del_comment_target(e, type) {
    var id = $(e)[0].dataset.id;
    $('#xoa_binhluan').fadeIn('', function() {
        $('#xoa_binhluan .btn_luu').click(function() {
            $.ajax({
                url: '../ajax/del_comment_target.php',
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

function keyup_rep_cmt(e) {
    if ($(e).val() != "") {
        $(e).parents('.container-cmt').find('.see_icon').hide();
        $(e).parents('.container-cmt').find('.see_icon1').hide();
        $(e).parents('.container-cmt').find('.nut_gui_comment').show();
    } else {
        var el = $(e).parents('.container-cmt').next();
        if (el.find('.render_img ').length == 0) {
            $(e).parents('.container-cmt').find('.see_icon').show();
            $(e).parents('.container-cmt').find('.see_icon1').show();
            $(e).parents('.container-cmt').find('.nut_gui_comment').hide();
            $(e).parents('.container-cmt')[0].dataset.type = 0;
            $(e).parents('.container-cmt')[0].dataset.new_id = $(e).parents('.container-cmt').find('.v_id_rep_cmt_core_value').val();
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
                el[0].dataset.type = 0;
                el[0].dataset.new_id = el.find('.v_id_core_value').val();
            }
        }
    });
});
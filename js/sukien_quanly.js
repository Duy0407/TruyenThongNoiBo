//Xóa thành viên ra khỏi sự kiện
function v_del_member_event(e) {
    var id = $(e).data('id');
    var pos = $(e).data('pos');
    $('#del_member_event').fadeIn("", function() {
        $('.v_xoa_tv_event').click(function() {
            $.ajax({
                type: "POST",
                url: "../ajax/del_member_event.php",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    if (data.result == true) {
                        $('#del_member_event').hide();
                        $('.vd7_xemchitiet_sk').find('.member_event').find('.img-thanhvien').eq(pos).remove();
                    }
                }
            });
        });
    });
}
$("body").click(function() {
    if (event.target.id == "del_member_event") {
        $('#del_member_event').fadeOut();
    }
});
$(".btn_huy_popup_xoatv").click(function() {
    $('#del_member_event').hide();
});
$(".sk-noi-bo").click(function() {
    $(".sukien-nv").show();
    $(".sk22").show();
    $(".sk33").hide();
    $(".sukien-nv.sk11").hide();
    $(".caidat-doingoai").hide();
})

$(".sknb2").click(function() {
    $(".sk22").hide();
    $(".sukien-nv.sk11").show();
})

//Tìm kiếm sự kiện

$('.search_event').submit(function() {
    if ($(this).find('.ip-tk-sknv').val() != "") {
        window.location.href = "/truyen-thong-noi-bo-su-kien.html?k=" + $(this).find('.ip-tk-sknv').val();
        return false;
    } else {
        return false;
    }
});


$(".sk-doi-ngoai").click(function() {
    $(".sk33").show();
    $(".sukien-nv.sk11").hide();
    // $(".caidat-doingoai").show();
    // $(".caidat-doinoi").hide();
})
$('.imgsk_tvtg').hover(function() {
    $(this).parents('.show-hide').find('.hvshow').toggle();
})

$('.btn_del_event').click(function() {
    var id = $(this).attr('data-id');
    $.ajax({
        url: "../ajax/delete_post.php",
        type: "POST",
        dataType: "json",
        data: {
            new_id: id
        },
        success: function(data) {
            location.reload();
        },
        error: function() {
            alert("Có lỗi xảy ra.Vui lòng thử lại");
        }
    });

})

$('.btn_huy').click(function() {
    $(".xoa-sk-nhan-vien").hide();
})

$('.btl-xoa-sk-nhan-vien').click(function() {
    $(".xoa-sk-nhan-vien").hide();
    $(".xoa-sknv").show();
})
$(".btn-da-xoa").click(function() {
    $(".xoa-sknv").hide();
})
$(".close_detl").click(function() {
    $(".xoa-sk-nhan-vien").hide();
})

$(".btn_huy").click(function() {
        $(".xoa-sknv").hide();
        $(".vd8_chinhsua_sk").hide();
    })
    // $(".caidat-doinoi p.xem-chi-tiet").click(function() {
    //     $(".vd7_xemchitiet_sk").show();
    // })
$("img.close_detl").click(function() {
    $(".vd7_xemchitiet_sk").hide();
})
$(".btn_huy").click(function() {
    $(".vd7_xemchitiet_sk").hide();
})




$("img.imgskgiaoluu").click(function() {
    $(".vd8_chinhsua_sk").show();
})
$("img.close_detl").click(function() {
    $(".vd8_chinhsua_sk").hide();
})


$(".text-gd").click(function() {
    // $(".vd7_xemchitiet_sk").show()
    var id = $(this).parents('.detail_event').attr('data-id_event');
    if (id != '') {
        var data = new FormData();
        data.append('id', id);
        $.ajax({
            url: "../ajax/detail_event.php",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            data: data,
            success: function(responsive) {
                if (responsive.result == true) {
                    $('.event_title').html(responsive.data.new_title);
                    $('.content').html(responsive.data.content);
                    $('.participants').html('');
                    $('.ds-sk').remove();
                    if (responsive.join == 0) {
                        $('.tham-gia').text("Tham gia");
                    } else {
                        $('.tham-gia').text("Hủy tham gia");
                    }
                    for (var i = 0; i < responsive.data.arr_ep.length; i++) {
                        $('.participants').append(`<div class="show-hide">
                            <img class="imgsk_tvtg" src="` + responsive.data.arr_ep[i].avatar + `" alt="">
                                <div class="hvshow" style="display:none">
                                    <div class="flex">
                                        <div class="img-show">
                                            <img class="imgsk_tvtg" src="` + responsive.data.arr_ep[i].avatar + `">
                                        </div>
                                        <div class="tetx-show">
                                            <p class="name">` + responsive.data.arr_ep[i].name + `</p>
                                            <p class="position">` + responsive.data.arr_ep[i].position + `</p>
                                            <p class="id_user">` + responsive.data.arr_ep[i].id + `</p>
                                        </div>
                                    </div>
                                </div>
                        </div>`);
                    }
                    $('.location').html(responsive.data.vi_tri_dang);
                    $('.view_detail_event').attr('data-id', id);
                    $('.view_detail_event').attr('data-type', responsive.data.new_type);
                    for (var i = 0; i < responsive.data.question.length; i++) {
                        $('.question').append(`
                        <div class="ds-sk">
                            <p class="pchung">` + (i + 1) + `.</p>
                            <p class="pchung">` + responsive.data.question[i].content + `</p>
                            <p>(` + responsive.data.question[i].name + `)</p>
                        </div>`);
                    }
                    $('.content').html(responsive.data.content);
                }
            }
        });
    }
});

$('.view_detail_event').click(function() {
    var id = $(this).attr('data-id');
    var type = $(this).attr('data-type');
    if (type == 3) {
        $(".vd7_xemchitiet_sk").show();
    } else {
        $(".vd9_xemchitiet_dn").show();
    }

    if (id != '') {
        var data = new FormData();
        data.append('id', id);
        $.ajax({
            url: "../ajax/detail_event.php",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            data: data,
            success: function(responsive) {
                if (type == 3) {
                    if (responsive.result == true) {
                        $('.member_event,.list_ep,.question_popup,.title_event').html('');
                        $('.title_event').html(responsive.data.new_title + `<img class="xemchitiet-dn img_detail_event_noibo" onclick="xemchitiet_dn(` + id + `,3);" src="../img/skgiaoluu.png" alt="">`);
                        $('.content_event').html(responsive.data.content);
                        $('.form_create_question,.fndskl').attr('data-id', responsive.data.id);
                        $('.location').html(responsive.data.vi_tri_dang);
                        for (var i = 0; i < responsive.data.arr_ep.length; i++) {
                            $('.member_event').append(
                                `<div class="img-thanhvien">
                            <div class="show-hide">
                            <img class="v_del_member_event" src="../img/v_del.svg" alt="Ảnh lỗi" data-pos="` + i + `" data-id="` + responsive.data.arr_ep[i].id_event_join + `" onclick="v_del_member_event(this)">
                            <img class="img_thu imgsk_tvtg" src="` + responsive.data.arr_ep[i].avatar + `" alt="Ảnh lỗi">
                            </div>
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
                        for (var i = 0; i < responsive.data.question.length; i++) {
                            $('.question_popup').append(`<div class="img-cauhoi-sk">
                        <div class="imgcauhoi show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.data.question[i].avatar + `" alt=""></div>
                        <div class="text-cauhoi-sk">
                            <div class="text-cauhoi-sk-tren">
                                <p class="text-ch1">` + responsive.data.question[i].name + `&ensp;<span class="text2">` + responsive.data.question[i].position + `</span>
                                </p>
                                <p class="text-ch3">` + responsive.data.question[i].content + `</p>
                            </div>
                            <p class="text-ch4">` + responsive.data.question[i].time + `</p>
                        </div>
                    </div>`);
                        }
                    }
                } else {
                    if (responsive.result == true) {
                        $('.member_event_dn,.list_ep_dn,.question_popup').html('');
                        $('.title_dn').html(responsive.data.new_title + `<img class="xemchitiet-dn img_detail_event_noibo" onclick="xemchitiet_dn(` + id + `,4);" src="../img/skgiaoluu.png" alt="">`);
                        $('.content_dn').html(responsive.data.content);
                        var quyen = 'Quyền riêng tư';
                        if (responsive.data.event_mode == 1) {
                            quyen = 'Công khai';
                        }
                        $('.event_mode_dn').html(quyen);
                        $('.ten_dg').html(responsive.data.speakers_name);
                        $('.chuc_vu_dg').html(responsive.data.speakers_position);
                        $('.sdt_dg').html(responsive.data.speakers_phone);
                        $('.email_dg').html(responsive.data.speakers_email);
                        var image = '/img/new_feed/event/event_doi_ngoai/speakers_avatar/' + responsive.data.avatar_dien_gia;
                        $('.image_dg').attr('src', responsive.data.avatar_dien_gia);
                        $('.form_create_question,.csgl_giamdoc').attr('data-id', responsive.data.id);
                        $('.location_dn').html(responsive.data.vi_tri_dang);
                        $('.list_table-dn').find('.tr_dn').remove();
                        for (var i = 0; i < responsive.data.list_guests.length; i++) {
                            $('.list_table-dn').append(
                                `<tr class="tr_dn">
                                    <td>` + (i + 1) + `</td>
                                    <td>` + responsive.data.list_guests[i].name_guest + `</td>
                                    <td>` + responsive.data.list_guests[i].name_company + `</td>
                                    <td>` + responsive.data.list_guests[i].name_position + `</td>
                                </tr>`
                            );
                        }

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
                        for (var i = 0; i < responsive.data.question.length; i++) {
                            $('.question_popup').append(`<div class="img-cauhoi-sk">
                        <div class="imgcauhoi show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.data.question[i].avatar + `" alt=""></div>
                        <div class="text-cauhoi-sk">
                            <div class="text-cauhoi-sk-tren">
                                <p class="text-ch1">` + responsive.data.question[i].name + `&ensp;<span class="text2">` + responsive.data.question[i].position + `</span>
                                </p>
                                <p class="text-ch3">` + responsive.data.question[i].content + `</p>
                            </div>
                            <p class="text-ch4">` + responsive.data.question[i].time + `</p>
                                </div>
                            </div>`);
                        }
                    }
                }
            }
        });
    }
});

$(".btn_them_cau_hoi").click(function() {
    var content = $(this).parents('.form_group').find('.cauhoi').val();
    var id = $(this).parents('.form_group').attr('data-id');
    if (content != '' && id != '') {
        var data = new FormData();
        data.append('id', id);
        data.append('content', content);
        $.ajax({
            url: "../ajax/create_question_event.php",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            data: data,
            success: function(responsive) {
                if (responsive.result == true) {
                    $('.question_popup').append(`<div class="img-cauhoi-sk">
                        <div class="imgcauhoi show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.avatar + `" alt=""></div>
                        <div class="text-cauhoi-sk">
                            <div class="text-cauhoi-sk-tren">
                                <p class="text-ch1">` + responsive.name + `&ensp;<span class="text2">` + responsive.position + `</span>
                                </p>
                                <p class="text-ch3">` + content + `</p>
                            </div>
                            <p class="text-ch4">` + responsive.time + `</p>
                        </div>
                    </div>`);
                    $('.cauhoi').val('');
                }
            }
        });
    }
});

function xemchitiet_dn(id, type) {
    if (id != '') {
        var data = new FormData();
        data.append('id', id);
        $.ajax({
            url: "../ajax/detail_event.php",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            data: data,
            success: function(responsive) {
                if (type == 3) {
                    if (responsive.result == true) {
                        $('.edit_member_event_nb,.edit_list_ep_nb,.question_popup,.title_event').html('');
                        $('.edit_title_nb').html("Chỉnh sửa " + responsive.data.new_title);
                        $('.edit_content_nb').val(responsive.data.content);

                        var list_dep = '<option ';
                        if (responsive.data.position == 0) {
                            list_dep += 'selected';
                        }
                        list_dep += ' value="0">Tường công ty</option>';
                        for (let i = 0; i < responsive.data.list_department.length; i++) {
                            list_dep += '<option ';
                            if (responsive.data.position == responsive.data.list_department[i].dep_id) {
                                list_dep += 'selected';
                            }
                            list_dep += ' value="' + responsive.data.list_department[i].dep_id + '">' + responsive.data.list_department[i].dep_name + '</option>';
                        }
                        $('.department_edit_nb').html(list_dep);
                        for (var i = 0; i < responsive.data.arr_ep.length; i++) {
                            $('.edit_member_event_nb').append(
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
                        //edit_question_popup_nb
                        for (let i = 0; i < responsive.data.list_ep.length; i++) {
                            $('.edit_list_ep_nb').append(`
                            <option value=` + responsive.data.list_ep[i].ep_id + `>` + responsive.data.list_ep[i].ep_name + `</option>
                            `);
                        }

                        for (var i = 0; i < responsive.data.question.length; i++) {
                            $('.edit_question_popup_nb').append(`<div class="img-cauhoi-sk">
                        <div class="imgcauhoi show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.data.question[i].avatar + `" alt=""></div>
                        <div class="text-cauhoi-sk">
                            <div class="text-cauhoi-sk-tren">
                                <p class="text-ch1">` + responsive.data.question[i].name + `&ensp;<span class="text2">` + responsive.data.question[i].position + `</span>
                                </p>
                                <p class="text-ch3">` + responsive.data.question[i].content + `</p>
                            </div>
                            <p class="text-ch4">` + responsive.data.question[i].time + `</p>
                                </div>
                            </div>`);
                        }
                        $('#csskgl').attr('data-id', id);
                        $('.form_create_question').attr('data-id', responsive.data.id);
                        $(".vd8_chinhsua_sk").show();
                        $(".vd7_xemchitiet_dn").hide();
                    }
                } else {
                    if (responsive.result == true) {
                        $('.edit_member_event_dn,.edit_list_ep_dn,.edit_question_popup_dn').html('');
                        $('.title_edit_dn').html("Chỉnh sửa " + responsive.data.new_title);
                        $('.content_edit_dn').val(responsive.data.content);
                        var quyen = 'Quyền riêng tư';
                        var arr_quyen = ['Công khai', 'Riêng tư'];
                        var html = '';
                        for (var i = 0; i < arr_quyen.length; i++) {
                            html += `<option`;
                            if (responsive.data.event_mode == (i + 1)) {
                                html += ' selected';
                            }
                            html += ` value="` + (i + 1) + `">` + arr_quyen[i] + `</option>`;
                        }
                        $('.quyen_edit_dn').html(html);

                        var list_dep = '<option ';
                        if (responsive.data.position == 0) {
                            list_dep += 'selected';
                        }
                        list_dep += ' value="0">Tường công ty</option>';
                        for (let i = 0; i < responsive.data.list_department.length; i++) {
                            list_dep += '<option ';
                            if (responsive.data.position == responsive.data.list_department[i].dep_id) {
                                list_dep += 'selected';
                            }
                            list_dep += ' value="' + responsive.data.list_department[i].dep_id + '">' + responsive.data.list_department[i].dep_name + '</option>';
                        }
                        $('.department_edit').html(list_dep);
                        $('.edit_name_dg_dn').val(responsive.data.speakers_name);
                        $('.edit_chucvu_dg_dn').val(responsive.data.speakers_position);
                        $('.edit_sdt_dg_dn').val(responsive.data.speakers_phone);
                        $('.edit_email_dg_dn').val(responsive.data.speakers_email);
                        $('.edit_img_dg_dn').val(responsive.data.speakers_avatar);



                        $('.event_mode_dn').html(quyen);
                        $('.ten_dg').html(responsive.data.speakers_name);
                        $('.chuc_vu_dg').html(responsive.data.speakers_position);
                        $('.sdt_dg').html(responsive.data.speakers_phone);
                        $('.email_dg').html(responsive.data.speakers_email);
                        var image = '/img/new_feed/event/event_doi_ngoai/speakers_avatar/' + responsive.data.avatar_dien_gia;
                        $('.image_dg').attr('src', responsive.data.avatar_dien_gia);
                        $('.vd10cssk').attr('data-id', id);
                        $('.form_create_question').attr('data-id', responsive.data.id);
                        $('.location_dn').html(responsive.data.vi_tri_dang);
                        $('.edit_tr_dn').remove();
                        for (var i = 0; i < responsive.data.list_guests.length; i++) {
                            $('.edit_khach_dn').find('tbody').append(
                                ` <tr class='edit_tr_dn' >
                                        <td>` + (i + 1) + `</td>
                                        <td> <input class="tr_them_km name_guest" value="` + responsive.data.list_guests[i].name_guest + `" disabled type="" name="" placeholder="Nhập họ tên/"></td>
                                        <td> <input class="tr_them_km name_company" type="" name="" value="` + responsive.data.list_guests[i].name_company + `" disabled placeholder="Nhập công ty/"></td>
                                        <td> <input class="tr_them_km name_position" type="" name="" value="` + responsive.data.list_guests[i].name_position + `" disabled placeholder="Nhập chức vụ/"></td>
                                        <td><img class="xsukiendoingoai" src="../img/xsukiendoingoai.png" alt="" onclick="remove_tr_dn(this);"></td>
                                    </tr>`);
                        }
                        for (var i = 0; i < responsive.data.arr_ep.length; i++) {
                            $('.edit_member_event_dn').append(
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
                            $('.edit_list_ep_dn').append(`
                        <option value=` + responsive.data.list_ep[i].ep_id + `>` + responsive.data.list_ep[i].ep_name + `</option>
                        `);
                        }
                        for (var i = 0; i < responsive.data.question.length; i++) {
                            $('.edit_question_popup_dn').append(`<div class="img-cauhoi-sk">
                        <div class="imgcauhoi show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.data.question[i].avatar + `" alt=""></div>
                        <div class="text-cauhoi-sk">
                            <div class="text-cauhoi-sk-tren">
                                <p class="text-ch1">` + responsive.data.question[i].name + `&ensp;<span class="text2">` + responsive.data.question[i].position + `</span>
                                </p>
                                <p class="text-ch3">` + responsive.data.question[i].content + `</p>
                            </div>
                            <p class="text-ch4">` + responsive.data.question[i].time + `</p>
                                </div>
                            </div>`);
                        }
                        $(".vd10_chinhsua_sk").show();
                        $(".vd9_xemchitiet_dn").hide();
                    }
                }
            }
        });
    }
}

function remove_tr_dn(e) {
    $(e).parents('tr').remove();
}

function open_file() {
    $('.edit_img_dg_dn').css('display', 'none');
}
// $(".xem-chi-tiet .xem-doingoai").click(function() {
//         $(".vd9_xemchitiet_dn").show();
//     })
/////////////////

$(".sk-noi-bo").click(function() {
    $(".sukien-nv").show();
    $(".sk22").show();
    $(".sk33").hide();
    $(".sukien-nv.sk11").hide();
    $(".caidat-doingoai").hide();
})

$(".sknb2").click(function() {
    $(".sk22").hide();
    $(".sukien-nv.sk11").show();
})


$(".sk-doi-ngoai").click(function() {
    $(".sk33").show();
    $(".sukien-nv.sk11").hide();
    // $(".caidat-doingoai").show();
    // $(".caidat-doinoi").hide();
})

$('.imgsk_tvtg').hover(function() {
    $(this).parents('.show-hide').find('.hvshow').toggle();
})


$('img.img_xoask').click(function() {
    $(".xoa-sk-nhan-vien").show();
})

$('.btn_huy').click(function() {
    $(".xoa-sk-nhan-vien").hide();
})


$('.btl-xoa-sk-nhan-vien').click(function() {
    $(".xoa-sk-nhan-vien").hide();
    $(".xoa-sknv").show();
})

$(".btn-da-xoa").click(function() {
    $(".xoa-sknv").hide();
})
$(".close_detl").click(function() {
    $(".xoa-sk-nhan-vien").hide();
})

$(".btn_huy").click(function() {
    $(".xoa-sknv").hide();
    $(".vd8_chinhsua_sk").hide();
})


$("p.tham-gia").click(function() {
    $(".thamgia-sknv").show();
})
$("img.close_detl").click(function() {
    $(".vd7_xemchitiet_sk").hide();
})
$(".btn_huy").click(function() {
    $(".vd7_xemchitiet_sk").hide();
})

$("button.btn_luu.luu-thong").click(function() {
    // $(".luu-sknv").show();
})

$("img.imgskgiaoluu").click(function() {
    $(".vd8_chinhsua_sk").show();
})
$("img.close_detl").click(function() {
        $(".vd8_chinhsua_sk").hide();
    })
    // doi ngoai
    // $(".xem-chi-tiet .xem-doingoai").click(function() {
    //     $(".vd9_xemchitiet_dn").show();
    // })

$('.imgsk_tvtg').hover(function() {
    $(this).parents('.show-hide').find('.hvshow').toggle();
})

$(".xem-doingoai").click(function() {
    $(".vd9_xemchitiet_dn").show();
})


$(".vd9_xemchitiet_dn img.close_detl").click(function() {
    $(".vd9_xemchitiet_dn").hide();
})

$(".vd9_xemchitiet_dn button.btn_huy").click(function() {
    $(".vd9_xemchitiet_dn").hide();
})

$(".vd9_xemchitiet_dn img.xemchitiet-dn").click(function() {
    $(".vd10_chinhsua_sk").show();

})
$(".vd10_chinhsua_sk img.close_detl").click(function() {
    $(".vd10_chinhsua_sk").hide();
})

$(".vd10_chinhsua_sk button.btn_huy").click(function() {
    $(".vd10_chinhsua_sk").hide();
})



$('.vd10_chinhsua_sk img.hienlethithu').hover(function() {
    $(this).parents('.hai-img').find('.xsukiendn').toggle();
})

$("img.xsukiendn").click(function() {
    $(this).parent().parent().hide();
})

$("img.xsukiendn").click(function() {
    $(this).parent().parent().hide();
})

$(".sknb2 .skdn3").click(function() {
    $(".caidat-doingoai").hide();
    $(".caidat-doinoi").show();
})

$(window).click(function(e) {
    if ($(e.target).is(".xoa-sknv")) {
        $(".xoa-sknv").hide();
        // }
        // if ($(e.target).is(".luu-sknv")) {
        //     $(".luu-sknv").hide();
    }
    if ($(e.target).is(".thamgia-sknv")) {
        $(".thamgia-sknv").hide();
    }
    if ($(e.target).is(".xoa-sknv")) {
        $(".xoa-sknv").hide();
    }


    if ($(e.target).is(".vd9_xemchitiet_dn")) {
        $(".vd9_xemchitiet_dn").hide();
    }
    if ($(e.target).is(".vd10_chinhsua_sk")) {
        $(".vd10_chinhsua_sk").hide();
    }
    if ($(e.target).is(".vd7_xemchitiet_sk")) {
        $(".vd7_xemchitiet_sk").hide();
    }
    if ($(e.target).is(".vd8_chinhsua_sk")) {
        $(".vd8_chinhsua_sk").hide();
    }
    if ($(e.target).is(".xoa-sk-nhan-vien")) {
        $(".xoa-sk-nhan-vien").hide();
    }

});

if ($(window).width() <= 480) {
    $("p.text-gd").click(function() {
        $(".vd7_xemchitiet_sk").show();
    })
};


$(document).ready(function() {
    $("a.athems").click(function() {
        $('.edit_khach_dn').find('tbody').append('<tr><td></td><td><input class="tr_them_km name_guest" type="" name="" placeholder="Nhập họ tên/"></td><td><input class="tr_them_km name_company" type="" name="" value="" placeholder="Nhập công ty/"></td><td><input class="tr_them_km name_position" type="" name="" value="" placeholder="Nhập chức vụ/"></td><td></td></tr>');
    });
});
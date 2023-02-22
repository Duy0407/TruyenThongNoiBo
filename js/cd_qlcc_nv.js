function v_nut_chinhsua(e) {
    $(e).find('.popup-chinhsua').toggle(400);
}

$(document).mouseup(function (e) {
    var container = $('.popup_working_rules');
    var container2 = $('.v_nut-tuychinhnt');
    if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
        $('.popup_working_rules').hide();
    }
});
$(document).ready(function () {
    // bắt sự kiện click chuột ẩn hiện
    $(document).mouseup(function (e) {
        var container = $(".v_edit_detail,.popup-chinhsua-cmt");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide(250);
        }
    });

    $(".nut-chinhsua").click(function () {
        $(this).find('.popup-chinhsua').toggle(400);
    });
    // văn hóa doanh nghiệp 

    $('.img-logo').click(function () {
        $('#selectedFile_bannerct').click();
    })
    $('.img-anhbia').click(function () {
        $('#selectedFile_bannerct').click();
    })
    if ($(window).width() <= 414) {
        $('#icon-menu').click(function () {
            $('.trang').css('width', '100%');
            $('.co-sidebar-phai .side-bar-phai .trang .icon-menu>.container').show();
            $('#hien-trang').show();
        })
        $('#icon-quayve').click(function () {
            $('.trang').css('width', '0px');
            $('.co-sidebar-phai .side-bar-phai .trang .icon-menu>.container').hide();
        })
    };
    $('.menu-phu .menu-phu-d').mouseover(function () {
        $('.menu-phu .menu-phu-d').addClass('show_li');
    })

    $('.menu-phu .menu-phu-d').mouseleave(function () {
        $('.menu-phu .menu-phu-d').removeClass('show_li');
    })
    $(".nut-edit-tamnhin").click(function () {
        $("#model-chinhsuattct").show();
    })
    $(".nut-tamnhin").click(function () {
        $("#model_editnoidungtamnhin").show();
    })
    $(".nut-sumenh").click(function () {
        $("#model_editnoidungsumenh").show();
    })
    $(".nut-themgiatri").click(function () {
        $("#model_themgtcotloi").show();
    })
    $(".nut-themchienluoc").click(function () {
        $("#model_themmuctieu-chienluoc").show();
    })
    $(".nut-themnguyentac").click(function () {
        $("#model_themnguyentac").show();
    })
    $(".nut-tuychinhgiatri").click(function () {
        $(this).find('.popup-vh-edit').toggle(400);
    })
    $(".nut-edit-gtcl").click(function () {
        var id = $(this).data('id');
        $.ajax({
            url: '../ajax/detail_core_value.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {
                var element = $(".model_suagtcotloi");
                element.find('.title').val(data.data.tittle);
                element.find('.content').val(data.data.content);
                element.find('.img_thaydoi').attr('src', '../img/vanhoadoanhnghiep/core_value/' + data.data.id_user + '/' + data.data.cover_image);
                element.find('.btn_luu').val(data.data.id);
            }
        });

        $("#model_suagtcotloi").show();

    })
    $(".nut-xoa-gtcl").click(function () {
        var id = $(this).data('id');
        $("#xoa_giatricotloi").find('.btn_luu').val(id);
        $("#xoa_giatricotloi").fadeIn('', function () {
            $("#xoa_giatricotloi .btn_xoa_gtcl").click(function () {
                $.ajax({
                    url: '../ajax/delete_core_value.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        if (data.result == true) {
                            window.location.href = window.location.href;
                        }
                    }
                });

            });
        });

    })
    $(".v_core_value").click(function () {
        $(".v_baiviet_ul_core_value").show();
        $(".v_baiviet_ul_target").hide();
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '3px solid #4C5BD4'
        });
        $(".v_target").css({
            'color': '#666666',
            'borderBottom': 'none'
        });
    });
    $(".v_target").click(function () {
        $(".v_baiviet_ul_target").show();
        $(".v_baiviet_ul_core_value").hide();
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '3px solid #4C5BD4'
        });
        $(".v_core_value").css({
            'color': '#666666',
            'borderBottom': 'none'
        });
    });
    $(".add_core_value").click(function () {
        $("#model_themgtcotloi").show();
    });
    $(".add_target").click(function () {
        $("#model_themmuctieu-chienluoc").show();
    });
    $(".nut-tuychinhmt").click(function () {
        $("#model_tuychinhmuctieu").toggle(400);
    })
    $(".nut-edit-mt").click(function () {
        var id = $(this).data('id');
        $.ajax({
            url: '../ajax/detail_target.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {
                var element = $(".form-body");
                element.find('.title_target').val(data.data.title);
                element.find('.content_target').val(data.data.content);
                element.find('.img_thaydoi').attr('src', data.data.cover_image);
                element.find('.id_target').val(data.data.id);
                if (data.data.comment == 1) {
                    $('.checkbox_target').prop('checked', true);
                }
            }
        });
        $("#model_suamuctieu-chienluoc").show();
    })
    $(".nut-xoa-mt").click(function () {
        $("#xoa_muctieu-chienluoc").show();
        var id = $(this).attr('data-id');
        var value = $(this).attr('data-value');
        $("#title_target").html(value);
        $("#delete_target").attr('data-id', id);
    })
    $("#delete_target").click(function () {
        var id = $(this).data('id');
        $.ajax({
            url: '../ajax/delete_target.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {
                if (data.result == true) {
                    $('#giatri-muctieu' + id).css('display', 'none');
                    $('#xoa_muctieu-chienluoc').css('display', 'none');
                }
            }
        });
    });
    $(".v_nut-tuychinhnt").click(function () {
        $(this).find('.popup_working_rules').toggle();
    })
    $(".v_name_file_rules").click(function () {
        $(this).next().click();
    });
    $('.file_edit_rules').change(function () {
        var name = $('.file_edit_rules').prop('files')[0].name;
        $(".v_name_file_rules").val(name);
    });
    $(".nut-edit-nt").click(function () {
        var id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "../ajax/get_working_rules.php",
            data: {
                id: id
            },
            dataType: "json",
            success: function (data) {
                var element = $(".model_chinhsuanguyentac");
                element.find('.name_working_rules').val(data.data.name);
                element.find('.content').val(data.data.content);
                element.find('.v_name_file_rules').val(data.data.img);
                if (data.data.comment == 1) {
                    element.find('.comment').prop('checked', true);
                }
                element.find('.id_rules').val(data.data.id);
            }
        });
        $("#model_chinhsuanguyentac").show();
    });
    $('body').click(function (e) {
        if (e.target.id == 'model_chinhsuanguyentac') {
            $("#model_chinhsuanguyentac").hide();
        }
    });

    $(".nut-xoa-nt").click(function () {
        var id = $(this).data('id');
        $("#xoa_nguyentac").fadeIn('', function () {
            $("#xoa_nguyentac").find('.id_rules').val(id);
            $('#xoa_nguyentac .btn_luu').click(function () {
                $.ajax({
                    type: "POST",
                    url: "../ajax/hide_working_rules.php",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data.result == true) {
                            $('#xoa_nguyentac').hide();
                            $('.v_check_ring').show().find('#v_check_ring_content').text('Bạn đã xóa thành công');
                            setTimeout(function () {
                                window.location.href = window.location.href;
                            }, 1000);
                        }
                    }
                });
            });
        });
    })

    $(".nut-chitietthutuceo").click(function () {
        $("#model_chitietthu").show();
    })

    $('.nut-xoathutuceo').click(function () {
        var title_mail = $(this).parents('.container_mail').find('.detail_mail_from_ceo').text();
        $("#xoa_thutuceo").find('.title_mail').text(title_mail);
        var id = $(this).data('id');
        $('#xoa_thutuceo').fadeIn('', function () {
            $('#xoa_thutuceo .btn_luu').click(function () {
                $.ajax({
                    url: '../ajax/delete_mail_from_ceo.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        if (data.result == true) {
                            $("#xoa_thutuceo").hide();
                            $(".v_check_ring").show().find('#v_check_ring_content').text("Bạn đã xóa thư thành công");
                            window.location.href = window.location.href;
                        }
                    }
                });
            });
        });
    });

    var close_detl = $('.close_detl');
    var btn_huy = $('.btn_huy');
    close_detl.click(function () {
        $("#model-chinhsuattct").hide();
        $("#model_editnoidungtamnhin").hide();
        $("#model_editnoidungsumenh").hide();
        $("#model_themgtcotloi").hide();
        $("#model_themmuctieu-chienluoc").hide();
        $("#model_themnguyentac").hide();
        $("#model_suagtcotloi").hide();
        $("#xoa_giatricotloi").hide();
        $("#model_suamuctieu-chienluoc").hide();
        $("#model_suanguyentac").hide();
        $('#model_chitietthu').hide();
        $("#model_chinhsuachiaseytuong_sdn").hide();
        $(".v_detail_event_internal").hide();
        $("#model_chinhsuasukiendoingoai").hide();
        $("#model_chinhsuathaoluan").hide();
        $("#model-chinhsuabinhchon").hide();
        $("#model_chinhsuatinnoibo").hide();
        $(".xoa-binh-luan").hide();
        $("#model_chinhsuanguyentac").hide();
    })
    btn_huy.click(function () {
        $("#model-chinhsuattct").hide();
        $("#model_editnoidungtamnhin").hide();
        $("#model_editnoidungsumenh").hide();
        $("#model_themgtcotloi").hide();
        $("#model_themmuctieu-chienluoc").hide();
        $("#model_themnguyentac").hide();
        $("#model_suagtcotloi").hide();
        $("#xoa_giatricotloi").hide();
        $("#model_suamuctieu-chienluoc").hide();
        $("#xoa_muctieu-chienluoc").hide();
        $("#model_suanguyentac").hide();
        $("#xoa_nguyentac").hide();
        $("#model_chitietthu").hide();
        $("#xoa_thutuceo").hide();
        $(".v_detail_event_internal").hide();
        $("#model_chinhsuasukiendoingoai").hide();
        $("#model_chinhsuathaoluan").hide();
        $("#model-chinhsuabinhchon").hide();
        $("#model_chinhsuatinnoibo").hide();
        $(".xoa-binh-luan").hide();
        $("#model_chinhsuanguyentac").hide();
    })

    $(".v_giatri-muctieu02_p").click(function () {
        if ($(window).width() <= 480) {
            $(this).parents(".giatri-muctieu_detail").next().toggle();
        }
    });

    $(window).click(function (e) {
        if ($(e.target).is('#model-chinhsuattct')) {
            $('#model-chinhsuattct').hide();

        }

        if ($(e.target).is('#model_editnoidungtamnhin')) {
            $('#model_editnoidungtamnhin').hide();
        }

        if ($(e.target).is("#model_editnoidungsumenh")) {
            $("#model_editnoidungsumenh").hide();
        }

        if ($(e.target).is('#model_themgtcotloi')) {
            $('#model_themgtcotloi').hide();

        }

        if ($(e.target).is('#model_themmuctieu-chienluoc')) {
            $('#model_themmuctieu-chienluoc').hide();
        }
        if ($(e.target).is("#model_themnguyentac")) {
            $("#model_themnguyentac").hide();
        }
        // if ($(e.target).is("#model_tuychinhbaiviet")) {
        //     $("#model_tuychinhbaiviet").hide();
        // }
        if ($(e.target).is("#model_suagtcotloi")) {
            $("#model_suagtcotloi").hide();
        }
        if ($(e.target).is("#xoa_giatricotloi")) {
            $("#xoa_giatricotloi").hide();
        }
        if ($(e.target).is("#model_suamuctieu-chienluoc")) {
            $("#model_suamuctieu-chienluoc").hide();
        }
        if ($(e.target).is("#xoa_muctieu-chienluoc")) {
            $("#xoa_muctieu-chienluoc").hide();
        }
        if ($(e.target).is("#model_suanguyentac")) {
            $("#model_suanguyentac").hide();
        }

        if ($(e.target).is("#xoa_nguyentac")) {
            $("#xoa_nguyentac").hide();
        }
        if ($(e.target).is("#model_chitietthu")) {
            $("#model_chitietthu").hide();
        }
        if ($(e.target).is("#xoa_thutuceo")) {
            $("#xoa_thutuceo").hide();
        }
        if ($(e.target).is(".trang")) {
            $('.trang').css('width', '0px');
        }

    });
    // bắt sự kiện click chuột ẩn hiện văn hóa doanh nghiệp

    // bắt sự kiện click trang chủ sau đăng nhâp 

    $('.taianh').click(function () {
        $('#nut-taianh').click();
    })
    $(document).mouseup(function (e) {
        var container = $(".v_popup_nhacten");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });
    $(".v_nhacten_detail").click(function () {
        $(".v_popup_nhacten").toggle();
    });
    $(".edit").click(function () {
        $(this).find('.v_edit_detail').toggle();
    });
    $('.nut-like').click(function () {
        var solike = Number($(this).parents('.reach').find('.so-like').text());
        solike += 1;
        $(this).parents('.reach').find('.so-like').text(solike);
    });

    // $('.edit-cmt').click(function() {
    //     $(this).find('.popup-chinhsua-cmt').toggle(300);
    // });
    var i = 0;
    $('.add_guest').click(function () {
        var element_parent = $(this).parents('form');
        var i = element_parent.find('.list_guest_tr').length + 1;
        var themrow =
            ' <tr class="list_guest_tr"><td>' + i +
            '</td><td><input type="text" placeholder="Nhập họ và tên" class="name_guest"></td><td><input type="text" placeholder="Nhập tên công ty" class="name_company"></td><td><input type="text" placeholder="Nhập chức vụ" class="name_position"></td></tr>'
        element_parent.find('.kmtg tbody tr:last-child').before(themrow);
    });
    $('.select2_t_company').change(function () {
        var value_box = $(this).val();
        if (value_box == 2) {
            $('.form_group_an').show();
        } else {
            $('.form_group_an').hide();
        }
    });
    // $('.xem-binhluan').click(function() {
    //     $(this).parents('.baiviets-footer').find('.xemthem').show(400);
    //     $(this).hide();
    //     $(this).parents('.baiviets-footer').find('.thugon-binhluan').show(400);
    // })
    $('.thugon-binhluan').click(function () {
        // $(this).parents('.baiviets-footer').find('.xemthem').hide(400);
        $(this).hide();
        $(this).parents('.baiviets-footer').find('.xem-binhluan').show(400);
    })

    $('#nut-sda').click(function () {
        $('#model_suaduan').show();
        $(".v_name_header_alert").text("Tạo thông báo");
        $("#v_model_create_alert").removeClass("model_sua_alert").addClass("model_suaduan");
    });

    $("#thongbao_tinnhan #nut-csyt").click(function () {
        $("#model_chiaseytuong_sdn").show();
    });

    $('#thongbao_tinnhan #nut-tsk').click(function () {
        $('#model_taosukien_sdn').show();
    });
    $('#nut-tsknb_sdn').click(function () {
        $('#model_taosukien_noibo_sdn').show();
    });

    $('.nut-bat-baiviet').click(function () {
        $('#bat_baiviet').show();
    });
    $('.popup-chinhsua .nut-xoa-baiviet').click(function () {
        $("#v_id_newfeed").val($(this).find(".p_model").data('new_id'));
        $("#v_position_li").val($(this).parents(".v_newfeed_li").index());
        $('#xoa_baiviet').show();
    });

    //các phần liên quan của thư từ CEO
    $(".mail_from_ceo").submit(function () {
        var element = $(".mail_from_ceo");
        var flag = true;
        if (element.find(".title_mail").val() == "") {
            element.find(".title_mail").next().text('Không được để trống');
            element.find(".title_mail").focus();
            flag = false;
        } else {
            element.find(".title_mail").next().text('');
        }
        if (element.find('.file').prop('files')[0] == undefined) {
            element.find(".file").next().text('Không được để trống');
            element.find(".file").focus();
            flag = false;
        } else if (element.find('.file').prop('files')[0].size > 10485760) {
            element.find(".file").next().text('Vui lòng upload file dưới 10MB');
            element.find(".file").focus();
            flag = false;
        } else {
            element.find(".file").next().text('');
        }

        if (element.find('.content').val() == "") {
            element.find(".content").next().text('Không được để trống');
            element.find(".content").focus();
            flag = false;
        } else {
            element.find(".content").next().text('');
        }

        if (element.find('.sent_alert').prop('checked') == false && element.find('.sent_alert_mail').prop('checked') == false) {
            element.find('.error_sent').text('Vui lòng chọn hình thức thông báo');
            flag = false;
        } else {
            element.find('.error_sent').text('');
        }

        if (flag == false) {
            return false;
        } else {
            $(".v_check_ring").show().find('#v_check_ring_content').text('Bạn đã tạo thư từ CEO thành công');
        }
    });

    $(".detail_mail_from_ceo").click(function () {
        var id = $(this).data('id');
        $.ajax({
            url: '../ajax/detail_mail_from_ceo.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {
                var element = $("#model_chitietthu");
                element.find('.name_mail').text(data.data.title_mail);
                element.find('.user_sent').text('Người cập nhật: ' + data.data.user_sent);
                element.find('.created_at').text(data.data.created_at);
                element.find('.link_1').attr('href', '../img/vanhoadoanhnghiep/thutuceo/' + data.data.file);
                element.find('.name_file').text(data.data.file);
                element.find('.content_mail').text(data.data.content);
                console.log(data);
            }
        });

    });
    // Xóa bài viết
    $(".v_xoa_bai_viet").click(function () {
        var new_id = $("#v_id_newfeed").val();
        var li_position = $("#v_position_li").val();
        $.ajax({
            url: "../ajax/delete_post.php",
            type: "POST",
            dataType: "json",
            data: {
                new_id: new_id
            },
            success: function (data) {
                $(".v_newfeed_li").eq(li_position).remove();
                $("#xoa_baiviet").fadeOut();
                $("#v_check_ring_content").text("Bạn đã xóa bài viết thành công");
                $(".v_check_ring").fadeIn();
                setTimeout(function () {
                    $(".v_check_ring").fadeOut();
                }, 2000);
            },
            error: function () {
                alert("Có lỗi xảy ra.Vui lòng thử lại");
            }
        });
    })
    $("#tuychinh_d").click(function () {
        $("#popup-tuychinh_d").toggle(400);
    })
    $(document).mouseup(function (e) {
        var container = $("#tuychinh_d");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.find("#popup-tuychinh_d").hide(400);
        }
    })
    $("#xemthongbao").click(function () {
        $("#tatcathongbao").toggle();
        $("#baiviet-header").toggle();
        $("#main-baiviet").toggle();
    })
    $("#tatca-tv").click(function () {
        $(".main-baiviet ul .tt-thanhvien .body .container").show(300);
        $("#tatca-tv p").addClass('color_chon')
        $('#online-tv p').removeClass('color_chon');
        $('#quantri-tv p').removeClass('color_chon');
    })
    $("#online-tv").click(function () {
        $("#online-tv p").addClass('color_chon');
        $('#tatca-tv p').removeClass('color_chon');
        $('#quantri-tv p').removeClass('color_chon');
        $(".main-baiviet ul .tt-thanhvien .body .container").hide(300);
        $(".main-baiviet ul .tt-thanhvien .body .thanhvien-hd").show(300);
    })
    $("#quantri-tv").click(function () {
        $("#quantri-tv p").addClass('color_chon');
        $('#tatca-tv p').removeClass('color_chon');
        $('#online-tv p').removeClass('color_chon');
        $(".main-baiviet ul .tt-thanhvien .body .container").hide(300);
        $(".main-baiviet ul .tt-thanhvien .body .thanhvien-qt").show(300);
    })
    $("#hientatca-tt").click(function () {
        $("#center .baiviet-search").hide();
        $(".baiviet-header").hide();
        $(".main-baiviet ul li").hide();
        $('#tatcathongbao').hide();
        $(".main-baiviet ul .tt-thanhvien").show();
    })

    var btn_del_all_thongbao = $('.btn_del_all_thongbao');
    var xoa_tatcathongbao = $('#xoa_tatcathongbao');
    btn_del_all_thongbao.click(function () {
        xoa_tatcathongbao.show();
    })

    $(".btn_huy_xoatatca").click(function () {
        xoa_tatcathongbao.hide();
    })

    $(".del_thongbao").click(function () {
        $(this).parents('.thongbao').find('.xoa_thongbao').show();
    })

    $(".chitiet_tb").click(function () {
        $(this).parents('.thongbao').find('.chitiet_thongbao').show();
    })

    $("#btn_sua_baiviet").click(function () {
        $("#model_suanhanhbaiviet").show();
    })

    $(window).click(function (e) {
        if (!$("#nhacten").is(e.target) && $("#nhacten").has(e.target).length === 0) {
            $("#popup-nhacten").hide();
        }
        var model_taobinhluan = $('#model_taothaoluan');
        if ($(e.target).is('#model_taothaoluan')) {
            model_taobinhluan.hide();
        }

        if ($(e.target).is('#model_taosukien_sdn')) {
            $('#model_taosukien_sdn').hide();
        }

        if ($(e.target).is('#model_suaduan')) {
            $('#model_suaduan').hide();

        }
        if ($(e.target).is("#model_chiaseytuong_sdn")) {
            $("#model_chiaseytuong_sdn").hide();
        }
    });
});


//truyền thông nội bộ 

$(document).ready(function () {
    var i = 0;
    $('.select2_t_company').change(function () {
        var value_box = $(this).val();
        if (value_box == 2) {
            $('.form_group_an').show();
        } else {
            $('.form_group_an').hide();
        }
    })
    $('.side-bar-phai>.dropdown .congty-info a').click(function () {
        var text = $(this).text();
        var img = $(this).children().children().attr('src');
        $('.side-bar-phai>.dropdown .dropbtn .cont p ').text(text);
        $(".side-bar-phai>.dropdown .dropbtn .img img").attr("src", '' + img + '');
    })

    $("#nut-ttb").click(function () {
        $("#model_taothongbao").show();
    })
    $("#nut-cdtvm").click(function () {
        $("#model_chaodonthanhvienmoi").show();
    })
    $("#truyenthongnoibo #nut-tsk").click(function () {
        $("#model_taosukien").show();
    })
    $("#nut-tsknb").click(function () {
        $("#model_taosukien_noibo").show();
    })
    $("#model_taosukien #nut-tskdn").click(function () {
        $("#model-taosukiendoingoai").show();
    })

    $("#model_taosukien_sdn #nut-tskdn").click(function () {
        $("#model-taosukiendoingoai_sdn").show();
        $("#model-taosukiendoingoai_sdn").css('z-index', '3');
    })

    $("#nut-ttl").click(function () {
        $("#model_taothaoluan").show();
    })
    $("#truyenthongnoibo #nut-csyt").click(function () {
        $("#model_chiaseytuong").show();
    })
    $("#nut-tbc").click(function () {
        $("#model-taobinhchon").show();
    })
    $("#nut-tkt").click(function () {
        $("#model_taokhenthuong").show();
    })
    $("#nut-ttnb").click(function () {
        $("#model-taotinnoibo").show();
    })
    $("#tao_thongbao").click(function () {
        $("#model_taothongbao").show();
    })
    $("#nut-bat-tb").click(function () {
        $("#popup-batthongbao").show();
        $("#popup-batthongbao").css({
            "border-radius": "10px"
        })
    })
    $(".nut-xoathanhvien").click(function () {
        $("#xoa_thanhvien").show();
    })
    $('.nut-bat-baiviet').click(function () {
        $('#bat_baiviet').show();
    })

    var btn_del_all_thongbao = $('.btn_del_all_thongbao');
    var xoa_tatcathongbao = $('#xoa_tatcathongbao');
    btn_del_all_thongbao.click(function () {
        xoa_tatcathongbao.show();
    })

    $(".btn_huy_xoatatca").click(function () {
        xoa_tatcathongbao.hide();
    })

    $("#btn_sua_baiviet").click(function () {
        $("#model_suanhanhbaiviet").show();
    })

    var close_detl = $('.close_detl');
    var btn_huy = $('.btn_huy');
    close_detl.click(function () {
        $("#model_taothaoluan").hide();
        $(".chitiet_thongbao").hide();
        $("#model_taothongbao").hide();
        $("#model_suaduan").hide();
        $("#model_tinnoibo").hide();
        $("#model_chiaseytuong").hide();
        $("#model_chiaseytuong_sdn").hide();
        $("#model_taokhenthuong").hide();
        $("#model_chaodonthanhvienmoi").hide();
        $("#model_taosukien_noibo").hide();
        $("#model-taosukiendoingoai").hide();
        $("#model-taosukiendoingoai_sdn").hide();
        $("#model-taobinhchon").hide();
        $("#model-taotinnoibo").hide();
        $('#model_chitietthu').hide();
        $('#model_taosukien_noibo_sdn').hide();
        $("#model_sua_alert").hide();
        $("#model_chinhsuakhenthuong").hide();
    })
    btn_huy.click(function () {
        $("#xoa_tatcathongbao").hide();
        $("#model_taothaoluan").hide();
        $(".xoa_thongbao").hide();
        $(".chitiet_thongbao").hide();
        $("#model_taothongbao").hide();
        $("#model_suaduan").hide();
        $("#model_tinnoibo").hide();
        $("#model_chiaseytuong").hide();
        $("#model_chiaseytuong_sdn").hide();
        $("#model_taokhenthuong").hide();
        $("#model_chaodonthanhvienmoi").hide();
        $("#model_taosukien_noibo").hide();
        $("#model-taosukiendoingoai").hide();
        $("#model-taosukiendoingoai_sdn").hide();
        $("#model-taobinhchon").hide();
        $("#model-taotinnoibo").hide();
        $('#xoa_thanhvien').hide();
        $("#bat_baiviet").hide();
        $("#xoa_baiviet").hide();
        $("#xoa_binhluan").hide();
        $('#model_taosukien_noibo_sdn').hide();
        $("#model_chinhsuachiaseytuong_sdn").hide();
        $("#model_chinhsuakhenthuong").hide();
    })
    $('.an_cainay').click(function () {
        $('#model_taosukien').hide();
        $('#model_taosukien_sdn').hide();
    })
});

var imgphai = $('.imgphai');
var popup_chinhsua = $('.popup-chinhsua');

var imgphai = $('.imgphai');
var popup_chinhsua = $('.popup-chinhsua');

$(window).click(function (e) {
    var model_taobinhluan = $('#model_taothaoluan');
    if ($(e.target).is('#model_taothaoluan')) {
        model_taobinhluan.hide();
    }
    if ($(e.target).is('#xoa_tatcathongbao')) {
        $('#xoa_tatcathongbao').hide();

    }
    if ($(e.target).is('.xoa_thongbao')) {
        $('.xoa_thongbao').hide();
    }

    if ($(e.target).is(".chitiet_thongbao")) {
        $(".chitiet_thongbao").hide();
    }
    if ($(e.target).is('#model_taothongbao')) {
        $('#model_taothongbao').hide();

    }
    if ($(e.target).is('#model_tinnoibo')) {
        $('#model_tinnoibo').hide();
    }
    if ($(e.target).is("#model_chiaseytuong")) {
        $("#model_chiaseytuong").hide();
    }
    if ($(e.target).is("#model_taokhenthuong")) {
        $("#model_taokhenthuong").hide();
    }
    if ($(e.target).is("#model_taosukien")) {
        $("#model_taosukien").hide();
    }
    if ($(e.target).is("#model_chaodonthanhvienmoi")) {
        $("#model_chaodonthanhvienmoi").hide();
    }
    if ($(e.target).is("#model_taosukien_noibo")) {
        $("#model_taosukien_noibo").hide();
    }
    if ($(e.target).is("#model-taosukiendoingoai")) {
        $("#model-taosukiendoingoai").hide();
    }
    if ($(e.target).is("#model-taosukiendoingoai_sdn")) {
        $("#model-taosukiendoingoai_sdn").hide();
    }
    if ($(e.target).is("#model-taobinhchon")) {
        $("#model-taobinhchon").hide();
    }

    if ($(e.target).is("#model-taotinnoibo")) {
        $("#model-taotinnoibo").hide();
    }
    if ($(e.target).is("#xoa_thanhvien")) {
        $("#xoa_thanhvien").hide();
    }
    if ($(e.target).is("#bat_baiviet")) {
        $("#bat_baiviet").hide();
    }

    if ($(e.target).is("#xoa_baiviet")) {
        $("#xoa_baiviet").hide();
    }
    if ($(e.target).is("#xoa_binhluan")) {
        $("#xoa_binhluan").hide();
    }

    if ($(e.target).is(".trang")) {
        $('.trang').css('width', '0px');
    }
    if (!popup_chinhsua.is(e.target) && popup_chinhsua.has(e.target).length == 0 && !imgphai.is(e.target) && imgphai.has(e.target).length == 0) {
        $('.popup-chinhsua').hide();
    }
});

//nhắn tin
$('.nutattinnhan').click(function () {
    $('#nhantin').hide();
})
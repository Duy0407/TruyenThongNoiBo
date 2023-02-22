$(document).ready(function() {
    $('.v_content_box_chat').animate({ scrollTop: $('.v_content_box_chat').get(0).scrollHeight }, 0);
    $('body').click(function() {
        if (event.target.className == "v_nickname") {
            $('.v_nickname').fadeOut();
        }
    });

    if ($(document).width() > 720) {
        if ($('#popup-thongbao').height() > 478) {
            $('#popup-thongbao').css({
                'maxHeight': '478px',
                'overflow': 'scroll'
            });
        }
    } else {
        if ($('#popup-thongbao').height() > 478) {
            $('#popup-thongbao').css({
                'maxHeight': '100%',
                'overflow': 'scroll'
            });
        }
    }
    $("body").click(function() {
        if (event.target.id == "v_datbietdanh") {
            $("#v_datbietdanh").fadeOut();
        }
    });
    $(document).mouseup(function(e) {
        var container_logout = $("#popup-dangxuat");
        if (!container_logout.is(e.target) && container_logout.has(e.target).length === 0) {
            container_logout.hide();
        }
    });
    $('.v_go-seach-questin').submit(function() {
        if ($(this).find('.v_search').val() == "") {
            return false;
        } else {
            return true;
        }
    });


    $("#v_header_menu, #caidat,#individual").click(function() {
        $(".v_header_popup_menu").slideToggle();
    });
    $(document).click(function(e) {
        var container = $(".v_header_popup_menu");
        var container2 = $("#v_header_menu");
        var container3 = $("#caidat");
        var container4 = $("#individual");
        if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0 && !container3.is(e.target) && container3.has(e.target).length === 0 && !container4.is(e.target) && container4.has(e.target).length === 0) {
            container.slideUp();
        }
    });

    $('.search_member').keyup(function() {
        var search_member = $(this).val();
        $.ajax({
            type: "POST",
            url: "../ajax/search_member.php",
            data: {
                member_name: search_member
            },
            dataType: "json",
            success: function(data) {
                $('.v_list_employee').html(data.html);
            }
        });
    });

    //Chọn phương án
    $(".vote_pa").change(function() {
        var id_vote = $(this).parents('.v_binhchon_vote').data('id_vote');
        var id_new = $(this).parents('.v_binhchon_vote').data('id_new');
        if ($(this).prop('checked') == true) {
            var type = 0;
        } else {
            var type = 1;
        }
        $.ajax({
            type: "POST",
            url: "../ajax/user_vote.php",
            data: {
                id_vote: id_vote,
                type: type,
                id_new: id_new
            },
            dataType: "json",
            success: function(data) {
                location.reload();
            }
        });
    });

    $("#btn-dangxuat").click(function() {
        $.ajax({
            url: '../ajax/logout.php',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                window.location.href = "/";
            }
        });
    });
    $("#btn_huy_group").click(function() {
        $("#frm_add_group_tl")[0].reset();
        $("#v_id_manager,#v_id_employee").val("").trigger("change");
    });
    $("#select2_muti_tv").change(function() {
        if ($("#select2_muti_tv").val().length == 1) {
            $.ajax({
                url: '../ajax/getModuleEmployee.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    user_id: $("#select2_muti_tv").val()
                },
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].create == 1) {
                            $(".v_module_id").eq(data[i].id_module - 1).find('.chk_qlpqnd_create').prop('checked', true);
                        }
                        if (data[i].seen == 1) {
                            $(".v_module_id").eq(data[i].id_module - 1).find('.chk_qlpqnd_seen').prop('checked', true);
                        }
                        if (data[i].delete == 1) {
                            $(".v_module_id").eq(data[i].id_module - 1).find('.chk_qlpqnd_delete').prop('checked', true);
                        }
                    }
                }
            });
        } else {
            $(".chk_qlpqnd").prop('checked', false);
        }

        var str_c = $("#select2_muti_tv").val().join();
        if (str_c != "") {
            $(".chk_qlpqnd").prop('disabled', false);
        } else {
            $(".chk_qlpqnd").prop('disabled', true);
        }
    });
    $(".chk_qlpqnd").click(function() {
        var element_parent = $(this).parents(".v_module_id");

        if (element_parent.find('.chk_qlpqnd_create').prop("checked") == true) {
            var create = 1;
        } else {
            var create = 0;
        }

        if (element_parent.find('.chk_qlpqnd_delete').prop("checked") == true) {
            var v_delete = 1;
        } else {
            var v_delete = 0;
        }

        if (element_parent.find('.chk_qlpqnd_seen').prop("checked") == true) {
            var seen = 1;
        } else {
            var seen = 0;
        }

        var user_id = $("#select2_muti_tv").val();
        $.ajax({
            url: '../ajax/setModuleEmployee.php',
            type: 'POST',
            dataType: 'json',
            data: {
                user_id: user_id,
                create: create,
                delete: v_delete,
                seen: seen,
                module_id: element_parent.data('module_id')
            },
            success: function(data) {

            }
        });

    });
    $("#nhaptin_input").keyup(function() {
        if ($("#nhaptin_input").val() != "") {
            $("#main-tinnhan .footer .nhaptin").css('width', '60%');
            $(".img_li").hide();
            $(".img_li4").show();
        } else {
            $("#main-tinnhan .footer .nhaptin").css('width', '46%');
            $(".img_li").show();
            $(".img_li4").hide();
        }
    });
    $('.show_side_bar,.show_sidebar_24h').click(function() {
        $('.wapper .side-bar-1').css('width', '100%');
        $('.side-bar-1 .side-bar-footer').css('display', 'block');
    });
    $(".nut-doiten_1").click(function() {
        $("#v_datbietdanh").fadeIn();
    });
    $('.v_datbietdanh_cancel').click(function() {
        $("#v_datbietdanh").fadeOut();
    });
    $('.hide_side_bar').click(function() {
        $('.wapper .side-bar-1').css('width', '0px');
        $('.side-bar-footer').css('display', 'none');
    });
    $('.show_pp_menu').click(function() {
        $('.show_pp_menu').parents('.ul_pp_menu').find('.popup').css({
            'display': 'none'
        });
        $(this).parents('.ul_pp_menu').find('.popup').css({
            'display': 'block'
        });
    });
    $(".v_hienthitinnhan_detail").click(function() {
        var mess_id = $(this).data("mess_id");
        if ($(window).width() <= 480) {
            window.location.href = "/tin-nhan/" + mess_id + ".html";
        } else {
            $('#nhantin').show();
            $(this).parents("#popup-tinnhan").hide();
        }
    });

    $('.hide_tn').click(function() {
        $('#nhantin').hide();
    });
    $('.thoat').click(function() {
        $('#popup-tinnhan').hide();
        $('#popup-nhacnho').hide();
        $('#popup-thongbao').hide();
    });
    var popup_dangxuat = $('#popup-dangxuat');
    $('#dangxuat').click(function() {
        popup_dangxuat.show();
    })

    $('#btn-huydx').click(function() {
        popup_dangxuat.hide();
    })

    var popup_nhanvien = $('#popup-nhanvien');
    var caidat = $('#caidat');
    var show_pp_menu = $('.show_pp_menu');
    var popup_menu = $('.popup');
    $(window).click(function(e) {
        if (!popup_menu.is(e.target) && popup_menu.has(e.target).length == 0 && !show_pp_menu.is(e.target) && show_pp_menu.has(e.target).length == 0) {
            $('.ul_pp_menu').find('div.popup').hide();
        }
    })

    // && $(window).width() > 414 
    if ($(window).width() <= 1024) {
        var side_bar = $('.side-bar-1');
        $(window).click(function(e) {
            if (side_bar.is(e.target) && side_bar.has(e.target).length == 0) {
                $('.wapper .side-bar-1').css('width', '0px');
                $('.side-bar-footer').css('display', 'none');
            }
        });
    }
    var href = window.location.pathname;
    $('a[href="' + href + '"]').parent().addClass('active');
    $('.item_display').click(function() {
        if ($(this).hasClass('back_blue') == true) {
            var background = 'blue';
        } else {
            var background = 'white';
        }
        $.ajax({
            type: "POST",
            url: "../ajax/changeBackground.php",
            data: {
                background: background
            },
            dataType: "json",
            success: function(data) {
                location.reload();
            }
        });
    });
    // setInterval("clock()", 1000);
});
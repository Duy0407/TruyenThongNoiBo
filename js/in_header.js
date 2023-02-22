$(document).ready(function() {
    $(document).mouseup(function(e) {
        var container = $('.chuyen-doi-so-list');
        var container2 = $('.chuyen-doi-so-btn');
        if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
            container.hide();
        }

        var container3 = $('.v_header_logged_active');
        var container4 = $('.v_header_logged');
        if (!container3.is(e.target) && container3.has(e.target).length === 0 && !container4.is(e.target) && container4.has(e.target).length === 0) {
            $('.v_header_logged_active').slideUp('', function() {
                $('.v_header_logged').animate({
                    'borderBottomLeftRadius': '20px',
                    'borderBottomRightRadius': '20px'
                });
            });
        }
    });

    $(".v_logout_index, .v_mb_logout").click(function() {
        $('#popup-dangxuat').show();
    });
    $('#btn-huydx').click(function() {
        $('#popup-dangxuat').hide();
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

    $(window).click(function(e) {
        var nut_menu = $('.menutranghu768');
        var menu_t = $('.menu-768');
        if (!menu_t.is(e.target) && menu_t.has(e.target).length == 0 && !nut_menu.is(e.target) && nut_menu.has(e.target).length == 0) {
            $('.menu-768').slideUp();
        }
    });

    $('.v_header_logged').click(function() {
        if ($('.v_header_logged_active').css('display') == 'none') {
            $(this).animate({
                'borderBottomLeftRadius': '0',
                'borderBottomRightRadius': '0'
            }, function() {
                $('.v_header_logged_active').slideDown();
            });
        } else {
            $('.v_header_logged_active').slideUp('', function() {
                $('.v_header_logged').animate({
                    'borderBottomLeftRadius': '20px',
                    'borderBottomRightRadius': '20px'
                });
            });
        }
    });

    $('.pmenu_chuyendoiso').click(function() {
        $(this).parents('.menu-chuyendoiso').find('.pmenu_chuyendoiso-list').slideToggle();
    });
    $('.chuyen-doi-so-btn').click(function() {
        $(this).parents('.chuyen-doi-so').find('.chuyen-doi-so-list').toggle();
    });

    $('.pmenu_user_info').click(function() {
        $(this).parents('.menu-info_user').find('.pmenu_chuyendoiso-list').slideToggle();
    })
});
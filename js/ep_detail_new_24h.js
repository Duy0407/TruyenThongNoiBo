$(document).ready(function() {
    $('.center_slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: '<button type="button" class="slick-next"><img class="slick-next-icon" src="../img/24h_next_slick.svg"></button>'
    });
    $(".cmt_24h_input").keyup(function(){
        if($(this).val().trim() != ""){
            $(".form_cmt_24h_submit").show();
        }else{
            $(".form_cmt_24h_submit").hide();
        }
    });
    $(".center_slick_action_popup").click(function() {
        $(this).next().toggle();
    });

    $(".turnoff_btn_del_popup").click(function() {
        $(".turnoff_new").hide();
    });

    $(".popup_action_new_24h_item_turnoff").click(function() {
        $(".turnoff_new").show();
    });

    $(".turnoff_popup").click(function() {
        $(".turnoff_new").hide();
    });

    $(".sidebar_24_action_btn_setting").click(function() {
        $('.setting').show();
    });

    $(".setting_action_btn").click(function() {
        $(".setting_action_btn").css({
            'color': '#999999',
            'border': 'none'
        });

        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });

        index = $(this).index();
        $(".setting_show").hide();
        $(".setting_show").eq(index).show();
    });
    $(".center_slick_action_play").click(function() {
        if ($(this).attr("src") == "../img/24h_play.svg") {
            $(this).attr("src", "../img/pause.svg");
        } else {
            $(this).attr("src", "../img/24h_play.svg");
        }
    });
    $(".center_slick_action_audio").click(function() {
        if ($(this).attr("src") == "../img/24h_audio.svg") {
            $(this).attr("src", "../img/tat-am-thanh.svg");
        } else {
            $(this).attr("src", "../img/24h_audio.svg");
        }
    });


    $(document).click(function(e) {
        if (e.target.id == "side-bar") {
            $(".side-bar-1").hide();
        }
    });
});
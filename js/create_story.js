$(document).ready(function() {
    $(".turnoff_regime").click(function() {
        $(".regime").hide();
    });
    $(".regime_item_except2").click(function() {
        $(".except").show();
    });
    $(".regime_special").click(function() {
        $(".special").show();
    });
    $(".sidebar_setting, .setting_768").click(function() {
        $(".regime").show();
    });
    $(".create_new_img").click(function() {
        $(".create_new_img_input").attr('accept', 'image/*');
        $(".create_new_img_input").click();
    });
    $(".cancel_new_continue").click(function() {
        $(".cancel_new").hide();
    });
    $(".sidebar_index_footer_cancel").click(function() {
        $(".cancel_new").show();
        $(".sidebar_index").hide();
    });
    $(".preview_detail_img").click(function() {
        $(".preview_title2").hide();
        $(".preview_range_box").css({
            'display': 'flex'
        });
    });
    $(".preview_select").click(function() {
        var color = $(this).data('color');
        $(".preview_detail_input").css({
            'color': color
        }).focus();
    });
    $(".preview_select2").click(function() {
        var color = $(this).data('color');
        $(".preview2_item_input").css({
            'color': color
        }).focus();
    });
    $(".sidebar_index_action_add_text").click(function() {
        if ($(".preview_detail2_color").css('display') == 'none') {
            $(".preview_detail2_color").css({
                'display': 'flex'
            });
            $(".preview2_item_input").focus();
        } else {
            $(".preview_detail2_color").css({
                'display': 'none'
            });
        }

        $(".preview_detail_input").toggle().focus();
    });
    $(".create_new_img_input").change(function() {
        $(".center_create_story").hide();
        $(".preview").show();
        $(".sidebar_index_action").show();
        $(".sidebar_index_footer").css({
            'display': 'flex'
        });
        $(".sidebar_index").show();
        var reader = new FileReader();
    });
    $(".cancel_new_exit").click(function() {
        $(".cancel_new").hide();
        $(".center_create_story").show();
        $(".preview").hide();
        $(".preview2").hide();
        $(".sidebar_index_action").hide();
        $(".sidebar_index_footer").css({
            'display': 'none'
        });
        $(".sidebar_index_textarea").hide();
        $(".sidebar_index_background").hide();
    });
    $(".sidebar_index_select").click(function() {
        var color = $(this).data('color');
        $('.sidebar_index_select').css({
            'border': '1px solid #CCCCCC'
        });
        $(this).css({
            'border': '3px solid #4C5BD4'
        });
        $(".preview2_item").css({
            'background': color
        });
    });
    $(".create_new_text").click(function() {
        $(".center_create_story").hide();
        $(".preview2").show();
        $(".sidebar_index_action").show();
        $(".sidebar_index_footer").css({
            'display': 'flex'
        });
        $(".sidebar_index_textarea").show();
        $(".sidebar_index_background").show();
        $(".sidebar_index").show();
    });
    $(".sidebar_index_textarea").keyup(function() {
        var txt = $(this).val().trim();
        $(".preview2_item_input").text(txt);
    });
    $(document).click(function(e) {
        if (e.target.className == "regime") {
            $(".regime").hide();
        }

        if (e.target.className == "cancel_new") {
            $(".cancel_new").hide();
        }
    });
});
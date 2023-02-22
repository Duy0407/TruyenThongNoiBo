$(document).ready(function() {
    $(".cdnhanvienc_seemore,.mb").click(function(e) {
        $(".side-bar-1").show();
    });

    $(".form_cmt_input").keyup(function(e) {
        var el = $(this).parents(".form_cmt");
        if ($(this).val().trim() != "") {
            el.find(".submit_cmt").show();
            el.find(".vector_icon_head").hide();
        } else {
            el.find(".submit_cmt").hide();
            el.find(".vector_icon_head").show();
        }
    });

    $(".form_rep_cmt_input").keyup(function(e) {
        var el = $(this).parents(".form_rep_cmt");
        if ($(this).val().trim() != "") {
            el.find(".submit_cmt").show();
            el.find(".vector_icon_head").hide();
        } else {
            el.find(".submit_cmt").hide();
            el.find(".vector_icon_head").show();
        }
    });

    $(".rep_cmt").click(function() {
        var el = $(this).parents(".cmt_detail").find(".form_rep_cmt");
        el.toggle();
        el.find(".form_rep_cmt_input").focus();
    });

    $(".new_detail_ghim").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Ghim bài viết thành công");
    });

    $(".new_detail_save").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Lưu bài viết thành công");
    });

    $(".new_detail_notify").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Tắt thông báo thành công");
    });

    $(".new_detail_notify").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Tắt thông báo thành công");
    });

    $(".new_detail_turnoff_post").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Tính năng bình luận đã được tắt");
    });

    $(".new_detail_turnoff_hide_post").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Ẩn bài viết thành công");
    });

    $(".new_detail_go_bv").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Gỡ bài viết thành công");
    });

    $(".new_detail_go_bv_chan_tg").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Gỡ bài viết và chặn tác giả thành công");
    });

    $(".new_detail_go_bv_chan_tg").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Gỡ bài viết và chặn tác giả thành công");
    });

    $(".notify_with_admin").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Đã báo cáo với quản trị viên");
    });

    $(".center_right_more").click(function() {
        $(".popup_action").toggle();
    });

    $(".popup_success_btn").click(function() {
        $(".popup_sucess").hide();
    });

    $(".cmt_post_more").click(function() {
        var el = $(this).parents(".cmt_detail_item");
        el.find(".popup_cmt").toggle();
    });

    $(".center_left").slick({
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $(document).mouseup(function(e) {
        var container = $(".side-bar-1");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }

        var container = $(".popup_sucess");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }

        var container = $(".popup_action");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });
});
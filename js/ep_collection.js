$(document).ready(function() {
    $(".turnoff_create_collection,.create_collectin_cancel").click(function() {
        $(".create_collection").hide();
    });
    $(".add_collection,.add_collection2, .detail_768_btn").click(function() {
        $(".create_collection").show();
    });
    $(".turnoff_collection_setting").click(function() {
        $(".collection_setting").hide();
    });
    $(".sidebar_index_setting,.detail_768_title").click(function() {
        $(".collection_setting").show();
    });
    $(".center_detail_popup_unsave").click(function() {
        // $(".popup_sucess").show();
        // $(".popup_sucess_title").text("Đã bỏ lưu bài viết");
    });
    $(".center_detail_btn").click(function() {
        var el = $(this).parents(".center_detail_item");
        $(".center_detail_popup").hide();
        el.find(".center_detail_popup").show();
    });
    $(".collection_custom").click(function() {
        var el = $(this).parents(".center_detail");
        el.find(".popup_collection_custom").toggle();
    });
    $(".collection_item").click(function() {
        $(".sidebar_index_action").css({
            'background': 'none'
        }).find(".sidebar_index_action_title").css({
            'color': '#474747'
        });
        $(".collection_item").css({
            'background': 'none'
        });
        $(this).css({
            'background': '#DDDDDD'
        });
        $(".popup_collection_custom").hide();
        $(".collection_custom").show();
    });
    $(".sidebar_index_action").click(function() {
        $(".sidebar_index_action").css({
            'background': '#DDDDDD'
        }).find(".sidebar_index_action_title").css({
            'color': '#4C5BD4'
        });
        $(".collection_item").css({
            'background': 'none'
        });
        $(".popup_collection_custom").hide();
        $(".collection_custom").hide();
    });
    $(".turnoff_changename,.change_name_cancel").click(function() {
        $(".change_name").hide();
        $(".delete_collection").hide();
    });
    $(".collection_custom_change_name").click(function() {
        $(".change_name").show();
    });
    $(".delete_collection_action").click(function() {
        $(".delete_collection").hide();
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Bạn đã xóa bộ sư tập thành công!");
    });
    $(".collection_custom_delete").click(function() {
        $(".delete_collection").show();
    });
    $(".detail_768_custom").click(function() {
        $(".popup_collection_custom2").toggle();
    });
    $(".detail_768_item").click(function() {
        $(".detail_768_custom").show();
    });
    $(document).click(function(e) {
        if (e.target.className == "create_collection") {
            $(".create_collection").hide();
        }
        if (e.target.className == "collection_setting") {
            $(".collection_setting").hide();
        }

        if (e.target.className == "change_name") {
            $(".change_name").hide();
        }

        if (e.target.className == "delete_collection") {
            $(".delete_collection").hide();
        }

        var container = $(".center_detail_popup");
        var container2 = $(".center_detail_btn");
        if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
            container.hide();
        }

        var container = $(".popup_collection_custom2");
        var container2 = $(".detail_768_custom");
        if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
            container.hide();
        }
    });
});
$(document).ready(function() {
    $(".turnoff_popup,.memory_btn_cancel").click(function() {
        $(".memory_notify").hide();
        $(".memory_hide").hide();
    });

    $(".sidebar_index_body_notify").click(function() {
        $(".memory_notify").show();
    });

    $(".sidebar_index_body_memory_hide").click(function() {
        $(".memory_hide").show();
    });

    $(".input_name").select2({
        'placeholder': 'Bắt đầu nhập tên'
    });

    $(".obj_body_specific_friend").click(function() {
        $(".except").show();
    });

    $(".obj_body_except_friend").click(function() {
        $(".special").show();
    });

    $(".ep_post_download").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Tải xuống thành công");
    });

    $(document).mouseup(function(e) {
        var container = $(".memory_notify_detail");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.parents(".memory_notify").hide();
        }
    });

    $(document).click(function(e) {
        if (e.target.className == "memory_hide") {
            $(".memory_hide").hide();
        }
    });
});
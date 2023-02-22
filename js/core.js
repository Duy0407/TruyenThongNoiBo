$(document).ready(function() {
    $(".show_sidebar_24h,.sidebar_index_icon").click(function() {
        $(".side-bar-1").show().css({
            'width': '100%'
        });
    });
    $(document).click(function(e) {
        if (e.target.id == "side-bar") {
            $(".side-bar-1").hide();
        }
    });
});
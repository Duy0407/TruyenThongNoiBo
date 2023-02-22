$(document).ready(function() {
    $(".turoff_invitation").click(function() {
        $(".invitation").hide();
    });
    $(".invitation_item_btn").click(function() {
        var el = $(this).parents(".invitation_item");
        $(this).remove();
        el.find(".invitation_item_info").text(".Đã gỡ lời mời");
    });
    $(".invate_text_see_more").click(function() {
        $(".invitation").show();
    });
    $(".center_item_success").click(function(){
        html = `<p class="center_detail_fr2">Đã chấp nhận lời mời kết bạn</p>`;
        el = $(this).parents(".center_item");
        el.append(html);
        $(this).next().remove();
        $(this).remove();
    });
    $(".center_item_del").click(function(){
        html = `<p class="center_detail_fr2">Đã gỡ lời mời kết bạn</p>`;
        el = $(this).parents(".center_item");
        el.append(html);
        $(this).prev().remove();
        $(this).remove();
    });
    $(".center_item_del").click(function(){
        $(this).parents(".center_item").remove();
    });
    $(document).click(function(e) {
        if (e.target.className == "invitation") {
            $(".invitation").hide();
        }
    });
});
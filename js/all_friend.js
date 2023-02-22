$(document).ready(function() {
    $(".ep_post_more").click(function() {
        $(".popup_center_action").hide();
        var el = $(this).parents(".center_detail_name");
        var index = $(this).parents(".center_item").index();
        if ($(document).width() > 1200) {
            if (index % 4 == 3) {
                el.next().css({
                    'right': '10px'
                });
            } else {
                el.next().css({
                    'right': 'auto'
                });
            }
        } else if ($(document).width() > 720) {
            if (index % 3 == 2) {
                el.next().css({
                    'right': '10px'
                });
            } else {
                el.next().css({
                    'right': 'auto'
                });
            }
        } else {
            if (index % 2 == 1) {
                el.next().css({
                    'right': '10px'
                });
            } else {
                el.next().css({
                    'right': 'auto'
                });
            }
        }
        el.next().toggle();
    });

    $(document).mouseup(function(e) {
        var container = $(".popup_center_action");
        var container2 = $(".ep_post_more");
        if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
            container.hide();
            container.css({
                'right': 'auto'
            });
        }

        var container = $(".cancel_detail");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.parents(".cancel").hide();
        }

        var container = $(".prevent_detail");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.parents(".prevent").hide();
        }
    });

    $(".turnoff_popup,.cancel_body_cancel,.prevent_cancel").click(function() {
        $(".cancel").hide();
        $(".prevent").hide();
    });

    $(".center_icon_cancel").click(function() {
        $(".cancel").show();
        var el = $(this).parents(".center_item_detail");
        el.find(".ep_post_more").remove();
        $(".cancel_body_success").click(function() {
            $(".cancel").hide();
           html = `<button class="center_detail_fr_btn">Thêm bạn bè</button>`;
           el.append(html);
        });
    });

    $(".center_icon_prevent").click(function() {
        $(".prevent").show();
    });

    $(".center_icon_flow").click(function(){
        if ($(this)[0].dataset.type == 1) {
            $(this).find(".center_icon_flow_p").text("Theo dõi Minh");   
            $(this)[0].dataset.type = 0;
        }else{
            $(this).find(".center_icon_flow_p").text("Bỏ theo dõi"); 
            $(this)[0].dataset.type = 1;
        }
    });

    $(document).click(function(e){
        if (e.target.className == "center_detail_fr_btn") {
            var el = $(e.target).parents(".center_item_detail");
            html = `<p class="center_detail_fr_p2">Đã gửi lời mời kết bạn</p>`;
            el.append(html);
            $(e.target).remove();
        }
    });
    $(".center_detail_fr_btn").click(function(){
        
    });
});
$(document).ready(function() {
    // $(".center_upload_avt_icon").click(function() {
    //     $(".input_upload_gr").click();
    // });
    // $(".center_cover_upload_btn").click(function() {
    //     $(".input_upload_cover_gr").click();
    // });
    // $(".show_sidebar_right").click(function() {
    //     $(".center_sidebar_right").toggle();
    // });
    $(".center_avt_join").click(function() {
        $(".popup_avt_btn").show();
    });
    $(window).click(function(e){
        var a = $(".center_avt_join");
        var popup = $(".popup_avt_btn");
        if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
            $(".popup_avt_btn").hide();
        }
    });
    
    $(".popup_avt_btn_event_join").click(function() {
        $(".popup_avt_btn").hide();
    });
    $(".turnoff_popup,.s_n_cancel,.add_admin_cancel").click(function() {
        $(".add_admin").hide();
        $(".setting_notify").hide();
        $(".setting_group").hide();
        $(".stop_group").hide();
        $(".invite_success").hide();
    });
    $(".gr_album_header .gr_album_header_title").click(function(){
        $(".gr_album_body").removeClass("gr_album_body_active");
        $(".gr_album_body").eq($(this).prevAll(".gr_album_header_title").length).addClass("gr_album_body_active");
        
        $(".gr_album_header .gr_album_header_title").css({
            'color':'#666666',
            'border-bottom': 'none'
        });
        $(this).css({
            'color':'#4C5BD4',
            'border-bottom': '2px solid rgb(76, 91, 212)'
        });
    });
    $(".center_nav_see_more_share").click(function(){
        var el = $(this).parents(".center_nav_see_more");
        el.find(".ep_post_popup_share").show();
    });
    $(".center_nav_stop_gr").click(function() {
        var pick_id_group = $(this).parents(".pick_id_group").attr('data-id_group');
        $(".s_n_save").attr('data-id', pick_id_group);
        $(".stop_group").show();
    });
    $(".popup_avt_setting_notify").click(function() {
        $(".setting_notify").show();
    });
    $(".popup_avt_unflow").click(function() {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Bạn đã bỏ theo dõi nhóm ABC");
    });
    $(".center_setting_group").click(function() {
        $(".setting_group").show();
        $(".s_n_select").select2();
    });
    $(".center_nav_de_see_more .center_group_public_dropdown").click(function() {
        // $(this).parents(".center_detail").find(".center_nav_see_more").toggle();
        $(".center_nav_see_more").toggle();
    });
    $(".post_pending_del").click(function(){
        $(this).parents(".post_pending_item_detal").remove();
    });
    $(".gr_mem_fr_info_success").click(function(){
        var el = $(this).parents(".gr_member_friend_detail");
        el.find(".gr_mem_fr_info_add").text("Đã phê duyệt cho Chi Pu vào nhóm");
        el.find(".gr_mem_fr_btn2").remove();
    });
    $(".edit_album").click(function() {
        var index = $(this).parents(".gr_album_body_img").index();
        $(".gr_album_popup").hide();
        $(this).parents(".gr_album_body_img").find(".gr_album_popup").css({
            'transform': 'translateX(0)'
        });
        $(this).parents(".gr_album_body_img").find(".gr_album_popup").show();
    });
    $(".center_nav_album").click(function() {
        if ($(this).hasClass("center_nav_deatail")){
            var el = $(".center_nav_album").eq(0);
            $(".center_nav_deatail").css({
                'borderBottom': 'none',
                'color': '#666666'
            });
            el.css({
                'borderBottom': '2px solid #4C5BD4',
                'color': '#4C5BD4'
            });
            $(".gr_introduce").hide();
            $(".group_public_post").hide();
            $(".archives_news").hide();
            $(".gr_member").hide();
            $(".gr_album").show();
            $(".post_pending").hide();
            $(".content_you").hide();
        }else{
            $(".center_nav_deatail").eq(3).click();
        }
    });
    $(".center_nav_post").click(function() {
        $(".center_nav_deatail").css({
            'borderBottom': 'none',
            'color': '#666666'
        });
        $(this).css({
            'borderBottom': '2px solid #4C5BD4',
            'color': '#4C5BD4'
        });
        $(".gr_album").hide();
        $(".gr_introduce").hide();
        $(".gr_member").hide();
        $(".archives_news").hide();
        $(".group_public_post").show();
        $(".post_pending").hide();
        $(".content_you").hide();
    });
    $(".center_nav_member").click(function() {
        if ($(this).hasClass("center_nav_deatail")){
            var el = $(".center_nav_member").eq(0);
            $(".center_nav_deatail").css({
                'borderBottom': 'none',
                'color': '#666666'
            });
            el.css({
                'borderBottom': '2px solid #4C5BD4',
                'color': '#4C5BD4'
            });
            $(".gr_album").hide();
            $(".gr_introduce").hide();
            $(".group_public_post").hide();
            $(".archives_news").hide();
            $(".gr_member").show();
            $(".post_pending").hide();
        }else{
            $(".center_nav_deatail").eq(2).click();
            $(".edit_individual").hide();
        }
    });
    $(".center_nav_ghim_gr").click(function() {
        $(".popup_sucess").show();
        if ($(this).text().trim() == "Ghim nhóm") {
            $(this).html('<img class="center_nav_see_more_icon" src="../img/../img/ghim_ep_public_gr.svg" alt="content_your.svg">Bỏ ghim nhóm');
            $(".popup_sucess_title").text("Bạn đã ghim nhóm này ở đầu danh sách nhóm!");
        }else{
            $(this).html('<img class="center_nav_see_more_icon" src="../img/../img/ghim_ep_public_gr.svg" alt="content_your.svg">Ghim nhóm');
            $(".popup_sucess_title").text("Bạn đã bỏ ghim nhóm thành công!");
        }
        
    });


    // $(".popup_avt_exit_gr").click(function() {

        
        // $(".popup_sucess").show();
        // var name_group = $(".pg_main_head_member_name").text();
        // $(".popup_sucess_title").text("Bạn rời khỏi nhóm ' "+ name_group +" ' thành công!");

    // });
    $(".center_nav_intro").click(function() {
        if ($(this).hasClass("center_nav_deatail")){
            $(".center_nav_deatail").css({
                'borderBottom': 'none',
                'color': '#666666'
            });
            $(".center_nav_intro").eq(0).css({
                'borderBottom': '2px solid #4C5BD4',
                'color': '#4C5BD4'
            });
            $(".edit_individual").hide();
            $(".gr_member").hide();
            $(".group_public_post").hide();
            $(".gr_album").hide();
            $(".archives_news").hide();
            $(".gr_introduce").show();
            $(".post_pending").hide();
            $(".content_you").hide();
        }else{
            $(".center_nav_deatail").eq(1).click();
            $(".edit_individual").hide();
        }
    });
    $(".gr_introduce_box_title").click(function() {
        $(".create_gr").show();
        $(".create_gr_header").text("Chỉnh sửa nhóm");
        $(".form_group_select").select2();
    });
    $(".gr_see_more").click(function() {
        $(".gr_admin_popup").hide();
        $(this).next().toggle();
    });
    $(".gr_member_all").click(function() {
        $(".gr_member_title").css({
            'color': '#666666'
        });
        $(".gr_member_all").css({
            'color': '#4C5BD4'
        })
        $(".gr_member_detail_pending").hide();
        $(".gr_member_detail_admin").hide();
        $(".archives_news").hide();
        $(".gr_member_detail_all").show();
    });
    $(".gr_member_pending").click(function() {
        $(".gr_member_title").css({
            'color': '#666666'
        });
        $(".gr_member_pending").css({
            'color': '#4C5BD4'
        })
        $(".gr_member_detail_all").hide();
        $(".gr_member_detail_admin").hide();
        $(".gr_member_detail_pending").show();
    });
    $(".gr_member_admin2").click(function() {
        $(".gr_member_title").css({
            'color': '#666666'
        });
        $(this).css({
            'color': '#4C5BD4'
        })
        $(".gr_member_detail_all").hide();
        $(".gr_member_detail_pending").hide();
        $(".gr_member_detail_admin").show();
    });
    $(".btn_add_admin").click(function() {
        $(".add_admin").show();
    });
    $(".turnoff_popup_invite_success,.invite_success_cancel").click(function() {
        $(".invite_success").hide();
    });
    $(".add_admin_item_btn2").click(function() {
        $(".invite_success").show();
    });
    $(".popup_add_work").click(function() {
        $(".add_work").show();
    });
    $(".center_nav_see_more_detail_content_you").click(function() {
        $(".center_nav_see_more").hide();
        $(".center_nav_deatail").css({
            'color': '#666666',
            'borderBottom':'none'
        });
        $(".center_nav_de_see_more").css({
            'color':'#4C5BD4',
            'borderBottom':'2px solid #4C5BD4'
        });
        $(".content_you").show();
        $(".group_public_post").hide();
        $(".gr_album").hide();
        $(".gr_introduce").hide();
        $(".gr_member").hide();
        $(".post_pending").hide();
    });
    $(document).click(function(e) {
        if (e.target.className == "invite_success") {
            $(".invite_success").hide();
        }

        if (e.target.className == "add_admin") {
            $(".add_admin").hide();
        }

        if (e.target.className == "invite_fr") {
            $(".invite_fr").hide();
        }

        if (e.target.className == "introduce_yourself") {
            $(".introduce_yourself").hide();
        }
    });
    $(".turnoff_introduce_yourself, .introduce_yourself_cancel").click(function(){
        $(".introduce_yourself").hide();
    });
    $(".edit_individual_intro2").click(function(){
        // $(".introduce_yourself").show();
    });
    $(".center_request_member").click(function() {
        $(".gr_member").show();
        $(".gr_member_detail_pending").show();
        $(".gr_member_detail_all").hide();
        $(".gr_member_detail_admin").hide();
        $(".gr_member_title").css({
            'color': '#666666'
        });
        $(".gr_member_pending").css({
            'color': '#4C5BD4'
        });
        $(".center_nav_deatail").css({
            'borderBottom': 'none',
            'color': '#666666'
        });
        $(".center_nav_member").css({
            'borderBottom': '2px solid #4C5BD4',
            'color': '#4C5BD4'
        });
        $(".gr_album").hide();
        $(".gr_introduce").hide();
        $(".group_public_post").hide();
        $(".gr_member").show();
        $(".post_pending").hide();
        $(".content_you").hide();
    });
    $(".content_you_pending").click(function(){
        $(".content_you_no_admin").css({
            'color': '#666666',
            'borderBottom': 'none'
        });
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });
        $(".content_you_box_pending").show();
        $(".content_you_box_posted").hide();
        $(".content_you_box_refuse").hide();
    });

    $(".content_you_posted").click(function(){
        $(".content_you_no_admin").css({
            'color': '#666666',
            'borderBottom': 'none'
        });
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });
        $(".content_you_box_pending").hide();
        $(".content_you_box_posted").show();
        $(".content_you_box_refuse").hide();
    });

    $(".content_you_refuse").click(function(){
        $(".content_you_no_admin").css({
            'color': '#666666',
            'borderBottom': 'none'
        });
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });
        $(".content_you_box_pending").hide();
        $(".content_you_box_posted").hide();
        $(".content_you_box_refuse").show();
    });
    $(".center_request_post").click(function(){
        $(".post_pending").show();
        $(".group_public_post").hide();
        $(".gr_introduce").hide();
        $(".gr_member").hide();
        $(".gr_album").hide();
    });
    $(".center_avt_join_meet").click(function() {
        $(".invite_fr").show();
    });
    $(".ep_post_action1_deatail_del_post").click(function(){
        $(".del_post").show();
    });
    $(".ep_post_action1_deatail_edit_object").click(function(){
        $(".popup_regime").show();
        $(".popup_regime_header").text("Đối tượng xem bài viết");
    });
    $(".turnoff_invite_fr, .invite_fr_cancel").click(function() {
        $(".invite_fr").hide();
    });
    $(document).mouseup(function(e) {
        // var container = $(".center_sidebar_right");
        // var container2 = $(".show_sidebar_right");
        // if ($(document).width() < 976) {
        //     if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
        //         container.hide();
        //     }
        // }

        var container = $(".setting_notify_detail");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $(".setting_notify").hide();
            $(".setting_group").hide();
            $(".stop_group").hide();
        }

        var container = $(".ep_post_action2");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }

        var container = $(".gr_album_popup");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }

        var container = $(".center_nav_see_more");
        var container2 = $(".center_nav_de_see_more .center_group_public_dropdown");
        if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
            $(".center_nav_see_more").hide();
        }

        var container = $(".gr_admin_popup");
        var container2 = $(".gr_see_more");
        if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
            $(".gr_admin_popup").hide();
        }
    });
});
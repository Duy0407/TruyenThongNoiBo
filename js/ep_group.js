$(document).ready(function() {
    $(".group_know_list_item").slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [{
            breakpoint: 720,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, ]
    });
    $(".form_group_select").select2();
    $(".sidebar_index_setting").click(function() {
        $(".ep_group_setting").toggle();
    });
    $(".ep_group_setting_cancel").click(function(){
        $(".ep_group_setting").hide();
        $(".ep_group_setting2").hide();
    });
    $(".gr_manager_768_de_btn,.create_btn_group").click(function() {
        $(".create_gr").show();
        $(".form_group_select").select2();
        $(".create_gr_header").text("Tạo nhóm");
    });


    $(".turnoff_popup,.form_group_btn_cancel").click(function() {
        $(".create_gr").hide();
    });
    $(".turnoff_custom_notify").click(function() {
        $(".custom_notify").hide();
    });
    $(".ep_group_setting_custom_notify").click(function() {
        $(".custom_notify").show();
        $(".custom_notify_select").select2();
    });
    $(".turnoff_ghim_group").click(function() {
        $(".ghim_group").hide();
    });
    $(".ep_group_setting_ghim_gr").click(function() {
        $(".ghim_group").show();
    });

    // $(".ghim_group_cancel").click(function() {
    //     $(this).parents(".custom_notify_item").remove();


    // });



    $(".turnoff_custom_fllowing").click(function() {
        $(".fllowing").hide();
    });
    // $(".follow_btn").click(function() {
    //     if ($(this).text().trim() == "Bỏ theo dõi") {
    //         $(this).text("Theo dõi");
    //         $(this).css({
    //             'border':'1px solid #4C5BD4',
    //             'background':'white',
    //             'color': '#4C5BD4'
    //         });   
    //     }else{
    //         $(this).text("Bỏ theo dõi");
    //         $(this).css({
    //             'border':'none',
    //             'background':'#4C5BD4',
    //             'color': 'white'
    //         }); 
    //     }
    // });

    $(".ep_group_setting_following").click(function() {
        $(".fllowing").show();
    });
    $(".turnoff_exit_group").click(function() {
        $(".exit_group").hide();
    });
    $(".ep_group_setting_exit_group").click(function() {
        $(".exit_group").show();
    });
    $(".drop_group").click(function(){
        $(this).parents(".center_item").remove();
    });
    $(".join_group").click(function(){
        if (Number($(this).data("type")) % 2 == 0) {
            html = `<p class="join_group_title">Bạn đã tham gia vào nhóm này</p>`;
        }else{
            html = `<p class="join_group_title">Bạn đã gửi yêu cầu tham gia nhóm, đang chờ Quản trị viên phê duyệt.</p>`;
        }
        $(this).parents(".center_item_btn").html(html);
    });
    $(document).click(function(e) {
        if (e.target.className == "create_gr") {
            $(".create_gr").hide();
        }

        if (e.target.className == "custom_notify") {
            $(".custom_notify").hide();
        }

        if (e.target.className == "ghim_group") {
            $(".ghim_group").hide();
        }

        if (e.target.className == "fllowing") {
            $(".fllowing").hide();
        }

        if (e.target.className == "exit_group") {
            $(".exit_group").hide();
        }
    });
});



// CLICK 3 CHẤM TO
$(document).on('click', '.pg_main_head_option_btn', function() {
    $(this).children(".popup_3cham").show();
});

$(window).click(function(e){
    var a = $(".pg_main_head_option_btn");
    var popup = $(".popup_3cham");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".popup_3cham").hide();
    }
});


// CLICK CHIA SẺ
$(document).on('click', '.chia_se_relative', function() {
    $(this).parents(".pg_main_head_option_btn").find(".popup_chia_xe").show();
    // $(".edit_fr").show();
});

$(window).click(function(e){
    var a = $(".pg_main_head_option_btn");
    var popup = $(".popup_chia_xe");
    if(!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0){
        $(".popup_chia_xe").hide();
    }
});


// SHOW POPUP MỜI BẠN BÈ 
$(document).on('click', '.click_show_pp_friend', function() {
    $(".popup_add_friend").show();
    var id_group = $(this).attr('data');
    $(".click_add_friend_new").attr('data', id_group);
})
// X POPUP MỜI BẠN BÈ 
$(document).on('click', '.hidden_add_friend', function() {
    $(".popup_add_friend").hide();
});

// Tìm kiếm bạn bè
$("input[name=search_friend]").on("input" ,function(){
    var val_input = $(this).val();
    var Case_input = val_input.toLowerCase();
    $('.khoi_add_friend_block').each(function(){
        var name_friend = $(this).find(".khoi_add_friend_info_name").html();

        var name_friend_Case = name_friend.toLowerCase();
        if (name_friend_Case.includes(Case_input)) {
            $(this).show();
        }else{
            $(this).hide();
        }
    })
})

// X FRIEND 
function x_friend(xf) {
    $(xf).parents(".add_friend-success-friend-one").hide()
}
// -----------------------------------------
// CLICK GHIM NHÓM
$(document).on('click', '.click_ghim_nhom', function() {
    var pin_id_use = $(this).attr("data");
    var pin_id_com = $(this).attr("data1");
    var pin_id_goup = $(this).attr("data2");
    $.ajax({
        url: "../ajax/group_pin2.php",
        type: "POST",
        data: {
            pin_id_use:pin_id_use,
            pin_id_com:pin_id_com,
            pin_id_goup:pin_id_goup,
        },
        success: function(data){
            if(data == ""){
                $(".pp_gimtin_text").text("Bạn đã ghim nhóm này ở đầu danh sách nhóm!")
                $(".ghim_tin").removeClass("pp_hidden");
            }
        },
    });
});

// ĐÓNG POPUP GHIM NHÓM
$(".hide_ghim_nhom").click(function(){
    window.location.reload();
    $(this).parents(".ghim_tin").addClass("pp_hidden");
});

$(document).on('click', '.click_un_ghim', function() {
    var pin_id_use = $(this).attr("data");
    var pin_id_com = $(this).attr("data1");
    var pin_id_goup = $(this).attr("data2");
    $.ajax({
        url: "../ajax/group_pin2.php",
        type: "POST",
        data: {
            pin_id_use:pin_id_use,
            pin_id_com:pin_id_com,
            pin_id_goup:pin_id_goup,
        },
        success: function(data){
            // console.log(data)
            if(data == ""){
                $(".pp_gimtin_text").text("Bạn đã bỏ ghim nhóm này");
                $(".ghim_tin").removeClass("pp_hidden");
            }
        },
    })
})


// -----------------------------------------

// ĐÓNG POPUP THEO GIÕI
$(".hide_botheogioi").click(function(){
    $(this).parents(".un_folow").addClass("pp_hidden");
})

// CLICK BỎ THEO GIÕI NHÓM
$(".click_unfolow").click(function(){
    $(".un_folow").removeClass("pp_hidden");
})

$(".click_3cham_posts").click(function(){
    $(".pp_baiviet").toggle(500);
})


// --------------- BÁO CÁO QUẢN TRỊ VIÊN ------------
// Click show Báo cáo quản trị viên
$(document).on('click', '.click_bc_qtv', function() {
    var name_author = $(this).parents(".pick_id_post_hide").find(".name_author_hidden").html();
    var pick_id_post = $(this).parents('.pick_id_post').attr('data');
    var id_author = $(this).parents(".pick_id_post_hide").attr('data-author');
    $(".take_id_author").attr('data-author-pick',id_author);
    $(".name_author_popup").html(name_author);
    $(".btn_bc_xong").attr('data1', pick_id_post);
    $(".baocao_qtv").show();
})

// X báo cáo quản trị viên
$(document).on('click', '.x_bc_qt_vien', function() {
    $(this).parents(".baocao_qtv").hide();
    $(this).parents(".vp_quytac_nhom").hide();
    $(this).parents(".thanhk_you_reaport").hide();
    $(this).parents(".nude_photos").hide();
    $(this).parents(".gbv_ctg").hide();
    $(this).parents(".remove_post").hide();
})

// Click SHOW popup cảm ơn đã báo cáo Chung 1
$(document).on('click', '.click_show_chung', function() {
    $(this).parents(".baocao_qtv").hide();
    var name_author = $(this).parents(".baocao_qtv_padding").find(".name_author_popup").html();
    var pick_title = $(this).children(".title_chung").html();
    var html_take_title_one = '<div class="tky_reaport_head_one_text pick_text_parent">'+pick_title+'</div>';
    var take_id_author = $(this).parents(".take_id_author").attr('data-author-pick');

    $(".tky_reaport_head_one").html(html_take_title_one);
    $(".take_name_author").html(name_author);
    $(".thanhk_you_reaport1").show();

    // $.ajax({
    //     url: '../ajax/cac_buoc_thuc_hien.php',
    //     type: 'POST',
    //     data:{take_id_author:take_id_author},
    //     success: function(data){
    //         console.log(data);
    //     }
    // })
})

// Click vi phạm quy tắc nhóm
$(".click_vpqtn").click(function(){
    $(this).parents(".baocao_qtv").hide();
    var name_author = $(this).parents(".baocao_qtv_padding").find(".name_author_popup").html();
    var text_cha = $(this).children(".title_chung").html();
    $(".take_name_author_hide").html(name_author);
    $(".text_parents_hide").html(text_cha);
    $(".vp_quytac_nhom").show();
})

// popup cảm ơn đã báo cáo
$("input[name=vpqtn]").click(function(){
    var title_parent = $(this).parents(".vp_quytac_nhom_nab_main").find(".text_parents_hide").text();
    var title_child = $(this).parents(".parent_report_rule").find('.title_report').html();
    var html_take_title = '<div class="tky_reaport_head_one_text pick_text_parent">'+title_parent+'</div><div class="tky_reaport_head_one_text pick_text_child">'+title_child+'</div>';
    var name_author = $(this).parents(".vp_quytac_nhom_nab").find(".take_name_author_hide").html();
    if($(this).is(":checked")){
        $(".take_name_author").html(name_author);
        $(this).parents(".vp_quytac_nhom").hide();
        $(".tky_reaport_head_one").html(html_take_title);
        $(".thanhk_you_reaport1").show();
    }
})

// Click Quay lại báo cáo
$(".back_baocao").click(function(){
    $(".baocao_qtv").show();
    $(this).parents(".vp_quytac_nhom").hide();
    $(this).parents(".nude_photos").hide();
})

// CLick Ảnh khỏa thân
$(".click_nude_photos").click(function(){
    var name_author = $(this).parents(".baocao_qtv_padding").find(".name_author_popup").html();
    var pick_title_parent = $(this).children('.title_chung').html();
    $(".text_parents_hide2").html(name_author);
    $(".text_nude_photos_hide").html(pick_title_parent);
    $(this).parents(".baocao_qtv").hide();
    $(".nude_photos").show();
})

// Click SHOW popup cảm ơn đã báo cáo Chung 2
$(".click_show_chung2").click(function(){
    var title_parent = $(this).parents(".nude_photos_pd_main").find(".text_nude_photos_hide").html();
    var title_child = $(this).children('.title_chung').html();
    var html_take_title = '<div class="tky_reaport_head_one_text pick_text_parent">'+title_parent+'</div><div class="tky_reaport_head_one_text pick_text_child">'+title_child+'</div>';
    var name_author = $(this).parents(".nude_photos_pd_main").find(".text_parents_hide2").html();
    $(".tky_reaport_head_one").html(html_take_title);
    $(".take_name_author").html(name_author);
    $(this).parents(".nude_photos").hide();
    $(".thanhk_you_reaport1").show();
});

// Click xong 
$(document).on('click', '.report_ok', function() {
    var id_post_report = $(this).attr('data1');
    var id_group_report = $(this).attr('data2');
    var title_parent = $(".pick_text_parent").html();
    var title_child = $(".pick_text_child").html();

    $.ajax({
        url: '../ajax/member_report_posts.php',
        type: 'POST',
        data: {
            id_post_report:id_post_report,
            id_group_report:id_group_report,
            title_parent:title_parent,
            title_child:title_child,
        },
        success: function(data){
            window.location.reload();
            // if (data == "") {
            //     window.location.reload();
            // }else{
            //     alert("Error");
            // }
        }
    });
});

// -------- Gỡ bài viết, Gỡ bài viết và chặn tác giả -----------
// Click - Gỡ bài viết và chặn tác giả
$(document).on('click', '.click_gbv_ctg', function() {
    var id_post = $(this).parents(".pick_id_post").attr('data');
    var id_group = $(this).parents(".pick_id_post").attr('data1');
    var id_author = $(this).parents(".pick_id_post").attr('data2');

    var avt_author = $(this).parents(".ep_post_detail").find(".ep_post_avt").attr('src');
    var name_author = $(this).parents(".ep_post_detail").find(".name_author_hidden").html();
    if(avt_author != ""){
        var thay_img_author = avt_author;
    }else{
        var thay_img_author = '../img/image_new/banner.png';
    }
    $(".add_img_author").attr('src', thay_img_author);
    $(".gbv_ctg_main_name").html(name_author);
    $(".remove_confirmation_post_group").attr('data', id_post);
    $(".remove_confirmation_post_group").attr('data1', id_group);
    $(".remove_confirmation_post_group").attr('data2', id_author);
    $(".gbv_ctg").show();

});
// Xác nhận gỡ bài viết nhóm
$(document).on('click', '.remove_confirmation_post_group', function() {
    var id_post = $(this).attr('data');
    var id_group = $(this).attr('data1');
    var id_user = $(this).attr('data2');
    $.ajax({
        url: '../ajax/tuchoi_post_member3.php',
        type: 'POST',
        data: {id_post:id_post,id_group:id_group,id_user:id_user},
        success: function(data){
            if(data == ""){
                $(".refuse_and_prohibit_2").show();
                window.location.reload();
            }
        }
    });
})


function click_show_all_gbv(){
    $(".remove_post_box1_main").toggle();
}

// CLick gỡ bài viết 
$(document).on('click', '.click_gbv', function() { 
    var id_post = $(this).parents(".pick_id_post").attr('data');
    $(".gbv_kem_message").attr('data', id_post);    
    var name_author = $(this).parents(".main_content_left_posts").find(".name_author_hidden").html();
    var link_img = $(this).parents(".main_content_left_posts").find(".ep_post_avt").attr('src');
    var id_author = $(this).parents(".pick_id_post_hide").attr('data-author');
    $(".take_name").html(name_author);
    $(".take_link_img").attr('src',link_img);
    $(".remove_post").show();

    $.ajax({
        url:'../ajax/violate_the_rules.php',
        type: 'POST',
        data: {id_author:id_author},
        success: function(result){
            console.log(result);
        }
    });
});
$(document).on('click', '.gbv_kem_message', function() { 
    var posts_id = $(this).attr('data');
    // var group_id = $(this).attr('data1');
    var messages_refuse = $("textarea[name=messages_refuse_group]").val();

    $.ajax({
        url: '../ajax/refuse_post_group.php',
        type: 'POST',
        data: {posts_id:posts_id,messages_refuse:messages_refuse},
        success: function(data){
            if(data == ""){
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    })
})

// -----------------------------
// click Tải lên ảnh/video/tệp
$(document).on('click', '.click_taianh', function() {
    $(".popup_post").show();
})



// CLick appen Quy tắc


// POPUP CÂU HỎI THAM GIA
// mở

function click_appen_question(id_group){
    var ques_id_group = id_group;
    $.ajax({
        url: '../ajax/appen_question.php',
        type: 'POST',
        data: {ques_id_group:ques_id_group},
        success: function(data){
            if(data != ""){
                $(".apppen_question").html(data);
                $(".participation_question").show();
            }
            
        }
    })
}
// CLick gửi câu hỏi 
$(document).on('click', '.click_send', function() {
    var result_true = true;
    var join_id_group = $(".main_append_ques").attr('data2');

    var cau_hoi = [];
    var type_ques = [];
    var answer = [];

    $(".return_id_type").each(function(){
        var check_ques = $(this).attr('data');
        var check_type = $(this).attr('data1');

        cau_hoi.push(check_ques);
        type_ques.push(check_type);
        if(check_type == 2){
            var answer_suv = [];
            $("input[name=tich_luachon]:checked").each(function(){
                var lay_check = $(this).parents(".parents_checkbox").find('.checkbox_tex').text();
                answer_suv.push(lay_check);
            });
            answer.push(answer_suv);

        }else if(check_type == 3){
            $("input[name=tich_dapan]:checked").each(function(){
                var lay_radio = $(this).parents(".parents_radio").find('.radio_text').text();
                answer.push(lay_radio);
            });
        }else if(check_type == 1){
            var question_free = $("textarea[name=question_free]").val();
            answer.push(question_free);
        }
    });


    $.ajax({
        url: '../ajax/tham_gia_nhom.php',
        type: 'POST',
        data: {
            join_id_group:join_id_group,
            cau_hoi:cau_hoi,
            type_ques:type_ques,
            answer:answer,
        },
        success: function(data){
           alert("Gửi thành công");
            window.location.reload();
        }
    });
});




// --------------------- Hủy yêu cầu tham gia nhóm
function huy_yeucau(id_group){
    var group_cancel = id_group;
    $.ajax({
        url: '../ajax/cancel_group_request.php',
        type: 'POST',
        data: {
            group_cancel:group_cancel,
        },
        success: function(data) {
            if(data == ""){
                window.location.reload();
            }else{
                alert(data);
            }
        }
    });
}



// đóng
$(".x_participation_question").click(function(){
    $(this).parents(".participation_question").hide();
});
$(window).click(function (e) {
  var a = $('.show_pp_question');
  var popup = $('.participation_question_padding');
  if (!a.is(e.target) && a.has(e.target).length == 0 && !popup.is(e.target) && popup.has(e.target).length == 0) {
    $('.participation_question').hide();
  }
});

$(".click_show_search").click(function(){
    $(".sidebar_index_search").show();
});
$(".out_search").click(function(){
    $(this).parents(".sidebar_index_search").hide();
});


$(".x_pp_name_group").click(function(){
    $(this).parents(".fig_position_fixed").hide();
});

$(".show_arrow_right_375").click(function(){
    $(".fig_position_fixed").show();
})

$(document).on('click', '.create_group', function() {
    var from_group = $(".create_gr_form");
    from_group.validate({
        rules: {
            name_group: {
                required: true,
            }
        },
        messages: {
            name_group: {
                required: "Vui lòng nhập tên nhóm",
            }
        }
    });
    if(from_group.valid() === true){
        var name_group = $("input[name=name_group]").val();
        var mode = $("select[name=value_select]").val();
        var friend_group = $("select[name=friend_group]").val();
        // var type_user = $(".take_id_user_invite").attr('data-user-type');

        $.ajax({
            url: "../ajax/add_group.php",
            type: "POST",
            data: {
                name_group:name_group,
                mode:mode,
                friend_group:friend_group,
            },
            success: function(data){
                // console.log(data);
                if(data == ""){
                    alert("Tạo nhóm thành công");
                    window.location.reload();
                }else{
                    alert(data);
                }
            }
        });
    }
});

// -------------------------------------------
// Xóa nhóm
function click_btn_delete_group(group_id,group_name){
    var name_gr = group_name;
    var id_gr = group_id;

    $(".html_name_gr3").html(name_gr);
    $(".click_xoa_group").attr("data", id_gr);
    $(".exit_group3").show();

}
$(document).on('click', '.click_xoa_group', function() {
    var id_group = $(this).attr('data');
    var append_name = $(".html_name_gr3").text();
    $.ajax({
        url: "../ajax/delete_group_new.php",
        type: "POST",
        data: {id_group:id_group},
        success: function(data){
            $(".popup_sucess").show().css({
                'zIndex': '4'
            });
            $(".popup_sucess_title").text("Bạn đã xóa nhóm " + append_name);
        }
    })
})

function out_group(id_group, name_group){
    var id_gr = id_group;
    var name_gr = name_group;
    $(".html_name_gr").html(name_gr);
    $(".exit_group2_exit").attr("data", id_gr);
    $(".exit_group2").show();
}
$(document).on('click', '.exit_group2_exit', function() {
    var id_group = $(this).attr('data');
    var chekc = $("input[name=stopinvitingme]").prop('checked');
    var append_name = $(".html_name_gr").text();
    if(chekc == true){
        var checkbox = $("input[name=stopinvitingme]").val();
    }else{
        var checkbox = "";
    }
    $.ajax({
        url: "../ajax/leave_group.php",
        type: "POST",
        data: {
            id_group:id_group,
            checkbox:checkbox,
        },
        success: function(data){
            console.log(data);
            if(data == ""){
                $(".popup_sucess").show().css({
                    'zIndex': '4'
                });
                $(".popup_sucess_title").text("Bạn đã rời khỏi nhóm " + append_name);
            }
        },
    });
});
$(".exit_group2_cancel").click(function(){
    $(".exit_group2").hide();
    $(".exit_group3").hide();
});

function click_ghim_group(cgg){
    var group_id = $(cgg).attr('data-group_id');

    $.ajax({
        url: "../ajax/group_pin.php",
        type: "POST",
        data: {
            group_id:group_id,
        },
        success: function(data){
            if(data != ""){
                $(cgg).parents(".custom_notify_item").hide();
                $(".custom_notify_list_item_unghim").append(data);
            }
        },
    });
}

 function boghim(bg){
    var group_id = $(bg).attr('data-group_id');
    
    $.ajax({
        url: "../ajax/group_unpin.php",
        type: "POST",
        data: {
            group_id:group_id
        },
        success: function(data){
            // console.log(data);
            if(data != ""){
                $(bg).parents(".custom_notify_item").remove();
                $(".parents_gim_appen").append(data);
            }
        }
    })
}


function change_custom(c_custom){
    var cc_id_group = $(c_custom).attr('data2');
    var check_change = $(c_custom).val();
    $.ajax({
        url: "../ajax/custom_notify.php",
        type: "POST",
        data: {
            cc_id_group:cc_id_group,
            check_change:check_change,
        },
        success: function(data){
            console.log(data);
        }
    });
}


function click_nhom_don(id_group){
    var id_group = id_group;
    $.ajax({
        url: '../ajax/join_group_not_question.php',
        type: 'POST',
        data: {id_group:id_group},
        success: function(data){
            if (data == "") {
                window.location.reload();
            }
        }
    });
}



// Tắt / Bật tính năng bình luận
$(document).on('click', '.tat_bat_comment', function() {
    var type_comment = $(this).attr('data');
    var id_post = $(this).parents(".pick_id_post").attr('data'); 
    var id_position = $(this).parents(".pick_id_post").attr('data1'); 

    $.ajax({
        url: '../ajax/tat_bat_comment.php',
        type: 'POST',
        data: {
           type_comment:type_comment, 
           id_post:id_post, 
           id_position:id_position, 
        },
        success: function(data){
            if(data != ""){
                if(data != "False2"){
                    window.location.reload();
                    $('.bat_tat_comment').hide();
                }else{
                    window.location.reload();
                }
            }
        }
    });
});

$(document).on('click', '.toggle_remove_post', function() {
    $(this).parents(".parent_post_ghim").find(".abs_remove_ghim").toggle(500);
})


// Ghim bài viết Nhóm
$(document).on('click', '.ghim_post_group', function() { 
    var type_ghim = $(this).attr('data');
    var id_post = $(this).parents(".parent_post_ghim").attr("data");
    // var id_group = $(this).parents(".pick_id_post").attr("data1");
    // var id_author = $(this).parents(".pick_id_post").attr("data2");
    $.ajax({
        url: '../ajax/ghim_post_group.php',
        type: 'POST',
        data:{
            type_ghim:type_ghim,
            id_post:id_post,
            // id_group:id_group,
            // id_author:id_author,
        },
        success: function(data){
            if(data == ""){
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});

// Tìm kiếm nhóm đang theo giõi
$(".group_folowing_search").on('input', function(){
    var val_search_folowing = $(this).val();
    var val_search_folowing = val_search_folowing.toLowerCase();
    $(".custom_notify_item").each(function(){
        var name = $(this).find(".custom_notify_name").html();
        var name = name.toLowerCase();
        if (name.includes(val_search_folowing)) {
            $(this).show();
        }else{
            $(this).hide();
        }
    });
});

// Bỏ theo dõi - trang feed
function click_unfollow(id_group, name_group){
    var id_group = id_group;
    var name_group = name_group;
    $.ajax({
        url: '../ajax/unfollow.php',
        type: 'POST',
        data: {id_group:id_group},
        success: function(data){ 
            if (data == "") {
                $(".popup_sucess").show().css({
                'zIndex': '4'
                });
                $(".popup_sucess_title").text("Bạn đã bỏ theo dõi nhóm " + name_group);
            }else{
                alert("Error");
            }
        }
    });
}

// Bỏ theo dõi - trang chi tiết nhóm
$(document).on('click', '.detail_click_unfollow', function() {
    var id_group = $(this).parents(".popup_avt_btn").attr('data-id-group');
    var name_group = $(this).parents(".pg_main_head_member").find(".pg_main_head_member_name").html();
    $.ajax({
        url: '../ajax/unfollow.php',
        type: 'POST',
        data: {id_group:id_group},
        success: function(data){
            // console.log(data);
            if (data == "") {
                $(".popup_sucess_title").html("Bạn đã bỏ theo dõi nhóm"+" "+ name_group);
                $(".popup_sucess").show();
            }else{
                alert("Error");
            }
        }
    });
});

// Theo giõi
function click_follow(id_group){
    var id_group = id_group;
    $.ajax({
        url: '../ajax/follow.php',
        type: 'POST',
        data: {id_group:id_group},
        success: function(data){
            // console.log(data);
            if (data == "") {
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
}
    

$("input[name=turnoff_group]").click(function(){
    if ($("input[name=turnoff_group]").is(":checked")) {
        var val_check = $(this).val();
    }

    $.ajax({
        url: '../ajax/turnoff_group_notifications.php',
        type: 'POST',
        data: {val_check:val_check},
        success: function(data){
            // console.log(data);
            if (data == "") {
                window.location.reload();
            }else{
                alert("Error");
            }
        }
    });
});


$(document).on('click', '.remove_group_feed', function() {
    $(this).parents(".group_demo_padding").remove();
    var id_group = $(this).attr("data-id-group");

    $.ajax({
        url: '../ajax/remove_group_feed.php',
        type: 'POST',
        data: {id_group:id_group},
        success: function(data){
            // console.log(data);
            alert("Gỡ thành công");
            
        }
    });
});




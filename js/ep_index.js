class rendered { 
    get_reaction(type) {
        var reaction_arr = [
            { text: 'Thích', color: 'blue' },
            { text: 'Yêu thích', color: 'red' },
            { text: 'Wow', color: 'yellow' },
            { text: 'Thương thương', color: 'yellow' },
            { text: 'Phẫn nộ', color: 'red' },
            { text: 'Buồn', color: 'yellow' },
            { text: 'Ha ha', color: 'yellow' }
        ];
        return reaction_arr[parseInt(type) - 1];
    }
    filter_list_reaction(list) {
        var list_reaction_by_type = [];
        if (list.length) {
            for (let i = 0; i < 7; i++) {
                if (list.filter(x => x.nr_type == i + 1).length) {
                    list_reaction_by_type.push(list.filter(x => x.nr_type == i + 1));
                }
            }
        }
        list_reaction_by_type.sort(function(a, b) { return b.length - a.length });
        return list_reaction_by_type;
    }
    // text thả cảm xúc bài viêt
    render_reaction(list_react) { 
        let html = '',
            list_reaction_by_type = render.filter_list_reaction(list_react);
        if (list_react.length > 0) {
            html = `
            <div class="box_icon_react">`
                list_reaction_by_type.forEach(function callback(list_react, i) {
                    if (i < 3) {
                        html += `
                        <div class="btn_hover_icon_react" data-icon_type="${list_react[0].nr_type}" data-new_id = "${list_react[0].nr_new_id}">
                            <img class="icon_react_small" src="../img/reaction/reaction_${list_react[0].nr_type}.svg" alt="Ảnh lỗi">
                        </div>`;
                    }
                });
            html += `</div>
            <div class="box_txt_react box_reaction" data-new_id="${list_react[0].nr_new_id}">
                <button class="hover_txt_underline count_react_post">`
                    if (list_react.filter(x => (x.id_user == user_id && x.user_type == user_type)).length) {
                        if (list_react.length - 1 > 0) {
                            html += `Bạn và ${list_react.length - 1} người khác`;
                        } else {
                            html += `Bạn`;
                        }
                    } else {
                        html += `${list_react.length} người`;
                    }
                html += `
                </button>
            </div>`
        } 
        return html;
    }
    render_icon_react(icon = null) {
        if (icon != null) {
            return `
                <img class="icon_react" src="../img/reaction/reaction_${icon}.svg" alt="Ảnh lỗi">
                <p class="txt_react active ${render.get_reaction(icon).color}" data-react_type="${icon}">${render.get_reaction(icon).text}</p>
            `;
        } else {
            return `
                <img class="icon_react" src="../img/ep_post_active_like.svg" alt="Ảnh lỗi">
                <p class="txt_react">Thích</p>
            `;
        }
    }
    // danh sách những user thả cảm xúc, chia sẻ, bình luận
    render_box_user(list_user, title) {
        let html = `
        <div class="contain_hover_box">
            <div class="lst_hover_box">
                <p class="title_hover_box">${title}</p>
                <div class="content_hover_box">`
                    list_user.forEach(function callback(user, i) {
                        html += `<a target="_blank" href="${render.render_link_profile(user['id_user'], user['user_type'])}" class="name_user_hover_box hover_txt_underline">${user['user_name']}</a>`;
                    });
                html += `</div>
            </div>
        </div>
        `;
        return html;
    }
    // link trang cá nhân
    render_link_profile(user_id, user_type)
    {
        let link = '/trang-ca-nhan-e'+user_id;
        if (user_type == 1) {
            link = '/trang-ca-nhan-c'+user_id;
        } 
        return link;
    }
    // danh sách cmt con
    render_list_comment_child(info_cmt_parent, list_comment_child, el_news) {
        let html_list_reply = '',
            is_admin = el_news.attr('data-is_admin'),
            is_author = el_news.attr('data-author'),
            type_author = el_news.attr('data-author_type'),
            group_pause = el_news.attr('data-group_pause'),
            tat_comment = el_news.attr('data-tat_comment'),
            suspended_me = el_news.attr('data-suspended_me');

        list_comment_child = list_comment_child.reverse();
        list_comment_child.forEach(function callback(cmt_child, i) {
            if (cmt_child.hidden == 0 || ((info_cmt_parent.hidden == 1 || cmt_child.hidden == 1) && (is_author == 1 || is_admin == 1))){
                var class_op = '';
                if (info_cmt_parent.hidden == 1 || cmt_child.hidden == 1){
                    class_op = ' opacity-0p15';
                }
                var type_create = 0;
                if (user_id != 0 && cmt_child.id_user == user_id && cmt_child.user_type == user_type) {
                    type_create = 1;
                }  
                let link_user_cmt = render.render_link_profile(cmt_child['id_user'], cmt_child['user_type']);
                html_list_reply += `
                <div class="ep_show_repcmt_detail cmt_child_item" data-hidden="${cmt_child.hidden}" data-idcmt = '${cmt_child['id']}'>
                    <a target="_blank" href="${link_user_cmt}">
                        <img class="ep_show_cmt_avt ${class_op}" src="${cmt_child['avt_user_cmt']}" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
                    </a>
                    <div class="ep_show_cmt_content">
                        <div class="ep_show_cmt_content_detail ${class_op}">
                            <a target="_blank" href="${link_user_cmt}" class="ep_show_cmt_username">${cmt_child.name_user_cmt}</a>
                            <div class="content_posts box_content_cmt">
                                <p class="ep_show_cnt_item content_comment_child content_limit" id="text_comment${cmt_child.id}">${cmt_child.content.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2')}</p>
                            </div>`
                            if (cmt_child.image != '') {
                                html_list_reply += `<img class="image_cmt" id="img_cmt${cmt_child.id}" src="${cmt_child.image}" alt="Ảnh lỗi">`;
                            }
                        html_list_reply += `
                        </div>`
                        if (user_id && ((cmt_child.id_user == user_id && cmt_child.user_type == user_type) || is_admin == 1 || (is_author == user_id && type_author == user_type)) && tat_comment == 0 && group_pause == 0 && suspended_me == 0){
                            html_list_reply += `
                            <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                            <div class="popup_action_cmt">`
                                if (type_create == 1){
                                    html_list_reply += `
                                    <div class="popup_action_cmt_detail action_edit_comment child" data-cmt_id="${cmt_child.id}">
                                        <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                            alt="Ảnh lỗi">
                                        Chỉnh sửa bình luận
                                    </div>`;
                                }
                                if (is_author == user_id || is_admin == 1){
                                    if (cmt_child.hidden == 1){
                                        html_list_reply += `
                                        <div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmt(this,${cmt_child.id},${info_cmt_parent.id})">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi">
                                            Hiển thị bình luận
                                        </div>`;
                                    }else{
                                        html_list_reply += `
                                        <div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmt(this,${cmt_child.id},${info_cmt_parent.id})">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                                            Ẩn bình luận
                                        </div>`;
                                    }
                                }
                                html_list_reply += `
                                <div class="popup_action_cmt_detail" onclick="deleteCmt(this,${cmt_child.id})">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>`;
                            html_list_reply += `
                            </div>`
                        }
                    html_list_reply += `
                        <div class="ep_show_cmt_action2">`
                            if (group_pause == 0 && suspended_me == 0){
                                html_list_reply += `
                                    <div class="box_hover_reaction box_hover_react_cmt">`
                                    if (cmt_child.list_react_cmt.filter(x => (x.id_user == user_id && x.user_type == user_type)).length) {
                                        html_list_reply += render.render_icon_react_cmt(cmt_child.id, cmt_child.list_react_cmt.filter(x => (x.id_user == user_id && x.user_type == user_type))[0].react_type)
                                    } else {
                                        html_list_reply += render.render_icon_react_cmt(cmt_child.id)
                                    }
                                html_list_reply += `
                                </div>`
                            }
                            html_list_reply += `
                            <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">${handle.convert_last_time(cmt_child.created_at)}</button>
                            <div class="ep_show_cmt_action2_count_like box_reaction_cmt" data-cmt_id="${cmt_child['id']}">
                                ${render.render_react_cmt(cmt_child['list_react_cmt'])}
                            </div>
                        </div>
                    </div>
                </div>
                `;
            } 
        });
        return html_list_reply;
    }
    // danh sách cmt sau khi nhấn xem thêm
    render_list_comment(list_comment, el_news) {
        let html_list_comment = '',
            new_id = el_news.attr('data-new_id'),
            is_admin = el_news.attr('data-is_admin'),
            is_author = el_news.attr('data-author'),
            type_author = el_news.attr('data-author_type'),
            group_pause = el_news.attr('data-group_pause'),
            suspended_me = el_news.attr('data-suspended_me'),
            tat_comment = el_news.attr('data-tat_comment');

        list_comment = list_comment.reverse();
        list_comment.forEach(function callback(cmt, i) {
            if (cmt['hidden'] == 0 || (cmt['hidden'] == 1 && (is_author == user_id || is_admin == 1))) {
                if (!$(`.cmt_parent_item[data-idcmt="${cmt['id']}"]`).length) {
                    if (cmt['hidden'] == 1){
                        var class_avt = " opacity-0p15",
                            txt_cmt_detail_action = "Hiện bình luận",
                            ico_cmt_detail_action = "../img/ep_show_cmt.svg";
                    }else{
                        var class_avt = "",
                            txt_cmt_detail_action = "Ẩn bình luận",
                            ico_cmt_detail_action = "../img/ep_hide_cmt.svg";
                    }
                    let link_user_cmt = render.render_link_profile(cmt['id_user'], cmt['user_type']);
                    html_list_comment += `
                    <div class="ep_post_show_cmt_detail cmt_parent_item" data-idcmt = '${cmt['id']}' style="display: flex;">
                        <a target="_blank" href="${link_user_cmt}">
                            <img class="ep_show_cmt_avt${class_avt}" src="${cmt['avt_user_cmt']}" alt="Ảnh lỗi">
                        </a>
                        <div class="ep_show_cmt_content">
                            <div class="ep_show_cmt_content_detail${class_avt}">
                                <a target="_blank" href="${link_user_cmt}" class="ep_show_cmt_username">${cmt['name_user_cmt']}</a>
                                <div class="content_posts box_content_cmt">
                                    <p class="ep_show_cnt_item content_comment content_limit" id="text_comment${cmt['id']}">${handle.nl2br(cmt['content'])}</p>
                                </div>`
                                if (cmt['image'] != '') { 
                                    html_list_comment += `
                                    <img class="image_cmt" id="img_cmt${cmt['id']}" src="${cmt['image']}" alt="Ảnh lỗi">`
                                } 
                            html_list_comment += `
                            </div>`
                            if (user_id && ((cmt['id_user'] == user_id && cmt['user_type'] == user_type) || is_admin == 1 || (is_author == user_id && type_author == user_type)) && tat_comment == 0 && group_pause == 0 && suspended_me == 0) {
                                html_list_comment += `
                                <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                <div class="popup_action_cmt">`
                                    if (cmt['id_user'] == user_id){
                                        html_list_comment += ` 
                                        <div class="popup_action_cmt_detail action_edit_comment" data-cmt_id="${cmt['id']}">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                            Chỉnh sửa bình luận
                                        </div>
                                        `
                                    } 
                                    if (is_author == user_id || is_admin == 1){ 
                                        html_list_comment += `
                                        <div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideCmt(this,${cmt['id']})">
                                            <img class="popup_action_cmt_detail_img" src="${ico_cmt_detail_action}" alt="Ảnh lỗi">
                                            ${txt_cmt_detail_action}
                                        </div>
                                        `
                                    } 
                                    if (cmt['id_user'] == user_id || is_author == user_id || is_admin == 1){
                                        html_list_comment += `
                                        <div class="popup_action_cmt_detail" onclick="deleteCmt(this,${cmt['id']})">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                                alt="Ảnh lỗi">
                                            Xóa bình luận
                                        </div>
                                        `
                                    } 
                                html_list_comment += `</div>`
                            }
                            html_list_comment += `
                            <div class="ep_show_cmt_action2">`
                                if (user_id && group_pause == 0 && suspended_me == 0){
                                    html_list_comment += `
                                    <div class="box_hover_reaction box_hover_react_cmt">`
                                        if (cmt['list_react_cmt'].filter(x => (x.id_user == user_id && x.user_type == user_type)).length) {
                                            html_list_comment += render.render_icon_react_cmt(cmt['id'], cmt['list_react_cmt'].filter(x => (x.id_user == user_id && x.user_type == user_type))[0].react_type)
                                        } else {
                                            html_list_comment += render.render_icon_react_cmt(cmt['id'])
                                        }
                                    html_list_comment += `
                                    </div>`
                                    if (tat_comment == 0){
                                        html_list_comment += `
                                        <a class="action_reply_cmt ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep" ${(user_id)?'':'target="_blank" href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html"'}>Trả lời . </a>
                                        `
                                    }
                                }
                                html_list_comment += `
                                <button class="ep_show_cmt_action2_btn">${handle.convert_last_time(cmt['created_at'])}</button>
                                <div class="ep_show_cmt_action2_count_like box_reaction_cmt" data-cmt_id="${cmt['id']}">
                                    ${render.render_react_cmt(cmt['list_react_cmt'])}
                                </div>
                            </div>
                        </div>
                        <!-- danh sách trả lời bình luận -->
                        <div class="ep_show_repcmt list_cmt_child">
                            ${cmt['count_list_reply_comment']>cmt['list_reply_comment'].length?'<button class="btn_view_cmt_child" data-page="1">Xem các trả lời trước</button>':''}
                            <div class="content_cmt_child" id="ep_form_repcmt${cmt['id']}">`
                                if (user_id && tat_comment == 0 && group_pause == 0 && suspended_me == 0){
                                    html_list_comment += render.render_list_comment_child(cmt, cmt['list_reply_comment'], el_news)
                                }
                            html_list_comment += ` 
                            </div>
                        </div>
                    </div>
                    `;     
                }
            }
        });
        return html_list_comment;
    }
    // html bình luận cha
    render_comment(comment, isauthor) {
        var html = `
        <div class="ep_post_show_cmt_detail cmt_parent_item" data-idcmt="${comment.id}" style="display: flex;">
            <img class="ep_show_cmt_avt" src="${comment.avatar}" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
            <div class="ep_show_cmt_content">
                <div class="ep_show_cmt_content_detail">
                    <p class="ep_show_cmt_username">${comment.name}</p>
                    <div class="content_posts box_content_cmt">
                        <p class="ep_show_cnt_item content_comment content_limit" id="text_comment${comment.id}">${handle.nl2br(comment.comment)}</p>
                    </div>`;
                    if (comment.img != '') {
                        html += `
                        <img class="image_cmt" id="img_cmt${comment.id}" src="${comment.img}" alt="Ảnh lỗi">`;
                    }
                html += `
                </div>
                <!-- chức năng quản lý bình luận -->
                <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                <div class="popup_action_cmt">
                    <div class="popup_action_cmt_detail action_edit_comment" data-cmt_id="${comment.id}">
                        <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                        Chỉnh sửa bình luận
                    </div>`;
                    if (isauthor == 1){
                        html += `
                        <div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideCmt(this,${comment.id})">
                            <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                            Ẩn bình luận
                        </div>`;
                    }
                    html += `
                    <div class="popup_action_cmt_detail" onclick="deleteCmt(this,${comment.id})">
                        <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                alt="Ảnh lỗi">
                            Xóa bình luận
                        </div>
                    </div>
                    <!-- chức năng tương tác với bình luận / thống kê thời gian, tương tác -->
                    <div class="ep_show_cmt_action2">
                        <div class="box_hover_reaction box_hover_react_cmt">
                            <button data-type="0" class="btn_action_react ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment(this,${comment.id})">Thích .</button>
                        </div>
                        <button class="action_reply_cmt ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                        <button class="ep_show_cmt_action2_btn">${comment.time_active}</button>
                        <div class="ep_show_cmt_action2_count_like box_reaction_cmt" data-cmt_id="${comment.id}">

                        </div>
                    </div>
                </div> 
                <div class="ep_show_repcmt list_cmt_child">

                </div>  
            </div>
        </div>`;
        return html;
    }
    // html box trả lời cmt
    render_box_comment() {
        return `
            <div class="ep_form_repcmt form_reply_cmt">
                <img class="ep_post_write_avt" src="${user_avt}" alt="Ảnh lỗi">
                <div class="ep_post_write_repcmt box_comment_submit" data-type="0">
                    <textarea class="ep_post_write_input comment_submit" type="text" placeholder="Viết bình luận..."></textarea>
                    <div class="ep_post_write_action">
                        <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                        <div class="box_choose_file_cmt">
                            <img class="ep_post_write_action_deatail icon_img_cmt" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                            <input type="file" class="file_img_cmt" onchange="changeImgCmt(this)" accept="image/*" hidden>
                        </div>
                        <button class="ep_submit_mess">
                            <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                        </button>
                    </div>
                    <div class="box_render_img_cmt"> </div>
                </div>  
            </div>
        `;
    } 
    // html bình luận con
    render_reply_comment(reply, isauthor) {
        let html = `
        <div class="ep_show_repcmt_detail cmt_child_item" data-idcmt = '${reply.id}'>
            <a target="_blank" href="#">
                <img class="ep_show_cmt_avt" src="${reply.avatar}" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
            </a>
            <div class="ep_show_cmt_content">
                <div class="ep_show_cmt_content_detail">
                    <a target="_blank" href="#" class="ep_show_cmt_username">${reply.name}</a>
                    <div class="content_posts box_content_cmt">
                        <p class="ep_show_cnt_item content_comment_child content_limit" id="text_comment${reply.id}">${reply.comment.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2')}</p>
                    </div>`
                    if (reply.img != '') {
                        html += `<img class="image_cmt" id="img_cmt${reply.id}" src="${reply.img}" alt="Ảnh lỗi">`;
                    }
                html += `
                </div>
                <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                <div class="popup_action_cmt">
                    <div class="popup_action_cmt_detail action_edit_comment child" data-cmt_id="${reply.id}">
                        <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                            alt="Ảnh lỗi">
                        Chỉnh sửa bình luận
                    </div>
                    <div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmt(this,${reply.id},${reply.id})">
                        <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                        Ẩn bình luận
                    </div>
                    <div class="popup_action_cmt_detail" onclick="deleteCmt(this,${reply.id})">
                        <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                            alt="Ảnh lỗi">
                        Xóa bình luận
                    </div>
                </div>
                <div class="ep_show_cmt_action2">
                    <div class="box_hover_reaction box_hover_react_cmt">
                        <button data-type="0" class="btn_action_react ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment(this,${reply.id})">Thích .</button>
                    </div>
                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">${reply.time_active}</button>
                    <div class="ep_show_cmt_action2_count_like box_reaction_cmt" data-cmt_id="${reply.id}">

                    </div>
                </div>
            </div>
        </div>
        `;
        return html;
    }
    // render chỉnh sửa bình luận
    change_comment_content(comment) {
        var el_content_cmt = $(`.cmt_parent_item[data-idcmt="${comment.id}"] .content_comment`);
        if (comment.id_parent != 0) {
            el_content_cmt = $(`.cmt_child_item[data-idcmt="${comment.id}"] .content_comment_child`);
        } 
        el_content_cmt.html(handle.nl2br(comment.content));
        if (comment.image) {
            let check_img = el_content_cmt.siblings('.image_cmt');
            if (check_img.length) {
                el_content_cmt.siblings('.image_cmt').attr('src', comment.image);
            } else {
                 el_content_cmt.parents('.ep_show_cmt_content_detail').append(`<img class="image_cmt" id="img_cmt${comment.id}" src="${comment.image}" alt="Ảnh lỗi">`);
            }
        } else {
            $('#img_cmt'+comment.id).remove();
        } 
    }
    // ds cảm xúc
    render_list_emoticon() {
        return `
            <div class="list_icon_cxuc">
                <div class="icon_cxuc action_react_detail">
                    <button class="btn_none" data-react="1"><img class="img_icon_react" src="../img/reaction/reaction_1.svg"></button>
                    <button class="btn_none" data-react="2"><img class="img_icon_react" src="../img/reaction/reaction_2.svg"></button>
                    <button class="btn_none" data-react="3"><img class="img_icon_react" src="../img/reaction/reaction_3.svg"></button>
                    <button class="btn_none" data-react="4"><img class="img_icon_react" src="../img/reaction/reaction_4.svg"></button>
                    <button class="btn_none" data-react="5"><img class="img_icon_react" src="../img/reaction/reaction_5.svg"></button>
                    <button class="btn_none" data-react="6"><img class="img_icon_react" src="../img/reaction/reaction_6.svg"></button>
                    <button class="btn_none" data-react="7"><img class="img_icon_react" src="../img/reaction/reaction_7.svg"></button>
                </div>
            </div>
        `;
    }
    filter_list_react_cmt(list) {
        var list_reaction_by_type = [];
        if (list.length) {
            for (let i = 0; i < 7; i++) {
                if (list.filter(x => x.react_type == i + 1).length) {
                    list_reaction_by_type.push(list.filter(x => x.react_type == i + 1));
                }
            }
        }
        list_reaction_by_type.sort(function(a, b) { return b.length - a.length });
        return list_reaction_by_type;
    }
    render_react_cmt(list_react) {
        let html = '',
            list_reaction_by_type = render.filter_list_react_cmt(list_react);
        if (list_react.length > 0) {
            html = `
            <div class="box_icon_react">`
                list_reaction_by_type.forEach(function callback(list_react, i) {
                    if (i < 3) {
                        html += `
                        <div class="btn_hover_icon_react_cmt" data-icon_type="${list_react[0].react_type}" data-cmt_id = "${list_react[0].id_comment}">
                            <img class="icon_react_small" src="../img/reaction/reaction_${list_react[0].react_type}.svg" alt="Ảnh lỗi">
                        </div>`;
                    }
                });
            html += `</div>
            <div class="box_txt_react box_reaction" data-cmt_id = "${list_react[0].id_comment}">
                <button class="hover_txt_underline btn_action_react_cmt">
                    <span class="number_count_like">${list_react.length}</span>
                </button>
            </div>`
        } 
        return html;
    }
    render_icon_react_cmt(cmt_id, icon = null) {
        if (icon != null) {
            return `
                <button data-type="1" class="btn_action_react ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like ${render.get_reaction(icon).color}" onclick="like_comment(this,${cmt_id})">${render.get_reaction(icon).text} .</button>
            `;
        } else {
            return `
                <button data-type="0" class="btn_action_react ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment(this,${cmt_id})">Thích .</button>
            `;
        }
    }
    // load nội dung bài viết xem thêm hoặc thu gọn
    see_more_content_post() {
        let el_content_post = $(`.content_posts .content_limit`);
        for (var i = 0; i < el_content_post.length; i++) {
            let el_see_more_content_post = el_content_post.eq(i).parents('.content_posts').find('.see_more_content_post');
            if (el_content_post[i].scrollHeight > el_content_post.eq(i).height()) {
                if (!el_see_more_content_post.length) {
                    el_content_post.eq(i).parents('.content_posts').append(`<button class="see_more_content_post">Xem thêm</button>`);
                }
            } else {
                if (el_see_more_content_post.length && !el_see_more_content_post.hasClass('show_full')) {
                    el_see_more_content_post.remove();
                }
            }
        }
    }
}
class handled { 
    callAjax(url, type = "POST", data, position = '', async = false) {
        var res
        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType: 'JSON',
            async: async,
            beforeSend: function() { 
                if (position) {
                    position.attr('disabled', true)
                        .addClass('disabled')
                        .append('<img class="loading_handle" src="../img/loading.gif">');
                } 
            },
            success: function(output) { 
                res = output
            },
            complete: function(){
                if (position) {
                    position.removeAttr('disabled')
                        .removeClass('disabled')
                        .find('.loading_handle').remove();   
                } 
            }
        });
        return res;
    }
    callAjaxFormData(url, type = "POST", formData, async = false, loading = 0) {
        var res
        $.ajax({
            url: url,
            type: type,
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            dataType: 'JSON',
            async: async,
            success: function(output) {
                res = output;
            }
        });
        return res;
    }
    time_to_hours(time = 0) {
        var str = '';
        if (time) {
            var date = new Date(time * 1000);
        } else {
            var date = new Date();
        }
        let h = date.getHours();
        let m = date.getMinutes();
        str = ''
        h < 10 ? str += '0' + h : str += h;
        str += ':';
        m < 10 ? str += '0' + m : str += m;
        return str;
    }
    time_to_dmy(time) {
        let date = new Date(time * 1000);
        let d = date.getDate();
        let m = date.getMonth() + 1;
        let Y = date.getFullYear();
        let str = ''
        d < 10 ? str += '0' + d : str += d;
        str += '/';
        m < 10 ? str += '0' + m : str += m;
        str += '/' + Y;
        return str;
    }
    conv_time(time) {
        var date = new Date(time * 1000);
        var time_last = (Math.floor(Date.now() / 1000)) - time;
        if (Math.floor(time_last / 86400) > 0 && Math.floor(time_last / 86400) < 7) {
            var day = date.getDay();
            if (day == 0) {
                return 'CN';
            } else {
                return 'T' + (parseInt(day) + 1);
            }
        } else if (Math.floor(time_last / 86400) >= 7) {
            return this.time_to_dmy(time);
        } else {
            return this.time_to_hours(time);
        }
    }
    convert_last_time(time) {
        time = parseInt(time);
        let time_now = parseInt(Math.floor(Date.now() / 1000));
        let str = '';
        let time_last = time_now - time;
        if (time_last < 60) {
            str = 'Vừa xong';
        } else if (time_last < 3600) {
            str = `${Math.floor(time_last/60)} phút trước`
        } else if (time_last < 86400) {
            str = `${Math.floor(time_last/3600)} giờ trước`
        } else {
            str = this.conv_time(time) + ' lúc ' + this.time_to_hours(time);
        }
        return str;
    }
    nl2br(str, replaceMode = 1, isXhtml) {
        var breakTag = (isXhtml) ? '<br />' : '<br>';
        var replaceStr = (replaceMode) ? '$1' + breakTag : '$1' + breakTag + '$2';
        return (str).replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, replaceStr);
    }
    focusAtEnd(el) {
        el.focus();
        if (typeof window.getSelection != "undefined" &&
            typeof document.createRange != "undefined") {
            var range = document.createRange();
            range.selectNodeContents(el);
            range.collapse(false);
            var sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
        } else if (typeof document.body.createTextRange != "undefined") {
            var textRange = document.body.createTextRange();
            textRange.moveToElementText(el);
            textRange.collapse(false);
            textRange.select();
        }
    }
    // lấy ds user theo chế độ
    list_user_regime(new_id) {
        let result;
        result = this.callAjax('../ajax/list_user_regime.php', "GET", { new_id: new_id });
        return result;
    }
    // thả cảm xúc bài viết
    reaction(new_id, react_type, type) { 
        let result;
        result = this.callAjax('../ajax/like_active.php', "POST", { new_id, react_type, type });
        return result;
    }
    // danh sách người thả cảm xúc
    get_list_reaction(new_id, icon_type) {
        let list_react = this.callAjax('../ajax/get_list_reaction.php', "GET", { new_id, icon_type });
        return list_react;
    }
    // danh sách người chia sẻ
    get_list_user_share(new_id) {
        let list_share = this.callAjax('../ajax/get_list_user_share.php', "GET", { new_id });
        return list_share;
    }
    // danh sách người bình luận
    get_list_user_comment(new_id) {
        let list_cmt = this.callAjax('../ajax/get_list_user_comment.php', "GET", { new_id });
        return list_cmt;
    }
    // danh sách cmt
    get_list_comment(new_id, comment_id, list_comment_loaded = [], position = '') {
        let list_loaded = '';
        if (list_comment_loaded.length) {
            list_loaded = "(" + list_comment_loaded.join(',') + ")"
        }
        var list_comment = this.callAjax('../ajax/get_list_comment.php', "GET", { new_id, comment_id, list_loaded }, position)
        return list_comment;
    }
    // lấy thông tin cmt
    get_info_comment(comment_id) {
        var comment = this.callAjax('../ajax/get_info_comment.php', "GET", { comment_id });
        return comment;
    }  
    // bình luận / trả lời bình luận
    comment(new_id, comment, img_comment, comment_id = '') {
        var formData = new FormData(); 
        formData.append('new_id', new_id);
        formData.append('comment', comment);
        formData.append('img_comment', img_comment); 
        if (comment_id) {
            formData.append('cmt_id', comment_id); 
            var ajax = '../ajax/rep_comment_post.php';
        } else {
            var ajax = '../ajax/comment_post.php';
        }
        var result = this.callAjaxFormData(ajax, "POST", formData);
        return result;
    } 
    // sửa bình luận
    edit_comment(cmt_id, comment, img_comment, file_delete) {
        var formData = new FormData(); 
        formData.append('cmt_id', cmt_id);
        formData.append('comment', comment);
        formData.append('img_comment', img_comment); 
        formData.append('file_delete', file_delete); 
        var result = this.callAjaxFormData('../ajax/comment_post_edit.php', "POST", formData);
        return result;
    }
    // xóa bình luận
    delete_comment(cmt_id) {
        var result = this.callAjax('../ajax/delete_comment.php', "POST", { cmt_id });
        return result;
    }
    // thả cảm xúc bình luận
    reaction_comment(id, react_type, type) { 
        let result;
        result = this.callAjax('../ajax/like_comment.php', "POST", { id, react_type, type });
        return result;
    }
    // danh sách người thả cảm xúc cmt
    get_list_reaction_cmt(cmt_id, icon_type) {
        let list_react = this.callAjax('../ajax/get_list_reaction_cmt.php', "GET", { cmt_id, icon_type });
        return list_react;
    } 
}

const handle = new handled();
const render = new rendered();
// lấy thông tin user đăng nhập
let info_login = handle.callAjax('../ajax/get_info_login.php', "POST", {});
if (info_login.data) {
    var user_id = info_login.data['user_id'],
        user_type = info_login.data['user_type'],
        user_name = info_login.data['user_name'],
        user_avt = info_login.data['user_avt'];
} else {
    var user_id = 0,
        user_type = 0,
        user_name = '',
        user_avt = '';
}
render.see_more_content_post();
var arr_image_video = [];
var arr_file = [];

var arr_old_file = [];
var arr_old_file_name = [];
var arr_old_img = [];
var arr_old_img_name = [];

var allow_exten = ['png','jpg','jpeg','gif','mp4','avi','flv','mov','pdf','doc','docx','xlsx','xls','txt','pptx','rtf'];

$(document).ready(function () {

    $(".setting_private-card1").click(function() {
        $(".except").show();
        $(".popup_regime").hide();
    });

    $(".setting_private-card2").click(function() {
        $(".special").show();
        $(".popup_regime").hide();
    });

    $(".except_detail_back, .turnoff_popup").click(function() {
        $(".except").hide();
        $(".setting").hide();
    });

    $(".except .except_detail_back").click(function() {
        $(".except").hide();
        $(".popup_regime").show();
    });

    $(".special .except_detail_back").click(function() {
        $(".special").hide();
        $(".popup_regime").show();
    });
    $(".except_info_user").click(function() {
        var id = $(this).data("id"),
            type = $(this).attr('data-type365');

        if ($(this).find(".icon_except_circle").attr("fill") == "#CCCCCC") {
            $(this).find(".icon_except_circle").attr("fill", "#FF3333");
            $(this).find(".except_checkbox").prop("checked", true);
            html = `
            <div class="except_detail_box_item" data-id="`+id+`" data-type365="${type}">
                <img class="except_detail_box_item_avt" src="` + $(this).find(".except_detail_body_avt").attr("src") + `" alt="Ảnh lỗi">
                <p class="except_detail_box_item_name">` + $(this).text() + `</p>
                <img class="except_detail_box_item_del2" src="../img/xoa_user.svg" alt="Ảnh lỗi" data-id="`+id+`">
            </div>`;
            $(".except_detail_box_list_item2").append(html);
        } else {
            $(this).find(".icon_except_circle").attr("fill", "#CCCCCC");
            $(this).find(".except_checkbox").prop("checked", false);
            var id = $(this).data("id");
            el_parent = $(this).parents(".except_list_item").next().find(".except_detail_box_list_item2");

            for (var i = 0; i < el_parent.find(".except_detail_box_item").length; i++) {
                if (el_parent.find(".except_detail_box_item").eq(i).data("id") == id) {
                    el_parent.find(".except_detail_box_item").eq(i).remove();
                    break;
                }   
            }
        }
        if ($(".except .except_detail_box_item").length <= 0){
            $(".except .except_save").prop("disabled",true);
        }else{
            $(".except .except_save").prop("disabled",false);
        }
    });
    $(".except_info_user2").click(function() {
        var id = $(this).data("id"),
            type = $(this).attr('data-type365');
        if ($(this).find(".icon_except_circle").attr("fill") == "#CCCCCC") {
            $(this).find(".icon_except_circle").attr("fill", "#4C5BD4");
            $(this).find(".except_checkbox").prop("checked", true);
            html = `
            <div class="except_detail_box_item" data-id="`+id+`" data-type365="${type}">
                <img class="except_detail_box_item_avt" src="` + $(this).find(".except_detail_body_avt").attr("src") + `" alt="Ảnh lỗi">
                <p class="except_detail_box_item_name">` + $(this).text() + `</p>
                <img class="except_detail_box_item_del" src="../img/xoa_user.svg" alt="Ảnh lỗi" data-id="`+id+`">
            </div>`;
            $(".except_detail_box_list_item").append(html);
        } else {
            $(this).find(".icon_except_circle").attr("fill", "#CCCCCC");
            $(this).find(".except_checkbox").prop("checked", false);
            var id = $(this).data("id");
            el_parent = $(this).parents(".except_list_item").next().find(".except_detail_box_list_item");

            for (var i = 0; i < el_parent.find(".except_detail_box_item").length; i++) {
                if (el_parent.find(".except_detail_box_item").eq(i).data("id") == id) {
                    el_parent.find(".except_detail_box_item").eq(i).remove();
                    break;
                }   
            }
        }
        if ($(".special .except_detail_box_item").length <= 0){
            $(".special .except_save").prop("disabled",true);
        }else{
            $(".special .except_save").prop("disabled",false);
        }
    });
    $(".turnoff_except,.except_cancel").click(function() {
        $(".except").hide();
        $(".popup_regime").attr("data-update",0);
    });
    $(".turnoff_special,.except_cancel").click(function() {
        $(".special").hide();
        $(".popup_regime").attr("data-update",0);
    });
    // search @ popup bạn bè ngoại trừ
    $(".except .except_detail_input").on('input',function(){
        var find_key = $(".except .except_detail_input").val().trim();
        if (find_key == ""){
            $(".except .except_info_user").show();
        }else{
            $(".except .except_info_user").each(function(){
                var name = $(this).text().trim().toLowerCase();
                if (name.includes(find_key) == true) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
    // search @ popup bạn bè cụ thể
    $(".special .except_detail_input").on('input',function(){
        var find_key = $(".special .except_detail_input").val().trim();
        if (find_key == ""){
            $(".special .except_info_user2").show();
        }else{
            $(".special .except_info_user2").each(function(){
                var name = $(this).text().trim().toLowerCase();
                if (name.includes(find_key) == true) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
    $('.post_feel_search').click(function () {
        $(".popup_post_new").fadeIn();
        // $(".upload_file").show();
        if ($(".form_popup_post_new").data("update") != 0){
            var r = confirm("Bạn đang chỉnh sửa 1 bài viết, bạn có muốn tiếp tục chỉnh sửa bài viết");
            if (r == false){
                resetFormPost();
                $(".popup_post_new .add_new_post_icon_file").show();
            }
        }
    });
    $('.post_feel_footer_item_upload').click(function () {
        $('.post_feel_search').click();
        if ($(".add_new_post_icon_file").hasClass("add_new_post_icon_active") == false){
            $(".add_new_post_icon_file").click();
        }
    });
    $(".upload_file_item").click(function () {
        $('.upload_file_post_new').click();
    });
    $(".add_new_post_icon_file").click(function () {
        if ($(this).hasClass("add_new_post_icon_active")){
            $(".del_add_file").each(function(index,element){
                $(element).click();
            });
            $(".del_upload_img").each(function(index,element){
                $(element).click();
            });
            $(".close_upload_file").click();
        }else{
            $('.upload_file').show();
            $(".close_upload_file").show();
            // $(".add_new_post_icon_file").css({
            //     'background': '#EEEEEE'
            // });
            $(".add_new_post").css({
                'margin-top': '0'
            });
            $(this).addClass("add_new_post_icon_active");
        }
        // $(this).toggleClass("add_new_post_icon_active");
    });

    // Click thêm cuộc thăm dò ý kiến
    $(".click_show_poll").click(function(){
        $(".poll").show();
        $(".add_new_post").css({
            'margin-top': '0'
        });
    })


    $(".btn_more_friend").click(function () {
        if ($(this).next().css('display') == "none") {
            $(this).next().css({
                'display': 'flex'
            });
        } else {
            $(this).next().css({
                'display': 'none'
            });
        }
    });
    $(".btn_add_friend_remove").click(function () {
        $(this).parents(".add_friend_item").remove();
    });
    $(".hide_sugget_friend").click(function () {
        $(this).parents(".add_friend").hide();
    });
    $('.upload_file_post_new').change(function () {
        var file = $(this).prop('files');
        var el = $(this).parents('.form_popup_post_new');
        $(".add_new_post_icon_file").addClass("add_new_post_icon_active");
        el.find('.upload_file').css({
            'border': 'none',
            'border-radius' : '0',
        });
        // ẩn box tải tệp to
        $(".close_upload_file").hide();
        el.find('.upload_file_item').hide();
        // thêm box tải tệp nhỏ
        var html = `<button class="qttt_add_file" type="button">
                            <img src="../img/qttt_add_file.svg" alt="qttt_add_file.svg">
                            Thêm tệp/ảnh/video
                        </button>`;
        // thêm box chứa file tải lên
        if (el.find('.add_upload_file').length == 0){
            html += `<div class="add_upload_file">
            </div>`;
        }
        // thêm box chứa ảnh/video tải lên
        if (el.find('.add_upload_img').length == 0){
            html += `<div class="add_upload_img">
            </div>`;
        }
        el.find('.upload_file').append(html);
        // duyệt file tải lên
        for (let i = 0; i < file.length; i++) {
            var reader = new FileReader();
            var extension = file[i].name.split(".");
            extension = extension[extension.length - 1].toLowerCase();
            if ($.inArray(extension,allow_exten) >= 0){
                if (file[i].type.match("image/*") != null) {
                    if (file[i].size <= 5242880){
                        // reader.onload = function (e) {
                        //     var url = e.target.result;
                        //     html = `<div class="add_upload_img_deatail">
                        //     <img class="del_upload_img" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                        //     <img class="add_upload_img_detail_item" src="` + url + `" alt="Ảnh lỗi">
                        //     </div>`;
                        //     el.find('.add_upload_img').append(html);
                        // }
                        var url = URL.createObjectURL(file[i]);
                        html = `<div class="add_upload_img_deatail">
                        <img class="del_upload_img" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                        <img class="add_upload_img_detail_item" src="` + url + `" alt="Ảnh lỗi">
                        </div>`;
                        el.find('.add_upload_img').append(html);
                        arr_image_video.push(file[i]);
                        reader.readAsDataURL(file[i]);
                    }
                } else if (file[i].type.match("video/*") != null) {
                    if (file[i].size <= 104857600){
                        // reader.onload = function (e) {
                        //     var url = e.target.result;
                        //     html = `<div class="add_upload_img_deatail">
                        //     <img class="del_upload_img" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                        //     <video class="add_upload_img_detail_item" src="` + url + `" autoplay></video>
                        //     </div>`;
                        //     el.find('.add_upload_img').append(html);
                        // }
                        var url = URL.createObjectURL(file[i]);
                        html = `<div class="add_upload_img_deatail">
                        <img class="del_upload_img" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                        <video class="add_upload_img_detail_item" src="` + url + `" autoplay></video>
                        </div>`;
                        el.find('.add_upload_img').append(html);
                        arr_image_video.push(file[i]);
                        reader.readAsDataURL(file[i]);
                    }
                } else {
                    var size = file[i].size;
                    if (size <= 5242880){
                        if (size / 1024 < 1024) {
                            size = (size / 1024).toFixed(1) + "KB";
                        } else {
                            size = ((size / 1024) / 1024).toFixed(1) + "MB";
                        }
                        html = `<div class="add_upload_file_detail">
                            <p class="add_upload_file_name">` + file[i].name + `</p>
                            <p class="add_upload_file_time">` + size + ` 10:03, 07/09/2021</p>
                            <img class="del_add_file" src="../img/del_add_filesvg.svg" alt="Ảnh lỗi">
                        </div>`;
                        el.find('.add_upload_file').append(html);
                        arr_file.push(file[i]);
                    }
                }
            }
            console.log(arr_image_video);
            console.log(arr_image_video.length);
        }
        // nếu ko có tệp nào hợp lệ được tải lên
        if (arr_image_video.length == 0 && arr_file.length == 0){
            $(".upload_file").find(".qttt_add_file").remove();
            $(".upload_file").find(".add_upload_file").remove();
            $(".upload_file").find(".add_upload_img").remove();
            $(".upload_file").find(".upload_file_item").show();
            $(".close_upload_file").show();
            $(".upload_file").css({
                'border': '1px solid #999999',
                'border-radius' : '10px',
            });
            if (file.length > 0){
                alert("Bạn hãy tải lên tệp/ảnh dưới 5MB, video dưới 100MB");
            }
        }
    });

    $(".upload_file_post_new2").change(function () {
        var file = $(this).prop('files');
        var el = $(this).parents('.form_popup_post_new');
        el.find('.upload_file').css({
            'border': 'none',
            'border-radius' : '0',
        });
        $(".close_upload_file").hide();
        el.find('.upload_file_item').hide();
        for (let i = 0; i < file.length; i++) {
            var reader = new FileReader();
            var extension = file[i].name.split(".");
            extension = extension[extension.length - 1].toLowerCase();
            if ($.inArray(extension,allow_exten) >= 0){
                if (file[i].type.match("image/*") != null) {
                    if (file[i].size <= 5242880){
                        // reader.onload = function (e) {
                        //     var url = e.target.result;
                        //     html = `<div class="add_upload_img_deatail">
                        //     <img class="del_upload_img" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                        //     <img class="add_upload_img_detail_item" src="` + url + `" alt="Ảnh lỗi">
                        //     </div>`;
                        //     el.find('.add_upload_img').append(html);
                        // }
                        var url = URL.createObjectURL(file[i]);
                        html = `<div class="add_upload_img_deatail">
                        <img class="del_upload_img" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                        <img class="add_upload_img_detail_item" src="` + url + `" alt="Ảnh lỗi">
                        </div>`;
                        el.find('.add_upload_img').append(html);
                        arr_image_video.push(file[i]);
                        reader.readAsDataURL(file[i]);
                    }
                } else if (file[i].type.match("video/*") != null) {
                    if (file[i].size <= 104857600){
                        // reader.onload = function (e) {
                        //     var url = e.target.result;
                        //     html = `<div class="add_upload_img_deatail">
                        //     <img class="del_upload_img" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                        //     <video class="add_upload_img_detail_item" src="` + url + `" autoplay></video>
                        //     </div>`;
                        //     el.find('.add_upload_img').append(html);
                        // }
                        var url = URL.createObjectURL(file[i]);
                        html = `<div class="add_upload_img_deatail">
                        <img class="del_upload_img" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                        <video class="add_upload_img_detail_item" src="` + url + `" autoplay></video>
                        </div>`;
                        el.find('.add_upload_img').append(html);
                        arr_image_video.push(file[i]);
                        reader.readAsDataURL(file[i]);
                    }
                } else {
                    if (file[i].size <= 5242880){
                        var size = file[i].size;
                        if (size / 1024 < 1024) {
                            size = (size / 1024).toFixed(1) + "KB";
                        } else {
                            size = ((size / 1024) / 1024).toFixed(1) + "MB";
                        }
                        html = `<div class="add_upload_file_detail">
                            <p class="add_upload_file_name">` + file[i].name + `</p>
                            <p class="add_upload_file_time">` + size + ` 10:03, 07/09/2021</p>
                            <img class="del_add_file" src="../img/del_add_filesvg.svg" alt="Ảnh lỗi">
                        </div>`;
                        el.find('.add_upload_file').append(html);
                        arr_file.push(file[i]);
                    }
                }
            }
        }
    });

    $('.hide_popup, .post_new_btn_del,.post_new_btn_del').click(function () {
        $('.popup_post_new').fadeOut();
        $('.popup_post_new_gr').fadeOut();
    });

    $("[data-dimiss=modal]").click(function () {
        $(this).parents(".modal").hide();
    });

    $(".btn_turnoff_notify").click(function () {
        $(".turnon_notify").hide();
    });

    $(".turnoff_popup").click(function () {
        $(".sup_news").hide();
        $(".object").hide();
    });

    $(".turnoff_standards_community").click(function () {
        $(".standards_community").hide();
    });

    $(".sup_news_checkbox_title").click(function () {
        $(this).next().prop("checked", "true");
    });

    $(".sup_news_checkbox_title, .sup_news_checkbox_input").click(function () {
        var id = $(this).parents(".sup_news_checkbox_detail").data('id');
        title2 = `Chúng tôi chỉ gỡ những nội dung vi phạm Tiêu chuẩn cộng đồng của mình, 
        chẳng hạn như:`;
        if (id == 1) {
            title = "Ảnh khỏa thân";
            content = `<li>Ảnh khoản thân người lớn</li>
            <li>Ảnh gợi dục</li>
            <li>Hoạt động tình dục</li>
            <li>Bóc lột tình dục</li>
            <li>Dịch vụ tình dục</li>
            <li>Liên quan đến trẻ em</li>
            <li>Chia sẻ hình ảnh riêng tư</li>
            `;
        } else
            if (id == 2) {
                title = "Bạo lực";
                content = `<li>Hình ảnh bạo lực</li>
            <li>Tử vong hoặc thương nặng</li>
            <li>Mối đe dọa bạo lực</li>
            <li>Ngược đãi động vật</li>
            <li>Vấn đề khác</li>
            `;
            } else if (id == 3) {
                title = "Quấy rối";
                content = `<li>Lăng mạ hoặc chế nhạo ai đó</li>
            <li>Kêu gọi hành vi tự gây thương tích hoặc tự tử</li>
            <li>Tấn công qua các khái niệm gợi dục mang tính xúc phạm</li>
            <li>Không ngừng liên hệ với một người khi họ không hề muốn như vậy</li>
            <li>Không ngừng liên hệ với nhiều người mà không thông báo trước</li>
            `;
            } else if (id == 4) {
                title = "Tự tử / Tự gây thương tích";
                title2 = `Nếu liên hệ được với người này, bạn có thể gợi ý hoặc tự mình 
            gọi đường dây trợ giúp. Bạn có thể tìm thêm thông tin trong tài nguyên của chúng tôi.`;
                content = `<li>Tìm hiểu cách nói chuyện về vấn đề này</li>
            <li>Yêu cầu chúng tôi xem bài viết</li>
            `;
            } else if (id == 5) {
                title = "Thông tin sai sự thật";
                content = `<li>Sức khỏe</li>
            <li>Chính trị</li>
            <li>Vấn đề xã hội</li>
            <li>Vấn đề khác</li>
            `;
            } else if (id == 6) {
                title = "Spam";
                content = `<li>Mua, bán hay tặng tài khoản, vai trò hoặc quyền</li>
            <li>Khuyến khích mọi người tương tác với nội dung sai sự thật</li>
            <li>Dùng liên kết gây hiểu nhầm</li>
            <li>Vấn đề khác</li>
            `;
            } else if (id == 7) {
                title = "Ngôn từ gây thù ghét";
                content = `<li>Ngôn từ bạo lực hoặc xúc phạm nhân phẩm</li>
            <li>Lời lẽ hạ thấp, khinh miệt hoặc coi thường người khác</li>
            <li>Lời kêu gọi bài xích hoặc cô lập</li>
            `;
            } else if (id == 8) {
                title = "Bán hàng trái phép";
                content = `<li>Chất cấm, chất gây nghiện</li>
            <li>Vũ khí</li>
            <li>Động vật có nguy cơ tuyệt chủng</li>
            <li>Động vật khác</li>
            <li>Vấn đề khác</li>
            `;
            } else if (id == 9) {
                title = "Khủng bố";
                content = `Chúng tôi gỡ nội dung về mọi cá nhân hoặc nhóm phi chính phủ 
            tham gia hay ủng hộ các hành vi bạo lực có kế hoạch phục vụ 
            mục đích chính trị, tôn giáo hoặc lý tưởng.
            `;
            }

        $(".standards_community").show();
        $(".standards_community_body_title").text(title);
        $(".standards_community_body_violate").text(title2);
        $(".standards_community_ul").html(content);
    });

    $(".standards_community_back").click(function () {
        $(".standards_community").hide();
    });

    $(".ep_post_action1_deatail_save").click(function () {

        $(".popup_sucess").css({
            'display': 'block'
        });
        $(".popup_sucess_title").text("Lưu bài viết thành công");

    });

    $(".del_post_cancel").click(function () {
        $(".del_post").hide();
    });

    $(".btn_turnon_notify").click(function () {
        var id_post = $(this).attr('data-id');
        var btn = $(".ep_post_detail[data-new_id="+id_post+"] .click_notify_on");
        $.ajax({
            url: '../ajax/notify_on.php',
            type: 'POST',
            data: {id_post:id_post},
            success: function(data){
                if (data == "") {
                    alert("Bật thông báo bài viết thành công");
                    btn.after(`<div class="ep_post_action1_deatail click_notify_off">
                        <img src="/img/ep_post_turn_off_notify.svg" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Tắt thông báo</span>
                    </div>`);
                    btn.parents(".ep_post_action1").slideUp();
                    btn.remove();
                    $(".turnon_notify").hide();
                }else{
                    alert("Error");
                }
            }
        })
        
    });

    $(".ep_post_del_post").click(function () {
        $('.del_post').show();
    });

    $(".ep_post_hide").click(function () {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Ẩn bài viết thành công");
    });

    // $(".del_post_cancel_del").click(function () {
    //     $(".del_post").hide();
    //     $(".popup_sucess").show();
    //     $(".popup_sucess_title").text("Xóa bài viết thành công");
    // });

    $(".ep_post_who_cmt").click(function () {
        $(".who_cmt").show();
    });
    $(".sup_news_checkbox_detail").click(function () {
        if ($(this).find(".sup_news_checkbox_input").prop("checked") == true) {
            $(this).find(".sup_news_checkbox_input").prop("checked", false);
        } else {
            $(this).find(".sup_news_checkbox_input").prop("checked", true);
        }
    });

    $(".center_768_setting").click(function () {
        $(this).next().toggle();
    });

    $(".ep_show_cmt_action2_like").click(function () {
        var count = $(this).parents(".ep_show_cmt_action2").find(".number_count_like").text().trim();
        count = Number(count);
        if ($(this)[0].dataset.type == 0) {
            $(this).css({
                'color': '#4C5BD4'
            });
            $(this)[0].dataset.type = 1;
            count = count + 1;
            $(this).parents(".ep_show_cmt_action2").find(".number_count_like").text(count);
        } else if ($(this)[0].dataset.type == 1) {
            $(this).css({
                'color': '#474747'
            });
            $(this)[0].dataset.type = 0;
            count = count - 1;
            $(this).parents(".ep_show_cmt_action2").find(".number_count_like").text(count);
        }
    });
    $(document).click(function (e) {
        var container = $(".popup_post_new");
        if (container.is(e.target) && container.has(e.target).length === 0) {
            container.fadeOut();
        }

        var container1 = $(".ep_post_action1");
        var container2 = $(".ep_post_more");
        if (container1.is(e.target) == false && container1.has(e.target).length === 0 && container2.is(e.target) == false && container2.has(e.target).length === 0) {
            container1.slideUp();
        }

        var container1 = $(".ep_post_popup_share");
        var container2 = $(".ep_post_turnon_popup_share");
        var container3 = $(".center_nav_see_more_share");
        if (container1.is(e.target) == false && container1.has(e.target).length === 0 && container2.is(e.target) == false && container2.has(e.target).length === 0 && container3.is(e.target) == false && container3.has(e.target).length === 0) {
            container1.slideUp();
        }

        var container1 = $(".popup_action_cmt");
        var container2 = $(".ep_show_cmt_action");
        if (container1.is(e.target) == false && container1.has(e.target).length === 0 && container2.is(e.target) == false && container2.has(e.target).length === 0) {
            container1.hide();
        }

        if (e.target.className == "who_cmt") {
            $(".who_cmt").hide();
        }

        if (e.target.className == "object") {
            $(".object").hide();
        }

        if (e.target.className == "send_with_chat") {
            $(".send_with_chat").hide();
        }

        if (e.target.className == "standards_community") {
            $(".standards_community").hide();
        }

        if (e.target.className == "qttt_add_file" || $('.qttt_add_file').has(e.target).length > 0) {
            $(".upload_file_post_new2").click();
        }

        if($(e.target).hasClass("del_add_file")){
            // xóa file trong mảng
            if ($(e.target).hasClass("del_add_file_old")){
                var index = $(".del_add_file_old").index($(e.target));
                arr_old_file.splice(index, 1);                
                arr_old_file_name.splice(index, 1);                
            }else{
                var index = $(".del_add_file").not(".del_add_file_old").index($(e.target));
                arr_file.splice(index, 1);
            }

            var el = $(e.target).parents(".upload_file");
            $(e.target).parents(".add_upload_file_detail").remove();
            var length_file = el.find(".add_upload_file").find(".add_upload_file_detail").length;
            var length_img = el.find(".add_upload_img").find(".add_upload_img_deatail").length;
            if(length_file == 0 && length_img == 0){
                el.find(".qttt_add_file").remove();
                el.find(".add_upload_file").remove();
                el.find(".add_upload_img").remove();
                el.find(".upload_file_item").show();
                $(".close_upload_file").show();
                el.css({
                    'border': '1px solid #999999',
                    'border-radius' : '10px',
                });
            }
        }

        if($(e.target).hasClass("del_upload_img")){
            // xóa ảnh trong mảng
            if ($(e.target).hasClass("del_upload_img_old")){
                var index = $(".del_upload_img_old").index($(e.target));
                arr_old_img.splice(index, 1);
                arr_old_img_name.splice(index, 1);
            }else{
                var index = $(".del_upload_img").not(".del_upload_img_old").index($(e.target));
                arr_image_video.splice(index, 1);
            }

            var el = $(e.target).parents(".upload_file");
            $(e.target).parents(".add_upload_img_deatail").remove();
            var length_file = el.find(".add_upload_file").find(".add_upload_file_detail").length;
            var length_img = el.find(".add_upload_img").find(".add_upload_img_deatail").length;
            if(length_file == 0 && length_img == 0){
                el.find(".qttt_add_file").remove();
                el.find(".add_upload_file").remove();
                el.find(".add_upload_img").remove();
                el.find(".upload_file_item").show();
                $(".close_upload_file").show();
                el.css({
                    'border': '1px solid #999999',
                    'border-radius' : '10px',
                });
            }
            console.log(arr_image_video);
        }

        if($(e.target).hasClass("close_upload_file")) {
            $('.upload_file').hide();
            $(".add_new_post_icon_file").removeClass("add_new_post_icon_active");
            $(".add_new_post").css({
                'margin-top': '185px'
            });
            arr_image_video = [];
        }

        if (e.target.className == "except") {
            $(".except").hide();
            $(".popup_regime").attr("data-update",0);
        }

        if (e.target.className == "special") {
            $(".special").hide();
            $(".popup_regime").attr("data-update",0);
        }

        if (e.target.className == "except_detail_box_item_del") {
            var el = $(e.target);
            var id = el.data("id");
            var el_parent = el.parents(".except_detail_box").prev();
            for (var i = 0; i < el_parent.find(".except_info_user2").length; i++) {
                if (el_parent.find(".except_info_user2").eq(i).data("id") == id) {
                    el_parent.find(".except_info_user2").eq(i).find(".icon_except_circle").attr("fill", "#CCCCCC");
                    el_parent.find(".except_info_user2").eq(i).find(".except_checkbox").prop("checked", false);
                    break;
                }
            }
            el.parents(".except_detail_box_item").remove();
        }

        if (e.target.className == "except_detail_box_item_del2") {
            var el = $(e.target);
            var id = el.data("id");
            var el_parent = el.parents(".except_detail_box").prev();
            for (var i = 0; i < el_parent.find(".except_info_user").length; i++) {
                if (el_parent.find(".except_info_user").eq(i).data("id") == id) {
                    el_parent.find(".except_info_user").eq(i).find(".icon_except_circle").attr("fill", "#CCCCCC");
                    el_parent.find(".except_info_user").eq(i).find(".except_checkbox").prop("checked", false);
                    break;
                }
            }
            el.parents(".except_detail_box_item").remove();
            if ($(".except .except_detail_box_item").length <= 0){
                $(".except .except_save").prop("disabled",true);
            }else{
                $(".except .except_save").prop("disabled",false);
            }
        }
    });
    $(".standards_community_body_send").submit(function () {
        $(".standards_community").hide();
        $(".sup_news").hide();
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Bạn đã gửi báo cáo thành công");
        return false;
    });
    $(".turnoff_send_with_chat").click(function () {
        $(".send_with_chat").hide();
    });

    $(".ep_post_who_obj").click(function () {
        $(".object").show();
    });

    $(".memory_setting_cancel").click(function () {
        $(".who_cmt").click();
    });

    $(".turnoff_share_up_invidual").click(function () {
        $(".share_up_invidual").hide();
    });

    $(document).mouseup(function (e) {
        var container = $(".del_post_detail");
        if (container.is(e.target) == false && container.has(e.target).length === 0) {
            $(".del_post").hide();
        }
    });
    $(document).keydown(function (e) {
        var el = $(e.target);
        if (el.hasClass("ep_post_write_input") == true) {
            if (el.val().trim() != "") {
                el.next().find(".ep_post_write_action_deatail").hide();
                el.next().find(".ep_submit_mess").show();
            } else {
                el.next().find(".ep_post_write_action_deatail").show();
                el.next().find(".ep_submit_mess").hide();
            }
            if (e.keyCode == 13 && !e.shiftKey) {
                el.parents("form").submit();
                return false;
            }
        }
    });

    $(document).click(function (e) {
        var el = $(e.target);
        if (el.hasClass("ep_post_more") == true) {
            el.next().slideToggle();
        }

        if (el.hasClass("ep_show_cmt_action") == true) {
            el.next().toggle();
        }

        if (el.hasClass("ep_show_cmt_action2_btn_rep") == true) {
            el.parents(".ep_post_show_cmt_detail").find(".ep_form_repcmt").css({'display':'flex'}).find(".ep_post_write_input").focus();
        }

        if (e.target.className == "turnon_notify") {
            $(e.target).hide();
        }

        if (e.target.className == "sup_news") {
            $(e.target).hide();
        }

        if (el.hasClass("popup_regime") == true) {
            $(".popup_regime").hide();
            $(".popup_regime").attr("data-update",0);
        }

        if (el.hasClass("p_feel") == true) {
            $(".p_feel").hide();
        }

        if (el.hasClass("name_metion") == true) {
            $(".name_metion").hide();
        }

        if (el.hasClass("popup_location") == true) {
            $(".popup_location").fadeOut();
        }

        if (e.target.className == "share_up_invidual") {
            $(".share_up_invidual").hide();
        }

        if (e.target.className == "mention_detail_box_item_del") {
            var id = el.data("id");
            $(".name_mention_item[data-id="+ id +"]").click();
        }
    });

    $(".ep_post_action1_deatail_notify").click(function () {
        $(".turnon_notify").show();
    });

    $(".popup_success_btn").click(function () {
        $(".popup_sucess").hide();
    });

    $(".ep_post_turnon_sup,.popup_action_new_24h_item_sup_news").click(function () {
        $(".sup_news").show();
    });
    // $(".popup_regime_item").click(function () {
    //     $(this).find(".regime_radio").prop("checked", "true");
    // });
    $(".btn_upload_regime").click(function () {
        $(".popup_regime").data("fill",this);
        $(".popup_regime").attr("data-update",0);
        var view_mode = ($(this).attr("data-view_mode")>=0)?$(this).attr("data-view_mode"):0;
        $(".popup_regime [name=regime_select][value="+view_mode+"]").prop("checked",true);
        $(".special .except_detail_box_item_del").each(function(index,element){
            $(element).click();
        });
        $(".except .except_detail_box_item_del2").each(function(index,element){
            $(element).click();
        });
        $(".popup_regime .list_friends_except").each(function(index,element){
            $(element).html("");
        });
        $(".popup_regime .list_friends_expect").each(function(index,element){
            $(element).html("");
        });
        var except = $(this).attr("data-except");
        if (except != undefined && except != ""){
            except = except.split(',');
            if (except.length > 0){
                if (view_mode == 4){
                    for (let index = 0; index < except.length; index++) {
                        $(".special .except_info_user2[data-id="+except[index]+"]").click();
                    }
                    $(".special .except_save").click();
                }else if (view_mode == 3){
                    for (let index = 0; index < except.length; index++) {
                        $(".except .except_checkbox[value="+except[index]+"]:not(:checked)").click();
                    }
                    $(".except .except_save").click();
                }
            }
        }
        $(".popup_regime").show();
    });
    $(".turnoff_popup_regime,.popup_regime_cancel").click(function () {
        $(".popup_regime").hide();
    });
    $(".popup_regime_item1").click(function () {
        $(this).find(".regime_radio").prop("checked", "true");
        var new_id = $(".popup_regime").data("update");
        if (new_id > 0){
            var form_data = new FormData();
            var view_mode = $(this).find(".regime_radio").val();
            form_data.append('new_id', new_id);
            form_data.append('view_mode', view_mode);
            form_data.append('except', "");
            $.ajax({
                url: '/ajax/edit_update_work.php',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                },
                success: function (data) {
                    if (data.result == true){
                        $(".ep_post_detail[data-new_id="+new_id+"] .icon_regime").attr("src",$(".regime_radio[value="+view_mode+"]").prevAll().filter(".popup_regime_item_icon").find("img").attr("src"));
                        $(".ep_post_detail[data-new_id="+new_id+"] .icon_regime").attr("title",$(".regime_radio[value="+view_mode+"]").prevAll().filter(".popup_regime_item_detail").find(".popup_regime_item_text").html());
                        $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_action1_deatail_edit_object").attr("data-view_mode",view_mode);
                        $(".popup_regime").hide();
                        $(".popup_regime").attr("data-update",0);
                        alert("Chỉnh sửa thành công");
                    }
                }
            });
        }else{
            var elm = $(".popup_regime").data("fill");
            $(elm).attr("data-view_mode",$(this).find(".regime_radio").val());
            $(elm).attr("data-except","");
            $(elm).attr("data-jsonexcept","");
            $(this).parents('.popup_regime_list_item').find('.list_friends_expect, .list_friends_except').html('');
            var el = $(this);
            var img = el.find("img").attr("src");
            var regime = el.find(".popup_regime_item_text").text();
            if ($(elm).hasClass("ep_individual_regime_btn")){
                var html = `<img class="btn_upload_regime_img" src="` + img + `" alt="Ảnh lỗi">
                <span class="ep_individual_regime_span">` + regime + `</span>
                <img class="ls_dropdown_ep_index" src="/img/dropdown.svg" alt="Ảnh lỗi">`;
            }else{
                var html = `<img class="btn_upload_regime_img" src="` + img + `" alt="Ảnh lỗi">
                <span class="regime_txt">` + regime + `</span>
                <img class="ls_dropdown_ep_index" src="../img/ls_dropdown_ep_index.svg" alt="Ảnh lỗi">`;
            }
            $(elm).html(html);
            $(".popup_regime").hide();
        }
    });
    $(".except .except_save").click(function(){
        var elm = $(".popup_regime").data("fill");
        // set text @ popup chế độ xem 
        var list_friends_except = [];
        var k = $(".except .except_detail_box_item_name").length;
        if (k <= 0){
            $(".except .except_save").prop("disabled",true);
        }else if (k <= 2){
            $(".setting_private-card1").find(".regime_radio").prop("checked", "true");
            $(".except .except_detail_box_item_name").each(function(){
                list_friends_except.push($(this).html());
            });
            $(".list_friends_except").html(list_friends_except.join(", "));
        }else{
            $(".setting_private-card1").find(".regime_radio").prop("checked", "true");
            $(".list_friends_except").html($(".except .except_detail_box_item_name").eq(0).html() + ", " + $(".except .except_detail_box_item_name").eq(1).html() + " và " + (k-2) + " người khác");
        }
        var new_id = $(".popup_regime").attr("data-update");
        var view_mode = 3;
        var except = [],
            arr_excepts = [];
        $(".except .except_detail_box_item").each(function(){
            except.push($(this).attr("data-id"));
            arr_excepts.push({
                'id': $(this).attr('data-id'),
                'type': $(this).attr('data-type365'),
                'type_regime': 3
            });
        }); 
        except = except.join(",");  
        if (new_id > 0){
            var form_data = new FormData();
            form_data.append('new_id', new_id);
            form_data.append('view_mode', view_mode);
            form_data.append('except', except);
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: '/ajax/edit_update_work.php',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                },
                success: function (data) {
                    if (data.result == true){
                        $(".ep_post_detail[data-new_id="+new_id+"] .icon_regime").attr("src",$(".regime_radio[value="+view_mode+"]").prevAll().filter(".popup_regime_item_icon").find("img").attr("src"));
                        $(".ep_post_detail[data-new_id="+new_id+"] .icon_regime").attr("title",$(".regime_radio[value="+view_mode+"]").prevAll().filter(".popup_regime_item_detail").find(".popup_regime_item_text2").html());
                        $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_action1_deatail_edit_object").attr("data-view_mode",view_mode);
                        $(".popup_regime").hide();
                        $(".popup_regime").attr("data-update",0);
                        alert("Chỉnh sửa thành công");
                    }
                }
            });
        }
        if (k > 0){
            // set text @ popup đăng bài
            var el = $(".setting_private-card1");
            var img = el.find("img").attr("src");
            if ($(elm).hasClass("ep_individual_regime_btn")){
                var html = `<img class="btn_upload_regime_img" src="` + img + `" alt="Ảnh lỗi">
                <span class="ep_individual_regime_span">Bạn bè ngoại trừ ...</span>
                <img class="ls_dropdown_ep_index" src="/img/dropdown.svg" alt="Ảnh lỗi">`;
            }else{
                var html = `<img class="btn_upload_regime_img" src="` + img + `" alt="Ảnh lỗi">
                <span class="regime_txt">Bạn bè ngoại trừ ...</span>
                <img class="ls_dropdown_ep_index" src="../img/ls_dropdown_ep_index.svg" alt="Ảnh lỗi">`;
            }
            $($(".popup_regime").data("fill")).html(html);
            $(".except").hide();
            $(".popup_regime").attr("data-update",0);
        }
        $(elm).attr("data-view_mode",view_mode);
        $(elm).attr("data-except",except);
        $(elm).attr("data-jsonexcept",JSON.stringify(arr_excepts));
    });
    $(".special .except_save").click(function(){
        var elm = $(".popup_regime").data("fill");
        // set text @ popup chế độ xem 
        var list_friends_expect = [];
        var k = $(".special .except_detail_box_item_name").length;
        if (k <= 0){
            $(".special .except_save").prop("disabled",true);
        }else if (k <= 2){
            $(".setting_private-card2").find(".regime_radio").prop("checked", "true");
            $(".special .except_detail_box_item_name").each(function(){
                list_friends_expect.push($(this).html());
            });
            $(".list_friends_expect").html(list_friends_expect.join(", "));
        }else{
            $(".setting_private-card2").find(".regime_radio").prop("checked", "true");
            $(".list_friends_expect").html($(".special .except_detail_box_item_name").eq(0).html() + ", " + $(".special .except_detail_box_item_name").eq(1).html() + " và " + (k-2) + " người khác");
        }
        var new_id = $(".popup_regime").attr("data-update");
        var view_mode = 4;
        var except = [],
            arr_excepts = [];
        $(".special .except_detail_box_item").each(function(){
            except.push($(this).attr("data-id"));
            arr_excepts.push({
                'id': $(this).attr('data-id'),
                'type': $(this).attr('data-type365'),
                'type_regime': 4
            });
        });
        except = except.join(",");
        if (new_id > 0){
            var form_data = new FormData();
            form_data.append('new_id', new_id);
            form_data.append('view_mode', view_mode);
            form_data.append('except', except);
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            $.ajax({
                url: '/ajax/edit_update_work.php',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                },
                success: function (data) {
                    if (data.result == true){
                        $(".ep_post_detail[data-new_id="+new_id+"] .icon_regime").attr("src",$(".regime_radio[value="+view_mode+"]").prevAll().filter(".popup_regime_item_icon").find("img").attr("src"));
                        $(".ep_post_detail[data-new_id="+new_id+"] .icon_regime").attr("title",$(".regime_radio[value="+view_mode+"]").prevAll().filter(".popup_regime_item_detail").find(".popup_regime_item_text2").html());
                        $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_action1_deatail_edit_object").attr("data-view_mode",view_mode);
                        $(".popup_regime").hide();
                        $(".popup_regime").attr("data-update",0);
                        alert("Chỉnh sửa thành công");
                    }
                }
            });
        }
        if (k > 0){
            // set text @ popup đăng bài
            var el = $(".setting_private-card2");
            var img = el.find("img").attr("src");
            if ($(elm).hasClass("ep_individual_regime_btn")){
                var html = `<img class="btn_upload_regime_img" src="` + img + `" alt="Ảnh lỗi">
                <span class="ep_individual_regime_span">Bạn bè cụ thể</span>
                <img class="ls_dropdown_ep_index" src="/img/dropdown.svg" alt="Ảnh lỗi">`;
            }else{
                var html = `<img class="btn_upload_regime_img" src="` + img + `" alt="Ảnh lỗi">
                <span class="regime_txt">Bạn bè cụ thể</span>
                <img class="ls_dropdown_ep_index" src="../img/ls_dropdown_ep_index.svg" alt="Ảnh lỗi">`;
            }
            $($(".popup_regime").data("fill")).html(html);
            $(".special").hide();
            $(".popup_regime").attr("data-update",0);
        }
        var view_mode = 4;
        var except = [];
        $(".special .except_detail_box_item").each(function(){
            except.push($(this).attr("data-id"));
        });
        except = except.join(",");
        $(elm).attr("data-view_mode",view_mode);
        $(elm).attr("data-except",except);
        $(elm).attr("data-jsonexcept",JSON.stringify(arr_excepts));
    });
    $(".p_feel_search").keyup(function () {
        var keyword = $(this).val().trim();
        keyword = keyword.toLowerCase();
        for (let i = 0; i < $(".feel_item").length; i++) {
            var name_feel = $(".feel_item").eq(i).text().trim().toLowerCase();
            if (name_feel.includes(keyword) == true) {
                $(".feel_item").eq(i).show();
            } else {
                $(".feel_item").eq(i).hide();
            }
        }
        for (let i = 0; i < $(".activity_item").length; i++) {
            var name_feel = $(".activity_item").eq(i).text().trim().toLowerCase();
            if (name_feel.includes(keyword) == true) {
                $(".activity_item").eq(i).show();
            } else {
                $(".activity_item").eq(i).hide();
            }
        }
        if (keyword == "") {
            $(".feel_item").show();
            $(".activity_item").show();
        }
    });
    $(".feel_item").click(function () {
        $(".popup_post_new").show();
        $(".p_feel").hide();
        var el = $(this);
        // bỏ chọn hoạt động đã đk chọn
        $(".activity_item_active").removeClass("activity_item_active");
        if (el.hasClass("feel_item_active")){
            // bỏ chọn cảm xúc đã đk chọn
            $(".feel_item_active").removeClass("feel_item_active");
            // set text
            $(".popup_post_new .info_post_feel").html("");
            $(".add_new_post_icon_feel").css({
                'background': 'none'
            });
        }else{
            // bỏ chọn cảm xúc đã đk chọn
            $(".feel_item_active").removeClass("feel_item_active");
            // chọn cảm xúc đk click
            el.addClass("feel_item_active");
            $(".add_new_post_icon_feel").css({
                'background': '#EEEEEE'
            });
            // set text
            var icon = el.find(".feel_icon").attr('src');
            var feel = el.text();
            var html = `đang cảm thấy <img class="info_post_feel_icon" src="` + icon + `" alt="Ảnh lỗi"> ` + feel;
            $(".popup_post_new .info_post_feel").html(html);
        }
    });
    $(".add_new_post_icon_feel, .post_feel_footer_item_activity").click(function () {
        $(".p_feel").show();
    });
    $(".add_new_post_location").click(function () {
        $(".popup_location").show();
    });
    $(".activity_item").click(function () {
        $(".popup_post_new").show();
        $(".p_feel").hide();
        var el = $(this);
        // bỏ chọn cảm xúc đã đk chọn
        $(".feel_item_active").removeClass("feel_item_active");
        if (el.hasClass("activity_item_active")){
            // bỏ chọn hoạt động đã đk chọn
            $(".activity_item_active").removeClass("activity_item_active");
            // set text
            $(".info_post_feel").html("");
        }else{
            // bỏ chọn hoạt động đã đk chọn
            $(".activity_item_active").removeClass("activity_item_active");
            // chọn hoạt động đk click
            el.addClass("activity_item_active");
            // set text
            var icon = el.find(".feel_icon").attr('src');
            var feel = el.text();
            var html = `đang chúc mừng <img class="info_post_feel_icon" src="` + icon + `" alt="Ảnh lỗi"> ` + feel;
            $(".info_post_feel").html(html);
        }
    });

    $(".p_active_text").click(function () {
        $(".p_feel_text").css({
            'color': '#999999',
            'borderBottom': 'none'
        });
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });
        $(".feel_list_item").hide();
        $(".activity_list_item").css({
            'display': 'flex'
        });
    });
    $(".p_feel_text").click(function () {
        $(".p_active_text").css({
            'color': '#999999',
            'borderBottom': 'none'
        });
        $(this).css({
            'color': '#4C5BD4',
            'borderBottom': '2px solid #4C5BD4'
        });
        $(".feel_list_item").css({
            'display': 'flex'
        });
        $(".activity_list_item").hide();
    });
    $(".turnoff_popup_feel").click(function () {
        $(".p_feel").hide();
    });
    $(".post_feel_footer_item_name_metion").click(function () {
        $(".name_metion").show();
    });
    $(".name_mention_item").click(function () {
        var el = $(this).find(".name_mention_checkbox");
        var check = $(this).find(".name_mention_checkbox").prop("checked");
        if (check == false) {
            // chọn ô đk click
            el.prop("checked", true);
            $(this).css({
                'background': '#CCCCCC'
            });
            // tạo item đã pick
            var id = $(this).data("id");
            html = `<div class="mention_detail_box_item" data-id="`+id+`">
                <img class="mention_detail_box_item_avt" src="` + $(this).find(".name_metion_avt").attr("src") + `" alt="Ảnh lỗi">
                <p class="mention_detail_box_item_name">` + $(this).text() + `</p>
                <img class="mention_detail_box_item_del" src="../img/xoa_user.svg" alt="Ảnh lỗi" data-id="`+id+`">
            </div>`;
            // append vào box
            $(".mention_detail_box_list_item").append(html);
        } else {
            // bỏ chọn ô đk click
            el.prop("checked", false);
            $(this).css({
                'background': 'none'
            });
            // xóa khỏi box
            var id = $(this).data("id");
            $(".mention_detail_box_item[data-id="+ id +"]").remove();
        }
    });
    $(".at_location_item").click(function () {
        var el = $(this).find(".at_location_checkbox");
        var check = $(this).find(".at_location_checkbox").prop("checked");
        if (check == false) {
            // location chọn 1 nên p bỏ chọn hết các ô khác
            $(".at_location_checkbox").prop("checked", false);
            $(".at_location_item").css({
                'background': 'none'
            });
            // chọn ô đk click
            el.prop("checked", true);
            $(this).css({
                'background': '#CCCCCC'
            });
            // set text @ popup đăng bài viết
            $(".info_post_at").html(" tại <span class=name_mention_item_name2>" + $(this).text() + "</span>");
            // css icon location
            $(".add_new_post_location").css({
                'background': '#EEEEEE'
            });
        } else {
            el.prop("checked", false);
            $(this).css({
                'background': 'none'
            });
            // set text @ popup đăng bài viết
            $(".info_post_at").html("");
            // css icon location
            $(".add_new_post_location").css({
                'background': 'none'
            });
        }
    });
    $(".at_location_item").dblclick(function () {
        $(this).click();
        $(".popup_location").hide();
    });
    // $('.v_story2').slick({
    //     infinite: true,
    //     slidesToShow: 6,
    //     slidesToScroll: 6,
    //     variableWidth: false,
    //     nextArrow: '<button type="button" class="slick-next2"><img src="../img/chat_story_next.svg"></button>',
    //     responsive: [{
    //         breakpoint: 1600,
    //         settings: {
    //             slidesToScroll: 3,
    //             slidesToShow: 3
    //         }
    //     },
    //     {
    //         breakpoint: 1200,
    //         settings: {
    //             slidesToScroll: 2,
    //             slidesToShow: 2
    //         }
    //     },
    //     {
    //         breakpoint: 976,
    //         settings: {
    //             slidesToScroll: 1,
    //             slidesToShow: 1,
    //             centerMode: true
    //         }
    //     },
    //     {
    //         breakpoint: 720,
    //         settings: {
    //             slidesToScroll: 1,
    //             slidesToShow: 1,
    //         }
    //     }
    //     ]
    // });
    $(".name_mention_btn").click(function () {
        var k = 0;
        var name_mentioned = [];
        for (var i = 0; i < $(".name_mention_item").length; i++) {
            var check = $(".name_mention_item").eq(i).find(".name_mention_checkbox").prop('checked');
            if (check == true) {
                k++;
                name_mentioned.push("<span class='name_mention_item_name2'>" + $(".name_mention_item").eq(i).text().trim() + "</span>");
            }
        }

        if (k == 0) {
            $(".popup_post_new .info_post_with").html("");
            $(".add_new_post_mention").css({
                'background' : 'none'
            });
        } else if (k <= 2){
            $(".popup_post_new").show();
            $(".add_new_post_mention").css({
                'background' : '#EEEEEE'
            });
            var text = name_mentioned.join(', ');
            $(".popup_post_new .info_post_with").html("cùng với " + text);
        } else {
            $(".popup_post_new").show();
            $(".add_new_post_mention").css({
                'background' : '#EEEEEE'
            });
            var text = name_mentioned.join(', ');
            $(".popup_post_new .info_post_with").html("cùng với " + name_mentioned[0] + ", " + name_mentioned[1] + " và <span class='name_mention_item_name2'>" + (k-2) + " người khác</span>");
        }
        $(".name_metion").hide();
    });
    $(".add_new_post_mention").click(function () {
        $(".name_metion").show();
    });
    $(".turnoff_save_post").click(function () {
        $(".save_post").hide();
    });
    // $(".save_post_item").click(function () {
    //     $(this).find(".save_post_radio").prop("checked", true);
    // });

    var input_collection = '<div class="add_collection"><p class="collection_title">Tên bộ sưu tập</p><input class="collection_input" type="text" placeholder="Nhập tên" name="collection" onkeyup="collection_input(this)"></div>';

    $(document).on('click', '.add_save_post', function() {
        $(".save_post_div_add").hide();
        $(".div_bao_apppen_html").html(input_collection);
        $(".save_post_cancel").show();
        $(".save_success_tao").show();
        $(".save_success_xong").hide();
        $(".save_success").addClass("bg_ccc");
        $(".save_success").attr("disabled", true);
        $(".save_post_radio").attr("disabled", true);
        $(".save_post_radio").prop("checked", false);
    });

    $(document).on('click', '.save_post_cancel', function() {
        $(".save_post_div_add").show();
        $(".add_collection").hide();
        $(".save_post_cancel").hide();
        $(".save_success_tao").hide();
        $(".save_success_xong").show();
        $(".save_success").removeClass("bg_ccc");
        $(".save_success").attr("disabled", false);
        $(".save_post_radio").attr("disabled", false);
        $(".save_post_radio").prop("checked", true);
    });

    $(document).on('click', '.save_success_tao', function() {
        var name_collection = $("input[name=collection]").val();
        $.ajax({
            url: "../ajax/add_collection.php",
            type: "POST",
            data: {
                name_collection:name_collection,  
            },
            success: function(data){
                if(data != ""){
                    if(data != "False"){
                        $(".save_post_list_item").append(data);
                        $(".save_post_div_add").show();
                        $(".add_collection").hide();
                        $(".save_post_cancel").hide();
                        $(".save_success_tao").hide();
                        $(".save_success_xong").show();
                        $(".save_post_radio").attr("disabled", false);
                        // $(".save_post_radio").prop("checked", true);
                    }
                }
            }
        })
    })
    
    

    $(".turnoff_save_post").click(function () {
        $(".save_post").hide();
    });

    $(".ep_share_post").click(function () {
        $(".popup_sucess").show();
        $(".popup_sucess_title").text("Bạn đã chia sẻ bài viết thành công");
    });
    $(".ep_share_news").click(function () {
        $(".popup_post_new").show();
        $(".popup_post_new .post_share").remove();
        html = retun_html_post();
        $(".upload_file").after(html);
        $(".upload_file").hide();
        $(".center_nav_see_more").hide();
        $(".popup_post_new").find(".title_post_new").text("Chia sẻ lên bảng tin");
    });
    $(".ep_share_news_gr").click(function(){
        $(".popup_post_new").show();
        $(".add_new_post").css("margin-top", "0");
        $(".popup_post_new .post_share").remove();

        var group_avatar = $(".pick_src_avt_group").attr('src');
        var id_group = $(".pg_main_head_member_id").attr('data-id_group');
        var name_group = $(".pg_main_head_member_name").html();
        var group_mode = $(".pick_mode_group").html();
        var group_member_all = $(".pick_all_mem_group").html();


        html = `<div class="share_gr post_share" data-gr_id="`+id_group+`">
        <img class="share_gr_image" src="`+group_avatar+`" alt="Ảnh lỗi">
        <div class="share_gr_box">
          <p class="share_gr_box_name">`+name_group+`</p>
          <p class="share_gr_box_regime">`+group_mode+` `+group_member_all+` thành viên</p>
        </div>
        </div>`;
        $(".upload_file").after(html);
        $(".upload_file").hide();
        $(".center_nav_see_more").hide();
        $(".popup_post_new_gr").find(".title_post_new").text("Chia sẻ lên bảng tin");
    });

    $(".ep_send_with_chat_group").click(function () {
        $(".send_with_chat .post_share").remove();
        var group_avatar = $(".pick_src_avt_group").attr('src');
        var id_group = $(".pg_main_head_member_id").attr('data-id_group');
        var name_group = $(".pg_main_head_member_name").html();
        var group_mode = $(".pick_mode_group").html();
        var group_member_all = $(".pick_all_mem_group").html();
        html = `<div class="share_gr post_share" data-gr_id="`+id_group+`">
        <img class="share_gr_image" src="`+group_avatar+`" alt="Ảnh lỗi">
        <div class="share_gr_box">
          <p class="share_gr_box_name">`+name_group+`</p>
          <p class="share_gr_box_regime">`+group_mode+` `+group_member_all+` thành viên</p>
        </div>
        </div>`;
        $(".send_with_chat_body").prepend(html);
        $(".send_with_chat").attr("data-gr_id",$(this).data("gr_id"));
        $(".send_with_chat").attr("data-album_id",$(this).data("album_id"));
        $(".send_with_chat").attr("data-new_id",$(this).data("new_id"));
        $(".send_with_chat").attr("data-parents_id",$(this).data("parents_id"));
        $(".send_with_chat").attr("data-new_type",$(this).data("new_type"));
        $(".send_with_chat").show();
        $(".center_nav_see_more").hide();
    });

    $(document).on('click', '.ep_send_with_chat', function() { 
        $(".send_with_chat .post_share").remove();
        html = retun_html_post($(this).data("new_id"),$(this).data("parents_id"),$(this).data("new_type"),$(this).data("album_id"),$(this).data("gr_id"));
        $(".send_with_chat_body").prepend(html);
        $(".send_with_chat").attr("data-gr_id",$(this).data("gr_id"));
        $(".send_with_chat").attr("data-album_id",$(this).data("album_id"));
        $(".send_with_chat").attr("data-ep_id",$(this).data("ep_id"));
        $(".send_with_chat").attr("data-ep_type",$(this).data("ep_type"));
        $(".send_with_chat").attr("data-new_id",$(this).data("new_id"));
        $(".send_with_chat").attr("data-parents_id",$(this).data("parents_id"));
        $(".send_with_chat").attr("data-new_type",$(this).data("new_type"));
        $(".send_with_chat").attr("data-link",$(this).data("link"));
        $(".send_with_chat").show();
        $(".center_nav_see_more").hide();
    });




    $(".turnoff_share_up_group").click(function () {
        $(".share_up_group").hide();
        $(".center_nav_see_more").hide();
    });
    $(".share_up_group_avt").click(function () {
        $(".add_new_post").css({
            'margin-top': '0'
        });
        $(".add_new_post_icon_file").hide();
        $(".popup_post_new").show();
        $(".share_up_group").hide();
        html2 = `<img class="info_post_feel_drop_right" src="../img/ls_dropright.svg" alt="Ảnh lỗi"> <span class="info_post_feel_text">` + $(this).find(".friend_recently_item_name").html() + `</span>`;
        $(".info_post_username .info_post_feel").html(html2);
        $(".popup_post_new").show();
        $(".popup_post_new .post_share").remove();
        album_id = $(".share_up_group").attr("data-album_id");
        new_id = $(".share_up_group").attr("data-new_id");
        parents_id = $(".share_up_group").attr("data-parents_id");
        new_type = $(".share_up_group").attr("data-new_type");
        group_id = $(this).attr("data-group_id");
        group_type = $(this).attr("data-group_type");
        status_post = $(this).attr("data-group-status_post");
        html = retun_html_post(new_id,parents_id,new_type,album_id);
        $(".upload_file").after(html);
        $(".popup_post_new .post_share").attr("data-album_id",album_id);
        $(".popup_post_new .post_share").attr("data-new_id",new_id);
        $(".popup_post_new .post_share").attr("data-parents_id",parents_id);
        $(".popup_post_new .post_share").attr("data-group_id",group_id);
        $(".popup_post_new .post_share").attr("data-group_type",group_type);
        $(".popup_post_new .post_share").attr("data-group-status_post",status_post);
        $(".upload_file").hide();
    });
    $(".share_up_group_avt2").click(function () {
        $(".popup_post_new").show();
        $(".title_post_new").text("Chia sẻ lên nhóm");
        $(".share_up_group").hide();
        html2 = `<img class="info_post_feel_drop_right" src="../img/ls_dropright.svg" alt="Ảnh lỗi"> <span class="info_post_feel_text">Nhóm cuồng ABC</span>`;
        $(".info_post_username .popup_post_new").show();
        $(".info_post_feel").html(html2);
        $(".popup_post_new .post_share").remove();
        html = `<div class="share_gr">
        <img class="share_gr_image" src="../img/demo.jfif" alt="Ảnh lỗi">
        <div class="share_gr_box">
          <p class="share_gr_box_name">Nhóm ABC</p>
          <p class="share_gr_box_regime">Nhóm công khai . 200 thành viên</p>
        </div>
        </div>`;
        $(".upload_file").after(html);
        $(".upload_file").hide();
    });

    // $(".share_up_invidual_avt_group,.ep_share_news_gr").click(function(){

    // })

    $(document).on('click', ".share_up_invidual_avt,.share_my_wall", function() { 
        var ep_id = 0;
        var ep_type = 0;
        var new_id = 0;
        var parents_id = 0;
        var new_type = 0;
        var album_id = 0;
        var gr_id = 0;
        $(".share_up_invidual").hide();
        $(".add_new_post").css({
            'margin-top': '0'
        });
        $(".add_new_post_icon_file").hide();
        $(".popup_post_new .post_share").remove();
        if ($(this).data("ep_id") > 0){
            html2 = `<img class="info_post_feel_drop_right" src="../img/ls_dropright.svg" alt="Ảnh lỗi"> <span class="info_post_feel_text">` + $(this).find(".friend_recently_item_name").html() + `</span>`;
            $(".info_post_username .info_post_feel").html(html2);
            ep_id = $(this).data("ep_id");
            ep_type = $(this).data("ep_type");
            new_id = $(".share_up_invidual").attr("data-new_id");
            if ($(".share_up_invidual").data("gr_id") > 0){
                gr_id = $(".share_up_invidual").data("gr_id");
            }else if ($(".share_up_invidual").data("album_id") > 0){
                album_id = $(".share_up_invidual").data("album_id");
            }else{
                parents_id = $(".share_up_invidual").attr("data-parents_id");
                new_type = $(".share_up_invidual").attr("data-new_type");
            }
        }else{
            $(".info_post_username .info_post_feel").html("");
            new_id = $(this).data("new_id");
            if ($(this).data("gr_id") > 0){
                gr_id = $(this).data("gr_id");
            }else if ($(this).data("album_id") > 0){
                album_id = $(this).data("album_id");
            }else{
                parents_id = $(this).data("parents_id");
                new_type = $(this).data("new_type");
            }
        }
        if (gr_id > 0){
            $(".title_post_new").html("Chia sẻ nhóm");
        }else if (album_id > 0){
            $(".title_post_new").html("Chia sẻ album");
        }else if (new_id > 0){
            $(".title_post_new").html("Chia sẻ bài viết");
        }
        $(".popup_post_new").show();
        html = retun_html_post(new_id,parents_id,new_type,album_id,gr_id);
        $(".upload_file").after(html);
        $(".popup_post_new .post_share").attr("data-new_id",new_id);
        $(".popup_post_new .post_share").attr("data-parents_id",parents_id);
        $(".popup_post_new .post_share").attr("data-ep_id",ep_id);
        $(".popup_post_new .post_share").attr("data-ep_type",ep_type);
        $(".popup_post_new .post_share").attr("data-album_id",album_id);
        $(".popup_post_new .post_share").attr("data-gr_id",gr_id);
        $(".upload_file").hide();
    });
    $(".share_up_invidual_avt2").click(function () {
        $(".share_up_invidual").hide();
        html2 = `<img class="info_post_feel_drop_right" src="../img/ls_dropright.svg" alt="Ảnh lỗi"> <span class="info_post_feel_text">Nhóm cuồng ABC</span>`;
        $(".info_post_username .popup_post_new").show();
        $(".info_post_username .info_post_feel").html(html2);
        $(".popup_post_new .post_share").remove();
        html = `<div class="share_gr">
        <img class="share_gr_image" src="../img/demo.jfif" alt="Ảnh lỗi">
        <div class="share_gr_box">
          <p class="share_gr_box_name">Nhóm ABC</p>
          <p class="share_gr_box_regime">Nhóm công khai . 200 thành viên</p>
        </div>
        </div>`;
        $(".upload_file").after(html);
        $(".upload_file").hide();
    });
    $(document).on("click", ".ep_share_up_invidual", function() {
        $(".share_up_invidual").attr("data-gr_id",$(this).attr("data-gr_id"));
        $(".share_up_invidual").attr("data-album_id",$(this).attr("data-album_id"));
        $(".share_up_invidual").attr("data-new_id",$(this).attr("data-new_id"));
        $(".share_up_invidual").attr("data-new_type",$(this).attr("data-new_type"));
        $(".share_up_invidual").attr("data-parents_id",$(this).attr("data-parents_id"));
        $(".share_up_invidual").show();
        $(".center_nav_see_more").hide();
    });
    $(document).on("click", ".ep_share_up_group", function() {
        $(".share_up_group").attr("data-album_id",$(this).attr("data-album_id"));
        $(".share_up_group").attr("data-new_id",$(this).attr("data-new_id"));
        $(".share_up_group").attr("data-new_type",$(this).attr("data-new_type"));
        $(".share_up_group").attr("data-parents_id",$(this).attr("data-parents_id"));
        $(".share_up_group").show();
    });
    $(".ep_post_action_detail_like").click(function () {
        if ($(this)[0].dataset.type == 0) {
            $(this).find(".ep_post_action_detail_like_icon").attr("src", "../img/ep_post_liked.svg");
            $(this).find(".ep_post_like_text").css({
                'color': '#4C5BD4'
            });
            $(this)[0].dataset.type = 1;
        } else if ($(this)[0].dataset.type == 1) {
            $(this).find(".ep_post_action_detail_like_icon").attr("src", "../img/ep_post_active_like.svg");
            $(this).find(".ep_post_like_text").css({
                'color': '#666666'
            });
            $(this)[0].dataset.type = 0;
        }
    });
    $(".popup_action_cmt_detail_edit_comment").click(function () {
        var el = $(this).parents(".ep_post_detail");
        var parent = $(this).parents(".ep_show_cmt_content_detail");
        var cmt = parent.find(".ep_show_cnt_item").text().trim();
        el.find(".ep_post_write").find(".ep_post_write_input").val(cmt);
        el.find(".ep_post_write").find(".ep_post_write_action_deatail").hide();
        el.find(".ep_post_write").find(".ep_submit_mess").show();
    });
    $(".popup_action_cmt_detail_del").click(function () {
        var el = $(this).parents(".ep_post_show_cmt_detail");
        el.remove();
    });
    // $(".popup_action_cmt_detail_hide").click(function () {
    //     var el = $(this).parents(".ep_post_show_cmt_detail");
    //     if (el.find(".ep_show_cmt_content").find(".ep_show_cmt_content_detail").hasClass('opacity-0p15')){
    //         $(this).html(`<img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi"> Ẩn bình luận`);
    //     }else{
    //         $(this).html(`<img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi"> Hiện bình luận`);
    //     }
    //     el.find(".ep_show_cmt_content").find(".ep_show_cmt_content_detail").toggleClass('opacity-0p15');
    //     el.find(".ep_show_cmt_avt").toggleClass('opacity-0p15');
    // });
    $(".ep_show_cmt_action2_btn_hide").click(function () {
        var el = $(this).parents(".ep_post_show_cmt_detail");
        el.find(".ep_show_cmt_action2_btn_like").show();
        el.find(".ep_show_cmt_action2_btn_rep").show();
        el.find(".ep_show_cmt_action2_btn_hide").hide();
        el.find(".ep_show_cmt_content").find(".ep_show_cmt_content_detail").css({
            'opacity': '1'
        });
        el.find(".ep_show_cmt_avt").css({
            'opacity': '1'
        })
    });
    $(".popup_action_repcmt_detail_edit").click(function () {
        var parent = $(this).parents(".ep_show_repcmt_detail");
        var el = $(this).parents(".ep_show_repcmt");
        var cmt = parent.find(".ep_show_cnt_item").text().trim();
        el.find(".ep_post_write_repcmt").show();
        el.find(".ep_post_write_repcmt").find(".ep_post_write_input").val(cmt);
        el.find(".ep_post_write_repcmt").find(".ep_post_write_input").focus();
        el.find(".ep_post_write_repcmt").find(".ep_post_write_action_deatail").hide();
        el.find(".ep_post_write_repcmt").find(".ep_submit_mess").show();
    });
    $(".popup_action_repcmt_detail_delete").click(function () {
        $(this).parents(".ep_show_repcmt_detail").remove();
    });
    $(".popup_action_repcmt_detail_hide").click(function () {
        el = $(this).parents(".ep_show_repcmt_detail");
        el.find(".ep_show_cmt_avt").css({
            'opacity': '0.15'
        });
        el.find(".ep_show_cmt_content_detail").css({
            'opacity': '0.15'
        });
        el.find(".ep_show_cmt_action2_hide").show();
        el.find(".ep_show_cmt_action2_like").hide();
        el.find(".popup_action_cmt").hide();
    });
    $(".ep_show_cmt_action2_hide").click(function () {
        el = $(this).parents(".ep_show_repcmt_detail");
        el.find(".ep_show_cmt_avt").css({
            'opacity': '1'
        });
        el.find(".ep_show_cmt_content_detail").css({
            'opacity': '1'
        });
        el.find(".ep_show_cmt_action2_hide").hide();
        el.find(".ep_show_cmt_action2_like").show();
    });
    $(document).click(function (e) {
        if (e.target.className == "save_post") {
            $(".save_post").hide();
        }

        if (e.target.className == "share_up_group") {
            $(".share_up_group").hide();
        }
    });
    $("#container-header-left-btn").click(function(){
        $(".container-header-left-dropdown").toggle();
    });
    // đăng bài viết
    $(".form_popup_post_new").submit(function(){
        var el = $(this);
        if (el.data("update") > 0){
            var new_id = el.data("update");
            var form_data = new FormData();
            form_data.append('new_id', new_id);

            // var content = $.trim($(this).find('.form_post_new_content').html());
            var content = $.trim($(this).find('.form_post_new_content').val());
            form_data.append("content", content);

            // file cũ
            form_data.append("arr_post_image", arr_old_img);
            form_data.append("arr_post_file", arr_old_file);
            // tên file cũ
            form_data.append("arr_post_name_image", arr_old_img_name);
            form_data.append("arr_post_name_file", arr_old_file_name);
            // gắn tag
            var arr_mention = $.map($("[name=name_mention_checkbox]:checked"), function(c){return c.value; });
            form_data.append('id_user_tag', arr_mention);
            // mảng ds những user đc tags
            var arr_tags = [];
            $.map($("[name=name_mention_checkbox]:checked"), function(c){
                arr_tags.push({
                    'id': $(c).val(),
                    'type': $(c).attr('data-type365')
                }); 
            });
            form_data.append('arr_tags', JSON.stringify(arr_tags));
            // cảm xúc / hoạt động
            if ($(".feel_item.feel_item_active").length > 0){
                form_data.append('feel', $(".feel_item.feel_item_active").data("feel"));
            }else if ($(".activity_item.activity_item_active").length > 0){
                form_data.append('activity', $(".activity_item.activity_item_active").data("activity"));
            }
            // vị trí
            form_data.append('district', $(".at_location_checkbox:checked").data("qh"));
            form_data.append('city', $(".at_location_checkbox:checked").data("cit"));
            form_data.append('location', $(".at_location_checkbox:checked").parents(".at_location_item").text().trim());

            if (typeof (arr_image_video) !== 'undefined') {
                for (var i = 0; i < arr_image_video.length; i++) {
                    form_data.append('image[]', arr_image_video[i]);
                }
            }

            if (typeof (arr_file) !== 'undefined') {
                for (var i = 0; i < arr_file.length; i++) {
                    form_data.append('file[]', arr_file[i]);
                }
            }

            if (content != "" || arr_old_file.length > 0 || arr_old_file.length > 0 || typeof (arr_image_video) !== 'undefined' || typeof (arr_file) !== 'undefined') {
                content = content.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                $.ajax({
                    url: '../ajax/edit_update_work.php',
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $(".post_new_btn_submit").prop("disabled",true).html("Đang đăng");
                    },
                    success: function (data) { 
                        // chỉnh sửa page đã gỡ - nội dung của bạn
                        if ($('.my_removed_content').length) {
                            $(".post_new_btn_submit").prop("disabled",false).html("Đăng");
                            resetFormPost();
                            if (data.approve == 1) {
                                alert("Chỉnh sửa bài viết thành công. Vui lòng chờ quản trị viên duyệt nội dung chỉnh sửa.");
                            } else {
                                alert("Chỉnh sửa bài viết thành công");
                            } 
                            $(".posts_are_waiting_padding[data-new="+new_id+"]").remove();
                            $(".popup_post_new").hide();
                        }
                        // chỉnh sửa ở page bài lên lịch hoặc page đang chờ - nội dung của bạn
                        else if (data.show_time || (data.approve == 1 && $('.my_pending_content').length)) {
                            $(".posts_are_waiting_padding[data-new="+new_id+"] .content_limit.elipsis2").html(content);
                            if ($(".posts_are_waiting_padding[data-new="+new_id+"] .post_share").length <= 0){
                                $(".posts_are_waiting_padding[data-new="+new_id+"] .ep_post_file_div").html(data.file_html);
                                $(".posts_are_waiting_padding[data-new="+new_id+"] .ep_post_file_img .content_img_post").html(data.imgv_html);
                            }
                            $(".popup_post_new").hide();
                            alert("Chỉnh sửa bài viết thành công");
                            render.see_more_content_post();
                        } 
                        else {
                            // chỉnh sửa và phải chờ duyệt
                            if (data.approve == 1){
                                $(".popup_post_new").hide();
                                $(".post_new_btn_submit").prop("disabled",false).html("Đăng");
                                resetFormPost();
                                alert("Chỉnh sửa bài viết thành công. Vui lòng chờ quản trị viên duyệt nội dung chỉnh sửa.");
                                render.see_more_content_post();
                                $(".ep_post_detail[data-new_id="+new_id+"]").remove();
                            }
                            // chỉnh sửa và đc append bình thường
                            else{
                                $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_content").html(content);
                                $(".ep_post_detail[data-new_id="+new_id+"] .info_post_type").remove();
                                $(".ep_post_detail[data-new_id="+new_id+"] .info_post_feel").remove();
                                $(".ep_post_detail[data-new_id="+new_id+"] .info_post_with").remove();
                                $(".ep_post_detail[data-new_id="+new_id+"] .info_post_at").remove();
                                if ($(".popup_post_new .info_post_feel").length > 0 && $(".popup_post_new .info_post_feel").html() != ""){
                                    $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_author_name").append(`<span class="info_post_feel">`+$(".popup_post_new .info_post_feel").html()+`</span>`);
                                }else{
                                    if ($(".ep_post_detail[data-new_id="+new_id+"] .post_share").length > 0){
                                        $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_author_name").append(`<span class="info_post_type">đã chia sẻ 1 bài viết </span>`);
                                    }else{
                                        $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_author_name").append(`<span class="info_post_type">đã thêm 1 bài viết mới </span>`);
                                    }
                                }
                                if ($(".popup_post_new .info_post_with").length > 0 && $(".popup_post_new .info_post_with").html() != ""){
                                    $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_author_name").append(`<span class="info_post_with">`+$(".popup_post_new .info_post_with").html()+`</span>`);
                                }
                                if ($(".popup_post_new .info_post_at").length > 0 && $(".popup_post_new .info_post_at").html() != ""){
                                    $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_author_name").append(`<span class="info_post_at">`+$(".popup_post_new .info_post_at").html()+`</span>`);
                                }
    
                                if ($(".ep_post_detail[data-new_id="+new_id+"] .post_share").length <= 0){
                                    $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_file_div").html(data.file_html);
                                    $(".ep_post_detail[data-new_id="+new_id+"] .ep_post_file_img .content_img_post").html(data.imgv_html);
                                }
                                $(".popup_post_new").hide();
                                $(".post_new_btn_submit").prop("disabled",false).html("Đăng");
                                resetFormPost();
                                alert("Chỉnh sửa bài viết thành công");
                                render.see_more_content_post();
                            }
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        console.log(thrownError);
                        $(".post_new_btn_submit").prop("disabled",false).html("Đăng");
                    }
                });
            }
        }else{
            // var content = $.trim($(this).find('.form_post_new_content').html());
            var content = $.trim($(this).find('.form_post_new_content').val());
            var form_data = new FormData();
            // content
            form_data.append('content', content);
            if ($(".post_calendar.click_show_post_calendar").length > 0){
                var date = $(".post_calendar.click_show_post_calendar").data("date");
                var time = $(".post_calendar.click_show_post_calendar").data("time");
                console.log(date);
                form_data.append('show_time', date + " " + time);
            }
            if ($(this).find(".post_share").length > 0 && ($(this).find(".post_share").attr("data-new_id") > 0 || $(this).find(".post_share").attr("data-album_id") > 0 || $(this).find(".post_share").attr("data-gr_id") > 0)){
                form_data.append('gr_id', $(this).find(".post_share").attr("data-gr_id"));
                form_data.append('album_id', $(this).find(".post_share").attr("data-album_id"));
                form_data.append('new_id_parents', $(this).find(".post_share").attr("data-new_id"));
                form_data.append('new_id_share_content', $(this).find(".post_share").attr("data-parents_id"));
                form_data.append('ep_id_share_to', $(this).find(".post_share").attr("data-ep_id"));
                form_data.append('ep_type_share_to', $(this).find(".post_share").attr("data-ep_type"));
                form_data.append('group_id_share_to', $(this).find(".post_share").attr("data-group_id"));
                form_data.append('group_type', $(this).find(".post_share").attr("data-group_type"));
                // form_data.append('gr_status_post', $(this).find(".post_share").attr("data-group-status_post"));
            }else{
                // nếu đăng bài trên nhóm
                if ($(".pg_main_head_member.pg_main_head_member_id").length > 0){
                    form_data.append('group_id', $(".pg_main_head_member.pg_main_head_member_id").attr("data-id_group"));
                    form_data.append('group_type', 1);
                    // form_data.append('gr_status_post', $(".main_content_left_box1_sub2_nav.click_taianh").attr("data-group-status_post"));
                }
                // nếu đăng bài trên trang cá nhân người khác
                if ($(this).attr("data-ep_id") > 0){
                    // form_data.append('ep_id_share_to', $(this).attr("data-ep_id"));
                    form_data.append('ep_id', $(this).attr("data-ep_id"));
                    form_data.append('ep_type', $(this).attr("data-ep_type"));
                }
                // ảnh / video
                if (arr_image_video.length > 0) {
                    for (let i = 0; i < arr_image_video.length; i++) {
                        form_data.append('image_video[]', arr_image_video[i]);
                    }
                }
                // file
                if (arr_file.length > 0) {
                    for (let i = 0; i < arr_file.length; i++) {
                        form_data.append('file[]', arr_file[i]);
                    }
                }
            }
            el.find('.model_center_post_newfeed_btn_custom').prop('type', 'button');
            el.find('.update_work_span2').hide();
            el.find('.update_work_loading2').show();
            // gắn tag
            var arr_mention = $.map($("[name=name_mention_checkbox]:checked"), function(c){return c.value; });
            form_data.append('id_user_tag', arr_mention);
            // mảng ds những user đc tags
            var arr_tags = [];
            $.map($("[name=name_mention_checkbox]:checked"), function(c){
                arr_tags.push({
                    'id': $(c).val(),
                    'type': $(c).attr('data-type365')
                }); 
            });
            form_data.append('arr_tags', JSON.stringify(arr_tags));
            // chế độ xem
            var regime_select = $("[name=regime_select]:checked").val(),
                arr_excepts = [];
            form_data.append('regime_select', regime_select);
            if (regime_select == 4){
                $.map($(".special .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 4
                    }); 
                });
                form_data.append('except', $.map($(".special .except_checkbox:checked"), function(c){return c.value; }));
            }else if (regime_select == 3){
                $.map($(".except .except_checkbox:checked"), function(c){
                    arr_excepts.push({
                        'id': $(c).val(),
                        'type': $(c).attr('data-type365'),
                        'type_regime': 3
                    }); 
                });
                form_data.append('except', $.map($(".except .except_checkbox:checked"), function(c){return c.value; }));
            }
            form_data.append('arr_excepts', JSON.stringify(arr_excepts));
            // cảm xúc hoạt động
            if ($(".feel_item.feel_item_active").length > 0){
                form_data.append('feel', $(".feel_item.feel_item_active").data("feel"));
            }else if ($(".activity_item.activity_item_active").length > 0){
                form_data.append('activity', $(".activity_item.activity_item_active").data("activity"));
            }
            // vị trí
            form_data.append('district', $(".at_location_checkbox:checked").data("qh"));
            form_data.append('city', $(".at_location_checkbox:checked").data("cit"));
            form_data.append('location', $(".at_location_checkbox:checked").parents(".at_location_item").text());
    
            $.ajax({
                type: "POST",
                url: "../ajax/update_work.php",
                data: form_data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(".post_new_btn_submit").prop("disabled",true).html("Đang đăng");
                },
                success: function (data) {
                    if (data.result == false) {
                        alert(data.msg);
                    }else{
                        // location.reload();
                    }
                },
                complete: function(data){
                    $(".post_new_btn_submit").prop("disabled",false).html("Đăng");
                    resetFormPost();
                    $(".popup_post_new").hide();
                    render.see_more_content_post();
                },
                error: function (data) {
                    if (data.status == 200){
                        if ($(".lst_posts_index").length > 0){
                            $(".lst_posts_index").prepend(data.responseText);
                            if ($(".popup_post_new .post_share").length > 0){
                                alert("Chia sẻ bài viết thành công");
                            }else{
                                alert("Đăng bài viết thành công");
                            }
                        }else if ($(".lst_posts_profile").length > 0){
                            if ($(".popup_post_new .post_share").length > 0){
                                alert("Chia sẻ bài viết thành công");
                            }else{
                                $(".lst_posts_profile").prepend(data.responseText);
                                alert("Đăng bài viết thành công");
                            }
                        }else if ($(".lst_news_detail_gr").length > 0){
                            if ($(".popup_post_new .post_share").length > 0){
                                alert("Chia sẻ bài viết thành công");
                            }else{
                                $(".lst_news_detail_gr").prepend(data.responseText);
                                alert("Đăng bài viết thành công");
                            }
                        }
                        render.see_more_content_post();
                    }else{
                        alert("Có lỗi xảy ra");
                    }
                }
            });
        }
        return false;
    });
    $(document).click(function(e) {
        var container = $(".container-header-left-dropdown");
        var container2 = $("#container-header-left-btn");
        if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
            container.hide();
        }
    });
    $(".open-container-header-mid , .container-header-mid-back").click(function(){
        $(".baiviet-search").toggleClass("mobile_search");
        $(".container-header-left").toggleClass("mobile_search");
        $(".container_phai").toggleClass("mobile_search");
    });
    // popup chi tiết sự kiện
    $('.view_detail_event').click(function() {
        var id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        if (type == 3) {
            $(".vd7_xemchitiet_sk").show();
        } else {
            $(".vd9_xemchitiet_dn").show();
        }
    
        if (id != '') {
            var data = new FormData();
            data.append('id', id);
            $.ajax({
                url: "../ajax/detail_event.php",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                data: data,
                success: function(responsive) {
                    if (type == 3) {
                        if (responsive.result == true) {
                            $('.member_event,.list_ep,.question_popup,.title_event').html('');
                            $('.title_event').html(responsive.data.new_title + `<img class="xemchitiet-dn img_detail_event_noibo" onclick="xemchitiet_dn(` + id + `,3);" src="../img/skgiaoluu.png" alt="">`);
                            $('.content_event').html(responsive.data.content);
                            $('.form_create_question,.fndskl').attr('data-id', responsive.data.id);
                            $('.location').html(responsive.data.vi_tri_dang);
                            for (var i = 0; i < responsive.data.arr_ep.length; i++) {
                                $('.member_event').append(
                                    `<div class="img-thanhvien">
                                <div class="show-hide">
                                <img class="v_del_member_event" src="../img/v_del.svg" alt="Ảnh lỗi" data-pos="` + i + `" data-id="` + responsive.data.arr_ep[i].id_event_join + `" onclick="v_del_member_event(this)">
                                <img class="img_thu imgsk_tvtg" src="` + responsive.data.arr_ep[i].avatar + `" alt="Ảnh lỗi">
                                </div>
                                <div class="tetx-thanh-vien">
                                <p class="text-tv1">` + responsive.data.arr_ep[i].name + `</p>
                                <p class="text-tv2">` + responsive.data.arr_ep[i].position + `</p>
                                <p class="text-tv3">` + responsive.data.arr_ep[i].id + `</p>
                                </div>
                                </div>`
                                );
                            }
                            for (let i = 0; i < responsive.data.list_ep.length; i++) {
                                $('.list_ep').append(`
                            <option value=` + responsive.data.list_ep[i].ep_id + `>` + responsive.data.list_ep[i].ep_name + `</option>
                            `);
                            }
                            for (var i = 0; i < responsive.data.question.length; i++) {
                                $('.question_popup').append(`<div class="img-cauhoi-sk">
                            <div class="imgcauhoi show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.data.question[i].avatar + `" alt=""></div>
                            <div class="text-cauhoi-sk">
                                <div class="text-cauhoi-sk-tren">
                                    <p class="text-ch1">` + responsive.data.question[i].name + `&ensp;<span class="text2">` + responsive.data.question[i].position + `</span>
                                    </p>
                                    <p class="text-ch3">` + responsive.data.question[i].content + `</p>
                                </div>
                                <p class="text-ch4">` + responsive.data.question[i].time + `</p>
                            </div>
                        </div>`);
                            }
                        }
                    } else {
                        if (responsive.result == true) {
                            $('.member_event_dn,.list_ep_dn,.question_popup').html('');
                            $('.title_dn').html(responsive.data.new_title + `<img class="xemchitiet-dn img_detail_event_noibo" onclick="xemchitiet_dn(` + id + `,4);" src="../img/skgiaoluu.png" alt="">`);
                            $('.content_dn').html(responsive.data.content);
                            var quyen = 'Quyền riêng tư';
                            if (responsive.data.event_mode == 1) {
                                quyen = 'Công khai';
                            }
                            $('.event_mode_dn').html(quyen);
                            $('.ten_dg').html(responsive.data.speakers_name);
                            $('.chuc_vu_dg').html(responsive.data.speakers_position);
                            $('.sdt_dg').html(responsive.data.speakers_phone);
                            $('.email_dg').html(responsive.data.speakers_email);
                            var image = '/img/new_feed/event/event_doi_ngoai/speakers_avatar/' + responsive.data.avatar_dien_gia;
                            $('.image_dg').attr('src', responsive.data.avatar_dien_gia);
                            $('.form_create_question,.csgl_giamdoc').attr('data-id', responsive.data.id);
                            $('.location_dn').html(responsive.data.vi_tri_dang);
                            $('.list_table-dn').find('.tr_dn').remove();
                            for (var i = 0; i < responsive.data.list_guests.length; i++) {
                                $('.list_table-dn').append(
                                    `<tr class="tr_dn">
                                        <td>` + (i + 1) + `</td>
                                        <td>` + responsive.data.list_guests[i].name_guest + `</td>
                                        <td>` + responsive.data.list_guests[i].name_company + `</td>
                                        <td>` + responsive.data.list_guests[i].name_position + `</td>
                                    </tr>`
                                );
                            }
    
                            for (var i = 0; i < responsive.data.arr_ep.length; i++) {
                                $('.member_event_dn').append(
                                    `<div class="img-thanhvien">
                                <div class="show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.data.arr_ep[i].avatar + `" alt=""></div>
                                <div class="tetx-thanh-vien">
                                <p class="text-tv1">` + responsive.data.arr_ep[i].name + `</p>
                                <p class="text-tv2">` + responsive.data.arr_ep[i].position + `</p>
                                <p class="text-tv3">` + responsive.data.arr_ep[i].id + `</p>
                                </div>
                                </div>`
                                );
                            }
    
                            for (let i = 0; i < responsive.data.list_ep.length; i++) {
                                $('.list_ep_dn').append(`
                            <option value=` + responsive.data.list_ep[i].ep_id + `>` + responsive.data.list_ep[i].ep_name + `</option>
                            `);
                            }
                            for (var i = 0; i < responsive.data.question.length; i++) {
                                $('.question_popup').append(`<div class="img-cauhoi-sk">
                            <div class="imgcauhoi show-hide"><img class="img_thu imgsk_tvtg" src="` + responsive.data.question[i].avatar + `" alt=""></div>
                            <div class="text-cauhoi-sk">
                                <div class="text-cauhoi-sk-tren">
                                    <p class="text-ch1">` + responsive.data.question[i].name + `&ensp;<span class="text2">` + responsive.data.question[i].position + `</span>
                                    </p>
                                    <p class="text-ch3">` + responsive.data.question[i].content + `</p>
                                </div>
                                <p class="text-ch4">` + responsive.data.question[i].time + `</p>
                                    </div>
                                </div>`);
                            }
                        }
                    }
                }
            });
        }
    });
    // popup sửa bài viết
    $(document).on('click', '.ep_post_action1_deatail_edit', function() { 
        var new_id = $(this).data("new_id");
        var element = $(this);
        var new_type = $(this).data("new_type");
        $(".popup_post_new_gr").find(".title_post_new").text("Chỉnh sửa bài viết");
        $(".popup_post_new .post_calendar").hide();
        $(".popup_post_new .add_new_post_icon_file").show();
        if (new_type == 0) {
            $.ajax({
                url: '../ajax/detail_newfeed.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: new_id
                },
                success: function (data) {
                    $(".popup_post_new").show();
                    $(".popup_post_new").find(".title_post_new").text("Chỉnh sửa bài viết");
                    $(".popup_post_new .post_share").remove();
                    $(".form_popup_post_new").data("update",new_id);
                    // content
                    $(".popup_post_new .form_post_new_content").val(data.data.content);
                    // view_mode
                    var icon = "../img/gis_earth-australia-o(2).svg";
                    if (data.data.view_mode == 1){
                        icon = "../img/bx_bxs-lock-alt2.svg";
                    }else if (data.data.view_mode == 2){
                        icon = "../img/group(1)1.svg";
                    }else if (data.data.view_mode == 3){
                        icon = "../img/group(1)2.svg";
                    }else if (data.data.view_mode == 4){
                        icon = "../img/group(1)3.svg";
                    }
                    $(".popup_post_new .ep_post_time").html(data.data.created_at+`<img class="div_width_hight_icon icon_regime" src="` + icon + `" alt="Ảnh lỗi">`).show();
                    $(".popup_post_new .btn_upload_regime").hide();
                    // file / ảnh / video
                    // reset file cũ
                    arr_old_file = [];
                    arr_old_file_name = [];
                    arr_old_img = [];
                    arr_old_img_name = [];
                    // reset file mới
                    arr_image_video = [];
                    arr_file = [];
                    
                    $(".upload_file").find(".qttt_add_file").remove();
                    $(".upload_file").find(".add_upload_file").remove();
                    $(".upload_file").find(".add_upload_img").remove();
                    $(".upload_file").find(".upload_file_item").show();
                    $(".close_upload_file").show();
                    $(".upload_file").css({
                        'border': '1px solid #999999',
                        'border-radius' : '10px',
                    });
                    $(".close_upload_file").click();
                    // đổ dl file
                    if (data.data.parents_id > 0){
                        $(".popup_post_new .post_share").remove();
                        $(".add_new_post").css({
                            'margin-top': '0'
                        });
                        $(".popup_post_new .add_new_post_icon_file").hide();
                        if (!element.hasClass('show_post_schedule')) {
                            var post_share = element.parents(".ep_post_detail").find(".post_share").html();
                        } else {
                            var post_share = element.parents(".posts_are_waiting_padding").find(".post_share").html();
                        }
                        $(".upload_file").after(`<div class="post_share">`+post_share+`</div>`);
                    }else if (data.data.album_id > 0){
                        $(".popup_post_new .post_share").remove();
                        $(".add_new_post").css({
                            'margin-top': '0'
                        });
                        $(".popup_post_new .add_new_post_icon_file").hide();
                        var post_share = element.parents(".ep_post_detail").find(".post_share").html();
                        $(".upload_file").after(`<div class="post_share">`+post_share+`</div>`);
                    }else if (data.data.file != ""){
                        var html = `<button class="qttt_add_file" type="button">
                                <img src="../img/qttt_add_file.svg" alt="qttt_add_file.svg"> Thêm tệp/ảnh/video
                            </button>`;

                        var file = data.data.file.split("||");
                        var name_file = data.data.name_file.split("||");
                        var html_img = '', html_file = '';

                        for (var i = 0; i < file.length; i++) {
                            if (file[i] != ''){
                                if (file[i].match("/image/") != null || file[i].match("/video/") != null) {
                                    arr_old_img.push(file[i]);
                                    arr_old_img_name.push(name_file[i]);
                                    if (file[i].match("/image/") != null) {
                                        html_img += `<div class="add_upload_img_deatail">
                                            <img class="del_upload_img del_upload_img_old" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                                            <img class="add_upload_img_detail_item" src="` + file[i] + `">
                                        </div>`;
                                    }else if (file[i].match("/video/") != null) {
                                        html_img += `<div class="add_upload_img_deatail">
                                            <img class="del_upload_img del_upload_img_old" src="../img/del_upload_file.svg" alt="Ảnh lỗi">
                                            <video class="add_upload_img_detail_item" controls="">
                                                <source src="` + file[i] + `">
                                            </video>
                                        </div>`;
                                    }
                                } else {
                                    arr_old_file.push(file[i]);
                                    arr_old_file_name.push(name_file[i]);
                                    var size = data.data.filesize[i];
                                    if (size / 1024 <= 1000) {
                                        var text_size = (size / 1024).toFixed(1) + " KB";
                                    } else {
                                        var text_size = (size / 1024).toFixed(1) + " MB";
                                    }
                                    html_file += `<div class="add_upload_file_detail">
                                        <p class="add_upload_file_name">` + name_file[i] + `</p>
                                        <p class="add_upload_file_time">` + text_size + ` ` + data.data.created_at + `</p>
                                        <img class="del_add_file del_add_file_old" src="../img/del_add_filesvg.svg" alt="Ảnh lỗi">
                                    </div>`;
                                }
                            }
                        }

                        html += `<div class="add_upload_file">` + html_file + `</div>`;
                        html += `<div class="add_upload_img">` + html_img + `</div>`;
                        $(".popup_post_new .add_new_post_icon_file").addClass("add_new_post_icon_active");
                        $(".popup_post_new .add_new_post").css({
                            'margin-top': '0px'
                        });
                        $(".popup_post_new .upload_file").css({
                            'border': 'none',
                            'border-radius' : '0'
                        });
                        $(".upload_file_item").hide();
                        $(".close_upload_file").hide();
                        $(".popup_post_new .upload_file").append(html);
                        $(".popup_post_new .upload_file").show();
                    }
                    // cảm xúc hoạt động
                    // reset cảm xúc hoạt động
                    $(".p_feel .feel_item_active").click();
                    $(".p_feel .activity_item_active").click();
                    // đổ dl cảm xúc hoạt động
                    if (data.data.feel >= 0){
                        $(".p_feel .feel_item[data-feel="+data.data.feel+"]").click();
                    }else if (data.data.activity >= 0){
                        $(".p_feel .activity_item[data-activity="+data.data.activity+"]").click();
                    }
                    // gắn tag
                    // reset tag
                    $(".name_metion .mention_detail_box_item_del").each(function(){
                        $(this).click();
                    });
                    // đổ dl gắn tag
                    if (data.data.id_user_tags != 0){
                        var id_user_tags = data.data.id_user_tags.split(",");
                        id_user_tags.forEach(element => {
                            $(".name_metion .name_mention_item[data-id="+element+"]").click();
                        });
                    }
                    $(".name_metion .name_mention_btn").click();
                    // vị trí
                    // reset location
                    $(".popup_location .at_location_item .at_location_checkbox:checked").parents(".at_location_item").click();
                    // đổ dl location
                    if (data.data.district > 0 && data.data.city > 0){
                        $(".popup_location .at_location_item .at_location_checkbox[data-qh="+data.data.district+"]").parents(".at_location_item").click();
                    }
                }
            });
        } else {
            $.ajax({
                url: '../ajax/update_new_feed_alert.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    new_id: new_id,
                    new_type: new_type
                },
                success: function(data) {
                    if (new_type == 1) {
                        console.log(data);
                        $("#model_sua_alert").show();
                        var element_parent = $(".model_sua_alert");
                        element_parent.find('.block_name_file_detail').remove();
                        element_parent.find('.title_ud_upload_notify').show();
                        element_parent.find('.v_block_file').remove();
                        element_parent.find('.v_block_img').remove();
                        $("#v_input_hidden_edit_alert").val(new_id);
                        element_parent.find(".new_title").val(data.data.new_title);
                        CKEDITOR.instances.v_edit_content_thongbao.setData(data.data.content);
                        element_parent.find(".v_edit_select2_alert").val(data.data.position).trigger("change");
                        window.arr_update_notify_file = [];
                        window.arr_update_notify_image = [];
        
                        window.arr_update_notify_name_img = [];
                        window.arr_update_notify_name_file = [];
                        if (data.data.file != "") {
                            $('.title_ud_upload_notify').hide();
                            window.arr_update_notify = data.data.file.split("||");
                            window.arr_update_name_file_notify = data.data.name_file.split("||");
                            element_parent.find('.title_upload_notify').hide();
                            for (var i = 0; i < arr_update_name_file_notify.length; i++) {
                                element_parent.find('.block_update_notify_name_file').append('<div class="block_name_file_detail">' + arr_update_name_file_notify[i] + '</div>');
                                if (arr_update_notify[i].match('/image/') != null || arr_update_notify[i].match('/video/') != null) {
                                    arr_update_notify_name_img.push(arr_update_name_file_notify[i]);
                                } else {
                                    arr_update_notify_name_file.push(arr_update_name_file_notify[i]);
                                }
                            }
        
                            element_parent.find('.v_update_file_image_discuss').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                            for (var i = 0; i < arr_update_notify.length; i++) {
                                if (arr_update_notify[i].match('/image/') != null) {
                                    html = `<div class="v_block_file_detail">
                                    <img class="v_block_file_image" src="` + arr_update_notify[i] + `" alt="Ảnh lỗi">
                                    <img class="show_del_img del_update_notify_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                    </div>`;
                                    element_parent.find('.v_block_img').append(html);
                                    arr_update_notify_image.push(arr_update_notify[i]);
                                } else if (arr_update_notify[i].match('/video/') != null) {
                                    var duoi = arr_update_notify[i].split('.');
                                    duoi = duoi[duoi.length - 1];
                                    html = `<div class="v_block_file_detail">
                                    <video class="v_block_file_image" controls>
                                    <source src="` + arr_update_notify[i] + `" type="video/` + duoi + `">
                                    </video>
                                    <img class="show_del_img del_update_notify_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                    </div>`;
                                    element_parent.find('.v_block_img').append(html);
                                    arr_update_notify_image.push(arr_update_notify[i]);
                                } else {
                                    html = `<div class="v_block_file_detail2">
                                    <img src="../img/show_del_file.svg" class="show_del_file del_update_notify_file" alt="show_del_file.svg">
                                    <p class="show_name_file2">` + arr_update_name_file_notify[i] + `</p>
                                    <div class="show_file2">
                                    <p class="show_file_size">` + data.data.created_at + `</p>
                                    </div>
                                    </div>`;
                                    element_parent.find('.v_block_file').append(html);
                                    arr_update_notify_file.push(arr_update_notify[i]);
                                }
                            }
                        }
                    } else if (new_type == 2) {
                        var arr_id_user_tags = data.data.id_user_tags.split(",");
                        $(".model_chinhsuachaodonthanhvienmoi").find("#v_select2_chinhsuachaodontvmoi").val(arr_id_user_tags).trigger("change");
                        $(".model_chinhsuachaodonthanhvienmoi").find("#v_content_chinhsuachaodontvmoi").val(data.data.content);
                        $("#model_chinhsuachaodonthanhvienmoi").find(".v_new_id02").val(new_id);
                        $("#model_chinhsuachaodonthanhvienmoi").show();
                    } else if (new_type == 3) {
                        var el = $(".model_chinhsuasukien_noibo_sdn");
                        $("#model_chinhsuasukien_noibo_sdn").show();
                        el.find('.title_upload_evt_nb_ud').show();
                        el.find('.block_name_file_detail').remove();
                        el.find('.v_block_file').remove();
                        $(".model_chinhsuasukien_noibo_sdn").find(".v_title_event").val(data.data.new_title);
                        $(".model_chinhsuasukien_noibo_sdn").find(".v_mieuta_event_noi_bo").val(data.data.content);
                        $(".model_chinhsuasukien_noibo_sdn").find(".v_date_ngay_eventnoibo").val(data.data2.time.date_ngay);
                        $(".model_chinhsuasukien_noibo_sdn").find(".text_img_edit_event_avatar").val(data.data2.avatar);
                        $(".model_chinhsuasukien_noibo_sdn").find(".text_img_edit_event").val(data.data.file);
                        $(".model_chinhsuasukien_noibo_sdn").find(".v_date_gio_eventnoibo").val(data.data2.time.date_gio);
                        $(".model_chinhsuasukien_noibo_sdn").find(".v_select2_taosukiennoibo").val(data.data.position).trigger("change");
                        $(".model_chinhsuasukien_noibo_sdn").find(".v_chinhsua_event_noibo_hidden").val(new_id);
                        window.arr_file_nb = [];
                        window.arr_name_file_nb = [];
                        if (data.data.file != "") {
                            arr_file_nb = data.data.file.split("||");
                            arr_name_file_nb = data.data.name_file.split("||");
                            el.find('.v_add_file_image_event_internal_ud').append('<div class="v_block_file"></div>')
                            el.find('.title_upload_evt_nb_ud').hide();
                            for (var i = 0; i < arr_file_nb.length; i++) {
                                html = `<div class="v_block_file_detail2">
                                <img src="../img/xsukiendoingoai.png" class="show_del_file del_show_e_i_ud" alt="show_del_file.svg">
                                <p class="show_name_file2">` + arr_name_file_nb[i] + `</p>
                                <div class="show_file2">
                                <p class="show_file_size">` + data.data.created_at + `</p>
                                </div>
                                </div>`;
                                el.find('.v_block_file').append(html);
        
                                html2 = `<div class="block_name_file_detail">` + arr_name_file_nb[i] + `</div>`;
                                el.find('.block_name_evt_nb_ud').append(html2);
                            }
                        }
                    } else if (new_type == 4) {
                        var el = $(".model-chinhsuasukiendoingoai");
                        $("#model_chinhsuasukiendoingoai").show();
                        el.find('.title_upload_evt_nb_ud').show();
                        el.find('.block_name_file_detail').remove();
                        el.find('.v_block_file').remove();
                        var element_parent = $(".model-chinhsuasukiendoingoai");
                        element_parent.find('.new_title').val(data.data.new_title);
                        element_parent.find('.v_speakers_avatar_text').val(data.data2.avatar);
                        element_parent.find('.speakers_name').val(data.data2.speakers_name);
                        element_parent.find('.speakers_position').val(data.data2.speakers_position);
                        element_parent.find('.speakers_phone').val(data.data2.speakers_phone);
                        element_parent.find('.speakers_email').val(data.data2.speakers_email);
                        element_parent.find('.date_ngay').val(data.data2.time.date_ngay);
                        element_parent.find('.date_gio').val(data.data2.time.date_gio);
                        element_parent.find('.v_event_avatar_name').val(data.data2.avatar);
                        element_parent.find('.content').val(data.data.content);
                        element_parent.find('.v_event_file_name').val(data.data.file);
                        element_parent.find('.event_position').val(data.data.position).trigger('change');
                        element_parent.find('.event_mode').val(data.data2.event_mode).trigger('change');
                        if (data.data2.list_guests != "") {
                            var guests = JSON.parse(data.data2.list_guests);
                            element_parent.find('.list_guest_tr').remove();
                            for (var i = 0; i < guests.length; i++) {
                                element_parent.find(".list_guest").find(".add_list_guest").before('<tr class="list_guest_tr"><td>' + (i + 1) + '</td><td><input type="text" placeholder="Nhập họ và tên" class="name_guest" value="' + guests[i].name_guest + '"></td><td><input type="text" placeholder="Nhập tên công ty" class="name_company" value="' + guests[i].name_company + '"></td><td><input type="text" placeholder="Nhập chức vụ" class="name_position" value="' + guests[i].name_position + '"></td></tr>');
                            }
                        }
                        element_parent.find('.new_id').val(new_id);
                        window.arr_file_dn = [];
                        window.arr_name_file_dn = [];
                        if (data.data.file != "") {
                            arr_file_dn = data.data.file.split("||");
                            arr_name_file_dn = data.data.name_file.split("||");
                            el.find('.v_add_file_image_dn_ud').append('<div class="v_block_file"></div>')
                            el.find('.title_upload_dn_ud').hide();
                            for (var i = 0; i < arr_file_dn.length; i++) {
                                html = `<div class="v_block_file_detail2">
                                <img src="../img/xsukiendoingoai.png" class="show_del_file del_show_dn_ud" alt="show_del_file.svg">
                                <p class="show_name_file2">` + arr_name_file_dn[i] + `</p>
                                <div class="show_file2">
                                <p class="show_file_size">` + data.data.created_at + `</p>
                                </div>
                                </div>`;
                                el.find('.v_block_file').append(html);
        
                                html2 = `<div class="block_name_file_detail">` + arr_name_file_dn[i] + `</div>`;
                                el.find('.block_name_file_dn_ud').append(html2);
                            }
                        }
                    } else if (new_type == 5) {
                        var id_user_tags = data.data.id_user_tags.split(",");
                        $("#model_chinhsuathaoluan").show();
                        var element_parent = $(".model_chinhsuathaoluan");
                        element_parent.find('.block_name_file_detail').remove();
                        element_parent.find('.title_ud_upload_notify').show();
                        element_parent.find('.v_block_file').remove();
                        element_parent.find('.v_block_img').remove();
                        element_parent.find(".new_title").val(data.data.new_title);
                        CKEDITOR.instances['content_chinhsuathaoluan1'].setData(data.data.content);
                        element_parent.find(".position").val(data.data.position).trigger("change");
                        element_parent.find(".id_user_tags").val(id_user_tags).trigger("change");
                        element_parent.find(".discuss_mode").val(data.data2.discuss_mode).trigger("change");
                        element_parent.find(".text_file").val(data.data.file);
                        element_parent.find(".new_id").val(new_id);
        
                        window.arr_update_discuss_file = [];
                        window.arr_update_discuss_image = [];
        
                        window.arr_update_discuss_name_img = [];
                        window.arr_update_discuss_name_file = [];
                        if (data.data.file != "") {
                            $('.title_ud_upload_notify').hide();
                            window.arr_update_discuss = data.data.file.split("||");
                            window.arr_update_name_file_dicuss = data.data.name_file.split("||");
        
                            element_parent.find('.title_upload_ud_discuss').hide();
                            for (var i = 0; i < arr_update_name_file_dicuss.length; i++) {
                                element_parent.find('.block_name_file_ud_discuss').append('<div class="block_name_file_detail">' + arr_update_name_file_dicuss[i] + '</div>');
                                if (arr_update_discuss[i].match('/image/') != null || arr_update_discuss[i].match('/video/') != null) {
                                    arr_update_discuss_name_img.push(arr_update_name_file_dicuss[i]);
                                } else {
                                    arr_update_discuss_name_file.push(arr_update_name_file_dicuss[i]);
                                }
                            }
        
                            element_parent.find('.v_update_file_image_discuss1').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                            for (var i = 0; i < arr_update_discuss.length; i++) {
                                if (arr_update_discuss[i].match('/image/') != null) {
                                    html = `<div class="v_block_file_detail">
                                    <img class="v_block_file_image" src="` + arr_update_discuss[i] + `" alt="Ảnh lỗi">
                                    <img class="show_del_img del_update_discuss_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                    </div>`;
                                    element_parent.find('.v_block_img').append(html);
                                    arr_update_discuss_image.push(arr_update_discuss[i]);
                                } else if (arr_update_discuss[i].match('/video/') != null) {
                                    var duoi = arr_update_discuss[i].split('.');
                                    duoi = duoi[duoi.length - 1];
                                    html = `<div class="v_block_file_detail">
                                    <video class="v_block_file_image" controls>
                                    <source src="` + arr_update_discuss[i] + `" type="video/` + duoi + `">
                                    </video>
                                    <img class="show_del_img del_update_discuss_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                    </div>`;
                                    element_parent.find('.v_block_img').append(html);
                                    arr_update_discuss_image.push(arr_update_discuss[i]);
                                } else {
                                    html = `<div class="v_block_file_detail2">
                                    <img src="../img/show_del_file.svg" class="show_del_file del_update_discuss_file" alt="show_del_file.svg">
                                    <p class="show_name_file2">` + arr_update_name_file_dicuss[i] + `</p>
                                    <div class="show_file2">
                                    <p class="show_file_size">` + data.data.created_at + `</p>
                                    </div>
                                    </div>`;
                                    element_parent.find('.v_block_file').append(html);
                                    arr_update_discuss_file.push(arr_update_discuss[i]);
                                }
                            }
                        }
                    } else if (new_type == 6) {
                        $("#model_chinhsuachiaseytuong_sdn").show();
                        var element_parent = $(".model_chinhsuachiaseytuong");
                        element_parent.find('.block_name_file_detail').remove();
                        element_parent.find('.title_ud_upload_notify').show();
                        element_parent.find('.v_block_file').remove();
                        element_parent.find('.v_block_img').remove();
                        element_parent.find('.new_title').val(data.data.new_title);
                        element_parent.find('.content').val(data.data.content);
                        element_parent.find(".position").val(data.data.position).trigger('change');
                        element_parent.find(".new_id").val(new_id);
                        element_parent.find('.v_idea_file_name').val(data.data.file);
                        window.arr_update_idea_file = [];
                        window.arr_update_idea_image = [];
        
                        window.arr_update_idea_name_img = [];
                        window.arr_update_idea_name_file = [];
                        if (data.data.file != "") {
                            $('.title_ud_upload_idea').hide();
                            window.arr_update_idea = data.data.file.split("||");
                            window.arr_update_name_file_idea = data.data.name_file.split("||");
                            element_parent.find('.title_upload_ud_idea').hide();
                            for (var i = 0; i < arr_update_name_file_idea.length; i++) {
                                element_parent.find('.block_name_file_ud_idea').append('<div class="block_name_file_detail">' + arr_update_name_file_idea[i] + '</div>');
                                if (arr_update_idea[i].match('/image/') != null || arr_update_idea[i].match('/video/') != null) {
                                    arr_update_idea_name_img.push(arr_update_name_file_idea[i]);
                                } else {
                                    arr_update_idea_name_file.push(arr_update_name_file_idea[i]);
                                }
                            }
                            element_parent.find('.v_update_file_image_idea').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                            for (var i = 0; i < arr_update_idea.length; i++) {
                                if (arr_update_idea[i].match('/image/') != null) {
                                    html = `<div class="v_block_file_detail">
                                    <img class="v_block_file_image" src="` + arr_update_idea[i] + `" alt="Ảnh lỗi">
                                    <img class="show_del_img del_update_idea_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                    </div>`;
                                    element_parent.find('.v_block_img').append(html);
                                    arr_update_idea_image.push(arr_update_idea[i]);
                                } else if (arr_update_idea[i].match('/video/') != null) {
                                    var duoi = arr_update_idea[i].split('.');
                                    duoi = duoi[duoi.length - 1];
                                    html = `<div class="v_block_file_detail">
                                    <video class="v_block_file_image" controls>
                                    <source src="` + arr_update_idea[i] + `" type="video/` + duoi + `">
                                    </video>
                                    <img class="show_del_img del_update_idea_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                    </div>`;
                                    element_parent.find('.v_block_img').append(html);
                                    arr_update_idea_image.push(arr_update_idea[i]);
                                } else {
                                    html = `<div class="v_block_file_detail2">
                                    <img src="../img/show_del_file.svg" class="show_del_file del_update_idea_file" alt="show_del_file.svg">
                                    <p class="show_name_file2">` + arr_update_name_file_idea[i] + `</p>
                                    <div class="show_file2">
                                    <p class="show_file_size">` + data.data.created_at + `</p>
                                    </div>
                                    </div>`;
                                    element_parent.find('.v_block_file').append(html);
                                    arr_update_idea_file.push(arr_update_idea[i]);
                                }
                            }
                        }
                    } else if (new_type == 7) {
                        element_parent = $(".model-chinhsuabinhchon");
                        element_parent.find('.new_id').val(new_id);
                        $("#model-chinhsuabinhchon").show();
                        element_parent.find('.new_title').val(data.data.new_title);
                        CKEDITOR.instances['content_chinhsuathaoluan'].setData(data.data.content);
                        var id_user_tags = data.data.id_user_tags.split(",");
                        element_parent.find('.id_user_tags').val(id_user_tags).trigger('change');
                        element_parent.find('.date_ngay').val(data.data2[0].time.date_ngay);
                        element_parent.find('.date_gio').val(data.data2[0].time.date_gio);
                        var html = "";
                        for (var i = 0; i < data.data2.length; i++) {
                            html = html + '<label class="name">Phương án ' + (i + 1) + '</label><div class="d_flex space_b box_flex2" style="width: 100%; display:flex;"><div class="item_flex3"><input type="text" value="' + data.data2[i].answer + '" class="vote_option vote_option_daco" name="txt_noidungphuongan" placeholder="Nội dung"></div><div class="item_flex3 input_xanh"><input type="file" name="" class="custom-file-input v_file_option file_option_daco" onchange="v_file_option_change(this)"><input type="text" class="v_file_text" value="' + data.data2[i].file + '" onclick="v_file_change(this)" readonly></div></div>';
                        }
                        $(".form_group_option_vote_detail").html(html);
                        element_parent.find('.form_group_option_vote').prepend();
                    } else if (new_type == 8) {
                        var element_parent = $(".model_chinhsuakhenthuong");
                        element_parent.find('.block_name_file_detail').remove();
                        element_parent.find('.title_upload_ud_bonus').show();
                        element_parent.find('.v_block_file').remove();
                        element_parent.find('.v_block_img').remove();
                        $("#model_chinhsuakhenthuong").show();
                        var arr = data.data.id_user_tags.split(",");
                        element_parent.find('.id_user_tags').val(arr).trigger("change");
                        element_parent.find('.position').val(data.data.position).trigger("change");
                        element_parent.find('.content').val(data.data.content);
                        element_parent.find('.text_bonus_file').val(data.data.name_file);
                        element_parent.find(".bonus_option").val(data.data2.id_option);
                        element_parent.find(".loai").css("background", "none");
                        element_parent.find(".loai").eq(data.data2.id_option - 1).css("background", "rgba(71, 71, 71, 0.25)");
                        element_parent.find('.new_id').val(new_id);
                        window.arr_update_bonus_file = [];
                        window.arr_update_bonus_image = [];
        
                        window.arr_update_bonus_name_img = [];
                        window.arr_update_bonus_name_file = [];
        
                        if (data.data.file != "") {
                            window.arr_update_bonus = data.data.file.split("||");
                            window.arr_update_name_file_bonus = data.data.name_file.split("||");
                            element_parent.find('.title_upload_ud_bonus').hide();
                            for (var i = 0; i < arr_update_name_file_bonus.length; i++) {
                                element_parent.find('.block_name_file_ud_bonus').append('<div class="block_name_file_detail">' + arr_update_name_file_bonus[i] + '</div>');
                                if (arr_update_bonus[i].match('/image/') != null || arr_update_bonus[i].match('/video/') != null) {
                                    arr_update_bonus_name_img.push(arr_update_name_file_bonus[i]);
                                } else {
                                    arr_update_bonus_name_file.push(arr_update_name_file_bonus[i]);
                                }
                            }
                            element_parent.find('.v_update_file_image_bonus').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                            for (var i = 0; i < arr_update_bonus.length; i++) {
                                if (arr_update_bonus[i].match('/image/') != null) {
                                    html = `<div class="v_block_file_detail">
                                    <img class="v_block_file_image" src="` + arr_update_bonus[i] + `" alt="Ảnh lỗi">
                                    <img class="show_del_img del_update_bonus_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                    </div>`;
                                    element_parent.find('.v_block_img').append(html);
                                    arr_update_bonus_image.push(arr_update_bonus[i]);
                                } else if (arr_update_bonus[i].match('/video/') != null) {
                                    var duoi = arr_update_bonus[i].split('.');
                                    duoi = duoi[duoi.length - 1];
                                    html = `<div class="v_block_file_detail">
                                    <video class="v_block_file_image" controls>
                                    <source src="` + arr_update_bonus[i] + `" type="video/` + duoi + `">
                                    </video>
                                    <img class="show_del_img del_update_bonus_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                    </div>`;
                                    element_parent.find('.v_block_img').append(html);
                                    arr_update_bonus_image.push(arr_update_bonus[i]);
                                } else {
                                    html = `<div class="v_block_file_detail2">
                                    <img src="../img/show_del_file.svg" class="show_del_file del_update_bonus_file" alt="show_del_file.svg">
                                    <p class="show_name_file2">` + arr_update_name_file_bonus[i] + `</p>
                                    <div class="show_file2">
                                    <p class="show_file_size">` + data.data.created_at + `</p>
                                    </div>
                                    </div>`;
                                    element_parent.find('.v_block_file').append(html);
                                    arr_update_bonus_file.push(arr_update_bonus[i]);
                                }
                            }
                        }
                    } else if (new_type == 9) {
                        var element_parent = $(".model_chinhsuatinnoibo");
                        element_parent.find('.block_name_file_detail').remove();
                        element_parent.find('.title_upload_ud_internal').show();
                        element_parent.find('.v_block_file').remove();
                        element_parent.find('.v_block_img').remove();
                        $("#model_chinhsuatinnoibo").show();
                        element_parent.find(".new_title").val(data.data.new_title);
                        element_parent.find(".content").val(data.data.content);
                        element_parent.find(".v_up_cover_image").val(data.data2.cover_image);
                        element_parent.find(".v_up_file").val(data.data.file);
                        element_parent.find(".new_id").val(new_id);
        
                        window.arr_update_internal_file = [];
                        window.arr_update_internal_image = [];
        
                        window.arr_update_internal_name_img = [];
                        window.arr_update_internal_name_file = [];
        
                        if (data.data.file != "") {
                            window.arr_update_internal = data.data.file.split("||");
                            window.arr_update_name_file_internal = data.data.name_file.split("||");
                            element_parent.find('.title_upload_ud_internal').hide();
                        }
        
                        for (var i = 0; i < arr_update_name_file_internal.length; i++) {
                            element_parent.find('.block_name_file_ud_internal').append('<div class="block_name_file_detail">' + arr_update_name_file_internal[i] + '</div>');
                            if (arr_update_internal[i].match('/image/') != null || arr_update_internal[i].match('/video/') != null) {
                                arr_update_internal_name_img.push(arr_update_name_file_internal[i]);
                            } else {
                                arr_update_internal_name_file.push(arr_update_name_file_internal[i]);
                            }
                        }
        
                        element_parent.find('.v_update_file_image_internal').append('<div class="v_block_file"></div><div class="v_block_img"></div>');
                        for (var i = 0; i < arr_update_internal.length; i++) {
                            if (arr_update_internal[i].match('/image/') != null) {
                                html = `<div class="v_block_file_detail">
                                <img class="v_block_file_image" src="` + arr_update_internal[i] + `" alt="Ảnh lỗi">
                                <img class="show_del_img del_update_internal_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                </div>`;
                                element_parent.find('.v_block_img').append(html);
                                arr_update_internal_image.push(arr_update_internal[i]);
                            } else if (arr_update_internal[i].match('/video/') != null) {
                                var duoi = arr_update_internal[i].split('.');
                                duoi = duoi[duoi.length - 1];
                                html = `<div class="v_block_file_detail">
                                <video class="v_block_file_image" controls>
                                <source src="` + arr_update_internal[i] + `" type="video/` + duoi + `">
                                </video>
                                <img class="show_del_img del_update_internal_file" src="../img/show_del_img.svg" alt="Ảnh lỗi">
                                </div>`;
                                element_parent.find('.v_block_img').append(html);
                                arr_update_internal_image.push(arr_update_internal[i]);
                            } else {
                                html = `<div class="v_block_file_detail2">
                                <img src="../img/show_del_file.svg" class="show_del_file del_update_internal_file" alt="show_del_file.svg">
                                <p class="show_name_file2">` + arr_update_name_file_internal[i] + `</p>
                                <div class="show_file2">
                                <p class="show_file_size">` + data.data.created_at + `</p>
                                </div>
                                </div>`;
                                element_parent.find('.v_block_file').append(html);
                                arr_update_internal_file.push(arr_update_internal[i]);
                            }
                        }
                    }
                }
            });
        }
    });
    $(".send_with_chat .send_with_chat_search").on("input",function(){
        if ($(this).val() != ""){
            var keyword = $(this).val();
            $(".send_with_chat .friend_recently_item").each(function(){
                var name = $(this).find(".friend_recently_item_name").html().toLowerCase();
                if (name.includes(keyword) == true){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
        }else{
            $(".send_with_chat .friend_recently_item").show();
        }
    });
    $(".popup_location .name_metion_input").on("input",function(){
        var keyword = $(this).val().trim().toLowerCase();
        if (keyword != ""){
            $(".popup_location .at_location_item").each(function(){
                var name = $(this).text().trim().toLowerCase();
                if (name.includes(keyword) == true){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
        }else{
            $(".popup_location .at_location_item").show();
        }
    });
    // search @ popup gắn thẻ người khác
    $(".name_metion .name_metion_input").on('input',function(){
        var find_key = $(".name_metion .name_metion_input").val().trim();
        if (find_key == ""){
            $(".name_metion .name_mention_item").show();
        }else{
            $(".name_metion .name_mention_item").each(function(){
                var name = $(this).text().trim().toLowerCase();
                if (name.includes(find_key) == true) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
    $(".share_up_invidual .share_up_group_input").on("input",function(){
        var keyword = $(this).val().trim().toLowerCase();
        if (keyword != ""){
            $(".share_up_invidual .friend_recently_item").each(function(){
                var name = $(this).find(".friend_recently_item_name").text().trim().toLowerCase();
                if (name.includes(keyword) == true){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
        }else{
            $(".share_up_invidual .friend_recently_item").show();
        }
    });
    $(".share_up_group .share_up_group_input").on("input",function(){
        var keyword = $(this).val().trim().toLowerCase();
        if (keyword != ""){
            $(".share_up_group .friend_recently_item").each(function(){
                var name = $(this).find(".friend_recently_item_name").text().trim().toLowerCase();
                if (name.includes(keyword) == true){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
        }else{
            $(".share_up_group .friend_recently_item").show();
        }
    });
    $(".gr_member_body .gr_friend_input").on("input",function(){
        var keyword = $(this).val().trim().toLowerCase();
        if (keyword != ""){
            $(".gr_member_body .gr_friend_item").each(function(){
                var name = $(this).find(".gr_friend_name").text().trim().toLowerCase();
                if (name.includes(keyword) == true){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
        }else{
            $(".gr_member_body .gr_friend_item").show();
        }
    });
    $(".send_with_chat .friend_recently_item_btn").click(function(){
        var id_chat = $(this).attr("data-id_chat");
        var conversationid = $(this).attr("data-conversationid");
        var my_id_chat = $(".send_with_chat").attr("data-my_id_chat");
        var new_id = $(".send_with_chat").attr("data-new_id");
        var album_id = $(".send_with_chat").attr("data-album_id");
        var ep_id = $(".send_with_chat").attr("data-ep_id");
        var ep_type = $(".send_with_chat").attr("data-ep_type");
        var link = $(".send_with_chat").attr("data-link");
        var gr_id = $(".send_with_chat").attr("data-gr_id");
        var parents_id = $(".send_with_chat").attr("data-parents_id");
        var mess = $(".send_with_chat .send_with_chat_mess").val();
        var btn = $(this);
        $.ajax({
            url: '../ajax/send_via_chat.php',
            type: 'POST',
            dataType: 'json',
            data: {
                mess: mess,
                new_id: (parents_id > 0)?parents_id:new_id,
                id_receiver: id_chat,
                conversationid: conversationid,
                id_sender: my_id_chat,
                album_id: album_id,
                ep_id: ep_id,
                ep_type: ep_type,
                gr_id: gr_id,
                link: link,
            },
            beforeSend: function() {
                btn.prop("disabled",true);
                btn.html("Đang gửi");
            },
            success: function(data) {
                btn.prop("disabled",false);
                if (data.result == true){
                    btn.html("Đã gửi");
                }else{
                    btn.html("Gửi lại");
                }
            }
        });
    });
    $(".ep_share_other_site").click(function(){
        $(this).parents(".ep_post_popup_share").prev().slideToggle();
        $(this).parents(".ep_post_popup_share").slideToggle();
    });
    $(document).on('click', '.ep_post_action1_deatail_edit_object', function() { 
        $(".popup_regime_header").text("Đối tượng xem bài viết");
        var view_mode = ($(this).attr("data-view_mode")>=0)?$(this).attr("data-view_mode"):0;
        $(".popup_regime [name=regime_select][value="+view_mode+"]").prop("checked",true);
        $(".special .except_detail_box_item_del").each(function(index,element){
            $(element).click();
        });
        $(".except .except_detail_box_item_del2").each(function(index,element){
            $(element).click();
        });
        $(".popup_regime .list_friends_except").each(function(index,element){
            $(element).html("");
        });
        $(".popup_regime .list_friends_expect").each(function(index,element){
            $(element).html("");
        });
        if (view_mode == 4){
            let new_id = $(this).attr("data-new_id"),
                list_regime = handle.list_user_regime(new_id);
            list_regime.forEach(function callback(user, i) {
                $(".special .except_info_user2[data-id="+user.nvm_user_id+"][data-type365="+user.nvm_user_type+"]").click();
            });
            $(".special .except_save").click();
        } else if (view_mode == 3){
            let new_id = $(this).attr("data-new_id"),
                list_regime = handle.list_user_regime(new_id);
            list_regime.forEach(function callback(user, i) {
                $(".except .except_checkbox[value="+user.nvm_user_id+"][data-type365="+user.nvm_user_type+"]:not(:checked)").click();
            });
            $(".except .except_save").click();
        }
        $(".popup_regime").show();
        $(".popup_regime").attr("data-update",$(this).attr("data-new_id"));
    });
    // Tắt thông báo bài viết nhóm
    $(document).on('click', '.click_notify_off', function() {
        var id_post = $(this).parents(".pick_id_post_hide").attr('data-new_id');
        var btn = $(this);
        $.ajax({
            url: '../ajax/notify_off.php',
            type: 'POST',
            data: {id_post:id_post},
            success: function(data){
                if (data == "") {
                    alert("Tắt thông báo bài viết thành công");
                    btn.after(`<div class="ep_post_action1_deatail click_notify_on" onclick="popup_notify_on(`+id_post+`)">
                        <img src="/img/ep_post_notify.svg" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text ep_post_turnon_notify">Bật thông báo</span>
                    </div>`);
                    btn.parents(".ep_post_action1").slideUp();
                    btn.remove();
                }else{
                    alert("Có lỗi xảy ra");
                }
            }
        });
    });
    
    // Bỏ lưu bài viết nhóm
    $(document).on('click', '.remove_save_post', function() { 
        var id_post = $(this).attr('data');
        var btn_save = $(".ep_post_detail[data-new_id="+id_post+"] .remove_save_post");
    
        $.ajax({
            url: '../ajax/remove_save_post_group.php',
            type: 'POST',
            dataType: 'json',
            data: {id_post:id_post},
            success: function(data){
                if(data.result == true){
                    alert("Bỏ lưu bài viết thành công");
                    btn_save.after(`<div class="ep_post_action1_deatail btn_save_post" onclick="luu_bai_viet(`+id_post+`)">
                        <img src="/img/ep_post_save.svg" alt="Ảnh lỗi">
                        <span class="ep_post_action1_deatail_text">Lưu bài viết</span>
                    </div>`);
                    btn_save.parents(".ep_post_action1").slideUp();
                    btn_save.remove();
                }else{
                    alert("Có lỗi xảy ra");
                }
            }
        });
    });
    // check in viewport 
    $.fn.isInViewport = function () {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    // var page = 1;
    var stop = false;
    var tmp = 98; // 78 + 20 - header's height + padding-top
    var post_height = 0;
    $(".ep_post_detail").each(function(index,element){
        post_height += $(element).height();
    });
    // xem thêm bài viết 
    $(document).on('scroll', function(e){  
        var form_data = new FormData(),
            el_render = '.ep_post_detail';
        // load more @ trang cá nhân
        if ($(".center_avt").length > 0 && $(".nv_scroll_post").length > 0){
            tmp = $(".center_avt").height();
            var max_height = 900,
                bottom_content_scroll = $('#center').height(),
                el_page = '.center_body.lst_posts_profile';
            form_data.append('ep_id', $(".center_avt_footer_img").data("ep_id"));
            form_data.append('ep_type', $(".center_avt_footer_img").data("ep_type"));
        }
        // load more @ trang chủ 
        else if ($(".ep_post").length > 0){
            var max_height = 1100,
                bottom_content_scroll = $('.center_content_middle').height() + tmp,
                el_page = '.ep_post.lst_posts_index';
        } 
        // load more @ feed nhóm
        else if($('.fig_post_bang_feed').length > 0) {
            var max_height = 900,
                bottom_content_scroll = $('.div_group_tong_main_padding').height() + tmp,
                el_render = '.content_news_item',
                el_page = '.fig_post_bang_feed.lst_content_news';
            form_data.append('lst_group', $('.lst_content_news').attr('data-lst_group'));
        }
        // load more @ detail nhóm
        else if($('.lst_news_detail_gr').length > 0) {
            var max_height = 900,
                bottom_content_scroll = $('.pg_main_content.tong_post_5').height() + tmp,
                tab_active = $('.pg_main_head_option_text_one.active_text').attr('data-type'),
                group_id = $('.lst_news_detail_gr').attr('data-id_group'),
                el_render = '.lst_news_detail_gr_'+tab_active+' .content_news_item';
                el_page = '.lst_news_detail_gr.lst_news_detail_gr_'+tab_active;
            form_data.append('group_id', group_id);
            form_data.append('tab_active', tab_active);
        }
        var bottom_border_scroll = $('.container-header').offset().top + $(window).height(),
            delta = bottom_content_scroll - bottom_border_scroll,
            page = $(el_page).attr('data-page');
        if (delta < max_height && !stop){
            page = parseInt(page) + 1; 
            form_data.append('page', page);  
            $.ajax({
                url: '/ajax/loadmore_post.php',
                type: 'POST',
                async: false,
                data: form_data, 
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data != ""){
                        $(el_render).last().after(data);
                        $(el_page).attr('data-page', page);
                    }else{
                        stop = true;
                    }
                }
            });
        } 

        // load nội dung bài viết xem thêm hoặc thu gọn
        render.see_more_content_post();
    });
});

function shareOnFacebook(new_id=0,album_id=0,gr_id=0){
    var el = $(event.target);
    if (gr_id > 0){
        var url = $(el).parents(".gr_friend_item").find(".gr_friend_name").attr("href");
        window.open('https://www.facebook.com/sharer/sharer.php?u=https://truyenthongnoibo.timviec365.vn' + url,
            'facebook-share-dialog',
            'width=800,height=600'
        );
        return false;
    }else if (album_id > 0){
        var url = window.location.href;
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
            'facebook-share-dialog',
            'width=800,height=600'
        );
        return false;
    }else if (new_id > 0){
        
    }
    window.open(str, "_blank");
}

function shareOnPinterest(new_id=0,album_id=0,gr_id=0){
    var el = $(event.target);
    if (gr_id > 0){
        var url = $(el).parents(".gr_friend_item").find(".gr_friend_name").attr("href");
        var desc = '';
        var src = $(el).parents(".gr_friend_item").find(".gr_friend_avt_group").attr("src");
        if (src.match("^\.\.\/")){
            src = src.slice(3);
        }else{
            src = src.slice(1);
        }
        var coverImage = "https://truyenthongnoibo.timviec365.vn/" + src;
        var str = "http://pinterest.com/pin/create/button/?url=" + encodeURIComponent(url) + "&media=" + coverImage + "&description=" + desc;
    }else if (album_id > 0){
        var url = window.location.href;
        var desc = '';
        var src = $(".gr_album_body_link_img").eq(0).attr("src");
        if (src.match("^\.\.\/")){
            src = src.slice(3);
        }else{
            src = src.slice(1);
        }
        var coverImage = "https://truyenthongnoibo.timviec365.vn/" + src;
        var str = "http://pinterest.com/pin/create/button/?url=" + encodeURIComponent(url) + "&media=" + coverImage + "&description=" + desc;
    }else if (new_id > 0){
        
    }
    window.open(str, "_blank");
}

function shareOnTwitter(new_id=0,album_id=0,gr_id=0){
    var el = $(event.target);
    if (gr_id > 0){
        var url = $(el).parents(".gr_friend_item").find(".gr_friend_name").attr("href");
        window.open('https://twitter.com/share?text=&url=https://truyenthongnoibo.timviec365.vn' + url);
        return false;
    }else if (album_id > 0){
        var url = window.location.href;
        window.open('https://twitter.com/share?text=&url=' + url);
        return false;
    }else if (new_id > 0){
        
    }
    window.open(str, "_blank");
}

function shareOnLinkedIn(new_id=0,album_id=0,gr_id=0){
    var el = $(event.target);
    if (gr_id > 0){
        var url = $(el).parents(".gr_friend_item").find(".gr_friend_name").attr("href");
        window.open('https://www.linkedin.com/sharing/share-offsite/?url=https://truyenthongnoibo.timviec365.vn' + url);
        return false;
    }else if (album_id > 0){
        var url = window.location.href;
        window.open("https://www.linkedin.com/sharing/share-offsite/?url=" + url);
        return false;
    }else if (new_id > 0){
        
    }
    window.open(str, "_blank");
}
// rời nhóm
function LeaveGroup(id_group){
    var r  = confirm("Bạn chắc chắn muốn rời khỏi nhóm này");
    if (id_group > 0 && r){
        $.ajax({
            url: '../ajax/out_group.php',
            type: 'POST',
            data: {
                id_group:id_group
            },
            success: function(data){
                if (data == "") {
                    window.location.reload();
                }else{
                    alert("Có lỗi xảy ra");
                }
            }
        });
    }
}
// Bỏ theo dõi nhóm
function unFollowGroup(id_group){
    if (id_group > 0){
        $.ajax({
            url: '../ajax/unfollow.php',
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
};
// Theo dõi nhóm
function FollowGroup(e, type, id_group, name_group) {
    if (type == 1) { // bỏ theo dõi
        if (confirm('Bạn có chắc muốn bỏ theo dõi nhóm '+name_group+' không?')) {
            let unfollow = callAjax('../ajax/follow_group.php', 'POST', { id_group, type });
            if (unfollow.result) {
                alert('Bỏ theo dõi nhóm '+name_group+' thành công.');
                $(e).parents('.box_contain_list_post').find('.btn_unfollow_group').remove();
            }
        }
    } else { // theo dõi
        let follow = callAjax('../ajax/follow_group.php', 'POST', { id_group, type });
        if (follow.result) {
            alert('Theo dõi nhóm '+name_group+' thành công.');
            $(e).parents('.box_contain_list_post').find('.btn_unfollow_group').remove();
        }
    }
};
// sao chép liên kết nhóm
function copy2clipboard(){
    var el = $(event.target);
    var url = location.protocol + '//' + location.host + $(el).parents(".gr_friend_item").find(".gr_friend_name").attr("href");
    // Copy the text inside the text field
    navigator.clipboard.writeText(url);
    $(".edit_fr").hide();
}
// theo dõi / bỏ theo dõi bạn bè
function unfollow(id365,type365,unfollow_time=0){
    var el = $(event.target);
    console.log($(el).hasClass("ep_post_action1_unfllow"));
    console.log($(el).parents(".ep_post_action1_unfllow").length);
    var form_data = new FormData;
    form_data.append("unfollow_id",id365);
    form_data.append("unfollow_id_type",type365);
    form_data.append("unfollow_time",unfollow_time);
    $.ajax({
        url: '../ajax/unfriend.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.result == true){
                if (el.hasClass("ep_post_action1_unfllow") || $(el).parents(".ep_post_action1_unfllow").length > 0){
                    $(el).parents(".ep_post_detail").hide();
                    html = `<div class="ep_post_hide">
                        <button class="ep_post_item_btn" onclick="unfollow(` + id365 + `,` + type365 + `)">Hoàn tác</button>
                        <div class="ep_post_item">
                        <img class="ep_post_item_icon" src="../img/bo-theo-doi2.svg" alt="Ảnh lỗi">
                        <div class="ep_post_hide_action">
                            <p class="ep_post_hide_title fig_text_4-1">Đã bỏ theo dõi ` + $(el).parents(".ep_post_detail").find(".name_author_hidden").html() + `</p>
                            <p class="ep_post_hide_content fig_text_4-1">Bạn sẽ không nhìn thấy bài viết của ` + $(el).parents(".ep_post_detail").find(".name_author_hidden").html() + ` trên bảng tin của mình.</p>
                        </div>
                        </div>  
                    </div>`;
                    $(el).parents(".ep_post_detail").after(html);
                }else if (el.hasClass("ep_post_action1_hide2") || $(el).parents(".ep_post_action1_hide2").length > 0){
                    $(el).parents(".ep_post_detail").hide();
                    html = `<div class="ep_post_hide">
                        <button class="ep_post_item_btn" onclick="unfollow(` + id365 + `,` + type365 + `)">Hoàn tác</button>
                        <div class="ep_post_item">
                        <img class="ep_post_item_icon" src="../img/tam-an.svg" alt="Ảnh lỗi">
                        <div class="ep_post_hide_action">
                            <p class="ep_post_hide_title fig_text_4-1">Tạm ẩn ` + $(el).parents(".ep_post_detail").find(".name_author_hidden").html() + `</p>
                            <p class="ep_post_hide_content fig_text_4-1">Bạn sẽ không nhìn thấy bài viết của ` + $(el).parents(".ep_post_detail").find(".name_author_hidden").html() + ` trên bảng tin của mình trong 30 ngày.</p>
                        </div>
                        </div>  
                    </div>`;
                    $(el).parents(".ep_post_detail").after(html);
                }else if (el.hasClass("ep_post_item_btn") || $(el).parents(".ep_post_item_btn").length > 0){
                    el.parents(".ep_post_hide").prev().show();
                    el.parents(".ep_post_hide").remove();
                }else{
                    location.reload();
                }
            }else{
                $(".unfriend").hide();
                alert(data.msg);
            }
        }
    });
}

function turn_on_popup_share(e) {
    $(e).prev(".ep_post_popup_share").slideToggle();
    $(e).prev(".ep_post_popup_share").prev(".ep_post_popup_share").hide();
}

function focus_cmt(e) {
    $(e).parents('.ep_post_detail').find('.ep_post_show_cmt_detail').css('display', 'flex');
    $(e).parents('.ep_post_detail').find('.btn_view_cmt, .list_cmt_parent').css('display', 'block');
    $(e).parents(".ep_post_action").next().find(".ep_post_write_input").focus();
    render.see_more_content_post();
}

function retun_html_post(new_id,parents_id=0,new_type=0,album_id=0,gr_id=0) {
    var html = "";
    if (gr_id > 0 || album_id > 0 || parents_id > 0){
        if (new_id > 0){
            var el = $(".ep_post_detail[data-new_id=" + new_id + "]");
            html = `<div class="post_share">` + el.find(".post_share").html() + `</div>`;
        }else if (gr_id > 0){
            var el = $(".share_my_wall[data-gr_id=" + gr_id + "]").parents(".gr_friend_item");
            html = `<div class="post_share">`;
            html = html + `<div class="gr_bgi"><img src="` + el.find(".gr_friend_avt_group").attr("src") + `"></div>`;
            var index = $(".gr_friend_list_item").index(".gr_friend_list_item_active");
            html = html + `<div class="post_share_content">
                    <p class="post_share_content_time">` + $(".gr_member_title").eq(index).html() + ` &#9679 ` + el.find(".gr_friend_detail").html() + `</p>
                    <p class="post_share_content_title">` + el.find(".gr_friend_name").html() + `</p>
                </div>
            </div>`;
        }else if (album_id > 0){
            html = `<div class="post_share">`;
            html = html + `<div class="post_share_img_box">`;
            if ($(".gr_album_body_link_img").length > 4){
                for (let index = 0; index < 4; index++) {
                    if ($(".gr_album_body_link_img").eq(index).prop("tagName") == "VIDEO"){
                        html = html + `<video class="post_share_img" controls=""><source src="` + $(".gr_album_body_link_img source").eq(index).attr("src") + `"></video>`;
                    }else{
                        html = html + `<img class="post_share_img" src="` + $(".gr_album_body_link_img").eq(index).attr("src") + `" alt="Ảnh lỗi">`;
                    }
                }
                html = html + `<div class="post_share_img_box_more">
                <span class="post_share_img_box_more_span">+` + ($(".gr_album_body_link_img").length - 3) + `</span>
              </div>`;
            }else{
                $(".gr_album_body_link_img").each(function(){
                    if ($(this).prop("tagName") == "VIDEO"){
                        html = html + `<video class="post_share_img" controls><source src="` + $(this).find("source").attr("src") + `"></video>`;
                    }else{
                        html = html + `<img class="post_share_img" src="` + $(this).attr("src") + `" alt="Ảnh lỗi">`;
                    }
                });
            }
            html = html + `</div>`;
            html = html + `<div class="post_share_content">
                    <p class="post_share_content_title">` + $(".center_avt_name").html() + `</p>
                    <p class="post_share_content_time">` + $(".gr_album_time").html() + `<span><img class="div_width_hight_icon" src="` + $(".gr_album_viewmode").attr("src") + `"></span></p>
                    
                </div>
                </div>`;
        }
    }else if (new_id > 0){
        var el = $(".ep_post_detail[data-new_id=" + new_id + "]");
        html = `<div class="post_share">`;
        el.find(".ep_post_file_div_detail").each(function(){
            html = html + `<div class="post_share_file">
                <p class="post_share_file_title">` + $(this).find(".ep_post_name_file").html() + `</p>
                <p class="post_share_file_time">` + $(this).find(".ep_post_file_size").html() + `</p>
              </div>`;
        });
        html = html + `<div class="post_share_img_box">`;
        el.find(".ep_post_file_img_detail").each(function(){
            if ($(this).prop("tagName") == "VIDEO"){
                html = html + `<video class="post_share_img" controls=""><source src="` + $(this).find("source").attr("src") + `"></video>`;
            }else{
                html = html + `<img class="post_share_img" src="` + $(this).attr("src") + `" alt="Ảnh lỗi">`;
            }
        });
        if (el.find(".ep_post_file_img_detail").length == 4){
            html = html + `<div class="post_share_img_box_more">
            <span class="post_share_img_box_more_span">` + (el.find(".ep_post_file_img_more").html) + `</span>
          </div>`;
        }
        html = html + `</div>`;
        if (new_type == 3 || new_type == 4){
            html += `<div class="img_sukien_congty">` + el.find(".img_sukien_congty").html() + `</div>`;
        }else if (new_type == 7){
            html += `<div class="container-binhchon">` + el.find(".container-binhchon").html() + `</div>`;
        }

        html = html + `<div class="post_share_content">
            <p class="post_share_content_title">` + el.find(".ep_post_author_name").html() + `</p>
            <p class="post_share_content_time">` + el.find(".ep_post_time").html() + `</p>
            <p class="post_share_content_detail">` + el.find(".ep_post_content").html() + `</p>
          </div>
        </div>`;
    }
    return html;
}

function collection_input(collec_i){
    var dem_collection_input = $("input[name=collection]").val();
    if(dem_collection_input.length > 0){
        $(".disabled_chung").removeClass("bg_ccc");
        $(".disabled_chung").attr("disabled", false);
    }else{
        $(".disabled_chung").addClass("bg_ccc");
        $(".disabled_chung").attr("disabled", true);
    }
}

$(".windown_lo_r").click(function(){
    window.location.reload();
})
// --------------------------
var breakTag = '<br>';

function show_rep_comment(cmt_id) {
    var el = $(event.target);
    var hidden = el.attr("data-hidden");
    var group_pause = el.parents(".ep_post_detail").attr("data-group_pause");
    var suspended_me = el.parents(".ep_post_detail").attr("data-suspended_me");
    var is_admin = el.parents(".ep_post_detail").attr("data-is_admin");
    var isauthor = el.parents(".ep_post_show_cmt").data("isauthor");
    var form_data = new FormData();
    if (window.location.pathname == "/truyen-thong-noi-bo-cong-ty.html") {
        form_data.append('page_type', 2);
    } else {
        form_data.append('page_type', 1);
    }
    var page = el.prevAll('.ep_show_repcmt_detail');
    form_data.append('cmt_id', cmt_id);
    form_data.append('page', page.length);
    $.ajax({
        url: '../ajax/list_rep_comment.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        success: function (responsive) {
            if (responsive.result == true) {
                var cmt = responsive.data;
                for (let i = 0; i < cmt.length; i++) {
                    if (cmt[i].hidden == 0 || ((hidden == 1 || cmt[i].hidden == 1) && (isauthor == 1 || is_admin == 1))){
                        var class_op = '';
                        if (hidden == 1 || cmt[i].hidden == 1){
                            class_op = ' opacity-0p15';
                        }
                        html = `<div class="ep_show_repcmt_detail" data-hidden="` + cmt[i].hidden + `">
                                <img class="ep_show_cmt_avt` + class_op + `" src="` + cmt[i].avatar + `" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
                                <div class="ep_show_cmt_content">
                                    <div class="ep_show_cmt_content_detail` + class_op + `">
                                        <p class="ep_show_cmt_username">` + cmt[i].name + `</p>
                                        <p class="ep_show_cnt_item" id="text_comment` + cmt[i].id + `">` + cmt[i].content.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2') + `</p>`;

                        if (cmt[i].image != '') {
                            html += `<img class="image_cmt" id="img_cmt` + cmt[i].id + `" src="` + cmt[i].image + `" alt="Ảnh lỗi">`;
                        }

                        html += `</div>`;

                        if ((cmt[i].type_create == 1 || isauthor == 1 || is_admin == 1) && group_pause == 0 && suspended_me == 0){
                            html += `<img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                                <div class="popup_action_cmt">`;
                                        
                            if (cmt[i].type_create == 1){
                                html += `<div class="popup_action_cmt_detail" onclick="edit_comment(` + cmt[i].id + `,` + cmt_id + `,1)">
                                        <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                            alt="Ảnh lỗi">
                                        Chỉnh sửa bình luận
                                    </div>`;
                            }
                            if (isauthor == 1 || is_admin == 1){
                                if (cmt[i].hidden == 1){
                                    html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmt(this,` + cmt[i].id + `,` + cmt_id + `)">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi">
                                            Hiển thị bình luận
                                        </div>`;
                                }else{
                                    html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmt(this,` + cmt[i].id + `,` + cmt_id + `)">
                                            <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                                            Ẩn bình luận
                                        </div>`;
                                }
                            }
                            html += `<div class="popup_action_cmt_detail" onclick="deleteCmt(this,` + cmt[i].id + `)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>`;
                            html += `</div>`;
                        }
    

                        html += `<div class="ep_show_cmt_action2">`;
                        if (group_pause == 0 && suspended_me == 0){
                            html += `<button data-type=` + cmt[i].style_like_nv + ` class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment(this,` + cmt[i].id + `)">Thích . </button>`;
                        }
                        html += `<button class="ep_show_cmt_action2_btn ep_show_repcmt_time">` + cmt[i].time_sort + `</button>
                                    <div class="ep_show_cmt_action2_count_like">
                                        <img class="ep_show_cmt_action2_count_like_icon" src="../img/like_btn.svg" alt="Ảnh lỗi">
                                        <span class="number_count_like">` + cmt[i].num_like_comment + `</span>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        $(html).insertBefore(el);
                    }
                }

                if (responsive.data.length == 0) {
                    $('#hide_cmt_rep' + cmt_id).css('display', 'block');
                    $('#view_cmt_rep' + cmt_id).css('display', 'none');
                }

                if (responsive.count_like == 0) {
                    el.hide();
                    // el.next().show();
                }
            } else {
                return false;
            }
        }
    });
}

function show_rep_album_comment(cmt_id) {
    var el = $(event.target);
    var hidden = el.attr("data-hidden");
    var isauthor = el.parents(".ep_post_show_cmt").data("isauthor");
    var form_data = new FormData();
    if (window.location.pathname == "/truyen-thong-noi-bo-cong-ty.html") {
        form_data.append('page_type', 2);
    } else {
        form_data.append('page_type', 1);
    }
    var page = el.prevAll('.ep_show_repcmt_detail');
    form_data.append('cmt_id', cmt_id);
    form_data.append('page', page.length);
    $.ajax({
        url: '../ajax/list_rep_album_comment.php',
        type: 'POST',
        dataType: 'json',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        success: function (responsive) {
            if (responsive.result == true) {
                var cmt = responsive.data;
                for (let i = 0; i < cmt.length; i++) {
                    if (cmt[i].hidden == 0 || ((hidden == 1 || cmt[i].hidden == 1) && isauthor == 1)){
                        var class_op = '';
                        if (hidden == 1 || cmt[i].hidden == 1){
                            class_op = ' opacity-0p15';
                        }
                        html = `<div class="ep_show_repcmt_detail" data-hidden="` + cmt[i].hidden + `">
                                <img class="ep_show_cmt_avt` + class_op + `" src="` + cmt[i].avatar + `" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
                                <div class="ep_show_cmt_content">
                                    <div class="ep_show_cmt_content_detail` + class_op + `">
                                        <p class="ep_show_cmt_username">` + cmt[i].name + `</p>
                                        <p class="ep_show_cnt_item" id="text_comment` + cmt[i].id + `">` + cmt[i].content.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2') + `</p>`;

                        if (cmt[i].image != '') {
                            html += `<img class="image_cmt" id="img_cmt` + cmt[i].id + `" src="` + cmt[i].image + `" alt="Ảnh lỗi">`;
                        }

                        html += `</div>`;
                        if (cmt[i].avatar_login != ''){
                            html += `<img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">`;
                        }
                        html += `<div class="popup_action_cmt">`;
                                    
                        if (cmt[i].type_create == 1){
                            html += `<div class="popup_action_cmt_detail" onclick="edit_comment(` + cmt[i].id + `,` + cmt_id + `,1)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                        alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>`;
                        }
                        if (isauthor == 1){
                            if (cmt[i].hidden == 1){
                                html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmtAlbum(this,` + cmt[i].id + `,` + cmt_id + `)">
                                        <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi">
                                        Hiển thị bình luận
                                    </div>`;
                            }else{
                                html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmtAlbum(this,` + cmt[i].id + `,` + cmt_id + `)">
                                        <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                                        Ẩn bình luận
                                    </div>`;
                            }
                        }
                        if (cmt[i].type_create == 1 || isauthor == 1){
                            html += `<div class="popup_action_cmt_detail" onclick="deleteCmtAlbum(this,` + cmt[i].id + `)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>`;
                        }
    
                        html += `</div>
                                <div class="ep_show_cmt_action2">
                                    <button data-type=` + cmt[i].style_like_nv + ` class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment_album(this,` + cmt[i].id + `)">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">` + cmt[i].time_sort + `</button>
                                    <div class="ep_show_cmt_action2_count_like">
                                        <img class="ep_show_cmt_action2_count_like_icon" src="../img/like_btn.svg" alt="Ảnh lỗi">
                                        <span class="number_count_like">` + cmt[i].num_like_comment + `</span>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        $(html).insertBefore(el);
                    }
                }

                if (responsive.data.length == 0) {
                    $('#hide_cmt_rep' + cmt_id).css('display', 'block');
                    $('#view_cmt_rep' + cmt_id).css('display', 'none');
                }

                if (responsive.count_like == 0) {
                    el.hide();
                    // el.next().show();
                }
            } else {
                return false;
            }
        }
    });
}

var arrImgCmt = [];
var img_rep_cmt = [];
function nv_comment_active(e) {
    var element = $(e);
    var type = element.attr('data-type');
    var form_data = new FormData();
    var url = (type == 0) ? "../ajax/comment_post.php" : "../ajax/comment_post_edit.php";

    var comment = element.find('.ep_post_write_input').val().trim();
    var new_id = element.attr('data-new_id');
    var avatar = $('#v_header_menu .v_header_avatar').attr('src');
    var name = $('#v_header_menu .v_header_user_name').html();
    var isauthor = element.parents(".ep_post_show_cmt_detail").next(".ep_post_show_cmt").data("isauthor");

    name = $.trim(name);

    form_data.append('comment', comment);
    // form_data.append('avatar', avatar);
    form_data.append('new_id', new_id);
    form_data.append('img_comment', arrImgCmt[0]);
    var check = true;
    if (type == 0) {
        if (comment == "" && arrImgCmt.length == 0) {
            check = false;
        }   
    }else if (type == 1) {
        if (comment == "" && $(e).find(".render_img").length == 0) {
            check = false;
        }
    }
    if (check == true) {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (resp) {
                comment = comment.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                if (type == 0) {
                    var data = resp.data;
                    element.parents('.ep_post_detail').find('.ep_post_count_like .count_comment').text(data.count_comment);
                    html = `<div class="ep_post_show_cmt_detail">
                                <img class="ep_show_cmt_avt" src="` + data.avatar + `" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
                                <div class="ep_show_cmt_content">
                                    <div class="ep_show_cmt_content_detail">
                                        <p class="ep_show_cmt_username">` + data.name + `</p>
                                        <p class="ep_show_cnt_item" id="text_comment` + data.id + `">` + comment + `</p>`;

                    if (data.img != '') {
                        html += `<img class="image_cmt" id="img_cmt` + data.id + `" src="` + data.img + `" alt="Ảnh lỗi">`;
                    }
                    html += `</div>
                            <!-- chức năng quản lý bình luận -->
                            <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                            <div class="popup_action_cmt">
                                <div class="popup_action_cmt_detail" onclick="edit_comment(` + data.id + `,` + new_id + `,0)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>`;
                    if (isauthor == 1){
                        html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideCmt(this,` + data.id + `)">
                                <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                                Ẩn bình luận
                            </div>`;
                    }

                    html += `<div class="popup_action_cmt_detail" onclick="deleteCmt(this,` + data.id + `)">
                                        <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                            alt="Ảnh lỗi">
                                        Xóa bình luận
                                    </div>
                                </div>
                                <!-- chức năng tương tác với bình luận / thống kê thời gian, tương tác -->
                                <div class="ep_show_cmt_action2">
                                    <button  data-type="0" class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment(this,` + data.id + `)">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                                    <button class="ep_show_cmt_action2_btn">` + data.time_active + `</button>
                                    <div class="ep_show_cmt_action2_count_like">
                                        <img class="ep_show_cmt_action2_count_like_icon" src="../img/like_btn.svg" alt="Ảnh lỗi">
                                        <span class="number_count_like">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- danh sách trả lời bình luận -->
                            <div class="ep_show_repcmt">
                                <!-- form trả lời bình luận -->
                                <div class="ep_form_repcmt">
                                    <img class="ep_post_write_avt" src="` + data.avatar + `" alt="Ảnh lỗi">
                                    <form action="" class="ep_post_write_repcmt" data-type="0" data-cmt_id="` + data.id + `" data-new_id="` + new_id + `" onsubmit="return nv_rep_comment(this);">
                                        <textarea class="ep_post_write_input" type="text" placeholder="Viết bình luận..."></textarea>
                                        <div class="ep_post_write_action">
                                            <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                                            <label for="rep_comment` + data.id + `">
                                                <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                                                <input type="file" onchange="changeImgRepCmt(this,` + data.id + `)" id="rep_comment` + data.id + `" accept="image/*" hidden/>
                                            </label>
                                            <button class="ep_submit_mess">
                                                <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>`;
                        
                    element.parents(".ep_post_detail").find('.ep_post_show_cmt').prepend(html);
                    // chưa biết là để làm gì
                        element.find('.ep_post_write_input').val('');
                        $('#render_img').remove();
                        var input = $('#baiviet_taianh' + new_id);
                        input.replaceWith(input.val('').clone(true));
                        $('#comment' + new_id).val('');
                        var number = $('#number_comment' + new_id).attr('data-value');
                        var count_comment = parseInt(number) + 1;
                        $('#number_comment' + new_id).html((count_comment) + ' Bình luận').attr('data-value', count_comment);
                    // end chưa biết là để làm gì
                } else {
                    var data = resp;
                    var input = $('#baiviet_taianh' + data.id_new);
                    input.replaceWith(input.val('').clone(true));
                    $('#text_comment' + new_id).html(comment);
                    $('#text_comment' + new_id).focus();
                    // $('#text_comment' + new_id).attr('data-value', comment);
                    $('#comment' + data.id_new).val('');
                    $('#form_comment' + data.id_new).attr('data-type', 0);
                    $('#render_img').remove();
                    if (data.img != '') {
                        if ($('#img_cmt' + data.id_cmt).length == 0){
                            $('#text_comment' + new_id).after(`<img class="image_cmt" id="img_cmt` + data.id_cmt + `" src="` + data.img + `" alt="Ảnh lỗi">`);
                        }else{
                            $('#img_cmt' + data.id_cmt).attr("src",data.img);
                        }
                    }else{
                        $('#img_cmt' + data.id_cmt).remove();
                    }
                }
                element.parents(".baiviets-footer").find(".v_no_comment").hide();
                element.find('.see_icon').show();
                element.find('.see_icon1').show();
                element.find('.nut_gui_comment').hide();
                arrImgCmt = [];
            }
        });
    }
    return false;
}



function closeImgCmt(id, e) {
    arrImgCmt = [];
    var el = $(e).parents('.v_comment_active');
    $('#render_img').remove();
    var input = $('#baiviet_taianh' + id);
    input.replaceWith(input.val('').clone(true));
    if (el.find('.v_write_comment').val() == "") {
        el.find('.see_icon').show();
        el.find('.see_icon1').show();
        el.find('.nut_gui_comment').hide();
        el[0].dataset.type = 0;
        el[0].dataset.new_id = el.find('.v_new_id_comment').val();
    }
}

function nv_rep_comment(a) {
    var form_data = new FormData();
    var element = $(a);
    var comment = $(a).find('.ep_post_write_input').val();
    var cmt_id = $(a).attr('data-cmt_id');
    var new_id = $(a).attr('data-new_id');
    var type = $(a).attr('data-type');
    
    var hidden = element.parents(".ep_form_repcmt").prev(".view_cmt_rep").data("hidden");
    var class_op = '';
    if (hidden == 1){
        class_op = ' opacity-0p15';
    }
    var isauthor = element.parents(".ep_post_show_cmt").data("isauthor");
    var is_admin = element.parents(".ep_post_detail").attr("data-is_admin");
    var avatar = $('#v_header_menu .v_header_avatar').attr('src');
    var name = $('#v_header_menu .v_header_user_name').html();

    var url = (type == 0) ? "../ajax/rep_comment_post.php" : "../ajax/comment_post_edit.php";
    if (type == 1) {
        // var avatar = $('#img_cmt' + new_id).attr('src');
        form_data.append('avatar', avatar);
    }
    form_data.append('comment', comment);
    form_data.append('cmt_id', cmt_id);
    form_data.append('new_id', new_id);
    form_data.append('img_comment', img_rep_cmt[0]);
    if (comment != "" || img_rep_cmt.length > 0 || avatar) {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (data) {
                $(a).parents(".ep_form_repcmt").css({
                    'display': 'none'
                });
                if (type == 0) {
                    element.parents('.ep_post_detail').find('.ep_post_count_like .count_comment').text(data.html.count_comment);
                    element.find('.ep_post_write_input').val('');
                    element.find('.see_icon').show();
                    element.find('.see_icon1').show();
                    element.find('.nut_gui_comment').hide();
                    html = `<div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt` + class_op + `" src="` + data.html.avatar + `" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
                                <div class="ep_show_cmt_content">
                                    <div class="ep_show_cmt_content_detail` + class_op + `">
                                        <p class="ep_show_cmt_username">` + data.html.name + `</p>
                                        <p class="ep_show_cnt_item" id="text_comment` + data.html.id + `">` + data.html.comment.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2') + `</p>`;
                    if (data.html.img != '') {
                        html += `<img class="image_cmt" id="img_cmt` + data.html.id + `" src="` + data.html.img + `" alt="Ảnh lỗi">`;
                    }
                    html += `</div>
                            <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                            <div class="popup_action_cmt">
                            <div class="popup_action_cmt_detail" onclick="edit_comment(` + data.html.id + `,` + cmt_id + `,1)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                        alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>`;
                    if (isauthor == 1 || is_admin == 1){
                        if (hidden == 1){
                            html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmt(this,` + data.html.id + `,` + cmt_id + `)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi">
                                    Hiển thị bình luận
                                </div>`;
                        }else{
                            html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmt(this,` + data.html.id + `,` + cmt_id + `)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                                    Ẩn bình luận
                                </div>`;
                        }
                    }
                    html += `<div class="popup_action_cmt_detail" onclick="deleteCmt(this,` + data.html.id + `)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>`;

                    html += `</div>
                                <div class="ep_show_cmt_action2">
                                    <button data-type="0" class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment(this,` + data.html.id + `)">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">` + data.html.time_active + `</button>
                                    <div class="ep_show_cmt_action2_count_like">
                                        <img class="ep_show_cmt_action2_count_like_icon" src="../img/like_btn.svg" alt="Ảnh lỗi">
                                        <span class="number_count_like">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                    element.find('.ep_post_write_input').val('');
                    $('#render_img').remove();
                    var input = $('#rep_comment' + cmt_id);
                    input.replaceWith(input.val('').clone(true));
                    $(a).parents(".ep_show_repcmt").prepend(html);
                    var number = $('#number_comment' + new_id).data('value');
                    var input = $('#rep_comment' + cmt_id);
                    input.replaceWith(input.val('').clone(true));
                    // $('#cmt-binhluan' + data.cmt_id).append(html);
                } else {
                    var input = $('#rep_comment' + data.id_new);
                    input.replaceWith(input.val('').clone(true));
                    $('#text_comment' + new_id).html(comment.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2'));
                    $('#text_comment' + new_id).focus();
                    // $('#text_comment' + new_id).attr('data-value', comment);
                    $('#comment' + cmt_id).val('');
                    $('#form_comment' + cmt_id).attr('data-type', 0);
                    $('#form_comment' + cmt_id).attr('data-new_id', data.id_new);
                    $('.render_img').remove();
                    if (data.img == '') {
                        $('#img_cmt' + new_id).remove();
                    } else {
                        if ($('#img_cmt' + new_id).length > 0){
                            $('#img_cmt' + new_id).attr("src",data.img);
                        }else{
                            $('#text_comment' + new_id).after(`<img class="image_cmt" id="img_cmt` + new_id + `" src="` + data.img + `" alt="Ảnh lỗi">`);
                        }
                    }
                }
                img_rep_cmt = [];
            }
        });
    }
    return false;
}

function changeImgRepCmt(input, id) {
    var el = $(input).parents('.container-cmt');
    if (input.files && input.files[0]) {
        var reader = new FileReader(),
            extension = input.files[0].name.split("."),
            extension = extension[extension.length - 1].toLowerCase();
        if ($.inArray(extension,allow_exten) >= 0){
            if (input.files[0].type.match("image/*") != null) {
                if (input.files[0].size <= 5242880){
                    img_rep_cmt = [];
                    img_rep_cmt.push(input.files[0]);
                    $('#render_img').remove();
                    $(input).parents('.ep_post_write_repcmt').append(`
                        <div class="render_img" id="render_img">
                        <img src=" " class="render_img_item1" id="avatar` + id + `" alt="">
                        <div class="img_close" onclick="close_img_rep_cmt(` + id + `,this);">
                        <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
                        </div>
                        </div>
                        `); 
                    reader.onload = function (e) {
                        $('#avatar' + id).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    el.find('.see_icon').hide();
                    el.find('.see_icon1').hide();
                    el.find('.nut_gui_comment').show();
                } else {
                    alert("Ảnh chỉ giới hạn 5MB");
                }
            } else {
                alert("Chỉ có thể chọn ảnh để bình luận");
            }
        } else {
                alert("Chỉ có thể chọn ảnh để bình luận");
        }
    }
}

function close_img_rep_cmt(id, e) {
    var el = $(e).parents('.view_rep_cmt').prev();
    img_rep_cmt = [];
    $('#render_img').remove();
    var input = $('#rep_comment' + id);
    input.replaceWith(input.val('').clone(true));
    if (el.find('.ep_post_write_input').val() == "") {
        el.find('.see_icon').show();
        el.find('.see_icon1').show();
        el.find('.nut_gui_comment').hide();
        el[0].dataset.type = 0;
        el[0].dataset.new_id = el.find('.id_new_rep_comment').val();
    }
}

function moreCmt(new_id){
    var el = $(event.target);
    var page = el.prevAll(".ep_post_show_cmt_detail").length;
    $.ajax({
        url: "/ajax/show_more_comment.php",
        type: 'POST',
        dataType: 'json',
        data: {
            new_id: new_id,
            page: page
        },
        success: function (data) {
            if (data.result == true){
                $(data.data).insertBefore(el);
                if (data.count_cmt <= 0){
                    el.hide();
                }
            }
        }
    });
}

function hideCmtAlbum(element,cmt_id){
    var el = $(element).parents(".ep_post_show_cmt_detail");
    $.ajax({
        url: "/ajax/show_hide_comment_album.php",
        type: 'POST',
        dataType: 'json',
        data: {
            cmt_id: cmt_id,
        },
        success: function (data) {
            if (data.result == true){
                if ($(".view_cmt_rep"+cmt_id).attr("data-hidden") == 1){
                    $(element).html(`<img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi"> Ẩn bình luận`);
                }else{
                    $(element).html(`<img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi"> Hiện bình luận`);
                }
                $(".view_cmt_rep"+cmt_id).attr("data-hidden",1 - parseInt($(".view_cmt_rep"+cmt_id).attr("data-hidden")));
                // bình luận
                el.find(".ep_show_cmt_content").find(".ep_show_cmt_content_detail").eq(0).toggleClass('opacity-0p15');
                el.find(".ep_show_cmt_avt").eq(0).toggleClass('opacity-0p15');
                // trả lời bình luận
                el.find(".ep_show_repcmt_detail[data-hidden=0] .ep_show_cmt_content_detail").toggleClass('opacity-0p15');
                el.find(".ep_show_repcmt_detail[data-hidden=0] .ep_show_cmt_avt").toggleClass('opacity-0p15');
            }
        }
    });
}

function hideRepCmt(element,cmt_id,cmt_parent_id){
    var el = $(element).parents(".ep_show_repcmt_detail");
    $.ajax({
        url: "/ajax/show_hide_comment.php",
        type: 'POST',
        dataType: 'json',
        data: {
            cmt_id: cmt_id,
        },
        success: function (data) {
            if (data.result == true){
                el.attr("data-hidden",1 - parseInt(el.attr("data-hidden")));
                if (el.attr("data-hidden") == 0){
                    $(element).html(`<img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi"> Ẩn bình luận`);
                }else{
                    $(element).html(`<img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi"> Hiện bình luận`);
                }
                if ($(".view_cmt_rep"+cmt_parent_id).attr("data-hidden") == 0){
                    el.find(".ep_show_cmt_content").find(".ep_show_cmt_content_detail").toggleClass('opacity-0p15');
                    el.find(".ep_show_cmt_avt").toggleClass('opacity-0p15');
                }
            }
        }
    });
}

function hideRepCmtAlbum(element,cmt_id,cmt_parent_id){
    var el = $(element).parents(".ep_show_repcmt_detail");
    $.ajax({
        url: "/ajax/show_hide_comment_album.php",
        type: 'POST',
        dataType: 'json',
        data: {
            cmt_id: cmt_id,
        },
        success: function (data) {
            if (data.result == true){
                el.attr("data-hidden",1 - parseInt(el.attr("data-hidden")));
                if (el.attr("data-hidden") == 0){
                    $(element).html(`<img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi"> Ẩn bình luận`);
                }else{
                    $(element).html(`<img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi"> Hiện bình luận`);
                }
                if ($(".view_cmt_rep"+cmt_parent_id).attr("data-hidden") == 0){
                    el.find(".ep_show_cmt_content").find(".ep_show_cmt_content_detail").toggleClass('opacity-0p15');
                    el.find(".ep_show_cmt_avt").toggleClass('opacity-0p15');
                }
            }
        }
    });
}

function deleteCmtAlbum(element,cmt_id){
    var r = confirm("Bạn chắc chắn muốn xóa bình luận này?");
    if (r == true){
        $.ajax({
            url: "/ajax/delete_comment_album.php",
            type: 'POST',
            dataType: 'json',
            data: {
                cmt_id: cmt_id,
            },
            success: function (data) {
                if (data.result == true){
                    if ($(element).parents(".ep_show_repcmt_detail").length > 0){
                        $(element).parents(".ep_show_repcmt_detail").remove();
                    }else{
                        $(element).parents(".ep_post_show_cmt_detail").remove();
                    }
                }
            }
        });
    }
}

function share_now(new_id,new_content_id,album_id=0,gr_id=0){
    var el = $(event.target);
    var form_data = new FormData();
    // content
    form_data.append('new_id_parents', new_id);
    form_data.append('new_id_share_content', new_content_id);
    form_data.append('album_id', album_id);
    form_data.append('gr_id', gr_id);

    $.ajax({
        type: "POST",
        url: "../ajax/update_work.php",
        data: form_data,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            // $(".post_new_btn_submit").prop("disabled",true);
            // $(".post_new_btn_submit").html("Đang đăng");
        },
        success: function (data) {
            if (data.result == false) {
                alert(data.msg);
            }else{
                alert("Chia sẻ thành công");
                // location.reload();
            }
        },
        complete: function(data){
            alert("Chia sẻ thành công");
            el.parents(".ep_post_popup_share").slideUp();
        }
    });
}

function share_album_now(album_id,new_id=0){
    var form_data = new FormData();
    // content
    form_data.append('new_id', new_id);
    form_data.append('album_id', album_id);

    $.ajax({
        type: "POST",
        url: "../ajax/share_album.php",
        data: form_data,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.result == true) {
                location.reload();
            }
        }
    });
}

function like_comment_album(e,id) {
    var queryString = window.location.href;
    queryString = queryString.split("/");
    queryString = queryString[queryString.length - 1].split("-");
    var album_id = queryString[queryString.length - 1].slice(1);
    $.ajax({
        url: '../ajax/like_comment_album.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            album_id: album_id,
        },
        success: function(data) {
            if (data.result == true) {
                $(e).attr('data-type', 1);
                $(e).parents(".ep_show_cmt_action2").find(".number_count_like").text(data.num_like_cmt);
            } else if (data.result == false) {
                $(e).attr('data-type', 0);
                $(e).parents(".ep_show_cmt_action2").find(".number_count_like").text(data.num_like_cmt);
            }
        }
    });
}

function comment_album(e) {
    var element = $(e);
    var type = element.attr('data-type');
    var cmt_id = element.attr('data-new_id');
    var form_data = new FormData();
    var url = (type == 0) ? "../ajax/comment_album.php" : "../ajax/comment_album.php";

    var comment = element.find('.ep_post_write_input').val().trim();
    var queryString = window.location.href;
    queryString = queryString.split("/");
    queryString = queryString[queryString.length - 1].split("-");
    var album_id = queryString[queryString.length - 1].slice(1);
    var avatar = $('#v_header_menu .v_header_avatar').attr('src');
    var name = $('#v_header_menu .v_header_user_name').html();
    var isauthor = element.parents(".ep_post_show_cmt_detail").next(".ep_post_show_cmt").data("isauthor");

    name = $.trim(name);

    form_data.append('comment', comment);
    form_data.append('avatar', avatar);
    form_data.append('album_id', album_id);
    form_data.append('cmt_id', cmt_id);
    if (type == 0){
        form_data.append('img_comment', arrImgCmt[0]);
    }else if (arrImgCmt.length > 0){
        form_data.append('img_comment', arrImgCmt[0]);
    }else{
        form_data.append('avatar', $("#avatar" + cmt_id).attr("src"));
    }
    var check = true;
    if (type == 0) {
        if (comment == "" && arrImgCmt.length == 0) {
            check = false;
        }   
    }else if (type == 1) {
        if (comment == "" && $(e).find(".render_img").length == 0) {
            check = false;
        }
    }
    if (check == true) {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (resp) {
                comment = comment.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                if (type == 0) {
                    var data = resp.data;
                    element.parents('.ep_post_detail').find('.ep_post_count_like .count_comment').text(data.count_comment);
                    html = `<div class="ep_post_show_cmt_detail">
                                <img class="ep_show_cmt_avt" src="` + data.avatar + `" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
                                <div class="ep_show_cmt_content">
                                    <div class="ep_show_cmt_content_detail">
                                        <p class="ep_show_cmt_username">` + data.name + `</p>
                                        <p class="ep_show_cnt_item" id="text_comment` + data.id + `">` + comment + `</p>`;

                    if (data.img != '') {
                        html += `<img class="image_cmt" id="img_cmt` + data.id + `" src="` + data.img + `" alt="Ảnh lỗi">`;
                    }
                    html += `</div>
                            <!-- chức năng quản lý bình luận -->`;
                    if (data.avatar_login != ''){
                        html += `<img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">`;
                    }
                    html += `<div class="popup_action_cmt">
                                <div class="popup_action_cmt_detail" onclick="edit_comment(` + data.id + `,` + cmt_id + `,0)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg" alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>`;
                    if (isauthor == 1){
                        html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideCmtAlbum(this,` + data.id + `)">
                                <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                                Ẩn bình luận
                            </div>`;
                    }

                    html += `<div class="popup_action_cmt_detail" onclick="deleteCmtAlbum(this,` + data.id + `)">
                                        <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                            alt="Ảnh lỗi">
                                        Xóa bình luận
                                    </div>
                                </div>
                                <!-- chức năng tương tác với bình luận / thống kê thời gian, tương tác -->
                                <div class="ep_show_cmt_action2">
                                    <button  data-type="0" class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment_album(this,` + data.id + `)">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_rep">Trả lời . </button>
                                    <button class="ep_show_cmt_action2_btn">` + data.time_active + `</button>
                                    <div class="ep_show_cmt_action2_count_like">
                                        <img class="ep_show_cmt_action2_count_like_icon" src="../img/like_btn.svg" alt="Ảnh lỗi">
                                        <span class="number_count_like">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- danh sách trả lời bình luận -->
                            <div class="ep_show_repcmt">
                                <!-- form trả lời bình luận -->
                                <div class="ep_form_repcmt">
                                    <img class="ep_post_write_avt" src="` + data.avatar + `" alt="Ảnh lỗi">
                                    <form action="" class="ep_post_write_repcmt" data-type="0" data-cmt_id="` + data.id + `" onsubmit="return rep_comment_album(this);">
                                        <textarea class="ep_post_write_input" type="text" placeholder="Viết bình luận..."></textarea>
                                        <div class="ep_post_write_action">
                                            <img class="ep_post_write_action_deatail" src="../img/ep_post_icon_feel.svg" alt="Ảnh lỗi">
                                            <label for="rep_comment` + data.id + `">
                                                <img class="ep_post_write_action_deatail" src="../img/ep_post_write_img.svg" alt="Ảnh lỗi">
                                                <input type="file" onchange="changeImgRepCmt(this,` + data.id + `)" id="rep_comment` + data.id + `" accept="image/*" hidden/>
                                            </label>
                                            <button class="ep_submit_mess">
                                                <img src="../img/v_gui_comment.svg" alt="Ảnh lỗi">
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>`;
                        
                    element.parents(".ep_post_show_cmt_detail").next('.ep_post_show_cmt').prepend(html);
                    // chưa biết là để làm gì
                        element.find('.ep_post_write_input').val('');
                        $('#render_img').remove();
                        var input = $('#baiviet_taianh0');
                        input.replaceWith(input.val('').clone(true));
                        $('#comment0').val('');
                        var number = $('#number_comment0').attr('data-value');
                        var count_comment = parseInt(number) + 1;
                        $('#number_comment0').html((count_comment) + ' Bình luận').attr('data-value', count_comment);
                    // end chưa biết là để làm gì
                } else {
                    var data = resp.data;
                    var input = $('#baiviet_taianh0');
                    input.replaceWith(input.val('').clone(true));
                    $('#text_comment' + cmt_id).html(comment);
                    $('#text_comment' + cmt_id).focus();
                    $('#comment0').val('');
                    $('#form_comment0').attr('data-type', 0);
                    $('#render_img').remove();
                    if (data.img != '') {
                        $('#img_cmt' + cmt_id).attr("src",data.img);
                    }else{
                        $('#img_cmt' + cmt_id).remove();
                    }
                }
                element.parents(".baiviets-footer").find(".v_no_comment").hide();
                element.find('.see_icon').show();
                element.find('.see_icon1').show();
                element.find('.nut_gui_comment').hide();
                arrImgCmt = [];
            }
        });
    }
    return false;
}

function rep_comment_album(a) {
    var form_data = new FormData();
    var element = $(a);
    var comment = $(a).find('.ep_post_write_input').val();
    var cmt_id = $(a).attr('data-cmt_id');
    var new_id = $(a).attr('data-new_id');
    var type = $(a).attr('data-type');

    var queryString = window.location.href;
    queryString = queryString.split("/");
    queryString = queryString[queryString.length - 1].split("-");
    var album_id = queryString[queryString.length - 1].slice(1);
    
    var hidden = element.parents(".ep_form_repcmt").prev(".view_cmt_rep").data("hidden");
    var class_op = '';
    if (hidden == 1){
        class_op = ' opacity-0p15';
    }
    var isauthor = element.parents(".ep_post_show_cmt").data("isauthor");
    var avatar = $('#v_header_menu .v_header_avatar').attr('src');
    var name = $('#v_header_menu .v_header_user_name').html();

    var url = (type == 0) ? "../ajax/rep_comment_album.php" : "../ajax/rep_comment_album.php";
    if (type == 1) {
        // var avatar = $('#img_cmt' + new_id).attr('src');
        form_data.append('oldimg_comment', $("#img_cmt"+cmt_id).attr("src"));
    }
    form_data.append('comment', comment);
    form_data.append('parent_id', cmt_id);
    if (type == 1){
        form_data.append('cmt_id', new_id);
    }
    form_data.append('album_id', album_id);
    form_data.append('img_comment', img_rep_cmt[0]);
    if (comment != "" || img_rep_cmt.length > 0 || $("#img_cmt"+cmt_id).attr("src")) {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (data) {
                $(a).parents(".ep_form_repcmt").css({
                    'display': 'none'
                });
                comment = comment.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                if (type == 0) {
                    element.parents('.ep_post_detail').find('.ep_post_count_like .count_comment').text(data.data.count_comment);
                    element.find('.ep_post_write_input').val('');
                    element.find('.see_icon').show();
                    element.find('.see_icon1').show();
                    element.find('.nut_gui_comment').hide();
                    html = `<div class="ep_show_repcmt_detail">
                            <img class="ep_show_cmt_avt` + class_op + `" src="` + data.data.avatar + `" alt="Ảnh lỗi" onerror="this.src="/img/logo_com.png";">
                                <div class="ep_show_cmt_content">
                                    <div class="ep_show_cmt_content_detail` + class_op + `">
                                        <p class="ep_show_cmt_username">` + data.data.name + `</p>
                                        <p class="ep_show_cnt_item" id="text_comment` + data.data.id + `">` + comment + `</p>`;
                    if (data.data.img != '') {
                        html += `<img class="image_cmt" id="img_cmt` + data.data.id + `" src="` + data.data.img + `" alt="Ảnh lỗi">`;
                    }
                    html += `</div>
                            <img class="ep_show_cmt_action" src="../img/ep_post_more.svg" alt="Ảnh lỗi">
                            <div class="popup_action_cmt">
                            <div class="popup_action_cmt_detail" onclick="edit_comment(` + data.data.id + `,` + cmt_id + `,1)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_edit_cmt.svg"
                                        alt="Ảnh lỗi">
                                    Chỉnh sửa bình luận
                                </div>`;
                    if (isauthor == 1){
                        if (hidden == 1){
                            html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmtAlbum(this,` + data.data.id + `,` + cmt_id + `)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt.svg" alt="Ảnh lỗi">
                                    Hiển thị bình luận
                                </div>`;
                        }else{
                            html += `<div class="popup_action_cmt_detail popup_action_cmt_detail_hide" onclick="hideRepCmtAlbum(this,` + data.data.id + `,` + cmt_id + `)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_hide_cmt.svg" alt="Ảnh lỗi">
                                    Ẩn bình luận
                                </div>`;
                        }
                    }
                    html += `<div class="popup_action_cmt_detail" onclick="deleteCmtAlbum(this,` + data.data.id + `)">
                                    <img class="popup_action_cmt_detail_img" src="../img/ep_show_cmt_del.svg"
                                        alt="Ảnh lỗi">
                                    Xóa bình luận
                                </div>`;

                    html += `</div>
                                <div class="ep_show_cmt_action2">
                                    <button data-type="0" class="ep_show_cmt_action2_btn ep_show_cmt_action2_btn_like" onclick="like_comment_album(this,` + data.data.id + `)">Thích . </button>
                                    <button class="ep_show_cmt_action2_btn ep_show_repcmt_time">` + data.data.time_active + `</button>
                                    <div class="ep_show_cmt_action2_count_like">
                                        <img class="ep_show_cmt_action2_count_like_icon" src="../img/like_btn.svg" alt="Ảnh lỗi">
                                        <span class="number_count_like">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                    element.find('.ep_post_write_input').val('');
                    $('#render_img').remove();
                    var input = $('#rep_comment' + cmt_id);
                    input.replaceWith(input.val('').clone(true));
                    console.log(html);
                    element.parents(".ep_show_repcmt").prepend(html);
                    var number = $('#number_comment' + new_id).data('value');
                    var input = $('#rep_comment' + cmt_id);
                    input.replaceWith(input.val('').clone(true));
                    // $('#cmt-binhluan' + data.cmt_id).append(html);
                } else {
                    var input = $('#rep_comment' + data.data.id_new);
                    input.replaceWith(input.val('').clone(true));
                    $('#text_comment' + new_id).html(comment);
                    $('#text_comment' + new_id).focus();
                    // $('#text_comment' + new_id).attr('data-value', comment);
                    $('#comment' + cmt_id).val('');
                    $('#form_comment' + cmt_id).attr('data-type', 0);
                    $('#form_comment' + cmt_id).attr('data-new_id', data.data.id_new);
                    $('.render_img').remove();
                    if (data.data.img == '') {
                        $('#img_cmt' + new_id).remove();
                    }else if ($('#img_cmt' + new_id).length > 0){
                        $('#img_cmt' + new_id).attr("src",data.data.img);
                    }else{
                        $('#text_comment' + new_id).after(`<img class="image_cmt" id="img_cmt"` + new_id + ` src="` + data.data.img + `" alt="Ảnh lỗi">`);
                    }
                }
                img_rep_cmt = [];
            }
        });
    }
    return false;
}




// $(".ep_show_cmt_action2_btn_like").click(function () {
//     var count = $(this).parents(".ep_show_cmt_action2").find(".number_count_like").text().trim();
//     count = Number(count);
//     if ($(this)[0].dataset.type == 0) {
//         $(this).css({
//             'color': '#4C5BD4'
//         });
//         $(this)[0].dataset.type = 1;
//         count = count + 1;
//         $(this).parents(".ep_show_cmt_action2").find(".number_count_like").text(count);
//     } else if ($(this)[0].dataset.type == 1) {
//         $(this).css({
//             'color': '#474747'
//         });
//         $(this)[0].dataset.type = 0;
//         count = count - 1;
//         $(this).parents(".ep_show_cmt_action2").find(".number_count_like").text(count);
//     }
// });

function luu_bai_viet(post_id){
    var id_post = post_id;
    $('.save_success_xong').attr("data-id-new", id_post);
    $(".save_post").show();
}


$(".save_success_xong").click(function(){
    var id_posts = $(this).attr('data-id-new'); 
    var id_collection = $(".save_post_radio:checked").val();
    var name_collection = $(".save_post_radio:checked").prev().text();
    var btn_save = $(".ep_post_detail[data-new_id="+id_posts+"] .btn_save_post");

    $.ajax({
        url: "../ajax/save_post.php",
        type: "POST",
        dataType: 'json',
        data: {
            id_posts:id_posts,
            id_collection:id_collection,
        },
        success: function(data){
            if(data.result == true){
                alert("Lưu bài viết thành công");
                btn_save.after(`<div class="ep_post_action1_deatail remove_save_post" data="`+id_posts+`">
                    <img src="/img/ep_post_no_save.svg" alt="Ảnh lỗi">
                    <span class="ep_post_action1_deatail_text">Bỏ lưu bài viết</span>
                </div>`);
                btn_save.remove();
                $(".save_post").hide();
                $(".save_post [name=save_post_radio]").each(function(){
                    $(this).prop("checked",false);
                });
            }else{
                alert(data.msg);                    
            }
        }
    });
});

// Ẩn bài viết
function click_hide_posts(id_post){
    var post = $(".ep_post_detail[data-new_id="+id_post+"]");
    $.ajax({
        url:'../ajax/hide_posts.php',
        type: 'POST',
        data:{id_post_hide:id_post},
        success: function(data){
            if (data == "") {
                if (post.parents('.box_contain_list_post').length) { // ẩn bài viết ở mục nội dung của bạn
                    post.addClass('box_hide_post').append(`
                        <div class="box_hoantac_post_hide">
                            <button class="btn_hoantac_post_hide hoan_tac" data-post=`+id_post+`>Bài viết đã bị ẩn, nhấn để hoàn tác</button>
                        </div>
                    `);
                    post.find('.box_list_action_post .btn_hide_posts').attr("hidden",true);
                } else {
                    post.after(`<div class="ep_post_hide">
                        <button class="ep_post_item_btn hoan_tac" data-post=`+id_post+`>Hoàn tác</button>
                        <div class="ep_post_item">
                            <img class="ep_post_item_icon" src="../img/an-bai-viet.svg" alt="Ảnh lỗi">
                            <div class="ep_post_hide_action">
                                <p class="ep_post_hide_title">Đã ẩn bài viết</p>
                                <p class="ep_post_hide_content fig_text_4-1">Bạn sẽ không nhìn thấy bài viết này trên bảng tin</p>
                            </div>
                        </div>
                        <div class="ep_post_item">
                            <img class="ep_post_item_icon" src="../img/tim-ho-tro.svg" alt="Ảnh lỗi">
                            <div class="ep_post_hide_action">
                                <p class="ep_post_hide_title">Tìm hỗ trợ hoặc báo cáo bài viết</p>
                                <p class="ep_post_hide_content">Tôi lo ngại về bài viết này</p>
                            </div>
                        </div>
                    </div>`);
                    post.hide();
                }
            }else{
                alert('Có lỗi xảy ra');
            }
        }
    });
}

// Hoàn tác ẩn bài viết
$(document).on('click', '.hoan_tac', function() { 
    var id_post_hide = $(this).attr('data-post');
    var post = $(".ep_post_detail[data-new_id="+id_post_hide+"]");
    $.ajax({
        url:'../ajax/hoan_tac_posts.php',
        type: 'POST',
        data:{id_post_hide:id_post_hide},
        success: function(data){
            if (data == "") {
                if (post.parents('.box_contain_list_post').length) { // hoàn tác bài bị ẩn ở mục nội dung của bạn
                    post.removeClass('box_hide_post');
                    post.find('.box_hoantac_post_hide').remove();
                    post.find('.box_list_action_post .btn_hide_posts').removeAttr("hidden");
                } else {
                    alert("Hoàn tác thành công");
                    post.show();
                    post.next().remove();
                }
            }else{
                alert('Có lỗi xảy ra');
            }
        }
    });
});

$(".popup_success_btn").click(function(){
    window.location.reload();
});


// Show POPUP Notify on

function popup_notify_on(id_post){
    var pic_id_post = id_post;
    $(".btn_turnon_notify").attr('data-id', pic_id_post);
    $(".turnon_notify").show();
}

function resetFormPost(){
    $(".form_popup_post_new").data("update",0);
    $(".popup_post_new .post_share").remove();
    $(".popup_post_new .form_post_new_content").val("");
    $(".popup_post_new .info_post_feel").html("");
    $(".popup_post_new .info_post_with").html("");
    $(".popup_post_new .info_post_at").html("");
    $(".popup_post_new").find(".title_post_new").text("Đăng tin mới");
    $(".popup_post_new .ep_post_time").hide();
    $(".popup_post_new .btn_upload_regime").show();
    // reset file
    arr_old_file = [];
    arr_old_file_name = [];
    arr_old_img = [];
    arr_old_img_name = [];
    arr_image_video = [];
    arr_file = [];
    $(".upload_file").find(".qttt_add_file").remove();
    $(".upload_file").find(".add_upload_file").remove();
    $(".upload_file").find(".add_upload_img").remove();
    $(".upload_file").find(".upload_file_item").show();
    $(".close_upload_file").show();
    $(".upload_file").css({
        'border': '1px solid #999999',
        'border-radius' : '10px',
    });
    $(".close_upload_file").click();
    // reset tag
    $(".name_metion .mention_detail_box_item_del").each(function(){
        $(this).click();
    });
    $(".add_new_post_mention").css({
        'background' : 'none'
    });
    // reset cảm xúc hoạt động
    $(".p_feel .feel_item_active").click();
    $(".p_feel .activity_item_active").click();
    // reset location
    $(".popup_location .at_location_item .at_location_checkbox:checked").parents(".at_location_item").click();
    // reset view mode
    $("[name=regime_select][value=0]").click();
}
// ============================ BÌNH ================================
// Thả cảm xúc bài viết nhanh
function like_post(element,new_id){
    if ($(element).find('.txt_react').hasClass('active')) {
        // Xóa cảm xúc
        let react = handle.reaction(new_id, 0, 1);
        if (react.result) {
            let list_react = handle.get_list_reaction(new_id)
                html_react = render.render_reaction(list_react);
            $(element).parents(".ep_post_action").prev().find('.ep_post_sum_like').html(html_react);
            $(element).html(render.render_icon_react());
        } else {
            alert(react.msg);
        }
    } else {
        // Bày tỏ cảm xúc nhanh
        let react = handle.reaction(new_id, 1, 0);
        if (react.result) {
            let list_react = handle.get_list_reaction(new_id)
                html_react = render.render_reaction(list_react);
            $(element).parents(".ep_post_action").prev().find('.ep_post_sum_like').html(html_react);
            $(element).html(render.render_icon_react(1));
        } else {
            alert(react.msg);
        }
    }  
}
// thả chi tiết cảm xúc 
$(document).on('click', '.action_react_detail button', function() { 
    $(this).parents('.list_icon_cxuc').css('display', 'none');
    let react_type = $(this).attr('data-react');
    //bình luận
    if ($(this).parents('.list_cmt_parent').length) {
        // bình luận con
        if ($(this).parents('.cmt_child_item').length) {
            class_parent = '.cmt_child_item';
        }
        // bình luận cha 
        else {
            class_parent = '.cmt_parent_item';
        }
        let cmt_id = $(this).parents(class_parent).attr('data-idcmt'),
            react = handle.reaction_comment(cmt_id, react_type, 0);
        if (react.result) { 
            let list_react = handle.get_list_reaction_cmt(cmt_id),
                html_react = render.render_react_cmt(list_react);
            $(this).parents('.ep_show_cmt_action2').find('.box_reaction_cmt').html(html_react);
            $(this).parents('.box_hover_react_cmt').find('.btn_action_react').remove();
            $(this).parents('.box_hover_react_cmt').prepend(render.render_icon_react_cmt(cmt_id, react_type));
        } else {
            alert(react.msg);
        }
    } 
    // bài viết
    else {
        let new_id = $(this).parents('.ep_post_detail').attr('data-new_id'),
            react = handle.reaction(new_id, react_type, 0);
        if (react.result) {
            let list_react = handle.get_list_reaction(new_id)
                html_react = render.render_reaction(list_react);
            $(this).parents(".ep_post_action").prev().find('.ep_post_sum_like').html(html_react);
            $(this).parents('.box_hover_reaction').find('.btn_action_react').html(render.render_icon_react(react_type));
        } else {
            alert(react.msg);
        } 
    }
});
// Hover lấy danh sách thả cảm xúc bài viết  
$(document).on({
    mouseenter: function() {
        let new_id = $(this).attr('data-new_id'),
            icon_type = '';
        if ($(this).hasClass('btn_hover_icon_react')) {
            icon_type = $(this).attr('data-icon_type');
        }
        let list_react = handle.get_list_reaction(new_id, icon_type),
            render_box_user_react = render.render_box_user(list_react, (icon_type) ? (render.get_reaction(icon_type)).text : 'Tất cả');
        $(this).append(render_box_user_react);
    },
    mouseleave: function() {
        $(this).find('.contain_hover_box').remove();
    }
}, ".box_reaction, .btn_hover_icon_react");

// Hover lấy danh sách user share bài viết  
$(document).on({
    mouseenter: function() {
        let new_id = $(this).attr('data-new_id'),
            list_share = handle.get_list_user_share(new_id),
            render_box_user_share = render.render_box_user(list_share, 'Chia sẻ');
        $(this).append(render_box_user_share);
    },
    mouseleave: function() {
        $(this).find('.contain_hover_box').remove();
    }
}, ".box_share");
// Hover lấy danh sách user cmt bài viết  
$(document).on({
    mouseenter: function() {
        let new_id = $(this).attr('data-new_id'),
            list_user_cmt = handle.get_list_user_comment(new_id);
            render_box_user_cmt = render.render_box_user(list_user_cmt, 'Bình luận');
        $(this).append(render_box_user_cmt);
    },
    mouseleave: function() {
        $(this).find('.contain_hover_box').remove();
    }
}, ".box_comment");
// xem thêm bình luận cha
$(document).on('click', '.btn_view_cmt', function() { 
    let list_comment_loaded = [],
        el_news = $(this).parents('.ep_post_detail');
    el_news.find('.cmt_parent_item').each(function() {
        let id = $(this).attr('data-idcmt');
        if (id) {
            list_comment_loaded.push(id);
        }
    });
    let new_id = el_news.attr('data-new_id'),
        list_comment = handle.get_list_comment(new_id, 0, list_comment_loaded, $(this)),
        list_comment_parent = list_comment.list_comment,
        html_list_comment = render.render_list_comment(list_comment_parent, el_news);

    el_news.find('.list_cmt_parent').prepend(html_list_comment);
    render.see_more_content_post();
    if (el_news.find('.cmt_parent_item').length >= list_comment.count_list_comment) {
        $(this).css('display', 'none');
    } 
});
// xem thêm bình luận con
$(document).on('click', '.btn_view_cmt_child', function() {
    let id_cmt_parent = $(this).parents('.cmt_parent_item').attr('data-idcmt'),
        list_comment_loaded = [],
        el_news = $(this).parents('.ep_post_detail');
    $(`.cmt_parent_item[data-idcmt="${id_cmt_parent}"] .cmt_child_item`).each(function() {
        let id = $(this).attr('data-idcmt');
        if (id) {
            list_comment_loaded.push(id);
        }
    });
    let new_id = el_news.attr('data-new_id'),
        list_comment = handle.get_list_comment(new_id, id_cmt_parent, list_comment_loaded, $(this)),
        list_comment_child = list_comment.list_comment,
        info_comment_parent = handle.get_info_comment(id_cmt_parent),
        html_list_reply = render.render_list_comment_child(info_comment_parent, list_comment_child, el_news);

    $(`.cmt_parent_item[data-idcmt="${id_cmt_parent}"]`).find('.content_cmt_child').prepend(html_list_reply);
    render.see_more_content_post();
    if ($(`.cmt_parent_item[data-idcmt="${id_cmt_parent}"] .content_cmt_child .cmt_child_item`).length >= list_comment.count_list_comment) {
        $(this).css('display', 'none');
    }
});
// bật input file để chọn ảnh cmt
$(document).on('click', '.icon_img_cmt', function() {
    $(this).parents('.box_choose_file_cmt').find('.file_img_cmt').click();
});
// chọn ảnh để bình luận
function changeImgCmt(input) {
    var el = $(input).parents('.v_comment_active'),
        new_id = $(input).parents('.ep_post_detail').attr('data-new_id');
    if (input.files && input.files[0]) {
        var reader = new FileReader(),
            extension = input.files[0].name.split("."),
            extension = extension[extension.length - 1].toLowerCase();
        if ($.inArray(extension,allow_exten) >= 0){
            if (input.files[0].type.match("image/*") != null) {
                if (input.files[0].size <= 5242880){
                    arrImgCmt = [];
                    arrImgCmt.push(input.files[0]);
                    $('#render_img').remove();

                    let html_progress = `
                    <div class="div_tientrinh">
                        <progress max="100" value="1" class="load_img_progress"></progress>
                        <button type="button" class="remove_file_progress">+</button>
                    </div>`;
                    let el_box = $(input).parents('.box_comment_submit');
                    el_box.find('.box_render_img_cmt').append(html_progress);
                    reader.addEventListener("progress", (event) => {
                        const { loaded, total } = event;
                        if (loaded && total) {
                            const percent = Math.round((loaded / total) * 100);
                            el_box.find('.load_img_progress').attr('value', percent);
                        }
                    });
                    reader.onload = function (e) {
                        let html_file = `
                            <div class="render_img" id="render_img">
                                <img src="${e.target.result}" class="render_img_item1" id="avatar` + new_id + `" alt="">
                                <div class="img_close remove_file_cmt">
                                    <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
                                </div>
                            </div>
                        `;
                        el_box.find('.box_render_img_cmt').append(html_file);
                        el_box.find('.box_render_img_cmt .div_tientrinh').remove();
                    }
                    reader.readAsDataURL(input.files[0]);
                    var input = $('#open_file_newfeed');
                    input.replaceWith(input.val('').clone(true));
                    el.find('.see_icon').hide();
                    el.find('.see_icon1').hide();
                    el.find('.nut_gui_comment').show();
                } else {
                    alert("Ảnh chỉ giới hạn 5MB");
                }
            } else {
                alert("Chỉ có thể chọn ảnh để bình luận");
            }
        } else {
                alert("Chỉ có thể chọn ảnh để bình luận");
        }
    }
}
//Xóa ảnh đã tải lên của cmt
$(document).on('click', '.remove_file_cmt', function() {
    $(this).parents('.box_comment_submit').find('.file_img_cmt').val('');
    $(this).parents('.render_img').remove();
});
// nhấn trả lời hiển thị box nhập cmt
$(document).on('click', '.action_reply_cmt', function() {
    let el_news = $(this).parents('.ep_post_detail'),
        tat_comment = el_news.attr('data-tat_comment'),
        group_pause = el_news.attr('data-group_pause'),
        suspended_me = el_news.attr('data-suspended_me');
    if (user_id && tat_comment == 0 && group_pause == 0 && suspended_me == 0){
        let check_exist = $(this).parents('.cmt_parent_item').find('.form_reply_cmt').html(),
            reply = render.render_box_comment();
        if (!check_exist) { 
            $(this).parents('.cmt_parent_item').find('.list_cmt_child').append(reply);
        } else {
            $(this).parents('.cmt_parent_item').find('.form_reply_cmt').remove();
            $(this).parents('.cmt_parent_item').find('.list_cmt_child').append(reply);
        } 
    } 
});
// nhấn chỉnh sửa bình luận
$(document).on('click', '.action_edit_comment', function() {
    arrImgCmt = [];
    img_rep_cmt = [];
    var el = $(this),
        id = el.attr('data-cmt_id'),
        img = el.parents(".ep_show_cmt_content").find(".image_cmt").attr('src'),
        value = el.parents(".ep_show_cmt_content").find(".ep_show_cnt_item").html().replaceAll('<br>','');
    el.parents('.popup_action_cmt').css('display', 'none');
    if (!el.hasClass('child')) {
        // đổ dl chỉnh sửa bình luận
        handle.focusAtEnd(el.parents('.ep_post_detail').find('.comment_submit_main.comment_submit')[0]);
        el.parents('.ep_post_detail').find('.comment_submit_main.comment_submit').val(value).trigger("keyup").focus();
        el.parents('.ep_post_detail').find('.box_comment_submit').attr('data-type', 1); 
        el.parents('.ep_post_detail').find('.box_comment_submit').attr('data-cmt_id', id);
        if (img) {
            arrImgCmt.push(img);
            $('#render_img').remove();
            el.parents('.ep_post_detail').find('.box_render_img_cmt').append(`
            <div class="render_img" id="render_img">
                <img src="${img}" class="render_img_item1" id="avatar${id}" alt="">
                <div class="img_close" onclick="closeImgCmt(${id},this);">
                    <img src="../img/dau_x.png" class="img_close_item" id="" alt="Ảnh lỗi">
                </div>
            </div>`);
        }
    } else { 
        // đổ dl chỉnh sửa trả lời bình luận 
        if (el.parents('.cmt_parent_item').find('.form_reply_cmt').html()) {
            el.parents('.cmt_parent_item').find('.form_reply_cmt').remove();
        }
        var html_reply = render.render_box_comment();
        el.parents('.cmt_parent_item').find('.list_cmt_child').append(html_reply);
        handle.focusAtEnd(el.parents('.cmt_parent_item').find('.form_reply_cmt .comment_submit')[0]);
        el.parents('.cmt_parent_item').find('.form_reply_cmt .comment_submit').val(value).trigger("keyup").focus();
        el.parents('.cmt_parent_item').find('.form_reply_cmt .box_comment_submit').attr('data-type', 1);
        el.parents('.cmt_parent_item').find('.form_reply_cmt .box_comment_submit').attr('data-cmt_id', id);
        if (img) {
            img_rep_cmt.push(img);
            el.parents('.cmt_parent_item').find('.form_reply_cmt .box_render_img_cmt').append(`
            <div class="render_img" id="render_img">
                <img src="${img}" class="render_img_item1" id="avatar${id}" alt="">
                <div class="img_close" onclick="close_img_rep_cmt(${id},this);">
                    <img src="../img/dau_x.png" class="img_close_item" id="" alt="">
                </div>
            </div>
            `);
        } 
    }
});
// bình luận
$(document).on('keydown', '.comment_submit', function(e) {
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13 && !e.shiftKey) {
        e.preventDefault();
        $('.ep_submit_mess').click();
    }
});
$(document).on('click', '.ep_submit_mess', function() { 
    let el = $(this).parents('.box_comment_submit').find('.comment_submit'),
        type_submit = el.parents('.box_comment_submit').attr('data-type'),
        comment = $.trim(el.val()),
        new_id = el.parents('.ep_post_detail').attr('data-new_id'),
        img_comment = el.parents('.box_comment_submit').find('.file_img_cmt')[0].files[0];
        isauthor = el.parents('.ep_post_detail').find('.ep_post_show_cmt').attr('data-isauthor');
    if (type_submit == 0) {
        if (!comment && !img_comment) {
            return false;
        }   
        if (el.parents('.ep_post_detail').find('.count_cmt_post .count_comment').length) {
            let count_comment = el.parents('.ep_post_detail').find('.count_comment').text();
            el.parents('.ep_post_detail').find('.ep_post_count_like .count_comment').text(parseInt(count_comment)+1);
        } else {
            el.parents('.ep_post_detail').find('.count_cmt_post').html(`<span class="count_comment">1</span> Bình luận`)
        }
        el.val('');
        el.parents('.box_comment_submit').find('#render_img').remove();
        // bình luận cha
        if (el.hasClass('comment_submit_main')) {
            resp = handle.comment(new_id, comment, img_comment);
            if (resp.result) {
                var data = resp.data,
                    html_cmt = render.render_comment(data, isauthor); 
                el.parents(".ep_post_detail").find('.ep_post_show_cmt').prepend(html_cmt);
                render.see_more_content_post();
            } else {
                alert(resp.message);
            } 
        }
        // trả lời bình luận cha
        else { 
            let comment_id = el.parents('.cmt_parent_item').attr('data-idcmt'),
                resp = handle.comment(new_id, comment, img_comment, comment_id);
            if (resp.result) {
                var data = resp.html,
                    html_cmt = render.render_reply_comment(data, isauthor);
                el.parents('.cmt_parent_item').find('.list_cmt_child').append(html_cmt); 
                el.parents('.form_reply_cmt').remove();
                render.see_more_content_post();
            } else {
                alert(resp.message);
            }
        }
    }else if (type_submit == 1) {
        let file_delete = el.parents('.box_comment_submit').find('.box_render_img_cmt .render_img').length,
            cmt_id = el.parents('.box_comment_submit').attr('data-cmt_id');
        el.parents('.box_comment_submit').removeAttr('data-cmt_id');
        el.parents('.box_comment_submit').attr('data-type', '0');
        if (!comment && !img_comment && !file_delete) { 
            return false;
        }
        resp = handle.edit_comment(cmt_id, comment, img_comment, file_delete);
        if (resp.result) {
            render.change_comment_content(resp.comment[0]);
            // sửa bình luận cha
            if (el.hasClass('comment_submit_main')) {
                el.val('');
                el.parents('.box_comment_submit').find('#render_img').remove();
            } 
            // sửa bình luận con
            else {
                el.parents('.form_reply_cmt').remove();
            }
            render.see_more_content_post();
        } else {
                alert(resp.message);
        } 
    }
});
// xóa bình luận 
function deleteCmt(element,cmt_id){
    if (confirm("Bạn chắc chắn muốn xóa bình luận này?")) {
        let del = handle.delete_comment(cmt_id);
        if (del.result) {
            if (del.count_cmt_post) {
                $(element).parents('.ep_post_detail').find('.count_cmt_post .count_comment').html(del.count_cmt_post);
            } else {
                $(element).parents('.ep_post_detail').find('.count_cmt_post').html('');
            }
            if ($(element).parents(".ep_show_repcmt_detail").length > 0){
                $(element).parents(".ep_show_repcmt_detail").remove();
            }else{
                $(element).parents(".ep_post_show_cmt_detail").remove();
            }
        } else {
            alert(del.message);
        }
    } 
}
// ẩn bình luận
function hideCmt(element,cmt_id){
    var el = $(element).parents(".ep_post_show_cmt_detail");
    $.ajax({
        url: "/ajax/show_hide_comment.php",
        type: 'POST',
        dataType: 'json',
        data: {
            cmt_id: cmt_id,
        },
        success: function (data) {
            if (data.result == true){
                if ($(element).find(".popup_action_cmt_detail_img").attr("src").match("ep_show_cmt") != null){
                    $(element).html(`<img class="popup_action_cmt_detail_img" src="/img/ep_hide_cmt.svg" alt="Ảnh lỗi"> Ẩn bình luận`);
                }else{
                    $(element).html(`<img class="popup_action_cmt_detail_img" src="/img/ep_show_cmt.svg" alt="Ảnh lỗi"> Hiện bình luận`);
                }
                $(".view_cmt_rep"+cmt_id).attr("data-hidden",1 - parseInt($(".view_cmt_rep"+cmt_id).attr("data-hidden")));
                // bình luận
                el.find(".ep_show_cmt_content").find(".ep_show_cmt_content_detail").eq(0).toggleClass('opacity-0p15');
                el.find(".ep_show_cmt_avt").eq(0).toggleClass('opacity-0p15');
                // trả lời bình luận
                el.find(".ep_show_repcmt_detail[data-hidden=0] .ep_show_cmt_content_detail").toggleClass('opacity-0p15');
                el.find(".ep_show_repcmt_detail[data-hidden=0] .ep_show_cmt_avt").toggleClass('opacity-0p15');
            }
        }
    });
}
// thả cảm xúc nhanh bình luận 
function like_comment(e,id) {
    let type = $(e).attr('data-type');
    if (type == 0) {
        // Bày tỏ cảm xúc nhanh
        let react = handle.reaction_comment(id, 1, 0);
        if (react.result) { 
            let list_react = handle.get_list_reaction_cmt(id),
                html_react = render.render_react_cmt(list_react);
            $(e).parents('.ep_show_cmt_action2').find('.box_reaction_cmt').html(html_react);
            $(e).parents('.box_hover_react_cmt').prepend(render.render_icon_react_cmt(id, 1));
            $(e).remove();
        } else {
            alert(react.msg);
        }
    } else {
        // Xóa cảm xúc
        let react = handle.reaction_comment(id, 0, 1);
        if (react.result) { 
            let list_react = handle.get_list_reaction_cmt(id),
                html_react = render.render_react_cmt(list_react);
            $(e).parents('.ep_show_cmt_action2').find('.box_reaction_cmt').html(html_react);
            $(e).parents('.box_hover_react_cmt').prepend(render.render_icon_react_cmt(id));
            $(e).remove();
        } else {
            alert(react.msg);
        }
    }  
} 
// Hover lấy danh sách người thả cảm xúc cmt
$(document).on({
    mouseenter: function() {
        let cmt_id = $(this).attr('data-cmt_id'),
            icon_type = '';
        if ($(this).hasClass('btn_hover_icon_react_cmt')) {
            icon_type = $(this).attr('data-icon_type');
        }
        let list_react = handle.get_list_reaction_cmt(cmt_id, icon_type),
            render_box_user_react_cmt = render.render_box_user(list_react, (icon_type) ? (render.get_reaction(icon_type)).text : 'Tất cả');
        $(this).append(render_box_user_react_cmt); 
    },
    mouseleave: function() {
        $(this).find('.contain_hover_box').remove();
    }
}, ".box_reaction_cmt .box_reaction, .box_reaction_cmt .btn_hover_icon_react_cmt");
// hover hiển thị list cảm xúc
$(document).on({
    mouseenter: function() {
        var check = $(this).children('.list_icon_cxuc').length;
        if (check == 0) {
            var lst_emoticon = render.render_list_emoticon();
            $(this).append(lst_emoticon);
        }
        $(this).children('.list_icon_cxuc').css('display', 'block');
    },
    mouseleave: function() {
        $(this).children('.list_icon_cxuc').css('display', 'none');  
    }
}, ".box_hover_reaction"); 
// nhấn xem thêm, thu gọn nội dung bài viết
$(document).on('click', '.see_more_content_post', function() {
    var el = $(this),
        parent = el.parents('.content_posts');
    if (!el.hasClass('show_full')) {
        el.addClass('show_full');
        el.html('Rút gọn');
        parent.find('.content_limit').css('max-height', '100%').css('display', 'unset');
    } else {
        el.removeClass('show_full');
        el.html('Xem thêm');
        parent.find('.content_limit').css('max-height', '100px').css('display', '-webkit-box');
    }
});

const hostname = window.location.hostname;
if (null != hostname && "" != hostname) {
    const e = hostname.split(".")[0];
    class t {
        constructor() {
            this.appendTemplate(e), (this.tawkChatInputEditor = $("#tawk-chatinput-editor")), (this.tawkChatinputAddFile = $("#tawk-chatinput-addFile")), (this.listFile = []);
        }
        getClientCodeID() {
            return (function () {
                var e = window.localStorage.getItem("_DEVICEID_");
                if (e) return e;
                var t = "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (e) {
                    var t = (16 * Math.random()) | 0;
                    return ("x" == e ? t : (3 & t) | 8).toString(16);
                });
                return window.localStorage.setItem("_DEVICEID_", t), t;
            })();
        }
        appendTemplate(e) {
            let t = `<link rel="stylesheet" href="/css/livechat/app.css" media="all"><div id="liveChatContainer"><div class="widget ${e}"><button class="talk_button">Trực tuyến</button><div class="liveChatMain" style="display: none"><div class="liveChatHeader"><button id="liveChatClose">X</button><div class="text-center text"><a rel="nofollow" download href="${
                $(window).width() < 1024 ? "https://onelink.to/kmybdy" : "/dowload/livechat/chat.exe"
            }" class="text">Bạn tải CHAT365 <span class="underLine">tại đây</span> để nhận được sự hỗ trợ tốt nhất, <span class="underLine">tải ngay</span></a></div></div><div class="liveChatBody"><div id="boxUpdateConversation" class="hidden"></div><div class="listConversation"></div><div id="mainEnterChat"><div id="boxPreview" class="hidden"><button class="itemPreview" id="itemAddNewFile"><img src="/images/livechat/add_new_file.svg"></button></div><div id="boxEnterChat"><textarea disabled id="tawk-chatinput-editor" placeholder="Nhập tin nhắn" rows="1"></textarea><div id="chatinputActionButtons"><button id="btnSendMess" class="hidden">${this.btnSendMess()}</button><button id="addFile">${this.btnSendFile()}</button><input type="file" id="tawk-chatinput-addFile" multiple hidden></div></div></div></div><div id="drag"><img src="/images/livechat/drag.png"></div></div></div></div>`;
            $("body").append(t);
        }
        btnSendFile() {
            return '<svg width="32" height="38" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.0371 7.45508L14.7324 1.15039C14.5566 0.974609 14.3193 0.875 14.0703 0.875H1.625C1.10645 0.875 0.6875 1.29395 0.6875 1.8125V26.1875C0.6875 26.7061 1.10645 27.125 1.625 27.125H20.375C20.8936 27.125 21.3125 26.7061 21.3125 26.1875V8.12012C21.3125 7.87109 21.2129 7.63086 21.0371 7.45508ZM19.1504 8.55078H13.6367V3.03711L19.1504 8.55078ZM19.2031 25.0156H2.79688V2.98438H11.6445V9.3125C11.6445 9.63884 11.7742 9.95182 12.0049 10.1826C12.2357 10.4133 12.5487 10.543 12.875 10.543H19.2031V25.0156ZM11.9375 12.8281C11.9375 12.6992 11.832 12.5938 11.7031 12.5938H10.2969C10.168 12.5938 10.0625 12.6992 10.0625 12.8281V15.9922H6.89844C6.76953 15.9922 6.66406 16.0977 6.66406 16.2266V17.6328C6.66406 17.7617 6.76953 17.8672 6.89844 17.8672H10.0625V21.0312C10.0625 21.1602 10.168 21.2656 10.2969 21.2656H11.7031C11.832 21.2656 11.9375 21.1602 11.9375 21.0312V17.8672H15.1016C15.2305 17.8672 15.3359 17.7617 15.3359 17.6328V16.2266C15.3359 16.0977 15.2305 15.9922 15.1016 15.9922H11.9375V12.8281Z" fill="#474747"/></svg>';
        }
        btnSendMess() {
            return '<svg width="50" height="50" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_571_56690)"><path d="M30 7.4273V23.5726C30 27.3987 26.8987 30.5 23.0727 30.5H6.92736C3.10131 30.5 0 27.3987 0 23.5727V7.4273C0 3.60131 3.10131 0.5 6.92736 0.5H23.0727C26.8987 0.5 30 3.60131 30 7.4273Z" fill="url(#paint0_linear_571_56690)"/><path d="M6.79923 30.5C3.05012 30.5 0 27.4499 0 23.7008V7.29923C0 3.55012 3.05012 0.5 6.79923 0.5H23.2008C26.9499 0.5 30 3.55012 30 7.29923V23.7008C30 27.4499 26.9499 30.5 23.2008 30.5H6.79923Z" fill="url(#paint1_linear_571_56690)"/><path opacity="0.5" d="M30.0001 15.4666V23.5725C30.0001 27.3986 26.8987 30.5 23.0726 30.5H16.8868L8.66577 22.279L23.4435 8.90997L30.0001 15.4666Z" fill="url(#paint2_linear_571_56690)"/><path opacity="0.3" d="M23.7208 9.24756L5.73975 13.7902L8.95742 16.8186V22.5914L12.1258 20.1762L15.2035 23.2539L23.7208 9.24756Z" fill="#1A1A1A"/><path d="M23.4085 8.93506L10.2539 18.3042L14.8911 22.9414L23.4085 8.93506Z" fill="url(#paint3_linear_571_56690)"/><path d="M8.64502 16.5061V22.279L10.2539 18.3042L23.4085 8.93506L8.64502 16.5061Z" fill="url(#paint4_linear_571_56690)"/><path d="M5.42725 13.4777L8.64492 16.5061L23.4084 8.93506L5.42725 13.4777Z" fill="url(#paint5_linear_571_56690)"/><path d="M8.64502 22.279L11.8134 19.8638L10.2539 18.3042L8.64502 22.279Z" fill="#D2D2D2"/><path d="M23.4085 8.93506L10.2539 18.3042L14.8911 22.9414L23.4085 8.93506Z" fill="white"/><path d="M8.64502 16.5061V22.279L10.2539 18.3042L23.4085 8.93506L8.64502 16.5061Z" fill="#9FB5DF"/><path d="M5.42725 13.4777L8.64492 16.5061L23.4084 8.93506L5.42725 13.4777Z" fill="white"/></g><defs><linearGradient id="paint0_linear_571_56690" x1="15" y1="0.5" x2="15" y2="30.5" gradientUnits="userSpaceOnUse"><stop offset="0.005" stop-color="#FFE5AE"/><stop offset="1" stop-color="#FF992D"/></linearGradient><linearGradient id="paint1_linear_571_56690" x1="15" y1="0.792976" x2="15" y2="30.678" gradientUnits="userSpaceOnUse"><stop stop-color="#4C5BD4"/><stop offset="1" stop-color="#1F7ED0"/></linearGradient><linearGradient id="paint2_linear_571_56690" x1="15.9939" y1="15.5339" x2="28.7275" y2="28.267" gradientUnits="userSpaceOnUse"><stop stop-color="#64A8E2"/><stop offset="1" stop-color="#1F7ED0" stop-opacity="0"/></linearGradient><linearGradient id="paint3_linear_571_56690" x1="10.2539" y1="15.9382" x2="23.4085" y2="15.9382" gradientUnits="userSpaceOnUse"><stop offset="0.009" stop-color="#F3E0DF"/><stop offset="1" stop-color="#E8E0BA"/></linearGradient><linearGradient id="paint4_linear_571_56690" x1="14.2217" y1="12.9556" x2="15.4627" y2="14.7785" gradientUnits="userSpaceOnUse"><stop offset="0.009" stop-color="#65BCC0"/><stop offset="1" stop-color="#53838A"/></linearGradient><linearGradient id="paint5_linear_571_56690" x1="5.42725" y1="12.7206" x2="23.4084" y2="12.7206" gradientUnits="userSpaceOnUse"><stop offset="0.009" stop-color="#F3E0DF"/><stop offset="1" stop-color="#E8E0BA"/></linearGradient><clipPath id="clip0_571_56690"><rect y="0.5" width="30" height="30" rx="15" fill="white"/></clipPath></defs></svg>';
        }
        changeBody(e) {
            "show" == e
                ? ($(".talk_button").hide(), $(".liveChatMain").show(), $(".widget").addClass("active"), $(window).width(), $(".listConversation").animate({ scrollTop: $(".listConversation").get(0).scrollHeight }, 0))
                : ($(".talk_button").show(), $(".liveChatMain").hide(), $(".widget").removeClass("active"));
        }
        showBtnSendMess() {
            $("#btnSendMess").removeClass("hidden"), $("#addFile").addClass("hidden");
        }
        messByUser(e, t = "text", i = [], s) {
            let a, n;
            return (
                "text" == t && (a = `<div class="liveChatItem user"><div class="liveChatContent">${e.replaceAll("\n", "<br>")}</div></div>`),
                "sendPhoto" == t &&
                    ((a = ""),
                    i.forEach((e) => {
                        var t = null != e.fullName ? e.fullName : e.FullName;
                        a += `<div class="liveChatItem user"><div class="liveChatContent"><a target="_blank" href="https://mess.timviec365.vn/uploads/${t}"><img src="/images/load.gif" class="lazyload" data-src="https://mess.timviec365.vn/uploads/${t}"></a></div></div>`;
                    })),
                "sendFile" == t &&
                    ((a = ""),
                    i.forEach((e) => {
                        var t = null != e.fullName ? e.fullName : e.FullName,
                            i = null != e.nameDisplay ? e.nameDisplay : e.NameDisplay,
                            s = null != e.fileSizeInByte ? e.fileSizeInByte : e.FileSizeInByte;
                        a += `<div class="liveChatItem user"><a rel="nofollow" download href="https://mess.timviec365.vn/uploads/${t}"><div class="liveChatContent downloadFile"><div class="downloadFileHeader"><p class="nameFile">${i}</p><p class="sizeFile">${s}</p><p class="typeFile">Tệp</p></div><div class="text-center btnDownLoad">Tải xuống</div></div></a></div>`;
                    })),
                "link" == t &&
                    null != s &&
                    ((n = null != s.image ? `<div class="imageLayout"><img src="${s.image}"></div>` : ""),
                    (a = `<div class="liveChatItem user"><div class="liveChatContent liveChatContentMessLink"><a href="${e}" rel="nofollow" target="_blank">${n}<b class="titleLayout">${s.title}</b><div class="descriptionLayout">${
                        null != s.description ? s.description : ""
                    }</div><div class="linkLayout">${s.linkHome}</div></a></div></div>`)),
                a
            );
        }
        messFilePreview(e, t) {
            let i = "";
            return (
                "sendPhoto" == t
                    ? e.forEach((e) => {
                          i += `<div class="liveChatItem user"><div class="liveChatContent"><a href="${e.result}"><img src="/images/load.gif" class="lazyload" data-src="${e.result}"></a></div></div>`;
                      })
                    : "sendFile" == t &&
                      e.forEach((e) => {
                          i += `<div class="liveChatItem user"><a rel="nofollow" download><div class="liveChatContent downloadFile"><div class="downloadFileHeader"><p class="nameFile">${e.name}</p><p class="sizeFile"></p><p class="typeFile">Tệp</p></div><div class="text-center btnDownLoad">Tải xuống</div></div></a></div>`;
                      }),
                i
            );
        }
        messBySwitchboard(e, t = !1, i = "text", s = [], a) {
            const n = 1 == t ? '<div class="liveChatLogo"><div class="SwitchboardLogo"><img src="/images/livechat/w_headphone.svg"></div></div>' : "";
            let l, o;
            return (
                "text" == i && (l = `<div class="liveChatItem support_switchboard">${n}<div class="liveChatContent"><div class="liveChatContentMess">${e.replaceAll("\n", "<br>")}</div></div></div>`),
                "sendPhoto" == i &&
                    ((l = ""),
                    s.forEach((e) => {
                        var t = null != e.fullName ? e.fullName : e.FullName;
                        l += `<div class="liveChatItem support_switchboard">${n}<div class="liveChatContent image"><a target="_blank" href="https://mess.timviec365.vn/uploads/${t}"><div class="liveChatContentMess"><img src="/images/load.gif" class="lazyload" data-src="https://mess.timviec365.vn/uploads/${t}"></div></a></div></div>`;
                    })),
                "sendFile" == i &&
                    ((l = ""),
                    s.forEach((e) => {
                        var t = null != e.fullName ? e.fullName : e.FullName,
                            i = null != e.nameDisplay ? e.nameDisplay : e.NameDisplay,
                            s = null != e.fileSizeInByte ? e.fileSizeInByte : e.FileSizeInByte;
                        l += `<div class="liveChatItem support_switchboard">${n}<div class="liveChatContent"><a rel="nofollow" download href="https://mess.timviec365.vn/uploads/${t}"><div class="downloadFile"><div class="downloadFileHeader"><p class="nameFile">${i}</p><p class="sizeFile">${s}</p><p class="typeFile">Tệp</p></div><div class="text-center btnDownLoad">Tải xuống</div></div></a></div></div>`;
                    })),
                "link" == i &&
                    null != a &&
                    ((o = null != a.image ? `<div class="imageLayout"><img src="${a.image}"></div>` : ""),
                    (l = `<div class="liveChatItem support_switchboard">${n}<div class="liveChatContent"><div class="liveChatContentMess liveChatContentMessLink"><a href="${e}" rel="nofollow" target="_blank">${o}<b class="titleLayout">${
                        a.title
                    }</b><div class="descriptionLayout">${null != a.description ? a.description : ""}</div><div class="linkLayout">${a.linkHome}</div></a></div></div></div>`)),
                l
            );
        }
        showPreviewImage(e, t) {
            return `<div class="itemPreview"><button data-index="${t}" class="closePreview" onclick="deleteUploadFile(this)">X</button><img src="${e.result}"></div>`;
        }
        showPreviewFile(e) {
            return `<div class="itemPreview File"><img src="/images/livechat/icon_file.png"><button data-index="${e}" class="closePreview" onclick="deleteUploadFile(this)">X</button></div>`;
        }
        addMessToList(e, t = "") {
            "" == t ? $(".listConversation").prepend(e) : $(".listConversation").append(e);
        }
        message(e, t = !0) {
            if (a.conversationID == e.conversationID) {
                let s;
                return (s = e.senderID == a.userID ? i.messByUser(e.message, e.messageType, e.listFile, e.infoLink) : i.messBySwitchboard(e.message, t, e.messageType, e.listFile, e.infoLink)), s;
            }
        }
        previewFile() {
            $("#boxPreview,#btnSendMess").removeClass("hidden"), $("#addFile").addClass("hidden"), $("div.itemPreview").remove();
            let e = this.tawkChatinputAddFile.prop("files");
            for (var t = 0; t < e.length; t++) {
                let i = e[t];
                this.listFile.push(i);
            }
            const i = this.listFile.length,
                s = this;
            let a = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
            for (let e = 0; e < i; e++) {
                let t = this.listFile[e],
                    i = t.type;
                if ((t.size, t.name, i == a[0] || i == a[1] || i == a[2] || i == a[3] || i == a[4] || i == a[5])) {
                    let i = new FileReader();
                    (i.onload = function (t) {
                        const a = s.showPreviewImage(i, e);
                        $("#itemAddNewFile").before(a);
                    }),
                        i.readAsDataURL(t);
                } else {
                    const t = s.showPreviewFile(e);
                    $("#itemAddNewFile").before(t);
                }
            }
            this.tawkChatinputAddFile.val(""), this.tawkChatInputEditor.focus();
        }
        reset() {
            this.tawkChatInputEditor.val(""), $("div.itemPreview").remove(), $("#boxPreview,#btnSendMess").addClass("hidden"), $("#addFile").removeClass("hidden"), (this.listFile = []);
        }
    }
    const i = new t();
    class s {
        constructor({ fromWeb: e, clientSocket: t }) {
            null != e &&
                ((this.clientId = i.getClientCodeID()),
                (this.fromWeb = e),
                (this.socket = this.connectSocket(e, t)),
                (this.userID = 59721),
                (this.switchboardID = 56387),
                (this.listMember = [this.userID, this.switchboardID]),
                this.conversationID,
                (this.checkConnection = !0),
                (this.apiSentMess = "https://mess.timviec365.vn/Message/SendMessage"),
                (this.apiUploadFile = "https://mess.timviec365.vn/File/UploadFile"),
                // this.userLogin(),
                this.loginWithIdDevice(),
                this.browserConnect(),
                this.receiveMess());
        }
        connectSocket(e, t) {
            let i;
            return (i = "work247" == e || "localhost" == e || null == t ? io.connect("wss://socket.timviec365.vn", { secure: !0, enabledTransports: ["https"], transports: ["websocket", "polling"] }) : t), i;
        }
        callAjax(e, t, i = !1, s = "POST") {
            let a;
            return (
                $.ajax({
                    type: s,
                    url: e,
                    data: t,
                    async: i,
                    dataType: "json",
                    success: function (e) {
                        a = e;
                    },
                }),
                a
            );
        }
        loadlistMessages(e = "loadNew") {
            const t = { clientId: this.clientId, fromWeb: this.fromWeb, countMess: 0, countLoad: 50 },
                s = this;
            $.ajax({
                type: "POST",
                url: "https://mess.timviec365.vn/Message/GetListMessage_LiveChat",
                data: t,
                dataType: "json",
                beforeSend: function () {
                    "loadNew" == e ? $(".listConversation").append('<div id="waiting"><p class="loading">Loading</p></div>') : $("#boxUpdateConversation").empty().html("Đang cập nhật cuộc trò chuyện");
                },
                success: function (t) {
                    if ((i.tawkChatInputEditor.attr("disabled", !1), $("#waiting").remove(), null == t.data)) i.tawkChatInputEditor.addClass("newConversation");
                    else {
                        "reload" == e &&
                            ($("#boxUpdateConversation").addClass("reload").html("Cập nhật cuộc trò chuyện thành công"),
                            setTimeout(() => {
                                $("#boxUpdateConversation").removeClass("reload").empty().addClass("hidden");
                            }, 2e3));
                        const i = t.data.listMessages[0].conversationID;
                        (s.conversationID = i), s.loadListMess(t.data.listMessages);
                    }
                    $(".listConversation").animate({ scrollTop: $(".listConversation").get(0).scrollHeight }, 0);
                },
                error: function () {
                    $("#waiting").remove();
                },
            });
        }
        createConversation(e) {
            const t = { senderId: this.userID, contactId: this.switchboardID, clientId: this.clientId, conversationName: this.fromWeb + "_" + this.clientId, fromWeb: this.fromWeb },
                s = this.callAjax("https://mess.timviec365.vn/Conversation/CreateNewLiveChat", t);
            if (s.data.result) {
                i.tawkChatInputEditor.removeClass("newConversation");
                const t = s.data.conversation_info.conversationId;
                this.socket.emit("AddNewConversation", t, [this.switchboardID], [this.clientId], [], this.fromWeb), (this.conversationID = t), this.sendMess(t, e);
            }
        }
        sendMess(e, t) {
            if (i.listFile.length > 0) {
                let t,
                    a = [],
                    n = new FormData();
                const l = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
                let o,
                    d = [];
                for (let e = 0; e < i.listFile.length; e++) {
                    const r = i.listFile[e],
                        c = r.name,
                        h = r.size,
                        v = r.type;
                    if ((n.append("file", r), v == l[0] || v == l[1] || v == l[2] || v == l[3] || v == l[4] || v == l[5])) {
                        var s = new FileReader();
                        (o = "sendPhoto"),
                            (s.onload = async function (e) {
                                var i = new Image();
                                (i.src = e.target.result),
                                    (i.onload = function () {
                                        var e = this.height,
                                            i = this.width;
                                        (t = { TypeFile: "sendPhoto", SizeFile: h, Width: i, Height: e }), a.push(t), d.push(s);
                                    });
                            }),
                            s.readAsDataURL(r);
                    } else (o = "sendFile"), (t = { TypeFile: "sendFile", SizeFile: h, NameDisplay: c }), a.push(t);
                }
                setTimeout(() => {
                    const t = i.messFilePreview(d, o);
                    $(".listConversation")
                        .append(t)
                        .animate({ scrollTop: $(".listConversation").get(0).scrollHeight }, 0),
                        this.sendFileToChat(n, e, o, a);
                }, 1e3);
            }
            if ("" != t) {
                const s = i.messByUser(t, "text", []);
                $(".listConversation")
                    .append(s)
                    .animate({ scrollTop: $(".listConversation").get(0).scrollHeight }, 0);
                const a = { ConversationID: e, SenderID: this.userID, MessageType: "text", Message: t };
                this.callAjax(this.apiSentMess, a, !0);
            }
        }
        sendFileToChat(e, t, i, s) {
            const a = this;
            $.ajax({
                url: a.apiUploadFile,
                type: "POST",
                contentType: !1,
                cache: !1,
                processData: !1,
                data: e,
                dataType: "JSON",
                async: !0,
                success: function (e) {
                    const n = e.data.listNameFile;
                    for (let e = 0; e < n.length; e++) s[e].FullName = n[e];
                    const l = { ConversationID: t, SenderID: a.userID, MessageType: i, Message: "a", File: JSON.stringify(s) };
                    a.callAjax(a.apiSentMess, l);
                },
            });
        }
        sendMessToChat() {
            const e = i.tawkChatInputEditor.val().trim();
            i.tawkChatInputEditor.hasClass("newConversation") ? this.createConversation(e) : this.sendMess(a.conversationID, e), i.reset();
        }
        receiveMess() {
            this.socket.on("SendMessage", (e) => {
                if (e.ConversationID == this.conversationID && (e.SenderID != this.userID || "sendFile" == e.MessageType || "link" == e.MessageType)) {
                    let t = null;
                    "link" == e.MessageType &&
                        null != e.InfoLink &&
                        (t = {
                            description: e.InfoLink.Description,
                            haveImage: e.InfoLink.HaveImage,
                            image: e.InfoLink.Image,
                            isNotification: e.InfoLink.IsNotification,
                            linkHome: e.InfoLink.LinkHome,
                            messageID: e.InfoLink.MessageID,
                            title: e.InfoLink.Title,
                            typeLink: e.InfoLink.TypeLink,
                        });
                    const s = { senderID: e.SenderID, messageType: e.MessageType, message: e.Message, conversationID: e.ConversationID, listFile: e.ListFile, infoLink: t },
                        a = i.message(s);
                    i.addMessToList(a, "append"), $(".listConversation").animate({ scrollTop: $(".listConversation").get(0).scrollHeight }, 0);
                }
            });
        }
        browserConnect() {
            this.socket.on("connect", () => {
                1 == $("#boxUpdateConversation").hasClass("disconnect") && (this.loginWithIdDevice(), $(".listConversation").empty(), a.loadlistMessages("reload"));
            }),
                this.socket.on("disconnect", (e) => {
                    $(".liveChatItem").length > 0 && $("#boxUpdateConversation").addClass("disconnect");
                }),
                this.socket.on("DeleteConversation", (e) => {
                    null != this.conversationID && this.conversationID == e && (localStorage.removeItem("_DEVICEID_"), location.reload());
                });
        }
        userLogin() {
            this.socket.emit("Login", this.userID, this.fromWeb);
        }
        loginWithIdDevice() {
            this.socket.emit("LoginWithIdDevice", this.clientId, this.fromWeb);
        }
        loadListMess(e) {
            for (let t = e.length - 1; t >= 0; t--) {
                let s = e[t];
                if ("notification" != s.messageType) {
                    let e = i.message(s);
                    i.addMessToList(e);
                }
            }
        }
        init() {
            this.loadlistMessages();
        }
    }
    const a = new s({ fromWeb: e, clientSocket: socket });
    a.init(),
        $(".talk_button").click(function () {
            i.changeBody("show");
        }),
        $("#liveChatClose").click(function () {
            i.changeBody("hide");
        }),
        $("#addFile,#itemAddNewFile").click(function () {
            i.tawkChatinputAddFile.click();
        }),
        i.tawkChatinputAddFile.change(function () {
            i.previewFile();
        }),
        i.tawkChatInputEditor.keyup(function (e) {
            const t = $(this),
                s = t.val().trim();
            var n = parseInt(t.attr("rows"));
            let l = i.listFile;
            if (
                ("" != s || l.length > 0 ? i.showBtnSendMess() : i.reset(), 13 == e.keyCode && !e.shiftKey && ("" != s || l.length > 0) && a.sendMessToChat(), 13 == e.keyCode && e.shiftKey && n < 10 && t.attr("rows", n + 1), 8 == e.keyCode)
            ) {
                const e = s.split("\n").length;
                e > 1 && t.attr("rows", n - 1), ("" != s && 1 != e) || t.empty().attr("rows", 1);
            }
            if (e.ctrlKey && 86 == e.keyCode) {
                const e = t.val().split("\n").length;
                e > 1 && t.attr("rows", e);
            }
        }),
        i.tawkChatInputEditor.bind("paste", function (e) {
            const t = $(this),
                s = t.val().trim().split("\n").length;
            s > 1 && t.attr("rows", s);
            var a = (e.clipboardData || e.originalEvent.clipboardData).items;
            for (var n in a) {
                var l = a[n];
                if ("file" === l.kind) {
                    var o = l.getAsFile();
                    new FileReader().readAsDataURL(o), i.listFile.push(o);
                }
            }
            i.listFile.length > 0 && i.previewFile();
        }),
        $("#btnSendMess").click(function () {
            a.sendMessToChat();
        }),
        $(document).on("click", "#btnUpdateConversation", function () {
            $(".listConversation").empty(), $("#boxUpdateConversation").addClass("hidden").empty(), a.loadlistMessages();
        });
    var isResizing = !1,
        lastDownX = 0;
    function deleteUploadFile(e) {
        const t = $(this),
            s = t.attr("data-index");
        t.parent().remove(), i.listFile.splice(s, 1), i.previewFile(), 0 == $("div.itemPreview").length && $("#boxPreview").addClass("hidden") && $("#btnSendMess").addClass("hidden") && $("#addFile").removeClass("hidden");
    }
    $(function () {
        var e = $("#liveChatContainer"),
            t = $(".liveChatMain");
        $("#drag").on("mousedown", function (e) {
            (isResizing = !0), (lastDownX = e.clientX);
        }),
            $(document)
                .on("mousemove", function (i) {
                    if (isResizing) {
                        var s = e.width() - (i.clientX - e.offset().left);
                        t.css("width", s);
                    }
                })
                .on("mouseup", function (e) {
                    isResizing = !1;
                });
    });
}

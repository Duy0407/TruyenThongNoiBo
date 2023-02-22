$(document).ready(function() {
    $('.chat_form_input').keyup(function() {
        var el = $(this).parents('.chat_form');
        if ($.trim($(this).val()) != "") {
            $(this).css({
                'width': '90%'
            });
            $('.chat_action').hide();
            $('.form_chat-submit').show();
        } else {
            $(this).css({
                'width': '80%'
            });
            $('.chat_action').show();
            $('.form_chat-submit').hide();
        }
    });
});
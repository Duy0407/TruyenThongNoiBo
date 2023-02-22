$(document).ready(function () {
  $('.v_header_info_user').click(function () {
    $('.v_header_popup_info').slideToggle(500);
  });
  $(document).click(function (e) {
    var container = $(".v_header_popup_info");
    var container2 = $(".v_header_info_user");
    if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
      container.slideUp(500);
    }
  });

  $('.v_header_info_link_logout').click(function () {
    $('.v_logout').fadeIn('',function(){
      $('.v_logout_out').click(function(){
        $('.v_logout_out_span').hide();
        $('.v_logout_out_img').show();
        $.ajax({
          type: "POST",
          url: "../ajax/logout.php",
          data: {
            id: 1
          },
          dataType: "json",
          success: function (data) {
            window.location.href = "/";
          }
        });
      });
    });
  });

  $('.v_logout_cancel').click(function () {
    $('.v_logout').fadeOut();
  });

  $(document).click(function (e) {
    var container = $(".v_logout");
    var container2 = $(".v_header_info_link_logout");
    if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0) {
      container.fadeOut();
    }
  });
});
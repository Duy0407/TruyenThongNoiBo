
///caidat
$(document).ready(function() {
  $(".skgl").validate({
    errorPlacement: function (error, element) {
      error.appendTo(element.parents(".form_group"));
      error.wrap("<span class='error'>");
    },

    rules: {
      skgl_ndsk: "required",
     
    },

    messages: {
       skgl_ndsk: "không được để trống", 
    },
  });

  //Tìm kiếm sách
  $('.seach-book').submit(function() {
    if ($(this).find('.searchbook').val() != "") {
      window.location.href = '/quan-tri-tri-thuc-wiki.html?k=' + $(this).find('.searchbook').val();
    }
    return false;
  });
});


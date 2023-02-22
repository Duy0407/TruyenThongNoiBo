$(document).ready(function() {
    $(".v_doimacaptcha").click(function() {
        $.ajax({
            url: '../ajax/rechange_captcha.php',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $("#v_manhap").val(data.randomString);
            }
        })
    });

    $(".see_inp_img").click(function() {
        if ($(this).parents(".see_inp").prev().prop('type') == "text") {
            $(this).parents(".see_inp").prev().prop('type', 'password');
        } else if ($(this).parents(".see_inp").prev().prop('type') == "password") {
            $(this).parents(".see_inp").prev().prop('type', 'text');
        }
    });

    $.validator.addMethod("check_catcha", function(value, element) {
        if (value != $("#v_manhap").val()) {
            var nameOK = false;
        } else {
            var nameOK = true;
        }
        return this.optional(element) || nameOK
    }, "");

    $("#v_login_company").validate({
        rules: {
            "email": {
                required: true,
                email: true
            },
            "password": {
                required: true
            },
            "captcha": {
                required: true,
                check_catcha: true
            }
        },
        messages: {
            "email": {
                required: "Email không được để trống",
                email: "Sai định dang email"
            },
            "password": {
                required: "Password không được để trống"
            },
            "captcha": {
                required: "Mã captcha không được để trống",
                check_catcha: "Mã bạn nhập vào sai, vui lòng thử lại"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr('name') == 'email') {
                $(".form-input_email").append(error);
            }
            if (element.attr('name') == 'password') {
                $(".form-input_password").append(error);
            }
            if (element.attr('name') == 'captcha') {
                $("#v_error_captcha").text(error[0].innerText);
            }
        },
        submitHandler: function(form) {
            $(form).find('.form-footer-submit').prop('type', 'button').find('.form-footer-submit-span').hide().next().show();
            $.ajax({
                url: '../api/api_login.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    email: $("#v_email").val(),
                    pass: $("#v_password").val()
                },
                success: function(data) {
                    if (data.result == false) {
                        $("#v_err_emailpass").text("Email hoặc mật khẩu không chính xác");
                    } else if (data.result == true) {
                        // window.location.href = "/quan-ly-chung.html";
                    }
                    $(form).find('.form-footer-submit').prop('type', 'submit').find('.form-footer-submit-span').show().next().hide();
                }
            });
        }
    });

    $("#v_login_employee").validate({
        rules: {
            "email": {
                required: true,
                email: true
            },
            "password": {
                required: true
            },
            "captcha": {
                required: true,
                check_catcha: true
            }
        },
        messages: {
            "email": {
                required: "Email không được để trống",
                email: "Sai định dang email"
            },
            "password": {
                required: "Password không được để trống"
            },
            "captcha": {
                required: "Mã captcha không được để trống",
                check_catcha: "Mã bạn nhập vào sai, vui lòng thử lại"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr('name') == 'email') {
                $(".form-input_email").append(error);
            }
            if (element.attr('name') == 'password') {
                $(".form-input_password").append(error);
            }
            if (element.attr('name') == 'captcha') {
                $("#v_error_captcha").text(error[0].innerText);
            }
        },
        submitHandler: function(form) {
            $(form).find('.form-footer-submit').prop('type', 'button').find('.form-footer-submit-span').hide().next().show();
            $.ajax({
                url: '../api/api_login_employee.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    email: $("#v_email").val(),
                    pass: $("#v_password").val()
                },
                success: function(data) {
                    if (data.result == false) {
                        $("#v_err_emailpass").text("Email hoặc mật khẩu không chính xác");
                    } else if (data.result == true) {
                        if (data.type == 0) {
                            alert('Tài khoản này chưa được cấp quyền truy cập. Vui lòng liên hệ công ty');
                        } else {
                            window.location.href = "/quan-ly-chung.html";
                        }
                    }
                    $(form).find('.form-footer-submit').prop('type', 'button').find('.form-footer-submit-span').show().next().hide();
                }
            });
        }
    });
});
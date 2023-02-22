$.validator.addMethod("validatePassword", function(value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[@$!%*#?&])(?=.*[A-Z])[a-zA-Z\d@$!%*#?&].{8,16}$/.test(value);
}, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số, ký tự đặc biệt");

$("#form_dndk_cty").validate({

    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".input"));
        error.wrap("<span class='error'>");
    },

    rules: {
        tk_cty: "required",
        mk_cty: {
            required: true,
            validatePassword: true,
        }
    },

    messages: {
        tk_cty: "mời bạn nhập tài khoản",
        mk_cty: {
            required: "mời bạn nhập mật khẩu",

        }

    },

});


$("#quen_mk_email").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".input"));
        error.wrap("<span class='error'>");

    },

    rules: {
        email_quen_mk: {
            required: true,
            email: true,
        },

    },

    messages: {
        email_quen_mk: {
            required: "Không được để trống",
            email: "Định dạng không đúng",
        },

    },
});

$("#khoi_ohuc_mk").validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".input"));
        error.wrap("<span class='error'>");
    },

    rules: {
        nhap_ma_xacthuc: "required",
        nhap_mk_moi: {
            required: true,
            validatePassword: true,
        },
        nhap_lai_mk: {
            required: true,
            validatePassword: true,
            equalTo: "#nmkm",
        },
    },

    messages: {
        nhap_ma_xacthuc: "nhập mã xác thực",
        nhap_mk_moi: {
            required: "bạn chưa nhập mật khẩu",
            validatePassword: "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số",
        },
        nhap_lai_mk: {
            required: "bạn chưa nhập mật khẩu",
            validatePassword: "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số",
            equalTo: "Mật khẩu nhập lại không khớp",
        },
    },
});
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
                        window.location.href = "/quan-ly-chung.html";
                    }
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
                        if(data.type == 0){
                            alert('Tài khoản này chưa được cấp quyền truy cập. Vui lòng liên hệ để công ty');
                        }else{
                            window.location.href = "/quan-ly-chung.html";
                        }
                    }
                }
            });
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
});
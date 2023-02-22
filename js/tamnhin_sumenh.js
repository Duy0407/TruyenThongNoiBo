$(document).ready(function() {
	$('.img.nut-edit-avatar-ct').click(function() {
		$('.input-avatar-ct').click();
	});
});

function changeImg_anh_dai_dien(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.v_img-logo-com').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            var form_data = new FormData();
            form_data.append('image', $('.input-avatar-ct').prop('files')[0]);
            $.ajax({
                type: "POST",
                url: "../ajax/avatar_com.php",
                data: form_data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.result == true) {
                        location.reload();
                    }
                }
            });
        }
    }
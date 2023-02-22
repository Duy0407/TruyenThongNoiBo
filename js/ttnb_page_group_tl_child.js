$(document).ready(function() {
    $("#form_newfeed_ttnb").submit(function() {
        var title = $.trim($('#title_post_newfeed_1').val());
        var dep_id = $(this).data('dep_id');
        if (title != '') {
            var data = new FormData();
            data.append('title', title);
            data.append('dep_id', dep_id);
            $.ajax({
                url: "../ajax/post_newfeeds.php",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                data: data,
                success: function(data) {
                    if (data.result == true) {
                        location.reload();
                    }
                }
            });
        }
        return false;
    });

    //Tạo thông báo
    $('#nut-sda').click(function() {
        $(".model_suaduan").find('.name').eq(0).text("Bài đăng sẽ được đăng trong nhóm");
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('.model_suaduan').find('.select2_t_company').html('<option value="' + dep_id + '">' + dep_name + '</option>');
    });

    //Tạo thảo luận
    $('#nut-ttl').click(function() {
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model_taothaoluan').find('.position').html('<option value="' + dep_id + '">' + dep_name + '</option>');
    });

    //Tạo khen thưởng
    $('#nut-tkt').click(function() {
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model_taokhenthuong').find('.select2_t_company').html('<option value="' + dep_id + '">' + dep_name + '</option>');
    });

    //Chia sẻ ý tưởng
    $('#nut-csyt').click(function() {
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model_chiaseytuong_sdn').find('.select2_t_company').html('<option value="' + dep_id + '">' + dep_name + '</option>');
    });

    //Chào đón thành viên mới
    $('#nut-cdtvm').click(function() {
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model_chaodonthanhvienmoi').find('.model_chaodonthanhvienmoi')[0].dataset.position_id = dep_id;
    });

    //Tạo bình chọn
    $('#nut-tbc').click(function() {
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model-taobinhchon').find('.model-taobinhchon')[0].dataset.position_id = dep_id;
    });

    //Tạo tin tức nội bộ
    $('#nut-ttnb').click(function() {
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $("#model-taotinnoibo").find('.model-taotinnoibo')[0].dataset.position_id = dep_id;
    });

    //Tạo sự kiện
    $('#nut-tsk').click(function() {
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#nut-tsknb')[0].dataset.dep_id = dep_id;
        $('#nut-tsknb')[0].dataset.dep_name = dep_name;
        $('#nut-tskdn')[0].dataset.dep_id = dep_id;
        $('#nut-tskdn')[0].dataset.dep_name = dep_name;
    });
    //Tạo sự kiện nội bộ
    $('#nut-tsknb').click(function() {
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model_taosukien_noibo_sdn2').find('.position').html('<option value="' + dep_id + '">' + dep_name + '</option>');
    });

    //Tạo sự kiện đối ngoại
    $('#nut-tskdn').click(function() {
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model-taosukiendoingoai_sdn').find('.select2_t_company').html('<option value="' + dep_id + '">' + dep_name + '</option>');
    });
});
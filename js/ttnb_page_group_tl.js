$(document).ready(function () {
    $("#form_newfeed_ttnb").submit(function() {
        var title = $.trim($('#title_post_newfeed_1').val());
        var dep_id = $(this).data('dep_id');
        var type = $(this).data('type');
        if (title != '') {
            var data = new FormData();
            data.append('title', title);
            data.append('dep_id', dep_id);
            data.append('type', type);
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
    $('#nut-sda').click(function () { 
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        // $('.model_suaduan')
        $('.model_suaduan')[0].dataset.type = 1;
        $('.model_suaduan')[0].dataset.position_id = dep_id;
        $('.model_suaduan').find('.select2_t_company').remove();
        $('.model_suaduan').find('.select2').remove();
    });

    //Tạo thảo luận
    $('#nut-ttl').click(function(){
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model_taothaoluan').find('.model_taothaoluan')[0].dataset.type = 1;
        $('#model_taothaoluan').find('.model_taothaoluan')[0].dataset.dep_id = dep_id;
        $('#model_taothaoluan').find('.form_group_position').remove();
    });

    //Tạo khen thưởng
    $('#nut-tkt').click(function(){
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model_taokhenthuong').find('.model_taokhenthuong')[0].dataset.type = 1;
        $('#model_taokhenthuong').find('.model_taokhenthuong')[0].dataset.position_id = dep_id;
        $('#model_taokhenthuong').find('.model_taokhenthuong').find('.form_group_pos').remove();
    });

    //Chia sẻ ý tưởng
    $('#nut-csyt').click(function(){
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $("#model_chiaseytuong_sdn").find('.model_chiaseytuong')[0].dataset.type = 1;
        $("#model_chiaseytuong_sdn").find('.model_chiaseytuong')[0].dataset.dep_id = dep_id;
        $("#model_chiaseytuong_sdn").find('.form_group_pos').remove();
            // $('#model_taokhenthuong').find('.model_taothaoluan')[0].dataset.type = 1;
            // $('#model_taokhenthuong').find('.select2_t_company').remove();
            // $('#model_taokhenthuong').find('.select2').remove();
    });

    //Chào đón thành viên mới
    $('#nut-cdtvm').click(function(){
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model_chaodonthanhvienmoi').find('.model_chaodonthanhvienmoi')[0].dataset.position_id = dep_id;
        $('#model_chaodonthanhvienmoi').find('.model_chaodonthanhvienmoi')[0].dataset.type = 1;
    });

    //Tạo bình chọn
    $('#nut-tbc').click(function(){
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model-taobinhchon').find('.model-taobinhchon')[0].dataset.position_id = dep_id;
        $('#model-taobinhchon').find('.model-taobinhchon')[0].dataset.type = 1;
    });

    //Tạo tin tức nội bộ
    $('#nut-ttnb').click(function(){
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $("#model-taotinnoibo").find('.model-taotinnoibo')[0].dataset.position_id = dep_id;
        $('#model-taotinnoibo').find('.model-taotinnoibo')[0].dataset.type = 1;
    });

    //Tạo sự kiện
    $('#nut-tsk').click(function(){
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#nut-tsknb')[0].dataset.dep_id = dep_id;
        $('#nut-tsknb')[0].dataset.type = 1;
        $('#nut-tskdn')[0].dataset.dep_id = dep_id;
        $('#nut-tskdn')[0].dataset.dep_name = dep_name;
        $('#nut-tskdn')[0].dataset.type = 1;
    });
    //Tạo sự kiện nội bộ
    $('#nut-tsknb').click(function(){
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model_taosukien_noibo_sdn2').find('.model_taosukien_noibo_sdn')[0].dataset.position_id = dep_id;
        $('#model_taosukien_noibo_sdn2').find('.model_taosukien_noibo_sdn')[0].dataset.type = 1;
    });

    //Tạo sự kiện đối ngoại
    $('#nut-tskdn').click(function(){
        var dep_id = $(this).data('dep_id');
        var dep_name = $(this).data('dep_name');
        $('#model-taosukiendoingoai_sdn').find('.model-taosukiendoingoai')[0].dataset.type = 1;
        $('#model-taosukiendoingoai_sdn').find('.v_form_group_pos').remove();
        $('#model-taosukiendoingoai_sdn').find('.model-taosukiendoingoai')[0].dataset.dep_id = dep_id;
    });
});
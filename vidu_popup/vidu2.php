<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Cài đặt nhân viên chung</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/caidat.css">
  <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</style>
 
</head>
<body>
<h1>fsdajafslj</h1>
<div class="cd-popup popup_create_message" style="display: block;">
	<div class="cd_container">
		<div class="cd_modal">
			<div class="cd_modal_header">
				<h4 class="name_header">Tạo thông báo</h4>
				<img src="../img/dau_x.png" alt="" class="close_detl">
			</div>
			<div class="cd_modal_body">
				<form class="" method="" action="">
						<div class="form-body">
							<div class="form_group">
								<p class="text_message">
									(Thông báo giúp bạn gửi các thông tin quan trọng tới toàn thể thành viên trong phòng/ban. Thông báo được gửi kèm tới email của mọi thành viên)
								</p>
							</div>
							<div class="form_group">							
								<label for="" class="name">Bạn vui lòng chọn phòng ban muốn đăng thông báo<span class="cr_red">*</span></label>
								<div class="select_no_muti_li">
									<select class="select2_t_company select2s" name="select_truong_company">
										<!-- <option value="" disabled selected>Chọn trường công ty</option> -->
                                        <option value="1">Tường công ty</option>
                                        <option value="2">Phòng kỹ thuật</option>
                                        <option value="3">Phòng kinh doanh</option>
                                        <option value="4">Phòng nhân sự</option>
									</select>
								</div>
							</div>
							<div class="form_group form_chb d_flex ">
								<label for="" class="name">Giới tính<span class="cr_red">*</span></label>
								<div class="form_checkb d_flex ">
									<label><input type="radio" name="chb_gt"><span class="ckb_btn">af</span>Nam</label>
									<label><input type="radio" name="chb_gt"><span class="chb_btn">fas</span>Nữ</label>
								</div>
							</div>
							<div class="form_group">
								<label class="name">Ngày sinh<span class="cr_red">*</span></label>
								<input type="date" value="" name="dtm_ns" value="2017-06-01">
							</div>
							<div class="form_group">
								<label class="name">Quê quán<span class="cr_red">*</span></label>
								<input type="text" value="" name="txt_quequan" placeholder="Hà Nội">
							</div>
							<div class="form_group">
								<label class="name">Địa chỉ<span class="cr_red">*</span></label>
								<input type="text" value="" name="txt_address" placeholder="Vĩnh Tuy- Hà Nội">
							</div>
							<div class="form_group">
								<label class="name">SĐT<span class="cr_red">*</span></label>
								<input type="text" value="" name="txt_phone" placeholder="123456789">
							</div>
							<div class="form_group">
								<label for="" class="name">Email<span class="cr_red">*</span></label>
								<input type="text" value="" name="txt_email" placeholder="abc@gmail.com ">
							</div>
							<div class="form_group">
								<label for="" class="name">Trình độ học vấn<span class="cr_red">*</span></label>
								<input type="text" value="" name="txt_hocvan">
							</div>
							<div class="form_group">
								<label for="" class="name">Textarea<span class="cr_red">*</span></label>
								<textarea class="" cols="3" rows="3" placeholder="dfs"></textarea>
							</div>
							<div class="form_group">
								<label for="" class="name">Nội dung thảo luận chi tiết<span class="cr_red">*</span>
								</label>
								<textarea name="content" class="textarea_cheditor" id="content" placeholder="nhap noi dung"></textarea>
		                        <script type="text/javascript">
		                            CKEDITOR.replace("content");
		                        </script>
							</div>

							<div class="form_group">
								<label for="" class="name">Tình trạng hôn nhân<span class="cr_red">*</span></label>
								<input type="text" value="" name="txt_tthn">
							</div>
							<div class="form_group">
								<label for="" class="name">Ngày bắt đầu làm việc<span class="cr_red">*</span></label>
								<input type="date" value="" name="dtm_nlv">
							</div>
							<div class="form_group">
								<label for="" class="name">Chức vụ<span class="cr_red">*</span></label>
								<input type="txt" value="" name="txt_cv">
							</div>
							<div class="form_buttom">
									<button class="btn_huy" type="">Hủy</button>
									<button class="btn_luu">Lưu thông tin</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script type="type/javascript" src="../js/lazysizes.min.js"></script>
<script src="../js/select2.min.js"></script>
<script type="text/javascript">
	$('h1').click(function(){
		$('.cd-popup').show();
	})
</script>
<script>
    $('.select2_t_company').select2({
        width: '100%',
    })
</script>

</html>
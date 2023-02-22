<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Cài đặt nhân viên chung</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/caidat.css">
  <script src="../js/jquery-3.4.1.min.js"></script>
</style>
 
</head>
<body>
<h1>fsdajafslj</h1>
<div class="cd-popup modal_popup_tn_tl" id="popup_t_1" style="display: block;" >
	<div class="cd_container">
		<div class="cd_modal">
			<div class="cd_modal_header">
				<h4 class="name_header">Thêm nhóm - thảo luận</h4>
				<img src="../img/dau_x.png" alt="" class="close_detl">
			</div>
			<div class="cd_modal_body">
				<form class="" method="" action="">
						<div class="form-body">
							<div class="form_group">							
								<label for="" class="name">Họ tên<span class="cr_red">*</span></label>
								<input type="text" class="frm_input" name="txt" placeholder="Phạm Văn Minh">
							</div>
							<div class="form_group form_chb d_flex ">
								<label for="" class="name">Giới tính<span class="cr_red">*</span></label>
								<div class="form_checkb d_flex ">
									<label><input type="radio" name="chb_gt"><span class="ckb_btn"><span class="nut_check"></span></span>Nam</label>
									<label><input type="radio" name="chb_gt"><span class="ckb_btn"><span class="nut_check"></span></span>Nữ</label>
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
							<div class="form_group input_xanh">
								<label for="" class="name">Chọn tệp đính kèm<span class="cr_red">*</span></label>
								<label for="input_file1">
									<input type="file" name=""  class="custom-file-input" multiple >
								</label>
							</div>
							<div class="form_group">
								<label for="" class="name">Ảnh bìa<span class="cr_red">*</span></label>
								<label for="input_file1">
									<input type="file" name=""  class="custom-file-img-input" multiple >
								</label>
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
<script type="text/javascript">
	$('h1').click(function(){
		$('.cd-popup').show();
	})
	$(".custom-file-input").click(function () {
    $(".custom-file-input").trigger('tải file');
});
</script>

<script src="../js/caidat.js"></script>
</html>
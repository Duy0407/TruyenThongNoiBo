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
				<h4 class="name_header">Thêm nhóm - thảo luận</h4>
				<img src="../img/dau_x.png" alt="" class="close_detl">
			</div>
			<div class="cd_modal_body">
				<form class="" method="" action="">
						<div class="form-body">
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
							<div class="form_group">
								<label class="name">Tên nhóm*<span class="cr_red">*</span></label>
								<input type="text" value="" name="txt_name_group"  placeholder="Nhập tên nhóm">
							</div>
							<div class="form_group">
								<label class="name">Quản trị<span class="cr_red">*</span></label>
								<div class="form_select2">
									<select class="select2_muti_qt" multiple name="select2_qt[]">
										<option>Nguyễn Văn A</option>
										<option>Nguyễn Văn A</option>
										<option>Nguyễn Văn A</option>
										<option>Nguyễn Văn A</option>
									</select>
								</div>
							</div>
							<div class="form_group">
								<label class="name">Ảnh bìa nhóm<span class="cr_red">*</span></label>
								<label for="input_file1">
									<input type="file" name=""  class="custom-file-img-input" multiple >
								</label>
							</div>
							<div class="form_group">
								<label class="name">Ảnh đại diện nhóm<span class="cr_red">*</span></label>
								<label for="input_file1">
									<input type="file" name=""  class="custom-file-img-input" multiple >
								</label>
							</div>
							<div class="form_group">
								<label for="" class="name">Mô tả<span class="cr_red">*</span></label>
								<input type="text" value="" name="txt_email" placeholder="Nhập mô tả ">
							</div>
							<div class="form_group">
								<label class="name">Thành viên<span class="cr_red">*</span></label>
								<div class="form_select2">
									<select class="select2_muti_tv" multiple name="select2_tv[]">
										<option>Nguyễn Văn B</option>
										<option>Nguyễn Văn B</option>
										<option>Nguyễn Văn B</option>
										<option>Nguyễn Văn B</option>
									</select>
								</div>
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
    $('.select2_muti_qt').select2({
        width: '100%',
        placeholder: 'Thêm thành viên quản trị',
    })
    $('.select2_muti_tv').select2({
    	width: '100%',
        placeholder: 'Thêm thành viên thực hiện',
    })
</script>

</html>
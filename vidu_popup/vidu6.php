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
<div class="cd-popup popup_ctnv">
	<div class="cd_container">
		<div class="cd_modal">
			<div class="cd_modal_header">
				<h4 class="name_header">Chi tiết nhân viên</h4>
			</div>
			<div class="cd_modal_body">
				<div class="row1_modal_ctnv d_flex">
					<div class="col_ctnv_left">
						<div class="img_ctnv">
							<img src="../img/img33.png" alt="">
						</div>
						<div class="tt_ctnv">
							<p class="full_name">
								Phạm Văn Minh
							</p>
							<p class="the_p5"><b>Bộ phận:</b> Thiết kế</p>
							<p class="the_p5"><b>Vị trí:</b> Quản lý cấp cao</p>
						</div>
					</div>
					<div class="col_ctnv_right">
						<p class="ctnv_edit">
							Chỉnh sửa
						</p>
					</div>
				</div>	
				<div class="row_modal_ctnv d_flex">
					<div class="col_ctnv_left">
						<p class="the_p_ctnv"><b>Địa chỉ:</b> Vĩnh Tuy-  Hà Nội</p>
					</div>
					<div class="col_ctnv_right">
						<p class="the_p_ctnv"><b>Giới tính:</b> Nam</p>
					</div>
				</div>
				<div class="row_modal_ctnv d_flex">
					<div class="col_ctnv_left">
						<p class="the_p_ctnv"><b>Quên quán: </b> Hà Nội</p>
					</div>
					<div class="col_ctnv_right">
						<p class="the_p_ctnv"><b>Mã nhân viên: </b> 123456</p>
					</div>
				</div>
				<div class="row_modal_ctnv d_flex">
					<div class="col_ctnv_left">
						<p class="the_p_ctnv"><b>Ngày sinh: </b> 10/10/1900</p>
					</div>
					<div class="col_ctnv_right">
						<p class="the_p_ctnv"><b>Chức vụ: </b> Quản lý cấp cao</p>
					</div>
				</div>
				<div class="row_modal_ctnv d_flex">
					<div class="col_ctnv_left">
						<p class="the_p_ctnv"><b>Emai: </b> abc@gmail.com</p>
					</div>
					<div class="col_ctnv_right">
						<p class="the_p_ctnv"><b>Tình trạng hôn nhân:</b> Đã có gia đình</p>
					</div>
				</div>
				<div class="row_modal_ctnv d_flex">
					<div class="col_ctnv_left">
						<p class="the_p_ctnv"><b>Số điện thoại: </b> 12345679</p>
					</div>
					<div class="col_ctnv_right">
						<p class="the_p_ctnv"><b>Ngày bắt đầu làm việc: </b> 10/10/2000</p>
					</div>
				</div>
				<div class="row_modal_ctnv d_flex">
					<div class="col_ctnv_left">
						<p class="the_p_ctnv"><b>Tình độ học vấn: </b> Tốt nghiệp Đại học ABC</p>
					</div>
				</div>
				<div class="form_buttom">
					<button class="btn_luu">Lưu thay đổi</button>
				</div>
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
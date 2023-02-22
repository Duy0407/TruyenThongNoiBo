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
<div class="cd-modal-del" style="display: block;">
	<div class="cd_container">
		<div class="cd_modal">
			<div class="cd_modal_header">
				<h4 class="name_header">Xóa thông báo</h4>
				<img src="../img/dau_x.png" alt="" class="close_detl">
			</div>
			<div class="cd_modal_body">
				<form class="" method="" action="">
						<div class="form-body">
							<div class="row_modal_del">
								<p class="p_popup_del"><b>Bạn có muốn xóa nội dung bản thông báo này? </b></p>
								<p class="p_popup_del">Tất cả thông tin sẽ được lưu tự động vào <b>Đã xóa gần đây</b> trong thời gian 05 ngày trước khi bị xóa vĩnh viễn</p>
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
		$('.cd-modal-del').show();
	})
</script>
<script>
    $('.select2_t_company').select2({
        width: '100%',
    })
</script>

</html>
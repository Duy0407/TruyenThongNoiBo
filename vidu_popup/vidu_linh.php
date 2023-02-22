<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Cài đặt nhân viên chung</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="../js/jquery-3.4.1.min.js"></script>
<style type="text/css">
	.box2{
		background: red;
	}
	.manage_header{
		display: none;
	}
	.box1 .manage_header_hover:hover ~ .manage_header1{
		display: block;
	}
	.box2 .manage_header_hover:hover ~ .manage_header2{
		display: block;
	}

</style>

</head>
<body>
	<div class="box1">
		<div class="manage_header_hover">
          <p class="title_hover">Cài đặt chung</p>
        </div>
        <div class="manage_header manage_header1">
          <div class="li_manage active " data-id='manage_cdc'>
            <p class="title_manage ">Cài đặt chung</p>
          </div>
          <div class="li_manage " data-id='manage_ttcn'>
            <p class="title_manage ">Thông tin cá nhân</p>
          </div>
          <div class="li_manage " data-id='manage_ttbm'>
            <p class="title_manage ">Thông tin bảo mật</p>
          </div>
          <div class="li_manage " data-id='manage_nkhd'>
            <p class="title_manage ">Nhật ký hoạt động</p>
          </div>
          <div class="li_manage " data-id='manage_dstv'>
            <p class="title_manage  ">Danh sách thành viên</p>
          </div>
          <div class="li_manage " data-id='manage_group_tl'>
            <p class="title_manage">Nhóm - thảo luận</p>
          </div>
        </div>
    </div>
    <div class="box2">
		<div class="manage_header_hover">
          <p class="title_hover">Cài đặt chung</p>
        </div>
        <div class="manage_header manage_header2">
          <div class="li_manage active " data-id='manage_cdc'>
            <p class="title_manage ">Cài đặt chung</p>
          </div>
          <div class="li_manage " data-id='manage_ttcn'>
            <p class="title_manage ">Thông tin cá nhân</p>
          </div>
          <div class="li_manage " data-id='manage_ttbm'>
            <p class="title_manage ">Thông tin bảo mật</p>
          </div>
          <div class="li_manage " data-id='manage_nkhd'>
            <p class="title_manage ">Nhật ký hoạt động</p>
          </div>
          <div class="li_manage " data-id='manage_dstv'>
            <p class="title_manage  ">Danh sách thành viên</p>
          </div>
          <div class="li_manage " data-id='manage_group_tl'>
            <p class="title_manage">Nhóm - thảo luận</p>
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
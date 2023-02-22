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

<form action="" method="post" >
<input type="file" name="img" class="input">
<button class="abc" name="btn">click</button>
</form>
</body>

<?php 
	$abc = "";
	if(isset($_POST['btn'])){
		$abc = $_POST["img"];
		echo $abc;
	}
 ?>
<script src="../js/jquery-3.4.1.min.js"></script>
<script type="type/javascript" src="../js/lazysizes.min.js"></script>
<script src="../js/select2.min.js"></script>
<script type="text/javascript">
	$('.vidu_popup').change(function(){
		var img_src = $(this).name();
		alert(img_src);
	})
	$('.abc').click(function(){
		
	})
</script>
<script>
    
</script>

</html>
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
<input type="file" name="img" class="img_id">
<button class="btn">click</button>
<img src="../img/anh.png" class="img_show">

</body>
<script type="text/javascript">
	$('.btn').click(function(){
		// var src = time()($('input.img_id[type=file]').val());
		// alert(src);
		//$('.img_show').attr('src',src);
	})
	$('input[type=file]').change(function(){
		var abc = $(this).val();
		file_data = $(this).prop('files')[0];
		// abcd = abc.attr('tmp_name'); 
		var type = file_data.type;
		var fileToLoad = file_data;
		var fileReader = new FileReader();
		fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result;
        // var newImage = document.createElement('img');
        //     newImage.src = srcData;
            // $('body').append(newImage.outerHTML);
            $('.img_show').attr('src',srcData);
    };
    var abcd = fileReader.readAsDataURL(fileToLoad);
    console.log(abcd);
	})
</script>

</html>
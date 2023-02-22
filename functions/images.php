<?php 
if (isset($_POST['img'])) {
	$domain = $_SERVER['SERVER_NAME'];
	$data = array();
	foreach ($_POST['img'] as $key => $value) {
		$folder="";
		$url_for_image = $value;

		$path = explode('/',$value);
			array_shift($path);
			array_shift($path);
			$img = array_pop($path);
			array_shift($path);
			foreach ($path as $key => $value) {
				if ($folder == "") {
					$folder = $value;
				}else{
					$folder = $folder.'/'.$value;
				}
				if (!is_dir('../'.$folder)) {
					mkdir('../'.$folder);
				}
			}
			$filename = urldecode(basename($url_for_image));
			$filename = str_replace(' ', '-', $filename);

			$complete_save_loc = '../'.$folder.'/'.$filename;

			if (file_exists($complete_save_loc)) {
				echo "http://".$domain.'/'.$folder.'/'.$filename.';';
			}else{
			  $url = getimagesize($url_for_image);
			  if (is_array($url)) {
			    file_put_contents($complete_save_loc, file_get_contents($url_for_image));
			  } 
			  echo "http://".$domain.'/'.$folder.'/'.$filename.';';
			}

	}
}

?>
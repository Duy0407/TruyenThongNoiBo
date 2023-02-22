<?
include("../home/config.php"); 
require_once("lib_image.php");

error_reporting(E_ERROR | E_PARSE);

if (isset($_GET['edit'])) {
$db_listing = new db_query("SELECT new_id, new_picture, new_date FROM news WHERE new_cate_id = ".$webid." AND new_id = '".$_GET['edit']."'");
}else{
$db_listing = new db_query("SELECT new_id, new_picture, new_date FROM news WHERE new_cate_id = ".$webid." AND new_c_img = '0' ORDER BY new_id ASC LIMIT 20");
}


if(mysql_num_rows($db_listing->result) > 0)
{

   while($row = mysql_fetch_assoc($db_listing->result)){

   	 	$file_path = '../pictures/news/'.$row['new_picture'];
   	 	$url_for_image = 'http://content5.hunghapay.com/pictures/news/'.$row['new_picture']; 
   	 	//link************************************************************************************

   	 	// echo $url_for_image;

   	 	$date = explode('/',$row['new_picture']);
   	 	$Y = $date[0];
   	 	$m = $date[1];
   	 	$d = $date[2];


		if(!is_dir('../pictures/tmp_img/'.$Y)){
			mkdir('../pictures/tmp_img/'.$Y, 0755, TRUE);
		}
		if(!is_dir('../pictures/tmp_img/'.$Y."/".$m)){
			mkdir('../pictures/tmp_img/'.$Y."/".$m, 0755, TRUE);
		}
		if(!is_dir('../pictures/tmp_img/'.$Y."/".$m."/".$d)){
			mkdir('../pictures/tmp_img/'.$Y."/".$m."/".$d, 0755, TRUE);
		}

   	 	$complete_save_loc = '../pictures/tmp_img/'.$row['new_picture'];

	  	if (file_exists($file_path)) {
			$db_ex = new db_execute("UPDATE news SET new_c_img = '1' WHERE new_id = ".$row['new_id']."");
			continue;
		}else{
		  $url = getimagesize($url_for_image);
		  if (is_array($url)) {
		    file_put_contents($complete_save_loc, file_get_contents($url_for_image));
		  }
		  unset($url); 
		}


		$url = $complete_save_loc;
		$file_name = array_pop(explode('/',$row['new_picture']));
		$file_name = array_shift(explode('.',$file_name));
		$dd = array_pop(explode('.',$row['new_picture']));


			if (isset($url) && $url != '') {


				$picture = $Y."/".$m."/".$d."/".$file_name;	
				$fs_filepath_re = '../pictures/news/'.$Y."/".$m."/".$d;	
				if(!is_dir('../pictures/news/'.$Y)){
					mkdir('../pictures/news/'.$Y, 0755, TRUE);
				}
				if(!is_dir('../pictures/news/'.$Y."/".$m)){
					mkdir('../pictures/news/'.$Y."/".$m, 0755, TRUE);
				}
				if(!is_dir('../pictures/news/'.$Y."/".$m."/".$d)){
					mkdir('../pictures/news/'.$Y."/".$m."/".$d, 0755, TRUE);
				}
                                              
				    $imageThumb = new Image($url);                         
         	            
				    // if($imageThumb->getWidth() > 310){          
				    //     $imageThumb->resize(310,'resize');
				    // }

				    $imageThumb->save($file_name, $fs_filepath_re, $dd);

				    $db_ex = new db_execute("UPDATE news SET new_c_img = '1' WHERE new_id = ".$row['new_id']."");
				    unlink($url);
					if (!isset($_GET['edit'])) {
						echo '<meta http-equiv="refresh" content="10"/>';
					}
				    echo $url.'<br/>';

			}
      unset($picture,$row,$dd,$db_ex,$url);
	}
}else{
   echo "Đã lấy lại toàn bộ ảnh";
   exit();	
}

?>
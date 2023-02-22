<?
include("../home/config.php"); 
require_once("lib_image.php");

error_reporting(E_ERROR | E_PARSE);

function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = array();
    for ($i = 0; $i < 13; $i++) {
        $randstring[] = $characters[rand(0, strlen($characters))];
    }
    $rands = implode('', $randstring);
    return $rands;
}

function file_contents_exist($url, $response_code = 200)
{
    $headers = get_headers($url);

    if (substr($headers[0], 9, 3) == $response_code)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

if (isset($_GET['edit'])) {
$db_listing = new db_query("SELECT new_id, new_description, new_date FROM news WHERE new_cate_id = ".$webid." AND new_id = '".$_GET['edit']."'");
}else{
$db_listing = new db_query("SELECT new_id, new_description, new_date FROM news WHERE new_cate_id = ".$webid." AND new_d_img = '0' ORDER BY new_id DESC LIMIT 5");
}



if(mysql_num_rows($db_listing->result) > 0)
{

   while($row = mysql_fetch_assoc($db_listing->result)){

		$html = $row['new_description'];
		preg_match_all('/<img[^>]+src=(?:\"|\')\K(.[^">]+?)(?=\"|\')/', $html, $urls);


		$urls = $urls[1];

   	 	$Y = date("Y",$row['new_date']);
   	 	$m = date("m",$row['new_date']);
   	 	$d = date("d",$row['new_date']);


		if(!is_dir('../pictures/tmp_img/'.$Y)){
			mkdir('../pictures/tmp_img/'.$Y, 0755, TRUE);
		}
		if(!is_dir('../pictures/tmp_img/'.$Y."/".$m)){
			mkdir('../pictures/tmp_img/'.$Y."/".$m, 0755, TRUE);
		}
		if(!is_dir('../pictures/tmp_img/'.$Y."/".$m."/".$d)){
			mkdir('../pictures/tmp_img/'.$Y."/".$m."/".$d, 0755, TRUE);
		}

		foreach ($urls as $value) {
			$value = trim($value);

			$file_name = end(explode('/', $value));
			$file_name = reset(explode('.', $file_name));

			$complete_save_loc = '../pictures/tmp_img/'.$Y."/".$m."/".$d."/".$file_name;

			$dd = array_pop(explode('.', $value));
			if ($dd != 'jpg' && $dd != 'png' && $dd != 'jpeg' && $dd != 'gif'  && $dd != 'JPG' && $dd != 'PNG' && $dd != 'JPEG') {
				$db_ex = new db_execute("UPDATE news SET new_d_img = '1' WHERE new_id = ".$row['new_id']."");
				continue;
			}
			$url = $complete_save_loc.'.'.$dd;
			$url_img = file_get_contents($value);
			if(file_contents_exist($value)) {
				file_put_contents($url, file_get_contents($value));
			}else{
				//link***********************************************************************************
				$url_sc = str_replace('/pictures/images/', 'http://content5.hunghapay.com/pictures/images/', $value);
				if(file_contents_exist($url_sc)) {
					file_put_contents($url, file_get_contents($url_sc));
				}else{
				$db_ex = new db_execute("UPDATE news SET new_d_img = '1' WHERE new_id = ".$row['new_id']."");
				continue;}
			}

			$imageThumb = new Image($url); 

		    // if($imageThumb->getWidth() > 600){          
		    //     $imageThumb->resize(600,'resize');
		    // }
			$file_name = replaceTitle(urldecode($file_name));
			$fs_filepath_re = '../pictures/images/';	
		    $imageThumb->save($file_name, $fs_filepath_re, $dd);
		    $html = str_replace($value, $domain.'/pictures/images/'.$file_name.'.'.$dd, $html);
		}

		$db_ex = new db_execute("UPDATE news SET  new_d_img = '1',new_description = '".Addslashes($html)."' WHERE new_id = ".$row['new_id']."");
		unlink($url);
		echo "Bài có id ".$row['new_id'].'<br/>';
		if (!isset($_GET['edit'])) {
			echo '<meta http-equiv="refresh" content="10"/>';
		}
		
		}
}else{
   echo "Đã lấy lại toàn bộ ảnh";
   exit();	
}


?>
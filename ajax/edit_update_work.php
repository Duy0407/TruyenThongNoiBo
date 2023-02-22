<?php 
require '../config/config.php';
$content = getValue('content','str','POST','');
$feel = getValue('feel','int','POST','');
$activity = getValue('activity','int','POST','');
$district = getValue('district','int','POST','');
$city = getValue('city','int','POST','');
$location = getValue('location','str','POST','');

$view_mode = getValue('view_mode','int','POST',0);
$except = getValue('except','str','POST','');

$new_id = getValue('new_id','int','POST','');
$db_nf = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
$row = mysql_fetch_array($db_nf->result);

$file_html = '';
$imgv_html = '';

if (isset($_POST['view_mode'])){
	$data['view_mode'] = $view_mode; 
	$data['except'] = $except;
	// $data['updated_at'] = time();

	// cập nhật chế độ xem
	$del_tags = delete('new_view_mode', ['nvm_new_id' => $new_id]);
	$list_excepts = json_decode(getValue('arr_excepts','arr','POST',''), true);
	if (count($list_excepts) > 0) {
		foreach ($list_excepts as $k => $v) {
			$data_insert_excepts = [
				'nvm_new_id' => $new_id,
				'nvm_user_id' => $v['id'],
				'nvm_user_type' => $v['type'], 
				'nvm_type' => $v['type_regime'], 
				'nvm_created_at' => time(),
				'nvm_updated_at' => time(),
			]; 
			add('new_view_mode', $data_insert_excepts);
		}  
	} 
}else{
	$data['feel'] = $feel;
	$data['activity'] = $activity;
	
	$data['district'] = $district;
	$data['city'] = $city;
	$data['location'] = $location;
	
	$arr_post_image = getValue('arr_post_image','arr','POST','');
	$arr_post_image = explode(",", $arr_post_image);
	
	$arr_post_name_image = getValue('arr_post_name_image','arr','POST','');
	$arr_post_name_image = explode(",", $arr_post_name_image);
	$id_user_tag = getValue('id_user_tag','arr','POST','');
	$path_image0 = "";
	$name_image0 = "";
	
	for ($i=0; $i < count($arr_post_image); $i++) { 
		if ($i == count($arr_post_image) - 1) {
			$path_image0 = $path_image0 . $arr_post_image[$i];
			$name_image0 = $name_image0 . $arr_post_name_image[$i];
		}else{
			$path_image0 = $path_image0 . $arr_post_image[$i] . "||";
			$name_image0 = $name_image0 . $arr_post_name_image[$i] . "||";
		}
	}
	
	$arr_post_file = getValue('arr_post_file','arr','POST','');
	$arr_post_file = explode(",", $arr_post_file);
	
	$arr_post_name_file = getValue('arr_post_name_file','arr', 'POST','');
	$arr_post_name_file = explode(",", $arr_post_name_file);
	
	$path_file0 = "";
	$name_file0 = "";
	
	for ($i=0; $i < count($arr_post_file); $i++) { 
		if ($i == count($arr_post_file) - 1) {
			$path_file0 = $path_file0 . $arr_post_file[$i];
			$name_file0 = $name_file0 . $arr_post_name_file[$i];
		}else{
			$path_file0 = $path_file0 . $arr_post_file[$i] . "||";
			$name_file0 = $name_file0 . $arr_post_name_file[$i] . "||";
		}
	}
	
	$path0 = "";
	$name0 = "";
	
	if ($path_file0 != "" && $path_image0 == "") {
		$path0 = $path_file0;
		$name0 = $name_file0;
	}else if ($path_file0 == "" && $path_image0 != "") {
		$path0 = $path_image0;
		$name0 = $name_image0;
	}else if ($path_file0 != "" && $path_image0 != "") {
		$path0 = $path_image0 . "||" . $path_file0;
		$name0 = $name_image0 . "||" . $name_file0;
	}
	
	$link_file = "../img/new_feed/dang_tin/";
	if (!is_dir($link_file.$row['author'])) {
		mkdir($link_file.$row['author'],0777,true);
	}
	if (!is_dir($link_file.$row['author'] . "/file")) {
		mkdir($link_file.$row['author'] . "/file",0777,true);
	}
	$dir_file = $link_file.$row['author'] . "/file" . "/";
	
	if (!is_dir($link_file.$row['author'] . "/image")) {
		mkdir($link_file.$row['author'] . "/image",0777,true);
	}
	$dir_image = $link_file.$row['author'] . "/image" . "/";
	
	if (!is_dir($link_file.$row['author'] . "/video")) {
		mkdir($link_file.$row['author'] . "/video",0777,true);
	}
	$dir_video = $link_file.$row['author'] . "/video" . "/";
	
	$path_file1 = "";
	
	$path_image1 = "";
	
	$name_file1 = "";
	
	$name_image1 = "";
	
	if (isset($_FILES['file'])) {
		for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
			$duoi = explode(".", $_FILES['file']['name'][$i]);
			$duoi = $duoi[count($duoi) - 1];
	
			$n_file = rand() . "." . $duoi;
	
			$dir_path_file = $dir_file . $n_file;
	
			move_uploaded_file($_FILES['file']['tmp_name'][$i],$dir_path_file);
	
			if ($i == count($_FILES['file']['name']) - 1) {
				$path_file1 = $path_file1 . $dir_path_file;
				$name_file1 = $name_file1 . $_FILES['file']['name'][$i];
			}else{
				$path_file1 = $path_file1 . $dir_path_file . "||";
				$name_file1 = $name_file1 . $_FILES['file']['name'][$i] . "||";
			}
		}
	}
	
	if (isset($_FILES['image'])) {
		for ($i=0; $i < count($_FILES['image']['name']); $i++) {
			$duoi = explode(".", $_FILES['image']['name'][$i]);
			$duoi = $duoi[count($duoi) - 1];
	
			$n_file = rand() . "." . $duoi;
			if (preg_match('/image/', $_FILES['image']['type'][$i])) {
				$dir_path_file = $dir_image . $n_file;
				move_uploaded_file($_FILES['image']['tmp_name'][$i],$dir_path_file);
			}else{
				$dir_path_file = $dir_video . $n_file;
				move_uploaded_file($_FILES['image']['tmp_name'][$i],$dir_path_file);
			}
	
			if ($i == count($_FILES['image']['name']) - 1) {
				$path_image1 = $path_image1 . $dir_path_file;
				$name_image1 = $name_image1 . $_FILES['image']['name'][$i];
			}else{
				$path_image1 = $path_image1 . $dir_path_file . "||";
				$name_image1 = $name_image1 . $_FILES['image']['name'][$i] . "||";
			}
		}
	}
	
	$path1 = "";
	$name1 = "";
	if ($path_image1 == "" && $path_file1 != "") {
		$path1 = $path_file1;
	}else if ($path_file1 == "" && $path_image1 != "") {
		$path1 = $path_image1;
	}else if ($path_file1 != "" && $path_image1 != ""){
		$path1 = $path_file1 . "||" . $path_image1;
	}
	
	if ($name_image1 == "" && $name_file1 != "") {
		$name1 = $name_file1;
	}else if ($name_file1 == "" && $name_image1 != "") {
		$name1 = $name_image1;
	}else if ($name_file1 != "" && $name_image1 != ""){
		$name1 = $name_file1 . "||" . $name_image1;
	}
	
	$path = "";
	$name = "";
	
	if ($path0 == "" && $path1 != "") {
		$path = $path1;
	}else if ($path0 != "" && $path1 == "") {
		$path = $path0;
	}else if ($path0 != "" && $path1 != "") {
		$path = $path0 . "||" . $path1;
	}
	
	if ($name0 == "" && $name1 != "") {
		$name = $name1;
	}else if ($name0 != "" && $name1 == "") {
		$name = $name0;
	}else if ($name0 != "" && $name1 != "") {
		$name = $name0 . "||" . $name1;
	}
	$data['content'] = $content;
	$data['file'] = $path;
	$data['name_file'] = $name;
	$data['id_user_tags'] = $id_user_tag;
	$data['delete'] = 0;
	$data['updated_at'] = time();
	
	if ($row['type'] == 1 && array_key_exists($row['position'],$arr_group)){
		if ($my_type == 1){
			$mem_in_group = new db_query("SELECT * FROM `group_member`
			WHERE group_id = ".$row['position']." AND user_id = $my_id AND user_type = $my_type");
		}else{
			$mem_in_group = new db_query("SELECT * FROM `group_member`
			WHERE group_id = ".$row['position']." AND user_id = $my_id AND (user_type = 0 OR user_type = 2)");
		}
		$mem_in_group = mysql_fetch_array($mem_in_group->result);
		if ($arr_group[$row['position']]['pheduyet_noidung_edit'] == 0 || $row['approve'] == 2){ // bài viết bị gỡ || bị từ chối
			if ($mem_in_group['type_mem'] > 0){
				$data['approve'] = 0;
			}else{
				$data['approve'] = 1;
			}
		}
	}

	// cập nhật ds user đc tag
	$del_tags = delete('new_tags', ['nt_new_id' => $new_id]);
	$list_tags = json_decode(getValue('arr_tags','arr','POST',''), true);
	if (count($list_tags) > 0) {
		foreach ($list_tags as $k => $v) {
			$data_insert_tags = [
				'nt_new_id' => $new_id,
				'nt_user_id' => $v['id'],
				'nt_user_type' => $v['type'], 
				'nt_created_at' => time(),
				'nt_updated_at' => time(),
			]; 
			add('new_tags', $data_insert_tags);
		}  
	}

	// check xem đâu là file đâu là ảnh/video
	$name_file = explode("||", $name);
	$file = explode("||", $path);
	$arr_file = [];
	$arr_image = [];
	$arr_name_file = [];

	for ($i=0; $i < count($file); $i++) { 
		if (preg_match('/image/', $file[$i]) == true || preg_match('/video/', $file[$i]) == true) {
			$arr_image[] = $file[$i];
		}else if (preg_match('/file/', $file[$i]) == true){
			$arr_file[] = $file[$i];
			$arr_name_file[] = $name_file[$i];
		}
	}
	// đổ dl file
	for ($i=0; $i < count($arr_file); $i++) {
		$file_html .= '<a download class="ep_post_file_div_detail" href="'.$arr_file[$i].'">
			<p class="ep_post_name_file">'.$arr_name_file[$i].'</p>
			<p class="ep_post_file_size">'.convert_filesize(filesize($arr_file[$i])).' '.date('H:i, d/m/Y',$row['created_at']).'</p>
			<img class="icon_download" src="../img/icon_download.svg" alt="Ảnh lỗi">
		</a>';
	}
	// đổ dl ảnh/video
	if (count($arr_image) >= 3){
		$imgv_html .= '<div class="post_img_left three">
			<div class="post_img_item">';
		if (preg_match('/image/', $arr_image[0]) == true){
			$imgv_html .= '<img class="ep_post_file_img_detail post_img_item_detail" src="'.$arr_image[0].'" alt="Ảnh lỗi">';
		}elseif (preg_match('/video/', $arr_image[0]) == true){
			$imgv_html .= '<video class="ep_post_file_img_detail post_img_item_detail" controls="">
						<source src="'.$arr_image[0].'">
					</video>';
		}
		$imgv_html .= '</div>
		</div>
		<div class="post_img_right three">';
		for ($i=1; $i < 3; $i++) {
			$imgv_html .= '<div class="post_img_item">';
			if (preg_match('/image/', $arr_image[$i]) == true){
				$imgv_html .= '<img class="ep_post_file_img_detail post_img_item_detail" src="'.$arr_image[$i].'" alt="Ảnh lỗi">';
			}elseif (preg_match('/video/', $arr_image[$i]) == true){
				$imgv_html .= '<video class="ep_post_file_img_detail post_img_item_detail" controls="">
							<source src="'.$arr_image[$i].'">
						</video>';
			}
			$imgv_html .= '</div>';
			if (count($arr_image) - 3 > 0) {
				$imgv_html .= '<button class="total_more_img">+'.(count($arr_image) - 3).'</button>';
			}
		}
		$imgv_html .= '</div>';
	}else{
		for ($i=0; $i < count($arr_image); $i++) {
			$imgv_html .= '<div class="post_img_left one">
				<div class="post_img_item">';
			if (preg_match('/image/', $arr_image[$i]) == true){
				$imgv_html .= '<img class="ep_post_file_img_detail post_img_item_detail" src="'.$arr_image[$i].'" alt="Ảnh lỗi">';
			}elseif (preg_match('/video/', $arr_image[$i]) == true){
				$imgv_html .= '<video class="ep_post_file_img_detail post_img_item_detail" controls="">
							<source src="'.$arr_image[$i].'">
						</video>';
			}
			$imgv_html .= '</div>
			</div>';
		}
	}
}

$dataId = [
	'new_id'=>$new_id
];

update('new_feed',$data,$dataId);
if ($row['show_time'] && $row['show_time'] > time()) {
	$show_time = $row['show_time'];
} else {
	$show_time = '';
}

echo json_encode([
	'result' => true,
	'file_html' => $file_html,
	'imgv_html' => $imgv_html,
	'show_time' => $show_time,
	'position' => $row['position'],
	'type' => $row['type'],
	'approve' => (isset($data['approve']) && $data['approve'] == 1)?1:0,
]);
?>
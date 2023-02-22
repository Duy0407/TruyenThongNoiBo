<?php
require_once '../config/config.php';
$search_book = getValue('search_book','str','POST','');
$db_search = new db_query("SELECT * FROM knowledge WHERE name LIKE '%$search_book%' AND `delete` = 0 ORDER BY id DESC");
$html = '';
$j = 1;
while($row_doc = mysql_fetch_array($db_search->result)){
	if ($j == 1) {
		$img = "../img/listbook3.png";
	}else if ($j == 2) {
		$img = "../img/listbook4.png";
	}else if ($j == 3) {
		$img = "../img/listbook1.png";
	}else if ($j == 4) {
		$img = "../img/listbook2.png";
	}
	if ($row_doc['user_type'] == 1) {
		if ($_SESSION['login']['user_type'] == 1) {
			$name_author = $_SESSION['login']['name'];
		}else{
			$name_author = $data_ep[$_SESSION['login']['id']]->com_name; 
		}
	}else if ($row_doc['user_type'] == 2){
		$name_author = $data_ep[$_SESSION['login']['id']]->ep_name; 
	}
	$html = $html . '<div class="book">
	<div class="book-img"><img src="'.$img.'" alt="Ảnh lỗi"></div>
	<div class="text-book">
	<div class="item-file">
	<p>Tên tài liệu: '.$row_doc['name'].'</p>
	<div class="box_cha_model_tung_1">
	<img src="../img/3itemfile.png" alt="Ảnh lỗi" class="show_tung1" onclick="show_document(this)">
	<div class="model_tung_1">
	<div class="ul_model">
	<a class="li_model" download href="../img/knowledge/'.$row_doc['id_user'].'/'.$row_doc['file'].'">
	<img class="imgtung" src="../img/tung1.png" alt="Ảnh lỗi">
	<p class="p_model">Tải xuống</p>
	</a>
	<div class="li_model  model2" data-id="'.$row_doc['id'].'" onclick="edit_document(this)">
	<img class="imgtung" src="../img/tung2.png" alt="Ảnh lỗi">
	<p class="p_model">Chỉnh sửa thông tin tài liệu</p>
	</div>
	<div class="li_model  model3" data-id="'.$row_doc['id'].'" onclick="knowledge_answer(this)">
	<img class="imgtung" src="../img/tung3.png" alt="Ảnh lỗi">
	<p class="p_model">Trao đổi - đặt câu hỏi</p>
	</div>
	<div class="li_model  model4" data-id="'.$row_doc['id'].'" onclick="delele_document(this)">
	<img class="imgtung" src="../img/tung4.png" alt="Ảnh lỗi">
	<p class="p_model">Xóa thông tin tài liệu</p>
	</div>
	</div>
	</div>
	</div>
	</div>
	<p>Tác giả: '.$name_author.'</p>
	<p>Ngày tạo: '.date("d/m/Y",$row_doc['created_at']).'</p>
	<p>Lĩnh vực đề cập: '.$row_doc['field'].'</p>
	<div class="book-file"><a href="">Tài liệu: '.$row_doc['file'].'</a></div>
	</div>
	</div>';
	if ($j == 4) {
		$j = 1;
	}else{
		$j++;
	}
}
echo json_encode([
	'html'=>$html
]);
?>
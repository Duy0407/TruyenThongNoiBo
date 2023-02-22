<?php
require_once '../config/config.php';
$new_id = getvalue('new_id','int','POST','');
$check[] = $new_id;
$id_user_tags = getvalue('id_user_tags','str','POST','');
$check[] = $id_user_tags;
$position = getvalue('position','int','POST','');
$check[] = $position;
$content = getvalue('content','str','POST','');
$check[] = $content;
$id_option = getvalue('id_option','int','POST','');
$check[] = $id_option;

$val = checkPost($check);
if ($val == 1) {
	header("Location: /");
}else{
	$qr = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id AND author = " . $_SESSION['login']['id']);
	if (mysql_num_rows($qr->result) == 0) {
		echo json_encode([
			'result'=>false
		]);
	}else{
		$row = mysql_fetch_array($qr->result);
		if (isset($_FILES['file'])) {
			$duoi = explode('/', $_FILES['file']['type']);
			$duoi = $duoi[(count($duoi) - 1)];
			$_FILES['file']['name'] = rand() . "." . $duoi;
			$tmp_name = $_FILES['file']['tmp_name'];
			$dir = "../img/new_feed/bonus/";
			unlink($dir . $_SESSION['login']['id'] . "/" . $row['file']);
			move_uploaded_file($tmp_name, $dir . $_SESSION['login']['id'] . "/" . $_FILES['file']['name']);
			$data['file'] = $_FILES['file']['name'];
		}
		$dataId1 = [
			'new_id'=>$new_id
		];
		$data['id_user_tags'] = $id_user_tags;
		$data['position'] = $position;
		$data['content'] = $content;
		$data['updated_at'] = time();
		
		update('new_feed',$data,$dataId1);
		$dataId2 = [
			'id_new'=>$new_id
		];
		$data2 = [
			'id_option'=>$id_option
		];
		update('bonus',$data2,$dataId2);
		echo json_encode([
			'result'=>true
		]);
	}
}
?>
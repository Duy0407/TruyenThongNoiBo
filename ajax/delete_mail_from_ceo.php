<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
if ($id == 0) {
	header("Location: /");
}else{
	$dataId = [
		'id'=>$id
	];
	$data = [
		'delete'=>1,
		'updated_at'=>time()
	];
	update('mail_from_ceo',$data,$dataId);
	echo json_encode([
		'result'=>true
	]);
}
?>
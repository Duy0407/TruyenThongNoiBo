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
		'created_at'=>time()
	];

	update('core_value',$data,$dataId);
	echo json_encode([
		'result'=>true
	]);
}
?>
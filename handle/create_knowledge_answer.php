<?php
require_once '../config/config.php';
$knowledge_id = getValue('knowledge_id','int','POST','');
if ($knowledge_id == 0) {
	header("Location: /");
}else{
	$content = getValue('content','str','POST','');
	$check[] = $content;
	$file_detail = getValue('file_detail','str','POST','');
	$val = checkPost($check);
	if ($val == 1) {
		header("Location: /");
	}
	if ($_SESSION['login']['user_type'] == 1) {
		$id_user = $_SESSION['login']['id'];
		$id_company = $_SESSION['login']['id'];
	}else{
		require_once '../api/api_ep.php';
		$id_user = $data_ep[$_SESSION['login']['id']]->ep_id;
		$id_company = $data_ep[$_SESSION['login']['id']]->com_id;
	}
	$data = [
		'id_user'=>$_SESSION['login']['id'],
		'id_company'=>$id_company,
		'knowledge_id'=>$knowledge_id,
		'content'=>$content,
		'file'=>$file_detail,
		'user_type'=>$_SESSION['login']['user_type'],
		'created_at'=>time(),
		'updated_at'=>time()
	];

	add('knowledge_answer',$data);
	header("Location: /qttt-trao-doi-cau-hoi.html");
}
?>
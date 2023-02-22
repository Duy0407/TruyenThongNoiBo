<?php
require_once '../config/config.php';
$new_id = getValue('new_id','int','POST','');
if ($new_id == 0) {
	header("Location: /");
}
$db_like = new db_query("SELECT * FROM `like` WHERE id_new = $new_id AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);

if (mysql_num_rows($db_like->result) == 0) {
	$data = [
		'id_new'	=>$new_id,
		'id_user'	=>$_SESSION['login']['id'],
		'user_type'	=>$_SESSION['login']['user_type'],
		'created_at'=>time()
	];
	add('like',$data);
	$result = true;
}else{
	$qr_del = new db_query("DELETE FROM `like` WHERE id_new = $new_id AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
	$result = false;
}
$db_count_like = new db_query("SELECT * FROM `like` WHERE id_new = $new_id");
echo json_encode([
		'result'=>$result,
		'count'=>mysql_num_rows($db_count_like->result)
	]);
?>
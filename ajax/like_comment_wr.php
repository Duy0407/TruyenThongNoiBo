<?php
require_once '../config/config.php';
$id = getValue('id','int','POST','');
if ($id == 0) {
	header("Location: /");
}
$db_check = new db_query("SELECT * FROM like_comment_working_rules WHERE id_comment = $id");
$dem = 0;
while($row_like_comment = mysql_fetch_array($db_check->result)){
	if ($row_like_comment['id_comment'] == $id && $row_like_comment['id_user'] == $_SESSION['login']['id'] ) {
		$dem++;
	}
}
if ($dem == 0) {
	$data = [
		'id_comment'=>$id,
		'id_user'=>$_SESSION['login']['id'],
		'user_type'=>$_SESSION['login']['user_type'],
		'created_at'=>time()
	];
	add('like_comment_working_rules',$data);
	echo json_encode([
		'result'=>true,
		'num_like_cmt' =>(mysql_num_rows($db_check->result) + 1),
	]);
}else{
	$db_del = new db_query("DELETE FROM like_comment_working_rules WHERE id_comment = $id AND id_user = " . $_SESSION['login']['id']);
	echo json_encode([
		'result'=>false,
		'num_like_cmt' =>(mysql_num_rows($db_check->result) - 1),
	]);
}
?>
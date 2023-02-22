<?php 
include("../config/config.php");

if (isset($_SESSION['login'])) {
	$data = [
		'user_id' => $_SESSION['login']['id'],
		'user_type' => $_SESSION['login']['user_type'],
		'user_name' => $_SESSION['login']['name'],
		'user_avt' => $_SESSION['login']['logo'],
	];
	echo json_encode(['result' => true,'data' => $data]);
} else {
	echo json_encode(['result' => false,'data' => null]);
} 
?>
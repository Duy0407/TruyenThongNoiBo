<?php 
require_once '../config/config.php';
if (!isset($_SESSION['login'])) {
	header("Location: /");
}
$access_token   = $_SESSION['login']['acc_token'];
$header[]       = 'Authorization: '.$access_token.'';
$user_id = $_SESSION['login']['id_com'];
?>
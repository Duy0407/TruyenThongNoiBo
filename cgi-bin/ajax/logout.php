<?php
require_once '../config/config.php';
session_destroy();
echo json_encode([
	'result'=>true
]);
?>
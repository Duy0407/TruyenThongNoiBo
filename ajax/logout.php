<?php
require_once '../config/config.php';
session_destroy();
setcookie('acc_token',"",time() - (86400 * 7), "/", ".timviec365.vn");
setcookie('rf_token',"",time() - (86400 * 7), "/", ".timviec365.vn");
setcookie('role',"",time() - (86400 * 7), "/", ".timviec365.vn");
echo json_encode([
	'result'=>true
]);
?>
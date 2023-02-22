<?php
require_once '../config/config.php';

$check_one = getValue("check_one","arr","POST","");

foreach ($check_one as $key => $value) {
	$update_approve_post = new db_query("UPDATE `new_feed` SET `approve`  = 2 WHERE `new_id` = '$value'");
}


?>
<?php
require_once '../config/config.php';
$new_id = getValue("new_id", "str", "POST", '');
$report_id = getValue("report_id", "str", "POST", '');

if ($new_id && $report_id) {
	$arr_new_id = explode(',', $new_id);
	$arr_report_id = explode(',', $report_id);

	foreach ($arr_report_id as $r => $report) {
		delete('members_report_posts', ['id_report' => $report]);
	}

	foreach ($arr_new_id as $n => $new) {
		update('new_feed', ['delete' => 1], ['new_id' => $new]);
	}
	echo json_encode([
		'result' => true
	]);
} else {
	echo json_encode([
		'result' => false
	]);
} 
?>
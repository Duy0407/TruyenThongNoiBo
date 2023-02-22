<?php
require_once '../config/config.php';
$report_id = getValue("report_id", "str", "POST", '');

if ($report_id) {
	$arr_report_id = explode(',', $report_id);
	foreach ($arr_report_id as $r => $report) {
		delete('members_report_posts', ['id_report' => $report]);
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
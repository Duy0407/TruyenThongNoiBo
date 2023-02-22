<?php
require_once '../config/config.php';
$id = getValue('id', 'int', 'POST', '');
if ($id == '') {
	echo json_encode([
		'result' => false,
	]);
} else {
	$db_new_id = new db_query("SELECT id_core,image FROM comment_core_value WHERE id = " . $id);
	$row = mysql_fetch_array($db_new_id->result);
	if (is_writable($row['image'])) {
		unlink($row['image']);
	}
	$db_cmt = new db_query("SELECT id_core,image FROM comment_core_value WHERE id_parent = " . $id);
	while ($row_cmt = mysql_fetch_array($db_cmt->result)) {
		if (is_writable($row_cmt['image'])) {
			unlink($row_cmt['image']);
		}
	}
	$db_del = new db_query("DELETE FROM comment_core_value WHERE id_parent = $id");
	$db_del = new db_query("DELETE FROM comment_core_value WHERE id = $id");
	echo json_encode([
		'result' => true
	]);
}
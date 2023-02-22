<?php
require_once '../config/config.php';
$id = getValue('id', 'int', 'POST', '');
$parent = new db_query("SELECT * FROM comment WHERE id = $id");
$row_p = mysql_fetch_array($parent->result);
$id_parent = $row_p['id_parent'];
if ($id == '') {
	echo json_encode([
		'result' => false,
	]);
} else {
	$db_new_id = new db_query("SELECT id_new,image FROM comment WHERE id = " . $id);

	$row = mysql_fetch_array($db_new_id->result);
	if (is_writable($row['image'])) {
		unlink($row['image']);
	}
	$db_cmt = new db_query("SELECT image FROM comment WHERE id_parent = " . $id);
	while ($row_cmt = mysql_fetch_array($db_cmt->result)) {
		if (is_writable($row_cmt['image'])) {
			unlink($row_cmt['image']);
		}
	}
	$db_del = new db_query("DELETE FROM comment WHERE id_parent = $id");
	$db_del = new db_query("DELETE FROM comment WHERE id = $id");
	$new_id = $row['id_new'];
	$db_count = new db_query("SELECT id FROM comment WHERE id_new = " . $new_id);
	$count = mysql_num_rows($db_count->result);

	
	echo json_encode([
		'result' => true,
		'count' => $count
	]);
}

<?php
require_once '../config/config.php';
$new_id = getValue('new_id','int','POST','');
$qr_ghim = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id");
$row_ghim = mysql_fetch_array($qr_ghim->result);
if ($row_ghim['ghim'] == 0) {
	$data['ghim'] = 1;
}else{
	$data['ghim'] = 0;
}
$dataId = [
	'new_id'=>$new_id
];
update('new_feed',$data,$dataId);
echo json_encode([
	'result'=>true
]);

?>
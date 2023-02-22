<?php
require_once '../config/config.php';
$user_id = getValue('user_id','arr','POST','');
$module_id = getValue('module_id','int','POST','');
$create = getValue('create','int','POST','0');
$delete = getValue('delete','int','POST','0');
$seen = getValue('seen','int','POST','0');
$data['id_module'] = $module_id;
$data['create'] = $create;
$data['delete'] = $delete;
$data['seen'] = $seen;
if (count($user_id) > 1) {
	for ($i=0; $i < count($user_id); $i++) { 
		$db_del2 = new db_query("DELETE FROM config WHERE id_employee = " . $user_id[$i]);
	}
}
for ($i=0; $i < count($user_id); $i++) { 
	$data['id_employee'] = $user_id[$i];
	$db_module = new db_query("SELECT * FROM config WHERE id_module = $module_id AND id_employee = " . $user_id[$i]);
	if (mysql_num_rows($db_module->result) == 0) {
		add('config',$data);
	}else{
		if ($create == 0 && $delete == 0 && $seen == 0) {
			$qr_del = new db_query("DELETE FROM config WHERE id_module = $module_id AND id_employee = " . $user_id[$i]);
		}else{
			$data1['create'] = $create;
			$data1['delete'] = $delete;
			$data1['seen'] = $seen;
			$row_cofig = mysql_fetch_array($db_module->result);
			$dataId = [
				'id'=>$row_cofig['id']
			];
			update('config',$data1,$dataId);
		}
	}
}
?>
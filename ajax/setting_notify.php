<?php 
require_once '../config/config.php';
$id_user = $_SESSION['login']['id'];
$id_com = $_SESSION['login']['id_com'];
$id_gr = getValue("id_gr","int","POST",0);
$val_radio = getValue("val_radio","int","POST",0);
$val_checkbox = getValue("val_checkbox","int","POST",0);

$sl_notify = new db_query("SELECT `id_group` FROM `custom_notification` WHERE `id_group` = '$id_gr' AND `id_user` = '$id_user'");
if(mysql_num_rows($sl_notify->result) > 0){
	if($val_checkbox != 0){
		$ud_cus_notify = new db_query("UPDATE `custom_notification` SET `customize` = '$val_radio', `get_notify` = 1 WHERE `id_group` = '$id_gr' AND `id_user` = '$id_user'");
	}else{
		$ud_cus_notify = new db_query("UPDATE `custom_notification` SET `customize` = '$val_radio', `get_notify` = 0 WHERE `id_group` = '$id_gr' AND `id_user` = '$id_user'");
	}
}else{
	if($val_checkbox != 0){
		$is_cus_notify = new db_query("INSERT INTO `custom_notification`(`id_user`,`id_company`,`id_group`,`customize`,`get_notify`)VALUES('$id_user','$id_com','$id_gr','$val_radio',1)");
	}else{
		$is_cus_notify = new db_query("INSERT INTO `custom_notification`(`id_user`,`id_company`,`id_group`,`customize`,`get_notify`)VALUES('$id_user','$id_com','$id_gr','$val_radio',0)");
	}
}

?>
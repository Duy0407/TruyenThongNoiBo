<?php
require_once '../config/config.php';
$email = getValue('email', 'str', 'POST', '');
$pass = getValue('pass', 'str', 'POST', '');
if ($email != "" && $pass != "") {
	$curl 	= curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://chamcong.24hpay.vn/service/login_employee.php',
		CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
		CURLOPT_POST => 1,
		CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
		CURLOPT_POSTFIELDS => array(
			'email' => $email,
			'pass' 	=> $pass,
			'os' => 2,
			'from' => 'ttnb365'
		)
	));

	$resp = curl_exec($curl);
	$responsive = json_decode($resp);
	$data = $responsive->data;
	if ($data == null) {
		echo json_encode([
			'result' => false,
			'msg' => 'Email hoặc mật khẩu không chính xác'
		]);
	} else {
		$id = $data->user_info->ep_id;
		$_SESSION['login']['id'] = $data->user_info->ep_id;
		$_SESSION['login']['id_com'] = $data->user_info->com_id;
		$_SESSION['login']['user_type'] = 2;
		$_SESSION['login']['acc_token'] = $data->access_token;
		$_SESSION['login']['name'] = $data->user_info->ep_name;
		$_SESSION['login']['com_create_time'] = $data->user_info->create_time;

		if ($data->user_info->dep_id == "") {
			$_SESSION['login']['dep_id'] = 0;
		} else {
			$_SESSION['login']['dep_id'] = $data->user_info->dep_id;
		}

		if ($data->user_info->ep_image == "") {
			$_SESSION['login']['logo'] = '../img/logo_com.png';
		} else {
			$_SESSION['login']['logo'] = 'https://chamcong.24hpay.vn/upload/employee/' . $data->user_info->ep_image;
		}
		$type = 1;

		//Đồng bộ đăng nhập nhân viên
		setcookie('acc_token', $data->access_token, time() + (86400 * 7), "/", ".timviec365.vn"); // .tinnhanh365.vn
		setcookie('rf_token', $data->refresh_token, time() + (86400 * 7), "/", ".timviec365.vn");
		setcookie('user',$id, time() + (86400 * 7),"/",".timviec365.vn");
		setcookie('permission',3, time() + (86400 * 7),"/",".timviec365.vn");
		setcookie('role', 2, time() + (86400 * 7), "/", ".timviec365.vn");
		echo json_encode([
			'result' => true,
		]);
	}
	curl_close($curl);
} else {
	header("Location: /");
}

<?php
require_once '../config/config.php';
$email = getValue('email','str','POST','');
$pass = getValue('pass','str','POST','');
if ($email != "" && $pass != "") {
	$curl 	= curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://chamcong.24hpay.vn/service/login_company.php',
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
	$result = false;
	if ($data !== null) {
		$result = true;
		$access_token 	= $data->access_token;
		$refresh_token 	= $data->refresh_token;
		$user_info 		= $data->user_info;
		$com_authentic  = $user_info->com_authentic;
		$com_create_time = $data->user_info;
		if ($com_authentic == 1) {
			$com_id 		= $user_info->com_id;
			$com_name  		= $user_info->com_name;
			$com_email 		= $user_info->com_email;
			$com_logo 		= $user_info->com_logo;
			$com_phone		= $user_info->com_phone;
			$com_address	= $user_info->com_address;
			$com_create_time = $user_info->com_create_time;
			if (isset($user_info->com_role_id)) {
				$com_role = $user_info->com_role_id;
			} else if (isset($user_info->role_id)) {
				$com_role = $user_info->role_id;
			} else {
				$com_role = 1;
			}
			$data_insert['id'] 		= $com_id;
			$data_insert['type'] 	= 1;
						//Lưu SESSION
			$_SESSION['login']['id'] = $com_id;
			$_SESSION['login']['id_com'] = $com_id;
			$_SESSION['login']['phone'] = $com_phone;
			$_SESSION['login']['email'] = $com_email;
			$_SESSION['login']['address'] = $com_address;
			$_SESSION['login']['user_type'] = 1;
			$_SESSION['login']['acc_token'] = $access_token;
			$_SESSION['login']['name'] = $com_name;
			$_SESSION['login']['dep_id'] = 0;
			$_SESSION['login']['com_create_time'] = $com_create_time;

			//Đồng bộ đăng nhập
			setcookie('acc_token',$access_token, time() + (86400 * 7),"/",".timviec365.vn"); // .tinnhanh365.vn
			setcookie('rf_token',$refresh_token, time() + (86400 * 7),"/",".timviec365.vn");
			setcookie('user',$com_id, time() + (86400 * 7),"/",".timviec365.vn");
			setcookie("permission", $user_info->com_role_id, time() + (86400 * 7), "/", ".timviec365.vn");
			setcookie('role',1, time() + (86400 * 7),"/",".timviec365.vn");
			if ($com_logo == "") {
				$_SESSION['login']['logo'] = '../img/logo_com.png';
			}else{
				$_SESSION['login']['logo'] = 'https://chamcong.24hpay.vn/upload/company/logo/'.$com_logo;
			}
			$getBrowser = getBrowser();
			// $user_ip = $_SERVER['REMOTE_ADDR'];
			$user_ip = "118.70.126.138";
			$geo 				= unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
			$address = $geo['geoplugin_city'] . ", " . $geo['geoplugin_countryName'];
			$platform =  $getBrowser['platform'];
			$db_check = new db_query("SELECT * FROM devices WHERE id_user = $com_id AND user_type = 1 AND device_name = '$platform' AND `address` = '$address'");
			if (mysql_num_rows($db_check->result) == 0) {
				$data = [
					'id_user' => $com_id,
					'user_type' => 1,
					'device_name' => $getBrowser['platform'],
					'address' => $address,
					'created_at' => time(),
					'updated_at' => time()
				];
				add('devices',$data);
			}

			$db_com_time = new db_query("SELECT * FROM com_create_time WHERE id_company = " . $_SESSION['login']['id_com']);

			if (mysql_num_rows($db_com_time->result) == 0) {
				$com_time = strtotime($_SESSION['login']['com_create_time']);
				$data = [
					'id_company' => $_SESSION['login']['id_com'],
					'time' => $com_time,
					'created_at' => time(),
					'updated_at' => time()
				];
				add('com_create_time', $data);
			}
						// set_cookie('acc_token',$access_token, time() + (86400 * 7)); // .tinnhanh365.vn
						// set_cookie('rf_token',$refresh_token, time() + (86400 * 7));
						// set_cookie('role',$com_role, time() + (86400 * 7));

						//Check đăng nhập trên thiết bị
						// $browser_token 		= uniqid();
						// $browser 			= getBrowser();
						// $browser_name 		= $browser['name'];
						// $browser_version 	= $browser['version'];
						// $browser_platform  	= $browser['platform'];
						// if ($browser_platform == 'mac' || $browser_platform == 'linux') {
						// 	$device_type = 1;
						// } else {
						// 	$device_type = 0;
						// }
						// $browser_info 		= $browser_name  . " " . $browser_version  . " " . $browser_platform;
						// $user_ip 			= getenv('REMOTE_ADDR');
						// $user_ip 			= "118.70.126.138"; // set localhost 
						// $geo 				= unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
						// $country 			= $geo["geoplugin_countryName"];
						// $city 				= $geo["geoplugin_city"];
						// $login_location 	= $city . ", " . $country;
						// $data_insert_login	= [
						// 	'user_id' 		=> $com_id,
						// 	'info_brower'	=> $browser_info,
						// 	'token_browser' => $browser_token,
						// 	'last_login'	=> $login_location,
						// 	'login_type'	=> 1,
						// 	'device_type' 	=> $device_type,
						// 0 là PC, 1 là mobile, tablet
						// 	'created_at'	=> date('Y-m-d H:i:s')
						// ];
						// $insert_device 		= $this->M_devices->insert($data_insert_login);

		}
	}
	echo json_encode([
		'result'=>$result
	]);
	curl_close($curl);
} else {
	header("Location: /");
}
?>

<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../functions/functions.php");
ob_start();
require_once("../functions/send_mail.php");
require_once("../classes/database.php");
// require_once("../cache_file/top-cache.php");
require_once("../functions/pagebreak.php");
require_once("../classes/class.phpmailer.php");
require_once("../classes/class.pop3.php");
require_once("../classes/class.smtp.php");
require_once("../classes/PHPMailerAutoload.php");
require_once '../classes/securitycode.php';
require_once("../functions/function_rewrite.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');


$domain = "https://" . $_SERVER['SERVER_NAME'];

if (@$_COOKIE['role'] == 3) {
    header("Location: https://quanlychung.timviec365.vn/thong-bao-truy-cap.html");
    die();
}

checkLogout();
if (strtok($_SERVER['REQUEST_URI'],"?") != "/trang-ca-nhan.html"){
	if (!isset($_SESSION['login'])) {
		if (isset($_COOKIE['acc_token'])) {
			checkLogin();
		}
	}
}
$path_feel = '/img/feel/';

$data_feel = [
	1 => [
		'icon' => $path_feel . 'dang-yeu.svg',
		'text' => 'Đáng yêu'
	],
	2 => [
		'icon' => $path_feel . 'tuc-gian.svg',
		'text' => 'Tức giận'
	],
	3 => [
		'icon' => $path_feel . 'duoc-yeu.svg',
		'text' => 'Được yêu'
	],
	4 => [
		'icon' => $path_feel . 'nong.svg',
		'text' => 'Nóng'
	],
	5 => [
		'icon' => $path_feel . 'hanh-phuc.svg',
		'text' => 'Hạnh phúc'
	],
	6 => [
		'icon' => $path_feel . 'lanh.svg',
		'text' => 'Lạnh'
	],
	7 => [
		'icon' => $path_feel . 'hai-long.svg',
		'text' => 'Hài lòng'
	],
	8 => [
		'icon' => $path_feel . 'hai-long.svg',
		'text' => 'Chỉ có một mình'
	],
	9 => [
		'icon' => $path_feel . 'gian-doi.svg',
		'text' => 'Giận dỗi'
	],
	10 => [
		'icon' => $path_feel . 'buon.svg',
		'text' => 'Buồn'
	],
	11 => [
		'icon' => $path_feel . 'that-vong.svg',
		'text' => 'Thất vọng'
	],
	12 => [
		'icon' => $path_feel . 'sung-suong.svg',
		'text' => 'Sung sướng'
	],
	13 => [
		'icon' => $path_feel . 'met-moi.svg',
		'text' => 'Mệt mỏi'
	],
	14 => [
		'icon' => $path_feel . 'rat-la-ok.svg',
		'text' => 'Rất là Ok'
	],
	15 => [
		'icon' => $path_feel . 'toi-te.svg',
		'text' => 'Tồi tệ'
	],
	16 => [
		'icon' => $path_feel . 'hao-hung.svg',
		'text' => 'Hào hứng'
	],
	17 => [
		'icon' => $path_feel . 'no-bung.svg',
		'text' => 'No bụng'
	],
	18 => [
		'icon' => $path_feel . 'buc-minh.svg',
		'text' => 'Bực mình'
	],
	19 => [
		'icon' => $path_feel . 'om-yeu.svg',
		'text' => 'Ốm yếu'
	],
	20 => [
		'icon' => $path_feel . 'biet-on.svg',
		'text' => 'Biết ơn'
	],
	21 => [
		'icon' => $path_feel . 'tuyet-voi.svg',
		'text' => 'Tuyệt vời'
	],
	22 => [
		'icon' => $path_feel . 'that-phong-cach.svg',
		'text' => 'Thật phong cách'
	],
	23 => [
		'icon' => $path_feel . 'thu-vi.svg',
		'text' => 'Thú vị'
	],
	24 => [
		'icon' => $path_feel . 'thu-gian.svg',
		'text' => 'Thư giãn'
	],
	25 => [
		'icon' => $path_feel . 'doi-bung.svg',
		'text' => 'Đói bụng'
	],
	26 => [
		'icon' => $path_feel . 'co-don.svg',
		'text' => 'Cô đơn'
	],
	27 => [
		'icon' => $path_feel . 'tich-cuc.svg',
		'text' => 'Tích cực'
	],
	28 => [
		'icon' => $path_feel . 'on.svg',
		'text' => 'Ổn'
	],
	29 => [
		'icon' => $path_feel . 'to-mo.svg',
		'text' => 'Tò mò'
	],
	30 => [
		'icon' => $path_feel . 'kho-khao.svg',
		'text' => 'Khờ khạo'
	],
	31 => [
		'icon' => $path_feel . 'dien2.svg',
		'text' => 'Điên'
	],
	32 => [
		'icon' => $path_feel . 'buon-ngu.svg',
		'text' => 'Buồn ngủ'
	]
];

$path_activity = '/img/activity/';
$data_activity = [
	1 => [
		'icon' => $path_activity . 'chuc-mung.svg',
		'text' => 'Chúc mừng tình bạn'
	],
	2 => [
		'icon' => $path_activity . 'tot-nghiep.svg',
		'text' => 'Chúc mừng tốt nghiệp'
	],
	3 => [
		'icon' => $path_activity . 'chuc-mung.svg',
		'text' => 'Chúc mừng sinh nhật'
	],
	4 => [
		'icon' => $path_activity . 'giang-sinh.svg',
		'text' => 'Chúc mừng giáng sinh'
	],
	5 => [
		'icon' => $path_activity . 'chuc-mung.svg',
		'text' => 'Chúc mừng sinh nhật tôi'
	],
	6 => [
		'icon' => $path_activity . 'dinh-hon.svg',
		'text' => 'Chúc mừng đính hôn'
	],
	7 => [
		'icon' => $path_activity . 'chuc-mung.svg',
		'text' => 'Chúc mừng năm mới'
	],
	8 => [
		'icon' => $path_activity . 'hoa-binh.svg',
		'text' => 'Hòa bình'
	],
	9 => [
		'icon' => $path_activity . 'chuc-mung.svg',
		'text' => 'Chúc mừng ngày đặc biệt'
	],
	10 => [
		'icon' => $path_activity . 'nguoi-yeu.svg',
		'text' => 'ngày của người yêu'
	],
	11 => [
		'icon' => $path_activity . 'chuc-mung.svg',
		'text' => 'Chúc mừng thành công'
	],
	12 => [
		'icon' => $path_activity . 'ngay-cua-me.svg',
		'text' => 'ngày của mẹ'
	],
	13 => [
		'icon' => $path_activity . 'chuc-mung.svg',
		'text' => 'Chúc mừng chiến thắng'
	],
	14 => [
		'icon' => $path_activity . 'chuc-mung.svg',
		'text' => 'Chúc mừng chủ nhật'
	],
	15 => [
		'icon' => $path_activity . 'phu-nu.svg',
		'text' => 'Quốc tế phụ nữ'
	],
	16 => [
		'icon' => $path_activity . 'haloween.svg',
		'text' => 'Halloween'
	]
];

$data_view_mode = [
	0 => '/img/cong-khai-icon.svg',
	1 => '/img/bx_bxs-lock-alt2.svg',
	2 => '/img/group(1)1.svg',
	3 => '/img/group(1)2.svg',
	4 => '/img/group(1)3.svg',
];

$data_view_mode_txt = [
	0 => 'Công khai',
	1 => 'Chỉ mình tôi',
	2 => 'Bạn bè',
	3 => 'Bạn bè ngoại trừ',
	4 => 'Bạn bè cụ thể',
];

$data_color = [
	'#474747','#FFFFFF','#76B51B','#2E3994','#F2C94C','#FF3333','#BDBDBD','#56CCF2','#F2994A','#9B51E0','#E37676','#BB6BD9','#4C5BD4','#E145A2','#27AE60','#219653','#6FCF97','#2F80ED','#2D9CDB','#B05A69','#FF9DAF'
];
$version = 12;
$arr_ep = $data_ep = list_ep();
$arr_com = info_com();
$list_department = list_department();
$limit_cmt = 3;
$limit_post = 20;
$limit_post_group = 10;

// mảng group
$sql = "SELECT * FROM `group`";
$db_group = new db_query($sql);
$arr_group = [];
while ($row = mysql_fetch_array($db_group->result)){
	$arr_group[$row['id']] = $row;
}

// mảng thành viên trong gia đình
$arr_relative = [
	1 => "Mẹ",
	2 => "Bố",
	3 => "Con trai",
	4 => "Con gái",
	5 => "Cháu gái",
	6 => "Cháu trai",
	7 => "Em gái",
	8 => "Chị gái",
	9 => "Em trai",
	10 => "Anh trai",
	11 => "Ông ngoại",
	12 => "Bà ngoại",
	13 => "Ông nội",
	14 => "Bà nội",
	15 => "Cô",
	16 => "Dì",
	17 => "Chú",
	18 => "Bác",
];
// mảng trạng thái mối quan hệ
$arr_relative_status = [
	1 => "Độc thân",
	2 => "Hẹn hò",
	3 => "Đã đính hôn",
	4 => "Đã kết hôn",
	5 => "Chung sống có đăng ký",
	6 => "Chung sống",
	7 => "Tìm hiểu",
	8 => "Có mối quan hệ phức tạp",
	9 => "Đã ly thân",
	10 => "Đã ly hôn",
	11 => "Góa",
];
// mảng ngôn ngữ
$arr_lang = [
	1 => "Tiếng Việt",
	2 => "Tiếng Anh",
	3 => "Tiếng Pháp",
	4 => "Tiếng Nga",
	5 => "Tiếng Tây Ban Nha",
	6 => "Tiếng Bồ Đào Nha",
	7 => "Tiếng Trung",
	8 => "Tiếng Hàn",
	9 => "Tiếng Nhật",
];
// mảng giới tính
$arr_sex = [
	1 => "Nam",
	2 => "Nữ",
	3 => "Khác",
];

require_once '../new_view/after_login_config.php';
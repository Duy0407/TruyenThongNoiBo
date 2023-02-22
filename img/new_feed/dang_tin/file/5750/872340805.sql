-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th1 14, 2023 lúc 09:51 AM
-- Phiên bản máy phục vụ: 10.1.14-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trthongnb_tv365vn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `add_collection`
--

CREATE TABLE `add_collection` (
  `id_collection` int(11) NOT NULL,
  `name_collection` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='bộ sưu tập để lưu bài viết';

--
-- Đang đổ dữ liệu cho bảng `add_collection`
--

INSERT INTO `add_collection` (`id_collection`, `name_collection`, `id_user`) VALUES
(41, 'Bộ 1', 51770),
(42, 'Bộ 2', 51770),
(43, 'Bộ 3', 51770),
(44, 'Bộ4', 51770),
(45, 'Bộ mới', 53576),
(47, '852', 53576),
(52, 'Bộ test', 8296),
(53, 'Bộ test 2', 8296),
(54, 'Bộ test 3', 8296),
(55, 'Bộ trong Bộ', 8296),
(56, 'Tạo Bộ Nữa', 8296),
(57, 'a', 5699),
(58, 'v', 5699),
(59, 'Bộ hey', 8296),
(60, 'Tết trên Quê Hương', 5713),
(61, 'Cô Tô - một tình yêu', 5713),
(62, 'Nhớ Rừng', 5713),
(63, 'HÀ GIANG CHƯA UỐNG ĐÃ SAY', 5713),
(64, 'Tạo Bộ 11/1/2023', 8296);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `album_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `file` text CHARACTER SET utf8 NOT NULL,
  `view_mode` int(11) NOT NULL DEFAULT '0',
  `except` text CHARACTER SET utf8 NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `album`
--

INSERT INTO `album` (`id`, `album_name`, `user_id`, `user_type`, `file`, `view_mode`, `except`, `created_at`, `updated_at`) VALUES
(4, 'only me', 5699, 2, '[{"file":"../img/album/image/5699/1631453591.jpg","desc":""},{"file":"../img/album/image/5699/924678412.jpg","desc":""},{"file":"../img/album/image/5699/1815007793.jpg","desc":""},{"file":"../img/album/image/5699/2047312602.jpg","desc":""},{"file":"../img/album/image/5699/1531369449.jpg","desc":""},{"file":"../img/album/image/5699/1564084106.jpg","desc":""},{"file":"../img/album/image/5699/603033916.jpg","desc":""},{"file":"../img/album/image/5699/728297754.jpg","desc":""},{"file":"../img/album/image/5699/436070675.jpg","desc":""},{"file":"../img/album/image/5699/1056655185.jpg","desc":""}]', 0, '', 1670925537, 1670925537),
(6, 'họ nhà mòe', 5699, 2, '[{"file":"../img/album/image/5699/1313238816.gif","desc":""},{"file":"../img/album/image/5699/291358944.gif","desc":""},{"file":"../img/album/image/5699/95160355.jpg","desc":""},{"file":"../img/album/image/5699/565525598.jpg","desc":""},{"file":"../img/album/image/5699/1898400286.jpg","desc":""},{"file":"../img/album/image/5699/524119366.jpg","desc":""},{"file":"../img/album/image/5699/1338487718.jpg","desc":""},{"file":"../img/album/image/5699/1267918930.jpg","desc":""},{"file":"../img/album/image/5699/1925876428.jpg","desc":""},{"file":"../img/album/image/5699/1643370046.jpg","desc":""},{"file":"../img/album/image/5699/922403220.jpg","desc":""},{"file":"../img/album/image/5699/923398734.jpg","desc":""},{"file":"../img/album/image/5699/1620747259.jpg","desc":""},{"file":"../img/album/image/5699/1579523003.jpg","desc":""},{"file":"../img/album/image/5699/1957706588.jpg","desc":""},{"file":"../img/album/image/5699/88990625.jpg","desc":""},{"file":"../img/album/image/5699/2133261436.jpg","desc":""},{"file":"../img/album/image/5699/213540125.jpg","desc":""},{"file":"../img/album/image/5699/1040297833.jpg","desc":""},{"file":"../img/album/image/5699/2076508317.jpg","desc":""},{"file":"../img/album/image/5699/302150441.jpg","desc":""},{"file":"../img/album/image/5699/1455476945.jpg","desc":""},{"file":"../img/album/image/5699/361151812.jpg","desc":""},{"file":"../img/album/image/5699/217294628.jpg","desc":""},{"file":"../img/album/image/5699/683460494.jpg","desc":""},{"file":"../img/album/image/5699/378307531.jpg","desc":""},{"file":"../img/album/image/5699/1580178992.jpg","desc":""},{"file":"../img/album/image/5699/47160923.jpg","desc":""},{"file":"../img/album/image/5699/1352008275.jpg","desc":""},{"file":"../img/album/image/5699/410932715.jpg","desc":""}]', 3, '8296', 1671701616, 1671705899),
(7, 'họ nhà c hó', 5699, 2, '[{"file":"../img/album/image/5699/782467857.jpg","desc":""},{"file":"../img/album/image/5699/881670270.jpg","desc":"con này là golden"},{"file":"../img/album/image/5699/2130100552.jpg","desc":"con này là sói ngầu"},{"file":"../img/album/image/5699/1073050698.jpg","desc":""},{"file":"../img/album/image/5699/1050984018.jpg","desc":""},{"file":"../img/album/image/5699/1787143382.jpg","desc":""},{"file":"../img/album/image/5699/1542529459.jpg","desc":""},{"file":"../img/album/image/5699/126192760.jpg","desc":"con này là husky 2.0"}]', 0, '', 1671702985, 1671757619),
(8, 'album test', 5737, 2, '[{"file":"../img/album/image/5737/2034024935.png","desc":"Dưa hấu chấm công"},{"file":"../img/album/image/5737/497054112.png","desc":"Bánh Trưng chấm công"},{"file":"../img/album/image/5737/105887957.png","desc":""},{"file":"../img/album/image/5737/1338606857.png","desc":"mã QR chấm công"}]', 0, '', 1672624631, 1672624631),
(9, 'album test', 5737, 2, '[{"file":"../img/album/image/5737/386757534.png","desc":"Dưa hấu chấm công"},{"file":"../img/album/image/5737/1669642194.png","desc":"Bánh Trưng chấm công"},{"file":"../img/album/image/5737/86457663.png","desc":""},{"file":"../img/album/image/5737/1095242695.png","desc":"mã QR chấm công"}]', 0, '', 1672624636, 1672624636),
(10, 'album test', 5737, 2, '[{"file":"../img/album/image/5737/564258529.png","desc":"Dưa hấu chấm công"},{"file":"../img/album/image/5737/1429531323.png","desc":"Bánh Trưng chấm công"},{"file":"../img/album/image/5737/1825330572.png","desc":""},{"file":"../img/album/image/5737/1015247504.png","desc":"mã QR chấm công"}]', 0, '', 1672624689, 1672624689),
(11, 'album test', 5737, 2, '[{"file":"../img/album/image/5737/1593215913.png","desc":"Dưa hấu chấm công"},{"file":"../img/album/image/5737/644915292.png","desc":"Bánh Trưng chấm công"},{"file":"../img/album/image/5737/17259687.png","desc":""},{"file":"../img/album/image/5737/1764119322.png","desc":"mã QR chấm công"}]', 0, '', 1672624694, 1672624694),
(12, 'album test', 5737, 2, '[{"file":"../img/album/image/5737/1821476251.png","desc":"Dưa hấu chấm công"},{"file":"../img/album/image/5737/465124592.png","desc":"Bánh Trưng chấm công"},{"file":"../img/album/image/5737/660705776.png","desc":""},{"file":"../img/album/image/5737/1201090907.png","desc":"mã QR chấm công"}]', 0, '', 1672624696, 1672624696),
(13, 'album test', 5737, 2, '[{"file":"../img/album/image/5737/1057661273.png","desc":"Dưa hấu chấm công"},{"file":"../img/album/image/5737/1805090956.png","desc":"Bánh Trưng chấm công"},{"file":"../img/album/image/5737/87088104.png","desc":""},{"file":"../img/album/image/5737/684769329.png","desc":"mã QR chấm công"}]', 0, '', 1672624697, 1672624697),
(14, 'album test', 5737, 2, '[{"file":"../img/album/image/5737/1180496930.png","desc":"Dưa hấu chấm công"},{"file":"../img/album/image/5737/1976962647.png","desc":"Bánh Trưng chấm công"},{"file":"../img/album/image/5737/47435144.png","desc":""},{"file":"../img/album/image/5737/1438614508.png","desc":"mã QR chấm công"}]', 0, '', 1672624697, 1672624697),
(15, 'kute', 9798, 2, '[{"file":"../img/album/image/9798/1795102934.jpg","desc":""},{"file":"../img/album/image/9798/1560854701.jpg","desc":""},{"file":"../img/album/image/9798/1862422450.jpg","desc":""},{"file":"../img/album/image/9798/1011669565.jpg","desc":""}]', 0, '', 1673260467, 1673260467),
(16, 'kute', 9798, 2, '[{"file":"../img/album/image/9798/1151071976.jpg","desc":""},{"file":"../img/album/image/9798/1052388850.jpg","desc":""},{"file":"../img/album/image/9798/177679777.jpg","desc":""},{"file":"../img/album/image/9798/1037003312.jpg","desc":""}]', 0, '', 1673260479, 1673260479),
(17, 'kute', 9798, 2, '[{"file":"../img/album/image/9798/843309793.jpg","desc":""},{"file":"../img/album/image/9798/1958089917.jpg","desc":""},{"file":"../img/album/image/9798/747803672.jpg","desc":""},{"file":"../img/album/image/9798/13865386.jpg","desc":""}]', 0, '', 1673260549, 1673260549),
(18, 'book', 5699, 2, '[{"file":"../img/album/image/5699/1501453774.png","desc":""},{"file":"../img/album/image/5699/1269968593.jpg","desc":""},{"file":"../img/album/image/5699/1536243727.jpg","desc":""},{"file":"../img/album/image/5699/1766508460.jpg","desc":""},{"file":"../img/album/image/5699/1542113156.jpg","desc":""},{"file":"../img/album/image/5699/1764696630.jpg","desc":""}]', 0, '', 1673431300, 1673431300);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer_user`
--

CREATE TABLE `answer_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `question_type` int(11) NOT NULL,
  `question` varchar(255) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='trả lời thanh viên để vào nhóm';

--
-- Đang đổ dữ liệu cho bảng `answer_user`
--

INSERT INTO `answer_user` (`id`, `id_user`, `id_company`, `id_group`, `question_type`, `question`, `answer`, `time_answer`) VALUES
(146, 8296, 3312, 65, 2, '45', 'Check 1', 1672946095),
(147, 8296, 3312, 65, 3, '46', 'radio 2', 1672946095),
(148, 8296, 3312, 65, 1, '47', 'Đây 1', 1672946095),
(149, 8296, 3312, 65, 1, '48', 'Đây 2', 1672946095);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bonus`
--

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `id_option` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `bonus`
--

INSERT INTO `bonus` (`id`, `id_new`, `id_option`) VALUES
(1, 80, 2),
(2, 81, 0),
(3, 82, 3),
(4, 83, 1),
(5, 84, 2),
(6, 85, 1),
(7, 94, 1),
(8, 107, 2),
(9, 155, 1),
(10, 194, 1),
(11, 261, 2),
(12, 322, 4),
(13, 381, 1),
(14, 418, 2),
(15, 460, 1),
(16, 490, 2),
(17, 491, 1),
(18, 534, 2),
(19, 583, 1),
(20, 595, 3),
(21, 599, 1),
(22, 600, 1),
(23, 615, 1),
(24, 740, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cam_dang_bai`
--

CREATE TABLE `cam_dang_bai` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `id` int(12) NOT NULL,
  `id_user` int(10) NOT NULL,
  `user_type` int(2) NOT NULL,
  `content` text CHARACTER SET utf8,
  `file` text CHARACTER SET utf8,
  `name_file` text CHARACTER SET utf8,
  `id_parent` int(10) NOT NULL DEFAULT '0',
  `chat_type` int(10) NOT NULL COMMENT '1 là chỉ có tin nhắn',
  `room` varchar(255) NOT NULL,
  `emoji` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='bỏ';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city2`
--

CREATE TABLE `city2` (
  `cit_id` int(11) NOT NULL,
  `cit_name` varchar(255) DEFAULT NULL,
  `cit_order` int(11) NOT NULL DEFAULT '0',
  `cit_type` int(11) DEFAULT NULL,
  `cit_count` int(11) DEFAULT '0',
  `cit_parent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `city2`
--

INSERT INTO `city2` (`cit_id`, `cit_name`, `cit_order`, `cit_type`, `cit_count`, `cit_parent`) VALUES
(1, 'Hà Nội', 10, 1, 4289, 0),
(2, 'Hải Phòng', 0, 1, 76, 0),
(3, 'Bắc Giang', 0, 1, 52, 0),
(4, 'Bắc Kạn', 0, 1, 2, 0),
(5, 'Bắc Ninh', 7, 1, 85, 0),
(6, 'Cao Bằng', 0, 1, 9, 0),
(7, 'Điện Biên', 0, 1, 11, 0),
(8, 'Hòa Bình', 0, 1, 22, 0),
(9, 'Hải Dương', 3, 1, 33, 0),
(10, 'Hà Giang', 0, 1, 6, 0),
(11, 'Hà Nam', 0, 1, 60, 0),
(12, 'Hưng Yên', 5, 1, 76, 0),
(13, 'Lào Cai', 0, 1, 20, 0),
(14, 'Lai Châu', 0, 1, 6, 0),
(15, 'Lạng Sơn', 0, 1, 5, 0),
(16, 'Ninh Bình', 0, 1, 11, 0),
(17, 'Nam Định', 0, 1, 26, 0),
(18, 'Phú Thọ', 0, 1, 20, 0),
(19, 'Quảng Ninh', 0, 1, 38, 0),
(20, 'Sơn La', 0, 1, 6, 0),
(21, 'Thái Bình', 0, 1, 16, 0),
(22, 'Thái Nguyên', 0, 1, 19, 0),
(23, 'Tuyên Quang', 0, 1, 6, 0),
(24, 'Vĩnh Phúc', 0, 1, 63, 0),
(25, 'Yên Bái', 0, 1, 3, 0),
(26, 'Đà Nẵng', 0, 2, 126, 0),
(27, 'Thừa Thiên Huế', 0, 2, 1, 0),
(28, 'Khánh Hòa', 0, 2, 51, 0),
(29, 'Lâm Đồng', 0, 2, 15, 0),
(30, 'Bình Định', 0, 2, 27, 0),
(31, 'Bình Thuận', 0, 2, 11, 0),
(32, 'Đắk Lắk', 0, 2, 17, 0),
(33, 'Đắk Nông', 0, 2, 2, 0),
(34, 'Gia Lai', 0, 2, 7, 0),
(35, 'Hà Tĩnh', 0, 2, 23, 0),
(36, 'Kon Tum', 0, 2, 4, 0),
(37, 'Nghệ An', 0, 2, 34, 0),
(38, 'Ninh Thuận', 0, 2, 0, 0),
(39, 'Phú Yên', 0, 2, 18, 0),
(40, 'Quảng Bình', 0, 2, 12, 0),
(41, 'Quảng Nam', 0, 2, 12, 0),
(42, 'Quảng Ngãi', 0, 2, 2, 0),
(43, 'Quảng Trị', 0, 2, 13, 0),
(44, 'Thanh Hóa', 0, 2, 32, 0),
(45, 'Hồ Chí Minh', 9, 3, 4013, 0),
(46, 'Bình Dương', 8, 3, 376, 0),
(47, 'Bà Rịa Vũng Tàu', 0, 3, 9, 0),
(48, 'Cần Thơ', 0, 3, 32, 0),
(49, 'An Giang', 0, 3, 17, 0),
(50, 'Bạc Liêu', 0, 3, 17, 0),
(51, 'Bình Phước', 0, 3, 18, 0),
(52, 'Bến Tre', 0, 3, 6, 0),
(53, 'Cà Mau', 0, 3, 4, 0),
(54, 'Đồng Tháp', 0, 3, 22, 0),
(55, 'Đồng Nai', 6, 3, 188, 0),
(56, 'Hậu Giang', 0, 3, 4, 0),
(57, 'Kiên Giang', 0, 3, 13, 0),
(58, 'Long An', 4, 3, 75, 0),
(59, 'Sóc Trăng', 0, 3, 13, 0),
(60, 'Tiền Giang', 0, 3, 21, 0),
(61, 'Tây Ninh', 0, 3, 21, 0),
(62, 'Trà Vinh', 0, 3, 6, 0),
(63, 'Vĩnh Long', 0, 3, 4, 0),
(66, 'Quận Ba Đình', 0, NULL, 0, 1),
(67, 'Quận Hoàn Kiếm', 0, NULL, 0, 1),
(68, 'Quận Tây Hồ', 0, NULL, 0, 1),
(69, 'Quận Long Biên', 0, NULL, 0, 1),
(70, 'Quận Cầu Giấy', 0, NULL, 0, 1),
(71, 'Quận Đống Đa', 0, NULL, 0, 1),
(72, 'Quận Hai Bà Trưng', 0, NULL, 0, 1),
(73, 'Quận Hoàng Mai', 0, NULL, 0, 1),
(74, 'Quận Thanh Xuân', 0, NULL, 0, 1),
(75, 'Huyện Sóc Sơn', 0, NULL, 0, 1),
(76, 'Huyện Đông Anh', 0, NULL, 0, 1),
(77, 'Huyện Gia Lâm', 0, NULL, 0, 1),
(78, 'Quận Nam Từ Liêm', 0, NULL, 0, 1),
(79, 'Huyện Thanh Trì', 0, NULL, 0, 1),
(80, 'Quận Bắc Từ Liêm', 0, NULL, 0, 1),
(81, 'Huyện Mê Linh', 0, NULL, 0, 1),
(82, 'Quận Hà Đông', 0, NULL, 0, 1),
(83, 'Thị xã Sơn Tây', 0, NULL, 0, 1),
(84, 'Huyện Ba Vì', 0, NULL, 0, 1),
(85, 'Huyện Phúc Thọ', 0, NULL, 0, 1),
(86, 'Huyện Đan Phượng', 0, NULL, 0, 1),
(87, 'Huyện Hoài Đức', 0, NULL, 0, 1),
(88, 'Huyện Quốc Oai', 0, NULL, 0, 1),
(89, 'Huyện Thạch Thất', 0, NULL, 0, 1),
(90, 'Huyện Chương Mỹ', 0, NULL, 0, 1),
(91, 'Huyện Thanh Oai', 0, NULL, 0, 1),
(92, 'Huyện Thường Tín', 0, NULL, 0, 1),
(93, 'Huyện Phú Xuyên', 0, NULL, 0, 1),
(94, 'Huyện Ứng Hòa', 0, NULL, 0, 1),
(95, 'Huyện Mỹ Đức', 0, NULL, 0, 1),
(96, 'Thành phố Hà Giang', 0, NULL, 0, 10),
(97, 'Huyện Đồng Văn', 0, NULL, 0, 10),
(98, 'Huyện Mèo Vạc', 0, NULL, 0, 10),
(99, 'Huyện Yên Minh', 0, NULL, 0, 10),
(100, 'Huyện Quản Bạ', 0, NULL, 0, 10),
(101, 'Huyện Vị Xuyên', 0, NULL, 0, 10),
(102, 'Huyện Bắc Mê', 0, NULL, 0, 10),
(103, 'Huyện Hoàng Su Phì', 0, NULL, 0, 10),
(104, 'Huyện Xín Mần', 0, NULL, 0, 10),
(105, 'Huyện Bắc Quang', 0, NULL, 0, 10),
(106, 'Huyện Quang Bình', 0, NULL, 0, 10),
(107, 'Thành phố Cao Bằng', 0, NULL, 0, 6),
(108, 'Huyện Bảo Lâm', 0, NULL, 0, 6),
(109, 'Huyện Bảo Lạc', 0, NULL, 0, 6),
(110, 'Huyện Thông Nông', 0, NULL, 0, 6),
(111, 'Huyện Hà Quảng', 0, NULL, 0, 6),
(112, 'Huyện Trà Lĩnh', 0, NULL, 0, 6),
(113, 'Huyện Trùng Khánh', 0, NULL, 0, 6),
(114, 'Huyện Hạ Lang', 0, NULL, 0, 6),
(115, 'Huyện Quảng Uyên', 0, NULL, 0, 6),
(116, 'Huyện Phục Hoà', 0, NULL, 0, 6),
(117, 'Huyện Hoà An', 0, NULL, 0, 6),
(118, 'Huyện Nguyên Bình', 0, NULL, 0, 6),
(119, 'Huyện Thạch An', 0, NULL, 0, 6),
(120, 'Thành Phố Bắc Kạn', 0, NULL, 0, 4),
(121, 'Huyện Pác Nặm', 0, NULL, 0, 4),
(122, 'Huyện Ba Bể', 0, NULL, 0, 4),
(123, 'Huyện Ngân Sơn', 0, NULL, 0, 4),
(124, 'Huyện Bạch Thông', 0, NULL, 0, 4),
(125, 'Huyện Chợ Đồn', 0, NULL, 0, 3),
(126, 'Huyện Chợ Mới', 0, NULL, 0, 4),
(127, 'Huyện Na Rì', 0, NULL, 0, 4),
(128, 'Thành phố Tuyên Quang', 0, NULL, 0, 23),
(129, 'Huyện Lâm Bình', 0, NULL, 0, 23),
(130, 'Huyện Nà Hang', 0, NULL, 0, 23),
(131, 'Huyện Chiêm Hóa', 0, NULL, 0, 23),
(132, 'Huyện Hàm Yên', 0, NULL, 0, 23),
(133, 'Huyện Yên Sơn', 0, NULL, 0, 23),
(134, 'Huyện Sơn Dương', 0, NULL, 0, 23),
(135, 'Thành phố Lào Cai', 0, NULL, 0, 13),
(136, 'Huyện Bát Xát', 0, NULL, 0, 13),
(137, 'Huyện Mường Khương', 0, NULL, 0, 13),
(138, 'Huyện Si Ma Cai', 0, NULL, 0, 13),
(139, 'Huyện Bắc Hà', 0, NULL, 0, 13),
(140, 'Huyện Bảo Thắng', 0, NULL, 0, 13),
(141, 'Huyện Bảo Yên', 0, NULL, 0, 13),
(142, 'Huyện Sa Pa', 0, NULL, 0, 13),
(143, 'Huyện Văn Bàn', 0, NULL, 0, 13),
(144, 'Thành phố Điện Biên Phủ', 0, NULL, 0, 7),
(145, 'Thị Xã Mường Lay', 0, NULL, 0, 7),
(146, 'Huyện Mường Nhé', 0, NULL, 0, 7),
(147, 'Huyện Mường Chà', 0, NULL, 0, 7),
(148, 'Huyện Tủa Chùa', 0, NULL, 0, 7),
(149, 'Huyện Tuần Giáo', 0, NULL, 0, 7),
(150, 'Huyện Điện Biên', 0, NULL, 0, 7),
(151, 'Huyện Điện Biên Đông', 0, NULL, 0, 7),
(152, 'Huyện Mường Ảng', 0, NULL, 0, 7),
(153, 'Huyện Nậm Pồ', 0, NULL, 0, 7),
(154, 'Thành phố Lai Châu', 0, NULL, 0, 14),
(155, 'Huyện Tam Đường', 0, NULL, 0, 14),
(156, 'Huyện Mường Tè', 0, NULL, 0, 14),
(157, 'Huyện Sìn Hồ', 0, NULL, 0, 14),
(158, 'Huyện Phong Thổ', 0, NULL, 0, 14),
(159, 'Huyện Than Uyên', 0, NULL, 0, 14),
(160, 'Huyện Tân Uyên', 0, NULL, 0, 14),
(161, 'Huyện Nậm Nhùn', 0, NULL, 0, 14),
(162, 'Thành phố Sơn La', 0, NULL, 0, 20),
(163, 'Huyện Quỳnh Nhai', 0, NULL, 0, 20),
(164, 'Huyện Thuận Châu', 0, NULL, 0, 20),
(165, 'Huyện Mường La', 0, NULL, 0, 20),
(166, 'Huyện Bắc Yên', 0, NULL, 0, 20),
(167, 'Huyện Phù Yên', 0, NULL, 0, 20),
(168, 'Huyện Mộc Châu', 0, NULL, 0, 20),
(169, 'Huyện Yên Châu', 0, NULL, 0, 20),
(170, 'Huyện Mai Sơn', 0, NULL, 0, 20),
(171, 'Huyện Sông Mã', 0, NULL, 0, 20),
(172, 'Huyện Sốp Cộp', 0, NULL, 0, 20),
(173, 'Huyện Vân Hồ', 0, NULL, 0, 20),
(174, 'Thành phố Yên Bái', 0, NULL, 0, 25),
(175, 'Thị xã Nghĩa Lộ', 0, NULL, 0, 25),
(176, 'Huyện Lục Yên', 0, NULL, 0, 25),
(177, 'Huyện Văn Yên', 0, NULL, 0, 25),
(178, 'Huyện Mù Căng Chải', 0, NULL, 0, 25),
(179, 'Huyện Trấn Yên', 0, NULL, 0, 25),
(180, 'Huyện Trạm Tấu', 0, NULL, 0, 25),
(181, 'Huyện Văn Chấn', 0, NULL, 0, 25),
(182, 'Huyện Yên Bình', 0, NULL, 0, 25),
(183, 'Thành phố Hòa Bình', 0, NULL, 0, 8),
(184, 'Huyện Đà Bắc', 0, NULL, 0, 8),
(185, 'Huyện Kỳ Sơn', 0, NULL, 0, 8),
(186, 'Huyện Lương Sơn', 0, NULL, 0, 8),
(187, 'Huyện Kim Bôi', 0, NULL, 0, 8),
(188, 'Huyện Cao Phong', 0, NULL, 0, 8),
(189, 'Huyện Tân Lạc', 0, NULL, 0, 8),
(190, 'Huyện Mai Châu', 0, NULL, 0, 8),
(191, 'Huyện Lạc Sơn', 0, NULL, 0, 8),
(192, 'Huyện Yên Thủy', 0, NULL, 0, 8),
(193, 'Huyện Lạc Thủy', 0, NULL, 0, 8),
(194, 'Thành phố Thái Nguyên', 0, NULL, 0, 22),
(195, 'Thành phố Sông Công', 0, NULL, 0, 22),
(196, 'Huyện Định Hóa', 0, NULL, 0, 22),
(197, 'Huyện Phú Lương', 0, NULL, 0, 22),
(198, 'Huyện Đồng Hỷ', 0, NULL, 0, 22),
(199, 'Huyện Võ Nhai', 0, NULL, 0, 22),
(200, 'Huyện Đại Từ', 0, NULL, 0, 22),
(201, 'Thị xã Phổ Yên', 0, NULL, 0, 22),
(202, 'Huyện Phú Bình', 0, NULL, 0, 22),
(203, 'Thành phố Lạng Sơn', 0, NULL, 0, 15),
(204, 'Huyện Tràng Định', 0, NULL, 0, 15),
(205, 'Huyện Bình Gia', 0, NULL, 0, 15),
(206, 'Huyện Văn Lãng', 0, NULL, 0, 15),
(207, 'Huyện Cao Lộc', 0, NULL, 0, 15),
(208, 'Huyện Văn Quan', 0, NULL, 0, 15),
(209, 'Huyện Bắc Sơn', 0, NULL, 0, 15),
(210, 'Huyện Hữu Lũng', 0, NULL, 0, 15),
(211, 'Huyện Chi Lăng', 0, NULL, 0, 15),
(212, 'Huyện Lộc Bình', 0, NULL, 0, 15),
(213, 'Huyện Đình Lập', 0, NULL, 0, 15),
(214, 'Thành phố Hạ Long', 0, NULL, 0, 19),
(215, 'Thành phố Móng Cái', 0, NULL, 0, 19),
(216, 'Thành phố Cẩm Phả', 0, NULL, 0, 19),
(217, 'Thành phố Uông Bí', 0, NULL, 0, 19),
(218, 'Huyện Bình Liêu', 0, NULL, 0, 19),
(219, 'Huyện Tiên Yên', 0, NULL, 0, 19),
(220, 'Huyện Đầm Hà', 0, NULL, 0, 19),
(221, 'Huyện Hải Hà', 0, NULL, 0, 19),
(222, 'Huyện Ba Chẽ', 0, NULL, 0, 19),
(223, 'Huyện Vân Đồn', 0, NULL, 0, 19),
(224, 'Huyện Hoành Bồ', 0, NULL, 0, 19),
(225, 'Thị xã Đông Triều', 0, NULL, 0, 19),
(226, 'Thị xã Quảng Yên', 0, NULL, 0, 19),
(227, 'Huyện Cô Tô', 0, NULL, 0, 19),
(228, 'Thành phố Bắc Giang', 0, NULL, 0, 3),
(229, 'Huyện Yên Thế', 0, NULL, 0, 3),
(230, 'Huyện Tân Yên', 0, NULL, 0, 3),
(231, 'Huyện Lạng Giang', 0, NULL, 0, 3),
(232, 'Huyện Lục Nam', 0, NULL, 0, 3),
(233, 'Huyện Lục Ngạn', 0, NULL, 0, 3),
(234, 'Huyện Sơn Động', 0, NULL, 0, 3),
(235, 'Huyện Yên Dũng', 0, NULL, 0, 3),
(236, 'Huyện Việt Yên', 0, NULL, 0, 3),
(237, 'Huyện Hiệp Hòa', 0, NULL, 0, 3),
(238, 'Thành phố Việt Trì', 0, NULL, 0, 18),
(239, 'Thị xã Phú Thọ', 0, NULL, 0, 18),
(240, 'Huyện Đoan Hùng', 0, NULL, 0, 18),
(241, 'Huyện Hạ Hoà', 0, NULL, 0, 18),
(242, 'Huyện Thanh Ba', 0, NULL, 0, 18),
(243, 'Huyện Phù Ninh', 0, NULL, 0, 18),
(244, 'Huyện Yên Lập', 0, NULL, 0, 18),
(245, 'Huyện Cẩm Khê', 0, NULL, 0, 18),
(246, 'Huyện Tam Nông', 0, NULL, 0, 18),
(247, 'Huyện Lâm Thao', 0, NULL, 0, 18),
(248, 'Huyện Thanh Sơn', 0, NULL, 0, 18),
(249, 'Huyện Thanh Thuỷ', 0, NULL, 0, 18),
(250, 'Huyện Tân Sơn', 0, NULL, 0, 18),
(251, 'Thành phố Vĩnh Yên', 0, NULL, 0, 24),
(252, 'Thị xã Phúc Yên', 0, NULL, 0, 24),
(253, 'Huyện Lập Thạch', 0, NULL, 0, 24),
(254, 'Huyện Tam Dương', 0, NULL, 0, 24),
(255, 'Huyện Tam Đảo', 0, NULL, 0, 24),
(256, 'Huyện Bình Xuyên', 0, NULL, 0, 24),
(257, 'Huyện Yên Lạc', 0, NULL, 0, 24),
(258, 'Huyện Vĩnh Tường', 0, NULL, 0, 24),
(259, 'Huyện Sông Lô', 0, NULL, 0, 24),
(260, 'Thành phố Bắc Ninh', 0, NULL, 0, 5),
(261, 'Huyện Yên Phong', 0, NULL, 0, 5),
(262, 'Huyện Quế Võ', 0, NULL, 0, 5),
(263, 'Huyện Tiên Du', 0, NULL, 0, 5),
(264, 'Thị xã Từ Sơn', 0, NULL, 0, 5),
(265, 'Huyện Thuận Thành', 0, NULL, 0, 5),
(266, 'Huyện Gia Bình', 0, NULL, 0, 5),
(267, 'Huyện Lương Tài', 0, NULL, 0, 5),
(268, 'Thành phố Hải Dương', 0, NULL, 0, 9),
(269, 'Thị xã Chí Linh', 0, NULL, 0, 9),
(270, 'Huyện Nam Sách', 0, NULL, 0, 9),
(271, 'Huyện Kinh Môn', 0, NULL, 0, 9),
(272, 'Huyện Kim Thành', 0, NULL, 0, 9),
(273, 'Huyện Thanh Hà', 0, NULL, 0, 9),
(274, 'Huyện Cẩm Giàng', 0, NULL, 0, 9),
(275, 'Huyện Bình Giang', 0, NULL, 0, 9),
(276, 'Huyện Gia Lộc', 0, NULL, 0, 9),
(277, 'Huyện Tứ Kỳ', 0, NULL, 0, 9),
(278, 'Huyện Ninh Giang', 0, NULL, 0, 9),
(279, 'Huyện Thanh Miện', 0, NULL, 0, 9),
(280, 'Quận Hồng Bàng', 0, NULL, 0, 2),
(281, 'Quận Ngô Quyền', 0, NULL, 0, 2),
(282, 'Quận Lê Chân', 0, NULL, 0, 2),
(283, 'Quận Hải An', 0, NULL, 0, 2),
(284, 'Quận Kiến An', 0, NULL, 0, 2),
(285, 'Quận Đồ Sơn', 0, NULL, 0, 2),
(286, 'Quận Dương Kinh', 0, NULL, 0, 2),
(287, 'Huyện Thuỷ Nguyên', 0, NULL, 0, 2),
(288, 'Huyện An Dương', 0, NULL, 0, 2),
(289, 'Huyện An Lão', 0, NULL, 0, 2),
(290, 'Huyện Kiến Thuỵ', 0, NULL, 0, 2),
(291, 'Huyện Tiên Lãng', 0, NULL, 0, 2),
(292, 'Huyện Vĩnh Bảo', 0, NULL, 0, 2),
(293, 'Huyện Cát Hải', 0, NULL, 0, 2),
(294, 'Thành phố Hưng Yên', 0, NULL, 0, 12),
(295, 'Huyện Văn Lâm', 0, NULL, 0, 12),
(296, 'Huyện Văn Giang', 0, NULL, 0, 12),
(297, 'Huyện Yên Mỹ', 0, NULL, 0, 12),
(298, 'Huyện Mỹ Hào', 0, NULL, 0, 12),
(299, 'Huyện Ân Thi', 0, NULL, 0, 12),
(300, 'Huyện Khoái Châu', 0, NULL, 0, 12),
(301, 'Huyện Kim Động', 0, NULL, 0, 12),
(302, 'Huyện Tiên Lữ', 0, NULL, 0, 12),
(303, 'Huyện Phù Cừ', 0, NULL, 0, 12),
(304, 'Thành phố Thái Bình', 0, NULL, 0, 21),
(305, 'Huyện Quỳnh Phụ', 0, NULL, 0, 21),
(306, 'Huyện Hưng Hà', 0, NULL, 0, 21),
(307, 'Huyện Đông Hưng', 0, NULL, 0, 21),
(308, 'Huyện Thái Thụy', 0, NULL, 0, 21),
(309, 'Huyện Tiền Hải', 0, NULL, 0, 21),
(310, 'Huyện Kiến Xương', 0, NULL, 0, 21),
(311, 'Huyện Vũ Thư', 0, NULL, 0, 21),
(312, 'Thành phố Phủ Lý', 0, NULL, 0, 11),
(313, 'Huyện Duy Tiên', 0, NULL, 0, 11),
(314, 'Huyện Kim Bảng', 0, NULL, 0, 11),
(315, 'Huyện Thanh Liêm', 0, NULL, 0, 11),
(316, 'Huyện Bình Lục', 0, NULL, 0, 11),
(317, 'Huyện Lý Nhân', 0, NULL, 0, 11),
(318, 'Thành phố Nam Định', 0, NULL, 0, 17),
(319, 'Huyện Mỹ Lộc', 0, NULL, 0, 17),
(320, 'Huyện Vụ Bản', 0, NULL, 0, 17),
(321, 'Huyện Ý Yên', 0, NULL, 0, 17),
(322, 'Huyện Nghĩa Hưng', 0, NULL, 0, 17),
(323, 'Huyện Nam Trực', 0, NULL, 0, 17),
(324, 'Huyện Trực Ninh', 0, NULL, 0, 17),
(325, 'Huyện Xuân Trường', 0, NULL, 0, 17),
(326, 'Huyện Giao Thủy', 0, NULL, 0, 17),
(327, 'Huyện Hải Hậu', 0, NULL, 0, 17),
(328, 'Thành phố Ninh Bình', 0, NULL, 0, 16),
(329, 'Thành phố Tam Điệp', 0, NULL, 0, 16),
(330, 'Huyện Nho Quan', 0, NULL, 0, 16),
(331, 'Huyện Gia Viễn', 0, NULL, 0, 16),
(332, 'Huyện Hoa Lư', 0, NULL, 0, 16),
(333, 'Huyện Yên Khánh', 0, NULL, 0, 16),
(334, 'Huyện Kim Sơn', 0, NULL, 0, 16),
(335, 'Huyện Yên Mô', 0, NULL, 0, 16),
(336, 'Thành phố Thanh Hóa', 0, NULL, 0, 44),
(337, 'Thị xã Bỉm Sơn', 0, NULL, 0, 44),
(338, 'Thành phố Sầm Sơn', 0, NULL, 0, 44),
(339, 'Huyện Mường Lát', 0, NULL, 0, 44),
(340, 'Huyện Quan Hóa', 0, NULL, 0, 44),
(341, 'Huyện Bá Thước', 0, NULL, 0, 44),
(342, 'Huyện Quan Sơn', 0, NULL, 0, 44),
(343, 'Huyện Lang Chánh', 0, NULL, 0, 44),
(344, 'Huyện Ngọc Lặc', 0, NULL, 0, 44),
(345, 'Huyện Cẩm Thủy', 0, NULL, 0, 44),
(346, 'Huyện Thạch Thành', 0, NULL, 0, 44),
(347, 'Huyện Hà Trung', 0, NULL, 0, 44),
(348, 'Huyện Vĩnh Lộc', 0, NULL, 0, 44),
(349, 'Huyện Yên Định', 0, NULL, 0, 44),
(350, 'Huyện Thọ Xuân', 0, NULL, 0, 44),
(351, 'Huyện Thường Xuân', 0, NULL, 0, 44),
(352, 'Huyện Triệu Sơn', 0, NULL, 0, 44),
(353, 'Huyện Thiệu Hóa', 0, NULL, 0, 44),
(354, 'Huyện Hoằng Hóa', 0, NULL, 0, 44),
(355, 'Huyện Hậu Lộc', 0, NULL, 0, 44),
(356, 'Huyện Nga Sơn', 0, NULL, 0, 44),
(357, 'Huyện Như Xuân', 0, NULL, 0, 44),
(358, 'Huyện Như Thanh', 0, NULL, 0, 44),
(359, 'Huyện Nông Cống', 0, NULL, 0, 44),
(360, 'Huyện Đông Sơn', 0, NULL, 0, 44),
(361, 'Huyện Quảng Xương', 0, NULL, 0, 44),
(362, 'Huyện Tĩnh Gia', 0, NULL, 0, 44),
(363, 'Thành phố Vinh', 0, NULL, 0, 37),
(364, 'Thị xã Cửa Lò', 0, NULL, 0, 37),
(365, 'Thị xã Thái Hoà', 0, NULL, 0, 37),
(366, 'Huyện Quế Phong', 0, NULL, 0, 37),
(367, 'Huyện Quỳ Châu', 0, NULL, 0, 37),
(368, 'Huyện Tương Dương', 0, NULL, 0, 37),
(369, 'Huyện Nghĩa Đàn', 0, NULL, 0, 37),
(370, 'Huyện Quỳ Hợp', 0, NULL, 0, 37),
(371, 'Huyện Quỳnh Lưu', 0, NULL, 0, 37),
(372, 'Huyện Con Cuông', 0, NULL, 0, 37),
(373, 'Huyện Tân Kỳ', 0, NULL, 0, 37),
(374, 'Huyện Anh Sơn', 0, NULL, 0, 37),
(375, 'Huyện Diễn Châu', 0, NULL, 0, 37),
(376, 'Huyện Yên Thành', 0, NULL, 0, 37),
(377, 'Huyện Đô Lương', 0, NULL, 0, 37),
(378, 'Huyện Thanh Chương', 0, NULL, 0, 37),
(379, 'Huyện Nghi Lộc', 0, NULL, 0, 37),
(380, 'Huyện Nam Đàn', 0, NULL, 0, 37),
(381, 'Huyện Hưng Nguyên', 0, NULL, 0, 37),
(382, 'Thị xã Hoàng Mai', 0, NULL, 0, 37),
(383, 'Thành phố Hà Tĩnh', 0, NULL, 0, 35),
(384, 'Thị xã Hồng Lĩnh', 0, NULL, 0, 35),
(385, 'Huyện Hương Sơn', 0, NULL, 0, 35),
(386, 'Huyện Đức Thọ', 0, NULL, 0, 35),
(387, 'Huyện Vũ Quang', 0, NULL, 0, 35),
(388, 'Huyện Nghi Xuân', 0, NULL, 0, 35),
(389, 'Huyện Can Lộc', 0, NULL, 0, 35),
(390, 'Huyện Hương Khê', 0, NULL, 0, 35),
(391, 'Huyện Thạch Hà', 0, NULL, 0, 35),
(392, 'Huyện Cẩm Xuyên', 0, NULL, 0, 35),
(393, 'Huyện Kỳ Anh', 0, NULL, 0, 35),
(394, 'Huyện Lộc Hà', 0, NULL, 0, 35),
(395, 'Thị xã Kỳ Anh', 0, NULL, 0, 35),
(396, 'Thành Phố Đồng Hới', 0, NULL, 0, 40),
(397, 'Huyện Minh Hóa', 0, NULL, 0, 40),
(398, 'Huyện Tuyên Hóa', 0, NULL, 0, 40),
(399, 'Huyện Quảng Trạch', 0, NULL, 0, 40),
(400, 'Huyện Bố Trạch', 0, NULL, 0, 40),
(401, 'Huyện Quảng Ninh', 0, NULL, 0, 40),
(402, 'Huyện Lệ Thủy', 0, NULL, 0, 40),
(403, 'Thị xã Ba Đồn', 0, NULL, 0, 40),
(404, 'Thành phố Đông Hà', 0, NULL, 0, 43),
(405, 'Thị xã Quảng Trị', 0, NULL, 0, 43),
(406, 'Huyện Vĩnh Linh', 0, NULL, 0, 43),
(407, 'Huyện Hướng Hóa', 0, NULL, 0, 43),
(408, 'Huyện Gio Linh', 0, NULL, 0, 43),
(409, 'Huyện Đa Krông', 0, NULL, 0, 43),
(410, 'Huyện Cam Lộ', 0, NULL, 0, 43),
(411, 'Huyện Triệu Phong', 0, NULL, 0, 43),
(412, 'Huyện Hải Lăng', 0, NULL, 0, 43),
(413, 'Thành phố Huế', 0, NULL, 0, 27),
(414, 'Huyện Phong Điền', 0, NULL, 0, 27),
(415, 'Huyện Quảng Điền', 0, NULL, 0, 27),
(416, 'Huyện Phú Vang', 0, NULL, 0, 44),
(417, 'Thị xã Hương Thủy', 0, NULL, 0, 27),
(418, 'Thị xã Hương Trà', 0, NULL, 0, 27),
(419, 'Huyện A Lưới', 0, NULL, 0, 27),
(420, 'Huyện Phú Lộc', 0, NULL, 0, 27),
(421, 'Huyện Nam Đông', 0, NULL, 0, 27),
(422, 'Quận Liên Chiểu', 0, NULL, 0, 26),
(423, 'Quận Thanh Khê', 0, NULL, 0, 26),
(424, 'Quận Hải Châu', 0, NULL, 0, 26),
(425, 'Quận Sơn Trà', 0, NULL, 0, 26),
(426, 'Quận Ngũ Hành Sơn', 0, NULL, 0, 26),
(427, 'Quận Cẩm Lệ', 0, NULL, 0, 26),
(428, 'Huyện Hòa Vang', 0, NULL, 0, 26),
(429, 'Thành phố Tam Kỳ', 0, NULL, 0, 41),
(430, 'Thành phố Hội An', 0, NULL, 0, 41),
(431, 'Huyện Tây Giang', 0, NULL, 0, 41),
(432, 'Huyện Đông Giang', 0, NULL, 0, 41),
(433, 'Huyện Đại Lộc', 0, NULL, 0, 41),
(434, 'Thị xã Điện Bàn', 0, NULL, 0, 41),
(435, 'Huyện Duy Xuyên', 0, NULL, 0, 41),
(436, 'Huyện Quế Sơn', 0, NULL, 0, 41),
(437, 'Huyện Nam Giang', 0, NULL, 0, 41),
(438, 'Huyện Phước Sơn', 0, NULL, 0, 41),
(439, 'Huyện Hiệp Đức', 0, NULL, 0, 41),
(440, 'Huyện Thăng Bình', 0, NULL, 0, 41),
(441, 'Huyện Tiên Phước', 0, NULL, 0, 41),
(442, 'Huyện Bắc Trà My', 0, NULL, 0, 41),
(443, 'Huyện Nam Trà My', 0, NULL, 0, 41),
(444, 'Huyện Núi Thành', 0, NULL, 0, 41),
(445, 'Huyện Phú Ninh', 0, NULL, 0, 41),
(446, 'Huyện Nông Sơn', 0, NULL, 0, 41),
(447, 'Thành phố Quảng Ngãi', 0, NULL, 0, 42),
(448, 'Huyện Bình Sơn', 0, NULL, 0, 42),
(449, 'Huyện Trà Bồng', 0, NULL, 0, 42),
(450, 'Huyện Tây Trà', 0, NULL, 0, 42),
(451, 'Huyện Sơn Tịnh', 0, NULL, 0, 42),
(452, 'Huyện Tư Nghĩa', 0, NULL, 0, 42),
(453, 'Huyện Sơn Hà', 0, NULL, 0, 42),
(454, 'Huyện Sơn Tây', 0, NULL, 0, 42),
(455, 'Huyện Minh Long', 0, NULL, 0, 42),
(456, 'Huyện Nghĩa Hành', 0, NULL, 0, 42),
(457, 'Huyện Mộ Đức', 0, NULL, 0, 42),
(458, 'Huyện Đức Phổ', 0, NULL, 0, 42),
(459, 'Huyện Ba Tơ', 0, NULL, 0, 42),
(460, 'Huyện Lý Sơn', 0, NULL, 0, 42),
(461, 'Thành phố Quy Nhơn', 0, NULL, 0, 30),
(462, 'Huyện Hoài Nhơn', 0, NULL, 0, 30),
(463, 'Huyện Hoài Ân', 0, NULL, 0, 30),
(464, 'Huyện Phù Mỹ', 0, NULL, 0, 30),
(465, 'Huyện Vĩnh Thạnh', 0, NULL, 0, 30),
(466, 'Huyện Tây Sơn', 0, NULL, 0, 30),
(467, 'Huyện Phù Cát', 0, NULL, 0, 30),
(468, 'Thị xã An Nhơn', 0, NULL, 0, 30),
(469, 'Huyện Tuy Phước', 0, NULL, 0, 30),
(470, 'Huyện Vân Canh', 0, NULL, 0, 30),
(471, 'Thành phố Tuy Hoà', 0, NULL, 0, 39),
(472, 'Thị xã Sông Cầu', 0, NULL, 0, 39),
(473, 'Huyện Đồng Xuân', 0, NULL, 0, 39),
(474, 'Huyện Tuy An', 0, NULL, 0, 39),
(475, 'Huyện Sơn Hòa', 0, NULL, 0, 39),
(476, 'Huyện Sông Hinh', 0, NULL, 0, 39),
(477, 'Huyện Tây Hoà', 0, NULL, 0, 39),
(478, 'Huyện Phú Hoà', 0, NULL, 0, 39),
(479, 'Huyện Đông Hòa', 0, NULL, 0, 39),
(480, 'Thành phố Nha Trang', 0, NULL, 0, 28),
(481, 'Thành phố Cam Ranh', 0, NULL, 0, 28),
(482, 'Huyện Cam Lâm', 0, NULL, 0, 28),
(483, 'Huyện Vạn Ninh', 0, NULL, 0, 28),
(484, 'Thị xã Ninh Hòa', 0, NULL, 0, 28),
(485, 'Huyện Khánh Vĩnh', 0, NULL, 0, 28),
(486, 'Huyện Diên Khánh', 0, NULL, 0, 28),
(487, 'Huyện Khánh Sơn', 0, NULL, 0, 28),
(488, 'Huyện Trường Sa', 0, NULL, 0, 28),
(489, 'Thành phố Phan Rang-Tháp Chàm', 0, NULL, 0, 38),
(490, 'Huyện Bác Ái', 0, NULL, 0, 38),
(491, 'Huyện Ninh Sơn', 0, NULL, 0, 38),
(492, 'Huyện Ninh Hải', 0, NULL, 0, 38),
(493, 'Huyện Ninh Phước', 0, NULL, 0, 38),
(494, 'Huyện Thuận Bắc', 0, NULL, 0, 38),
(495, 'Huyện Thuận Nam', 0, NULL, 0, 38),
(496, 'Thành phố Phan Thiết', 0, NULL, 0, 31),
(497, 'Thị xã La Gi', 0, NULL, 0, 31),
(498, 'Huyện Tuy Phong', 0, NULL, 0, 31),
(499, 'Huyện Bắc Bình', 0, NULL, 0, 31),
(500, 'Huyện Hàm Thuận Bắc', 0, NULL, 0, 31),
(501, 'Huyện Hàm Thuận Nam', 0, NULL, 0, 31),
(502, 'Huyện Tánh Linh', 0, NULL, 0, 31),
(503, 'Huyện Đức Linh', 0, NULL, 0, 31),
(504, 'Huyện Hàm Tân', 0, NULL, 0, 31),
(505, 'Huyện Phú Quí', 0, NULL, 0, 31),
(506, 'Thành phố Kon Tum', 0, NULL, 0, 36),
(507, 'Huyện Đắk Glei', 0, NULL, 0, 36),
(508, 'Huyện Ngọc Hồi', 0, NULL, 0, 36),
(509, 'Huyện Đắk Tô', 0, NULL, 0, 36),
(510, 'Huyện Kon Plông', 0, NULL, 0, 36),
(511, 'Huyện Kon Rẫy', 0, NULL, 0, 36),
(512, 'Huyện Đắk Hà', 0, NULL, 0, 36),
(513, 'Huyện Sa Thầy', 0, NULL, 0, 36),
(514, 'Huyện Tu Mơ Rông', 0, NULL, 0, 36),
(515, 'Huyện Ia H\' Drai', 0, NULL, 0, 36),
(516, 'Thành phố Pleiku', 0, NULL, 0, 34),
(517, 'Thị xã An Khê', 0, NULL, 0, 34),
(518, 'Thị xã Ayun Pa', 0, NULL, 0, 34),
(519, 'Huyện KBang', 0, NULL, 0, 34),
(520, 'Huyện Đăk Đoa', 0, NULL, 0, 34),
(521, 'Huyện Chư Păh', 0, NULL, 0, 34),
(522, 'Huyện Ia Grai', 0, NULL, 0, 34),
(523, 'Huyện Mang Yang', 0, NULL, 0, 34),
(524, 'Huyện Kông Chro', 0, NULL, 0, 34),
(525, 'Huyện Đức Cơ', 0, NULL, 0, 34),
(526, 'Huyện Chư Prông', 0, NULL, 0, 34),
(527, 'Huyện Chư Sê', 0, NULL, 0, 34),
(528, 'Huyện Đăk Pơ', 0, NULL, 0, 34),
(529, 'Huyện Ia Pa', 0, NULL, 0, 34),
(530, 'Huyện Krông Pa', 0, NULL, 0, 34),
(531, 'Huyện Phú Thiện', 0, NULL, 0, 34),
(532, 'Huyện Chư Pưh', 0, NULL, 0, 34),
(533, 'Thành phố Buôn Ma Thuột', 0, NULL, 0, 32),
(534, 'Thị Xã Buôn Hồ', 0, NULL, 0, 32),
(535, 'Huyện Ea H\'leo', 0, NULL, 0, 32),
(536, 'Huyện Ea Súp', 0, NULL, 0, 32),
(537, 'Huyện Buôn Đôn', 0, NULL, 0, 32),
(538, 'Huyện Cư M\'gar', 0, NULL, 0, 32),
(539, 'Huyện Krông Búk', 0, NULL, 0, 32),
(679, 'Thành phố Vĩnh Long', 0, NULL, 0, 63),
(541, 'Huyện Krông Năng', 0, NULL, 0, 32),
(542, 'Huyện Ea Kar', 0, NULL, 0, 32),
(543, 'Huyện M\'Đrắk', 0, NULL, 0, 32),
(544, 'Huyện Krông Bông', 0, NULL, 0, 32),
(545, 'Huyện Krông Pắc', 0, NULL, 0, 32),
(546, 'Huyện Krông A Na', 0, NULL, 0, 32),
(547, 'Huyện Lắk', 0, NULL, 0, 32),
(548, 'Huyện Cư Kuin', 0, NULL, 0, 32),
(549, 'Thị xã Gia Nghĩa', 0, NULL, 0, 33),
(550, 'Huyện Đăk Glong', 0, NULL, 0, 33),
(551, 'Huyện Cư Jút', 0, NULL, 0, 33),
(552, 'Huyện Đắk Mil', 0, NULL, 0, 33),
(553, 'Huyện Krông Nô', 0, NULL, 0, 33),
(554, 'Huyện Đắk Song', 0, NULL, 0, 33),
(555, 'Huyện Đắk R\'Lấp', 0, NULL, 0, 33),
(556, 'Huyện Tuy Đức', 0, NULL, 0, 33),
(557, 'Thành phố Đà Lạt', 0, NULL, 0, 29),
(558, 'Thành phố Bảo Lộc', 0, NULL, 0, 29),
(559, 'Huyện Đam Rông', 0, NULL, 0, 29),
(560, 'Huyện Lạc Dương', 0, NULL, 0, 29),
(561, 'Huyện Lâm Hà', 0, NULL, 0, 29),
(562, 'Huyện Đơn Dương', 0, NULL, 0, 29),
(563, 'Huyện Đức Trọng', 0, NULL, 0, 29),
(564, 'Huyện Di Linh', 0, NULL, 0, 29),
(565, 'Huyện Đạ Huoai', 0, NULL, 0, 29),
(566, 'Huyện Đạ Tẻh', 0, NULL, 0, 29),
(567, 'Huyện Cát Tiên', 0, NULL, 0, 29),
(568, 'Thị xã Phước Long', 0, NULL, 0, 51),
(569, 'Thị xã Đồng Xoài', 0, NULL, 0, 51),
(570, 'Thị xã Bình Long', 0, NULL, 0, 51),
(571, 'Huyện Bù Gia Mập', 0, NULL, 0, 51),
(572, 'Huyện Lộc Ninh', 0, NULL, 0, 51),
(573, 'Huyện Bù Đốp', 0, NULL, 0, 51),
(574, 'Huyện Hớn Quản', 0, NULL, 0, 51),
(575, 'Huyện Đồng Phú', 0, NULL, 0, 51),
(576, 'Huyện Bù Đăng', 0, NULL, 0, 51),
(577, 'Huyện Chơn Thành', 0, NULL, 0, 51),
(578, 'Huyện Phú Riềng', 0, NULL, 0, 51),
(579, 'Thành phố Tây Ninh', 0, NULL, 0, 61),
(580, 'Huyện Tân Biên', 0, NULL, 0, 61),
(581, 'Huyện Tân Châu', 0, NULL, 0, 61),
(582, 'Huyện Dương Minh Châu', 0, NULL, 0, 61),
(583, 'Huyện Châu Thành', 0, NULL, 0, 61),
(584, 'Huyện Hòa Thành', 0, NULL, 0, 61),
(585, 'Huyện Gò Dầu', 0, NULL, 0, 61),
(586, 'Huyện Bến Cầu', 0, NULL, 0, 61),
(587, 'Huyện Trảng Bàng', 0, NULL, 0, 61),
(588, 'Thành phố Thủ Dầu Một', 0, NULL, 0, 46),
(589, 'Huyện Bàu Bàng', 0, NULL, 0, 46),
(590, 'Huyện Dầu Tiếng', 0, NULL, 0, 46),
(591, 'Thị xã Bến Cát', 0, NULL, 0, 46),
(592, 'Huyện Phú Giáo', 0, NULL, 0, 46),
(593, 'Thị xã Tân Uyên', 0, NULL, 0, 46),
(594, 'Thị xã Dĩ An', 0, NULL, 0, 46),
(595, 'Thị xã Thuận An', 0, NULL, 0, 46),
(596, 'Huyện Bắc Tân Uyên', 0, NULL, 0, 46),
(597, 'Thành phố Biên Hòa', 0, NULL, 0, 55),
(598, 'Thị xã Long Khánh', 0, NULL, 0, 55),
(599, 'Huyện Tân Phú', 0, NULL, 0, 55),
(600, 'Huyện Vĩnh Cửu', 0, NULL, 0, 55),
(601, 'Huyện Định Quán', 0, NULL, 0, 55),
(602, 'Huyện Trảng Bom', 0, NULL, 0, 55),
(603, 'Huyện Thống Nhất', 0, NULL, 0, 55),
(604, 'Huyện Cẩm Mỹ', 0, NULL, 0, 55),
(605, 'Huyện Long Thành', 0, NULL, 0, 55),
(606, 'Huyện Xuân Lộc', 0, NULL, 0, 55),
(607, 'Huyện Nhơn Trạch', 0, NULL, 0, 55),
(608, 'Thành phố Vũng Tàu', 0, NULL, 0, 47),
(609, 'Thành phố Bà Rịa', 0, NULL, 0, 47),
(610, 'Huyện Châu Đức', 0, NULL, 0, 47),
(611, 'Huyện Xuyên Mộc', 0, NULL, 0, 47),
(612, 'Huyện Long Điền', 0, NULL, 0, 47),
(613, 'Huyện Đất Đỏ', 0, NULL, 0, 47),
(614, 'Huyện Tân Thành', 0, NULL, 0, 47),
(615, 'Quận 1', 0, NULL, 0, 45),
(616, 'Quận 12', 0, NULL, 0, 45),
(617, 'Quận Thủ Đức', 0, NULL, 0, 45),
(618, 'Quận 9', 0, NULL, 0, 45),
(619, 'Quận Gò Vấp', 0, NULL, 0, 45),
(620, 'Quận Bình Thạnh', 0, NULL, 0, 45),
(621, 'Quận Tân Bình', 0, NULL, 0, 45),
(622, 'Quận Tân Phú', 0, NULL, 0, 45),
(623, 'Quận Phú Nhuận', 0, NULL, 0, 45),
(624, 'Quận 2', 0, NULL, 0, 45),
(625, 'Quận 3', 0, NULL, 0, 45),
(626, 'Quận 10', 0, NULL, 0, 45),
(627, 'Quận 11', 0, NULL, 0, 45),
(628, 'Quận 4', 0, NULL, 0, 45),
(629, 'Quận 5', 0, NULL, 0, 45),
(630, 'Quận 6', 0, NULL, 0, 45),
(631, 'Quận 8', 0, NULL, 0, 45),
(632, 'Quận Bình Tân', 0, NULL, 0, 45),
(633, 'Quận 7', 0, NULL, 0, 45),
(634, 'Huyện Củ Chi', 0, NULL, 0, 45),
(635, 'Huyện Hóc Môn', 0, NULL, 0, 45),
(636, 'Huyện Bình Chánh', 0, NULL, 0, 45),
(637, 'Huyện Nhà Bè', 0, NULL, 0, 45),
(638, 'Huyện Cần Giờ', 0, NULL, 0, 45),
(639, 'Thành phố Tân An', 0, NULL, 0, 58),
(640, 'Thị xã Kiến Tường', 0, NULL, 0, 58),
(641, 'Huyện Tân Hưng', 0, NULL, 0, 58),
(642, 'Huyện Vĩnh Hưng', 0, NULL, 0, 45),
(643, 'Huyện Mộc Hóa', 0, NULL, 0, 58),
(644, 'Huyện Tân Thạnh', 0, NULL, 0, 58),
(645, 'Huyện Thạnh Hóa', 0, NULL, 0, 58),
(646, 'Huyện Đức Huệ', 0, NULL, 0, 58),
(647, 'Huyện Đức Hòa', 0, NULL, 0, 58),
(648, 'Huyện Bến Lức', 0, NULL, 0, 58),
(649, 'Huyện Thủ Thừa', 0, NULL, 0, 58),
(650, 'Huyện Tân Trụ', 0, NULL, 0, 58),
(651, 'Huyện Cần Đước', 0, NULL, 0, 58),
(652, 'Huyện Cần Giuộc', 0, NULL, 0, 58),
(653, 'Thành phố Mỹ Tho', 0, NULL, 0, 60),
(654, 'Thị xã Gò Công', 0, NULL, 0, 60),
(655, 'Thị xã Cai Lậy', 0, NULL, 0, 60),
(656, 'Huyện Tân Phước', 0, NULL, 0, 60),
(657, 'Huyện Cái Bè', 0, NULL, 0, 60),
(658, 'Huyện Cai Lậy', 0, NULL, 0, 60),
(772, 'Huyện Châu Thành', 0, NULL, 0, 52),
(660, 'Huyện Gò Công Tây', 0, NULL, 0, 60),
(661, 'Huyện Gò Công Đông', 0, NULL, 0, 60),
(662, 'Huyện Tân Phú Đông', 0, NULL, 0, 60),
(663, 'Thành phố Bến Tre', 0, NULL, 0, 52),
(664, 'Huyện Chợ Lách', 0, NULL, 0, 52),
(665, 'Huyện Mỏ Cày Nam', 0, NULL, 0, 52),
(666, 'Huyện Giồng Trôm', 0, NULL, 0, 52),
(667, 'Huyện Bình Đại', 0, NULL, 0, 52),
(668, 'Huyện Ba Tri', 0, NULL, 0, 52),
(669, 'Huyện Thạnh Phú', 0, NULL, 0, 52),
(670, 'Huyện Mỏ Cày Bắc', 0, NULL, 0, 52),
(671, 'Thành phố Trà Vinh', 0, NULL, 0, 62),
(672, 'Huyện Càng Long', 0, NULL, 0, 62),
(673, 'Huyện Cầu Kè', 0, NULL, 0, 62),
(674, 'Huyện Tiểu Cần', 0, NULL, 0, 62),
(675, 'Huyện Cầu Ngang', 0, NULL, 0, 62),
(676, 'Huyện Trà Cú', 0, NULL, 0, 62),
(677, 'Huyện Duyên Hải', 0, NULL, 0, 62),
(678, 'Thị xã Duyên Hải', 0, NULL, 0, 62),
(680, 'Huyện Long Hồ', 0, NULL, 0, 63),
(681, 'Huyện Mang Thít', 0, NULL, 0, 63),
(682, 'Huyện  Vũng Liêm', 0, NULL, 0, 63),
(683, 'Huyện Tam Bình', 0, NULL, 0, 63),
(684, 'Thị xã Bình Minh', 0, NULL, 0, 63),
(685, 'Huyện Trà Ôn', 0, NULL, 0, 63),
(686, 'Huyện Bình Tân', 0, NULL, 0, 63),
(687, 'Thành phố Cao Lãnh', 0, NULL, 0, 54),
(688, 'Thành phố Sa Đéc', 0, NULL, 0, 54),
(689, 'Thị xã Hồng Ngự', 0, NULL, 0, 54),
(690, 'Huyện Tân Hồng', 0, NULL, 0, 54),
(691, 'Huyện Hồng Ngự', 0, NULL, 0, 54),
(692, 'Huyện Tháp Mười', 0, NULL, 0, 54),
(693, 'Huyện Cao Lãnh', 0, NULL, 0, 54),
(694, 'Huyện Thanh Bình', 0, NULL, 0, 54),
(695, 'Huyện Lấp Vò', 0, NULL, 0, 54),
(696, 'Huyện Lai Vung', 0, NULL, 0, 54),
(697, 'Thành phố Long Xuyên', 0, NULL, 0, 49),
(698, 'Thành phố Châu Đốc', 0, NULL, 0, 49),
(699, 'Huyện An Phú', 0, NULL, 0, 49),
(700, 'Thị xã Tân Châu', 0, NULL, 0, 49),
(701, 'Huyện Phú Tân', 0, NULL, 0, 49),
(702, 'Huyện Châu Phú', 0, NULL, 0, 49),
(703, 'Huyện Tịnh Biên', 0, NULL, 0, 49),
(704, 'Huyện Tri Tôn', 0, NULL, 0, 49),
(705, 'Huyện Thoại Sơn', 0, NULL, 0, 49),
(706, 'Thành phố Rạch Giá', 0, NULL, 0, 57),
(707, 'Thị xã Hà Tiên', 0, NULL, 0, 57),
(708, 'Huyện Kiên Lương', 0, NULL, 0, 57),
(709, 'Huyện Hòn Đất', 0, NULL, 0, 57),
(717, 'Huyện Phú Quốc', 0, NULL, 0, 57),
(711, 'Huyện Tân Hiệp', 0, NULL, 0, 57),
(712, 'Huyện Giồng Riềng', 0, NULL, 0, 57),
(713, 'Huyện Gò Quao', 0, NULL, 0, 57),
(714, 'Huyện An Biên', 0, NULL, 0, 57),
(715, 'Huyện An Minh', 0, NULL, 0, 57),
(716, 'Huyện Vĩnh Thuận', 0, NULL, 0, 57),
(718, 'Huyện Kiên Hải', 0, NULL, 0, 57),
(719, 'Huyện U Minh Thượng', 0, NULL, 0, 57),
(720, 'Huyện Giang Thành', 0, NULL, 0, 57),
(721, 'Quận Ninh Kiều', 0, NULL, 0, 48),
(722, 'Quận Ô Môn', 0, NULL, 0, 48),
(723, 'Quận Bình Thuỷ', 0, NULL, 0, 48),
(724, 'Quận Cái Răng', 0, NULL, 0, 48),
(725, 'Quận Thốt Nốt', 0, NULL, 0, 48),
(726, 'Huyện Cờ Đỏ', 0, NULL, 0, 48),
(727, 'Huyện Thới Lai', 0, NULL, 0, 48),
(728, 'Thành phố Vị Thanh', 0, NULL, 0, 56),
(729, 'Thị xã Ngã Bảy', 0, NULL, 0, 56),
(730, 'Huyện Châu Thành A', 0, NULL, 0, 56),
(731, 'Huyện Phụng Hiệp', 0, NULL, 0, 56),
(732, 'Huyện Vị Thuỷ', 0, NULL, 0, 56),
(733, 'Huyện Long Mỹ', 0, NULL, 0, 56),
(734, 'Thị xã Long Mỹ', 0, NULL, 0, 56),
(735, 'Thành phố Sóc Trăng', 0, NULL, 0, 59),
(736, 'Huyện Kế Sách', 0, NULL, 0, 59),
(737, 'Huyện Mỹ Tú', 0, NULL, 0, 59),
(738, 'Huyện Cù Lao Dung', 0, NULL, 0, 59),
(739, 'Huyện Long Phú', 0, NULL, 0, 59),
(740, 'Huyện Mỹ Xuyên', 0, NULL, 0, 59),
(741, 'Thị xã Ngã Năm', 0, NULL, 0, 59),
(742, 'Huyện Thạnh Trị', 0, NULL, 0, 59),
(743, 'Thị xã Vĩnh Châu', 0, NULL, 0, 59),
(744, 'Huyện Trần Đề', 0, NULL, 0, 59),
(745, 'Thành phố Bạc Liêu', 0, NULL, 0, 50),
(746, 'Huyện Hồng Dân', 0, NULL, 0, 50),
(747, 'Huyện Phước Long', 0, NULL, 0, 50),
(748, 'Huyện Vĩnh Lợi', 0, NULL, 0, 50),
(749, 'Thị xã Giá Rai', 0, NULL, 0, 50),
(750, 'Huyện Đông Hải', 0, NULL, 0, 50),
(751, 'Huyện Hoà Bình', 0, NULL, 0, 50),
(752, 'Thành phố Cà Mau', 0, NULL, 0, 53),
(753, 'Huyện U Minh', 0, NULL, 0, 53),
(754, 'Huyện Thới Bình', 0, NULL, 0, 53),
(755, 'Huyện Trần Văn Thời', 0, NULL, 0, 53),
(756, 'Huyện Cái Nước', 0, NULL, 0, 53),
(757, 'Huyện Đầm Dơi', 0, NULL, 0, 53),
(758, 'Huyện Năm Căn', 0, NULL, 0, 53),
(759, 'Huyện Ngọc Hiển', 0, NULL, 0, 53),
(760, 'Huyện Chợ Mới', 0, NULL, 0, 49),
(761, 'Huyện Châu Thành', 0, NULL, 0, 56),
(762, 'Huyện Châu Thành', 0, NULL, 0, 49),
(763, 'Thị Xã Cam Đường', 0, NULL, 0, 13),
(764, 'Huyện Châu Thành', 0, NULL, 0, 54),
(765, 'Huyện Tam Nông', 0, NULL, 0, 54),
(766, 'Huyện Bạch Long Vĩ', 0, NULL, 0, 2),
(767, 'Huyện Bảo Lâm', 0, NULL, 0, 29),
(768, 'Huyện Vĩnh Hưng', 0, NULL, 0, 58),
(769, 'Huyện Châu Thành', 0, NULL, 0, 58),
(771, 'Huyện Châu Thành', 0, NULL, 0, 60),
(773, 'Huyện Phụng Hiệp', 0, NULL, 0, 53);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `collection_name` text,
  `avt_img` text,
  `file` text,
  `view_mode` int(11) DEFAULT NULL,
  `except` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='bộ sưu tập đáng chú ý';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_parent` int(11) DEFAULT '0',
  `content` text,
  `image` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '1: công ty, 2: nhân viên',
  `hidden` int(11) NOT NULL DEFAULT '0' COMMENT '1:ẩn; 0:ko ẩn',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_new`, `id_user`, `id_parent`, `content`, `image`, `user_type`, `hidden`, `created_at`, `updated_at`) VALUES
(24, 177, 1761, 0, 'đâsdsad DDD', '', 1, 0, 1632744406, 1632744406),
(25, 167, 1761, 0, 'zxczxcDDD', '', 1, 0, 1632745489, 1632745489),
(26, 177, 1761, 0, 'asdasdasd', '', 1, 0, 1632793794, 1632793794),
(27, 177, 1761, 0, 'wqeqweq', '', 1, 0, 1632794198, 1632794198),
(28, 177, 1761, 0, 'asdadas', '', 1, 0, 1632794360, 1632794360),
(29, 177, 1761, 0, 'asdasdas', '', 1, 0, 1632794373, 1632794373),
(31, 177, 1761, 0, 'asdsada', '', 1, 0, 1632794621, 1632794621),
(32, 177, 1761, 0, 'asdasd', '', 1, 0, 1632794698, 1632794698),
(33, 177, 1761, 0, 'asdsad', '', 1, 0, 1632794817, 1632794817),
(34, 177, 1761, 0, 'asdasdasd', '', 1, 0, 1632794845, 1632794845),
(35, 177, 1761, 0, 'dasdasd', '', 1, 0, 1632794932, 1632794932),
(36, 177, 1761, 0, 'asdasdasd', '', 1, 0, 1632795025, 1632795025),
(37, 177, 1761, 0, 'asdasdasd', '', 1, 0, 1632795129, 1632795129),
(38, 177, 1761, 0, 'asdasd', '', 1, 0, 1632795304, 1632795304),
(39, 177, 1761, 0, 'asdasd', '', 1, 0, 1632795345, 1632795345),
(42, 177, 1761, 0, 'ádasd', '', 1, 0, 1632797285, 1632797285),
(43, 177, 1761, 0, 'ádasdasd', '', 1, 0, 1632797326, 1632797326),
(44, 177, 1761, 0, 'ádasdasd', '', 1, 0, 1632797347, 1632797347),
(45, 177, 1761, 0, 'ádasd', '', 1, 0, 1632797432, 1632797432),
(46, 177, 1761, 0, 'ádasdasd', '', 1, 0, 1632797505, 1632797505),
(47, 177, 1761, 0, 'a', '../img/new_feed/comment/10304.png', 1, 0, 1632817862, 1632817862),
(50, 177, 1761, 0, 'ádasd', '../img/new_feed/comment/11818.png', 1, 0, 1632818805, 1632818805),
(51, 177, 1761, 0, 'dấds', '../img/new_feed/comment/23860.png', 1, 0, 1632818865, 1632818865),
(52, 177, 1761, 0, 'ádasd', '', 1, 0, 1632818911, 1632818911),
(53, 177, 1761, 0, 'ádasdasd', '', 1, 0, 1632818934, 1632818934),
(54, 177, 1761, 0, 'ádasd', '../img/new_feed/comment/31226.png', 1, 0, 1632818955, 1632818955),
(55, 177, 1761, 0, 'new nưe', '../img/new_feed/comment/16548.png', 1, 0, 1632818965, 1632818965),
(56, 177, 1761, 0, 'new new', '../img/new_feed/comment/20050.png', 1, 0, 1632819039, 1632819039),
(57, 177, 1761, 0, 'ấdasdsad', '../img/new_feed/comment/223.png', 1, 0, 1632819492, 1632819492),
(58, 177, 1761, 0, 'qưeqwe', '', 1, 0, 1632819549, 1632819549),
(61, 177, 1761, 0, 'khânhsdamd', '', 1, 0, 1632823656, 1632823656),
(62, 177, 1761, 0, 'dasadasd', '../img/new_feed/comment/13405.png', 1, 0, 1632827387, 1632827387),
(63, 177, 1761, 0, 'ádasdasd', '../img/new_feed/comment/5024.png', 1, 0, 1632877959, 1632877959),
(64, 177, 1761, 0, '', '../img/new_feed/comment/24536.png', 1, 0, 1632881092, 1632881092),
(65, 177, 1761, 64, 'C:fakepathScreenshot (3).png', '', 1, 0, 1632881997, 1632881997),
(66, 177, 1761, 64, 'C:fakepathScreenshot (3).png', '../img/new_feed/comment/3219.png', 1, 0, 1632882063, 1632882063),
(67, 177, 1761, 64, 'ádasdasd', '', 1, 0, 1632882350, 1632882350),
(68, 177, 1761, 64, 'ádasda', '', 1, 0, 1632882691, 1632882691),
(69, 177, 1761, 64, 'ádasdasd', '', 1, 0, 1632886180, 1632886180),
(70, 177, 1761, 64, 'ádasdasd', '', 1, 0, 1632886185, 1632886185),
(71, 177, 1761, 64, 'rep cmt', '', 1, 0, 1632886588, 1632886588),
(72, 177, 1761, 64, 'cmt', '', 1, 0, 1632886680, 1632886680),
(73, 177, 1761, 64, 'cmt', '../img/new_feed/comment/23539.png', 1, 0, 1632886691, 1632886691),
(74, 177, 1761, 64, '', '../img/new_feed/comment/19068.png', 1, 0, 1632886968, 1632886968),
(75, 177, 1761, 63, 'ádasdas', '', 1, 0, 1632887021, 1632887021),
(76, 177, 1761, 64, 'ádasdasd', '', 1, 0, 1632887039, 1632887039),
(77, 177, 1761, 63, 'ádasdasd', '', 1, 0, 1632887043, 1632887043),
(78, 177, 1761, 64, '.', '', 1, 0, 1632887064, 1632887064),
(79, 177, 1761, 62, 'ádasd', '', 1, 0, 1632887134, 1632887134),
(80, 177, 1761, 63, 'ádasdasd', '', 1, 0, 1632887137, 1632887137),
(81, 177, 1761, 64, 'ádasdsasd', '', 1, 0, 1632887140, 1632887140),
(82, 177, 1761, 64, '', '../img/new_feed/comment/95.png', 1, 0, 1632887158, 1632887158),
(83, 177, 1761, 64, '', '../img/new_feed/comment/207.png', 1, 0, 1632887162, 1632887162),
(84, 177, 1761, 62, 'đâsdasd', '', 1, 0, 1632904361, 1632904361),
(86, 177, 1761, 85, 'ádasdasd', '', 1, 0, 1632904554, 1632904554),
(87, 177, 1761, 85, 'ádasdasd', '', 1, 0, 1632904632, 1632904632),
(88, 177, 1761, 85, 'ádasdas', '', 1, 0, 1632907841, 1632907841),
(89, 177, 1761, 63, 'ádasdas', '', 1, 0, 1632908580, 1632908580),
(90, 177, 1761, 62, 'ádasdasd', '', 1, 0, 1632908583, 1632908583),
(91, 177, 1761, 62, 'aaaa', '', 1, 0, 1632908589, 1632908589),
(92, 177, 1761, 60, 'khanh khanh', '', 1, 0, 1632908614, 1632908614),
(93, 177, 1761, 64, 'andnad,ad', '', 1, 0, 1632992459, 1632992459),
(94, 177, 1761, 0, 'ádasdasd', '', 1, 0, 1632992586, 1632992586),
(95, 177, 1761, 0, 'ádasdasd', '', 1, 0, 1632992694, 1632992694),
(96, 177, 1761, 0, 'ádasdasd', '', 1, 0, 1632992700, 1632992700),
(97, 177, 1761, 0, 'ádasdasd', '', 1, 0, 1632992717, 1632992717),
(98, 177, 1761, 0, 'ádasda', '', 1, 0, 1632993006, 1632993006),
(99, 177, 1761, 0, 'eqwqwe', '', 1, 0, 1632993220, 1632993220),
(100, 177, 1761, 99, 'ưeqeqwe', '', 1, 0, 1632993223, 1632993223),
(101, 177, 1761, 0, 'ádasdasd', '', 1, 0, 1632993439, 1632993439),
(102, 177, 1761, 101, 'ádadasd', '', 1, 0, 1632993443, 1632993443),
(103, 177, 1761, 101, 'âsdasd', '', 1, 0, 1632993488, 1632993488),
(104, 177, 1761, 0, 'ádasd', '', 1, 0, 1632993751, 1632993751),
(105, 177, 1761, 104, 'ádasdasd', '', 1, 0, 1632993756, 1632993756),
(106, 177, 1761, 104, 'cmtcke', '../img/new_feed/comment/29336.png', 1, 0, 1632994694, 1632994694),
(107, 188, 1761, 0, 'qewq', '', 1, 0, 1634140589, 1634140589),
(108, 188, 1761, 107, 'ew', '', 1, 0, 1634140592, 1634140592),
(109, 188, 1761, 107, 'edd', '', 1, 0, 1634140596, 1634140596),
(110, 208, 1761, 0, 'ádasd', '', 1, 0, 1634196433, 1634196433),
(111, 220, 2164, 0, 'zxczxczx', '', 1, 0, 1634197618, 1634197618),
(112, 220, 2164, 111, 'zxczxcz', '', 1, 0, 1634197623, 1634197623),
(113, 220, 2164, 111, '', '../img/new_feed/comment/209986558.jpeg', 1, 0, 1634197640, 1634197640),
(114, 208, 1761, 0, 'dsdadas', '', 1, 0, 1634199030, 1634199030),
(115, 208, 1761, 0, 'dsad', '', 1, 0, 1634199273, 1634199273),
(116, 208, 1761, 0, 'sdsd', '', 1, 0, 1634199276, 1634199276),
(117, 223, 2498, 0, 'đâsad', '', 1, 0, 1634202749, 1634202749),
(118, 223, 2498, 0, 'asdsa', '', 1, 0, 1634203710, 1634203710),
(119, 224, 2498, 0, 'ssd', '', 1, 0, 1634347688, 1634347688),
(120, 225, 1636, 0, 'đây là bình luận', '', 1, 0, 1634626844, 1634626844),
(121, 225, 1636, 0, '', '../img/new_feed/comment/818958478.jpg', 1, 0, 1634626858, 1634626858),
(122, 226, 1636, 0, '', '../img/new_feed/comment/701122121.jpg', 1, 0, 1634626893, 1634626893),
(123, 228, 1636, 0, '', '../img/new_feed/comment/1645431276.jpg', 1, 0, 1634629686, 1634629686),
(124, 263, 1636, 0, 'gagwhwdddd', '', 1, 0, 1634632586, 1634632602),
(125, 124, 1636, 0, '', '../img/new_feed/comment/2107427525.jpg', 1, 0, 1634632611, 1634632611),
(126, 279, 1636, 0, 'ỏ', '', 1, 0, 1634635845, 1634635845),
(127, 281, 1636, 0, 'đây là bình luận', '', 1, 0, 1634647554, 1634647554),
(128, 281, 1636, 0, '', '../img/new_feed/comment/1921492532.jpg', 1, 0, 1634647566, 1634647566),
(129, 281, 1636, 128, '1234', '', 1, 0, 1634648094, 1634648094),
(130, 301, 1636, 0, 'hú hú', '', 1, 0, 1634698229, 1634698229),
(131, 302, 1750, 0, 'xin chào', '', 1, 0, 1634713138, 1634713138),
(132, 308, 2498, 0, 'adasd', '../img/new_feed/comment/1218601357.png', 1, 0, 1634716402, 1634716402),
(133, 219, 2164, 0, '123123', '', 1, 0, 1634726073, 1634726073),
(134, 322, 2498, 0, 'asdsa', '', 1, 0, 1634726083, 1634726083),
(135, 219, 2164, 0, '123123', '', 1, 0, 1634726089, 1634726089),
(136, 222, 1761, 0, 'hi', '', 1, 0, 1634726214, 1634726214),
(137, 324, 1761, 0, 'Hi', '', 1, 0, 1634726362, 1634726362),
(138, 333, 1664, 0, 'Oke', '', 1, 0, 1634785601, 1634785610),
(139, 333, 1664, 138, 'Eo, ko đi được đâu...muộn lắm', '', 1, 0, 1634802092, 1634802092),
(140, 333, 1664, 138, 'Hú hú,aemmmmmmmmmmmm', '', 1, 0, 1634802109, 1634802109),
(141, 342, 1664, 0, 'oke men', '', 1, 0, 1634802645, 1634802645),
(142, 342, 1664, 0, 'okeee bajnnn nhé', '', 1, 0, 1634802845, 1634802845),
(143, 334, 1664, 0, '', '../img/new_feed/comment/97366133.jpg', 1, 0, 1634803149, 1634803149),
(144, 334, 1664, 0, '', '../img/new_feed/comment/2065440598.jpg', 1, 0, 1634803150, 1634803150),
(145, 333, 1664, 138, 'Eo, ko đi được đâu...muộn lắm', '', 1, 0, 1634806331, 1634806331),
(146, 333, 1664, 138, 'đi chứ', '', 1, 0, 1634806339, 1634806339),
(147, 343, 168, 0, 'NGON QUÁ NHỈ', '', 1, 0, 1635068584, 1635068584),
(148, 349, 2498, 0, 'Khanh oc', '', 1, 0, 1635156454, 1635156454),
(149, 349, 2498, 0, 'kkk', '', 1, 0, 1635156639, 1635156639),
(150, 349, 2498, 0, 'Khanh db', '', 1, 0, 1635156754, 1635156754),
(151, 349, 2498, 0, 'VK', '', 1, 0, 1635157036, 1635157036),
(152, 349, 2498, 151, 'aadsada', '', 1, 0, 1635157914, 1635157914),
(153, 342, 1664, 0, 'oke chị ạ', '', 1, 0, 1635163332, 1635163332),
(154, 342, 1664, 0, 'Hiiii, vâng ạ', '', 1, 0, 1635163448, 1635163448),
(155, 364, 2498, 0, 'Ghjj', '', 1, 0, 1635304370, 1635304370),
(156, 365, 2498, 0, 'adas', '', 1, 0, 1635385152, 1635385152),
(157, 371, 2498, 0, 'das', '', 1, 0, 1635388382, 1635388382),
(158, 371, 2498, 0, 'ads', '', 1, 0, 1635388732, 1635388732),
(159, 371, 2498, 0, 'aasd', '', 1, 0, 1635388794, 1635388794),
(160, 371, 2498, 0, '11111', '', 1, 0, 1635388832, 1635388832),
(161, 381, 2498, 0, 'asd', '', 1, 0, 1635407722, 1635407722),
(162, 381, 2498, 0, 'asd', '', 1, 0, 1635407722, 1635407722),
(163, 386, 2498, 0, 'asdsdsad', '', 1, 0, 1635410171, 1635410171),
(164, 385, 2498, 0, 'ádasd', '', 1, 0, 1635411822, 1635411822),
(165, 385, 2498, 0, 'ádsa', '', 1, 0, 1635412000, 1635412000),
(166, 385, 2498, 165, 'ádas', '', 1, 0, 1635412002, 1635412002),
(167, 385, 2498, 0, 'á', '', 1, 0, 1635412014, 1635412014),
(168, 385, 2498, 167, 'aa', '', 1, 0, 1635412172, 1635412172),
(169, 385, 2498, 167, 'd', '', 1, 0, 1635412223, 1635412236),
(170, 385, 2498, 167, 'ád', '', 1, 0, 1635412243, 1635412243),
(171, 386, 2498, 163, 'asds', '', 1, 0, 1635412776, 1635412776),
(172, 386, 2498, 163, 'asd', '', 1, 0, 1635412894, 1635412894),
(173, 386, 2498, 163, 'asd', '', 1, 0, 1635413053, 1635413053),
(174, 386, 2498, 163, 'adsasdas1111', '', 1, 0, 1635413152, 1635413152),
(175, 386, 2498, 163, 'asd`11111', '', 1, 0, 1635413195, 1635413195),
(176, 386, 2498, 163, 'asdas', '', 1, 0, 1635413302, 1635413302),
(177, 386, 2498, 163, 'sadsa11', '', 1, 0, 1635413348, 1635413348),
(178, 386, 2498, 0, 'asda', '', 1, 0, 1635413378, 1635413378),
(179, 386, 2498, 163, 'asdasass', '', 1, 0, 1635413446, 1635413446),
(180, 386, 2498, 163, 'asdsda', '', 1, 0, 1635413496, 1635413496),
(181, 386, 2498, 163, 'dasd', '', 1, 0, 1635413581, 1635413581),
(182, 386, 2498, 163, 'xczx', '', 1, 0, 1635413619, 1635413619),
(183, 386, 2498, 163, 'sdasd', '', 1, 0, 1635413649, 1635413649),
(184, 386, 2498, 163, 'sasdas', '', 1, 0, 1635413678, 1635413678),
(185, 386, 2498, 163, 'asdsdsa', '', 1, 0, 1635413710, 1635413710),
(186, 386, 2498, 163, 'asdas', '', 1, 0, 1635413734, 1635413734),
(187, 386, 2498, 163, 'asdasdd', '', 1, 0, 1635413785, 1635413785),
(188, 386, 2498, 163, 'sadasd', '', 1, 0, 1635414395, 1635414395),
(189, 386, 2498, 163, 'dd', '', 1, 0, 1635414430, 1635414430),
(190, 386, 2498, 163, 'sas', '', 1, 0, 1635414492, 1635414492),
(191, 386, 2498, 178, 'das', '', 1, 0, 1635414566, 1635414566),
(192, 386, 2498, 0, 'd', '', 1, 0, 1635414595, 1635414595),
(193, 386, 2498, 163, 'd', '', 1, 0, 1635414616, 1635414616),
(194, 386, 2498, 163, 'ddsd', '', 1, 0, 1635414670, 1635414670),
(195, 386, 2498, 192, 'dsad', '', 1, 0, 1635414759, 1635414759),
(196, 386, 2498, 192, 'asdas', '', 1, 0, 1635414795, 1635414795),
(197, 386, 2498, 192, 'sdsd', '', 1, 0, 1635414834, 1635414834),
(198, 386, 2498, 192, 'asdsad', '', 1, 0, 1635414884, 1635414884),
(199, 386, 2498, 0, 'asd111', '', 1, 0, 1635414900, 1635414900),
(200, 386, 2498, 199, 'sdsa', '', 1, 0, 1635415492, 1635415492),
(201, 386, 2498, 192, 'dasd', '', 1, 0, 1635415499, 1635415499),
(202, 386, 2498, 199, 'sdsa', '', 1, 0, 1635415595, 1635415595),
(203, 386, 2498, 199, 'dd', '', 1, 0, 1635415852, 1635415852),
(204, 386, 2498, 0, 'asdsa', '../img/new_feed/comment/1613838248.png', 1, 0, 1635494541, 1635494541),
(205, 385, 2498, 167, 'sdasd', '', 1, 0, 1635495737, 1635495737),
(206, 385, 2498, 167, 'dsad', '../img/new_feed/comment/1855470028.png', 1, 0, 1635495748, 1635495748),
(207, 386, 2498, 199, 'sadas', '../img/new_feed/comment/193003670.png', 1, 0, 1635495842, 1635495842),
(208, 390, 1664, 0, 'vâng ạ, mà cho e hỏi chút với', '', 1, 0, 1635733592, 1635733618),
(209, 390, 1664, 208, 'oke anh Hưng', '', 1, 0, 1635733600, 1635733600),
(210, 393, 1664, 0, 'oke chị nhé', '', 1, 0, 1635735320, 1635735320),
(211, 399, 1664, 0, 'hú hú', '', 1, 0, 1635825954, 1635825954),
(212, 399, 1664, 0, 'cực thú vị', '', 1, 0, 1635825962, 1635825962),
(213, 399, 1664, 0, 'cực hayyyy các bạn ơi', '', 1, 0, 1635825972, 1635825972),
(214, 399, 1664, 0, 'lạ thật, ko thể hiểu nội', '', 1, 0, 1635825995, 1635825995),
(215, 399, 1664, 0, 'sao lại thể nhỉ ', '', 1, 0, 1635826001, 1635826001),
(216, 399, 1664, 215, 'ai vậy c ơi, check giúp t vs', '', 1, 0, 1635826013, 1635826013),
(217, 402, 1761, 0, 'xin chào', '', 1, 0, 1635839058, 1635839058),
(218, 402, 1761, 0, 'helo', '', 1, 0, 1635839064, 1635839064),
(219, 402, 1761, 218, 'uê', '', 1, 0, 1635839069, 1635839069),
(220, 0, 1761, 217, 'ú òa', '', 1, 0, 1635839073, 1635839073),
(221, 402, 1761, 0, 'í chà chà', '../img/new_feed/comment/42578853.png', 1, 0, 1635839880, 1635839880),
(222, 206, 1761, 0, 'sgg', '', 1, 0, 1635841323, 1635841323),
(223, 205, 1761, 0, 'hayyyy', '', 1, 0, 1635841331, 1635841331),
(224, 422, 1761, 0, 'Ú òa', '', 1, 0, 1635912589, 1635912589),
(225, 423, 1761, 0, 'Dgyghij', '', 1, 0, 1635989962, 1635989962),
(226, 427, 1664, 0, 'oke chị ơi', '', 1, 0, 1636683471, 1636683471),
(227, 433, 1636, 0, '1234', '', 1, 0, 1636773180, 1636773180),
(228, 433, 1636, 227, '5678', '', 1, 0, 1636773189, 1636773189),
(229, 433, 1636, 0, 'cho thuê nhà ', '../img/new_feed/comment/1930947430.PNG', 1, 0, 1636773213, 1636773249),
(230, 433, 2693, 229, '12345', '', 2, 0, 1636773303, 1636773303),
(231, 526, 1636, 0, 'fdffdfdffd', '', 1, 0, 1637891820, 1637891820),
(232, 527, 1664, 0, 'oke chị ạ, vâng anh nha, e quên =))', '', 1, 0, 1637918810, 1637918829),
(233, 0, 1664, 232, 'oke bạn nhé', '', 1, 0, 1637918942, 1637918942),
(234, 528, 1664, 0, 'wow, oke', '', 1, 0, 1637920769, 1637920769),
(235, 530, 1664, 0, 'woww, đúng chuẩn rồi, phải join thôi các bạn ơi', '', 1, 0, 1637922982, 1637923066),
(236, 530, 1664, 235, 'hí hí', '', 1, 0, 1637922988, 1637922988),
(237, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016548, 1638016548),
(238, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016550, 1638016550),
(239, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016801, 1638016801),
(240, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016801, 1638016801),
(241, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016802, 1638016802),
(242, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016803, 1638016803),
(243, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016803, 1638016803),
(244, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016803, 1638016803),
(245, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016804, 1638016804),
(246, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016805, 1638016805),
(247, 533, 0, 0, 'ôi, ngon quá', '', 0, 0, 1638016805, 1638016805),
(248, 534, 1664, 0, 'cố lên em yêu!', '', 1, 0, 1638414243, 1638414243),
(249, 0, 1664, 248, 'Cố lên, cố gắn nhé', '', 1, 0, 1638414259, 1638414269),
(250, 538, 1664, 0, 'OKE CHỨ', '', 1, 0, 1638416395, 1638416395),
(251, 538, 3714, 0, 'ôi, sợ lắm chị ơi, covid cô veo..ô hay', '', 2, 0, 1638416500, 1638416539),
(252, 538, 3714, 0, 'Hà Nội mấy trăm ca lận, thế á =)))', '../img/new_feed/comment/1445936951.jpeg', 2, 0, 1638416515, 1638416584),
(253, 538, 1664, 252, 'ui, hehe', '', 1, 0, 1638416781, 1638416781),
(254, 537, 3714, 0, 'oke chi nhé', '', 2, 0, 1638416850, 1638416850),
(258, 539, 3007, 0, 'Ái chà bình luận', '', 2, 0, 1638438116, 1638438116),
(259, 539, 1761, 258, 'hihi', '', 1, 0, 1638438622, 1638438622),
(260, 539, 1761, 258, 'hihi', '', 1, 0, 1638438632, 1638438632),
(261, 539, 1761, 258, 'hihi', '', 1, 0, 1638438633, 1638438633),
(262, 539, 1761, 258, 'hihi', '', 1, 0, 1638438634, 1638438634),
(263, 539, 1761, 258, 'hihi', '', 1, 0, 1638438635, 1638438635),
(264, 539, 1761, 258, 'hihi', '', 1, 0, 1638438635, 1638438635),
(265, 539, 1761, 258, 'hihi', '', 1, 0, 1638438636, 1638438636),
(266, 539, 1761, 258, 'ối chà', '', 1, 0, 1638438699, 1638438699),
(267, 539, 1761, 258, 'ối chà', '', 1, 0, 1638438700, 1638438700),
(268, 539, 1761, 258, 'ối chà', '', 1, 0, 1638438701, 1638438701),
(269, 539, 1761, 258, 'ối chà', '', 1, 0, 1638438705, 1638438705),
(270, 539, 1761, 258, 'ối chà', '', 1, 0, 1638438796, 1638438796),
(271, 539, 1761, 0, 'thế à', '', 1, 0, 1638496579, 1638496579),
(272, 539, 1761, 0, 'cccc', '', 1, 0, 1638496697, 1638496697),
(273, 539, 3007, 0, 'ối chà', '', 2, 0, 1638505575, 1638505575),
(274, 539, 3007, 0, '123123', '', 2, 0, 1638505781, 1638505781),
(275, 539, 3007, 0, '123123', '', 2, 0, 1638505831, 1638505831),
(276, 539, 3007, 0, '123123123123', '', 2, 0, 1638505836, 1638505836),
(277, 539, 3007, 0, '123123', '', 2, 0, 1638505872, 1638505872),
(278, 539, 3007, 0, 'chào bạn', '', 2, 0, 1638506097, 1638506097),
(279, 539, 3007, 0, 'ối chà', '', 2, 0, 1638506101, 1638506101),
(280, 539, 3007, 0, 'zxczxc', '', 2, 0, 1638506130, 1638506130),
(281, 539, 3007, 0, '123123', '', 2, 0, 1638506850, 1638506850),
(282, 539, 3007, 0, '123123', '', 2, 0, 1638506854, 1638506854),
(283, 539, 3007, 0, '123123', '', 2, 0, 1638506858, 1638506858),
(284, 539, 3007, 0, 'thêm bình luận nè', '', 2, 0, 1638507203, 1638507203),
(285, 539, 3007, 0, 'hihi', '', 2, 0, 1638507239, 1638507239),
(286, 539, 3007, 0, 'zxczxc', '', 2, 0, 1638507241, 1638507241),
(287, 539, 3007, 0, 'zxczxc', '', 2, 0, 1638507252, 1638507252),
(288, 539, 3007, 0, 'zxczxcxz', '', 2, 0, 1638507255, 1638507255),
(289, 539, 3007, 0, 'zxczxczxc', '', 2, 0, 1638507258, 1638507258),
(290, 539, 3007, 0, 'ối chà', '', 2, 0, 1638507344, 1638507344),
(291, 539, 3007, 0, 'czczxzxc', '', 2, 0, 1638507346, 1638507346),
(292, 539, 3007, 0, 'zxczxc', '', 2, 0, 1638507359, 1638507359),
(293, 539, 3007, 0, 'zxczxc', '', 2, 0, 1638507423, 1638507423),
(294, 539, 3007, 0, 'zxczxczxc', '', 2, 0, 1638507426, 1638507426),
(295, 539, 3007, 0, 'zxczxczxc', '', 2, 0, 1638507899, 1638507899),
(296, 539, 3007, 0, 'zxczxc', '', 2, 0, 1638507950, 1638507950),
(297, 539, 3007, 0, 'zczxczxc', '', 2, 0, 1638507955, 1638507955),
(298, 539, 3007, 0, 'zxczxczxc', '', 2, 0, 1638507981, 1638507981),
(299, 539, 3007, 0, 'zxczxczxc', '', 2, 0, 1638507993, 1638507993),
(300, 539, 3007, 0, 'zxczxcxc', '', 2, 0, 1638507995, 1638507995),
(301, 539, 3007, 0, 'zxczxc', '', 2, 0, 1638508001, 1638508001),
(302, 539, 3007, 0, 'zxczxczxc', '', 2, 0, 1638508003, 1638508003),
(303, 539, 3007, 0, 'zxczxczxc', '', 2, 0, 1638508005, 1638508005),
(304, 539, 3007, 0, 'ccccc', '', 2, 0, 1638508009, 1638508009),
(305, 539, 1761, 0, 'ôi cha', '', 1, 0, 1638515167, 1638515167),
(306, 539, 3007, 305, 'zxczxczxc', '', 2, 0, 1638520937, 1638520937),
(307, 539, 1761, 305, 'trả lời bình luận nè', '', 1, 0, 1638521975, 1638521975),
(308, 539, 1761, 305, 'trả lời nè', '', 1, 0, 1638522074, 1638522074),
(309, 539, 1761, 305, 'ủa ủa alo', '', 1, 0, 1638522167, 1638522167),
(310, 539, 3007, 305, 'hihi', '', 2, 0, 1638522345, 1638522345),
(311, 539, 1761, 305, 'zxczxczxczx', '', 1, 0, 1638526529, 1638526529),
(312, 539, 1761, 305, 'zxczxczxczxxzc', '', 1, 0, 1638526530, 1638526530),
(313, 539, 1761, 305, 'zxczxczxczxxzczxcxcz', '', 1, 0, 1638526531, 1638526531),
(314, 539, 1761, 305, 'zxczxczxczxxzczx', '', 1, 0, 1638526532, 1638526532),
(315, 539, 1761, 305, 'zxczxczxczxxzczxc', '', 1, 0, 1638526532, 1638526532),
(316, 544, 1761, 0, 'i', '', 1, 0, 1639730081, 1639730081),
(317, 545, 2840, 0, 'ádasdasdas', '', 1, 0, 1640156725, 1640156725),
(318, 545, 2840, 0, 'ádadasd', '', 1, 0, 1640156731, 1640156731),
(319, 545, 2840, 0, 'ádasdasd', '', 1, 0, 1640156733, 1640156733),
(320, 545, 2840, 0, 'ádadsadasdasdas', '', 1, 0, 1640156767, 1640156767),
(321, 551, 2840, 0, 'asd', '', 1, 0, 1640160673, 1640160673),
(322, 551, 2840, 0, 'asd', '', 1, 0, 1640160674, 1640160674),
(323, 551, 2840, 0, 'asdas', '', 1, 0, 1640160675, 1640160675),
(324, 551, 2840, 0, 'asdas', '', 1, 0, 1640160677, 1640160677),
(326, 556, 2840, 0, '', '/', 1, 0, 1640169357, 1640169357),
(327, 556, 2840, 0, '', '/', 1, 0, 1640169593, 1640169593),
(349, 561, 2840, 0, 'asd', '', 1, 0, 1640225402, 1640225402),
(350, 561, 2840, 0, '', '../img/new_feed/comment/1194098197.jfif', 1, 0, 1640225455, 1640225455),
(351, 561, 2840, 0, '', '../img/new_feed/comment/412942985.png', 1, 0, 1640225576, 1640225576),
(352, 561, 2840, 0, '', '../img/new_feed/comment/1957644176.png', 1, 0, 1640225595, 1640225595),
(353, 561, 2840, 0, '', '../img/new_feed/comment/1703911141.png', 1, 0, 1640225641, 1640225641),
(354, 561, 2840, 0, '', '../img/new_feed/comment/855712328.png', 1, 0, 1640225670, 1640225670),
(355, 561, 2840, 0, '', '../img/new_feed/comment/3323732.png', 1, 0, 1640225790, 1640225790),
(358, 561, 2840, 0, 'ádsad', '../img/new_feed/comment/247715572.png', 1, 0, 1640225969, 1640225969),
(359, 561, 2840, 0, 'ád', '', 1, 0, 1640225984, 1640225984),
(360, 561, 2840, 0, 'sad', '', 1, 0, 1640226299, 1640226299),
(361, 561, 2840, 0, 'ádas', '', 1, 0, 1640226505, 1640226505),
(362, 561, 2840, 0, 'sadsa', '', 1, 0, 1640226542, 1640226542),
(363, 561, 2840, 0, '1vuong', '', 1, 0, 1640226561, 1640226561),
(364, 561, 2840, 0, '', '../img/new_feed/comment/1683282356.png', 1, 0, 1640226581, 1640226581),
(365, 561, 2840, 0, 'ưe', '', 1, 0, 1640226631, 1640226631),
(366, 561, 2840, 0, 'qưewq', '', 1, 0, 1640226671, 1640226671),
(367, 561, 2840, 0, 'ádsad', '', 1, 0, 1640226745, 1640226745),
(368, 561, 2840, 0, 'ádas111222333222dddeeee', '', 1, 0, 1640226757, 1640227083),
(369, 561, 2840, 368, 'adssaqwe', '', 1, 0, 1640226788, 1640226788),
(370, 561, 2840, 368, '', '/', 1, 0, 1640226796, 1640226796),
(371, 561, 2840, 0, 'adasd', '../img/new_feed/comment/849768480.png', 1, 0, 1640227105, 1640227105),
(372, 561, 2840, 0, 'sadas', '', 1, 0, 1640227574, 1640227574),
(373, 561, 2840, 0, '', '../img/new_feed/comment/204579882.png', 1, 0, 1640227586, 1640227586),
(374, 561, 2840, 0, 'dasddd11111', '../img/new_feed/comment/1185350151.png', 1, 0, 1640227597, 1640227615),
(375, 561, 2840, 0, '1', '', 1, 0, 1640227757, 1640227757),
(376, 561, 2840, 0, '', '../img/new_feed/comment/1778623792.png', 1, 0, 1640227764, 1640227764),
(377, 561, 2840, 0, '1', '../img/new_feed/comment/327571611.png', 1, 0, 1640227772, 1640227772),
(398, 565, 2840, 0, 'sada', '', 1, 0, 1640232425, 1640232425),
(413, 565, 2840, 398, 'das', '', 1, 0, 1640245383, 1640245383),
(414, 567, 2840, 0, 'ád', '', 1, 0, 1640250397, 1640250397),
(415, 567, 2840, 414, 'sds', '', 1, 0, 1640250521, 1640250521),
(416, 567, 2840, 0, '1', '', 1, 0, 1640251824, 1640251824),
(417, 567, 2840, 0, '2', '', 1, 0, 1640251826, 1640251826),
(418, 567, 2840, 0, '3', '', 1, 0, 1640251827, 1640251827),
(419, 568, 1664, 0, 'oke con dê đen', '', 1, 0, 1640255160, 1640255160),
(420, 602, 1664, 0, 'oke nha, chụt chụt', '', 1, 0, 1640510229, 1640510239),
(421, 605, 1664, 0, 'HU HÚ', '', 1, 0, 1640512454, 1640512454),
(422, 610, 1666, 0, 'Em đã thấy rồi chị', '', 2, 0, 1642219423, 1642219423),
(423, 610, 1009, 422, 'ok em', '', 1, 0, 1642558990, 1642558990),
(424, 525, 1636, 0, 'abcas', '', 1, 0, 1644544155, 1644544155),
(425, 526, 1636, 231, '4564', '', 1, 0, 1644544182, 1644544182),
(426, 612, 1636, 0, 'âsdasas', '', 1, 0, 1644545638, 1644545638),
(427, 619, 1636, 0, 'haha', '', 1, 0, 1647337793, 1647337793),
(428, 625, 5327, 0, 'ggggg', '', 2, 0, 1649759130, 1649759130),
(429, 625, 5327, 428, 'retretre', '', 2, 0, 1649759136, 1649759136),
(430, 625, 5327, 0, '', '../img/new_feed/comment/1227030496.png', 2, 0, 1649759151, 1649759151),
(431, 525, 1636, 0, 'xin chào', '', 1, 0, 1650958574, 1650958574),
(432, 525, 1636, 431, 'chao xìn', '', 1, 0, 1650958580, 1650958580),
(433, 525, 1636, 431, '12312312312312', '', 1, 0, 1650958623, 1650958623),
(434, 525, 1636, 431, '12313123123', '', 1, 0, 1650958641, 1650958641),
(435, 541, 1636, 0, 'cô dạy em', '', 1, 0, 1650958648, 1650958648),
(436, 619, 1636, 0, 'xin chào ni hảo', '', 1, 0, 1651135896, 1651135896),
(437, 637, 1636, 0, 'aloalo', '', 1, 0, 1659413262, 1659413262),
(438, 637, 1636, 0, 'blo blo', '', 1, 0, 1659413271, 1659413271),
(439, 637, 1636, 0, 'clo clo', '', 1, 0, 1659413277, 1659413277),
(440, 637, 1636, 0, 'dlo dlo', '', 1, 0, 1659413285, 1659413285),
(441, 637, 1636, 0, 'ahihi', '', 1, 0, 1659413293, 1659413293),
(442, 637, 1636, 0, 'ahuhhuh', '', 1, 0, 1659413301, 1659413301),
(443, 639, 1636, 0, 'alo', '', 1, 0, 1659510591, 1659510591),
(444, 653, 83885, 0, 'lo', '', 1, 0, 1664854548, 1664854548),
(445, 653, 83885, 0, 'êfejfe', '', 1, 0, 1664854551, 1664854551),
(446, 653, 83885, 0, 'ỉg', '', 1, 0, 1664854552, 1664854552),
(447, 0, 83885, 446, 'ị', '', 1, 0, 1664854559, 1664854559),
(448, 653, 83885, 445, 'có thể không', '', 1, 0, 1664854569, 1664854569),
(449, 653, 83885, 0, 'rgrg', '', 1, 0, 1664854582, 1664854582),
(450, 653, 83885, 0, 'r', '', 1, 0, 1664854583, 1664854583),
(451, 653, 83885, 0, 'erwr', '', 1, 0, 1664854585, 1664854585),
(452, 653, 83885, 0, 'wwer', '', 1, 0, 1664854586, 1664854586),
(453, 653, 83885, 0, 'weryyyyyyyyyyyyy', '', 1, 0, 1664854587, 1664854611),
(454, 653, 83885, 0, 'wet', '', 1, 0, 1664854588, 1664854588),
(455, 653, 83885, 0, 'tểtt', '', 1, 0, 1664854591, 1664854591),
(456, 653, 83885, 455, 'rrr', '', 1, 0, 1664854596, 1664854596),
(457, 653, 83885, 454, 'rrr', '', 1, 0, 1664854603, 1664854603),
(458, 652, 83885, 0, 'ssssss', '', 1, 0, 1664854864, 1664854864),
(459, 655, 72132, 0, 'bình luận', '', 1, 0, 1667179257, 1667179257),
(460, 655, 72132, 459, 'trả lời bình luận', '', 1, 0, 1667179266, 1667179277),
(462, 659, 72216, 0, 'tes', '../img/new_feed/comment/1908942020.jpg', 1, 0, 1668152865, 1668152865),
(463, 666, 72132, 0, 'ko thèm tham gia', '', 1, 0, 1668156532, 1668156532),
(464, 666, 72132, 0, 'bình luận 2', '', 1, 0, 1668157208, 1668157208),
(465, 655, 72132, 459, 'no', '', 1, 0, 1668214656, 1668214656),
(466, 662, 72132, 0, 'đa', '', 1, 0, 1668224822, 1668224822),
(467, 693, 72132, 0, '1', '', 1, 0, 1668242493, 1668242493),
(468, 697, 72132, 0, 'nâu', '', 1, 0, 1668243006, 1668243006),
(469, 697, 72132, 0, 'nâu 2', '', 1, 0, 1668243014, 1668243014),
(470, 710, 51770, 0, '85551', '', 2, 0, 1668389940, 1668389940),
(471, 710, 51770, 0, 'lai nao', '', 2, 0, 1668389970, 1668389970),
(472, 710, 51770, 0, 'fasf', '', 2, 0, 1668390292, 1668390292),
(473, 707, 51770, 0, '86465fas', '', 2, 0, 1668390434, 1668390434),
(474, 736, 72132, 0, 'ngáo', '', 1, 0, 1668501378, 1668501378),
(475, 736, 51770, 0, 'ờ ngáo', '', 2, 0, 1668501530, 1668501530),
(476, 733, 5699, 0, 'ngáo 2.0', '', 2, 0, 1668507328, 1668507328),
(477, 733, 5699, 0, 'ngáo 0.5 - đạp đạp - đạp chanh chua', '', 2, 0, 1668563902, 1668563902),
(478, 733, 5699, 477, 'không có ở đây', '', 2, 0, 1668563918, 1668563918),
(479, 734, 5699, 0, 'bình luận có ảnhp', '', 2, 0, 1668566293, 1669274028),
(480, 479, 5699, 0, 'bình luận ảnh ngang', '../img/new_feed/comment/1771488365.jpg', 2, 0, 1668567088, 1668567088),
(483, 733, 5699, 477, 'chỉ có ngáo 2.0 mlem thui', '', 2, 1, 1668585832, 1668585832),
(484, 733, 5699, 477, 'à vs cả dung muội nữa', '', 2, 0, 1668585932, 1668585932),
(485, 734, 5699, 481, 'trả lại cho anh mảnh khăn hồng ó', '', 2, 0, 1668608898, 1668608898),
(486, 734, 5699, 479, 'bình luận cấp 2 bị ẩn', '', 2, 1, 1668611453, 1668611453),
(487, 734, 5699, 479, '1', '', 2, 0, 1668611830, 1668611830),
(488, 734, 5699, 479, '2', '', 2, 0, 1668611834, 1668611834),
(489, 734, 5699, 479, '3', '', 2, 0, 1668611837, 1668611837),
(490, 734, 5699, 479, '4', '', 2, 1, 1668611845, 1668611845),
(491, 734, 5699, 479, '5', '', 2, 0, 1668611850, 1668611850),
(492, 734, 5699, 479, '6', '', 2, 1, 1668611853, 1668611853),
(493, 723, 5699, 0, 'bình luận lv1', '', 2, 0, 1668650104, 1668650104),
(494, 723, 5699, 493, 'bình luận lv2', '', 2, 1, 1668650116, 1668650116),
(495, 733, 8296, 477, 'còn con vàng vàng kia là golden ko p husky', '', 2, 0, 1668650965, 1668650965),
(496, 733, 5699, 477, 'nhưng cx ngáo', '', 2, 0, 1668651014, 1668651014),
(497, 733, 5699, 477, 'lại còn đần', '', 2, 0, 1668651021, 1668651021),
(498, 733, 8296, 477, 'nhưng đáng yêuuuu', '', 2, 0, 1668651036, 1668651036),
(499, 723, 8296, 0, 'bình luận lv1 111', '', 2, 0, 1668656544, 1668656544),
(500, 723, 5699, 499, 'bình luận lv2', '', 2, 0, 1668656632, 1668656632),
(501, 744, 55967, 0, 'thành viên mới', '', 2, 0, 1668658449, 1668658449),
(502, 741, 5750, 0, 'fvds', '', 2, 0, 1668670843, 1668670843),
(506, 741, 5750, 502, 'gdfc', '', 2, 0, 1668670922, 1668670922),
(507, 667, 5699, 0, 'a', '', 2, 0, 1668670923, 1668670959),
(508, 667, 5699, 0, 'b', '', 2, 0, 1668670938, 1668670966),
(509, 740, 5750, 0, 'dcc', '../img/new_feed/comment/1171044464.jpg', 2, 0, 1668670945, 1668670945),
(510, 739, 5750, 0, '12345', '../img/new_feed/comment/232535070.jpg', 2, 0, 1668670962, 1668670962),
(511, 508, 5699, 0, 'c', '', 2, 0, 1668670973, 1668670973),
(512, 739, 5750, 510, '543', '../img/new_feed/comment/1199525541.jpg', 2, 0, 1668670974, 1668670974),
(513, 508, 5699, 0, 'd', '', 2, 0, 1668670975, 1668670975),
(514, 508, 5699, 0, 'e', '', 2, 0, 1668670978, 1668670978),
(515, 508, 5699, 0, 'f', '', 2, 0, 1668670981, 1668670981),
(516, 508, 5699, 0, 'g', '', 2, 0, 1668670982, 1668670982),
(517, 667, 5699, 0, 'c', '', 2, 0, 1668670993, 1668670993),
(518, 667, 5699, 0, 'd', '', 2, 0, 1668670996, 1668670996),
(519, 667, 5699, 0, 'e', '', 2, 0, 1668670999, 1668670999),
(520, 667, 5699, 0, 'f', '', 2, 0, 1668671002, 1668671002),
(521, 667, 5699, 0, 'g', '', 2, 0, 1668671004, 1668671004),
(522, 741, 8296, 0, 'ko', '', 2, 0, 1668671265, 1668671265),
(523, 741, 5699, 0, 'k', '', 2, 0, 1668671275, 1668671275),
(524, 755, 5699, 0, '12', 'https://chamcong.24hpay.vn/upload/employee/ep5699/app_avatar_cropped.png', 2, 0, 1669086874, 1671791907),
(525, 0, 5699, 524, '2', '', 2, 0, 1669086878, 1669086878),
(526, 757, 5699, 0, 'p', '', 2, 0, 1669103997, 1669103997),
(527, 757, 5699, 0, 'p1', '', 2, 0, 1669106505, 1669106505),
(528, 757, 5699, 0, 'p2', '', 2, 0, 1669106542, 1669106542),
(529, 757, 5699, 0, 'p0', '', 2, 0, 1669106659, 1669106659),
(530, 757, 5699, 0, 'p3', '', 2, 0, 1669111426, 1669111426),
(531, 757, 5699, 0, 'p4', '', 2, 0, 1669112086, 1669112086),
(532, 757, 5699, 0, 'ơ', '../img/new_feed/comment/291068831.jpg', 2, 0, 1669169363, 1669169363),
(534, 757, 5699, 0, '', '../img/new_feed/comment/1130032474.jpg', 2, 0, 1669169427, 1669169427),
(535, 757, 5699, 0, '', '../img/new_feed/comment/1615038186.jpg', 2, 0, 1669169429, 1670041720),
(536, 757, 5699, 527, 'p', '', 2, 0, 1669173983, 1669173983),
(537, 757, 5699, 532, 'p', '', 2, 0, 1669175169, 1669175169),
(538, 757, 5699, 532, 'q', '', 2, 1, 1669175230, 1669175230),
(539, 757, 5699, 532, 'ư', '', 2, 1, 1669175239, 1669175239),
(540, 757, 5699, 528, '', '../img/new_feed/comment/303921085.jpeg', 2, 0, 1669175292, 1669175292),
(542, 757, 5699, 0, 'j', '', 2, 0, 1669175862, 1669175862),
(543, 757, 5699, 542, 'jj', '', 2, 0, 1669175885, 1669175885),
(544, 757, 5699, 0, 'p', '', 2, 0, 1669175891, 1669175891),
(545, 757, 5699, 0, 'l', '', 2, 0, 1669175955, 1669175955),
(546, 757, 5699, 0, 'l', '', 2, 0, 1669176013, 1669176013),
(547, 757, 5699, 0, 'pp', '', 2, 0, 1669176035, 1669176035),
(548, 757, 5699, 0, 'q', '', 2, 0, 1669176452, 1669176452),
(549, 757, 5699, 548, 'qq', '', 2, 0, 1669176572, 1669176572),
(550, 757, 5699, 548, 'qqq', '', 2, 0, 1669176583, 1669176583),
(551, 757, 5699, 0, 'o', '', 2, 0, 1669176869, 1669176869),
(552, 757, 5699, 0, 'po5', '', 2, 0, 1669188778, 1669252057),
(553, 741, 5699, 0, '', '../img/new_feed/comment/1696997162.jpg', 2, 0, 1669199124, 1669199124),
(554, 734, 5699, 479, '', '../img/new_feed/comment/1102473837.jpeg', 2, 0, 1669263818, 1669263818),
(555, 741, 5699, 0, '', '../img/new_feed/comment/476648027.jpg', 2, 0, 1669274234, 1669274234),
(556, 734, 5699, 0, '', '../img/new_feed/comment/1055816881.jpg', 2, 0, 1669306709, 1669306709),
(557, 765, 5737, 0, 'gfgfggfgf', '', 2, 0, 1669608454, 1669608454),
(558, 765, 5737, 0, 'fdfdf', '', 2, 0, 1669608460, 1669608460),
(559, 779, 8296, 0, 'ok', '', 2, 0, 1669791504, 1669791504),
(560, 777, 5699, 0, 'p', '', 2, 0, 1669793279, 1669793279),
(561, 777, 5699, 0, '', '../img/new_feed/comment/919323860.jpg', 2, 0, 1669793299, 1669793299),
(562, 791, 5699, 0, 'Bài viết mới', '', 2, 0, 1669869100, 1669869100),
(563, 774, 5699, 0, 'p', '', 2, 0, 1669970258, 1669970258),
(564, 779, 5699, 559, 'ơ', '', 2, 0, 1669971456, 1669971456),
(566, 757, 5699, 0, '', '../img/new_feed/comment/112125381.png', 2, 0, 1670051848, 1670053271),
(567, 566, 5699, 0, 'p', '../img/new_feed/comment/1950319026.jpg', 2, 0, 1670052821, 1670052821),
(568, 757, 5699, 0, '', '../img/new_feed/comment/264449926.jpg', 2, 0, 1670055755, 1670055755),
(569, 816, 5699, 0, '', '../img/new_feed/comment/373318870.jpg', 2, 0, 1670061147, 1670061147),
(570, 816, 5699, 0, 'p', '', 2, 0, 1670061260, 1670061260),
(571, 791, 5699, 0, 'p', '', 2, 0, 1670061289, 1670061289),
(572, 786, 5699, 0, 'p', '', 2, 0, 1670063646, 1670063646),
(573, 786, 5699, 572, '', '../img/new_feed/comment/1804193930.jpg', 2, 0, 1670063660, 1670064039),
(574, 786, 5699, 572, 'c', 'https://chamcong.24hpay.vn/upload/employee/ep5699/app_chamcong1.jpg', 2, 0, 1670064190, 1670064975),
(575, 786, 5699, 572, 'p', '', 2, 0, 1670064295, 1670064295),
(576, 790, 8296, 0, 'fiaulgkjaisfk', '', 2, 0, 1670301259, 1670301259),
(577, 791, 8296, 0, 'Bình luuaajn tes', '', 2, 0, 1670310254, 1670310254),
(578, 786, 8296, 0, 'Thêm bình buận', '', 2, 0, 1670310939, 1670310939),
(579, 823, 8296, 0, '123', '', 2, 0, 1670462493, 1670462493),
(580, 824, 8296, 0, '522', '', 2, 0, 1670463683, 1670463683),
(581, 824, 8296, 0, '9646', '', 2, 0, 1670463687, 1670463687),
(582, 824, 8296, 0, 'd9a6sf6as3f', '', 2, 0, 1670463691, 1670463691),
(583, 851, 5737, 0, 'alo', '', 2, 0, 1671173386, 1671173386),
(584, 0, 5699, 0, 'Tài liệu đính kèm', '', 2, 0, 1671769168, 1671769168),
(585, 0, 5699, 0, 'Tài liệu đính kèm', '', 2, 0, 1671769183, 1671769183),
(586, 0, 5699, 0, 'Tài liệu đính kèm', '', 2, 0, 1671782346, 1671782346),
(587, 0, 5699, 0, 'Tài liệu đính kèm', '../img/new_feed/comment/2109625335.jpg', 2, 0, 1671782569, 1671782569),
(588, 849, 8296, 0, 'fsf', '', 2, 0, 1672127007, 1672127007),
(589, 854, 8296, 0, 'dầuiaogkapsgas', '', 2, 0, 1672137111, 1672137111),
(590, 786, 8296, 0, '', '../img/new_feed/comment/1708411154.png', 2, 0, 1672218849, 1672218849),
(591, 889, 8296, 0, 'dasfasf', '', 2, 0, 1672304478, 1672304478),
(592, 767, 5737, 0, '4', '', 2, 0, 1672623994, 1672623994),
(593, 779, 8296, 0, '4', '', 2, 0, 1672714210, 1672714210),
(594, 936, 5699, 0, 'a', '', 2, 0, 1672827650, 1672827650),
(595, 911, 9798, 0, 's', '', 2, 0, 1672827697, 1672827697),
(596, 942, 5699, 0, 'aa', '', 2, 0, 1672890372, 1672890372),
(597, 911, 5699, 0, 'l', '', 2, 0, 1672911232, 1672911232),
(598, 985, 5713, 0, 'ôi, Hà Giang thật đẹp', '', 2, 0, 1673065925, 1673065925),
(599, 985, 5713, 598, 'hú hú', '', 2, 0, 1673065978, 1673065978),
(600, 993, 5713, 0, 'Sapa thật đẹp', '', 2, 0, 1673077986, 1673077986),
(601, 993, 5713, 0, 'ôi, Sapa, Hà Giang cũng là một thiên đường', '', 2, 0, 1673078010, 1673078010),
(602, 993, 3714, 0, 'đúng rồi, Sapa đẹp ngút ngàn luôn', '', 2, 0, 1673078238, 1673078238),
(603, 995, 3714, 0, 'Nhưng lại không có tiền nhé', '', 2, 0, 1673079257, 1673079257),
(604, 979, 5699, 0, 'aaa', '', 2, 0, 1673079526, 1673079526),
(605, 979, 5699, 604, 'aaaaaa', '', 2, 0, 1673079532, 1673079532),
(606, 995, 5713, 0, 'Dao đó thì làm gì có nhiều tiền đâu b ơi', '', 2, 0, 1673079779, 1673079779),
(607, 995, 3714, 0, 'hehe', '../img/new_feed/comment/1199556624.jpg', 2, 0, 1673079816, 1673079816),
(608, 993, 5713, 0, 'ôi Hà Giang đẹp nhỉ', '', 2, 0, 1673080405, 1673080405),
(609, 889, 8296, 591, 'ans', '', 2, 0, 1672304478, 1672304478),
(610, 995, 3714, 0, 'hôm sau chúng tôi đi sapa', '', 2, 0, 1673085771, 1673085771),
(611, 998, 5699, 0, 'cmt1', '', 2, 0, 1673088015, 1673088015),
(612, 1001, 5699, 0, 'l', '', 2, 0, 1673226979, 1673226979),
(613, 1001, 5699, 0, 'll', '', 2, 0, 1673226990, 1673226990),
(614, 1001, 5699, 613, 'kk', '', 2, 0, 1673227052, 1673227052),
(615, 995, 168, 0, 'hú hú', '', 2, 0, 1673229490, 1673229490),
(616, 995, 168, 0, 'phượt là cuộc sống, yo', '', 2, 0, 1673229499, 1673229499),
(617, 995, 5713, 0, '', '../img/new_feed/comment/1622955460.jpg', 2, 0, 1673231080, 1673231080),
(618, 995, 5713, 0, '', '../img/new_feed/comment/1476405446.jpg', 2, 0, 1673231080, 1673231080),
(619, 1000, 5713, 0, '', '../img/new_feed/comment/83746025.jpg', 2, 0, 1673231578, 1673231578),
(620, 1000, 5713, 0, '', '../img/new_feed/comment/491177362.jpg', 2, 0, 1673231591, 1673231591),
(621, 1000, 5713, 0, '', '../img/new_feed/comment/1018937466.jpg', 2, 0, 1673231607, 1673231607),
(622, 1000, 5713, 0, '', '../img/new_feed/comment/485470804.jpg', 2, 0, 1673231708, 1673231708),
(623, 1000, 5713, 0, 'Nhớ cảm giác được quay quần nấu bánh chưng quá đi', '', 2, 0, 1673234872, 1673234872),
(624, 1014, 5713, 0, 'Hoa cỏ mùa thu, hãy yêu hoa cỏ nhé. Trồng thật nhiều sẽ tốt cho sức khỏe của bạn nha', '', 2, 0, 1673248966, 1673248966),
(625, 1024, 5713, 0, 'Mập đáng yêu nhỉ, nhưng hơi gầy', '', 2, 0, 1673252903, 1673252903),
(626, 1024, 5713, 625, 'Trang và Mập hí hí', '../img/new_feed/comment/1112922493.png', 2, 0, 1673252966, 1673252966),
(627, 1035, 5713, 0, 'Ôi, chè thật ngon đó nha', '', 2, 0, 1673334078, 1673334078),
(628, 1035, 168, 0, 'ngon thế b ơi', '', 2, 0, 1673334192, 1673334192),
(629, 1035, 5713, 0, 'Ôi giá như là có cơ hội được ai đó mới đi ăn chè khúc bạch trước tết ta', '', 2, 0, 1673334817, 1673334817),
(630, 1035, 5713, 628, 'cảm ơn b, nào muốn ăn t mời nhá', '', 2, 0, 1673334840, 1673334840),
(633, 1040, 5699, 0, 'a long long time ago there was a volcano living all alone in the middle of the sea. his lava grrew and grew', '', 2, 1, 1673340181, 1673340181),
(634, 1044, 5713, 0, 'Lèo xinh', '../img/new_feed/comment/1554791397.JPG', 2, 0, 1673340971, 1673340971),
(636, 1046, 5713, 0, 'Em yêu nhà em', '', 2, 0, 1673343691, 1673343691),
(637, 1046, 5713, 0, 'Em yêu nhà em', '', 2, 0, 1673343697, 1673343697),
(638, 1046, 5713, 0, 'Em yêu nhà em, hàng xoan trước ngõ hoa xao xuyến nở, như mây từng chùm, em yêu tiếng chim, đầu hồi lảnh lót mái vàng thơm phức, rạ đầy sân phơi', '', 2, 0, 1673344119, 1673344119),
(639, 1046, 5713, 0, 'Beatbox còn được giới trẻ gọi với cái tên là beatboxing. Từ cái tên này chúng ta có thể hiểu được beatbox chính là cuộc đấu tay đôi bằng âm thanh. Ngoài ra, chúng ta còn có thể hiểu beat là nhịp, box là trống, được dịch ra tiếng việt là nhịp điệu âm thanh được phát từ trống. Beatbox và beatboxing sẽ những thuật ngữ được sử dụng chủ yếu ở hiphop và các nghệ thuật đường phố khác.Về định nghĩa cơ bản, beatbox là một loại hình nghệ thuật biểu diễn mà những người nghệ sĩ - beatboxer thường dùng âm thanh lam được phát ra từ miệng để tạo âm thanh. Các âm thanh được phát ra có tiếng giống âm thanh của người máy, tiếng trống, tiếng chà đĩa,… Các âm thanh mà những người nghệ sĩ này tạo ra chủ yếu lấy từ miệng, lưỡi, môi, họng, mũi. Đối với một beatboxer thực thụ, chỉ cần một chiếc micro, họ đã có thể tạo ra một dàn âm thanh sống động trên sân khấu.', '', 2, 0, 1673344166, 1673344166),
(640, 1046, 5713, 0, 'Kintsugi trong tiếng Nhật được hiểu là dùng vàng để hàn gắn những vết rạn nứt, đổ vỡ. Thuật ngữ này đã xuất hiện từ thế kỷ 15 và dành riêng cho nghề thủ công phục hồi gốm. Dần dần, kintsugi trở thành một kỹ thuật truyền thống mang tính nghệ thuật khi biến những đồ gốm sứ không dùng được trở thành kiệt tác từ vàng và mang nhiều ý nghĩa sâu sắc trong đời sống.Kintsugi là gì?Kintsugi là gì?Từ đó, thủ công mỹ nghệ đã trở thành một nghề quan trọng mang lại cái đẹp cho đời, khiến cuộc sống ý nghĩa hơn. Vào những dịp đặc biệt như lễ hội, dịp Tết, không chỉ người Nhật mà người dân trên thế giới thường mua những món đồ được làm bằng kỹ thuật kintsugi để trang trí trong nhà. Vì thế, việc làm thời vụ vào những dịp này vô cùng nhộn nhịp khi họ tìm kiếm người làm thêm phụ giúp thợ thủ công sản xuất để đủ hàng hoá cung cấp hàng năm.1.2. Nguồn gốc xuất xứ kintsugiChuyện kể rằng, vào thế kỷ 15, tướng quân Nhật Bản Ashikaga Yoshimasa đã làm vỡ một chiếc bát trà mà Trung Quốc yêu quý nhất. Ông đã sai người mang qua Trung Quốc để hàn gắn lại. Thế nhưng, những nét hàn gắn vô cùng lệch lạc, xấu xí khiến ông không hài lòng. Sau đó, ông đã đưa cho một người thợ thủ công Nhật Bản và anh ta đã hàn gắn lại chiếc bát theo phương pháp mới làm cho tướng quân cảm thấy vô cùng thích thú và ưng ý.Người thợ đã dùng vàng để hàn gắn những vết nứt vỡ đó để tạo nên một tác phẩm nghệ thuật. Mặc dù chiếc bát không giữ được hình ảnh như ban đầu nhưng ánh sáng phát ra từ vàng đã làm cho nó trở nên sang trọng hơn, thu hút ánh nhìn và có tính thẩm mỹ hơn những chiếc bát trước đây.Người thợ thủ công tỉ mỉ ghép lại mảnh vỡNgười thợ thủ công tỉ mỉ ghép lại mảnh vỡVề sau, người ta không chỉ dùng vàng mà còn sử dụng một số kim loại quý tương tự như bạc, kim cương, bạch kim, v.v… để ráp lại những mảnh vỡ gốm sứ. Như vậy, giá trị của bát vỡ không bị giảm đi mà còn được bồi đắp thêm bởi những kim loại đắt tiền.Không những mang vẻ đẹp của một món đồ gốm được tái tạo vẻ đẹp, kintsugi còn được các nhà triết học suy luận như cuộc sống con người. Chúng là sẽ có nhiều mảnh vỡ cuộc đời, không một ai hoàn hảo và cần đi tìm những nét đẹp trong sự thiếu hoàn hảo đó để toả sáng như những chiếc bát vỡ đã được ghép lại bằng vàng kia.1.3. Các phương pháp thực hiện kintsugi1.3.1. Phương pháp phục hồiPhương pháp phục hồi trong kintsugi là dùng các hỗn hợp có thành phần chính là vàng bôi vào các hết bị nứt trên chén hoặc bát hoặc đồ gốm sứ. Phương pháp này chỉ nên áp dụng với những trường hợp bị nứt nhẹ hoặc ít vết nứt thì sẽ đẹp hơn. Nếu bị mẻ vỡ hoặc thất lạc các mảnh bát thì có thể chuyển qua các phương pháp phía sau.1.3.2. Phương pháp thay thếKhi món đồ gốm bị mất đi một miếng ghép thì các nghệ nhân sẽ dùng nhựa vàng để gắn vào và tạo hình thành miếng ghép thiếu đó. Phương pháp này sẽ hơi tốn nguyên liệu nên người ta áp dụng dùng nhựa vàng để đỡ tốn chi phí hơn.Phương pháp thay thế mảnh vỡPhương pháp thay thế mảnh vỡ1.3.3. Phương pháp ghép laiPhương pháp cuối cùng chính là ghép lai tức là người ta sẽ sử dụng một mảnh ghép khác có chất liệu tương đồng nhưng màu sắc và hoạ tiết hoa văn khác nhau. Có lẽ đây là phương pháp khó nhất trong ba phương pháp. Bởi vì, người thợ cần có tính tỉ mỉ trong việc lựa chọn một mảnh ghép phù hợp nhất, có vài nét tương đồng với hình thù trên bộ đồ gốm ban đầu. Khi ghép xong, chúng ta sẽ có một tác phẩm độc lạ và mang màu sắc nghệ thuật đáng quý.2. Những câu chuyện ý nghĩa từ kintsugiNhư đã nói, kintsugi không chỉ là ghép lại những mảnh vỡ gốm sứ mà còn mang ý nghĩa được áp dụng trong cuộc sống thực tại. Người Nhật đã vận dụng rất tốt những ý nghĩa đó để có được lối sống văn minh, lành mạnh như ngày nay. Sau đây là một số bài học rút ra từ kintsugi.2.1. Trân quý tất cả những gì không hoàn hảoCuộc sống của chúng ta hay tất cả mọi người đều không hoàn hảo. Nhưng chúng ta đã ghép lại với nhau thành một hệ sinh thái tuyệt vời đang ngày càng phát triển. Vì thế, đừng bao giờ mặc cảm về những thiếu sót của bản thân. Hãy trân trọng những thiếu sót đó của mình và của người khác và luôn tìm kiếm những điều tốt đẹp đằng sau những thiếu sót đó.Trân quý những gì không hoàn hảoTrân quý những gì không hoàn hảoChúng ta không nên phán xét người khác, cùng không nên so sánh bản thân với người khác rồi tự trách, tự ti hay sân si, đố kỵ mà nên học cách tha thứ, học cách chấp nhận, buông bỏ, quý trọng người khác. Đồng thời, những thứ đơn giản thì càng nên trân trọng, không ham hư vinh, phù phiếm, biết kiềm chế và buông bỏ việc mua sắm không cần thiết.2.2. Không nên che giấu những tổn thương trong lòngKintsugi đã phơi bày những vết sứt mẻ được chắp vá cho mọi người thấy. Nhưng mọi người vẫn đồng cảm và yêu thương chúng dù không còn là hình ảnh ban đầu. Đối với bản thân chúng ta cũng vậy, không nên che giấu những vết thương tinh thần mà hãy sẻ chia để thấy nhẹ lòng hơn và mọi người sẽ giúp bạn chữa lành vết thương đó. Nếu tích tụ những tổn thương trong lòng quá lâu sẽ sinh bệnh và khiến bạn không còn tìm được niềm vui trong cuộc sống nữa. Hãy coi những vết sẹo cuộc đời là những trải nghiệm mà bạn từng đi qua và lấy đó làm động lực vươn xa, vươn cao hơn nhé.2.3. Hãy xem những khó khăn là cơ hội để bắt đầuCuộc sống là một chuỗi các sự kiện bất ngờ, có niềm vui, có nỗi buồn, có thuận lợi và cũng có khó khăn. Chắc chắn ai cũng sẽ gặp khó khăn trong cuộc sống tương tự như những chiếc bát vỡ kia. Nhưng nếu bạn biết cách biến đổi chúng thì chúng ta được đứng trên đỉnh vinh quang.Nhật Bản vẫn phát triển sầm uất sau nhiều năm bị thiên taiNhật Bản vẫn phát triển sầm uất sau nhiều năm bị thiên taiCó lẽ đây là một trong những cách người Nhật sống cùng với thiên tai suốt bao năm qua. Họ chống chọi với tàn khốc của thiên nhiên bằng cách tìm kiếm cơ hội sống, cơ hội vươn lên từ những khó khăn mà thiên tai gây ra.2.4. Duy trì một chế độ sống cân bằng, lành mạnhNghệ thuật kintsugi được hiểu là tìm kiếm những mảnh ghép để hồi phục lại sự cân bằng vốn có. Điều này có nghĩa là khuyên chúng ta nên sống lành mạnh, ăn uống điều độ, tập luyện hằng ngày và luôn học hỏi những điều xung quanh để cuộc sống ngày một tốt hơn. Nếu áp dụng tốt những điều này thì bạn có thể làm mọi việc thuận lợi hơn, đạt được những gì bạn muốn.2.5. Luôn chia sẻ, kết nối với mọi người xung quanhKhi những mảnh ghép gốm sứ được nghệ nhân sử dụng kỹ thuật kintsugi để hàn gắn thì chúng tạo thành một khối nghệ thuật. Đơn giản là chúng đã kết hợp với nhau để trở nên đẹp đẽ hơn, thể hiện sức mạnh đoàn kết. Cuộc sống thường ngày cũng vậy, bạn cần kết nối và giúp đỡ những người xung quanh, cho đi rồi sẽ nhận lại và mỗi ngày một ý nghĩa hơn khi thức dậy để lao động, kết nối, sẻ chia.Luôn sống lành mạnh và kết nối với mọi người xung quanhLuôn sống lành mạnh và kết nối với mọi người xung quanhTóm lại, kintsugi là một nghệ thuật hàn gắn bằng vàng vô cùng nghệ thuật và mang nhiều ý nghĩa sâu xa theo truyền thống của người Nhật. Với những nội dung chi tiết ở trên, timviec365.vn tin rằng bạn đã hiểu cặn kẽ kintsugi là gì. Hy vọng bạn đón nhận những ý nghĩa của kintsugi và áp dụng nó đối với cuộc sống của chính mình để bản thân ngày một tốt hơn nhé.', '', 2, 0, 1673344238, 1673344238),
(641, 1046, 5713, 640, 'heyy heyy', '../img/new_feed/comment/144987089.jpg', 2, 1, 1673344470, 1673344470),
(643, 1046, 3714, 0, 'nay giờ phút chia tay, gửi lời chào tiến bước', '', 2, 0, 1673345149, 1673345149),
(644, 1046, 3714, 0, 'chào bảng đen cửa sổ, chào chỗ ngồi thân quen, tất cả chào ở lại, đón các bạn nhỏ lên', '', 2, 0, 1673345176, 1673345176),
(645, 1049, 5713, 0, 'Đúng vậy', '../img/new_feed/comment/656534981.jpg', 2, 0, 1673399341, 1673399341),
(646, 1047, 5713, 0, 'nhà đẹp quá', '', 2, 0, 1673400485, 1673400485),
(648, 1048, 3714, 0, 'Muốn về quê quá. Hà Nội xô bồ mệt mỏi hình như không còn là nơi phù hợp vào những ngày cận Tết như thế này', '', 2, 0, 1673400650, 1673400650),
(656, 1061, 5713, 0, 'Nhớ lại những ngày tháng đi học quá đi', '', 2, 0, 1673406423, 1673406423),
(657, 1061, 5713, 0, 'Nhớ lại những ngày tháng đi học quá đi', '', 2, 0, 1673406424, 1673406424),
(658, 1061, 5713, 0, 'Nhớ Hà Nội quá', '', 2, 0, 1673406439, 1673406439),
(661, 1042, 5699, 0, 'KO\r\nOK\r\nOO\r\n\r\nKK', '', 2, 0, 1673408909, 1673410533),
(662, 1062, 5713, 0, 'hú hú', '../img/new_feed/comment/95119268.jpg', 2, 0, 1673409370, 1673409370),
(663, 1062, 5713, 662, ':v', '../img/new_feed/comment/849026025.jpg', 2, 0, 1673409412, 1673409412),
(664, 1062, 5713, 662, ':v', '../img/new_feed/comment/1433692385.jpg', 2, 0, 1673409412, 1673409412),
(665, 1042, 5699, 661, 'KO!!!\r\nKO!!\r\nKO!\r\nKO|', '../img/new_feed/comment/1339076041.jpg', 2, 0, 1673410582, 1673423197),
(666, 1068, 5713, 0, 'Tại sao lại nhiều hoa oải hương thế nhỉ?hú hú', '', 2, 0, 1673423184, 1673423184),
(667, 1068, 5713, 0, 'hú hú', '', 2, 0, 1673423189, 1673423189),
(668, 1068, 5713, 0, 'truyền thông nội bộ.....', '', 2, 0, 1673423226, 1673423226),
(669, 1068, 5713, 0, 'truyền thông nội bộ.....', '', 2, 0, 1673423227, 1673423227),
(670, 1068, 5713, 0, 'truyền thông nội bộ.....', '', 2, 0, 1673423227, 1673423227),
(671, 1068, 5713, 0, 'truyền thông nội bộ.....', '', 2, 0, 1673423240, 1673423240),
(672, 1068, 5713, 0, 'testttt....', '', 2, 0, 1673423278, 1673423278),
(673, 995, 5713, 0, 'Hôm sau chúng tôi đi Sapa, phong cảnh ở đây thật đẹp.', '', 2, 0, 1673424280, 1673424280),
(674, 1079, 5699, 0, 'aaa', '', 2, 0, 1673428246, 1673428246),
(675, 1079, 5699, 0, 'aaa', '', 2, 0, 1673428268, 1673428268),
(676, 1079, 5699, 0, 'aaa', '', 2, 0, 1673428292, 1673428292),
(677, 1079, 5699, 0, 'aaa', '', 2, 0, 1673428306, 1673428306),
(678, 1079, 5699, 0, 'hh', '', 2, 0, 1673428422, 1673428422),
(679, 1079, 5699, 0, 'klll', '', 2, 0, 1673428627, 1673428627),
(680, 1079, 5699, 0, 's', '', 2, 0, 1673428719, 1673428719),
(681, 1079, 8296, 0, 'má', '', 2, 0, 1673429156, 1673429156),
(682, 979, 8296, 604, 'trả lời đây', '', 2, 0, 1673433486, 1673433486),
(683, 722, 5699, 0, 'abc', '', 2, 0, 1673514523, 1673514523);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_album`
--

CREATE TABLE `comment_album` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `hidden` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment_album`
--

INSERT INTO `comment_album` (`id`, `album_id`, `user_id`, `user_type`, `id_parent`, `content`, `image`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 4, 5699, 2, 0, 'Tài liệu đính kèmmo', '../img/new_feed/comment/2038384719.jpg', 0, 1671784073, 1671806978),
(2, 4, 5699, 2, 0, 'khuyến mãi', '', 0, 1671788444, 1671788444),
(3, 4, 5699, 2, 0, 'danh sách hàng hóa khuyến mãiii', '../img/new_feed/comment/1420026208.jpg', 0, 1671788506, 1671806658),
(4, 4, 5699, 2, 0, 'mòe', '', 0, 1671789933, 1671789933),
(5, 4, 5699, 2, 0, 'nhầm hoa lá cành chứ ko p mòeee', '', 0, 1671790062, 1671806632),
(6, 4, 5699, 2, 0, 'nhầm hoa lá cành chứ ko p mòeo', '', 0, 1671792244, 1671806639),
(7, 7, 5699, 2, 0, 'bánh trôi ngon ngon mlem mlem', '', 0, 1671797054, 1671797482),
(8, 7, 5699, 2, 0, 'bánh trôi 8 múii', '', 0, 1671847039, 1672026484),
(10, 7, 5699, 2, 8, 'id_parent', '', 0, 1671872066, 1671872066),
(11, 7, 5699, 2, 8, 'husky 8 múii', '', 0, 1671878524, 1671878524),
(12, 7, 5699, 2, 8, 'a', '', 0, 1671878658, 1671878658),
(13, 7, 5699, 2, 8, 'aa', '', 0, 1672022667, 1672022667),
(17, 7, 5699, 2, 8, 'aaaaapppoopp', '../img/album/comment/447403666.jpg', 1, 1672026402, 1672027497),
(18, 0, 12438, 2, 0, 'bình luận sẽ lỗi', '', 0, 1672903226, 1672903226),
(19, 0, 12438, 2, 0, 'bình luận sẽ lỗi', '', 0, 1672903274, 1672903274),
(20, 0, 12438, 2, 0, 'o', '', 0, 1672903283, 1672903283),
(21, 0, 12438, 2, 0, 'p', '', 0, 1672904119, 1672904119),
(22, 0, 12438, 2, 0, 'p', '', 0, 1672904175, 1672904175),
(23, 0, 12438, 2, 0, 'p', '', 0, 1672904206, 1672904206),
(24, 7, 12438, 2, 0, 'p', '', 0, 1672904270, 1672904270),
(25, 18, 9798, 2, 0, 'a', '', 0, 1673431484, 1673431484),
(26, 18, 5699, 2, 0, 'lll', '', 0, 1673512629, 1673512629),
(27, 18, 9798, 2, 26, 'oo', '', 0, 1673512644, 1673512644),
(28, 18, 9798, 2, 26, 'oo', '', 0, 1673512653, 1673512653),
(29, 18, 9798, 2, 26, 'oo', '', 0, 1673512689, 1673512689),
(30, 18, 5699, 2, 0, 'kh', '', 0, 1673574408, 1673574408),
(31, 18, 5699, 2, 0, 'kh\r\nhk\r\nhh\r\nkk', '', 0, 1673574421, 1673574421),
(32, 18, 5699, 2, 0, 'o\r\nf\r\ng\r\nh\r\nl', '', 0, 1673574710, 1673574795),
(33, 18, 5699, 2, 31, 'h\r\nk\r\nj\r\nl\r\no', '', 0, 1673576450, 1673576751),
(34, 18, 5699, 2, 31, 'k\r\nk\r\nh\r\np', '', 0, 1673576763, 1673576772);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_core_value`
--

CREATE TABLE `comment_core_value` (
  `id` int(11) NOT NULL,
  `id_core` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `comment_core_value`
--

INSERT INTO `comment_core_value` (`id`, `id_core`, `id_user`, `id_parent`, `content`, `image`, `user_type`, `created_at`, `updated_at`) VALUES
(2, 16, 2498, 0, 'vuong2', '', '1', 1634262797, 1634262797),
(3, 16, 2498, 2, 'sdsa', '', '1', 1634263852, 1634263852),
(4, 16, 2498, 2, 'sadsadas', '', '1', 1634264420, 1634264420),
(5, 16, 2498, 2, 'a', '', '1', 1634264500, 1634264500),
(6, 16, 2498, 2, 'ád', '', '1', 1634264535, 1634264535),
(7, 16, 2498, 2, '1', '', '1', 1634264871, 1634264871),
(8, 16, 2498, 2, '2', '', '1', 1634264894, 1634264894),
(9, 16, 2498, 2, 'd', '', '1', 1634265467, 1634265467),
(10, 16, 2498, 2, 'd', '', '1', 1634265479, 1634265479),
(11, 16, 2498, 2, 'd', '', '1', 1634265554, 1634265554),
(12, 16, 2498, 2, 'q', '', '1', 1634265673, 1634265673),
(13, 16, 2498, 2, 'q', '', '1', 1634265697, 1634265697),
(14, 16, 2498, 2, '1', '', '1', 1634265784, 1634265784),
(15, 16, 2498, 2, 'a', '', '1', 1634266229, 1634266229),
(16, 16, 2498, 0, 'aaa', '', '1', 1634266244, 1634266244),
(17, 16, 2498, 0, 'a', '', '1', 1634266248, 1634266248),
(18, 16, 2498, 0, '1', '', '1', 1634266249, 1634266249),
(19, 16, 2498, 18, 'qqq', '', '1', 1634267750, 1634267750),
(20, 16, 2498, 0, 'a', '', '1', 1634267986, 1634267986),
(21, 16, 2498, 0, '11', '', '1', 1634268644, 1634268644),
(22, 16, 2498, 0, 'qq', '', '1', 1634268682, 1634268682),
(23, 16, 2498, 0, '22', '', '1', 1634268713, 1634268713),
(24, 16, 2498, 0, 'qw', '', '1', 1634268726, 1634268726),
(25, 16, 2498, 0, 'sss', '', '1', 1634268751, 1634268751),
(26, 16, 2498, 0, 'đ', '', '1', 1634268853, 1634268853),
(27, 16, 2498, 0, 'ss', '', '1', 1634268880, 1634268880),
(28, 16, 2498, 27, 'd', '', '1', 1634269066, 1634269066),
(29, 16, 2498, 0, 'cc', '', '1', 1634269474, 1634269474),
(31, 16, 2498, 0, 'dddd', '', '1', 1634269558, 1634269558),
(32, 16, 2498, 31, '1111', '', '1', 1634269569, 1634269569),
(33, 16, 2498, 0, 'c', '', '1', 1634269655, 1634269655),
(34, 16, 2498, 0, 'qw', '', '1', 1634269685, 1634269685),
(35, 16, 2498, 0, 'ss', '', '1', 1634270105, 1634270105),
(36, 16, 2498, 0, 'gg', '', '1', 1634270135, 1634270135),
(37, 18, 2498, 0, 'aaaa', '', '1', 1634286253, 1634286253),
(38, 18, 2498, 0, 'aaaa', '', '1', 1634286254, 1634286254),
(40, 18, 2498, 0, 'aaaa', '', '1', 1634286255, 1634286255),
(41, 18, 2498, 0, 'aaaa', '', '1', 1634286255, 1634286255),
(42, 19, 2498, 0, 'sdas', '', '1', 1634346807, 1634346807),
(43, 18, 2498, 0, 'asd', '', '1', 1635307019, 1635307019),
(44, 18, 2498, 0, 'adssd', '', '1', 1635307198, 1635307198),
(45, 18, 2498, 0, 'asas', '', '1', 1635307221, 1635307221),
(46, 19, 2498, 0, 'sds', '', '1', 1635307271, 1635307271),
(47, 19, 2498, 0, 'asds11', '', '1', 1635307357, 1635307357),
(48, 19, 2498, 47, 'ads', '', '1', 1635307366, 1635307366),
(49, 19, 2498, 47, 'ads', '', '1', 1635307420, 1635307420),
(50, 18, 2498, 45, 'asdasd', '', '1', 1635307961, 1635307961),
(51, 18, 2498, 45, 'asddasd', '', '1', 1635307981, 1635307981),
(52, 19, 2498, 47, 'asdasd', '', '1', 1635307997, 1635307997),
(53, 19, 2498, 47, 'adsd', '', '1', 1635308036, 1635308036),
(54, 19, 2498, 47, 'sad', '', '1', 1635308038, 1635308038),
(55, 19, 2498, 47, 'sds', '', '1', 1635308059, 1635308059),
(56, 19, 2498, 47, 'sadas', '', '1', 1635308143, 1635308143),
(57, 19, 2498, 0, 'dasd', '', '1', 1635308630, 1635308630),
(58, 19, 2498, 57, 'asd', '', '1', 1635308634, 1635308634),
(59, 19, 2498, 0, 'asd', '', '1', 1635308909, 1635308909),
(60, 19, 2498, 0, 'asdsad', '../img/vanhoadoanhnghiep/core_value/comment/103513467.png', '1', 1635497209, 1635497209),
(61, 19, 2498, 0, 'asdsad', '../img/vanhoadoanhnghiep/core_value/comment/1224086607.png', '1', 1635497215, 1635497215),
(63, 19, 2498, 0, 'sadas', '../img/vanhoadoanhnghiep/core_value/comment/655931481.png', '1', 1635497430, 1635497430),
(64, 36, 2498, 36, 'asdsadas', '../img/vanhoadoanhnghiep/core_value/comment/461733740.png', '1', 1635498206, 1635498206),
(65, 19, 2498, 63, 'dddadas111sddd', '', '1', 1635498463, 1635498655),
(66, 19, 2498, 0, 'asdas', '', '1', 1635498732, 1635498732),
(67, 19, 2498, 63, 'asdasd', '', '1', 1635498742, 1635498742),
(68, 63, 2498, 63, 'adsa', '', '1', 1635498749, 1635498749),
(69, 63, 2498, 63, 'assdas', '', '1', 1635498755, 1635498755),
(70, 19, 2498, 0, 'sadasd', '', '1', 1635498855, 1635498855),
(71, 19, 2498, 0, 'asdsad', '', '1', 1635498944, 1635498944),
(72, 19, 2498, 0, 'adas', '', '1', 1635499011, 1635499011),
(73, 19, 2498, 72, 'adsa', '', '1', 1635499015, 1635499015),
(74, 9, 1761, 0, 'adjcxhkcndskjnjsmckl', '', '1', 1635913909, 1635913920),
(75, 21, 1664, 0, 'cool, men', '', '1', 1638436030, 1638436030);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_knowledge`
--

CREATE TABLE `comment_knowledge` (
  `id` int(11) NOT NULL,
  `knowledge_answer_id` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `content` text,
  `user_type` tinyint(4) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `created_at` int(12) DEFAULT NULL,
  `updated_at` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `comment_knowledge`
--

INSERT INTO `comment_knowledge` (`id`, `knowledge_answer_id`, `id_user`, `content`, `user_type`, `id_parent`, `created_at`, `updated_at`) VALUES
(77, 12, 1761, 'sdsa', 1, 0, 1631934646, 1631934646),
(78, 77, 1761, 'đádsd', 1, 89, 1631934833, NULL),
(79, 12, 1761, 'eq', 1, 0, 1631936224, 1631936224),
(80, 12, 1761, '111', 1, 0, 1631936463, 1631936463),
(81, 12, 1761, '111', 1, 0, 1631936565, 1631936565),
(82, 12, 1761, 'qq', 1, 0, 1631936573, 1631936573),
(83, 12, 1761, 'qq', 1, 0, 1631936575, 1631936575),
(84, 12, 1761, '11', 1, 0, 1631936593, 1631936593),
(85, 12, 1761, '22', 1, 0, 1631936792, 1631936792),
(86, 12, 1761, '33', 1, 0, 1631936795, 1631936795),
(87, 12, 1761, '44', 1, 0, 1631936796, 1631936796),
(88, 12, 1761, 'ưqe', 1, 0, 1631936813, 1631936813),
(89, 12, 1761, 'ưeqw', 1, 0, 1631936877, 1631936877),
(90, 89, 1761, 'dá', 1, 89, 1631937280, NULL),
(91, 89, 1761, 'dá', 1, 89, 1631937750, NULL),
(92, 89, 1761, '11', 1, 89, 1631937843, NULL),
(93, 89, 1761, '22', 1, 89, 1631937858, NULL),
(94, 89, 1761, '22', 1, 89, 1631937863, NULL),
(95, 12, 1761, 'dsd', 1, 0, 1631937874, 1631937874),
(96, 12, 1761, 'qư', 1, 0, 1631937906, 1631937906),
(97, 7, 1761, 'dsa', 1, 0, 1631937928, 1631937928),
(98, 7, 1761, 'qưe', 1, 0, 1631937935, 1631937935),
(99, 7, 1761, 'ds', 1, 0, 1631938362, 1631938362),
(100, 99, 1761, 'sadas', 1, 99, 1631938365, NULL),
(101, 11, 1761, 'dasdas', 1, 0, 1633745784, 1633745784),
(102, 11, 1761, 'dasdas', 1, 0, 1633745784, 1633745784),
(103, 102, 1761, 'dsdsa', 1, 102, 1633745794, NULL),
(104, 11, 1761, 'sd', 1, 0, 1634088366, 1634088366),
(105, 13, 1636, 'ỏ, hôm nay trời đẹp quá nhỉ', 1, 0, 1634635797, 1634635797),
(106, 15, 1636, 'rtyuu', 1, 0, 1634699911, 1634699911),
(107, 106, 1636, 'fghjjj', 1, 106, 1634699925, NULL),
(108, 16, 2498, 'dasasd', 1, 0, 1635475208, 1635475208),
(109, 27, 2498, 'sadasdfffff222', 1, 0, 1635478304, 1635478304),
(110, 27, 2498, 'dasddddd111', 1, 0, 1635478308, 1635478308),
(112, 111, 2498, 'asds', 1, 111, 1635478885, NULL),
(113, 111, 2498, 'asdasd', 1, 111, 1635479671, NULL),
(114, 110, 2498, 'asdas111f3333444555dddasd', 1, 110, 1635480686, NULL),
(115, 27, 2498, 'asd1111', 1, 0, 1635481858, 1635481858),
(117, 27, 2498, 'dsddd', 1, 0, 1635503492, 1635503492),
(118, 117, 2498, 'sdsad', 1, 117, 1635503716, NULL),
(119, 27, 2498, 'dsda', 1, 0, 1635503783, 1635503783),
(120, 119, 2498, 'dsddd', 1, 119, 1635503787, NULL),
(121, 27, 2498, 'sdas', 1, 0, 1635503985, 1635503985),
(122, 30, 1761, 'ạn nghĩ sao', 1, 0, 1635905036, 1635905036),
(123, 122, 1761, 'qưewg', 1, 122, 1635905252, NULL),
(124, 29, 1761, 'uê', 1, 0, 1635905352, 1635905352),
(125, 33, 1664, 'yeeeh thông minh cực, hí hí', 1, 0, 1636709326, 1636709326),
(126, 125, 1664, 'đúng r', 1, 125, 1636716949, NULL),
(127, 125, 1664, 'đúng r', 1, 125, 1636716949, NULL),
(128, 33, 1664, 'có đúng vậy ko nhỉ', 1, 0, 1636716978, 1636716978),
(129, 33, 1664, 'hí hí', 1, 0, 1636716986, 1636716986),
(130, 33, 1664, 'hú hú', 1, 0, 1636717004, 1636717004),
(131, 35, 2840, 'sd', 1, 0, 1640166798, 1640166798);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_target`
--

CREATE TABLE `comment_target` (
  `id` int(10) NOT NULL,
  `id_target` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `comment_target`
--

INSERT INTO `comment_target` (`id`, `id_target`, `id_user`, `id_parent`, `content`, `image`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 3, 1761, 0, 'qưeqweqwe', '', 1, 1633572504, 1633572504),
(2, 3, 1761, 0, 'ádasdasd', '', 1, 1633572602, 1633572602),
(3, 3, 1761, 0, 'ádadsad adasdad', '', 1, 1633572745, 1633576379),
(4, 3, 1761, 0, 'đâsdasd', '', 1, 1633572862, 1633572862),
(5, 3, 1761, 0, 'sadasdasd', '', 1, 1633572880, 1633572880),
(6, 3, 1761, 0, 'asdasd', '', 1, 1633572923, 1635500970),
(7, 3, 1761, 0, 'ádadsad dâsd', '', 1, 1633575766, 1633576505),
(8, 3, 1761, 0, 'ádasdasd ádasdasdádasd', '', 1, 1633576735, 1633577102),
(9, 3, 1761, 6, '', '../img/vanhoadoanhnghiep/target/comment/22859.png', 1, 1633578805, 1633594313),
(10, 3, 1761, 6, 'ádasdasd', '../img/vanhoadoanhnghiep/target/comment/21516.png', 1, 1633578854, 1633578854),
(11, 3, 1761, 6, '', '../img/vanhoadoanhnghiep/target/comment/14446.png', 1, 1633592996, 1633592996),
(12, 3, 1761, 6, 'ádasdasd ewrerwer', '../img/vanhoadoanhnghiep/target/comment/9923.png', 1, 1633593093, 1633594329),
(13, 3, 1761, 8, '', '../img/vanhoadoanhnghiep/target/comment/6934.png', 1, 1633593294, 1633593829),
(14, 3, 1761, 8, 'ádasdasdasd qưdqweqwe', '../img/vanhoadoanhnghiep/target/comment/16465.png', 1, 1633593355, 1633594547),
(15, 0, 1761, 8, 'ádasdasd', '', 1, 1633593893, 1633593893),
(16, 0, 1761, 8, 'ấdasdasd', '', 1, 1633593944, 1633593944),
(17, 0, 1761, 8, 'eqweqwe', '../img/vanhoadoanhnghiep/target/comment/27844.png', 1, 1633594028, 1633594076),
(18, 0, 1761, 6, '', '../img/vanhoadoanhnghiep/target/comment/14328.jpg', 1, 1633594172, 1633594201),
(19, 0, 1761, 6, 'ádasdasd', '', 1, 1633594398, 1633594398),
(20, 0, 1761, 8, 'ádasd', '../img/vanhoadoanhnghiep/target/comment/26111.png', 1, 1633599040, 1633599052),
(21, 0, 1761, 8, 'ádasdasd adsadas', '../img/vanhoadoanhnghiep/target/comment/12421.png', 1, 1633599053, 1633599314),
(22, 0, 1761, 7, 'qưeqweqwe', '', 1, 1633599431, 1633599622),
(23, 0, 1761, 7, 'qưeqweqwe', '../img/vanhoadoanhnghiep/target/comment/11694.png', 1, 1633599651, 1633599651),
(24, 0, 1761, 7, 'ádasd', '../img/vanhoadoanhnghiep/target/comment/12615.png', 1, 1633599673, 1633599682),
(25, 0, 1761, 7, '', '../img/vanhoadoanhnghiep/target/comment/24158.png', 1, 1633599684, 1633599684),
(26, 1, 1761, 0, 'ádasdasd', '', 1, 1633599716, 1633599873),
(27, 0, 1761, 26, 'ádasdasd adsdasd', '', 1, 1633599879, 1633599894),
(28, 4, 2498, 0, 'đasa', '', 1, 1634261463, 1634261463),
(29, 4, 2498, 0, 'adsad', '', 1, 1634261645, 1634261645),
(30, 5, 2498, 0, 'asd', '', 1, 1634281746, 1634281746),
(31, 6, 2498, 0, 'qqq', '', 1, 1634285896, 1634285896),
(32, 6, 2498, 0, '1111', '', 1, 1634286081, 1634286081),
(33, 6, 2498, 0, 'sdsd', '../img/vanhoadoanhnghiep/target/comment/1732905300.png', 1, 1634286094, 1634286094),
(34, 6, 2498, 0, 'dasdsa', '', 1, 1634286102, 1634286102),
(35, 7, 2498, 0, 'dsa', '', 1, 1634346998, 1634346998),
(36, 7, 2498, 0, 'd', '', 1, 1634347003, 1634347003),
(37, 6, 2498, 0, 'sd', '', 1, 1635499033, 1635499033),
(38, 6, 2498, 0, 'asdasd', '../img/vanhoadoanhnghiep/target/comment/129938891.png', 1, 1635500483, 1635500483),
(39, 6, 2498, 0, 'asdasdqqqddddqqqq', '', 1, 1635500516, 1635502186),
(40, 0, 2498, 39, 'sdas', '', 1, 1635501301, 1635501301),
(41, 0, 2498, 39, 'dasd', '../img/vanhoadoanhnghiep/target/comment/1820202470.png', 1, 1635501372, 1635501372),
(42, 0, 2498, 39, 'adasda', '', 1, 1635501495, 1635501495),
(43, 0, 2498, 39, 'sdsad', '', 1, 1635501502, 1635501502),
(44, 0, 2498, 39, 'dasd', '', 1, 1635501527, 1635501527),
(45, 0, 2498, 39, 'dasd', '', 1, 1635501530, 1635501530),
(46, 6, 2498, 0, 'sadasdasdsadddd', '../img/vanhoadoanhnghiep/target/comment/411357177.png', 1, 1635502200, 1635502236),
(49, 0, 2498, 46, 'sdasddddfffffffrrrrdddvfffffff', '', 1, 1635502868, 1635503423);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_working_rules`
--

CREATE TABLE `comment_working_rules` (
  `id` int(12) NOT NULL,
  `id_working_rules` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_parent` int(10) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_type` int(10) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `comment_working_rules`
--

INSERT INTO `comment_working_rules` (`id`, `id_working_rules`, `id_user`, `id_parent`, `content`, `image`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 12, 2498, 0, 'aaaa', '', 1, 1634289873, 1634289873),
(2, 12, 2498, 0, 'ssss', '../img/vanhoadoanhnghiep/nguyen_tac/comment/1848248954.png', 1, 1634289916, 1634289916),
(3, 13, 4074, 0, 'dsdsad', '', 2, 1634377711, 1634377711),
(4, 13, 2498, 0, 'asdas', '', 1, 1634378356, 1634378356),
(5, 13, 2498, 0, 'dasd', '', 1, 1635308663, 1635308663),
(6, 13, 2498, 0, 'asdsa', '', 1, 1635308867, 1635308867),
(7, 18, 2498, 0, 'dsaddd', '', 1, 1635469352, 1635469352),
(8, 18, 2498, 0, 'sdsad', '', 1, 1635470203, 1635470203),
(9, 18, 2498, 0, 'ádasád', '', 1, 1635470254, 1635470254),
(10, 18, 2498, 0, 'asdsad', '', 1, 1635470338, 1635470338),
(11, 18, 2498, 0, 'sadsa', '', 1, 1635470353, 1635470353),
(12, 13, 2498, 0, 'asd', '', 1, 1635470371, 1635470371),
(13, 18, 2498, 0, 'sad', '', 1, 1635470399, 1635470399),
(14, 18, 2498, 0, 'asd', '', 1, 1635470410, 1635470410),
(15, 18, 2498, 0, '1111', '', 1, 1635470466, 1635470466),
(16, 15, 2498, 15, 'asds', '', 1, 1635470478, 1635470478),
(17, 18, 2498, 0, 'asd', '', 1, 1635470489, 1635470489),
(18, 17, 2498, 17, 'sadsads', '', 1, 1635470708, 1635491105),
(19, 18, 2498, 0, 'qqqq', '', 1, 1635470792, 1635470792),
(20, 18, 2498, 19, 'asd', '', 1, 1635470799, 1635470799),
(21, 18, 2498, 0, 'asd', '', 1, 1635471166, 1635471166),
(22, 18, 2498, 0, 'asd', '', 1, 1635471247, 1635471247),
(23, 18, 2498, 0, 'das1122244443332223', '', 1, 1635471323, 1635472267),
(24, 18, 2498, 23, 'asd', '', 1, 1635471342, 1635471342),
(25, 22, 2498, 22, 'sda', '', 1, 1635471391, 1635471391),
(26, 23, 2498, 23, 'sdsa', '', 1, 1635471402, 1635471402),
(27, 23, 2498, 0, 'asd', '', 1, 1635471838, 1635471838),
(28, 23, 2498, 0, 'asd', '', 1, 1635471845, 1635471845),
(29, 23, 2498, 0, '111', '', 1, 1635471851, 1635471851),
(30, 18, 2498, 0, 'asd', '', 1, 1635472270, 1635472270),
(31, 18, 2498, 0, 'qqq', '', 1, 1635472279, 1635472279),
(32, 18, 2498, 0, 'qqqqq', '', 1, 1635472291, 1635472291),
(33, 18, 2498, 0, 'eewe', '', 1, 1635472294, 1635472294),
(34, 18, 2498, 0, 'eeee', '', 1, 1635472313, 1635472313),
(35, 18, 2498, 0, '111', '', 1, 1635472342, 1635472342),
(36, 18, 2498, 0, 'asdasd', '', 1, 1635472378, 1635472378),
(37, 18, 2498, 0, 'asd', '', 1, 1635472448, 1635472448),
(38, 18, 2498, 0, 'asd', '', 1, 1635472484, 1635472484),
(39, 18, 2498, 0, '1111', '', 1, 1635472524, 1635472524),
(40, 18, 2498, 0, 'asdsa', '', 1, 1635472559, 1635472559),
(41, 18, 2498, 0, 'sddsad', '', 1, 1635472583, 1635472583),
(42, 18, 2498, 0, '1111', '', 1, 1635472620, 1635472620),
(43, 18, 2498, 0, 'sdas', '', 1, 1635472643, 1635472643),
(44, 18, 2498, 0, '2222', '', 1, 1635472648, 1635472648),
(45, 18, 2498, 0, 'qww', '', 1, 1635472671, 1635472671),
(46, 18, 2498, 0, 'asdas', '', 1, 1635472698, 1635472698),
(47, 18, 2498, 0, '3333', '', 1, 1635472759, 1635472759),
(48, 18, 2498, 0, 'asd', '', 1, 1635472781, 1635472781),
(49, 18, 2498, 0, 'dd111222222233', '', 1, 1635472784, 1635473028),
(50, 49, 2498, 0, 'asd', '', 1, 1635473033, 1635473033),
(51, 49, 2498, 0, 'asd', '', 1, 1635473042, 1635473042),
(52, 49, 2498, 0, 'asd', '', 1, 1635473046, 1635473046),
(53, 18, 2498, 0, 'asdasddqqq222fffgg', '', 1, 1635473065, 1635473253),
(54, 53, 2498, 0, 'saa', '', 1, 1635473126, 1635473126),
(55, 53, 2498, 0, 'asda', '', 1, 1635473162, 1635473162),
(56, 53, 2498, 0, 'asd', '', 1, 1635473262, 1635473262),
(57, 18, 2498, 0, 'sddddasdasd1111444', '', 1, 1635473302, 1635473598),
(58, 57, 2498, 0, 'dsad', '', 1, 1635473322, 1635473322),
(59, 57, 2498, 0, 'asdas', '', 1, 1635473368, 1635473368),
(60, 57, 2498, 0, 'ad', '', 1, 1635473534, 1635473534),
(61, 57, 2498, 0, 'sdaasd', '', 1, 1635473570, 1635473570),
(62, 57, 2498, 0, 'qqqq', '', 1, 1635473601, 1635473601),
(63, 18, 2498, 0, 'asdsadsa', '', 1, 1635473612, 1635473612),
(64, 18, 2498, 0, '1111', '', 1, 1635473640, 1635473640),
(66, 18, 2498, 65, 'das', '', 1, 1635473908, 1635473908),
(70, 64, 2498, 64, 'asdasda', '', 1, 1635475006, 1635475006),
(72, 18, 2498, 0, 'dsa', '../img/vanhoadoanhnghiep/nguyen_tac/comment/715074590.png', 1, 1635477707, 1635477707),
(73, 18, 2498, 0, '', '../img/vanhoadoanhnghiep/nguyen_tac/comment/1918255078.png', 1, 1635478143, 1635478143),
(74, 18, 2498, 0, 'adasdd', '', 1, 1635478218, 1635490553),
(75, 74, 2498, 0, 'đasa', '../img/vanhoadoanhnghiep/nguyen_tac/comment/1607495871.png', 1, 1635490571, 1635490571),
(76, 18, 2498, 0, '', '../img/vanhoadoanhnghiep/nguyen_tac/comment/545121236.png', 1, 1635490672, 1635490672),
(77, 18, 2498, 0, 'sadsads', '../img/vanhoadoanhnghiep/nguyen_tac/comment/641187914.png', 1, 1635491086, 1635491086),
(78, 18, 2498, 0, '', '../img/vanhoadoanhnghiep/nguyen_tac/comment/1775695907.png', 1, 1635491117, 1635491117),
(79, 78, 2498, 78, 'adsdasds', '', 1, 1635492802, 1635492802),
(80, 78, 2498, 78, 'asdasdasdqdasddd', '', 1, 1635493346, 1635493549);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `com_create_time`
--

CREATE TABLE `com_create_time` (
  `id` int(10) NOT NULL,
  `id_company` int(10) NOT NULL,
  `time` int(12) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `com_create_time`
--

INSERT INTO `com_create_time` (`id`, `id_company`, `time`, `created_at`, `updated_at`) VALUES
(1, 1761, 1627531962, 1636534836, 1636534836),
(2, 1636, 1626505829, 1636540742, 1636540742),
(3, 2164, 1630998883, 1636614869, 1636614869),
(4, 2840, 1636095391, 1636615527, 1636615527),
(5, 2514, 1634371591, 1636620506, 1636620506),
(6, 1664, 1626687035, 1636683414, 1636683414),
(7, 2498, 1634199696, 1636706576, 1636706576);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `seen` tinyint(4) DEFAULT NULL,
  `delete` tinyint(4) DEFAULT NULL,
  `create` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `id_employee`, `id_module`, `seen`, `delete`, `create`) VALUES
(10, 3430, 1, 0, 0, 0),
(11, 3426, 1, 0, 0, 0),
(12, 3007, 1, 1, 1, 1),
(13, 3007, 2, 1, 1, 1),
(14, 3007, 3, 1, 1, 1),
(15, 3007, 4, 1, 1, 1),
(16, 3007, 5, 1, 1, 1),
(17, 3007, 6, 1, 1, 1),
(19, 4074, 2, 1, 1, 0),
(20, 4074, 3, 1, 0, 0),
(21, 4074, 1, 1, 1, 0),
(22, 4074, 4, 1, 1, 0),
(23, 4074, 6, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config_background`
--

CREATE TABLE `config_background` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `background` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='màu site';

--
-- Đang đổ dữ liệu cho bảng `config_background`
--

INSERT INTO `config_background` (`id`, `id_user`, `background`, `type`) VALUES
(1, 1761, 'blue', 1),
(2, 2164, 'blue', 1),
(3, 2498, 'blue', 1),
(4, 4074, '', 2),
(5, 1636, 'blue', 1),
(6, 1750, '', 1),
(7, 57, '', 1),
(8, 1664, 'blue', 1),
(9, 738, '', 1),
(10, 168, '', 1),
(11, 1788, '', 1),
(12, 4098, '', 2),
(13, 457, '', 2),
(14, 1439, '', 2),
(15, 168, '', 2),
(16, 1503, 'blue', 2),
(17, 3006, '', 2),
(18, 4211, '', 2),
(19, 2888, '', 1),
(20, 2899, '', 1),
(21, 2840, '', 1),
(22, 2514, '', 1),
(23, 4706, '', 2),
(24, 2693, '', 2),
(25, 449, '', 2),
(26, 1196, '', 2),
(27, 189, '', 2),
(28, 3959, '', 2),
(29, 2110, '', 2),
(30, 1363, '', 2),
(31, 1850, '', 2),
(32, 738, '', 2),
(33, 3436, '', 2),
(34, 3183, '', 1),
(35, 806, '', 2),
(36, 1257, '', 2),
(37, 2716, '', 1),
(38, 490, '', 2),
(39, 453, '', 2),
(40, 2160, '', 2),
(41, 3264, '', 1),
(42, 646, '', 2),
(43, 1501, '', 2),
(44, 3007, '', 2),
(45, 5449, '', 2),
(46, 3714, '', 2),
(47, 5683, '', 2),
(48, 5688, '', 2),
(49, 5725, '', 2),
(50, 5713, '', 2),
(51, 5686, '', 2),
(52, 5691, '', 2),
(53, 5677, '', 2),
(54, 3441, '', 1),
(55, 3312, 'blue', 1),
(56, 5739, '', 2),
(57, 5703, '', 2),
(58, 3557, '', 1),
(59, 5709, '', 2),
(60, 5839, '', 2),
(61, 3118, '', 1),
(62, 5978, '', 2),
(63, 5653, 'blue', 2),
(64, 5645, '', 2),
(65, 5695, '', 2),
(66, 5314, '', 2),
(67, 3565, '', 1),
(68, 5629, '', 2),
(69, 5634, '', 2),
(70, 3586, '', 1),
(71, 6579, '', 2),
(72, 3735, '', 1),
(73, 3765, '', 1),
(74, 3822, '', 1),
(75, 5702, '', 2),
(76, 6136, '', 2),
(77, 3542, '', 1),
(78, 1009, '', 1),
(79, 1666, '', 2),
(80, 5669, '', 2),
(81, 5685, '', 2),
(82, 6817, '', 2),
(83, 5620, '', 2),
(84, 5657, '', 2),
(85, 5650, '', 2),
(86, 4194, '', 1),
(87, 5712, '', 2),
(88, 5750, 'blue', 2),
(89, 2185, '', 1),
(90, 192, 'white', 1),
(91, 316, 'blue', 1),
(92, 3551, '', 2),
(93, 5641, '', 2),
(94, 5658, '', 2),
(95, 3813, '', 1),
(96, 6909, '', 2),
(97, 5637, '', 2),
(98, 7686, '', 2),
(99, 2186, '', 1),
(100, 7721, '', 2),
(101, 7538, '', 2),
(102, 7494, 'blue', 2),
(103, 5616, '', 2),
(104, 5741, '', 2),
(105, 7780, '', 2),
(106, 5632, '', 2),
(107, 6911, '', 2),
(108, 5678, '', 2),
(109, 5651, '', 2),
(110, 7880, '', 2),
(111, 8054, 'blue', 2),
(112, 5327, '', 2),
(113, 5670, '', 2),
(114, 64434, '', 1),
(115, 7736, '', 2),
(116, 7777, '', 2),
(117, 5627, '', 2),
(118, 65026, '', 1),
(119, 8263, '', 2),
(120, 5737, '', 2),
(121, 5649, '', 2),
(122, 5630, '', 2),
(123, 8187, '', 2),
(124, 7501, '', 2),
(125, 5719, '', 2),
(126, 7333, '', 2),
(127, 8117, '', 2),
(128, 66914, '', 1),
(129, 66569, '', 1),
(130, 8684, '', 2),
(131, 8683, '', 2),
(132, 2142, '', 1),
(133, 8751, '', 2),
(134, 5618, '', 2),
(135, 67471, '', 1),
(136, 8848, '', 2),
(137, 8866, '', 2),
(138, 8953, '', 2),
(139, 8951, '', 2),
(140, 8970, '', 2),
(141, 8952, '', 2),
(142, 8949, '', 2),
(143, 8948, '', 2),
(144, 8954, '', 2),
(145, 7512, '', 2),
(146, 9072, '', 2),
(147, 9067, '', 2),
(148, 9082, '', 2),
(149, 9061, '', 2),
(150, 6833, '', 2),
(151, 9068, '', 2),
(152, 9173, '', 2),
(153, 9170, '', 2),
(154, 9164, '', 2),
(155, 2690, '', 2),
(156, 9171, '', 2),
(157, 7813, '', 2),
(158, 69157, '', 1),
(159, 9182, '', 2),
(160, 7491, '', 2),
(161, 8638, '', 2),
(162, 9285, '', 2),
(163, 9284, '', 2),
(164, 9174, '', 2),
(165, 9424, '', 2),
(166, 5450, '', 2),
(167, 9600, '', 2),
(168, 9597, '', 2),
(169, 9604, '', 2),
(170, 9676, '', 2),
(171, 9673, '', 2),
(172, 69718, '', 1),
(173, 9759, '', 2),
(174, 9849, '', 2),
(175, 5981, '', 2),
(176, 6834, '', 2),
(177, 9929, '', 2),
(178, 9926, '', 2),
(179, 5660, '', 2),
(180, 9924, '', 2),
(181, 10037, '', 2),
(182, 10039, '', 2),
(183, 10132, '', 2),
(184, 10139, '', 2),
(185, 10134, '', 2),
(186, 10138, '', 2),
(187, 10137, '', 2),
(188, 73435, '', 1),
(189, 73542, '', 1),
(190, 10133, '', 2),
(191, 73543, '', 1),
(192, 10321, '', 2),
(193, 10337, '', 2),
(194, 5675, '', 2),
(195, 7655, '', 2),
(196, 10493, '', 2),
(197, 10487, '', 2),
(198, 10620, '', 2),
(199, 10622, '', 2),
(200, 10621, '', 2),
(201, 10490, '', 2),
(202, 10495, '', 2),
(203, 5617, '', 2),
(204, 10890, '', 2),
(205, 75294, '', 1),
(206, 7884, '', 2),
(207, 11168, '', 2),
(208, 5701, '', 2),
(209, 11147, '', 2),
(210, 75721, '', 1),
(211, 10523, '', 2),
(212, 11468, '', 2),
(213, 11471, '', 2),
(214, 11476, 'white', 2),
(215, 5664, '', 2),
(216, 11621, '', 2),
(217, 5699, 'blue', 2),
(218, 11651, '', 2),
(219, 76874, '', 1),
(220, 8139, '', 2),
(221, 64135, '', 1),
(222, 11791, '', 2),
(223, 7781, 'blue', 2),
(224, 11792, '', 2),
(225, 11787, '', 2),
(226, 11912, '', 2),
(227, 11917, '', 2),
(228, 11920, '', 2),
(229, 11919, '', 2),
(230, 12153, '', 2),
(231, 12162, '', 2),
(232, 12148, '', 2),
(233, 12147, '', 2),
(234, 12144, '', 2),
(235, 12154, '', 2),
(236, 12163, '', 2),
(237, 12150, '', 2),
(238, 12152, '', 2),
(239, 12158, '', 2),
(240, 12145, '', 2),
(241, 11606, '', 2),
(242, 6901, '', 2),
(243, 10887, '', 2),
(244, 5644, '', 2),
(245, 8747, '', 2),
(246, 79080, '', 1),
(247, 12470, '', 2),
(248, 12481, '', 2),
(249, 12474, '', 2),
(250, 10035, '', 2),
(251, 12479, '', 2),
(252, 12703, '', 2),
(253, 12696, '', 2),
(254, 12695, '', 2),
(255, 12848, '', 2),
(256, 12849, '', 2),
(257, 12874, '', 2),
(258, 12839, '', 2),
(259, 12879, '', 2),
(260, 12885, '', 2),
(261, 12886, '', 2),
(262, 12881, '', 2),
(263, 12837, '', 2),
(264, 10998, '', 2),
(265, 12856, '', 2),
(266, 13037, '', 2),
(267, 13103, '', 2),
(268, 13017, '', 2),
(269, 13056, '', 2),
(270, 13048, '', 2),
(271, 79877, '', 1),
(272, 13043, '', 2),
(273, 13044, '', 2),
(274, 73068, '', 1),
(275, 13199, '', 2),
(276, 12336, '', 2),
(277, 13224, '', 2),
(278, 13208, '', 2),
(279, 13197, '', 2),
(280, 13046, '', 2),
(281, 5623, '', 2),
(282, 13351, '', 2),
(283, 13370, '', 2),
(284, 13357, '', 2),
(285, 13375, '', 2),
(286, 12323, '', 2),
(287, 13365, '', 2),
(288, 13373, '', 2),
(289, 13516, '', 2),
(290, 13535, '', 2),
(291, 12334, '', 2),
(292, 13511, '', 2),
(293, 13519, '', 2),
(294, 13520, '', 2),
(295, 4502, 'blue', 2),
(296, 5706, '', 2),
(297, 5753, '', 2),
(298, 3838, '', 2),
(299, 13751, '', 2),
(300, 13730, '', 2),
(301, 13745, '', 2),
(302, 13744, '', 2),
(303, 13797, '', 2),
(304, 13798, '', 2),
(305, 13741, 'blue', 2),
(306, 8186, '', 2),
(307, 13360, '', 2),
(308, 6351, '', 2),
(309, 82511, '', 1),
(310, 13970, '', 2),
(311, 82833, '', 1),
(312, 13954, '', 2),
(313, 5744, '', 2),
(314, 12149, '', 2),
(315, 13058, '', 2),
(316, 14237, '', 2),
(317, 13956, '', 2),
(318, 81835, '', 1),
(319, 14324, 'blue', 2),
(320, 14323, '', 2),
(321, 14340, '', 2),
(322, 13977, '', 2),
(323, 14455, '', 2),
(324, 14460, '', 2),
(325, 14487, '', 2),
(326, 14445, '', 2),
(327, 14448, '', 2),
(328, 8334, '', 2),
(329, 14454, '', 2),
(330, 8553, 'white', 2),
(331, 14441, '', 2),
(332, 14583, '', 2),
(333, 7652, '', 2),
(334, 84169, '', 1),
(335, 14704, '', 2),
(336, 14452, '', 2),
(337, 14723, '', 2),
(338, 14708, '', 2),
(339, 14733, '', 2),
(340, 14325, '', 2),
(341, 14825, '', 2),
(342, 85110, '', 1),
(343, 14705, '', 2),
(344, 80770, '', 1),
(345, 15107, '', 2),
(346, 15108, '', 2),
(347, 12459, '', 2),
(348, 15103, '', 2),
(349, 85732, '', 1),
(350, 84115, '', 1),
(351, 14339, '', 2),
(352, 11613, '', 2),
(353, 5643, '', 2),
(354, 86193, '', 1),
(355, 86266, '', 1),
(356, 14453, '', 2),
(357, 15309, '', 2),
(358, 14580, '', 2),
(359, 16295, '', 2),
(360, 16493, '', 2),
(361, 86755, '', 1),
(362, 87032, '', 1),
(363, 14761, '', 2),
(364, 18677, '', 2),
(365, 8332, '', 2),
(366, 10506, '', 2),
(367, 18678, '', 2),
(368, 18675, '', 2),
(369, 18681, '', 2),
(370, 18680, '', 2),
(371, 19772, '', 2),
(372, 19773, '', 2),
(373, 20833, '', 2),
(374, 13193, '', 2),
(375, 19948, '', 2),
(376, 22341, '', 2),
(377, 83885, '', 1),
(378, 5631, '', 2),
(379, 3222, '', 1),
(380, 5761, '', 2),
(381, 59134, '', 1),
(382, 5756, '', 2),
(383, 14830, '', 2),
(384, 23740, '', 2),
(385, 11915, '', 2),
(386, 25067, '', 2),
(387, 25065, '', 2),
(388, 8053, '', 2),
(389, 26474, '', 2),
(390, 25060, '', 2),
(391, 30245, '', 2),
(392, 30210, '', 2),
(393, 30220, '', 2),
(394, 30233, '', 2),
(395, 30216, '', 2),
(396, 12475, '', 2),
(397, 37310, '', 2),
(398, 8034, '', 1),
(399, 978, '', 1),
(400, 91083, '', 1),
(401, 8296, '', 2),
(402, 76350, '', 1),
(403, 12852, '', 2),
(404, 72132, '', 1),
(405, 15211, '', 2),
(406, 42876, '', 2),
(407, 42890, '', 2),
(408, 91346, '', 1),
(409, 42875, '', 2),
(410, 42898, '', 2),
(411, 45618, '', 2),
(412, 92167, '', 1),
(413, 22318, '', 2),
(414, 30571, '', 2),
(415, 92061, '', 1),
(416, 92423, '', 1),
(417, 92871, '', 1),
(418, 72216, '', 1),
(419, 51770, '', 2),
(420, 53576, '', 2),
(421, 53266, '', 2),
(422, 53265, '', 2),
(423, 55967, '', 2),
(424, 13049, '', 2),
(425, 58145, '', 2),
(426, 94492, '', 1),
(427, 94764, '', 1),
(428, 14234, '', 2),
(429, 39719, '', 2),
(430, 95174, '', 1),
(431, 111788, '', 2),
(432, 92935, '', 1),
(433, 121196, '', 2),
(434, 56195, '', 2),
(435, 9798, '', 2),
(436, 2025, '', 1),
(437, 127527, '', 2),
(438, 12438, '', 2),
(439, 13353, '', 2),
(440, 133737, '', 2),
(441, 97260, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `core_value`
--

CREATE TABLE `core_value` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `comment` tinyint(4) NOT NULL DEFAULT '0',
  `option_notify` varchar(255) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL DEFAULT '1',
  `delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 : hiển thị , 1: ẩn',
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `core_value`
--

INSERT INTO `core_value` (`id`, `id_user`, `id_company`, `tittle`, `content`, `cover_image`, `comment`, `option_notify`, `user_type`, `delete`, `created_at`, `updated_at`) VALUES
(1, 1761, 1761, 'Tên giá trị cốt lõi', 'Nội dung giá trị cốt lõi', '25099.png', 0, '0', 1, 0, 1632123070, 1632123070),
(6, 1636, 1636, 'giá trri cot loi', '123123123', '28747.png', 0, '0', 1, 0, 1632538979, 1632539499),
(7, 1761, 1764, 'asdasdas', 'asdasdasdads', '8603.png', 0, '1', 1, 0, 1632708096, 1632708096),
(9, 1761, 1761, 'giá trị cốt lõi 1', 'Nôi dung giá trị cốt lõi 1', '1039388626.png', 0, '0', 1, 0, 1634196107, 1634196107),
(10, 2498, 0, 'Giá trị cốt lõi 2', 'nôi dung gtcl 2', '1383584277.png', 0, '0', 1, 0, 1634259905, 1634259905),
(11, 2498, 0, 'Gia tri 21', 'noi dung 21', '945486400.png', 0, '0', 1, 0, 1634260778, 1634260778),
(12, 2498, 0, 'Giá trị 21', 'nội dung 21', '1050668216.png', 0, '0', 1, 0, 1634260801, 1634260801),
(13, 2498, 0, 'ád', 'ád', '773630524.png', 0, '0', 1, 0, 1634260843, 1634260843),
(14, 2498, 0, 'q', 'ư', '2033761739.png', 0, '0', 1, 0, 1634260870, 1634260870),
(15, 2498, 2498, 'q', 'ư', '1891741558.png', 0, '0', 1, 0, 1634260886, 1634260886),
(16, 2498, 2498, 'q1', 'ư1', '1691309011.png', 1, '0', 1, 0, 1634260894, 1634281714),
(17, 2498, 2498, 'qqq1111', 'ewwww2222', '1385280853.png', 1, '0', 1, 0, 1634271133, 1634271133),
(18, 2498, 2498, 'qqqq112222', 'qweqwqwew', '1686505693.png', 0, '0', 1, 0, 1634271411, 1634284415),
(19, 2498, 2498, 'giá trị 2', 'nodadsa', '183190271.png', 0, '0', 1, 0, 1634346670, 1634346670),
(20, 1636, 1636, 'Tận tâm - tận lực', 'uôn đặt lợi ích của khách hàng lên trên để nghiên cứu và hoạt động.', '1865495903.jpg', 0, '0', 1, 0, 1634634715, 1634634715),
(21, 1664, 1664, 'luôn mang đến sự hài lòng cho khách hàng', 'Google có một danh sách 10 giá trị cốt lõi được gọi là “Mười điều đúng đắn chúng tôi tin tưởng”:\r\n\r\nTập trung vào khách hàng và thực hiện mọi điều để đạt mục tiêu này.\r\nTốt nhất là tập trung làm một sản phẩm thật tốt.\r\nNhanh bao giờ cũng tốt hơn chậm.\r\nBình đẳng trong công việc\r\nKhông nhất thiết phải ngồi tại bàn làm việc.\r\nBạn có thể kiếm nhiều tiền mà không cần làm việc xấu.\r\nThế giới luôn luôn có nguồn thông tin vô hạn.\r\nHãy để mong muốn khám phá của bạn vượt ra ngoài mọi biên giới.\r\nBạn vẫn có thể rất chững chạc mà không cần mặc 1 bộ vest.\r\nChỉ tuyệt vời thôi là chưa đủ tốt', '1512302087.jpeg', 0, '0', 1, 0, 1635826503, 1635826503),
(22, 1664, 1664, 'trung thành là số 1', 'Mong muốn sâu kín của khách hàng\r\nQuyền sở hữu\r\nPhát minh và Đơn giản hóa\r\nĐúng, rất nhiều\r\nTìm hiểu và tò mò\r\nThuê và phát triển tốt nhất\r\nNhấn mạnh vào các tiêu chuẩn cao nhất\r\nSuy nghĩ lớn\r\nThiên vị cho hành động\r\nTiết kiệm\r\nKiếm được niềm tin\r\nLặn sâu\r\nCó xương sống; Không đồng ý và cam kết\r\nCung cấp kết quả', '1398983353.jpeg', 1, '0', 1, 0, 1635826613, 1635826613),
(23, 1761, 1761, 'giá trị của bạn ở đâu ', 'giá trị cốt lõi', '970426724.png', 0, '0', 1, 0, 1635848791, 1635848791),
(25, 1664, 1664, 'Giá trị 1', 'Giá trị cốt lõi đặc biệt của doanh nghiệp', '1106426623.jpg', 0, '0', 1, 0, 1638436426, 1638436426),
(28, 2840, 2840, 'asdas', 'qwdqwe', '854398657.png', 0, '0', 1, 0, 1640162057, 1640162057),
(29, 2840, 2840, 'adqw', 'ưqeqwe', '1840544924.png', 0, '0', 1, 0, 1640250055, 1640250055),
(30, 72132, 72132, 'lõi 1', 'lõi 1', '510390596.jpg', 0, '0', 1, 0, 1671594740, 1671594740);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cover_image`
--

CREATE TABLE `cover_image` (
  `id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `link_image` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cover_image_com`
--

CREATE TABLE `cover_image_com` (
  `id` int(10) NOT NULL,
  `id_company` int(10) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `cover_image_com`
--

INSERT INTO `cover_image_com` (`id`, `id_company`, `cover_image`, `created_at`, `updated_at`) VALUES
(1, 0, '28673.png', 0, 0),
(2, 1761, '471374137.jpeg', 1633667834, 1635913388),
(3, 2498, '1407226120.png', 1634207605, 1635328132),
(4, 1636, '814302519.jpeg', 1634632657, 1659493297),
(5, 1664, '248350040.jpeg', 1634803679, 1635163415),
(6, 168, '289179476.jpeg', 1636703429, 1636703429),
(7, 57, '1112355279.jpeg', 1637650742, 1637650742),
(8, 2840, '1672218345.png', 1640162152, 1640162198),
(9, 3312, '860320147.jpeg', 1640428080, 1671606630),
(10, 3765, '509400179.jpeg', 1641348798, 1641348798),
(11, 3542, '713001621.jpeg', 1641636422, 1641636521);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custom_notification`
--

CREATE TABLE `custom_notification` (
  `id_ct` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_group` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customize` int(11) NOT NULL COMMENT '0: Tất cả bài viết, 1:Bài viết nổi bật, 2:Bài viết của bạn bè, 3: Tắt',
  `get_notify` int(11) NOT NULL COMMENT 'Nhận thông báo khi có yêu cầu tham gia--- 0: Ko nhận,  1: Nhận'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='cài đặt thông báo nhóm';

--
-- Đang đổ dữ liệu cho bảng `custom_notification`
--

INSERT INTO `custom_notification` (`id_ct`, `id_user`, `user_type`, `id_company`, `id_group`, `customize`, `get_notify`) VALUES
(1, 51770, 2, 72132, '26', 3, 1),
(2, 51770, 2, 72132, '28', 3, 1),
(3, 51770, 2, 72132, '33', 1, 1),
(5, 51770, 2, 72132, '29', 2, 1),
(6, 53576, 2, 72132, '26', 2, 1),
(8, 51770, 2, 72132, '36', 3, 0),
(29, 8296, 2, 3312, '31', 0, 0),
(30, 8296, 2, 3312, '36', 2, 1),
(31, 8296, 2, 3312, '49', 0, 0),
(32, 8296, 2, 3312, '50', 0, 0),
(33, 8296, 2, 3312, '51', 3, 0),
(34, 8296, 2, 3312, '52', 0, 0),
(35, 8296, 2, 3312, '53', 0, 0),
(36, 53576, 2, 72132, '36', 3, 0),
(37, 5713, 2, 3312, '70', 0, 0),
(38, 5713, 2, 3312, '71', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `dep_id` int(10) DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `request_censorship` int(10) DEFAULT NULL COMMENT '1 là có, 2 là không',
  `id_company` int(10) DEFAULT NULL,
  `created_at` int(12) DEFAULT NULL,
  `updated_at` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`id`, `dep_id`, `group_id`, `name`, `description`, `request_censorship`, `id_company`, `created_at`, `updated_at`) VALUES
(3, 653, NULL, NULL, 'qqqqqqq1111', 2, 1761, 1634006271, 1634007229),
(4, NULL, 3, NULL, NULL, NULL, 1761, 1634024551, 1634024551),
(5, NULL, 2, NULL, NULL, NULL, 1761, 1634024743, 1634024743),
(6, NULL, 4, NULL, NULL, NULL, 1761, 1634025393, 1634025393),
(7, NULL, 5, NULL, NULL, NULL, 1761, 1634027810, 1634027810),
(8, 0, NULL, NULL, NULL, NULL, 1761, 1634031585, 1634031585),
(9, 0, NULL, NULL, NULL, NULL, 1761, 1634031725, 1634031725),
(10, 0, NULL, NULL, NULL, NULL, 1761, 1634031800, 1634031800),
(11, 576, NULL, NULL, 'Tuyển dụng ', 2, 1636, 1634635080, 1634635131),
(12, 0, NULL, NULL, NULL, NULL, 1636, 1634635159, 1634635159),
(13, 0, NULL, NULL, NULL, NULL, 1636, 1634635159, 1634635159),
(14, 0, NULL, NULL, NULL, NULL, 1636, 1634635160, 1634635160),
(15, 909, NULL, NULL, NULL, NULL, 2498, 1635146947, 1635146947),
(16, NULL, 21, NULL, NULL, NULL, 2498, 1635332481, 1635332481),
(17, 713, NULL, NULL, NULL, NULL, 1664, 1635818912, 1635818912),
(18, 0, NULL, NULL, NULL, NULL, 1636, 1635820177, 1635820177),
(19, 0, NULL, NULL, NULL, NULL, 1636, 1635820178, 1635820178),
(20, 0, NULL, NULL, NULL, NULL, 1636, 1635820182, 1635820182),
(21, 0, NULL, NULL, NULL, NULL, 1636, 1635820182, 1635820182),
(22, 0, NULL, NULL, NULL, NULL, 1636, 1635820183, 1635820183),
(23, 0, NULL, NULL, NULL, NULL, 1636, 1635820187, 1635820187),
(24, 0, NULL, NULL, NULL, NULL, 1636, 1635820191, 1635820191),
(25, 0, NULL, NULL, NULL, NULL, 1636, 1635820192, 1635820192),
(26, 0, NULL, NULL, NULL, NULL, 1636, 1635820192, 1635820192),
(27, 0, NULL, NULL, NULL, NULL, 1636, 1635820193, 1635820193),
(28, 0, NULL, NULL, NULL, NULL, 1636, 1635820194, 1635820194),
(29, 0, NULL, NULL, NULL, NULL, 1636, 1635820194, 1635820194),
(30, 0, NULL, NULL, NULL, NULL, 1636, 1635820195, 1635820195),
(31, 654, NULL, NULL, NULL, NULL, 1761, 1635849251, 1635849251),
(32, 0, NULL, NULL, NULL, NULL, 1761, 1635849262, 1635849262),
(33, 0, NULL, NULL, NULL, NULL, 1761, 1635849264, 1635849264),
(34, 0, NULL, NULL, NULL, NULL, 1761, 1635849266, 1635849266),
(35, 657, NULL, NULL, NULL, NULL, 1761, 1635912165, 1635912165),
(36, 1035, NULL, NULL, NULL, NULL, 2840, 1637402258, 1637402258),
(37, 1438, NULL, NULL, NULL, NULL, 2185, 1644816241, 1644816241),
(38, 134, NULL, NULL, NULL, NULL, 316, 1645108728, 1645108728),
(39, 1364, NULL, NULL, NULL, NULL, 3822, 1645858001, 1645858001),
(40, 3206, NULL, NULL, NULL, NULL, 92061, 1667800424, 1667800424),
(41, 0, NULL, NULL, NULL, NULL, 92061, 1667800442, 1667800442);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dep_image`
--

CREATE TABLE `dep_image` (
  `id` int(10) NOT NULL,
  `dep_id` int(10) NOT NULL,
  `id_company` int(10) NOT NULL,
  `dep_image` varchar(255) DEFAULT NULL,
  `cover_dep` varchar(255) DEFAULT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `devices`
--

CREATE TABLE `devices` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `user_type` int(10) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `devices`
--

INSERT INTO `devices` (`id`, `id_user`, `user_type`, `device_name`, `address`, `created_at`, `updated_at`) VALUES
(2, 1761, 1, 'windows', 'Hanoi, Vietnam', 1634108644, 1634108644),
(3, 2164, 1, 'windows', 'Hanoi, Vietnam', 1634197326, 1634197326),
(4, 2498, 1, 'windows', 'Hanoi, Vietnam', 1634201141, 1634201141),
(5, 1636, 1, 'windows', 'Hanoi, Vietnam', 1634606028, 1634606028),
(6, 1636, 1, 'linux', 'Hanoi, Vietnam', 1634691813, 1634691813),
(7, 1750, 1, 'windows', 'Hanoi, Vietnam', 1634696796, 1634696796),
(8, 57, 1, 'windows', 'Hanoi, Vietnam', 1634780538, 1634780538),
(9, 1664, 1, 'windows', 'Hanoi, Vietnam', 1634783778, 1634783778),
(10, 1664, 1, 'linux', 'Hanoi, Vietnam', 1634783826, 1634783826),
(11, 2498, 1, 'linux', 'Hanoi, Vietnam', 1635125478, 1635125478),
(12, 1788, 1, 'windows', 'Hanoi, Vietnam', 1635146017, 1635146017),
(13, 2498, 1, 'mac', 'Hanoi, Vietnam', 1635302756, 1635302756),
(14, 1761, 1, 'linux', 'Hanoi, Vietnam', 1635911372, 1635911372),
(15, 2888, 1, 'windows', 'Hanoi, Vietnam', 1636365989, 1636365989),
(16, 2899, 1, 'windows', 'Hanoi, Vietnam', 1636511164, 1636511164),
(17, 2840, 1, 'windows', 'Hanoi, Vietnam', 1636615527, 1636615527),
(18, 2514, 1, 'windows', 'Hanoi, Vietnam', 1636620506, 1636620506);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dinh_chi_thanh_vien`
--

CREATE TABLE `dinh_chi_thanh_vien` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `is_suspended` int(11) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1 là công ty; 2 là nhân viên',
  `time` int(11) NOT NULL,
  `time_start` int(11) NOT NULL COMMENT 'Thời gian bắt đầu đình chỉ',
  `time_end` int(11) NOT NULL COMMENT 'Thời gian kết thúc đình chỉ'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='đình chỉ thanh viên nhóm(chỉ xem)';

--
-- Đang đổ dữ liệu cho bảng `dinh_chi_thanh_vien`
--

INSERT INTO `dinh_chi_thanh_vien` (`id`, `id_group`, `is_suspended`, `user_type`, `time`, `time_start`, `time_end`) VALUES
(4, 36, 116101, 2, 6, 1671692597, 1674111797),
(5, 36, 56195, 2, 3, 1671421491, 1671680691),
(6, 51, 7652, 2, 2, 1672967690, 1673054090),
(7, 51, 9798, 2, 2, 1672828680, 1672915080),
(9, 36, 5699, 2, 2, 1673430836, 1673517236),
(12, 36, 53576, 2, 1, 1673432096, 1673475296);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discuss`
--

CREATE TABLE `discuss` (
  `id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  `discuss_mode` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `discuss`
--

INSERT INTO `discuss` (`id`, `new_id`, `discuss_mode`) VALUES
(1, 152, 2),
(2, 193, 1),
(3, 258, 1),
(4, 306, 1),
(5, 317, 1),
(6, 355, 1),
(7, 368, 1),
(8, 379, 1),
(9, 389, 1),
(10, 413, 1),
(11, 453, 1),
(12, 454, 1),
(13, 468, 1),
(14, 481, 1),
(15, 483, 1),
(16, 499, 1),
(17, 503, 1),
(18, 531, 1),
(19, 538, 1),
(20, 588, 1),
(21, 590, 1),
(22, 591, 1),
(23, 592, 1),
(24, 605, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `speakers_avatar` varchar(255) DEFAULT NULL,
  `event_mode` int(11) DEFAULT NULL,
  `speakers_name` varchar(255) DEFAULT NULL,
  `speakers_position` varchar(255) DEFAULT NULL,
  `speakers_phone` varchar(255) DEFAULT NULL,
  `speakers_email` varchar(255) DEFAULT NULL,
  `list_guests` text,
  `list_emp_join` varchar(255) DEFAULT NULL,
  `list_question` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `id_new`, `avatar`, `time`, `speakers_avatar`, `event_mode`, `speakers_name`, `speakers_position`, `speakers_phone`, `speakers_email`, `list_guests`, `list_emp_join`, `list_question`) VALUES
(27, 108, '8281.png', 1631263500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 109, '21054.png', 1631264220, '761.png', 1, 'undefined', 'undefined', 'undefined', 'undefined', '[{"name_guest":"q","name_company":"q","name_position":"q"}]', NULL, NULL),
(29, 110, '5168.png', 1631264700, '11635.png', 1, 'ewqeqw', 'eqwe', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"e","name_company":"e","name_position":"e"},{"name_guest":"q","name_company":"q","name_position":"q"}]', NULL, NULL),
(30, 111, '26449.png', 1631265060, '17528.png', 1, 'eqweqw', '0896504259', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"q","name_company":"q","name_position":"q"}]', NULL, NULL),
(31, 112, '32687.png', 1631265060, '11150.png', 1, 'eqweqw', '0896504259', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"q","name_company":"q","name_position":"q"}]', NULL, NULL),
(32, 113, '3581.png', 1631265060, '27220.png', 1, 'eqweqw', '0896504259', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"q","name_company":"q","name_position":"q"}]', NULL, NULL),
(33, 114, '12423.png', 1631265300, '14534.png', 1, 'Trung ', 'Giám đốc', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"q","name_company":"q","name_position":"q"}]', NULL, NULL),
(34, 115, '11894.png', 1631265420, '19729.png', 1, 'Trung', '0896504259', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"q","name_company":"q","name_position":"q"}]', NULL, NULL),
(35, 116, '24804.png', 1631269440, '11383.png', 2, 'eqweqw', '0896504259', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"q","name_company":"q","name_position":"q"},{"name_guest":"","name_company":"","name_position":""}]', NULL, NULL),
(36, 117, '9207.png', 1631269440, '5110.png', 1, 'eqweqw', 'dqwedđ', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"q","name_company":"q","name_position":"q"},{"name_guest":"e","name_company":"e","name_position":"e"}]', NULL, NULL),
(37, 119, '3986.png', 1631323140, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 124, '5842.png', 1631331480, '27997.png', 2, 'Trung', 'Giám đốc', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"q","name_company":"q","name_position":"q"}]', NULL, NULL),
(39, 156, '27477.png', 1631689680, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 157, '', 1631690520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 158, '3036.png', 1631690520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 159, '29787.png', 1631690760, '5994.png', 2, 'Trng', 'Giám đốc', '0896504259', 'vuongkwai1998@gmail.com', '[{"name_guest":"q","name_company":"q","name_position":"q"},{"name_guest":"e","name_company":"e","name_position":"e"}]', NULL, NULL),
(43, 169, '27985.png', 1631931720, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 176, '13358.png', 1634212440, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 191, '7289.png', 1634227080, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 192, '14081.png', 1634227620, '17640.png', 1, 'tr', 'tr', '0896504259', 'vu@gmail.com', '[{"name_guest":"r","name_company":"r","name_position":"r"}]', NULL, NULL),
(47, 203, '4614.png', 1634351040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 204, '27999.png', 1634266680, '510.png', 1, 'tr', 'tr', '0896504259', 'vu@gmail.com', '[{"name_guest":"1","name_company":"1","name_position":"1"}]', NULL, NULL),
(49, 205, '4446.png', 1634266920, '19097.png', 1, 'tr', 'tr', '0896504259', 'vu@gmail.com', '[{"name_guest":"2","name_company":"2","name_position":"2"}]', NULL, NULL),
(50, 224, '1438384432.png', 1634432580, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 227, '252735353.jpeg', 1634783400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 255, '1315965187.jpeg', 1634697000, '995486485.jpg', 1, 'Đỗ Khánh Tú', 'Tổng giám đốc', '0353554020', 'hungha.timviec365@gmail.com', '[{"name_guest":"Phạm A","name_company":"Công ty 123","name_position":"phó phòng"}]', NULL, NULL),
(53, 256, '546042738.jpeg', 1634697000, '519769028.jpg', 1, 'Đỗ Khánh Tú', 'Tổng giám đốc', '0353554020', 'hungha.timviec365@gmail.com', '[{"name_guest":"Đỗ thị Nhung","name_company":"Công ty TNHH bún bò Huế","name_position":"Trưởng  phòng"},{"name_guest":"Phạm A","name_company":"Công ty 123","name_position":"phó phòng"}]', NULL, NULL),
(54, 257, '897658739.jpeg', 1634697000, '328043191.jpg', 1, 'Đỗ Khánh Tú', 'Tổng giám đốc', '0353554020', 'hungha.timviec365@gmail.com', '[{"name_guest":"Đỗ thị Nhung","name_company":"Công ty TNHH bún bò Huế","name_position":"Trưởng  phòng"},{"name_guest":"Phạm A","name_company":"Công ty 123","name_position":"phó phòng"}]', NULL, NULL),
(55, 277, '182195255.jpeg', 1634726820, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 303, '556527859.jpeg', 1634782200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 307, '255375628.png', 1634700900, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 308, '268960159.png', 1634789220, '2073423892.png', 1, 'qe', 'ưewq', '0896504259', 'vu@gmail.com', '[]', NULL, NULL),
(59, 316, '1633596790.png', 1634803980, '28411153.png', 1, 'Họ tên diễn giả', 'chức vụ diễn giả', '0896504259', 'vu@gmail.com', '[{"name_guest":"khách mời 1","name_company":"công ty 1","name_position":"chức vụ 1"}]', NULL, NULL),
(60, 353, '723437966.png', 1635303000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 354, '1382490716.png', 1635303360, '1413807476.png', 1, 'Họ tên diễn giả', 'chức vụ diễn giả', '0896504259', 'vu@gmail.com', '[{"name_guest":"1","name_company":"1","name_position":"1"}]', NULL, NULL),
(62, 367, '93536718.png', 1635473100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 395, '2023368623.jpeg', 1635911880, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 396, '2005312281.jpeg', 1635927300, '169800049.jpg', 1, 'Nguyễn Phi Hội', 'Phó Giám đốc', '0356021606', '0356021606', '[{"name_guest":"Lê Mạnh Linh","name_company":"Công ty Cổ phần Thanh toán Hưng Hà","name_position":"Trưởng phòng Đối ngoại"}]', NULL, NULL),
(65, 397, '1955713333.jpeg', 1638684000, '931435933.JPG', 2, 'Nguyễn Phi Hùng', 'Phó Giám đốc công ty', '0356021606', 'trangchuoi4@gmail.com', '[{"name_guest":"Trương Ngọc Anh","name_company":"Hometech","name_position":"Trường phòng Sáng tạo"}]', NULL, NULL),
(66, 398, '445160577.png', 1635823980, '658104989.jpg', 2, 'Đỗ Khánh Tú', 'Tổng giám đốc', '0353554020', 'hungha.timviec365@gmail.com', '[{"name_guest":"ffff","name_company":"fffff","name_position":"ffff"}]', NULL, NULL),
(67, 401, '1216979545.jpeg', 1636203600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 404, '35968603.jpeg', 1635995700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 405, '1795990863.png', 1636060800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 406, '140589282.jpeg', 1635934920, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 407, '403517659.jpeg', 1636017840, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 408, '1923980757.png', 1636014420, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 409, '886741790.png', 1635928200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 410, '128642415.jpeg', 1635932760, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 412, '728356948.jpeg', 1636067880, '253631762.jpg', 1, 'Hoài An', 'Giám đốc', '0987654523', 'gmail2gmail.', '[{"name_guest":"An Nguyễn","name_company":"HHP","name_position":"Trưởng phòng"}]', NULL, NULL),
(76, 428, '64131911.jpeg', 1636776000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 516, '1372000855.jpeg', 1639110600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 517, '1684942529.png', 1637820000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 518, '265176344.png', 1637910120, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 519, '1490565421.png', 1637910180, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 520, '497879466.png', 1637910240, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 521, '1190680802.png', 1637828520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 522, '1648802764.png', 1637829240, '756526332.PNG', 1, '1', '1', '0896504259', '1', '[]', NULL, NULL),
(84, 523, '843550671.png', 1637829360, '1694342610.PNG', 1, '1', '1', '0896504259', '1', '', NULL, NULL),
(85, 524, '2038370921.png', 1637916780, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 530, '1801298570.jpeg', 1640686800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 566, '305551926.png', 1640332500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 567, '1636546950.png', 1640332560, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 587, '153690145.jpeg', 1640372220, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 604, '1985654515.jpeg', 1640588880, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 616, '6071821.jpeg', 1645322880, '1751933781.jpg', 2, 'NGUYEN CHU HIEU', 'HUYEN TAN BIEN ', '0329948951', 'nguyenchuhieu2019@gmail.com', '[{"name_guest":"nguyenchu hieu","name_company":"HIEU","name_position":"TAYNINH"}]', NULL, NULL),
(92, 630, '102722605.jpeg', 1651087740, '703529600.jpg', 1, '123123123', '123123', '0321132113', '12312312', '[{"name_guest":"dỷ","name_company":"123","name_position":"qqweqw"}]', NULL, NULL),
(93, 639, '184665590.jpeg', 1651222140, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 648, '254390259.jpeg', 1660863600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 666, '1742109025.jpeg', 1668818880, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 708, '1373745552.jpeg', 1668290400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 709, '1736510845.jpeg', 1668378420, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 710, '1799209030.jpeg', 1668475800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 711, '1336083246.jpeg', 1668475920, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 725, '1548723203.png', 1668910380, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 738, '780623890.jpeg', 1668890460, '822106151.jpg', 1, 'diễn giả a', 'diễn giả a', '0321698547', 'a@f.com', '[{"name_guest":"khách mời 1","name_company":"","name_position":""},{"name_guest":"khách mời 2","name_company":"","name_position":""}]', NULL, NULL),
(102, 745, '1966985753.png', 1669799640, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event_join`
--

CREATE TABLE `event_join` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `event_join`
--

INSERT INTO `event_join` (`id`, `id_employee`, `id_event`, `user_type`) VALUES
(10, 3042, 43, 2),
(11, 3609, 43, 2),
(16, 1761, 43, 1),
(17, 1761, 45, 1),
(18, 4154, 51, 2),
(19, 1636, 51, 1),
(21, 4155, 52, 2),
(22, 4143, 56, 2),
(24, 4098, 57, 2),
(26, 4008, 63, 2),
(27, 3985, 63, 2),
(28, 3984, 63, 2),
(29, 1664, 64, 1),
(30, 4004, 65, 2),
(31, 3985, 65, 2),
(32, 3984, 65, 2),
(33, 3984, 64, 2),
(34, 3983, 64, 2),
(36, 1761, 73, 1),
(37, 1761, 48, 1),
(38, 4468, 73, 2),
(39, 1761, 69, 1),
(40, 1636, 71, 1),
(41, 2693, 71, 2),
(42, 2693, 70, 2),
(44, 1761, 77, 1),
(45, 5143, 81, 2),
(46, 4706, 81, 2),
(47, 4673, 86, 2),
(48, 4004, 86, 2),
(49, 3985, 86, 2),
(50, 2840, 88, 1),
(51, 5143, 87, 2),
(52, 5998, 90, 2),
(53, 5767, 90, 2),
(54, 4809, 90, 2),
(55, 4673, 90, 2),
(56, 1636, 93, 1),
(60, 72132, 95, 1),
(62, 51770, 95, 2),
(63, 51770, 96, 2),
(64, 51770, 98, 2),
(67, 5699, 102, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event_question`
--

CREATE TABLE `event_question` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `event_question`
--

INSERT INTO `event_question` (`id`, `id_event`, `content`, `user_id`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 45, '123123123', 1231231, 1231233, 1633798800, 1633798800),
(2, 45, '123123123', 1231231, 1231233, 1633798800, 1633798800),
(3, 45, 'qưeqwe', 1761, 1, 1634031587, 1634031587),
(8, 46, 'ádasdasd', 1761, 1, 1634051125, 1634051125),
(9, 48, 'ádasdsasdasd', 1761, 1, 1634051377, 1634051377),
(10, 48, 'ádasdsasdasd', 1761, 1, 1634051381, 1634051381),
(11, 48, 'ádasdsasdasd', 1761, 1, 1634051384, 1634051384),
(12, 53, 'ádasdsasdasd', 1761, 1, 1634058004, 1634058004),
(13, 53, 'ádasdasd', 1761, 1, 1634058046, 1634058046),
(14, 50, 'gggg', 2498, 1, 1634259842, 1634259842),
(15, 51, 'đây là câu hỏi', 1636, 1, 1634627291, 1634627291),
(16, 51, 'câu hỏi 2', 1636, 1, 1634627303, 1634627303),
(17, 52, 'đây là câu hỏi', 1636, 1, 1634630684, 1634630684),
(18, 56, 'câu hoie 1', 1636, 1, 1634698675, 1634698675),
(19, 63, 'Tổ chức đến mấy giờ thế chị ơi?', 1664, 1, 1635735605, 1635735605),
(20, 63, 'Buổi tối có vẻ vui hơn sáng đó ạ', 1664, 1, 1635735618, 1635735618),
(21, 65, 'Sự kiện này về lĩnh vực gì thế ạ?', 1664, 1, 1635737175, 1635737175),
(22, 65, 'Mấy giờ bắt đầu ạ?', 1664, 1, 1635737196, 1635737196),
(23, 64, 'đaaaa', 1664, 1, 1635837549, 1635837549),
(24, 73, 'xin chào công ty', 1761, 1, 1635843161, 1635843161),
(25, 73, 'sự kiện này ai sẽ là chủ trì vậy ạ', 1761, 1, 1635843176, 1635843176),
(26, 86, 'Bí quyết làm giàu của Elon Musk là gì?', 1664, 1, 1638417857, 1638417857),
(27, 86, 'Elon musk có mấy bà vợ', 1664, 1, 1638417875, 1638417875),
(28, 89, 'câu hỏi 1', 2840, 1, 1640329121, 1640329121),
(29, 90, 'Quỳnh Anh sinh năm bao nhiêu', 1664, 1, 1640512217, 1640512217),
(30, 90, 'Quỳnh Anh đạt được giải gì?', 1664, 1, 1640512283, 1640512283),
(31, 90, 'Quỳnh Anh có là quán quân không?', 1664, 1, 1640512303, 1640512303);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioi_han_thanh_vien`
--

CREATE TABLE `gioi_han_thanh_vien` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `id_user_limit` int(11) NOT NULL,
  `user_limit_type` int(11) NOT NULL,
  `gioi_han_post` int(11) NOT NULL,
  `type_posts_het_han_sau` int(11) NOT NULL,
  `posts_het_han_sau` int(11) NOT NULL COMMENT '1: 12h , 2: 24h , 3: 3day , 4: 7day , 5: 14day , 6: 28day',
  `gioi_han_comment` int(11) NOT NULL,
  `type_commem_het_han_sau` int(11) NOT NULL,
  `commem_het_han_sau` int(11) NOT NULL COMMENT '1: 12h , 2: 24h , 3: 3day , 4: 7day , 5: 14day , 6: 28day',
  `time_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='giới hạn hành động thành viên nhóm';

--
-- Đang đổ dữ liệu cho bảng `gioi_han_thanh_vien`
--

INSERT INTO `gioi_han_thanh_vien` (`id`, `id_group`, `id_user`, `user_type`, `id_user_limit`, `user_limit_type`, `gioi_han_post`, `type_posts_het_han_sau`, `posts_het_han_sau`, `gioi_han_comment`, `type_commem_het_han_sau`, `commem_het_han_sau`, `time_limit`) VALUES
(17, 36, 8296, 2, 116101, 2, 9, 2, 1671879182, 8, 5, 1673002382, 1671700936),
(18, 36, 8296, 2, 111788, 2, 3, 3, 1671984341, 3, 3, 1671984341, 1671700973),
(19, 36, 8296, 2, 56195, 2, 0, 0, 0, 5, 5, 1672910585, 1671700985),
(26, 36, 8296, 2, 5699, 2, 4, 6, 1674144371, 0, 0, 0, 1671725171);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `id_manager` varchar(255) DEFAULT NULL,
  `id_administrators` varchar(255) NOT NULL,
  `id_censor` varchar(255) NOT NULL,
  `id_employee` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `group_image` varchar(255) DEFAULT NULL,
  `description` text,
  `introduce` varchar(255) CHARACTER SET utf8 NOT NULL,
  `group_mode` tinyint(4) DEFAULT '0' COMMENT '0: công khai, 1: riêng tư',
  `group_pause` int(11) NOT NULL,
  `group_pause_type` int(11) NOT NULL,
  `pending` tinyint(1) NOT NULL DEFAULT '0',
  `following` text CHARACTER SET utf8 NOT NULL COMMENT 'ds bỏ theo dõi nhóm',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `stop_inviting_me` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'những user k muốn mời nữa',
  `user_pins` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hide_show` tinyint(1) NOT NULL COMMENT '0: Hiển thị, 1: Đã ẩn',
  `group_location` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pheduyet_yc_thanhvien` tinyint(1) NOT NULL COMMENT '0: Chỉ quản trị viên, 1: Bất kì ai',
  `Pheduyet_post_member` tinyint(1) NOT NULL COMMENT '0: Phải được duyệt, 1: Đăng tự do',
  `pheduyet_noidung_edit` int(1) NOT NULL COMMENT '0: Bật, 1: Tắt',
  `who_can_post` tinyint(1) NOT NULL COMMENT 'Ai có thể đăng  0: Tất cả, 1: quản trị viên',
  `cam_thanhvien_dangbai` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Cấm thành viên đăng bài'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `group`
--

INSERT INTO `group` (`id`, `id_company`, `group_name`, `id_manager`, `id_administrators`, `id_censor`, `id_employee`, `cover_image`, `group_image`, `description`, `introduce`, `group_mode`, `group_pause`, `group_pause_type`, `pending`, `following`, `created_at`, `updated_at`, `stop_inviting_me`, `user_pins`, `hide_show`, `group_location`, `pheduyet_yc_thanhvien`, `Pheduyet_post_member`, `pheduyet_noidung_edit`, `who_can_post`, `cam_thanhvien_dangbai`) VALUES
(2, 1761, 'wdewqdewq-2', '3426,3410', '', '', '', '8333.png', '578.png', '1eqweqwe', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(3, 1761, 'wdewqdewq-3', '3426,3410', '', '', '', '6042.png', '10443.png', '1eqweqwe', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(4, 1761, 'wdewqdewq-4', '3430,3426', '', '55967', '', '3938.png', '6387.png', '1eqweqwe', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(5, 1761, 'wdewqdewq-5', '3426', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141,9798', '6634.png', '1243.png', '1eqweqwe', '', 0, 0, 0, 0, '5699', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(6, 1761, 'wdewqdewq-6', '3430', '', '55967', '55967,13970,25061,5711,9596,6901,8554,12320,6141', '30238.png', '7935.png', '1eqweqwe', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(7, 1761, 'wdewqdewq-7', '3430', '', '55967', '55967,13970,25061,5711,9596,6901,8554,12320,6141', '10391.png', '31364.png', '1eqweqwe', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(8, 1761, 'wdewqdewq-8', '3430', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '5660.png', '8741.png', '1eqweqwe', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(9, 1761, 'wdewqdewq-9', '3426', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '18716.png', '22821.png', '1eqweqwe', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(10, 1761, 'wdewqdewq-10', '3426', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '1598.png', '15519.png', '1eqweqwe', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(17, 1761, 'de an 3', '3426', '', '55967', '55967,13970,25061,5711,9596,6901,8554,12320,6141', '21876.png', '27293.png', '1eqweqwe', '', 1, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(18, 1761, 'de an 4', '3426,3410,3343', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '19918.png', '5359.png', 'Nhóm de an 4', '', 1, 0, 0, 0, '5699', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(19, 1761, 'Đề Án 5', '3430,3426', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '9478.jpeg', '18375.jpeg', 'Đề án 3333', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(20, 1761, 'đề án 6', '3449,3430', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '3237.png', '22650.png', 'Đây là nhóm', '', 1, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(21, 2498, 'Nhóm 11', '4074', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '901003915.png', '544342634.png', 'Mô tả 1111', '', 1, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(22, 1664, 'HỌP LOYALTY', '4008', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '602048541.jpeg', '1842709074.jpeg', 'Nhóm họp loytalty', '', 1, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(23, 1761, 'Antiiiiiiiii', '4413', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '506428982.jpeg', '1238910714.jpeg', 'Nhóm anti', '', 1, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(24, 1636, 'abc', '13855', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '637401098.jpeg', '440758927.jpeg', 'acb', '', 0, 0, 0, 0, '', NULL, NULL, '0', '', 0, '', 0, 0, 0, 0, ''),
(26, 72132, 'Nhóm 1', '53576', '53576', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', '800780377.jpeg', '19383289.jpeg', 'Nhóm 1 công khai', '', 0, 0, 0, 0, '53576', 1668595242, 1668595242, '0', '', 0, '', 0, 0, 0, 0, ''),
(27, 72132, 'Nhóm 2', '15211', '', '55967', '51770,5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', NULL, NULL, 'Nhóm 2 riêng tư', '', 1, 0, 0, 0, '', 1668595564, 1668595564, '53576,51770', '', 0, '', 0, 0, 0, 0, ''),
(28, 72132, 'Nhóm Mua Vui', '4074,4073', '51770', '55967', '51770,5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', NULL, NULL, 'Mô tả Nhóm Mua Vui', 'Giới thiệu nhóm hahaah', 1, 0, 0, 0, '51770', 1668648249, 1668648249, '53576', '', 0, '', 0, 0, 0, 0, ''),
(29, 72132, 'nhóm của nhân viên 2', '51770', '', '55967', '51770,5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', NULL, NULL, 'nhân viên 2', '', 1, 0, 0, 0, '', 1668648357, 1668648357, '0', '', 0, '', 0, 0, 0, 0, ''),
(30, 72132, 'Nhóm nhân viên 2', '53576', '', '55967', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', NULL, NULL, 'lâlalalaalal', '', 0, 0, 0, 0, '53576', 1668648458, 1668648458, '51770', '', 0, '', 0, 0, 0, 0, ''),
(31, 72132, 'Nhóm của nhân viên 3 - 1', '55967', '55967', '', '', NULL, NULL, 'Nhóm của nhân viên 3 - 1', '', 0, 0, 0, 0, '', 1668658521, 1668658521, '0', '', 0, '', 0, 0, 0, 0, ''),
(33, 72132, 'Nhóm thêm bạn haha', '53576', '53576', '', '', NULL, NULL, 'fa53fsa1f', '', 0, 0, 0, 0, '', 1668957782, 1668957782, '', '', 0, '', 0, 0, 0, 0, ''),
(34, 72132, 'Nhóm khám phá', '53576', '53576', '', '', NULL, NULL, 'KHông sao', '', 0, 0, 0, 0, '', 1669453451, 1669453451, '', '', 0, '', 0, 0, 0, 0, ''),
(35, 72132, 'Sửa group', '53576', '53576', '', '5699,55967,13970,25061,5711,9596,6901,8554,12320,6141', NULL, NULL, NULL, '', 1, 0, 0, 0, '', 1669459441, 1669459441, '', '', 0, '', 0, 0, 0, 0, ''),
(36, 3312, 'Nhóm phòng 7', '8296', '8296', '', '5699,13970,25061,5711,9596,8554,12320,53576,51770', NULL, '../img/group/group_image//1928401757.jpg', '', 'Nhóm này của mình, chuyên chia sẽ những kiến thức hay ', 1, 0, 0, 0, '53576', 1669608773, 1669608773, '', '', 0, 'Bạc Liêu', 0, 0, 0, 0, ''),
(51, 3312, 'nhóm của ngọc anh đỗ', '5699', '5699', '', '51770,7652,5750,5750,9798', NULL, '../img/group/group_image//1671696867.jpg', 'nhóm của những điều đáng ui', 'thông điệp 1: null\nthông điệp 2: null', 1, 0, 3, 0, '', 1671184424, 1671184424, '9798,8296', '', 0, 'Bình Thuận', 1, 0, 0, 0, '9798,9798'),
(53, 3312, 'Nhóm mời nhiều bạn', '120925', '120925', '', '', NULL, NULL, NULL, '', 0, 0, 0, 0, '8296', 1671185777, 1671185777, '8296', '', 0, '', 0, 0, 0, 0, ''),
(64, 3312, '1111', '5737', '5737', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1672624797, 1672624797, '', '', 0, '', 0, 0, 0, 0, ''),
(65, 72132, 'Nhóm Ô hô', '51770', '51770', '', '', NULL, '../img/group/group_image//576058296.png', NULL, '', 0, 0, 0, 0, '', 1672897452, 1672897452, '', '', 0, '', 0, 0, 0, 0, ''),
(70, 3312, 'Hội Phượt Hà Nội', '5713', '5713', '', '168,3714', NULL, '../img/group/group_image//621970187.jpg', NULL, '', 1, 0, 0, 0, '3714', 1672992381, 1672992381, '', '', 0, 'Hà Nội', 0, 0, 0, 0, ''),
(71, 3312, 'HỘI YÊU THÚ CƯNG', '5713', '5713', '', '168', NULL, '../img/group/group_image//624774635.jpg', NULL, '', 1, 0, 0, 0, '5713', 1673249497, 1673249497, '', '', 0, '', 0, 0, 0, 0, ''),
(72, 3312, 'Nhóm Check test', '8296', '8296', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673344282, 1673344282, '', '', 0, '', 0, 0, 0, 0, ''),
(73, 3312, 'Nhóm Check test có mời', '8296', '8296', '', '51770,5699,5635,13049', NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673344378, 1673344378, '', '', 0, '', 0, 0, 0, 0, ''),
(74, 3312, 'gsdgsdgsdg', '8296', '8296', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673346968, 1673346968, '', '', 0, '', 0, 0, 0, 0, ''),
(75, 3312, 'Nhóm Bạn 0', '8296', '8296', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673349641, 1673349641, '', '', 0, '', 0, 0, 0, 0, ''),
(76, 3312, 'Nhóm Bạn 06532', '8296', '8296', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673350478, 1673350478, '', '', 0, '', 0, 0, 0, 0, ''),
(77, 3312, 'Nhóm 1 gdhg', '8296', '8296', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673351860, 1673351860, '', '', 0, '', 0, 0, 0, 0, ''),
(78, 3312, 'Nhóm 1 gdhgg512ag23', '8296', '8296', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673352022, 1673352022, '', '', 0, '', 0, 0, 0, 0, ''),
(80, 3312, 'Nhómfafsaf', '8296', '8296', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673352278, 1673352278, '', '', 0, '', 0, 0, 0, 0, ''),
(81, 3312, 'Pằng Pằng', '8296', '8296', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673353209, 1673353209, '', '', 0, '', 0, 0, 0, 0, ''),
(82, 3312, '123', '5629', '5629', '', NULL, NULL, '../img/group/group_image//1435033712.jpg', NULL, '', 1, 0, 0, 0, '', 1673400155, 1673400155, '', '', 0, '', 0, 0, 0, 0, ''),
(83, 1664, 'Hội mẹ và bé yêu', '3714', '3714', '', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, '', 1673407661, 1673407661, '', '', 0, '', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_pin`
--

CREATE TABLE `group_pin` (
  `id` int(11) NOT NULL,
  `id_user_pin` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `group_pin`
--

INSERT INTO `group_pin` (`id`, `id_user_pin`, `id_company`, `id_group`) VALUES
(82, 53576, 72132, 34),
(99, 8296, 3312, 51),
(100, 8296, 72132, 31),
(101, 5699, 3312, 51),
(104, 51770, 72132, 65),
(107, 5713, 3312, 71),
(127, 5699, 1761, 5),
(128, 5699, 1761, 8),
(129, 5699, 1761, 10),
(130, 5699, 1761, 9),
(131, 5699, 1761, 18),
(132, 5699, 1761, 19),
(133, 8296, 3312, 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_rules`
--

CREATE TABLE `group_rules` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `title_rule` varchar(255) CHARACTER SET utf8 NOT NULL,
  `describe_rule` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type_show` int(11) NOT NULL COMMENT '0: Hiện, 1: Ẩn',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `group_rules`
--

INSERT INTO `group_rules` (`id`, `id_user`, `id_company`, `id_group`, `title_rule`, `describe_rule`, `type_show`, `create_time`, `update_time`) VALUES
(7, 53576, 72132, 26, 'Edit OK', 'Mô tả Eddit', 0, 1669431081, 1669434147),
(8, 51770, 72132, 26, 'Nhân viên khác vào chỉnh sửa', 'Chỉnh sửa ok', 0, 1669431226, 1669434392),
(10, 51770, 72132, 29, 'Quy tắc 1', 'Không được đánh nhau', 0, 1669437352, 1669448740),
(11, 51770, 72132, 29, 'Quy tắc 2 ', 'Không được ********', 0, 1669448759, 0),
(12, 51770, 72132, 28, 'Quy tắc ok', '9856a3g16g', 1, 1669602271, 0),
(24, 8296, 3312, 36, 'Quy tắc 8', 'Quy tắc 8', 0, 1673424569, 0),
(25, 8296, 3312, 36, 'Quy tắc 9', 'Quy tắc 9', 0, 1673424576, 0),
(26, 8296, 3312, 36, 'Quy tắc 10', 'Quy tắc 10', 0, 1673424585, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `internal_news`
--

CREATE TABLE `internal_news` (
  `id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `internal_news`
--

INSERT INTO `internal_news` (`id`, `id_new`, `cover_image`) VALUES
(1, 100, '25693.png'),
(2, 101, '13370.png'),
(3, 154, '19840.jpeg'),
(4, 174, '13353.png'),
(5, 176, '9268.png'),
(6, 198, '28399.png'),
(7, 382, '1276976177.png'),
(8, 419, '1186256090.jpg'),
(9, 461, '517232835.PNG'),
(10, 462, '632396203.PNG'),
(11, 463, '1836130530.PNG'),
(12, 493, '1294763488.PNG'),
(13, 494, '1875276816.PNG'),
(14, 495, ''),
(15, 496, '2024402569.PNG'),
(16, 535, '818588252.jpeg'),
(17, 543, '1457958034.jpg'),
(18, 547, '1938660560.jpeg'),
(19, 553, '625896928.png'),
(20, 554, ''),
(21, 555, ''),
(22, 556, '583254710.png'),
(23, 557, '1174451417.png'),
(24, 558, ''),
(25, 560, NULL),
(26, 596, NULL),
(27, 597, NULL),
(28, 741, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invite_to_group`
--

CREATE TABLE `invite_to_group` (
  `id_invite` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_author_group` int(11) NOT NULL,
  `id_user_invite` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type_invite` int(11) NOT NULL COMMENT '0: mời vào nhóm, 1:mời làm QTV, 2: mời làm người kiểm duyệt',
  `time_invite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='mời vào nhóm';

--
-- Đang đổ dữ liệu cho bảng `invite_to_group`
--

INSERT INTO `invite_to_group` (`id_invite`, `id_group`, `id_author_group`, `id_user_invite`, `type_invite`, `time_invite`) VALUES
(17, 36, 8296, '25061', 1, 1671173454),
(18, 36, 8296, '9596', 2, 1671173471),
(54, 36, 8296, '5664', 0, 1671794375),
(55, 36, 8296, '5683', 0, 1671794375),
(56, 36, 8296, '5646', 0, 1671794375),
(64, 36, 8296, '5635', 0, 1672623630),
(65, 64, 5737, '111795', 0, 1672624797),
(76, 70, 5713, '83953', 0, 1672992381),
(77, 70, 5713, '14234', 0, 1672992381),
(78, 70, 5713, '5629', 0, 1672992381),
(79, 70, 5713, '5651', 0, 1672992919),
(80, 70, 5713, '7652', 0, 1672992919),
(81, 70, 5713, '13353', 0, 1672992919),
(82, 70, 5713, '145', 0, 1672992919),
(86, 70, 5713, '18680', 0, 1673232076),
(87, 71, 5713, '43412', 0, 1673249497),
(88, 71, 5713, '18680', 0, 1673249497),
(89, 71, 5713, '13353', 0, 1673249497),
(91, 71, 5713, '3714', 0, 1673249591),
(93, 81, 8296, '19772', 0, 1673353209),
(94, 81, 8296, '5629', 0, 1673353209),
(95, 83, 3714, '1664', 0, 1673407661),
(96, 83, 3714, '5713', 0, 1673407661);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `knowledge`
--

CREATE TABLE `knowledge` (
  `id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_user_tag` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `description` text,
  `file` varchar(255) DEFAULT NULL,
  `name_file` varchar(255) NOT NULL,
  `user_type` tinyint(11) DEFAULT NULL,
  `delete` tinyint(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `knowledge`
--

INSERT INTO `knowledge` (`id`, `id_company`, `id_user`, `id_user_tag`, `name`, `author`, `field`, `description`, `file`, `name_file`, `user_type`, `delete`, `created_at`, `updated_at`) VALUES
(3, 1761, 1761, '', 'sdasww11111', 'dqwe', 'qưeqw', 'eqwe1111', '10247.xls', '', 1, 0, 1631672829, 1631672829),
(5, 1761, 1761, '', '1', '1', '1', '1', '1425.xls', '', 1, 0, 1631679529, 1633601269),
(6, 2498, 2498, '', 'Tài liệu 1', 'Tác giả 1', 'lĩnh vực 1', 'mô tả ngắn 1', '561230123.sql', '', 1, 0, 1634292073, 1634292073),
(7, 1636, 1636, '', 'Đây là tên tài liệu', 'Uzumaki naruto', 'Nội dung về nhẫn thuật trong ninja', 'đây là mô tả', '738235362.jpg', '', 1, 0, 1634635490, 1634635620),
(8, 1636, 1636, '', '1', 'ABC', 'nội ung', 'mô tả', '2086606002.png', '', 1, 0, 1634635519, 1634635519),
(10, 2164, 2164, '', 'zxczxc', 'zxczxc', 'zxczxc', 'zxczxc', '1282520443.jpeg', '', 1, 0, 1635298002, 1635298002),
(11, 1761, 1761, '', 'Tài liệu học tậpppppppppp', 'Ngọc', 'Nghiên cứu', 'hù òa', '2035729352.docx', '', 1, 0, 1635838419, 1635838419),
(12, 1761, 1761, '', 'Hhjnkk', 'Ftghi', 'Rygbj', 'Fygjnj', '1914931432.png', '', 1, 0, 1635998970, 1635998970),
(13, 2888, 2888, '', 'Cha giàu- cha nghèo', 'Robert Kiyosaki Sharon Lechter', 'Kinh doanh', 'Nội dung câu chuyện xoay quanh những bài học mà hai người cha dạy cho những đứa con của mình về những triết lí kinh doanh của những người giàu', '1039779812.pdf', '', 1, 0, 1636366371, 1636366371),
(14, 168, 168, '', 'tài liệu xử lý giao diện code', 'Lưu Phi', 'Kỹ thuật - công nghệ thông tin ', 'Rất hay', '1004437305.pdf', 'BIÊN BẢN HỌP TUẦN (1).pdf', 1, 0, 1636706782, 1636706782),
(15, 1664, 1664, '', 'Sách hay ', 'Lê Liêu Ninh', 'VĂN HỌC', 'sÁCH QUÝ GỐI ĐẦU GIƯỜNG', '1709111539.pdf', '1004437305.pdf', 1, 0, 1636711793, 1636711793),
(17, 2840, 2840, NULL, 'asd', 'sadas', 'sad', 'asdas', '620260160.zip', 'bcit-ci-CodeIgniter-3.1.11-0-gb73eb19.zip', 1, 0, 1640166763, 1640166763),
(18, 316, 316, NULL, 'Hương Dẫn Đối Soát Đơn Hàng', 'Phạm Văn Khải', 'Kế Toán-Vận Đơn', 'test', '768143944.pdf', 'Văn Hóa Công Ty.pdf', 1, 0, 1645108770, 1645108770),
(19, 316, 316, NULL, 'Hướng Dẫn Cách Đối Soát Lệch Cho Sales', 'Phạm Văn Khải', 'Đối Soát Đơn Sales', 'Hướng Dẫn Cách Đối Soát Lệch Cho Sales\r\nhttps://www.youtube.com/watch?v=Jh7NWEYGWd4', '503985135.wmv', 'Đối Soát Lệch 01.11 22.02.wmv', 1, 0, 1645675375, 1645675375),
(20, 1636, 1636, NULL, 'tài lioeeuj 12312312', 'duy mập', 'php', 'adasdadasdas adsasdasdc adasdasd', '224435256.xls', 'tag.xls', 1, 0, 1651137061, 1651137061);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `knowledge_answer`
--

CREATE TABLE `knowledge_answer` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_tag` varchar(255) DEFAULT NULL,
  `id_company` int(11) NOT NULL,
  `knowledge_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `name_file` text,
  `user_type` tinyint(11) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `knowledge_answer`
--

INSERT INTO `knowledge_answer` (`id`, `id_user`, `id_user_tag`, `id_company`, `knowledge_id`, `content`, `file`, `name_file`, `user_type`, `created_at`, `updated_at`) VALUES
(5, 1761, NULL, 1761, 5, 'ddadas', '20943.xls', NULL, 1, 1631762845, 1631762845),
(7, 1761, NULL, 1761, 5, 'ddadas', '20943.xls', NULL, 1, 1631762845, 1631762845),
(8, 1761, NULL, 1761, 5, 'ddadas', '20943.xls', NULL, 1, 1631762845, 1631762845),
(9, 1761, NULL, 1761, 5, 'ddadas', '20943.xls', NULL, 1, 1631762845, 1631762845),
(11, 1761, NULL, 1761, 5, 'ddadas', '20943.xls', NULL, 1, 1631762845, 1631762845),
(12, 1636, NULL, 1636, 8, 'tôi muốn hỏi về nội dung này', '371152966.jpg', NULL, 1, 1634635646, 1634635646),
(13, 1636, NULL, 1636, 9, 'đây là nội dug câu hỏi', '1271343775.docx', NULL, 1, 1634635779, 1634635779),
(17, 2498, NULL, 2498, 6, 'sdsadasd', '1022508659.png', NULL, 1, 1635475362, 1635475362),
(18, 2498, NULL, 2498, 6, 'qwwq', '186263133.png', NULL, 1, 1635475501, 1635475501),
(19, 2498, NULL, 2498, 6, 'asdasdas', '1125470466.png', NULL, 1, 1635475546, 1635475546),
(20, 2498, NULL, 2498, 6, '111111', '575112145.png', NULL, 1, 1635475592, 1635475592),
(21, 2498, NULL, 2498, 6, 'dsadsad', '1062803495.png', NULL, 1, 1635475635, 1635475635),
(22, 2498, NULL, 2498, 6, 'wqwqw', '1633138302.docx', NULL, 1, 1635475657, 1635475657),
(23, 2498, NULL, 2498, 0, 'asdas', '', NULL, 1, 1635475914, 1635475914),
(24, 2498, NULL, 2498, 0, 'Câu hỏi 1111', '', NULL, 1, 1635476475, 1635476475),
(25, 2498, NULL, 2498, 0, 'ấd', '', NULL, 1, 1635476494, 1635476494),
(26, 2498, NULL, 2498, 0, 'sads', '', NULL, 1, 1635476581, 1635476581),
(27, 2498, NULL, 2498, 0, 'adas', '', NULL, 1, 1635476587, 1635476587),
(28, 1761, NULL, 1761, 11, 'tyuiolnbvf', '870815652.docx', NULL, 1, 1635849728, 1635849728),
(29, 1761, NULL, 1761, 0, 'ÁDFG', '', NULL, 1, 1635903910, 1635903910),
(30, 1761, NULL, 1761, 11, '1234567890-', '1588676660.docx', NULL, 1, 1635904123, 1635904123),
(31, 1636, NULL, 1636, 9, 'ưqqww', '991525510.jpg', NULL, 1, 1635909019, 1635909019),
(32, 2498, NULL, 2498, 6, 'rerrrr', '1879862010.jpeg', NULL, 1, 1635915619, 1635915619),
(33, 1664, NULL, 1664, 0, 'Bạn Phương Anh là bạn nào thế ạ? IQ cao lắm đúng ko ạ?', '', NULL, 1, 1636709014, 1636709014),
(35, 2840, NULL, 2840, 17, 'asda', '620260160.zip', NULL, 1, 1640166792, 1640166792),
(36, 2840, '', 2840, 0, 'sdas', '../img/knowledge/2840/image/1069815546.jfif||../img/knowledge/2840/image/1197356230.jpg', 'tải xuống.jfif||tin-nong-ngay-2510-dung-dao-phong-lon-lua-nhau-25-nguoi-cho-an.jpg', 1, 1640167418, 1640167418);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `user_type` int(10) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='like bài viết';

--
-- Đang đổ dữ liệu cho bảng `like`
--

INSERT INTO `like` (`id`, `id_new`, `id_user`, `user_type`, `created_at`) VALUES
(5, 160, 1761, 1, 1631606808),
(6, 161, 1761, 1, 1631607107),
(11, 159, 1761, 1, 1631607833),
(12, 158, 1761, 1, 1631607851),
(13, 155, 1761, 1, 1631607858),
(14, 170, 1761, 1, 1632140165),
(18, 177, 1761, 1, 1632991326),
(20, 208, 1761, 1, 1634196409),
(21, 220, 2164, 1, 1634197611),
(23, 225, 1636, 1, 1634626826),
(24, 228, 1636, 1, 1634629675),
(26, 282, 1636, 1, 1634694345),
(28, 281, 1636, 1, 1634697906),
(29, 294, 1636, 1, 1634698084),
(30, 301, 1636, 1, 1634698222),
(31, 302, 1750, 1, 1634698232),
(32, 306, 1636, 1, 1634698783),
(36, 333, 1664, 1, 1634785590),
(38, 342, 1664, 1, 1635163322),
(39, 349, 2498, 1, 1635210824),
(41, 386, 2498, 1, 1635414376),
(42, 341, 1664, 1, 1635730897),
(43, 390, 1664, 1, 1635733575),
(48, 402, 1761, 1, 1635839865),
(50, 403, 1761, 1, 1635840340),
(54, 324, 1761, 1, 1635841312),
(55, 221, 1761, 1, 1635841315),
(56, 206, 1761, 1, 1635841319),
(57, 404, 1761, 1, 1635841578),
(70, 421, 1503, 2, 1635903555),
(71, 422, 1761, 1, 1635912584),
(72, 423, 1761, 1, 1635989955),
(73, 426, 2888, 1, 1636366168),
(74, 427, 1664, 1, 1636683443),
(75, 433, 1636, 1, 1636773174),
(76, 516, 1761, 1, 1637727837),
(77, 526, 1636, 1, 1637891813),
(78, 527, 1664, 1, 1637918804),
(79, 528, 1664, 1, 1637920764),
(80, 529, 1664, 1, 1637920960),
(81, 530, 1664, 1, 1637922969),
(82, 534, 1664, 1, 1638414231),
(83, 538, 1664, 1, 1638416390),
(85, 538, 3714, 2, 1638416487),
(86, 537, 3714, 2, 1638416825),
(88, 539, 1761, 1, 1638429283),
(101, 556, 2840, 1, 1640165415),
(104, 568, 1664, 1, 1640255152),
(105, 588, 2840, 1, 1640330136),
(106, 595, 2840, 1, 1640333148),
(108, 602, 1664, 1, 1640510225),
(109, 605, 1664, 1, 1640512450),
(110, 610, 1009, 1, 1642217816),
(111, 611, 1666, 2, 1642219402),
(112, 610, 1666, 2, 1642219406),
(115, 612, 1636, 1, 1644548055),
(116, 618, 1009, 1, 1646016512),
(118, 544, 1761, 1, 1648798258),
(120, 625, 5327, 2, 1649759126),
(126, 628, 1636, 1, 1650942527),
(127, 630, 1636, 1, 1650959850),
(128, 629, 1636, 1, 1651134397),
(129, 631, 1636, 1, 1651134429),
(130, 632, 1636, 1, 1651134433),
(132, 635, 1636, 1, 1658905161),
(134, 639, 1636, 1, 1659510971),
(136, 652, 83885, 1, 1664854102),
(137, 655, 72132, 1, 1667179215),
(140, 658, 72216, 1, 1668152776),
(141, 660, 72216, 1, 1668152977),
(142, 661, 72132, 1, 1668154542),
(144, 656, 72132, 1, 1668155266),
(156, 666, 72132, 1, 1668157914),
(158, 697, 72132, 1, 1668243009),
(159, 699, 72132, 1, 1668244138),
(160, 733, 5699, 2, 1668506653),
(161, 733, 8296, 2, 1668587184),
(163, 741, 5750, 2, 1668670928),
(166, 734, 5699, 2, 1669967988),
(167, 791, 5699, 2, 1669968082),
(168, 786, 5699, 2, 1669968248),
(174, 757, 5699, 2, 1670055715),
(177, 824, 8296, 2, 1670463875),
(178, 809, 8296, 2, 1670463877),
(179, 790, 8296, 2, 1670463880),
(180, 800, 8296, 2, 1670463885),
(182, 791, 8296, 2, 1670463892),
(183, 789, 8296, 2, 1670463894),
(185, 786, 8296, 2, 1670463903),
(186, 784, 8296, 2, 1670896666),
(187, 849, 8296, 2, 1671154758),
(189, 842, 8296, 2, 1671155593),
(190, 838, 8296, 2, 1671156015),
(191, 851, 5737, 2, 1671173382),
(194, 925, 1761, 1, 1672736878),
(196, 979, 8296, 2, 1673030025),
(201, 985, 5713, 2, 1673065908),
(204, 986, 5713, 2, 1673075480),
(211, 995, 3714, 2, 1673079242),
(212, 995, 5713, 2, 1673079761),
(214, 993, 3714, 2, 1673085820),
(215, 1000, 5713, 2, 1673226987),
(216, 998, 5713, 2, 1673231024),
(217, 996, 5713, 2, 1673231034),
(218, 1007, 5713, 2, 1673231430),
(220, 1000, 168, 2, 1673233404),
(221, 1034, 5713, 2, 1673316350),
(222, 1035, 5713, 2, 1673334068),
(223, 1034, 168, 2, 1673334257),
(224, 1048, 7652, 2, 1673347142),
(226, 1048, 3714, 2, 1673400593),
(227, 996, 3714, 2, 1673400925),
(228, 1060, 3714, 2, 1673405473),
(230, 1060, 5713, 2, 1673405705),
(232, 1057, 5713, 2, 1673407357),
(233, 1068, 5713, 2, 1673423160),
(234, 1063, 5713, 2, 1673423569),
(237, 722, 9798, 2, 1673494830);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_album`
--

CREATE TABLE `like_album` (
  `id` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `like_album`
--

INSERT INTO `like_album` (`id`, `id_album`, `user_id`, `user_type`, `created_at`) VALUES
(3, 4, 5698, 2, 0),
(8, 4, 5699, 2, 1672191461),
(12, 18, 9798, 2, 1673493602);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_comment`
--

CREATE TABLE `like_comment` (
  `id` int(11) NOT NULL,
  `id_comment` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `like_comment`
--

INSERT INTO `like_comment` (`id`, `id_comment`, `id_user`, `user_type`, `created_at`) VALUES
(1, 14, 1761, 0, 1632141561),
(4, 13, 1761, 0, 1632144279),
(5, 22, 1761, 0, 1632148967),
(8, 68, 1761, 0, 1632885976),
(10, 60, 1761, 0, 1632886097),
(12, 86, 1761, 0, 1632904604),
(15, 67, 1761, 0, 1632985557),
(16, 61, 1761, 0, 1632985927),
(20, 64, 1761, 0, 1632991321),
(21, 66, 1761, 0, 1632992116),
(22, 65, 1761, 0, 1632992145),
(27, 75, 1761, 0, 1632992248),
(30, 0, 1761, 0, 1632992589),
(34, 105, 1761, 0, 1632993759),
(35, 104, 1761, 0, 1633396653),
(36, 126, 1636, 1, 1634635848),
(37, 127, 1636, 1, 1634647577),
(38, 128, 1636, 1, 1634647579),
(39, 130, 1636, 1, 1634698324),
(40, 138, 1664, 1, 1634806321),
(41, 218, 1761, 1, 1635839077),
(42, 217, 1761, 1, 1635839080),
(43, 219, 1761, 1, 1635839083),
(44, 221, 1761, 1, 1635839892),
(45, 224, 1761, 1, 1635912592),
(46, 227, 1636, 1, 1636773184),
(47, 229, 2693, 2, 1636773306),
(48, 227, 2693, 2, 1636773308),
(53, 236, 1664, 1, 1637923022),
(55, 251, 1664, 1, 1638416800),
(56, 250, 1664, 1, 1638416806),
(57, 305, 3007, 2, 1638524232),
(59, 306, 3007, 2, 1638524243),
(60, 422, 1009, 1, 1642558986),
(61, 425, 1636, 1, 1644544186),
(62, 446, 83885, 1, 1664854554),
(63, 445, 83885, 1, 1664854555),
(64, 466, 72132, 1, 1668238125),
(66, 483, 5699, 2, 1668586118),
(67, 477, 8296, 2, 1668587154),
(68, 476, 8296, 2, 1668587165),
(69, 477, 5699, 2, 1668590601),
(73, 486, 5699, 2, 1668611613),
(74, 502, 5750, 2, 1668670923),
(75, 506, 5750, 2, 1668670925),
(76, 509, 5750, 2, 1668670949),
(77, 512, 5750, 2, 1668670976),
(78, 559, 5699, 2, 1669969828),
(79, 563, 5699, 2, 1669970260),
(80, 564, 5699, 2, 1669971459),
(82, 552, 5699, 2, 1669973378),
(83, 548, 5699, 2, 1669973513),
(84, 550, 5699, 2, 1669973550),
(85, 5, 5699, 2, 1671791012),
(86, 8, 5699, 2, 1671878585),
(87, 9, 5699, 2, 1672038490),
(88, 17, 5699, 2, 1672038597),
(89, 593, 8296, 2, 1672714217),
(90, 250, 168, 2, 1673063340),
(96, 601, 5713, 2, 1673080413),
(97, 600, 5713, 2, 1673080414),
(98, 608, 5713, 2, 1673080417),
(99, 605, 5699, 2, 1673081233),
(100, 602, 5713, 2, 1673227716),
(101, 603, 5713, 2, 1673230805),
(102, 606, 5713, 2, 1673230807),
(103, 623, 5713, 2, 1673234891),
(104, 610, 5713, 2, 1673234929),
(107, 683, 9798, 2, 1673514623);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_comment_album`
--

CREATE TABLE `like_comment_album` (
  `id` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `like_comment_album`
--

INSERT INTO `like_comment_album` (`id`, `id_comment`, `user_id`, `user_type`, `created_at`) VALUES
(1, 9, 5699, 2, 1672038583),
(2, 17, 5699, 2, 1672038690),
(7, 26, 9798, 2, 1673517541),
(9, 25, 5699, 2, 1673517698),
(10, 29, 5699, 2, 1673518857);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_comment_core`
--

CREATE TABLE `like_comment_core` (
  `id` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `like_comment_core`
--

INSERT INTO `like_comment_core` (`id`, `id_comment`, `id_user`, `user_type`, `created_at`) VALUES
(2, 33, 1761, 1, 1633515234),
(4, 34, 1761, 1, 1633515394),
(5, 30, 1761, 1, 1633515412),
(6, 37, 1761, 1, 1633515414),
(0, 34, 2498, 1, 1634269989),
(0, 35, 2498, 1, 1634270107),
(0, 64, 2498, 1, 1635498219);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_comment_knowledge`
--

CREATE TABLE `like_comment_knowledge` (
  `id` int(11) NOT NULL,
  `comment_knowledge_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(10) NOT NULL,
  `created_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `like_comment_knowledge`
--

INSERT INTO `like_comment_knowledge` (`id`, `comment_knowledge_id`, `id_user`, `user_type`, `created_at`) VALUES
(4, 61, 1761, 0, 1631869360),
(6, 76, 1761, 0, 1631934263),
(7, 77, 1761, 0, 1631935002),
(15, 88, 1761, 0, 1631936868),
(16, 111, 2498, 1, 1635479858),
(17, 120, 2498, 1, 1635503792),
(18, 122, 1761, 1, 1635905246),
(19, 120, 1761, 1, 1635906403);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_comment_target`
--

CREATE TABLE `like_comment_target` (
  `id` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `like_comment_target`
--

INSERT INTO `like_comment_target` (`id`, `id_comment`, `id_user`, `user_type`, `created_at`) VALUES
(1, 8, 1761, 1, 1633577871),
(2, 5, 1761, 1, 1633578104),
(4, 9, 1761, 1, 1633592442),
(5, 13, 1761, 1, 1633593832),
(0, 39, 2498, 1, 1635501069);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_comment_working_rules`
--

CREATE TABLE `like_comment_working_rules` (
  `id` int(10) NOT NULL,
  `id_comment` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `user_type` int(10) NOT NULL,
  `created_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `like_comment_working_rules`
--

INSERT INTO `like_comment_working_rules` (`id`, `id_comment`, `id_user`, `user_type`, `created_at`) VALUES
(3, 80, 2498, 1, 1635493551);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_core_value`
--

CREATE TABLE `like_core_value` (
  `id` int(11) NOT NULL,
  `id_core` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `like_core_value`
--

INSERT INTO `like_core_value` (`id`, `id_core`, `id_user`, `user_type`, `created_at`) VALUES
(6, 8, 1761, 1, 1633491247),
(7, 1, 1761, 1, 1633569100),
(8, 3, 1761, 1, 1633570055),
(0, 16, 2498, 1, 1634267770),
(0, 24, 1761, 1, 1635848828),
(0, 9, 1761, 1, 1635913905),
(0, 21, 1664, 1, 1638436026);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_target`
--

CREATE TABLE `like_target` (
  `id` int(11) NOT NULL,
  `id_target` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `like_target`
--

INSERT INTO `like_target` (`id`, `id_target`, `id_user`, `user_type`, `created_at`) VALUES
(6, 0, 1761, 1, 1633570396),
(10, 3, 1761, 1, 1633577867),
(0, 6, 2498, 1, 1634346816),
(0, 7, 2498, 1, 1634346995);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_working_rules`
--

CREATE TABLE `like_working_rules` (
  `id` int(10) NOT NULL,
  `id_working_rules` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `user_type` int(10) NOT NULL,
  `created_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_answer_bonus`
--

CREATE TABLE `list_answer_bonus` (
  `id` int(11) NOT NULL,
  `id_vote` int(11) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mail_from_ceo`
--

CREATE TABLE `mail_from_ceo` (
  `id` int(11) NOT NULL,
  `title_mail` varchar(255) DEFAULT NULL,
  `content` text,
  `file` varchar(255) DEFAULT NULL,
  `user_sent` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `option_notify` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL,
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mail_from_ceo`
--

INSERT INTO `mail_from_ceo` (`id`, `title_mail`, `content`, `file`, `user_sent`, `id_company`, `option_notify`, `user_type`, `delete`, `created_at`, `updated_at`) VALUES
(14, 'Thư từ CEO', 'Nội dung thư từ CEO', '1689985264.png', 2498, 2498, '1', 1, 0, 1634207057, 1634207057),
(15, 'Thư từ CEO 2', 'adasdqqqq', '1749181348.sql', 2498, 2498, '1', 1, 0, 1634207415, 1634207415),
(16, 'Thư gửi cán bộ nhân viên', 'Cố gắng lên nàooooooooooooooooooooooooooooooooo', '1429804607.xlsx', 1761, 1761, '1,2', 1, 0, 1634377724, 1634377724),
(18, 'ddaa', 'ádasd', '114843328.png', 2498, 2498, NULL, 1, 0, 1634695838, 1634695838),
(19, 'đây là tiêu đề', 'ahajjjfwkf', '535083529.docx', 1636, 1636, NULL, 1, 0, 1634696436, 1634696436),
(20, '2', 'wqq', '1771927613.png', 2498, 2498, NULL, 1, 0, 1634697222, 1634697222),
(22, 'Về việc dịch chuyển văn phòng mới', 'Dự kiến có thể ngày thứ 2 toàn công ty nghỉ để phục vụ dịch chuyển văn phòng mới. Các đ/c nắm được để bố trí công việc', '175739469.docx', 57, 57, NULL, 1, 0, 1634780816, 1634780816),
(23, 'dfd', 'fdsfds', '1037792687.png', 2498, 2498, NULL, 1, 0, 1634780863, 1634780863),
(24, 'dsad', 'ádasdasd', '1465806668.png', 2498, 2498, NULL, 1, 0, 1634780910, 1634780910),
(25, 'âsas', 'sâs', '1633108823.png', 2498, 2498, NULL, 1, 0, 1634785683, 1634785683),
(26, 'dsad', 'dasd', '954787298.png', 2498, 2498, NULL, 1, 0, 1634785854, 1634785854),
(27, 'ádsa', 'đá', '1766433491.png', 2498, 2498, NULL, 1, 0, 1634786386, 1634786386),
(28, 'asdsad', 'adas', '2085898506.png', 2498, 2498, NULL, 1, 0, 1634786534, 1634786534),
(29, 'dddddddddddddddddddddddd', 'asadasd', '1952699093.png', 2498, 2498, NULL, 1, 0, 1634786753, 1634786753),
(30, 'ewqeweee', 'sdfdfds', '1854715441.png', 2498, 2498, NULL, 1, 0, 1634786851, 1634786851),
(31, 'wqeqweeqw', 'eqweqwe', '479087851.png', 2498, 2498, NULL, 1, 0, 1634786967, 1634786967),
(32, '11', 'asdsad', '232318518.png', 2498, 2498, NULL, 1, 0, 1634787068, 1634787068),
(33, 'qqq', 'qưewqe', '1449622890.docx', 2498, 2498, NULL, 1, 0, 1635236599, 1635236599),
(34, 'vvvv', 'adadas', '1926610548.docx', 2498, 2498, NULL, 1, 0, 1635236730, 1635236730),
(35, '', '', '404328379.', 2498, 2498, NULL, 1, 0, 1635236731, 1635236731),
(36, 'qưewqewq', 'qưddsdsdad', '103884494.docx', 2498, 2498, NULL, 1, 0, 1635237290, 1635237290),
(37, 'Thông báo 11222', 'qqqqqwwe', '893137157.docx', 2498, 2498, NULL, 1, 0, 1635237322, 1635237322),
(38, 'dasdsdd', 'sadwqd', '227358647.docx', 2498, 2498, NULL, 1, 0, 1635237807, 1635237807),
(39, 'asdasdw', 'qwewqe', '1350174332.docx', 2498, 2498, NULL, 1, 0, 1635237867, 1635237867),
(40, 'asdas', 'dsadwqd', '1687391098.docx', 2498, 2498, NULL, 1, 0, 1635238117, 1635238117),
(41, 'sadas', 'dsadqwd', '1224378599.png', 2498, 2498, NULL, 1, 0, 1635325324, 1635325324),
(42, 'THƯ GỬI NHÂN VIÊN NHÂN NGÀY TẾT TRUNG THU', 'Các nhân viên thân mến của ta, từ ngay ta thành lập công ty đến nay đã vô cùng biết ơn các bạn và ta dự định sẽ tăng lương cho các bạn lên 15% nữa! cảm ơn các bạn đã cống hiến nhé!', '1469716100.pdf', 1664, 1664, NULL, 1, 0, 1635735247, 1635735247),
(43, 'đay là thư abc', 'jajajjaja', '38064819.docx', 1636, 1636, NULL, 1, 0, 1635820057, 1635820057),
(44, 'Hội tụ nhân tài', 'Thân gửi các thành viên,\nNơi đây là nơi hội tụ nhân tài của Việt nam, các bạn đã làm rất tốt!', '308975649.docx', 1761, 1761, NULL, 1, 0, 1635848077, 1635848077),
(45, 'Thư gửi học sinh', 'Các em học sinh,\n\nNgày hôm nay là ngày khai trường đầu tiên ở nước Việt Nam Dân chủ Cộng hòa. Tôi đã tưởng tượng thấy thấy trước mắt cái cảnh nhộn nhịp tưng bừng của ngày tựu trường ở khắp các nơi. Các em hết thảy đều vui vẻ vì sau mấy tháng giời nghỉ học, sau bao nhiêu cuộc chuyển biến khác thường, các em lại được gặp thầy gặp bạn. Nhưng sung sướng hơn nữa, từ giờ phút này giở đi, các em bắt đầu được nhận một nền giáo dục hoàn toàn Việt Nam. Các em được hưởng sự may mắn đó là nhờ sự hi sinh của biết bao nhiêu đồng bào các em. Vậy các em nghĩ sao?\n\nTrong năm học tới đây, các em hãy cố gắng, siêng năng học tập, ngoan ngoãn, nghe thầy, yêu bạn. Sau 80 năm giời nô lệ làm cho nước nhà bị yếu hèn, ngày nay chúng ta cần phải xây dựng lại cơ đồ mà tổ tiên đã để lại cho chúng ta, làm sao cho chúng ta theo kịp các nước khác trên hoàn cầu. Trong công cuộc kiến thiết đó, nước nhà trông mong chờ đợi ở các em rất nhiều. Non sông Việt Nam có trở nên tươi đẹp hay không, dân tộc Việt Nam có bước tới đài vinh quang để sánh vai với các cường quốc năm châu được hay không, chính là nhờ một phần lớn ở công học tập của các em. Ngày hôm nay, nhân buổi tựu trường của các em, tôi chỉ biết chúc các em một năm đầy vui vẻ và đầy kết quả tốt đẹp.\n\nChào các em thân yêu.\n\nHồ Chí Minh', '1116981274.jpg', 1761, 1761, NULL, 1, 0, 1635907638, 1635907638),
(46, 'THƯ GỬI NĂM MỚI ĐẾN TOÀN BỘ CÁC THÀNH VIÊN TRONG CÔNG TY', 'NHÂN DỊP NĂM MỚI CHÚC TẤT CẢ CÁC THÀNH VIÊN TRONG CÔNG TY SỨC KHỎE, NHIỀU MAY MẮN', '1831273214.jpeg', 1664, 1664, NULL, 1, 0, 1638418310, 1638418310),
(47, 'AHIEU2022a', 'nguyen chu hieu', '1750379508.doc', 2185, 2185, NULL, 1, 0, 1644816235, 1644816235),
(48, 'Văn Hóa Doanh Nghiệp', 'Hương Đình', '356642468.pdf', 316, 316, NULL, 1, 0, 1645108712, 1645108712),
(49, 'duy test văn hóa doanh nghiệp', '123123 123123 duy test chút để kiểm tra', '1035897297.xls', 1636, 1636, NULL, 1, 0, 1651135982, 1651135982),
(50, 'abc', 'abc', '1566134665.docx', 1636, 1636, NULL, 1, 0, 1659489590, 1659489590),
(51, 'CHÚC MỪNG CHIẾN BINH- XKLD SINGAPORE', 'CHÚC MỪNG CHIẾN BINH : CHÂU T.Thanh thủy, ', '530630503.JPG', 92061, 92061, NULL, 1, 0, 1667800400, 1667800400),
(52, 'QUY ĐỊNH HOẠT ĐỘNG CHI NHÁNH -VẠN PHÚC CITY ', '\r\n        ????  Hiện tại tình hình thị trường đang khó khăn và tết nguyên đán 2023 đang tới rất gần. Vượt qua những khó khăn chung của cả nước và thị trường XKLD& DU HỌC nói riêng cuối năm 2022 hiện nay, Công ty chúng ta  vẫn rất tự hào là 1 trong những công ty tháng nào cũng có hồ sơ ứng viên tham gia đơn và đậu đơn đi XKLĐ &du học các nước: Cananda, Đức, Úc, Singapore....\r\n     ????    Nhằm mục đích hỗ trợ, gắn kết, đẩy mạnh tinh thần tìm kiếm khách hàng tiềm năng trong giai đoạn khó khăn hiện nay cho toàn thể NVKD . Văn phòng  đặt ra một số quy định sau:\r\n\r\n          1️⃣  Thứ 2 hàng tuần là buổi họp đầu tuần và trao đổi các đơn hàng cũng như các hồ sơ tham gia đơn tuyển còn tồn động, keyword , kinh nghiệm chốt khách... và những vấn đề khác . Nên YÊU CẦU LÀ 100% NVKD CHÍNH THỨC THAM GIA BUỔI HỌP ĐẦY ĐỦ và ĐÚNG GIỜ ( Ngoại lệ: Tiếp khách, bận việc có lý do chính đáng).  \r\n           2️⃣  Công ty tính full lương dựa trên app chấm công - 20 ngày/tháng. Nhân viên đi làm  không chấm công bấm thẻ xem như ngày đó không được tính công dù bất cứ lý do gì（Lưu ý）\r\n\r\n???? ???? ????  Để tạo sinh khí tốt và động lực cho toàn bộ NVKD cũng như mong muốn của BLĐ là toàn bộ NVKD ai cũng bán được hàng và cũng nhau vượt qua thời điểm khó khăn này và đặc biệt đón cái Tết 2023 nhiều  ???? ???? ???? . Cố gắng, đoàn kết và quyết tâm???? ???? để thành công.\r\n', '2024308544.docx', 92061, 92061, NULL, 1, 0, 1667801864, 1667801864),
(53, 's', 's', '262128423.mp4', 72132, 72132, NULL, 1, 0, 1671594174, 1671594174);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members_report_posts`
--

CREATE TABLE `members_report_posts` (
  `id_report` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `member_report` int(11) NOT NULL,
  `messages` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time_report` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='báo cáo bài viết nhóm';

--
-- Đang đổ dữ liệu cho bảng `members_report_posts`
--

INSERT INTO `members_report_posts` (`id_report`, `id_post`, `id_group`, `member_report`, `messages`, `time_report`) VALUES
(50, 942, 36, 8296, 'Vi phạm quy tắc nhóm,Quy tắc 2', 1672848818),
(51, 942, 36, 8296, 'Tin giả', 1672848829),
(52, 942, 36, 8296, 'Ảnh khỏa thân hoặc hành động tình dục,Gợi dục', 1672848843),
(53, 942, 36, 8296, 'Vấn đề khác', 1672851641);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_question`
--

CREATE TABLE `member_question` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `question_type` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_checkbox` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_radio` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='câu hỏi vào nhóm';

--
-- Đang đổ dữ liệu cho bảng `member_question`
--

INSERT INTO `member_question` (`id`, `id_user`, `id_company`, `id_group`, `question_type`, `title`, `name_checkbox`, `name_radio`, `created_at`, `updated_at`) VALUES
(19, 53576, 72132, 33, 2, 'Câu hỏi mới', 'Câu1,Câu1,Câu1', '', 1669278775, 1669278775),
(21, 53576, 72132, 33, 2, 'Check No check', 'ehem', 'OK radio', 1669284221, 1669285262),
(22, 53576, 72132, 33, 3, 'Test Radio', '', 'Test Radio 1,Test Radio 2', 1669284229, 1669285191),
(23, 53576, 72132, 33, 3, 'OK', '', '123,321', 1669284243, 1669285170),
(25, 51770, 72132, 28, 2, 'Bạn có phải gay ko', 'Có ,Yes', '', 1669339708, 1669339708),
(26, 51770, 72132, 28, 3, 'Bạn là gay đúng ko', '', 'Yes,Đúng', 1669339731, 1669339738),
(27, 51770, 72132, 28, 1, 'Bạn thích gay ko', '', '', 1669347912, 1669347912),
(29, 53576, 72132, 26, 2, 'OK1', '1A,2A,3A', '', 1669371477, 1669371477),
(30, 53576, 72132, 26, 2, 'OK2', '1B,2B,3B', '', 1669371515, 1669371515),
(31, 53576, 72132, 26, 1, 'Dù má', '', '', 1669371528, 1669371528),
(33, 51770, 72132, 29, 1, 'Câu test', '', '', 1669448889, 1669448889),
(39, 5737, 3312, 64, 1, 'ai là người ngu nhất HHP', '', '', 1672625653, 1672625653),
(40, 5737, 3312, 64, 2, 'ggxggxxgxgxg', 'gggg,ds,ẬHJK', '', 1672625790, 1672625790),
(41, 8296, 3312, 36, 1, 'Câu hỏi đây', '', '', 1672625848, 1672821618),
(43, 8296, 3312, 36, 2, 'Câu hỏi 2', 'Hỏi 1,Hỏi 2,Hỏi 3,Hỏi 4', '', 1672820897, 1672821689),
(44, 8296, 3312, 36, 3, 'dàgshdj', '', '1,2', 1672941580, 1672941580),
(45, 51770, 72132, 65, 2, 'Checkbox', 'Check 1,Check 2', '', 1672945553, 1672946041),
(46, 51770, 72132, 65, 3, 'Radio', '', 'radio 1,radio 2', 1672945562, 1672946060),
(47, 51770, 72132, 65, 1, 'Tự do 1', '', '', 1672945988, 1672945988),
(48, 51770, 72132, 65, 1, 'Tự do 2', '', '', 1672945994, 1672945994),
(49, 5713, 3312, 70, 1, 'Bạn có đam mê phượt Mô tô không?', '', '', 1673084405, 1673084405),
(50, 5713, 3312, 70, 1, 'Bạn đã đi ăn chơi hết Hà Nội chưa?', '', '', 1673084492, 1673084492);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_request_join`
--

CREATE TABLE `member_request_join` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `type_join` tinyint(1) NOT NULL COMMENT '0: Chờ duyệt, 1: Chấp nhận, 2:Từ chối',
  `refuse_message` varchar(255) CHARACTER SET utf8 NOT NULL,
  `refuse_forbid` tinyint(1) NOT NULL COMMENT 'Từ chối và cấm - 1: Cấm',
  `request_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='yêu cầu vào nhóm';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `module_url` varchar(255) DEFAULT NULL,
  `url_icon` text,
  `is_admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `module`
--

INSERT INTO `module` (`id`, `module_name`, `module_url`, `url_icon`, `is_admin`) VALUES
(1, 'Trang chủ', '/quan-ly-chung.html', '<path class="nen" d="M28.6819 12.7868L15.7067 0.963982C15.1362 0.444298 14.2776 0.444298 13.7071 0.963982L0.7319 12.7868C0.274353 13.2048 0.127485 13.8431 0.347786 14.4193C0.568087 14.9955 1.11601 15.3683 1.73173 15.3683H3.80481V27.2137C3.80481 27.6826 4.18328 28.0667 4.65777 28.0667H11.7695C12.2384 28.0667 12.6225 27.6882 12.6225 27.2137V20.0229H16.8026V27.2137C16.8026 27.6826 17.181 28.0667 17.6555 28.0667H24.7616C25.2305 28.0667 25.6146 27.6882 25.6146 27.2137V15.3683H27.6877C28.3034 15.3683 28.8457 14.9955 29.0716 14.4193C29.2863 13.8431 29.1394 13.2048 28.6819 12.7868Z" fill="white"/>', 0),
(2, 'Truyền thông nội bộ', '/truyen-thong-noi-bo-cong-ty.html', '<path class="boc" d="M25.5988 0.192139H3.81705C1.84859 0.192139 0.24707 1.79365 0.24707 3.76212V22.8212C0.24707 24.4978 1.40904 25.9073 2.96974 26.2886C8.29459 26.4514 6.77854 26.3921 8.29459 26.3912C9.09018 26.3907 8.72023 26.1765 8.72023 26.1765C8.72023 26.1765 7.50575 26.12 7.84467 26.3912H8.29459H21.1211C26.4009 26.3742 24.9775 26.2888 26.4459 26.2888C27.1575 26.2888 25.8078 24.8208 25.8078 24.8208C25.8078 24.8208 24.565 25.6467 26.4459 26.2888C28.0066 25.9073 29.1686 24.4978 29.1686 22.8212V3.76212C29.1688 1.79365 27.5673 0.192139 25.5988 0.192139ZM25.5386 20.5522C25.5386 21.77 24.5476 22.7608 23.3298 22.7608H6.99361C5.77559 22.7608 4.78485 21.77 4.78485 20.5522V19.1305H3.81705C3.34904 19.1305 2.96974 18.7512 2.96974 18.2832C2.96974 17.8152 3.34904 17.4359 3.81705 17.4359H4.78485V9.14721H3.81705C3.34904 9.14721 2.96974 8.76791 2.96974 8.2999C2.96974 7.83211 3.34904 7.45258 3.81705 7.45258H4.78485V6.03112C4.78485 4.8131 5.77559 3.82236 6.99361 3.82236H23.3298C24.5476 3.82236 25.5386 4.8131 25.5386 6.03112V20.5522Z" fill="white"/>\n                  <rect class="boc" x="2.47168" y="2.41626" width="25.5844" height="22.2473" fill="white"/>\n                  <path class="fill_white" d="M14.7084 20.2151C18.3944 20.2151 21.3826 17.2269 21.3826 13.5409C21.3826 9.85484 18.3944 6.8667 14.7084 6.8667C11.0223 6.8667 8.03418 9.85484 8.03418 13.5409C8.03418 17.2269 11.0223 20.2151 14.7084 20.2151Z" stroke="#4C5BD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>\n                  <path d="M12.0396 13.5404C12.0396 17.2265 13.2348 20.2146 14.7092 20.2146C16.1837 20.2146 17.3789 17.2265 17.3789 13.5404C17.3789 9.85435 16.1837 6.86621 14.7092 6.86621C13.2348 6.86621 12.0396 9.85435 12.0396 13.5404Z" stroke="#4C5BD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>\n                  <path d="M8.03418 13.54H21.3826" stroke="#4C5BD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>', 0),
(3, 'Văn hóa doanh nghiệp', '/vhdn-thu-tu-seo.html', '<path class="nen" d="M17.9472 13.5858C17.7816 13.7515 17.5645 13.8343 17.3474 13.8343C17.1306 13.8343 16.9135 13.7515 16.7479 13.5858C16.4169 13.2548 16.4169 12.7178 16.7479 12.3868L19.2886 9.84611C18.7242 9.4959 18.0591 9.29297 17.3474 9.29297C15.3111 9.29297 13.6543 10.95 13.6543 12.9863C13.6543 15.0227 15.3111 16.6795 17.3474 16.6795C19.384 16.6795 21.0406 15.0227 21.0406 12.9863C21.0406 12.2746 20.8379 11.6098 20.4877 11.0454L17.9472 13.5858Z" fill="white"/>\n                  <path class="nen" d="M25.6339 0.474609H3.83625C1.86635 0.474609 0.263672 2.07729 0.263672 4.04719V23.1201C0.263672 24.7979 1.42649 26.2085 2.98832 26.59C8.31704 26.753 6.79989 26.6936 8.31704 26.6927C9.11322 26.6923 8.743 26.4779 8.743 26.4779C8.743 26.4779 7.52763 26.4213 7.8668 26.6927H8.31704H21.1528C26.4365 26.6757 25.012 26.5903 26.4816 26.5903C27.1937 26.5903 25.843 25.1212 25.843 25.1212C25.843 25.1212 24.5993 25.9477 26.4816 26.5903C28.0434 26.2085 29.2062 24.7979 29.2062 23.1201V4.04719C29.2064 2.07729 27.6038 0.474609 25.6339 0.474609ZM25.5736 20.8495C25.5736 22.0682 24.5819 23.0596 23.3632 23.0596H7.01511C5.79621 23.0596 4.80475 22.0682 4.80475 20.8495V19.4268H3.83625C3.3679 19.4268 2.98832 19.0472 2.98832 18.5789C2.98832 18.1105 3.3679 17.7309 3.83625 17.7309H4.80475V9.4362H3.83625C3.3679 9.4362 2.98832 9.05661 2.98832 8.58826C2.98832 8.12013 3.3679 7.74033 3.83625 7.74033H4.80475V6.31784C4.80475 5.09893 5.79621 4.10747 7.01511 4.10747H23.3632C24.5819 4.10747 25.5736 5.09893 25.5736 6.31784V20.8495Z" fill="white"/>\n                  <path class="nen" d="M23.2493 5.6748H6.90122C6.61747 5.6748 6.38672 5.90578 6.38672 6.18931V7.61202H7.35522C7.82357 7.61202 8.20315 7.9916 8.20315 8.45995C8.20315 8.92808 7.82357 9.30789 7.35522 9.30789H6.38672V17.6024H7.35522C7.82357 17.6024 8.20315 17.9822 8.20315 18.4503C8.20315 18.9187 7.82357 19.2983 7.35522 19.2983H6.38672V20.721C6.38672 21.0047 6.61747 21.2355 6.90122 21.2355H23.2493C23.5331 21.2355 23.7638 21.0045 23.7638 20.721V6.18931C23.7638 5.90556 23.5331 5.6748 23.2493 5.6748ZM17.3458 18.39C14.3743 18.39 11.9568 15.9725 11.9568 13.001C11.9568 10.0295 14.3743 7.61202 17.3458 7.61202C18.8147 7.61202 20.1477 8.2027 21.1207 9.15906C21.1326 9.16966 21.1447 9.17959 21.156 9.19085C21.1672 9.20212 21.1774 9.21426 21.1878 9.22618C22.1441 10.1991 22.735 11.5324 22.735 13.001C22.7348 15.9725 20.3173 18.39 17.3458 18.39Z" fill="white"/>', 0),
(4, 'Quản trị tri thức', '/quan-tri-tri-thuc-wiki.html', '<path class="boc" d="M27.9181 4.7588C27.1119 4.24965 26.0391 3.96907 24.8984 3.96907H4.32436C3.94919 3.96907 3.60942 3.87309 3.36379 3.71774C3.11745 3.56283 2.96526 3.34854 2.96526 3.11194C2.96526 2.63873 3.57403 2.2548 4.32436 2.2548H26.3534C27.1048 2.2548 27.7125 1.87087 27.7125 1.39766C27.7125 0.924453 27.1048 0.540527 26.3534 0.540527H4.51725C3.37653 0.540527 2.30377 0.821106 1.49928 1.32914C0.691962 1.83762 0.24707 2.51417 0.24707 3.23359V25.2678C0.24707 25.7415 0.855832 26.1249 1.60617 26.1249H24.8984C26.0391 26.1249 27.1119 25.8448 27.9174 25.3363C28.7237 24.8279 29.1686 24.1517 29.1686 23.4319V6.66213C29.1686 5.94272 28.7237 5.26616 27.9181 4.7588ZM20.4343 17.0049C20.4343 17.725 19.9894 18.4016 19.182 18.9096C18.3776 19.4181 17.3048 19.6986 16.1641 19.6986H16.0671V20.6774C16.0671 21.1506 15.458 21.5346 14.708 21.5346C13.9577 21.5346 13.3489 21.1506 13.3489 20.6774V19.6986H10.3405C9.59051 19.6986 8.98139 19.3147 8.98139 18.8415C8.98139 18.3679 9.59051 17.9844 10.3405 17.9844H10.4375V12.3536H10.3405C9.59051 12.3536 8.98139 11.9701 8.98139 11.4965C8.98139 11.0233 9.59051 10.6393 10.3405 10.6393H13.3489V9.66055C13.3489 9.18734 13.9577 8.80341 14.708 8.80341C15.458 8.80341 16.0671 9.18734 16.0671 9.66055V10.6393H16.1641C17.3048 10.6393 18.3776 10.9199 19.1838 11.4291C19.9894 11.9364 20.4343 12.613 20.4343 13.3331C20.4343 14.0415 19.9975 14.6877 19.2854 15.169C19.9975 15.6502 20.4343 16.2964 20.4343 17.0049Z" fill="white"/>\n                  <rect class="boc" x="5.80957" y="8.32715" width="17.7979" height="15.5731" fill="white"/>\n                  <path class="fill_white" d="M12.7219 21.5167H15.5823H12.7219ZM9.14649 12.2205C9.14649 10.8929 9.67386 9.6197 10.6126 8.68096C11.5513 7.74222 12.8246 7.21484 14.1521 7.21484C15.4797 7.21484 16.7529 7.74222 17.6917 8.68096C18.6304 9.6197 19.1578 10.8929 19.1578 12.2205C19.1582 13.0264 18.9633 13.8205 18.5897 14.5346C18.2161 15.2488 17.6749 15.8617 17.0125 16.3208L16.6249 18.1558C16.5736 18.494 16.4028 18.8026 16.1434 19.0256C15.884 19.2487 15.5533 19.3713 15.2112 19.3714H13.0931C12.751 19.3713 12.4203 19.2487 12.1609 19.0256C11.9015 18.8026 11.7307 18.494 11.6793 18.1558L11.2918 16.3287C10.6292 15.8679 10.088 15.2536 9.71438 14.5382C9.3408 13.8228 9.14595 13.0276 9.14649 12.2205V12.2205Z" stroke="#4C5BD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>\n                  <path d="M11.292 15.3979H17.0127" stroke="#4C5BD4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>', 0),
(5, 'Quản lí cuộc họp', '#', '<path d="M28.431 8.34958C28.8574 8.34958 29.2062 8.07954 29.2062 7.74951V5.74927C29.2062 5.41923 28.8574 5.1492 28.431 5.1492H27.1389V2.74892C27.1389 1.42376 25.7499 0.348633 24.0379 0.348633H3.36466C1.65266 0.348633 0.263672 1.42376 0.263672 2.74892V23.5514C0.263672 24.8765 1.65266 25.9517 3.36466 25.9517H24.0379C25.7499 25.9517 27.1389 24.8765 27.1389 23.5514V21.1511H28.431C28.8574 21.1511 29.2062 20.8811 29.2062 20.551V18.5508C29.2062 18.2207 28.8574 17.9507 28.431 17.9507H27.1389V14.7503H28.431C28.8574 14.7503 29.2062 14.4803 29.2062 14.1503V12.15C29.2062 11.82 28.8574 11.55 28.431 11.55H27.1389V8.34958H28.431ZM13.7013 6.74939C15.9818 6.74939 17.8359 8.18456 17.8359 9.94976C17.8359 11.715 15.9818 13.1501 13.7013 13.1501C11.4208 13.1501 9.56663 11.715 9.56663 9.94976C9.56663 8.18456 11.4208 6.74939 13.7013 6.74939ZM20.9369 18.5908C20.9369 19.1208 20.2909 19.5509 19.4898 19.5509H7.91277C7.11168 19.5509 6.46564 19.1208 6.46564 18.5908V17.6307C6.46564 16.0405 8.41022 14.7503 10.807 14.7503H11.13C11.9247 15.0054 12.7904 15.1504 13.7013 15.1504C14.6122 15.1504 15.4843 15.0054 16.2725 14.7503H16.5955C18.9923 14.7503 20.9369 16.0405 20.9369 17.6307V18.5908Z" fill="white"/>\n                  <rect x="4.7168" y="1.46191" width="16.6976" height="22.2635" fill="white"/>\n                  <path d="M21.1888 14.3439C20.8235 14.1226 20.4015 14.0128 19.9747 14.0281C19.5479 14.0434 19.1349 14.1831 18.7864 14.4299C18.7181 14.4789 18.6372 14.5072 18.5533 14.5115C18.4694 14.5158 18.386 14.4959 18.3131 14.4542L16.1363 13.1982C16.1281 13.1933 16.1213 13.1863 16.1166 13.178C16.1119 13.1696 16.1094 13.1602 16.1094 13.1507C16.1094 13.1411 16.1119 13.1317 16.1166 13.1234C16.1213 13.1151 16.1281 13.1081 16.1363 13.1031L18.3013 11.8541C18.3746 11.812 18.4584 11.792 18.5427 11.7965C18.627 11.8009 18.7082 11.8296 18.7767 11.8791C19.1247 12.1287 19.5382 12.2708 19.9662 12.288C20.3941 12.3051 20.8177 12.1965 21.1846 11.9755C21.6626 11.6804 22.0108 11.2149 22.1587 10.6729C22.3065 10.131 22.2431 9.55312 21.9812 9.05614C21.7416 8.61311 21.3566 8.26617 20.8911 8.07371C20.4256 7.88125 19.908 7.85503 19.4254 7.99945C18.9429 8.14388 18.5248 8.45014 18.2416 8.86668C17.9584 9.28322 17.8273 9.78462 17.8704 10.2865C17.8782 10.3699 17.8621 10.4537 17.8239 10.5282C17.7856 10.6028 17.7269 10.6648 17.6546 10.707L15.4784 11.9637C15.4701 11.9682 15.4607 11.9705 15.4513 11.9704C15.4418 11.9703 15.4325 11.9677 15.4243 11.963C15.4161 11.9582 15.4092 11.9515 15.4044 11.9434C15.3995 11.9352 15.3968 11.926 15.3965 11.9165V9.40311C15.3969 9.31907 15.4215 9.23691 15.4672 9.16641C15.513 9.09592 15.5781 9.04006 15.6547 9.00549C16.1087 8.7966 16.4776 8.4388 16.7004 7.99144C16.9231 7.54407 16.9863 7.03401 16.8794 6.54582C16.7725 6.05764 16.5019 5.62067 16.1125 5.30736C15.7232 4.99406 15.2384 4.82324 14.7387 4.82324C14.2389 4.82324 13.7542 4.99406 13.3648 5.30736C12.9755 5.62067 12.7049 6.05764 12.598 6.54582C12.4911 7.03401 12.5542 7.54407 12.777 7.99144C12.9997 8.4388 13.3687 8.7966 13.8227 9.00549C13.8994 9.03996 13.9646 9.09578 14.0105 9.16628C14.0564 9.23678 14.0811 9.31899 14.0815 9.40311V11.9165C14.0813 11.9261 14.0786 11.9354 14.0737 11.9437C14.0688 11.9519 14.0619 11.9587 14.0536 11.9634C14.0453 11.9682 14.0359 11.9707 14.0263 11.9708C14.0167 11.9708 14.0073 11.9684 13.999 11.9637L11.8235 10.7077C11.7512 10.6656 11.6925 10.6037 11.6543 10.5293C11.616 10.4549 11.5999 10.3711 11.6077 10.2879C11.6508 9.79018 11.5226 9.29268 11.2442 8.87787C10.9658 8.46307 10.554 8.15586 10.0771 8.0072C9.60014 7.85853 9.08673 7.87733 8.62195 8.06048C8.15717 8.24363 7.76895 8.58012 7.52165 9.01418C7.27434 9.44824 7.18282 9.95378 7.26224 10.447C7.34167 10.9402 7.58728 11.3914 7.95834 11.7259C8.32941 12.0604 8.80364 12.258 9.30242 12.286C9.8012 12.314 10.2946 12.1706 10.7007 11.8797C10.7692 11.8298 10.8506 11.8008 10.9352 11.7961C11.0198 11.7915 11.1039 11.8113 11.1774 11.8534L13.3425 13.1025C13.3507 13.1074 13.3575 13.1144 13.3622 13.1227C13.3669 13.131 13.3693 13.1404 13.3693 13.15C13.3693 13.1596 13.3669 13.169 13.3622 13.1773C13.3575 13.1856 13.3507 13.1926 13.3425 13.1975L11.1642 14.4549C11.0912 14.4968 11.0077 14.5167 10.9237 14.5124C10.8397 14.5081 10.7586 14.4797 10.6903 14.4306C10.3419 14.1839 9.92896 14.0443 9.5023 14.029C9.07563 14.0137 8.65379 14.1234 8.2886 14.3446C7.81206 14.6401 7.46525 15.1053 7.31807 15.6464C7.17088 16.1875 7.23426 16.7643 7.49544 17.2605C7.73577 17.7045 8.12201 18.052 8.58891 18.2442C9.05581 18.4364 9.57474 18.4615 10.058 18.3153C10.5413 18.1691 10.9593 17.8606 11.2414 17.4418C11.5235 17.0231 11.6524 16.5198 11.6063 16.017C11.5978 15.9332 11.6136 15.8488 11.6517 15.7737C11.6899 15.6987 11.7488 15.6362 11.8214 15.5937L13.9983 14.3376C14.0066 14.333 14.016 14.3306 14.0256 14.3306C14.0352 14.3306 14.0446 14.3332 14.0529 14.3379C14.0612 14.3427 14.0681 14.3495 14.073 14.3577C14.0779 14.3659 14.0806 14.3753 14.0808 14.3848V16.8976C14.0804 16.9816 14.0559 17.0638 14.0101 17.1343C13.9644 17.2047 13.8993 17.2606 13.8227 17.2952C13.3687 17.5041 12.9997 17.8619 12.777 18.3092C12.5542 18.7566 12.4911 19.2667 12.598 19.7548C12.7049 20.243 12.9755 20.68 13.3648 20.9933C13.7542 21.3066 14.2389 21.4774 14.7387 21.4774C15.2384 21.4774 15.7232 21.3066 16.1125 20.9933C16.5019 20.68 16.7725 20.243 16.8794 19.7548C16.9863 19.2667 16.9231 18.7566 16.7004 18.3092C16.4776 17.8619 16.1087 17.5041 15.6547 17.2952C15.578 17.2606 15.5128 17.2048 15.467 17.1343C15.4211 17.0638 15.3964 16.9817 15.3958 16.8976V14.3848C15.396 14.3753 15.3986 14.366 15.4034 14.3578C15.4082 14.3495 15.4151 14.3427 15.4233 14.3379C15.4315 14.3331 15.4409 14.3305 15.4504 14.3303C15.4599 14.3301 15.4693 14.3324 15.4777 14.337L17.6546 15.5944C17.7272 15.6367 17.7861 15.6991 17.8243 15.774C17.8624 15.849 17.8782 15.9333 17.8697 16.017C17.8236 16.5198 17.9525 17.0231 18.2346 17.4418C18.5167 17.8606 18.9347 18.1691 19.418 18.3153C19.9012 18.4615 20.4202 18.4364 20.8871 18.2442C21.354 18.052 21.7402 17.7045 21.9805 17.2605C22.242 16.7644 22.3058 16.1875 22.1588 15.6463C22.0119 15.1051 21.6652 14.6397 21.1888 14.3439Z" fill="#4C5BD4"/>', 0),
(6, 'Dữ liệu đã xóa gần đây', '/quan-ly-du-lieu-da-xoa.html', '<path class="boc" d="M2.1084 26.2584C2.1084 28.0359 3.81254 29.4744 5.91817 29.4744H21.1483C23.254 29.4744 24.9581 28.0359 24.9581 26.2584V6.97754H2.11732V26.2584H2.1084Z" fill="white"/>\n                  <path class="boc" d="M20.1947 2.15697L18.2943 0.552734H8.77428L6.87386 2.15697H0.208984V5.37296H26.8596V2.15697H20.1947Z" fill="white"/>\n                  <line class="stroke_white" x1="6.76172" y1="12.7881" x2="6.76172" y2="21.687" stroke="#4C5BD4" stroke-width="2"/>\n                  <line class="stroke_white" x1="13.4229" y1="12.7881" x2="13.4229" y2="21.687" stroke="#4C5BD4" stroke-width="2"/>\n                  <line class="stroke_white" x1="20.0859" y1="12.7881" x2="20.0859" y2="21.687" stroke="#4C5BD4" stroke-width="2"/>', 0),
(7, 'Cài đặt', '/cai-dat-ql-nv.html', '<g clip-path="url(#clip0)">\r\n                <path class="boc" d="M13.005 9.46009C12.0877 9.46009 11.2286 9.79717 10.5782 10.4132C9.93085 11.0293 9.5719 11.8429 9.5719 12.7118C9.5719 13.5806 9.93085 14.3943 10.5782 15.0103C11.2286 15.6235 12.0877 15.9634 13.005 15.9634C13.9223 15.9634 14.7814 15.6235 15.4318 15.0103C16.0791 14.3943 16.4381 13.5806 16.4381 12.7118C16.4381 11.8429 16.0791 11.0293 15.4318 10.4132C15.1141 10.11 14.736 9.86961 14.3194 9.70599C13.9028 9.54237 13.456 9.45878 13.005 9.46009ZM25.6544 16.3034L23.6479 14.679C23.743 14.1269 23.7921 13.5632 23.7921 13.0024C23.7921 12.4415 23.743 11.8749 23.6479 11.3257L25.6544 9.70128C25.8059 9.57838 25.9144 9.41469 25.9654 9.23197C26.0164 9.04926 26.0074 8.85618 25.9397 8.67841L25.9121 8.60285C25.3599 7.1403 24.5325 5.7846 23.4699 4.60146L23.4147 4.54044C23.2857 4.39675 23.1137 4.29345 22.9215 4.24417C22.7293 4.19489 22.5258 4.20194 22.3379 4.26438L19.8466 5.10418C18.9262 4.38933 17.9015 3.82559 16.7909 3.4333L16.3092 0.966205C16.2729 0.780351 16.1777 0.60937 16.0363 0.475977C15.8949 0.342583 15.714 0.253093 15.5177 0.219394L15.4348 0.204864C13.8395 -0.0682881 12.1582 -0.0682881 10.5629 0.204864L10.48 0.219394C10.2837 0.253093 10.1028 0.342583 9.96139 0.475977C9.82001 0.60937 9.72482 0.780351 9.68848 0.966205L9.20374 3.44492C8.10364 3.84034 7.07882 4.40271 6.16948 5.10999L3.65985 4.26438C3.47199 4.20144 3.26835 4.19414 3.076 4.24345C2.88365 4.29276 2.71169 4.39635 2.58299 4.54044L2.52776 4.60146C1.46713 5.78587 0.639931 7.14122 0.0856313 8.60285L0.0580193 8.67841C-0.0800409 9.04164 0.0334753 9.44847 0.343344 9.70128L2.37436 11.3431C2.27925 11.8894 2.23323 12.4473 2.23323 12.9994C2.23323 13.5574 2.27925 14.1153 2.37436 14.6558L0.34948 16.2976C0.197907 16.4205 0.0894247 16.5842 0.0384576 16.7669C-0.0125095 16.9496 -0.00354649 17.1427 0.0641552 17.3205L0.0917672 17.396C0.647076 18.8577 1.46623 20.2089 2.5339 21.3974L2.58912 21.4585C2.71814 21.6022 2.8901 21.7054 3.08234 21.7547C3.27458 21.804 3.47807 21.797 3.66599 21.7345L6.17562 20.8889C7.08988 21.6009 8.10846 22.1646 9.20987 22.554L9.69462 25.0327C9.73096 25.2185 9.82614 25.3895 9.96753 25.5229C10.1089 25.6563 10.2898 25.7458 10.4862 25.7795L10.569 25.794C12.1801 26.0687 13.8299 26.0687 15.441 25.794L15.5238 25.7795C15.7202 25.7458 15.9011 25.6563 16.0425 25.5229C16.1838 25.3895 16.279 25.2185 16.3154 25.0327L16.797 22.5656C17.9077 22.1704 18.9324 21.6096 19.8528 20.8947L22.344 21.7345C22.5319 21.7975 22.7355 21.8048 22.9278 21.7554C23.1202 21.7061 23.2922 21.6026 23.4209 21.4585L23.4761 21.3974C24.5437 20.2031 25.3629 18.8577 25.9182 17.396L25.9458 17.3205C26.0777 16.9602 25.9642 16.5562 25.6544 16.3034ZM13.005 17.8203C10.026 17.8203 7.61144 15.5334 7.61144 12.7118C7.61144 9.89016 10.026 7.60323 13.005 7.60323C15.984 7.60323 18.3985 9.89016 18.3985 12.7118C18.3985 15.5334 15.984 17.8203 13.005 17.8203Z" fill="white" />\r\n              </g>\r\n              <defs>\r\n                <clipPath id="clip0">\r\n                  <rect width="26" height="26" fill="white" />\r\n                </clipPath>\r\n              </defs>', 0),
(8, 'Chuyển đổi số', 'https://quanlychung.timviec365.vn/quan-ly-ung-dung-cong-ty.html', '<g clip-path="url(#clip0_5141:85136)">\n                <path d="M19.8908 15.425L17.5239 14.9683C17.3031 15.6767 16.8737 16.3067 16.2886 16.7805L19.4743 21.3558C20.4312 20.9741 21.5279 21.1523 22.3051 21.8158C23.4354 22.7806 23.5472 24.4537 22.5548 25.5527C21.5623 26.6516 19.8415 26.7603 18.7111 25.7954C17.5808 24.8305 17.469 23.1575 18.4614 22.0585L15.216 17.3974C14.2525 17.7645 13.178 17.7416 12.232 17.3336L9.51718 21.0667C10.3254 22.0569 10.4396 23.4231 9.80646 24.5272C8.94298 26.033 6.98738 26.5731 5.43854 25.7336C3.88971 24.8941 3.33417 22.9928 4.19765 21.487C5.06113 19.9812 7.01673 19.4411 8.56557 20.2806L11.1892 16.6733C9.93714 15.5695 9.56457 13.8045 10.2681 12.3105L5.88829 9.00366C5.17999 9.48869 4.25891 9.56826 3.4738 9.21222C2.26363 8.6634 1.74012 7.26474 2.30462 6.08812C2.86912 4.91156 4.30774 4.40259 5.51797 4.95141C6.72814 5.50024 7.25165 6.8989 6.68715 8.07551L10.9624 11.3034C12.1809 10.0288 14.1385 9.73087 15.6994 10.5825L18.9619 6.10173C18.1501 5.24826 17.9333 4.0093 18.4091 2.9428C19.0721 1.45646 20.8491 0.774119 22.3779 1.41872C23.9067 2.06333 24.6085 3.79094 23.9455 5.27728C23.2825 6.76363 21.5055 7.44602 19.9767 6.80136L16.675 11.3358C17.301 12.0021 17.66 12.8648 17.6865 13.7667L20.1358 14.2393C20.5185 13.4863 21.2861 12.9897 22.1484 12.9373C23.4784 12.8564 24.624 13.839 24.7071 15.1321C24.7903 16.4252 23.7796 17.539 22.4496 17.6198C21.1196 17.7007 19.9739 16.7181 19.8908 15.425Z" fill="white" stroke="white" stroke-width="0.5" />\n              </g>\n              <defs>\n                <clipPath id="clip0_5141:85136">\n                  <rect width="26" height="26" fill="white" transform="translate(0.633484 0.731445)" />\n                </clipPath>\n              </defs>', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_feed`
--

CREATE TABLE `new_feed` (
  `new_id` int(11) NOT NULL,
  `new_title` varchar(255) DEFAULT NULL,
  `id_company` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `new_type` int(11) DEFAULT NULL COMMENT '0: bài đăng; 3: sự kiện',
  `id_user_tags` varchar(255) DEFAULT '0',
  `content` text,
  `file` text,
  `name_file` text,
  `ghim` int(11) DEFAULT '0',
  `ghim_group` int(11) NOT NULL COMMENT '1: Ghim bài viết nhóm',
  `position` int(11) NOT NULL DEFAULT '0',
  `author_type` tinyint(4) NOT NULL DEFAULT '1',
  `view_mode` int(11) NOT NULL DEFAULT '0' COMMENT '0: công khai;1:chỉ mình tôi;2:bạn bè;3:bạn bè ngoại trừ;4:bạn bè cụ thể',
  `except` text COMMENT 'ds bạn bè nhìn thấy/ko nhìn thấy bài viết',
  `feel` int(11) DEFAULT NULL COMMENT 'cảm xúc ',
  `activity` int(11) DEFAULT NULL COMMENT 'hoạt động',
  `district` int(11) NOT NULL DEFAULT '0' COMMENT 'quận huyện',
  `city` int(11) NOT NULL DEFAULT '0' COMMENT 'tỉnh thành',
  `location` text COMMENT 'vị trí',
  `type` int(10) NOT NULL DEFAULT '0' COMMENT '0 là phòng ban chung, 1 là nhóm riêng, 2 là trang cá nhân nhân viên',
  `parents_id` int(11) NOT NULL DEFAULT '0' COMMENT 'id bài đăng được chia sẻ',
  `approve` int(11) NOT NULL DEFAULT '0' COMMENT 'trạng thái bài duyệt trong nhóm (0: đã duyệt; 1: chờ duyệt; 2: từ chối)',
  `message_remove` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message_tuchoi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tat_comment` int(11) NOT NULL COMMENT '0: Hiện, 1: Ẩn',
  `album_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `notify_on` text NOT NULL COMMENT 'ds người bật thông báo bài viết',
  `show_time` int(11) NOT NULL DEFAULT '0' COMMENT 'thời gian hiển thị bài viết lên lịch',
  `delete` tinyint(4) NOT NULL COMMENT '1 là ẩn, 0 là hiện',
  `hide_post` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `new_feed`
--

INSERT INTO `new_feed` (`new_id`, `new_title`, `id_company`, `author`, `new_type`, `id_user_tags`, `content`, `file`, `name_file`, `ghim`, `ghim_group`, `position`, `author_type`, `view_mode`, `except`, `feel`, `activity`, `district`, `city`, `location`, `type`, `parents_id`, `approve`, `message_remove`, `message_tuchoi`, `tat_comment`, `album_id`, `group_id`, `notify_on`, `show_time`, `delete`, `hide_post`, `created_at`, `updated_at`) VALUES
(525, NULL, 1636, 1636, 0, '2690', 'ddddddddddđ', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1637891729, 1637891729),
(527, NULL, 1664, 1664, 0, '', 'ngày mai thứ 7 nghỉ nhé các bạn ơi', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1637918789, 1637918789),
(529, NULL, 1664, 1664, 2, '4673', 'Chào mừng ban đến với công ty cổ phần thanh toán hưng Hà', NULL, NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1637920955, 1637920955),
(530, 'Gặp gỡ Elon Musk', 1664, 1664, 3, '0', 'gặp gỡ giao lưu với Elon musk', '../img/new_feed/event/event_noi_bo/file_dinh_kem/1664/1907649798.docx', 'BÁO CÁO TỔNG HỢP TUẦN PHÒNG ĐÀO TẠO VÀ PHÁT TRIỂN NGÀY 22.11.2021.docx', 0, 0, 713, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1637922204, 1638417880),
(532, 'Chia sẻ ý tưởng test 1112', 1664, 1664, 6, '0', 'Các bạn ơi, mình muốn các bạn tìm hiểu kỹ hơn về chương trình khoa học sinh viên?', '../img/new_feed/idea/1664/image/1855982890.png', 'quan-ly-phong-ban-2.png', 0, 0, 713, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1638009361, 1638009361),
(533, 'nào vào bình chọn đi các bạn ơi!', 1664, 1664, 7, '4008', '<p>C&Aacute;C BẠN VOTE V&Agrave;O Đ&Acirc;Y NH&Eacute;</p>\n', NULL, NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1638009453, 1638009453),
(534, NULL, 1664, 1664, 8, '4673', 'Trung Kiên cố lên nhé!', '||', '||', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1638414216, 1638414216),
(535, 'trest 11', 1664, 1664, 9, '0', 'test 1112', '../img/new_feed/internal_news/1664/file/1555190298.docx', 'BÁO CÁO THƯỞNG PHẠT - ĐÀO TẠO VÀ PHÁT TRIỂN NGÀY 30.11.2021.docx', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1638414307, 1638414307),
(536, NULL, 1664, 1664, 0, '', 'Dấu x đang che hết cả tên tệp kìa em', '../img/new_feed/dang_tin/file/1664/1853867408.docx', 'BÁO CÁO TỔNG HỢP TUẦN PHÒNG ĐÀO TẠO VÀ PHÁT TRIỂN TỪ NGÀY 30.11.2021.docx', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1638414386, 1638414386),
(537, 'THÔNG BÁO GỬI XE', 1664, 1664, 1, '0', '<p style="text-align:center"><span style="font-size:18px">MAI C&Aacute;C TH&Agrave;NH VI&Ecirc;N TRONG CONG TY ĐI GỬI XE TẠI&nbsp; CT5 NH&Eacute;</span></p>\n', '../img/new_feed/alert/1664/image/988697627.jpeg', 'bao-loi.jpeg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1638416173, 1638416173),
(538, 'ĐI ĂN Ở NGOÀI HAY KHÔNG?', 1664, 1664, 5, '4673,4004', '<p>h&uacute; h&uacute;</p>\n', '||', '||', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1638416376, 1638416376),
(539, 'Thông báo đầu tiên', 1761, 1761, 1, '0', '<p>Th&ocirc;ng b&aacute;o đầu ti&ecirc;n</p>\n', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1638429074, 1638429074),
(540, NULL, 1761, 1761, 0, '', 'ai khóc nỗi đau này!!!', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1638495337, 1638495337),
(541, 'fffffffffffffffffffff', 1636, 1636, 1, '2690', '<p>gggggggggggggggggggggggggggg</p>\n', '../img/new_feed/alert/1636/image/1544000380.jpg', 'sunong-.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1639188253, 1639188253),
(544, NULL, 1761, 1761, 0, '', 'p', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1639730072, 1639730072),
(568, NULL, 1664, 1664, 0, '', 'mai để xe ở CT5 nhé các bạn', '', NULL, 1, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640255148, 1640255148),
(569, NULL, 1664, 1664, 0, '', 'CÔNG TY CỔ PHẦN THANH TOÁN HƯNG HÀ UPDATE LƯƠNG MỚI NHÉ', '../img/new_feed/dang_tin/image/1664/1637576576.jpeg||../img/new_feed/dang_tin/image/1664/824114776.jpeg||../img/new_feed/dang_tin/image/1664/1961531219.jpg', 'processed.jpeg||processed (1).jpeg||cau-hinh-cham-cong-2.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640255343, 1640255343),
(570, NULL, 57, 57, 0, '', 'ádasdasd', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640312350, 1640312350),
(571, NULL, 3557, 3557, 0, '', 'test', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640312940, 1640312940),
(592, 'sadw', 2840, 2840, 5, '', '<p>ewqe</p>\n', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640331131, 1640331328),
(593, 'qwe', 2840, 2840, 6, '0', 'qwewqerr11', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640331454, 1640331454),
(594, 'bình chọn 11343432', 2840, 2840, 7, '5143', '<p>sadad44444</p>\n', NULL, NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640332425, 1640332558),
(595, NULL, 2840, 2840, 8, '5143', 'qewqe', '', '', 0, 0, 1035, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640332945, 1640333144),
(596, 'sadw', 2840, 2840, 9, '0', 'adwweqw', '../img/new_feed/internal_news/2840/file/177756076.zip||../img/new_feed/internal_news/2840/image/2087969626.jfif', '620260160.zip||tải xuống.jfif', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640333371, 1640333371),
(597, '1232134434', 2840, 2840, 9, '0', '123123213444545456', '../img/new_feed/internal_news/2840/file/723393547.zip||../img/new_feed/internal_news/2840/image/656751921.png', '620260160.zip||picturemessage_lgoic12d.ciy.png', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640333714, 1640334047),
(598, 'sad', 2840, 2840, 1, '0', '<p>đ&aacute;</p>\n', '../img/new_feed/alert/2840/image/1706085780.jfif', 'tải xuống.jfif', 0, 0, 1035, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640394371, 1640394371),
(599, NULL, 2840, 2840, 8, '5143', 'ewqe', '../img/new_feed/bonus/2840/file/1369287770.zip', '620260160.zip', 0, 0, 1035, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640394496, 1640394496),
(600, NULL, 2840, 2840, 8, '5143', 'ewqe', '../img/new_feed/bonus/2840/file/631168853.zip', '620260160.zip', 0, 0, 1035, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640394497, 1640394497),
(601, NULL, 1664, 1664, 0, '', 'Lên quẩy đi các bạn nhé!', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640510117, 1640510117),
(602, NULL, 1664, 1664, 0, '4008', 'mai để xe ở dưới gầm nhé các bạn ơi!', '../img/new_feed/dang_tin/file/1664/1960454387.rar||../img/new_feed/dang_tin/file/1664/66968643.html||../img/new_feed/dang_tin/image/1664/912415882.jpg||../img/new_feed/dang_tin/image/1664/111124793.jpg||../img/new_feed/dang_tin/image/1664/1057394295.jpg||../img/new_feed/dang_tin/image/1664/1057843171.jpg||../img/new_feed/dang_tin/image/1664/1823610087.jpg', 'ẢNH CHO CHẤM CÔNG HƯỚNG DẪN.rar||doanh-nhan-dang-khac-vy.html||cai-dat-cong-chuan.jpg||cai-dat-thong-tin-tai-khoan.jpg||cau-hinh-cham-cong.jpg||cau-hinh-cham-cong-2.jpg||cung-cap-id.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640510212, 1640510212),
(603, 'NGÀY MAI HỌP TUẦN', 1664, 1664, 1, '0', '<p style="text-align: center;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">HỌP TUẦN NGHI&Ecirc;M T&Uacute;C NH&Eacute;!</span></span></p>\n', '../img/new_feed/alert/1664/file/911006820.docx||../img/new_feed/alert/1664/file/2009199659.docx', 'BÁO CÁO THƯỞNG PHẠT - ĐÀO TẠO VÀ PHÁT TRIỂN NGÀY 21.12.2021.docx||BÁO CÁO THƯỞNG PHẠT - ĐÀO TẠO VÀ PHÁT TRIỂN NGÀY 21.12.2021.docx', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640510325, 1640510325),
(604, 'GẶP GỠ SIÊU MẪU QUỲNH ANH', 1664, 1664, 3, '0', 'gặp gỡ siêu mẫu đỉnh số 1 châu Á', '../img/new_feed/event/event_noi_bo/file_dinh_kem/1664/269556991.docx', 'BÁO CÁO TỔNG HỢP TUẦN PHÒNG ĐÀO TẠO VÀ PHÁT TRIỂN NGÀY 21.12.2021.docx', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640512185, 1640512185),
(605, 'CÓ NÊN TỔ CHỨC PARTY NĂM NAY KHÔNG?', 1664, 1664, 5, '5998,5767', '<p>NG&Agrave;Y 31/12 TỔ CHỨC PARTY</p>\n', '../img/new_feed/discuss/1664/file/914271285.docx', 'MẪU BIÊN BẢN CUỘC HỌP PHÒNG ĐÀO TẠO 21.12.2021.docx', 0, 0, 713, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640512433, 1640512433),
(606, NULL, 1664, 1664, 2, '5767', 'CHÀO MỪNG BẠN1', NULL, NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1640512472, 1640512472),
(607, NULL, 3765, 3765, 0, '', '122', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1641348804, 1641348804),
(608, NULL, 3765, 3765, 0, '', 'TPMS', '../img/new_feed/dang_tin/image/3765/905654349.jpg', 'thumb-sorento-tpms.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1641348824, 1641348824),
(609, 'Công ty IAT VIỆT NAM  cần tuyển: LEADER SALE thời trang cao cấp  - Thu nhập: 10-15tr +%(15-20tr) ( Y/c: Có kinh nghiệm lãnh đạo đội nhóm, Chính trực) NV SALE online nội địa 6 người - Thu nhập: 8-12tr +%(10-15tr) ( Y/c: Chính trực, đúng chính tả, ', 3542, 3542, 0, '', 'Công ty IAT VIỆT NAM  cần tuyển:  ???? LEADER SALE thời trang cao cấp  - Thu nhập: 10-15tr +%(15-20tr) ( Y/c: Có kinh nghiệm lãnh đạo đội nhóm, Chính trực) ???? NV SALE online nội địa 6 người - Thu nhập: 8-12tr +%(10-15tr) ( Y/c: Chính trực, đúng chính tả, giọng nói dễ nghe) ???? Nhân viên Phụ trách PR, truyền thông - Thu nhập: 10-15tr +% ( Y/c: Có kinh nghiệm, Chính trực) ????NV Marketing ADS : 3 người - Thu nhập: 7-9tr +%((yêu cầu: Y/c: Có kinh nghiệm 6 tháng trở lên)  - Thời gian làm việc từ 8h00 - 17h30 từ tứ 2 đến  thứ 7 . PV online.  Lv tại The Manor Central Park, Nguyễn Xiển, HN. Ib/cmt gửi cv qua mail hr@iatvietnam.com', '../img/new_feed/dang_tin/3542/image/1309687186.jpg', 'z2953543003957_20927cd11c92b58cc6abc0149f8e6576.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1641636059, 1641636059),
(610, NULL, 1009, 1009, 0, '', 'Thông báo lịch nghỉ tết của Buso', '../img/new_feed/dang_tin/image/1009/353010597.png', 'logobuso-01.png', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1642217658, 1642217658),
(611, 'nghi tet vui ve', 1009, 1009, 1, '0', '<p>ffff</p>\n', '', '', 0, 0, 344, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1642218140, 1642218140),
(612, NULL, 1636, 1636, 0, '2690', '', '../img/new_feed/dang_tin/image/1636/299458875.jpg||../img/new_feed/dang_tin/image/1636/1767316732.jpg', '2EPXdK7.jpg||DM-Wallpaper-2001-4096x2304a.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1644544980, 1644544980),
(613, NULL, 1636, 1636, 0, '2690', 'thử nghiệm test', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1644548172, 1644548172),
(614, NULL, 316, 316, 0, '', 'Hi! Xin Chào! Tôi là Khải-CEO Hương Đình!', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1645108606, 1645108606),
(615, NULL, 316, 316, 8, '6351', 'Testing Thử', '||', '||', 0, 0, 483, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1645110012, 1645110012),
(616, 'AHIEU2030a', 2186, 2186, 1, '0', '<p>gvjkfcvjuvufycvghvghv ghcdhd</p>\r\n', '', '', 0, 0, 1430, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1645775083, 1645775083),
(618, 'Link đăng ký làm việc Online tại nhà (Work From Home)', 1009, 1009, 1, '0', '<p>- Thời gian l&agrave;m việc online tại nh&agrave; với từng bộ phận sẽ hưởng % thấp hợn lương khi l&agrave;m việc tại văn ph&ograve;ng<br />\r\n- T&ugrave;y từng bộ phận sẽ nhấp v&agrave;o link kh&aacute;c nhau:</p>\r\n\r\n<p><strong>1. Ecomity</strong>:&nbsp;<br />\r\nhttps://docs.google.com/forms/d/e/1FAIpQLScH4qFhIcp4Bbg91_YO_dLdt9JK2hkGq8BoXWiVK6EwmLhltg/viewform<br />\r\n<br />\r\n<strong>2. Buso:</strong><br />\r\nhttps://docs.google.com/forms/d/e/1FAIpQLSeXbHkjP9Ts2N_qdnVuSIsqgROGUFLXOaqnZ7Oi39nZq4-4CA/viewform</p>\r\n', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1646016296, 1646016296),
(619, NULL, 1636, 1636, 0, '2690', 'hôm nay trời rất đẹp', '../img/new_feed/dang_tin/image/1636/1742668471.jpg', '841bb29dca9f7bf6144d43346a506b52.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1646270209, 1646270209),
(620, 'dsadưq', 3183, 5327, 1, '0', '<p>dadsad</p>\r\n', '', '', 0, 0, 1148, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1647321255, 1647321255),
(621, NULL, 65026, 65026, 0, '', '', '../img/new_feed/dang_tin/image/65026/1449892785.jpg', 'Cover FB.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1648045060, 1648045060),
(622, 'sÂSssa', 3183, 5327, 1, '0', '<p>ASAs</p>\r\n', '../img/new_feed/alert/5327/file/1351270274.js', 'coaches.js', 1, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1649758999, 1649758999),
(623, '3123123', 3183, 5327, 1, '0', '<p>3123213</p>\r\n', '../img/new_feed/alert/5327/file/1077701630.css', 'base-badge.css', 0, 0, 1136, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1649759045, 1649759045),
(624, 'qưewqewqe', 3183, 5327, 1, '0', '<p>eqweqưe</p>\r\n', '', '', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1649759068, 1649759068),
(625, NULL, 3183, 5327, 0, '5520', 'pro vl', '', '', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1649759113, 1649759113),
(626, NULL, 57, 57, 0, '', '', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1649842238, 1649842238),
(627, NULL, 1636, 1636, 0, '', 'test', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1650942448, 1650942448),
(628, 'test tý có gì vui', 1636, 1636, 0, '8906,8905,8904,8826,8479,8393,7441', 'test tý có gì vui', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1650942521, 1650942521),
(629, NULL, 1636, 1636, 0, '', '', '../img/new_feed/dang_tin/image/1636/1479893360.jpg||../img/new_feed/dang_tin/image/1636/1704294897.jpg||../img/new_feed/dang_tin/image/1636/680960413.jpg||../img/new_feed/dang_tin/image/1636/1275738459.jpg||../img/new_feed/dang_tin/image/1636/1532969270.jpg', 'DM-Wallpaper-2001-4096x2304a.jpg||12312312.jpg||Co-5-la.jpg||fd00984025b813f8da694ca720b39111.jpg||img.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1650946691, 1650946691),
(630, '12312312', 1636, 1636, 4, '0', '12312312312312 1312312312312312 123123123123', NULL, NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1650958201, 1650958201),
(631, 'test', 1636, 1636, 1, '0', '<p>qưeqweqweqw</p>\r\n', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1650961716, 1650961716),
(632, NULL, 1636, 1636, 0, '', '134133123123123', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1651132265, 1651132265),
(633, NULL, 1636, 1636, 0, '', '123', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1651132342, 1651132342),
(634, NULL, 1636, 1636, 0, '', '123123123213123', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1651132525, 1651132525),
(635, 'duy tesst thông báo', 1636, 1636, 1, '0', '<p>123123123121213123123123123123123</p>\r\n', '', '', 0, 0, 577, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1651135138, 1651135138),
(636, '123123123', 1636, 1636, 1, '0', '<h2>duy test th&ocirc;ng b&aacute;o pass 2</h2>\r\n', '', '', 0, 0, 576, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1651135246, 1651135246),
(637, 'duy test lần 3', 1636, 1636, 1, '0', '<h2>123123123</h2>\r\n\r\n<h2>123123123</h2>\r\n\r\n<h2>123123</h2>\r\n', '../img/new_feed/alert/1636/file/477491809.xls', 'tag.xls', 0, 0, 650, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1651135554, 1651135554),
(639, NULL, 1636, 1636, 0, '0', 'alo alo', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659414636, 1659414636),
(640, NULL, 1636, 1636, 0, '', '', '../img/new_feed/dang_tin/image/1636/150040064.jpg', '2.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659414653, 1659414653),
(641, NULL, 1636, 1636, 0, '', '', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659414755, 1659414755),
(642, NULL, 1636, 1636, 0, '0', 'Wikipedia tiếng Việt là phiên bản tiếng Việt của Wikipedia. Website lần đầu kích hoạt vào tháng 11 năm 2002 và chỉ có bài viết đầu tiên của dự án là bài ...', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659426690, 1659426690),
(643, NULL, 1636, 4502, 0, '0', 'alo', '', NULL, 0, 0, 1367, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659436337, 1659436337),
(644, NULL, 1636, 1636, 0, '0', 'abc', '', NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659495219, 1659495219),
(645, NULL, 1636, 1636, 0, '', 'abc', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659497380, 1659497380),
(646, 'ABC', 1636, 1636, 1, '0', '<p>Abc&nbsp;</p>\r\n', '', '', 0, 0, 1160, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659519181, 1659519181),
(647, NULL, 1636, 1636, 2, '13697', 'abc', NULL, NULL, 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659519984, 1659519984),
(650, NULL, 1636, 4502, 0, '13884,13881', '', '', '', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1659927981, 1659927981),
(651, NULL, 1636, 4502, 0, '0', 'ffgghn', '', NULL, 0, 0, 1367, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1660988510, 1660988510),
(652, NULL, 83885, 83885, 0, '0', 'oke a', '', NULL, 1, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1664854002, 1664854002),
(653, NULL, 83885, 83885, 0, '19144', 'eweqw', '../img/new_feed/dang_tin/image/83885/577673375.jpg', '297497739_375708451400127_8427252493543218128_n.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1664854052, 1664854052),
(655, NULL, 72132, 72132, 0, '', '', '../img/new_feed/dang_tin/image/72132/1421074349.jpg||../img/new_feed/dang_tin/image/72132/210624312.png', 'josh-salacup-fQY__9atSdc-unsplash.jpg||Untitled_9.png', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1667113875, 1667113875),
(656, NULL, 72132, 15211, 0, 'undefined', '', '../img/new_feed/dang_tin/image/15211/1026803550.png', 'Untitled_5.png', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1667186459, 1667186459),
(657, NULL, 72132, 72132, 0, 'undefined', '', '../img/new_feed/dang_tin/image/72132/1771818330.jpg||../img/new_feed/dang_tin/image/72132/2072109525.png', 'josh-salacup-fQY__9atSdc-unsplash.jpg||Untitled_9.png', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1667186602, 1667186602),
(658, NULL, 72216, 72216, 0, '', 'test', '../img/new_feed/dang_tin/image/72216/1570736374.png||../img/new_feed/dang_tin/image/72216/2114183227.jpg', 'màu 3 mặt 1_.png||cv-thiet-ke-do-hoa-mau-25-vieclam123.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668152757, 1668152757),
(659, NULL, 72216, 72216, 0, '', 'test 2222222213123123', '../img/new_feed/dang_tin/image/72216/1149413692.png', 'anh.png', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668152825, 1668152825),
(660, NULL, 72216, 72216, 0, '', '', '../img/new_feed/dang_tin/file/72216/1920293120.psd', '05.psd', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668152968, 1668152968),
(661, NULL, 72132, 72132, 0, '51770', 'Tin cho nhân viên duy 1', '../img/new_feed/dang_tin/image/72132/217105154.jpg||../img/new_feed/dang_tin/image/72132/825200533.jpg', 'Thuxinviecthoitrang2-vieclam123.jpg||Thuxinviecthoitrang(2)-mau(3)-vieclam123.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668154534, 1668154534),
(662, NULL, 72132, 72132, 0, '51770', 'Nhân viên duy 1 nhận tin', '../img/new_feed/dang_tin/image/72132/1285877817.jpg', '0c169b1422e16606911067cf0656c5ce.jpg', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668155366, 1668155366),
(664, NULL, 3312, 5699, 0, '', '', '../img/new_feed/dang_tin/image/5699/2029425546.jpg||../img/new_feed/dang_tin/image/5699/268735627.png||../img/new_feed/dang_tin/image/5699/1584717808.png||../img/new_feed/dang_tin/image/5699/39564617.jpg', 'josh-salacup-fQY__9atSdc-unsplash.jpg||Untitled_9.png||Untitled_8.png||637802.jpg', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668155719, 1668155719),
(665, 'đang cảm thấy đau đầu', 3312, 5699, 0, '8296', 'đang cảm thấy đau đầu', '../img/new_feed/dang_tin/image/5699/1479683310.jpg', '0546a6957d1df65e6490a4149fc87fb2.jpg', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668155907, 1668155907),
(667, NULL, 3312, 5699, 0, '48161,45618', '', '', '', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668163532, 1668163532),
(668, NULL, 3312, 5699, 0, '50643,48161,45618', 'ssssss', '../img/new_feed/dang_tin/image/5699/1788288024.png', '5062717b0bfceb6f5e0072ec591cbd63.png', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668164825, 1668164825),
(669, NULL, 3312, 5699, 0, '50643,48161,45618', 'ssssss', '../img/new_feed/dang_tin/image/5699/1783744768.png', '5062717b0bfceb6f5e0072ec591cbd63.png', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668164829, 1668164829),
(677, NULL, 3312, 5699, 0, '', 'bạn bè ngoại trừ', '../img/new_feed/dang_tin/image/5699/935845490.jpg', 'josh-salacup-fQY__9atSdc-unsplash.jpg', 0, 0, 0, 2, 3, '48161,43429', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668186450, 1668186450),
(693, NULL, 72132, 72132, 0, '', 'test đăng file', '../img/new_feed/dang_tin/file/72132/438060774.rar', 'thư bất động sản 15.rar', 0, 0, 0, 1, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668240045, 1668240045),
(697, NULL, 72132, 51770, 0, '', 'Nhân viên đăng tin test', '../img/new_feed/dang_tin/image/51770/1168509175.png||../img/new_feed/dang_tin/image/51770/2085158446.jpg', 'address.png||0c169b1422e16606911067cf0656c5ce.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668242912, 1668242912),
(698, NULL, 72132, 51770, 0, '15211', 'test tin nhân viên tag', '../img/new_feed/dang_tin/image/51770/1121252784.jpg', '0c169b1422e16606911067cf0656c5ce.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668243694, 1668243694),
(699, NULL, 72132, 72132, 0, '', '', '../img/new_feed/dang_tin/image/72132/1194593184.png', 'phone.png', 0, 0, 0, 1, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668244134, 1668244134),
(705, NULL, 72132, 72132, 0, '', 'title giống nhau', '../img/new_feed/dang_tin/image/72132/2072163180.jpg', '7658e764e358ee5bb063fd8913972020.jpg', 0, 0, 0, 1, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668246108, 1668246108),
(706, NULL, 72132, 51770, 0, '', 'title giống nhau', '../img/new_feed/dang_tin/image/51770/1398559218.jpg||../img/new_feed/dang_tin/image/51770/1593474738.jpg', '9cafe1d87fb9cc6897359d74203544ab.jpg||7658e764e358ee5bb063fd8913972020.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668246140, 1668246140),
(707, NULL, 72132, 72132, 0, '15211', 'rgwgfvf', '../img/new_feed/dang_tin/image/72132/1988389245.jpg', '7658e764e358ee5bb063fd8913972020.jpg', 0, 0, 0, 1, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668246507, 1668246507),
(708, 'sự kiên hot', 72132, 72132, 3, '0', 'Sự kiện hay', '../img/new_feed/event/event_noi_bo/file_dinh_kem/72132/838459346.rar', 'thư hành chính nhân sự 15.rar', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668247271, 1668247271),
(709, 'Sự kiện 2', 72132, 72132, 3, '0', 'Miêu tả sự kiện', '', '', 0, 0, 3138, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668248862, 1668248862),
(710, 'Sự kiện 8:30', 72132, 72132, 3, '0', 'Sự kiện 8:30', '', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668389308, 1668389308),
(711, 'phòng 2 hờ', 72132, 72132, 3, '0', 'phòng 2 hờ', '', '', 0, 0, 3139, 1, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668389576, 1668389576),
(712, NULL, 72132, 51770, 0, '', 'Posts chỉ mình tôi', '../img/new_feed/dang_tin/image/51770/1189162739.jpg', '80ebf076a72d3eab3c8b4deefb10d8a5.jpg', 0, 0, 0, 2, 1, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668390544, 1668390544),
(713, NULL, 3312, 5699, 0, '5750', 'cảm thấy buồn', '', '', 0, 0, 0, 2, 0, '', 9, 0, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668394928, 1668394928),
(714, NULL, 3312, 5699, 0, '', 't2 r chủ nhật đâu mà chủ nhật', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668395055, 1668395055),
(715, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668395197, 1668395197),
(716, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', 0, 15, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668395303, 1668395303),
(717, NULL, 3312, 5699, 0, '53265', 'edit 1', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 183, 8, 'Thành phố Hòa Bình, Hòa Bình', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668396525, 1668396525),
(718, NULL, 3312, 5699, 0, '', '', '../img/new_feed/dang_tin/image/5699/1216932494.jpg', '4SEd8QEh.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668410917, 1668410917),
(719, NULL, 3312, 5699, 0, '', '', '../img/new_feed/dang_tin/image/5699/1854999174.jpg||../img/new_feed/dang_tin/image/5699/1015864402.jpg', '176057646_2235747076561526_4157042737134346677_n.jpg||177592602_2235747106561523_8886109967877327692_n.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668411563, 1668411563),
(720, NULL, 3312, 5699, 0, '', '', '../img/new_feed/dang_tin/image/5699/1401938090.jpg||../img/new_feed/dang_tin/image/5699/105004876.png||../img/new_feed/dang_tin/image/5699/1105428298.png||../img/new_feed/dang_tin/image/5699/167579658.png||../img/new_feed/dang_tin/image/5699/1217032658.jpg||../img/new_feed/dang_tin/image/5699/1906158263.jpg||../img/new_feed/dang_tin/image/5699/1587388341.jpg', 'josh-salacup-fQY__9atSdc-unsplash.jpg||Untitled_9.png||Untitled+11.png||Untitled_8.png||gary-bendig-6GMq7AGxNbE-unsplash.jpg||tunafish-mayonnaise-qasnNJXg9Hg-unsplash.jpg||xuan-nguyen-v6V-hfxjboI-unsplash.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668411885, 1668411885),
(721, NULL, 3312, 5699, 0, '', '', '../img/new_feed/dang_tin/file/5699/2046475152.docx||../img/new_feed/dang_tin/file/5699/1471521091.TXT', 'Sát Phá Lang phiên ngoại.docx||Hệ thống tự cứu nhân vật phản diện.TXT', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668412304, 1668412304),
(722, NULL, 3312, 8296, 0, '5699', 'tag chị với', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1668419617, 1668419617),
(723, 'ầ1241241241', 3312, 8296, 0, '5750', 'ầ1241241241', '../img/new_feed/dang_tin/image/8296/973285051.jpg', '80ebf076a72d3eab3c8b4deefb10d8a5.jpg', 0, 0, 0, 2, 2, '5699', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668419681, 1668419681),
(724, '', 3312, 5699, 0, '25061,8296,5750', 'content hay title =&gt; content HAY TITLE', '../img/new_feed/dang_tin/5699/file/1417427539.docx||../img/new_feed/dang_tin/5699/image/1240053165.jpeg', 'Husky QUYỂN III QUYẾT CHIẾN.docx||received_582404032156044.jpeg', 0, 0, 0, 2, 0, '', 1, 0, 76, 1, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668475949, 1668475949),
(725, 'sự kiện nội bộ', 3312, 5699, 3, '0', 'miêu tả', '', '', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668478415, 1668478415),
(726, 'thông báo loa loa loa', 3312, 5699, 1, '0', '<p><span style="font-family:arial,helvetica,sans-serif;"></span></p>\r\n', '', '', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668478848, 1668478848),
(727, NULL, 72132, 51770, 0, '15211', '', '../img/new_feed/dang_tin/image/51770/1160588084.jpg', 'mau-thu-xin-viec-hanh-chinh-nhan-su-17-mau-1.jpg', 0, 0, 0, 2, 1, '', 5, 0, 66, 1, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668497606, 1668497606),
(728, NULL, 3312, 5699, 2, '25061,8296,5750', 'chào mừng thành viên mới', NULL, NULL, 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668497707, 1668497707),
(729, NULL, 72132, 51770, 0, '53576', '', '', '', 0, 0, 0, 2, 0, '', 3, 0, 66, 1, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668497725, 1668497725),
(730, NULL, 72132, 51770, 0, '53576,15211', 'Hoạt động', '../img/new_feed/dang_tin/image/51770/1031203983.jpg', '80ebf076a72d3eab3c8b4deefb10d8a5.jpg', 0, 0, 0, 2, 2, '53576,15211', 2, 0, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668500050, 1668500050),
(731, NULL, 72132, 51770, 0, '53576', 'gjaklgkaosgk;lag', '', '', 0, 0, 0, 2, 0, '', 0, 2, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668500098, 1668500098),
(732, NULL, 72132, 51770, 0, '15211', 'vị trí', '', '', 0, 0, 0, 2, 0, '', 14, 0, 76, 1, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668500276, 1668500276),
(733, 'ý tưởng làm sao để sửa hết 10 cái loại bài viết này', 3312, 5699, 6, '53576', 'liệu có nên sửa hết 10 cái loại bài viết này', '../img/new_feed/idea/5699/file/1392057461.docx||../img/new_feed/idea/5699/image/1145747392.jpg||../img/new_feed/idea/5699/image/694448051.jpg||../img/new_feed/idea/5699/image/835052373.jpg', 'Husky PHIÊN NGOẠI.docx||FB_IMG_1606033661966.jpg||FB_IMG_1599987359076.jpg||EYZHcOBU0AELeQj.jpeg.jpg', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668500428, 1668500428),
(735, NULL, 72132, 51770, 0, '53576,51770,15211', '', '../img/new_feed/dang_tin/image/51770/449252828.jpg', 'mau-thu-xin-viec-hanh-chinh-nhan-su-17.jpg .jpg', 0, 0, 0, 2, 2, '', 1, 0, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668500987, 1668500987),
(736, NULL, 72132, 51770, 0, '53576,51770', '', '', '', 0, 0, 0, 2, 3, '53576', 1, 0, 66, 1, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668501049, 1668501049),
(737, NULL, 72132, 51770, 0, '', 'hay', '../img/new_feed/dang_tin/file/51770/394174042.rar', 'thư hành chính nhân sự 17.rar', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668501647, 1668501647),
(738, 'sự kiện đối ngoại', 3312, 5699, 4, '0', 'miêu tả sự kiện đối ngoại', '../img/new_feed/event/event_doi_ngoai/file_dinh_kem/5699/file/719385517.docx', 'Chương 10.docx', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668501725, 1668675391),
(739, 'bình chọn', 3312, 5699, 7, '5750', '<p>nội dung&nbsp;b&igrave;nh chọn 2</p>\r\n', NULL, NULL, 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668502172, 1669085378),
(740, NULL, 3312, 5699, 8, '5750', 'chê', '../img/new_feed/bonus/5699/file/1918228554.docx||../img/new_feed/bonus/5699/image/208576732.jpg||../img/new_feed/bonus/5699/video/1739101901.mp4', 'Sát Phá Lang phiên ngoại.docx||làm.cv-bang-powerpoint (5).jpg||kute.mp4', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668502376, 1668502376),
(742, NULL, 72132, 51770, 0, '53576', 'àafafafsaf', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668503189, 1668503189),
(743, NULL, 72132, 51770, 0, '53576,15211', 'sầ', '../img/new_feed/dang_tin/image/51770/550018685.jpg', 'mau-thu-xin-viec-hanh-chinh-nhan-su-17.jpg .jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 66, 1, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668503230, 1668503230),
(744, NULL, 72132, 72132, 0, '', 'bài viết công ti', '', '', 0, 0, 0, 1, 0, '', NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668507621, 1668507621),
(745, 'sự kiện nội bộ 2 2', 3312, 5699, 3, '0', 'Miêu tả sự kiện nội bộ 2', '../img/new_feed/event/event_noi_bo/file_dinh_kem/5699/2013214351.docx', 'Husky QUYỂN II ĐỒNG QUY.docx', 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1668676542, 1668676542),
(755, NULL, 3312, 5699, 0, '58140,25061,8296,5750', 'editt', '../img/new_feed/dang_tin/5699/image/777993277.gif||../img/new_feed/dang_tin/5699/image/580216059.jpg||../img/new_feed/dang_tin/5699/file/207897214.txt||../img/new_feed/dang_tin/5699/file/1776621069.docx', 'tumblr_da9368d3219c07a6efafd98e27f90e98_8c27ecbe_400.gif||làm.cv-bang-powerpoint (5).jpg||Bí mật trong điện thoại của người yêu.txt||Chương 13.docx', 0, 0, 0, 2, 0, '', 8, NULL, 91, 1, 'Huyện Thanh Oai, Hà Nội', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669000078, 1669000078),
(756, NULL, 3312, 5699, 0, 'undefined', '', '../img/new_feed/dang_tin/file/5699/1928036425.docx', 'Sát Phá Lang phiên ngoại.docx', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669089100, 1669089100),
(757, 'a', 3312, 5699, 1, '0', '<p>a</p>\r\n', '', '', 0, 0, 1217, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669089226, 1669089226),
(758, NULL, 3312, 5699, 0, '', '123\r\nolj', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 755, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669456145, 1669456145),
(759, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 756, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669456556, 1669456556),
(760, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 755, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669456643, 1669456643),
(761, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 755, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669457034, 1669457034),
(762, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 755, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669457075, 1669457075),
(763, NULL, 3312, 5699, 0, '', 'share', '', '', 0, 0, 58070, 2, 0, '', NULL, NULL, 0, 0, '', 2, 756, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669457365, 1669457365),
(764, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 756, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669458871, 1669458871),
(765, NULL, 3312, 5737, 0, '', 'hhdffhhff', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669608440, 1669608440),
(766, NULL, 3312, 5737, 0, '0', 'fffhghfgf', '', NULL, 0, 0, 1210, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669608485, 1669608485),
(767, NULL, 3312, 5737, 0, '', '', '../img/new_feed/dang_tin/image/5737/1079673592.jpg', 'panorama-g392e76bcf_1920.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669609189, 1669609189),
(768, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 767, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669624196, 1669624196),
(769, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 767, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669626197, 1669626197),
(770, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 1217, 2, 0, '', NULL, NULL, 0, 0, '', 0, 767, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669626480, 1669626480),
(771, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 767, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669688328, 1669688328),
(772, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 767, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669691475, 1669691475),
(773, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 725, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669709392, 1669709392),
(774, NULL, 3312, 5699, 0, '', 'kurutte hey kids', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 720, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669709406, 1669709406),
(775, NULL, 3312, 5699, 0, '', 'aaaaaaaaaaaaaaaa', '', '', 0, 0, 58145, 2, 0, '', 22, NULL, 0, 0, '', 2, 757, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669711510, 1669711510),
(776, NULL, 3312, 5761, 0, '', 'xin chào', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669712258, 1669712258),
(777, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 35, 2, 1, '', NULL, NULL, 0, 0, '', 1, 767, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669716701, 1669716701),
(778, NULL, 3312, 5699, 0, '76211,76210', 'share share', '', '', 0, 0, 76207, 2, 0, '', NULL, NULL, 0, 0, '', 2, 767, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669716746, 1669716746),
(779, NULL, 3312, 8296, 0, '', 'test789+456+123', '', '', 0, 0, 0, 2, 1, '', 13, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669791486, 1669791486),
(780, NULL, 3312, 5699, 0, '', 'trong nhóm', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669794335, 1669794335),
(781, NULL, 3312, 5699, 0, '', 'trong nhóm lần 2', '../img/new_feed/dang_tin/image/5699/2103542578.jpg', 'Temple of Samut Prakan', 0, 0, 35, 2, 0, '', 5, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '53576', 0, 0, '', 1669799419, 1669799419),
(782, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 781, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669799432, 1669799432),
(783, NULL, 3312, 8296, 0, '', 'Bài viết tes', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669860417, 1669860417),
(784, NULL, 3312, 8296, 0, '', 'test ok', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669861396, 1669861396),
(785, NULL, 3312, 8296, 0, '', 'Bài viết cần duyệt', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669861533, 1669861533),
(786, NULL, 3312, 8296, 0, '', 'Bài viết của quản trị viên', '../img/new_feed/dang_tin/image/8296/6646106.jpg', '7658e764e358ee5bb063fd8913972020.jpg', 0, 1, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669864744, 1672127082),
(789, NULL, 3312, 5699, 0, '', 'Nhân viên đăng bài', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669866206, 1669866206),
(790, NULL, 3312, 5699, 0, '', 'Bài đăng có ảnh', '../img/new_feed/dang_tin/image/5699/737519585.jpg||../img/new_feed/dang_tin/image/5699/1217964426.jpg', '9cafe1d87fb9cc6897359d74203544ab.jpg||9cafe1d87fb9cc6897359d74203544ab.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669860417, 1670579878),
(791, NULL, 3312, 5699, 0, '', 'Bài viết 4 ảnh', '../img/new_feed/dang_tin/image/5699/787940763.jpg||../img/new_feed/dang_tin/image/5699/1615015535.jpg||../img/new_feed/dang_tin/image/5699/618112945.jpg||../img/new_feed/dang_tin/image/5699/276135450.jpg', '9cafe1d87fb9cc6897359d74203544ab.jpg||7658e764e358ee5bb063fd8913972020.jpg||khoe-anh-o-ho-sen-hot-girl-ha-thanh-noi-nhu-con-tren-mxh-Hinh-6.jpg||80ebf076a72d3eab3c8b4deefb10d8a5.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669867725, 1669867725),
(792, NULL, 72132, 15211, 0, '', 'hãy cho tôi thấy cánh tay của các bn đi ạ', '../img/new_feed/dang_tin/image/15211/1990004920.jpg', 'truong-triet-han-son-ha-lenh-5.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '', 0, 0, '', 1669977855, 1669977855),
(793, NULL, 72132, 15211, 0, '', '0', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '', 0, 0, '', 1669979655, 1669979655),
(794, NULL, 72132, 15211, 0, '', '1', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '', 0, 0, '', 1669979685, 1669979685),
(795, NULL, 72132, 15211, 0, '', '1', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '', 0, 0, '', 1669979801, 1669979801),
(796, NULL, 72132, 15211, 0, '', '1', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '', 0, 0, '', 1669979846, 1669979846),
(797, NULL, 72132, 15211, 0, '', '2', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1669980285, 1669980285),
(798, NULL, 72132, 51770, 0, '', 'Bài viết tài khoản tes', '../img/new_feed/dang_tin/image/51770/1018466004.jpg', '7658e764e358ee5bb063fd8913972020.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670030532, 1670030532),
(800, NULL, 3312, 8296, 0, '', 'test load', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670036000, 1670036000),
(805, NULL, 72132, 51770, 0, '', 'Tk Test OK', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670041965, 1670041965),
(808, NULL, 72132, 53576, 0, '', 'Bài viết không như ****', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '12536457', 0, 0, 0, '', 0, 0, '', 1670053653, 1670053653),
(811, NULL, 72132, 53576, 0, '', 'Hoạt động', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670054533, 1670054533),
(817, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 36, 2, 0, '', 7, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670056905, 1670056905),
(818, NULL, 72132, 53576, 0, '', 'Tìm kiếm bài viết 1', '../img/new_feed/dang_tin/image/53576/1380285744.jpg', 'thu-xin-viec-tu-van-vien-tieng-viet-mau7-loai2-vieclam123.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670056950, 1670056950),
(819, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 36, 2, 0, '', NULL, 2, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670056950, 1670056950),
(820, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 36, 2, 0, '', NULL, 3, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670057007, 1670057007),
(821, NULL, 72132, 51770, 0, '', 'Tìm kiếm bài viết 2', '../img/new_feed/dang_tin/image/51770/1643932846.jpg', 'thu-xin-viec-tu-van-vien-7-vieclam123.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670057106, 1670057106),
(822, NULL, 72132, 51770, 0, '', 'Cout Bài viết 1', '../img/new_feed/dang_tin/image/51770/686704688.jpg', '7658e764e358ee5bb063fd8913972020.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670293612, 1670293612),
(823, NULL, 72132, 51770, 0, '', 'Cout Bài viết 2', '../img/new_feed/dang_tin/image/51770/1492900204.jpg||../img/new_feed/dang_tin/image/51770/843392806.jpg', 'mau-thu-xin-viec-hanh-chinh-nhan-su-15 .jpg||mau-thu-xin-viec-hanh-chinh-nhan-su-15-mau-2.jpg', 0, 1, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 1, 0, 0, '', 0, 0, '', 1670293633, 1670579869),
(826, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 782, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670574712, 1670574712),
(827, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 781, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670574944, 1670574944),
(828, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 827, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670575192, 1670575192),
(829, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 781, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670575477, 1670575477),
(830, NULL, 3312, 8296, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 781, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670575657, 1670575657),
(831, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 781, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670575689, 1670575689),
(832, NULL, 3312, 8296, 0, '8296', 'qwertyuiop[sdfghjkl;zxcvbnm,.', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670578357, 1670580615),
(833, NULL, 3312, 8296, 0, '', 'img', '../img/new_feed/dang_tin/image/8296/767959304.jpg', '80ebf076a72d3eab3c8b4deefb10d8a5.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670634482, 1670634482),
(834, NULL, 72132, 51770, 0, '', 'Duyệt bài member', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1670634563, 1670634563),
(835, NULL, 3312, 8296, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 833, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670636656, 1670636656),
(836, NULL, 3312, 8296, 0, '', '', '../img/new_feed/dang_tin/video/8296/1266329358.mp4', '638062598016484288-6410558307793478993.mp4', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670637897, 1670637897),
(838, NULL, 3312, 8296, 0, '', 'Bài viết 4 video', '../img/new_feed/dang_tin/video/8296/1719119763.mp4||../img/new_feed/dang_tin/video/8296/1931597309.mp4', '638062598016484288-6410558307793478993.mp4||638062598016484288-6410558307793478993.mp4', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670638637, 1670638637),
(839, NULL, 3312, 8296, 0, '', 'File exe', '../img/new_feed/dang_tin/file/8296/1545321523.xlsx', 'Book1.xlsx', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670639169, 1670639169),
(840, NULL, 3312, 8296, 0, '', '', '../img/new_feed/dang_tin/file/8296/810013216.docx', 'Topic1_NguyenQuangDuy.docx', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670639397, 1670639397),
(842, NULL, 3312, 8296, 0, '', 'File nào', '../img/new_feed/dang_tin/file/8296/489300010.txt', 'LINK_FIGMA.txt', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670642145, 1670658557),
(843, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 722, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670841870, 1670841870),
(844, NULL, 92935, 92935, 0, '', '', '../img/new_feed/dang_tin/file/92935/1110565354.pptx', 'Kỹ năng giao tiếp ứng xử của CBYT.pptx', 0, 0, 0, 1, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670891507, 1670891507),
(845, NULL, 3312, 5699, 0, '', 'quá nhiều sự đáng yêu', '../img/new_feed/dang_tin/video/5699/309550870.mp4||../img/new_feed/dang_tin/video/5699/1360187862.mp4', '10000000_1692290307633805_630347171824985692_n.mp4||109462053_189894829150943_7587431894801773403_n.mp4', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670905989, 1670905989),
(846, NULL, 3312, 5699, 0, '', 'we all are living in a dream ....\r\ni wanna dream, i wanna dream', '../img/new_feed/dang_tin/video/5699/12741311.mp4', 'timekeeping-and-tradition-omega-meets-japan.mp4', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1670906377, 1670906377),
(847, NULL, 3312, 5699, 0, '', 'chiếc trứng lười', '../img/new_feed/dang_tin/video/5699/1704529641.mp4', 'Snapsave.app_309272680_433797731980882_4726775976967464523_n.mp4', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1671005243, 1671005243),
(848, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 847, 0, '', '', 0, 0, 0, '', 0, 0, '', 1671005333, 1671005333),
(850, NULL, 3312, 5699, 0, '', 'kawaiiiiiiiii\r\nawwwwwwwwww', '../img/new_feed/dang_tin/video/5699/892013749.mp4', '320115429_5339017542868803_5240411443237187227_n.mp4', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1671078840, 1671078840),
(851, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 797, 0, '', '', 0, 0, 0, '', 0, 0, '', 1671094734, 1671094734),
(852, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 850, 0, '', '', 0, 0, 0, '', 0, 0, '', 1671096845, 1671096845),
(853, NULL, 3312, 8296, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 838, 0, '', '', 0, 0, 0, '', 0, 0, '', 1671156020, 1671156020),
(854, NULL, 3312, 5699, 0, '', 'awwwwww', '../img/new_feed/dang_tin/video/5699/810580431.mp4', '320115429_5339017542868803_5240411443237187227_n.mp4', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1671184835, 1671184835);
INSERT INTO `new_feed` (`new_id`, `new_title`, `id_company`, `author`, `new_type`, `id_user_tags`, `content`, `file`, `name_file`, `ghim`, `ghim_group`, `position`, `author_type`, `view_mode`, `except`, `feel`, `activity`, `district`, `city`, `location`, `type`, `parents_id`, `approve`, `message_remove`, `message_tuchoi`, `tat_comment`, `album_id`, `group_id`, `notify_on`, `show_time`, `delete`, `hide_post`, `created_at`, `updated_at`) VALUES
(855, NULL, 72132, 51770, 0, '', 'Test từ chối bài viết kèm ý kiến', '../img/new_feed/dang_tin/image/51770/799171784.png||../img/new_feed/dang_tin/image/51770/1131545821.png', 'bg1.png||bg2.png', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', 'Bài viết không hay cu ơi', 0, 0, 0, '', 0, 0, '', 1671854398, 1671854398),
(856, NULL, 72132, 51770, 0, '', 'Bài viết từ chối 2 ok', '../img/new_feed/dang_tin/image/51770/719883187.jpg||../img/new_feed/dang_tin/51770/image/853996786.jpg||../img/new_feed/dang_tin/51770/image/1615613418.jpg', '628e18dc5874d2702dcf07867071c8bf.jpg||mau-thu-xin-viec-sinh-vien-moi-ra-truong-13 .jpg||mau-thu-xin-viec-sinh-vien-moi-ra-truong-13-mau-2.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', 'Từ chối lần 2', 0, 0, 0, '', 0, 0, '', 1671865325, 1671865325),
(857, NULL, 3312, 8296, 0, '', 'Test search', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 837, 0, '', '', 0, 0, 0, '', 0, 0, '', 1671873925, 1671873925),
(858, NULL, 72132, 53576, 0, '', '04072001', '../img/new_feed/dang_tin/image/53576/781640575.jpg', '628e18dc5874d2702dcf07867071c8bf.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1671874481, 1671874481),
(860, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672041933, 1672041933),
(861, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672042009, 1672042009),
(862, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 757, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672047779, 1672047779),
(863, NULL, 3312, 5699, 0, '', '', NULL, NULL, 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672109410, 1672109410),
(864, NULL, 3312, 5699, 0, '', '', NULL, NULL, 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672109429, 1672109429),
(865, NULL, 3312, 5699, 0, '', '', NULL, NULL, 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672109453, 1672109453),
(866, NULL, 3312, 5699, 0, '', 'chia sẻ album', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672109525, 1672109525),
(867, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 866, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672125037, 1672125037),
(868, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 866, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672125068, 1672125068),
(869, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 866, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672125094, 1672125094),
(870, NULL, 3312, 5699, 0, '', 'share album 2', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672126466, 1672126466),
(871, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672126716, 1672126716),
(872, NULL, 3312, 5699, 0, '', 'edit post share album', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672126829, 1672126829),
(873, NULL, 3312, 5699, 0, '', 'share album 3', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672126845, 1672126845),
(874, NULL, 3312, 5699, 0, '', 'share album 4', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672126987, 1672126987),
(875, NULL, 3312, 5699, 0, '', 'share album 5', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672127356, 1672127356),
(876, NULL, 3312, 5699, 0, '', 'share album 5', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672127375, 1672127375),
(877, NULL, 3312, 5699, 0, '', 'share album to the others wall', '', '', 0, 0, 9798, 2, 0, '', NULL, NULL, 0, 0, '', 2, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672132203, 1672132203),
(878, NULL, 72132, 51770, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 786, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672133640, 1672133640),
(880, NULL, 72132, 51770, 0, '', 'thành viên nhóm chia sẻ bài viết', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 841, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672134196, 1672134196),
(882, NULL, 72132, 51770, 0, '', '5fa54asg2agasgasgasgasg', '../img/new_feed/dang_tin/image/51770/1462008340.jpg||../img/new_feed/dang_tin/image/51770/1897818844.jpg||../img/new_feed/dang_tin/image/51770/525663658.jpg', 'thu-xin-viec-tu-van-vien-tieng-viet-mau9-loai1-vieclam123.jpg||thu-xin-viec-tu-van-vien-tieng-viet-mau9-loai2-vieclam123.jpg||thu-xin-viec-tu-van-vien-tieng-viet-mau9-loai3-vieclam123.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '51770', 1672134360, 1672134360),
(883, NULL, 3312, 5699, 0, '', 'share album to the others wall', '', '', 0, 0, 5750, 2, 0, '', NULL, NULL, 0, 0, '', 2, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672136880, 1672136880),
(884, NULL, 3312, 8296, 0, '', 'tét nhóm mới', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '', 0, 0, '', 1672193287, 1672193287),
(886, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 4, 0, '', 0, 0, '', 1672196348, 1672196348),
(887, NULL, 3312, 8296, 0, '', 'bài viết mới trong ngày', '../img/new_feed/dang_tin/image/8296/572919887.jpg||../img/new_feed/dang_tin/image/8296/1106318712.png||../img/new_feed/dang_tin/image/8296/83287804.png||../img/new_feed/dang_tin/image/8296/1680697319.png', 'avatar.jpg||bg1.png||bg2.png||bg3.png', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1672196880, 1672196880),
(888, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 887, 2, '', '', 0, 0, 0, '', 0, 0, '', 1672197434, 1672197434),
(889, NULL, 3312, 8296, 0, '51770', 'tag', '../img/new_feed/dang_tin/image/8296/708397025.jpg', 'thu-xin-viec-tu-van-vien-9-vieclam123.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296,51770', 0, 0, '', 1672221232, 1672221232),
(890, NULL, 72132, 51770, 0, '', 'OK 1234567890-', '../img/new_feed/dang_tin/image/51770/2098914294.jpg||../img/new_feed/dang_tin/image/51770/1893471718.jpg', 'thu-xin-viec-tu-van-vien-9-vieclam123.jpg||thu-xin-viec-tu-van-vien-tieng-viet-mau9-loai2-vieclam123.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '51770', 0, 0, '', 1672287798, 1672304119),
(891, NULL, 72132, 51770, 0, '', 'Bài chờ', '../img/new_feed/dang_tin/image/51770/1911248253.jpg||../img/new_feed/dang_tin/image/51770/787185873.jpg||../img/new_feed/dang_tin/image/51770/286052644.jpg||../img/new_feed/dang_tin/image/51770/945366321.jpg', 'thu-xin-viec-tu-van-vien-9-vieclam123.jpg||thu-xin-viec-tu-van-vien-tieng-viet-mau9-loai1-vieclam123.jpg||thu-xin-viec-tu-van-vien-tieng-viet-mau9-loai2-vieclam123.jpg||thu-xin-viec-tu-van-vien-tieng-viet-mau9-loai3-vieclam123.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '51770', 0, 0, '', 1672287884, 1672287884),
(892, NULL, 3312, 8296, 0, '', 'Bài viết mới', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '8296,8296', 1672302196, 1672302196),
(893, NULL, 3312, 5750, 0, '111795', '', '../img/new_feed/dang_tin/image/5750/54651111.gif||../img/new_feed/dang_tin/image/5750/569436415.gif||../img/new_feed/dang_tin/video/5750/598946927.mp4||../img/new_feed/dang_tin/video/5750/1365287308.mov', 'avt.gif||giphy.gif||pexels-nataliya-vaitkevich-6757681.mp4||video.mov', 0, 0, 0, 2, 0, '', 5, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750,111795', 0, 0, '', 1672371987, 1672371987),
(894, NULL, 3312, 5750, 0, '111795', '', '../img/new_feed/dang_tin/image/5750/471561754.gif||../img/new_feed/dang_tin/image/5750/1629658154.gif||../img/new_feed/dang_tin/video/5750/287918897.mp4||../img/new_feed/dang_tin/video/5750/92298492.mov', 'avt.gif||giphy.gif||pexels-nataliya-vaitkevich-6757681.mp4||video.mov', 0, 0, 0, 2, 0, '', 5, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750,111795', 0, 0, '', 1672372014, 1672372014),
(895, NULL, 3312, 5750, 0, '111795', '', '../img/new_feed/dang_tin/image/5750/894109378.gif||../img/new_feed/dang_tin/image/5750/1763821298.gif||../img/new_feed/dang_tin/video/5750/1312014552.mp4||../img/new_feed/dang_tin/video/5750/289834912.mov', 'avt.gif||giphy.gif||pexels-nataliya-vaitkevich-6757681.mp4||video.mov', 0, 0, 0, 2, 0, '', 5, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750,111795', 0, 0, '', 1672372016, 1672372016),
(896, NULL, 3312, 5750, 0, '111795', '', '../img/new_feed/dang_tin/image/5750/649034017.gif||../img/new_feed/dang_tin/image/5750/1012160905.gif||../img/new_feed/dang_tin/video/5750/1417541013.mp4||../img/new_feed/dang_tin/video/5750/2081434231.mov', 'avt.gif||giphy.gif||pexels-nataliya-vaitkevich-6757681.mp4||video.mov', 0, 0, 0, 2, 0, '', 5, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750,111795', 0, 0, '', 1672372199, 1672372199),
(897, NULL, 3312, 5750, 0, '111795', '', '../img/new_feed/dang_tin/image/5750/509513603.gif||../img/new_feed/dang_tin/image/5750/1300166184.gif||../img/new_feed/dang_tin/video/5750/487164156.mp4||../img/new_feed/dang_tin/video/5750/1886971681.mov', 'avt.gif||giphy.gif||pexels-nataliya-vaitkevich-6757681.mp4||video.mov', 0, 0, 0, 2, 0, '', 5, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750,111795', 0, 0, '', 1672372202, 1672372202),
(898, NULL, 3312, 5750, 0, '', '', '../img/new_feed/dang_tin/image/5750/1889387169.gif||../img/new_feed/dang_tin/image/5750/2075584258.gif||', 'avt.gif||giphy.gif||', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750', 0, 0, '', 1672372291, 1672372291),
(899, NULL, 3312, 5750, 0, '111795', '', '../img/new_feed/dang_tin/image/5750/433090989.gif', 'giphy.gif', 0, 0, 0, 2, 0, '', 5, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750,111795', 0, 0, '', 1672372460, 1672372460),
(900, NULL, 3312, 5750, 0, '111795', '', '../img/new_feed/dang_tin/image/5750/1386723191.gif', 'giphy.gif', 0, 0, 0, 2, 0, '', 5, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750,111795', 0, 0, '', 1672372461, 1672372461),
(901, NULL, 3312, 5750, 0, '111795', '', '../img/new_feed/dang_tin/video/5750/1560514166.mp4||../img/new_feed/dang_tin/video/5750/1047693423.mov||../img/new_feed/dang_tin/image/5750/277384350.gif||../img/new_feed/dang_tin/image/5750/1246595984.gif', 'pexels-nataliya-vaitkevich-6757681.mp4||video.mov||avt.gif||giphy.gif', 0, 0, 0, 2, 0, '', 5, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750,111795', 0, 0, '', 1672372462, 1672372462),
(902, NULL, 3312, 5750, 0, '', '', '../img/new_feed/dang_tin/image/5750/1245927350.gif', 'giphy.gif', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750', 0, 0, '', 1672372487, 1672372487),
(903, NULL, 3312, 5750, 0, '', '', '../img/new_feed/dang_tin/image/5750/137621603.gif', 'giphy.gif', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750', 0, 0, '', 1672372488, 1672372488),
(904, NULL, 3312, 5750, 0, '', '', '../img/new_feed/dang_tin/image/5750/2136448347.gif', 'giphy.gif', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750', 0, 0, '', 1672372491, 1672372491),
(905, NULL, 3312, 5750, 0, '', '', '../img/new_feed/dang_tin/image/5750/1710005243.gif', 'giphy.gif', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 1, '', '', 0, 0, 0, '5750', 0, 0, '', 1672372495, 1672372495),
(911, NULL, 3312, 5699, 0, '', 'lạnh quáaaaaaaaaaa', '../img/new_feed/dang_tin/file/5699/380331037.TXT||../img/new_feed/dang_tin/image/5699/829276479.jpg||../img/new_feed/dang_tin/video/5699/182982743.mp4', 'Hệ thống tự cứu nhân vật phản diện.TXT||313422348_492940612880178_2717671779406848977_n.jpg||320115429_5339017542868803_5240411443237187227_n.mp4', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1672375430, 1672375430),
(912, NULL, 3312, 5699, 0, '', '', NULL, NULL, 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 6, 0, '', 0, 0, '', 1672393497, 1672393497),
(917, NULL, 3312, 5737, 0, '', '', '../img/new_feed/dang_tin/image/5737/1428394744.jpg', 'discount-voucher-gift-box-shopping-cart-shopping-concept-orange-background-3d-rendering.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5737', 0, 0, '', 1672623818, 1672623818),
(918, NULL, 3312, 5737, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 765, 0, '', '', 0, 0, 0, '5737', 0, 0, '', 1672623926, 1672623926),
(919, NULL, 3312, 5737, 0, '', 'xxxxx', '', '', 0, 0, 64, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5737', 0, 0, '', 1672624944, 1672624944),
(920, NULL, 3312, 8296, 0, '', 'video', '../img/new_feed/dang_tin/video/8296/1547989188.mp4', '638062598016484288-6410558307793478993.mp4', 0, 1, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1672633901, 1672840083),
(921, NULL, 3312, 8296, 0, '', '2 video 1 ảnh', '../img/new_feed/dang_tin/video/8296/811660323.mp4||../img/new_feed/dang_tin/video/8296/288011383.mp4||../img/new_feed/dang_tin/image/8296/1639585634.jpg', '638062598016484288-6410558307793478993.mp4||638062598016484288-6410558307793478993.mp4||avatar.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1672643789, 1672643789),
(922, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 5, '5699', 0, 0, '', 1672709767, 1672709767),
(923, 'e', 3312, 5699, 7, '', '<p>d</p>\r\n', NULL, NULL, 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672712749, 1672712749),
(924, NULL, 3312, 8296, 0, '', 'iii\r\nz', '../img/new_feed/dang_tin/image/8296/384114181.jpg', 'avatar.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1672714134, 1672714134),
(925, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 883, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672730665, 1672730665),
(927, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 5, '5699', 0, 0, '', 1672759735, 1672759735),
(928, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 6, 0, '5699', 0, 0, '', 1672759918, 1672759918),
(929, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 6, 0, '5699', 0, 0, '', 1672760556, 1672760556),
(930, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 6, 0, '5699', 0, 0, '', 1672760604, 1672760604),
(931, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 6, 0, '5699', 0, 0, '', 1672760667, 1672760667),
(932, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 7652, 2, 0, '', NULL, NULL, 0, 0, '', 2, 0, 0, '', '', 0, 6, 0, '5699', 0, 0, '', 1672761323, 1672761323),
(933, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 4, 0, '5699', 0, 0, '', 1672762658, 1672762658),
(934, NULL, 3312, 5699, 0, '', 'edit', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', 'ko thik đó', 0, 4, 0, '5699', 0, 0, '', 1672764438, 1672764438),
(935, NULL, 3312, 5699, 0, '', 'edit', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', 'từ chối làm gì đk nhau', 0, 4, 0, '5699', 0, 0, '', 1672764550, 1672764550),
(936, NULL, 3312, 5699, 0, '', 'edit', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 4, 0, '5699', 0, 0, '9798', 1672764562, 1672767159),
(937, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 4, 0, '5699', 0, 0, '', 1672764642, 1672764642),
(938, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 927, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1672767780, 1672767780),
(939, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 7652, 2, 0, '', NULL, NULL, 0, 0, '', 2, 0, 0, '', '', 0, 0, 5, '5699', 0, 0, '', 1672795590, 1672795590),
(940, NULL, 3312, 5699, 0, '', '', NULL, NULL, 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1672802128, 1672802128),
(941, NULL, 1636, 9798, 0, '', '', '', '', 0, 0, 5699, 2, 0, '', NULL, NULL, 0, 0, '', 2, 0, 0, '', '', 0, 4, 0, '9798', 0, 0, '', 1672817828, 1672817828),
(942, NULL, 72132, 51770, 0, '', 'Test báo cáo', '../img/new_feed/dang_tin/image/51770/1908171265.jpg', 'avatar.jpg', 0, 1, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 1, 0, 0, '51770,8296', 0, 0, '', 1672846732, 1673234657),
(943, NULL, 3312, 8296, 0, '', 'Chị đọc được check chat  11:17 - 1/4/2023', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1672849061, 1672849061),
(944, NULL, 72132, 51770, 0, '', 'Bài viết chờ', '../img/new_feed/dang_tin/image/51770/1378418874.png', 'EVERYTHING CHANGED WITH UNTIL LATER [TERMINADA] - ????Te gustó????.png', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '51770', 0, 0, '', 1672883706, 1672883706),
(950, 'ágasgaga', 72132, 51770, 7, '', '<p>g&agrave;8a4523</p>\r\n', NULL, NULL, 0, 0, 0, 2, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0, '', '', 0, 0, 0, '', 0, 0, '', 1672889731, 1672889731),
(951, NULL, 3312, 8296, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 950, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1672889846, 1672889846),
(952, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 9798, 2, 0, '', NULL, NULL, 0, 0, '', 2, 950, 0, '', '', 0, 0, 0, '5699', 0, 0, '5699', 1672889962, 1672889962),
(953, NULL, 3312, 8296, 0, '', '', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '8296', 0, 0, '', 1672891161, 1672891161),
(954, NULL, 3312, 8296, 0, '', '', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '8296', 0, 0, '', 1672891242, 1672891242),
(955, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1672891282, 1672891282),
(956, NULL, 3312, 8296, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 36, '8296', 0, 0, '', 1672891375, 1672891375),
(957, NULL, 3312, 8296, 0, '', 'Chia sẻ đê', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 36, '8296', 0, 0, '', 1672891475, 1672891475),
(958, NULL, 72132, 51770, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 942, 0, '', '', 0, 0, 0, '51770', 0, 0, '', 1672899668, 1672899668),
(962, NULL, 72132, 51770, 0, '', 'group khác', '', '', 0, 0, 3138, 2, 0, '', NULL, NULL, 0, 0, '', 0, 889, 0, '', '', 0, 0, 0, '51770', 0, 0, '', 1672903020, 1672903020),
(963, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 7, 0, '5699', 0, 0, '', 1672907039, 1672907039),
(965, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1672907750, 1672907750),
(966, NULL, 3312, 5699, 0, '', '', '../img/new_feed/dang_tin/image/5699/66337349.jpg', 'truong-triet-han-son-ha-lenh-5.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1672907787, 1672907787),
(967, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1672907804, 1672907804),
(968, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1672908972, 1672908972),
(969, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1672909008, 1672909008),
(970, NULL, 3312, 5699, 0, '', '', NULL, NULL, 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 6, 0, '', 0, 0, '', 1672913206, 1672913206),
(971, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '5699', 0, 0, '', 1672967288, 1672967288),
(972, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 942, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1672974983, 1672974983),
(973, NULL, 3312, 5699, 0, '', '1', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '5699', 0, 0, '', 1672975012, 1672975012),
(974, NULL, 3312, 5699, 0, '', '2', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '5699', 0, 0, '', 1672975030, 1672975030),
(975, NULL, 3312, 5699, 0, '', '3', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '5699', 0, 0, '', 1672975048, 1672975048),
(976, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 36, '5699', 0, 0, '', 1672996509, 1672996509),
(977, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 6, 0, '5699', 0, 0, '', 1672996525, 1672996525),
(978, NULL, 3312, 8296, 0, '', 'Không img/file/video', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 1, 0, 0, '8296', 0, 0, '', 1673023896, 1673024011),
(979, NULL, 3312, 8296, 0, '', 'Bài viết Ngày 1/7/2023', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1673029925, 1673029985),
(980, NULL, 0, 0, 0, '', '', NULL, NULL, 0, 0, 0, 0, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1673054689, 1673054689),
(981, NULL, 0, 0, 0, '', '', NULL, NULL, 0, 0, 0, 0, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 4, 0, '', 0, 0, '', 1673054692, 1673054692),
(982, NULL, 1636, 9798, 0, '', 'tèn ten', '../img/new_feed/dang_tin/image/9798/846574433.jpg||../img/new_feed/dang_tin/image/9798/1725138851.jpg||../img/new_feed/dang_tin/image/9798/1075946442.jpg', '323162624_858673255339005_4809592622635482003_n.jpg||322934403_834641957607397_753914638393086270_n.jpg||322581985_846480256621214_6665377671358872440_n.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '9798', 0, 0, '', 1673056532, 1673056532),
(983, NULL, 1636, 9798, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 982, 0, '', '', 0, 0, 0, '9798', 0, 0, '', 1673056689, 1673056689),
(984, NULL, 1636, 7652, 0, '', '', '', '', 0, 0, 5699, 2, 0, '', NULL, NULL, 0, 0, '', 2, 982, 0, '', '', 0, 0, 0, '9798', 0, 0, '', 1673056706, 1673056706),
(985, NULL, 3312, 5713, 0, '43412,13353', 'ôi, bây giờ có chuyến đi Hà Giang thì thích nhỉ? Nhớ mùa lúa chín Hà Giang quá đi', '../img/new_feed/dang_tin/image/5713/1404921617.JPG||../img/new_feed/dang_tin/image/5713/632632391.JPG||../img/new_feed/dang_tin/image/5713/579549263.JPG', 'IMG_1576.JPG||IMG_1577.JPG||IMG_1578.JPG', 0, 0, 70, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '5713,43412,13353', 0, 0, '', 1673063997, 1673065814),
(986, NULL, 3312, 5699, 0, '', 'con của long', '../img/new_feed/dang_tin/image/5699/64621040.jpg||../img/new_feed/dang_tin/image/5699/465932716.jpg||../img/new_feed/dang_tin/image/5699/684600734.jpg||../img/new_feed/dang_tin/5699/image/808050535.jpg', '323162624_858673255339005_4809592622635482003_n.jpg||322934403_834641957607397_753914638393086270_n.jpg||322581985_846480256621214_6665377671358872440_n.jpg||270187667_364329738833371_3605796423956581982_n.jpg', 0, 0, 7652, 2, 0, '', NULL, NULL, 0, 0, '', 2, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673064094, 1673064094),
(987, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 985, 0, '', '', 0, 0, 0, '5713', 0, 0, '', 1673076470, 1673076470),
(988, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 985, 0, '', '', 0, 0, 0, '5713', 0, 0, '', 1673076473, 1673076473),
(989, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 985, 0, '', '', 0, 0, 0, '5713', 0, 0, '', 1673076474, 1673076474),
(990, NULL, 3312, 5713, 0, '', 'ôi, thật nhớ quá đi', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 985, 0, '', '', 0, 0, 0, '5713', 0, 0, '', 1673076508, 1673076508),
(991, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 985, 0, '', '', 0, 0, 0, '5713', 0, 0, '', 1673076635, 1673076635),
(992, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 985, 0, '', '', 0, 0, 0, '5713', 0, 0, '', 1673076640, 1673076640),
(993, NULL, 3312, 5713, 0, '', 'Hôm sau chúng tôi đi Sapa, phong cảnh ở đây thật đẹp!', '../img/new_feed/dang_tin/image/5713/1124066681.jpg', 'traveler-la-gi.jpg', 0, 0, 70, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5713', 0, 0, '', 1673077633, 1673077779),
(994, NULL, 3312, 5713, 0, '', 'Đi Sapa cho vui đi ông cháu ơi!', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 70, '5713', 0, 0, '', 1673077964, 1673077964),
(995, NULL, 1664, 3714, 0, '', 'Lại nhớ đến thời sinh viên được vùng vẫy, cứ có thời gian lại phi đi chơi,  vô lo vô nghĩ về cơm áo gạo tiền.', '../img/new_feed/dang_tin/image/3714/301889993.jpg', '34572bd3bf0c5d52041d.jpg', 0, 0, 70, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '3714', 0, 0, '', 1673078351, 1673084571),
(996, NULL, 1664, 3714, 0, '', 'Phượt là cuộc sống! yo', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 995, 0, '', '', 0, 0, 0, '3714', 0, 0, '', 1673079843, 1673079843),
(997, NULL, 3312, 5699, 0, '', 'unfollow', '', '', 0, 0, 5, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673084085, 1673084085),
(998, NULL, 3312, 5699, 0, '', 'yeah ah alo đang mô qua đây ghi cho t con lô', '../img/new_feed/dang_tin/image/5699/1831704468.jpg||../img/new_feed/dang_tin/image/5699/1785378835.jpg||../img/new_feed/dang_tin/image/5699/767974919.jpg', 'FB_IMG_1590391654013.jpg||FB_IMG_1590391651992.jpg||FB_IMG_1590391649370.jpg', 0, 0, 14339, 2, 0, '', NULL, NULL, 0, 0, '', 2, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673085095, 1673085095),
(999, NULL, 3312, 9798, 0, '', 'unfollow group and unfollow friend', '', '', 0, 0, 5, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673084085, 1673084085),
(1000, NULL, 1664, 3714, 0, '', 'Ôi, Tết sắp về trên lối nhỏ, lại nhớ da diết cảnh nhà nhà quây quần bên bên lửa, nấu bánh chưng!', '../img/new_feed/dang_tin/image/3714/649921364.JPG', 'IMG_1599.JPG', 0, 1, 70, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '3714,5713,5713', 0, 0, '', 1673086743, 1673233259),
(1001, NULL, 3312, 5699, 0, '', 'admin đăng bài nè', '', '', 0, 0, 51, 2, 4, '8296,9798,7652,5750,13363', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673099667, 1673099667),
(1002, NULL, 1636, 9798, 0, '5699,8296', 'thành viên đăng bài', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '9798,	\n5699,8296', 0, 0, '', 1673099965, 1673606389),
(1003, NULL, 3312, 8296, 0, '', 'fsdfsaasfaf', '', '', 0, 0, 68, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1673229413, 1673229413),
(1004, NULL, 57, 168, 0, '', 'Nếu ngày xưa, bước đi nhanh trên con đường mưa, thì anh sẽ không gặp người!!!', '../img/new_feed/dang_tin/image/168/2024729666.jpg||../img/new_feed/dang_tin/image/168/1173589101.JPG', 'Hưởng3.jpg||IMG_7216.JPG', 0, 0, 70, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '168', 0, 0, '', 1673230249, 1673230249),
(1005, NULL, 57, 168, 0, '', 'Nếu ngày xưa, bước đi nhanh trên con đường mưa, thì anh sẽ không gặp người!!!', '../img/new_feed/dang_tin/image/168/1436109122.jpg||../img/new_feed/dang_tin/image/168/192150646.JPG', 'Hưởng3.jpg||IMG_7216.JPG', 0, 0, 70, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '168', 0, 0, '', 1673230250, 1673230250),
(1006, NULL, 3312, 8296, 0, '', '8745124512', '', '', 0, 0, 68, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1673230383, 1673230383),
(1007, NULL, 3312, 5713, 0, '', 'Trăng ơi từ đâu đến\nHay biển xanh diệu kỳ\n\nTrăng tròn như mắt cá\n\nChẳng bao giờ chớp mi', '../img/new_feed/dang_tin/image/5713/1344780675.jpg', 'Ghe-Ban-Cong-Chung-Cu-Ngoai-Troi.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 0, 0, '', 1673231408, 1673231408),
(1008, NULL, 3312, 8296, 0, '', '', '../img/new_feed/dang_tin/file/8296/1306730656.sql', 'user (1) - Copy.sql', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 0, 0, '', 1673234446, 1673234446),
(1009, NULL, 3312, 5699, 0, '', '11h8', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5699', 1673236800, 0, '', 1673237125, 1673237481),
(1010, NULL, 3312, 8296, 0, '', 'Bài lên lịch', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673309700, 0, '', 1673237722, 1673309700),
(1011, NULL, 3312, 5699, 0, '', '11h17', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5699', 1673237820, 0, '', 1673237736, 1673237820),
(1012, NULL, 3312, 8296, 0, '', 'POST LỊCH OK', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673295600, 0, '', 1673238034, 1673295600),
(1013, NULL, 3312, 5713, 0, '', 'Trăng ơi từ đâu đến\r\nHay biển xanh diệu kỳ\r\nTrăng tròn như mắt cá\r\nChẳng bao giờ chớp mi', '../img/new_feed/dang_tin/image/5713/1977974096.jpg', 'cay-nen-trong-trong-phong-ngu-1.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673248477, 0, '', 1673248477, 1673248477),
(1014, NULL, 3312, 5713, 0, '18680,13964,13353', 'Nếu ngày xưa bước đi nhanh trên con đường mưa, thì anh đã không gặp người yêu hoa cỏ và giờ tôi lại yêu hoa cỏ hơn xưa.', '../img/new_feed/dang_tin/image/5713/1634269303.jpg||../img/new_feed/dang_tin/image/5713/333193516.jpg||../img/new_feed/dang_tin/image/5713/1955949334.jpg||../img/new_feed/dang_tin/image/5713/799130091.jpg', 'cay-nen-trong-trong-phong-ngu-1.jpg||cay-nen-trong-trong-phong-ngu-2.jpg||cay-nen-trong-trong-phong-ngu-4.jpg||cay-nen-trong-trong-phong-ngu-66.jpg', 0, 0, 0, 2, 2, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713,18680,13964,13353', 1673248893, 0, '', 1673248893, 1673248893),
(1015, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673251063, 0, '', 1673251063, 1673251063),
(1016, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673251131, 0, '', 1673251131, 1673251131),
(1017, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673251132, 0, '', 1673251132, 1673251132),
(1018, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673251135, 0, '', 1673251135, 1673251135),
(1019, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673251136, 0, '', 1673251136, 1673251136),
(1020, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673251137, 0, '', 1673251137, 1673251137),
(1021, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673251249, 0, '', 1673251249, 1673251249),
(1022, NULL, 3312, 5713, 0, '', 'Ôi, thiên nhiên thật đáng yêu biết bao nhiêu. Ước gì có một căn hộ rộng rãi như thế này nhỉ.', '../img/new_feed/dang_tin/image/5713/1164548855.jpg||../img/new_feed/dang_tin/image/5713/1150835202.jpg', 'can-ho-ap-mai-la-gi.jpg||can-ho-ap-mai-la-gi-1.jpg', 0, 0, 71, 2, 0, '', 2, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5713', 1673251625, 0, '', 1673251625, 1673251625),
(1023, NULL, 57, 168, 0, '', 'Hà Giang chưa uống đã say!!!!', '../img/new_feed/dang_tin/image/168/116912017.jpg', 'trang-2.jpg', 0, 0, 71, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '168', 1673251863, 0, '', 1673251863, 1673251863),
(1024, NULL, 57, 168, 0, '', 'Một năm nữa lại đến, Mập lại xa gia đình thêm 1 tuổi nữa rồi!', '../img/new_feed/dang_tin/image/168/957908314.png', 'Background (3).png', 0, 1, 71, 2, 0, '', 9, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '168', 1673252741, 0, '', 1673252741, 1673253195),
(1025, NULL, 3312, 5699, 0, '', '', NULL, NULL, 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 15, 0, '', 0, 0, '', 1673260649, 1673260649),
(1026, NULL, 3312, 8296, 0, '', 'Bài viết chờ lịch / Ảnh', '../img/new_feed/dang_tin/image/8296/1224138297.png', 'EVERYTHING CHANGED WITH UNTIL LATER [TERMINADA] - ????Te gustó????.png', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673376300, 0, '', 1673289817, 1673376300),
(1030, NULL, 3312, 8296, 0, '', 'Lịch 2 Ảnh', '../img/new_feed/dang_tin/image/8296/1052147003.png||../img/new_feed/dang_tin/image/8296/1779632747.png', 'EVERYTHING CHANGED WITH UNTIL LATER [TERMINADA] - ????Te gustó????.png||EVERYTHING CHANGED WITH UNTIL LATER [TERMINADA] - ????Te gustó????.png', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673291155, 0, '', 1673291155, 1673291155),
(1031, NULL, 3312, 8296, 0, '', '2 Ảnh lịch', '../img/new_feed/dang_tin/image/8296/132379833.png||../img/new_feed/dang_tin/image/8296/2142217989.png', 'EVERYTHING CHANGED WITH UNTIL LATER [TERMINADA] - ????Te gustó????.png||EVERYTHING CHANGED WITH UNTIL LATER [TERMINADA] - ????Te gustó????.png', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673402649, 0, '', 1673291186, 1673402649),
(1032, NULL, 3312, 5713, 0, '', 'Hãy yêu thiên nhiên, vì thiên nhiên là cội nguồn của sự sống', '../img/new_feed/dang_tin/image/5713/82066731.jpg', 'trang.jpg', 0, 0, 70, 2, 2, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5713', 1673316001, 0, '', 1673316001, 1673316001),
(1033, NULL, 3312, 5713, 0, '', 'Hãy yêu thiên nhiên, vì thiên nhiên là cội nguồn của sự sống', '../img/new_feed/dang_tin/image/5713/1555051628.jpg', 'trang.jpg', 0, 0, 70, 2, 2, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5713', 1673316003, 0, '', 1673316003, 1673316003),
(1034, NULL, 3312, 5713, 0, '', 'Gió ơi gió, đừng vội kéo mây', '../img/new_feed/dang_tin/image/5713/318544130.JPG', 'IMG_1580.JPG', 0, 0, 70, 2, 2, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5713', 1673316337, 0, '', 1673316337, 1673316337),
(1035, NULL, 3312, 5713, 0, '', 'Hôm được ăn quả chè khúc bạch mới biết được đây là chè khúc bạch nè! Nhìn lạ lắm nha.', '../img/new_feed/dang_tin/image/5713/1798444721.jpg', 'tải xuống.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 73, 1, '\r\n                    \r\n                    Quận Hoàng Mai, Hà Nội                    \r\n                ', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673333852, 0, '5713', 1673333852, 1673333852),
(1036, NULL, 3312, 5713, 0, '13964', 'Ăn chè đê các bạn ơi!!!', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1035, 0, '', '', 0, 0, 0, '5713,13964', 1673336483, 0, '', 1673336483, 1673336483),
(1037, NULL, 3312, 5699, 0, '133756,133737,116101', 'tag', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5699,133756,133737,116101', 1673337137, 0, '', 1673337137, 1673337137),
(1038, NULL, 3312, 5713, 0, '43412', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1035, 0, '', '', 0, 0, 0, '5713,43412', 1673337221, 0, '', 1673337221, 1673337221),
(1039, NULL, 3312, 5713, 0, '', 'Ăn chè sầu đi các bạn ơi!', '', '', 0, 0, 3429, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1035, 0, '', '', 0, 0, 0, '5713', 1673337279, 0, '', 1673337279, 1673337279),
(1040, NULL, 3312, 5699, 0, '', 'share post \r\nfrom group', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 1037, 0, '', '', 0, 0, 0, '5699', 1673338502, 0, '', 1673338502, 1673338502),
(1041, NULL, 3312, 5713, 0, '133756,133737,116101,83953,45618,43412', 'nào quý công ty mới nhan viên đi ăn chè nhé!', '', '', 0, 0, 1664, 2, 0, '', NULL, NULL, 0, 0, '', 2, 1018, 0, '', '', 0, 0, 0, '5713,133756,133737,116101,83953,45618,43412', 1673338881, 0, '5713,5713,5713', 1673338881, 1673338881),
(1042, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1007, 0, '', '', 0, 0, 0, '5699', 1673339140, 0, '', 1673339140, 1673339140),
(1043, NULL, 3312, 5713, 0, '', 'Quãng thời gian sinh viên quả là đáng nhớ. Dạo đó thay vì tập trung vào những công việc liên quan đến chuyên ngành, tôi lao đầu vào bưng bê,quán xá để kiếm tiền. Nghĩ lại, nhiều ngày đi học về rồi làm đến tối 9 giờ với lương cả tháng chưa đến 2 triệu, tôi lại thấy buồn.', '../img/new_feed/dang_tin/video/5713/1523779468.MOV', 'DSCN5650.MOV', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673340561, 0, '', 1673340561, 1673340561),
(1044, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673340887, 0, '', 1673340887, 1673340887),
(1045, NULL, 3312, 5713, 0, '111788,83953,58070', 'Chó xinh quá đê!', '', '', 0, 0, 71, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5713,111788,83953,58070', 1673343203, 0, '', 1673343203, 1673343203),
(1046, NULL, 3312, 5713, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1022, 0, '', '', 0, 0, 0, '5713', 1673343568, 0, '', 1673343568, 1673343568),
(1047, NULL, 3312, 5713, 0, '', 'Nhà đẹp!', '', '', 0, 0, 12852, 2, 0, '', NULL, NULL, 0, 0, '', 2, 1022, 0, '', '', 0, 0, 0, '5713', 1673345543, 0, '', 1673345543, 1673345543),
(1048, NULL, 3312, 5713, 0, '', 'Nhớ nhà quá, tự nhiên muốn bỏ hết, về quê với bố mẹ, không lo không nghĩ gì cả! Nhiều người trẻ muốn lớn nhanh để nhanh chóng đi làm, kiếm tiền. Nhưng nhiều người khi có công ăn việc làm ổn định rồi, có thể kiếm ra được vài chục triệu mỗi ngày, họ lại thèm thuồng cái cảm giác trở về những giây phút khó khăn trong quá khứ, trở về với cội nguộn, nhưng thứ nguyên sơ thuở ban đầu của mình. Cuộc đời thật khó nói.', '../img/new_feed/dang_tin/image/5713/62789089.jpg', 'mập.jpg', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673346250, 0, '5713', 1673346250, 1673346250),
(1049, NULL, 3312, 5713, 0, '', 'Chiêm nghiệm để có động lực cố gắng!', '', '', 0, 0, 71, 2, 0, '', NULL, NULL, 0, 0, '', 1, 1043, 0, '', '', 0, 0, 0, '5713', 1673399241, 0, '', 1673399241, 1673399241),
(1051, NULL, 3312, 8296, 0, '', 'Lịch post chia se nhóm', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 1031, 0, '', '', 0, 0, 0, '8296', 1673403190, 0, '', 1673403190, 1673403190),
(1052, NULL, 3312, 8296, 0, '', '+6521lkjhgfd', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673403247, 0, '', 1673403247, 1673403247),
(1055, NULL, 3312, 8296, 0, '', '', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 842, 0, '', '', 0, 0, 0, '8296', 1673404241, 0, '', 1673404241, 1673404241),
(1057, NULL, 3312, 5713, 0, '', 'Với những ai đã trót “nặng lòng” với Tây Bắc như tôi, trót  yêu những cung đường phượt nắng vàng rải trên mô tô khi băng qua những nẻo đường đến Hà Giang, Sapa, Mai Châu..để tận hưởng cảm giác thư giãn  trong những ngôi nhà tranh đan cài giữa rừng cây thì chắc chắn một điều rằng khái niệm Ecolodge là gì không còn xa lạ với bạn nữa.', '../img/new_feed/dang_tin/image/5713/1177005171.jpg', 'cay-nen-trong-trong-phong-ngu-99.jpg', 0, 0, 70, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '5713', 1673404420, 0, '', 1673404420, 1673404420),
(1060, NULL, 3312, 5713, 0, '', 'Join nhóm để bảo vệ thiên nhiên thôi nào!!!', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 71, '5713', 1673405315, 0, '', 1673405315, 1673405315),
(1061, NULL, 3312, 5713, 0, '', 'Lớp một ơi, lớp một\r\nĐón e vào năm trước\r\nNay giờ phút chia tay\r\nGửi lời chào tiến bước\r\nChào bảng đen cửa sổ\r\nChào chỗ ngồi thân quen\r\nTất cả chào ở lại\r\nĐón các bạn nhỏ lên\r\nChào cô giáo kính mến\r\nCô sẽ xa chúng em\r\nlàm theo lời cô dạy\r\nCô sẽ luôn ở bên!', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673406218, 0, '', 1673406218, 1673406218),
(1062, NULL, 3312, 5713, 0, '', 'Lớp một ơi, lớp một\r\nĐón e vào năm trước\r\nNay giờ phút chia tay\r\nGửi lời chào tiến bước\r\nChào bảng đen cửa sổ\r\nChào chỗ ngồi thân quen\r\nTất cả chào ở lại\r\nĐón các bạn nhỏ lên\r\nChào cô giáo kính mến\r\nCô sẽ xa chúng em\r\nlàm theo lời cô dạy\r\nCô sẽ luôn ở bên!', '', '', 0, 0, 0, 2, 3, '12483,5761,1664', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673406222, 0, '', 1673406222, 1673406222),
(1063, NULL, 3312, 5713, 0, '', 'OK con dê!!!', '', '', 0, 0, 10551, 2, 0, '', NULL, NULL, 0, 0, '', 2, 0, 0, '', '', 0, 0, 71, '5713', 1673408359, 0, '', 1673408359, 1673408359),
(1066, NULL, 3312, 8296, 0, '51770,15211', 'tag ggg', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296,51770', 1673408673, 0, '', 1673408673, 1673408673),
(1067, NULL, 3312, 8296, 0, '', 'Biểu cảm 1', '', '', 0, 0, 36, 2, 0, '', 22, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673411255, 0, '', 1673411255, 1673411255),
(1068, NULL, 3312, 5713, 0, '', 'Bạn là một fan cuồng du lịch và hết lòng với đam mê Phượt xe máy, hãy trải nghiệm Hà Giang đi nhé. Đây chắc chắn là một trải nghiệm có một không hai, khó lòng quên được nhé. Đi đi để biết Đất nước mình đẹp như thế nào nhé.', '../img/new_feed/dang_tin/5713/image/1153378843.jpg', 'cay-nen-trong-trong-phong-ngu-4.jpg', 0, 0, 0, 2, 3, '1664', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5713', 1673411427, 0, '', 1673411427, 1673411427),
(1072, NULL, 3312, 8296, 0, '', 'Hoạt động', '', '', 0, 0, 36, 2, 0, '', NULL, 5, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673420522, 0, '', 1673420522, 1673420522),
(1077, NULL, 3312, 8296, 0, '8296', 'Cảm súc cùng với', '', '', 0, 0, 36, 2, 0, '', 14, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296,8296', 1673421900, 0, '', 1673421638, 1673422474),
(1078, NULL, 3312, 8296, 0, '8296', 'Lịch Hoạt động', '', '', 0, 0, 36, 2, 0, '', NULL, 5, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296,8296', 1673551620, 0, '', 1673421970, 1673551620),
(1079, NULL, 3312, 5699, 0, '8296,7652,9798', 'test thông báo', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5699,8296,7652,9798', 1673428235, 0, '', 1673428235, 1673428235),
(1080, NULL, 72132, 51770, 0, '', 'Đăng để cấm', '../img/new_feed/dang_tin/file/51770/1804385026.doc', '2109878869.doc', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '51770', 1673507709, 1, '', 1673507709, 1673507709),
(1081, NULL, 72132, 51770, 0, '', 'POST VIDEO CHỜ', '../img/new_feed/dang_tin/video/51770/62134862.mp4', '638062598016484288-6410558307793478993.mp4', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '51770', 1673508156, 1, '', 1673508156, 1673508156),
(1082, NULL, 3312, 8296, 0, '', 'sdfcccccccccccccccccccccccccsdfcccccccccccccccccccccccccsdfcccccccccccccccccccccccccsdfcccccccccccccccccccccccccsdfcccccccccccccccccccccccccsdfcccccccccccccccccccccccccsdfcccccccccccccccccccccccccsdfccccccccccccccccccccccccc', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673518227, 0, '', 1673518227, 1673518227),
(1083, NULL, 3312, 5699, 0, '', '', '../img/new_feed/dang_tin/image/5699/1468785428.jpg||../img/new_feed/dang_tin/video/5699/1546028890.mp4', 'HTB1oUARzyCYBuNkSnaVq6AMsVXau .jpg||320115429_5339017542868803_5240411443237187227_n.mp4', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673519613, 1673519613),
(1084, NULL, 3312, 5699, 0, '', '', '../img/new_feed/dang_tin/image/5699/1197105814.jpg||../img/new_feed/dang_tin/video/5699/556174392.mp4', '313422348_492940612880178_2717671779406848977_n.jpg||320115429_5339017542868803_5240411443237187227_n.mp4', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673519649, 1673519649),
(1085, NULL, 72132, 51770, 0, '', 'duyệt 1', '../img/new_feed/dang_tin/video/51770/88762802.mp4||../img/new_feed/dang_tin/image/51770/578206127.png', '638062598016484288-6410558307793478993.mp4||EVERYTHING CHANGED WITH UNTIL LATER [TERMINADA] - ????Te gustó????.png', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '51770', 1673520025, 1, '', 1673520025, 1673520025),
(1086, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 1084, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673598896, 1673598896),
(1087, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 1084, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673598945, 1673598945),
(1088, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 1083, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673599121, 1673599121),
(1089, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 51, 2, 0, '', NULL, NULL, 0, 0, '', 1, 1083, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673599134, 1673599134),
(1090, NULL, 72132, 51770, 0, '', 'Đăng bài để test', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 2, '', '', 0, 0, 0, '51770', 1673599613, 1, '', 1673599613, 1673599613),
(1091, NULL, 3312, 8296, 0, '', 'file', '../img/new_feed/dang_tin/file/8296/163603866.txt', 'luongkhachsan.txt', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '8296', 1673600194, 0, '', 1673600194, 1673600194),
(1092, NULL, 72132, 51770, 0, '', 'bài test', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 0, '', '', 0, 0, 0, '', 1673600458, 0, '', 1673600458, 1673600539),
(1093, NULL, 72132, 51770, 0, '', 'bài nữa', '', '', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '51770,8296', 1673600548, 0, '', 1673600548, 1673600548),
(1094, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 3429, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1084, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673601362, 1673601362),
(1095, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 3429, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1084, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673601467, 1673601467),
(1096, NULL, 3312, 5699, 0, '', '', '', '', 0, 0, 3429, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1084, 0, '', '', 0, 0, 0, '5699', 0, 0, '', 1673601657, 1673601657),
(1097, NULL, 72132, 51770, 0, '', 'Ảnh', '../img/new_feed/dang_tin/image/51770/576837631.png', 'EVERYTHING CHANGED WITH UNTIL LATER [TERMINADA] - ????Te gustó????.png', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '51770', 1673603543, 0, '', 1673603543, 1673603543),
(1098, NULL, 72132, 51770, 0, '', 'Video', '../img/new_feed/dang_tin/video/51770/1183602634.mp4', '638062598016484288-6410558307793478993.mp4', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '51770', 1673603557, 0, '', 1673603557, 1673603557),
(1099, NULL, 72132, 51770, 0, '', 'File', '../img/new_feed/dang_tin/file/51770/298473425.exe', 'CocCocSetup.exe', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '51770', 1673603578, 0, '', 1673603578, 1673603578),
(1100, NULL, 72132, 53576, 0, '', 'Bài Ảnh', '../img/new_feed/dang_tin/image/53576/1551896928.jpg', 'avatar.jpg', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '53576', 1673603828, 0, '', 1673603828, 1673603828),
(1101, NULL, 72132, 53576, 0, '', 'Bài file', '../img/new_feed/dang_tin/file/53576/529353751.rar', 'thư luật pháp lý mẫu 13.rar', 0, 0, 36, 2, 0, '', NULL, NULL, 0, 0, '', 1, 0, 1, '', '', 0, 0, 0, '53576', 1673603843, 0, '', 1673603843, 1673603843),
(1102, NULL, 3312, 5699, 0, '', 'https://www.figma.com/file/WSOzdPNrdNwHOTP4r6vQ0E/TTVH-nh%C3%A2n-vi%C3%AAn?t=gbZe5GQxb9rWjLff-0', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 0, 0, '', '', 0, 0, 0, '5699', 0, 0, '5750', 1673658625, 1673658625),
(1103, NULL, 3312, 5750, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1083, 0, '', '', 0, 0, 0, '5750', 0, 0, '', 1673658893, 1673658893),
(1104, NULL, 3312, 5750, 0, '', '', '', '', 0, 0, 0, 2, 0, '', NULL, NULL, 0, 0, '', 0, 1083, 0, '', '', 0, 0, 0, '5750', 0, 0, '', 1673658894, 1673658894);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nickname`
--

CREATE TABLE `nickname` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `user_type` int(2) NOT NULL,
  `id_user_tag` int(10) NOT NULL,
  `type_user_tag` int(2) NOT NULL,
  `nick_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `nickname`
--

INSERT INTO `nickname` (`id`, `id_user`, `user_type`, `id_user_tag`, `type_user_tag`, `nick_name`, `created_at`, `updated_at`) VALUES
(6, 2840, 1, 4706, 2, 'Vượng vippro2', 1637205685, 1637228597);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notify`
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 là giá trị cốt lõi, 2 là mục tiêu - chiến lược phần văn hóa dn,3 là sinh nhât phần truyền thông nội bộ, 4 là nguyên tắc làm việc phần văn hóa doanh nghiệp, 5 là tầm nhìn sứ mệnh, 7: mời vào nhóm',
  `id_user` int(11) DEFAULT NULL,
  `id_company` int(10) NOT NULL,
  `id_user_tag` int(10) NOT NULL DEFAULT '0',
  `content` varchar(255) DEFAULT NULL,
  `id_group` int(11) NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `invited_users` int(11) NOT NULL,
  `invited_users_type` int(11) NOT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '1',
  `delete` int(10) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `notify`
--

INSERT INTO `notify` (`id`, `type`, `id_user`, `id_company`, `id_user_tag`, `content`, `id_group`, `link`, `invited_users`, `invited_users_type`, `user_type`, `delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1761, 0, 0, 'eqweqw', 0, '', 0, 0, 1, 0, 1632137639, 1632137639),
(2, 2, 1761, 0, 0, 'asdasdasdads', 0, '', 0, 0, 1, 0, 1632708096, 1632708096),
(3, 2, 1761, 0, 0, 'qweqweqwe', 0, '', 0, 0, 1, 0, 1632711475, 1632711475),
(4, 2, 1761, 0, 0, 'ádasdasd', 0, '', 0, 0, 1, 0, 1632713077, 1632713077),
(5, 2, 1761, 0, 0, 'ádasdasdasd', 0, '', 0, 0, 1, 0, 1632730527, 1632730527),
(6, 3, 1761, 1761, 0, 'sdasdasw', 0, '', 0, 0, 1, 0, 1633687638, 1633687638),
(7, 3, 1761, 1761, 3608, 'adsdsadas', 0, '', 0, 0, 1, 0, 1633687832, 1633687832),
(8, 4, 1761, 1761, 0, 'ưqewq', 0, '', 0, 0, 1, 0, 1633767100, 1633767100),
(9, 4, 1761, 1761, 0, 'ưqewq1111', 0, '', 0, 0, 1, 0, 1633767124, 1633767124),
(10, 5, 1761, 1761, 0, '0', 0, '', 0, 0, 1, 0, 1634121586, 1634121586),
(11, 1, 1761, 0, 0, 'Noi dung thu ceo', 0, '', 0, 0, 1, 0, 1634179808, 1634179808),
(12, 2, 1761, 0, 0, 'nội dung giá trị cốt lõi 1', 0, '', 0, 0, 1, 0, 1634196016, 1634196016),
(13, 1, 2498, 0, 0, 'Nôi dung thư', 0, '', 0, 0, 1, 0, 1634206892, 1634206892),
(14, 1, 2498, 0, 0, 'Nội dung thư từ CEO', 0, '', 0, 0, 1, 0, 1634207057, 1634207057),
(15, 1, 2498, 0, 0, 'adasdqqqq', 0, '', 0, 0, 1, 0, 1634207415, 1634207415),
(16, 3, 2498, 2498, 4098, 'aa', 0, '', 0, 0, 1, 0, 1634373574, 1634373574),
(17, 1, 1761, 0, 0, 'Cố gắng lên nàooooooooooooooooooooooooooooooooo', 0, '', 0, 0, 1, 0, 1634377724, 1634377724),
(18, 6, 1636, 1636, 0, 'đay là nội dung thư ', 0, '', 0, 0, 1, 0, 1634633980, 1634633980),
(19, 6, 1636, 1636, 0, 'đay là nội dung thư ', 0, '', 0, 0, 1, 0, 1634634028, 1634634028),
(20, 2, 1636, 1636, 0, 'Mục tiêu dài hạn: đạt mức doanh số để trở thành một trong 50 công ty công nghệ lớn nhất thế giới, với mục tiêu trong giai đoạn 2012 – 2017 đạt mức doanh số 3 tỷ USD.', 0, '', 0, 0, 1, 0, 1634634768, 1634634768),
(21, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635215, 1634635215),
(22, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635217, 1634635217),
(23, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635218, 1634635218),
(24, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635218, 1634635218),
(25, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635218, 1634635218),
(26, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635219, 1634635219),
(27, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635219, 1634635219),
(28, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635225, 1634635225),
(29, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635225, 1634635225),
(30, 5, 1636, 1636, 0, '0', 0, '', 0, 0, 1, 0, 1634635226, 1634635226),
(31, 5, 2498, 2498, 0, 'sssssss', 0, '', 0, 0, 1, 0, 1634693636, 1634693636),
(32, 6, 2498, 2498, 0, 'ádasd', 0, '', 0, 0, 1, 0, 1634695838, 1634695838),
(36, 5, 2498, 2498, 0, '0', 0, '', 0, 0, 1, 0, 1634697707, 1634697707),
(37, 5, 2498, 2498, 0, '0', 0, '', 0, 0, 1, 0, 1634698024, 1634698024),
(38, 5, 2498, 2498, 0, '0', 0, '', 0, 0, 1, 0, 1634698024, 1634698024),
(39, 5, 2498, 2498, 0, '0', 0, '', 0, 0, 1, 0, 1634698159, 1634698159),
(40, 6, 57, 57, 0, 'Dự kiến có thể ngày thứ 2 toàn công ty nghỉ để phục vụ dịch chuyển văn phòng mới. Các đ/c nắm được để bố trí công việc', 0, '', 0, 0, 1, 0, 1634780730, 1634780730),
(41, 6, 57, 57, 0, 'Dự kiến có thể ngày thứ 2 toàn công ty nghỉ để phục vụ dịch chuyển văn phòng mới. Các đ/c nắm được để bố trí công việc', 0, '', 0, 0, 1, 0, 1634780816, 1634780816),
(42, 6, 2498, 2498, 0, 'đá', 0, '', 0, 0, 1, 0, 1634786386, 1634786386),
(43, 6, 2498, 2498, 0, 'asdsad', 0, '', 0, 0, 1, 0, 1634786444, 1634786444),
(44, 3, 2498, 2498, 4356, 'Chúc mừng sinh nhật', 0, '', 0, 0, 1, 0, 1635236060, 1635236060),
(45, 6, 2498, 2498, 0, 'qưewqe', 0, '', 0, 0, 1, 0, 1635236599, 1635236599),
(46, 6, 2498, 2498, 0, 'qưddsdsdad', 0, '', 0, 0, 1, 0, 1635237290, 1635237290),
(47, 6, 2498, 2498, 0, 'qqqqqwwe', 0, '', 0, 0, 1, 0, 1635237322, 1635237322),
(48, 6, 2498, 2498, 0, 'weqw', 0, '', 0, 0, 1, 0, 1635237786, 1635237786),
(49, 6, 2498, 2498, 0, 'sadwqd', 0, '', 0, 0, 1, 0, 1635237807, 1635237807),
(50, 6, 2498, 2498, 0, 'dsadwqd', 0, '', 0, 0, 1, 0, 1635238117, 1635238117),
(51, 3, 2498, 2498, 4355, 'ádsad', 0, '', 0, 0, 1, 0, 1635304511, 1635304511),
(52, 6, 2498, 2498, 0, 'dsadqwd', 0, '', 0, 0, 1, 0, 1635325324, 1635325324),
(53, 6, 1664, 1664, 0, 'Các nhân viên thân mến của ta, từ ngay ta thành lập công ty đến nay đã vô cùng biết ơn các bạn và ta dự định sẽ tăng lương cho các bạn lên 15% nữa! cảm ơn các bạn đã cống hiến nhé!', 0, '', 0, 0, 1, 0, 1635735247, 1635735247),
(54, 6, 1636, 1636, 0, 'jajajjaja', 0, '', 0, 0, 1, 0, 1635820057, 1635820057),
(55, 1, 1664, 1664, 0, 'Google có một danh sách 10 giá trị cốt lõi được gọi là “Mười điều đúng đắn chúng tôi tin tưởng”:\r\n\r\nTập trung vào khách hàng và thực hiện mọi điều để đạt mục tiêu này.\r\nTốt nhất là tập trung làm một sản phẩm thật tốt.\r\nNhanh bao giờ cũng tốt hơn chậm.\r\nBì', 0, '', 0, 0, 1, 0, 1635826503, 1635826503),
(56, 2, 1664, 1664, 0, 'Google có một danh sách 10 giá trị cốt lõi được gọi là “Mười điều đúng đắn chúng tôi tin tưởng”:\r\n\r\nTập trung vào khách hàng và thực hiện mọi điều để đạt mục tiêu này.\r\nTốt nhất là tập trung làm một sản phẩm thật tốt.\r\nNhanh bao giờ cũng tốt hơn chậm.\r\nBì', 0, '', 0, 0, 1, 0, 1635826540, 1635826540),
(57, 1, 1664, 1664, 0, 'Mong muốn sâu kín của khách hàng\r\nQuyền sở hữu\r\nPhát minh và Đơn giản hóa\r\nĐúng, rất nhiều\r\nTìm hiểu và tò mò\r\nThuê và phát triển tốt nhất\r\nNhấn mạnh vào các tiêu chuẩn cao nhất\r\nSuy nghĩ lớn\r\nThiên vị cho hành động\r\nTiết kiệm\r\nKiếm được niềm tin\r\nLặn sâu', 0, '', 0, 0, 1, 0, 1635826613, 1635826613),
(58, 6, 1761, 1761, 0, 'Thân gửi các thành viên,\nNơi đây là nơi hội tụ nhân tài của Việt nam, các bạn đã làm rất tốt!', 0, '', 0, 0, 1, 0, 1635848077, 1635848077),
(59, 6, 1761, 1761, 0, 'Các em học sinh,\n\nNgày hôm nay là ngày khai trường đầu tiên ở nước Việt Nam Dân chủ Cộng hòa. Tôi đã tưởng tượng thấy thấy trước mắt cái cảnh nhộn nhịp tưng bừng của ngày tựu trường ở khắp các nơi. Các em hết thảy đều vui vẻ vì sau mấy tháng giời nghỉ học', 0, '', 0, 0, 1, 0, 1635907638, 1635907638),
(60, 3, 3006, 1761, 4590, 'Chúc bạn sinh nhật vui vẻ', 0, '', 0, 0, 2, 0, 1635910835, 1635910835),
(61, 6, 1664, 1664, 0, 'NHÂN DỊP NĂM MỚI CHÚC TẤT CẢ CÁC THÀNH VIÊN TRONG CÔNG TY SỨC KHỎE, NHIỀU MAY MẮN', 0, '', 0, 0, 1, 0, 1638418310, 1638418310),
(62, 1, 1664, 1664, 0, 'Giá trị cốt lõi đặc biệt của doanh nghiệp', 0, '', 0, 0, 1, 0, 1638436426, 1638436426),
(63, 6, 2185, 2185, 0, 'nguyen chu hieu', 0, '', 0, 0, 1, 0, 1644816235, 1644816235),
(64, 6, 316, 316, 0, 'Hương Đình', 0, '', 0, 0, 1, 0, 1645108712, 1645108712),
(65, 6, 1636, 1636, 0, '123123 123123 duy test chút để kiểm tra', 0, '', 0, 0, 1, 0, 1651135982, 1651135982),
(66, 6, 1636, 1636, 0, 'abc', 0, '', 0, 0, 1, 0, 1659489590, 1659489590),
(67, 6, 92061, 92061, 0, 'CHÚC MỪNG CHIẾN BINH : CHÂU T.Thanh thủy, ', 0, '', 0, 0, 1, 0, 1667800400, 1667800400),
(68, 6, 92061, 92061, 0, '\r\n        ????  Hiện tại tình hình thị trường đang khó khăn và tết nguyên đán 2023 đang tới rất gần. Vượt qua những khó khăn chung của cả nước và thị trường XKLD& DU HỌC nói riêng cuối năm 2022 hiện nay, Công ty chúng ta  vẫn rất tự hào là 1 trong những c', 0, '', 0, 0, 1, 0, 1667801864, 1667801864),
(69, 6, 72132, 72132, 0, 's', 0, '', 0, 0, 1, 0, 1671594174, 1671594174),
(70, 1, 72132, 72132, 0, 'lõi 1', 0, '', 0, 0, 1, 0, 1671594740, 1671594740),
(75, NULL, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5617, 2, 1, 0, 1671613590, 1671613590),
(76, NULL, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5619, 2, 1, 0, 1635826503, 1635826503),
(77, NULL, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5800, 2, 1, 0, 1671613590, 1671613590),
(78, NULL, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5619, 2, 1, 0, 1671615067, 1671615067),
(80, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 51770, 2, 1, 0, 1671616124, 1671616124),
(81, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5664, 2, 1, 0, 1671794375, 1671794375),
(82, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5683, 2, 1, 0, 1671794375, 1671794375),
(83, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5646, 2, 1, 0, 1671794375, 1671794375),
(84, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5672, 2, 1, 0, 1671794375, 1671794375),
(85, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh muốn mời bạn tham gia nhóm nhóm của ngọc anh đỗ', 51, 'nhom-cua-ngoc-anh-do-51.html', 8296, 2, 1, 0, 1672193159, 1672193159),
(86, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh muốn mời bạn tham gia nhóm ', 0, '-0.html', 8296, 2, 1, 0, 1672367280, 1672367280),
(87, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm ', 0, '-0.html', 5699, 2, 1, 0, 1672369158, 1672369158),
(88, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm ', 0, '-0.html', 5699, 2, 1, 0, 1672369951, 1672369951),
(89, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5699, 2, 1, 0, 1672370727, 1672370727),
(90, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh muốn mời bạn tham gia nhóm nhóm của ngọc anh đỗ', 51, 'nhom-cua-ngoc-anh-do-51.html', 8296, 2, 1, 0, 1672372416, 1672372416),
(91, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 5635, 2, 1, 0, 1672623630, 1672623630),
(92, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh muốn mời bạn tham gia nhóm nhóm của ngọc anh đỗ', 51, 'nhom-cua-ngoc-anh-do-51.html', 9798, 2, 1, 0, 1672734943, 1672734943),
(93, 7, 51770, 72132, 0, 'Test   Duy 1 muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 15211, 2, 1, 0, 1672799636, 1672799636),
(94, 7, 9798, 1636, 0, 'Nguyễn Thị Mai muốn mời bạn tham gia nhóm nhóm của ngọc anh đỗ', 51, 'nhom-cua-ngoc-anh-do-51.html', 5699, 2, 1, 0, 1672824659, 1672824659),
(95, 7, 51770, 72132, 0, 'Test   Duy 1 muốn mời bạn tham gia nhóm Nhóm Ô hô', 65, 'nhom-o-ho-65.html', 8296, 2, 1, 0, 1672897480, 1672897480),
(96, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 51770, 2, 1, 0, 1672897981, 1672897981),
(97, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 51770, 2, 1, 0, 1672898161, 1672898161),
(98, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 51770, 2, 1, 0, 1672898468, 1672898468),
(99, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 51770, 2, 1, 0, 1672898616, 1672898616),
(100, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 51770, 2, 1, 0, 1672898905, 1672898905),
(101, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, 'nhom-phong-7-36.html', 51770, 2, 1, 0, 1672898968, 1672898968),
(102, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 5651, 2, 1, 0, 1672992919, 1672992919),
(103, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 7652, 2, 1, 0, 1672992919, 1672992919),
(104, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 13353, 2, 1, 0, 1672992919, 1672992919),
(105, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 145, 2, 1, 0, 1672992919, 1672992919),
(106, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 5629, 2, 1, 0, 1672993382, 1672993382),
(107, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 168, 2, 1, 0, 1672993416, 1672993416),
(108, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 168, 2, 1, 0, 1673063212, 1673063212),
(109, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 3714, 2, 1, 0, 1673078119, 1673078119),
(110, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 145, 2, 1, 0, 1673232076, 1673232076),
(111, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm Hội Phượt Hà Nội', 70, 'hoi-phuot-ha-noi-70.html', 18680, 2, 1, 0, 1673232076, 1673232076),
(112, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm HỘI YÊU THÚ CƯNG', 71, 'hoi-yeu-thu-cung-71.html', 168, 2, 1, 0, 1673249591, 1673249591),
(113, 7, 5713, 3312, 0, 'Lại Thị Trang muốn mời bạn tham gia nhóm HỘI YÊU THÚ CƯNG', 71, 'hoi-yeu-thu-cung-71.html', 3714, 2, 1, 0, 1673249591, 1673249591),
(114, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm Check test có mời', 73, 'nhom-check-test-co-moi-73.html', 51770, 2, 1, 0, 1673344872, 1673344872),
(115, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, '/nhom-phong-7-36.html', 51770, 2, 1, 0, 1673426090, 1673426090),
(116, 7, 5699, 3312, 0, ' của bạn', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=677', 8296, 2, 1, 0, 1673428306, 1673428306),
(117, 7, 5699, 3312, 0, ' của bạn', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=677', 7652, 2, 1, 0, 1673428306, 1673428306),
(118, 7, 5699, 3312, 0, ' của bạn', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=677', 9798, 2, 1, 0, 1673428306, 1673428306),
(119, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=678', 8296, 2, 1, 0, 1673428422, 1673428422),
(120, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=678', 7652, 2, 1, 0, 1673428422, 1673428422),
(121, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=678', 9798, 2, 1, 0, 1673428422, 1673428422),
(122, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=679', 8296, 2, 1, 0, 1673428627, 1673428627),
(123, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=679', 7652, 2, 1, 0, 1673428627, 1673428627),
(124, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=679', 9798, 2, 1, 0, 1673428627, 1673428627),
(125, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=680', 8296, 2, 1, 0, 1673428719, 1673428719),
(126, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=680', 7652, 2, 1, 0, 1673428719, 1673428719),
(127, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=680', 9798, 2, 1, 0, 1673428719, 1673428719),
(128, 7, 8296, 3312, 0, 'Nguyễn Quang Duy đã bình luận bài viết của bạn', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=681', 5699, 2, 1, 0, 1673429156, 1673429156),
(129, 7, 8296, 3312, 0, 'Nguyễn Quang Duy đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=681', 7652, 2, 1, 0, 1673429156, 1673429156),
(130, 7, 8296, 3312, 0, 'Nguyễn Quang Duy đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=1079&id_cmt=681', 9798, 2, 1, 0, 1673429156, 1673429156),
(131, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã bình luận album của bạn', 0, '/trang-ca-nhan-e5699/album-a18', 5699, 2, 1, 0, 1673431484, 1673431484),
(132, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, '/nhom-phong-7-36.html', 51770, 2, 1, 0, 1673431975, 1673431975),
(133, 7, 8296, 3312, 0, 'Nguyễn Quang Duy đã trả lời bình luận của bạn', 0, '/chi-tiet-tin-dang.html?new_id=979&id_cmt=682', 5699, 2, 1, 0, 1673433486, 1673433486),
(134, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã thích album của bạn', 0, '/trang-ca-nhan-e5699/album-a18', 5699, 2, 1, 0, 1673492880, 1673492880),
(135, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã thích album của bạn', 0, '/trang-ca-nhan-e5699/album-a18?id_cmt=', 5699, 2, 1, 0, 1673493553, 1673493553),
(136, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã thích album của bạn', 0, '/trang-ca-nhan-e5699/album-a18?id_cmt=', 5699, 2, 1, 0, 1673493572, 1673493572),
(137, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã thích album của bạn', 0, '/trang-ca-nhan-e5699/album-a18?id_cmt=12', 5699, 2, 1, 0, 1673493602, 1673493602),
(138, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=722&id_cmt=', 0, 2, 1, 0, 1673494433, 1673494433),
(139, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=722', 0, 2, 1, 0, 1673494456, 1673494456),
(140, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã bình luận bài viết bạn được gắn thẻ', 0, '/chi-tiet-tin-dang.html?new_id=722', 5699, 2, 1, 0, 1673494830, 1673494830),
(141, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, '/nhom-phong-7-36.html', 5646, 2, 1, 0, 1673511099, 1673511099),
(142, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã trả lời bình luận của bạn', 0, '/trang-ca-nhan-e5699/album-a18&parent_id=26?id_cmt=29', 5699, 2, 1, 0, 1673512689, 1673512689),
(143, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã thích bình luận của bạn', 0, '/chi-tiet-tin-dang.html?new_id=&id_cmt=683', 5699, 2, 1, 0, 1673514537, 1673514537),
(144, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã thích bình luận của bạn', 0, '/chi-tiet-tin-dang.html?new_id=&id_cmt=683', 5699, 2, 1, 0, 1673514594, 1673514594),
(145, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã thích bình luận của bạn', 0, '/chi-tiet-tin-dang.html?new_id=722&id_cmt=683', 5699, 2, 1, 0, 1673514623, 1673514623),
(146, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, '/nhom-phong-7-36.html', 5664, 2, 1, 0, 1673516139, 1673516139),
(147, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã trả lời bình luận của bạn', 0, '/trang-ca-nhan-e5699/album-a18&parent_id=?id_cmt=26', 5699, 2, 1, 0, 1673517523, 1673517523),
(148, 7, 9798, 1636, 0, 'Nguyễn Thị Mai đã trả lời bình luận của bạn', 0, '/trang-ca-nhan-e5699/album-a18&parent_id=26?id_cmt=26', 5699, 2, 1, 0, 1673517541, 1673517541),
(149, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã thích bình luận của bạn', 0, '/trang-ca-nhan-e5699/album-a18?id_cmt=25', 9798, 2, 1, 0, 1673517696, 1673517696),
(150, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã thích bình luận của bạn', 0, '/trang-ca-nhan-e5699/album-a18?id_cmt=25', 9798, 2, 1, 0, 1673517698, 1673517698),
(151, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã thích bình luận của bạn', 0, '/trang-ca-nhan-e5699/album-a18?id_cmt=29', 9798, 2, 1, 0, 1673518857, 1673518857),
(152, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1088', 51770, 2, 1, 0, 1673599121, 1673599121),
(153, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1088', 7652, 2, 1, 0, 1673599121, 1673599121),
(154, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1088', 5750, 2, 1, 0, 1673599121, 1673599121),
(155, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1088', 5750, 2, 1, 0, 1673599121, 1673599121),
(156, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1088', 9798, 2, 1, 0, 1673599121, 1673599121),
(157, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1089', 51770, 2, 1, 0, 1673599134, 1673599134),
(158, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1089', 7652, 2, 1, 0, 1673599134, 1673599134),
(159, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1089', 5750, 2, 1, 0, 1673599134, 1673599134),
(160, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1089', 5750, 2, 1, 0, 1673599134, 1673599134),
(161, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1089', 9798, 2, 1, 0, 1673599134, 1673599134),
(162, 7, 8296, 3312, 0, 'Nguyễn Quang Duy muốn mời bạn tham gia nhóm Nhóm phòng 7', 36, '/nhom-phong-7-36.html', 51770, 2, 1, 0, 1673599556, 1673599556),
(163, 7, 8296, 3312, 0, 'Nguyễn Quang Duy vừa đăng 1 bài viết lên nhóm Nhóm phòng 7', 0, '/chi-tiet-tin-dang.html?new_id=1091', 5699, 2, 1, 0, 1673600194, 1673600194),
(164, 7, 8296, 3312, 0, 'Nguyễn Quang Duy vừa đăng 1 bài viết lên nhóm Nhóm phòng 7', 0, '/chi-tiet-tin-dang.html?new_id=1091', 13970, 2, 1, 0, 1673600194, 1673600194),
(165, 7, 8296, 3312, 0, 'Nguyễn Quang Duy vừa đăng 1 bài viết lên nhóm Nhóm phòng 7', 0, '/chi-tiet-tin-dang.html?new_id=1091', 25061, 2, 1, 0, 1673600194, 1673600194),
(166, 7, 8296, 3312, 0, 'Nguyễn Quang Duy vừa đăng 1 bài viết lên nhóm Nhóm phòng 7', 0, '/chi-tiet-tin-dang.html?new_id=1091', 5711, 2, 1, 0, 1673600194, 1673600194),
(167, 7, 8296, 3312, 0, 'Nguyễn Quang Duy vừa đăng 1 bài viết lên nhóm Nhóm phòng 7', 0, '/chi-tiet-tin-dang.html?new_id=1091', 9596, 2, 1, 0, 1673600194, 1673600194),
(168, 7, 8296, 3312, 0, 'Nguyễn Quang Duy vừa đăng 1 bài viết lên nhóm Nhóm phòng 7', 0, '/chi-tiet-tin-dang.html?new_id=1091', 8554, 2, 1, 0, 1673600194, 1673600194),
(169, 7, 8296, 3312, 0, 'Nguyễn Quang Duy vừa đăng 1 bài viết lên nhóm Nhóm phòng 7', 0, '/chi-tiet-tin-dang.html?new_id=1091', 12320, 2, 1, 0, 1673600194, 1673600194),
(170, 7, 8296, 3312, 0, 'Nguyễn Quang Duy vừa đăng 1 bài viết lên nhóm Nhóm phòng 7', 0, '/chi-tiet-tin-dang.html?new_id=1091', 51770, 2, 1, 0, 1673600194, 1673600194),
(171, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm PHÒNG 14: PHÒNG KỸ THUẬT SỐ 2 - Đ/C LẠI TRANG', 0, '/chi-tiet-tin-dang.html?new_id=1096', 83953, 2, 1, 0, 1673601657, 1673601657),
(172, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm PHÒNG 14: PHÒNG KỸ THUẬT SỐ 2 - Đ/C LẠI TRANG', 0, '/chi-tiet-tin-dang.html?new_id=1096', 14234, 2, 1, 0, 1673601657, 1673601657),
(173, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm PHÒNG 14: PHÒNG KỸ THUẬT SỐ 2 - Đ/C LẠI TRANG', 0, '/chi-tiet-tin-dang.html?new_id=1096', 8296, 2, 1, 0, 1673601657, 1673601657),
(174, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm PHÒNG 14: PHÒNG KỸ THUẬT SỐ 2 - Đ/C LẠI TRANG', 0, '/chi-tiet-tin-dang.html?new_id=1096', 7652, 2, 1, 0, 1673601657, 1673601657),
(175, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm PHÒNG 14: PHÒNG KỸ THUẬT SỐ 2 - Đ/C LẠI TRANG', 0, '/chi-tiet-tin-dang.html?new_id=1096', 5713, 2, 1, 0, 1673601657, 1673601657),
(176, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm PHÒNG 14: PHÒNG KỸ THUẬT SỐ 2 - Đ/C LẠI TRANG', 0, '/chi-tiet-tin-dang.html?new_id=1096', 5699, 2, 1, 0, 1673601657, 1673601657),
(177, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm PHÒNG 14: PHÒNG KỸ THUẬT SỐ 2 - Đ/C LẠI TRANG', 0, '/chi-tiet-tin-dang.html?new_id=1096', 5629, 2, 1, 0, 1673601657, 1673601657),
(178, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã gắn thẻ bạn trong 1 bài viết', 0, '/chi-tiet-tin-dang.html?new_id=', 0, 2, 1, 0, 1673606337, 1673606337),
(179, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã gắn thẻ bạn trong 1 bài viết', 0, '/chi-tiet-tin-dang.html?new_id=', 8296, 2, 1, 0, 1673606337, 1673606337),
(180, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 51770, 2, 1, 0, 1673606337, 1673606337),
(181, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 7652, 2, 1, 0, 1673606337, 1673606337),
(182, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 5750, 2, 1, 0, 1673606337, 1673606337),
(183, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 5750, 2, 1, 0, 1673606337, 1673606337),
(184, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 9798, 2, 1, 0, 1673606337, 1673606337),
(185, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã gắn thẻ bạn trong 1 bài viết', 0, '/chi-tiet-tin-dang.html?new_id=1002', 0, 2, 1, 0, 1673606369, 1673606369),
(186, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã gắn thẻ bạn trong 1 bài viết', 0, '/chi-tiet-tin-dang.html?new_id=1002', 8296, 2, 1, 0, 1673606369, 1673606369),
(187, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 51770, 2, 1, 0, 1673606369, 1673606369),
(188, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 7652, 2, 1, 0, 1673606369, 1673606369),
(189, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 5750, 2, 1, 0, 1673606369, 1673606369),
(190, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 5750, 2, 1, 0, 1673606369, 1673606369),
(191, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=', 9798, 2, 1, 0, 1673606369, 1673606369),
(192, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã gắn thẻ bạn trong 1 bài viết', 0, '/chi-tiet-tin-dang.html?new_id=1002', 0, 2, 1, 0, 1673606389, 1673606389),
(193, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh đã gắn thẻ bạn trong 1 bài viết', 0, '/chi-tiet-tin-dang.html?new_id=1002', 8296, 2, 1, 0, 1673606389, 1673606389),
(194, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1002', 51770, 2, 1, 0, 1673606389, 1673606389),
(195, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1002', 7652, 2, 1, 0, 1673606389, 1673606389),
(196, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1002', 5750, 2, 1, 0, 1673606389, 1673606389),
(197, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1002', 5750, 2, 1, 0, 1673606389, 1673606389),
(198, 7, 5699, 3312, 0, 'Đỗ Ngọc Anh vừa đăng 1 bài viết lên nhóm nhóm của ngọc anh đỗ', 0, '/chi-tiet-tin-dang.html?new_id=1002', 9798, 2, 1, 0, 1673606389, 1673606389);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `remove_group`
--

CREATE TABLE `remove_group` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_group` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `remove_group`
--

INSERT INTO `remove_group` (`id`, `id_user`, `id_group`, `time_start`, `time_end`) VALUES
(6, 53576, '29', 1672827928, 1672914328);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_chat`
--

CREATE TABLE `room_chat` (
  `id` int(10) NOT NULL,
  `id_user1` int(10) NOT NULL,
  `user_type1` int(2) NOT NULL,
  `id_user2` int(10) NOT NULL,
  `user_type2` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `room_chat`
--

INSERT INTO `room_chat` (`id`, `id_user1`, `user_type1`, `id_user2`, `user_type2`) VALUES
(14, 2840, 1, 4706, 2),
(17, 4706, 2, 4706, 2),
(18, 1850, 2, 5004, 2),
(19, 457, 2, 57, 1),
(20, 1761, 1, 1761, 1),
(21, 1761, 1, 4812, 2),
(22, 1761, 1, 4803, 2),
(23, 2840, 1, 5143, 2),
(24, 4706, 2, 5143, 2),
(25, 3436, 2, 5016, 2),
(26, 457, 2, 206, 2),
(27, 457, 2, 205, 2),
(28, 3436, 2, 738, 2),
(29, 738, 2, 57, 1),
(30, 738, 2, 5010, 2),
(31, 1363, 2, 738, 2),
(32, 738, 2, 2555, 2),
(33, 2840, 1, 5143, 0),
(34, 2840, 1, 4706, 0),
(35, 4706, 2, 2840, 0),
(36, 2840, 1, 2840, 1),
(37, 1761, 1, 3007, 2),
(38, 1761, 1, 5531, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `save_post`
--

CREATE TABLE `save_post` (
  `id_save` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_posts` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `id_collection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='lưu bài viết vào bộ sưu tập';

--
-- Đang đổ dữ liệu cho bảng `save_post`
--

INSERT INTO `save_post` (`id_save`, `id_author`, `id_posts`, `use_id`, `id_collection`) VALUES
(5, 51770, 712, 51770, 34),
(6, 51770, 712, 51770, 32),
(7, 51770, 712, 51770, 35),
(8, 51770, 712, 51770, 33),
(9, 72132, 710, 51770, 32),
(10, 72132, 710, 53576, 29),
(11, 72132, 709, 53576, 29),
(12, 72132, 708, 53576, 29),
(13, 72132, 693, 53576, 40),
(14, 51770, 712, 51770, 41),
(16, 72132, 711, 51770, 42),
(17, 72132, 711, 51770, 43),
(18, 51770, 712, 51770, 43),
(19, 51770, 712, 51770, 42),
(21, 51770, 743, 51770, 41),
(41, 53576, 809, 8296, 55),
(43, 8296, 892, 5699, 57),
(44, 8296, 892, 8296, 54),
(45, 51770, 890, 8296, 54),
(48, 8296, 924, 5699, 57);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `share_album`
--

CREATE TABLE `share_album` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `share_album`
--

INSERT INTO `share_album` (`id`, `user_id`, `user_type`, `album_id`, `created_at`) VALUES
(1, 5699, 2, 4, 1672109429),
(2, 5699, 2, 4, 1672109453),
(3, 5699, 2, 4, 1672126829),
(4, 3312, 2, 4, 1672127375),
(5, 5699, 2, 4, 1672132203),
(6, 5800, 2, 4, 1672136880),
(7, 5699, 2, 4, 1672196348),
(8, 5699, 2, 6, 1672393497),
(9, 5800, 2, 6, 1672760667),
(10, 5699, 2, 6, 1672761323),
(11, 5699, 2, 4, 1672762658),
(12, 5699, 2, 4, 1672764438),
(13, 5699, 2, 4, 1672764550),
(14, 5699, 2, 4, 1672764562),
(15, 5699, 2, 4, 1672764642),
(16, 5699, 2, 4, 1672802128),
(17, 9798, 2, 4, 1672817828),
(18, 5699, 2, 7, 1672907039),
(19, 5699, 2, 6, 1672913206),
(20, 5699, 2, 6, 1672996525),
(21, 0, 0, 4, 1673054689),
(22, 0, 0, 4, 1673054692),
(23, 5699, 2, 15, 1673260649);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `share_post`
--

CREATE TABLE `share_post` (
  `id` int(11) NOT NULL,
  `id_new` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `share_post`
--

INSERT INTO `share_post` (`id`, `id_new`, `id_user`, `user_type`, `created_time`) VALUES
(1, 755, 5699, 2, 1669457075),
(2, 756, 5699, 2, 1669457365),
(3, 756, 5699, 2, 1669458871),
(4, 767, 5699, 2, 1669624196),
(5, 767, 5699, 2, 1669626197),
(6, 767, 5699, 2, 1669626480),
(7, 767, 5699, 2, 1669688328),
(8, 768, 5699, 2, 1669691475),
(9, 725, 5699, 2, 1669709392),
(10, 720, 5699, 2, 1669709406),
(11, 757, 5699, 2, 1669711510),
(12, 767, 5699, 2, 1669716701),
(13, 777, 5699, 2, 1669716746),
(14, 781, 5699, 2, 1669799432),
(15, 782, 5699, 2, 1670574712),
(16, 782, 5699, 2, 1670574944),
(17, 827, 5699, 2, 1670575192),
(18, 827, 5699, 2, 1670575477),
(19, 829, 8296, 2, 1670575657),
(20, 829, 5699, 2, 1670575689),
(21, 833, 8296, 2, 1670636656),
(22, 722, 5699, 2, 1670841870),
(23, 847, 5699, 2, 1671005333),
(24, 847, 5699, 2, 1671005447),
(25, 797, 5699, 2, 1671094734),
(26, 850, 5699, 2, 1671096845),
(27, 838, 8296, 2, 1671156020),
(28, 837, 8296, 2, 1671873925),
(29, 858, 51770, 2, 1671874542),
(30, 775, 5699, 2, 1672047779),
(31, 866, 5699, 2, 1672125037),
(32, 867, 5699, 2, 1672125068),
(33, 866, 5699, 2, 1672125094),
(34, 786, 51770, 2, 1672133640),
(35, 841, 51770, 2, 1672134171),
(36, 841, 51770, 2, 1672134196),
(37, 841, 51770, 2, 1672134253),
(38, 887, 5699, 2, 1672197434),
(39, 765, 5737, 2, 1672623926),
(40, 883, 5699, 2, 1672730665),
(41, 922, 5699, 2, 1672759735),
(42, 912, 5699, 2, 1672759918),
(43, 912, 5699, 2, 1672760556),
(44, 912, 5699, 2, 1672760604),
(45, 912, 5699, 2, 1672760667),
(46, 912, 5699, 2, 1672761323),
(47, 927, 5699, 2, 1672767781),
(48, 877, 9798, 2, 1672817828),
(49, 950, 8296, 2, 1672889846),
(50, 951, 5699, 2, 1672889962),
(51, 942, 51770, 2, 1672899668),
(52, 942, 51770, 2, 1672899694),
(53, 890, 51770, 2, 1672903002),
(54, 889, 51770, 2, 1672903020),
(55, 889, 51770, 2, 1672907572),
(56, 959, 5699, 2, 1672974983),
(57, 957, 5699, 2, 1672996509),
(58, 970, 5699, 2, 1672996525),
(59, 982, 9798, 2, 1673056689),
(60, 983, 9798, 2, 1673056706),
(61, 985, 5713, 2, 1673076470),
(62, 985, 5713, 2, 1673076473),
(63, 985, 5713, 2, 1673076474),
(64, 985, 5713, 2, 1673076508),
(65, 985, 5713, 2, 1673076635),
(66, 985, 5713, 2, 1673076640),
(67, 995, 3714, 2, 1673079843),
(68, 1035, 5713, 2, 1673336483),
(69, 1035, 5713, 2, 1673337221),
(70, 1035, 5713, 2, 1673337279),
(71, 1037, 5699, 2, 1673338502),
(72, 1018, 5713, 2, 1673338881),
(73, 1007, 5699, 2, 1673339140),
(74, 1022, 5713, 2, 1673343568),
(75, 1046, 5713, 2, 1673345543),
(76, 1043, 5713, 2, 1673399241),
(77, 1027, 8296, 2, 1673402832),
(78, 1031, 8296, 2, 1673403190),
(79, 842, 8296, 2, 1673404241),
(80, 890, 8296, 2, 1673404418),
(81, 889, 8296, 2, 1673404777),
(82, 890, 8296, 2, 1673404863),
(83, 1084, 5699, 2, 1673598896),
(84, 1084, 5699, 2, 1673598945),
(85, 1083, 5699, 2, 1673599121),
(86, 1083, 5699, 2, 1673599134),
(87, 1084, 5699, 2, 1673601362),
(88, 1084, 5699, 2, 1673601467),
(89, 1084, 5699, 2, 1673601657),
(90, 1089, 5750, 2, 1673658893),
(91, 1089, 5750, 2, 1673658894);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `comment` tinyint(4) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL,
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` int(11) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `target`
--

INSERT INTO `target` (`id`, `id_user`, `id_company`, `title`, `content`, `cover_image`, `comment`, `user_type`, `delete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 2498, 2498, 'mt1', 'ndmt1', '../img/vanhoadoanhnghiep/target/2498/963018417.png', 1, 1, 0, 0, 1634280827, 1634281757),
(6, 2498, 2498, 'mt2223333333', 'ndmt233', '../img/vanhoadoanhnghiep/target/2498/1285995879.png', 0, 1, 0, 0, 1634281220, 1634284262),
(8, 1636, 1636, 'Mục tiêu dài hạn', 'Mục tiêu dài hạn: đạt mức doanh số để trở thành một trong 50 công ty công nghệ lớn nhất thế giới, với mục tiêu trong giai đoạn 2012 – 2017 đạt mức doanh số 3 tỷ USD.', '../img/vanhoadoanhnghiep/target/1636/1051322070.jpg', 1, 1, 0, 0, 1634634768, 1634634768),
(9, 1664, 1664, 'cố gắng là mục tiêu hàng đầu!', '\nHãy để mong muốn khám phá của bạn vượt ra ngoài mọi biên giới.\nBạn vẫn có thể rất chững chạc mà không cần mặc 1 bộ vest.\nChỉ tuyệt vời thôi là chưa đủ tốt', '../img/vanhoadoanhnghiep/target/1664/13336496.jpeg', 0, 1, 0, 0, 1635826540, 1635826540),
(10, 1761, 1761, '123456', 'ưertj238', '../img/vanhoadoanhnghiep/target/1761/1479926897.png', 0, 1, 0, 0, 1635848843, 1635848843),
(12, 2840, 2840, 'ưqewq', 'ưqeqweeqw', '../img/vanhoadoanhnghiep/target/2840/175143650.png', 0, 1, 0, 0, 1640250068, 1640250068);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_voted`
--

CREATE TABLE `tbl_voted` (
  `id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `answer` text,
  `file` text,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='bình chọn';

--
-- Đang đổ dữ liệu cho bảng `tbl_voted`
--

INSERT INTO `tbl_voted` (`id`, `id_new`, `answer`, `file`, `time`) VALUES
(1, 139, 'qqq', '8117.vnd.ms-excel', 1631752440),
(2, 139, 'qqq3', '', 1631752440),
(3, 140, 'pa1', '13583.vnd.ms-excel', 1631667180),
(4, 140, 'pa2', '5901.vnd.ms-excel', 1631667180),
(5, NULL, 'pa3', '23092.octet-stream', 1631667180),
(6, NULL, 'pa3', '15308.octet-stream', 1631667180),
(7, NULL, '', '', 1631667180),
(8, NULL, 'pa3', '18103.vnd.ms-excel', 1631667180),
(9, 140, 'pa3', '26069.vnd.ms-excel', 1631667180),
(10, 195, '1', '30035.jpeg', 1634227860),
(11, 195, '1', '28304.jpeg', 1634227860),
(12, 196, '1', '32680.jpeg', 1634227860),
(13, 196, '1', '15041.jpeg', 1634227860),
(14, 197, '1', '249.jpeg', 1634227860),
(15, 197, '1', '30782.jpeg', 1634227860),
(16, 200, 'pa1', '1385.png', 1634260440),
(17, 200, 'pa2', '31726.png', 1634260440),
(18, 201, 'pa1', '', 1634260740),
(19, 201, 'pa2', '', 1634260740),
(20, 201, 'pa3', '', 1634260740),
(21, 260, '1', '2133766726.jpeg', 1634638860),
(22, 260, '2', '1072485429.vnd.openxmlformats-officedocument.wordprocessingml.document', 1634638860),
(23, 260, '3', '715158555.jpeg', 1634638860),
(24, 280, '1', '1055341770.jpeg', 1634748120),
(25, 280, '2', '1533331588.png', 1634748120),
(26, 281, '1', '1878462373.jpeg', 1634748120),
(27, 281, '2', '391442698.png', 1634748120),
(28, 362, 'pa1', '', 1635318300),
(29, 362, 'pa2', '', 1635318300),
(30, 363, 'pa1', '', 1635318420),
(31, 363, 'pa2', '', 1635318420),
(32, 415, 'Gà bó xôi', '', 1636640880),
(33, 415, 'Gà rán', '', 1636640880),
(34, 415, 'Lẩu ếch', '', 1636640880),
(35, 416, 'Về nhà', '', 1635942900),
(36, 416, 'Đi chơi', '', 1635942900),
(37, 416, 'Hồ tây', '', 1635942900),
(38, 416, 'Quán thánh', '', 1635942900),
(39, 416, 'Hồ gươm', '', 1635942900),
(40, 416, 'Siêu thị', '', 1635942900),
(41, 416, 'Giao hưởng', '', 1635942900),
(42, 416, 'k biết', '', 1635942900),
(43, 417, '123', '1237779396.vnd.openxmlformats-officedocument.wordprocessingml.document', 1635852720),
(44, 417, '13233', '2072320982.vnd.openxmlformats-officedocument.wordprocessingml.document', 1635852720),
(45, 417, '1234566', '1760793815.jpeg', 1635852720),
(46, 417, '234', '807724378.jpeg', 1635852720),
(47, 424, '1', '284639331.jpeg', 1636013040),
(48, 424, '2', '942291766.jpeg', 1636013040),
(49, 425, '1', '127422726.jpeg', 1636017420),
(50, 425, '2', '1341803660.jpeg', 1636017420),
(51, 533, 'hoa khôi Mr. Lợn', '161760767.png', 1640184000),
(52, 533, 'hoa khôi Mr. Lợn', '', 1640184000),
(53, 563, 'pa1', '333802743.x-zip-compressed', 1640236200),
(54, 563, 'pa2', '', 1640236200),
(55, 564, 'adqqwq', '2081823786.', 1640361840),
(56, 564, ' ewee', '', 1640361840),
(57, 565, 'qư', '59751165.CodeIgniter-3.1.11CodeIgniter-3.1.11CodeIgniter-3.1.11CodeIgniter-3.1.11CodeIgniter-3.1.11CodeIgniter-3.1.11.zip', 1640329560),
(58, 565, 'qư', '', 1640329560),
(59, 594, 'pa 4', '1646730702.620260160.zip', 1640418780),
(60, 594, 'pa 2', '1584194186.x-zip-compressed', 1640418780),
(61, 594, 'pa 3', '', 1640418780),
(62, 594, 'pa5555', '', 1640418780),
(63, 739, 'pa 1', '1285877130.Sát Phá Lang phiên ngoại.docx', 1669538880),
(64, 739, 'pa 2 2', '2025662859.Hệ thống tự cứu nhân vật phản diện.TXT', 1669538880),
(65, 923, 'a', '', 1674959400),
(66, 923, 'b', '', 1674959400),
(67, 923, 'c', '', 1674959400),
(68, 950, 'ágasg', '', 1672892040),
(69, 950, '8ga4523s', '', 1672892040);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttnb_cover_image_user`
--

CREATE TABLE `ttnb_cover_image_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `cover_image` text CHARACTER SET latin1 NOT NULL,
  `is_using` int(11) NOT NULL COMMENT '1: đang sử dụng',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='anh bìa user';

--
-- Đang đổ dữ liệu cho bảng `ttnb_cover_image_user`
--

INSERT INTO `ttnb_cover_image_user` (`id`, `user_id`, `user_type`, `cover_image`, `is_using`, `created_at`) VALUES
(10, 5699, 2, '../img/cover_image_user/5699/792525202.png', 0, 1670409160),
(11, 5699, 2, '../img/cover_image_user/5699/1315279957.png', 0, 1670409435),
(12, 5699, 2, '../img/cover_image_user/5699/1033392845.png', 0, 1670465091),
(13, 5699, 2, '../img/cover_image_user/5699/610273991.png', 1, 1670465282),
(14, 5699, 2, '../img/cover_image_user/5699/226806309.png', 0, 1670986739),
(15, 8296, 2, '../img/cover_image_user/8296/215231027.png', 0, 1671672993),
(16, 8296, 2, '../img/cover_image_user/8296/234202089.png', 0, 1671673012),
(17, 8296, 2, '../img/cover_image_user/8296/312850048.png', 0, 1671673083),
(18, 8296, 2, '../img/cover_image_user/8296/1655093578.png', 1, 1671673094),
(19, 9798, 2, '../img/cover_image_user/9798/249230991.png', 1, 1672817496),
(20, 5713, 2, '../img/cover_image_user/5713/437351030.png', 0, 1673076579),
(21, 5713, 2, '../img/cover_image_user/5713/1364134228.png', 1, 1673077452),
(22, 3714, 2, '../img/cover_image_user/3714/191311576.png', 0, 1673400777),
(23, 3714, 2, '../img/cover_image_user/3714/706605682.png', 0, 1673400826),
(24, 3714, 2, '../img/cover_image_user/3714/421238649.png', 1, 1673400842);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttnb_family`
--

CREATE TABLE `ttnb_family` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `mem_type` int(11) NOT NULL,
  `relative_id` int(11) NOT NULL,
  `view_mode` int(11) NOT NULL,
  `except` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='thành viên trong gia đình';

--
-- Đang đổ dữ liệu cho bảng `ttnb_family`
--

INSERT INTO `ttnb_family` (`id`, `user_id`, `user_type`, `mem_id`, `mem_type`, `relative_id`, `view_mode`, `except`, `created_at`, `updated_at`) VALUES
(1, 5699, 2, 5653, 2, 10, 1, '', 1614413869, 1670666724),
(2, 5699, 2, 5617, 2, 1, 3, '5617', 1670666695, 1670666695);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttnb_infor_user`
--

CREATE TABLE `ttnb_infor_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `story` text NOT NULL COMMENT 'tiểu sử',
  `story_view_mode` int(11) NOT NULL COMMENT 'chế độ xem',
  `story_except` int(11) NOT NULL COMMENT 'chế độ xem',
  `hobby` text NOT NULL COMMENT 'sở thích',
  `city` int(11) NOT NULL COMMENT 'thành phố hiện tại',
  `city_view_mode` int(11) NOT NULL DEFAULT '0' COMMENT 'chế độ xem',
  `city_except` text NOT NULL COMMENT 'chế độ xem',
  `home_town` int(11) NOT NULL COMMENT 'quê quán',
  `ht_view_mode` int(11) NOT NULL DEFAULT '0' COMMENT 'chế độ xem',
  `ht_except` text NOT NULL COMMENT 'chế độ xem',
  `language` varchar(255) NOT NULL COMMENT 'ngôn ngữ',
  `lang_view_mode` int(11) NOT NULL DEFAULT '0' COMMENT 'chế độ xem',
  `lang_except` text NOT NULL COMMENT 'chế độ xem',
  `religion` text NOT NULL COMMENT 'tôn giáo',
  `religion_desc` text NOT NULL COMMENT 'mô tả tôn giáo',
  `relig_view_mode` int(11) NOT NULL DEFAULT '0' COMMENT 'chế độ xem',
  `relig_except` text NOT NULL COMMENT 'chế độ xem',
  `relationship_status` int(11) NOT NULL COMMENT 'mối quan hệ',
  `rela_view_mode` int(11) NOT NULL DEFAULT '0' COMMENT 'chế độ xem',
  `rela_except` text NOT NULL COMMENT 'chế độ xem',
  `intro` text NOT NULL COMMENT 'giới thiệu bản thân',
  `intro_view_mode` int(11) NOT NULL DEFAULT '0' COMMENT 'chế độ xem',
  `intro_except` text NOT NULL COMMENT 'chế độ xem',
  `nickname` text NOT NULL COMMENT 'biệt danh',
  `nn_view_mode` int(11) NOT NULL DEFAULT '0' COMMENT 'chế độ xem',
  `nn_except` text NOT NULL COMMENT 'chế độ xem',
  `quote` text NOT NULL COMMENT 'trích dẫn yêu thích',
  `quote_view_mode` int(11) NOT NULL DEFAULT '0' COMMENT 'chế độ xem',
  `quote_except` text NOT NULL COMMENT 'chế độ xem',
  `add_view_mode` int(11) NOT NULL DEFAULT '0',
  `add_except` text NOT NULL,
  `phone_view_mode` int(11) NOT NULL DEFAULT '0',
  `phone_except` text NOT NULL,
  `sex_view_mode` int(11) NOT NULL DEFAULT '0',
  `sex_except` text NOT NULL,
  `dob_view_mode` int(11) NOT NULL DEFAULT '0',
  `dob_except` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ttnb - thông tin tài khoản';

--
-- Đang đổ dữ liệu cho bảng `ttnb_infor_user`
--

INSERT INTO `ttnb_infor_user` (`id`, `user_id`, `user_type`, `story`, `story_view_mode`, `story_except`, `hobby`, `city`, `city_view_mode`, `city_except`, `home_town`, `ht_view_mode`, `ht_except`, `language`, `lang_view_mode`, `lang_except`, `religion`, `religion_desc`, `relig_view_mode`, `relig_except`, `relationship_status`, `rela_view_mode`, `rela_except`, `intro`, `intro_view_mode`, `intro_except`, `nickname`, `nn_view_mode`, `nn_except`, `quote`, `quote_view_mode`, `quote_except`, `add_view_mode`, `add_except`, `phone_view_mode`, `phone_except`, `sex_view_mode`, `sex_except`, `dob_view_mode`, `dob_except`, `created_at`, `updated_at`) VALUES
(5, 5699, 2, 'po', 3, 5653, '["trồng cây"]', 1, 3, '5713', 3, 1, '', '1,2,7,9', 4, '5699', 'đạo shinto', 'noragami', 1, '', 1, 1, '', 'giới thiệu\r\nkkkkk', 3, '5800', 'anh cún', 4, '5664,5683', '“Lục thiếu tướng tuổi không lớn thời điểm có hay không đối tương lai cảm thấy sợ hãi thời kỳ?”\r\nLục Triệu trả lời: “Không có. Tuổi không lớn thời điểm rất mệt, vội vàng quá hôm nay, không rảnh sợ tương lai."', 3, '5800,5800', 4, '5646,9082,8117,5683,5627', 3, '5664', 3, '5800,5683,5627,5800', 3, '5800,5683,5627,5800', 1670768557, 1672999403),
(6, 5713, 2, '', 0, 0, '["viết lách","nghe nhạc"]', 1, 0, '', 54, 0, '', '', 0, '', '', '', 0, '', 0, 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 1673318544, 1673338094);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttnb_school`
--

CREATE TABLE `ttnb_school` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL COMMENT 'tên trường học',
  `time_start` int(11) NOT NULL COMMENT 'thời gian bắt đầu',
  `time_end` int(11) NOT NULL COMMENT 'thời gian kết thúc',
  `graduated` int(11) NOT NULL COMMENT '1: đã tốt nghiệp',
  `major` varchar(255) NOT NULL COMMENT 'chuyên ngành',
  `view_mode` int(11) NOT NULL COMMENT 'chế độ xem',
  `except` text NOT NULL COMMENT 'chế độ xem',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ttnb - trường học';

--
-- Đang đổ dữ liệu cho bảng `ttnb_school`
--

INSERT INTO `ttnb_school` (`id`, `user_id`, `user_type`, `school_name`, `time_start`, `time_end`, `graduated`, `major`, `view_mode`, `except`, `created_at`, `updated_at`) VALUES
(2, 5699, 2, 'trường đời', 1669568400, 1671728400, 0, 'cntt', 3, '5653,5800,5664,5627', 1670638033, 1670638059),
(4, 8296, 2, 'CÔng nghiệp', 1670259600, 1670605200, 1, 'IT', 0, '', 1671699247, 1671699247),
(5, 5713, 2, 'Học viện Báo chí và Tuyên truyền', 1433869200, 1557421200, 1, 'Báo mạng điện tử', 0, '', 1673338071, 1673338071),
(6, 5750, 2, 'abc', 1672592400, 1674666000, 1, '', 0, '', 1673661677, 1673661677);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttnb_work_place`
--

CREATE TABLE `ttnb_work_place` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL COMMENT 'tên công ty',
  `position` varchar(255) NOT NULL COMMENT 'chức vụ',
  `address` text NOT NULL COMMENT 'địa chỉ',
  `working_here` int(11) NOT NULL DEFAULT '0' COMMENT '1: tôi làm việc ở đây',
  `view_mode` int(11) NOT NULL COMMENT 'chế độ xem',
  `except` text NOT NULL COMMENT 'chế độ xem',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ttnb - nơi làm việc';

--
-- Đang đổ dữ liệu cho bảng `ttnb_work_place`
--

INSERT INTO `ttnb_work_place` (`id`, `user_id`, `user_type`, `company_name`, `position`, `address`, `working_here`, `view_mode`, `except`, `created_at`, `updated_at`) VALUES
(5, 5699, 2, 'SVMC', 'intern', 'hà nội', 0, 0, '', 1670578578, 1670901899),
(6, 5699, 2, 'abc', 'aa', 'a', 1, 1, '', 1671160746, 1671160782),
(7, 5713, 2, 'Công ty Cổ phần Thanh toán Hưng Hà', 'Nhân viên', 'Hà Nội', 1, 0, '', 1673337971, 1673337971);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `turnoff_group_notifications`
--

CREATE TABLE `turnoff_group_notifications` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_group_turnoff` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `turnoff_group_notifications`
--

INSERT INTO `turnoff_group_notifications` (`id`, `id_user`, `id_group_turnoff`) VALUES
(1, 8296, '2'),
(2, 8296, '3'),
(3, 8296, '4'),
(4, 8296, '31'),
(5, 8296, '36'),
(6, 8296, '49'),
(7, 8296, '50'),
(8, 8296, '51'),
(9, 8296, '52'),
(10, 8296, '53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `unfollow`
--

CREATE TABLE `unfollow` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `friend_type` int(11) NOT NULL,
  `block_type` int(11) NOT NULL DEFAULT '0' COMMENT '0: bỏ theo dõi (Dừng xem bài viết nhưng vẫn là bạn bè); 1: bỏ theo dõi có hạn',
  `block_exp` int(11) NOT NULL DEFAULT '0' COMMENT 'hạn bỏ theo dõi',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='bỏ theo dõi bạn bè';

--
-- Đang đổ dữ liệu cho bảng `unfollow`
--

INSERT INTO `unfollow` (`id`, `user_id`, `user_type`, `friend_id`, `friend_type`, `block_type`, `block_exp`, `created_at`) VALUES
(64, 5699, 2, 9798, 2, 0, 0, 1673085832),
(65, 5713, 2, 14229, 2, 0, 0, 1673337708),
(66, 5713, 2, 8053, 0, 0, 0, 1673422133);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `update_calendar`
--

CREATE TABLE `update_calendar` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `type` int(10) NOT NULL COMMENT '1 là tầm nhìn - sứ mệnh',
  `time` int(10) NOT NULL DEFAULT '0',
  `id_company` int(10) NOT NULL,
  `remind` int(10) NOT NULL DEFAULT '0',
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `update_calendar`
--

INSERT INTO `update_calendar` (`id`, `id_user`, `type`, `time`, `id_company`, `remind`, `created_at`, `updated_at`) VALUES
(2, 0, 1, 1634144400, 1761, 1, 1634118422, 1634121586),
(3, 0, 1, 0, 1761, 0, 1634180942, 1634180942),
(4, 0, 1, 0, 2498, 0, 1634207605, 1634698159),
(5, 0, 1, 0, 1636, 0, 1634632657, 1634635226),
(6, 2498, 1, 1634662800, 2498, 1, 1634698748, 1634698748),
(7, 0, 1, 0, 1664, 0, 1634803679, 1634803679),
(8, 1636, 1, 1636477200, 1636, 1, 1635820128, 1635820128),
(9, 1636, 1, 1636477200, 1636, 1, 1636366734, 1636366734),
(10, 0, 1, 0, 168, 0, 1636703429, 1636703429),
(11, 0, 1, 0, 57, 0, 1637650742, 1637650742),
(12, 0, 1, 0, 2840, 0, 1640162135, 1640162135),
(13, 0, 1, 0, 3312, 0, 1640428080, 1640428080),
(14, 0, 1, 0, 3765, 0, 1641348798, 1641348798),
(15, 0, 1, 0, 3542, 0, 1641636423, 1641636423),
(16, 0, 1, 0, 3183, 0, 1647321280, 1647321280),
(17, 1636, 1, 1648746000, 1636, 0, 1650946118, 1650946118),
(18, 0, 1, 0, 72132, 0, 1671594223, 1671594223);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_vote`
--

CREATE TABLE `user_vote` (
  `id` int(12) NOT NULL,
  `id_vote` int(10) NOT NULL,
  `id_new` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `user_type` int(10) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='lượt bình chọn của bài viết';

--
-- Đang đổ dữ liệu cho bảng `user_vote`
--

INSERT INTO `user_vote` (`id`, `id_vote`, `id_new`, `id_user`, `user_type`, `created_at`, `updated_at`) VALUES
(2, 18, 0, 1761, 1, 0, 0),
(3, 19, 0, 1761, 1, 0, 0),
(4, 21, 0, 1636, 1, 0, 0),
(5, 22, 0, 1636, 1, 0, 0),
(6, 23, 0, 1636, 1, 0, 0),
(7, 24, 0, 1636, 1, 0, 0),
(8, 26, 0, 1636, 1, 0, 0),
(10, 31, 363, 2498, 1, 0, 0),
(11, 30, 363, 2498, 1, 0, 0),
(12, 32, 415, 1761, 1, 0, 0),
(15, 34, 415, 1761, 1, 0, 0),
(16, 38, 416, 1761, 1, 0, 0),
(17, 47, 424, 1636, 1, 0, 0),
(18, 48, 424, 1636, 1, 0, 0),
(20, 52, 533, 1664, 1, 0, 0),
(21, 51, 533, 1664, 1, 0, 0),
(22, 52, 533, 1664, 1, 0, 0),
(23, 55, 564, 2840, 1, 0, 0),
(25, 57, 565, 2840, 1, 0, 0),
(26, 59, 594, 2840, 1, 0, 0),
(30, 63, 739, 5699, 2, 0, 0),
(39, 67, 923, 5699, 2, 0, 0),
(40, 66, 923, 5699, 2, 0, 0),
(41, 65, 923, 5699, 2, 0, 0),
(43, 68, 950, 51770, 2, 0, 0),
(44, 69, 950, 51770, 2, 0, 0),
(45, 68, 950, 53576, 2, 0, 0),
(46, 69, 950, 53576, 2, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vision_misson`
--

CREATE TABLE `vision_misson` (
  `id` int(10) NOT NULL,
  `id_company` int(10) DEFAULT NULL,
  `description` text,
  `vision` text,
  `mission` text,
  `created_at` int(12) DEFAULT NULL,
  `updated_at` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ttnb cũ';

--
-- Đang đổ dữ liệu cho bảng `vision_misson`
--

INSERT INTO `vision_misson` (`id`, `id_company`, `description`, `vision`, `mission`, `created_at`, `updated_at`) VALUES
(3, 1761, 'Công ty Cổ phần Thanh toán Hưng Hà (HHP) được Sở Kế hoạch và Đầu tư Thành Phố Hà Nội thông qua giấy phép kinh doanh ngày 18/5/ 2016.\n\nTính đến thời điểm hiện tại, “con đẻ” kinh doanh đa ngành của CEO Trương Văn Trắc tập trung vào con át chủ bài là tuyển dụng nhân lực trực tuyến đã và đang gặt hái được nhiều thành tựu nổi bật. Dù gặp không ít khó khăn, song bằng sự nỗ lực của ban giám đốc và toàn bộ nhân viên, HHP đã từng bước vượt qua những khó khăn và trụ vững trong lòng người sử dụng, từng bước nâng cao tầm vóc, chất lượng, độ uy tín của các sản phẩm và dịch vụ. \n\nTrong 5 năm ròng hoạt động, Timviec365.vn không ngừng sáng tạo, đổi mới để mang đến người dùng những công cụ phục vụ nhu cầu tuyển dụng và tìm việc hiệu quả nhất. ', 'Mục đích ra đời của công ty cổ phần thanh toán Hưng Hà đó là góp phần xây dựng được một thị trường về dịch vụ thương mại điện tử mãnh mẽ và hiện đại. Chúng tôi luôn mong muốn trở thành đơn vị đi đầu trong lĩnh vực hiện tại và khuynh hướng phát triển hỗ trợ cho các dịch vụ khác. Nhịp chảy luân hồi của xã hội luôn kéo theo đó là nhu cầu của con người tăng cao, đó cũng là lý do khiến chúng tôi không ngừng hoàn thiện và nâng cấp chất lượng. Trong tương lai, đội ngũ nhân viên công ty cổ phần thanh toán Hưng Hà cùng phấn đấu trở thành cái tên số 1 về các sản phẩm điện tử dịch vụ, gắn liền với những sự tiện lợi và chất lượng nhất.', 'Công ty cổ phần thanh toán Hưng Hà quyết đem tất cả tâm lực, tài lực và trí lực phấn đấu phát triển, sáng tạo không ngừng nhằm đem lại chất lượng dịch vụ hàng đầu, hướng tới một cuộc sống tươi đẹp hơn! Chúng tôi đang trên con đường thực hiện mục tiêu cao cả cho xã hội, đó là giải quyết vấn đề việc làm thông qua việc cung cấp các dịch vụ hỗ trợ tuyển dụng và ứng tuyển. Tôn chỉ của chúng tôi là cống hiến hết mình sức sáng tạo và tâm huyết dành cho sự phát triển của công ty nói riêng và xã hội nói chung. Chúng tôi ý thức được rằng làm dịch vụ nghĩa là sự hài lòng của khách hàng luôn phải được ưu tiên và đặt lên hàng đầu. Đó cũng chính là sứ mệnh mà tất cả đội ngũ nhân viên của công ty CP Thanh toán Hưng Hà luôn cố gắng để phục vụ tốt nhất bằng các sản phẩm của chúng tôi.', 1633943818, 1635848655),
(4, 2498, 'Mô tả 111', 'Tầm nhìn 2000', 'Sứ mệnh 111', 1634207467, 1635328574),
(5, 1636, 'CÔNG TY CỔ PHẦN THANH TOÁN HƯNG HÀ\n\nĐỊNH HƯỚNG PHÁT TRIỂN THÀNH\n\nCÔNG TY DỊCH VỤ - THƯƠNG MẠI ĐIỆN TỬ HÀNG ĐẦU TRONG KHU VỰC ', NULL, NULL, 1634633949, 1634634122),
(6, 168, NULL, NULL, NULL, 1635068601, NULL),
(7, 1664, 'Là một trong những công ty đi đầu trong giới truyền thông', NULL, NULL, 1635213311, 1635823381),
(8, 2840, NULL, 'gfgfdg', NULL, 1637401504, 1640162135),
(9, 3312, NULL, NULL, NULL, 1644230179, NULL),
(10, 2185, NULL, NULL, NULL, 1644816248, NULL),
(11, 316, NULL, NULL, NULL, 1645108718, NULL),
(12, 3822, NULL, NULL, NULL, 1645857989, NULL),
(13, 2186, NULL, NULL, NULL, 1646383149, NULL),
(14, 3183, NULL, 'đdưqewqe', NULL, 1647321272, 1647321280),
(15, 92061, NULL, NULL, NULL, 1667802076, NULL),
(16, 72132, NULL, 'ssssss', 'aaaaa', 1671594204, 1671594228);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `working_rules`
--

CREATE TABLE `working_rules` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `comment` tinyint(4) NOT NULL COMMENT '1 là tăt bình luận, 0 là mở bình luận',
  `id_company` int(10) NOT NULL,
  `user_type` int(10) NOT NULL,
  `delete` int(10) NOT NULL DEFAULT '0',
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `working_rules`
--

INSERT INTO `working_rules` (`id`, `id_user`, `name`, `content`, `img`, `comment`, `id_company`, `user_type`, `delete`, `created_at`, `updated_at`) VALUES
(1, 1761, 'ưqewq', 'eqweqwe', '32596.png', 0, 1761, 1, 0, 1633766788, 1633766788),
(2, 1761, 'ưqewq', 'eqweqwe', '28580.png', 1, 1761, 1, 0, 1633767100, 1633767100),
(3, 1761, 'ưqewq1111', 'eqweqwe', '29514.png', 1, 1761, 1, 0, 1633767124, 1633767124),
(4, 1761, 'ưq', 'ww', '14525.png', 1, 1761, 1, 0, 1633767270, 1633767270),
(5, 1761, '1', '1', '16235.png', 1, 1761, 1, 0, 1633767329, 1633767329),
(6, 1761, 'qưe', 'qqqq', '7748.png', 1, 1761, 1, 1, 1633767401, 1633775658),
(7, 1761, 'das', 'qưe', '14260.png', 1, 1761, 1, 1, 1633767432, 1633775594),
(8, 1761, 'Tên nguyên tắc1qqq', 'nội dung nguyên tắc', '6230.png', 1, 1761, 1, 1, 1633768260, 1633775574),
(9, 1761, 'nguyên tắc 11', 'nội dung nguyên tắc 11', '1052717985.png', 0, 1761, 1, 0, 1634196173, 1634196173),
(10, 1761, 'nguyên tắc 11', 'nội dung nguyên tắc 11', '528111512.png', 0, 1761, 1, 0, 1634196179, 1634196179),
(11, 1761, 'Tên nguyên tắc1qqq', 'Nôi dungff', '1966926967.png', 0, 1761, 1, 0, 1634196318, 1634196318),
(12, 2498, 'Tên nguyên tắc1qqq11', 'qqqqqq', '1860245150.png', 1, 2498, 1, 1, 1634289753, 1634291429),
(13, 2498, 'Nguyen tac 111', 'nd nguyen tac', '809907379.png', 0, 2498, 1, 0, 1634377443, 1634377443),
(14, 1636, 'Nguyên tắc 1', 'đây là nội dung nguyên tắc', '87377942.jpeg', 1, 1636, 1, 0, 1634634898, 1634634898),
(15, 2498, 'ssds', 'sssss`1111', '1377095493.png', 1, 2498, 1, 0, 1635329902, 1635329902),
(16, 2498, 'Teg ntt', 'Nd nguyen tac', '1396030399.png', 1, 2498, 1, 0, 1635329970, 1635329970),
(17, 2498, 'sadsad', 'dwdqdqwwq````', '1036914008.png', 1, 2498, 1, 0, 1635330015, 1635330015),
(18, 2498, 'ssdsa', '111111', '1592700516.png', 0, 2498, 1, 0, 1635330231, 1635330231),
(19, 2498, 'Tên nguyên tắc1qqq2222', 'qwewqe', '634998661.png', 1, 2498, 1, 0, 1635330333, 1635330333),
(20, 1761, 'an pha', 'an pha apha ạn', '1455722071.png', 0, 1761, 1, 0, 1635848960, 1635848960),
(21, 2840, 'sadsas', 'dasdas', '574017988.png', 0, 2840, 1, 0, 1637402116, 1637402116);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `add_collection`
--
ALTER TABLE `add_collection`
  ADD PRIMARY KEY (`id_collection`);

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `answer_user`
--
ALTER TABLE `answer_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cam_dang_bai`
--
ALTER TABLE `cam_dang_bai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `city2`
--
ALTER TABLE `city2`
  ADD PRIMARY KEY (`cit_id`),
  ADD KEY `cit_order` (`cit_order`);

--
-- Chỉ mục cho bảng `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_album`
--
ALTER TABLE `comment_album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_core_value`
--
ALTER TABLE `comment_core_value`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_knowledge`
--
ALTER TABLE `comment_knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_target`
--
ALTER TABLE `comment_target`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_working_rules`
--
ALTER TABLE `comment_working_rules`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `com_create_time`
--
ALTER TABLE `com_create_time`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `config_background`
--
ALTER TABLE `config_background`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `core_value`
--
ALTER TABLE `core_value`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cover_image`
--
ALTER TABLE `cover_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cover_image_com`
--
ALTER TABLE `cover_image_com`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `custom_notification`
--
ALTER TABLE `custom_notification`
  ADD PRIMARY KEY (`id_ct`);

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dep_image`
--
ALTER TABLE `dep_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dinh_chi_thanh_vien`
--
ALTER TABLE `dinh_chi_thanh_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discuss`
--
ALTER TABLE `discuss`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `event_join`
--
ALTER TABLE `event_join`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `event_question`
--
ALTER TABLE `event_question`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gioi_han_thanh_vien`
--
ALTER TABLE `gioi_han_thanh_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `group_pin`
--
ALTER TABLE `group_pin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `group_rules`
--
ALTER TABLE `group_rules`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `internal_news`
--
ALTER TABLE `internal_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invite_to_group`
--
ALTER TABLE `invite_to_group`
  ADD PRIMARY KEY (`id_invite`);

--
-- Chỉ mục cho bảng `knowledge`
--
ALTER TABLE `knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `knowledge_answer`
--
ALTER TABLE `knowledge_answer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `like_album`
--
ALTER TABLE `like_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `like_comment`
--
ALTER TABLE `like_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `like_comment_album`
--
ALTER TABLE `like_comment_album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `like_comment_knowledge`
--
ALTER TABLE `like_comment_knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `like_comment_working_rules`
--
ALTER TABLE `like_comment_working_rules`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `like_working_rules`
--
ALTER TABLE `like_working_rules`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_answer_bonus`
--
ALTER TABLE `list_answer_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mail_from_ceo`
--
ALTER TABLE `mail_from_ceo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `members_report_posts`
--
ALTER TABLE `members_report_posts`
  ADD PRIMARY KEY (`id_report`);

--
-- Chỉ mục cho bảng `member_question`
--
ALTER TABLE `member_question`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member_request_join`
--
ALTER TABLE `member_request_join`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `new_feed`
--
ALTER TABLE `new_feed`
  ADD PRIMARY KEY (`new_id`);

--
-- Chỉ mục cho bảng `nickname`
--
ALTER TABLE `nickname`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `remove_group`
--
ALTER TABLE `remove_group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room_chat`
--
ALTER TABLE `room_chat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `save_post`
--
ALTER TABLE `save_post`
  ADD PRIMARY KEY (`id_save`);

--
-- Chỉ mục cho bảng `share_album`
--
ALTER TABLE `share_album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `share_post`
--
ALTER TABLE `share_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_voted`
--
ALTER TABLE `tbl_voted`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ttnb_cover_image_user`
--
ALTER TABLE `ttnb_cover_image_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ttnb_family`
--
ALTER TABLE `ttnb_family`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ttnb_infor_user`
--
ALTER TABLE `ttnb_infor_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ttnb_school`
--
ALTER TABLE `ttnb_school`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ttnb_work_place`
--
ALTER TABLE `ttnb_work_place`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `turnoff_group_notifications`
--
ALTER TABLE `turnoff_group_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `unfollow`
--
ALTER TABLE `unfollow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `update_calendar`
--
ALTER TABLE `update_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_vote`
--
ALTER TABLE `user_vote`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vision_misson`
--
ALTER TABLE `vision_misson`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `working_rules`
--
ALTER TABLE `working_rules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `add_collection`
--
ALTER TABLE `add_collection`
  MODIFY `id_collection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `answer_user`
--
ALTER TABLE `answer_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
--
-- AUTO_INCREMENT cho bảng `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `cam_dang_bai`
--
ALTER TABLE `cam_dang_bai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `city2`
--
ALTER TABLE `city2`
  MODIFY `cit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=774;
--
-- AUTO_INCREMENT cho bảng `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=684;
--
-- AUTO_INCREMENT cho bảng `comment_album`
--
ALTER TABLE `comment_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT cho bảng `comment_core_value`
--
ALTER TABLE `comment_core_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT cho bảng `comment_knowledge`
--
ALTER TABLE `comment_knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT cho bảng `comment_target`
--
ALTER TABLE `comment_target`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT cho bảng `comment_working_rules`
--
ALTER TABLE `comment_working_rules`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT cho bảng `com_create_time`
--
ALTER TABLE `com_create_time`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT cho bảng `config_background`
--
ALTER TABLE `config_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;
--
-- AUTO_INCREMENT cho bảng `core_value`
--
ALTER TABLE `core_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `cover_image`
--
ALTER TABLE `cover_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `cover_image_com`
--
ALTER TABLE `cover_image_com`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `custom_notification`
--
ALTER TABLE `custom_notification`
  MODIFY `id_ct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT cho bảng `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT cho bảng `dep_image`
--
ALTER TABLE `dep_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `dinh_chi_thanh_vien`
--
ALTER TABLE `dinh_chi_thanh_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `discuss`
--
ALTER TABLE `discuss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT cho bảng `event_join`
--
ALTER TABLE `event_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT cho bảng `event_question`
--
ALTER TABLE `event_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT cho bảng `gioi_han_thanh_vien`
--
ALTER TABLE `gioi_han_thanh_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT cho bảng `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT cho bảng `group_pin`
--
ALTER TABLE `group_pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT cho bảng `group_rules`
--
ALTER TABLE `group_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT cho bảng `internal_news`
--
ALTER TABLE `internal_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT cho bảng `invite_to_group`
--
ALTER TABLE `invite_to_group`
  MODIFY `id_invite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT cho bảng `knowledge`
--
ALTER TABLE `knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `knowledge_answer`
--
ALTER TABLE `knowledge_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT cho bảng `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- AUTO_INCREMENT cho bảng `like_album`
--
ALTER TABLE `like_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `like_comment`
--
ALTER TABLE `like_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT cho bảng `like_comment_album`
--
ALTER TABLE `like_comment_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `like_comment_knowledge`
--
ALTER TABLE `like_comment_knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT cho bảng `like_comment_working_rules`
--
ALTER TABLE `like_comment_working_rules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `like_working_rules`
--
ALTER TABLE `like_working_rules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `list_answer_bonus`
--
ALTER TABLE `list_answer_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `mail_from_ceo`
--
ALTER TABLE `mail_from_ceo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT cho bảng `members_report_posts`
--
ALTER TABLE `members_report_posts`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT cho bảng `member_question`
--
ALTER TABLE `member_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT cho bảng `member_request_join`
--
ALTER TABLE `member_request_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT cho bảng `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `new_feed`
--
ALTER TABLE `new_feed`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1105;
--
-- AUTO_INCREMENT cho bảng `nickname`
--
ALTER TABLE `nickname`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT cho bảng `remove_group`
--
ALTER TABLE `remove_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `room_chat`
--
ALTER TABLE `room_chat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT cho bảng `save_post`
--
ALTER TABLE `save_post`
  MODIFY `id_save` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT cho bảng `share_album`
--
ALTER TABLE `share_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT cho bảng `share_post`
--
ALTER TABLE `share_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT cho bảng `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `tbl_voted`
--
ALTER TABLE `tbl_voted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT cho bảng `ttnb_cover_image_user`
--
ALTER TABLE `ttnb_cover_image_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `ttnb_family`
--
ALTER TABLE `ttnb_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `ttnb_infor_user`
--
ALTER TABLE `ttnb_infor_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `ttnb_school`
--
ALTER TABLE `ttnb_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `ttnb_work_place`
--
ALTER TABLE `ttnb_work_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `turnoff_group_notifications`
--
ALTER TABLE `turnoff_group_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `unfollow`
--
ALTER TABLE `unfollow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT cho bảng `update_calendar`
--
ALTER TABLE `update_calendar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `user_vote`
--
ALTER TABLE `user_vote`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT cho bảng `vision_misson`
--
ALTER TABLE `vision_misson`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `working_rules`
--
ALTER TABLE `working_rules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

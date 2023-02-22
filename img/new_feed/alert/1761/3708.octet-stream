-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 01:54 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ttvh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE IF NOT EXISTS `bonus` (
`id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `id_option` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonus`
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
(9, 155, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_parent` int(11) DEFAULT '0',
  `content` text,
  `image` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '1: công ty, 2: nhân viên',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_new`, `id_user`, `id_parent`, `content`, `image`, `user_type`, `created_at`, `updated_at`) VALUES
(24, 177, 1761, 0, 'đâsdsad', '', 1, 1632744406, 1632744406),
(25, 167, 1761, 0, 'zxczxc', '', 1, 1632745489, 1632745489),
(26, 177, 1761, 0, 'asdasdasd', '', 1, 1632793794, 1632793794),
(27, 177, 1761, 0, 'wqeqweq', '', 1, 1632794198, 1632794198),
(28, 177, 1761, 0, 'asdadas', '', 1, 1632794360, 1632794360),
(29, 177, 1761, 0, 'asdasdas', '', 1, 1632794373, 1632794373),
(31, 177, 1761, 0, 'asdsada', '', 1, 1632794621, 1632794621),
(32, 177, 1761, 0, 'asdasd', '', 1, 1632794698, 1632794698),
(33, 177, 1761, 0, 'asdsad', '', 1, 1632794817, 1632794817),
(34, 177, 1761, 0, 'asdasdasd', '', 1, 1632794845, 1632794845),
(35, 177, 1761, 0, 'dasdasd', '', 1, 1632794932, 1632794932),
(36, 177, 1761, 0, 'asdasdasd', '', 1, 1632795025, 1632795025),
(37, 177, 1761, 0, 'asdasdasd', '', 1, 1632795129, 1632795129),
(38, 177, 1761, 0, 'asdasd', '', 1, 1632795304, 1632795304),
(39, 177, 1761, 0, 'asdasd', '', 1, 1632795345, 1632795345),
(42, 177, 1761, 0, 'ádasd', '', 1, 1632797285, 1632797285),
(43, 177, 1761, 0, 'ádasdasd', '', 1, 1632797326, 1632797326),
(44, 177, 1761, 0, 'ádasdasd', '', 1, 1632797347, 1632797347),
(45, 177, 1761, 0, 'ádasd', '', 1, 1632797432, 1632797432),
(46, 177, 1761, 0, 'ádasdasd', '', 1, 1632797505, 1632797505),
(47, 177, 1761, 0, 'a', '../img/new_feed/comment/10304.png', 1, 1632817862, 1632817862),
(50, 177, 1761, 0, 'ádasd', '../img/new_feed/comment/11818.png', 1, 1632818805, 1632818805),
(51, 177, 1761, 0, 'dấds', '../img/new_feed/comment/23860.png', 1, 1632818865, 1632818865),
(52, 177, 1761, 0, 'ádasd', '', 1, 1632818911, 1632818911),
(53, 177, 1761, 0, 'ádasdasd', '', 1, 1632818934, 1632818934),
(54, 177, 1761, 0, 'ádasd', '../img/new_feed/comment/31226.png', 1, 1632818955, 1632818955),
(55, 177, 1761, 0, 'new nưe', '../img/new_feed/comment/16548.png', 1, 1632818965, 1632818965),
(56, 177, 1761, 0, 'new new', '../img/new_feed/comment/20050.png', 1, 1632819039, 1632819039),
(57, 177, 1761, 0, 'ấdasdsad', '../img/new_feed/comment/223.png', 1, 1632819492, 1632819492),
(58, 177, 1761, 0, 'qưeqwe', '', 1, 1632819549, 1632819549),
(61, 177, 1761, 0, 'khânhsdamd', '', 1, 1632823656, 1632823656),
(62, 177, 1761, 0, 'dasadasd', '../img/new_feed/comment/13405.png', 1, 1632827387, 1632827387),
(63, 177, 1761, 0, 'ádasdasd', '../img/new_feed/comment/5024.png', 1, 1632877959, 1632877959),
(64, 177, 1761, 0, '', '../img/new_feed/comment/24536.png', 1, 1632881092, 1632881092),
(65, 177, 1761, 64, 'C:fakepathScreenshot (3).png', '', 1, 1632881997, 1632881997),
(66, 177, 1761, 64, 'C:fakepathScreenshot (3).png', '../img/new_feed/comment/3219.png', 1, 1632882063, 1632882063),
(67, 177, 1761, 64, 'ádasdasd', '', 1, 1632882350, 1632882350),
(68, 177, 1761, 64, 'ádasda', '', 1, 1632882691, 1632882691),
(69, 177, 1761, 64, 'ádasdasd', '', 1, 1632886180, 1632886180),
(70, 177, 1761, 64, 'ádasdasd', '', 1, 1632886185, 1632886185),
(71, 177, 1761, 64, 'rep cmt', '', 1, 1632886588, 1632886588),
(72, 177, 1761, 64, 'cmt', '', 1, 1632886680, 1632886680),
(73, 177, 1761, 64, 'cmt', '../img/new_feed/comment/23539.png', 1, 1632886691, 1632886691),
(74, 177, 1761, 64, '', '../img/new_feed/comment/19068.png', 1, 1632886968, 1632886968),
(75, 177, 1761, 63, 'ádasdas', '', 1, 1632887021, 1632887021),
(76, 177, 1761, 64, 'ádasdasd', '', 1, 1632887039, 1632887039),
(77, 177, 1761, 63, 'ádasdasd', '', 1, 1632887043, 1632887043),
(78, 177, 1761, 64, '.', '', 1, 1632887064, 1632887064),
(79, 177, 1761, 62, 'ádasd', '', 1, 1632887134, 1632887134),
(80, 177, 1761, 63, 'ádasdasd', '', 1, 1632887137, 1632887137),
(81, 177, 1761, 64, 'ádasdsasd', '', 1, 1632887140, 1632887140),
(82, 177, 1761, 64, '', '../img/new_feed/comment/95.png', 1, 1632887158, 1632887158),
(83, 177, 1761, 64, '', '../img/new_feed/comment/207.png', 1, 1632887162, 1632887162),
(84, 177, 1761, 62, 'đâsdasd', '', 1, 1632904361, 1632904361),
(86, 177, 1761, 85, 'ádasdasd', '', 1, 1632904554, 1632904554),
(87, 177, 1761, 85, 'ádasdasd', '', 1, 1632904632, 1632904632),
(88, 177, 1761, 85, 'ádasdas', '', 1, 1632907841, 1632907841),
(89, 177, 1761, 63, 'ádasdas', '', 1, 1632908580, 1632908580),
(90, 177, 1761, 62, 'ádasdasd', '', 1, 1632908583, 1632908583),
(91, 177, 1761, 62, 'aaaa', '', 1, 1632908589, 1632908589),
(92, 177, 1761, 60, 'khanh khanh', '', 1, 1632908614, 1632908614),
(93, 177, 1761, 64, 'andnad,ad', '', 1, 1632992459, 1632992459),
(94, 177, 1761, 0, 'ádasdasd', '', 1, 1632992586, 1632992586),
(95, 177, 1761, 0, 'ádasdasd', '', 1, 1632992694, 1632992694),
(96, 177, 1761, 0, 'ádasdasd', '', 1, 1632992700, 1632992700),
(97, 177, 1761, 0, 'ádasdasd', '', 1, 1632992717, 1632992717),
(98, 177, 1761, 0, 'ádasda', '', 1, 1632993006, 1632993006),
(99, 177, 1761, 0, 'eqwqwe', '', 1, 1632993220, 1632993220),
(100, 177, 1761, 99, 'ưeqeqwe', '', 1, 1632993223, 1632993223),
(101, 177, 1761, 0, 'ádasdasd13123ád', '', 1, 1632993439, 1633404812),
(102, 177, 1761, 101, 'ádadasd', '', 1, 1632993443, 1632993443),
(103, 177, 1761, 101, 'âsdasd', '', 1, 1632993488, 1632993488),
(104, 177, 1761, 0, 'ádasd tester', '', 1, 1632993751, 1633418696),
(105, 177, 1761, 104, 'ádasdasd', '', 1, 1632993756, 1632993756),
(106, 177, 1761, 104, 'cmtcke', '../img/new_feed/comment/29336.png', 1, 1632994694, 1632994694),
(120, 119, 1761, 0, 'ádasd', '', 1, 1633405143, 1633405143),
(124, 177, 1761, 0, 'sdasdasd ádasd đâsd 123123', '', 1, 1633405407, 1633418633),
(125, 177, 1761, 0, 'ádasdasd qưeqwe 123', '../img/new_feed/comment/12522.png', 1, 1633405583, 1633418272),
(132, 177, 1761, 0, 'chinh ne', '', 1, 1633407606, 1633418523),
(133, 177, 1761, 132, 'ádasdas ádasdasd 133', '../img/new_feed/comment/9273.png', 1, 1633419867, 1633425228),
(134, 177, 1761, 132, 'ádasdas131232 134 12', '../img/new_feed/comment/24346.png', 1, 1633419966, 1633425328),
(138, 177, 1761, 132, 'qưeqwe qưeqwe ádasdasd', '', 1, 1633423058, 1633425049),
(139, 177, 1761, 132, 'ádasdasd 123123', '', 1, 1633423394, 1633425171),
(142, 177, 1761, 132, 'ádasdasd', '', 1, 1633425333, 1633425333),
(145, 169, 1761, 0, 'ádasdasd', '', 1, 1633427309, 1633427309),
(147, 172, 1761, 0, 'ádasdasd', '', 1, 1633427402, 1633427402),
(148, 176, 1761, 0, 'ádasdsasd', '', 1, 1633427647, 1633427647),
(150, 176, 1761, 0, 'đâsdasđ', '', 1, 1633427737, 1633427737),
(151, 176, 1761, 0, '123', '', 1, 1633427768, 1633427768),
(152, 172, 1761, 0, '456', '', 1, 1633427775, 1633427775),
(153, 172, 1761, 152, '3123', '', 1, 1633427791, 1633427791),
(155, 177, 1761, 154, 'ádasd', '', 1, 1633427953, 1633427953),
(157, 0, 1761, 156, '123123', '', 1, 1633428030, 1633428030),
(160, 177, 1761, 159, 'ádasdasd đâsd', '', 1, 1633428121, 1633428126),
(161, 177, 1761, 0, 'ádasdasd', '../img/new_feed/comment/6356.png', 1, 1633428273, 1633428298),
(162, 177, 1761, 161, 'ádasdasd', '../img/new_feed/comment/15932.png', 1, 1633428278, 1633428286),
(163, 176, 1761, 0, 'ádasdn', '', 1, 1633428316, 1633428316),
(164, 176, 1761, 163, 'ádasdasd', '', 1, 1633428324, 1633428330),
(165, 177, 1761, 161, 'ádasdasd', '', 1, 1633428413, 1633428418),
(166, 177, 1761, 0, 'qeqeqwe', '../img/new_feed/comment/17664.jpg', 1, 1633428626, 1633429202),
(167, 177, 1761, 166, 'ádasdasd ', '../img/new_feed/comment/21858.png', 1, 1633428654, 1633508936),
(168, 177, 1761, 166, 'ádasdasd sad', '', 1, 1633428978, 1633508895),
(169, 177, 1761, 166, 'ádasdasd ádasd ádasd 123', '', 1, 1633429142, 1633429185),
(170, 176, 1761, 0, 'ádasdasdasd up 213', '', 1, 1633429216, 1633443187),
(171, 176, 1761, 170, '123123 123 ád qưe qưeqwe ', '../img/new_feed/comment/21400.png', 1, 1633429241, 1633509288),
(172, 176, 1761, 170, 'qưeqwe', '', 1, 1633429251, 1633429288),
(173, 170, 1761, 0, 'ádasdasd', '', 1, 1633443192, 1633443192),
(174, 177, 1761, 0, 'ádasdasd', '', 1, 1633443227, 1633443227),
(175, 176, 1761, 0, 'ádasdasd', '../img/new_feed/comment/10194.png', 1, 1633443233, 1633447508),
(176, 175, 1761, 0, 'ádadasd', '../img/new_feed/comment/21098.jpg', 1, 1633443250, 1633443250),
(177, 176, 1761, 175, 'ádasdasd', '', 1, 1633447108, 1633507838),
(178, 171, 1761, 0, 'ádasdasd', '', 1, 1633447885, 1633447885),
(179, 171, 1761, 178, 'ádasdasd đâsd', '../img/new_feed/comment/19831.png', 1, 1633447892, 1633447919),
(180, 177, 1761, 125, 'ádasdasd ádasd', '', 1, 1633508755, 1633508769),
(181, 177, 1761, 174, 'ádasdasd', '', 1, 1633508787, 1633508794),
(182, 177, 1761, 132, 'ádasdasd ádasdasd', '', 1, 1633508807, 1633508818),
(183, 177, 1761, 161, 'ádasdasd', '', 1, 1633508850, 1633508860),
(184, 177, 1761, 174, 'a ádasd', '', 1, 1633508867, 1633508871),
(185, 176, 1761, 175, '', '../img/new_feed/comment/16124.png', 1, 1633508984, 1633508984),
(186, 176, 1761, 175, '', '../img/new_feed/comment/31357.png', 1, 1633509059, 1633509059),
(187, 176, 1761, 175, '', '../img/new_feed/comment/5855.png', 1, 1633509090, 1633509090),
(188, 185, 1761, 0, 'bình luận', '', 1, 1633764448, 1633764448),
(189, 185, 1761, 188, 'bình luận', '', 1, 1633764459, 1633764459);

-- --------------------------------------------------------

--
-- Table structure for table `comment_core_value`
--

CREATE TABLE IF NOT EXISTS `comment_core_value` (
`id` int(11) NOT NULL,
  `id_core` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_core_value`
--

INSERT INTO `comment_core_value` (`id`, `id_core`, `id_user`, `id_parent`, `content`, `image`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 8, 1761, 0, 'qưeqwe', '', '1', 1633492349, 1633492349),
(2, 8, 1761, 0, 'qưeqweq', '', '1', 1633492732, 1633492732),
(3, 8, 1761, 0, 'ádasdádasd', '', '1', 1633492770, 1633492770),
(4, 8, 1761, 1, 'ádasd', '', '1', 1633492798, 1633492798),
(5, 8, 1761, 2, 'ádasdasd', '', '1', 1633492903, 1633492903),
(6, 8, 1761, 0, '', '../img/new_feed/comment/31336.png', '1', 1633493159, 1633493159),
(7, 8, 1761, 0, 'ádasdasd', '../img/vanhoadoanhnghiep/core_value/comment/14086.jpg', '1', 1633493308, 1633493308),
(8, 8, 1761, 0, 'ádasdasdasd', '', '1', 1633493587, 1633508103),
(9, 8, 1761, 0, '', '../img/new_feed/comment/26647.png', '1', 1633494005, 1633494005),
(10, 8, 1761, 0, 'ádassdasd', '../img/new_feed/comment/7202.jpg', '1', 1633494056, 1633505588),
(11, 8, 1761, 10, 'ádasdasdasd', '', '1', 1633503778, 1633503778),
(12, 8, 1761, 10, 'ádasdasdasd', '', '1', 1633503780, 1633503780),
(13, 8, 1761, 10, 'ádasdasdasd', '', '1', 1633503780, 1633503780),
(14, 8, 1761, 10, 'ádasdasdasd', '', '1', 1633503780, 1633503780),
(15, 8, 1761, 10, 'ádasdasdasd', '', '1', 1633503780, 1633503780),
(16, 8, 1761, 10, 'ádasdasdasd', '', '1', 1633503781, 1633503781),
(17, 8, 1761, 10, 'ádasdasdasd', '', '1', 1633503787, 1633503787),
(18, 8, 1761, 10, 'ádasdasdasd', '', '1', 1633503812, 1633503812),
(19, 8, 1761, 10, 'ádasdsasd', '', '1', 1633504193, 1633504193),
(20, 8, 1761, 10, '', '../img/new_feed/comment/4752.jpg', '1', 1633504942, 1633509484),
(21, 10, 1761, 0, 'ádasdasd', '../img/vanhoadoanhnghiep/core_value/comment/30117.png', '1', 1633505473, 1633505473),
(22, 10, 1761, 0, 'ádasdasd', '../img/vanhoadoanhnghiep/core_value/comment/13405.png', '1', 1633505486, 1633505486),
(23, 8, 1761, 0, 'ádasdasd ', '../img/new_feed/comment/1522.png', '1', 1633505591, 1633505600),
(24, 8, 1761, 0, 'ádasdasd', '../img/vanhoadoanhnghiep/core_value/comment/7795.jpg', '1', 1633505726, 1633505726),
(25, 8, 1761, 0, 'ádasdasd', '../img/new_feed/comment/18285.png', '1', 1633505731, 1633505743),
(26, 8, 1761, 0, 'ádasdasd ádasdasd', '../img/new_feed/comment/15326.png', '1', 1633505836, 1633505848),
(27, 8, 1761, 0, 'asdasdasdasd ', '../img/new_feed/comment/28809.jpg', '1', 1633505908, 1633506015),
(28, 8, 1761, 0, 'ádasdasd', '../img/new_feed/comment/25729.png', '1', 1633506027, 1633506076),
(29, 8, 1761, 0, 'sdasdasd ádasdasd', '../img/new_feed/comment/18072.png', '1', 1633506089, 1633506394),
(30, 8, 1761, 0, 'ádasdasd ádasdasdasd', '', '1', 1633506452, 1633508609),
(31, 8, 1761, 0, 'ádasdasd', '', '1', 1633506634, 1633506634),
(32, 8, 1761, 0, 'ádasd', '../img/new_feed/comment/4153.jpg', '1', 1633506685, 1633507113),
(35, 8, 1761, 29, 'ádasdasd', '', '1', 1633508209, 1633508209),
(36, 8, 1761, 28, 'ádasdasdasd', '', '1', 1633508214, 1633508214),
(37, 8, 1761, 30, 'ádasdasd', '../img/new_feed/comment/11294.jpg', '1', 1633508576, 1633509466),
(38, 8, 1761, 31, 'ádasdasd', '../img/new_feed/comment/25330.png', '1', 1633509978, 1633509986),
(39, 8, 1761, 31, 'ádasdasd', '../img/new_feed/comment/8155.png', '1', 1633510130, 1633510265),
(40, 8, 1761, 31, 'ádasdasd', '../img/new_feed/comment/834.jpg', '1', 1633510273, 1633510273),
(41, 8, 1761, 31, 'ádasd ádasd', '../img/new_feed/comment/16626.jpg', '1', 1633510350, 1633510378),
(47, 1, 1761, 0, 'asda2dasdasd', '', '1', 1633569104, 1633569104),
(48, 0, 1761, 6, 'ádasdasd', '', '1', 1633573795, 1633573795),
(49, 0, 1761, 3, '( y )', '', '1', 1633578126, 1633578126);

-- --------------------------------------------------------

--
-- Table structure for table `comment_knowledge`
--

CREATE TABLE IF NOT EXISTS `comment_knowledge` (
`id` int(11) NOT NULL,
  `knowledge_answer_id` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `content` text,
  `user_type` tinyint(4) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `created_at` int(12) DEFAULT NULL,
  `updated_at` int(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_knowledge`
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
(101, 96, 1761, 'qưeqweqwe', 1, 96, 1633487404, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment_target`
--

CREATE TABLE IF NOT EXISTS `comment_target` (
`id` int(11) NOT NULL,
  `id_target` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_target`
--

INSERT INTO `comment_target` (`id`, `id_target`, `id_user`, `id_parent`, `content`, `image`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 3, 1761, 0, 'qưeqweqwe', '', 1, 1633572504, 1633572504),
(2, 3, 1761, 0, 'ádasdasd', '', 1, 1633572602, 1633572602),
(3, 3, 1761, 0, 'ádadsad adasdad', '', 1, 1633572745, 1633576379),
(4, 3, 1761, 0, 'đâsdasd', '', 1, 1633572862, 1633572862),
(5, 3, 1761, 0, 'sadasdasd', '', 1, 1633572880, 1633572880),
(6, 3, 1761, 0, '', '../img/vanhoadoanhnghiep/target/comment/10692.png', 1, 1633572923, 1633572923),
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
(27, 0, 1761, 26, 'ádasdasd adsdasd', '', 1, 1633599879, 1633599894);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
`id` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `seen` tinyint(4) DEFAULT NULL,
  `delete` tinyint(4) DEFAULT NULL,
  `create` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `id_employee`, `id_module`, `seen`, `delete`, `create`) VALUES
(10, 3430, 1, 0, 0, 0),
(11, 3426, 1, 0, 0, 0),
(12, 3007, 1, 1, 1, 1),
(13, 3007, 2, 1, 1, 1),
(14, 3007, 3, 1, 1, 1),
(15, 3007, 4, 1, 1, 1),
(16, 3007, 5, 1, 1, 1),
(17, 3007, 6, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_value`
--

CREATE TABLE IF NOT EXISTS `core_value` (
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_value`
--

INSERT INTO `core_value` (`id`, `id_user`, `id_company`, `tittle`, `content`, `cover_image`, `comment`, `option_notify`, `user_type`, `delete`, `created_at`, `updated_at`) VALUES
(1, 1761, 1761, 'Tên giá trị cốt lõi', 'Nội dung giá trị cốt lõi', '25099.png', 0, '0', 1, 0, 1632123070, 1632123070),
(2, 1761, 1761, 'Giá trị cốt lõi 2344555', 'nội dung giá trị cốt lõi 2', '7928.png', 0, '0', 1, 1, 1632132562, 1632131207),
(3, 1761, 1761, 'gtcl', 'asdqeqwe', '15616.png', 0, '0', 1, 1, 1632132604, 1632132596),
(4, 1761, 1761, 'ewq', 'wqeqw', '20794.PNG', 0, '0', 1, 1, 1632738185, 1632132785),
(5, 1761, 1761, 'eqwe', 'eqweqwe', '12231.png', 0, '0', 1, 1, 1632738155, 1632733231),
(6, 1636, 1636, 'giá trri cot loi', '123123123', '28747.png', 0, '0', 1, 0, 1632538979, 1632539499),
(7, 1761, 1764, 'asdasdas', 'asdasdasdads', '8603.png', 0, '1', 1, 0, 1632708096, 1632708096),
(8, 1761, 1761, 'ádasdasdasd', 'ádasdasdasd', '3593.png', 1, '1', 1, 0, 1633486262, 1633486262);

-- --------------------------------------------------------

--
-- Table structure for table `cover_image`
--

CREATE TABLE IF NOT EXISTS `cover_image` (
`id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `link_image` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cover_image_com`
--

CREATE TABLE IF NOT EXISTS `cover_image_com` (
`id` int(10) NOT NULL,
  `id_company` int(10) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `discuss`
--

CREATE TABLE IF NOT EXISTS `discuss` (
`id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  `discuss_mode` tinyint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discuss`
--

INSERT INTO `discuss` (`id`, `new_id`, `discuss_mode`) VALUES
(1, 152, 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
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
(43, 169, '27985.png', 1631931720, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_join`
--

CREATE TABLE IF NOT EXISTS `event_join` (
`id` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_join`
--

INSERT INTO `event_join` (`id`, `id_employee`, `id_event`, `user_type`) VALUES
(10, 3042, 43, 2),
(11, 3609, 43, 2),
(16, 1761, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `id_manager` varchar(255) DEFAULT NULL,
  `id_employee` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `group_image` varchar(255) DEFAULT NULL,
  `description` text,
  `group_mode` tinyint(4) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `id_company`, `group_name`, `id_manager`, `id_employee`, `cover_image`, `group_image`, `description`, `group_mode`, `created_at`, `updated_at`) VALUES
(2, 1761, 'wdewqdewq', '3426,3410', '3430,3426,3343', '8333.png', '578.png', '1eqweqwe', 0, NULL, NULL),
(3, 1761, 'wdewqdewq', '3426,3410', '3430,3426,3343', '6042.png', '10443.png', '1eqweqwe', 0, NULL, NULL),
(4, 1761, 'wdewqdewq', '3430,3426', '3426', '3938.png', '6387.png', '1eqweqwe', 0, NULL, NULL),
(5, 1761, 'wdewqdewq', '3426', '3410', '6634.png', '1243.png', '1eqweqwe', 0, NULL, NULL),
(6, 1761, 'wdewqdewq', '3430', '3426', '30238.png', '7935.png', '1eqweqwe', 0, NULL, NULL),
(7, 1761, 'wdewqdewq', '3430', '3343', '10391.png', '31364.png', '1eqweqwe', 0, NULL, NULL),
(8, 1761, 'wdewqdewq', '3430', '3343', '5660.png', '8741.png', '1eqweqwe', 0, NULL, NULL),
(9, 1761, 'wdewqdewq', '3426', '3426', '18716.png', '22821.png', '1eqweqwe', 0, NULL, NULL),
(10, 1761, 'wdewqdewq', '3426', '3426', '1598.png', '15519.png', '1eqweqwe', 0, NULL, NULL),
(17, 1761, 'de an 3', '3426', '3426,3410', '21876.png', '27293.png', '1eqweqwe', 1, NULL, NULL),
(18, 1761, 'de an 4', '3426,3410,3343', '3426,3252,3064', '19918.png', '5359.png', 'Nhóm de an 4', 1, NULL, NULL),
(19, 1761, 'Đề Án 5', '3430,3426', '3449,3430', '9478.jpeg', '18375.jpeg', 'Đề án 3333', 0, NULL, NULL),
(20, 1761, 'đề án 6', '3449,3430', '3449,3430', '3237.png', '22650.png', 'Đây là nhóm', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `internal_news`
--

CREATE TABLE IF NOT EXISTS `internal_news` (
`id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internal_news`
--

INSERT INTO `internal_news` (`id`, `id_new`, `cover_image`) VALUES
(1, 100, '25693.png'),
(2, 101, '13370.png'),
(3, 154, '19840.jpeg'),
(4, 174, '13353.png'),
(5, 176, '9268.png');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge`
--

CREATE TABLE IF NOT EXISTS `knowledge` (
`id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `description` text,
  `file` varchar(255) DEFAULT NULL,
  `user_type` tinyint(11) DEFAULT NULL,
  `delete` tinyint(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knowledge`
--

INSERT INTO `knowledge` (`id`, `id_company`, `id_user`, `name`, `author`, `field`, `description`, `file`, `user_type`, `delete`, `created_at`, `updated_at`) VALUES
(3, 1761, 1761, 'sdasww11111', 'dqwe', 'qưeqw', 'eqwe1111', '10247.xls', 1, 0, 1631672829, 1631672829),
(5, 1761, 1761, '1', '1', '1', '1', '1425.xls', 1, 0, 1631679529, 1631679529);

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_answer`
--

CREATE TABLE IF NOT EXISTS `knowledge_answer` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `knowledge_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `user_type` tinyint(11) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knowledge_answer`
--

INSERT INTO `knowledge_answer` (`id`, `id_user`, `id_company`, `knowledge_id`, `content`, `file`, `user_type`, `created_at`, `updated_at`) VALUES
(5, 1761, 1761, 5, 'ddadas', '20943.xls', 1, 1631762845, 1631762845),
(7, 1761, 1761, 5, 'ddadas', '20943.xls', 1, 1631762845, 1631762845),
(8, 1761, 1761, 5, 'ddadas', '20943.xls', 1, 1631762845, 1631762845),
(9, 1761, 1761, 5, 'ddadas', '20943.xls', 1, 1631762845, 1631762845),
(11, 1761, 1761, 5, 'ddadas', '20943.xls', 1, 1631762845, 1631762845),
(12, 1761, 1761, 5, 'ddadas', '20943.xls', 1, 1631762845, 1631762845);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
`id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `user_type` int(11) NOT NULL COMMENT '1: cty; 2:nhân viên',
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `id_new`, `id_user`, `user_type`, `created_at`) VALUES
(5, 160, 1761, 1, 1631606808),
(6, 161, 1761, 1, 1631607107),
(11, 159, 1761, 1, 1631607833),
(12, 158, 1761, 1, 1631607851),
(13, 155, 1761, 1, 1631607858),
(14, 170, 1761, 1, 1632140165),
(19, 177, 1761, 0, 1633489753),
(20, 8, 1761, 1, 1633490766),
(21, 185, 1761, 1, 1633764438);

-- --------------------------------------------------------

--
-- Table structure for table `like_comment`
--

CREATE TABLE IF NOT EXISTS `like_comment` (
`id` int(11) NOT NULL,
  `id_comment` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_comment`
--

INSERT INTO `like_comment` (`id`, `id_comment`, `id_user`, `user_type`, `created_at`) VALUES
(1, 14, 1761, 1, 1632141561),
(4, 13, 1761, 1, 1632144279),
(5, 22, 1761, 1, 1632148967),
(8, 68, 1761, 1, 1632885976),
(10, 60, 1761, 1, 1632886097),
(12, 86, 1761, 1, 1632904604),
(15, 67, 1761, 1, 1632985557),
(16, 61, 1761, 1, 1632985927),
(20, 64, 1761, 1, 1632991321),
(21, 66, 1761, 1, 1632992116),
(22, 65, 1761, 1, 1632992145),
(27, 75, 1761, 1, 1632992248),
(30, 0, 1761, 1, 1632992589),
(34, 105, 1761, 1, 1632993759),
(35, 104, 1761, 1, 1633396653),
(36, 172, 1761, 1, 1633429271),
(37, 171, 1761, 1, 1633429273),
(38, 170, 1761, 1, 1633429274),
(39, 167, 1761, 1, 1633485989),
(40, 175, 1761, 0, 1633489474),
(41, 177, 1761, 0, 1633489566),
(44, 33, 1761, 0, 1633514967),
(45, 33, 1761, 0, 1633514998),
(46, 33, 1761, 0, 1633515044);

-- --------------------------------------------------------

--
-- Table structure for table `like_comment_core`
--

CREATE TABLE IF NOT EXISTS `like_comment_core` (
`id` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `like_comment_core`
--

INSERT INTO `like_comment_core` (`id`, `id_comment`, `id_user`, `user_type`, `created_at`) VALUES
(2, 33, 1761, 1, 1633515234),
(4, 34, 1761, 1, 1633515394),
(5, 30, 1761, 1, 1633515412),
(6, 37, 1761, 1, 1633515414);

-- --------------------------------------------------------

--
-- Table structure for table `like_comment_knowledge`
--

CREATE TABLE IF NOT EXISTS `like_comment_knowledge` (
`id` int(11) NOT NULL,
  `comment_knowledge_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_comment_knowledge`
--

INSERT INTO `like_comment_knowledge` (`id`, `comment_knowledge_id`, `id_user`, `created_at`) VALUES
(4, 61, 1761, 1631869360),
(6, 76, 1761, 1631934263),
(7, 77, 1761, 1631935002),
(15, 88, 1761, 1631936868);

-- --------------------------------------------------------

--
-- Table structure for table `like_comment_target`
--

CREATE TABLE IF NOT EXISTS `like_comment_target` (
`id` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `like_comment_target`
--

INSERT INTO `like_comment_target` (`id`, `id_comment`, `id_user`, `user_type`, `created_at`) VALUES
(1, 8, 1761, 1, 1633577871),
(2, 5, 1761, 1, 1633578104),
(4, 9, 1761, 1, 1633592442),
(5, 13, 1761, 1, 1633593832);

-- --------------------------------------------------------

--
-- Table structure for table `like_core_value`
--

CREATE TABLE IF NOT EXISTS `like_core_value` (
`id` int(11) NOT NULL,
  `id_core` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `like_core_value`
--

INSERT INTO `like_core_value` (`id`, `id_core`, `id_user`, `user_type`, `created_at`) VALUES
(6, 8, 1761, 1, 1633491247),
(7, 1, 1761, 1, 1633569100),
(8, 3, 1761, 1, 1633570055);

-- --------------------------------------------------------

--
-- Table structure for table `like_target`
--

CREATE TABLE IF NOT EXISTS `like_target` (
`id` int(11) NOT NULL,
  `id_target` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `like_target`
--

INSERT INTO `like_target` (`id`, `id_target`, `id_user`, `user_type`, `created_at`) VALUES
(6, 0, 1761, 1, 1633570396),
(10, 3, 1761, 1, 1633577867);

-- --------------------------------------------------------

--
-- Table structure for table `list_answer_bonus`
--

CREATE TABLE IF NOT EXISTS `list_answer_bonus` (
`id` int(11) NOT NULL,
  `id_vote` int(11) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mail_from_ceo`
--

CREATE TABLE IF NOT EXISTS `mail_from_ceo` (
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mail_from_ceo`
--

INSERT INTO `mail_from_ceo` (`id`, `title_mail`, `content`, `file`, `user_sent`, `id_company`, `option_notify`, `user_type`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'Tiêu đề', 'Nội dung thư', '32697.xls', 1761, 1761, NULL, 1, 0, 1632104371, 1632110768),
(10, 'Đây là tiêu đề', 'Nội dung', '7595.xls', 1761, 1761, '1', 1, 0, 1632105963, 1632110751),
(11, 'Tiêu đề', 'Nội dung', '31771.xls', 1761, 1761, '1,2', 1, 0, 1632106103, 1632110726),
(12, 'Thông báo', 'sadasd', '11475.xls', 1761, 1761, '1,2', 1, 0, 1632110912, 1632110927),
(13, 'eqwe', 'eqweqw', '11381.xls', 1761, 1761, '1', 1, 0, 1632137639, 1632137639);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
`id` int(11) NOT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `module_url` varchar(255) DEFAULT NULL,
  `url_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `module_name`, `module_url`, `url_icon`) VALUES
(1, 'Trang chủ', '/quan-ly-chung.html', NULL),
(2, 'Truyền thông nội bộ', '/truyen-thong-noi-bo-cong-ty.html', NULL),
(3, 'Văn hóa doanh nghiệp', '/vhdn-thu-tu-seo.html', NULL),
(4, 'Quản trị tri thức', '/quan-tri-tri-thuc-wiki.html', NULL),
(5, 'Quản lí cuộc họp', NULL, NULL),
(6, 'Dữ liệu đã xóa gần đây', '/quan-ly-du-lieu-da-xoa.html', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_feed`
--

CREATE TABLE IF NOT EXISTS `new_feed` (
`new_id` int(11) NOT NULL,
  `new_title` varchar(255) DEFAULT NULL,
  `id_company` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `new_type` int(11) DEFAULT NULL,
  `id_user_tags` varchar(255) DEFAULT '0',
  `content` text,
  `file` text,
  `ghim` int(11) DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `author_type` tinyint(4) NOT NULL DEFAULT '1',
  `delete` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_feed`
--

INSERT INTO `new_feed` (`new_id`, `new_title`, `id_company`, `author`, `new_type`, `id_user_tags`, `content`, `file`, `ghim`, `position`, `author_type`, `delete`, `created_at`, `updated_at`) VALUES
(167, 'qew', 1761, 3007, 1, '0', 'ewqe', '13712.xls', 0, 653, 2, 0, 1631844279, 1631844279),
(168, 'eqwe', 1761, 1761, 1, '0', 'eqweq', '1449.xls', 0, 0, 1, 0, 1631844320, 1631844320),
(169, 'Sự kiện nội bộ', 1761, 1761, 3, '0', 'ưewqe', '27062.', 0, 0, 1, 0, 1631845311, 1631845311),
(170, 'dasd', 1761, 1761, 1, '0', 'asd', '17558.xls', 0, 0, 1, 0, 1632138037, 1632138037),
(171, 'eqweqw', 1761, 1761, 1, '0', 'ưeqwe', '20877.jpg', 0, 0, 1, 0, 1632149141, 1632149141),
(172, '123123123', 1761, 1761, 1, '0', '21321eq', '15230.xls', 0, 0, 1, 0, 1632149159, 1632149159),
(173, 'qưeqweqwe', 1636, 1636, 1, '0', 'qưeqweqwe', '16126.docx', 0, 0, 1, 0, 1632539646, 1632539646),
(174, 'qưeqweqwe', 1636, 1636, 9, '0', 'qưeqweqweq', '25518.docx', 0, 0, 1, 0, 1632539679, 1632539679),
(175, NULL, 1636, 1636, 2, '3749', 'adsasdasdasd', '0', 0, 0, 1, 0, 1632555431, 1632555431),
(176, 'ádasdasd', 1761, 3007, 9, '0', 'ádasdasd', '29277.xls', 0, 653, 2, 0, 1632559377, 1632559377),
(177, 'ưâsdasdasd', 1761, 3007, 1, '0', 'qưqưqư', '15111.xls', 1, 653, 2, 0, 1632559737, 1632559737),
(178, '', 1761, 1761, 0, '0', 'ádasdads', '', 0, 0, 1, 0, 1633681478, 1633681478),
(179, NULL, 1761, 1761, 0, '0', 'ádasdads', '', 0, 0, 1, 0, 1633681515, 1633681515),
(180, NULL, 1761, 1761, 0, '0', 'tin new new', '', 0, 0, 1, 0, 1633681773, 1633681773),
(181, NULL, 1761, 1761, 0, '0', '', '', 0, 0, 1, 0, 1633745350, 1633745350),
(182, NULL, 1761, 1761, 0, '3898,3838,3613,3609', 'asdasd', '../img/new_feed/dang_tin/19783.png||../img/new_feed/dang_tin/14708.png||../img/new_feed/dang_tin/32413.png', 0, 0, 1, 0, 1633748794, 1633748794),
(183, NULL, 1761, 1761, 0, '', 'ádasdasdasd', '../img/new_feed/dang_tin/7468.png||../img/new_feed/dang_tin/1013.png', 0, 0, 1, 0, 1633752172, 1633752172),
(184, NULL, 1761, 1761, 0, '', 'ádasdasdasd', '../img/new_feed/dang_tin/12143.png||../img/new_feed/dang_tin/13436.png', 0, 0, 1, 0, 1633752212, 1633752212),
(185, NULL, 1761, 1761, 0, '', 'tin new', '', 0, 0, 1, 0, 1633764416, 1633764416),
(186, NULL, 1761, 1761, 0, '3838,3613', 'đăng cái ảnh', '../img/new_feed/dang_tin/4189.png||../img/new_feed/dang_tin/32210.png||../img/new_feed/dang_tin/16035.png||../img/new_feed/dang_tin/1440.png||../img/new_feed/dang_tin/21849.jpg', 0, 0, 1, 0, 1633765615, 1633765615),
(187, NULL, 1761, 1761, 0, '', '', '../img/new_feed/dang_tin/4774.png||../img/new_feed/dang_tin/13543.png||../img/new_feed/dang_tin/6292.png||../img/new_feed/dang_tin/16189.png', 0, 0, 1, 0, 1633766540, 1633766540),
(188, 'sdadasd', 1761, 1761, 1, '0', 'ádasdasd', '1311.sql', 0, 653, 1, 0, 1633768525, 1633768525),
(189, NULL, 1761, 1761, 0, '', 'ádasdasd', '', 0, 0, 1, 0, 1633792323, 1633792323),
(190, NULL, 1761, 1761, 0, '', '', '', 0, 0, 1, 0, 1633792513, 1633792513),
(191, NULL, 1761, 1761, 0, '', '', '../img/new_feed/dang_tin/10516.mp4||../img/new_feed/dang_tin/17853.mp4', 0, 0, 1, 0, 1633792659, 1633792659),
(192, NULL, 1761, 1761, 0, '', '', '../img/new_feed/dang_tin/3448.mp4', 0, 0, 1, 0, 1633792939, 1633792939),
(193, NULL, 1761, 1761, 0, '', '', '../img/new_feed/dang_tin/32589.mp4||../img/new_feed/dang_tin/23042.mp4', 0, 0, 1, 0, 1633796308, 1633796308),
(194, NULL, 1761, 1761, 0, '', '', '../img/new_feed/dang_tin/29254.docx', 0, 0, 1, 0, 1633799268, 1633799268);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE IF NOT EXISTS `notify` (
`id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT '3 là sinh nhât phần truyền thông nội bộ',
  `id_user` int(11) DEFAULT NULL,
  `id_company` int(10) NOT NULL,
  `id_user_tag` int(10) NOT NULL DEFAULT '0',
  `content` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `type`, `id_user`, `id_company`, `id_user_tag`, `content`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1761, 0, 0, 'eqweqw', 1, 1632137639, 1632137639),
(2, 2, 1761, 0, 0, 'asdasdasdads', 1, 1632708096, 1632708096),
(3, 2, 1761, 0, 0, 'qweqweqwe', 1, 1632711475, 1632711475),
(4, 2, 1761, 0, 0, 'ádasdasd', 1, 1632713077, 1632713077),
(5, 2, 1761, 0, 0, 'ádasdasdasd', 1, 1632730527, 1632730527),
(6, 3, 1761, 1761, 0, 'sdasdasw', 1, 1633687638, 1633687638),
(7, 3, 1761, 1761, 3608, 'adsdsadas', 1, 1633687832, 1633687832);

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE IF NOT EXISTS `target` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `comment` tinyint(4) NOT NULL DEFAULT '0',
  `option_notify` varchar(255) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL,
  `delete` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` int(11) NOT NULL,
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `id_user`, `id_company`, `title`, `content`, `cover_image`, `comment`, `option_notify`, `user_type`, `delete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1761, 1761, 'mục tiêu mới', 'ádasdasdasd', '../img/vanhoadoanhnghiep/target/1761/2782.jpg', 1, '1', 1, 0, 0, 1632711475, 1632737453),
(2, 1761, 1761, 'mục tiêu mới 12 123123', 'ádasdasdasd', '../img/vanhoadoanhnghiep/target/1761/2010.png', 1, '1', 1, 1, 1632738812, 1632713077, 1632737414),
(3, 1761, 1761, 'mục tiêu mới  ', 'ádasdasdasdá 123123', '../img/vanhoadoanhnghiep/target/1761/172.png', 1, '1', 1, 0, 0, 1632730527, 1632736067);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voted`
--

CREATE TABLE IF NOT EXISTS `tbl_voted` (
`id` int(11) NOT NULL,
  `id_new` int(11) DEFAULT NULL,
  `answer` text,
  `file` text,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_voted`
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
(9, 140, 'pa3', '26069.vnd.ms-excel', 1631667180);

-- --------------------------------------------------------

--
-- Table structure for table `working_rules`
--

CREATE TABLE IF NOT EXISTS `working_rules` (
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `working_rules`
--

INSERT INTO `working_rules` (`id`, `id_user`, `name`, `content`, `img`, `comment`, `id_company`, `user_type`, `delete`, `created_at`, `updated_at`) VALUES
(1, 1761, 'ưqewq', 'eqweqwe', '32596.png', 0, 1761, 1, 0, 1633766788, 1633766788),
(2, 1761, 'ưqewq', 'eqweqwe', '28580.png', 1, 1761, 1, 0, 1633767100, 1633767100),
(3, 1761, 'ưqewq1111', 'eqweqwe', '29514.png', 1, 1761, 1, 0, 1633767124, 1633767124),
(4, 1761, 'ưq', 'ww', '14525.png', 1, 1761, 1, 0, 1633767270, 1633767270),
(5, 1761, '1', '1', '16235.png', 1, 1761, 1, 0, 1633767329, 1633767329),
(6, 1761, 'qưe', 'qqqq', '7748.png', 1, 1761, 1, 1, 1633767401, 1633775658),
(7, 1761, 'das', 'qưe', '14260.png', 1, 1761, 1, 1, 1633767432, 1633775594),
(8, 1761, 'Tên nguyên tắc1qqq', 'nội dung nguyên tắc', '6230.png', 1, 1761, 1, 1, 1633768260, 1633775574);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_core_value`
--
ALTER TABLE `comment_core_value`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_knowledge`
--
ALTER TABLE `comment_knowledge`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_target`
--
ALTER TABLE `comment_target`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_value`
--
ALTER TABLE `core_value`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_image`
--
ALTER TABLE `cover_image`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_image_com`
--
ALTER TABLE `cover_image_com`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discuss`
--
ALTER TABLE `discuss`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_join`
--
ALTER TABLE `event_join`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_news`
--
ALTER TABLE `internal_news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge`
--
ALTER TABLE `knowledge`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_answer`
--
ALTER TABLE `knowledge_answer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_comment`
--
ALTER TABLE `like_comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_comment_core`
--
ALTER TABLE `like_comment_core`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_comment_knowledge`
--
ALTER TABLE `like_comment_knowledge`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_comment_target`
--
ALTER TABLE `like_comment_target`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_core_value`
--
ALTER TABLE `like_core_value`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_target`
--
ALTER TABLE `like_target`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_answer_bonus`
--
ALTER TABLE `list_answer_bonus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_from_ceo`
--
ALTER TABLE `mail_from_ceo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_feed`
--
ALTER TABLE `new_feed`
 ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_voted`
--
ALTER TABLE `tbl_voted`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_rules`
--
ALTER TABLE `working_rules`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `comment_core_value`
--
ALTER TABLE `comment_core_value`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `comment_knowledge`
--
ALTER TABLE `comment_knowledge`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `comment_target`
--
ALTER TABLE `comment_target`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `core_value`
--
ALTER TABLE `core_value`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cover_image`
--
ALTER TABLE `cover_image`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cover_image_com`
--
ALTER TABLE `cover_image_com`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discuss`
--
ALTER TABLE `discuss`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `event_join`
--
ALTER TABLE `event_join`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `internal_news`
--
ALTER TABLE `internal_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `knowledge`
--
ALTER TABLE `knowledge`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `knowledge_answer`
--
ALTER TABLE `knowledge_answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `like_comment`
--
ALTER TABLE `like_comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `like_comment_core`
--
ALTER TABLE `like_comment_core`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `like_comment_knowledge`
--
ALTER TABLE `like_comment_knowledge`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `like_comment_target`
--
ALTER TABLE `like_comment_target`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `like_core_value`
--
ALTER TABLE `like_core_value`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `like_target`
--
ALTER TABLE `like_target`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `list_answer_bonus`
--
ALTER TABLE `list_answer_bonus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail_from_ceo`
--
ALTER TABLE `mail_from_ceo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `new_feed`
--
ALTER TABLE `new_feed`
MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_voted`
--
ALTER TABLE `tbl_voted`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `working_rules`
--
ALTER TABLE `working_rules`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 03:06 AM
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
-- Table structure for table `event_question`
--

CREATE TABLE IF NOT EXISTS `event_question` (
`id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_question`
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
(13, 53, 'ádasdasd', 1761, 1, 1634058046, 1634058046);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_question`
--
ALTER TABLE `event_question`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_question`
--
ALTER TABLE `event_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

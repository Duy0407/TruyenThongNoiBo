-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 11:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttvh`
--

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT '3 là sinh nhât phần truyền thông nội bộ',
  `id_user` int(11) DEFAULT NULL,
  `id_company` int(10) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `type`, `id_user`, `id_company`, `content`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1761, 0, 'eqweqw', 1, 1632137639, 1632137639),
(2, 2, 1761, 0, 'asdasdasdads', 1, 1632708096, 1632708096),
(3, 2, 1761, 0, 'qweqweqwe', 1, 1632711475, 1632711475),
(4, 2, 1761, 0, 'ádasdasd', 1, 1632713077, 1632713077),
(5, 2, 1761, 0, 'ádasdasdasd', 1, 1632730527, 1632730527);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 04:37 AM
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
-- Table structure for table `update_calendar`
--

CREATE TABLE `update_calendar` (
  `id` int(10) NOT NULL,
  `type` int(10) NOT NULL COMMENT '1 là tầm nhìn - sứ mệnh',
  `time` int(10) NOT NULL DEFAULT '0',
  `id_company` int(10) NOT NULL,
  `remind` int(10) NOT NULL DEFAULT '0',
  `created_at` int(12) NOT NULL,
  `updated_at` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `update_calendar`
--

INSERT INTO `update_calendar` (`id`, `type`, `time`, `id_company`, `remind`, `created_at`, `updated_at`) VALUES
(2, 1, 1634144400, 1761, 1, 1634118422, 1634121586);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `update_calendar`
--
ALTER TABLE `update_calendar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `update_calendar`
--
ALTER TABLE `update_calendar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Table structure for table `vision_misson`
--

CREATE TABLE `vision_misson` (
  `id` int(10) NOT NULL,
  `id_company` int(10) DEFAULT NULL,
  `description` text,
  `vision` text,
  `mission` text,
  `created_at` int(12) DEFAULT NULL,
  `updated_at` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vision_misson`
--

INSERT INTO `vision_misson` (`id`, `id_company`, `description`, `vision`, `mission`, `created_at`, `updated_at`) VALUES
(3, 1761, 'Đây là mô tả 2', NULL, NULL, 1633943818, 1634118422);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vision_misson`
--
ALTER TABLE `vision_misson`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vision_misson`
--
ALTER TABLE `vision_misson`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

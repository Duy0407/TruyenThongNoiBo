-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 03:07 AM
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
-- Table structure for table `department`
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
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_id`, `group_id`, `name`, `description`, `request_censorship`, `id_company`, `created_at`, `updated_at`) VALUES
(3, 653, NULL, NULL, 'qqqqqqq1111', 2, 1761, 1634006271, 1634007229),
(4, NULL, 3, NULL, NULL, NULL, 1761, 1634024551, 1634024551),
(5, NULL, 2, NULL, NULL, NULL, 1761, 1634024743, 1634024743),
(6, NULL, 4, NULL, NULL, NULL, 1761, 1634025393, 1634025393),
(7, NULL, 5, NULL, NULL, NULL, 1761, 1634027810, 1634027810),
(8, 0, NULL, NULL, NULL, NULL, 1761, 1634031585, 1634031585),
(9, 0, NULL, NULL, NULL, NULL, 1761, 1634031725, 1634031725),
(10, 0, NULL, NULL, NULL, NULL, 1761, 1634031800, 1634031800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

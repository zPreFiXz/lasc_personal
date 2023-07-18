-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 07:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lasc_personal`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_2_a`
--

CREATE TABLE `personal_1_2_a` (
  `major` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `group_study` varchar(20) NOT NULL,
  `amount_student` int(4) NOT NULL,
  `amount_work` int(4) NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_2_b`
--

CREATE TABLE `personal_1_2_b` (
  `id` int(20) NOT NULL,
  `club` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `amount_student` int(5) NOT NULL,
  `group_study` varchar(15) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `amount_work` int(5) NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_1_2_a`
--
ALTER TABLE `personal_1_2_a`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `personal_1_2_b`
--
ALTER TABLE `personal_1_2_b`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_1_2_b`
--
ALTER TABLE `personal_1_2_b`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

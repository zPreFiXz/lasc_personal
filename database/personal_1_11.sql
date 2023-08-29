-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 02:25 PM
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
-- Table structure for table `personal_1_11`
--

CREATE TABLE `personal_1_11` (
  `userId` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `checkbox1` int(2) NOT NULL,
  `checkbox2` int(2) NOT NULL,
  `checkbox3` int(2) NOT NULL,
  `checkbox4` int(2) NOT NULL,
  `checkbox5` int(2) NOT NULL,
  `checkbox6` int(2) NOT NULL,
  `checkbox7` int(2) NOT NULL,
  `checkbox8` int(2) NOT NULL,
  `checkbox9` int(2) NOT NULL,
  `checkbox10` int(2) NOT NULL,
  `checkbox11` int(2) NOT NULL,
  `checkbox12` int(2) NOT NULL,
  `checkbox13` int(2) NOT NULL,
  `checkbox14` int(2) NOT NULL,
  `scope1` varchar(100) NOT NULL,
  `scope2` varchar(100) NOT NULL,
  `scope3` varchar(100) NOT NULL,
  `scope4` varchar(100) NOT NULL,
  `scope5` varchar(100) NOT NULL,
  `scope6` varchar(100) NOT NULL,
  `scope7` varchar(100) NOT NULL,
  `scope8` varchar(100) NOT NULL,
  `scope9` varchar(100) NOT NULL,
  `scope10` varchar(100) NOT NULL,
  `scope11` varchar(100) NOT NULL,
  `scope12` varchar(100) NOT NULL,
  `scope13` varchar(100) NOT NULL,
  `scope14` varchar(100) NOT NULL,
  `amount_work` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_1_11`
--
ALTER TABLE `personal_1_11`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_1_11`
--
ALTER TABLE `personal_1_11`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

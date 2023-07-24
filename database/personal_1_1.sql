-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 05:29 AM
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
-- Table structure for table `personal_1_1`
--

CREATE TABLE `personal_1_1` (
  `id` int(10) NOT NULL,
  `code_course` varchar(50) NOT NULL,
  `name_course` varchar(50) NOT NULL,
  `amount_credit` int(10) NOT NULL,
  `describe` int(10) NOT NULL,
  `practice` int(10) NOT NULL,
  `practice_subject` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `group_study` int(20) NOT NULL,
  `amount_student` int(20) NOT NULL,
  `proportion` int(10) NOT NULL,
  `amount_time` int(10) NOT NULL,
  `amount_work` int(10) NOT NULL,
  `file` varchar(50) NOT NULL,
  `research` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_1_1`
--

INSERT INTO `personal_1_1` (`id`, `code_course`, `name_course`, `amount_credit`, `describe`, `practice`, `practice_subject`, `level`, `group_study`, `amount_student`, `proportion`, `amount_time`, `amount_work`, `file`, `research`) VALUES
(6, '65100141119', 'ซอฟต์แวร์จ้า', 2, 2, 2, 'ฟิสิกส์', '2', 0, 100, 1, 1, 1, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_1_1`
--
ALTER TABLE `personal_1_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_1_1`
--
ALTER TABLE `personal_1_1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 05:35 PM
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
-- Dumping data for table `personal_1_2_b`
--

INSERT INTO `personal_1_2_b` (`id`, `club`, `level`, `amount_student`, `group_study`, `amount_time`, `amount_work`, `file`) VALUES
(42, 'ครูอาสา', '1', 250, '65100141', 3, 2, '2023-07-19_08-58-40.pdf');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

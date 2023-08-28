-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 08:53 AM
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
-- Table structure for table `vadmin`
--

CREATE TABLE `vadmin` (
  `userId` varchar(50) NOT NULL,
  `id` int(10) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `amount_work` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vadmin`
--

INSERT INTO `vadmin` (`userId`, `id`, `term`, `year`, `firstname`, `lastname`, `amount_work`) VALUES
('apex', 26, 1, 2566, 'apex', 'inwza007', 34.4),
('apex', 27, 1, 2565, 'apex', 'inwza007', 2),
('apex', 28, 2, 2565, 'apex', 'inwza007', 4),
('apex', 29, 2, 2566, 'apex', 'inwza007', 8.4),
('ss', 30, 1, 2566, 'ss', 'dd', 7.8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vadmin`
--
ALTER TABLE `vadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vadmin`
--
ALTER TABLE `vadmin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

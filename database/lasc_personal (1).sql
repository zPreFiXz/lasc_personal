-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 11:48 AM
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
  `userId` varchar(50) NOT NULL,
  `id` int(10) NOT NULL,
  `code_course` varchar(50) NOT NULL,
  `name_course` varchar(50) NOT NULL,
  `amount_credit` int(10) NOT NULL,
  `describe` int(10) NOT NULL,
  `practice` int(10) NOT NULL,
  `practice_subject` varchar(50) NOT NULL,
  `research` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `group_study` int(20) NOT NULL,
  `amount_student` int(20) NOT NULL,
  `proportion` int(10) NOT NULL,
  `amount_time` int(10) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_2_a`
--

CREATE TABLE `personal_1_2_a` (
  `userId` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `major` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `group_study` varchar(20) NOT NULL,
  `amount_student` int(4) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_2_b`
--

CREATE TABLE `personal_1_2_b` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `club` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `amount_student` int(5) NOT NULL,
  `group_study` varchar(15) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_3`
--

CREATE TABLE `personal_1_3` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `Major` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `amount_student` int(5) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `workplace` varchar(50) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(30) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_4`
--

CREATE TABLE `personal_1_4` (
  `userId` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `date` date NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `period` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_5_a`
--

CREATE TABLE `personal_1_5_a` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `major` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `name_project` varchar(50) NOT NULL,
  `amount_teacher` int(10) NOT NULL,
  `teacher` int(10) NOT NULL,
  `amount_student` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_5_b`
--

CREATE TABLE `personal_1_5_b` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `major` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `name_project` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_teacher` int(10) NOT NULL,
  `teacher` int(10) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_6_a`
--

CREATE TABLE `personal_1_6_a` (
  `userId` varchar(50) NOT NULL,
  `id` int(5) NOT NULL,
  `term` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `number` int(5) NOT NULL,
  `research_name` varchar(100) NOT NULL,
  `funding_source` varchar(100) NOT NULL,
  `funding_framework` varchar(50) NOT NULL,
  `start_end` varchar(50) NOT NULL,
  `nature_work` varchar(50) NOT NULL,
  `leader` varchar(50) NOT NULL,
  `contribute` varchar(50) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_6_b`
--

CREATE TABLE `personal_1_6_b` (
  `userId` varchar(50) NOT NULL,
  `id` int(5) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `number` int(5) NOT NULL,
  `project` varchar(100) NOT NULL,
  `funding` varchar(100) NOT NULL,
  `start_end` varchar(50) NOT NULL,
  `publish` varchar(100) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_7`
--

CREATE TABLE `personal_1_7` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `amount_time` varchar(50) NOT NULL,
  `type_work_s_j` varchar(50) NOT NULL,
  `type_work` varchar(50) NOT NULL,
  `participation` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_8`
--

CREATE TABLE `personal_1_8` (
  `userId` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `nature_work` varchar(50) NOT NULL,
  `hours` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_9`
--

CREATE TABLE `personal_1_9` (
  `userId` varchar(50) NOT NULL,
  `id` int(10) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `date` date NOT NULL,
  `project` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_10`
--

CREATE TABLE `personal_1_10` (
  `userId` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `date` varchar(15) NOT NULL,
  `project` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `type_work` varchar(50) NOT NULL,
  `amount_time` int(10) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_11`
--

CREATE TABLE `personal_1_11` (
  `userId` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `chancellor_check` varchar(50) NOT NULL,
  `chancellor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_1_11`
--

INSERT INTO `personal_1_11` (`userId`, `id`, `term`, `year`, `chancellor_check`, `chancellor`) VALUES
('Phakphoom', 4, 0, 0, 'checked', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `term&year`
--

CREATE TABLE `term&year` (
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `term&year`
--

INSERT INTO `term&year` (`term`, `year`, `id`) VALUES
(1, 2566, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `urole`, `created_at`) VALUES
(14, 'Phakphoom', 'Sukkhachat', 'prefix.2pm@gmail.com', '$2y$10$AqsqgTaJsZl5RoM/FCVQtegyhyne5JE5J2tJlhGuuiIggGCdhbCHS', 'user', '2023-07-24 12:05:08'),
(15, 'Bongkotmas', 'Boonsak', 'Cream.cxz@gmail.com', '$2y$10$L1tf6qoRc6aOmdE72lEJk.nX8cKDoKtEUYw5qKBvlR665qDwi4yBu', 'user', '2023-07-26 08:25:39'),
(16, 'Sarawut', 'Potjanat', 'gvgx831@gmail.com', '$2y$10$3AWb72ZgQt44tsq2vbk95u.P6bP/7Y1CIt7bhLeqVbLC9zUtkutri', 'admin', '2023-08-08 11:03:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_1_1`
--
ALTER TABLE `personal_1_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_2_a`
--
ALTER TABLE `personal_1_2_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_2_b`
--
ALTER TABLE `personal_1_2_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_3`
--
ALTER TABLE `personal_1_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_4`
--
ALTER TABLE `personal_1_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_5_a`
--
ALTER TABLE `personal_1_5_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_5_b`
--
ALTER TABLE `personal_1_5_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_6_a`
--
ALTER TABLE `personal_1_6_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_6_b`
--
ALTER TABLE `personal_1_6_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_7`
--
ALTER TABLE `personal_1_7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_8`
--
ALTER TABLE `personal_1_8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_9`
--
ALTER TABLE `personal_1_9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_10`
--
ALTER TABLE `personal_1_10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_11`
--
ALTER TABLE `personal_1_11`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_1_1`
--
ALTER TABLE `personal_1_1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_1_2_a`
--
ALTER TABLE `personal_1_2_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_1_2_b`
--
ALTER TABLE `personal_1_2_b`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_1_3`
--
ALTER TABLE `personal_1_3`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_1_4`
--
ALTER TABLE `personal_1_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_1_5_a`
--
ALTER TABLE `personal_1_5_a`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_1_5_b`
--
ALTER TABLE `personal_1_5_b`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_1_6_a`
--
ALTER TABLE `personal_1_6_a`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_1_6_b`
--
ALTER TABLE `personal_1_6_b`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_1_7`
--
ALTER TABLE `personal_1_7`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_1_8`
--
ALTER TABLE `personal_1_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_1_9`
--
ALTER TABLE `personal_1_9`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_1_10`
--
ALTER TABLE `personal_1_10`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_1_11`
--
ALTER TABLE `personal_1_11`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

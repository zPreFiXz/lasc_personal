-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 05:20 AM
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
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `code_course` varchar(50) NOT NULL,
  `name_course` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `prepare_theory` varchar(50) NOT NULL,
  `hour_lecture` varchar(50) NOT NULL,
  `check_work1` varchar(50) NOT NULL,
  `prepare_practice` varchar(50) NOT NULL,
  `hour_practice` varchar(50) NOT NULL,
  `check_work2` varchar(50) NOT NULL,
  `practice_subject` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `group_study` int(5) NOT NULL,
  `amount_student` int(5) NOT NULL,
  `proportion` int(5) NOT NULL,
  `amount_work` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_1_file`
--

CREATE TABLE `personal_1_1_file` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_2_a`
--

CREATE TABLE `personal_1_2_a` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `major` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `group_study` varchar(50) NOT NULL,
  `amount_student` int(5) NOT NULL,
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
  `level` varchar(50) NOT NULL,
  `amount_student` int(5) NOT NULL,
  `group_study` int(5) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_3`
--

CREATE TABLE `personal_1_3` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `major` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `amount_student` int(5) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `workplace` varchar(50) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_4`
--

CREATE TABLE `personal_1_4` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `date` date NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
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
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `major` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `name_project` varchar(50) NOT NULL,
  `amount_teacher` int(5) NOT NULL,
  `teacher` varchar(50) NOT NULL,
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
  `level` varchar(50) NOT NULL,
  `name_project` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_teacher` int(5) NOT NULL,
  `teacher` varchar(50) NOT NULL,
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
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `research_name` varchar(50) NOT NULL,
  `funding_source` varchar(50) NOT NULL,
  `funding_framework` varchar(50) NOT NULL,
  `start` varchar(50) NOT NULL,
  `end` varchar(50) NOT NULL,
  `nature_work` varchar(50) NOT NULL,
  `leader` varchar(50) NOT NULL,
  `contribute` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_6_b`
--

CREATE TABLE `personal_1_6_b` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `project` varchar(50) NOT NULL,
  `funding` varchar(50) NOT NULL,
  `start` varchar(50) NOT NULL,
  `end` varchar(50) NOT NULL,
  `publish` varchar(50) NOT NULL,
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
  `title` varchar(50) NOT NULL,
  `start` varchar(50) NOT NULL,
  `end` varchar(50) NOT NULL,
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
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
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
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `date` date NOT NULL,
  `project` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_10`
--

CREATE TABLE `personal_1_10` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `date` date NOT NULL,
  `project` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `type_work` varchar(50) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_11`
--

CREATE TABLE `personal_1_11` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `checkbox1` int(5) NOT NULL,
  `checkbox2` int(5) NOT NULL,
  `checkbox3` int(5) NOT NULL,
  `checkbox4` int(5) NOT NULL,
  `checkbox5` int(5) NOT NULL,
  `checkbox6` int(5) NOT NULL,
  `checkbox7` int(5) NOT NULL,
  `checkbox8` int(5) NOT NULL,
  `checkbox9` int(5) NOT NULL,
  `checkbox10` int(5) NOT NULL,
  `checkbox11` int(5) NOT NULL,
  `checkbox12` int(5) NOT NULL,
  `checkbox13` int(5) NOT NULL,
  `checkbox14` int(5) NOT NULL,
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
-- Dumping data for table `personal_1_11`
--

INSERT INTO `personal_1_11` (`userId`, `id`, `term`, `year`, `checkbox1`, `checkbox2`, `checkbox3`, `checkbox4`, `checkbox5`, `checkbox6`, `checkbox7`, `checkbox8`, `checkbox9`, `checkbox10`, `checkbox11`, `checkbox12`, `checkbox13`, `checkbox14`, `scope1`, `scope2`, `scope3`, `scope4`, `scope5`, `scope6`, `scope7`, `scope8`, `scope9`, `scope10`, `scope11`, `scope12`, `scope13`, `scope14`, `amount_work`) VALUES
('1', 69, 1, 2566, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_3`
--

CREATE TABLE `personal_3` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `amount_work` float NOT NULL,
  `quality_work` float NOT NULL,
  `efficiency_work` float NOT NULL,
  `effectiveness_work` float NOT NULL,
  `score_work` int(5) NOT NULL,
  `quality_ethics` int(5) NOT NULL,
  `efficiency_ethics` int(5) NOT NULL,
  `effectiveness_ethics` int(5) NOT NULL,
  `score_ethics` int(5) NOT NULL,
  `quality_capacity` int(5) NOT NULL,
  `efficiency_capacity` int(5) NOT NULL,
  `effectiveness_capacity` int(5) NOT NULL,
  `score_capacity` int(5) NOT NULL,
  `quality_more` int(5) NOT NULL,
  `efficiency_more` int(5) NOT NULL,
  `effectiveness_more` int(5) NOT NULL,
  `score_more` int(5) NOT NULL,
  `quality_total` int(5) NOT NULL,
  `efficiency_total` int(5) NOT NULL,
  `effectiveness_total` int(5) NOT NULL,
  `score_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_3`
--

INSERT INTO `personal_3` (`userId`, `id`, `term`, `year`, `name`, `branch`, `amount_work`, `quality_work`, `efficiency_work`, `effectiveness_work`, `score_work`, `quality_ethics`, `efficiency_ethics`, `effectiveness_ethics`, `score_ethics`, `quality_capacity`, `efficiency_capacity`, `effectiveness_capacity`, `score_capacity`, `quality_more`, `efficiency_more`, `effectiveness_more`, `score_more`, `quality_total`, `efficiency_total`, `effectiveness_total`, `score_total`) VALUES
('1', 10, 1, 2566, 'นายภาคภูมิ สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `term_year`
--

CREATE TABLE `term_year` (
  `id` int(1) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `term_year`
--

INSERT INTO `term_year` (`id`, `term`, `year`) VALUES
(1, 1, 2566);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(20) NOT NULL,
  `academic_rank` varchar(50) NOT NULL,
  `nametitle` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(50) NOT NULL,
  `isAdmin` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `academic_rank`, `nametitle`, `firstname`, `lastname`, `branch`, `email`, `password`, `urole`, `isAdmin`, `created_at`) VALUES
(1, 'ไม่มี', 'นาย', 'ภาคภูมิ', 'สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 'prefix.2pm@gmail.com', '$2y$10$jmUGTGBrZB6Vzay9yDSWTuVIRoAvhklxSiQPAKy0PaF79zavuOo62', 'teacher', 'เป็น', '2023-09-01 15:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `vadmin`
--

CREATE TABLE `vadmin` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `academic_rank` varchar(50) NOT NULL,
  `nametitle` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `amount_work` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vadmin`
--

INSERT INTO `vadmin` (`userId`, `id`, `term`, `year`, `academic_rank`, `nametitle`, `firstname`, `lastname`, `amount_work`) VALUES
('1', 19, 1, 2566, 'ไม่มี', 'นาย', 'ภาคภูมิ', 'สุขชาติ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_1_1`
--
ALTER TABLE `personal_1_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_1_1_file`
--
ALTER TABLE `personal_1_1_file`
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
-- Indexes for table `personal_3`
--
ALTER TABLE `personal_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_year`
--
ALTER TABLE `term_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `vadmin`
--
ALTER TABLE `vadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_1_1`
--
ALTER TABLE `personal_1_1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_1_1_file`
--
ALTER TABLE `personal_1_1_file`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_1_2_a`
--
ALTER TABLE `personal_1_2_a`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_1_2_b`
--
ALTER TABLE `personal_1_2_b`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_1_3`
--
ALTER TABLE `personal_1_3`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_1_4`
--
ALTER TABLE `personal_1_4`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_1_5_a`
--
ALTER TABLE `personal_1_5_a`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_1_5_b`
--
ALTER TABLE `personal_1_5_b`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_1_6_a`
--
ALTER TABLE `personal_1_6_a`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_1_6_b`
--
ALTER TABLE `personal_1_6_b`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_1_7`
--
ALTER TABLE `personal_1_7`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_1_8`
--
ALTER TABLE `personal_1_8`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_1_9`
--
ALTER TABLE `personal_1_9`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_1_10`
--
ALTER TABLE `personal_1_10`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_1_11`
--
ALTER TABLE `personal_1_11`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `personal_3`
--
ALTER TABLE `personal_3`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `term_year`
--
ALTER TABLE `term_year`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vadmin`
--
ALTER TABLE `vadmin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

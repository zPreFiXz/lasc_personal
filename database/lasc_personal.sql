-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 08:53 AM
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
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_1_1`
--

INSERT INTO `personal_1_1` (`userId`, `id`, `term`, `year`, `code_course`, `name_course`, `unit`, `prepare_theory`, `hour_lecture`, `check_work1`, `prepare_practice`, `hour_practice`, `check_work2`, `practice_subject`, `level`, `group_study`, `amount_student`, `proportion`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 11, 1, 2566, 'sfef', 'f3rf', '3(2-2-5)', '2', '2', '2', '1', '2', '1', 'ทั่วไป', '2', 1, 50, 100, 10.75, '');

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

--
-- Dumping data for table `personal_1_2_a`
--

INSERT INTO `personal_1_2_a` (`userId`, `id`, `term`, `year`, `major`, `code`, `level`, `group_study`, `amount_student`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 23, 1, 2566, 'วิศวกรรมซอฟต์แวร์', '0001', '2', '6510014117', 40, 2, '2023-08-31_13-00-14_ภาคภูมิ.png');

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

--
-- Dumping data for table `personal_1_2_b`
--

INSERT INTO `personal_1_2_b` (`userId`, `id`, `term`, `year`, `club`, `level`, `amount_student`, `group_study`, `amount_time`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 10, 1, 2566, 'คนสร้างฝัน', '2', 40, 1, 10, 2, '2023-08-31_13-08-45_ภาคภูมิ.png'),
('ภาคภูมิ', 11, 1, 2566, 'ครูอาสา', '2', 12, 3, 8, 2, ''),
('ภาคภูมิ', 12, 1, 2566, 'ครูอาสา', 'asd', 18, 3, 10, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_3`
--

CREATE TABLE `personal_1_3` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `Major` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `amount_student` int(5) NOT NULL,
  `amount_time` int(5) NOT NULL,
  `workplace` varchar(50) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_1_3`
--

INSERT INTO `personal_1_3` (`userId`, `id`, `term`, `year`, `Major`, `level`, `amount_student`, `amount_time`, `workplace`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 17, 1, 2566, 'วิศวะ', '2', 18, 10, 'awdawd', 0.67, '2023-08-31_13-09-52_ภาคภูมิ.png');

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

--
-- Dumping data for table `personal_1_4`
--

INSERT INTO `personal_1_4` (`userId`, `id`, `term`, `year`, `date`, `project_name`, `location`, `period`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 13, 1, 2566, '2023-08-31', 'awd', 'dqwd', 15, 1, '2023-08-31_13-22-30_ภาคภูมิ.png');

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

--
-- Dumping data for table `personal_1_5_a`
--

INSERT INTO `personal_1_5_a` (`userId`, `id`, `term`, `year`, `major`, `level`, `name_project`, `amount_teacher`, `teacher`, `amount_student`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 16, 1, 2566, 'วิศวกรรมซอฟต์แวร์', '2', 'awd', 2, 'asd', 18, 1, '2023-08-31_13-24-05_ภาคภูมิ.png');

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

--
-- Dumping data for table `personal_1_5_b`
--

INSERT INTO `personal_1_5_b` (`userId`, `id`, `term`, `year`, `major`, `level`, `name_project`, `amount_teacher`, `teacher`, `amount_time`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 13, 1, 2566, 'วิศวกรรมซอฟต์แวร์', '2', 'awd', 2, 'asd', 10, 1, '2023-08-31_13-25-06_ภาคภูมิ.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_6_a`
--

CREATE TABLE `personal_1_6_a` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `number` int(5) NOT NULL,
  `research_name` varchar(50) NOT NULL,
  `funding_source` varchar(50) NOT NULL,
  `funding_framework` varchar(50) NOT NULL,
  `start_end` varchar(50) NOT NULL,
  `nature_work` varchar(50) NOT NULL,
  `leader` varchar(50) NOT NULL,
  `contribute` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_1_6_a`
--

INSERT INTO `personal_1_6_a` (`userId`, `id`, `term`, `year`, `number`, `research_name`, `funding_source`, `funding_framework`, `start_end`, `nature_work`, `leader`, `contribute`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 14, 1, 2566, 1, 'wad', 'awdwad', '50,000-100,000', 'fwefw', 'dawd', 'หัวหน้าโครงการ', 60, 6, '2023-08-31_13-26-39_ภาคภูมิ.png');

-- --------------------------------------------------------

--
-- Table structure for table `personal_1_6_b`
--

CREATE TABLE `personal_1_6_b` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `number` int(5) NOT NULL,
  `project` varchar(50) NOT NULL,
  `funding` varchar(50) NOT NULL,
  `start_end` varchar(50) NOT NULL,
  `publish` varchar(50) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_1_6_b`
--

INSERT INTO `personal_1_6_b` (`userId`, `id`, `term`, `year`, `number`, `project`, `funding`, `start_end`, `publish`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 8, 1, 2566, 1, 'asd', 'asdsad', 'fwefw', 'ประชุมวิชาการระดับชาติ', 5, '2023-08-31_13-29-11_ภาคภูมิ.png');

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
  `amount_time` varchar(50) NOT NULL,
  `type_work_s_j` varchar(50) NOT NULL,
  `type_work` varchar(50) NOT NULL,
  `participation` int(5) NOT NULL,
  `amount_work` float NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_1_7`
--

INSERT INTO `personal_1_7` (`userId`, `id`, `term`, `year`, `type`, `title`, `amount_time`, `type_work_s_j`, `type_work`, `participation`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 13, 1, 2566, 'awdawd', 'wdadawd', '10', 'เดี่ยว', 'เอกสารคำสอน', 75, 6, '');

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

--
-- Dumping data for table `personal_1_8`
--

INSERT INTO `personal_1_8` (`userId`, `id`, `term`, `year`, `date`, `type`, `subject`, `location`, `nature_work`, `hours`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 10, 1, 2566, '2023-08-03', 'ผู้ทรงคุณวุฒิ', 'asd', 'dqwd', 'asd', 150, 1, '2023-08-31_13-31-47_ภาคภูมิ.png');

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

--
-- Dumping data for table `personal_1_9`
--

INSERT INTO `personal_1_9` (`userId`, `id`, `term`, `year`, `date`, `project`, `location`, `amount_time`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 7, 1, 2566, '2023-08-11', 'asc', 'dqwd', 8, 0.53, '2023-08-31_13-33-01_ภาคภูมิ.png');

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

--
-- Dumping data for table `personal_1_10`
--

INSERT INTO `personal_1_10` (`userId`, `id`, `term`, `year`, `date`, `project`, `position`, `type_work`, `amount_time`, `amount_work`, `file`) VALUES
('ภาคภูมิ', 9, 1, 2566, '2023-08-10', 'asc', 'กรรมการและเลขานุการ', 'งานต่อเนื่อง', 8, 2.5, '2023-08-31_13-33-54_ภาคภูมิ.png');

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
('ภาคภูมิ', 30, 1, 2566, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ดีมาก', '', '', '', '', '', '', '', '', '', '', '', '', '', 40);

-- --------------------------------------------------------

--
-- Table structure for table `personal_3`
--

CREATE TABLE `personal_3` (
  `userId` varchar(50) NOT NULL,
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

INSERT INTO `personal_3` (`userId`, `term`, `year`, `name`, `branch`, `amount_work`, `quality_work`, `efficiency_work`, `effectiveness_work`, `score_work`, `quality_ethics`, `efficiency_ethics`, `effectiveness_ethics`, `score_ethics`, `quality_capacity`, `efficiency_capacity`, `effectiveness_capacity`, `score_capacity`, `quality_more`, `efficiency_more`, `effectiveness_more`, `score_more`, `quality_total`, `efficiency_total`, `effectiveness_total`, `score_total`) VALUES
('ภาคภูมิ', 1, 2566, 'นายภาคภูมิ สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 83.45, 10, 10, 10, 10, 10, 20, 20, 20, 5, 30, 30, 30, 10, 40, 30, 40, 35, 100, 90, 100);

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
  `id` int(20) NOT NULL,
  `nametitle` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nametitle`, `firstname`, `lastname`, `branch`, `email`, `password`, `urole`, `created_at`) VALUES
(22, 'นางสาว', 'บงกชมาศ', 'บุญศักดิ์', 'วิศวกรรม', 'cream333@gmail.com', '$2y$10$sRpAmkUeiTpeIzkMgRxzP.tb9J7e/rM2fMotRQHIitFlaACtXYsWK', 'admin', '2023-08-28 08:08:38'),
(23, 'นาย', 'ภาคภูมิ', 'สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 'prefix.2pm@gmail.com', '$2y$10$GDGg3eDhW1iAEmS0aiI0R.Fe/RsTuHYb5XvZM875TtGowsVonkWze', 'user', '2023-08-28 15:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `vadmin`
--

CREATE TABLE `vadmin` (
  `userId` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `term` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `nametitle` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `amount_work` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vadmin`
--

INSERT INTO `vadmin` (`userId`, `id`, `term`, `year`, `nametitle`, `firstname`, `lastname`, `amount_work`) VALUES
('ภาคภูมิ', 34, 1, 2566, 'นาย', 'ภาคภูมิ', 'สุขชาติ', 83.45);

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
-- Indexes for table `personal_3`
--
ALTER TABLE `personal_3`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `term_year`
--
ALTER TABLE `term_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_1_2_a`
--
ALTER TABLE `personal_1_2_a`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_1_2_b`
--
ALTER TABLE `personal_1_2_b`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_1_3`
--
ALTER TABLE `personal_1_3`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_1_4`
--
ALTER TABLE `personal_1_4`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_1_5_a`
--
ALTER TABLE `personal_1_5_a`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_1_5_b`
--
ALTER TABLE `personal_1_5_b`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_1_6_a`
--
ALTER TABLE `personal_1_6_a`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_1_6_b`
--
ALTER TABLE `personal_1_6_b`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_1_7`
--
ALTER TABLE `personal_1_7`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_1_8`
--
ALTER TABLE `personal_1_8`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_1_9`
--
ALTER TABLE `personal_1_9`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_1_10`
--
ALTER TABLE `personal_1_10`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_1_11`
--
ALTER TABLE `personal_1_11`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `term_year`
--
ALTER TABLE `term_year`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vadmin`
--
ALTER TABLE `vadmin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

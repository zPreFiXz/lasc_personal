-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 12:52 PM
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

--
-- Dumping data for table `personal_1_1`
--

INSERT INTO `personal_1_1` (`userId`, `id`, `term`, `year`, `code_course`, `name_course`, `unit`, `prepare_theory`, `hour_lecture`, `check_work1`, `prepare_practice`, `hour_practice`, `check_work2`, `practice_subject`, `level`, `group_study`, `amount_student`, `proportion`, `amount_work`) VALUES
('2', 1, 1, 2566, '65100141119', 'ซอฟต์แวร์จ้า', '3(3-0-6)', '3', '3', '3', '-', '-', '-', 'เคมี', '1', 1, 250, 50, 24.75),
('1', 2, 1, 2566, 'sfef', 'sdcsdc', '1(0-3-1)', '-', '-', '-', '1', '3', '1', 'ฟิสิกส์', '2', 1, 40, 92, 8.28),
('2', 3, 1, 2567, 'dsc', 'sdfsdf', '3(2-2-5)', '2', '2', '2', '1', '2', '1', 'ทั่วไป', '2', 1, 50, 100, 10.75),
('1', 4, 1, 2567, 'dsc', 'sdfsdf', '3(3-0-6)', '3', '3', '3', '-', '-', '-', 'ทั่วไป', '2', 1, 50, 50, 4.875);

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

--
-- Dumping data for table `personal_1_1_file`
--

INSERT INTO `personal_1_1_file` (`userId`, `id`, `term`, `year`, `file`) VALUES
('1', 22, 1, 2566, '2023-09-02_07-58-24_ภาคภูมิ.png');

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
('2', 25, 1, 2566, 'เทคโนโลยีคอมพิวเตอร์และดิจิทัล', '0002', '2', '651001413', 250, 2, '2023-09-01_22-49-35_2.pdf'),
('1', 26, 1, 2566, 'วิศวกรรมซอฟต์แวร์', '0001', '2', '6510014117', 1, 2, ''),
('1', 27, 2, 2566, 'วิทยาการคอมพิวเตอร์', '0001', '2', '6510014117', 1, 2, ''),
('1', 28, 1, 2567, 'สาธารณสุขชุมชน', '0001', '2', '6510014117', 40, 2, '');

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
('2', 14, 1, 2566, 'ครูอาสาf', '1', 250, 651001411, 56, 2, '2023-09-01_22-50-28_2.pdf'),
('2', 15, 1, 2566, 'ซอฟต์แวร์', '1', 500, 250, 4, 2, '');

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

--
-- Dumping data for table `personal_1_3`
--

INSERT INTO `personal_1_3` (`userId`, `id`, `term`, `year`, `major`, `level`, `amount_student`, `amount_time`, `workplace`, `amount_work`, `file`) VALUES
('2', 19, 1, 2566, 'วิศวกรรมซอฟต์แวร์', '1', 300, 3, 'ห้อง', 0.2, '2023-09-01_22-52-39_2.jpg');

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
('2', 15, 1, 2566, '2023-09-02', 'ยาวมาก', 'อาคารครุศาสตร์', 2, 0.13, '2023-09-01_22-53-35_2.jpg');

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
('2', 18, 1, 2566, 'เทคโนโลยีโยธาและสถาปัตยกรรม', '1', 'วิทย์ยาศาสตร์', 2, 'หลัก', 250, 1, ''),
('1', 19, 1, 2566, 'วิศวกรรมซอฟต์แวร์', '3', 'วิทย์ยาศาสตร์งง', 3, 'ร่วม', 400, 1, '2023-09-02_00-12-10_1.pdf'),
('1', 20, 1, 2567, 'วิทยาการคอมพิวเตอร์', '2', 'dfas', 2, 'หลัก', 40, 1, '');

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
('2', 15, 1, 2566, 'วิศวกรรมซอฟต์แวร์', '1', 'วิทย์ยาศาสตร์ง', 3, 'หลัก', 3, 1, '2023-09-01_23-05-11_2.jpg');

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

--
-- Dumping data for table `personal_1_6_a`
--

INSERT INTO `personal_1_6_a` (`userId`, `id`, `term`, `year`, `research_name`, `funding_source`, `funding_framework`, `start`, `end`, `nature_work`, `leader`, `contribute`, `amount_work`, `file`) VALUES
('2', 17, 1, 2566, 'บบบบ', 'บบบบ', '50,000-100,000', '2023-09-01', '2023-09-02', 'เดี่ยว', 'ผู้ร่วมโครงการ', 3, 3, ''),
('1', 18, 1, 2566, 'revevจ้า', 'erv', '50,000-100,000', '2023-09-02', '2023-09-03', 'เดี่ยว', 'หัวหน้าโครงการ', 3, 6, '2023-09-02_00-01-29_1.pdf'),
('1', 19, 1, 2567, 'asf', 'wefwf', '50,000-100,000', '2023-09-05', '2023-09-13', 'เดี่ยว', 'หัวหน้าโครงการ', 100, 6, '');

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

--
-- Dumping data for table `personal_1_6_b`
--

INSERT INTO `personal_1_6_b` (`userId`, `id`, `term`, `year`, `project`, `funding`, `start`, `end`, `publish`, `amount_work`, `file`) VALUES
('1', 9, 1, 2566, 'วิจัยการสุกของเงาะ', 'มหาวิทยาลัยราชภัฏศก', '2023-09-03', '2023-09-04', 'ประชุมวิชาการระดับนานาชาติ', 10, '2023-09-02_00-02-31_1.png');

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

--
-- Dumping data for table `personal_1_7`
--

INSERT INTO `personal_1_7` (`userId`, `id`, `term`, `year`, `type`, `title`, `start`, `end`, `type_work_s_j`, `type_work`, `participation`, `amount_work`, `file`) VALUES
('1', 16, 1, 2566, 'qqqq', 'www', '2023-10-01', '2023-10-02', 'ร่วม', 'VirtualClassroom/E-learning/CAI', 100, 0.75, '');

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
('1', 12, 1, 2566, '2023-09-04', 'วิทยากร', 'fwrgw', 'อาคารครุศาสตร์', 'sfsg', 2, 0.13, '2023-09-02_00-05-00_1.pdf');

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
('1', 9, 1, 2566, '2023-09-03', 'วิจัยการสุกของทุเรียนเก', 'อาคารครุศาสตร์ดอ', 5, 0.33, '2023-09-02_00-06-15_1.pdf');

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
('1', 11, 1, 2566, '2023-09-13', 'กำจัดยุงลายาาาาา', 'กรรมการและเลขานุการ', 'งานไม่ต่อเนื่อง/ชั่วคราว', 3, 1.5, '2023-09-02_00-09-03_1.jpg'),
('1', 12, 1, 2566, '2023-09-04', 'กำจัดยุงแมลงงา', 'ประธาน', 'ออกแบบ/เขียนแบบอาคาร', 3, 2.5, '2023-09-02_00-08-51_1.pdf');

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
('1', 60, 1, 2566, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
('2', 61, 1, 2566, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
('2', 62, 1, 2567, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
('1', 63, 1, 2567, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
('1', 64, 1, 2568, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
('1', 65, 2, 2566, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
('20', 66, 1, 2566, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
('20', 67, 1, 2567, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
('22', 68, 1, 2566, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

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
('1', 1, 1, 2566, 'นายภาคภูมิ สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 32.49, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2', 2, 1, 2566, 'นางสาวบงกชมาศ บุญศักดิ์', 'วิศวกรรมซอฟต์แวร์', 36.08, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2', 3, 1, 2567, 'นายภาคภูมิ สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 10.75, 10, 0, 0, 0, 10, 0, 0, 0, 10, 0, 0, 0, 10, 0, 0, 0, 40, 0, 0, 0),
('1', 4, 1, 2567, 'นายภาคภูมิ สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 13.875, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1', 5, 1, 2568, 'นายภาคภูมิ สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1', 6, 2, 2566, 'นายภาคภูมิ สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('20', 7, 1, 2566, 'นายSarawut Potjanat', 'วิทยาการคอมพิวเตอร์', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('20', 8, 1, 2567, 'นายSarawut Potjanat', 'วิทยาการคอมพิวเตอร์', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('22', 9, 1, 2566, 'นางBongkotmas Boonsak', 'เทคโนโลยีคอมพิวเตอร์และดิจิทัล', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(1, 'ศาสตราจารย์', 'นาย', 'ภาคภูมิ', 'สุขชาติ', 'วิศวกรรมซอฟต์แวร์', 'prefix.2pm@gmail.com', '$2y$10$3PFxIk98uCUU3CJ3N7Ru7ucYZNs7ciAbKuzKPpe3CsCr1QNsVWeWO', 'teacher', 'เป็น', '2023-09-01 15:10:10'),
(2, 'ผู้ช่วยศาสตราจารย์', 'นาง', 'บงกชมาศ', 'บุญศักดิ์', 'วิศวกรรมซอฟต์แวร์', 'cream333@gmail.com', '$2y$10$sZFPG7hgMk54axcVsBGEuue2i28pBlly1OIb/Z2kIeHFuz6E4QPf6', 'officer', 'เป็น', '2023-09-01 15:33:35'),
(20, 'ผู้ช่วยศาสตราจารย์', 'นาย', 'Sarawut', 'Potjanat', 'วิทยาการคอมพิวเตอร์', 'gvgx831@gmail.com', '$2y$10$NMwJ9MXTVqWHXF3n6nHzxObyyOxXKshUkSAH0oKCTEuypF3ZULf/C', 'officer', 'เป็น', '2023-09-02 16:11:27'),
(21, 'ผู้ช่วยศาสตราจารย์', 'นาง', 'Sarawut', 'Potjanat', 'เทคโนโลยีและนวัตกรรมอาหาร', 'stu6510014111@sskru.ac.th', '$2y$10$RmWPRIynIXjOhmDiLWTjN.pRCFJDnRQvuNPXWQJeEuxkMCTSKfkXe', 'teacher', 'เป็น', '2023-09-02 18:15:27'),
(22, 'ผู้ช่วยศาสตราจารย์', 'นาง', 'Bongkotmas', 'Boonsak', 'เทคโนโลยีคอมพิวเตอร์และดิจิทัล', 'root@gmail.com', '$2y$10$AyqQViKlZXavLv4HoUh84OU5pxkjpnrMULbiZ6qb.bMe6vWwei2DK', 'teacher', 'เป็น', '2023-09-03 10:48:42');

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
('1', 9, 2, 2566, '', 'นาย', 'ภาคภูมิ', 'สุขชาติ', 2),
('1', 10, 1, 2566, '', 'นาย', 'ภาคภูมิ', 'สุขชาติ', 32.49),
('20', 11, 1, 2566, '', 'นาย', 'Sarawut', 'Potjanat', 0),
('20', 12, 1, 2567, '', 'นาย', 'Sarawut', 'Potjanat', 0),
('1', 13, 1, 2567, '', 'นาย', 'ภาคภูมิ', 'สุขชาติ', 13.875),
('2', 14, 1, 2567, '', 'นาง', 'บงกชมาศ', 'บุญศักดิ์', 10.75),
('2', 15, 1, 2566, '', 'นาง', 'บงกชมาศ', 'บุญศักดิ์', 36.08),
('22', 16, 1, 2566, '', 'นาง', 'Bongkotmas', 'Boonsak', 0);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_1_1_file`
--
ALTER TABLE `personal_1_1_file`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_1_2_a`
--
ALTER TABLE `personal_1_2_a`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_1_7`
--
ALTER TABLE `personal_1_7`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_1_8`
--
ALTER TABLE `personal_1_8`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_1_9`
--
ALTER TABLE `personal_1_9`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_1_10`
--
ALTER TABLE `personal_1_10`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_1_11`
--
ALTER TABLE `personal_1_11`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `personal_3`
--
ALTER TABLE `personal_3`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

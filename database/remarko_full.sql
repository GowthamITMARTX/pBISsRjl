-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 08:25 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `remarko`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(10) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `code`, `title`, `create_date`, `create_by`, `status`) VALUES
(1, '15.1', 'Electricity', '21-10-2015', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(10) NOT NULL,
  `b_id` int(10) NOT NULL DEFAULT '0',
  `c_id` int(10) NOT NULL DEFAULT '0',
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fee` double DEFAULT NULL,
  `initial_amount` double DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `b_id`, `c_id`, `code`, `title`, `fee`, `initial_amount`, `create_date`, `create_by`, `status`) VALUES
(1, 1, 1, '787', 'CS 15.1', 65000, 15000, '26-10-2015', 1, b'1'),
(2, 1, 2, '78', 'MIS15.1', 45000, 15000, '28-10-2015', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `class_pool`
--

CREATE TABLE `class_pool` (
  `cls_id` int(11) DEFAULT NULL,
  `sid` int(10) DEFAULT NULL,
  `lid` int(10) DEFAULT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_pool`
--

INSERT INTO `class_pool` (`cls_id`, `sid`, `lid`, `amount`) VALUES
(2, 1, 5, 15000),
(2, 2, 1, 15000),
(1, 1, 5, 10000),
(1, 2, 1, 10000),
(1, 3, 5, 10000),
(1, 5, 5, 10000),
(1, 6, 1, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `code`, `title`, `create_date`, `create_by`, `status`) VALUES
(1, 'CS-003-ENG', 'Computer Science', '21-10-2015', 1, b'1'),
(2, 'CS-004-ENG', 'Management Information System', '21-10-2015', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `index` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `permanent_address` tinytext,
  `mobile_no` varchar(50) NOT NULL,
  `tel_no` varchar(50) DEFAULT NULL,
  `nic_no` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `martial_status` enum('Single','Married','Divorced') DEFAULT 'Single',
  `religion` varchar(255) DEFAULT NULL,
  `sex` enum('M','F','O') DEFAULT 'M',
  `education_backgroud` varchar(255) DEFAULT NULL,
  `remark` text,
  `create_by` smallint(6) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  `salary` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `index`, `title`, `name`, `permanent_address`, `mobile_no`, `tel_no`, `nic_no`, `email`, `dob`, `martial_status`, `religion`, `sex`, `education_backgroud`, `remark`, `create_by`, `create_date`, `status`, `salary`) VALUES
(1, 'EMP-00001', 'Mr.', 'ranga', 'asd', '78797979', '78797979', '898989898V', 'g@g.com', '12-11-2015', 'Single', 'Buddhists', 'M', 'asd', NULL, 1, '12-11-2015', b'1', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_employee`
--

CREATE TABLE `expenses_employee` (
  `id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `voucher` varchar(50) NOT NULL,
  `amount` double DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `current_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_employee`
--

INSERT INTO `expenses_employee` (`id`, `emp_id`, `code`, `voucher`, `amount`, `create_by`, `status`, `current_date`) VALUES
(1, 1, 'EEX-00001', '0122', 50000, 1, 1, '2015-11-12 22:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_lecture`
--

CREATE TABLE `expenses_lecture` (
  `id` int(10) NOT NULL,
  `lec_id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `voucher` varchar(50) NOT NULL,
  `amount` double DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `current_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_lecture`
--

INSERT INTO `expenses_lecture` (`id`, `lec_id`, `code`, `voucher`, `amount`, `create_by`, `status`, `current_date`) VALUES
(1, 1, 'LEX-00001', '01222', 50000, 1, 1, '2015-11-12 22:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_other`
--

CREATE TABLE `expenses_other` (
  `id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `e_type` int(10) DEFAULT NULL,
  `note` text,
  `amount` double DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `current_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_other`
--

INSERT INTO `expenses_other` (`id`, `code`, `e_type`, `note`, `amount`, `create_by`, `status`, `current_date`) VALUES
(1, 'OEX-00001', 1, 'September Bill', 15, 1, 1, '2015-11-09 05:41:29'),
(2, 'OEX-00002', 1, 'asd', 15500, 1, 1, '2015-11-09 05:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_type`
--

CREATE TABLE `expenses_type` (
  `id` int(10) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_type`
--

INSERT INTO `expenses_type` (`id`, `code`, `title`, `create_date`, `create_by`, `status`) VALUES
(1, 'EXC-00001', 'Eletricity', '09-11-2015', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `permanent_address` tinytext,
  `mobile_no` varchar(50) NOT NULL,
  `tel_no` varchar(50) DEFAULT NULL,
  `nic_no` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `martial_status` enum('Single','Married','Divorced') DEFAULT 'Single',
  `religion` varchar(255) DEFAULT NULL,
  `sex` enum('M','F','O') DEFAULT 'M',
  `education_qualification` varchar(255) DEFAULT NULL,
  `com_designation` varchar(255) DEFAULT NULL,
  `remark` text,
  `create_by` smallint(6) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `emp_id`, `title`, `name`, `permanent_address`, `mobile_no`, `tel_no`, `nic_no`, `email`, `dob`, `martial_status`, `religion`, `sex`, `education_qualification`, `com_designation`, `remark`, `create_by`, `create_date`, `status`) VALUES
(1, 'EMP-00001', 'Mr.', 'Rangana Rodirigo', 'asd', '78978978', '546654654654', '123456', 'ranga@gmail.com', '25-11-1991', 'Married', 'Buddhists', 'M', 'Bsc ', 'Engineee', NULL, 1, '23-10-2015', b'1'),
(5, 'EMP-00002', 'Mr.', 'Gowthama ravi', 'PERMANENT ADDRESS', '78978978', '546654654654', '986532124V', 'ranga@gmail.com', '25-11-1991', 'Single', 'Buddhists', 'M', 'Bsc ', 'Engineee', NULL, 1, '23-10-2015', b'1'),
(7, 'EMP-00003', 'Mr.', 'Rahul', 'asd', 'asd', 'asd', '898989898V', 'asd@asd.com', '21-10-2015', 'Single', 'Buddhists', 'M', 'asd', 'asd', NULL, 1, '26-10-2015', b'1'),
(8, 'EMP-00008', 'Mr.', 'Amar', 'asasdasasda', 'asda', 'sda', '878787878V', 'asd@asd.com', '26-10-2015', 'Single', 'Buddhists', 'M', 'asd', 'asd', NULL, 1, '26-10-2015', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_pool`
--

CREATE TABLE `lecture_pool` (
  `lec_id` int(10) DEFAULT NULL,
  `sub_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_pool`
--

INSERT INTO `lecture_pool` (`lec_id`, `sub_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 6),
(5, 1),
(5, 3),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'cashier '),
(3, 'student'),
(4, 'lecture');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_access`
--

CREATE TABLE `privilege_access` (
  `p_id` int(10) DEFAULT NULL,
  `controller` varchar(50) DEFAULT NULL,
  `access` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privilege_access`
--

INSERT INTO `privilege_access` (`p_id`, `controller`, `access`) VALUES
(2, 'payment', '7'),
(2, 'transaction', '7');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(255) NOT NULL,
  `std_id` int(255) NOT NULL,
  `lec_id` int(255) NOT NULL,
  `cls_id` int(255) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `std_id`, `lec_id`, `cls_id`, `title`, `description`, `date`, `time`) VALUES
(1, 1, 5, 1, 'CS Reminder', 'Next CS Class date - 20-11-2015', '2015-11-13', '07:00:00'),
(2, 1, 1, 1, 'MIS Classes', 'MIS Classes ..', '2015-11-21', '05:30:00'),
(3, 1, 5, 1, 'MIS Classes', 'MIS Classes remark', '2015-12-12', '05:30:00'),
(4, 1, 5, 1, 'MIS Classes', 'MIS Classes remark', '2015-10-12', '05:30:00'),
(5, 1, 5, 1, 'MIS Classes', 'MIS Classes remark', '2015-10-12', '05:30:00'),
(6, 1, 1, 1, 'asd', 'asasdasd', '2015-11-25', '10:45:00'),
(7, 1, 1, 1, 'MIS Classes ', 'MIS Classes ', '2015-11-25', '12:00:00'),
(8, 1, 1, 1, 'MIS classes', 'MIS classes', '2015-11-25', '11:00:00'),
(9, 1, 1, 1, 'adsadsad', 'asdasd', '2015-11-10', '09:15:00'),
(10, 1, 1, 1, 'adsadsad', 'asdasd', '2015-11-10', '09:15:00'),
(11, 1, 1, 1, 'note', 'Note', '2015-11-30', '12:00:00'),
(12, 1, 1, 1, 'asdfsdf', 'sdfsdf', '2015-11-24', '12:00:00'),
(13, 1, 1, 1, 'all student', 'for 1', '2015-11-24', '12:15:00'),
(14, 0, 1, 1, 'all remarl', 'asdfasdfd', '2015-11-19', '12:30:00'),
(15, 0, 1, 1, 'all remarl', 'asdfasdfd', '2015-11-11', '12:30:00'),
(16, 0, 1, 1, 'all remarl', 'asdfasdfd', '2015-11-11', '12:30:00'),
(17, 0, 1, 1, 'all remarl', 'asdfasdfd', '2015-11-11', '12:30:00'),
(18, 1, 1, 1, 'sdfsdf', 'sdfsdf', '2015-11-10', '12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `std_payment`
--

CREATE TABLE `std_payment` (
  `id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `std_id` int(10) DEFAULT NULL,
  `cls_id` int(10) DEFAULT NULL,
  `std_cls_id` int(10) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_payment`
--

INSERT INTO `std_payment` (`id`, `code`, `std_id`, `cls_id`, `std_cls_id`, `amount`, `type`, `create_by`, `status`, `date`) VALUES
(6, 'INV-00006', 1, 2, 6, 35000, NULL, 1, 1, '2015-10-29 06:49:39'),
(7, 'INV-00007', 1, 1, 7, 15000, NULL, 1, 0, '2015-10-29 07:20:01'),
(8, 'INV-00008', 1, 1, 8, 15000, NULL, NULL, 0, '2015-11-09 04:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `index` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `permanent_address` tinytext,
  `nearest_police_station` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `tel_no` varchar(50) DEFAULT NULL,
  `nic_no` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `martial_status` enum('Single','Married','Divorced') DEFAULT 'Single',
  `school_attended` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `sex` enum('M','F','O') DEFAULT 'M',
  `education_backgroud` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `company_period` varchar(255) DEFAULT NULL,
  `com_designation` varchar(255) DEFAULT NULL,
  `com_number` varchar(50) DEFAULT NULL,
  `f_m_g_name` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `office_home` varchar(255) DEFAULT NULL,
  `con_number` varchar(50) DEFAULT NULL,
  `remark` text,
  `create_by` smallint(6) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `index`, `title`, `name`, `permanent_address`, `nearest_police_station`, `mobile_no`, `tel_no`, `nic_no`, `email`, `dob`, `martial_status`, `school_attended`, `religion`, `sex`, `education_backgroud`, `company`, `company_period`, `com_designation`, `com_number`, `f_m_g_name`, `occupation`, `office_home`, `con_number`, `remark`, `create_by`, `create_date`, `status`) VALUES
(1, 'STD-00001', 'Mr.', 'Gowthamaravi mailvaganam', 'B2/F6 Blomendhal flat''s, kotahena, colombo-13', 'kotahena police station', '0776538241', '0112387602', '123456', 'gowthammailvaganam@gmail.com', '06-08-1991', 'Single', 'Vivekananda College', 'Buddhists', 'M', 'Bsc.CS', 'ITMART', '2', 'Software Engineer', '0123654789', 'mailvaganam', 'Gold Smith', 'Pattakanu jewellery ', '0777526003', '', 1, '22-10-2015', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `student_cls_pool`
--

CREATE TABLE `student_cls_pool` (
  `id` int(10) NOT NULL,
  `std_id` int(10) DEFAULT NULL,
  `cls_id` int(10) DEFAULT NULL,
  `fee` double DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `create_by` int(10) DEFAULT NULL,
  `create_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_cls_pool`
--

INSERT INTO `student_cls_pool` (`id`, `std_id`, `cls_id`, `fee`, `status`, `create_by`, `create_date`) VALUES
(1, 1, 1, 65000, 0, NULL, NULL),
(2, 2, 2, 45000, 0, NULL, NULL),
(3, 1, 1, 40000, 0, NULL, NULL),
(4, 1, 1, 40000, 0, NULL, NULL),
(5, 2, 2, 45000, 0, NULL, NULL),
(6, 2, 2, 45000, 0, NULL, NULL),
(7, 1, 1, 50000, 0, NULL, NULL),
(8, 1, 1, 40000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_cls_subject`
--

CREATE TABLE `student_cls_subject` (
  `sld_cls_id` int(10) DEFAULT NULL,
  `sub_id` int(10) DEFAULT NULL,
  `fee` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_cls_subject`
--

INSERT INTO `student_cls_subject` (`sld_cls_id`, `sub_id`, `fee`) VALUES
(2, 2, 15000),
(2, 1, 15000),
(3, 2, 10000),
(3, 6, 15000),
(4, 2, 10000),
(4, 6, 15000),
(6, 2, 10000),
(7, 6, 15000),
(7, 1, 10000),
(8, 2, 10000),
(8, 6, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `code`, `title`, `create_date`, `create_by`, `status`) VALUES
(1, 'BS-OO1-OOP', 'Object Oriented Programming', '21-10-2015', 1, b'1'),
(2, '0012', 'CS', '23-10-2015', 1, b'1'),
(3, '0013', 'C plus', '23-10-2015', 1, b'1'),
(4, '0014', 'C #', '23-10-2015', 1, b'1'),
(5, '0015', 'java', '23-10-2015', 1, b'1'),
(6, '0016', 'php', '23-10-2015', 1, b'1'),
(7, '0017', 'javascript', '23-10-2015', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `cls_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `cls_id`, `title`, `start`, `end`, `status`) VALUES
(27, 1, 'CS - Mr.Rangana Rodirigo ', '2015-11-02 05:30:00', '2015-11-02 05:30:00', 1),
(28, 2, 'Object Oriented Programming - Mr.Gowthama ravi ', '2015-11-01 05:30:00', '2015-11-01 05:30:00', 1),
(29, 2, 'Object Oriented Programming - Mr.Gowthama ravi ', '2015-11-09 05:30:00', '2015-11-09 05:30:00', 1),
(30, 1, 'Object Oriented Programming - Mr.Gowthama ravi ', '2015-11-10 05:30:00', '2015-11-10 05:30:00', 1),
(31, 1, 'CS - Mr.Rangana Rodirigo ', '2015-11-08 05:30:00', '0000-00-00 00:00:00', 1),
(32, 1, 'CS - Mr.Rangana Rodirigo ', '2015-11-09 05:30:00', '2015-11-09 05:30:00', 1),
(33, 1, 'CS - Mr.Rangana Rodirigo ', '2015-11-15 05:30:00', '2015-11-15 05:30:00', 1),
(34, 1, 'Object Oriented Programming - Mr.Gowthama ravi ', '2015-11-13 05:30:00', '2015-11-11 13:30:00', 1),
(35, 1, 'java - Mr.Gowthama ravi ', '2015-11-01 05:30:00', '2015-11-01 05:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tab`
--

CREATE TABLE `user_tab` (
  `id` smallint(6) NOT NULL,
  `code` varchar(8) DEFAULT 'user0001',
  `type` tinyint(4) DEFAULT '1',
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` tinyint(4) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tab`
--

INSERT INTO `user_tab` (`id`, `code`, `type`, `name`, `password`, `date`, `last_update`, `user_id`, `status`) VALUES
(1, 'user0001', 1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2015-10-21 12:14:51', '2015-10-21 06:44:51', 0, 1),
(2, 'user0002', 2, 'user', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2015-10-21 12:14:51', '2015-11-06 05:01:49', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `FK_batch_user_tab` (`create_by`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `FK_class_user_tab` (`create_by`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `FK__user_tab` (`create_by`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_employee`
--
ALTER TABLE `expenses_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_lecture`
--
ALTER TABLE `expenses_lecture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_other`
--
ALTER TABLE `expenses_other`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_type`
--
ALTER TABLE `expenses_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index` (`emp_id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_payment`
--
ALTER TABLE `std_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index` (`index`),
  ADD KEY `FK_students_user_tab` (`create_by`);

--
-- Indexes for table `student_cls_pool`
--
ALTER TABLE `student_cls_pool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `FK_subject_user_tab` (`create_by`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tab`
--
ALTER TABLE `user_tab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `expenses_employee`
--
ALTER TABLE `expenses_employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `expenses_lecture`
--
ALTER TABLE `expenses_lecture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `expenses_other`
--
ALTER TABLE `expenses_other`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expenses_type`
--
ALTER TABLE `expenses_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `std_payment`
--
ALTER TABLE `std_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_cls_pool`
--
ALTER TABLE `student_cls_pool`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user_tab`
--
ALTER TABLE `user_tab`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `FK_batch_user_tab` FOREIGN KEY (`create_by`) REFERENCES `user_tab` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `FK_class_user_tab` FOREIGN KEY (`create_by`) REFERENCES `user_tab` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK__user_tab` FOREIGN KEY (`create_by`) REFERENCES `user_tab` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_students_user_tab` FOREIGN KEY (`create_by`) REFERENCES `user_tab` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `FK_subject_user_tab` FOREIGN KEY (`create_by`) REFERENCES `user_tab` (`id`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

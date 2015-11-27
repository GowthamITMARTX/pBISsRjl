-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2015 at 12:30 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `remarko`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `lec_id` int(255) NOT NULL,
  `cls_id` int(255) NOT NULL,
  `sub_id` int(255) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `view_result` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_batch_user_tab` (`create_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `code`, `title`, `create_date`, `create_by`, `status`) VALUES
(1, '15.1', 'CS 15.1', '21-10-2015', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `b_id` int(10) NOT NULL DEFAULT '0',
  `c_id` int(10) NOT NULL DEFAULT '0',
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fee` double DEFAULT NULL,
  `initial_amount` double DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_class_user_tab` (`create_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `b_id`, `c_id`, `code`, `title`, `fee`, `initial_amount`, `create_date`, `create_by`, `status`) VALUES
(1, 1, 1, '001', 'CS 15.1', 65000, 15000, '24-11-2015', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `class_pool`
--

CREATE TABLE IF NOT EXISTS `class_pool` (
  `cls_id` int(11) DEFAULT NULL,
  `sid` int(10) DEFAULT NULL,
  `lid` int(10) DEFAULT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_pool`
--

INSERT INTO `class_pool` (`cls_id`, `sid`, `lid`, `amount`) VALUES
(1, 1, 1, 10000),
(1, 2, 1, 10000),
(1, 3, 1, 10000),
(1, 5, 1, 10000),
(1, 6, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK__user_tab` (`create_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `salary` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `index`, `title`, `name`, `permanent_address`, `mobile_no`, `tel_no`, `nic_no`, `email`, `dob`, `martial_status`, `religion`, `sex`, `education_backgroud`, `remark`, `create_by`, `create_date`, `status`, `salary`) VALUES
(1, 'EMP-00001', 'Mr.', 'ranga', 'asd', '78797979', '78797979', '898989898V', 'g@g.com', '12-11-2015', 'Single', 'Buddhists', 'M', 'asd', NULL, 1, '12-11-2015', b'1', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_employee`
--

CREATE TABLE IF NOT EXISTS `expenses_employee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `voucher` varchar(50) NOT NULL,
  `amount` double DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `current_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_by` int(11) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `expenses_employee`
--

INSERT INTO `expenses_employee` (`id`, `emp_id`, `code`, `voucher`, `amount`, `create_by`, `status`, `current_date`, `delete_by`, `delete_date`) VALUES
(1, 1, 'EEX-00001', '0078', 50000, 1, 1, '2015-11-27 05:41:41', 1, '0000-00-00 00:00:00'),
(2, 1, 'EEX-00002', '78', 50000, 1, 0, '2015-11-27 06:41:42', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_lecture`
--

CREATE TABLE IF NOT EXISTS `expenses_lecture` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lec_id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `voucher` varchar(50) NOT NULL,
  `amount` double DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `current_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_by` int(11) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expenses_lecture`
--

INSERT INTO `expenses_lecture` (`id`, `lec_id`, `code`, `voucher`, `amount`, `create_by`, `status`, `current_date`, `delete_by`, `delete_date`) VALUES
(1, 2, 'LEX-00001', '787', 98000, 1, 0, '2015-11-27 06:41:15', 1, '2015-11-27 06:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_other`
--

CREATE TABLE IF NOT EXISTS `expenses_other` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `e_type` int(10) DEFAULT NULL,
  `note` text,
  `amount` double DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `current_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expenses_other`
--

INSERT INTO `expenses_other` (`id`, `code`, `e_type`, `note`, `amount`, `create_by`, `status`, `current_date`) VALUES
(1, 'OEX-00001', 1, '87asd ', 12000, 1, 1, '2015-11-27 05:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_type`
--

CREATE TABLE IF NOT EXISTS `expenses_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expenses_type`
--

INSERT INTO `expenses_type` (`id`, `code`, `title`, `create_date`, `create_by`, `status`) VALUES
(1, 'EXC-00001', 'Eletricity', '09-11-2015', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE IF NOT EXISTS `lecture` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `status` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `index` (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `emp_id`, `title`, `name`, `permanent_address`, `mobile_no`, `tel_no`, `nic_no`, `email`, `dob`, `martial_status`, `religion`, `sex`, `education_qualification`, `com_designation`, `remark`, `create_by`, `create_date`, `status`) VALUES
(1, 'EMP-00001', 'Mr.', 'Rangana Rodirigo', 'asd', '78978978', '546654654654', '123456', 'ranga@gmail.com', '25-11-1991', 'Married', 'Buddhists', 'M', 'Bsc ', 'Engineee', NULL, 1, '23-10-2015', b'1'),
(2, 'EMP-00008', 'Mr.', 'Amar', 'asasdasasda', 'asda', 'sda', '878787878V', 'asd@asd.com', '26-10-2015', 'Single', 'Buddhists', 'M', 'asd', 'asd', NULL, 1, '26-10-2015', b'1'),
(7, 'EMP-00003', 'Mr.', 'Rahul', 'asd', 'asd', 'asd', '898989898V', 'asd@asd.com', '21-10-2015', 'Single', 'Buddhists', 'M', 'asd', 'asd', NULL, 1, '26-10-2015', b'1'),
(8, 'EMP-00002', 'Mr.', 'Gowthama ravi', 'PERMANENT ADDRESS', '78978978', '546654654654', '123', 'a@a.com', '25-11-1991', 'Single', 'Buddhists', 'M', 'Bsc ', 'Engineee', NULL, 1, '23-10-2015', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_pool`
--

CREATE TABLE IF NOT EXISTS `lecture_pool` (
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
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `other_income`
--

CREATE TABLE IF NOT EXISTS `other_income` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `note` text,
  `amount` double DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `create_date` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `current_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `other_income`
--

INSERT INTO `other_income` (`id`, `code`, `note`, `amount`, `create_by`, `create_date`, `status`, `current_date`) VALUES
(1, 'OTI-00001', 'test', 12000, 1, '26-11-2015', 1, '2015-11-26 04:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `privilege_access` (
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

CREATE TABLE IF NOT EXISTS `remark` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `std_id` int(255) NOT NULL,
  `lec_id` int(255) NOT NULL,
  `cls_id` int(255) NOT NULL,
  `sub_id` int(255) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `std_assi`
--
CREATE TABLE IF NOT EXISTS `std_assi` (
`id` int(10)
,`std_id` int(10)
,`cls_id` int(10)
,`fee` double
,`status` int(1)
,`create_by` int(10)
,`create_date` varchar(50)
,`sub_id` int(10)
);
-- --------------------------------------------------------

--
-- Table structure for table `std_payment`
--

CREATE TABLE IF NOT EXISTS `std_payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `std_id` int(10) DEFAULT NULL,
  `cls_id` int(10) DEFAULT NULL,
  `std_cls_id` int(10) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `std_payment`
--

INSERT INTO `std_payment` (`id`, `code`, `std_id`, `cls_id`, `std_cls_id`, `amount`, `type`, `create_by`, `status`, `date`) VALUES
(1, 'INV-00001', 1, 1, 1, 15000, NULL, 1, 1, '2015-11-27 09:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `index` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
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
  `status` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `index` (`index`),
  KEY `FK_students_user_tab` (`create_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `index`, `title`, `name`, `profile_image`, `permanent_address`, `nearest_police_station`, `mobile_no`, `tel_no`, `nic_no`, `email`, `dob`, `martial_status`, `school_attended`, `religion`, `sex`, `education_backgroud`, `company`, `company_period`, `com_designation`, `com_number`, `f_m_g_name`, `occupation`, `office_home`, `con_number`, `remark`, `create_by`, `create_date`, `status`) VALUES
(1, 'STD-00001', 'Mr.', 'Vinoth', '12115992_796054467166594_3552834198295718944_n5.jpg', 'B2/F6 Blomendhal flat''s, kotahena, colombo-13', 'kotahena police station', '0776538241', '0112387602', '123456', 'a@a.com', '06-08-1991', 'Single', 'Vivekananda College', 'Buddhists', 'M', 'Bsc.CS', 'ITMART', '2', 'Software Engineer', '0123654789', 'mailvaganam', 'Gold Smith', 'Pattakanu jewellery ', '0777526003', '', 1, '22-10-2015', b'1'),
(3, 'STD-00002', 'Mr.', 'Asmal', '12115992_796054467166594_3552834198295718944_n.jpg', 'B2/F6 Blomendhal flat''s, kotahena, colombo-13', 'kotahena police station', '0776538241', '0112387602', '123456____', 'gowthammailvaganam@gmail.com', '06-08-1991', 'Single', 'Vivekananda College', 'Buddhists', 'M', 'Bsc.CS', 'ITMART', '2', 'Software Engineer', '0123654789', 'mailvaganam', 'Gold Smith', 'Pattakanu jewellery ', '0777526003', '', 1, '22-10-2015', b'1'),
(11, 'STD-00011', 'Mr.', 'amarashan', '12115992_796054467166594_3552834198295718944_n5.jpg', 'asd\r\nas', 'asd', 'asd', 'asd', '798654654V', 'g@g.com', '24-11-2015', 'Single', 'asd', 'Buddhists', 'M', 'asd', 'asd', 'asd', 'asd', 'ad', 'asd', 'asd', 'asd', 'asd', 'asd', 1, '24-11-2015', b'1'),
(12, 'STD-00012', 'Mr.', 'asdasd asd', '291941_120676984704349_830871201_n1.jpg', 'asd\r\nas', 'asd', 'asd', 'asd', '798798798V', 'g@g.com', '24-11-2015', 'Single', 'asd', 'Buddhists', 'M', 'asd', 'sda', 'as', 'asd', 'das', 'asd', 'asd', 'sdads', 'asd', 'asd', 1, '24-11-2015', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `student_cls_pool`
--

CREATE TABLE IF NOT EXISTS `student_cls_pool` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `std_id` int(10) DEFAULT NULL,
  `cls_id` int(10) DEFAULT NULL,
  `fee` double DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `create_by` int(10) DEFAULT NULL,
  `create_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student_cls_pool`
--

INSERT INTO `student_cls_pool` (`id`, `std_id`, `cls_id`, `fee`, `status`, `create_by`, `create_date`) VALUES
(1, 1, 1, 65000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_cls_subject`
--

CREATE TABLE IF NOT EXISTS `student_cls_subject` (
  `sld_cls_id` int(10) DEFAULT NULL,
  `sub_id` int(10) DEFAULT NULL,
  `fee` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_cls_subject`
--

INSERT INTO `student_cls_subject` (`sld_cls_id`, `sub_id`, `fee`) VALUES
(1, 1, 10000),
(1, 2, 10000),
(1, 3, 10000),
(1, 5, 10000),
(1, 6, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `create_date` varchar(10) DEFAULT NULL,
  `create_by` smallint(6) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `FK_subject_user_tab` (`create_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
-- Table structure for table `submitted_assignment`
--

CREATE TABLE IF NOT EXISTS `submitted_assignment` (
  `std_id` int(255) DEFAULT NULL,
  `assi_id` int(255) DEFAULT NULL,
  `name` varchar(70) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `mark` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cls_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `sub_id` int(11) DEFAULT '1',
  `lid` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `cls_id`, `title`, `start`, `end`, `status`, `sub_id`, `lid`) VALUES
(1, 1, 'Object Oriented Programming - Mr.Rangana Rodirigo ', '2015-11-27 05:30:00', '2015-11-27 05:30:00', 1, 1, 1),
(2, 1, 'CS - Mr.Rangana Rodirigo ', '2015-11-28 05:30:00', '2015-11-28 05:30:00', 1, 2, 1),
(3, 1, 'CS - Mr.Rangana Rodirigo ', '2015-11-29 05:30:00', '2015-11-29 05:30:00', 1, 2, 1),
(4, 1, 'C plus - Mr.Rangana Rodirigo ', '2015-11-30 05:30:00', '2015-11-30 05:30:00', 1, 3, 1),
(5, 1, 'java - Mr.Rangana Rodirigo ', '2015-12-01 05:30:00', '2015-12-01 05:30:00', 1, 5, 1),
(6, 1, 'php - Mr.Rangana Rodirigo ', '2015-12-02 05:30:00', '2015-12-02 05:30:00', 1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tab`
--

CREATE TABLE IF NOT EXISTS `user_tab` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(8) DEFAULT 'user0001',
  `type` tinyint(4) DEFAULT '1',
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` tinyint(4) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_tab`
--

INSERT INTO `user_tab` (`id`, `code`, `type`, `name`, `password`, `date`, `last_update`, `user_id`, `status`) VALUES
(1, 'user0001', 1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2015-10-21 12:14:51', '2015-10-21 06:44:51', 0, 1),
(2, 'user0002', 2, 'user', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2015-10-21 12:14:51', '2015-11-06 05:01:49', 0, 1);

-- --------------------------------------------------------

--
-- Structure for view `std_assi`
--
DROP TABLE IF EXISTS `std_assi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `std_assi` AS select distinct `student_cls_pool`.`id` AS `id`,`student_cls_pool`.`std_id` AS `std_id`,`student_cls_pool`.`cls_id` AS `cls_id`,`student_cls_pool`.`fee` AS `fee`,`student_cls_pool`.`status` AS `status`,`student_cls_pool`.`create_by` AS `create_by`,`student_cls_pool`.`create_date` AS `create_date`,`student_cls_subject`.`sub_id` AS `sub_id` from (`student_cls_pool` join `student_cls_subject`) where (`student_cls_pool`.`id` = `student_cls_subject`.`sld_cls_id`);

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

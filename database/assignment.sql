-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2015 at 10:57 AM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `lec_id`, `cls_id`, `sub_id`, `title`, `description`, `file`, `date`, `time`, `status`) VALUES
(1, 8, 1, 1, 'test', 'Message', NULL, '2015-11-27', '11:30:00', 1),
(3, 8, 1, 1, 'title 3', 'Message', 'N5878574.pdf', '2015-11-11', '11:45:00', 1),
(4, 8, 1, 2, 'asdasdasd', 'asdasdasd', 'Bangkok_-_Fun_Sun_Package.pdf', '2015-11-20', '12:00:00', 1),
(5, 8, 1, 2, 'asdasdasd', 'asdasdasd', 'Bangkok_-_Fun_Sun_Package1.pdf', '2015-11-20', '12:00:00', 1),
(6, 8, 1, 2, 'asdasdasd', 'asdasdasd', 'Bangkok_-_Fun_Sun_Package2.pdf', '2015-11-20', '12:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2017 at 10:36 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eyecaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `lastlogin` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `branch_id`, `admin_name`, `login_id`, `password`, `email_id`, `lastlogin`) VALUES
(1, 1, 'mike', 'mike', 'mike123', 'mike@gmail.com', '2017-06-08 01:56:44'),
(8, 1, 'admin', 'admin', 'adminadmin', 'mahesh@gmail.om', '2017-06-08 11:22:17');


-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `app_id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL,
  `pat_id` int(10) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `app_date` varchar(12) NOT NULL,
  `app_time` varchar(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;


--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_id`, `branch_id`, `pat_id`, `doc_id`, `app_date`, `app_time`, `created_at`, `status`) VALUES
(10, 1, 15, 16, '2013-03-18', '00:00:00', '2013-03-19 06:52:19', 'Done\r\n'),
(18, 1, 17, 14, '2017-05-30', '07:45:00', '2017-05-30 11:24:04', 'Done'),
(20, 1, 15, 14, '2017-06-09', '00:00:00', '2017-06-01 08:54:00', 'Done'),
(21, 2, 15, 16, '2017-06-06', '00:00:00', '2017-06-05 08:03:58', 'pending'),
(22, 2, 15, 16, '2017-06-05', '00:00:00', '2017-06-05 08:48:05', 'pending'),
(23, 1, 15, 14, '2017-06-08', '05:15:00', '2017-06-06 11:15:01', 'Done'),
(24, 1, 15, 14, '2017-06-07', '05:15:00', '2017-06-06 11:28:59', 'Done'),
(25, 1, 17, 14, '2017-06-07', '05:30:00', '2017-06-06 11:45:03', 'Done'),
(26, 1, 17, 14, '2017-06-09', '05:15:00', '2017-06-06 12:01:14', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `description`) VALUES
(1, 'KodialBail, Albany', 'Main Branch'),
(2, 'Capital House, Albany', 'Sub Branch'),
(7, 'Western Ave,Albany', 'Sub branch');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doc_id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL,
  `doc_name` varchar(25) NOT NULL,
  `clinic_name` varchar(25) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `created_at` date NOT NULL,
  `image` varchar(70) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `branch_id`, `doc_name`, `clinic_name`, `email_id`, `phone`, `mobile`, `login_id`, `password`, `created_at`, `image`, `last_login`) VALUES
(14, 1, 'jhonson', 'Johnson clinic', 'john@gmail.com', '987456321234', '98745631134543', 'John', 'general', '2013-03-16', 'johnson.jpg', '2017-06-22 09:46:56'),
(16, 2, 'peterking', 'pk', 'pgk@gmail.com', '98745632140', '78964541230', 'pk', '9876543210', '2013-03-22', 'peterking.jpg', '2013-03-22 05:35:07');


--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `branch_id`, `doc_name`, `clinic_name`, `email_id`, `phone`, `mobile`, `login_id`, `password`, `created_at`, `last_login`) VALUES
(14, 1, 'jhonson', 'Johnson clinic', 'john@gmail.com', '987456321234', '98745631134543', 'John', 'general', '2013-03-16', '2017-06-08 11:00:15'),
(16, 2, 'peter king', 'pk', 'pgk@gmail.com', '98745632140', '78964541230', 'pk', '9876543210', '2013-03-22', '2013-03-22 05:35:07');
-- --------------------------------------------------------

--
-- Table structure for table `doctor_bill`
--

CREATE TABLE IF NOT EXISTS `doctor_bill` (
  `bill_id` int(10) NOT NULL AUTO_INCREMENT,
  `test_id` int(10) NOT NULL,
  `test_fee` double(10,2) NOT NULL,
  `consultation_fee` double(10,2) NOT NULL,
  `others` double(10,2) NOT NULL,
  `date` date NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `doctor_bill`
--

INSERT INTO `doctor_bill` (`bill_id`, `test_id`, `test_fee`, `consultation_fee`, `others`, `date`, `remarks`) VALUES
(1, 9, 125.00, 75.00, 100.00, '2013-03-12', ''),
(2, 23, 100.00, 200.00, 300.00, '2013-03-22', 'this is doctor bil;l'),
(5, 24, 100.00, 200.00, 50.00, '2013-03-22', 'bnvnfchf'),
(6, 30, 30.00, 5.00, 5.00, '2017-06-06', 'good'),
(7, 30, 30.00, 5.00, 5.00, '2017-06-06', 'good'),
(8, 30, 30.00, 5.00, 5.00, '2017-06-06', 'good'),
(9, 30, 5.00, 6.00, 3.00, '2017-06-06', 'good'),
(10, 31, 30.00, 5.00, 5.00, '2017-06-06', 'good'),
(11, 32, 45.00, 5.00, 15.00, '2017-06-07', 'good'),
(12, 33, 40.00, 5.00, 5.00, '2017-06-07', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) NOT NULL,
  `test_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `total` double(10,2) NOT NULL,
  `dispatch_date` date NOT NULL,
  `payment` double(10,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `admin_id`, `test_id`, `prod_id`, `order_date`, `total`, `dispatch_date`, `payment`, `status`) VALUES
(24, 1, 10, 1, '2013-03-18', 401.00, '2013-03-18', 401.00, 'Delivered'),
(25, 1, 10, 2, '2013-03-18', 0.00, '2013-03-18', 0.00, 'Pending'),
(26, 1, 10, 5, '2013-03-18', 0.00, '2013-03-18', 0.00, 'Pending'),
(27, 1, 0, 1, '2013-03-18', 300.00, '1970-01-01', 0.00, 'Pending'),
(28, 1, 0, 2, '2013-03-18', 1.00, '2017-05-20', 1.00, 'Delivered'),
(29, 1, 0, 3, '2013-03-18', 2.00, '2013-03-18', 0.00, 'Pending'),
(30, 1, 10, 0, '2013-03-18', 3.00, '2013-03-18', 3.00, 'Delivered'),
(31, 1, 10, 2, '2013-03-18', 0.00, '2013-03-18', 0.00, 'Pending'),
(32, 1, 10, 4, '2013-03-18', 0.00, '2013-03-18', 0.00, 'Pending'),
(33, 1, 13, 1, '2013-03-18', 300.00, '1970-01-01', 0.00, 'Pending'),
(34, 1, 13, 1, '2013-03-18', 300.00, '1970-01-01', 0.00, 'Pending'),
(35, 1, 13, 1, '2013-03-18', 300.00, '1970-01-01', 0.00, 'Pending'),
(36, 1, 13, 1, '2013-03-18', 300.00, '1970-01-01', 0.00, 'Pending'),
(37, 1, 13, 1, '2013-03-18', 300.00, '1970-01-01', 0.00, 'Pending'),
(38, 1, 13, 1, '2013-03-18', 300.00, '1970-01-01', 0.00, 'Pending'),
(39, 1, 12, 4, '2013-03-20', 400.00, '2017-05-20', 400.00, 'Delivered'),
(40, 1, 12, 4, '2013-03-21', 400.00, '2017-06-02', 400.00, 'Delivered'),
(41, 1, 12, 1, '2013-03-22', 300.00, '2017-06-02', 300.00, 'Delivered'),
(42, 1, 12, 1, '2013-03-22', 300.00, '2017-06-02', 300.00, 'Delivered'),
(43, 8, 0, 10, '2017-06-02', 600.00, '2017-06-02', 600.00, 'Delivered'),
(44, 8, 0, 10, '2017-06-02', 600.00, '2017-06-02', 600.00, 'Delivered'),
(45, 8, 0, 10, '2017-06-02', 600.00, '2017-06-02', 600.00, 'Delivered'),
(46, 8, 0, 10, '2017-06-02', 600.00, '2017-06-02', 600.00, 'Delivered'),
(47, 8, 0, 10, '2017-06-02', 600.00, '2017-06-08', 300.00, 'Delivered'),
(48, 8, 0, 10, '2017-06-02', 600.00, '2017-06-08', 300.00, 'Delivered'),
(49, 8, 0, 10, '2017-06-02', 600.00, '2017-06-08', 300.00, 'Delivered'),
(50, 8, 0, 10, '2017-06-02', 600.00, '2017-06-02', 600.00, 'Delivered'),
(51, 8, 0, 8, '2017-06-02', 750.00, '2017-06-02', 750.00, 'Delivered'),
(52, 8, 23, 8, '2017-06-02', 750.00, '2017-06-02', 750.00, 'Delivered'),
(53, 8, 0, 8, '2017-06-02', 750.00, '2017-06-02', 750.00, 'Delivered'),
(54, 8, 23, 8, '2017-06-02', 750.00, '2017-06-02', 750.00, 'Delivered'),
(55, 8, 23, 8, '2017-06-02', 750.00, '2017-06-02', 750.00, 'Delivered'),
(56, 8, 23, 8, '2017-06-02', 750.00, '2017-06-02', 750.00, 'Delivered'),
(57, 8, 33, 12, '2017-06-07', 800.00, '2017-06-08', 500.00, 'Delivered'),
(58, 8, 0, 8, '2017-06-08', 750.00, '2017-06-08', 450.00, 'Delivered'),
(59, 8, 0, 8, '2017-06-08', 750.00, '2017-06-08', 450.00, 'Delivered'),
(60, 8, 33, 2, '2017-06-08', 200.00, '2017-06-15', 100.00, 'Pending'),
(61, 8, 33, 2, '2017-06-08', 200.00, '2017-06-16', 100.00, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `pat_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) NOT NULL DEFAULT '1',
  `pat_name` varchar(30) NOT NULL,
  `email_id` varchar(25),
  `password` varchar(25)   DEFAULT NULL,
  `dob` varchar(15) NOT NULL DEFAULT '1901-01-01',
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(25) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`pat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;


--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pat_id`, `admin_id`, `pat_name`, `email_id`, `password`, `dob`, `gender`, `address`, `contact`, `created_at`) VALUES
(15, 8, 'veronica', 'vn@gmail.com', 'veronica', '1970-01-01', 'Female', 'Baloor, Albany', '8971887236', '2017-06-14'),
(17, 8, 'alia', 'alia5@gmail.com', 'alia123', '1999-06-14', 'Female', 'bakon street', '8050304447', '2017-04-00'),
(20, 8, 'abram', 'abram@gmail.coma', '4321', '1992-08-24', 'Male', '', '8050304447', '2017-00-00'),
(31, 8, 'dick', 'dickenson@ymail.com', '1234567890', '1992-08-24', 'Male', 'Yeyyadi,Albany', '1234567890', '2017-02-00'),
(32, 8, 'hudson', 'hud@ymail.com', '1234', '1992-08-24', 'Male', 'Yeyyadi, Albany', '8971887236', '2017-03-00'),
(49, 8, 'peter', 'peterh@gmail.com', 'q1w2e3r4/', '1992-08-24', 'Male', '', '9876543210', '2017-06-11'),
(50, 8, 'jack king', 'jk@gmail.com', '123456789', '1999-06-11', 'Male', '', '98765432100', '2016-05-21'),
(51, 8, 'mathew', 'mah@gmail.com', 'qwertyuiop', '1995-02-14', 'Male', 'Albany', '9874563210', '2016-03-21'),
(52, 8, 'aaa bbb', 'admin@gmail.com', 'zxcvzxcv', '1969-12-14', 'Male', '', '3453535445', '2017-05-10'),
(53, 1, 'brown Gordon', 'brown@gmail.com', '', '1970-01-01', 'Male', 'Albany west', '4567788543', '2017-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `sl_no` int(10) NOT NULL AUTO_INCREMENT,
  `test_id` int(10) NOT NULL,
  `no_of_days` text NOT NULL,
  `medicines` text NOT NULL,
  `mg` text NOT NULL,
  `dosage` text NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`sl_no`, `test_id`, `no_of_days`, `medicines`, `mg`, `dosage`, `remarks`) VALUES
(1, 1, '2', '5', '6', '3', '3'),
(2, 6, 'a:18:{i:0;s:1:"2";i:1;s:1:"2";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:8:"sadasdas";i:1;s:8:"eye drop";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:3:"500";i:1;s:3:"500";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:5:"1-1-1";i:1;s:5:"1-1-1";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'gfg'),
(3, 6, 'a:18:{i:0;s:1:"2";i:1;s:1:"2";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:8:"sadasdas";i:1;s:8:"eye drop";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:3:"500";i:1;s:3:"500";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:5:"1-1-1";i:1;s:5:"1-1-1";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', ''),
(4, 6, 'a:18:{i:0;s:1:"2";i:1;s:1:"2";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:8:"sadasdas";i:1;s:8:"eye drop";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:3:"500";i:1;s:3:"500";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:5:"1-1-1";i:1;s:5:"1-1-1";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', ''),
(5, 6, 'a:18:{i:0;s:1:"2";i:1;s:1:"2";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:8:"sadasdas";i:1;s:8:"eye drop";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:3:"500";i:1;s:3:"500";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:5:"1-1-1";i:1;s:5:"1-1-1";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', ''),
(6, 7, 'a:18:{i:0;s:1:"2";i:1;s:1:"2";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:4:"swdw";i:1;s:8:"eye drop";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:3:"626";i:1;s:3:"500";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:5:"1-1-1";i:1;s:5:"1-1-1";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'wccws'),
(7, 8, 'a:18:{i:0;s:1:"2";i:1;s:1:"5";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:3:"gfg";i:1;s:11:"sadasdasjhu";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:4:"1515";i:1;s:2:"55";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:5:"1-1-1";i:1;s:5:"1-1-1";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'rgrg'),
(8, 9, 'a:18:{i:0;s:2:"20";i:1;s:2:"10";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:5:"fxgfx";i:1;s:8:"eye drop";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:2:"45";i:1;s:3:"500";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:5:"1-1-1";i:1;s:5:"1-1-1";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'hfh'),
(9, 10, 'a:18:{i:0;s:2:"20";i:1;s:1:"2";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:8:"sadasdas";i:1;s:5:"fxgfx";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:4:"1515";i:1;s:2:"45";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'a:18:{i:0;s:5:"1-1-1";i:1;s:5:"1-1-1";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";i:8;s:0:"";i:9;s:0:"";i:10;s:0:"";i:11;s:0:"";i:12;s:0:"";i:13;s:0:"";i:14;s:0:"";i:15;s:0:"";i:16;s:0:"";i:17;s:0:"";}', 'wferf'),
(10, 21, 'a:2:{i:0;s:1:"5";i:1;s:1:"5";}', 'a:2:{i:0;s:7:"Tablets";i:1;s:5:"Syrup";}', 'a:2:{i:0;s:3:"1.5";i:1;s:3:"1.5";}', 'a:2:{i:0;s:5:"1-1-1";i:1;s:5:"1-1-1";}', 'good'),
(11, 22, 'a:1:{i:0;s:1:"5";}', 'a:1:{i:0;s:7:"Tablets";}', 'a:1:{i:0;s:3:"1.5";}', 'a:1:{i:0;s:5:"1-1-1";}', 'good'),
(12, 23, 'a:2:{i:0;s:1:"2";i:1;s:1:"1";}', 'a:2:{i:0;s:5:"abced";i:1;s:3:"xyz";}', 'a:2:{i:0;s:2:"10";i:1;s:1:"1";}', 'a:2:{i:0;s:2:"23";i:1;s:1:"2";}', 'this is prescriptionj recolrd'),
(13, 24, 'a:5:{i:0;s:1:"2";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}', 'a:5:{i:0;s:5:"abced";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}', 'a:5:{i:0;s:2:"10";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}', 'a:5:{i:0;s:2:"23";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}', 'tete'),
(14, 24, 'a:5:{i:0;s:1:"2";i:1;s:1:"3";i:2;s:1:"2";i:3;s:0:"";i:4;s:0:"";}', 'a:5:{i:0;s:5:"abced";i:1;s:5:"abced";i:2;s:4:"bxcb";i:3;s:0:"";i:4;s:0:"";}', 'a:5:{i:0;s:2:"10";i:1;s:2:"10";i:2;s:2:"10";i:3;s:0:"";i:4;s:0:"";}', 'a:5:{i:0;s:2:"23";i:1;s:3:"250";i:2;s:2:"23";i:3;s:0:"";i:4;s:0:"";}', 'xyasas'),
(15, 30, 'a:1:{i:0;s:1:"3";}', 'a:1:{i:0;s:4:"med1";}', 'a:1:{i:0;s:1:"2";}', 'a:1:{i:0;s:1:"1";}', 'good'),
(16, 31, 'a:1:{i:0;s:1:"3";}', 'a:1:{i:0;s:4:"med1";}', 'a:1:{i:0;s:1:"2";}', 'a:1:{i:0;s:1:"1";}', 'good'),
(17, 32, 'a:1:{i:0;s:1:"7";}', 'a:1:{i:0;s:4:"mnop";}', 'a:1:{i:0;s:1:"2";}', 'a:1:{i:0;s:1:"2";}', 'good'),
(18, 33, 'a:1:{i:0;s:1:"7";}', 'a:1:{i:0;s:5:"mnop1";}', 'a:1:{i:0;s:1:"2";}', 'a:1:{i:0;s:1:"2";}', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `sub_type` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `color` varchar(20) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `branch_id`, `name`, `product_type`, `sub_type`, `image`, `color`, `cost`, `quantity`) VALUES
(2, 1, 'Clear d', 'Contact Lens', 'Disposable', 'disposable.jpg', 'FFFFFF', 200.00, 100),
(3, 1, 'Clear T', 'Contact Lens', 'Toric', 'toric.jpg', 'FFFFFF', 200.00, 100),
(4, 1, 'KRT', 'Lens', 'Kryptok', 'kryptok1.jpg', 'FFFFFF', 400.00, 100),
(5, 1, 'SV', 'Lens', 'Single Vision', 'Glass_Single_Vision.jpg', 'FCFFF0', 100.00, 100),
(6, 1, 'D B', 'Lens', 'D Bifocal', 'Glass_Bifocal_Lens.jpg', 'FCFFF7', 500.00, 150),
(7, 1, 'Ful ', 'Frames', 'Full', 'full.jpg', '1249FF', 800.00, 150),
(8, 1, 'SF', 'Frames', 'Supra', 'supra.JPG', 'A18348', 750.00, 150),
(9, 1, 'RF', 'Frames', 'Rimless', 'rimless.jpg', 'FFDB78', 950.00, 100),
(10, 2, 'KRPT', 'Lens', 'Kryptok', 'kryptok.jpg', 'FAFFFB', 600.00, 190),
(11, 2, 'SVL', 'Lens', 'Single Vision', 'Single_vision.jpg', 'FBFFF5', 800.00, 100),
(12, 2, 'DBF', 'Lens', 'D Bifocal', 'bifocal.jpg', 'FFFFFA', 800.00, 100),
(13, 2, 'FF', 'Frames', 'Full', 'full.jpg', 'FF3D0D', 800.00, 100),
(14, 2, 'SF', 'Frames', 'Supra', 'supra.jpg', 'F0D946', 950.00, 150),
(15, 1, 'tttt', 'Lens', 'Kryptok', '78_t108c2-Titanium-glasses-frames.jpg', '66FF00', 123.00, 6);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(10) NOT NULL AUTO_INCREMENT,
  `app_id` int(10) NOT NULL,
  `sph` varchar(100) NOT NULL,
  `cyl` varchar(100) NOT NULL,
  `axis` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `specs_req` varchar(10) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `app_id`, `sph`, `cyl`, `axis`, `remarks`, `specs_req`) VALUES
(10, 2, 'a:2:{i:0;s:4:"1.50";i:1;s:4:"1.20";}', 'a:2:{i:0;s:4:"1.10";i:1;s:4:"1.20";}', 'a:2:{i:0;s:2:"90";i:1;s:2:"90";}', 'sfef', 'Yes'),
(11, 3, 'a:2:{i:0;s:4:"1.50";i:1;s:4:"1.20";}', 'a:2:{i:0;s:4:"1.10";i:1;s:4:"1.20";}', 'a:2:{i:0;s:2:"90";i:1;s:2:"90";}', 'good', 'No'),
(12, 0, 'a:2:{i:0;s:0:"";i:1;s:0:"";}', 'a:2:{i:0;s:0:"";i:1;s:0:"";}', 'a:2:{i:0;s:0:"";i:1;s:0:"";}', 'good', 'Yes'),
(13, 4, 'a:2:{i:0;s:4:"1.50";i:1;s:4:"1.20";}', 'a:2:{i:0;s:4:"1.10";i:1;s:4:"1.20";}', 'a:2:{i:0;s:2:"90";i:1;s:2:"90";}', 'good', 'No'),
(14, 4, 'a:2:{i:0;s:4:"1.50";i:1;s:4:"1.20";}', 'a:2:{i:0;s:4:"1.10";i:1;s:4:"1.20";}', 'a:2:{i:0;s:2:"90";i:1;s:2:"90";}', 'good', 'No'),
(15, 5, 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'good', 'Yes'),
(16, 0, 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'good', 'Yes'),
(17, 6, 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'good', 'Yes'),
(18, 4, 'a:2:{i:0;s:0:"";i:1;s:0:"";}', 'a:2:{i:0;s:0:"";i:1;s:0:"";}', 'a:2:{i:0;s:0:"";i:1;s:0:"";}', 'good', 'Yes'),
(19, 4, 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:2:"10";i:1;s:2:"10";}', 'good', 'Yes'),
(20, 8, 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'good', 'Yes'),
(21, 9, 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'good', 'Yes'),
(22, 10, 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'a:2:{i:0;s:3:"1.0";i:1;s:3:"1.0";}', 'good', 'Yes'),
(23, 15, 'a:2:{i:0;s:2:"10";i:1;s:2:"20";}', 'a:2:{i:0;s:2:"23";i:1;s:2:"41";}', 'a:2:{i:0;s:2:"50";i:1;s:2:"25";}', 'abcd xyyz', 'Yes'),
(24, 11, 'a:2:{i:0;s:2:"10";i:1;s:2:"20";}', 'a:2:{i:0;s:2:"23";i:1;s:2:"41";}', 'a:2:{i:0;s:2:"50";i:1;s:2:"25";}', 'rfewtr', 'No'),
(25, 3, 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'aaa', 'Yes'),
(26, 14, 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', ' Lens', 'Yes'),
(27, 13, 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'lens needed', 'No'),
(28, 25, 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'good', 'Yes'),
(29, 26, 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'No', 'Yes'),
(30, 24, 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'Not', 'Yes'),
(31, 18, 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'good', 'Yes'),
(32, 23, 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'Good', 'Yes'),
(33, 20, 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'good', 'Yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

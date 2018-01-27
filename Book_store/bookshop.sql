-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 07:56 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO author('james');
insert into author values('2','STEPHEN KING');
insert into author values('3','J-K-ROWLING');
insert into author values('4','DR.SEUSS');
insert into author values('5','MAYA ANGELOUS');


-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `authID` int(11) NOT NULL,
  `pubID` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `date_of_pub` date DEFAULT NULL,
  `book_img` varchar(50) DEFAULT NULL,
  `ISBN` varchar(7) DEFAULT NULL,
  `genID` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `authID`, `pubID`, `title`, `price`, `date_of_pub`, `book_img`, `ISBN`, `genID`) VALUES
(6, 2, 2, 'ANDROID', '15.00', '2017-04-04', 'book1.png', '111', 2),
(1, 1, 1, 'The Way to North', '10.00', '2017-02-01', 'book1.png', '101', 1),
(2, 2, 2, 'The Way North', '10.50', '2006-10-11', 'book2.jpg', '102', 1),
(3, 3, 3, 'The Way North and West', '11.50', '2017-10-05', 'book3.jpg', '103', 2),
(4, 2, 2, 'The way to East', '12.00', '2017-02-27', 'book4.jpg', '104', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_track`
--

CREATE TABLE IF NOT EXISTS `cart_track` (
  `bid` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_added` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `session_id` varchar(150) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `cart_track`
--

INSERT INTO `cart_track` (`bid`, `cart_id`, `date_added`, `qty`, `session_id`) VALUES
(2, 3, '2017-02-02', 1, 'rdrkm835a1eetin02c4jmb6j14'),
(1, 6, '2017-02-02', 1, '4fill3mqqnp1ham87tcnidgkv0'),
(1, 7, '2017-02-02', 1, 'rdrkm835a1eetin02c4jmb6j14'),
(1, 8, '2017-02-02', 1, 'hqv4uq7691oog7hc52b1b3qcu2'),
(1, 9, '2017-02-04', 1, 'nnembrapqq4u9lo5teb3gfu501'),
(3, 10, '2017-02-04', 1, 'nnembrapqq4u9lo5teb3gfu501'),
(1, 11, '2017-02-04', 1, 'nnembrapqq4u9lo5teb3gfu501'),
(3, 12, '2017-02-08', 1, 'k7mttevf0e743qbq9dahq41ds7'),
(1, 13, '2017-02-09', 1, 'mfrr1g996eb465hve22a4bvc44'),
(1, 15, '2017-02-09', 1, 'mfrr1g996eb465hve22a4bvc44'),
(1, 16, '2017-02-10', 1, 'kr36opikr1icqn95rgnjhkdbe3'),
(1, 17, '2017-02-10', 1, 'kr36opikr1icqn95rgnjhkdbe3'),
(4, 18, '2017-02-10', 1, 'kr36opikr1icqn95rgnjhkdbe3'),
(1, 19, '2017-02-11', 1, '6oojh2qf8p8s1njn8pdf208sr7'),
(1, 20, '2017-02-13', 1, 'ime92n4p860bj4usb2pk1a2nt7');

-- --------------------------------------------------------

--
-- Table structure for table `genres`  categiory
--

CREATE TABLE IF NOT EXISTS `genres` (
  `gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `gen_name` varchar(100) NOT NULL,
  `descri` varchar(40) NOT NULL,
  PRIMARY KEY (`gen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`gen_id`, `title`, `gen_name`, `descri`) VALUES
(1, 'Get the latest Comedy books he', 'Comedy', 'Simple shopping CART system'),
(2, 'The latest and best novels in ', 'Fiction', 'Simple shopping CART system'),
(3, 'Books for all Educational Disc', 'Education', 'Simple shopping CART system'),
(4, 'Get all the best thrillers her', 'Thriller', 'Simple shopping CART system');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_address` varchar(30) NOT NULL,
  `order_date` varchar(40) NOT NULL,
  `order_name` varchar(40) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `order_total` int(11) NOT NULL,
  `purchase_order` varchar(40) NOT NULL,
  `session` varchar(100) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_address`, `order_date`, `order_name`, `order_status`, `order_total`, `purchase_order`, `session`, `shipping_cost`) VALUES
(1, 'cc', '2017-02-01', 'aa', 'Cancelled', 20, '068910', '8l3gu8il107jvf6f7t2s7k99d7', 20),
(2, '', '2017-02-01', '', 'pending', 30, '02418', '8l3gu8il107jvf6f7t2s7k99d7', 20),
(3, 'ddd', '2017-02-02', 'aaaa', 'Cancelled', 11, '06794', 'rdrkm835a1eetin02c4jmb6j14', 20),
(4, 'kkkk', '2017-02-04', 'aaa', 'pending', 22, '010953', 'nnembrapqq4u9lo5teb3gfu501', 20),
(5, 'ggg', '2017-02-09', 'aaa', 'pending', 10, '081043', 'mfrr1g996eb465hve22a4bvc44', 20);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `pub_id` int(11) NOT NULL AUTO_INCREMENT,
  `pub_name` varchar(50) DEFAULT NULL,
  `pub_address` text,
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

insert into publisher values ('1','mcgril','ca');
insert into publisher values ('2','IBM','NEWYORK');
insert into publisher values ('3','SCHAND','JERESY');
insert into publisher values ('4','mcgril','ca');
insert into publisher values ('5','OXFORD UNIVERSITY PRESS','LONDON');
insert into publisher values ('6','SCTOLAND','KADOKAWA PUBLISHING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `username`, `password`, `usertype`, `email`, `gender`, `address`) VALUES
(10, 'aaa', 'bbb', 'admin', 'admin', 'admin', 'admin@gmail.com', 'male', 'hyd');

INSERT INTO `users` (`id`, `lastname`, `firstname`, `username`, `password`, `usertype`, `email`, `gender`, `address`) VALUES
(11, 'aa', 'bb', 'admin', 'admin', 'employee', 'admin@gmail.com', 'male', 'hyd');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

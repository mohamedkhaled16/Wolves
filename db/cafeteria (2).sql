-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2016 at 01:49 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(12) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'cold'),
(2, 'hot');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `room_number` int(12) DEFAULT NULL,
  `status` enum('processing','done','cancled','delivered') DEFAULT NULL,
  `nodes` text NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `room_id` (`room_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `room_number`, `status`, `nodes`) VALUES
(1, 2, '2016-02-13 01:42:10', 44, 'processing', 'rrrrr'),
(2, 2, '2016-02-13 01:42:27', 22, 'processing', ',ss,'),
(3, 2, '2016-02-13 01:42:27', 22, 'processing', ',ss,'),
(4, 2, '2016-02-13 01:43:50', 44, 'processing', 'jkl'),
(5, 2, '2016-02-13 01:44:31', 44, 'processing', 'e'),
(6, 2, '2016-02-13 01:44:38', 44, 'processing', 'e'),
(7, 2, '2016-02-13 01:44:40', 44, 'processing', 'e'),
(8, 2, '2016-02-13 01:45:43', 111, 'processing', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE IF NOT EXISTS `orders_details` (
  `order_id_details` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `product_id` int(12) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `product_count` int(12) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  PRIMARY KEY (`order_id_details`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`order_id_details`, `user_id`, `product_id`, `order_id`, `product_count`, `product_price`) VALUES
(1, 2, 7, 1, 1, 10),
(2, 2, 8, 1, 3, 10),
(3, 2, 4, 2, 1, 10),
(4, 2, 3, 2, 2, 10),
(5, 2, 7, 2, 2, 10),
(6, 2, 4, 3, 1, 10),
(7, 2, 3, 3, 2, 10),
(8, 2, 7, 3, 2, 10),
(9, 2, 4, 4, 1, 10),
(10, 2, 3, 4, 3, 10),
(11, 2, 8, 5, 1, 10),
(12, 2, 8, 6, 1, 10),
(13, 2, 8, 7, 1, 10),
(14, 2, 5, 8, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(12) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `category_id` int(12) DEFAULT NULL,
  `status` enum('available','unavailable') DEFAULT NULL,
  `display` enum('yes','no') DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `category_id`, `status`, `display`, `image`) VALUES
(3, 'tea', 10, 1, 'available', 'yes', '1.png'),
(4, 'nescafa', 10, 1, 'available', 'yes', '2.png'),
(5, 'nescafa black', 10, 1, 'available', 'yes', '3.png'),
(6, 'orage', 10, 1, 'available', 'yes', '4.png'),
(7, 'banana ', 10, 2, 'available', 'yes', '5.png'),
(8, 'lemon', 10, 1, 'available', 'yes', '6.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `room_no` int(12) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `user_type` varchar(200) NOT NULL,
  `ext` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `room_no`, `image`, `user_type`, `ext`) VALUES
(1, 'admin', 'admin@admin.com', '8ca6342915ac81dd2d3eec49e2098db9', 111, '14550454492.jpg', 'admin', '11'),
(2, 'assmaa', 'assmaa@hh.com', '8ca6342915ac81dd2d3eec49e2098db9', 44, '14550454492.jpg', 'user', '44'),
(3, 'reham', 'demo@unweb.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 22, '14550454492.jpg', 'user', '22');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

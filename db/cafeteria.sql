-- phpMyAdmin SQL Dump
-- version 4.4.15.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2016 at 06:37 AM
-- Server version: 5.5.44-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(12) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `order_id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `date_send` datetime NOT NULL,
  `room_number` int(12) DEFAULT NULL,
  `status` enum('processing','done','cancled','delivered') DEFAULT NULL,
  `nodes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `date_send`, `room_number`, `status`, `nodes`) VALUES
(1, 2, '2016-02-13 01:42:10', '0000-00-00 00:00:00', 44, 'processing', 'rrrrr'),
(2, 2, '2016-02-13 01:42:27', '0000-00-00 00:00:00', 22, 'processing', ',ss,'),
(3, 2, '2016-02-13 01:42:27', '0000-00-00 00:00:00', 22, 'processing', ',ss,'),
(4, 2, '2016-02-13 01:43:50', '0000-00-00 00:00:00', 44, 'processing', 'jkl'),
(5, 2, '2016-02-13 01:44:31', '0000-00-00 00:00:00', 44, 'processing', 'e'),
(6, 2, '2016-02-13 01:44:38', '0000-00-00 00:00:00', 44, 'processing', 'e'),
(7, 2, '2016-02-13 01:44:40', '0000-00-00 00:00:00', 44, 'processing', 'e'),
(8, 2, '2016-02-13 01:45:43', '0000-00-00 00:00:00', 111, 'processing', 'f'),
(9, 2, '2016-02-13 08:50:49', '2016-02-15 02:59:55', 111, 'delivered', 'reham'),
(10, 2, '2016-02-13 06:51:27', '2016-02-15 02:12:43', 111, 'delivered', 'Ø¨Ø¨Ø¨Ø¨Ø¨Ø¨'),
(12, 2, '2016-02-13 07:22:05', '2016-02-15 02:12:43', 111, 'delivered', 'gggggg'),
(13, 2, '2016-02-15 03:23:35', '0000-00-00 00:00:00', 111, 'processing', 'ss,sm'),
(14, 2, '2016-02-15 03:25:33', '0000-00-00 00:00:00', 111, 'processing', 'll;'),
(15, 2, '2016-02-15 03:26:00', '0000-00-00 00:00:00', 111, 'processing', 'lkl'),
(16, 2, '2016-02-15 03:26:52', '0000-00-00 00:00:00', 111, 'processing', 's'),
(17, 2, '2016-02-15 03:38:32', '0000-00-00 00:00:00', 44, 'processing', ''';''k'),
(18, 2, '2016-02-15 03:43:24', '0000-00-00 00:00:00', 111, 'processing', 'lkl;k;l'),
(19, 2, '2016-02-15 03:48:10', '0000-00-00 00:00:00', 111, 'processing', 'ccccccc'),
(20, 2, '2016-02-15 04:02:48', '0000-00-00 00:00:00', 111, 'processing', 'ccccccc'),
(21, 2, '2016-02-15 04:07:55', '0000-00-00 00:00:00', 44, 'processing', 'l'';'),
(22, 2, '2016-02-15 04:10:32', '0000-00-00 00:00:00', 111, 'processing', ';l'';'),
(23, 2, '2016-02-15 04:12:59', '0000-00-00 00:00:00', 44, 'processing', ';l'';l'''),
(24, 2, '2016-02-15 04:14:03', '0000-00-00 00:00:00', 44, 'processing', 'kjkljlk'),
(25, 2, '2016-02-15 04:15:38', '0000-00-00 00:00:00', 44, 'processing', 'kjkljlk'),
(26, 2, '2016-02-15 04:18:29', '0000-00-00 00:00:00', 44, 'processing', 'oo'),
(27, 2, '2016-02-15 04:20:24', '0000-00-00 00:00:00', 44, 'processing', 'oo'),
(28, 2, '2016-02-15 04:20:58', '0000-00-00 00:00:00', 44, 'processing', 'ccccccc'),
(29, 2, '2016-02-15 04:22:00', '0000-00-00 00:00:00', 44, 'processing', 'ccccccc'),
(30, 2, '2016-02-15 04:23:03', '0000-00-00 00:00:00', 44, 'processing', 'ccccccc'),
(31, 2, '2016-02-15 04:24:46', '0000-00-00 00:00:00', 44, 'processing', 'ccccccc'),
(32, 2, '2016-02-15 04:27:44', '0000-00-00 00:00:00', 44, 'processing', 'ffff'),
(33, 2, '2016-02-15 04:28:22', '0000-00-00 00:00:00', 44, 'processing', 'ffff'),
(34, 2, '2016-02-15 04:31:40', '0000-00-00 00:00:00', 111, 'processing', 'dddd'),
(35, 2, '2016-02-15 04:33:33', '0000-00-00 00:00:00', 111, 'processing', 'tttttttttt'),
(36, 2, '2016-02-15 04:36:11', '0000-00-00 00:00:00', 44, 'processing', ';k;k'),
(37, 2, '2016-02-15 04:38:26', '0000-00-00 00:00:00', 44, 'processing', ';k;k'),
(38, 2, '2016-02-15 04:39:29', '0000-00-00 00:00:00', 44, 'processing', ';k;k'),
(39, 2, '2016-02-15 04:44:56', '0000-00-00 00:00:00', 111, 'processing', 'ffff'),
(40, 2, '2016-02-15 04:45:40', '0000-00-00 00:00:00', 111, 'processing', 'ffff'),
(41, 2, '2016-02-15 04:47:22', '0000-00-00 00:00:00', 111, 'processing', 'dddddddd'),
(42, 2, '2016-02-15 03:30:30', '0000-00-00 00:00:00', 44, 'processing', ';ks'''),
(43, 2, '2016-02-15 03:32:46', '0000-00-00 00:00:00', 44, 'processing', ';ks'''),
(44, 2, '2016-02-15 03:46:20', '0000-00-00 00:00:00', 44, 'processing', ';kskjlkjl'),
(45, 2, '2016-02-15 04:19:16', '0000-00-00 00:00:00', 111, 'processing', 'ieuyqiu'),
(46, 2, '2016-02-15 04:21:19', '0000-00-00 00:00:00', 22, 'processing', 'hhhhh'),
(47, 2, '2016-02-15 04:24:21', '0000-00-00 00:00:00', 44, 'processing', 'uihiouhj'),
(48, 2, '2016-02-15 04:34:27', '0000-00-00 00:00:00', 22, 'processing', 'kwl;jqlk'),
(49, 2, '2016-02-15 04:39:02', '0000-00-00 00:00:00', 22, 'processing', 'kwl;jqlk'),
(50, 2, '2016-02-15 04:41:01', '0000-00-00 00:00:00', 22, 'processing', 'kwl;jqlk'),
(51, 2, '2016-02-15 04:42:22', '0000-00-00 00:00:00', 22, 'processing', 'kwlekl;t'),
(52, 2, '2016-02-15 04:44:45', '0000-00-00 00:00:00', 111, 'processing', 'wenabi'),
(53, 2, '2016-02-15 04:46:54', '0000-00-00 00:00:00', 44, 'processing', 'at'),
(54, 2, '2016-02-15 04:48:00', '0000-00-00 00:00:00', 111, 'processing', 'final test'),
(55, 2, '2016-02-15 04:48:41', '2016-02-16 06:23:03', 22, 'delivered', 'weqweq');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE IF NOT EXISTS `orders_details` (
  `order_id_details` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `product_id` int(12) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `product_count` int(12) DEFAULT NULL,
  `product_price` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

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
(14, 2, 5, 8, 1, 10),
(15, 2, 3, 9, 1, 10),
(16, 2, 4, 9, 1, 10),
(17, 2, 3, 10, 10, 10),
(18, 2, 4, 10, 3, 10),
(19, 2, 6, 10, 1, 10),
(20, 2, 4, 12, 1, 10),
(21, 2, 8, 12, 3, 10),
(22, 2, 4, 13, 1, 10),
(23, 2, 8, 13, 1, 10),
(24, 2, 8, 14, 3, 10),
(25, 2, 5, 14, 1, 10),
(26, 2, 4, 15, 1, 10),
(27, 2, 6, 15, 1, 10),
(28, 2, 3, 16, 1, 10),
(29, 2, 6, 17, 1, 10),
(30, 2, 5, 18, 3, 10),
(31, 2, 3, 19, 1, 10),
(32, 2, 6, 19, 1, 10),
(33, 2, 5, 20, 1, 10),
(34, 2, 4, 21, 1, 10),
(35, 2, 3, 22, 1, 10),
(36, 2, 4, 23, 1, 10),
(37, 2, 6, 24, 1, 10),
(38, 2, 3, 25, 1, 10),
(39, 2, 4, 26, 1, 10),
(40, 2, 3, 27, 1, 10),
(41, 2, 4, 28, 1, 10),
(42, 2, 3, 29, 1, 10),
(43, 2, 4, 30, 1, 10),
(44, 2, 5, 31, 1, 10),
(45, 2, 3, 32, 1, 10),
(46, 2, 4, 33, 1, 10),
(47, 2, 4, 34, 2, 10),
(48, 2, 3, 35, 1, 10),
(49, 2, 3, 36, 1, 10),
(50, 2, 3, 37, 1, 10),
(51, 2, 4, 38, 1, 10),
(52, 2, 3, 39, 1, 10),
(53, 2, 4, 40, 1, 10),
(54, 2, 5, 40, 1, 10),
(55, 2, 3, 41, 1, 10),
(56, 2, 4, 42, 1, 10),
(57, 2, 5, 43, 1, 10),
(58, 2, 5, 44, 1, 10),
(59, 2, 6, 45, 1, 10),
(60, 2, 3, 45, 1, 10),
(61, 2, 8, 46, 1, 10),
(62, 2, 7, 46, 1, 10),
(63, 2, 8, 47, 3, 10),
(64, 2, 7, 47, 1, 10),
(65, 2, 4, 48, 1, 10),
(66, 2, 6, 48, 1, 10),
(67, 2, 8, 49, 1, 10),
(68, 2, 4, 50, 1, 10),
(69, 2, 6, 51, 1, 10),
(70, 2, 5, 52, 1, 10),
(71, 2, 4, 53, 4, 10),
(72, 2, 8, 53, 3, 10),
(73, 2, 7, 53, 1, 10),
(74, 2, 5, 53, 3, 10),
(75, 2, 7, 54, 1, 10),
(76, 2, 8, 54, 1, 10),
(77, 2, 4, 54, 2, 10),
(78, 2, 5, 54, 1, 10),
(79, 2, 6, 54, 1, 10),
(80, 2, 7, 55, 6, 10),
(81, 2, 6, 55, 1, 10),
(82, 2, 8, 55, 9, 10),
(83, 2, 4, 55, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(12) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `category_id` int(12) DEFAULT NULL,
  `status` enum('available','unavailable') DEFAULT NULL,
  `display` enum('yes','no') DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `category_id`, `status`, `display`, `image`) VALUES
(3, 'tea', 10, 1, 'unavailable', 'yes', '1.png'),
(4, 'nescafa', 10, 1, 'available', 'yes', '2.png'),
(5, 'nescafa black', 10, 1, 'available', 'yes', '3.png'),
(6, 'orage', 10, 1, 'available', 'yes', '4.png'),
(7, 'banana ', 10, 2, 'available', 'yes', '5.png'),
(8, 'lemon', 10, 1, 'available', 'yes', '6.png'),
(9, 'jdwohk', 22, 1, 'unavailable', 'yes', '/var/www/html/wolves2/ajax/../uploads/1455346743Screenshot from 2016-02-10 15:04:22.png'),
(12, 'jdwohk', 22, 1, 'unavailable', 'yes', '1455347123Screenshot from 2016-02-10 15:04:22.png'),
(14, 'jdwohk', 22, 1, 'unavailable', 'yes', '1455347271Screenshot from 2016-02-12 17:56:19.png'),
(15, 'jshggfh', 22, 1, 'unavailable', 'yes', '145535198911.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(12) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `room_no` int(12) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `user_type` varchar(200) NOT NULL,
  `ext` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `room_no`, `image`, `user_type`, `ext`, `status`) VALUES
(1, 'admin', 'admin@admin.com', '8ca6342915ac81dd2d3eec49e2098db9', 111, '14550454492.jpg', 'admin', '11', 'active'),
(2, 'assmaa', 'assmaa@hh.com', '8ca6342915ac81dd2d3eec49e2098db9', 44, '14550454492.jpg', 'user', '44', 'active'),
(3, 'reham', 'demo@unweb.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 22, '14550454492.jpg', 'user', '22', 'active'),
(4, 'Mohamed Khaled', 'mohamedk@mk.com', '8ca6342915ac81dd2d3eec49e2098db9', 123, '1455604389iii.jpg', 'user', '123', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `room_id` (`room_number`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`order_id_details`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `order_id_details` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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

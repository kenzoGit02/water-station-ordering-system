-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 01:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waterstation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_form`
--

CREATE TABLE `admin_form` (
  `admin_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_form`
--

INSERT INTO `admin_form` (`admin_id`, `name`, `email`, `password`) VALUES
(8, 'admin', 'admin@email.com', '1a1dc91c907325c69271ddf0c944bc72');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notification`
--

CREATE TABLE `admin_notification` (
  `adnotif_id` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 0,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_date`
--

CREATE TABLE `maintenance_date` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance_date`
--

INSERT INTO `maintenance_date` (`id`, `date`) VALUES
(2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `message` varchar(535) NOT NULL,
  `read` tinyint(255) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `user_id`, `header`, `message`, `read`, `date`, `time`) VALUES
(8, 11, 'Order Delivered', 'Your refill order of 3 jug(s) for ₱90 is delivered', 1, '2023-05-04', '2:12PM'),
(9, 11, 'Order Delivered', 'Your refill order of 2 jug(s) for ₱60 is delivered', 1, '2023-05-04', '4:05PM'),
(10, 11, 'Order Delivered', 'Your refill order of 2 jug(s) for ₱60 is delivered', 1, '2023-05-04', '4:13PM'),
(11, 11, 'Order Delivered', 'Your refill order of 2 jug(s) for ₱60 is delivered', 1, '2023-05-04', '4:19PM'),
(12, 11, 'Order Delivered', 'Your refill order of 3 jug(s) for ₱90 is delivered', 1, '2023-05-04', '4:22PM'),
(13, 11, 'Order Delivered', 'Your refill order of 3 jug(s) for ₱90 is delivered', 1, '2023-05-04', '4:24PM'),
(14, 11, 'Order Delivered', 'Your refill order of 2 jug(s) for ₱60 is delivered', 1, '2023-05-04', '4:28PM'),
(15, 0, 'Order Delivered', 'Your  order of  piece(s) for ₱ is delivered', 0, '2023-05-04', '5:15PM'),
(16, 0, 'Order Delivered', 'Your  order of  piece(s) for ₱ is delivered', 0, '2023-05-04', '5:22PM'),
(17, 11, 'Order Delivered', 'Your Slim Water Container order of 2 piece(s) for ₱300 is delivered', 1, '2023-05-04', '5:51PM'),
(18, 11, 'Order Delivered', 'Your Round Water Container order of 1 piece(s) for ₱170 is delivered', 1, '2023-05-04', '5:52PM'),
(19, 11, 'Order Delivered', 'Your Refill order of 2 piece(s) for ₱60 is delivered', 1, '2023-05-04', '5:52PM');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `quantity` int(255) DEFAULT NULL,
  `date_ordered` date NOT NULL DEFAULT current_timestamp(),
  `date_delivered` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `user_id`, `order`, `quantity`, `date_ordered`, `date_delivered`, `status`, `price`) VALUES
(100, 10, 'Refill', 1, '2023-04-01', '2023-04-02', 'completed', 30),
(101, 10, 'Refill', 1, '2023-04-01', '2023-04-03', 'completed', 30),
(102, 10, 'Refill', 1, '2023-04-01', '2023-04-04', 'completed', 30),
(103, 10, 'Refill', 1, '2023-04-05', '2023-04-05', 'completed', 30),
(104, 10, 'Refill', 1, '2023-04-06', '2023-04-06', 'completed', 30),
(105, 10, 'Refill', 1, '2023-04-07', '2023-04-07', 'completed', 30),
(106, 10, 'Refill', 1, '2023-04-08', '2023-04-08', 'completed', 30),
(107, 10, 'Refill', 1, '2023-04-09', '2023-04-09', 'completed', 30),
(108, 10, 'Refill', 1, '2023-04-10', '2023-04-10', 'completed', 30),
(109, 10, 'Refill', 1, '2023-04-11', '2023-04-11', 'completed', 30),
(110, 10, 'Round Water Container', 2, '2023-05-03', '2023-05-03', 'completed', 340),
(111, 10, 'Slim Water Container', 2, '2023-05-03', '2023-05-03', 'completed', 300),
(112, 10, 'Round Water Container', 2, '2023-04-01', '2023-04-02', 'completed', 340),
(113, 10, 'Round Water Container', 2, '2023-04-03', '2023-04-03', 'completed', 340),
(114, 10, 'Round Water Container', 2, '2023-04-04', '2023-04-04', 'completed', 340),
(115, 10, 'Round Water Container', 2, '2023-04-05', '2023-04-05', 'completed', 340),
(116, 10, 'Round Water Container', 2, '2023-04-06', '2023-04-06', 'completed', 340),
(117, 10, 'Round Water Container', 2, '2023-04-07', '2023-04-07', 'completed', 340),
(118, 10, 'Slim Water Container', 2, '2023-04-08', '2023-04-08', 'completed', 300),
(119, 10, 'Slim Water Container', 2, '2023-04-09', '2023-04-09', 'completed', 300),
(120, 10, 'Slim Water Container', 2, '2023-04-10', '2023-04-10', 'completed', 300),
(121, 10, 'Slim Water Container', 2, '2023-04-11', '2023-04-11', 'completed', 300),
(122, 10, 'Slim Water Container', 2, '2023-04-12', '2023-04-12', 'completed', 300),
(123, 10, 'Slim Water Container', 2, '2023-04-13', '2023-04-13', 'completed', 300),
(124, 10, 'Slim Water Container', 2, '2023-04-14', '2023-04-14', 'completed', 300),
(125, 10, 'Refill', 1, '2023-05-04', '2023-05-04', 'completed', 30),
(126, 10, 'Refill', 3, '2023-05-04', '2023-05-04', 'completed', 90),
(127, 11, 'Refill', 1, '2023-05-04', '2023-05-04', 'completed', 30),
(128, 11, 'Refill', 1, '2023-05-04', '2023-05-04', 'completed', 30),
(129, 11, 'Refill', 2, '2023-05-04', '2023-05-04', 'completed', 60),
(130, 11, 'Refill', 1, '2023-05-04', '2023-05-04', 'completed', 30),
(131, 11, 'Refill', 2, '2023-05-04', '2023-05-04', 'completed', 60),
(132, 11, 'Refill', 3, '2023-05-04', '2023-05-04', 'completed', 90),
(133, 11, 'Refill', 1, '2023-05-04', '2023-05-04', 'completed', 30),
(134, 11, 'Refill', 1, '2023-05-04', '2023-05-04', 'completed', 30),
(135, 11, 'Refill', 3, '2023-05-04', '2023-05-04', 'completed', 90),
(136, 11, 'Refill', 3, '2023-05-04', '2023-05-04', 'completed', 90),
(137, 11, 'Refill', 2, '2023-05-04', '2023-05-04', 'completed', 60),
(138, 11, 'Refill', 2, '2023-05-04', '2023-05-04', 'completed', 60),
(139, 11, 'Refill', 2, '2023-05-04', '2023-05-04', 'completed', 60),
(140, 11, 'Refill', 3, '2023-05-04', '2023-05-04', 'completed', 90),
(141, 11, 'Refill', 3, '2023-05-04', '2023-05-04', 'completed', 90),
(142, 11, 'Refill', 2, '2023-05-04', '2023-05-04', 'completed', 60),
(143, 11, 'Refill', 2, '2023-05-04', '2023-05-04', 'completed', 60),
(144, 11, 'Slim Water Container', 2, '2023-05-04', '2023-05-04', 'completed', 300),
(145, 11, 'Round Water Container', 1, '2023-05-04', '2023-05-04', 'completed', 170);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `name`, `email`, `password`, `address`) VALUES
(8, 'lf', 'lf@email.com', '1a1dc91c907325c69271ddf0c944bc72', '711-2880 Nulla St. Mankato Mississippi 96522 (257) 563-7401'),
(9, 'edward', 'edward@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'Contoso Ltd 215 E Tasman Dr Po Box 65502 CA 95134 San Jose'),
(10, 'Rivas', 'dummyken@email.com', '9470e3dc8fb6c40b268a1dd6e6464ef4', 'P.O. Box 283 8562 Fusce'),
(11, 'dummy2', 'dummy2@email.com', '1a1dc91c907325c69271ddf0c944bc72', '606-3727 Ullamcorper. Street Roseville NH 11523 (786) 713-8616'),
(12, 'Kenzo', 'kenzo@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'Street Barangay City');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_form`
--
ALTER TABLE `admin_form`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_notification`
--
ALTER TABLE `admin_notification`
  ADD PRIMARY KEY (`adnotif_id`);

--
-- Indexes for table `maintenance_date`
--
ALTER TABLE `maintenance_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_form`
--
ALTER TABLE `admin_form`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_notification`
--
ALTER TABLE `admin_notification`
  MODIFY `adnotif_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_date`
--
ALTER TABLE `maintenance_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

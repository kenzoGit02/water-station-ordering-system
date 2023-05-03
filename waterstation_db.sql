-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 07:42 AM
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
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_form`
--

INSERT INTO `admin_form` (`admin_id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'fritz', 'fritzyy123456@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'admin'),
(2, 'fritz', 'fritzyy@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'admin'),
(3, 'kenzo', 'rivas@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(6, 'as', 'as@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'admin'),
(7, 'qwe', 'qwe@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'admin'),
(8, 'op', 'op@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'admin');

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
(2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `message` varchar(535) NOT NULL,
  `status` tinyint(255) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `quantity` int(255) DEFAULT NULL,
  `date_ordered` varchar(255) NOT NULL,
  `date_delivered` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `user_id`, `order`, `quantity`, `date_ordered`, `date_delivered`, `status`, `price`) VALUES
(56, 10, 'Refill', 1, 'March 21 2023', 'March 21 2023', 'completed', 50),
(57, 10, 'Slim Water Container', 3, 'April 12 2023', 'April 12 2023', 'completed', 450),
(58, 10, 'Round Water Container', 1, 'April 12 2023', NULL, 'cancelled', 170),
(59, 10, 'Round Water Container', 1, 'April 16 2023', NULL, 'cancelled', 170),
(60, 10, 'Refill', 3, 'April 16 2023', NULL, 'cancelled', 150),
(61, 10, 'Round Water Container', 1, 'April 16 2023', NULL, 'cancelled', 170),
(62, 10, 'Slim Water Container', 1, 'April 16 2023', NULL, 'cancelled', 150),
(63, 10, 'Refill', 1, 'April 16 2023', NULL, 'cancelled', 50),
(64, 10, 'Slim Water Container', 3, 'April 16 2023', NULL, 'cancelled', 450),
(65, 10, 'Round Water Container', 3, 'April 16 2023', NULL, 'cancelled', 510),
(66, 10, 'Round Water Container', 1, 'April 27 2023', NULL, 'cancelled', 170),
(67, 10, 'Round Water Container', 2, 'April 27 2023', NULL, 'cancelled', 340),
(68, 10, 'Slim Water Container', 3, 'April 27 2023', NULL, 'cancelled', 450),
(69, 10, 'Slim Water Container', 3, 'April 27 2023', NULL, 'cancelled', 450),
(70, 10, 'Refill', 1, 'April 29 2023', NULL, 'cancelled', 50),
(71, 10, 'Refill', 1, 'April 29 2023', NULL, 'cancelled', 30),
(72, 10, 'Refill', 1, 'April 29 2023', NULL, 'cancelled', 30),
(73, 10, 'Refill', 1, 'April 29 2023', NULL, 'cancelled', 30),
(74, 10, 'Refill', 4, 'April 29 2023', NULL, 'cancelled', 120),
(75, 10, 'Round Water Container', 1, 'April 29 2023', NULL, 'cancelled', 170),
(76, 10, 'Round Water Container', 3, 'April 29 2023', NULL, 'cancelled', 510),
(77, 10, 'Round Water Container', 1, 'April 29 2023', NULL, 'cancelled', 170),
(78, 10, 'Refill', 3, 'April 29 2023', NULL, 'cancelled', 90),
(79, 10, 'Round Water Container', 2, 'April 30 2023', NULL, 'cancelled', 340),
(80, 10, 'Refill', 3, 'May 01 2023', NULL, 'cancelled', 90),
(81, 10, 'Round Water Container', 4, 'May 01 2023', 'May 01 2023', 'completed', 680),
(82, 10, 'Refill', 3, 'May 01 2023', 'May 01 2023', 'completed', 90),
(83, 10, 'Round Water Container', 2, 'May 01 2023', 'May 01 2023', 'completed', 340),
(84, 10, 'Refill', 1, 'May 01 2023', 'May 01 2023', 'completed', 30),
(85, 10, 'Round Water Container', 1, 'May 01 2023', 'May 01 2023', 'completed', 170),
(86, 10, 'Round Water Container', 2, 'May 02 2023', 'May 02 2023', 'completed', 340),
(87, 10, 'Round Water Container', 2, 'May 02 2023', NULL, 'cancelled', 340),
(88, 10, 'Slim Water Container', 3, 'May 02 2023', 'May 02 2023', 'completed', 450),
(89, 10, 'Round Water Container', 2, 'May 02 2023', NULL, 'cancelled', 340),
(90, 12, 'Refill', 2, 'May 02 2023', 'May 02 2023', 'completed', 60),
(91, 10, 'Refill', 2, 'May 03 2023', NULL, 'pending', 60);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `name`, `email`, `password`, `user_type`, `address`) VALUES
(8, 'lf', 'lf@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'user', '711-2880 Nulla St. Mankato Mississippi 96522 (257) 563-7401'),
(9, 'ed', 'ed@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'user', 'Contoso Ltd 215 E Tasman Dr Po Box 65502 CA 95134 San Jose'),
(10, 'space between', 'dummyken@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'user', 'P.O. Box 283 8562 Fusce'),
(11, 'dummy2', 'dummy2@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'user', '606-3727 Ullamcorper. Street Roseville NH 11523 (786) 713-8616'),
(12, 'Kenzo', 'kenzo@email.com', '1a1dc91c907325c69271ddf0c944bc72', 'user', 'Street Barangay City');

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
  MODIFY `notification_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 12:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `hall_name` varchar(220) NOT NULL,
  `event_begin` date NOT NULL,
  `event_end` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_name`, `phone_number`, `hall_name`, `event_begin`, `event_end`, `status`) VALUES
(187, 'Mahenge', '+255767131211', 'Chimwaga', '2024-09-11', '2024-09-02', 'Rejected'),
(188, 'Hassan', '+255655763131', 'mlimani', '2024-09-12', '2024-09-20', 'Accepted'),
(189, 'Hassan', '+255655763131', 'mlimani', '2024-09-26', '2024-09-28', ''),
(190, '', '', '', '0000-00-00', '0000-00-00', ''),
(191, '', '', '', '0000-00-00', '0000-00-00', ''),
(192, '', '', '', '0000-00-00', '0000-00-00', ''),
(193, '', '', '', '0000-00-00', '0000-00-00', ''),
(194, '', '', '', '0000-00-00', '0000-00-00', ''),
(195, '', '', '', '0000-00-00', '0000-00-00', ''),
(196, '', '', '', '0000-00-00', '0000-00-00', 'Rejected'),
(197, '', '', '', '0000-00-00', '0000-00-00', ''),
(198, '', '', '', '0000-00-00', '0000-00-00', ''),
(199, '', '', '', '0000-00-00', '0000-00-00', ''),
(200, '', '', '', '0000-00-00', '0000-00-00', ''),
(201, '', '', 'Chimwaga', '0000-00-00', '0000-00-00', ''),
(202, '', '', '', '0000-00-00', '0000-00-00', ''),
(203, '', '', '', '0000-00-00', '0000-00-00', ''),
(204, 'Mahenge', '+255767131211', 'Chimwaga', '2024-10-03', '2024-09-01', ''),
(205, 'Mahenge', '+255767131211', 'Chimwaga', '2024-10-25', '2024-09-01', ''),
(206, 'Mahenge', '+255767131211', 'Chimwaga', '2024-10-25', '2024-09-01', ''),
(207, '', '', '', '0000-00-00', '0000-00-00', ''),
(208, 'JOHN', '+255767131211', 'Chimwaga', '2024-09-30', '2024-09-01', ''),
(209, 'JOHN', '+255767131211', 'Chimwaga', '2024-09-30', '2024-09-01', ''),
(210, 'JOHN', '+255767131211', 'Chimwaga', '2024-09-30', '2024-09-01', ''),
(211, 'JOHN', '+255767131211', 'Chimwaga', '2024-09-30', '2024-09-01', ''),
(212, '', '', '', '0000-00-00', '0000-00-00', ''),
(213, '', '', '', '0000-00-00', '0000-00-00', ''),
(214, '', '', '', '0000-00-00', '0000-00-00', ''),
(215, '', '', '', '0000-00-00', '0000-00-00', ''),
(216, '', '', '', '0000-00-00', '0000-00-00', ''),
(217, '', '', '', '0000-00-00', '0000-00-00', ''),
(218, '', '', 'concert hall', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_ID` int(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `address` varchar(15) NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_ID`, `username`, `email`, `password`, `address`, `phone_number`) VALUES
(111, 'Vunjabei', 'sotojo@gmail.com', '87654321', 'mbeya', '+255766151534'),
(112, 'Kivasmart', '23@gmail.com', '909090909090909', 'dar', '+255787977276');

-- --------------------------------------------------------

--
-- Table structure for table `hall_upload`
--

CREATE TABLE `hall_upload` (
  `id` int(50) NOT NULL,
  `hall_name` varchar(225) NOT NULL,
  `image_path` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `hall_type` varchar(225) NOT NULL,
  `price_per_day` varchar(225) NOT NULL,
  `capacity` varchar(225) NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall_upload`
--

INSERT INTO `hall_upload` (`id`, `hall_name`, `image_path`, `location`, `hall_type`, `price_per_day`, `capacity`, `phone_number`) VALUES
(72, 'Chimwaga', 'hall_imageIMG-20240904-WA0080.jpg', 'udom', 'ConferenceHall', '500000', '3000', '255655763338'),
(73, 'michenzani', 'hall_imageIMG-20240904-WA0039.jpg', 'Zanzibar', 'WeddingHall', '1000000', '2000', '255784064864'),
(74, 'Jakaya Kikwete', 'hall_imageIMG-20240904-WA0086.jpg', 'bungeni', 'ConcertHall', '1000000', '1500', '255787977276'),
(75, 'mlimani', 'hall_imageIMG-20240904-WA0011.jpg', 'Dar es Salaam', 'BanquetHall', '500000', '1000', '255746371374'),
(76, 'Corry Hall', 'hall_imageIMG-20240904-WA0014.jpg', 'dodoma', 'BanquetHall', '200000000', '233', '0746371374');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_ID` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_ID`, `username`, `email`, `password`, `address`, `phone_number`) VALUES
(27, 'Kivasmart', 'software@gmail.', '12345678', 'Makulu', '+255699345975');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `depositor_name` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `amount` varchar(25) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `notification_sent` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `depositor_name`, `payment_method`, `amount`, `payment_date`, `status`, `notification_sent`) VALUES
(10, 0, 'Hassan', 'Credit/Debit Card', '500000.00', '2024-09-09 23:10:12', 'Completed', 1),
(11, 0, 'Hassan', 'Bank Transfer', '50.00', '2024-09-09 23:12:27', 'Completed', 1),
(12, 0, 'Hassan', 'Credit/Debit Card', '6666.00', '2024-09-09 23:57:14', 'Completed', 1),
(13, 0, 'kivanga', 'Bank Transfer', '1000.00', '2024-09-09 23:57:52', 'Completed', 1),
(14, 0, 'kivanga', 'Bank Transfer', '132.00', '2024-09-10 00:03:35', 'Completed', 1),
(15, 0, 'kivanga', 'Bank Transfer', '0.00', '2024-09-10 00:09:06', 'Completed', 1),
(16, 0, 'kivanga', 'Bank Transfer', 'evans2222', '2024-09-10 00:11:19', 'Completed', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_ID`);

--
-- Indexes for table `hall_upload`
--
ALTER TABLE `hall_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `hall_upload`
--
ALTER TABLE `hall_upload`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

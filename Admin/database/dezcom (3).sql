-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 11:22 AM
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
-- Database: `dezcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `client_name` varchar(115) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `service_id`, `client_name`, `description`, `image`) VALUES
(7, 5, 'andrew', 'santa rosa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`company_id`, `name`, `description`, `logo`, `email`, `phone`, `address`) VALUES
(1, 'DZCM', NULL, '67cdef9c9d62a_DZCM.png', 'dzcm@gmail.com', '09123456789', 'San Leonardo, Nueva Ecija');

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `hardware_id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `description` varchar(155) DEFAULT NULL,
  `image` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`hardware_id`, `name`, `description`, `image`) VALUES
(1, 'UPS', 'Uninterruptable Power Supply', '67d3dd909b541_ups.jpg'),
(2, 'Computers', 'Computer tools', '67d3dd86cfaec_h.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `name` varchar(155) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `website` varchar(155) DEFAULT NULL,
  `message` varchar(155) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quote_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`name`, `email`, `phone`, `website`, `message`, `date`, `quote_id`) VALUES
('jane', 'andrewbucedeguzman@gmail.com', '09754136497', 'testing', 'HI!', '2025-03-10 07:50:30', 7),
('jane', 'andrewbucedeguzman@gmail.com', '09754136497', 'testing', 'HI!', '2025-03-10 07:52:11', 8),
('john doe', '3922017@holycross.edu.ph', '09754136497', 'test', 'Hello!', '2025-03-10 07:57:20', 9),
('john doe', '3922017@holycross.edu.ph', '09123456789', 'test', 'Greetings!', '2025-03-10 07:59:20', 10),
('john doe', '3922017@holycross.edu.ph', '09123456789', 'test', 'test', '2025-03-10 08:15:22', 11);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `description`, `image`, `category`) VALUES
(4, 'Pharmacy POS', 'Sales Inventory for Medical Supplies', '67c6a50e57cab_phar.jpg', 'desktop-app'),
(5, 'Resto Bar POS', 'Point of Sales for food services', '67c6a682133b1_dingalan.jpg', 'desktop-app'),
(6, 'TEST', 'TEST', NULL, 'web-app');

-- --------------------------------------------------------

--
-- Table structure for table `service_features`
--

CREATE TABLE `service_features` (
  `service_feature_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(113) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_features`
--

INSERT INTO `service_features` (`service_feature_id`, `service_id`, `name`, `description`, `image`) VALUES
(16, 4, 'Item Expiration Alert', 'Blinking Alert on Menus', NULL),
(17, 4, 'Customizable Discounts', 'Such as Senior, Item Discount, Peso Discount, Selective Items', NULL),
(18, 4, 'Flexible Reports', 'Can Generate daily, weekly, monthly and accounting reports', NULL),
(19, 5, 'Table Management', 'GUI for table vacancy', NULL),
(20, 5, 'Print Out in Kitchen, Bar, and Cashier', 'When Cashier or Waiter ordered items it automatically prints on designated printer locations', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_end_users`
--

CREATE TABLE `tbl_end_users` (
  `userid` int(11) NOT NULL,
  `user_reciever` int(100) NOT NULL,
  `unique_id` int(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` datetime DEFAULT NULL,
  `dateentry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_end_users`
--

INSERT INTO `tbl_end_users` (`userid`, `user_reciever`, `unique_id`, `fname`, `lname`, `email`, `status`, `dateentry`) VALUES
(83, 2, 739814518, 'andrew', 'dg', 'andrew@gmail.com', '2025-03-20 16:08:00', '2025-03-20 16:08:54'),
(84, 2, 395907016, 'andrew', 'buce', 'andrew@gmail.com', '2025-03-20 16:24:00', '2025-03-20 16:24:54'),
(85, 2, 1318158941, 'drew', 'dg', 'andrew@gmail.com', '2025-03-20 16:27:00', '2025-03-20 16:27:39'),
(86, 2, 1178946483, 'andrew', 'dg', 'drew@gmail.com', '2025-03-20 16:34:00', '2025-03-20 16:34:25'),
(87, 2, 746461719, 'dru', 'dru', 'dru@gmail.com', '2025-03-20 16:36:00', '2025-03-20 16:36:25'),
(88, 2, 451981810, 'aaa', 'aaaas', 'asas@gmail.com', '2025-03-20 16:36:00', '2025-03-20 16:36:51'),
(89, 2, 593293286, 'john', 'doe', 'john@gmail.com', '2025-03-20 16:38:00', '2025-03-20 16:38:27'),
(90, 2, 608911731, 'jane', 'doe', 'jane@gmail.com', '2025-03-20 16:45:00', '2025-03-20 16:45:53'),
(91, 2, 705313780, 'jan', 'doe', 'jan@gmail.com', '2025-03-20 16:49:00', '2025-03-20 16:49:09'),
(92, 2, 1268121229, 'jan', 'doe', 'jan@gmail.com', '2025-03-20 16:57:00', '2025-03-20 16:57:35'),
(93, 2, 1658172887, 'dru', 'dg', 'dru@gmail.com', '2025-03-20 17:02:00', '2025-03-20 17:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `notification` tinyint(1) NOT NULL,
  `notification2` tinyint(1) NOT NULL,
  `open` tinyint(1) NOT NULL,
  `dateentry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `notification`, `notification2`, `open`, `dateentry`) VALUES
(22, 2, 1658172887, 'ajnfjaendjk', 0, 0, 1, '2025-03-20 17:23:16'),
(23, 1658172887, 2, 'hello\'', 0, 0, 0, '2025-03-20 17:23:31'),
(24, 2, 1658172887, 'sajebfdjsefdb', 0, 0, 1, '2025-03-20 17:27:33'),
(25, 2, 1658172887, 'aedbjaw', 0, 0, 1, '2025-03-20 17:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `status` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `profile_image`, `status`) VALUES
(2, 'adminn', '$2y$10$UO2.ayKkZhDV7acqfc/6y.MhV.6VnMOj/gjOJYBt8X1zAC.1BiNyu', '67d9136396d7c_da.jpg', '2025-03-20 10:22:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `clients_ibfk_1` (`service_id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`hardware_id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_features`
--
ALTER TABLE `service_features`
  ADD PRIMARY KEY (`service_feature_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `tbl_end_users`
--
ALTER TABLE `tbl_end_users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `hardware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_features`
--
ALTER TABLE `service_features`
  MODIFY `service_feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_end_users`
--
ALTER TABLE `tbl_end_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_features`
--
ALTER TABLE `service_features`
  ADD CONSTRAINT `service_features_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2024 at 03:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posong_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'AdminTest', '$2a$12$/rwsxksQpQmCR7i5VI75feu0roEz2PcI8l4vo6NYmUTf2b3xtZkZa', 'admintest@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `event_type` enum('custom','regular') COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `reservation_status` enum('pending','confirmed','cancelled') COLLATE utf8mb4_general_ci NOT NULL,
  `is_weekend` tinyint(1) NOT NULL,
  `admin_confirmed_by` int DEFAULT NULL,
  `confirmation_date` datetime DEFAULT NULL,
  `room_id` int NOT NULL,
  `people` int NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_name`, `user_email`, `phone_number`, `date`, `time`, `event_type`, `price`, `reservation_status`, `is_weekend`, `admin_confirmed_by`, `confirmation_date`, `room_id`, `people`, `photo`) VALUES
(32, 'kobo', 'fardilabintang476@gmail.com', '346532', '2024-11-02', '14:17:00', 'regular', 700000, 'cancelled', 1, NULL, NULL, 5, 0, NULL),
(33, '', '', '', '2024-11-08', '00:00:00', 'custom', 700000, 'confirmed', 0, 1, '2024-10-31 20:01:29', 5, 0, NULL),
(34, '', '', '', '2024-11-08', '00:00:00', 'custom', 700000, 'cancelled', 0, NULL, NULL, 5, 0, NULL),
(35, '', '', '', '2024-11-08', '00:00:00', 'custom', 0, 'cancelled', 0, NULL, NULL, 5, 0, 'assets/uploads/furina-furina-cry.gif'),
(36, '', '', '', '2024-11-08', '00:00:00', 'regular', 700000, 'pending', 0, NULL, NULL, 5, 0, NULL),
(37, 'qodim', 'usertest@gmail.com', '089887324243', '2024-11-20', '14:24:00', 'regular', 1200000, 'confirmed', 0, 1, '2024-12-30 20:05:46', 4, 0, NULL),
(38, 'qodim', 'usertest@gmail.com', '089887324243', '2024-11-20', '14:24:00', 'regular', 0, 'confirmed', 0, 1, '2024-12-30 20:05:43', 4, 0, 'assets/uploads/hehe.jpg'),
(39, 'adssda', 'fardilabintang476@gmail.com', '234535', '2024-11-21', '03:54:00', 'regular', 700000, 'confirmed', 0, 1, '2024-12-30 20:03:54', 5, 0, NULL),
(40, 'test1', 'usertest@gmail.com', '1234456345', '2024-12-30', '04:21:00', 'regular', 1200000, 'pending', 0, 1, '2024-12-30 20:03:46', 4, 10, NULL),
(41, 'coba1', 'admintest@gmail.com', '129599348', '2024-12-31', '23:00:00', 'regular', 800000, 'pending', 0, NULL, NULL, 2, 10, NULL),
(42, 'coba1', 'admintest@gmail.com', '129599348', '2024-12-31', '23:00:00', 'regular', 800000, 'pending', 0, NULL, NULL, 2, 10, NULL),
(43, 'S&E R/T', 'admintest@gmail.com', '99999', '2024-12-16', '00:02:00', 'regular', 600000, 'pending', 0, NULL, NULL, 1, 10, NULL),
(44, 'S&E R/T', 'admintest@gmail.com', '99999', '2024-12-16', '00:02:00', 'regular', 600000, 'pending', 0, NULL, NULL, 1, 10, 'assets/uploads/WhatsApp Image 2024-12-27 at 01.02.54_bdd3e285.jpg'),
(45, 'S&E R/T', 'admintest@gmail.com', '99999', '2024-12-16', '00:02:00', 'regular', 600000, 'pending', 0, NULL, NULL, 1, 10, NULL),
(46, 'S&E R/T', 'admintest@gmail.com', '99999', '2024-12-16', '00:02:00', 'regular', 600000, 'pending', 0, NULL, NULL, 1, 10, NULL),
(47, 'S&E R/T', 'admintest@gmail.com', '99999', '2024-12-16', '00:02:00', 'regular', 600000, 'pending', 0, NULL, NULL, 1, 10, NULL),
(48, 'kobo', 'admintest@gmail.com', '234465', '2024-12-30', '22:12:00', 'regular', 600000, 'pending', 0, NULL, NULL, 1, 10, 'assets/uploads/WhatsApp Image 2024-12-23 at 00.28.58_ad448222.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int NOT NULL,
  `user_id` int NOT NULL,
  `reservation_id` int NOT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `reservation_id`, `rating`, `comment`, `is_visible`, `photo`) VALUES
(5, 2, 38, 5, 'heheyy', 1, 'assets/uploads/hehe.jpg'),
(7, 1, 39, 5, 'widih bang', 1, 'assets/uploads/DSC_0401.png');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int NOT NULL,
  `room_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `total_capacity` int NOT NULL,
  `price` int NOT NULL,
  `weekend_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `total_capacity`, `price`, `weekend_price`) VALUES
(1, 'Camp Biasa', 10, 600000, 600000),
(2, 'Camp Ekonomi', 10, 800000, 800000),
(3, 'Camp Full Service', 10, 1500000, 1500000),
(4, 'Camp Family Full Service', 10, 1200000, 1200000),
(5, 'Camp Family Ekonomi', 10, 700000, 700000),
(6, 'Glamour Camp (6 orang)', 5, 1300000, 1500000),
(7, 'Glamour Camp (8 orang)', 5, 1600000, 1900000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone_number`) VALUES
(1, 'UserTest', 'usertest@gmail.com', '$2a$12$7ki9IqRO3zPT8SeY5d8qee3Qgqxr/YDAqGC7gk3bIgIPAkR1VVFEC', '08988734321'),
(2, 'Qodiem', 'qodiem@test.com', 'qodiem', '08129416');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `discount_percentage` int NOT NULL,
  `expiration_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `admin_change` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucher_id`, `code`, `discount_percentage`, `expiration_date`, `is_active`, `admin_change`) VALUES
(9, 'ayokeposonh', 5, '2024-10-31', 0, 1),
(13, 'ayokeposong', 25, '2024-11-02', 0, 1),
(15, 'coba1', 50, '2024-12-31', 1, 1),
(18, 'test1', 25, '2024-12-30', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `admin_confirmed_by` (`admin_confirmed_by`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `voucher_ibfk_1` (`admin_change`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_4` FOREIGN KEY (`admin_confirmed_by`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_ibfk_1` FOREIGN KEY (`admin_change`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

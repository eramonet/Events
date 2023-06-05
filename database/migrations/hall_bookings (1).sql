-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 03:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `hall_bookings`
--

CREATE TABLE `hall_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('success','cancelled') NOT NULL DEFAULT 'success',
  `date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `packge_id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `extra_guest` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall_bookings`
--

INSERT INTO `hall_bookings` (`id`, `status`, `date`, `time_from`, `time_to`, `packge_id`, `hall_id`, `user_id`, `vendor_id`, `total`, `extra_guest`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'success', '2023-05-28', '08:00:00', '09:47:55', 1, 1, 489, 4, 15587, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(4, 'cancelled', '2023-05-13', '08:00:00', '10:24:27', 1, 1, 300, 1, 33844, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(5, 'cancelled', '2023-06-20', '08:00:00', '09:18:16', 1, 1, 41, 6, 22188, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(6, 'success', '2023-06-26', '08:00:00', '08:38:34', 1, 1, 288, 5, 31398, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(7, 'cancelled', '2023-06-17', '08:00:00', '08:46:08', 1, 1, 466, 1, 46855, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(8, 'cancelled', '2023-06-25', '08:00:00', '08:00:19', 1, 1, 266, 3, 2287, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(9, 'cancelled', '2023-05-06', '08:00:00', '10:18:21', 1, 1, 498, 4, 34556, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(10, 'success', '2023-05-22', '08:00:00', '09:36:26', 1, 1, 385, 1, 4178, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(11, 'success', '2023-06-11', '08:00:00', '09:11:23', 1, 1, 236, 5, 41721, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(12, 'cancelled', '2023-05-23', '08:00:00', '09:10:01', 1, 1, 468, 3, 17449, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(13, 'success', '2023-06-26', '08:00:00', '08:03:15', 1, 1, 451, 6, 36690, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(14, 'success', '2023-06-14', '08:00:00', '08:43:06', 1, 1, 427, 2, 27999, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(15, 'success', '2023-05-09', '08:00:00', '10:13:19', 1, 1, 70, 1, 20954, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(16, 'cancelled', '2023-05-13', '08:00:00', '11:37:07', 1, 1, 299, 3, 15511, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(17, 'success', '2023-06-26', '08:00:00', '11:01:02', 1, 1, 21, 1, 22505, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(18, 'success', '2023-06-26', '08:00:00', '10:48:10', 1, 1, 25, 3, 34076, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(19, 'cancelled', '2023-06-05', '08:00:00', '10:26:00', 1, 1, 250, 5, 21068, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(20, 'cancelled', '2023-05-06', '08:00:00', '10:36:30', 1, 1, 370, 3, 46097, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(21, 'success', '2023-05-07', '08:00:00', '11:56:43', 1, 1, 389, 4, 26992, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL),
(22, 'cancelled', '2023-06-18', '08:00:00', '09:51:14', 1, 1, 25, 1, 42303, 55, '2023-04-27 12:34:28', '2023-04-27 12:34:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hall_bookings`
--
ALTER TABLE `hall_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_bookings_packge_id_foreign` (`packge_id`),
  ADD KEY `hall_bookings_hall_id_foreign` (`hall_id`),
  ADD KEY `hall_bookings_user_id_foreign` (`user_id`),
  ADD KEY `hall_bookings_vendor_id_foreign` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hall_bookings`
--
ALTER TABLE `hall_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hall_bookings`
--
ALTER TABLE `hall_bookings`
  ADD CONSTRAINT `hall_bookings_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `hall_bookings_packge_id_foreign` FOREIGN KEY (`packge_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `hall_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hall_bookings_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

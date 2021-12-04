-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2021 at 06:36 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foechs`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'address', 'FOECHS, Rawalpindi, Punjab', '2021-11-26 18:17:21', '2021-11-26 18:17:21'),
(2, 'phone', '051-2574521', '2021-11-26 18:17:21', '2021-11-26 18:17:21'),
(3, 'email', 'contact@foech.com', '2021-11-26 18:17:21', '2021-11-26 18:17:21'),
(4, 'map_location', 'https://goo.gl/maps/ohiWiqjeMza2qNp6A', '2021-11-26 18:17:21', '2021-11-26 18:17:21'),
(5, 'map_iframe', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13296.683338333829!2d72.92240138230801!3d33.57491344118854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df90cc58f6f955%3A0xa1a0c8a3031236a5!2sF%20O%20E%20C%20H%20S%20Rawalpindi%2C%20Punjab!5e0!3m2!1sen!2s!4v1630659193442!5m2!1sen!2s', '2021-11-26 18:17:21', '2021-11-26 18:17:21'),
(6, 'footer_intro', 'Foreign Office Employees Cooperative Housing Society is located adjacent to I-16 Islamabad.', '2021-11-26 18:17:21', '2021-11-26 18:17:21'),
(7, 'facebook', '#', '2021-11-26 18:17:21', '2021-11-26 18:17:21'),
(8, 'twitter', '#', '2021-11-26 18:17:21', '2021-11-26 18:17:21'),
(9, 'youtube', '#', '2021-11-26 18:17:21', '2021-11-26 18:17:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

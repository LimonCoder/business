-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 03:43 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `app_trackid` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = admin, 2 = user, 3 = sub_user',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_name`, `email`, `password`, `phone`, `app_trackid`, `status`, `create_at`) VALUES
(1, 'admin', 'nurulaminlimon261893@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1838723409, NULL, 1, '2020-08-19 16:03:50'),
(2, 'limon', 'nurulaminlimon@gmail.com', 'a8698009bce6d1b8c2128eddefc25aad', 1319053104, NULL, 1, '2020-08-21 06:19:39'),
(3, 'Bijoy Kumar', NULL, '33ad305046d3a0ecca289e994322aac8', 1838723408, 815491, 2, '2020-09-01 10:54:47'),
(4, 'mk babau ', NULL, '33ad305046d3a0ecca289e994322aac8', 1838723408, 921261, 2, '2020-09-01 12:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `bd_location`
--

CREATE TABLE `bd_location` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL COMMENT '1 = District, 2 = Upazila',
  `tax` int(10) UNSIGNED DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_by_ip` varchar(100) NOT NULL,
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bd_location`
--

INSERT INTO `bd_location` (`id`, `parent_id`, `name`, `type`, `tax`, `create_at`, `create_by_ip`, `delete_at`) VALUES
(8, NULL, 'কুমিল্লা', 1, 20, '2020-08-26 01:58:44', '::1', NULL),
(35, 8, 'chandina', 2, NULL, '2020-08-27 18:05:34', '::1', NULL),
(36, NULL, 'ঢাকা', 1, 30, '2020-08-29 06:47:46', '::1', NULL),
(37, 36, 'কমলাপুর', 2, NULL, '2020-08-29 06:49:32', '::1', NULL),
(38, 8, 'কুমিল্লা সদর', 2, NULL, '2020-09-02 01:35:45', '::1', NULL),
(39, NULL, 'চট্টগ্রাম', 1, 40, '2020-09-02 01:36:45', '::1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_type`
--

CREATE TABLE `business_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_type`
--

INSERT INTO `business_type` (`id`, `name`, `create_at`) VALUES
(1, 'ব্যক্তি মালিকানাধীন', '2020-08-28 13:42:48'),
(2, 'যৌথ মালিকানা', '2020-08-28 13:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_time` timestamp NULL DEFAULT NULL,
  `device` varchar(200) DEFAULT NULL,
  `ip` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `login_time`, `logout_time`, `device`, `ip`, `create_at`) VALUES
(1, 1, '2020-08-21 02:22:37', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-21 06:22:37'),
(2, 1, '2020-08-21 02:34:21', '2020-08-21 02:35:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-21 06:34:21'),
(3, 1, '2020-08-21 02:41:03', '2020-08-21 02:41:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-21 06:41:03'),
(4, 1, '2020-08-21 02:42:31', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-21 06:42:31'),
(5, 1, '2020-08-21 08:13:23', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-21 12:13:23'),
(6, 1, '2020-08-21 23:22:10', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-22 03:22:10'),
(7, 1, '2020-08-22 04:45:16', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-22 08:45:16'),
(8, 1, '2020-08-23 12:32:11', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-23 16:32:11'),
(9, 1, '2020-08-24 03:34:33', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-24 07:34:33'),
(10, 1, '2020-08-24 11:54:28', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-24 15:54:28'),
(11, 1, '2020-08-24 21:18:38', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-25 01:18:38'),
(12, 1, '2020-08-25 02:38:06', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-25 06:38:06'),
(13, 1, '2020-08-25 11:59:20', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-08-25 15:59:20'),
(14, 1, '2020-08-25 19:18:11', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-25 23:18:11'),
(15, 1, '2020-08-26 01:37:31', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '127.0.0.1', '2020-08-26 05:37:31'),
(16, 1, '2020-08-26 06:11:37', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-26 10:11:37'),
(17, 1, '2020-08-27 00:08:22', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-27 04:08:22'),
(18, 1, '2020-08-27 10:50:17', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-27 14:50:17'),
(19, 1, '2020-08-27 23:47:54', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-28 03:47:54'),
(20, 1, '2020-08-28 08:54:30', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-28 12:54:30'),
(21, 1, '2020-08-28 23:49:04', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-29 03:49:04'),
(22, 1, '2020-08-29 09:57:36', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-29 13:57:36'),
(23, 1, '2020-08-30 09:52:12', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-30 13:52:12'),
(24, 1, '2020-08-30 22:41:07', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-31 02:41:07'),
(25, 1, '2020-08-31 05:54:20', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-31 09:54:20'),
(26, 1, '2020-08-31 12:10:37', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-08-31 16:10:37'),
(27, 1, '2020-08-31 22:38:52', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 02:38:52'),
(28, 1, '2020-09-01 06:22:35', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 10:22:35'),
(29, 3, '2020-09-01 07:49:07', '2020-09-01 07:59:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 11:49:07'),
(30, 3, '2020-09-01 08:02:04', '2020-09-01 08:22:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 12:02:04'),
(31, 3, '2020-09-01 08:22:42', '2020-09-01 08:30:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 12:22:42'),
(32, 1, '2020-09-01 08:30:37', '2020-09-01 08:30:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 12:30:37'),
(33, 3, '2020-09-01 08:30:57', '2020-09-01 08:31:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 12:30:57'),
(34, 4, '2020-09-01 08:31:26', '2020-09-01 08:46:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 12:31:26'),
(35, 1, '2020-09-01 08:46:33', '2020-09-01 09:55:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 12:46:33'),
(36, 4, '2020-09-01 09:55:41', '2020-09-01 10:02:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 13:55:41'),
(37, 4, '2020-09-01 10:03:01', '2020-09-01 10:05:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 14:03:01'),
(38, 1, '2020-09-01 10:05:50', '2020-09-01 10:06:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 14:05:50'),
(39, 4, '2020-09-01 10:06:38', '2020-09-01 10:07:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 14:06:38'),
(40, 1, '2020-09-01 10:07:58', '2020-09-01 10:54:12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 14:07:58'),
(41, 4, '2020-09-01 10:54:40', '2020-09-01 10:57:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 14:54:40'),
(42, 1, '2020-09-01 10:57:26', '2020-09-01 11:03:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 14:57:26'),
(43, 4, '2020-09-01 11:03:31', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-01 15:03:31'),
(44, 1, '2020-09-01 20:28:34', '2020-09-01 21:27:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-02 00:28:34'),
(45, 1, '2020-09-01 21:27:57', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0', '::1', '2020-09-02 01:27:57'),
(46, 1, '2020-09-01 21:31:37', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', '::1', '2020-09-02 01:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `id` int(11) NOT NULL,
  `trackid` text NOT NULL,
  `sonod_no` varchar(20) NOT NULL,
  `b_type` int(11) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `total_fee` decimal(10,2) NOT NULL,
  `genarate_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`id`, `trackid`, `sonod_no`, `b_type`, `fee`, `vat`, `total_fee`, `genarate_data`) VALUES
(1, '768307', '20203456780002', 1, '100.00', '20.00', '120.00', '2020-08-29 05:51:55'),
(2, '227992', '20203456780003', 1, '540.00', '20.00', '648.00', '2020-08-29 06:21:33'),
(3, '35152', '20203456780004', 1, '520.00', '104.00', '624.00', '2020-08-29 06:24:37'),
(4, '180191', '20203456780005', 2, '1.00', '268.00', '1.00', '2020-08-29 06:34:15'),
(5, '623488', '20203456780006', 1, '450.00', '135.00', '585.00', '2020-08-29 06:50:33'),
(6, '746841', '20203456780007', 1, '450.00', '90.00', '540.00', '2020-08-29 06:58:04'),
(7, '629938', '20203456780008', 1, '1.00', '268.00', '1.00', '2020-08-29 07:07:42'),
(8, '959701', '20203456780009', 2, '340.00', '68.00', '408.00', '2020-08-29 16:11:22'),
(9, '255980', '20203456780010', 1, '100.00', '20.00', '120.00', '2020-09-01 02:46:42'),
(10, '604685', '20203456780011', 2, '100.00', '20.00', '120.00', '2020-09-01 02:52:06'),
(11, '815491', '20203456780012', 1, '100.00', '20.00', '120.00', '2020-09-01 10:54:47'),
(12, '921261', '20203456780013', 1, '1.00', '268.00', '1.00', '2020-09-01 12:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `patnerinfo`
--

CREATE TABLE `patnerinfo` (
  `id` int(11) NOT NULL,
  `track_id` bigint(11) NOT NULL,
  `en_name` varchar(100) NOT NULL,
  `bn_name` varchar(100) DEFAULT NULL,
  `number` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patnerinfo`
--

INSERT INTO `patnerinfo` (`id`, `track_id`, `en_name`, `bn_name`, `number`, `password`, `create_at`) VALUES
(1, 180191, 'Limon', '', '01838723408', '51C643', '2020-08-31 10:26:17'),
(2, 180191, 'Jony', 'jony', '01897907342', '#D&6A$', '2020-08-31 10:26:15'),
(3, 959701, 'Limon', 'Limon', '01838723408', '4@5147', '2020-08-31 10:26:03'),
(4, 959701, 'Rafi', 'Rafi', '01897907342', 'AC6A86', '2020-08-31 10:25:59'),
(5, 604685, 'ahad', 'chowdhury', '01838723408', '82@@95', '2020-09-01 02:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

CREATE TABLE `personalinfo` (
  `id` int(11) NOT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `name_bn` varchar(100) DEFAULT NULL,
  `b_name` varchar(100) NOT NULL,
  `b_type` int(11) NOT NULL,
  `number` varchar(11) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `sub_district_id` int(11) NOT NULL,
  `village_name` varchar(100) DEFAULT NULL,
  `track_id` bigint(20) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `signature` varchar(150) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT ' 0= unactive, 1= active',
  `create_by_ip` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`id`, `name_en`, `name_bn`, `b_name`, `b_type`, `number`, `district_id`, `sub_district_id`, `village_name`, `track_id`, `image`, `signature`, `status`, `create_by_ip`, `create_at`) VALUES
(1, 'nurul', 'fsfs', 'madicine', 1, '01838723408', 8, 35, '', 768307, NULL, NULL, 1, '::1', '2020-08-29 05:51:55'),
(2, 'nurul', 'fsfs', 'shops', 1, '01838723408', 8, 35, 'mohichial', 227992, '012.JPG', NULL, 1, '::1', '2020-08-29 06:21:33'),
(3, 'Ahad', 'Ahad', 'Political', 1, '01838723408', 8, 35, 'mohichial', 35152, '12233.jpg', NULL, 1, '::1', '2020-08-29 06:24:37'),
(5, 'kazi Shakil', 'Kazi Shakil', 'Polti', 2, '01838723408', 8, 35, 'mohichial', 180191, '122331.jpg', NULL, 1, '::1', '2020-08-29 06:34:15'),
(6, 'kazi Shakil', 'Kazi Shakil', 'Political', 1, '01838723408', 36, 37, 'mohichial', 623488, '15812323031984810186.jpg', NULL, 1, '::1', '2020-08-29 06:50:33'),
(7, 'kazi Shakil', 'Kazi Shakil', 'Political', 1, '01838723408', 8, 35, 'mohichial', 746841, NULL, NULL, 1, '::1', '2020-08-29 06:58:04'),
(8, 'kazi Shakil', 'Kazi Shakil', 'madicine', 1, '01838723408', 8, 35, 'mohichial', 629938, NULL, NULL, 1, '::1', '2020-08-29 07:07:42'),
(9, 'Mostafa Shujan', 'Mostafa Shujan', 'Collectoret shop', 2, '01715573252', 8, 35, '', 959701, 'Pic.jpg', NULL, 1, '::1', '2020-08-29 16:11:22'),
(11, 'kazi Shakil', 'Kazi Shakil', 'madicine', 1, '01838723408', 8, 35, 'mohichial', 255980, NULL, NULL, 1, '::1', '2020-09-01 02:46:42'),
(12, 'Limon chowdhury', 'Ahad', 'madicine', 2, '01838723408', 8, 35, 'mohichial', 604685, NULL, NULL, 1, '::1', '2020-09-01 02:52:06'),
(13, 'Bijoy Kumar', 'Bijoy Kumar', 'Political', 1, '01838723408', 8, 35, 'mohichial', 815491, NULL, NULL, 1, '::1', '2020-09-01 10:54:46'),
(14, 'mk babau ', 'mk babau', 'Political', 1, '01838723408', 8, 35, 'mohichial', 921261, NULL, NULL, 1, '::1', '2020-09-01 12:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `table_trackingid`
--

CREATE TABLE `table_trackingid` (
  `id` int(11) NOT NULL,
  `tracking_id` bigint(20) NOT NULL,
  `utime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_trackingid`
--

INSERT INTO `table_trackingid` (`id`, `tracking_id`, `utime`) VALUES
(10, 724400, '2020-08-28 14:53:12'),
(11, 282566, '2020-08-28 14:57:42'),
(12, 861969, '2020-08-28 14:57:51'),
(13, 297792, '2020-08-28 16:48:51'),
(14, 404506, '2020-08-28 16:50:15'),
(15, 36128, '2020-08-28 16:52:10'),
(16, 606017, '2020-08-28 16:53:21'),
(17, 124095, '2020-08-28 17:12:10'),
(18, 750003, '2020-08-28 17:12:34'),
(19, 740317, '2020-08-29 05:35:37'),
(20, 768307, '2020-08-29 05:51:55'),
(21, 227992, '2020-08-29 06:21:33'),
(22, 35152, '2020-08-29 06:24:37'),
(23, 180191, '2020-08-29 06:34:15'),
(24, 623488, '2020-08-29 06:50:33'),
(25, 746841, '2020-08-29 06:58:04'),
(26, 629938, '2020-08-29 07:07:42'),
(27, 959701, '2020-08-29 16:11:22'),
(28, 255980, '2020-09-01 02:46:42'),
(29, 604685, '2020-09-01 02:52:06'),
(30, 815491, '2020-09-01 10:54:47'),
(31, 921261, '2020-09-01 12:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `trade_sonodno`
--

CREATE TABLE `trade_sonodno` (
  `id` int(11) NOT NULL,
  `sonod_no` varchar(100) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trade_sonodno`
--

INSERT INTO `trade_sonodno` (`id`, `sonod_no`, `insert_time`) VALUES
(1, '20203456780001', '2020-08-29 06:06:35'),
(2, '20203456780002', '2020-08-29 06:06:35'),
(3, '20203456780003', '2020-08-29 06:21:33'),
(4, '20203456780004', '2020-08-29 06:24:37'),
(5, '20203456780005', '2020-08-29 06:34:15'),
(6, '20203456780006', '2020-08-29 06:50:33'),
(7, '20203456780007', '2020-08-29 06:58:04'),
(8, '20203456780008', '2020-08-29 07:07:42'),
(9, '20203456780009', '2020-08-29 16:11:22'),
(10, '20203456780010', '2020-09-01 02:46:42'),
(11, '20203456780011', '2020-09-01 02:52:06'),
(12, '20203456780012', '2020-09-01 10:54:47'),
(13, '20203456780013', '2020-09-01 12:29:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bd_location`
--
ALTER TABLE `bd_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_type`
--
ALTER TABLE `business_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patnerinfo`
--
ALTER TABLE `patnerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalinfo`
--
ALTER TABLE `personalinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_trackingid`
--
ALTER TABLE `table_trackingid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_sonodno`
--
ALTER TABLE `trade_sonodno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bd_location`
--
ALTER TABLE `bd_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `business_type`
--
ALTER TABLE `business_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patnerinfo`
--
ALTER TABLE `patnerinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personalinfo`
--
ALTER TABLE `personalinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table_trackingid`
--
ALTER TABLE `table_trackingid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `trade_sonodno`
--
ALTER TABLE `trade_sonodno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

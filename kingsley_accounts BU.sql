-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 29, 2024 at 03:16 PM
-- Server version: 8.0.36
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingsley_accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mt4_account` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mt4_password` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int DEFAULT NULL,
  `package` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conditions` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A1',
  `max_high` double DEFAULT NULL,
  `dd_level` double DEFAULT '0',
  `stage` tinyint NOT NULL DEFAULT '1',
  `note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `trial` tinyint(1) NOT NULL DEFAULT '0',
  `reset_allowed` tinyint(1) NOT NULL DEFAULT '1',
  `issue` tinyint(1) NOT NULL DEFAULT '0',
  `restart` tinyint(1) NOT NULL DEFAULT '0',
  `restart_balance` double DEFAULT NULL,
  `restart_days` int DEFAULT NULL,
  `previously_accumulated` double NOT NULL DEFAULT '0',
  `sl_breach_expiration` timestamp NULL DEFAULT NULL,
  `risk_breach_expiration` timestamp NULL DEFAULT NULL,
  `soft_breaches` int DEFAULT '0',
  `reason_close` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `name`, `mt4_account`, `mt4_password`, `size`, `package`, `conditions`, `max_high`, `dd_level`, `stage`, `note`, `active`, `trial`, `reset_allowed`, `issue`, `restart`, `restart_balance`, `restart_days`, `previously_accumulated`, `sl_breach_expiration`, `risk_breach_expiration`, `soft_breaches`, `reason_close`, `created_at`, `updated_at`) VALUES
(18, 9, '', '18851/1', 'WYv5zKTo&6', 1500000, 'A1', 'A1', 2271290.62, 0, 0, '', 1, 1, 0, 0, 0, NULL, NULL, 0, '2023-03-16 19:04:05', NULL, 0, NULL, '2023-03-05 13:03:54', '2023-10-06 14:16:51'),
(41, 32, '', '18851/11/1', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:05:44', '2023-09-20 20:05:44'),
(42, 33, '', '18851/4', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:06:30', '2023-09-20 20:06:30'),
(43, 35, '', '18851/6', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:07:39', '2023-09-20 20:07:39'),
(44, 36, '', '18851/5', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:07:52', '2023-09-20 20:07:52'),
(45, 34, '', '18851/1/1', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:08:05', '2023-09-20 20:08:05'),
(46, 37, '', '18851/2', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:08:35', '2023-09-20 20:08:35'),
(47, 38, '', '18851/3/1/2', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:09:00', '2023-09-20 20:09:00'),
(48, 39, '', '18851/7/1', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:09:32', '2023-09-20 20:09:32'),
(49, 40, '', '18851/14', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:09:45', '2023-09-20 20:09:45'),
(50, 41, '', '18851/15', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:10:01', '2023-09-20 20:10:01'),
(51, 42, '', '18851/13', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:10:28', '2023-09-20 20:10:28'),
(52, 43, '', '18851/8', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:10:46', '2023-09-20 20:10:46'),
(54, 35, '', '18851/6/1', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:11:37', '2023-09-20 20:11:37'),
(55, 44, '', '18851/9 jnt', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:11:59', '2023-09-20 20:11:59'),
(56, 45, '', '18851/12', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:12:20', '2023-09-20 20:12:20'),
(57, 46, '', '18851/10', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:12:37', '2023-09-20 20:12:37'),
(58, 47, '', '18851/11', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:13:41', '2023-09-20 20:13:41'),
(59, 48, '', '18851/3', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 20:13:57', '2023-09-20 20:13:57'),
(60, 39, '', '18851/7', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-09-20 23:27:14', '2023-09-20 23:27:14'),
(62, 52, '', '18851/17', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-10-03 17:58:12', '2023-10-03 17:58:12'),
(63, 49, '', '18851/16', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-10-03 17:58:34', '2023-10-03 17:58:34'),
(64, 53, '', '18851/3/1', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-10-06 14:00:01', '2023-10-06 14:00:01'),
(65, 1, '', '999', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-10-07 01:34:55', '2023-10-07 01:34:55'),
(66, 54, '', '18851/18', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-10-11 15:23:25', '2023-10-11 15:23:25'),
(67, 55, '', '18851/4/1', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-10-11 22:45:25', '2023-10-11 22:45:25'),
(68, 56, '', '18851/19', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-11-01 19:21:49', '2023-11-01 19:21:49'),
(69, 57, '', '18851/20', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-11-07 22:51:05', '2023-11-07 22:51:05'),
(71, 59, '', '18851/22', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-12-04 19:25:08', '2023-12-04 19:25:08'),
(72, 60, '', '18851/23', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-12-06 19:38:59', '2023-12-06 20:40:21'),
(73, 60, '', '18851/23/1', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-12-06 19:44:52', '2023-12-06 20:40:09'),
(74, 1, '', 'Test', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-12-10 20:41:31', '2023-12-10 20:41:31'),
(75, 54, '', '18851/18/1', NULL, NULL, NULL, 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-12-12 14:39:42', '2023-12-12 14:39:42'),
(80, 62, 'BROKR LTD', '18851/24', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-01-16 18:10:41', '2024-01-16 18:10:41'),
(81, 64, 'LV/HP', '18851/25', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-01-16 18:31:14', '2024-01-16 18:31:14'),
(82, 65, 'Bernadette Weber', '18851/26', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-03 15:35:29', '2024-02-03 15:35:29'),
(83, 66, 'Simon Weissenberger', '18851/27', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-04 19:50:10', '2024-02-04 20:10:58'),
(85, 67, 'Kaval Shah', '18851/28', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-05 14:13:46', '2024-02-05 14:13:46'),
(86, 68, 'Naresh Shah', '18851/29', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-05 14:14:29', '2024-02-05 14:14:29'),
(87, 69, 'Diptiben Shah', '18851/30', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-05 14:15:00', '2024-02-05 14:15:00'),
(88, 70, 'Marina Bykovam', '18851/31', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-06 18:54:37', '2024-02-06 18:54:37'),
(89, 71, 'Harold O\'Neal', '18851/32', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-06 18:55:38', '2024-02-06 18:55:38'),
(90, 72, 'test', '123 test', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-12 00:19:11', '2024-02-12 00:19:11'),
(91, 73, 'Tanner Caldwell Cook', '18851/33', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-14 11:40:14', '2024-02-14 11:40:14'),
(98, 75, 'Mangold-Bickel', '18851/34', NULL, NULL, 'A1', 'A1', NULL, 0, 1, '', 1, 0, 1, 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '2024-02-21 21:22:27', '2024-02-21 21:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `account` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_short` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alert_long` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `softbreach` tinyint(1) NOT NULL DEFAULT '0',
  `hardbreach` tinyint(1) NOT NULL DEFAULT '0',
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `user_id`, `account`, `alert_short`, `alert_long`, `softbreach`, `hardbreach`, `seen`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 9, '80006276', '80006276 - Deposit', 'Account 80006276 - Deposit of $25,000', 0, 0, 1, NULL, '2023-01-03 02:49:56', '2024-01-03 02:22:24'),
(6, 9, '80006276', '80006276 - Performance Fee', 'Account 80006276 - Performance fee of $414.12 \r\n', 0, 0, 1, NULL, '2023-02-02 02:49:56', '2024-01-03 02:22:24'),
(7, 9, '80006276', '80006276 - Performance Fee', 'Account 80006276 - Performance fee of $506.15\r\n \r\n', 0, 0, 1, NULL, '2023-03-02 02:49:56', '2024-01-03 02:22:24'),
(8, 9, '80006276', '80006276 - Management Fee', 'Account 80006276 - Management fee of $5.62 \r\n\r\n \r\n', 0, 0, 1, NULL, '2023-03-02 02:49:56', '2024-01-03 02:22:24'),
(9, 9, '80006276', '80006276 - Management Fee', 'Account 80006276 - Management fee of $4.60 \r\n', 0, 0, 1, NULL, '2023-02-02 02:49:56', '2024-01-03 02:22:24'),
(10, 9, '80006276', '80006276 - Referral Fee', 'Account 80006276 - Referral Fee of $1,200.00', 1, 0, 1, NULL, '2023-02-15 02:49:56', '2024-01-03 02:22:24'),
(11, 1, '999', '999 - deposit', 'Account 999 - deposit of 999.00€', 0, 0, 0, '2023-12-10 14:46:21', '2023-10-07 01:35:23', '2023-12-10 19:46:21'),
(12, 1, '999', '999 - deposit', 'Account 999 - deposit of 999.00€', 0, 0, 0, '2023-12-10 14:46:21', '2023-10-07 01:35:25', '2023-12-10 19:46:21'),
(13, 1, '999', '999 - deposit', 'Account 999 - deposit of 999.00€', 0, 0, 0, '2023-12-10 14:46:21', '2023-10-07 01:35:27', '2023-12-10 19:46:21'),
(14, 1, '999', '999 - deposit', 'Account 999 - deposit of 999.00€', 0, 0, 0, '2023-12-10 14:46:21', '2023-10-07 01:35:28', '2023-12-10 19:46:21'),
(15, 1, '999', '999 - deposit', 'Account 999 - deposit of 999.00€', 0, 0, 0, '2023-12-10 14:46:21', '2023-10-07 01:35:29', '2023-12-10 19:46:21'),
(16, 1, '999', '999 - deposit', 'Account 999 - deposit of 999.00€', 0, 0, 0, '2023-12-10 14:46:21', '2023-10-07 01:35:30', '2023-12-10 19:46:21'),
(17, 9, '18851/1', '18851/1 - withdrawal', 'Account 18851/1 - withdrawal of 300,000,000,000,000.00€', 0, 0, 1, NULL, '2023-10-07 01:45:59', '2024-01-03 02:22:24'),
(18, 1, '999', '999 - deposit', 'Account 999 - deposit of 999.00€', 0, 0, 0, '2023-12-10 14:46:21', '2023-10-07 01:49:16', '2023-12-10 19:46:21'),
(19, 9, '18851/1', '18851/1 - deposit', 'Account 18851/1 - deposit of 300,000,000,000,000.00€', 0, 0, 1, NULL, '2023-10-07 05:56:54', '2024-01-03 02:22:24'),
(20, 1, '999', '999 - deposit', 'Account 999 - deposit of 300,000,000,000,000.00€', 0, 0, 0, '2023-12-10 14:46:21', '2023-10-07 06:01:16', '2023-12-10 19:46:21'),
(21, 54, '18851/18', '18851/18 - deposit', 'Account 18851/18 - deposit of 28,979.98€', 0, 0, 0, '2023-12-12 12:26:49', '2023-10-11 15:25:07', '2023-12-12 17:26:49'),
(22, 55, '18851/4/1', '18851/4/1 - deposit', 'Account 18851/4/1 - deposit of 5,433.84€', 0, 0, 1, NULL, '2023-10-11 22:48:01', '2024-02-28 00:41:51'),
(23, 53, '18851/3/1', '18851/3/1 - deposit', 'Account 18851/3/1 - deposit of 11,593.65€', 0, 0, 1, NULL, '2023-10-11 22:59:24', '2024-01-03 22:04:36'),
(24, 9, '18851/1', '18851/1 - deposit', 'Account 18851/1 - deposit of 20,000.00€', 0, 0, 1, NULL, '2023-10-12 15:19:15', '2024-01-03 02:22:24'),
(25, 33, '18851/4', '18851/4 - deposit', 'Account 18851/4 - deposit of 20,000.00€', 0, 0, 1, NULL, '2023-10-12 15:21:08', '2023-12-16 22:05:59'),
(26, 38, '18851/3/1/2', '18851/3/1/2 - deposit', 'Account 18851/3/1/2 - deposit of 20,000.00€', 0, 0, 1, NULL, '2023-10-12 21:02:45', '2023-12-23 03:52:39'),
(27, 34, '18851/1/1', '18851/1/1 - deposit', 'Account 18851/1/1 - deposit of 5,512.00€', 0, 0, 0, NULL, '2023-10-16 15:14:52', '2023-10-16 15:14:52'),
(28, 39, '18851/7', '18851/7 - deposit', 'Account 18851/7 - deposit of 20,000.00€', 0, 0, 0, NULL, '2023-10-16 15:32:38', '2023-10-16 15:32:38'),
(29, 39, '18851/7', '18851/7 - deposit', 'Account 18851/7 - deposit of 25,000.00€', 0, 0, 0, NULL, '2023-10-16 15:33:14', '2023-10-16 15:33:14'),
(30, 56, '18851/19', '18851/19 - deposit', 'Account 18851/19 - deposit of 22,341.16€', 0, 0, 1, NULL, '2023-11-03 17:45:21', '2024-01-04 06:07:55'),
(31, 56, '18851/19', '18851/19 - deposit', 'Account 18851/19 - deposit of 5,581.50€', 0, 0, 1, NULL, '2023-11-06 16:30:05', '2024-01-04 06:07:55'),
(32, 57, '18851/20', '18851/20 - deposit', 'Account 18851/20 - deposit of 11,146.00€', 0, 0, 0, NULL, '2023-11-13 20:10:12', '2023-11-13 20:10:12'),
(33, 32, '18851/11/1', '18851/11/1 - deposit', 'Account 18851/11/1 - deposit of 22,821.50€', 0, 0, 1, NULL, '2023-11-27 15:48:59', '2023-12-14 06:17:41'),
(34, 60, '18851/23/1', '18851/23 - deposit', 'Account 18851/23 - deposit of 50,000.00€', 0, 0, 1, NULL, '2023-12-06 20:03:35', '2023-12-15 00:52:58'),
(35, 60, '18851/23', '18851/23/1 - deposit', 'Account 18851/23/1 - deposit of 50,000.00€', 0, 0, 1, NULL, '2023-12-06 20:04:27', '2023-12-15 00:52:58'),
(36, 60, '18851/23/1', '18851/23 - withdrawal', 'Account 18851/23 - withdrawal of 25,000.00€', 0, 0, 1, NULL, '2023-12-06 20:05:22', '2023-12-15 00:52:58'),
(37, 60, '18851/23', '18851/23/1 - withdrawal', 'Account 18851/23/1 - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2023-12-06 20:05:58', '2023-12-15 00:52:58'),
(38, 60, '18851/23/1', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 692.25€', 0, 0, 1, NULL, '2023-12-06 20:16:33', '2023-12-15 00:52:58'),
(39, 60, '18851/23/1', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 2,155.45€', 0, 0, 1, NULL, '2023-12-06 20:19:40', '2023-12-15 00:52:58'),
(40, 60, '18851/23/1', '18851/23 - Fees paid', 'Account 18851/23 - Fees paid of 11,878.80€', 0, 0, 1, NULL, '2023-12-06 20:21:41', '2023-12-15 00:52:58'),
(41, 60, '18851/23/1', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 2,731.60€', 0, 0, 1, NULL, '2023-12-06 20:30:53', '2023-12-15 00:52:58'),
(42, 60, '18851/23/1', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 2,155.45€', 0, 0, 1, NULL, '2023-12-06 20:31:59', '2023-12-15 00:52:58'),
(43, 60, '18851/23/1', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 1,551.54€', 0, 0, 1, NULL, '2023-12-06 20:32:55', '2023-12-15 00:52:58'),
(44, 60, '18851/23/1', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 1,769.92€', 0, 0, 1, NULL, '2023-12-06 20:35:28', '2023-12-15 00:52:58'),
(45, 60, '18851/23/1', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 1,967.98€', 0, 0, 1, NULL, '2023-12-06 20:36:55', '2023-12-15 00:52:58'),
(46, 1, '999', 'New balance for 999', 'New Balance for Month End 2023.11 is available now.', 0, 0, 0, '2023-12-10 14:53:51', '2023-12-10 19:51:36', '2023-12-10 19:53:51'),
(47, 1, '999', 'New balance for 999', 'New Balance for Month End 2023.11 is available now.', 0, 0, 0, '2023-12-10 14:53:47', '2023-12-10 19:53:41', '2023-12-10 19:53:47'),
(48, 59, '18851/22', 'New balance for 18851/22', 'New Balance for Month End 2023.11 is available now.', 0, 0, 0, '2023-12-12 06:55:12', '2023-12-10 20:40:32', '2023-12-12 11:55:12'),
(49, 59, '18851/22', '18851/22 - deposit', 'Account 18851/22 - deposit of 51,445.58€', 0, 0, 0, '2023-12-12 06:55:12', '2023-12-10 20:42:22', '2023-12-12 11:55:12'),
(50, 32, '18851/11/1', 'New balance for 18851/11/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, '2023-12-13 12:59:11', '2023-12-11 17:25:42', '2023-12-13 17:59:11'),
(51, 60, '18851/23', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 11,146.00€', 0, 0, 1, NULL, '2023-12-12 14:41:12', '2023-12-15 00:52:58'),
(52, 60, '18851/23', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 2,155.45€', 0, 0, 1, NULL, '2023-12-12 14:41:48', '2023-12-15 00:52:58'),
(53, 60, '18851/23', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 1,769.92€', 0, 0, 1, NULL, '2023-12-12 14:42:20', '2023-12-15 00:52:58'),
(54, 60, '18851/23', '18851/23 - Referral Fees received', 'Account 18851/23 - Referral Fees received of 2,731.60€', 0, 0, 1, NULL, '2023-12-12 14:43:13', '2023-12-15 00:52:58'),
(55, 1, NULL, 'Security action required', 'You need to update your password because you are using it over 90 days.', 0, 0, 0, '2023-12-13 11:38:39', '2023-12-13 16:37:59', '2023-12-13 16:38:39'),
(56, 54, '18851/18/1', 'New balance for 18851/18/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 19:06:48', '2023-12-15 00:27:30'),
(57, 47, '18851/11', 'New balance for 18851/11', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, '2023-12-18 23:37:25', '2023-12-14 19:39:57', '2023-12-19 04:37:25'),
(58, 9, '18851/1', 'New balance for 18851/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 19:42:08', '2024-01-03 02:22:24'),
(59, 47, '18851/11', 'New balance for 18851/11', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, '2023-12-18 23:37:25', '2023-12-14 19:43:52', '2023-12-19 04:37:25'),
(60, 34, '18851/1/1', 'New balance for 18851/1/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-14 19:44:41', '2023-12-14 19:44:41'),
(61, 46, '18851/10', 'New balance for 18851/10', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 19:46:11', '2024-02-15 03:38:21'),
(62, 32, '18851/11/1', 'New balance for 18851/11/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 19:47:12', '2023-12-14 23:05:20'),
(63, 46, '18851/10', 'New balance for 18851/10', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 23:44:14', '2024-02-15 03:38:21'),
(64, 45, '18851/12', 'New balance for 18851/12', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 23:45:52', '2024-01-03 15:23:08'),
(65, 42, '18851/13', 'New balance for 18851/13', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-14 23:47:06', '2023-12-14 23:47:06'),
(66, 40, '18851/14', 'New balance for 18851/14', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 23:48:40', '2024-01-31 16:05:30'),
(67, 40, '18851/14', 'New balance for 18851/14', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 23:49:10', '2024-01-31 16:05:30'),
(68, 41, '18851/15', 'New balance for 18851/15', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, '2023-12-15 09:24:06', '2023-12-14 23:50:16', '2023-12-15 14:24:06'),
(69, 49, '18851/16', 'New balance for 18851/16', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-14 23:51:26', '2023-12-14 23:51:26'),
(70, 52, '18851/17', 'New balance for 18851/17', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-14 23:52:14', '2023-12-14 23:52:14'),
(71, 54, '18851/18', 'New balance for 18851/18', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 23:53:38', '2023-12-15 00:27:30'),
(72, 56, '18851/19', 'New balance for 18851/19', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-14 23:54:42', '2024-01-04 06:07:55'),
(73, 57, '18851/20', 'New balance for 18851/20', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-14 23:58:36', '2023-12-14 23:58:36'),
(74, 59, '18851/22', 'New balance for 18851/22', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:00:15', '2023-12-28 19:49:06'),
(75, 60, '18851/23', 'New balance for 18851/23', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:02:13', '2023-12-15 00:52:58'),
(76, 60, '18851/23/1', 'New balance for 18851/23/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:03:03', '2023-12-15 00:52:58'),
(77, 48, '18851/3', 'New balance for 18851/3', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:04:09', '2024-01-19 04:15:41'),
(78, 53, '18851/3/1', 'New balance for 18851/3/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:05:13', '2024-01-03 22:04:36'),
(79, 38, '18851/3/1/2', 'New balance for 18851/3/1/2', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:06:19', '2023-12-23 03:52:39'),
(81, 33, '18851/4', 'New balance for 18851/4', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:09:53', '2023-12-16 22:05:59'),
(82, 55, '18851/4/1', 'New balance for 18851/4/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:10:49', '2024-02-28 00:41:51'),
(83, 36, '18851/5', 'New balance for 18851/5', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:11:54', '2023-12-23 18:57:39'),
(84, 35, '18851/6', 'New balance for 18851/6', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-15 00:13:11', '2023-12-15 00:13:11'),
(85, 35, '18851/6/1', 'New balance for 18851/6/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-15 00:14:18', '2023-12-15 00:14:18'),
(86, 43, '18851/8', 'New balance for 18851/8', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 1, NULL, '2023-12-15 00:15:27', '2024-01-01 01:32:02'),
(87, 44, '18851/9 jnt', 'New balance for 18851/9 jnt', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-15 00:16:27', '2023-12-15 00:16:27'),
(88, 35, '18851/6', 'New balance for 18851/6', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-15 01:08:33', '2023-12-15 01:08:33'),
(89, 35, '18851/6/1', 'New balance for 18851/6/1', 'New Balance for Month End 2023.11 and statement is available now.', 0, 0, 0, NULL, '2023-12-15 01:09:22', '2023-12-15 01:09:22'),
(90, 9, '18851/1', 'New balance for 18851/1', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 17:44:55', '2024-01-03 02:22:24'),
(91, 34, '18851/1/1', 'New balance for 18851/1/1', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 17:46:48', '2024-01-02 17:46:48'),
(92, 46, '18851/10', 'New balance for 18851/10', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 17:52:28', '2024-02-15 03:38:21'),
(93, 47, '18851/11', 'New balance for 18851/11', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 17:54:42', '2024-01-02 20:13:57'),
(94, 32, '18851/11/1', 'New balance for 18851/11/1', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 17:55:47', '2024-01-02 20:12:03'),
(95, 45, '18851/12', 'New balance for 18851/12', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 17:56:41', '2024-01-03 15:23:08'),
(96, 42, '18851/13', 'New balance for 18851/13', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 17:57:52', '2024-01-02 17:57:52'),
(97, 40, '18851/14', 'New balance for 18851/14', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 17:58:40', '2024-01-31 16:05:30'),
(98, 41, '18851/15', 'New balance for 18851/15', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 17:59:47', '2024-01-03 03:35:56'),
(99, 49, '18851/16', 'New balance for 18851/16', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 18:00:37', '2024-01-02 18:00:37'),
(100, 52, '18851/17', 'New balance for 18851/17', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 18:00:57', '2024-01-02 18:00:57'),
(101, 54, '18851/18', 'New balance for 18851/18', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:02:24', '2024-01-03 01:22:01'),
(102, 54, '18851/18/1', 'New balance for 18851/18/1', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:03:10', '2024-01-03 01:22:01'),
(103, 56, '18851/19', 'New balance for 18851/19', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:04:07', '2024-01-04 06:07:55'),
(104, 37, '18851/2', 'New balance for 18851/2', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 18:05:42', '2024-01-02 18:05:42'),
(105, 57, '18851/20', 'New balance for 18851/20', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 18:07:07', '2024-01-02 18:07:07'),
(106, 59, '18851/22', 'New balance for 18851/22', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:08:27', '2024-01-25 23:00:34'),
(107, 60, '18851/23', 'New balance for 18851/23', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:09:41', '2024-01-02 18:41:15'),
(108, 60, '18851/23/1', 'New balance for 18851/23/1', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:11:01', '2024-01-02 18:41:15'),
(109, 48, '18851/3', 'New balance for 18851/3', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:18:56', '2024-01-19 04:15:41'),
(110, 53, '18851/3/1', 'New balance for 18851/3/1', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:20:08', '2024-01-03 22:04:36'),
(111, 38, '18851/3/1/2', 'New balance for 18851/3/1/2', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:21:14', '2024-01-03 22:13:13'),
(113, 33, '18851/4', 'New balance for 18851/4', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:22:59', '2024-01-04 00:37:14'),
(114, 55, '18851/4/1', 'New balance for 18851/4/1', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:23:48', '2024-02-28 00:41:51'),
(115, 36, '18851/5', 'New balance for 18851/5', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:24:49', '2024-01-04 21:54:08'),
(116, 35, '18851/6', 'New balance for 18851/6', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 18:26:15', '2024-01-02 18:26:15'),
(117, 35, '18851/6/1', 'New balance for 18851/6/1', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 18:27:16', '2024-01-02 18:27:16'),
(118, 39, '18851/7', 'New balance for 18851/7', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 18:28:08', '2024-01-02 18:28:08'),
(119, 39, '18851/7/1', 'New balance for 18851/7/1', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 18:29:05', '2024-01-02 18:29:05'),
(120, 43, '18851/8', 'New balance for 18851/8', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-02 18:29:59', '2024-01-16 23:20:57'),
(121, 44, '18851/9 jnt', 'New balance for 18851/9 jnt', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 0, NULL, '2024-01-02 18:31:02', '2024-01-02 18:31:02'),
(122, 48, '18851/3', '18851/3 - deposit', 'Account 18851/3 - deposit of 262,632.96€', 0, 0, 1, NULL, '2024-01-03 13:59:21', '2024-01-19 04:15:41'),
(123, 54, '18851/18/1', '18851/18/1 - deposit', 'Account 18851/18/1 - deposit of 11,614.00€', 0, 0, 1, NULL, '2024-01-06 15:37:17', '2024-01-12 01:17:57'),
(124, 53, '18851/3/1', '18851/3/1 - deposit', 'Account 18851/3/1 - deposit of 92,480.00€', 0, 0, 1, NULL, '2024-01-13 22:37:10', '2024-01-16 03:10:31'),
(125, 53, '18851/3/1', '18851/3/1 - deposit', 'Account 18851/3/1 - deposit of 93,736.00€', 0, 0, 1, NULL, '2024-01-13 22:37:49', '2024-01-16 03:10:31'),
(127, 64, '18851/25', 'New balance for 18851/25', 'New Balance for Month End 2024.0 and statement is available now.', 0, 0, 1, NULL, '2024-01-30 13:08:17', '2024-01-30 13:12:27'),
(128, 64, '18851/25', '18851/25 - deposit', 'Account 18851/25 - deposit of 25,000.00€', 0, 0, 1, NULL, '2024-01-30 13:09:59', '2024-01-30 13:12:27'),
(129, 9, '18851/1', 'New balance for 18851/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(130, 32, '18851/11/1', 'New balance for 18851/11/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(131, 33, '18851/4', 'New balance for 18851/4', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:49', '2024-02-07 17:48:00'),
(132, 35, '18851/6', 'New balance for 18851/6', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(133, 36, '18851/5', 'New balance for 18851/5', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:49', '2024-02-29 22:48:07'),
(134, 34, '18851/1/1', 'New balance for 18851/1/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(135, 37, '18851/2', 'New balance for 18851/2', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(136, 38, '18851/3/1/2', 'New balance for 18851/3/1/2', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:49', '2024-02-13 14:41:30'),
(137, 39, '18851/7/1', 'New balance for 18851/7/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(138, 40, '18851/14', 'New balance for 18851/14', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:49', '2024-02-03 13:25:08'),
(139, 41, '18851/15', 'New balance for 18851/15', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:49', '2024-02-02 23:35:38'),
(140, 42, '18851/13', 'New balance for 18851/13', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(141, 43, '18851/8', 'New balance for 18851/8', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(142, 35, '18851/6/1', 'New balance for 18851/6/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(143, 44, '18851/9 jnt', 'New balance for 18851/9 jnt', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(144, 45, '18851/12', 'New balance for 18851/12', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(145, 46, '18851/10', 'New balance for 18851/10', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:49', '2024-02-15 03:38:21'),
(146, 47, '18851/11', 'New balance for 18851/11', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:49', '2024-02-03 02:16:36'),
(147, 48, '18851/3', 'New balance for 18851/3', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:49', '2024-02-03 18:32:34'),
(148, 39, '18851/7', 'New balance for 18851/7', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(149, 52, '18851/17', 'New balance for 18851/17', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(150, 49, '18851/16', 'New balance for 18851/16', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(151, 53, '18851/3/1', 'New balance for 18851/3/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:50', '2024-02-05 19:09:31'),
(152, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:50', '2024-02-25 00:30:59'),
(153, 54, '18851/18', 'New balance for 18851/18', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:50', '2024-02-03 19:36:19'),
(154, 55, '18851/4/1', 'New balance for 18851/4/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:50', '2024-02-28 00:41:51'),
(155, 56, '18851/19', 'New balance for 18851/19', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(156, 57, '18851/20', 'New balance for 18851/20', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(157, 59, '18851/22', 'New balance for 18851/22', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(158, 60, '18851/23', 'New balance for 18851/23', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:50', '2024-02-12 13:54:19'),
(159, 60, '18851/23/1', 'New balance for 18851/23/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:50', '2024-02-12 13:54:19'),
(160, 54, '18851/18/1', 'New balance for 18851/18/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:50', '2024-02-03 19:36:19'),
(161, 64, '18851/25', 'New balance for 18851/25', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-02 21:19:50', '2024-02-03 20:53:32'),
(162, 60, '18851/23', 'New balance for 18851/23', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-04 11:58:43', '2024-02-12 13:54:19'),
(163, 54, '18851/18/1', 'New balance for 18851/18/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-04 18:32:26', '2024-02-06 12:09:32'),
(164, 69, '18851/30', '18851/30 - deposit', 'Account 18851/30 - deposit of 22,955.00€', 0, 0, 0, NULL, '2024-02-06 21:13:29', '2024-02-06 21:13:29'),
(165, 71, '18851/32', '18851/32 - deposit', 'Account 18851/32 - deposit of 5,000.00€', 0, 0, 0, NULL, '2024-02-06 21:14:10', '2024-02-06 21:14:10'),
(166, 71, '18851/32', 'New balance for 18851/32', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-06 21:15:04', '2024-02-06 21:15:04'),
(167, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-06 21:16:04', '2024-02-06 21:25:43'),
(168, 69, '18851/30', 'New balance for 18851/30', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-06 21:16:41', '2024-02-06 21:16:41'),
(169, 65, '18851/26', '18851/26 - deposit', 'Account 18851/26 - deposit of 25,000.00€', 0, 0, 1, NULL, '2024-02-06 21:23:27', '2024-02-06 21:25:43'),
(170, 67, '18851/28', 'New balance for 18851/28', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-07 15:14:47', '2024-02-13 20:31:41'),
(171, 67, '18851/28', '18851/28 - deposit', 'Account 18851/28 - deposit of 23,468.36€', 0, 0, 1, NULL, '2024-02-07 15:15:44', '2024-02-13 20:31:41'),
(172, 68, '18851/29', 'New balance for 18851/29', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-07 15:16:19', '2024-02-07 15:16:19'),
(173, 68, '18851/29', '18851/29 - deposit', 'Account 18851/29 - deposit of 11,734.18€', 0, 0, 0, NULL, '2024-02-07 15:17:12', '2024-02-07 15:17:12'),
(174, 66, '18851/27', 'New balance for 18851/27', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-07 16:22:37', '2024-02-07 18:25:53'),
(175, 66, '18851/27', '18851/27 - deposit', 'Account 18851/27 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-07 16:23:50', '2024-02-07 18:25:53'),
(176, 70, '18851/31', 'New balance for 18851/31', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-08 17:50:32', '2024-02-13 00:55:11'),
(177, 70, '18851/31', '18851/31 - deposit', 'Account 18851/31 - deposit of 100,000.00€', 0, 0, 1, NULL, '2024-02-08 17:51:38', '2024-02-13 00:55:11'),
(178, 72, '123 test', 'New balance for 123 test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 00:19:31', '2024-02-12 00:23:49'),
(179, 60, '18851/23', '18851/23 - Deposit from RF', 'Account 18851/23 - Deposit from RF of 17,802.97€', 0, 0, 1, NULL, '2024-02-12 12:51:00', '2024-02-12 13:54:19'),
(180, 9, '18851/1', 'New balance for 18851/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:51', '2024-02-12 13:01:51'),
(181, 32, '18851/11/1', 'New balance for 18851/11/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(182, 33, '18851/4', 'New balance for 18851/4', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:52', '2024-02-13 21:17:29'),
(183, 35, '18851/6', 'New balance for 18851/6', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(184, 36, '18851/5', 'New balance for 18851/5', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:52', '2024-02-29 22:48:07'),
(185, 34, '18851/1/1', 'New balance for 18851/1/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(186, 37, '18851/2', 'New balance for 18851/2', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(187, 38, '18851/3/1/2', 'New balance for 18851/3/1/2', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:52', '2024-02-13 14:41:30'),
(188, 39, '18851/7/1', 'New balance for 18851/7/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(189, 40, '18851/14', 'New balance for 18851/14', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(190, 41, '18851/15', 'New balance for 18851/15', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:52', '2024-02-12 15:57:16'),
(191, 42, '18851/13', 'New balance for 18851/13', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(192, 43, '18851/8', 'New balance for 18851/8', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(193, 35, '18851/6/1', 'New balance for 18851/6/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(194, 44, '18851/9 jnt', 'New balance for 18851/9 jnt', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(195, 45, '18851/12', 'New balance for 18851/12', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(196, 46, '18851/10', 'New balance for 18851/10', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:52', '2024-02-15 03:38:21'),
(197, 47, '18851/11', 'New balance for 18851/11', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:52', '2024-02-17 20:27:22'),
(198, 48, '18851/3', 'New balance for 18851/3', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(199, 39, '18851/7', 'New balance for 18851/7', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(200, 52, '18851/17', 'New balance for 18851/17', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(201, 49, '18851/16', 'New balance for 18851/16', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(202, 53, '18851/3/1', 'New balance for 18851/3/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(203, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:52', '2024-02-25 00:30:59'),
(204, 54, '18851/18', 'New balance for 18851/18', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:52', '2024-02-15 03:32:33'),
(205, 55, '18851/4/1', 'New balance for 18851/4/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:52', '2024-02-28 00:41:51'),
(206, 56, '18851/19', 'New balance for 18851/19', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(207, 57, '18851/20', 'New balance for 18851/20', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(208, 59, '18851/22', 'New balance for 18851/22', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(209, 60, '18851/23', 'New balance for 18851/23', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:53', '2024-02-12 13:54:19'),
(210, 60, '18851/23/1', 'New balance for 18851/23/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:53', '2024-02-12 13:54:19'),
(211, 54, '18851/18/1', 'New balance for 18851/18/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:53', '2024-02-15 03:32:33'),
(212, 64, '18851/25', 'New balance for 18851/25', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:53', '2024-02-12 15:20:45'),
(213, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:53', '2024-02-12 15:14:52'),
(214, 66, '18851/27', 'New balance for 18851/27', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:53', '2024-02-13 15:40:40'),
(215, 67, '18851/28', 'New balance for 18851/28', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:53', '2024-02-13 20:31:41'),
(216, 68, '18851/29', 'New balance for 18851/29', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(217, 69, '18851/30', 'New balance for 18851/30', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(218, 70, '18851/31', 'New balance for 18851/31', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:53', '2024-02-13 00:55:11'),
(219, 71, '18851/32', 'New balance for 18851/32', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(220, 72, '123 test', 'New balance for 123 test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-12 13:01:53', '2024-02-13 13:11:09'),
(221, 35, '18851/6', 'New balance for 18851/6', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:07:47', '2024-02-12 13:07:47'),
(222, 35, '18851/6/1', 'New balance for 18851/6/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-12 13:11:12', '2024-02-12 13:11:12'),
(223, 73, '18851/33', 'New balance for 18851/33', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-15 12:52:37', '2024-02-15 12:52:37'),
(224, 1, 'Test', 'New balance for Test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-15 16:13:17', '2024-02-25 00:30:59'),
(225, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-19 22:34:57', '2024-02-25 00:30:59'),
(226, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-19 22:37:14', '2024-02-25 00:30:59'),
(227, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-19 22:37:28', '2024-02-25 00:30:59'),
(228, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-19 22:37:55', '2024-02-25 00:30:59'),
(229, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-19 22:39:39', '2024-02-25 00:30:59'),
(230, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-19 22:39:51', '2024-02-25 00:30:59'),
(231, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-19 22:41:22', '2024-02-25 00:30:59'),
(239, 1, '999', '999 - deposit', 'Account 999 - deposit of 25,000.00€', 0, 0, 1, NULL, '2024-02-20 21:19:03', '2024-02-25 00:30:59'),
(240, 1, 'Test', 'New balance for Test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-20 22:15:26', '2024-02-25 00:30:59'),
(241, 1, 'Test', 'New balance for Test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-20 22:15:27', '2024-02-25 00:30:59'),
(242, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-20 22:20:24', '2024-02-25 00:30:59'),
(243, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-20 22:20:45', '2024-02-25 00:30:59'),
(244, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-23 19:06:42', '2024-02-25 00:30:59'),
(245, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-23 19:06:51', '2024-02-25 00:30:59'),
(246, 1, '999', '999 - deposit', 'Account 999 - deposit of 1,000.00€', 0, 0, 1, NULL, '2024-02-25 19:31:43', '2024-02-25 19:32:25'),
(247, 1, '999', '999 - Fees paid', 'Account 999 - Fees paid of 1,000.00€', 0, 0, 1, NULL, '2024-02-25 19:33:38', '2024-02-25 19:33:44'),
(248, 1, '999', '999 - deposit', 'Account 999 - deposit of 1,000.00€', 0, 0, 1, NULL, '2024-02-25 19:46:40', '2024-02-25 19:46:51'),
(249, 1, 'Test', 'Test - withdrawal', 'Account Test - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-25 19:52:26', '2024-02-25 19:52:29'),
(250, 1, 'Test', 'Test - withdrawal', 'Account Test - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-25 19:54:58', '2024-02-25 19:55:02'),
(251, 1, 'Test', 'Test - withdrawal', 'Account Test - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-25 19:57:22', '2024-02-25 20:10:14'),
(252, 1, 'Test', 'Test - deposit', 'Account Test - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-25 20:05:55', '2024-02-25 20:10:14'),
(253, 1, 'Test', 'Test - deposit', 'Account Test - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-25 20:07:51', '2024-02-25 20:10:14'),
(254, 1, 'Test', 'Test - deposit', 'Account Test - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-25 20:09:56', '2024-02-25 20:10:14'),
(255, 1, '999', '999 - deposit', 'Account 999 - deposit of 999.00€', 0, 0, 1, NULL, '2024-02-25 20:51:31', '2024-02-26 19:02:57'),
(256, 1, '999', '999 - deposit', 'Account 999 - deposit of 25,000.00€', 0, 0, 1, NULL, '2024-02-26 13:00:15', '2024-02-26 19:02:57'),
(257, 72, '123 test', 'New balance for 123 test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-26 18:07:52', '2024-02-26 18:07:52'),
(258, 72, '123 test', 'New balance for 123 test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-26 18:08:13', '2024-02-26 18:08:13'),
(259, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-26 18:12:48', '2024-02-26 19:02:57'),
(260, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-26 18:13:33', '2024-02-26 19:02:57'),
(261, 1, 'Test', 'Test - withdrawal', 'Account Test - withdrawal of 5,000.00€', 0, 0, 1, NULL, '2024-02-26 18:15:13', '2024-02-26 19:02:57'),
(262, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-26 18:21:49', '2024-02-26 19:02:57'),
(263, 1, 'Test', 'Test - withdrawal', 'Account Test - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-26 18:22:47', '2024-02-26 19:02:57'),
(264, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 9,999.00€', 0, 0, 1, NULL, '2024-02-26 18:25:19', '2024-02-26 19:02:57'),
(265, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-26 21:58:53', '2024-02-28 14:37:29'),
(266, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-26 22:01:34', '2024-02-28 14:37:29'),
(267, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-26 22:02:07', '2024-02-28 14:37:29'),
(268, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-26 22:31:29', '2024-02-28 14:37:29'),
(269, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-26 22:32:36', '2024-02-28 14:37:29'),
(270, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-26 22:33:08', '2024-02-28 14:37:29'),
(271, 1, 'Test', 'New balance for Test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-26 22:35:21', '2024-02-28 14:37:29'),
(272, 1, 'Test', 'New balance for Test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-26 22:40:10', '2024-02-28 14:37:29'),
(273, 75, '18851/34', '18851/34 - deposit', 'Account 18851/34 - deposit of 25,000.00€', 0, 0, 1, '2024-02-27 10:19:15', '2024-02-27 15:15:31', '2024-02-27 15:19:15'),
(274, 75, '18851/34', 'New balance for 18851/34', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, '2024-02-27 10:19:04', '2024-02-27 15:16:06', '2024-02-27 15:19:04'),
(275, 75, '18851/34', 'New balance for 18851/34', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, '2024-02-27 10:18:56', '2024-02-27 15:16:31', '2024-02-27 15:18:56'),
(276, 75, '18851/34', 'New balance for 18851/34', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, '2024-02-27 10:23:12', '2024-02-27 15:22:23', '2024-02-27 15:23:12'),
(277, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-27 16:10:14', '2024-02-28 14:37:29'),
(278, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-27 16:20:53', '2024-02-28 14:37:29'),
(279, 1, '999', '999 - deposit', 'Account 999 - deposit of 123,123.00€', 0, 0, 1, NULL, '2024-02-27 16:21:42', '2024-02-28 14:37:29'),
(280, 1, 'Test', 'Test - withdrawal', 'Account Test - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-27 16:23:13', '2024-02-28 14:37:29'),
(281, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-27 16:24:42', '2024-02-28 14:37:29'),
(282, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-27 18:26:51', '2024-02-28 14:37:29'),
(283, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-27 18:40:52', '2024-02-28 14:37:29'),
(284, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 20,000.00€', 0, 0, 1, NULL, '2024-02-27 18:41:22', '2024-02-28 14:37:29'),
(285, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-27 18:43:44', '2024-02-28 14:37:29'),
(286, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-27 18:44:09', '2024-02-28 14:37:29'),
(287, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-27 18:46:07', '2024-02-28 14:37:29'),
(288, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-27 19:17:42', '2024-02-28 14:37:29'),
(289, 1, 'Test', 'Test - withdrawal', 'Account Test - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-27 19:23:45', '2024-02-28 14:37:29'),
(290, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-27 19:24:26', '2024-02-28 14:37:29'),
(291, 36, '18851/5', 'New balance for 18851/5', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-27 20:08:12', '2024-02-29 22:48:07'),
(292, 59, '18851/22', 'New balance for 18851/22', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 20:10:49', '2024-02-27 20:10:49'),
(293, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 20:41:58', '2024-02-27 20:41:58'),
(294, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 20:41:58', '2024-02-27 20:41:58'),
(295, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 20:41:58', '2024-02-27 20:41:58'),
(296, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 20:41:58', '2024-02-27 20:41:58'),
(297, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 20:41:58', '2024-02-27 20:41:58'),
(298, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 20:44:52', '2024-02-27 20:44:52'),
(299, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 20:45:33', '2024-02-27 20:45:33'),
(300, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 20:48:02', '2024-02-27 20:48:02'),
(301, 60, '18851/23', 'New balance for 18851/23', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-27 21:20:32', '2024-02-27 21:20:32'),
(302, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:06:38', '2024-02-28 01:06:38'),
(303, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:08:26', '2024-02-28 01:08:26'),
(304, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:09:42', '2024-02-28 01:09:42'),
(305, 48, '18851/3', 'New balance for 18851/3', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:23:50', '2024-02-28 01:23:50'),
(306, 48, '18851/3', 'New balance for 18851/3', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:24:49', '2024-02-28 01:24:49'),
(307, 53, '18851/3/1', 'New balance for 18851/3/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:28:50', '2024-02-28 01:28:50');
INSERT INTO `alerts` (`id`, `user_id`, `account`, `alert_short`, `alert_long`, `softbreach`, `hardbreach`, `seen`, `deleted_at`, `created_at`, `updated_at`) VALUES
(308, 53, '18851/3/1', 'New balance for 18851/3/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:30:10', '2024-02-28 01:30:10'),
(309, 53, '18851/3/1', 'New balance for 18851/3/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:31:02', '2024-02-28 01:31:02'),
(310, 68, '18851/29', 'New balance for 18851/29', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:35:16', '2024-02-28 01:35:16'),
(311, 67, '18851/28', 'New balance for 18851/28', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 01:37:32', '2024-02-28 01:37:32'),
(312, 66, '18851/27', 'New balance for 18851/27', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-28 01:41:09', '2024-02-28 15:47:42'),
(313, 64, '18851/25', 'New balance for 18851/25', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-28 01:43:39', '2024-02-28 19:04:34'),
(314, 64, '18851/25', 'New balance for 18851/25', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-28 01:44:40', '2024-02-28 19:04:34'),
(315, 64, '18851/25', 'New balance for 18851/25', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-28 01:45:11', '2024-02-28 19:04:34'),
(316, 54, '18851/18/1', 'New balance for 18851/18/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-28 01:48:38', '2024-02-28 23:04:21'),
(317, 54, '18851/18/1', 'New balance for 18851/18/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-28 01:49:15', '2024-02-28 23:04:21'),
(318, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 02:03:25', '2024-02-28 02:03:25'),
(319, 65, '18851/26', '18851/26 - deposit', 'Account 18851/26 - deposit of 25,000.00€', 0, 0, 0, NULL, '2024-02-28 02:06:58', '2024-02-28 02:06:58'),
(320, 65, '18851/26', 'New balance for 18851/26', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-28 02:09:18', '2024-02-28 02:09:18'),
(321, 1, 'Test', 'New balance for Test', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-28 14:38:36', '2024-02-28 18:30:24'),
(322, 60, '18851/23', '18851/23 - Deposit from RF', 'Account 18851/23 - Deposit from RF of 17,802.97€', 0, 0, 0, NULL, '2024-02-28 17:06:30', '2024-02-28 17:06:30'),
(323, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 18:27:04', '2024-02-29 18:43:04'),
(324, 1, '999', '999 - deposit', 'Account 999 - deposit of 10,000.00€', 0, 0, 1, NULL, '2024-02-29 18:29:12', '2024-02-29 18:43:04'),
(325, 1, '999', '999 - deposit', 'Account 999 - deposit of 10,000.00€', 0, 0, 1, NULL, '2024-02-29 18:30:51', '2024-02-29 18:43:04'),
(326, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 18:31:56', '2024-02-29 18:43:04'),
(327, 1, 'Test', 'Test - withdrawal', 'Account Test - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-29 18:43:26', '2024-02-29 19:31:13'),
(328, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 18:43:50', '2024-02-29 19:31:13'),
(329, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 18:49:55', '2024-02-29 19:31:13'),
(330, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 20,000.00€', 0, 0, 1, NULL, '2024-02-29 18:50:12', '2024-02-29 19:31:13'),
(331, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 18:52:34', '2024-02-29 19:31:13'),
(332, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-29 18:52:48', '2024-02-29 19:31:13'),
(333, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 18:55:44', '2024-02-29 19:31:13'),
(334, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 19:22:24', '2024-02-29 19:31:13'),
(335, 1, '999', '999 - deposit', 'Account 999 - deposit of 10,000.00€', 0, 0, 1, NULL, '2024-02-29 19:22:40', '2024-02-29 19:31:13'),
(336, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 19:26:17', '2024-02-29 19:31:13'),
(337, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-02-29 19:26:33', '2024-02-29 19:31:13'),
(338, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 19:33:49', '2024-02-29 19:37:48'),
(339, 1, '999', '999 - deposit', 'Account 999 - deposit of 20,000.00€', 0, 0, 1, NULL, '2024-02-29 19:34:09', '2024-02-29 19:37:48'),
(340, 1, '999', '999 - deposit', 'Account 999 - deposit of 10,000.00€', 0, 0, 1, NULL, '2024-02-29 19:36:47', '2024-02-29 19:37:48'),
(341, 1, '999', '999 - deposit', 'Account 999 - deposit of 10,000.00€', 0, 0, 1, NULL, '2024-02-29 19:39:03', '2024-03-01 00:17:25'),
(342, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 19:41:53', '2024-03-01 00:17:25'),
(343, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 19:42:15', '2024-03-01 00:17:25'),
(344, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 19:45:29', '2024-03-01 00:17:25'),
(345, 1, '999', '999 - deposit', 'Account 999 - deposit of 1,000.00€', 0, 0, 1, NULL, '2024-02-29 19:48:34', '2024-03-01 00:17:25'),
(346, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 19:50:32', '2024-03-01 00:17:25'),
(347, 1, '999', '999 - deposit', 'Account 999 - deposit of 1,000.00€', 0, 0, 1, NULL, '2024-02-29 19:50:45', '2024-03-01 00:17:25'),
(348, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 19:53:39', '2024-03-01 00:17:25'),
(349, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 19:55:06', '2024-03-01 00:17:25'),
(350, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 19:56:51', '2024-03-01 00:17:25'),
(351, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 19:57:36', '2024-03-01 00:17:25'),
(352, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 20:16:02', '2024-03-01 00:17:25'),
(353, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 20:23:07', '2024-03-01 00:17:25'),
(354, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 20:24:54', '2024-03-01 00:17:25'),
(355, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 20:27:15', '2024-03-01 00:17:25'),
(356, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 21:46:03', '2024-03-01 00:17:25'),
(357, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 21:50:03', '2024-03-01 00:17:25'),
(358, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 21:50:30', '2024-03-01 00:17:25'),
(359, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 1,000.00€', 0, 0, 1, NULL, '2024-02-29 21:50:45', '2024-03-01 00:17:25'),
(360, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 21:53:52', '2024-03-01 00:17:25'),
(361, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 22:21:24', '2024-03-01 00:17:25'),
(362, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 22:27:32', '2024-03-01 00:17:25'),
(363, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 22:27:48', '2024-03-01 00:17:25'),
(364, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 22:30:44', '2024-03-01 00:17:25'),
(365, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 22:32:27', '2024-03-01 00:17:25'),
(366, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 22:34:06', '2024-03-01 00:17:25'),
(367, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 22:38:02', '2024-03-01 00:17:25'),
(368, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 22:39:49', '2024-03-01 00:17:25'),
(369, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 22:41:35', '2024-03-01 00:17:25'),
(370, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 22:44:34', '2024-03-01 00:17:25'),
(371, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 1,000.00€', 0, 0, 1, NULL, '2024-02-29 22:46:09', '2024-03-01 00:17:25'),
(372, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 22:47:08', '2024-03-01 00:17:25'),
(373, 9, '18851/1', 'New balance for 18851/1', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 0, NULL, '2024-02-29 23:06:41', '2024-02-29 23:06:41'),
(374, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 23:14:21', '2024-03-01 00:17:25'),
(375, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 23:24:50', '2024-03-01 00:17:25'),
(376, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 23:39:40', '2024-03-01 00:17:25'),
(377, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 23:44:37', '2024-03-01 00:17:25'),
(378, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 23:47:41', '2024-03-01 00:17:25'),
(379, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 23:52:55', '2024-03-01 00:17:25'),
(380, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-02-29 23:55:09', '2024-03-01 00:17:25'),
(381, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 1,000.00€', 0, 0, 1, NULL, '2024-02-29 23:56:53', '2024-03-01 00:17:25'),
(382, 1, '999', '999 - deposit', 'Account 999 - deposit of 5,000.00€', 0, 0, 1, NULL, '2024-02-29 23:57:10', '2024-03-01 00:17:25'),
(383, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-03-01 00:00:11', '2024-03-01 00:17:25'),
(384, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-03-01 00:02:03', '2024-03-01 00:17:25'),
(385, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-03-01 00:03:55', '2024-03-01 00:17:25'),
(386, 1, '999', '999 - withdrawal', 'Account 999 - withdrawal of 10,000.00€', 0, 0, 1, NULL, '2024-03-01 00:05:04', '2024-03-01 00:17:25'),
(387, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-03-01 00:05:29', '2024-03-01 00:17:25'),
(388, 1, '999', 'New balance for 999', 'New Balance for Month End 2024.1 and statement is available now.', 0, 0, 1, NULL, '2024-03-01 00:12:22', '2024-03-01 00:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `conditions` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A1',
  `dd_percentage1` tinyint UNSIGNED NOT NULL DEFAULT '5',
  `dd_percentage2` tinyint UNSIGNED NOT NULL DEFAULT '5',
  `succeed_percentage1` tinyint UNSIGNED DEFAULT '10',
  `succeed_percentage2` tinyint UNSIGNED NOT NULL DEFAULT '10',
  `days_assessment` tinyint NOT NULL DEFAULT '25',
  `days_live` tinyint NOT NULL DEFAULT '30',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `conditions`, `dd_percentage1`, `dd_percentage2`, `succeed_percentage1`, `succeed_percentage2`, `days_assessment`, `days_live`, `created_at`, `updated_at`) VALUES
(1, 'A1', 5, 5, 10, 10, 25, 30, '2023-02-22 02:18:22', '2023-02-22 02:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `dailybalances`
--

CREATE TABLE `dailybalances` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED DEFAULT NULL,
  `dailybalance` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dailybalances`
--

INSERT INTO `dailybalances` (`id`, `account_id`, `dailybalance`, `created_at`, `updated_at`) VALUES
(26, 18, 28495.11, '2023-02-06 05:00:00', NULL),
(27, 18, 29427.42, '2023-02-07 05:00:00', NULL),
(28, 18, 29125.1, '2023-02-08 05:00:00', NULL),
(29, 18, 29267.75, '2023-02-09 05:00:00', NULL),
(30, 18, 29138.92, '2023-02-10 05:00:00', NULL),
(31, 18, 29451.79, '2023-02-13 05:00:00', NULL),
(32, 18, 29516.77, '2023-02-14 05:00:00', NULL),
(33, 18, 29940.08, '2023-02-15 05:00:00', NULL),
(34, 18, 29792.87, '2023-02-16 05:00:00', NULL),
(35, 18, 29615.96, '2023-02-17 05:00:00', NULL),
(36, 18, 29741.6, '2023-02-20 05:00:00', NULL),
(37, 18, 29915.92, '2023-02-21 05:00:00', NULL),
(38, 18, 29827.94, '2023-02-22 05:00:00', NULL),
(39, 18, 30059.81, '2023-02-23 05:00:00', NULL),
(40, 18, 30702.24, '2023-02-24 05:00:00', NULL),
(41, 18, 31135.13, '2023-02-27 05:00:00', NULL),
(42, 18, 31408.89, '2023-03-01 05:00:00', NULL),
(43, 18, 30989.35, '2023-03-02 05:00:00', NULL),
(44, 18, 31382.18, '2023-03-03 05:00:00', NULL),
(45, 18, 32121.8, '2023-03-06 05:00:00', NULL),
(46, 18, 32543.21, '2023-03-07 05:00:00', NULL),
(47, 18, 32399.45, '2023-03-08 05:00:00', NULL),
(48, 18, 32673.86, '2023-03-09 05:00:00', NULL),
(49, 18, 32888.17, '2023-03-10 05:00:00', NULL),
(50, 18, 32569.96, '2023-03-13 04:00:00', NULL),
(51, 18, 33082.83, '2023-03-14 04:00:00', NULL),
(52, 18, 32939.96, '2023-03-15 04:00:00', NULL),
(53, 18, 33104.72, '2023-03-16 04:00:00', NULL),
(54, 18, 32817.09, '2023-03-17 04:00:00', NULL),
(55, 18, 33229.85, '2023-03-20 04:00:00', NULL),
(56, 18, 33093.31, '2023-03-21 04:00:00', NULL),
(57, 18, 33411.72, '2023-03-22 04:00:00', NULL),
(58, 18, 33146.96, '2023-03-23 04:00:00', NULL),
(59, 18, 33283.27, '2023-03-24 04:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eombalances`
--

CREATE TABLE `eombalances` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED DEFAULT NULL,
  `eombalance` double DEFAULT NULL,
  `formonth` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eombalances`
--

INSERT INTO `eombalances` (`id`, `account_id`, `eombalance`, `formonth`, `created_at`, `updated_at`) VALUES
(60, 41, 102092.56, 0, '2023-09-20 20:43:09', '2023-09-20 20:44:30'),
(61, 41, 112914.37, 1, '2023-09-20 20:43:42', '2023-09-20 20:44:39'),
(62, 41, 121834.6, 2, '2023-09-20 20:44:09', '2023-09-20 20:44:59'),
(63, 42, 11450.77, 0, '2023-09-20 22:03:13', '2023-09-20 22:03:13'),
(65, 42, 42488.12, 1, '2023-09-20 22:03:41', '2023-09-20 22:03:41'),
(66, 42, 74907.26, 2, '2023-09-20 22:03:55', '2023-09-20 22:03:55'),
(67, 42, 98112.85, 3, '2023-09-20 22:04:07', '2023-09-20 22:04:07'),
(68, 42, 110180.73, 4, '2023-09-20 22:04:21', '2023-09-20 22:04:21'),
(69, 42, 121496.29, 5, '2023-09-20 22:04:35', '2023-09-20 22:04:35'),
(70, 42, 142502.99, 6, '2023-09-20 22:04:47', '2023-09-20 22:04:47'),
(71, 42, 156183.27, 7, '2023-09-20 22:05:02', '2023-09-20 22:05:02'),
(72, 42, 172738.69, 8, '2023-09-20 22:05:15', '2023-09-20 22:05:15'),
(73, 42, 186385.05, 9, '2023-09-20 22:05:30', '2023-09-20 22:05:30'),
(74, 18, 603732.14, 0, '2023-09-20 22:06:54', '2023-09-20 22:06:54'),
(75, 18, 1425720.19, 1, '2023-09-20 22:11:11', '2023-09-20 22:11:11'),
(76, 18, 1658632.18, 2, '2023-09-20 22:11:23', '2023-09-20 22:11:23'),
(77, 18, 2315722.19, 3, '2023-09-20 22:11:51', '2023-09-20 22:11:51'),
(78, 18, 5201432.06, 4, '2023-09-20 22:12:07', '2023-09-20 22:12:07'),
(79, 18, 7225888.35, 5, '2023-09-20 22:12:20', '2023-09-20 22:12:20'),
(80, 18, 8585726.19, 6, '2023-09-20 22:12:32', '2023-09-20 22:12:32'),
(81, 18, 9641770.51, 7, '2023-09-20 22:12:52', '2023-09-20 22:12:52'),
(82, 18, 10356305.34, 8, '2023-09-20 22:13:05', '2023-09-20 22:13:05'),
(83, 18, 12146910.53, 9, '2023-09-20 22:13:20', '2023-09-20 22:13:20'),
(84, 18, 14236179.1, 10, '2023-09-20 22:13:36', '2023-09-20 22:13:36'),
(85, 18, 15688269.4, 11, '2023-09-20 22:13:53', '2023-09-20 22:13:53'),
(86, 18, 16927642.7, 12, '2023-09-20 22:14:08', '2023-09-20 22:14:08'),
(87, 43, 13432.66, 0, '2023-09-20 22:48:31', '2023-09-20 22:48:31'),
(88, 43, 22333.22, 1, '2023-09-20 22:48:48', '2023-09-20 22:48:48'),
(89, 43, 25080.2, 2, '2023-09-20 22:49:01', '2023-09-20 22:49:01'),
(90, 43, 27655.93, 4, '2023-09-20 22:49:13', '2023-09-20 22:49:13'),
(91, 43, 32437.64, 5, '2023-09-20 22:49:28', '2023-09-20 22:49:28'),
(92, 43, 35551.65, 6, '2023-09-20 22:49:42', '2023-09-20 22:49:42'),
(93, 43, 39320.12, 7, '2023-09-20 22:49:59', '2023-09-20 22:49:59'),
(94, 43, 42426.41, 8, '2023-09-20 22:50:22', '2023-09-25 18:19:05'),
(95, 44, 89551.77, 0, '2023-09-20 22:50:52', '2023-09-20 22:50:52'),
(96, 44, 125001.63, 1, '2023-09-20 22:51:04', '2023-09-20 22:51:04'),
(97, 44, 152651.13, 2, '2023-09-20 22:51:17', '2023-09-20 22:51:17'),
(98, 44, 171427.21, 3, '2023-09-20 22:51:29', '2023-09-20 22:51:29'),
(99, 44, 189032.78, 4, '2023-09-20 22:51:43', '2023-09-20 22:51:43'),
(100, 44, 221716.54, 5, '2023-09-20 22:51:54', '2023-09-20 22:51:54'),
(101, 44, 243001.32, 6, '2023-09-20 22:52:07', '2023-09-20 22:52:07'),
(102, 44, 268759.46, 7, '2023-09-20 22:52:22', '2023-09-20 22:52:22'),
(103, 44, 289991.46, 8, '2023-09-20 22:52:34', '2023-09-20 22:52:34'),
(104, 45, 11231.76, 0, '2023-09-20 22:53:09', '2023-09-20 22:53:09'),
(105, 45, 19665.21, 1, '2023-09-20 22:53:21', '2023-09-20 22:53:21'),
(106, 45, 22084.03, 2, '2023-09-20 22:53:33', '2023-09-20 22:53:33'),
(107, 45, 24352.05, 4, '2023-09-20 22:53:49', '2023-09-20 22:53:49'),
(108, 45, 28562.51, 5, '2023-09-20 22:54:00', '2023-09-20 22:54:00'),
(109, 45, 31304.51, 6, '2023-09-20 22:54:12', '2023-09-20 22:54:12'),
(110, 45, 34622.78, 7, '2023-09-20 22:54:27', '2023-09-20 22:54:27'),
(111, 45, 37357.98, 8, '2023-09-20 22:54:40', '2023-09-20 22:54:40'),
(112, 46, 51270.31, 0, '2023-09-20 22:55:47', '2023-09-20 22:55:47'),
(113, 46, 59821.25, 1, '2023-09-20 22:55:59', '2023-09-20 22:55:59'),
(114, 46, 91712.26, 2, '2023-09-20 22:56:12', '2023-09-20 22:56:12'),
(115, 46, 219221.06, 3, '2023-09-20 22:56:24', '2023-09-20 22:56:24'),
(116, 46, 273009.61, 4, '2023-09-20 22:56:35', '2023-09-20 22:56:35'),
(117, 46, 301565.25, 5, '2023-09-20 22:56:50', '2023-09-20 22:56:50'),
(118, 46, 338657.77, 6, '2023-09-20 22:57:00', '2023-09-20 22:57:00'),
(119, 46, 308939.47, 7, '2023-09-20 22:57:11', '2023-09-20 22:57:11'),
(120, 46, 362355.1, 8, '2023-09-20 22:57:28', '2023-09-20 22:57:28'),
(121, 46, 397141.18, 9, '2023-09-20 22:57:41', '2023-09-20 22:57:41'),
(122, 46, 439238.14, 10, '2023-09-20 22:57:51', '2023-09-20 22:57:51'),
(123, 46, 473937.95, 11, '2023-09-20 22:58:03', '2023-10-03 17:25:18'),
(124, 47, 31880, 0, '2023-09-20 22:58:26', '2023-09-20 22:58:26'),
(125, 47, 36365.28, 1, '2023-09-20 22:58:37', '2023-09-20 22:58:37'),
(126, 47, 39238.14, 2, '2023-09-20 22:58:48', '2023-09-20 22:58:48'),
(127, 48, 87097.5, 0, '2023-09-20 22:59:06', '2023-09-20 22:59:06'),
(128, 48, 97270.48, 1, '2023-09-20 22:59:16', '2023-09-20 22:59:16'),
(129, 48, 11608.44, 2, '2023-09-20 22:59:27', '2023-09-20 22:59:27'),
(130, 48, 12838.93, 3, '2023-09-20 22:59:39', '2023-09-20 22:59:39'),
(131, 48, 13853.21, 4, '2023-09-20 22:59:50', '2023-09-20 22:59:50'),
(132, 49, 26101.6, 0, '2023-09-20 23:00:10', '2023-09-20 23:00:10'),
(133, 49, 28163.63, 1, '2023-09-20 23:00:21', '2023-09-20 23:00:21'),
(134, 50, 59160, 0, '2023-09-20 23:00:38', '2023-09-20 23:00:38'),
(135, 51, 12570.78, 0, '2023-09-20 23:01:09', '2023-09-20 23:01:09'),
(136, 51, 14744.26, 1, '2023-09-20 23:01:26', '2023-09-20 23:01:26'),
(137, 51, 16159.7, 2, '2023-09-20 23:01:38', '2023-09-20 23:01:38'),
(138, 51, 17872.62, 3, '2023-09-20 23:01:50', '2023-09-20 23:01:50'),
(139, 51, 19284.56, 4, '2023-09-20 23:02:03', '2023-09-20 23:02:03'),
(140, 52, 11111.15, 0, '2023-09-20 23:02:36', '2023-09-20 23:02:36'),
(141, 52, 18212.88, 1, '2023-09-20 23:03:41', '2023-09-20 23:03:41'),
(142, 52, 20453.06, 2, '2023-09-20 23:03:51', '2023-09-20 23:03:51'),
(143, 52, 22553.58, 3, '2023-09-20 23:04:02', '2023-09-20 23:04:02'),
(144, 52, 26453.09, 4, '2023-09-20 23:04:12', '2023-09-20 23:04:12'),
(145, 52, 28992.58, 5, '2023-09-20 23:04:31', '2023-09-20 23:04:31'),
(146, 52, 32065.79, 6, '2023-09-20 23:04:43', '2023-09-20 23:04:43'),
(147, 52, 34598.99, 7, '2023-09-20 23:04:54', '2023-09-20 23:04:54'),
(156, 54, 9911.62, 0, '2023-09-20 23:09:01', '2023-09-20 23:09:01'),
(157, 54, 11130.72, 1, '2023-09-20 23:09:13', '2023-09-20 23:09:13'),
(158, 54, 12273.84, 2, '2023-09-20 23:09:26', '2023-09-20 23:09:26'),
(159, 54, 14395.98, 3, '2023-09-20 23:09:36', '2023-09-20 23:09:36'),
(160, 54, 15777.99, 4, '2023-09-20 23:09:48', '2023-09-20 23:09:48'),
(161, 54, 17450.45, 5, '2023-09-20 23:09:59', '2023-09-20 23:09:59'),
(162, 54, 18829.04, 6, '2023-09-20 23:10:09', '2023-09-20 23:10:09'),
(164, 55, 9851.27, 0, '2023-09-20 23:10:45', '2023-09-20 23:10:45'),
(165, 55, 11062.97, 1, '2023-09-20 23:10:56', '2023-09-20 23:10:56'),
(166, 55, 12199.13, 2, '2023-09-20 23:11:10', '2023-09-20 23:11:10'),
(167, 55, 14308.35, 3, '2023-09-20 23:11:22', '2023-09-20 23:11:22'),
(168, 55, 15681.95, 4, '2023-09-20 23:11:38', '2023-09-20 23:11:38'),
(169, 55, 17344.23, 5, '2023-09-20 23:11:49', '2023-09-20 23:11:49'),
(170, 55, 18714.42, 6, '2023-09-20 23:11:59', '2023-09-20 23:11:59'),
(171, 56, 6091.31, 0, '2023-09-20 23:12:20', '2023-09-20 23:12:20'),
(172, 56, 7144.49, 1, '2023-09-20 23:12:29', '2023-09-20 23:12:29'),
(173, 56, 7830.36, 2, '2023-09-20 23:12:39', '2023-09-20 23:12:39'),
(174, 56, 8660.37, 3, '2023-09-20 23:12:52', '2023-09-20 23:12:52'),
(175, 56, 9344.54, 4, '2023-09-20 23:13:02', '2023-09-20 23:13:02'),
(176, 57, 21177.88, 0, '2023-09-20 23:13:25', '2023-09-20 23:13:25'),
(177, 57, 23782.75, 1, '2023-09-20 23:13:34', '2023-09-20 23:13:34'),
(178, 57, 26225.23, 2, '2023-09-20 23:13:44', '2023-09-20 23:13:44'),
(179, 57, 30759.57, 3, '2023-09-20 23:13:55', '2023-09-20 23:13:55'),
(180, 57, 33712.48, 4, '2023-09-20 23:14:05', '2023-09-20 23:14:05'),
(181, 57, 37286, 5, '2023-09-20 23:14:17', '2023-09-20 23:14:17'),
(182, 57, 40231.59, 6, '2023-09-20 23:14:30', '2023-09-20 23:14:30'),
(183, 60, 23767.96, 0, '2023-09-20 23:27:33', '2023-09-20 23:27:33'),
(184, 60, 79512.95, 1, '2023-09-20 23:27:48', '2023-09-20 23:27:48'),
(185, 60, 89293.04, 2, '2023-09-20 23:28:00', '2023-09-20 23:28:00'),
(186, 60, 98436.43, 3, '2023-09-20 23:28:11', '2023-09-20 23:28:11'),
(187, 60, 115487.75, 4, '2023-09-20 23:28:22', '2023-09-20 23:28:22'),
(188, 60, 126574.57, 5, '2023-09-20 23:28:33', '2023-09-20 23:28:33'),
(189, 60, 139991.47, 6, '2023-09-20 23:28:44', '2023-09-20 23:28:44'),
(190, 60, 151050.8, 7, '2023-09-20 23:28:55', '2023-09-20 23:28:55'),
(191, 58, 11632.89, 0, '2023-09-20 23:29:16', '2023-09-20 23:29:16'),
(192, 58, 211600.24, 1, '2023-09-20 23:29:28', '2023-09-20 23:29:28'),
(193, 58, 286713.86, 2, '2023-09-20 23:29:40', '2023-09-20 23:29:40'),
(194, 58, 317105.52, 3, '2023-09-20 23:29:50', '2023-09-20 23:29:50'),
(195, 58, 342156.86, 4, '2023-09-20 23:30:05', '2023-09-20 23:30:05'),
(196, 59, 22655.59, 0, '2023-09-20 23:30:26', '2023-09-20 23:30:26'),
(197, 59, 143886.15, 1, '2023-09-20 23:30:56', '2023-09-20 23:30:56'),
(198, 59, 192645.11, 2, '2023-09-20 23:31:06', '2023-09-20 23:31:06'),
(199, 59, 231071.12, 3, '2023-09-20 23:31:23', '2023-09-20 23:31:23'),
(200, 59, 221438.88, 4, '2023-09-20 23:31:35', '2023-09-20 23:31:35'),
(201, 59, 133910.65, 5, '2023-09-20 23:31:48', '2023-09-20 23:31:48'),
(202, 59, 264970.6, 6, '2023-09-20 23:31:58', '2023-09-20 23:31:58'),
(203, 59, 172141.92, 7, '2023-09-20 23:32:10', '2023-09-20 23:32:10'),
(204, 59, 190388.96, 8, '2023-09-20 23:32:23', '2023-09-20 23:32:23'),
(205, 59, 205429.69, 9, '2023-09-20 23:32:34', '2023-09-20 23:32:34'),
(221, 50, 67146.6, 1, '2023-10-03 17:01:50', '2023-10-03 17:01:50'),
(222, 18, 19212874.47, 13, '2023-10-03 17:06:26', '2023-10-03 17:06:26'),
(223, 45, 42401.31, 9, '2023-10-03 17:07:54', '2023-10-03 17:07:54'),
(224, 57, 43631.16, 7, '2023-10-03 17:09:36', '2023-10-03 17:09:36'),
(225, 58, 388348.04, 5, '2023-10-03 17:18:38', '2023-10-03 17:18:38'),
(226, 41, 138282.27, 3, '2023-10-03 17:21:41', '2023-10-03 17:21:41'),
(227, 56, 10606.05, 5, '2023-10-03 17:22:25', '2023-10-03 17:22:25'),
(228, 51, 20914.11, 5, '2023-10-03 17:23:30', '2023-10-03 17:23:30'),
(229, 49, 31965.72, 2, '2023-10-03 17:24:46', '2023-10-03 17:24:46'),
(230, 46, 513985.71, 12, '2023-10-03 17:26:17', '2023-10-03 17:26:17'),
(231, 59, 222788.5, 10, '2023-10-03 17:27:25', '2023-10-03 17:27:25'),
(232, 47, 42553.76, 3, '2023-10-03 17:28:22', '2023-10-03 17:28:22'),
(234, 42, 202134.59, 10, '2023-10-03 17:31:20', '2023-10-03 17:31:20'),
(236, 44, 329140.31, 9, '2023-10-03 17:35:00', '2023-10-03 17:35:00'),
(237, 43, 46011.44, 9, '2023-10-03 17:36:23', '2023-10-03 17:36:23'),
(238, 54, 20420.09, 7, '2023-10-03 17:37:32', '2023-10-03 17:37:32'),
(239, 60, 163814.59, 8, '2023-10-03 17:38:32', '2023-10-03 17:38:32'),
(240, 48, 15023.81, 5, '2023-10-03 17:39:29', '2023-10-03 17:39:29'),
(241, 52, 37522.6, 8, '2023-10-03 17:41:58', '2023-10-03 17:41:58'),
(242, 55, 20295.79, 7, '2023-10-03 17:43:11', '2023-10-03 17:43:11'),
(243, 63, 6599.46, 0, '2023-10-03 18:00:11', '2023-10-03 18:00:11'),
(244, 62, 6599.46, 0, '2023-10-03 18:00:43', '2023-10-03 18:00:43'),
(245, 64, 108469.79, 0, '2023-10-06 14:08:13', '2023-10-06 14:08:13'),
(246, 64, 19028.56, 1, '2023-10-06 14:08:31', '2023-10-06 14:08:31'),
(247, 64, 21045.58, 2, '2023-10-06 14:08:50', '2023-10-06 14:08:50'),
(248, 64, 22708.18, 3, '2023-10-06 14:09:04', '2023-10-06 14:09:04'),
(249, 66, 28979.98, 0, '2023-10-11 15:24:30', '2023-10-11 15:24:30'),
(250, 67, 11777.1, 0, '2023-10-11 22:50:21', '2023-10-11 22:50:21'),
(251, 67, 19616.3, 1, '2023-10-11 22:50:50', '2023-10-11 22:50:50'),
(252, 67, 22029.1, 2, '2023-10-11 22:51:10', '2023-10-11 22:51:10'),
(253, 67, 24291.37, 3, '2023-10-11 22:51:35', '2023-10-11 22:51:35'),
(254, 67, 28491.34, 4, '2023-10-11 22:51:59', '2023-10-11 22:51:59'),
(255, 67, 31226.5, 5, '2023-10-11 22:52:19', '2023-10-11 22:52:19'),
(256, 67, 34536.5, 6, '2023-10-11 22:52:43', '2023-10-11 22:52:43'),
(257, 67, 37264.88, 7, '2023-10-11 22:53:33', '2023-10-11 22:53:33'),
(258, 67, 40413.76, 8, '2023-10-11 22:53:56', '2023-10-11 22:53:56'),
(259, 45, 47107.86, 10, '2023-10-20 12:54:00', '2023-10-20 12:54:00'),
(260, 18, 21345503.54, 14, '2023-10-20 12:55:24', '2023-10-20 12:55:24'),
(261, 50, 74599.87, 2, '2023-10-20 12:56:29', '2023-10-20 12:56:29'),
(262, 66, 32196.76, 1, '2023-10-20 12:57:46', '2023-10-20 12:57:46'),
(263, 59, 247518.02, 11, '2023-10-20 12:59:01', '2023-10-20 12:59:01'),
(264, 64, 25228.79, 4, '2023-10-20 12:59:54', '2023-10-20 12:59:54'),
(265, 47, 47277.23, 4, '2023-10-20 13:00:37', '2023-10-20 13:00:37'),
(267, 42, 224571.53, 11, '2023-10-20 13:02:20', '2023-10-20 13:02:20'),
(268, 67, 44899.69, 9, '2023-10-20 13:03:24', '2023-10-20 13:03:24'),
(269, 18, 23287944.36, 15, '2023-11-01 18:27:38', '2023-11-01 18:27:38'),
(270, 45, 51394.68, 11, '2023-11-01 18:30:03', '2023-11-01 18:30:03'),
(271, 57, 47601.6, 8, '2023-11-01 18:35:57', '2023-11-01 18:35:57'),
(272, 58, 423687.71, 6, '2023-11-01 18:42:47', '2023-11-01 18:42:47'),
(273, 41, 150865.96, 4, '2023-11-01 18:44:37', '2023-11-01 18:44:37'),
(274, 56, 11571.2, 6, '2023-11-01 18:46:03', '2023-11-01 18:46:03'),
(275, 51, 22817.29, 6, '2023-11-01 18:47:57', '2023-11-01 18:47:57'),
(276, 49, 34874.6, 3, '2023-11-01 18:49:36', '2023-11-01 18:49:36'),
(277, 50, 81388.46, 3, '2023-11-01 18:50:49', '2023-11-01 18:50:49'),
(278, 63, 7200.01, 1, '2023-11-01 18:52:28', '2023-11-01 18:52:28'),
(279, 62, 7200.01, 1, '2023-11-01 18:53:11', '2023-11-01 18:53:11'),
(280, 66, 35126.67, 2, '2023-11-01 18:54:23', '2023-11-01 18:54:23'),
(281, 46, 560758.41, 13, '2023-11-01 18:55:42', '2023-11-01 18:55:42'),
(282, 59, 270042.16, 12, '2023-11-01 18:58:31', '2023-11-01 18:58:31'),
(286, 42, 245007.54, 12, '2023-11-01 19:05:04', '2023-11-01 19:05:04'),
(287, 67, 48985.56, 10, '2023-11-01 19:06:12', '2023-11-01 19:06:12'),
(288, 44, 359092.08, 10, '2023-11-01 19:07:46', '2023-11-01 19:07:46'),
(289, 43, 50198.48, 10, '2023-11-01 19:09:01', '2023-11-01 19:09:01'),
(290, 54, 22278.32, 8, '2023-11-01 19:10:05', '2023-11-01 19:10:05'),
(291, 60, 178721.72, 9, '2023-11-01 19:11:16', '2023-11-01 19:11:16'),
(292, 48, 16390.98, 6, '2023-11-01 19:12:27', '2023-11-01 19:12:27'),
(293, 52, 40937.16, 9, '2023-11-01 19:13:34', '2023-11-01 19:13:34'),
(294, 55, 22142.71, 8, '2023-11-01 19:14:38', '2023-11-01 19:14:38'),
(296, 64, 40173.28, 5, '2023-11-03 20:18:58', '2023-11-03 20:18:58'),
(297, 47, 73399.46, 5, '2023-11-03 20:20:35', '2023-11-03 20:20:35'),
(298, 68, 27922.66, 0, '2023-11-06 16:31:36', '2023-11-06 16:31:36'),
(299, 69, 11146, 0, '2023-11-13 20:09:21', '2023-11-13 20:09:21'),
(300, 41, 173687.46, 4, '2023-11-27 15:52:10', '2023-11-27 15:52:10'),
(301, 18, 24964676.35, 16, '2023-12-04 17:10:27', '2023-12-04 17:10:27'),
(302, 45, 55095.1, 12, '2023-12-04 17:12:35', '2023-12-04 17:12:35'),
(304, 58, 454193.23, 7, '2023-12-04 17:15:24', '2023-12-04 17:15:24'),
(305, 41, 186192.96, 5, '2023-12-04 17:16:54', '2023-12-04 17:16:54'),
(306, 56, 12404.33, 7, '2023-12-04 17:19:57', '2023-12-04 17:19:57'),
(307, 51, 24460.13, 7, '2023-12-04 17:21:14', '2023-12-04 17:21:14'),
(308, 49, 37385.57, 4, '2023-12-04 17:22:24', '2023-12-04 17:22:24'),
(309, 50, 87248.43, 4, '2023-12-04 17:24:06', '2023-12-04 17:24:06'),
(310, 63, 7718.41, 2, '2023-12-04 17:25:47', '2023-12-04 17:25:47'),
(311, 62, 7718.41, 2, '2023-12-04 17:26:24', '2023-12-04 17:26:24'),
(312, 66, 37655.79, 3, '2023-12-04 17:27:25', '2023-12-04 17:27:25'),
(313, 68, 29933.09, 1, '2023-12-04 17:28:53', '2023-12-04 17:28:53'),
(314, 46, 601133.02, 14, '2023-12-04 17:52:47', '2023-12-04 17:52:47'),
(315, 69, 11948.51, 1, '2023-12-04 17:54:36', '2023-12-04 17:54:36'),
(317, 59, 289485.2, 13, '2023-12-04 17:57:55', '2023-12-04 17:57:55'),
(318, 64, 43065.76, 6, '2023-12-04 17:58:53', '2023-12-04 17:58:53'),
(319, 47, 157368.38, 6, '2023-12-04 18:00:44', '2023-12-04 18:00:44'),
(321, 42, 262648.08, 13, '2023-12-04 18:02:52', '2023-12-04 18:02:52'),
(322, 67, 52512.52, 11, '2023-12-04 18:04:09', '2023-12-04 18:04:09'),
(323, 44, 384946.71, 11, '2023-12-04 18:05:13', '2023-12-04 18:05:13'),
(324, 43, 53812.77, 11, '2023-12-04 18:06:21', '2023-12-04 18:06:21'),
(325, 54, 23882.36, 9, '2023-12-04 18:08:28', '2023-12-04 18:08:28'),
(326, 60, 191589.68, 10, '2023-12-04 18:11:28', '2023-12-04 18:11:28'),
(327, 48, 17571.13, 7, '2023-12-04 18:13:42', '2023-12-04 18:13:42'),
(328, 52, 43884.64, 10, '2023-12-04 18:15:43', '2023-12-04 18:15:43'),
(329, 55, 23736.99, 9, '2023-12-04 18:17:16', '2023-12-04 18:17:16'),
(332, 72, 53250, 0, '2023-12-06 19:40:04', '2023-12-06 19:40:04'),
(333, 72, 58255.5, 1, '2023-12-06 19:40:45', '2023-12-06 19:40:45'),
(334, 72, 60702.23, 2, '2023-12-06 19:41:18', '2023-12-06 19:41:18'),
(335, 72, 64647.87, 3, '2023-12-06 19:41:47', '2023-12-06 19:41:47'),
(336, 72, 68074.21, 4, '2023-12-06 19:42:20', '2023-12-06 19:42:20'),
(337, 72, 72635.18, 5, '2023-12-06 19:43:41', '2023-12-06 19:43:41'),
(338, 73, 106500, 0, '2023-12-06 19:49:36', '2023-12-06 19:49:36'),
(339, 73, 116511, 1, '2023-12-06 19:52:06', '2023-12-06 19:52:06'),
(340, 73, 121404.46, 2, '2023-12-06 19:53:45', '2023-12-06 19:53:45'),
(341, 73, 129295.75, 3, '2023-12-06 19:55:35', '2023-12-06 19:55:35'),
(342, 73, 137958.56, 4, '2023-12-06 19:58:35', '2023-12-06 19:58:35'),
(343, 73, 147201.78, 5, '2023-12-06 20:03:06', '2023-12-06 20:03:06'),
(344, 73, 122201.78, 5, '2023-12-06 20:06:44', '2023-12-06 20:06:44'),
(347, 71, 51445.58, 0, '2023-12-10 20:40:32', '2023-12-10 20:40:32'),
(349, 75, 12811.94, 0, '2023-12-14 19:06:48', '2023-12-14 23:57:24'),
(351, 18, 27136574.070817, 17, '2023-12-14 19:42:08', '2023-12-14 19:42:08'),
(352, 58, 493707.5095, 8, '2023-12-14 19:43:52', '2023-12-14 19:43:52'),
(353, 45, 60532.99, 13, '2023-12-14 19:44:41', '2023-12-14 19:45:20'),
(354, 57, 51028.92, 9, '2023-12-14 19:46:11', '2023-12-14 19:49:30'),
(355, 41, 204570.21, 6, '2023-12-14 19:47:12', '2023-12-14 19:47:42'),
(356, 57, 56065.54, 10, '2023-12-14 23:44:14', '2023-12-14 23:44:42'),
(357, 56, 13628.63, 8, '2023-12-14 23:45:52', '2023-12-14 23:46:16'),
(358, 51, 26874.34, 8, '2023-12-14 23:47:06', '2023-12-14 23:47:23'),
(360, 49, 41075.52, 5, '2023-12-14 23:49:10', '2023-12-14 23:49:22'),
(361, 50, 95859.85, 5, '2023-12-14 23:50:16', '2023-12-14 23:50:28'),
(362, 63, 8480.21, 3, '2023-12-14 23:51:26', '2023-12-14 23:51:44'),
(363, 62, 8480.21, 3, '2023-12-14 23:52:14', '2023-12-14 23:52:26'),
(364, 66, 41372.41, 4, '2023-12-14 23:53:38', '2023-12-14 23:53:53'),
(365, 68, 32887.48, 2, '2023-12-14 23:54:42', '2023-12-14 23:54:57'),
(366, 69, 13127.82, 2, '2023-12-14 23:58:35', '2023-12-14 23:58:47'),
(369, 73, 134263.09, 6, '2023-12-15 00:03:03', '2023-12-15 00:03:15'),
(370, 59, 318057.38, 14, '2023-12-15 00:04:09', '2023-12-15 00:04:24'),
(371, 64, 47316.35, 7, '2023-12-15 00:05:13', '2023-12-15 00:05:30'),
(372, 47, 172900.63, 7, '2023-12-15 00:06:19', '2023-12-15 00:06:30'),
(374, 42, 288571.44, 14, '2023-12-15 00:09:53', '2023-12-15 00:10:07'),
(375, 67, 57695.5, 12, '2023-12-15 00:10:49', '2023-12-15 00:11:03'),
(379, 52, 48216.05, 11, '2023-12-15 00:15:27', '2023-12-15 00:15:41'),
(380, 55, 26079.83, 10, '2023-12-15 00:16:27', '2023-12-15 00:16:40'),
(381, 43, 59124.09, 12, '2023-12-15 01:08:33', '2023-12-15 01:08:42'),
(382, 54, 26239.54, 10, '2023-12-15 01:09:22', '2023-12-15 01:09:35'),
(383, 18, 29833836.460998, 17, '2024-01-02 17:44:55', '2024-01-02 18:11:21'),
(384, 45, 66549.71575, 13, '2024-01-02 17:46:47', '2024-01-02 18:11:41'),
(385, 57, 61638.21815, 10, '2024-01-02 17:52:27', '2024-01-02 18:11:58'),
(386, 58, 542779.97495, 8, '2024-01-02 17:54:42', '2024-01-02 18:12:16'),
(387, 41, 224903.62875, 6, '2024-01-02 17:55:47', '2024-01-02 18:12:31'),
(388, 56, 14983.25825, 8, '2024-01-02 17:56:41', '2024-01-02 18:13:24'),
(389, 51, 29545.5345, 8, '2024-01-02 17:57:52', '2024-01-02 18:13:49'),
(390, 49, 45158.25015, 5, '2024-01-02 17:58:40', '2024-01-02 18:14:01'),
(391, 50, 105387.91686667, 5, '2024-01-02 17:59:47', '2024-01-02 18:14:17'),
(392, 63, 9323.1042833333, 3, '2024-01-02 18:00:37', '2024-01-02 18:14:39'),
(393, 62, 9323.1042833333, 3, '2024-01-02 18:00:57', '2024-01-02 18:14:54'),
(394, 66, 45484.649666667, 4, '2024-01-02 18:02:24', '2024-01-02 18:15:17'),
(396, 68, 36156.357133333, 2, '2024-01-02 18:04:07', '2024-01-02 18:16:36'),
(397, 46, 660883.1332, 15, '2024-01-02 18:05:42', '2024-01-02 18:05:42'),
(398, 69, 14432.66185, 2, '2024-01-02 18:07:07', '2024-01-02 18:17:10'),
(399, 71, 62141.420483333, 1, '2024-01-02 18:08:27', '2024-01-02 18:17:29'),
(401, 73, 147608.27486667, 6, '2024-01-02 18:11:01', '2024-01-02 18:11:01'),
(404, 47, 190086.23141667, 7, '2024-01-02 18:21:14', '2024-01-02 18:21:14'),
(406, 42, 317254.23246667, 14, '2024-01-02 18:22:59', '2024-01-02 18:22:59'),
(407, 67, 63430.188933333, 12, '2024-01-02 18:23:48', '2024-01-02 18:23:48'),
(408, 44, 464979.512, 12, '2024-01-02 18:24:49', '2024-01-02 18:24:49'),
(409, 43, 65000.778083333, 12, '2024-01-02 18:26:15', '2024-01-02 18:26:15'),
(410, 54, 28847.633533333, 10, '2024-01-02 18:27:16', '2024-01-02 18:27:16'),
(411, 60, 210632.88781667, 10, '2024-01-02 18:28:08', '2024-01-02 18:28:08'),
(412, 48, 19317.6252, 8, '2024-01-02 18:29:05', '2024-01-02 18:29:05'),
(413, 52, 53008.519416667, 11, '2024-01-02 18:29:59', '2024-01-02 18:29:59'),
(414, 55, 28672.05565, 10, '2024-01-02 18:31:02', '2024-01-02 18:31:02'),
(417, 18, 31716446.015502, 18, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(418, 41, 239095.75991895, 7, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(419, 42, 337273.97917372, 15, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(420, 43, 69102.533016189, 13, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(421, 44, 494321.19164232, 13, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(422, 45, 70749.213554592, 14, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(423, 46, 702586.95170151, 16, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(424, 47, 202081.27455879, 8, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(425, 48, 20536.6285226, 9, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(426, 49, 48007.87873559, 6, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(427, 50, 112038.22814936, 6, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(428, 51, 31409.951287809, 9, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(429, 52, 56353.52485217, 12, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(430, 54, 30668.010560126, 11, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(431, 55, 30481.353156358, 11, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(432, 56, 15928.749292559, 9, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(433, 57, 65527.784902956, 11, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(434, 58, 577031.1101726, 9, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(436, 60, 223924.49004205, 11, '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(437, 62, 9911.4216867752, 4, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(438, 63, 9911.4216867752, 4, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(441, 66, 48354.875095358, 5, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(442, 67, 67432.834717291, 13, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(443, 68, 38437.937763577, 3, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(444, 69, 15343.408516164, 3, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(445, 71, 66062.740896996, 2, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(447, 73, 156922.82443696, 7, '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(452, 89, 5000, 0, '2024-02-06 21:15:04', '2024-02-06 21:15:15'),
(454, 87, 25000, 0, '2024-02-06 21:16:41', '2024-02-06 21:16:50'),
(458, 88, 10000, 0, '2024-02-08 17:50:32', '2024-02-08 17:50:48'),
(460, 18, 34017019.571534, 19, '2024-02-12 13:01:51', '2024-02-12 13:01:51'),
(462, 42, 361738.37210241, 16, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(464, 44, 530177.10882556, 14, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(465, 45, 75881.054925917, 15, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(467, 47, 216739.37452976, 9, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(469, 49, 51490.162224929, 7, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(470, 50, 120164.99572033, 7, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(471, 51, 33688.293044438, 10, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(472, 52, 60441.165346339, 13, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(474, 55, 32692.338428457, 12, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(475, 56, 17084.151741661, 10, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(476, 57, 70280.886466082, 12, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(480, 62, 10630.35326644, 5, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(481, 63, 10630.35326644, 5, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(484, 66, 51862.328196983, 6, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(485, 67, 72324.120338733, 14, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(486, 68, 41226.05920455, 4, '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(487, 69, 16456.352881823, 4, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(488, 71, 70854.645849787, 3, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(490, 73, 168305.32612271, 8, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(497, 87, 26813.391666667, 1, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(498, 88, 10807.956666667, 1, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(499, 89, 5362.6783333333, 1, '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(500, 90, 200000, 1, '2024-02-12 13:01:53', '2024-02-25 20:05:33'),
(501, 43, 74114.920318286, 14, '2024-02-12 13:07:47', '2024-02-12 13:07:47'),
(502, 54, 32892.527756013, 12, '2024-02-12 13:11:12', '2024-02-12 13:11:12'),
(503, 91, 25000, 0, '2024-02-15 12:52:37', '2024-02-15 12:52:47'),
(523, 90, 825000, 3, '2024-02-26 18:07:51', '2024-02-26 18:07:51'),
(524, 90, 24750, 5, '2024-02-26 18:08:13', '2024-02-26 18:08:13'),
(532, 74, -5416.6666666667, 5, '2024-02-26 22:35:21', '2024-02-26 22:35:21'),
(533, 74, -113750, 1, '2024-02-26 22:40:10', '2024-02-26 22:40:10'),
(536, 98, 25000, 0, '2024-02-27 15:22:23', '2024-02-27 15:22:31'),
(545, 44, 419416.44208333, 11, '2024-02-27 20:08:12', '2024-02-27 20:08:12'),
(546, 71, 56052.222916667, 1, '2024-02-27 20:10:49', '2024-02-27 20:10:49'),
(569, 59, 638408.52, 14, '2024-02-28 01:23:13', '2024-02-28 01:23:13'),
(570, 59, 674131.19691667, 15, '2024-02-28 01:23:50', '2024-02-28 01:23:50'),
(571, 59, 718164.319775, 16, '2024-02-28 01:24:49', '2024-02-28 01:24:49'),
(574, 64, 52019.39, 7, '2024-02-28 01:29:30', '2024-02-28 01:29:30'),
(575, 64, 54930.171166667, 8, '2024-02-28 01:30:10', '2024-02-28 01:30:10'),
(576, 64, 58518.11545, 9, '2024-02-28 01:31:02', '2024-02-28 01:31:02'),
(577, 86, 11734.18, 0, '2024-02-28 01:34:18', '2024-02-28 01:34:18'),
(578, 86, 12500.634166667, 1, '2024-02-28 01:35:16', '2024-02-28 01:35:16'),
(579, 85, 23468.36, 0, '2024-02-28 01:36:41', '2024-02-28 01:36:41'),
(580, 85, 25001.268333333, 1, '2024-02-28 01:37:32', '2024-02-28 01:37:32'),
(581, 83, 5000, 0, '2024-02-28 01:40:32', '2024-02-28 01:40:32'),
(582, 83, 5327.4833333333, 1, '2024-02-28 01:41:09', '2024-02-28 01:41:09'),
(583, 81, 25000, 0, '2024-02-28 01:43:07', '2024-02-28 01:43:07'),
(585, 81, 26398.895833333, 1, '2024-02-28 01:44:40', '2024-02-28 01:44:40'),
(586, 81, 28123.223583333, 2, '2024-02-28 01:45:11', '2024-02-28 01:45:11'),
(587, 75, 14085.39, 0, '2024-02-28 01:47:59', '2024-02-28 01:47:59'),
(588, 75, 14873.543833333, 1, '2024-02-28 01:48:38', '2024-02-28 01:48:38'),
(589, 75, 15845.0513, 2, '2024-02-28 01:49:15', '2024-02-28 01:49:15'),
(592, 82, 25000, 0, '2024-02-28 02:08:58', '2024-02-28 02:08:58'),
(593, 82, 26632.958333333, 1, '2024-02-28 02:09:18', '2024-02-28 02:09:18'),
(594, 74, 879291.66666667, 5, '2024-02-28 14:38:36', '2024-02-28 14:38:36'),
(633, 18, 99166.666666667, 5, '2024-02-29 23:06:41', '2024-02-29 23:06:41'),
(643, 65, 47416.666666667, 2, '2024-03-01 00:03:54', '2024-03-01 00:03:54'),
(645, 65, 49916.666666667, 5, '2024-03-01 00:12:22', '2024-03-01 00:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2023_01_12_000000_create_accounts_table', 1),
(20, '2023_01_17_000000_create_stoploss_table', 1),
(21, '2023_01_18_000000_create_alerts_table', 1),
(23, '2023_01_30_000000_create_sales_table', 2),
(24, '2023_09_01_184210_create_transactions_table', 2),
(25, '2023_12_10_181356_create_statements_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `period` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trials` int NOT NULL DEFAULT '0',
  `converted_trials` int NOT NULL DEFAULT '0',
  `bronze_accounts` int NOT NULL DEFAULT '0',
  `bronze_accounts_amount` double NOT NULL DEFAULT '0',
  `reset_bronze_accounts` int NOT NULL DEFAULT '0',
  `reset_bronze_accounts_amount` double NOT NULL DEFAULT '0',
  `silver_accounts` int NOT NULL DEFAULT '0',
  `silver_accounts_amount` double NOT NULL DEFAULT '0',
  `reset_silver_accounts` int NOT NULL DEFAULT '0',
  `reset_silver_accounts_amount` double NOT NULL DEFAULT '0',
  `gold_accounts` int NOT NULL DEFAULT '0',
  `gold_accounts_amount` double NOT NULL DEFAULT '0',
  `reset_gold_accounts` int NOT NULL DEFAULT '0',
  `reset_gold_accounts_amount` double NOT NULL DEFAULT '0',
  `diamond_accounts` int NOT NULL DEFAULT '0',
  `diamond_accounts_amount` double NOT NULL DEFAULT '0',
  `reset_diamond_accounts` int NOT NULL DEFAULT '0',
  `reset_diamond_accounts_amount` double NOT NULL DEFAULT '0',
  `edu_accounts` int NOT NULL DEFAULT '0',
  `edu_accounts_amount` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statements`
--

CREATE TABLE `statements` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statements`
--

INSERT INTO `statements` (`id`, `account_id`, `date`, `pdf`, `created_at`, `updated_at`) VALUES
(2, 75, '2023-12-14', 'statements/569132a66002c593e6b23b422c4379dc.pdf', '2023-12-14 19:06:48', '2023-12-14 19:06:48'),
(3, 58, '2023-12-14', 'statements/39accdffdf1e7d4e47830752fb99e3e3.pdf', '2023-12-14 19:39:57', '2023-12-14 19:39:57'),
(5, 58, '2023-12-14', 'statements/6d58565f4e2ac77aeb87973899d2ec6c.pdf', '2023-12-14 19:43:52', '2023-12-14 19:43:52'),
(6, 45, '2023-12-14', 'statements/11bfcc2c6b19789a2a4e39a0d42f3c1d.pdf', '2023-12-14 19:44:41', '2023-12-14 19:44:41'),
(7, 57, '2023-12-14', 'statements/bb01a752a355f0595c0e7d2e6fa5486e.pdf', '2023-12-14 19:46:11', '2023-12-14 19:46:11'),
(8, 41, '2023-12-14', 'statements/c8e86892a902cb14b631b41dac985754.pdf', '2023-12-14 19:47:12', '2023-12-14 19:47:12'),
(9, 57, '2023-12-14', 'statements/3c4487ffaf8c1d50582364543ac716ae.pdf', '2023-12-14 23:44:14', '2023-12-14 23:44:14'),
(10, 56, '2023-12-14', 'statements/d2077106d9d7b8a6efcac35cef1960be.pdf', '2023-12-14 23:45:52', '2023-12-14 23:45:52'),
(11, 51, '2023-12-14', 'statements/1e0a5068f04693e8eb87087affce8901.pdf', '2023-12-14 23:47:06', '2023-12-14 23:47:06'),
(12, 49, '2023-12-14', 'statements/46c1a376b295af036dad3f77726ddaa7.pdf', '2023-12-14 23:48:40', '2023-12-14 23:48:40'),
(13, 49, '2023-12-14', 'statements/c074a660d11fe43d96fac58d502dd6f0.pdf', '2023-12-14 23:49:10', '2023-12-14 23:49:10'),
(14, 50, '2023-12-14', 'statements/6c99af38d9b77c8ba9a98ac5c8708905.pdf', '2023-12-14 23:50:16', '2023-12-14 23:50:16'),
(15, 63, '2023-12-14', 'statements/83a659eed7a7145edd8a05b8e1340949.pdf', '2023-12-14 23:51:26', '2023-12-14 23:51:26'),
(16, 62, '2023-12-14', 'statements/7940ea09180644fc14cc2b4da0de326f.pdf', '2023-12-14 23:52:14', '2023-12-14 23:52:14'),
(17, 66, '2023-12-14', 'statements/9491a473c6465ed24dd529abf36d0d78.pdf', '2023-12-14 23:53:38', '2023-12-14 23:53:38'),
(18, 68, '2023-12-14', 'statements/a1f4c216bfbd14e91bfcf14f18453127.pdf', '2023-12-14 23:54:42', '2023-12-14 23:54:42'),
(19, 69, '2023-12-14', 'statements/58fc09025f07be5aa1dd70bde87e8105.pdf', '2023-12-14 23:58:36', '2023-12-14 23:58:36'),
(20, 71, '2023-12-14', 'statements/b0cf26d34ef8647ab21bee8b39e45255.pdf', '2023-12-15 00:00:15', '2023-12-15 00:00:15'),
(21, 72, '2023-12-14', 'statements/6a5b393585350bee60632be604cc8da7.pdf', '2023-12-15 00:02:13', '2023-12-15 00:02:13'),
(22, 73, '2023-12-14', 'statements/a322b0bef26d45eaf12d2d1f729ee808.pdf', '2023-12-15 00:03:03', '2023-12-15 00:03:03'),
(23, 59, '2023-12-14', 'statements/1a5aaf9b63cacafea0a989577e529002.pdf', '2023-12-15 00:04:09', '2023-12-15 00:04:09'),
(24, 64, '2023-12-14', 'statements/5d80f60f383ba7d5fd5d56fc10fd93c1.pdf', '2023-12-15 00:05:13', '2023-12-15 00:05:13'),
(25, 47, '2023-12-14', 'statements/caef4468a03b8d5abe799d69634b0342.pdf', '2023-12-15 00:06:19', '2023-12-15 00:06:19'),
(27, 42, '2023-12-14', 'statements/31ed511fcecbf798bc58374e95512dee.pdf', '2023-12-15 00:09:53', '2023-12-15 00:09:53'),
(28, 67, '2023-12-14', 'statements/ee5861ecc67c5a00fd493aa0798c2a88.pdf', '2023-12-15 00:10:49', '2023-12-15 00:10:49'),
(32, 52, '2023-12-14', 'statements/95e3a22b3b5bb57e0643c6b2daa10f66.pdf', '2023-12-15 00:15:27', '2023-12-15 00:15:27'),
(33, 55, '2023-12-14', 'statements/de1606edf6e02500aa2455dc1f8bb305.pdf', '2023-12-15 00:16:27', '2023-12-15 00:16:27'),
(34, 43, '2023-12-14', 'statements/349860bb883bef8874cd0699fd48e68f.pdf', '2023-12-15 01:08:33', '2023-12-15 01:08:33'),
(35, 54, '2023-12-14', 'statements/7dac51587c43848eeed284a5882ba106.pdf', '2023-12-15 01:09:22', '2023-12-15 01:09:22'),
(37, 45, '2024-01-02', 'statements/1eb56d7788e0b205e05941c576d4d224.pdf', '2024-01-02 17:46:48', '2024-01-02 17:46:48'),
(38, 57, '2024-01-02', 'statements/acec881a1361d5651a6759a7fdc9a9fb.pdf', '2024-01-02 17:52:28', '2024-01-02 17:52:28'),
(39, 58, '2024-01-02', 'statements/d2d008f64d0ae3b49df409af4d8a5ab7.pdf', '2024-01-02 17:54:42', '2024-01-02 17:54:42'),
(40, 41, '2024-01-02', 'statements/6077006ea6262a60b9d13f25731f3192.pdf', '2024-01-02 17:55:47', '2024-01-02 17:55:47'),
(41, 56, '2024-01-02', 'statements/1e05abceaa824f5f351af7fc0bf2963d.pdf', '2024-01-02 17:56:41', '2024-01-02 17:56:41'),
(42, 51, '2024-01-02', 'statements/b78f8d95be2a16a6530902abe7fc143a.pdf', '2024-01-02 17:57:52', '2024-01-02 17:57:52'),
(43, 49, '2024-01-02', 'statements/c644ea0e0811741ccbe18b603acf7475.pdf', '2024-01-02 17:58:40', '2024-01-02 17:58:40'),
(44, 50, '2024-01-02', 'statements/9fdd5b328fb83ea4740474759f2e0639.pdf', '2024-01-02 17:59:47', '2024-01-02 17:59:47'),
(45, 63, '2024-01-02', 'statements/063e42c92a9b7129a87923f26c8b6882.pdf', '2024-01-02 18:00:37', '2024-01-02 18:00:37'),
(46, 62, '2024-01-02', 'statements/4cc89390c74beea5e7febde18aef1844.pdf', '2024-01-02 18:00:57', '2024-01-02 18:00:57'),
(47, 66, '2024-01-02', 'statements/d5db1d65c48670bf78445528700a49d7.pdf', '2024-01-02 18:02:24', '2024-01-02 18:02:24'),
(48, 75, '2024-01-02', 'statements/4aaa4ed6d8bc2f03146e1c2f69861ff2.pdf', '2024-01-02 18:03:10', '2024-01-02 18:03:10'),
(49, 68, '2024-01-02', 'statements/b5bb9607d8a06764f4b044fbca2e5252.pdf', '2024-01-02 18:04:07', '2024-01-02 18:04:07'),
(50, 46, '2024-01-02', 'statements/f0434266c519816e12aade5b9d55b6f0.pdf', '2024-01-02 18:05:42', '2024-01-02 18:05:42'),
(51, 69, '2024-01-02', 'statements/3b22005261b6e803323af474220d1728.pdf', '2024-01-02 18:07:07', '2024-01-02 18:07:07'),
(52, 71, '2024-01-02', 'statements/e363e53eca755627569a1f670df29721.pdf', '2024-01-02 18:08:27', '2024-01-02 18:08:27'),
(53, 72, '2024-01-02', 'statements/b5634839729a05d1cf73c44e806e93a0.pdf', '2024-01-02 18:09:41', '2024-01-02 18:09:41'),
(54, 73, '2024-01-02', 'statements/c46c5bd8ec309de1b2b6e2d2a8498304.pdf', '2024-01-02 18:11:01', '2024-01-02 18:11:01'),
(55, 59, '2024-01-02', 'statements/40a535c4278d1c87dda007e1096063b6.pdf', '2024-01-02 18:18:56', '2024-01-02 18:18:56'),
(56, 64, '2024-01-02', 'statements/ac0d08b14019d06a288a12c7a9600b3b.pdf', '2024-01-02 18:20:08', '2024-01-02 18:20:08'),
(57, 47, '2024-01-02', 'statements/d56f88a766fc4b74f5570d52be3680c5.pdf', '2024-01-02 18:21:14', '2024-01-02 18:21:14'),
(59, 42, '2024-01-02', 'statements/1a8d9fb19ef76207e6b6569c39420b11.pdf', '2024-01-02 18:22:59', '2024-01-02 18:22:59'),
(60, 67, '2024-01-02', 'statements/e50182a68306b0f3bd986a60e061dbda.pdf', '2024-01-02 18:23:48', '2024-01-02 18:23:48'),
(61, 44, '2024-01-02', 'statements/6dac3ae24648078c5979478a090000d5.pdf', '2024-01-02 18:24:49', '2024-01-02 18:24:49'),
(62, 43, '2024-01-02', 'statements/83b885cd93bb8f7bbc4fd4b11be90742.pdf', '2024-01-02 18:26:15', '2024-01-02 18:26:15'),
(63, 54, '2024-01-02', 'statements/b428488914c6d098aaf076d0ced1137f.pdf', '2024-01-02 18:27:16', '2024-01-02 18:27:16'),
(64, 60, '2024-01-02', 'statements/dfd10bd884abea3843a8e89f51be3848.pdf', '2024-01-02 18:28:08', '2024-01-02 18:28:08'),
(65, 48, '2024-01-02', 'statements/0ba64f8991cec379bcc41f0d05be6757.pdf', '2024-01-02 18:29:05', '2024-01-02 18:29:05'),
(66, 52, '2024-01-02', 'statements/69fd13bae366d8f99880cecc2529e9a8.pdf', '2024-01-02 18:29:59', '2024-01-02 18:29:59'),
(67, 55, '2024-01-02', 'statements/3eb18b3912ae26167e61c6e06bf17aa6.pdf', '2024-01-02 18:31:02', '2024-01-02 18:31:02'),
(71, 41, '2024-02-02', 'statements/247f139b6c016f5feb626b3e56f910bc.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(72, 42, '2024-02-02', 'statements/d29b551e1472b1cfcc9cc1628b1daecc.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(73, 43, '2024-02-02', 'statements/4114edb1a40031152cb1f6f67f3ea733.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(74, 44, '2024-02-02', 'statements/55e1a5693e60443e0e7e4e36d22a6907.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(75, 45, '2024-02-02', 'statements/031cd2787b0171e0e9913d3ed25d98b9.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(76, 46, '2024-02-02', 'statements/ff672cbab6a123f985231a1563cacb42.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(77, 47, '2024-02-02', 'statements/26e785297c1a0425e011ed374f4c90de.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(78, 48, '2024-02-02', 'statements/673f235fce22009afbdd7b90f088b862.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(79, 49, '2024-02-02', 'statements/4fab6863c9c35ae18e5b60ba33bf4af2.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(80, 50, '2024-02-02', 'statements/6fb0c5162bdb1461cb50fbdb50ec4eae.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(81, 51, '2024-02-02', 'statements/767b67fec4d676261b78f2536d7c8c34.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(82, 52, '2024-02-02', 'statements/4fd0a18756a7a41f23527a33e5a3eba9.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(83, 54, '2024-02-02', 'statements/ea19b1da21fcbeec5fc8badf41276d6f.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(84, 55, '2024-02-02', 'statements/cefa43fbb2cf4ee6216627a01ca40222.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(85, 56, '2024-02-02', 'statements/421454c8506a961d4c2c7aedc5184d15.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(86, 57, '2024-02-02', 'statements/9a86dadd0a199c1b67593c95b4569bf0.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(87, 58, '2024-02-02', 'statements/91b26978ccf25962c680662b280c73b3.pdf', '2024-02-02 21:19:49', '2024-02-02 21:19:49'),
(89, 60, '2024-02-02', 'statements/0100d0256d76c5fa53d3f0992488f8e7.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(90, 62, '2024-02-02', 'statements/b66328d89dbdadf7eaa35b3be4949edb.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(91, 63, '2024-02-02', 'statements/b0ddf17643dfff3a7f8b2fb173e3ca07.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(94, 66, '2024-02-02', 'statements/602e52d506dc32349aa3b74659ee2313.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(95, 67, '2024-02-02', 'statements/1083ade2e0f57e45af3158b4d05140c7.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(96, 68, '2024-02-02', 'statements/63eaf42b4170cea99339234a81eddb10.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(97, 69, '2024-02-02', 'statements/3aad0cac6c2804e7485f7470e2777f25.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(98, 71, '2024-02-02', 'statements/920d9f87a07d005593e01e8c48664a7b.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(99, 72, '2024-02-02', 'statements/826c3027c4d71c7c847488fa26ed5cc2.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(100, 73, '2024-02-02', 'statements/34c1a4f5986d37cab5de8d5f84a454b3.pdf', '2024-02-02 21:19:50', '2024-02-02 21:19:50'),
(112, 90, '2024-02-11', 'statements/3d6eb3db9fe93706cce5f9ffcceae6e0.pdf', '2024-02-12 00:19:31', '2024-02-12 00:19:31'),
(115, 42, '2024-02-12', 'statements/a1e1d27a820b3b241cc6c0f132fbb230.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(117, 44, '2024-02-12', 'statements/508935b8c2cd5364f0b6ad327a61d8dd.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(118, 45, '2024-02-12', 'statements/bf89c74410947b5706aebc496dabbfc3.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(120, 47, '2024-02-12', 'statements/86812d52008932329cf51c740461dc7a.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(122, 49, '2024-02-12', 'statements/2e2e0ba7c96dc42987dff15d634f3a72.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(123, 50, '2024-02-12', 'statements/c72a3f086f3f96229a4e3a7e6a5e818c.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(124, 51, '2024-02-12', 'statements/e086dcf9be54aaf67ff54f3321304ee4.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(125, 52, '2024-02-12', 'statements/5414de998774cbda5c792d2caf05749a.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(127, 55, '2024-02-12', 'statements/1939facfca48d1945f35eb88cd35ad5c.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(128, 56, '2024-02-12', 'statements/01fb3664b4b291f145fbe183125448ed.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(129, 57, '2024-02-12', 'statements/f340df341aa8e6af1511c9073cf845a0.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(133, 62, '2024-02-12', 'statements/5dde42cd99533b4408db5956bdb328ba.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(134, 63, '2024-02-12', 'statements/c988c0dd7dea1f7792b9986844596d4d.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(137, 66, '2024-02-12', 'statements/342d764af473d66c4a810fa9b6917eca.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(138, 67, '2024-02-12', 'statements/6ac69540614ec4161209a1fe5109beb9.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(139, 68, '2024-02-12', 'statements/c2b9d37f35638d6d4703b27c58ac3239.pdf', '2024-02-12 13:01:52', '2024-02-12 13:01:52'),
(140, 69, '2024-02-12', 'statements/0ccc2a0e15cfe4d9cedfddd892ed734b.pdf', '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(141, 71, '2024-02-12', 'statements/8709f77d530e5751197ae9f123d8bd5a.pdf', '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(142, 72, '2024-02-12', 'statements/805fa1112f0ef18fcf3045f30e1f0596.pdf', '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(143, 73, '2024-02-12', 'statements/24c861d7c5f4f7dc9d1b3b76dac858f4.pdf', '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(150, 87, '2024-02-12', 'statements/abdf125958c4b2ecaa602566ef777cde.pdf', '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(151, 88, '2024-02-12', 'statements/be5a37ac9c93031b8ac78f54e3b44a78.pdf', '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(152, 89, '2024-02-12', 'statements/15c90986be0bf978f81f6d77e2bacb77.pdf', '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(153, 90, '2024-02-12', 'statements/5053cc7e44ba402906c81fb572cda3e2.pdf', '2024-02-12 13:01:53', '2024-02-12 13:01:53'),
(154, 43, '2024-02-12', 'statements/f897b14c747237b9c860ad408f4bed81.pdf', '2024-02-12 13:07:47', '2024-02-12 13:07:47'),
(155, 54, '2024-02-12', 'statements/760afe9ebae6de073b576d545a567cd7.pdf', '2024-02-12 13:11:12', '2024-02-12 13:11:12'),
(157, 74, '2024-02-15', 'statements/ef298f97506b53a50518bce289d1b5b1.pdf', '2024-02-15 16:13:17', '2024-02-15 16:13:17'),
(176, 90, '2024-02-26', 'statements/07afdc0761f503bc54f3c02baebf1b88.pdf', '2024-02-26 18:07:52', '2024-02-26 18:07:52'),
(177, 90, '2024-02-26', 'statements/2308c1b12ee79e5e0de062857fcc570a.pdf', '2024-02-26 18:08:13', '2024-02-26 18:08:13'),
(185, 74, '2024-02-26', 'statements/0b195f6216aebb19bd30828afc7a067a.pdf', '2024-02-26 22:35:21', '2024-02-26 22:35:21'),
(186, 74, '2024-02-26', 'statements/fff3807c2d0a13bada5589b84be1e1b8.pdf', '2024-02-26 22:40:10', '2024-02-26 22:40:10'),
(212, 59, '2024-02-27', 'statements/405cc3d6796c88bbb6a2f1d1846ac78a.pdf', '2024-02-28 01:23:50', '2024-02-28 01:23:50'),
(213, 59, '2024-02-27', 'statements/f94bdfd7c946e2572161d692316425bd.pdf', '2024-02-28 01:24:49', '2024-02-28 01:24:49'),
(215, 64, '2024-02-27', 'statements/d2b62977999c31f4ec70668ed6b22ff9.pdf', '2024-02-28 01:30:10', '2024-02-28 01:30:10'),
(216, 64, '2024-02-27', 'statements/48d8e62a2ec556001fa6d1b160f7e63f.pdf', '2024-02-28 01:31:02', '2024-02-28 01:31:02'),
(217, 86, '2024-02-27', 'statements/a4f4271214b8d131dd4ef4e66988c018.pdf', '2024-02-28 01:35:16', '2024-02-28 01:35:16'),
(218, 85, '2024-02-27', 'statements/ed58de3d9982be7b172f36b833f1de4e.pdf', '2024-02-28 01:37:32', '2024-02-28 01:37:32'),
(219, 83, '2024-02-27', 'statements/17416bae63d290df9632123c8b526a61.pdf', '2024-02-28 01:41:09', '2024-02-28 01:41:09'),
(221, 81, '2024-02-27', 'statements/d68c43ea69738401d6b24b30e13f0300.pdf', '2024-02-28 01:44:40', '2024-02-28 01:44:40'),
(222, 81, '2024-02-27', 'statements/fe7acf28b5b130265593d8cb60e7730b.pdf', '2024-02-28 01:45:11', '2024-02-28 01:45:11'),
(223, 75, '2024-02-27', 'statements/79ac86cf50165a242d7907f55b76af29.pdf', '2024-02-28 01:48:38', '2024-02-28 01:48:38'),
(224, 75, '2024-02-27', 'statements/8651c0b65360bad13d3b21fa6c100532.pdf', '2024-02-28 01:49:15', '2024-02-28 01:49:15'),
(226, 82, '2024-02-27', 'statements/59eb02a3d270bd8141de98c332782c9f.pdf', '2024-02-28 02:09:18', '2024-02-28 02:09:18'),
(227, 74, '2024-02-28', 'statements/fa0fbc6f0c9a181a0fc523589ddbf3eb.pdf', '2024-02-28 14:38:36', '2024-02-28 14:38:36'),
(262, 65, '2024-02-29', 'statements/77f0c94050dc8b6f3672151231fb360b.pdf', '2024-03-01 00:02:03', '2024-03-01 00:02:03'),
(263, 65, '2024-02-29', 'statements/54194aed0110141ccfd7b5e20a686b01.pdf', '2024-03-01 00:03:55', '2024-03-01 00:03:55'),
(264, 65, '2024-02-29', 'statements/82fe0f6304f490843148796596ecf99f.pdf', '2024-03-01 00:05:29', '2024-03-01 00:05:29'),
(265, 65, '2024-02-29', 'statements/0fbb10b71172137fbae487bf6a1a4fee.pdf', '2024-03-01 00:12:22', '2024-03-01 00:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED NOT NULL,
  `alert_id` bigint UNSIGNED DEFAULT NULL,
  `type` enum('withdrawal','deposit','Fees paid','Referral Fees received') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `account_id`, `alert_id`, `type`, `amount`, `note`, `date`, `created_at`, `updated_at`) VALUES
(3, 41, 50, NULL, 'deposit', 2000, 'ewrewrewrwerwerwerwer', '1900-12-22', '2023-08-30 02:06:29', '2024-02-25 19:07:07'),
(5, 43, 52, NULL, 'deposit', 5814.5, '', '0000-00-00', '2023-09-07 02:09:08', NULL),
(8, 49, 63, NULL, 'deposit', 5814.5, '', '0000-00-00', '2023-09-07 02:11:03', NULL),
(9, 40, 49, NULL, 'deposit', 23222, '', '0000-00-00', '2023-07-05 02:13:56', NULL),
(10, 42, 51, NULL, 'deposit', 10000, '', '0000-00-00', '2023-04-18 02:14:44', NULL),
(12, 46, 57, NULL, 'deposit', 13840.6, '', '0000-00-00', '2023-04-16 02:17:03', NULL),
(13, 44, 55, NULL, 'deposit', 5000, '', '0000-00-00', '2023-02-15 03:18:01', NULL),
(15, 47, 58, NULL, 'deposit', 11270, '', '0000-00-00', '2023-04-20 04:21:10', NULL),
(16, 47, 58, NULL, 'deposit', 76600.2, '', '0000-00-00', '2023-04-17 04:22:42', NULL),
(18, 48, 59, NULL, 'withdrawal', 33633, '', '0000-00-00', '2023-03-07 05:25:09', NULL),
(19, 33, 42, NULL, 'deposit', 5498.68, '', '0000-00-00', '2023-02-22 05:29:04', NULL),
(21, 35, 54, NULL, 'deposit', 5512, '', '0000-00-00', '2023-02-15 05:31:08', NULL),
(26, 38, 47, NULL, 'deposit', 30000, NULL, '2023-05-31', '2023-06-28 04:46:39', '2023-10-12 15:24:51'),
(29, 35, 43, NULL, 'deposit', 5535.5, '05.01.2023', '0000-00-00', '2023-10-04 11:33:08', '2023-10-04 11:33:08'),
(30, 45, 56, NULL, 'deposit', 5514, '06.04.2023', '0000-00-00', '2023-10-04 11:54:22', '2023-10-04 11:54:22'),
(31, 36, 44, NULL, 'deposit', 45306.93, '13.03.2023', '0000-00-00', '2023-10-04 12:02:17', '2023-10-04 12:02:17'),
(32, 52, 62, NULL, 'deposit', 5814.5, '06.09.2023', '0000-00-00', '2023-10-04 12:38:43', '2023-10-04 12:38:43'),
(34, 48, 59, NULL, 'deposit', 11470.5, '21.10.2022', '0000-00-00', '2023-10-06 13:43:56', '2023-10-06 13:43:56'),
(35, 48, 59, NULL, 'deposit', 23171, '30.11.2022', '0000-00-00', '2023-10-06 13:44:32', '2023-10-06 13:44:32'),
(36, 48, 59, NULL, 'withdrawal', 100000, '28.04.2023', '0000-00-00', '2023-10-06 13:45:24', '2023-10-06 13:45:24'),
(37, 48, 59, NULL, 'deposit', 92000, '31.05.2023', '0000-00-00', '2023-10-06 13:46:02', '2023-10-06 13:46:02'),
(38, 48, 59, NULL, 'withdrawal', 92000, '30.06.2023', '0000-00-00', '2023-10-06 13:46:38', '2023-10-06 13:46:38'),
(47, 54, 66, 21, 'deposit', 28979.98, NULL, '2023-10-11', '2023-10-11 15:25:07', '2023-10-11 15:25:07'),
(48, 55, 67, 22, 'deposit', 5433.84, NULL, '2023-01-16', '2023-10-11 22:48:01', '2023-10-11 22:49:36'),
(52, 38, 47, 26, 'deposit', 20000, 'Deposit', '2023-10-12', '2023-10-12 21:02:45', '2023-10-12 21:02:45'),
(53, 34, 45, 27, 'deposit', 5512, NULL, '2023-02-15', '2023-10-16 15:14:52', '2023-10-16 15:14:52'),
(56, 56, 68, 30, 'deposit', 22341.16, NULL, '2023-11-03', '2023-11-03 17:45:21', '2023-11-03 17:45:21'),
(57, 56, 68, 31, 'deposit', 5581.5, NULL, '2023-11-06', '2023-11-06 16:30:05', '2023-11-06 16:30:05'),
(58, 57, 69, 32, 'deposit', 11146, NULL, '2023-11-13', '2023-11-13 20:10:12', '2023-11-13 20:10:12'),
(59, 32, 41, 33, 'deposit', 22821.5, NULL, '2023-11-27', '2023-11-27 15:48:59', '2023-11-27 15:48:59'),
(60, 60, 73, 34, 'deposit', 100000, NULL, '2023-06-01', '2023-12-06 20:03:35', '2023-12-06 20:04:41'),
(61, 60, 72, 35, 'deposit', 50000, NULL, '2023-06-01', '2023-12-06 20:04:27', '2023-12-06 20:04:27'),
(62, 60, 73, 36, 'withdrawal', 25000, NULL, '2023-12-01', '2023-12-06 20:05:22', '2023-12-06 20:05:22'),
(72, 59, 71, 49, 'deposit', 51445.58, NULL, '2023-12-08', '2023-12-10 20:42:22', '2023-12-10 20:42:22'),
(73, 60, 72, 51, 'Referral Fees received', 11146, NULL, '2023-07-01', '2023-12-12 14:41:12', '2023-12-12 14:41:12'),
(74, 60, 72, 52, 'Referral Fees received', 2155.45, NULL, '2023-11-01', '2023-12-12 14:41:48', '2023-12-12 14:41:48'),
(75, 60, 72, 53, 'Referral Fees received', 1769.92, NULL, '2023-08-01', '2023-12-12 14:42:20', '2023-12-12 14:42:20'),
(76, 60, 72, 54, 'Referral Fees received', 2731.6, NULL, '2023-10-01', '2023-12-12 14:43:13', '2023-12-12 14:43:13'),
(77, 48, 59, 122, 'deposit', 262632.96, 'System 1 and 2 are combined', '2024-01-03', '2024-01-03 13:59:21', '2024-01-03 13:59:21'),
(78, 54, 75, 123, 'deposit', 11614, NULL, '2023-12-14', '2024-01-06 15:37:17', '2024-01-06 15:37:17'),
(79, 53, 64, 124, 'deposit', 92480, NULL, '2023-05-01', '2024-01-13 22:37:10', '2024-01-13 22:37:10'),
(80, 53, 64, 125, 'deposit', 93736, NULL, '2023-06-30', '2024-01-13 22:37:49', '2024-01-13 22:37:49'),
(81, 64, 81, 128, 'deposit', 25000, NULL, '2024-01-30', '2024-01-30 13:09:59', '2024-01-30 13:09:59'),
(82, 69, 87, 164, 'deposit', 22955, NULL, '2024-02-06', '2024-02-06 21:13:29', '2024-02-06 21:13:29'),
(83, 71, 89, 165, 'deposit', 5000, NULL, '2024-02-06', '2024-02-06 21:14:10', '2024-02-06 21:14:10'),
(85, 67, 85, 171, 'deposit', 23468.36, NULL, '2024-02-07', '2024-02-07 15:15:44', '2024-02-07 15:15:44'),
(86, 68, 86, 173, 'deposit', 11734.18, NULL, '2024-02-07', '2024-02-07 15:17:12', '2024-02-07 15:17:12'),
(87, 66, 83, 175, 'deposit', 5000, NULL, '2024-02-07', '2024-02-07 16:23:50', '2024-02-07 16:23:50'),
(88, 70, 88, 177, 'deposit', 10000, NULL, '2024-02-08', '2024-02-08 17:51:38', '2024-02-19 21:47:51'),
(108, 75, 98, 273, 'deposit', 25000, NULL, '2024-02-27', '2024-02-27 15:15:31', '2024-02-27 15:15:31'),
(115, 65, 82, 319, 'deposit', 25000, NULL, '2024-02-06', '2024-02-28 02:06:58', '2024-02-28 02:06:58'),
(143, 1, 65, 386, 'withdrawal', 10000, NULL, '2024-02-29', '2024-03-01 00:05:04', '2024-03-01 00:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `super` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `trader` tinyint(1) NOT NULL DEFAULT '0',
  `student` tinyint(1) NOT NULL DEFAULT '0',
  `theme` tinyint(1) NOT NULL DEFAULT '0',
  `trial` tinyint DEFAULT '0',
  `has_had_trial` tinyint(1) NOT NULL DEFAULT '0',
  `convertsTrial` tinyint(1) DEFAULT '0',
  `default_account` int NOT NULL DEFAULT '0',
  `account_to_reset` int DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first` tinyint(1) DEFAULT '1',
  `password_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `note`, `super`, `admin`, `trader`, `student`, `theme`, `trial`, `has_had_trial`, `convertsTrial`, `default_account`, `account_to_reset`, `remember_token`, `created_at`, `updated_at`, `first`, `password_updated`) VALUES
(1, 'admin', 'dscheers507@gmail.com', NULL, '$2y$10$kcaQJICGrpZ5H7fUqSOptuhtVOAEDHnwpK0j9NYbpZqjIoEApSqX2', '', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 'mLjzCt8w8wW2HbpyIHaLX1op12Pzm3Eq0rmfMCq61INwsFWWUpKhEgHj8yqJ', '2023-01-19 10:35:06', '2023-12-13 16:38:21', 0, '2023-12-13'),
(9, 'Dave Dushyant', 'dushyant@kingsleycapitalgroup.com', NULL, '$2y$10$6224tfNP6OoyAA6/OKNjX.RSnq1AurePUWXDS7Qs33GHQUtscRi86', '', 0, 0, 1, 1, 0, 1, 1, 1, 18851, 0, NULL, '2023-03-05 13:03:53', '2023-10-16 15:21:58', 0, '2023-12-13'),
(32, 'Anna Prodromou', 'anja.prod@icloud.com', NULL, '$2y$10$k7D2zEJJNjxOGlpiFf5V0.BbDPpQsu5tXzef1oVZxPtRnmw1XLtBe', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:16:13', '2023-09-20 17:16:13', 1, '2023-12-13'),
(33, 'Atul Modha', 'atulpmodha@gmail.com', NULL, '$2y$10$1hwGJSR5E47rPNfU7LcqaOtUDU60yOguB0S05gu.L5wRM3p37rsO6', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:19:09', '2023-10-11 22:41:31', 1, '2023-12-13'),
(34, 'Prem & Dushyant Dave', 'ddave35@gmail.com', NULL, '$2y$10$6rnossClFizZYb0mYfkfxe0urkZpUnePpiB/JovQ9QyMuXXqF2EDe', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:21:58', '2023-09-20 18:44:19', 1, '2023-12-13'),
(35, 'Aaron & Manoj Thanki', 'manojthanki@icloud.com', NULL, '$2y$10$ViMnJs/eDdQCLaeqrnT1Uud2E3//NNDHxwdgniIGE4igcKexTnoIS', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:22:58', '2023-10-04 11:29:16', 1, '2023-12-13'),
(36, 'Nihal Shah', 'nihal@doctors.org.uk', NULL, '$2y$10$h6dDJ1XpvWq3knyEEtcaMO4EPnhH4i4xys/CDarvlP/g3PQU00Wl.', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:24:06', '2023-10-04 13:04:54', 1, '2023-12-13'),
(37, 'Manish Thanki', 'manish.thanki@gmail.com', NULL, '$2y$10$Vfcsas.tW4he02xB/YAoP.A6lJiv40VKSLVrbd2lKK8JoeZR4p6L6', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:27:16', '2023-09-20 17:27:16', 1, '2023-12-13'),
(38, 'FHH Associates', 'veeral@fromhousestohomes.co.uk', NULL, '$2y$10$vfY7LOWhojorM0bMgAHOqu7Xowa4V3ZWnXbVArBhARNY/JuRYpQMm', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'WOYsD2c9EewhIqFlALIyg9yv7Ja0lprzvCQ0FjbUssyHgqj0QSg3d8qOHEpe', '2023-09-20 17:31:13', '2023-12-30 14:27:24', 1, '2023-12-13'),
(39, 'Rajendra Joshi', 'rajjoshi67@hotmail.com', NULL, '$2y$10$U1MGbCAezmzq28HW1YI9nOMdjF8b5gRuz4HOmrA1./ahKg8Oo7ox2', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:33:28', '2023-09-20 17:33:28', 1, '2023-12-13'),
(40, 'Beatrice Doubble', 'bdoubble1@yahoo.co.uk', NULL, '$2y$10$BNdcoPed0ZIyeHrRJY6WLuICfH/ZWfGitdj8sjGgid8SdgZMr1WLm', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:35:08', '2023-10-04 12:21:35', 1, '2023-12-13'),
(41, 'Vikas Vedi', 'vikas.vedi@hipkneespecialist.co.uk', NULL, '$2y$10$ywh71mfgse92HmGqnQTY/OGdT.BOpe/X4G9YMejCudQ/KB.KJiHPu', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:37:05', '2023-10-08 12:56:38', 1, '2023-12-13'),
(42, 'Bhavesh Divecha', 'bhav@divecha.co.uk', NULL, '$2y$10$y72gQe1CmJWmEkpFK4lHR.S5T3NcefJ5zvSHcfbnNs.r0k8zZYy.m', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:49:52', '2023-10-04 13:09:11', 1, '2023-12-13'),
(43, 'Bupendra Bechar', 'becharb@gmail.com', NULL, '$2y$10$AXXncadn4ku4G5mL2Z8hK.Hs.QScVcKI6diQZz.sOxDwPSwsUIEaW', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:51:54', '2023-09-20 17:51:54', 1, '2023-12-13'),
(44, 'M.Momen', 'mokakar@hotmail.co.uk', NULL, '$2y$10$X8NKQMDW0OCe8o4zT7hkKuqNij3r1pdkW1Fflaz8y11ATYN.crHHC', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:57:34', '2023-09-20 17:57:34', 1, '2023-12-13'),
(45, 'Neelam Dave', 'neelamdave@hotmail.co.uk', NULL, '$2y$10$5gEREzZykgB782..VTuXOeCb3Bx/dSdhUFpKLuUhO3yTnBGqLX4gC', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:58:30', '2023-10-04 12:08:21', 1, '2023-12-13'),
(46, 'Nilam Patel', 'np3757@gmail.com', NULL, '$2y$10$wuWE42bCOhex4aa60ngghO46J3TbNjosA8N2gxlE5LjHOb7ByRm/y', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 17:59:35', '2023-10-04 12:32:42', 1, '2023-12-13'),
(47, 'Yiannis Prodromou', 'yiannis@cityreed.com', NULL, '$2y$10$gB/XaseiSOufp8d0xLlg..GU2v1IvDFGpHI59EUQvRjiRD0/je.3K', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 18:03:48', '2023-10-04 11:42:08', 1, '2023-12-13'),
(48, 'Change Dynamics 360 Ltd', 'veeraljshah@icloud.com', NULL, '$2y$10$pUGTU8.Ie6AoCLCvY4UfVOYOAHxpJXYFQunn/B1Jf3gzsXi1Ya4sW', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 18:05:30', '2023-10-06 13:31:43', 1, '2023-12-13'),
(49, 'Savita Kantilal Modha', 'savitakantilalmodha@gmail.com', NULL, '$2y$10$L3oRcyCdIZwGeXKxho2hsuNh.BT.sQUteBfF1mpMCjfApS37JynA6', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-20 18:25:27', '2023-10-08 12:57:57', 1, '2023-12-13'),
(51, 'Kingsleymarkets Admin', 'service@kingsleycapitalgroup.com', NULL, '$2y$10$f.AK7hPh.gLROeXHrg44M.nl24.hgX2UzI3sIRLWWSaywezkVfo3a', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-09-26 15:55:42', '2023-09-26 15:55:42', 1, '2023-12-13'),
(52, 'Harshida Bechar', 'harshida.bechar@gmail.com', NULL, '$2y$10$zI.ZCMP9ymyumtE2FX0EI.gGOqpCbsieo6KujJedkBHN6Oejq2T4S', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-10-03 17:50:50', '2023-10-03 18:04:37', 1, '2023-12-13'),
(53, 'From Houses to Homes Ltd', 'kaval@fromhousestohomes.co.uk', NULL, '$2y$10$nFJReo/fHdKkJqb9Bnik4OEi2SJBnYgnf7sSJHOaVVQYIcdKGGGum', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-10-06 13:56:19', '2023-10-06 13:56:19', 1, '2023-12-13'),
(54, 'Mohammed Imran & Ibrahim Mohammed Khan', 'ikhan4u@gmail.com', NULL, '$2y$10$PAfVYW8Wm6H.I9VogrRXSOWp2rrqQEBR5daGz/kC4rzf2GgHIBMm6', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-10-11 15:20:30', '2023-12-12 14:39:20', 1, '2023-12-13'),
(55, 'Krishna Modha', 'krishnamodha@googlemail.com', NULL, '$2y$10$C00Q7FzNJsnjWIRax4KfS.94tOEoDZvDZtdOt0AcMtmhSclYx64hC', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-10-11 22:44:51', '2023-10-11 22:44:51', 1, '2023-12-13'),
(56, 'Narinder S. Ghotra', 'ghotra_ns@hotmail.co.uk', NULL, '$2y$10$iIlfXrlitm0Ab.JMAI1DeemiRamJWt58Qx4gfsDWX1XzGKPrHuF4i', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-11-01 19:21:10', '2023-11-01 19:21:10', 1, '2023-12-13'),
(57, 'Harwinder Singh Multani', 'hsmultani@hotmail.com', NULL, '$2y$10$jKNRMJPv3togME9w/cMoh.DfFi1jFy6bHHc0Q4j2YYcst8sg8ABfm', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-11-07 22:50:13', '2023-11-07 22:50:13', 1, '2023-12-13'),
(59, '1st - ENT Limited', 'mr.singh@1st-ent.com', NULL, '$2y$10$U7NcLTTm8391rDTora9dm.eAoLZg4vCGvK3iVVkXdnqDDU94laIHm', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-12-04 19:24:06', '2023-12-04 19:24:06', 1, '2023-12-13'),
(60, 'Max & Carolin Muster', 'daniel@kingsleycapitalgroup.com', NULL, '$2y$10$10TnwrP0dKUhjaxPKjLOP.2EbYfC4D4vH5csY7IpoXKmX05depYhi', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2023-12-06 19:38:12', '2024-01-12 19:41:15', 1, '2023-12-13'),
(62, 'BROKR LTD', 'Admin@fromhousestohomes.co.uk', NULL, '$2y$10$tynbo7tPnP5bx2lLCXuQf.ssnI7tRgyiknt5.mkbZkB3y59x2rIye', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-01-16 17:58:56', '2024-01-16 17:58:56', 1, '2024-01-16'),
(63, 'araik', 'araik@test.test', NULL, '$2y$10$nAiBexn34Zzt96pfwA54XuVZ0xR6ePunkOOLrSZmGTLHOrCFIlHqK', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-01-16 18:05:18', '2024-02-11 22:33:20', 1, '2024-01-16'),
(64, 'Linda Villarreal Paierl & Dipl. Ing. Herbert Paier', 'linda@paierlconsulting.com', NULL, '$2y$10$PId4znvrukXNVKELm//D6uS8/QFEBv2D4sgYmut.zcIw/J8ASSuoS', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-01-16 18:17:12', '2024-01-16 18:17:12', 1, '2024-01-16'),
(65, 'Bernadette Weber', 'b.weber00@hotmail.com', NULL, '$2y$10$jNejz1b9.NOCY7dfWqLRde/cz1udP0dBHyKPUXROQMVf5xBKha8SC', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-03 15:29:48', '2024-02-03 15:29:48', 1, '2024-02-03'),
(66, 'Simon Weissenberger & Katerina Schonova', 'sweissenberger11@gmail.com', NULL, '$2y$10$EVoEVeC7UDpQIllqXnW1oe.4bj1yL4FPYAWcCVwpDJz4tn6y0vBjG', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-04 19:49:24', '2024-02-04 19:51:51', 1, '2024-02-04'),
(67, 'Kaval Shah', 'kavalnshah@yahoo.co.uk', NULL, '$2y$10$yvmp9OrVhR0XzJScn6FjnOi2fGmlOEEeBy5OvAVg8tl35dczrdrja', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-05 14:07:00', '2024-02-05 14:07:00', 1, '2024-02-05'),
(68, 'Naresh Shah', 'ndshah1455@gmail.com', NULL, '$2y$10$tvCDm9rw3aKRZDm5iQ4fbenU/nzGjtNPj2uvVi1JaAh6EIyDO44KS', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-05 14:09:24', '2024-02-05 14:09:24', 1, '2024-02-05'),
(69, 'Diptiben Shah', 'diptibenshah57@gmail.com', NULL, '$2y$10$ZZfwXzrW2Y43CLYapGLb9utj2h1AZX2caQCBL9HfRHlmWH9OZCBbW', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-05 14:10:49', '2024-02-05 14:10:49', 1, '2024-02-05'),
(70, 'Marina Gaeva ép. Bykov', 'bykovam@yahoo.com', NULL, '$2y$10$.g5CqQGg7buQApk/jiWqNOqN6aWiUKiP6C8StKG4ManbcjqhR78T2', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-06 18:53:10', '2024-02-07 15:35:33', 1, '2024-02-07'),
(71, 'Harold O\'Neal', 'Bill.Neal@seznam.cz', NULL, '$2y$10$pF6QnKsalKJujMLMI1fP1O3v.VK5517MjhBY.9e7uKRP7c.XHbWnK', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-06 18:54:05', '2024-02-20 18:36:34', 1, '2024-02-20'),
(72, 'araikuser', 'araikuser@test.test', NULL, '$2y$10$uOHEfnSGYqJhMj4KazIHTu/GP4jhJG4IgzirXZyLcuEYqJ2mzE4YS', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-12 00:13:16', '2024-02-12 00:13:16', 1, '2024-02-11'),
(73, 'Tanner Caldwell Cook', 'tanner@otlimports.com', NULL, '$2y$10$2VVe/5rvh/yQDxsFgk1HHeaB9UBKyNOl7CHZ0AQrGijxUvrAE0lwu', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-14 11:38:33', '2024-02-14 11:38:33', 1, '2024-02-14'),
(74, 'Test0108', 'haberhauerdaniel@gmail.com', NULL, '$2y$10$mbaiThqYVmKf5mbtoOXQh..L/CqqgbAgxD4R60z3Jc9IbbGZPehce', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-19 22:42:10', '2024-02-19 22:42:10', 1, '2024-02-19'),
(75, 'Marion Nina Mangold-Bickel', 'marionane@gmail.com', NULL, '$2y$10$uVKaf5P53wg0CEehp5tPvuTYeX2F.fIIn0dHliVEjRA5nO31e5mVu', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-02-21 19:27:13', '2024-02-21 19:27:13', 1, '2024-02-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alerts_user_id_foreign` (`user_id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailybalances`
--
ALTER TABLE `dailybalances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eombalances`
--
ALTER TABLE `eombalances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statements`
--
ALTER TABLE `statements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statements_account_id_foreign` (`account_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_account_id_foreign` (`account_id`),
  ADD KEY `transactions_alert_id_foreign` (`alert_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dailybalances`
--
ALTER TABLE `dailybalances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `eombalances`
--
ALTER TABLE `eombalances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=646;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statements`
--
ALTER TABLE `statements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `statements`
--
ALTER TABLE `statements`
  ADD CONSTRAINT `statements_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `transactions_alert_id_foreign` FOREIGN KEY (`alert_id`) REFERENCES `alerts` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

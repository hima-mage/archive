-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 02:56 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminstrations`
--

CREATE TABLE `adminstrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminstrations`
--

INSERT INTO `adminstrations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'إدارة 1', '2019-10-06 01:32:10', '2019-10-06 01:32:10'),
(4, 'MBMB', '2019-10-07 07:19:19', '2019-10-07 07:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `sub_category` bigint(20) UNSIGNED NOT NULL,
  `adminstration` bigint(20) UNSIGNED NOT NULL,
  `department` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `location` int(11) UNSIGNED NOT NULL,
  `school` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `category`, `sub_category`, `adminstration`, `department`, `date`, `location`, `school`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'MBMB', 3, 3, 3, 10, '2019-10-10', 1, 1, 1, '2019-10-10 12:54:43', '2019-10-10 12:54:43'),
(2, 'MBMB', 3, 10, 3, 7, '2019-10-17', 1, 1, 1, '2019-10-10 12:55:32', '2019-10-10 12:55:32'),
(3, 'MBMB', 3, 3, 3, 7, '2019-10-24', 1, 1, 1, '2019-10-10 12:59:32', '2019-10-10 12:59:32'),
(4, 'MBMB', 3, 10, 3, 7, '2019-10-24', 1, 1, 1, '2019-10-10 13:00:58', '2019-10-10 13:00:58'),
(5, 'MBMB', 3, 10, 3, 10, '2019-10-17', 1, 1, 1, '2019-10-10 13:02:49', '2019-10-10 13:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `album_attachments`
--

CREATE TABLE `album_attachments` (
  `id` int(11) NOT NULL,
  `desc` varbinary(191) DEFAULT NULL,
  `file` varchar(191) NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album_attachments`
--

INSERT INTO `album_attachments` (`id`, `desc`, `file`, `type`, `album_id`, `created_at`, `updated_at`) VALUES
(1, 0x54657374, '1570719572sJPm6gir4w.png', 'image', 3, '2019-10-10 12:59:32', '2019-10-10 12:59:32'),
(2, 0x31313131, '1570719658rrbURWAwZM.png', 'image', 4, '2019-10-10 13:00:58', '2019-10-10 13:00:58'),
(3, 0x32323232, '15707197697mCw71a5KQ.jpg', 'image', 5, '2019-10-10 13:02:49', '2019-10-10 13:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'التصنيف 3', '2019-10-04 23:58:52', '2019-10-06 02:42:09'),
(4, 'test5', '2019-10-07 05:23:35', '2019-10-07 05:23:35'),
(8, 'MBMB', '2019-10-07 05:54:43', '2019-10-07 05:54:43'),
(9, 'Mohammed Badry', '2019-10-07 05:55:33', '2019-10-07 05:55:33'),
(10, 'قسم 1', '2019-10-07 06:25:03', '2019-10-07 06:25:03'),
(11, 'قسم 1', '2019-10-07 06:27:25', '2019-10-07 06:27:25'),
(12, 'قسم 1', '2019-10-07 06:27:37', '2019-10-07 06:27:37'),
(13, 'Mohammed Badry', '2019-10-07 06:27:41', '2019-10-07 06:27:41'),
(14, 'قسم 1', '2019-10-07 06:29:34', '2019-10-07 06:29:34'),
(15, 'Mohammed Badry', '2019-10-07 06:30:51', '2019-10-07 06:30:51'),
(16, 'قسم 1', '2019-10-07 06:31:19', '2019-10-07 06:31:19'),
(17, 'قسم 1', '2019-10-07 06:32:29', '2019-10-07 06:32:29'),
(18, 'قسم 1', '2019-10-07 06:33:02', '2019-10-07 06:33:02'),
(19, 'قسم 1', '2019-10-07 07:01:38', '2019-10-07 07:01:38'),
(20, 'قسم 1', '2019-10-07 07:02:19', '2019-10-07 07:02:19'),
(21, 'قسم 1', '2019-10-07 07:03:05', '2019-10-07 07:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `admin_id`, `created_at`, `updated_at`) VALUES
(7, 'قسم 1', 3, '2019-10-06 01:33:06', '2019-10-06 01:33:06'),
(10, 'قسم 2', 3, '2019-10-06 01:59:57', '2019-10-06 01:59:57'),
(11, 'قسم 3', 3, '2019-10-06 02:02:14', '2019-10-06 02:26:55'),
(12, 'قسم 4', 3, '2019-10-06 02:02:28', '2019-10-06 02:27:01'),
(13, 'قسم 5', 3, '2019-10-06 02:02:38', '2019-10-06 02:27:07'),
(14, 'قسم 6', 3, '2019-10-07 07:26:31', '2019-10-07 07:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `sub_category` bigint(20) UNSIGNED NOT NULL,
  `adminstration` bigint(20) UNSIGNED NOT NULL,
  `department` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `to_category` bigint(20) UNSIGNED NOT NULL,
  `to_sub_category` bigint(20) UNSIGNED NOT NULL,
  `follow_status` varchar(191) NOT NULL,
  `follow_date` date NOT NULL,
  `priority` varchar(1) DEFAULT NULL,
  `confidentiality` varchar(1) NOT NULL,
  `main_file` varchar(191) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exports`
--

INSERT INTO `exports` (`id`, `name`, `category`, `sub_category`, `adminstration`, `department`, `date`, `to_category`, `to_sub_category`, `follow_status`, `follow_date`, `priority`, `confidentiality`, `main_file`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'MBMB', 3, 3, 3, 7, '2019-10-10', 3, 3, 'val-1', '2019-10-17', '1', '1', '1570691232Jecojy57f9.pdf', 1, '2019-10-10 05:07:12', '2019-10-13 11:14:25'),
(13, 'MBMB', 3, 3, 3, 7, '2019-10-10', 3, 10, 'val-1', '2019-10-24', '2', '2', '1570699649FL3Gqw8kS8.pdf', 1, '2019-10-10 07:27:29', '2019-10-10 07:27:29'),
(14, 'Mohammed Badry', 3, 3, 3, 7, '2019-10-11', 3, 10, 'val-1', '2019-10-18', '3', '3', '1570796182h5mg6KC5CG.pdf', 1, '2019-10-11 10:16:22', '2019-10-11 10:16:22'),
(15, 'Teeeeeeeeeeeest', 3, 3, 3, 7, '2019-10-11', 3, 10, 'val-1', '2019-10-18', '1', '1', '', 1, '2019-10-11 10:19:58', '2019-10-11 10:19:58'),
(16, 'قسم 1', 3, 3, 3, 10, '2019-10-18', 3, 10, 'val-1', '2019-10-18', '1', '1', '1570797473d0JkSVS9SL.pdf', 1, '2019-10-11 10:37:53', '2019-10-11 10:37:53'),
(17, 'test5', 3, 10, 3, 10, '2019-10-12', 3, 10, 'val-1', '2019-10-19', '1', '1', NULL, 1, '2019-10-12 02:14:57', '2019-10-12 02:14:57'),
(18, 'MBMB', 3, 10, 3, 10, '2019-10-12', 3, 10, 'val-1', '2019-10-19', '1', '1', NULL, 1, '2019-10-12 02:20:41', '2019-10-12 02:20:41'),
(19, 'test5', 3, 10, 3, 10, '2019-10-12', 3, 10, 'val-1', '2019-10-12', '1', '1', NULL, 1, '2019-10-12 02:21:28', '2019-10-12 02:21:28'),
(20, 'MBMB', 3, 10, 3, 10, '2019-10-12', 3, 10, 'val-1', '2019-10-19', '1', '1', NULL, 1, '2019-10-12 02:22:04', '2019-10-12 02:22:04'),
(21, 'MBMB', 3, 10, 3, 10, '2019-10-19', 3, 10, 'val-2', '2019-10-12', '1', '1', NULL, 1, '2019-10-12 02:28:06', '2019-10-12 02:28:06'),
(22, 'aaaaaaaaaa', 3, 3, 3, 7, '2019-10-12', 3, 3, 'val-1', '2019-10-12', '1', '1', '1570856957aOd6PcZmQB.pdf', 1, '2019-10-12 02:30:36', '2019-10-12 03:09:17'),
(23, 'DDDD', 3, 10, 3, 10, '2019-10-12', 3, 10, 'val-1', '2019-10-19', '2', '2', NULL, 1, '2019-10-12 04:30:45', '2019-10-12 04:30:45'),
(24, 'MBMB', 3, 3, 3, 7, '2019-10-12', 3, 10, 'val-1', '2019-10-19', '1', '1', NULL, 1, '2019-10-12 07:19:03', '2019-10-12 07:19:03'),
(25, 'MBMB', 3, 3, 3, 7, '2019-10-19', 3, 3, 'val-1', '2019-10-12', '1', '1', NULL, 1, '2019-10-12 07:19:45', '2019-10-12 07:19:45'),
(26, 'MBMB', 3, 3, 3, 7, '2019-10-12', 3, 3, 'val-1', '2019-10-12', '1', '1', NULL, 1, '2019-10-12 07:35:43', '2019-10-12 07:35:43'),
(27, 'MBMB', 3, 3, 3, 10, '2019-10-12', 3, 10, 'val-1', '2019-10-19', '1', '1', NULL, 1, '2019-10-12 12:17:06', '2019-10-12 12:17:06'),
(28, 'MBMB', 3, 3, 3, 7, '2019-10-12', 3, 3, 'val-1', '2019-10-12', '1', '1', NULL, 1, '2019-10-12 12:49:12', '2019-10-12 12:49:12'),
(29, 'jjjj', 3, 3, 3, 7, '2019-10-12', 3, 10, 'val-1', '2019-10-12', '1', '1', NULL, 1, '2019-10-12 12:55:25', '2019-10-12 12:55:25'),
(30, 'MBMB', 3, 3, 3, 7, '2019-10-19', 3, 3, 'val-1', '2019-10-19', '1', '1', NULL, 1, '2019-10-12 12:56:16', '2019-10-12 12:56:16'),
(31, 'MBMB', 3, 3, 3, 7, '2019-10-19', 3, 3, 'val-1', '2019-10-19', '1', '1', NULL, 1, '2019-10-12 12:56:33', '2019-10-12 12:56:33'),
(32, 'lkljklj', 3, 3, 3, 7, '2019-10-12', 3, 3, 'val-1', '2019-10-19', '1', '1', NULL, 1, '2019-10-12 13:12:34', '2019-10-12 13:12:50'),
(33, 'MBMB', 3, 3, 3, 7, '2019-10-13', 3, 3, 'val-1', '2019-10-20', '1', '1', '1570970911SDUaMa9Hir.pdf', 1, '2019-10-13 10:36:22', '2019-10-13 10:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `export_attachments`
--

CREATE TABLE `export_attachments` (
  `id` int(11) NOT NULL,
  `desc` varbinary(191) DEFAULT NULL,
  `file` varchar(191) NOT NULL,
  `export_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `export_attachments`
--

INSERT INTO `export_attachments` (`id`, `desc`, `file`, `export_id`, `created_at`, `updated_at`) VALUES
(39, 0x746573742031, '15711163212hipAfTiye.png', 12, '2019-10-15 03:12:01', '2019-10-15 03:12:01'),
(40, 0x746573742032, '1571117826bBHuw0rN27.png', 12, '2019-10-15 03:37:06', '2019-10-15 03:37:06'),
(41, 0x746573742033, '1571117878Oro8iC6mSh.png', 12, '2019-10-15 03:37:58', '2019-10-15 03:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `export_reminders`
--

CREATE TABLE `export_reminders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `type` varchar(191) NOT NULL,
  `datetime` varchar(191) NOT NULL,
  `export_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `export_reminders`
--

INSERT INTO `export_reminders` (`id`, `user_id`, `type`, `datetime`, `export_id`, `created_at`, `updated_at`) VALUES
(29, '1', 'email', '2019-10-22', 12, '2019-10-15 04:19:03', '2019-10-15 04:19:03'),
(30, '1', 'email', '2019-10-15', 12, '2019-10-15 04:26:57', '2019-10-15 04:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `sub_category` bigint(20) UNSIGNED NOT NULL,
  `adminstration` bigint(20) UNSIGNED NOT NULL,
  `department` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `location` int(11) UNSIGNED NOT NULL,
  `school` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `form_attachments`
--

CREATE TABLE `form_attachments` (
  `id` int(11) NOT NULL,
  `desc` varbinary(191) DEFAULT NULL,
  `file` varchar(191) NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `sub_category` bigint(20) UNSIGNED NOT NULL,
  `adminstration` bigint(20) UNSIGNED NOT NULL,
  `department` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `to_category` bigint(20) UNSIGNED NOT NULL,
  `to_sub_category` bigint(20) UNSIGNED NOT NULL,
  `follow_status` varchar(191) NOT NULL,
  `follow_date` date NOT NULL,
  `priority` varchar(1) DEFAULT NULL,
  `confidentiality` varchar(1) NOT NULL,
  `remind` tinyint(1) NOT NULL DEFAULT '0',
  `remind_to` varchar(191) NOT NULL,
  `main_file` varchar(191) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_attachments`
--

CREATE TABLE `general_attachments` (
  `id` int(11) NOT NULL,
  `desc` varbinary(191) DEFAULT NULL,
  `file` varchar(191) NOT NULL,
  `general_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `export_number` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `sub_category` bigint(20) UNSIGNED NOT NULL,
  `adminstration` bigint(20) UNSIGNED NOT NULL,
  `department` bigint(20) UNSIGNED NOT NULL,
  `recieve_date` date NOT NULL,
  `date` date NOT NULL,
  `from_category` bigint(20) UNSIGNED NOT NULL,
  `from_sub_category` bigint(20) UNSIGNED NOT NULL,
  `follow_status` varchar(191) NOT NULL,
  `follow_date` date NOT NULL,
  `priority` varchar(1) DEFAULT NULL,
  `confidentiality` varchar(1) NOT NULL,
  `remind` varchar(191) DEFAULT NULL,
  `remind_to` varchar(191) NOT NULL,
  `main_file` varchar(191) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imports`
--

INSERT INTO `imports` (`id`, `export_number`, `name`, `category`, `sub_category`, `adminstration`, `department`, `recieve_date`, `date`, `from_category`, `from_sub_category`, `follow_status`, `follow_date`, `priority`, `confidentiality`, `remind`, `remind_to`, `main_file`, `user_id`, `created_at`, `updated_at`) VALUES
(10, '4', 'Mohammed Badry', 3, 3, 3, 10, '2019-10-11', '2019-10-11', 3, 10, 'val-1', '2019-10-18', '3', '3', 'sms', '0100036267', '15707984979OWXjAzJ6n.pdf', 1, '2019-10-11 10:54:57', '2019-10-11 10:54:57'),
(11, '55', 'MBMB', 3, 3, 3, 7, '2019-10-11', '2019-10-18', 3, 10, 'val-1', '2019-10-18', '1', '1', 'sms', '0100036267', '', 1, '2019-10-11 10:55:26', '2019-10-11 10:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `import_attachments`
--

CREATE TABLE `import_attachments` (
  `id` int(11) NOT NULL,
  `desc` varbinary(191) DEFAULT NULL,
  `file` varchar(191) NOT NULL,
  `import_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `import_attachments`
--

INSERT INTO `import_attachments` (`id`, `desc`, `file`, `import_id`, `created_at`, `updated_at`) VALUES
(1, NULL, '1570798497UGofXnjymh.pdf', 10, '2019-10-11 10:54:57', '2019-10-11 10:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_10_131524_create_categories_table', 1),
(4, '2019_05_10_133707_create_skills_table', 1),
(5, '2019_05_10_145708_create_tags_table', 1),
(6, '2019_05_10_151047_create_pages_table', 1),
(7, '2019_05_10_152354_create_videos_table', 1),
(8, '2019_05_10_185456_create_skills_videos_table', 1),
(9, '2019_05_10_192413_create_tags_videos_table', 1),
(10, '2019_05_10_210936_create_comments_table', 1),
(11, '2019_05_11_022118_add_group_to_users_table', 1),
(12, '2019_05_11_112533_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `sub_category` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` tinytext NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reminder_dates`
--

CREATE TABLE `reminder_dates` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `reminder_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `cat_id`, `created_at`, `updated_at`) VALUES
(3, 'فرعي 3', 3, '2019-10-06 03:25:23', '2019-10-07 07:26:01'),
(10, 'قسم 1', 3, '2019-10-07 07:21:56', '2019-10-07 07:21:56'),
(11, 'MBMB', 3, '2019-10-07 07:23:23', '2019-10-07 07:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `group`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@website.com', '12345678', NULL, '$2y$10$omwVXLJyF0sSBs26n3sga.4Wj01KGOtRw1.5ERsPMraKixVSuPPh.', NULL, 'admin', '2019-10-04 23:58:52', '2019-10-04 23:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `sub_category` bigint(20) UNSIGNED NOT NULL,
  `adminstration` bigint(20) UNSIGNED NOT NULL,
  `department` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `location` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `video_attachments`
--

CREATE TABLE `video_attachments` (
  `id` int(11) NOT NULL,
  `desc` varbinary(191) DEFAULT NULL,
  `file` varchar(191) NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminstrations`
--
ALTER TABLE `adminstrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_attachments`
--
ALTER TABLE `album_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id_foreign` (`album_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id_foreign` (`admin_id`);

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `export_attachments`
--
ALTER TABLE `export_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `export_id_foreign` (`export_id`);

--
-- Indexes for table `export_reminders`
--
ALTER TABLE `export_reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `export_id_foreign` (`export_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_attachments`
--
ALTER TABLE `form_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id_foreign` (`form_id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_attachments`
--
ALTER TABLE `general_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_id_foreign` (`general_id`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_attachments`
--
ALTER TABLE `import_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `import_id_foreign` (`import_id`);

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
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder_dates`
--
ALTER TABLE `reminder_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminder_id_foreign` (`reminder_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id_foreign` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_attachments`
--
ALTER TABLE `video_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id_foreign` (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminstrations`
--
ALTER TABLE `adminstrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `album_attachments`
--
ALTER TABLE `album_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `export_attachments`
--
ALTER TABLE `export_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `export_reminders`
--
ALTER TABLE `export_reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_attachments`
--
ALTER TABLE `form_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_attachments`
--
ALTER TABLE `general_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `import_attachments`
--
ALTER TABLE `import_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminder_dates`
--
ALTER TABLE `reminder_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_attachments`
--
ALTER TABLE `video_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album_attachments`
--
ALTER TABLE `album_attachments`
  ADD CONSTRAINT `album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `adminstrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `export_attachments`
--
ALTER TABLE `export_attachments`
  ADD CONSTRAINT `export_id_foreign` FOREIGN KEY (`export_id`) REFERENCES `exports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_attachments`
--
ALTER TABLE `form_attachments`
  ADD CONSTRAINT `form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_attachments`
--
ALTER TABLE `general_attachments`
  ADD CONSTRAINT `general_id_foreign` FOREIGN KEY (`general_id`) REFERENCES `generals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `import_attachments`
--
ALTER TABLE `import_attachments`
  ADD CONSTRAINT `import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reminder_dates`
--
ALTER TABLE `reminder_dates`
  ADD CONSTRAINT `reminder_id_foreign` FOREIGN KEY (`reminder_id`) REFERENCES `reminders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `category_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `video_attachments`
--
ALTER TABLE `video_attachments`
  ADD CONSTRAINT `video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

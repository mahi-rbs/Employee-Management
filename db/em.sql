-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 01:39 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `em`
--

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'কমিশনার', '2018-07-30 22:54:11', '2018-07-31 04:37:09', NULL),
(2, 'যুগ্ম কমিশনার', '2018-07-30 22:54:16', '2018-07-30 22:54:16', NULL),
(3, 'অতিরিক্ত কমিশনার', NULL, NULL, NULL),
(4, 'ডেপুটি কমিশনার', NULL, NULL, NULL),
(5, 'সহকারী কমিশনার', NULL, NULL, NULL),
(6, 'উচ্চমান সহকারী', NULL, NULL, NULL),
(7, 'সিপাই', NULL, '2018-08-06 04:22:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bangla` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` int(10) NOT NULL,
  `work_place` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `past_work_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_resigne` date NOT NULL,
  `computer_skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `date_hired` date NOT NULL,
  `picture` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `name_bangla`, `father`, `mother`, `pre_address`, `per_address`, `mobile`, `nid`, `department`, `designation`, `work_place`, `past_work_place`, `date_resigne`, `computer_skill`, `email`, `dob`, `date_hired`, `picture`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'mahi', 'মাহি', 'সেলিম', 'কাম্রুন', 'ভলা', 'ভলা', '01918993427', '344', NULL, 1, '1', '1', '2018-07-03', 'আমি কিছু নাজি না', 'admin1@gmail.com', '1990-07-05', '2018-07-03', 'Mahi_300-5b67e794adb22.jpg', 1, 4, '2018-08-06 00:15:48', '2018-08-06 00:15:48', NULL),
(6, 'amin', 'আমিন', 'জামিনa', 'ঙ্কামিনa', 'ধাকা1', 'ধাকা1', '019189934271', '০০০০০২৩২৩1', NULL, 3, '5', '1', '2018-08-20', '১২১২1', 'arifurrahman91@live.com1', '1990-06-29', '2018-07-02', '21529-5b6806ca8de9c.jpg', 1, 4, '2018-08-06 02:15:00', '2018-08-06 02:57:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_edu`
--

CREATE TABLE `employee_edu` (
  `id` int(10) NOT NULL,
  `edu_level` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `passing_year` int(10) NOT NULL,
  `name_inst` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `em_id` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_edu`
--

INSERT INTO `employee_edu` (`id`, `edu_level`, `division`, `passing_year`, `name_inst`, `subject`, `em_id`, `created_by`, `created_at`, `updated_at`) VALUES
(16, 'HSC', 'Barishal', 2007, 'UC High School', 'Accounting', 5, 4, '2018-08-06 17:37:02', '2018-08-06 17:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `salary` decimal(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2017_02_18_003431_create_department_table', 1),
(3, '2017_02_18_004142_create_division_table', 1),
(4, '2017_02_18_004326_create_country_table', 1),
(5, '2017_02_18_005005_create_state_table', 1),
(6, '2017_02_18_005241_create_city_table', 1),
(7, '2017_03_17_163141_create_employees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting', '2018-08-06 11:01:16', '2018-08-06 05:01:16'),
(4, 'Bangla', '2018-08-06 05:01:45', '2018-08-06 05:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'admin@gmail.com', '$2y$10$W7bC67Qy245PGGYGuMjddOuQBGzF3by1EKapa0z2XBP/asa9n3ggm', '2lZGBBgSISNnLlWclMEtDWgswBKnrSoljqNoUMt9xURA4IkXvUvguS91FVYx', '2018-07-31 08:32:52', '2018-07-31 08:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `work_place`
--

CREATE TABLE `work_place` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_place`
--

INSERT INTO `work_place` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'সদর দপ্তর', '2018-08-06 05:01:38', '2018-08-05 23:01:38'),
(2, 'ডেমরা বিভাগ', '2018-08-06 05:13:33', '2018-08-05 23:04:25'),
(5, 'সূত্রাপুর', '2018-08-05 23:04:41', '2018-08-05 23:04:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_edu`
--
ALTER TABLE `employee_edu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_place`
--
ALTER TABLE `work_place`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_edu`
--
ALTER TABLE `employee_edu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `work_place`
--
ALTER TABLE `work_place`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

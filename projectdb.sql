-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 11:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproject`
--

CREATE TABLE `addproject` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword_project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des_project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addproject`
--

INSERT INTO `addproject` (`project_id`, `project_name`, `keyword_project`, `des_project`, `facebook`, `email`, `phone`, `type_project`, `genre_project`, `category_project`, `branch_project`, `created_at`, `updated_at`) VALUES
(1, 'ระบบตรวจเช็คสภาพอากาศ', 'สภาพอากาศ', 'ระบบตรวจเช็คสภาพอากาศจะเป็นตรวจสภาพอากาศนะพื้นที่นั้นๆ', NULL, NULL, NULL, 'วิจัย', 'เว็บเเอพพลิเคชัน', 'ติดตาม', NULL, '2020-07-04 20:37:02', '2020-07-04 20:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_company`
--

CREATE TABLE `admin_company` (
  `admin_company_id` bigint(20) UNSIGNED NOT NULL,
  `admin_company_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_company_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fileprojectupload`
--

CREATE TABLE `fileprojectupload` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_fileproject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_fileproject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_fileproject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img_upload`
--

CREATE TABLE `img_upload` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `originname_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2020_06_17_155713_fileprojectupload_table', 1),
(5, '2020_06_18_134153_imgupload', 1),
(6, '2020_06_24_183719_admin_company', 1),
(7, '2020_06_09_132633_addproject_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `province`, `email`, `email_verified_at`, `username`, `password`, `confirm_password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'nattapon', 'ชาย', 'เชียงใหม่', 'ohmsbn@gmail.com', NULL, 'ohmme789', '$2y$10$MXe6wIUAK7RZ.bpX3pBzPuJr5qpAEgaeL5FHsCfQJdBrLNblEZM9e', NULL, NULL, '2020-07-01 07:01:32', '2020-07-01 07:01:32', NULL),
(2, 'Ohm nattapon', 'ชาย', 'เชียงใหม่', 'ommi406@outlook.com', NULL, 'ohmsbn123', '123456789', NULL, NULL, NULL, NULL, NULL),
(5, 'nattapon', 'ชาย', 'เชียงใหม่', 'ommi@outlook.com', NULL, 'ohm123', '1234567891', NULL, NULL, NULL, NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproject`
--
ALTER TABLE `addproject`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `admin_company`
--
ALTER TABLE `admin_company`
  ADD PRIMARY KEY (`admin_company_id`);

--
-- Indexes for table `fileprojectupload`
--
ALTER TABLE `fileprojectupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_upload`
--
ALTER TABLE `img_upload`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproject`
--
ALTER TABLE `addproject`
  MODIFY `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_company`
--
ALTER TABLE `admin_company`
  MODIFY `admin_company_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fileprojectupload`
--
ALTER TABLE `fileprojectupload`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_upload`
--
ALTER TABLE `img_upload`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

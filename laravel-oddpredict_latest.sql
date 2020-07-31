-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 07:09 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-oddpredict`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_code`, `picture`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '3335a353f00d34fa54acd36d54055cb1WIN_20171106_22_48_05_Pro.jpg', 0, '2019-07-09 12:30:55', '2019-07-09 12:31:14'),
(2, '9SOWiJXv3o', '327d7cfa8f6b5357d032c61189fe824dWIN_20171204_11_44_47_Pro.jpg', 1, '2019-07-09 12:49:10', '2019-07-09 12:49:10');

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
(6, '2019_07_05_140431_create_tickets_table', 3),
(7, '2019_07_04_232243_add_ending_date_to_users_table', 4),
(8, '2019_07_04_215411_create_games_table', 5);

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
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No Reply yet',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `title`, `message`, `reply`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2019 Post', 'iuhj', 'No Reply yet', 1, '2019-07-05 16:03:26', '2019-07-05 16:03:26'),
(2, 2, 'another test', 'playing along', 'No Reply yet', 1, '2019-07-09 09:59:27', '2019-07-09 09:59:27'),
(3, 4, 'first trial', 'sdsf', 'dfdd', 0, '2019-07-09 13:41:58', '2019-07-09 22:17:11'),
(4, 4, 'vdgd', 'cgxcvc', 'No Reply yet', 1, '2019-07-09 22:18:30', '2019-07-09 22:18:30'),
(5, 4, 'New nonso ticket', 'nkjk', 'No Reply yet', 1, '2019-07-09 22:21:01', '2019-07-09 22:21:01'),
(6, 4, 'New nonso ticket', 'nkjk', 'No Reply yet', 1, '2019-07-09 22:21:47', '2019-07-09 22:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ending_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `activated`, `status`, `remember_token`, `created_at`, `updated_at`, `ending_date`) VALUES
(1, 'tripletens', 'vicks@gmail.com', '$2y$10$P6GLLBKpS3kUthlDLQIJgu.gxNip.ISFIKHD1DN5G15/zoHIboO3G', 'user', 1, 1, '2woJ8ZtVpDM5p87PnQ377vW8eB7gDFuxm4KTWajXHlMKLe2BJ1lxDEj1tmdX', '2019-07-04 22:59:34', '2019-07-09 03:03:39', '2020-07-09'),
(2, 'admin', 'admin@admin.com', '$2y$10$P6GLLBKpS3kUthlDLQIJgu.gxNip.ISFIKHD1DN5G15/zoHIboO3G', 'admin', 0, 0, 'oO8xlZlwvOFZxwe9VnJq0rtPCyPaASP59SxAhjO3b7Z7O2jM7VVof60obmO9', '2019-07-04 22:59:34', '2019-07-09 03:04:38', '2019-10-09'),
(3, 'tripletens', 'admin@gmail.com', '$2y$10$P6GLLBKpS3kUthlDLQIJgu.gxNip.ISFIKHD1DN5G15/zoHIboO3G', 'admin', 1, 1, 'BcKgvfhjKXF2snyhQQaqSL7BDBLl6FAIHolAmvhAg7HvsdAvBdUVjrdZ4XO1', '2019-07-04 22:59:34', '2019-07-09 03:03:39', '2020-07-09'),
(4, 'Admin2', 'admin@yahoo.com', '$2y$10$JZ7QuTp8jBBM7ne7ODqbCuHVAMxLVNFzvF2Pr6Y6GXsVHnpE7If/a', 'admin', 0, 1, 'hNL4H09OpGArPoeDeI3lh0Ruz0Hi6fTjmFIGIn4usLmhG40lkQvLfdynYJy1', '2019-07-09 11:28:30', '2019-07-10 00:48:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
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
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

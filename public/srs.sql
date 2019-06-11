-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 10:50 AM
-- Server version: 5.7.19
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srs`
--

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `clothes_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `shop_id`, `clothes_type_id`, `name`, `gender`, `age_group`, `color`, `price`, `size`, `material`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Mason Finley', 'female', 'old', 'Et assumenda labore', '160', 'XXXL', 'vEum aliquip aut quis', 'shop39_Blue_Tshirt.jpg', '2019-06-11 02:44:53', '2019-06-11 02:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `clothes_types`
--

CREATE TABLE `clothes_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clothes_types`
--

INSERT INTO `clothes_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 't-shirt', 'Ut qui non nostrud c', '2019-06-06 20:32:06', '2019-06-06 20:37:18'),
(3, 'shirt', 'Consequat Ut except', '2019-06-06 20:33:29', '2019-06-06 20:37:35'),
(4, 'pant', 'Numquam doloribus qu', '2019-06-06 20:37:23', '2019-06-06 20:37:29'),
(5, 'Wallace Leblanc', 'Suscipit tenetur nis', '2019-06-11 02:19:18', '2019-06-11 02:19:18');

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
(1, '2014_06_06_154134_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_06_07_021528_create_clothes_types_table', 2),
(8, '2019_06_08_045453_create_shops_table', 3),
(11, '2019_06_11_065555_create_clothes_table', 4);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'administrator', NULL, NULL, NULL),
(2, 'shop', 'shop', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `user_id`, `name`, `address`, `phone_number`, `website`, `email`, `image`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 7, 'Caryn Frost', 'Narayanhiti, Kathmandu 44600, Nepal', '+1 (825) 102-2191', 'https://www.lopybuwipyg.cm', 'kyra@mailinator.com', 'shop21_60387528_2361359250773713_582827354124976128_n.jpg', '85.3239605', '27.7172453', '2019-06-11 00:49:36', '2019-06-11 00:49:36'),
(2, 8, 'Ava Mcmillan', NULL, NULL, NULL, 'shop2@shop.com', NULL, NULL, NULL, '2019-06-11 02:37:11', '2019-06-11 02:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@admin.com', NULL, '$2y$10$/opoHKq3YzyUqP7THlLKCOs9ZXEPKISWk/gkOiPmCGZDxWstrKatm', NULL, '2019-06-06 20:03:24', '2019-06-06 20:03:24'),
(2, 2, 'Lamar Cohen', 'pofap@mailinator.com', NULL, '$2y$10$xr4D/rglUvNJGW0gefv0ROUrrXHq6giB4pXtjy1oLIgNvDLibreR2', NULL, '2019-06-07 23:02:18', '2019-06-07 23:02:18'),
(3, NULL, 'Dominique Reyes', 'pomo@mailinator.com', NULL, '$2y$10$mkq7EtLvC/SYew5VrQ7PHelAC4dnEh4r9pzkYgm9oyIp9LzDTmkMe', NULL, '2019-06-07 23:31:40', '2019-06-07 23:31:40'),
(4, 2, 'Jaquelyn Maxwell', 'kopiruboc@mailinator.com', NULL, '$2y$10$B2MlU3DP7by0RCUXHWvkQ.RVK1G7qFBThJRtB4rA1CAZcNrjcauca', NULL, '2019-06-07 23:32:38', '2019-06-07 23:32:38'),
(6, 2, 'Adara Watkins', 'zaxoc@mailinator.net', NULL, '$2y$10$F2mqID5QJH.VDgxrBiEZoe2gtWN7/vvKiIqHaJ6o/VsE2U/ljPUCS', NULL, '2019-06-07 23:35:37', '2019-06-07 23:35:37'),
(7, 2, 'shop', 'shop@shop.com', NULL, '$2y$10$KpfDlo/tRkf7H1cVzTJQzO1cUW6vPSvCaWrIob6d7Cj3T24h1S4Jm', NULL, '2019-06-08 00:06:51', '2019-06-08 00:06:51'),
(8, 2, 'Ava Mcmillan', 'shop2@shop.com', NULL, '$2y$10$vd8L/pqnWJczix8ihV/C2OFcKwTkpLnEZGt3sxuRaU4Cv7fawT002', NULL, '2019-06-11 02:37:11', '2019-06-11 02:37:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clothes_shop_id_foreign` (`shop_id`),
  ADD KEY `clothes_clothes_type_id_foreign` (`clothes_type_id`);

--
-- Indexes for table `clothes_types`
--
ALTER TABLE `clothes_types`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clothes_types`
--
ALTER TABLE `clothes_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_clothes_type_id_foreign` FOREIGN KEY (`clothes_type_id`) REFERENCES `clothes_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clothes_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

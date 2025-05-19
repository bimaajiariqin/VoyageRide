-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 06:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vvvoyageride`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bus_type` varchar(255) NOT NULL,
  `seat_capacity` int(11) NOT NULL,
  `bus_number` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `logo_url` varchar(1000) DEFAULT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `has_luggage` tinyint(1) NOT NULL DEFAULT 0,
  `has_light` tinyint(1) NOT NULL DEFAULT 0,
  `has_ac` tinyint(1) NOT NULL DEFAULT 0,
  `has_drink` tinyint(1) NOT NULL DEFAULT 0,
  `has_wifi` tinyint(1) NOT NULL DEFAULT 0,
  `has_usb` tinyint(1) NOT NULL DEFAULT 0,
  `has_cctv` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `origin_id` int(10) UNSIGNED NOT NULL,
  `destination_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `name`, `bus_type`, `seat_capacity`, `bus_number`, `model`, `logo_url`, `departure_time`, `arrival_time`, `price`, `has_luggage`, `has_light`, `has_ac`, `has_drink`, `has_wifi`, `has_usb`, `has_cctv`, `created_at`, `updated_at`, `origin_id`, `destination_id`) VALUES
(18, 'Sinar Jaya', 'Volvo B-11R', 40, 'RR8088', 'Super Eksekutif', 'Logo Sinar Jaya.png', '2025-04-10 19:00:00', '2025-04-11 04:30:00', 600000.00, 1, 1, 1, 1, 1, 1, 1, '2025-04-05 08:00:52', '2025-04-05 08:00:52', 1, 2),
(19, 'Sinar Jaya', 'Hino RM280', 20, 'RR8097', 'Sleeper', 'Logo Sinar Jaya.png', '2025-04-10 19:00:00', '2025-04-11 04:30:00', 600000.00, 1, 1, 1, 1, 1, 1, 1, '2025-04-10 14:00:00', '2025-04-10 21:30:00', 1, 2),
(20, 'Sinar Jaya', 'Hino RK8', 32, 'SS9080', 'Eksekutif', 'Logo Sinar Jaya.png', '2025-04-08 21:44:00', '2025-04-09 21:44:00', 320000.00, 0, 0, 0, 0, 1, 0, 1, '2025-04-07 14:45:10', '2025-04-07 14:45:10', 1, 4),
(22, 'Sinar Jaya', 'Hino RK8', 40, 'RR8088', 'Patas', 'Logo Sinar Jaya.png', '2025-04-12 12:50:00', '2025-04-13 10:50:00', 400000.00, 1, 1, 1, 0, 0, 0, 0, '2025-04-11 05:50:23', '2025-04-11 05:50:23', 1, 6),
(23, 'Sinar Jaya', 'Volvo B-11R', 40, 'RR8088', 'Super Eksekutif', 'Logo Sinar Jaya.png', '2025-04-15 08:25:00', '2025-04-16 09:25:00', 500000.00, 1, 1, 1, 1, 1, 1, 1, '2025-04-14 01:25:54', '2025-04-14 01:25:54', 1, 6),
(24, 'Sinar Jaya', 'Volvo B-11R', 34, 'RR8088', 'Super Eksekutif', 'Logo Sinar Jaya.png', '2025-04-19 10:15:00', '2025-04-20 10:15:00', 400000.00, 1, 1, 1, 1, 1, 1, 1, '2025-04-17 03:15:59', '2025-04-17 03:15:59', 1, 7),
(25, 'Sinar Jaya', 'Volvo B-11R', 34, 'SS9080', 'Super Eksekutif', 'Logo Sinar Jaya.png', '2025-04-19 09:51:00', '2025-04-20 09:52:00', 400000.00, 1, 1, 0, 1, 1, 1, 0, '2025-04-17 09:52:44', '2025-04-17 09:52:44', 1, 7),
(26, 'Sinar Jaya', 'Volvo B-11R', 40, 'RR8088', 'Super Eksekutif', 'Logo Sinar Jaya.png', '2025-04-22 10:47:00', '2025-04-23 01:47:00', 600000.00, 1, 1, 1, 1, 1, 1, 1, '2025-04-21 03:47:47', '2025-04-21 03:47:47', 1, 6),
(27, 'Sinar Jaya', 'Volvo B-11R', 40, 'RR8088', 'Patas', 'Logo Sinar Jaya.png', '2025-04-26 10:30:00', '2025-04-27 04:31:00', 100000.00, 1, 1, 1, 1, 1, 1, 1, '2025-04-24 03:32:49', '2025-04-24 03:32:49', 1, 6),
(28, 'Sinar Jaya', 'Volvo B-11R', 40, 'RR8088', 'Eksekutif', 'Logo Sinar Jaya.png', '2025-04-30 06:55:00', '2025-04-30 21:55:00', 400000.00, 1, 1, 1, 1, 1, 1, 1, '2025-04-26 23:56:07', '2025-04-26 23:56:07', 1, 6),
(29, 'Sinar Jaya', 'Volvo B-11R', 40, 'RR8088', 'Super Eksekutif', 'Logo Sinar Jaya.png', '2025-05-03 13:09:00', '2025-05-04 06:09:00', 400000.00, 1, 1, 1, 1, 1, 1, 1, '2025-04-30 06:09:28', '2025-04-30 06:09:28', 1, 6),
(30, 'Sinar Jaya', 'Volvo B-11R', 40, 'RR8088', 'Eksekutif', 'Logo Sinar Jaya.png', '2025-05-10 10:44:00', '2025-05-11 02:44:00', 400000.00, 1, 1, 1, 1, 1, 1, 1, '2025-05-08 03:45:09', '2025-05-08 03:45:09', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Surabaya'),
(2, 'Jakarta'),
(3, 'Bandung'),
(4, 'Yogyakarta'),
(5, 'Denpasar'),
(6, 'Terminal Pondok Pinang, Jakarta'),
(7, 'Terminal Pulo Gebang, Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2023_01_01_create_buses_table', 1),
(5, '2025_03_17_080346_add_role_to_users_table', 2),
(6, '2025_04_07_180432_create_cities_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('uhYMGmlj5MXgv4xVwJj0FtInjI2sQPhuMw2SFMSy', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiakFVY0ZTWmMzYllVT0hHQjhaV2RMM05kQzB6aXdYZktXaVU1cFRoUiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Byb2ZpbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYnVzL2RldGFpbHMvMzAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMjt9', 1746676744);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(110) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(8, 'User1', 'User1@gmail.com', '$2y$12$4cVH.EWBkdJSE.gzZWA8TOfx21/Kg9t3fT2tnVTEAu0wjr8I2HIsi', 'User', '2025-03-16 10:01:48', '2025-03-16 10:01:48'),
(10, 'Admin1', 'Admin1@gmail.com', '$2y$12$ORQcDklRIaB3e.m8UtnqOeWxgtb8ByDx2hfyyl2gio7UP7EhjMYh2', 'AdminUtama', '2025-03-16 13:20:21', '2025-03-16 13:20:21'),
(11, 'Bima Aji Ariqin Hakim', 'bimaajiariqinhakim151@gmail.com', '$2y$12$.d5rrFQWQpdv/NZhqggBFe3GzVcoYK/GgZAVJ1.u9R02q/srNKQKe', 'User', '2025-03-16 13:31:49', '2025-03-16 13:31:49'),
(12, 'Admin Sinar Jaya', 'AdminSinarJaya@gmail.com', '$2y$12$hWtyNOaiFAYO4bZrMoId7uUTw583J3ACfE6GHpbLYNqalg89bLnsy', 'Admin', '2025-03-16 13:47:21', '2025-03-16 13:47:21'),
(13, 'Admin Pahala Kencana', 'AdminPahalaKencana@gmail.com', '$2y$12$pVh3Cr/PfJH9FzxvSsVwCOlTZEfwNQKle4Saf8IyqfGE4x0hBH2Yi', 'Admin', '2025-03-16 13:57:01', '2025-03-16 13:57:01'),
(14, 'Admin Juragan99', 'AdminJuragan99@gmail.com', '$2y$12$yXkx9ynJaadHhPVUDNa.6O2OeoX7lTtHS0Gs2GBZkncV67q936.Fm', 'Admin', '2025-03-17 00:57:34', '2025-03-17 00:57:34'),
(15, 'Admin123', 'Admin123@gmail.com', '$2y$12$AnjM5xAa5dYzSGB8WIRFVuoQR7cGsiIytG0YzuObt1E/FjrRHWa3.', 'AdminUtama', '2025-03-17 01:36:20', '2025-03-17 01:36:20'),
(16, 'User1234', 'User1234@gmail.com', '$2y$12$wykiwAQ.2XgN09GUfHwkzOwAoJEIS3CeC4NiAqR4je5VxEyRtEMp2', 'User', '2025-03-17 02:08:45', '2025-03-17 02:08:45'),
(17, 'ADADA', 'bintangbara@gmail.com', '$2y$12$GcjkSjYb205hgQvHmrKqgeN.VNykNR7kgmK0O0PAbq62GtgBFVxvG', 'Admin', '2025-03-17 02:43:22', '2025-03-17 02:43:22'),
(18, 'Bima', 'Bima@gmail.com', '$2y$12$KATwPtOFNQQ5EQ/Qq2Z6DOdUeXLb9m4YsyHbgwApiMcOHSlKkgWsu', 'User', '2025-03-17 02:48:55', '2025-03-17 02:48:55'),
(19, 'ADMINN', 'ADMINN@gmail.com', '$2y$12$fhnWN0eLnLPegdP5a2rYD.Vs1GI9uRmE7g57EevRzPvmG17buK7hu', 'Admin', '2025-03-17 03:16:23', '2025-03-17 03:16:23'),
(20, 'AdminUtama1', 'AdminUtama1@gmail.com', '$2y$12$tYEJriITEK2NSse2j.OOZeAIU2gjf1qDTjB/2gGJMwaTm/89ypfHu', 'AdminUtama', '2025-04-08 10:25:17', '2025-04-08 10:25:17'),
(21, 'AdminUtama2', 'AdminUtama2@gmail.com', '$2y$12$jLQxMUanLaYr/naofrs5eOaK2lAEn/gdHZ4ym7MM5dZfLI0ukutMa', 'AdminUtama', '2025-04-08 10:25:40', '2025-04-08 10:25:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buses_ibfk_1` (`origin_id`),
  ADD KEY `buses_ibfk_2` (`destination_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_ibfk_1` FOREIGN KEY (`origin_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `buses_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

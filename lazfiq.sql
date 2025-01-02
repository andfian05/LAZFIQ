-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 01:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lazfiq`
--

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
-- Table structure for table `count_infaqs`
--

CREATE TABLE `count_infaqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_ci` date NOT NULL,
  `waktu_ci` time NOT NULL,
  `debit_ci` decimal(13,2) NOT NULL,
  `kredit_ci` decimal(13,2) DEFAULT 0.00,
  `keterangan_ci` text DEFAULT NULL,
  `bukti_ci` varchar(255) DEFAULT NULL,
  `saldo_akhir_ci` decimal(13,2) NOT NULL,
  `status_ci` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `count_infaqs`
--

INSERT INTO `count_infaqs` (`id`, `tanggal_ci`, `waktu_ci`, `debit_ci`, `kredit_ci`, `keterangan_ci`, `bukti_ci`, `saldo_akhir_ci`, `status_ci`, `created_at`, `updated_at`) VALUES
(1, '2024-12-06', '21:00:00', 12000000.00, 0.00, NULL, NULL, 12000000.00, 'tersimpan', '2025-01-01 05:22:04', '2025-01-01 05:22:04'),
(3, '2024-12-13', '21:00:00', 10000000.00, 3000000.00, 'Renovasi', NULL, 19000000.00, 'disalurkan', '2025-01-01 06:38:40', '2025-01-01 06:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `count_qurbans`
--

CREATE TABLE `count_qurbans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_cq` date NOT NULL,
  `kategori_qurban` varchar(255) NOT NULL,
  `jumlah_sapi` int(11) DEFAULT 0,
  `jumlah_kambing` int(11) DEFAULT 0,
  `nama_yg_qurban` text NOT NULL,
  `bukti_cq` varchar(255) DEFAULT NULL,
  `status_cq` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `count_qurbans`
--

INSERT INTO `count_qurbans` (`id`, `tanggal_cq`, `kategori_qurban`, `jumlah_sapi`, `jumlah_kambing`, `nama_yg_qurban`, `bukti_cq`, `status_cq`, `created_at`, `updated_at`) VALUES
(1, '2024-09-16', 'sapi', 2, 0, 'Ardi bin Fulan', NULL, 'diterima', '2025-01-01 06:14:20', '2025-01-01 06:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `count_zakats`
--

CREATE TABLE `count_zakats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_cz` date NOT NULL,
  `waktu_cz` time NOT NULL,
  `muzakki_pertama` varchar(255) NOT NULL,
  `keluarga_muzakki` text NOT NULL,
  `jenis_zakat` varchar(255) NOT NULL,
  `zakat_beras` double DEFAULT NULL,
  `zakat_uang` decimal(10,2) DEFAULT NULL,
  `status_cz` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `count_zakats`
--

INSERT INTO `count_zakats` (`id`, `tanggal_cz`, `waktu_cz`, `muzakki_pertama`, `keluarga_muzakki`, `jenis_zakat`, `zakat_beras`, `zakat_uang`, `status_cz`, `created_at`, `updated_at`) VALUES
(1, '2024-04-01', '20:00:00', 'Arka bin Fulan', 'Alda binti Fulan, Arga bin Fulan', 'uang', 0, 225000.00, 'diterima', '2025-01-01 05:54:07', '2025-01-01 05:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE `documentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `foto_kegiatan` varchar(255) NOT NULL,
  `kategori_kegiatan` varchar(255) NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documentations`
--

INSERT INTO `documentations` (`id`, `tanggal_kegiatan`, `foto_kegiatan`, `kategori_kegiatan`, `judul_kegiatan`, `deskripsi_kegiatan`, `created_at`, `updated_at`) VALUES
(1, '2024-12-06', 'documentation/1735767657_infaq-umum.jpg', 'infaq', 'Santunan Anak Yatim', 'Santunan ini dilakukan kepada 50 orang anak yatim di daerah ....', '2025-01-01 14:40:58', '2025-01-01 14:40:58');

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
(4, '2024_11_19_023713_create_count_infaqs_table', 1),
(5, '2024_11_19_023754_create_count_zakats_table', 1),
(6, '2024_11_19_023812_create_count_qurbans_table', 1),
(7, '2024_11_19_065415_create_documentations_table', 1),
(8, '2024_11_25_053834_create_post_infaqs_table', 1),
(9, '2024_11_25_053853_create_post_zakats_table', 1),
(10, '2024_11_25_053904_create_post_qurbans_table', 1);

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
-- Table structure for table `post_infaqs`
--

CREATE TABLE `post_infaqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pi` date NOT NULL,
  `debit_pi` decimal(10,2) NOT NULL,
  `kredit_pi` decimal(10,2) DEFAULT NULL,
  `saldo_akhir_pi` decimal(10,2) DEFAULT NULL,
  `status_pi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_infaqs`
--

INSERT INTO `post_infaqs` (`id`, `tanggal_pi`, `debit_pi`, `kredit_pi`, `saldo_akhir_pi`, `status_pi`, `created_at`, `updated_at`) VALUES
(1, '2024-12-13', 22000000.00, 3000000.00, 19000000.00, 'disalurkan', '2025-01-01 06:40:15', '2025-01-01 06:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `post_qurbans`
--

CREATE TABLE `post_qurbans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pq` date NOT NULL,
  `qurban_sapi` int(11) NOT NULL,
  `qurban_kambing` int(11) NOT NULL,
  `mustahiq_pq` int(11) NOT NULL,
  `status_pq` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_qurbans`
--

INSERT INTO `post_qurbans` (`id`, `tanggal_pq`, `qurban_sapi`, `qurban_kambing`, `mustahiq_pq`, `status_pq`, `created_at`, `updated_at`) VALUES
(1, '2024-09-12', 12, 25, 450, 'disalurkan', '2025-01-01 08:37:52', '2025-01-01 08:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `post_zakats`
--

CREATE TABLE `post_zakats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pz` date NOT NULL,
  `zakat_uang` decimal(10,2) NOT NULL,
  `zakat_beras` double NOT NULL,
  `mustahiq_pz` int(11) NOT NULL,
  `status_pz` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_zakats`
--

INSERT INTO `post_zakats` (`id`, `tanggal_pz`, `zakat_uang`, `zakat_beras`, `mustahiq_pz`, `status_pz`, `created_at`, `updated_at`) VALUES
(1, '2024-04-06', 75000000.00, 140, 500, 'disalurkan', '2025-01-01 08:06:22', '2025-01-01 08:06:35');

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
('c4aUWzV2lAT54Jwra8T50VWabW2IyUt6d3XFI29v', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUEV5aHNxWk02MFRVWEhEUjRaWUJkZkhta0NJak9wRnJFYmNkQXVLVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6MTQxMSI7fX0=', 1735779109);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'AUDIT',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin xray', 'admin77@example.com', NULL, '$2y$12$7jMCwqxbfFIgMsSE4Chgxul9gjia7Qnzb2MjlLQKjia7EBFBm4fuK', 'ADMIN', NULL, '2025-01-01 03:40:06', '2025-01-01 03:40:06'),
(2, 'Audit xray', 'audit33@example.com', NULL, '$2y$12$zlUiSvar9Kgxs.cGx7iBbOtWid6EbC/2lGMxzkOJLsf/XWH4iyoD6', 'AUDIT', NULL, '2025-01-01 03:40:07', '2025-01-01 03:40:07');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `count_infaqs`
--
ALTER TABLE `count_infaqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `count_qurbans`
--
ALTER TABLE `count_qurbans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `count_zakats`
--
ALTER TABLE `count_zakats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentations`
--
ALTER TABLE `documentations`
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
-- Indexes for table `post_infaqs`
--
ALTER TABLE `post_infaqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_qurbans`
--
ALTER TABLE `post_qurbans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_zakats`
--
ALTER TABLE `post_zakats`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `count_infaqs`
--
ALTER TABLE `count_infaqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `count_qurbans`
--
ALTER TABLE `count_qurbans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `count_zakats`
--
ALTER TABLE `count_zakats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_infaqs`
--
ALTER TABLE `post_infaqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_qurbans`
--
ALTER TABLE `post_qurbans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_zakats`
--
ALTER TABLE `post_zakats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

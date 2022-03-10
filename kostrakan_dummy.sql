-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 02:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kostrakan_dummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `building_details`
--

CREATE TABLE `building_details` (
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tipe_id` bigint(20) UNSIGNED NOT NULL,
  `kk_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmlh_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_bangunan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmlh_lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaKampus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `building_details`
--

INSERT INTO `building_details` (`building_id`, `user_id`, `tipe_id`, `kk_id`, `alamat`, `published_date`, `status`, `jmlh_ruangan`, `luas_bangunan`, `jmlh_lantai`, `keterangan_fasilitas`, `harga`, `namaKampus`, `gambar1`, `gambar2`, `gambar3`, `gambar4`) VALUES
(1, 2, 2, 1, 'Jalan Sama aku ya', '2021-11-27', 'Tersedia', '6 Kamar Tidur + 2 Toilet', '150M', '2 Lantai', 'Kasur + Lemari', 'Rp. 80.000.000', '', '662297389.jpg', '591942537.PNG', '453089732.PNG', '75922342.PNG'),
(3, 4, 1, 1, 'Jalan Ke Kota', '2021-11-27', 'Tersedia', '1 Kamar Tidur + 1 Toilet dalam', '60M', '1 Lantai', 'Kasur + Lemari', 'Rp. 15.000.000', 'Politeknik Pos Indonesia', '20220204050148.jpg', '20220204050148.jpg', '20220204050148.jpg', '20220204050148.jpg'),
(4, 1, 1, 1, 'jalan sukasari', '2021-11-28', 'Tersedia', '1 Kamar Tidur + 1 Toilet dalam', '60M', '1 Lantai', 'Kasur + Lemari', 'Rp. 10.000.000', NULL, '20220227041156.jpg', '20220227041156.jpg', '20220227041156.jpg', '20220227041156.jpg'),
(5, 2, 2, 1, 'kenapa aku ganteng', '2021-11-28', 'Tersedia', '6 Kamar Tidur + 2 Toilet', '150M', '2 Lantai', 'Lemari', 'Rp. 150.000.000', 'Universitas Pendidikan Indonesia', '20220226130057.jpg', '20220226130057.jpg', '20220226130057.jpg', '20220226130057.jpg'),
(7, 2, 2, 2, 'Jl Segaria', '2022-01-10', 'Tersedia', '3 Kamar Tidur + 1 Toilet', '80M', '1 Lantai', 'Furnitur Lengkap', 'Rp. 30.000.000', NULL, '1906419610.jpg', '101903591.jpg', '52323920.jpg', '837929598.jpg'),
(8, 4, 2, 3, 'Jl Kerumah', '2022-01-10', 'Tersedia', '5 Kamar Tidur + 2 Toilet', '80M', '2 Lantai', 'Furnitur Lengkap', 'Rp. 60.000.000', '', '1805475248.jpg', '1119097143.PNG', '377695061.PNG', '1177499255.PNG'),
(9, 1, 1, 2, 'Jalan Jalan', '2022-01-10', 'Tersedia', '1 Kamar Tidur + 1 Toilet', '20M', '1 Lantai', 'Furnitur Lengkap + Toilet Dalam', 'Rp. 30.000.000', NULL, '1310123470.jpg', '1126834028.PNG', '1126834028.PNG', '1126834028.PNG'),
(10, 4, 1, 4, 'Jalan Ke Kos', '2022-01-10', 'Tersedia', '1 Kamar Tidur + 1 Toilet', '50M', '1 Lantai', 'Furnitur Lengkap', 'Rp. 45.000.000', 'UGM', '20220206081334.jpg', '20220206081334.jpg', '20220206081334.jpg', '20220206081334.jpg'),
(11, 4, 2, 1, 'Jl Testing', '2022-02-04', 'Tersedia', '3 Kamar Tidur + 1 Toilet', '20M', '1 Lantai', 'Furnitur Lengkap', 'Rp. 30.000.000', 'Politeknik Pos Indonesia', '849330516.jpg', '984878552.jpg', '1969864400.jpg', '1597226297.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `building_types`
--

CREATE TABLE `building_types` (
  `tipe_id` bigint(20) UNSIGNED NOT NULL,
  `nama_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `building_types`
--

INSERT INTO `building_types` (`tipe_id`, `nama_tipe`) VALUES
(1, 'Kos'),
(2, 'Kontrakan');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `kk_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`kk_id`, `nama_kk`) VALUES
(1, 'Bandung'),
(2, 'Jakarta'),
(3, 'Malang'),
(4, 'Yogyakarta'),
(5, 'Sleman'),
(6, 'Surabaya'),
(7, 'Makassar');

-- --------------------------------------------------------

--
-- Table structure for table `content_filtering`
--

CREATE TABLE `content_filtering` (
  `cf_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tipe_id` bigint(20) UNSIGNED NOT NULL,
  `kk_id` bigint(20) UNSIGNED NOT NULL,
  `jmlh_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmlh_lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_filtering`
--

INSERT INTO `content_filtering` (`cf_id`, `user_id`, `tipe_id`, `kk_id`, `jmlh_ruangan`, `jmlh_lantai`, `keterangan_fasilitas`) VALUES
(9, 44, 2, 1, '5 Kamar Tidur + 2 Toilet', '2 Lantai', 'Lemari'),
(10, 44, 2, 1, '5 Kamar Tidur + 2 Toilet', '2 Lantai', 'Kasur + Lemari'),
(11, 44, 2, 1, '6 Kamar Tidur + 2 Toilet', '2 Lantai', 'Kasur + Lemari'),
(12, 44, 2, 1, '6 Kamar Tidur + 2 Toilet', '2 Lantai', 'Kasur + Lemari'),
(13, 44, 1, 1, '1 Kamar Tidur + 1 Toilet', '1 Lantai', 'Furnitur Lengkap'),
(14, 44, 1, 2, '1 Kamar Tidur + 1 Toilet', '1 Lantai', 'Furnitur Lengkap'),
(24, 69, 2, 1, '6 Kamar Tidur + 2 Toilet', '2 Lantai', 'Lemari'),
(30, 75, 2, 1, '6 Kamar Tidur + 2 Toilet', '2 Lantai', 'Kasur + Lemari');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_11_22_130352_create_cities_table', 1),
(5, '2021_11_22_130402_create_owners_table', 1),
(6, '2021_11_22_130403_create_users_table', 1),
(7, '2021_11_22_130815_create_building_types_table', 1),
(8, '2021_11_22_130901_building_details', 1),
(9, '2021_12_18_025435_create_content_filtering_table', 2),
(10, '2022_01_02_102836_remove_minval_maxval_column', 3),
(11, '2022_01_02_103359_add_harga_column', 3),
(12, '2022_01_02_111126_add_column', 3),
(13, '2022_01_02_111639_drop_harga_column', 3),
(14, '2022_01_09_172747_create_table_system_weigth', 4),
(15, '2021_11_22_130900_add_column_kampus', 5);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owner_id`, `email`, `nama`, `no_hp`, `nik`, `alamat`, `approved_status`, `created_at`, `updated_at`) VALUES
(1, 'yayjustkidding@gmail.com', 'yay just kidding', '0812415151', '12151166162632', 'Jalan Ke Kota', 'approved', NULL, NULL),
(4, 'udin@example.com', 'Udin Jackson', '0812141511', '12141241512512', 'Jalan Ke Kota', 'approved', NULL, NULL),
(7, 'ss@example.com', 'ss', '08143434121', '21421841252521', 'Jl Testing', 'approved', NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_weigth`
--

CREATE TABLE `system_weigth` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipe` int(11) NOT NULL,
  `kk` int(11) NOT NULL,
  `ruangan` int(11) NOT NULL,
  `lantai` int(11) NOT NULL,
  `fasilitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_weigth`
--

INSERT INTO `system_weigth` (`id`, `tipe`, `kk`, `ruangan`, `lantai`, `fasilitas`, `created_at`, `updated_at`) VALUES
(1, 6, 8, 2, 2, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `statusUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pencari',
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `owner_id`, `name`, `no_hp`, `email`, `google_id`, `username`, `password`, `role`, `statusUser`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Dzul Jalali', '0812314151', 'dzul@example.com', NULL, 'dzul', '$2y$10$z6QXH1JVJ7s56IbIrkQy.eyc8Ks2fCNRLus8wLZWaf.bRoDFErhGi', 1, 'admin', 'default.jpg', NULL, '2021-11-26 06:45:24', '2021-11-26 06:45:24'),
(2, 1, 'just kidding yay', '081234567891', 'yayjustkidding@gmail.com', '110540609382255115753', NULL, '$2y$10$FAFqh.IuUDYmZIz2ecLCR.r8JQjMUn6fxdKjMxirgaQNlQMLOtZLG', 0, 'pencari', '278048332.jpg', NULL, '2021-11-26 06:46:32', '2021-11-26 06:46:32'),
(4, 4, 'Udin Jackson', '08241515', 'udin@example.com', NULL, 'udinkeren', '$2y$10$Rve8Dny4iEgxsFAO/Hn2F.1ep2KYTc7oHgGUggSI0y8v.eP62KQ8C', 0, 'pencari', '677349841.PNG', NULL, '2021-11-26 21:07:32', '2021-11-26 21:07:32'),
(5, NULL, 'M.ALFISYAHRIN PRAYA', NULL, 'alfispraya@gmail.com', '113214704713550684156', NULL, '$2y$10$q3knQsqZ6Jpo6bf8VX7A6.FcdLBe79Z0uXhwovTxtBnS1IrjE3jKS', 0, 'pencari', 'default.jpg', NULL, '2021-11-26 21:14:52', '2021-11-26 21:14:52'),
(35, NULL, 'Sadas Sodikin', '087665544', 'ex@example.com', NULL, 'sadas', '$2y$10$j9ljr/zRmGRmkHNm3Q6s/OMvCyoV5R8OafDXIBaPp6GibhSubyhQy', 0, 'pencari', 'default.jpg', NULL, '2021-12-17 20:30:35', '2021-12-17 20:30:35'),
(39, NULL, 'test cbf', '0812421512', 'top@ez.com', NULL, 'cbf', '$2y$10$q.rQvEsw.LxOqCh7mwUiFO.2i7iinbv2Qeq7mSlL/ZSsxOa4r1NN2', 0, 'pencari', 'default.jpg', NULL, '2022-01-09 12:12:28', '2022-01-09 12:12:28'),
(40, NULL, 'Test', '08214242', 'test@example.com', NULL, 'test', '$2y$10$O8amb8pF3.2MWEWtqje2reHZK9gJgbPWfMRZoROYuYPcksbmKGx4e', 0, 'pencari', 'default.jpg', NULL, '2022-01-10 00:58:59', '2022-01-10 00:58:59'),
(42, 7, 'Sithi', '0812112', 'ss@example.com', NULL, 'ss', '$2y$10$s2LN5vIkZl58vmAAC4zX2eS3lNFOk9DSlc/NdQ2JRdSEgYDeM6Pim', 0, 'pencari', 'default.jpg', NULL, '2022-01-11 06:50:01', '2022-01-11 06:50:01'),
(43, NULL, 'loll', '08214251', 'lol@example.com', NULL, 'lol', '$2y$10$ZUG6zxY1j3Ksz0mC4qDhJel/3htQatWm09mc5bun8qoTQZ3Air4j2', 0, 'pencari', 'default.jpg', NULL, '2022-01-11 07:26:56', '2022-01-11 07:26:56'),
(44, NULL, 'siapa', '0812314141', 'siapaya@example.com', NULL, 'siapa', '$2y$10$ssweFL0QmlK3P3yZAorAgesrGkZ/fysfffvkBcocB9b5yH46cvfT2', 0, 'pencari', 'default.jpg', NULL, '2022-01-22 21:59:46', '2022-01-22 21:59:46'),
(65, NULL, 'faisalabdul', '123', 'f@gmail.com', NULL, 'faisall', '$2y$10$UbX7NZtmxHwLhYqpooetN.Eu0cdzOjBKSKwkaL1A2Bnz97kbijcHi', 0, 'pencari', 'default.jpg', NULL, '2022-02-15 02:55:50', '2022-02-15 02:55:50'),
(67, NULL, 'Faisal Abdullah', NULL, 'choenchoenmaroe@gmail.com', '101127003724846962531', NULL, 'ad0a9454d77934a6f673c41baa5674ea', 0, 'pencari', 'default.jpg', NULL, '2022-02-26 04:32:15', '2022-02-26 04:32:15'),
(69, NULL, 'thelord ucup', NULL, 'thelorducup@gmail.com', '112650078020838463165', NULL, '76785c334ae1fa9b07bfb622643a542b', 0, 'pencari', 'default.jpg', NULL, '2022-02-26 04:50:02', '2022-02-26 04:50:02'),
(75, NULL, 'fatur rahman', NULL, 'zerocracker25@gmail.com', '116290127301356612389', NULL, 'c3ebb7b4ab5a4cc90c8f85c9f151021c', 0, 'pencari', 'default.jpg', NULL, '2022-02-26 06:05:55', '2022-02-26 06:05:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building_details`
--
ALTER TABLE `building_details`
  ADD PRIMARY KEY (`building_id`),
  ADD KEY `building_details_user_id_foreign` (`user_id`),
  ADD KEY `building_details_tipe_id_foreign` (`tipe_id`),
  ADD KEY `building_details_kk_id_foreign` (`kk_id`);

--
-- Indexes for table `building_types`
--
ALTER TABLE `building_types`
  ADD PRIMARY KEY (`tipe_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`kk_id`);

--
-- Indexes for table `content_filtering`
--
ALTER TABLE `content_filtering`
  ADD PRIMARY KEY (`cf_id`),
  ADD KEY `content_filtering_user_id_foreign` (`user_id`),
  ADD KEY `content_filtering_tipe_id_foreign` (`tipe_id`),
  ADD KEY `content_filtering_kk_id_foreign` (`kk_id`);

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
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

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
-- Indexes for table `system_weigth`
--
ALTER TABLE `system_weigth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_owner_id_foreign` (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building_details`
--
ALTER TABLE `building_details`
  MODIFY `building_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `building_types`
--
ALTER TABLE `building_types`
  MODIFY `tipe_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `kk_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `content_filtering`
--
ALTER TABLE `content_filtering`
  MODIFY `cf_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_weigth`
--
ALTER TABLE `system_weigth`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `building_details`
--
ALTER TABLE `building_details`
  ADD CONSTRAINT `building_details_kk_id_foreign` FOREIGN KEY (`kk_id`) REFERENCES `cities` (`kk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `building_details_tipe_id_foreign` FOREIGN KEY (`tipe_id`) REFERENCES `building_types` (`tipe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `building_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content_filtering`
--
ALTER TABLE `content_filtering`
  ADD CONSTRAINT `content_filtering_kk_id_foreign` FOREIGN KEY (`kk_id`) REFERENCES `cities` (`kk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `content_filtering_tipe_id_foreign` FOREIGN KEY (`tipe_id`) REFERENCES `building_types` (`tipe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `content_filtering_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`owner_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

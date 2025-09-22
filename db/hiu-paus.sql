-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2025 at 07:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wisata_hiupaus`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `paket` varchar(11) NOT NULL,
  `jumlah_orang` int NOT NULL,
  `total_biaya` int NOT NULL,
  `role_payment` enum('pending','confirmed','completed') DEFAULT 'pending',
  `mode_pembayaran` enum('gopay','dana','shopeepay','bni') DEFAULT NULL,
  `upload_gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `user_id`, `full_name`, `email`, `kontak`, `paket`, `jumlah_orang`, `total_biaya`, `role_payment`, `mode_pembayaran`, `upload_gambar`, `created_at`, `updated_at`) VALUES
(3, 1, 'Muhammad Fikri Ridwan', 'mfikryrid@gmail.com', '082250706412', '1', 9, 5850000, 'pending', 'gopay', '1758217756_5bb8d12c45b1778a135d.png', '2025-09-18 10:24:58', '2025-09-22 18:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_trip`
--

CREATE TABLE `jadwal_trip` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `terisi` int NOT NULL DEFAULT '0',
  `sisa` int NOT NULL DEFAULT '0',
  `status` enum('tersedia','penuh','tidak tersedia') COLLATE utf8mb4_unicode_ci DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_trip`
--

INSERT INTO `jadwal_trip` (`id`, `tanggal`, `paket`, `kapasitas`, `terisi`, `sisa`, `status`, `created_at`, `updated_at`) VALUES
(1, '2025-09-20', 'Open Trip Whale Shark Teluk Saleh', 20, 0, 20, 'tersedia', '2025-09-17 06:54:08', '2025-09-17 06:54:08'),
(2, '2025-09-17', 'Open Trip Whale Shark Teluk Saleh', 10, 0, 10, 'tersedia', '2025-09-17 06:56:28', '2025-09-17 06:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `kelola_wisata`
--

CREATE TABLE `kelola_wisata` (
  `id` int NOT NULL,
  `nama_wisata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('wisata_pilihan','wisata_unggulan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_payment` decimal(15,2) NOT NULL,
  `gambar_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id` int NOT NULL,
  `nama_promosi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_normal` decimal(10,2) NOT NULL,
  `harga_diskon` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Aktif, 2 = Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id`, `nama_promosi`, `harga_normal`, `harga_diskon`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Diskon 25% Paket Private Pax 5', 800000.00, 650000.00, '2025-09-22 11:33:09', '2025-09-22 11:33:09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `setting_payments`
--

CREATE TABLE `setting_payments` (
  `id` int NOT NULL,
  `payments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `logo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_user` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `kontak`, `email`, `role_user`, `created_at`, `updated_at`) VALUES
(1, 'user', '123', 'Jarwo Kwat', '082250706412', 'mfikryrid@gmail.com', '1', NULL, NULL),
(3, 'admin', '123', 'Muhammad Fikri Ridwan', '082250706412', 'mfikryrid2@gmail.com', '2', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_trip`
--
ALTER TABLE `jadwal_trip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelola_wisata`
--
ALTER TABLE `kelola_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_payments`
--
ALTER TABLE `setting_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_trip`
--
ALTER TABLE `jadwal_trip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelola_wisata`
--
ALTER TABLE `kelola_wisata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_payments`
--
ALTER TABLE `setting_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

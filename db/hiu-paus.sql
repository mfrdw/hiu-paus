-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2025 at 05:13 PM
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
  `jumlah_orang` int NOT NULL,
  `total_biaya` int NOT NULL,
  `role_payment` enum('pending','confirmed','completed') DEFAULT 'pending',
  `mode_pembayaran` enum('gopay','dana','shopeepay','bni') DEFAULT NULL,
  `upload_gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `durasi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_trip` int NOT NULL,
  `ulasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pengalaman_rating` int NOT NULL DEFAULT '0',
  `pemandu_rating` int NOT NULL DEFAULT '0',
  `fasilitas_rating` int NOT NULL DEFAULT '0'
) ;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `id_user`, `id_trip`, `ulasan`, `created_at`, `updated_at`, `pengalaman_rating`, `pemandu_rating`, `fasilitas_rating`) VALUES
(8, 3, 1, 'keren sih', '2025-09-17 09:04:01', '2025-09-17 09:04:01', 5, 5, 3),
(9, 1, 1, 'Next bakalan kesini lagi', '2025-09-17 09:14:12', '2025-09-17 09:14:12', 3, 4, 4),
(10, 1, 1, 'MAntap sih ini, gokil banget', '2025-09-17 09:20:30', '2025-09-17 09:20:30', 5, 5, 5),
(11, 1, 1, 'Guide nya jangan cuek dong\r\n', '2025-09-17 09:20:51', '2025-09-17 09:20:51', 5, 2, 5),
(12, 1, 1, 'Tidak Rekomen', '2025-09-17 09:21:07', '2025-09-17 09:21:07', 1, 1, 1),
(13, 1, 1, 'aaaa seruuuu', '2025-09-17 09:21:24', '2025-09-17 09:21:24', 5, 5, 5),
(14, 1, 2, 'mantap sih ini', '2025-09-17 09:33:00', '2025-09-17 09:33:00', 5, 5, 5);

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
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_trip`
--
ALTER TABLE `jadwal_trip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelola_wisata`
--
ALTER TABLE `kelola_wisata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
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

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

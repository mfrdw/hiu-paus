-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2025 at 06:17 PM
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
-- Table structure for table `bookings_details_visitors`
--

CREATE TABLE `bookings_details_visitors` (
  `id` int NOT NULL,
  `id_bookings` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_visitors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia` int NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings_details_visitors`
--

INSERT INTO `bookings_details_visitors` (`id`, `id_bookings`, `nama_visitors`, `usia`, `jenis_kelamin`, `kewarganegaraan`, `created_at`, `updated_at`) VALUES
(1, 'WS20251028001', 'Muhammad Fikri Ridwan', 25, 'L', 'WNI', '2025-10-28 08:30:50', '2025-10-28 08:30:50'),
(2, 'WS20251118001', 'MUHAMMAD FIKRI R', 25, 'L', 'WNI', '2025-11-18 08:56:43', '2025-11-18 08:56:43'),
(3, 'WS20251118002', 'MUHAMMAD FIKRI R', 19, 'L', 'WNI', '2025-11-18 10:51:45', '2025-11-18 10:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_details_visitors`
--

CREATE TABLE `bookings_details_visitors` (
  `id` int NOT NULL,
  `id_bookings` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_visitors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia` int NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int NOT NULL,
  `id_bookings` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `paket` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_orang` int NOT NULL,
  `total_biaya` int NOT NULL,
  `role_payment` enum('pending','confirmed','completed') DEFAULT 'pending',
  `mode_pembayaran` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mode_pembayaran` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `upload_gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_trip` date DEFAULT NULL,
  `jam_trip` time DEFAULT NULL,
  `voucher` varchar(59) NOT NULL,
  `nilai_voucher` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
  `jam_trip` time DEFAULT NULL,
  `voucher` varchar(59) NOT NULL,
  `nilai_voucher` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `id_bookings`, `user_id`, `full_name`, `email`, `kontak`, `paket`, `jumlah_orang`, `total_biaya`, `role_payment`, `mode_pembayaran`, `upload_gambar`, `created_at`, `updated_at`, `tanggal_trip`, `jam_trip`, `voucher`, `nilai_voucher`) VALUES
(1, 'WS20251028001', 6, 'Muhammad Fikri Ridwan', 'mfikryrid@gmail.com', '082250706412', 'Open Trip Whale Shark Teluk Saleh', 1, 450000, 'pending', 'gopay', '1761665502_f2d0bbd949b0ee7ba865.png', '2025-10-28 08:31:21', '2025-10-28 08:31:42', '2025-11-01', '06:00:00', '3', 200000),
(2, 'WS20251118001', 6, 'MUHAMMAD FIKRI R', 'mfikryrid@gmail.com', '082250706412', 'Open Trip Whale Shark Teluk Saleh', 1, 650000, 'pending', 'shopeepay', '1763481456_09f5aff6dbfc0158c6f1.png', '2025-11-18 08:57:03', '2025-11-18 08:57:36', '2025-11-01', '06:00:00', '', 0),
(3, 'WS20251118002', 6, 'MUHAMMAD FIKRI R', 'mfikryrid2@gmail.com', '082250706412', 'Open Trip Whale Shark Teluk Saleh', 1, 650000, 'pending', NULL, NULL, '2025-11-18 10:51:45', '2025-11-18 10:51:52', '2025-11-20', '06:00:00', '', 0);

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
(2, '2025-09-17', 'Open Trip Whale Shark Teluk Saleh', 10, 0, 10, 'tersedia', '2025-09-17 06:56:28', '2025-09-17 06:56:28'),
(3, '2025-10-04', 'Open Trip Whale Shark Teluk Saleh', 10, 0, 10, 'tersedia', '2025-10-02 09:04:58', '2025-10-02 09:04:58'),
(4, '2025-10-25', 'Private Trip Whale Shark Teluk Saleh', 15, 1, 14, 'tersedia', '2025-10-14 09:10:48', '2025-10-14 16:13:16'),
(5, '2025-10-24', 'Open Trip Whale Shark Teluk Saleh', 15, 15, 0, 'tersedia', '2025-10-14 09:17:17', '2025-10-14 17:07:47'),
(6, '2025-10-16', 'Open Trip Whale Shark Teluk Saleh', 10, 0, 10, 'tersedia', '2025-10-14 10:42:59', '2025-10-14 10:42:59'),
(7, '2025-11-01', 'Open Trip Whale Shark Teluk Saleh', 10, 0, 10, 'penuh', '2025-10-22 10:05:43', '2025-11-18 09:46:28'),
(8, '2025-11-20', 'Open Trip Whale Shark Teluk Saleh', 15, 1, 14, 'tersedia', '2025-11-18 10:07:04', '2025-11-18 10:51:52');

--
-- Triggers `jadwal_trip`
--
DELIMITER $$
CREATE TRIGGER `before_update_jadwal_trip` BEFORE UPDATE ON `jadwal_trip` FOR EACH ROW BEGIN
    -- Menghitung nilai 'sisa' berdasarkan kapasitas dan terisi sebelum update
    SET NEW.sisa = NEW.kapasitas - NEW.terisi;
END
$$
DELIMITER ;
(3, '2025-10-04', 'Open Trip Whale Shark Teluk Saleh', 10, 0, 10, 'tersedia', '2025-10-02 09:04:58', '2025-10-02 09:04:58'),
(4, '2025-10-25', 'Private Trip Whale Shark Teluk Saleh', 15, 1, 14, 'tersedia', '2025-10-14 09:10:48', '2025-10-14 16:13:16'),
(5, '2025-10-24', 'Open Trip Whale Shark Teluk Saleh', 15, 15, 0, 'tersedia', '2025-10-14 09:17:17', '2025-10-14 17:07:47'),
(6, '2025-10-16', 'Open Trip Whale Shark Teluk Saleh', 10, 0, 10, 'tersedia', '2025-10-14 10:42:59', '2025-10-14 10:42:59'),
(7, '2025-11-01', 'Open Trip Whale Shark Teluk Saleh', 10, 2, 8, 'tersedia', '2025-10-22 10:05:43', '2025-10-22 10:05:54');

--
-- Triggers `jadwal_trip`
--
DELIMITER $$
CREATE TRIGGER `before_update_jadwal_trip` BEFORE UPDATE ON `jadwal_trip` FOR EACH ROW BEGIN
    -- Menghitung nilai 'sisa' berdasarkan kapasitas dan terisi sebelum update
    SET NEW.sisa = NEW.kapasitas - NEW.terisi;
END
$$
DELIMITER ;

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

--
-- Dumping data for table `kelola_wisata`
--

INSERT INTO `kelola_wisata` (`id`, `nama_wisata`, `kategori`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'JALAN JALAN', 'wisata_pilihan', 'ABCHDKBFSBKFBDKBFKJD KJDBFBDSKBFKHDSBFBD DHBFHSDBFHKBDSK FD FKHBSKHBFIEHFUIBDSKJBFKJDBB ', '1763482126_fb6c2d32a24eb3da9f46.jpg', '2025-11-18 09:08:46', '2025-11-18 09:08:46');

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
  `harga_normal` int NOT NULL,
  `harga_diskon` int NOT NULL,
  `harga_normal` int NOT NULL,
  `harga_diskon` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Aktif, 2 = Tidak Aktif',
  `masa_berlaku_start` date DEFAULT NULL,
  `masa_berlaku_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promosi`
--

<<<<<<< Updated upstream
INSERT INTO `promosi` (`id`, `nama_promosi`, `harga_normal`, `harga_diskon`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Diskon 25% Paket Private Pax 5', 800000, 650000, '2025-09-22 11:33:09', '2025-09-22 11:33:09', '1'),
(2, 'Diskon 25% Paket Private Pax 10', 2800000, 2300000, '2025-10-14 10:18:24', '2025-10-14 10:18:24', '1'),
(3, 'JALANJALAN', 650000, 200000, '2025-10-22 10:51:02', '2025-10-22 10:51:02', '1');
(1, 'Diskon 25% Paket Private Pax 5', 800000, 650000, '2025-09-22 11:33:09', '2025-09-22 11:33:09', '1'),
(2, 'Diskon 25% Paket Private Pax 10', 2800000, 2300000, '2025-10-14 10:18:24', '2025-10-14 10:18:24', '1'),
(3, 'JALANJALAN', 650000, 200000, '2025-10-22 10:51:02', '2025-10-22 10:51:02', '1');
=======
INSERT INTO `promosi` (`id`, `nama_promosi`, `harga_normal`, `harga_diskon`, `created_at`, `updated_at`, `status`, `masa_berlaku_start`, `masa_berlaku_end`) VALUES
(4, 'GAJIAN', 650000, 150000, '2025-10-01 08:38:22', '2025-11-18 10:25:40', '1', '2025-11-01', '2025-12-31'),
(6, 'JALANJALAN', 300000, 250000, '2025-11-18 10:26:31', '2025-11-18 10:26:31', '1', '2025-11-20', '2025-11-27');
>>>>>>> Stashed changes

-- --------------------------------------------------------

--
-- Table structure for table `setting_payments`
--

CREATE TABLE `setting_payments` (
  `id` int NOT NULL,
  `payments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `metode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_payments`
--

INSERT INTO `setting_payments` (`id`, `payments`, `number`, `status`, `metode`, `created_at`, `updated_at`) VALUES
(1, 'GOPAY', '087765261822', 'active', 'e-wallet', '2025-11-18 10:48:22', '2025-11-18 18:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_trip` int NOT NULL,
  `ulasan` text NOT NULL,
  `pengalaman_rating` decimal(3,2) NOT NULL,
  `pemandu_rating` decimal(3,2) NOT NULL,
  `fasilitas_rating` decimal(3,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `promo` tinyint NOT NULL DEFAULT '1',
  `promo` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `kontak`, `email`, `role_user`, `promo`, `created_at`, `updated_at`) VALUES
(1, 'user', '123', 'Jarwo Kwat', '082250706412', 'mfikryrid@gmail.com', '1', 2, NULL, NULL),
(3, 'admin', '123', 'Muhammad Fikri Ridwan', '082250706412', 'mfikryrid2@gmail.com', '2', 1, NULL, NULL),
(6, 'mfikrid', '123', 'Muhammad Fikri Ridwan', '082250706412', 'mfikryrid3@gmail.com', '1', 2, NULL, NULL);
INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `kontak`, `email`, `role_user`, `promo`, `created_at`, `updated_at`) VALUES
(1, 'user', '123', 'Jarwo Kwat', '082250706412', 'mfikryrid@gmail.com', '1', 2, NULL, NULL),
(3, 'admin', '123', 'Muhammad Fikri Ridwan', '082250706412', 'mfikryrid2@gmail.com', '2', 1, NULL, NULL),
(6, 'mfikrid', '123', 'Muhammad Fikri Ridwan', '082250706412', 'mfikryrid3@gmail.com', '1', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings_details_visitors`
--
ALTER TABLE `bookings_details_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_details_visitors`
--
ALTER TABLE `bookings_details_visitors`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bookings_details_visitors`
--
ALTER TABLE `bookings_details_visitors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings_details_visitors`
--
ALTER TABLE `bookings_details_visitors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_trip`
--
ALTER TABLE `jadwal_trip`
<<<<<<< Updated upstream
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
=======
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
>>>>>>> Stashed changes

--
-- AUTO_INCREMENT for table `kelola_wisata`
--
ALTER TABLE `kelola_wisata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
<<<<<<< Updated upstream
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
=======
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
>>>>>>> Stashed changes

--
-- AUTO_INCREMENT for table `setting_payments`
--
ALTER TABLE `setting_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

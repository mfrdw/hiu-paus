-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2025 at 05:19 PM
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
  `id_bookings` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_visitors` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia` int NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings_details_visitors`
--

INSERT INTO `bookings_details_visitors` (`id`, `id_bookings`, `nama_visitors`, `usia`, `jenis_kelamin`, `kewarganegaraan`, `created_at`, `updated_at`) VALUES
(0, 'WS20251130001', 'MUHAMMAD FIKRI R', 25, 'L', 'WNI', '2025-11-30 09:49:19', '2025-11-30 09:49:19'),
(0, 'WS20251130002', 'MUHAMMAD FIKRI R', 25, 'L', 'WNI', '2025-11-30 09:58:17', '2025-11-30 09:58:17'),
(0, 'WS20251130003', 'MUHAMMAD FIKRI R', 25, 'L', 'WNI', '2025-11-30 10:06:25', '2025-11-30 10:06:25'),
(0, 'WS20251201001', 'MUHAMMAD FIKRI R', 25, 'L', 'WNI', '2025-11-30 17:18:11', '2025-11-30 17:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int NOT NULL,
  `id_bookings` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `paket` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jumlah_orang` int NOT NULL,
  `total_biaya` int NOT NULL,
  `role_payment` enum('pending','confirmed','completed') DEFAULT 'pending',
  `mode_pembayaran` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `upload_gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_trip` date DEFAULT NULL,
  `jam_trip` time DEFAULT NULL,
  `voucher` varchar(59) NOT NULL,
  `nilai_voucher` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `id_bookings`, `user_id`, `full_name`, `email`, `kontak`, `paket`, `jumlah_orang`, `total_biaya`, `role_payment`, `mode_pembayaran`, `upload_gambar`, `created_at`, `updated_at`, `tanggal_trip`, `jam_trip`, `voucher`, `nilai_voucher`) VALUES
(2, 'WS20251130002', 3, 'MUHAMMAD FIKRI R', 'mfikryrid@gmail.com', '082250706412', 'Open Trip Whale Shark Teluk Saleh', 1, 650000, 'confirmed', 'GOPAY', '1764521920_863c870635c845ec407e.jpg', '2025-11-30 09:58:17', '2025-11-30 17:05:03', '2025-12-01', '08:00:00', '', 0),
(3, 'WS20251130003', 6, 'MUHAMMAD FIKRI R', 'mfikryrid@gmail.com', '082250706412', 'Open Trip Whale Shark Teluk Saleh', 1, 650000, 'confirmed', 'GOPAY', '1764522427_4b006721900c0b12a5c9.jpg', '2025-11-30 10:06:25', '2025-11-30 17:17:30', '2025-12-01', '08:00:00', '', 0),
(4, 'WS20251201001', 6, 'MUHAMMAD FIKRI R', 'mfikryrid@gmail.com', '082250706412', 'Private Trip Whale Shark Teluk Saleh', 1, 2450000, 'pending', 'GOPAY', '1764523115_5a6da388ff11bcdef4e5.jpg', '2025-11-30 17:18:11', '2025-11-30 17:18:35', '2025-12-01', '06:00:00', '7', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_trip`
--

CREATE TABLE `jadwal_trip` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
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

INSERT INTO `jadwal_trip` (`id`, `tanggal`, `jam_mulai`, `jam_selesai`, `paket`, `kapasitas`, `terisi`, `sisa`, `status`, `created_at`, `updated_at`) VALUES
(9, '2025-12-01', '08:00:00', '10:00:00', 'Open Trip Whale Shark Teluk Saleh', 15, 5, 10, 'tersedia', '2025-11-30 08:45:00', '2025-11-30 10:06:27'),
(10, '2025-12-01', '06:00:00', '10:00:00', 'Private Trip Whale Shark Teluk Saleh', 15, 3, 12, 'tersedia', '2025-11-30 09:10:52', '2025-11-30 17:18:14');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Aktif, 2 = Tidak Aktif',
  `masa_berlaku_start` date DEFAULT NULL,
  `masa_berlaku_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id`, `nama_promosi`, `harga_normal`, `harga_diskon`, `created_at`, `updated_at`, `status`, `masa_berlaku_start`, `masa_berlaku_end`) VALUES
(7, 'AKHIRTAHUN', 650000, 350000, '2025-11-30 07:34:49', '2025-11-30 07:34:49', '1', '2025-11-30', '2025-12-06');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal_trip`
--
ALTER TABLE `jadwal_trip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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

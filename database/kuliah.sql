-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2025 at 01:19 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `created_at`, `updated_at`) VALUES
('001', 'Dosen 1', '2025-11-27 17:52:38', '2025-11-27 17:52:38'),
('002', 'Dosen 2', '2025-11-27 17:52:47', '2025-11-27 17:52:47'),
('003', 'Dosen 3', '2025-11-27 17:52:59', '2025-11-27 17:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int UNSIGNED NOT NULL,
  `nama_kelas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_mata_kuliah` int UNSIGNED NOT NULL,
  `id_ruangan` int UNSIGNED NOT NULL,
  `nidn` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `hari` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jam` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_kelas`, `id_mata_kuliah`, `id_ruangan`, `nidn`, `hari`, `jam`) VALUES
(5, 'MK 1', 7, 7, '001', 'Senin', '08.00 - 10.00'),
(6, 'MK 2', 8, 8, '002', 'Selasa', '08.00 - 10.00'),
(7, 'MK 3', 9, 9, '003', 'Rabu', '08.00 - 10.00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `created_at`, `updated_at`) VALUES
('NIM 1', 'Mahasiswa 1', '2025-11-27 17:51:26', '2025-11-27 17:51:26'),
('NIM 2', 'Mahasiswa 2', '2025-11-27 17:51:40', '2025-11-27 17:51:40'),
('NIM 3', 'Mahasiswa 3', '2025-11-27 17:51:59', '2025-11-27 17:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_mata_kuliah` int UNSIGNED NOT NULL,
  `kode_mata_kuliah` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_mata_kuliah` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sks` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_mata_kuliah`, `kode_mata_kuliah`, `nama_mata_kuliah`, `sks`) VALUES
(7, 'MK001', 'Mata Kuliah 1', 2),
(8, 'MK002', 'Mata Kuliah 2', 3),
(9, 'MK003', 'Mata Kuliah 3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-11-27-161234', 'App\\Database\\Migrations\\UserMigration', 'default', 'App', 1764260513, 1),
(2, '2025-11-27-161239', 'App\\Database\\Migrations\\MahasiswaMigration', 'default', 'App', 1764260513, 1),
(3, '2025-11-27-161245', 'App\\Database\\Migrations\\DosenMigration', 'default', 'App', 1764260513, 1),
(4, '2025-11-27-161256', 'App\\Database\\Migrations\\RuanganMigration', 'default', 'App', 1764260513, 1),
(5, '2025-11-27-161259', 'App\\Database\\Migrations\\MataKuliahMigration', 'default', 'App', 1764260513, 1),
(6, '2025-11-27-161303', 'App\\Database\\Migrations\\JadwalMigration', 'default', 'App', 1764260513, 1),
(7, '2025-11-27-161306', 'App\\Database\\Migrations\\NilaiMutuMigration', 'default', 'App', 1764260513, 1),
(8, '2025-11-27-161310', 'App\\Database\\Migrations\\RencanaStudiMigration', 'default', 'App', 1764260513, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mutu`
--

CREATE TABLE `nilai_mutu` (
  `id` int NOT NULL,
  `nilai_huruf` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_mutu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_mutu`
--

INSERT INTO `nilai_mutu` (`id`, `nilai_huruf`, `nilai_mutu`) VALUES
(1, 'A', 4),
(2, 'B+', 3.5),
(3, 'B', 3),
(4, 'C+', 2.5),
(5, 'C', 2),
(6, 'D', 1),
(7, 'E', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_studi`
--

CREATE TABLE `rencana_studi` (
  `id_rencana_studi` int UNSIGNED NOT NULL,
  `nim` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `id_jadwal` int UNSIGNED NOT NULL,
  `nilai_angka` float NOT NULL DEFAULT '0',
  `nilai_huruf` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rencana_studi`
--

INSERT INTO `rencana_studi` (`id_rencana_studi`, `nim`, `id_jadwal`, `nilai_angka`, `nilai_huruf`) VALUES
(7, 'NIM 1', 5, 90, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int UNSIGNED NOT NULL,
  `nama_ruangan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(7, 'Ruangan 1'),
(8, 'Ruangan 2'),
(9, 'Ruangan 3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int UNSIGNED NOT NULL,
  `nama_user` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','dosen','mahasiswa') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'mahasiswa',
  `kode_peran` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `role`, `kode_peran`) VALUES
(1, 'admin', '$2y$10$QU/E24DF8OZoGIHXFQodQusRr2MYTnvkv.wL1LMHvf1iODAFgao9m', 'admin', NULL),
(13, 'NIM 1', '$2y$10$oHQk5xLbyJfi4mOObMsKUuymNySloqDU99NIORBkxoPSbdvL07qG6', 'mahasiswa', 'NIM 1'),
(14, 'NIM 2', '$2y$10$Z2okOsQGNTN1oqXJKzQcguRd20IAjAOqpjj5aSG4M0WW.eX7ZTzTW', 'mahasiswa', 'NIM 2'),
(15, 'NIM 3', '$2y$10$t2GE4OLDzFRsR5n8xTQxUut2HjReHRJMwZrICgHcgErk0MFQ5X3Wi', 'mahasiswa', 'NIM 3'),
(16, 'dosen001', '$2y$10$z7B1Aaui1NtTFim1fi3dg.WTmswNPW.L3uB6o839Dazbqu9jfUj.O', 'dosen', '001'),
(17, 'dosen002', '$2y$10$V9a36X611JrD.BHfRXaUoOR8S.NYAdUzm3LJqzpEiOeTBA0iRswqa', 'dosen', '002'),
(18, 'dosen003', '$2y$10$gCxiexXps3hWWs1UwVofOuN2mRc.jzCb/vrlgc2qvun9HMl7Up4kC', 'dosen', '003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_id_mata_kuliah_foreign` (`id_mata_kuliah`),
  ADD KEY `jadwal_id_ruangan_foreign` (`id_ruangan`),
  ADD KEY `jadwal_nidn_foreign` (`nidn`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_mata_kuliah`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rencana_studi`
--
ALTER TABLE `rencana_studi`
  ADD PRIMARY KEY (`id_rencana_studi`),
  ADD KEY `rencana_studi_nim_foreign` (`nim`),
  ADD KEY `rencana_studi_id_jadwal_foreign` (`id_jadwal`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nama_user` (`nama_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_mata_kuliah` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rencana_studi`
--
ALTER TABLE `rencana_studi`
  MODIFY `id_rencana_studi` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_id_mata_kuliah_foreign` FOREIGN KEY (`id_mata_kuliah`) REFERENCES `mata_kuliah` (`id_mata_kuliah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_id_ruangan_foreign` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_nidn_foreign` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rencana_studi`
--
ALTER TABLE `rencana_studi`
  ADD CONSTRAINT `rencana_studi_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rencana_studi_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

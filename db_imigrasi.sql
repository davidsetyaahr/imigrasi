-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 03:30 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_imigrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawab_pertanyaan`
--

CREATE TABLE `jawab_pertanyaan` (
  `id_jawab` int(4) NOT NULL,
  `id_pengajuan` int(4) NOT NULL,
  `id_pertanyaan` int(4) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('davidsetya24@gmail.com', '$2y$10$p.FNo19LUq6/3Hx5KlKp7.GB.CNBPiEUo54/LmBZiQ5IVd6OyvKjW', '2021-09-26 07:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(4) NOT NULL,
  `tipe` enum('PHilang','PRusak') NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `NIK` varchar(18) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `no_pengajuan` varchar(100) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `tgl_pemeriksaan` datetime DEFAULT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `tipe`, `nama`, `email`, `no_hp`, `alamat`, `NIK`, `jenis_kelamin`, `no_pengajuan`, `tgl_pengajuan`, `tgl_pemeriksaan`, `status`) VALUES
(1, 'PHilang', 'David', 'davidsetya24@gmail.com', '085210853778 ', 'Bondowoso', '123123123', 'laki-laki', '123', '2021-09-28 00:46:44', NULL, '0'),
(2, 'PHilang', 'Setya', 'davidsetya24@gmail.com', '085210853778 ', 'Bondowoso', '123123123', 'laki-laki', '122', '2021-09-27 00:46:44', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_jadwal` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pengajuan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_jadwal`, `tanggal`, `id_pengajuan`) VALUES
(1, '2021-09-29', 1),
(2, '2021-10-02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(4) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `is_p_rusak` enum('0','1') NOT NULL,
  `is_p_hilang` enum('0','1') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`, `is_p_rusak`, `is_p_hilang`, `status`) VALUES
(1, 'Apakah saudara sekarang ini dalam keadaan sehat jasmani dan rohani?', '1', '1', '1'),
(2, 'Bersediakah saudara untuk memberikan keterangan dengan sebeanar-benarnya?', '1', '1', '1'),
(3, 'Apakah saudara bisa berbahasa indonesia?', '1', '1', '1'),
(4, 'Apakah saudara memerlukan penerjemah?', '1', '1', '1'),
(5, 'Ceritakan riwayat hidup anda secara singkat', '1', '1', '1'),
(6, 'Berapa nomor Paspor, masa berlaku dan dimana paspor tersebut diterbitkan?', '1', '1', '1'),
(7, 'Ceritakan perihal tentang rusaknya paspor tersebut?', '1', '0', '1'),
(8, 'Ceritakan perihal tentang hilangnya paspor tersebut?', '0', '1', '1'),
(9, 'Berapa nomor surat kehilangan yang saudara dapatkan dari kepolisian?', '0', '1', '1'),
(10, 'Mengapa saudara saat ini mengajukan permohonan paspor?', '1', '1', '1'),
(11, 'Apakah keterangan yang saudara berikan benar dan dapat dipertanggung jawabkan?', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator@mail.com', '$2y$10$Waq71S2gE1dY1uTptzhIueezsXeOR5v6rLf5xQ92Gd7Lph3zWkStq', NULL, NULL, '2021-06-29 07:32:14', '2021-06-29 07:32:14'),
(5, 'Administrator', 'davidsetya24@gmail.com', '$2y$10$Waq71S2gE1dY1uTptzhIueezsXeOR5v6rLf5xQ92Gd7Lph3zWkStq', NULL, NULL, '2021-06-29 07:32:14', '2021-06-29 07:32:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawab_pertanyaan`
--
ALTER TABLE `jawab_pertanyaan`
  ADD PRIMARY KEY (`id_jawab`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

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
-- AUTO_INCREMENT for table `jawab_pertanyaan`
--
ALTER TABLE `jawab_pertanyaan`
  MODIFY `id_jawab` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_jadwal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

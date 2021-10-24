-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 05:47 AM
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

--
-- Dumping data for table `jawab_pertanyaan`
--

INSERT INTO `jawab_pertanyaan` (`id_jawab`, `id_pengajuan`, `id_pertanyaan`, `jawaban`) VALUES
(1, 5, 1, 'Ya'),
(2, 5, 2, 'Ya'),
(3, 5, 3, 'Ya'),
(4, 5, 4, 'Ya'),
(5, 5, 5, 'Ya'),
(6, 5, 6, 'Ya'),
(7, 5, 8, 'Ya'),
(8, 5, 9, 'Ya'),
(9, 5, 10, 'Ya'),
(10, 5, 11, 'Ya'),
(11, 6, 1, 'Ya'),
(12, 6, 2, 'Ya'),
(13, 6, 3, 'Ya'),
(14, 6, 4, 'Ya'),
(15, 6, 5, 'Ya'),
(16, 6, 6, 'Ya'),
(17, 6, 8, 'Ya'),
(18, 6, 9, 'Ya'),
(19, 6, 10, 'Ya'),
(20, 6, 11, 'Ya'),
(21, 7, 1, 'Ya'),
(22, 7, 2, 'Ya'),
(23, 7, 3, 'Ya'),
(24, 7, 4, 'Ya'),
(25, 7, 5, 'Ya'),
(26, 7, 6, 'Ya'),
(27, 7, 7, 'Ya'),
(28, 7, 10, 'Ya'),
(29, 7, 11, 'Ya'),
(30, 8, 1, 'Ya'),
(31, 8, 2, 'Ya'),
(32, 8, 3, 'Ya'),
(33, 8, 4, 'Ya'),
(34, 8, 5, 'Cerita'),
(35, 8, 6, '123'),
(36, 8, 7, 'Jember'),
(37, 8, 8, '20  Desember'),
(38, 8, 10, 'Hilan'),
(39, 8, 11, '123'),
(40, 8, 12, 'Karena'),
(41, 8, 13, 'Ya'),
(42, 9, 1, 'Ya'),
(43, 9, 2, 'Ya'),
(44, 9, 3, 'Ya'),
(45, 9, 4, 'Ya'),
(46, 9, 5, 'Riwayat hidup'),
(47, 9, 6, '123'),
(48, 9, 7, 'Jember'),
(49, 9, 8, '20 Desember 2021'),
(50, 9, 10, 'Hilang'),
(51, 9, 11, '123'),
(52, 9, 12, 'Karena'),
(53, 9, 13, 'Ya'),
(54, 10, 1, 'Ya'),
(55, 10, 2, 'Ya'),
(56, 10, 3, 'Ya'),
(57, 10, 4, 'Ya'),
(58, 10, 5, 'Riwayat hidup'),
(59, 10, 6, 'Ya'),
(60, 10, 7, 'Jember'),
(61, 10, 8, '20 Desember 2021'),
(62, 10, 10, 'Hilang'),
(63, 10, 11, 'Ya'),
(64, 10, 12, 'Untuk keluar negeri'),
(65, 10, 13, 'Ya'),
(66, 11, 1, 'Ya'),
(67, 11, 2, 'Ya'),
(68, 11, 3, 'Ya'),
(69, 11, 4, 'Ya'),
(70, 11, 5, 'Riwayat hidup'),
(71, 11, 6, 'Ya'),
(72, 11, 7, 'Jember'),
(73, 11, 8, '20 Desember 2021'),
(74, 11, 10, 'Hilang'),
(75, 11, 11, '123'),
(76, 11, 12, 'Karena'),
(77, 11, 13, 'Ya');

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
  `tempat_lahir` varchar(150) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status_pernikahan` varchar(50) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `no_pemeriksaan` varchar(100) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `tgl_pemeriksaan` datetime DEFAULT NULL,
  `id_petugas` int(3) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `tipe`, `nama`, `email`, `no_hp`, `alamat`, `NIK`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `status_pernikahan`, `pekerjaan`, `no_pemeriksaan`, `tgl_pengajuan`, `tgl_pemeriksaan`, `id_petugas`, `status`, `created_at`, `updated_at`) VALUES
(5, 'PHilang', 'David Setya', 'davidsetya24@gmail.com', '081216111136', 'Bondowoso\r\nBondowoso', '3511131701990001', 'laki-laki', 'Banyuwangi', '2021-10-14', 'Islam', 'Kawin', 'Pengusaha', '876', '2021-10-09 00:00:00', '2021-10-09 00:00:00', 3, '1', '2021-10-09 07:58:02', '2021-10-09 07:58:02'),
(6, 'PHilang', 'David Setya A', 'davidsetya24@gmail.com', '082189721', 'Bondowoso', '212331', 'laki-laki', '', '2021-10-14', '', '', '', '624', '2021-10-14 00:00:00', '2021-10-14 00:00:00', 3, '1', '2021-10-14 05:28:31', '2021-10-14 05:28:31'),
(7, 'PRusak', 'David Setya', 'davidsetya24@gmail.com', '081216111136', 'Bondowoso\r\nBondowoso', '12', 'laki-laki', '', '2021-10-14', '', '', '', '213', '2021-10-14 00:00:00', '2021-10-14 00:00:00', 3, '1', '2021-10-14 05:41:18', '2021-10-14 05:41:18'),
(8, 'PHilang', 'David Setya', 'davidsetya24@gmail.com', '081216111136', 'Bondowoso\r\nBondowoso', '3511131701990001', 'laki-laki', 'bondowoso', '2021-10-15', 'Islam', 'Belum Kawin', 'programmer', '546', '2021-10-15 00:00:00', '2021-10-15 00:00:00', 3, '1', '2021-10-15 21:18:28', '2021-10-15 21:18:28'),
(9, 'PHilang', 'David Setya', 'davidsetya24@gmail.com', '081216111136', 'Bondowoso\r\nBondowoso', '1234', 'laki-laki', 'bondowoso', '2021-10-16', 'Islam', 'Belum Kawin', 'SWASTA', '123', '2021-10-16 00:00:00', '2021-10-16 00:00:00', 3, '1', '2021-10-16 09:25:43', '2021-10-16 09:25:43'),
(11, 'PHilang', 'David Setya', 'davidsetya24@gmail.com', '081216111136', 'Bondowoso\r\nBondowoso', '3511131701990001', 'laki-laki', 'bondowoso', '2021-10-21', 'Islam', 'Belum Kawin', 'programmer', '435', '2021-10-21 00:00:00', '2021-10-21 00:00:00', 3, '1', '2021-10-21 21:58:24', '2021-10-21 21:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_jadwal` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pengajuan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, 'Berapa nomor paspor saudara?', '1', '1', '1'),
(7, 'Dimana dan kapan paspor tersebut diterbitkan?', '1', '1', '1'),
(8, 'Sebutkan masa berlaku paspor saudara?', '1', '1', '1'),
(9, 'Ceritakan perihal tentang rusaknya paspor tersebut?', '1', '0', '1'),
(10, 'Ceritakan perihal tentang hilangnya paspor tersebut?', '0', '1', '1'),
(11, 'Berapa nomor surat kehilangan yang saudara dapatkan dari kepolisian?', '0', '1', '1'),
(12, 'Mengapa saudara saat ini mengajukan permohonan paspor?', '1', '1', '1'),
(13, 'Apakah keterangan yang saudara berikan benar dan dapat dipertanggung jawabkan?', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(3) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `nip`, `pangkat`, `jabatan`, `updated_at`, `created_at`) VALUES
(3, 'RIZKI NUR ADIYAT', '1978122420006041001', 'Penata Muda Tingkat I (III/b)', 'Kepala Subseksi Penindakan Keimigrasian', '2021-10-21 21:06:54', '2021-10-21 20:30:40'),
(9, 'Super Admin', '123', 'Super Admin', 'Super Admin', '2021-10-24 10:47:49', '2021-10-24 10:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `id_petugas` int(3) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 = Super Admin, 2 = Petugas',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_petugas`, `email`, `password`, `level`, `two_factor_secret`, `two_factor_recovery_codes`, `created_at`, `updated_at`) VALUES
(7, 3, 'rizki@gmail.com', '$2y$10$XWp8d36DsyKbQjDmDyPUE.Xxmzg4Vwt47Fe63FZT8/NMUUVQ7.XvC', '2', NULL, NULL, '2021-10-21 13:30:40', '2021-10-21 14:07:01'),
(10, 9, 'super.admin@gmail.com', '$2y$10$spqXQDpU.EMjbG.UdiIdGuSwkq8sizgmaKjsk41Ew5Aa.hM5oBjrm', '1', NULL, NULL, '2021-10-24 03:47:49', '2021-10-24 03:47:49');

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
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

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
  MODIFY `id_jawab` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_jadwal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

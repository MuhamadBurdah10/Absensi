-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 02:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `jam_masuk` varchar(20) NOT NULL,
  `jam_keluar` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status_absen` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lokasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `id_pegawai`, `id_jadwal`, `tgl_absen`, `jam_masuk`, `jam_keluar`, `image`, `status_absen`, `created_at`, `updated_at`, `lokasi`) VALUES
(34, '10', 9, '2023-01-17', '08:00:12', '16:20:06', 'zidan.jpeg', 1, '2023-01-16 17:00:00', '2023-01-24 11:16:42', 'Bogor, Indonesia'),
(44, '10', 9, '2023-01-18', '08:04:22', '16:07:24', 'zidan.jpeg', 1, '2023-01-17 17:00:00', '2023-01-24 11:16:48', 'Bogor, Indonesia'),
(45, '10', 9, '2023-01-19', '08:10:07', '16:13:06', 'zidan.jpeg', 1, '2023-01-19 08:40:35', '2023-01-24 11:16:54', 'Bogor, Indonesia'),
(46, '10', 9, '2023-01-20', '08:07:06', '16:11:06', 'zidan.jpeg', 1, '2023-01-20 08:32:52', '2023-01-20 08:32:52', 'Bogor, Indonesia'),
(47, '10', 9, '2023-01-16', '08:00:06', '16:00:06', 'zidan.jpeg', 1, '2023-01-16 08:32:52', '2023-01-24 11:21:55', 'Bogor, Indonesia'),
(48, '10', 9, '2023-01-25', '08:07:12', '16:10:06', 'zidan.jpeg', 1, '2023-01-24 11:21:36', '2023-01-24 11:21:36', 'Bogor, Indonesia'),
(49, '18', 9, '2023-01-24', '08:00:10', '16:11:09', 'sandi.jpeg', 1, '2023-01-24 09:08:37', '2023-01-24 09:08:37', 'Bogor, Indonesia'),
(50, '18', 9, '2023-01-16', '08:03:10', '16:10:09', 'sandi.jpeg', 1, '2023-01-16 08:32:52', '2023-01-16 08:32:52', 'Bogor, Indonesia'),
(51, '18', 9, '2023-01-17', '08:12:00', '16:00:06', 'sandi.jpeg', 1, '2023-01-17 08:41:36', '2023-01-17 08:41:36', 'Bogor, Indonesia'),
(52, '18', 9, '2023-01-18', '08:10:00', '16:00:00', 'sandi.jpeg', 1, '2023-01-24 09:08:25', '2023-01-20 08:41:36', 'Bogor, Indonesia'),
(53, '18', 9, '2023-01-20', '08:11:00', '16:00:00', 'sandi.jpeg', 1, '2023-01-24 09:08:16', '2023-01-20 08:41:36', 'Bogor, Indonesia'),
(54, '18', 9, '2023-01-19', '08:10:02', '16:00:01', 'sandi.jpeg', 1, '2023-01-19 09:08:25', '2023-01-19 08:41:36', 'Bogor, Indonesia'),
(55, '18', 9, '2023-01-25', '08:05:02', '16:00:11', 'sandi.jpeg', 1, '2023-01-25 09:08:25', '2023-01-25 08:41:36', 'Bogor, Indonesia'),
(56, '19', 9, '2023-01-16', '08:03:02', '16:00:00', 'kadir.jpeg', 1, '2023-01-16 09:08:25', '2023-01-16 08:41:36', 'Bogor, Indonesia'),
(57, '19', 9, '2023-01-17', '08:00:02', '16:02:00', 'kadir.jpeg', 1, '2023-01-17 09:08:25', '2023-01-17 08:41:36', 'Bogor, Indonesia'),
(58, '19', 9, '2023-01-18', '08:02:02', '16:12:00', 'kadir.jpeg', 1, '2023-01-18 09:08:25', '2023-01-18 08:41:36', 'Bogor, Indonesia'),
(59, '19', 9, '2023-01-19', '08:04:02', '16:13:00', 'kadir.jpeg', 1, '2023-01-19 09:08:25', '2023-01-19 08:41:36', 'Bogor, Indonesia'),
(60, '19', 9, '2023-01-20', '08:00:02', '16:05:00', 'kadir.jpeg', 1, '2023-01-20 09:08:25', '2023-01-20 08:41:36', 'Bogor, Indonesia'),
(61, '19', 9, '2023-01-24', '08:03:12', '16:10:00', 'kadir.jpeg', 1, '2023-01-24 09:08:25', '2023-01-24 08:41:36', 'Bogor, Indonesia'),
(62, '19', 9, '2023-01-25', '08:00:10', '16:00:03', 'kadir.jpeg', 1, '2023-01-25 09:08:25', '2023-01-25 08:41:36', 'Bogor, Indonesia'),
(63, '20', 9, '2023-01-16', '08:00:00', '16:00:03', 'Djuharningsih.jpeg', 1, '2023-01-16 09:08:25', '2023-01-16 08:41:36', 'Bogor, Indonesia'),
(64, '20', 9, '2023-01-17', '08:06:00', '16:00:03', 'Djuharningsih.jpeg', 1, '2023-01-17 09:08:25', '2023-01-17 08:41:36', 'Bogor, Indonesia'),
(65, '20', 9, '2023-01-18', '08:04:00', '16:07:03', 'Djuharningsih.jpeg', 1, '2023-01-18 09:08:25', '2023-01-18 08:41:36', 'Bogor, Indonesia'),
(66, '20', 9, '2023-01-19', '08:03:00', '16:10:03', 'Djuharningsih.jpeg', 1, '2023-01-19 09:08:25', '2023-01-19 08:41:36', 'Bogor, Indonesia'),
(67, '20', 9, '2023-01-20', '08:02:00', '16:05:03', 'Djuharningsih.jpeg', 1, '2023-01-20 09:08:25', '2023-01-10 08:41:36', 'Bogor, Indonesia'),
(68, '24', 9, '2023-01-24', '08:08:00', '16:09:03', 'Djuharningsih.jpeg', 1, '2023-01-21 09:08:25', '2023-01-24 08:41:36', 'Bogor, Indonesia'),
(69, '20', 9, '2023-01-25', '08:00:21', '16:04:03', 'Djuharningsih.jpeg', 1, '2023-01-22 09:08:25', '2023-01-25 08:41:36', 'Bogor, Indonesia'),
(70, '21', 9, '2023-01-16', '08:00:00', '16:00:00', 'asifa.jpeg', 1, '2023-01-16 09:08:25', '2023-01-16 08:41:36', 'Bogor, Indonesia'),
(71, '21', 9, '2023-01-17', '08:09:00', '16:10:03', 'asifa.jpeg', 1, '2023-01-17 09:08:25', '2023-01-17 08:41:36', 'Bogor, Indonesia'),
(72, '21', 9, '2023-01-18', '08:00:20', '16:06:03', 'asifa.jpeg', 1, '2023-01-18 09:08:25', '2023-01-18 08:41:36', 'Bogor, Indonesia'),
(73, '21', 9, '2023-01-19', '08:02:00', '16:05:04', 'asifa.jpeg', 1, '2023-01-19 09:08:25', '2023-01-19 08:41:36', 'Bogor, Indonesia'),
(74, '21', 9, '2023-01-20', '08:00:00', '16:10:03', 'asifa.jpeg', 1, '2023-01-20 09:08:25', '2023-01-20 08:41:36', 'Bogor, Indonesia'),
(75, '21', 9, '2023-01-24', '08:00:20', '16:00:30', 'asifa.jpeg', 1, '2023-01-24 09:08:25', '2023-01-24 08:41:36', 'Bogor, Indonesia'),
(76, '21', 9, '2023-01-25', '08:00:00', '16:00:11', 'asifa.jpeg', 1, '2023-01-25 09:08:25', '2023-01-25 08:41:36', 'Bogor, Indonesia'),
(77, '10', 9, '2023-01-24', '08:01:06', '16:11:06', 'zidan.jpeg', 1, '2023-01-24 11:21:17', '2023-01-24 11:21:17', 'Bogor, Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id` int(11) NOT NULL,
  `jam_masuk` varchar(10) NOT NULL,
  `batas_jam_masuk` varchar(10) NOT NULL,
  `jam_keluar` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id`, `jam_masuk`, `batas_jam_masuk`, `jam_keluar`, `created_at`, `updated_at`) VALUES
(1, '17:26', '20:60', '21:00', '2023-01-19 10:25:37', '2023-01-19 10:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `rincian_kegiatan` longtext NOT NULL,
  `surat_kegiatan` varchar(100) DEFAULT NULL,
  `status_kegiatan` int(11) NOT NULL DEFAULT '0',
  `nilai_kegiatan` varchar(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `id_pegawai`, `nama_kegiatan`, `start_date`, `end_date`, `rincian_kegiatan`, `surat_kegiatan`, `status_kegiatan`, `nilai_kegiatan`, `created_at`, `updated_at`) VALUES
(8, 20, 'Kegiatan Bazar UMKM Bogor', '08:05:17', '15:25:00', 'Kegiatan Bazar UMKM pada masyarakat Bogor', '2022-2-undangan-rapat-praktikum-pdec.pdf', 1, '', '2023-01-17', '2023-01-24 12:58:29'),
(10, 19, 'Kegiatan Bazar UMKM Bogor', '08:05:12', '15:05:12', 'Kegiatan Bazar UMKM pada masyarakat Bogor', '2122-teknis praktikum.pdf', 1, '', '2023-01-17', '2023-01-24 12:58:32'),
(14, 10, 'Kegiatan Bazar UMKM Bogor', '08:01:12', '15:00:07', 'Kegiatan Bazar UMKM pada masyarakat Bogor', 'Dark-Purple-Woman-Photo-Customer-Service-Resume.pdf', 1, 'Baik', '2023-01-17', '2023-01-24 12:45:10'),
(18, 18, 'Kegiatan Bazar UMKM Bogor', '08:01:12', '15:00:01', 'Kegiatan Bazar UMKM pada masyarakat Bogor', 'Dark-Purple-Woman-Photo-Customer-Service-Resume.pdf', 1, '', '2023-01-17', '2023-01-24 12:58:25'),
(19, 18, 'Kegiatan MTQ Desa Ciomas', '09:00:00', '14:00:01', 'Kegiatan MTQ yang dilakasanakan dibogor', 'Dark-Purple-Woman-Photo-Customer-Service-Resume.pdf', 0, '', '2023-01-20', '2023-01-24 12:45:18'),
(20, 21, 'Kegiatan Bazar UMKM Bogor', '08:01:12', '15:00:01', 'Kegiatan Bazar UMKM Pada Masyarakat Bogor', '865-Article-Text-1644-1-10-20180726.pdf', 0, '', '2023-01-17', '2023-01-24 12:52:31'),
(21, 21, 'Kegiatan MTQ Desa Ciomas', '08:00:01', '15:00:01', 'Kegiatan MTQ yang dilakasanakan dibogor', 'Dark-Purple-Woman-Photo-Customer-Service-Resume.pdf', 1, 'Cukup', '2023-01-17', '2023-01-24 12:48:09'),
(22, 19, 'Kegiatan MTQ Desa Ciomas', '08:00:01', '15:00:01', 'Kegiatan MTQ yang dilakasanakan dibogor', 'BABIV.pdf', 1, 'Cukup', '2023-01-17', '2023-01-24 12:48:14'),
(23, 10, 'Kegiatan MTQ Desa Ciomas', '08:00:01', '15:00:05', 'Kegiatan MTQ yang dilakasanakan dibogor', 'Dark-Purple-Woman-Photo-Customer-Service-Resume.pdf', 1, 'Cukup', '2023-01-17', '2023-01-24 12:48:43'),
(24, 20, 'Kegiatan MTQ Desa Ciomas', '08:00:01', '12:42', 'Kegiatan Bazar UMKM pada masyarakat Bogor', 'jurnal-futsal.pdf', 1, 'Baik', '2022-12-26', '2023-01-24 12:49:15'),
(26, 21, 'Kegiatan Bazar UMKM pada masyarakat Bogor', '21:51', '12:51', 'Kegiatan Bazar UMKM pada masyarakat Bogor', '865-Article-Text-1644-1-10-20180726.pdf', 1, 'Baik', '2023-01-24', '2023-01-24 12:54:25'),
(27, 20, 'Kegiatan Bazar UMKM Bogor', '08:05:17', '15:25:00', 'Kegiatan Bazar UMKM pada masyarakat Bogor', '2022-2-undangan-rapat-praktikum-pdec.pdf', 1, '', '2023-01-25', '2023-01-24 12:57:57'),
(28, 10, 'Kegiatan Bazar UMKM Bogor', '08:05:17', '15:25:00', 'Kegiatan Bazar UMKM pada masyarakat Bogor', '2022-2-undangan-rapat-praktikum-pdec.pdf', 1, '', '2023-01-25', '2023-01-24 12:58:01'),
(29, 18, 'Kegiatan Bazar UMKM Bogor', '08:05:17', '15:25:00', 'Kegiatan Bazar UMKM pada masyarakat Bogor', '2022-2-undangan-rapat-praktikum-pdec.pdf', 1, '', '2023-01-25', '2023-01-24 12:58:06'),
(30, 19, 'Kegiatan Bazar UMKM Bogor', '08:05:17', '15:25:00', 'Kegiatan Bazar UMKM pada masyarakat Bogor', '2022-2-undangan-rapat-praktikum-pdec.pdf', 1, '', '2023-01-25', '2023-01-24 12:58:10'),
(31, 20, 'Kegiatan Bazar UMKM Bogor', '08:05:17', '15:25:00', 'Kegiatan Bazar UMKM pada masyarakat Bogor', '2022-2-undangan-rapat-praktikum-pdec.pdf', 1, '', '2023-01-25', '2023-01-24 12:58:14'),
(32, 21, 'Kegiatan Bazar UMKM Bogor', '08:05:17', '15:25:00', 'Kegiatan Bazar UMKM pada masyarakat Bogor', '2022-2-undangan-rapat-praktikum-pdec.pdf', 1, '', '2023-01-25', '2023-01-24 12:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `roles` enum('admin','manager','pegawai') NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_karyawan` enum('aktif','nonaktif') NOT NULL,
  `nik` varchar(200) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `status_kegiatann` int(3) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id`, `nama_pegawai`, `tempat`, `tgl_lahir`, `alamat`, `email`, `no_hp`, `roles`, `password`, `status_karyawan`, `nik`, `jk`, `status_kegiatann`, `created`, `updated_at`, `is_active`) VALUES
(5, 'andin', 'jakarta', '2022-08-10', 'bogor', 'andini@gmail.com', '0892322653623', 'admin', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '12132324', 'perempuan', 1, '2023-01-24 08:04:15', '2023-01-24 08:04:15', 1),
(9, 'manager', 'bogor', '2022-08-10', 'bogor selatan', 'manager@gmail.com', '1234545656', 'manager', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '4545776776123', 'laki-laki', 0, '2022-10-25 14:49:54', '2022-10-25 14:49:54', 1),
(10, 'zidan', 'bogor', '2022-08-10', 'bogor barat', 'zidan@gmail.com', '1230000000', 'pegawai', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '35323123', 'laki-laki', 0, '2023-01-24 08:04:34', '2023-01-24 08:04:34', 1),
(18, 'sandi', 'bogor', '2022-12-01', 'ciomas Bogor', 'sandi@gmail.com', '123254765877', 'pegawai', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '67676', 'laki-laki', 0, '2023-01-24 08:05:39', '2023-01-24 08:05:39', 1),
(19, 'kadir', 'bogor', '2022-12-02', 'Bogor selatan', 'kadir@gmail.com', '128637362434', 'pegawai', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '320103101070', 'laki-laki', 0, '2023-01-24 08:09:49', '2023-01-24 08:09:49', 1),
(20, 'djuharningsih', 'Bogor', '1987-01-24', 'Cibinong Bogor', 'djurningsing@gmail.com', '089575645385', 'pegawai', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '', 'perempuan', 0, '2023-01-24 08:12:20', '2023-01-24 08:12:20', 1),
(21, 'asifa', 'Bogor', '1999-01-10', 'ciomas bogor', 'asifa@gmail.com', '089567733386', 'pegawai', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '32010405000987', 'perempuan', 0, '2023-01-24 08:12:23', '2023-01-24 08:12:23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

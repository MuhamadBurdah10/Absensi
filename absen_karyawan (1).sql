-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 10:53 AM
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `id_pegawai`, `id_jadwal`, `tgl_absen`, `jam_masuk`, `jam_keluar`, `image`, `status_absen`, `created_at`, `updated_at`) VALUES
(30, '10', 9, '2022-10-25', '23:00', '0', '34441fb4d539.jpg', 1, '2022-10-26 10:09:25', '2022-10-26 10:09:25'),
(31, '5', 9, '2022-10-25', '20:20', '0', '357e28f909a2.jpg', 1, '2022-10-26 10:09:17', '2022-10-26 10:09:17');

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
(1, '20:20', '20:30', '13:00', '2022-10-25 13:19:38', '2022-10-25 13:19:38');

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
(8, 9, 'dsdsd', '17:25', '17:25', 'rtrtutr', '2022-2-undangan-rapat-praktikum-pdec.pdf', 1, '100', '2022-08-19', '2022-08-19 03:30:36'),
(10, 5, 'fgdfghdfgfghdfh 2342353465', '0000-00-00', '0000-00-00', 'rrrtet', '2122-teknis praktikum.pdf', 1, '80', '2022-09-07', '2022-10-08 08:52:03'),
(14, 10, 'belanja', '22:20', '22:20', '', NULL, 0, '0', '2022-10-07', '2022-10-08 08:51:55'),
(15, 9, 'sadsadNYA', '08:01', '06:00', 'gfghfg hjhjh NYA', 'JURNAL-ADAM_FUTSAL.pdf', 1, 'Sp2', '2022-10-08', '2022-10-08 08:27:38'),
(19, 9, 'DSFSAF', '15:43', '17:41', 'DFDF', 'JURNAL-ADAM_FUTSAL4.pdf', 0, '', '2022-10-08', '2022-10-08 08:42:03'),
(20, 9, 'hari ini', '23:43', '12:42', 'rincian kegiatan', 'Dark-Purple-Woman-Photo-Customer-Service-Resume.pdf', 0, '', '2022-10-10', '2022-10-10 15:43:08'),
(21, 9, 'kegiatanya lagi', '11:52', '00:52', 'rinciannya', 'kikida.pdf', 1, 'Sp1', '2022-10-11', '2022-10-11 03:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_rekrutmen` date NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `roles` enum('admin','manager','pegawai') NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_karyawan` enum('aktif','nonaktif') NOT NULL,
  `nik` varchar(200) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `status_kegiatann` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id`, `nama_pegawai`, `tempat`, `tgl_lahir`, `tgl_rekrutmen`, `alamat`, `email`, `no_hp`, `roles`, `password`, `status_karyawan`, `nik`, `jk`, `status_kegiatann`, `created_at`, `updated_at`, `is_active`) VALUES
(5, 'andin', 'jakarta', '2022-08-10', '0000-00-00', 'bogor', 'andini@gmail.com', '0892322653623', 'admin', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '12132324', 'perempuan', 1, '2022-10-25 14:49:47', '2022-10-25 14:49:47', 1),
(9, 'manager', 'bogor', '2022-08-10', '0000-00-00', 'bogor selatan', 'manager@gmail.com', '1234545656', 'manager', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '4545776776123', 'laki-laki', 0, '2022-10-25 14:49:54', '2022-10-25 14:49:54', 1),
(10, 'karyawan', 'bogor', '2022-08-10', '0000-00-00', 'bogor barat', 'karyawan@gmail.com', '1230000000', 'pegawai', '$2y$10$06DxjndRcI5nAcplCpUK..dG6ZehzzrE2uVwh7QDFpPPv1g9UM4I6', 'aktif', '35323123', 'laki-laki', 0, '2022-10-25 15:11:18', '2022-10-25 15:11:18', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

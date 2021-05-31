-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2021 at 11:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id` varchar(36) NOT NULL,
  `nik` varchar(17) NOT NULL,
  `jenis_presensi` varchar(10) DEFAULT NULL,
  `jam_masuk` timestamp NULL DEFAULT NULL,
  `jam_pulang` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `id` varchar(36) NOT NULL,
  `nik` varchar(17) NOT NULL,
  `password_current_auth` text DEFAULT NULL,
  `password_old_auth` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nik` varchar(17) NOT NULL,
  `id_rules` varchar(36) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `tempat_lahir_pegawai` varchar(30) DEFAULT NULL,
  `tanggal_lahir_pegawai` date DEFAULT NULL,
  `jenis_kelamin_pegawai` enum('L','P') DEFAULT NULL,
  `golongan_darah_pegawai` enum('A','B','O','AB') DEFAULT NULL,
  `alamat_pegawai` text DEFAULT NULL,
  `status_pernikahan_pegawai` varchar(50) DEFAULT NULL,
  `agama_pegawai` enum('ISLAM','KATOLIK','HINDU','BUDHA','KONGHUCU') DEFAULT NULL,
  `pekerjaan_pegawai` varchar(50) DEFAULT NULL,
  `kewarganegaraan_pegawai` varchar(30) DEFAULT NULL,
  `pendidikan_pegawai` varchar(30) DEFAULT NULL,
  `jurusan_pegawai` varchar(30) DEFAULT NULL,
  `jabatan_pegawai` varchar(30) DEFAULT NULL,
  `no_telepon_pegawai` varchar(14) DEFAULT NULL,
  `no_npwp_pegawai` varchar(25) DEFAULT NULL,
  `no_bpjs_pegawai` varchar(40) DEFAULT NULL,
  `no_rekening_pegawai` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rules`
--

CREATE TABLE `tbl_rules` (
  `id` varchar(36) NOT NULL,
  `nama_rules` varchar(30) DEFAULT NULL,
  `deskripsi_rules` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_rules` (`id_rules`);

--
-- Indexes for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD CONSTRAINT `tbl_absensi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_pegawai` (`nik`);

--
-- Constraints for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD CONSTRAINT `tbl_auth_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_pegawai` (`nik`);

--
-- Constraints for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`id_rules`) REFERENCES `tbl_rules` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

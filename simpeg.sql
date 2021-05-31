-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 03:40 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nik` int(11) NOT NULL,
  `id_rules` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL,
  `nama_pegawai` int(11) NOT NULL,
  `tempat_lahir` int(11) NOT NULL,
  `tanggal_lahir` int(11) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `golongan_darah` int(11) NOT NULL,
  `alamat` int(11) NOT NULL,
  `status_pernikahan` int(11) NOT NULL,
  `agama` int(11) NOT NULL,
  `pekerjaan` int(11) NOT NULL,
  `kewarganegaraan` int(11) NOT NULL,
  `pendidikan` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `nomor_telepon` int(11) NOT NULL,
  `nomor_npwp` int(11) NOT NULL,
  `nomor_bpjs` int(11) NOT NULL,
  `nomor_rekening` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `jenis_presensi` int(11) NOT NULL,
  `jam_masuk` int(11) NOT NULL,
  `jam_pulang` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `password_current` int(11) NOT NULL,
  `password_old` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rules`
--

CREATE TABLE `tbl_rules` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `deskripsi` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

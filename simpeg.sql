-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 12:36 PM
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
  `id_rules` int(1) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `tempat_lahir_pegawai` varchar(30) DEFAULT NULL,
  `tanggal_lahir_pegawai` date DEFAULT NULL,
  `jenis_kelamin_pegawai` enum('L','P') DEFAULT NULL,
  `golongan_darah_pegawai` enum('A','B','O','AB') DEFAULT NULL,
  `alamat_pegawai` text DEFAULT NULL,
  `status_pernikahan_pegawai` enum('KAWIN','BELUM KAWIN') DEFAULT NULL,
  `agama_pegawai` enum('ISLAM','KATOLIK','HINDU','BUDHA','KONGHUCU','KRISTEN') DEFAULT NULL,
  `pekerjaan_pegawai` varchar(50) DEFAULT NULL,
  `kewarganegaraan_pegawai` varchar(30) DEFAULT NULL,
  `pendidikan_pegawai` enum('SD','SMP','SMA','DIPLOMA','SARJANA') DEFAULT NULL,
  `jurusan_pegawai` varchar(30) DEFAULT NULL,
  `jabatan_pegawai` varchar(30) DEFAULT NULL,
  `no_telepon_pegawai` varchar(14) DEFAULT NULL,
  `no_npwp_pegawai` varchar(25) DEFAULT NULL,
  `no_bpjs_pegawai` varchar(40) DEFAULT NULL,
  `no_rekening_pegawai` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nik`, `id_rules`, `nama_pegawai`, `tempat_lahir_pegawai`, `tanggal_lahir_pegawai`, `jenis_kelamin_pegawai`, `golongan_darah_pegawai`, `alamat_pegawai`, `status_pernikahan_pegawai`, `agama_pegawai`, `pekerjaan_pegawai`, `kewarganegaraan_pegawai`, `pendidikan_pegawai`, `jurusan_pegawai`, `jabatan_pegawai`, `no_telepon_pegawai`, `no_npwp_pegawai`, `no_bpjs_pegawai`, `no_rekening_pegawai`, `created_at`, `updated_at`) VALUES
('8203211509950001', 2, 'SEPRISTON NGOIDIL', 'SOAMAETEK', '1995-09-15', 'L', 'O', 'ASRAMA INTEL KOREM 173/PVB RT/RW 002/003, SAMOFA, SAMOFA, BIAK NUMFOR, PAPUA', 'BELUM KAWIN', 'KRISTEN', 'WIRASWASTA', 'INDONESIA', NULL, NULL, 'SECURITY', '082398718866', '96.994.339.8-954.000', NULL, '145-00-1676603-6', '2021-06-01 06:24:54', '2021-06-01 06:24:54'),
('9106010401880001', 2, 'YOHANES LAMATOKAN', 'BIAK', '1988-01-04', 'L', 'A', 'DESA BABRIMBO JLN. SORIDO RAYA RT/RW 002/001, SORIDO, BIAK KOTA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KATOLIK', 'KARYAWAN SWASTA', 'INDONESIA', NULL, NULL, 'DRIVER', '081240341223', '76.897.986.6-954.000', '', '154-00-1364342-8', '2021-06-01 06:52:07', '2021-06-01 06:52:07'),
('9106021505700001', 2, 'MARTHEN ARWEKION', 'NERMNU', '1970-05-15', 'L', 'O', 'KAMPUNG MAMBESAK. RT/RW -/002, MAMBESAK, BIAK UTARA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'PETANI/PEKEBUN', 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', NULL, '76.878.401.9-954.000', NULL, '154-00-1364324-6', '2021-06-01 06:20:45', '2021-06-01 06:20:45'),
('9106120201770001', 2, 'HARUN YARANGGA', 'BIAK', '1977-01-02', 'L', 'O', 'JL. GOA JEPANG KAMPUNG RT/RW 001/002, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'KARYAWAN HONORER', 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', NULL, '76.864.904.8-954.000', NULL, '154-00-1364358-4', '2021-06-01 06:16:18', '2021-06-01 06:16:18'),
('9106121302620001', 2, 'FRITS YARANGGA', 'BIAK', '1962-02-23', 'L', 'A', 'JL. POMPA AIR LAPAN RT/RW 002/002, KARANG MULYA, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'KARYAWAN HONORER', 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', '081238731968', '76.886.644.4-954.000', NULL, '154-00-1364351-9', '2021-06-01 06:16:18', '2021-06-01 06:16:18'),
('9106122012770001', 2, 'DOLFINUS YARANGGA', 'BIAK', '1977-12-20', 'L', 'O', 'DESA SUMBERKER RT/RW 002/002, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'KARYAWAN HONORER', 'INDONESIA', NULL, NULL, 'STAF TU', '081343076922', '66.438.321.3-954.000', '0000718932047', '154-00-1478932-9', '2021-06-01 05:43:34', '2021-06-01 05:43:34'),
('9106122309000001', 2, 'RISKY WAHYU YARANGGA', 'BIAK', '2000-09-23', 'L', NULL, 'DESA SUMBERKER RT/RW 002/002, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'BELUM KAWIN', 'KRISTEN', 'PELAJAR/NAHASISWA', 'INDONESIA', NULL, '', 'SECURITY', '081343076922', '96.963.797.4-954.000', NULL, '154-00-1676774-5', '2021-06-01 06:24:54', '2021-06-01 06:24:54'),
('9106122309770001', 2, 'YULIUS YARANGGA', 'BIAK', '1977-09-23', 'L', 'O', 'JLN. GOA JEPANG KAMPUNG SUMBERKER RT/RW 001/001, SUMBERKER,SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'KARYAWAN HONORER', 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', NULL, '76.864.589.7-954.000', NULL, '154-00-1364358-4', '2021-06-01 06:52:07', '2021-06-01 06:52:07'),
('9106122501750001', 2, 'ARIS YIGIBALOM', 'TIOM', '1975-01-25', 'L', 'O', 'STAB RT/RW 007/002, KARANG MULYA, SAMOFA, BIAK NUMFOR, PAPUA', 'BELUM KAWIN', 'KRISTEN', 'PETANI/PEKEBUN', 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', NULL, '76.973.232.3-954.000', NULL, '154-00-1364283-4', '2021-06-01 05:34:22', '2021-06-01 05:34:22'),
('9106122806830003', 2, 'HERU MULIONO', 'SRAGEN', '1983-06-28', 'L', 'B', 'MANDIRI KARANG MULYA, RT/RW 004/006, KARANG MULYA, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'ISLAM', 'KARYAWAN HONORER', 'INDONESIA', 'SMA', '-', 'DRIVER', '081247181669', '16.403.071.0-954.000', '0001793641803', '154-00-1478932-9', '2021-06-01 01:21:16', '2021-06-01 01:21:16'),
('9106124512900001', 1, 'INDAH WULANDARI', 'BIAK', '1990-12-05', 'P', 'A', 'KOMPLEKS LAPAN SUMBERKER, RT/RW 001/002, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'ISLAM', 'KARYAWAN HONORER', 'INDONESIA', NULL, NULL, 'STAF TATA USAHA', '081344485376', '76.880.419.7-954.000', NULL, '154-00-1110504-0', '2021-06-01 06:20:45', '2021-06-01 06:20:45'),
('9106125804880005', 2, 'AVIRIANTY RAMADANY A.Md', 'BIAK', '1988-04-18', 'P', 'B', 'JL. LAWU RIDGE I RT/RW 001/001, BRAMBAKEN, SAMOFA, BIAK NUMFOR, PAPUA', 'BELUM KAWIN', 'ISLAM', 'KARYAWAN HONORER', 'INDONESIA', 'DIPLOMA', NULL, 'STAF TATA USAHA', '082248441855', '36.162.614.6-954.000', NULL, '154-00-1364362-6', '2021-06-01 05:43:34', '2021-06-01 05:43:34'),
('DUMMY1', 2, 'A. BUDIANTO', NULL, NULL, 'L', NULL, NULL, 'KAWIN', 'ISLAM', NULL, 'INDONESIA', NULL, NULL, 'SECURITY', '0811488431', NULL, NULL, NULL, '2021-06-01 06:56:47', '2021-06-01 06:56:47'),
('DUMMY2', 2, 'ADAM STEVEN AP', NULL, NULL, 'L', NULL, NULL, 'BELUM KAWIN', 'KRISTEN', NULL, NULL, NULL, NULL, 'CLEANING SERVICE', '0811488431', NULL, NULL, NULL, '2021-06-01 06:56:47', '2021-06-01 06:56:47'),
('DUMMY3', 2, 'ASEP SAEPUL IMAM', NULL, NULL, 'L', NULL, NULL, 'BELUM KAWIN', 'ISLAM', NULL, 'INDONESIA', NULL, NULL, 'SECURITY', '082398994448', NULL, NULL, NULL, '2021-06-01 07:09:48', '2021-06-01 07:09:48'),
('DUMMY4', 2, 'MARTHINUS YARANGGA', NULL, NULL, 'L', NULL, NULL, '', 'KRISTEN', NULL, 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', NULL, NULL, NULL, NULL, '2021-06-01 07:09:48', '2021-06-01 07:09:48'),
('DUMMY5', 2, 'MATAN RUMAROPEN', NULL, NULL, 'L', NULL, NULL, NULL, 'KRISTEN', NULL, 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', '081247764851', '', NULL, NULL, '2021-06-01 07:12:27', '2021-06-01 07:12:27'),
('DUMMY6', 2, 'SUSANTO ANGGARANATA', NULL, NULL, 'L', NULL, NULL, 'KAWIN', 'ISLAM', NULL, NULL, NULL, NULL, 'CLEANING SERVICE', '082175772946', NULL, NULL, NULL, '2021-06-01 07:12:27', '2021-06-01 07:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pimpinan`
--

CREATE TABLE `tbl_pimpinan` (
  `nip` varchar(20) NOT NULL,
  `id_rules` int(1) NOT NULL,
  `nama_pimpinan` varchar(50) DEFAULT NULL,
  `jabatan_pimpinan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pimpinan`
--

INSERT INTO `tbl_pimpinan` (`nip`, `id_rules`, `nama_pimpinan`, `jabatan_pimpinan`, `created_at`, `updated_at`) VALUES
('197706142002121009', 4, 'Dian Yudistira, S.Kom., M.Kom.', 'Koordinator Balai Kendali Satelit, Pengamatan Antariksa dan Atmosfer, dan Penginderaan Jauh Biak', '2021-06-01 00:43:16', '2021-06-01 00:43:16'),
('197907022006041022', 3, 'Mochamad Luqman Ashary, S.Kom.', 'Sub Koordinator Bagian Tata Usaha Balai Kendali Satelit, Pengamatan Antariksa dan Atmosfer, dan Penginderaan Jauh Biak', '2021-06-01 00:43:16', '2021-06-01 00:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rules`
--

CREATE TABLE `tbl_rules` (
  `id` int(1) NOT NULL,
  `nama_rules` varchar(30) DEFAULT NULL,
  `deskripsi_rules` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rules`
--

INSERT INTO `tbl_rules` (`id`, `nama_rules`, `deskripsi_rules`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'SUPER ADMIN', '2021-05-31 23:58:32', '2021-05-31 23:58:32'),
(2, 'USER', 'USER GUEST', '2021-05-31 23:58:32', '2021-05-31 23:58:32'),
(3, 'LEAD SUB', 'LEAD SUBKOORDINATOR', '2021-06-01 00:02:17', '2021-06-01 00:02:17'),
(4, 'LEAD KOOR', 'LEAD KOORDINATOR', '2021-06-01 01:09:05', '2021-06-01 01:09:05');

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
-- Indexes for table `tbl_pimpinan`
--
ALTER TABLE `tbl_pimpinan`
  ADD PRIMARY KEY (`nip`),
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

--
-- Constraints for table `tbl_pimpinan`
--
ALTER TABLE `tbl_pimpinan`
  ADD CONSTRAINT `tbl_pimpinan_ibfk_1` FOREIGN KEY (`id_rules`) REFERENCES `tbl_rules` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

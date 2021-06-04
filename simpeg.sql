-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 04:20 PM
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
  `jenis_presensi` enum('WFH','WFO') DEFAULT NULL,
  `jam_masuk` timestamp NULL DEFAULT NULL,
  `jam_pulang` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `nik`, `jenis_presensi`, `jam_masuk`, `jam_pulang`, `created_at`, `updated_at`) VALUES
('08fbd966-964f-4e45-a5db-80290ef743ba', '8203211509950001', 'WFH', '2021-06-03 07:38:18', '2021-06-03 07:38:26', '2021-06-03 09:38:18', '2021-06-03 09:38:18'),
('4ee4b481-6143-4e95-9851-2df3709d14a7', '8203211509950001', 'WFH', '2021-06-04 11:38:10', '2021-06-04 11:38:25', '2021-06-04 13:38:10', '2021-06-04 13:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `id` varchar(36) NOT NULL,
  `nik` varchar(17) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `password_current_auth` text DEFAULT NULL,
  `password_old_auth` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_auth`
--

INSERT INTO `tbl_auth` (`id`, `nik`, `nip`, `password_current_auth`, `password_old_auth`, `created_at`, `updated_at`) VALUES
('0b2bd1d1-079a-4b5c-b42e-ec26ea18ed34', '9106122309000001', NULL, 'Z3FtOGltc012OUQxL1l6Nlp1SWkwUT09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('130d9c2b-56f0-42ef-966c-97dd734d802d', NULL, '197706142002121009', 'bFdNVzFoaUd3dmdJd0h5UVBhbnFSQT09', NULL, '2021-06-01 17:43:34', '2021-06-01 17:43:34'),
('21160603-7236-48de-963c-799e3931c075', '9106122806830003', NULL, 'KytaSDF6TFI0eGxPQ29qNnhSMTRhdz09', NULL, '2021-06-02 07:25:38', '2021-06-02 07:25:38'),
('215f07da-7cb9-4713-b4bd-ca39776a2b69', '9106120201770001', NULL, 'ZXM5UWNVMEVvQW1qdm5WVlEycHFDZz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('440c668f-e2f3-4daf-ad60-8b289b71156c', '9106125804880005', NULL, 'MkRtU1FBRzFmL2V3aGQ1MGN3L3U3QT09', NULL, '2021-06-02 07:25:38', '2021-06-02 07:25:38'),
('53feffed-5035-4f97-b72b-220d16e558e6', '9106122309770001', NULL, 'TFRSU29YQWJ5NDRrRFo5QXV1cVNvZz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('6981758a-589d-4ada-b1a7-74874bf27f1b', '9106122501750001', NULL, 'OVhrZ1hvQkV3RjBaZ2RVaU5adUk0Zz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('794289bd-09b7-461e-9500-5aa6391fa20d', '9106122012770001', NULL, 'US9WUlcycXMydUN0Q0IzUUJjRGVKQT09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('7f0c6c54-91ed-4d98-851e-9eb26b61b7ce', NULL, '197907022006041022', 'Nkg0UEM5OWpURmxRM25JV3BSUjhzQT09', NULL, '2021-06-01 17:43:34', '2021-06-01 17:43:34'),
('ab162cab-ab14-4556-9f62-598056fc2df0', '9106124512900001', NULL, 'bUN5aXpaWVNoenplQS9jRk9tRzNuQT09', NULL, '2021-06-01 17:38:48', '2021-06-01 17:38:48'),
('ba79c4b3-4f97-4522-bbbb-9e332c6907ba', '9106121302620001', NULL, 'cU5wbWJYQVhuUzhxRVdDZGdpa0hpQT09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('cb64d8fc-f05c-4682-9313-b2223d55dc5a', '8203211509950001', NULL, 'S0VWa3VlRzlZdS9qNXBUK0xGM3VYZz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('e1cd2aa9-71c2-4ba1-a20b-9a921ed736a0', '9106021505700001', NULL, 'MitEOVFDK3hUczhRcXRaQk85RGhndz09', NULL, '2021-06-01 17:50:16', '2021-06-01 17:50:16'),
('e293a318-0502-48c6-b3d6-0a00d9fb3da0', '9106010401880001', NULL, 'dllDZFlUZHZ4MGRvQmV0dXZtZDJpZz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logbook`
--

CREATE TABLE `tbl_logbook` (
  `id` varchar(36) NOT NULL,
  `nik` varchar(17) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tgl_selesai_pengisian` timestamp NULL DEFAULT NULL,
  `tgl_permohonan` timestamp NULL DEFAULT NULL,
  `tgl_disetujui` timestamp NULL DEFAULT NULL,
  `status` enum('PP','D') DEFAULT NULL,
  `riwayat_persetujuan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logbook`
--

INSERT INTO `tbl_logbook` (`id`, `nik`, `nip`, `tahun`, `bulan`, `tgl_selesai_pengisian`, `tgl_permohonan`, `tgl_disetujui`, `status`, `riwayat_persetujuan`, `created_at`, `updated_at`) VALUES
('f97829c8-2f11-4061-beb5-c1cc76b23962', '8203211509950001', NULL, '2021', '01', NULL, NULL, NULL, NULL, NULL, '2021-06-03 09:39:23', '2021-06-03 09:39:23');

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
('197706142002121009', 4, 'Dian Yudistira, S.Kom., M.Kom.', 'Koordinator Balai Kendali Satelit, Pengamatan Antariksa dan Atmosfer, dan Penginderaan Jauh Biak', '2021-06-01 00:44:16', '2021-06-01 00:43:16'),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `nip` (`nip`);

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
  ADD CONSTRAINT `tbl_auth_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_pegawai` (`nik`),
  ADD CONSTRAINT `tbl_auth_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tbl_pimpinan` (`nip`);

--
-- Constraints for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  ADD CONSTRAINT `tbl_logbook_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_pegawai` (`nik`),
  ADD CONSTRAINT `tbl_logbook_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tbl_pimpinan` (`nip`);

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

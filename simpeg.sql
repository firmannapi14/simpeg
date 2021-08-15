-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 01:42 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
  `id_pegawai` varchar(36) NOT NULL,
  `jenis_presensi` enum('WFH','WFO') DEFAULT NULL,
  `jam_masuk` timestamp NULL DEFAULT NULL,
  `jam_pulang` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `id_pegawai`, `jenis_presensi`, `jam_masuk`, `jam_pulang`, `created_at`, `updated_at`) VALUES
('820b3d4d-9e0e-466e-87fe-21ad93855de4', '7febf2ad-07c1-4ed0-b93d-cbd9f9dcb4fd', 'WFO', '2021-08-15 10:16:16', '2021-08-15 10:16:24', '2021-08-15 10:16:16', '2021-08-15 10:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `id` varchar(36) NOT NULL,
  `id_pegawai` varchar(36) DEFAULT NULL,
  `id_pimpinan` varchar(36) DEFAULT NULL,
  `password_current_auth` text DEFAULT NULL,
  `password_old_auth` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_auth`
--

INSERT INTO `tbl_auth` (`id`, `id_pegawai`, `id_pimpinan`, `password_current_auth`, `password_old_auth`, `created_at`, `updated_at`) VALUES
('0b2bd1d1-079a-4b5c-b42e-ec26ea18ed34', '82e7b61d-a84c-4734-8d50-4b01b79c28e9', NULL, 'Z3FtOGltc012OUQxL1l6Nlp1SWkwUT09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('0c5c2973-08d8-4962-a6de-7776ebd6f549', '1a7290c5-e17c-42c2-966a-2002516fd0bf', NULL, 'VHJiMkNPVENva3RKTFdLU1lZd2ROUT09', NULL, '2021-06-04 15:07:03', '2021-06-04 15:07:03'),
('130d9c2b-56f0-42ef-966c-97dd734d802d', NULL, '467998b9-eca2-42ef-b1e0-a5c9264252a6', 'bFdNVzFoaUd3dmdJd0h5UVBhbnFSQT09', NULL, '2021-06-01 17:43:34', '2021-06-01 17:43:34'),
('21160603-7236-48de-963c-799e3931c075', '41b65c73-996a-4387-82df-3048421b3756', NULL, 'KytaSDF6TFI0eGxPQ29qNnhSMTRhdz09', NULL, '2021-06-02 07:25:38', '2021-06-02 07:25:38'),
('215f07da-7cb9-4713-b4bd-ca39776a2b69', '175489a9-f6d0-4ebe-b247-c2f3ae138376', NULL, 'ZXM5UWNVMEVvQW1qdm5WVlEycHFDZz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('3b858343-9711-429e-9dab-db4e2f0354a7', '5ed71446-8f5c-493c-956a-983f4ff32a8b', NULL, 'MjU2YmpLbVgyTkgyN0c3aWgwc3BHQT09', NULL, '2021-06-04 15:07:03', '2021-06-04 15:07:03'),
('440c668f-e2f3-4daf-ad60-8b289b71156c', '39688dc7-11db-44ce-a9ff-3b6ee695d2a2', NULL, 'MkRtU1FBRzFmL2V3aGQ1MGN3L3U3QT09', NULL, '2021-06-02 07:25:38', '2021-06-02 07:25:38'),
('48922031-a2b4-43b4-bc35-6f8434d00530', '9a24aae1-c5d1-4341-aa58-e4064e1946de', NULL, 'Z0JiSjJoajI1SEhCK1Uwd25nVlJwQT09', NULL, '2021-06-04 15:07:03', '2021-06-04 15:07:03'),
('53feffed-5035-4f97-b72b-220d16e558e6', '54872817-24f4-4bcc-b052-903dff3e5ddf', NULL, 'TFRSU29YQWJ5NDRrRFo5QXV1cVNvZz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('6981758a-589d-4ada-b1a7-74874bf27f1b', '067117ca-3c16-423e-bd4a-26229dd7a686', NULL, 'OVhrZ1hvQkV3RjBaZ2RVaU5adUk0Zz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('713f87d2-f870-494e-a28f-6f69dd8298b4', '4614d46d-edb1-42c0-97ac-23aebf3f92de', NULL, 'T1NxVUZFUU5ZK0xaWHFlczU1K3lRUT09', NULL, '2021-06-04 15:07:03', '2021-06-04 15:07:03'),
('794289bd-09b7-461e-9500-5aa6391fa20d', '4a2d16f3-9148-4c0c-b371-0ab94f7122a4', NULL, 'US9WUlcycXMydUN0Q0IzUUJjRGVKQT09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('7f0c6c54-91ed-4d98-851e-9eb26b61b7ce', NULL, '053df67b-974e-41d3-ae2a-1270dd37909f', 'Nkg0UEM5OWpURmxRM25JV3BSUjhzQT09', NULL, '2021-06-01 17:43:34', '2021-06-01 17:43:34'),
('91584e7a-4396-4fd9-80ee-55edd69bbc34', '937911cc-080d-4ec2-b752-46f7e2aab54a', NULL, 'emdxbjFVeHJtZzAwRzhhUEJBcnM3QT09', NULL, '2021-06-04 15:07:03', '2021-06-04 15:07:03'),
('ab162cab-ab14-4556-9f62-598056fc2df0', '7febf2ad-07c1-4ed0-b93d-cbd9f9dcb4fd', NULL, 'bUN5aXpaWVNoenplQS9jRk9tRzNuQT09', NULL, '2021-06-01 17:38:48', '2021-06-01 17:38:48'),
('ba79c4b3-4f97-4522-bbbb-9e332c6907ba', 'ee3e4850-ae73-4e5e-829a-37bf18051e50', NULL, 'cU5wbWJYQVhuUzhxRVdDZGdpa0hpQT09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('cb64d8fc-f05c-4682-9313-b2223d55dc5a', 'ce14b7d2-a974-4601-bdb4-019778d13427', NULL, 'S0VWa3VlRzlZdS9qNXBUK0xGM3VYZz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('e1cd2aa9-71c2-4ba1-a20b-9a921ed736a0', 'feb54e74-7fd5-4876-88a3-374182bf2690', NULL, 'MitEOVFDK3hUczhRcXRaQk85RGhndz09', NULL, '2021-06-01 17:50:16', '2021-06-01 17:50:16'),
('e293a318-0502-48c6-b3d6-0a00d9fb3da0', 'bb3f7030-3cbc-48ce-8fb7-81e9b001b0b5', NULL, 'dllDZFlUZHZ4MGRvQmV0dXZtZDJpZz09', NULL, '2021-06-02 07:23:48', '2021-06-02 07:23:48'),
('e6df7e04-6de1-4e14-991b-9c3640947ce1', '39688dc7-11db-44ce-a9ff-3b6ee695d2a2', NULL, 'Y29sT3BUQXp4dGlLZm44M0ovbHBxQT09', NULL, '2021-06-04 15:07:03', '2021-06-04 15:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logbook`
--

CREATE TABLE `tbl_logbook` (
  `id` varchar(36) NOT NULL,
  `id_pegawai` varchar(36) DEFAULT NULL,
  `id_pimpinan` varchar(36) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tgl_selesai_pengisian` timestamp NULL DEFAULT NULL,
  `tgl_permohonan` timestamp NULL DEFAULT NULL,
  `tgl_disetujui` timestamp NULL DEFAULT NULL,
  `status` enum('PP','D') DEFAULT NULL,
  `komentar_lead_sub` text DEFAULT NULL,
  `komentar_lead_koor` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logbook_items`
--

CREATE TABLE `tbl_logbook_items` (
  `id` varchar(36) NOT NULL,
  `id_logbook` varchar(36) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `mulai` time DEFAULT NULL,
  `selesai` time DEFAULT NULL,
  `uraian_kegiatan` text DEFAULT NULL,
  `hasil_kegiatan` text DEFAULT NULL,
  `dokumen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` varchar(36) NOT NULL,
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

INSERT INTO `tbl_pegawai` (`id`, `nik`, `id_rules`, `nama_pegawai`, `tempat_lahir_pegawai`, `tanggal_lahir_pegawai`, `jenis_kelamin_pegawai`, `golongan_darah_pegawai`, `alamat_pegawai`, `status_pernikahan_pegawai`, `agama_pegawai`, `pekerjaan_pegawai`, `kewarganegaraan_pegawai`, `pendidikan_pegawai`, `jurusan_pegawai`, `jabatan_pegawai`, `no_telepon_pegawai`, `no_npwp_pegawai`, `no_bpjs_pegawai`, `no_rekening_pegawai`, `created_at`, `updated_at`) VALUES
('067117ca-3c16-423e-bd4a-26229dd7a686', '9106122501750001', 2, 'ARIS YIGIBALOM', 'TIOM', '1975-01-25', 'L', 'O', 'STAB RT/RW 007/002, KARANG MULYA, SAMOFA, BIAK NUMFOR, PAPUA', 'BELUM KAWIN', 'KRISTEN', 'PETANI/PEKEBUN', 'WNA', 'SD', NULL, 'CLEANING SERVICE', NULL, '76.973.232.3-954.000', NULL, '154-00-1364283-4', '2021-06-01 05:34:22', '2021-06-05 11:47:54'),
('175489a9-f6d0-4ebe-b247-c2f3ae138376', '9106120201770001', 2, 'HARUN YARANGGA', 'BIAK', '1977-01-02', 'L', 'O', 'JL. GOA JEPANG KAMPUNG RT/RW 001/002, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'KARYAWAN HONORER', 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', NULL, '76.864.904.8-954.000', NULL, '154-00-1364358-4', '2021-06-01 06:16:18', '2021-06-01 06:16:18'),
('1a7290c5-e17c-42c2-966a-2002516fd0bf', '3329020507940008', 2, 'ASEP SAEPUL IMAM', 'BREBES', '1994-07-05', 'L', 'B', 'DESA SUMBERKER RT/RW 002/002, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'BELUM KAWIN', 'ISLAM', 'KARYAWAN HONORER', 'WNI', 'SMA', NULL, 'SECURITY', '082398994448', '41.175.501.0.954.000', '0002469528303', '154.00.1679564.7', '2021-06-01 07:09:48', '2021-08-15 10:56:59'),
('39688dc7-11db-44ce-a9ff-3b6ee695d2a2', '9106125804880005', 2, 'AVIRIANTY RAMADANY A.Md', 'BIAK', '1988-04-18', 'P', 'B', 'JL. LAWU RIDGE I RT/RW 001/001, BRAMBAKEN, SAMOFA, BIAK NUMFOR, PAPUA', 'BELUM KAWIN', 'ISLAM', 'KARYAWAN HONORER', 'INDONESIA', 'DIPLOMA', NULL, 'STAF TATA USAHA', '082248441855', '36.162.614.6-954.000', NULL, '154-00-1364362-6', '2021-06-01 05:43:34', '2021-06-01 05:43:34'),
('41b65c73-996a-4387-82df-3048421b3756', '9106122806830003', 2, 'HERU MULIONO', 'SRAGEN', '1983-06-28', 'L', 'B', 'MANDIRI KARANG MULYA, RT/RW 004/006, KARANG MULYA, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'ISLAM', 'KARYAWAN HONORER', 'INDONESIA', 'SMA', '-', 'DRIVER', '081247181669', '16.403.071.0-954.000', '0001793641803', '154-00-1478932-9', '2021-06-01 01:21:16', '2021-06-01 01:21:16'),
('4614d46d-edb1-42c0-97ac-23aebf3f92de', '9106120108810003', 2, 'MATAN RUMAROPEN', 'Biak', '1981-08-01', 'L', 'O', 'Kampung Wisata Binsari', 'KAWIN', 'KRISTEN', 'Karyawan Honorer', 'WNI', 'SMA', 'SMK', 'CLEANING SERVICE', '081247764851', '41.266.232.2954.000', NULL, NULL, '2021-06-01 07:12:27', '2021-08-15 10:52:16'),
('4a2d16f3-9148-4c0c-b371-0ab94f7122a4', '9106122012770001', 2, 'DOLFINUS YARANGGA', 'BIAK', '1977-12-20', 'L', 'O', 'DESA SUMBERKER RT/RW 002/002, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'KARYAWAN HONORER', 'INDONESIA', NULL, NULL, 'STAF TU', '081343076922', '66.438.321.3-954.000', '0000718932047', '154-00-1478932-9', '2021-06-01 05:43:34', '2021-06-01 05:43:34'),
('54872817-24f4-4bcc-b052-903dff3e5ddf', '9106122309770001', 2, 'YULIUS YARANGGA', 'BIAK', '1977-09-23', 'L', 'O', 'JLN. GOA JEPANG KAMPUNG SUMBERKER RT/RW 001/001, SUMBERKER,SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'KARYAWAN HONORER', 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', NULL, '76.864.589.7-954.000', NULL, '154-00-1364358-4', '2021-06-01 06:52:07', '2021-06-01 06:52:07'),
('5ed71446-8f5c-493c-956a-983f4ff32a8b', '1611020608940002', 2, 'SUSANTO ANGGARANATA', 'NANJUNGAN', '1994-08-06', 'L', 'B', 'PERUMAHAN SUMBERKER BLOK B NO 56, RT/RW 002/001, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'ISLAM', 'KARYAWAN HONORER', 'WNI', 'SMA', 'TKR', 'CLEANING SERVICE', '082175772946', '95.044L1329954.000', '0002747320773', '154.00.1445013.8', '2021-06-01 07:12:27', '2021-08-15 11:01:06'),
('7febf2ad-07c1-4ed0-b93d-cbd9f9dcb4fd', '9106124512900001', 1, 'INDAH WULANDARI', 'BIAK', '1990-12-05', 'P', 'A', 'KOMPLEKS LAPAN SUMBERKER, RT/RW 001/002, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'ISLAM', 'KARYAWAN HONORER', 'WNA', 'SD', NULL, 'STAF TATA USAHA', '081344485376', '76.880.419.7-954.000', NULL, '154-00-1110504-0', '2021-06-01 06:20:45', '2021-06-01 06:20:45'),
('82e7b61d-a84c-4734-8d50-4b01b79c28e9', '9106122309000001', 2, 'RISKY WAHYU YARANGGA', 'BIAK', '2000-09-23', 'L', NULL, 'DESA SUMBERKER RT/RW 002/002, SUMBERKER, SAMOFA, BIAK NUMFOR, PAPUA', 'BELUM KAWIN', 'KRISTEN', 'PELAJAR/NAHASISWA', 'INDONESIA', NULL, '', 'SECURITY', '081343076922', '96.963.797.4-954.000', NULL, '154-00-1676774-5', '2021-06-01 06:24:54', '2021-06-01 06:24:54'),
('937911cc-080d-4ec2-b752-46f7e2aab54a', 'DUMMY4', 2, 'MARTHINUS YARANGGA', NULL, NULL, 'L', NULL, NULL, '', 'KRISTEN', NULL, 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', NULL, NULL, NULL, NULL, '2021-06-01 07:09:48', '2021-06-01 07:09:48'),
('9a24aae1-c5d1-4341-aa58-e4064e1946de', 'DUMMY2', 2, 'ADAM STEVEN AP', NULL, NULL, 'L', NULL, NULL, 'BELUM KAWIN', 'KRISTEN', NULL, NULL, NULL, NULL, 'CLEANING SERVICE', '0811488431', NULL, NULL, NULL, '2021-06-01 06:56:47', '2021-06-01 06:56:47'),
('bb3f7030-3cbc-48ce-8fb7-81e9b001b0b5', '9106010401880001', 2, 'YOHANES LAMATOKAN', 'BIAK', '1988-01-04', 'L', 'A', 'DESA BABRIMBO JLN. SORIDO RAYA RT/RW 002/001, SORIDO, BIAK KOTA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KATOLIK', 'KARYAWAN SWASTA', 'INDONESIA', NULL, NULL, 'DRIVER', '081240341223', '76.897.986.6-954.000', '', '154-00-1364342-8', '2021-06-01 06:52:07', '2021-06-01 06:52:07'),
('ce14b7d2-a974-4601-bdb4-019778d13427', '8203211509950001', 2, 'SEPRISTON NGOIDIL', 'SOAMAETEK', '1995-09-15', 'L', 'O', 'ASRAMA INTEL KOREM 173/PVB RT/RW 002/003, SAMOFA, SAMOFA, BIAK NUMFOR, PAPUA', 'BELUM KAWIN', 'KRISTEN', 'WIRASWASTA', 'INDONESIA', NULL, NULL, 'SECURITY', '082398718866', '96.994.339.8-954.000', NULL, '145-00-1676603-6', '2021-06-01 06:24:54', '2021-06-01 06:24:54'),
('e5144105-4a51-47f1-b49c-bf0765c655ed', 'DUMMY1', 2, 'A. BUDIANTO', NULL, NULL, 'L', 'A', NULL, 'KAWIN', 'ISLAM', NULL, 'WNA', 'SD', NULL, 'SECURITY', '0811488431', NULL, NULL, NULL, '2021-06-01 06:56:47', '2021-06-01 06:56:47'),
('ee3e4850-ae73-4e5e-829a-37bf18051e50', '9106121302620001', 2, 'FRITS YARANGGA', 'BIAK', '1962-02-23', 'L', 'A', 'JL. POMPA AIR LAPAN RT/RW 002/002, KARANG MULYA, SAMOFA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'KARYAWAN HONORER', 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', '081238731968', '76.886.644.4-954.000', NULL, '154-00-1364351-9', '2021-06-01 06:16:18', '2021-06-01 06:16:18'),
('feb54e74-7fd5-4876-88a3-374182bf2690', '9106021505700001', 2, 'MARTHEN ARWEKION', 'NERMNU', '1970-05-15', 'L', 'O', 'KAMPUNG MAMBESAK. RT/RW -/002, MAMBESAK, BIAK UTARA, BIAK NUMFOR, PAPUA', 'KAWIN', 'KRISTEN', 'PETANI/PEKEBUN', 'INDONESIA', NULL, NULL, 'CLEANING SERVICE', NULL, '76.878.401.9-954.000', NULL, '154-00-1364324-6', '2021-06-01 06:20:45', '2021-06-01 06:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pimpinan`
--

CREATE TABLE `tbl_pimpinan` (
  `id` varchar(36) NOT NULL,
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

INSERT INTO `tbl_pimpinan` (`id`, `nip`, `id_rules`, `nama_pimpinan`, `jabatan_pimpinan`, `created_at`, `updated_at`) VALUES
('053df67b-974e-41d3-ae2a-1270dd37909f', '197907022006041022', 3, 'Mochamad Luqman Ashary, S.Kom.', 'Sub Koordinator Bagian Tata Usaha Balai Kendali Satelit, Pengamatan Antariksa dan Atmosfer, dan Penginderaan Jauh Biak', '2021-06-01 00:43:16', '2021-06-01 00:43:16'),
('467998b9-eca2-42ef-b1e0-a5c9264252a6', '197706142002121009', 4, 'Dian Yudistira, S.Kom., M.Kom.', 'Koordinator Balai Kendali Satelit, Pengamatan Antariksa dan Atmosfer, dan Penginderaan Jauh Biak', '2021-06-01 00:44:16', '2021-06-01 00:43:16');

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
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_pimpinan` (`id_pimpinan`);

--
-- Indexes for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_pimpinan` (`id_pimpinan`);

--
-- Indexes for table `tbl_logbook_items`
--
ALTER TABLE `tbl_logbook_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_logbook` (`id_logbook`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rules` (`id_rules`);

--
-- Indexes for table `tbl_pimpinan`
--
ALTER TABLE `tbl_pimpinan`
  ADD PRIMARY KEY (`id`),
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
  ADD CONSTRAINT `tbl_absensi_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id`);

--
-- Constraints for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD CONSTRAINT `tbl_auth_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id`),
  ADD CONSTRAINT `tbl_auth_ibfk_2` FOREIGN KEY (`id_pimpinan`) REFERENCES `tbl_pimpinan` (`id`);

--
-- Constraints for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  ADD CONSTRAINT `tbl_logbook_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id`),
  ADD CONSTRAINT `tbl_logbook_ibfk_2` FOREIGN KEY (`id_pimpinan`) REFERENCES `tbl_pimpinan` (`id`);

--
-- Constraints for table `tbl_logbook_items`
--
ALTER TABLE `tbl_logbook_items`
  ADD CONSTRAINT `tbl_logbook_items_ibfk_1` FOREIGN KEY (`id_logbook`) REFERENCES `tbl_logbook` (`id`);

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
